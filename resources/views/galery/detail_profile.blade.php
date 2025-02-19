@extends('layouts.galery.basic')

@section('content')
<div>
    <form action="{{ route('saveprofile') }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{ $user->username }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}">
        </div>        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>        <div>
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" id="telepon" value="{{ $user->telepon}}">
        </div>        <div>
            <label for="alamat">Alamat</label>
            <input name="alamat" id="alamat" value="{{ $user->alamat }}"></input>
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
