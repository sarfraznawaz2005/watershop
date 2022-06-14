<?php

namespace Modules\Main\Http\Actions\Home;

use Modules\Main\Models\Entry;
use Sarfraznawaz2005\Actions\Action;

class IndexHome extends Action
{
    public function __invoke(Entry $entry)
    {
        title('Home');

        return view('main::pages.home.index', compact('entry'));
    }
}
