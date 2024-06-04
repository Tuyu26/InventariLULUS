@extends('template')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">selanjutnya</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <div class="content">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h2 class="card-title">Tambah Ruang</h2>
                  </div>
                  <div class="card-body">
                      <form action="/ruang/update" method="post">
                          @csrf
                          <input type="hidden" name="idruang" value="{{ $ruang->idruang ?? ""}}">
                          <div class="form-group">
                              <label for="namaruang">Nama Ruang</label>
                              <input type="text" class="form-control" required="required" name="namaruang" value="{{ $ruang->namaruang ?? ""}}">
                          </div>
                          <div class="form-group">
                              <label for="koderuang">Kode Jenis</label>
                              <input type="number" class="form-control" required="required" name="koderuang" value="{{ $ruang->koderuang?? "" }}">
                          </div> 
                          <div class="form-group">
                              <label for="keterangan">keterangan</label>
                              <input type="text" class="form-control" required="required" name="keterangan" value="{{ $ruang->keterangan ?? ""}}">
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



 @endsection