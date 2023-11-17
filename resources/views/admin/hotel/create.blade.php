@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Новый отель</h6>

        <form action="{{ route('hotel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-layout">
            <div class="row mg-b-25">

                <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Страна: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" name="country_id">
                            <option label="Выберите страну"></option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_title }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Город: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="hotel_town" placeholder="Введите город"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Название: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="hotel_title" placeholder="Наименование отеля"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Звезды: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="hotel_stars" placeholder="Количество звезд"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Номера: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="hotel_rooms" placeholder="Количество номеров"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Цена: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="hotel_price" placeholder="Минимальная цена"><br>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Место: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote1" name="hotel_place"></textarea><br>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Туры: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote2" name="hotel_tours"></textarea><br>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Отель: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote3" name="hotel_about"></textarea><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Фото 1 (основное): <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="hotel_image1" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br><br>
                            <span class="custom-file-control"></span>
                            <img src="{{ asset('media/hotels/empty-image.png') }}" id="one">
                        </label>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Фото 2: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="hotel_image2" data-placeholder="Выберите фото" onchange="readURL2(this);"><br><br><br>
                            <span class="custom-file-control"></span>
                            <img src="{{ asset('media/hotels/empty-image.png') }}" id="two">
                        </label>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Фото 3: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="hotel_image3" data-placeholder="Выберите фото" onchange="readURL3(this);"><br><br><br>
                            <span class="custom-file-control"></span>
                            <img src="{{ asset('media/hotels/empty-image.png') }}" id="three">
                        </label>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Фото 4: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="hotel_image4" data-placeholder="Выберите фото" onchange="readURL4(this);"><br><br><br>
                            <span class="custom-file-control"></span>
                            <img src="{{ asset('media/hotels/empty-image.png') }}" id="four">
                        </label>
                    </div>
                </div><!-- col-4 -->

            </div><br><br><!-- row -->

            <hr>

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                <a href="{{ route('admin.hotels') }}" class="btn btn-info">К списку отелей</a>
            </div><!-- form-layout-footer -->
        </div>
        </form>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    {{--<script>
        $(document).on("click", "[type='checkbox']", function(e) {
            if (this.checked) {
                $(this).attr("value", "true");
            } else {
                $(this).attr("value","false");}
        });
    </script>--}}

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