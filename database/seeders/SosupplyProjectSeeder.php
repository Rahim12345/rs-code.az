<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * Portfolio: SO Supply (sosupply.az). Yalnız bu layihəyə toxunur —
 * FigmaProjectsSeeder bütün layihələri yenidən yazdığı üçün ayrıca saxlanılır.
 * Mockup-lar: python tools/project-mockup/mock.py tools/project-mockup/data/sosupply.json
 */
class SosupplyProjectSeeder extends Seeder
{
    public function run(): void
    {
        $slug = 'sosupply';
        $name = 'SO Supply';

        $texts = [
            'az' => ['Tikinti, təchizat və metal konstruksiya şirkəti üçün üç dilli korporativ sayt: xidmətlər, icra olunan layihələr, bloq və karyera bölməsi.',
                ['Ana səhifə', 'Haqqımızda', 'Xidmətlər (6 xidmət səhifəsi)', 'Layihələr və layihə səhifəsi', 'Bloq', 'Karyera', 'Əlaqə'],
                ['UI/UX dizayn və proqramlaşdırma', 'Mobil adaptasiya', 'Üç dil: AZ / EN / RU', 'Xidmət və layihə səhifələrində müraciət forması', 'Layihələr qalereyası']],
            'en' => ['Trilingual corporate website for a construction, supply and metal structures company: services, completed projects, blog and careers.',
                ['Home', 'About', 'Services (6 service pages)', 'Projects and project page', 'Blog', 'Careers', 'Contact'],
                ['UI/UX design and development', 'Mobile adaptation', 'Three languages: AZ / EN / RU', 'Enquiry form on service and project pages', 'Projects gallery']],
            'ru' => ['Трёхъязычный корпоративный сайт строительной компании, занимающейся поставками и металлоконструкциями: услуги, реализованные проекты, блог и карьера.',
                ['Главная', 'О компании', 'Услуги (6 страниц)', 'Проекты и страница проекта', 'Блог', 'Карьера', 'Контакты'],
                ['UI/UX дизайн и разработка', 'Мобильная адаптация', 'Три языка: AZ / EN / RU', 'Форма заявки на страницах услуг и проектов', 'Галерея проектов']],
        ];
        $labels = [
            'az' => ['Hazırlanan səhifələr', 'Görülən işlər'],
            'en' => ['Pages', 'What we did'],
            'ru' => ['Страницы', 'Что сделано'],
        ];

        $data = [
            'name' => $name, 'name_az' => $name, 'name_en' => $name, 'name_ru' => $name,
            'link' => 'https://sosupply.az', 'kateqoriya' => 'websites',
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
