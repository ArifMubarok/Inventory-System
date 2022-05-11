<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master.supplier.index', [
            'suppliers' => Supplier::all(),
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Supplier"
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.supplier.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Supplier"
        ]) ;
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
            'nama_supplier' => 'required|unique:suppliers|max:255',
            'alamat' => 'required|unique:suppliers|max:255',
            'kota' => 'required|unique:suppliers|max:255',
            'telepon' => 'required|unique:suppliers|max:255',
            'fax' => 'required|unique:suppliers|max:255',
            'email' => 'required|unique:suppliers|max:255',
            'cp' => 'required|unique:suppliers|max:255',
            'keterangan' => 'required|unique:suppliers|max:255'
        ]);

        Supplier::create($validatedData);

        return redirect('/supplier')->with('success', 'Supplier berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.master.supplier.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Supplier",
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules['nama_supplier'] = 'required|unique:suppliers|max:255';    
        $rules['alamat'] = 'required|unique:suppliers|max:255';    
        $rules['kota'] = 'required|unique:suppliers|max:255';    
        $rules['telepon'] = 'required|unique:suppliers|max:255';    
        $rules['fax'] = 'required|unique:suppliers|max:255';    
        $rules['email'] = 'required';    
        $rules['cp'] = 'required|unique:suppliers|max:255';    
        $rules['keterangan'] = 'required|unique:suppliers|max:255';

        if ($request->nama_supplier != $supplier->nama_supplier || $request->alamat != $supplier->alamat ||
            $request->kota != $supplier->kota || $request->telepon != $supplier->telepon ||
            $request->fax != $supplier->fax || $request->email != $supplier->email ||
            $request->cp != $supplier->cp || $request->keterangan != $supplier->keterangan) {
        }
        $validatedData = $request->validate($rules);

        Supplier::where('id', $supplier->id)->update($validatedData);

        return redirect('/supplier')->with('success', 'Data Supplier berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::where('id', $supplier->id)->delete();

        return redirect('/supplier')->with('success', 'Supplier telah dihapus!');
    }
}
