<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // service_id: 1=Logo, 2=Korporativ, 3=Veb, 4=SMM, 5=Çap, 6=Mobil
        // company_id: 1=BP, 2=Siemens, 3=Coca-Cola, 4=Azərenerji, 5=Azərsu, 6=PASHA, 7=Kapital, 8=Bravo, 9=Azercell, 10=Lider
        $products = [
            [
                'service_id' => 1, // Logo
                'company_id' => 6, // PASHA
                'title_az'   => 'PASHA Holding – Logo Yeniləməsi',
                'title_en'   => 'PASHA Holding – Logo Renewal',
                'title_ru'   => 'PASHA Holding – Обновление логотипа',
                'text_az'    => 'PASHA Holdinq üçün mövcud loqonun müasirləşdirilməsi layihəsi. Loqo yeni bazarlara uyğunlaşdırıldı.',
                'text_en'    => 'A modernization project for the existing logo of PASHA Holding, adapted for new markets.',
                'text_ru'    => 'Проект модернизации существующего логотипа PASHA Holding, адаптированного для новых рынков.',
                'link'       => 'https://www.pashaholding.az',
                'src'        => 'https://picsum.photos/seed/prod-pasha-logo/600/400',
                'alt'        => 'PASHA Holding Logo',
                'order_no'   => 1,
                'images'     => [
                    'https://picsum.photos/seed/prod-pasha-logo-1/1000/600',
                    'https://picsum.photos/seed/prod-pasha-logo-2/1000/600',
                ],
            ],
            [
                'service_id' => 2, // Korporativ
                'company_id' => 7, // Kapital Bank
                'title_az'   => 'Kapital Bank – Korporativ Üslub Kitabçası',
                'title_en'   => 'Kapital Bank – Brand Style Guide',
                'title_ru'   => 'Kapital Bank – Руководство по фирменному стилю',
                'text_az'    => 'Kapital Bank üçün hərtərəfli brendinq kitabçası: rənglər, tipografiya, vizit kartlar, ofis materialları.',
                'text_en'    => 'A comprehensive branding guide for Kapital Bank: colors, typography, business cards, office materials.',
                'text_ru'    => 'Комплексное руководство по брендингу для Kapital Bank: цвета, типографика, визитки, офисные материалы.',
                'link'       => 'https://www.kapitalbank.az',
                'src'        => 'https://picsum.photos/seed/prod-kapital-corp/600/400',
                'alt'        => 'Kapital Bank Corporate',
                'order_no'   => 2,
                'images'     => [
                    'https://picsum.photos/seed/prod-kapital-1/1000/600',
                    'https://picsum.photos/seed/prod-kapital-2/1000/600',
                    'https://picsum.photos/seed/prod-kapital-3/1000/600',
                ],
            ],
            [
                'service_id' => 3, // Veb
                'company_id' => 8, // Bravo
                'title_az'   => 'Bravo Supermarket – E-Commerce Platformu',
                'title_en'   => 'Bravo Supermarket – E-Commerce Platform',
                'title_ru'   => 'Bravo Supermarket – Платформа электронной коммерции',
                'text_az'    => 'Bravo üçün tam funksional onlayn alış-veriş platforması. 5000+ məhsul, ödəniş inteqrasiyası, çatdırılma sistemi.',
                'text_en'    => 'A fully functional online shopping platform for Bravo with 5000+ products, payment integration, and delivery system.',
                'text_ru'    => 'Полнофункциональная платформа онлайн-шопинга для Bravo с более чем 5000 товарами, платёжной интеграцией и системой доставки.',
                'link'       => 'https://www.bravo.az',
                'src'        => 'https://picsum.photos/seed/prod-bravo-web/600/400',
                'alt'        => 'Bravo E-Commerce',
                'order_no'   => 3,
                'images'     => [
                    'https://picsum.photos/seed/prod-bravo-1/1000/600',
                    'https://picsum.photos/seed/prod-bravo-2/1000/600',
                ],
            ],
            [
                'service_id' => 4, // SMM
                'company_id' => 9, // Azercell
                'title_az'   => 'Azercell – Sosial Media Kampaniyası',
                'title_en'   => 'Azercell – Social Media Campaign',
                'title_ru'   => 'Azercell – Кампания в социальных сетях',
                'text_az'    => 'Azercell üçün 6 aylıq SMM kampaniyası. Instagram, Facebook, TikTok platformalarında kreativ kontent strategiyası.',
                'text_en'    => 'A 6-month SMM campaign for Azercell with a creative content strategy across Instagram, Facebook, and TikTok platforms.',
                'text_ru'    => '6-месячная SMM-кампания для Azercell с творческой контент-стратегией на платформах Instagram, Facebook и TikTok.',
                'link'       => 'https://www.azercell.com',
                'src'        => 'https://picsum.photos/seed/prod-azercell-smm/600/400',
                'alt'        => 'Azercell SMM',
                'order_no'   => 4,
                'images'     => [
                    'https://picsum.photos/seed/prod-azercell-1/1000/600',
                    'https://picsum.photos/seed/prod-azercell-2/1000/600',
                ],
            ],
            [
                'service_id' => 5, // Çap
                'company_id' => 2, // Siemens
                'title_az'   => 'Siemens Azerbaijan – Çap Materialları',
                'title_en'   => 'Siemens Azerbaijan – Print Materials',
                'title_ru'   => 'Siemens Azerbaijan – Полиграфические материалы',
                'text_az'    => 'Siemens Azerbaijan üçün broşür, katalog, reklam materialları dizaynı. 4 dilli çap paketi.',
                'text_en'    => 'Design of brochures, catalogs, and advertising materials for Siemens Azerbaijan. 4-language print package.',
                'text_ru'    => 'Дизайн брошюр, каталогов и рекламных материалов для Siemens Azerbaijan. Полиграфический пакет на 4 языках.',
                'link'       => 'https://www.siemens.az',
                'src'        => 'https://picsum.photos/seed/prod-siemens-print/600/400',
                'alt'        => 'Siemens Print',
                'order_no'   => 5,
                'images'     => [
                    'https://picsum.photos/seed/prod-siemens-1/1000/600',
                    'https://picsum.photos/seed/prod-siemens-2/1000/600',
                    'https://picsum.photos/seed/prod-siemens-3/1000/600',
                ],
            ],
            [
                'service_id' => 6, // Mobil
                'company_id' => 4, // Azərenerji
                'title_az'   => 'Azərenerji – Müştəri Mobil Tətbiqi',
                'title_en'   => 'Azərenerji – Customer Mobile Application',
                'title_ru'   => 'Азерэнержи – Мобильное приложение для клиентов',
                'text_az'    => 'Azərenerji müştəriləri üçün sayğac oxunuşu, ödəniş, müraciət funksiyalı mobil tətbiq UI/UX dizaynı.',
                'text_en'    => 'UI/UX design for a mobile application with meter reading, payment, and request functions for Azərenerji customers.',
                'text_ru'    => 'UI/UX дизайн мобильного приложения с функциями считывания счётчиков, оплаты и подачи заявок для клиентов Азерэнержи.',
                'link'       => 'https://www.azerenerji.gov.az',
                'src'        => 'https://picsum.photos/seed/prod-azerenerji-mobile/600/400',
                'alt'        => 'Azərenerji Mobile App',
                'order_no'   => 6,
                'images'     => [
                    'https://picsum.photos/seed/prod-azerenerji-1/1000/600',
                    'https://picsum.photos/seed/prod-azerenerji-2/1000/600',
                ],
            ],
            [
                'service_id' => 1, // Logo
                'company_id' => 10, // Lider
                'title_az'   => 'Lider TV – Kanal Yayın Qrafikası',
                'title_en'   => 'Lider TV – Channel Broadcast Graphics',
                'title_ru'   => 'Lider TV – Эфирная графика канала',
                'text_az'    => 'Lider TV üçün tam yayım qrafika paketi: ident, titles, lower-thirds, örtüklər.',
                'text_en'    => 'A complete broadcast graphics package for Lider TV: idents, titles, lower-thirds, overlays.',
                'text_ru'    => 'Полный пакет эфирной графики для Lider TV: айдентика, титры, нижние трети, оверлеи.',
                'link'       => 'https://www.lider.az',
                'src'        => 'https://picsum.photos/seed/prod-lider-tv/600/400',
                'alt'        => 'Lider TV Graphics',
                'order_no'   => 7,
                'images'     => [
                    'https://picsum.photos/seed/prod-lider-1/1000/600',
                    'https://picsum.photos/seed/prod-lider-2/1000/600',
                ],
            ],
            [
                'service_id' => 3, // Veb
                'company_id' => 1, // BP
                'title_az'   => 'BP Azerbaijan – Korporativ Veb Sayt',
                'title_en'   => 'BP Azerbaijan – Corporate Website',
                'title_ru'   => 'BP Azerbaijan – Корпоративный сайт',
                'text_az'    => 'BP Azerbaijan üçün çoxtilli korporativ veb sayt. 3 dil dəstəyi, xəbər bölməsi, layihə portfelü.',
                'text_en'    => 'A multilingual corporate website for BP Azerbaijan with 3-language support, news section, and project portfolio.',
                'text_ru'    => 'Многоязычный корпоративный веб-сайт для BP Azerbaijan с поддержкой 3 языков, разделом новостей и портфолио проектов.',
                'link'       => 'https://www.bp.com/az',
                'src'        => 'https://picsum.photos/seed/prod-bp-web/600/400',
                'alt'        => 'BP Azerbaijan Website',
                'order_no'   => 8,
                'images'     => [
                    'https://picsum.photos/seed/prod-bp-1/1000/600',
                    'https://picsum.photos/seed/prod-bp-2/1000/600',
                    'https://picsum.photos/seed/prod-bp-3/1000/600',
                ],
            ],
        ];

        foreach ($products as $data) {
            $images = $data['images'];
            unset($data['images']);

            $product = Product::create([
                'service_id' => $data['service_id'],
                'company_id' => $data['company_id'],
                'title_az'   => $data['title_az'],
                'title_en'   => $data['title_en'],
                'title_ru'   => $data['title_ru'],
                'slug_az'    => Str::slug($data['title_az']),
                'slug_en'    => Str::slug($data['title_en']),
                'slug_ru'    => Str::slug($data['title_ru']),
                'text_az'    => $data['text_az'],
                'text_en'    => $data['text_en'],
                'text_ru'    => $data['text_ru'],
                'link'       => $data['link'],
                'src'        => $data['src'],
                'alt'        => $data['alt'],
                'order_no'   => $data['order_no'],
                'hits'       => rand(50, 500),
            ]);

            foreach ($images as $i => $src) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'src'        => $src,
                    'order_no'   => $i + 1,
                ]);
            }
        }
    }
}
