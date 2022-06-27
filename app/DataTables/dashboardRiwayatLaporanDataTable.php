<?php

namespace App\DataTables;

use App\Models\LaporBarang;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class dashboardRiwayatLaporanDataTable extends DataTable
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
            ->addIndexColumn()
            ->editColumn('status', function ($row){
                $fa = '';
                switch ($row->status) {
                    case 'menunggu':
                        $warna = 'label-warning';
                        break;
                    
                    case 'proses':
                        $warna = 'label-gray';
                        $fa = 'fas fa-circle-notch fa-spin';
                        break;

                    case 'ditolak':
                        $warna = 'label-danger';
                        $fa = 'fas fa-md fa-times';
                        break;

                    case 'selesai':
                        $warna = 'label-success';
                        $fa = 'fas fa-md fa-check';
                        break;
                }
                $lbl = '<div class="btn-group">';
                $lbl = $lbl . '<span class="label '.$warna.'"><font size="2"> <i class="'.$fa.'"></i> '. $row->status .'</font></span>';
                $lbl = $lbl . '</div>';
                return $lbl;
            })
            ->editColumn('tanggal', function ($row){
                return $row->created_at->format('d M Y');
            })
            ->rawColumns(['status', 'tanggal'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LaporBarang; $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LaporBarang $model)
    {
        return $model
            ->with(
            'barang.penempatan:penempatan_id,barcode,pengadaan_id',
            'barang.penempatan.pengadaan.databarang:id,name,merk_id',
            )
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('laporbarangdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
                    ->parameters([
                        'responsive' => true,
                        'autoWidth' => false
                    ])
                    ->orderBy(0)
                    ->buttons(
                        Button::make('reload'),
                        Button::make('reset')
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
            Column::make('judul_laporan')->title('Judul Laporan'),
            Column::make('laporan'),
            Column::make('status'),
            Column::make('pelapor')->title('Dilaporkan Oleh'),
            Column::make('tanggal')->title('Tgl Laporan')->searchable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dashboardRiwayatLaporan_' . date('YmdHis');
    }
}
