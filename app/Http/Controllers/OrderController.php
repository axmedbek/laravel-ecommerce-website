<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('orders');
    }

    public function order($order_id){
        return view('order')->with('order',$order_id);
    }
}
