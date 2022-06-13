<?php

namespace Modules\Main\Http\Actions\Entry;

use Modules\Main\Models\Entry;
use Sarfraznawaz2005\Actions\Action;

class DuplicateEntry extends Action
{
    public function __invoke(Entry $entry): Entry
    {
        return $entry;
    }

    protected function html($entry)
    {
        title('Duplicate Entry');

        return view('main::pages.entry.duplicate')->with(['entry' => $entry]);
    }
}
