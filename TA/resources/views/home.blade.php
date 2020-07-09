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
      </div><!-- /.container-fluid -->
    </section>

    <div class="card text-center">
        <div class="card-body">
        	 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

		 		<h5 class="card-title">Selamat Datang</h5>
		        <p class="card-text">Untuk memulai Perhitungan tarif BOP Departemen
		            Produksi dengan Metode Bertahap klik Mulai </p>
		        <a href="{{ route('pt.create') }}" class="btn btn-primary">Mulai</a>

        </div>
        </div>
    </div>

@endsection