@extends('layouts.main')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Data Detail Departemen</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Data Detail Departemen</li>
      </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card card-success" style="width: 24rem;">
            <div class="card-header">
                Edit Data  Detail Departemen
            </div>
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
                <form method="post" action="{{ route('detail_dep.update',$detail_dep->kd_detail_dep) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="writer">Kode Detail Departemen</label>
                        <input type="text"  class="form-control" id="writer" value="{{ $detail_dep->kd_detail_dep }}" aria-describedby="writer" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title">Jenis Departemen</label>

                        <!--<input type="text" name="kode" class="form-control" id="title" value="{{ $detail_dep->depa->jenis_dp }}" aria-describedby="title" placeholder="">-->
                        <select class="form-control custom-select" name="kode">
                            @foreach ($detail_deps as $de)
                            <option value="{{ $de->kd_dp }}" 

                                @if ( $de->kd_dp === $detail_dep->kd_dp) 
                                @endif selected>
                                {{ $de->jenis_dp }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="writer">Nama Detail Departemen</label>
                            <input type="text" name="nama_detail_dep" class="form-control" id="writer" value="{{ $detail_dep->nama_detail_dep }}" aria-describedby="writer" >
                        </div>
                        <div class="form-group">
                            <label for="writer">Nama Detail Departemen</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="uang  form-control" name="kos_awal" id="uang"  value="{{ $detail_dep->kos_awal }}"> 
                        </div>
                        <div class="text-center mt-5">
                            <input type="submit" class="form-control btn-success"  align="center" value=" Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
