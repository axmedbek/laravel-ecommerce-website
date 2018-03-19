@extends('layouts.main')
@section('title','Kategoriyalar')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Ana səhifə</a></li>
            <li><a href="#">Kateqoriyalar</a></li>
            <li class="active">Kategori</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$category}}</div>
                    <div class="panel-body">
                        <h3>Alt Kateqoriyalar</h3>
                        <div class="list-group categories">
                            <a href="#" class="list-group-item"><i class="fa fa-television"></i> Alt Kategori</a>
                            <a href="#" class="list-group-item"><i class="fa fa-television"></i> Alt Kategori</a>
                            <a href="#" class="list-group-item"><i class="fa fa-television"></i> Alt Kategori</a>
                        </div>
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
                    <a href="#" class="btn btn-default">Çok Satanlar</a>
                    <a href="#" class="btn btn-default">Yeni məhsullar</a>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 product">
                            <a href="#"><img src="{{asset('img/food1.jpg')}}"></a>
                            <p><a href="#">Məhsul adı</a></p>
                            <p class="price">129 ₺</p>
                            <p><a href="#" class="btn btn-theme">Səbətə əlavə et</a></p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="{{asset('img/food2.jpeg')}}"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                            <p><a href="#" class="btn btn-theme">Səbətə əlavə et</a></p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="{{asset('img/food3.jpg')}}"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="{{asset('img/food4.jpg')}}"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
