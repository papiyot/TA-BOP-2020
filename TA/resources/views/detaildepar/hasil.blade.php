 


 <table class="table table-striped table-bordered">
        <tr>
            <th>No</th>
            <th>Kode Detail Departemen</th>
            <th>Jenis Departemen</th>
            <th>Nama Detail Departemen</th>
            <th>Kos awal</th>
            

            <th width="280px">Action</th>
        </tr>
        @foreach ($detail_dep as $key => $detaildep)
        <tr>

            <td>{{ $key+1 }}</td>
            <td>{{ $detaildep->kd_detail_dep }}</td>
             <td>{{ $detaildep->depa->jenis_dp }}</td>
            <td>{{ $detaildep->nama_detail_dep }}</td>
            <td>@currency( $detaildep->kos_awal)</td>
           

            <td>
                <form action="{{ route ('detail_dep.destroy',$detaildep->kd_detail_dep) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('detail_dep.edit',$detaildep->kd_detail_dep) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>