<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #77 — Kurs mərkəzi necə açılır: 2027 üçün addım-addım praktik bələdçi (niş, format, hüquqi forma, müəllimlər, qiymət, xərclər, marketinq, sistem, ilk 90 gün).
 * Hüquqi hissə ümumidir: qeydiyyat, lisenziya/icazə və vergi barədə konkret iddia YOXDUR — vergi xidməti və hüquqşünasla dəqiqləşdirmə tövsiyə olunur,
 * AFFIDACONS yazılarına (FS və MMC qeydiyyatı) xarici link verilir. Təhsil fəaliyyəti üçün lisenziya tələbi yoxlanılmayıb → "icazə tələb oluna bilər".
 * Bazar qiymətləri və statistika VERİLMİR; kurs qiyməti #73-dəki kimi düsturla, xərclər kateqoriya kimi. Yeganə AZN rəqəmləri RS Code-un sayt
 * qiymət aralıqlarıdır (#75 ilə eyni: landing 300–700, vizit kartı 500–1 200, korporativ 1 200–3 500 AZN, təxmini).
 * Kursometr faktları yalnız #75/#76 ilə eynidir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət, vaxtlı sınaqlar (təyin olunan saatda
 * açılıb-bağlanır, qapalı suallar avtomatik), PDF test toplusu → sual bazası, ev tapşırığı, ödəniş izləmə, valideyn kabineti (davamiyyət, qiymətlər,
 * sınaq nəticələri), mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar, telefon brauzeri, Google ilə giriş, pulsuz müəllim qeydiyyatı.
 * SMS/bildiriş, onlayn ödəniş, kurs kataloqu, Kursometr qiyməti İDDİA EDİLMİR. Çox filiallı / fərdi sistem → /elaqe.
 */
class Blog77OpenCourseCentreSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Bir çox kurs mərkəzi eyni cür yaranır: güclü müəllimin şagirdləri çoxalır, evdəki otaq kiçik gəlir, dostlar "öz kursunu aç" deyir. Sonra məlum olur ki, yaxşı dərs demək kurs mərkəzini idarə etməklə eyni şey deyil. Otaq kirayəsi, müəllimlərin maaşı, qrupların cədvəli, valideynlərin sualları, ödənişlər, reklam, sənədlər — bunların hamısı birdən ortaya çıxır. Planı olmayan mərkəz ilk aylarda ya pulunu, ya da enerjisini xərcləyib tükənir.</p>
<p>Bu yazı 2027-ci ildə Azərbaycanda kurs mərkəzi açmaq istəyən müəllimlər, repetitorlar və sahibkarlar üçün addım-addım praktik bələdçidir: niş və auditoriya seçimi, məkan və ya onlayn format, hüquqi forma barədə ümumi məlumat, müəllimlər və onların ödəniş modelləri, kurs qiymətinin hesablanması, ilk ilin xərc kateqoriyaları, marketinq və ilk gündən idarəetmə sistemi. Sonda ilk 90 gün üçün yoxlama siyahısı var. Qruplar, davamiyyət, sınaqlar və ödənişlər üçün nümunə kimi RS Code-un <a href="/mehsullar/kursometr">Kursometr</a> platformasından danışırıq.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Addım</th><th>Əsas qərar</th></tr>
  </thead>
  <tbody>
    <tr><td>1. Niş</td><td>Kimə dərs deyəcəksiniz: abituriyent və məktəblilər, dil öyrənənlər, IT, yoxsa uşaqlar — hamıya birdən yox</td></tr>
    <tr><td>2. Format</td><td>Öz məkanı, onlayn, yoxsa hibrid — nişə və büdcəyə görə; çox vaxt kiçik başlamaq daha təhlükəsizdir</td></tr>
    <tr><td>3. Hüquqi forma</td><td>Fərdi sahibkar və ya MMC; qeydiyyat, icazə və vergi məsələlərini vergi xidməti və hüquqşünasla dəqiqləşdirin</td></tr>
    <tr><td>4. Müəllimlər</td><td>Sabit maaş, dərsbaşı və ya gəlirdən faiz — modeli yazılı razılaşdırın</td></tr>
    <tr><td>5. Qiymət və xərclər</td><td>Qiyməti düsturla hesablayın: xərclər + hədəf gəlir ÷ real şagird sayı; ilk ilin xərclərini kateqoriyalar üzrə planlayın</td></tr>
    <tr><td>6. Marketinq</td><td>Sayt + Google Business Profile + Instagram; müraciətlərə tez cavab</td></tr>
    <tr><td>7. Sistem</td><td>İlk gündən qruplar, cədvəl, davamiyyət, sınaqlar, ödəniş və valideyn kabineti bir yerdə — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Niş və Auditoriya: Kimə Dərs Deyəcəksiniz?</h2>
<p>Yeni kurs mərkəzinin ən çox etdiyi səhv "hər şeyi öyrədirik" yanaşmasıdır: riyaziyyat, ingilis dili, proqramlaşdırma, rəsm və məktəbəqədər hazırlıq eyni lövhədə. Bu, reklamı bahalaşdırır, müəllim tapmağı çətinləşdirir və valideynə aydın mesaj vermir. Başlanğıcda bir və ya iki istiqamət seçin, orada tanının, sonra genişlənin.</p>
<table>
  <thead>
    <tr><th>Niş</th><th>Auditoriya</th><th>Nəyə diqqət etmək lazımdır</th><th>İdarəetmədə əsas ehtiyac</th></tr>
  </thead>
  <tbody>
    <tr><td>İmtahana hazırlıq</td><td>Abituriyentlər, buraxılış və magistratura imtahanına hazırlaşanlar</td><td>Mövsümilik, nəticəyə görə seçim, valideynin yüksək gözləntisi</td><td>Müntəzəm sınaqlar, nəticə analizi, valideyn hesabatı</td></tr>
    <tr><td>Xarici dillər</td><td>Məktəblilər, tələbələr, işləyən böyüklər</td><td>Səviyyə testi, səviyyəyə görə qruplar, axşam və həftəsonu cədvəli</td><td>Səviyyələr üzrə qruplar, ev tapşırığı, davamiyyət</td></tr>
    <tr><td>IT kursları</td><td>Yeniyetmələr, karyerasını dəyişmək istəyən böyüklər</td><td>Kompüter və proqram təminatı, praktik layihələr, müəllimin real təcrübəsi</td><td>Materialların paylaşılması, tapşırıqlar, onlayn dərslər</td></tr>
    <tr><td>Uşaq kursları</td><td>Məktəbəqədər və ibtidai sinif uşaqları</td><td>Təhlükəsiz məkan, kiçik qruplar, valideynlə sıx ünsiyyət</td><td>Valideynin davamiyyəti və irəliləyişi görməsi</td></tr>
  </tbody>
</table>
<p>Nişi seçərkən özünüzə üç sual verin: güclü müəllimləriniz hansı sahədədir, ətrafınızda bu xidmətə tələbat varmı (rəqiblər, valideyn söhbətləri, Google axtarışları) və bu auditoriya hansı vaxtda dərsə gələ bilər? Hər nişin öz idarəetmə xüsusiyyətləri var — ətraflı: <a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a> və <a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">dil kursu üçün idarəetmə proqramı</a>.</p>

<h2>2. Məkan, Onlayn, yoxsa Hibrid?</h2>
<p>Kurs mərkəzi açmaq mütləq böyük ofis kirayələmək demək deyil. Üç əsas variant var:</p>
<ul>
  <li><strong>Öz məkanı</strong> — valideyn üçün ən etibarlı görünüş, uşaq kursları və imtahan hazırlığı üçün çox vaxt vacibdir. Məkan seçərkən nəqliyyat (metro, dayanacaq), məktəblərə yaxınlıq, otaqların sayı və ölçüsü, işıq, havalandırma, təhlükəsizlik və səs izolyasiyası nəzərə alınmalıdır. Kirayə müqaviləsinin müddətini və şərtlərini diqqətlə oxuyun.</li>
  <li><strong>Onlayn</strong> — başlanğıc xərcləri ən aşağıdır, coğrafiya məhdud deyil. Amma güclü rəqabət var, şagirdin diqqətini saxlamaq çətindir və intizam, davamiyyət, ev tapşırığı daha ciddi izlənməlidir. Necə qurulduğu barədə: <a href="/blog-details/onlayn-ders-nece-teskil-olunur-2027">onlayn dərsi necə təşkil etmək olar</a>.</li>
  <li><strong>Hibrid</strong> — əsas dərslər əyani, əlavə dərslər, məsləhətlər və ya bəzi qruplar onlayn. Bir çox yeni mərkəz üçün ən çevik variant: kiçik məkanla başlayır, yükü onlayn qruplarla artırırsınız.</li>
</ul>
<p>Praktik məsləhət: ilk ildə bütün otaqları dolduracağınızı fərz etməyin. Bir-iki otaqla başlayıb cədvəli səhər, axşam və həftəsonu növbələri ilə doldurmaq daha təhlükəsizdir. Məkanı ancaq qruplar real dolduqca böyüdün.</p>

