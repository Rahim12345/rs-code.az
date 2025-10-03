<?php

namespace Database\Seeders;

use App\Models\Konvert;
use Illuminate\Database\Seeder;

class KonvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $konverts = [
            [
                'name_az'=>'AVRO (DL)',
                'name_en'=>'EURO (DL)',
                'name_ru'=>'ЕВРО (ДЛ)',
            ],
            [
                'name_az'=>'А4 (С4)',
                'name_en'=>'А4 (С4)',
                'name_ru'=>'А4 (С4)',
            ],
            [
                'name_az'=>'A5 (C5)',
                'name_en'=>'А5 (С5)',
                'name_ru'=>'А5 (С5)',
            ],
            [
                'name_az'=>'QOVLUQ',
                'name_en'=>'FOLDER',
                'name_ru'=>'ПАПКА',
            ],
            [
                'name_az'=>'TEXNİKİ, LAYİHƏ VƏ DİGƏR SƏNƏDLƏŞMƏ ÜÇÜN ŞABLONLAR',
                'name_en'=>'TEMPLATES FOR TECHNICAL, DESIGN AND OTHER DOCUMENTATION',
                'name_ru'=>'ШАБЛОНЫ ТЕХНИЧЕСКОЙ, ПРОЕКТНОЙ И ДРУГОЙ ДОКУМЕНТАЦИИ',
            ],
            [
                'name_az'=>'CD/DVD ÜZ QABI',
                'name_en'=>'CD / DVD COVER',
                'name_ru'=>'ОБЛОЖКА CD/DVD',
            ],
            [
                'name_az'=>'TƏBRİK AÇIQÇASININ ŞABLONU',
                'name_en'=>'CONGRATULATION CARD TEMPLATE',
                'name_ru'=>'ШАБЛОН ПОЗДРАВИТЕЛЬНОЙ ОТКРЫТКИ',
            ],
            [
                'name_az'=>'DƏVATNAMƏ ŞABLONU',
                'name_en'=>'INVITATION TEMPLATE',
                'name_ru'=>'ПРИГЛАШЕНИЕ',
            ],
            [
                'name_az'=>'FLAYER',
                'name_en'=>'FLAYER',
                'name_ru'=>'ФЛАЙЕР',
            ],
            [
                'name_az'=>'BUKLET',
                'name_en'=>'BOOKLET',
                'name_ru'=>'БУКЛЕТ',
            ],
            [
                'name_az'=>'XARİC VƏ ÇAP REKLAMI ÜÇÜN MODUL ŞƏBƏKƏSİ',
                'name_en'=>'MODULE NETWORK FOR EXTERNAL AND PRINTING ADVERTISING',
                'name_ru'=>'МОДУЛЬНАЯ СЕТЬ ДЛЯ ЗАРУБЕЖНОЙ И ПЕЧАТНОЙ РЕКЛАМЫ',
            ],
            [
                'name_az'=>'İKON',
                'name_en'=>'ICON',
                'name_ru'=>'ЗНАЧОК',
            ],
            [
                'name_az'=>'BEYC',
                'name_en'=>'BEYC',
                'name_ru'=>'БЕЙС',
            ],
            [
                'name_az'=>'BURAXILIŞ',
                'name_en'=>'RELEASE',
                'name_ru'=>'ВЫПУСКАТЬ',
            ],
            [
                'name_az'=>'BLOKNOT',
                'name_en'=>'NOTEBOOK',
                'name_ru'=>'НОУТБУК',
            ],
            [
                'name_az'=>'QƏLƏM',
                'name_en'=>'PEN',
                'name_ru'=>'РУЧКА',
            ],
            [
                'name_az'=>'MASAÜSTÜ BAYRAQ',
                'name_en'=>'TABLE FLAG',
                'name_ru'=>'ФЛАГ ТАБЛИЦЫ',
            ],
            [
                'name_az'=>'KÜLQABI',
                'name_en'=>'ASH CUP',
                'name_ru'=>'ЯСЕНЬ КУБОК',
            ],
            [
                'name_az'=>'ALIŞQAN',
                'name_en'=>'LIGHTER',
                'name_ru'=>'ALIŞQAN',
            ],
            [
                'name_az'=>'FİNCAN',
                'name_en'=>'CUP',
                'name_ru'=>'ЧАШКА',
            ],
            [
                'name_az'=>'XÜSUSİ GEYİM (NÖVÜNÜ QEYD EDİN)',
                'name_en'=>'SPECIAL CLOTHING (PLEASE NOTE)',
                'name_ru'=>'СПЕЦИАЛЬНАЯ ОДЕЖДА (ВНИМАНИЕ)',
            ],
            [
                'name_az'=>'AVTONƏQLİYYAT (AVTOMOBİL VƏ YA XÜSUSİ TEXNİKANİN MARKASI)',
                'name_en'=>'MOTOR VEHICLE (BRAND OF CARS OR SPECIAL EQUIPMENT)',
                'name_ru'=>'АВТОТРАНСПОРТНОЕ СРЕДСТВО (МАРКИ АВТОМОБИЛЕЙ ИЛИ СПЕЦИАЛЬНОЙ ТЕХНИКИ)',
            ],
            [
                'name_az'=>'STEND',
                'name_en'=>'STAND',
                'name_ru'=>'СТОЯТЬ',
            ],
            [
                'name_az'=>'EKSTERYER TƏRTİBATI',
                'name_en'=>'EXTERIOR ORDER',
                'name_ru'=>'ВНЕШНИЙ ЗАКАЗ',
            ],
            [
                'name_az'=>'İNTERYER TƏRTİBATI',
                'name_en'=>'INTERIOR ORDER',
                'name_ru'=>'ЗАКАЗ ИНТЕРЬЕРА',
            ]
        ];

        foreach ($konverts as $konvert)
        {
            Konvert::create([
               'name_az'=>$konvert['name_az'],
               'name_en'=>$konvert['name_en'],
               'name_ru'=>$konvert['name_ru']
            ]);
        }
    }
}
