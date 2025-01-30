<?php

namespace App\DataTables;

use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LogDataTable extends DataTable
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
            ->addColumn('user', function ($data) {
                $user = "";
                if (isset($data->createdBy)) {
                    $user = $data->createdBy;
                }
                return $user->name;
            })
            ->filterColumn('user', function ($query, $keyword) {
                // Assuming you have a relationship between the user and role (e.g., user->role->name)
                $query->whereHas('createdBy', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            ->addColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('Y-m-d H:i:s');
            });
        // ->rawColumns(['role', 'action', 'profile']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Log $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Log $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('created_at', 'DESC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        $button = [];
        $button[] = Button::make('excel')->text('<span title="Export Excel"><i class="fa fa-file-excel"></i></span>');
        return $this->builder()
            ->parameters([
                'language' => [
                    'search' => '<i class="fas fa-search"></i>',
                    'infoFiltered' => ''
                ],
            ])
            ->setTableId('log-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-6'B><'col-sm-3'f><'col-sm-3'l>> <'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy([4, 'desc'])
            ->scrollY(350)
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
        return [

            Column::make('user'),
            Column::make('action'),
            Column::make('module'),
            Column::make('description'),
            Column::make('created_at')->title("Execution Date"),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Log_' . date('YmdHis');
    }
}
