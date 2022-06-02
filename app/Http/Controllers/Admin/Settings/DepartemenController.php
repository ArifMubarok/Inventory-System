<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\Settings\DepartemenDataTable;
use App\Http\Requests\Admin\DepartemenForm;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepartemenDataTable $datatable)
    {
        return $datatable->render('pages.admin.settings.departemen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.settings.departemen.add-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartemenForm $request)
    {
        try {
            Departemen::create($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.settings.departemen.index'))->withInput()->withToastSuccess('success saving data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Departemen::findOrFail($id);
        return view('pages.admin.settings.departemen.add-edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartemenForm $request, $id)
    {
        $data = Departemen::findOrFail($id);
        try {
            $data->update($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('admin.settings.departemen.index'))->withInput()->withToastSuccess('success saving data');
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
            $departemen = Departemen::findOrFail($id);
            $departemen->update(['status' => '0']);
        } catch (\Throwable $th) {
            return response(['error' => 'Something went wrong']);
        }
    }
}
