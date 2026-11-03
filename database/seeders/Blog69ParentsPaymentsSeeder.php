<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * #69 — Repetitor və kurs mərkəzi valideynlərlə necə işləsin: nəticə hesabatı, davamiyyət, dərs haqqı izləmə (2027).
 * Kursometr faktları yalnız resources/lang/az/products.php-dəndir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət,
 * vaxtlı sınaqlar (ümumi və aralıq) avtomatik nəticə, ev tapşırıqları, ödəniş izləmə, valideyn kabineti, pulsuz qeydiyyat.
 * SMS/avtomatik xatırlatma, onlayn kartla ödəniş, qiymət və rəylər İDDİA EDİLMİR.
 * Fərdi məlumatlar qanunu və vergi barədə yalnız ümumi qeyd — maddə nömrəsi və dərəcə yoxdur.
 * #35 (repetitor-ders-idareetme-proqrami-2026) və #45 (tedris-merkezi-idareetme-proqrami-2026) ilə təkrar etmir, link verir.
 */
class Blog69ParentsPaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Repetitorun işi yalnız yaxşı dərs keçməkdən ibarət deyil. Şagird dərsə gəlir, amma qərarı çox vaxt valideyn verir: dərs haqqını ödəyən, uşağın irəliləyişini soruşan və ya "bəlkə başqa müəllimə keçək" deyən odur. Valideyn nə baş verdiyini görmədikdə, ən güclü müəllim belə şagirdini itirə bilər.</p>
<p>Bu yazıda repetitor və kurs mərkəzinin valideynlərlə işini sistemə salmağı izah edirik: hansı nəticələri və nə qədər tez-tez bildirmək lazımdır, davamiyyət jurnalını necə aparmaq, aylıq dərs haqqını nə vaxt toplamaq və necə nəzakətlə xatırlatmaq, dəftər, Excel və WhatsApp-da hansı problemlərin yarandığını. Sonda hazır mesaj şablonları və bu işi bir yerdə toplamağın yolu var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Valideynə nə bildirilməlidir?</td><td>Davamiyyət, sınaq nəticələri, ev tapşırıqlarının icrası və 2–3 cümləlik qısa müəllim rəyi</td></tr>
    <tr><td>Nə qədər tez-tez?</td><td>Buraxılan dərs və ciddi problem — həmin gün; sınaq nəticəsi — sınaqdan sonra; ümumi hesabat — ayda bir dəfə</td></tr>
    <tr><td>Dərs haqqı nə vaxt alınır?</td><td>Əvvəlcədən razılaşdırılmış sabit tarixdə, əksər hallarda ayın əvvəlində və ya 8 dərslik paketin başında</td></tr>
    <tr><td>Ödənişi necə xatırlatmalı?</td><td>Fərdi mesajla, qısa və nəzakətli, məbləğ və dövr göstərilməklə; ümumi qrup çatında yox</td></tr>
    <tr><td>Nədə aparmaq rahatdır?</td><td>Davamiyyət, nəticə və ödənişin bir yerdə olduğu sistemdə; valideyn isə öz kabinetindən baxır — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Valideyn Repetitordan Niyə Gedir?</h2>
<p>Valideynlər müəllimi adətən dərsin keyfiyyətinə görə deyil, iki başqa səbəbə görə dəyişir.</p>
<p><strong>Birincisi — irəliləyişi görmürlər.</strong> Valideyn hər ay ödəniş edir, amma "uşaq necə oxuyur?" sualına yalnız "yaxşıdır, çalışır" cavabını alır. Sınaq balları, buraxılan dərslər və yerinə yetirilməyən tapşırıqlar barədə məlumatı yoxdursa, nəticəni yalnız məktəb qiymətindən və ya imtahandan sonra öyrənir. O zaman isə artıq gec olur və günah müəllimdə axtarılır.</p>
<p><strong>İkincisi — ödənişdə qarışıqlıq.</strong> "Bu ayı ödəmişdik", "xəstə olduğu dərslər hesablanmalı deyildi", "qardaşı üçün endirim demişdiniz" — bu cür mübahisələr məbləğ kiçik olsa belə etimadı zədələyir. Müəllim pul istəməkdən utanır, valideyn isə özünü ədalətsiz hesablanmış kimi hiss edir.</p>
<p>Hər iki problemin həlli eynidir: <strong>şəffaflıq</strong>. Valideyn nəyin baş verdiyini və nə üçün ödədiyini aydın görəndə həm müəllimə daha çox güvənir, həm də ödənişi vaxtında edir.</p>

<h2>Valideynə Nə Bildirilməlidir?</h2>
<p>Hesabat uzun və mürəkkəb olmamalıdır. Valideyn üçün dörd göstərici kifayətdir:</p>
<table>
  <thead>
    <tr><th>Göstərici</th><th>Nə yazılır</th><th>Niyə vacibdir</th></tr>
  </thead>
  <tbody>
    <tr><td>Davamiyyət</td><td>Bu ay keçirilən dərslər, iştirak, buraxılan və əvəzi keçilən dərslər</td><td>Nəticəsizliyin ən sadə səbəbi tez-tez buraxılan dərslərdir</td></tr>
    <tr><td>Sınaq nəticələri</td><td>Ümumi və aralıq sınaqların balı, əvvəlki sınaqla müqayisə</td><td>Ən obyektiv irəliləyiş göstəricisidir</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Verilən tapşırıqlardan neçəsi vaxtında və tam edilib</td><td>Evdə çalışmanı valideyn özü izləyə bilər</td></tr>
    <tr><td>Müəllim rəyi</td><td>2–3 cümlə: güclü tərəf, zəif mövzu, növbəti ay üçün məqsəd</td><td>Rəqəmləri izah edir və valideynə konkret tövsiyə verir</td></tr>
  </tbody>
</table>
<p>Rəydə ümumi sözlərdən qaçın. "Yaxşı oxuyur" əvəzinə "kəsrlər mövzusunu mənimsəyib, mətnli məsələlərdə hələ səhv edir, bu ay ona əlavə tapşırıq verəcəyik" yazmaq valideynə həm məlumat, həm də müəllimin şagirdə diqqət yetirdiyinin sübutunu verir.</p>

<h2>Nə Qədər Tez-tez Hesabat Vermək Lazımdır?</h2>
<ul>
  <li><strong>Həmin gün:</strong> şagird dərsə gəlməyibsə və valideyn bundan xəbərsizdirsə, eləcə də ciddi davranış və ya mənimsəmə problemi olduqda.</li>
  <li><strong>Hər sınaqdan sonra:</strong> nəticə və qısa şərh. Sınaq vaxtlı və avtomatik yoxlanırsa, nəticəni gecikdirmədən göstərmək asanlaşır.</li>
  <li><strong>Ayda bir dəfə:</strong> ümumi hesabat — davamiyyət, sınaqlar, tapşırıqlar, rəy və növbəti ayın planı. Bunu ödəniş dövrü ilə eyni vaxta salmaq rahatdır: valideyn əvvəlcə nəticəni görür, sonra ödəniş edir.</li>
  <li><strong>Rübdə və ya yarımildə bir dəfə:</strong> qısa görüş və ya zəng — xüsusən buraxılış və qəbul imtahanına hazırlaşan şagirdlər üçün.</li>
</ul>
<p>Hər gün uzun mesaj yazmaq lazım deyil — bu həm müəllimi yorur, həm də valideyn mesajları oxumamağa başlayır. Ən yaxşı model: məlumat daim əlçatan olsun (valideyn istədiyi vaxt baxa bilsin), müəllim isə yalnız vacib məqamlarda və ayda bir dəfə özü yazsın.</p>

