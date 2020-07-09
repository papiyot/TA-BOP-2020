@extends('layouts.main')
@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit PT
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
               @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <form method="post" action="{{ route('pt.update',$pt->kd_pt) }}" id="myForm">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="title">Kode PT</label>
                    <input type="text" name="kd_pt" class="form-control" id="title" aria-describedby="title" value="{{ $pt->kd_pt }} " readonly>
                </div>
                <div class="form-group">
                    <label for="writer"> Nama PT</label>
                    <input type="text" name="nama_pt" class="form-control" id="writer" aria-describedby="writer" value="{{ $pt->nama_pt }}">
                </div>
                <div class="form-group">
                    <label for="writer"> Alamat PT</label>
                    <textarea class="form-control" id="txtAddress" name="alamat_pt">{{ $pt->kd_pt }}</textarea>
                </div>
                <div class="form-group">
                    <label for="writer"> No Telp PT</label>
                    <input type="text" name="noTelp_pt" class="form-control" id="writer" aria-describedby="writer" value="{{ $pt->noTelp_pt }}">
                </div>
                <div class="align-items-cente">                
                     <button type="submit" class="btn btn-primary" align="center" >edit</button>
                     </div>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection
