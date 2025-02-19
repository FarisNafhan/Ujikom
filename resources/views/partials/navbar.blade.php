<div>
    <nav class="navbar">
        <ul class="nav-links">
            @auth
                <li><a href="{{ route('home') }}">Home</a></li>
            @else
                <li><a href="{{ route('landing') }}">Landing</a></li>
            @endauth
            <li><a href="{{ route('album') }}">Album</a></li>
            <li><a href="{{ route('galery') }}">Galery</a></li>
        </ul>
        <ul class="nav-links">
            @auth
                <li>
                    <a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-bell"></i></a>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>
</div>
