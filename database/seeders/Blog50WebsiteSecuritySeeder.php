<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog50WebsiteSecuritySeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Kiçik biznes sahibləri çox vaxt düşünür: "Kim mənim saytımı sındıracaq?" Reallıq budur ki, hücumların böyük hissəsi konkret şirkətə yox, avtomatik botlarla minlərlə sayta eyni anda edilir. Bot köhnə plagin, zəif parol və ya açıq qalmış admin paneli axtarır — tapanda saytın kimə məxsus olmasının fərqi yoxdur.</p>
<p>Nəticə: saytda yad reklamlar, Google-da "Bu sayt təhlükəli ola bilər" xəbərdarlığı, spam göndərən e-poçt, itən müştəri məlumatları və ya tamamilə silinmiş sayt. Bu yazıda kiçik biznes üçün praktik təhlükəsizlik yoxlama siyahısını təqdim edirik — çoxunu bu gün yoxlaya bilərsiniz.</p>

<h2>Kiçik Biznes Saytları Niyə Hədəfə Düşür?</h2>
<ul>
  <li><strong>Avtomatik skan:</strong> Botlar internetdəki saytları fasiləsiz yoxlayır və tanınmış zəiflikləri axtarır.</li>
  <li><strong>Köhnə proqram təminatı:</strong> Yenilənməyən CMS, tema və plaginlər ən çox istifadə edilən giriş yoludur.</li>
  <li><strong>Zəif parollar:</strong> "admin / 123456" tipli girişlər avtomatik təxmin edilir.</li>
  <li><strong>Resurs kimi istifadə:</strong> Sındırılmış sayt spam göndərmək, fişinq səhifəsi yerləşdirmək və ya başqa saytlara hücum üçün istifadə olunur.</li>
</ul>

<h2>Sındırılmış Saytın Əlamətləri</h2>
<ul>
  <li>Google axtarışında saytın altında yad dildə və ya qəribə başlıqlar görünür;</li>
  <li>Brauzer və ya Google "təhlükəli sayt" xəbərdarlığı göstərir;</li>
  <li>Sayt mobil telefondan açılanda başqa sayta yönləndirir;</li>
  <li>Admin paneldə tanımadığınız istifadəçilər var;</li>
  <li>Hostinq şirkəti spam və ya yüksək yük barədə xəbərdarlıq göndərir;</li>
  <li>Sayt birdən yavaşlayıb və ya tez-tez xəta verir.</li>
</ul>
<p>Bu əlamətlərdən birini görsəniz, dərhal parolları dəyişin, ehtiyat nüsxəni yoxlayın və mütəxəssisə müraciət edin.</p>

<h2>Təhlükəsizlik Yoxlama Siyahısı: 12 Addım</h2>
<h3>Giriş və parollar</h3>
<ol>
  <li><strong>Güclü və unikal parollar:</strong> Admin panel, hostinq, domen və e-poçt üçün fərqli, uzun parollar. Parol menecerindən istifadə edin.</li>
  <li><strong>İki mərhələli doğrulama (2FA):</strong> Admin panel, hostinq paneli və domen hesabında mütləq aktiv edin.</li>
  <li><strong>Minimum giriş hüququ:</strong> Hər işçiyə yalnız lazım olan rol. İşdən çıxan əməkdaşın hesabını dərhal bağlayın.</li>
  <li><strong>Giriş cəhdlərinin məhdudlaşdırılması:</strong> Bir neçə səhv cəhddən sonra müvəqqəti blok — parol təxminini çətinləşdirir.</li>
</ol>
<h3>Proqram təminatı</h3>
<ol start="5">
  <li><strong>Mütəmadi yeniləmə:</strong> CMS, tema, plaginlər, framework və PHP versiyası. Köhnə PHP versiyaları təhlükəsizlik yeniləmələri almır.</li>
  <li><strong>Lazımsız plaginləri silin:</strong> İstifadə etmədiyiniz hər plagin əlavə risk deməkdir. "Nulled" (piratlıq) tema və plaginlərdən qaçın — çox vaxt zərərli kod daşıyır.</li>
