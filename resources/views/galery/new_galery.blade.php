@extends('layouts.galery.basic')

@section('content')
<div class="galery-container">
    <form action="{{ route('AddGalery') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="galery-form">
            <label for="judul">judul</label>
            <input type="text" name="judul" id="judul" required>
        </div>
        <div class="galery-form">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" required>
        </div>
        <div class="galery-form">
            <label for="lokasifile">Lokasi File</label>
            <input type="file" name="lokasifile" id="lokasifile" required>
        </div>
        <div class="galery-form">
            <label for="album_id">Album</label>
            <select name="album_id" id="album_id">
                <option value="">--Album--</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }} ">{{ $album->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="galery-form">
            <button type="submit">Buat</button>
        </div>
    </form>
</div>
@endsection
