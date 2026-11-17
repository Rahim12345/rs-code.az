<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #17 "Veb sayt qiyməti Azərbaycanda" — 2027 yenilənməsi (eyni DB sətri, yeni slug-lar, köhnələrdən 301 routes/web.php-də).
 * Qiymət aralıqları resources/lang/*\/development.php x_prices ilə EYNİDİR (xidmət səhifəsi ilə ziddiyyət olmasın).
 * "Daxildir" iddiaları development.php x_faq-dan: domen alınması, hostinq, SSL, korporativ e-poçt quraşdırılması, idarə paneli, texniki SEO.
 * 40/40/20 ödəniş modeli köhnə #17-də dərc olunmuşdu. Backup: storage/app/blog17-pre2027-backup.json (ilk işləmədə).
 */
class Blog17WebsiteCost2027Seeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Biznesiniz üçün sayt açmaq qərarına gələndə ilk sual adətən eyni olur: "Bu neçəyə başa gələcək?" İnternetdə 150 ₼-lik "hazır sayt" elanlarını da, 10.000 ₼-lik layihələri də görürsünüz və hansının sizə uyğun olduğunu anlamaq çətinləşir. Səbəb odur ki, "sayt" sözü bir səhifəlik müraciət formasından tutmuş yüzlərlə məhsulu və onlayn ödənişi olan mağazaya qədər çox fərqli işləri ifadə edir.</p>
<p>Bu bələdçidə 2027-ci il üçün Azərbaycanda veb sayt qiymətlərini sayt növlərinə görə cədvəldə topladıq. Qiyməti hansı amillərin dəyişdiyini, illik xərcləri, üç real ssenari üzrə təxmini hesablamanı və büdcəni keyfiyyəti itirmədən necə azaltmağın yollarını izah edirik. Rəqəmlər RS Code-un <a href="/veb-saytlarin-hazirlanmasi">veb sayt hazırlanması</a> səhifəsindəki qiymətlərlə eynidir.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Sayt neçəyə başa gəlir?</td><td>Landing page 300–700 ₼, vizit kart sayt 500–1.200 ₼, korporativ sayt 1.200–3.500 ₼, onlayn mağaza 2.000–6.000 ₼, fərdi platforma 5.000 ₼-dən</td></tr>
    <tr><td>Neçə günə hazır olur?</td><td>Landing page 5–10 gün, vizit kart sayt 1–2 həftə, korporativ sayt 2–4 həftə, onlayn mağaza 3–6 həftə</td></tr>
    <tr><td>İllik əlavə xərclər</td><td>Domen təxminən 20–60 ₼, hostinq 70–250 ₼, korporativ e-poçt (ayrıca xidmətdirsə) 50–120 ₼</td></tr>
    <tr><td>Qiyməti nə dəyişir?</td><td>Sayt növü, fərdi dizayn, dil sayı (hər əlavə dil təxminən +15–25%), funksiyalar, məzmun, SEO və dəstək</td></tr>
  </tbody>
</table>

<h2>2027 Veb Sayt Qiymətləri: Sayt Növlərinə Görə</h2>
<table>
  <thead>
    <tr><th>Sayt növü</th><th>Qiymət (₼)</th><th>Müddət</th><th>Kimə uyğundur</th></tr>
  </thead>
  <tbody>
    <tr><td>Landing page</td><td>300 – 700</td><td>5–10 gün</td><td>Bir xidmət və ya kampaniya üçün müraciət toplamaq</td></tr>
    <tr><td>Vizit kart sayt</td><td>500 – 1.200</td><td>1–2 həftə</td><td>Kiçik biznes: xidmətlər, əlaqə, xəritə</td></tr>
    <tr><td>Korporativ sayt</td><td>1.200 – 3.500</td><td>2–4 həftə</td><td>Xidmət səhifələri, layihələr, bloq, bir neçə dil</td></tr>
    <tr><td>Onlayn mağaza</td><td>2.000 – 6.000</td><td>3–6 həftə</td><td>Kataloq, səbət, onlayn ödəniş, sifariş idarəsi</td></tr>
    <tr><td>Fərdi platforma</td><td>5.000+</td><td>Layihəyə görə</td><td>CRM, POS, LMS, portal və inteqrasiyalar</td></tr>
  </tbody>
</table>
<p>Qiymətlər təxminidir. Dəqiq məbləğ səhifə və dil sayından, dizayndan, funksiyalardan və məzmunu kimin hazırlayacağından asılıdır. Hər sayt növünü qısaca izah edək:</p>
<ul>
  <li><strong>Landing page</strong> bir məqsədə xidmət edən tək səhifədir: reklamdan gələn ziyarətçini müraciətə çevirmək. Ətraflı: <a href="/blog-details/landing-page-nedir-2026">landing page nədir və nə vaxt lazımdır</a>.</li>
  <li><strong>Vizit kart sayt</strong> 3–6 səhifədən ibarətdir: haqqımızda, xidmətlər, qiymətlər, əlaqə və xəritə. Usta, salon, kiçik ofis üçün kifayətdir.</li>
  <li><strong>Korporativ sayt</strong> hər xidmətin ayrıca səhifəsi, layihələr, komanda, bloq və adətən 2–3 dil deməkdir. Google-dan müştəri gətirmək üçün ən çox seçilən növdür.</li>
  <li><strong>Onlayn mağaza</strong> kataloq, filtr, səbət, onlayn ödəniş, sifarişlərin və qalıqların idarəsini əhatə edir. Ətraflı: <a href="/blog-details/onlayn-magaza-nece-acilir-2026">onlayn mağaza necə açılır</a>.</li>
  <li><strong>Fərdi platforma</strong> şəxsi kabinetlər, rezervasiya, CRM, POS, kurs platforması və ya xarici sistemlərlə inteqrasiya kimi xüsusi məntiq tələb edən layihədir.</li>
</ul>

<h2>Sayt Qiymətini Müəyyən Edən 8 Amil</h2>
<p>Eyni sayt üçün iki studiyanın fərqli qiymət verməsi adi haldır, çünki qiymət bir neçə amilin cəmidir.</p>

<h3>1. Sayt növü və səhifə sayı</h3>
<p>Hər yeni səhifə şablonu dizayn, proqramlaşdırma və test deməkdir. 10 eyni tipli xidmət səhifəsi bir şablonla həll olunur, amma 10 fərqli quruluşlu səhifə xeyli çox iş tələb edir.</p>

<h3>2. Dizayn: şablon, yoxsa fərdi</h3>
<p>Hazır şablon ucuz və sürətlidir, amma sayt rəqiblərinizin saytlarına bənzəyə bilər. Fərdi dizayn brendinizə uyğun hazırlanır, mobil və kompüter üçün ayrıca maket çəkilir, buna görə də daha baha başa gəlir.</p>

