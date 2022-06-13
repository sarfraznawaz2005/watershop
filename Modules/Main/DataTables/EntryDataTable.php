<?php

namespace Modules\Main\DataTables;

use Exception;
use Modules\Main\Models\Entry;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class EntryDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @param $query
     * @return mixed
     * @throws Exception
     */
    public function dataTable($query)
    {
        return datatables()
            ->of($query)
            ->editColumn('area_id', function ($object) {
                return tdCenter($object->area->name ?? 'N/A');
            })
            ->editColumn('bottles_sent', function ($object) {
                return tdCenter(tdLabel('warning', $object->bottles_sent));
            })
            ->editColumn('bottles_received', function ($object) {
                return tdCenter(tdLabel('info', $object->bottles_received));
            })
            ->editColumn('amount', function ($object) {
                return tdCenter(tdLabel('success', $object->amount));
            })
            ->editColumn('paid', function ($object) {
                return tdCenter(tdLabel($object->paid === '1' ? 'success' : 'danger', $object->paid === '1' ? 'Paid' : 'Unpaid'));
            })
            ->editColumn('is_monthly', function ($object) {
                return tdCenter(tdLabel($object->is_monthly === '1' ? 'success' : 'danger', $object->is_monthly === '1' ? 'Yes' : 'No'));
            })
            ->editColumn('notes', function ($object) {
                return tdCenter(tdModal($object->id, $object->notes));
            })
            ->editColumn('created_at', function ($object) {
                return [
                    'display' => date('d M Y', strtotime($object->created_at)),
                    'timestamp' => date('Y-m-d h:i:s', strtotime($object->created_at))
                ];
            })
            ->editColumn('action', function ($object) {
                $actions = '';

                if ($object->is_monthly === '1') {
                    $actions .= $this->listingDuplicateButton(route('entries.duplicate', [$object]));
                }

                $actions .= listingEditButton(route('entries.edit', [$object]));
                $actions .= listingDeleteButton(route('entries.destroy', [$object]), 'Entry');

                return tdCenter($actions);
            })
            ->rawColumns(['action', 'area_id', 'bottles_sent', 'bottles_received', 'amount', 'paid', 'is_monthly', 'notes'])
            ->blacklist(['action']);
    }

    public function query()
    {
        // ->get() has impact on search/filters
        $query = Entry::all();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            [
                'data' => 'area_id',
                'name' => 'area_id',
                'title' => 'Area',
                'searchable' => true,
                'orderable' => true
            ],
            'address',
            [
                'data' => 'bottles_sent',
                'name' => 'bottles_sent',
                'title' => 'BS',
                'searchable' => true,
                'orderable' => true
            ],
            [
                'data' => 'bottles_received',
                'name' => 'bottles_received',
                'title' => 'BR',
                'searchable' => true,
                'orderable' => true
            ],
            'amount',
            'paid',
            [
                'data' => 'is_monthly',
                'name' => 'is_monthly',
                'title' => 'Monthly',
                'searchable' => true,
                'orderable' => true
            ],
            [
                'data' => 'rider_name',
                'name' => 'rider_name',
                'title' => 'Rider',
                'searchable' => true,
                'orderable' => true,
            ],
            [
                'data' => 'notes',
                'name' => 'notes',
                'title' => 'Notes',
                'searchable' => true,
                'orderable' => false,
                'exportable' => false,
            ],
            [
                'data' => [
                    '_' => 'created_at.display',
                    'sort' => 'created_at.timestamp',
                ],
                'name' => 'created_at',
                'title' => 'Date',
                'searchable' => true,
                'orderable' => true,
                'width' => '70px',

            ],
        ];
    }

    /**
     * Get default builder parameters.
     *
     * @return array
     */
    protected function getBuilderParameters(): array
    {
        return [
            'order' => [[9, 'desc']],
            'dom' => 'Bfrtip',
            'ordering' => config('main.datatable.ordering'),
            'pageLength' => config('main.datatable.pageLength'),
            'autoWidth' => config('main.datatable.autoWidth'),
            'responsive' => config('main.datatable.responsive'),
            'bLengthChange' => config('main.datatable.bLengthChange'),
            'processing' => config('main.datatable.processing'),
            'buttons' => config('main.datatable.buttons'),
            ### for filters ###
            //'initComplete' => filterColumns($this->ajax(), $this->filterColumns()),
        ];
    }

    /**
     * Columns for which filter dropdown will be displayed.
     *
     * @return array
     */
    public function filterColumns(): array
    {
        return [
            'area_id',
            'address',
            'paid',
            'is_monthly',
            'created_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Entry_' . date('YmdHis');
    }

    private function listingDuplicateButton(string $route): string
    {
        return <<< HTML
    <a data-placement="top" data-tooltip data-original-title="Duplicate" style="text-decoration: none;" href="$route">
        <b class="btn btn-primary btn-sm fa fa-refresh"></b>
    </a>
HTML;
    }
}
