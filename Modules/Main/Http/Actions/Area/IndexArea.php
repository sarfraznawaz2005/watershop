<?php

namespace Modules\Main\Http\Actions\Area;

use Modules\Main\DataTables\AreaDataTable;
use Modules\Main\Models\Area;
use Sarfraznawaz2005\Actions\Action;

class IndexArea extends Action
{
    public function __invoke(Area $area): Area
    {
        return $area;
    }

    protected function html()
    {
        title('Area List');

        return (new AreaDataTable())->render('main::pages.area.index');
    }
}
