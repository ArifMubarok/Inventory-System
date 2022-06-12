<?php

namespace App\DataTables\Admin\Barang;

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
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<div class="btn-group">';
                $btn = $btn . '<a href="' . route('admin.barang.opname.show', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                $btn = $btn . '</div>';
                return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Models\Opname $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function query(Opname $model)
    {
        return $model->with('penempatan:penempatan_id,barcode,pengadaan_id,bagian_id,lokasi_id',
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
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
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
            Column::make('opname.barcode')->title('Barcode'),
            Column::make('opname.pengadaan.databarang.name')->title('Barang'),
            Column::make('opname.tanggal_opname')->title('Tanggal Opname'),
            Column::make('opname.bagian.name')->title('Bagian'),
            Column::make('opname.lokasi.name')->title('Lokasi'),
            Column::make('opname.pengadaan.kondisi')->title('Kondisi'),
            Column::make('opname.keterangan')->title('Keterangan')
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