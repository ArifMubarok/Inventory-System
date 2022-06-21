@extends('layouts.bootstrap')
@section('title', 'Laporan Barang')

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
                            <th>Barang</th>
                            <th>Supplier</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $datapengadaan)
                        <tr>
                            <td class="col-0">{{ $loop->iteration }}</td>
                            <td class="col-5">{{ $datapengadaan->databarang->name }}</td>
                            <td class="col-2">{{ $datapengadaan->supplier->nama_supplier }}</td>
                            <td class="col-1">{{ $datapengadaan->jumlah }}</td>
                            <td class="col-1">{{ $datapengadaan->harga }}</td>
                            <td class="col-2">{{ $datapengadaan->total_harga }}</td>
                            <td class="col-1">{{ $datapengadaan->kondisi }}</td>
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