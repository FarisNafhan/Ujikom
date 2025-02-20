@extends('layouts.galery.basic')

@section('content')
    <div class="galery-container">
        <form action="{{ route('Update.Galery', $foto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="galery-form">
                <label for="judul">judul</label>
                <input type="text" name="judul" id="judul" value="{{ $foto->judul }}">
            </div>
            <div class="galery-form">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" value="{{ $foto->deskripsi }}">
            </div>
            <div class="galery-form">
                <label for="lokasifile">Lokasi File</label>
                <input type="file" name="lokasifile" id="lokasifile" value="{{ $foto->lokasifile }}">
            </div>
            @if ($foto->lokasifile)
                <img src="{{ asset('storage/' . $foto->lokasifile) }}" alt="Foto Lama">
            @endif
            <div class="galery-form">
                <label for="album_id">Album</label>
                <select name="album_id" id="album">
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}" {{ $album->id == $foto->album_id ? 'selected' : '' }}>
                            {{ $album->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="galery-form">
                <button type="submit">Buat</button>
            </div>
        </form>
    </div>
@endsection