<h2>Davamiyyət Jurnalı: Buraxılan və Əvəz Dərslər</h2>
<p>Davamiyyət jurnalı repetitor üçün yalnız "gəldi-gəlmədi" qeydi deyil, həm də ödəniş hesablamasının əsasıdır. Ona görə əvvəlcədən qaydanı müəyyən edin və valideynə yazılı şəkildə bildirin:</p>
<ul>
  <li>Şagird xəbərdarlıq etmədən dərsə gəlmədikdə dərs keçilmiş sayılırmı?</li>
  <li>Neçə saat əvvəl xəbər verilsə, dərs başqa vaxta keçirilir?</li>
  <li>Müəllimin ləğv etdiyi dərs mütləq əvəz olunurmu, yoxsa növbəti ayın ödənişindən çıxılır?</li>
  <li>Əvəz dərs nə vaxta qədər keçirilməlidir — həmin ay ərzində, yoxsa növbəti ayda da mümkündür?</li>
</ul>
<p>Bu suallara cavab yalnız müəllimin yaddaşında olanda mübahisə qaçılmazdır. Jurnalda hər dərsin statusunu ayrıca qeyd edin: <em>iştirak etdi</em>, <em>xəbərdarlıqla gəlmədi</em>, <em>xəbərdarlıqsız gəlmədi</em>, <em>müəllim ləğv etdi</em>, <em>əvəz dərs</em>. Ay sonunda kimin neçə dərs aldığı və nə qədər ödəməli olduğu bir baxışda görünür.</p>

<h2>Aylıq Dərs Haqqı Dövrü: Nə Vaxt və Necə Toplamalı?</h2>
<p>Ödənişdə əsas qayda — <strong>proqnozlaşdırıla bilənlik</strong>. Valideyn nə vaxt, nə qədər və nə üçün ödəyəcəyini əvvəlcədən bilməlidir. Repetitorlar arasında üç model geniş yayılıb:</p>
<table>
  <thead>
    <tr><th>Model</th><th>Necə işləyir</th><th>Üstünlüyü</th><th>Diqqət</th></tr>
  </thead>
  <tbody>
    <tr><td>Aylıq sabit haqq</td><td>Ayın əvvəlində bütün ay üçün ödəniş</td><td>Sadə, hər ay eyni məbləğ</td><td>Bayram və tətil aylarında dərs sayı dəyişir — qaydanı əvvəlcədən yazın</td></tr>
    <tr><td>Dərs paketi</td><td>Məsələn, 8 dərs əvvəlcədən ödənilir, bitdikdə yeni paket</td><td>Buraxılan dərslərdə ədalətli</td><td>Qalan dərs sayını dəqiq izləmək lazımdır</td></tr>
    <tr><td>Dərsbaşı ödəniş</td><td>Hər dərsdən sonra və ya həftəlik</td><td>Qısamüddətli hazırlıq üçün rahat</td><td>Ən çox xırda borc və unudulmuş məbləğ bu modeldə yaranır</td></tr>
  </tbody>
</table>
<p>Hansı modeli seçsəniz də, bunları ilk dərsdən əvvəl razılaşdırın: ödəniş tarixi (məsələn, ayın 1–5-i), məbləğ, ödəniş üsulu, buraxılan dərslərin qaydası, qardaş-bacı və ya qrup endirimi varsa — şərtləri. Bu qaydaları qısa mətn kimi valideynə göndərin ki, sonradan "belə demişdiniz" mübahisəsi olmasın.</p>
<p>Kurs mərkəzlərində iş bir az mürəkkəbdir: çox qrup, çox müəllim, fərqli tariflər. Burada ödənişin şagird kartında görünməsi və borcu olan şagirdlərin siyahısının bir kliklə çıxması vacibdir. Tədris mərkəzinin ümumi idarəetməsi barədə ayrıca yazımız var: <a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">tədris mərkəzi üçün idarəetmə proqramı</a>.</p>

<h2>Ödənişi Necə Nəzakətlə Xatırlatmalı?</h2>
<p>Bir çox müəllim üçün ən çətin məqam pul barədə danışmaqdır. Bir neçə qayda bunu asanlaşdırır:</p>
<ul>
  <li><strong>Fərdi yazın.</strong> Ödəniş barədə heç vaxt ümumi qrup çatında yazmayın və borcu olanların adını başqalarına göstərməyin.</li>
  <li><strong>Konkret olun.</strong> Dövrü, məbləği və keçirilən dərs sayını göstərin — "pul lazımdır" yox, "noyabr ayı, 8 dərs, ... AZN".</li>
  <li><strong>Əvvəl nəticə, sonra ödəniş.</strong> Aylıq hesabatla birlikdə göndərilən xatırlatma daha təbii qarşılanır.</li>
  <li><strong>Mərhələli gedin.</strong> Ödəniş günündən 1–2 gün əvvəl yumşaq xatırlatma, gecikmədən bir neçə gün sonra ikinci mesaj, yalnız bundan sonra zəng.</li>
  <li><strong>Qeyd edin.</strong> Ödəniş alınan kimi onu jurnalda qeyd edin və valideynə qısa təsdiq göndərin. Bu, "ödəmişdik" mübahisəsinin qarşısını alır.</li>
</ul>

<h2>Dəftər, Excel və WhatsApp: Tipik Problemlər</h2>
<p>Azərbaycanda repetitorların çoxu hələ də dəftər, Excel cədvəli və WhatsApp yazışması ilə işləyir. Başlanğıcda bu kifayət edir, amma şagird sayı artdıqca eyni problemlər təkrarlanır:</p>
<table>
  <thead>
    <tr><th>Problem</th><th>Necə yaranır</th><th>Nəticə</th></tr>
  </thead>
  <tbody>
    <tr><td>İtən qeydlər</td><td>Dəftər itir, Excel faylı telefonda və kompüterdə fərqli versiyada qalır</td><td>Kimin nə qədər ödədiyini dəqiq bilmək olmur</td></tr>
    <tr><td>"Bu ayı ödəmişdik" mübahisəsi</td><td>Nağd və ya köçürmə ilə alınan ödəniş vaxtında qeyd olunmur</td><td>Müəllim də, valideyn də özünü haqlı hesab edir, etimad zədələnir</td></tr>
    <tr><td>Buraxılan və əvəz dərslər</td><td>Ləğv və əvəz dərslər yazışmanın içində itir</td><td>Ay sonunda dərs sayı uyğun gəlmir</td></tr>
    <tr><td>Səpələnmiş nəticələr</td><td>Sınaq balları kağızda, tapşırıqlar fotoda, rəylər səsli mesajda</td><td>Valideynə aylıq hesabat hazırlamaq saatlar aparır</td></tr>
    <tr><td>Məxfilik</td><td>Nəticələr və borclar ümumi qrup çatında paylaşılır</td><td>Valideynlər narazı qalır, fərdi məlumat qorunmur</td></tr>
  </tbody>
</table>
<p>WhatsApp və Excel-in ümumi çatışmazlıqlarını və dərs idarəetmə platformasının imkanlarını <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">repetitorlar üçün dərs idarəetmə proqramı</a> yazımızda ətraflı müqayisə etmişik. Burada diqqət valideyn tərəfindədir: valideyn bu məlumatı necə və nə vaxt görür.</p>

