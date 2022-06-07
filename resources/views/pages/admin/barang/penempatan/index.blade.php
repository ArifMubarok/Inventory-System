@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Pengadaan Barang')

@push('css')
<!-- datatables -->
<link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
<!-- end datatables -->

<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
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
    <h4 class="panel-title">DataTable - @yield('title')</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
    </div>
  </div>
  <!-- end panel-heading -->
  <!-- begin panel-body -->
  <form class="panel-body">
    {{ $dataTable->table() }}
  </form>
  <!-- end panel-body -->

  {{-- begin panel body --}}
  <div class="panel-body">
    <form>
    <div class="row">
      <div class="col-md-6">
          <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4"><strong>Departemen dan Bagian*</strong></label>
            <div class="col-md-8">
              <select class="form-control">
                
                @foreach ($data as $item)
                <optgroup label="{{ $item->name }}">
                  @foreach ($item->bagian as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </optgroup>
                
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4"><strong>Pilih Lokasi Baru*</strong></label>
            <div class="col-md-8">
              <select class="form-control">
                  @foreach ($lokasi as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-lg-4 col-form-label"><strong>Tgl. Penempatan*</strong></label>
          <div class="col-lg-8">
            <div class="input-group date" id="datetimepicker1">
              <input type="text" class="form-control" />
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            </div>
          </div>
        </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle"></i> Simpan</button>
          <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> Reset</button>

      </div>
    </div>
  </form>
  </div>
  
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

<script src="/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets/plugins/moment/moment.js"></script>
<script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
<script src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/assets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js"></script>
<script src="/assets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/assets/plugins/tag-it/js/tag-it.min.js"></script>
<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js"></script>
<script src="/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
<script src="/assets/plugins/clipboard/dist/clipboard.min.js"></script>
<script src="/assets/js/demo/form-plugins.demo.js"></script>
@endpush