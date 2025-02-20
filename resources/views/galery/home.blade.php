@extends('layouts.galery.basic')

@section('content')
    <!-- Bagian Session kalo sukses -->
    @if (session('success'))
        <div id="pop_up" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bagian list album kalo ada-->
    <div class="album-list-container">
        <button class="album-button" data-album="all">Semua</button>
        @foreach ($albums as $album)
            <button class="album-button" data-album="{{ $album->nama }}">{{ $album->nama }}</button>
        @endforeach
    </div>

    <!-- Bagian tampilan foto semua user -->
    <div class="galery-container">
        @foreach ($fotos as $foto)
            <div class="gambar-container">
                <div class="gambar" data-album="{{ $foto->album->nama }}">
                    <a href="{{ route('DetailFoto', $foto->id) }}">
                        <img src="{{ asset('storage/' . $foto->lokasifile) }}">
                    </a>
                </div>

                <div class="gambar-button-container">
                    <div class="gambar-button">
                        @auth
                            <button>
                                <p id="komen-count-{{ $foto->id }}">{{ $foto->komen_count }}
                                    <a href="{{ route('DetailFoto', $foto->id) }}">
                                        <i class="fa-regular fa-comment" style="color: black"></i>
                                    </a>
                                </p>
                            </button>


                            <button id="like-btn-{{ $foto->id }}" onclick="like({{ $foto->id }})">
                                <p id="like-count-{{ $foto->id }}">{{ $foto->like_count }}
                                    <i id="like-icon-{{ $foto->id }}"
                                        class="{{ $foto->is_liked ? 'fa-solid fa-heart' : 'fa-regular fa-heart' }}"
                                        style="color: {{ $foto->is_liked ? 'red' : 'black' }};">
                                    </i>
                                </p>
                            </button>
                        @endauth
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
