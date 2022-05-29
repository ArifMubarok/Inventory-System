<?php

namespace Database\Seeders;

// use App\Models\Setting;
use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create([
            'name' => 'Dapur',
            'status' => '1',
            'status_aktif' => 'Aktif',
            'keterangan' => 'Lokasi Dapur'
        ]);
        
        // $default = [
        //     'skck-nama-pejabat-ttd' => 'NAMA PENANDATANGAN',
        //     'skck-jabatan-pejabat-ttd' => 'AJUN KOMISARIS POLISI',
        //     'skck-nrp-pejabat-ttd' => '75110267',
        // ];

        // foreach ($default as $key => $value) {
        //     Setting::updateOrCreate([
        //         'name' => $key,
        //     ], [
        //         'value' => $value
        //     ]);
        // }

        // Setting::create([

        // ]);
    }
}
