@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data Dasar Pembebanan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Dasar pembebanan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="card  card-default">
 <div class="card-header">
   <h3 class="card-title">Input Data Dasar Pembebanan</h3>
   @if ($errors->any())
   <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="card-tools">
   <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
   <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
 </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
  <p class="card-text text-center">Sistem ini menggunakan atas dasar Jam Kerja Langsung, Taksiran Luas Lahan, dan Taksiran Jam Mesin. isikan Nama Dasar pembebanan  <strong>Jam Kerja langsung, Luas Lahan  dan Jam Mesin</strong>.  </p>
  <form method="post" action="{{ route('dasar.store') }}">
    @csrf


      <div class="form-group">
        <label>Kode Dasar Pembebanan</label>
        <input type="text" class="form-control" placeholder="Dasar.0.." name="" readonly="">
      </div>
      <div class="form-group">
        <label >Nama Dasar Pembebanan</label>
        <input type="text" class="form-control" name="nama_dasar">
      </div>

      <!--<div class="form-group">
        <label></label>
        <a href="#" class="addinput  btn-sm btn-primary" style="float: right;">tambah input</a>
      </div>
       
    <div class="input">  </div> -->

    <div class="input-group mb-2 mt-5">

      <button type="submit" class="btn btn-primary btn-sm btn-block" @if(count($dasars)==3 ) disabled @endif>Tambah</button>
      <button type="Reset" class="btn btn-danger btn-sm btn-block">Batal</button>
    </div>
    </div>

  </form>


</div>
  <div class="text-center">
      <input type="button" value="kembali" class="btn btn-primary btn-sm" onclick="history.back(-1)" />
      <a  href="{{ route('detail_dasar.create') }}" class="btn btn-secondary btn-sm">selanjutnya</a>
    </div>
</div>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
  $('.addinput').on('click', function(){
    addinput();
  });
  function addinput(){
    var input='<div><div class="form-group"><label >Nama Dasar Pembebanan</label><input type="text" class="form-control" name="nama_dasar[]"></div><div class="form-group"><label></label><a href="#" class="remove  btn-sm btn-danger" style="float: right;">hapus</a></div></div>';
    $('.input').append(input);
  };
  $('.remove').live('click', function(){
    $(this).parent().parent().parent().remove();
  });
</script>-->
@endsection
