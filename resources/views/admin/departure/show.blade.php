@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title" style="margin-bottom: 2rem">Предложение (ID: {{ $departure->id }})</h6>
        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Страна: </label>
                        <span style="text-transform: uppercase;">{{ $departure->country->country_title }}</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Город: </label>
                        <span style="text-transform: uppercase;">{{ $departure->departure_town }}</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Отель: </label>
                        <span style="text-transform: uppercase;">{{ $departure->hotel->hotel_title }}</span>
                    </div>
                </div>
            </div>
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Прибытие: </label>
                        <span style="text-transform: uppercase;">{{ $departure->departure_departure }}</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Убытие: </label>
                        <span style="text-transform: uppercase;">{{ $departure->departure_arrival }}</span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Дни: </label>
                        <span style="text-transform: uppercase;">{{ $departure->departure_days }}</span>
                    </div>
                </div>
            </div>
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Номер: </label>
                        <span style="text-transform: uppercase;">{{ $departure->departure_seats }}</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Стандарт: </label>
                        <span style="text-transform: uppercase;">{{ $departure->departure_standard }}</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Цена: </label>
                        <span style="text-transform: uppercase;">{{ number_format($departure->departure_price, 0, '.', ',' ) }} ₽</span>
                    </div>
                </div>
            </div>

            <div class="row mg-b-25">
                <img src="/{{ $departure->hotel->hotel_image1 }}" alt="" style="width: 22%; margin-left: 1rem">
            </div>

            <div class="form-layout-footer">
                <a href="{{ route('admin.departures') }}" class="btn btn-info">К списку предложений</a>
            </div><!-- form-layout-footer -->
        </div>
    </div>
@endsection
