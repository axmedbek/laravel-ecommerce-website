@extends('admin.layouts.main')
@section('title','Product Control |  Admin Panel')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-{{ session('message_status') }}">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="sub-header">Product List</h1>


    <div class="well">
        <div class="btn-group pull-right" style="margin-bottom: 10px;">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create New Product</a>
        </div>
        <form action="{{ route('admin.product') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="search">Axtar</label>
                <input type="text" class="form-control form-control-sm" name="search"
                id="search" placeholder="Product axtar.." value="{{ old('search') }}">
            </div>
            <button type="submit" class="btn btn-danger">Axtar</button>
            <a href="{{ route('admin.product') }}" class="btn btn-danger">Temizle</a>
        </form>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Slug Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created Date</th>
                <th>Process</th>
            </tr>
            </thead>
            <tbody>
            @if(count($productList) == 0)
                <tr colspan="6" class="text-center"><
                    td>Result is empty :(</td>
                </tr>
            @else
                @foreach($productList as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ date('Y-m-d',strtotime($product->created_at)) }}</td>
                <td style="width: 100px">
                    <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{ route('admin.product.delete',$product->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>

        {{ $productList->links() }}
    </div>
@endsection
