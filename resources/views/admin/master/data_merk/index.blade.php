@extends('layouts.main')

@section('halaman')
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Data Merk</h3>
        <a href="data-merk/create" class="btn btn-sm btn-info float-right">Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success p-2" role="alert">
            {{ session('success') }}
            </div>
            @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Merk</th>
                <th style="width: 130px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($dataMerks as $dataMerk)
                  
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dataMerk->nama_merk }}</td>
                <td>
                    <a href="/data-merk/{{ $dataMerk->id }}/edit" class="badge badge-pill badge-warning"><i class="fas fa-edit"></i></a>
                    <form action="/data-merk/{{ $dataMerk->id }}" method="POST" class="d-inline">
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