<?php

namespace App\DataTables\Admin\Laporan;

use App\Models\Barang;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class LaporanBarangDataTable extends DataTable
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
     * @param \App\App\Models\LaporanBarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Barang $model)
    {
        return $model->where('status', '1')->with(
            'penempatan:penempatan_id,barcode,pengadaan_id,bagian_id,lokasi_id,kondisi',
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
            ->setTableId('laporanbarang-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
            // ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false
            ])
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
            Column::make('DT_RowIndex')->title('No')
                ->width(20)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false),
            Column::make('penempatan.barcode')->width(150)->title('Barcode'),
            Column::make('penempatan.pengadaan.databarang.name')->width(400)->title('Barang'),
            Column::make('penempatan.pengadaan.databarang.merk.nama_merk')->width(80)->title('Merk'),
            Column::make('penempatan.bagian.departemen.name')->title('Departemen'),
            Column::make('penempatan.bagian.name')->title('Bagian'),
            Column::make('penempatan.lokasi.name')->title('Lokasi'),
            Column::make('penempatan.kondisi')->title('Kondisi'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LaporanBarang_' . date('YmdHis');
    }
}