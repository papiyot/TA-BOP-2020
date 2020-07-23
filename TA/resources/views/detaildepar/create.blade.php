@extends('layouts.main')

@section('content')

<div class="card-body">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
   @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <form method="post" action="{{ route('detail_dep.store') }}" id="myForm">
    @csrf
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Input Data Detail Departemen</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class=" card-body">
        <div class="form-group">
          <label>Kode Detail Departemen</label>
          <input type="text" class="form-control" placeholder="DP00.."  name="" readonly="">
        </div>
        <div class="form-group">
          <label >Jenis Departemen</label>
         <select class="form-control select2bs4" style="width: 100%;" name="kode" >
            @foreach ($dep as $pess)
            <option value="{{ $pess->kd_dp }}">{{ $pess->jenis_dp }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Nama Detail departemen</label>
          <input type="text" class="form-control"  name="nama_detail_dep">
        </div>
        <div class="form-group">
          <label >Kos Awal</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp</span>
            </div>
            <input type="text" class="uang  form-control" name="kos_awal" id="uang" > 
          </div>
        </div>

        <!--<div class="form-group">
          <label></label>
          <a href="#" class="addinput  btn-sm btn-primary" style="float: right;">tambah input</a>
        </select>
      </div>
       /.form-group 
        <div class="input"></div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="form-group mt-5">
    <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah</button>
        <button type="Reset" class="btn btn-danger btn-sm btn-block">Batal</button>
  </div>
</div>
<!-- /.card-body -->
<div class="text-center">
      <input type="button" value="kembali" class="btn btn-primary btn-sm" onclick="history.back(-1)" />
      <a  href="{{ route('dasar.create') }}" class="btn btn-secondary btn-sm">selanjutnya</a>
    </div>
</div>

</form>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
  $('.addinput').on('click', function(){
    addinput();
  });
  function addinput(){
    var input='<div><div class="form-group"><label>Nama Detail departemen</label><input type="text" class="form-control" placeholder="" name="nama_detail_dep[]"></div><div class="form-group"><label >Kos Awal</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp</span></div><input type="text" class="uang  form-control" name="kos_awal[]" id="uang" > </div></div><div class="form-group"><label></label><a href="#" class="remove  btn-sm btn-danger" style="float: right;">Hapus</a></div></div>';

    $('.input').append(input);
  };
  $('.remove').live('click', function(){
    $(this).parent().parent().parent().remove();
  });
</script>-->
@endsection
