<?php

namespace App\Http\Controllers;

use App\CartProduct;
use App\Mail\UserMail;
use App\User;
use App\UserDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Cart as Sebet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login_form(){
        return view('user.login');
    }

    public function login(){
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ],request()->has('remember_me')))
        {

            request()->session()->regenerate();

            $active_cart_id = Sebet::firstOrCreate([
                'user_id' => auth()->id(),
                'order_status' => 0
            ])->id;
            session()->put('active_cart_id',$active_cart_id);

            if (Cart::count() > 0){
                foreach (Cart::content() as $cartItem){
                    CartProduct::updateOrCreate(
                        ['cart_id' => $active_cart_id,'product_id' => $cartItem->id],
                        ['amount' => $cartItem->qty,'price'=>$cartItem->price,'status' => 'Beklemede']
                    );
                }
            }

            Cart::destroy();
            $cartProducts = CartProduct::where('cart_id',$active_cart_id)->get();

            foreach ($cartProducts as $cartProduct){
                Cart::add($cartProduct->product->id,$cartProduct->product->product_name,$cartProduct->amount,$cartProduct->price,['slug' => $cartProduct->product->slug]);
            }





            return redirect()->intended('/');
        }
        else{
            $errors = [
                'email' => 'Hatali giris'
            ];

            return back()->withErrors($errors);
        }
    }

    public function register_form(){
        return view('user.register');
    }


    public function register(){


        $this->validate(request(),[
           'fullname' => 'required|min:3|max:60',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:15'
        ]);
        $user = User::create([
            'fullname' => request('fullname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'activation_code' => Str::random(60)
        ]);

        $user->userDetail()->save(new UserDetail());

        //Mail::to(request('email'))->send(new UserMail($user));


        auth()->login($user);

        return redirect()->route('home_page');
    }

    public function activation($activation_code){
        $user = User::where('activation_code',$activation_code)->first();
        if (!is_null($user)){

            $user->activation_code = null;
            $user->status = 1;
            $user->save();

            return redirect()->to('/')
                ->with('message','Hesabiniz aktivlesdirildi')
                ->with('message_status','success');
        }
    }

    public function logout(){
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('home_page');
    }

}
