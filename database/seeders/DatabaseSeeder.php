<?php

namespace Database\Seeders;

use App\Models\JenisKehilangan;
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
        $this->call([
            SettingSeeder::class,
            LaravelEntrustSeeder::class,
            MasterSeeder::class,
            BarangSeeder::class,
        ]);
    }
}
