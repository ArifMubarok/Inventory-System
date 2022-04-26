@extends('layouts.main')

@section('halaman')
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Lokasi</h3>
        <a href="lokasi/create" class="btn btn-sm btn-info float-right">Tambah Data</a>
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
                <th style="width: 10px">No</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th style="width: 130px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($lokasis as $lokasi)
                  
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lokasi->nama_lokasi }}</td>
                <td>@if  ($lokasi->status == 1)
                    Aktif
                @else
                    Non Aktif
                @endif </td>
                <td>
                    <a href="/lokasi/{{ $lokasi->id }}/edit" class="badge badge-pill badge-warning">Edit</a>
                    <form action="/lokasi/{{ $lokasi->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge badge-pill bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle">Hapus</span></button>
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