</ol>
<h3>Server və məlumatlar</h3>
<ol start="7">
  <li><strong>HTTPS (SSL):</strong> Bütün sayt HTTPS ilə açılmalı, HTTP avtomatik yönləndirilməlidir.</li>
  <li><strong>Avtomatik ehtiyat nüsxə:</strong> Həm fayllar, həm verilənlər bazası; nüsxələr başqa yerdə saxlanılmalı və bərpası vaxtaşırı sınanmalıdır.</li>
  <li><strong>Formaların qorunması:</strong> Əlaqə və qeydiyyat formalarında bot qoruması (məsələn, CAPTCHA) və daxil edilən məlumatın yoxlanılması.</li>
  <li><strong>Gizli məlumatların qorunması:</strong> Parollar, API açarları və konfiqurasiya faylları kodda və ya açıq qovluqda saxlanılmamalıdır.</li>
</ol>
<h3>Nəzarət</h3>
<ol start="11">
  <li><strong>Google Search Console:</strong> "Təhlükəsizlik problemləri" bölməsi Google-un saytınızda aşkar etdiyi zərərli məzmun barədə xəbər verir. Ətraflı: <a href="/blog-details/seo-xidmeti-azerbaycan-2026">SEO Xidməti Azərbaycanda</a>.</li>
  <li><strong>Xəta və giriş loglarının izlənməsi:</strong> Qəfil artan xətalar və şübhəli giriş cəhdləri problemin erkən əlamətidir.</li>
</ol>

<h2>Domen və Korporativ E-poçt: Unudulan Risklər</h2>
<p>Sayt qorunsa belə, domen hesabı ələ keçirilsə, saytınız və e-poçtunuz başqasının nəzarətinə keçə bilər. Domenin <strong>sizin şirkətin adına</strong> qeydiyyatda olduğunu, giriş məlumatlarının sizdə olduğunu və müddətinin avtomatik uzadıldığını yoxlayın.</p>
<p>Korporativ e-poçt üçün SPF, DKIM və DMARC qeydləri qurulmalıdır — bunlar başqasının sizin adınızdan saxta məktub göndərməsini çətinləşdirir və məktublarınızın spama düşməsinin qarşısını alır. Ətraflı: <a href="/korporativ-email">Korporativ e-poçt xidməti</a>.</p>

<h2>Hazır CMS, yoxsa Sifarişlə Sayt: Təhlükəsizlik Baxımından</h2>
<table>
  <thead>
    <tr><th>Meyar</th><th>Hazır CMS + plaginlər</th><th>Sifarişlə sayt (framework)</th></tr>
  </thead>
  <tbody>
    <tr><td>Əsas risk</td><td>Köhnə və ya etibarsız plaginlər</td><td>Kodun keyfiyyəti və dəstəyin olmaması</td></tr>
    <tr><td>Kütləvi bot hücumları</td><td>Populyar platformalar ən çox hədəfdir</td><td>Standart skanlara daha az həssasdır</td></tr>
    <tr><td>Yeniləmə</td><td>Tez-tez, çox komponent</td><td>Az komponent, planlı</td></tr>
    <tr><td>Qorunma mexanizmləri</td><td>Plaginlərdən asılı</td><td>Framework-ün daxili qorumaları (CSRF, SQL injection və s.)</td></tr>
  </tbody>
</table>
<p>Heç bir texnologiya avtomatik təhlükəsiz deyil: həlledici olan mütəmadi yeniləmə və dəstəkdir. Texnologiya seçimi barədə: <a href="/blog-details/laravel-yoxsa-wordpress-2026">Laravel, yoxsa WordPress</a>.</p>

<h2>Sayt Sındırılıbsa: İlk 5 Addım</h2>
<ol>
  <li>Bütün parolları dəyişin (admin, hostinq, verilənlər bazası, FTP, e-poçt) və 2FA aktiv edin;</li>
  <li>Hostinq şirkətinə xəbər verin — onlar logları və zərərli faylları müəyyənləşdirməyə kömək edə bilər;</li>
  <li>Təmiz ehtiyat nüsxədən bərpa edin, sonra zəifliyi aradan qaldırın — əks halda hücum təkrarlanacaq;</li>
  <li>Müştəri məlumatları təsirlənibsə, hüquqi məsləhət alın və müştəriləri məlumatlandırın;</li>
  <li>Google Search Console-da problem aradan qalxdıqdan sonra yenidən yoxlama sorğusu göndərin.</li>
