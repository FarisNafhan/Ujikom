@extends('layouts.galery.basic')

@section('content')
<div class="register-container">
    <form action="{{ route('register') }}" method="post" class="register-form">
        @csrf
        <div class="register-form">
            <input type="text" name="username" id="username" placeholder="username">
        </div>
        <div class="register-form">
            <input type="email" name="email" id="email" placeholder="email">
        </div>
        <div class="register-form">
            <input type="password" name="password" id="password" placeholder="password">
        </div>
        <div class="register-form">
            <input type="text" name="telepon" id="telepon" placeholder="telepon">
        </div>
        <div class="register-form">
            <input name="alamat" id="alamat" placeholder="alamat">
        </div>
        <div class="register-form">
            <button type="submit">Register</button>
        </div>
    </form>
</div>
@endsection
