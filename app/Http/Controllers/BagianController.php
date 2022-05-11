<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Departemen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengaturan.bagian.index', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Bagian",
            "bagians" => Bagian::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengaturan.bagian.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Bagian",
            "departemens" => Departemen::all()
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
            'departemen_id' => 'required',
            'nama_bagian' => 'required|unique:bagians|max:255',
            'keterangan' => 'required|unique:bagians|max:255',
            'status' => 'required'
        ]);

        Bagian::create($validatedData);

        return redirect('/bagian')->with('success', 'bagian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function show(Bagian $bagian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function edit(Bagian $bagian)
    {
        //dd($bagian);
        return view('admin.pengaturan.bagian.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Bagian",
            'bagians' => $bagian,
            "departemens" => Departemen::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bagian $bagian)
    {
        $rules['nama_bagian'] = 'required|unique:bagians|max:255';    
        $rules['departemen_id'] = 'required';
        $rules['status'] = 'required';
        $rules['keterangan'] = 'required|unique:bagians|max:255';    

        if ($request->departemen_id != $bagian->departemen_id || $request->nama_bagian != $bagian->nama_bagian ||
        $request->status != $bagian->status || $request->keterangan != $bagian->keterangan) {
        }
        $validatedData = $request->validate($rules);

        Bagian::where('id', $bagian->id)->update($validatedData);

        return redirect('/bagian')->with('success', 'Bagian telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bagian $bagian)
    {
        Bagian::where('id', $bagian->id)->delete();

        return redirect('/bagian')->with('success', 'Bagian telah dihapus!');
    }
}
