@extends('layouts.galery.basic')

@section('content')
<div>
    <form action="{{ route('SaveAlbum', ['id' => $album->id]) }}" method="post" >
        @csrf
        @method('PUT')
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $album->nama }}">
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" value="{{ $album->deskripsi }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