<h2>3. Hüquqi Forma: Fərdi Sahibkar, yoxsa MMC?</h2>
<p>Bu bölmə ümumi məlumat xarakteri daşıyır və hüquqi məsləhət deyil. Qeydiyyat qaydaları, vergi rejimləri və tələblər dəyişə bilər, ona görə də qərar verməzdən əvvəl <strong>Dövlət Vergi Xidməti və hüquqşünasla dəqiqləşdirin</strong>.</p>
<ul>
  <li><strong>Fərdi sahibkar</strong> — fəaliyyətə adətən daha sadə və sürətli başlamaq imkanı verir. Tək müəllim və ya kiçik mərkəz üçün çox vaxt ilk seçim olur. Ümumi qayda olaraq fərdi sahibkar öhdəliklərə görə şəxsən cavabdehdir. Ətraflı: <a href="https://affidacons.com/bloq/ferdi-sahibkar-qeydiyyati-azerbaycanda-voen-vergi-rejimleri-sosial-sigorta-2026" rel="noopener" target="_blank">fərdi sahibkar qeydiyyatı: VÖEN, vergi rejimləri, sosial sığorta</a>.</li>
  <li><strong>MMC (məhdud məsuliyyətli cəmiyyət)</strong> — hüquqi şəxsdir. Bir neçə təsisçi olduqda, investisiya cəlb edildikdə və ya mərkəz böyüdükdə daha uyğun ola bilər. Mühasibat və hesabat işi adətən daha çoxdur. Ətraflı: <a href="https://affidacons.com/bloq/azerbaycanda-huquqi-sexsin-yaradilmasi-mmc-qeydiyyat-kapital" rel="noopener" target="_blank">Azərbaycanda hüquqi şəxsin yaradılması: MMC, qeydiyyat, kapital</a>.</li>
</ul>
<p>Hüquqi formadan başqa dəqiqləşdirməli olduğunuz məsələlər:</p>
<ul>
  <li><strong>İcazə və lisenziya</strong> — təhsil xidmətlərinin növündən asılı olaraq fəaliyyətə icazə tələb oluna bilər; bunu rəsmi qurumla dəqiqləşdirin.</li>
  <li><strong>Vergi rejimi</strong> — hansı rejimin tətbiq olunduğu dövriyyədən, fəaliyyət növündən və digər şərtlərdən asılıdır.</li>
  <li><strong>Müəllimlərlə müqavilə</strong> — əmək müqaviləsi, yoxsa başqa müqavilə forması; bu, vergi və sosial sığorta öhdəliklərinə təsir edir.</li>
  <li><strong>Valideynlə müqavilə</strong> — ödəniş qaydaları, buraxılan dərs, geri qaytarma və şəxsi məlumatların istifadəsi yazılı olmalıdır.</li>
  <li><strong>Kirayə müqaviləsi</strong> — məkanın təhsil fəaliyyəti üçün istifadəsinə icazə verilməsi.</li>
</ul>

<h2>4. Müəllimlər və Ödəniş Modelləri</h2>
<p>Kurs mərkəzini müəllimlər satır: valideyn çox vaxt mərkəzi deyil, konkret müəllimi seçir. Müəllim seçərkən yalnız bilik deyil, izah etmə bacarığı, intizam, valideynlə ünsiyyət və sistemlə işləmək istəyi də yoxlanılmalıdır. Sınaq dərsi keçirmək ən yaxşı yoxlamadır.</p>
<table>
  <thead>
    <tr><th>Ödəniş modeli</th><th>Üstünlüyü</th><th>Riski</th><th>Nə vaxt uyğundur</th></tr>
  </thead>
  <tbody>
    <tr><td>Sabit aylıq maaş</td><td>Müəllim üçün sabitlik, mərkəzə bağlılıq</td><td>Qruplar dolmasa, xərc yenə qalır</td><td>Yükü sabit olan əsas müəllimlər</td></tr>
    <tr><td>Dərsbaşı (saatlıq) ödəniş</td><td>Xərc keçirilən dərslərə uyğundur</td><td>Müəllim bir neçə yerdə işləyir, bağlılıq zəifdir</td><td>Başlanğıc mərhələ, əlavə və ya mövsümi qruplar</td></tr>
    <tr><td>Qrup gəlirindən faiz</td><td>Müəllim qrupun dolmasında və şagirdin qalmasında maraqlıdır</td><td>Gəlir dəyişkəndir, hesablama şəffaf olmalıdır</td><td>Güclü, öz şagirdlərini gətirən müəllimlər</td></tr>
    <tr><td>Qarışıq (baza + faiz)</td><td>Sabitlik və motivasiya birlikdə</td><td>Hesablaması daha mürəkkəbdir</td><td>Mərkəz böyüdükcə</td></tr>
  </tbody>
</table>
<p>Hansı modeli seçsəniz də, şərtləri yazılı razılaşdırın: dərsin müddəti, ləğv edilən dərs, əvəzetmə, şagird sayı az olduqda nə baş verir, davamiyyət və qiymətləri kim qeyd edir. Faiz modelində ödənişlərin şəffaf izlənməsi xüsusilə vacibdir — müəllim hesablamanın nəyə əsaslandığını görməlidir. Köməkçi müəllim və ya assistent işləyirsə, ona ayrıca hesab verin (Kursometr-də bunun üçün mentor hesabı var).</p>

<h2>5. Kurs Qiyməti və İlk İlin Xərcləri</h2>
<h3>Qiyməti necə hesablamalı</h3>
<p>Qiyməti "qonşu kurs neçəyə satır" sualı ilə yox, öz rəqəmlərinizlə hesablayın. Sadə düstur belədir:</p>
<p><strong>Bir şagirdin aylıq minimum qiyməti = (qrupun aylıq xərcləri + hədəf gəlir) ÷ qrupda real ödəyən şagird sayı</strong></p>
<p><em>Nümunə (şərti rəqəmlərlə, real bazar qiyməti deyil):</em> tutaq ki, bir qrupun aylıq xərcləri — müəllim ödənişi, otağın bu qrupa düşən payı, materiallar, reklam və idarəetmə payı — X manatdır, mərkəz bu qrupdan Y manat gəlir gözləyir. Qrupda 10 yer var, amma ilk aylarda real olaraq 7 şagirdin ödəyəcəyini fərz etmək daha ehtiyatlıdır. Onda minimum qiymət (X + Y) ÷ 7 olur. Rəqəmləri öz vəziyyətinizə görə yerinə qoyun.</p>
<p>Bu hesablamada üç vacib məqam var: qrupu tam dolu fərz etməyin, boş qalan aylar (yay, bayramlar) üçün ehtiyat saxlayın və fərdi dərslərin qrupdan fərqli hesablandığını unutmayın. Ödəniş modelləri (aylıq, paket, dərsbaşı) və endirim qaydaları barədə ətraflı: <a href="/blog-details/repetitor-ders-haqqi-nece-teyin-olunur-2027">repetitor dərs haqqını necə müəyyənləşdirsin</a>.</p>
<h3>İlk ilin xərc kateqoriyaları</h3>
<p>Rəqəmlər şəhərə, məkana və nişə görə çox fərqlənir, ona görə də burada məbləğ yox, kateqoriyalar veririk. Hər birini öz təklifləriniz əsasında doldurun:</p>
<table>
  <thead>
    <tr><th>Kateqoriya</th><th>Nəyə daxildir</th><th>Qeyd</th></tr>
  </thead>
  <tbody>
    <tr><td>Qeydiyyat və hüquqi xərclər</td><td>Qeydiyyat, müqavilələr, hüquqşünas və mühasib xidməti</td><td>Mühasibat xərci aylıq davam edir</td></tr>
    <tr><td>Məkan</td><td>Kirayə, depozit, kommunal xərclər, təmir</td><td>Ən böyük sabit xərc; müqavilə müddətinə diqqət</td></tr>
    <tr><td>Avadanlıq və mebel</td><td>Masa-stul, lövhə, proyektor, kompüterlər (IT üçün), printer</td><td>Bir dəfəlik, amma IT kurslarında yüksək ola bilər</td></tr>
    <tr><td>Müəllim ödənişləri</td><td>Maaş, dərsbaşı və ya faiz, vergi və sosial sığorta öhdəlikləri</td><td>Əsas dəyişkən xərc</td></tr>
    <tr><td>Tədris materialları</td><td>Kitablar, çap, test topluları, lisenziyalı proqramlar</td><td>Nişə görə dəyişir</td></tr>
    <tr><td>Sayt və brend</td><td>Loqo, sayt, domen, hostinq</td><td>RS Code-da: landing 300–700, vizit kartı sayt 500–1 200, kurs səhifələri olan korporativ sayt 1 200–3 500 AZN (təxmini)</td></tr>
    <tr><td>Reklam</td><td>Instagram və Google reklamı, çap materialları, açılış tədbiri</td><td>İlk aylarda daha çox lazım olur</td></tr>
    <tr><td>İdarəetmə sistemi</td><td>Qruplar, cədvəl, davamiyyət, sınaqlar, ödəniş izləmə</td><td>Excel-dən başlamaq ucuz görünür, amma vaxt aparır</td></tr>
    <tr><td>Ehtiyat fondu</td><td>Gözlənilməz xərclər və gəlirin az olduğu aylar</td><td>Bir neçə aylıq sabit xərci qarşılamalıdır</td></tr>
  </tbody>
</table>

