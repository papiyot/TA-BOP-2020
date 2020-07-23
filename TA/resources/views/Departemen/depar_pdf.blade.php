 <h2 align="center">DAFTAR DEPARTEMEN</h2>
 <table class="table table-striped table-bordered text-center" border="1" align="center">
        <tr>
            <th>No</th>
            <th>Kode Departemen</th>
            <th>Jenis Departemen</th>
        </tr>
        @foreach ($dep as $key => $depa)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $depa->kd_dp }}</td>
            <td>{{ $depa->jenis_dp }}</td>
        </tr>
        @endforeach
    </table>