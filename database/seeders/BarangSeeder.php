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
            'jumlah' => '3',
            'harga' => '14000',
            'tanggal_pengadaan' => '02-06-2022',
        ]);

        Pengadaan::create([
            'databarang_id' => '2',
            'supplier_id' => '1',
            'jumlah' => '3',
            'harga' => '35000',
            'tanggal_pengadaan' => date('d-m-Y'),
        ]);

        Penempatan::create([
            'pengadaan_id' => '1',
            'bagian_id' => '1',
            'lokasi_id' => '1',
            'kondisi' => 'baik',
            'tanggal_penempatan' => '02-06-2022',
            'barcode' => 'A0001.1.1',
            'status_ditempatkan' => '1',
        ]);

        Penempatan::create([
            'pengadaan_id' => '2',
            'kondisi' => 'baik',
            'tanggal_penempatan' => '02-06-2022',
            'status_ditempatkan' => '1',
            'barcode' => 'A0002.1.1',
        ]);
    }
}