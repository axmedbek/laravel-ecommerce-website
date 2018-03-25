<h1>{{ config('app.name') }}</h1>
<p>Salam  {{ $user->fullname }} , Qeydiyyatiniz ugurla edildi</p>
<p>Qeydiyati tamamlamaq ucun bu linke tiklayin <a href="{{ config('app.url') }}/user/activation/{{  $user->activation_code }}">Tikla</a></p>
