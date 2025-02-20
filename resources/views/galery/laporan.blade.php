@extends('layouts.galery.basic')

@section('content')
    <div>
        @if (session('success'))
            <div id="pop_up" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- <div>
            Galery
        </div> --}}
        <div>
            <a href="{{ route('NewGalery') }}">
                <button class="add-button">
                    <strong>Buat Galery+</strong>
                </button>
            </a>
        </div>

        <div class="table-container">
            <table class="tabels">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Like</th>
                        <th>Komen</th>
                        <th>Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fotos as $foto)
                        <tr>
                            <td>{{ $foto->id }}</td>
                            <td>
                                <a href="{{ route('DetailFoto', $foto->id) }}">
                                    <img class="gambar" src="{{ asset('storage/' . $foto->lokasifile) }}">
                                </a>
                            </td>
                            <td>{{ $foto->judul }}</td>
                            <td>{{ $foto->deskripsi }}</td>
                            <td>{{ $foto->likes->count() }}</td>
                            <td>{{ $foto->komentar->count() }}</td>
                            <td>{{ $foto->created_at }}</td>
                            <td>
                                <a href="{{ route('DetailGalery', $foto->id) }}">Edit</a>
                                <form action="{{ route('Destroy.Galery', $foto->id) }}" method="post"
                                    onsubmit="return confirm('Yakin mau hapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
