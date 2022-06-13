<?php

namespace Modules\Main\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Models\CoreModel;
use Modules\Core\Traits\Model\HashUrlTrait;

class Entry extends CoreModel
{
    // automatic fake model id
    use HashUrlTrait;

    protected $fillable = [
        'area_id',
        'address',
        'bottles_sent',
        'bottles_received',
        'amount',
        'paid',
        'rider_name',
        'notes',
        'is_monthly',
        'created_at',
    ];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
