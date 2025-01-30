<?php

namespace App\DataTables;

use App\Models\BarangKeluar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RekonsiliasiEksporImporDataTable extends DataTable
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
            ->addColumn('action', 'rekonsiliasieksporimpor.action')
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RekonsiliasiEksporImpor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BarangKeluar $model): QueryBuilder
    {
        return $model->newQuery()->where('tipe', 'ekspor');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->parameters([
                'language' => [
                    'search' => '<i class="fas fa-search"></i>',
                    'infoFiltered' => ''
                ],
            ])
            ->setTableId('rekonsiliasieksporimpor-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-6'B><'col-sm-3'f><'col-sm-3'l>> <'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy(1)
            ->scrollY(350)
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
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        $column = [];
        $column[] = Column::make('nomor_bukti')->title("Nomor Invoice");
        $column[] = Column::make('tanggal_bukti')->title("Tanggal Invoice");
        $column[] = Column::make('tipe');
        return $column;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'RekonsiliasiEksporImpor_' . date('YmdHis');
    }
}
