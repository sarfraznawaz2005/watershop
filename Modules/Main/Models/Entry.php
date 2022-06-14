<?php

namespace Modules\Main\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
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

    public function amountDueToday(): Builder
    {
        return $this
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('paid', '0')
            ->where('is_monthly', '0');
    }

    public function bottlesDueToday(): Builder
    {
        return $this
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereDate('created_at', Carbon::today())
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '0');
    }

    public function totalAmountDueToday(): Builder
    {
        return $this
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('is_monthly', '0');
    }

    public function amountDueMonth(): Builder
    {
        return $this
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('paid', '0')
            ->where('is_monthly', '0');
    }

    public function bottlesDueMonth(): Builder
    {
        return $this
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '0');
    }

    public function totalAmountDueMonth(): Builder
    {
        return $this
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('is_monthly', '0');
    }

    public function amountDueOverall(): Builder
    {
        return $this
            ->select('amount')
            ->where('paid', '0')
            ->where('is_monthly', '0');
    }

    public function bottlesDueOverall(): Builder
    {
        return $this
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '0');
    }

    public function totalAmountDueOverall(): Builder
    {
        return $this
            ->select('amount')
            ->where('is_monthly', '0');
    }

    public function amountDueTodayMonthly(): Builder
    {
        return $this
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('paid', '0')
            ->where('is_monthly', '1');
    }

    public function bottlesDueTodayMonthly(): Builder
    {
        return $this
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereDate('created_at', Carbon::today())
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '1');
    }

    public function totalAmountDueTodayMonthly(): Builder
    {
        return $this
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('is_monthly', '1');
    }

    public function amountDueMonthMonthly(): Builder
    {
        return $this
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('paid', '0')
            ->where('is_monthly', '1');
    }

    public function bottlesDueMonthMonthly(): Builder
    {
        return $this
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '1');
    }

    public function totalAmountDueMonthMonthly(): Builder
    {
        return $this
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('is_monthly', '1');
    }

    public function amountDueOverallMonthly(): Builder
    {
        return $this
            ->select('amount')
            ->where('paid', '0')
            ->where('is_monthly', '1');
    }

    public function bottlesDueOverallMonthly(): Builder
    {
        return $this
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '1');
    }

    public function totalAmountDueOverallMonthly(): Builder
    {
        return $this
            ->select('amount')
            ->where('is_monthly', '1');
    }
}
