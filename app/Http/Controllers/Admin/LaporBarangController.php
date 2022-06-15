<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\LaporBarangDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidasiLaporanBarangForm;
use App\Models\LaporBarang;

class LaporBarangController extends Controller
{
    public function index(LaporBarangDataTable $datatable)
    {
        return $datatable->render('pages.admin.laporan-barang.index');
    }

    public function show($id)
    {
        $data = LaporBarang::where('id','=',$id)->get();
        return view('pages.admin.laporan-barang.validasi', [
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
        return redirect(route('admin.laporan-barang.index'))->withInput()->withToastSuccess('success update data');
    }
}
