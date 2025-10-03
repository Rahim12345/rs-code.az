<?php

namespace Database\Seeders;

use App\Models\VizitKart;
use Illuminate\Database\Seeder;

class VizitKartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karts = [
            [
                'name_az'=>'KORPORATİV',
                'name_en'=>'CORPORATIVE',
                'name_ru'=>'КОРПОРАТИВНЫЙ',
            ],
            [
                'name_az'=>'PERSONAL',
                'name_en'=>'PERSONAL',
                'name_ru'=>'ЛИЧНОЕ',
            ],
            [
                'name_az'=>'BLANK',
                'name_en'=>'BLANK',
                'name_ru'=>'ПУСТОЙ',
            ],
            [
                'name_az'=>'FAKS ÜÇÜN BLANK',
                'name_en'=>'BLANK FOR FAX',
                'name_ru'=>'Бланк для факса',
            ]
        ];

        foreach ($karts as $kart)
        {
            VizitKart::create([
                'name_az'=>$kart['name_az'],
                'name_en'=>$kart['name_en'],
                'name_ru'=>$kart['name_ru']
            ]);
        }
    }
}
