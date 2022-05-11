@extends('layouts.main')

@section('halaman')
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Supplier</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/supplier/{{ $supplier->id }}">
              @method('put')
              @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="nama_supplier">Supplier</label>
                  <input type="text" id="nama_supplier" name="nama_supplier" class="form-control 
                  @error('nama_supplier') is-invalid @enderror" placeholder="Nama Supplier" 
                  require autofocus value="{{ old('nama_supplier', $supplier->nama_supplier) }}">
                    @error('nama_supplier')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control 
                  @error('alamat') is-invalid @enderror" placeholder="Alamat" 
                  require autofocus value="{{ old('alamat', $supplier->alamat) }}">
                    @error('alamat')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <label for="kota">Kota</label>
                  <input type="text" id="kota" name="kota" class="form-control 
                  @error('kota') is-invalid @enderror" placeholder="Kota" 
                  require autofocus value="{{ old('kota', $supplier->kota) }}">
                    @error('kota')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <label for="telepon">Telepon</label>
                  <input type="text" id="telepon" name="telepon" class="form-control 
                  @error('telepon') is-invalid @enderror" placeholder="Telepon" 
                  require autofocus value="{{ old('telepon', $supplier->telepon) }}">
                    @error('telepon')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <label for="fax">Faximile</label>
                  <input type="text" id="fax" name="fax" class="form-control 
                  @error('fax') is-invalid @enderror" placeholder="Faximile" 
                  require autofocus value="{{ old('fax', $supplier->fax) }}">
                    @error('fax')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <label for="email">Email</label>
                  <input type="text" id="email" name="email" class="form-control 
                  @error('email') is-invalid @enderror" placeholder="Email" 
                  require autofocus value="{{ old('email', $supplier->email) }}">
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <label for="cp">Kontak Person</label>
                  <input type="text" id="cp" name="cp" class="form-control 
                  @error('cp') is-invalid @enderror" placeholder="Kontak Person" 
                  require autofocus value="{{ old('cp', $supplier->cp) }}">
                    @error('cp')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <label for="keterangan">Keterangan</label>
                  <input type="text" id="keterangan" name="keterangan" class="form-control 
                  @error('keterangan') is-invalid @enderror" placeholder="Keterangan" 
                  require autofocus value="{{ old('keterangan', $supplier->keterangan) }}">
                    @error('keterangan')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-0">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer d-flex justify-content-end">
                <a href="/supplier" class="btn btn-secondary mr-2">Back</a>
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