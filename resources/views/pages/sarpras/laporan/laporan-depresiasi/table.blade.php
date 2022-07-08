<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Departemen</th>
            <th>Bagian</th>
            <th>Lokasi</th>
            <th>Barcode</th>
            <th>Barang</th>
            <th>Tanggal Pengadaan</th>
            <th>Tanggal Depresiasi</th>
            <th>Depresiasi</th>
            <th>Harga Barang</th>
            <th>Lama Depresiasi (Bln)</th>
            <th>Nilai Barang</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $barang)
        <tr>
            <td class="col-0">{{ $loop->iteration }}</td>
            <td class="col-2">{{ $barang->penempatan->bagian->departemen->name }}</td>
            <td class="col-1">{{ $barang->penempatan->bagian->name }}</td>
            <td class="col-1">{{ $barang->penempatan->lokasi->name }}</td>
            <td class="col-1">{{ $barang->penempatan->barcode }}</td>
            <td class="col-2">{{ $barang->penempatan->pengadaan->databarang->name }}</td>
            <td class="col-1">{{ $barang->penempatan->pengadaan->tanggal_pengadaan }}</td>
            <td class="col-1">{{ $barang->tanggal_depresiasi }}</td>
            <td class="col-1">{{ $barang->penempatan->pengadaan->depresiasi }}</td>
            <td class="col-1">{{ $barang->penempatan->pengadaan->harga }}</td>
            <td class="col-1">{{ $barang->penempatan->pengadaan->lama_depresiasi }}</td>
            <td class="col-1">{{ $barang->nilai_barang }}</td>
        </tr>
        @endforeach
    </tbody>
</table>