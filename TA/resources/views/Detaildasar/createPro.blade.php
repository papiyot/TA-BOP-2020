@extends('layouts.main')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Input Data Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Input Data Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="justify-content-center">
  <div class="card ">
    <div class="card-header">
      Input Data Detail
    </div>
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
      <p class="card-text text-center">Silakan Isikan data <strong> Departemen Produksi</strong>, Isikan juga Kos Awal dan Dasar Pembebanannya.  </p>
      <form  class="mt-5" method="post" action="{{ route('detail_dasar.store') }}" id="myForm">
        @csrf

        <div class="form-group row">
          <label class=" col-sm-3 col-form-label">Nama PT</label>
          <div class="col-sm-7">
            <select class="form-control select2bs4" style="width: 100%;" name="pt_id">
              <option>==Pilih PT==</option>
              @foreach ($pet as $pes)
              <option value="{{ $pes->kd_pt }}">{{ $pes->nama_pt}} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jenis Departemen</label>
          <div class="col-sm-7">
            <select class="form-control" style="width: 100%;" name="kode" >
              @foreach ($dep as $pess)
              <option value="{{ $pess->kd_dp }}">{{ $pess->jenis_dp }} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Detail Departemen</label>
          <div class="col-sm-7">
            <input type="text" class="uang  form-control" name="nama_detail_dep" id="uang" >
          </div>
        </div>

        <div class="form-group row">
          <label class=" col-sm-3 col-form-label"> Kos Awal</label>
          <div class="col-sm-7">
            <div class="input-group">
              <div class="input-group-prepend">

                <span class="input-group-text">Rp</span>
                
              </div>
              <input type="text" class="uang  form-control" name="kos_awal" id="uang" >
              
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Dasar Pembebanan</label>
          <div class="col-sm-7">
            <select class="form-control select2bs4" style="width: 100%;" name="beban_id">
              <option>==Pilih Dasar Pembebanan==</option>
              @foreach ($dsr as $de)
              
              <option value="{{ $de->kd_dasar }}">{{ $de->nama_dasar}} </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class=" col-sm-3 col-form-label"> Jam Kerja Langsung</label>
          <div class="col-sm-7">
            <div class="input-group">
              <input type="text" class="uang  form-control" name="jkl" id="uang" >
              <div class="input-group-prepend">

                <span class="input-group-text">/Jam</span>
                
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class=" col-sm-3 col-form-label"> Jam Mesin</label>
          <div class="col-sm-7">
            <div class="input-group">
              <input type="text" class="uang  form-control" name="jm" id="uang" >
              <div class="input-group-prepend">
                <span class="input-group-text">/Jam</span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class=" col-sm-3 col-form-label"> Luas Lahan</label>
          <div class="col-sm-7">
            <div class="input-group">
              <input type="text" class="uang  form-control" name="lh" id="uang" >
              <div class="input-group-prepend">
                <span class="input-group-text">/M2</span>
              </div>
            </div>
          </div>
        </div>


        <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah</button>
        <button type="Reset" class="btn btn-danger btn-sm btn-block">Batal</button>
      </form>
    </div>

  </div>
  <div class="text-center">
    <input type="button" value="kembali" class="btn btn-primary btn-sm" onclick="history.back(-1)" />

    <a  href="{{ url('Detaildasar/lihat' ) }}" class="btn btn-secondary btn-sm">selanjutnya</a>
  </div>
</div>


@endsection
