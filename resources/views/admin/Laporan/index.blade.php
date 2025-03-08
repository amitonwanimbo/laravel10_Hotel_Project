@extends('admin.layouts.main')
@section('content')
<div class="container">
    <h1>Daftar Laporan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Dibuat Oleh</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
                <th>Lihat Detail</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr>
                <td>{{ $laporan->user->name }}</td>
                 <td>{{ $laporan->judul }}</td>
                    <td>
                        @if ($laporan->image)
                            <img src="{{ Storage::url($laporan->image) }}" alt="Gambar Laporan" style="width: 100px;">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{ $laporan->deskripsi }}</td>
                    <td>{{ $laporan->status }}</td>
                    <td>
                        @if ($laporan->status == 'menunggu')
                            <form action="{{ route('laporan.updateStatus', ['laporan' => $laporan->id, 'status' => 'dilihat']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">Tandai sebagai Dilihat</button>
                            </form>
                        @endif
                        @if ($laporan->status == 'dilihat')
                            <form action="{{ route('laporan.updateStatus', ['laporan' => $laporan->id, 'status' => 'diterima']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Tandai sebagai Diterima</button>
                            </form>
                        @endif
                    </td>
                    <td>
                    <a href="{{ route('lapor.show', $laporan->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-eye"></i></a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
