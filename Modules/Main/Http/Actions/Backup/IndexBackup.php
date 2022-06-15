<?php

namespace Modules\Main\Http\Actions\Backup;

use Sarfraznawaz2005\Actions\Action;

class IndexBackup extends Action
{
    public function __invoke()
    {
        title('Backup');

        return view('main::pages.backup.index');
    }
}
