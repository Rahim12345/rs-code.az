<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['id' =>  4, 'name_en' => 'PHP',                   'name_az' => 'PHP'],
            ['id' =>  5, 'name_en' => 'LARAVEL',               'name_az' => 'LARAVEL'],
            ['id' =>  6, 'name_en' => 'Javascript & jQuery',   'name_az' => 'Javascript & jQuery'],
            ['id' =>  7, 'name_en' => 'HTML5 & CSS3',          'name_az' => 'HTML5 & CSS3'],
            ['id' =>  8, 'name_en' => 'TASKS',                 'name_az' => 'TASKS'],
            ['id' =>  9, 'name_en' => 'OTHER',                 'name_az' => 'BAŞQA'],
            ['id' => 11, 'name_en' => 'Useful links',          'name_az' => 'Faydalı linklər'],
            ['id' => 12, 'name_en' => 'Git & Github',          'name_az' => 'Git & Github'],
            ['id' => 13, 'name_en' => 'SQL',                   'name_az' => 'SQL'],
            ['id' => 14, 'name_en' => 'PHP TASKS',             'name_az' => 'PHP TASKS'],
            ['id' => 15, 'name_en' => 'htaccess',              'name_az' => 'htaccess'],
            ['id' => 16, 'name_en' => 'Linux',                 'name_az' => 'Linux'],
            ['id' => 17, 'name_en' => 'SQL tasks',             'name_az' => 'SQL tasks'],
            ['id' => 18, 'name_en' => 'JS tasks',              'name_az' => 'JS tasks'],
            ['id' => 19, 'name_en' => 'Joomla',                'name_az' => 'Joomla'],
            ['id' => 20, 'name_en' => 'Flutter',               'name_az' => 'Flutter'],
            ['id' => 21, 'name_en' => 'Cyber security',        'name_az' => 'Kiber təhlükəsizlik'],
            ['id' => 22, 'name_en' => 'Java',                  'name_az' => 'Java'],
            ['id' => 23, 'name_en' => 'WINDOWS',               'name_az' => 'WINDOWS'],
        ];

        foreach ($categories as $cat) {
            DB::table('note_categories')->insertOrIgnore([
                'id'         => $cat['id'],
                'name_en'    => $cat['name_en'],
                'name_az'    => $cat['name_az'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
