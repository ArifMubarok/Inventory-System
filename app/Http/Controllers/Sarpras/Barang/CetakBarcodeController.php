<?php

namespace App\Http\Controllers\Sarpras\Barang;

use App\Models\Barang;
use LaravelQRCode\Facades\QRCode;
use App\Http\Controllers\Controller;
use App\DataTables\Sarpras\Barang\CetakBarcodeDataTable;

class CetakBarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CetakBarcodeDataTable $datatable)
    {
        return $datatable->render('pages.sarpras.barang.cetak_barcode.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $file = public_path('barcode.png');
        $barcode = Barang::where('id', '=', $id)->get();
        foreach ($barcode as $data_barang) {
            $barcode_gen = $data_barang->penempatan->barcode;
        }
        $barcode_generate = QRCode::text($barcode_gen)->setOutfile($file)->setSize(7)->png();
        return view('pages.sarpras.barang.cetak_barcode.cetak_barcode', [
            'barcode' => $barcode,
            'barcode_generate' => $barcode_generate,
        ]);
    }
}