<h2>Hazır Şablonlar</h2>
<p>Aşağıdakı mətnləri öz adınıza və şagirdə uyğunlaşdırıb istifadə edə bilərsiniz. Kvadrat mötərizədəki hissələri dəyişin.</p>
<h3>1. Aylıq nəticə hesabatı</h3>
<blockquote>
<p>Salam, [valideynin adı]. [Şagirdin adı] ilə [ay] ayının qısa hesabatını göndərirəm:</p>
<p>• Dərslər: [12] dərsdən [11]-də iştirak etdi, 1 dərs xəbərdarlıqla buraxıldı və [tarix] əvəz olundu.<br>
• Sınaqlar: aralıq sınaq — [72] bal (keçən ay [64]).<br>
• Ev tapşırıqları: [10] tapşırıqdan [8]-i vaxtında edilib.<br>
• Rəy: [mövzu] yaxşı mənimsənilib, [mövzu] üzərində hələ işləməliyik. Növbəti ay [məqsəd].</p>
<p>Sualınız olarsa, məmnuniyyətlə cavab verərəm.</p>
</blockquote>
<h3>2. Nəzakətli ödəniş xatırlatması</h3>
<blockquote>
<p>Salam, [valideynin adı]. Xatırlatmaq istədim ki, [ay] ayı üzrə dərs haqqı ([dərs sayı] dərs, [məbləğ] AZN) [tarix] tarixinədək ödənilməlidir. Artıq ödəmisinizsə, bu mesajı nəzərə almayın — zəhmət olmasa, bildirin, qeyd edim. Təşəkkür edirəm!</p>
</blockquote>
<h3>3. Ödənişin təsdiqi</h3>
<blockquote>
<p>Salam, [valideynin adı]. [Ay] ayı üzrə [məbləğ] AZN ödəniş alındı və qeyd olundu. Təşəkkür edirəm!</p>
</blockquote>

<h2>Fərdi Məlumatlar: Nəticələri Kimə Göstərmək Olar?</h2>
<p>Şagirdin adı, telefon nömrəsi, valideynin əlaqə məlumatları, sınaq nəticələri və ödəniş tarixçəsi fərdi məlumatlardır. Azərbaycan Respublikasının "Fərdi məlumatlar haqqında" Qanunu belə məlumatların toplanması, saxlanması və ötürülməsi üçün qaydalar müəyyən edir. Praktik baxımdan repetitor və kurs mərkəzi üçün əsas prinsiplər bunlardır:</p>
<ul>
  <li>Yalnız iş üçün lazım olan məlumatı toplayın;</li>
  <li>Şagirdin nəticələrini və ödəniş vəziyyətini yalnız onun öz valideyni ilə paylaşın, ümumi qrupda deyil;</li>
  <li>Reytinq və ya "ən yaxşı nəticələr" paylaşmaq istəyirsinizsə, əvvəlcə valideynin razılığını alın;</li>
  <li>Məlumatı şifrə ilə qorunan yerdə saxlayın, dəftəri və ya faylı kənar şəxslərin əlinə verməyin;</li>
  <li>Şagird ayrıldıqdan sonra məlumatların necə saxlanacağını və ya silinəcəyini müəyyən edin.</li>
</ul>
<p>Konkret hüquqi tələblər üçün qanunun rəsmi mətninə və ya hüquqşünasa müraciət edin.</p>

<h2>Vergi Barədə Qısa Qeyd</h2>
<p>Repetitorluq və kurs fəaliyyətindən əldə olunan gəlir vergiyə cəlb olunan gəlirdir. Qeydiyyat forması, vergi rejimi və hesabat qaydası fəaliyyətin növündən və həcmindən asılıdır. Bu barədə dəqiq və aktual məlumat üçün Dövlət Vergi Xidmətinin rəsmi saytına (taxes.gov.az) və ya mühasibə müraciət edin. Ödənişləri sistemli qeyd etmək isə hansı rejimdə işləməyinizdən asılı olmayaraq gəliri hesablamağı asanlaşdırır.</p>

<h2>Kursometr Bu Problemi Necə Həll Edir?</h2>
<p>RS Code olaraq hazırladığımız <a href="/mehsullar/kursometr">Kursometr</a> platforması repetitorun gündəlik işini və valideynlə ünsiyyəti bir yerdə toplayır:</p>
<table>
  <thead>
    <tr><th>Ehtiyac</th><th>Kursometr-də</th></tr>
  </thead>
  <tbody>
    <tr><td>Öz səhifəniz</td><td>Müəllim bir dəqiqəyə öz ünvanını açır: <em>adiniz.kursometr.com</em></td></tr>
    <tr><td>Davamiyyət jurnalı</td><td>Fənlər, qruplar, həftəlik dərs cədvəli və davamiyyət qeydi</td></tr>
    <tr><td>Sınaq nəticələri</td><td>Ümumi və aralıq vaxtlı sınaqlar, nəticələr avtomatik hesablanır</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Tapşırıqların verilməsi və yoxlanması</td></tr>
    <tr><td>Dərs haqqı</td><td>Tələbə ödənişlərinin izlənməsi — kimin ödədiyi bir yerdə görünür</td></tr>
    <tr><td>Valideyn kabineti</td><td>Valideyn uşağın nəticələrini öz kabinetindən izləyir</td></tr>
  </tbody>
</table>
<p>Valideyn kabineti olanda müəllimə hər sınaqdan sonra nəticəni ayrıca yazmaq lazım gəlmir — valideyn məlumatı istədiyi vaxt özü görür. Müəllim isə aylıq qısa rəyini və ödəniş xatırlatmasını yuxarıdakı şablonlarla göndərir, amma artıq rəqəmləri dəftərdən və yazışmadan axtarmır. Qeydiyyat pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>.</p>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Ödəniş tarixi, məbləğ və ödəniş üsulu yazılı razılaşdırılıb</li>
  <li>☐ Buraxılan və əvəz dərslərin qaydası valideynə göndərilib</li>
  <li>☐ Hər dərsin statusu jurnalda qeyd olunur</li>
  <li>☐ Sınaq nəticələri və ev tapşırıqları bir yerdə saxlanır</li>
  <li>☐ Ayda bir dəfə qısa hesabat göndərilir</li>
  <li>☐ Ödəniş xatırlatması fərdi və nəzakətlidir, ödəniş təsdiqlənir</li>
  <li>☐ Nəticələr və borclar ümumi qrup çatında paylaşılmır</li>
  <li>☐ Gəlirin vergi qaydası rəsmi mənbədən yoxlanılıb</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Repetitor valideynə nə qədər tez-tez hesabat verməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Buraxılan dərs və ciddi problem barədə həmin gün, sınaq nəticəsi barədə sınaqdan sonra, ümumi hesabat isə ayda bir dəfə — davamiyyət, sınaqlar, ev tapşırıqları və qısa rəylə. Valideyn kabineti olduqda nəticələri valideyn istədiyi vaxt özü görə bilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Repetitor dərs haqqını nə vaxt almalıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ən rahatı əvvəlcədən razılaşdırılmış sabit tarixdir — məsələn, ayın əvvəlində aylıq haqq və ya dərs paketinin başında. Ödəniş tarixi, məbləğ, ödəniş üsulu və buraxılan dərslərin qaydası ilk dərsdən əvvəl yazılı razılaşdırılmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ödənişi valideynə necə nəzakətlə xatırlatmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Fərdi mesajla, ümumi qrup çatında yox. Dövrü, dərs sayını, məbləği və son tarixi göstərin, "artıq ödəmisinizsə, nəzərə almayın" cümləsini əlavə edin. Ödəniş alınandan sonra qısa təsdiq göndərmək sonrakı mübahisələrin qarşısını alır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Buraxılan dərslər üçün ödəniş necə hesablanmalıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bunun vahid qaydası yoxdur, əsas odur ki, qayda əvvəlcədən razılaşdırılsın: xəbərdarlıqsız buraxılan dərsin keçilmiş sayılıb-sayılmadığı, neçə saat əvvəl xəbər verilməli olduğu və müəllimin ləğv etdiyi dərsin necə əvəz olunduğu. Hər dərsin statusunu davamiyyət jurnalında qeyd etmək ay sonunda hesablamanı asanlaşdırır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Valideyn kabineti nədir və nə üçün lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Valideyn kabineti valideynin uşağın nəticələrini müəllimdən ayrıca soruşmadan izlədiyi şəxsi səhifədir. Bu, şəffaflığı artırır, müəllimin vaxtına qənaət edir və nəticələrin ümumi qrup çatında paylaşılmasına ehtiyacı aradan qaldırır. Kursometr-də valideyn kabineti var və müəllim qeydiyyatı pulsuzdur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Repetitorun gəliri vergiyə cəlb olunurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli, repetitorluq fəaliyyətindən əldə olunan gəlir vergiyə cəlb olunan gəlirdir. Qeydiyyat forması və vergi rejimi fəaliyyətin növündən və həcmindən asılıdır, ona görə aktual qaydalar üçün Dövlət Vergi Xidmətinin rəsmi məlumatlarına (taxes.gov.az) və ya mühasibə müraciət edin.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">Repetitorlar üçün dərs idarəetmə proqramı</a></li>
  <li><a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">Tədris mərkəzi üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr: müqayisə</a></li>
  <li><a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">Onlayn test necə hazırlanır: vaxtlı sınaq və avtomatik nəticə</a></li>
  <li><a href="/blog-details/muellim-repetitor-ucun-sexsi-sayt-2027">Müəllim və repetitor üçün şəxsi sayt</a></li>
