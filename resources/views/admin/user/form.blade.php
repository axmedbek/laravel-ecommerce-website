@extends('admin.layouts.main')
@section('title','User Control Form | Admin Panel')

@section('content')
    @if(session()->has('message'))
    <div class="alert alert-{{ session('message_status') }}">
        {{ session('message') }}
    </div>
    @endif
    <h1 class="sub-header">User Form</h1>
    <form method="post" action="{{ route('admin.user.save' , @$user->id) }}" >
        {{ csrf_field() }}
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ @$user->id > 0 ? 'Update' : 'Create' }}
            </button>
        </div>

        <h2 class="sub-header">
            {{ @$user->id > 0 ? 'Edit' : 'Create' }} User
        </h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="name" class="form-control" name="fullname" value="{{ $user->fullname }}" id="fullname" placeholder="Fullname">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email" placeholder="Email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ @$user->userDetail->address }}" id="address" placeholder="Address">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ @$user->userDetail->phone }}" id="phone" placeholder="Phone">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mobile">Mobile Phone</label>
                    <input type="text" class="form-control" name="mobile_phone" value="{{ @$user->userDetail->mobile_phone }}" id="mobile" placeholder="mobile">
                </div>
            </div>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="status" value="1" {{ $user->status==1 ? 'checked' : ''}}> Active?
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_admin" value="1" {{ $user->is_admin==1 ? 'checked' : '' }}> Admin ?
            </label>
        </div>
    </form>
@endsection
