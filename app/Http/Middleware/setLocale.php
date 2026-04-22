<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    /**
     * Slug → language map.
     * When a visitor lands on a localized URL, the session language is updated
     * so the entire site switches to that language.
     */
    protected array $slugLang = [
        // Azerbaijani slugs — main pages
        'haqqimizda' => 'az',
        'elaqe'      => 'az',
        'xidmetler'  => 'az',
        'isler'      => 'az',
        'bloqlar'    => 'az',
        'suallar'    => 'az',
        // Azerbaijani slugs — service pages
        'veb-saytlarin-hazirlanmasi'       => 'az',
        'seo-xidmeti'                      => 'az',
        'smm-xidmeti'                      => 'az',
        'google-reklamlari'                => 'az',
        'loqo-hazirlanmasi'                => 'az',
        'texniki-destek'                   => 'az',
        'korporativ-email'                 => 'az',
        'facebook-ve-instagram-reklamlari' => 'az',
        'backlink-nedir'                   => 'az',
        'domen-nedir'                      => 'az',
        'ssl-sertifikati-nedir'            => 'az',
        'kontent-marketinq'                => 'az',
        // English slugs — service pages
        'website-development'     => 'en',
        'seo-services'            => 'en',
        'smm-services'            => 'en',
        'google-ads'              => 'en',
        'logo-design'             => 'en',
        'technical-support'       => 'en',
        'corporate-email'         => 'en',
        'facebook-instagram-ads'  => 'en',
        'what-is-backlink'        => 'en',
        'what-is-domain'          => 'en',
        'what-is-ssl-certificate' => 'en',
        'content-marketing'       => 'en',
        // Russian slugs — main pages
        'o-nas'                          => 'ru',
        'kontakty'                       => 'ru',
        'uslugi'                         => 'ru',
        'portfolio-ru'                   => 'ru',
        'blogi'                          => 'ru',
        'chasto-zadavaemye-voprosy'      => 'ru',
        // Russian slugs — service pages
        'razrabotka-sajtov'           => 'ru',
        'seo-uslugi'                  => 'ru',
        'smm-uslugi'                  => 'ru',
        'reklama-google'              => 'ru',
        'razrabotka-logo'             => 'ru',
        'tekhnicheskaya-podderzhka'   => 'ru',
        'korporativnaya-pochta'       => 'ru',
        'reklama-facebook-instagram'  => 'ru',
        'chto-takoe-backlink'         => 'ru',
        'chto-takoe-domen'            => 'ru',
        'chto-takoe-ssl-sertifikat'   => 'ru',
        'kontent-marketing'           => 'ru',
    ];

    public function handle(Request $request, Closure $next)
    {
        $path = trim($request->path(), '/');

        if (isset($this->slugLang[$path])) {
            $lang = $this->slugLang[$path];
            session(['lang' => $lang]);
            app()->setLocale($lang);
        } elseif (session()->has('lang')) {
            app()->setLocale(session('lang'));
        } else {
            app()->setLocale('az');
        }

        return $next($request);
    }
}
