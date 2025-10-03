-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Hazırlanma Vaxtı: 13 Sent, 2023 saat 05:52
-- Server versiyası: 8.0.30
-- PHP Versiyası: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `rs_code`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `about_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `abouts`
--

INSERT INTO `abouts` (`id`, `about_az`, `about_en`, `about_ru`, `created_at`, `updated_at`) VALUES
(1, 'adfafadf', 'adfadfadf', 'afafafadf', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Rahim', 'rahim.suleymanov94@gmail.com', '$2y$10$XqOmtZM/nZNYiq7St3MyTO4rxr/LspdukAbVq2txkbW15V.S2fTJe', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `blogs`
--

INSERT INTO `blogs` (`id`, `title_az`, `title_ru`, `title_en`, `review_az`, `review_ru`, `review_en`, `text_az`, `text_ru`, `text_en`, `date_az`, `date_ru`, `date_en`, `photo`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Veb Saytların Hazırlanma Mərhələləri', 'Этапы разработки сайта', 'Website Development Stages', 'Veb Saytların Hazırlanma Mərhələləri', 'Этапы разработки сайта', 'Website Development Stages', '<p>1. Saytın yaradılması üçün bütün tələblərin müəyyənləşdirilməsi Veb saytının inkişafı üçün qısa məlumatın doldurulması, əlavə sualların cavablandırılması, rəqiblərin veb saytlarının təhlilinin aparılması daxildir. Texniki tapşırığın müştəri tərəfindən göndərilməsi.</p><p>2. Toplanmış məlumatlar əsasında saytın yaradılmasıüçün ətraflı texniki tapşırıq tərtib olunur və gələcək saytın səhifələrinin prototipi hazırlanır. Beləliklə, sayt səhifələrinin prototipləri gələcək sayt səhifələrinin quruluşunu əyani şəkildə qiymətləndirməyə imkan verir və Texniki Tapşırıqda bu səhifələrin ətraflı təsviri saytın məntiqini anlamağa imkan verir..</p><p>3. Sayt dizaynının yaradılması Saytın yaradılması üçün Texniki tapşırıq-da təsvir olunan məlumatlara əsasən fərdi bir veb dizayn hazırlanır.</p><p>4. Saytın maketi (vertska) Dizaynların şəkillər əsasında statik html səhifələrə çevrilməsi və saytın fərdi interaktiv elementlərinin - açılan pəncərələr, açılan siyahılar, qalereyalar, sürgülər və s. əyani görmək üçün hazırlanır.</p><p>5. Proqramlaşdırma Saytın statik səhifələrini sayt idarəetmə sisteminə bağlamaq, sayt idarəetmə sistemini qurmaq, sayta dinamik məlumatların çıxmasını təşkil etmək.</p><p>6. Saytın sınaqdan keçirilməsi (testing) Veb Saytın son sınaq və yoxlanışı üçün serverdə test mühiti yaradılır. Həm də bu mərhələdə saytı məzmunla doldurmaq üçün üzərində işlər davam etdirilir.</p><p>7. Saytın yerləşdirilməsi Test mərhələsini uğurla keçmiş sayt hostingə yüklənir, poçt və interaktiv modullar konfiqurasiya olunur. Bura saytın googe bing yandex tərəfindən indekslənməsidə daxildir. Beləki sayt istifadəyə buraxıldıqda. robots.txt , sitemap.xml kimi seo ya önəmli kömək edən sazlamalar yaradılmalıdır.</p>', '<p>1. Определение всех требований к созданию сайта включает в себя заполнение краткой информации для разработки сайта, ответы на дополнительные вопросы, проведение анализа сайтов конкурентов. Представление технического задания заказчиком.</p><p>2. На основе собранной информации разрабатывается подробное техническое задание на создание сайта и готовится прототип страниц будущего сайта. Таким образом, прототипы страниц сайта позволяют визуально оценить структуру будущих страниц сайта, а подробное описание этих страниц в Техническом задании позволяет понять логику работы сайта.</p><p>3. Создание дизайна сайта Для создания сайта подготавливается индивидуальный веб-дизайн на основании информации, описанной в Техническом задании.</p><p>4. Вёрстка сайта (вертска) Преобразование дизайнов в статические html страницы на основе изображений и отдельных интерактивных элементов сайта - выпадающих окон, выпадающих списков, галерей, слайдеров и т.д. будьте готовы видеть визуально.</p><p>5. Программирование Подключить статические страницы сайта к системе управления сайтом, установить систему управления сайтом, организовать поступление динамических данных на сайт.</p><p>6. Тестирование сайта На сервере создается тестовая среда для окончательного тестирования и проверки веб-сайта. На данном этапе ведется работа по наполнению сайта контентом.</p><p>7. Хостинг сайта Сайт, успешно прошедший этап тестирования, загружается на хостинг, настраиваются почта и интерактивные модули. Это включает в себя индексацию сайта с помощью googe bing yandex. Итак, когда сайт запущен. Должны быть созданы настройки, которые помогают сео или важны, такие как robots.txt, sitemap.xml.</p>', '<p>1. Defining all the requirements for the creation of the site includes filling out a brief information for the development of the website, answering additional questions, conducting an analysis of competitors\' websites. Submission of terms of reference by the customer.</p><p>2. On the basis of the collected information the detailed technical task for creation of the site is developed and the prototype of pages of the future site is prepared. Thus, prototypes of site pages allow a visual assessment of the structure of future site pages, and a detailed description of these pages in the Terms of Reference allows us to understand the logic of the site.</p><p>3. Creating a site design An individual web design is prepared for the creation of the site based on the information described in the Terms of Reference.</p><p>4. Site layout (vertska) Transformation of designs into static html pages based on images and individual interactive elements of the site - drop-down windows, drop-down lists, galleries, sliders, etc. be prepared to see visually.</p><p>5. Programming To connect static pages of the site to the site management system, to install the site management system, to organize the flow of dynamic data to the site.</p><p>6. Site Testing A test environment is created on the server for the final testing and verification of the Web site. At this stage, work is underway to fill the site with content.</p><p>7. Site hosting The site that has successfully passed the test stage is uploaded to hosting, mail and interactive modules are configured. This includes indexing the site by googe bing yandex. So when the site is launched. Settings that help seo or important, such as robots.txt, sitemap.xml, should be created.</p>', '22 Noyabr', '22 ноября', '22 November', '61dbf6b00d54f.png', NULL, NULL, 'web-saytlarin-hazirlanmasi'),
(2, 'Bakıda reklam agentliyi və biznes planı', 'Рекламное агентство и бизнес план в Баку', 'Advertising agency and business plan in Baku', 'Bakıda reklam agentliyi və biznes planı', 'Рекламное агентство и бизнес план в Баку', 'Advertising agency and business plan in Baku', '<p>Reklam agentliyi olaraq əvvəlcə marka dəyərinin yaradılması, satış və mənfəət yönümlü həllər, elanlar və PR əsaslı işlərin inkişafı üçün reklam və marketinq strategiyaları hazırlayırıq və bunun üçün bütün lazımi materialları dizayn edirik.</p><p>Korporativ kimlik dizaynları, məhsul və marka satışları, kampaniyalar və butik işləri üçün sizə lazım ola biləcək hər şey öz mətbəximizdən gəlir.</p><p>Bilməli olduğunuz ən vacib məqam korporativ xidmət göstərməyimizdir. Bir şirkət və ya bir marka olaraq üzərində adınız olan hər şey bizi maraqlandırır və istəsəniz bizim tərəfimizdən dizayn edilir.</p>', '<p>Как рекламное агентство, мы в первую очередь разрабатываем рекламные и маркетинговые стратегии создания ценности бренда, решения, ориентированные на продажи и получение прибыли, анонсы и развитие PR-работы, и проектируем для этого все необходимые материалы.</p><p>Все, что вам нужно для разработки фирменного стиля, продаж продуктов и брендов, рекламных кампаний и бутиков, вы найдете на нашей собственной кухне.</p><p>Самое главное, что вам нужно знать, это то, что мы предоставляем корпоративные услуги. Как компания или бренд, все, что имеет ваше имя, представляет для нас интерес и разработано нами, если вы хотите.</p>', '<p>As an advertising agency, we first develop advertising and marketing strategies for brand value creation, sales and profit-oriented solutions, announcements and the development of PR-based work, and design all the necessary materials for this.</p><p>Everything you need for corporate identity designs, product and brand sales, campaigns and boutiques comes from our own kitchen.</p><p>The most important thing you need to know is that we provide corporate services. As a company or a brand, everything that has your name on it is of interest to us and is designed by us if you wish.</p>', '05 Dekabr 2021', '05 декабря 2021 г.', '05 December 2021', '61ea4b7d0a051.jpg', NULL, NULL, 'bakida-reklam-agentliyi'),
(3, 'SMM xidməti və Sosial media marketinqi', 'Служба SMM и маркетинг в социальных сетях', 'SMM service and Social Media Marketing', 'SMM xidməti və Sosial media marketinqi', 'Служба SMM и маркетинг в социальных сетях', 'SMM service and Social Media Marketing', '<p>SMM xidməti ilə güclü bir ünsiyyət və qarşılıqlı bir vasitə olan sosial mediada, şirkətlərin müştəriləri ilə səmərəli əlaqə qura biləcəyi bir şərait yaradırıq. Bununla yanaşı, bəzi həssas məqamlara da diqqət yetirərək müştərilərlə ünsiyyət qurarkən bir strategiya hazırlayırıq.</p><p>Bizlər sektorunuza və müştəri portfelinə uyğun olaraq sosial media smm strategiyasını inkişaf etdirir və peşəkar smm xidmətləri göstəririk.</p><p>Bizim peşəkar kollektivimiz bir çox məşhur instagram və facebook səhifələrinə sahibdir. Bu səhifələrdə eyni zamanda kreativ və sektorunuza uyğun postlar paylaşılır</p><p>SMM xidmətlərimizdən faydalanmaq üçün<a href=\"https://crr.az/contact\"> Bizimlə əlaqə</a> yarada biləriniz.</p>', '<p>Мы создаем среду, в которой компании могут эффективно общаться со своими клиентами в социальных сетях, что является мощным средством коммуникации и взаимодействия с сервисом SMM. Кроме того, мы разрабатываем стратегию при общении с клиентами, уделяя внимание некоторым чувствительным моментам.</p><p>Мы разрабатываем SMM-стратегии в социальных сетях и предоставляем профессиональные SMM-услуги в соответствии с вашим сектором и портфелем клиентов.</p><p>У нашей профессиональной команды много популярных страниц в инстаграме и фейсбуке. На этих страницах также публикуются творческие и соответствующие отрасли публикации.</p><p>Вы можете <a href=\"https://crr.az/contact\">связаться с нами</a>, чтобы воспользоваться нашими услугами SMM.</p>', '<p>We create an environment in which companies can effectively communicate with their customers on social media, which is a powerful means of communication and interaction with the SMM service. In addition, we develop a strategy when communicating with customers, paying attention to some sensitive points.</p><p>We develop social media smm strategies and provide professional smm services according to your sector and customer portfolio.</p><p>Our professional team has many popular instagram and facebook pages. These pages also share creative and industry-appropriate posts</p><p>You can <a href=\"https://crr.az/contact\">contact us</a> to take advantage of our SMM services.</p>', '10 Dekabr 2021', '10 декабря 2021 г.', '10 December 2021', '61ea4c6582247.jpg', NULL, NULL, 'smm-xidmeti');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameAz` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `categories`
--

