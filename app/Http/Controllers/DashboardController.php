<?php

namespace App\Http\Controllers;

use App\DataTables\Admin\LaporBarangDataTable;
use App\DataTables\dashboardRiwayatLaporanDataTable;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DataBarang;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(dashboardRiwayatLaporanDataTable $datatable)
    {
        $master = DataBarang::count();
        $aktif = Barang::where('status', '1')->count();
        $nonaktif = Barang::where('status', '0')->count();
        $totbar = Barang::get();
        return $datatable->render('pages.dashboard', [
            'master' => $master,
            'totbar' => $totbar,
            'aktif' => $aktif,
            'nonaktif' => $nonaktif
        ]);
    }
}
