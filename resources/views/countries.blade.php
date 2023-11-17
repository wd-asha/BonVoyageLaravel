@extends('layouts.countries')
@section('title', 'Bon Voyage | Страны')
@section('content')


    <div class="countris-bg">
    <h3>Страны для отдыха</h3>
    <div class="countris">
        @foreach($countries as $country)
        <div class="country-item">
            <img src="/{{$country->country_image}}" alt="">
            <div class="country-item_desc">
                <div class="country_name"><p>{{$country->country_title}}</p></div>
                <div class="hotel_count">
                    @php $count_hotels = 0; @endphp
                        @foreach($hotels as $hotel)
                            @if($hotel->country_id === $country->id)
                                @php $count_hotels = $count_hotels + 1; @endphp
                            @endif
                        @endforeach
                    <p>{{ $count_hotels }}</p>
                    <p> отелей</p>
                </div>
                @if($country->has_hotels)
                <a href="{{ route('hotels', $country->id) }}" class="select-hotel">Выбрать&nbsp;отель</a>
                @endif
            </div>
        </div>
        @endforeach

        {{--<div class="pagin">
            <div class="pagin-item pagin-active">1</div>
            <div class="pagin-item">2</div>
            <div class="pagin-item">3</div>
            <div class="pagin-item">4</div>
            <div class="pagin-item">5</div>
        </div>--}}

    </div>
</div>


@endsection
