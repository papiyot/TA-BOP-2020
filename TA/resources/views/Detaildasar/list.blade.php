@extends('layouts.main')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Daftar Data Detail Dasar Pembebanan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Daftar Data Detail Dasar pembebanan</li>
      </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<div class="row">
    <div class="col-lg-12 margin-tb mt-3 mb-3">
        <div class="text-left">
        </div>
        @if(auth::user('user')->jabatan=='Admin')
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('detail_dasar.create') }}">Tambah Departemen</a>
        </div>
        @endif
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card  card-default">
 <div class="card-header">
   <h3 class="card-title">DAFTAR DETAIL DASAR PEMBEBANAN</h3>


<div class="card-tools">
   <form action="{{ route('detail_dasar.index')}}" method="GET">
       <div class="input-group input-group-sm" style="width: 150px;">
           <select name="cari">
            <option>------</option>
            @foreach ($pet as $pes)
            <option value="{{ old('cari', $pes->kd_pt)   }}"@if($pes->kd_pt==$cari)  @endif>
                {{ $pes->nama_pt}} </option>
            @endforeach
        </select>
        <div class="input-group-append">
          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
      </div>
</div>
  </form>
</div>
</div>


@if($detaildasar)  

<table class="table table-striped table-bordered text-center">

    <tr>
        <th>kode Detail Dasar Pembebanan</th>
        <th>Nama Detail Departemen</th>
        <th>Kos Awal</th>
        <th>Jam Kerja langsung (dalam Jam)</th>
        <th>luas Lahan(m2)</th>
        <th>Jam Mesin (dalam Jam)</th>
        <th>Dasar pembebanan</th>
        <th> Nama PT</th>
        @if(auth::user('user')->jabatan=='Admin')
        <th width="150px">Action</th>
        @endif
    </tr>
    @foreach ($detaildasar as $key)
    <tr>
        <td> {{$key->kd_detail_dasar}}</td>
        <td>{{ $key->detaildep->nama_detail_dep }}</td>
        <td>@currency($key->detaildep->kos_awal )</td>
        <td>{{ $key->jkl }}</td>
        <td>{{ $key->lh }}</td>
        <td>{{ $key->jm }}</td>
        <td>{{ $key->dasar->nama_dasar }}</td>
        <td> {{$key->pt->nama_pt }}</td>
        @if(auth::user('user')->jabatan=='Admin')
        <td>
            <form action="{{ route ('detail_dasar.destroy',$key->kd_detail_dasar) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('detail_dasar.edit',$key->kd_detail_dasar) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
    @else
    <div class="text-center"><h2> <strong>{{ $pes->nama_pt }} @if($cari === $pes->kd_pt ) @endif</strong>Data Tidak Ditemukan</h2></div>
    @endif
</table>

<div class="text-center">
    <a href="{{url('/Detaildasar/det_pdf?cari='.$cari)}}" class="btn btn-success btn-sm" target="_blank">CETAK</a>
    <input type="button" value="kembali" class="btn btn-primary " onclick="history.back(-1)" />

</div>
</div>
@endsection
