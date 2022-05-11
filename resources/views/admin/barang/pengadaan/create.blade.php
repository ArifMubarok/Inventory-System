@extends('layouts.main')

@section('halaman')
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Pengadaan Barang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/pengadaan-barang">
                @csrf
              <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="disabledSelect" class="form-label">Barang*</label>
                        <br>
                          <select id="databarang" class="form-control @error('databarang_id') is-invalid @enderror" name="databarang_id">
                            <option selected>Pilih Barang</option>
                            @foreach ($databarangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                          </select>
                            @error('databarang_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="disabledSelect" class="form-label">Supplier*</label>
                        <br>
                          <select id="supplier" class="form-control @error('supplier_id') is-invalid @enderror" name="supplier_id">
                            <option selected>Pilih Barang</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                            @endforeach
                          </select>
                            @error('supplier_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="jumlah">Jumlah Barang*</label>
                  <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah Barang" require autofocus value="{{ old('jumlah') }}">
                  @error('jumlah')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="harga">Harga Barang*</label>
                  <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga Barang" require autofocus value="{{ old('harga') }}">
                  @error('harga')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="disabledSelect" class="form-label">Kondisi*</label>
                        <br>
                          <select id="kondisi" class="form-control @error('kondisi') is-invalid @enderror" name="kondisi">
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                            <option value="sedang">Sedang</option>
                          </select>
                            @error('kondisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                  </div>
                  <br>
                <div class="form-group">
                  <label for="tanggal_pengadaan">Tanggal Pengadaan*</label>
                  <input type="date" name="tanggal_pengadaan" id="tanggal_pengadaan" class="form-control @error('tanggal_pengadaan') is-invalid @enderror" placeholder="Tanggal Pengadaan" require autofocus value="{{ old('tanggal_pengadaan') }}">
                  @error('tanggal_pengadaan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="depresiasi">Depresiasi</label>
                  <input type="number" name="depresiasi" id="depresiasi" class="form-control @error('depresiasi') is-invalid @enderror" placeholder="depresiasi" autofocus value="{{ old('depresiasi') }}">
                  @error('depresiasi')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="lama_depresiasi">Lama Depresiasi</label>
                  <input type="number" name="lama_depresiasi" id="lama_depresiasi" class="form-control @error('lama_depresiasi') is-invalid @enderror" placeholder="lama_depresiasi" autofocus value="{{ old('lama_depresiasi') }}">
                  @error('lama_depresiasi')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="keterangan" autofocus value="{{ old('keterangan') }}"></textarea>
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
                <a href="/pengadaan-barang" class="btn btn-secondary">Back</a>
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