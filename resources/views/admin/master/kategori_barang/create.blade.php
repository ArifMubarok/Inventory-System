@extends('layouts.main')

@section('halaman')
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/kategori-barang">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_kategori">Kategori</label>
                  <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Nama Kategori" require autofocus value="{{ old('kategori') }}">
                  @error('nama_kategori')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group mb-0">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection