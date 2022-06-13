<?php

namespace Modules\Main\Http\Actions\Entry;

use Illuminate\Http\RedirectResponse;
use Modules\Main\Models\Entry;
use Sarfraznawaz2005\Actions\Action;

class DestroyEntry extends Action
{
    public function __invoke(Entry $entry): ?bool
    {
        return $this->delete($entry);
    }

    protected function html($deleted): RedirectResponse
    {
        if (!$deleted) {
            return flashBackErrors(self::MESSAGE_FAIL);
        }

        return flashBack(self::MESSAGE_DELETE);
    }
}
