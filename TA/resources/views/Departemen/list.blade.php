@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Data Departemen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Data Departemen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   <!-- <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('dep.create') }}">Tambah Departemen</a>
            </div>
        </div>
    </div> -->

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if($dep)
    <table class="table table-striped table-bordered text-center">
        <tr> 
            <th colspan="4"> Daftar Data Departemen</th>
        </tr>
        <tr>
            <th>No</th>
            <th>Kode Departemen</th>
            <th>Jenis Departemen</th>
  @if(auth::user('user')->jabatan=='Admin')
            <th width="280px">Action</th>
            @endif
        </tr>
        @foreach ($dep as $key => $depa)
        <tr>

            <td>{{ $key+1 }}</td>
            <td>{{ $depa->kd_dp }}</td>
            <td>{{ $depa->jenis_dp }}</td>
  @if(auth::user('user')->jabatan=='Admin')
            <td>
                <form action="{{ route ('dep.destroy',$depa->kd_dp) }}" method="POST">
                    

                    <a class="btn btn-primary" href="{{ route('dep.edit',$depa->kd_dp) }}">Edit</a>

                    @csrf
                   @method('DELETE')

                    <button type="submit"   onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</button>
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
           <!-- <a href="{{url('/Departemen/depar_pdf')}}" class="btn btn-success btn-sm" target="_blank">CETAK</a>-->
    <input type="button" value="kembali" class="btn btn-primary btn-sm" onclick="history.back(-1)" />

     </div>
</div>
@endsection
