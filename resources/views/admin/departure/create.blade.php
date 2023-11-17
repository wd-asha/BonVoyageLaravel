@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Новое предложение</h6>

        <form action="{{ route('departure.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <form>
                        <div class="col-lg-3">
                            <div class="form-group mg-b-10-force">
                                <select  id="country-dropdown" class="form-control" name="country_id">
                                    <option value="">Выберите страну</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">
                                            {{$country->country_title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group mg-b-10-force">
                                <select id="state-dropdown" class="form-control" name="hotel_id">
                                </select>
                            </div>
                        </div>
                    </form>
                </div><br>
                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Вылет: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" name="departure_departure" placeholder="Дата вылета">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Прилет: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" name="departure_arrival" placeholder="Дата прилета">
                        </div>
                    </div>
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Номер: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="departure_seats" placeholder="Вместимость номера">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Стандарт: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="departure_standard" placeholder="Стандарт номера">
                        </div>
                    </div>
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Дни: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="departure_days" placeholder="Количество ночей">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Цена: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="departure_price" placeholder="Цена"><br>
                        </div>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Город: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="departure_town" placeholder="Город">
                        </div>
                    </div>

                </div><br><br><!-- row -->

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                    <a href="{{ route('admin.departures') }}" class="btn btn-info">К списку предложений</a>
                </div><!-- form-layout-footer -->
            </div>
        </form>

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