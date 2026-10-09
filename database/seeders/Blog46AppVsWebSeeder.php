<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog46AppVsWebSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>"Bizə mobil tətbiq lazımdır" — bu, sahibkarlardan ən çox eşitdiyimiz istəklərdən biridir. Bəzən həqiqətən tətbiq lazımdır, bəzən isə yaxşı mobil sayt eyni nəticəni bir neçə dəfə ucuz və tez verir. Səhv seçim ya yüklənməyən, unudulan tətbiqə, ya da imkanları çatmayan sayta pul xərcləmək deməkdir.</p>
<p>Bu yazıda mobil sayt, PWA və native tətbiqin fərqini, hansının nə vaxt lazım olduğunu və qərar vermək üçün praktik sualları izah edirik.</p>

<h2>3 Variant: Nədir və Necə İşləyir?</h2>
<ul>
  <li><strong>Mobil uyğun sayt:</strong> Brauzerdə açılan, telefon ekranına uyğunlaşan sayt. Yükləmə tələb etmir, Google-da görünür.</li>
  <li><strong>PWA (Progressive Web App):</strong> Brauzerdə işləyən, amma telefonun ana ekranına "tətbiq kimi" əlavə oluna bilən sayt. Bəzi funksiyalar oflayn işləyə, bildiriş göndərə bilər.</li>
  <li><strong>Native tətbiq:</strong> App Store və Google Play-dən yüklənən, telefonun bütün imkanlarından (kamera, GPS, Bluetooth, fon prosesləri) tam istifadə edən proqram.</li>
</ul>

<h2>Müqayisə Cədvəli</h2>
<table>
  <thead>
    <tr><th>Meyar</th><th>Mobil sayt</th><th>PWA</th><th>Native tətbiq</th></tr>
  </thead>
  <tbody>
    <tr><td>Hazırlanma xərci</td><td>Ən aşağı</td><td>Orta</td><td>Ən yüksək (iOS + Android)</td></tr>
    <tr><td>Müddət</td><td>Həftələr</td><td>Həftələr</td><td>Aylar</td></tr>
    <tr><td>Yükləmə</td><td>Lazım deyil</td><td>İstəyə görə ana ekrana</td><td>Mağazadan yükləmək lazımdır</td></tr>
    <tr><td>Google-da görünmə</td><td>Bəli</td><td>Bəli</td><td>Xeyr (yalnız mağaza səhifəsi)</td></tr>
    <tr><td>Telefon imkanları</td><td>Məhdud</td><td>Orta</td><td>Tam</td></tr>
    <tr><td>Bildirişlər</td><td>Yox</td><td>Var (məhdudiyyətlərlə)</td><td>Tam</td></tr>
    <tr><td>Yeniləmə</td><td>Dərhal</td><td>Dərhal</td><td>Mağaza yoxlamasından keçir</td></tr>
    <tr><td>Mağaza haqları</td><td>Yox</td><td>Yox</td><td>Apple illik, Google birdəfəlik developer haqqı</td></tr>
  </tbody>
</table>

<h2>Mobil Sayt Kifayətdir, Əgər…</h2>
<ul>
  <li>Məqsəd məlumat vermək, müraciət və sifariş toplamaqdır;</li>
  <li>Müştərilər sizi Google-da və reklamla tapır;</li>
  <li>İstifadəçi sizə ayda bir neçə dəfə müraciət edir (gündəlik deyil);</li>
  <li>Büdcə və müddət məhduddur.</li>
</ul>
<p>Əksər kiçik və orta bizneslər üçün sürətli, mobil uyğun sayt ən yaxşı başlanğıcdır. Ətraflı: <a href="/blog-details/mobil-uygun-sayt-niye-vacibdir-2026">Mobil Uyğun Sayt Niyə Vacibdir</a>.</p>

