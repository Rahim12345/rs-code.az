<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #19 "SEO xidməti Azərbaycanda" — 2027 yenilənməsi (eyni DB sətri, yeni slug-lar, köhnələrdən 301 routes/web.php-də).
 * Qiymətlər və RS Code iddiaları YALNIZ resources/lang/{az,en,ru}/seo.php (x_short, x_prices, x_faq): audit 150–500 AZN birdəfəlik,
 * aylıq SEO 300–1 000 AZN, rəqabətli sahələr 1 000–3 000+ AZN, nəticə adətən 3–6 ay, mövqeyə zəmanət yoxdur.
 * AI Overviews / AI Mode bölməsi Google Search Central "AI features and your website" sənədinə əsaslanır (2026-10-26 mətnindən saxlanılıb).
 * Daxili/frilanser qiymət aralıqları "bazar təxmini" kimi verilir. Müştəri nəticələri və statistika iddia edilmir.
 * Backup: storage/app/blog19-pre2027-backup.json (ilk işləmədə).
 */
class Blog19SeoService2027Seeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Telefonunuzu götürün və biznesinizlə bağlı bir sorğunu Google-da axtarın: "diş klinikası Bakı", "kondisioner təmiri" və ya "veb sayt hazırlanması". İlk nəticələrdə saytınız varmı? Yoxdursa, həmin müştəri hər gün rəqibinizə gedir. SEO (axtarış sistemləri üçün optimallaşdırma) saytın bu axtarışlarda reklamsız, təbii nəticələrdə görünməsi üçün görülən işdir.</p>
<p>SEO xidməti sifariş etmək istəyən sahibkarın adətən üç sualı olur: bu iş neçəyə başa gəlir, nəticə nə vaxt görünəcək və aylıq ödənişin müqabilində konkret nə edilir? Bu bələdçidə 2027-ci il üçün hər üçünə açıq cavab veririk: SEO xidmətinin tərkibi, Azərbaycanda təxmini qiymətlər, real nəticə müddəti, nəticəni necə ölçmək, Google-un <strong>AI Overviews və AI Mode</strong> cavablarının SEO-ya təsiri, təhlükəli təkliflər və SEO-nu kimə tapşırmağın daha sərfəli olduğu.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO nədir?</td><td>Saytın Google-da reklamsız, təbii nəticələrdə yuxarı çıxması üçün texniki, məzmun və lokal işlər</td></tr>
    <tr><td>Neçəyə başa gəlir?</td><td>SEO auditi 150–500 AZN (birdəfəlik), aylıq SEO 300–1 000 AZN, rəqabətli sahələrdə 1 000–3 000+ AZN/ay</td></tr>
    <tr><td>Nəticə nə vaxt görünür?</td><td>Adətən 3–6 ay; rəqabətli açar sözlərdə daha uzun</td></tr>
    <tr><td>Zəmanət varmı?</td><td>Konkret mövqeyə zəmanət yoxdur. Sıralamanı Google müəyyən edir; ölçülən iş texniki vəziyyət, trafik və müraciətlərdir</td></tr>
    <tr><td>AI cavabları üçün ayrıca iş lazımdır?</td><td>Google-a görə xeyr: səhifə indekslənməli və snippet ilə göstərilməyə uyğun olmalıdır</td></tr>
  </tbody>
</table>

<h2>SEO Xidmətinə Nə Daxildir?</h2>
<p>Yaxşı SEO xidməti bir neçə istiqamətdə paralel işdir. Təklif alanda hər istiqamət üzrə nə ediləcəyini yazılı soruşun. "Saytı optimallaşdıracağıq" kimi ümumi cümlə kifayət deyil.</p>

<h3>1. Texniki SEO</h3>
<ul>
  <li><strong>Tarama və indeksləmə:</strong> <code>robots.txt</code>, XML sitemap, canonical teqləri, səhv səhifələr (404), yönləndirmələr (301), təkrarlanan səhifələr. Google səhifəni görməsə, onu heç bir sorğuda göstərməyəcək.</li>
  <li><strong>Sürət və mobil uyğunluq:</strong> Google-un Core Web Vitals göstəriciləri (LCP, INP, CLS), şəkillərin ölçüsü, keşləmə. Ətraflı: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">sayt sürəti və Core Web Vitals</a>.</li>
  <li><strong>Çoxdilli saytlarda hreflang:</strong> Azərbaycan, rus və ingilis versiyalarının bir-birinə düzgün bağlanması. Azərbaycanda müştərilərin bir hissəsi rus dilində axtarır, ona görə rus versiyası ayrıca trafik mənbəyidir.</li>
  <li><strong>Structured data (schema.org):</strong> şirkət, məqalə, xidmət, sual-cavab məlumatlarının Google üçün işarələnməsi. Markup səhifədəki görünən mətnə uyğun olmalıdır.</li>
</ul>

<h3>2. Səhifədaxili (on-page) SEO</h3>
<ul>
  <li>Hər səhifənin <code>title</code> və meta təsvirinin sorğuya uyğun yazılması.</li>
  <li>Başlıq strukturu (H1, H2), daxili keçidlər, şəkillərin alt mətni.</li>
  <li>Hər xidmət üçün ayrıca səhifə. Ana səhifə bütün açar sözlərdə eyni anda yuxarı çıxa bilməz.</li>
  <li>URL-lərin qısa və aydın olması, köhnə URL-lərdən yenisinə 301 yönləndirmə.</li>
</ul>

<h3>3. Açar söz araşdırması və məzmun</h3>
<ul>
  <li>Müştərilərin real axtardığı sözlərin tapılması: Azərbaycan və rus dilində ayrıca, çünki sorğular eyni deyil.</li>
  <li>Sorğunun niyyətinin müəyyən edilməsi: "SEO nədir" oxumaq istəyən adamdır, "SEO xidməti qiyməti" isə sifarişə yaxın müştəri.</li>
  <li>Müştərinin suallarına cavab verən yazılar: qiymət, müqayisə, "necə seçmək olar", sahəyə xas bələdçilər.</li>
  <li>Köhnə və zəif səhifələrin yenilənməsi. Çox vaxt yeni yazı yazmaqdan daha tez nəticə verir.</li>
</ul>

<h3>4. Lokal SEO və Google Business Profile</h3>
<ul>
  <li>Google Business Profile: xəritədə və "yaxınlıqda" axtarışlarda görünmək üçün ən vacib addım. Addım-addım: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır</a>.</li>
  <li>Ad, ünvan, telefon və iş saatlarının saytda, profildə və kataloqlarda eyni olması.</li>
  <li>Müştəri rəyləri və onlara vaxtında cavab.</li>
  <li>Filial varsa, hər filial üçün ayrıca profil və ayrıca səhifə.</li>
</ul>

<h3>5. Keçidlər (backlink)</h3>
<ul>
  <li>Etibarlı saytlardan təbii keçidlər: tərəfdaşlar, xəbər saytları, sahə kataloqları, assosiasiyalar.</li>
  <li>Spam və alınmış keçid paketlərindən uzaq durmaq. Google-un spam qaydaları sıralamaya təsir etmək üçün keçid alqı-satqısını pozuntu sayır. Ətraflı: <a href="/backlink-nedir">backlink nədir</a>.</li>
</ul>

<h2>SEO Qiymətləri 2027</h2>
<table>
  <thead>
    <tr><th>Xidmət</th><th>Qiymət (AZN)</th><th>Nə daxildir</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO auditi</td><td>150 – 500, birdəfəlik</td><td>Texniki yoxlama, sürət, indeksləmə, prioritetli tapşırıq siyahısı</td></tr>
    <tr><td>Aylıq SEO</td><td>300 – 1 000 / ay</td><td>Açar söz araşdırması, səhifə optimizasiyası, kontent, lokal SEO</td></tr>
    <tr><td>Rəqabətli sahələr</td><td>1 000 – 3 000+ / ay</td><td>Geniş kontent planı, link qazanma, bir neçə dil və bölgə</td></tr>
  </tbody>
