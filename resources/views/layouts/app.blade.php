<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
</head>
<body>

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

<div class="mobile-panel-menu" id="mobilePanelMenu">
    <div class="mobile-menu">
        <div class="mobile-menu-item">
            <div class="mobile-burger-close" id="mobileBurgerClose">
                <span class="burg-close3"></span>
                <span class="burg-close4"></span>
            </div>
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
        <div class="mobile-menu-item">
            @guest
                <a href="#popup">
                    Вход
                </a>
            @endguest
            @auth
                <a href="{{ route('wishlist') }}">
                    Личный кабинет
                </a>
            @endauth
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('message'))
        let type="{{Session::get('alert-type','info')}}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
<script>
    $(function () {
        let burger = $('#burger');
        let mobileBurger = $('#mobileBurger');
        let burgerClose = $('#burgerClose');
        let mobileBurgerClose = $('#mobileBurgerClose');
        let panelMenu = $('#panelMenu');
        let mobilePanelMenu = $('#mobilePanelMenu');
        let overlayRightPanel = $('#overlayRightPanel');
        let overlayRightPanelWhite = $('#overlayRightPanelWhite');
        let pagin1 = $('#pagin1');
        let pagin2 = $('#pagin2');
        let pagin3 = $('#pagin3');
        let slideImg1 = $('#slideImg1');
        let slideImg2 = $('#slideImg2');
        let slideImg3 = $('#slideImg3');
        let count = 1;
        let selectItem1 = $('#selectItem1');
        let selectItem2 = $('#selectItem2');
        let selectBtns = $('.select-btn');
        let selectPanelCity = $('#selectPanelCity');
        let selectPanelCountry = $('#selectPanelCountry');
        let selectItems = $('.item');

        selectBtns.on('click', function () {
            let selectBtn = $(this).attr('id');
            if(selectBtn === 'selectItem1') {
                selectPanelCity.slideToggle(300);
                selectPanelCountry.slideUp(300);
            }
            if(selectBtn === 'selectItem2') {
                selectPanelCountry.slideToggle(300);
                selectPanelCity.slideUp(300);
            }
        });

        selectItems.on('click', function () {
            let selectItem = $(this).html();
            $(this).parent().siblings("INPUT").attr("value", selectItem);
            $(this).parent().slideToggle(300);
            selectItems.each(function () {
                $(this).removeClass('item-select');
            });
            $(this).addClass('item-select');
        });

        function CloseBurger() {
            panelMenu.css('opacity', 0);
            overlayRightPanelWhite.css('opacity', 0);
            burgerClose.css('display', 'none');
            burger.css('display', 'block');
            setTimeout(function (){
                burger.css('opacity', 1);
            }, 200);
        }

        pagin1.on('click', function (e) {
            e.preventDefault();
            slideImg3.fadeOut(300);
            slideImg2.fadeOut(300);
            slideImg1.fadeIn(600);
            overlayRightPanelWhite.css('opacity', 0);
            pagin3.removeClass('pagin-active');
            pagin2.removeClass('pagin-active');
            $(this).addClass('pagin-active');
            CloseBurger();
            count = 1;
        });
        pagin2.on('click', function (e) {
            e.preventDefault();
            slideImg3.fadeOut(300);
            slideImg1.fadeOut(300);
            slideImg2.fadeIn(600);
            overlayRightPanelWhite.css('opacity', 0);
            pagin3.removeClass('pagin-active');
            pagin1.removeClass('pagin-active');
            $(this).addClass('pagin-active');
            CloseBurger();
            count = 2;
        });
        pagin3.on('click', function (e) {
            e.preventDefault();
            slideImg1.fadeOut(300);
            slideImg2.fadeOut(300);
            slideImg3.fadeIn(600);
            overlayRightPanelWhite.css('opacity', 0);
            pagin1.removeClass('pagin-active');
            pagin2.removeClass('pagin-active');
            $(this).addClass('pagin-active');
            CloseBurger();
            count = 3;
        });

        burger.on('click', function () {
            panelMenu.css('opacity', 1);
            overlayRightPanelWhite.css('opacity', 1);
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
        })

        let target1 = $('#item1');
        let targetPos1 = target1.offset().top;
        let winHeight1 = $(window).height();
        let scrollToElem1 = targetPos1 - winHeight1;
        $(window).scroll(function(){
            let winScrollTop = $(this).scrollTop() - 200;
            if(winScrollTop > scrollToElem1){
                target1.css('opacity', 1);
                target1.addClass('slide-in-blurred-bottom');
            }
        });

        let target2 = $('#item2');
        let targetPos2 = target2.offset().top;
        let winHeight2 = $(window).height();
        let scrollToElem2 = targetPos2 - winHeight2;
        $(window).scroll(function(){
            let winScrollTop = $(this).scrollTop() - 200;
            if(winScrollTop > scrollToElem2){
                target2.css('opacity', 1);
                target2.addClass('slide-in-blurred-bottom');
            }
        });

        let target3 = $('#item3');
        let targetPos3 = target3.offset().top;
        let winHeight3 = $(window).height();
        let scrollToElem3 = targetPos3 - winHeight3;
        $(window).scroll(function(){
            let winScrollTop = $(this).scrollTop() - 200;
            if(winScrollTop > scrollToElem3){
                target3.css('opacity', 1);
                target3.addClass('slide-in-blurred-bottom');
            }
        });

        let target4 = $('#item4');
        let targetPos4 = target4.offset().top;
        let winHeight4 = $(window).height();
        let scrollToElem4 = targetPos4 - winHeight4;
        $(window).scroll(function(){
            let winScrollTop = $(this).scrollTop() - 200;
            if(winScrollTop > scrollToElem4){
                target4.css('opacity', 1);
                target4.addClass('slide-in-blurred-bottom');
            }
        });

        let target5 = $('#item5');
        let targetPos5 = target5.offset().top;
        let winHeight5 = $(window).height();
        let scrollToElem5 = targetPos5 - winHeight5;
        $(window).scroll(function(){
            let winScrollTop = $(this).scrollTop() - 200;
            if(winScrollTop > scrollToElem5){
                target5.css('opacity', 1);
                target5.addClass('slide-in-blurred-bottom');
            }
        });

        let target6 = $('#item6');
        let targetPos6 = target6.offset().top;
        let winHeight6 = $(window).height();
        let scrollToElem6 = targetPos6 - winHeight6;
        $(window).scroll(function(){
            let winScrollTop = $(this).scrollTop() - 200;
            if(winScrollTop > scrollToElem6){
                target6.css('opacity', 1);
                target6.addClass('slide-in-blurred-bottom');
            }
        });

    })
</script>

</body>
</html>
