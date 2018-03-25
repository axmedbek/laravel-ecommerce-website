<?php

namespace App\Http\Controllers;

use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){


        if (!auth()->check()){

            return redirect()->route('user.login')
                ->with('message_status','info')
                ->with('message','Ödəmə səhifəsinə keçmək üçün login olmalı və ya qeydiyyatdan keçməlisiniz');
        }
        else if (count(Cart::content()) == 0){
            return redirect()->route('home_page')
                ->with('message_status','info')
                ->with('message','Ödəmə etmək üçün səbətinizə məhsul əlavə edin');
        }


        $user = auth()->user();
        return view('payment',compact('user'));
    }

    public function make(){
        $order = request()->all();
        $order['cart_id'] = session('active_cart_id');
        $order['banka'] = 'Kapital Bank';
        $order['credit_count'] = 1;
        $order['status'] = 'Sifarişiniz  alındı';
        $order['order_price'] = Cart::subtotal();

        Order::create($order);
        \App\Cart::where('id',$order['cart_id'])->update(['order_status'=>1]);
        Cart::destroy();
        session()->forget('active_cart_id');

        return redirect()->route('orders_page')
            ->with('message_status','success')
            ->with('message','Ödəmə əməliyyatı uğurla tamamlandı');
    }
}
