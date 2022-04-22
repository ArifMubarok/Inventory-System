<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bagian;
use App\Models\DataMerk;
use App\Models\Departemen;
use App\Models\KategoriBarang;
use App\Models\SatuanBarang;
use App\Models\Supplier;
use App\Models\DataBarang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'username' => 'tes',
            'email' => 'tes@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('tes')
        ]);

        User::create([
            'username' => 'nisa',
            'email' => 'nisa@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123')
        ]);

        User::create([
            'username' => 'hasan',
            'email' => 'hasan@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123')
        ]);

        User::create([
            'username' => 'arif',
            'email' => 'arif@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123')
        ]);

        User::create([
            'username' => 'zahwa',
            'email' => 'zahwa@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123')
        ]);

        User::create([
            'username' => 'sufian',
            'email' => 'sufian@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123')
        ]);

        User::create([
            'username' => 'arik',
            'email' => 'arik@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123')
        ]);

        User::create([
        	'username' => 'sarpras',
            'email' => 'sarpras@gmail.com',
            'role' => 'sarpras',
            'password' => bcrypt('123')
        ]);

        User::create([
        	'username' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => bcrypt('123')
        ]);

        SatuanBarang::create([
            'nama_satuan' => 'Rim'
        ]);

        SatuanBarang::create([
            'nama_satuan' => 'Lembar'
        ]);

        KategoriBarang::create([
            'nama_kategori' => 'kategori1'
        ]);

        KategoriBarang::create([
            'nama_kategori' => 'kategori2'
        ]);

        DataMerk::create([
            'nama_merk' => 'merk1'
        ]);

        DataMerk::create([
            'nama_merk' => 'merk2'
        ]);

        Supplier::create([
            'nama_supplier' => 'supplier1',
            'alamat' => 'alamat1',
            'kota' => 'kota1',
            'telepon' => '081222333155',
            'fax' => '081222333155',
            'email' => 'supplier1@mail.com',
            'cp' => '081222333155',
            'keterangan' => 'ket1'
        ]);

        DataBarang::create([
            'id_satuan' => 1,
            'id_merk' => 1,
            'id_kategori' => 1,
            'nama_barang' => 'tes barang',
            'foto' => 'default.jpg',
            'barcode' => 'E001',
            'keterangan' => 'text',
        ]);

        Departemen::create([
            'nama_departemen' => 'departemen1',
            'keterangan' => 'keterangan departemen1',
            'status' => 1
        ]);

        Departemen::create([
            'nama_departemen' => 'departemen2',
            'keterangan' => 'keterangan departemen2',
            'status' => 0
        ]);

        DataBarang::create([
            'id_satuan' => 2,
            'id_kategori' => 2,
            'id_merk' => 2,
            'nama_barang' => 'tes barang 2',
            'keterangan' => 'text 2',
            'barcode' => 'E002',
            'foto' => 'default.jpg'
        ]);
        Bagian::create([
            'departemen_id' => 1,
            'nama_bagian' => 'bagian1',
            'keterangan' => 'keterangan bagian1',
            'status' => 0
        ]);

        Bagian::create([
            'departemen_id' => 2,
            'nama_bagian' => 'bagian2',
            'keterangan' => 'keterangan bagian2',
            'status' => 1
        ]);

    }
}
