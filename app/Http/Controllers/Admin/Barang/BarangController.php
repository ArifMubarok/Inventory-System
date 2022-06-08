<?php

namespace App\Http\Controllers\Admin\Barang;

use App\DataTables\Admin\Barang\BarangDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BarangDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'test';
    }
}
