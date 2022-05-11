<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengaturan.lokasi.index', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Lokasi",
            "lokasis" => Lokasi::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengaturan.lokasi.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Lokasi"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lokasi' => 'required|unique:lokasis|max:255',
            'keterangan' => 'required|unique:lokasis|max:255',
            'status' => 'required'
        ]);

        Lokasi::create($validatedData);

        return redirect('/lokasi')->with('success', 'Lokasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        return view('admin.pengaturan.lokasi.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Lokasi",
            "lokasi" => $lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $rules['nama_lokasi'] = 'required|unique:lokasis|max:255';
        $rules['status'] = 'required';
        $rules['keterangan'] = 'required|unique:lokasis|max:255';

        if ($request->nama_lokasi != $lokasi->nama_lokasi || $request->status != $lokasi->status || 
        $request->keterangan != $lokasi->keterangan) {
        }
        $validatedData = $request->validate($rules);

        Lokasi::where('id', $lokasi->id)->update($validatedData);

        return redirect('/lokasi')->with('success', 'Lokasi telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        Lokasi::where('id', $lokasi->id)->delete();

        return redirect('/lokasi')->with('success', 'Lokasi telah dihapus!');
    }
}
