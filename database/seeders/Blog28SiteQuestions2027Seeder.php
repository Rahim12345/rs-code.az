<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #28-in 2027 yenilənməsi (əvvəl "12 sual", 8 May 2026) — sayt sifarişindən əvvəl veb studiyaya verilməli 15 sual (2027). Qərar mərhələsi yazısı; /veb-saytlarin-hazirlanmasi səhifəsini dəstəkləyir.
 * #40 (brif — müştəri doldurur) və #32 (platforma müqayisəsi) ilə üst-üstə düşmür: burada müştəri studiyanı yoxlayır.
 * Konkret bazar qiyməti VERİLMİR — qiymət üçün #17-yə link. Rəqib adı çəkilmir.
 */
class Blog28SiteQuestions2027Seeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Sayt sifariş edən sahibkar adətən üç-dörd studiyadan qiymət alır və rəqəmlər arasında bir neçə dəfə fərq görür. Biri 400 ₼ deyir, digəri 2.500 ₼. Fərqin səbəbi çox vaxt təklifdə yazılmayanlardadır: domen kimin adına qeydiyyatdan keçəcək, hostinq neçəyə yenilənəcək, admin panel olacaqmı, sayt Google-da necə görünəcək, təhvildən sonra xəta çıxsa kim düzəldəcək. Bu suallar müqavilədən əvvəl soruşulmayanda cavabı bir il sonra, ilk yenilənmə hesabı gələndə və ya studiya əlçatmaz olanda öyrənirsiniz.</p>
<p>Bu yazıda sayt sifarişindən əvvəl veb studiyaya və ya frilanserə verilməli 15 sualı yeddi qrupa bölmüşük: təcrübə, qiymət, texnologiya, SEO, mülkiyyət, proses və təhvildən sonrakı dəstək. Hər sualın yanında yaxşı cavabın necə səsləndiyini və hansı cavabın təhlükə siqnalı olduğunu yazmışıq. Sonda müqaviləyə düşməli bəndlərin siyahısı var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Qrup</th><th>Əsas sual</th><th>Yaxşı cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Təcrübə</td><td>İşləyən saytlarınızı göstərə bilərsiniz?</td><td>Canlı ünvanlar, sahibləri ilə əlaqə imkanı</td></tr>
    <tr><td>Qiymət</td><td>Qiymətə nə daxildir, illik xərclər nədir?</td><td>Yazılı smeta: iş, domen, hostinq, dəstək ayrıca</td></tr>
    <tr><td>Texnologiya</td><td>Mətni və şəkilləri özüm dəyişə bilərəmmi?</td><td>Admin panel, qısa təlim</td></tr>
    <tr><td>SEO</td><td>Texniki SEO əsasları daxildirmi?</td><td>Meta, sitemap, sürət, mobil, köhnə URL-lər üçün 301</td></tr>
    <tr><td>Mülkiyyət</td><td>Domen, hostinq və kod kimə məxsus olacaq?</td><td>Domen sizin adınıza, bütün girişlər sizə verilir</td></tr>
    <tr><td>Proses</td><td>Mərhələlər, müddət və düzəliş sayı nədir?</td><td>Yazılı cədvəl, hər mərhələdə təsdiq</td></tr>
    <tr><td>Dəstək</td><td>Təhvildən sonra xəta çıxsa nə olur?</td><td>Pulsuz zəmanət müddəti, sonra aydın dəstək şərtləri</td></tr>
  </tbody>
</table>

<h2>1. Niyə Bu Sualları Əvvəlcədən Soruşmaq Lazımdır</h2>
<p>Sayt bir dəfəlik alış kimi görünür, amma əslində uzunmüddətli asılılıqdır. Sayt hər il domen və hostinq yenilənməsi tələb edir, vaxtaşırı yenilənməli, təhlükəsizlik yamaqları alınmalı və yeni məzmunla doldurulmalıdır. Studiya ilə ilk razılaşma bu illər boyu kimin nəyə cavabdeh olduğunu müəyyənləşdirir.</p>
<p>Ən çox rast gəlinən problemlər bunlardır:</p>
<ul>
  <li><strong>Domen studiyanın adına qeydiyyatdan keçir.</strong> Studiya ilə yollar ayrılanda domeni geri almaq çətinləşir, bəzən mümkün olmur.</li>
  <li><strong>İlk il ucuz, sonrakı illər bahalı.</strong> Hostinq və "texniki dəstək" yenilənmə qiyməti əvvəlcədən deyilmir.</li>
  <li><strong>Admin panel yoxdur.</strong> Hər qiyməti və ya şəkli dəyişmək üçün studiyaya yazmaq və gözləmək lazım gəlir.</li>
  <li><strong>Köhnə sayt yenisi ilə əvəz olunanda Google mövqeləri itir.</strong> Köhnə ünvanlar üçün yönləndirmə qurulmur.</li>
  <li><strong>Təhvildən sonra əlaqə kəsilir.</strong> Xəta çıxanda düzəltmək üçün ayrıca pul istənilir və ya cavab verilmir.</li>
</ul>
<p>Aşağıdakı 15 sual bu riskləri müqavilə imzalanmadan üzə çıxarır. Cavabları yazılı istəyin: e-poçtda və ya kommersiya təklifində. Şifahi "əlbəttə, edərik" sonradan heç nəyə zəmanət vermir.</p>

<h2>2. Təcrübə və Komanda</h2>
<h3>Sual 1. Hazırladığınız və hazırda işləyən saytları göstərə bilərsiniz?</h3>
<p>Portfoliodakı ekran şəkilləri yetərli deyil. Canlı ünvanlar istəyin və onları telefonda açın: sayt sürətlə yüklənir, menyu rahat işləyir, forma göndərilir? Mümkünsə, həmin saytların sahibləri ilə qısa danışın. Onlardan studiyanın vaxtında təhvil verib-vermədiyini və sonra dəstəyin necə olduğunu soruşun.</p>
<p><strong>Təhlükə siqnalı:</strong> yalnız dizayn maketləri göstərilir, canlı sayt yoxdur və ya göstərilən saytların hamısı bağlanıb.</p>

<h3>Sual 2. Bizim sahədə iş görmüsünüzmü?</h3>
<p>Sahə təcrübəsi şərt deyil, amma vaxta qənaət edir. Klinika saytında həkim profilləri və onlayn növbə, restoran saytında menyu və rezervasiya, tikinti şirkətində layihələr və tender sənədləri vacibdir. Bu sahəni tanıyan komanda nəyin lazım olduğunu sizə özü deyir. Sahə üzrə nümunələr üçün <a href="/blog-details/klinika-tibb-merkezi-ucun-sayt-2027">klinika</a>, <a href="/blog-details/restoran-kafe-ucun-sayt-2027">restoran</a> və <a href="/blog-details/huquq-firmasi-vekil-ucun-sayt-2027">hüquq firması</a> saytları haqqında bələdçilərimizə baxın.</p>

<h3>Sual 3. Layihədə konkret kim işləyəcək və mənim əlaqə şəxsim kim olacaq?</h3>
<p>Satış menecerinin danışdığı komanda ilə işi görən komanda fərqli ola bilər. İşin bir hissəsinin başqa icraçıya ötürülüb-ötürülməyəcəyini, dizayn və proqramlaşdırmanı kimin edəcəyini və suallarınıza kimin, neçə saat ərzində cavab verəcəyini soruşun.</p>

<h2>3. Qiymət və Ödəniş</h2>
<h3>Sual 4. Qiymətə dəqiq nə daxildir?</h3>
<p>Təklifdə səhifələrin sayı və adları, dillər, funksiyalar (forma, onlayn ödəniş, axtarış, filtr, bloq), dizaynın fərdi olub-olmadığı və mətnləri kimin yazacağı göstərilməlidir. "Korporativ sayt — 900 ₼" kimi bir sətirlik təklif sonradan "bu daxil deyildi" mübahisəsinə səbəb olur. Bazar qiymətlərini müqayisə etmək üçün <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">veb sayt qiyməti bələdçimizə</a> baxın.</p>

