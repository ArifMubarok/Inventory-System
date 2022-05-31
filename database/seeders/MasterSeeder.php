<?php

namespace Database\Seeders;

use App\Models\Kategori;
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


    }
}
