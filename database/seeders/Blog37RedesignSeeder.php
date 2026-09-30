<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog37RedesignSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Saytınız bir neçə il əvvəl hazırlanıb, işləyir, amma müştəri gətirmir? Bu, çox yayılmış vəziyyətdir. Veb texnologiyalar, Google-un tələbləri və istifadəçi vərdişləri sürətlə dəyişir; 3–5 il əvvəl müasir görünən sayt bu gün biznesinizə kömək etmək əvəzinə müştərini itirə bilər. Aşağıdakı 7 əlamətdən bir neçəsi sizdə varsa, saytı yeniləmək vaxtıdır.</p>

<h2>1. Sayt Telefonda Düzgün Görünmür</h2>
<p>Mətn kiçikdir, düymələrə basmaq çətindir, səhifəni yana sürüşdürmək lazım gəlir? Ziyarətçilərin böyük hissəsi saytınıza telefondan gəlir və Google da sıralamada əsasən mobil versiyanı nəzərə alır. Ətraflı: <a href="/blog-details/mobil-uygun-sayt-niye-vacibdir-2026">Mobil Uyğun Sayt Niyə Vacibdir</a>.</p>

<h2>2. Səhifələr Yavaş Açılır</h2>
<p>Ağır şəkillər, köhnə plaginlər, keşləmənin olmaması — ziyarətçi gözləmir, geri qayıdıb rəqibin saytına keçir. Sürəti Google PageSpeed Insights ilə pulsuz yoxlaya bilərsiniz; mobil nəticə qırmızıdırsa, bu ciddi siqnaldır.</p>

<h2>3. Dizayn Köhnəlib</h2>
<p>Köhnə şriftlər, sıx mətn blokları, keyfiyyətsiz şəkillər və qarışıq menyu müştəridə "bu şirkət aktivdirmi?" sualı yaradır. Sayt çox vaxt biznesinizlə ilk təmasdır və ilk təəssürat etibara birbaşa təsir edir.</p>

<h2>4. Google-dan Trafik Gəlmir</h2>
<p>Search Console-da göstərmə və klik azdırsa, səbəb çox vaxt texniki SEO-dur: səhv başlıqlar, meta təsvirlərin olmaması, dublikat səhifələr, sitemap-in olmaması, yavaş sürət. Köhnə platformalarda bunları düzəltmək bəzən saytı yenidən qurmaqdan baha başa gəlir. Ətraflı: <a href="/blog-details/seo-xidmeti-azerbaycan-2026">SEO Xidməti 2026</a>.</p>

<h2>5. Sayt Müraciət Gətirmir</h2>
<p>Ziyarətçi var, amma zəng, sifariş və forma müraciəti yoxdur? Aydın CTA düymələrinin, WhatsApp/zəng düyməsinin, qiymət və ya xidmət təsvirinin olmaması saytı "vizit kart"a çevirir. Müasir sayt ziyarətçini addım-addım müraciətə aparmalıdır.</p>

<h2>6. Saytı Özünüz Yeniləyə Bilmirsiniz</h2>
<p>Hər qiymət, şəkil və ya xəbər dəyişikliyi üçün proqramçıya müraciət etmək lazım gəlirsə, sayt köhnəlməyə məhkumdur. Rahat idarə paneli olmadan məzmun yenilənmir, yenilənməyən sayt isə Google-da geri düşür.</p>

<h2>7. Təhlükəsizlik və Texniki Köhnəlmə</h2>
<p>SSL sertifikatı yoxdursa (brauzer "təhlükəsiz deyil" yazır), CMS və plaginlər illərlə yenilənməyibsə, hostinq köhnə PHP versiyasındadırsa — sayt həm sındırılma riski altındadır, həm də müştəri etibarını itirir.</p>

<h2>Yeniləmə, yoxsa Yenidən Qurma?</h2>
<table>
  <thead>
    <tr><th>Vəziyyət</th><th>Tövsiyə</th></tr>
  </thead>
  <tbody>
    <tr><td>Struktur yaxşıdır, yalnız dizayn köhnəlib</td><td>Redizayn (vizual yeniləmə)</td></tr>
    <tr><td>Sayt yavaşdır, mobil uyğun deyil, idarə paneli yoxdur</td><td>Yenidən qurma</td></tr>
    <tr><td>Konstruktorda qurulub, böyümək lazımdır</td><td>Yeni platformaya keçid</td></tr>
    <tr><td>Yalnız SEO və sürət problemləri</td><td>Texniki optimallaşdırma</td></tr>
  </tbody>
