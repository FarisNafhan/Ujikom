@extends('layouts.galery.basic')

@section('content')
<div>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>        <div>
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" id="telepon">
        </div>        <div>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
    <div>
        <a href="{{ route('loginForm') }}"><button>Back</button></a>
    </div>
</div>
@endsection
