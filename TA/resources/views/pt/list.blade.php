@extends('layouts.main')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Data PT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Data PT</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('pt.create') }}">Tambah PT</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($pt)
     <table class="table table-striped table-bordered text-center">
        <tr> <th colspan="6"> DAFTAR PT</th>

        </tr>
        <tr>
            <th>No</th>
            <th>kode PT</th>
            <th>Nama PT</th>
            <th>ALamat PT</th>
            <th>No Telp PT</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pt as $i => $pt)

            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pt->kd_pt }}</td>
                <td>{{ $pt->nama_pt }}</td>
                <td>{{ $pt->alamat_pt }}</td>
                <td>{{ $pt->noTelp_pt }}</td>
                <td>
                    <form action="{{ route('pt.destroy',$pt->kd_pt) }}" method="POST">
                        
                        <a class="btn btn-primary btn-sm" href="{{ route('pt.edit',$pt->kd_pt) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit"  onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@else
<div class="text-center text-bold"> <p> Data Tidak ADA</p> </div>
@endif
    <div class="text-center">
        <!--<a href="{{ url('/Departemen/pete_pdf') }}" class="btn btn-success btn-sm" target="_blank">CETAK</a>-->
    <input type="button" value="kembali" class="btn btn-primary btn-sm " onclick="history.back(-1)" />

     </div>
    
</div>
@endsection
