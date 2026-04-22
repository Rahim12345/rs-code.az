<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitorController extends Controller
{
    public function index()
    {
        $today     = now()->toDateString();
        $yesterday = now()->subDay()->toDateString();
        $weekAgo   = now()->subDays(6)->toDateString();
        $monthAgo  = now()->subDays(29)->toDateString();

        $todayCount     = DB::table('visitors')->where('date', $today)->count();
        $yesterdayCount = DB::table('visitors')->where('date', $yesterday)->count();
        $weekCount      = DB::table('visitors')->whereBetween('date', [$weekAgo, $today])->count();
        $monthCount     = DB::table('visitors')->whereBetween('date', [$monthAgo, $today])->count();
        $totalCount     = DB::table('visitors')->count();

        // Last 30 days chart data
        $chartData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $chartData[] = [
                'date'  => Carbon::parse($date)->format('d.m'),
                'count' => DB::table('visitors')->where('date', $date)->count(),
            ];
        }

        // Device breakdown
        $devices = DB::table('visitors')
            ->select('device', DB::raw('count(*) as total'))
            ->groupBy('device')
            ->get()
            ->keyBy('device');

        // Top pages (last 30 days)
        $topPages = DB::table('visitors')
            ->select('url', DB::raw('count(*) as hits'))
            ->whereBetween('date', [$monthAgo, $today])
            ->groupBy('url')
            ->orderByDesc('hits')
            ->limit(10)
            ->get();

        // Recent visitors
        $recent = DB::table('visitors')
            ->orderByDesc('id')
            ->limit(50)
            ->get();

        return view('back.visitors.index', compact(
            'todayCount', 'yesterdayCount', 'weekCount', 'monthCount', 'totalCount',
            'chartData', 'devices', 'topPages', 'recent'
        ));
    }
}
