<!-- begin row -->
<div class="row">
    <!-- begin col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-blue">
        <div class="stats-icon"><i class="fa fa-cube"></i></div>
        <div class="stats-info">
          <h4>MASTER BARANG</h4>
          <p>{{ $master }}</p>	
        </div>
        {{-- <div class="stats-link">
          <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div> --}}
      </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-info">
        <div class="stats-icon"><i class="fa fa-check-circle"></i></div>
        <div class="stats-info">
          <h4>BARANG AKTIF</h4>
          <p>{{ $aktif }}</p>	
        </div>
        {{-- <div class="stats-link">
          <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div> --}}
      </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-orange">
        <div class="stats-icon"><i class="fa fa-ban"></i></div>
        <div class="stats-info">
          <h4>BARANG NON-AKTIF</h4>
          <p>{{ $nonaktif }}</p>	
        </div>
        {{-- <div class="stats-link">
          <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div> --}}
      </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-red">
        <div class="stats-icon"><i class="fa fa-cubes"></i></div>
        <div class="stats-info">
          <h4>TOTAL BARANG</h4>
          <p>{{ $totbar->count() }}</p>	
        </div>
        {{-- <div class="stats-link">
          <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div> --}}
      </div>
    </div>
    <!-- end col-3 -->
  </div>
  <!-- end row -->