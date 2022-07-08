<?php

namespace App\Http\Controllers\Sarpras\Barang;

use App\Models\Supplier;
use App\Models\Pengadaan;
use App\Models\DataBarang;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PengadaanForm;
use App\DataTables\Sarpras\Barang\PengadaanDataTable;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PengadaanDataTable $datatable)
    {
        return $datatable->render('pages.sarpras.barang.pengadaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DataBarang::pluck('name', 'id');
        $supplier = Supplier::pluck('nama_supplier', 'id');
        return view('pages.sarpras.barang.pengadaan.add-edit', [
            'barang' => $barang,
            'supplier' => $supplier
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengadaanForm $request)
    {
        // dd($request);
        // dd($dataBarangMaster);
        try {
            $dataBarangMaster = DataBarang::where('id', '=', $request->databarang_id)->get();
            foreach ($dataBarangMaster as $item) {
                $barcodeMaster = $item->barcode;
            }
            if (Pengadaan::where('databarang_id', '=', $request->databarang_id)->count() == 0) {
                $barcodePengadaan = 1;
            } else {
                $barcodePengadaan = Pengadaan::where('databarang_id', '=', $request->databarang_id)->count() + 1;
            }
            $barcodePengadaan += $request->code;
            $barcodeData = $barcodeMaster . "." . $barcodePengadaan;

            //total harga
            $total = $request->jumlah * $request->harga;
            Pengadaan::create([
                'databarang_id' => $request->databarang_id,
                'supplier_id' => $request->supplier_id,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'tanggal_pengadaan' => $request->tanggal_pengadaan,
                'depresiasi' => $request->depresiasi,
                'lama_depresiasi' => $request->lama_depresiasi,
                'keterangan' => $request->keterangan,
                'total_harga' => $total,
            ]);
            $pengadaan_id = Pengadaan::latest()->first('id');

            $barcodeBarang = 1;
            // dd($barcode);
            $jumlah = $request->jumlah;
            while ($barcodeBarang <= $jumlah) {
                $barcode = $barcodeData . "." . $barcodeBarang;
                $dataPenempatan = ([
                    'pengadaan_id' => $pengadaan_id->id,
                    'status_ditempatkan' => '1',
                    'barcode' => $barcode,
                    'kondisi' => $request->kondisi
                ]);
                Penempatan::create($dataPenempatan);
                $barcodeBarang++;
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('sarpras.barang.pengadaan-barang.index'))->withInput()->withToastSuccess('success saving data');
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
        $data = Pengadaan::findOrFail($id);
        $barang = DataBarang::pluck('name', 'id');
        $supplier = Supplier::pluck('nama_supplier', 'id');
        return view('pages.sarpras.barang.pengadaan.add-edit', [
            'barang' => $barang,
            'supplier' => $supplier,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PengadaanForm $request, $id)
    {
        $data = Pengadaan::findOrFail($id);
        try {
            $data->update($request->all());
        } catch (\Throwable $th) {
            return back()->withInput()->withToastError('Error saving data');
        }
        return redirect(route('sarpras.barang.pengadaan-barang.index'))->withInput()->withToastSuccess('success saving data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Pengadaan::findOrFail($id)->delete();
    }
}