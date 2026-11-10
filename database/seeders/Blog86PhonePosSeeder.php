<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #86 — Telefon mağazası üçün proqram (2027). RS POS sahə silsiləsinin 3-cüsü; rspos.az/telefon-magazasi-proqrami.
 * Faktlar YALNIZ rspos.az (2026-11-10) + products.php: hər ədədin IMEI/seriya nömrəsi alışda və satışda, nömrə çekdə; kredit müqaviləsi, ilkin ödəniş,
 * avtomatik aylıq cədvəl, müqavilə çapı, hər ödəniş çeklə; zamin müqaviləyə bağlı; borc bölməsində gecikənlər + əlaqə siyahısı; qismən ödəniş/tarixçə;
 * satış/nisyə/kredit qiyməti ayrıca; cihaz üzrə maya+satış mənfəət hesabatı; ümumi: faktura, çox anbar/transfer/sayım, FIFO, rollar/2FA/audit, yedək,
 * internet tələbi, 100/150/200 ₼, limitsiz məhsul, 14 gün sınaq. Nümunə rəqəmlər (1 800 ₼, 300 ₼, 6 ay) ŞƏRTİDİR.
 * Təmir/servis modulu, zəmanət izləmə modulu, trade-in İDDİA EDİLMİR (yazıda servis modulu olmadığı açıq deyilir). imei.az yalnız istinad.
 */
class Blog86PhonePosSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Telefon mağazasında bir səhv bahalı başa gəlir. Eyni modeldən on telefon rəfdədir, hamısı eyni qutuda, eyni rəngdə. Müştəri bir ay sonra zəmanət üçün qayıdır və "bu telefonu sizdən almışam" deyir. Satıcı isə həmin telefonun doğrudan da bu mağazadan satıldığını sübut edə bilmir, çünki satışda yalnız "iPhone — 1 ədəd" yazılıb. Kreditlə satılan telefonun ödənişi gecikir, amma bunu heç kim vaxtında görmür. Dəftərdə də zaminin telefon nömrəsi yoxdur.</p>
<p>Bu yazı 2027-ci ildə mobil telefon, planşet və elektronika mağazası idarə edən sahibkarlar üçündür. IMEI və seriya nömrəsi uçotunu, kreditlə (hissə-hissə) satışı, ödəniş cədvəlini, zamini, gecikən ödənişləri, nağd və kredit qiymətlərini, hər cihaz üzrə mənfəəti və proqram seçərkən soruşulmalı sualları addım-addım nəzərdən keçiririk. Nümunə kimi RS Code-un hazırladığı <a href="/mehsullar/rspos">RS POS</a> bulud kassa proqramının imkanlarından istifadə edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Telefon mağazası proqramını nə fərqləndirir?</td><td>Hər cihaz IMEI və ya seriya nömrəsi ilə ayrıca izlənir</td></tr>
    <tr><td>IMEI nə vaxt yazılır?</td><td>Mal qəbulunda hər ədəd üçün, satışda isə konkret nömrə seçilir</td></tr>
    <tr><td>Zəmanət mübahisəsini nə həll edir?</td><td>Çekdə yazılan IMEI cihazın sizdən alındığını göstərir</td></tr>
    <tr><td>Kreditlə satış necə aparılır?</td><td>Müqavilə, ilkin ödəniş və avtomatik aylıq ödəniş cədvəli</td></tr>
    <tr><td>Gecikən ödənişləri necə görmək olar?</td><td>Borc bölməsində gecikənlər ayrıca siyahıda göstərilir</td></tr>
    <tr><td>Nağd və kredit qiyməti fərqli ola bilərmi?</td><td>Bəli, hər məhsulda satış, nisyə və kredit qiyməti ayrıca saxlanılır</td></tr>
  </tbody>
</table>

<h2>1. Telefon Mağazası Niyə Ayrı Yanaşma Tələb Edir</h2>
<p>Adi mağazada eyni barkodlu məhsullar bir-birindən fərqlənmir: bir şampun digərinin eynisidir. Telefonda isə hər ədədin öz kimliyi var — IMEI nömrəsi. Eyni modelin iki telefonu qiymətcə eynidir, amma biri satılıb, digəri rəfdədir. Üstəlik telefonlar bahalıdır, çoxu kreditlə satılır və bir ədədin itməsi və ya səhv satılması bir günün qazancını apara bilər. Ona görə telefon mağazası proqramı bu suallara cavab verməlidir:</p>
<ul>
  <li><strong>Bu konkret telefon haradan gəlib, nə vaxt, kimə satılıb?</strong> — IMEI üzrə tam iz.</li>
  <li><strong>Kreditlə satılan cihazların ödənişləri vaxtında gəlirmi?</strong> — gecikməni vaxtında görmək.</li>
  <li><strong>Hər cihazdan nə qədər qazanılıb?</strong> — bahalı malda orta mənfəət yox, ədəd üzrə mənfəət vacibdir.</li>
  <li><strong>Rəfdə və anbarda hansı nömrələr var?</strong> — sayımda say yox, nömrə üzrə yoxlama.</li>
</ul>
<p>Ümumi mağaza proqramlarının müqayisəsi üçün baxın: <a href="/blog-details/magaza-proqrami-anbar-pos-azerbaycanda-2026">mağaza proqramı, anbar və POS bələdçisi</a>.</p>

<h2>2. IMEI və Seriya Nömrəsi Uçotu</h2>
<p>RS POS-da hər ədədin IMEI və ya seriya nömrəsi mal qəbulunda yazılır. Satış zamanı kassir sadəcə modeli yox, konkret nömrəni seçir və bu nömrə çekdə görünür. Beləliklə hər telefonun yolu iki nöqtədə qeydə alınır: hansı tədarükçüdən gəlib və hansı çeklə, kimə satılıb.</p>
<table>
  <thead>
    <tr><th>Mərhələ</th><th>Nə qeydə alınır</th><th>Nə verir</th></tr>
  </thead>
  <tbody>
    <tr><td>Mal qəbulu</td><td>Hər ədədin IMEI/seriya nömrəsi, tədarükçü, alış qiyməti</td><td>Cihazın haradan və neçəyə alındığı</td></tr>
    <tr><td>Satış</td><td>Konkret nömrə seçilir, çekdə yazılır</td><td>Cihazın kimə və nə vaxt satıldığı</td></tr>
    <tr><td>Zəmanət müraciəti</td><td>Çekdəki IMEI</td><td>Cihazın sizdən alındığının sübutu</td></tr>
  </tbody>
</table>
<p><strong>Praktik qaydalar:</strong></p>
<ul>
  <li><strong>IMEI-ni qutudan yox, cihazın özündən yoxlayın.</strong> Telefonda <em>*#06#</em> yığmaq IMEI-ni ekranda göstərir. Qutu ilə cihaz uyğun gəlmirsə, malı qəbul etməyin.</li>
  <li><strong>İki SIM-li telefonlarda iki IMEI olur.</strong> Mağaza daxilində hansını (məsələn, birincini) əsas nömrə kimi yazacağınızı qərara alın və hamı eyni qaydaya əməl etsin.</li>
  <li><strong>Nömrəni əllə yox, skanerlə daxil edin.</strong> 15 rəqəmli nömrədə bir rəqəm səhvi bütün izi qırır. Qutudakı IMEI barkodunu skan etmək ən etibarlı yoldur.</li>
  <li><strong>Aksesuarları sadə barkodla aparın.</strong> Qab, şarj cihazı, qulaqlıq kimi ucuz mallar üçün seriya nömrəsi lazım deyil — onlar adi barkod və qalıqla satılır.</li>