</table>
<p>Qiymətlər təxminidir və sahənin rəqabətindən, saytın vəziyyətindən asılıdır. Bunlar <a href="/seo-xidmeti">SEO xidməti</a> səhifəmizdəki aralıqlardır.</p>

<h3>Qiyməti nə dəyişir?</h3>
<ul>
  <li><strong>Sahənin rəqabəti:</strong> "kafe Gəncə" ilə "kredit Bakı" sorğusu üçün tələb olunan iş həcmi tamam fərqlidir.</li>
  <li><strong>Saytın texniki vəziyyəti:</strong> köhnə, yavaş və ya səhv qurulmuş saytda ilk aylar düzəlişlərə gedir.</li>
  <li><strong>Səhifə və dil sayı:</strong> üç dilli sayt üç ayrı açar söz siyahısı və üç dəfə çox məzmun deməkdir.</li>
  <li><strong>Hədəf bölgələr:</strong> yalnız Bakı, bütün Azərbaycan və ya xarici bazar.</li>
  <li><strong>Yeni məzmunun həcmi:</strong> ayda neçə yazı və ya yeni xidmət səhifəsi hazırlanacaq.</li>
</ul>
<p>Sayt köhnə və ya çox yavaşdırsa, SEO-ya pul xərcləməzdən əvvəl saytı yeniləmək daha sərfəli ola bilər. Sayt büdcəsini hesablamaq üçün: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2027">veb sayt qiyməti Azərbaycanda 2027</a>.</p>

<h2>Nəticə Nə Vaxt Gəlir?</h2>
<p>SEO-da nəticə adətən 3–6 ay ərzində görünür. Bu ortalama gözləntidir, söz deyil: yeni domen, güclü rəqiblər və ya ciddi texniki problemlər müddəti uzadır. Tipik ardıcıllıq belədir:</p>
<table>
  <thead>
    <tr><th>Dövr</th><th>Nə baş verir</th></tr>
  </thead>
  <tbody>
    <tr><td>1-ci ay</td><td>Audit, texniki düzəlişlər, Search Console və analitikanın qurulması</td></tr>
    <tr><td>2–3-cü ay</td><td>Yeni və yenilənmiş səhifələr indekslənir, az rəqabətli sözlərdə ilk mövqelər görünür</td></tr>
    <tr><td>4–6-cı ay</td><td>Əsas açar sözlərdə hərəkət, kliklərin və müraciətlərin artması</td></tr>
    <tr><td>6+ ay</td><td>Daha sabit trafik; məzmun və keçid işi davam etdikcə mövqelər möhkəmlənir</td></tr>
  </tbody>
</table>
<p>Texniki düzəlişlər (məsələn, indeksdən çıxmış səhifələrin qaytarılması) bəzən bir neçə həftəyə təsir edir. Rəqabətli sözlərdə isə 6 aydan çox vaxt lazım ola bilər. Müştəri dərhal lazımdırsa, SEO ilə paralel reklam işlətmək olar: <a href="/blog-details/google-ads-azerbaycan-2027">Google Ads Azərbaycanda 2027</a>. Reklam dərhal trafik verir, amma ödəniş dayananda dayanır; SEO yavaş başlayır, amma uzunmüddətli pulsuz trafik gətirir.</p>

<h2>Nəticəni Necə Ölçmək Olar?</h2>
<p>Yalnız "filan sözdə neçənci yerdəyik" sualı yanıldıcıdır: mövqe cihaza, şəhərə və istifadəçiyə görə dəyişir. Aylıq hesabatda bu göstəricilərə baxın:</p>
<ol>
  <li><strong>Google Search Console:</strong> göstərilmə (impressions), klik, CTR və orta mövqe. Bu, Google-un öz məlumatıdır və pulsuzdur.</li>
  <li><strong>İndekslənmiş səhifələr:</strong> vacib səhifələrin hamısı indeksdədirmi, yeni səhv varmı.</li>
  <li><strong>Açar söz qrupları üzrə hərəkət:</strong> bir sözə yox, xidmət üzrə söz qruplarına baxın.</li>
  <li><strong>Organik trafik:</strong> Google Analytics 4-də "Organic Search" kanalından gələn ziyarətlər.</li>
  <li><strong>Müraciətlər:</strong> zəng, WhatsApp, forma, sifariş. SEO-nun son məqsədi budur.</li>
</ol>
<p>Vacib qayda: Search Console və Analytics hesabları <strong>sizin adınıza</strong> olmalıdır. Agentlik dəyişsə də, məlumat sizdə qalır.</p>

<h3>SEO xidmətindən əvvəl özünüz edə biləcəyiniz pulsuz addımlar</h3>
<p>Büdcə hələ yoxdursa və ya agentlik seçməzdən əvvəl vəziyyəti görmək istəyirsinizsə, bu addımları özünüz edə bilərsiniz:</p>
<ul>
  <li>Google Search Console-da saytı təsdiqləyin və sitemap göndərin. "Səhifələr" hesabatında hansı səhifələrin indeksdə olmadığını görəcəksiniz.</li>
  <li>Google Business Profile yaradın, kateqoriyanı, iş saatlarını və şəkilləri doldurun, müştərilərdən rəy istəyin.</li>
  <li>Hər əsas xidmət üçün ayrıca səhifə olduğunu və onun başlığında xidmətin adı ilə şəhərin yazıldığını yoxlayın.</li>
  <li>Saytı telefonda açın: yavaş açılırsa və ya düymələr kiçikdirsə, bunu siyahıya yazın.</li>
  <li>Müştərilərin ən çox verdiyi 5 sualı yazın. Onların hər biri gələcək bir məqalənin mövzusudur.</li>
</ul>
<p>Bu addımlar peşəkar SEO-nu əvəz etmir, amma auditdə nəyin vacib olduğunu anlamağa və təklifləri daha düzgün müqayisə etməyə kömək edir.</p>

<h2>Google AI Overviews və AI Mode: SEO Necə Dəyişir?</h2>
<p>Google axtarışda artıq süni intellektlə hazırlanan cavablar göstərir: nəticələrin üstündə <strong>AI Overviews</strong> və ayrıca söhbət rejimi olan <strong>AI Mode</strong>. Bu cavablar mənbə kimi saytlara keçid verir. Bəs orada necə görünmək olar? Google-un rəsmi sənədinə görə:</p>
<ul>
  <li>AI Overviews və AI Mode-da görünmək üçün <strong>əlavə tələb və ya xüsusi optimallaşdırma yoxdur</strong>. Adi SEO qaydaları burada da keçərlidir.</li>
  <li>Səhifə Google-da <strong>indekslənmiş olmalı və axtarışda snippet (qısa təsvir) ilə göstərilməyə uyğun olmalıdır</strong>.</li>
  <li>Bunun üçün yeni maşın oxunaqlı fayl, "AI mətn faylı" (məsələn, llms.txt) və ya xüsusi markup yaratmaq lazım deyil.</li>
  <li>Structured data səhifədəki görünən mətnə uyğun olmalıdır.</li>
</ul>
<p>Praktikada AI cavablarında daha çox sitat gətirilən səhifələrin ortaq cəhətləri bunlardır:</p>
<ol>
  <li><strong>Suala birbaşa cavab:</strong> başlıqdan sonra 1–2 cümləlik aydın cavab, sonra təfərrüat.</li>
  <li><strong>Cədvəl və siyahılar:</strong> qiymət, müqayisə və addımlar strukturlu verilir.</li>
  <li><strong>Konkret faktlar və mənbələr:</strong> rəqəmlər rəsmi mənbələrə əsaslanır, tarix göstərilir.</li>
  <li><strong>Lokal kontekst:</strong> Azərbaycan qanunları, qiymətləri, şəhərləri. Qlobal məqalələrin verə bilmədiyi məlumat.</li>
  <li><strong>Şirkət haqqında aydın məlumat:</strong> kimin yazdığı, əlaqə, ünvan, sosial profillər.</li>
