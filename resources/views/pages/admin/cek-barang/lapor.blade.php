@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Lapor Barang')

@push('css')
<!-- datatables -->
<link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
<!-- end datatables -->
@endpush

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Lapor Barang</h1>
<!-- end page-header -->


<!-- begin panel -->
<div class="panel panel-inverse">
  <!-- begin panel-heading -->
  <div class="panel-heading">
    <h4 class="panel-title">Data @yield('title')</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
    </div>
  </div>
  <!-- end panel-heading -->
  <!-- begin panel-body -->
  <div class="panel-body">
    <form action="{{ route('admin.cek-barang.kirim') }}" class="form-horizontal" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="form-group row m-b-15">
            <p class="bold">Barang</p>
          </div>  
        </div>
      </div>
      @foreach ($barang as $item)
      @foreach ($barang_id as $barang)
      <input type="hidden" name="barang_id" value="{{ $barang->id }}">
      @endforeach
      <input type="hidden" name="pelapor" value="{{ Auth::user()->name }}">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group row m-b-15">
            <label class="col-form-label col-md-2">Barcode</label>
              <div class="col-md-4">
                <input type="text" readonly="" class="form-control m-b-5" value="{{ $item->barcode }}">
              </div>
              <label class="col-form-label col-md-2">Barang</label>
              <div class="col-md-4">
                <input type="text" readonly="" class="form-control m-b-5" value="{{ $item->pengadaan->databarang->name}}">
              </div>
            </div>
            <div class="form-group row m-b-15">
              <label class="col-form-label col-md-2">Departemen</label>
              <div class="col-md-4">
              <input type="text" readonly="" class="form-control m-b-5" value="{{ $item->bagian->departemen->name }}">
            </div>
            <label class="col-form-label col-md-2">Bagian</label>
              <div class="col-md-4">
                <input type="text" readonly="" class="form-control m-b-5" value="{{ $item->bagian->name }}">
              </div>
            </div> 
            <div class="form-group row m-b-15">
              <label class="col-form-label col-md-2">Lokasi</label>
              <div class="col-md-4">
                <input type="text" readonly="" class="form-control m-b-5" value="{{ $item->lokasi->name }}">
              </div>
              <label class="col-form-label col-md-2">Kondisi</label>
              <div class="col-md-4">
                <input type="text" readonly="" class="form-control m-b-5" value="{{ $item->kondisi }}">
              </div>
            </div>  
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group row m-b-15">
              <blockquote class="pull-left">Tambah Laporan</blockquote>  
            </div>  
          </div>
        </div> 
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row m-b-15">
              <label class="col-form-label col-md-2">Judul Laporan*</label>
                <div class="col-md-10">
                  <input type="text" class="form-control m-b-5" name="judul_laporan" id="judul" value="" placeholder="Judul Laporan" required="required">
                </div>
              </div>
              <div class="form-group row m-b-15">
                <label class="col-form-label col-md-2">Laporan*</label>
                <div class="col-md-10">
                  <textarea name="laporan" rows="10" required="" class="form-control m-b-5" id="laporan" placeholder="Judul Laporan"></textarea>
                </div>
              </div> 
            </div>
          </div>   
          <div class="row">
            <div class="col-md-12">                            
              <div class="form-group row m-b-15">
                <label class="control-label col-md-2"></label>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle"></i> Simpan</button>&nbsp;
                  <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Kosongkan</button>&nbsp;
                </div>
              </div>
            </div>
          </div>                                  
      </form>
    @endforeach
</div>
  <!-- end panel-body -->
</div>
<!-- end panel -->
@endsection