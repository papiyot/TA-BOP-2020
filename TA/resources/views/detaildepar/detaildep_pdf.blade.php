<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<h2 align="center"> DAFTAR DETAIL DEPARTEMEN</h2>
 <table class="table table-striped table-bordered text-center" border="1" align="center">
        <tr>
            <th>No</th>
            <th>Kode Detail Departemen</th>
            <th>Jenis Departemen</th>
            <th>Nama Detail Departemen</th>
            <th>Kos awal</th>
            <th> Nama PT</th>
        </tr>
        @foreach ($detail_dep as $key => $detaildep)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $detaildep->kd_detail_dep }}</td>
             <td>{{ $detaildep->depa->jenis_dp }}</td>
            <td>{{ $detaildep->nama_detail_dep }}</td>
            <td>@currency( $detaildep->kos_awal)</td>
            <td> {{ $detaildep->detdsr->pt->nama_pt}}</td>    
        </tr>
        @endforeach
    </table>
</body>
</html>

