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
                action="/data-merk/{{ $dataMerk->id }}">
                @csrf
                @method('put')  
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_merk">Merk</label>
                        <input type="text" class="form-control @error('nama_merk') is-invalid @enderror" placeholder="Nama Merk" require autofocus value="{{ old('nama_merk', $dataMerk->nama_merk) }}" id="nama_merk" name="nama_merk"
                            value="">
                            @error('nama_merk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
</section>
<!-- /.content -->

@endsection