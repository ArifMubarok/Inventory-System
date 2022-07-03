<?php

<<<<<<<< HEAD:app/Http/Controllers/Admin/Barang/CetakBarcodeController.php
namespace App\Http\Controllers\Admin\Barang;
========
namespace App\Http\Controllers\User;
>>>>>>>> origin/cek:app/Http/Controllers/User/UserDashboardController.php

use App\DataTables\dashboardRiwayatLaporanDataTable;
use App\Models\Barang;
<<<<<<<< HEAD:app/Http/Controllers/Admin/Barang/CetakBarcodeController.php
use App\Models\Penempatan;
use App\Models\CetakBarcode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Barang\CetakBarcodeDataTable;

class CetakBarcodeController extends Controller
========
use App\Models\DataBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
>>>>>>>> origin/cek:app/Http/Controllers/User/UserDashboardController.php
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<<< HEAD:app/Http/Controllers/Admin/Barang/CetakBarcodeController.php
    public function index(CetakBarcodeDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.cetak_barcode.index');
========
    public function index(dashboardRiwayatLaporanDataTable $datatable)
    {
        $master = DataBarang::count();
        $totbar = Barang::count();
        return $datatable->render('pages.admin.dashboard', [
            'master' => $master,
            'totbar' => $totbar,
        ]);
>>>>>>>> origin/cek:app/Http/Controllers/User/UserDashboardController.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $barcode = Barang::where('id', '=', $id)->get();
        return view('pages.admin.barang.cetak_barcode.cetak_barcode', [
            'barcode' => $barcode,
            'image' => 'logo.png',
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
<<<<<<<< HEAD:app/Http/Controllers/Admin/Barang/CetakBarcodeController.php

========
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>>> origin/cek:app/Http/Controllers/User/UserDashboardController.php
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
