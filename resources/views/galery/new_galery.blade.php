@extends('layouts.galery.basic')

@section('content')
<div>
    <form action="{{ route('AddGalery') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="judul">judul</label>
            <input type="text" name="judul" id="judul">
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi">
        </div>
        <div>
            <label for="lokasifile">Lokasi File</label>
            <input type="file" name="lokasifile" id="lokasifile">
        </div>
        <div>
            <label for="album_id">Album</label>
            <select name="album_id" id="album_id">
                <option value="">--Album--</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }} ">{{ $album->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Buat</button>
        </div>
    </form>
</div>
@endsection
