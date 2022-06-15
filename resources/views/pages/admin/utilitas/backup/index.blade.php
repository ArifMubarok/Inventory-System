@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Backup Database')

@push('css')
<!-- datatables -->
{{-- <link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" /> --}}
<!-- end datatables -->
@endpush

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item"><a href="javascript:;">Utilitas</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Utilitas<small> @yield('title')</small></h1>
<!-- end page-header -->


<!-- begin panel -->
<div class="panel panel-inverse">
  <!-- begin panel-heading -->
  <div class="panel-heading">
    <h4 class="panel-title">@yield('title')</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
    </div>
  </div>
  <!-- end panel-heading -->
  <!-- begin panel-body -->
  <div class="panel-body">
    <div class="note note-warning m-b-15">
        <div class="note-icon f-s-20">
            <i class="fa fa-exclamation-triangle fa-2x"></i>
        </div>
        <div class="note-content">
            <h4 class="m-t-5 m-b-5 p-b-2">Perhatian</h4>
            <ul class="m-b-5 p-l-25">
                <li>Silahkan Klik Tombol Download Untuk Membackup database.</li>
            </ul>
        </div>
    </div>
    <button type="button" class="btn btn-primary"><i class="fas fa-download"></i> <strong>DOWNLOAD BACKUP DATABASE</strong></button>
  </div>
  <!-- end panel-body -->
</div>
<!-- end panel -->
@endsection

@push('scripts')

{{-- <script src="{{ asset('assets/js/custom/delete-with-confirmation.js') }}"></script>
<script>
  $(document).on('delete-with-confirmation.success', function() {
    $('.buttons-reload').trigger('click')
  })
</script> --}}
@endpush