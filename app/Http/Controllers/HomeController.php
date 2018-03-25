<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $categories = Category::whereRaw('parent_id is null')->get();

        $product_details_sliders = Product::select('products.*')
            ->join('product_detail','product_detail.product_id','products.id')
            ->where('product_detail.show_slider',1)
            ->orderBy('updated_at','desc')
            ->take(5)->get();

        $product_day_chance = Product::select('products.*')
            ->join('product_detail','product_detail.product_id','products.id')
            ->where('product_detail.show_day_chance',1)
            ->orderBy('updated_at','desc')
            ->first();

        $product_more_showned = Product::select('products.*')
            ->join('product_detail','product_detail.product_id','products.id')
            ->where('product_detail.show_more_showned',1)
            ->orderBy('updated_at','desc')
            ->take(4)->get();

        $product_bestselled = Product::select('products.*')
            ->join('product_detail','product_detail.product_id','products.id')
            ->where('product_detail.show_bestselled',1)
            ->orderBy('updated_at','desc')
            ->take(4)->get();

        $product_discounted = Product::select('products.*')
            ->join('product_detail','product_detail.product_id','products.id')
            ->where('product_detail.show_discounted',1)
            ->orderBy('updated_at','desc')
            ->take(4)->get();

        return view('homepage',compact(
            'categories',
            'product_details_sliders',
            'product_day_chance',
            'product_more_showned',
            'product_bestselled',
            'product_discounted'));
    }
}
