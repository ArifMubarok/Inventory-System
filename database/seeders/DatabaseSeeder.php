<?php

namespace Database\Seeders;

use App\Models\SatuanBarang;
use App\Models\Supplier;
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
            'username' => 'nisa',
            'email' => 'nisa@gmail.com',
            'password' => bcrypt('123')
        ]);

        SatuanBarang::create([
            'nama_satuan' => 'Rim'
        ]);

        SatuanBarang::create([
            'nama_satuan' => 'Lembar'
        ]);

        Supplier::create([
            'nama_supplier' => 'nisa',
            'alamat' => 'sukoharjo'
        ]);

    }
}