<h2>6. Marketinq: Sayt, Google Business Profile və Instagram</h2>
<p>Valideyn kurs axtaranda əvvəlcə tanışlardan soruşur, sonra Google-a yazır, xəritəyə və Instagram səhifəsinə baxır. Yeni mərkəz üçün üç kanal birlikdə işləməlidir:</p>
<ul>
  <li><strong>Sayt</strong> — hər kurs üçün ayrıca səhifə (proqram, müddət, cədvəl, qiymət və ya "əlaqə saxlayın", müəllim), müəllim profilləri, ünvan və xəritə, qısa qeydiyyat / sınaq dərsi forması və WhatsApp düyməsi. Sayt "hansı kurs, harada, nə vaxt, necə yazılım" suallarına cavab verməlidir. Ətraflı: <a href="/blog-details/kurs-merkezi-ucun-sayt-ve-seo-2027">kurs mərkəzi üçün sayt və yerli SEO</a>. Sayt hazırlatmaq istəyirsinizsə: <a href="/veb-saytlarin-hazirlanmasi">veb saytların hazırlanması</a>.</li>
  <li><strong>Google Business Profile</strong> — "yaxınlıqda ingilis dili kursu" kimi axtarışlarda xəritədə görünmək üçün. Ad, ünvan və telefon saytda, Google-da və Instagram-da eyni yazılmalıdır. İlk tələbələrdən və valideynlərdən rəy istəyin.</li>
  <li><strong>Instagram</strong> — mərkəzin gündəlik həyatı: dərslərdən görüntülər (yalnız icazə ilə), müəllimlərin qısa videoları, faydalı məsləhətlər, qəbul elanları. Instagram etibar yaradır, amma Google axtarışını əvəz etmir.</li>
</ul>
<p>Açılışdan əvvəl pulsuz sınaq dərsi, səviyyə testi və ya açıq dərs təşkil etmək ilk qrupları toplamağın sadə yoludur. Ən vacibi isə müraciətlərə tez cavab verməkdir: valideyn adətən bir neçə kursa eyni anda yazır və ilk cavab verən üstünlük qazanır. Hər müraciətin mənbəyini (Google, xəritə, Instagram, tövsiyə) qeyd edin ki, hansı kanalın işlədiyini biləsiniz.</p>

<h2>7. İlk Gündən İdarəetmə Sistemi</h2>
<p>Bir çox mərkəz dəftər, Excel və WhatsApp qrupları ilə başlayır və sistemi "böyüyəndə" qurmağı planlaşdırır. Problem budur ki, böyüyəndə köhnə qeydləri köçürmək, müəllimlərə yeni qaydalar öyrətmək və valideynləri yeni üsula alışdırmaq daha çətin olur. Sistemi ilk qrupdan qurmaq daha asandır. Kurs mərkəzinə lazım olan əsas funksiyalar:</p>
<table>
  <thead>
    <tr><th>Ehtiyac</th><th>Niyə ilk gündən</th><th>Kursometr-də</th></tr>
  </thead>
  <tbody>
    <tr><td>Qruplar və həftəlik cədvəl</td><td>Hər dərsin tarixi bəlli olur, otaq və müəllim yükü planlanır</td><td>Fənlər, qruplar, həftəlik cədvəl</td></tr>
    <tr><td>Davamiyyət</td><td>Buraxılan dərslər vaxtında görünür, ödəniş mübahisələri azalır</td><td>Hər dərsdə davamiyyət qeydi, telefon brauzerindən</td></tr>
    <tr><td>Sınaqlar</td><td>Şagirdin irəliləyişi ölçülür, valideynə nəticə göstərilir</td><td>Təyin olunan saatda açılıb-bağlanan vaxtlı sınaqlar, qapalı suallar avtomatik yoxlanır; PDF test toplusu sual bazasına əlavə olunur</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Dərsdən kənar iş izlənir</td><td>Ev tapşırığı vermək və izləmək</td></tr>
    <tr><td>Ödənişlər</td><td>Kimin ödədiyi və kimin borcu olduğu bir yerdə görünür</td><td>Tələbə ödənişlərinin izlənməsi</td></tr>
    <tr><td>Valideyn kabineti</td><td>Valideyn soruşmadan görür, etibar artır</td><td>Davamiyyət, qiymətlər və sınaq nəticələri</td></tr>
    <tr><td>Müəllim və assistentlər</td><td>Hər kəs öz qrupları ilə işləyir</td><td>Mentor (köməkçi müəllim) hesabları</td></tr>
    <tr><td>Materiallar</td><td>Buraxılan dərsin materialı itmir</td><td>Dərs yazıları və materiallar yalnız həmin qrupa görünür</td></tr>
  </tbody>
</table>
<p><a href="/mehsullar/kursometr">Kursometr</a>-də müəllim öz səhifəsini (<em>adiniz.kursometr.com</em>) açır, fənləri və qrupları yaradır, həftəlik cədvəli qurur və işə başlayır. Platforma telefon brauzerində işləyir, Google hesabı ilə daxil olmaq mümkündür, müəllim qeydiyyatı pulsuzdur. Davamiyyətin necə qurulduğu barədə ətraflı: <a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">elektron davamiyyət uçotu</a>. Bir neçə filial, mərkəzi hesabat və ya öz iş qaydalarınız üçün fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>

<h2>8. İlk 90 Gün: Yoxlama Siyahısı</h2>
<h3>1–30-cu günlər: hazırlıq</h3>
<ul>
  <li>☐ Niş və ilk 1–2 istiqamət seçilib, hədəf auditoriya yazılıb</li>
  <li>☐ Format qərarı verilib: məkan, onlayn və ya hibrid</li>
  <li>☐ Hüquqi forma, icazə və vergi məsələləri vergi xidməti və hüquqşünasla dəqiqləşdirilib</li>
  <li>☐ Məkan seçilib, kirayə müqaviləsi yoxlanılıb</li>
  <li>☐ İlk müəllimlər sınaq dərsi ilə seçilib, ödəniş modeli yazılı razılaşdırılıb</li>
  <li>☐ Kurs qiyməti düsturla hesablanıb, ilk ilin xərcləri kateqoriyalar üzrə planlanıb</li>
</ul>
<h3>31–60-cı günlər: açılış</h3>
<ul>
  <li>☐ Sayt, Google Business Profile və Instagram hazırdır, ad/ünvan/telefon hər yerdə eynidir</li>
  <li>☐ Qeydiyyat forması, WhatsApp düyməsi və müraciətlərə tez cavab qaydası var</li>
  <li>☐ Valideyn müqaviləsi və ödəniş, buraxılan dərs, geri qaytarma qaydaları yazılıdır</li>
  <li>☐ İdarəetmə sistemində fənlər, qruplar və həftəlik cədvəl qurulub</li>
  <li>☐ Sınaq dərsləri, səviyyə testi və ya açıq dərs keçirilib, ilk qruplar toplanıb</li>
  <li>☐ Valideynlər kabinetə qoşulub və ona necə baxacaqları göstərilib</li>
</ul>
<h3>61–90-cı günlər: nizam və təhlil</h3>
<ul>
  <li>☐ Davamiyyət hər dərsdə qeyd olunur, ardıcıl buraxılan dərslərə reaksiya verilir</li>
  <li>☐ İlk sınaqlar keçirilib, nəticələr valideynlə bölüşülüb</li>
  <li>☐ Ödənişlər bir yerdə izlənir, gecikən ödənişlər vaxtında görünür</li>
  <li>☐ Hər müraciətin mənbəyi təhlil edilib, reklam büdcəsi işləyən kanala yönəldilib</li>
  <li>☐ Qrupların doluluğu və real gəlir hesablamadakı rəqəmlərlə müqayisə edilib</li>
  <li>☐ İlk valideyn və tələbələrdən rəy alınıb</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs mərkəzi açmaq üçün nədən başlamaq lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Niş və auditoriya seçimindən: kimə dərs deyəcəyinizi, hansı istiqamətdə güclü müəllimləriniz olduğunu və bu xidmətə ətrafınızda tələbat olub-olmadığını müəyyənləşdirin. Sonra format (məkan, onlayn və ya hibrid), hüquqi forma, müəllimlər, qiymət və xərclər planlanır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs mərkəzi fərdi sahibkar kimi, yoxsa MMC kimi açılmalıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tək müəllim və ya kiçik mərkəz üçün fərdi sahibkarlıq adətən daha sadə başlanğıcdır; bir neçə təsisçi olduqda və ya mərkəz böyüdükdə MMC daha uyğun ola bilər. Qeydiyyat qaydaları, vergi rejimi və digər tələblər fərqləndiyi üçün qərarı Dövlət Vergi Xidməti və hüquqşünasla dəqiqləşdirin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs mərkəzi üçün lisenziya lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Təhsil xidmətlərinin növündən asılı olaraq fəaliyyətə icazə tələb oluna bilər. Bu məsələni fəaliyyətə başlamazdan əvvəl rəsmi qurumla və hüquqşünasla dəqiqləşdirin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs qiymətini necə müəyyənləşdirmək olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sadə düsturla: qrupun aylıq xərclərini (müəllim, otaq payı, materiallar, reklam, idarəetmə) və hədəf gəliri toplayın, nəticəni qrupda real ödəyən şagird sayına bölün. Qrupu tam dolu fərz etməyin və boş keçən aylar üçün ehtiyat saxlayın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Müəllimlərə necə ödəniş etmək daha yaxşıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Əsas modellər sabit aylıq maaş, dərsbaşı ödəniş, qrup gəlirindən faiz və onların qarışığıdır. Başlanğıcda dərsbaşı və ya faiz modeli riski azaldır, mərkəz böyüdükcə baza + faiz modeli sabitlik və motivasiyanı birləşdirir. Hansı model seçilsə də, şərtlər yazılı razılaşdırılmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr yeni kurs mərkəzinə necə kömək edir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr-də müəllim öz səhifəsini (adiniz.kursometr.com) açır, fənləri, qrupları və həftəlik cədvəli qurur, davamiyyəti qeyd edir, vaxtlı sınaqlar və ev tapşırıqları verir, ödənişləri izləyir. Valideyn kabinetində davamiyyət, qiymətlər və sınaq nəticələri görünür. Platforma telefon brauzerində işləyir, Google ilə giriş var və müəllim qeydiyyatı pulsuzdur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/kurs-merkezi-ucun-sayt-ve-seo-2027">Kurs mərkəzi üçün sayt və Google-da görünmək</a></li>
  <li><a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">Elektron davamiyyət uçotu</a></li>
  <li><a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">Abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a></li>
  <li><a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">Dil kursu üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/repetitor-ders-haqqi-nece-teyin-olunur-2027">Repetitor dərs haqqını necə müəyyənləşdirsin</a></li>
  <li><a href="/blog-details/usaq-inkisaf-merkezi-ucun-idareetme-proqrami-2027">Uşaq inkişaf mərkəzi üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/kurs-merkezine-telebe-celb-etmek-ve-saxlamaq-2027">Kurs mərkəzinə tələbə necə cəlb olunur və saxlanılır</a></li>
