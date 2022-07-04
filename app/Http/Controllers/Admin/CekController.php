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
            // get data from barcode in Penempatan Table
            $penempatan = Penempatan::where('barcode', '=', $request->barcode)->get();

            // get Penempatan Id from Penempatan table
            foreach ($penempatan as $b) {
                $penempatan_id = $b->penempatan_id;
            }

            // get data from barang table where penempatan id from penempatan table
            $barang = Barang::where('penempatan_id', $penempatan_id)->firstOrFail();

            // get data laporan barang in lapor table where id barang from Barang table
            $riwayat_laporan = LaporBarang::where('barang_id', $barang->id)->get();

            // get data laporan penempatan in riwayat_penempatan table
            $riwayat_penempatan = RiwayatPenempatan::where('penempatan_id', $penempatan_id)->get();

            return view('pages.admin.cek-barang.detail_barang.menu', [
                'barang' => $penempatan,
                'riwayat_penempatan' => $riwayat_penempatan,
                'riwayat_laporan' => $riwayat_laporan
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
