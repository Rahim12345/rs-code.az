<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * #24–#28 (may ayının yazıları): "Qısa cavab" cədvəli və daxili linklər əlavə olunur.
 * FAQPage JSON-LD bu yazılarda artıq var, ona toxunulmur.
 * #24: mənbəsiz "78%" statistikası silinir, "DGK" → "DVX" / "STS".
 *
 * Təkrar işə salmaq təhlükəsizdir: qısa cavabı olan dilə toxunulmur.
 * Backup: storage/app/blog{24..28}-backup.json (yalnız ilk dəfə yazılır).
 */
class BlogOldPostsSeoUpgradeSeeder extends Seeder
{
    private const QUICK = ['az' => 'Qısa Cavab', 'en' => 'Quick Answer', 'ru' => 'Краткий ответ'];
    private const HEAD = ['az' => ['Sual', 'Cavab'], 'en' => ['Question', 'Answer'], 'ru' => ['Вопрос', 'Ответ']];
    private const RELATED = ['az' => 'Bunları da oxuyun', 'en' => 'Read next', 'ru' => 'Читайте также'];

    public function run(): void
    {
        foreach ($this->posts() as $id => $post) {
            $this->backup($id);
            $this->upgrade($id, $post['quick'], $post['related']);
        }

        $this->fixBlog24Facts();
    }

