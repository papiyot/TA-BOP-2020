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
                    @foreach ($detail_deps->depar as $detail_deps)
                        
                   
                    <li class="list-group-item"><b>jenis Departemen: </b>{{ $detail_deps->depar->jenis_dp }}</li>
                    <li class="list-group-item"><b>Nama Dasar Pembebanan: </b>{{ $detail_deps->kd_detail_dep }}</li>
                    <li class="list-group-item"><b>Nama Dasar Pembebanan: </b>{{ $detail_deps->nama_detail_dep }}</li>
                    <li class="list-group-item"><b>Nama Dasar Pembebanan: </b>{{ $detail_deps->kod_awal }}</li>
 @endforeach

                </ul>
            </div>
            <a class="btn btn-success" href="{{ route('dep.index') }}">Kembali</a>

        </div>
    </div>
</div>
</div>
@endsection
