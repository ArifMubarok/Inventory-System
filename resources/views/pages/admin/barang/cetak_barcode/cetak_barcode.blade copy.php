<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode - SIM Inventaris | msInventaris</title>
</head>
<body>
    {{-- begin container --}}
    <div class="container">
        {{-- begin row --}}
        <div class="row justify-content-md-center">
            <div class="col">
                <table>
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('logo_hotel.png') }}" alt="" width="70%"></td>
                            <td><font size="3">
                                <font size="5"><strong>Adhiwangsa Hotel & Convention</strong></font> <br>
                                Jl. Adi Sucipto No.146, Jajar, Laweyan, Surakarta 57144 Telp. +62271 7464999 <br>
                                Email : reservation@adhiwangsasolo.com Website : http://www.adhiwangsasolo.com
                            </font></td>
                        </tr>
                    </tbody>
                </table>
                
            
            </div>
            <hr style="display: block; color:black">
            <div class="col">
                <img src="{{ asset('barcode.png') }}" alt="">
                @foreach ($barcode as $item)      
                <p>{{ $item->penempatan->barcode }}</p>
                @endforeach
            </div>
        </div>
        {{-- end row --}}
    </div>
    {{-- end container --}}
    

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>