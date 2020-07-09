@extends('layouts.main'))

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail Departemen
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kode Departemen: </b>{{ $pt->kd_pt }}</li>
                    <li class="list-group-item"><b>Jenis Departemen: </b>{{ $pt->nama_pt }}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{ $pt->alamat_pt }}</li>
                    <li class="list-group-item"><b>NO Telp : </b>{{ $pt->noTelp_pt }}</li>

                </ul>
            </div>
            <a class="btn btn-success" href="{{ route('pt.index') }}">Kembali</a>

        </div>
    </div>
</div>
@endsection
