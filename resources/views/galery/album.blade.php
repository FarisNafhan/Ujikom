@extends('layouts.galery.basic')

@section('content')
    <div>
        @if (session('success'))
            <div id="pop_up" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a href="{{ route('NewAlbum') }}">
                <button class="add-gambar">buat album</button>
            </a>
        </div>
        <div>
            @foreach ($albums as $album)
                <a href="{{ route('DetailAlbum', $album->id) }}">
                    <button class="album-button">{{ $album->nama }}</button>
                </a>
            @endforeach
        </div>
    </div>
@endsection
