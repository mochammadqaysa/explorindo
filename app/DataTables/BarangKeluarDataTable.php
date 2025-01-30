<?php

namespace App\DataTables;

use App\Helpers\PermissionCommon;
use App\Helpers\Utils;
use App\Models\BarangKeluar;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BarangKeluarDataTable extends DataTable
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
                if (PermissionCommon::check('barang_keluar.update') || PermissionCommon::check('barang_keluar_gudang.update')) {
                    $html .= '<button onclick="edit(\'' . $item->uid . '\')" type="button" class="btn btn-sm btn-info" title="Edit"><i class="fas fa-pen"></i></button>';
                }
                if (PermissionCommon::check('barang_keluar.delete') || PermissionCommon::check('barang_keluar_gudang.delete')) {
                    $html .= '<button onclick="destroy(\'' . $item->uid . '\')" type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>';
                }
                if (PermissionCommon::check('barang_keluar.generate_reminder') && strtolower($item->tipe) == "lokal" && Request::is('inventory/barang-keluar') && strtoupper($item->customer->nama) != "ADJUSTMENT") {
                    // $html .= '<button onclick="generateReminder(\'' . $item->uid . '\')" type="button" class="btn btn-sm bg-diy text-white" title="Buat Reminder"><i class="fas fa-business-time"></i></button>';
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

            ->addColumn('tanggal_sj', function ($data) {
                return Utils::formatTanggal($data->tanggal_sj);
            })
            ->filterColumn('tanggal_sj', function ($query, $keyword) {
                $query->where('tanggal_sj', 'like', "%{$keyword}%");
            })
            ->orderColumn('tanggal_sj', function ($query, $direction) {
                $query->orderBy('tanggal_sj', $direction);
            })

            ->addColumn('nomor_sj', function ($data) {
                return '<a href="javascript:show(\'' . $data->uid . '\')">' . $data->nomor_sj . '</a>';
            })
            ->filterColumn('nomor_sj', function ($query, $keyword) {
                $query->where('nomor_sj', 'like', "%{$keyword}%");
            })
            ->orderColumn('nomor_sj', function ($query, $direction) {
                $query->orderBy('nomor_sj', $direction);
            })
            ->addColumn('tipe', function ($data) {
                if (strtolower($data->tipe) == "ekspor") {
                    return '<span class="badge badge-lg badge-info">' . $data->tipe . '</span>';
                } else {
                    return '<span class="badge badge-lg badge-success">' . $data->tipe . '</span>';
                }
            })
            ->filterColumn('tipe', function ($query, $keyword) {
                // Apply the filter directly to the `tipe` column
                $query->where('tipe', 'like', "%{$keyword}%");
            })
            ->orderColumn('tipe', function ($query, $direction) {
                $query->orderBy('tipe', $direction);
            })

            ->addColumn('customer', function ($data) {
                $customer = "";
                if (isset($data->customer)) {
                    $customer = $data->customer->nama;
                }
                return $customer;
            })
            ->filterColumn('customer', function ($query, $keyword) {
                // Assuming you have a relationship between the user and role (e.g., user->role->name)
                $query->whereHas('customer', function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->orderColumn('customer', function ($query, $direction) {
                $query->orderBy(
                    Customer::select('nama')
                        ->whereColumn('customer.uid', 'barang_keluar.customer_uid')
                        ->limit(1),
                    $direction
                );
            })
            ->rawColumns(['action', 'nomor_bukti', 'nomor_sj', 'tipe']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BarangKeluar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BarangKeluar $model): QueryBuilder
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
        if (PermissionCommon::check('barang_keluar.create') || PermissionCommon::check('barang_keluar_gudang.create')) {
            $button[] = Button::raw('<i class="fa fa-plus"></i> Create Pengeluaran Barang Jadi')->action('function() { create() }');
        }

        $orderBy = [];
        if (str_contains(url()->current(), 'inventory/barang-keluar-gudang')) {
        }
        $orderBy[] = [4, 'desc'];
        $orderBy[] = [3, 'desc'];
        $orderBy[] = [2, 'desc'];
        $orderBy[] = [1, 'desc'];
        return $this->builder()
            ->parameters([
                'language' => [
                    'search' => '<i class="fas fa-search"></i>',
                    'infoFiltered' => ''
                ],
            ])
            ->setTableId('barangkeluar-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-6'B><'col-sm-3'f><'col-sm-3'l>> <'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orders($orderBy)
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
        if (PermissionCommon::check('barang_keluar.update')  || PermissionCommon::check('barang_keluar.delete') || PermissionCommon::check('barang_keluar_gudang.update')  || PermissionCommon::check('barang_keluar_gudang.delete')) {
            $column[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center');
        }
        $column[] = Column::make('nomor_bukti')->title("Nomor Invoice");
        $column[] = Column::make('tanggal_bukti')->title("Tanggal Invoice");
        $column[] = Column::make('nomor_sj')->title("Nomor Surat Jalan");
        $column[] = Column::make('tanggal_sj')->title("Tanggal Surat Jalan");
        if (str_contains(url()->current(), 'inventory/barang-keluar-gudang')) {
        }
        $column[] = Column::make('customer');
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
        return 'BarangKeluar_' . date('YmdHis');
    }
}
