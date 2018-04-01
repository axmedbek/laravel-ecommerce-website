@extends('admin.layouts.main')
@section('title','Category Control Form | Admin Panel')

@section('content')
    @if(session()->has('message'))
    <div class="alert alert-{{ session('message_status') }}">
        {{ session('message') }}
    </div>
    @endif
    <h1 class="sub-header">Category Form</h1>
    <form method="post" action="{{ route('admin.category.save' , @$category->id) }}" >
        {{ csrf_field() }}
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ @$category->id > 0 ? 'Update' : 'Create' }}
            </button>
        </div>

        <h2 class="sub-header">
            {{ @$category->id > 0 ? 'Edit' : 'Create' }} Category
        </h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="name" class="form-control" name="category_name" value="{{ $category->category_name }}" id="category_name" placeholder="Category Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="parent_category">Select Parent Category</label>
                    <select name="parent_id" id="parent_category" class="form-control">
                        <option selected value="{{ $category->parent_id }}">{{ \App\Category::find($category->parent_id)->category_name }}</option>
                        @foreach(\App\Category::all() as $category)
                            @if($category->id != $category->parent_id)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ @$category->slug }}" id="slug" placeholder="Slug Name">
                </div>
            </div>
        </div>
    </form>
@endsection
