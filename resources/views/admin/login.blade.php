<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Eticaret Proyekti - Admin Panel</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
<div class="container">
    <div class="row">
        <img src="{{ asset('img/logo.png') }}" class="logo">
        <form class="form-signin" action="{{ route('admin.login') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                   <label for="email" class="sr-only">Email address</label>
                   <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
               </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required aut>
                </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="rememberme" value="1" checked> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <div class="links">
                <a href="#">&larr; Back to site</a>
            </div>
        </form>
    </div>
</div>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>

</html>