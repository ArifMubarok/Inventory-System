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
            'name' => 'Elektronik',
            'status' => '1',
        ]);
        Kategori::create([
            'name' => 'Minuman',
            'status' => '1',
        ]);

        Satuan::create([
            'nama_satuan' => 'Rim',
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

        Merk::create([
            'nama_merk' => 'Aqua',
            'status' => '1'
        ]);

        DataBarang::create([
            'name' => 'Aqua',
            'satuan_id' => '1',
            'merk_id' => '1',
            'kategori_id' => '1',
            'keterangan' => 'Aqua Databarang',
            'barcode' => 'A0001',
            
        ]);

        DataBarang::create([
            'name' => 'Galon',
            'satuan_id' => '1',
            'merk_id' => '1',
            'kategori_id' => '2',
            'keterangan' => 'Aqua Databarang',
            'barcode' => 'A0002',
            
        ]);
    }
}