<h2>PWA Yaxşı Seçimdir, Əgər…</h2>
<ul>
  <li>İstifadəçilər tez-tez qayıdır (sifariş, rezervasiya, kabinet) və "ikon" rahatlıq yaradır;</li>
  <li>Zəif internetdə də əsas funksiyalar işləməlidir;</li>
  <li>Bildiriş göndərmək lazımdır, amma native tətbiq büdcəsi yoxdur;</li>
  <li>Tək kod bazası ilə həm telefon, həm kompüter istifadəçilərinə xidmət etmək istəyirsiniz.</li>
</ul>

<h2>Native Tətbiq Lazımdır, Əgər…</h2>
<ul>
  <li>Gündəlik istifadə olunan məhsuldur (bank, çatdırılma, sadiqlik proqramı, taksi);</li>
  <li>Kamera, GPS, Bluetooth və ya fon prosesləri dərindən lazımdır (kuryer, skaner, cihaz idarəsi);</li>
  <li>Mürəkkəb oflayn iş tələb olunur (sahədə işləyən əməkdaşlar);</li>
  <li>App Store və Google Play-də olmaq brend və etibar üçün vacibdir.</li>
</ul>

<h2>Ən Çox Edilən 4 Səhv</h2>
<ol>
  <li><strong>"Rəqibin tətbiqi var" deyə tətbiq sifariş etmək:</strong> İstifadəçi onu yükləmirsə, investisiya boşa gedir.</li>
  <li><strong>Saytı unutmaq:</strong> Tətbiq olsa belə, yeni müştəri çox vaxt Google-dan sayt vasitəsilə gəlir.</li>
  <li><strong>Saxlanma xərcini hesablamamaq:</strong> Tətbiq iOS və Android yeniləmələrinə görə mütəmadi dəstək tələb edir.</li>
  <li><strong>Tətbiqi saytın kopyası etmək:</strong> Tətbiq yalnız saytın edə bilmədiyini edəndə dəyər yaradır.</li>
</ol>

<h2>Mərhələli Yanaşma</h2>
<p>Ən sərfəli yol çox vaxt mərhələlidir: əvvəlcə sürətli mobil sayt, sonra tez-tez qayıdan istifadəçilər üçün PWA imkanları, yalnız real tələbat və istifadə məlumatı olanda native tətbiq. Sayt sürəti bu mərhələlərin hamısında vacibdir: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">Saytın Sürəti və Core Web Vitals</a>. Satış Instagram-dadırsa: <a href="/blog-details/instagram-magaza-ve-sayt-2026">Instagram Mağazası Varkən Sayt Lazımdırmı</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">PWA nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">PWA — telefonun ana ekranına tətbiq kimi əlavə oluna bilən, bəzi funksiyaları oflayn işləyən və bildiriş göndərə bilən veb saytdır. Mağazadan yükləmə tələb etmir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kiçik biznes üçün mobil tətbiq lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Çox vaxt yox. Müştəri gündəlik istifadə etmirsə, sürətli mobil sayt və ya PWA eyni nəticəni daha ucuz və tez verir. Tətbiq tez-tez qayıdan istifadəçilər və xüsusi telefon funksiyaları lazım olanda sərfəlidir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tətbiq hazırlamaq niyə saytdan bahadır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">İki platforma (iOS və Android), mağaza tələbləri, test və yeniləmələr əlavə iş tələb edir. Üstəlik developer hesabları üçün mağaza haqları və mütəmadi dəstək xərci var.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytı sonradan tətbiqə çevirmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Düzgün qurulmuş sayt əvvəlcə PWA-ya genişləndirilə bilər; native tətbiq isə eyni server tərəfini (API) istifadə edərək sonradan hazırlana bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Bizim üçün hansının uyğun olduğunu necə bilək?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">İstifadə tezliyi, lazımi telefon funksiyaları, büdcə və müddəti qiymətləndirin. RS Code pulsuz konsultasiyada biznesinizə uyğun variantı təklif edir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Mobil sayt, PWA və native tətbiq rəqib deyil, fərqli mərhələlərin alətləridir. Əksər bizneslər üçün düzgün başlanğıc sürətli mobil saytdır; tətbiq isə real tələbat və gündəlik istifadə olanda dəyər yaradır.</p>
<p><strong>Hansı variantın sizə uyğun olduğunu öyrənmək üçün <a href="/elaqe">bizə yazın</a></strong>. Ətraflı: <a href="/xidmetler">xidmətlərimiz</a>, <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb Sayt Qiyməti 2026</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>"We need a mobile app" is one of the most common requests we hear from business owners. Sometimes an app really is needed; sometimes a good mobile website delivers the same result several times cheaper and faster. The wrong choice means spending on an app nobody installs, or on a site that can't do what you need.</p>
<p>This article explains the difference between a mobile website, a PWA and a native app, when you need each one, and practical questions to help you decide.</p>

