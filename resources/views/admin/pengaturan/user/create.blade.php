@extends('layouts.main')

@section('halaman')
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/data-user">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="username">Nama*</label>
                  <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Nama" require autofocus value="{{ old('username') }}">
                  @error('username')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password*</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" require autofocus value="{{ old('password') }}">
                  @error('password')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password2">Ulangi Password*</label>
                  <input type="password" name="password2" id="password2" class="form-control @error('password2') is-invalid @enderror" placeholder="Ulangi Password" require autofocus value="">
                  @error('password2')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="row g-3">
                  <div class="col-sm-12">
                      <label for="disabledSelect" class="form-label">Role*</label>
                      <br>
                        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
                          <option selected>Pilih Role</option>
                          <option value="admin">Admin</option>
                          <option value="sarpras">Sarpras</option>
                          <option value="user">User</option>
                        </select>
                          @error('role')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                  </div>
                </div>
                <br>
                <div class="row g-3">
                  <div class="col-sm-12">
                      <label for="disabledSelect" class="form-label">Departemen*</label>
                      <br>
                        <select id="departemen" class="form-control @error('departemen_id') is-invalid @enderror" name="departemen_id">
                          <option selected>Pilih Departemen</option>
                          @foreach ($departemens as $departemen)
                          <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}</option>
                          @endforeach
                        </select>
                          @error('departemen_id')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" require value="{{ old('email') }}">
                  @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nomor_hp">No. Hp</label>
                  <input type="text" name="nomor_hp" id="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" placeholder="No. Hp" require value="{{ old('nomor_hp') }}">
                  @error('nomor_hp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="row g-3">
                  <div class="col-sm-12">
                      <label for="disabledSelect" class="form-label">Status*</label>
                      <br>
                        <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                          <option selected>Pilih Status</option>
                          <option value="0">Aktif</option>
                          <option value="1">Non-Aktif</option>
                        </select>
                          @error('status')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                  </div>
                </div>
                <br>
                
                <div class="form-group mb-0">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="/data-user" class="btn btn-secondary">Back</a>
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