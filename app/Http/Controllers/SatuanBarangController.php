<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master.satuan_barang.index', [
            'satuanBarangs' => SatuanBarang::all(),
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Satuan Barang"
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.satuan_barang.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Satuan Barang"
        ]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSatuanBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_satuan' => 'required'
        ]);

        SatuanBarang::create($validatedData);

        return redirect('/satuan-barang')->with('success', 'satuan barang has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanBarang $satuanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanBarang $satuanBarang)
    {
        return view('admin.master.satuan_barang.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Satuan Barang",
            'satuan' => $satuanBarang
        ]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatuanBarangRequest  $request
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SatuanBarang $satuanBarang)
    {
        $validatedData = $request->validate([
            'nama_satuan' => 'required'
        ]);

        SatuanBarang::where('id', $satuanBarang->id)->update($validatedData);

        return redirect('/satuan-barang')->with('success', 'satuan barang telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanBarang $satuanBarang)
    {
        SatuanBarang::where('id', $satuanBarang->id)->delete();

        return redirect('/satuan-barang')->with('success', 'Satuan Barang telah dihapus!');
    }
}
