
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<H2 align="center"> Laporan  Data Anggaran PT @foreach ($data->pet as $pes) @endforeach
                    {{ $pes->nama_pt }}  </H2>
    <div class="table-responsive">
    <table class="table table-bordered">

        <tr>
            <th scope="col">Departemen</th>
            <th scope="col">Kos Awal</th>
            <th scope="col">Jam Kerja langsung (dalam Jam)</th>
            <th scope="col">luas Lahan(m2)</th>
            <th scope="col">Jam Mesin (dalam Jam)</th>
            <th scope="col">Dasar pembebanan</th>
            <th scope="col">Melayani Departemen</th>
        </tr>

        @foreach ($data->getdata as $key => $val)
        <tr>

            <td>{{ $val->detaildep->nama_detail_dep }}</td>
            <td>@currency($val->detaildep->kos_awal )</td>
            <td>{{ $val->jkl }}</td>
            <td>{{ $val->lh }}</td>
            <td>{{ $val->jm }}</td>
            <td>{{ $val->dasar->nama_dasar }}</td>
            <td>
                @php $count = count($val->layanan)-1; @endphp
                @foreach ($val->layanan as $index => $sub)
                {{$sub->detaildep->nama_detail_dep}} @if($index<$count) , @endif @endforeach </td>
            </tr>

            @endforeach
     </table>
 </div>
</body>
</html>