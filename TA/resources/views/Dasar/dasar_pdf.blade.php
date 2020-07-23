<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<body>
<h2 align="center">DAFTAR DASAR PEMBEBANAN</h2>
 <table border="1" >
        <tr>
            <th>No</th>
            <th>kode Dasar</th>
            <th>Nama Dasar Pembebanan</th>
   
        </tr>
        @foreach ($dasar as $i => $dasar)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dasar->kd_dasar }}</td>
                <td>{{ $dasar->nama_dasar }}</td>
 
            </tr>
        @endforeach
    </table>
</body>
</html>