</ol>
<p>Bunu da bilmək faydalıdır: <code>Google-Extended</code> robots.txt nişanı Google-un Gemini kimi digər sistemlərdə məzmundan istifadəsini idarə edir, amma Google Axtarışa təsir etmir. Axtarışda görünmək Googlebot-un saytı tarama icazəsindən asılıdır. ChatGPT və Gemini cavabları üçün ətraflı: <a href="/blog-details/chatgpt-gemini-google-ai-cavablarinda-gorunmek-2027">ChatGPT, Gemini və Google AI cavablarında necə görünmək olar</a>.</p>

<h2>Qırmızı Bayraqlar: Bu Təkliflərdən Uzaq Durun</h2>
<ul>
  <li><strong>"Google-da 1-ci yerə zəmanət":</strong> Google özü bildirir ki, heç kim konkret mövqeyə zəmanət verə bilməz. Belə vəd ya yalan, ya da heç kimin axtarmadığı söz üzrə "zəmanətdir".</li>
  <li><strong>"100 backlink 50 manata" kimi paketlər:</strong> ucuz keçid paketləri adətən spam saytlardandır və sayta zərər verə bilər.</li>
  <li><strong>Gizli iş:</strong> nə edildiyi göstərilmir, hesabatda yalnız bir neçə sözün mövqeyi var.</li>
  <li><strong>Hesablar agentliyin adına:</strong> Search Console, Analytics və ya Google Business Profile sizə verilmir.</li>
  <li><strong>Avtomatik və ya kopyalanmış məzmun:</strong> yüzlərlə eyni tipli səhifə, maşın tərcüməsi, başqa saytdan götürülmüş mətn.</li>
  <li><strong>"Bir həftəyə nəticə":</strong> təbii axtarışda bu qədər tez sabit nəticə real gözlənti deyil.</li>
  <li><strong>Müqaviləsiz və ya uzun məcburi müqavilə:</strong> həm iş həcmi yazılmır, həm də çıxmaq çətindir.</li>
</ul>

<h2>Daxili Mütəxəssis, Agentlik, yoxsa Frilanser?</h2>
<table>
  <thead>
    <tr><th>Variant</th><th>Üstünlüyü</th><th>Riski</th><th>Kimə uyğundur</th></tr>
  </thead>
  <tbody>
    <tr><td>Daxili SEO mütəxəssisi</td><td>Biznesi yaxşı tanıyır, tam vaxt sizin layihədədir</td><td>Maaş və vergi xərci; bir nəfər texniki, məzmun və keçid işinin hamısını bilmir</td><td>Böyük sayt, onlayn mağaza, davamlı çox məzmun</td></tr>
    <tr><td>Agentlik</td><td>Texniki, məzmun və analitika bir yerdə; proses və hesabat</td><td>Aylıq ödəniş; kiçik layihə arxa plana düşə bilər</td><td>Kiçik və orta biznes, xidmət şirkətləri, çoxdilli saytlar</td></tr>
    <tr><td>Frilanser</td><td>Adətən daha ucuz, çevik</td><td>Bir nəfərdən asılılıq; xəstəlik və ya məşğulluqda iş dayanır</td><td>Kiçik sayt, birdəfəlik audit və ya dar tapşırıq</td></tr>
  </tbody>
</table>
<p>Daxili mütəxəssisin maaşı və frilanser qiymətləri bazarda geniş dəyişir, burada konkret rəqəm vermirik. Hansı variantı seçsəniz də, yuxarıdakı ölçmə qaydaları eynidir: hesablar sizdə, iş yazılı, nəticə trafik və müraciətlə ölçülür.</p>

<h2>SEO Xidməti Sifarişindən Əvvəl Yoxlama Siyahısı</h2>
<ol>
  <li>Hansı xidmətlər və hansı bölgə üçün müştəri axtarırsınız? Bunu bir siyahıda yazın.</li>
  <li>Search Console və Analytics qurulubmu və sizin adınızadırmı?</li>
  <li>Hər əsas xidmət üçün saytda ayrıca səhifə varmı?</li>
  <li>Sayt mobil telefonda tez açılırmı?</li>
  <li>Google Business Profile yaradılıb və təsdiqlənibmi?</li>
  <li>Təklifdə audit, aylıq iş həcmi və hesabat formatı yazılıbmı?</li>
  <li>Keçidlərin haradan alınacağı izah olunubmu?</li>
  <li>Məzmunu kim yazacaq və Azərbaycan dilində keyfiyyəti kim yoxlayacaq?</li>
  <li>Müqavilədə çıxış şərtləri və hesabların təhvili varmı?</li>
  <li>Ən azı 6 aylıq büdcəniz varmı? SEO-nu 1–2 aydan sonra dayandırmaq adətən pulu boşa xərcləmək deməkdir.</li>
</ol>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO xidməti Azərbaycanda 2027-ci ildə neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Təxminən: SEO auditi 150–500 AZN birdəfəlik, aylıq SEO 300–1 000 AZN, rəqabətli sahələrdə 1 000–3 000 AZN və daha çox. Qiymət sahənin rəqabətindən, saytın vəziyyətindən, dil və səhifə sayından asılıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO nəticəsi nə vaxt görünür?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Adətən 3–6 ay ərzində. Texniki düzəlişlər tez təsir edə bilər, rəqabətli açar sözlərdə isə daha uzun vaxt lazımdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google-da birinci yerə zəmanət vermək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Google özü də bildirir ki, heç kim konkret mövqeyə zəmanət verə bilməz. Ölçülməli olan texniki vəziyyət, organik trafik və müraciətlərdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google AI Overviews və AI Mode-da görünmək üçün xüsusi nə etmək lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google-un rəsmi izahına görə xüsusi tələb yoxdur: səhifə indekslənməli və axtarışda snippet ilə göstərilməyə uyğun olmalıdır. llms.txt kimi xüsusi fayl və ya markup lazım deyil. Keyfiyyətli SEO elə bu işdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO, yoxsa Google reklamı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Reklam dərhal trafik verir, amma ödəniş dayananda dayanır. SEO yavaş başlayır, amma uzunmüddətli pulsuz trafik gətirir. Çox vaxt ən yaxşı yanaşma ikisini birlikdə işlətməkdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Lokal SEO nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xəritədə və "yaxınlıqda" axtarışlarda görünmək üçün Google Business Profile, ünvan və əlaqə məlumatlarının ardıcıllığı və rəylər üzərində iş.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır</a></li>
  <li><a href="/blog-details/sayt-sureti-core-web-vitals-2026">Sayt sürəti və Core Web Vitals</a></li>
  <li><a href="/blog-details/chatgpt-gemini-google-ai-cavablarinda-gorunmek-2027">ChatGPT, Gemini və Google AI cavablarında görünmək</a></li>
  <li><a href="/backlink-nedir">Backlink nədir?</a></li>
  <li><a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2027">Veb sayt qiyməti Azərbaycanda 2027</a></li>
</ul>

