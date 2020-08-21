@extends('layouts.app')
@section('title')Laporan BOP {{$data->pt->pt_nama}} @endsection
@section('content')
<?php
 function findku($data, $par1, $par2){
    $nilai = 0;
    foreach($data as $val){
        if($val->pembebanan_id==$par1 && $val->departemen_id==$par2){
            $nilai = $val->hitung_value;
        }
    }
    return $nilai;
 }
 function subtotal($data, $in, $kos_awal){
     $nilai = $kos_awal;
     foreach($data as $val){
        $nilai = $nilai + $val->result[$in];
    }
    return $nilai;
 }
?>
    <div class="col-md-12">
        <div class="block block-themed block-rounded">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title text-uppercase" style="font-size: 2rem;">Laporan Pengalokasian BOP
 {{$data->pt->pt_nama}}</h3>
                
            </div>
            <div id="print" class="block-content">
                <div class="font-w600 text-uppercase text-center">Laporan Pengalokasian BOP {{$data->pt->pt_nama}}</div><br/>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" rowspan="2">#</th>
                            @foreach($data->group as $header)
                            <th class="text-center" colspan="{{count($header['child'])}}">{{$header['name']}}</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($data->group as $header)
                            @foreach($header['child'] as $sub)
                            <th class="text-center" >{{$sub->departemen_nama}} ({{$sub->pembebanan_nama}})</th>
                            @endforeach
                            @endforeach
                        </tr>
                        <tr>
                            <th class="text-center" >Total Kos</th>
                            @foreach($data->group as $header)
                            @foreach($header['child'] as $sub)
                            <td class="text-center" >@rp($sub->departemen_kosawal)</td>
                            @endforeach
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($data->group[0]['child'] as $index => $set)
                            <tr>
                            <td class="text-center" > Alokasi
                                {{$set->departemen_nama}} 
                                ke 
                                @foreach($set->alokasi as $in => $alokasi)
                                    {{$alokasi->departemen_nama}} @if($in < count($set->alokasi)-1) , @endif
                                @endforeach
                            </td>
                            @foreach($set->result as $num => $result)
                            <td class="text-center">@if($result!=null) @rp($result) @elseif($num==$index) (@rp(subtotal($data->group[0]['child'], $index, $set->departemen_kosawal))) @endif</td>
                            @endforeach
                            </tr>
                            @endforeach
                            <tr>
                            <td class="text-center" >Saldo setelah alokasi</td> 
                            @foreach($data->group as $group)
                            @foreach($group['child'] as $ind => $child)
                            <td class="text-center">
                                @if($group['name']=='produksi') @rp(subtotal($data->group[0]['child'], $ind+count($data->group[0]['child']), $child->departemen_kosawal)) @endif
                            </td>
                            @endforeach
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
                <hr/>
                <div class="text-center">
                        <span class="h3">Laporan Tarif BOP Departemen Produksi</span><br/>
                        <span class="h4">Tarif BOP Di dep Produksi :</span><br/>
                        @foreach($data->group[1]['child'] as $index => $set)
                        @php 
                        $sub = subtotal($data->group[0]['child'], $index+count($data->group[0]['child']), $set->departemen_kosawal);
                        $beban = findku($data->hitung, $set->pembebanan_id, $set->departemen_id);
                        @endphp
                        <span class="h5">{{$set->departemen_nama}} : @rp($sub)/{{$beban}}=@rp($sub/$beban)/Jam</span><br/>
                        @endforeach
                    </div>
            </div>
            <div class="block-content text-center">
            <btn class="btn btn-primary btn-sm" onclick="printDiv('print')">Cetak</btn>
            </div>
        </div>
    </div>
    
@endsection
