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
                action="/satuan-barang">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_satuan">Satuan</label>
                        <input type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                            placeholder="satuan" value="">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button class="btn btn-secondary" onclick="goBack()">Back</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
</section>
<!-- /.content -->

@endsection