<h2>Nəticə</h2>
<p>2027-ci ildə SEO xidməti hələ də üç əsas işdən ibarətdir: saytın texniki sağlamlığı, müştərinin suallarına cavab verən məzmun və lokal etibar. Azərbaycanda audit təxminən 150–500 AZN, aylıq SEO 300–1 000 AZN, rəqabətli sahələrdə daha çox tutur, nəticə isə adətən 3–6 aya görünür. Google-un AI cavabları bu qaydaları dəyişmir, əksinə gücləndirir: aydın, strukturlu, faktlara əsaslanan və lokal məlumat verən saytlar həm adi nəticələrdə, həm də AI cavablarında daha çox görünür.</p>
<p>Təklifləri müqayisə edərkən mövqe vədlərinə yox, iş həcminə, hesabatın şəffaflığına və hesabların sizdə qalmasına baxın. Saytınızın vəziyyətini bilmək istəyirsinizsə, <a href="/seo-xidmeti">SEO xidməti</a> səhifəsinə baxa və ya <a href="/elaqe">bizimlə əlaqə saxlaya</a> bilərsiniz.</p>
<p><small><em>Qiymətlər Azərbaycan bazarı üzrə təxmini diapazonlardır (noyabr 2026). AI Overviews və AI Mode haqqında məlumat Google Search Central-ın rəsmi "AI features and your website" sənədinə (developers.google.com/search) əsaslanır.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>Pick up your phone and search Google for something related to your business: "dental clinic Baku", "air conditioner repair" or "website development". Is your site in the top results? If not, that customer goes to a competitor every day. SEO (search engine optimisation) is the work that makes your site appear in these searches in the organic, ad-free results.</p>
<p>A business owner who wants to order SEO usually has three questions: how much does it cost, when will results show, and what exactly is done for the monthly fee? This guide answers all three for 2027: what an SEO service includes, approximate prices in Azerbaijan, realistic timelines, how to measure results, how Google's <strong>AI Overviews and AI Mode</strong> affect SEO, which offers to avoid, and who is best placed to do the work.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What is SEO?</td><td>Technical, content and local work that moves a site up in Google's organic, unpaid results</td></tr>
    <tr><td>How much does it cost?</td><td>SEO audit AZN 150–500 (one-off), monthly SEO AZN 300–1,000, AZN 1,000–3,000+ per month in competitive niches</td></tr>
    <tr><td>When do results show?</td><td>Usually 3–6 months; longer for competitive keywords</td></tr>
    <tr><td>Is there a guarantee?</td><td>No one can guarantee a specific ranking. Google decides the order; what you measure is technical health, traffic and leads</td></tr>
    <tr><td>Is extra work needed for AI answers?</td><td>According to Google, no: the page must be indexed and eligible to be shown with a snippet</td></tr>
  </tbody>
</table>

<h2>What Does an SEO Service Include?</h2>
<p>Good SEO is parallel work in several areas. When you get a quote, ask in writing what will be done in each one. A general sentence such as "we will optimise the site" is not enough.</p>

<h3>1. Technical SEO</h3>
<ul>
  <li><strong>Crawling and indexing:</strong> <code>robots.txt</code>, XML sitemap, canonical tags, broken pages (404), redirects (301), duplicate pages. If Google cannot see a page, it will not show it for any query.</li>
  <li><strong>Speed and mobile friendliness:</strong> Google's Core Web Vitals (LCP, INP, CLS), image sizes, caching. More: <a href="/blog-details/website-speed-core-web-vitals-2026">website speed and Core Web Vitals</a>.</li>
  <li><strong>hreflang on multilingual sites:</strong> linking the Azerbaijani, Russian and English versions correctly. Many customers in Azerbaijan search in Russian, so the Russian version is a separate source of traffic.</li>
  <li><strong>Structured data (schema.org):</strong> marking up company, article, service and Q&amp;A information for Google. The markup must match the visible text on the page.</li>
</ul>

<h3>2. On-page SEO</h3>
<ul>
  <li>Writing each page's <code>title</code> and meta description to match the query.</li>
  <li>Heading structure (H1, H2), internal links, image alt text.</li>
  <li>A separate page for each service. The home page cannot rank for every keyword at once.</li>
  <li>Short, clear URLs and 301 redirects from old URLs to new ones.</li>
</ul>

<h3>3. Keyword research and content</h3>
<ul>
  <li>Finding the words customers actually search, separately in Azerbaijani and Russian, because the queries differ.</li>
  <li>Understanding search intent: "what is SEO" is someone who wants to read, "SEO service price" is a customer close to buying.</li>
  <li>Articles that answer customer questions: prices, comparisons, "how to choose", industry guides.</li>
  <li>Updating old and weak pages, which often brings results faster than writing new ones.</li>
</ul>

<h3>4. Local SEO and Google Business Profile</h3>
<ul>
  <li>Google Business Profile: the most important step for appearing on Maps and in "near me" searches. Step by step: <a href="/blog-details/how-to-create-google-business-profile-2026">how to create a Google Business Profile</a>.</li>
  <li>The same name, address, phone and opening hours on the site, the profile and directories.</li>
  <li>Customer reviews and timely replies to them.</li>
  <li>A separate profile and a separate page for each branch, if you have several.</li>
</ul>

<h3>5. Links (backlinks)</h3>
<ul>
  <li>Natural links from trustworthy sites: partners, news sites, industry directories, associations.</li>
  <li>Staying away from spam and bought link packages. Google's spam policies treat buying and selling links to manipulate rankings as a violation. More: <a href="/what-is-backlink">what is a backlink</a>.</li>
</ul>

<h2>SEO Prices in 2027</h2>
<table>
  <thead>
    <tr><th>Service</th><th>Price (AZN)</th><th>What is included</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO audit</td><td>150 – 500, one-off</td><td>Technical check, speed, indexing, prioritised task list</td></tr>
    <tr><td>Monthly SEO</td><td>300 – 1,000 / month</td><td>Keyword research, on-page optimisation, content, local SEO</td></tr>
    <tr><td>Competitive niches</td><td>1,000 – 3,000+ / month</td><td>Extended content plan, link earning, several languages and regions</td></tr>
  </tbody>
</table>
<p>Prices are estimates and depend on competition and the current state of the site. These are the same ranges as on our <a href="/seo-services">SEO services</a> page.</p>

<h3>What changes the price?</h3>
<ul>
  <li><strong>Competition in your niche:</strong> "café Ganja" and "loan Baku" require completely different amounts of work.</li>
  <li><strong>Technical state of the site:</strong> on an old, slow or badly built site the first months go into fixes.</li>
  <li><strong>Number of pages and languages:</strong> a three-language site means three keyword lists and three times the content.</li>
  <li><strong>Target regions:</strong> Baku only, the whole of Azerbaijan or a foreign market.</li>
  <li><strong>Volume of new content:</strong> how many articles or new service pages are prepared each month.</li>
</ul>
<p>If the site is old or very slow, rebuilding it before spending on SEO may be better value. To budget for a site: <a href="/blog-details/website-cost-azerbaijan-2027">website cost in Azerbaijan 2027</a>.</p>

<h2>When Do Results Come?</h2>
<p>SEO results usually show within 3–6 months. This is a typical expectation, not a promise: a new domain, strong competitors or serious technical problems make it longer. The usual sequence looks like this:</p>
<table>
  <thead>
    <tr><th>Period</th><th>What happens</th></tr>
  </thead>
  <tbody>
    <tr><td>Month 1</td><td>Audit, technical fixes, setting up Search Console and analytics</td></tr>
    <tr><td>Months 2–3</td><td>New and updated pages are indexed, first rankings appear for low-competition keywords</td></tr>
    <tr><td>Months 4–6</td><td>Movement on main keywords, more clicks and leads</td></tr>
    <tr><td>6+ months</td><td>More stable traffic; rankings strengthen as content and link work continue</td></tr>
  </tbody>
</table>
<p>Technical fixes (for example, getting de-indexed pages back) sometimes have an effect within a few weeks. Competitive keywords can take more than 6 months. If you need customers right away, you can run ads alongside SEO: <a href="/blog-details/google-ads-azerbaijan-cost-guide-2027">Google Ads in Azerbaijan 2027</a>. Ads bring traffic immediately but stop when you stop paying; SEO starts slower but brings long-term free traffic.</p>

<h2>How to Measure Results</h2>
<p>Asking only "what position are we on for this keyword" is misleading: rankings change by device, city and user. Look at these metrics in the monthly report:</p>
<ol>
  <li><strong>Google Search Console:</strong> impressions, clicks, CTR and average position. This is Google's own data, and it is free.</li>
  <li><strong>Indexed pages:</strong> are all important pages in the index, are there new errors?</li>
  <li><strong>Movement by keyword group:</strong> look at groups of keywords per service, not a single word.</li>
  <li><strong>Organic traffic:</strong> visits from the "Organic Search" channel in Google Analytics 4.</li>
  <li><strong>Leads:</strong> calls, WhatsApp messages, forms, orders. This is the final goal of SEO.</li>
</ol>
<p>An important rule: Search Console and Analytics accounts must be <strong>in your name</strong>. If you change agency, the data stays with you.</p>

<h3>Free steps you can take before hiring an SEO service</h3>
<ul>
  <li>Verify the site in Google Search Console and submit a sitemap. The "Pages" report shows which pages are not indexed.</li>
  <li>Create a Google Business Profile, fill in the category, opening hours and photos, and ask customers for reviews.</li>
  <li>Check that each main service has its own page with the service name and city in its title.</li>
  <li>Open the site on a phone: if it is slow or the buttons are small, write it down.</li>
  <li>List the 5 questions customers ask most often. Each one is a topic for a future article.</li>
</ul>
<p>These steps do not replace professional SEO, but they help you understand what matters in an audit and compare offers more accurately.</p>

<h2>Google AI Overviews and AI Mode: How Is SEO Changing?</h2>
<p>Google search now shows answers generated by AI: <strong>AI Overviews</strong> above the results and <strong>AI Mode</strong>, a separate conversational mode. These answers link to websites as sources. So how do you appear there? According to Google's official documentation:</p>
<ul>
  <li>There are <strong>no additional requirements or special optimisations</strong> for appearing in AI Overviews and AI Mode. Normal SEO best practices still apply.</li>
  <li>The page must be <strong>indexed in Google and eligible to be shown in search with a snippet</strong>.</li>
  <li>You do not need to create new machine-readable files, "AI text files" (such as llms.txt) or special markup.</li>
  <li>Structured data must match the visible text on the page.</li>
</ul>
<p>In practice, pages that are cited more often in AI answers have these things in common:</p>
<ol>
  <li><strong>A direct answer to the question:</strong> a clear 1–2 sentence answer after the heading, then the details.</li>
  <li><strong>Tables and lists:</strong> prices, comparisons and steps are structured.</li>
  <li><strong>Concrete facts and sources:</strong> figures are based on official sources, with dates.</li>
  <li><strong>Local context:</strong> Azerbaijani laws, prices and cities. Information that global articles cannot give.</li>
  <li><strong>Clear information about the company:</strong> who wrote it, contacts, address, social profiles.</li>
</ol>
<p>It is also useful to know: the <code>Google-Extended</code> token in robots.txt controls how Google uses content in other systems such as Gemini, but it does not affect Google Search. Appearing in search depends on Googlebot being allowed to crawl the site. For ChatGPT and Gemini answers, see: <a href="/blog-details/how-to-appear-in-chatgpt-gemini-google-ai-answers-2027">how to appear in ChatGPT, Gemini and Google AI answers</a>.</p>

<h2>Red Flags: Offers to Avoid</h2>
<ul>
  <li><strong>"Guaranteed #1 on Google":</strong> Google itself states that no one can guarantee a specific ranking. Such a promise is either false or a "guarantee" for a keyword nobody searches.</li>
  <li><strong>Packages like "100 backlinks for 50 manat":</strong> cheap link packages usually come from spam sites and can harm the site.</li>
  <li><strong>Hidden work:</strong> you are not shown what was done, and the report only lists rankings for a few keywords.</li>
  <li><strong>Accounts in the agency's name:</strong> you are not given access to Search Console, Analytics or Google Business Profile.</li>
  <li><strong>Automated or copied content:</strong> hundreds of near-identical pages, machine translation, text taken from other sites.</li>
  <li><strong>"Results in a week":</strong> stable results in organic search this fast are not a realistic expectation.</li>
  <li><strong>No contract, or a long mandatory one:</strong> the scope of work is not written down and leaving is hard.</li>
</ul>

<h2>In-House Specialist, Agency or Freelancer?</h2>
<table>
  <thead>
    <tr><th>Option</th><th>Advantage</th><th>Risk</th><th>Best for</th></tr>
  </thead>
  <tbody>
    <tr><td>In-house SEO specialist</td><td>Knows the business well, works on your project full time</td><td>Salary and tax costs; one person rarely masters technical, content and link work</td><td>Large sites, online stores, a steady stream of content</td></tr>
    <tr><td>Agency</td><td>Technical, content and analytics in one place; process and reporting</td><td>Monthly fee; a small project can get less attention</td><td>Small and medium businesses, service companies, multilingual sites</td></tr>
    <tr><td>Freelancer</td><td>Usually cheaper, flexible</td><td>Dependence on one person; work stops during illness or busy periods</td><td>Small sites, a one-off audit or a narrow task</td></tr>
  </tbody>
</table>
<p>In-house salaries and freelancer rates vary widely on the market, so we do not give specific figures here. Whichever option you choose, the measurement rules above are the same: the accounts are yours, the work is written down, and results are measured in traffic and leads.</p>

<h2>Checklist Before Ordering SEO</h2>
<ol>
  <li>Which services and which region do you want customers for? Write them in one list.</li>
  <li>Are Search Console and Analytics set up, and are they in your name?</li>
  <li>Does each main service have its own page on the site?</li>
  <li>Does the site load quickly on a mobile phone?</li>
  <li>Has your Google Business Profile been created and verified?</li>
  <li>Does the quote describe the audit, the monthly scope of work and the report format?</li>
  <li>Has it been explained where links will come from?</li>
  <li>Who will write the content, and who will check its quality in Azerbaijani and Russian?</li>
  <li>Does the contract cover exit terms and handing over accounts?</li>
  <li>Do you have a budget for at least 6 months? Stopping SEO after 1–2 months usually means wasting the money.</li>
</ol>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much do SEO services cost in Azerbaijan in 2027?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Approximately: an SEO audit costs AZN 150–500 one-off, monthly SEO AZN 300–1,000, and AZN 1,000–3,000 or more in competitive niches. The price depends on competition, the state of the site and the number of languages and pages.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">When does SEO start working?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Usually within 3–6 months. Technical fixes can help quickly; competitive keywords take longer.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can anyone guarantee the #1 spot on Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. Google itself states that no one can guarantee a specific ranking. What should be measured is technical health, organic traffic and leads.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What do I need to do to appear in Google AI Overviews and AI Mode?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">According to Google's official guidance, there are no special requirements: the page must be indexed and eligible to be shown in search with a snippet. No special file such as llms.txt or special markup is needed. Good SEO is exactly that work.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO or Google Ads?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ads bring traffic immediately but stop when you stop paying. SEO starts slower but brings long-term free traffic. Often the best approach is to run both together.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is local SEO?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Work on your Google Business Profile, consistent address and contact details and reviews, so you appear on the map and in "near me" searches.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/how-to-create-google-business-profile-2026">How to create a Google Business Profile</a></li>
  <li><a href="/blog-details/website-speed-core-web-vitals-2026">Website speed and Core Web Vitals</a></li>
  <li><a href="/blog-details/how-to-appear-in-chatgpt-gemini-google-ai-answers-2027">How to appear in ChatGPT, Gemini and Google AI answers</a></li>
  <li><a href="/what-is-backlink">What is a backlink?</a></li>
  <li><a href="/blog-details/website-cost-azerbaijan-2027">Website cost in Azerbaijan 2027</a></li>
</ul>