<h3>3. Texnologiya: konstruktor, WordPress, yoxsa sifarişlə</h3>
<p>Konstruktorda (Wix, Tilda) hazırlanma ucuzdur, amma aylıq abunə ödəyirsiniz və platformaya bağlı qalırsınız. WordPress orta seçimdir. Sifarişlə hazırlanan sayt (məsələn, Laravel ilə) ən çevikdir və xüsusi funksiyalar üçün uyğundur. Müqayisə: <a href="/blog-details/wix-tilda-wordpress-vs-sifarisle-sayt-2026">Wix, Tilda, WordPress, yoxsa sifarişlə sayt?</a> və <a href="/blog-details/laravel-yoxsa-wordpress-2026">Laravel, yoxsa WordPress?</a></p>

<h3>4. Dil sayı</h3>
<p>Azərbaycanda saytlar çox vaxt iki və ya üç dildə (AZ, RU, EN) olur. Hər əlavə dil qiyməti təxminən 15–25% artırır: tərcümə, hər dil üçün ayrıca URL, meta məlumatlar və hreflang teqləri lazımdır.</p>

<h3>5. Funksiyalar</h3>
<p>Müraciət forması, WhatsApp düyməsi və xəritə sadə funksiyalardır. Onlayn ödəniş, rezervasiya, şəxsi kabinet, filtrli kataloq, kalkulyator, CRM və ya POS ilə inteqrasiya isə qiymətə ciddi təsir edir.</p>

<h3>6. Məzmun: mətn və şəkillər</h3>
<p>Mətnləri və şəkilləri siz verəndə xərc azalır. SEO üçün mətnlərin yazılması, peşəkar foto və ya video çəkilişi ayrıca hesablanır. Məzmunun gecikməsi isə müddəti uzadan ən çox rast gəlinən səbəbdir.</p>

<h3>7. SEO</h3>
<p>Texniki SEO (sürət, mobil uyğunluq, meta başlıqlar, sitemap, strukturlaşdırılmış məlumat) sayt hazırlanarkən qurulmalıdır. Rəqabətli sorğularda yuxarı çıxmaq üçün davamlı iş (məzmun, backlink) ayrıca <a href="/seo-xidmeti">SEO xidməti</a>dir.</p>

<h3>8. Təhvildən sonrakı dəstək</h3>
<p>Sayt təhvil veriləndən sonra yeniləmələr, təhlükəsizlik və kiçik dəyişikliklər lazım olur. Bəzi studiyalar zəmanət müddətini qiymətə daxil edir, bəziləri aylıq dəstək paketi təklif edir.</p>

<h2>Nümunə Hesablamalar: 3 Real Ssenari</h2>
<p>Aşağıdakı rəqəmlər təxmini nümunələrdir və yuxarıdakı cədvəldəki aralıqlara əsaslanır.</p>
<table>
  <thead>
    <tr><th>Ssenari</th><th>Nə lazımdır</th><th>Təxmini qiymət</th></tr>
  </thead>
  <tbody>
    <tr><td>Kafe, Bakı</td><td>Vizit kart sayt: menyu, foto qalereya, xəritə, WhatsApp ilə rezervasiya, 2 dil</td><td>700 – 1.200 ₼</td></tr>
    <tr><td>Stomatologiya klinikası</td><td>Korporativ sayt: 8 xidmət səhifəsi, həkim profilləri, qiymətlər, onlayn növbə forması, bloq, 3 dil</td><td>2.000 – 3.500 ₼</td></tr>
    <tr><td>Geyim mağazası, 300 məhsul</td><td>Onlayn mağaza: ölçü və rəng seçimi, filtr, səbət, onlayn ödəniş, sifariş paneli, 2 dil</td><td>3.500 – 6.000 ₼</td></tr>
  </tbody>
</table>
<p>Sahəyə uyğun bələdçilər: <a href="/blog-details/restoran-kafe-ucun-sayt-2027">restoran və kafe üçün sayt</a>, <a href="/blog-details/klinika-tibb-merkezi-ucun-sayt-2027">klinika üçün sayt</a>, <a href="/blog-details/tikinti-techizat-sirketi-ucun-sayt-2027">tikinti şirkəti üçün sayt</a>.</p>

<h2>İllik Xərclər: Saytın Hazırlanmasından Sonra Nə Ödəyəcəksiniz</h2>
<table>
  <thead>
    <tr><th>Xərc</th><th>Təxmini illik məbləğ</th><th>Qeyd</th></tr>
  </thead>
  <tbody>
    <tr><td>Domen (.az, .com)</td><td>20 – 60 ₼</td><td>Hər il yenilənir. Domen sizin adınıza qeydiyyatdan keçməlidir</td></tr>
    <tr><td>Hostinq</td><td>70 – 250 ₼</td><td>Saytın həcmi və trafikinə görə dəyişir</td></tr>
    <tr><td>SSL sertifikatı</td><td>Çox vaxt 0 ₼</td><td>Let's Encrypt kimi pulsuz sertifikatlar kifayətdir</td></tr>
    <tr><td>Korporativ e-poçt</td><td>0 – 120 ₼</td><td>Hostinqə daxil ola bilər və ya Google Workspace kimi ayrıca xidmət olur</td></tr>
    <tr><td>Texniki dəstək</td><td>Razılaşmaya görə</td><td>Aylıq paket və ya hər iş üçün ayrıca ödəniş</td></tr>
  </tbody>
</table>
<p>Yəni 1.500 ₼-lik korporativ saytın üç illik ümumi xərci təxminən 1.800–2.400 ₼ olur. Konstruktorlarda isə hazırlanma ucuz olsa da, aylıq abunə illər ərzində bu fərqi bağlaya bilər. Domen haqqında: <a href="/domen-nedir">domen nədir və necə seçilir</a>. E-poçt variantları: <a href="/korporativ-email">korporativ e-poçt</a>.</p>

<h2>Ucuz Sayt Niyə Baha Başa Gələ Bilər</h2>
<p>100–300 ₼-lik təkliflər adətən hazır şablona loqo və mətn qoymaqdan ibarətdir. Bu, müvəqqəti həll kimi işləyə bilər, amma tez-tez rast gəlinən problemlər var:</p>
<ul>
  <li>Domen icraçının adına qeydiyyatdan keçir və sayt faktiki olaraq sizə məxsus olmur.</li>
  <li>İdarə paneli olmur, hər dəyişiklik üçün icraçıya yazmalı olursunuz.</li>
  <li>Sayt telefonda yavaş açılır və Google-un <a href="/blog-details/sayt-sureti-core-web-vitals-2026">Core Web Vitals</a> göstəricilərindən keçmir.</li>
  <li>Meta başlıqlar, sitemap və strukturlaşdırılmış məlumat olmur, sayt Google-da görünmür.</li>
  <li>Yeniləmələr edilmir və sayt bir-iki il sonra təhlükəsizlik problemi yaradır.</li>