</ul>

<h2>Nəticə</h2>
<p>Kurs mərkəzi açmaq yaxşı müəllim olmaqdan daha çox şey tələb edir, amma ardıcıllıqla getdikdə mürəkkəb deyil. Bir nişlə başlayın, formatı büdcəyə uyğun seçin, hüquqi məsələləri mütəxəssislə dəqiqləşdirin, müəllimlərlə şərtləri yazılı razılaşdırın, qiyməti düsturla hesablayın, xərcləri kateqoriyalar üzrə planlayın və sayt, Google Business Profile, Instagram ilə görünün. Qruplar, davamiyyət, sınaqlar, ödənişlər və valideyn hesabatı üçün sistemi isə ilk qrupdan qurun — sonradan köçürmək həmişə daha çətindir.</p>
<p><strong>Kurs mərkəzinizi ilk gündən nizamlı idarə etmək istəyirsiniz? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong> — müəllim qeydiyyatı pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Mərkəziniz üçün sayt və ya çox filiallı fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır və hüquqi, vergi və ya maliyyə məsləhəti deyil. Qeydiyyat, icazə və vergi tələblərini Dövlət Vergi Xidməti, aidiyyəti qurumlar və hüquqşünasla dəqiqləşdirin. Qiymət nümunəsi şərti rəqəmlərlədir; sayt qiymətləri RS Code üzrə təxminidir. Kursometr funksiyaları noyabr 2026 vəziyyətinə görə təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>Many course centres start the same way: a strong teacher's student list keeps growing, the room at home becomes too small, and friends say "open your own centre". Then it turns out that teaching well and running a course centre are not the same thing. Rent, teacher pay, group timetables, parents' questions, payments, advertising, paperwork — it all arrives at once. A centre without a plan burns through either its money or its energy in the first few months.</p>
<p>This article is a practical step-by-step guide for teachers, tutors and entrepreneurs who want to open a course centre in Azerbaijan in 2027: choosing a niche and audience, premises or online, general information on the legal form, teachers and their pay models, calculating the course price, first-year cost categories, marketing and a management system from day one. A checklist for the first 90 days is at the end. For groups, attendance, tests and payments we use RS Code's <a href="/mehsullar/kursometr">Kursometr</a> platform as an example.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Step</th><th>Key decision</th></tr>
  </thead>
  <tbody>
    <tr><td>1. Niche</td><td>Who you will teach: university applicants and school students, language learners, IT, or children — not everyone at once</td></tr>
    <tr><td>2. Format</td><td>Your own premises, online or hybrid — depending on the niche and budget; starting small is usually safer</td></tr>
    <tr><td>3. Legal form</td><td>Sole proprietor or LLC; confirm registration, permits and tax with the tax service and a lawyer</td></tr>
    <tr><td>4. Teachers</td><td>Fixed salary, per lesson or a share of revenue — agree the model in writing</td></tr>
    <tr><td>5. Price and costs</td><td>Calculate the price with a formula: costs + target income ÷ real number of students; plan first-year costs by category</td></tr>
    <tr><td>6. Marketing</td><td>Website + Google Business Profile + Instagram; fast replies to enquiries</td></tr>
    <tr><td>7. System</td><td>Groups, timetable, attendance, tests, payments and a parent portal in one place from day one — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Niche and Audience: Who Will You Teach?</h2>
<p>The most common mistake of a new course centre is the "we teach everything" approach: maths, English, coding, art and pre-school preparation on the same sign. This makes advertising more expensive, teachers harder to find and the message to parents unclear. Start with one or two directions, become known for them, then expand.</p>
<table>
  <thead>
    <tr><th>Niche</th><th>Audience</th><th>What to watch out for</th><th>Key management need</th></tr>
  </thead>
  <tbody>
    <tr><td>Exam preparation</td><td>University applicants, students preparing for school-leaving and master's entrance exams</td><td>Seasonality, choice based on results, high parental expectations</td><td>Regular mock tests, results analysis, parent reports</td></tr>
    <tr><td>Foreign languages</td><td>School students, university students, working adults</td><td>Placement tests, groups by level, evening and weekend schedules</td><td>Groups by level, homework, attendance</td></tr>
    <tr><td>IT courses</td><td>Teenagers, adults changing careers</td><td>Computers and software, practical projects, the teacher's real-world experience</td><td>Sharing materials, assignments, online lessons</td></tr>
    <tr><td>Children's courses</td><td>Pre-school and primary school children</td><td>A safe space, small groups, close contact with parents</td><td>Parents seeing attendance and progress</td></tr>
  </tbody>
</table>
<p>When choosing a niche, ask yourself three questions: in which area are your strongest teachers, is there demand for this service around you (competitors, conversations with parents, Google searches), and at what times can this audience attend? Each niche has its own management specifics — more in <a href="/blog-details/exam-prep-course-centre-management-2027">how to run an exam prep course centre</a> and <a href="/blog-details/language-course-management-software-2027">language course management software</a>.</p>

<h2>2. Premises, Online or Hybrid?</h2>
<p>Opening a course centre does not have to mean renting a large office. There are three main options:</p>
<ul>
  <li><strong>Your own premises</strong> — the most trustworthy option in parents' eyes, and often essential for children's courses and exam preparation. When choosing a place, consider transport (metro, parking), proximity to schools, the number and size of rooms, light, ventilation, safety and sound insulation. Read the length and terms of the lease carefully.</li>
  <li><strong>Online</strong> — the lowest start-up costs and no geographical limits. But competition is strong, holding students' attention is harder, and discipline, attendance and homework need closer tracking. How to set it up: <a href="/blog-details/how-to-run-online-lessons-2027">how to run online lessons</a>.</li>
  <li><strong>Hybrid</strong> — main lessons in person, with extra lessons, consultations or some groups online. For many new centres this is the most flexible option: start with small premises and add load through online groups.</li>
</ul>
<p>Practical tip: do not assume you will fill every room in the first year. It is safer to start with one or two rooms and fill the timetable with morning, evening and weekend slots. Grow the premises only as groups actually fill up.</p>

<h2>3. Legal Form: Sole Proprietor or LLC?</h2>
<p>This section is general information, not legal advice. Registration rules, tax regimes and requirements can change, so <strong>confirm with the State Tax Service and a lawyer</strong> before you decide.</p>
<ul>
  <li><strong>Sole proprietor (individual entrepreneur)</strong> — usually lets you start operating more simply and quickly. It is often the first choice for a single teacher or a small centre. As a general rule, a sole proprietor is personally liable for obligations. More: <a href="https://affidacons.com/blog/individual-entrepreneur-registration-in-azerbaijan-tax-regimes-social-insurance-2026" rel="noopener" target="_blank">individual entrepreneur registration in Azerbaijan: tax regimes and social insurance</a>.</li>
  <li><strong>LLC (limited liability company)</strong> — a legal entity. It may be a better fit when there are several founders, when investment is involved or as the centre grows. Accounting and reporting are usually heavier. More: <a href="https://affidacons.com/blog/setting-up-a-legal-entity-in-azerbaijan-llc-registration-capital" rel="noopener" target="_blank">setting up a legal entity in Azerbaijan: LLC, registration, capital</a>.</li>
</ul>
<p>Besides the legal form, you need to clarify:</p>
<ul>
  <li><strong>Permits and licences</strong> — depending on the type of educational services, a permit may be required for the activity; confirm this with the relevant official body.</li>
  <li><strong>Tax regime</strong> — which regime applies depends on turnover, type of activity and other conditions.</li>
  <li><strong>Contracts with teachers</strong> — an employment contract or another form of contract; this affects tax and social insurance obligations.</li>
  <li><strong>Contracts with parents</strong> — payment rules, missed lessons, refunds and the use of personal data should be in writing.</li>
  <li><strong>The lease</strong> — permission to use the premises for educational activity.</li>
</ul>

<h2>4. Teachers and Pay Models</h2>
<p>Teachers sell a course centre: parents often choose a specific teacher rather than the centre. When hiring, check not only subject knowledge but also the ability to explain, discipline, communication with parents and willingness to work with a system. A trial lesson is the best test.</p>
<table>
  <thead>
    <tr><th>Pay model</th><th>Advantage</th><th>Risk</th><th>When it fits</th></tr>
  </thead>
  <tbody>
    <tr><td>Fixed monthly salary</td><td>Stability for the teacher, loyalty to the centre</td><td>The cost remains even if groups do not fill</td><td>Core teachers with a stable load</td></tr>
    <tr><td>Per lesson (hourly)</td><td>Cost matches the lessons actually taught</td><td>The teacher works in several places, weaker loyalty</td><td>Early stage, extra or seasonal groups</td></tr>
    <tr><td>Share of group revenue</td><td>The teacher is interested in filling the group and keeping students</td><td>Income varies; the calculation must be transparent</td><td>Strong teachers who bring their own students</td></tr>
    <tr><td>Mixed (base + share)</td><td>Stability and motivation together</td><td>More complex to calculate</td><td>As the centre grows</td></tr>
  </tbody>
