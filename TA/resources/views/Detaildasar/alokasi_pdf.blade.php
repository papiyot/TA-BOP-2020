<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    @php
    $set=[];
    @endphp

    <h2 class="text-center" align="center">Laporan Pengalokasian BOP</h2>
    <h3 class="text-center" align="center"
    @foreach ($data->pet as $pes)
     @if($pes->kd_pt==$data->cari) selected @php $namapt=$pes->nama_pt; @endphp @endif
     @endforeach>PT  {{ $namapt }}</h3>

        <div class="table-responsive">
            <table  class="table table-bordered">
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
        </div>


    </div>


             <h2 class="text-center mt-5" align="center">Laporan Tarif BOP Departemen Produksi</h2>
        <h3 class="text-center" align="center">PT {{$namapt}}</h3> </br> </br>
            <div class="table-responsive">
                <table  align="center">
                   <thead>
                    <tr>
                        <td class="text-bold">Tarif BOP Di dep Produksi :
                        </td>
                    </tr>
                </thead>
                @foreach($data->set as $index=>$val)
                @if($val['jenis_dp']=='Produksi')
                <tbody>
                    <tr>
                        <td width="auto" class="text-bold">{{$val['nama_detail_dep']}} :&nbsp;&nbsp; @currency(total($data, $index, $set))/{{$val['beban']}}= @currency(total($data, $index, $set)/$val['beban'])/jam</td>
                    </tr>
                </tbody>
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



</body>
</html>
