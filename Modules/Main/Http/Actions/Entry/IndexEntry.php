<?php

namespace Modules\Main\Http\Actions\Entry;

use Modules\Main\DataTables\EntryDataTable;
use Modules\Main\Models\Entry;
use Sarfraznawaz2005\Actions\Action;

class IndexEntry extends Action
{
    public function __invoke(Entry $entry): Entry
    {
        return $entry;
    }

    protected function html()
    {
        title('Entries List');

        return (new EntryDataTable())->render('main::pages.entry.index');
    }
}