</ul>
<p>Təklifləri müqayisə edərkən yalnız rəqəmə yox, nəyin daxil olduğuna baxın. Bunun üçün studiyaya verilməli suallar: <a href="/blog-details/sayt-sifarisinden-evvel-15-sual-2027">sayt sifarişindən əvvəl 15 sual</a>.</p>

<h2>Büdcəni Keyfiyyəti İtirmədən Necə Azaltmaq Olar</h2>
<ul>
  <li><strong>Mərhələlərlə başlayın.</strong> Əvvəlcə əsas səhifələrlə saytı işə salın, bloq, əlavə dil və ya onlayn ödənişi sonrakı mərhələyə saxlayın.</li>
  <li><strong>Bir dillə başlayın.</strong> Müştərilərinizin əksəriyyəti bir dildə axtarırsa, ikinci dili sonra əlavə edin.</li>
  <li><strong>Məzmunu özünüz hazırlayın.</strong> Xidmətlərin təsvirini, qiymətləri və şəkilləri vaxtında verin.</li>
  <li><strong>Brifi əvvəlcədən doldurun.</strong> Aydın tapşırıq düzəlişlərin sayını azaldır: <a href="/blog-details/brif-nece-doldurulur-2026">brif necə doldurulur</a>.</li>
  <li><strong>Reklam üçün landing page-dən başlayın.</strong> Bir xidmət üçün müraciət toplamaq istəyirsinizsə, tam korporativ sayt şərt deyil.</li>
  <li><strong>Instagram-dakı auditoriyanı sayta yönləndirin.</strong> Ətraflı: <a href="/blog-details/instagram-magaza-ve-sayt-2026">Instagram mağazası varkən sayt lazımdırmı?</a></li>
</ul>

<h2>RS Code-da Sayt Qiymətinə Nə Daxildir</h2>
<ul>
  <li>Domenin alınması, hostinq, SSL sertifikatı və domenə bağlı korporativ e-poçtun qurulması. Növbəti illərdə domen və hostinqin yenilənməsi ayrıca illik xərcdir.</li>
  <li>Hər sayt üçün idarə paneli: mətn, şəkil, xəbər və məhsulları özünüz dəyişə bilərsiniz.</li>
  <li>Mobil uyğun dizayn və texniki SEO; sayt Google-da qeydiyyatdan keçirilir.</li>
  <li>Mərhələli ödəniş: adətən 40% başlanğıcda, 40% dizayn təsdiqindən sonra, 20% təhvildə.</li>
  <li>Bakıda və bütün Azərbaycanda onlayn iş: görüşlər video zənglə, təsdiqlər yazılı aparılır.</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">2027-ci ildə Azərbaycanda veb sayt neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Landing page 300–700 ₼, vizit kart sayt 500–1.200 ₼, korporativ sayt 1.200–3.500 ₼, onlayn mağaza 2.000–6.000 ₼, fərdi platforma 5.000 ₼-dən başlayır. Dəqiq qiymət səhifə və dil sayından, dizayndan və funksiyalardan asılıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt açmaq üçün ən ucuz variant hansıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bir xidmət üçün müraciət toplamaq istəyirsinizsə, landing page (300–700 ₼). Kiçik biznes üçün isə vizit kart sayt (500–1.200 ₼). Konstruktorlar başlanğıcda ucuzdur, amma aylıq abunə illər ərzində baha başa gələ bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt neçə günə hazır olur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Landing page 5–10 gün, vizit kart sayt 1–2 həftə, korporativ sayt 2–4 həftə, onlayn mağaza 3–6 həftə. Müddətə mətn və şəkillərin vaxtında hazır olması da təsir edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytın hər il nə qədər xərci olur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Domen təxminən 20–60 ₼, hostinq 70–250 ₼. SSL çox vaxt pulsuzdur, korporativ e-poçt hostinqə daxil ola bilər. Texniki dəstək razılaşmaya görə ayrıca ödənilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Əlavə dil qiyməti nə qədər artırır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər əlavə dil təxminən 15–25% artırır. Tərcümə, hər dil üçün ayrıca URL, meta məlumatlar və hreflang teqləri lazımdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO sayt qiymətinə daxildirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Texniki SEO (sürət, mobil uyğunluq, meta başlıqlar, sitemap) sayt hazırlanarkən qurulmalıdır. Rəqabətli sorğularda yuxarı mövqelər üçün davamlı SEO xidməti ayrıca təklif olunur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/sayt-sifarisinden-evvel-15-sual-2027">Sayt sifarişindən əvvəl studiyaya verilməli 15 sual</a></li>
  <li><a href="/blog-details/wix-tilda-wordpress-vs-sifarisle-sayt-2026">Wix, Tilda, WordPress, yoxsa sifarişlə sayt?</a></li>
  <li><a href="/blog-details/landing-page-nedir-2026">Landing page nədir?</a></li>
  <li><a href="/blog-details/onlayn-magaza-nece-acilir-2026">Onlayn mağaza necə açılır?</a></li>
  <li><a href="/blog-details/mobil-tetbiq-qiymeti-2027">Mobil tətbiq qiyməti 2027</a></li>
</ul>

<h2>Nəticə</h2>
<p>2027-ci ildə Azərbaycanda veb sayt qiyməti 300 ₼-lik landing page-dən 5.000 ₼-dən yuxarı fərdi platformaya qədər dəyişir. Fərq bazarın qeyri-şəffaflığından yox, işin həcmindən irəli gəlir. Doğru büdcəni müəyyənləşdirmək üçün əvvəlcə saytın məqsədini, dil sayını və lazım olan funksiyaları dəqiqləşdirin, sonra təklifləri yalnız rəqəmə görə yox, nəyin daxil olduğuna görə müqayisə edin: domen kimin adına olacaq, idarə paneli və texniki SEO varmı, illik xərclər nə qədərdir?</p>
<p><strong>Saytınız üçün dəqiq qiymət öyrənmək istəyirsiniz? <a href="/veb-saytlarin-hazirlanmasi">Veb saytların hazırlanması</a> səhifəmizə baxın</strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>. Qısa brifdən sonra yazılı təklif veririk.</p>
<p><small><em>Qiymətlər noyabr 2026 vəziyyətinə görə təxminidir və layihənin həcmindən asılı olaraq dəyişə bilər.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>When you decide to build a website for your business, the first question is usually the same: "How much will it cost?" Online you will see 150 ₼ "ready-made website" ads alongside 10,000 ₼ projects, and it becomes hard to tell which one suits you. The reason is that the word "website" covers very different jobs, from a one-page lead form to a store with hundreds of products and online payment.</p>
<p>In this guide we have gathered website prices in Azerbaijan for 2027 into a table by website type. We explain which factors change the price, the yearly costs, approximate estimates for three real scenarios, and how to cut the budget without losing quality. The figures match the prices on RS Code's <a href="/website-development">website development</a> page.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>How much does a website cost?</td><td>Landing page 300–700 ₼, business card site 500–1,200 ₼, corporate site 1,200–3,500 ₼, online store 2,000–6,000 ₼, custom platform from 5,000 ₼</td></tr>
    <tr><td>How long does it take?</td><td>Landing page 5–10 days, business card site 1–2 weeks, corporate site 2–4 weeks, online store 3–6 weeks</td></tr>
    <tr><td>Yearly extra costs</td><td>Domain about 20–60 ₼, hosting 70–250 ₼, business email (if a separate service) 50–120 ₼</td></tr>
    <tr><td>What changes the price?</td><td>Website type, custom design, number of languages (each extra language adds about 15–25%), features, content, SEO and support</td></tr>
  </tbody>
