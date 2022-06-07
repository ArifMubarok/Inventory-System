<?php

namespace App\DataTables\Admin\Barang;

use App\Models\Penempatan;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class PenempatanDataTable extends DataTable
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
                return $row->penempatan_id;
            })
            ->addIndexColumn()
            ->editColumn('Pilih', function ($row) {
                $btn = '<input class="cb-child" type="checkbox" name="id" value="' . $row->penempatan_id . '" id="checkbox1"/>';
                return $btn;
            })
            ->rawColumns(['Pilih']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Models\Penempatan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Penempatan $model)
    {
        return $model->where('penempatan', '=', '1')->with('pengadaan.databarang.kategori:id,name', 'pengadaan.databarang:id,name,barcode,kategori_id')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('No')
                ->width(20)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false),
            Column::make('pengadaan.databarang.barcode')->title('Barcode'),
            Column::make('pengadaan.databarang.name')->title('Barang'),
            Column::make('pengadaan.databarang.kategori.name')->title('Kategori'),
            Column::make('pengadaan.tanggal_pengadaan')->title('Tanggal Pengadaan'),
            Column::make('Pilih')
                ->exportable(false)
                ->printable(true)
                ->width(20)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Penempatan_' . date('YmdHis');
    }
}