<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title_az'  => '2024-cü ildə Brendinq Trendləri: Şirkətiniz Hazırdırmı?',
                'title_en'  => 'Branding Trends in 2024: Is Your Company Ready?',
                'title_ru'  => 'Тренды брендинга в 2024 году: готова ли ваша компания?',
                'review_az' => 'Rəqəmsal dünya sürətlə dəyişir. Brendinq trendlərini izləmək artıq zəruri bir tələbatdır.',
                'review_en' => 'The digital world is changing rapidly. Keeping up with branding trends is now a necessary requirement.',
                'review_ru' => 'Цифровой мир стремительно меняется. Следить за тенденциями брендинга теперь является необходимым требованием.',
                'text_az'   => '<p>2024-cü il brendinq dünyasında ciddi dəyişikliklər gətirir. Minimalist dizayn, canlı rənglər və şəxsi hekayəçilik üsulları brendlərin öz auditoriyası ilə ünsiyyət qurmasının yeni yollarını müəyyən edir. Süni intellekt əsaslı dizayn alətləri artıq adi hala gəlib – Midjourney, Adobe Firefly kimi proqramlar dizaynerlərin iş sürətini kəskin artırıb.</p><p>Azərbaycan bazarında isə yerli brendlər getdikcə daha çox öz milli identikliyini vizual dilə çevirməyə çalışır. Milli ornamentlər, rənglər və tipografiya elementlərinin müasir dizaynla birləşdirilməsi güclü bir trend kimi öndə gedir.</p>',
                'text_en'   => '<p>2024 brings significant changes to the branding world. Minimalist design, vibrant colors, and personal storytelling methods define new ways for brands to communicate with their audience. AI-based design tools have now become commonplace – programs like Midjourney and Adobe Firefly have dramatically increased the work speed of designers.</p><p>In the Azerbaijani market, local brands are increasingly trying to transform their national identity into a visual language. The combination of national ornaments, colors, and typography elements with modern design is moving forward as a strong trend.</p>',
                'text_ru'   => '<p>2024 год приносит значительные изменения в мире брендинга. Минималистичный дизайн, яркие цвета и методы личного повествования определяют новые способы взаимодействия брендов со своей аудиторией. Инструменты дизайна на основе ИИ стали обычным явлением — такие программы, как Midjourney и Adobe Firefly, резко увеличили скорость работы дизайнеров.</p>',
                'date_az'   => '15 Yanvar, 2024',
                'date_en'   => 'January 15, 2024',
                'date_ru'   => '15 Января, 2024',
                'photo'     => 'https://picsum.photos/seed/blog-branding/800/450',
            ],
            [
                'title_az'  => 'Yaxşı Loqo Dizaynının 7 Sirri',
                'title_en'  => '7 Secrets of a Good Logo Design',
                'title_ru'  => '7 секретов хорошего дизайна логотипа',
                'review_az' => 'Loqo sadəcə bir şəkil deyil – o, şirkətinizin kimliyi, dəyərləri və vədinin vizual ifadəsidir.',
                'review_en' => 'A logo is not just a picture – it is the visual expression of your company\'s identity, values, and promises.',
                'review_ru' => 'Логотип — это не просто картинка, это визуальное выражение идентичности, ценностей и обещаний вашей компании.',
                'text_az'   => '<p>Dünyada tanınan brendlərin loqolarını nə birləşdirir? Sadəlik, yaddaqalanlıq, çeviklik, uyğunluq və zaman sınağına davamlılıq. Bu məqalədə biz yaxşı loqo dizaynının 7 əsas sirrini açıqlayacağıq.</p><ol><li><strong>Sadəlik:</strong> Ən güclü loqolar sadə olanlardır. Apple-ın almasu, Nikein işarəsi – hamısı sadədir.</li><li><strong>Yaddaqalanlıq:</strong> Loqonuz bir dəfə görüldükdən sonra yadda qalmalıdır.</li><li><strong>Çeviklik:</strong> Loqo hər ölçüdə yaxşı görünməlidir – vizit kartından billboarda qədər.</li><li><strong>Universallıq:</strong> Rəngsiz versiyada da eyni qədər effektiv olmalıdır.</li><li><strong>Zaman sınağı:</strong> Trend deyil, klassik dizayn seçin.</li></ol>',
                'text_en'   => '<p>What connects the logos of globally recognized brands? Simplicity, memorability, flexibility, appropriateness, and timelessness. In this article, we will reveal 7 key secrets of good logo design.</p><ol><li><strong>Simplicity:</strong> The most powerful logos are the simplest. Apple\'s apple, Nike\'s swoosh – all are simple.</li><li><strong>Memorability:</strong> Your logo should be remembered after being seen once.</li><li><strong>Flexibility:</strong> The logo should look good at any size – from business card to billboard.</li></ol>',
                'text_ru'   => '<p>Что объединяет логотипы всемирно известных брендов? Простота, запоминаемость, гибкость, уместность и устойчивость к испытанию временем. В этой статье мы раскроем 7 ключевых секретов хорошего дизайна логотипа.</p>',
                'date_az'   => '3 Mart, 2024',
                'date_en'   => 'March 3, 2024',
                'date_ru'   => '3 Марта, 2024',
                'photo'     => 'https://picsum.photos/seed/blog-logo/800/450',
            ],
            [
                'title_az'  => 'UI/UX Dizayn: İstifadəçi Təcrübəsinin Önəmi',
                'title_en'  => 'UI/UX Design: The Importance of User Experience',
                'title_ru'  => 'UI/UX Дизайн: Важность пользовательского опыта',
                'review_az' => 'Yaxşı UI/UX dizayn sadəcə gözəl görünüş deyil – o, istifadəçilərin həyatını asanlaşdıran bir sistemdir.',
                'review_en' => 'Good UI/UX design is not just about looking good – it\'s a system that makes users\' lives easier.',
                'review_ru' => 'Хороший UI/UX-дизайн — это не просто красивый внешний вид, это система, которая облегчает жизнь пользователям.',
                'text_az'   => '<p>Rəqəmsal məhsulların uğuru böyük dərəcədə onların istifadəçi interfeysinə bağlıdır. Tədqiqatlar göstərir ki, yaxşı UI/UX dizayna sahib məhsullar müştəri saxlama göstəricisini 40%-ə qədər artırır.</p><p>Azərbaycanda veb-sayt və mobil tətbiq inkişafı sahəsindəki böyüyən bazarda UX dizaynına diqqət hələ də lazımi səviyyədə deyil. Əksər şirkətlər görünüşə diqqət edir, lakin istifadə rahatlığını göz ardı edir. Bu, böyük bir rəqabət üstünlüyü yaradır.</p>',
                'text_en'   => '<p>The success of digital products is largely tied to their user interface. Research shows that products with good UI/UX design increase customer retention rates by up to 40%.</p><p>In Azerbaijan\'s growing web and mobile application development market, attention to UX design is still not at the required level. Most companies focus on appearance but ignore usability. This creates a significant competitive advantage.</p>',
                'text_ru'   => '<p>Успех цифровых продуктов во многом определяется их пользовательским интерфейсом. Исследования показывают, что продукты с хорошим UI/UX дизайном повышают показатели удержания клиентов на 40%.</p>',
                'date_az'   => '22 Aprel, 2024',
                'date_en'   => 'April 22, 2024',
                'date_ru'   => '22 Апреля, 2024',
                'photo'     => 'https://picsum.photos/seed/blog-uiux/800/450',
            ],
            [
                'title_az'  => 'Korporativ Üslub: Brendinizin Görünməz Güçü',
                'title_en'  => 'Corporate Identity: The Invisible Power of Your Brand',
                'title_ru'  => 'Корпоративный Стиль: Невидимая Сила Вашего Бренда',
                'review_az' => 'Ardıcıl korporativ üslub müştərilərdə etibar yaradır və brendinizi rəqiblərindən fərqləndirir.',
                'review_en' => 'A consistent corporate identity builds trust with customers and differentiates your brand from competitors.',
                'review_ru' => 'Последовательный корпоративный стиль формирует доверие у клиентов и выделяет ваш бренд среди конкурентов.',
                'text_az'   => '<p>Korporativ üslub (Corporate Identity) şirkətinizin bütün vizual kommunikasiya materiallarında ardıcıl görünməsini təmin edir. Loqo, rəng palitri, tipografiya, fotostilistika – bunların hamısı bir bütövlük içində işləməlidir.</p><p>Tədqiqatlara görə, ardıcıl brendinq şirkətin gəlirini orta hesabla 23% artırır. Müştərilər tanınan brendlərə daha çox güvənir və onlarla iş görmə ehtimalı daha yüksəkdir.</p>',
                'text_en'   => '<p>Corporate identity ensures that your company appears consistently across all visual communication materials. Logo, color palette, typography, photo style – all of these must work as a coherent whole.</p><p>According to research, consistent branding increases company revenue by an average of 23%. Customers trust recognized brands more and are more likely to do business with them.</p>',
                'text_ru'   => '<p>Корпоративный стиль обеспечивает единообразное представление вашей компании во всех визуальных коммуникационных материалах. Логотип, цветовая палитра, типографика, фотостиль — всё это должно работать как единое целое.</p>',
                'date_az'   => '10 May, 2024',
                'date_en'   => 'May 10, 2024',
                'date_ru'   => '10 Мая, 2024',
                'photo'     => 'https://picsum.photos/seed/blog-corporate/800/450',
            ],
            [
                'title_az'  => 'SMM 2024: Sosial Mediada Brendinizi Necə Gücləndirib?',
                'title_en'  => 'SMM 2024: How to Strengthen Your Brand on Social Media?',
                'title_ru'  => 'SMM 2024: Как укрепить свой бренд в социальных сетях?',
                'review_az' => 'Sosial media artıq isteğe bağlı kanal deyil – o, hər müasir şirkətin əsas kommunikasiya platformasıdır.',
                'review_en' => 'Social media is no longer an optional channel – it is the primary communication platform for every modern company.',
                'review_ru' => 'Социальные сети больше не являются необязательным каналом — это основная коммуникационная платформа для каждой современной компании.',
                'text_az'   => '<p>Azərbaycanda Instagram istifadəçilərinin sayı 3 milyonu keçib. Bu rəqəm hər şirkət üçün nəhəng bir fırsat deməkdir. Lakin sosial mediada uğur qazanmaq sadəcə paylaşım etməkdən ibarət deyil.</p><p>Effektiv SMM strategiyası aşağıdakı elementləri əhatə etməlidir: davamlı vizual üslub, hədəf auditoriya analizi, məzmun planı, engagement artırma taktikaları və analitika əsasında optimallaşdırma.</p>',
                'text_en'   => '<p>The number of Instagram users in Azerbaijan has exceeded 3 million. This figure represents a huge opportunity for every company. However, success on social media is not just about posting content.</p><p>An effective SMM strategy should encompass the following elements: consistent visual style, target audience analysis, content plan, engagement-boosting tactics, and analytics-based optimization.</p>',
                'text_ru'   => '<p>Число пользователей Instagram в Азербайджане превысило 3 миллиона. Эта цифра означает огромные возможности для каждой компании. Однако успех в социальных сетях — это не просто публикация контента.</p>',
                'date_az'   => '5 İyun, 2024',
                'date_en'   => 'June 5, 2024',
                'date_ru'   => '5 Июня, 2024',
                'photo'     => 'https://picsum.photos/seed/blog-smm/800/450',
            ],
            [
                'title_az'  => 'Veb Sayt Sürəti: SEO və İstifadəçi Təcrübəsinə Təsiri',
                'title_en'  => 'Website Speed: Impact on SEO and User Experience',
                'title_ru'  => 'Скорость сайта: влияние на SEO и пользовательский опыт',
                'review_az' => 'Saytınızın yüklənmə sürəti həm Google sıralamalarınıza, həm də satışlarınıza birbaşa təsir edir.',
                'review_en' => 'Your website\'s loading speed directly affects both your Google rankings and your sales.',
                'review_ru' => 'Скорость загрузки вашего сайта напрямую влияет как на позиции в Google, так и на ваши продажи.',
                'text_az'   => '<p>Google 2021-ci ildən Core Web Vitals metrikalarını sıralama amili kimi tətbiq edir. Bu o deməkdir ki, yavaş yüklənən sayt həm axtarış nəticələrində aşağıda görünür, həm də ziyarətçiləri qaçırır.</p><p>Statistikaya görə: sayt 1 saniyə gec yüklənirsə, konversiya 7% azalır. 3 saniyədən çox gözləyən istifadəçilərin 40%-i saytı tərk edir. RS Code olaraq biz hazırladığımız bütün veb-saytların PageSpeed Insights skoru 90+ olmasını hədəfləyirik.</p>',
                'text_en'   => '<p>Since 2021, Google has implemented Core Web Vitals metrics as a ranking factor. This means that a slowly loading website both ranks lower in search results and drives away visitors.</p><p>According to statistics: if a website loads 1 second later, conversion decreases by 7%. 40% of users who wait more than 3 seconds leave the site. At RS Code, we aim for all websites we develop to have a PageSpeed Insights score of 90+.</p>',
                'text_ru'   => '<p>С 2021 года Google применяет метрики Core Web Vitals в качестве фактора ранжирования. Это означает, что медленно загружающийся сайт как хуже ранжируется в результатах поиска, так и отпугивает посетителей.</p>',
                'date_az'   => '18 İyul, 2024',
                'date_en'   => 'July 18, 2024',
                'date_ru'   => '18 Июля, 2024',
                'photo'     => 'https://picsum.photos/seed/blog-seo/800/450',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