<h2>3 Options: What They Are and How They Work</h2>
<ul>
  <li><strong>Mobile-friendly website:</strong> Opens in the browser and adapts to the phone screen. No install needed and visible on Google.</li>
  <li><strong>PWA (Progressive Web App):</strong> A website that runs in the browser but can be added to the home screen like an app. Some features can work offline and send notifications.</li>
  <li><strong>Native app:</strong> Downloaded from the App Store and Google Play, with full access to the phone's capabilities (camera, GPS, Bluetooth, background processes).</li>
</ul>

<h2>Comparison Table</h2>
<table>
  <thead>
    <tr><th>Criterion</th><th>Mobile site</th><th>PWA</th><th>Native app</th></tr>
  </thead>
  <tbody>
    <tr><td>Development cost</td><td>Lowest</td><td>Medium</td><td>Highest (iOS + Android)</td></tr>
    <tr><td>Timeline</td><td>Weeks</td><td>Weeks</td><td>Months</td></tr>
    <tr><td>Installation</td><td>Not needed</td><td>Optional, to home screen</td><td>Must be downloaded from a store</td></tr>
    <tr><td>Visible on Google</td><td>Yes</td><td>Yes</td><td>No (only the store page)</td></tr>
    <tr><td>Phone capabilities</td><td>Limited</td><td>Medium</td><td>Full</td></tr>
    <tr><td>Notifications</td><td>No</td><td>Yes (with limitations)</td><td>Full</td></tr>
    <tr><td>Updates</td><td>Instant</td><td>Instant</td><td>Go through store review</td></tr>
    <tr><td>Store fees</td><td>None</td><td>None</td><td>Apple annual, Google one-time developer fee</td></tr>
  </tbody>
</table>

<h2>A Mobile Website Is Enough If…</h2>
<ul>
  <li>The goal is to inform and collect enquiries and orders;</li>
  <li>Customers find you through Google and ads;</li>
  <li>Users come to you a few times a month (not daily);</li>
  <li>Budget and time are limited.</li>
</ul>
<p>For most small and medium businesses, a fast mobile-friendly site is the best start. More: <a href="/blog-details/mobile-friendly-website-2026">Why a Mobile-Friendly Website Matters</a>.</p>

<h2>A PWA Is a Good Choice If…</h2>
<ul>
  <li>Users return often (orders, bookings, account) and an "icon" adds convenience;</li>
  <li>Core features must work on a weak connection;</li>
  <li>You need notifications but don't have a native app budget;</li>
  <li>You want one codebase serving both phone and desktop users.</li>
</ul>

<h2>You Need a Native App If…</h2>
<ul>
  <li>It's a daily-use product (banking, delivery, loyalty, taxi);</li>
  <li>You need deep use of the camera, GPS, Bluetooth or background processes (couriers, scanners, device control);</li>
  <li>Complex offline work is required (field staff);</li>
  <li>Being in the App Store and Google Play matters for brand and trust.</li>
</ul>

