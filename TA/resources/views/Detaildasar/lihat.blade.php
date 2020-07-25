@extends('layouts.main')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Data Anggaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Laporan Data Anggaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="row">
    <div class="col-lg-12 margin-tb mt-3 mb-3">
        <div class="text-center">
           
            <form action="{{ url('Detaildasar/lihat') }}" method="GET">
                <select name="cari">
                    <option>==Pilih PT==</option>
                    @foreach ($data->pet as $pes)
                    <option value="{{ old('cari', $pes->kd_pt)   }}" @if($pes->kd_pt==$data->cari) selected @php $namapt=$pes->nama_pt; @endphp @endif>{{ $pes->nama_pt}} </option>
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
<div class="card card-default">
  @if (count($data->getdata ))
     <H3 class="text-center"> Laporan  Data Anggaran PT : {{ $namapt }}  </H3>
    <div class="table-responsive">
    <table class="table table-striped table-bordered text-center" >

        <tr>
            <th>Departemen</th>
            <th>Kos Awal</th>
            <th>Jam Kerja langsung (dalam Jam)</th>
            <th>Jam Mesin (dalam Jam)</th>
            <th>luas Lahan(m2)</th>
            <th>Dasar pembebanan</th>
            <th>Melayani Departemen</th>         
        </tr>
      
         @foreach ($data->getdata as $key => $val)
        <tr>
            
            <td>{{ $val->detaildep->nama_detail_dep }}</td>
            <td>@currency($val->detaildep->kos_awal )</td>
            <td >{{ $val->jkl }}</td>
            <td>{{ $val->jm }}</td>
             <td >{{ $val->lh }}</td>
             <td>{{ $val->dasar->nama_dasar }}</td>
            <td>
                @php $count = count($val->layanan)-1; @endphp
                @foreach ($val->layanan as $index => $sub)
                {{$sub->detaildep->nama_detail_dep}} @if($index<$count) , @endif @endforeach </td>

            </tr>
            @endforeach
            @else
                 <div class="text-center"><h2>Oops.. Data Tidak Ditemukan</h2></div>
             @endif
     </table>
     </div>
 </div>
 <div class="text-center">
  <input type="button" value="kembali" class="btn btn-primary btn-sm" onclick="history.back(-1)" />
  <a href="{{url('/Detaildasar/anggaran_pdf')}}" class="btn btn-success btn-sm" target="_blank">CETAK</a>
  <a  href="{{ url('Detaildasar/alokasi') }}" class="btn btn-secondary btn-sm">Laporan Alokasi</a>
</div>
</div>

@endsection
