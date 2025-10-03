<?php

namespace Database\Seeders;

use App\Models\FirmaStili;
use Illuminate\Database\Seeder;

class FirmaStiliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = [
            [
              'name_az'=>'BRENDBUK (MATKETİNG STRATEGİYASININ AÇIQLAMASI) + VİZUAL KOMUNİKASİYALARIN, MÜXTƏLİF DAŞIYICILAR ÜZƏRİNDƏ İŞLƏMƏ STANDARTLARIN VƏ QAYDALARIN AÇIQLAMASI',
              'name_en'=>'BRANDBOOK (DISCLOSURE OF MATKETING STRATEGY) + DESCRIPTION OF VISUAL COMMUNICATIONS, STANDARDS AND RULES OF WORKING ON DIFFERENT MEDIA',
              'name_ru'=>'БРЕНДБУК (РАСКРЫТИЕ СТРАТЕГИИ МАТКЕТИНГА) + ОПИСАНИЕ ВИЗУАЛЬНЫХ КОММУНИКАЦИЙ, СТАНДАРТОВ И ПРАВИЛ РАБОТЫ НА РАЗНЫХ НОСИТЕЛЯХ',
            ],
            [
                'name_az'=>'GUIDELINE (YALNIZ STANDARTLARIN, FİRMA STİLİ İŞLMƏ QAYDALARI)',
                'name_en'=>'GUIDELINE (RULES OF STANDARDS, COMPANY STYLE)',
                'name_ru'=>'РУКОВОДСТВО (ПРАВИЛА СТАНДАРТОВ, ТОЛЬКО ОБРАБОТКА В ФОРМАТИВНОМ СТИЛЕ)',
            ],
            [
                'name_az'=>'HEÇ NƏ LAZIM DEYİL',
                'name_en'=>'NO NEED',
                'name_ru'=>'НЕЗАЧЕМ',
            ],
        ];

        foreach ($styles as $style)
        {
            FirmaStili::create([
                'name_az'=>$style['name_az'],
                'name_en'=>$style['name_en'],
                'name_ru'=>$style['name_ru']
            ]);
        }
    }
}
