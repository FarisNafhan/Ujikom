@extends('layouts.galery.basic')

@section('content')
    <div class="login-container">

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="login-form">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="login-form">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="login-form">
                <label for="register">don't have account?</label>
                <a href="{{ route('registerForm') }}">register</a>
            </div>
            <div class="login-form">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection
