<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Köhnə bloqların cover-ləri vahid 3 dilli brend şablonuna keçirildi
class BlogCoversSeeder extends Seeder
{
    public function run(): void
    {
        $covers = [
            'veb-sayt-qiymeti-azerbaycan-2026' => ['cover-veb-sayt-qiymeti-azerbaycan-2026-az.png', 'cover-veb-sayt-qiymeti-azerbaycan-2026-en.png', 'cover-veb-sayt-qiymeti-azerbaycan-2026-ru.png'],
            'mobil-uygun-sayt-niye-vacibdir-2026' => ['cover-mobil-uygun-sayt-niye-vacibdir-2026-az.png', 'cover-mobil-uygun-sayt-niye-vacibdir-2026-en.png', 'cover-mobil-uygun-sayt-niye-vacibdir-2026-ru.png'],
            'seo-xidmeti-azerbaycan-2026' => ['cover-seo-xidmeti-azerbaycan-2026-az.png', 'cover-seo-xidmeti-azerbaycan-2026-en.png', 'cover-seo-xidmeti-azerbaycan-2026-ru.png'],
            'mobil-tetbiqlerin-geleceyi-2026' => ['cover-mobil-tetbiqlerin-geleceyi-2026-az.png', 'cover-mobil-tetbiqlerin-geleceyi-2026-en.png', 'cover-mobil-tetbiqlerin-geleceyi-2026-ru.png'],
            'kibertehlukesizlik-kicik-biznes-ucun-esaslar' => ['cover-kibertehlukesizlik-kicik-biznes-ucun-esa-az.png', 'cover-kibertehlukesizlik-kicik-biznes-ucun-esa-en.png', 'cover-kibertehlukesizlik-kicik-biznes-ucun-esa-ru.png'],
            'suni-zeka-biznes-helleri' => ['cover-suni-zeka-biznes-helleri-az.png', 'cover-suni-zeka-biznes-helleri-en.png', 'cover-suni-zeka-biznes-helleri-ru.png'],
            'ui-ux-dizayninda-2026-trendleri' => ['cover-ui-ux-dizayninda-2026-trendleri-az.png', 'cover-ui-ux-dizayninda-2026-trendleri-en.png', 'cover-ui-ux-dizayninda-2026-trendleri-ru.png'],
            'pos-sistemi-qiymeti-azerbaycanda-2026' => ['cover-pos-sistemi-qiymeti-azerbaycanda-2026-az.png', 'cover-pos-sistemi-qiymeti-azerbaycanda-2026-en.png', 'cover-pos-sistemi-qiymeti-azerbaycanda-2026-ru.png'],
            'crm-erp-sistemleri-azerbaycanda-2026' => ['cover-crm-erp-sistemleri-azerbaycanda-2026-az.png', 'cover-crm-erp-sistemleri-azerbaycanda-2026-en.png', 'cover-crm-erp-sistemleri-azerbaycanda-2026-ru.png'],
            'lms-sistemi-qiymeti-azerbaycanda-2026' => ['cover-lms-sistemi-qiymeti-azerbaycanda-2026-az.png', 'cover-lms-sistemi-qiymeti-azerbaycanda-2026-en.png', 'cover-lms-sistemi-qiymeti-azerbaycanda-2026-ru.png'],
            'magaza-proqrami-anbar-pos-azerbaycanda-2026' => ['cover-magaza-proqrami-anbar-pos-azerbaycanda-2-az.png', 'cover-magaza-proqrami-anbar-pos-azerbaycanda-2-en.png', 'cover-magaza-proqrami-anbar-pos-azerbaycanda-2-ru.png'],
            'veb-sayt-hazirlatmazdan-evvel-12-sual' => ['cover-veb-sayt-hazirlatmazdan-evvel-12-sual-az.png', 'cover-veb-sayt-hazirlatmazdan-evvel-12-sual-en.png', 'cover-veb-sayt-hazirlatmazdan-evvel-12-sual-ru.png'],
            'restoran-ucun-pos-sistemi-nece-secilir-2026' => ['cover-restoran-ucun-pos-sistemi-nece-secilir-2-az.png', 'cover-restoran-ucun-pos-sistemi-nece-secilir-2-en.png', 'cover-restoran-ucun-pos-sistemi-nece-secilir-2-ru.png'],
        ];

        foreach ($covers as $slug => [$az, $en, $ru]) {
            DB::table('blogs')->where('slug_az', $slug)->update(['photo' => $az, 'photo_en' => $en, 'photo_ru' => $ru]);
        }
    }
}
