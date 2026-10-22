<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog56MobileAppCostSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>"Bizə mobil tətbiq lazımdır, neçəyə olar?" sualına dürüst cavab "nə edəcəyindən asılıdır"dır. Amma bu cavab büdcə planlamağa kömək etmir. Bu yazıda 2027-ci il üçün Azərbaycanda mobil tətbiq hazırlanmasının təxmini qiymətlərini, qiyməti nəyin artırdığını, App Store və Google Play-in rəsmi tələblərini və ilk ildən sonra yaranan xərcləri izah edirik.</p>
<p>Əvvəlcə bir sual: həqiqətən tətbiq lazımdırmı? Bəzən mobil sayt və ya PWA eyni işi daha ucuz görür. Bunu <a href="/blog-details/mobil-tetbiq-yoxsa-mobil-sayt-2026">mobil tətbiq, yoxsa mobil sayt</a> yazısında ətraflı müqayisə etmişik. Bu yazı tətbiqə qərar vermiş bizneslər üçündür.</p>

<h2>Qısa Cavab: Mobil Tətbiq Qiymətləri 2027</h2>
<p>Aşağıdakı rəqəmlər Azərbaycan bazarında iOS + Android (bir kod bazası ilə) üçün <strong>təxmini</strong> diapazonlardır. Dəqiq qiymət funksiyaların siyahısından və dizayndan asılıdır.</p>
<table>
  <thead>
    <tr><th>Növ</th><th>Qiymət (AZN)</th><th>Müddət</th><th>Nümunə</th></tr>
  </thead>
  <tbody>
    <tr><td>PWA / tətbiq kimi işləyən mobil sayt</td><td>1 500 – 5 000</td><td>3 – 6 həftə</td><td>Menyu, kataloq, rezervasiya</td></tr>
    <tr><td>Sadə tətbiq</td><td>4 000 – 10 000</td><td>1 – 2 ay</td><td>Kataloq, əlaqə, bildirişlər, sadə admin panel</td></tr>
    <tr><td>Orta tətbiq</td><td>10 000 – 25 000</td><td>2 – 4 ay</td><td>Qeydiyyat, sifariş, onlayn ödəniş, bonus, admin panel</td></tr>
    <tr><td>Mürəkkəb platforma</td><td>25 000 – 60 000+</td><td>4 – 9 ay</td><td>Marketplace, çatdırılma, kuryer və müştəri tətbiqləri, real vaxt xəritə</td></tr>
  </tbody>
</table>
<p>Bu qiymətlərə adətən tətbiqin özü, server tərəfi (backend), admin panel və mağazalara yerləşdirmə daxildir. Dəstək və hosting ayrıca hesablanır (aşağıda).</p>

<h2>Qiyməti Nə Artırır?</h2>
<ul>
  <li><strong>Platforma yanaşması:</strong> Flutter və ya React Native ilə bir kod bazası həm iOS, həm Android üçün işləyir. İki ayrı native tətbiq yazmaq təxminən iki dəfə baha başa gəlir.</li>
  <li><strong>İstifadəçi rolları:</strong> yalnız müştəri tətbiqi bir şeydir; müştəri + kuryer + restoran/mağaza tətbiqi tamam başqa həcmdir.</li>
  <li><strong>Onlayn ödəniş:</strong> bank ödəniş şlüzü ilə inteqrasiya, qaytarmalar, ödəniş statusları.</li>
  <li><strong>Xəritə və real vaxt:</strong> kuryerin yerini canlı göstərmək, marşrut, məsafəyə görə qiymət.</li>
  <li><strong>İnteqrasiyalar:</strong> POS, 1C, anbar, CRM, SMS ilə təsdiq kodu.</li>
  <li><strong>Admin panel və hesabatlar:</strong> çox vaxt tətbiqin özü qədər iş tələb edir.</li>
  <li><strong>Fərdi dizayn və animasiyalar:</strong> hazır komponentlərdən daha bahalıdır.</li>
</ul>

<h2>App Store və Google Play: Rəsmi Tələblər və Haqlar</h2>
<table>
  <thead>
    <tr><th></th><th>Apple App Store</th><th>Google Play</th></tr>
  </thead>
  <tbody>
    <tr><td>Developer hesabı</td><td>İldə 99 USD (Apple Developer Program)</td><td>Birdəfəlik 25 USD</td></tr>
    <tr><td>Yoxlama</td><td>Hər versiya Apple-ın yoxlamasından (App Review) keçir</td><td>Yeni şəxsi hesablar üçün: ən azı 12 tester, ardıcıl 14 gün qapalı test</td></tr>
    <tr><td>Kimin adına</td><td>Şirkətin öz hesabında olmalıdır</td><td>Şirkətin öz hesabında olmalıdır</td></tr>
  </tbody>
