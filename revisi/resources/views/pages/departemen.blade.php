@extends('layouts.app')
@section('title')DEPARTEMENT @endsection
@section('content')
<div class="col-md-12">
    <!-- Material (floating) Register -->
    <div class="block block-themed  @if(session()->has('status')) 'block-mode-hidden' @else {{$data->class}} @endif">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} DEPARTEMENT</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
            </div>
        </div>
        <div class="block-content">
            <form action="{{ route('master.store',['departemen', 'DP-']) }}" method="post"> @csrf
                <div class="form-group row">
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="hidden" class="form-control" id="departemen_id" name="departemen_id" value="@php echo ($data->edit) ? $data->edit->departemen_id: ''; @endphp">
                            <input type="hidden" class="form-control" id="pt_id" name="pt_id" value="@php echo ($data->edit) ? $data->edit->pt_id: ''; @endphp">
                            @if($data->edit)
                            <input type="hidden" class="form-control" id="departemen_nama_old" name="departemen_nama_old" required value="@php echo ($data->edit) ? $data->edit->departemen_nama: null; @endphp">
                            @endif
                            <input type="text" class="form-control" id="departemen_nama" name="departemen_nama" required value="@php echo ($data->edit) ? $data->edit->departemen_nama:  old('departemen_nama'); @endphp">
                            @if(session()->has('status')) <p class="text-danger">{{ session()->get('status') }}</p> @endif
                            <label for="departemen_nama">Nama Departemen</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <select type="text" required class="form-control" id="departemen_type" name="departemen_type">
                                <option>Pilih Jenis</option>
                                <option value="jasa" @php echo ($data->edit) ? ($data->edit->departemen_type=='jasa') ? 'selected': '' : null; @endphp>Jasa</option>
                                <option value="produksi" @php echo ($data->edit) ? ($data->edit->departemen_type=='produksi') ? 'selected': '' : null; @endphp>Produksi</option>
                            </select>
                            <label for="departemen_type">Jenis Departemen</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <select type="text" required class="form-control" id="beban" name="beban">
                                <option>Pilih Dasar Pembebanan</option>
                                @foreach($data->pembebanan as $pembebanan)
                                <option value="{{$pembebanan->pembebanan_id}}" @php echo ($data->edit) ? ($data->edit->beban == $pembebanan->pembebanan_id) ? 'selected': '' : null; @endphp>{{$pembebanan->pembebanan_id}} [ {{$pembebanan->pembebanan_nama}} ]</option>
                                @endforeach
                            </select>
                            <label for="beban">Dasar Pembebanan</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" class="form-control" id="departemen_kosawal" name="departemen_kosawal" required value="@php echo ($data->edit) ? $data->edit->departemen_kosawal: old('departemen_kosawal'); @endphp">
                            <label for="departemen_kosawal">Kost Awal</label>
                        </div>
                    </div>
                    
                </div>
                <div class="form-group row"></div>
                <div class="dropdown-divider"></div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-plus mr-5"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-alt-secondary">
                            <i class="fa fa-minus mr-5"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Material (floating) Register -->

    <div class="block block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">Daftar DEPARTEMENT</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">#</th>
                            <th>NAMA</th>
                            <th>Jenis</th>
                            <th>Dasar Pembebanan</th>
                            <th class="text-right">Kost Awal</th>
                            <th class="text-center" style="width: 15%;">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-uppercase text-primary">{{$list->departemen_nama}}</td>
                            <td class="font-w300 font-size-sm text-uppercase text-secondary">{{$list->departemen_type}}</td>
                            <td class="font-w300 font-size-sm text-uppercase text-secondary">
                            @foreach($data->pembebanan as $pembebanan)
                            @php echo  ($list->beban == $pembebanan->pembebanan_id) ? $pembebanan->pembebanan_nama: '' ; @endphp
                            @endforeach
                            </td>
                            <td class="font-w300 font-size-sm text-uppercase text-secondary text-right"> @rp($list->departemen_kosawal)</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['departemen', $list->departemen_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @if($data->count>1)
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['departemen', $list->departemen_id]) }}"><i class="fa fa-times"></i></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @php $no++; @endphp @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection