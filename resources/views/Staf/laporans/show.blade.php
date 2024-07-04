
@extends('Staf.layouts.main')

@section('content')
<div class="container">
    <h2>Detail Laporan</h2>

    <div class="card">
        <div class="card-header">
            <h3>{{ $laporan->judul }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong></p>
            <p>{{ $laporan->deskripsi }}</p>
            @if ($laporan->image)
                <p><strong>Gambar:</strong></p>
                <img src="{{ Storage::url($laporan->image) }}" alt="Gambar laporan" width="300">
            @endif
        </div>
        <div class="card-footer">
            <p><strong>Status:</strong> {{ $laporan->status }}</p>
            <p><strong>Dibuat pada:</strong> {{ $laporan->created_at->format('d M Y H:i') }}</p>
            <p><strong>Diperbarui pada:</strong> {{ $laporan->updated_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('lapor.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Laporan</a>
</div>
@endsection