INSERT INTO `categories` (`id`, `nameEn`, `nameAz`, `created_at`, `updated_at`) VALUES
(4, 'PHP', 'PHP', '2021-03-01 20:57:48', '2021-03-01 20:57:48'),
(5, 'LARAVEL', 'LARAVEL', '2021-03-01 20:57:52', '2021-03-01 20:57:52'),
(6, 'Javascript & jQuery', 'Javascript & jQuery', '2021-03-01 20:58:12', '2021-03-01 20:58:12'),
(7, 'HTML5 & CSS3', 'HTML5 & CSS3', '2021-03-01 20:58:18', '2021-03-01 20:58:18'),
(8, 'TASKS', 'TASKS', '2021-03-01 20:58:27', '2021-03-01 20:58:27'),
(9, 'OTHER', 'BAŞQA', '2021-03-02 02:51:18', '2021-03-02 02:51:18'),
(11, 'Useful links', 'Faydalı linklər', '2021-06-19 11:52:03', '2021-06-19 11:52:03'),
(12, 'Git & Github', 'Git & Github', '2021-07-13 17:42:37', '2021-07-13 17:42:37'),
(13, 'SQL', 'SQL', '2021-11-30 22:21:59', '2021-11-30 22:21:59');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `comments`
--

INSERT INTO `comments` (`id`, `name_az`, `name_en`, `name_ru`, `comment_az`, `comment_en`, `comment_ru`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Aydın Abbasov', 'Aydin Abbasov', 'Айдын Аббасов', 'Hədəfimizdəki sayt üçün rs Studio ilə əlaqə saxladıq.Yekun nəticə olaraq gördükləri işləri çox bəyəndik.', 'We contacted rs Studio for our target site. As a result, we liked what they did.', 'Мы связались с rs Studio для нашего целевого сайта, и в результате нам понравилось то, что они сделали.', '61e7ca6343e4f.jpg', NULL, NULL),
(2, 'Tural Məmmədli', 'Tural Memmedli', 'Турал Меммедли', 'Təklif etdiyimiz dizayn üçün büdcəmizə ən uyğun studio rs studio oldu.Peşəkar komanda qısa vaxt ərzində istədiyimiz saytı bizə təhsil verdi.', 'rs studio was the most suitable studio for our budget for the proposed design. The professional team taught us the site we wanted in a short time.', 'rs studio оказалась наиболее подходящей студией под наш бюджет по предложенному дизайну.Профессиональная команда за короткое время сделала нам сайт, который мы хотели.', '61e7cb19d5fa3.jpg', NULL, NULL),
(3, 'Leyla İsmayılova', 'Лейла Исмайлова', 'adhdahadhadghadgh', 'İnstagramda olan alış-veriş səhifəmiz üçün sayt açdırmaq qərarına gəldik və rs studio ilə əməkdaşlıq edərək onlayn alış veriş saytımızı hazırlatdıq.', 'We decided to launch a website for our shopping page on Instagram and developed our online shopping site in collaboration with rs studio.', 'Мы решили запустить веб-сайт для нашей страницы покупок в Instagram и разработали наш сайт онлайн-покупок в сотрудничестве со студией rs.', '61e7cbc46617c.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_az` text COLLATE utf8mb4_unicode_ci,
  `about_en` text COLLATE utf8mb4_unicode_ci,
  `about_ru` text COLLATE utf8mb4_unicode_ci,
  `group_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `companies`
--

INSERT INTO `companies` (`id`, `src`, `alt`, `category_id`, `name`, `slug`, `about_az`, `about_en`, `about_ru`, `group_id`, `created_at`, `updated_at`) VALUES
(5, '9B9eOd0IkBON8BoWXxloDNJB8QOdtKOQw9V82hu0.jpg', 'ALT', NULL, 'Sirket 1', 'sirket-1', 'About(AZ)', '<label for=\"about_en\">About(EN)</label>', '<label for=\"about_ru\">About(RU)</label>', 2, '2023-09-12 11:55:37', '2023-09-12 11:55:37'),
(6, 'LhPni2xITp0d63zbkKi02OtuTIHVClps6SHMxz0y.jpg', NULL, NULL, 'Sirket 2', 'sirket-2', NULL, NULL, NULL, 3, '2023-09-12 13:50:24', '2023-09-12 13:50:24');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `free_seo_audits`
--

CREATE TABLE `free_seo_audits` (
  `id` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - unread, 1 - read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `free_seo_audits`
--

INSERT INTO `free_seo_audits` (`id`, `url`, `email`, `tel`, `status`, `created_at`, `updated_at`) VALUES
(15, 'https://youtu.be/XLOrLhID8SE', 'javid@crr.az', '324234234234234', 0, '2022-04-03 14:35:27', '2022-04-03 14:35:27'),
(16, 'https://crr.az', 'javid@crr.az', '+994509954160', 0, '2022-04-04 04:42:06', '2022-04-04 04:42:06'),
(17, 'https://crr.az', 'javid@crr.az', '324234234234234', 0, '2022-04-04 04:42:20', '2022-04-04 04:42:20'),
(18, 'https://crr.az', 'javid@crr.az', '324234234234234', 0, '2022-04-04 04:54:21', '2022-04-04 04:54:21'),
(19, 'https://crr.az', 'javid@crr.az', '324234234234234', 0, '2022-04-04 04:55:38', '2022-04-04 04:55:38'),
(20, 'https://maricel.corn.az/', 'javid@crr.az', '324234234234234', 0, '2022-04-04 04:59:24', '2022-04-04 04:59:24'),
(21, 'https://crr.az', 'javid@crr.az', '324234234234234', 0, '2022-04-04 05:00:40', '2022-04-04 05:00:40'),
(22, 'https://youtu.be/XLOrLhID8SE', 'javid@crr.az', '324234234234234', 0, '2022-04-04 05:03:12', '2022-04-04 05:03:12'),
(23, 'https://ok.ru/video/260058974910', 'javid@crr.az', '324234234234234', 0, '2022-04-04 05:10:40', '2022-04-04 05:10:40'),
(24, 'https://www.gaamble.net/casino-gratuit-en-ligne-avec-machines-a-sous-recentes/', 'avisbrittain@arcor.de', '070 2028 7799', 0, '2023-01-02 10:28:02', '2023-01-02 10:28:02'),
(25, 'https://www.gaamble.net/casino-gratuit-en-ligne-avec-machines-a-sous-recentes/', 'avisbrittain@arcor.de', '070 2028 7799', 0, '2023-01-02 10:28:04', '2023-01-02 10:28:04'),
(26, 'https://www.gaamble.net/casino-gratuit-en-ligne-avec-machines-a-sous-recentes/', 'avisbrittain@arcor.de', '070 2028 7799', 0, '2023-01-02 10:28:05', '2023-01-02 10:28:05'),
(27, 'https://www.gaamble.net/casino-gratuit-en-ligne-avec-machines-a-sous-recentes/', 'avisbrittain@arcor.de', '070 2028 7799', 0, '2023-01-02 10:28:07', '2023-01-02 10:28:07');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `groups`
--

INSERT INTO `groups` (`id`, `name_az`, `name_en`, `name_ru`, `slug_az`, `slug_en`, `slug_ru`, `created_at`, `updated_at`) VALUES
(1, 'dövlət və qeyri hökümət təşkilatları', 'dövlət və qeyri hökümət təşkilatları', 'dövlət və qeyri hökümət təşkilatları', 'dovlet-ve-qeyri-hokumet-teskilatlari', 'dovlet-ve-qeyri-hokumet-teskilatlari', 'dovlet-ve-qeyri-hokumet-teskilatlari', '2023-09-12 09:03:48', '2023-09-12 09:03:48'),
(2, 'qlobal şirkətlər', 'qlobal şirkətlər', 'qlobal şirkətlər', 'qlobal-sirketler', 'qlobal-sirketler', 'qlobal-sirketler', '2023-09-12 09:03:48', '2023-09-12 09:03:48'),
(3, 'yerli şirkətlər', 'yerli şirkətlər', 'yerli şirkətlər', 'yerli-sirketler', 'yerli-sirketler', 'yerli-sirketler', '2023-09-12 09:03:48', '2023-09-12 09:03:48');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_22_055419_create_abouts_table', 1),
(6, '2021_10_22_055937_create_projects_table', 1),
(7, '2021_10_22_061344_create_partners_table', 1),
(8, '2021_10_22_062347_create_blogs_table', 1),
(9, '2021_10_27_103422_create_project_images_table', 1),
(10, '2021_11_02_131715_create_comments_table', 1),
(11, '2021_11_15_133441_create_admins_table', 2),
(15, '2023_09_11_044447_create_services_table', 3),
(16, '2022_05_30_055624_create_products_table', 4),
(17, '2022_05_30_060727_create_product_images_table', 4),
(23, '2023_09_12_101740_create_groups_table', 5),
(24, '2023_09_12_102258_create_companies_table', 5);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `my_blogs`
--

CREATE TABLE `my_blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleAz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugEn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugAz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blogEn` text COLLATE utf8mb4_unicode_ci,
  `blogAz` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `view` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `my_blogs`
--

INSERT INTO `my_blogs` (`id`, `titleEn`, `titleAz`, `slugEn`, `slugAz`, `blogEn`, `blogAz`, `category_id`, `view`, `created_at`, `updated_at`) VALUES
(1, 'A program that calculates how many words are in a given text. Ready functions (explode, etc.) cannot be used', 'Verilmiş textdə neçə sözün olduğunu hesablayan proqram. Hazır funksiyalardan ( explode və s. ) istifadə etmək olmaz', 'a-program-that-calculates-how-many-words-are-in-a-given-text-ready-functions-explode-etc-cannot-be-used', 'verilmis-textde-nece-sozun-oldugunu-hesablayan-proqram-hazir-funksiyalardan-explode-ve-s-istifade-etmek-olmaz', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 1) A program that calculates how many words are in a given text. Ready functions (explode, etc.) cannot be used \n */\n\nfunction wordCounter ( $text = NULL )\n{\n	$spaceCounter = 0;\n	$word         = \'\';\n	$loop         = TRUE;\n	$n            = 0;\n	while ( $loop === TRUE )\n	{\n		if ( isset( $text[ $n ] ) )\n		{\n			if ( $text[ $n ] == \' \' )\n			{\n				$spaceCounter++;\n				$word = \'\';\n			}\n			$word .= $text[ $n ];\n			$n++;\n		}\n		else\n		{\n			$loop = FALSE;\n		}\n	}\n	$wordCounter = $spaceCounter + 1;\n\n	if ( $n === 0 )\n	{\n		return \'Please include a word\';\n	}\n\n	return $wordCounter;\n}\n\n$text = \'There are exactly eight words in this sentence.\';\necho wordCounter( $text );\n\n\n</code></pre>\n\n<p>//Output</p>\n\n<p>8</p>', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 1) Verilmiş textdə neçə sözün olduğunu hesablayan proqram. Hazır funksiyalardan ( explode və s. ) istifadə *etmək olmaz.\n */\n\nfunction wordCounter ( $text = NULL )\n{\n	$spaceCounter = 0;\n	$word         = \'\';\n	$loop         = TRUE;\n	$n            = 0;\n	while ( $loop === TRUE )\n	{\n		if ( isset( $text[ $n ] ) )\n		{\n			if ( $text[ $n ] == \' \' )\n			{\n				$spaceCounter++;\n				$word = \'\';\n			}\n			$word .= $text[ $n ];\n			$n++;\n		}\n		else\n		{\n			$loop = FALSE;\n		}\n	}\n	$wordCounter = $spaceCounter + 1;\n\n	if ( $n === 0 )\n	{\n		return \'Please include a word\';\n	}\n\n	return $wordCounter;\n}\n\n$text = \'Bu cumlede tami-tamina alti soz var\';\necho wordCounter( $text );\n\n\n</code></pre>\n\n<p>//Output</p>\n\n<p>6</p>', 8, 0, '2021-03-02 02:01:38', '2021-03-02 02:01:38'),
(2, 'A program that capitalizes the first letter of a sentence in a given text. You can\'t use explode.', 'Verilmiş textdəki cümlələrin ilk hərfini böyüklə yazan proqram. Hazır funksiyalardan ( explode ) istifadə etmək olmaz.', 'a-program-that-capitalizes-the-first-letter-of-a-sentence-in-a-given-text-you-cant-use-explode', 'verilmis-textdeki-cumlelerin-ilk-herfini-boyukle-yazan-proqram-hazir-funksiyalardan-explode-istifade-etmek-olmaz', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * Verilmiş textdəki cümlələrin ilk hərfini böyüklə yazan proqram. Hazır funksiyalardan ( explode ) istifadə etmək olmaz.\n *\n * $text = \' Writing image code doesn\'t always mean better. should also pay attention to the smoothness and optimality of the helminth \';\n *\n */\n\nfunction uppercase ( $text = NULL )\n{\n	$loop      = TRUE;\n	$n         = 0;\n	$sentence  = \'\';\n	$uppercase = FALSE;//We need this to take into account the gaps at the beginning or after the sentence \n	while ( $loop === TRUE )\n	{\n		if ( isset( $text[ $n ] ) )\n		{\n			if ( $n === 0 )\n			{\n				$uppercase = TRUE;\n			}\n			else\n			{\n				if ( $text[ $n - 1 ] == \'.\' )\n				{\n					$uppercase = TRUE;\n\n				}\n			}\n\n			if ( $uppercase === TRUE &amp;&amp; $text[ $n ] != \' \' )\n			{\n				$sentence  .= strtoupper( $text[ $n ] );\n				$uppercase = FALSE;\n			}\n			else\n			{\n				$sentence .= $text[ $n ];\n			}\n\n			$n++;\n		}\n		else\n		{\n			$loop = FALSE;\n		}\n	}\n\n	if ( $n === 0 )\n	{\n		return \'Please include a sentence\';\n	}\n\n	return $sentence;\n}\n\n$text = \"Writing image code doesn\'t always mean better. should also pay attention to the smoothness and optimality of the helminth \";\n\necho uppercase( $text );</code></pre>\n\n<p>//Output</p>\n\n<p>Writing image code doesn&#39;t always mean better. Should also pay attention to the smoothness and optimality of the helminth</p>', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * Verilmiş textdəki cümlələrin ilk hərfini böyüklə yazan proqram. Hazır funksiyalardan ( explode ) istifadə etmək olmaz.\n *\n * $text = \' suretli kod yazmaq her zaman daha yaxshi demek deyil.          seliqeye ve hellin optimalligina da fikir vermelidir\';\n *\n */\n\nfunction uppercase ( $text = NULL )\n{\n	$loop      = TRUE;\n	$n         = 0;\n	$sentence  = \'\';\n	$uppercase = FALSE;//Bu bizə cümlənin əvvəlində və ya .(nöqtə) dən sonra  boşluqları nəzərə almaqçün\n	// lazımdır\n	while ( $loop === TRUE )\n	{\n		if ( isset( $text[ $n ] ) )\n		{\n			if ( $n === 0 )\n			{\n				$uppercase = TRUE;\n			}\n			else\n			{\n				if ( $text[ $n - 1 ] == \'.\' )\n				{\n					$uppercase = TRUE;\n\n				}\n			}\n\n			if ( $uppercase === TRUE &amp;&amp; $text[ $n ] != \' \' )\n			{\n				$sentence  .= strtoupper( $text[ $n ] );\n				$uppercase = FALSE;\n			}\n			else\n			{\n				$sentence .= $text[ $n ];\n			}\n\n			$n++;\n		}\n		else\n		{\n			$loop = FALSE;\n		}\n	}\n\n	if ( $n === 0 )\n	{\n		return \'Please include a sentence\';\n	}\n\n	return $sentence;\n}\n\n$text = \' suretli kod yazmaq her zaman daha yaxshi demek deyil.          seliqeye ve hellin optimalligina da fikir vermelidir\';\n\necho uppercase( $text );</code></pre>\n\n<p>//Output</p>\n\n<p>Suretli kod yazmaq her zaman daha yaxshi demek deyil. Seliqeye ve hellin optimalligina da fikir vermelidir</p>', 8, 0, '2021-03-02 02:16:29', '2021-03-02 03:40:51'),
(3, 'A program that cuts the letter Y from the X character of the text. Ready functions (substr, strlen) cannot be used', 'Textin X-ci simvolundan başlayaraq Y qədər hərfi kəsib göstərən proqram. Hazır funksiyalardan ( substr, strlen ) istifadə etmək olmaz', 'a-program-that-cuts-the-letter-y-from-the-x-character-of-the-text-ready-functions-substr-strlen-cannot-be-used', 'textin-x-ci-simvolundan-baslayaraq-y-qeder-herfi-kesib-gosteren-proqram-hazir-funksiyalardan-substr-strlen-istifade-etmek-olmaz', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 3) A program that cuts the letter Y from the X character of the text. Ready functions (substr, strlen) cannot be used .\n */\n\nfunction mySubStr ( $text = NULL, $start = 0, $length = NULL )\n{\n	$output = \'\';\n\n	// Here if it was taken because you said that the 1st letter starts with 1, not 0 \n	if ( $start &lt; 0 )\n	{\n		if ( isset( $text[ $start ] ) )\n		{\n			for ( $i = 0; $i &lt; $length; $i++ )\n			{\n				if ( isset( $text[ $start + $i ] ) )\n				{\n					$output .= $text[ $start + $i ];\n				}\n				else\n				{\n					break;\n				}\n			}\n		}\n	}\n	else\n	{\n		if ( isset( $text[ $start - 1 ] ) )\n		{\n			for ( $i = 0; $i &lt; $length; $i++ )\n			{\n				if ( isset( $text[ $start + $i - 1 ] ) )\n				{\n					$output .= $text[ $start + $i - 1 ];\n				}\n				else\n				{\n					break;\n				}\n			}\n		}\n	}\n\n	return $output;\n}\n\n$x    = -4;\n$y    = 6;\n$text = \'This is the last assignment of the day. \';\n\necho mySubStr( $text, $x, $y );</code></pre>\n\n<p>//Output</p>\n\n<p>ay. Th</p>', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 3) Textin X-ci simvolundan başlayaraq Y qədər hərfi kəsib göstərən proqram. Hazır funksiyalardan ( substr, strlen ) istifadə etmək olmaz.\n */\n\nfunction mySubStr ( $text = NULL, $start = 0, $length = NULL )\n{\n	$output = \'\';\n\n	// Burada if Sizin 1 - ci hərfi 0 deyil 1 dən başlamasını dediyiniz üçün alındı\n	if ( $start &lt; 0 )\n	{\n		if ( isset( $text[ $start ] ) )\n		{\n			for ( $i = 0; $i &lt; $length; $i++ )\n			{\n				if ( isset( $text[ $start + $i ] ) )\n				{\n					$output .= $text[ $start + $i ];\n				}\n				else\n				{\n					break;\n				}\n			}\n		}\n	}\n	else\n	{\n		if ( isset( $text[ $start - 1 ] ) )\n		{\n			for ( $i = 0; $i &lt; $length; $i++ )\n			{\n				if ( isset( $text[ $start + $i - 1 ] ) )\n				{\n					$output .= $text[ $start + $i - 1 ];\n				}\n				else\n				{\n					break;\n				}\n			}\n		}\n	}\n\n	return $output;\n}\n\n$x    = -4;\n$y    = 6;\n$text = \'Bu gunluk son tapsiriq.\';\n\necho mySubStr( $text, $x, $y );</code></pre>\n\n<p>//Output</p>\n\n<p>riq.Bu</p>', 8, 0, '2021-03-02 02:25:46', '2021-03-02 03:41:58'),
(5, 'How to create a symbolic link for laravel website in cPanel', 'CPanel-də laravel veb səhifəsi üçün simvolik bir qısayol necə yaradılır', 'how-to-create-a-symbolic-link-for-laravel-website-in-cpanel', 'cpanel-de-laravel-veb-sehifesi-ucun-simvolik-bir-qisayol-nece-yaradilir', '<p><img alt=\"\" src=\"https://rahimsuleymanov.com/images/blogs/symlink_1614642696.PNG\" style=\"float:left\" /></p>\n\n<p>Creating symbolic links</p>\n\n<ol>\n	<li>delete the public / storage folder</li>\n	<li>Create a storage folder in the public_html folder</li>\n	<li>ln -s&nbsp; / home / u163060000 / domains / example.com / Projects / Project 1 / storage / app / public /* /home / u163060000 / domains / example.com / public_html / storage</li>\n</ol>', '<p><img alt=\"\" src=\"https://rahimsuleymanov.com/images/blogs/symlink_1614642994.PNG\" style=\"float:left\" /></p>\n\n<p>Simvolik ke&ccedil;idlər yaradılması</p>\n\n<ol>\n	<li>public/storage qovluğunu sil</li>\n	<li>public_html qovluğunda storage qovluğu yarat</li>\n	<li>ln -s /home / u163060000 / domains / example.com / Projects / Project 1/ storage / app / public/* /home / u163060000 / domains / example.com / public_html / storage</li>\n</ol>', 9, 0, '2021-03-02 04:06:12', '2021-07-13 18:02:09'),
(6, 'A program that prints letters in a given text from top to bottom according to the number of processing.', 'Verilmiş textdəki hərfləri işlənmə sayına görə yuxarıdan aşağı doğru çap edən proqram.', 'a-program-that-prints-letters-in-a-given-text-from-top-to-bottom-according-to-the-number-of-processing', 'verilmis-textdeki-herfleri-islenme-sayina-gore-yuxaridan-asagi-dogru-cap-eden-proqram', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 1) A program that prints letters in a given text from top to bottom according to the number of processing. You can use array and for, vvhile, foreach. array_ *, substr, strlen cannot be used. \n */\n\nfunction myRsort ( $text = NULL )\n{\n	$loop        = TRUE;\n	$diffLetters = [];\n	$n           = 0;\n	$myIn_array  = FALSE;\n	while ( $loop === TRUE )\n	{\n		if ( isset( $text[ $n ] ) )\n		{\n			// different letter\n			if ( ! empty( $diffLetters ) )\n			{\n				foreach ( $diffLetters as $diffLetter =&gt; $value )\n				{\n					if ( $diffLetter == $text[ $n ] )\n					{\n						$myIn_array                 = TRUE;\n						$diffLetters[ $text[ $n ] ] = $value + 1;\n					}\n				}\n			}\n\n			if ( $myIn_array !== TRUE )\n			{\n				$diffLetters[ $text[ $n ] ] = 1;\n			}\n			$myIn_array = FALSE;\n			$n++;\n		}\n		else\n		{\n			$loop = FALSE;\n		}\n	}\n\n	//    echo \'&lt;pre&gt;\';\n	//    return $diffLetters;\n\n	//I indexed the elements \n	$output      = [];\n	$bridgeArray = [];\n	foreach ( $diffLetters as $diffLetter =&gt; $value )\n	{\n		$bridgeArray[ $diffLetter ] = $value;\n		$output[]                   = $bridgeArray;\n		$bridgeArray                = [];\n	}\n\n	//Massivde herflerin sayina gore tersine duzdum\n	for ( $i = 0; $i &lt; count( $output ); $i++ )\n	{\n		foreach ( $output[ $i ] as $letter1 =&gt; $value1 )\n		{\n			for ( $j = 0; $j &lt; count( $output ); $j++ )\n			{\n				foreach ( $output[ $j ] as $letter2 =&gt; $value2 )\n				{\n					if ( $value1 &gt; $value2 )\n					{\n						$tem          = $output[ $i ];\n						$output[ $i ] = $output[ $j ];\n						$output[ $j ] = $tem;\n					}\n				}\n			}\n		}\n	}\n\n	echo \'&lt;pre&gt;\';\n\n	return $output;\n}\n\n$text = \'Programming\';\nprint_r( myRsort( $text ) );</code></pre>\n\n<pre>\nArray\n(\n    [0] =&gt; Array\n        (\n            [r] =&gt; 2\n        )\n\n    [1] =&gt; Array\n        (\n            [g] =&gt; 2\n        )\n\n    [2] =&gt; Array\n        (\n            [m] =&gt; 2\n        )\n\n    [3] =&gt; Array\n        (\n            [n] =&gt; 1\n        )\n\n    [4] =&gt; Array\n        (\n            [i] =&gt; 1\n        )\n\n    [5] =&gt; Array\n        (\n            [a] =&gt; 1\n        )\n\n    [6] =&gt; Array\n        (\n            [P] =&gt; 1\n        )\n\n    [7] =&gt; Array\n        (\n            [o] =&gt; 1\n        )\n\n)</pre>', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 1) Verilmiş textdəki hərfləri işlənmə sayına görə yuxarıdan aşağı doğru çap edən proqram. Array və for, vvhile, foreach istifadə edə bilərsiz. array_*, substr, strlen istifadə etmək olmaz.\n */\n\nfunction myRsort ( $text = NULL )\n{\n	$loop        = TRUE;\n	$diffLetters = [];\n	$n           = 0;\n	$myIn_array  = FALSE;\n	while ( $loop === TRUE )\n	{\n		if ( isset( $text[ $n ] ) )\n		{\n			// different letter\n			if ( ! empty( $diffLetters ) )\n			{\n				foreach ( $diffLetters as $diffLetter =&gt; $value )\n				{\n					if ( $diffLetter == $text[ $n ] )\n					{\n						$myIn_array                 = TRUE;\n						$diffLetters[ $text[ $n ] ] = $value + 1;\n					}\n				}\n			}\n\n			if ( $myIn_array !== TRUE )\n			{\n				$diffLetters[ $text[ $n ] ] = 1;\n			}\n			$myIn_array = FALSE;\n			$n++;\n		}\n		else\n		{\n			$loop = FALSE;\n		}\n	}\n\n	//    echo \'&lt;pre&gt;\';\n	//    return $diffLetters;\n\n	//elementleri indeksledim\n	$output      = [];\n	$bridgeArray = [];\n	foreach ( $diffLetters as $diffLetter =&gt; $value )\n	{\n		$bridgeArray[ $diffLetter ] = $value;\n		$output[]                   = $bridgeArray;\n		$bridgeArray                = [];\n	}\n\n	//Massivde herflerin sayina gore tersine duzdum\n	for ( $i = 0; $i &lt; count( $output ); $i++ )\n	{\n		foreach ( $output[ $i ] as $letter1 =&gt; $value1 )\n		{\n			for ( $j = 0; $j &lt; count( $output ); $j++ )\n			{\n				foreach ( $output[ $j ] as $letter2 =&gt; $value2 )\n				{\n					if ( $value1 &gt; $value2 )\n					{\n						$tem          = $output[ $i ];\n						$output[ $i ] = $output[ $j ];\n						$output[ $j ] = $tem;\n					}\n				}\n			}\n		}\n	}\n\n	echo \'&lt;pre&gt;\';\n\n	return $output;\n}\n\n$text = \'Proqramlasdirma\';\nprint_r( myRsort( $text ) );</code></pre>\n\n<p>//Output</p>\n\n<pre>\nArray\n(\n    [0] =&gt; Array\n        (\n            [r] =&gt; 3\n        )\n\n    [1] =&gt; Array\n        (\n            [a] =&gt; 3\n        )\n\n    [2] =&gt; Array\n        (\n            [m] =&gt; 2\n        )\n\n    [3] =&gt; Array\n        (\n            [i] =&gt; 1\n        )\n\n    [4] =&gt; Array\n        (\n            [P] =&gt; 1\n        )\n\n    [5] =&gt; Array\n        (\n            [d] =&gt; 1\n        )\n\n    [6] =&gt; Array\n        (\n            [o] =&gt; 1\n        )\n\n    [7] =&gt; Array\n        (\n            [s] =&gt; 1\n        )\n\n    [8] =&gt; Array\n        (\n            [q] =&gt; 1\n        )\n\n    [9] =&gt; Array\n        (\n            [l] =&gt; 1\n        )\n\n)</pre>', 8, 0, '2021-03-02 20:29:11', '2021-03-02 20:29:11'),
(7, 'A function that prints a given clock in a 24-hour format in a 12-hour format. This time you can use explode. However, date and similar features cannot be used.', '24 saatlıq formatında verilmiş saatı 12 saatlıq formatda çap edən funksiya. Bu dəfə explode istifadə edə bilərsiniz. Lakin, date və bənzəri funksiyalardan istifadə etmək olmaz.', 'a-function-that-prints-a-given-clock-in-a-24-hour-format-in-a-12-hour-format-this-time-you-can-use-explode-however-date-and-similar-features-cannot-be-used', '24-saatliq-formatinda-verilmis-saati-12-saatliq-formatda-cap-eden-funksiya-bu-defe-explode-istifade-ede-bilersiniz-lakin-date-ve-benzeri-funksiyalardan-istifade-etmek-olmaz', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 2) A function that prints a given clock in a 24-hour format in a 12-hour format. This time you can use explode. However, date and similar features cannot be used.\n */\n\nfunction talkTime ( $clock = NULL )\n{\n	$clock  = explode( \':\', $clock );\n	$medium = \'AM\';\n\n	$convert = FALSE;\n\n	if ( count( $clock ) === 2 )\n	{\n		if ( ctype_digit( $clock[ 0 ] ) &amp;&amp; ctype_digit( $clock[ 1 ] ) )\n		{\n			if ( $clock[ 0 ] &lt; 24 &amp;&amp; $clock[ 1 ] &lt; 60 )\n			{\n				if ( $clock[ 0 ] &gt; 12 )\n				{\n					$clock[ 0 ] = $clock[ 0 ] - 12;\n					$medium     = \'PM\';\n				}\n				$convert = TRUE;\n			}\n		}\n	}\n\n	if ( $convert === FALSE )\n	{\n		return \'Please, enter right date format!\';\n	}\n\n	return $clock[ 0 ] . \' : \' . $clock[ 1 ] . \' \' . $medium;\n}\n\n$saat1 = \'01:16\';\n$saat2 = \'03:30\';\n$saat3 = \'23:05\';\n\necho talkTime( $saat1 );</code></pre>\n\n<p>//Output</p>\n\n<p>01 : 16 AM</p>', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 2) 24 saatlıq formatında verilmiş saatı 12 saatlıq formatda çap edən funksiya. Bu dəfə explode istifadə edə bilərsiniz. Lakin, date və bənzəri funksiyalardan istifadə etmək olmaz.\n */\n\nfunction talkTime ( $clock = NULL )\n{\n	$clock  = explode( \':\', $clock );\n	$medium = \'AM\';\n\n	$convert = FALSE;\n\n	if ( count( $clock ) === 2 )\n	{\n		if ( ctype_digit( $clock[ 0 ] ) &amp;&amp; ctype_digit( $clock[ 1 ] ) )\n		{\n			if ( $clock[ 0 ] &lt; 24 &amp;&amp; $clock[ 1 ] &lt; 60 )\n			{\n				if ( $clock[ 0 ] &gt; 12 )\n				{\n					$clock[ 0 ] = $clock[ 0 ] - 12;\n					$medium     = \'PM\';\n				}\n				$convert = TRUE;\n			}\n		}\n	}\n\n	if ( $convert === FALSE )\n	{\n		return \'Please, enter right date format!\';\n	}\n\n	return $clock[ 0 ] . \' : \' . $clock[ 1 ] . \' \' . $medium;\n}\n\n$saat1 = \'01:16\';\n$saat2 = \'03:30\';\n$saat3 = \'23:05\';\n\necho talkTime( $saat1 );</code></pre>\n\n<p>//Output</p>\n\n<p>01 : 16 AM</p>', 8, 0, '2021-03-02 20:36:49', '2021-03-02 20:36:49'),
(8, 'Date given in the form of day-month-year, the program that prints in the format of month-year.', 'gün-ay-il formasında verilmiş tarixi gün, Ay il formatında çap edən proqram.', 'date-given-in-the-form-of-day-month-year-the-program-that-prints-in-the-format-of-month-year', 'gun-ay-il-formasinda-verilmis-tarixi-gun-ay-il-formatinda-cap-eden-proqram', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 3) Date given in the form of day-month-year, the program that prints in the format of month-year. You can use Explode. You can\'t use the array_ * functions, but you can use an array. date and similar ready-made features will not be available.\n */\n\nfunction myDate ( $date = NULL )\n{\n	$date    = explode( \'-\', $date );\n	$months  = [\n		\'January\',\n		\'February\',\n		\'March\',\n		\'April\',\n		\'May\',\n		\'June\',\n		\'July\',\n		\'August\',\n		\'September\',\n		\'October\',\n		\'November\',\n		\'December\',\n	];\n	$convert = FALSE;\n	if ( count( $date ) === 3 )\n	{\n		if ( ctype_digit( $date[ 0 ] ) &amp;&amp; ctype_digit( $date[ 1 ] ) )\n		{\n			if ( $date[ 0 ] &lt; 32 &amp;&amp; $date[ 1 ] &lt; 13 )\n			{\n				$date    = intval( $date[ 0 ] ) . \' \' . $months[ $date[ 1 ] - 1 ] . \', \' . $date[ 2 ];\n				$convert = TRUE;\n			}\n		}\n	}\n\n	if ( $convert === FALSE )\n	{\n		return \'Please, enter right date format!\';\n	}\n\n	return $date;\n}\n\n$tarix1 = \'07-04-2000\';\n$tarix2 = \'12-05-1977\';\necho myDate( $tarix1 );</code></pre>\n\n<p>//Output</p>\n\n<p>7 April, 2000</p>', '<pre>\n<code class=\"language-php\">&lt;?php\n/**\n * 3) gün-ay-il formasında verilmiş tarixi gün, Ay il formatında çap edən proqram. Explode istifadə edə bilərsiniz.  array_* funksiyalarından istifadə etmək olmaz, amma array istifadə edə bilərsiz. date və bənzəri hazır funksiyalar olmaz.\n */\n\nfunction myDate ( $date = NULL )\n{\n	$date    = explode( \'-\', $date );\n	$months  = [\n		\'January\',\n		\'February\',\n		\'March\',\n		\'April\',\n		\'May\',\n		\'June\',\n		\'July\',\n		\'August\',\n		\'September\',\n		\'October\',\n		\'November\',\n		\'December\',\n	];\n	$convert = FALSE;\n	if ( count( $date ) === 3 )\n	{\n		if ( ctype_digit( $date[ 0 ] ) &amp;&amp; ctype_digit( $date[ 1 ] ) )\n		{\n			if ( $date[ 0 ] &lt; 32 &amp;&amp; $date[ 1 ] &lt; 13 )\n			{\n				$date    = intval( $date[ 0 ] ) . \' \' . $months[ $date[ 1 ] - 1 ] . \', \' . $date[ 2 ];\n				$convert = TRUE;\n			}\n		}\n	}\n\n	if ( $convert === FALSE )\n	{\n		return \'Please, enter right date format!\';\n	}\n\n	return $date;\n}\n\n$tarix1 = \'07-04-2000\';\n$tarix2 = \'12-05-1977\';\necho myDate( $tarix1 );</code></pre>\n\n<p>//Output</p>\n\n<p>7 April, 2000</p>', 8, 0, '2021-03-02 20:39:08', '2021-03-02 20:39:08'),
(9, 'Laravel manual login function', 'Laravel manual  login funksiyası', 'laravel-manual-login-function', 'laravel-manual-login-funksiyasi', '<pre>\n<code class=\"language-php\">$user = User::where(\'email\',\'=\',$request-&gt;email)-&gt;first();\n\nif ($user !== null)\n{\n    if (password_verify($request-&gt;password,$user-&gt;password))\n    {\n        Auth::loginUsingId($user-&gt;id, TRUE);\n        return redirect()-&gt;route(\'one\');\n    }\n    else\n    {\n        return view(\'auth.login\')-&gt;with(\'error\',\'Password is incorrect\');\n    }\n}\nelse\n{\n    return view(\'auth.login\')-&gt;with(\'error\',\'Email or password is incorrect\');\n}</code></pre>\n\n<p>&nbsp;</p>', '<pre>\n<code class=\"language-php\">$user = User::where(\'email\',\'=\',$request-&gt;email)-&gt;first();\n\nif ($user !== null)\n{\n    if (password_verify($request-&gt;password,$user-&gt;password))\n    {\n        Auth::loginUsingId($user-&gt;id, TRUE);\n        return redirect()-&gt;route(\'one\');\n    }\n    else\n    {\n        return view(\'auth.login\')-&gt;with(\'error\',\'Password is incorrect\');\n    }\n}\nelse\n{\n    return view(\'auth.login\')-&gt;with(\'error\',\'Email or password is incorrect\');\n}</code></pre>\n\n<p>&nbsp;</p>', 5, 0, '2021-03-03 15:17:36', '2021-03-03 15:18:20'),
(10, 'Validation Localization', 'Doğrulama Lokallaşdırma', 'validation-localization', 'dogrulama-lokallasdirma', '<pre>\n<code class=\"language-php\">&lt;?php\n\nnamespace App\\Http\\Requests;\n\nuse Illuminate\\Foundation\\Http\\FormRequest;\n\nclass signInUpRequest extends FormRequest\n{\n    /**\n     * Determine if the user is authorized to make this request.\n     *\n     * @return bool\n     */\n    public function authorize()\n    {\n        return true;\n    }\n\n    /**\n     * Get the validation rules that apply to the request.\n     *\n     * @return array\n     */\n    public function rules()\n    {\n        return [\n            \'fullName\'=&gt;\'required|min:3|max:50\',\n            \'email\'=&gt;\'required|email|max:255|unique:users,email\',\n            \'password\' =&gt; \'min:8|required_with:password_confirmation|same:password_confirmation\',\n            \'password_confirmation\' =&gt; \'min:8\'\n        ];\n    }\n\n    public function attributes()\n    {\n        return [\n            \'fullName\' =&gt; __(\'home.full_name\'),\n            \'email\' =&gt; __(\'home.email_address\'),\n            \'password\' =&gt; __(\'home.password\'),\n            \'password_confirmation\' =&gt; __(\'home.confirm_password\'),\n        ];\n    }\n}\n</code></pre>\n\n<p>&nbsp;</p>', '<pre>\n<code class=\"language-php\">&lt;?php\n\nnamespace App\\Http\\Requests;\n\nuse Illuminate\\Foundation\\Http\\FormRequest;\n\nclass signInUpRequest extends FormRequest\n{\n    /**\n     * Determine if the user is authorized to make this request.\n     *\n     * @return bool\n     */\n    public function authorize()\n    {\n        return true;\n    }\n\n    /**\n     * Get the validation rules that apply to the request.\n     *\n     * @return array\n     */\n    public function rules()\n    {\n        return [\n            \'fullName\'=&gt;\'required|min:3|max:50\',\n            \'email\'=&gt;\'required|email|max:255|unique:users,email\',\n            \'password\' =&gt; \'min:8|required_with:password_confirmation|same:password_confirmation\',\n            \'password_confirmation\' =&gt; \'min:8\'\n        ];\n    }\n\n    public function attributes()\n    {\n        return [\n            \'fullName\' =&gt; __(\'home.full_name\'),\n            \'email\' =&gt; __(\'home.email_address\'),\n            \'password\' =&gt; __(\'home.password\'),\n            \'password_confirmation\' =&gt; __(\'home.confirm_password\'),\n        ];\n    }\n}\n</code></pre>\n\n<p>&nbsp;</p>', 5, 0, '2021-03-04 12:28:49', '2021-03-04 12:28:49'),
(12, 'Send an email in Laravel', 'Laraveldə email göndərmək', 'send-an-email-in-laravel', 'laravelde-email-gondermek', '<p>&nbsp;1. Make the following changes to the .env file</p>\n\n<pre>\n<code class=\"language-php\">MAIL_MAILER=smtp\nMAIL_HOST=smtp.googlemail.com\nMAIL_PORT=465\nMAIL_USERNAME=youremail@gmail.com\nMAIL_PASSWORD=Your Password\nMAIL_ENCRYPTION=ssl\nMAIL_FROM_ADDRESS=youremail@gmail.com\nMAIL_FROM_NAME=\"${APP_NAME}\"</code></pre>\n\n<p>2. php artisan make:mail SignUp --markdown = emails.signInUp.signUp run the command</p>\n\n<p>3. Make the following changes to the In the controller which we will use ... \\ app \\ Mail \\ signInUp.php</p>\n\n<pre>\n<code class=\"language-php\">$title                  = __(\'home.confirmationTitle\');\n$link                   = url(\'/confirmationUsers/\'.$user-&gt;id.\'/\'.$user-&gt;email);\n$text                   = __(\'home.confirmationMail\');\n\n$details = [\n    \'title\' =&gt; $title,\n    \'link\'  =&gt; $link,\n    \'body\'  =&gt; $text\n];\nMail::to($request-&gt;email)-&gt;send(new SignUp($details));</code></pre>\n\n<p>4. Change ... \\ app \\ Mail \\ signInUp.php as follows</p>\n\n<pre>\n<code class=\"language-php\">&lt;?php\n\nnamespace App\\Mail;\n\nuse Illuminate\\Bus\\Queueable;\nuse Illuminate\\Contracts\\Queue\\ShouldQueue;\nuse Illuminate\\Mail\\Mailable;\nuse Illuminate\\Queue\\SerializesModels;\n\nclass SignUp extends Mailable\n{\n    use Queueable, SerializesModels;\n    public $details;\n\n    /**\n     * Create a new message instance.\n     *\n     * @return void\n     */\n    public function __construct($details)\n    {\n        $this-&gt;details = $details;\n    }\n\n    /**\n     * Build the message.\n     *\n     * @return $this\n     */\n    public function build()\n    {\n        return $this-&gt;subject(__(\'home.confirmationSubject\'))\n            -&gt;markdown(\'emails.signInUp.signUp\');\n    }\n}\n</code></pre>\n\n<p>5. Change ... \\ resources \\ views \\ emails \\ signInUp \\ signUp.blade.php as follows.</p>\n\n<pre>\n<code class=\"language-php\">@component(\'mail::layout\')\n    {{-- Header --}}\n    @slot(\'header\')\n        @component(\'mail::header\', [\'url\' =&gt; config(\'app.url\')])\n        {{ config(\'app.name\') }}\n        @endcomponent\n    @endslot\n    {{-- Body --}}\n    {{$details[\'title\']}}\n\n    {{-- Subcopy --}}\n    @isset($details[\'body\'])\n        @slot(\'subcopy\')\n            @component(\'mail::subcopy\')\n                {{$details[\'body\']}}\n                &lt;div style=\"text-align: center\"&gt;\n                    &lt;a href=\"{{ $details[\'link\'] }}\" class=\"button button-green\"&gt;{{ __(\'home.confirm\') }}&lt;/a&gt;\n                &lt;/div&gt;\n            @endcomponent\n        @endslot\n    @endisset\n\n    {{-- Footer --}}\n    @slot(\'footer\')\n        @component(\'mail::footer\')\n            © {{ date(\'Y\') }} {{ config(\'app.name\') }}. Group\n        @endcomponent\n    @endslot\n@endcomponent\n</code></pre>\n\n<p>The resulting email will be mailed as follows.</p>\n\n<p><img alt=\"\" src=\"https://rahimsuleymanov.com/images/blogs/mailEn_1614870128.PNG\" style=\"float:left\" /></p>', '<p>&nbsp;1. .env faylında aşağıdakı dəyişiklikləri etmək&nbsp;</p>\n\n<pre>\n<code class=\"language-php\">MAIL_MAILER=smtp\nMAIL_HOST=smtp.googlemail.com\nMAIL_PORT=465\nMAIL_USERNAME=youremail@gmail.com\nMAIL_PASSWORD=Your Password\nMAIL_ENCRYPTION=ssl\nMAIL_FROM_ADDRESS=youremail@gmail.com\nMAIL_FROM_NAME=\"${APP_NAME}\"</code></pre>\n\n<p>2. php artisan make:mail SignUp --markdown=emails.signInUp.signUp əmrini &ccedil;alışdırmaq</p>\n\n<p>3. ...\\app\\Mail\\signInUp.php -i istifadə edəcəyimiz controllerdə aşağıdakıları daxil etmək.</p>\n\n<pre>\n<code class=\"language-php\">$title                  = __(\'home.confirmationTitle\');\n$link                   = url(\'/confirmationUsers/\'.$user-&gt;id.\'/\'.$user-&gt;email);\n$text                   = __(\'home.confirmationMail\');\n\n$details = [\n    \'title\' =&gt; $title,\n    \'link\'  =&gt; $link,\n    \'body\'  =&gt; $text\n];\nMail::to($request-&gt;email)-&gt;send(new SignUp($details));</code></pre>\n\n<p>4.&nbsp;...\\app\\Mail\\signInUp.php -i aşağıdakı kimi dəyişmək</p>\n\n<pre>\n<code class=\"language-php\">&lt;?php\n\nnamespace App\\Mail;\n\nuse Illuminate\\Bus\\Queueable;\nuse Illuminate\\Contracts\\Queue\\ShouldQueue;\nuse Illuminate\\Mail\\Mailable;\nuse Illuminate\\Queue\\SerializesModels;\n\nclass SignUp extends Mailable\n{\n    use Queueable, SerializesModels;\n    public $details;\n\n    /**\n     * Create a new message instance.\n     *\n     * @return void\n     */\n    public function __construct($details)\n    {\n        $this-&gt;details = $details;\n    }\n\n    /**\n     * Build the message.\n     *\n     * @return $this\n     */\n    public function build()\n    {\n        return $this-&gt;subject(__(\'home.confirmationSubject\'))\n            -&gt;markdown(\'emails.signInUp.signUp\');\n    }\n}\n</code></pre>\n\n<p>5. ...\\ resources \\ views \\ emails \\ signInUp \\ signUp.blade.php -ni aşağıdakı kimi dəyişmək.</p>\n\n<pre>\n<code class=\"language-php\">@component(\'mail::layout\')\n    {{-- Header --}}\n    @slot(\'header\')\n        @component(\'mail::header\', [\'url\' =&gt; config(\'app.url\')])\n        {{ config(\'app.name\') }}\n        @endcomponent\n    @endslot\n    {{-- Body --}}\n    {{$details[\'title\']}}\n\n    {{-- Subcopy --}}\n    @isset($details[\'body\'])\n        @slot(\'subcopy\')\n            @component(\'mail::subcopy\')\n                {{$details[\'body\']}}\n                &lt;div style=\"text-align: center\"&gt;\n                    &lt;a href=\"{{ $details[\'link\'] }}\" class=\"button button-green\"&gt;{{ __(\'home.confirm\') }}&lt;/a&gt;\n                &lt;/div&gt;\n            @endcomponent\n        @endslot\n    @endisset\n\n    {{-- Footer --}}\n    @slot(\'footer\')\n        @component(\'mail::footer\')\n            © {{ date(\'Y\') }} {{ config(\'app.name\') }}. Group\n        @endcomponent\n    @endslot\n@endcomponent\n</code></pre>\n\n<p>Nəticədə daxil edilən emailə aşağıdakı kimi mail g&ouml;ndəriləcək.</p>\n\n<p><img alt=\"\" src=\"https://rahimsuleymanov.com/images/blogs/mail_1614869176.PNG\" /></p>', 5, 0, '2021-03-04 19:02:27', '2021-03-23 02:01:24'),
(13, 'How to validate Route Parameters in Laravel', 'Laravel-də route parametrlərini necə validate etmək olar', 'how-to-validate-route-parameters-in-laravel', 'laravel-de-route-parametrlerini-nece-validate-etmek-olar', '<pre>\n<code class=\"language-php\">public function confirmationUsers(Request $request,$id,$email)\n{\n    $request-&gt;merge([\'id\' =&gt; $id,\'email\'=&gt;$email]) ;\n\n    $validator = Validator::make($request-&gt;all(), [\n        \'id\'=&gt;\'integer\'\n    ]);\n\n    if ($validator-&gt;fails())\n    {\n        //get errors\n        //$error_message  = $validator-&gt;messages();\n        return abort(404,__(\'error.not_found\'));\n    }\n    // your codes...\n}</code></pre>\n\n<p>&nbsp;</p>', '<pre>\n<code class=\"language-php\">public function confirmationUsers(Request $request,$id,$email)\n{\n    $request-&gt;merge([\'id\' =&gt; $id,\'email\'=&gt;$email]) ;\n\n    $validator = Validator::make($request-&gt;all(), [\n        \'id\'=&gt;\'integer\'\n    ]);\n\n    if ($validator-&gt;fails())\n    {\n        //get errors\n        //$error_message  = $validator-&gt;messages();\n        return abort(404,__(\'error.not_found\'));\n    }\n    // your codes...\n}</code></pre>\n\n<p>&nbsp;</p>', 5, 0, '2021-03-04 21:45:18', '2021-05-06 07:27:19'),
(14, 'How to validate input data using ajax in laravel', 'Laravel-də ajax istifadə edərək input məlumatlarını necə təsdiqləmək olar', 'how-to-validate-input-data-using-ajax-in-laravel', 'laravel-de-ajax-istifade-ederek-input-melumatlarini-nece-tesdiqlemek-olar', '<pre>\n<code class=\"language-php\">@extends(\'front.layout.master\')\n\n@section(\'title\')\n    {{ __(\'home.password_recovery\') }}\n@endsection\n\n@section(\'css\')\n\n@endsection\n\n@section(\'content\')\n    &lt;div class=\"container py-4 py-lg-5 my-4\"&gt;\n        &lt;div class=\"row justify-content-center\"&gt;\n            &lt;div class=\"col-lg-8 col-md-10\"&gt;\n                &lt;h2 class=\"h3 mb-4 password-recovery-title\"&gt;{{ __(\'home.forgot_password?\') }}&lt;/h2&gt;\n                &lt;p class=\"font-size-md\"&gt;{{ __(\'home.change_your_password_in_three_easy_steps_this_helps_to_keep_your_new_password_secure\') }}.&lt;/p&gt;\n                &lt;ol class=\"list-unstyled font-size-md\"&gt;\n                    &lt;li&gt;&lt;span class=\"text-primary mr-2\"&gt;1.&lt;/span&gt;{{ __(\'home.fill_in_your_email_address_below\') }}.&lt;/li&gt;\n                    &lt;li&gt;&lt;span class=\"text-primary mr-2\"&gt;2.&lt;/span&gt;{{ __(\'home.we_ll_email_you_a_temporary_code\') }}.&lt;/li&gt;\n                    &lt;li&gt;&lt;span class=\"text-primary mr-2\"&gt;3.&lt;/span&gt;{{ __(\'home.use_the_code_to_change_your_password_on_our_secure_website\') }}.&lt;/li&gt;\n                &lt;/ol&gt;\n                &lt;div class=\"card py-2 mt-4\"&gt;\n                    &lt;form class=\"card-body needs-validation\" novalidate=\"\" onsubmit=\"return false\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"recover-email\"&gt;{{ __(\'home.enter_your_email_address\') }}&lt;/label&gt;\n                            &lt;input class=\"form-control\" type=\"email\" id=\"recover-email\"&gt;\n                            &lt;div class=\"feedback\" id=\"emailErrorRe\"&gt;&lt;/div&gt;\n                        &lt;/div&gt;\n\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"recover-email\"&gt;{{ __(\'home.code\') }}&lt;/label&gt;\n                            &lt;input class=\"form-control\" type=\"text\" id=\"recover-code\"&gt;\n                            &lt;div class=\"feedback\" id=\"codeErrorRe\"&gt;&lt;/div&gt;\n                        &lt;/div&gt;\n\n                        &lt;button class=\"btn btn-primary\" id=\"recoveryBtn\" type=\"button\"&gt;{{ __(\'home.get_new_password\') }}&lt;/button&gt;\n                    &lt;/form&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;\n    &lt;/div&gt;\n@endsection\n\n@section(\'js\')\n    &lt;script&gt;\n        $(document).ready(function () {\n            $(\'#recoveryBtn\').click(function () {\n                $(this).prop(\'disabled\',true);\n                $(\'.feedback\').html(\'\');\n                let email  = $(\'#recover-email\').val();\n                let code   = $(\'#recover-code\').val();\n                if (email === \'\' || code === \'\')\n                {\n                    toastr.error(\"{{ __(\'toastr.incorrect_email\') }}\", \"{{ __(\"toastr.attention\") }}\");\n                    $(\'#recoveryBtn\').prop(\'disabled\',false);\n                    return ;\n                }\n                $.ajax({\n                    type:\'POST\',\n                    data:{email:email,code:code},\n                    url:\"{!! route(\'password.recovery.code.post\') !!}\",\n                    success:function (response) {\n                        if (response === \'notFound\')\n                        {\n                            toastr.error(\"{{ __(\'toastr.incorrect_email\') }}\", \"{{ __(\"toastr.attention\") }}\");\n                        }\n                        else\n                        {\n                            alert(\'response\')\n                        }\n                        $(\'#recoveryBtn\').prop(\'disabled\',false);\n                    },\n                    error: function(myErrors)\n                    {\n                        $.each(myErrors.responseJSON.errors, function (key, item)\n                        {\n                            $(\'#\'+key+\'ErrorRe\').removeAttr(\'class\').attr(\'class\',\'feedback \' +\n                                \'recoveryErrors\').html(\'\').html(item);\n                        });\n                        $(\'#recoveryBtn\').prop(\'disabled\',false);\n                    }\n                })\n            })\n        });\n    &lt;/script&gt;\n@endsection\n</code></pre>\n\n<p>&nbsp;</p>', '<pre>\n<code class=\"language-php\">@extends(\'front.layout.master\')\n\n@section(\'title\')\n    {{ __(\'home.password_recovery\') }}\n@endsection\n\n@section(\'css\')\n\n@endsection\n\n@section(\'content\')\n    &lt;div class=\"container py-4 py-lg-5 my-4\"&gt;\n        &lt;div class=\"row justify-content-center\"&gt;\n            &lt;div class=\"col-lg-8 col-md-10\"&gt;\n                &lt;h2 class=\"h3 mb-4 password-recovery-title\"&gt;{{ __(\'home.forgot_password?\') }}&lt;/h2&gt;\n                &lt;p class=\"font-size-md\"&gt;{{ __(\'home.change_your_password_in_three_easy_steps_this_helps_to_keep_your_new_password_secure\') }}.&lt;/p&gt;\n                &lt;ol class=\"list-unstyled font-size-md\"&gt;\n                    &lt;li&gt;&lt;span class=\"text-primary mr-2\"&gt;1.&lt;/span&gt;{{ __(\'home.fill_in_your_email_address_below\') }}.&lt;/li&gt;\n                    &lt;li&gt;&lt;span class=\"text-primary mr-2\"&gt;2.&lt;/span&gt;{{ __(\'home.we_ll_email_you_a_temporary_code\') }}.&lt;/li&gt;\n                    &lt;li&gt;&lt;span class=\"text-primary mr-2\"&gt;3.&lt;/span&gt;{{ __(\'home.use_the_code_to_change_your_password_on_our_secure_website\') }}.&lt;/li&gt;\n                &lt;/ol&gt;\n                &lt;div class=\"card py-2 mt-4\"&gt;\n                    &lt;form class=\"card-body needs-validation\" novalidate=\"\" onsubmit=\"return false\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"recover-email\"&gt;{{ __(\'home.enter_your_email_address\') }}&lt;/label&gt;\n                            &lt;input class=\"form-control\" type=\"email\" id=\"recover-email\"&gt;\n                            &lt;div class=\"feedback\" id=\"emailErrorRe\"&gt;&lt;/div&gt;\n                        &lt;/div&gt;\n\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"recover-email\"&gt;{{ __(\'home.code\') }}&lt;/label&gt;\n                            &lt;input class=\"form-control\" type=\"text\" id=\"recover-code\"&gt;\n                            &lt;div class=\"feedback\" id=\"codeErrorRe\"&gt;&lt;/div&gt;\n                        &lt;/div&gt;\n\n                        &lt;button class=\"btn btn-primary\" id=\"recoveryBtn\" type=\"button\"&gt;{{ __(\'home.get_new_password\') }}&lt;/button&gt;\n                    &lt;/form&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;\n    &lt;/div&gt;\n@endsection\n\n@section(\'js\')\n    &lt;script&gt;\n        $(document).ready(function () {\n            $(\'#recoveryBtn\').click(function () {\n                $(this).prop(\'disabled\',true);\n                $(\'.feedback\').html(\'\');\n                let email  = $(\'#recover-email\').val();\n                let code   = $(\'#recover-code\').val();\n                if (email === \'\' || code === \'\')\n                {\n                    toastr.error(\"{{ __(\'toastr.incorrect_email\') }}\", \"{{ __(\"toastr.attention\") }}\");\n                    $(\'#recoveryBtn\').prop(\'disabled\',false);\n                    return ;\n                }\n                $.ajax({\n                    type:\'POST\',\n                    data:{email:email,code:code},\n                    url:\"{!! route(\'password.recovery.code.post\') !!}\",\n                    success:function (response) {\n                        if (response === \'notFound\')\n                        {\n                            toastr.error(\"{{ __(\'toastr.incorrect_email\') }}\", \"{{ __(\"toastr.attention\") }}\");\n                        }\n                        else\n                        {\n                            alert(\'response\')\n                        }\n                        $(\'#recoveryBtn\').prop(\'disabled\',false);\n                    },\n                    error: function(myErrors)\n                    {\n                        $.each(myErrors.responseJSON.errors, function (key, item)\n                        {\n                            $(\'#\'+key+\'ErrorRe\').removeAttr(\'class\').attr(\'class\',\'feedback \' +\n                                \'recoveryErrors\').html(\'\').html(item);\n                        });\n                        $(\'#recoveryBtn\').prop(\'disabled\',false);\n                    }\n                })\n            })\n        });\n    &lt;/script&gt;\n@endsection\n</code></pre>\n\n<p>&nbsp;</p>', 5, 0, '2021-03-06 10:46:19', '2021-03-06 10:46:19'),
(15, 'How to create and destroy cookie in Laravel', 'Laravel-də cookie necə yaradılır və yox edilir', 'how-to-create-and-destroy-cookie-in-laravel', 'laravel-de-cookie-nece-yaradilir-ve-yox-edilir', '<p>1.Create</p>\n\n<pre>\n<code class=\"language-php\">Cookie::queue(\n    Cookie::make(\'cookieName\', \'value\', \'minutes\')\n);</code></pre>\n\n<p>2.Get value</p>\n\n<pre>\n<code class=\"language-php\">Cookie::get(\'cookieName\');</code></pre>\n\n<p>3.Destroy cookie</p>\n\n<pre>\n<code class=\"language-php\">Cookie::queue(\n    Cookie::forget(\'cookieName\')\n);</code></pre>\n\n<p>&nbsp;</p>', '<p>&nbsp;1.Cookie yarat</p>\n\n<pre>\n<code class=\"language-php\">Cookie::queue(\n    Cookie::make(\'cookieAdi\', \'deyeri\', \'deqiqeler\')\n);</code></pre>\n\n<p>2.Cookie - nin dəyərin al</p>\n\n<pre>\n<code class=\"language-php\">Cookie::get(\'cookieAdi\');</code></pre>\n\n<p>3.Cookie - ni yox et</p>\n\n<pre>\n<code class=\"language-php\">Cookie::queue(\n    Cookie::forget(\'cookieAdi\')\n);</code></pre>\n\n<p>&nbsp;</p>', 5, 0, '2021-03-06 23:55:50', '2021-03-10 16:08:48'),
(16, 'laravel clear database cache', 'laravel artisan clear cache', 'laravel-clear-database-cache', 'laravel-artisan-clear-cache', '<pre>\n<code class=\"language-php\">php artisan view:clear \nphp artisan cache:clear\nphp artisan route:clear\nphp artisan config:clear</code></pre>\n\n<p>&nbsp;</p>', '<pre>\n<code class=\"language-php\">php artisan view:clear \nphp artisan cache:clear\nphp artisan route:clear\nphp artisan config:clear</code></pre>\n\n<p>&nbsp;</p>', 5, 0, '2021-03-10 15:59:09', '2021-03-10 15:59:09'),
(17, 'How to start  Development Server in PHP?', 'PHP -də development server necə başladılır?', 'how-to-start-development-server-in-php', 'php-de-development-server-nece-basladilir', '<pre>\n<code class=\"language-php\">php -S localhost:8000</code></pre>\n\n<p>&nbsp;</p>', '<pre>\n<code class=\"language-php\">php -S localhost:8000</code></pre>\n\n<p>&nbsp;</p>', 4, 0, '2021-03-13 23:48:09', '2021-03-13 23:48:09');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `partners`
--

INSERT INTO `partners` (`id`, `logo`, `name`, `link`, `created_at`, `updated_at`) VALUES
(2, '619b563077c5e.jpg', 'Malybeilli', 'https://malybeili.az/', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hits` int NOT NULL DEFAULT '0',
  `order_no` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `products`
--

INSERT INTO `products` (`id`, `service_id`, `company_id`, `src`, `alt`, `title_az`, `title_en`, `title_ru`, `slug_az`, `slug_en`, `slug_ru`, `link`, `text_az`, `text_en`, `text_ru`, `hits`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '4g3kgGiParWG4HAYgeWxMwl4vcpsQSymzhLFyvfR.jpg', 'ALT', 'Title(AZ)', 'Title(EN)', 'Title(RU)', 'titleaz', 'titleen', 'titleru', NULL, 'Text(AZ)', 'Text(EN)', 'Text(RU)', 3, 1, '2023-09-12 14:20:23', '2023-09-13 05:28:15');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `src`, `order_no`, `created_at`, `updated_at`) VALUES
(3, 1, 'ebboOHrzAboOfJxEcuvpAQaQLdZ6p3F9aOrYfNvN.jpg', 0, '2023-09-12 14:38:48', '2023-09-12 14:38:48'),
(4, 1, 'PLSoYKmvsGG7J2KK0y9Ebk1nWdeKxpiKeXAGVSUe.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16'),
(5, 1, 'IXZ5DNDxcifR2HZrANy8HMdMxNtHLNU4WLB11IWx.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16'),
(6, 1, 'g2mvklnp9tV2s5RPj5uqdEZhrgFtTbW9IYOc3K3Q.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16'),
(7, 1, 'kArXay3lKDORMl8n9sCUtX3w0NQIFssUFrnXWG9b.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16'),
(8, 1, 'TllctlgseswryJENxtR4edQz7IRVqvg0YUvMznsY.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16'),
(9, 1, 'HXBFcfs0tKe6kbejBSp4JOvIUisHBOEyWI8kDmCu.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16'),
(10, 1, 'S69qPaDNxkuzL3Iq7qtO6HIkomLkSyr2PFeKoMLO.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16'),
(11, 1, 'YhkFtL2eQmPm33ENBRnD5Df1y0XkqQ7gdbcKiQ2c.jpg', 0, '2023-09-12 14:41:16', '2023-09-12 14:41:16');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kateqoriya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `order_no` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `projects`
--

INSERT INTO `projects` (`id`, `name`, `link`, `tarix`, `kateqoriya`, `slug`, `home`, `order_no`, `created_at`, `updated_at`) VALUES
(33, 'MALYBEILLI', 'https://malybeili.az/', '20 Dekabr 2021', 'websites', 'malybeili-az', 0, 8, '2022-09-18 12:25:26', '2022-09-18 12:25:26'),
(34, 'MMLOGISTICS', 'https://mm.crr.az/', '4 Yanvar 2022', 'websites', 'mmlogistcs-az', 1, 4, '2022-09-18 12:29:02', '2022-09-18 12:29:02'),
(35, 'FS CODE', 'https://www.fs-code.com', '20 May 2021', 'websites', 'fs-code', 1, 1, '2022-09-18 12:31:16', '2022-09-18 12:31:16'),
(36, 'SCALIS', 'https://scalis.rahimsuleymanov.com/', '20 May 2021', 'websites', 'scalis', 0, 7, '2022-09-18 12:32:29', '2022-09-18 12:32:29'),
(38, 'AZCANET', 'https://azcanet.ca', '27 iyul 2022', 'websites', 'azcanet', 1, 3, '2022-09-18 12:37:06', '2022-09-18 12:37:06'),
(39, 'AĞILLI NAĞILLAR', 'https://agillinagillar.com/', '20 iyun 2022', 'websites', 'agillinagillar', 0, 6, '2022-09-18 12:39:36', '2022-09-18 12:39:36'),
(40, 'CORN', 'https://corn.az/', '15 sentyabr 2022', 'websites', 'https://corn.az/', 1, 2, '2022-09-18 12:42:53', '2022-09-18 12:42:53'),
(41, 'GOSPEAK', 'https://gospeak.az', '5 iyul 2022', 'websites', 'gospeak', 0, 5, '2022-09-18 12:44:43', '2022-09-18 12:44:43'),
(42, 'VK GROUP', 'https://vkgroup.az/', '20 Sentyabr 2022', 'websites', 'vk-group', 0, 0, '2022-11-28 19:59:44', '2022-11-28 19:59:44'),
(43, 'METALCON', 'https://metalcon.rahimsuleymanov.com/', '20 Noyabr 2022', 'websites', 'metalcon', 0, 0, '2022-11-28 20:34:06', '2022-11-28 20:34:06');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, '61e019dd94292.jpg', NULL, NULL),
(2, 1, '61e019dd95e4c.jpg', NULL, NULL),
(3, 2, '61e020e368ca4.jpg', NULL, NULL),
(4, 2, '61e020e36b3a7.jpg', NULL, NULL),
(5, 2, '61e020e36d955.jpg', NULL, NULL),
(6, 3, '61e7fb69ec27f.png', NULL, NULL),
(7, 4, '61e7fc7c01278.png', NULL, NULL),
(8, 5, '61e7ff2dd668c.png', NULL, NULL),
(9, 6, '61e7ffe136f26.png', NULL, NULL),
(10, 7, '61e80906bcf97.png', NULL, NULL),
(11, 8, '61ea4e0e260e0.png', NULL, NULL),
(12, 9, '61ea4e4d6e000.png', NULL, NULL),
(13, 10, '61ea4e88ae787.png', NULL, NULL),
(14, 11, '61ef89803f179.jpg', NULL, NULL),
(15, 12, '61ef899e81b04.jpg', NULL, NULL),
(16, 13, '61ef8bc47a82b.png', NULL, NULL),
(17, 14, '620f2ffd45dcc.png', NULL, NULL),
(18, 15, '62173d68862ce.png', NULL, NULL),
(19, 16, '621740c3c099b.png', NULL, NULL),
(20, 17, '62174278f3cd8.png', NULL, NULL),
(21, 18, '621742a6090c1.png', NULL, NULL),
(22, 18, '621742a6097f9.png', NULL, NULL),
(23, 19, '62174358c8048.png', NULL, NULL),
(24, 20, '6217445b15b64.png', NULL, NULL),
(25, 21, '621745d1b5a1d.png', NULL, NULL),
(26, 22, '621746be6b55e.png', NULL, NULL),
(27, 23, '6245a50400095.png', NULL, NULL),
(28, 24, '6245a64345d61.png', NULL, NULL),
(29, 25, '6245ad2a7e503.png', NULL, NULL),
(30, 26, '624af3f8c02c1.png', NULL, NULL),
(31, 27, '624fcbb8af622.png', NULL, NULL),
(32, 28, '624fcc197bc8b.png', NULL, NULL),
(33, 29, '624fcc4dda05c.png', NULL, NULL),
(34, 30, '624fcc86a2a33.png', NULL, NULL),
(35, 31, '630914bf61e1a.webp', NULL, NULL),
(36, 32, '630a2468f0c92.jpg', NULL, NULL),
(37, 33, '63270e36139fb.jpg', NULL, NULL),
(38, 34, '63270f0ecc3a7.jpg', NULL, NULL),
(39, 35, '63270f9418681.jpg', NULL, NULL),
(40, 36, '63270fddb8f40.jpg', NULL, NULL),
(41, 37, '6327107e4a438.jpg', NULL, NULL),
(42, 38, '632710f2431c7.jpg', NULL, NULL),
(43, 39, '6327118851cc9.jpg', NULL, NULL),
(44, 40, '6327124d60f7e.jpg', NULL, NULL),
(45, 41, '632712bbd2888.jpg', NULL, NULL),
(46, 42, '6385133018612.webp', NULL, NULL),
(47, 43, '63851b3eb7981.webp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_home` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - not, 1 - on home',
  `order_no` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `services`
--

INSERT INTO `services` (`id`, `src`, `alt`, `name_az`, `name_en`, `name_ru`, `slug_az`, `slug_en`, `slug_ru`, `on_home`, `order_no`, `created_at`, `updated_at`) VALUES
(2, 't522hMzmbqaOaQnO6GtCwuiOs18QeGAcTNowNPwA.jpg', 'ALT', 'Name(AZ) 1', NULL, NULL, 'nameaz-1', '', '', 1, 1, '2023-09-12 05:22:20', '2023-09-12 05:31:02'),
(3, '32wa9oOsf8AikqoqS16AfPXj5fTMs1RqcdJwdhFp.jpg', 'ALT', 'Name(AZ) 2', NULL, NULL, 'nameaz-2', '', '', 1, 2, '2023-09-12 05:22:52', '2023-09-12 05:31:00');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Cədvəl üçün indekslər `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_group_id_foreign` (`group_id`);

--
-- Cədvəl üçün indekslər `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Cədvəl üçün indekslər `free_seo_audits`
--
ALTER TABLE `free_seo_audits`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Cədvəl üçün indekslər `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Cədvəl üçün indekslər `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_service_id_foreign` (`service_id`);

--
-- Cədvəl üçün indekslər `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Cədvəl üçün indekslər `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Cədvəl üçün AUTO_INCREMENT `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Cədvəl üçün AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Cədvəl üçün AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Cədvəl üçün AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Cədvəl üçün AUTO_INCREMENT `free_seo_audits`
--
ALTER TABLE `free_seo_audits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Cədvəl üçün AUTO_INCREMENT `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Cədvəl üçün AUTO_INCREMENT `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Cədvəl üçün AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Cədvəl üçün AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Cədvəl üçün AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Cədvəl üçün AUTO_INCREMENT `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Cədvəl üçün AUTO_INCREMENT `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