</ul>
<p>Azərbaycanda mobil cihazların qeydiyyatı ayrıca dövlət sistemi ilə aparılır. Satdığınız cihazların qeydiyyat vəziyyəti və müştəriyə veriləcək məlumat barədə rəsmi mənbəyə (imei.az) baxın.</p>

<h2>3. Zəmanət Mübahisələri: Çek Niyə Vacibdir</h2>
<p>Zəmanət müraciətlərində ən çox yaranan mübahisə "telefon sizdən alınıbmı?" sualıdır. Çekdə model adı ilə yanaşı IMEI də yazılıbsa, cavab sadədir: müştərinin çekindəki nömrə cihazın nömrəsi ilə üst-üstə düşür.</p>
<ul>
  <li><strong>Hər satışda çek verin.</strong> Çeksiz satılan telefon sonradan həm sizin, həm müştərinin problemi olur.</li>
  <li><strong>Zəmanət şərtlərini yazılı edin.</strong> Müddət, hansı hallarda zəmanətin keçmədiyi (zərbə, su, açılmış cihaz), cihazın hara göndərildiyi — bunlar satışdan əvvəl müştəriyə bildirilməlidir.</li>
  <li><strong>Hüquqi tərəfi dəqiqləşdirin.</strong> Zəmanət və qaytarma şərtləri istehlakçı hüquqları qanunvericiliyinə uyğun olmalıdır — dəqiq müddət və öhdəliklər üçün hüquqşünasla məsləhətləşin.</li>
</ul>
<p>Qeyd: RS POS-da IMEI çekdə yazılır, amma proqram təmir və ya servis sifarişlərini aparan ayrıca modul kimi təqdim olunmur. Mağazanızda servis bölməsi varsa, onun uçotunu ayrıca planlaşdırın.</p>

<h2>4. Kreditlə (Hissə-hissə) Satış</h2>
<p>Telefon mağazalarında satışın böyük hissəsi hissə-hissə ödənişlə olur. Problem satışda yox, sonrakı aylardadır: kim nə qədər ödəyib, kimin ödənişi gecikib, hansı müqavilə bağlanıb. Dəftər və ya Excel ilə bunu onlarla müştəri üçün izləmək çətindir.</p>
<p>RS POS-da kreditlə satış müqavilə ilə aparılır:</p>
<ol>
  <li><strong>Müddət və ilkin ödəniş daxil edilir.</strong> Məsələn, 6 və ya 12 ay və ilkin ödəniş məbləği.</li>
  <li><strong>Aylıq ödəniş cədvəli avtomatik qurulur.</strong> Hər ödənişin tarixi və məbləği cədvəldə görünür.</li>
  <li><strong>Müqavilə çap olunur.</strong> Müştəri ilə imzalanır, bir nüsxə mağazada qalır.</li>
  <li><strong>Hər ödəniş çeklə qeydə alınır.</strong> Qalan borc azalır, tarixçə saxlanılır.</li>
</ol>
<p><strong>Nümunə (şərti rəqəmlər):</strong> telefonun kredit qiyməti 1 800 ₼, ilkin ödəniş 300 ₼, müddət 6 ay. Qalan 1 500 ₼ altı aya bölünür — hər ay 250 ₼. Müştəri üçüncü ayın ödənişini etməyəndə o, gecikən ödənişlər siyahısında görünür.</p>
<p>Kreditlə satış qaydalarını (müqavilə forması, əlavə ödəniş, gecikmə şərtləri) hüquqşünasla birlikdə hazırlayın. Proqram cədvəli və ödənişləri aparır, amma müqavilənin hüquqi məzmunu sizin məsuliyyətinizdədir.</p>

<h2>5. Zamin, Gecikən Ödənişlər və Borc Dəftəri</h2>
<p>Kredit müştərisi üçün zaminin məlumatları RS POS-da birbaşa müqaviləyə bağlanır. Ödəniş gecikəndə zaminin əlaqə məlumatını axtarmaq lazım gəlmir — o, müqavilənin içindədir.</p>
<p>Borc bölməsi gecikən ödənişləri ayrıca göstərir və müştərilərlə əlaqə üçün hazır siyahı verir. Praktik qayda:</p>
<ul>
  <li><strong>Hər gün səhər siyahıya baxın.</strong> Ödəniş tarixi keçən müştəriyə ilk gün xatırlatmaq həftələr sonra borc axtarmaqdan asandır.</li>
  <li><strong>Hər əlaqəni qeyd edin.</strong> Kim, nə vaxt zəng etdi, müştəri nə söz verdi.</li>
  <li><strong>Qismən ödənişi qəbul edin və yazın.</strong> RS POS borclarda qismən ödənişləri və tarixçəni saxlayır.</li>
</ul>
<p>Kreditdən əlavə, tanış müştərilərə nisyə də satırsınızsa, bu borclar da eyni yerdə görünür. Ətraflı: <a href="/blog-details/nisye-satis-borc-defteri-2026">nisyə satış və borc dəftəri</a>.</p>

<h2>6. Nağd, Nisyə və Kredit Qiymətləri</h2>
<p>Telefon mağazalarında eyni cihazın nağd və kredit qiyməti adətən fərqli olur. Əgər proqramda bir qiymət varsa, kassir hər dəfə fərqi əllə hesablayır — bu da həm səhv, həm də mübahisə deməkdir.</p>
<p>RS POS-da hər məhsul üçün satış, nisyə və kredit qiyməti ayrıca saxlanılır.</p>
<table>
  <thead>
    <tr><th>Satış növü</th><th>Qiymət (şərti nümunə)</th><th>Necə ödənilir</th></tr>
  </thead>
  <tbody>
    <tr><td>Nağd / kart</td><td>1 550 ₼</td><td>Bir dəfəyə</td></tr>
    <tr><td>Nisyə</td><td>1 600 ₼</td><td>Razılaşdırılmış müddətdə, borc dəftəri ilə</td></tr>
    <tr><td>Kredit</td><td>1 800 ₼</td><td>İlkin ödəniş + aylıq cədvəl, müqavilə ilə</td></tr>
  </tbody>
</table>
<p>Qiymətləri müştəriyə əvvəlcədən açıq deyin: kredit qiymətinin nağd qiymətdən nə qədər fərqləndiyini və ümumi ödəniləcək məbləği bilən müştəri ilə sonradan mübahisə az olur.</p>

<h2>7. Hər Cihaz Üzrə Mənfəət</h2>
<p>Bahalı malda orta mənfəət aldadıcıdır. Eyni modelin bir partiyası 1 300 ₼-a, növbəti partiyası 1 380 ₼-a alına bilər; bir telefon nağd, digəri kreditlə satılır. RS POS-un mənfəət hesabatı hər cihaz üçün maya dəyərini və satış qiymətini göstərir — beləliklə hansı satışın nə qədər qazandırdığını görürsünüz.</p>
<ul>
  <li><strong>Kredit satışlarını ayrıca qiymətləndirin.</strong> Kredit qiyməti yüksəkdir, amma pul aylarla gəlir və gecikmə riski var.</li>
  <li><strong>Endirim edərkən maya dəyərinə baxın.</strong> Telefonda marja dar olur — bir neçə faizlik endirim bütün qazancı apara bilər.</li>
  <li><strong>Uzun qalan modelləri izləyin.</strong> Telefonlar tez köhnəlir: yeni model çıxanda köhnənin qiyməti düşür. Uzun qalan cihazları vaxtında satmaq daha sərfəlidir.</li>
