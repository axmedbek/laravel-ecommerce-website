<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){

        if (request()->filled('search') || request()->filled('parent_id')){
            request()->flash();

            $search = request('search');
            $parent_id = request('parent_id');

            $categoryList = Category::where('category_name','like',"%$search%")
                ->where('slug','like',"%$search%")
                ->where('parent_id',$parent_id)
                ->orderByDesc('created_at')
                ->paginate(2)
                ->appends(['search' => $search,'parent_id' => $parent_id]);
        }
        else{
            request()->flush();
            $categoryList = Category::orderByDesc('created_at')->paginate(8);
        }

        $parentCaregory = Category::whereRaw('parent_id is null')->get();
        return view('admin.category.index',compact('categoryList','parentCaregory'));

    }

    public function edit($id = 0){

        $category = new Category();

        if ($id>0){

            $category = Category::find($id);

        }
        return view('admin.category.form',compact('category'));
    }


    public function save($id=0){

//        $this->validate(request(),[
//            'category_name' => 'required|string',
//            'slug' => 'required|email'
//        ]);

        $data = request()->only('category_name','slug','parent_id');


        if ($id > 0){
            $category = Category::where('id',$id)->firstOrFail();
            $category->update($data);
        }
        else{
            $category = Category::create($data);
        }
        return redirect()
            ->route('admin.category.edit',$category->id)
            ->with('message_status','success')
            ->with('message',$id >0 ? 'Category update edildi' : 'Category yaradildi');

    }


    public function delete($id){

        Category::destroy($id);

        return redirect()->route('admin.category')
            ->with('message_status','success')
            ->with('message','Category is deleted');

    }
}
