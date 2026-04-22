<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name_az' => 'Dövlət və Qeyri-Hökumət Təşkilatları',
                'name_en' => 'State and Non-Governmental Organizations',
                'name_ru' => 'Государственные и Некоммерческие Организации',
            ],
            [
                'name_az' => 'Beynəlxalq Şirkətlər',
                'name_en' => 'International Companies',
                'name_ru' => 'Международные Компании',
            ],
            [
                'name_az' => 'Yerli Şirkətlər',
                'name_en' => 'Local Companies',
                'name_ru' => 'Местные Компании',
            ],
        ];

        foreach ($groups as $group) {
            Group::create([
                'name_az' => $group['name_az'],
                'name_en' => $group['name_en'],
                'name_ru' => $group['name_ru'],
                'slug_az' => Str::slug($group['name_az']),
                'slug_en' => Str::slug($group['name_en']),
                'slug_ru' => Str::slug($group['name_ru']),
            ]);
        }
    }
}
