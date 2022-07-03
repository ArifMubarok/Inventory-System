<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Supplier</th>
            <th>Tanggal Pengadaan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $datapengadaan)
        <tr>
            <td class="col-0">{{ $loop->iteration }}</td>
            <td class="col-4">{{ $datapengadaan->databarang->name }}</td>
            <td class="col-3">{{ $datapengadaan->supplier->nama_supplier }}</td>
            <td class="col-2">{{ $datapengadaan->tanggal_pengadaan }}</td>
            <td class="col-1">{{ $datapengadaan->jumlah }}</td>
            <td class="col-1">{{ $datapengadaan->harga }}</td>
            <td class="col-2">{{ $datapengadaan->total_harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>