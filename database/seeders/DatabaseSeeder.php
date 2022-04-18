<?php

namespace Database\Seeders;

use App\Models\KategoriBarang;
use App\Models\User;
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
            'password' => bcrypt('tes')
        ]);

        KategoriBarang::create([
            'nama_kategori' => 'kategori1'
        ]);
        
        KategoriBarang::create([
            'nama_kategori' => 'kategori2'
        ]);
    }
}