</ul>
<p>RS POS maya dəyərini FIFO üzrə izləyir — əvvəl alınan partiya əvvəl satılmış sayılır. Ətraflı: <a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO maya dəyəri nədir</a>.</p>

<h2>8. Anbar, Sayım, İşçilər və Təhlükəsizlik</h2>
<p>Telefon kiçik və bahalıdır — itki riski digər mallardan yüksəkdir. Nəzarət üçün:</p>
<ul>
  <li><strong>Mal qəbulu</strong> — tədarükçü fakturası, qaytarma, hissə-hissə ödəniş və tədarükçü borcunun izlənməsi.</li>
  <li><strong>Sayım</strong> — telefonları say ilə yox, nömrə ilə yoxlayın: hər IMEI ya rəfdə olmalıdır, ya da satış çekində. RS POS-da inventar yoxlaması aparılır.</li>
  <li><strong>Bir neçə anbar və mağaza</strong> — vitrin, arxa anbar və filiallar ayrıca anbar kimi aparılır, mal transferlə köçürülür.</li>
  <li><strong>Hər satıcıya ayrı hesab</strong> — admin və kassir rolları, icazə sistemi.</li>
  <li><strong>Audit jurnalı</strong> — endirim, qaytarma və silinmə əməliyyatlarını kimin etdiyini görmək olar.</li>
  <li><strong>İki mərhələli giriş (2FA)</strong> və gündəlik bulud yedəkləməsi.</li>
</ul>
<p>RS POS bulud sistemidir və işləmək üçün internet tələb edir.</p>

<h2>9. Qiymət və Proqram Seçərkən Soruşulmalı Suallar</h2>
<p>RS POS-un qiymətləri rspos.az-da açıq göstərilib (noyabr 2026):</p>
<table>
  <thead>
    <tr><th>Plan</th><th>Qiymət</th><th>Kassir</th><th>Kassa</th><th>Anbar</th></tr>
  </thead>
  <tbody>
    <tr><td>Basic</td><td>100 ₼/ay</td><td>2</td><td>1</td><td>1</td></tr>
    <tr><td>Pro</td><td>150 ₼/ay</td><td>10</td><td>3</td><td>3</td></tr>
    <tr><td>Enterprise</td><td>200 ₼/ay</td><td>Limitsiz</td><td>5</td><td>Limitsiz</td></tr>
  </tbody>
</table>
<p>Bütün planlarda limitsiz məhsul var. 14 gün pulsuz sınaq var, kart məlumatı tələb olunmur. Qiymətlərin ümumi müqayisəsi üçün: <a href="/blog-details/pos-sistemi-qiymeti-azerbaycanda-2026">POS sistemi qiyməti Azərbaycanda</a>.</p>
<h3>Hər hansı telefon mağazası proqramını seçməzdən əvvəl yoxlayın</h3>
<ul>
  <li>Hər ədədin IMEI/seriya nömrəsi mal qəbulunda və satışda yazılırmı?</li>
  <li>IMEI çekdə görünürmü?</li>
  <li>Kredit müqaviləsi, ilkin ödəniş və avtomatik aylıq cədvəl varmı?</li>
  <li>Müqavilə çap olunurmu, zamin məlumatı müqaviləyə bağlanırmı?</li>
  <li>Gecikən ödənişlər ayrıca siyahıda görünürmü?</li>
  <li>Nağd, nisyə və kredit qiymətləri ayrıca saxlanılırmı?</li>
  <li>Hər cihaz üzrə mənfəəti görmək olurmu?</li>
  <li>Satıcılara ayrı hesab və əməliyyat jurnalı varmı?</li>
  <li>Pulsuz sınaq varmı və real mallarınızla sınamaq olarmı?</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Telefon mağazası üçün hansı proqram lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər cihazı IMEI və ya seriya nömrəsi ilə ayrıca izləyən, nömrəni çekdə göstərən, kreditlə satışı müqavilə və aylıq cədvəllə aparan, gecikən ödənişləri göstərən və hər cihaz üzrə mənfəəti hesablayan proqram. RS POS bu imkanları bir bulud sistemində birləşdirir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">IMEI proqrama necə yazılır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Mal qəbulunda hər ədədin IMEI və ya seriya nömrəsi daxil edilir. Satışda kassir konkret nömrəni seçir və həmin nömrə çekdə görünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kredit ödəniş cədvəli necə qurulur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Müddət və ilkin ödəniş daxil edilir, aylıq ödəniş cədvəli avtomatik yaranır. Müqavilə çap olunur, hər ödəniş isə çeklə qeydə alınır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Gecikən kredit ödənişlərini necə görmək olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS-un borc bölməsi gecikən ödənişləri ayrıca göstərir və müştərilərlə əlaqə üçün hazır siyahı verir. Zaminin məlumatları da müqaviləyə bağlıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Nağd və kredit qiyməti fərqli ola bilərmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. RS POS-da hər məhsul üçün satış, nisyə və kredit qiyməti ayrıca saxlanılır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Telefon mağazası proqramı neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS üç planda təklif olunur: Basic 100 ₼/ay, Pro 150 ₼/ay və Enterprise 200 ₼/ay. Bütün planlarda limitsiz məhsul və 14 gün pulsuz sınaq var, kart məlumatı tələb olunmur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/geyim-magazasi-ucun-proqram-2027">Geyim mağazası üçün proqram</a></li>
  <li><a href="/blog-details/market-ucun-kassa-proqrami-2027">Market üçün kassa proqramı</a></li>
  <li><a href="/blog-details/nisye-satis-borc-defteri-2026">Nisyə satış və borc dəftəri</a></li>
  <li><a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO maya dəyəri nədir?</a></li>
  <li><a href="/blog-details/pos-sistemi-qiymeti-azerbaycanda-2026">POS sistemi qiyməti Azərbaycanda</a></li>
</ul>

