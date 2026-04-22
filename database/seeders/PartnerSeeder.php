<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'SOCAR',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/SOCAR_logo.svg/200px-SOCAR_logo.svg.png',
                'link' => 'https://www.socar.az',
            ],
            [
                'name' => 'Kapital Bank',
                'logo' => 'https://picsum.photos/seed/kapitalbank/200/80',
                'link' => 'https://www.kapitalbank.az',
            ],
            [
                'name' => 'PASHA Holding',
                'logo' => 'https://picsum.photos/seed/pashaholding/200/80',
                'link' => 'https://www.pashaholding.az',
            ],
            [
                'name' => 'Azərenerji',
                'logo' => 'https://picsum.photos/seed/azerenerji/200/80',
                'link' => 'https://www.azerenerji.gov.az',
            ],
            [
                'name' => 'Silk Way Airlines',
                'logo' => 'https://picsum.photos/seed/silkway/200/80',
                'link' => 'https://www.silkwayairlines.com',
            ],
            [
                'name' => 'ABB Bank',
                'logo' => 'https://picsum.photos/seed/abbbank/200/80',
                'link' => 'https://www.abb-bank.az',
            ],
            [
                'name' => 'Bravo Supermarket',
                'logo' => 'https://picsum.photos/seed/bravo/200/80',
                'link' => 'https://www.bravo.az',
            ],
            [
                'name' => 'Lider TV',
                'logo' => 'https://picsum.photos/seed/lidertv/200/80',
                'link' => 'https://www.lider.az',
            ],
            [
                'name' => 'Azercell',
                'logo' => 'https://picsum.photos/seed/azercell/200/80',
                'link' => 'https://www.azercell.com',
            ],
            [
                'name' => 'Bakcell',
                'logo' => 'https://picsum.photos/seed/bakcell/200/80',
                'link' => 'https://www.bakcell.com',
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
