<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * #73 — Repetitor dərs haqqını necə müəyyənləşdirsin: dərsbaşı, paket və aylıq ödəniş, buraxılan dərslər və endirim qaydaları (2027).
 * Kursometr faktları yalnız resources/lang/az/products.php və kursometr.com-dandır: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət,
 * vaxtlı sınaqlar (ümumi və aralıq, müəllimin saatında açılıb-bağlanır, qapalı suallar avtomatik), ev tapşırıqları, tələbə ödənişlərinin izlənməsi,
 * valideyn kabineti (davamiyyət, qiymət, sınaq nəticələri), mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar, telefon brauzeri,
 * Google ilə giriş, pulsuz müəllim qeydiyyatı.
 * Avtomatik hesab-faktura, paket qalığı sayğacı, SMS/xatırlatma, onlayn kartla ödəniş, Kursometr qiymətləri və rəylər İDDİA EDİLMİR.
 * Bazar qiymətləri (AZN aralıqları) VERİLMİR — yalnız düstur və "nümunə" kimi işarələnmiş şərti rəqəmlər.
 * Vergi barədə yalnız ümumi qeyd — dərəcə yoxdur, taxes.gov.az və mühasibə istinad.
 * #69 (ödəniş xatırlatması, valideyn hesabatı) ilə təkrar etmir, link verir. #72 və #74-ə link YOXDUR.
 */
class Blog73TutorPricingSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Repetitorların ən çox çəkindiyi sual dərsin özü deyil, onun qiymətidir. "Çox desəm, valideyn gedər; az desəm, özümə sərf etməz" düşüncəsi ilə bir çox müəllim qiyməti tanışlarından soruşub təxmini deyir, qaydaları isə heç yazmır. Nəticədə ay sonunda "bu ay neçə dərs olub?", "xəstə olduğu gün də pul verməliyik?", "paketdən qalan dərslər nə olacaq?" kimi suallar mübahisəyə çevrilir.</p>
<p>Bu yazıda dərs haqqını sistemli şəkildə necə müəyyənləşdirmək olar, onu izah edirik: ödəniş modelləri və onların müqayisəsi, qiymətə təsir edən amillər, sadə hesablama düsturu, valideynlə yazılı razılaşdırılmalı qaydalar, qiyməti nəzakətlə necə qaldırmaq və ödənişləri necə izləmək. Konkret bazar qiymətləri vermirik — bu barədə etibarlı açıq məlumat yoxdur və qiymət fəndən, şəhərdən, təcrübədən çox asılıdır. Əvəzində öz qiymətinizi hesablamaq üçün alət veririk.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Hansı ödəniş modeli var?</td><td>Dərsbaşı, aylıq sabit haqq, dərs paketi (məsələn, 8 və ya 12 dərs); bunlar fərdi/qrup və onlayn/əyani formatla birləşir</td></tr>
    <tr><td>Qiyməti necə hesablamalı?</td><td>Arzu etdiyiniz aylıq gəliri real dərs saatlarına bölün, sonra hazırlıq, yol və material xərclərini əlavə edin</td></tr>
    <tr><td>Nəyi yazılı razılaşdırmaq lazımdır?</td><td>Ödəniş tarixi, buraxılan dərslər (şagird və müəllim tərəfindən), əvəz dərslər, tətillər, istifadə olunmamış paketin geri qaytarılması, endirimlər</td></tr>
    <tr><td>Qiyməti necə qaldırmalı?</td><td>Ən azı bir ay əvvəl, yazılı, səbəbi və tarixi göstərməklə; mövcud şagirdlərə keçid müddəti verməklə</td></tr>
    <tr><td>Ödənişləri harada izləmək rahatdır?</td><td>Davamiyyət və ödənişlər bir yerdə olan platformada — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Ödəniş Modelləri: Müqayisə</h2>
<p>Əsas üç model var: hər dərs üçün ayrıca ödəniş, aylıq sabit haqq və əvvəlcədən ödənilən dərs paketi. Bunların hər biri fərdi və ya qrup, onlayn və ya əyani formatda tətbiq oluna bilər.</p>
<table>
  <thead>
    <tr><th>Model</th><th>Necə işləyir</th><th>Üstünlüyü</th><th>Çatışmazlığı</th></tr>
  </thead>
  <tbody>
    <tr><td>Dərsbaşı</td><td>Hər dərsdən sonra və ya həftənin sonunda keçirilən dərslər üçün ödəniş</td><td>Valideyn üçün ən aydın model; qısamüddətli hazırlıq və sınaq dərsləri üçün rahatdır</td><td>Gəlir qeyri-sabitdir; xırda borclar və unudulmuş məbləğlər yaranır; şagird asanlıqla dərs buraxır</td></tr>
    <tr><td>Aylıq haqq</td><td>Ayın əvvəlində sabit məbləğ, həftədə müəyyən sayda dərs</td><td>Sabit və proqnozlaşdırıla bilən gəlir; hesablaşma sadədir</td><td>Ayda dərs sayı dəyişir (bayramlar, 4 və ya 5 həftə) — qaydasız mübahisə yaradır</td></tr>
    <tr><td>Dərs paketi (8 və ya 12 dərs)</td><td>Müəyyən sayda dərs əvvəlcədən ödənilir, bitdikdə yeni paket</td><td>Buraxılan dərslərdə ədalətli; şagird öhdəlik götürür; müəllim pulu əvvəlcədən alır</td><td>Qalan dərs sayını dəqiq izləmək lazımdır; paketin müddəti və geri qaytarma qaydası yazılmalıdır</td></tr>
  </tbody>
</table>
<p>Format da qiymətə və modelə təsir edir:</p>
<table>
  <thead>
    <tr><th>Format</th><th>Üstünlüyü</th><th>Diqqət</th></tr>
  </thead>
  <tbody>
    <tr><td>Fərdi dərs</td><td>Tam şagirdin ehtiyacına uyğun proqram, çevik vaxt; bir dərsin qiyməti daha yüksək olur</td><td>Müəllimin bir saatı bir şagirdə gedir — gəlir saatların sayı ilə məhdudlaşır</td></tr>
    <tr><td>Qrup dərsi</td><td>Şagird üçün daha əlçatan, müəllim üçün bir saatda daha çox gəlir</td><td>Qrup sabit qalmalıdır; bir nəfər çıxanda qalanların qiyməti dəyişirmi — əvvəlcədən yazın</td></tr>
    <tr><td>Onlayn</td><td>Yol vaxtı və xərci yoxdur; başqa şəhərlərdən şagird qəbul etmək mümkündür</td><td>Texniki problemlər (internet, işıq) üçün qayda lazımdır: dərs kəsiləndə nə edilir?</td></tr>
    <tr><td>Əyani (müəllimin yerində)</td><td>Diqqət və nizam asandır; otaq və material müəllimin nəzarətindədir</td><td>Otaq xərci qiymətə daxil edilməlidir</td></tr>
    <tr><td>Əyani (şagirdin evində)</td><td>Valideyn üçün rahatdır</td><td>Yol vaxtı və xərci qiymətə daxil edilməlidir; gecikmə və ləğv riskləri artır</td></tr>
  </tbody>
</table>
<p>Praktikada çox repetitor modelləri birləşdirir: məsələn, məktəb dövründə aylıq haqq və ya 8 dərslik paket, imtahandan əvvəlki intensiv dövrdə isə ayrıca dərsbaşı qiymət.</p>