<h2>4 Most Common Mistakes</h2>
<ol>
  <li><strong>Ordering an app because "the competitor has one":</strong> If users don't install it, the investment is wasted.</li>
  <li><strong>Forgetting the website:</strong> Even with an app, new customers often arrive from Google via your site.</li>
  <li><strong>Not budgeting for maintenance:</strong> Apps need regular support as iOS and Android update.</li>
  <li><strong>Making the app a copy of the site:</strong> An app adds value only when it does what the site can't.</li>
</ol>

<h2>A Phased Approach</h2>
<p>The most cost-effective path is often phased: first a fast mobile site, then PWA features for returning users, and a native app only when there's real demand and usage data. Site speed matters at every stage: <a href="/blog-details/website-speed-core-web-vitals-2026">Website Speed and Core Web Vitals</a>. If you sell on Instagram: <a href="/blog-details/instagram-shop-vs-website-2026">Do You Need a Website If You Sell on Instagram?</a></p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is a PWA?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A PWA is a website that can be added to the phone's home screen like an app, can run some features offline and send notifications. It doesn't need to be downloaded from a store.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does a small business need a mobile app?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Often not. If customers don't use it daily, a fast mobile site or PWA gives the same result cheaper and faster. An app pays off for frequently returning users and when special phone features are needed.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Why does an app cost more than a website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Two platforms (iOS and Android), store requirements, testing and updates mean extra work. There are also store developer fees and ongoing support costs.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can a website be turned into an app later?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. A well-built site can first be extended into a PWA; a native app can later be built on the same back end (API).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do we know which one suits us?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Assess usage frequency, the phone features you need, budget and timeline. RS Code recommends the right option for your business in a free consultation.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>A mobile site, a PWA and a native app aren't rivals but tools for different stages. For most businesses the right start is a fast mobile site; an app creates value when there's real demand and daily use.</p>
<p><strong><a href="/contact">Contact us</a> to find out which option suits you</strong>. More: <a href="/services">our services</a>, <a href="/blog-details/website-cost-azerbaijan-2026">Website Cost 2026</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>«Нам нужно мобильное приложение» — одна из самых частых просьб владельцев бизнеса. Иногда приложение действительно нужно, а иногда хороший мобильный сайт даёт тот же результат в несколько раз дешевле и быстрее. Неверный выбор — это деньги на приложение, которое никто не скачивает, или на сайт, которому не хватает возможностей.</p>
<p>В статье объясняем разницу между мобильным сайтом, PWA и нативным приложением, когда что нужно, и даём практические вопросы для принятия решения.</p>

<h2>3 варианта: что это и как работает</h2>
<ul>
  <li><strong>Адаптивный сайт:</strong> открывается в браузере и подстраивается под экран телефона. Не требует установки и виден в Google.</li>
  <li><strong>PWA (Progressive Web App):</strong> сайт, который работает в браузере, но может быть добавлен на главный экран «как приложение». Часть функций может работать офлайн и отправлять уведомления.</li>
  <li><strong>Нативное приложение:</strong> скачивается из App Store и Google Play и полностью использует возможности телефона (камера, GPS, Bluetooth, фоновые процессы).</li>
</ul>

<h2>Сравнительная таблица</h2>
<table>
  <thead>
    <tr><th>Критерий</th><th>Мобильный сайт</th><th>PWA</th><th>Нативное приложение</th></tr>
  </thead>
  <tbody>
    <tr><td>Стоимость разработки</td><td>Самая низкая</td><td>Средняя</td><td>Самая высокая (iOS + Android)</td></tr>
    <tr><td>Срок</td><td>Недели</td><td>Недели</td><td>Месяцы</td></tr>
    <tr><td>Установка</td><td>Не нужна</td><td>По желанию, на главный экран</td><td>Нужно скачать из магазина</td></tr>
    <tr><td>Видимость в Google</td><td>Да</td><td>Да</td><td>Нет (только страница в магазине)</td></tr>
    <tr><td>Возможности телефона</td><td>Ограничены</td><td>Средние</td><td>Полные</td></tr>
    <tr><td>Уведомления</td><td>Нет</td><td>Есть (с ограничениями)</td><td>Полные</td></tr>
    <tr><td>Обновления</td><td>Мгновенно</td><td>Мгновенно</td><td>Через проверку магазина</td></tr>
    <tr><td>Сборы магазинов</td><td>Нет</td><td>Нет</td><td>Apple — ежегодно, Google — разовый взнос разработчика</td></tr>
  </tbody>
