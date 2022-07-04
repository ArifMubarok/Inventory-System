<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\Departemen;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MutasiLokasiForm;
use App\DataTables\Admin\Barang\MutasiLokasiDataTable;
use App\Models\RiwayatPenempatan;

class MutasiLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MutasiLokasiDataTable $datatable)
    {
        $departemen = Departemen::get();
        $lokasi = Lokasi::get();
        $kategori = Kategori::get();
        return $datatable->render('pages.admin.barang.mutasi_lokasi.index', [
            'departemen' => $departemen,
            'lokasi' => $lokasi,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MutasiLokasiForm $request)
    {
        $tanggal_pemindahan = date('d-m-Y');
        try {
            foreach ($request->penempatan_id as $item) {
                Penempatan::where('penempatan_id', $item)->update([
                    'lokasi_id' => $request->lokasi_id,
                ]);
                $riwayat = RiwayatPenempatan::where('penempatan_id', $item)->latest()->first()->update([
                    'tanggal_pemindahan' => $tanggal_pemindahan,
                ]);
                RiwayatPenempatan::create([
                    'penempatan_id' => $item,
                    'lokasi_id' => $request->lokasi_id,
                    'tanggal_penempatan' => $tanggal_pemindahan,
                ]);
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error move location');
        }
        return redirect(route('admin.barang.mutasi-lokasi.index'))->withInput()->withToastSuccess('Success move location');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}