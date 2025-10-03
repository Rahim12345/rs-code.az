<?php

namespace Database\Seeders;

use App\Models\LogoTip;
use Illuminate\Database\Seeder;

class LogoTipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tips   = [
            [
                'src'=>'1.png',
                'name_az'=>'Kombinə edilmiş: İşarə + adın yazılışı',
                'name_en'=>'Combined: Sign + spelling of the name',
                'name_ru'=>'Комбинированный: Знак + написание имени',
            ],
            [
                'src'=>'2.png',
                'name_az'=>'İnteqrasiya edilmiş: işarə adın yazılışına',
                'name_en'=>'Integrated: hint to name spelling',
                'name_ru'=>'Интегрировано: подсказка к написанию имени',
            ],
            [
                'src'=>'3.png',
                'name_az'=>'Şirft',
                'name_en'=>'Shirft',
                'name_ru'=>'Рубашка',
            ],
            [
                'src'=>'4.png',
                'name_az'=>'Şirft-Kompozisiya',
                'name_en'=>'Shirft-Composition',
                'name_ru'=>'Рубашка-Композиция',
            ],
            [
                'src'=>'5.png',
                'name_az'=>'Personaj',
                'name_en'=>'Character',
                'name_ru'=>'Персонаж',
            ],
            [
                'src'=>'6.png',
                'name_az'=>'Yalnız işarə',
                'name_en'=>'Just a hint',
                'name_ru'=>'Просто намек',
            ],
            [
                'src'=>'7.png',
                'name_az'=>'Gerb',
                'name_en'=>'Coat of arms',
                'name_ru'=>'Герб',
            ],
            [
                'src'=>'8.png',
                'name_az'=>'Emblem',
                'name_en'=>'Emblem',
                'name_ru'=>'Эмблема',
            ],
            [
                'src'=>'9.png',
                'name_az'=>'Monoqram',
                'name_en'=>'Monoqram',
                'name_ru'=>'Monoqram',
            ],
            [
                'src'=>'10.png',
                'name_az'=>'Liqatura',
                'name_en'=>'Monogram',
                'name_ru'=>'Вензель',
            ],
            [
                'src'=>'11.png',
                'name_az'=>'Oranament',
                'name_en'=>'Oranament',
                'name_ru'=>'орнамент',
            ],
            [
                'src'=>'12.png',
                'name_az'=>'Dinamik',
                'name_en'=>'Dynamic',
                'name_ru'=>'Динамический',
            ]
        ];

        foreach ($tips as $tip)
        {
            LogoTip::create([
                'src'=>$tip['src'],
                'name_az'=>$tip['name_az'],
                'name_en'=>$tip['name_en'],
                'name_ru'=>$tip['name_ru']
            ]);
        }
    }
}