</ol>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kiçik bizneslərin saytını həqiqətən sındırırlarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Hücumların çoxu avtomatik botlarla edilir və saytın böyüklüyünə baxmır — köhnə plagin, zəif parol və ya açıq admin paneli olan istənilən sayt hədəfə düşə bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SSL sertifikatı saytı tam qoruyurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. SSL ziyarətçi ilə sayt arasındakı məlumatı şifrələyir, amma köhnə proqram təminatı və ya zəif parol kimi zəifliklərdən qorumur. O, təhlükəsizliyin yalnız bir hissəsidir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ehtiyat nüsxəni nə qədər tez-tez almaq lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sifariş və ya müraciət qəbul edən saytlar üçün gündəlik, nadir dəyişən saytlar üçün həftəlik. Nüsxələr serverdən kənarda saxlanılmalı və bərpası vaxtaşırı sınanmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytın sındırıldığını necə bilə bilərəm?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google-da yad başlıqlar, "təhlükəli sayt" xəbərdarlığı, mobil telefonda başqa sayta yönləndirmə, admin paneldə tanımadığınız istifadəçilər və hostinqdən spam xəbərdarlığı əsas əlamətlərdir. Google Search Console da bu barədə bildiriş göndərir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">RS Code mövcud saytın təhlükəsizliyini yoxlaya bilərmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Saytın proqram versiyalarını, parol və giriş siyasətini, ehtiyat nüsxə qaydasını və əsas zəiflikləri yoxlayıb, prioritetə görə düzəliş planı təqdim edirik.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Sayt təhlükəsizliyi böyük büdcə deyil, nizam tələb edir: güclü parol və 2FA, mütəmadi yeniləmə, avtomatik ehtiyat nüsxə və nəzarət. Bu siyahını bu gün yoxlamaq sabah saytı, müştəri etibarını və Google mövqelərini itirməkdən qat-qat ucuzdur.</p>
<p><strong>Saytınızın təhlükəsizlik yoxlaması üçün <a href="/elaqe">bizə yazın</a></strong>. Ətraflı: <a href="/xidmetler">xidmətlərimiz</a>, <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">Saytınızı Yeniləmə Vaxtıdır: 7 Əlamət</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>Small business owners often think: "Who would bother hacking my website?" The reality is that most attacks aren't aimed at a specific company — automated bots hit thousands of sites at once. A bot looks for an outdated plugin, a weak password or an exposed admin panel; when it finds one, it doesn't matter whose site it is.</p>
<p>The result: foreign ads on your site, a "This site may be hacked" warning on Google, email that sends spam, leaked customer data, or a site wiped entirely. This article gives you a practical security checklist for small businesses — you can check most of it today.</p>

<h2>Why Small Business Websites Get Targeted</h2>
<ul>
  <li><strong>Automated scanning:</strong> Bots continuously probe websites for known vulnerabilities.</li>
  <li><strong>Outdated software:</strong> Un-updated CMSs, themes and plugins are the most common way in.</li>
  <li><strong>Weak passwords:</strong> Logins like "admin / 123456" are guessed automatically.</li>
  <li><strong>Use as a resource:</strong> A hacked site is used to send spam, host phishing pages or attack other sites.</li>
</ul>

<h2>Signs Your Site Has Been Hacked</h2>
<ul>
  <li>Odd titles or text in a foreign language appear under your site in Google results;</li>
  <li>The browser or Google shows a "dangerous site" warning;</li>
  <li>The site redirects to another site when opened on a phone;</li>
  <li>There are users you don't recognise in the admin panel;</li>
  <li>Your hosting provider warns you about spam or high load;</li>
  <li>The site suddenly slows down or keeps throwing errors.</li>
</ul>
<p>If you see any of these signs, change your passwords immediately, check your backups and contact a specialist.</p>