</ul>

<h2>Nəticə</h2>
<p>Valideyn repetitoru dərsə görə seçir, amma şəffaflığa görə saxlayır. Davamiyyəti hər dərs qeyd edin, sınaq nəticələrini və ev tapşırıqlarını bir yerdə toplayın, ayda bir dəfə qısa hesabat göndərin, ödəniş qaydasını əvvəlcədən yazılı razılaşdırın və xatırlatmanı fərdi, nəzakətli edin. Bu işi dəftər və yazışma əvəzinə bir sistemdə aparanda həm vaxta qənaət edirsiniz, həm də "ödəmişdik" mübahisələri azalır.</p>
<p><strong>Öz səhifənizi açın və valideyn kabinetini sınayın: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — qeydiyyat pulsuzdur. Ətraflı: <a href="/mehsullar/kursometr">Kursometr haqqında</a>. Kurs mərkəziniz üçün fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakterlidir və hüquqi və ya vergi məsləhəti deyil. Fərdi məlumatların qorunması və vergi qaydaları ilə bağlı konkret tələblər üçün qanunvericiliyin rəsmi mətninə, Dövlət Vergi Xidmətinə və ya mütəxəssisə müraciət edin.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>A tutor's job is not only to teach a good lesson. The student comes to class, but the decision is usually made by the parent: the one who pays the fee, asks about progress or says "maybe we should switch teachers". When parents cannot see what is happening, even the strongest teacher can lose a student.</p>
<p>This article explains how a tutor or course centre can put its work with parents into a system: which results to report and how often, how to keep an attendance register, when to collect the monthly lesson fee and how to remind politely, and what problems arise with a notebook, Excel and WhatsApp. At the end you will find ready-made message templates and a way to keep all of this in one place.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What should parents be told?</td><td>Attendance, test results, homework completion and a short 2–3 sentence teacher comment</td></tr>
    <tr><td>How often?</td><td>A missed lesson or serious problem — the same day; a test result — after the test; an overall report — once a month</td></tr>
    <tr><td>When is the fee collected?</td><td>On a fixed date agreed in advance, in most cases at the start of the month or of an 8-lesson package</td></tr>
    <tr><td>How to remind about payment?</td><td>In a personal message, short and polite, stating the amount and period; not in a group chat</td></tr>
    <tr><td>Where is it easiest to keep track?</td><td>In a system where attendance, results and payments are in one place and parents check their own portal — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Why Do Parents Leave a Tutor?</h2>
<p>Parents usually change teachers not because of lesson quality but for two other reasons.</p>
<p><strong>First, they do not see progress.</strong> The parent pays every month, but the question "how is my child doing?" only gets the answer "fine, trying hard". Without information about test scores, missed lessons and unfinished homework, they learn the outcome only from school marks or after an exam. By then it is too late, and the teacher gets the blame.</p>
<p><strong>Second, confusion about payments.</strong> "We already paid for this month", "the lessons missed through illness shouldn't count", "you said there was a sibling discount" — disputes like these damage trust even when the amount is small. The teacher is embarrassed to ask for money, and the parent feels unfairly charged.</p>
<p>The solution to both problems is the same: <strong>transparency</strong>. When parents clearly see what is happening and what they are paying for, they trust the teacher more and pay on time.</p>

<h2>What Should Parents Be Told?</h2>
<p>A report should not be long or complicated. Four indicators are enough for a parent:</p>
<table>
  <thead>
    <tr><th>Indicator</th><th>What to include</th><th>Why it matters</th></tr>
  </thead>
  <tbody>
    <tr><td>Attendance</td><td>Lessons held this month, attendance, missed and made-up lessons</td><td>Frequent absences are the simplest reason for poor results</td></tr>
    <tr><td>Test results</td><td>Scores of general and interim tests, comparison with the previous test</td><td>The most objective indicator of progress</td></tr>
    <tr><td>Homework</td><td>How many of the assignments were done on time and in full</td><td>Parents can follow work at home themselves</td></tr>
    <tr><td>Teacher's comment</td><td>2–3 sentences: a strength, a weak topic, a goal for next month</td><td>Explains the numbers and gives the parent a concrete recommendation</td></tr>
  </tbody>
</table>
<p>Avoid generic words in the comment. Instead of "doing well", write "has mastered fractions, still makes mistakes in word problems, this month we will give extra practice". This gives the parent both information and proof that the teacher is paying attention to the student.</p>

<h2>How Often Should You Report?</h2>
<ul>
  <li><strong>The same day:</strong> if the student missed a lesson and the parent may not know, or if there is a serious behaviour or learning issue.</li>
  <li><strong>After every test:</strong> the result and a short comment. If the test is timed and marked automatically, sharing the result without delay becomes easy.</li>
  <li><strong>Once a month:</strong> an overall report — attendance, tests, homework, a comment and next month's plan. It is convenient to align it with the payment cycle: the parent sees the results first and then pays.</li>
  <li><strong>Once a term or half-year:</strong> a short meeting or call — especially for students preparing for school-leaving and university entrance exams.</li>
</ul>
<p>There is no need to write long messages every day — it tires the teacher, and parents stop reading. The best model: the information is always available (parents can look whenever they want), and the teacher writes personally only at important moments and once a month.</p>

<h2>Attendance Register: Missed and Make-up Lessons</h2>
<p>For a tutor, the attendance register is not just a "came / didn't come" record but also the basis for calculating payment. So define the rules in advance and send them to parents in writing:</p>
<ul>
  <li>Does a lesson missed without notice count as held?</li>
  <li>How many hours' notice is needed to move a lesson to another time?</li>
  <li>Is a lesson cancelled by the teacher always made up, or deducted from next month's fee?</li>
  <li>By when must a make-up lesson take place — within the same month, or can it be next month?</li>
</ul>
<p>When the answers exist only in the teacher's memory, disputes are inevitable. Record each lesson's status separately in the register: <em>attended</em>, <em>absent with notice</em>, <em>absent without notice</em>, <em>cancelled by teacher</em>, <em>make-up lesson</em>. At the end of the month you can see at a glance how many lessons each student had and how much they owe.</p>

<h2>The Monthly Fee Cycle: When and How to Collect</h2>
<p>The main rule for payments is <strong>predictability</strong>. Parents should know in advance when, how much and what for they will pay. Three models are common among tutors:</p>
<table>
  <thead>
    <tr><th>Model</th><th>How it works</th><th>Advantage</th><th>Watch out for</th></tr>
  </thead>
  <tbody>
    <tr><td>Fixed monthly fee</td><td>Payment for the whole month at the start of the month</td><td>Simple, the same amount every month</td><td>The number of lessons changes in holiday months — put the rule in writing in advance</td></tr>
    <tr><td>Lesson package</td><td>For example, 8 lessons paid in advance, then a new package</td><td>Fair when lessons are missed</td><td>You need to track the remaining lessons precisely</td></tr>
    <tr><td>Pay per lesson</td><td>After each lesson or weekly</td><td>Convenient for short-term preparation</td><td>Most small debts and forgotten amounts arise in this model</td></tr>
  </tbody>
