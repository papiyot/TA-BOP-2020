@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-left">
                <h2>Kelola Data</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('detail_dasar.create')}}">Tambah Departemen</a>
            </div>
        </div>
    </div>
 @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped table-bordered">
        <tr>
            <th>kode Detail Dasar Pembebanan</th>
            <th>Departemen</th>
            <th>Kos Awal</th>
            <th>Jam Kerja langsung (dalam Jam)</th>
            <th>luas Lahan(m2)</th>
            <th>Jam Mesin (dalam Jam)</th>
           
            <th>Dasar pembebanan(dalam Jam)</th>
            
            <th width="150px">Action</th>
        </tr>
        @foreach ($detaildasar as $key)
        <tr>
            <td> {{$key->kd_detail_dasar}}</td>
            <td>{{ $key->detaildep->nama_detail_dep }}</td>
            <td>@currency($key->detaildep->kos_awal )</td>
             <td>{{ $key->jkl }}</td>
            <td>{{ $key->lh }}</td>
            <td>{{ $key->jm }}</td>
            <td>{{ $key->dasar->nama_dasar }}</td>
            <td>
                <form action="{{ route ('detail_dasar.destroy',$key->kd_detail_dasar) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('detail_dasar.edit',$key->kd_detail_dasar) }}">Edit</a>
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
