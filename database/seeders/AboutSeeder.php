<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('abouts')->insert([
            'about_az' => 'RS Code 2018-ci ildə Bakıda yaradılmış yaradıcı dizayn və rəqəmsal texnologiyalar agentliyidir. Biz brendinqin vizual identikliyi, logo dizaynı, korporativ üslub, veb-saytların hazırlanması və rəqəmsal marketinq sahəsində kompleks xidmətlər göstəririk. Komandamız 20-dən çox peşəkar dizayner, veb-proqramçı və marketoloqdan ibarətdir. Hər layihəyə fərdi yanaşma, müştəri məmnuniyyəti isə bizim əsas prioritetimizdir. İndiyə qədər 150-dən artıq yerli və beynəlxalq müştəri üçün uğurlu layihələr həyata keçirmişik. Azərbaycan bazarında lider brendinq agentliklərindən biri kimi tanınan RS Code, hər zaman innovasiya və keyfiyyəti ön planda saxlayır.',
            'about_en' => 'RS Code is a creative design and digital technology agency founded in Baku in 2018. We provide comprehensive services in visual brand identity, logo design, corporate style, website development, and digital marketing. Our team consists of more than 20 professional designers, web developers, and marketers. We approach each project individually, and client satisfaction is our top priority. We have successfully completed projects for more than 150 local and international clients. Recognized as one of the leading branding agencies in the Azerbaijani market, RS Code always keeps innovation and quality at the forefront.',
            'about_ru' => 'RS Code — креативное агентство дизайна и цифровых технологий, основанное в Баку в 2018 году. Мы предоставляем комплексные услуги в области визуальной идентичности бренда, дизайна логотипа, корпоративного стиля, разработки веб-сайтов и цифрового маркетинга. Наша команда состоит из более чем 20 профессиональных дизайнеров, веб-разработчиков и маркетологов. К каждому проекту мы подходим индивидуально, а удовлетворённость клиентов является нашим главным приоритетом. Мы успешно реализовали проекты для более чем 150 местных и международных клиентов.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
