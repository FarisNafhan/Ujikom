<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('storage/fontawesome-free-6.7.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/style/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/style/user.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/style/detailfoto.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/style/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/style/mygalery.css') }}">

</head>
<body>
    @include('partials.navbar')
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('storage/script/count.js') }}"></script>
<script src="{{ asset('storage/script/like.js') }}"></script>
</html>
