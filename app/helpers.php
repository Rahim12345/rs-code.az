<?php

if (!function_exists('lurl')) {
    /**
     * Cari dilə uyğun səhifə URL-i: lurl('contact') → /elaqe | /contact | /kontakty
     */
    function lurl(string $page): string
    {
        static $map = [
            'az' => ['about' => '/haqqimizda', 'services' => '/xidmetler', 'portfolio' => '/isler',        'blogs' => '/bloqlar', 'faq' => '/suallar',                  'contact' => '/elaqe'],
            'en' => ['about' => '/about',      'services' => '/services',  'portfolio' => '/portfolio',     'blogs' => '/blogs',   'faq' => '/faq',                      'contact' => '/contact'],
            'ru' => ['about' => '/o-nas',      'services' => '/uslugi',    'portfolio' => '/portfolio-ru',  'blogs' => '/blogi',   'faq' => '/chasto-zadavaemye-voprosy', 'contact' => '/kontakty'],
        ];

        $lang = $map[app()->getLocale()] ?? $map['az'];

        return $lang[$page] ?? '/';
    }
}

if (!function_exists('pimg')) {
    /**
     * Layihə şəklinin URL-i + dəyişmə vaxtı versiyası (şəkil yenilənəndə CDN keşi köhnəni göstərməsin)
     */
    function pimg(?string $file): string
    {
        $path = public_path('images/projects/' . $file);

        return asset('images/projects/' . $file) . (is_file($path) ? '?v=' . filemtime($path) : '');
    }
}
