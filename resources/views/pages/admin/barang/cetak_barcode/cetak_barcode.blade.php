@extends('layouts.bootstrap')
@section('title', 'Cetak Barcode')

@section('content')

{{-- begin container --}}
<div class="container">
    {{-- begin row --}}
    <div class="row justify-content-center">
        <div class="col">
            <table>
                <tbody>
                    <tr>
                        <td><img src="{{ asset('logo_hotel.png') }}" alt="" width="70%"></td>
                        <td><font size="2">
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
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{ asset('barcode.png') }}" alt=""> <br>
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
    {{-- end row --}}
</div>
{{-- end container --}}


<script type="text/javascript">
    window.print();
</script>

@endsection