<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Supplier;
use App\Models\Pengadaan;
use App\Models\DataBarang;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PengadaanForm;
use App\DataTables\Admin\Barang\PengadaanDataTable;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PengadaanDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.pengadaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DataBarang::pluck('name', 'id');
        $supplier = Supplier::pluck('nama_supplier', 'id');
        return view('pages.admin.barang.pengadaan.add-edit', [
            'barang' => $barang,
            'supplier' => $supplier
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengadaanForm $request)
    {
        // dd($dataPenempatan);
        try {
            Pengadaan::create($request->all());
            $jumlah = $request->jumlah;
            $pengadaan_id = Pengadaan::latest()->first('id');
            $dataPenempatan = ([
                'pengadaan_id' => $pengadaan_id->id,
                'status_ditempatkan' => '1'
            ]);
            for ($i = 1; $i <= $jumlah; $i++) {
                Penempatan::create($dataPenempatan);
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.barang.pengadaan-barang.index'))->withInput()->withToastSuccess('success saving data');
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
        $data = Pengadaan::findOrFail($id);
        $barang = DataBarang::pluck('name', 'id');
        $supplier = Supplier::pluck('nama_supplier', 'id');
        return view('pages.admin.barang.pengadaan.add-edit', [
            'barang' => $barang,
            'supplier' => $supplier,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PengadaanForm $request, $id)
    {
        $data = Pengadaan::findOrFail($id);
        try {
            $data->update($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.barang.pengadaan-barang.index'))->withInput()->withToastSuccess('success saving data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Pengadaan::findOrFail($id)->delete();
    }
}