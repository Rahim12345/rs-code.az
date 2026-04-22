<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name_az'  => 'Logo Dizaynı',
                'name_en'  => 'Logo Design',
                'name_ru'  => 'Дизайн Логотипа',
                'src'      => 'https://img.icons8.com/color/96/000000/logo.png',
                'alt'      => 'logo-design',
                'on_home'  => 1,
                'order_no' => 1,
            ],
            [
                'name_az'  => 'Korporativ Üslub',
                'name_en'  => 'Corporate Identity',
                'name_ru'  => 'Корпоративный Стиль',
                'src'      => 'https://img.icons8.com/color/96/000000/document.png',
                'alt'      => 'corporate-identity',
                'on_home'  => 1,
                'order_no' => 2,
            ],
            [
                'name_az'  => 'Veb Sayt',
                'name_en'  => 'Web Site',
                'name_ru'  => 'Веб-Сайт',
                'src'      => 'https://img.icons8.com/color/96/000000/web.png',
                'alt'      => 'web-site',
                'on_home'  => 1,
                'order_no' => 3,
            ],
            [
                'name_az'  => 'SMM Xidmətləri',
                'name_en'  => 'SMM Services',
                'name_ru'  => 'SMM Услуги',
                'src'      => 'https://img.icons8.com/color/96/000000/instagram-new.png',
                'alt'      => 'smm-services',
                'on_home'  => 1,
                'order_no' => 4,
            ],
            [
                'name_az'  => 'Çap Dizaynı',
                'name_en'  => 'Print Design',
                'name_ru'  => 'Полиграфический Дизайн',
                'src'      => 'https://img.icons8.com/color/96/000000/print.png',
                'alt'      => 'print-design',
                'on_home'  => 1,
                'order_no' => 5,
            ],
            [
                'name_az'  => 'Mobil Tətbiq',
                'name_en'  => 'Mobile Application',
                'name_ru'  => 'Мобильное Приложение',
                'src'      => 'https://img.icons8.com/color/96/000000/smartphone-tablet.png',
                'alt'      => 'mobile-app',
                'on_home'  => 0,
                'order_no' => 6,
            ],
            [
                'name_az'  => 'Reklam Banneri',
                'name_en'  => 'Advertising Banner',
                'name_ru'  => 'Рекламный Баннер',
                'src'      => 'https://img.icons8.com/color/96/000000/advertisement.png',
                'alt'      => 'advertising-banner',
                'on_home'  => 0,
                'order_no' => 7,
            ],
            [
                'name_az'  => 'Video Produksiya',
                'name_en'  => 'Video Production',
                'name_ru'  => 'Видео Продакшн',
                'src'      => 'https://img.icons8.com/color/96/000000/video.png',
                'alt'      => 'video-production',
                'on_home'  => 0,
                'order_no' => 8,
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'name_az'  => $service['name_az'],
                'name_en'  => $service['name_en'],
                'name_ru'  => $service['name_ru'],
                'slug_az'  => Str::slug($service['name_az']),
                'slug_en'  => Str::slug($service['name_en']),
                'slug_ru'  => Str::slug($service['name_ru']),
                'src'      => $service['src'],
                'alt'      => $service['alt'],
                'on_home'  => $service['on_home'],
                'order_no' => $service['order_no'],
            ]);
        }
    }
}