</table>

<h2>Website Prices in 2027 by Website Type</h2>
<table>
  <thead>
    <tr><th>Website type</th><th>Price (₼)</th><th>Timeline</th><th>Best for</th></tr>
  </thead>
  <tbody>
    <tr><td>Landing page</td><td>300 – 700</td><td>5–10 days</td><td>Collecting leads for one service or campaign</td></tr>
    <tr><td>Business card site</td><td>500 – 1,200</td><td>1–2 weeks</td><td>Small business: services, contacts, map</td></tr>
    <tr><td>Corporate site</td><td>1,200 – 3,500</td><td>2–4 weeks</td><td>Service pages, projects, blog, several languages</td></tr>
    <tr><td>Online store</td><td>2,000 – 6,000</td><td>3–6 weeks</td><td>Catalogue, cart, online payment, order management</td></tr>
    <tr><td>Custom platform</td><td>5,000+</td><td>Per project</td><td>CRM, POS, LMS, portals and integrations</td></tr>
  </tbody>
</table>
<p>Prices are estimates. The exact amount depends on the number of pages and languages, the design, the features and who prepares the content. Here is a short explanation of each website type:</p>
<ul>
  <li>A <strong>landing page</strong> is a single page with one goal: turning a visitor from an ad into a lead. More details: <a href="/blog-details/what-is-a-landing-page-2026">what a landing page is and when you need one</a>.</li>
  <li>A <strong>business card site</strong> has 3–6 pages: about us, services, prices, contacts and a map. It is enough for a tradesperson, a salon or a small office.</li>
  <li>A <strong>corporate site</strong> means a separate page for each service, projects, team, a blog and usually 2–3 languages. It is the most popular choice for bringing in customers from Google.</li>
  <li>An <strong>online store</strong> covers the catalogue, filters, cart, online payment, and order and stock management. More details: <a href="/blog-details/how-to-start-online-store-azerbaijan-2026">how to open an online store</a>.</li>
  <li>A <strong>custom platform</strong> is a project that needs special logic, such as user accounts, bookings, a CRM, POS, a course platform or integration with external systems.</li>
</ul>

<h2>8 Factors That Determine a Website's Price</h2>
<p>It is normal for two studios to quote different prices for the same site, because the price is the sum of several factors.</p>

<h3>1. Website type and number of pages</h3>
<p>Every new page template means design, programming and testing. Ten service pages of the same type can be handled with one template, but ten pages with different layouts take far more work.</p>

<h3>2. Design: template or custom</h3>
<p>A ready-made template is cheap and fast, but your site may look like your competitors' sites. A custom design is made to fit your brand, with separate mock-ups for mobile and desktop, so it costs more.</p>

<h3>3. Technology: website builder, WordPress or custom development</h3>
<p>Building on a website builder (Wix, Tilda) is cheap, but you pay a monthly subscription and stay locked into the platform. WordPress is a middle option. A custom-built site (for example, with Laravel) is the most flexible and suits special features. Comparisons: <a href="/blog-details/wix-vs-tilda-vs-wordpress-vs-custom-website-2026">Wix, Tilda, WordPress or a custom website?</a> and <a href="/blog-details/laravel-vs-wordpress-for-business-2026">Laravel or WordPress?</a></p>

<h3>4. Number of languages</h3>
<p>In Azerbaijan, sites are often in two or three languages (AZ, RU, EN). Each extra language adds about 15–25% to the price: you need translation, a separate URL for each language, meta data and hreflang tags.</p>

<h3>5. Features</h3>
<p>A contact form, a WhatsApp button and a map are simple features. Online payment, bookings, user accounts, a filterable catalogue, a calculator, or integration with a CRM or POS have a serious impact on the price.</p>

<h3>6. Content: copy and images</h3>
<p>When you provide the copy and images yourself, the cost goes down. Writing SEO copy and professional photo or video shoots are charged separately. Late content is also the most common reason for delays.</p>

<h3>7. SEO</h3>
<p>Technical SEO (speed, mobile-friendliness, meta titles, sitemap, structured data) should be set up while the site is being built. Ongoing work to rank for competitive queries (content, backlinks) is a separate <a href="/seo-services">SEO service</a>.</p>

<h3>8. Post-launch support</h3>
<p>After handover, the site needs updates, security work and small changes. Some studios include a warranty period in the price, while others offer a monthly support package.</p>

<h2>Example Estimates: 3 Real Scenarios</h2>
<p>The figures below are approximate examples based on the ranges in the table above.</p>
<table>
  <thead>
    <tr><th>Scenario</th><th>What is needed</th><th>Approximate price</th></tr>
  </thead>
  <tbody>
    <tr><td>Café in Baku</td><td>Business card site: menu, photo gallery, map, reservations via WhatsApp, 2 languages</td><td>700 – 1,200 ₼</td></tr>
    <tr><td>Dental clinic</td><td>Corporate site: 8 service pages, doctor profiles, prices, online booking form, blog, 3 languages</td><td>2,000 – 3,500 ₼</td></tr>
    <tr><td>Clothing store, 300 products</td><td>Online store: size and colour options, filters, cart, online payment, order panel, 2 languages</td><td>3,500 – 6,000 ₼</td></tr>
  </tbody>
</table>
<p>Industry guides: <a href="/blog-details/restaurant-cafe-website-azerbaijan-2027">websites for restaurants and cafés</a>, <a href="/blog-details/clinic-medical-centre-website-azerbaijan-2027">websites for clinics</a>, <a href="/blog-details/construction-supply-company-website-2027">websites for construction companies</a>.</p>

<h2>Yearly Costs: What You Pay After the Site Is Built</h2>
<table>
  <thead>
    <tr><th>Cost</th><th>Approximate yearly amount</th><th>Note</th></tr>
  </thead>
  <tbody>
    <tr><td>Domain (.az, .com)</td><td>20 – 60 ₼</td><td>Renewed every year. The domain should be registered in your name</td></tr>
    <tr><td>Hosting</td><td>70 – 250 ₼</td><td>Depends on the size of the site and its traffic</td></tr>
    <tr><td>SSL certificate</td><td>Often 0 ₼</td><td>Free certificates such as Let's Encrypt are enough</td></tr>
    <tr><td>Business email</td><td>0 – 120 ₼</td><td>May be included in hosting or be a separate service such as Google Workspace</td></tr>
    <tr><td>Technical support</td><td>By agreement</td><td>A monthly package or a separate payment for each job</td></tr>
  </tbody>
