@extends('layouts.app')
@section('title', 'Bon Voyage | Туристическое агенство')
@section('content')

<section class="section0">
    <div class="section0-text">
        <div class="logo-panel">
            <div class="mobile-logo">
                <h2>Турагенство</h2>
                <h1>Bon<br>Voyage</h1>
                <h1>Bon Voyage</h1>
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
                <span class="burg1"></span>
                <span class="burg2"></span>
                <span class="burg3"></span>
            </div>
        </div>
    </div>
</section>

<section class="section1">
    <div class="lineUp"></div>
    <img src="{{asset('images/slide-0-1900x1000-min.jpg')}}" id="slideImg0" alt="">
    <img src="{{asset('images/slide-3-1900x1000-min.jpg')}}" id="slideImg1" alt="">
    <img src="{{asset('images/slide-2-1900x1000-min.jpg')}}" id="slideImg2" alt="">
    <img src="{{asset('images/slide-1-1900x1000-min.jpg')}}" id="slideImg3" alt="">
    <div class="overlay-left-panel-white">
        <div class="section1-text">
            <h2>Турагенство</h2>
            <h1>Bon Voyage</h1>
            <h2 class="phone">8 800 775 775 8</h2>
            <p>Вот уже более 20 лет мы заботится о том, чтобы вы могли достойно отдохнуть и получить незабываемые впечатления, путешествуя по самым привлекательным курортам и восхитительным городам нашей планеты</p>
            <a href="{{ route('countries') }}">Выбрать страну</a>
        </div>
        <div class="pagins">
            <span class="pagin pagin-active" id="pagin1"></span>
            <span class="pagin" id="pagin2"></span>
            <span class="pagin" id="pagin3"></span>
        </div>
    </div>
    <div class="burger" id="burger">
        <span class="burg2"></span>
    </div>
    <div class="burger-close" id="burgerClose">
        <span class="burg-close1"></span>
        <span class="burg-close2"></span>
    </div>

    <div class="overlay-right-panel-white" id="overlayRightPanelWhite"></div>

    {{-- Side Panel Menu --}}
    <div class="panel-menu" id="panelMenu">
        <div class="menu">
            <div class="menu-item">
                <a href="{{ route('about') }}">О нас</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('team') }}">Сотрудники</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('covid') }}">COVID-19</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('contacts') }}">Контакты</a>
            </div>
            @if(Cart::count() !== 0)
                <div class="menu-item">
                    <a href="{{ route('wishlist') }}">Выбранное</a>
                </div>
            @endif
            @guest
                <div class="menu-item">
                    <a href="#popup">Вход</a>
                </div>
                @endguest
            @auth
                <div class="menu-item">
                    <a href="{{ route('wishlist') }}#account">Аккаунт</a>
                </div>
            @endauth
            <div class="menu-item">
                <a href="{{ route('search') }}">Поиск</a>
            </div>
        </div>
    </div>
    {{-- end side panel menu --}}
    <div class="lineDown"></div>
</section>

<div class="bg-section-2">
    <div class="section-2">
        <div class="section-2-item gor-tury" id="service-1">
            <div class="section-2-item-img"></div>
            <p>Горящие туры</p>
        </div>
        <div class="section-2-item indiv-tury" id="service-2">
            <div class="section-2-item-img"></div>
            <p>Индивидуальные туры</p>
        </div>
        <div class="section-2-item bud-tury" id="service-3">
            <div class="section-2-item-img"></div>
            <p>Бюджетные туры</p>
        </div>
        <div class="section-2-item tury-po-ros" id="service-4">
            <div class="section-2-item-img"></div>
            <p>Бюджетные туры</p>
        </div>
        <div class="section-2-item plyazh-tury" id="service-5">
            <div class="section-2-item-img"></div>
            <p>Пляжные туры</p>
        </div>
        <div class="section-2-item ekskurs-tury" id="service-6">
            <div class="section-2-item-img"></div>
            <p>Экскурсионные туры</p>
        </div>
        <div class="section-2-item gorn-tury" id="service-7">
            <div class="section-2-item-img"></div>
            <p>Горные туры</p>
        </div>
        <div class="section-2-item kredit" id="service-8">
            <div class="section-2-item-img"></div>
            <p>Отдых в кредит</p>
        </div>
    </div>
