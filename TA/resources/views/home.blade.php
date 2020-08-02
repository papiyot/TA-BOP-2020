@extends('layouts.main')
@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div> 
    </section>
    <div class="card text-center">
        <div class="card-body">
		 		<h2>Selamat Datang di Aplikasi Perhitungan Bop Departemen Produksi Dengan Metode Bertahap</h2>
         @if(auth::user('user')->jabatan=='Admin') 
		        <p class="card-text">Untuk memulai Perhitungan  klik Mulai </p>
		        <a href="{{ route('pt.create') }}" class="btn btn-primary"
           >Mulai</a>
           @endif
        </div>
        </div>
    </div>

@endsection