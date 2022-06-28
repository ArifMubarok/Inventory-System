@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', 'Restore Database')

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
    <div class="panel-body">
			<div id="data-table-default_wrapper" class="dataTables_wrapper no-footer"></div>
      <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline" aria-describedby="data-table-default_info">
				<thead>
					<tr>
            <th class="col-0">No</th>
            <th class="col-8">File</th>
            <td class="col-5">Action</td>
          </tr>
				</thead>
				<tbody>
          @foreach ($backup as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item }}</td>
            <td>
              <form action="{{ route('admin.utilitas.restore-database.restore', $item) }}" method="post">
                @csrf
                <input type="hidden" name="name" value="{{ $item }}">
                <button type="submit" class="btn btn-warning">Restore</button>
              </form>
              <form action="{{ route('admin.utilitas.restore-database.delete', $item) }}" method="POST">
                @csrf
                <input type="hidden" name="name" value="{{ $item }}">
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
      </tbody>
			</table>
		</div>

  </div>
  <!-- end panel-body -->
</div>
<!-- end panel -->
@endsection

@push('scripts')

<script src="{{ asset('assets/js/custom/delete-with-confirmation.js') }}"></script>
<script>
  $(document).on('delete-with-confirmation.success', function() {
    $('.buttons-reload').trigger('click')
  })
</script>
@endpush