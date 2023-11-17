@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Редактирование отеля (ID {{ $hotel->id }})</h6>

        <form action="{{ route('hotel.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <select class="form-control" name="country_id">
                                <option value="{{$hotel->country_id}}">{{ $hotel->country->country_title }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">
                                        {{$country->country_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mg-b-10">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Город: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="hotel_town" placeholder="Город" value="{{$hotel->hotel_town}}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Наименование: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="hotel_title" placeholder="Наименование" value="{{$hotel->hotel_title}}">
                        </div>
                    </div>
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Количество звезд: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="hotel_stars" placeholder="Количество звезд" value="{{$hotel->hotel_stars}}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Количество номеров: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="hotel_rooms" placeholder="Количество номеров" value="{{$hotel->hotel_rooms}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label>Место: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote1" name="hotel_place">{{ $hotel->hotel_place }}</textarea><br>
                    </div>
                </div>

                <div class="col-lg-10">
                    <div class="form-group">
                        <label class="form-control-label">Туры: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote2" name="hotel_tours">{{ $hotel->hotel_tours }}</textarea><br>
                    </div>
                </div>

                <div class="col-lg-10">
                    <div class="form-group">
                        <label>Отель: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote3" name="hotel_about">{{ $hotel->hotel_about }}</textarea><br>
                    </div>
                </div>

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                    <a href="{{ route('admin.hotels') }}" class="btn btn-info">К списку отелей</a>
                </div>
            </div>
        </form>

        <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
            <h6 class="card-body-title">Изменение фото отеля</h6><br>

            <form action="{{ route('admin.hotel.updatePhoto', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Фото 1 (основное): <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image1" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image_one" value="{{ $hotel->hotel_image1 }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/{{ $hotel->hotel_image1 }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 80px; height: 80px;" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Фото 2: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image2" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image1" value="{{ $hotel->hotel_image2 }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/{{ $hotel->hotel_image2 }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 80px; height: 80px;" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Фото3: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image3" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image3" value="{{ $hotel->hotel_image3 }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/{{ $hotel->hotel_image3 }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 80px; height: 80px;" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Фото 4: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image4" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image4" value="{{ $hotel->hotel_image4 }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/{{ $hotel->hotel_image4 }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 80px; height: 80px;" alt="">
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                    <a href="{{ route('admin.hotels') }}" class="btn btn-info">К списку отелей</a>
                </div>

            </form>
        </div>


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
