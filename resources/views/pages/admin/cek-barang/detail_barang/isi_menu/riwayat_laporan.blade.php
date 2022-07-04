@foreach ($riwayat_laporan as $rl)
@php
$cek = $rl->laporan
@endphp
@endforeach
@if (isset($cek))
<div class="row">
    <div class="col-md-12">
        <div class="form-group row m-b-15">
            <h3>Riwayat Laporan</h3>
            <div class="table-responsive panel-body m-4">
                <table class="table table-striped table-bordered m-b-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Laporan</th>
                            <th>Laporan</th>
                            <th>Status</th>
                            <th>Dilaporkan Oleh</th>
                            <th>Tgl Laporan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat_laporan as $r_laporan)
                            <tr>
                                {{-- @dump($r_laporan) --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r_laporan->judul_laporan }}</td>
                                <td>{{ $r_laporan->laporan }}</td>
                                <td>{{ $r_laporan->status }}</td>
                                <td>{{ $r_laporan->pelapor }}</td>
                                <td>{{ $r_laporan->created_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row m-b-15">
                <h3 class="pull-left">Riwayat Laporan</h3>
            </div>
        </div>
    </div>
    
    {{-- begin row --}}
    <div class="row">
        <div class="col">
            Belum ada data.
        </div>
    </div>
    {{-- end row --}}
    @endif
    
    
    