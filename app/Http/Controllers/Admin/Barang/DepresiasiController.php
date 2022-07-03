<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Departemen;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepresiasiForm;
use App\DataTables\Admin\Barang\DepresiasiDataTable;

class DepresiasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepresiasiDataTable $datatable)
    {
        return $datatable->render('pages.admin.barang.depresiasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepresiasiForm $request)
    {
        $tanggal_depresiasi = date('d-m-Y');
        try {
            foreach ($request->penempatan_id as $p_id) {
                $penempatan = Penempatan::where('penempatan_id', $p_id)->get();
                foreach ($penempatan as $pengadaan) {
                    $pengadaans = Pengadaan::where('id', $pengadaan->pengadaan_id)->get();
                }
            
                foreach ($pengadaans as $item) {
                    $depresiasi = $item->depresiasi;
                    $harga      = $item->harga;
                    $lama_depresiasi = $item->lama_depresiasi;
                    $tanggal_pengadaan = $item->tanggal_pengadaan;
                }

                $ts1 = strtotime($tanggal_pengadaan);
                $ts2 = strtotime($tanggal_depresiasi);

                $year1 = date('Y', $ts1);
                $year2 = date('Y', $ts2);

                $month1 = date('m', $ts1);
                $month2 = date('m', $ts2);

                $jumlahBulan = (($year2 - $year1) * 12) + ($month2 - $month1);

                $nilaiBarang = ($jumlahBulan * ($harga - $depresiasi))/$lama_depresiasi;

                Barang::where('penempatan_id', $p_id)->update([
                    'nilai_barang' => $nilaiBarang,
                    'tanggal_depresiasi' => $tanggal_depresiasi
                ]);
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error');
        }
        
        return view('pages.admin.barang.depresiasi.detail');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
