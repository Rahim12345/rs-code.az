<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FigmaProjectsSeeder extends Seeder
{
    public function run(): void
    {
        // slug => [ad, link, il, [az, en, ru]] — hər dil: [giriş, [səhifələr], [görülən işlər]]
        $new = [
            'as-technologies' => ['AS Technologies', '', '2026', [
                'az' => ['Ağıllı ev və bina avtomatlaşdırma şirkəti üçün korporativ sayt: məhsul kataloqu, təlim və sertifikat bölmələri.',
                    ['Ana səhifə', 'Haqqımızda', 'Məhsullar', 'Referanslar', 'Təlim', 'Bloq', 'Sertifikatlar'],
                    ['UI/UX dizayn (Figma)', 'Korporativ üslubda vizual konsepsiya', 'Məhsul kataloqu strukturu', 'Təlim və sertifikat bölmələri']],
                'en' => ['Corporate website for a smart home and building automation company: product catalogue, training and certificates.',
                    ['Home', 'About', 'Products', 'References', 'Training', 'Blog', 'Certificates'],
                    ['UI/UX design (Figma)', 'Corporate visual concept', 'Product catalogue structure', 'Training and certificate sections']],
                'ru' => ['Корпоративный сайт компании по автоматизации умных домов и зданий: каталог продукции, обучение и сертификаты.',
                    ['Главная', 'О компании', 'Продукция', 'Референсы', 'Обучение', 'Блог', 'Сертификаты'],
                    ['UI/UX дизайн (Figma)', 'Корпоративная визуальная концепция', 'Структура каталога продукции', 'Разделы обучения и сертификатов']],
            ]],
            'mm-logistics' => ['MM Logistics', '', '2026', [
                'az' => ['Beynəlxalq logistika və gömrük xidmətləri şirkəti üçün yeni korporativ sayt dizaynı.',
                    ['Ana səhifə', 'Haqqımızda', 'Xidmətlər (7 səhifə)', 'Gömrük təmsilçiliyi', 'Beynəlxalq logistika', 'Sertifikatlar', 'Bloq', 'Əlaqə'],
                    ['UI/UX dizayn (Figma)', 'Hər xidmət üçün ayrıca səhifə strukturu', 'Etibar yaradan korporativ vizual', 'Sertifikat və bloq bölmələri']],
                'en' => ['New corporate website design for an international logistics and customs services company.',
                    ['Home', 'About', 'Services (7 pages)', 'Customs representation', 'International logistics', 'Certificates', 'Blog', 'Contact'],
                    ['UI/UX design (Figma)', 'A dedicated page structure for every service', 'Trust-building corporate visuals', 'Certificates and blog sections']],
                'ru' => ['Новый дизайн корпоративного сайта компании международной логистики и таможенных услуг.',
                    ['Главная', 'О компании', 'Услуги (7 страниц)', 'Таможенное представительство', 'Международная логистика', 'Сертификаты', 'Блог', 'Контакты'],
                    ['UI/UX дизайн (Figma)', 'Отдельная структура страницы для каждой услуги', 'Корпоративный визуал, вызывающий доверие', 'Разделы сертификатов и блога']],
            ]],
            'affidacons' => ['AFFIDACONS', 'https://affidacons.com', '2026', [
                'az' => ['Hüquqi xidmətlər şirkəti üçün korporativ sayt: xidmətlər kataloqu, hüquqi bloq və onlayn görüş təyini.',
                    ['Ana səhifə', 'Haqqımızda', 'Xidmətlər (9 istiqamət)', 'Xidmət daxili səhifələri', 'Bloq və bloq daxili səhifə', 'Əlaqə'],
                    ['UI/UX dizayn və proqramlaşdırma', 'Mobil adaptasiya', 'Onlayn görüş təyini forması', 'Bloqda kateqoriya, teq və canlı axtarış', 'Çoxdilli struktur (AZ/EN)']],
                'en' => ['Corporate website for a legal services firm: service catalogue, legal blog and online appointment booking.',
                    ['Home', 'About', 'Services (9 practice areas)', 'Service detail pages', 'Blog and article pages', 'Contact'],
                    ['UI/UX design and development', 'Mobile adaptation', 'Online appointment form', 'Blog categories, tags and live search', 'Multilingual structure (AZ/EN)']],
                'ru' => ['Корпоративный сайт юридической компании: каталог услуг, юридический блог и онлайн-запись на консультацию.',
                    ['Главная', 'О компании', 'Услуги (9 направлений)', 'Страницы услуг', 'Блог и статьи', 'Контакты'],
                    ['UI/UX дизайн и разработка', 'Мобильная адаптация', 'Форма онлайн-записи', 'Категории, теги и живой поиск в блоге', 'Мультиязычная структура (AZ/EN)']],
            ]],
            'alza-fish' => ['Alza Fish', 'https://alzafish.az', '2025', [
                'az' => ['Akvakultura və balıq məhsulları brendi üçün desktop və mobil dizaynlı sayt: məhsullar, media və bloq.',
                    ['Ana səhifə', 'Balıqlar', 'Kürü', 'Foto qalereya', 'Video', 'Bloq', 'Bloq daxili səhifə'],
                    ['UI/UX dizayn (Figma)', 'Bütün səhifələrin mobil adaptasiyası', 'Premium brend vizualı', 'Məhsul və media bölmələri']],
                'en' => ['Website for an aquaculture and fish products brand with desktop and mobile design: products, media and blog.',
                    ['Home', 'Fish', 'Caviar', 'Photo gallery', 'Video', 'Blog', 'Blog article'],
                    ['UI/UX design (Figma)', 'Mobile adaptation of every page', 'Premium brand visuals', 'Product and media sections']],
                'ru' => ['Сайт бренда аквакультуры и рыбной продукции с десктопным и мобильным дизайном: продукция, медиа и блог.',
                    ['Главная', 'Рыба', 'Икра', 'Фотогалерея', 'Видео', 'Блог', 'Статья блога'],
                    ['UI/UX дизайн (Figma)', 'Мобильная адаптация всех страниц', 'Премиальный визуал бренда', 'Разделы продукции и медиа']],
            ]],
            'gospeak' => ['GoSpeak', '', '2025', [
                'az' => ['Onlayn dil öyrənmə platforması: şəxsi kabinet, speaking club və tədris materialları.',
                    ['Ana səhifə', 'Giriş və qeydiyyat', 'Şifrənin bərpası', 'Speaking Club', 'Tədris materialları'],
                    ['Platforma üçün UI/UX dizayn (Figma)', 'İstifadəçi axınları: giriş, xəta halları, bərpa', 'Şəxsi kabinet interfeysi', 'Parlaq, gənc auditoriyaya uyğun stil']],
                'en' => ['Online language learning platform: personal dashboard, speaking club and learning materials.',
                    ['Home', 'Sign in and sign up', 'Password recovery', 'Speaking Club', 'Learning materials'],
                    ['Platform UI/UX design (Figma)', 'User flows: sign-in, error states, recovery', 'Personal dashboard interface', 'Bright style for a young audience']],
                'ru' => ['Онлайн-платформа для изучения языков: личный кабинет, speaking club и учебные материалы.',
                    ['Главная', 'Вход и регистрация', 'Восстановление пароля', 'Speaking Club', 'Учебные материалы'],
                    ['UI/UX дизайн платформы (Figma)', 'Пользовательские сценарии: вход, ошибки, восстановление', 'Интерфейс личного кабинета', 'Яркий стиль для молодой аудитории']],
            ]],
            'agilli-nagillar' => ['Ağıllı Nağıllar', '', '2023', [
                'az' => ['Kreativ agentlik üçün mobil yönümlü sayt dizaynı: xidmətlər, portfolio və partnyorlar.',
                    ['Ana səhifə', 'İşlər (portfolio)'],
                    ['Mobile-first UI/UX dizayn (Figma)', 'Cəsarətli tipoqrafiya və rəng həlli', 'Portfolio və keys təqdimatı', 'Partnyorlar bölməsi']],
                'en' => ['Mobile-first website design for a creative agency: services, portfolio and partners.',
                    ['Home', 'Works (portfolio)'],
                    ['Mobile-first UI/UX design (Figma)', 'Bold typography and colour system', 'Portfolio and case presentation', 'Partners section']],
                'ru' => ['Мобильный дизайн сайта для креативного агентства: услуги, портфолио и партнёры.',
                    ['Главная', 'Работы (портфолио)'],
                    ['Mobile-first UI/UX дизайн (Figma)', 'Смелая типографика и цветовая система', 'Презентация портфолио и кейсов', 'Раздел партнёров']],
            ]],
        ];

        $labels = [
            'az' => ['Dizayn olunan səhifələr', 'Görülən işlər'],
            'en' => ['Designed pages', 'What we did'],
            'ru' => ['Спроектированные страницы', 'Что сделано'],
        ];

        $order = (int) DB::table('projects')->max('order_no');

        foreach ($new as $slug => [$name, $link, $year, $texts]) {
            $data = [
                'name' => $name, 'name_az' => $name, 'name_en' => $name, 'name_ru' => $name,
                'link' => $link, 'kateqoriya' => 'websites',
                'tarix' => $year, 'tarix_az' => $year, 'tarix_en' => $year, 'tarix_ru' => $year,
                'slug_az' => $slug, 'slug_en' => $slug, 'slug_ru' => $slug,
                'photo1' => "$slug-cover.jpg", 'updated_at' => now(),
            ];
            foreach ($texts as $l => [$lead, $pages, $works]) {
                $li = fn ($items) => '<ul><li>' . implode('</li><li>', $items) . '</li></ul>';
                $data['description_' . $l] = "<p>$lead</p><h3>{$labels[$l][0]}</h3>" . $li($pages) . "<h3>{$labels[$l][1]}</h3>" . $li($works);
            }
            if (!DB::table('projects')->where('slug', $slug)->exists()) {
                $data += ['order_no' => ++$order, 'home' => 0, 'created_at' => now()];
            }
            DB::table('projects')->updateOrInsert(['slug' => $slug], $data);

            $id = DB::table('projects')->where('slug', $slug)->value('id');
            DB::table('project_images')->where('project_id', $id)->delete();
            foreach (["$slug-cover.jpg", "$slug-mockup-2.jpg"] as $photo) {
                DB::table('project_images')->insert(['project_id' => $id, 'photo' => $photo, 'created_at' => now(), 'updated_at' => now()]);
            }
        }
    }
}
