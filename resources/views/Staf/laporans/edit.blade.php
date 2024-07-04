@extends('staf.layouts.main')

@section('content')
<div class="container">
    <h2>Edit Laporan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lapor.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $laporan->judul) }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control" id="gambar" name="image" accept="image/*">
            @if ($laporan->image)
                <img src="{{ Storage::url($laporan->image) }}" alt="Gambar laporan" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Laporan</button>
    </form>
</div>
@endsection
