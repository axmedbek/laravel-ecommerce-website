<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Debug\Dumper;

class AdminProductController extends Controller
{
    public function index(){

        if (request()->filled('search')){
            request()->flash();

            $search = request('search');

            $productList = Product::where('product_name','like',"%$search%")
                ->where('slug','like',"%$search%")
                ->where('description','like',"%$search%")
                ->orderByDesc('created_at')
                ->paginate(2)
                ->appends('search',$search);
        }
        else{
            request()->flush();
            $productList = Product::orderByDesc('created_at')->paginate(8);
        }

        return view('admin.product.index',compact('productList'));

    }

    public function edit($id = 0){

        $product = new Product();

        if ($id>0){

            $product = Product::find($id);

        }
        return view('admin.product.form',compact('product'));
    }


    public function save($id=0){

//        $this->validate(request(),[
//            'category_name' => 'required|string',
//            'slug' => 'required|email'
//        ]);

        $data = request()->only('product_name','slug','description','price');


        if ($id > 0){
            $product = Product::where('id',$id)->firstOrFail();
            $product->update($data);
        }
        else{
            $product = Product::create($data);
        }



        if (request()->hasFile('product_image')){

            $this->validate(request(),[
               'product_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);

            $product_image = request()->product_image;

              $product_image_name = $product->slug . "-" .time(). "." . $product_image->extension();
            //$product_image_name = $product_image->getClientOriginalName();
            if ($product_image->isValid()){
                $product_image->move('img',$product_image_name);

                Product::updateOrCreate(
                    ['id' => $product->id],
                    ['product_image' => $product_image_name]
                );
            }


        }

        return redirect()
            ->route('admin.product.edit',$product->id)
            ->with('message_status','success')
            ->with('message',$id >0 ? 'Product update edildi' : 'Product yaradildi');

    }


    public function delete($id){

        Product::destroy($id);

        return redirect()->route('admin.product')
            ->with('message_status','success')
            ->with('message','Product is deleted');

    }
}
