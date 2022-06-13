<?php

namespace Modules\Main\Http\Actions\Area;

use Illuminate\Http\RedirectResponse;
use Modules\Main\Models\Area;
use Sarfraznawaz2005\Actions\Action;

class StoreArea extends Action
{
    protected $rules = [
        'name' => 'required|min:5'
    ];

    public function __invoke(Area $area): bool
    {
        return $this->create($area);
    }

    protected function html($saved): RedirectResponse
    {
        if (!$saved) {
            return flashBackErrors($this->errors);
        }

        return flashBack(self::MESSAGE_CREATE);
    }
}