</div>

<div class="bg-section-3">
    <div class="section-3">

        <div class="section-3-item">
            <p>Мы обязательно проверяем каждую путевку лично и фиксируем положительные отклики наших клиентов, чтобы подобрать наиболее комфортабельные номера и самые интересные маршруты путешествий!</p>
            <p>Таким образом мы нарабатываем бесценный опыт и базу лучших предложений по соответствию цена-качество у ведущих туроператоров.</p>
        </div>
        <div class="section-3-item">
            <h4>Познавайте этот прекрасный<br>мир вместе с нами!</h4>
            <p>Независимо от того, работаем мы умственно или физически, всем нам нужны передышки и новые впечатления. От качества отдыха во многом зависит наше здоровье, духовная и творческая энергия.</p>
            <p>Компания «Bon Voyage» вот уже более 20 лет заботится о том, чтобы вы могли достойно отдохнуть и получить незабываемые впечатления, путешествуя по самым привлекательным курортам и восхитительным городам нашей планеты.</p>
        </div>
        <div class="section-3-item">
            <p>Мы стараемся учитывать целесообразность посещения тех или иных мест с учетом сезона и погодных условий.</p>
            <p>А для туристов, которые хотят отправиться в путешествие с творческой группой, мы можем организовать индивидуальные туры.</p>
        </div>
        <div class="section-3-item">
            <p>Для нас имеет большое значение, насколько понравится тур клиентам, поэтому мы стараемся сопровождать вас от первой заявки, до возвращения из путешествия.</p>
            <p>В любое время мы будем на связи, помогая и поддерживая, убеждаясь, что вы довольны результатом.</p>
        </div>
        <div class="section-3-item">
            <p>День за днем мы улучшаем качество услуг, совершенствуя сервисы, сокращая сроки обработки заказов, создавая для вас идеально комфортные условия сотрудничества.</p>
            <p>За последние годы мы ввели ряд удобных для клиентов нововведений: построили собственную агентскую сеть, создали удобный сайт в котором система поиска и бронирования туров позволяет узнать актуальные предложения и цены на путевки всего за нескольку секунд.</p>
        </div>
        <div class="section-3-item">
            <p>Дружная команда сети туристических агентств «Bon Voyage» за свою многолетнюю деятельность получила более 70 наград за профессионализм и исключительно ответственное отношение к работе.</p>
        </div>

        <div class="search-box">
            <h4>Поиск предложений</h4>
            <form class="formSearch" action="{{ route('search.depart') }}" method="GET">
                @csrf
                <div class="form-control">
                    <label for="country-dropdown" style="color: rgba(30, 106, 119, 1.0); padding-bottom: .5rem">Страна</label>
                    <select  id="country-dropdown" class="form-control-select" name="country_id">
                        <option value="">Выберите страну</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">
                                {{$country->country_title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="state-dropdown" style="color: rgba(30, 106, 119, 1.0); padding-bottom: .5rem">Отель</label>
                    <select id="state-dropdown" class="form-control-select" name="hotel_id"></select>
                </div>
                <div class="form-control">
                    <label for="dateOut" style="color: rgba(30, 106, 119, 1.0); padding-bottom: .5rem">Дата въезда</label>
                    <input type="date" value="" id="dateIn" name="dateIn">
                </div>
                <div class="form-control">
                    <label for="days" style="color: rgba(30, 106, 119, 1.0); padding-bottom: .5rem">Количество дней</label>
                    <input type="number" value="" min="1" max="30" id="days" name="days">
                </div>
                <div class="form-control">
                    <label for="men" style="color: rgba(30, 106, 119, 1.0); padding-bottom: .5rem">Количество человек</label>
                    <input type="number" value="" min="1" max="10" id="men" name="men">
                </div>
                <div class="form-control">
                    <button type="submit" id="submit">Найти</button>
                </div>
            </form>
        </div>

    </div>

</div>

<div class="bg-section-4">
    <h2>Почему выбирают нас</h2>
    <div class="section-4">
        <div class="section-4-item" id="item1">
            <div>
                <i class="fa fa-umbrella"></i>
                <h3>Страхование</h3>
                <h3>Страхование</h3>
            </div>
            <p>Страховка, приобретенная Вами, станет надежной опорой в непредвиденных случаях, которыми так богата любая дорога. Тем более, что цена страхового полиса практически незаметна, по сравнению стоимостью путевки. Зато, при наступлении страхового случая, полис всегда выручит Вас и поможет найти оптимальный выход из самых сложных и тяжелых ситуаций.</p>
        </div>
        <div class="section-4-item" id="item2">
            <div>
                <i class="fa fa-clock-o"></i>
                <h3>Туры в<br>рассрочку</h3>
                <h3>Туры в рассрочку</h3>
            </div>
            <p>Выгодные условия по реализации туров в рассрочку. Выгодно туристам, выгодно агентствам. Рассрочка оформляется путем предоставления агентством скидки клиенту на сумму процентов за пользование кредитом. Возможно приобретение тура без первоначального взноса и оплата его в течение более продолжительного срока — до 24 месяцев!</p>
        </div>
        <div class="section-4-item" id="item3">
            <div>
                <i class="fa fa-credit-card"></i>
                <h3>Дисконтная<br>карта</h3>
                <h3>Дисконтная карта</h3>
            </div>
            <p>Дисконтная карта предоставляет право на получение скидки на туры во всех офисах компании. Скидка, в соответствии с дисконтной шкалой, распространяется на все последующие приобретенные туры. Срок действия дисконтной карты не ограничен. Многодетным семьям, имеющим 3 и более детей, а так же семьям, имеющим детей инвалидов, предоставляется дополнительная скидка 10%.</p>
        </div>
        <div class="section-4-item" id="item4">
            <div>
                <i class="fa fa-briefcase"></i>
                <h3>Корпоротивным<br>клиентам</h3>
                <h3>Корпоротивным клиентам</h3>
            </div>
            <p>Возможности, предоставляемые корпоративным клиентам нашей компанией: Максимально быстрое бронирование заказов по факсу, электронной почте либо телефону, персональный менеджер, несущий ответственность за заказы той компании, которая обслуживает клиента, быстрая доставка документации на проезд курьерами компании, Возможна отсрочка оплаты до 3-5 рабочих дней.</p>
        </div>
        <div class="section-4-item" id="item5">
            <div>
                <i class="fa fa-gift"></i>
                <h3>Подарочные<br>сертификаты</h3>
                <h3>Подарочные сертификаты</h3>
            </div>
            <p>Это отличная возможность сделать полезный подарок друзьям и близким. Обладатель сертификата имеет возможность самостоятельного выбора тура, по подходящим ему критериям: период поездки, страна, отель, все в соответствии с пожеланием счастливого владельца сертификата. Вы можете подарить его как в электронном варианте – в виде письма-открытки, либо вручить красиво-оформленный вариант сертификата в фирменном конверте лично.</p>
        </div>
        <div class="section-4-item" id="item6">
            <div>
                <i class="fa fa-cc-mastercard"></i>
                <h3>Способы<br>оплаты</h3>
                <h3>Способы оплаты</h3>
            </div>
            <p>Самый простой и удобный способ оплаты тура — прийти лично в  ближайший наш офис и оплатить наличными. Возможны и другие варианты оплаты туров: банковскими картами VISA и Master Card или  безналичным сопосбом перечислением по банковским реквизитам. Вы также можете бесплатно вызвать курьера или прислать своего представителя с оплатой за тур.</p>
        </div>


        <form class="section-5" action="{{ route('subscribe') }}" method="POST">
            @csrf
                <div class="section-5-txt">
                    <p>Подпишитесь на нашу рассылку</p>
                </div>
                <div class="section-5-input">
                    <input type="email" name="email" placeholder="Ваш e-mail">
                </div>
                <div class="section-5-btn">
                    <button type="submit" name="submit">Подписаться</button>
                </div>
        </form>


    </div>
</div>

<script src="{{ asset('js/ajax.js') }}"></script>
<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>

<script>

    $(document).ready(function () {
        /*------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------*/
        $('#country-dropdown').on('change', function () {
            let idCountry = this.value;
            $("#state-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dropdown').html('<option value="">Выберите отель</option>');
                    $.each(result.hotels, function (key, value) {
                        $("#state-dropdown").append('<option value="' + value
                            .id + '">' + value.hotel_title + '</option>');
                    });
                }
            });
        });
    });
</script>

@endsection
