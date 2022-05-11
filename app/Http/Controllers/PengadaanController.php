<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Http\Controllers\Controller;
use App\Models\DataBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang.pengadaan.index', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Pengadaan Barang",
            "pengadaans" => Pengadaan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.pengadaan.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Pengadaan Barang",
            "databarangs" => DataBarang::all(),
            "suppliers" => Supplier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'databarang_id' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
            'depresiasi' => '',
            'lama_depresiasi' => '',
            'keterangan' => '',
        ]);
        Pengadaan::create($validatedData);

        return redirect('/pengadaan-barang')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengadaan $pengadaan)
    {
        //
    }
}
