@extends('layouts.galery.basic')

@section('content')
<div  class="album-container">
    <form action="{{ route('AddAlbum') }}" method="post" >
        @csrf
        <div class="album-form">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="album-form">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" required>
        </div>
        <div class="album-form-success">
            <button type="submit">Tambah</button>
        </div>
    </form>
</div>
@endsection