<h2>Nəticə</h2>
<p>Telefon mağazasında nizam nömrədən başlayır. Hər cihazın IMEI-si mal qəbulunda yazılanda və çekdə göstəriləndə zəmanət mübahisələri asan həll olunur. Kreditlə satış müqavilə, avtomatik ödəniş cədvəli və zamin məlumatı ilə aparılanda gecikmələr vaxtında görünür. Ayrı nağd və kredit qiymətləri, hər cihaz üzrə mənfəət və nömrə ilə sayım isə bahalı malda itkinin qarşısını alır.</p>
<p><strong>Telefon mağazanızı bir sistemdən idarə etmək istəyirsiniz? <a href="/mehsullar/rspos">RS POS</a> ilə tanış olun</strong> — 14 gün pulsuz sınaq, kart tələb olunmur: <a href="https://rspos.az/telefon-magazasi-proqrami" rel="noopener" target="_blank">rspos.az</a>. Mağazanız üçün sayt və ya fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır. Kreditlə satış, zəmanət və qaytarma şərtləri üçün qanunvericiliyə və hüquqşünasa müraciət edin. Nümunədəki qiymətlər şərtidir. RS POS imkanları və qiymətləri noyabr 2026 vəziyyətinə görə rspos.az əsasında təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>In a phone shop, one mistake can be expensive. Ten phones of the same model sit on the shelf, all in the same box, all the same colour. A month later a customer comes back for a warranty repair and says, "I bought this phone from you." Yet the sales assistant cannot prove that this particular phone really was sold by the shop, because the sale only says "iPhone — 1 pc". A payment on a phone sold on instalments is late, but nobody notices in time. And the guarantor's phone number is not in the notebook either.</p>
<p>This article is for owners who run a mobile phone, tablet or electronics store in 2027. We go step by step through IMEI and serial number tracking, instalment sales, payment schedules, guarantors, late payments, cash and instalment prices, profit per device and the questions to ask when choosing software. As an example, we use the features of <a href="/mehsullar/rspos">RS POS</a>, the cloud POS software developed by RS Code.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What makes phone shop software different?</td><td>Each device is tracked individually by its IMEI or serial number</td></tr>
    <tr><td>When is the IMEI recorded?</td><td>For each unit at goods receiving; at the sale, the specific number is selected</td></tr>
    <tr><td>What settles a warranty dispute?</td><td>The IMEI printed on the receipt shows the device was bought from you</td></tr>
    <tr><td>How are instalment sales handled?</td><td>A contract, a down payment and an automatic monthly payment schedule</td></tr>
    <tr><td>How can I see late payments?</td><td>Overdue payments are shown in a separate list in the debts section</td></tr>
    <tr><td>Can the cash price and the instalment price be different?</td><td>Yes, each product stores a separate sale price, store credit (pay later) price and instalment price</td></tr>
  </tbody>
</table>

<h2>1. Why a Phone Shop Needs a Different Approach</h2>
<p>In an ordinary store, products with the same barcode are indistinguishable: one bottle of shampoo is the same as the next. With phones, every unit has its own identity — the IMEI number. Two phones of the same model cost the same, but one has been sold and the other is on the shelf. On top of that, phones are expensive, many are sold on instalments, and losing or wrongly selling a single unit can wipe out a day's earnings. That is why phone shop software must answer these questions:</p>
<ul>
  <li><strong>Where did this particular phone come from, when and to whom was it sold?</strong> — a full trail by IMEI.</li>
  <li><strong>Are payments for devices sold on instalments coming in on time?</strong> — spotting late payments in time.</li>
  <li><strong>How much was earned on each device?</strong> — with expensive goods, profit per unit matters, not average profit.</li>
  <li><strong>Which numbers are on the shelf and in the stockroom?</strong> — checking by number during stock counts, not by quantity.</li>
</ul>
<p>For a comparison of general store software, see: <a href="/blog-details/store-software-warehouse-pos-azerbaijan-2026">store software, warehouse and POS guide</a>.</p>

<h2>2. IMEI and Serial Number Tracking</h2>
<p>In RS POS, the IMEI or serial number of each unit is recorded at goods receiving. At the sale, the cashier selects not just the model but the specific number, and that number appears on the receipt. This way, each phone's journey is recorded at two points: which supplier it came from, and on which receipt and to whom it was sold.</p>
<table>
  <thead>
    <tr><th>Stage</th><th>What is recorded</th><th>What it gives you</th></tr>
  </thead>
  <tbody>
    <tr><td>Goods receiving</td><td>Each unit's IMEI/serial number, supplier, purchase price</td><td>Where the device was bought and for how much</td></tr>
    <tr><td>Sale</td><td>The specific number is selected and printed on the receipt</td><td>To whom and when the device was sold</td></tr>
    <tr><td>Warranty claim</td><td>The IMEI on the receipt</td><td>Proof that the device was bought from you</td></tr>
  </tbody>
</table>
<p><strong>Practical rules:</strong></p>
<ul>
  <li><strong>Check the IMEI on the device itself, not on the box.</strong> Dialling <em>*#06#</em> on the phone shows the IMEI on screen. If the box and the device do not match, do not accept the goods.</li>
  <li><strong>Dual-SIM phones have two IMEIs.</strong> Decide within the shop which one (for example, the first) you will record as the main number, and make sure everyone follows the same rule.</li>
  <li><strong>Enter the number with a scanner, not by hand.</strong> In a 15-digit number, one wrong digit breaks the whole trail. Scanning the IMEI barcode on the box is the most reliable method.</li>
  <li><strong>Handle accessories with a simple barcode.</strong> Cheap items such as cases, chargers and earphones do not need a serial number — they are sold with an ordinary barcode and stock level.</li>
</ul>
<p>In Azerbaijan, mobile devices are registered through a separate state system. For the registration status of the devices you sell and the information to be given to customers, refer to the official source (imei.az).</p>

<h2>3. Warranty Disputes: Why the Receipt Matters</h2>
<p>The most common dispute in warranty claims is the question "was this phone bought from you?". If the receipt shows the IMEI alongside the model name, the answer is simple: the number on the customer's receipt matches the device's number.</p>
<ul>
  <li><strong>Issue a receipt with every sale.</strong> A phone sold without a receipt later becomes a problem for both you and the customer.</li>
  <li><strong>Put your warranty terms in writing.</strong> The period, the cases the warranty does not cover (impact, water, opened device) and where the device is sent — the customer must be told all this before the sale.</li>
  <li><strong>Clarify the legal side.</strong> Warranty and return terms must comply with consumer rights legislation — consult a lawyer for the exact periods and obligations.</li>
</ul>
<p>Note: in RS POS the IMEI is printed on the receipt, but the software is not offered as a separate module for handling repair or service orders. If your shop has a service department, plan its record-keeping separately.</p>

<h2>4. Instalment Sales</h2>
<p>In phone shops, a large share of sales are paid for in instalments. The problem is not the sale itself but the months that follow: who has paid how much, whose payment is late, which contract has been closed. Tracking this for dozens of customers in a notebook or Excel is difficult.</p>
<p>In RS POS, instalment sales are handled through a contract:</p>
<ol>
  <li><strong>The term and down payment are entered.</strong> For example, 6 or 12 months and the down payment amount.</li>
  <li><strong>The monthly payment schedule is built automatically.</strong> The date and amount of each payment are shown in the schedule.</li>
  <li><strong>The contract is printed.</strong> It is signed with the customer, and one copy stays in the shop.</li>
  <li><strong>Each payment is recorded with a receipt.</strong> The outstanding balance goes down, and the history is kept.</li>
</ol>
<p><strong>Example (illustrative figures):</strong> the instalment price of the phone is 1 800 ₼, the down payment is 300 ₼ and the term is 6 months. The remaining 1 500 ₼ is split over six months — 250 ₼ a month. When the customer misses the third month's payment, they appear in the list of late payments.</p>
<p>Prepare your instalment sales rules (contract form, extra charges, late payment terms) together with a lawyer. The software handles the schedule and payments, but the legal content of the contract is your responsibility.</p>

<h2>5. Guarantors, Late Payments and the Debt Book</h2>
<p>For an instalment customer, the guarantor's details are linked directly to the contract in RS POS. When a payment is late, there is no need to hunt for the guarantor's contact details — they are inside the contract.</p>
<p>The debts section shows late payments separately and gives you a ready list for contacting customers. A practical rule:</p>
<ul>
  <li><strong>Check the list every morning.</strong> Reminding a customer on the first day after the due date is easier than chasing the debt weeks later.</li>
  <li><strong>Record every contact.</strong> Who called, when, and what the customer promised.</li>
  <li><strong>Accept and record part payments.</strong> RS POS keeps part payments and the history for debts.</li>
