@extends('layouts.team')
@section('title', 'Bon Voyage | Наша команда')
@section('content')

    <div class="services-bg">
        <div class="services-title">
            <h3>Сотрудники</h3>
            <h4>8 800 775 775 8</h4>
        </div>
        <div class="services">

            <div class="service">
                <img src="{{asset('images/empl8-min.jpg')}}" alt="">
                <div class="service-desc">
                    <div class="service-address">
                        <p>Отдел продаж для<br>туристических агентств</p>
                    </div>
                    <div class="service-name">
                        <p>Талашова<br>Марина</p>
                    </div>
                    <div class="service-price">
                        <p>talashova@gmail.com</p>
                    </div>
                </div>
                <a href="#" class="sel-tur">
                    доб.&nbsp;1242
                </a>
            </div>

            <div class="service">
                <img src="{{asset('images/empl7-min.jpg')}}" alt="">
                <div class="service-desc">
                    <div class="service-address">
                        <p>Отдел продаж<br>для частных лиц</p>
                    </div>
                    <div class="service-name">
                        <p>Антонова<br>Ольга</p>
                    </div>
                    <div class="service-price">
                        <p>antonova@gmail.com</p>
                    </div>
                </div>
                <a href="#" class="sel-tur">
                    доб.&nbsp;1805
                </a>
            </div>

            <div class="service">
                <img src="{{asset('images/empl1-min.jpg')}}" alt="">
                <div class="service-desc">
                    <div class="service-address">
                        <p>Отдел<br>бронирования билетов</p>
                    </div>
                    <div class="service-name">
                        <p>Куликова<br>Анна</p>
                    </div>
                    <div class="service-price">
                        <p>kulikova@gmail.com</p>
                    </div>
                </div>
                <a href="#" class="sel-tur">
                    доб.&nbsp;1341
                </a>
            </div>

            <div class="service">
                <img src="{{asset('images/empl4-min.jpg')}}" alt="">
                <div class="service-desc">
                    <div class="service-address">
                        <p>Пресс-служба</p>
                    </div>
                    <div class="service-name">
                        <p>Чертанова<br>Валентина</p>
                    </div>
                    <div class="service-price">
                        <p>chertanova@gmail.com</p>
                    </div>
                </div>
                <a href="#" class="sel-tur">
                    доб.&nbsp;1375
                </a>
            </div>

            <div class="service">
                <img src="{{asset('images/empl2-min.jpg')}}" alt="">
                <div class="service-desc">
                    <div class="service-address">
                        <p>Визовый отдел</p>
                    </div>
                    <div class="service-name">
                        <p>Сергеев<br>Виктор</p>
                    </div>
                    <div class="service-price">
                        <p>sergeev@gmail.com</p>
                    </div>
                </div>
                <a href="#" class="sel-tur">
                    доб.&nbsp;1522
                </a>
            </div>

            <div class="service">
                <img src="{{asset('images/empl3-min.jpg')}}" alt="">
                <div class="service-desc">
                    <div class="service-address">
                        <p>Отдел договоров</p>
                    </div>
                    <div class="service-name">
                        <p>Черепанов<br>Александр</p>
                    </div>
                    <div class="service-price">
                        <p>herepanov@gmail.com</p>
                    </div>
                </div>
                <a href="#" class="sel-tur">
                    доб.&nbsp;1397
                </a>
            </div>

        </div>

    </div>


@endsection