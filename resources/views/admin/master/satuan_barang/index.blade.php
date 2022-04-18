@extends('layouts.main')

@section('halaman')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Data Satuan Barang</h3>
        <a href="satuan-barang/create" class="btn btn-sm btn-info float-right">Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Satuan</th>
                <th style="width: 130px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($satuanBarangs as $satuanBarang)
                  
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $satuanBarang->nama_satuan }}</td>
                <td>
                    <a href="#" class="badge badge-pill badge-warning">Edit</a>
                    <form action="#" class="d-inline">
                      @method('delete')
                      @csrf
                      <a class="badge badge-pill badge-danger" onclick="return confirm('Are you sure?')">Hapus</a>
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