<!DOCTYPE html>
<html lang={{ config('app.locale') }}>

<head>
    <title>@yield('title',config('app.name'))</title>
    @include('layouts.partials.head')
    @yield('head')

</head>

<body id="commerce">

@include('layouts.partials.navbar')

@yield('content')

@include('layouts.partials.footer')

{{--<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>--}}
{{--<script src="{{asset('js/bootstrap.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('footer')
</body>
</html>