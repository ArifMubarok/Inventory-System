<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Barcode</th>
            <th>Barang</th>
            <th>Tanggal Opname</th>
            <th>Merk</th>
            <th>Departemen</th>
            <th>Bagian</th>
            <th>Lokasi</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dataopname)
        <tr>
            <td class="col-0">{{ $loop->iteration }}</td>
            <td class="col-2">{{ $dataopname->barang->penempatan->barcode }}</td>
            <td class="col-4">{{ $dataopname->barang->penempatan->pengadaan->databarang->name }}</td>
            <td class="col-2">{{ $dataopname->tanggal_opname }}</td>
            <td class="col-1">{{ $dataopname->barang->penempatan->pengadaan->databarang->merk->nama_merk }}</td>
            <td class="col-2">{{ $dataopname->barang->penempatan->bagian->departemen->name }}</td>
            <td class="col-1">{{ $dataopname->barang->penempatan->bagian->name }}</td>
            <td class="col-1">{{ $dataopname->barang->penempatan->lokasi->name }}</td>
            <td class="col-1">{{ $dataopname->barang->penempatan->kondisi }}</td>
            <td class="col-1">{{ $dataopname->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>