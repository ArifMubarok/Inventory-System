@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', isset($data) ? 'Edit Supplier' : 'Create Supplier' )

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
<form action="{{ isset($data) ? route('admin.master.data-supplier.update', $data->id) : route('admin.master.data-supplier.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
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
        <input type="hidden" name="status" value="1">
        <label for="nama_supplier">Nama Supplier</label>
        <input type="text" name="nama_supplier" class="form-control" autofocus data-parsley-required="true" value="{{{ old('nama_supplier') ?? $data->nama_supplier ?? null }}}">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" class="form-control" data-parsley-required="true" value="{{{ old('alamat') ?? $data->alamat ?? null }}}">
      </div>
      <div class="form-group">
        <label for="kota">Kota</label>
        <input type="text" name="kota" class="form-control" data-parsley-required="true" value="{{{ old('kota') ?? $data->kota ?? null }}}">
      </div>
      <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" name="fax" class="form-control" data-parsley-required="true" value="{{{ old('fax') ?? $data->fax ?? null }}}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" data-parsley-required="true" value="{{{ old('email') ?? $data->email ?? null }}}">
      </div>
      <div class="form-group">
        <label for="cp">Contact Person</label>
        <input type="text" name="cp" class="form-control" data-parsley-required="true" value="{{{ old('cp') ?? $data->cp ?? null }}}">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input name="keterangan" class="form-control" data-parsley-required="true" value="{{{ old('keterangan') ?? $data->keterangan ?? null }}}">
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