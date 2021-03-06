<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home_page') }}">
                <img src="{{asset('img/logo.png')}}">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="{{ route('search_page') }}" method="post">

                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="q" id="navbar-search" class="form-control" placeholder="Ara" value="{{ old('q') }}">
                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('cart_page') }}"><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">{{ Cart::count() }}</span></a></li>

                @guest
                <li><a href="{{ route('user.login') }}">Oturum Aç</a></li>
                <li><a href="{{ route('user.register') }}">Kaydol</a></li>
                @endguest

                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('orders_page') }}">Siparişlerim</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="javascript.void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Çıkış</a>
                            <form action="{{ route('user.logout') }}" method="post" id="logout-form">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>