</table>
<p>Platforma seçimi üçün: <a href="/blog-details/wix-tilda-wordpress-vs-sifarisle-sayt-2026">Wix, Tilda, WordPress, yoxsa Sifarişlə Sayt?</a></p>

<h2>Yeniləmədə Google Mövqelərini Necə Qorumalı?</h2>
<p>Saytı yeniləyərkən ən böyük risk mövcud Google trafikini itirməkdir. Bunun qarşısını almaq üçün:</p>
<ol>
  <li><strong>Köhnə URL-lərin siyahısını çıxarın</strong> — xüsusən trafik gətirən səhifələrin.</li>
  <li><strong>301 yönləndirmələr qurun</strong> — hər köhnə URL-i uyğun yeni səhifəyə yönləndirin.</li>
  <li><strong>Başlıq və məzmunu qoruyun</strong> — yaxşı sıralanan səhifələrin açar sözlərini saxlayın.</li>
  <li><strong>Yeni sitemap-i Search Console-a göndərin</strong> və ilk həftələrdə xətaları izləyin.</li>
  <li><strong>Test mühitində yoxlayın</strong> — sayt canlıya çıxmazdan əvvəl bütün linkləri və formaları sınayın.</li>
</ol>

<h2>Saytın Yenilənməsi Neçəyə Başa Gəlir?</h2>
<p>Qiymət saytın həcmindən və nəyin dəyişdiyindən asılıdır: vizit saytın yenilənməsi korporativ sayt və ya onlayn mağazadan xeyli ucuzdur. Paketlər və qiymət aralıqları: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb Sayt Qiyməti Azərbaycanda 2026</a>. Podratçı seçməzdən əvvəl <a href="/blog-details/veb-sayt-hazirlatmazdan-evvel-12-sual">bu 12 sualı</a> verməyi unutmayın.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytı nə qədər tez-tez yeniləmək lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Məzmun daim yenilənməlidir. Dizayn və texniki baza adətən 3–5 ildən bir ciddi yenilənmə tələb edir; mobil uyğunluq, sürət və təhlükəsizlik problemləri varsa, daha tez.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt yenilənəndə Google mövqeləri itirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Düzgün edilməsə, itə bilər. Köhnə URL-lər üçün 301 yönləndirmə, başlıq və məzmunun qorunması və yeni sitemap-in Search Console-a göndərilməsi mövqeləri qoruyur, çox vaxt isə yaxşılaşdırır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Köhnə saytın məzmununu yeni sayta köçürmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Mətnlər, şəkillər, məhsullar və bloq yazıları yeni sayta köçürülür; lazım olduqda mətnlər SEO üçün yenidən işlənir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytın yenilənməsi neçə müddətə başa çatır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Vizit sayt üçün adətən 1–2 həftə, korporativ sayt üçün 2–4 həftə, onlayn mağaza üçün 3–6 həftə. Müddət məzmunun həcmindən və yeni funksiyalardan asılıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytımın yenilənməyə ehtiyacı olub-olmadığını necə bilim?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yuxarıdakı 7 əlaməti yoxlayın, PageSpeed Insights və Search Console məlumatlarına baxın. RS Code pulsuz ilkin audit edib nəyin yenilənməli olduğunu göstərə bilər.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Köhnəlmiş sayt səssizcə müştəri itirir: telefonda pis görünür, yavaş açılır, Google-da görünmür və müraciət gətirmir. Düzgün planlaşdırılmış yeniləmə — 301 yönləndirmələr və SEO qorunması ilə — həm dizaynı, həm də nəticələri yaxşılaşdırır.</p>
<p><strong><a href="/elaqe">Saytınızın pulsuz ilkin auditi üçün bizə yazın</a></strong>. Ətraflı: <a href="/veb-saytlarin-hazirlanmasi">veb sayt hazırlanması</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>Was your website built a few years ago — it works, but doesn't bring customers? That's very common. Web technology, Google's requirements and user habits change fast; a site that looked modern 3–5 years ago may now lose customers instead of helping your business. If you recognise several of the 7 signs below, it's time to update your site.</p>

<h2>1. The Site Doesn't Display Properly on Phones</h2>
<p>Tiny text, hard-to-tap buttons, sideways scrolling? Most visitors come from phones, and Google mainly uses the mobile version for rankings. More: <a href="/blog-details/mobile-friendly-website-2026">Why a Mobile-Friendly Website Matters</a>.</p>