</table>
<p><strong>Komissiya barədə yaxşı xəbər:</strong> Apple-ın App Review qaydalarının 3.1.3(e) bəndinə görə, tətbiqdən kənarda istehlak olunan fiziki mal və ya xidmət (yemək sifarişi, mağaza məhsulu, taksi, salon xidməti) satılırsa, ödəniş tətbiqdaxili satınalma ilə deyil, Apple Pay və ya kart kimi digər üsullarla alınmalıdır. Yəni restoran və ya mağaza tətbiqində sifarişlərdən App Store-un rəqəmsal məhsul komissiyası tutulmur. Bu, rəqəmsal məzmun (abunə, onlayn kurs, oyun valyutası) satan tətbiqlərdən fərqli hesablanır.</p>
<p><strong>Vacib:</strong> developer hesabları şirkətin öz adına açılmalıdır. Hesab hazırlayıcının adındadırsa, gələcəkdə tətbiqi başqa komandaya köçürmək çətinləşir.</p>

<h2>Hazırlanma Mərhələləri</h2>
<ol>
  <li><strong>Brif və tələblər.</strong> Kimlər istifadə edəcək, hansı problemi həll edir, ilk versiyada hansı funksiyalar mütləqdir. Bax: <a href="/blog-details/brif-nece-doldurulur-2026">brif necə doldurulur</a>.</li>
  <li><strong>Prototip və UX.</strong> Ekranların sxemi, istifadəçi yolu (məs. məhsul → səbət → ödəniş).</li>
  <li><strong>UI dizayn.</strong> Brendə uyğun ekranlar, iOS və Android üçün yoxlanılmış ölçülər.</li>
  <li><strong>Backend və admin panel.</strong> Server, verilənlər bazası, API, idarəetmə paneli.</li>
  <li><strong>Mobil tətbiq.</strong> Ekranlar, API ilə əlaqə, bildirişlər, ödəniş.</li>
  <li><strong>Test.</strong> Real cihazlarda, zəif internetdə, müxtəlif ekran ölçülərində; Google Play-in qapalı test tələbi də bu mərhələdədir.</li>
  <li><strong>Mağazalara yerləşdirmə.</strong> Ekran şəkilləri, təsvir, məxfilik siyasəti, yoxlamadan keçmə.</li>
</ol>

<h2>İlk İldən Sonrakı Xərclər</h2>
<p>Tətbiqin hazırlanması xərcin yalnız bir hissəsidir. Büdcəyə bunları da daxil edin:</p>
<table>
  <thead>
    <tr><th>Xərc</th><th>Təxmini</th></tr>
  </thead>
  <tbody>
    <tr><td>Server / hosting</td><td>ayda 20 – 200 AZN (yükdən asılı)</td></tr>
    <tr><td>Apple developer hesabı</td><td>ildə 99 USD</td></tr>
    <tr><td>SMS, xəritə API, bildiriş xidmətləri</td><td>istifadəyə görə</td></tr>
    <tr><td>Texniki dəstək və yeniləmələr</td><td>adətən ildə hazırlanma xərcinin 15–20%-i</td></tr>
  </tbody>
</table>
<p>Yeniləmələr istəyə bağlı deyil: Apple və Google hər il yeni əməliyyat sistemi versiyaları çıxarır və mağazalar tətbiqlərin yeni tələblərə uyğunlaşdırılmasını tələb edir. Uzun müddət yenilənməyən tətbiq yeni telefonlarda problem yarada və ya mağazada görünməz ola bilər.</p>

<h2>Büdcəyə Qənaət: MVP Yanaşması</h2>
<p>Hər şeyi birdən yazmaq əvəzinə əvvəlcə ən vacib funksiyalarla ilk versiya (MVP) çıxarın:</p>
<ul>
  <li>ilk versiyada yalnız əsas istifadəçi yolu olsun (məs. sifariş və ödəniş);</li>
  <li>bonus, referal, çat kimi funksiyaları istifadəçi rəyinə görə sonra əlavə edin;</li>
  <li>admin paneli əvvəlcə sadə saxlayın;</li>
  <li>tətbiqdən əvvəl PWA ilə tələbi yoxlamaq da bir yoldur.</li>
