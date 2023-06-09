@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Proses Opname' )


@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item"><a href="javascript:;">Barang</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">@yield('title')</h1>
<!-- end page-header -->

<!-- begin panel -->
  {{-- @if(isset($data))
  {{ method_field('PUT') }}
  @endif --}}
  {{-- {{ $dataTable->table() }} --}}

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
      <form action="{{ route('admin.barang.proses-opname.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
        @csrf
      <div class="panel-body">
        {{ $dataTable->table() }}
      </div>
      <hr>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group row m-b-15">
                  <label class="col-form-label col-md-4"><strong>Kondisi*</strong></label>
                  <div class="col-md-8">
                    <select class="select2 form-control" name="kondisi">
                      <option value="baik">Baik</option>
                      <option value="sedang">Sedang</option>
                      <option value="rusak">Rusak</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row m-b-15">
                  <label class="col-form-label col-md-4"><strong>Tgl. Opname*</strong></label>
                  <div class="col-md-8">
                    <input id="tanggal_op" name="tanggal_opname" type="date" name="tanggal_opname" class="form-control" placeholder="Tanggal Opname" />
                  </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-lg-4 col-form-label"><strong>Keterangan*</strong></label>
                <div class="col-lg-8">
                  <textarea id="keterangan" name="keterangan" type="text-area" class="form-control" placeholder="Keterangan"></textarea>
                </div>
              </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle"></i> Opname</button>
                <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> Reset</button>
            </div>
          </div>
        </div>
      </form>
      <hr>

      <a href="javascript:history.back(-1);" class="btn btn-success">
        <i class="fa fa-arrow-circle-left"></i> Kembali
      </a>      

</div>
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