<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Laporan\LaporanPengadaanDataTable;

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