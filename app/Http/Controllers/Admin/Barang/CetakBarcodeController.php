<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Barang;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Barang\PenempatanDataTable;
use App\DataTables\Admin\Barang\CetakBarcodeDataTable;

class CetakBarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CetakBarcodeDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.cetak_barcode.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(PenempatanDataTable $datatable, $id)
    {
        $file = public_path('barcode.png');
        $barcode = Barang::where('id', '=', $id)->get();
        foreach ($barcode as $data_barang) {
            $barcode_gen = $data_barang->penempatan->barcode;
        }
        $barcode_generate = QRCode::text($barcode_gen)->setOutfile($file)->setSize(7)->png();
        return view('pages.admin.barang.cetak_barcode.cetak_barcode', [
            'barcode' => $barcode,
            'barcode_generate' => $barcode_generate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
