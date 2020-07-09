@extends('layouts.main')

@section('content')

<div class="card-body">
  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form method="post" action="{{ route('detail_dep.store') }}" id="myForm">
    @csrf
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Input Data Detail</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class=" card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis Departemen </label>
              <select class="form-control select2bs4" style="width: 100%;" name="kode">
               @foreach ($detaildep as $de)
               <option value="{{ $de->kd_dp }}"> {{ $de->jenis_dp }}</option>
               @endforeach
             </select>
           </div>

           <!-- /.form-group -->
           
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama Deatil Departemen</label>
            <input type="text-gray-800" name="nama_detail_dep" class="form-control">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>kos_awal</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
              </div>
              <input type="text" class="uang  form-control" name="kos_awal" id="uang" > 
            </div>
          </div>

          <div class="form-group">
            <label></label>
            <a href="#" class="addinput  btn-sm btn-primary" style="float: right;">tambah input</a>
          </select>
        </div>
        <!-- /.form-group -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="input"></div>

    <div class="form-group row mt-5">
      <input type="submit" class="form-control btn-primary " value="Tambah" >
    </div>
  </div>
  <!-- /.card-body -->
</div>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
      $('.addinput').on('click', function(){
        addinput();
      });
      function addinput(){
        var input='<div> <div class=" card-body"><div class="row"><div class="col-md-6"><div class="form-group"><label>Kode Detail </label><input type="text-gray-800" name="kd_detail_dep[]" class="form-control"></div><div class="form-group"><label>Nama Detail Departemen</label><input type="text-gray-800" name="nama_detail_dep[]"  class="form-control"></div></div><div class="col-md-6"><div class="form-group"><label>Kos Awal</label><input type="text-gray-800" name="kos_awal[]" class="form-control"></div><div class="form-group"><label></label><a href="#" class="remove  btn-sm btn-danger" style="float: right;">hapust</a></select></div></dib>';

        $('.input').append(input);
      };
        $('.remove').live('click', function(){
        $(this).parent().parent().parent().remove();
      });
    </script>
    @endsection