    private function posts(): array
    {
        return [
            // ------------------------------------------------------------- #24 POS qiyməti
            24 => [
                'quick' => [
                    'az' => [
                        ['Hazır POS aylıq neçəyədir?', 'Proqram abunəsi təxminən 60–250 AZN/ay (POSGroup, Clopos, Cubics, iiko)'],
                        ['Sifarişlə POS neçəyədir?', 'Birdəfəlik 3 000–12 000 AZN, aylıq abunə yoxdur'],
                        ['Avadanlıq nə qədər tutur?', 'Monitor, çek printeri, pul qutusu, barkod oxuyucu — cəmi 800–2 000 AZN'],
                        ['Hansı nə vaxt sərfəlidir?', 'Tək filial və tez başlamaq — hazır POS. 2+ filial, xüsusi iş axını və 3 ildən uzun plan — sifarişlə POS'],
                    ],
                    'en' => [
                        ['Ready-made POS monthly price', 'Software subscription about AZN 60–250/month (POSGroup, Clopos, Cubics, iiko)'],
                        ['Custom POS price', 'AZN 3,000–12,000 one-time, no monthly fee'],
                        ['Hardware cost', 'Touch screen, receipt printer, cash drawer, barcode scanner — AZN 800–2,000 in total'],
                        ['Which one pays off?', 'Single location, fast start — ready-made POS. 2+ branches, custom workflow, 3+ year horizon — custom POS'],
                    ],
                    'ru' => [
                        ['Готовая POS в месяц', 'Подписка примерно 60–250 AZN/мес (POSGroup, Clopos, Cubics, iiko)'],
                        ['POS на заказ', '3 000–12 000 AZN единоразово, без абонентской платы'],
                        ['Оборудование', 'Сенсорный монитор, чековый принтер, денежный ящик, сканер штрихкодов — всего 800–2 000 AZN'],
                        ['Что выгоднее?', 'Одна точка и быстрый старт — готовая POS. 2+ филиала, особые процессы и горизонт от 3 лет — POS на заказ'],
                    ],
                ],
                'related' => [
                    'az' => [
                        ['/blog-details/restoran-ucun-pos-sistemi-nece-secilir-2026', 'Restoran üçün POS sistemi necə seçilir?'],
                        ['/blog-details/e-kassa-pos-inteqrasiyasi-2026', 'E-kassa və POS inteqrasiyası'],
                        ['/blog-details/magaza-proqrami-anbar-pos-azerbaycanda-2026', 'Mağaza proqramı, anbar və POS'],
                        ['/blog-details/fifo-maya-deyeri-nedir-2026', 'FIFO maya dəyəri nədir?'],
                        ['/mehsullar/rspos', 'RS POS — restoran və mağaza üçün POS'],
                    ],
                    'en' => [
                        ['/blog-details/how-to-choose-pos-system-for-restaurant-2026', 'How to choose a restaurant POS'],
                        ['/blog-details/e-kassa-pos-integration-azerbaijan-2026', 'E-kassa and POS integration'],
                        ['/blog-details/store-software-warehouse-pos-azerbaijan-2026', 'Store software, warehouse and POS'],
                        ['/blog-details/what-is-fifo-cost-method-2026', 'What is the FIFO cost method?'],
                        ['/mehsullar/rspos', 'RS POS — POS for restaurants and shops'],
                    ],
                    'ru' => [
                        ['/blog-details/kak-vybrat-pos-sistemu-dlya-restorana-2026', 'Как выбрать POS для ресторана'],
                        ['/blog-details/e-kassa-integraciya-s-pos-2026', 'Интеграция e-kassa и POS'],
                        ['/blog-details/programma-magazin-sklad-pos-azerbajdzan-2026', 'Программа для магазина, склад и POS'],
                        ['/blog-details/chto-takoe-fifo-sebestoimost-2026', 'Что такое себестоимость по FIFO?'],
                        ['/mehsullar/rspos', 'RS POS — POS для ресторанов и магазинов'],
                    ],
                ],
            ],

            // ------------------------------------------------------------- #25 CRM və ERP
            25 => [
                'quick' => [
                    'az' => [
                        ['CRM ilə ERP-nin fərqi', 'CRM müştəri və satışı idarə edir, ERP daxili prosesləri: anbar, maliyyə, istehsal, kadr'],
                        ['Hazır sistemin qiyməti', 'CRM təxminən $15–150, ERP $50–500 — istifadəçi başına aylıq'],
                        ['Sifarişlə hazırlanma', 'CRM ₼3 000–8 000, ERP ₼8 000–30 000+ birdəfəlik'],
                        ['Tətbiq müddəti', 'CRM 2–8 həftə, ERP 3–12 ay'],
                        ['Kiçik biznes nədən başlamalı?', 'Əvvəl CRM; komanda böyüyüb anbar/maliyyə çətinləşəndə ERP'],
                    ],
                    'en' => [
                        ['CRM vs ERP', 'CRM manages customers and sales, ERP manages internal processes: stock, finance, production, HR'],
                        ['Ready-made price', 'CRM about $15–150, ERP $50–500 — per user per month'],
                        ['Custom development', 'CRM AZN 3,000–8,000, ERP AZN 8,000–30,000+ one-time'],
                        ['Rollout time', 'CRM 2–8 weeks, ERP 3–12 months'],
                        ['Where should a small business start?', 'CRM first; ERP once the team grows and stock/finance get complex'],
                    ],
                    'ru' => [
                        ['Разница CRM и ERP', 'CRM управляет клиентами и продажами, ERP — внутренними процессами: склад, финансы, производство, кадры'],
                        ['Цена готовой системы', 'CRM примерно $15–150, ERP $50–500 — за пользователя в месяц'],
                        ['Разработка на заказ', 'CRM 3 000–8 000 AZN, ERP 8 000–30 000+ AZN единоразово'],
                        ['Срок внедрения', 'CRM 2–8 недель, ERP 3–12 месяцев'],
                        ['С чего начать малому бизнесу?', 'Сначала CRM; ERP — когда команда выросла и усложнились склад и финансы'],
                    ],
                ],
                'related' => [
                    'az' => [
                        ['/blog-details/b2b-sifaris-portali-diler-distributor-2026', 'Diler və distribütorlar üçün B2B sifariş portalı'],
                        ['/blog-details/magaza-proqrami-anbar-pos-azerbaycanda-2026', 'Mağaza proqramı, anbar və POS'],
                        ['/blog-details/biznes-ucun-ai-chatbot-2026', 'Biznes üçün AI çatbot'],
                        ['/blog-details/onlayn-rezervasiya-novbe-sistemi-2026', 'Onlayn rezervasiya və növbə sistemi'],
                        ['/blog-details/laravel-yoxsa-wordpress-2026', 'Laravel, yoxsa WordPress?'],
                    ],
                    'en' => [
                        ['/blog-details/b2b-ordering-portal-dealers-distributors-2026', 'B2B ordering portal for dealers and distributors'],
                        ['/blog-details/store-software-warehouse-pos-azerbaijan-2026', 'Store software, warehouse and POS'],
                        ['/blog-details/ai-chatbot-for-business-2026', 'AI chatbot for business'],
                        ['/blog-details/online-booking-system-salon-clinic-2026', 'Online booking and queue system'],
                        ['/blog-details/laravel-vs-wordpress-for-business-2026', 'Laravel or WordPress?'],
                    ],
                    'ru' => [
                        ['/blog-details/b2b-portal-zakazov-dlya-dilerov-2026', 'B2B-портал заказов для дилеров'],
                        ['/blog-details/programma-magazin-sklad-pos-azerbajdzan-2026', 'Программа для магазина, склад и POS'],
                        ['/blog-details/ii-chat-bot-dlya-biznesa-2026', 'ИИ чат-бот для бизнеса'],
                        ['/blog-details/sistema-onlajn-zapisi-salon-klinika-2026', 'Система онлайн-записи'],
                        ['/blog-details/laravel-ili-wordpress-2026', 'Laravel или WordPress?'],
                    ],
                ],
            ],

            // ------------------------------------------------------------- #26 LMS qiyməti
            26 => [
                'quick' => [
                    'az' => [
                        ['Hazır LMS aylıq neçəyədir?', 'Thinkific $36–149, Teachable $39–299, TalentLMS $69–459 — aylıq'],
                        ['Moodle pulsuzdurmu?', 'Proqram pulsuzdur, amma hostinq, quraşdırma və dəstəklə illik təxminən ₼2 500–5 000'],
                        ['Sifarişlə LMS neçəyədir?', 'Başlanğıc ₼4 000–6 000, orta ₼7 000–12 000, tam platforma ₼15 000–30 000'],
                        ['Neçə vaxta hazır olur?', 'Başlanğıc LMS 6–8 həftə, tam platforma 4–6 ay'],
                    ],
                    'en' => [
                        ['Ready-made LMS monthly price', 'Thinkific $36–149, Teachable $39–299, TalentLMS $69–459 per month'],
                        ['Is Moodle free?', 'The software is free, but hosting, setup and support cost about AZN 2,500–5,000 a year'],
                        ['Custom LMS price', 'Starter AZN 4,000–6,000, mid AZN 7,000–12,000, full platform AZN 15,000–30,000'],
                        ['How long does it take?', 'Starter LMS 6–8 weeks, full platform 4–6 months'],
                    ],
                    'ru' => [
                        ['Готовая LMS в месяц', 'Thinkific $36–149, Teachable $39–299, TalentLMS $69–459 в месяц'],
                        ['Moodle бесплатна?', 'Программа бесплатна, но хостинг, установка и поддержка — примерно 2 500–5 000 AZN в год'],
                        ['LMS на заказ', 'Базовая 4 000–6 000 AZN, средняя 7 000–12 000 AZN, полная платформа 15 000–30 000 AZN'],
                        ['Сроки', 'Базовая LMS 6–8 недель, полная платформа 4–6 месяцев'],
                    ],
                ],
                'related' => [
                    'az' => [
                        ['/blog-details/onlayn-kurs-nece-yaradilir-2026', 'Onlayn kurs necə yaradılır və satılır?'],
                        ['/blog-details/tedris-merkezi-idareetme-proqrami-2026', 'Tədris mərkəzi üçün idarəetmə proqramı'],
                        ['/blog-details/repetitor-ders-idareetme-proqrami-2026', 'Repetitorlar üçün dərs idarəetməsi'],
                        ['/blog-details/mobil-tetbiq-yoxsa-mobil-sayt-2026', 'Mobil tətbiq, yoxsa mobil sayt (PWA)?'],
                        ['/mehsullar/kursometr', 'Kursometr — tədris mərkəzi proqramı'],
                    ],
                    'en' => [
                        ['/blog-details/how-to-create-and-sell-online-course-2026', 'How to create and sell an online course'],
                        ['/blog-details/training-centre-management-software-2026', 'Training centre management software'],
                        ['/blog-details/tutor-class-management-software-2026', 'Class management for tutors'],
                        ['/blog-details/mobile-app-vs-mobile-website-2026', 'Mobile app or mobile website (PWA)?'],
                        ['/mehsullar/kursometr', 'Kursometr — training centre software'],
                    ],
                    'ru' => [
                        ['/blog-details/kak-sozdat-i-prodavat-onlajn-kurs-2026', 'Как создать и продавать онлайн-курс'],
                        ['/blog-details/programma-dlya-uchebnogo-centra-2026', 'Программа для учебного центра'],
                        ['/blog-details/programma-dlya-repetitorov-2026', 'Программа для репетиторов'],
                        ['/blog-details/mobilnoe-prilozhenie-ili-sajt-2026', 'Мобильное приложение или сайт (PWA)?'],
                        ['/mehsullar/kursometr', 'Kursometr — программа для учебного центра'],
                    ],
                ],
            ],

            // ------------------------------------------------------------- #27 Mağaza, anbar, POS
            27 => [
                'quick' => [
                    'az' => [
                        ['POS, anbar və mağaza proqramının fərqi', 'POS — kassa və ödəniş, anbar proqramı — stok, mağaza proqramı — hər ikisi üstəgəl hesabat və əsas mühasibat'],
                        ['Hazır həllin qiyməti', 'Təxminən ₼50–500/ay, funksiya və kassa sayından asılı'],
                        ['Sifarişlə həllin qiyməti', '₼5 000–20 000 birdəfəlik; adətən 2–3 ildən sonra abunədən sərfəli olur'],
                        ['Ayrıca anbar proqramı lazımdırmı?', 'POS-da anbar modulu varsa, yox. Çox filial, böyük anbar və ya istehsal varsa — bəli'],
                    ],
                    'en' => [
                        ['POS vs warehouse vs store software', 'POS — checkout and payment, warehouse software — stock, store software — both plus reports and basic accounting'],
                        ['Ready-made price', 'About AZN 50–500/month, depending on features and number of tills'],
                        ['Custom solution price', 'AZN 5,000–20,000 one-time; usually cheaper than a subscription after 2–3 years'],
                        ['Do I need separate warehouse software?', 'Not if your POS has a stock module. Yes for many branches, a large warehouse or production'],
                    ],
                    'ru' => [
                        ['POS, склад и программа для магазина', 'POS — касса и оплата, складская программа — остатки, программа для магазина — и то и другое плюс отчёты и базовый учёт'],
                        ['Цена готового решения', 'Примерно 50–500 AZN/мес в зависимости от функций и числа касс'],
                        ['Решение на заказ', '5 000–20 000 AZN единоразово; обычно выгоднее подписки через 2–3 года'],
                        ['Нужна ли отдельная складская программа?', 'Нет, если в POS есть складской модуль. Да — при многих филиалах, большом складе или производстве'],
                    ],
                ],
                'related' => [
                    'az' => [
                        ['/blog-details/pos-sistemi-qiymeti-azerbaycanda-2026', 'POS sistemi qiyməti: hazır vs sifarişlə'],
                        ['/blog-details/fifo-maya-deyeri-nedir-2026', 'FIFO maya dəyəri nədir?'],
                        ['/blog-details/nisye-satis-borc-defteri-2026', 'Nisyə satış və borc dəftəri'],
                        ['/blog-details/e-kassa-pos-inteqrasiyasi-2026', 'E-kassa və POS inteqrasiyası'],
                        ['/mehsullar/rspos', 'RS POS — mağaza və restoran üçün POS'],
                    ],
                    'en' => [
                        ['/blog-details/pos-system-price-azerbaijan-2026', 'POS system price: ready-made vs custom'],
                        ['/blog-details/what-is-fifo-cost-method-2026', 'What is the FIFO cost method?'],
                        ['/blog-details/customer-debt-book-credit-sales-2026', 'Credit sales and customer debt book'],
                        ['/blog-details/e-kassa-pos-integration-azerbaijan-2026', 'E-kassa and POS integration'],
                        ['/mehsullar/rspos', 'RS POS — POS for shops and restaurants'],
                    ],
                    'ru' => [
                        ['/blog-details/stoimost-pos-sistemy-azerbaydzhan-2026', 'Цена POS-системы: готовая или на заказ'],
                        ['/blog-details/chto-takoe-fifo-sebestoimost-2026', 'Что такое себестоимость по FIFO?'],
                        ['/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026', 'Продажи в долг и долговая книга'],
                        ['/blog-details/e-kassa-integraciya-s-pos-2026', 'Интеграция e-kassa и POS'],
                        ['/mehsullar/rspos', 'RS POS — POS для магазинов и ресторанов'],
                    ],
                ],
            ],

            // ------------------------------------------------------------- #28 12 sual
            28 => [
                'quick' => [
                    'az' => [
                        ['Ən vacib suallar hansılardır?', 'Saytın məqsədi, büdcə aralığı, domen və hostinqin kimin adına olacağı, admin panelin olub-olmaması'],
                        ['Sifarişdən əvvəl nə hazırlamalı?', 'Loqo və rənglər, hədəf auditoriya, 3–5 rəqib saytı, funksiyalar siyahısı, büdcə'],
                        ['Domen kimin adına olmalıdır?', 'Sifarişçinin — sizin adınıza qeydiyyatda olmalı, giriş məlumatları sizdə qalmalıdır'],
                        ['Sual verilməsə nə olur?', 'Büdcə aşılır, müddət uzanır, sayt məqsədə xidmət etmir'],
                    ],
                    'en' => [
                        ['Which questions matter most?', 'The site\'s goal, budget range, whose name the domain and hosting are in, and whether there is an admin panel'],
                        ['What to prepare before ordering?', 'Logo and colours, target audience, 3–5 competitor sites, feature list, budget'],
                        ['Whose name should the domain be in?', 'The client\'s — registered to you, with login details kept by you'],
                        ['What if you skip these questions?', 'Budget overruns, delays and a website that does not serve its purpose'],
                    ],
                    'ru' => [
                        ['Самые важные вопросы', 'Цель сайта, бюджет, на кого оформлены домен и хостинг, будет ли админ-панель'],
                        ['Что подготовить до заказа?', 'Логотип и цвета, целевую аудиторию, 3–5 сайтов конкурентов, список функций, бюджет'],
                        ['На кого оформлять домен?', 'На заказчика — регистрация на вас, доступы остаются у вас'],
                        ['Что будет, если не задать вопросы?', 'Перерасход бюджета, срыв сроков и сайт, который не решает задачу'],
                    ],
                ],
                'related' => [
                    'az' => [
                        ['/blog-details/brif-nece-doldurulur-2026', 'Brif necə doldurulur?'],
                        ['/blog-details/veb-sayt-qiymeti-azerbaycan-2026', 'Veb sayt qiyməti Azərbaycanda'],
                        ['/blog-details/wix-tilda-wordpress-vs-sifarisle-sayt-2026', 'Wix, Tilda, WordPress yoxsa sifarişlə sayt?'],
                        ['/blog-details/landing-page-nedir-2026', 'Landing page nədir?'],
                        ['/veb-saytlarin-hazirlanmasi', 'Veb saytların hazırlanması xidməti'],
                    ],
                    'en' => [
                        ['/blog-details/how-to-write-project-brief-2026', 'How to fill in a project brief'],
                        ['/blog-details/website-cost-azerbaijan-2026', 'Website cost in Azerbaijan'],
                        ['/blog-details/wix-vs-tilda-vs-wordpress-vs-custom-website-2026', 'Wix, Tilda, WordPress or a custom website?'],
                        ['/blog-details/what-is-a-landing-page-2026', 'What is a landing page?'],
                        ['/website-development', 'Website development service'],
                    ],
                    'ru' => [
                        ['/blog-details/kak-zapolnit-brif-2026', 'Как заполнить бриф'],
                        ['/blog-details/stoimost-veb-sayta-azerbaydzhan-2026', 'Стоимость сайта в Азербайджане'],
                        ['/blog-details/wix-tilda-wordpress-ili-sajt-na-zakaz-2026', 'Wix, Tilda, WordPress или сайт на заказ?'],
                        ['/blog-details/chto-takoe-lending-2026', 'Что такое лендинг?'],
                        ['/razrabotka-sajtov', 'Услуга разработки сайтов'],
                    ],
                ],
            ],
        ];
    }