</ul>
<p>Bu yanaşma həm ilk büdcəni azaldır, həm də pulu istifadəçilərin həqiqətən istifadə etdiyi funksiyalara xərcləməyə imkan verir.</p>

<h2>Hazırlayıcı Seçərkən Soruşulacaq 8 Sual</h2>
<ol>
  <li>Hansı texnologiya ilə yazılacaq (Flutter, React Native, native) və niyə?</li>
  <li>Qiymətə backend və admin panel daxildirmi?</li>
  <li>Mənbə kodu və bütün hesablar (App Store, Google Play, server) mənim adıma olacaqmı?</li>
  <li>Mağazalara yerləşdirmə və yoxlamadan keçmə kimin məsuliyyətindədir?</li>
  <li>Zəmanət müddəti nə qədərdir və bu müddətdə səhvlər pulsuz düzəldilirmi?</li>
  <li>Dəstək və yeniləmələr aylıq neçəyə başa gələcək?</li>
  <li>Portfeldə mağazalarda yayımlanmış tətbiqlər varmı?</li>
  <li>Ödəniş mərhələlərə bölünürmü və hər mərhələnin nəticəsi nədir?</li>
</ol>
<p>Ümumi sifariş sualları üçün <a href="/blog-details/veb-sayt-hazirlatmazdan-evvel-12-sual">hazırlatmazdan əvvəl 12 sual</a> yazımıza da baxın.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Azərbaycanda mobil tətbiq hazırlamaq neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bazar üzrə təxminən: sadə tətbiq 4 000–10 000 AZN, sifariş və onlayn ödənişli orta tətbiq 10 000–25 000 AZN, mürəkkəb platforma 25 000 AZN və yuxarı. PWA variantı 1 500–5 000 AZN ola bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">App Store və Google Play-də yerləşdirmək neçəyədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Apple Developer Program ildə 99 USD, Google Play developer hesabı isə birdəfəlik 25 USD-dir. Hər iki hesab şirkətin öz adına açılmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Restoran və ya mağaza tətbiqində sifarişlərdən App Store komissiya tutur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Apple-ın 3.1.3(e) qaydasına görə tətbiqdən kənarda istehlak olunan fiziki mal və xidmətlər üçün tətbiqdaxili satınalma deyil, Apple Pay və ya kart kimi digər ödəniş üsulları istifadə olunmalıdır. Ona görə bu sifarişlərə rəqəmsal məhsul komissiyası tətbiq edilmir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Mobil tətbiq nə qədər müddətə hazırlanır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sadə tətbiq 1–2 ay, orta tətbiq 2–4 ay, mürəkkəb platforma 4–9 ay. Mağaza yoxlamaları və Google Play-in yeni hesablar üçün 14 günlük qapalı test tələbi də plana daxil edilməlidir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tətbiq hazır olandan sonra hansı xərclər qalır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Server, Apple developer hesabının illik haqqı, SMS və xəritə kimi xidmətlər, həmçinin texniki dəstək və yeniləmələr. Dəstək adətən ildə hazırlanma xərcinin 15–20%-i qədər olur.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Mobil tətbiqin qiyməti ekran sayından çox, arxasındakı sistemdən asılıdır: backend, admin panel, ödəniş, inteqrasiyalar. Büdcəni düzgün planlamaq üçün hazırlanma, mağaza haqları və illik dəstəyi birlikdə hesablayın, ilk versiyanı isə MVP kimi sadə saxlayın.</p>
<p><strong>Biznesiniz üçün mobil tətbiq və ya PWA planlaşdırırsınızsa, <a href="/elaqe">bizə yazın</a></strong>. Funksiyalar siyahısına əsasən qiymət və müddəti dəqiqləşdirək. Əlaqəli: <a href="/blog-details/onlayn-rezervasiya-novbe-sistemi-2026">onlayn rezervasiya sistemi</a>, <a href="/blog-details/b2b-sifaris-portali-diler-distributor-2026">B2B sifariş portalı</a>, <a href="/xidmetler">xidmətlərimiz</a>.</p>
<p><small><em>Qiymətlər Azərbaycan bazarı üzrə təxmini diapazonlardır (Oktyabr 2026). Mağaza haqları və qaydaları Apple (developer.apple.com) və Google Play (support.google.com) rəsmi səhifələrinə əsaslanır və dəyişə bilər.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>The honest answer to "we need a mobile app, how much will it cost?" is "it depends on what it does". That answer does not help you plan a budget, though. This article covers approximate 2027 prices for mobile app development in Azerbaijan, what drives the price up, the official App Store and Google Play requirements and the costs that continue after the first year.</p>
<p>First, a question: do you really need an app? Sometimes a mobile website or PWA does the same job for less. We compare the options in <a href="/blog-details/mobile-app-vs-mobile-website-2026">mobile app vs mobile website</a>. This article is for businesses that have already decided on an app.</p>

