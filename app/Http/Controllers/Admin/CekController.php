<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Penempatan;
use App\Models\LaporBarang;
use Illuminate\Http\Request;
use App\Models\RiwayatPenempatan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LaporForm;

class CekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.cek-barang.index');
    }

    public function show(Request $request)
    {
        try {
            $barang = Penempatan::where('barcode', '=', $request->barcode)->get();
            foreach ($barang as $b) {
                $penempatan_id = $b->penempatan_id; 
            }
            $riwayat_penempatan = RiwayatPenempatan::where('penempatan_id', $penempatan_id)->get();
            return view('pages.admin.cek-barang.detail_barang.menu', [
                'barang' => $barang,
                'riwayat_penempatan' => $riwayat_penempatan
            ]);
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Tidak ada Data');
        }
    }

    public function lapor(Request $request)
    {
        $barang = Penempatan::where('barcode', '=', $request->barcode)->get();
        foreach ($barang as $item) {
            $idpenempatan = $item->penempatan_id;
        }

        $idbarang = Barang::where('penempatan_id', '=', $idpenempatan)->get();
        return view('pages.admin.cek-barang.lapor', [
            'barang' => $barang,
            'barang_id' => $idbarang
        ]);
    }

    public function kirim(LaporForm $request)
    {
        try {
            LaporBarang::create([
                'barang_id' => $request->barang_id,
                'judul_laporan' => $request->judul_laporan,
                'laporan' => $request->laporan,
                'pelapor' => $request->pelapor,
                'status' => 'menunggu',
            ]);
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error report data');
        }
        return redirect(route('admin.laporan-barang.index'))->withInput()->withToastSuccess('success report data');
    }
}
