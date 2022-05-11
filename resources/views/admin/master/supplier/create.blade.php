@extends('layouts.main')

@section('halaman')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="needs-validation" novalidate method="POST" 
                action="/supplier">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_supplier">Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                            placeholder="Nama Supplier" value="" require autofocus>
                            @error('nama_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Alamat" value="" require autofocus>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota"
                            placeholder="Kota" value="" require autofocus>
                            @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon"
                            placeholder="Telepon" value="" require autofocus>
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <label for="fax">Faximile</label>
                        <input type="text" class="form-control" id="fax" name="fax"
                            placeholder="Faximile" value="" require autofocus>
                            @error('fax')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Email" value="" require autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <label for="cp">Kontak Person</label>
                        <input type="text" class="form-control" id="cp" name="cp"
                            placeholder="Kontak Person" value="" require autofocus>
                            @error('cp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            placeholder="Kontak Person" value="" require autofocus>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                    <a href="/supplier" class="btn btn-secondary mr-2">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
        </div>
</section>
<!-- /.content -->

@endsection