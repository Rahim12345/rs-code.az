<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogDetailsController extends Controller
{
    public function index(Request $request, $slug)
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

        // Birbaşa dil keçidi: ?lang=az/en/ru — /language/ redirect-i aradan qalxır
        if ($request->filled('lang') && in_array($request->lang, ['az', 'en', 'ru'])) {
            session(['lang' => $request->lang]);
            $targetSlug = $blog->{'slug_' . $request->lang} ?? $blog->slug_az;
            if ($targetSlug !== $slug) {
                return redirect('/blog-details/' . $targetSlug);
            }
        }

        // Slug hansı dilə aiddirsə, səhifə o dildə göstərilir (Google EN/RU URL-ləri ayrıca indeksləsin)
        foreach (['az', 'en', 'ru'] as $l) {
            if ($blog->{'slug_' . $l} === $slug) {
                session(['lang' => $l]);
                app()->setLocale($l);
                break;
            }
        }

        DB::table('blogs')->where('id', $blog->id)->increment('views');

        // Header üçün birbaşa dil linklərini paylaş
        \View::share('blogLangLinks', [
            'az' => '/blog-details/' . $blog->slug_az . '?lang=az',
            'en' => '/blog-details/' . ($blog->slug_en ?: $blog->slug_az) . '?lang=en',
            'ru' => '/blog-details/' . ($blog->slug_ru ?: $blog->slug_az) . '?lang=ru',
        ]);

        return view('front.blog-details', compact('blog'));
    }
}
