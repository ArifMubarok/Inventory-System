@extends('layouts.main')

@section('halaman')


<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
    <div class="d-flex align-items-end flex-column">
        <a href="/kategori-barang/create" class="btn btn-primary mb-3">Tambah Kategori</a>
    </div>

    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Data Kategori</h3>
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
                <th style="width: 10px">No.</th>
                <th>Kategori</th>
                <th style="width: 10px">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)

            <tr>                    
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>
                    <a href="/kategori-barang/{{ $item->id_kategori }}/edit" class="badge bg-warning"><span data-feather="edit">Edit</span></a>
                    <form action="/kategori-barang/{{ $item->id_kategori }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle">Hapus</span></button>
                      </form>
                </td>
            </tr>
            
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <!-- /.card -->
@endsection