<h2>Security Checklist: 12 Steps</h2>
<h3>Access and passwords</h3>
<ol>
  <li><strong>Strong, unique passwords:</strong> Different, long passwords for the admin panel, hosting, domain and email. Use a password manager.</li>
  <li><strong>Two-factor authentication (2FA):</strong> Turn it on for the admin panel, hosting panel and domain account.</li>
  <li><strong>Least privilege:</strong> Give each employee only the role they need. Close a departing employee's account immediately.</li>
  <li><strong>Login attempt limits:</strong> A temporary block after several failed attempts makes password guessing much harder.</li>
</ol>
<h3>Software</h3>
<ol start="5">
  <li><strong>Regular updates:</strong> CMS, themes, plugins, framework and PHP version. Old PHP versions no longer receive security fixes.</li>
  <li><strong>Remove unused plugins:</strong> Every plugin you don't use is extra risk. Avoid "nulled" (pirated) themes and plugins — they often carry malicious code.</li>
</ol>
<h3>Server and data</h3>
<ol start="7">
  <li><strong>HTTPS (SSL):</strong> The whole site should load over HTTPS, with HTTP redirected automatically.</li>
  <li><strong>Automatic backups:</strong> Both files and database; keep copies off the server and test restoring them from time to time.</li>
  <li><strong>Form protection:</strong> Bot protection (e.g. CAPTCHA) and input validation on contact and sign-up forms.</li>
  <li><strong>Protect secrets:</strong> Passwords, API keys and configuration files must not sit in code or in publicly accessible folders.</li>
</ol>
<h3>Monitoring</h3>
<ol start="11">
  <li><strong>Google Search Console:</strong> The "Security issues" section tells you about malicious content Google has found on your site. More: <a href="/blog-details/why-you-need-seo-services-2026">Why You Need SEO Services</a>.</li>
  <li><strong>Watch error and access logs:</strong> A sudden spike in errors or suspicious login attempts is an early warning sign.</li>
</ol>

<h2>Domain and Business Email: The Forgotten Risks</h2>
<p>Even if your site is protected, a hijacked domain account can hand your website and email to someone else. Check that the domain is registered <strong>in your company's name</strong>, that you hold the login details and that it renews automatically.</p>
<p>Business email should have SPF, DKIM and DMARC records set up — they make it harder for anyone to send fake emails in your name and help keep your messages out of spam. More: <a href="/corporate-email">Business email service</a>.</p>

<h2>Off-the-Shelf CMS or Custom Site: A Security View</h2>
<table>
  <thead>
    <tr><th>Criterion</th><th>Off-the-shelf CMS + plugins</th><th>Custom site (framework)</th></tr>
  </thead>
  <tbody>
    <tr><td>Main risk</td><td>Outdated or untrusted plugins</td><td>Code quality and lack of support</td></tr>
    <tr><td>Mass bot attacks</td><td>Popular platforms are the most targeted</td><td>Less exposed to standard scans</td></tr>
    <tr><td>Updates</td><td>Frequent, many components</td><td>Fewer components, planned</td></tr>
    <tr><td>Protection mechanisms</td><td>Depend on plugins</td><td>Built-in framework protections (CSRF, SQL injection, etc.)</td></tr>
  </tbody>
</table>
<p>No technology is secure by default: regular updates and support are what count. On choosing a technology: <a href="/blog-details/laravel-vs-wordpress-for-business-2026">Laravel or WordPress</a>.</p>

<h2>If Your Site Has Been Hacked: First 5 Steps</h2>
<ol>
  <li>Change every password (admin, hosting, database, FTP, email) and turn on 2FA;</li>
  <li>Notify your hosting provider — they can help identify logs and malicious files;</li>
  <li>Restore from a clean backup, then fix the vulnerability — otherwise the attack will repeat;</li>
  <li>If customer data was affected, get legal advice and inform your customers;</li>
  <li>Once the problem is fixed, request a review in Google Search Console.</li>
