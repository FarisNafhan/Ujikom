@extends('layouts.galery.basic')

@section('content')
<div class="album-container">
    <form action="{{ route('SaveAlbum', ['id' => $album->id]) }}" method="post" >
        @csrf
        @method('PUT')
        <div class="album-form">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $album->nama }}">
        </div>
        <div class="album-form">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" value="{{ $album->deskripsi }}">
        </div>
        <div class="album-form-success">
            <button type="submit">Simpan</button>
        </div>
    </form>
    <form action="{{ route('Delete.Album', $album->id) }}" method="post" onsubmit="return confirm('Yakin mau hapus foto ini?');">
        @csrf
        @method('DELETE')
        <div class="album-form-danger">
            <button type="submit">Delete</button>
        </div>
    </form>
</div>
@endsection
