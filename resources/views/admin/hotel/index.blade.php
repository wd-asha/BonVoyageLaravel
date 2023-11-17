@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Отели</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего отелей: {{ $hotels->total() }}
            <span style="float: right">
                <a href="{{ route('hotel.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i></a>
            </span>
        </p>

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
                    <th>Страна</th>
                    <th>Город</th>
                    <th>Наименование</th>
                    <th>Звезды</th>
                    <th>Номера</th>
                    <th>Дата создания</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $hotel->id }}</td>
                        <td><img src="../../../../{{ $hotel->hotel_image1}}" alt="" style="width: 100px;"></td>
                        <td>{{ $hotel->country->country_title }}</td>
                        <td>{{ $hotel->hotel_town }}</td>
                        <td>{{ $hotel->hotel_title }}</td>
                        <td>
                            @switch($hotel->hotel_stars)
                                @case('1')
                                <i class="fa fa-star"></i>
                                @break
                                @case('2')
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                @break
                                @case('3')
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                @break
                                @case('4')
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                @break
                                @default
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            @endswitch
                        </td>
                        <td>{{ $hotel->hotel_rooms }}</td>
                        <td>{{ $hotel->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('hotel.show', $hotel->id) }}" class="btn btn-info" style="display: inline-block; margin-right: .5rem;">
                                <i class="fa fa-eye" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: .5rem">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('hotel.delete', $hotel->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($hotels->total() == 0)
                    <tr>
                        <td><p style="text-align: center; width: 100%">нет отелей</p></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $hotels->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Hotels--}}
        <h6 class="card-body-title">Корзина</h6>
        <p class="mg-b-10 mg-sm-b-10">Удаленные отели: {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Страна</th>
                    <th>Город</th>
                    <th>Наименование</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td><img src="/{{ $trash->hotel_image1}}" alt="" style="width: 100px;"></td>
                        <td>{{ $trash->country->country_title }}</td>
                        <td>{{ $trash->hotel_town }}</td>
                        <td>{{ $trash->hotel_title }}</td>
                        <td>
                            <a href="{{ route('hotel.restore', $trash->id) }}" class="btn btn-success"><i class="fa fa-repeat"></i></a>
                            <a href="{{ route('hotel.destroy', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($trashed->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $trashed->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

    </div>



@endsection