<h2>Short Answer: Mobile App Prices 2027</h2>
<p>The figures below are <strong>approximate</strong> ranges on the Azerbaijani market for iOS + Android (from one codebase). The exact price depends on the feature list and design.</p>
<table>
  <thead>
    <tr><th>Type</th><th>Price (AZN)</th><th>Timeline</th><th>Example</th></tr>
  </thead>
  <tbody>
    <tr><td>PWA / app-like mobile website</td><td>1,500 – 5,000</td><td>3 – 6 weeks</td><td>Menu, catalogue, bookings</td></tr>
    <tr><td>Simple app</td><td>4,000 – 10,000</td><td>1 – 2 months</td><td>Catalogue, contact, notifications, simple admin panel</td></tr>
    <tr><td>Mid-level app</td><td>10,000 – 25,000</td><td>2 – 4 months</td><td>Sign-up, ordering, online payment, loyalty, admin panel</td></tr>
    <tr><td>Complex platform</td><td>25,000 – 60,000+</td><td>4 – 9 months</td><td>Marketplace, delivery, courier and customer apps, live map</td></tr>
  </tbody>
</table>
<p>These prices usually include the app itself, the server side (backend), an admin panel and store publishing. Support and hosting are charged separately (see below).</p>

<h2>What Drives the Price Up?</h2>
<ul>
  <li><strong>Platform approach:</strong> with Flutter or React Native, one codebase serves both iOS and Android. Two separate native apps cost roughly twice as much.</li>
  <li><strong>User roles:</strong> a customer app alone is one thing; customer + courier + restaurant/shop apps are a different scale.</li>
  <li><strong>Online payment:</strong> bank payment gateway integration, refunds, payment statuses.</li>
  <li><strong>Maps and real time:</strong> live courier location, routing, distance-based pricing.</li>
  <li><strong>Integrations:</strong> POS, 1C, inventory, CRM, SMS verification codes.</li>
  <li><strong>Admin panel and reports:</strong> often as much work as the app itself.</li>
  <li><strong>Custom design and animations:</strong> cost more than ready-made components.</li>
</ul>

<h2>App Store and Google Play: Official Requirements and Fees</h2>
<table>
  <thead>
    <tr><th></th><th>Apple App Store</th><th>Google Play</th></tr>
  </thead>
  <tbody>
    <tr><td>Developer account</td><td>USD 99 per year (Apple Developer Program)</td><td>One-time USD 25</td></tr>
    <tr><td>Review</td><td>Every version goes through Apple's App Review</td><td>New personal accounts: at least 12 testers in closed testing for 14 consecutive days</td></tr>
    <tr><td>Account owner</td><td>Should be the company's own account</td><td>Should be the company's own account</td></tr>
  </tbody>
</table>
<p><strong>Good news on commission:</strong> under guideline 3.1.3(e) of Apple's App Review Guidelines, if an app sells physical goods or services consumed outside the app (food orders, shop products, taxi rides, salon services), payment must be collected with methods other than in-app purchase, such as Apple Pay or card entry. So orders in a restaurant or shop app are not subject to the App Store's digital goods commission. Apps selling digital content (subscriptions, online courses, in-game currency) are treated differently.</p>
<p><strong>Important:</strong> developer accounts should be opened in the company's own name. If the account belongs to the developer, moving the app to another team later becomes difficult.</p>

<h2>Development Stages</h2>
<ol>
  <li><strong>Brief and requirements.</strong> Who will use it, what problem it solves, which features are essential in version one. See <a href="/blog-details/how-to-write-project-brief-2026">how to write a brief</a>.</li>
  <li><strong>Prototype and UX.</strong> Screen flow and user journey (e.g. product → cart → payment).</li>
  <li><strong>UI design.</strong> On-brand screens with sizes checked for iOS and Android.</li>
  <li><strong>Backend and admin panel.</strong> Server, database, API, management panel.</li>
  <li><strong>Mobile app.</strong> Screens, API connection, notifications, payment.</li>
  <li><strong>Testing.</strong> On real devices, on weak connections, on different screen sizes; Google Play's closed testing requirement also falls here.</li>
  <li><strong>Store publishing.</strong> Screenshots, description, privacy policy, passing review.</li>
