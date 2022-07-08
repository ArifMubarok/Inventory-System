<?php

namespace App\Http\Controllers\Sarpras\Barang;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\Departemen;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\DataTables\Sarpras\Barang\BarangNonAktifDataTable;
use App\DataTables\Sarpras\Barang\BarangNonAktifAddDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NonAktifForm;
use App\DataTables\Admin\Barang\BarangDataTable;
use App\DataTables\Admin\Barang\PenempatanDataTable;


class BarangNonAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BarangNonAktifDataTable $datatable)
    {
        return $datatable->render('pages.sarpras.barang.barang_nonaktif.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BarangNonAktifAddDataTable $datatable)
    {
        $data = Departemen::get();
        $lokasi = Lokasi::get();
        $kategori = Kategori::get();
        return $datatable->render('pages.sarpras.barang.barang_nonaktif.add', [
            'data' => $data,
            'lokasi' => $lokasi,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NonAktifForm $request)
    {
        try {
            foreach ($request->id as $id_barang) {
                Barang::where('id', $id_barang)->update([
                    'status' => '0',
                    'keterangan' => $request->keterangan
                ]);

                $barang = Barang::findOrFail($id_barang);
                $penempatan_id = $barang->penempatan_id;
                Penempatan::where('penempatan_id', $penempatan_id)->update([
                    'kondisi' => $request->kondisi
                ]);
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('sarpras.barang.barang-nonaktif.index'))->withInput()->withToastSucces('Success saving data');
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