@extends('layouts.bootstrap')
@section('title', 'Cetak Barcode')

@section('content')

{{-- begin container --}}
<div class="container">
    {{-- begin row --}}
    <div class="row justify-content-center">
        {{-- begin col --}}
        <div class="col">
            <table width="780" align="center" cellpadding="0" cellspacing="0" class="" border="0">
                <tbody>
                    <tr>
                        <td width="150" align="center" valign="bottom">
                            <img src="{{ asset('logo_hotel.png') }}" alt="" width="70%">
                        </td>
                        <td width="" align="left">
                            <font size="+2"><strong>Adhiwangsa Hotel &amp; Convention</strong></font><br>
                            Jl. Adi Sucipto No.146, Jajar, Laweyan, Surakarta 57144 Telp. +62271 7464999 <br>
                            Email : reservation@adhiwangsasolo.com Website : http://www.adhiwangsasolo.com
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- end-col --}}
    </div>
    {{-- end row --}}
    <hr>
    
    <div class="row">
        <div class="col">
            <table align="center">
                <tbody>
                    <tr>
                        <td align="center">
                            @foreach ($barcode as $items)
                                {{ $items->penempatan->pengadaan->databarang->name}}<br>
                                @endforeach

                                <img src="{{ asset('barcode.png') }}" alt=""><br>

                                @foreach ($barcode as $item)      
                                {{ $item->penempatan->barcode }}
                                @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
{{-- end container --}}
<script language="javascript">
    function printWindow() {
        bV = parseInt(navigator.appVersion);
        if (bV >= 4) window.print();
    }
    printWindow();
</script>

{{-- <script type="text/javascript">
    window.print();
</script> --}}

@endsection