</table>
<p>Whichever model you choose, agree on these before the first lesson: the payment date (for example, the 1st–5th of the month), the amount, the payment method, the rule for missed lessons, and the terms of any sibling or group discount. Send these rules to the parent as a short text so that there is no "but you said" dispute later.</p>
<p>In course centres things are a little more complex: many groups, many teachers, different rates. Here it is important that payments show on the student's card and that the list of students with outstanding fees can be pulled up in one click. We have a separate article on overall management of a training centre: <a href="/blog-details/training-centre-management-software-2026">training centre management software</a>.</p>

<h2>How to Remind About Payment Politely</h2>
<p>For many teachers, talking about money is the hardest part. A few rules make it easier:</p>
<ul>
  <li><strong>Write personally.</strong> Never write about payments in a group chat, and never show others the names of those who owe.</li>
  <li><strong>Be specific.</strong> State the period, the amount and the number of lessons held — not "I need the money" but "November, 8 lessons, ... AZN".</li>
  <li><strong>Results first, then payment.</strong> A reminder sent together with the monthly report is received more naturally.</li>
  <li><strong>Go step by step.</strong> A gentle reminder 1–2 days before the due date, a second message a few days after a delay, and only then a call.</li>
  <li><strong>Record it.</strong> As soon as a payment is received, record it in the register and send the parent a short confirmation. This prevents the "we already paid" dispute.</li>
</ul>

<h2>Notebook, Excel and WhatsApp: Typical Problems</h2>
<p>Many tutors in Azerbaijan still work with a notebook, an Excel sheet and WhatsApp chats. At first this is enough, but as the number of students grows the same problems repeat:</p>
<table>
  <thead>
    <tr><th>Problem</th><th>How it arises</th><th>Result</th></tr>
  </thead>
  <tbody>
    <tr><td>Lost records</td><td>The notebook gets lost, the Excel file has different versions on the phone and the computer</td><td>You cannot tell exactly who paid how much</td></tr>
    <tr><td>"We paid for this month" disputes</td><td>Cash or transfer payments are not recorded on time</td><td>Both teacher and parent believe they are right, and trust suffers</td></tr>
    <tr><td>Missed and make-up lessons</td><td>Cancellations and make-ups get lost in the chat</td><td>At the end of the month the lesson count does not add up</td></tr>
    <tr><td>Scattered results</td><td>Test scores on paper, homework in photos, comments in voice messages</td><td>Preparing a monthly report for parents takes hours</td></tr>
    <tr><td>Privacy</td><td>Results and debts are shared in a group chat</td><td>Parents are unhappy and personal data is not protected</td></tr>
  </tbody>
</table>
<p>We compared the general weaknesses of WhatsApp and Excel and the capabilities of a class management platform in detail in our article <a href="/blog-details/tutor-class-management-software-2026">class management software for tutors</a>. Here the focus is on the parent's side: how and when parents see this information.</p>

