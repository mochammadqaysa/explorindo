<?php

namespace App\DataTables;

use App\Helpers\PermissionCommon;
use App\Helpers\Utils;
use App\Models\BarangMasuk;
use App\Models\Gudang;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BarangMasukDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item) {
                $html = '';
                $html = '<div class="btn-group btn-group-sm">';
                if (PermissionCommon::check('barang_masuk.update')) {
                    $html .= '<button onclick="edit(\'' . $item->uid . '\')" type="button" class="btn btn-sm btn-info" title="Edit"><i class="fas fa-pen"></i></button>';
                }
                if (PermissionCommon::check('barang_masuk.delete')) {
                    $html .= '<button onclick="destroy(\'' . $item->uid . '\')" type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>';
                }
                $html .= '</div>';
                return $html;
            })
            ->addColumn('tanggal_bukti', function ($data) {
                return Utils::formatTanggal($data->tanggal_bukti);
            })
            ->filterColumn('tanggal_bukti', function ($query, $keyword) {
                $query->where('tanggal_bukti', 'like', "%{$keyword}%");
            })
            ->orderColumn('tanggal_bukti', function ($query, $direction) {
                $query->orderBy('tanggal_bukti', $direction);
            })

            ->addColumn('nomor_bukti', function ($data) {
                return '<a href="javascript:show(\'' . $data->uid . '\')">' . $data->nomor_bukti . '</a>';
            })
            ->filterColumn('nomor_bukti', function ($query, $keyword) {
                $query->where('nomor_bukti', 'like', "%{$keyword}%");
            })
            ->orderColumn('nomor_bukti', function ($query, $direction) {
                $query->orderBy('nomor_bukti', $direction);
            })
            ->addColumn('gudang', function ($data) {
                $gudang = "";
                if (isset($data->gudang)) {
                    $gudang = $data->gudang->nama;
                }
                return $gudang;
            })
            ->filterColumn('gudang', function ($query, $keyword) {
                // Assuming you have a relationship between the user and role (e.g., user->role->name)
                $query->whereHas('gudang', function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->orderColumn('gudang', function ($query, $direction) {
                $query->orderBy(
                    Gudang::select('nama')
                        ->whereColumn('gudang.uid', 'barang_masuk.gudang_uid')
                        ->limit(1),
                    $direction
                );
            })
            ->rawColumns(['action', 'nomor_bukti']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BarangMasuk $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BarangMasuk $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        $button = [];
        // $button[] = Button::make('excel')->text('<span title="Export Excel"><i class="fa fa-file-excel"></i></span>');
        if (PermissionCommon::check('barang_masuk.create')) {
            $button[] = Button::raw('<i class="fa fa-plus"></i> Create Pemasukan Barang Jadi')->action('function() { create() }');
        }
        return $this->builder()
            ->parameters([
                'language' => [
                    'search' => '<i class="fas fa-search"></i>',
                    'infoFiltered' => ''
                ],
            ])
            ->setTableId('barangmasuk-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-6'B><'col-sm-3'f><'col-sm-3'l>> <'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy(1)
            ->scrollY(350)
            ->scrollX(false)
            ->initComplete("
                function() {
                    var filterRow = $('<tr class=\"filter-row\"></tr>').appendTo('thead');
                    this.api().columns().every(function(index) {
                        var column = this;

                        if (index === 0) {
                            filterRow.append('<th></th>');
                            return;
                        }

                        var headerCell = $('<th></th>').appendTo(filterRow);
                        var columnName = $(column.header()).text();
                        var input = $('<input type=\"text\" class=\"form-control\" placeholder=\"Cari ' + columnName + '\" style=\"width: 100%;\" />')
                            .appendTo(headerCell)
                            .on('keyup change', function() {
                                column.search($(this).val()).draw();
                            });
                            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
                    });
                }
            ")
            // ->selectStyleSingle()
            ->buttons($button);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        $column = [];
        if (PermissionCommon::check('barang_masuk.update') || PermissionCommon::check('barang_masuk.delete')) {
            $column[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center');
        }
        $column[] = Column::make('tanggal_bukti')->title("Tanggal")
            ->width(80);
        $column[] = Column::make('nomor_bukti')->title("Bukti");
        $column[] = Column::make('gudang')->title("Penyimpanan");
        return $column;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'BarangMasuk_' . date('YmdHis');
    }
}
