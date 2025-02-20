@extends('layouts.galery.basic')

@section('content')
    @if (session('success'))
        <div id="pop_up" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="login-form">
                <p>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </p>

            </div>
            <div class="login-form">
                <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </p>

            </div>
            <div class="login-form">
                <p>don't have account?<a href="{{ route('registerForm') }}">register</a></p>
            </div>
            <div class="login-form">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection
