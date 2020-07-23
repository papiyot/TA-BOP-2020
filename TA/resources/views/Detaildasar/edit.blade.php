@extends('layouts.main')

@section('content')

<div class="justify-content-center">
	<div class="card ">
		<div class="card-header">
			Input Data Detail
		</div>
		<div class="card-body">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif
			<form  class="mt-5" method="post" action="{{ route('detail_dasar.update',$detail_dasar->kd_detail_dasar ) }}" id="myForm">
				@csrf
				@method('PUT')
				<div class="form-group row">
					<label class=" col-sm-3 col-form-label"> Kode Detail Detail Dasar</label>
					<div class="col-sm-7">
						<div class="input-group">
							<input type="text" class="uang  form-control"  value="{{ $detail_dasar->kd_detail_dasar }}" name="jkl" id="uang" selected readonly> 
							<div class="input-group-prepend">
								
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class=" col-sm-3 col-form-label">Nama Pt</label>
					<div class="col-sm-7">
						<select class="form-control select2bs4" style="width: 100%;" name="pt_id">
						@foreach ($pet as $pes)
						<option value="{{ $pes->kd_pt }}">{{ $pes->nama_pt}} </option>
						@endforeach
					</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Nama Detail Departemen</label>
					<div class="col-sm-7">
						<select class="form-control select2bs4" style="width: 100%;" name="detaildep_id">
						@foreach($det as $pesss)
						<option value="{{ $pesss->kd_detail_dep }}"> {{ $pesss->nama_detail_dep }} </option>
						@endforeach
					</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Dasar Pembebanan</label>
					<div class="col-sm-7">
						<select class="form-control select2bs4" style="width: 100%;" name="beban_id">
							@foreach ($dsr as $de)
							<option value="{{ $de->kd_dasar }}">{{ $de->nama_dasar}} </option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<label class=" col-sm-3 col-form-label"> Jam Kerja Langsung</label>
					<div class="col-sm-7">
						<div class="input-group">
							<input type="text" class="uang  form-control"  value="{{ $detail_dasar->jkl }}" name="jkl" id="uang" > 
							<div class="input-group-prepend">
								
							</div>
						</div>
					</div>
				</div>


				<div class="form-group row">
					<label class=" col-sm-3 col-form-label"> Jam Mesin</label>
					<div class="col-sm-7">
						<div class="input-group">
							<input type="text" class="uang  form-control" value="{{ $detail_dasar->jm }}" name="jm" id="uang" > 
							<div class="input-group-prepend">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class=" col-sm-3 col-form-label"> Luas Lahan</label>
					<div class="col-sm-7">
						<div class="input-group">
							<input type="text" class="uang  form-control" name="lh" id="uang" value="{{ $detail_dasar->lh }}" > 
							<div class="input-group-prepend">
								
							</div>
						</div>
					</div>
				</div>
				
				
				<button type="submit" class="btn btn-primary btn-sm btn-block">Edit</button>
				<a  href="{{ route('detail_dasar.index')}}" class="btn btn-secondary btn-sm btn-block">kembali</a>
			</form>  
		</div>
	</div>
</div>


@endsection
