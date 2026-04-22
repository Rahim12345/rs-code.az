<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $comments = [
            [
                'name_az'    => 'Anar Rəhimov',
                'name_en'    => 'Anar Rahimov',
                'name_ru'    => 'Анар Рахимов',
                'comment_az' => 'RS Code komandası bizim şirkətin loqo və korporativ üslubunu tamamilə yenidən qurdu. Nəticə gözləntilərimizi üstələdi. Peşəkar münasibət, vaxtında çatdırılma və kreativ yanaşma üçün çox sağ olun!',
                'comment_en' => 'The RS Code team completely rebuilt our company\'s logo and corporate identity. The result exceeded our expectations. Thank you very much for the professional approach, timely delivery, and creative thinking!',
                'comment_ru' => 'Команда RS Code полностью перестроила логотип и корпоративный стиль нашей компании. Результат превзошёл наши ожидания. Большое спасибо за профессиональный подход, своевременную доставку и творческое мышление!',
                'photo'      => 'https://picsum.photos/seed/comment-anar/150/150',
            ],
            [
                'name_az'    => 'Nigar Əliyeva',
                'name_en'    => 'Nigar Aliyeva',
                'name_ru'    => 'Нигяр Алиева',
                'comment_az' => 'Saytımızı RS Code-a sifariş etdik. 3 həftəyə hazır, performansı əla, dizaynı professional. Müştərilərimizdən çox müsbət rəylər alırıq. Tövsiyə edirəm!',
                'comment_en' => 'We ordered our website from RS Code. Ready in 3 weeks, excellent performance, professional design. We are receiving very positive feedback from our customers. Highly recommended!',
                'comment_ru' => 'Мы заказали наш сайт у RS Code. Готов за 3 недели, отличная производительность, профессиональный дизайн. Получаем очень положительные отзывы от наших клиентов. Рекомендую!',
                'photo'      => 'https://picsum.photos/seed/comment-nigar/150/150',
            ],
            [
                'name_az'    => 'Murad Həsənov',
                'name_en'    => 'Murad Hasanov',
                'name_ru'    => 'Мурад Гасанов',
                'comment_az' => 'Brendinq layihəmiz üzərində RS Code ilə çalışdıq. Onların komandası yalnız dizayn etmir, həm də brendin strategiyasını düşünür. Bu bizim üçün çox dəyərli idi.',
                'comment_en' => 'We worked with RS Code on our branding project. Their team doesn\'t just design, they also think about the brand strategy. This was very valuable for us.',
                'comment_ru' => 'Мы работали с RS Code над нашим брендинговым проектом. Их команда не просто создаёт дизайн, но и продумывает стратегию бренда. Это было очень ценно для нас.',
                'photo'      => 'https://picsum.photos/seed/comment-murad/150/150',
            ],
            [
                'name_az'    => 'Sevinc Quliyeva',
                'name_en'    => 'Sevinc Guliyeva',
                'name_ru'    => 'Севинч Кулиева',
                'comment_az' => 'SMM xidmətlərini RS Code-dan götürürük. 6 aylıq əməkdaşlıq ərzində Instagram izləyicilərimiz 3 dəfə artdı, satışlarımız isə 40% yüksəldi. Əla nəticə!',
                'comment_en' => 'We use SMM services from RS Code. During 6 months of cooperation, our Instagram followers tripled and our sales increased by 40%. Excellent results!',
                'comment_ru' => 'Мы используем SMM-услуги от RS Code. За 6 месяцев сотрудничества наши подписчики в Instagram утроились, а продажи выросли на 40%. Отличные результаты!',
                'photo'      => 'https://picsum.photos/seed/comment-sevinc/150/150',
            ],
            [
                'name_az'    => 'Elşən Məmmədli',
                'name_en'    => 'Elshan Mammadli',
                'name_ru'    => 'Эльшан Мамедли',
                'comment_az' => 'Loqo sifarişini vermişdim. 5 iş günündə 3 fərqli konsept təqdim etdilər. Seçdiyim variantı istədiyim kimi tənzimləyib hazırladılar. Çox məmnunam!',
                'comment_en' => 'I placed a logo order. They presented 3 different concepts within 5 business days. They adjusted and prepared the option I chose exactly as I wanted. Very satisfied!',
                'comment_ru' => 'Я разместил заказ на логотип. За 5 рабочих дней они представили 3 разные концепции. Выбранный мной вариант был доработан именно так, как я хотел. Очень доволен!',
                'photo'      => 'https://picsum.photos/seed/comment-elshan/150/150',
            ],
            [
                'name_az'    => 'Zəhra Qurbanova',
                'name_en'    => 'Zahra Gurbanova',
                'name_ru'    => 'Захра Гурбанова',
                'comment_az' => 'RS Code-un dizayn komandası ilə çalışmaq həqiqətən xoş təcrübədir. Hər detal üzərinde düşünürlər, müştərini dinləyirlər. Nəticə həmişə gözləntilərin üstündədir.',
                'comment_en' => 'Working with RS Code\'s design team is truly a pleasant experience. They think about every detail, they listen to the client. The result always exceeds expectations.',
                'comment_ru' => 'Работа с дизайн-командой RS Code — действительно приятный опыт. Они думают о каждой детали, слушают клиента. Результат всегда превосходит ожидания.',
                'photo'      => 'https://picsum.photos/seed/comment-zahra/150/150',
            ],
            [
                'name_az'    => 'Cavid İsmayılov',
                'name_en'    => 'Javid Ismayilov',
                'name_ru'    => 'Джавид Исмайлов',
                'comment_az' => 'Korporativ üslub üçün RS Code-a müraciət etdik. Vizit kartdan ofis interyer dizaynına qədər hər şeyi əhatə edən geniş paket aldıq. Keyfiyyət yüksək, qiymət ədalətlidir.',
                'comment_en' => 'We approached RS Code for corporate identity. We received a comprehensive package covering everything from business cards to office interior design. High quality, fair price.',
                'comment_ru' => 'Мы обратились в RS Code за корпоративным стилем. Получили обширный пакет, охватывающий всё — от визитных карточек до дизайна офисного интерьера. Высокое качество, справедливая цена.',
                'photo'      => 'https://picsum.photos/seed/comment-javid/150/150',
            ],
            [
                'name_az'    => 'Lala Abbasova',
                'name_en'    => 'Lala Abbasova',
                'name_ru'    => 'Лала Аббасова',
                'comment_az' => 'İnternet mağazamız üçün RS Code çox funksional və sürətli bir veb-sayt hazırladı. Admin paneli istifadəsi çox asandır. Texniki dəstək hər zaman cavab verir. Razıyam!',
                'comment_en' => 'RS Code developed a very functional and fast website for our online store. The admin panel is very easy to use. Technical support always responds. Very satisfied!',
                'comment_ru' => 'RS Code разработал для нашего интернет-магазина очень функциональный и быстрый веб-сайт. Панель администратора очень проста в использовании. Техподдержка всегда отвечает. Доволен!',
                'photo'      => 'https://picsum.photos/seed/comment-lala/150/150',
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