<h2>Ready-made Templates</h2>
<p>You can adapt the texts below to your name and the student. Replace the parts in square brackets.</p>
<h3>1. Monthly progress report</h3>
<blockquote>
<p>Hello, [parent's name]. Here is a short report on [student's name]'s lessons for [month]:</p>
<p>• Lessons: attended [11] of [12] lessons; 1 lesson was missed with notice and made up on [date].<br>
• Tests: interim test — [72] points (last month [64]).<br>
• Homework: [8] of [10] assignments done on time.<br>
• Comment: [topic] is well understood; we still need to work on [topic]. Next month: [goal].</p>
<p>If you have any questions, I will be happy to answer.</p>
</blockquote>
<h3>2. Polite payment reminder</h3>
<blockquote>
<p>Hello, [parent's name]. Just a reminder that the lesson fee for [month] ([number of lessons] lessons, [amount] AZN) is due by [date]. If you have already paid, please ignore this message — just let me know so I can record it. Thank you!</p>
</blockquote>
<h3>3. Payment confirmation</h3>
<blockquote>
<p>Hello, [parent's name]. The payment of [amount] AZN for [month] has been received and recorded. Thank you!</p>
</blockquote>

<h2>Personal Data: Who Can See the Results?</h2>
<p>A student's name, phone number, the parent's contact details, test results and payment history are personal data. The Law of the Republic of Azerbaijan "On Personal Data" sets rules for collecting, storing and transferring such data. In practice, the key principles for a tutor or course centre are:</p>
<ul>
  <li>Collect only the data you need for the work;</li>
  <li>Share a student's results and payment status only with their own parent, not in a group;</li>
  <li>If you want to share a ranking or "top results", get the parents' consent first;</li>
  <li>Keep data in a password-protected place and do not hand the notebook or file to outsiders;</li>
  <li>Decide how data will be kept or deleted after a student leaves.</li>
</ul>
<p>For specific legal requirements, refer to the official text of the law or consult a lawyer.</p>

<h2>A Short Note on Tax</h2>
<p>Income from tutoring and running courses is taxable. The form of registration, tax regime and reporting rules depend on the type and scale of the activity. For accurate and up-to-date information, check the official website of the State Tax Service (taxes.gov.az) or consult an accountant. Recording payments systematically makes it easier to calculate your income whichever regime you use.</p>

<h2>How Kursometr Solves This</h2>
<p>The <a href="/mehsullar/kursometr">Kursometr</a> platform we built at RS Code brings a tutor's daily work and communication with parents into one place:</p>
<table>
  <thead>
    <tr><th>Need</th><th>In Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Your own page</td><td>A teacher opens their own address in a minute: <em>yourname.kursometr.com</em></td></tr>
    <tr><td>Attendance register</td><td>Subjects, groups, a weekly schedule and attendance records</td></tr>
    <tr><td>Test results</td><td>General and interim timed tests, with results calculated automatically</td></tr>
    <tr><td>Homework</td><td>Assigning and checking homework</td></tr>
    <tr><td>Lesson fees</td><td>Student payment tracking — who has paid is visible in one place</td></tr>
    <tr><td>Parent portal</td><td>Parents follow their child's results from their own portal</td></tr>
  </tbody>
</table>
<p>With a parent portal the teacher does not need to message each result after every test — parents see the information themselves whenever they want. The teacher still sends a short monthly comment and payment reminder using the templates above, but no longer has to hunt for numbers in a notebook and chats. Sign-up is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>.</p>

<h2>Checklist</h2>
<ul>
  <li>☐ Payment date, amount and method agreed in writing</li>
  <li>☐ Rules for missed and make-up lessons sent to parents</li>
  <li>☐ Each lesson's status recorded in the register</li>
  <li>☐ Test results and homework kept in one place</li>
  <li>☐ A short report sent once a month</li>
  <li>☐ Payment reminders are personal and polite, and payments are confirmed</li>
  <li>☐ Results and debts are not shared in group chats</li>
  <li>☐ Tax rules for the income checked with an official source</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How often should a tutor report to parents?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">About a missed lesson or serious problem — the same day; about a test result — after the test; and an overall report once a month, with attendance, tests, homework and a short comment. With a parent portal, parents can see results themselves whenever they want.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">When should a tutor collect the lesson fee?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The most convenient option is a fixed date agreed in advance — for example, a monthly fee at the start of the month or at the start of a lesson package. The payment date, amount, method and the rule for missed lessons should be agreed in writing before the first lesson.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can I politely remind parents about payment?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In a personal message, not in a group chat. State the period, number of lessons, amount and due date, and add "if you have already paid, please ignore this". Sending a short confirmation once payment is received prevents later disputes.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How should missed lessons be charged?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">There is no single rule; what matters is agreeing it in advance: whether a lesson missed without notice counts as held, how many hours' notice is required, and how a lesson cancelled by the teacher is made up. Recording each lesson's status in the attendance register makes the end-of-month calculation easy.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is a parent portal and why is it needed?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A parent portal is a personal page where parents follow their child's results without having to ask the teacher separately. It increases transparency, saves the teacher time and removes the need to share results in group chats. Kursometr has a parent portal, and teacher sign-up is free.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is a tutor's income taxable?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes, income from tutoring is taxable. The form of registration and tax regime depend on the type and scale of the activity, so for current rules check the official information of the State Tax Service (taxes.gov.az) or consult an accountant.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/tutor-class-management-software-2026">Class management software for tutors</a></li>
  <li><a href="/blog-details/training-centre-management-software-2026">Training centre management software</a></li>
  <li><a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr: comparison</a></li>
  <li><a href="/blog-details/how-to-create-online-tests-for-teachers-2027">How to create online tests: timed mock exams and automatic results</a></li>
  <li><a href="/blog-details/personal-website-for-teachers-tutors-2027">Personal website for teachers and tutors</a></li>
</ul>

<h2>Conclusion</h2>
<p>Parents choose a tutor for the lessons but stay because of transparency. Record attendance at every lesson, keep test results and homework in one place, send a short report once a month, agree payment rules in writing in advance and make reminders personal and polite. When you keep this in one system instead of a notebook and chats, you save time and the "we already paid" disputes become rare.</p>
<p><strong>Open your own page and try the parent portal: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — sign-up is free. More details: <a href="/mehsullar/kursometr">about Kursometr</a>. If your course centre needs a custom system, <a href="/contact">contact us</a>.</p>
<p><small><em>This article is for general information only and is not legal or tax advice. For specific requirements on personal data protection and tax rules, refer to the official text of the legislation, the State Tax Service or a specialist.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Работа репетитора — это не только хорошо провести урок. На занятия ходит ученик, но решение обычно принимает родитель: именно он платит, спрашивает об успехах или говорит «может, перейдём к другому преподавателю». Если родитель не видит, что происходит, даже сильный преподаватель может потерять ученика.</p>
<p>В этой статье разбираем, как репетитору и учебному курсу выстроить работу с родителями: какие результаты и как часто сообщать, как вести журнал посещаемости, когда собирать ежемесячную оплату и как вежливо о ней напоминать, какие проблемы возникают с тетрадью, Excel и WhatsApp. В конце — готовые шаблоны сообщений и способ собрать всё это в одном месте.</p>

<h2>Короткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Что сообщать родителям?</td><td>Посещаемость, результаты тестов, выполнение домашних заданий и короткий комментарий преподавателя в 2–3 предложения</td></tr>
    <tr><td>Как часто?</td><td>Пропуск или серьёзная проблема — в тот же день; результат теста — после теста; общий отчёт — раз в месяц</td></tr>
    <tr><td>Когда брать оплату?</td><td>В заранее согласованную фиксированную дату, чаще всего в начале месяца или в начале пакета из 8 занятий</td></tr>
    <tr><td>Как напоминать об оплате?</td><td>Личным сообщением, коротко и вежливо, с суммой и периодом; не в общем чате группы</td></tr>
    <tr><td>Где удобнее вести учёт?</td><td>В системе, где посещаемость, результаты и оплаты собраны в одном месте, а родитель смотрит свой кабинет — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Почему родители уходят от репетитора?</h2>
<p>Родители обычно меняют преподавателя не из-за качества уроков, а по двум другим причинам.</p>
<p><strong>Первая — они не видят прогресса.</strong> Родитель платит каждый месяц, но на вопрос «как учится ребёнок?» слышит только «нормально, старается». Без информации о баллах за тесты, пропусках и невыполненных заданиях он узнаёт результат лишь по школьным оценкам или после экзамена. Тогда уже поздно, и виноватым оказывается преподаватель.</p>
<p><strong>Вторая — путаница с оплатой.</strong> «Мы же оплатили этот месяц», «пропуски по болезни не должны считаться», «вы говорили о скидке для брата» — такие споры подрывают доверие, даже если сумма небольшая. Преподавателю неловко просить деньги, а родитель чувствует, что ему насчитали несправедливо.</p>
<p>Решение у обеих проблем одно: <strong>прозрачность</strong>. Когда родитель ясно видит, что происходит и за что он платит, он больше доверяет преподавателю и платит вовремя.</p>

<h2>Что сообщать родителям?</h2>
<p>Отчёт не должен быть длинным и сложным. Родителю достаточно четырёх показателей:</p>
<table>
  <thead>
    <tr><th>Показатель</th><th>Что писать</th><th>Почему это важно</th></tr>
  </thead>
  <tbody>
    <tr><td>Посещаемость</td><td>Сколько занятий прошло за месяц, посещения, пропуски и отработки</td><td>Частые пропуски — самая простая причина слабых результатов</td></tr>
    <tr><td>Результаты тестов</td><td>Баллы общих и промежуточных тестов, сравнение с прошлым тестом</td><td>Самый объективный показатель прогресса</td></tr>
    <tr><td>Домашние задания</td><td>Сколько заданий выполнено вовремя и полностью</td><td>Родитель сам может следить за работой дома</td></tr>
    <tr><td>Комментарий преподавателя</td><td>2–3 предложения: сильная сторона, слабая тема, цель на следующий месяц</td><td>Объясняет цифры и даёт родителю конкретную рекомендацию</td></tr>
  </tbody>
</table>
<p>Избегайте общих слов в комментарии. Вместо «хорошо учится» напишите «освоил дроби, в текстовых задачах пока ошибается, в этом месяце дадим дополнительные задания». Так родитель получает и информацию, и доказательство того, что преподаватель внимателен к ученику.</p>

<h2>Как часто отчитываться?</h2>
<ul>
  <li><strong>В тот же день:</strong> если ученик пропустил занятие, а родитель может об этом не знать, или если возникла серьёзная проблема с поведением или усвоением материала.</li>
  <li><strong>После каждого теста:</strong> результат и короткий комментарий. Если тест на время и проверяется автоматически, показать результат без задержки становится просто.</li>
  <li><strong>Раз в месяц:</strong> общий отчёт — посещаемость, тесты, задания, комментарий и план на следующий месяц. Его удобно совместить с циклом оплаты: родитель сначала видит результат, потом платит.</li>
  <li><strong>Раз в четверть или полугодие:</strong> короткая встреча или звонок — особенно для учеников, готовящихся к выпускным и вступительным экзаменам.</li>
</ul>
<p>Писать длинные сообщения каждый день не нужно — это утомляет преподавателя, а родители перестают читать. Лучшая модель: информация всегда доступна (родитель может посмотреть, когда захочет), а преподаватель пишет сам только в важные моменты и раз в месяц.</p>

<h2>Журнал посещаемости: пропуски и отработки</h2>
<p>Для репетитора журнал посещаемости — это не просто отметка «пришёл / не пришёл», а основа для расчёта оплаты. Поэтому определите правила заранее и отправьте их родителям письменно:</p>
<ul>
  <li>Считается ли занятие, пропущенное без предупреждения, проведённым?</li>
  <li>За сколько часов нужно предупредить, чтобы занятие перенесли?</li>
  <li>Занятие, отменённое преподавателем, обязательно отрабатывается или вычитается из оплаты следующего месяца?</li>
  <li>До какого срока проводится отработка — в том же месяце или можно в следующем?</li>
</ul>
<p>Когда ответы есть только в памяти преподавателя, споры неизбежны. Отмечайте в журнале статус каждого занятия отдельно: <em>присутствовал</em>, <em>отсутствовал с предупреждением</em>, <em>отсутствовал без предупреждения</em>, <em>отменено преподавателем</em>, <em>отработка</em>. В конце месяца сразу видно, сколько занятий получил каждый ученик и сколько он должен.</p>

<h2>Ежемесячный цикл оплаты: когда и как собирать</h2>
<p>Главное правило в оплате — <strong>предсказуемость</strong>. Родитель должен заранее знать, когда, сколько и за что он платит. Среди репетиторов распространены три модели:</p>
<table>
  <thead>
    <tr><th>Модель</th><th>Как работает</th><th>Плюс</th><th>На что обратить внимание</th></tr>
  </thead>
  <tbody>
    <tr><td>Фиксированная плата за месяц</td><td>Оплата за весь месяц в его начале</td><td>Просто, каждый месяц одна и та же сумма</td><td>В праздничные и каникулярные месяцы число занятий меняется — пропишите правило заранее</td></tr>
    <tr><td>Пакет занятий</td><td>Например, 8 занятий оплачиваются заранее, по окончании — новый пакет</td><td>Справедливо при пропусках</td><td>Нужно точно отслеживать, сколько занятий осталось</td></tr>
    <tr><td>Оплата за занятие</td><td>После каждого занятия или раз в неделю</td><td>Удобно для краткосрочной подготовки</td><td>Именно в этой модели чаще всего появляются мелкие долги и забытые суммы</td></tr>
  </tbody>
</table>
<p>Какую бы модель вы ни выбрали, до первого занятия согласуйте: дату оплаты (например, 1–5 число месяца), сумму, способ оплаты, правило для пропусков и условия скидки для братьев и сестёр или группы, если она есть. Отправьте эти правила родителю коротким текстом, чтобы потом не было спора «вы же говорили».</p>
<p>В учебных центрах всё немного сложнее: много групп, много преподавателей, разные тарифы. Здесь важно, чтобы оплата была видна в карточке ученика, а список должников можно было получить в один клик. Об общем управлении учебным центром у нас есть отдельная статья: <a href="/blog-details/programma-dlya-uchebnogo-centra-2026">программа для учебного центра</a>.</p>

<h2>Как вежливо напомнить об оплате</h2>
<p>Для многих преподавателей разговор о деньгах — самая трудная часть. Несколько правил упрощают его:</p>
<ul>
  <li><strong>Пишите лично.</strong> Никогда не пишите об оплате в общем чате и не показывайте другим имена тех, кто должен.</li>
  <li><strong>Будьте конкретны.</strong> Укажите период, сумму и число проведённых занятий — не «нужны деньги», а «ноябрь, 8 занятий, ... AZN».</li>
  <li><strong>Сначала результат, потом оплата.</strong> Напоминание вместе с ежемесячным отчётом воспринимается естественнее.</li>
  <li><strong>Действуйте поэтапно.</strong> Мягкое напоминание за 1–2 дня до срока, второе сообщение через несколько дней после задержки и только потом звонок.</li>
  <li><strong>Фиксируйте.</strong> Как только оплата получена, отметьте её в журнале и отправьте родителю короткое подтверждение. Это предотвращает спор «мы же платили».</li>
</ul>

<h2>Тетрадь, Excel и WhatsApp: типичные проблемы</h2>
<p>Многие репетиторы в Азербайджане до сих пор работают с тетрадью, таблицей Excel и перепиской в WhatsApp. Сначала этого хватает, но с ростом числа учеников повторяются одни и те же проблемы:</p>
<table>
  <thead>
    <tr><th>Проблема</th><th>Как возникает</th><th>Последствие</th></tr>
  </thead>
  <tbody>
    <tr><td>Потерянные записи</td><td>Тетрадь теряется, файл Excel хранится в разных версиях на телефоне и компьютере</td><td>Невозможно точно сказать, кто сколько заплатил</td></tr>
    <tr><td>Спор «мы оплатили этот месяц»</td><td>Наличные или переводы не фиксируются вовремя</td><td>И преподаватель, и родитель считают себя правыми, доверие страдает</td></tr>
    <tr><td>Пропуски и отработки</td><td>Отмены и отработки теряются в переписке</td><td>В конце месяца число занятий не сходится</td></tr>
    <tr><td>Разрозненные результаты</td><td>Баллы на бумаге, задания на фото, комментарии в голосовых сообщениях</td><td>Подготовка ежемесячного отчёта для родителей занимает часы</td></tr>
    <tr><td>Конфиденциальность</td><td>Результаты и долги публикуются в общем чате группы</td><td>Родители недовольны, персональные данные не защищены</td></tr>
  </tbody>
</table>
<p>Общие недостатки WhatsApp и Excel и возможности платформы для управления занятиями мы подробно сравнили в статье <a href="/blog-details/programma-dlya-repetitorov-2026">программа для репетиторов</a>. Здесь в центре внимания сторона родителя: как и когда он видит эту информацию.</p>

<h2>Готовые шаблоны</h2>
<p>Тексты ниже можно адаптировать под себя и ученика. Замените части в квадратных скобках.</p>
<h3>1. Ежемесячный отчёт об успеваемости</h3>
<blockquote>
<p>Здравствуйте, [имя родителя]. Отправляю короткий отчёт о занятиях [имя ученика] за [месяц]:</p>
<p>• Занятия: посетил(а) [11] из [12] занятий, 1 занятие пропущено с предупреждением и отработано [дата].<br>
• Тесты: промежуточный тест — [72] балла (в прошлом месяце [64]).<br>
• Домашние задания: [8] из [10] выполнены вовремя.<br>
• Комментарий: тема [тема] усвоена хорошо, над темой [тема] ещё нужно поработать. В следующем месяце: [цель].</p>
<p>Если будут вопросы, с удовольствием отвечу.</p>
</blockquote>
<h3>2. Вежливое напоминание об оплате</h3>
<blockquote>
<p>Здравствуйте, [имя родителя]. Хочу напомнить, что оплату за [месяц] ([число занятий] занятий, [сумма] AZN) нужно внести до [дата]. Если вы уже оплатили, не обращайте внимания на это сообщение — пожалуйста, просто сообщите, чтобы я отметил(а). Спасибо!</p>
</blockquote>
<h3>3. Подтверждение оплаты</h3>
<blockquote>
<p>Здравствуйте, [имя родителя]. Оплата [сумма] AZN за [месяц] получена и отмечена. Спасибо!</p>
</blockquote>

<h2>Персональные данные: кому можно показывать результаты?</h2>
<p>Имя ученика, номер телефона, контакты родителя, результаты тестов и история оплат — это персональные данные. Закон Азербайджанской Республики «О персональных данных» устанавливает правила их сбора, хранения и передачи. На практике для репетитора и учебного курса главные принципы такие:</p>
<ul>
  <li>Собирайте только те данные, которые нужны для работы;</li>
  <li>Делитесь результатами и статусом оплаты ученика только с его родителем, а не в общей группе;</li>
  <li>Если хотите публиковать рейтинг или «лучшие результаты», сначала получите согласие родителей;</li>
  <li>Храните данные в защищённом паролем месте и не передавайте тетрадь или файл посторонним;</li>
  <li>Определите, как данные будут храниться или удаляться после ухода ученика.</li>
</ul>
<p>За конкретными юридическими требованиями обращайтесь к официальному тексту закона или к юристу.</p>

<h2>Коротко о налогах</h2>
<p>Доход от репетиторства и курсов облагается налогом. Форма регистрации, налоговый режим и порядок отчётности зависят от вида и масштаба деятельности. Точную и актуальную информацию уточняйте на официальном сайте Государственной налоговой службы (taxes.gov.az) или у бухгалтера. Систематический учёт оплат упрощает расчёт дохода при любом режиме.</p>

<h2>Как Kursometr решает эту задачу</h2>
<p>Платформа <a href="/mehsullar/kursometr">Kursometr</a>, которую мы создали в RS Code, собирает повседневную работу репетитора и общение с родителями в одном месте:</p>
<table>
  <thead>
    <tr><th>Задача</th><th>В Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Своя страница</td><td>Преподаватель за минуту открывает свой адрес: <em>vashe-imya.kursometr.com</em></td></tr>
    <tr><td>Журнал посещаемости</td><td>Предметы, группы, недельное расписание и отметки посещаемости</td></tr>
    <tr><td>Результаты тестов</td><td>Общие и промежуточные тесты на время, результаты подсчитываются автоматически</td></tr>
    <tr><td>Домашние задания</td><td>Выдача и проверка домашних заданий</td></tr>
    <tr><td>Оплата занятий</td><td>Учёт оплат учеников — кто заплатил, видно в одном месте</td></tr>
    <tr><td>Кабинет родителя</td><td>Родитель следит за результатами ребёнка в своём кабинете</td></tr>
  </tbody>
</table>
<p>С кабинетом родителя преподавателю не нужно отдельно писать результат после каждого теста — родитель сам видит информацию, когда захочет. Преподаватель по-прежнему отправляет короткий ежемесячный комментарий и напоминание об оплате по шаблонам выше, но уже не ищет цифры в тетради и переписке. Регистрация бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>.</p>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Дата, сумма и способ оплаты согласованы письменно</li>
  <li>☐ Правила пропусков и отработок отправлены родителям</li>
  <li>☐ Статус каждого занятия отмечается в журнале</li>
  <li>☐ Результаты тестов и домашние задания хранятся в одном месте</li>
  <li>☐ Раз в месяц отправляется короткий отчёт</li>
  <li>☐ Напоминания об оплате личные и вежливые, оплата подтверждается</li>
  <li>☐ Результаты и долги не публикуются в общих чатах</li>
  <li>☐ Налоговые правила для дохода проверены по официальному источнику</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как часто репетитор должен отчитываться перед родителями?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">О пропуске или серьёзной проблеме — в тот же день, о результате теста — после теста, а общий отчёт — раз в месяц: посещаемость, тесты, домашние задания и короткий комментарий. С кабинетом родителя результаты можно смотреть самостоятельно в любое время.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда репетитору брать оплату за занятия?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Удобнее всего в заранее согласованную фиксированную дату — например, плата за месяц в его начале или в начале пакета занятий. Дату, сумму, способ оплаты и правило для пропусков стоит согласовать письменно до первого занятия.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как вежливо напомнить родителям об оплате?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Личным сообщением, а не в общем чате. Укажите период, число занятий, сумму и срок, добавьте фразу «если вы уже оплатили, не обращайте внимания». Короткое подтверждение после получения оплаты предотвращает будущие споры.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как считать оплату за пропущенные занятия?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Единого правила нет, главное — договориться заранее: считается ли проведённым занятие, пропущенное без предупреждения, за сколько часов нужно предупреждать и как отрабатывается занятие, отменённое преподавателем. Отметка статуса каждого занятия в журнале посещаемости упрощает расчёт в конце месяца.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое кабинет родителя и зачем он нужен?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Кабинет родителя — это личная страница, где родитель следит за результатами ребёнка, не спрашивая преподавателя отдельно. Это повышает прозрачность, экономит время преподавателя и избавляет от необходимости публиковать результаты в общих чатах. В Kursometr есть кабинет родителя, а регистрация преподавателя бесплатна.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Облагается ли доход репетитора налогом?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да, доход от репетиторства облагается налогом. Форма регистрации и налоговый режим зависят от вида и масштаба деятельности, поэтому актуальные правила уточняйте в официальной информации Государственной налоговой службы (taxes.gov.az) или у бухгалтера.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-repetitorov-2026">Программа для репетиторов</a></li>
  <li><a href="/blog-details/programma-dlya-uchebnogo-centra-2026">Программа для учебного центра</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr: сравнение</a></li>
  <li><a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">Как создать онлайн-тест: пробный экзамен с таймером и автопроверкой</a></li>
  <li><a href="/blog-details/lichnyj-sajt-dlya-uchitelya-repetitora-2027">Личный сайт для учителя и репетитора</a></li>
</ul>

<h2>Итог</h2>
<p>Родители выбирают репетитора за уроки, а остаются благодаря прозрачности. Отмечайте посещаемость на каждом занятии, храните результаты тестов и домашние задания в одном месте, раз в месяц отправляйте короткий отчёт, заранее письменно согласуйте правила оплаты и делайте напоминания личными и вежливыми. Когда всё это ведётся в одной системе, а не в тетради и переписке, вы экономите время, а споры «мы же платили» становятся редкостью.</p>
<p><strong>Откройте свою страницу и попробуйте кабинет родителя: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — регистрация бесплатна. Подробнее: <a href="/mehsullar/kursometr">о Kursometr</a>. Если вашему учебному центру нужна индивидуальная система, <a href="/kontakty">свяжитесь с нами</a>.</p>
<p><small><em>Статья носит общий информационный характер и не является юридической или налоговой консультацией. Конкретные требования к защите персональных данных и налоговым правилам уточняйте в официальном тексте законодательства, в Государственной налоговой службе или у специалиста.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'repetitor-valideyn-hesabati-ve-odenis-izleme-2027'],
            [
                'slug_en' => 'tutor-parent-reports-and-payment-tracking-2027',
                'slug_ru' => 'repetitor-otchety-roditelyam-i-uchet-oplat-2027',

                'title_az' => 'Repetitor və Kurs Mərkəzi Valideynlərlə Necə İşləsin: Nəticə Hesabatı, Davamiyyət və Dərs Haqqı İzləmə (2027)',
                'title_en' => 'How Tutors and Course Centres Should Work with Parents: Progress Reports, Attendance and Fee Tracking (2027)',
                'title_ru' => 'Как репетитору и курсам работать с родителями: отчёты об успеваемости, посещаемость и учёт оплат (2027)',

                'review_az' => 'Valideyn repetitordan niyə gedir? Nəyi və nə qədər tez-tez bildirmək lazımdır, davamiyyət jurnalı, buraxılan və əvəz dərslər, aylıq ödəniş dövrü, nəzakətli xatırlatma, hazır mesaj şablonları, fərdi məlumatlar və valideyn kabineti.',
                'review_en' => 'Why do parents leave a tutor? What to report and how often, the attendance register, missed and make-up lessons, the monthly fee cycle, polite reminders, ready-made message templates, personal data and a parent portal.',
                'review_ru' => 'Почему родители уходят от репетитора? Что и как часто сообщать, журнал посещаемости, пропуски и отработки, ежемесячный цикл оплаты, вежливые напоминания, готовые шаблоны сообщений, персональные данные и кабинет родителя.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '3 Noyabr 2026',
                'date_en' => 'November 3, 2026',
                'date_ru' => '3 Ноября 2026',

                'photo'    => 'cover-parents-payments-az.png',
                'photo_en' => 'cover-parents-payments-en.png',
                'photo_ru' => 'cover-parents-payments-ru.png',

                'meta_title_az' => 'Repetitor Ödəniş və Valideyn Hesabatı 2027 | RS Code',
                'meta_title_en' => 'Tutor Parent Reports and Payment Tracking 2027 | RS Code',
                'meta_title_ru' => 'Репетитор: отчёты родителям и учёт оплат 2027 | RS Code',

                'meta_description_az' => 'Repetitor və kurs mərkəzi üçün: valideynə nə bildirmək, davamiyyət jurnalı, dərs haqqı ödəniş izləmə, nəzakətli xatırlatma şablonları və valideyn kabineti.',
                'meta_description_en' => 'For tutors and course centres: what to report to parents, an attendance register, lesson fee tracking, polite reminder templates and a parent portal.',
                'meta_description_ru' => 'Для репетиторов и курсов: что сообщать родителям, журнал посещаемости, учёт оплаты занятий, шаблоны вежливых напоминаний и кабинет родителя.',

                'meta_keywords_az' => 'repetitor ödəniş, valideyn kabineti, kurs mərkəzi ödəniş izləmə, davamiyyət jurnalı, dərs haqqı, valideyn hesabatı, kursometr, 2027',
                'meta_keywords_en' => 'tutor payments, parent portal, course centre payment tracking, attendance register, tuition fee tracking, parent progress report, kursometr, 2027',
                'meta_keywords_ru' => 'оплата репетитора, кабинет родителя, учёт оплат курсов, журнал посещаемости, отчёт родителям, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
