<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        // Skip admin, filemanager, AJAX, bot/asset requests
        if (
            $request->is('admin/*') ||
            $request->is('filemanager/*') ||
            $request->is('language/*') ||
            $request->ajax() ||
            $request->wantsJson()
        ) {
            return $next($request);
        }

        $ip   = $request->ip();
        $date = now()->toDateString();

        // One unique hit per IP per day
        $exists = DB::table('visitors')
            ->where('ip', $ip)
            ->where('date', $date)
            ->exists();

        if (! $exists) {
            $ua     = $request->userAgent() ?? '';
            $device = 'desktop';
            if (preg_match('/Mobile|Android|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i', $ua)) {
                $device = 'mobile';
            } elseif (preg_match('/iPad|Tablet/i', $ua)) {
                $device = 'tablet';
            }

            DB::table('visitors')->insert([
                'ip'         => $ip,
                'url'        => substr($request->fullUrl(), 0, 500),
                'referer'    => substr($request->header('referer', ''), 0, 500),
                'user_agent' => substr($ua, 0, 500),
                'device'     => $device,
                'date'       => $date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $next($request);
    }
}
