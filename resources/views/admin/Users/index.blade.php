

@extends('admin.layouts.main')
@section('content')

<style>  
          .alert-success-custom {
            position: fixed;
            top: 70px;
            left: 40%;
            transform: translateX(-50%);
            width: auto; /* Mengatur lebar notifikasi */
            margin: 0 auto; /* Mengatur posisi notifikasi */
            z-index: 1050; /* Membawa alert di atas elemen lain */ 
            }
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
        font-size: 16px; /* Ukuran teks */
        
    }
        tr{
            width: 1px; 
        
        }
        th{
            color: white;
            background:#786D5F;
            padding: 10px;
            border-radius:auto;
            
        }
        img{
            width: 20px;
        }
 .mi-l{
    width: auto;
 }
</style>
<div class="container mt-4">
    <!-- Form Untuk -->
    <div class="card-body">
        <a href="{{route('pengguna.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Tambah Pengguna</a>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show alert-success-custom" role="alert">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-4.97-3.03a.75.75 0 1 0-1.08-1.04L7 7.792 5.354 6.146a.75.75 0 1 0-1.08 1.04l2 2a.75.75 0 0 0 1.08 0l5-5z"/>
                </svg>
            </span>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="">
                <thead>
                    <tr>
                        <th class="mi">#</th>
                        <th>Nama</th> 
                        <th>Gambar</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Keter</th>
                        <th class="we">Tindakan</th>
                    </tr>
                </thead>
        <tbody>
            @php $i = 0; @endphp        
             @foreach($pengguna as $user)
                <tr>
                    <td class="mi">{{++$i}}</td>
                    <td>{{ $user->name }}</td>
                    <td  style="border-radius:20px; width:10px;">
                    @if (Auth::check() && $user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}" width="100">
                            @else
                                No Image
                            @endif
                    </td>
                
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->keter }}</td>
                    <td class="we">
                        <a href="{{ route('pengguna.edit', $user->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i></a>
                        <a href="{{ route('pengguna.show', $user->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-eye"></i></a>

                        <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" style="display:inline;"  method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mi-l"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    <thead>
 </table>
</div>
</div>
        <!-- Tombol paginasi -->
        <div class="d-flex justify-content-center">
        {{ $pengguna->links('vendor.pagination.default') }}
        </div>
</div>   
   @endsection