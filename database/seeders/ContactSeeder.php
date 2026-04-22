<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'sirket'        => 'AzərTech MMC',
                'name'          => 'Rauf Əliyev',
                'elaqe_nomresi' => '+994 50 123 45 67',
                'email'         => 'r.aliyev@aztech.az',
                'message'       => 'Şirkətimiz üçün korporativ üslub və veb sayt hazırlanmasına marağımız var. Zəhmət olmasa qiymət siyahısı göndərin.',
                'ip'            => '185.92.4.12',
            ],
            [
                'sirket'        => 'Green Valley İnşaat',
                'name'          => 'Tərlan Musayev',
                'elaqe_nomresi' => '+994 55 987 65 43',
                'email'         => 'musayev.tarlan@greenvalley.az',
                'message'       => 'Yeni tikinti layihəmiz üçün loqo sifariş etmək istəyirik. Nə qədər vaxt lazımdır?',
                'ip'            => '82.117.201.5',
            ],
            [
                'sirket'        => 'Bella Restaurant',
                'name'          => 'Xədicə Nəsirbəyova',
                'elaqe_nomresi' => '+994 70 234 56 78',
                'email'         => 'bella.restaurant@gmail.com',
                'message'       => 'Restoranımız üçün menyu dizaynı, vizit kart və sosial media üçün şablon lazımdır.',
                'ip'            => '77.81.110.33',
            ],
            [
                'sirket'        => 'MedPlus Klinikası',
                'name'          => 'Dr. Kamran Əhmədov',
                'elaqe_nomresi' => '+994 51 345 67 89',
                'email'         => 'info@medplus.az',
                'message'       => 'Klinikamız üçün veb sayt hazırlanmasını istəyirik. Online qeydiyyat sistemi olsun. Əlaqəyə keçin.',
                'ip'            => '95.85.167.24',
            ],
            [
                'sirket'        => 'EduStar Tədris Mərkəzi',
                'name'          => 'Lalə Hümbətova',
                'elaqe_nomresi' => '+994 77 456 78 90',
                'email'         => 'lala@edustar.az',
                'message'       => 'Tədris mərkəzimiz üçün tam brendinq paketi – loqo, korporativ üslub, sayt. Büdcəmiz haqqında danışa bilərik.',
                'ip'            => '91.200.12.88',
            ],
            [
                'sirket'        => null,
                'name'          => 'Elnur Babazadə',
                'elaqe_nomresi' => '+994 50 567 89 01',
                'email'         => 'elnur.babazade@gmail.com',
                'message'       => 'Şəxsi portfolio saytı üçün müraciət edirəm. Fotograf kimi fəaliyyət göstərirəm.',
                'ip'            => '78.109.55.201',
            ],
            [
                'sirket'        => 'AutoPart Pro',
                'name'          => 'Vüsal Qədirov',
                'elaqe_nomresi' => '+994 55 678 90 12',
                'email'         => 'vusal@autopartpro.az',
                'message'       => 'İnternet mağaza lazımdır. Avtomobil ehtiyat hissələri satırıq. Ödəniş sistemi inteqrasiyası vacibdir.',
                'ip'            => '109.234.77.14',
            ],
            [
                'sirket'        => 'Sunrise Travel',
                'name'          => 'Aytən Nağıyeva',
                'elaqe_nomresi' => '+994 70 789 01 23',
                'email'         => 'info@sunrisetravel.az',
                'message'       => 'Turizm şirkətimiz üçün sayt yeniləmək istəyirik. Mövcud saytımızı göndərə bilərəm. Görüşə hazırıq.',
                'ip'            => '5.62.88.144',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create(array_merge($contact, [
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now()->subDays(rand(1, 60)),
            ]));
        }
    }
}
