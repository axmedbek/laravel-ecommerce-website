@extends('layouts.main')
@section('title',$category->category_name)

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('home_page')}}">Ana səhifə</a></li>
            <li class="active">{{$category->category_name}}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$category->category_name}}</div>
                    <div class="panel-body">

                        @if(count($sub_categories) > 0)

                        <h3>Alt Kateqoriyalar</h3>
                        <div class="list-group categories">
                            @foreach($sub_categories as $sub_category)
                            <a href="{{route('category_page',$sub_category->slug)}}" class="list-group-item"><i class="fa fa-television"></i> {{$sub_category->category_name}}</a>
                            @endforeach
                        </div>
                        @else
                            Bu kateqoriyaya aid alt kateqoriya yoxdur!
                        @endif

                        <h3>Qiymət aralığı</h3>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 100-200
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 200-300
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    Sırala
                    <a href="?order=bestseller" class="btn btn-default">Çok Satanlar</a>
                    <a href="?order=new" class="btn btn-default">Yeni məhsullar</a>
                    <hr>
                    <div class="row">

                        @if(count($products) == 0)
                            <h2>Bu kateqoriyada məhsul yoxdur</h2>
                            @endif

                        @foreach($products as $product)

                        <div class="col-md-3 product">
                            <a href="{{route('product_page',$product->slug)}}"><img src="{{asset('img/food1.jpg')}}"></a>
                            <p><a href="{{route('product_page',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}} ₺</p>
                            <p><a href="#" class="btn btn-theme">Səbətə əlavə et</a></p>
                        </div>

                        @endforeach

                    </div>

                    {{ request()->has('order') ? $products->appends(['order' => request('order')])->links() : $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
