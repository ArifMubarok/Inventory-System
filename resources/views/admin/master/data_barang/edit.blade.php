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
                action="/data-barang/{{ $dataBarang->id }}">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barang">Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            placeholder="Nama Barang" require autofocus value="{{ $dataBarang->nama_barang }}">
                        <span class="text-danger"> @error('nama_barang') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" class="form-control" id="barcode" name="barcode"
                            placeholder="Barcode" require value="{{ $dataBarang->barcode }}">
                            <span class="text-danger"> @error('barcode') {{ $message }} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="satuan-barang">Satuan Barang</label>
                        <select class="form-control" id="satuan_barang" name="id_satuan" require>
                            @foreach ($satuanBarang as $satuan)
                            <option value="{{ $satuan->id }}" {{ ($satuan->id = $dataBarang->id_satuan) ? 'selected' : '' }}>{{ $satuan->nama_satuan }}</option>
                            @endforeach
                          </select>
                            <span class="text-danger"> @error('satuan_barang') {{ $message }} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="data-merk">Data Merk</label>
                        <select class="form-control" id="data_merk" name="id_merk" require>
                            @foreach ($dataMerk as $merk)
                            <option value="{{ $merk->id }}" {{ ($merk->id = $dataBarang->id_merk) ? 'selected' : '' }}>{{ $merk->nama_merk }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger"> @error('data_merk') {{ $message }} @enderror</span>
                            
                    </div>
                    <div class="form-group">
                        <label for="kategori-barang">Kategori Barang</label>
                        <select class="form-control" id="kategori_barang" name="id_kategori" require>
                            @foreach ($kategoriBarang as $kategori)
                            <option value="{{ $kategori->id_kategori }}" {{ ($kategori->id_kategori = $dataBarang->id_kategori) ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger"> @error('kategori_barang') {{ $message }} @enderror</span>
                            
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            placeholder="Keterangan" require  value="{{ $dataBarang->keterangan }}">
                            <span class="text-danger"> @error('keterangan') {{ $message }} @enderror</span>
                            
                    </div>
                    <div class="mb-3">
                        <label for="foto">Foto</label>
                        <input class="form-control" type="file" id="foto" name="foto">
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/data-barang" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
</section>
<!-- /.content -->

@endsection