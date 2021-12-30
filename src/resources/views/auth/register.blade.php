@extends('layouts.entrance')

@section('content')
<div class="container register">
    <h1 class="title">WebERP</h1>
    <div class="register__wrapper">
        <a class="other_entrance login_color" href="{{ route('login') }}">{{ __('ログイン') }}</a>
        <form class="form_container" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="name" class="common__label">{{ __('名前') }}</label>

                <div class="field__common">
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label for="email" class="common__label">{{ __('メールアドレス') }}</label>

                <div class="field__common">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label for="password" class="common__label">{{ __('パスワード') }}</label>

                <div class="field__common">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label for="password-confirm" class="common__label">{{ __('パスワード(もう一度入力してください)') }}</label>

                <div class="field__common">
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="field entrance__field">
                <button type="submit" class="btn register_color">
                    {{ __('会員登録') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
