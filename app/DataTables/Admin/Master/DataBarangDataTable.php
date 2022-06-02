<?php

namespace App\DataTables\Admin\Master;

use App\Models\DataBarang;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class DataBarangDataTable extends DataTable
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
                $btn = $btn . '<a href="' . route('admin.master.data-barang.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                $btn = $btn . '<a href="' . route('admin.master.data-barang.destroy', $row->id) . '" class="btn btn-danger buttons-delete"><i class="fas fa-trash fa-fw"></i></a>';
                $btn = $btn . '</div>';
                return $btn;
            })
            ->editColumn('satuan', function ($row) {
                $display = $row->satuan->where('id', $row->satuan->id)->pluck('nama_satuan')->toArray();
                return implode(', ', $display);
            })
            ->editColumn('merk', function ($row) {
                $display = $row->merk->where('id', $row->merk->id)->pluck('nama_merk')->toArray();
                return implode(', ', $display);
            })
            ->editColumn('kategori', function ($row) {
                $display = $row->kategori->where('id', $row->kategori->id)->pluck('name')->toArray();
                return implode(', ', $display);
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DataBarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DataBarang $model)
    {
        return $model->with('satuan:id,nama_satuan','kategori:id,name', 'merk:id,nama_merk')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('databarang-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
                    ->orderBy(1)
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
                  ->orderable(false),
            Column::make('name')->title('Barang'),
            Column::make('barcode'),
            Column::make('satuan')
                  ->orderable(false),
            Column::make('merk')
                  ->orderable(false),
            Column::make('kategori')
                  ->orderable(false),
            Column::computed('action')
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
        return 'DataBarang_' . date('YmdHis');
    }
}
