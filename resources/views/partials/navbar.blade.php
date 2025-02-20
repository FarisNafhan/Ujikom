<div>
    <nav class="navbar">
        <ul class="nav-links">
            @auth
                {{-- <li><a href="{{ route('landing') }}">Galery</a></li> --}}
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('album') }}">Album</a></li>
                <li><a href="{{ route('Galery') }}">My Galery</a></li>
            @else
                <li><a href="{{ route('landing') }}">Galery</a></li>
            @endauth
        </ul>
        <ul class="nav-links">
            @auth
                <li>
                    <a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-bell"></i></a>
                </li>
                <li>
                    <a href="{{ route('Laporan') }}"><i class="fa-solid fa-file"></i></a>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>
</div>
