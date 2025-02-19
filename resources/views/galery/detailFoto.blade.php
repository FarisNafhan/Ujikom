@extends('layouts.galery.foto')

@section('content')
<div class="foto-container">
    <div class="deskripsi-container">
        <div class="foto">
            <img src="{{ asset('storage/' . $foto->lokasifile) }}" alt="Foto">
        </div>
        <div>
            <p><strong>{{ $foto->judul }}</strong> - {{ $foto->created_at->format('d M Y') }}</p>
            <p><strong>Deskripsi:</strong><br>{{ $foto->deskripsi }}</p>
        </div>
    </div>

    <div class="komentar">
        <a href="{{ route('downloadFoto', $foto->id) }}">
            <button class="download">
                <i class="fa-solid fa-download">Unduh</i>
            </button>
        </a>

        <h3>Tambahkan Komentar</h3>
        <form id="komen-form-{{ $foto->id }}" action="{{ route('komentar.store', $foto->id) }}" method="POST">
            @csrf
            <input type="hidden" name="foto_id" value="{{ $foto->id }}">
            <input name="isi" placeholder="Tulis komentar..." required></input>
            <button type="submit">Kirim</button>
        </form>

        <div class="komentar-list">
            <h3>Komentar:</h3>
            @foreach ($foto->komentar as $komentar)
                <div class="komentar-item">
                    <p><strong>{{ $komentar->user->username }}</strong> - {{ $komentar->created_at->format('d M Y') }}</p>
                    <p>{{ $komentar->isi }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
