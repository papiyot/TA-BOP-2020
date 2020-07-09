@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mt-3 mb-3">
        <div class="text-center">
            <h3>Anggaran</h3>
            
            <form action="{{ url('Detaildasar/lihat') }}" method="GET">
               <!-- <input type="text" name="cari" placeholder="Cari " value="{{ old('cari') }}"> -->
                        <select name="cari">
                            <option>==Pilih PT==</option>
                        @foreach ($pet as $pes)
                        <option value="{{ old('cari', $pes->kd_pt)   }}">{{ $pes->nama_pt}} </option>
                        @endforeach
                    </select>
               
                <input type="submit" value="CARI">
            </form>
            <br/>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="card card-default" >
      <div class="card-header">
        <h3 class="card-title">Data Anggaran </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
<table class="table table-striped table-bordered">
    <tr>
        <th>kode Detail Dasar Pembebanan</th>
        <th>Departemen</th>
        <th>Kos Awal</th>
        <th>Jam Kerja langsung (dalam Jam)</th>
        <th>luas Lahan(m2)</th>
        <th>Jam Mesin (dalam Jam)</th>
        <th>Total Jam Kerja(dalam Jam)</th>
        <th>Dasar pembebanan(dalam Jam)</th>
    </tr>
    @foreach ($detaildasar as $key)
    <tr>
        <td> {{$key->kd_detail_dasar}}</td>
        <td>{{ $key->detaildep->nama_detail_dep }}</td>
        <td>@currency($key->detaildep->kos_awal )</td>
        <td>{{ $key->jkl }}</td>
        <td>{{ $key->lh }}</td>
        <td>{{ $key->jm }}</td>
        <td>{{ $key->tjk }}</td>
        <td>{{ $key->dasar->nama_dasar }}</td>
    </tr>
    @endforeach
</table>
<a href="#" class="btn btn-primary">hitung</a >
</div> 
</div>

@endsection
