<?php

namespace Database\Seeders;

use App\Models\VebDasiyici;
use Illuminate\Database\Seeder;

class VebDasiyiciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name_az'=>'SAYT-VİZİT',
                'name_en'=>'SITE-VISIT',
                'name_ru'=>'ПОСЕЩЕНИЕ САЙТА',
            ],
            [
                'name_az'=>'SAYT-PORTFOLİO',
                'name_en'=>'SITE-PORTFOLIO',
                'name_ru'=>'САЙТ-ПОРТФОЛИО',
            ],
            [
                'name_az'=>'BLOG',
                'name_en'=>'BLOG',
                'name_ru'=>'БЛОГ',
            ],
            [
                'name_az'=>'SOSİAL-ŞƏBƏKƏ',
                'name_en'=>'THE SOCIAL NETWORK',
                'name_ru'=>'СОЦИАЛЬНАЯ СЕТЬ',
            ],
            [
                'name_az'=>'KORPORATİV SAYT',
                'name_en'=>'CORPORATE SITE',
                'name_ru'=>'КОРПОРАТИВНЫЙ САЙТ',
            ],
            [
                'name_az'=>'İNTERNET-MAĞAZA',
                'name_en'=>'INTERNET STORE',
                'name_ru'=>'ИНТЕРНЕТ-МАГАЗИН',
            ],
        ];

        foreach ($items as $item)
        {
            VebDasiyici::create([
                'name_az'=>$item['name_az'],
                'name_en'=>$item['name_en'],
                'name_ru'=>$item['name_ru']
            ]);
        }
    }
}
