@extends('layouts.main')

@section('halaman')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Satuan</th>
                <th style="width: 40px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($satuanBarangs as $satuanBarang)
                  
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $satuanBarang->nama_satuan }}</td>
                <td>
                    <a href="#" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="#" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
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