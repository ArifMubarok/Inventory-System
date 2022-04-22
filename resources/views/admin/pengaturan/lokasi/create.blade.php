@extends('layouts.main')

@section('halaman')
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Lokasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/lokasi">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_lokasi">Lokasi</label>
                  <input type="text" name="nama_lokasi" id="nama_lokasi" class="form-control @error('nama_lokasi') is-invalid @enderror" placeholder="Nama Lokasi" require autofocus value="">
                  @error('nama_lokasi')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="row g-3">
                  <div class="col-sm-12">
                      <label for="disabledSelect" class="form-label">Status</label>
                      <br>
                        <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                          <option selected>Pilih Status</option>
                          <option value="0">Non Aktif</option>
                          <option value="1">Aktif</option>
                        </select>
                          @error('status')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan" require value="">
                  @error('keterangan')
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
                <a href="/lokasi" class="btn btn-secondary">Back</a>
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