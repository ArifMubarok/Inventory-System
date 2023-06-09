<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Departemen;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanDepresiasiExport;
use App\Http\Requests\Admin\DepresiasiForm;
use App\DataTables\Admin\Laporan\LaporanDepresiasiDataTable;

class LaporanDepresiasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaporanDepresiasiDataTable $datatable)
    {
        return $datatable->render('pages.admin.laporan.laporan-depresiasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak()
    {
        $data = Barang::where('nilai_barang', '!=', '0')->get();
        return view('pages.admin.laporan.laporan-depresiasi.cetak', [
            'data' => $data
        ]);
    }
    public function export()
    {
        return Excel::download(new LaporanDepresiasiExport, 'Laporan Depresiasi.xlsx');
    }
}