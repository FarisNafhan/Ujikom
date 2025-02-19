@extends('layouts.galery.basic')

@section('content')
    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- <div>
            Galery
        </div> --}}
        <div class="add-gambar">
            <button>
                <a href="{{ route('NewGalery') }}">
                    Buat Galery<i class="fa-solid fa-plus"></i>
                </a>
            </button>
        </div>

        <div class="galery-container">

            @foreach ($fotos as $foto)
                <div class="gambar-container">
                    <a href="{{ route('detail-foto', $foto->id) }}">
                        <img class="gambar" src="{{ asset('storage/' . $foto->lokasifile) }}">
                    </a>
                    <div class="gambar-button">
                        @auth
                            <button>
                                <p id="komen-count-{{ $foto->id }}">{{ $foto->komen_count }}
                                    <a href="{{ route('detail-foto', $foto->id) }}">
                                        <i class="fa-regular fa-comment" style="color: black"></i>
                                    </a>
                                </p>
                            </button>
                        @endauth

                        <button id="like-btn-{{ $foto->id }}" onclick="like({{ $foto->id }})">
                            <p id="like-count-{{ $foto->id }}">{{ $foto->like_count }}
                                <i id="like-icon-{{ $foto->id }}"
                                    class="{{ $foto->is_liked ? 'fa-solid fa-heart' : 'fa-regular fa-heart' }}"
                                    style="color: {{ $foto->is_liked ? 'red' : 'black' }};">
                                </i>
                            </p>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
