@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>DAFTAR PT </h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('pt.create') }}">Add</a>
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
                        <a class="btn btn-primary" href="{{ route('pt.show',$pt->kd_pt) }}">show</a>
                        <a class="btn btn-primary" href="{{ route('pt.edit',$pt->kd_pt) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
