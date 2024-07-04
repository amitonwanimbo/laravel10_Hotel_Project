@extends('admin.layouts.main')
@section('content')
<style>
   .form-group {
            margin-bottom: 15px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 15px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
  

   
</style>
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2>Mengubah Data User</h2>
    <div class="card">
    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
        <div class="continer">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $pengguna->name }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="image1">Gambar:</label>
                        @if ($pengguna->image)
                            <img src="{{ asset('storage/' . $pengguna->image) }}" alt="{{ $pengguna->name }}" width="100">
                        @endif
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $pengguna->email }}" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Plih Level:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="admin" {{ $pengguna->role == 'admin' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="role_male">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="kepala" {{ $pengguna->role == 'kepala' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="role_female">Kepala</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="staf" {{ $pengguna->role == 'staf' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="role_female">Staf</label>
                        </div> 
                        </div> 
                        <div class="form-group">
                        <label for="keter">Keterangan:</label>
                        <textarea name="keter" id="keter" class="form-control">{{ old('keter', $pengguna->keter) }}</textarea>
                    </div> 
                </div>               
        </div>
       

    </div>
    
    </div><!-- tutu row -->
    </div><!-- tutu container -->
    <br>
    <div class="wiwa" style="text-align:center;">
        <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>Ubah
        </button>
        <a href="{{route('pengguna.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i>
        Kembali</a>
    </div>
</form>  
</div>
@endsection