</ol>

<h2>Costs After the First Year</h2>
<p>Development is only part of the cost. Include these in your budget:</p>
<table>
  <thead>
    <tr><th>Cost</th><th>Approximate</th></tr>
  </thead>
  <tbody>
    <tr><td>Server / hosting</td><td>AZN 20 – 200 per month (depends on load)</td></tr>
    <tr><td>Apple developer account</td><td>USD 99 per year</td></tr>
    <tr><td>SMS, maps API, notification services</td><td>pay as you go</td></tr>
    <tr><td>Technical support and updates</td><td>typically 15–20% of development cost per year</td></tr>
  </tbody>
</table>
<p>Updates are not optional: Apple and Google release new OS versions every year, and the stores require apps to keep up with new requirements. An app left without updates for a long time can break on new phones or become hard to find in the store.</p>

<h2>Saving Budget: The MVP Approach</h2>
<p>Instead of building everything at once, launch a first version (MVP) with the essential features:</p>
<ul>
  <li>keep only the core user journey in version one (e.g. ordering and payment);</li>
  <li>add loyalty, referrals and chat later based on user feedback;</li>
  <li>keep the admin panel simple at first;</li>
  <li>testing demand with a PWA before the app is another option.</li>
</ul>
<p>This lowers the initial budget and lets you spend on the features users actually use.</p>

<h2>8 Questions to Ask a Developer</h2>
<ol>
  <li>Which technology will be used (Flutter, React Native, native) and why?</li>
  <li>Are the backend and admin panel included in the price?</li>
  <li>Will the source code and all accounts (App Store, Google Play, server) be in my name?</li>
  <li>Who is responsible for store publishing and passing review?</li>
  <li>How long is the warranty, and are bugs fixed free during it?</li>
  <li>How much will support and updates cost per month?</li>
  <li>Does the portfolio include apps published in the stores?</li>
  <li>Is payment split into stages, and what is delivered at each?</li>
</ol>
<p>For general ordering questions, see our <a href="/blog-details/12-questions-before-building-website-2026">12 questions before ordering</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does it cost to build a mobile app in Azerbaijan?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Approximate market ranges: a simple app AZN 4,000–10,000, a mid-level app with ordering and online payment AZN 10,000–25,000, a complex platform AZN 25,000 and up. A PWA can cost AZN 1,500–5,000.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does it cost to publish on the App Store and Google Play?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The Apple Developer Program is USD 99 per year, and a Google Play developer account is a one-time USD 25. Both accounts should be in the company's own name.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does the App Store take a commission on orders in a restaurant or shop app?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Under Apple's guideline 3.1.3(e), physical goods and services consumed outside the app must be paid with methods other than in-app purchase, such as Apple Pay or card. So these orders are not subject to the digital goods commission.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to build a mobile app?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A simple app takes 1–2 months, a mid-level app 2–4 months, a complex platform 4–9 months. Store reviews and Google Play's 14-day closed testing requirement for new accounts should be included in the plan.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What costs remain after the app is built?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Server costs, the annual Apple developer fee, services such as SMS and maps, plus technical support and updates, which typically cost 15–20% of the development cost per year.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>The cost of a mobile app depends less on the number of screens than on the system behind it: backend, admin panel, payments, integrations. To plan the budget properly, count development, store fees and annual support together, and keep the first version simple as an MVP.</p>
<p><strong>Planning a mobile app or PWA for your business? <a href="/contact">Write to us</a></strong> and we will confirm price and timeline based on your feature list. Related: <a href="/blog-details/online-booking-system-salon-clinic-2026">online booking system</a>, <a href="/blog-details/b2b-ordering-portal-dealers-distributors-2026">B2B ordering portal</a>, <a href="/services">our services</a>.</p>
<p><small><em>Prices are approximate ranges for the Azerbaijani market (October 2026). Store fees and rules are based on official Apple (developer.apple.com) and Google Play (support.google.com) pages and may change.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Честный ответ на вопрос «нам нужно мобильное приложение, сколько это стоит?» — «зависит от того, что оно будет делать». Но такой ответ не помогает планировать бюджет. В статье разбираем ориентировочные цены на разработку мобильного приложения в Азербайджане на 2027 год, что увеличивает стоимость, официальные требования App Store и Google Play и расходы после первого года.</p>
<p>Сначала вопрос: действительно ли нужно приложение? Иногда мобильный сайт или PWA решает ту же задачу дешевле. Подробное сравнение — в статье <a href="/blog-details/mobilnoe-prilozhenie-ili-sajt-2026">мобильное приложение или сайт</a>. Эта статья — для бизнеса, который уже выбрал приложение.</p>

