<?php

namespace App\Http\Controllers;

use App\Models\DataMerk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataMerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master.data_merk.index', [
            'dataMerks' => DataMerk::all(),
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data Merk"
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.data_merk.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data Merk"
        ]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataMerkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_merk' => 'required'
        ]);

        DataMerk::create($validatedData);

        return redirect('/data-merk')->with('success', 'merk has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Http\Response
     */
    public function show(DataMerk $dataMerk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Http\Response
     */
    public function edit(DataMerk $dataMerk)
    {
        return view('admin.master.data_merk.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data Merk",
            'dataMerk' => $dataMerk
        ]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataMerkRequest  $request
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataMerk $dataMerk)
    {
        $validatedData = $request->validate([
            'nama_merk' => 'required'
        ]);

        DataMerk::where('id', $dataMerk->id)->update($validatedData);

        return redirect('/data-merk')->with('success', 'data merk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataMerk $dataMerk)
    {
        DataMerk::where('id', $dataMerk->id)->delete();

        return redirect('/data-merk')->with('success', ' telah dihapus!');
    }
}
