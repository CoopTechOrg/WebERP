@extends('layouts.entrance')

@section('content')
<div class="container login">
    <h1 class="title">WebERP</h1>
    <div class="login__wrapper">
        <a class="other_entrance register_color" href="{{ route('register') }}">{{ __('会員登録') }}</a>
        <form class="form_container" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label class="common__label" for="email">{{ __('メールアドレス') }}</label>

                <div class="field__common">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="common__label" for="password">{{ __('パスワード') }}</label>

                <div class="field__common">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @if (Route::has('password.request'))
                        <a class="forget_pass" href="{{ route('password.request') }}">
                            {{ __('※パスワードを忘れた方はこちら') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="field entrance__field">
                <button type="submit" class="btn login_color">
                    {{ __('ログイン') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
