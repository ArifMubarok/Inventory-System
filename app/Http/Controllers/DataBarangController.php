<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Http\Controllers\Controller;
use App\Models\DataMerk;
use App\Models\KategoriBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataBarang::join('satuan_barangs', 'satuan_barangs.id', '=', 'data_barangs.id_satuan')
            ->join('data_merks', 'data_merks.id', '=', 'data_barangs.id_merk')
            ->join('kategori_barangs', 'kategori_barangs.id_kategori', '=', 'data_barangs.id_kategori')
            ->select('data_barangs.*', 'data_merks.nama_merk', 'kategori_barangs.nama_kategori', 'satuan_barangs.nama_satuan')
            ->get();

        return view('admin.master.data_barang.index', [
            'dataBarangs' => $data,
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data Barang"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.data_barang.create', [
            'dataBarangs' => DataBarang::all(),
            'kategoriBarang' => KategoriBarang::all(),
            'satuanBarang' => SatuanBarang::all(),
            'dataMerk' => DataMerk::all(),
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data Barang"
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
        $validateInput = $request->validate([
            'nama_barang' => 'required',
            'barcode' => 'required',
            'id_satuan' => 'required',
            'id_merk' => 'required',
            'id_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $insert = DataBarang::create($validateInput);

        if ($insert) {
            return redirect('/data-barang')->with('success', 'Data Barang telah ditambahkan !');
        } else {
            return redirect('/data-barang')->with('fail', 'Data Barang gagal ditambahkan !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function show(DataBarang $dataBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBarang $dataBarang)
    {
        return view('admin.master.data_barang.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data Barang",
            'dataBarang' => $dataBarang,
            'kategoriBarang' => KategoriBarang::all(),
            'satuanBarang' => SatuanBarang::all(),
            'dataMerk' => DataMerk::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBarang $dataBarang)
    {
        $validateInput = $request->validate([
            'nama_barang' => 'required',
            'barcode' => 'required',
            'id_satuan' => 'required',
            'id_merk' => 'required',
            'id_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $ubah = DataBarang::where('id', $dataBarang->id)->update($validateInput);

        if ($ubah) {
            return redirect('/data-barang')->with('success', 'Data Barang telah diubah !');
        } else {
            return redirect('/data-barang')->with('fail', 'Data Barang gagal diubah !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataBarang $dataBarang)
    {
        $delete = DataBarang::where('id', $dataBarang->id)->delete();

        if ($delete) {
            return redirect('/data-barang')->with('success', 'Data Barang telah dihapus !');
        } else {
            return redirect('/data-barang')->with('fail', 'Data Barang gagal dihapus !');
        }
    }
}