<h2>2. Pages Load Slowly</h2>
<p>Heavy images, outdated plugins, no caching — visitors don't wait; they go back and open a competitor's site. You can check speed for free with Google PageSpeed Insights; a red mobile score is a serious signal.</p>

<h2>3. The Design Looks Outdated</h2>
<p>Old fonts, dense text blocks, low-quality images and a confusing menu make customers wonder "is this company still active?" Your site is often the first contact with your business, and first impressions directly affect trust.</p>

<h2>4. No Traffic from Google</h2>
<p>Low impressions and clicks in Search Console usually point to technical SEO: wrong titles, missing meta descriptions, duplicate pages, no sitemap, slow speed. On old platforms, fixing these sometimes costs more than rebuilding. More: <a href="/blog-details/why-you-need-seo-services-2026">Why You Need SEO Services in 2026</a>.</p>

<h2>5. The Site Doesn't Generate Leads</h2>
<p>Visitors but no calls, orders or form submissions? Without clear CTA buttons, a WhatsApp/call button and service or price details, a site becomes just a business card. A modern site should guide visitors step by step towards contacting you.</p>

<h2>6. You Can't Update the Site Yourself</h2>
<p>If every price, image or news change needs a developer, the site is bound to go stale. Without a convenient admin panel, content isn't updated — and a stale site slips in Google.</p>

<h2>7. Security and Technical Ageing</h2>
<p>No SSL certificate (the browser says "not secure"), a CMS and plugins not updated for years, hosting on an old PHP version — the site is at risk of being hacked and loses customer trust.</p>

<h2>Redesign or Rebuild?</h2>
<table>
  <thead>
    <tr><th>Situation</th><th>Recommendation</th></tr>
  </thead>
  <tbody>
    <tr><td>Good structure, only the design is dated</td><td>Redesign (visual refresh)</td></tr>
    <tr><td>Slow, not mobile-friendly, no admin panel</td><td>Rebuild</td></tr>
    <tr><td>Built on a website builder, needs to grow</td><td>Move to a new platform</td></tr>
    <tr><td>Only SEO and speed issues</td><td>Technical optimization</td></tr>
  </tbody>
</table>
<p>On choosing a platform: <a href="/blog-details/wix-vs-tilda-vs-wordpress-vs-custom-website-2026">Wix, Tilda, WordPress or a Custom Website?</a></p>

<h2>How to Keep Your Google Rankings During a Redesign</h2>
<ol>
  <li><strong>List your old URLs</strong> — especially the pages that bring traffic.</li>
  <li><strong>Set up 301 redirects</strong> — send each old URL to the matching new page.</li>
  <li><strong>Keep titles and content</strong> — preserve the keywords of well-ranking pages.</li>
  <li><strong>Submit the new sitemap to Search Console</strong> and watch for errors in the first weeks.</li>
  <li><strong>Test on staging</strong> — check every link and form before going live.</li>
</ol>

<h2>How Much Does a Website Update Cost?</h2>
<p>It depends on the size of the site and what changes: updating a business card site costs much less than a corporate site or online store. Packages and price ranges: <a href="/blog-details/website-cost-azerbaijan-2026">Website Cost in Azerbaijan 2026</a>. Before choosing a developer, ask <a href="/blog-details/12-questions-before-building-website-2026">these 12 questions</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How often should a website be updated?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Content should be updated continuously. Design and the technical base usually need a major update every 3–5 years — sooner if there are mobile, speed or security problems.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Will I lose Google rankings when the site is updated?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">You can if it's done wrong. 301 redirects for old URLs, preserving titles and content, and submitting the new sitemap to Search Console protect — and often improve — rankings.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can content from the old site be moved to the new one?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Text, images, products and blog posts are migrated, and texts can be reworked for SEO where needed.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does a website update take?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Usually 1–2 weeks for a business card site, 2–4 weeks for a corporate site and 3–6 weeks for an online store, depending on content volume and new features.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do I know if my site needs an update?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Check the 7 signs above and look at PageSpeed Insights and Search Console data. RS Code can run a free initial audit and show what needs updating.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>An outdated website quietly loses customers: it looks bad on phones, loads slowly, doesn't appear on Google and brings no leads. A well-planned update — with 301 redirects and SEO preserved — improves both the design and the results.</p>
<p><strong><a href="/contact">Contact us for a free initial audit of your site</a></strong>. More: <a href="/website-development">website development</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Ваш сайт сделан несколько лет назад — работает, но клиентов не приводит? Это очень распространённая ситуация. Веб-технологии, требования Google и привычки пользователей быстро меняются; сайт, который 3–5 лет назад выглядел современно, сегодня может терять клиентов вместо того, чтобы помогать бизнесу. Если вы узнаёте несколько из 7 признаков ниже — пора обновлять сайт.</p>

