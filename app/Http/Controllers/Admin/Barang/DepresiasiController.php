<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Bagian;
use App\Models\Lokasi;
use App\Models\Departemen;
use App\Models\Penempatan;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Barang\DepresiasiDataTable;
use App\Http\Requests\Admin\DepresiasiForm;
use App\Models\Barang;

class DepresiasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepresiasiDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.depresiasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
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
    public function store(DepresiasiForm $request)
    {
        // $data = Pengadaan::where('databarang_id', $request->databarang_id)->get();
        // return $data;
        // return $request->penempatan_id;
        $penempatan = Penempatan::where('penempatan_id', $request->penempatan_id)->get();
        foreach ($penempatan as $pengadaan) {
            $pengadaans = Pengadaan::where('id', $pengadaan->pengadaan_id)->get();
        }
        
        foreach ($pengadaans as $item) {
            $depresiasi = $item->depresiasi;
            $harga      = $item->harga;
            $lama_depresiasi = $item->lama_depresiasi;
        }

        //proses hitung
        $nilaiBarang = ($harga - $depresiasi)/$lama_depresiasi;

        //update table barang
        Barang::where('penempatan_id', $request->penempatan_id)->update([
            'nilai_barang' => $nilaiBarang
        ]);
        
        return view('pages.admin.barang.depresiasi.detail');
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
