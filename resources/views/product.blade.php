@extends('layouts.main')
@section('title',$product->product_name)
@section('head')
    <style>
        img{
            width: 350px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('home_page')}}">Anasayfa</a></li>
            @foreach($product->category as $category)
            <li><a href="{{route('category_page',$category->slug)}}">{{$category->category_name}}</a></li>
            @endforeach
            <li class="active">{{$product->product_name}}</li>
        </ol>
        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{asset('img/food1.jpg')}}">
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="{{asset('img/food2.jpeg')}}"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="{{asset('img/food3.jpg')}}"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="{{asset('img/food4.jpg')}}"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{$product->product_name}}</h1>
                    <p class="price">{{$product->price}} man</p>
                    <form action="{{ route('cart.add') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-theme" value="Səbətə əlavə et">
                    </form>
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                    <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">{{$product->description}}</div>
                    <div role="tabpanel" class="tab-pane" id="t2">t2</div>
                </div>
            </div>

        </div>
    </div>

@endsection