<h2>1. Сайт плохо отображается на телефоне</h2>
<p>Мелкий текст, неудобные кнопки, приходится листать вбок? Большинство посетителей приходят с телефонов, и Google при ранжировании в основном учитывает мобильную версию. Подробнее: <a href="/blog-details/mobilnaya-versiya-sayta-2026">Почему важна мобильная версия сайта</a>.</p>

<h2>2. Страницы медленно открываются</h2>
<p>Тяжёлые изображения, устаревшие плагины, нет кеширования — посетитель не ждёт и уходит к конкуренту. Скорость можно бесплатно проверить в Google PageSpeed Insights; красный мобильный результат — серьёзный сигнал.</p>

<h2>3. Дизайн устарел</h2>
<p>Старые шрифты, плотные блоки текста, некачественные фото и запутанное меню вызывают вопрос «эта компания вообще работает?». Сайт часто — первый контакт с вашим бизнесом, и первое впечатление напрямую влияет на доверие.</p>

<h2>4. Нет трафика из Google</h2>
<p>Мало показов и кликов в Search Console обычно говорит о проблемах технического SEO: неправильные заголовки, нет мета-описаний, дубли страниц, нет sitemap, низкая скорость. На старых платформах исправить это иногда дороже, чем сделать сайт заново. Подробнее: <a href="/blog-details/zachem-nuzhny-seo-uslugi-2026">Зачем нужны SEO-услуги в 2026</a>.</p>

<h2>5. Сайт не приносит заявок</h2>
<p>Посетители есть, а звонков, заказов и заявок нет? Без понятных CTA-кнопок, кнопки WhatsApp/звонка и описания услуг или цен сайт превращается в визитку. Современный сайт должен шаг за шагом вести посетителя к обращению.</p>

<h2>6. Вы не можете обновлять сайт сами</h2>
<p>Если ради каждой смены цены, фото или новости нужен программист, сайт обречён устаревать. Без удобной админ-панели контент не обновляется, а необновляемый сайт теряет позиции в Google.</p>

<h2>7. Безопасность и техническое устаревание</h2>
<p>Нет SSL-сертификата (браузер пишет «не защищено»), CMS и плагины годами не обновлялись, хостинг на старой версии PHP — сайт под угрозой взлома и теряет доверие клиентов.</p>

<h2>Редизайн или новый сайт?</h2>
<table>
  <thead>
    <tr><th>Ситуация</th><th>Рекомендация</th></tr>
  </thead>
  <tbody>
    <tr><td>Структура хорошая, устарел только дизайн</td><td>Редизайн (визуальное обновление)</td></tr>
    <tr><td>Медленный, не адаптивный, нет админ-панели</td><td>Новый сайт</td></tr>
    <tr><td>Сделан на конструкторе, нужно расти</td><td>Переход на новую платформу</td></tr>
    <tr><td>Только проблемы SEO и скорости</td><td>Техническая оптимизация</td></tr>
  </tbody>
</table>
<p>О выборе платформы: <a href="/blog-details/wix-tilda-wordpress-ili-sajt-na-zakaz-2026">Wix, Tilda, WordPress или сайт на заказ?</a></p>

<h2>Как сохранить позиции в Google при обновлении</h2>
<ol>
  <li><strong>Составьте список старых URL</strong> — особенно страниц, которые приносят трафик.</li>
  <li><strong>Настройте 301-редиректы</strong> — каждый старый URL на соответствующую новую страницу.</li>
  <li><strong>Сохраните заголовки и контент</strong> — ключевые слова страниц с хорошими позициями.</li>
  <li><strong>Отправьте новую sitemap в Search Console</strong> и следите за ошибками первые недели.</li>
  <li><strong>Проверьте на тестовой среде</strong> — все ссылки и формы до запуска.</li>
</ol>

