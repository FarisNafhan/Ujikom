@extends('layouts.galery.basic')

@section('content')
    <div class="user-container">
        @if (session('success'))
            <div id="pop_up" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <div>
            <i class="fa-solid fa-circle-user"></i>
        </div>

        <div>
            <p>{{ $user->username }}</p>
        </div>

        <div>
            <button>
                <a href="{{ route('editprofile') }}">edit profile</a>
            </button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>

        <div class="dashboard-stats">
            <div class="stat-box">
                <h3>Total Foto</h3>
                <p>{{ $t_foto }}</p>
            </div>
            <div class="stat-box">
                <h3>Total Album</h3>
                <p>{{ $t_album }}</p>
            </div>
            <div class="stat-box">
                <h3>Foto Terpopuler</h3>
                @if($liketerbanyak)
                    <p>{{ $liketerbanyak->nama }} ({{ $liketerbanyak->likes_count }} Likes)</p>
                    <img src="{{ asset('storage/' . $liketerbanyak->lokasifile) }}" width="100">
                @else
                    <p>Belum ada foto populer</p>
                @endif
            </div>
        </div>
        
    </div>
@endsection