</table>

<h2>Мобильного сайта достаточно, если…</h2>
<ul>
  <li>цель — информировать, собирать заявки и заказы;</li>
  <li>клиенты находят вас через Google и рекламу;</li>
  <li>пользователь обращается к вам несколько раз в месяц (не каждый день);</li>
  <li>бюджет и сроки ограничены.</li>
</ul>
<p>Для большинства малых и средних компаний лучший старт — быстрый адаптивный сайт. Подробнее: <a href="/blog-details/mobilnaya-versiya-sayta-2026">Почему важна мобильная версия сайта</a>.</p>

<h2>PWA — хороший выбор, если…</h2>
<ul>
  <li>пользователи часто возвращаются (заказы, бронирования, личный кабинет) и «иконка» добавляет удобства;</li>
  <li>основные функции должны работать при слабом интернете;</li>
  <li>нужны уведомления, но нет бюджета на нативное приложение;</li>
  <li>хотите одной кодовой базой обслуживать и телефон, и компьютер.</li>
</ul>

<h2>Нативное приложение нужно, если…</h2>
<ul>
  <li>это продукт ежедневного использования (банк, доставка, программа лояльности, такси);</li>
  <li>нужны глубокие возможности камеры, GPS, Bluetooth или фоновых процессов (курьеры, сканеры, управление устройствами);</li>
  <li>требуется сложная работа офлайн (сотрудники в полях);</li>
  <li>присутствие в App Store и Google Play важно для бренда и доверия.</li>
</ul>

<h2>4 самые частые ошибки</h2>
<ol>
  <li><strong>Заказывать приложение, потому что «у конкурента есть»:</strong> если его не скачивают, инвестиция пропадает.</li>
  <li><strong>Забывать о сайте:</strong> даже при наличии приложения новые клиенты часто приходят из Google через сайт.</li>
  <li><strong>Не учитывать стоимость поддержки:</strong> приложению нужна регулярная поддержка из-за обновлений iOS и Android.</li>
  <li><strong>Делать приложение копией сайта:</strong> приложение ценно только тогда, когда делает то, чего не может сайт.</li>
</ol>