</ol>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do small business websites really get hacked?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Most attacks are carried out by automated bots that don't care about a site's size — any site with an outdated plugin, a weak password or an exposed admin panel can be hit.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does an SSL certificate fully protect my site?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. SSL encrypts data between the visitor and the site, but it doesn't protect against weaknesses such as outdated software or weak passwords. It's only one part of security.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How often should I back up my site?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Daily for sites that take orders or enquiries, weekly for sites that rarely change. Keep copies off the server and test restoring them periodically.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can I tell if my site has been hacked?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The main signs are strange titles in Google, a "dangerous site" warning, redirects to another site on mobile, unknown users in the admin panel and spam warnings from your host. Google Search Console also sends notifications about this.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can RS Code check the security of my existing site?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. We review software versions, password and access policies, backup routines and key vulnerabilities, then give you a prioritised plan of fixes.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>Website security takes discipline, not a big budget: strong passwords and 2FA, regular updates, automatic backups and monitoring. Checking this list today is far cheaper than losing your site, customer trust and Google rankings tomorrow.</p>
<p><strong><a href="/contact">Contact us</a> for a security check of your website</strong>. More: <a href="/services">our services</a>, <a href="/blog-details/signs-you-need-website-redesign-2026">Signs You Need a Website Redesign</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Владельцы малого бизнеса часто думают: «Кому нужен мой сайт?» На деле большинство атак направлено не на конкретную компанию — автоматические боты атакуют тысячи сайтов одновременно. Бот ищет устаревший плагин, слабый пароль или открытую админ-панель, и если находит — неважно, чей это сайт.</p>
<p>Последствия: чужая реклама на сайте, предупреждение Google «Этот сайт может быть взломан», почта, рассылающая спам, утечка данных клиентов или полностью удалённый сайт. В этой статье — практический чек-лист безопасности для малого бизнеса; большую часть можно проверить уже сегодня.</p>

<h2>Почему сайты малого бизнеса становятся целью</h2>
<ul>
  <li><strong>Автоматическое сканирование:</strong> Боты непрерывно проверяют сайты на известные уязвимости.</li>
  <li><strong>Устаревшее ПО:</strong> Необновлённые CMS, темы и плагины — самый частый путь взлома.</li>
  <li><strong>Слабые пароли:</strong> Логины вида «admin / 123456» подбираются автоматически.</li>
  <li><strong>Использование как ресурса:</strong> Взломанный сайт используют для рассылки спама, фишинговых страниц или атак на другие сайты.</li>
</ul>

<h2>Признаки взлома сайта</h2>
<ul>
  <li>В поиске Google под вашим сайтом появляются странные заголовки или текст на чужом языке;</li>
  <li>Браузер или Google показывает предупреждение об опасном сайте;</li>
  <li>С телефона сайт перенаправляет на другой сайт;</li>
  <li>В админ-панели есть незнакомые пользователи;</li>
  <li>Хостинг предупреждает о спаме или высокой нагрузке;</li>
  <li>Сайт внезапно замедлился или часто выдаёт ошибки.</li>
</ul>
<p>Заметив любой из этих признаков, сразу смените пароли, проверьте резервные копии и обратитесь к специалисту.</p>

<h2>Чек-лист безопасности: 12 шагов</h2>
<h3>Доступ и пароли</h3>
<ol>
  <li><strong>Сильные и уникальные пароли:</strong> Разные длинные пароли для админ-панели, хостинга, домена и почты. Используйте менеджер паролей.</li>
  <li><strong>Двухфакторная аутентификация (2FA):</strong> Обязательно включите для админ-панели, панели хостинга и аккаунта домена.</li>
  <li><strong>Минимальные права:</strong> Каждому сотруднику — только нужная роль. Аккаунт уволившегося сотрудника закрывайте сразу.</li>
  <li><strong>Ограничение попыток входа:</strong> Временная блокировка после нескольких неудачных попыток затрудняет подбор пароля.</li>
</ol>
<h3>Программное обеспечение</h3>
<ol start="5">
  <li><strong>Регулярные обновления:</strong> CMS, темы, плагины, фреймворк и версия PHP. Старые версии PHP больше не получают исправлений безопасности.</li>
  <li><strong>Удалите ненужные плагины:</strong> Каждый неиспользуемый плагин — дополнительный риск. Избегайте «nulled» (пиратских) тем и плагинов — они часто содержат вредоносный код.</li>
