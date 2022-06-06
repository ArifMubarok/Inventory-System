<?php

namespace Database\Seeders;

use App\Models\Penempatan;
use App\Models\Pengadaan;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengadaan::create([
            'databarang_id' => '1',
            'supplier_id' => '1',
            'kondisi' => 'baik',
            'jumlah' => '3',
            'harga' => '14000',
            'tanggal_pengadaan' => '02-06-2022',
        ]);

        Penempatan::create([
            'pengadaan_id' => '1',
            'bagian_id' => '1',
            'lokasi_id' => '1',
            'tanggal_penempatan' => '02-06-2022',
            'penempatan' => '1',
        ]);
    }
}