<h2>Qiymətə Nə Təsir Edir?</h2>
<p>Qiyməti qonşu müəllimin qiymətinə baxıb deyil, öz xərclərinizə və dəyərinizə baxıb müəyyən edin. Nəzərə alınmalı amillər:</p>
<ul>
  <li><strong>Təcrübə və nəticələr.</strong> Neçə ildir dərs deyirsiniz, şagirdləriniz hansı nəticələr göstərib? Nəticəni sübut edə bilən müəllim (sınaq nəticələri, irəliləyiş tarixçəsi) daha yüksək qiymət istəyə bilər.</li>
  <li><strong>Fənn və imtahan səviyyəsi.</strong> İbtidai sinif dəstəyi, buraxılış və ya qəbul imtahanına hazırlıq, olimpiada, beynəlxalq imtahanlar — hər birinin hazırlıq tələbi fərqlidir.</li>
  <li><strong>Hazırlıq vaxtı.</strong> 60 dəqiqəlik dərsə çox vaxt əlavə 20–40 dəqiqə hazırlıq, tapşırıq yoxlama və valideynlə yazışma gedir. Bu vaxt da işdir.</li>
  <li><strong>Yol.</strong> Şagirdin evinə gedirsinizsə, yola sərf olunan vaxt və nəqliyyat xərci dərs qiymətinə daxil olmalıdır.</li>
  <li><strong>Qrup ölçüsü.</strong> Qrupda bir şagird üçün qiymət fərdi dərsdən aşağı olur, amma qrupun ümumi gəliri müəllim üçün adətən daha yüksəkdir. Qrupun minimum sayını müəyyən edin.</li>
  <li><strong>Materiallar və sınaqlar.</strong> Çap olunan materiallar, test toplusu, mütəmadi sınaq imtahanları — bunlar ayrıca xərcdir və ya qiymətə daxil edilməli, ya da ayrıca göstərilməlidir.</li>
</ul>

<h2>Qiyməti Necə Hesablamalı: Sadə Düstur</h2>
<p>Ən sadə yanaşma — yuxarıdan aşağı hesablamaq:</p>
<p><strong>Bir dərs saatının qiyməti = (arzu etdiyiniz aylıq gəlir + aylıq iş xərcləri) ÷ ayda real keçirilən dərs saatları</strong></p>
<p>Burada "real" sözü vacibdir: təqvimdəki bütün boş saatlar dolu olmayacaq, bəzi dərslər ləğv olunacaq, yay aylarında şagird azalacaq. Ona görə planlaşdırdığınız saatların bir hissəsini ehtiyat kimi saxlayın.</p>
<p><em>Nümunə (şərti rəqəmlərlə, real bazar qiyməti deyil):</em> tutaq ki, müəllim ayda X manat gəlir əldə etmək istəyir, aylıq xərcləri (yol, internet, çap, otaq) Y manatdır, ayda isə orta hesabla 60 dərs saatı keçirə bilir. Onda bir saatın minimum qiyməti (X + Y) ÷ 60 olur. Qrup dərsi üçün bu məbləğ qrupdakı şagird sayına bölünür və üzərinə qrupu idarə etməyin əlavə yükü üçün kiçik bir əmsal əlavə edilir. Rəqəmləri öz vəziyyətinizə görə yerinə qoyun.</p>
<p>Hesabladığınız qiyməti sonra iki suala qarşı yoxlayın: <em>bu qiymət mənim hədəf valideynlərim üçün əlçatandırmı?</em> və <em>bu qiymətlə mən uzunmüddətli işləyə bilərəmmi?</em> İkinci suala "yox" cavabı varsa, qiymətinizi deyil, modelinizi (məsələn, fərdidən kiçik qrupa keçid) dəyişməyi düşünün.</p>

<h2>Valideynlə Yazılı Razılaşdırılmalı Qaydalar</h2>
<p>Mübahisələrin çoxu qiymətin özündən yox, qaydaların yazılmamasından yaranır. İlk dərsdən əvvəl qısa mətn hazırlayıb valideynə göndərin və onun "tanış oldum" cavabını saxlayın. Mətndə bunlar olmalıdır:</p>
<table>
  <thead>
    <tr><th>Qayda</th><th>Nümunə ifadə</th></tr>
  </thead>
  <tbody>
    <tr><td>Ödəniş tarixi</td><td>"Aylıq haqq və ya paket ilk dərsdən əvvəl ödənilir; aylıq haqq — ayın 1–5-i arası."</td></tr>
    <tr><td>Şagirdin buraxdığı dərs</td><td>"Ən azı 24 saat əvvəl xəbər verilsə, dərs başqa vaxta keçirilir. Xəbərsiz buraxılan dərs keçilmiş sayılır."</td></tr>
    <tr><td>Müəllimin ləğv etdiyi dərs</td><td>"Müəllim tərəfindən ləğv olunan dərs mütləq əvəz olunur və ya növbəti ödənişdən çıxılır."</td></tr>
    <tr><td>Əvəz dərs</td><td>"Əvəz dərs həmin ay və ya paket müddəti ərzində, hər iki tərəfə uyğun vaxtda keçirilir."</td></tr>
    <tr><td>Tətillər və bayramlar</td><td>"Rəsmi bayram günlərinə düşən dərslər ... (əvəz olunur / ödənişə daxil deyil)." Yay aylarının qaydası ayrıca yazılır.</td></tr>
    <tr><td>Paketin müddəti</td><td>"8 dərslik paket 6 həftə, 12 dərslik paket 8 həftə ərzində istifadə olunmalıdır." (Rəqəmlər nümunədir — öz cədvəlinizə uyğunlaşdırın.)</td></tr>
    <tr><td>İstifadə olunmamış dərslərin qaytarılması</td><td>"Dərslər dayandırılarsa, keçirilməmiş dərslərin haqqı geri qaytarılır" və ya "növbəti dövrə köçürülür" — hansını seçirsinizsə, aydın yazın.</td></tr>
    <tr><td>Endirimlər</td><td>Qardaş-bacı endirimi, bir neçə ay üçün əvvəlcədən ödəniş endirimi — şərti, faizi və hansı hallarda tətbiq olunduğu.</td></tr>
  </tbody>
</table>
<p>Endirimlərdə ehtiyatlı olun: endirim qaydası hamı üçün eyni olmalıdır, əks halda valideynlər bir-biri ilə müqayisə edəndə inam itir. "Xüsusi qiymət" verməkdənsə, açıq yazılmış endirim şərtləri daha etibarlıdır.</p>
<p>Ödəniş xatırlatması və aylıq nəticə hesabatı üçün hazır şablonları ayrıca yazıda vermişik: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>Qiyməti Nəzakətlə Necə Qaldırmalı?</h2>
<p>Xərclər artır, təcrübəniz artır — qiymətin dəyişməsi normaldır. Valideyni narahat etməmək üçün bir neçə qayda:</p>
<ul>
  <li><strong>Əvvəlcədən bildirin.</strong> Ən azı bir ay əvvəl, ideal halda yeni tədris ili və ya yeni paket başlamazdan öncə.</li>
  <li><strong>Yazılı bildirin.</strong> Fərdi mesajla, ümumi qrup çatında yox.</li>
  <li><strong>Səbəbi qısa izah edin.</strong> Uzun bəhanə lazım deyil — "xərclər və dərsə hazırlıq həcmi artıb" kifayətdir.</li>
  <li><strong>Mövcud şagirdlərə keçid verin.</strong> Məsələn, yeni qiymət yeni şagirdlərə dərhal, mövcud şagirdlərə isə növbəti aydan və ya cari paket bitəndən sonra tətbiq olunur.</li>
  <li><strong>Dəyəri xatırladın.</strong> Son aylarda şagirdin irəliləyişini, sınaq nəticələrini qısa qeyd edin.</li>
</ul>
<p><strong>Mesaj şablonu:</strong></p>
<blockquote>
<p>Salam, hörmətli [valideynin adı]. [Şagirdin adı] ilə dərslərimiz davam etdiyi üçün təşəkkür edirəm. Son aylarda [qısa nəticə: məsələn, sınaq nəticələri yaxşılaşıb / mövzular üzrə boşluqlar bağlanıb]. Sizə əvvəlcədən bildirmək istəyirəm ki, [tarix]-dən etibarən dərs haqqı [yeni məbləğ] olacaq. Bu dəyişiklik dərs hazırlığı və xərclərin artması ilə bağlıdır. Cari paket/ay köhnə qiymətlə davam edir. Sualınız olarsa, məmnuniyyətlə cavab verərəm. Hörmətlə, [adınız].</p>
</blockquote>

