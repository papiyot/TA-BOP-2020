@extends('layouts.main')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Simple Tables</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Simple Tables</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Data PT</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">

              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>kode PT</th>
                  <th>Nama PT</th>
                  <th>ALamat PT</th>
                  <th>No Telp PT</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($pt as $i => $pt)
               <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pt->kd_pt }}</td>
                <td>{{ $pt->nama_pt }}</td>
                <td>{{ $pt->alamat_pt }}</td>
                <td>{{ $pt->noTelp_pt }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Data Departemen<h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Departemen</th>
                  <th>Jenis Departemen</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($dep as $key => $depa)
               <tr>

                <td>{{ $key+1 }}</td>
                <td>{{ $depa->kd_dp }}</td>
                <td>{{ $depa->jenis_dp }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Dasar Pembebanan</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <th>No</th>
            <th>kode Dasar</th>
            <th>Nama Dasar Pembebanan</th>
          </tr>

        </thead>
        @foreach ($dasar as $i => $dasar)
        <tbody>
         <td>{{ ++$i }}</td>
         <td>{{ $dasar->kd_dasar }}</td>
         <td>{{ $dasar->nama_dasar }}</td>
       </tr>
       @endforeach
     </tbody>
   </table>
 </div>
 <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Detail Departemen</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" >
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
             <th>No</th>
             <th>Kode Detail Departemen</th>
             <th>Jenis Departemen</th>
             <th>Nama Detail Departemen</th>
             <th>Kos awal</th>
           </tr>

         </thead>
         @foreach ($detail_dep as $key => $detaildep)
         <tbody>
           <td>{{ $key+1 }}</td>
           <td>{{ $detaildep->kd_detail_dep }}</td>
           <td>{{ $detaildep->depa->jenis_dp }}</td>
           <td>{{ $detaildep->nama_detail_dep }}</td>
           <td>@currency( $detaildep->kos_awal)</td>
         </tr>
         @endforeach
       </tbody>
     </table>
   </div>
   <!-- /.card-body -->
 </div>
 <!-- /.card -->
</div>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Detail Departemen</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
             <th>kode Detail Dasar Pembebanan</th>
            <th>Departemen</th>
            <th>Kos Awal</th>
            <th>Jam Kerja langsung (dalam Jam)</th>
            <th>luas Lahan(m2)</th>
            <th>Jam Mesin (dalam Jam)</th>
            <th>Total Jam Kerja(dalam Jam)</th>
            <th>Dasar pembebanan(dalam Jam)</th>
           </tr>

         </thead>
         @foreach ($detaildasar as $key)
         <tbody>
           <td> {{$key->kd_detail_dasar}}</td>
            <td>{{ $key->detaildep->nama_detail_dep }}</td>
            <td>@currency($key->detaildep->kos_awal )</td>
             <td>{{ $key->jkl }}</td>
            <td>{{ $key->lh }}</td>
            <td>{{ $key->jm }}</td>
            <td>{{ $key->tjk }}</td>
            <td>{{ $key->dasar->nama_dasar }}</td>
         </tr>
         @endforeach
       </tbody>
     </table>
   </div>
   <!-- /.card-body -->
 </div>
 <!-- /.card -->
</div>
</div>
</section>
<!-- /.content -->
</div>

@endsection