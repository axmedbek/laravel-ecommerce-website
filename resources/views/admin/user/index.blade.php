@extends('admin.layouts.main')
@section('title','User Control |  Admin Panel')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-{{ session('message_status') }}">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="sub-header">User List</h1>


    <div class="well">
        <div class="btn-group pull-right" style="margin-bottom: 10px;">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create New User</a>
        </div>
        <form action="{{ route('admin.user') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="search">Axtar</label>
                <input type="text" class="form-control form-control-sm" name="search"
                id="search" placeholder="Ad,Email axtar.." value="{{ old('search') }}">
            </div>
            <button type="submit" class="btn btn-danger">Axtar</button>
            <a href="{{ route('admin.user') }}" class="btn btn-danger">Temizle</a>
        </form>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Register Date</th>
                <th>Process</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userList as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->email }}</td>
                <td>@if($user->status==1) <span class="label label-success">Active</span> @else <span class="label label-warning">Passive</span> @endif</td>
                <td>@if($user->is_admin ==1) <span class="label label-danger">Admin</span> @else <span class="label label-info">User</span> @endif</td>
                <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                <td style="width: 100px">
                    <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{ route('admin.user.delete',$user->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $userList->links() }}
    </div>
@endsection