</ul>
<p>If, besides instalments, you also sell on credit (nisyə) to regular customers you know, these debts appear in the same place. More details: <a href="/blog-details/customer-debt-book-credit-sales-2026">credit sales and the debt book</a>.</p>

<h2>6. Cash, Store Credit and Instalment Prices</h2>
<p>In phone shops, the cash price and the instalment price of the same device are usually different. If the software holds only one price, the cashier works out the difference by hand every time — which means both mistakes and disputes.</p>
<p>In RS POS, each product stores a separate sale price, store credit (pay later) price and instalment price.</p>
<table>
  <thead>
    <tr><th>Sale type</th><th>Price (illustrative example)</th><th>How it is paid</th></tr>
  </thead>
  <tbody>
    <tr><td>Cash / card</td><td>1 550 ₼</td><td>In one go</td></tr>
    <tr><td>On credit (nisyə)</td><td>1 600 ₼</td><td>Within an agreed period, via the debt book</td></tr>
    <tr><td>Instalments</td><td>1 800 ₼</td><td>Down payment + monthly schedule, under a contract</td></tr>
  </tbody>
</table>
<p>Tell the customer the prices openly in advance: a customer who knows how much the instalment price differs from the cash price, and the total amount to be paid, is less likely to dispute it later.</p>

<h2>7. Profit per Device</h2>
<p>With expensive goods, average profit is misleading. One batch of the same model may be bought at 1 300 ₼ and the next at 1 380 ₼; one phone is sold for cash, another on instalments. The RS POS profit report shows the cost and sale price for each device — so you can see how much each sale earned.</p>
<ul>
  <li><strong>Assess instalment sales separately.</strong> The instalment price is higher, but the money comes in over months and there is a risk of late payment.</li>
  <li><strong>Look at the cost when giving discounts.</strong> Margins on phones are thin — a discount of a few per cent can wipe out the whole profit.</li>
  <li><strong>Keep an eye on slow-moving models.</strong> Phones date quickly: when a new model comes out, the price of the old one drops. Selling devices that have been sitting for a long time promptly is more profitable.</li>
</ul>
<p>RS POS tracks cost using FIFO — the batch bought first is treated as sold first. More details: <a href="/blog-details/what-is-fifo-cost-method-2026">what is the FIFO cost method</a>.</p>

<h2>8. Warehouse, Stock Counts, Staff and Security</h2>
<p>Phones are small and expensive — the risk of loss is higher than with other goods. For control:</p>
<ul>
  <li><strong>Goods receiving</strong> — supplier invoices, returns, part payments and supplier debt tracking.</li>
  <li><strong>Stock counts</strong> — check phones by number, not by quantity: every IMEI must be either on the shelf or on a sales receipt. RS POS supports inventory checks.</li>
  <li><strong>Multiple warehouses and stores</strong> — the display, the back stockroom and branches are managed as separate warehouses, and goods are moved by transfer.</li>
  <li><strong>A separate account for each sales assistant</strong> — admin and cashier roles and a permission system.</li>
  <li><strong>Audit log</strong> — you can see who performed discounts, returns and deletions.</li>
  <li><strong>Two-factor authentication (2FA)</strong> and daily cloud backup.</li>
</ul>
<p>RS POS is a cloud system and requires an internet connection to work.</p>

<h2>9. Pricing and Questions to Ask When Choosing Software</h2>
<p>RS POS prices are published openly on rspos.az (November 2026):</p>
<table>
  <thead>
    <tr><th>Plan</th><th>Price</th><th>Cashiers</th><th>Registers</th><th>Warehouses</th></tr>
  </thead>
  <tbody>
    <tr><td>Basic</td><td>100 ₼/month</td><td>2</td><td>1</td><td>1</td></tr>
    <tr><td>Pro</td><td>150 ₼/month</td><td>10</td><td>3</td><td>3</td></tr>
    <tr><td>Enterprise</td><td>200 ₼/month</td><td>Unlimited</td><td>5</td><td>Unlimited</td></tr>
  </tbody>
</table>
<p>All plans include unlimited products. There is a 14-day free trial, and no card details are required. For a general price comparison: <a href="/blog-details/pos-system-price-azerbaijan-2026">POS system prices in Azerbaijan</a>.</p>
<h3>Check before choosing any phone shop software</h3>
<ul>
  <li>Is each unit's IMEI/serial number recorded at goods receiving and at the sale?</li>
  <li>Does the IMEI appear on the receipt?</li>
  <li>Is there an instalment contract, a down payment and an automatic monthly schedule?</li>
  <li>Is the contract printed, and are the guarantor's details linked to it?</li>
  <li>Are late payments shown in a separate list?</li>
  <li>Are cash, store credit and instalment prices stored separately?</li>
  <li>Can you see the profit per device?</li>
  <li>Are there separate accounts for sales assistants and an operations log?</li>
  <li>Is there a free trial, and can you test it with your real products?</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What kind of software does a phone shop need?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Software that tracks each device individually by its IMEI or serial number, shows the number on the receipt, handles instalment sales with a contract and monthly schedule, shows late payments and calculates the profit per device. RS POS combines these features in one cloud system.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How is the IMEI entered into the software?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The IMEI or serial number of each unit is entered at goods receiving. At the sale, the cashier selects the specific number, and that number appears on the receipt.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How is an instalment payment schedule set up?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The term and down payment are entered, and the monthly payment schedule is created automatically. The contract is printed, and each payment is recorded with a receipt.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can I see late instalment payments?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The RS POS debts section shows late payments separately and gives you a ready list for contacting customers. The guarantor's details are also linked to the contract.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can the cash price and the instalment price be different?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. In RS POS, each product stores a separate sale price, store credit (pay later) price and instalment price.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does phone shop software cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS is offered in three plans: Basic at 100 ₼/month, Pro at 150 ₼/month and Enterprise at 200 ₼/month. All plans include unlimited products and a 14-day free trial, and no card details are required.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/clothing-store-pos-software-2027">Software for Clothing Stores</a></li>
  <li><a href="/blog-details/grocery-store-pos-software-2027">POS Software for Grocery Stores</a></li>
  <li><a href="/blog-details/customer-debt-book-credit-sales-2026">Credit Sales and the Debt Book</a></li>
  <li><a href="/blog-details/what-is-fifo-cost-method-2026">What Is the FIFO Cost Method?</a></li>
  <li><a href="/blog-details/pos-system-price-azerbaijan-2026">POS System Prices in Azerbaijan</a></li>
</ul>

