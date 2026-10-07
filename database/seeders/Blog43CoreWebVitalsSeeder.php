<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog43CoreWebVitalsSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Ziyarətçi saytınıza gəlir, ekran ağ qalır, şəkillər gec yüklənir, düyməyə basanda heç nə olmur — və o geri qayıdıb rəqibin saytını açır. Sürət yalnız rahatlıq məsələsi deyil: Google səhifə təcrübəsini ölçür və bu ölçülərə <strong>Core Web Vitals</strong> deyir. Yavaş sayt həm müştəri, həm də reklama xərclənən pul itirir.</p>
<p>Bu yazıda Core Web Vitals-ın 3 göstəricisini sadə dillə izah edir, saytınızın sürətini necə yoxlamağı və ən təsirli düzəlişləri göstəririk.</p>

<h2>Core Web Vitals: 3 Əsas Göstərici</h2>
<table>
  <thead>
    <tr><th>Göstərici</th><th>Nəyi ölçür</th><th>Yaxşı</th><th>Zəif</th></tr>
  </thead>
  <tbody>
    <tr><td>LCP (Largest Contentful Paint)</td><td>Əsas məzmunun (böyük şəkil, başlıq) nə qədər tez göründüyü</td><td>≤ 2.5 san</td><td>&gt; 4 san</td></tr>
    <tr><td>INP (Interaction to Next Paint)</td><td>Klik və toxunuşa saytın nə qədər tez cavab verdiyi</td><td>≤ 200 ms</td><td>&gt; 500 ms</td></tr>
    <tr><td>CLS (Cumulative Layout Shift)</td><td>Yüklənmə zamanı elementlərin "sürüşməsi"</td><td>≤ 0.1</td><td>&gt; 0.25</td></tr>
  </tbody>
</table>
<p>Qeyd: INP 2024-cü ildə əvvəlki FID göstəricisini əvəz edib. Google bu göstəriciləri real istifadəçilərin məlumatları əsasında qiymətləndirir.</p>

<h2>Sürət Niyə Vacibdir?</h2>
<ul>
  <li><strong>Ziyarətçi gözləmir:</strong> Yavaş açılan səhifədən insanlar daha çox geri qayıdır.</li>
  <li><strong>Reklam büdcəsi:</strong> Reklama kliklənib, amma səhifə açılmayıbsa, ödəniş boşa gedib.</li>
  <li><strong>SEO:</strong> Səhifə təcrübəsi Google-un nəzərə aldığı siqnallardandır; eyni keyfiyyətli məzmunda sürətli sayt üstünlük qazanır.</li>
  <li><strong>Mobil reallıq:</strong> Ziyarətçilərin çoxu telefondan və mobil internetlə gəlir — orada yavaşlıq daha çox hiss olunur. Ətraflı: <a href="/blog-details/mobil-uygun-sayt-niye-vacibdir-2026">Mobil Uyğun Sayt Niyə Vacibdir</a>.</li>
</ul>

<h2>Saytın Sürətini Necə Yoxlamalı?</h2>
<ol>
  <li><strong>PageSpeed Insights:</strong> Google-un pulsuz aləti — səhifənin ünvanını yazın, mobil və desktop nəticələrini, LCP/INP/CLS-i və tövsiyələri görün.</li>
  <li><strong>Search Console → Core Web Vitals:</strong> Saytın bütün səhifələri üzrə real istifadəçi məlumatları — hansı səhifələrin "zəif" olduğunu göstərir.</li>
  <li><strong>Telefonda real test:</strong> Mobil internetdə saytı özünüz açın — rəqəmlər qədər öz təcrübəniz də vacibdir.</li>
</ol>

