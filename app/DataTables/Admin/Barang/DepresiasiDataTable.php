<?php

namespace App\DataTables\Admin\Barang;

use App\Models\Barang;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class DepresiasiDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->setRowId(function ($row) {
                return $row->id;
            })
            ->addIndexColumn()
            ->editColumn('Pilih', function ($row) {
                $btn = '<input class="cb-child" type="checkbox" name="penempatan_id[]" value="' . $row->penempatan_id . '" id="checkbox1"/>';
                return $btn;
            })
            ->rawColumns(['Pilih']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Models\Barang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Barang $model)
    {
        return $model->with(
            'penempatan:penempatan_id,barcode,pengadaan_id,bagian_id,lokasi_id',
            'penempatan.pengadaan.databarang:id,name,merk_id',
            'penempatan.pengadaan.databarang.merk:id,nama_merk',
            'penempatan.bagian.departemen:id,name',
            'penempatan.bagian:id,name,departemen_id',
            'penempatan.lokasi:id,name',
        )->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('barang-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
            // ->orderBy(2)
            ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->hidden(true)->printable(false),
            Column::make('DT_RowIndex')->title('No')
                ->width(20)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false),
            Column::make('penempatan.barcode')->width(50)->title('Barcode'),
            Column::make('penempatan.pengadaan.databarang.name')->width(200)->title('Barang'),
            Column::make('penempatan.pengadaan.depresiasi')->width(40)->title('Depresiasi'),
            Column::make('penempatan.pengadaan.lama_depresiasi')->width(40)->title('Lama Depresiasi (Bln)'),
            Column::make('penempatan.pengadaan.harga')->width(40)->title('Harga Barang'),
            Column::make('penempatan.pengadaan.tanggal_pengadaan')->width(80)->title('Tanggal Pengadaan'),
            Column::make('Pilih')
                ->exportable(false)
                ->printable(false)
                ->width(20)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Barang_' . date('YmdHis');
    }
}
