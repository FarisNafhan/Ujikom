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
                <button class="add-gambar">Buat Galery+</button>
            </a>
        </div>

        <div class="table-container">
            <table>
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
                                <a href="{{ route('DetailGalery', $foto->id)}}">Edit</a>
                                <form action="{{ route('Destroy.Galery', $foto->id) }}" method="post"  onsubmit="return confirm('Yakin mau hapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <a href="{{ route('DetailFoto', $foto->id) }}">
                        <img class="gambar" src="{{ asset('storage/' . $foto->lokasifile) }}">
                    </a>
                    <div class="gambar-button">
                        @auth
                            <button>
                                <p id="komen-count-{{ $foto->id }}">{{ $foto->komen_count }}
                                    <a href="{{ route('DetailFoto', $foto->id) }}">
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
                    </div> --}}
        </div>
    </div>
@endsection