<h2>Ən Təsirli 10 Düzəliş</h2>
<ol>
  <li><strong>Şəkilləri sıxın və müasir formatlara keçin:</strong> WebP və ya AVIF; ölçünü ekrana uyğun verin. Çox vaxt ən böyük qazanc buradadır.</li>
  <li><strong>Lazy loading:</strong> Ekranın aşağısındakı şəkillər yalnız ziyarətçi ora çatanda yüklənsin.</li>
  <li><strong>Şəkillərə ölçü (width/height) verin:</strong> Bu, CLS-in — elementlərin sürüşməsinin — qarşısını alır.</li>
  <li><strong>Əsas şəkli öncədən yükləyin:</strong> Hero şəkli "preload" ilə LCP-ni yaxşılaşdırır.</li>
  <li><strong>JavaScript-i azaldın:</strong> Lazımsız skriptlər, ağır slayderlər və köhnə kitabxanalar INP-ni pisləşdirir.</li>
  <li><strong>Şriftlər:</strong> Az sayda şrift çəkisi, <em>font-display: swap</em> — mətn şrift yüklənənə qədər gizlənməsin.</li>
  <li><strong>Keşləmə:</strong> Brauzer və server keşi təkrar ziyarətləri sürətləndirir.</li>
  <li><strong>CDN:</strong> Statik faylların ziyarətçiyə yaxın serverdən verilməsi.</li>
  <li><strong>Keyfiyyətli hostinq və müasir PHP:</strong> Serverin ilk cavab müddəti (TTFB) bütün göstəricilərə təsir edir.</li>
  <li><strong>Plaginləri və üçüncü tərəf kodları azaldın:</strong> Hər çat vidceti, piksel və widget əlavə yükdür — lazım olanları saxlayın.</li>
</ol>

<h2>Tez-tez Rast Gəlinən Problemlər</h2>
<table>
  <thead>
    <tr><th>Problem</th><th>Təsir etdiyi göstərici</th><th>Həll</th></tr>
  </thead>
  <tbody>
    <tr><td>5 MB-lıq banner şəkli</td><td>LCP</td><td>Sıxmaq, WebP, düzgün ölçü</td></tr>
    <tr><td>Gec yüklənən reklam/banner yuxarıdan itələyir</td><td>CLS</td><td>Yer ayırmaq (sabit ölçü)</td></tr>
    <tr><td>Ağır slayder və animasiya kitabxanaları</td><td>INP, LCP</td><td>Yüngül alternativ və ya CSS</td></tr>
    <tr><td>Çoxlu plagin (WordPress)</td><td>Hamısı</td><td>Lazımsızları silmək, keşləmə</td></tr>
    <tr><td>Zəif paylaşılan hostinq</td><td>LCP (TTFB)</td><td>Hostinqi yeniləmək, server keşi</td></tr>
  </tbody>
</table>

<h2>Nə Vaxt Optimallaşdırma Kifayət Etmir?</h2>
<p>Bəzən problem tək-tək düzəlişlərlə deyil, saytın əsasında olur: köhnə şablon, onlarla plagin, mobil uyğun olmayan struktur. Belə halda yenidən qurmaq optimallaşdırmadan daha sərfəli ola bilər. Əlamətləri burada izah etmişik: <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">Saytınızı Yeniləmə Vaxtıdır: 7 Əlamət</a>. Reklam üçün səhifələrdə sürət xüsusilə vacibdir: <a href="/blog-details/landing-page-nedir-2026">Landing Page Nədir</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Core Web Vitals nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google-un səhifə təcrübəsini ölçən 3 göstəricisidir: LCP (əsas məzmunun yüklənmə sürəti), INP (klikə cavab sürəti) və CLS (yüklənmə zamanı elementlərin sürüşməsi).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytın sürəti Google sıralamasına təsir edirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli, səhifə təcrübəsi Google-un nəzərə aldığı siqnallardandır. Amma məzmunun uyğunluğu və keyfiyyəti daha vacibdir; sürət əsasən oxşar səviyyəli səhifələr arasında fərq yaradır və istifadəçini saxlamağa kömək edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">PageSpeed-də 100 bal almaq lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Əsas məqsəd Core Web Vitals göstəricilərinin "yaxşı" zonada olmasıdır. Laboratoriya balı faydalı istiqamətdir, amma real istifadəçi məlumatları daha önəmlidir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ən tez nəticə verən düzəliş hansıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Əksər saytlarda şəkillərin sıxılması və müasir formata keçirilməsi, lazy loading və şəkillərə ölçü verilməsi ən sürətli və hiss olunan nəticəni verir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytımın sürətini optimallaşdıra bilərsinizmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. RS Code texniki dəstək və SEO xidməti çərçivəsində sürət auditi aparır, şəkil, kod, keşləmə və server tərəfində optimallaşdırma edir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Sürətli sayt daha çox ziyarətçini saxlayır, reklam büdcəsini qoruyur və Google-da üstünlük verir. Core Web Vitals-ı PageSpeed Insights və Search Console ilə yoxlayın, şəkillərdən başlayın, lazımsız kodu təmizləyin və keyfiyyətli hostinq seçin.</p>
<p><strong>Pulsuz sürət auditi üçün <a href="/elaqe">bizə yazın</a></strong>. Ətraflı: <a href="/texniki-destek">texniki dəstək</a>, <a href="/blog-details/seo-xidmeti-azerbaycan-2026">SEO Xidməti 2026</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>A visitor lands on your site, the screen stays blank, images load slowly, a button does nothing when tapped — and they go back and open a competitor. Speed isn't just about comfort: Google measures page experience, and those measurements are called <strong>Core Web Vitals</strong>. A slow site loses both customers and ad spend.</p>
<p>This article explains the 3 Core Web Vitals metrics in plain language and shows how to check your site's speed and which fixes have the most impact.</p>

