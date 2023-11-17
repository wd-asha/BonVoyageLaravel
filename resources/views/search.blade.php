@extends('layouts.search')
@section('title', 'Bon Voyage | Поиск')
@section('content')

    <div class="hotels-bg">

        <div class="search-container">
            <h4>Поиск предложений ({{ $departuresCount }})</h4>
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


        <div class="hotels">
            @if($departuresCount !== 0)
                @foreach($departures as $departure)
                    <div class="hotel">
                        <img src="/{{ $departure->hotel->hotel_image1 }}" alt="">
                        <div class="hotel-desc">
                            <div class="hotel-address">
                                <p>{{ $departure->departure_town }}</p>
                                <p style="font-size: 1rem">{{ $departure->country->country_title }}</p>
                            </div>
                            <div class="hotel-name">
                                <p>@php echo str_replace(" ", "<br>", $departure->hotel->hotel_title) @endphp</p>
                            </div>
                            <div class="hotel-address">
                                <p>{{ $departure->departure_seats }}</p>
                                <p>{{ $departure->departure_standard }}</p>
                            </div>
                            <div class="hotel-address">
                                <p>с {{ $departure->departure_departure }}</p>
                                <p>по {{ $departure->departure_arrival }}</p>
                                <p style="font-size: .7rem; font-weight: 200">({{ $departure->departure_days }} дней)</p>
                            </div>
                            <div class="hotel-price">
                                <p>{{ number_format($departure->departure_price, 0, '.', ' ' ) }} <i class="fa fa-ruble"></i></p>
                            </div>
                        </div>
                        <a href="{{ route('search.hotel', $departure->hotel->id ) }}" class="sel-tur">Подробнее</a>
                    </div>
                @endforeach
            @else
            <p style="text-align: center; padding-bottom: 4rem; width: 100%;">По вашему запросу ничего не найдено</p>
            @endif
        </div>

        <div>
            {{ $departures->withQueryString()->links('vendor.pagination.bootstrap-4') }}
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
