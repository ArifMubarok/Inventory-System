@extends('layouts.main')

@section('halaman')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit <?=$judul?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="needs-validation" novalidate method="POST" 
                action="/bagian/{{ $bagians->id }}">
                @csrf
                @method('put')  
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="disabledSelect" class="form-label">Departemen</label>
                            <br>
                              <select id="departemen_id" class="form-control @error('departemen_id') is-invalid @enderror" name="departemen_id" autofocus>
                                @foreach ($departemens as $departemen)
                                    @if (old('departemen_id', $bagians->departemen_id) == $departemen->id)
                                        <option value="{{ $departemen->id }}" selected>{{ $departemen->nama_departemen }}</option>  
                                    @else
                                        <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}</option>  
                                    @endif
                                @endforeach
                              </select>
                                @error('departemen_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                      </div>
                      <br>
                    <div class="form-group">
                        <label for="nama_bagian">Nama Bagian</label>
                        <input type="text" class="form-control @error('nama_bagian') is-invalid @enderror" name="nama_bagian" placeholder="Nama bagian" require 
                        value="{{ old('nama_bagian', $bagians->nama_bagian) }}" id="nama_bagian" >
                            @error('nama_bagian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="disabledSelect" class="form-label">Status</label>
                            <br>
                              <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                <option selected>{{ old('status', ) }} 
                                    @if  ($bagians->status == 1)
                                        Aktif
                                    @else
                                        Non Aktif
                                    @endif
                                </option>
                                <option value="0">Non Aktif</option>
                                <option value="1">aktif</option>
                              </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan" 
                        require value="{{ old('keterangan', $bagians->keterangan) }}">
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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