<h2>Core Web Vitals: The 3 Key Metrics</h2>
<table>
  <thead>
    <tr><th>Metric</th><th>What it measures</th><th>Good</th><th>Poor</th></tr>
  </thead>
  <tbody>
    <tr><td>LCP (Largest Contentful Paint)</td><td>How quickly the main content (large image, headline) appears</td><td>≤ 2.5 s</td><td>&gt; 4 s</td></tr>
    <tr><td>INP (Interaction to Next Paint)</td><td>How quickly the site responds to clicks and taps</td><td>≤ 200 ms</td><td>&gt; 500 ms</td></tr>
    <tr><td>CLS (Cumulative Layout Shift)</td><td>How much elements "jump" while loading</td><td>≤ 0.1</td><td>&gt; 0.25</td></tr>
  </tbody>
</table>
<p>Note: INP replaced the earlier FID metric in 2024. Google assesses these metrics using data from real users.</p>

<h2>Why Does Speed Matter?</h2>
<ul>
  <li><strong>Visitors don't wait:</strong> People bounce more from slow pages.</li>
  <li><strong>Ad budget:</strong> If an ad was clicked but the page didn't load, the money is wasted.</li>
  <li><strong>SEO:</strong> Page experience is one of the signals Google considers; with content of similar quality, the faster site has an edge.</li>
  <li><strong>Mobile reality:</strong> Most visitors arrive on phones and mobile data, where slowness is felt more. More: <a href="/blog-details/mobile-friendly-website-2026">Why a Mobile-Friendly Website Matters</a>.</li>
</ul>

<h2>How to Check Your Site's Speed</h2>
<ol>
  <li><strong>PageSpeed Insights:</strong> Google's free tool — enter a page URL to see mobile and desktop results, LCP/INP/CLS and recommendations.</li>
  <li><strong>Search Console → Core Web Vitals:</strong> Real-user data across all your pages — shows which pages are "poor".</li>
  <li><strong>A real phone test:</strong> Open your site on mobile data yourself — your own experience matters as much as the numbers.</li>
</ol>

<h2>The 10 Most Effective Fixes</h2>
<ol>
  <li><strong>Compress images and use modern formats:</strong> WebP or AVIF, sized for the screen. This is often the biggest win.</li>
  <li><strong>Lazy loading:</strong> Load below-the-fold images only when the visitor scrolls to them.</li>
  <li><strong>Give images dimensions (width/height):</strong> This prevents CLS — elements jumping around.</li>
  <li><strong>Preload the main image:</strong> Preloading the hero image improves LCP.</li>
  <li><strong>Reduce JavaScript:</strong> Unneeded scripts, heavy sliders and old libraries worsen INP.</li>
  <li><strong>Fonts:</strong> Fewer font weights and <em>font-display: swap</em> — so text isn't hidden while fonts load.</li>
  <li><strong>Caching:</strong> Browser and server caching speed up repeat visits.</li>
  <li><strong>CDN:</strong> Serve static files from a server close to the visitor.</li>
  <li><strong>Quality hosting and modern PHP:</strong> The server's first response time (TTFB) affects every metric.</li>
  <li><strong>Cut plugins and third-party code:</strong> Every chat widget, pixel and embed adds weight — keep only what you need.</li>
</ol>

