<?php

namespace Database\Seeders;

use App\Models\VebDasiyiciNumune;
use Illuminate\Database\Seeder;

class VebDasiyiciNumuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'veb_dasiyici_id'=>1,
                'link'=>'https://www.netlify.com/blog/2018/08/14/announcing-netlify-drop-the-simplicity-of-bitballoon-with-the-added-power-of-netlify/',
            ],
            [
                'veb_dasiyici_id'=>1,
                'link'=>'http://mosaicthemes.net/mountain/index-paralax.html',
            ],
            [
                'veb_dasiyici_id'=>1,
                'link'=>'http://carna.webgearmedia.com/index.html',
            ],
            [
                'veb_dasiyici_id'=>2,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>2,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>2,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>3,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>3,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>3,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>4,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>4,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>4,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>5,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>5,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>5,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>6,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>6,
                'link'=>'javascript: void(0)',
            ],
            [
                'veb_dasiyici_id'=>6,
                'link'=>'javascript: void(0)',
            ]
        ];

        foreach ($items as $item)
        {
            VebDasiyiciNumune::create([
                'veb_dasiyici_id' =>$item['veb_dasiyici_id'],
                'link' =>$item['link']
            ]);
        }
    }
}
