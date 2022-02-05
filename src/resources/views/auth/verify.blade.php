@extends('layouts.entrance')

@section('content')
<div class="container register">
    <h1 class="title">WebERP</h1>
    <div class="register__wrapper">
        <a class="other_entrance login_color" href="{{ route('login') }}">ログイン</a>
        <form class="form_container" method="POST" action="{{ route('auth.upgrade', ['token' => $user->token]) }}">
            @csrf

            <div class="field">
                <label for="email" class="common__label">メールアドレス</label>
                <input id="email" type="hidden" class="" name="email" value="{{ $user->email }}">
                <div class="field__common">
                    <p>{{ $user->email }}</p>
                </div>
            </div>

            <div class="flex">
                <div class="field">
                    <label for="family_name" class="common__label">姓</label>

                    <div class="field__common">
                        <input id="family_name" type="text" class="@error('family_name') is-invalid @enderror" name="family_name" value="{{ old('family_name') }}" required autocomplete="family_name">

                        @error('family_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="given_name" class="common__label">名</label>

                    <div class="field__common">
                        <input id="given_name" type="text" class="@error('given_name') is-invalid @enderror" name="given_name" value="{{ old('given_name') }}" required autocomplete="given_name">

                        @error('given_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="field">
                <label for="password" class="common__label">パスワード</label>

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
                <label for="password-confirm" class="common__label">パスワード(もう一度入力してください)</label>

                <div class="field__common">
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="field entrance__field">
                <button type="submit" class="btn register_color">
                    会員登録
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

