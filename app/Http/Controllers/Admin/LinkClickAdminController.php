<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LinkClickAdminController extends Controller
{
    public function index()
    {
        $today    = now()->toDateString();
        $monthAgo = now()->subDays(29)->toDateString();
        $weekAgo  = now()->subDays(6)->toDateString();

        $todayCount = DB::table('link_clicks')->where('date', $today)->count();
        $weekCount  = DB::table('link_clicks')->whereBetween('date', [$weekAgo, $today])->count();
        $monthCount = DB::table('link_clicks')->whereBetween('date', [$monthAgo, $today])->count();
        $totalCount = DB::table('link_clicks')->count();

        // Last 30 days chart
        $chartData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $chartData[] = [
                'date'  => Carbon::parse($date)->format('d.m'),
                'count' => DB::table('link_clicks')->where('date', $date)->count(),
            ];
        }

        // Type breakdown (last 30 days)
        $byType = DB::table('link_clicks')
            ->select('type', DB::raw('count(*) as total'))
            ->whereBetween('date', [$monthAgo, $today])
            ->groupBy('type')
            ->get()->keyBy('type');

        // Top clicked links (last 30 days)
        $topLinks = DB::table('link_clicks')
            ->select('href', 'text', 'type', DB::raw('count(*) as clicks'))
            ->whereBetween('date', [$monthAgo, $today])
            ->groupBy('href', 'text', 'type')
            ->orderByDesc('clicks')
            ->limit(20)
            ->get();

        // Top source pages (last 30 days)
        $topPages = DB::table('link_clicks')
            ->select('page', DB::raw('count(*) as clicks'))
            ->whereBetween('date', [$monthAgo, $today])
            ->whereNotNull('page')
            ->groupBy('page')
            ->orderByDesc('clicks')
            ->limit(10)
            ->get();

        // Recent clicks
        $recent = DB::table('link_clicks')
            ->orderByDesc('id')
            ->limit(100)
            ->get();

        return view('back.visitors.links', compact(
            'todayCount', 'weekCount', 'monthCount', 'totalCount',
            'chartData', 'byType', 'topLinks', 'topPages', 'recent'
        ));
    }
}
