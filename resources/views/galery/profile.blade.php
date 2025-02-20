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
    </div>
@endsection
