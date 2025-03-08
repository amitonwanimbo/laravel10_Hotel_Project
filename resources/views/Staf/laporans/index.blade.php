

@extends('staf.layouts.main')

@section('content')
<style>
    .container{
        font-family: Arial, sans-serif;
    }
    .form-group {
            /* margin-bottom: 11px; */
            width: 100%;
            max-width: 400px;
            /* margin: 0 auto; */
            padding: 10px;
            /* border: 1px solid #ddd; */
            /* border-radius: 20px; */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        } */

        /* .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        } */

        /* .form-control:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        } */

        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        /* css tampilan */
        table {
        width: 100%; /* Lebar tabel 100% */
        border-collapse: collapse; /* Gabungkan batas sel */
        border-radius:20px;
    }
    th, td {
        /* border: 1px solid black; Garis tepi untuk sel */
        padding: auto;  /* Ruang isi sel */
        text-align: left; /* Rata kiri teks dalam sel */
        /* text-align:right;
        text-align:center; */
        font-size: 12px; /* Ukuran teks */
        
    }
        tr{
            width: 5px; 
        
        }
        th{
            color: white;
            background:#786D5F;
            padding: 10px;
            border-radius:auto;
            
        }
        img{
            width: 3px;
        }

</style>
<div class="container">
        <div class=""> 
            @if(session('success'))
                <div class="alert alert-success">
            {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="body">
            <div class="container1">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Nama: </label>
                        <input id="name" class="form-control" type="text" name="judul" placeholder="masukan Judul" required/>         
                    
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-md-4">
                        <label for="image">Gambar:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="deskripsi">Deskipsi: </label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" required></textarea>
                     </div>
                </div>
            </div>             
        </div> 
        </div>
    </div>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i>Tambahkan</button>
 </form>

 <div class="container mt-4">
 <div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="">
                <thead class="ukur">
                    <tr>
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
            <td class="gambar1">
                        @if ($laporan->image)
                            <img src="{{ Storage::url($laporan->image) }}" alt="Gambar Laporan" style="width: 30px;">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{ $laporan->deskripsi }}</td>
                    <td>{{ $laporan->status }}</td>
                   
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
</div>
</div>
</div>

   @endsection