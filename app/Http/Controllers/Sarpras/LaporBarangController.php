<?php

namespace App\Http\Controllers\Sarpras;

use App\DataTables\Sarpras\LaporBarangDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidasiLaporanBarangForm;
use App\Models\LaporBarang;

class LaporBarangController extends Controller
{
    public function index(LaporBarangDataTable $datatable)
    {
        return $datatable->render('pages.sarpras.laporan-barang.index');
    }

    public function show($id)
    {
        $data = LaporBarang::where('id','=',$id)->get();
        return view('pages.sarpras.laporan-barang.validasi', [
            'data' => $data,
        ]);
    }

    public function update(ValidasiLaporanBarangForm $request, $id)
    {
        try {
            LaporBarang::where('id', $id)->update([
                'status' => $request->status,
                'keterangan' => $request->keterangan,
            ]);
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error report data');
        }
        return redirect(route('sarpras.laporan-barang.index'))->withInput()->withToastSuccess('success update data');
    }
}
