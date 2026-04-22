<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoSettingsController extends Controller
{
    public function index()
    {
        $robots = DB::table('settings')->where('key', 'robots_txt')->value('value') ?? '';
        return view('back.seo.index', compact('robots'));
    }

    public function saveRobots(Request $request)
    {
        $request->validate(['robots' => 'required|string|max:10000']);

        DB::table('settings')->updateOrInsert(
            ['key' => 'robots_txt'],
            ['value' => $request->robots, 'updated_at' => now(), 'created_at' => now()]
        );

        return back()->with('success', 'robots.txt yeniləndi');
    }
}
