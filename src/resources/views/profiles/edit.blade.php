@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('user.update') }}" method="post">
        @csrf
        <input type="text" name="family_name" value="{{ $user['family_name'] }}">
        <input type="text" name="given_name" value="{{ $user['given_name'] }}">
        <input type="text" name="email" value="{{ $user['email'] }}">
        <button type="submit">更新する</button>
    </form>
</div>
@endsection