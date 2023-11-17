<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/covid.css')}}" rel="stylesheet">
</head>
<body>

<section class="section0">
    <div class="section0-text">
        <div class="logo-panel">
            <div class="mobile-logo">
                <a href="{{ URL('/') }}">
                    <h2>Турагенство</h2>
                    <h1>Bon<br>Voyage</h1>
                    <h1>Bon Voyage</h1>
                </a>
            </div>
        </div>
        <div class="phone-panel">
            <div class="mobile-phone">
                <h3>8 800 775 775 8</h3>
                <a href="{{ route('countries') }}">Выбрать страну</a>
            </div>
        </div>
        <div class="burger-panel">
            <div class="mobile-burger" id="mobileBurger">
                <span class="burg2"></span>
            </div>
        </div>
    </div>
</section>

{{-- Login Form --}}
<div class="popup" id="popup">
    <a href="#" class="popup-area"></a>
    <div class="popup-body">
        <div class="popup-content">
            <a href="#" class="popup-close">
                <i class="fa fa-times"></i>
            </a>
            <div class="popup-title">Вход</div>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div  class="popup-text">
                    <input type="email" name="email" id="emailInput" placeholder="Email" value="{{ old('email') }}" autofocus>
                    @error('email')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <input type="password" placeholder="Пароль" id="passInput" name="password">
                    @error('password')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <button type="submit" class="login-link">Войти</button>
                </div>
            </form>
            <div class="reg-link">
                <input type="checkbox" id="degree" style="font-size: .8rem; line-height: .8rem;">
                <label for="degree" style="font-size: .8rem; line-height: .8rem;">Согласие на обработку персональных данных</label>
            </div>
            <div class="reg-link">
                <a href="#popupReg">Регистрация</a>
            </div>
        </div>
    </div>
</div>
{{-- end login form --}}

{{-- Reg Form --}}
<div class="popup" id="popupReg">
    <a href="#" class="popup-area"></a>
    <div class="popup-body">
        <div class="popup-content">
            <a href="#" class="popup-close">
                <i class="fa fa-times"></i>
            </a>
            <div class="popup-title">Регистрация</div>
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div  class="popup-text">
                    <input type="text" placeholder="Имя" id="name" name="name" value="{{ old('name') }}" autofocus>
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" autofocus>
                    @error('email')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <input type="password" placeholder="Пароль" id="password" name="password">
                    @error('password')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <input type="password" placeholder="Повтор пароля" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <button type="submit" class="login-link">Зарегистрировать</button>
                </div>
            </form>
            <div class="reg-link">
                <input type="checkbox" id="degree" style="font-size: .8rem; line-height: .8rem;">
                <label for="degree" style="font-size: .8rem; line-height: .8rem;">Согласие на обработку персональных данных</label>
            </div>
            <div class="reg-link">
                <a href="#popup">Вход</a>
            </div>
        </div>
    </div>
</div>
{{-- end regform --}}

