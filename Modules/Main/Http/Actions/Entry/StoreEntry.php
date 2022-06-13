<?php

namespace Modules\Main\Http\Actions\Entry;

use Illuminate\Http\RedirectResponse;
use Modules\Main\Models\Entry;
use Sarfraznawaz2005\Actions\Action;

class StoreEntry extends Action
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
        return $this->create($entry);
    }

    protected function html($saved): RedirectResponse
    {
        if (!$saved) {
            return flashBackErrors($this->errors);
        }

        flash('Added Successfully', 'success');

        return redirect()->route('entries.index');
    }
}
