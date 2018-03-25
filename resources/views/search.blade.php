@extends('layouts.main')
@section('title','Axtarış səhifəsi')

@section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{route('home_page')}}">Ana Səhifə</a></li>
        <li class="active">Axtarış nəticəsi</li>
    </ol>

    <div class="products bg-content">
        <div class="row">

            @if(count($products) == 0)
                <div class="col-md-12 text-center">
                    Heç bir məhsul tapılmadı :(
                </div>
            @endif
                @foreach($products as $product)
                    <div class="col-md-3 product">
                        <a href="{{route('product_page',$product->slug)}}"><img src="{{asset('img/food1.jpg')}}"></a>
                        <p><a href="{{route('product_page',$product->slug)}}">{{$product->product_name}}</a></p>
                        <p class="price">{{$product->price}} man</p>
                    </div>
                @endforeach

        </div>

        {{ $products->appends(['q' => old('q')])->links() }}
    </div>
</div>

@endsection
