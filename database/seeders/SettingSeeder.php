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
            'name' => 'Engineering',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Engineering departemen'
        ]);
        Departemen::create([
            'name' => 'Finance',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Finance departemen'
        ]);
        Departemen::create([
            'name' => 'Food and Beverage',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'food and beverage departemen'
        ]);
        Departemen::create([
            'name' => 'Front Office',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Front Office departemen'
        ]);
        Departemen::create([
            'name' => 'Housekeeping',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Housekeeping departemen'
        ]);
        Departemen::create([
            'name' => 'Marketing',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Marketing departemen'
        ]);
        Departemen::create([
            'name' => 'Personnel',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Personnel departemen'
        ]);
        Departemen::create([
            'name' => 'Purchasing',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Purchasing departemen'
        ]);
        Departemen::create([
            'name' => 'Security',
            'status' => '1',
            'status_aktif' => 'aktif',
            'keterangan' => 'Security departemen'
        ]);

        Bagian::create([
            'name' => 'Banquet',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '4',
            'keterangan' => 'Banquet bagian'
        ]);
        Bagian::create([
            'name' => 'Bar',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '4',
            'keterangan' => 'Bar bagian'
        ]);
        Bagian::create([
            'name' => 'Food Production',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '4',
            'keterangan' => 'Food Production bagian'
        ]);
        Bagian::create([
            'name' => 'Restaurant Production',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '4',
            'keterangan' => 'Restaurant Production bagian'
        ]);
        Bagian::create([
            'name' => 'Room Service',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '4',
            'keterangan' => 'Room Service bagian'
        ]);
        Bagian::create([
            'name' => 'Office',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '1',
            'keterangan' => 'Office bagian'
        ]);
        Bagian::create([
            'name' => 'Office',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '2',
            'keterangan' => 'Office bagian'
        ]);
        Bagian::create([
            'name' => 'Office',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '3',
            'keterangan' => 'Office bagian'
        ]);
        Bagian::create([
            'name' => 'Cashier',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '5',
            'keterangan' => 'Cashier bagian'
        ]);
        Bagian::create([
            'name' => 'Information',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '5',
            'keterangan' => 'Information bagian'
        ]);
        Bagian::create([
            'name' => 'Reception',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '5',
            'keterangan' => 'Reception bagian'
        ]);
        Bagian::create([
            'name' => 'Reservation',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '5',
            'keterangan' => 'Reservation bagian'
        ]);
        Bagian::create([
            'name' => 'Floor Section',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '6',
            'keterangan' => 'Floor Section bagian'
        ]);
        Bagian::create([
            'name' => 'Florist Section',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '6',
            'keterangan' => 'Florist Section bagian'
        ]);
        Bagian::create([
            'name' => 'Gardener Section',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '6',
            'keterangan' => 'Gardener Section bagian'
        ]);
        Bagian::create([
            'name' => 'Laundry Section',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '6',
            'keterangan' => 'Laundry Section bagian'
        ]);
        Bagian::create([
            'name' => 'Linen/Uniform Section',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '6',
            'keterangan' => 'Linen/Uniform Section bagian'
        ]);
        Bagian::create([
            'name' => 'Public Area Section',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '6',
            'keterangan' => 'Public Area Section bagian'
        ]);
        Bagian::create([
            'name' => 'Recreation/Swimming Pool Section',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '6',
            'keterangan' => 'Recreation/Swimming Pool Section bagian'
        ]);

        Bagian::create([
            'name' => 'Convention',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '7',
            'keterangan' => 'Convention bagian'
        ]);
        Bagian::create([
            'name' => 'Reservation',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '7',
            'keterangan' => 'Reservation bagian'
        ]);

        Bagian::create([
            'name' => 'Office',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '8',
            'keterangan' => 'Office bagian'
        ]);
        Bagian::create([
            'name' => 'Office',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '9',
            'keterangan' => 'Office bagian'
        ]);
        Bagian::create([
            'name' => 'Office',
            'status' => '1',
            'status_aktif' => 'aktif',
            'departemen_id' => '10',
            'keterangan' => 'Office bagian'
        ]);

        Lokasi::create([
            'name' => 'Dapur',
            'status' => '1',
            'status_aktif' => 'Aktif',
            'keterangan' => 'Lokasi Dapur'
        ]);

        Lokasi::create([
            'name' => 'Kantor',
            'status' => '1',
            'status_aktif' => 'Aktif',
            'keterangan' => 'Lokasi Kantor'
        ]);
    }
}
