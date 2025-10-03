<?php

namespace Database\Seeders;

use App\Models\VebVesait;
use Illuminate\Database\Seeder;

class VebVesaitSeeder extends Seeder
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
                'name_az'=>'XƏBƏRLƏRƏ ABUNƏ',
                'name_en'=>'SUBSCRIBE TO THE NEWS',
                'name_ru'=>'ПОДПИСАТЬСЯ НА НОВОСТИ'
            ],
            [
                'name_az'=>'FOTOALBOM',
                'name_en'=>'PHOTO ALBUM',
                'name_ru'=>'ФОТОАЛЬБОМ'
            ],
            [
                'name_az'=>'SAYTDA AXTARIŞ',
                'name_en'=>'SEARCH ON THE SITE',
                'name_ru'=>'ПОИСК НА САЙТЕ'
            ],
            [
                'name_az'=>'YÜKLƏNƏ BİLƏCƏK FAYLLAR',
                'name_en'=>'FILES THAT CAN BE DOWNLOADED',
                'name_ru'=>'ФАЙЛЫ, КОТОРЫЕ МОЖНО СКАЧАТЬ'
            ],
            [
                'name_az'=>'ONLİNE MƏSLƏHƏTÇİ',
                'name_en'=>'ONLINE CONSULTANT',
                'name_ru'=>'ОНЛАЙН-КОНСУЛЬТАНТ'
            ],
            [
                'name_az'=>'BLOQ',
                'name_en'=>'BLOG',
                'name_ru'=>'БЛОГ'
            ]
        ];

        foreach ($items as $item)
        {
            VebVesait::create([
                'name_az'=>$item['name_az'],
                'name_en'=>$item['name_en'],
                'name_ru'=>$item['name_ru']
            ]);
        }
    }
}
