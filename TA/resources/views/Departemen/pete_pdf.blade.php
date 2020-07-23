<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2 align="center">DAFTAR PT</h2>
 <table class="table table-striped table-bordered text-center" align="center" border="1">
        <tr>
            <th>No</th>
            <th>kode PT</th>
            <th>Nama PT</th>
            <th>ALamat PT</th>
            <th>No Telp PT</th>
            
        </tr>
        @foreach ($pt as $i => $pt)

            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pt->kd_pt }}</td>
                <td>{{ $pt->nama_pt }}</td>
                <td>{{ $pt->alamat_pt }}</td>
                <td>{{ $pt->noTelp_pt }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>