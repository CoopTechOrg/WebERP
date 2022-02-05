@extends('layouts.entrance')

@section('content')
<div class="container reset">
    <h1 class="title">WebERP</h1>
    <div class="reset__wrapper">

        <a class="other_entrance register_color" href="{{ route('pre-register') }}">{{ __('会員登録') }}</a>
        <a class="other_entrance login_color parallel_position" href="{{ route('login') }}">{{ __('ログイン') }}</a>

        <div class="field">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form_container" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field attention">
                    <p>{{ __('メールアドレスにパスワードリセットページのURLが送られます。') }}</p>
                    <p>{{ __('URLから再度パスワードを登録してください。') }}</p>
                </div>

                <div class="field">
                    <label for="email" class="common__label">{{ __('メールアドレス') }}</label>

                    <div class="field__common">
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field entrance__field">
                    <button type="submit" class="btn login_color">
                        {{ __('送信') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
