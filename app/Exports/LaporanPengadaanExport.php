<?php

namespace App\Exports;

use App\Models\Pengadaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanPengadaanExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('pages.admin.laporan.laporan-pengadaan.table', [
            'data' => Pengadaan::with(
                'databarang:id,name',
                'supplier:id,nama_supplier',
            )->get()
        ]);
    }
}