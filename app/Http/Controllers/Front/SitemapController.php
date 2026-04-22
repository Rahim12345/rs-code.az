<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $base = rtrim(config('app.url'), '/');

        $urls = [];

        // ── Static pages ──────────────────────────────────────────────
        $statics = [
            // AZ
            ['/', 1.0, 'daily'],
            ['/haqqimizda', 0.8, 'monthly'],
            ['/elaqe', 0.7, 'monthly'],
            ['/xidmetler', 0.9, 'weekly'],
            ['/isler', 0.9, 'weekly'],
            ['/bloqlar', 0.9, 'daily'],
            ['/suallar', 0.6, 'monthly'],
            // EN
            ['/about', 0.8, 'monthly'],
            ['/contact', 0.7, 'monthly'],
            ['/services', 0.9, 'weekly'],
            ['/portfolio', 0.9, 'weekly'],
            ['/blogs', 0.9, 'daily'],
            ['/faq', 0.6, 'monthly'],
            // RU
            ['/o-nas', 0.8, 'monthly'],
            ['/kontakty', 0.7, 'monthly'],
            ['/uslugi', 0.9, 'weekly'],
            ['/portfolio-ru', 0.9, 'weekly'],
            ['/blogi', 0.9, 'daily'],
            ['/chasto-zadavaemye-voprosy', 0.6, 'monthly'],
            // Service pages
            ['/veb-saytlarin-hazirlanmasi', 0.8, 'monthly'],
            ['/website-development', 0.8, 'monthly'],
            ['/razrabotka-sajtov', 0.8, 'monthly'],
            ['/seo-xidmeti', 0.8, 'monthly'],
            ['/seo-services', 0.8, 'monthly'],
            ['/seo-uslugi', 0.8, 'monthly'],
            ['/smm-xidmeti', 0.7, 'monthly'],
            ['/smm-services', 0.7, 'monthly'],
            ['/smm-uslugi', 0.7, 'monthly'],
            ['/google-reklamlari', 0.7, 'monthly'],
            ['/google-ads', 0.7, 'monthly'],
            ['/loqo-hazirlanmasi', 0.7, 'monthly'],
            ['/logo-design', 0.7, 'monthly'],
            ['/facebook-ve-instagram-reklamlari', 0.7, 'monthly'],
            ['/facebook-instagram-ads', 0.7, 'monthly'],
            ['/texniki-destek', 0.6, 'monthly'],
            ['/technical-support', 0.6, 'monthly'],
            ['/korporativ-email', 0.6, 'monthly'],
            ['/corporate-email', 0.6, 'monthly'],
            ['/domen-nedir', 0.6, 'monthly'],
            ['/what-is-domain', 0.6, 'monthly'],
            ['/ssl-sertifikati-nedir', 0.6, 'monthly'],
            ['/what-is-ssl-certificate', 0.6, 'monthly'],
            ['/backlink-nedir', 0.6, 'monthly'],
            ['/what-is-backlink', 0.6, 'monthly'],
            ['/kontent-marketinq', 0.6, 'monthly'],
            ['/content-marketing', 0.6, 'monthly'],
        ];

        foreach ($statics as [$path, $priority, $freq]) {
            $urls[] = [
                'loc'        => $base . $path,
                'lastmod'    => now()->toDateString(),
                'changefreq' => $freq,
                'priority'   => $priority,
            ];
        }

        // ── Blogs ─────────────────────────────────────────────────────
        $blogs = DB::table('blogs')->orderByDesc('id')->get(['slug_az', 'slug_en', 'slug_ru', 'updated_at']);
        foreach ($blogs as $blog) {
            $mod = Carbon::parse($blog->updated_at)->toDateString();
            foreach (['slug_az', 'slug_en', 'slug_ru'] as $col) {
                if ($blog->$col) {
                    $urls[] = [
                        'loc'        => $base . '/blog-details/' . $blog->$col,
                        'lastmod'    => $mod,
                        'changefreq' => 'monthly',
                        'priority'   => 0.7,
                    ];
                }
            }
        }

        // ── Projects ──────────────────────────────────────────────────
        $projects = DB::table('projects')->orderByDesc('id')->get(['slug', 'slug_az', 'slug_en', 'slug_ru', 'updated_at']);
        foreach ($projects as $p) {
            $mod  = Carbon::parse($p->updated_at)->toDateString();
            $slug = $p->slug ?: $p->slug_az ?: $p->slug_en ?: null;
            if ($slug) {
                $urls[] = [
                    'loc'        => $base . '/project-details/' . $slug,
                    'lastmod'    => $mod,
                    'changefreq' => 'monthly',
                    'priority'   => 0.8,
                ];
            }
        }

        // ── Dev Notes (public) ─────────────────────────────────────────
        $notes = DB::table('notes')->orderByDesc('id')->get(['id', 'updated_at']);
        foreach ($notes as $note) {
            $urls[] = [
                'loc'        => $base . '/dev-notes/' . $note->id,
                'lastmod'    => Carbon::parse($note->updated_at)->toDateString(),
                'changefreq' => 'monthly',
                'priority'   => 0.5,
            ];
        }

        $content = view('front.sitemap', compact('urls'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
