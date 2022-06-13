<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DataBarang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $master = DataBarang::count();
        $totbar = Barang::count();
        return view('pages.admin.dashboard', [
            'master' => $master,
            'totbar' => $totbar,
        ]);
    }
}
