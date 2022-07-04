<div class="row">
    <div class="col-md-12">
        <div class="form-group row m-b-15">
            <h3>Riwayat Penempatan</h3>
            <div class="table-responsive panel-body m-4">
                <table class="table table-striped table-bordered m-b-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Departemen</th>
                            <th>Bagian</th>
                            <th>Lokasi</th>
                            <th>Tanggal Penempatan</th>
                            <th>Tanggal Pemindahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat_penempatan as $r_penempatan)
                        <tr>
                            {{-- @dump($r_penempatan) --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r_penempatan->penempatan->bagian->departemen->name }}</td>
                            <td>{{ $r_penempatan->penempatan->bagian->name }}</td>
                            <td>{{ $r_penempatan->lokasi->name }}</td>
                            <td>{{ $r_penempatan->tanggal_penempatan }}</td>
                            <td>{{ $r_penempatan->tanggal_pemindahan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <form class="panel-body" action="{{ route('admin.barang.penempatan-barang.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
    @csrf
    {{ $dataTable->table() }}
</form> --}}


