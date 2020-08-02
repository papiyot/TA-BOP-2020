
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
   
<H2 align="center" @foreach($pet as $pes)
     @if($pes->kd_pt==$cari) selected @php $namapt=$pes->nama_pt; @endphp @endif
     @endforeach >Detail Dasar Pembebanan PT {{ $namapt }}  </H2>
     <br>
     <br>
     
    <div class="table-responsive">
    <table class="table table-bordered text-center">
         <tr>
        <th>kode Detail Dasar Pembebanan</th>
        <th>Nama Detail Departemen</th>
        <th>Kos Awal</th>
        <th>Jam Kerja langsung (dalam Jam)</th>
        <th>luas Lahan(m2)</th>
        <th>Jam Mesin (dalam Jam)</th>
        <th>Dasar pembebanan</th>
        <th> Nama PT</th>
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
        <td> {{$key->pt->nama_pt }}</td>

     
    </tr>
    @endforeach
</table>
 </div>
</body>
</html>