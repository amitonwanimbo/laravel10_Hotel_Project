@extends('admin.layouts.main')
@section('content')
<section class="content" id="main-content">                                         
<div class="page-header"><h1>Pengguna</h1></div>

<div class="row">		  
    <div id="avatar-block" class="col-sm-3">
        <div class="box box-solid ">							
        <div id="avatar-block-body" class="box-body">    
         <img src="{{ asset('storage/' . Auth::user()->image) }}"  width="280" >	      			
    </div>
    
</div>

</div>
	<div id="detail-block" class="col-sm-6">
			<div class="box box-solid ">
                <div id="detail-block-body" class="box-body">
                <table id="w0" class="table table-condensed detail-view">
                    <tbody>
                        <tr>
                            <th class="col-sm-3">Nama:</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-3">Email</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>  
                        <tr>
                            <th class="col-sm-3">Level</th>
                            <td>{{ Auth::user()->role }}</td>
                        </tr>  
                        <tr>
                            <th class="col-sm-3">Keterang</th>
                            <td>{{ Auth::user()->keter }}</td>
                        </tr>          
                    </tbody>
                </table>				
		    </div>
            <center>
            <a href="{{route('pengguna.index')}}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i>
            Kembali</a>
            </center>
            
            </div>
</section>
@endsection


