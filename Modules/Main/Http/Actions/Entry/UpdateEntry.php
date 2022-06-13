<?php

namespace Modules\Main\Http\Actions\Entry;

use Illuminate\Http\RedirectResponse;
use Modules\Main\Models\Area;
use Modules\Main\Models\Entry;
use Sarfraznawaz2005\Actions\Action;

class UpdateEntry extends Action
{
    protected $rules = [
        'area_id' => 'required',
        'address' => 'required',
        'bottles_sent' => 'required',
        'bottles_received' => 'required',
        'amount' => 'required',
    ];

    public function __invoke(Entry $entry): bool
    {
        return $this->update($entry);
    }

    protected function html($saved): RedirectResponse
    {
        if (!$saved) {
            return flashBackErrors($this->errors);
        }

        return flashBack(self::MESSAGE_UPDATE);
    }
}