<h2>Ödənişləri və Paket Qalığını Necə İzləmək?</h2>
<p>Qiymət nə qədər düzgün olsa da, izləmə olmasa itki yaranır. Hər şagird üçün üç şeyi bir yerdə görmək lazımdır:</p>
<ol>
  <li><strong>Davamiyyət</strong> — hansı dərs keçirildi, hansı buraxıldı (xəbərdarlıqla və ya xəbərsiz), hansı müəllim tərəfindən ləğv olundu, hansı əvəz dərs idi.</li>
  <li><strong>Ödəniş</strong> — kim, nə vaxt, hansı dövr və ya paket üçün ödədi.</li>
  <li><strong>Qalıq</strong> — paket modelində: ödənilmiş dərs sayından keçirilmiş və "keçilmiş sayılan" dərslər çıxılır.</li>
</ol>
<p>Dəftərdə bunu aparmaq mümkündür, amma şagird sayı artdıqca səhvlər çoxalır. Excel-də hər şagird üçün sətir, hər dərs üçün sütun açıb davamiyyət statuslarını yazmaq, ayrıca vərəqdə isə ödənişləri qeyd etmək olar. Ən vacib qayda: davamiyyəti dərs günü, ödənişi isə alındığı gün qeyd edin — ay sonuna saxlamayın.</p>

<h2>Vergi Barədə Qısa Qeyd</h2>
<p>Repetitorluqdan əldə olunan gəlir vergiyə cəlb olunan gəlirdir. Qeydiyyat forması, vergi rejimi və hesabat qaydası fəaliyyətin növündən və həcmindən asılıdır, qaydalar isə dəyişə bilər. Dəqiq və aktual məlumat üçün Dövlət Vergi Xidmətinin rəsmi saytına (taxes.gov.az) baxın və ya mühasibə müraciət edin. Qiyməti hesablayarkən vergi öhdəliyini də xərclər sırasına daxil etməyi unutmayın.</p>

<h2>Kursometr Bu İşdə Necə Kömək Edir?</h2>
<p><a href="https://kursometr.com/" rel="noopener" target="_blank">Kursometr</a> repetitor və kurs mərkəzləri üçün platformadır. Qiyməti sizin yerinizə müəyyən etmir, amma qaydalarınızın işləməsi üçün lazım olan məlumatları bir yerdə saxlayır:</p>
<ul>
  <li><strong>Tələbə ödənişlərinin izlənməsi</strong> — kimin ödədiyi və kimin ödəmədiyi bir yerdə görünür.</li>
  <li><strong>Davamiyyət</strong> — hər dərsdə qeyd olunur, ona görə hansı dərslərin keçirildiyi barədə mübahisə azalır.</li>
  <li><strong>Valideyn kabineti</strong> — valideyn uşağın davamiyyətini, qiymətlərini və sınaq nəticələrini özü görür.</li>
  <li><strong>Fənlər, qruplar və həftəlik cədvəl</strong> — fərdi şagirdi bir nəfərlik qrup kimi aparmaq olar.</li>
  <li><strong>Vaxtlı sınaqlar</strong> (ümumi və aralıq) — təyin etdiyiniz saatda açılıb bağlanır, qapalı suallar avtomatik yoxlanır və nəticə sınaq bitən kimi hazır olur. Bu, qiymət qaldıranda göstərə biləcəyiniz nəticə tarixçəsidir.</li>
  <li><strong>Ev tapşırıqlarının verilməsi və yoxlanması</strong>, yalnız həmin qrupa görünən dərs yazıları və materiallar.</li>
  <li><strong>Mentor hesabı</strong> — köməkçi müəllim üçün.</li>
</ul>
<p>Öz səhifənizi (<em>adiniz.kursometr.com</em>) Google hesabı ilə bir dəqiqəyə açırsınız, platforma telefon brauzerində tam işləyir, müəllim qeydiyyatı isə pulsuzdur. Paket qalığını isə ödəniş və davamiyyət qeydlərinə əsasən özünüz hesablayırsınız — ikisi də eyni yerdə olduğu üçün bu, bir neçə saniyə çəkir. Fərdi işləyən müəllim üçün ümumi bələdçi: <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">repetitorlar üçün dərs idarəetmə proqramı</a>.</p>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Ödəniş modeli seçilib: dərsbaşı, aylıq və ya paket (8/12 dərs)</li>
  <li>☐ Qiymət düsturla hesablanıb: gəlir + xərclər ÷ real dərs saatları</li>
  <li>☐ Hazırlıq vaxtı, yol, material və sınaq xərcləri nəzərə alınıb</li>
  <li>☐ Fərdi və qrup, onlayn və əyani qiymətlər ayrıca müəyyən edilib</li>
  <li>☐ Ödəniş tarixi yazılıb</li>
  <li>☐ Şagirdin və müəllimin buraxdığı dərslərin qaydası yazılıb</li>
  <li>☐ Əvəz dərs, tətil və bayram qaydası yazılıb</li>
  <li>☐ Paketin müddəti və istifadə olunmamış dərslərin taleyi yazılıb</li>
  <li>☐ Endirim şərtləri hamı üçün eynidir</li>
  <li>☐ Qaydalar valideynə göndərilib və təsdiq alınıb</li>
  <li>☐ Davamiyyət və ödəniş hər gün qeyd olunur</li>
  <li>☐ Vergi öhdəliyi barədə məlumat alınıb</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Repetitor üçün hansı ödəniş modeli daha yaxşıdır: dərsbaşı, aylıq, yoxsa paket?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Universal cavab yoxdur. Uzunmüddətli hazırlıq üçün aylıq haqq və ya 8–12 dərslik paket sabit gəlir və şagirdin öhdəliyini təmin edir. Qısamüddətli və ya sınaq dərsləri üçün dərsbaşı ödəniş rahatdır. Hansını seçsəniz də, buraxılan dərslər və ödəniş tarixi qaydasını yazılı razılaşdırın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Dərs haqqını necə hesablamaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Arzu etdiyiniz aylıq gəliri və aylıq iş xərclərinizi toplayın, sonra ayda real keçirə biləcəyiniz dərs saatlarının sayına bölün. Hazırlıq vaxtını, yolu, materialları və vergi öhdəliyini də nəzərə alın. Qrup dərsində bu məbləğ qrupdakı şagird sayına bölünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Şagird dərsi buraxanda pul ödənilməlidirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bu, əvvəlcədən razılaşdırdığınız qaydadan asılıdır. Geniş yayılmış yanaşma: müəyyən müddət (məsələn, 24 saat) əvvəl xəbər verilərsə dərs başqa vaxta keçirilir, xəbərsiz buraxılan dərs isə keçilmiş sayılır. Müəllimin ləğv etdiyi dərs isə həmişə əvəz olunmalı və ya ödənişdən çıxılmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Paketdən istifadə olunmamış dərslərin pulu qaytarılmalıdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bunu paketi satmazdan əvvəl yazılı müəyyən edin: dərslər dayandırılarsa, keçirilməmiş dərslərin haqqı qaytarılır, yoxsa növbəti dövrə köçürülür. Paketin istifadə müddətini də göstərin ki, açıq qalan dərslər aylarla uzanmasın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Dərs haqqını valideyni incitmədən necə qaldırmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ən azı bir ay əvvəl, fərdi yazılı mesajla bildirin, səbəbi qısa izah edin, mövcud şagirdlərə keçid müddəti verin (məsələn, cari paket köhnə qiymətlə bitir) və şagirdin son irəliləyişini xatırladın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr ödənişləri izləməyə necə kömək edir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr-də tələbə ödənişləri və hər dərsin davamiyyəti bir yerdə qeyd olunur, valideyn isə öz kabinetində uşağın davamiyyətini, qiymətlərini və sınaq nəticələrini görür. Müəllim qeydiyyatı pulsuzdur və öz səhifənizi (adiniz.kursometr.com) bir dəqiqəyə açırsınız.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">Repetitorlar üçün dərs idarəetmə proqramı</a></li>
  <li><a href="/blog-details/muellim-repetitor-ucun-sexsi-sayt-2027">Müəllim və repetitor üçün şəxsi sayt</a></li>
  <li><a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">Abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a></li>
  <li><a href="/blog-details/onlayn-ders-nece-teskil-olunur-2027">Onlayn dərs necə təşkil olunur</a></li>
  <li><a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">Ev tapşırığı sistemi: ver, yoxla, izlə</a></li>
