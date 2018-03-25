@extends('layouts.main')
@section('title','Ödəmə səhifəsi')

@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Ödəniş</h2>
            <form action="{{ route('payment.make') }}" method="post">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-md-5">
                    <h3>Ödəmə məlumatları</h3>
                    <div class="form-group">
                        <label for="cartno">Kredit Kartı Nömrəsi</label>
                        <input type="text" class="form-control kredikarti" id="cartno" name="cartno" style="font-size:20px;" required>
                    </div>
                    <div class="form-group">
                        <label for="cartexpiredatemonth">Son İsitfadə Tarixi</label>
                        <div class="row">
                            <div class="col-md-6">
                                Ay
                                <select name="cartexpiredatemonth" id="cartexpiredatemonth" class="form-control" required>
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                İl
                                <select name="cartexpiredateyear" class="form-control" required>
                                    <option>2017</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardcvv2">CVV (Təhlükəsizlik nömrəsi)</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control kredikarti_cvv" name="cardcvv2" id="cardcvv2" required>
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" checked> Ön bilgilendirme formunu okudum ve kabul ediyorum.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" checked> Mesafeli satış sözleşmesini okudum ve kabul ediyorum.</label>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-success btn-lg">Ödeme Yap</button>
                </div>
                <div class="col-md-7">
                    <h4>Ödənəcək məbləğ</h4>
                    <span class="price">{{ Cart::total() }}<small>Azn</small></span>

                    <h4>Karqo</h4>
                    <span class="price">{{ Cart::tax() }}<small>Azn</small></span>

                    <h1 class="text-center">Çatdırılma məlumatları</h1>
                    <h3 class="text-center" style="margin-bottom: 10px;">Address məlumatları </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fullname">Ad Soyad </label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullname}}" style="font-size:20px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Ev telefonu </label>
                                <input type="text" class="form-control telefon" id="phone" name="phone" value="{{ $user->userDetail->phone }}" style="font-size:20px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_phone">Mobil telefon</label>
                                <input type="text" class="form-control telefon" id="mobile_phone" name="mobile_phone" value="{{ $user->userDetail->mobile_phone }}" style="font-size:20px;" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Adress </label>
                                <textarea type="text" class="form-control" id="address" name="address" style="font-size: 20px; margin-top: 0px; margin-bottom: 0px; height: 108px;" >
                                    {{ $user->userDetail->address }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 30px;">
                        <a href="javascript:void(0);" class="btn btn-primary btn-xs float-right">Dəyişdir</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script>
        $('.kredikarti').mask('0000-0000-0000-0000', { placeholder: "____-____-____-____" });
        $('.kredikarti_cvv').mask('000', { placeholder: "___" });
        $('.telefon').mask('(000) 000-00-00', { placeholder: "(___) ___-__-__" });
    </script>
@endsection