<h2>Conclusion</h2>
<p>Order in a phone shop starts with the number. When each device's IMEI is recorded at goods receiving and shown on the receipt, warranty disputes are easy to settle. When instalment sales are handled with a contract, an automatic payment schedule and the guarantor's details, late payments are spotted in time. And separate cash and instalment prices, profit per device and stock counts by number prevent losses on expensive goods.</p>
<p><strong>Want to run your phone shop from one system? Take a look at <a href="/mehsullar/rspos">RS POS</a></strong> — 14-day free trial, no card required: <a href="https://rspos.az/telefon-magazasi-proqrami" rel="noopener" target="_blank">rspos.az</a>. If you need a website or a custom system for your shop: <a href="/contact">get in touch with us</a>.</p>
<p><small><em>This article is for general information purposes. For instalment sales, warranty and return terms, refer to the legislation and consult a lawyer. The prices in the examples are illustrative. RS POS features and prices are described based on rspos.az as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>В магазине телефонов одна ошибка обходится дорого. На полке десять телефонов одной модели — все в одинаковых коробках, одного цвета. Через месяц покупатель возвращается по гарантии и говорит: «Я купил этот телефон у вас». А продавец не может доказать, что этот телефон действительно был продан в этом магазине, потому что в продаже записано только «iPhone — 1 шт.». Платёж по телефону, проданному в рассрочку, задерживается, но никто вовремя этого не замечает. А в тетради нет даже номера телефона поручителя.</p>
<p>Эта статья — для предпринимателей, которые в 2027 году управляют магазином мобильных телефонов, планшетов и электроники. Пошагово разберём учёт IMEI и серийных номеров, продажу в рассрочку (по частям), график платежей, поручителя, просроченные платежи, цены за наличные и в рассрочку, прибыль по каждому устройству и вопросы, которые стоит задать при выборе программы. В качестве примера используем возможности облачной кассовой программы <a href="/mehsullar/rspos">RS POS</a>, разработанной RS Code.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Чем отличается программа для магазина телефонов?</td><td>Каждое устройство отслеживается отдельно по IMEI или серийному номеру</td></tr>
    <tr><td>Когда вводится IMEI?</td><td>При приёмке товара — для каждой единицы, а при продаже выбирается конкретный номер</td></tr>
    <tr><td>Что решает гарантийный спор?</td><td>IMEI, указанный в чеке, подтверждает, что устройство куплено у вас</td></tr>
    <tr><td>Как оформляется продажа в рассрочку?</td><td>Договор, первоначальный взнос и автоматический график ежемесячных платежей</td></tr>
    <tr><td>Как увидеть просроченные платежи?</td><td>В разделе долгов просроченные платежи показываются отдельным списком</td></tr>
    <tr><td>Могут ли цены за наличные и в рассрочку различаться?</td><td>Да, для каждого товара отдельно хранятся цена продажи, цена в долг и цена в рассрочку</td></tr>
  </tbody>
</table>

<h2>1. Почему магазину телефонов нужен особый подход</h2>
<p>В обычном магазине товары с одинаковым штрихкодом ничем не отличаются друг от друга: один шампунь точно такой же, как другой. У телефона же у каждой единицы своя «личность» — номер IMEI. Два телефона одной модели стоят одинаково, но один продан, а другой лежит на полке. К тому же телефоны дорогие, многие продаются в рассрочку, и потеря или ошибочная продажа одной единицы может съесть дневную выручку. Поэтому программа для магазина телефонов должна отвечать на следующие вопросы:</p>
<ul>
  <li><strong>Откуда пришёл этот конкретный телефон, когда и кому он продан?</strong> — полная история по IMEI.</li>
  <li><strong>Поступают ли вовремя платежи за устройства, проданные в рассрочку?</strong> — вовремя видеть просрочку.</li>
  <li><strong>Сколько заработано на каждом устройстве?</strong> — для дорогого товара важна не средняя прибыль, а прибыль по каждой единице.</li>
  <li><strong>Какие номера есть на полке и на складе?</strong> — при инвентаризации проверка по номерам, а не по количеству.</li>
</ul>
<p>Сравнение программ для магазинов в целом: <a href="/blog-details/programma-magazin-sklad-pos-azerbajdzan-2026">руководство по программе для магазина, складу и POS</a>.</p>

<h2>2. Учёт IMEI и серийных номеров</h2>
<p>В RS POS IMEI или серийный номер каждой единицы вводится при приёмке товара. При продаже кассир выбирает не просто модель, а конкретный номер, и этот номер отображается в чеке. Таким образом путь каждого телефона фиксируется в двух точках: от какого поставщика он пришёл и каким чеком, кому продан.</p>
<table>
  <thead>
    <tr><th>Этап</th><th>Что фиксируется</th><th>Что это даёт</th></tr>
  </thead>
  <tbody>
    <tr><td>Приёмка товара</td><td>IMEI/серийный номер каждой единицы, поставщик, закупочная цена</td><td>Откуда и за сколько куплено устройство</td></tr>
    <tr><td>Продажа</td><td>Выбирается конкретный номер, он указывается в чеке</td><td>Кому и когда продано устройство</td></tr>
    <tr><td>Гарантийное обращение</td><td>IMEI в чеке</td><td>Доказательство того, что устройство куплено у вас</td></tr>
  </tbody>
</table>
<p><strong>Практические правила:</strong></p>
<ul>
  <li><strong>Проверяйте IMEI не по коробке, а на самом устройстве.</strong> Если набрать на телефоне <em>*#06#</em>, IMEI появится на экране. Если коробка и устройство не совпадают, не принимайте товар.</li>
  <li><strong>У телефонов с двумя SIM-картами два IMEI.</strong> Решите внутри магазина, какой из них (например, первый) записывать как основной номер, и пусть все следуют одному правилу.</li>
  <li><strong>Вводите номер не вручную, а сканером.</strong> Одна ошибка в 15-значном номере обрывает всю историю. Сканирование штрихкода IMEI на коробке — самый надёжный способ.</li>
  <li><strong>Аксессуары ведите по обычному штрихкоду.</strong> Для недорогих товаров вроде чехлов, зарядных устройств и наушников серийный номер не нужен — они продаются по обычному штрихкоду с учётом остатка.</li>
</ul>
<p>В Азербайджане регистрация мобильных устройств ведётся через отдельную государственную систему. О статусе регистрации продаваемых устройств и о том, какую информацию нужно сообщать покупателю, смотрите официальный источник (imei.az).</p>

<h2>3. Гарантийные споры: почему важен чек</h2>
<p>Самый частый спор при гарантийных обращениях — вопрос «куплен ли телефон у вас?». Если в чеке рядом с названием модели указан и IMEI, ответ простой: номер в чеке покупателя совпадает с номером устройства.</p>
<ul>
  <li><strong>Выдавайте чек при каждой продаже.</strong> Телефон, проданный без чека, потом становится проблемой и для вас, и для покупателя.</li>
  <li><strong>Оформите условия гарантии письменно.</strong> Срок, в каких случаях гарантия не действует (удар, вода, вскрытое устройство), куда отправляется устройство — всё это нужно сообщить покупателю до продажи.</li>
  <li><strong>Уточните юридическую сторону.</strong> Условия гарантии и возврата должны соответствовать законодательству о защите прав потребителей — по точным срокам и обязательствам проконсультируйтесь с юристом.</li>
</ul>
<p>Примечание: в RS POS IMEI указывается в чеке, но программа не предлагается как отдельный модуль для учёта ремонта или сервисных заказов. Если в вашем магазине есть сервисный отдел, его учёт планируйте отдельно.</p>

