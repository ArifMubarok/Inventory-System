@foreach ($data_barang as $item)
{{-- begin row --}}
<div class="row">
    {{-- begin col-md-6 --}}
    <div class="col-md-6">
        <div class="form-group row m-b-15">
            <h3>Barang</h3>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Barcode</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->barcode }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Barang</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->pengadaan->databarang->name}}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Satuan</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->pengadaan->databarang->satuan->nama_satuan}}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Merk</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->pengadaan->databarang->merk->nama_merk}}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Kategori</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->pengadaan->databarang->kategori->name}}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Kondisi</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->pengadaan->kondisi }}" readonly />
            </div>
        </div>
    </div>
    {{-- end col-md-6 --}}

    <div class="col-md-5 offset-md-1">
        <div class="form-group row m-b-15">
            <h3>Gambar</h3>
        </div>
        <div class="form-group row m-b-15">
            <img src= "{{ $item->penempatan->pengadaan->databarang->image == 'img/no_image.png' ? asset('assets/' . $item->penempatan->pengadaan->databarang->image) : asset('storage/' . $item->penempatan->pengadaan->databarang->image) }}" width="260">
        </div>
    </div>
</div>
{{-- end row --}}

<div class="row">
    <div class="col-md-12">
        <div class="form-group row m-b-15">
            <h3>Penempatan</h3>
        </div>
    </div>
</div>

{{-- begin row --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Departemen</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->bagian->departemen->name }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Bagian</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->bagian->name }}" readonly />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Lokasi</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->lokasi->name }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Kondisi</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->penempatan->pengadaan->kondisi }}" readonly />
            </div>
        </div>
    </div>
</div>
{{-- end row --}}
@endforeach