<?php

namespace App\Http\Controllers\Sarpras\Barang;

use App\Models\Bagian;
use App\Models\Lokasi;
use App\Models\Departemen;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Sarpras\Barang\PenempatanDataTable;
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
        return $datatable->render('pages.sarpras.barang.penempatan.index', [
            'data' => $data,
            'lokasi' => $lokasi
        ]);
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
                    'lokasi_id' => $request->lokasi_id,
                    'tanggal_penempatan' => $request->tanggal_penempatan
                ]);
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error');
        }
        return redirect(route('sarpras.barang.penempatan-barang.index'))->withInput()->withToastSuccess('data telah ditempatkan');
    }
}