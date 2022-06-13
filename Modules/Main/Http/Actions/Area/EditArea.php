<?php

namespace Modules\Main\Http\Actions\Area;

use Modules\Main\Models\Area;
use Sarfraznawaz2005\Actions\Action;

class EditArea extends Action
{
    public function __invoke(Area $area): Area
    {
        return $area;
    }

    protected function html($area)
    {
        title('Edit Area');

        return view('main::pages.area.edit')->with(['area' => $area]);
    }
}
