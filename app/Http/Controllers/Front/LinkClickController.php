<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkClickController extends Controller
{
    public function track(Request $request)
    {
        $href = mb_substr($request->input('href', ''), 0, 500);
        $page = mb_substr($request->input('page', ''), 0, 500);
        $text = mb_substr(trim(strip_tags($request->input('text', ''))), 0, 200);

        if (! $href) {
            return response()->json(['ok' => false]);
        }

        // Classify link type
        if (str_starts_with($href, 'tel:')) {
            $type = 'phone';
        } elseif (str_starts_with($href, 'mailto:')) {
            $type = 'email';
        } elseif (
            str_starts_with($href, 'http') &&
            ! str_contains($href, parse_url(config('app.url'), PHP_URL_HOST) ?? 'rs-code')
        ) {
            $type = 'external';
        } else {
            $type = 'internal';
        }

        DB::table('link_clicks')->insert([
            'href'       => $href,
            'page'       => $page,
            'text'       => $text ?: null,
            'type'       => $type,
            'ip'         => $request->ip(),
            'date'       => now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['ok' => true]);
    }
}