<h2>Conclusion</h2>
<p>In 2027, an SEO service still comes down to three things: the technical health of the site, content that answers customer questions, and local trust. In Azerbaijan an audit costs about AZN 150–500 and monthly SEO AZN 300–1,000, more in competitive niches, and results usually show within 3–6 months. Google's AI answers do not change these rules; they reinforce them: clear, structured, fact-based sites with local information appear more often both in regular results and in AI answers.</p>
<p>When comparing offers, look at the scope of work, how transparent the reporting is and whether the accounts stay with you, not at ranking promises. If you want to know where your site stands, see our <a href="/seo-services">SEO services</a> page or <a href="/contact">get in touch with us</a>.</p>
<p><small><em>Prices are estimated ranges for the Azerbaijani market (November 2026). Information on AI Overviews and AI Mode is based on Google Search Central's official "AI features and your website" documentation (developers.google.com/search).</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Возьмите телефон и поищите в Google запрос, связанный с вашим бизнесом: «стоматология Баку», «ремонт кондиционеров» или «разработка сайтов». Есть ли ваш сайт в первых результатах? Если нет, этот клиент каждый день уходит к конкуренту. SEO (поисковая оптимизация) — это работа, благодаря которой сайт появляется в таких запросах в органической выдаче, без рекламы.</p>
<p>У владельца бизнеса, который хочет заказать SEO, обычно три вопроса: сколько это стоит, когда будет результат и что конкретно делается за ежемесячную оплату? В этом руководстве мы отвечаем на все три для 2027 года: что входит в SEO-услуги, ориентировочные цены в Азербайджане, реальные сроки, как измерять результат, как ответы Google <strong>AI Overviews и AI Mode</strong> влияют на SEO, каких предложений избегать и кому выгоднее поручить работу.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Что такое SEO?</td><td>Техническая, контентная и локальная работа, которая поднимает сайт в органической (бесплатной) выдаче Google</td></tr>
    <tr><td>Сколько стоит?</td><td>SEO-аудит 150–500 AZN (разово), ежемесячное SEO 300–1 000 AZN, в конкурентных нишах 1 000–3 000+ AZN в месяц</td></tr>
    <tr><td>Когда виден результат?</td><td>Обычно через 3–6 месяцев; по конкурентным запросам дольше</td></tr>
    <tr><td>Есть ли гарантия?</td><td>Гарантировать конкретную позицию не может никто. Порядок выдачи определяет Google; измеряются техническое состояние, трафик и заявки</td></tr>
    <tr><td>Нужна ли отдельная работа для ИИ-ответов?</td><td>По данным Google, нет: страница должна быть проиндексирована и подходить для показа со сниппетом</td></tr>
  </tbody>
</table>

<h2>Что входит в SEO-услуги?</h2>
<p>Хорошее SEO — это параллельная работа по нескольким направлениям. Получая предложение, попросите письменно описать, что будет сделано по каждому из них. Общей фразы «мы оптимизируем сайт» недостаточно.</p>

<h3>1. Техническое SEO</h3>
<ul>
  <li><strong>Сканирование и индексация:</strong> <code>robots.txt</code>, XML-карта сайта, canonical, битые страницы (404), редиректы (301), дубли страниц. Если Google не видит страницу, он не покажет её ни по одному запросу.</li>
  <li><strong>Скорость и мобильная адаптация:</strong> показатели Core Web Vitals (LCP, INP, CLS), размер изображений, кеширование. Подробнее: <a href="/blog-details/skorost-sajta-core-web-vitals-2026">скорость сайта и Core Web Vitals</a>.</li>
  <li><strong>hreflang на многоязычных сайтах:</strong> правильная связка азербайджанской, русской и английской версий. Многие клиенты в Азербайджане ищут на русском, поэтому русская версия — отдельный источник трафика.</li>
  <li><strong>Структурированные данные (schema.org):</strong> разметка информации о компании, статьях, услугах и вопросах-ответах для Google. Разметка должна соответствовать видимому тексту страницы.</li>
</ul>

<h3>2. Оптимизация страниц (on-page)</h3>
<ul>
  <li>Заголовок <code>title</code> и мета-описание каждой страницы под запрос.</li>
  <li>Структура заголовков (H1, H2), внутренние ссылки, alt-текст изображений.</li>
  <li>Отдельная страница под каждую услугу. Главная не может ранжироваться сразу по всем запросам.</li>
  <li>Короткие понятные URL и 301-редиректы со старых адресов на новые.</li>
</ul>

<h3>3. Подбор ключевых слов и контент</h3>
<ul>
  <li>Поиск слов, которые реально ищут клиенты, отдельно на азербайджанском и русском, потому что запросы отличаются.</li>
  <li>Определение намерения: «что такое SEO» ищет тот, кто хочет почитать, а «цена SEO-услуг» — клиент, близкий к заказу.</li>
  <li>Статьи, которые отвечают на вопросы клиентов: цены, сравнения, «как выбрать», отраслевые руководства.</li>
  <li>Обновление старых и слабых страниц — часто это даёт результат быстрее, чем новые статьи.</li>
</ul>

<h3>4. Локальное SEO и Google Business Profile</h3>
<ul>
  <li>Google Business Profile — самый важный шаг для показа на Картах и в запросах «рядом со мной». Пошагово: <a href="/blog-details/kak-sozdat-google-business-profile-2026">как создать Google Business Profile</a>.</li>
  <li>Одинаковые название, адрес, телефон и часы работы на сайте, в профиле и каталогах.</li>
  <li>Отзывы клиентов и своевременные ответы на них.</li>
  <li>Отдельный профиль и отдельная страница для каждого филиала, если их несколько.</li>
</ul>

<h3>5. Ссылки (бэклинки)</h3>
<ul>
  <li>Естественные ссылки с надёжных сайтов: партнёры, новостные сайты, отраслевые каталоги, ассоциации.</li>
  <li>Никакого спама и купленных пакетов ссылок. Правила Google о спаме считают покупку и продажу ссылок для влияния на ранжирование нарушением. Подробнее: <a href="/chto-takoe-backlink">что такое бэклинк</a>.</li>
</ul>

<h2>Цены на SEO в 2027 году</h2>
<table>
  <thead>
    <tr><th>Услуга</th><th>Цена (AZN)</th><th>Что входит</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO-аудит</td><td>150 – 500, разово</td><td>Технический аудит, скорость, индексация, приоритетный список задач</td></tr>
    <tr><td>Ежемесячное SEO</td><td>300 – 1 000 / мес</td><td>Подбор ключевых слов, оптимизация страниц, контент, локальное SEO</td></tr>
    <tr><td>Конкурентные ниши</td><td>1 000 – 3 000+ / мес</td><td>Расширенный контент-план, получение ссылок, несколько языков и регионов</td></tr>
  </tbody>
</table>
<p>Цены ориентировочные и зависят от конкуренции и состояния сайта. Это те же диапазоны, что и на нашей странице <a href="/seo-uslugi">SEO-услуг</a>.</p>

<h3>От чего зависит цена?</h3>
<ul>
  <li><strong>Конкуренция в нише:</strong> запросы «кафе Гянджа» и «кредит Баку» требуют совершенно разного объёма работы.</li>
  <li><strong>Техническое состояние сайта:</strong> на старом, медленном или неправильно сделанном сайте первые месяцы уходят на исправления.</li>
  <li><strong>Количество страниц и языков:</strong> трёхъязычный сайт — это три списка ключевых слов и втрое больше контента.</li>
  <li><strong>Целевые регионы:</strong> только Баку, весь Азербайджан или зарубежный рынок.</li>
  <li><strong>Объём нового контента:</strong> сколько статей или новых страниц услуг готовится в месяц.</li>
</ul>
<p>Если сайт старый или очень медленный, иногда выгоднее сначала обновить его, а потом вкладываться в SEO. Чтобы оценить бюджет на сайт: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2027">стоимость веб-сайта в Азербайджане 2027</a>.</p>

<h2>Когда появляется результат?</h2>
<p>Результат SEO обычно виден в течение 3–6 месяцев. Это типичное ожидание, а не обещание: новый домен, сильные конкуренты или серьёзные технические проблемы удлиняют срок. Обычная последовательность такая:</p>
<table>
  <thead>
    <tr><th>Период</th><th>Что происходит</th></tr>
  </thead>
  <tbody>
    <tr><td>1-й месяц</td><td>Аудит, технические правки, настройка Search Console и аналитики</td></tr>
    <tr><td>2–3-й месяц</td><td>Новые и обновлённые страницы индексируются, первые позиции по низкоконкурентным запросам</td></tr>
    <tr><td>4–6-й месяц</td><td>Движение по основным запросам, рост кликов и заявок</td></tr>
    <tr><td>6+ месяцев</td><td>Более стабильный трафик; позиции укрепляются по мере работы с контентом и ссылками</td></tr>
  </tbody>
