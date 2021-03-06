@extends('layouts.app')
@section('title')PEMBEBANAN @endsection
@section('content')
<div class="col-md-12">
    <!-- Material (floating) Register -->
    <div class="block block-themed  @if(session()->has('status')) 'block-mode-hidden' @else {{$data->class}} @endif">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} PEMBEBANAN</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
            </div>
        </div>
        <div class="block-content">
            <form action="{{ route('master.store',['pembebanan', 'PB-']) }}" method="post"> @csrf
                <div class="form-group row">
                    <div class="col-12 col-md-12 col-sm-12">
                        <div class="form-material floating">
                            <input type="hidden" class="form-control" id="pembebanan_id" name="pembebanan_id" value="@php echo ($data->edit) ? $data->edit->pembebanan_id: ''; @endphp">
                            @if($data->edit)
                            <input type="hidden" class="form-control" id="pembebanan_nama_old" name="pembebanan_nama_old" required value="@php echo ($data->edit) ? $data->edit->pembebanan_nama: null; @endphp">
                            @endif
                            <input type="text" class="form-control" id="pembebanan_nama" name="pembebanan_nama" required value="@php echo ($data->edit) ? $data->edit->pembebanan_nama:  old('pembebanan_nama'); @endphp">
                            @if(session()->has('status')) <p class="text-danger">{{ session()->get('status') }}</p> @endif
                            <label for="pembebanan_nama">Nama Pembebanan</label>
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
            <h3 class="block-title" style="font-size: 2rem;">Daftar PEMBEBANAN</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">#</th>
                            <th>NAMA</th>
                            <th class="text-center" style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-uppercase text-primary">{{$list->pembebanan_nama}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['pembebanan', $list->pembebanan_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @if($data->count>1)
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['pembebanan', $list->pembebanan_id]) }}"><i class="fa fa-times"></i></a>
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