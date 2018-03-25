@extends('layouts.main')
@section('title','Ana Səhifə')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-{{ session('message_status') }}">
            {{ session('message') }}
        </div>
    @endif

    <style>
        img{}
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($categories as $category)
                        <a href="{{route('category_page',['category_name'=>$category->slug])}}" class="list-group-item"><i class="fa fa-television"></i> {{$category->category_name}}</a>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0;$i<count($product_details_sliders);$i++)
                        <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="{{$i==0 ? 'active' : ''}}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($product_details_sliders as $index => $product)
                        <div class="item {{$index==0 ? 'active' : ''}}">
                            <img src="{{asset('img/food1.jpg')}}" alt="...">
                            <div class="carousel-caption">
                                {{$product->product_name}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="{{route('product_page',$product_day_chance->slug)}}">
                            <img src="{{asset('img/food1.jpg')}}" class="img-responsive">
                            {{$product_day_chance->product_name}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($product_more_showned as $product)
                        <div class="col-md-3 product">
                            <a href="{{route('product_page',$product->slug)}}"><img src="{{asset('img/food1.jpg')}}"></a>
                            <p><a href="{{route('product_page',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}} man</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">

                        @foreach($product_bestselled as $product)
                        <div class="col-md-3 product">
                            <a href="{{route('product_page',$product->slug)}}"><img src="{{asset('img/food1.jpg')}}"></a>
                            <p><a href="{{route('product_page',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}} man</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($product_discounted as $product)
                        <div class="col-md-3 product">
                            <a href="{{route('product_page',$product->slug)}}"><img src="{{asset('img/food1.jpg')}}"></a>
                            <p><a href="{{route('product_page',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}} man</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    setTimeout(function(){
        $('.alert').slideUp(500)
    },3000);
    @endsection
