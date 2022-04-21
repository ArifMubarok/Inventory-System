@extends('layouts.main')

@section('halaman')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Data Barang</h3>
        <a href="data-barang/create" class="btn btn-sm btn-info float-right">Tambah Data</a>
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
                <th class="col-0"">No</th>
                <th class="col-2">Barang</th>
                <th class="col-2">Barcode</th>
                <th class="col-2">Satuan</th>
                <th class="col-2">Merk</th>
                <th class="col-2">Kategori</th>
                <th class="col-2">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($dataBarangs as $dataBarang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataBarang->nama_barang }}</td>
                        <td>{{ $dataBarang->barcode }}</td>
                        <td>{{ $dataBarang->nama_satuan }}</td>
                        <td>{{ $dataBarang->nama_merk }}</td>
                        <td>{{ $dataBarang->nama_kategori }}</td>
                        <td>
                            <a href="/data-barang/{{ $dataBarang->id }}/edit" class="btn btn-warning mr-2">Edit</a>
                            <a href="/data-barang/{{ $dataBarang->id }}" class="btn btn-danger">Hapus</a>
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