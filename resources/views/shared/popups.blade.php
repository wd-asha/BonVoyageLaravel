{{-- Login Form --}}
<div class="popup" id="popup">
    <a href="#" class="popup-area"></a>
    <div class="popup-body">
        <div class="popup-content">
            <a href="#" class="popup-close">
                <i class="fa fa-times"></i>
            </a>
            <div class="popup-title">Вход</div>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div  class="popup-text">
                    <input type="email" name="email" id="emailInput" placeholder="Email" value="{{ old('email') }}" autofocus>
                    @error('email')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <input type="password" placeholder="Пароль" id="passInput" name="password">
                    @error('password')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <button type="submit" class="login-link">Войти</button>
                </div>
            </form>
            <div class="reg-link">
                <input type="checkbox" id="degree" style="font-size: .8rem; line-height: .8rem;">
                <label for="degree" style="font-size: .8rem; line-height: .8rem;">Согласие на обработку персональных данных</label>
            <div class="reg-link">
            </div>
                <a href="#popupReg">Регистрация</a>
            </div>
        </div>
    </div>
</div>
{{-- end login form --}}
{{-- Reg Form --}}
<div class="popup" id="popupReg">
    <a href="#" class="popup-area"></a>
    <div class="popup-body">
        <div class="popup-content">
            <a href="#" class="popup-close">
                <i class="fa fa-times"></i>
            </a>
            <div class="popup-title">Регистрация</div>
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div  class="popup-text">
                    <input type="text" placeholder="Имя" id="name" name="name" value="{{ old('name') }}" autofocus>
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" autofocus>
                    @error('email')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <input type="password" placeholder="Пароль" id="password" name="password">
                    @error('password')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <input type="password" placeholder="Повтор пароля" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <button type="submit" class="login-link">Зарегистрировать</button>
                </div>
            </form>
            <div class="reg-link">
                <input type="checkbox" id="degree" style="font-size: .8rem; line-height: .8rem;">
                <label for="degree" style="font-size: .8rem; line-height: .8rem;">Согласие на обработку персональных данных</label>
                <div class="reg-link">
                </div>
            <div class="reg-link">
                <a href="#popup">Вход</a>
            </div>
        </div>
    </div>
</div>
{{-- end regform --}}
