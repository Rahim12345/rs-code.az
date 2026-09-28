<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FigmaProjectsSeeder extends Seeder
{
    public function run(): void
    {
        $new = [
            'as-technologies' => ['AS Technologies', '', '2026',
                'Ağıllı ev və bina avtomatlaşdırma şirkəti üçün korporativ sayt: məhsul kataloqu, təlim və sertifikat bölmələri.',
                'Corporate website for a smart home and building automation company: product catalogue, training and certificates.',
                'Корпоративный сайт компании по автоматизации умных домов и зданий: каталог продукции, обучение и сертификаты.'],
            'alza-fish' => ['Alza Fish', 'https://alzafish.az', '2025',
                'Akvakultura və balıq məhsulları brendi üçün desktop və mobil dizaynlı sayt: məhsullar, media və bloq.',
                'Website for an aquaculture and fish products brand with desktop and mobile design: products, media and blog.',
                'Сайт бренда аквакультуры и рыбной продукции с десктопным и мобильным дизайном: продукция, медиа и блог.'],
            'gospeak' => ['GoSpeak', '', '2025',
                'Onlayn dil öyrənmə platforması: şəxsi kabinet, speaking club və tədris materialları.',
                'Online language learning platform: personal dashboard, speaking club and learning materials.',
                'Онлайн-платформа для изучения языков: личный кабинет, speaking club и учебные материалы.'],
            'agilli-nagillar' => ['Ağıllı Nağıllar', '', '2023',
                'Kreativ agentlik üçün mobil yönümlü sayt dizaynı: xidmətlər, portfolio və partnyorlar.',
                'Mobile-first website design for a creative agency: services, portfolio and partners.',
                'Мобильный дизайн сайта для креативного агентства: услуги, портфолио и партнёры.'],
        ];

        $order = (int) DB::table('projects')->max('order_no');

        foreach ($new as $slug => [$name, $link, $year, $az, $en, $ru]) {
            $data = [
                'name' => $name, 'name_az' => $name, 'name_en' => $name, 'name_ru' => $name,
                'link' => $link, 'kateqoriya' => 'websites',
                'tarix' => $year, 'tarix_az' => $year, 'tarix_en' => $year, 'tarix_ru' => $year,
                'slug_az' => $slug, 'slug_en' => $slug, 'slug_ru' => $slug,
                'description_az' => "<p>$az</p>", 'description_en' => "<p>$en</p>", 'description_ru' => "<p>$ru</p>",
                'photo1' => "$slug-mockup-1.jpg", 'updated_at' => now(),
            ];
            if (!DB::table('projects')->where('slug', $slug)->exists()) {
                $data += ['order_no' => ++$order, 'home' => 0, 'created_at' => now()];
            }
            DB::table('projects')->updateOrInsert(['slug' => $slug], $data);
            $this->setImages($slug, []);
        }

        // Mövcud layihələr: mockup-lar əvvələ, köhnə şəkillər sonra
        foreach (['crea-az', 'mm-logistics'] as $slug) {
            $id = DB::table('projects')->where('slug', $slug)->value('id');
            if (!$id) {
                continue;
            }
            $old = DB::table('project_images')->where('project_id', $id)
                ->whereNotIn('photo', ["$slug-mockup-1.jpg", "$slug-mockup-2.jpg"])
                ->orderBy('id')->pluck('photo')->all();
            DB::table('projects')->where('id', $id)->update(['photo1' => "$slug-mockup-1.jpg", 'updated_at' => now()]);
            $this->setImages($slug, $old);
        }
    }

    private function setImages(string $slug, array $extra): void
    {
        $id = DB::table('projects')->where('slug', $slug)->value('id');
        DB::table('project_images')->where('project_id', $id)->delete();
        foreach (array_merge(["$slug-mockup-1.jpg", "$slug-mockup-2.jpg"], $extra) as $photo) {
            DB::table('project_images')->insert(['project_id' => $id, 'photo' => $photo, 'created_at' => now(), 'updated_at' => now()]);
        }
    }
}
