@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Предложения</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего предложений: {{ $departures->total() }}
            <span style="float: right">
                <a href="{{ route('departure.create') }}" class="btn btn-success">
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

        {{-- Filtration --}}
        <div class="filerForms" style="display: flex; justify-content: flex-start; align-items: flex-start;">
            {{-- Countries filter --}}
            <form action="{{route('admin.countriesS')}}" method="get" class="mr-4">
                @csrf
                <label>Поиск по странам: </label><br>
                <select name="country_id" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="Все Страны" selected></option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}"
                                @if(isset($_GET['country_id']))
                                @if($_GET['country_id'] == $country->id) selected @endif
                            @endif>{{$country->country_title}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-info" style="transform: translateX(-.25rem);"><i class="fa fa-search"></i></button>
            </form>
            {{-- end countries filer --}}
            {{-- Hotels filter --}}
            <form action="{{route('admin.hotelsS')}}" method="get" class="mr-4">
                @csrf
                <label>Поиск по отелям: </label><br>
                <select name="hotel_id" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="Все отели" selected></option>
                    @foreach($hotels as $hotel)
                        <option value="{{$hotel->id}}"
                                @if(isset($_GET['hotel_id']))
                                @if($_GET['hotel_id'] == $hotel->id) selected @endif
                            @endif>{{$hotel->hotel_title}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-info" style="transform: translateX(-.25rem);"><i class="fa fa-search"></i></button>
            </form>
            {{-- end hotels filer --}}
            {{-- Status filter --}}
            <form action="{{route('admin.statusS')}}" method="get" class="mr-4">
                @csrf
                <label>Поиск по статусу: </label><br>
                <select name="status" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="Все статусы" selected></option>
                    <option value="0"
                        @if(isset($_GET['status']))
                            @if($_GET['status'] == 0) selected @endif
                        @endif>0
                    </option>
                    <option value="1"
                        @if(isset($_GET['status']))
                            @if($_GET['status'] == 1) selected @endif
                        @endif>1
                    </option>
                </select>
                <button type="submit" class="btn btn-info" style="transform: translateX(-.25rem);"><i class="fa fa-search"></i></button>
            </form>
            {{-- end status filer --}}
        </div>
        {{-- end filtration --}}

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
                    <th>Страна</th>
                    <th>Отель</th>
                    <th>Прибытие</th>
                    <th>Убытие</th>
                    <th>Номер</th>
                    <th>Стандарт</th>
                    <th>Дни</th>
                    <th>Цена, <i class="fa fa-ruble"></i></th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departures as $departure)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $departure->id }}</td>
                        <td>{{ $departure->country->country_title }}</td>
                        <td>{{ $departure->hotel->hotel_title }}</td>
                        <td>{{ $departure->departure_departure }}</td>
                        <td>{{ $departure->departure_arrival }}</td>
                        <td>{{ $departure->departure_seats }}</td>
                        <td>{{ $departure->departure_standard }}</td>
                        <td>{{ $departure->departure_days }}</td>
                        <td>{{ number_format($departure->departure_price, 0, '.', ' ' )}}</td>
                        <td>
                            <div class="togglebutton">
                                <label>
                                    @if($departure->departure_status === 0)
                                        <a href="{{route('departure.status1', $departure->id)}}">
                                            <input type="checkbox" checked="">
                                            <span class="toggle"></span>
                                        </a>
                                    @endif
                                    @if($departure->departure_status === 1)
                                        <a href="{{route('departure.status0', $departure->id)}}">
                                            <input type="checkbox">
                                            <span class="toggle"></span>
                                        </a>
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td>{{ $departure->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('departure.show', $departure->id) }}" class="btn btn-info" style="display: inline-block; margin-right: .5rem;">
                                <i class="fa fa-eye" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('departure.edit', $departure->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: .5rem">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('departure.delete', $departure->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($departures->total() == 0)
                    <tr>
                        <td><p style="text-align: center; width: 100%">нет предложений</p></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $departures->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Departures--}}
        <h6 class="card-body-title">Корзина</h6>
        <p class="mg-b-10 mg-sm-b-10">Удаленные предложения: {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>Страна</th>
                    <th>Отель</th>
                    <th>Вылет</th>
                    <th>Прилет</th>
                    <th>Номер</th>
                    <th>Стандарт</th>
                    <th>Дни</th>
                    <th>Цена, <i class="fa fa-ruble"></i></th>
                    <th>Дата удаления</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->country->country_title }}</td>
                        <td>{{ $trash->hotel->hotel_title }}</td>
                        <td>{{ $trash->departure_departure }}</td>
                        <td>{{ $trash->departure_arrival }}</td>
                        <td>{{ $trash->departure_seats }}</td>
                        <td>{{ $trash->departure_standard }}</td>
                        <td>{{ $trash->departure_days }}</td>
                        <td>{{ number_format($trash->departure_price, 0, '.', ' ' )}}</td>
                        <td>{{ $trash->created_at->diffForHumans()  }}</td>
                        <td>
                            <a href="{{ route('departure.restore', $trash->id) }}" class="btn btn-success"><i class="fa fa-repeat"></i></a>
                            <a href="{{ route('departure.destroy', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
                {{ $trashed->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

    </div>



@endsection
