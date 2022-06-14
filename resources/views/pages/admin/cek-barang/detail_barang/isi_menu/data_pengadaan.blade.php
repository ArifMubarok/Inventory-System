<div class="row">
    <div class="col-md-12">
        <div class="form-group row m-b-15">
            <h3>Data Pengadaan</h3>
        </div>
    </div>
</div>
    

{{-- begin row --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Tanggal Pengadaan</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->tanggal_pengadaan }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Harga Barang</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->harga }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Depresiasi</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->depresiasi }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Lama Depresiasi (Bln)</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->lama_depresiasi }}" readonly />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Supplier</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->supplier->nama_supplier }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Alamat</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->supplier->alamat }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Kota</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->supplier->kota }}" readonly />
            </div>
        </div>
        <div class="form-group row m-b-15">
            <label class="col-form-label col-md-4 offset-md-1">Telepon</label>
            <div class="col-md-7">
                <input type="text" class="form-control m-b-5" value="{{ $item->pengadaan->supplier->cp }}" readonly />
            </div>
        </div>
    </div>
</div>
{{-- end row --}}
