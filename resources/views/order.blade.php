@extends('layouts.main')
@section('title','Sifariş səhifəsi')


@section('head')
    <style>
        img{
            width: 80px;
            height: 80px;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sifariş (SP-{{ $order->id }})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Məhsul</th>
                    <th>Məbləğ</th>
                    <th>Miqdar</th>
                    <th>Ümumi məbləğ</th>
                    <th>Vəziyyəti</th>
                </tr>
                <tr>
                    <td> <img src="{{asset('img/food2.jpeg')}}"> {{$order}}</td>
                    <td>{{  }}</td>
                    <td>1</td>
                    <td>18.99</td>
                    <td>
                        Sipariş alındı, <br> Onaylandı, <br> Kargoya verildi, <br> Bir sorun var. İletişime geçin!
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Toplam Tutar (KDV Dahil)</th>
                    <th>18.99</th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Kargo</th>
                    <th>Ücretsiz</th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Sipariş Toplamı</th>
                    <th>18.99</th>
                    <th></th>
                </tr>

            </table>
        </div>
    </div>
@endsection
