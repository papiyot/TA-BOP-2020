@extends('layouts.main')
@section('content')
 
 
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Data Dasar pembebanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Data Dasar Pembebanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <!--<div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('dasar.create') }}">Tambah Dasar</a>
            </div>
        </div>
    </div>-->

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($dasar)
    
   <table class="table table-striped table-bordered text-center">
        <tr>
            <th colspan="4"> DAFTAR DASAR PEMBEBANAN</th>
        </tr>
        <tr>
            <th>No</th>
            <th>kode Dasar</th>
            <th>Nama Dasar Pembebanan</th>
            @if(auth::user('user')->jabatan=='admin')
            <th width="280px">Action</th>
            @endif
        </tr>
        @foreach ($dasar as $i => $dasar)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dasar->kd_dasar }}</td>
                <td>{{ $dasar->nama_dasar }}</td>
                @if(auth::user('user')->jabatan=='admin')

                <td>
                    <form action="{{ route('dasar.destroy',$dasar->kd_dasar) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('dasar.edit',$dasar->kd_dasar) }}">Edit</a>
                        @csrf
                       <!-- @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</button>-->
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
    </table>
     

    @else
    <div class="text-center"> <p class="text-bold"> Data Tidak Ada</p></div>
    @endif
    <div class="text-center">
        <!--<a href="{{url('/Dasar/dasar_pdf')}}" class="btn btn-success btn-sm" target="_blank">CETAK</a>-->
    <input type="button" value="kembali" class="btn btn-primary btn-sm" onclick="history.back(-1)" />

     </div>
@endsection