</table>
<p>Технические исправления (например, возврат выпавших из индекса страниц) иногда дают эффект за несколько недель. По конкурентным запросам может понадобиться больше 6 месяцев. Если клиенты нужны сразу, параллельно с SEO можно запустить рекламу: <a href="/blog-details/google-ads-azerbaydzhan-2027">Google Ads в Азербайджане 2027</a>. Реклама даёт трафик сразу, но останавливается вместе с оплатой; SEO стартует медленнее, но приносит долгосрочный бесплатный трафик.</p>

<h2>Как измерять результат</h2>
<p>Вопрос «на каком мы месте по этому слову» вводит в заблуждение: позиция зависит от устройства, города и пользователя. В ежемесячном отчёте смотрите на эти показатели:</p>
<ol>
  <li><strong>Google Search Console:</strong> показы, клики, CTR и средняя позиция. Это данные самого Google, и они бесплатны.</li>
  <li><strong>Проиндексированные страницы:</strong> все ли важные страницы в индексе, нет ли новых ошибок.</li>
  <li><strong>Движение по группам запросов:</strong> смотрите на группы запросов по каждой услуге, а не на одно слово.</li>
  <li><strong>Органический трафик:</strong> визиты из канала «Organic Search» в Google Analytics 4.</li>
  <li><strong>Заявки:</strong> звонки, сообщения в WhatsApp, формы, заказы. Это и есть конечная цель SEO.</li>
</ol>
<p>Важное правило: аккаунты Search Console и Analytics должны быть <strong>оформлены на вас</strong>. Если вы смените подрядчика, данные останутся у вас.</p>

<h3>Бесплатные шаги, которые можно сделать до заказа SEO</h3>
<ul>
  <li>Подтвердите сайт в Google Search Console и отправьте карту сайта. Отчёт «Страницы» покажет, какие страницы не проиндексированы.</li>
  <li>Создайте Google Business Profile, заполните категорию, часы работы и фото, попросите клиентов оставить отзывы.</li>
  <li>Проверьте, что у каждой основной услуги есть своя страница с названием услуги и города в заголовке.</li>
  <li>Откройте сайт на телефоне: если он медленный или кнопки мелкие, запишите это.</li>
  <li>Выпишите 5 вопросов, которые клиенты задают чаще всего. Каждый из них — тема будущей статьи.</li>
</ul>
<p>Эти шаги не заменяют профессиональное SEO, но помогают понять, что важно в аудите, и точнее сравнивать предложения.</p>

<h2>Google AI Overviews и AI Mode: как меняется SEO?</h2>
<p>Google уже показывает в поиске ответы, сгенерированные ИИ: <strong>AI Overviews</strong> над результатами и отдельный диалоговый режим <strong>AI Mode</strong>. Эти ответы ссылаются на сайты как на источники. Как туда попасть? Согласно официальной документации Google:</p>
<ul>
  <li>Для показа в AI Overviews и AI Mode <strong>нет дополнительных требований или специальной оптимизации</strong>. Действуют обычные правила SEO.</li>
  <li>Страница должна быть <strong>проиндексирована и подходить для показа в поиске со сниппетом</strong>.</li>
  <li>Создавать новые машиночитаемые файлы, «ИИ-текстовые файлы» (например, llms.txt) или специальную разметку не нужно.</li>
  <li>Структурированные данные должны соответствовать видимому тексту страницы.</li>
</ul>
<p>На практике страницы, которые чаще цитируются в ИИ-ответах, объединяет следующее:</p>
<ol>
  <li><strong>Прямой ответ на вопрос:</strong> чёткий ответ в 1–2 предложения после заголовка, затем подробности.</li>
  <li><strong>Таблицы и списки:</strong> цены, сравнения и шаги даны структурно.</li>
  <li><strong>Конкретные факты и источники:</strong> цифры из официальных источников, с датой.</li>
  <li><strong>Локальный контекст:</strong> законы, цены, города Азербайджана. То, чего нет в глобальных статьях.</li>
  <li><strong>Понятная информация о компании:</strong> кто автор, контакты, адрес, профили в соцсетях.</li>
</ol>
<p>Полезно знать: токен <code>Google-Extended</code> в robots.txt управляет использованием контента в других системах Google, например Gemini, но не влияет на Google Поиск. Показ в поиске зависит от того, разрешено ли Googlebot сканировать сайт. Про ответы ChatGPT и Gemini подробнее: <a href="/blog-details/kak-popast-v-otvety-chatgpt-gemini-google-ai-2027">как попасть в ответы ChatGPT, Gemini и Google AI</a>.</p>

<h2>Тревожные сигналы: от каких предложений отказаться</h2>
<ul>
  <li><strong>«Гарантия 1-го места в Google»:</strong> сам Google указывает, что никто не может гарантировать конкретную позицию. Такое обещание либо ложь, либо «гарантия» по запросу, который никто не ищет.</li>
  <li><strong>Пакеты вроде «100 бэклинков за 50 манатов»:</strong> дешёвые пакеты ссылок обычно идут со спам-сайтов и могут навредить сайту.</li>
  <li><strong>Скрытая работа:</strong> вам не показывают, что сделано, а в отчёте только позиции нескольких слов.</li>
  <li><strong>Аккаунты на подрядчика:</strong> вам не дают доступ к Search Console, Analytics или Google Business Profile.</li>
  <li><strong>Автоматический или скопированный контент:</strong> сотни однотипных страниц, машинный перевод, тексты с чужих сайтов.</li>
  <li><strong>«Результат за неделю»:</strong> стабильный результат в органической выдаче так быстро — нереалистичное ожидание.</li>
  <li><strong>Без договора или с долгим обязательным договором:</strong> объём работ не прописан, а уйти сложно.</li>
</ul>

<h2>Штатный специалист, агентство или фрилансер?</h2>
<table>
  <thead>
    <tr><th>Вариант</th><th>Плюс</th><th>Риск</th><th>Кому подходит</th></tr>
  </thead>
  <tbody>
    <tr><td>Штатный SEO-специалист</td><td>Хорошо знает бизнес, работает только над вашим проектом</td><td>Зарплата и налоги; один человек редко владеет и техникой, и контентом, и ссылками</td><td>Крупные сайты, интернет-магазины, постоянный поток контента</td></tr>
    <tr><td>Агентство</td><td>Техника, контент и аналитика в одном месте; процесс и отчётность</td><td>Ежемесячная оплата; маленькому проекту может доставаться меньше внимания</td><td>Малый и средний бизнес, сервисные компании, многоязычные сайты</td></tr>
    <tr><td>Фрилансер</td><td>Обычно дешевле, гибкость</td><td>Зависимость от одного человека; при болезни или загрузке работа встаёт</td><td>Небольшие сайты, разовый аудит или узкая задача</td></tr>
  </tbody>
</table>
<p>Зарплаты штатных специалистов и ставки фрилансеров на рынке сильно различаются, поэтому конкретных цифр здесь не приводим. Какой бы вариант вы ни выбрали, правила измерения одинаковые: аккаунты у вас, работа прописана, результат измеряется трафиком и заявками.</p>

<h2>Чек-лист перед заказом SEO</h2>
<ol>
  <li>По каким услугам и в каком регионе вам нужны клиенты? Запишите это одним списком.</li>
  <li>Настроены ли Search Console и Analytics и оформлены ли они на вас?</li>
  <li>Есть ли на сайте отдельная страница под каждую основную услугу?</li>
  <li>Быстро ли сайт открывается на мобильном телефоне?</li>
  <li>Создан и подтверждён ли Google Business Profile?</li>
  <li>Описаны ли в предложении аудит, ежемесячный объём работ и формат отчёта?</li>
  <li>Объяснили ли вам, откуда будут ссылки?</li>
  <li>Кто будет писать контент и кто проверит его качество на азербайджанском и русском?</li>
  <li>Есть ли в договоре условия выхода и передачи аккаунтов?</li>
  <li>Есть ли у вас бюджет минимум на 6 месяцев? Остановить SEO через 1–2 месяца обычно значит потратить деньги впустую.</li>
