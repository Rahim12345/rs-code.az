<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'full_name'    => 'Rəşad Əliyev',
                'professional' => 'Baş Dizayner & Kreativ Direktor',
                'src'          => 'https://picsum.photos/seed/rashad/400/400',
                'order_no'     => 1,
            ],
            [
                'full_name'    => 'Nərmin Hüseynova',
                'professional' => 'UI/UX Dizayner',
                'src'          => 'https://picsum.photos/seed/nermin/400/400',
                'order_no'     => 2,
            ],
            [
                'full_name'    => 'Tural Məmmədov',
                'professional' => 'Full-Stack Veb Proqramçı',
                'src'          => 'https://picsum.photos/seed/tural/400/400',
                'order_no'     => 3,
            ],
            [
                'full_name'    => 'Günel Qasımova',
                'professional' => 'Brendinq Mütəxəssisi',
                'src'          => 'https://picsum.photos/seed/gunel/400/400',
                'order_no'     => 4,
            ],
            [
                'full_name'    => 'Elvin Babayev',
                'professional' => 'Motion Qrafik Dizayner',
                'src'          => 'https://picsum.photos/seed/elvin/400/400',
                'order_no'     => 5,
            ],
            [
                'full_name'    => 'Leyla Mustafayeva',
                'professional' => 'SMM & Rəqəmsal Marketinq',
                'src'          => 'https://picsum.photos/seed/leyla/400/400',
                'order_no'     => 6,
            ],
            [
                'full_name'    => 'Fərid Həsənov',
                'professional' => 'Qrafik Dizayner',
                'src'          => 'https://picsum.photos/seed/farid/400/400',
                'order_no'     => 7,
            ],
        ];

        foreach ($members as $member) {
            Team::create($member);
        }
    }
}