<h3>Sual 5. Hər il nə qədər ödəyəcəyəm?</h3>
<p>Saytın birdəfəlik hazırlanma qiymətindən başqa illik xərcləri də var:</p>
<table>
  <thead>
    <tr><th>Xərc</th><th>Nə üçündür</th><th>Soruşun</th></tr>
  </thead>
  <tbody>
    <tr><td>Domen</td><td>Saytın ünvanı (.az, .com)</td><td>İllik yenilənmə qiyməti nədir, ilk ilin endirimi varmı?</td></tr>
    <tr><td>Hostinq</td><td>Saytın faylları və bazası</td><td>Hansı tarif, yenilənmə qiyməti nədir, yedəkləmə daxildirmi?</td></tr>
    <tr><td>SSL sertifikatı</td><td>https və etibar nişanı</td><td>Pulsuzdur (Let's Encrypt) yoxsa ayrıca ödənilir?</td></tr>
    <tr><td>Korporativ e-poçt</td><td>info@sizinsirket.az</td><td>Hostinqə daxildir yoxsa ayrı xidmətdir?</td></tr>
    <tr><td>Texniki dəstək</td><td>Yeniləmələr, xətalar, kiçik dəyişikliklər</td><td>Aylıq paket, yoxsa hər iş ayrıca?</td></tr>
  </tbody>
</table>
<p>Domen haqqında ətraflı: <a href="/domen-nedir">Domen nədir və necə seçilir</a>. Korporativ e-poçt variantları: <a href="/korporativ-email">korporativ e-poçt</a>.</p>

<h3>Sual 6. Ödəniş hansı mərhələlərlə olacaq?</h3>
<p>Ən sağlam model ödənişi mərhələlərə bölməkdir: məsələn, işə başlayanda avans, dizayn təsdiq olunanda ikinci hissə, sayt canlıya çıxanda qalan məbləğ. Əvvəlcədən 100% ödəniş istənməsi sizi müdafiəsiz qoyur. Mərhələlərin və məbləğlərin müqavilədə yazılmasını istəyin.</p>

<h2>4. Texnologiya və Funksionallıq</h2>
<h3>Sual 7. Sayt nə ilə hazırlanacaq: konstruktor, hazır şablon, yoxsa sifarişlə?</h3>
<p>Üç yanaşmanın hər birinin yeri var. Konstruktor (Wix, Tilda) tez və ucuzdur, amma platformaya bağlı qalırsınız. Hazır WordPress şablonu orta seçimdir, amma plaginlərin yenilənməsi tələb olunur. Sifarişlə hazırlanan sayt (məsələn, Laravel ilə) ən çevik variantdır, amma daha baha başa gəlir. Vacib olan, sizə hansı variantın təklif edildiyini bilmək və qiymətin buna uyğun olmasıdır. Ətraflı müqayisə: <a href="/blog-details/wix-tilda-wordpress-vs-sifarisle-sayt-2026">Wix, Tilda, WordPress, yoxsa sifarişlə sayt?</a> və <a href="/blog-details/laravel-yoxsa-wordpress-2026">Laravel, yoxsa WordPress?</a></p>
<p><strong>Təhlükə siqnalı:</strong> "fərdi dizayn" deyilir, amma əslində hazır şablona loqo qoyulur və sifarişlə hazırlanmış sayt qiyməti istənilir.</p>

<h3>Sual 8. Mətnləri, şəkilləri və qiymətləri özüm dəyişə bilərəmmi?</h3>
<p>Admin panel olmayan sayt hər dəyişiklik üçün studiyadan asılı qalır. Panelin nümayişini istəyin: yeni xidmət və ya məhsul əlavə etmək, bloq yazısı yerləşdirmək, şəkli dəyişmək və üç dildə mətni yeniləmək nə qədər asandır? Təhvil zamanı qısa təlim və ya video təlimat verilməsini razılaşdırın.</p>

<h3>Sual 9. Sayt mobil cihazlarda necə işləyəcək və nə qədər sürətli olacaq?</h3>
<p>Ziyarətçilərin əksəriyyəti sayta telefondan girir. Sayt təkcə ekrana sığmamalı, həm də sürətlə yüklənməlidir. Google sürəti <strong>Core Web Vitals</strong> göstəriciləri ilə ölçür: LCP 2,5 saniyədən az, INP 200 millisaniyədən az, CLS 0,1-dən az olmalıdır. Studiyadan təhvil vaxtı PageSpeed Insights nəticəsini göstərməyi tələb edin. Ətraflı: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">saytın sürəti və Core Web Vitals</a>.</p>

<h2>5. SEO və Google-da Görünmək</h2>
<h3>Sual 10. Texniki SEO əsasları qiymətə daxildirmi?</h3>
<p>Sayt hazırlanması ilə SEO xidməti fərqli işlərdir. Amma hər sayt təhvil veriləndə texniki əsaslar hazır olmalıdır:</p>
<ul>
  <li>Hər səhifənin öz başlığı (title) və təsviri (meta description)</li>
  <li>Düzgün H1–H3 strukturu, oxunaqlı URL-lər</li>
  <li>XML sitemap və robots.txt</li>
  <li>Çoxdilli saytda hreflang və canonical teqləri</li>
  <li>Şəkillərin sıxılması və alt mətnləri</li>
  <li>Google Search Console və Analytics qoşulması</li>
  <li>Strukturlaşdırılmış məlumat (Organization, LocalBusiness, FAQ schema)</li>
</ul>
<p>Bunlar sonradan əlavə edilə bilər, amma sayt hazırlanarkən etmək daha ucuzdur. Davamlı SEO işi (məzmun, backlink, mövqe izləmə) ayrıca xidmətdir: <a href="/seo-xidmeti">SEO xidməti</a>.</p>

<h3>Sual 11. Köhnə saytımız var. Google mövqelərini necə qoruyacaqsınız?</h3>
<p>Yeni sayt köhnə ünvanları (URL) dəyişirsə, Google-da qazanılmış mövqelər itə bilər. Studiya köhnə səhifələrin siyahısını çıxarmalı və hər biri üçün yeni səhifəyə <strong>301 yönləndirmə</strong> qurmalıdır. Bu sualı soruşanda studiya "301 nədir?" deyirsə, başqa studiya axtarın. Ətraflı: <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">saytı yeniləmək və Google mövqelərini qorumaq</a>.</p>

<h2>6. Mülkiyyət və Girişlər</h2>
<h3>Sual 12. Domen kimin adına qeydiyyatdan keçəcək?</h3>
<p>Bu, siyahıdakı ən vacib sualdır. Domen <strong>sizin şirkətinizin və ya sizin adınıza</strong> qeydiyyatdan keçməli, domen idarəetmə panelinə giriş sizdə olmalıdır. Studiya domeni sizin üçün ala bilər, amma qeydiyyat sahibi siz olmalısınız. Domen studiyanın adına olanda sayt faktiki olaraq sizə məxsus deyil.</p>

<h3>Sual 13. Saytın kodu, hostinq və admin paneli girişləri mənə veriləcəkmi?</h3>
<p>Təhvil zamanı bunları tələb edin: hostinq panelinə giriş, verilənlər bazasına giriş, admin panelin baş istifadəçisi, domen panelinə giriş, Google Search Console və Analytics-də sahib hüququ. Sifarişlə hazırlanan saytda kodun sizə verilib-verilmədiyini və ondan istifadə hüququnuzu müqavilədə yazdırın. Belə olanda gələcəkdə başqa komanda ilə işləmək imkanınız qalır.</p>
<p><strong>Təhlükə siqnalı:</strong> "Hostinq bizim serverimizdədir, giriş vermirik" və ya "kod bizim mülkiyyətimizdir, ayrıca satılır" kimi cavablar müqavilədən əvvəl deyilmirsə, sonradan sürpriz olur.</p>

<h2>7. Proses və Müddət</h2>
<h3>Sual 14. İş hansı mərhələlərlə gedəcək, neçə gün çəkəcək və neçə düzəliş daxildir?</h3>
<p>Adi proses belədir: brif və struktur, dizayn maketi, təsdiq, proqramlaşdırma, məzmunun yerləşdirilməsi, test və canlıya çıxış. Hər mərhələnin müddətini və sizin təsdiqinizin harada lazım olduğunu soruşun. Neçə dəfə düzəliş istəyə biləcəyinizi və əlavə düzəlişin qiymətini də öyrənin. Gecikmə çox vaxt müştəri tərəfdən olur: mətnlər, şəkillər və təsdiqlər gec gəlir. Bu səbəbdən öhdəliklərinizi də bilin. Brifi əvvəlcədən hazırlamaq prosesi xeyli sürətləndirir: <a href="/blog-details/brif-nece-doldurulur-2026">brif necə doldurulur</a>.</p>

<h2>8. Təhvildən Sonra</h2>
<h3>Sual 15. Sayt təhvil veriləndən sonra xəta çıxsa və ya dəyişiklik lazım olsa nə olacaq?</h3>
<p>Üç şeyi dəqiqləşdirin:</p>
<ul>
  <li><strong>Zəmanət müddəti:</strong> təhvildən sonra neçə ay ərzində studiyanın öz xətaları pulsuz düzəldiləcək?</li>
  <li><strong>Dəstək şərtləri:</strong> zəmanətdən sonra kiçik dəyişikliklər, yeniləmələr və təhlükəsizlik yamaqları neçəyə başa gələcək və nə qədər tez ediləcək?</li>
  <li><strong>Yedəkləmə:</strong> saytın ehtiyat nüsxəsi nə qədər tez-tez alınır, harada saxlanılır və sayt sınsa bərpa nə qədər çəkir?</li>
</ul>
<p>Saytın təhlükəsizliyi təhvillə bitmir. Kiçik biznes üçün yoxlama siyahısı: <a href="/blog-details/sayt-tehlukesizliyi-yoxlama-siyahisi-2026">sayt təhlükəsizliyi: 12 addım</a>.</p>

<h2>Qırmızı Bayraqlar: Bu Cavabları Eşidəndə Diqqətli Olun</h2>
<table>
  <thead>
    <tr><th>Eşitdiyiniz</th><th>Bu nə deməkdir</th></tr>
  </thead>
  <tbody>
    <tr><td>"Domeni öz adımıza alırıq, sizə rahat olsun"</td><td>Sayt faktiki olaraq sizə məxsus olmayacaq</td></tr>
    <tr><td>"Müqaviləyə ehtiyac yoxdur, bir-birimizə güvənirik"</td><td>Mübahisə olanda istinad edəcəyiniz sənəd olmayacaq</td></tr>
    <tr><td>"3 günə hazır olacaq" (çox səhifəli sayt üçün)</td><td>Böyük ehtimalla hazır şablon, test aparılmadan</td></tr>
    <tr><td>"Hamısını əvvəlcədən ödəyin"</td><td>Yarımçıq iş üçün heç bir rıçaqınız qalmır</td></tr>
    <tr><td>"Google-da 1-ci yerə zəmanət veririk"</td><td>Google özü heç kimin belə zəmanət verə bilməyəcəyini deyir</td></tr>
    <tr><td>"Admin panel lazım deyil, deyin, biz dəyişərik"</td><td>Hər dəyişiklik üçün pul və gözləmə</td></tr>
    <tr><td>Canlı saytlar əvəzinə yalnız şəkillər</td><td>Real təcrübə yoxlanılmır</td></tr>
  </tbody>
</table>

<h2>Müqavilədə Olmalı Bəndlər</h2>
<p>Suallara cavab aldıqdan sonra əsas razılaşmaların müqaviləyə düşdüyünü yoxlayın:</p>
<ul>
  <li>İşin həcmi: səhifələr, dillər, funksiyalar (əlavə kimi texniki tapşırıq)</li>
  <li>Qiymət, ödəniş mərhələləri və hər mərhələnin şərti</li>
  <li>Mərhələlərin müddətləri və tərəflərin öhdəlikləri (məzmunu kim, nə vaxt verir)</li>
  <li>Daxil olan düzəliş sayı və əlavə işin qiyməti</li>
  <li>Domenin sizin adınıza qeydiyyatı və bütün girişlərin təhvil verilməsi</li>
  <li>Koddan və dizayndan istifadə hüququ</li>
  <li>Zəmanət müddəti və ondan sonrakı dəstək şərtləri</li>
  <li>İllik xərclərin (domen, hostinq, dəstək) ayrıca siyahısı</li>
  <li>Müqavilənin ləğvi halında artıq görülmüş işin və faylların təhvili</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt sifarişindən əvvəl ən vacib sual hansıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Domenin kimin adına qeydiyyatdan keçəcəyi. Domen sizin şirkətinizin adına olmalı və domen panelinə giriş sizdə olmalıdır. Əks halda studiya ilə yollar ayrılanda saytın ünvanını itirə bilərsiniz.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytın hazırlanmasından başqa hansı illik xərclər var?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Domen yenilənməsi, hostinq, bəzən korporativ e-poçt və texniki dəstək. SSL sertifikatı çox vaxt pulsuzdur. Studiyadan bu xərclərin hər birinin illik yenilənmə qiymətini yazılı istəyin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt sifarişində müqavilə mütləqdirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Müqavilə işin həcmini, qiyməti, ödəniş mərhələlərini, müddətləri, domen və kod hüquqlarını və zəmanəti müəyyənləşdirir. Müqavilə olmayanda mübahisə zamanı istinad edəcəyiniz sənəd olmur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt hazırlanmasına SEO daxildirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Texniki SEO əsasları daxil olmalıdır: meta başlıqlar, sitemap, sürət, mobil uyğunluq, hreflang və köhnə URL-lər üçün 301 yönləndirmə. Davamlı SEO (məzmun, backlink, mövqe izləmə) isə ayrıca xidmətdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Studiya Google-da birinci yerə zəmanət verirsə, etibar etmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Google özü rəsmi tövsiyələrində heç kimin birinci yerə zəmanət verə bilməyəcəyini yazır. Belə vədlər adətən real işin olmadığını və ya reklamın SEO kimi təqdim edildiyini göstərir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt təhvil veriləndən sonra hansı girişləri almalıyam?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Domen paneli, hostinq paneli, verilənlər bazası, admin panelin baş istifadəçisi, Google Search Console və Analytics-də sahib hüququ. Sifarişlə hazırlanmış saytda kodun nüsxəsini də istəyin.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb sayt qiyməti Azərbaycanda</a></li>
  <li><a href="/blog-details/brif-nece-doldurulur-2026">Sayt sifarişindən əvvəl brif necə doldurulur</a></li>
  <li><a href="/blog-details/wix-tilda-wordpress-vs-sifarisle-sayt-2026">Wix, Tilda, WordPress, yoxsa sifarişlə sayt?</a></li>
  <li><a href="/blog-details/sayt-niye-muraciet-getirmir-ux-audit-2026">Sayt niyə müraciət gətirmir? UX auditi</a></li>
  <li><a href="/blog-details/sayt-tehlukesizliyi-yoxlama-siyahisi-2026">Sayt təhlükəsizliyi: yoxlama siyahısı</a></li>
</ul>

<h2>Nəticə</h2>
<p>Ucuz və bahalı təklif arasındakı fərq çox vaxt qiymətdə yox, təklifdə yazılmayanlardadır. 15 sualı soruşub cavabları yazılı alanda müqayisə etdiyiniz təkliflər bərabərləşir: hansının domeni sizin adınıza qeydiyyatdan keçirdiyini, hansının admin panel və texniki SEO verdiyini, hansının təhvildən sonra yanınızda qaldığını görürsünüz. Ən vacib üç sual bunlardır: domen kimin adına olacaq, illik xərclər nə qədərdir və təhvildən sonra kim cavabdehdir?</p>
<p><strong>Sayt sifariş etməyə hazırlaşırsınız? Bu 15 sualı bizə də verin.</strong> <a href="/veb-saytlarin-hazirlanmasi">Veb saytların hazırlanması</a> səhifəmizə baxın və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır və hüquqi məsləhət deyil. Müqavilə şərtləri üçün hüquqşünasla məsləhətləşin.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>A business owner ordering a website usually gets quotes from three or four studios and sees prices that differ several times over. One says 400 ₼, another says 2,500 ₼. The difference often lies in what the quote does not say: whose name the domain will be registered in, how much hosting will cost on renewal, whether there will be an admin panel, how the site will appear on Google, and who will fix a bug after handover. When these questions are not asked before the contract, you find out the answers a year later, when the first renewal invoice arrives or the studio stops answering.</p>
<p>In this article we have split 15 questions to ask a web studio or freelancer before ordering a website into seven groups: experience, price, technology, SEO, ownership, process and post-launch support. For each question we describe what a good answer sounds like and which answer is a warning sign. At the end you will find a checklist of clauses that should be in the contract.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Group</th><th>Key question</th><th>Good answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Experience</td><td>Can you show live websites you have built?</td><td>Live URLs and the option to talk to their owners</td></tr>
    <tr><td>Price</td><td>What does the price include, and what are the yearly costs?</td><td>A written estimate: work, domain, hosting and support listed separately</td></tr>
    <tr><td>Technology</td><td>Can I edit text and images myself?</td><td>An admin panel and a short training session</td></tr>
    <tr><td>SEO</td><td>Are technical SEO basics included?</td><td>Meta tags, sitemap, speed, mobile, 301 redirects for old URLs</td></tr>
    <tr><td>Ownership</td><td>Who will own the domain, hosting and code?</td><td>The domain is in your name and all access is handed over to you</td></tr>
    <tr><td>Process</td><td>What are the stages, timeline and number of revisions?</td><td>A written schedule with your approval at each stage</td></tr>
    <tr><td>Support</td><td>What happens if a bug appears after handover?</td><td>A free warranty period, then clear support terms</td></tr>
  </tbody>
</table>

<h2>1. Why You Should Ask These Questions in Advance</h2>
<p>A website looks like a one-off purchase, but in reality it is a long-term dependency. Every year it needs a domain and hosting renewal, and from time to time it needs updates, security patches and new content. Your first agreement with the studio defines who is responsible for what over those years.</p>
<p>The most common problems are:</p>
<ul>
  <li><strong>The domain is registered in the studio's name.</strong> When you part ways with the studio, getting the domain back becomes difficult and sometimes impossible.</li>
  <li><strong>Cheap in the first year, expensive later.</strong> The renewal price of hosting and "technical support" is not mentioned in advance.</li>
  <li><strong>There is no admin panel.</strong> To change any price or image, you have to message the studio and wait.</li>
  <li><strong>Google rankings are lost when the old site is replaced.</strong> No redirects are set up for the old URLs.</li>
  <li><strong>Contact is lost after handover.</strong> When a bug appears, you are asked to pay extra to fix it, or you get no answer at all.</li>
</ul>
<p>The 15 questions below bring these risks to light before the contract is signed. Ask for the answers in writing, by email or in the commercial proposal. A verbal "of course, we'll do it" guarantees nothing later on.</p>

<h2>2. Experience and Team</h2>
<h3>Question 1. Can you show websites you have built that are live today?</h3>
<p>Screenshots in a portfolio are not enough. Ask for live URLs and open them on your phone: does the site load quickly, does the menu work smoothly, does the form send? If possible, have a short conversation with the owners of those sites. Ask them whether the studio delivered on time and what support was like afterwards.</p>
<p><strong>Warning sign:</strong> only design mock-ups are shown, there are no live sites, or all the sites shown have been taken down.</p>

<h3>Question 2. Have you worked in our industry?</h3>
<p>Industry experience is not essential, but it saves time. A clinic website needs doctor profiles and online booking, a restaurant website needs a menu and reservations, and a construction company needs project pages and tender documents. A team that knows the industry will tell you what is needed without being asked. For industry examples, see our guides to websites for <a href="/blog-details/clinic-medical-centre-website-azerbaijan-2027">clinics</a>, <a href="/blog-details/restaurant-cafe-website-azerbaijan-2027">restaurants</a> and <a href="/blog-details/law-firm-lawyer-website-azerbaijan-2027">law firms</a>.</p>

<h3>Question 3. Who exactly will work on the project, and who will be my contact person?</h3>
<p>The team a sales manager describes and the team that does the work may be different. Ask whether part of the work will be outsourced to another contractor, who will do the design and the programming, and who will answer your questions and how quickly.</p>

<h2>3. Price and Payment</h2>
<h3>Question 4. What exactly does the price include?</h3>
<p>The proposal should list the number and names of pages, the languages, the features (forms, online payment, search, filters, blog), whether the design is custom, and who will write the copy. A one-line quote such as "Corporate website — 900 ₼" later leads to "that wasn't included" disputes. To compare market prices, see our <a href="/blog-details/website-cost-azerbaijan-2026">website cost guide</a>.</p>

<h3>Question 5. How much will I pay every year?</h3>
<p>Besides the one-off development price, a website also has yearly costs:</p>
<table>
  <thead>
    <tr><th>Cost</th><th>What it is for</th><th>Ask</th></tr>
  </thead>
  <tbody>
    <tr><td>Domain</td><td>The site's address (.az, .com)</td><td>What is the yearly renewal price, and is there a first-year discount?</td></tr>
    <tr><td>Hosting</td><td>The site's files and database</td><td>Which plan, what is the renewal price, are backups included?</td></tr>
    <tr><td>SSL certificate</td><td>https and the trust padlock</td><td>Is it free (Let's Encrypt) or paid separately?</td></tr>
    <tr><td>Business email</td><td>info@yourcompany.az</td><td>Is it included in hosting or a separate service?</td></tr>
    <tr><td>Technical support</td><td>Updates, bugs, small changes</td><td>A monthly package, or each job billed separately?</td></tr>
  </tbody>
</table>
<p>More about domains: <a href="/what-is-domain">What a domain is and how to choose one</a>. Business email options: <a href="/corporate-email">business email</a>.</p>

<h3>Question 6. In what stages will payment be made?</h3>
<p>The healthiest model is to split payment into stages: for example, an advance when work starts, a second part when the design is approved and the balance when the site goes live. Being asked to pay 100% upfront leaves you unprotected. Ask for the stages and amounts to be written into the contract.</p>

<h2>4. Technology and Functionality</h2>
<h3>Question 7. What will the site be built with: a website builder, a ready-made template or custom development?</h3>
<p>Each of the three approaches has its place. A builder (Wix, Tilda) is fast and cheap, but you stay locked into the platform. A ready-made WordPress theme is a middle option, but plugins need regular updates. A custom-built site (for example, with Laravel) is the most flexible option, but costs more. What matters is knowing which option you are being offered and that the price matches it. A detailed comparison: <a href="/blog-details/wix-vs-tilda-vs-wordpress-vs-custom-website-2026">Wix, Tilda, WordPress or a custom website?</a> and <a href="/blog-details/laravel-vs-wordpress-for-business-2026">Laravel or WordPress?</a></p>
<p><strong>Warning sign:</strong> you are told it is a "custom design", but in fact a logo is placed on a ready-made template and you are charged the price of custom development.</p>

<h3>Question 8. Can I change the text, images and prices myself?</h3>
<p>A site without an admin panel depends on the studio for every change. Ask for a demo of the panel: how easy is it to add a new service or product, publish a blog post, replace an image or update text in three languages? Agree on a short training session or a video guide at handover.</p>

<h3>Question 9. How will the site work on mobile devices, and how fast will it be?</h3>
<p>Most visitors come to a site from their phone. The site should not just fit the screen, it should also load quickly. Google measures speed with the <strong>Core Web Vitals</strong>: LCP should be under 2.5 seconds, INP under 200 milliseconds and CLS under 0.1. Ask the studio to show you the PageSpeed Insights result at handover. More details: <a href="/blog-details/website-speed-core-web-vitals-2026">website speed and Core Web Vitals</a>.</p>

<h2>5. SEO and Visibility on Google</h2>
<h3>Question 10. Are technical SEO basics included in the price?</h3>
<p>Website development and SEO services are different jobs. But every site should have the technical basics in place at handover:</p>
<ul>
  <li>A unique title and meta description for every page</li>
  <li>A correct H1–H3 structure and readable URLs</li>
  <li>An XML sitemap and robots.txt</li>
  <li>hreflang and canonical tags on a multilingual site</li>
  <li>Compressed images with alt text</li>
  <li>Google Search Console and Analytics connected</li>
  <li>Structured data (Organization, LocalBusiness, FAQ schema)</li>
</ul>
<p>These can be added later, but it is cheaper to do them while the site is being built. Ongoing SEO work (content, backlinks, rank tracking) is a separate service: <a href="/seo-services">SEO services</a>.</p>

<h3>Question 11. We already have a website. How will you protect our Google rankings?</h3>
<p>If the new site changes the old addresses (URLs), the rankings earned on Google may be lost. The studio should list the old pages and set up a <strong>301 redirect</strong> from each one to its new page. If the studio replies "what is a 301?" when you ask this question, look for another studio. More details: <a href="/blog-details/signs-you-need-website-redesign-2026">redesigning a website and keeping your Google rankings</a>.</p>

<h2>6. Ownership and Access</h2>
<h3>Question 12. Whose name will the domain be registered in?</h3>
<p>This is the most important question on the list. The domain should be registered <strong>in your company's name or your own name</strong>, and you should have access to the domain management panel. The studio can buy the domain for you, but you must be the registrant. When the domain is in the studio's name, the site does not really belong to you.</p>

<h3>Question 13. Will I be given the site's code, hosting and admin panel access?</h3>
<p>Ask for these at handover: access to the hosting panel, access to the database, the main admin panel user, access to the domain panel, and owner rights in Google Search Console and Analytics. For a custom-built site, have it written into the contract whether the code is handed over to you and what your rights to use it are. That way you keep the option of working with another team in the future.</p>
<p><strong>Warning sign:</strong> answers such as "hosting is on our server, we don't give access" or "the code is our property and sold separately" turn into a surprise later if they are not said before the contract.</p>

<h2>7. Process and Timeline</h2>
<h3>Question 14. What stages will the work go through, how many days will it take and how many revisions are included?</h3>
<p>A typical process looks like this: brief and structure, design mock-up, approval, programming, content upload, testing and launch. Ask how long each stage takes and where your approval is needed. Also find out how many rounds of revisions you can request and what extra revisions cost. Delays often come from the client's side: copy, images and approvals arrive late. So know your own obligations too. Preparing a brief in advance speeds up the process considerably: <a href="/blog-details/how-to-write-project-brief-2026">how to write a project brief</a>.</p>

<h2>8. After Handover</h2>
<h3>Question 15. What happens if a bug appears or a change is needed after the site is handed over?</h3>
<p>Clarify three things:</p>
<ul>
  <li><strong>Warranty period:</strong> for how many months after handover will the studio fix its own bugs for free?</li>
  <li><strong>Support terms:</strong> after the warranty, how much will small changes, updates and security patches cost, and how quickly will they be done?</li>
  <li><strong>Backups:</strong> how often is the site backed up, where are the backups stored, and how long does a restore take if the site breaks?</li>
</ul>
<p>Website security does not end at handover. A checklist for small businesses: <a href="/blog-details/website-security-checklist-small-business-2026">website security: 12 steps</a>.</p>

<h2>Red Flags: Be Careful When You Hear These Answers</h2>
<table>
  <thead>
    <tr><th>What you hear</th><th>What it means</th></tr>
  </thead>
  <tbody>
    <tr><td>"We'll register the domain in our name, it's easier for you"</td><td>The site will not really belong to you</td></tr>
    <tr><td>"No need for a contract, we trust each other"</td><td>In a dispute, you will have no document to refer to</td></tr>
    <tr><td>"It'll be ready in 3 days" (for a multi-page site)</td><td>Most likely a ready-made template, with no testing</td></tr>
    <tr><td>"Pay everything upfront"</td><td>You have no leverage if the work is left unfinished</td></tr>
    <tr><td>"We guarantee first place on Google"</td><td>Google itself says no one can guarantee that</td></tr>
    <tr><td>"You don't need an admin panel, just tell us and we'll change it"</td><td>Payment and waiting for every change</td></tr>
    <tr><td>Only images instead of live sites</td><td>Real experience cannot be verified</td></tr>
  </tbody>
</table>

<h2>Clauses the Contract Should Include</h2>
<p>Once you have the answers, check that the key agreements made it into the contract:</p>
<ul>
  <li>Scope of work: pages, languages, features (a technical specification as an appendix)</li>
  <li>Price, payment stages and the condition for each stage</li>
  <li>Stage deadlines and the obligations of both parties (who provides content, and when)</li>
  <li>The number of revisions included and the price of extra work</li>
  <li>Registration of the domain in your name and handover of all access</li>
  <li>Rights to use the code and design</li>
  <li>The warranty period and support terms after it</li>
  <li>A separate list of yearly costs (domain, hosting, support)</li>
  <li>Handover of completed work and files if the contract is terminated</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the most important question to ask before ordering a website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Whose name the domain will be registered in. The domain should be in your company's name and you should have access to the domain panel. Otherwise, you may lose the site's address when you part ways with the studio.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What yearly costs are there besides building the website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Domain renewal, hosting, sometimes business email and technical support. An SSL certificate is often free. Ask the studio for the yearly renewal price of each of these in writing.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is a contract necessary when ordering a website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. The contract defines the scope of work, the price, payment stages, deadlines, rights to the domain and code, and the warranty. Without a contract, you have no document to refer to in a dispute.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is SEO included in website development?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The technical SEO basics should be included: meta titles, sitemap, speed, mobile-friendliness, hreflang and 301 redirects for old URLs. Ongoing SEO (content, backlinks, rank tracking) is a separate service.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can you trust a studio that guarantees first place on Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. Google states in its official guidance that no one can guarantee a first-place ranking. Such promises usually mean there is no real work behind them, or that advertising is being sold as SEO.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What access should I receive after the website is handed over?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The domain panel, the hosting panel, the database, the main admin panel user, and owner rights in Google Search Console and Analytics. For a custom-built site, also ask for a copy of the code.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/website-cost-azerbaijan-2026">Website cost in Azerbaijan</a></li>
  <li><a href="/blog-details/how-to-write-project-brief-2026">How to write a brief before ordering a website</a></li>
  <li><a href="/blog-details/wix-vs-tilda-vs-wordpress-vs-custom-website-2026">Wix, Tilda, WordPress or a custom website?</a></li>
  <li><a href="/blog-details/website-not-generating-leads-ux-audit-2026">Why your website isn't generating leads: a UX audit</a></li>
  <li><a href="/blog-details/website-security-checklist-small-business-2026">Website security: a checklist</a></li>
</ul>

<h2>Conclusion</h2>
<p>The difference between a cheap quote and an expensive one often lies not in the price but in what the quote leaves out. When you ask the 15 questions and get the answers in writing, the quotes you are comparing become comparable: you can see which studio registers the domain in your name, which provides an admin panel and technical SEO, and which stays with you after handover. The three most important questions are: whose name will the domain be in, what are the yearly costs, and who is responsible after handover?</p>
<p><strong>Getting ready to order a website? Ask us these 15 questions too.</strong> See our <a href="/website-development">website development</a> page or <a href="/contact">get in touch</a>.</p>
<p><small><em>This article is for general information only and is not legal advice. Consult a lawyer about contract terms.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Предприниматель, заказывающий сайт, обычно получает цены от трёх-четырёх студий и видит, что они отличаются в несколько раз. Одна называет 400 ₼, другая 2 500 ₼. Причина разницы часто кроется в том, чего в предложении нет: на кого будет оформлен домен, сколько будет стоить продление хостинга, будет ли админ-панель, как сайт будет выглядеть в Google и кто исправит ошибку после сдачи. Если эти вопросы не задать до договора, ответы вы узнаете через год, когда придёт первый счёт за продление или студия перестанет отвечать.</p>
<p>В этой статье мы разделили 15 вопросов, которые стоит задать веб-студии или фрилансеру перед заказом сайта, на семь групп: опыт, цена, технологии, SEO, права собственности, процесс и поддержка после запуска. К каждому вопросу мы написали, как звучит хороший ответ и какой ответ должен насторожить. В конце есть список пунктов, которые должны попасть в договор.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Группа</th><th>Главный вопрос</th><th>Хороший ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Опыт</td><td>Можете показать работающие сайты?</td><td>Живые адреса и возможность связаться с владельцами</td></tr>
    <tr><td>Цена</td><td>Что входит в цену и какие расходы каждый год?</td><td>Письменная смета: работа, домен, хостинг и поддержка отдельно</td></tr>
    <tr><td>Технологии</td><td>Смогу ли я сам менять тексты и фото?</td><td>Админ-панель и короткое обучение</td></tr>
    <tr><td>SEO</td><td>Входят ли основы технического SEO?</td><td>Мета-теги, sitemap, скорость, мобильная версия, 301 для старых URL</td></tr>
    <tr><td>Собственность</td><td>Кому будут принадлежать домен, хостинг и код?</td><td>Домен на ваше имя, все доступы передаются вам</td></tr>
    <tr><td>Процесс</td><td>Какие этапы, сроки и сколько правок?</td><td>Письменный график с вашим согласованием на каждом этапе</td></tr>
    <tr><td>Поддержка</td><td>Что будет, если после сдачи появится ошибка?</td><td>Бесплатный гарантийный срок, затем понятные условия поддержки</td></tr>
  </tbody>
</table>

<h2>1. Почему эти вопросы нужно задать заранее</h2>
<p>Сайт выглядит как разовая покупка, но на деле это долгосрочная зависимость. Каждый год нужно продлевать домен и хостинг, время от времени сайт нужно обновлять, ставить патчи безопасности и наполнять новым контентом. Первая договорённость со студией определяет, кто и за что отвечает все эти годы.</p>
<p>Самые частые проблемы:</p>
<ul>
  <li><strong>Домен оформлен на студию.</strong> Когда вы расстаётесь со студией, вернуть домен сложно, а иногда невозможно.</li>
  <li><strong>Дёшево в первый год, дорого потом.</strong> Цена продления хостинга и «технической поддержки» заранее не называется.</li>
  <li><strong>Нет админ-панели.</strong> Чтобы поменять любую цену или фото, нужно писать студии и ждать.</li>
  <li><strong>При замене старого сайта теряются позиции в Google.</strong> Для старых адресов не настраиваются редиректы.</li>
  <li><strong>После сдачи связь пропадает.</strong> Когда появляется ошибка, за исправление просят отдельные деньги или не отвечают вовсе.</li>
</ul>
<p>15 вопросов ниже выявляют эти риски до подписания договора. Просите ответы в письменном виде: по почте или в коммерческом предложении. Устное «конечно, сделаем» потом ничего не гарантирует.</p>

<h2>2. Опыт и команда</h2>
<h3>Вопрос 1. Можете показать сайты, которые вы сделали и которые работают сейчас?</h3>
<p>Скриншотов в портфолио недостаточно. Попросите живые адреса и откройте их на телефоне: сайт быстро загружается, меню удобно работает, форма отправляется? Если возможно, коротко поговорите с владельцами этих сайтов. Спросите, сдала ли студия работу вовремя и как потом работала поддержка.</p>
<p><strong>Тревожный знак:</strong> показывают только дизайн-макеты, живых сайтов нет, или все показанные сайты уже закрыты.</p>

<h3>Вопрос 2. Работали ли вы в нашей сфере?</h3>
<p>Опыт в сфере не обязателен, но экономит время. Для сайта клиники важны профили врачей и онлайн-запись, для ресторана меню и бронирование, для строительной компании проекты и тендерные документы. Команда, знающая сферу, сама подскажет, что нужно. Примеры по сферам смотрите в наших руководствах по сайтам для <a href="/blog-details/sajt-dlya-kliniki-medicinskogo-centra-2027">клиник</a>, <a href="/blog-details/sajt-dlya-restorana-kafe-2027">ресторанов</a> и <a href="/blog-details/sajt-dlya-yuridicheskoj-firmy-advokata-2027">юридических фирм</a>.</p>

<h3>Вопрос 3. Кто конкретно будет работать над проектом и кто будет моим контактным лицом?</h3>
<p>Команда, о которой рассказывает менеджер по продажам, и команда, которая делает работу, могут отличаться. Спросите, будет ли часть работы передана другому исполнителю, кто будет делать дизайн и программирование, и кто и как быстро будет отвечать на ваши вопросы.</p>

<h2>3. Цена и оплата</h2>
<h3>Вопрос 4. Что именно входит в цену?</h3>
<p>В предложении должны быть указаны количество и названия страниц, языки, функции (формы, онлайн-оплата, поиск, фильтры, блог), индивидуальный ли дизайн и кто пишет тексты. Однострочное предложение вроде «Корпоративный сайт — 900 ₼» потом приводит к спорам «это не входило». Чтобы сравнить рыночные цены, смотрите наше <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">руководство по стоимости сайта</a>.</p>

<h3>Вопрос 5. Сколько я буду платить каждый год?</h3>
<p>Кроме разовой цены разработки у сайта есть ежегодные расходы:</p>
<table>
  <thead>
    <tr><th>Расход</th><th>Для чего</th><th>Спросите</th></tr>
  </thead>
  <tbody>
    <tr><td>Домен</td><td>Адрес сайта (.az, .com)</td><td>Какая цена продления в год, есть ли скидка на первый год?</td></tr>
    <tr><td>Хостинг</td><td>Файлы и база данных сайта</td><td>Какой тариф, какая цена продления, входит ли резервное копирование?</td></tr>
    <tr><td>SSL-сертификат</td><td>https и значок доверия</td><td>Бесплатный (Let's Encrypt) или оплачивается отдельно?</td></tr>
    <tr><td>Корпоративная почта</td><td>info@vashakompaniya.az</td><td>Входит в хостинг или это отдельная услуга?</td></tr>
    <tr><td>Техническая поддержка</td><td>Обновления, ошибки, мелкие изменения</td><td>Ежемесячный пакет или каждая работа отдельно?</td></tr>
  </tbody>
</table>
<p>Подробнее о доменах: <a href="/chto-takoe-domen">что такое домен и как его выбрать</a>. Варианты корпоративной почты: <a href="/korporativnaya-pochta">корпоративная почта</a>.</p>

<h3>Вопрос 6. Какими этапами будет оплата?</h3>
<p>Самая здоровая модель: разделить оплату на этапы. Например, аванс при старте, вторая часть после утверждения дизайна и остаток после запуска сайта. Требование 100% предоплаты оставляет вас без защиты. Попросите прописать этапы и суммы в договоре.</p>

<h2>4. Технологии и функционал</h2>
<h3>Вопрос 7. На чём будет сделан сайт: конструктор, готовый шаблон или разработка на заказ?</h3>
<p>У каждого из трёх подходов своё место. Конструктор (Wix, Tilda) быстрый и дешёвый, но вы остаётесь привязаны к платформе. Готовая тема WordPress — средний вариант, но плагины требуют регулярных обновлений. Сайт на заказ (например, на Laravel) — самый гибкий вариант, но стоит дороже. Важно знать, какой вариант вам предлагают, и чтобы цена ему соответствовала. Подробное сравнение: <a href="/blog-details/wix-tilda-wordpress-ili-sajt-na-zakaz-2026">Wix, Tilda, WordPress или сайт на заказ?</a> и <a href="/blog-details/laravel-ili-wordpress-2026">Laravel или WordPress?</a></p>
<p><strong>Тревожный знак:</strong> говорят «индивидуальный дизайн», а на деле ставят логотип на готовый шаблон и просят цену разработки на заказ.</p>

<h3>Вопрос 8. Смогу ли я сам менять тексты, фото и цены?</h3>
<p>Сайт без админ-панели зависит от студии при каждом изменении. Попросите показать панель: насколько легко добавить новую услугу или товар, опубликовать статью в блоге, заменить фото и обновить текст на трёх языках? Договоритесь о коротком обучении или видеоинструкции при сдаче.</p>

<h3>Вопрос 9. Как сайт будет работать на мобильных и насколько быстрым он будет?</h3>
<p>Большинство посетителей заходят на сайт с телефона. Сайт должен не просто помещаться на экран, но и быстро загружаться. Google измеряет скорость показателями <strong>Core Web Vitals</strong>: LCP должен быть меньше 2,5 секунды, INP меньше 200 миллисекунд, CLS меньше 0,1. Попросите студию показать результат PageSpeed Insights при сдаче. Подробнее: <a href="/blog-details/skorost-sajta-core-web-vitals-2026">скорость сайта и Core Web Vitals</a>.</p>

<h2>5. SEO и видимость в Google</h2>
<h3>Вопрос 10. Входят ли в цену основы технического SEO?</h3>
<p>Разработка сайта и SEO-услуги — разные работы. Но при сдаче у каждого сайта должны быть готовы технические основы:</p>
<ul>
  <li>Свой заголовок (title) и описание (meta description) для каждой страницы</li>
  <li>Правильная структура H1–H3 и понятные URL</li>
  <li>XML sitemap и robots.txt</li>
  <li>Теги hreflang и canonical на многоязычном сайте</li>
  <li>Сжатые изображения с alt-текстами</li>
  <li>Подключённые Google Search Console и Analytics</li>
  <li>Структурированные данные (Organization, LocalBusiness, FAQ schema)</li>
</ul>
<p>Всё это можно добавить и позже, но при разработке сайта это дешевле. Постоянная SEO-работа (контент, обратные ссылки, отслеживание позиций) — отдельная услуга: <a href="/seo-uslugi">SEO-услуги</a>.</p>

<h3>Вопрос 11. У нас уже есть сайт. Как вы сохраните наши позиции в Google?</h3>
<p>Если новый сайт меняет старые адреса (URL), позиции, заработанные в Google, могут потеряться. Студия должна составить список старых страниц и настроить для каждой <strong>301-редирект</strong> на новую страницу. Если на этот вопрос студия отвечает «а что такое 301?», ищите другую студию. Подробнее: <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">обновление сайта и сохранение позиций в Google</a>.</p>

<h2>6. Собственность и доступы</h2>
<h3>Вопрос 12. На кого будет оформлен домен?</h3>
<p>Это самый важный вопрос в списке. Домен должен быть оформлен <strong>на вашу компанию или на вас лично</strong>, а доступ к панели управления доменом должен быть у вас. Студия может купить домен за вас, но владельцем регистрации должны быть вы. Когда домен оформлен на студию, сайт фактически вам не принадлежит.</p>

<h3>Вопрос 13. Передадите ли вы мне код сайта, доступы к хостингу и админ-панели?</h3>
<p>При сдаче требуйте: доступ к панели хостинга, доступ к базе данных, главного пользователя админ-панели, доступ к панели домена и права владельца в Google Search Console и Analytics. Для сайта на заказ пропишите в договоре, передаётся ли вам код и каковы ваши права на его использование. Так у вас останется возможность в будущем работать с другой командой.</p>
<p><strong>Тревожный знак:</strong> ответы вроде «хостинг на нашем сервере, доступ не даём» или «код — наша собственность, продаётся отдельно» становятся сюрпризом, если их не озвучили до договора.</p>

<h2>7. Процесс и сроки</h2>
<h3>Вопрос 14. Какими этапами пойдёт работа, сколько дней она займёт и сколько правок входит?</h3>
<p>Обычный процесс такой: бриф и структура, дизайн-макет, утверждение, программирование, наполнение контентом, тестирование и запуск. Спросите сроки каждого этапа и где нужно ваше согласование. Узнайте также, сколько раз можно просить правки и сколько стоит дополнительная правка. Задержки часто происходят со стороны клиента: тексты, фото и согласования приходят поздно. Поэтому знайте и свои обязательства. Подготовленный заранее бриф заметно ускоряет процесс: <a href="/blog-details/kak-zapolnit-brif-2026">как заполнить бриф</a>.</p>

<h2>8. После сдачи</h2>
<h3>Вопрос 15. Что будет, если после сдачи сайта появится ошибка или понадобится изменение?</h3>
<p>Уточните три вещи:</p>
<ul>
  <li><strong>Гарантийный срок:</strong> сколько месяцев после сдачи студия бесплатно исправляет свои ошибки?</li>
  <li><strong>Условия поддержки:</strong> сколько после гарантии будут стоить мелкие изменения, обновления и патчи безопасности и как быстро их сделают?</li>
  <li><strong>Резервное копирование:</strong> как часто делается копия сайта, где хранится и сколько займёт восстановление, если сайт сломается?</li>
</ul>
<p>Безопасность сайта не заканчивается на сдаче. Чек-лист для малого бизнеса: <a href="/blog-details/bezopasnost-sajta-chek-list-2026">безопасность сайта: 12 шагов</a>.</p>

<h2>Красные флаги: будьте осторожны, если слышите такие ответы</h2>
<table>
  <thead>
    <tr><th>Что вы слышите</th><th>Что это значит</th></tr>
  </thead>
  <tbody>
    <tr><td>«Домен оформим на себя, вам так удобнее»</td><td>Сайт фактически не будет вам принадлежать</td></tr>
    <tr><td>«Договор не нужен, мы доверяем друг другу»</td><td>В споре у вас не будет документа, на который можно сослаться</td></tr>
    <tr><td>«Будет готово за 3 дня» (для многостраничного сайта)</td><td>Скорее всего готовый шаблон без тестирования</td></tr>
    <tr><td>«Оплатите всё заранее»</td><td>Если работа останется незаконченной, у вас нет рычагов</td></tr>
    <tr><td>«Гарантируем первое место в Google»</td><td>Сам Google говорит, что никто не может это гарантировать</td></tr>
    <tr><td>«Админ-панель не нужна, скажите — мы поменяем»</td><td>Оплата и ожидание при каждом изменении</td></tr>
    <tr><td>Только картинки вместо живых сайтов</td><td>Реальный опыт не проверить</td></tr>
  </tbody>
</table>

<h2>Пункты, которые должны быть в договоре</h2>
<p>Получив ответы, проверьте, что главные договорённости попали в договор:</p>
<ul>
  <li>Объём работ: страницы, языки, функции (техническое задание как приложение)</li>
  <li>Цена, этапы оплаты и условие каждого этапа</li>
  <li>Сроки этапов и обязательства сторон (кто и когда предоставляет контент)</li>
  <li>Количество включённых правок и цена дополнительных работ</li>
  <li>Регистрация домена на ваше имя и передача всех доступов</li>
  <li>Права на использование кода и дизайна</li>
  <li>Гарантийный срок и условия поддержки после него</li>
  <li>Отдельный список ежегодных расходов (домен, хостинг, поддержка)</li>
  <li>Передача выполненной работы и файлов при расторжении договора</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какой вопрос самый важный перед заказом сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">На кого будет оформлен домен. Домен должен быть оформлен на вашу компанию, а доступ к панели домена должен быть у вас. Иначе при расставании со студией вы можете потерять адрес сайта.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какие ежегодные расходы есть кроме разработки сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Продление домена, хостинг, иногда корпоративная почта и техническая поддержка. SSL-сертификат часто бесплатный. Попросите у студии письменно цену продления каждой позиции в год.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Обязателен ли договор при заказе сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Договор определяет объём работ, цену, этапы оплаты, сроки, права на домен и код и гарантию. Без договора в споре у вас нет документа, на который можно сослаться.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Входит ли SEO в разработку сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Основы технического SEO должны входить: мета-заголовки, sitemap, скорость, мобильная версия, hreflang и 301-редиректы для старых URL. Постоянное SEO (контент, ссылки, отслеживание позиций) — отдельная услуга.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли доверять студии, которая гарантирует первое место в Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Google в официальных рекомендациях пишет, что никто не может гарантировать первое место. Такие обещания обычно означают, что за ними нет реальной работы или что рекламу продают под видом SEO.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какие доступы я должен получить после сдачи сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Панель домена, панель хостинга, база данных, главный пользователь админ-панели и права владельца в Google Search Console и Analytics. Для сайта на заказ попросите также копию кода.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта в Азербайджане</a></li>
  <li><a href="/blog-details/kak-zapolnit-brif-2026">Как заполнить бриф перед заказом сайта</a></li>
  <li><a href="/blog-details/wix-tilda-wordpress-ili-sajt-na-zakaz-2026">Wix, Tilda, WordPress или сайт на заказ?</a></li>
  <li><a href="/blog-details/pochemu-sajt-ne-prinosit-zayavki-ux-audit-2026">Почему сайт не приносит заявки: UX-аудит</a></li>
  <li><a href="/blog-details/bezopasnost-sajta-chek-list-2026">Безопасность сайта: чек-лист</a></li>
</ul>

<h2>Итог</h2>
<p>Разница между дешёвым и дорогим предложением часто не в цене, а в том, чего в предложении нет. Когда вы задаёте 15 вопросов и получаете ответы письменно, сравниваемые предложения становятся сопоставимыми: видно, кто оформляет домен на вас, кто даёт админ-панель и техническое SEO, а кто остаётся рядом после сдачи. Три самых важных вопроса: на кого будет оформлен домен, сколько стоят ежегодные расходы и кто отвечает после сдачи?</p>
<p><strong>Собираетесь заказать сайт? Задайте эти 15 вопросов и нам.</strong> Посмотрите страницу <a href="/razrabotka-sajtov">разработки сайтов</a> или <a href="/kontakty">свяжитесь с нами</a>.</p>
<p><small><em>Эта статья носит общий информационный характер и не является юридической консультацией. По условиям договора проконсультируйтесь с юристом.</em></small></p>
HTML;

        // #28 (8 May 2026, "12 sual") eyni mövzudur: dublikat yaratmırıq, #28-in sətrini 2027 versiyası ilə yeniləyirik.
        // Köhnə slug-lardan 301 routes/web.php-dədir. İlk dəfə işləyəndə köhnə sətrin backup-ı storage/app/blog28-backup.json-a yazılır.
        $old = [
            'az' => 'veb-sayt-hazirlatmazdan-evvel-12-sual',
            'en' => '12-questions-before-building-website-2026',
            'ru' => '12-voprosov-pered-sozdaniem-sajta-2026',
        ];
        $new = [
            'az' => 'sayt-sifarisinden-evvel-15-sual-2027',
            'en' => 'questions-to-ask-before-hiring-web-developer-2027',
            'ru' => 'voprosy-pered-zakazom-sajta-2027',
        ];

        $row = DB::table('blogs')->whereIn('slug_az', [$old['az'], $new['az']])->orderBy('id')->first();
        $backup = storage_path('app/blog28-backup.json');
        if ($row && $row->slug_az === $old['az'] && ! file_exists($backup)) {
            file_put_contents($backup, json_encode($row, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }

        $data = [
                'slug_az' => $new['az'],
                'slug_en' => 'questions-to-ask-before-hiring-web-developer-2027',
                'slug_ru' => 'voprosy-pered-zakazom-sajta-2027',
                'title_az' => 'Sayt Sifariş Etməzdən Əvvəl Veb Studiyaya Verilməli 15 Sual (2027): Qiymət, Domen, SEO və Dəstək',
                'title_en' => '15 Questions to Ask a Web Studio Before Ordering a Website (2027): Price, Domain, SEO and Support',
                'title_ru' => '15 вопросов веб-студии перед заказом сайта (2027): цена, домен, SEO и поддержка',
                'review_az' => 'Sayt sifarişindən əvvəl studiyaya verilməli 15 sual: işləyən saytlar, qiymətə nə daxildir, illik domen və hostinq xərcləri, ödəniş mərhələləri, konstruktor/şablon/sifarişlə, admin panel, mobil sürət, texniki SEO, köhnə URL-lər üçün 301, domen kimin adına, girişlər və kod, müddət və düzəlişlər, zəmanət və dəstək. Qırmızı bayraqlar və müqavilə bəndləri.',
                'review_en' => '15 questions to ask a web studio before ordering a website: live portfolio, what the price includes, yearly domain and hosting costs, payment stages, builder vs template vs custom, admin panel, mobile speed, technical SEO, 301 redirects for old URLs, who owns the domain, access and code, timeline and revisions, warranty and support. Red flags and contract checklist.',
                'review_ru' => '15 вопросов веб-студии перед заказом сайта: живое портфолио, что входит в цену, ежегодные расходы на домен и хостинг, этапы оплаты, конструктор/шаблон/разработка на заказ, админ-панель, скорость на мобильных, техническое SEO, 301-редиректы со старых URL, на кого оформлен домен, доступы и код, сроки и правки, гарантия и поддержка. Красные флаги и пункты договора.',
                'date_az' => '17 Noyabr 2026',
                'date_en' => 'November 17, 2026',
                'date_ru' => '17 Ноября 2026',
                'photo' => 'cover-site-questions-az.png',
                'photo_en' => 'cover-site-questions-en.png',
                'photo_ru' => 'cover-site-questions-ru.png',
                'meta_title_az' => 'Sayt Sifarişindən Əvvəl 15 Sual 2027: Domen, Qiymət, SEO | RS Code',
                'meta_title_en' => '15 Questions Before Ordering a Website 2027 | RS Code',
                'meta_title_ru' => '15 вопросов перед заказом сайта 2027 | RS Code',
                'meta_description_az' => 'Veb studiyaya sayt sifarişindən əvvəl soruşulmalı 15 sual: qiymətə nə daxildir, illik xərclər, domen kimin adına, admin panel, SEO, girişlər, zəmanət və müqavilə.',
                'meta_description_en' => '15 questions to ask before ordering a website: what the price includes, yearly costs, who owns the domain, admin panel, SEO, access, warranty and the contract.',
                'meta_description_ru' => '15 вопросов перед заказом сайта: что входит в цену, ежегодные расходы, на кого оформлен домен, админ-панель, SEO, доступы, гарантия и договор.',
                'meta_keywords_az' => 'sayt sifarişi, sayt hazırlatmaq, veb studiya seçimi, sayt hazırlanması müqavilə, domen kimin adına, sayt illik xərcləri, sayt hazırlanması 2027',
                'meta_keywords_en' => 'questions to ask web developer, hiring a web design agency, website contract checklist, who owns my domain, website yearly costs, website development 2027',
                'meta_keywords_ru' => 'вопросы веб-студии, как выбрать веб-студию, заказ сайта, договор на разработку сайта, на кого оформлен домен, расходы на сайт в год, разработка сайта 2027',
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

        // Digər bloqlardakı köhnə linkləri yeni slug-a çevir (301 hop-u olmasın), anchor-dakı "12"-ni "15" et.
        foreach (DB::table('blogs')->get(['id', 'text_az', 'text_en', 'text_ru']) as $b) {
            $upd = [];
            foreach (['az', 'en', 'ru'] as $l) {
                $t = $b->{"text_$l"};
                $n = preg_replace_callback(
                    '~<a href="/blog-details/'.preg_quote($old[$l], '~').'"([^>]*)>(.*?)</a>~u',
                    fn ($m) => '<a href="/blog-details/'.$new[$l].'"'.$m[1].'>'.preg_replace('/12/u', '15', $m[2]).'</a>',
                    (string) $t
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
