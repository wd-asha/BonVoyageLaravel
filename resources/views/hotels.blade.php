@extends('layouts.countries')
@section('title', 'Bon Voyage | Отели')
@section('content')

    <div class="hotels-bg">
        <div class="hotels-title">
            <h3>Отели – {{ $country->country_title }}</h3>
        </div>
        <div class="hotels">
            @foreach($hotels as $hotel)
            <div class="hotel">
                <img src="/{{ $hotel->hotel_image1 }}" alt="">
                <div class="hotel-desc">
                    <div class="hotel-address">
                        <p>@php echo str_replace(" ", "<br>", $hotel->hotel_town) @endphp</p>
                    </div>
                    <div class="hotel-name">
                        <p>@php echo str_replace(" ", "<br>", $hotel->hotel_title) @endphp</p>
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
                    <div class="hotel-price">
                        @php
                            $price_ot = 100000;
                            $price_to = 0;
                            $departures = App\Models\Departure::all()->where('hotel_id', 'like', $hotel->id);
                            if($departures->count() !== 0) {
                                foreach($departures as $departure) {
                                    if($departure->departure_price < $price_ot) {
                                        $price_ot = $departure->departure_price;
                                    }
                                }
                            }else{ $price_ot = 0; }
                            if($departures->count() !== 0) {
                                foreach($departures as $departure) {
                                    if($departure->departure_price > $price_to) {
                                        $price_to = $departure->departure_price;
                                    }
                                }
                            }else{ $price_to = 0; }
                        @endphp
                        @if($hotel->has_departures)
                        <p><span style="font-size: .7rem">от</span> {{ number_format($price_ot, 0, '.', ' ' ) }} <i class="fa fa-ruble"></i></p>
                        <p><span style="font-size: .7rem">до</span> {{ number_format($price_to, 0, '.', ' ' ) }} <i class="fa fa-ruble"></i></p>
                        @endif
                    </div>
                </div>
                @if($hotel->has_departures)
                    <a href="{{ route('hotel', $hotel->id) }}" class="sel-tur">Подробнее</a>
                @endif
            </div>
            @endforeach
        </div>

    </div>

@endsection
