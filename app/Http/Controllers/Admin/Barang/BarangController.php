<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Barang;
use App\Models\LaporBarang;
use Illuminate\Http\Request;
use App\Models\RiwayatPenempatan;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Barang\BarangDataTable;
use App\DataTables\Admin\Barang\PenempatanDataTable;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BarangDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_barang = Barang::where('id', '=', $id)->get();
        foreach ($data_barang as $item) {
            $penempatan_id = $item->penempatan->penempatan_id;
            $barang_id = $item->id;
        }
        // get data laporan barang in lapor table where id barang from Barang table
        $riwayat_laporan = LaporBarang::where('barang_id', $barang_id)->get();

        $riwayat_penempatan = RiwayatPenempatan::where('penempatan_id', $penempatan_id)->get();
        // dd($riwayat_penempatan);
        return view('pages.admin.barang.barang.detail_barang.menu', [
            'data_barang' => $data_barang,
            'riwayat_penempatan' => $riwayat_penempatan,
            'riwayat_laporan' => $riwayat_laporan
        ]);
    }
}