</table>
<p>So the total three-year cost of a 1,500 ₼ corporate site comes to about 1,800–2,400 ₼. With website builders, development may be cheaper, but the monthly subscription can close that gap over the years. About domains: <a href="/what-is-domain">what a domain is and how to choose one</a>. Email options: <a href="/corporate-email">business email</a>.</p>

<h2>Why a Cheap Website Can End Up Expensive</h2>
<p>Offers of 100–300 ₼ usually mean putting a logo and text on a ready-made template. This can work as a temporary solution, but there are common problems:</p>
<ul>
  <li>The domain is registered in the contractor's name, so the site does not really belong to you.</li>
  <li>There is no admin panel, so you have to message the contractor for every change.</li>
  <li>The site loads slowly on phones and fails Google's <a href="/blog-details/website-speed-core-web-vitals-2026">Core Web Vitals</a>.</li>
  <li>There are no meta titles, sitemap or structured data, so the site does not show up on Google.</li>
  <li>No updates are made, and after a year or two the site becomes a security problem.</li>
</ul>
<p>When comparing quotes, look not just at the figure but at what is included. Questions to ask the studio: <a href="/blog-details/questions-to-ask-before-hiring-web-developer-2027">15 questions before ordering a website</a>.</p>

<h2>How to Cut the Budget Without Losing Quality</h2>
<ul>
  <li><strong>Start in stages.</strong> Launch the site with the core pages first, and leave the blog, an extra language or online payment for a later stage.</li>
  <li><strong>Start with one language.</strong> If most of your customers search in one language, add the second one later.</li>
  <li><strong>Prepare the content yourself.</strong> Provide service descriptions, prices and images on time.</li>
  <li><strong>Fill in the brief in advance.</strong> A clear brief reduces the number of revisions: <a href="/blog-details/how-to-write-project-brief-2026">how to write a project brief</a>.</li>
  <li><strong>Start with a landing page for ads.</strong> If you want leads for one service, you do not need a full corporate site.</li>
  <li><strong>Send your Instagram audience to the site.</strong> More details: <a href="/blog-details/instagram-shop-vs-website-2026">do you need a website if you have an Instagram shop?</a></li>
</ul>

<h2>What RS Code Includes in the Website Price</h2>
<ul>
  <li>Domain purchase, hosting, an SSL certificate and setup of business email on your domain. In the following years, renewing the domain and hosting is a separate yearly cost.</li>
  <li>An admin panel with every site, so you can change text, images, news and products yourself.</li>
  <li>Mobile-friendly design and technical SEO; the site is registered with Google.</li>
  <li>Staged payment: usually 40% at the start, 40% after design approval and 20% at handover.</li>
  <li>Remote work in Baku and across Azerbaijan: meetings by video call, approvals in writing.</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does a website cost in Azerbaijan in 2027?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A landing page costs 300–700 ₼, a business card site 500–1,200 ₼, a corporate site 1,200–3,500 ₼, an online store 2,000–6,000 ₼, and a custom platform starts at 5,000 ₼. The exact price depends on the number of pages and languages, the design and the features.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the cheapest way to get a website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">If you want leads for one service, a landing page (300–700 ₼). For a small business, a business card site (500–1,200 ₼). Website builders are cheap at the start, but the monthly subscription can become expensive over the years.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to build a website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A landing page takes 5–10 days, a business card site 1–2 weeks, a corporate site 2–4 weeks and an online store 3–6 weeks. Having the copy and images ready on time also affects the timeline.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does a website cost to run each year?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A domain costs about 20–60 ₼ and hosting 70–250 ₼. SSL is often free, and business email may be included in hosting. Technical support is paid separately by agreement.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does an extra language add to the price?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Each extra language adds about 15–25%. You need translation, a separate URL for each language, meta data and hreflang tags.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is SEO included in the website price?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Technical SEO (speed, mobile-friendliness, meta titles, sitemap) should be set up while the site is being built. Ongoing SEO for higher rankings on competitive queries is offered as a separate service.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/questions-to-ask-before-hiring-web-developer-2027">15 questions to ask a web studio before ordering a website</a></li>
  <li><a href="/blog-details/wix-vs-tilda-vs-wordpress-vs-custom-website-2026">Wix, Tilda, WordPress or a custom website?</a></li>
  <li><a href="/blog-details/what-is-a-landing-page-2026">What is a landing page?</a></li>
  <li><a href="/blog-details/how-to-start-online-store-azerbaijan-2026">How to open an online store</a></li>
  <li><a href="/blog-details/mobile-app-development-cost-azerbaijan-2027">Mobile app cost 2027</a></li>
</ul>

<h2>Conclusion</h2>
<p>In 2027, the price of a website in Azerbaijan ranges from a 300 ₼ landing page to a custom platform costing more than 5,000 ₼. The difference comes from the scope of work, not from a lack of transparency in the market. To set the right budget, first decide on the site's goal, the number of languages and the features you need, then compare quotes not just by the figure but by what is included: whose name will the domain be in, is there an admin panel and technical SEO, and what are the yearly costs?</p>
<p><strong>Want an exact price for your website? See our <a href="/website-development">website development</a> page</strong> or <a href="/contact">get in touch</a>. We send a written quote after a short brief.</p>
<p><small><em>Prices are approximate as of November 2026 and may vary depending on the scope of the project.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Когда вы решаете сделать сайт для бизнеса, первый вопрос обычно один и тот же: «Сколько это будет стоить?» В интернете вы видите и объявления о «готовом сайте» за 150 ₼, и проекты за 10 000 ₼, и понять, что подходит именно вам, становится трудно. Причина в том, что словом «сайт» называют очень разные работы: от одностраничной формы заявки до магазина с сотнями товаров и онлайн-оплатой.</p>
<p>В этом руководстве мы собрали цены на сайты в Азербайджане на 2027 год в таблицу по типам сайтов. Мы объясняем, какие факторы меняют цену, какие расходы будут каждый год, приводим примерный расчёт для трёх реальных сценариев и рассказываем, как снизить бюджет без потери качества. Цифры совпадают с ценами на странице <a href="/razrabotka-sajtov">разработки сайтов</a> RS Code.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Сколько стоит сайт?</td><td>Лендинг 300–700 ₼, сайт-визитка 500–1 200 ₼, корпоративный сайт 1 200–3 500 ₼, интернет-магазин 2 000–6 000 ₼, индивидуальная платформа от 5 000 ₼</td></tr>
    <tr><td>За сколько дней будет готов?</td><td>Лендинг 5–10 дней, сайт-визитка 1–2 недели, корпоративный сайт 2–4 недели, интернет-магазин 3–6 недель</td></tr>
    <tr><td>Ежегодные расходы</td><td>Домен примерно 20–60 ₼, хостинг 70–250 ₼, корпоративная почта (если это отдельная услуга) 50–120 ₼</td></tr>
    <tr><td>Что меняет цену?</td><td>Тип сайта, индивидуальный дизайн, количество языков (каждый дополнительный язык примерно +15–25%), функции, контент, SEO и поддержка</td></tr>
  </tbody>
