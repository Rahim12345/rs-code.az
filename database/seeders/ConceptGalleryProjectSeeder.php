<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * Portfolio: Concept Gallery (pərdə, divar kağızı, jalüz və laminat salonu). Sayt hələ canlıda deyil — link boşdur. Yalnız bu layihəyə toxunur —
 * FigmaProjectsSeeder bütün layihələri yenidən yazdığı üçün ayrıca saxlanılır.
 * Mockup-lar: python tools/project-mockup/mock.py tools/project-mockup/data/concept-gallery.json
 */
class ConceptGalleryProjectSeeder extends Seeder
{
    public function run(): void
    {
        $slug = 'concept-gallery';
        $name = 'Concept Gallery';

        $texts = [
            'az' => ['Pərdə, divar kağızı, jalüz, karniz, laminat və aksesuar salonu üçün üç dilli korporativ sayt və admin panel: məhsul kateqoriyaları və kolleksiyalar, layihələr qalereyası, şourum, media və bloq.',
                ['Ana səhifə (hero slayder)', 'Haqqımızda', 'Xidmətlər', 'Məhsullar: kateqoriyalar, kolleksiyalar və qalereya', 'Layihələr (lightbox qalereya)', 'Müştəri rəyləri', 'Şourum', 'Media: foto və video', 'Bloq', 'Əlaqə'],
                ['UI/UX dizayn və proqramlaşdırma', 'Mobil adaptasiya', 'Üç dil: AZ / EN / RU', 'Modulyar admin panel: məhsul, layihə, xidmət, bloq, media, menyu və sayt parametrləri', 'Şəkilləri sürüklə-burax ilə sıralama', 'Qiymət sorğusu və əlaqə forması, e-poçt bildirişi', 'SEO parametrləri və sitemap.xml']],
            'en' => ['Trilingual corporate website and admin panel for a curtain, wallpaper, blinds, cornice, laminate and accessories showroom: product categories and collections, project gallery, showroom, media and blog.',
                ['Home (hero slider)', 'About', 'Services', 'Products: categories, collections and gallery', 'Projects (lightbox gallery)', 'Testimonials', 'Showroom', 'Media: photo and video', 'Blog', 'Contact'],
                ['UI/UX design and development', 'Mobile adaptation', 'Three languages: AZ / EN / RU', 'Modular admin panel: products, projects, services, blog, media, menus and site settings', 'Drag-and-drop image ordering', 'Price request and contact form with email notification', 'SEO settings and sitemap.xml']],
            'ru' => ['Трёхъязычный корпоративный сайт и админ-панель для салона штор, обоев, жалюзи, карнизов, ламината и аксессуаров: категории и коллекции товаров, галерея проектов, шоурум, медиа и блог.',
                ['Главная (слайдер)', 'О компании', 'Услуги', 'Продукция: категории, коллекции и галерея', 'Проекты (галерея с лайтбоксом)', 'Отзывы клиентов', 'Шоурум', 'Медиа: фото и видео', 'Блог', 'Контакты'],
                ['UI/UX дизайн и разработка', 'Мобильная адаптация', 'Три языка: AZ / EN / RU', 'Модульная админ-панель: товары, проекты, услуги, блог, медиа, меню и настройки сайта', 'Сортировка изображений перетаскиванием', 'Форма запроса цены и обратной связи с уведомлением на почту', 'SEO-настройки и sitemap.xml']],
        ];
        $labels = [
            'az' => ['Hazırlanan səhifələr', 'Görülən işlər'],
            'en' => ['Pages', 'What we did'],
            'ru' => ['Страницы', 'Что сделано'],
        ];

        $data = [
            'name' => $name, 'name_az' => $name, 'name_en' => $name, 'name_ru' => $name,
            'link' => '', 'kateqoriya' => 'websites',
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
