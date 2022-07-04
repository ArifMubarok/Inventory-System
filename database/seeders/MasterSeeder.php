<?php

namespace Database\Seeders;

use App\Models\Merk;
use App\Models\Satuan;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\DataBarang;
use App\Models\Departemen;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'name' => 'Alat Kebersihan',
            'status' => '1',
        ]);
        Kategori::create([
            'name' => 'Alat Tulis Kantor',
            'status' => '1',
        ]);
        Kategori::create([
            'name' => 'Benda Bergerak',
            'status' => '1',
        ]);
        Kategori::create([
            'name' => 'Benda Tidak Bergerak',
            'status' => '1',
        ]);
        Kategori::create([
            'name' => 'Elektronik',
            'status' => '1',
        ]);
        Kategori::create([
            'name' => 'Peralatan',
            'status' => '1',
        ]);
        Kategori::create([
            'name' => 'Perlengkapan',
            'status' => '1',
        ]);

        Satuan::create([
            'nama_satuan' => 'Buah',
            'status' => '1',
        ]);
        Satuan::create([
            'nama_satuan' => 'Unit',
            'status' => '1',
        ]);

        Supplier::create([
            'nama_supplier' => 'CV. Jaya Makmur Abadi',
            'alamat' => 'Jl. Brigjend Katamso No. 2 Samarinda, Kalimantan Timur. 75117',
            'kota' => 'Samarinda',
            'fax' => '(021) 3851193',
            'email' => 'jayamakmur@abadi.com',
            'cp' => '08123456789',
            'keterangan' => 'Supplier peralatan kamar',
            'status' => '1',
        ]);
        Supplier::create([
            'nama_supplier' => 'NA',
            'alamat' => 'NA',
            'kota' => 'NA',
            'fax' => 'NA',
            'email' => 'NA',
            'cp' => 'NA',
            'keterangan' => 'NA',
            'status' => '1',
        ]);

        Merk::create([
            'nama_merk' => 'NA',
            'status' => '1'
        ]);

        DataBarang::create([
            'name' => 'Epson L3110',
            'satuan_id' => '2',
            'merk_id' => '1',
            'kategori_id' => '5',
            'keterangan' => 'Printer',
            'barcode' => 'E002',
            
        ]);

        DataBarang::create([
            'name' => 'PC Intel Core i5 RAM 4GB HD 1TB',
            'satuan_id' => '2',
            'merk_id' => '1',
            'kategori_id' => '5',
            'keterangan' => 'Personal Computer',
            'barcode' => 'E001',
            
        ]);
    }
}