<h2>Common Problems</h2>
<table>
  <thead>
    <tr><th>Problem</th><th>Affected metric</th><th>Fix</th></tr>
  </thead>
  <tbody>
    <tr><td>A 5 MB banner image</td><td>LCP</td><td>Compress, WebP, correct size</td></tr>
    <tr><td>Late-loading ad/banner pushes content down</td><td>CLS</td><td>Reserve space (fixed size)</td></tr>
    <tr><td>Heavy slider and animation libraries</td><td>INP, LCP</td><td>Lighter alternative or CSS</td></tr>
    <tr><td>Many plugins (WordPress)</td><td>All</td><td>Remove unneeded ones, caching</td></tr>
    <tr><td>Weak shared hosting</td><td>LCP (TTFB)</td><td>Upgrade hosting, server cache</td></tr>
  </tbody>
</table>

<h2>When Optimization Isn't Enough</h2>
<p>Sometimes the problem isn't solved by individual fixes because it's in the site's foundation: an old template, dozens of plugins, a structure that isn't mobile-friendly. In that case rebuilding can be more cost-effective than optimizing. The signs are explained here: <a href="/blog-details/signs-you-need-website-redesign-2026">7 Signs You Need a Website Redesign</a>. Speed is especially important on ad pages: <a href="/blog-details/what-is-a-landing-page-2026">What Is a Landing Page</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What are Core Web Vitals?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">They are Google's 3 page-experience metrics: LCP (how fast the main content loads), INP (how fast the page responds to clicks) and CLS (how much elements shift while loading).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does site speed affect Google rankings?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes, page experience is one of the signals Google considers. But relevance and content quality matter more; speed mainly makes the difference between similar pages and helps keep users.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do I need a score of 100 in PageSpeed?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. The main goal is to have Core Web Vitals in the "good" range. The lab score is a useful guide, but real-user data matters more.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Which fix gives the fastest results?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">On most sites, compressing images and converting them to modern formats, lazy loading and setting image dimensions give the quickest, most noticeable results.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can you optimize my site's speed?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. As part of technical support and SEO services, RS Code runs speed audits and optimizes images, code, caching and the server side.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>A fast site keeps more visitors, protects your ad budget and gains an edge on Google. Check Core Web Vitals with PageSpeed Insights and Search Console, start with images, clean up unneeded code and choose quality hosting.</p>
<p><strong><a href="/contact">Contact us</a> for a free speed audit</strong>. More: <a href="/technical-support">technical support</a>, <a href="/blog-details/why-you-need-seo-services-2026">SEO Services 2026</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Посетитель заходит на сайт, экран остаётся белым, картинки грузятся медленно, кнопка не реагирует на нажатие — и он уходит к конкуренту. Скорость — это не только удобство: Google измеряет пользовательский опыт, и эти измерения называются <strong>Core Web Vitals</strong>. Медленный сайт теряет и клиентов, и рекламный бюджет.</p>
<p>В статье простыми словами объясняем 3 показателя Core Web Vitals, как проверить скорость сайта и какие исправления дают наибольший эффект.</p>

<h2>Core Web Vitals: 3 главных показателя</h2>
<table>
  <thead>
    <tr><th>Показатель</th><th>Что измеряет</th><th>Хорошо</th><th>Плохо</th></tr>
  </thead>
  <tbody>
    <tr><td>LCP (Largest Contentful Paint)</td><td>Как быстро появляется основной контент (большое изображение, заголовок)</td><td>≤ 2,5 с</td><td>&gt; 4 с</td></tr>
    <tr><td>INP (Interaction to Next Paint)</td><td>Как быстро сайт реагирует на клики и касания</td><td>≤ 200 мс</td><td>&gt; 500 мс</td></tr>
    <tr><td>CLS (Cumulative Layout Shift)</td><td>Насколько элементы «прыгают» при загрузке</td><td>≤ 0,1</td><td>&gt; 0,25</td></tr>
  </tbody>
</table>
<p>Примечание: INP в 2024 году заменил прежний показатель FID. Google оценивает эти показатели по данным реальных пользователей.</p>