<h2>Коротко: цены на мобильное приложение 2027</h2>
<p>Ниже — <strong>ориентировочные</strong> диапазоны рынка Азербайджана для iOS + Android (на одной кодовой базе). Точная цена зависит от списка функций и дизайна.</p>
<table>
  <thead>
    <tr><th>Тип</th><th>Цена (AZN)</th><th>Срок</th><th>Пример</th></tr>
  </thead>
  <tbody>
    <tr><td>PWA / мобильный сайт как приложение</td><td>1 500 – 5 000</td><td>3 – 6 недель</td><td>Меню, каталог, запись</td></tr>
    <tr><td>Простое приложение</td><td>4 000 – 10 000</td><td>1 – 2 месяца</td><td>Каталог, контакты, уведомления, простая админ-панель</td></tr>
    <tr><td>Среднее приложение</td><td>10 000 – 25 000</td><td>2 – 4 месяца</td><td>Регистрация, заказы, онлайн-оплата, бонусы, админ-панель</td></tr>
    <tr><td>Сложная платформа</td><td>25 000 – 60 000+</td><td>4 – 9 месяцев</td><td>Маркетплейс, доставка, приложения курьера и клиента, карта в реальном времени</td></tr>
  </tbody>
</table>
<p>В эти цены обычно входят само приложение, серверная часть (backend), админ-панель и публикация в магазинах. Поддержка и хостинг считаются отдельно (ниже).</p>

<h2>Что увеличивает цену?</h2>
<ul>
  <li><strong>Подход к платформам:</strong> с Flutter или React Native одна кодовая база работает и на iOS, и на Android. Два отдельных нативных приложения стоят примерно вдвое дороже.</li>
  <li><strong>Роли пользователей:</strong> только клиентское приложение — одно; клиент + курьер + ресторан/магазин — совсем другой объём.</li>
  <li><strong>Онлайн-оплата:</strong> интеграция с банковским платёжным шлюзом, возвраты, статусы платежей.</li>
  <li><strong>Карты и реальное время:</strong> местоположение курьера онлайн, маршруты, цена по расстоянию.</li>
  <li><strong>Интеграции:</strong> POS, 1С, склад, CRM, SMS-код подтверждения.</li>
  <li><strong>Админ-панель и отчёты:</strong> часто требуют столько же работы, сколько само приложение.</li>
  <li><strong>Индивидуальный дизайн и анимации:</strong> дороже готовых компонентов.</li>
</ul>

<h2>App Store и Google Play: официальные требования и сборы</h2>
<table>
  <thead>
    <tr><th></th><th>Apple App Store</th><th>Google Play</th></tr>
  </thead>
  <tbody>
    <tr><td>Аккаунт разработчика</td><td>99 USD в год (Apple Developer Program)</td><td>Единоразово 25 USD</td></tr>
    <tr><td>Проверка</td><td>Каждая версия проходит App Review Apple</td><td>Для новых личных аккаунтов: минимум 12 тестировщиков, закрытое тестирование 14 дней подряд</td></tr>
    <tr><td>Владелец</td><td>Должен быть аккаунт самой компании</td><td>Должен быть аккаунт самой компании</td></tr>
  </tbody>
</table>
<p><strong>Хорошая новость о комиссии:</strong> согласно пункту 3.1.3(e) правил App Review Apple, если приложение продаёт физические товары или услуги, потребляемые вне приложения (заказ еды, товары магазина, такси, услуги салона), оплата должна приниматься не через встроенные покупки, а другими способами — Apple Pay или картой. Поэтому с заказов в приложении ресторана или магазина комиссия App Store на цифровые товары не берётся. Для приложений с цифровым контентом (подписки, онлайн-курсы, игровая валюта) правила другие.</p>
<p><strong>Важно:</strong> аккаунты разработчика нужно открывать на компанию. Если аккаунт принадлежит подрядчику, позже перенести приложение к другой команде будет сложно.</p>