</table>

<h2>Цены на сайты в 2027 году по типам</h2>
<table>
  <thead>
    <tr><th>Тип сайта</th><th>Цена (₼)</th><th>Срок</th><th>Для чего</th></tr>
  </thead>
  <tbody>
    <tr><td>Лендинг</td><td>300 – 700</td><td>5–10 дней</td><td>Сбор заявок на одну услугу или акцию</td></tr>
    <tr><td>Сайт-визитка</td><td>500 – 1 200</td><td>1–2 недели</td><td>Малый бизнес: услуги, контакты, карта</td></tr>
    <tr><td>Корпоративный сайт</td><td>1 200 – 3 500</td><td>2–4 недели</td><td>Страницы услуг, проекты, блог, несколько языков</td></tr>
    <tr><td>Интернет-магазин</td><td>2 000 – 6 000</td><td>3–6 недель</td><td>Каталог, корзина, онлайн-оплата, управление заказами</td></tr>
    <tr><td>Индивидуальная платформа</td><td>5 000+</td><td>По проекту</td><td>CRM, POS, LMS, порталы и интеграции</td></tr>
  </tbody>
</table>
<p>Цены ориентировочные. Точная сумма зависит от количества страниц и языков, дизайна, функций и того, кто готовит контент. Коротко о каждом типе сайта:</p>
<ul>
  <li><strong>Лендинг</strong> — одна страница с одной целью: превратить посетителя из рекламы в заявку. Подробнее: <a href="/blog-details/chto-takoe-lending-2026">что такое лендинг и когда он нужен</a>.</li>
  <li><strong>Сайт-визитка</strong> состоит из 3–6 страниц: о нас, услуги, цены, контакты и карта. Этого достаточно мастеру, салону или небольшому офису.</li>
  <li><strong>Корпоративный сайт</strong> — это отдельная страница для каждой услуги, проекты, команда, блог и обычно 2–3 языка. Самый популярный вариант, чтобы получать клиентов из Google.</li>
  <li><strong>Интернет-магазин</strong> включает каталог, фильтры, корзину, онлайн-оплату, управление заказами и остатками. Подробнее: <a href="/blog-details/kak-otkryt-internet-magazin-v-azerbajdzhane-2026">как открыть интернет-магазин</a>.</li>
  <li><strong>Индивидуальная платформа</strong> — проект с особой логикой: личные кабинеты, бронирование, CRM, POS, курсовая платформа или интеграция с внешними системами.</li>
</ul>

<h2>8 факторов, которые определяют цену сайта</h2>
<p>Две студии нередко называют разную цену за один и тот же сайт, потому что цена складывается из нескольких факторов.</p>

<h3>1. Тип сайта и количество страниц</h3>
<p>Каждый новый шаблон страницы — это дизайн, программирование и тестирование. Десять однотипных страниц услуг решаются одним шаблоном, а десять страниц с разной структурой требуют намного больше работы.</p>

<h3>2. Дизайн: шаблон или индивидуальный</h3>
<p>Готовый шаблон дешёвый и быстрый, но сайт может быть похож на сайты конкурентов. Индивидуальный дизайн делается под ваш бренд, с отдельными макетами для мобильной и десктопной версии, поэтому стоит дороже.</p>

<h3>3. Технология: конструктор, WordPress или разработка на заказ</h3>
<p>Сделать сайт на конструкторе (Wix, Tilda) дёшево, но вы платите ежемесячную подписку и остаётесь привязаны к платформе. WordPress — средний вариант. Сайт на заказ (например, на Laravel) — самый гибкий и подходит для особых функций. Сравнение: <a href="/blog-details/wix-tilda-wordpress-ili-sajt-na-zakaz-2026">Wix, Tilda, WordPress или сайт на заказ?</a> и <a href="/blog-details/laravel-ili-wordpress-2026">Laravel или WordPress?</a></p>

<h3>4. Количество языков</h3>
<p>В Азербайджане сайты часто делают на двух или трёх языках (AZ, RU, EN). Каждый дополнительный язык увеличивает цену примерно на 15–25%: нужны перевод, отдельный URL для каждого языка, мета-данные и теги hreflang.</p>

<h3>5. Функции</h3>
<p>Форма заявки, кнопка WhatsApp и карта — простые функции. Онлайн-оплата, бронирование, личный кабинет, каталог с фильтрами, калькулятор, интеграция с CRM или POS серьёзно влияют на цену.</p>

<h3>6. Контент: тексты и фото</h3>
<p>Когда тексты и фото даёте вы, расходы снижаются. Написание SEO-текстов и профессиональная фото- или видеосъёмка считаются отдельно. А задержка контента — самая частая причина затягивания сроков.</p>

<h3>7. SEO</h3>
<p>Техническое SEO (скорость, мобильная версия, мета-заголовки, sitemap, структурированные данные) нужно настроить при разработке сайта. Постоянная работа для выхода в топ по конкурентным запросам (контент, ссылки) — это отдельная <a href="/seo-uslugi">SEO-услуга</a>.</p>

<h3>8. Поддержка после сдачи</h3>
<p>После сдачи сайту нужны обновления, работа по безопасности и мелкие изменения. Одни студии включают гарантийный срок в цену, другие предлагают ежемесячный пакет поддержки.</p>

<h2>Примеры расчёта: 3 реальных сценария</h2>
<p>Цифры ниже — ориентировочные примеры на основе диапазонов из таблицы выше.</p>
<table>
  <thead>
    <tr><th>Сценарий</th><th>Что нужно</th><th>Примерная цена</th></tr>
  </thead>
  <tbody>
    <tr><td>Кафе в Баку</td><td>Сайт-визитка: меню, фотогалерея, карта, бронирование через WhatsApp, 2 языка</td><td>700 – 1 200 ₼</td></tr>
    <tr><td>Стоматологическая клиника</td><td>Корпоративный сайт: 8 страниц услуг, профили врачей, цены, форма онлайн-записи, блог, 3 языка</td><td>2 000 – 3 500 ₼</td></tr>
    <tr><td>Магазин одежды, 300 товаров</td><td>Интернет-магазин: выбор размера и цвета, фильтры, корзина, онлайн-оплата, панель заказов, 2 языка</td><td>3 500 – 6 000 ₼</td></tr>
  </tbody>
