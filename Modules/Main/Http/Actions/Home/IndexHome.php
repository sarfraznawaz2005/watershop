<?php

namespace Modules\Main\Http\Actions\Home;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Sarfraznawaz2005\Actions\Action;

class IndexHome extends Action
{
    public function __invoke()
    {
        title('Home');

        $amountDueToday = DB::table('entries')
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('paid', '0')
            ->where('is_monthly', '0')
            ->get()
            ->sum('amount');

        $bottlesDueToday = DB::table('entries')
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereDate('created_at', Carbon::today())
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '0')
            ->get()
            ->sum('cnt');

        $amountDueTotal = DB::table('entries')
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('is_monthly', '0')
            ->get()
            ->sum('amount');

        $amountDueMonth = DB::table('entries')
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('paid', '0')
            ->where('is_monthly', '0')
            ->get()
            ->sum('amount');

        $bottlesDueMonth = DB::table('entries')
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '0')
            ->get()
            ->sum('cnt');

        $amountDueTotalMonth = DB::table('entries')
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('is_monthly', '0')
            ->get()
            ->sum('amount');

        $amountDueOverall = DB::table('entries')
            ->select('amount')
            ->where('paid', '0')
            ->where('is_monthly', '0')
            ->get()
            ->sum('amount');

        $bottlesDueOverall = DB::table('entries')
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '0')
            ->get()
            ->sum('cnt');

        $amountDueTotalOverall = DB::table('entries')
            ->select('amount')
            ->where('is_monthly', '0')
            ->get()
            ->sum('amount');

        $amountDueTodayMM = DB::table('entries')
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('paid', '0')
            ->where('is_monthly', '1')
            ->get()
            ->sum('amount');

        $bottlesDueTodayMM = DB::table('entries')
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereDate('created_at', Carbon::today())
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '1')
            ->get()
            ->sum('cnt');

        $amountDueTotalMM = DB::table('entries')
            ->select('amount')
            ->whereDate('created_at', Carbon::today())
            ->where('is_monthly', '1')
            ->get()
            ->sum('amount');

        $amountDueMonthMM = DB::table('entries')
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('paid', '0')
            ->where('is_monthly', '1')
            ->get()
            ->sum('amount');

        $bottlesDueMonthMM = DB::table('entries')
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '1')
            ->get()
            ->sum('cnt');

        $amountDueTotalMonthMM = DB::table('entries')
            ->select('amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->where('is_monthly', '1')
            ->get()
            ->sum('amount');

        $amountDueOverallMM = DB::table('entries')
            ->select('amount')
            ->where('paid', '0')
            ->where('is_monthly', '1')
            ->get()
            ->sum('amount');

        $bottlesDueOverallMM = DB::table('entries')
            ->select(DB::raw('(bottles_sent - bottles_received) as cnt'))
            ->where('bottles_sent', '>', 'bottles_received')
            ->where('is_monthly', '1')
            ->get()
            ->sum('cnt');

        $amountDueTotalOverallMM = DB::table('entries')
            ->select('amount')
            ->where('is_monthly', '1')
            ->get()
            ->sum('amount');

        return view(
            'main::pages.home.index',
            compact(
                'amountDueToday', 'bottlesDueToday', 'amountDueTotal',
                'amountDueMonth', 'bottlesDueMonth', 'amountDueTotalMonth',
                'amountDueOverall', 'bottlesDueOverall', 'amountDueTotalOverall',
                'amountDueTodayMM', 'bottlesDueTodayMM', 'amountDueTotalMM',
                'amountDueMonthMM', 'bottlesDueMonthMM', 'amountDueTotalMonthMM',
                'amountDueOverallMM', 'bottlesDueOverallMM', 'amountDueTotalOverallMM'
            )
        );
    }
}
