<?php

namespace App\DataTables\Sarpras\Laporan;

use App\Models\Pengadaan;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class LaporanPengadaanDataTable extends DataTable
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
     * @param \App\App\Models\LaporanPengadaan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pengadaan $model)
    {
        return $model->with(
            'databarang:id,name',
            'supplier:id,nama_supplier',
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
            ->setTableId('laporanpengadaan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
            // ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false
            ])
            ->buttons(
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
            Column::make('DT_RowIndex')->title('No')
                ->width(20)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false),
            Column::make('databarang.name')->title('Barang'),
            Column::make('supplier.nama_supplier')->title('Supplier'),
            Column::make('tanggal_pengadaan'),
            Column::make('jumlah'),
            Column::make('harga'),
            Column::make('total_harga'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LaporanPengadaan_' . date('YmdHis');
    }
}