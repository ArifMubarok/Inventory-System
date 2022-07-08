<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Merk</th>
            <th>Departemen</th>
            <th>Bagian</th>
            <th>Lokasi</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $datanonaktif)
        <tr>
            <td class="col-0">{{ $loop->iteration }}</td>
            <td class="col-0">{{ $datanonaktif->penempatan->pengadaan->databarang->name }}</td>
            <td class="col-0">{{ $datanonaktif->penempatan->pengadaan->databarang->merk->nama_merk }}</td>
            <td class="col-0">{{ $datanonaktif->penempatan->bagian->departemen->name }}</td>
            <td class="col-0">{{ $datanonaktif->penempatan->bagian->name }}</td>
            <td class="col-0">{{ $datanonaktif->penempatan->lokasi->name }}</td>
            <td class="col-0">{{ $datanonaktif->penempatan->kondisi }}</td>
            <td class="col-0">{{ $datanonaktif->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>