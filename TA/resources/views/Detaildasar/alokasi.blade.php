@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mt-3 mb-3">
        <div class="text-center">
            <h3>Anggaran</h3>

            <form action="{{ url('Detaildasar/lihat') }}" method="GET">
                <select name="cari">
                    <option>==Pilih PT==</option>
                    @foreach ($data->pet as $pes)
                    <option value="{{ old('cari', $pes->kd_pt)   }}">{{ $pes->nama_pt}} </option>
                    @endforeach
                </select>

                <input type="submit" value="CARI">
            </form>
            <br />
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@php 
$set=[]; 
@endphp
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Data Anggaran </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <table class="table table-striped table-bordered">

        <tr>
            @foreach($data->header as $inx => $header)
            @if($inx==0)
            <th rowspan="2"></th>
            @endif
            <th colspan="{{count($header->child)}}">{{$header->jenis_dp}}</th>
            @endforeach
        </tr>
        <tr>
            @foreach($data->header as $inx => $header)
            @foreach($header->child as $inx => $child)
            <th>{{$child->nama_detail_dep}}</th>
            @endforeach
            @endforeach
        </tr>
        <tr>
            <td> Total Kos</td>
            @php $in_no = 0; @endphp
            @foreach($data->header as $inx => $header)
            @foreach($header->child as $inx => $child)
            @php
            $set[0][$in_no] = $child->kos_awal;
            $in_no = $in_no +1;
            @endphp
            <th>@currency($child->kos_awal)</th>
            @endforeach
            @endforeach
        </tr>
        @foreach($data->set as $index=>$val)
        
            @if($val['jenis_dp']=='Jasa')

            @php $count_layanan = count($val['layanan']); @endphp
            <tr>
                <td>Alokasi {{$val['nama_detail_dep']}} ke @foreach($val['layanan'] as $inx_layanan => $layanan) {{$layanan->nama_detail_dep}} @if($inx_layanan<$count_layanan-1) , @endif @endforeach</td>
                @foreach($val['koslain'] as $inx_koslain => $koslain)
                <?php $set[$index+1][$inx_koslain] = nominal($koslain); ?>
                
                @endforeach
                
                @foreach($val['koslain'] as $inx_koslain => $koslain)
                @if($index==$inx_koslain)
                <td>(@currency(subtotal($set, $index)) )</td>
                @else
                <td>@currency(nominal($koslain)) </td>
                @endif
                @endforeach
            </tr>
            @endif
        @endforeach
        <tr>
            <td>saldo setelah alokasi</td>
            @for($a=0; $a<$data->headerCol; $a++)
            <td>@currency(total($data, $a, $set))</td>
            @endfor
        </tr>
    </table>

    <table width="300px">
        <br/>
        <br/>
        <br/>
    <tr>
        <td ><h2 class="card-title text-bold">Tarif BOP Di dep Produksi : </h3></td>
    </tr> 
    @foreach($data->set as $index=>$val)
        @if($val['jenis_dp']=='Produksi') 
        <tr>
            <td width="auto"><h3 class="card-title text-bold">{{$val['nama_detail_dep']}} :</h3>&nbsp;&nbsp; @currency(total($data, $index, $set))/{{$val['beban']}}= @currency(total($data, $index, $set)/$val['beban'])/jam</td>
        </tr>
        @endif
    @endforeach
    </table>
</div>
</div>
<?php
function nominal($data){
    if($data==[]){
        return null;
    }else{
        return $data;
    }
}
function subtotal($data, $index){
    $total = 0;
    foreach($data as $inx_data=> $val_data){
        foreach($val_data as $inx_sub => $val_sub){
            if($inx_sub==$index){
                $total = $total + $val_sub;
            }   
        }
    }
    return $total;
}
function qty_dep($data, $kode){
    $qty = 0;
    foreach($data->dep as $dep){
        if($dep->kd_dp==$kode){
            $qty = count($dep->child);
        }
    }
    return $qty;
}
function total($data, $index, $set){
    $qty_jasa = qty_dep($data,'DP001' );
    
    if($index<$qty_jasa){
        return 0;
    }else{
        // dd($set);
        return subtotal($set, $index);
    }

}

// dd($set);
?>
@endsection