<h2>Поэтапный подход</h2>
<p>Самый выгодный путь часто поэтапный: сначала быстрый мобильный сайт, затем функции PWA для постоянных пользователей и нативное приложение — только при реальном спросе и данных об использовании. Скорость сайта важна на всех этапах: <a href="/blog-details/skorost-sajta-core-web-vitals-2026">Скорость сайта и Core Web Vitals</a>. Если продаёте в Instagram: <a href="/blog-details/instagram-magazin-ili-sajt-2026">Нужен ли сайт, если вы продаёте в Instagram</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое PWA?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">PWA — это сайт, который можно добавить на главный экран телефона как приложение; часть его функций работает офлайн, он может отправлять уведомления. Скачивать из магазина не нужно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли малому бизнесу мобильное приложение?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Чаще всего нет. Если клиенты не пользуются им ежедневно, быстрый мобильный сайт или PWA даст тот же результат дешевле и быстрее. Приложение оправдано для часто возвращающихся пользователей и при необходимости особых функций телефона.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Почему приложение дороже сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Две платформы (iOS и Android), требования магазинов, тестирование и обновления — это дополнительная работа. Кроме того, есть сборы магазинов для разработчиков и расходы на поддержку.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли потом превратить сайт в приложение?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Правильно сделанный сайт сначала можно расширить до PWA, а нативное приложение позже создать на том же серверном API.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как понять, что подходит именно нам?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Оцените частоту использования, нужные функции телефона, бюджет и сроки. RS Code на бесплатной консультации предложит вариант под ваш бизнес.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Мобильный сайт, PWA и нативное приложение — не конкуренты, а инструменты для разных этапов. Для большинства компаний правильный старт — быстрый мобильный сайт; приложение создаёт ценность при реальном спросе и ежедневном использовании.</p>
<p><strong><a href="/kontakty">Напишите нам</a>, чтобы узнать, какой вариант подходит вам</strong>. Подробнее: <a href="/uslugi">наши услуги</a>, <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта 2026</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'mobil-tetbiq-yoxsa-mobil-sayt-2026'],
            [
                'slug_en' => 'mobile-app-vs-mobile-website-2026',
                'slug_ru' => 'mobilnoe-prilozhenie-ili-sajt-2026',

                'title_az' => 'Mobil Tətbiq, yoxsa Mobil Sayt (PWA)? Biznes üçün Düzgün Seçim 2026',
                'title_en' => 'Mobile App or Mobile Website (PWA)? The Right Choice for Your Business 2026',
                'title_ru' => 'Мобильное приложение или мобильный сайт (PWA)? Правильный выбор для бизнеса 2026',

                'review_az' => 'Mobil sayt, PWA və native tətbiqin fərqi, xərc və müddət müqayisəsi, hansının nə vaxt lazım olduğu, ən çox edilən səhvlər və mərhələli yanaşma.',
                'review_en' => 'The difference between a mobile site, a PWA and a native app, cost and timeline compared, when you need each one, common mistakes and a phased approach.',
                'review_ru' => 'Разница между мобильным сайтом, PWA и нативным приложением, сравнение стоимости и сроков, когда что нужно, частые ошибки и поэтапный подход.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '9 Oktyabr 2026',
                'date_en' => 'October 9, 2026',
                'date_ru' => '9 Октября 2026',

                'photo'    => 'cover-tetbiq-vs-sayt-az.png',
                'photo_en' => 'cover-tetbiq-vs-sayt-en.png',
                'photo_ru' => 'cover-tetbiq-vs-sayt-ru.png',

                'meta_title_az' => 'Mobil Tətbiq, yoxsa Mobil Sayt (PWA)? 2026 | RS Code',
                'meta_title_en' => 'Mobile App vs Mobile Website (PWA) 2026 | RS Code',
                'meta_title_ru' => 'Мобильное приложение или сайт (PWA) 2026 | RS Code',

                'meta_description_az' => 'Biznes üçün mobil tətbiq lazımdırmı? Mobil sayt, PWA və native tətbiqin müqayisəsi: xərc, müddət, Google-da görünmə, bildirişlər və hansının nə vaxt seçilməsi.',
                'meta_description_en' => 'Does your business need a mobile app? Mobile site vs PWA vs native app: cost, timeline, Google visibility, notifications and when to choose each.',
                'meta_description_ru' => 'Нужно ли бизнесу мобильное приложение? Сравнение мобильного сайта, PWA и нативного приложения: стоимость, сроки, видимость в Google, уведомления и выбор.',

                'meta_keywords_az' => 'mobil tətbiq hazırlanması, mobil tətbiq vs sayt, PWA nədir, mobil sayt, tətbiq qiyməti, biznes üçün tətbiq 2026',
                'meta_keywords_en' => 'mobile app development, mobile app vs website, what is a PWA, mobile website, app cost, business app 2026',
                'meta_keywords_ru' => 'разработка мобильного приложения, приложение или сайт, что такое PWA, мобильный сайт, стоимость приложения 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
