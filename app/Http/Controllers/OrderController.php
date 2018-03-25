<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::all();
        return view('orders',compact('orders'));
    }

    public function order($order_id){

        $order = Order::where($order_id);
        return view('order',compact('order'));
    }
}
