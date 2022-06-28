<?php

namespace App\Http\Controllers\Admin\Utilitas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class RestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $backup = Storage::disk('dbBackup')->allFiles('');
        return view('pages.admin.utilitas.restore.index', [
            'backup' => $backup
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            //menghindari error STDIN karena menggunakan Artisan::call()
            define('STDIN',fopen("php://stdin","r"));
            // start the backup process
            Artisan::call("backup:mysql-restore --filename=$request->name --yes");
            // return the results as a response to the ajax call
            return back()->withInput()->withToastSuccess('Database Sudah diRestore');
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError($th->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
             // Delete File From disk dbBackup
             Storage::disk('dbBackup')->delete("$request->name");
             // return the results as a response to the ajax call
             return back()->withInput()->withToastSuccess('Database Telah diHapus');
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError($th->getMessage());
        }
    }
}
