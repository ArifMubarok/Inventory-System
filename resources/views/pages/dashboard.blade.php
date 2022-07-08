@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])
@section('title', 'Dashboard')

@push('css')
<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

{{-- chart --}}
<link href="/assets/plugins/morris.js/morris.css" rel="stylesheet" />

{{-- table --}}
<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />

@endpush

@section('content')

{{-- @dd(auth()->user()) --}}

@include('includes.isi_dashboard.header')

@include('includes.isi_dashboard.kotak')


{{-- begin row --}}
<div class="row">

  {{-- begin col --}}
  <div class="col-xl-6">
    @include('includes.isi_dashboard.riwayat_laporan_2')
  </div>
  {{-- end col --}}
</div>
{{-- end row --}}

@endsection

@push('scripts')

<!-- datatables -->
<script src="{{ asset('assets/js/custom/datatable-assets.js') }}"></script>
{{ $dataTable->scripts() }}
<!-- end datatables -->

{{-- chart --}}
{{-- <script src="/assets/js/demo/chart-d3.demo.js"></script>
<script src="/assets/plugins/raphael/raphael.min.js"></script>
<script src="/assets/plugins/morris.js/morris.min.js"></script>
<script src="/assets/js/demo/chart-morris.demo.js"></script> --}}


@endpush