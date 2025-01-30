<?php

namespace App\DataTables;

use App\Helpers\PermissionCommon;
use App\Models\Customer;
use App\Models\Piutang;
use Brick\Math\BigDecimal;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PiutangDataTable extends DataTable
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
                // check sudah lunas atau belum
                $hutang = BigDecimal::of($item->barangKeluar->barangKeluarItems->sum('nilai_total'));
                $nominal_bayar = BigDecimal::of($item->pelunasan->sum('nominal_bayar'));
                $sisa = $hutang->minus($nominal_bayar)->toScale(3)->toFloat();
                // dd($nominal_bayar);
                if (PermissionCommon::check('piutang.pelunasan')) {
                    if ($sisa != 0) {
                        $html .= '<button onclick="pelunasan(\'' . $item->uid . '\')" type="button" class="btn btn-sm bg-diy text-white" title="Pelunasan"><i class="fas fa-money-bill-wave"></i></button>';
                    }
                }
                $html .= '<button onclick="history_reminder(\'' . $item->uid . '\')" type="button" class="btn btn-sm bg-diy text-white" title="History Reminder"><i class="fas fa-bullhorn"></i></button>';
                // $html .= '<button onclick="destroy(\'' . $item->uid . '\')" type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>';
                $html .= '</div>';
                return $html;
            })
            ->addColumn('keterangan', function ($item) {
                $hutang = BigDecimal::of($item->barangKeluar->barangKeluarItems->sum('nilai_total'));
                $nominal_bayar = BigDecimal::of($item->pelunasan->sum('nominal_bayar'));
                $sisa = $hutang->minus($nominal_bayar)->toScale(3)->toFloat();
                if ($nominal_bayar->toScale(3)->toFloat() == 0) {
                    return '<span class="badge badge-danger">Belum Ada Pembayaran</span>';
                }
                return $sisa == 0 ? '<span class="badge badge-success">Lunas</span>' : '<span class="badge badge-danger">Belum Lunas</span>';
            })
            ->addColumn('customer', function ($data) {
                $customer = "";
                if (isset($data->barangKeluar->customer)) {
                    $customer = $data->barangKeluar->customer->nama;
                }
                return '<a href="javascript:show(\'' . $data->uid . '\')">' . $customer . '</a>';
            })
            ->filterColumn('customer', function ($query, $keyword) {
                $query->whereHas('barangKeluar', function ($q) use ($keyword) {
                    $q->whereHas('customer', function ($q) use ($keyword) {
                        $q->where('nama', 'like', "%{$keyword}%");
                    });
                });
            })
            ->orderColumn('customer', function ($query, $direction) {
                $query->orderBy(
                    Customer::select('nama')
                        ->join('barang_keluar', 'barang_keluar.customer_uid', '=', 'customer.uid')
                        ->whereColumn('barang_keluar.uid', 'piutang.barang_keluar_uid') // Ensure this matches your schema
                        ->limit(1),
                    $direction
                );
            })
            ->addColumn('based_on_receive', function ($data) {
                if ($data->based_on_received == "0") {
                    return '<span class="badge bg-gradient-info text-white">Surat Jalan</span>';
                } else {
                    return '<span class="badge bg-gradient-primary text-white">Barang Diterima</span>';
                }
            })
            ->filterColumn('based_on_receive', function ($query, $keyword) {
                if (stripos('surat jalan', $keyword) !== false) {
                    $query->where('based_on_received', '0');
                } elseif (stripos('barang diterima', $keyword) !== false) {
                    $query->where('based_on_received', '1');
                }
            })
            ->orderColumn('based_on_receive', function ($query, $direction) {
                $query->orderBy('based_on_received', $direction);
            })
            ->rawColumns(['action', 'customer', 'based_on_receive', 'keterangan']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Piutang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Piutang $model): QueryBuilder
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
        $button[] = Button::make('excel')->text('<span title="Export Excel"><i class="fa fa-file-excel"></i></span>')->exportOptions([
            'columns' => ':not(:first-child)',
        ]);
        $button[] = Button::raw('<i class="fa fa-plus"></i> Catat Jurnal')->action('function() { create() }');
        return $this->builder()
            ->parameters([
                'language' => [
                    'search' => '<i class="fas fa-search"></i>',
                    'infoFiltered' => ''
                ],
            ])
            ->setTableId('piutang-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-6'B><'col-sm-3'f><'col-sm-3'l>> <'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy(3, 'asc')
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
        $column[] = Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center');
        $column[] = Column::make('customer');
        $column[] = Column::make('keterangan');
        $column[] = Column::make('nomor_sj')->title("No. Surat Jalan");
        $column[] = Column::make('tanggal_sj')->title("Tanggal Surat Jalan");
        $column[] = Column::make('based_on_receive')->title("Reminder Berdasarkan");
        $column[] = Column::make('tanggal_received')->title("Tanggal Barang Diterima");
        return $column;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Piutang_' . date('YmdHis');
    }
}
