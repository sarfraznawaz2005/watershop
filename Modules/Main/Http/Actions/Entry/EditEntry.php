<?php

namespace Modules\Main\Http\Actions\Entry;

use Modules\Main\Models\Entry;
use Sarfraznawaz2005\Actions\Action;

class EditEntry extends Action
{
    public function __invoke(Entry $entry): Entry
    {
        return $entry;
    }

    protected function html($entry)
    {
        title('Edit Entry');

        return view('main::pages.entry.edit')->with(['entry' => $entry]);
    }
}