<h2>Почему скорость важна?</h2>
<ul>
  <li><strong>Посетитель не ждёт:</strong> с медленных страниц уходят чаще.</li>
  <li><strong>Рекламный бюджет:</strong> по рекламе кликнули, а страница не открылась — деньги потрачены зря.</li>
  <li><strong>SEO:</strong> пользовательский опыт — один из сигналов Google; при контенте сопоставимого качества преимущество у более быстрого сайта.</li>
  <li><strong>Мобильная реальность:</strong> большинство заходит с телефона и мобильного интернета, где медлительность ощущается сильнее. Подробнее: <a href="/blog-details/mobilnaya-versiya-sayta-2026">Почему важна мобильная версия сайта</a>.</li>
</ul>

<h2>Как проверить скорость сайта</h2>
<ol>
  <li><strong>PageSpeed Insights:</strong> бесплатный инструмент Google — введите адрес страницы и посмотрите мобильные и десктопные результаты, LCP/INP/CLS и рекомендации.</li>
  <li><strong>Search Console → Core Web Vitals:</strong> данные реальных пользователей по всем страницам — показывает, какие страницы «плохие».</li>
  <li><strong>Реальный тест на телефоне:</strong> откройте сайт сами через мобильный интернет — собственный опыт важен не меньше цифр.</li>
</ol>

<h2>10 самых эффективных исправлений</h2>
<ol>
  <li><strong>Сожмите изображения и используйте современные форматы:</strong> WebP или AVIF, размер под экран. Часто это самый большой выигрыш.</li>
  <li><strong>Lazy loading:</strong> изображения ниже первого экрана грузятся, только когда посетитель до них доходит.</li>
  <li><strong>Указывайте размеры изображений (width/height):</strong> это предотвращает CLS — «прыжки» элементов.</li>
  <li><strong>Предзагрузка главного изображения:</strong> preload hero-картинки улучшает LCP.</li>
  <li><strong>Уменьшите JavaScript:</strong> лишние скрипты, тяжёлые слайдеры и старые библиотеки ухудшают INP.</li>
  <li><strong>Шрифты:</strong> меньше начертаний и <em>font-display: swap</em> — чтобы текст не прятался, пока грузится шрифт.</li>
  <li><strong>Кеширование:</strong> браузерный и серверный кеш ускоряют повторные визиты.</li>
  <li><strong>CDN:</strong> статические файлы отдаются с сервера, близкого к посетителю.</li>
  <li><strong>Качественный хостинг и современный PHP:</strong> время первого ответа сервера (TTFB) влияет на все показатели.</li>
  <li><strong>Меньше плагинов и стороннего кода:</strong> каждый чат-виджет, пиксель и встраиваемый блок добавляют вес — оставьте только нужное.</li>
</ol>

<h2>Частые проблемы</h2>
<table>
  <thead>
    <tr><th>Проблема</th><th>Показатель</th><th>Решение</th></tr>
  </thead>
  <tbody>
    <tr><td>Баннер весом 5 МБ</td><td>LCP</td><td>Сжатие, WebP, правильный размер</td></tr>
    <tr><td>Поздно загружаемый баннер сдвигает контент</td><td>CLS</td><td>Зарезервировать место (фиксированный размер)</td></tr>
    <tr><td>Тяжёлые слайдеры и библиотеки анимаций</td><td>INP, LCP</td><td>Лёгкая альтернатива или CSS</td></tr>
    <tr><td>Много плагинов (WordPress)</td><td>Все</td><td>Удалить лишние, кеширование</td></tr>
    <tr><td>Слабый виртуальный хостинг</td><td>LCP (TTFB)</td><td>Сменить хостинг, серверный кеш</td></tr>
  </tbody>
</table>

