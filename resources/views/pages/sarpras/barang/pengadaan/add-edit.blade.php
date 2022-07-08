@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', isset($data) ? 'Edit Pengadaan' : 'Create Pengadaan' )


@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">@yield('title')</h1>
<!-- end page-header -->


<!-- begin panel -->
<form action="{{ isset($data) ? route('sarpras.barang.pengadaan-barang.update', $data->id) : route('sarpras.barang.pengadaan-barang.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
  @csrf
  @if(isset($data))
  {{ method_field('PUT') }}
  @endif

  <div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
      <h4 class="panel-title">Form @yield('title')</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      </div>
    </div>
    <!-- end panel-heading -->
    <!-- begin panel-body -->
    <div class="panel-body">
      <input type="hidden" name="code" value="000">
      <div class="form-group">
        <label for="databarang_id">Nama Barang*</label>
        <x-form.dropdown name="databarang_id" :options="$barang" :selected="old('databarang_id') ?? (isset($data->databarang_id) ? $data->databarang_id : null)" placeholder="Pilih Barang" />
      </div>
      <div class="form-group">
        <label for="supplier_id">Nama Supplier*</label>
        <x-form.dropdown name="supplier_id" :options="$supplier" :selected="old('supplier_id') ?? (isset($data->supplier_id) ? $data->supplier_id : null)" placeholder="Pilih Supplier" />
      </div>
      <div class="form-group">
        <label for="jumlah">Jumlah Barang*</label>
        <input type="number" name="jumlah" class="form-control" autofocus data-parsley-required="true" value="{{{ old('jumlah') ?? $data->jumlah ?? null }}}">
      </div>
      <div class="form-group">
        <label for="harga">Harga Barang*</label>
        <input type="number" name="harga" class="form-control" autofocus data-parsley-required="true" value="{{{ old('harga') ?? $data->harga ?? null }}}">
      </div>
      <div class="form-group">
        <label for="kondisi">Kondisi*</label>
        <select class="select2 form-control" name="kondisi">
          <option selected value="{{{ old('kondisi') ?? $data->kondisi ?? '' }}}">{{{ old('kondisi') ?? $data->kondisi ?? 'Pilih Status' }}}</option>
          <option value="baik">Baik</option>
          <option value="sedang">Sedang</option>
          <option value="rusak">Rusak</option>
        </select>
      </div>
      <div class="form-group">
        <label for="satuan_id">Tanggal Pengadaan*</label>
        <div class="row">
          <div class="col-md-12">
            <input type="text" name="tanggal_pengadaan" class="form-control date-picker" placeholder="Tanggal Pengadaan" value="{{{ old('tanggal_pengadaan') ?? (isset($data->tanggal_pengadaan) ? $data->tanggal_pengadaan : null) ?? null }}}" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="depresiasi">Depresiasi</label>
        <input type="number" name="depresiasi" class="form-control" autofocus data-parsley-required="false" value="{{{ old('depresiasi') ?? $data->depresiasi ?? 0 }}}">
      </div>
      <div class="form-group">
        <label for="lama_depresiasi">Lama Depresiasi (Bln)</label>
        <input type="number" name="lama_depresiasi" class="form-control" autofocus data-parsley-required="false" value="{{{ old('lama_depresiasi') ?? $data->lama_depresiasi ?? 0 }}}">
      </div>
      <div class="form-group">
        <label for="keteranga">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" autofocus data-parsley-required="false" value="{{{ old('keterangan') ?? $data->keterangan ?? null }}}">
      </div>
      
      
    </div>
    <!-- end panel-body -->
    <!-- begin panel-footer -->
    <div class="panel-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <!-- end panel-footer -->
  </div>
  <!-- end panel -->
</form>
<a href="javascript:history.back(-1);" class="btn btn-success">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</a>

@endsection

@push('scripts')
<script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.js') }}"></script>
<script src="{{ asset('/assets/js/custom/datetime-picker.js') }}"></script>
@endpush