</ol>
<h3>Сервер и данные</h3>
<ol start="7">
  <li><strong>HTTPS (SSL):</strong> Весь сайт должен открываться по HTTPS, а HTTP — автоматически перенаправляться.</li>
  <li><strong>Автоматические резервные копии:</strong> И файлы, и база данных; копии храните вне сервера и периодически проверяйте восстановление.</li>
  <li><strong>Защита форм:</strong> Защита от ботов (например, CAPTCHA) и проверка введённых данных в формах обратной связи и регистрации.</li>
  <li><strong>Защита секретов:</strong> Пароли, API-ключи и конфигурационные файлы не должны храниться в коде или в открытых папках.</li>
</ol>
<h3>Контроль</h3>
<ol start="11">
  <li><strong>Google Search Console:</strong> Раздел «Проблемы безопасности» сообщает о вредоносном контенте, найденном Google на вашем сайте. Подробнее: <a href="/blog-details/zachem-nuzhny-seo-uslugi-2026">Зачем нужны SEO-услуги</a>.</li>
  <li><strong>Мониторинг логов ошибок и входов:</strong> Резкий рост ошибок и подозрительные попытки входа — ранний сигнал проблемы.</li>
</ol>

<h2>Домен и корпоративная почта: забытые риски</h2>
<p>Даже если сайт защищён, при захвате аккаунта домена ваш сайт и почта могут перейти под чужой контроль. Проверьте, что домен зарегистрирован <strong>на вашу компанию</strong>, доступы к нему у вас и включено автопродление.</p>
<p>Для корпоративной почты нужно настроить записи SPF, DKIM и DMARC — они мешают отправлять поддельные письма от вашего имени и помогают вашим письмам не попадать в спам. Подробнее: <a href="/korporativnaya-pochta">Корпоративная почта</a>.</p>

<h2>Готовая CMS или сайт на заказ: взгляд с точки зрения безопасности</h2>
<table>
  <thead>
    <tr><th>Критерий</th><th>Готовая CMS + плагины</th><th>Сайт на заказ (фреймворк)</th></tr>
  </thead>
  <tbody>
    <tr><td>Главный риск</td><td>Устаревшие или ненадёжные плагины</td><td>Качество кода и отсутствие поддержки</td></tr>
    <tr><td>Массовые атаки ботов</td><td>Популярные платформы — главная цель</td><td>Менее уязвим для стандартных сканов</td></tr>
    <tr><td>Обновления</td><td>Частые, много компонентов</td><td>Мало компонентов, по плану</td></tr>
    <tr><td>Механизмы защиты</td><td>Зависят от плагинов</td><td>Встроенная защита фреймворка (CSRF, SQL-инъекции и др.)</td></tr>
  </tbody>
</table>
<p>Ни одна технология не безопасна сама по себе: решают регулярные обновления и поддержка. О выборе технологии: <a href="/blog-details/laravel-ili-wordpress-2026">Laravel или WordPress</a>.</p>

<h2>Если сайт взломан: первые 5 шагов</h2>
<ol>
  <li>Смените все пароли (админка, хостинг, база данных, FTP, почта) и включите 2FA;</li>
  <li>Сообщите хостинг-провайдеру — он поможет найти логи и вредоносные файлы;</li>
  <li>Восстановите сайт из чистой резервной копии, затем устраните уязвимость — иначе атака повторится;</li>
  <li>Если затронуты данные клиентов, получите юридическую консультацию и сообщите клиентам;</li>
  <li>После устранения проблемы отправьте запрос на повторную проверку в Google Search Console.</li>
