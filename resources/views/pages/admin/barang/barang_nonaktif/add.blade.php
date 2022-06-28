@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Create Barang Non Aktif' )


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
      <form class="panel-body" action="" id="form" name="form" method="GET" data-parsley-validate="true">
        @csrf
          <input type="hidden" name="mode" value="filter">
          <input type="hidden" name="sub" value="filter">
                          
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-4"><strong>Departemen dan Bagian*</strong></label>
                    <div class="col-md-8">
                        <select id="bagian-sel" class="select2 form-control" name="bagian_id">

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
                    <label class="col-form-label col-md-4"><strong>Lokasi*</strong></label>
                    <div class="col-md-8">
                        <select id="bagian-sel" class="select2 form-control" name="lokasi_id">
                          @foreach ($lokasi as $itemss)
                            <option value="{{ $itemss->id }}">{{ $itemss->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3"><strong>Kategori*</strong></label>
                    <div class="col-md-8">
                        <select class="select2 form-control" name="kategori_id">
                          @foreach ($kategori as $ktg)
                            <option value="{{ $ktg->id }}">{{ $ktg->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3"><strong>Kondisi*</strong></label>
                    <div class="col-md-8">
                        <select class="select2 form-control" name="kondisi">
                          <option value="all">Semua</option>
                          <option value="baik">Baik</option>
                          <option value="sedang">Sedang</option>
                          <option value="rusak">Rusak</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-4">&nbsp;
                    </label>
                    <div class="col-md-8">
                      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle"></i> Filter</button>&nbsp;
                      <button type="button" class="btn btn-sm btn-warning" onClick="#"><i class="fa fa-undo"></i> Kosongkan</button>
                  </div>
                </div>
            </div>
        </div>
        </form>
        <hr>
      <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="mode" value="opname">
      </form>

      <form action="{{ route('admin.barang.barang-nonaktif.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
        @csrf
      <div class="panel-body">
        {{ $dataTable->table() }}
      </div>
      <hr>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group row m-b-15">
                  <label class="col-form-label col-md-4"><strong>Status Non Aktif*</strong></label>
                  <div class="col-md-8">
                    <select class="select2 form-control" name="kondisi">
                        <option value="rusak">Rusak</option>
                        <option value="diganti">Diganti</option>
                        <option value="hilang">Hilang</option>
                        <option value="lain-lain">Lain-lain</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row m-b-15">
                  <label class="col-form-label col-md-4"><strong>Keterangan*</strong></label>
                  <div class="col-md-8">
                    <textarea id="keterangan" name="keterangan" type="text-area" class="form-control" placeholder="Keterangan"></textarea>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle"></i> Non-Aktifkan</button>
                <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> Kosongkan</button>
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