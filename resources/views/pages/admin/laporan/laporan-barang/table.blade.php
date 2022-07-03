<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Barcode</th>
            <th>Barang</th>
            <th>Merk</th>
            <th>Departemen</th>
            <th>Bagian</th>
            <th>Lokasi</th>
            <th>Kondisi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $databarang)
        <tr>
            <td class="col-0">{{ $loop->iteration }}</td>
            <td class="col-2">{{ $databarang->penempatan->barcode }}</td>
            <td class="col-4">{{ $databarang->penempatan->pengadaan->databarang->name }}</td>
            <td class="col-1">{{ $databarang->penempatan->pengadaan->databarang->merk->nama_merk }}</td>
            <td class="col-2">{{ $databarang->penempatan->bagian->departemen->name }}</td>
            <td class="col-1">{{ $databarang->penempatan->bagian->name }}</td>
            <td class="col-1">{{ $databarang->penempatan->lokasi->name }}</td>
            <td class="col-1">{{ $databarang->penempatan->kondisi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>