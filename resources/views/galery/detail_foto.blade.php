@extends('layouts.galery.basic')

@section('content')
    <div class="foto-container">
        <!-- Bagian Foto -->
        <div class="foto-wrapper">
            <img src="{{ asset('storage/' . $foto->lokasifile) }}" alt="Foto">
        </div>

        <!-- Bagian Detail dan Komentar -->
        <div class="detail-container">
            <div class="deskripsi">
                <h2>{{ $foto->judul }}</h2>
                <p class="tanggal">{{ $foto->created_at->format('d M Y') }} {{ $foto->album->nama }}</p>
                <p><strong>Deskripsi:</strong><br>{{ $foto->deskripsi }}</p>

                <a href="{{ route('DownloadFoto', $foto->id) }}" class="download-btn">
                    <i class="fa-solid fa-download"></i> Unduh
                </a>
            </div>

            <!-- Bagian Komentar -->
            <div class="komentar">
                <h3>Tambahkan Komentar</h3>
                <form id="komen-form-{{ $foto->id }}" action="{{ route('komentar.store', $foto->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                    <textarea name="isi" placeholder="Tulis komentar..." required></textarea>
                    <button type="submit">Kirim</button>
                </form>

                <!-- Daftar Komentar -->
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
    </div>
@endsection
