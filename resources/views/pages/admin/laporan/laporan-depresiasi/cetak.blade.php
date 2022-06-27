@extends('layouts.bootstrap')
@section('title', 'Laporan Depresiasi')

@section('content')

{{-- begin container --}}
<div class="container">
    {{-- begin row --}}
    <div class="row justify-content-center">
        <div class="col">
            <table>
                <tbody>
                    <tr>
                        <td class="align-right"><img src="{{ asset('logo_hotel.png') }}" alt="" width="200px"></td>
                        <td class="col-6"><font size="2">
                            <font size="5"><strong>Adhiwangsa Hotel & Convention</strong></font> <br>
                            Jl. Adi Sucipto No.146, Jajar, Laweyan, Surakarta 57144 Telp. +62271 7464999 <br>
                            Email : reservation@adhiwangsasolo.com Website : http://www.adhiwangsasolo.com
                        </font></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr style="display: block; color:black">
        <div class="row">
            <div class="col">
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
            </div>
        </div>
        {{-- begin tanda tangan --}}
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                Surakarta, {{ date('j F Y') }}
                <br>
                <br>
                <br>
                <br>
                <br>
                Administrator
            </div>
        </div>
        {{-- end tanda tangan --}}
    </div>
    {{-- end row --}}
</div>
{{-- end container --}}


<script type="text/javascript">
    window.print();
</script>

@endsection