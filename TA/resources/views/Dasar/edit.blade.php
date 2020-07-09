@extends('layouts.main')
@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Dasar Pembebanan
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
            <form method="post" action="{{ route('dasar.update',$dasar->kd_dasar) }}" id="myForm">
            @csrf
            @method('PUT')
                 <div class="form-group">
                    <label for="title">Kode Dasar Pembebanan</label>
                    <input type="text" name="kd_dasar" class="form-control" id="title" aria-describedby="title" value="{{ $dasar->kd_dasar }}" readonly>
                </div>
                <div class="form-group">
                    <label for="writer">Nama Dasar Pembebanan</label>
                    <input type="text" name="nama_dasar" class="form-control" id="writer" aria-describedby="writer" value="{{ $dasar->nama_dasar }}">
                </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
