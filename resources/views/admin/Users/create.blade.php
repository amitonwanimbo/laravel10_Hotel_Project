@extends('admin.layouts.main')
@section('content')

  <!-- general form elements -->
   <style>
    .container{
        font-family: Arial, sans-serif;
    }
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

        .form-control:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }

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
   </style>
     
   <div class="container">
   <h2>Tambah User Terbaru</h2>
        <div class="card card-primary"> 
            @if(session('success'))
                <div class="alert alert-success">
            {{ session('success') }}
                </div>
            @endif
   
            <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="card-body">
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nama: </label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="masukkan nama" required/>         
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar:</label>
                        <input id="name" class="form-control" type="file" name="image" required/>         
                    </div>
                    <div class="form-group">
                       <label for="email">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="masukkan email" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Kata Sandi: </label>
                        <input id="password" class="form-control" type="password" name="password" placeholder="masukkan password" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Sandi Ulang: </label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required placeholder="masukkan kata sandi ulang" />               
                    </div>
                    <div class="form-group">
                    <label>Pilih Level: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="admin" required>
                            <label class="form-check-label" for="">Admin: </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="kepala" required>
                            <label class="form-check-label" for="">Kepala: </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="staf" required>
                            <label class="form-check-label" for="">Staf: </label>
                        </div></div>
                        <div class="form-group">
                        <label for="keter">Keterangan:</label>
                            <textarea name="keter" id="" class="form-control" >

                            </textarea>
                    </div>      
                </div>
            </div>             
        </div> 
         
        </div>
    </div><br>
    <center>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i>Kirim</button>
        <a href="{{route('pengguna.index')}}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i>
         Kembali</a> 
     </center>
 </form>

</div>
@endsection