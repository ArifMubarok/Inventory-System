<?php

namespace App\Http\Controllers\Sarpras\Laporan;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanBarangNonaktifExport;
use App\DataTables\Sarpras\Laporan\LaporanBarangNonaktifDataTable;

class LaporanBarangNonaktifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaporanBarangNonaktifDataTable $datatable)
    {
        return $datatable->render('pages.sarpras.laporan.laporan-barang-nonaktif.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cetak()
    {
        $data = Barang::where('status', '0')->get();
        return view('pages.sarpras.laporan.laporan-barang-nonaktif.cetak', [
            'data' => $data
        ]);
    }

    public function export()
    {
        return Excel::download(new LaporanBarangNonaktifExport, 'Laporan Barang Non-aktif.xlsx');
    }
}