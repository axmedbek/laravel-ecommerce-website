@extends('admin.layouts.main')
@section('title','Product Control Form | Admin Panel')

@section('content')
    @if(session()->has('message'))
    <div class="alert alert-{{ session('message_status') }}">
        {{ session('message') }}
    </div>
    @endif
    <h1 class="sub-header">Product Form</h1>
    <form method="post" action="{{ route('admin.product.save' , @$product->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ @$product->id > 0 ? 'Update' : 'Create' }}
            </button>
        </div>

        <h2 class="sub-header">
            {{ @$product->id > 0 ? 'Edit' : 'Create' }} Product
        </h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="name" class="form-control" name="product_name" value="{{ $product->product_name }}" id="product_name" placeholder="Product Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $product->slug }}" id="slug" placeholder="Slug">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" style="margin: 0px; height: 112px; width: 486px;">
                        {{ $product->description }}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" value="{{ $product->price }}" id="price" placeholder="Price">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control">
                </div>
            </div>
        </div>
    </form>
@endsection
