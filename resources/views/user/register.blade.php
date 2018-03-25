@extends('layouts.main')
@section('title','Qeydiyyat səhifəsi')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Qeydiyyat</div>
                    <div class="panel-body">

                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <span class="help-block">{{ $error }}</span>
                                 @endforeach
                            </div>
                         @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('user.register') }}">
                            {{ csrf_field() }}
                            <div class="form-group  {{$errors->has('fullname') ? 'has-error' : ''}}"> <!-- has-error -->
                                <label for="name" class="col-md-4 control-label">Ad Soyad</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>
                                    @if($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                     @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Parol</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Parol (Təkrar)</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Qeydiyyat
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
