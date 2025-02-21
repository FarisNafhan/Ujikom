@extends('layouts.galery.basic')

@section('content')
    <div>
        @if (session('success'))
            <div id="pop_up" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <a href="{{ route('NewAlbum') }}">
                <button class="add-button">
                    <strong>buat album</strong>
                </button>
            </a>
        </div>
        <table id="example">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    {{-- <th>Galery</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <td>{{ $album->id }}</td>
                        <td>{{ $album->nama }}</td>
                        <td>{{ $album->deskripsi }}</td>
                        {{-- <td>
                            <a href="">
                                <button>Foto</button>
                            </a>
                        </td> --}}
                        <td>
                            <a href="{{ route('DetailAlbum', $album->id) }}">
                                <button>Edit</button>
                            </a>
                            <form action="{{ route('Delete.Album', $album->id) }}" method="post"
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
        {{-- <div>
            <a href="{{ route('NewAlbum') }}">
                <button class="add-gambar">buat album</button>
            </a>
        </div>
        <div>
            @foreach ($albums as $album)
                <a href="{{ route('DetailAlbum', $album->id) }}">
                    <button class="album-button">{{ $album->nama }}</button>
                </a>
            @endforeach
        </div> --}}
    </div>

    <script>
        new DataTable('#example');
    </script>
@endsection
