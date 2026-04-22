<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RobotsController extends Controller
{
    public function index()
    {
        $content = DB::table('settings')->where('key', 'robots_txt')->value('value') ?? "User-agent: *\nAllow: /\nDisallow: /admin/\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