</ul>

<h2>Nəticə</h2>
<p>Düzgün dərs haqqı təxminlə deyil, hesabla müəyyən olunur: gəlir hədəfi, real dərs saatları, hazırlıq və yol xərcləri. Qiymət qədər vacib olan isə yazılı qaydalardır — ödəniş tarixi, buraxılan və əvəz dərslər, tətillər, paket qalığı və endirimlər. Qaydalar aydın, davamiyyət və ödənişlər isə bir yerdə qeyd olunanda valideynlə pul söhbəti mübahisə yox, sadə hesablaşma olur.</p>
<p><strong>Ödəniş və davamiyyəti bu gün bir yerə yığın: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — müəllim qeydiyyatı pulsuzdur. Ətraflı: <a href="/mehsullar/kursometr">Kursometr haqqında</a>. Kurs mərkəziniz üçün fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>What tutors dread most is not the lesson itself but its price. Thinking "if I ask too much, the parent will leave; if I ask too little, it won't pay off", many teachers ask friends what they charge, name a rough figure and never write any rules down. Then at the end of the month questions like "how many lessons were there this month?", "do we pay for the day he was ill?" and "what happens to the lessons left in the package?" turn into arguments.</p>
<p>In this article we explain how to set your lesson fee systematically: payment models and how they compare, the factors that affect price, a simple calculation formula, the rules to agree with parents in writing, how to raise prices politely and how to track payments. We do not quote market prices — there is no reliable public data on them, and prices depend heavily on subject, city and experience. Instead, we give you a tool to calculate your own price.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What payment models are there?</td><td>Per lesson, a fixed monthly fee and lesson packages (for example, 8 or 12 lessons); these combine with individual/group and online/in-person formats</td></tr>
    <tr><td>How should I calculate the price?</td><td>Divide your desired monthly income by your real teaching hours, then add preparation, travel and material costs</td></tr>
    <tr><td>What needs to be agreed in writing?</td><td>Payment date, missed lessons (by the student and by the teacher), make-up lessons, holidays, refunds for unused package lessons, discounts</td></tr>
    <tr><td>How should I raise prices?</td><td>At least a month in advance, in writing, giving the reason and the date, with a transition period for current students</td></tr>
    <tr><td>Where is it easiest to track payments?</td><td>On a platform that keeps attendance and payments in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Payment Models Compared</h2>
<p>There are three main models: paying for each lesson separately, a fixed monthly fee and a lesson package paid in advance. Each can be used for individual or group, online or in-person lessons.</p>
<table>
  <thead>
    <tr><th>Model</th><th>How it works</th><th>Pros</th><th>Cons</th></tr>
  </thead>
  <tbody>
    <tr><td>Per lesson</td><td>Payment after each lesson or at the end of the week for lessons held</td><td>The clearest model for parents; convenient for short-term preparation and trial lessons</td><td>Income is unstable; small debts and forgotten amounts build up; students skip lessons easily</td></tr>
    <tr><td>Monthly fee</td><td>A fixed amount at the start of the month for a set number of lessons per week</td><td>Stable, predictable income; simple settlement</td><td>The number of lessons per month varies (holidays, 4 or 5 weeks) — without a rule this causes disputes</td></tr>
    <tr><td>Lesson package (8 or 12 lessons)</td><td>A set number of lessons is paid in advance; when used up, a new package</td><td>Fair when lessons are missed; the student commits; the teacher is paid upfront</td><td>The remaining lesson count must be tracked precisely; the package's validity and refund rule must be written down</td></tr>
  </tbody>
