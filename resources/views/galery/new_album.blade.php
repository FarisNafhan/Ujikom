@extends('layouts.galery.basic')

@section('content')
<div>
    <form action="{{ route('AddAlbum') }}" method="post" >
        @csrf
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi">
        </div>
        <div>
            <button type="submit">Tambah</button>
        </div>
    </form>
</div>
@endsection