<h2>Когда оптимизации недостаточно</h2>
<p>Иногда проблема не решается точечными правками, потому что она в основе сайта: старый шаблон, десятки плагинов, неадаптивная структура. Тогда сделать сайт заново может быть выгоднее, чем оптимизировать. Признаки описаны здесь: <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">7 признаков, что сайту нужен редизайн</a>. Скорость особенно важна на рекламных страницах: <a href="/blog-details/chto-takoe-lending-2026">Что такое лендинг</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое Core Web Vitals?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Это 3 показателя пользовательского опыта Google: LCP (скорость загрузки основного контента), INP (скорость реакции на клик) и CLS (сдвиг элементов при загрузке).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Влияет ли скорость сайта на позиции в Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да, пользовательский опыт — один из сигналов Google. Но релевантность и качество контента важнее; скорость в основном решает между похожими страницами и помогает удержать пользователя.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли получить 100 баллов в PageSpeed?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Главное — чтобы показатели Core Web Vitals были в «хорошей» зоне. Лабораторный балл — полезный ориентир, но данные реальных пользователей важнее.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какое исправление даёт самый быстрый результат?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">На большинстве сайтов быстрее всего заметный эффект дают сжатие изображений и перевод в современные форматы, lazy loading и указание размеров изображений.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можете ли вы ускорить мой сайт?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. В рамках техподдержки и SEO-услуг RS Code проводит аудит скорости и оптимизирует изображения, код, кеширование и серверную часть.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Быстрый сайт удерживает больше посетителей, бережёт рекламный бюджет и получает преимущество в Google. Проверьте Core Web Vitals в PageSpeed Insights и Search Console, начните с изображений, уберите лишний код и выберите качественный хостинг.</p>
<p><strong><a href="/kontakty">Напишите нам</a> для бесплатного аудита скорости</strong>. Подробнее: <a href="/tekhnicheskaya-podderzhka">техподдержка</a>, <a href="/blog-details/zachem-nuzhny-seo-uslugi-2026">SEO-услуги 2026</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'sayt-sureti-core-web-vitals-2026'],
            [
                'slug_en' => 'website-speed-core-web-vitals-2026',
                'slug_ru' => 'skorost-sajta-core-web-vitals-2026',

                'title_az' => 'Saytın Sürəti və Core Web Vitals: Google-un 3 Göstəricisi və Necə Yaxşılaşdırmalı 2026',
                'title_en' => 'Website Speed and Core Web Vitals: Google\'s 3 Metrics and How to Improve Them 2026',
                'title_ru' => 'Скорость сайта и Core Web Vitals: 3 показателя Google и как их улучшить 2026',

                'review_az' => 'LCP, INP və CLS sadə dillə: nəyi ölçür, yaxşı həddlər, sürəti PageSpeed Insights və Search Console ilə yoxlamaq, ən təsirli 10 düzəliş və tez-tez rast gəlinən problemlər.',
                'review_en' => 'LCP, INP and CLS in plain language: what they measure, the "good" thresholds, checking speed with PageSpeed Insights and Search Console, the 10 most effective fixes and common problems.',
                'review_ru' => 'LCP, INP и CLS простыми словами: что измеряют, «хорошие» пороги, проверка скорости в PageSpeed Insights и Search Console, 10 самых эффективных исправлений и частые проблемы.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '7 Oktyabr 2026',
                'date_en' => 'October 7, 2026',
                'date_ru' => '7 Октября 2026',

                'photo'    => 'cover-core-web-vitals-az.png',
                'photo_en' => 'cover-core-web-vitals-en.png',
                'photo_ru' => 'cover-core-web-vitals-ru.png',

                'meta_title_az' => 'Saytın Sürəti və Core Web Vitals 2026 | RS Code',
                'meta_title_en' => 'Website Speed & Core Web Vitals 2026 | RS Code',
                'meta_title_ru' => 'Скорость сайта и Core Web Vitals 2026 | RS Code',

                'meta_description_az' => 'Core Web Vitals nədir? LCP, INP, CLS göstəriciləri, yaxşı həddlər, saytın sürətini yoxlamaq və artırmaq üçün 10 praktik düzəliş. SEO və reklam üçün sürət bələdçisi.',
                'meta_description_en' => 'What are Core Web Vitals? LCP, INP and CLS, good thresholds, and 10 practical fixes to check and improve website speed. A speed guide for SEO and ads.',
                'meta_description_ru' => 'Что такое Core Web Vitals? LCP, INP, CLS, хорошие пороги и 10 практических способов проверить и ускорить сайт. Гид по скорости для SEO и рекламы.',

                'meta_keywords_az' => 'saytın sürəti, Core Web Vitals, LCP, INP, CLS, PageSpeed Insights, saytı sürətləndirmək, SEO 2026',
                'meta_keywords_en' => 'website speed, Core Web Vitals, LCP, INP, CLS, PageSpeed Insights, speed up website, SEO 2026',
                'meta_keywords_ru' => 'скорость сайта, Core Web Vitals, LCP, INP, CLS, PageSpeed Insights, ускорить сайт, SEO 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