</table>
<p>The format also affects the price and the model:</p>
<table>
  <thead>
    <tr><th>Format</th><th>Pros</th><th>Watch out for</th></tr>
  </thead>
  <tbody>
    <tr><td>Individual lesson</td><td>A programme fully tailored to the student, flexible times; the price per lesson is higher</td><td>One teacher hour goes to one student — income is capped by the number of hours</td></tr>
    <tr><td>Group lesson</td><td>More affordable for the student, more income per hour for the teacher</td><td>The group must stay stable; does the price change for the others when someone leaves? Write it down in advance</td></tr>
    <tr><td>Online</td><td>No travel time or cost; students from other cities can join</td><td>You need a rule for technical problems (internet, power cuts): what happens if a lesson is cut short?</td></tr>
    <tr><td>In person (at the teacher's place)</td><td>Easier to keep focus and order; room and materials are under the teacher's control</td><td>Room costs must be included in the price</td></tr>
    <tr><td>In person (at the student's home)</td><td>Convenient for parents</td><td>Travel time and cost must be included in the price; the risk of delays and cancellations grows</td></tr>
  </tbody>
</table>
<p>In practice many tutors combine models: for example, a monthly fee or an 8-lesson package during the school year, and a separate per-lesson price during the intensive period before an exam.</p>

<h2>What Affects the Price?</h2>
<p>Set your price based on your own costs and value, not on what the teacher next door charges. Factors to consider:</p>
<ul>
  <li><strong>Experience and results.</strong> How many years have you been teaching, and what results have your students achieved? A teacher who can prove results (mock test scores, a progress history) can ask for a higher price.</li>
  <li><strong>Subject and exam level.</strong> Primary school support, school-leaving or university entrance exam preparation, olympiads, international exams — each needs a different amount of preparation.</li>
  <li><strong>Preparation time.</strong> A 60-minute lesson often takes an extra 20–40 minutes of preparation, homework checking and messaging with parents. That time is work too.</li>
  <li><strong>Travel.</strong> If you go to the student's home, the travel time and transport cost must be included in the lesson price.</li>
  <li><strong>Group size.</strong> In a group, the price per student is lower than for an individual lesson, but the group's total income is usually higher for the teacher. Set a minimum group size.</li>
  <li><strong>Materials and mock tests.</strong> Printed materials, test collections, regular mock exams — these are a separate cost and must either be included in the price or shown separately.</li>
</ul>

<h2>How to Calculate the Price: A Simple Formula</h2>
<p>The simplest approach is to calculate top-down:</p>
<p><strong>Price of one teaching hour = (desired monthly income + monthly work costs) ÷ teaching hours actually held per month</strong></p>
<p>The word "actually" matters: not every free slot in your calendar will be filled, some lessons will be cancelled and student numbers will drop in summer. So keep part of your planned hours as a buffer.</p>
<p><em>Example (with placeholder figures, not real market prices):</em> say a teacher wants to earn X manats a month, their monthly costs (travel, internet, printing, room) are Y manats, and they can teach on average 60 hours a month. The minimum price per hour is then (X + Y) ÷ 60. For a group lesson this amount is divided by the number of students in the group, plus a small margin for the extra work of managing a group. Plug in the figures for your own situation.</p>
<p>Then test the price you have calculated against two questions: <em>is this price affordable for the parents I am targeting?</em> and <em>can I work at this price in the long run?</em> If the answer to the second is "no", consider changing your model (for example, moving from individual lessons to small groups) rather than your price.</p>

<h2>Rules to Agree with Parents in Writing</h2>
<p>Most disputes come not from the price itself but from rules that were never written down. Before the first lesson, prepare a short text, send it to the parent and keep their "noted" reply. The text should include:</p>
<table>
  <thead>
    <tr><th>Rule</th><th>Sample wording</th></tr>
  </thead>
  <tbody>
    <tr><td>Payment date</td><td>"The monthly fee or package is paid before the first lesson; the monthly fee between the 1st and 5th of the month."</td></tr>
    <tr><td>Lesson missed by the student</td><td>"If notice is given at least 24 hours in advance, the lesson is rescheduled. A lesson missed without notice counts as held."</td></tr>
    <tr><td>Lesson cancelled by the teacher</td><td>"A lesson cancelled by the teacher is always made up or deducted from the next payment."</td></tr>
    <tr><td>Make-up lesson</td><td>"A make-up lesson is held within the same month or package period, at a time that suits both sides."</td></tr>
    <tr><td>Holidays and public holidays</td><td>"Lessons falling on public holidays are ... (made up / not included in the fee)." The rule for the summer months is written separately.</td></tr>
    <tr><td>Package validity</td><td>"An 8-lesson package must be used within 6 weeks, a 12-lesson package within 8 weeks." (The figures are an example — adapt them to your schedule.)</td></tr>
    <tr><td>Refund for unused lessons</td><td>"If lessons are stopped, the fee for lessons not held is refunded" or "carried over to the next period" — whichever you choose, write it clearly.</td></tr>
    <tr><td>Discounts</td><td>Sibling discount, discount for paying several months in advance — the condition, the percentage and when it applies.</td></tr>
  </tbody>
</table>
<p>Be careful with discounts: the discount rule must be the same for everyone, otherwise trust is lost when parents compare notes. Openly written discount terms are more reliable than giving someone a "special price".</p>
<p>We have given ready-made templates for payment reminders and monthly progress reports in a separate article: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>How to Raise Your Price Politely</h2>
<p>Costs go up, your experience grows — it is normal for prices to change. A few rules so as not to upset parents:</p>
<ul>
  <li><strong>Give advance notice.</strong> At least a month ahead, ideally before a new school year or a new package starts.</li>
  <li><strong>Put it in writing.</strong> In a personal message, not in the general group chat.</li>
  <li><strong>Briefly explain why.</strong> No long excuses are needed — "costs and the amount of lesson preparation have gone up" is enough.</li>
  <li><strong>Give current students a transition.</strong> For example, the new price applies to new students straight away, and to current students from next month or once their current package ends.</li>
  <li><strong>Remind them of the value.</strong> Briefly mention the student's progress and test results over recent months.</li>
</ul>
<p><strong>Message template:</strong></p>
<blockquote>
<p>Hello, dear [parent's name]. Thank you for continuing our lessons with [student's name]. Over recent months [a short result: for example, mock test scores have improved / gaps in topics have been closed]. I would like to let you know in advance that from [date] the lesson fee will be [new amount]. This change is due to increased lesson preparation and costs. The current package/month continues at the old price. If you have any questions, I will be happy to answer. Kind regards, [your name].</p>
</blockquote>

<h2>How to Track Payments and Package Balances</h2>
<p>However right the price is, without tracking you will lose money. For each student you need to see three things in one place:</p>
<ol>
  <li><strong>Attendance</strong> — which lesson was held, which was missed (with or without notice), which was cancelled by the teacher, which was a make-up lesson.</li>
  <li><strong>Payment</strong> — who paid, when, and for which period or package.</li>
  <li><strong>Balance</strong> — in the package model: the lessons held and those "counted as held" are subtracted from the number of lessons paid for.</li>
</ol>
<p>You can keep this in a notebook, but as student numbers grow, mistakes multiply. In Excel you can open a row for each student and a column for each lesson, record attendance statuses and log payments on a separate sheet. The most important rule: record attendance on the day of the lesson and payment on the day you receive it — don't leave it until the end of the month.</p>

<h2>A Short Note on Tax</h2>
<p>Income from tutoring is taxable income. The form of registration, the tax regime and the reporting rules depend on the type and scale of the activity, and the rules may change. For accurate and current information, check the official website of the State Tax Service (taxes.gov.az) or ask an accountant. When calculating your price, don't forget to include your tax obligations among your costs.</p>

<h2>How Kursometr Helps</h2>
<p><a href="https://kursometr.com/" rel="noopener" target="_blank">Kursometr</a> is a platform for tutors and course centres. It does not set your price for you, but it keeps the information your rules need in one place:</p>
<ul>
  <li><strong>Student payment tracking</strong> — who has paid and who hasn't is visible in one place.</li>
  <li><strong>Attendance</strong> — recorded at every lesson, so there are fewer disputes about which lessons were held.</li>
  <li><strong>Parent cabinet</strong> — parents see their child's attendance, grades and test results themselves.</li>
  <li><strong>Subjects, groups and a weekly schedule</strong> — an individual student can be run as a one-person group.</li>
  <li><strong>Timed tests</strong> (general and interim) — they open and close at the time you set, closed questions are graded automatically and the results are ready as soon as the test ends. This is a record of results you can show when you raise your price.</li>
  <li><strong>Homework given and checked</strong>, and lesson recordings and materials visible only to that group.</li>
  <li><strong>Mentor accounts</strong> — for an assistant teacher.</li>
</ul>
<p>You open your own page (<em>yourname.kursometr.com</em>) with a Google account in a minute, the platform works fully in a phone browser, and teacher registration is free. You work out the package balance yourself from the payment and attendance records — since both are in the same place, it takes a few seconds. A general guide for tutors working on their own: <a href="/blog-details/tutor-class-management-software-2026">class management software for tutors</a>.</p>

<h2>Checklist</h2>
<ul>
  <li>☐ A payment model has been chosen: per lesson, monthly or package (8/12 lessons)</li>
  <li>☐ The price is calculated with the formula: income + costs ÷ real teaching hours</li>
  <li>☐ Preparation time, travel, materials and mock test costs are taken into account</li>
  <li>☐ Individual and group, online and in-person prices are set separately</li>
  <li>☐ The payment date is written down</li>
  <li>☐ The rule for lessons missed by the student and by the teacher is written down</li>
  <li>☐ The make-up lesson, holiday and public holiday rules are written down</li>
  <li>☐ The package validity and what happens to unused lessons are written down</li>
  <li>☐ Discount terms are the same for everyone</li>
  <li>☐ The rules have been sent to parents and confirmed</li>
  <li>☐ Attendance and payments are recorded every day</li>
  <li>☐ You have checked your tax obligations</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Which payment model is best for a tutor: per lesson, monthly or a package?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">There is no universal answer. For long-term preparation, a monthly fee or an 8–12 lesson package gives stable income and commitment from the student. For short-term or trial lessons, paying per lesson is convenient. Whichever you choose, agree the missed-lesson and payment-date rules in writing.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do I calculate my lesson fee?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Add your desired monthly income and your monthly work costs, then divide by the number of teaching hours you can actually hold per month. Also take preparation time, travel, materials and tax obligations into account. For a group lesson, this amount is divided by the number of students in the group.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should a missed lesson be paid for?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">That depends on the rule you agreed in advance. A common approach: if notice is given a set time ahead (for example, 24 hours), the lesson is rescheduled; a lesson missed without notice counts as held. A lesson cancelled by the teacher should always be made up or deducted from the payment.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should unused package lessons be refunded?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Decide this in writing before selling the package: if lessons stop, is the fee for lessons not held refunded or carried over to the next period? Also state the package's validity period so that open lessons don't drag on for months.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can I raise my lesson fee without upsetting parents?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tell them at least a month in advance in a personal written message, briefly explain the reason, give current students a transition period (for example, the current package finishes at the old price) and remind them of the student's recent progress.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How does Kursometr help track payments?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In Kursometr, student payments and attendance for every lesson are recorded in one place, and parents see their child's attendance, grades and test results in their own cabinet. Teacher registration is free and you open your own page (yourname.kursometr.com) in a minute.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/tutor-class-management-software-2026">Class management software for tutors</a></li>
  <li><a href="/blog-details/personal-website-for-teachers-tutors-2027">A personal website for teachers and tutors</a></li>
  <li><a href="/blog-details/exam-prep-course-centre-management-2027">How to run an exam-prep course centre</a></li>
  <li><a href="/blog-details/how-to-run-online-lessons-2027">How to run online lessons</a></li>
  <li><a href="/blog-details/homework-system-for-teachers-2027">Homework system for teachers</a></li>
</ul>

<h2>Conclusion</h2>
<p>The right lesson fee is set by calculation, not guesswork: an income target, real teaching hours, preparation and travel costs. Just as important as the price are written rules — payment date, missed and make-up lessons, holidays, package balances and discounts. When the rules are clear and attendance and payments are recorded in one place, talking money with parents stops being an argument and becomes a simple settlement.</p>
<p><strong>Bring payments and attendance together today: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — teacher registration is free. More details: <a href="/mehsullar/kursometr">about Kursometr</a>. If your course centre needs a custom system, <a href="/contact">contact us</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Больше всего репетиторы опасаются не самого урока, а его цены. Рассуждая «назову много — родитель уйдёт, назову мало — мне невыгодно», многие преподаватели спрашивают знакомых, называют примерную сумму и никогда не записывают правила. В итоге в конце месяца вопросы «сколько уроков было в этом месяце?», «платить ли за день, когда ребёнок болел?», «что будет с оставшимися уроками из пакета?» превращаются в споры.</p>
<p>В этой статье мы объясняем, как системно установить цену за урок: модели оплаты и их сравнение, факторы, влияющие на цену, простая формула расчёта, правила, которые нужно письменно согласовать с родителями, как вежливо поднять цену и как вести учёт оплат. Конкретных рыночных цен мы не приводим — надёжных открытых данных о них нет, а цена сильно зависит от предмета, города и опыта. Вместо этого даём инструмент, чтобы рассчитать свою цену.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Какие бывают модели оплаты?</td><td>Поурочная, фиксированная помесячная и пакет уроков (например, 8 или 12 уроков); они сочетаются с форматами индивидуально/в группе и онлайн/очно</td></tr>
    <tr><td>Как рассчитать цену?</td><td>Разделите желаемый месячный доход на реальное число учебных часов, затем добавьте затраты на подготовку, дорогу и материалы</td></tr>
    <tr><td>Что нужно согласовать письменно?</td><td>Дату оплаты, пропуски (учеником и преподавателем), отработки, каникулы, возврат за неиспользованные уроки пакета, скидки</td></tr>
    <tr><td>Как поднять цену?</td><td>Минимум за месяц, письменно, с причиной и датой, с переходным периодом для текущих учеников</td></tr>
    <tr><td>Где удобнее вести учёт оплат?</td><td>На платформе, где посещаемость и оплаты в одном месте — например, в <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Модели оплаты: сравнение</h2>
<p>Основных моделей три: оплата каждого урока отдельно, фиксированная помесячная плата и пакет уроков, оплаченный заранее. Каждую можно применять для индивидуальных и групповых, онлайн- и очных занятий.</p>
<table>
  <thead>
    <tr><th>Модель</th><th>Как работает</th><th>Плюсы</th><th>Минусы</th></tr>
  </thead>
  <tbody>
    <tr><td>Поурочно</td><td>Оплата после каждого урока или в конце недели за проведённые уроки</td><td>Самая понятная модель для родителей; удобна для краткосрочной подготовки и пробных уроков</td><td>Нестабильный доход; накапливаются мелкие долги и забытые суммы; ученик легко пропускает</td></tr>
    <tr><td>Помесячно</td><td>Фиксированная сумма в начале месяца за определённое число уроков в неделю</td><td>Стабильный, предсказуемый доход; простые расчёты</td><td>Число уроков в месяце меняется (праздники, 4 или 5 недель) — без правила это ведёт к спорам</td></tr>
    <tr><td>Пакет уроков (8 или 12)</td><td>Определённое число уроков оплачивается заранее, после окончания — новый пакет</td><td>Справедливо при пропусках; ученик берёт на себя обязательство; преподаватель получает оплату вперёд</td><td>Нужно точно отслеживать остаток уроков; срок действия пакета и правило возврата должны быть записаны</td></tr>
  </tbody>
</table>
<p>Формат тоже влияет на цену и модель:</p>
<table>
  <thead>
    <tr><th>Формат</th><th>Плюсы</th><th>На что обратить внимание</th></tr>
  </thead>
  <tbody>
    <tr><td>Индивидуальный урок</td><td>Программа полностью под ученика, гибкое время; цена урока выше</td><td>Час преподавателя уходит одному ученику — доход ограничен числом часов</td></tr>
    <tr><td>Групповой урок</td><td>Доступнее для ученика, больше дохода за час для преподавателя</td><td>Группа должна быть стабильной; меняется ли цена для остальных, если кто-то уходит? Запишите заранее</td></tr>
    <tr><td>Онлайн</td><td>Нет времени и расходов на дорогу; можно брать учеников из других городов</td><td>Нужно правило на случай технических проблем (интернет, свет): что делать, если урок прервался?</td></tr>
    <tr><td>Очно (у преподавателя)</td><td>Легче поддерживать внимание и порядок; помещение и материалы под контролем преподавателя</td><td>Расходы на помещение нужно включить в цену</td></tr>
    <tr><td>Очно (на дому у ученика)</td><td>Удобно для родителей</td><td>Время и расходы на дорогу нужно включить в цену; растут риски опозданий и отмен</td></tr>
  </tbody>
</table>
<p>На практике многие репетиторы сочетают модели: например, в учебный год — помесячная оплата или пакет на 8 уроков, а в интенсивный период перед экзаменом — отдельная поурочная цена.</p>

<h2>Что влияет на цену?</h2>
<p>Устанавливайте цену исходя из своих затрат и ценности, а не из цены соседнего преподавателя. Факторы, которые нужно учесть:</p>
<ul>
  <li><strong>Опыт и результаты.</strong> Сколько лет вы преподаёте, каких результатов добились ваши ученики? Преподаватель, который может подтвердить результаты (баллы пробных тестов, история прогресса), может просить более высокую цену.</li>
  <li><strong>Предмет и уровень экзамена.</strong> Помощь в начальной школе, подготовка к выпускному или вступительному экзамену, олимпиады, международные экзамены — у каждого своя нагрузка на подготовку.</li>
  <li><strong>Время на подготовку.</strong> К 60-минутному уроку часто добавляются ещё 20–40 минут на подготовку, проверку заданий и переписку с родителями. Это тоже работа.</li>
  <li><strong>Дорога.</strong> Если вы ездите к ученику домой, время и транспортные расходы должны входить в цену урока.</li>
  <li><strong>Размер группы.</strong> В группе цена для одного ученика ниже, чем за индивидуальный урок, но общий доход группы для преподавателя обычно выше. Определите минимальный состав группы.</li>
  <li><strong>Материалы и пробные тесты.</strong> Печатные материалы, сборники тестов, регулярные пробные экзамены — это отдельные расходы, которые нужно либо включить в цену, либо указать отдельно.</li>
</ul>

<h2>Как рассчитать цену: простая формула</h2>
<p>Самый простой подход — считать сверху вниз:</p>
<p><strong>Цена одного учебного часа = (желаемый месячный доход + месячные рабочие расходы) ÷ реально проводимые учебные часы в месяц</strong></p>
<p>Слово «реально» здесь важно: не все свободные слоты в календаре будут заполнены, часть уроков отменится, летом учеников станет меньше. Поэтому оставьте часть запланированных часов в запасе.</p>
<p><em>Пример (с условными цифрами, не реальная рыночная цена):</em> допустим, преподаватель хочет зарабатывать X манатов в месяц, его месячные расходы (дорога, интернет, печать, помещение) — Y манатов, а в среднем он может проводить 60 учебных часов в месяц. Тогда минимальная цена часа — (X + Y) ÷ 60. Для группового урока эта сумма делится на число учеников в группе, плюс небольшая надбавка за дополнительную нагрузку по ведению группы. Подставьте цифры своей ситуации.</p>
<p>Затем проверьте рассчитанную цену двумя вопросами: <em>доступна ли эта цена для родителей, на которых я ориентируюсь?</em> и <em>смогу ли я долго работать по этой цене?</em> Если на второй вопрос ответ «нет», подумайте о смене модели (например, переходе от индивидуальных занятий к мини-группам), а не цены.</p>

<h2>Правила, которые нужно письменно согласовать с родителями</h2>
<p>Большинство споров возникает не из-за самой цены, а из-за того, что правила не были записаны. Перед первым уроком подготовьте короткий текст, отправьте его родителю и сохраните его ответ «ознакомлен(а)». В тексте должно быть:</p>
<table>
  <thead>
    <tr><th>Правило</th><th>Пример формулировки</th></tr>
  </thead>
  <tbody>
    <tr><td>Дата оплаты</td><td>«Помесячная плата или пакет оплачивается до первого урока; помесячная плата — с 1-го по 5-е число месяца».</td></tr>
    <tr><td>Пропуск по вине ученика</td><td>«Если предупредить минимум за 24 часа, урок переносится. Урок, пропущенный без предупреждения, считается проведённым».</td></tr>
    <tr><td>Отмена урока преподавателем</td><td>«Урок, отменённый преподавателем, обязательно отрабатывается или вычитается из следующей оплаты».</td></tr>
    <tr><td>Отработка</td><td>«Отработка проводится в пределах того же месяца или срока пакета, в удобное для обеих сторон время».</td></tr>
    <tr><td>Каникулы и праздники</td><td>«Уроки, выпадающие на официальные праздники, ... (отрабатываются / не входят в оплату)». Правило на летние месяцы прописывается отдельно.</td></tr>
    <tr><td>Срок действия пакета</td><td>«Пакет на 8 уроков нужно использовать за 6 недель, на 12 уроков — за 8 недель». (Цифры — пример, адаптируйте под своё расписание.)</td></tr>
    <tr><td>Возврат за неиспользованные уроки</td><td>«При прекращении занятий оплата за непроведённые уроки возвращается» или «переносится на следующий период» — что бы вы ни выбрали, запишите чётко.</td></tr>
    <tr><td>Скидки</td><td>Скидка для братьев и сестёр, скидка за оплату нескольких месяцев вперёд — условие, процент и случаи применения.</td></tr>
  </tbody>
</table>
<p>Будьте осторожны со скидками: правило скидки должно быть одинаковым для всех, иначе, когда родители сравнивают условия, теряется доверие. Открыто записанные условия скидок надёжнее, чем «особая цена» для кого-то.</p>
<p>Готовые шаблоны напоминания об оплате и ежемесячного отчёта мы дали в отдельной статье: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>Как вежливо поднять цену?</h2>
<p>Расходы растут, растёт ваш опыт — изменение цены нормально. Несколько правил, чтобы не огорчить родителей:</p>
<ul>
  <li><strong>Предупредите заранее.</strong> Минимум за месяц, а лучше — до начала нового учебного года или нового пакета.</li>
  <li><strong>Сообщите письменно.</strong> Личным сообщением, а не в общем групповом чате.</li>
  <li><strong>Кратко объясните причину.</strong> Долгие оправдания не нужны — достаточно «выросли расходы и объём подготовки к урокам».</li>
  <li><strong>Дайте текущим ученикам переходный период.</strong> Например, новая цена сразу действует для новых учеников, а для текущих — со следующего месяца или после окончания текущего пакета.</li>
  <li><strong>Напомните о ценности.</strong> Кратко отметьте прогресс ученика и результаты тестов за последние месяцы.</li>
</ul>
<p><strong>Шаблон сообщения:</strong></p>
<blockquote>
<p>Здравствуйте, уважаемый(ая) [имя родителя]. Спасибо, что продолжаете занятия с [имя ученика]. За последние месяцы [краткий результат: например, улучшились баллы пробных тестов / закрыты пробелы по темам]. Хочу заранее сообщить, что с [дата] стоимость урока составит [новая сумма]. Это изменение связано с ростом объёма подготовки и расходов. Текущий пакет/месяц продолжается по старой цене. Если у вас есть вопросы, с удовольствием отвечу. С уважением, [ваше имя].</p>
</blockquote>

<h2>Как вести учёт оплат и остатка пакета?</h2>
<p>Какой бы правильной ни была цена, без учёта возникают потери. По каждому ученику нужно видеть в одном месте три вещи:</p>
<ol>
  <li><strong>Посещаемость</strong> — какой урок проведён, какой пропущен (с предупреждением или без), какой отменён преподавателем, какой был отработкой.</li>
  <li><strong>Оплата</strong> — кто, когда и за какой период или пакет заплатил.</li>
  <li><strong>Остаток</strong> — в пакетной модели: из числа оплаченных уроков вычитаются проведённые и «считающиеся проведёнными».</li>
</ol>
<p>Вести это можно и в тетради, но с ростом числа учеников растёт и число ошибок. В Excel можно завести строку на каждого ученика и столбец на каждый урок, записывать статусы посещаемости, а на отдельном листе — оплаты. Самое важное правило: отмечайте посещаемость в день урока, а оплату — в день её получения, не откладывайте до конца месяца.</p>

<h2>Коротко о налогах</h2>
<p>Доход от репетиторства является налогооблагаемым доходом. Форма регистрации, налоговый режим и порядок отчётности зависят от вида и объёма деятельности, а правила могут меняться. За точной и актуальной информацией обращайтесь на официальный сайт Государственной налоговой службы (taxes.gov.az) или к бухгалтеру. При расчёте цены не забудьте включить налоговые обязательства в число расходов.</p>

<h2>Как в этом помогает Kursometr?</h2>
<p><a href="https://kursometr.com/" rel="noopener" target="_blank">Kursometr</a> — платформа для репетиторов и учебных центров. Она не устанавливает цену за вас, но хранит в одном месте данные, которые нужны для работы ваших правил:</p>
<ul>
  <li><strong>Учёт оплат учеников</strong> — кто заплатил, а кто нет, видно в одном месте.</li>
  <li><strong>Посещаемость</strong> — отмечается на каждом уроке, поэтому споров о том, какие уроки состоялись, становится меньше.</li>
  <li><strong>Кабинет родителя</strong> — родитель сам видит посещаемость, оценки и результаты тестов ребёнка.</li>
  <li><strong>Предметы, группы и недельное расписание</strong> — индивидуального ученика можно вести как группу из одного человека.</li>
  <li><strong>Тесты по времени</strong> (общие и промежуточные) — открываются и закрываются в заданное вами время, закрытые вопросы проверяются автоматически, а результаты готовы сразу после окончания теста. Это история результатов, которую можно показать при повышении цены.</li>
  <li><strong>Выдача и проверка домашних заданий</strong>, записи уроков и материалы, видимые только этой группе.</li>
  <li><strong>Аккаунт ментора</strong> — для преподавателя-помощника.</li>
</ul>
<p>Свою страницу (<em>vashe-imya.kursometr.com</em>) вы открываете через аккаунт Google за минуту, платформа полностью работает в браузере телефона, а регистрация преподавателя бесплатна. Остаток пакета вы считаете сами по записям оплат и посещаемости — поскольку они в одном месте, это занимает несколько секунд. Общий гид для репетиторов, работающих самостоятельно: <a href="/blog-details/programma-dlya-repetitorov-2026">программа для репетиторов</a>.</p>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Выбрана модель оплаты: поурочно, помесячно или пакет (8/12 уроков)</li>
  <li>☐ Цена рассчитана по формуле: доход + расходы ÷ реальные учебные часы</li>
  <li>☐ Учтены время на подготовку, дорога, материалы и пробные тесты</li>
  <li>☐ Цены для индивидуальных и групповых, онлайн- и очных занятий установлены отдельно</li>
  <li>☐ Дата оплаты записана</li>
  <li>☐ Правило пропусков учеником и преподавателем записано</li>
  <li>☐ Правила отработок, каникул и праздников записаны</li>
  <li>☐ Срок действия пакета и судьба неиспользованных уроков записаны</li>
  <li>☐ Условия скидок одинаковы для всех</li>
  <li>☐ Правила отправлены родителям и подтверждены</li>
  <li>☐ Посещаемость и оплаты отмечаются каждый день</li>
  <li>☐ Получена информация о налоговых обязательствах</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какая модель оплаты лучше для репетитора: поурочная, помесячная или пакет?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Универсального ответа нет. Для долгосрочной подготовки помесячная оплата или пакет на 8–12 уроков дают стабильный доход и обязательство ученика. Для краткосрочных или пробных занятий удобна поурочная оплата. Что бы вы ни выбрали, письменно согласуйте правила пропусков и дату оплаты.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как рассчитать цену урока?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сложите желаемый месячный доход и месячные рабочие расходы, затем разделите на число учебных часов, которые вы реально можете проводить в месяц. Учтите также время на подготовку, дорогу, материалы и налоги. Для группового урока эта сумма делится на число учеников в группе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли платить за пропущенный урок?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Это зависит от правила, согласованного заранее. Распространённый подход: если предупредить за определённое время (например, за 24 часа), урок переносится, а пропущенный без предупреждения считается проведённым. Урок, отменённый преподавателем, всегда должен отрабатываться или вычитаться из оплаты.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли возвращать деньги за неиспользованные уроки пакета?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Определите это письменно до продажи пакета: при прекращении занятий оплата за непроведённые уроки возвращается или переносится на следующий период? Укажите также срок действия пакета, чтобы открытые уроки не растягивались на месяцы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как поднять цену урока, не обидев родителей?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сообщите минимум за месяц личным письменным сообщением, кратко объясните причину, дайте текущим ученикам переходный период (например, текущий пакет завершается по старой цене) и напомните о недавнем прогрессе ученика.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как Kursometr помогает вести учёт оплат?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В Kursometr оплаты учеников и посещаемость каждого урока фиксируются в одном месте, а родитель в своём кабинете видит посещаемость, оценки и результаты тестов ребёнка. Регистрация преподавателя бесплатна, а свою страницу (vashe-imya.kursometr.com) вы открываете за минуту.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/programma-dlya-repetitorov-2026">Программа для репетиторов</a></li>
  <li><a href="/blog-details/lichnyj-sajt-dlya-uchitelya-repetitora-2027">Личный сайт для учителя и репетитора</a></li>
  <li><a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">Как управлять курсами подготовки к экзаменам</a></li>
  <li><a href="/blog-details/kak-provodit-onlajn-uroki-2027">Как проводить онлайн-уроки</a></li>
  <li><a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">Система домашних заданий для учителя</a></li>
</ul>

<h2>Заключение</h2>
<p>Правильная цена урока определяется расчётом, а не на глаз: целевой доход, реальные учебные часы, затраты на подготовку и дорогу. Не менее важны, чем цена, письменные правила — дата оплаты, пропуски и отработки, каникулы, остаток пакета и скидки. Когда правила понятны, а посещаемость и оплаты фиксируются в одном месте, разговор о деньгах с родителями становится не спором, а простым расчётом.</p>
<p><strong>Соберите оплаты и посещаемость в одном месте уже сегодня: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — регистрация преподавателя бесплатна. Подробнее: <a href="/mehsullar/kursometr">о Kursometr</a>. Если вашему учебному центру нужна индивидуальная система, <a href="/kontakty">свяжитесь с нами</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'repetitor-ders-haqqi-nece-teyin-olunur-2027'],
            [
                'slug_en' => 'how-tutors-should-set-lesson-prices-2027',
                'slug_ru' => 'kak-repetitoru-ustanovit-cenu-za-urok-2027',

                'title_az' => 'Repetitor Dərs Haqqını Necə Müəyyənləşdirsin: Saatlıq, Paket və Aylıq Ödəniş, Buraxılan Dərslər və Endirim Qaydaları (2027)',
                'title_en' => 'How Tutors Should Set Lesson Prices: Per Lesson, Packages and Monthly Fees, Missed Lessons and Discount Rules (2027)',
                'title_ru' => 'Как репетитору установить цену за урок: поурочная, пакетная и помесячная оплата, пропуски и скидки (2027)',

                'review_az' => 'Repetitor üçün dərs haqqı bələdçisi: dərsbaşı, aylıq və 8/12 dərslik paket modellərinin müqayisəsi, fərdi və qrup, onlayn və əyani, qiymət hesablama düsturu, buraxılan və əvəz dərslər, tətillər, paket qaytarılması, endirimlər, qiyməti qaldırmaq üçün mesaj şablonu və ödəniş izləmə.',
                'review_en' => 'A lesson pricing guide for tutors: per-lesson, monthly and 8/12-lesson package models compared, individual vs group, online vs in-person, a pricing formula, missed and make-up lessons, holidays, package refunds, discounts, a price-rise message template and payment tracking.',
                'review_ru' => 'Гид по цене урока для репетитора: сравнение поурочной, помесячной оплаты и пакетов на 8/12 уроков, индивидуально и в группе, онлайн и очно, формула расчёта, пропуски и отработки, каникулы, возврат за пакет, скидки, шаблон сообщения о повышении цены и учёт оплат.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '4 Noyabr 2026',
                'date_en' => 'November 4, 2026',
                'date_ru' => '4 Ноября 2026',

                'photo'    => 'cover-tutor-pricing-az.png',
                'photo_en' => 'cover-tutor-pricing-en.png',
                'photo_ru' => 'cover-tutor-pricing-ru.png',

                'meta_title_az' => 'Repetitor Dərs Haqqı Necə Təyin Olunur 2027 | RS Code',
                'meta_title_en' => 'How Tutors Should Set Lesson Prices 2027 | RS Code',
                'meta_title_ru' => 'Как репетитору установить цену за урок 2027 | RS Code',

                'meta_description_az' => 'Repetitor dərs haqqı: dərsbaşı, aylıq və paket ödəniş, qiymət düsturu, buraxılan və əvəz dərslər, endirimlər, qiyməti qaldırmaq üçün şablon. Ödənişləri Kursometr-də izləyin.',
                'meta_description_en' => 'Tutor lesson pricing: per lesson, monthly and package fees, a pricing formula, missed and make-up lessons, discounts and a price-rise template. Track payments in Kursometr.',
                'meta_description_ru' => 'Цена урока репетитора: поурочно, помесячно и пакетами, формула расчёта, пропуски и отработки, скидки и шаблон о повышении цены. Учёт оплат в Kursometr.',

                'meta_keywords_az' => 'repetitor dərs haqqı, repetitor qiyməti, dərs paketi, aylıq ödəniş, buraxılan dərs, əvəz dərs, endirim, ödəniş izləmə, kursometr, 2027',
                'meta_keywords_en' => 'tutor lesson price, tutoring rates, lesson packages, monthly fee, missed lessons, make-up lessons, discounts, payment tracking, kursometr, 2027',
                'meta_keywords_ru' => 'цена урока репетитора, стоимость занятий, пакет уроков, помесячная оплата, пропуск урока, отработка, скидки, учёт оплат, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
