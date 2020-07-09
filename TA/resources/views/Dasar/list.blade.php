@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>DAFTAR PT </h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('dasar.create') }}">Tambah</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>kode Dasar</th>
            <th>Nama Dasar Pembebanan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($dasar as $i => $dasar)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dasar->kd_dasar }}</td>
                <td>{{ $dasar->nama_dasar }}</td>
                <td>
                    <form action="{{ route('dasar.destroy',$dasar->kd_dasar) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('dasar.edit',$dasar->kd_dasar) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
