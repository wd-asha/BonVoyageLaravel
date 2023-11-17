@extends('layouts.contacts')
@section('title', 'Bon Voyage | Контакты')
@section('content')

    <div class="contacts-bg">
        <h3>Контакты</h3>
        <div class="contacts">
            <img src="{{asset('images/office-min.jpg')}}" alt="">
            <div class="contacts-item_left">
                <div class="item-left_top">
                    <p class="contacts-address">
                        Москва,<br>пр.Вернадского, 9<br>метро «Университет»
                    </p>
                    <p class="contacts-address">с 08:00 до 20:00</p>
                    <p class="contacts-phone">8 800 775 775 8</p>
                    <p class="contacts-email">bonvoyage@gmail.com</p>
                    <p class="contacts-social">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-whatsapp"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-vk"></i>
                    </p>
                </div>
                <div class="item-left_middle">
                    <input type="text" placeholder="Ваше имя">
                    <input type="email" placeholder="Ваш email">
                    <textarea rows="2" placeholder="Ваше сообщение"></textarea>
                    <a href="#">Отправить</a>
                </div>
            </div>
        </div>
    </div>

@endsection