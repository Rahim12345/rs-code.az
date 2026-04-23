<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogDetailsController extends Controller
{
    public function index($slug)
    {
        $blog = DB::table('blogs')
            ->where('slug_az', $slug)
            ->orWhere('slug_en', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('id', is_numeric($slug) ? $slug : 0)
            ->first();

        if (!$blog) {
            abort(404);
        }

        session(['blog_lang_slugs' => [
            'az' => $blog->slug_az,
            'en' => $blog->slug_en,
            'ru' => $blog->slug_ru,
        ]]);

        return view('front.blog-details', compact('blog'));
    }
}
