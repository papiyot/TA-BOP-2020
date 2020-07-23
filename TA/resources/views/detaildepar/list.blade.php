@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Daftar Data Detail Departemen</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Daftar Data Detail Departemen</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<!--<div class="row">
  <div class="col-lg-12 margin-tb mt-3 mb-3">
    <div class="text-right">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Tambah Departemen
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('detail_dasar.create') }}">Departemen Jasa</a>
        <a class="dropdown-item" href="{{ url('Detaildasar/createPro') }}">Departemen Produksi</a>
      </div>
    </div>
  </div>
</div>-->

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<table class="table table-striped table-bordered text-center">
 <tr>
   <th colspan="7"> DAFTAR DETAIL DEPARTEMEN</th>
 </tr>
 <tr>
  <th>No</th>
  <th>Kode Detail Departemen</th>
  <th>Jenis Departemen</th>
  <th>Nama Detail Departemen</th>
  <th>Kos awal</th>
  <th> Nama PT</th>
  @if(auth::user('user')->jabatan=='admin')
  <th width="auto">Action</th>
  @endif
</tr>
@foreach ($detail_dep as $key => $detaildep)
<tr>
  <td>{{ $key+1 }}</td>
  <td>{{ $detaildep->kd_detail_dep }}</td>
  <td>{{ $detaildep->depa->jenis_dp }}</td>
  <td>{{ $detaildep->nama_detail_dep }}</td>
  <td>@currency( $detaildep->kos_awal)</td>
  <td> {{ $detaildep->detdsr->pt->nama_pt}}</td>

@if(auth::user('user')->jabatan=='admin')
  <td>
    <form action="{{ route ('detail_dep.destroy',$detaildep->kd_detail_dep) }}" method="POST">
      <a class="btn btn-primary" href="{{ route('detail_dep.edit',$detaildep->kd_detail_dep) }}">Edit</a>

      @csrf
      @method('DELETE')

      <button type="submit" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</button>
    </form>
  </td>
  @endif
</tr>
@endforeach
</table>
<div class="text-center">
  <a href="{{ url('detaildepar/detaildep_pdf')}}" class="btn btn-primary btn-sm" target="_blank">CETAK</a>
  <input type="button" value="kembali"  class="btn btn-primary btn-sm" onclick="history.back(-1)" />
</div>
</div>
@endsection
