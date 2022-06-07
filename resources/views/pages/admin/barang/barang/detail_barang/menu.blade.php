@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Unlimited Nav Tabs')

@push('css')
<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

{{-- table --}}
<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />

@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">UI Elements</a></li>
		<li class="breadcrumb-item active">Unlimited Nav Tabs</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Unlimited Nav Tabs <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<!-- begin col -->
		<div class="col">
			<!-- begin panel -->
			<div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">
				<!-- begin panel-heading -->
				<div class="panel-heading p-0">
					<!-- begin nav-tabs -->
					<div class="tab-overflow">
						<ul class="nav nav-tabs">
							<li class="nav-item"><a href="#nav-tab2-1" data-toggle="tab" class="nav-link  active">Data Barang</a></li>
							<li class="nav-item"><a href="#nav-tab2-2" data-toggle="tab" class="nav-link">Data Pengadaan</a></li>
							<li class="nav-item"><a href="#nav-tab2-3" data-toggle="tab" class="nav-link">Riwayat Penempatan</a></li>
							<li class="nav-item"><a href="#nav-tab2-4" data-toggle="tab" class="nav-link">Riwayat Laporan</a></li>
						</ul>
					</div>
					<!-- end nav-tabs -->
				</div>
				<!-- end panel-heading -->
				<!-- begin tab-content -->
				<div class="panel-body tab-content">
					<!-- begin tab-pane -->
					<div class="tab-pane fade  active show" id="nav-tab2-1">
						@include('pages.admin.barang.barang.detail_barang.isi_menu.data_barang')
					</div>
					<!-- end tab-pane -->
					<!-- begin tab-pane -->
					<div class="tab-pane fade" id="nav-tab2-2">
						@include('pages.admin.barang.barang.detail_barang.isi_menu.data_pengadaan')
					</div>
					<!-- end tab-pane -->
					<!-- begin tab-pane -->
					<div class="tab-pane fade" id="nav-tab2-3">
						@include('pages.admin.barang.barang.detail_barang.isi_menu.riwayat_penempatan')
					</div>
					<!-- end tab-pane -->
					<!-- begin tab-pane -->
					<div class="tab-pane fade" id="nav-tab2-4">
						@include('pages.admin.barang.barang.detail_barang.isi_menu.riwayat_laporan')
					</div>
					<!-- end tab-pane -->
				</div>
				<!-- end tab-content -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-9 -->
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

{{-- table --}}
<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/js/demo/table-manage-default.demo.js"></script>

@endpush