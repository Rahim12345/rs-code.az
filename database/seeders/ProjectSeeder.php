<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name'       => 'Kapital Bank Korporativ Sayt',
                'link'       => 'https://www.kapitalbank.az',
                'tarix'      => '2024',
                'kateqoriya' => 'Veb Sayt',
                'home'       => 1,
                'order_no'   => 1,
                'photo1'     => 'https://picsum.photos/seed/project-bank/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-bank-1/1200/700',
                    'https://picsum.photos/seed/proj-bank-2/1200/700',
                    'https://picsum.photos/seed/proj-bank-3/1200/700',
                ],
            ],
            [
                'name'       => 'SOCAR Logo & Korporativ Üslub',
                'link'       => 'https://www.socar.az',
                'tarix'      => '2023',
                'kateqoriya' => 'Brendinq',
                'home'       => 1,
                'order_no'   => 2,
                'photo1'     => 'https://picsum.photos/seed/project-socar/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-socar-1/1200/700',
                    'https://picsum.photos/seed/proj-socar-2/1200/700',
                ],
            ],
            [
                'name'       => 'Silk Way Airlines İnternet Mağaza',
                'link'       => 'https://www.silkwayairlines.com',
                'tarix'      => '2024',
                'kateqoriya' => 'E-Commerce',
                'home'       => 1,
                'order_no'   => 3,
                'photo1'     => 'https://picsum.photos/seed/project-airline/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-airline-1/1200/700',
                    'https://picsum.photos/seed/proj-airline-2/1200/700',
                    'https://picsum.photos/seed/proj-airline-3/1200/700',
                ],
            ],
            [
                'name'       => 'Bravo Supermarket Mobil Tətbiq UI',
                'link'       => 'https://www.bravo.az',
                'tarix'      => '2023',
                'kateqoriya' => 'Mobil Dizayn',
                'home'       => 1,
                'order_no'   => 4,
                'photo1'     => 'https://picsum.photos/seed/project-bravo/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-bravo-1/1200/700',
                    'https://picsum.photos/seed/proj-bravo-2/1200/700',
                ],
            ],
            [
                'name'       => 'Lider TV Yeni Brendinq',
                'link'       => 'https://www.lider.az',
                'tarix'      => '2022',
                'kateqoriya' => 'Brendinq',
                'home'       => 0,
                'order_no'   => 5,
                'photo1'     => 'https://picsum.photos/seed/project-lider/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-lider-1/1200/700',
                    'https://picsum.photos/seed/proj-lider-2/1200/700',
                    'https://picsum.photos/seed/proj-lider-3/1200/700',
                ],
            ],
            [
                'name'       => 'ABB Bank Portfolio Saytı',
                'link'       => 'https://www.abb-bank.az',
                'tarix'      => '2024',
                'kateqoriya' => 'Veb Sayt',
                'home'       => 0,
                'order_no'   => 6,
                'photo1'     => 'https://picsum.photos/seed/project-abb/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-abb-1/1200/700',
                    'https://picsum.photos/seed/proj-abb-2/1200/700',
                ],
            ],
            [
                'name'       => 'AzərGold Korporativ Üslub',
                'link'       => 'https://www.azergold.az',
                'tarix'      => '2023',
                'kateqoriya' => 'Korporativ Üslub',
                'home'       => 0,
                'order_no'   => 7,
                'photo1'     => 'https://picsum.photos/seed/project-gold/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-gold-1/1200/700',
                    'https://picsum.photos/seed/proj-gold-2/1200/700',
                    'https://picsum.photos/seed/proj-gold-3/1200/700',
                ],
            ],
            [
                'name'       => 'Azercell Reklam Kampaniyası',
                'link'       => 'https://www.azercell.com',
                'tarix'      => '2022',
                'kateqoriya' => 'Reklam Dizaynı',
                'home'       => 0,
                'order_no'   => 8,
                'photo1'     => 'https://picsum.photos/seed/project-azercell/800/500',
                'images'     => [
                    'https://picsum.photos/seed/proj-azercell-1/1200/700',
                    'https://picsum.photos/seed/proj-azercell-2/1200/700',
                ],
            ],
        ];

        foreach ($projects as $data) {
            $images = $data['images'];
            unset($data['images']);

            $project = Project::create([
                'name'       => $data['name'],
                'link'       => $data['link'],
                'tarix'      => $data['tarix'],
                'kateqoriya' => $data['kateqoriya'],
                'home'       => $data['home'],
                'order_no'   => $data['order_no'],
                'slug'       => Str::slug($data['name']),
                'photo1'     => $data['photo1'],
            ]);

            foreach ($images as $img) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'photo'      => $img,
                ]);
            }
        }
    }
}