</ol>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоят SEO-услуги в Азербайджане в 2027 году?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ориентировочно: SEO-аудит 150–500 AZN разово, ежемесячное SEO 300–1 000 AZN, в конкурентных нишах 1 000–3 000 AZN и выше. Цена зависит от конкуренции, состояния сайта, количества языков и страниц.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда SEO начинает работать?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Обычно в течение 3–6 месяцев. Технические исправления могут дать эффект быстро, по конкурентным запросам нужно больше времени.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли гарантировать первое место в Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Сам Google указывает, что никто не может гарантировать конкретную позицию. Измерять нужно техническое состояние, органический трафик и заявки.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что нужно сделать, чтобы появиться в Google AI Overviews и AI Mode?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Согласно официальным рекомендациям Google, особых требований нет: страница должна быть проиндексирована и подходить для показа в поиске со сниппетом. Специальный файл вроде llms.txt или особая разметка не нужны. Качественное SEO — это и есть такая работа.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO или реклама в Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Реклама даёт трафик сразу, но останавливается вместе с оплатой. SEO стартует медленнее, но приносит долгосрочный бесплатный трафик. Часто лучший подход — использовать оба канала вместе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое локальное SEO?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Работа с Google Business Profile, единообразием адреса и контактов и отзывами, чтобы появляться на карте и в поиске «рядом со мной».</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/kak-sozdat-google-business-profile-2026">Как создать Google Business Profile</a></li>
  <li><a href="/blog-details/skorost-sajta-core-web-vitals-2026">Скорость сайта и Core Web Vitals</a></li>
  <li><a href="/blog-details/kak-popast-v-otvety-chatgpt-gemini-google-ai-2027">Как попасть в ответы ChatGPT, Gemini и Google AI</a></li>
  <li><a href="/chto-takoe-backlink">Что такое бэклинк?</a></li>
  <li><a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2027">Стоимость веб-сайта в Азербайджане 2027</a></li>
</ul>

<h2>Итог</h2>
<p>В 2027 году SEO-услуги по-прежнему сводятся к трём вещам: техническое здоровье сайта, контент, отвечающий на вопросы клиентов, и локальное доверие. В Азербайджане аудит стоит примерно 150–500 AZN, ежемесячное SEO — 300–1 000 AZN, в конкурентных нишах дороже, а результат обычно виден через 3–6 месяцев. ИИ-ответы Google не меняют эти правила, а усиливают их: понятные, структурированные, основанные на фактах сайты с локальной информацией чаще появляются и в обычной выдаче, и в ИИ-ответах.</p>
<p>Сравнивая предложения, смотрите не на обещания позиций, а на объём работ, прозрачность отчётов и на то, остаются ли аккаунты у вас. Если хотите понять, в каком состоянии ваш сайт, загляните на страницу <a href="/seo-uslugi">SEO-услуг</a> или <a href="/kontakty">свяжитесь с нами</a>.</p>
<p><small><em>Цены — ориентировочные диапазоны рынка Азербайджана (ноябрь 2026). Информация об AI Overviews и AI Mode основана на официальной документации Google Search Central «AI features and your website» (developers.google.com/search).</em></small></p>
HTML;

        $old = [
            'az' => 'seo-xidmeti-azerbaycan-2026',
            'en' => 'why-you-need-seo-services-2026',
            'ru' => 'zachem-nuzhny-seo-uslugi-2026',
        ];
        $new = [
            'az' => 'seo-xidmeti-azerbaycan-2027',
            'en' => 'seo-services-azerbaijan-2027',
            'ru' => 'seo-uslugi-azerbajdzhan-2027',
        ];

        $row = DB::table('blogs')->whereIn('slug_az', [$old['az'], $new['az']])->orderBy('id')->first();
        $backup = storage_path('app/blog19-pre2027-backup.json');
        if ($row && $row->slug_az === $old['az'] && ! file_exists($backup)) {
            file_put_contents($backup, json_encode($row, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }

        $data = [
            'slug_az' => $new['az'],
            'slug_en' => $new['en'],
            'slug_ru' => $new['ru'],
            'title_az' => 'SEO Xidməti Azərbaycanda 2027: Qiymət, Nəticə Müddəti və Nələr Daxildir',
            'title_en' => 'SEO Services in Azerbaijan 2027: Prices, Time to Results and What Is Included',
            'title_ru' => 'SEO-услуги в Азербайджане 2027: цены, сроки результата и что входит',
            'review_az' => '2027-ci ildə Azərbaycanda SEO xidməti: nələr daxildir (texniki, on-page, məzmun, lokal SEO, keçidlər), qiymətlər (audit 150–500 AZN, aylıq 300–1 000 AZN), nəticə müddəti, ölçmə, Google AI Overviews, qırmızı bayraqlar və yoxlama siyahısı.',
            'review_en' => 'SEO services in Azerbaijan in 2027: what is included (technical, on-page, content, local SEO, links), prices (audit AZN 150–500, monthly AZN 300–1,000), time to results, measurement, Google AI Overviews, red flags and a checklist.',
            'review_ru' => 'SEO-услуги в Азербайджане в 2027 году: что входит (техническое SEO, страницы, контент, локальное SEO, ссылки), цены (аудит 150–500 AZN, ежемесячно 300–1 000 AZN), сроки, измерение результата, Google AI Overviews, тревожные сигналы и чек-лист.',
            'date_az' => '23 Noyabr 2026',
            'date_en' => 'November 23, 2026',
            'date_ru' => '23 Ноября 2026',
            'photo' => 'cover-seo-service-2027-az.png',
            'photo_en' => 'cover-seo-service-2027-en.png',
            'photo_ru' => 'cover-seo-service-2027-ru.png',
            'meta_title_az' => 'SEO Xidməti Azərbaycanda 2027: Qiymət və Müddət | RS Code',
            'meta_title_en' => 'SEO Services in Azerbaijan 2027: Prices & Timeline | RS Code',
            'meta_title_ru' => 'SEO-услуги в Азербайджане 2027: цены и сроки | RS Code',
            'meta_description_az' => 'SEO xidməti neçəyə başa gəlir? Audit 150–500 AZN, aylıq SEO 300–1 000 AZN. Nələr daxildir, nəticə nə vaxt gəlir, necə ölçülür və AI Overviews 2027.',
            'meta_description_en' => 'How much do SEO services cost? Audit AZN 150–500, monthly SEO AZN 300–1,000. What is included, when results come, how to measure them and AI Overviews in 2027.',
            'meta_description_ru' => 'Сколько стоит SEO? Аудит 150–500 AZN, ежемесячное SEO 300–1 000 AZN. Что входит, когда будет результат, как его измерить и AI Overviews в 2027 году.',
            'meta_keywords_az' => 'seo xidməti, seo xidməti qiyməti, seo xidməti 2027, seo azərbaycan, seo bakı, seo auditi, lokal seo, google ai overviews',
            'meta_keywords_en' => 'seo services azerbaijan, seo price baku, seo services 2027, seo audit cost, local seo azerbaijan, google ai overviews seo',
            'meta_keywords_ru' => 'seo услуги баку, стоимость seo азербайджан, seo 2027, seo аудит цена, локальное seo, продвижение сайта баку, google ai overviews',
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
                // Yeni #19 slug-una gedən linklərin anker mətnindəki sondakı "2026" → "2027".
                $n = preg_replace_callback(
                    '~(<a href="/blog-details/'.preg_quote($new[$l], '~').'"[^>]*>[^<]*?)2026(</a>)~u',
                    fn ($m) => $m[1].'2027'.$m[2],
                    $n
                );
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
