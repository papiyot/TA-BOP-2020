@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data Departemen</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Departemen</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
  @if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="card  card-default">
 <div class="card-header">
   <h3 class="card-title">Input Data Departemen</h3>
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
<div class="card-body">


   <p class="card-text text-center">Departemen yang digunakan disini hanya ada 2 jenis departemen yaitu Jasa dan Produksi,  isikan jenis departemen hanya Departemen <strong>Jasa dan Produksi</strong>.  </p>
  <form method="post" action="{{ route('dep.store') }}">
    @csrf
    
    <div class="form-group">
        <label>Kode Departemen</label>
        <input type="text" class="form-control" placeholder="DP00..." name="" readonly="">
      </div>
      <div class="form-group">
        <label >Jenis Departemen</label>
        <input type="text" class="form-control" name="jenis_dp" >
      </div>

     <!-- <div class="form-group">
        <label></label>
        <a href="#" class="addinput  btn-sm btn-primary" style="float: right;">tambah input</a>
      </div>
       
    <div class="input">  </div>-->

    <div class="input-group mb-2 mt-5">

      <button type="submit" class="btn btn-primary btn-sm btn-block" @if(count($dep)==2 ) disabled @endif>Tambah</button>
      <button type="Reset" class="btn btn-danger btn-sm btn-block">Batal</button>
    </div>
    </div>

  </form>


</div>
<div class="text-center">
    <input type="button" value="kembali" class="btn btn-primary btn-sm" onclick="history.back(-1)" />
    <a  href="{{ route('dasar.create')}}" class="btn btn-secondary btn-sm">selanjutnya</a>
</div>
</div>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
  $('.addinput').on('click', function(){
    addinput();
  });
  function addinput(){
    var input='<div><div class="form-group"><label >Jenis Departemen</label><input type="text" class="form-control" name="jenis_dp[]"></div><div class="form-group"><label></label><a href="#" class="remove  btn-sm btn-danger" style="float: right;">hapus</a></div></div>';
    $('.input').append(input);
  };
  $('.remove').live('click', function(){
    $(this).parent().parent().parent().remove();
  });
</script>-->


@endsection
