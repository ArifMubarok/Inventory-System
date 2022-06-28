<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LaporForm;
use App\Models\LaporBarang;
use Carbon\Carbon;

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
        $barang = Penempatan::where('barcode', '=', $request->barcode)->get();
        if ($barang->toArray() != null) {
            return view('pages.admin.cek-barang.detail_barang.menu', [
                'barang' => $barang
            ]);
        } else
        {
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
