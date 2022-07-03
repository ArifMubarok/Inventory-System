<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanBarangExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        return view('pages.admin.laporan.laporan-barang.table', [
            'data' => Barang::with(
                'penempatan:penempatan_id,pengadaan_id,barcode,bagian_id,lokasi_id,kondisi',
                'penempatan.pengadaan:id,databarang_id',
                'penempatan.pengadaan.databarang:id,name,merk_id',
                'penempatan.pengadaan.databarang.merk:id,nama_merk',
                'penempatan.bagian:id,name,departemen_id',
                'penempatan.bagian.departemen:id,name',
                'penempatan.lokasi:id,name',
            )->get()
        ]);
    }
}