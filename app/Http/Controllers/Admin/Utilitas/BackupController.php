<?php

namespace App\Http\Controllers\Admin\Utilitas;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.utilitas.backup.index');
    }

    public function backup()
    {
        // get name table of database for name of backup file
        $nametb = DB::connection()->getDatabaseName();

        // get date now for name of backup file
        $tanggal = Carbon::now()->toDateTimeString('minute');
        try {
            // start the backup process
            Artisan::call("backup:mysql-dump $nametb'_'$tanggal");
            // return the results as a response to the ajax call
            return back()->withInput()->withToastSuccess('Database Sudah Tersimpan');
        } catch (\Throwable $e) {
            return back()->withInput()->withToastError($e->getMessage());
        }
    }
}
