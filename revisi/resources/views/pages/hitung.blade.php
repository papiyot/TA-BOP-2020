@extends('layouts.app')
@section('title')PERHITUNGAN @endsection
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
                <h3 class="block-title" style="font-size: 2rem;">
                    Hitung 
                </h3>

                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            <div class="block-content">
                <!-- Orders Table -->
                <div class="table-responsive">
                <form action="{{ route('hitung_store') }}" method="post"> @csrf
                    <table class="table table-borderless table-striped ">
                        <thead>
                        <tr>
                            <!-- <th class="text-center" style="width: 10%;">#</th> -->
                            <th>Departement</th>
                            @foreach($data->pembebanan as $pembebanan)
                            
                            <th class="text-right">{{$pembebanan->pembebanan_nama}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->departemen as $departemen)
                            <tr>
                                <th class="text-uppercase">{{$departemen->departemen_nama}}</th>
                                @foreach($data->pembebanan as $pembebanan)
                                <td class="text-right">
                                    <input type="number" min="0" class="form-control"  name="hitung[{{$departemen->departemen_id}}][{{$pembebanan->pembebanan_id}}]" required value="@php echo findku($data->hitung, $pembebanan->pembebanan_id, $departemen->departemen_id); @endphp">
                                </td>
                                @endforeach
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-alt-primary">
                        <i class="fa fa-plus mr-5"></i> Submit
                    </button>
            </form>
                </div>
                <!-- END Orders Table -->

            </div>
        </div>
    </div>
@endsection