{{-- Main Menu --}}
<div class="bg-header">
    <div class="header">
        <div class="header_logo">
            <a href="{{ URL('/') }}">
                <h2>турагенство</h2>
                <h1>Bon Voyage</h1>
            </a>
        </div>
        <div class="header_phone">
            <h2>8 800 775 775 8</h2>
            <a href="{{ route('countries') }}">Выбрать страну</a>
        </div>
        <div class="header_menu">
            <div class="header_menu-items">
                <div class="header_menu-item">
                    <a href="{{ URL('/') }}">Главная</a>
                </div>
                <div class="header_menu-item">
                    <a href="{{ route('about') }}">О нас</a>
                </div>
                <div class="header_menu-item">
                    <a href="{{ route('team') }}">Сотрудники</a>
                </div>
                <div class="header_menu-item">
                    <a href="{{ route('covid') }}" class="active-menu">COVID-19</a>
                </div>
                <div class="header_menu-item">
                    <a href="{{ route('contacts') }}">Контакты</a>
                </div>
            </div>
            <div class="header_menu-login">
                <div class="header_login-item">
                    @if(Cart::count() !== 0)
                        <a href="{{ route('wishlist') }}" style="display: inline-block">Выбранное</a>
                    @endif
                    @guest
                        <a href="#popup" style="display: inline-block">Вход</a>
                    @endguest
                    @auth
                        <a href="{{ route('wishlist') }}#account" style="display: inline-block">Аккаунт</a>
                    @endauth
                    <a href="{{ route('search') }}" style="display: inline-block">Поиск</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end main menu --}}
{{-- Mobile Menu --}}
<div class="mobile-panel-menu" id="mobilePanelMenu">
    <div class="mobile-menu">
        <div class="mobile-menu-item">
            <div class="mobile-burger-close" id="mobileBurgerClose">
                <span class="burg-close3"></span>
                <span class="burg-close4"></span>
            </div>
        </div>
        <div class="mobile-menu-item">
            <a href="{{ URL('/') }}" class="menu-item-active">Главная</a>
        </div>
        <div class="mobile-menu-item">
            <a href="{{ route('about') }}">О нас</a>
        </div>
        <div class="mobile-menu-item">
            <a href="{{ route('team') }}">Сотрудники</a>
        </div>
        <div class="mobile-menu-item">
            <a href="{{ route('covid') }}">COVID-19</a>
        </div>
        <div class="mobile-menu-item">
            <a href="{{ route('contacts') }}">Контакты</a>
        </div>
        @if(Cart::count() !== 0)
            <div class="mobile-menu-item">
                <a href="{{ route('wishlist') }}">Выбранное</a>
            </div>
        @endif
        @guest
            <div class="mobile-menu-item">
                <a href="#popup">Вход</a>
            </div>
        @endguest
        @auth
            <div class="mobile-menu-item">
                <a href="{{ route('wishlist') }}#account">Аккаунт</a>
            </div>
        @endauth
        <div class="mobile-menu-item">
            <a href="{{ route('search') }}">Поиск</a>
        </div>
    </div>
</div>
{{-- end mobile menu --}}

@yield('content')

<footer>
    <div><i class="fa fa-facebook fa-footer"></i></div>
    <div><i class="fa fa-rss fa-footer"></i></div>
    <div><i class="fa fa-twitter fa-footer"></i></div>
    <div><i class="fa fa-google-plus fa-footer"></i></div>
</footer>
<div class="copyright">
    <a href="http://wd-asha.ru">&copy; wd-asha</a>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script>
    $(function () {
        let burger = $('#burger');
        let mobileBurger = $('#mobileBurger');
        let burgerClose = $('#burgerClose');
        let mobileBurgerClose = $('#mobileBurgerClose');
        let panelMenu = $('#panelMenu');
        let mobilePanelMenu = $('#mobilePanelMenu');
        let covids = $('.covids');
        let nextLink = $('.next i');
        let previusLink = $('.previus i');
        let inAiroport = $('.in-airoport');
        let inBoard = $('.in-board');

        function CloseBurger() {
            panelMenu.css('opacity', 0);
            overlayRight1.css('opacity', 0);
            overlayRight2.css('opacity', 0);
            overlayRight3.css('opacity', 0);
            overlayRightPanelWhite.css('opacity', 0);
            burgerClose.css('display', 'none');
            burger.css('display', 'block');
            setTimeout(function (){
                burger.css('opacity', 1);
            }, 200);
        }

        burger.on('click', function () {
            panelMenu.css('opacity', 1);
            burger.css('display', 'none');
            burgerClose.css('display', 'block');
            setTimeout(function (){
                burgerClose.css('opacity', 1);
            }, 200);

        });
        burgerClose.on('click', function () {
            CloseBurger();
        });

        mobileBurger.on('click', function () {
            mobilePanelMenu.css('top', 0);
            mobileBurger.css('display', 'none');
        });

        mobileBurgerClose.on('click', function () {
            mobilePanelMenu.css('top', '-110%');
            mobileBurger.css('display', 'block');
        });

        covidsHeight = inAiroport.height() + "px";
        covids.css('height', covidsHeight);

        nextLink.on('click', function () {
            inAiroport.fadeOut(600);
            inBoard.fadeIn(600);
            covidsHeight = inBoard.height() + "px";
            covids.css('height', covidsHeight);
        });

        previusLink.on('click', function () {
            inBoard.fadeOut(600);
            inAiroport.fadeIn(600);
            covidsHeight = inAiroport.height() + "px";
            covids.css('height', covidsHeight);
        })

    })
</script>

</body>
</html>
