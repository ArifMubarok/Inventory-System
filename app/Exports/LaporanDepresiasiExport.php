<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanDepresiasiExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('pages.admin.laporan.laporan-depresiasi.table', [
            'data' => Barang::where([
                ['status', '1'],
                ['nilai_barang', '!=', '0']
            ])->with(
                'penempatan:penempatan_id,barcode,pengadaan_id,bagian_id,lokasi_id',
                'penempatan.pengadaan.databarang:id,name,merk_id',
                'penempatan.pengadaan.databarang.merk:id,nama_merk',
                'penempatan.bagian.departemen:id,name',
                'penempatan.bagian:id,name,departemen_id',
                'penempatan.lokasi:id,name',
            )->get()
        ]);
    }
}