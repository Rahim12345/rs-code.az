<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        // group_id: 1 = Dövlət/QHT, 2 = Beynəlxalq, 3 = Yerli
        $companies = [
            // Beynəlxalq (group_id=2)
            [
                'name'      => 'BP Azerbaijan',
                'group_id'  => 2,
                'about_az'  => 'BP Azərbaycan — British Petroleum şirkətinin Azərbaycandakı filialı. Neft-qaz sektoru üzrə fəaliyyət göstərir.',
                'about_en'  => 'BP Azerbaijan is the local branch of British Petroleum, operating in the oil and gas sector.',
                'about_ru'  => 'BP Азербайджан — местный филиал British Petroleum, работающий в нефтегазовом секторе.',
                'src'       => 'https://picsum.photos/seed/company-bp/300/200',
                'alt'       => 'BP Azerbaijan',
                'category_id' => '2',
            ],
            [
                'name'      => 'Siemens Azerbaijan',
                'group_id'  => 2,
                'about_az'  => 'Siemens Azərbaycan — texnologiya, enerji və sağlamlıq sahələrində fəaliyyət göstərir.',
                'about_en'  => 'Siemens Azerbaijan operates in the fields of technology, energy, and healthcare.',
                'about_ru'  => 'Siemens Азербайджан работает в области технологий, энергетики и здравоохранения.',
                'src'       => 'https://picsum.photos/seed/company-siemens/300/200',
                'alt'       => 'Siemens Azerbaijan',
                'category_id' => '2',
            ],
            [
                'name'      => 'Coca-Cola Bottlers Azerbaijan',
                'group_id'  => 2,
                'about_az'  => 'Coca-Cola Bottlers Azerbaijan — qida-içki sektorunda aparıcı beynəlxalq şirkətin yerli istehsal bazası.',
                'about_en'  => 'Coca-Cola Bottlers Azerbaijan is the local production base of the leading international company in the food and beverage sector.',
                'about_ru'  => 'Coca-Cola Bottlers Azerbaijan — местная производственная база ведущей международной компании в секторе продуктов питания и напитков.',
                'src'       => 'https://picsum.photos/seed/company-coca/300/200',
                'alt'       => 'Coca-Cola Azerbaijan',
                'category_id' => '2',
            ],
            // Dövlət (group_id=1)
            [
                'name'      => 'AZƏRENERJI ASC',
                'group_id'  => 1,
                'about_az'  => 'Azərenerji Azərbaycan Respublikasının elektroenerji sisteminin idarə edilməsi üzrə məsul dövlət qurumudur.',
                'about_en'  => 'Azərenerji is the state entity responsible for managing the electric power system of the Republic of Azerbaijan.',
                'about_ru'  => 'Азерэнержи — государственная организация, ответственная за управление электроэнергетической системой Азербайджанской Республики.',
                'src'       => 'https://picsum.photos/seed/company-azerenerji/300/200',
                'alt'       => 'Azərenerji',
                'category_id' => '1',
            ],
            [
                'name'      => 'AZƏRSU ASC',
                'group_id'  => 1,
                'about_az'  => 'Azərsu — içməli su və tullantı sularının idarə olunması üzrə dövlət qurumu.',
                'about_en'  => 'Azərsu is a state agency for drinking water and wastewater management.',
                'about_ru'  => 'Азерсу — государственное агентство по управлению питьевой водой и сточными водами.',
                'src'       => 'https://picsum.photos/seed/company-azersu/300/200',
                'alt'       => 'Azərsu',
                'category_id' => '1',
            ],
            // Yerli (group_id=3)
            [
                'name'      => 'PASHA Holding',
                'group_id'  => 3,
                'about_az'  => 'PASHA Holding — Azərbaycanın ən böyük özəl holdinq şirkətidir. Bank, sığorta, tikinti, turizm sahələrini əhatə edir.',
                'about_en'  => 'PASHA Holding is Azerbaijan\'s largest private holding company, covering banking, insurance, construction, and tourism sectors.',
                'about_ru'  => 'PASHA Holding — крупнейшая частная холдинговая компания Азербайджана, охватывающая банковский, страховой, строительный и туристический секторы.',
                'src'       => 'https://picsum.photos/seed/company-pasha/300/200',
                'alt'       => 'PASHA Holding',
                'category_id' => '3',
            ],
            [
                'name'      => 'Kapital Bank',
                'group_id'  => 3,
                'about_az'  => 'Kapital Bank — Azərbaycanın ən böyük retail bankıdır. 100-dən çox filialı ilə fəaliyyət göstərir.',
                'about_en'  => 'Kapital Bank is Azerbaijan\'s largest retail bank, operating with over 100 branches.',
                'about_ru'  => 'Капитал Банк — крупнейший розничный банк Азербайджана, работающий более чем в 100 отделениях.',
                'src'       => 'https://picsum.photos/seed/company-kapital/300/200',
                'alt'       => 'Kapital Bank',
                'category_id' => '3',
            ],
            [
                'name'      => 'Bravo Supermarket',
                'group_id'  => 3,
                'about_az'  => 'Bravo — Azərbaycanda sürətlə böyüyən pərakəndə ticarət şəbəkəsidir. 50-dən çox mağazası var.',
                'about_en'  => 'Bravo is a rapidly growing retail chain in Azerbaijan with over 50 stores.',
                'about_ru'  => 'Bravo — быстро растущая розничная сеть в Азербайджане с более чем 50 магазинами.',
                'src'       => 'https://picsum.photos/seed/company-bravo/300/200',
                'alt'       => 'Bravo Supermarket',
                'category_id' => '3',
            ],
            [
                'name'      => 'Azercell Telecom',
                'group_id'  => 3,
                'about_az'  => 'Azercell — Azərbaycanın aparıcı mobil operator şirkəti. 5 milyondan çox abunəçiyə xidmət göstərir.',
                'about_en'  => 'Azercell is Azerbaijan\'s leading mobile operator, serving more than 5 million subscribers.',
                'about_ru'  => 'Азерселл — ведущий мобильный оператор Азербайджана, обслуживающий более 5 миллионов абонентов.',
                'src'       => 'https://picsum.photos/seed/company-azercell/300/200',
                'alt'       => 'Azercell',
                'category_id' => '3',
            ],
            [
                'name'      => 'Lider Media',
                'group_id'  => 3,
                'about_az'  => 'Lider Media — Azərbaycanın ən böyük özəl media qrupudur. Lider TV, Space TV kanallarını idarə edir.',
                'about_en'  => 'Lider Media is Azerbaijan\'s largest private media group, managing Lider TV and Space TV channels.',
                'about_ru'  => 'Lider Media — крупнейшая частная медиагруппа Азербайджана, управляющая каналами Lider TV и Space TV.',
                'src'       => 'https://picsum.photos/seed/company-lider/300/200',
                'alt'       => 'Lider Media',
                'category_id' => '3',
            ],
        ];

        foreach ($companies as $company) {
            Company::create([
                'name'        => $company['name'],
                'group_id'    => $company['group_id'],
                'about_az'    => $company['about_az'],
                'about_en'    => $company['about_en'],
                'about_ru'    => $company['about_ru'],
                'src'         => $company['src'],
                'alt'         => $company['alt'],
                'category_id' => $company['category_id'],
                'slug'        => Str::slug($company['name']),
            ]);
        }
    }
}
