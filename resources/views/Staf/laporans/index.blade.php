
@extends('staf.layouts.main')

@section('content')

<div class="container">
    <h1>Daftar Laporan Saya</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('lapor.create') }}" class="btn btn-primary mb-3">Buat Laporan Baru</a>

    <table class="table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
            <tr>
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
                    <!-- <td>
                        @if ($laporan->status == 'menunggu')
                            <span class="badge badge-warning">Menunggu</span>
                        @elseif ($laporan->status == 'dilihat')
                            <span class="badge badge-info">Dilihat</span>
                        @elseif ($laporan->status == 'diterima')
                            <span class="badge badge-success">Diterima</span>
                        @endif
                    </td> -->
                    <td class="we">
                    @if ($laporan->user_id == auth()->id())
                        <a href="{{ route('lapor.edit', $laporan->id) }}" class="btn btn-primary">  <i class="fas fa-edit"></i></a></a>
                    @endif                      
                        <a href="{{ route('lapor.show', $laporan->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-eye"></i></a>

                        <form action="{{ route('lapor.destroy', $laporan->id) }}" method="POST" style="display:inline;"  method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mi-l"><i class="fas fa-trash"></i></button>
                    </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>


@endsection

