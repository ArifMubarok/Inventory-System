<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Bagian;
use App\Models\Lokasi;
use App\Models\Departemen;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Barang\PenempatanDataTable;
use App\Http\Requests\Admin\PenempatanForm;
use App\Models\Barang;
use App\Models\RiwayatPenempatan;
use App\Models\CetakBarcode;

class PenempatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenempatanDataTable $datatable)
    {
        // dd(Penempatan::with('pengadaan.databarang.kategori:id,name')->pluck('pengadaan.databarang.kategori.name'));
        $data = Departemen::where('status_aktif', '=', 'aktif')->get();
        $lokasi = Lokasi::where('status_aktif', '=', 'aktif')->get();
        return $datatable->render('pages.admin.barang.penempatan.index', [
            'data' => $data,
            'lokasi' => $lokasi
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
    public function store(PenempatanForm $request)
    {
        try {
            Penempatan::whereIn('penempatan_id', $request->penempatan_id)->update([
                'status_ditempatkan' => '0',
                'bagian_id' => $request->bagian_id,
                'lokasi_id' => $request->lokasi_id,
                'tanggal_penempatan' => $request->tanggal_penempatan
            ]);
            foreach ($request->penempatan_id as $penempatan) {
                Barang::create([
                    'penempatan_id' => $penempatan
                ]);
                RiwayatPenempatan::create([
                    'penempatan_id' => $penempatan,
                    'lokasi_id' => $request->lokasi_id
                ]);
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error');
        }
        return redirect(route('admin.barang.penempatan-barang.index'));
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