@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Страны</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего стран: {{ $countries->total() }}<span style="float: right">
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus"></i></a>
        </span></p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $country->id }}</td>
                        <td><img src="/{{ $country->country_image}}" alt="" style="width: 60px;"></td>
                        <td>{{ $country->country_title }}</td>
                        <td>
                            <a href="{{ route('admin.country.delete', $country->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($countries->total() == 0)
                    <tr>
                        <td><p style="text-align: center; width: 100%">нет стран</p></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $countries->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Новая страна</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.country.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <input type="text" name="country_title" class="form-control" placeholder="Наименование">
                        </div>

                        <div class="form-group">
                            <label class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="brand_logo">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info btn-block">Создать</button>
                        </div>
                    </div><!-- modal-body -->
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection
