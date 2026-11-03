<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #68 — Müəllim və repetitor üçün şəxsi sayt 2027 (Kursometr üçün).
 * Kursometr faktları YALNIZ resources/lang/az/products.php-dən: adiniz.kursometr.com bir dəqiqəyə, fənn/qrup/həftəlik
 * cədvəl/davamiyyət, vaxtlı sınaqlar (ümumi və aralıq) avtomatik nəticə, ev tapşırıqları, ödəniş izləmə,
 * valideyn kabineti, pulsuz qeydiyyat. kursometr.com-dan əlavə: Google hesabı ilə giriş, telefon brauzerində işləyir.
 * Kursometr səhifəsinin dizayn/SEO imkanları, qiymət paketləri və rəylər barədə iddia YOXDUR.
 * Vizit kartı sayt qiyməti #17 ilə uyğundur: 500–1 200 AZN (təxmini). #35 ilə təkrar yox — yalnız link.
 */
class Blog68TutorWebsiteSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Valideyn övladı üçün riyaziyyat və ya ingilis dili müəllimi axtaranda adətən iki yol seçir: ya tanışlardan soruşur, ya da telefonu götürüb Google-a "riyaziyyat repetitoru Bakı", "ingilis dili repetitoru Nərimanov" və ya "abituriyent hazırlığı" yazır. Tanış tövsiyəsi hələ də güclüdür, amma tövsiyə alan valideyn də bir sonrakı addımda müəllimin adını internetdə axtarır: kimdir, nə qədər təcrübəsi var, hansı nəticələri var, harada dərs keçir, necə əlaqə saxlamaq olar.</p>
<p>Bu yazıda müəllim və repetitorun öz onlayn səhifəsinə niyə ehtiyacı olduğunu, həmin səhifədə nələrin olmalı olduğunu, Instagram, Google Business Profile, sifarişlə sayt, pulsuz konstruktorlar və Kursometr səhifəsi arasında necə seçim etməyi, valideynlərin necə axtardığını və repetitor üçün yerli SEO-nun əsaslarını izah edirik. Sonda hazır yoxlama siyahısı var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Repetitora sayt lazımdırmı?</td><td>Bəli, ən azı bir sadə səhifə: valideyn müəllimi Instagram-dan kənarda da tapmalı və bir yerdə fənni, təcrübəni, cədvəli və əlaqəni görməlidir</td></tr>
    <tr><td>Səhifədə nə olmalıdır?</td><td>Foto, fənlər və siniflər, təcrübə, nəticələr (icazə ilə), cədvəl, qiymət və ya "qiymət üçün yazın", ünvan və ya onlayn format, WhatsApp, valideyn rəyləri</td></tr>
    <tr><td>Hansı variant?</td><td>Instagram — tanıtım üçün; Google Business Profile — fiziki dərs yeriniz varsa; sifarişlə vizit kartı sayt — 500–1 200 AZN (təxmini); pulsuz konstruktor — sürətli, amma məhdud; Kursometr — adiniz.kursometr.com ünvanı və dərs idarəetməsi bir yerdə</td></tr>
    <tr><td>Valideyn nə axtarır?</td><td>"Fənn + repetitor + şəhər/rayon", "abituriyent hazırlığı", "buraxılış imtahanına hazırlıq", "onlayn ingilis dili dərsi"</td></tr>
    <tr><td>Etik qayda</td><td>Tələbənin adını, fotosunu və balını yalnız tələbənin (azyaşlıdırsa valideynin) icazəsi ilə dərc edin</td></tr>
  </tbody>
</table>

<h2>Niyə Yalnız Instagram Kifayət Etmir?</h2>
<p>Bir çox repetitor üçün Instagram ilk və tək vitrindir. Bu təbiidir: dərsdən qısa videolar, test izahları, tələbə uğurları orada yaxşı yayılır. Amma yalnız Instagram-a güvənməyin aydın məhdudiyyətləri var:</p>
<ul>
  <li><strong>Google-da tapılmaq çətindir.</strong> "Kimya repetitoru Yasamal" kimi sorğuda Instagram profili nadir hallarda yuxarıda çıxır; valideyn isə çox vaxt məhz Google-dan başlayır.</li>
  <li><strong>Vacib məlumat postlar arasında itir.</strong> Cədvəl bir hekayədə, qiymət şərhdə, ünvan bioda, nəticələr köhnə postlarda qalır. Valideyn hamısını yığmaq üçün vaxt sərf etmək istəmir.</li>
  <li><strong>Hər valideyn Instagram istifadə etmir.</strong> Xüsusən yaşlı nəsil və ya sosial şəbəkədən uzaq duran ailələr üçün sadə veb səhifə daha rahatdır.</li>
  <li><strong>Hesab sizin mülkünüz deyil.</strong> Hesab bloklanarsa, sındırılarsa və ya alqoritm dəyişərsə, illərlə yığılmış auditoriya bir anda görünməz ola bilər.</li>
</ul>
<p>Instagram-ı atmağa ehtiyac yoxdur. Ən yaxşı model budur: Instagram diqqət cəlb edir, şəxsi səhifə isə bütün vacib məlumatı bir yerdə toplayır və valideyni WhatsApp-a yönləndirir. Bu mövzuda ətraflı müqayisə: <a href="/blog-details/instagram-magaza-ve-sayt-2026">Instagram mağazası varkən sayt lazımdırmı</a>.</p>

<h2>Valideyn Repetitoru Necə Axtarır?</h2>
<p>Repetitor axtarışı demək olar ki, həmişə <strong>yerli</strong> və <strong>konkretdir</strong>. Valideyn fənni, sinfi və yeri bilir. Tipik sorğular belədir:</p>
<ul>
  <li><strong>Fənn + şəhər/rayon:</strong> "riyaziyyat repetitoru Bakı", "ingilis dili repetitoru Nərimanov", "fizika müəllimi Sumqayıt", "rus dili repetitoru Gəncə";</li>
  <li><strong>İmtahan və məqsəd:</strong> "abituriyent hazırlığı", "buraxılış imtahanına hazırlıq", "magistratura hazırlığı", "IELTS hazırlığı";</li>
  <li><strong>Format:</strong> "onlayn ingilis dili dərsi", "evə gələn müəllim", "fərdi riyaziyyat dərsi";</li>
  <li><strong>Sinif və yaş:</strong> "ibtidai sinif müəllimi", "məktəbəqədər hazırlıq", "5-ci sinif riyaziyyat".</li>
</ul>
<p>Bu sorğulardan bir nəticə çıxır: səhifəniz valideynin istifadə etdiyi sözlərlə danışmalıdır. "Riyaziyyat üzrə fərdi və qrup dərsləri — Nərimanov və onlayn, 9–11-ci siniflər, abituriyent hazırlığı" kimi bir cümlə "Uğura gedən yol!" kimi şüardan həm valideyn, həm də Google üçün qat-qat faydalıdır.</p>

<h2>Müəllim Səhifəsində Nələr Olmalıdır?</h2>
<table>
  <thead>
    <tr><th>Bölmə</th><th>Nə yazmalı</th><th>Niyə vacibdir</th></tr>
  </thead>
  <tbody>
    <tr><td>Foto və təqdimat</td><td>Real, aydın portret foto; ad, soyad; bir cümləlik təqdimat</td><td>Valideyn övladını kimə etibar etdiyini görmək istəyir</td></tr>
    <tr><td>Fənlər və siniflər</td><td>Hansı fənlər, hansı siniflər, hansı imtahanlara hazırlıq, tədris dili (AZ/RU)</td><td>Valideyn ilk baxışda "bu bizə uyğundur" deməlidir</td></tr>
    <tr><td>Təcrübə və təhsil</td><td>Neçə ildir dərs keçirsiniz, harada oxumusunuz, sertifikatlar</td><td>Peşəkarlığın ən sadə sübutu</td></tr>
    <tr><td>Nəticələr</td><td>Tələbə nəticələri, qəbul olunduğu yerlər — yalnız icazə ilə</td><td>Valideyn üçün əsas qərar amili</td></tr>
    <tr><td>Cədvəl və format</td><td>Həftənin günləri, saatlar, fərdi/qrup, əyani/onlayn</td><td>Uyğun vaxt yoxdursa, valideyn yazmayacaq</td></tr>
    <tr><td>Qiymət</td><td>Aylıq və ya dərs başına qiymət, yaxud "qiymət üçün yazın"</td><td>Lazımsız yazışmaları azaldır</td></tr>
    <tr><td>Yer</td><td>Rayon, metro, xəritə və ya "yalnız onlayn"</td><td>Yol uzaqdırsa, valideyn başqa müəllim seçir</td></tr>
    <tr><td>Əlaqə</td><td>WhatsApp düyməsi, telefon</td><td>Qərar verən valideyn bir toxunuşla yazmalıdır</td></tr>
    <tr><td>Rəylər</td><td>Valideyn və tələbə rəyləri — icazə ilə</td><td>Tanış tövsiyəsinin onlayn versiyası</td></tr>
  </tbody>
</table>

<h3>Foto, fənlər, təcrübə və nəticələr</h3>
<p>Foto peşəkar olmaya bilər, amma aydın və real olmalıdır: işıqlı yer, səliqəli fon, üzünüz yaxşı görünsün. Stok şəkil və ya loqo müəllimin özünü əvəz etmir. Fənləri ümumi deyil, konkret yazın: "riyaziyyat" əvəzinə "riyaziyyat, 5–11-ci siniflər, buraxılış və qəbul imtahanlarına hazırlıq". Təcrübəni də rəqəmlə deyin: neçə il, hansı məktəb və ya kursda.</p>
<p>Nəticələr ən güclü argumentdir, amma burada diqqətli olmaq lazımdır. Yalnız real, yoxlanıla bilən nəticələri yazın və şişirtməyin. "Hər tələbəm 600+ bal toplayır" kimi iddialar etibarı artırmır, əksinə azaldır.</p>

<h3>Cədvəl, qiymət, yer və onlayn format</h3>
<p>Həftəlik cədvəli ümumi formada göstərmək kifayətdir: hansı günlər, hansı saat aralıqları, boş yer varmı. Qiyməti açıq yazmaq istəmirsinizsə, bu normaldır, amma heç olmasa "qiymət fərdi və ya qrup formatından asılıdır, WhatsApp-a yazın" kimi aydın cümlə qoyun. Əyani dərs keçirsinizsə, rayonu və ən yaxın metronu yazın; evdə dərs keçirsinizsə, dəqiq ünvanı yox, ərazini göstərmək kifayətdir. Onlayn dərs üçün hansı platformadan istifadə etdiyinizi və nə lazım olduğunu qeyd edin.</p>

<h3>WhatsApp ilə əlaqə</h3>
<p>Azərbaycanda valideynlərin böyük hissəsi müəllimlə ilk əlaqəni WhatsApp ilə qurur. Səhifədə görünən yerdə WhatsApp düyməsi olsun və hazır mesajla açılsın: "Salam, 9-cu sinif riyaziyyat dərsi ilə maraqlanıram." Bu, valideynin nə yazacağını düşünmək ehtiyacını aradan qaldırır və sizə də sorğunu dərhal anlamağa kömək edir.</p>

<h3>Valideyn rəyləri və etika</h3>
<p>Rəylər tanış tövsiyəsinin onlayn formasıdır. Valideyndən qısa, səmimi bir neçə cümlə xahiş edin: övladı hansı səviyyədən başladı, nə dəyişdi. Ad əvəzinə "Leyla xanım, 10-cu sinif şagirdinin anası" kimi imza da kifayətdir.</p>
<p>Ən vacib qayda: <strong>tələbənin nəticəsini, adını və ya fotosunu dərc etməzdən əvvəl icazə alın</strong>. Tələbə azyaşlıdırsa, icazəni valideyndən alın. İmtahan nəticəsi vərəqəsinin şəklini paylaşırsınızsa, şəxsi məlumatları (iş nömrəsi, doğum tarixi, şəxsiyyət vəsiqəsi məlumatı) gizlədin. Rəy uydurmayın və başqa müəllimin tələbəsini öz nəticəniz kimi göstərməyin — Azərbaycanda repetitor dairəsi kiçikdir və bu tez üzə çıxır.</p>

<h2>Variantların Müqayisəsi</h2>
<table>
  <thead>
    <tr><th>Variant</th><th>Üstünlüyü</th><th>Məhdudiyyəti</th><th>Kimə uyğundur</th></tr>
  </thead>
  <tbody>
    <tr><td>Yalnız Instagram profili</td><td>Pulsuz, video və hekayələrlə canlı tanıtım</td><td>Google-da zəif görünür, məlumat postlar arasında itir, hesab sizin nəzarətinizdə deyil</td><td>Tanıtım kanalı kimi hər kəsə, amma tək kanal kimi yox</td></tr>
    <tr><td>Google Business Profile</td><td>Pulsuz, Google Xəritədə və yerli axtarışda görünmək, rəylər</td><td>Fiziki dərs yeri və ya xidmət ərazisi tələb olunur; yalnız onlayn dərs keçirənə uyğun olmaya bilər</td><td>Kurs otağı və ya kabineti olan müəllimlər</td></tr>
    <tr><td>Studiyadan sifarişlə sayt (RS Code)</td><td>Öz domeniniz, fərdi dizayn, tam SEO nəzarəti, istənilən bölmə</td><td>Vizit kartı sayt təxminən 500–1 200 AZN; domen və hostinq ayrıca illik xərcdir</td><td>Brend qurmaq istəyən müəllimlər, kiçik kurslar</td></tr>
    <tr><td>Pulsuz sayt konstruktorları</td><td>Sürətli başlanğıc, texniki bilik tələb etmir</td><td>Pulsuz planda çox vaxt platformanın reklamı və alt-domen olur; dizayn və SEO məhdud, saytı köçürmək çətindir</td><td>Sınaq üçün, ilk addım kimi</td></tr>
    <tr><td>Kursometr səhifəsi (adiniz.kursometr.com)</td><td>Bir dəqiqəyə öz ünvanınız; qruplar, cədvəl, davamiyyət, vaxtlı sınaqlar, ev tapşırıqları, ödəniş izləmə və valideyn kabineti eyni yerdə; qeydiyyat pulsuzdur</td><td>Öz domeniniz deyil, kursometr.com alt-domenidir; səhifənin görünüşü üçün imkanları kursometr.com-da yoxlayın</td><td>Tələbələrini və dərslərini bir yerdən idarə etmək istəyən repetitorlar</td></tr>
  </tbody>
</table>
<p>Bu variantlar bir-birini istisna etmir. Çox vaxt ən yaxşı nəticə birləşmədən alınır: Instagram diqqət cəlb edir, Google Business Profile (dərs yeriniz varsa) xəritədə göstərir, şəxsi səhifə isə bütün məlumatı toplayır və valideyni əlaqəyə gətirir.</p>

<h2>Hansı Variant Sizə Uyğundur?</h2>
<ul>
  <li><strong>Yeni başlayırsınız, bir neçə tələbəniz var:</strong> Instagram + Kursometr ünvanı. Pulsuz başlayırsınız, həm tələbələrə göstərməyə ünvan, həm də dərsləri idarə etmək üçün alət olur.</li>
  <li><strong>Öz kabinetiniz və ya kurs otağınız var:</strong> mütləq Google Business Profile açın — addım-addım bələdçi: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır</a>.</li>
  <li><strong>Brend qurmaq, bir neçə müəllimlə kurs açmaq istəyirsiniz:</strong> öz domeninizlə sifarişlə sayt mənalıdır. Qiymətə nələrin təsir etdiyi barədə: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">veb sayt qiyməti Azərbaycanda</a>.</li>
  <li><strong>Sadəcə yoxlamaq istəyirsiniz:</strong> pulsuz konstruktor ilk addım ola bilər, amma sonradan köçürmə çətinliyini nəzərə alın.</li>
</ul>

<h2>Kursometr: Ünvan və Dərs İdarəetməsi Bir Yerdə</h2>
<p>Səhifə yalnız tələbə tapmaq üçün deyil. Tələbə gəldikdən sonra əsl iş başlayır: qruplar, cədvəl, davamiyyət, sınaqlar, ev tapşırıqları, ödənişlər, valideynlərin sualları. Çox müəllim bunları WhatsApp qrupları, dəftər və Excel arasında bölür. Bunun nə qədər vaxt apardığını ayrıca yazıda izah etmişik: <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">repetitorlar üçün dərs idarəetməsi — WhatsApp və Excel-dən platformaya keçid</a>.</p>
<p>RS Code olaraq hazırladığımız <a href="/mehsullar/kursometr">Kursometr</a> platformasında müəllim bir dəqiqəyə öz ünvanını açır — <strong>adiniz.kursometr.com</strong>. Həmin yerdə:</p>
<ul>
  <li>fənlər, qruplar, həftəlik dərs cədvəli və davamiyyət qeydi;</li>
  <li>vaxtlı sınaqlar — ümumi və aralıq — avtomatik nəticələrlə;</li>
  <li>ev tapşırıqlarının verilməsi və yoxlanması;</li>
  <li>tələbə ödənişlərinin izlənməsi;</li>
  <li>valideyn kabineti — valideyn uşağın nəticələrini özü izləyir.</li>
</ul>
<p>Qeydiyyat pulsuzdur. Valideyn üçün bu da etibar məsələsidir: müəllimin nəticələri yalnız sözlə yox, valideyn kabinetində görünən sınaq balları ilə də izlənir. Başlamaq üçün: <a href="https://kursometr.com/" target="_blank" rel="noopener">kursometr.com</a>.</p>

<h2>Repetitor üçün Yerli SEO: Əsaslar</h2>
<p>Yerli SEO — valideyn "fənn + rayon" yazanda sizin tapılmağınız üçün görülən işlərdir. Repetitor üçün əsasları bunlardır:</p>
<ul>
  <li><strong>Başlıq və ilk cümlə:</strong> fənn, sinif, yer və format: "İngilis dili repetitoru — Nərimanov və onlayn, 5–11-ci siniflər".</li>
  <li><strong>Hər əsas xidmət üçün aydın bölmə:</strong> "Abituriyent hazırlığı", "Buraxılış imtahanına hazırlıq", "İbtidai siniflər" — valideynin sözləri ilə.</li>
  <li><strong>Eyni əlaqə məlumatı hər yerdə:</strong> ad, telefon, rayon saytda, Instagram bioda və Google Business Profile-da eyni olsun.</li>
  <li><strong>Google Business Profile:</strong> fiziki dərs yeriniz varsa, düzgün kateqoriya, iş saatları, real fotolar və valideyn rəyləri; rəylərə nəzakətli cavab verin.</li>
  <li><strong>Rəylər:</strong> razı valideyndən Google-da rəy yazmağı xahiş edin — amma rəy üçün endirim və ya hədiyyə təklif etməyin.</li>
  <li><strong>Mobil sürət:</strong> valideynlərin çoxu telefondan baxır; səhifə tez açılmalı, WhatsApp düyməsi görünən yerdə olmalıdır.</li>
  <li><strong>Faydalı məzmun:</strong> imtahana hazırlıq məsləhətləri, tez-tez verilən suallar — həm valideynə kömək edir, həm də axtarışda yeni sorğulara görünmək şansı yaradır.</li>
</ul>
<p>Öz domeninizlə sayt sifariş edirsinizsə, texniki SEO (başlıqlar, schema, sürət) hazırlıq zamanı qurulmalıdır. SEO dəstəyi lazımdırsa: <a href="/seo-xidmeti">SEO xidməti</a>.</p>

<h2>Tez-tez Edilən Səhvlər</h2>
<ul>
  <li><strong>Yalnız şüar, konkret məlumat yox</strong> — fənn, sinif, yer və format yazılmayıb;</li>
  <li><strong>Foto yoxdur və ya stok şəkildir</strong>;</li>
  <li><strong>Nəticələr icazəsiz dərc olunub</strong> və ya şəxsi məlumatlar gizlədilməyib;</li>
  <li><strong>Şişirdilmiş vədlər</strong> — "100% qəbul zəmanəti" kimi;</li>
  <li><strong>Əlaqə çətindir</strong> — WhatsApp düyməsi yoxdur, telefon gizlədilib;</li>
  <li><strong>Köhnə məlumat</strong> — cədvəl, qiymət və ya ünvan illərdir yenilənməyib.</li>
</ul>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Real, aydın portret foto və bir cümləlik təqdimat</li>
  <li>☐ Fənlər, siniflər, imtahan hazırlığı və tədris dili konkret yazılıb</li>
  <li>☐ Təcrübə illəri, təhsil və sertifikatlar</li>
  <li>☐ Nəticələr — yalnız icazə ilə, şəxsi məlumatlar gizlədilib</li>
  <li>☐ Həftəlik cədvəl, fərdi/qrup və əyani/onlayn format</li>
  <li>☐ Qiymət və ya "qiymət üçün yazın" qeydi</li>
  <li>☐ Rayon, metro və ya "yalnız onlayn"</li>
  <li>☐ Hazır mesajla WhatsApp düyməsi</li>
  <li>☐ Valideyn rəyləri — icazə ilə</li>
  <li>☐ Fiziki dərs yeri varsa Google Business Profile</li>
  <li>☐ Ad, telefon, rayon hər yerdə eyni</li>
  <li>☐ Səhifənin linki Instagram bioda və WhatsApp profilində</li>
  <li>☐ Səhifə telefonda tez açılır</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Repetitorun Instagram-ı varsa, ayrıca sayt lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram tanıtım üçün yaxşıdır, amma Google-da "riyaziyyat repetitoru Bakı" kimi sorğularda nadir hallarda yuxarıda çıxır və vacib məlumat postlar arasında itir. Fənn, təcrübə, cədvəl, qiymət və WhatsApp əlaqəsi olan sadə şəxsi səhifə valideynin qərar verməsini asanlaşdırır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Müəllim üçün sayt neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Studiyadan sifarişlə vizit kartı sayt Azərbaycanda təxminən 500–1 200 AZN-dir; domen və hostinq ayrıca illik xərcdir. Pulsuz başlamaq istəyən müəllim Kursometr-də pulsuz qeydiyyatla adiniz.kursometr.com ünvanını aça bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tələbənin nəticəsini saytda paylaşmaq olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yalnız icazə ilə. Tələbənin adını, fotosunu və balını dərc etməzdən əvvəl tələbədən, azyaşlıdırsa valideyndən razılıq alın. Nəticə vərəqəsinin şəklində iş nömrəsi, doğum tarixi kimi şəxsi məlumatları gizlədin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Onlayn dərs keçirən müəllim Google Business Profile aça bilərmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google Business Profile müştəri ilə üzbəüz görüşən bizneslər üçündür: fiziki dərs yeri və ya tələbənin evinə getdiyiniz xidmət ərazisi olmalıdır. Yalnız onlayn dərs keçirirsinizsə, profil uyğun olmaya bilər; bu halda şəxsi səhifə və sosial şəbəkələr əsas kanaldır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-də nələr var?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr-də müəllim bir dəqiqəyə adiniz.kursometr.com ünvanını açır; fənlər, qruplar, həftəlik cədvəl və davamiyyət, ümumi və aralıq vaxtlı sınaqlar avtomatik nəticələrlə, ev tapşırıqları, ödəniş izləmə və valideyn kabineti eyni yerdədir. Qeydiyyat pulsuzdur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Səhifədə qiyməti yazmaq lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Məcburi deyil. Açıq qiymət lazımsız yazışmaları azaldır, amma qiymət format və sinifdən asılıdırsa, "qiymət fərdi və ya qrup formatından asılıdır, WhatsApp-a yazın" kimi aydın qeyd də kifayətdir. Əsas odur ki, valideyn növbəti addımı bilsin.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">Repetitorlar üçün dərs idarəetməsi: WhatsApp və Excel-dən platformaya</a></li>
  <li><a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır?</a></li>
  <li><a href="/blog-details/instagram-magaza-ve-sayt-2026">Instagram mağazası varkən sayt lazımdırmı?</a></li>
  <li><a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb sayt qiyməti Azərbaycanda</a></li>
</ul>

<h2>Nəticə</h2>
<p>Müəllim üçün şəxsi səhifə reklam deyil, valideynlə ilk görüşdür. Real foto, konkret fənlər, təcrübə, icazə ilə dərc olunmuş nəticələr, cədvəl, qiymət və bir toxunuşla WhatsApp — valideynin qərar verməsi üçün lazım olan hər şey budur. Instagram diqqət cəlb etsin, Google Business Profile (dərs yeriniz varsa) xəritədə göstərsin, səhifə isə hamısını bir yerə toplasın. Tələbə gəldikdən sonra isə dərsləri, sınaqları, ödənişləri və valideyn əlaqəsini bir yerdən idarə etmək vaxtınızı dərsə qaytarır.</p>
<p><strong>Pulsuz başlayın: <a href="https://kursometr.com/" target="_blank" rel="noopener">kursometr.com</a></strong> — və ya <a href="/mehsullar/kursometr">Kursometr haqqında ətraflı oxuyun</a>. Öz domeninizlə fərdi sayt istəyirsinizsə: <a href="/veb-saytlarin-hazirlanmasi">veb saytların hazırlanması xidməti</a> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Sayt qiyməti Azərbaycan bazarı üzrə təxminidir (noyabr 2026) və layihənin həcmindən asılıdır. Google Business Profile uyğunluq qaydaları Google tərəfindən dəyişə bilər — aktual qaydaları Google-un rəsmi yardım səhifəsində yoxlayın. Kursometr funksiyaları barədə ən son məlumat kursometr.com-dadır.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>When parents look for a maths or English teacher for their child, they usually take one of two routes: they ask people they know, or they pick up their phone and type "math tutor Baku", "English tutor Narimanov" or "university entrance exam preparation" into Google. A personal recommendation is still powerful, but even a parent who got one will search the teacher's name online as the next step: who is this person, how much experience do they have, what results have their students achieved, where do they teach, and how can I get in touch?</p>
<p>This article explains why a teacher or tutor needs their own online page, what that page should contain, how to choose between Instagram, Google Business Profile, a custom website, free website builders and a Kursometr page, how parents search, and the basics of local SEO for tutors. There is a ready-made checklist at the end.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Does a tutor need a website?</td><td>Yes, at least one simple page: parents should be able to find you outside Instagram and see your subjects, experience, schedule and contact details in one place</td></tr>
    <tr><td>What should the page contain?</td><td>Photo, subjects and grades, experience, results (with permission), schedule, price or "message for price", location or online format, WhatsApp, parent reviews</td></tr>
    <tr><td>Which option?</td><td>Instagram — for promotion; Google Business Profile — if you have a physical teaching place; a custom business-card site — AZN 500–1,200 (estimate); a free builder — quick but limited; Kursometr — a yourname.kursometr.com address plus lesson management in one place</td></tr>
    <tr><td>What do parents search for?</td><td>"Subject + tutor + city/district", "university entrance exam preparation", "school leaving exam preparation", "online English lessons"</td></tr>
    <tr><td>Ethics rule</td><td>Publish a student's name, photo or score only with the permission of the student (or the parent, if the student is a minor)</td></tr>
  </tbody>
</table>

<h2>Why Instagram Alone Is Not Enough</h2>
<p>For many tutors Instagram is the first and only shop window. That is natural: short lesson clips, test walkthroughs and student successes spread well there. But relying on Instagram alone has clear limits:</p>
<ul>
  <li><strong>It is hard to find on Google.</strong> For a query like "chemistry tutor Yasamal", an Instagram profile rarely appears near the top — and parents very often start with Google.</li>
  <li><strong>Key information gets lost between posts.</strong> The schedule is in a story, the price in a comment, the address in the bio, the results in old posts. Parents do not want to spend time piecing it all together.</li>
  <li><strong>Not every parent uses Instagram.</strong> Older parents and families who stay away from social media find a simple web page much easier.</li>
  <li><strong>The account is not your property.</strong> If it is blocked, hacked or the algorithm changes, an audience built over years can become invisible overnight.</li>
</ul>
<p>There is no need to drop Instagram. The best model is this: Instagram attracts attention, while a personal page gathers all the key information in one place and sends parents to WhatsApp. A detailed comparison: <a href="/blog-details/instagram-shop-vs-website-2026">do you need a website if you sell on Instagram</a>.</p>

<h2>How Do Parents Search for a Tutor?</h2>
<p>Tutor searches are almost always <strong>local</strong> and <strong>specific</strong>. Parents know the subject, the grade and the area. Typical queries look like this:</p>
<ul>
  <li><strong>Subject + city/district:</strong> "math tutor Baku" (riyaziyyat repetitoru Bakı), "English tutor Narimanov" (ingilis dili repetitoru Nərimanov), "physics teacher Sumgait", "Russian tutor Ganja";</li>
  <li><strong>Exam and goal:</strong> "university entrance exam preparation" (abituriyent hazırlığı), "school leaving exam preparation", "master's admission preparation", "IELTS preparation";</li>
  <li><strong>Format:</strong> "online English lessons", "home tutor", "one-to-one maths lessons";</li>
  <li><strong>Grade and age:</strong> "primary school teacher", "pre-school preparation", "5th grade maths".</li>
</ul>
<p>The takeaway: your page should speak in the words parents use. A sentence like "One-to-one and group maths lessons — Narimanov and online, grades 9–11, entrance exam preparation" is far more useful to both parents and Google than a slogan like "Your path to success!".</p>

<h2>What Should a Teacher's Page Contain?</h2>
<table>
  <thead>
    <tr><th>Section</th><th>What to write</th><th>Why it matters</th></tr>
  </thead>
  <tbody>
    <tr><td>Photo and intro</td><td>A real, clear portrait; first and last name; a one-sentence introduction</td><td>Parents want to see who they are trusting their child to</td></tr>
    <tr><td>Subjects and grades</td><td>Which subjects, which grades, which exams you prepare for, language of instruction (AZ/RU)</td><td>Parents should think "this is right for us" at first glance</td></tr>
    <tr><td>Experience and education</td><td>How many years you have been teaching, where you studied, certificates</td><td>The simplest proof of professionalism</td></tr>
    <tr><td>Results</td><td>Student results and where they were admitted — only with permission</td><td>A key decision factor for parents</td></tr>
    <tr><td>Schedule and format</td><td>Days of the week, hours, one-to-one/group, in person/online</td><td>If no time slot fits, parents will not write</td></tr>
    <tr><td>Price</td><td>Monthly or per-lesson price, or "message for price"</td><td>Cuts down on unnecessary messages</td></tr>
    <tr><td>Location</td><td>District, metro, map, or "online only"</td><td>If it is too far, parents pick another teacher</td></tr>
    <tr><td>Contact</td><td>WhatsApp button, phone</td><td>A parent who has decided should be able to write with one tap</td></tr>
    <tr><td>Reviews</td><td>Reviews from parents and students — with permission</td><td>The online version of a personal recommendation</td></tr>
  </tbody>
</table>

<h3>Photo, subjects, experience and results</h3>
<p>The photo does not have to be professional, but it must be clear and real: a well-lit place, a tidy background, your face clearly visible. A stock image or a logo cannot replace the teacher. Write your subjects specifically rather than generally: instead of "maths", say "maths, grades 5–11, preparation for school leaving and university entrance exams". State your experience in numbers too: how many years, at which school or course.</p>
<p>Results are your strongest argument, but care is needed here. Write only real, verifiable results and do not exaggerate. Claims like "every one of my students scores 600+" do not build trust — they undermine it.</p>

<h3>Schedule, price, location and online format</h3>
<p>Showing your weekly schedule in general terms is enough: which days, which time ranges, whether there are free places. If you prefer not to publish your price, that is fine, but at least add a clear line such as "the price depends on one-to-one or group format — message me on WhatsApp". If you teach in person, give the district and the nearest metro station; if you teach at home, showing the area rather than the exact address is enough. For online lessons, mention which platform you use and what the student needs.</p>

<h3>Contact via WhatsApp</h3>
<p>In Azerbaijan most parents make first contact with a teacher on WhatsApp. Place a visible WhatsApp button on the page that opens with a pre-filled message: "Hello, I am interested in 9th grade maths lessons." This saves parents from thinking about what to write and helps you understand the request immediately.</p>

<h3>Parent reviews and ethics</h3>
<p>Reviews are the online form of a personal recommendation. Ask parents for a few short, sincere sentences: what level their child started from and what changed. A signature such as "Leyla, mother of a 10th grade student" instead of a full name is enough.</p>
<p>The most important rule: <strong>get permission before publishing a student's result, name or photo</strong>. If the student is a minor, get permission from the parent. If you share a photo of an exam result sheet, hide personal data (candidate number, date of birth, ID details). Never invent reviews and never present another teacher's student as your own result — the tutoring community in Azerbaijan is small and this comes out quickly.</p>

<h2>Comparing the Options</h2>
<table>
  <thead>
    <tr><th>Option</th><th>Advantage</th><th>Limitation</th><th>Best for</th></tr>
  </thead>
  <tbody>
    <tr><td>Instagram profile only</td><td>Free, lively promotion with videos and stories</td><td>Weak visibility on Google, information gets lost between posts, the account is not under your control</td><td>Everyone as a promotion channel, but not as the only channel</td></tr>
    <tr><td>Google Business Profile</td><td>Free, visibility on Google Maps and in local search, reviews</td><td>Requires a physical teaching place or a service area; may not suit tutors who teach only online</td><td>Teachers with a classroom or office</td></tr>
    <tr><td>Custom website from a studio (RS Code)</td><td>Your own domain, custom design, full SEO control, any section you need</td><td>A business-card site costs about AZN 500–1,200; domain and hosting are a separate annual cost</td><td>Teachers building a brand, small course centres</td></tr>
    <tr><td>Free website builders</td><td>Quick start, no technical skills needed</td><td>The free plan often includes the platform's ads and a subdomain; design and SEO are limited, and moving the site is hard</td><td>Testing the waters, a first step</td></tr>
    <tr><td>Kursometr page (yourname.kursometr.com)</td><td>Your own address in a minute; groups, schedule, attendance, timed tests, homework, payment tracking and a parent cabinet in one place; registration is free</td><td>Not your own domain but a kursometr.com subdomain; check kursometr.com for what you can do with the page's appearance</td><td>Tutors who want to manage students and lessons from one place</td></tr>
  </tbody>
</table>
<p>These options do not exclude each other. The best results often come from combining them: Instagram attracts attention, Google Business Profile (if you have a teaching place) puts you on the map, and a personal page gathers all the information and brings parents to contact you.</p>

<h2>Which Option Suits You?</h2>
<ul>
  <li><strong>You are just starting and have a few students:</strong> Instagram + a Kursometr address. You start for free and get both an address to show students and a tool to manage lessons.</li>
  <li><strong>You have your own office or classroom:</strong> definitely open a Google Business Profile — step-by-step guide: <a href="/blog-details/how-to-create-google-business-profile-2026">how to create a Google Business Profile</a>.</li>
  <li><strong>You want to build a brand or open a course with several teachers:</strong> a custom site on your own domain makes sense. What affects the price: <a href="/blog-details/website-cost-azerbaijan-2026">website cost in Azerbaijan</a>.</li>
  <li><strong>You just want to try:</strong> a free builder can be a first step, but keep in mind that moving away later can be hard.</li>
</ul>

<h2>Kursometr: Your Address and Lesson Management in One Place</h2>
<p>A page is not only for finding students. Once students arrive, the real work begins: groups, schedules, attendance, tests, homework, payments, parents' questions. Many teachers split this between WhatsApp groups, notebooks and Excel. We explained how much time that takes in a separate article: <a href="/blog-details/tutor-class-management-software-2026">class management for tutors — moving from WhatsApp and Excel to a platform</a>.</p>
<p>On <a href="/mehsullar/kursometr">Kursometr</a>, the platform we built at RS Code, a teacher opens their own address in a minute — <strong>yourname.kursometr.com</strong>. In the same place you get:</p>
<ul>
  <li>subjects, groups, a weekly lesson schedule and attendance tracking;</li>
  <li>timed tests — general and interim — with automatic results;</li>
  <li>assigning and checking homework;</li>
  <li>student payment tracking;</li>
  <li>a parent cabinet — parents follow their child's results themselves.</li>
</ul>
<p>Registration is free. For parents this is also a matter of trust: a teacher's results are followed not only through words but through test scores visible in the parent cabinet. To get started: <a href="https://kursometr.com/" target="_blank" rel="noopener">kursometr.com</a>.</p>

<h2>Local SEO for Tutors: The Basics</h2>
<p>Local SEO is the work that helps you get found when a parent types "subject + district". For a tutor the basics are:</p>
<ul>
  <li><strong>Title and first sentence:</strong> subject, grade, location and format: "English tutor — Narimanov and online, grades 5–11".</li>
  <li><strong>A clear section for each main service:</strong> "Entrance exam preparation", "School leaving exam preparation", "Primary grades" — in parents' own words.</li>
  <li><strong>The same contact details everywhere:</strong> name, phone and district should match on your site, in your Instagram bio and on Google Business Profile.</li>
  <li><strong>Google Business Profile:</strong> if you have a physical teaching place — the right category, opening hours, real photos and parent reviews; reply to reviews politely.</li>
  <li><strong>Reviews:</strong> ask satisfied parents to leave a Google review — but do not offer discounts or gifts in return.</li>
  <li><strong>Mobile speed:</strong> most parents browse on their phones; the page must load quickly and the WhatsApp button must be visible.</li>
  <li><strong>Useful content:</strong> exam preparation tips and frequently asked questions help parents and give you a chance to appear for new searches.</li>
</ul>
<p>If you order a site on your own domain, technical SEO (titles, schema, speed) should be set up during development. If you need SEO support: <a href="/seo-services">SEO services</a>.</p>

<h2>Common Mistakes</h2>
<ul>
  <li><strong>Only a slogan, no specifics</strong> — subject, grade, location and format are missing;</li>
  <li><strong>No photo, or a stock image</strong>;</li>
  <li><strong>Results published without permission</strong>, or personal data not hidden;</li>
  <li><strong>Exaggerated promises</strong> — such as "100% admission guarantee";</li>
  <li><strong>Hard to contact</strong> — no WhatsApp button, phone number hidden;</li>
  <li><strong>Outdated information</strong> — schedule, price or address not updated for years.</li>
</ul>

<h2>Checklist</h2>
<ul>
  <li>☐ A real, clear portrait photo and a one-sentence introduction</li>
  <li>☐ Subjects, grades, exam preparation and language of instruction stated specifically</li>
  <li>☐ Years of experience, education and certificates</li>
  <li>☐ Results — only with permission, personal data hidden</li>
  <li>☐ Weekly schedule, one-to-one/group and in-person/online format</li>
  <li>☐ Price or a "message for price" note</li>
  <li>☐ District, metro or "online only"</li>
  <li>☐ WhatsApp button with a pre-filled message</li>
  <li>☐ Parent reviews — with permission</li>
  <li>☐ Google Business Profile if you have a physical teaching place</li>
  <li>☐ Name, phone and district identical everywhere</li>
  <li>☐ Page link in your Instagram bio and WhatsApp profile</li>
  <li>☐ The page loads quickly on a phone</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">If a tutor has Instagram, do they still need a website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram is good for promotion, but it rarely ranks near the top on Google for queries like "math tutor Baku", and key information gets lost between posts. A simple personal page with your subjects, experience, schedule, price and WhatsApp contact makes the parent's decision easier.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does a website for a teacher cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A custom business-card site from a studio costs about AZN 500–1,200 in Azerbaijan; domain and hosting are a separate annual cost. A teacher who wants to start for free can register on Kursometr at no cost and open a yourname.kursometr.com address.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can I share a student's results on my website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Only with permission. Before publishing a student's name, photo or score, get consent from the student, or from the parent if the student is a minor. On a photo of a result sheet, hide personal data such as the candidate number and date of birth.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can a teacher who teaches online open a Google Business Profile?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google Business Profile is meant for businesses that meet customers in person: you need a physical teaching place or a service area where you visit students' homes. If you teach only online, the profile may not be suitable; in that case your personal page and social media are the main channels.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What does Kursometr include?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">On Kursometr a teacher opens a yourname.kursometr.com address in a minute; subjects, groups, a weekly schedule and attendance, general and interim timed tests with automatic results, homework, payment tracking and a parent cabinet are all in one place. Registration is free.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should I list my price on the page?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">It is not required. A visible price cuts down on unnecessary messages, but if your price depends on format and grade, a clear note such as "the price depends on one-to-one or group format — message me on WhatsApp" is enough. What matters is that parents know the next step.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/tutor-class-management-software-2026">Class management for tutors: from WhatsApp and Excel to a platform</a></li>
  <li><a href="/blog-details/how-to-create-google-business-profile-2026">How to create a Google Business Profile</a></li>
  <li><a href="/blog-details/instagram-shop-vs-website-2026">Do you need a website if you sell on Instagram?</a></li>
  <li><a href="/blog-details/website-cost-azerbaijan-2026">Website cost in Azerbaijan</a></li>
</ul>

<h2>Conclusion</h2>
<p>For a teacher, a personal page is not an advert — it is the first meeting with a parent. A real photo, specific subjects, experience, results published with permission, a schedule, a price and one-tap WhatsApp: that is everything a parent needs to make a decision. Let Instagram attract attention, let Google Business Profile (if you have a teaching place) put you on the map, and let your page bring it all together. And once students arrive, managing lessons, tests, payments and parent communication from one place gives your time back to teaching.</p>
<p><strong>Start for free: <a href="https://kursometr.com/" target="_blank" rel="noopener">kursometr.com</a></strong> — or <a href="/mehsullar/kursometr">read more about Kursometr</a>. If you want a custom site on your own domain: <a href="/website-development">website development service</a> or <a href="/contact">contact us</a>.</p>
<p><small><em>The website price is an estimate for the Azerbaijani market (November 2026) and depends on the scope of the project. Google Business Profile eligibility rules may be changed by Google — check the current rules on Google's official help pages. The latest information about Kursometr features is on kursometr.com.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Когда родители ищут учителя математики или английского для ребёнка, они обычно идут одним из двух путей: спрашивают знакомых или берут телефон и набирают в Google «репетитор по математике Баку», «репетитор английского Нариманов» или «подготовка абитуриентов». Рекомендация знакомых по-прежнему сильна, но даже родитель, получивший её, следующим шагом ищет имя учителя в интернете: кто это, какой у него опыт, каких результатов добились ученики, где проходят занятия, как связаться.</p>
<p>В этой статье объясняем, зачем учителю и репетитору своя онлайн-страница, что на ней должно быть, как выбрать между Instagram, Google Business Profile, сайтом на заказ, бесплатными конструкторами и страницей в Kursometr, как ищут родители и какие основы локального SEO важны для репетитора. В конце — готовый чек-лист.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Нужен ли репетитору сайт?</td><td>Да, хотя бы одна простая страница: родители должны находить вас и вне Instagram и видеть в одном месте предметы, опыт, расписание и контакты</td></tr>
    <tr><td>Что должно быть на странице?</td><td>Фото, предметы и классы, опыт, результаты (с разрешения), расписание, цена или «цена по запросу», адрес или онлайн-формат, WhatsApp, отзывы родителей</td></tr>
    <tr><td>Какой вариант выбрать?</td><td>Instagram — для продвижения; Google Business Profile — если есть место для занятий; сайт-визитка на заказ — 500–1 200 AZN (оценка); бесплатный конструктор — быстро, но ограниченно; Kursometr — адрес ваше-имя.kursometr.com и управление занятиями в одном месте</td></tr>
    <tr><td>Что ищут родители?</td><td>«Предмет + репетитор + город/район», «подготовка абитуриентов», «подготовка к выпускному экзамену», «онлайн-уроки английского»</td></tr>
    <tr><td>Этическое правило</td><td>Публикуйте имя, фото и баллы ученика только с разрешения ученика (если он несовершеннолетний — родителя)</td></tr>
  </tbody>
</table>

<h2>Почему одного Instagram недостаточно</h2>
<p>Для многих репетиторов Instagram — первая и единственная витрина. Это естественно: короткие видео с уроков, разборы тестов и успехи учеников там хорошо расходятся. Но у ставки только на Instagram есть очевидные ограничения:</p>
<ul>
  <li><strong>В Google найти сложно.</strong> По запросу вроде «репетитор по химии Ясамал» профиль Instagram редко оказывается вверху, а родители очень часто начинают именно с Google.</li>
  <li><strong>Важная информация теряется среди постов.</strong> Расписание — в сторис, цена — в комментарии, адрес — в шапке, результаты — в старых постах. Родители не хотят тратить время, собирая всё по кусочкам.</li>
  <li><strong>Не все родители пользуются Instagram.</strong> Старшему поколению и семьям, далёким от соцсетей, простая веб-страница удобнее.</li>
  <li><strong>Аккаунт вам не принадлежит.</strong> Если его заблокируют, взломают или изменится алгоритм, аудитория, собранная за годы, может в один момент стать невидимой.</li>
</ul>
<p>Отказываться от Instagram не нужно. Лучшая модель такая: Instagram привлекает внимание, а личная страница собирает всю важную информацию в одном месте и ведёт родителя в WhatsApp. Подробное сравнение: <a href="/blog-details/instagram-magazin-ili-sajt-2026">нужен ли сайт, если вы продаёте в Instagram</a>.</p>

<h2>Как родители ищут репетитора?</h2>
<p>Поиск репетитора почти всегда <strong>локальный</strong> и <strong>конкретный</strong>. Родитель знает предмет, класс и район. Типичные запросы:</p>
<ul>
  <li><strong>Предмет + город/район:</strong> «репетитор по математике Баку» (riyaziyyat repetitoru Bakı), «репетитор английского Нариманов» (ingilis dili repetitoru Nərimanov), «учитель физики Сумгаит», «репетитор русского языка Гянджа»;</li>
  <li><strong>Экзамен и цель:</strong> «подготовка абитуриентов» (abituriyent hazırlığı), «подготовка к выпускному экзамену», «подготовка в магистратуру», «подготовка к IELTS»;</li>
  <li><strong>Формат:</strong> «онлайн-уроки английского», «репетитор с выездом на дом», «индивидуальные занятия по математике»;</li>
  <li><strong>Класс и возраст:</strong> «учитель начальных классов», «подготовка к школе», «математика 5 класс».</li>
</ul>
<p>Вывод: ваша страница должна говорить словами родителей. Фраза «Индивидуальные и групповые занятия по математике — Нариманов и онлайн, 9–11 классы, подготовка абитуриентов» гораздо полезнее и родителю, и Google, чем лозунг «Путь к успеху!».</p>

<h2>Что должно быть на странице учителя?</h2>
<table>
  <thead>
    <tr><th>Раздел</th><th>Что написать</th><th>Почему это важно</th></tr>
  </thead>
  <tbody>
    <tr><td>Фото и представление</td><td>Реальный чёткий портрет; имя и фамилия; представление в одно предложение</td><td>Родитель хочет видеть, кому доверяет ребёнка</td></tr>
    <tr><td>Предметы и классы</td><td>Какие предметы, какие классы, к каким экзаменам готовите, язык обучения (AZ/RU)</td><td>С первого взгляда родитель должен понять: «это нам подходит»</td></tr>
    <tr><td>Опыт и образование</td><td>Сколько лет преподаёте, где учились, сертификаты</td><td>Самое простое доказательство профессионализма</td></tr>
    <tr><td>Результаты</td><td>Результаты учеников, куда поступили — только с разрешения</td><td>Главный фактор решения для родителей</td></tr>
    <tr><td>Расписание и формат</td><td>Дни недели, часы, индивидуально/группа, очно/онлайн</td><td>Если нет удобного времени, родитель не напишет</td></tr>
    <tr><td>Цена</td><td>Цена за месяц или за урок либо «цена по запросу»</td><td>Сокращает лишнюю переписку</td></tr>
    <tr><td>Место</td><td>Район, метро, карта или «только онлайн»</td><td>Если далеко, родитель выберет другого учителя</td></tr>
    <tr><td>Контакты</td><td>Кнопка WhatsApp, телефон</td><td>Родитель, принявший решение, должен написать в одно касание</td></tr>
    <tr><td>Отзывы</td><td>Отзывы родителей и учеников — с разрешения</td><td>Онлайн-версия рекомендации знакомых</td></tr>
  </tbody>
</table>

<h3>Фото, предметы, опыт и результаты</h3>
<p>Фото не обязано быть профессиональным, но должно быть чётким и настоящим: светлое место, аккуратный фон, хорошо видно лицо. Стоковая картинка или логотип не заменят самого учителя. Пишите предметы конкретно, а не общо: вместо «математика» — «математика, 5–11 классы, подготовка к выпускным и вступительным экзаменам». Опыт тоже указывайте цифрами: сколько лет, в какой школе или на каких курсах.</p>
<p>Результаты — самый сильный аргумент, но здесь нужна осторожность. Пишите только реальные, проверяемые результаты и не преувеличивайте. Заявления вроде «все мои ученики набирают 600+» не повышают доверие, а наоборот, снижают его.</p>

<h3>Расписание, цена, место и онлайн-формат</h3>
<p>Достаточно показать недельное расписание в общем виде: какие дни, какие промежутки времени, есть ли свободные места. Если не хотите публиковать цену, это нормально, но добавьте хотя бы понятную фразу вроде «цена зависит от формата — индивидуально или в группе, напишите в WhatsApp». Если занимаетесь очно, укажите район и ближайшее метро; если принимаете дома, достаточно показать район, а не точный адрес. Для онлайн-уроков укажите, какой платформой пользуетесь и что нужно ученику.</p>

<h3>Связь через WhatsApp</h3>
<p>В Азербайджане большинство родителей впервые связываются с учителем через WhatsApp. Разместите на видном месте кнопку WhatsApp, которая открывается с готовым сообщением: «Здравствуйте, интересуют занятия по математике для 9 класса». Родителю не нужно думать, что написать, а вы сразу понимаете запрос.</p>

<h3>Отзывы родителей и этика</h3>
<p>Отзывы — онлайн-форма рекомендации знакомых. Попросите родителей написать несколько коротких искренних предложений: с какого уровня начинал ребёнок и что изменилось. Вместо полного имени достаточно подписи вроде «Лейла, мама ученика 10 класса».</p>
<p>Самое важное правило: <strong>получите разрешение, прежде чем публиковать результат, имя или фото ученика</strong>. Если ученик несовершеннолетний, разрешение нужно получить у родителя. Если публикуете фото листа с результатами экзамена, скройте персональные данные (номер работы, дату рождения, данные удостоверения личности). Не придумывайте отзывы и не выдавайте учеников другого учителя за свои результаты — круг репетиторов в Азербайджане небольшой, и такое быстро выходит наружу.</p>

<h2>Сравнение вариантов</h2>
<table>
  <thead>
    <tr><th>Вариант</th><th>Преимущество</th><th>Ограничение</th><th>Кому подходит</th></tr>
  </thead>
  <tbody>
    <tr><td>Только профиль в Instagram</td><td>Бесплатно, живое продвижение через видео и сторис</td><td>Слабая видимость в Google, информация теряется среди постов, аккаунт не под вашим контролем</td><td>Всем как канал продвижения, но не как единственный канал</td></tr>
    <tr><td>Google Business Profile</td><td>Бесплатно, видимость на Google Картах и в локальном поиске, отзывы</td><td>Нужно физическое место занятий или зона обслуживания; может не подойти тем, кто преподаёт только онлайн</td><td>Учителям с кабинетом или классом</td></tr>
    <tr><td>Сайт на заказ в студии (RS Code)</td><td>Свой домен, индивидуальный дизайн, полный контроль над SEO, любые разделы</td><td>Сайт-визитка стоит примерно 500–1 200 AZN; домен и хостинг — отдельный ежегодный расход</td><td>Учителям, которые строят бренд, небольшим курсам</td></tr>
    <tr><td>Бесплатные конструкторы сайтов</td><td>Быстрый старт, не нужны технические знания</td><td>На бесплатном тарифе часто есть реклама платформы и поддомен; дизайн и SEO ограничены, перенести сайт сложно</td><td>Для пробы, как первый шаг</td></tr>
    <tr><td>Страница в Kursometr (ваше-имя.kursometr.com)</td><td>Свой адрес за минуту; группы, расписание, посещаемость, тесты на время, домашние задания, учёт оплат и кабинет родителя в одном месте; регистрация бесплатна</td><td>Не собственный домен, а поддомен kursometr.com; возможности оформления страницы уточняйте на kursometr.com</td><td>Репетиторам, которые хотят управлять учениками и занятиями из одного места</td></tr>
  </tbody>
</table>
<p>Эти варианты не исключают друг друга. Лучший результат часто даёт их сочетание: Instagram привлекает внимание, Google Business Profile (если есть место занятий) показывает вас на карте, а личная страница собирает всю информацию и приводит родителя к контакту.</p>

<h2>Какой вариант подходит вам?</h2>
<ul>
  <li><strong>Вы только начинаете, учеников немного:</strong> Instagram + адрес в Kursometr. Вы начинаете бесплатно и получаете и адрес, который можно показать ученикам, и инструмент для управления занятиями.</li>
  <li><strong>У вас есть свой кабинет или класс:</strong> обязательно откройте Google Business Profile — пошаговое руководство: <a href="/blog-details/kak-sozdat-google-business-profile-2026">как создать Google Business Profile</a>.</li>
  <li><strong>Хотите строить бренд или открыть курсы с несколькими учителями:</strong> имеет смысл сайт на заказ со своим доменом. Что влияет на цену: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">стоимость сайта в Азербайджане</a>.</li>
  <li><strong>Просто хотите попробовать:</strong> бесплатный конструктор может стать первым шагом, но учитывайте, что позже переехать будет сложно.</li>
</ul>

<h2>Kursometr: адрес и управление занятиями в одном месте</h2>
<p>Страница нужна не только для поиска учеников. Когда ученики пришли, начинается настоящая работа: группы, расписание, посещаемость, тесты, домашние задания, оплаты, вопросы родителей. Многие учителя распределяют всё это между группами в WhatsApp, тетрадью и Excel. Сколько времени это отнимает, мы разобрали в отдельной статье: <a href="/blog-details/programma-dlya-repetitorov-2026">управление занятиями для репетиторов — от WhatsApp и Excel к платформе</a>.</p>
<p>В <a href="/mehsullar/kursometr">Kursometr</a> — платформе, которую мы создали в RS Code, — учитель за минуту открывает свой адрес: <strong>ваше-имя.kursometr.com</strong>. В одном месте:</p>
<ul>
  <li>предметы, группы, недельное расписание занятий и учёт посещаемости;</li>
  <li>тесты на время — общие и промежуточные — с автоматическими результатами;</li>
  <li>выдача и проверка домашних заданий;</li>
  <li>учёт оплат учеников;</li>
  <li>кабинет родителя — родитель сам следит за результатами ребёнка.</li>
</ul>
<p>Регистрация бесплатна. Для родителей это ещё и вопрос доверия: результаты учителя видны не только на словах, но и в баллах тестов в кабинете родителя. Начать: <a href="https://kursometr.com/" target="_blank" rel="noopener">kursometr.com</a>.</p>

<h2>Локальное SEO для репетитора: основы</h2>
<p>Локальное SEO — это работа, которая помогает вас найти, когда родитель набирает «предмет + район». Для репетитора основы такие:</p>
<ul>
  <li><strong>Заголовок и первое предложение:</strong> предмет, класс, место и формат: «Репетитор английского — Нариманов и онлайн, 5–11 классы».</li>
  <li><strong>Понятный раздел для каждой основной услуги:</strong> «Подготовка абитуриентов», «Подготовка к выпускному экзамену», «Начальные классы» — словами родителей.</li>
  <li><strong>Одинаковые контакты везде:</strong> имя, телефон и район на сайте, в шапке Instagram и в Google Business Profile должны совпадать.</li>
  <li><strong>Google Business Profile:</strong> если есть место занятий — правильная категория, часы работы, реальные фото и отзывы родителей; вежливо отвечайте на отзывы.</li>
  <li><strong>Отзывы:</strong> просите довольных родителей оставить отзыв в Google — но не предлагайте за это скидки или подарки.</li>
  <li><strong>Скорость на мобильных:</strong> большинство родителей смотрят с телефона; страница должна быстро открываться, а кнопка WhatsApp — быть на виду.</li>
  <li><strong>Полезный контент:</strong> советы по подготовке к экзаменам и ответы на частые вопросы помогают родителям и дают шанс появиться по новым запросам.</li>
</ul>
<p>Если заказываете сайт со своим доменом, техническое SEO (заголовки, schema, скорость) нужно настроить при разработке. Если нужна помощь с SEO: <a href="/seo-uslugi">SEO-услуги</a>.</p>

