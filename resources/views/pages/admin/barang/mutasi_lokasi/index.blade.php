@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Mutasi Lokasi')

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
  <li class="breadcrumb-item"><a href="javascript:;">Barang</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Barang<small> @yield('title')</small></h1>
<!-- end page-header -->


<!-- begin panel -->
<div class="panel panel-inverse">
  <!-- begin panel-heading -->
  <div class="panel-heading">
    <h4 class="panel-title">@yield('title')</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
    </div>
  </div>
  <!-- end panel-heading -->
  
  <!-- begin panel-body -->
  <form class="panel-body" action="{{ route('admin.barang.mutasi-lokasi.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
    @csrf
    <div class="panel-body">
      {{ $dataTable->table() }}
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6">
            <div class="form-group row m-b-15">
              <label class="col-form-label col-md-4"><strong>Lokasi*</strong></label>
              <div class="col-md-8">
                <select id="lokasi_sel" name="lokasi_id" class="form-control">
                  @foreach ($lokasi as $itemss)
                  <option value="{{ $itemss->id }}">{{ $itemss->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row m-b-15">
              <label class="col-form-label col-md-4"></label>
              <div class="col-md-8">
                <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle"></i> Mutasikan</button>
                <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> Reset</button>
              </div>
            </div>
        </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
  </form>
  <!-- end panel-body -->
</div>
<!-- end panel -->
@endsection

@push('scripts')
<!-- datatables -->
<script src="{{ asset('assets/js/custom/datatable-assets.js') }}"></script>
{{ $dataTable->scripts() }}
<!-- end datatables -->

<script src="{{ asset('assets/js/custom/delete-with-confirmation.js') }}"></script>
<script>
  $(document).on('delete-with-confirmation.success', function() {
    $('.buttons-reload').trigger('click')
  })
</script>
@endpush