</ol>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Действительно ли взламывают сайты малого бизнеса?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Большинство атак выполняют автоматические боты, которым неважен размер сайта: целью может стать любой сайт с устаревшим плагином, слабым паролем или открытой админ-панелью.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Полностью ли защищает сайт SSL-сертификат?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. SSL шифрует данные между посетителем и сайтом, но не защищает от уязвимостей вроде устаревшего ПО или слабых паролей. Это лишь часть безопасности.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как часто нужно делать резервные копии?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ежедневно для сайтов, принимающих заказы или заявки, еженедельно — для редко меняющихся. Копии храните вне сервера и периодически проверяйте восстановление.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как понять, что сайт взломан?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Главные признаки: странные заголовки в Google, предупреждение об опасном сайте, перенаправление на другой сайт с телефона, незнакомые пользователи в админке и предупреждения хостинга о спаме. Google Search Console тоже присылает уведомления.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Может ли RS Code проверить безопасность существующего сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Мы проверяем версии ПО, политику паролей и доступа, порядок резервного копирования и основные уязвимости, а затем даём план исправлений по приоритетам.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Безопасность сайта требует не большого бюджета, а порядка: сильные пароли и 2FA, регулярные обновления, автоматические резервные копии и контроль. Проверить этот список сегодня намного дешевле, чем завтра потерять сайт, доверие клиентов и позиции в Google.</p>
<p><strong><a href="/kontakty">Напишите нам</a> для проверки безопасности вашего сайта</strong>. Подробнее: <a href="/uslugi">наши услуги</a>, <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">Признаки, что сайту нужен редизайн</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'sayt-tehlukesizliyi-yoxlama-siyahisi-2026'],
            [
                'slug_en' => 'website-security-checklist-small-business-2026',
                'slug_ru' => 'bezopasnost-sajta-chek-list-2026',

                'title_az' => 'Sayt Təhlükəsizliyi: Kiçik Biznes üçün 12 Addımlıq Yoxlama Siyahısı 2026',
                'title_en' => 'Website Security: A 12-Step Checklist for Small Businesses 2026',
                'title_ru' => 'Безопасность сайта: чек-лист из 12 шагов для малого бизнеса 2026',

                'review_az' => 'Kiçik biznes saytları niyə hədəfə düşür, sındırılmanın əlamətləri, parol, 2FA, yeniləmə, ehtiyat nüsxə, domen və e-poçt qorunması, sayt sındırılanda ilk 5 addım.',
                'review_en' => 'Why small business sites get targeted, signs of a hack, passwords, 2FA, updates, backups, domain and email protection, and the first 5 steps after a hack.',
                'review_ru' => 'Почему сайты малого бизнеса становятся целью, признаки взлома, пароли, 2FA, обновления, резервные копии, защита домена и почты, первые 5 шагов после взлома.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '16 Oktyabr 2026',
                'date_en' => 'October 16, 2026',
                'date_ru' => '16 Октября 2026',

                'photo'    => 'cover-sayt-tehlukesizliyi-az.png',
                'photo_en' => 'cover-sayt-tehlukesizliyi-en.png',
                'photo_ru' => 'cover-sayt-tehlukesizliyi-ru.png',

                'meta_title_az' => 'Sayt Təhlükəsizliyi: Kiçik Biznes üçün Yoxlama Siyahısı 2026 | RS Code',
                'meta_title_en' => 'Website Security Checklist for Small Business 2026 | RS Code',
                'meta_title_ru' => 'Безопасность сайта: чек-лист для малого бизнеса 2026 | RS Code',

                'meta_description_az' => 'Saytınızı sındırılmadan qoruyun: 12 addımlıq təhlükəsizlik yoxlama siyahısı — parol, 2FA, yeniləmə, ehtiyat nüsxə, SSL, domen və e-poçt qorunması, sındırılanda nə etməli.',
                'meta_description_en' => 'Protect your website from hacks: a 12-step security checklist — passwords, 2FA, updates, backups, SSL, domain and email protection, and what to do after a hack.',
                'meta_description_ru' => 'Защитите сайт от взлома: чек-лист безопасности из 12 шагов — пароли, 2FA, обновления, резервные копии, SSL, защита домена и почты, что делать после взлома.',

                'meta_keywords_az' => 'sayt təhlükəsizliyi, saytın qorunması, sayt sındırılıb, kibertəhlükəsizlik kiçik biznes, wordpress təhlükəsizlik, ehtiyat nüsxə 2026',
                'meta_keywords_en' => 'website security, website protection, hacked website, small business cybersecurity, wordpress security, website backup 2026',
                'meta_keywords_ru' => 'безопасность сайта, защита сайта, сайт взломан, кибербезопасность малого бизнеса, безопасность wordpress, резервная копия сайта 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
