<?php

namespace App\Http\Controllers;

use App\CartProduct;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function __construct()
    {

    }

    public function index(){
        return view('cartpage');
    }

    public function add(){

        $product = Product::find(request('id'));
        $cartItem = Cart::add($product->id,$product->product_name,1,$product->price,['slug' => $product->slug]);

        if (auth()->check()){
            $active_cart_id = session('active_cart_id');
            if (!isset($active_cart_id)){
                $active_cart = \App\Cart::create([
                    'user_id' => auth()->id()
                ]);

                $active_cart_id = $active_cart->id;
                session()->put('active_cart_id',$active_cart_id);
            }

            CartProduct::updateOrCreate(
                ['cart_id' => $active_cart_id ,'product_id' => $product->id],
                ['amount' => $cartItem->qty , 'price' => $product->price , 'status' => 'Gözləmədə']
            );
        }

        return redirect()->route('cart_page')
            ->with('message','Məhsul səbətə əlavə olundu')
            ->with('message_status','success');
    }

    public function delete($rowid){

        if (auth()->check()){
            $active_cart_id = session('active_cart_id');

            $cartItem = Cart::get($rowid);

            CartProduct::where('cart_id',$active_cart_id)->where('product_id',$cartItem->id)->delete();
        }
        Cart::remove($rowid);

        return redirect()->route('cart_page')
            ->with('message','Məhsul səbətdən çıxarıldı')
            ->with('message_status','success');
    }

    public function deleteAll(){

        if (auth()->check()){
            $active_cart_id = session('active_cart_id');

            CartProduct::where('cart_id',$active_cart_id)->delete();
        }
        Cart::destroy();
        return redirect()->route('cart_page')
            ->with('message','Səbətiniz boşaldıldı.')
            ->with('message_status','success');
    }

    public function update($rowid){

        $validator = Validator::make(request()->all(),[
            'qty' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()){
            session()->flash('message_status','danger');
            session()->flash('message','Məhsul sayı min 1 max 5 ola bilər.');

            return response()->json(['success' => true]);
        }

        if (auth()->check()){
            $active_cart_id = session('active_cart_id');
            $cartItem = Cart::get($rowid);

            if (request('qty') == 0){
                CartProduct::where('cart_id',$active_cart_id)
                    ->where('product_id',$cartItem->id)->delete();
            }
            else{
                CartProduct::where('cart_id',$active_cart_id)
                    ->where('product_id',$cartItem->id)
                    ->update(['amount' => request('qty')]);
            }

        }
        Cart::update($rowid,request('qty'));

        session()->flash('message_status','success');
        session()->flash('message','Səbətiniz yenilendi.');

        return response()->json(['success' => true]);
    }
}
