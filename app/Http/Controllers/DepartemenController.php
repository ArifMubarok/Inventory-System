<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengaturan.departemen.index', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Kategori Barang",
            "departemens" => Departemen::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengaturan.departemen.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Departemen"
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
            'nama_departemen' => 'required|unique:departemens|max:255',
            'keterangan' => 'required|unique:departemens|max:255',
            'status' => 'required'
        ]);

        Departemen::create($validatedData);

        return redirect('/departemen')->with('success', 'departemen telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Departemen $departeman)
    {
        //dd($departeman);
        return view('admin.pengaturan.departemen.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Kategori Barang",
            'departemen' => $departeman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departemen $departeman)
    {
        $rules['nama_departemen'] = 'required|unique:departemens|max:255';    
        if ($request->nama_departemen != $departeman->nama_departemen || 
        $request->status != $departeman->status || $request->keterangan != $departeman->keterangan) {
        }
        $validatedData = $request->validate($rules);

        Departemen::where('id', $departeman->id)->update($validatedData);

        return redirect('/departemen')->with('success', 'Departemen telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departemen $departeman)
    {
        Departemen::where('id', $departeman->id)->delete();

        return redirect('/departemen')->with('success', 'departemen telah dihapus!');
    }
}
