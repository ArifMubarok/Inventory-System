<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Laporan\LaporanPengadaanDataTable;
use App\Exports\LaporanPengadaanExport;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaporanPengadaanDataTable $datatable)
    {
        return $datatable->render('pages.admin.laporan.laporan-pengadaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak()
    {
        $data = Pengadaan::get();
        return view('pages.admin.laporan.laporan-pengadaan.cetak', [
            'data' => $data
        ]);
    }

    public function export()
    {
        return Excel::download(new LaporanPengadaanExport, 'Laporan Pengadaan.xlsx');
    }
}