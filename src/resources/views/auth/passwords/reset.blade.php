@extends('layouts.entrance')

@section('content')
<div class="container reset">
    <h1 class="title">WebERP</h1>
    <div class="reset__wrapper">

        <a class="other_entrance register_color" href="{{ route('pre-register') }}">{{ __('会員登録') }}</a>
        <a class="other_entrance login_color parallel_position" href="{{ route('login') }}">{{ __('ログイン') }}</a>

        <div class="field">
            <form class="form_container" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field attention">
                    <p>{{ __('再度パスワードボタンを登録してください。') }}</p>
                    <p>{{ __('登録後、再度ログインボタンからログインしてください。') }}</p>
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
                    <label for="password-confirm" class="common__label">{{ __('確認用パスワード') }}</label>

                    <div class="field__common">
                        <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="field entrance__field">
                    <button type="submit" class="btn login_color">
                            {{ __('登録') }}
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
