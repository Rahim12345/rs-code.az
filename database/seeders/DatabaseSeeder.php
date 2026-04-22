<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Sistem / Lookup cədvəlləri
            AdminSeeder::class,
            UserSeeder::class,

            // Brif seçimləri (sıra vacibdir)
            LogoTipSeeder::class,
            VizitKartSeeder::class,
            KonvertSeeder::class,
            FirmaStiliSeeder::class,
            VebDasiyiciSeeder::class,
            VebDasiyiciNumuneSeeder::class,
            VebVesaitSeeder::class,

            // Əsas kontent
            AboutSeeder::class,
            GroupSeeder::class,
            ServiceSeeder::class,
            TeamSeeder::class,
            PartnerSeeder::class,
            BlogSeeder::class,
            CommentSeeder::class,

            // Şirkət & Məhsul (GroupSeeder-dən sonra)
            CompanySeeder::class,
            ProductSeeder::class,

            // Layihə portfeli
            ProjectSeeder::class,

            // Əlaqə müraciətləri
            ContactSeeder::class,
        ]);
    }
}
