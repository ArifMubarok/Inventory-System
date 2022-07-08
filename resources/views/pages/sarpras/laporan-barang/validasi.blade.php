@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Validasi Laporan' )


@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">@yield('title')</h1>
<!-- end page-header -->


<!-- begin panel -->
@foreach ($data as $item)
<form action="{{ route('sarpras.laporan-barang.update', $item->id) }}" id="form" name="form" method="Post" data-parsley-validate="true">
  @csrf
  @method('put')
  <div class="row">
		<!-- begin col-12 -->
		<div class="col-md-12 ui-sortable">

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading ui-sortable-handle">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					</div>
					<h4 class="panel-title">Formulir </h4>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-2 offset-md-1">Barcode*</label>
							<div class="col-md-6">
								<input type="text" readonly="" class="form-control m-b-5" name="barcode" id="barcode" value="{{ $item->barang->penempatan->barcode }}" placeholder="Barcode" required="required">
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-2 offset-md-1">Barang*</label>
							<div class="col-md-6">
								<input type="text" readonly="" class="form-control m-b-5" name="barang" id="barang" value="{{ $item->barang->penempatan->pengadaan->databarang->name }}" placeholder="Barang" required="required">
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-2 offset-md-1">Judul Laporan*</label>
							<div class="col-md-6">
								<input type="text" readonly="" class="form-control m-b-5" name="judul" id="judul" value="{{ $item->judul_laporan }}" placeholder="Judul Laporan" required="required">
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-2 offset-md-1">Laporan*</label>
							<div class="col-md-6">
								<input type="text" readonly="" class="form-control m-b-5" name="laporan" id="laporan" value="{{ $item->laporan }}" placeholder="Laporan" required="required">
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-2 offset-md-1">Status*</label>
              @switch($item->status)
                @case('selesai')
                @case('ditolak')
                      <div class="col-md-6">
                        <input type="text" readonly="" class="form-control m-b-5" name="status" id="status" value="{{ $item->status }}" placeholder="Status" required="required">
                      </div>
                    @break
                @case('menunggu')
                @case('proses')
                <div class="col-md-6">
                  <select class="select2 form-control" name="status">
                    <option selected>{{{ old('status') ?? $item->status ?? 'Pilih Status' }}}</option>
                    <option value="selesai">Selesai</option>
                    <option value="proses">Proses</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="ditolak">Ditolak</option>
                  </select>
                </div>
                    @break
                @default
              @endswitch
						</div>
            @switch($item->status)
                @case('selesai')
                @case('ditolak')
                      <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Respon</label>
                        <div class="col-md-6">
                          <textarea class="form-control m-b-5" name="keterangan" id="keterangan" rows="3" placeholder="{{ $item->keterangan }}" readonly></textarea>
                        </div>
                      </div>
                    @break
                @case('menunggu')
                @case('proses')
                      <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Respon</label>
                        <div class="col-md-6">
                          <textarea class="form-control m-b-5" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
                        </div>
                      </div>
                    @break
                @default
              @endswitch

            @switch($item->status)
                @case('selesai')
                @case('ditolak')
                    @break
                @case('menunggu')
                @case('proses')
                <div class="form-group row m-b-15">
                  <label class="control-label col-md-2 offset-md-1"></label>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle"></i> Simpan</button>&nbsp;
                    <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Kosongkan</button>&nbsp;
                  </div>
                </div>
                    @break
                @default
                    
            @endswitch
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-6 -->
	</div>
  <!-- end panel -->
  @endforeach
</form>
<a href="{{ route('sarpras.laporan-barang.index') }}" class="btn btn-success">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</a>

@endsection

@push('scripts')
<script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.js') }}"></script>
<script src="{{ asset('/assets/js/custom/datetime-picker.js') }}"></script>
@endpush