<h2>Этапы разработки</h2>
<ol>
  <li><strong>Бриф и требования.</strong> Кто будет пользоваться, какую проблему решает, какие функции обязательны в первой версии. См. <a href="/blog-details/kak-zapolnit-brif-2026">как заполнить бриф</a>.</li>
  <li><strong>Прототип и UX.</strong> Схема экранов и путь пользователя (например, товар → корзина → оплата).</li>
  <li><strong>UI-дизайн.</strong> Экраны в стиле бренда с размерами, проверенными для iOS и Android.</li>
  <li><strong>Backend и админ-панель.</strong> Сервер, база данных, API, панель управления.</li>
  <li><strong>Мобильное приложение.</strong> Экраны, связь с API, уведомления, оплата.</li>
  <li><strong>Тестирование.</strong> На реальных устройствах, при слабом интернете, на разных экранах; здесь же — закрытое тестирование Google Play.</li>
  <li><strong>Публикация в магазинах.</strong> Скриншоты, описание, политика конфиденциальности, прохождение проверки.</li>
</ol>

<h2>Расходы после первого года</h2>
<p>Разработка — только часть затрат. Включите в бюджет и это:</p>
<table>
  <thead>
    <tr><th>Расход</th><th>Ориентировочно</th></tr>
  </thead>
  <tbody>
    <tr><td>Сервер / хостинг</td><td>20 – 200 AZN в месяц (зависит от нагрузки)</td></tr>
    <tr><td>Аккаунт разработчика Apple</td><td>99 USD в год</td></tr>
    <tr><td>SMS, API карт, сервисы уведомлений</td><td>по факту использования</td></tr>
    <tr><td>Техподдержка и обновления</td><td>обычно 15–20% стоимости разработки в год</td></tr>
  </tbody>
</table>
<p>Обновления не опциональны: Apple и Google каждый год выпускают новые версии ОС, и магазины требуют, чтобы приложения соответствовали новым требованиям. Приложение без обновлений может перестать нормально работать на новых телефонах или затеряться в магазине.</p>

<h2>Как сэкономить: подход MVP</h2>
<p>Вместо того чтобы делать всё сразу, выпустите первую версию (MVP) с главными функциями:</p>
<ul>
  <li>в первой версии — только основной путь пользователя (например, заказ и оплата);</li>
  <li>бонусы, рефералы, чат добавляйте позже по отзывам пользователей;</li>
  <li>админ-панель сначала держите простой;</li>
  <li>проверить спрос с помощью PWA до приложения — тоже вариант.</li>
</ul>
<p>Так снижается стартовый бюджет, а деньги идут на функции, которыми действительно пользуются.</p>

<h2>8 вопросов разработчику</h2>
<ol>
  <li>На какой технологии будет написано (Flutter, React Native, нативно) и почему?</li>
  <li>Входят ли в цену backend и админ-панель?</li>
  <li>Будут ли исходный код и все аккаунты (App Store, Google Play, сервер) оформлены на меня?</li>
  <li>Кто отвечает за публикацию в магазинах и прохождение проверки?</li>
  <li>Какой гарантийный срок, и исправляются ли ошибки бесплатно в этот период?</li>
  <li>Сколько в месяц будут стоить поддержка и обновления?</li>
  <li>Есть ли в портфолио приложения, опубликованные в магазинах?</li>
  <li>Оплата поэтапная, и что сдаётся на каждом этапе?</li>