<h2>Частые ошибки</h2>
<ul>
  <li><strong>Только лозунг, без конкретики</strong> — не указаны предмет, класс, место и формат;</li>
  <li><strong>Нет фото или стоковая картинка</strong>;</li>
  <li><strong>Результаты опубликованы без разрешения</strong> или не скрыты персональные данные;</li>
  <li><strong>Преувеличенные обещания</strong> — вроде «100% гарантия поступления»;</li>
  <li><strong>Сложно связаться</strong> — нет кнопки WhatsApp, телефон спрятан;</li>
  <li><strong>Устаревшая информация</strong> — расписание, цена или адрес не обновлялись годами.</li>
</ul>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Реальное чёткое фото и представление в одно предложение</li>
  <li>☐ Предметы, классы, подготовка к экзаменам и язык обучения указаны конкретно</li>
  <li>☐ Стаж, образование и сертификаты</li>
  <li>☐ Результаты — только с разрешения, персональные данные скрыты</li>
  <li>☐ Недельное расписание, индивидуальный/групповой и очный/онлайн формат</li>
  <li>☐ Цена или пометка «цена по запросу»</li>
  <li>☐ Район, метро или «только онлайн»</li>
  <li>☐ Кнопка WhatsApp с готовым сообщением</li>
  <li>☐ Отзывы родителей — с разрешения</li>
  <li>☐ Google Business Profile, если есть место занятий</li>
  <li>☐ Имя, телефон и район везде одинаковые</li>
  <li>☐ Ссылка на страницу в шапке Instagram и профиле WhatsApp</li>
  <li>☐ Страница быстро открывается на телефоне</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Если у репетитора есть Instagram, нужен ли отдельный сайт?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram хорош для продвижения, но по запросам вроде «репетитор по математике Баку» он редко поднимается в Google высоко, а важная информация теряется среди постов. Простая личная страница с предметами, опытом, расписанием, ценой и контактом в WhatsApp облегчает родителю решение.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит сайт для учителя?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сайт-визитка на заказ в студии стоит в Азербайджане примерно 500–1 200 AZN; домен и хостинг — отдельный ежегодный расход. Учитель, который хочет начать бесплатно, может бесплатно зарегистрироваться в Kursometr и открыть адрес ваше-имя.kursometr.com.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли публиковать результаты ученика на сайте?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Только с разрешения. Прежде чем публиковать имя, фото или баллы ученика, получите согласие ученика, а если он несовершеннолетний — родителя. На фото листа с результатами скройте персональные данные, такие как номер работы и дата рождения.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Может ли учитель, который преподаёт онлайн, открыть Google Business Profile?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google Business Profile предназначен для бизнеса, который встречается с клиентами лично: нужно физическое место занятий или зона обслуживания, где вы приезжаете к ученикам домой. Если вы преподаёте только онлайн, профиль может не подойти; тогда основные каналы — личная страница и соцсети.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что есть в Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В Kursometr учитель за минуту открывает адрес ваше-имя.kursometr.com; предметы, группы, недельное расписание и посещаемость, общие и промежуточные тесты на время с автоматическими результатами, домашние задания, учёт оплат и кабинет родителя — в одном месте. Регистрация бесплатна.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли указывать цену на странице?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Не обязательно. Открытая цена сокращает лишнюю переписку, но если цена зависит от формата и класса, достаточно понятной пометки вроде «цена зависит от формата — индивидуально или в группе, напишите в WhatsApp». Главное, чтобы родитель знал следующий шаг.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-repetitorov-2026">Управление занятиями для репетиторов: от WhatsApp и Excel к платформе</a></li>
  <li><a href="/blog-details/kak-sozdat-google-business-profile-2026">Как создать Google Business Profile</a></li>
  <li><a href="/blog-details/instagram-magazin-ili-sajt-2026">Нужен ли сайт, если вы продаёте в Instagram?</a></li>
  <li><a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта в Азербайджане</a></li>
</ul>

<h2>Итог</h2>
<p>Для учителя личная страница — не реклама, а первая встреча с родителем. Реальное фото, конкретные предметы, опыт, результаты, опубликованные с разрешения, расписание, цена и WhatsApp в одно касание — это всё, что нужно родителю для решения. Пусть Instagram привлекает внимание, Google Business Profile (если есть место занятий) показывает вас на карте, а страница собирает всё вместе. А когда ученики пришли, управление занятиями, тестами, оплатами и общением с родителями из одного места возвращает ваше время преподаванию.</p>
<p><strong>Начните бесплатно: <a href="https://kursometr.com/" target="_blank" rel="noopener">kursometr.com</a></strong> — или <a href="/mehsullar/kursometr">подробнее о Kursometr</a>. Если нужен индивидуальный сайт со своим доменом: <a href="/razrabotka-sajtov">услуга разработки сайтов</a> или <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Цена сайта — ориентировочная для рынка Азербайджана (ноябрь 2026) и зависит от объёма проекта. Правила допуска в Google Business Profile могут меняться Google — проверяйте актуальные правила в официальной справке Google. Самая свежая информация о функциях Kursometr — на kursometr.com.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'muellim-repetitor-ucun-sexsi-sayt-2027'],
            [
                'slug_en' => 'personal-website-for-teachers-tutors-2027',
                'slug_ru' => 'lichnyj-sajt-dlya-uchitelya-repetitora-2027',

                'title_az' => 'Müəllim və Repetitor üçün Şəxsi Sayt 2027: Tələbə Tapmaq, Etibar Qazanmaq və Dərsləri Bir Yerdən İdarə Etmək',
                'title_en' => 'Personal Website for Teachers and Tutors 2027: Find Students, Build Trust and Manage Lessons in One Place',
                'title_ru' => 'Личный сайт для учителя и репетитора 2027: как найти учеников, завоевать доверие и управлять занятиями в одном месте',

                'review_az' => 'Repetitora niyə yalnız Instagram yetmir? Səhifədə nə olmalıdır: foto, fənlər, təcrübə, nəticələr, cədvəl, qiymət, WhatsApp, valideyn rəyləri. Instagram, Google Business Profile, sifarişlə sayt, konstruktor və Kursometr müqayisəsi, yerli SEO və yoxlama siyahısı.',
                'review_en' => 'Why Instagram alone is not enough for a tutor. What the page needs: photo, subjects, experience, results, schedule, price, WhatsApp, parent reviews. Instagram vs Google Business Profile vs a custom site vs builders vs Kursometr, local SEO and a checklist.',
                'review_ru' => 'Почему репетитору мало одного Instagram. Что должно быть на странице: фото, предметы, опыт, результаты, расписание, цена, WhatsApp, отзывы родителей. Instagram, Google Business Profile, сайт на заказ, конструкторы и Kursometr, локальное SEO и чек-лист.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '3 Noyabr 2026',
                'date_en' => 'November 3, 2026',
                'date_ru' => '3 Ноября 2026',

                'photo'    => 'cover-tutor-website-az.png',
                'photo_en' => 'cover-tutor-website-en.png',
                'photo_ru' => 'cover-tutor-website-ru.png',

                'meta_title_az' => 'Müəllim və Repetitor üçün Şəxsi Sayt 2027 | RS Code',
                'meta_title_en' => 'Personal Website for Teachers & Tutors 2027 | RS Code',
                'meta_title_ru' => 'Личный сайт для учителя и репетитора 2027 | RS Code',

                'meta_description_az' => 'Repetitor səhifəsində nə olmalıdır: foto, fənlər, nəticələr, cədvəl, qiymət, WhatsApp, rəylər. Instagram, Google Business Profile, sayt və Kursometr müqayisəsi, yerli SEO.',
                'meta_description_en' => 'What a tutor page needs: photo, subjects, results, schedule, price, WhatsApp, reviews. Instagram vs Google Business Profile vs a website vs Kursometr, plus local SEO.',
                'meta_description_ru' => 'Что нужно на странице репетитора: фото, предметы, результаты, расписание, цена, WhatsApp, отзывы. Instagram, Google Business Profile, сайт или Kursometr, локальное SEO.',

                'meta_keywords_az' => 'repetitor saytı, müəllim üçün sayt, riyaziyyat repetitoru bakı, ingilis dili repetitoru, abituriyent hazırlığı, kursometr, repetitor 2027',
                'meta_keywords_en' => 'tutor website, website for teachers, math tutor baku, english tutor baku, exam preparation azerbaijan, kursometr, 2027',
                'meta_keywords_ru' => 'сайт репетитора, сайт для учителя, репетитор по математике баку, репетитор английского баку, подготовка абитуриентов, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