<h2>Сколько стоит обновление сайта?</h2>
<p>Зависит от объёма сайта и того, что меняется: обновление сайта-визитки стоит намного дешевле, чем корпоративного сайта или интернет-магазина. Пакеты и цены: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта в Азербайджане 2026</a>. Перед выбором подрядчика задайте <a href="/blog-details/12-voprosov-pered-sozdaniem-sajta-2026">эти 12 вопросов</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как часто нужно обновлять сайт?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Контент — постоянно. Дизайн и техническая база обычно требуют серьёзного обновления раз в 3–5 лет, а при проблемах с мобильной версией, скоростью или безопасностью — раньше.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Потеряю ли я позиции в Google при обновлении?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Если сделать неправильно — можно. 301-редиректы со старых URL, сохранение заголовков и контента и отправка новой sitemap в Search Console защищают, а часто и улучшают позиции.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли перенести контент старого сайта на новый?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Тексты, изображения, товары и статьи блога переносятся, при необходимости тексты перерабатываются под SEO.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает обновление сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Обычно 1–2 недели для сайта-визитки, 2–4 недели для корпоративного сайта и 3–6 недель для интернет-магазина — в зависимости от объёма контента и новых функций.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как понять, нужно ли обновлять мой сайт?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Проверьте 7 признаков выше и посмотрите данные PageSpeed Insights и Search Console. RS Code может провести бесплатный первичный аудит и показать, что нужно обновить.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Устаревший сайт тихо теряет клиентов: плохо выглядит на телефоне, медленно открывается, не виден в Google и не приносит заявок. Грамотно спланированное обновление — с 301-редиректами и сохранением SEO — улучшает и дизайн, и результаты.</p>
<p><strong><a href="/kontakty">Напишите нам для бесплатного первичного аудита сайта</a></strong>. Подробнее: <a href="/razrabotka-sajtov">разработка сайтов</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'sayti-yenileme-vaxti-7-elamet-2026'],
            [
                'slug_en' => 'signs-you-need-website-redesign-2026',
                'slug_ru' => 'priznaki-chto-sajtu-nuzhen-redizajn-2026',

                'title_az' => 'Saytınızı Yeniləmə Vaxtıdır: 7 Əlamət və Google Mövqelərini Qorumaq 2026',
                'title_en' => 'Time to Update Your Website: 7 Signs and How to Keep Google Rankings 2026',
                'title_ru' => 'Пора обновить сайт: 7 признаков и как сохранить позиции в Google 2026',

                'review_az' => 'Telefonda pis görünür, yavaş açılır, Google-dan trafik və müraciət gəlmir? Saytın köhnəldiyini göstərən 7 əlamət, redizayn vs yenidən qurma və yeniləmədə SEO-nu qorumaq üçün 301 yönləndirmələr.',
                'review_en' => 'Looks bad on phones, loads slowly, no Google traffic or leads? 7 signs your site is outdated, redesign vs rebuild, and 301 redirects to protect SEO during an update.',
                'review_ru' => 'Плохо выглядит на телефоне, медленно грузится, нет трафика и заявок? 7 признаков устаревшего сайта, редизайн или новый сайт и 301-редиректы для сохранения SEO.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '30 Sentyabr 2026',
                'date_en' => 'September 30, 2026',
                'date_ru' => '30 Сентября 2026',

                'photo'    => 'cover-redesign-az.png',
                'photo_en' => 'cover-redesign-en.png',
                'photo_ru' => 'cover-redesign-ru.png',

                'meta_title_az' => 'Saytı Yeniləmə Vaxtıdır: 7 Əlamət 2026 | RS Code',
                'meta_title_en' => '7 Signs You Need a Website Redesign 2026 | RS Code',
                'meta_title_ru' => '7 признаков, что сайту нужен редизайн 2026 | RS Code',

                'meta_description_az' => 'Saytınız köhnəlib? Mobil uyğunluq, sürət, dizayn, SEO, müraciət, idarə paneli və təhlükəsizlik — 7 əlamət. Redizaynda Google mövqelərini 301 yönləndirmə ilə qoruyun.',
                'meta_description_en' => 'Is your website outdated? Mobile, speed, design, SEO, leads, admin panel and security — 7 signs. Keep Google rankings with 301 redirects during a redesign.',
                'meta_description_ru' => 'Сайт устарел? Мобильная версия, скорость, дизайн, SEO, заявки, админка и безопасность — 7 признаков. Сохраните позиции в Google с 301-редиректами.',

                'meta_keywords_az' => 'saytın yenilənməsi, sayt redizaynı, köhnə sayt, saytın modernləşdirilməsi, 301 yönləndirmə, sayt yeniləmə qiyməti 2026',
                'meta_keywords_en' => 'website redesign, update old website, website refresh, 301 redirects SEO, website redesign cost 2026',
                'meta_keywords_ru' => 'редизайн сайта, обновление сайта, старый сайт, модернизация сайта, 301 редирект, стоимость редизайна 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
