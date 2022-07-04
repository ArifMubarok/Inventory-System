@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', isset($data) ? 'Edit Barang' : 'Create Barang' )

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
<form action="{{ isset($data) ? route('admin.master.data-barang.update', $data->id) : route('admin.master.data-barang.store') }}" id="form" name="form" method="POST" data-parsley-validate="true" enctype="multipart/form-data">
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
      <div class="form-group">
        <label for="name">Nama Barang</label>
        <input type="text" name="name" class="form-control" autofocus data-parsley-required="true" value="{{{ old('name') ?? $data->name ?? null }}}">
      </div>
      <div class="form-group">
        <label for="name">Barcode</label>
        <input type="text" name="barcode" class="form-control" autofocus data-parsley-required="true" value="{{{ old('barcode') ?? $data->barcode ?? null }}}">
      </div>
      <div class="form-group">
        <label for="satuan_id">Nama Satuan</label>
        <x-form.dropdown name="satuan_id" :options="$satuan" :selected="old('satuan_id') ?? (isset($data->satuan_id) ? $data->satuan_id : null)" placeholder="Pilih Satuan" />
      </div>
      <div class="form-group">
        <label for="merk_id">Nama Merk</label>
        <x-form.dropdown name="merk_id" :options="$merk" :selected="old('merk_id') ?? (isset($data->merk_id) ? $data->merk_id : null)" placeholder="Pilih Merk" />
      </div>
      <div class="form-group">
        <label for="kategori_id">Nama Kategori</label>
        <x-form.dropdown name="kategori_id" :options="$kategori" :selected="old('kategori_id') ?? (isset($data->kategori_id) ? $data->kategori_id : null)" placeholder="Pilih Kategori" />
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" autofocus data-parsley-required="true" value="{{{ old('keterangan') ?? $data->keterangan ?? null }}}">
      </div>
      <div class="form-group">
        <label for="image">Foto</label>
        <input type="file" name="image" class="form-control" value="{{{ old('image') ?? $data->image ?? null }}}">
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
@endpush