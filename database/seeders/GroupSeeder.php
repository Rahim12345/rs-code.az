<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'name_az'=>'dövlət və qeyri hökümət təşkilatları',
                'name_en'=>'dövlət və qeyri hökümət təşkilatları',
                'name_ru'=>'dövlət və qeyri hökümət təşkilatları',
            ],
            [
                'name_az'=>'qlobal şirkətlər',
                'name_en'=>'qlobal şirkətlər',
                'name_ru'=>'qlobal şirkətlər',
            ],
            [
                'name_az'=>'yerli şirkətlər',
                'name_en'=>'yerli şirkətlər',
                'name_ru'=>'yerli şirkətlər',
            ],
        ];

        foreach ($groups as $group) {
            Group::create([
                'name_az'=>$group['name_az'],
                'name_en'=>$group['name_en'],
                'name_ru'=>$group['name_ru'],

                'slug_az'=>str_slug($group['name_az']),
                'slug_en'=>str_slug($group['name_en']),
                'slug_ru'=>str_slug($group['name_ru']),
            ]);
        }
    }
}
