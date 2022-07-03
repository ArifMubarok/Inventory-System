<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Laporan\LaporanBarangDataTable;
use App\Exports\LaporanBarangExport;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class LaporanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaporanBarangDataTable $datatable)
    {
        return $datatable->render('pages.admin.laporan.laporan-barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak()
    {
        $data = Barang::get();
        return view('pages.admin.laporan.laporan-barang.cetak', [
            'data' => $data
        ]);
    }

    public function export()
    {
        return Excel::download(new LaporanBarangExport, 'Laporan Barang.xlsx');
    }
}