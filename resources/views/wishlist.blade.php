@extends('layouts.countries')
@section('title', 'Bon Voyage | Аккаунт')
@section('content')

    <div class="hotels-bg">
        <div class="hotels-title">
            <h3>Выбранное</h3>
        </div>
        @if(Cart::count() !== 0)
            <div class="hotels-wishlist">
                @foreach($cartItems as $cartItem)
                    <div class="hotel">
                        <img src="{{ $cartItem->options->image }}" alt="">
                        <div class="hotel-desc">
                            <div class="hotel-address">
                                <p>{{ $cartItem->options->town }}</p>
                            </div>
                            <div class="hotel-name">
                                <p>@php echo str_replace(" ", "<br>", $cartItem->options->hotel) @endphp</p>
                            </div>
                            <div class="hotel-address">
                                <p>{{ $cartItem->options->seats }}</p>
                                <p>{{ $cartItem->options->standard }}</p>
                            </div>
                            <div class="hotel-address">
                                <p>с {{ $cartItem->options->departure }}</p>
                                <p>по {{ $cartItem->options->arrival }}</p>
                                <p style="font-size: .6rem; font-weight: 200">({{ $cartItem->options->days }} дней)</p>
                            </div>
                            <div class="hotel-price">
                                <p>{{ $cartItem->price(0, ',', ' ' ) }} <i class="fa fa-ruble"></i></p>
                            </div>
                        </div>

                        <form action="{{ route('check', $cartItem->rowId) }}" method="POST" name="form-checkout" id="form-checkout" novalidate>
                            @csrf
                            <div class="inputs-address" style="padding-top: 2rem">
                                @auth
                                    <div class="input-wrapper">
                                        <input type="text" name="delivery" placeholder="Имя" value="{{ Auth::user()->name }}">
                                        @error('delivery')
                                        <div style="color: red; font-size: .7rem; width: 100%; transform: translateY(-.5rem)">
                                            <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="email" name="dmail" placeholder="Email" value="{{ Auth::user()->email }}">
                                        @error('dmail')
                                        <div style="color: red; font-size: .7rem; width: 100%; transform: translateY(-.5rem)">
                                            <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="tel" name="phone" placeholder="Телефон" value="{{ Auth::user()->phone_user }}">
                                        @error('phone')
                                        <div style="color: red; font-size: .7rem; width: 100%; transform: translateY(-.5rem)">
                                            <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                @endauth
                                @guest
                                    <div class="input-wrapper">
                                        <input type="text" name="delivery" placeholder="Имя" value="{{ old('delivery') }}">
                                        @error('delivery')
                                        <div style="color: red; font-size: .7rem; width: 100%; transform: translateY(-.5rem)">
                                            <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="email" name="dmail" placeholder="Email" value="{{ old('dmail') }}">
                                        @error('dmail')
                                        <div style="color: red; font-size: .7rem; width: 100%; transform: translateY(-.5rem)">
                                            <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="tel" name="phone" placeholder="Телефон" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div style="color: red; font-size: .7rem; width: 100%; transform: translateY(-.5rem)">
                                            <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="user_id" value="0">
                                    <input type="hidden" name="user_name" value="noname">
                                @endguest
                            </div>
                            <button type="submit" name="submit" class="sel-tur">Забронировать</button>
                        </form>

                        <a href="{{route('cart.delete', $cartItem->rowId)}}" class="del-tur"><i class="fa fa-trash"></i></a>
                    </div>
                @endforeach
            </div>
        @else
            <p style="text-align: center; font-size: .9rem; padding: 2rem 0;">Нет выбранных предложений</p>
        @endif

        @auth
        <div class="account" id="account">
            <div class="accaunt-title">
                <h4>Аккаунт</h4>
            </div>
            <div class="flex-box">
            <div class="accaunt-title-50">
                <h5>Пользователь</h5>
                <form action="{{ route('personal.update') }}" method="post">
                    @csrf
                    <div class="inputs-address">
                        <div class="input-wrapper-account">
                            <input type="text"  class="input-address" name="first_user" id="first_user" placeholder="" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="input-wrapper-account">
                            <input type="email"  class="input-address" name="email_user" id="email_user" placeholder="" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="wishlist-link-box">
                        <button type="submit" name="submit" class="wishlist-link">Сохранить</button>
                    </div>
                </form>
            </div>

            <div class="accaunt-title-50">
                <h5>Контакты</h5>
                <form action="{{ route('shipping.update') }}" method="POST">
                    @csrf
                    <div class="inputs-address">
                        @auth
                            <div class="input-wrapper-account">
                                <input type="text" name="shipping_user" class="input-address" placeholder="Адрес" value="{{ Auth::user()->shipping_user }}">
                            </div>
                            <div class="input-wrapper-account">
                                <input type="tel" name="phone_user" class="input-address" placeholder="Телефон" value="{{ Auth::user()->phone_user }}">
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                        @endauth
                        @guest
                            <div class="input-wrapper-account">
                                <input type="text" name="shipping_user" class="input-address" placeholder="Адрес" value="">
                            </div>
                            <div class="input-wrapper-account">
                                <input type="email" name="email" class="input-address" placeholder="Email" value="">
                            </div>
                            <div class="input-wrapper-account">
                                <input type="tel" name="phone_user" class="input-address" placeholder="Телефон" value="">
                            </div>
                            <input type="hidden" name="user_id" value="0">
                            <input type="hidden" name="user_name" value="noname">
                        @endguest
                    </div>
                    <div class="wishlist-link-box">
                        <button type="submit" name="submit" class="wishlist-link">Сохранить</button>
                    </div>
                </form>
            </div>

            <div class="accaunt-title">
                <h5>Новый пароль</h5>
                <form action="{{ route('reset.password') }}" method="post">
                    @csrf
                    <div class="inputs-address">
                        <div class="input-wrapper-account">
                            <input type="email" class="input-address" name="email_pass_user" id="email_pass_user" placeholder="" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="input-wrapper-account">
                            <input type="password" class="input-address" name="new_pass_user" id="new_pass_user" placeholder="новый пароль" value="">
                        </div>
                        <div class="input-wrapper-account">
                            <input type="password" class="input-address" name="repeat_pass_user" id="repeat_pass_user" placeholder="повтор пароля" value="">
                        </div>
                    </div>
                    <div class="wishlist-link-box">
                        <button type="submit" name="submit" class="wishlist-link">Изменить</button>
                    </div>
                </form>
            </div>
            </div>

            @if(Auth::user()->name === 'Admin')
                <a href="{{ route('admin.index') }}" class="wishlist-link" style="margin-right: 1rem">В админ панель</a>
            @endif

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <span>Выход из аккаунта</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @endauth
    </div>
@endsection
