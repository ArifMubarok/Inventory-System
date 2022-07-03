<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanBarangNonaktifExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('pages.admin.laporan.laporan-barang-nonaktif.table', [
            'data' => Barang::where('status', '0')->with(
                'penempatan:penempatan_id,pengadaan_id,barcode,bagian_id,lokasi_id,kondisi',
                'penempatan.pengadaan.databarang:id,merk_id,name',
                'penempatan.pengadaan.databarang.merk:id,nama_merk',
                'penempatan.bagian:id,departemen_id,name',
                'penempatan.bagian.departemen:id,name',
                'penempatan.lokasi:id,name',
            )->get()
        ]);
    }
}