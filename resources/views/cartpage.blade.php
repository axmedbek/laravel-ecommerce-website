@extends('layouts.main')
@section('title','Səbət səhifəsi')

@section('content')
    <style>
        img{
            width: 80px;
            height: 80px;
        }
    </style>
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>

            @include('layouts.partials.message')

            @if(count(Cart::content()) > 0)
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th></th>
                        <th>Məhsul</th>
                        <th>Qiymət</th>
                        <th>Miqdar</th>
                        <th>Toplam</th>
                        <th>Əməlliyat</th>
                    </tr>

                    @foreach(Cart::content() as $productCartItem)

                        <tr>
                            <td> <img src="{{asset('img/food1.jpg')}}"></td>
                            <td>
                                <a href="{{ route('product_page',$productCartItem->options->slug) }}">
                                    {{ $productCartItem->name }}
                                </a>
                            </td>
                            <td>{{ $productCartItem->price }} azn</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-xs btn-default product-decrement" data-id="{{ $productCartItem->rowId }}" data-qty="{{ $productCartItem->qty - 1 }}">-</a>
                                <span style="padding: 10px 20px">{{ $productCartItem->qty }}</span>
                                <a href="javascript:void(0)" class="btn btn-xs btn-default product-increment" data-id="{{ $productCartItem->rowId }}" data-qty="{{ $productCartItem->qty + 1 }}">+</a>
                            </td>
                            <td class="text-left">{{ $productCartItem->subtotal }} azn</td>
                            <td>
                                <form action="{{ route('cart.delete', $productCartItem->rowId) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger btn-xs" value="Sil">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <th colspan="4" class="text-right">Alt Toplam</th>
                        <th>{{ Cart::subtotal() }} azn</th>
                    </tr>

                    <tr>
                        <th colspan="4" class="text-right">Kargo</th>
                        <th>{{ Cart::tax() }} azn</th>
                    </tr>

                    <tr>
                        <th colspan="4" class="text-right">Ümumi</th>
                        <th>{{ Cart::total() }} azn</th>
                    </tr>


                </table>
                <div>
                    <form action="{{ route('cart.deleteAll') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-info pull-left" value="Səbəti boşalt">
                    </form>
                    <a href="#" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                </div>
            @else
                <p>Hazırda səbətdə məhsul yoxdur</p>
            @endif
        </div>
    </div>


    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>--}}
    {{--<script>--}}
        {{--$('.kredikarti').mask('0000-0000-0000-0000', { placeholder: "____-____-____-____" });--}}
        {{--$('.kredikarti_cvv').mask('000', { placeholder: "___" });--}}
        {{--$('.telefon').mask('(000) 000-00-00', { placeholder: "(___) ___-__-__" });--}}
    {{--</script>--}}
@endsection
