<?php

namespace Modules\Main\Http\Actions\Area;

use Illuminate\Http\RedirectResponse;
use Modules\Main\Models\Area;
use Sarfraznawaz2005\Actions\Action;

class DestroyArea extends Action
{
    public function __invoke(Area $area)
    {
        if ($area->entries()->count()) {
            return flashBackErrors('Cannot delete this area as it has entries!');
        }

        return $this->delete($area);
    }

    protected function html($deleted): RedirectResponse
    {
        if (!$deleted) {
            return flashBackErrors(self::MESSAGE_FAIL);
        }

        return flashBack(self::MESSAGE_DELETE);
    }
}
