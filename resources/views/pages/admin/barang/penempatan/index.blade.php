@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Penempatan Barang')

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
    <h4 class="panel-title">DataTable - @yield('title')</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
    </div>
  </div>
  <!-- end panel-heading -->
  <!-- begin panel-body -->
  <form class="panel-body" action="{{ route('admin.barang.penempatan-barang.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
    @csrf
    {{ $dataTable->table() }}
  
    <!-- end panel-body -->

    {{-- begin panel body --}}
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6">
            <div class="form-group row m-b-15">
              <label class="col-form-label col-md-4"><strong>Departemen dan Bagian*</strong></label>
              <div class="col-md-8">
                <select id="bagian-sel" name="bagian_id" class="form-control">
                  
                  @foreach ($data as $item)
                  <optgroup label="{{ $item->name }}">
                    @foreach ($item->bagian as $items)
                    <option value="{{ $items->id }}">{{ $items->name }}</option>
                    @endforeach
                  </optgroup>
                  
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row m-b-15">
              <label class="col-form-label col-md-4"><strong>Pilih Lokasi Baru*</strong></label>
              <div class="col-md-8">
                <select id="lokasi_sel" name="lokasi_id" class="form-control">
                    @foreach ($lokasi as $itemss)
                    <option value="{{ $itemss->id }}">{{ $itemss->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-lg-4 col-form-label"><strong>Tgl. Penempatan*</strong></label>
            <div class="col-lg-8">
              <input id="tanggal_pen" name="tanggal_penempatan" type="text" name="tanggal_penempatan" class="form-control date-picker" placeholder="Tanggal Penempatan" />
            </div>
          </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle"></i> Simpan</button>
            <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> Reset</button>
        </div>
      </div>
    </div>
  </form>
  <!-- end panel -->
</div>
<!-- end panel -->
@endsection

@push('scripts')
<!-- datatables -->
<script src="{{ asset('assets/js/custom/datatable-assets.js') }}"></script>
{{ $dataTable->scripts() }}
<!-- end datatables -->

<script src="{{ asset('assets/js/custom/delete-with-confirmation.js') }}"></script>
<script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.js') }}"></script>
<script src="{{ asset('/assets/js/custom/datetime-picker.js') }}"></script>
<script>
  $(document).on('delete-with-confirmation.success', function() {
    $('.buttons-reload').trigger('click')
  })
</script>
@endpush
