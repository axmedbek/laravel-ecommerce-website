@extends('admin.layouts.main')
@section('title','Category Control |  Admin Panel')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-{{ session('message_status') }}">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="sub-header">Category List</h1>


    <div class="well">
        <div class="btn-group pull-right" style="margin-bottom: 10px;">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create New Category</a>
        </div>
        <form action="{{ route('admin.category') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="search">Axtar</label>
                <input type="text" class="form-control form-control-sm" name="search"
                id="search" placeholder="Ad,Email axtar.." value="{{ old('search') }}">
            </div>
            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">Select</option>
                    @foreach($parentCaregory as $parent)
                    <option value="{{ $parent->id }} {{ old('parent_id') == $parent->id ? 'selected' : ''}}">{{ $parent->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Axtar</button>
            <a href="{{ route('admin.category') }}" class="btn btn-danger">Temizle</a>
        </form>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Slug Name</th>
                <th>Parent Category</th>
                <th>Created Date</th>
                <th>Process</th>
            </tr>
            </thead>
            <tbody>
            @if(count($categoryList) == 0)
                <tr colspan="6" class="text-center"><
                    td>Result is empty :(</td>
                </tr>
            @else
                @foreach($categoryList as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->slug }}</td>
                <td>@if(isset($category->parent_id)) {{ \App\Category::find($category->parent_id)->category_name}} @else Yoxdur @endif</td>
                <td>{{ date('Y-m-d',strtotime($category->created_at)) }}</td>
                <td style="width: 100px">
                    <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{ route('admin.category.delete',$category->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>

        {{ $categoryList->links() }}
    </div>
@endsection
