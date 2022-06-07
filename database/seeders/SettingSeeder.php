<?php

namespace Database\Seeders;

// use App\Models\Setting;
use App\Models\Bagian;
use App\Models\Lokasi;
use App\Models\Departemen;
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

        

        Departemen::create([
            'name' => 'Accounting',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'accounting departemen'
        ]);

        Departemen::create([
            'name' => 'Food and Beverage',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'food and beverage departemen'
        ]);

        Bagian::create([
            'name' => 'Cashier',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '1',
            'keterangan' => 'bagian departemen'
        ]);

        Bagian::create([
            'name' => 'Bar',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '2',
            'keterangan' => 'bagian departemen'
        ]);

        Bagian::create([
            'name' => 'Banquet',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '2',
            'keterangan' => 'bagian departemen'
        ]);

        Bagian::create([
            'name' => 'Food Production',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '2',
            'keterangan' => 'bagian departemen'
        ]);

        Lokasi::create([
            'name' => 'Dapur',
            'status' => '1',
            'status_aktif' => 'Aktif',
            'keterangan' => 'Lokasi Dapur'
        ]);

        Lokasi::create([
            'name' => 'Office',
            'status' => '1',
            'status_aktif' => 'Aktif',
            'keterangan' => 'Lokasi Office'
        ]);
    }
}
