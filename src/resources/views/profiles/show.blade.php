@extends('layouts.app');

@section('content')
    <div class="container">
        <h2>ユーザー情報</h2>
        <div class="family_name">
            <p>姓:</p>
            <p>{{ $user['family_name'] }}</p>
        </div>
        <div class="given_name">
            <p>名:</p>
            <p>{{ $user['given_name'] }}</p>
        </div>
        <div class="email">
            <p>メールアドレス:</p>
            <p>{{ $user['email'] }}</p>
        </div>
        <a href="{{ route('user.edit') }}">変更する</a>
    </div>
@endsection