<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Opname;
use App\Models\Kategori;
use App\Models\Pengadaan;
use App\Models\Departemen;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OpnameForm;
use App\DataTables\Admin\Barang\OpnameDataTable;
use App\DataTables\Admin\Barang\OpnameAddDataTable;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OpnameDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.opname.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OpnameAddDataTable $datatable)
    {
        $data = Departemen::get();
        $lokasi = Lokasi::get();
        $kategori = Kategori::get();
        return $datatable->render('pages.admin.barang.opname.add-edit', [
            'data' => $data,
            'lokasi' => $lokasi,
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpnameForm $request)
    {
        // dd($request);
        try {
            // Opname::whereIn('id', $request->id)->update([
            //     'kondisi' => $request->kondisi,
            //     'tanggal_opname' => $request->tanggal_opname,
            //     'keterangan' => $request->keterangan
            // ]);
            foreach ($request->id as $opname) {
                Opname::create([
                    'barang_id' => $opname,
                    'tanggal_opname' => $request->tanggal_opname,
                    'keterangan' => $request->keterangan
                ]);

                $id_barang = Barang::findOrFail($opname);
                $id_penempatan = $id_barang->penempatan_id;
                $penempatan = Penempatan::where('penempatan_id', $id_penempatan)->update([
                    'kondisi' => $request->kondisi
                ]);
                // dd($penempatan);
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.barang.proses-opname.index'))->withInput()->withToastSucces('success saving data');
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