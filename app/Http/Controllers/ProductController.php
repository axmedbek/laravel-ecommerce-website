<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($product_name){

        $product = Product::whereSlug($product_name)->firstOrFail();
        return view('product',compact('product'));
    }

    public function search(){
        $q = request()->input('q');

        $products = Product::where('product_name','like',"%$q%")
            ->orWhere('description','like',"%$q%")->paginate(4);

        request()->flash();

        return view('search',compact('products'));
    }
}
