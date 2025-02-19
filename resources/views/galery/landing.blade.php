@extends('layouts.galery.basic')

@section('content')
<div class="galery-container">
    @foreach ($fotos as $foto)
        <div class="gambar-container">
            <a href="{{ route('detail-foto', $foto->id) }}">
                <img class="gambar" src="{{ asset('storage/' . $foto->lokasifile) }}">
            </a>
            <div class="gambar-button">
                <button>
                    <a href="{{ route('detail-foto', $foto->id) }}">
                        <i class="fa-regular fa-comment" style="color: black"></i>
                    </a>
                </button>

                <button id="like-btn-{{ $foto->id }}" onclick="like({{ $foto->id }})">
                    <i id="like-icon-{{ $foto->id }}"
                        class="{{ $foto->is_liked ? 'fa-solid fa-heart' : 'fa-regular fa-heart' }}"
                        style="color: {{ $foto->is_liked ? 'red' : 'black' }};">
                    </i>
                </button>
            </div>
        </div>
    @endforeach
</div>
@endsection

