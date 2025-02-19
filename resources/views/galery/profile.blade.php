@extends('layouts.galery.basic')

@section('content')
    <div class="user-container">
        <div>
            <img src="" alt="">
            <input type="file" name="foto_profil" id="foto_profil">
            <p>{{ $user->username }}</p>
        </div>

        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
@endsection
