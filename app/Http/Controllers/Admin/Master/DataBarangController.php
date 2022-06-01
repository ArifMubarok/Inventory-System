<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Satuan;
use App\Models\Kategori;
use App\Models\DataBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Master\DataBarangDataTable;
use App\Http\Requests\DataBarangForm;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataBarangDataTable $datatable)
    {
        return $datatable->render('pages.admin.master.barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = Satuan::where('status', '1')
                        ->pluck('nama_satuan', 'id');

        $kategori = Kategori::where('status', '1')
                            ->pluck('name', 'id');

        return view('pages.admin.master.barang.add-edit', [
            'satuan' => $satuan,
            'kategori' =>$kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataBarangForm $request)
    {
        try {
            DataBarang::create($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.master.data-barang.index'))->withInput()->withToastSuccess('success saving data');
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
        $data = DataBarang::findOrFail($id);
        $satuan = Satuan::where('status', '1')
                        ->pluck('nama_satuan', 'id');

        $kategori = Kategori::where('status', '1')
                            ->pluck('name', 'id');
                            
        return view('pages.admin.master.barang.add-edit', [
            'data' => $data,
            'satuan' => $satuan,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataBarangForm $request, $id)
    {
        $data = DataBarang::findOrFail($id);
        try {
            $data->update($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.master.data-barang.index'))->withInput()->withToastSuccess('success saving data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DataBarang::findOrFail($id)->delete();
    }
}
