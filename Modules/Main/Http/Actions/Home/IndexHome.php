<?php

namespace Modules\Main\Http\Actions\Home;

use Sarfraznawaz2005\Actions\Action;

class IndexHome extends Action
{
    public function __invoke()
    {
        title('Dashboard');

        return view('main::pages.home.index');
    }
}
