@extends('layouts.main')

@section('content')
    <div class="card  card-success">
         <div class="card-header">
             <h3 class="card-title">Input Data Dasar Pembebanan</h3>
              @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Uppsssss!</strong> Coba cek kembali yang anda inputkan<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                 <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>

    <div class="card-body">
    <form method="post" action="{{ route('dasar.store') }}">
    @csrf

    <div class="form-row align-items-center">
        <div class="col-5">
        <label class="sr-only" for="inlineFormInput">Kode Departemen</label>
        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Masukan Kode Dasar Pembebanan" name="" id="validationTooltip01">
       <div class="valid-feedback">
      
        </div>
        </div>
        <div class="col-5">
        <label class="sr-only" for="inlineFormInputGroup">Jenis Departemen</label>
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Masukan Nama Dasar Pembebanan" name="nama_dasar[]" id="validationTooltip02" required >
            <div class="valid-feedback">
        
        </div>
        </div>
        </div>
        <div class="col-2">
        <label class="sr-only" for="inlineFormInputGroup"></label>
        <div class="input-group mb-2">
            <a href="#" class="addinput btn-primary btn-sm">tambah form</a>
        </div>
        </div>
        
    </div>
        <div class="input">  </div>

        <div class="input-group mb-2 mt-5">
        <input type="submit" class=" form-control btn-success " value="Tambah" id="button">
        </div>
    </form>
    </div>
    </div>

    <div class="card mt-5">

    <div class="card-header">
       <h3 class="card-title">Hasil Input Data Dasar Pembebanan</h3>
    </div>
    <div class="card-body">
         @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div id="box">
    <table class="p table table-striped table-bordered" id="p">
        <tr>
            <th>No</th>
            <th>Kode Dasar Pembebanan</th>
            <th>Nama Dasar Pembebanan</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($dasars as $key => $ds)
        <tr>

            <td>{{ $key+1 }}</td>
            <td>{{ $ds->kd_dasar }}</td>
            <td>{{ $ds->nama_dasar }}</td>
            <td>
                <form action="{{ route ('dasar.destroy',$ds->kd_dasar) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('dasar.edit',$ds->kd_dasar) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

    </div>

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
      $('.addinput').on('click', function(){
        addinput();
      });
      function addinput(){
        var input='<div> <div class="form-row align-items-center"><div class="col-5"><label class="sr-only" for="inlineFormInput">Kode Departemen</label><input required type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Masukan Kode Dasar Pembebanan" name="kd_dasar[]"></div><div class="col-5"><label class="sr-only" for="inlineFormInputGroup">Jenis Departemen</label><div class="input-group mb-2"><input required type="text" class="form-control" id="inlineFormInputGroup" placeholder="Masukan Nama Dasar Pembebanan" name="nama_dasar[]"></div></div><div class="col-2"><label class="sr-only" for="inlineFormInputGroup"></label><div class="input-group mb-2"><a href="#" class="remove btn-danger btn-sm">hapus</a></div></div></div></div>';
        $('.input').append(input);
      };
        $('.remove').live('click', function(){
        $(this).parent().parent().parent().remove();
      });
</script> -->
@endsection
