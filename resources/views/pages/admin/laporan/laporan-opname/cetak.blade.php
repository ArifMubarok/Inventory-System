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
        <div class="row text-center">
            <h4>@yield('title')</h4>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col">
                @include('pages.admin.laporan.laporan-opname.table')
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