<h2>4. Продажа в рассрочку (по частям)</h2>
<p>В магазинах телефонов значительная часть продаж проходит с оплатой по частям. Проблема не в самой продаже, а в последующих месяцах: кто сколько заплатил, у кого платёж просрочен, какой договор закрыт. Отслеживать это по тетради или в Excel для десятков покупателей сложно.</p>
<p>В RS POS продажа в рассрочку оформляется договором:</p>
<ol>
  <li><strong>Вводятся срок и первоначальный взнос.</strong> Например, 6 или 12 месяцев и сумма первоначального взноса.</li>
  <li><strong>График ежемесячных платежей строится автоматически.</strong> Дата и сумма каждого платежа видны в графике.</li>
  <li><strong>Договор распечатывается.</strong> Он подписывается с покупателем, один экземпляр остаётся в магазине.</li>
  <li><strong>Каждый платёж фиксируется чеком.</strong> Остаток долга уменьшается, история сохраняется.</li>
</ol>
<p><strong>Пример (условные цифры):</strong> цена телефона в рассрочку — 1 800 ₼, первоначальный взнос — 300 ₼, срок — 6 месяцев. Оставшиеся 1 500 ₼ делятся на шесть месяцев — по 250 ₼ в месяц. Если покупатель не вносит платёж за третий месяц, он появляется в списке просроченных платежей.</p>
<p>Правила продажи в рассрочку (форму договора, дополнительную плату, условия просрочки) готовьте вместе с юристом. Программа ведёт график и платежи, но юридическое содержание договора — ваша ответственность.</p>

<h2>5. Поручитель, просроченные платежи и долговая книга</h2>
<p>Данные поручителя покупателя в рассрочку в RS POS привязываются непосредственно к договору. Когда платёж задерживается, не нужно искать контакты поручителя — они находятся в самом договоре.</p>
<p>Раздел долгов показывает просроченные платежи отдельно и даёт готовый список для связи с покупателями. Практическое правило:</p>
<ul>
  <li><strong>Каждое утро просматривайте список.</strong> Напомнить покупателю в первый же день после даты платежа проще, чем искать долг через несколько недель.</li>
  <li><strong>Фиксируйте каждый контакт.</strong> Кто и когда звонил, что пообещал покупатель.</li>
  <li><strong>Принимайте и записывайте частичные платежи.</strong> RS POS сохраняет частичные платежи по долгам и их историю.</li>
</ul>
<p>Если помимо рассрочки вы продаёте знакомым покупателям ещё и в долг, эти долги видны в том же месте. Подробнее: <a href="/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026">продажа в долг и долговая книга</a>.</p>

<h2>6. Цены за наличные, в долг и в рассрочку</h2>
<p>В магазинах телефонов цена одного и того же устройства за наличные и в рассрочку обычно различается. Если в программе только одна цена, кассир каждый раз считает разницу вручную — а это и ошибки, и споры.</p>
<p>В RS POS для каждого товара отдельно хранятся цена продажи, цена в долг и цена в рассрочку.</p>
<table>
  <thead>
    <tr><th>Вид продажи</th><th>Цена (условный пример)</th><th>Как оплачивается</th></tr>
  </thead>
  <tbody>
    <tr><td>Наличные / карта</td><td>1 550 ₼</td><td>Единовременно</td></tr>
    <tr><td>В долг</td><td>1 600 ₼</td><td>В согласованный срок, через долговую книгу</td></tr>
    <tr><td>Рассрочка</td><td>1 800 ₼</td><td>Первоначальный взнос + ежемесячный график, по договору</td></tr>
  </tbody>
</table>
<p>Открыто называйте цены покупателю заранее: с покупателем, который знает, насколько цена в рассрочку отличается от цены за наличные, и какую общую сумму он заплатит, потом бывает меньше споров.</p>

<h2>7. Прибыль по каждому устройству</h2>
<p>Для дорогого товара средняя прибыль обманчива. Одна партия одной и той же модели может быть закуплена по 1 300 ₼, следующая — по 1 380 ₼; один телефон продаётся за наличные, другой — в рассрочку. Отчёт о прибыли RS POS показывает себестоимость и цену продажи по каждому устройству — так вы видите, сколько принесла каждая продажа.</p>
<ul>
  <li><strong>Оценивайте продажи в рассрочку отдельно.</strong> Цена в рассрочку выше, но деньги поступают месяцами, и есть риск просрочки.</li>
  <li><strong>Делая скидку, смотрите на себестоимость.</strong> В телефонах маржа узкая — скидка в несколько процентов может съесть всю прибыль.</li>
  <li><strong>Следите за залежавшимися моделями.</strong> Телефоны быстро устаревают: когда выходит новая модель, цена старой падает. Вовремя продать залежавшиеся устройства выгоднее.</li>
</ul>
<p>RS POS отслеживает себестоимость по FIFO — партия, закупленная раньше, считается проданной первой. Подробнее: <a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">что такое себестоимость по FIFO</a>.</p>

<h2>8. Склад, инвентаризация, сотрудники и безопасность</h2>
<p>Телефон маленький и дорогой — риск потерь выше, чем у других товаров. Для контроля:</p>
<ul>
  <li><strong>Приёмка товара</strong> — накладные поставщиков, возвраты, частичная оплата и учёт долга перед поставщиком.</li>
  <li><strong>Инвентаризация</strong> — проверяйте телефоны не по количеству, а по номерам: каждый IMEI должен быть либо на полке, либо в чеке продажи. В RS POS проводится инвентаризация.</li>
  <li><strong>Несколько складов и магазинов</strong> — витрина, задний склад и филиалы ведутся как отдельные склады, товар перемещается через перемещения.</li>
  <li><strong>Отдельная учётная запись для каждого продавца</strong> — роли администратора и кассира, система прав доступа.</li>
  <li><strong>Журнал аудита</strong> — можно увидеть, кто выполнил такие операции, как скидка, возврат и удаление.</li>
  <li><strong>Двухфакторная аутентификация (2FA)</strong> и ежедневное облачное резервное копирование.</li>
</ul>
<p>RS POS — облачная система, и для работы нужен интернет.</p>

<h2>9. Цены и вопросы при выборе программы</h2>
<p>Цены RS POS открыто указаны на rspos.az (ноябрь 2026):</p>
<table>
  <thead>
    <tr><th>Тариф</th><th>Цена</th><th>Кассиры</th><th>Кассы</th><th>Склады</th></tr>
  </thead>
  <tbody>
    <tr><td>Basic</td><td>100 ₼/мес.</td><td>2</td><td>1</td><td>1</td></tr>
    <tr><td>Pro</td><td>150 ₼/мес.</td><td>10</td><td>3</td><td>3</td></tr>
    <tr><td>Enterprise</td><td>200 ₼/мес.</td><td>Без ограничений</td><td>5</td><td>Без ограничений</td></tr>
  </tbody>
