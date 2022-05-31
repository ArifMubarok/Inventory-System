@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])
@section('title', 'Dashboard')

@push('css')
<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<link href="/assets/plugins/morris.js/morris.css" rel="stylesheet" />
@endpush


@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
  <li class="breadcrumb-item active">Dashboard v3</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header mb-3">Selamat Datang</h1>
<!-- end page-header -->
<!-- begin daterange-filter -->
<div class="d-sm-flex align-items-center mb-3">
  <a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange-filter">
    <i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i>
    <span>1 Jun 2020 - 7 Jun 2020</span>
    <b class="caret"></b>
  </a>
  <div class="text-muted f-w-600 mt-2 mt-sm-0">compared to <span id="daterange-prev-date">24 Mar-30 Apr 2020</span></div>
</div>
<!-- end daterange-filter -->

<!-- begin row -->
<div class="row">
  <!-- begin col-3 -->
  <div class="col-xl-3 col-md-6">
    <div class="widget widget-stats bg-blue">
      <div class="stats-icon"><i class="fa fa-cube"></i></div>
      <div class="stats-info">
        <h4>MASTER BARANG</h4>
        <p>0</p>	
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->
  <!-- begin col-3 -->
  <div class="col-xl-3 col-md-6">
    <div class="widget widget-stats bg-info">
      <div class="stats-icon"><i class="fa fa-check-circle"></i></div>
      <div class="stats-info">
        <h4>BARANG AKTIF</h4>
        <p>0</p>	
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->
  <!-- begin col-3 -->
  <div class="col-xl-3 col-md-6">
    <div class="widget widget-stats bg-orange">
      <div class="stats-icon"><i class="fa fa-ban"></i></div>
      <div class="stats-info">
        <h4>BARANG NON-AKTIF</h4>
        <p>0</p>	
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->
  <!-- begin col-3 -->
  <div class="col-xl-3 col-md-6">
    <div class="widget widget-stats bg-red">
      <div class="stats-icon"><i class="fa fa-cubes"></i></div>
      <div class="stats-info">
        <h4>TOTAL BARANG</h4>
        <p>0</p>	
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->
</div>
<!-- end row -->

<!-- begin row -->
<div class="row">
  <!-- begin col-6 -->
  <div class="col-xl-6">
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="morris-chart-4">
      <div class="panel-heading">
        <h4 class="panel-title">Morris Donut Chart</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="panel-body">
        <h4 class="text-center">Donut flavours</h4>
        <div id="morris-donut-chart" class="height-sm"></div>
      </div>
    </div>
    <!-- end panel -->
  </div>
  <!-- end col-6 -->

  <!-- begin col-6 -->
  <div class="col-xl-6">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title">Bar Chart</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="panel-body">
        <div id="nv-bar-chart" class="height-sm"></div>
      </div>
    </div>
    <!-- end panel -->
    
  </div>
  <!-- end col-6 -->
</div>
<!-- end row -->
@endsection


@push('scripts')
<script src="/assets/plugins/d3/d3.min.js"></script>
<script src="/assets/plugins/nvd3/build/nv.d3.js"></script>
<script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
<script src="/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="/assets/plugins/moment/moment.js"></script>
<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/demo/dashboard-v3.js"></script>

{{-- chart --}}
<script src="/assets/js/demo/chart-d3.demo.js"></script>
<script src="/assets/plugins/raphael/raphael.min.js"></script>
<script src="/assets/plugins/morris.js/morris.min.js"></script>
<script src="/assets/js/demo/chart-morris.demo.js"></script>
@endpush