</table>
<p>Whichever model you choose, agree the terms in writing: lesson length, cancelled lessons, cover, what happens if a group is too small, and who records attendance and grades. With a revenue-share model, transparent payment tracking is especially important — teachers should see what the calculation is based on. If an assistant teacher works with a group, give them a separate account (Kursometr has mentor accounts for this).</p>

<h2>5. Course Pricing and First-Year Costs</h2>
<h3>How to calculate the price</h3>
<p>Calculate the price from your own numbers, not from "what does the centre next door charge". A simple formula:</p>
<p><strong>Minimum monthly price per student = (the group's monthly costs + target income) ÷ the real number of paying students in the group</strong></p>
<p><em>Example (with placeholder figures, not real market prices):</em> say a group's monthly costs — teacher pay, the group's share of the room, materials, advertising and an admin share — are X manat, and the centre expects Y manat of income from this group. The group has 10 places, but it is more prudent to assume that only 7 students will actually pay in the first months. The minimum price is then (X + Y) ÷ 7. Plug in your own numbers.</p>
<p>Three points matter here: do not assume the group is full, keep a reserve for quiet months (summer, holidays), and remember that individual lessons are priced differently from groups. More on payment models (monthly, packages, per lesson) and discount rules: <a href="/blog-details/how-tutors-should-set-lesson-prices-2027">how tutors should set lesson prices</a>.</p>
<h3>First-year cost categories</h3>
<p>Figures vary a lot by city, premises and niche, so here we give categories rather than amounts. Fill each one in from your own quotes:</p>
<table>
  <thead>
    <tr><th>Category</th><th>What it includes</th><th>Note</th></tr>
  </thead>
  <tbody>
    <tr><td>Registration and legal costs</td><td>Registration, contracts, lawyer and accountant services</td><td>Accounting is an ongoing monthly cost</td></tr>
    <tr><td>Premises</td><td>Rent, deposit, utilities, renovation</td><td>The largest fixed cost; watch the lease term</td></tr>
    <tr><td>Equipment and furniture</td><td>Desks and chairs, whiteboard, projector, computers (for IT), printer</td><td>One-off, but can be high for IT courses</td></tr>
    <tr><td>Teacher pay</td><td>Salary, per-lesson pay or revenue share, tax and social insurance obligations</td><td>The main variable cost</td></tr>
    <tr><td>Teaching materials</td><td>Books, printing, test collections, licensed software</td><td>Varies by niche</td></tr>
    <tr><td>Website and brand</td><td>Logo, website, domain, hosting</td><td>At RS Code: landing page AZN 300–700, business card site AZN 500–1,200, corporate site with course pages AZN 1,200–3,500 (estimate)</td></tr>
    <tr><td>Advertising</td><td>Instagram and Google ads, printed materials, an opening event</td><td>Needed more in the first months</td></tr>
    <tr><td>Management system</td><td>Groups, timetable, attendance, tests, payment tracking</td><td>Starting with Excel looks cheap but costs time</td></tr>
    <tr><td>Reserve fund</td><td>Unexpected costs and low-income months</td><td>Should cover several months of fixed costs</td></tr>
  </tbody>
</table>

<h2>6. Marketing: Website, Google Business Profile and Instagram</h2>
<p>When parents look for a course, they first ask people they know, then type into Google, and look at the map and the Instagram page. For a new centre, three channels need to work together:</p>
<ul>
  <li><strong>Website</strong> — a separate page for each course (programme, duration, schedule, price or "contact us", teacher), teacher profiles, address and map, a short registration / trial lesson form and a WhatsApp button. The site should answer "which course, where, when, how do I sign up". More: <a href="/blog-details/course-centre-website-and-seo-2027">course centre website and local SEO</a>. If you want us to build one: <a href="/website-development">website development</a>.</li>
  <li><strong>Google Business Profile</strong> — to appear on the map for searches like "English course near me". The name, address and phone should be written the same way on the site, on Google and on Instagram. Ask your first students and parents for reviews.</li>
  <li><strong>Instagram</strong> — the day-to-day life of the centre: moments from lessons (only with permission), short teacher videos, useful tips, enrolment announcements. Instagram builds trust, but it does not replace Google search.</li>
</ul>
<p>Before opening, a free trial lesson, placement test or open lesson is a simple way to form the first groups. Most important of all is replying to enquiries quickly: parents usually contact several centres at once, and the first to reply has the edge. Record the source of every enquiry (Google, map, Instagram, referral) so you know which channel works.</p>

<h2>7. A Management System from Day One</h2>
<p>Many centres start with notebooks, Excel and WhatsApp groups and plan to set up a system "once we grow". The problem is that by then it is harder to move old records, teach teachers new rules and get parents used to a new way of working. It is easier to set up the system from the first group. The core functions a course centre needs:</p>
<table>
  <thead>
    <tr><th>Need</th><th>Why from day one</th><th>In Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Groups and weekly timetable</td><td>The date of every lesson is known; room and teacher load can be planned</td><td>Subjects, groups, a weekly timetable</td></tr>
    <tr><td>Attendance</td><td>Missed lessons are spotted in time; fewer payment disputes</td><td>Attendance marked at every lesson, from a phone browser</td></tr>
    <tr><td>Tests</td><td>Student progress is measured and results can be shown to parents</td><td>Timed tests that open and close at the set time, closed questions graded automatically; a PDF test collection is added to the question bank</td></tr>
    <tr><td>Homework</td><td>Work outside lessons is tracked</td><td>Setting and tracking homework</td></tr>
    <tr><td>Payments</td><td>Who has paid and who owes is visible in one place</td><td>Tracking student payments</td></tr>
    <tr><td>Parent portal</td><td>Parents see things without asking; trust grows</td><td>Attendance, grades and test results</td></tr>
    <tr><td>Teachers and assistants</td><td>Everyone works with their own groups</td><td>Mentor (assistant teacher) accounts</td></tr>
    <tr><td>Materials</td><td>Material from a missed lesson is not lost</td><td>Lesson recordings and materials visible only to that group</td></tr>
  </tbody>
</table>
<p>In <a href="/mehsullar/kursometr">Kursometr</a>, the teacher opens their own page (<em>yourname.kursometr.com</em>), creates subjects and groups, sets up the weekly timetable and gets started. The platform works in a phone browser, sign-in with a Google account is available, and teacher registration is free. More on setting up attendance: <a href="/blog-details/attendance-tracking-for-course-centres-2027">electronic attendance tracking</a>. If you need a custom system for several branches, central reporting or your own workflows, <a href="/contact">get in touch</a>.</p>

<h2>8. The First 90 Days: a Checklist</h2>
<h3>Days 1–30: preparation</h3>
<ul>
  <li>☐ A niche and the first 1–2 directions are chosen, and the target audience is written down</li>
  <li>☐ The format is decided: premises, online or hybrid</li>
  <li>☐ Legal form, permits and tax questions are confirmed with the tax service and a lawyer</li>
  <li>☐ Premises are chosen and the lease is checked</li>
  <li>☐ The first teachers are selected through trial lessons, and the pay model is agreed in writing</li>
  <li>☐ The course price is calculated with the formula, and first-year costs are planned by category</li>
</ul>
<h3>Days 31–60: opening</h3>
<ul>
  <li>☐ Website, Google Business Profile and Instagram are ready; name/address/phone are identical everywhere</li>
  <li>☐ There is a registration form, a WhatsApp button and a fast-reply rule for enquiries</li>
  <li>☐ The parent contract and rules on payments, missed lessons and refunds are in writing</li>
  <li>☐ Subjects, groups and the weekly timetable are set up in the management system</li>
  <li>☐ Trial lessons, placement tests or an open lesson are held, and the first groups are formed</li>
  <li>☐ Parents are connected to the portal and shown how to use it</li>
</ul>
<h3>Days 61–90: routine and review</h3>
<ul>
  <li>☐ Attendance is marked at every lesson, and repeated absences get a response</li>
  <li>☐ The first tests are held and results are shared with parents</li>
  <li>☐ Payments are tracked in one place, and late payments are visible in time</li>
  <li>☐ The source of every enquiry is reviewed, and the ad budget is moved to the channels that work</li>
  <li>☐ Group occupancy and real income are compared with the figures in your calculation</li>
  <li>☐ Feedback is collected from the first parents and students</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Where should you start when opening a course centre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">With the niche and audience: decide who you will teach, in which area you have strong teachers and whether there is demand for this service around you. Then plan the format (premises, online or hybrid), legal form, teachers, pricing and costs.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should a course centre be opened as a sole proprietor or an LLC?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">For a single teacher or a small centre, a sole proprietorship is usually the simpler start; with several founders or as the centre grows, an LLC may fit better. Because registration rules, tax regimes and other requirements differ, confirm the decision with the State Tax Service and a lawyer.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does a course centre need a licence?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Depending on the type of educational services, a permit may be required for the activity. Confirm this with the relevant official body and a lawyer before you start operating.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do you set the price of a course?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">With a simple formula: add up the group's monthly costs (teacher, room share, materials, advertising, admin) and your target income, then divide by the real number of paying students in the group. Do not assume the group is full, and keep a reserve for quiet months.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the best way to pay teachers?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The main models are a fixed monthly salary, per-lesson pay, a share of group revenue and a mix of these. At the start, per-lesson or revenue-share pay reduces risk; as the centre grows, a base-plus-share model combines stability and motivation. Whichever model you choose, agree the terms in writing.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How does Kursometr help a new course centre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In Kursometr, the teacher opens their own page (yourname.kursometr.com), sets up subjects, groups and a weekly timetable, marks attendance, sets timed tests and homework, and tracks payments. Parents see attendance, grades and test results in the parent portal. The platform works in a phone browser, supports sign-in with Google, and teacher registration is free.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/course-centre-website-and-seo-2027">Course centre website and Google visibility</a></li>
  <li><a href="/blog-details/attendance-tracking-for-course-centres-2027">Electronic attendance tracking</a></li>
  <li><a href="/blog-details/exam-prep-course-centre-management-2027">How to run an exam prep course centre</a></li>
  <li><a href="/blog-details/language-course-management-software-2027">Language course management software</a></li>
  <li><a href="/blog-details/how-tutors-should-set-lesson-prices-2027">How tutors should set lesson prices</a></li>
  <li><a href="/blog-details/management-software-for-kids-development-centres-2027">Management software for kids' development centres</a></li>
  <li><a href="/blog-details/how-to-attract-and-retain-students-course-centre-2027">How a course centre attracts and retains students</a></li>
</ul>

<h2>Conclusion</h2>
<p>Opening a course centre takes more than being a good teacher, but it is not complicated if you go step by step. Start with one niche, choose a format that fits your budget, clarify legal matters with a specialist, agree terms with teachers in writing, calculate the price with a formula, plan costs by category, and get visible with a website, Google Business Profile and Instagram. And set up the system for groups, attendance, tests, payments and parent reports from the very first group — moving later is always harder.</p>
<p><strong>Want to run your course centre in an orderly way from day one? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher registration is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. If your centre needs a website or a custom multi-branch system: <a href="/contact">get in touch</a>.</p>
<p><small><em>This article is general information and not legal, tax or financial advice. Confirm registration, permit and tax requirements with the State Tax Service, the relevant authorities and a lawyer. The pricing example uses placeholder figures; website prices are RS Code estimates. Kursometr features are described as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Многие учебные центры появляются одинаково: у сильного преподавателя становится всё больше учеников, комнаты дома уже не хватает, и друзья говорят: «Открой свои курсы». А потом выясняется, что хорошо преподавать и управлять учебным центром — не одно и то же. Аренда, зарплата преподавателей, расписание групп, вопросы родителей, оплаты, реклама, документы — всё это появляется одновременно. Центр без плана в первые месяцы растрачивает либо деньги, либо силы.</p>
<p>Эта статья — практическое пошаговое руководство для преподавателей, репетиторов и предпринимателей, которые хотят открыть учебный центр в Азербайджане в 2027 году: выбор ниши и аудитории, помещение или онлайн-формат, общая информация о правовой форме, преподаватели и модели их оплаты, расчёт цены курса, статьи расходов первого года, маркетинг и система управления с первого дня. В конце — чек-лист на первые 90 дней. Для групп, посещаемости, тестов и оплат в качестве примера используем платформу RS Code — <a href="/mehsullar/kursometr">Kursometr</a>.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Шаг</th><th>Главное решение</th></tr>
  </thead>
  <tbody>
    <tr><td>1. Ниша</td><td>Кого вы будете учить: абитуриентов и школьников, изучающих языки, IT или детей — не всех сразу</td></tr>
    <tr><td>2. Формат</td><td>Своё помещение, онлайн или гибрид — в зависимости от ниши и бюджета; начинать с малого обычно безопаснее</td></tr>
    <tr><td>3. Правовая форма</td><td>ИП (физическое лицо-предприниматель) или ООО; регистрацию, разрешения и налоги уточните в налоговой службе и у юриста</td></tr>
    <tr><td>4. Преподаватели</td><td>Фиксированная зарплата, оплата за занятие или процент от дохода — модель согласуйте письменно</td></tr>
    <tr><td>5. Цена и расходы</td><td>Цену считайте по формуле: расходы + целевой доход ÷ реальное число учеников; расходы первого года планируйте по статьям</td></tr>
    <tr><td>6. Маркетинг</td><td>Сайт + Google Business Profile + Instagram; быстрые ответы на заявки</td></tr>
    <tr><td>7. Система</td><td>Группы, расписание, посещаемость, тесты, оплаты и кабинет родителя в одном месте с первого дня — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Ниша и аудитория: кого вы будете учить?</h2>
<p>Самая частая ошибка нового учебного центра — подход «учим всему»: математика, английский, программирование, рисование и подготовка к школе на одной вывеске. Из-за этого реклама дорожает, преподавателей труднее найти, а родитель не получает ясного сообщения. Начните с одного-двух направлений, станьте известны в них, а потом расширяйтесь.</p>
<table>
  <thead>
    <tr><th>Ниша</th><th>Аудитория</th><th>На что обратить внимание</th><th>Главная потребность в управлении</th></tr>
  </thead>
  <tbody>
    <tr><td>Подготовка к экзаменам</td><td>Абитуриенты, готовящиеся к выпускным экзаменам и в магистратуру</td><td>Сезонность, выбор по результатам, высокие ожидания родителей</td><td>Регулярные пробные тесты, анализ результатов, отчёты родителям</td></tr>
    <tr><td>Иностранные языки</td><td>Школьники, студенты, работающие взрослые</td><td>Тест уровня, группы по уровням, вечернее и выходное расписание</td><td>Группы по уровням, домашние задания, посещаемость</td></tr>
    <tr><td>IT-курсы</td><td>Подростки, взрослые, меняющие профессию</td><td>Компьютеры и ПО, практические проекты, реальный опыт преподавателя</td><td>Обмен материалами, задания, онлайн-занятия</td></tr>
    <tr><td>Детские курсы</td><td>Дошкольники и младшие школьники</td><td>Безопасное помещение, маленькие группы, тесный контакт с родителями</td><td>Родитель видит посещаемость и прогресс</td></tr>
  </tbody>
</table>
<p>Выбирая нишу, задайте себе три вопроса: в какой области ваши самые сильные преподаватели, есть ли спрос на эту услугу рядом с вами (конкуренты, разговоры с родителями, поиск в Google) и в какое время эта аудитория может приходить на занятия? У каждой ниши свои особенности управления — подробнее: <a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">как управлять курсами подготовки к экзаменам</a> и <a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">программа для языковых курсов</a>.</p>

<h2>2. Помещение, онлайн или гибрид?</h2>
<p>Открыть учебный центр не обязательно значит арендовать большой офис. Есть три основных варианта:</p>
<ul>
  <li><strong>Своё помещение</strong> — самый надёжный вариант в глазах родителей, для детских курсов и подготовки к экзаменам часто необходим. При выборе учитывайте транспорт (метро, парковка), близость к школам, число и размер комнат, освещение, вентиляцию, безопасность и звукоизоляцию. Внимательно прочитайте срок и условия договора аренды.</li>
  <li><strong>Онлайн</strong> — минимальные стартовые расходы и никаких географических ограничений. Но конкуренция высокая, удерживать внимание учеников труднее, а дисциплину, посещаемость и домашние задания нужно отслеживать строже. Как это наладить: <a href="/blog-details/kak-provodit-onlajn-uroki-2027">как проводить онлайн-уроки</a>.</li>
  <li><strong>Гибрид</strong> — основные занятия очно, дополнительные уроки, консультации или часть групп онлайн. Для многих новых центров это самый гибкий вариант: начинаете с небольшого помещения и наращиваете нагрузку онлайн-группами.</li>
</ul>
<p>Практический совет: не рассчитывайте, что в первый год заполните все комнаты. Безопаснее начать с одной-двух комнат и заполнить расписание утренними, вечерними и выходными сменами. Расширяйте помещение только тогда, когда группы действительно заполняются.</p>

<h2>3. Правовая форма: ИП или ООО?</h2>
<p>Этот раздел носит общий информационный характер и не является юридической консультацией. Правила регистрации, налоговые режимы и требования могут меняться, поэтому перед решением <strong>уточните всё в Государственной налоговой службе и у юриста</strong>.</p>
<ul>
  <li><strong>ИП (физическое лицо-предприниматель)</strong> — обычно позволяет начать деятельность проще и быстрее. Для одного преподавателя или небольшого центра это часто первый выбор. Как общее правило, ИП отвечает по обязательствам лично. Подробнее (на азербайджанском): <a href="https://affidacons.com/bloq/ferdi-sahibkar-qeydiyyati-azerbaycanda-voen-vergi-rejimleri-sosial-sigorta-2026" rel="noopener" target="_blank">регистрация ИП: VÖEN, налоговые режимы, социальное страхование</a>.</li>
  <li><strong>ООО (общество с ограниченной ответственностью)</strong> — юридическое лицо. Может лучше подойти, если учредителей несколько, привлекаются инвестиции или центр растёт. Бухгалтерии и отчётности обычно больше. Подробнее (на азербайджанском): <a href="https://affidacons.com/bloq/azerbaycanda-huquqi-sexsin-yaradilmasi-mmc-qeydiyyat-kapital" rel="noopener" target="_blank">создание юридического лица в Азербайджане: ООО, регистрация, капитал</a>.</li>
</ul>
<p>Кроме правовой формы, нужно уточнить:</p>
<ul>
  <li><strong>Разрешения и лицензии</strong> — в зависимости от вида образовательных услуг для деятельности может потребоваться разрешение; уточните это в официальном органе.</li>
  <li><strong>Налоговый режим</strong> — какой режим применяется, зависит от оборота, вида деятельности и других условий.</li>
  <li><strong>Договоры с преподавателями</strong> — трудовой договор или другая форма договора; от этого зависят налоговые обязательства и обязательства по социальному страхованию.</li>
  <li><strong>Договор с родителями</strong> — правила оплаты, пропущенные занятия, возвраты и использование персональных данных должны быть письменными.</li>
  <li><strong>Договор аренды</strong> — разрешение использовать помещение для образовательной деятельности.</li>
</ul>

<h2>4. Преподаватели и модели оплаты</h2>
<p>Учебный центр продают преподаватели: родители часто выбирают не центр, а конкретного преподавателя. При найме проверяйте не только знание предмета, но и умение объяснять, дисциплину, общение с родителями и готовность работать в системе. Лучшая проверка — пробный урок.</p>
<table>
  <thead>
    <tr><th>Модель оплаты</th><th>Преимущество</th><th>Риск</th><th>Когда подходит</th></tr>
  </thead>
  <tbody>
    <tr><td>Фиксированная месячная зарплата</td><td>Стабильность для преподавателя, лояльность центру</td><td>Расход остаётся, даже если группы не заполнились</td><td>Основные преподаватели со стабильной нагрузкой</td></tr>
    <tr><td>Оплата за занятие (почасовая)</td><td>Расход соответствует проведённым занятиям</td><td>Преподаватель работает в нескольких местах, слабая привязанность</td><td>Начальный этап, дополнительные или сезонные группы</td></tr>
    <tr><td>Процент от дохода группы</td><td>Преподаватель заинтересован заполнить группу и удержать учеников</td><td>Доход меняется, расчёт должен быть прозрачным</td><td>Сильные преподаватели, которые приводят своих учеников</td></tr>
    <tr><td>Смешанная (база + процент)</td><td>Стабильность и мотивация вместе</td><td>Сложнее рассчитывать</td><td>По мере роста центра</td></tr>
  </tbody>
</table>
<p>Какую бы модель вы ни выбрали, согласуйте условия письменно: длительность занятия, отменённые уроки, замены, что происходит, если в группе мало учеников, кто отмечает посещаемость и оценки. При процентной модели особенно важен прозрачный учёт оплат — преподаватель должен видеть, на чём основан расчёт. Если с группой работает помощник преподавателя, дайте ему отдельный аккаунт (в Kursometr для этого есть аккаунт ментора).</p>

<h2>5. Цена курса и расходы первого года</h2>
<h3>Как рассчитать цену</h3>
<p>Считайте цену по своим цифрам, а не по вопросу «сколько берёт центр по соседству». Простая формула:</p>
<p><strong>Минимальная месячная цена для одного ученика = (месячные расходы группы + целевой доход) ÷ реальное число платящих учеников в группе</strong></p>
<p><em>Пример (с условными цифрами, не рыночная цена):</em> допустим, месячные расходы группы — оплата преподавателя, доля аренды на эту группу, материалы, реклама и доля администрирования — составляют X манатов, а центр ожидает от группы Y манатов дохода. В группе 10 мест, но в первые месяцы осторожнее исходить из того, что реально платить будут 7 учеников. Тогда минимальная цена — (X + Y) ÷ 7. Подставьте свои цифры.</p>
<p>Здесь важны три момента: не считайте группу полностью заполненной, держите резерв на слабые месяцы (лето, праздники) и помните, что индивидуальные занятия считаются иначе, чем групповые. Подробнее о моделях оплаты (помесячно, пакетом, за занятие) и правилах скидок: <a href="/blog-details/kak-repetitoru-ustanovit-cenu-za-urok-2027">как репетитору установить цену за урок</a>.</p>
<h3>Статьи расходов первого года</h3>
<p>Цифры сильно зависят от города, помещения и ниши, поэтому здесь мы даём не суммы, а статьи расходов. Заполните каждую по собственным предложениям:</p>
<table>
  <thead>
    <tr><th>Статья</th><th>Что входит</th><th>Примечание</th></tr>
  </thead>
  <tbody>
    <tr><td>Регистрация и юридические расходы</td><td>Регистрация, договоры, услуги юриста и бухгалтера</td><td>Бухгалтерия — ежемесячный расход</td></tr>
    <tr><td>Помещение</td><td>Аренда, депозит, коммунальные услуги, ремонт</td><td>Самый крупный постоянный расход; следите за сроком договора</td></tr>
    <tr><td>Оборудование и мебель</td><td>Столы и стулья, доска, проектор, компьютеры (для IT), принтер</td><td>Разовый расход, но для IT-курсов может быть высоким</td></tr>
    <tr><td>Оплата преподавателей</td><td>Зарплата, оплата за занятие или процент, налоги и социальное страхование</td><td>Главный переменный расход</td></tr>
    <tr><td>Учебные материалы</td><td>Книги, печать, сборники тестов, лицензионные программы</td><td>Зависит от ниши</td></tr>
    <tr><td>Сайт и бренд</td><td>Логотип, сайт, домен, хостинг</td><td>В RS Code: лендинг 300–700, сайт-визитка 500–1 200, корпоративный сайт со страницами курсов 1 200–3 500 AZN (ориентировочно)</td></tr>
    <tr><td>Реклама</td><td>Реклама в Instagram и Google, печатные материалы, мероприятие к открытию</td><td>В первые месяцы нужно больше</td></tr>
    <tr><td>Система управления</td><td>Группы, расписание, посещаемость, тесты, учёт оплат</td><td>Начать с Excel кажется дешевле, но отнимает время</td></tr>
    <tr><td>Резервный фонд</td><td>Непредвиденные расходы и месяцы с низким доходом</td><td>Должен покрывать постоянные расходы за несколько месяцев</td></tr>
  </tbody>
</table>

<h2>6. Маркетинг: сайт, Google Business Profile и Instagram</h2>
<p>Когда родители ищут курсы, они сначала спрашивают знакомых, потом пишут в Google, смотрят карту и страницу в Instagram. Для нового центра три канала должны работать вместе:</p>
<ul>
  <li><strong>Сайт</strong> — отдельная страница для каждого курса (программа, длительность, расписание, цена или «свяжитесь с нами», преподаватель), профили преподавателей, адрес и карта, короткая форма записи / пробного урока и кнопка WhatsApp. Сайт должен отвечать на вопросы «какой курс, где, когда, как записаться». Подробнее: <a href="/blog-details/sajt-i-seo-dlya-uchebnogo-centra-2027">сайт и локальное SEO для учебного центра</a>. Если хотите заказать сайт: <a href="/razrabotka-sajtov">разработка сайтов</a>.</li>
  <li><strong>Google Business Profile</strong> — чтобы появляться на карте по запросам вроде «курсы английского рядом». Название, адрес и телефон должны быть написаны одинаково на сайте, в Google и в Instagram. Просите отзывы у первых учеников и родителей.</li>
  <li><strong>Instagram</strong> — повседневная жизнь центра: моменты с занятий (только с разрешения), короткие видео преподавателей, полезные советы, объявления о наборе. Instagram создаёт доверие, но не заменяет поиск в Google.</li>
</ul>
<p>Бесплатный пробный урок, тест уровня или открытое занятие перед открытием — простой способ набрать первые группы. Но важнее всего быстро отвечать на заявки: родители обычно пишут сразу в несколько центров, и преимущество получает тот, кто ответил первым. Записывайте источник каждой заявки (Google, карта, Instagram, рекомендация), чтобы знать, какой канал работает.</p>

<h2>7. Система управления с первого дня</h2>
<p>Многие центры начинают с тетрадей, Excel и групп в WhatsApp и планируют внедрить систему, «когда вырастем». Проблема в том, что потом труднее переносить старые записи, учить преподавателей новым правилам и приучать родителей к новому порядку. Систему проще настроить с первой группы. Основные функции, которые нужны учебному центру:</p>
<table>
  <thead>
    <tr><th>Потребность</th><th>Почему с первого дня</th><th>В Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Группы и недельное расписание</td><td>Дата каждого занятия известна, загрузку комнат и преподавателей можно планировать</td><td>Предметы, группы, недельное расписание</td></tr>
    <tr><td>Посещаемость</td><td>Пропуски видны вовремя, споров об оплате меньше</td><td>Отметка на каждом занятии из браузера телефона</td></tr>
    <tr><td>Тесты</td><td>Прогресс ученика измеряется, результаты можно показать родителям</td><td>Тесты по времени, которые открываются и закрываются в назначенный час, закрытые вопросы проверяются автоматически; сборник тестов в PDF добавляется в банк вопросов</td></tr>
    <tr><td>Домашние задания</td><td>Работа вне занятий отслеживается</td><td>Выдача и отслеживание домашних заданий</td></tr>
    <tr><td>Оплаты</td><td>Кто заплатил и у кого долг — видно в одном месте</td><td>Учёт оплат учеников</td></tr>
    <tr><td>Кабинет родителя</td><td>Родитель видит всё без вопросов, доверие растёт</td><td>Посещаемость, оценки и результаты тестов</td></tr>
    <tr><td>Преподаватели и помощники</td><td>Каждый работает со своими группами</td><td>Аккаунты менторов (помощников преподавателя)</td></tr>
    <tr><td>Материалы</td><td>Материал пропущенного занятия не теряется</td><td>Записи уроков и материалы видны только этой группе</td></tr>
  </tbody>
</table>
<p>В <a href="/mehsullar/kursometr">Kursometr</a> преподаватель открывает свою страницу (<em>vashe-imya.kursometr.com</em>), создаёт предметы и группы, настраивает недельное расписание и начинает работу. Платформа работает в браузере телефона, можно войти через аккаунт Google, регистрация преподавателя бесплатна. Подробнее о настройке посещаемости: <a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">электронный учёт посещаемости</a>. Если нужна индивидуальная система для нескольких филиалов, централизованной отчётности или собственных процессов, <a href="/kontakty">напишите нам</a>.</p>

<h2>8. Первые 90 дней: чек-лист</h2>
<h3>Дни 1–30: подготовка</h3>
<ul>
  <li>☐ Выбраны ниша и первые 1–2 направления, целевая аудитория описана</li>
  <li>☐ Принято решение о формате: помещение, онлайн или гибрид</li>
  <li>☐ Правовая форма, разрешения и налоговые вопросы уточнены в налоговой службе и у юриста</li>
  <li>☐ Помещение выбрано, договор аренды проверен</li>
  <li>☐ Первые преподаватели отобраны по пробным урокам, модель оплаты согласована письменно</li>
  <li>☐ Цена курса рассчитана по формуле, расходы первого года спланированы по статьям</li>
</ul>
<h3>Дни 31–60: открытие</h3>
<ul>
  <li>☐ Сайт, Google Business Profile и Instagram готовы; название/адрес/телефон везде одинаковы</li>
  <li>☐ Есть форма записи, кнопка WhatsApp и правило быстрого ответа на заявки</li>
  <li>☐ Договор с родителями и правила оплаты, пропусков и возвратов оформлены письменно</li>
  <li>☐ В системе управления настроены предметы, группы и недельное расписание</li>
  <li>☐ Проведены пробные уроки, тесты уровня или открытое занятие, набраны первые группы</li>
  <li>☐ Родители подключены к кабинету, им показано, как им пользоваться</li>
</ul>
<h3>Дни 61–90: порядок и анализ</h3>
<ul>
  <li>☐ Посещаемость отмечается на каждом занятии, на повторные пропуски есть реакция</li>
  <li>☐ Проведены первые тесты, результаты обсуждены с родителями</li>
  <li>☐ Оплаты учитываются в одном месте, просрочки видны вовремя</li>
  <li>☐ Проанализирован источник каждой заявки, рекламный бюджет перенаправлен на работающие каналы</li>
  <li>☐ Заполненность групп и реальный доход сравнены с цифрами из расчёта</li>
  <li>☐ Собраны отзывы первых родителей и учеников</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">С чего начать открытие учебного центра?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">С выбора ниши и аудитории: определите, кого вы будете учить, в какой области у вас сильные преподаватели и есть ли спрос на эту услугу рядом с вами. Затем планируются формат (помещение, онлайн или гибрид), правовая форма, преподаватели, цены и расходы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Открывать учебный центр как ИП или как ООО?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Для одного преподавателя или небольшого центра ИП обычно проще для старта; если учредителей несколько или центр растёт, ООО может подойти лучше. Поскольку правила регистрации, налоговые режимы и другие требования различаются, уточните решение в Государственной налоговой службе и у юриста.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужна ли учебному центру лицензия?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В зависимости от вида образовательных услуг для деятельности может потребоваться разрешение. Уточните этот вопрос в официальном органе и у юриста до начала работы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как установить цену курса?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">По простой формуле: сложите месячные расходы группы (преподаватель, доля аренды, материалы, реклама, администрирование) и целевой доход и разделите на реальное число платящих учеников в группе. Не считайте группу полностью заполненной и держите резерв на слабые месяцы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как лучше оплачивать работу преподавателей?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Основные модели — фиксированная месячная зарплата, оплата за занятие, процент от дохода группы и их сочетание. На старте оплата за занятие или процент снижает риск; по мере роста центра модель «база + процент» сочетает стабильность и мотивацию. Какую бы модель вы ни выбрали, условия нужно согласовать письменно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Чем Kursometr поможет новому учебному центру?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В Kursometr преподаватель открывает свою страницу (vashe-imya.kursometr.com), настраивает предметы, группы и недельное расписание, отмечает посещаемость, проводит тесты по времени, задаёт домашние задания и учитывает оплаты. Родитель видит посещаемость, оценки и результаты тестов в кабинете родителя. Платформа работает в браузере телефона, есть вход через Google, регистрация преподавателя бесплатна.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/sajt-i-seo-dlya-uchebnogo-centra-2027">Сайт для учебного центра и видимость в Google</a></li>
  <li><a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">Электронный учёт посещаемости</a></li>
  <li><a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">Как управлять курсами подготовки к экзаменам</a></li>
  <li><a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">Программа для языковых курсов</a></li>
  <li><a href="/blog-details/kak-repetitoru-ustanovit-cenu-za-urok-2027">Как репетитору установить цену за урок</a></li>
  <li><a href="/blog-details/programma-dlya-detskogo-razvivayushchego-centra-2027">Программа для детского развивающего центра</a></li>
  <li><a href="/blog-details/kak-privlech-i-uderzhat-uchenikov-uchebnyj-centr-2027">Как учебному центру привлечь и удержать учеников</a></li>
</ul>

<h2>Итог</h2>
<p>Чтобы открыть учебный центр, мало быть хорошим преподавателем, но если идти шаг за шагом, это несложно. Начните с одной ниши, выберите формат по бюджету, уточните юридические вопросы у специалиста, письменно согласуйте условия с преподавателями, рассчитайте цену по формуле, спланируйте расходы по статьям и станьте заметными с помощью сайта, Google Business Profile и Instagram. А систему для групп, посещаемости, тестов, оплат и отчётов родителям настройте с первой же группы — переходить потом всегда сложнее.</p>
<p><strong>Хотите с первого дня управлять учебным центром упорядоченно? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация преподавателя бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Если центру нужен сайт или индивидуальная система для нескольких филиалов: <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Статья носит общий информационный характер и не является юридической, налоговой или финансовой консультацией. Требования к регистрации, разрешениям и налогам уточняйте в Государственной налоговой службе, профильных органах и у юриста. Пример расчёта цены приведён с условными цифрами; цены на сайты — ориентировочные цены RS Code. Функции Kursometr описаны по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'kurs-merkezi-nece-acilir-2027'],
            [
                'slug_en' => 'how-to-open-a-course-centre-2027',
                'slug_ru' => 'kak-otkryt-uchebnyj-centr-2027',

                'title_az' => 'Kurs Mərkəzi Necə Açılır: Niş, Hüquqi Forma, Müəllimlər, Qiymət, Marketinq və İlk 90 Gün (2027)',
                'title_en' => 'How to Open a Course Centre: Niche, Legal Form, Teachers, Pricing, Marketing and the First 90 Days (2027)',
                'title_ru' => 'Как открыть учебный центр: ниша, правовая форма, преподаватели, цены, маркетинг и первые 90 дней (2027)',

                'review_az' => 'Azərbaycanda kurs mərkəzi necə açılır? Niş və auditoriya, məkan və ya onlayn format, fərdi sahibkar və ya MMC, müəllimlərin ödəniş modelləri, kurs qiymətinin düsturu, ilk ilin xərc kateqoriyaları, sayt, Google Business Profile və Instagram, ilk gündən idarəetmə sistemi və ilk 90 gün üçün yoxlama siyahısı.',
                'review_en' => 'How do you open a course centre in Azerbaijan? Niche and audience, premises or online, sole proprietor or LLC, teacher pay models, a course pricing formula, first-year cost categories, website, Google Business Profile and Instagram, a management system from day one and a first-90-days checklist.',
                'review_ru' => 'Как открыть учебный центр в Азербайджане? Ниша и аудитория, помещение или онлайн, ИП или ООО, модели оплаты преподавателей, формула цены курса, статьи расходов первого года, сайт, Google Business Profile и Instagram, система управления с первого дня и чек-лист на первые 90 дней.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '5 Noyabr 2026',
                'date_en' => 'November 5, 2026',
                'date_ru' => '5 Ноября 2026',

                'photo'    => 'cover-open-course-centre-az.png',
                'photo_en' => 'cover-open-course-centre-en.png',
                'photo_ru' => 'cover-open-course-centre-ru.png',

                'meta_title_az' => 'Kurs Mərkəzi Necə Açılır 2027: Addım-addım | RS Code',
                'meta_title_en' => 'How to Open a Course Centre 2027: Step by Step | RS Code',
                'meta_title_ru' => 'Как открыть учебный центр 2027: пошагово | RS Code',

                'meta_description_az' => 'Kurs mərkəzi necə açılır: niş, format, FS və ya MMC, müəllimlərin ödənişi, qiymət düsturu, xərc kateqoriyaları, marketinq, idarəetmə sistemi və ilk 90 gün.',
                'meta_description_en' => 'How to open a course centre: niche, format, sole proprietor or LLC, teacher pay, a pricing formula, cost categories, marketing, a management system, first 90 days.',
                'meta_description_ru' => 'Как открыть учебный центр: ниша, формат, ИП или ООО, оплата преподавателей, формула цены, статьи расходов, маркетинг, система управления и первые 90 дней.',

                'meta_keywords_az' => 'kurs mərkəzi necə açılır, kurs mərkəzi açmaq, tədris mərkəzi açmaq, kurs biznesi, kurs qiyməti, müəllim maaşı, kurs mərkəzi marketinqi, kursometr, 2027',
                'meta_keywords_en' => 'how to open a course centre, open a training centre, start a tutoring business, course pricing, teacher pay, course centre marketing, azerbaijan, kursometr, 2027',
                'meta_keywords_ru' => 'как открыть учебный центр, открыть курсы, бизнес учебный центр, цена курса, оплата преподавателей, маркетинг учебного центра, азербайджан, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
