@extends('layouts.main')

@section('halaman')
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Supplier</h3>
    <a href="supplier/create" class="btn btn-sm btn-info float-right">Tambah Data</a>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
          @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Supplier</th>
                <th>Alamat</th>
                <th style="width: 130px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                  
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $supplier->nama_supplier }}</td>
                <td>{{ $supplier->alamat }}</td>
                <td>
                    <a href="/supplier/{{ $supplier->id }}/edit" class="badge badge-pill badge-warning"><i class="fas fa-edit"></i></a>
                    <form action="/supplier/{{ $supplier->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge badge-pill bg-danger border-0 ml-2" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"><i class="far fa-trash-alt"></i></span></button>
                      </form>
                </td>
              </tr>

              @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
        </div>
    </div>
    <!-- /.card -->
@endsection