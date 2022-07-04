<?php

namespace App\Exports;

use App\Models\Opname;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanOpnameExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('pages.admin.laporan.laporan-opname.table', [
            'data' => Opname::with(
                'barang.penempatan:penempatan_id,barcode,pengadaan_id,bagian_id,lokasi_id,kondisi',
                'barang.penempatan.pengadaan.databarang:id,name,merk_id',
                'barang.penempatan.pengadaan.databarang.merk:id,nama_merk',
                'barang.penempatan.bagian.departemen:id,name',
                'barang.penempatan.bagian:id,name,departemen_id',
                'barang.penempatan.lokasi:id,name',
            )->get()
        ]);
    }
}