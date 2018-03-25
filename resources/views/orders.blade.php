@extends('layouts.main')
@section('title','Sifarişlər səhifəsi')

@section('content')

    <div class="container">
        <div class="bg-content">

            @if(!count($orders)>0)

            <p>Hal hazırda sifarişiniz yoxdur</p>

            @else
            <h2>Sifarişlər</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Sifariş Kodu</th>
                    <th>Sifariş Tarixi</th>
                    <th>Kargo</th>
                    <th>Umumi ödənəcək məbləğ</th>
                    <th>Status</th>
                    <th>Əməliyyat</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ date('d-m-Y',strtotime($order->created_at)) }}</td>
                    <td> - </td>
                    <td>{{ $order->order_price }} Azn</td>
                    <td>
                        {{ $order->status }}
                    </td>
                    <td><a href="{{ route('order_page',$order->id) }}" class="btn btn-sm btn-success">Ətraflı</a></td>
                </tr>
                @endforeach

            </table>
            @endif
        </div>
    </div>
@endsection
