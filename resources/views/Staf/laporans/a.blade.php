div class="container">
    <h1>Daftar Laporan Kerusakan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('lapor.create') }}" class="btn btn-primary mb-3">Buat Laporan Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Tanggal Dibuat</th>
                <th>Jam Dibuat</th>

                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr>
                    <!-- <td>{{ $loop->iteration }}</td> -->
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ $laporan->deskripsi }}</td>
                    <td>
                    <td>
                    @if (Auth::check() && $$laporan->gambar)
                                <img src="{{ asset('storage/' . $$laporan->gambar) }}" alt="{{ $$laporan->gambar }}" width="100">
                            @else
                                No Image
                            @endif
                    </td>
                    <td>{{ $laporan->status }}</td>
                    <td>{{ $laporan->created_at->format('d-m-Y') }}</td>
                    <td>{{ $laporan->created_at->format('H:i:s') }}</td>


                    <td>
                    <a href="{{ route('lapor.edit',$laporan->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i></a>     
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