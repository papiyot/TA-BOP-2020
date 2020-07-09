@extends('layouts.main')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Departemen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Departemen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card card-success" style="width: 24rem;">
            <div class="card-header">
            Edit Data Departemen
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
            <form method="post" action="{{ route('dep.update',$dep->kd_dp) }}" id="myForm">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="title">Kode Departemen</label>
                    <input type="text" name="kd_dp" class="form-control" id="title" value="{{ $dep->kd_dp }}" aria-describedby="title" readonly>
                </div>
                <div class="form-group">
                    <label for="writer">Jenis Departemen</label>
                    <input type="text" name="jenis_dp" class="form-control" id="writer" value="{{ $dep->jenis_dp }}" aria-describedby="writer" >
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
