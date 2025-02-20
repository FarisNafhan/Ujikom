@extends('layouts.galery.basic')

@section('content')
<div class="register-container">
    <form action="{{ route('saveprofile') }}" method="post">
        @csrf
        @method('PUT')
        <div class="register-form">
            <input type="text" name="username" id="username" value="{{ $user->username }}">
        </div>
        <div class="register-form">
            <input type="email" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div class="register-form">
            <input type="text" name="telepon" id="telepon" value="{{ $user->telepon }}">
        </div>
        <div class="register-form">
            <input name="alamat" id="alamat" value="{{ $user->alamat }}">
        </div>
        <div class="register-form">
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
