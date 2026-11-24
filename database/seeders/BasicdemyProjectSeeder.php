<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * Portfolio: BasicDemy (tədris mərkəzi, basicdemy.com). Footer-də "UI & Dev: RS Code" backlinki var. Yalnız bu layihəyə toxunur.
 * Mockup-lar: python tools/project-mockup/mock.py tools/project-mockup/data/basicdemy.json
 */
class BasicdemyProjectSeeder extends Seeder
{
    public function run(): void
    {
        $slug = 'basicdemy';
        $name = 'BasicDemy';

        $texts = [
            'az' => ['Bakıda fəaliyyət göstərən BasicDemy tədris mərkəzi üçün korporativ sayt və admin panel: 8 təlim istiqaməti (data analitika, Python, qrafik dizayn, SMM, marketinq, mühasibatlıq, ingilis dili), Basic Abroad xaricdə təhsil bölməsi, müəllimlər və bloq. Hər təlim səhifəsi axtarış sorğusuna ("python kursu", "smm kursu") uyğun qurulub.',
                ['Ana səhifə', 'Təlimlər və hər təlim üçün ayrıca səhifə: proqram, kimlər üçündür, FAQ', 'Xaricdə təhsil və ölkə səhifələri', 'Müəllimlər', 'Haqqımızda', 'Bloq və RSS', 'Əlaqə və müraciət forması'],
                ['UI/UX dizayn və proqramlaşdırma', 'Mobil adaptasiya', 'Admin panel: təlimlər, ölkələr, müəllimlər, bloq, rəylər, müraciətlər, səhifələr və parametrlər', 'Müraciət formaları və müraciətlərin admin paneldə izlənməsi', 'Texniki SEO: schema (Course, FAQPage, BlogPosting), sitemap.xml, robots.txt, footer-də daxili linklər', 'Kurs idarəetmə sistemi (LMS) ilə əlaqə']],
            'en' => ['Corporate website and admin panel for BasicDemy, a training centre in Baku: 8 course tracks (data analytics, Python, graphic design, SMM, marketing, accounting, English), the Basic Abroad study-abroad section, teachers and a blog. Each course page targets its own search query ("python course", "smm course").',
                ['Home', 'Courses, with a dedicated page per course: curriculum, who it is for, FAQ', 'Study abroad and country pages', 'Teachers', 'About', 'Blog and RSS', 'Contact and application form'],
                ['UI/UX design and development', 'Mobile adaptation', 'Admin panel: courses, countries, teachers, blog, reviews, leads, pages and settings', 'Application forms with lead tracking in the admin panel', 'Technical SEO: schema (Course, FAQPage, BlogPosting), sitemap.xml, robots.txt, internal footer links', 'Link to the course management system (LMS)']],
            'ru' => ['Корпоративный сайт и админ-панель для учебного центра BasicDemy в Баку: 8 направлений обучения (аналитика данных, Python, графический дизайн, SMM, маркетинг, бухгалтерия, английский язык), раздел обучения за рубежом Basic Abroad, преподаватели и блог. Каждая страница курса оптимизирована под свой поисковый запрос.',
                ['Главная', 'Курсы и отдельная страница для каждого курса: программа, для кого, FAQ', 'Обучение за рубежом и страницы стран', 'Преподаватели', 'О нас', 'Блог и RSS', 'Контакты и форма заявки'],
                ['UI/UX дизайн и разработка', 'Мобильная адаптация', 'Админ-панель: курсы, страны, преподаватели, блог, отзывы, заявки, страницы и настройки', 'Формы заявок с учётом заявок в админ-панели', 'Техническое SEO: schema (Course, FAQPage, BlogPosting), sitemap.xml, robots.txt, внутренние ссылки в футере', 'Связь с системой управления обучением (LMS)']],
        ];
        $labels = [
            'az' => ['Hazırlanan səhifələr', 'Görülən işlər'],
            'en' => ['Pages', 'What we did'],
            'ru' => ['Страницы', 'Что сделано'],
        ];

        $data = [
            'name' => $name, 'name_az' => $name, 'name_en' => $name, 'name_ru' => $name,
            'link' => 'https://basicdemy.com', 'kateqoriya' => 'websites',
            'tarix' => '2026', 'tarix_az' => '2026', 'tarix_en' => '2026', 'tarix_ru' => '2026',
            'slug_az' => $slug, 'slug_en' => $slug, 'slug_ru' => $slug,
            'photo1' => "$slug-cover.jpg", 'updated_at' => now(),
        ];
        $li = fn ($items) => '<ul><li>' . implode('</li><li>', $items) . '</li></ul>';
        foreach ($texts as $l => [$lead, $pages, $works]) {
            $data['description_' . $l] = "<p>$lead</p><h3>{$labels[$l][0]}</h3>" . $li($pages) . "<h3>{$labels[$l][1]}</h3>" . $li($works);
        }

        if (! DB::table('projects')->where('slug', $slug)->exists()) {
            $data += ['order_no' => (int) DB::table('projects')->max('order_no') + 1, 'home' => 0, 'created_at' => now()];
        }
        DB::table('projects')->updateOrInsert(['slug' => $slug], $data);

        $id = DB::table('projects')->where('slug', $slug)->value('id');
        DB::table('project_images')->where('project_id', $id)->delete();
        foreach (["$slug-cover.jpg", "$slug-mockup-2.jpg"] as $photo) {
            DB::table('project_images')->insert(['project_id' => $id, 'photo' => $photo, 'created_at' => now(), 'updated_at' => now()]);
        }
    }
}
