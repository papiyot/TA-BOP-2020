@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card card-success" style="width: 24rem;">
            <div class="card-header">
            Detail Departemen
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kode Dasar Pembebanan: </b>{{ $dep->kd_dp }}</li>
                    <li class="list-group-item"><b>Nama Dasar Pembebanan: </b>{{ $dep->jenis_dp}}</li>
                </ul>
            </div>
            <a class="btn btn-success" href="{{ route('dep.index') }}">Kembali</a>

        </div>
    </div>
</div>
</div>
@endsection