</table>
<p>Во всех тарифах количество товаров не ограничено. Есть 14 дней бесплатного пробного периода, данные карты не требуются. Общее сравнение цен: <a href="/blog-details/stoimost-pos-sistemy-azerbaydzhan-2026">стоимость POS-системы в Азербайджане</a>.</p>
<h3>Что проверить перед выбором любой программы для магазина телефонов</h3>
<ul>
  <li>Вводится ли IMEI/серийный номер каждой единицы при приёмке товара и при продаже?</li>
  <li>Отображается ли IMEI в чеке?</li>
  <li>Есть ли договор рассрочки, первоначальный взнос и автоматический ежемесячный график?</li>
  <li>Распечатывается ли договор, привязываются ли к нему данные поручителя?</li>
  <li>Видны ли просроченные платежи отдельным списком?</li>
  <li>Хранятся ли отдельно цены за наличные, в долг и в рассрочку?</li>
  <li>Можно ли увидеть прибыль по каждому устройству?</li>
  <li>Есть ли отдельные учётные записи для продавцов и журнал операций?</li>
  <li>Есть ли бесплатный пробный период и можно ли протестировать программу на ваших реальных товарах?</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какая программа нужна магазину телефонов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Программа, которая отслеживает каждое устройство отдельно по IMEI или серийному номеру, показывает номер в чеке, оформляет продажу в рассрочку с договором и ежемесячным графиком, показывает просроченные платежи и рассчитывает прибыль по каждому устройству. RS POS объединяет эти возможности в одной облачной системе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как IMEI вводится в программу?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">При приёмке товара вводится IMEI или серийный номер каждой единицы. При продаже кассир выбирает конкретный номер, и этот номер отображается в чеке.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как строится график платежей по рассрочке?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Вводятся срок и первоначальный взнос, график ежемесячных платежей создаётся автоматически. Договор распечатывается, а каждый платёж фиксируется чеком.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как увидеть просроченные платежи по рассрочке?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Раздел долгов RS POS показывает просроченные платежи отдельно и даёт готовый список для связи с покупателями. Данные поручителя также привязаны к договору.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Могут ли цены за наличные и в рассрочку различаться?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. В RS POS для каждого товара отдельно хранятся цена продажи, цена в долг и цена в рассрочку.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит программа для магазина телефонов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS предлагается в трёх тарифах: Basic 100 ₼/мес., Pro 150 ₼/мес. и Enterprise 200 ₼/мес. Во всех тарифах неограниченное количество товаров и 14 дней бесплатного пробного периода, данные карты не требуются.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-magazina-odezhdy-2027">Программа для магазина одежды</a></li>
  <li><a href="/blog-details/kassovaya-programma-dlya-produktovogo-magazina-2027">Кассовая программа для продуктового магазина</a></li>
  <li><a href="/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026">Продажа в долг и долговая книга</a></li>
  <li><a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">Что такое себестоимость по FIFO?</a></li>
  <li><a href="/blog-details/stoimost-pos-sistemy-azerbaydzhan-2026">Стоимость POS-системы в Азербайджане</a></li>
</ul>

<h2>Итог</h2>
<p>Порядок в магазине телефонов начинается с номера. Когда IMEI каждого устройства вводится при приёмке товара и отображается в чеке, гарантийные споры решаются легко. Когда продажа в рассрочку оформляется с договором, автоматическим графиком платежей и данными поручителя, просрочки видны вовремя. А отдельные цены за наличные и в рассрочку, прибыль по каждому устройству и инвентаризация по номерам предотвращают потери дорогого товара.</p>
<p><strong>Хотите управлять своим магазином телефонов из одной системы? Познакомьтесь с <a href="/mehsullar/rspos">RS POS</a></strong> — 14 дней бесплатного пробного периода, карта не требуется: <a href="https://rspos.az/telefon-magazasi-proqrami" rel="noopener" target="_blank">rspos.az</a>. Если вашему магазину нужен сайт или индивидуальная система: <a href="/kontakty">свяжитесь с нами</a>.</p>
<p><small><em>Эта статья носит общий информационный характер. По условиям продажи в рассрочку, гарантии и возврата обращайтесь к законодательству и к юристу. Цены в примерах условные. Возможности и цены RS POS описаны по данным rspos.az по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'telefon-magazasi-ucun-proqram-2027'],
            [
                'slug_en' => 'phone-store-pos-software-2027',
                'slug_ru' => 'programma-dlya-magazina-telefonov-2027',
                'title_az' => 'Telefon Mağazası üçün Proqram: IMEI Uçotu, Kreditlə Satış, Ödəniş Cədvəli, Zamin və Cihaz üzrə Mənfəət (2027)',
                'title_en' => 'POS Software for a Phone Store: IMEI Tracking, Instalment Sales, Payment Schedules, Guarantors and Profit per Device (2027)',
                'title_ru' => 'Программа для магазина телефонов: учёт IMEI, продажа в рассрочку, график платежей, поручитель и прибыль с устройства (2027)',
                'review_az' => 'Mobil telefon və elektronika mağazası üçün: hər cihazın IMEI və seriya nömrəsi ilə uçotu, nömrənin çekdə göstərilməsi və zəmanət mübahisələri, kreditlə satış müqaviləsi, ilkin ödəniş və avtomatik aylıq cədvəl, zamin, gecikən ödənişlər siyahısı, nağd, nisyə və kredit qiymətləri, hər cihaz üzrə mənfəət, nömrə ilə sayım, RS POS qiymətləri və seçim siyahısı.',
                'review_en' => 'For mobile phone and electronics stores: tracking every device by IMEI and serial number, showing the number on the receipt and settling warranty disputes, instalment contracts with a down payment and an automatic monthly schedule, guarantors, an overdue payments list, separate cash, pay-later and instalment prices, profit per device, counting stock by number, RS POS pricing and a buying checklist.',
                'review_ru' => 'Для магазинов телефонов и электроники: учёт каждого устройства по IMEI и серийному номеру, номер в чеке и гарантийные споры, договор рассрочки с первым взносом и автоматическим графиком платежей, поручитель, список просроченных платежей, отдельные цены за наличные, в долг и в рассрочку, прибыль с каждого устройства, инвентаризация по номерам, цены RS POS и чек-лист выбора.',
                'date_az' => '10 Noyabr 2026',
                'date_en' => 'November 10, 2026',
                'date_ru' => '10 Ноября 2026',
                'photo' => 'cover-phone-pos-az.png',
                'photo_en' => 'cover-phone-pos-en.png',
                'photo_ru' => 'cover-phone-pos-ru.png',
                'meta_title_az' => 'Telefon Mağazası üçün Proqram 2027: IMEI, Kredit, Borc | RS Code',
                'meta_title_en' => 'Phone Store POS Software 2027: IMEI, Instalments, Debts | RS Code',
                'meta_title_ru' => 'Программа для магазина телефонов 2027: IMEI, рассрочка | RS Code',
                'meta_description_az' => 'Telefon mağazası proqramı necə seçilir: hər cihaz üçün IMEI uçotu, çekdə seriya nömrəsi, kredit müqaviləsi və ödəniş cədvəli, zamin, gecikən ödənişlər və cihaz üzrə mənfəət.',
                'meta_description_en' => 'How to choose phone store software: IMEI tracking per device, serial number on the receipt, instalment contracts and schedules, guarantors, overdue payments and profit per device.',
                'meta_description_ru' => 'Как выбрать программу для магазина телефонов: учёт IMEI, серийный номер в чеке, договор рассрочки и график платежей, поручитель, просрочки и прибыль с устройства.',
                'meta_keywords_az' => 'telefon mağazası proqramı, telefon mağazası üçün kassa, imei uçotu, seriya nömrəsi uçotu, kreditlə satış proqramı, hissə-hissə ödəniş, ödəniş cədvəli, zamin, rs pos, 2027',
                'meta_keywords_en' => 'phone store pos, mobile phone shop software, imei tracking, serial number tracking, instalment sales software, payment schedule, guarantor, rs pos, 2027',
                'meta_keywords_ru' => 'программа для магазина телефонов, касса для магазина телефонов, учёт imei, учёт серийных номеров, продажа в рассрочку программа, график платежей, поручитель, rs pos, 2027',
                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
