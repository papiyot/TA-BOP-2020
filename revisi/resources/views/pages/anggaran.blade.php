@extends('layouts.app')
@section('title')Laporan Anggaran {{$data->pt->pt_nama}} @endsection
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
?>
    <div class="col-md-12">
        <div class="block block-themed block-rounded">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title text-uppercase" style="font-size: 2rem;">LAPORAN DATA ANGGARAN DAN PENGALOKASIAN
 {{$data->pt->pt_nama}}</h3>
                
            </div>
            <div id="print" class="block-content">
                <div class="font-w600 text-uppercase text-center">LAPORAN DATA ANGGARAN DAN PENGALOKASIAN {{$data->pt->pt_nama}}</div><br/>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Departement</th>
                            <th class="text-right">Kos Awal</th>
                            @foreach($data->pembebanan as $pembebanan)
                            
                            <th class="text-center">{{$pembebanan->pembebanan_nama}}</th>
                            @endforeach
                            <th>Melayani Departemen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->departemen as $index => $departemen)
                            <tr>
                                <th class="text-uppercase">{{$departemen->departemen_nama}}</th>
                                <td class="text-right">@rp($departemen->departemen_kosawal) </td>
                                @foreach($data->pembebanan as $pembebanan)
                                <td class="text-center">
                                    {{findku($data->hitung, $pembebanan->pembebanan_id, $departemen->departemen_id)}}
                                </td>
                                @endforeach
                                <td>
                                @if($departemen->departemen_type=='jasa')
                                    @foreach($data->alokasi[$index] as $num => $set)
                                    {{$set->departemen_nama}} @if($num < count($data->alokasi[$index])-1) , @endif
                                    @endforeach
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="block-content text-center">
            <btn class="btn btn-primary btn-sm" onclick="printDiv('print')">Cetak</btn>
            </div>
        </div>
    </div>
    
@endsection
