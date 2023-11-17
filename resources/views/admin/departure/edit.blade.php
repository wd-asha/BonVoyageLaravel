@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Редактирование предложения (ID {{ $departure->id }})</h6>

        <form action="{{ route('departure.update', $departure->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <form>
                        <div class="col-lg-3">
                            <div class="form-group mg-b-10-force">
                                <select class="form-control" name="country_id">
                                    <option value="{{$departure->country_id}}">{{ $departure->country->country_title }}</option>
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
                                <select  id="country-dropdown" class="form-control" name="hotel_id">
                                <option value="{{ $departure->hotel_id }}">{{ $departure->hotel->hotel_title }}</option>
                                    @foreach ($hotels as $hotel)
                                        <option value="{{$hotel->id}}">
                                            {{$hotel->hotel_title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div><br>
                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Прибытие: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" name="departure_departure" placeholder="Дата вылета" value="{{$departure->departure_departure}}">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Убытие: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" name="departure_arrival" placeholder="Дата прилета" value="{{$departure->departure_arrival}}">
                        </div>
                    </div>
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Номер: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="departure_seats" placeholder="Вместимость номера" value="{{$departure->departure_seats}}">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Стандарт: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="departure_standard" placeholder="Стандарт номера" value="{{$departure->departure_standard}}">
                        </div>
                    </div>
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Дни: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="departure_days" placeholder="Количество ночей" value="{{$departure->departure_days}}">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Цена: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="departure_price" placeholder="Цена" value="{{$departure->departure_price}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Город: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="departure_town" placeholder="Город" value="{{$departure->departure_town}}">
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


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>

    <script>
        $(document).on("click", "[type='checkbox']", function(e) {
            if (this.checked) {
                $(this).attr("value", "true");
            } else {
                $(this).attr("value","false");}
        });
    </script>

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL4(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#four')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
