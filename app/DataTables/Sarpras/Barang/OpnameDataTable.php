<?php

namespace App\DataTables\Sarpras\Barang;

use App\Models\Opname;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OpnameDataTable extends DataTable
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
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Models\Opname $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function query(Opname $model)
    {
        return $model->with(
            'barang.penempatan:penempatan_id,barcode,pengadaan_id,bagian_id,lokasi_id,kondisi',
            'barang.penempatan.pengadaan.databarang:id,name,merk_id',
            'barang.penempatan.pengadaan.databarang.merk:id,nama_merk',
            'barang.penempatan.bagian.departemen:id,name',
            'barang.penempatan.bagian:id,name,departemen_id',
            'barang.penempatan.lokasi:id,name',
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
            ->setTableId('opname-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
            // ->orderBy(2)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false
            ])
            ->buttons(
                Button::make('create'),
                Button::make('reload')
            );
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
            Column::make('barang.penempatan.barcode')->title('Barcode'),
            Column::make('barang.penempatan.pengadaan.databarang.name')->title('Barang'),
            Column::make('tanggal_opname')->title('Tanggal Opname'),
            Column::make('barang.penempatan.pengadaan.databarang.merk.nama_merk')->title('Merk'),
            Column::make('barang.penempatan.bagian.departemen.name')->title('Departemen'),
            Column::make('barang.penempatan.bagian.name')->title('Bagian'),
            Column::make('barang.penempatan.lokasi.name')->title('Lokasi'),
            Column::make('barang.penempatan.kondisi')->title('Kondisi'),
            Column::make('keterangan')->title('Keterangan')
                ->exportable(false)
                ->printable(false)
                ->width(60)
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
        return 'Opname_' . date('YmdHis');
    }
}