</table>
<p>Руководства по сферам: <a href="/blog-details/sajt-dlya-restorana-kafe-2027">сайт для ресторана и кафе</a>, <a href="/blog-details/sajt-dlya-kliniki-medicinskogo-centra-2027">сайт для клиники</a>, <a href="/blog-details/sajt-dlya-stroitelnoj-kompanii-2027">сайт для строительной компании</a>.</p>

<h2>Ежегодные расходы: что вы платите после разработки сайта</h2>
<table>
  <thead>
    <tr><th>Расход</th><th>Примерная сумма в год</th><th>Примечание</th></tr>
  </thead>
  <tbody>
    <tr><td>Домен (.az, .com)</td><td>20 – 60 ₼</td><td>Продлевается каждый год. Домен должен быть оформлен на вас</td></tr>
    <tr><td>Хостинг</td><td>70 – 250 ₼</td><td>Зависит от объёма сайта и трафика</td></tr>
    <tr><td>SSL-сертификат</td><td>Часто 0 ₼</td><td>Бесплатных сертификатов вроде Let's Encrypt достаточно</td></tr>
    <tr><td>Корпоративная почта</td><td>0 – 120 ₼</td><td>Может входить в хостинг или быть отдельной услугой, например Google Workspace</td></tr>
    <tr><td>Техническая поддержка</td><td>По договорённости</td><td>Ежемесячный пакет или отдельная оплата за каждую работу</td></tr>
  </tbody>
</table>
<p>Таким образом, общие расходы на корпоративный сайт за 1 500 ₼ за три года составят примерно 1 800–2 400 ₼. У конструкторов разработка дешевле, но ежемесячная подписка за несколько лет может закрыть эту разницу. О доменах: <a href="/chto-takoe-domen">что такое домен и как его выбрать</a>. Варианты почты: <a href="/korporativnaya-pochta">корпоративная почта</a>.</p>

<h2>Почему дешёвый сайт может обойтись дорого</h2>
<p>Предложения за 100–300 ₼ обычно означают логотип и текст на готовом шаблоне. Как временное решение это может работать, но часто возникают проблемы:</p>
<ul>
  <li>Домен оформлен на исполнителя, и сайт фактически вам не принадлежит.</li>
  <li>Нет админ-панели, и для каждого изменения приходится писать исполнителю.</li>
  <li>Сайт медленно открывается на телефоне и не проходит <a href="/blog-details/skorost-sajta-core-web-vitals-2026">Core Web Vitals</a> Google.</li>
  <li>Нет мета-заголовков, sitemap и структурированных данных, и сайт не виден в Google.</li>
  <li>Обновления не делаются, и через год-два сайт становится проблемой безопасности.</li>
</ul>
<p>Сравнивая предложения, смотрите не только на цифру, но и на то, что в неё входит. Вопросы, которые стоит задать студии: <a href="/blog-details/voprosy-pered-zakazom-sajta-2027">15 вопросов перед заказом сайта</a>.</p>

<h2>Как снизить бюджет без потери качества</h2>
<ul>
  <li><strong>Начните поэтапно.</strong> Сначала запустите сайт с основными страницами, а блог, дополнительный язык или онлайн-оплату оставьте на следующий этап.</li>
  <li><strong>Начните с одного языка.</strong> Если большинство клиентов ищет на одном языке, второй добавьте позже.</li>
  <li><strong>Подготовьте контент сами.</strong> Вовремя передайте описания услуг, цены и фото.</li>
  <li><strong>Заполните бриф заранее.</strong> Понятное задание сокращает количество правок: <a href="/blog-details/kak-zapolnit-brif-2026">как заполнить бриф</a>.</li>
  <li><strong>Для рекламы начните с лендинга.</strong> Если нужны заявки на одну услугу, полный корпоративный сайт не обязателен.</li>
  <li><strong>Направьте аудиторию из Instagram на сайт.</strong> Подробнее: <a href="/blog-details/instagram-magazin-ili-sajt-2026">нужен ли сайт, если есть магазин в Instagram?</a></li>
</ul>

<h2>Что входит в цену сайта в RS Code</h2>
<ul>
  <li>Покупка домена, хостинг, SSL-сертификат и настройка корпоративной почты на вашем домене. В следующие годы продление домена и хостинга — отдельный ежегодный расход.</li>
  <li>Админ-панель с каждым сайтом: тексты, фото, новости и товары вы меняете сами.</li>
  <li>Адаптивный дизайн и техническое SEO; сайт регистрируется в Google.</li>
  <li>Поэтапная оплата: обычно 40% в начале, 40% после утверждения дизайна и 20% при сдаче.</li>
  <li>Работаем онлайн в Баку и по всему Азербайджану: встречи по видеосвязи, согласования письменно.</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит сайт в Азербайджане в 2027 году?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Лендинг стоит 300–700 ₼, сайт-визитка 500–1 200 ₼, корпоративный сайт 1 200–3 500 ₼, интернет-магазин 2 000–6 000 ₼, индивидуальная платформа от 5 000 ₼. Точная цена зависит от количества страниц и языков, дизайна и функций.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какой самый дешёвый вариант сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Если нужны заявки на одну услугу — лендинг (300–700 ₼). Для малого бизнеса — сайт-визитка (500–1 200 ₼). Конструкторы дешёвые на старте, но ежемесячная подписка за годы может обойтись дорого.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">За сколько дней делается сайт?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Лендинг — 5–10 дней, сайт-визитка — 1–2 недели, корпоративный сайт — 2–4 недели, интернет-магазин — 3–6 недель. На срок влияет и то, насколько вовремя готовы тексты и фото.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит содержание сайта в год?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Домен — примерно 20–60 ₼, хостинг — 70–250 ₼. SSL часто бесплатный, корпоративная почта может входить в хостинг. Техническая поддержка оплачивается отдельно по договорённости.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Насколько дополнительный язык увеличивает цену?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Каждый дополнительный язык — примерно +15–25%. Нужны перевод, отдельный URL для каждого языка, мета-данные и теги hreflang.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Входит ли SEO в цену сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Техническое SEO (скорость, мобильная версия, мета-заголовки, sitemap) настраивается при разработке. Постоянное SEO для высоких позиций по конкурентным запросам предлагается как отдельная услуга.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/voprosy-pered-zakazom-sajta-2027">15 вопросов веб-студии перед заказом сайта</a></li>
  <li><a href="/blog-details/wix-tilda-wordpress-ili-sajt-na-zakaz-2026">Wix, Tilda, WordPress или сайт на заказ?</a></li>
  <li><a href="/blog-details/chto-takoe-lending-2026">Что такое лендинг?</a></li>
  <li><a href="/blog-details/kak-otkryt-internet-magazin-v-azerbajdzhane-2026">Как открыть интернет-магазин</a></li>
  <li><a href="/blog-details/stoimost-mobilnogo-prilozheniya-azerbaydzhan-2027">Стоимость мобильного приложения 2027</a></li>
