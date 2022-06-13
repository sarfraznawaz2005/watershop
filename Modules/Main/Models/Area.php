<?php

namespace Modules\Main\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Core\Models\CoreModel;
use Modules\Core\Traits\Model\HashUrlTrait;

class Area extends CoreModel
{
    // automatic fake model id
    use HashUrlTrait;

    protected $fillable = [
        'name',
    ];

    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }
}
