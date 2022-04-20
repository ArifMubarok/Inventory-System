<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master.kategori_barang.index', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Kategori Barang",
            "kategori" => KategoriBarang::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.kategori_barang.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Kategori Barang"
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
            'nama_kategori' => 'required|unique:kategori_barangs|max:255'
        ]);

        KategoriBarang::create($validatedData);

        return redirect('/kategori-barang')->with('success', 'Kategori telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBarang $kategoriBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriBarang $kategoriBarang)
    {
        return view('admin.master.kategori_barang.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Kategori Barang",
            'kategori' => $kategoriBarang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriBarang $kategoriBarang)
    {

        $rules['nama_kategori'] = 'required|unique:kategori_barangs|max:255';    
        if ($request->nama_kategori != $kategoriBarang->nama_kategori) {
        }
        $validatedData = $request->validate($rules);

        KategoriBarang::where('id_kategori', $kategoriBarang->id_kategori)->update($validatedData);

        return redirect('/kategori-barang')->with('success', 'Kategori telah dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriBarang $kategoriBarang)
    {
        KategoriBarang::where('id_kategori', $kategoriBarang->id_kategori)->delete();

        return redirect('/kategori-barang')->with('success', 'Kategori telah dihapus!');
    }
}
