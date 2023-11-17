@extends('layouts.countries')
@section('title', 'Bon Voyage | Отель')
@section('content')

    <div class="golden-bg">

        <div class="slider-hotel">
            <div id="slide-1" class="slide">
                <img src="/{{ $hotel->hotel_image1 }}" alt="">
            </div>
            <div id="slide-2" class="slide">
                <img src="/{{ $hotel->hotel_image2 }}">
            </div>
            <div id="slide-3" class="slide">
                <img src="/{{ $hotel->hotel_image3 }}">
            </div>
            <div id="slide-4" class="slide">
                <img src="/{{ $hotel->hotel_image4 }}">
            </div>

            <div id="pagins">
                <div id="pagin-1"class="carrent"></div>
                <div id="pagin-2"></div>
                <div id="pagin-3"></div>
                <div id="pagin-4"></div>
            </div>
        </div>

        <div class="hotel-title">
            <p>{{ $hotel->hotel_town }}</p>
            <h3>{{ $hotel->hotel_title }}</h3>
            <p>
                @switch($hotel->hotel_stars)
                    @case('1')
                    <i class="fa fa-star"></i>
                    @break
                    @case('2')
                    <i class="fa fa-star"></i><i class="fa fa-star"></i>
                    @break
                    @case('3')
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    @break
                    @case('4')
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    @break
                    @default
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                @endswitch
            </p>
        </div>
        <div class="hotel-info">
            <div class="hotel-info_item">
                <h4>Место</h4>
                {!! $hotel->hotel_place !!}
            </div>
            <div class="hotel-info_item">
                <h4>Туры</h4>
                {!! $hotel->hotel_tours !!}
            </div>
            <div class="hotel-info_item">
                <h4>Отель ({{ $hotel->hotel_rooms }} номеров)</h4>
                {!! $hotel->hotel_about !!}
            </div>
            <div class="hotel-info_item item-tur">
                @foreach($departures as $departure)
                <div class="tur">
                    <div class="box1">
                        <span>{{ $departure->departure_departure }}</span> прибытие<br>
                        <span>{{ $departure->departure_arrival }}</span> убытие
                    </div>
                    <div class="box2">
                        <span>{{ $departure->departure_days }}</span> ночей
                    </div>
                    <div class="box3">{{ $departure->departure_seats }},<br>{{ $departure->departure_standard }}</div>
                    <div class="box4 font-plus">
                        <span>{{ number_format($departure->departure_price, 0, '.', ' ' )}}</span>
                        <i class="fa fa-ruble"></i>
                    </div>
                    <div class="box5">
                        @if($departure->departure_status === 0)
                            <form action="{{route('departure.addCart', $departure->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="select-departure">Выбрать</button>
                            </form>
                            {{--<a href="{{ route('departure.status1', $departure->id) }}" class="select-departure">Выбрать</a>--}}
                            @else
                            <a href="#" class="select-departure" style="opacity: 0; visibility: hidden;">Выбрать</a>
                        @endif
                    </div>
                </div>
                @endforeach
                @if(Cart::count() !== 0)
                    <a href="{{ route('cart') }}" class="in-cart">Выбранное</a>
                @endif
            </div>

        </div>

        <div class="hotels-link" style="padding-top: 2rem">
            <a href="{{ route('hotels', $hotel->country_id) }}">Выбрать другой отель</a>
        </div>
    </div>

@endsection
