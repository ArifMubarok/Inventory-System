<?php

namespace App\Exports;

use App\Models\Pengadaan;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanPengadaanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengadaan::all();
    }
}
