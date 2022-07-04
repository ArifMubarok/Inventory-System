<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Opname;
use Illuminate\Http\Request;
use App\Exports\LaporanOpnameExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\Admin\Laporan\LaporanOpnameDataTable;

class LaporanOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaporanOpnameDataTable $datatable)
    {
        return $datatable->render('pages.admin.laporan.laporan-opname.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak()
    {
        $data = Opname::get();
        return view('pages.admin.laporan.laporan-opname.cetak', [
            'data' => $data
        ]);
    }

    public function export()
    {
        return Excel::download(new LaporanOpnameExport, 'Laporan Opname.xlsx');
    }
}