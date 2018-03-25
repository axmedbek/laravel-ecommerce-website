<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_name){
        $category = Category::where('slug',$category_name)->firstOrFail();
        $sub_categories = Category::where('parent_id',$category->id)->get();


        $order = request('order');

        if ($order == 'bestseller'){
            $products = $category->product()->distinct()
            ->join('product_detail','product_detail.product_id','products.id')
            ->orderByDesc('product_detail.show_bestselled')
            ->paginate(2);
        }
        else if ($order == 'new'){
            $products = $category
                ->product()
                ->distinct()
                ->orderByDesc('updated_at')
                ->paginate(2);
        }
        else{
            $products = $category->product()->paginate(2);
        }

        return view('category',compact('category','sub_categories','products'));
    }
}
