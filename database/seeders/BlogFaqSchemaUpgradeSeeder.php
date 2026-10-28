<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * #17 (sayt qiyməti) və #30 (restoran POS): "Qısa cavab" cədvəli, mövcud FAQ-ın
 * schema.org/FAQPage ilə işarələnməsi və daxili linklər əlavə olunur.
 * #18 (mobil uyğun sayt) tam yenidən yazılır (Mobile-Friendly Test 2023-də bağlanıb, H2 yox idi).
 *
 * Təkrar işə salmaq təhlükəsizdir: artıq işarələnmiş mətnə toxunulmur.
 * Backup: storage/app/blog{17,18,30}-backup.json (yalnız ilk dəfə yazılır).
 */
class BlogFaqSchemaUpgradeSeeder extends Seeder
{
    private const FAQ_TITLES = [
        'az' => 'Tez-tez Verilən Suallar',
        'en' => 'Frequently Asked Questions',
        'ru' => 'Часто задаваемые вопросы',
    ];

    public function run(): void
    {
        $this->backup([17, 18, 30]);

        $this->upgradeBlog17();
        $this->upgradeBlog30();
        $this->rewriteBlog18();
    }

    private function backup(array $ids): void
    {
        foreach ($ids as $id) {
            $file = "blog{$id}-backup.json";
            if (Storage::disk('local')->exists($file)) {
                continue;
            }
            $row = DB::table('blogs')->where('id', $id)->first();
            if ($row) {
                Storage::disk('local')->put($file, json_encode($row, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            }
        }
    }

    // ---------------------------------------------------------------------
    // #17 — Veb sayt qiyməti
    // ---------------------------------------------------------------------
    private function upgradeBlog17(): void
    {
        $quick = [
            'az' => $this->quickTable('Qısa Cavab', ['Sual', 'Cavab'], [
                ['Sayt neçəyə başa gəlir?', 'Landing page 300–700 AZN, vizit sayt 500–1 200 AZN, korporativ sayt 1 200–3 500 AZN, onlayn mağaza 2 000–6 000 AZN, fərdi platforma 5 000+ AZN'],
                ['Neçə günə hazır olur?', 'Landing page 5–10 gün, vizit sayt 1–2 həftə, korporativ sayt 2–4 həftə, onlayn mağaza 3–6 həftə'],
                ['İllik əlavə xərclər', 'Domen 20–60 AZN, hostinq 70–250 AZN, korporativ e-poçt 50–120 AZN'],
                ['Qiyməti nə dəyişir?', 'Sayt növü, fərdi dizayn, dil sayı (hər dil təxminən +15–25%), funksiyalar, SEO və təhvildən sonrakı dəstək'],
            ]),
            'en' => $this->quickTable('Quick Answer', ['Question', 'Answer'], [
                ['How much does a website cost?', 'Landing page AZN 300–700, business card site AZN 500–1,200, corporate site AZN 1,200–3,500, online store AZN 2,000–6,000, custom platform AZN 5,000+'],
                ['How long does it take?', 'Landing page 5–10 days, small business site 1–2 weeks, corporate site 2–4 weeks, online store 3–6 weeks'],
                ['Yearly extra costs', 'Domain AZN 20–60, hosting AZN 70–250, business email AZN 50–120'],
                ['What changes the price?', 'Site type, custom design, number of languages (about +15–25% per language), features, SEO and post-launch support'],
            ]),
            'ru' => $this->quickTable('Краткий ответ', ['Вопрос', 'Ответ'], [
                ['Сколько стоит сайт?', 'Лендинг 300–700 AZN, сайт-визитка 500–1 200 AZN, корпоративный сайт 1 200–3 500 AZN, интернет-магазин 2 000–6 000 AZN, индивидуальная платформа от 5 000 AZN'],
                ['Сроки разработки', 'Лендинг 5–10 дней, сайт-визитка 1–2 недели, корпоративный сайт 2–4 недели, интернет-магазин 3–6 недель'],
                ['Ежегодные расходы', 'Домен 20–60 AZN, хостинг 70–250 AZN, корпоративная почта 50–120 AZN'],
                ['От чего зависит цена?', 'Тип сайта, индивидуальный дизайн, количество языков (примерно +15–25% за язык), функции, SEO и поддержка после сдачи'],
            ]),
        ];

        $related = [
            'az' => $this->relatedBlock('Bunları da oxuyun', [
                ['/blog-details/landing-page-nedir-2026', 'Landing page nədir və nə vaxt lazımdır?'],
                ['/blog-details/wix-tilda-wordpress-vs-sifarisle-sayt-2026', 'Wix, Tilda, WordPress yoxsa sifarişlə sayt?'],
                ['/blog-details/onlayn-magaza-nece-acilir-2026', 'Onlayn mağaza necə açılır?'],
                ['/blog-details/veb-sayt-hazirlatmazdan-evvel-12-sual', 'Sayt hazırlatmazdan əvvəl soruşulmalı 12 sual'],
                ['/blog-details/brif-nece-doldurulur-2026', 'Brif necə doldurulur?'],
                ['/veb-saytlarin-hazirlanmasi', 'Veb saytların hazırlanması xidməti'],
            ]),
            'en' => $this->relatedBlock('Read next', [
                ['/blog-details/what-is-a-landing-page-2026', 'What is a landing page and when do you need one?'],
                ['/blog-details/wix-vs-tilda-vs-wordpress-vs-custom-website-2026', 'Wix, Tilda, WordPress or a custom website?'],
                ['/blog-details/how-to-start-online-store-azerbaijan-2026', 'How to start an online store in Azerbaijan'],
                ['/blog-details/12-questions-before-building-website-2026', '12 questions to ask before building a website'],
                ['/blog-details/how-to-write-project-brief-2026', 'How to write a project brief'],
                ['/website-development', 'Website development service'],
            ]),
            'ru' => $this->relatedBlock('Читайте также', [
                ['/blog-details/chto-takoe-lending-2026', 'Что такое лендинг и когда он нужен?'],
                ['/blog-details/wix-tilda-wordpress-ili-sajt-na-zakaz-2026', 'Wix, Tilda, WordPress или сайт на заказ?'],
                ['/blog-details/kak-otkryt-internet-magazin-v-azerbajdzhane-2026', 'Как открыть интернет-магазин в Азербайджане'],
                ['/blog-details/12-voprosov-pered-sozdaniem-sajta-2026', '12 вопросов перед созданием сайта'],
                ['/blog-details/kak-zapolnit-brif-2026', 'Как заполнить бриф'],
                ['/razrabotka-sajtov', 'Услуга разработки сайтов'],
            ]),
        ];

        $this->upgrade(17, $quick, $related, []);
    }

    // ---------------------------------------------------------------------
    // #30 — Restoran üçün POS
    // ---------------------------------------------------------------------
    private function upgradeBlog30(): void
    {
        $intro = [
            'az' => '<p>Restoran üçün POS seçəndə əsas sual qiymət deyil, sistemin zalın, mətbəxin və çatdırılmanın iş axınına uyğun olub-olmamasıdır. Aşağıda hazır sistemləri müqayisə edir, seçim meyarlarını və almadan əvvəl verilməli sualları sadalayırıq.</p>',
            'en' => '<p>When choosing a restaurant POS, the key question is not the price but whether the system fits how your floor, kitchen and delivery actually work. Below we compare ready-made systems, list the selection criteria and the questions to ask before you buy.</p>',
            'ru' => '<p>При выборе POS для ресторана главный вопрос — не цена, а то, насколько система подходит под работу зала, кухни и доставки. Ниже сравниваем готовые системы, перечисляем критерии выбора и вопросы, которые стоит задать до покупки.</p>',
        ];

        $quick = [
            'az' => $this->quickTable('Qısa Cavab', ['Sual', 'Cavab'], [
                ['Restoran POS-unda nə mütləqdir?', 'Masa planı, aşbazxana ekranı (KDS), ofisiant tətbiqi, resept üzrə anbar silinməsi, oflayn rejim və e-kassa inteqrasiyası'],
                ['Hazır POS aylıq neçəyədir?', 'Təxminən ₼50–200 (yerli sistemlər), ₼200–600 (iiko, r_keeper)'],
                ['Sifarişlə POS neçəyədir?', 'Birdəfəlik təxminən ₼3 000–10 000, funksiyalardan asılı'],
                ['Aparat xərci', 'Kiçik restoran üçün ₼1 000–2 500 (kassa planşeti, printer, KDS ekranı, ofisiant planşetləri)'],
            ]),
            'en' => $this->quickTable('Quick Answer', ['Question', 'Answer'], [
                ['Must-have restaurant POS features', 'Table plan, kitchen display (KDS), waiter app, recipe-based stock deduction, offline mode and e-kassa (fiscal) integration'],
                ['Ready-made POS monthly price', 'About ₼50–200 (local systems), ₼200–600 (iiko, r_keeper)'],
                ['Custom POS price', 'About ₼3,000–10,000 one-time, depending on features'],
                ['Hardware cost', '₼1,000–2,500 for a small restaurant (POS tablet, printer, KDS screen, waiter tablets)'],
            ]),
            'ru' => $this->quickTable('Краткий ответ', ['Вопрос', 'Ответ'], [
                ['Что обязательно в ресторанной POS?', 'План зала, кухонный экран (KDS), приложение официанта, списание по рецептуре, офлайн-режим и интеграция с e-kassa'],
                ['Готовая POS в месяц', 'Примерно ₼50–200 (местные системы), ₼200–600 (iiko, r_keeper)'],
                ['POS на заказ', 'Примерно ₼3 000–10 000 единоразово, в зависимости от функций'],
                ['Оборудование', '₼1 000–2 500 для небольшого ресторана (кассовый планшет, принтер, экран KDS, планшеты официантов)'],
            ]),
        ];

        $extraFaq = [
            'az' => [[
                'POS sistemi e-kassa ilə inteqrasiya olunmalıdırmı?',
                '<p>Bəli, tövsiyə olunur. Azərbaycanda satış çekləri onlayn nəzarət-kassa aparatı (e-kassa) vasitəsilə vurulur. POS e-kassa ilə inteqrasiya olunmayanda hər satış iki yerdə daxil edilir, vaxt itir və POS hesabatı ilə kassa məlumatları arasında fərq yaranır. Ətraflı: <a href="/blog-details/e-kassa-pos-inteqrasiyasi-2026">E-kassa və POS inteqrasiyası</a>.</p>',
            ]],
            'en' => [[
                'Should the POS be integrated with e-kassa?',
                '<p>Yes, it is recommended. In Azerbaijan, sales receipts are issued through an online fiscal cash register (e-kassa). Without integration, every sale is entered twice, staff lose time and POS reports drift from the fiscal data. More: <a href="/blog-details/e-kassa-pos-integration-azerbaijan-2026">E-kassa and POS integration</a>.</p>',
            ]],
            'ru' => [[
                'Нужна ли интеграция POS с e-kassa?',
                '<p>Да, рекомендуется. В Азербайджане чеки выдаются через онлайн контрольно-кассовый аппарат (e-kassa). Без интеграции каждая продажа вводится дважды, теряется время и отчёты POS расходятся с фискальными данными. Подробнее: <a href="/blog-details/e-kassa-integraciya-s-pos-2026">Интеграция e-kassa и POS</a>.</p>',
            ]],
        ];

        $related = [
            'az' => $this->relatedBlock('Bunları da oxuyun', [
                ['/blog-details/pos-sistemi-qiymeti-azerbaycanda-2026', 'POS sistemi qiyməti: hazır vs sifarişlə'],
                ['/blog-details/e-kassa-pos-inteqrasiyasi-2026', 'E-kassa və POS inteqrasiyası'],
                ['/blog-details/qr-menyu-kafe-restoran-2026', 'Kafe və restoran üçün QR menyu'],
                ['/blog-details/fifo-maya-deyeri-nedir-2026', 'FIFO maya dəyəri nədir?'],
                ['/mehsullar/rspos', 'RS POS — restoran və mağaza üçün POS'],
            ]),
            'en' => $this->relatedBlock('Read next', [
                ['/blog-details/pos-system-price-azerbaijan-2026', 'POS system price: ready-made vs custom'],
                ['/blog-details/e-kassa-pos-integration-azerbaijan-2026', 'E-kassa and POS integration'],
                ['/blog-details/qr-menu-for-cafe-restaurant-2026', 'QR menu for cafes and restaurants'],
                ['/blog-details/what-is-fifo-cost-method-2026', 'What is the FIFO cost method?'],
                ['/mehsullar/rspos', 'RS POS — POS for restaurants and shops'],
            ]),
            'ru' => $this->relatedBlock('Читайте также', [
                ['/blog-details/stoimost-pos-sistemy-azerbaydzhan-2026', 'Цена POS-системы: готовая или на заказ'],
                ['/blog-details/e-kassa-integraciya-s-pos-2026', 'Интеграция e-kassa и POS'],
                ['/blog-details/qr-menyu-dlya-kafe-i-restorana-2026', 'QR-меню для кафе и ресторана'],
                ['/blog-details/chto-takoe-fifo-sebestoimost-2026', 'Что такое себестоимость по FIFO?'],
                ['/mehsullar/rspos', 'RS POS — POS для ресторанов и магазинов'],
            ]),
        ];

        $this->upgrade(30, $quick, $related, $extraFaq, $intro);
    }

    /**
     * Mövcud mətnə qısa cavab, schema FAQ və əlaqəli linklər əlavə edir.
     */
    private function upgrade(int $id, array $quick, array $related, array $extraFaq, array $intro = []): void
    {
        $row = DB::table('blogs')->where('id', $id)->first();
        if (! $row) {
            $this->command?->warn("Blog #{$id} tapılmadı");
            return;
        }

        $update = [];
        foreach (['az', 'en', 'ru'] as $lang) {
            $html = $row->{"text_{$lang}"} ?? '';
            if ($html === '' || str_contains($html, 'schema.org/FAQPage')) {
                continue;
            }

            $faq = $this->convertFaq($html, $lang, $extraFaq[$lang] ?? [], $related[$lang]);
            if ($faq === null) {
                $this->command?->warn("Blog #{$id} [{$lang}]: FAQ bölməsi tapılmadı, keçildi");
                continue;
            }

            $update["text_{$lang}"] = $this->insertBeforeFirstH2($faq, ($intro[$lang] ?? '') . $quick[$lang]);
        }

        if ($update) {
            $update['updated_at'] = now();
            DB::table('blogs')->where('id', $id)->update($update);
            $this->command?->info("Blog #{$id}: " . implode(', ', array_keys($update)));
        }
    }

    /**
     * FAQ başlığını (h2–h4) tapır, altındakı sual-cavabları schema ilə yenidən qurur.
     * Bölmə eyni və ya daha yüksək səviyyəli növbəti başlığa qədər davam edir.
     */
    private function convertFaq(string $html, string $lang, array $extra, string $relatedHtml): ?string
    {
        $pattern = '/<h([2-4])\b[^>]*>(?:\s*<[^>]+>)*\s*(?:Tez-tez|Frequently|Часто)[^<]*(?:<\/[a-z]+>\s*)*?<\/h\1>/iu';
        if (! preg_match($pattern, $html, $m, PREG_OFFSET_CAPTURE)) {
            return null;
        }

        $level  = (int) $m[1][0];
        $start  = $m[0][1];
        $bodyAt = $start + strlen($m[0][0]);

        $end = strlen($html);
        if (preg_match('/<h[2-' . $level . ']\b/i', $html, $n, PREG_OFFSET_CAPTURE, $bodyAt)) {
            $end = $n[0][1];
        }
        $body = substr($html, $bodyAt, $end - $bodyAt);

        // Sual başlıqları: FAQ başlığından bir səviyyə aşağı (h3 və ya h4)
        $q = $level + 1;
        $parts = preg_split('/(<h' . $q . '\b[^>]*>.*?<\/h' . $q . '>)/isu', $body, -1, PREG_SPLIT_DELIM_CAPTURE);

        $items = [];
        for ($i = 1; $i < count($parts); $i += 2) {
            $question = trim(html_entity_decode(strip_tags($parts[$i]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $answer   = $this->cleanAnswer($parts[$i + 1] ?? '');
            if ($question !== '' && $answer !== '') {
                $items[] = [$question, $answer];
            }
        }
        if (! $items) {
            return null;
        }
        $items = array_merge($items, $extra);

        $faqHtml = $this->faqBlock($lang, $items) . $relatedHtml;

        return substr($html, 0, $start) . $faqHtml . substr($html, $end);
    }

    private function cleanAnswer(string $html): string
    {
        $html = preg_replace('/<span\b[^>]*>|<\/span>/i', '', $html);
        $html = preg_replace('/\s(style|lang|dir)="[^"]*"/i', '', $html);
        $html = str_replace('&nbsp;', ' ', $html);

        return trim($html);
    }

    private function insertBeforeFirstH2(string $html, string $block): string
    {
        if (preg_match('/<h2\b/i', $html, $m, PREG_OFFSET_CAPTURE)) {
            return substr($html, 0, $m[0][1]) . $block . substr($html, $m[0][1]);
        }

        return $block . $html;
    }

    private function quickTable(string $title, array $head, array $rows): string
    {
        $out = "<h2>{$title}</h2>\n<table>\n  <thead><tr><th>{$head[0]}</th><th>{$head[1]}</th></tr></thead>\n  <tbody>\n";
        foreach ($rows as [$a, $b]) {
            $out .= "    <tr><td>{$a}</td><td>{$b}</td></tr>\n";
        }

        return $out . "  </tbody>\n</table>\n";
    }

    private function faqBlock(string $lang, array $items): string
    {
        $out = '<h2>' . self::FAQ_TITLES[$lang] . "</h2>\n<div itemscope itemtype=\"https://schema.org/FAQPage\">\n";
        foreach ($items as [$question, $answer]) {
            $out .= "  <div itemscope itemprop=\"mainEntity\" itemtype=\"https://schema.org/Question\">\n"
                . '    <h3 itemprop="name">' . e($question) . "</h3>\n"
                . "    <div itemscope itemprop=\"acceptedAnswer\" itemtype=\"https://schema.org/Answer\">\n"
                . '      <div itemprop="text">' . (str_starts_with($answer, '<') ? $answer : "<p>{$answer}</p>") . "</div>\n"
                . "    </div>\n  </div>\n";
        }

        return $out . "</div>\n";
    }

    private function relatedBlock(string $title, array $links): string
    {
        $out = "<h3>{$title}</h3>\n<ul>\n";
        foreach ($links as [$href, $text]) {
            $out .= "  <li><a href=\"{$href}\">{$text}</a></li>\n";
        }

        return $out . "</ul>\n";
    }

    // ---------------------------------------------------------------------
    // #18 — Mobil uyğun sayt (tam yenidən yazılır)
    // ---------------------------------------------------------------------
    private function rewriteBlog18(): void
    {
        $row = DB::table('blogs')->where('id', 18)->first();
        if (! $row) {
            return;
        }
        if (str_contains($row->text_az ?? '', 'schema.org/FAQPage')) {
            return;
        }

        $faq = [
            'az' => [
                ['Saytım 5 il əvvəl hazırlanıb və mobil uyğun deyil. Yenisini sıfırdan hazırlatmaq lazımdır?', 'Mütləq deyil. Sayt WordPress və ya oxşar sistemdədirsə, responsive dizayn əlavə etmək adətən 2–3 həftəlik işdir və 400–1 200 AZN arası başa gəlir. Kod çox köhnədirsə və sayt həm də yavaşdırsa, yenisini qurmaq çox vaxt daha sərfəlidir.'],
                ['Google Mobile-Friendly Test hələ işləyir?', 'Xeyr. Google bu aləti və Search Console-dakı "Mobile Usability" hesabatını 2023-cü ilin dekabrında bağladı. Bunun əvəzinə PageSpeed Insights, Chrome-dakı Lighthouse və Search Console-dakı Core Web Vitals hesabatından istifadə edin.'],
                ['Ayrıca m.sayt.az versiyası pisdir?', 'Google ayrıca mobil URL-ləri cəzalandırmır, amma onları düzgün saxlamaq çətindir: iki versiyada eyni məzmun, düzgün yönləndirmə və canonical lazımdır. Google tövsiyə etdiyi və saxlaması ən asan yol responsive dizayndır: bir URL, bir kod, bütün ekranlar.'],
                ['Mobil uyğunlaşdırma saytı yavaşladır?', 'Əksinə. Düzgün qurulmuş responsive saytda şəkillər ekran ölçüsünə görə yüklənir və lazımsız kod azalır, ona görə telefonlarda daha tez açılır.'],
                ['Mobil sayt yoxsa mobil tətbiq?', 'Əksər bizneslər üçün əvvəlcə yaxşı mobil sayt kifayətdir: Google-dan tapılır və yükləmə tələb etmir. Tətbiq tez-tez təkrar istifadə, bildirişlər və ya cihaz funksiyaları lazım olanda sərfəlidir. Ətraflı: <a href="/blog-details/mobil-tetbiq-yoxsa-mobil-sayt-2026">mobil tətbiq yoxsa mobil sayt</a>.'],
                ['Saytımı pulsuz yoxlaya bilərsiniz?', 'Bəli. RS Code saytınızın mobil görünüşünü və sürətini pulsuz yoxlayır, problemləri və həll yollarını izah edir. <a href="/elaqe">Bizə yazın</a>.'],
            ],
            'en' => [
                ['My site is 5 years old and not mobile-friendly. Do I need a brand-new one?', 'Not necessarily. If the site runs on WordPress or a similar CMS, adding responsive design usually takes 2–3 weeks and costs AZN 400–1,200. If the code is very outdated and the site is also slow, a rebuild is often the better investment.'],
                ['Does Google\'s Mobile-Friendly Test still work?', 'No. Google retired the tool and the Search Console "Mobile Usability" report in December 2023. Use PageSpeed Insights, Lighthouse in Chrome and the Core Web Vitals report in Search Console instead.'],
                ['Is a separate m.site version bad?', 'Google does not penalise separate mobile URLs, but they are hard to maintain: both versions need the same content, correct redirects and canonical tags. Responsive design is what Google recommends and it is the easiest to maintain: one URL, one codebase, every screen.'],
                ['Will making the site mobile-friendly slow it down?', 'The opposite. A well-built responsive site loads images sized for the screen and ships less unnecessary code, so it opens faster on phones.'],
                ['Mobile website or mobile app?', 'For most businesses a good mobile website comes first: it is found on Google and needs no download. An app pays off when you need frequent repeat use, push notifications or device features. More: <a href="/blog-details/mobile-app-vs-mobile-website-2026">mobile app vs mobile website</a>.'],
                ['Can you check my site for free?', 'Yes. RS Code checks your site\'s mobile layout and speed for free and explains the problems and fixes. <a href="/contact">Contact us</a>.'],
            ],
            'ru' => [
                ['Сайту 5 лет, он не адаптирован. Нужно делать новый с нуля?', 'Не обязательно. Если сайт на WordPress или похожей CMS, адаптивный дизайн обычно добавляется за 2–3 недели и стоит 400–1 200 AZN. Если код сильно устарел и сайт ещё и медленный, новый сайт часто выгоднее.'],
                ['Работает ли ещё Google Mobile-Friendly Test?', 'Нет. Google закрыл этот инструмент и отчёт «Удобство для мобильных» в Search Console в декабре 2023 года. Вместо них используйте PageSpeed Insights, Lighthouse в Chrome и отчёт Core Web Vitals в Search Console.'],
                ['Плоха ли отдельная версия m.sayt.az?', 'Google не наказывает за отдельные мобильные URL, но их сложно поддерживать: нужен одинаковый контент, правильные редиректы и canonical. Google рекомендует адаптивный дизайн — его проще всего поддерживать: один URL, один код, все экраны.'],
                ['Адаптация замедлит сайт?', 'Наоборот. Правильно сделанный адаптивный сайт загружает изображения под размер экрана и меньше лишнего кода, поэтому на телефонах открывается быстрее.'],
                ['Мобильный сайт или приложение?', 'Для большинства компаний сначала нужен хороший мобильный сайт: его находят в Google и не нужно ничего скачивать. Приложение окупается, когда нужны частое повторное использование, push-уведомления или функции устройства. Подробнее: <a href="/blog-details/mobilnoe-prilozhenie-ili-sajt-2026">приложение или мобильный сайт</a>.'],
                ['Можете бесплатно проверить мой сайт?', 'Да. RS Code бесплатно проверит мобильную версию и скорость сайта и объяснит проблемы и способы решения. <a href="/kontakty">Напишите нам</a>.'],
            ],
        ];

        $textAz = <<<'HTML'
<p>Telefonunuzu götürün və saytınızı Google-da axtarın. Açılan səhifədə mətn kiçikdirsə, düymələr bir-birinə yapışıbsa və ya şəkillər ekrandan çıxırsa, hər gün müştəri itirirsiniz. Müştərilərin böyük hissəsi bizneslə ilk dəfə telefondan tanış olur: Google axtarışı, Instagram linki, WhatsApp-da göndərilən ünvan.</p>
<p>Bu yazıda mobil uyğun saytın nə olduğunu, Google-un saytları niyə mobil versiyaya görə qiymətləndirdiyini, saytınızı 5 dəqiqədə necə yoxlaya biləcəyinizi və düzəlişin təxminən neçəyə başa gəldiyini izah edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead><tr><th>Sual</th><th>Cavab</th></tr></thead>
  <tbody>
    <tr><td>Mobil uyğun sayt nədir?</td><td>Telefon, planşet və kompüterdə eyni URL ilə rahat oxunan və istifadə olunan sayt (responsive dizayn)</td></tr>
    <tr><td>Niyə vacibdir?</td><td>Google saytları əsasən mobil versiyaya görə indeksləyir; telefonda pis işləyən sayt həm sıralamada, həm də müraciətlərdə itirir</td></tr>
    <tr><td>Necə yoxlamaq olar?</td><td>PageSpeed Insights, Chrome Lighthouse və öz telefonunuzda 2 dəqiqəlik test. Google Mobile-Friendly Test 2023-də bağlanıb</td></tr>
    <tr><td>Neçəyə başa gəlir?</td><td>Mövcud saytı uyğunlaşdırmaq təxminən 400–1 200 AZN, yeni sayt 500–3 500 AZN</td></tr>
  </tbody>
</table>

<h2>Mobil Uyğun Sayt Nədir?</h2>
<p>Mobil uyğun (responsive) sayt ekran ölçüsünə görə özünü dəyişir: telefonda menyu yığılır, sütunlar alt-alta düzülür, şəkillər ekrana sığır, düymələr barmaqla rahat basılır. Bunun üçün ayrıca "m.sayt.az" versiyası lazım deyil. Bir URL və bir kod bütün cihazlarda işləyir.</p>
<p>Texniki tərəfdən bu, səhifədə <code>viewport</code> teqi, çevik tor (grid) və ekran ölçüsünə görə dəyişən CSS qaydaları deməkdir. Amma müştəri üçün nəticə sadədir: saytı yaxınlaşdırmadan oxuyur və bir toxunuşla zəng edir.</p>

<h2>Google Saytınızı Niyə Mobil Versiyaya Görə Qiymətləndirir?</h2>
<p>Google "mobile-first" indeksləməyə keçidi 2023-cü ildə tamamladı. Bu o deməkdir ki, Google saytınızı əsasən smartfon brauzerinin gördüyü kimi tarayır və indeksləyir. Mobil versiyada olmayan mətn, şəkil və ya keçid Google üçün faktiki olaraq yoxdur.</p>
<p>Bundan başqa Google səhifə təcrübəsini <strong>Core Web Vitals</strong> göstəriciləri ilə ölçür:</p>
<ul>
  <li><strong>LCP</strong> (əsas məzmunun yüklənməsi): 2,5 saniyədən az olmalıdır.</li>
  <li><strong>INP</strong> (toxunuşa cavab sürəti): 200 millisaniyədən az olmalıdır.</li>
  <li><strong>CLS</strong> (səhifənin "sürüşməsi"): 0,1-dən az olmalıdır.</li>
</ul>
<p>Bu göstəricilər telefonlarda adətən daha pis olur, çünki şəbəkə və prosessor zəifdir. Ətraflı: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">sayt sürəti və Core Web Vitals</a>.</p>

<h2>Mobil Uyğun Saytın 6 Əsas Faydası</h2>
<h3>1. Google-da görünmə</h3>
<p>Mobil versiya indeksləmənin əsasıdır. Telefonda kəsilən, gizlədilən və ya yavaş açılan məzmun sıralamada geri qalır.</p>
<h3>2. Daha az tərk</h3>
<p>Google-un 2016-cı il araşdırmasına görə, mobil səhifə 3 saniyədən çox yüklənəndə ziyarətlərin 53%-i tərk edilir. Hər saniyə müştəri itkisidir.</p>
<h3>3. Daha çox zəng və müraciət</h3>
<p>Telefonda "Zəng et", "WhatsApp" və qısa forma ən sürətli müraciət yoludur. Bu düymələr kiçikdirsə və ya tapılmırsa, müştəri rəqibin saytına keçir. Bax: <a href="/blog-details/sayt-niye-muraciet-getirmir-ux-audit-2026">sayt niyə müraciət gətirmir</a>.</p>
<h3>4. Reklamdan daha çox nəticə</h3>
<p>Google Ads-də açılış səhifəsinin keyfiyyəti Quality Score-a təsir edir. Telefonda pis işləyən səhifə eyni büdcə ilə daha az müraciət gətirir. Bax: <a href="/blog-details/google-ads-azerbaycan-2027">Google Ads Azərbaycanda</a>.</p>
<h3>5. Sosial şəbəkə trafiki</h3>
<p>Instagram, Facebook və WhatsApp-da paylaşılan linkləri insanlar demək olar ki, həmişə telefondan açır. Bu trafiki itirməmək üçün sayt telefonda rahat olmalıdır.</p>
<h3>6. Etibar</h3>
<p>Telefonda dağınıq görünən sayt köhnə və etibarsız təsir bağışlayır. Müştəri bunu birbaşa şirkətin işinə aid edir.</p>

<h2>Saytınızı 5 Dəqiqədə Necə Yoxlamaq Olar?</h2>
<p>Google-un köhnə Mobile-Friendly Test aləti və Search Console-dakı "Mobile Usability" hesabatı 2023-cü ilin dekabrında bağlanıb. İndi bu üsullardan istifadə edin:</p>
<ol>
  <li><strong>PageSpeed Insights</strong> (pagespeed.web.dev): saytın ünvanını yazın və "Mobil" nəticəsinə baxın. Performans 50-dən aşağıdırsa, ciddi problem var; 90+ yaxşıdır.</li>
  <li><strong>Chrome Lighthouse</strong>: saytı Chrome-da açın, F12 → Lighthouse → "Mobile" seçib yoxlayın. Kiçik düymələr və oxunmayan mətn kimi problemləri göstərir.</li>
  <li><strong>Search Console</strong>: "Core Web Vitals" hesabatında mobil səhifələrin real istifadəçi məlumatlarına görə vəziyyətinə baxın.</li>
  <li><strong>Öz telefonunuz</strong>: saytı açın və yoxlayın: mətni yaxınlaşdırmadan oxuyursunuz? Menyu açılır? Telefon nömrəsinə toxunanda zəng başlayır? Forma rahat doldurulur? Səhifə yüklənərkən elementlər yerindən oynayır?</li>
</ol>

<h2>Mobil Uyğun Saytda Olmalı 10 Element</h2>
<table>
  <thead><tr><th>Element</th><th>Tələb</th></tr></thead>
  <tbody>
    <tr><td>Viewport teqi</td><td><code>&lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;</code></td></tr>
    <tr><td>Mətn ölçüsü</td><td>Əsas mətn ən azı 16px, yaxınlaşdırmadan oxunur</td></tr>
    <tr><td>Düymələr</td><td>Toxunma sahəsi təxminən 48×48px, aralarında boşluq</td></tr>
    <tr><td>Menyu</td><td>Qısa, bir toxunuşla açılan menyu</td></tr>
    <tr><td>Zəng düyməsi</td><td><code>tel:</code> linki, ekranda asan tapılır</td></tr>
    <tr><td>Formalar</td><td>Az sahə, düzgün klaviatura (telefon, e-poçt), avtomatik doldurma</td></tr>
    <tr><td>Şəkillər</td><td>WebP/AVIF, ekran ölçüsünə görə, "lazy loading"</td></tr>
    <tr><td>Üfüqi sürüşmə</td><td>Olmamalıdır: məzmun ekrandan çıxmır</td></tr>
    <tr><td>Açılan pəncərələr</td><td>Əsas məzmunu örtən böyük popup-lar olmamalıdır</td></tr>
    <tr><td>Eyni məzmun</td><td>Kompüterdəki vacib mətn, şəkil və linklər mobildə də var</td></tr>
  </tbody>
</table>

<h2>Mobil Uyğunlaşdırma Neçəyə Başa Gəlir?</h2>
<table>
  <thead><tr><th>Variant</th><th>Təxmini qiymət</th><th>Nə vaxt uyğundur?</th></tr></thead>
  <tbody>
    <tr><td>Mövcud saytı uyğunlaşdırmaq</td><td>400–1 200 AZN</td><td>Sayt nisbətən yenidir, kodu və dizaynı saxlamağa dəyər</td></tr>
    <tr><td>Yeni sayt</td><td>500–3 500 AZN</td><td>Sayt 5+ ildir dəyişməyib, yavaşdır, dizayn köhnəlib</td></tr>
    <tr><td>Mobil tətbiq</td><td>Ayrıca layihə</td><td>Tez-tez təkrar istifadə, bildirişlər, cihaz funksiyaları lazımdır</td></tr>
  </tbody>
</table>
<p>Qiymətlər sayt növünə, səhifə sayına və dil sayına görə dəyişir. Ətraflı: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">veb sayt qiyməti Azərbaycanda</a>. Saytın yenilənmə vaxtının çatdığını göstərən digər əlamətlər üçün bax: <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">saytı yeniləmə vaxtı: 7 əlamət</a>.</p>
<p>RS Code-da hər layihə əvvəlcə mobil versiyadan dizayn olunur, sonra böyük ekranlara uyğunlaşdırılır. Təhvildən əvvəl sayt real telefonlarda və PageSpeed Insights-da yoxlanılır.</p>

%FAQ%

<h2>Yekun</h2>
<p>Mobil uyğun sayt artıq əlavə seçim deyil. Müştəri sizi telefondan tapır, Google saytınızı mobil versiyaya görə indeksləyir, reklam büdcəniz də telefonda açılan səhifənin keyfiyyətindən asılıdır. Yuxarıdakı 4 yoxlamanı bu gün edin: problem varsa, onu düzəltmək çox vaxt yeni sayt qurmaqdan ucuz başa gəlir.</p>
<p><strong>Saytınızın mobil versiyasını pulsuz yoxlatmaq istəyirsiniz? <a href="/elaqe">Bizə yazın</a></strong>. Ətraflı: <a href="/veb-saytlarin-hazirlanmasi">veb saytların hazırlanması</a>.</p>
<p><small><em>Qiymətlər Azərbaycan bazarı üçün təxmini aralıqlardır (oktyabr 2026). Mobile-first indeksləmə, Core Web Vitals hədləri və Mobile-Friendly Test-in bağlanması haqqında məlumat Google Search Central rəsmi sənədlərinə əsaslanır.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>Pick up your phone and search for your website on Google. If the text is tiny, buttons are crammed together or images spill off the screen, you are losing customers every day. Most people meet a business on their phone first: a Google search, an Instagram link, an address sent on WhatsApp.</p>
<p>This article explains what a mobile-friendly website is, why Google evaluates sites by their mobile version, how to check your site in 5 minutes and roughly what a fix costs.</p>

<h2>Quick Answer</h2>
<table>
  <thead><tr><th>Question</th><th>Answer</th></tr></thead>
  <tbody>
    <tr><td>What is a mobile-friendly site?</td><td>A site that is easy to read and use on phones, tablets and desktops from the same URL (responsive design)</td></tr>
    <tr><td>Why does it matter?</td><td>Google indexes sites mainly by their mobile version; a site that works poorly on phones loses both rankings and enquiries</td></tr>
    <tr><td>How to check?</td><td>PageSpeed Insights, Chrome Lighthouse and a 2-minute test on your own phone. Google's Mobile-Friendly Test was retired in 2023</td></tr>
    <tr><td>How much does it cost?</td><td>Adapting an existing site about AZN 400–1,200; a new site AZN 500–3,500</td></tr>
  </tbody>
</table>

<h2>What Is a Mobile-Friendly Website?</h2>
<p>A mobile-friendly (responsive) website adapts to the screen: on a phone the menu collapses, columns stack, images fit the screen and buttons are easy to tap. You do not need a separate "m.site" version. One URL and one codebase work on every device.</p>
<p>Technically this means a <code>viewport</code> tag, a flexible grid and CSS rules that change with screen size. For the customer the result is simple: they read without zooming and call with one tap.</p>

<h2>Why Does Google Evaluate Your Site by Its Mobile Version?</h2>
<p>Google completed the move to mobile-first indexing in 2023. It now crawls and indexes your site mainly the way a smartphone browser sees it. Text, images or links missing from the mobile version effectively do not exist for Google.</p>
<p>Google also measures page experience with <strong>Core Web Vitals</strong>:</p>
<ul>
  <li><strong>LCP</strong> (main content load): under 2.5 seconds.</li>
  <li><strong>INP</strong> (response to taps): under 200 milliseconds.</li>
  <li><strong>CLS</strong> (layout shift): under 0.1.</li>
</ul>
<p>These scores are usually worse on phones because networks and processors are weaker. More: <a href="/blog-details/website-speed-core-web-vitals-2026">website speed and Core Web Vitals</a>.</p>

<h2>6 Key Benefits of a Mobile-Friendly Website</h2>
<h3>1. Visibility on Google</h3>
<p>The mobile version is the basis of indexing. Content that is cut, hidden or slow on phones falls behind in rankings.</p>
<h3>2. Fewer bounces</h3>
<p>According to a 2016 Google study, 53% of mobile visits are abandoned when a page takes longer than 3 seconds to load. Every second costs customers.</p>
<h3>3. More calls and enquiries</h3>
<p>On a phone, "Call", "WhatsApp" and a short form are the fastest ways to get in touch. If these buttons are small or hard to find, the customer goes to a competitor. See: <a href="/blog-details/website-not-generating-leads-ux-audit-2026">why your website is not generating leads</a>.</p>
<h3>4. Better results from ads</h3>
<p>In Google Ads, landing page experience affects Quality Score. A page that works poorly on phones brings fewer enquiries for the same budget. See: <a href="/blog-details/google-ads-azerbaijan-cost-guide-2027">Google Ads in Azerbaijan</a>.</p>
<h3>5. Social media traffic</h3>
<p>Links shared on Instagram, Facebook and WhatsApp are almost always opened on phones. To keep this traffic, the site has to work well on mobile.</p>
<h3>6. Trust</h3>
<p>A site that looks broken on a phone feels outdated and unreliable, and customers project that onto the business itself.</p>

<h2>How to Check Your Site in 5 Minutes</h2>
<p>Google's old Mobile-Friendly Test and the Search Console "Mobile Usability" report were retired in December 2023. Use these instead:</p>
<ol>
  <li><strong>PageSpeed Insights</strong> (pagespeed.web.dev): enter your URL and look at the "Mobile" result. Performance below 50 means serious problems; 90+ is good.</li>
  <li><strong>Chrome Lighthouse</strong>: open the site in Chrome, press F12 → Lighthouse → choose "Mobile" and run it. It flags small tap targets, unreadable text and more.</li>
  <li><strong>Search Console</strong>: the "Core Web Vitals" report shows how mobile pages perform for real users.</li>
  <li><strong>Your own phone</strong>: open the site and check: can you read without zooming? Does the menu open? Does tapping the phone number start a call? Is the form easy to fill in? Do elements jump while the page loads?</li>
</ol>

<h2>10 Elements Every Mobile-Friendly Site Needs</h2>
<table>
  <thead><tr><th>Element</th><th>Requirement</th></tr></thead>
  <tbody>
    <tr><td>Viewport tag</td><td><code>&lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;</code></td></tr>
    <tr><td>Text size</td><td>Body text at least 16px, readable without zooming</td></tr>
    <tr><td>Buttons</td><td>Tap area about 48×48px with spacing between them</td></tr>
    <tr><td>Menu</td><td>Short menu that opens with one tap</td></tr>
    <tr><td>Call button</td><td><code>tel:</code> link that is easy to find</td></tr>
    <tr><td>Forms</td><td>Few fields, correct keyboard (phone, email), autofill</td></tr>
    <tr><td>Images</td><td>WebP/AVIF, sized for the screen, lazy loading</td></tr>
    <tr><td>Horizontal scroll</td><td>None: content never overflows the screen</td></tr>
    <tr><td>Pop-ups</td><td>No large pop-ups covering the main content</td></tr>
    <tr><td>Same content</td><td>Important text, images and links from desktop are also on mobile</td></tr>
  </tbody>
</table>

<h2>How Much Does Going Mobile-Friendly Cost?</h2>
<table>
  <thead><tr><th>Option</th><th>Approximate price</th><th>When it fits</th></tr></thead>
  <tbody>
    <tr><td>Adapt the existing site</td><td>AZN 400–1,200</td><td>The site is fairly recent and its code and design are worth keeping</td></tr>
    <tr><td>New website</td><td>AZN 500–3,500</td><td>The site has not changed in 5+ years, is slow, the design is dated</td></tr>
    <tr><td>Mobile app</td><td>Separate project</td><td>You need frequent repeat use, notifications or device features</td></tr>
  </tbody>
</table>
<p>Prices depend on site type, number of pages and languages. More: <a href="/blog-details/website-cost-azerbaijan-2026">website cost in Azerbaijan</a>. For other signs that a redesign is due, see <a href="/blog-details/signs-you-need-website-redesign-2026">7 signs you need a website redesign</a>.</p>
<p>At RS Code every project is designed for mobile first and then adapted to larger screens. Before handover the site is tested on real phones and in PageSpeed Insights.</p>

%FAQ%

<h2>Conclusion</h2>
<p>A mobile-friendly website is no longer optional. Customers find you on their phones, Google indexes your site by its mobile version, and your ad budget depends on how well the page works on a phone. Run the 4 checks above today: if there is a problem, fixing it often costs less than building a new site.</p>
<p><strong>Want a free check of your site's mobile version? <a href="/contact">Contact us</a></strong>. More: <a href="/website-development">website development</a>.</p>
<p><small><em>Prices are approximate ranges for the Azerbaijani market (October 2026). Information on mobile-first indexing, Core Web Vitals thresholds and the retirement of the Mobile-Friendly Test is based on official Google Search Central documentation.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Возьмите телефон и найдите свой сайт в Google. Если текст мелкий, кнопки налезают друг на друга или картинки вылезают за экран, вы каждый день теряете клиентов. Большинство людей впервые знакомятся с бизнесом с телефона: поиск в Google, ссылка в Instagram, адрес в WhatsApp.</p>
<p>В статье объясняем, что такое адаптивный сайт, почему Google оценивает сайты по мобильной версии, как проверить свой сайт за 5 минут и сколько примерно стоит исправление.</p>

<h2>Краткий ответ</h2>
<table>
  <thead><tr><th>Вопрос</th><th>Ответ</th></tr></thead>
  <tbody>
    <tr><td>Что такое адаптивный сайт?</td><td>Сайт, которым удобно пользоваться на телефоне, планшете и компьютере по одному URL (responsive-дизайн)</td></tr>
    <tr><td>Почему это важно?</td><td>Google индексирует сайты в основном по мобильной версии; сайт, который плохо работает на телефоне, теряет и позиции, и заявки</td></tr>
    <tr><td>Как проверить?</td><td>PageSpeed Insights, Lighthouse в Chrome и 2-минутный тест на своём телефоне. Google Mobile-Friendly Test закрыт в 2023 году</td></tr>
    <tr><td>Сколько стоит?</td><td>Адаптация существующего сайта примерно 400–1 200 AZN, новый сайт 500–3 500 AZN</td></tr>
  </tbody>
</table>

<h2>Что такое адаптивный сайт?</h2>
<p>Адаптивный (responsive) сайт подстраивается под экран: на телефоне меню сворачивается, колонки встают друг под другом, картинки помещаются на экран, кнопки удобно нажимать пальцем. Отдельная версия «m.sayt.az» не нужна. Один URL и один код работают на всех устройствах.</p>
<p>Технически это тег <code>viewport</code>, гибкая сетка и CSS-правила, которые меняются в зависимости от размера экрана. Для клиента результат простой: он читает без увеличения и звонит одним касанием.</p>

<h2>Почему Google оценивает сайт по мобильной версии?</h2>
<p>Google завершил переход на mobile-first индексацию в 2023 году. Теперь он сканирует и индексирует сайт в основном так, как его видит браузер смартфона. Текст, изображения или ссылки, которых нет в мобильной версии, для Google фактически не существуют.</p>
<p>Кроме того, Google измеряет удобство страницы показателями <strong>Core Web Vitals</strong>:</p>
<ul>
  <li><strong>LCP</strong> (загрузка основного контента): меньше 2,5 секунды.</li>
  <li><strong>INP</strong> (реакция на касание): меньше 200 миллисекунд.</li>
  <li><strong>CLS</strong> (смещение макета): меньше 0,1.</li>
</ul>
<p>На телефонах эти показатели обычно хуже, потому что сеть и процессор слабее. Подробнее: <a href="/blog-details/skorost-sajta-core-web-vitals-2026">скорость сайта и Core Web Vitals</a>.</p>

<h2>6 главных преимуществ адаптивного сайта</h2>
<h3>1. Видимость в Google</h3>
<p>Мобильная версия — основа индексации. Контент, который обрезан, скрыт или медленно грузится на телефоне, отстаёт в выдаче.</p>
<h3>2. Меньше отказов</h3>
<p>По исследованию Google 2016 года, 53% мобильных посещений прерываются, если страница грузится дольше 3 секунд. Каждая секунда — это потерянные клиенты.</p>
<h3>3. Больше звонков и заявок</h3>
<p>На телефоне «Позвонить», «WhatsApp» и короткая форма — самые быстрые способы связаться. Если эти кнопки мелкие или их трудно найти, клиент уходит к конкуренту. См.: <a href="/blog-details/pochemu-sajt-ne-prinosit-zayavki-ux-audit-2026">почему сайт не приносит заявки</a>.</p>
<h3>4. Больше отдачи от рекламы</h3>
<p>В Google Ads качество целевой страницы влияет на Quality Score. Страница, которая плохо работает на телефоне, при том же бюджете приносит меньше заявок. См.: <a href="/blog-details/google-ads-azerbaydzhan-2027">Google Ads в Азербайджане</a>.</p>
<h3>5. Трафик из соцсетей</h3>
<p>Ссылки из Instagram, Facebook и WhatsApp почти всегда открывают с телефона. Чтобы не терять этот трафик, сайт должен удобно работать на мобильных.</p>
<h3>6. Доверие</h3>
<p>Сайт, который «разваливается» на телефоне, выглядит устаревшим и ненадёжным, и клиент переносит это впечатление на саму компанию.</p>

<h2>Как проверить сайт за 5 минут</h2>
<p>Старый инструмент Google Mobile-Friendly Test и отчёт «Удобство для мобильных» в Search Console закрыты в декабре 2023 года. Используйте вместо них:</p>
<ol>
  <li><strong>PageSpeed Insights</strong> (pagespeed.web.dev): введите адрес сайта и посмотрите результат «Мобильные». Производительность ниже 50 — серьёзные проблемы; 90+ — хорошо.</li>
  <li><strong>Lighthouse в Chrome</strong>: откройте сайт в Chrome, F12 → Lighthouse → выберите «Mobile» и запустите. Покажет мелкие кнопки, нечитаемый текст и другое.</li>
  <li><strong>Search Console</strong>: отчёт «Core Web Vitals» показывает, как мобильные страницы работают у реальных пользователей.</li>
  <li><strong>Свой телефон</strong>: откройте сайт и проверьте: читается ли текст без увеличения? Открывается ли меню? Начинается ли звонок при нажатии на номер? Удобно ли заполнять форму? Не прыгают ли элементы при загрузке?</li>
</ol>

<h2>10 элементов адаптивного сайта</h2>
<table>
  <thead><tr><th>Элемент</th><th>Требование</th></tr></thead>
  <tbody>
    <tr><td>Тег viewport</td><td><code>&lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;</code></td></tr>
    <tr><td>Размер текста</td><td>Основной текст не меньше 16px, читается без увеличения</td></tr>
    <tr><td>Кнопки</td><td>Зона нажатия около 48×48px, с отступами между кнопками</td></tr>
    <tr><td>Меню</td><td>Короткое, открывается одним касанием</td></tr>
    <tr><td>Кнопка звонка</td><td>Ссылка <code>tel:</code>, которую легко найти</td></tr>
    <tr><td>Формы</td><td>Мало полей, правильная клавиатура (телефон, e-mail), автозаполнение</td></tr>
    <tr><td>Изображения</td><td>WebP/AVIF, под размер экрана, lazy loading</td></tr>
    <tr><td>Горизонтальная прокрутка</td><td>Отсутствует: контент не выходит за экран</td></tr>
    <tr><td>Всплывающие окна</td><td>Нет больших pop-up, закрывающих основной контент</td></tr>
    <tr><td>Одинаковый контент</td><td>Важные тексты, картинки и ссылки с десктопа есть и на мобильной версии</td></tr>
  </tbody>
</table>

<h2>Сколько стоит адаптация сайта?</h2>
<table>
  <thead><tr><th>Вариант</th><th>Ориентировочная цена</th><th>Когда подходит</th></tr></thead>
  <tbody>
    <tr><td>Адаптировать текущий сайт</td><td>400–1 200 AZN</td><td>Сайт относительно новый, код и дизайн стоит сохранить</td></tr>
    <tr><td>Новый сайт</td><td>500–3 500 AZN</td><td>Сайт не менялся 5+ лет, медленный, дизайн устарел</td></tr>
    <tr><td>Мобильное приложение</td><td>Отдельный проект</td><td>Нужны частое повторное использование, уведомления, функции устройства</td></tr>
  </tbody>
</table>
<p>Цена зависит от типа сайта, количества страниц и языков. Подробнее: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">стоимость сайта в Азербайджане</a>. Другие признаки того, что сайту пора обновиться: <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">7 признаков, что сайту нужен редизайн</a>.</p>
<p>В RS Code каждый проект сначала проектируется для мобильных, затем адаптируется к большим экранам. Перед сдачей сайт проверяется на реальных телефонах и в PageSpeed Insights.</p>

%FAQ%

<h2>Итог</h2>
<p>Адаптивный сайт больше не опция. Клиенты находят вас с телефона, Google индексирует сайт по мобильной версии, а рекламный бюджет зависит от того, как страница работает на телефоне. Проведите 4 проверки выше уже сегодня: если проблема есть, исправить её часто дешевле, чем делать новый сайт.</p>
<p><strong>Хотите бесплатно проверить мобильную версию сайта? <a href="/kontakty">Напишите нам</a></strong>. Подробнее: <a href="/razrabotka-sajtov">разработка сайтов</a>.</p>
<p><small><em>Цены — ориентировочные диапазоны рынка Азербайджана (октябрь 2026). Информация о mobile-first индексации, порогах Core Web Vitals и закрытии Mobile-Friendly Test основана на официальной документации Google Search Central.</em></small></p>
HTML;

        DB::table('blogs')->where('id', 18)->update([
            'text_az' => str_replace('%FAQ%', $this->faqBlock('az', $faq['az']), $textAz),
            'text_en' => str_replace('%FAQ%', $this->faqBlock('en', $faq['en']), $textEn),
            'text_ru' => str_replace('%FAQ%', $this->faqBlock('ru', $faq['ru']), $textRu),

            'review_az' => 'Mobil uyğun sayt nədir, Google saytları niyə mobil versiyaya görə qiymətləndirir, saytı 5 dəqiqədə necə yoxlamaq olar və mobil uyğunlaşdırma neçəyə başa gəlir.',
            'review_en' => 'What a mobile-friendly website is, why Google evaluates sites by their mobile version, how to check your site in 5 minutes and what going mobile-friendly costs.',
            'review_ru' => 'Что такое адаптивный сайт, почему Google оценивает сайты по мобильной версии, как проверить сайт за 5 минут и сколько стоит адаптация.',

            'meta_description_az' => 'Mobil uyğun sayt niyə vacibdir: Google mobile-first indeksləmə, Core Web Vitals, saytı 5 dəqiqədə yoxlamaq üsulları və qiymət (400–1 200 ₼ uyğunlaşdırma).',
            'meta_description_en' => 'Why a mobile-friendly website matters: Google mobile-first indexing, Core Web Vitals, how to check your site in 5 minutes and cost (adaptation AZN 400–1,200).',
            'meta_description_ru' => 'Зачем нужен адаптивный сайт: mobile-first индексация Google, Core Web Vitals, проверка сайта за 5 минут и цена (адаптация 400–1 200 AZN).',

            'updated_at' => now(),
        ]);

        $this->command?->info('Blog #18: yenidən yazıldı');
    }
}
