<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Bagian;
use App\Models\Departemen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\BagianForm;
use App\DataTables\Admin\Settings\BagianDataTable;

class BagianController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BagianDataTable $datatable)
    {
        return $datatable->render('pages.admin.settings.bagian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departemen = Departemen::where('status_aktif', 'aktif')
                                ->where('status', '1')
                                ->pluck('name', 'id');
        return view('pages.admin.settings.bagian.add-edit', [
            'departemen' => $departemen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BagianForm $request)
    {
        try {
            Bagian::create($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.settings.bagian.index'))->withInput()->withToastSuccess('success saving data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bagian::findOrFail($id);
        $departemen = Departemen::where('status_aktif', 'aktif')
                                ->where('status', '1')
                                ->pluck('name', 'id');
        return view('pages.admin.settings.bagian.add-edit', [
            'data' => $data,
            'departemen' => $departemen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BagianForm $request, $id)
    {
        $data = Bagian::findOrFail($id);
        try {
            $data->update($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.settings.bagian.index'))->withInput()->withToastSuccess('success saving data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $bagian = Bagian::findOrFail($id);
            $bagian->update(['status' => '0']);
        } catch (\Throwable $th) {
            return response(['error' => 'Something went wrong']);
        }
    }
}