</ul>

<h2>Итог</h2>
<p>В 2027 году цена сайта в Азербайджане варьируется от лендинга за 300 ₼ до индивидуальной платформы дороже 5 000 ₼. Разница объясняется объёмом работы, а не непрозрачностью рынка. Чтобы определить правильный бюджет, сначала уточните цель сайта, количество языков и нужные функции, а затем сравнивайте предложения не только по цифре, но и по тому, что в них входит: на кого будет оформлен домен, есть ли админ-панель и техническое SEO, сколько составят ежегодные расходы?</p>
<p><strong>Хотите узнать точную цену вашего сайта? Посмотрите страницу <a href="/razrabotka-sajtov">разработки сайтов</a></strong> или <a href="/kontakty">свяжитесь с нами</a>. После короткого брифа мы присылаем письменное предложение.</p>
<p><small><em>Цены ориентировочные по состоянию на ноябрь 2026 года и могут меняться в зависимости от объёма проекта.</em></small></p>
HTML;

        $old = [
            'az' => 'veb-sayt-qiymeti-azerbaycan-2026',
            'en' => 'website-cost-azerbaijan-2026',
            'ru' => 'stoimost-veb-sayta-azerbaydzhan-2026',
        ];
        $new = [
            'az' => 'veb-sayt-qiymeti-azerbaycan-2027',
            'en' => 'website-cost-azerbaijan-2027',
            'ru' => 'stoimost-veb-sayta-azerbaydzhan-2027',
        ];

        $row = DB::table('blogs')->whereIn('slug_az', [$old['az'], $new['az']])->orderBy('id')->first();
        $backup = storage_path('app/blog17-pre2027-backup.json');
        if ($row && $row->slug_az === $old['az'] && ! file_exists($backup)) {
            file_put_contents($backup, json_encode($row, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }

        $data = [
            'slug_az' => $new['az'],
            'slug_en' => $new['en'],
            'slug_ru' => $new['ru'],
            'title_az' => 'Veb Sayt Qiyməti Azərbaycanda 2027: Sayt Növlərinə Görə Qiymət Siyahısı, İllik Xərclər və Nümunə Hesablamalar',
            'title_en' => 'Website Cost in Azerbaijan 2027: Prices by Website Type, Yearly Costs and Example Estimates',
            'title_ru' => 'Стоимость сайта в Азербайджане 2027: цены по типам сайтов, ежегодные расходы и примеры расчёта',
            'review_az' => '2027-ci ildə Azərbaycanda sayt neçəyə başa gəlir: landing page 300–700 ₼, vizit kart sayt 500–1.200 ₼, korporativ sayt 1.200–3.500 ₼, onlayn mağaza 2.000–6.000 ₼. Qiyməti dəyişən 8 amil, illik domen və hostinq xərcləri, 3 nümunə hesablama, ucuz saytın riskləri və büdcəni azaltmağın yolları.',
            'review_en' => 'How much a website costs in Azerbaijan in 2027: landing page 300–700 ₼, business card site 500–1,200 ₼, corporate site 1,200–3,500 ₼, online store 2,000–6,000 ₼. The 8 factors that change the price, yearly domain and hosting costs, 3 example estimates, the risks of a cheap site and ways to reduce the budget.',
            'review_ru' => 'Сколько стоит сайт в Азербайджане в 2027 году: лендинг 300–700 ₼, сайт-визитка 500–1 200 ₼, корпоративный сайт 1 200–3 500 ₼, интернет-магазин 2 000–6 000 ₼. 8 факторов, влияющих на цену, ежегодные расходы на домен и хостинг, 3 примера расчёта, риски дешёвого сайта и как снизить бюджет.',
            'date_az' => '17 Noyabr 2026',
            'date_en' => 'November 17, 2026',
            'date_ru' => '17 Ноября 2026',
            'photo' => 'cover-website-cost-2027-az.png',
            'photo_en' => 'cover-website-cost-2027-en.png',
            'photo_ru' => 'cover-website-cost-2027-ru.png',
            'meta_title_az' => 'Veb Sayt Qiyməti 2027: 300 ₼-dən, Tam Qiymət Siyahısı | RS Code',
            'meta_title_en' => 'Website Cost in Azerbaijan 2027: Full Price List | RS Code',
            'meta_title_ru' => 'Стоимость сайта в Азербайджане 2027: цены | RS Code',
            'meta_description_az' => 'Sayt neçəyə başa gəlir? Landing page 300–700 ₼, korporativ sayt 1.200–3.500 ₼, onlayn mağaza 2.000–6.000 ₼. İllik xərclər, nümunə hesablamalar və məsləhətlər.',
            'meta_description_en' => 'How much does a website cost? Landing page 300–700 ₼, corporate site 1,200–3,500 ₼, online store 2,000–6,000 ₼. Yearly costs, example estimates and tips.',
            'meta_description_ru' => 'Сколько стоит сайт? Лендинг 300–700 ₼, корпоративный сайт 1 200–3 500 ₼, интернет-магазин 2 000–6 000 ₼. Ежегодные расходы, примеры расчёта и советы.',
            'meta_keywords_az' => 'veb sayt qiyməti, sayt qiymətləri 2027, sayt açmaq qiyməti, sayt hazırlanması qiyməti, korporativ sayt qiyməti, onlayn mağaza qiyməti, landing page qiyməti, azərbaycan',
            'meta_keywords_en' => 'website cost azerbaijan, website price 2027, how much does a website cost, website development price baku, online store cost, landing page price',
            'meta_keywords_ru' => 'стоимость сайта, цена сайта 2027, сколько стоит сайт в азербайджане, разработка сайта цена баку, стоимость интернет-магазина, цена лендинга',
            'text_az' => $textAz,
            'text_en' => $textEn,
            'text_ru' => $textRu,
            'updated_at' => now(),
        ];

        if ($row) {
            DB::table('blogs')->where('id', $row->id)->update($data);
        } else {
            DB::table('blogs')->insert($data + ['created_at' => now()]);
        }

        // Digər bloqlardakı köhnə linkləri yeni slug-a çevir (301 hop-u olmasın).
        foreach (DB::table('blogs')->get(['id', 'text_az', 'text_en', 'text_ru']) as $b) {
            $upd = [];
            foreach (['az', 'en', 'ru'] as $l) {
                $t = (string) $b->{"text_$l"};
                $n = str_replace('/blog-details/'.$old[$l].'"', '/blog-details/'.$new[$l].'"', $t);
                if ($n !== $t) {
                    $upd["text_$l"] = $n;
                }
            }
            if ($upd) {
                DB::table('blogs')->where('id', $b->id)->update($upd);
            }
        }
    }
}
