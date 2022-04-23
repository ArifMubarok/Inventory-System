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
                action="/lokasi/{{ $lokasi->id }}">
                @csrf
                @method('put')  
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_lokasi">Lokasi</label>
                        <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" name="nama_lokasi" placeholder="Nama Lokasi" require autofocus 
                        value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}" id="nama_lokasi" >
                            @error('nama_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="disabledSelect" class="form-label">Status</label>
                            <br>
                              <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                <option selected>{{ old('status', ) }} 
                                    @if  ($lokasi->status == 1)
                                        Aktif
                                    @else
                                        Non Aktif
                                    @endif
                                </option>
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
                        <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan" 
                        require value="{{ old('keterangan', $lokasi->keterangan) }}">
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