    private function backup(int $id): void
    {
        $file = "blog{$id}-backup.json";
        if (Storage::disk('local')->exists($file)) {
            return;
        }
        $row = DB::table('blogs')->where('id', $id)->first();
        if ($row) {
            Storage::disk('local')->put($file, json_encode($row, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }
    }

    private function upgrade(int $id, array $quick, array $related): void
    {
        $row = DB::table('blogs')->where('id', $id)->first();
        if (! $row) {
            $this->command?->warn("Blog #{$id} tapılmadı");
            return;
        }

        $update = [];
        foreach (['az', 'en', 'ru'] as $lang) {
            $html = $row->{"text_{$lang}"} ?? '';
            if ($html === '' || str_contains($html, '<h2>' . self::QUICK[$lang] . '</h2>')) {
                continue;
            }

            $html = $this->insertBeforeFaq($html, $this->relatedBlock($lang, $related[$lang]));
            $html = $this->insertQuick($html, $this->quickTable($lang, $quick[$lang]));
            $update["text_{$lang}"] = $html;
        }

        if ($update) {
            $update['updated_at'] = now();
            DB::table('blogs')->where('id', $id)->update($update);
            $this->command?->info("Blog #{$id}: " . implode(', ', array_keys($update)));
        }
    }

    /**
     * Mətn giriş paraqrafı ilə başlayırsa — ilk H2-dən əvvəl;
     * H2 ilə başlayırsa — həmin bölmənin girişindən sonra, ikinci H2-dən əvvəl.
     */
    private function insertQuick(string $html, string $block): string
    {
        preg_match_all('/<h2\b/i', $html, $m, PREG_OFFSET_CAPTURE);
        $positions = array_column($m[0], 1);
        if (! $positions) {
            return $block . $html;
        }

        $at = $positions[0];
        if (trim(substr($html, 0, $at)) === '' && isset($positions[1])) {
            $at = $positions[1];
        }

        return substr($html, 0, $at) . $block . substr($html, $at);
    }

    private function insertBeforeFaq(string $html, string $block): string
    {
        if (preg_match('/<h[2-4]\b[^>]*>[^<]*(?:Tez-tez|Frequently|Часто)/iu', $html, $m, PREG_OFFSET_CAPTURE)) {
            return substr($html, 0, $m[0][1]) . $block . substr($html, $m[0][1]);
        }
        if (preg_match('/<script\b/i', $html, $m, PREG_OFFSET_CAPTURE)) {
            return substr($html, 0, $m[0][1]) . $block . substr($html, $m[0][1]);
        }

        return $html . $block;
    }

    private function quickTable(string $lang, array $rows): string
    {
        [$a, $b] = self::HEAD[$lang];
        $out = '<h2>' . self::QUICK[$lang] . "</h2>\n<table>\n  <thead><tr><th>{$a}</th><th>{$b}</th></tr></thead>\n  <tbody>\n";
        foreach ($rows as [$q, $ans]) {
            $out .= '    <tr><td>' . e($q) . '</td><td>' . e($ans) . "</td></tr>\n";
        }

        return $out . "  </tbody>\n</table>\n";
    }

    private function relatedBlock(string $lang, array $links): string
    {
        $out = '<h3>' . self::RELATED[$lang] . "</h3>\n<ul>\n";
        foreach ($links as [$href, $text]) {
            $out .= "  <li><a href=\"{$href}\">" . e($text) . "</a></li>\n";
        }

        return $out . "</ul>\n";
    }

    /**
     * #24: mənbəsi olmayan "78%" iddiası silinir; vergi orqanının adı düzəldilir (DVX / STS).
     */
    private function fixBlog24Facts(): void
    {
        $row = DB::table('blogs')->where('id', 24)->first();
        if (! $row) {
            return;
        }

        $az = preg_replace(
            '/Azərbaycanda 2026-cı ildə restoranların (?:<strong>)?78%-i.*?Bunun əsas səbəbi belədir:/u',
            'Bizneslərin POS sisteminə keçməsinin əsas səbəbi belədir:',
            $row->text_az
        );
        $az = str_replace(['DGK (Dövlət Vergi Xidməti)', 'DGK'], ['DVX (Dövlət Vergi Xidməti)', 'DVX'], $az);
        $en = str_replace(['DGK (State Tax Service)', 'DGK'], ['STS (State Tax Service)', 'STS'], $row->text_en);

        if ($az !== $row->text_az || $en !== $row->text_en) {
            DB::table('blogs')->where('id', 24)->update(['text_az' => $az, 'text_en' => $en, 'updated_at' => now()]);
            $this->command?->info('Blog #24: faktlar düzəldildi');
        }
    }
}