</ol>
<p>Общие вопросы перед заказом — в статье <a href="/blog-details/12-voprosov-pered-sozdaniem-sajta-2026">12 вопросов перед заказом</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит разработка мобильного приложения в Азербайджане?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ориентировочно по рынку: простое приложение 4 000–10 000 AZN, среднее с заказами и онлайн-оплатой 10 000–25 000 AZN, сложная платформа от 25 000 AZN. PWA может стоить 1 500–5 000 AZN.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит публикация в App Store и Google Play?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Apple Developer Program — 99 USD в год, аккаунт разработчика Google Play — единоразово 25 USD. Оба аккаунта должны быть оформлены на компанию.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Берёт ли App Store комиссию с заказов в приложении ресторана или магазина?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">По правилу Apple 3.1.3(e) физические товары и услуги, потребляемые вне приложения, оплачиваются не встроенными покупками, а другими способами, например Apple Pay или картой. Поэтому комиссия на цифровые товары к таким заказам не применяется.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает разработка приложения?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Простое приложение — 1–2 месяца, среднее — 2–4 месяца, сложная платформа — 4–9 месяцев. В план нужно включить проверку в магазинах и 14-дневное закрытое тестирование Google Play для новых аккаунтов.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какие расходы остаются после запуска?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сервер, годовой взнос Apple, сервисы SMS и карт, а также техподдержка и обновления — обычно 15–20% стоимости разработки в год.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Стоимость мобильного приложения зависит не столько от числа экранов, сколько от системы за ними: backend, админ-панель, оплата, интеграции. Чтобы правильно спланировать бюджет, считайте вместе разработку, сборы магазинов и годовую поддержку, а первую версию делайте простой, как MVP.</p>
<p><strong>Планируете мобильное приложение или PWA для бизнеса? <a href="/kontakty">Напишите нам</a></strong> — уточним цену и сроки по списку функций. По теме: <a href="/blog-details/sistema-onlajn-zapisi-salon-klinika-2026">система онлайн-записи</a>, <a href="/blog-details/b2b-portal-zakazov-dlya-dilerov-2026">B2B-портал заказов</a>, <a href="/uslugi">наши услуги</a>.</p>
<p><small><em>Цены — ориентировочные диапазоны рынка Азербайджана (октябрь 2026). Сборы и правила магазинов основаны на официальных страницах Apple (developer.apple.com) и Google Play (support.google.com) и могут меняться.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'mobil-tetbiq-qiymeti-2027'],
            [
                'slug_en' => 'mobile-app-development-cost-azerbaijan-2027',
                'slug_ru' => 'stoimost-mobilnogo-prilozheniya-azerbaydzhan-2027',

                'title_az' => 'Mobil Tətbiq Qiyməti Azərbaycanda 2027: Hazırlanma, App Store Haqları və İllik Xərclər',
                'title_en' => 'Mobile App Development Cost in Azerbaijan 2027: Build Price, Store Fees and Annual Costs',
                'title_ru' => 'Стоимость мобильного приложения в Азербайджане 2027: разработка, сборы магазинов и годовые расходы',

                'review_az' => 'Mobil tətbiq neçəyə hazırlanır? 2027 təxmini qiymətləri (4 000–60 000+ AZN), qiyməti artıran amillər, App Store (99 USD/il) və Google Play (25 USD) tələbləri, komissiya qaydası və ilk ildən sonrakı xərclər.',
                'review_en' => 'How much does a mobile app cost? 2027 estimates (AZN 4,000–60,000+), what drives the price, App Store (USD 99/year) and Google Play (USD 25) requirements, the commission rule and post-launch costs.',
                'review_ru' => 'Сколько стоит мобильное приложение? Оценки 2027 (4 000–60 000+ AZN), что влияет на цену, требования App Store (99 USD/год) и Google Play (25 USD), правило комиссии и расходы после запуска.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '23 Oktyabr 2026',
                'date_en' => 'October 23, 2026',
                'date_ru' => '23 Октября 2026',

                'photo'    => 'cover-mobile-app-cost-az.png',
                'photo_en' => 'cover-mobile-app-cost-en.png',
                'photo_ru' => 'cover-mobile-app-cost-ru.png',

                'meta_title_az' => 'Mobil Tətbiq Qiyməti Azərbaycanda 2027 | RS Code',
                'meta_title_en' => 'Mobile App Development Cost in Azerbaijan 2027 | RS Code',
                'meta_title_ru' => 'Стоимость мобильного приложения в Азербайджане 2027 | RS Code',

                'meta_description_az' => 'Mobil tətbiq hazırlamaq neçəyə başa gəlir? 2027 qiymətləri 4 000–60 000+ AZN, App Store 99 USD/il, Google Play 25 USD, komissiya qaydası, müddətlər və illik dəstək xərcləri.',
                'meta_description_en' => 'How much does it cost to build a mobile app in Azerbaijan? 2027 prices AZN 4,000–60,000+, App Store USD 99/year, Google Play USD 25, commission rules, timelines and support costs.',
                'meta_description_ru' => 'Сколько стоит разработка мобильного приложения в Азербайджане? Цены 2027: 4 000–60 000+ AZN, App Store 99 USD/год, Google Play 25 USD, комиссии, сроки и поддержка.',

                'meta_keywords_az' => 'mobil tətbiq qiyməti, mobil tətbiq hazırlanması, app store, google play, flutter, tətbiq sifarişi bakı, mobil tətbiq 2027',
                'meta_keywords_en' => 'mobile app development cost azerbaijan, app development baku, app store fee, google play fee, flutter, mobile app 2027',
                'meta_keywords_ru' => 'стоимость мобильного приложения, разработка приложений баку, app store, google play, flutter, мобильное приложение 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
