@extends('layouts.main')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data PT</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data PT</li>
      </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<div class="row justify-content-center align-items-center">
    <div class="card" style="width: 27rem;">
        <div class="card-header">
            Tambah PT
        </div>
        <div class="card-body">
              @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-primary">
                <p>{{ $message }}</p>
            </div>
            @endif
            <form method="post" action="{{ route('pt.store') }}" id="myForm">
                @csrf
                <div class="form-group">
                    <label for="writer"> Kode PT</label>
                    <input type="text" name="" readonly class="form-control" id="writer" aria-describedby="writer" placeholder="PT.">
                </div>

                <div class="form-group">
                    <label for="writer"> Nama PT</label>
                    <input type="text" name="nama_pt" class="form-control" id="writer" aria-describedby="writer" placeholder="Masukkan Nama PT">
                </div>
                <div class="form-group">
                    <label for="writer"> Alamat PT</label>
                    <textarea class="form-control" id="txtAddress" name="alamat_pt"></textarea>
                </div>
                <div class="form-group">
                    <label for="writer"> No Telp PT</label>
                    <input type="text" name="noTelp_pt" class="form-control" id="writer" aria-describedby="writer" placeholder="Masukkan Nomer Telp PT">
                </div>

                <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah</button>
                <a  href="{{ route('dep.create')}}" class="btn btn-secondary btn-sm btn-block">selanjutnya</a>
            </form>  
        </div>
    </div>
</div>

</div>
@endsection
