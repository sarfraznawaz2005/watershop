<?php

namespace Modules\Main\DataTables;

use Exception;
use Modules\Main\Models\Area;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class AreaDataTable extends DataTable
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
            ->editColumn('action', function ($object) {

                $actions = listingEditButton(route('areas.edit', [$object]));
                $actions .= listingDeleteButton(route('areas.destroy', [$object]), 'Area');

                return tdCenter($actions);
            })
            ->rawColumns(['action'])
            ->blacklist(['action']);
    }

    public function query()
    {
        // ->get() has impact on search/filters
        $query = Area::all();

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
            'name',
            'created_at' => ['width' => '180px'],
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
            'order' => [[0, 'asc']],
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
            'name',
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
        return 'Area_' . date('YmdHis');
    }
}
