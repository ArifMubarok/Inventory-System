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
                action="/data-merk">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_merk">Merk</label>
                        <input type="text" class="form-control" id="nama_merk" name="nama_merk"
                            placeholder="Nama Merk" value="" require autofocus>
                            @error('nama_merk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/data-merk" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
</section>
<!-- /.content -->

@endsection