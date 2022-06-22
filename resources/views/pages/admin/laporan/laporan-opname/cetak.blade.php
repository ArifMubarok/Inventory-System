@extends('layouts.bootstrap')
@section('title', 'Laporan Opname')

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
                        <td class="col-6 text-center"><font size="2">
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
                            <td class="col-1">{{ $dataopname->barang->penempatan->pengadaan->kondisi }}</td>
                            <td class="col-1">{{ $dataopname->keterangan }}</td>
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