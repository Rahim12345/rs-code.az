<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #89 — Tikinti materialları mağazası üçün proqram (2027). RS POS sahə silsiləsinin 5-cisi; rspos.az/tikinti-materiallari-proqrami.
 * Faktlar YALNIZ rspos.az (2026-11-13) + ümumi RS POS faktları: vahidlər ədəd/metr/kq/litr/qutu + öz vahidi (m², kisə, rulon); 0,001 dəqiqlik; qablaşdırma (rulon=100 m)
 * öz miqdarı və qiyməti ilə; müştəri kartı "Qiymətlər" bölməsində məhsul üzrə qiymət; borc dəftəri, qismən ödəniş, kredit cədvəli, müqavilə çapı;
 * alış qaiməsi, tədarükçü borcu/ödənişi, tədarükçüyə qaytarma; silinmə sənədi səbəblə; FIFO; rollar/2FA/audit; 100/150/200 ₼, 14 gün.
 * Kredit limiti, çatdırılma, sifariş/rezerv, müştəri qaytarması, e-qaimə, ümumi vahid çevirmə İDDİA EDİLMİR.
 */
class Blog89ConstructionPosSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Tikinti materialları mağazasında bir məhsul bir neçə cür satılır. Kabel həm metrlə, həm də bütöv rulonla gedir. Kafel kvadratmetrlə hesablanır, sement kisə ilə, mismar kiloqramla, boya litrlə. Usta hər gün gəlir və özünə xüsusi qiymət gözləyir, podratçı malı nisyə götürür və "ay sonu hesablaşarıq" deyir. Əgər proqram yalnız "ədəd" bilirsə, qalıq bir həftəyə pozulur: 12,5 metr kabel satılıb, amma sistemdə ya 12, ya da 13 yazılıb.</p>
<p>Bu yazı 2027-ci ildə tikinti materialları, təsərrüfat malları və ya santexnika-elektrik mağazası idarə edən sahibkarlar üçündür. Ölçü vahidlərini, kəsrli miqdarı, rulon və kisə kimi qablaşdırma satışını, usta və podratçı qiymətlərini, nisyəni, tədarükçü qaimələrini, sınma və itkinin silinməsini addım-addım nəzərdən keçiririk. Nümunə kimi RS Code-un hazırladığı <a href="/mehsullar/rspos">RS POS</a> bulud kassa proqramının imkanlarından istifadə edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Tikinti mağazası proqramını nə fərqləndirir?</td><td>Metr, kq, m², kisə və rulonla satış, kəsrli miqdar</td></tr>
    <tr><td>Kabeli həm metrlə, həm rulonla satmaq olarmı?</td><td>Bəli, qalıq metrlə saxlanılır, rulon isə qablaşdırma kimi əlavə olunur (məs. 1 rulon = 100 m)</td></tr>
    <tr><td>Kvadratmetrlə satmaq olarmı?</td><td>Bəli, m² vahidi əlavə olunur və kəsrli miqdar dəstəklənir</td></tr>
    <tr><td>Ustaya xüsusi qiymət necə verilir?</td><td>Müştəri kartının "Qiymətlər" bölməsində məhsul üzrə qiymət, kassada avtomatik</td></tr>
    <tr><td>Podratçı borcları necə izlənir?</td><td>Borc dəftəri, qismən ödəniş, kredit cədvəli və müqavilə çapı</td></tr>
    <tr><td>Sınan malı necə silmək olar?</td><td>Silinmə sənədi ilə, hər mal üçün səbəb yazılaraq</td></tr>
  </tbody>
</table>

<h2>1. Tikinti Mağazası Niyə Ayrı Yanaşma Tələb Edir</h2>
<p>Ərzaq marketində demək olar ki, hər məhsul ədəd və ya çəki ilə satılır. Tikinti materiallarında isə eyni rəfdə beş fərqli ölçü vahidi ola bilər, malın bir hissəsi qablaşdırma ilə, bir hissəsi açıq satılır, müştərilərin böyük hissəsi isə usta və podratçılardır, onlar adətən xüsusi qiymətlə və nisyə alırlar. Ona görə tikinti mağazası proqramı bu suallara cavab verməlidir:</p>
<ul>
  <li><strong>Qalıq düzgün vahiddədirmi?</strong> 12,5 metr kabel satılıbsa, qalıqdan dəqiq 12,5 metr çıxılmalıdır.</li>
  <li><strong>Rulon, kisə və qutu satanda qalıq necə dəyişir?</strong> Bir rulon satılanda qalıqdan rulonun içindəki metr çıxılmalıdır.</li>
  <li><strong>Hansı ustaya hansı qiymət düşür?</strong> Bu, kassirin yaddaşına qalmamalıdır.</li>
  <li><strong>Kim nə qədər borcludur?</strong> Podratçı borcları ən böyük risk sahəsidir.</li>
  <li><strong>Nə sınıb, nə itib?</strong> Sınma və itki ayrıca qeydə alınmasa, sayımda "kəsir" kimi görünür.</li>
</ul>
<p>Ümumi mağaza proqramlarının müqayisəsi üçün baxın: <a href="/blog-details/magaza-proqrami-anbar-pos-azerbaycanda-2026">mağaza proqramı, anbar və POS bələdçisi</a>.</p>

<h2>2. Ölçü Vahidləri və Kəsrli Miqdar</h2>
<p>RS POS-da hazır vahidlər var: ədəd, metr, kq, litr və qutu. Bunlardan əlavə öz vahidlərinizi yarada bilərsiniz, məsələn m², kisə, rulon. Miqdar 0,001 dəqiqliyi ilə alınıb satılır, yəni 12,5 metr kabel və ya 3,75 m² kafel qalıqdan dəqiq çıxılır.</p>
<table>
  <thead>
    <tr><th>Məhsul</th><th>Qalıq vahidi</th><th>Nümunə satış</th></tr>
  </thead>
  <tbody>
    <tr><td>Elektrik kabeli</td><td>metr</td><td>12,5 m</td></tr>
    <tr><td>Kafel</td><td>m²</td><td>18,4 m²</td></tr>
    <tr><td>Mismar, bərkidici</td><td>kq</td><td>2,3 kq</td></tr>
    <tr><td>Boya, astar</td><td>litr</td><td>2,5 l</td></tr>
    <tr><td>Sement, gips</td><td>kisə</td><td>10 kisə</td></tr>
    <tr><td>Kran, açar, lampa</td><td>ədəd</td><td>3 ədəd</td></tr>
  </tbody>
</table>
<p><strong>Praktik qayda:</strong> hər məhsul üçün qalıq vahidini bir dəfə düzgün seçin, yəni malı ən çox hansı vahiddə satırsınızsa, ondan istifadə edin. Kabeli metrlə, kafeli m²-lə saxlamaq sonradan hesabatı da sadələşdirir. Mal qəbulunda tədarükçünün qaiməsindəki vahidi öz vahidinizə çevirib daxil edin, məsələn qutu ilə gələn kafeli qutudakı m²-ə görə.</p>

<h2>3. Qablaşdırma ilə Satış: Rulon, Kisə, Qutu</h2>
<p>Bir çox mal həm açıq, həm də qablaşdırma ilə satılır: kabel metrlə və rulonla, bərkidici kq ilə və qutu ilə. RS POS-da qutu, kisə və rulon üçün ayrıca miqdar və qiymət təyin olunur. Qablaşdırma satılanda qalıqdan onun içindəki miqdar çıxılır.</p>
<p><strong>Nümunə:</strong> kabelin qalığı metrlə aparılır. "Rulon" qablaşdırma kimi əlavə olunur: 1 rulon = 100 m. Müştəri bir rulon alanda qalıqdan 100 metr çıxılır. Başqa müştəri 15 metr alanda isə qalıqdan 15 metr çıxılır. Beləliklə həm açıq, həm də qablaşdırma satışı eyni qalıqdan gedir.</p>
<ul>
  <li><strong>Qablaşdırma qiymətini ayrıca qoyun.</strong> Rulonun qiyməti çox vaxt 100 metrin açıq qiymətindən ucuz olur. Bu, toplu alışı həvəsləndirir.</li>
  <li><strong>Açılmış qablaşdırmanı izləyin.</strong> Rulon açılıb metrlə satılmağa başlayanda qalıq yenə metrlə düzgün qalır, yəni ayrıca əməliyyat lazım deyil.</li>
</ul>

<h2>4. Usta və Podratçı Qiymətləri</h2>
<p>Tikinti mağazasının sadiq müştəriləri ustalardır. Onlar həm özləri alır, həm də sifarişçilərini sizə gətirirlər, ona görə xüsusi qiymət gözləyirlər. Problem endirimin kassada əllə edilməsindədir: kassir hər dəfə yadda saxlamalı və ya soruşmalı olur, nəticədə endirimlər fərqli olur və nəzarət itir.</p>
<p>RS POS-da hər müştəri üçün məhsul üzrə ayrıca qiymət müştəri kartının "Qiymətlər" bölməsində təyin olunur. Kassada həmin müştəri seçiləndə onun qiyməti avtomatik tətbiq edilir.</p>
<p><strong>Praktik qaydalar:</strong></p>
<ul>
  <li>Usta qiymətini bütün mallara yox, ustaların çox aldığı mallara verin.</li>
  <li>Müştəri kartında ustanın adı və telefonu dəqiq olsun, belə olanda borc və alış tarixçəsi də ona bağlanır.</li>
  <li>Qiymət siyahısını vaxtaşırı yeniləyin: alış qiyməti artanda usta qiyməti də yenilənməlidir, əks halda marja sıfıra düşə bilər.</li>
</ul>

<h2>5. Nisyə, Kredit Cədvəli və Podratçı Borcları</h2>
<p>Podratçılar adətən obyekt üzrə alır və ödənişi sifarişçidən pul gələndən sonra edir. RS POS-da nisyə satışlar borc dəftərinə yazılır, qismən ödənişlər görünür. Daha böyük məbləğlər üçün kredit cədvəli qurmaq və müqaviləni çap etmək də mümkündür.</p>
<ul>
  <li><strong>Hər podratçı ilə ödəniş müddətini yazılı razılaşdırın.</strong> "Ay sonu" əvəzinə konkret tarix yazın.</li>
  <li><strong>Borc siyahısına həftəlik baxın.</strong> Borcu artan müştəriyə yeni mal verməzdən əvvəl ödənişi soruşun.</li>
  <li><strong>Böyük borclar üçün müqavilə çap edin.</strong> Cədvəl və imza mübahisələrin qarşısını alır.</li>
</ul>
<p>Qeyd: RS POS borcları və ödənişləri izləyir, amma avtomatik kredit limiti funksiyası təqdim olunmur, yəni limit qaydasını özünüz tətbiq edirsiniz. Ətraflı: <a href="/blog-details/nisye-satis-borc-defteri-2026">nisyə satış və borc dəftəri</a>.</p>

<h2>6. Tədarükçülər: Qaimə, Borc və Qaytarma</h2>
<p>Tikinti mağazası onlarla tədarükçü ilə işləyir: sement zavodu, kafel idxalçısı, elektrik malları distribyutoru. RS POS-da alış qaimələri, tədarükçü borcunun izlənməsi, tədarükçüyə ödənişlər və tədarükçüyə qaytarma sənədi var.</p>
<ul>
  <li><strong>Alış qaiməsi</strong> qalığı və maya dəyərini formalaşdırır. Vahid və miqdarı diqqətlə yoxlayın.</li>
  <li><strong>Tədarükçüyə qaytarma</strong> qüsurlu və ya səhv gələn malı qalıqdan düzgün çıxarır və tədarükçü borcunu azaldır.</li>
  <li><strong>Tədarükçü borcu</strong> həmişə görünür: kimə nə qədər ödənilməlidir.</li>
</ul>
<p>RS POS maya dəyərini FIFO üzrə izləyir, yəni əvvəl alınan partiya əvvəl satılmış sayılır. Tikinti materiallarında alış qiymətləri tez-tez dəyişdiyi üçün bu, mənfəəti düzgün görmək üçün vacibdir. Ətraflı: <a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO maya dəyəri nədir</a>.</p>

<h2>7. Sınma, İtki və Sayım</h2>
<p>Kafel sınır, kisə yırtılır, boya qabı zədələnir. Bunlar qeydə alınmasa, sayımda "kəsir" kimi görünür və səbəbini heç kim bilmir. RS POS-da silinmə sənədi ilə hər mal üçün səbəb yazılır, məsələn "sınıb" və ya "itib". İtkilər tarixçədə qalır.</p>
<ol>
  <li><strong>Sınma baş verən gün silin.</strong> Qalıqda sınmış mal "var" görünməsin.</li>
  <li><strong>Səbəbi dəqiq yazın.</strong> "Daşınmada sınıb", "anbarda islanıb" kimi qeydlər sonradan problemin harada olduğunu göstərir.</li>
  <li><strong>Ay sonu itkilərə baxın.</strong> Hansı mallarda və hansı səbəbdən itki çoxdur? Bəlkə saxlama və ya daşınma qaydası dəyişməlidir.</li>
  <li><strong>Müntəzəm sayım aparın.</strong> RS POS-un "RSPOS Sayım" adlı mobil tətbiqi də təqdim olunur.</li>
</ol>

<h2>8. Kassa, İşçilər və Təhlükəsizlik</h2>
<ul>
  <li><strong>Ödəniş növləri</strong>: nağd, kart, nisyə, kredit və ya qarışıq ödəniş.</li>
  <li><strong>Hər satıcıya ayrı hesab</strong>: admin və kassir rolları, icazə sistemi.</li>
  <li><strong>Audit jurnalı</strong>: endirim, qaytarma və silinmə kimi əməliyyatları kimin etdiyini görmək olar.</li>
  <li><strong>İki mərhələli giriş (2FA)</strong> və gündəlik bulud yedəkləməsi.</li>
</ul>
<p>RS POS bulud sistemidir və işləmək üçün internet tələb edir. Tikinti şirkəti və ya təchizatçı üçün sayt da lazımdırsa, baxın: <a href="/blog-details/tikinti-techizat-sirketi-ucun-sayt-2027">tikinti və təchizat şirkəti üçün sayt</a>.</p>

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
<p>Bütün planlarda limitsiz məhsul var. 14 gün pulsuz sınaq var, kart məlumatı tələb olunmur. Qiymətlərin ümumi müqayisəsi: <a href="/blog-details/pos-sistemi-qiymeti-azerbaycanda-2026">POS sistemi qiyməti Azərbaycanda</a>.</p>
<h3>Hər hansı tikinti mağazası proqramını seçməzdən əvvəl yoxlayın</h3>
<ul>
  <li>Metr, kq, litr, m², kisə, rulon kimi vahidlər varmı və öz vahidinizi əlavə etmək olurmu?</li>
  <li>Kəsrli miqdar (məsələn, 12,5 m) dəstəklənirmi?</li>
  <li>Rulon, kisə, qutu kimi qablaşdırma satışı qalığı düzgün azaldırmı?</li>
  <li>Usta və podratçılara məhsul üzrə xüsusi qiymət avtomatik tətbiq olunurmu?</li>
  <li>Borc dəftəri, qismən ödəniş və kredit cədvəli varmı?</li>
  <li>Tədarükçü qaiməsi, borcu və qaytarması aparılırmı?</li>
  <li>Sınma və itki səbəb göstərilərək silinə bilirmi?</li>
  <li>Pulsuz sınaq varmı və real mallarınızla sınamaq olarmı?</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tikinti materialları mağazası üçün hansı proqram lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Metr, kq, m², kisə və rulon kimi vahidlərlə və kəsrli miqdarla işləyən, qablaşdırma satışında qalığı düzgün azaldan, usta və podratçılara xüsusi qiyməti avtomatik tətbiq edən, borcları, tədarükçü qaimələrini və sınmanı izləyən proqram. RS POS bu imkanları bir bulud sistemində birləşdirir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kabeli həm metrlə, həm də rulonla satmaq olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Qalıq metrlə saxlanılır, rulon isə qablaşdırma kimi əlavə olunur, məsələn 1 rulon = 100 m. Rulon satılanda qalıqdan 100 metr çıxılır, açıq satışda isə satılan metr qədər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kafeli kvadratmetrlə satmaq olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Vahidlər siyahısına m² əlavə olunur və məhsul həmin vahiddə saxlanılır. Miqdar kəsrli ola bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ustaya xüsusi qiymət necə təyin olunur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Müştəri kartının "Qiymətlər" bölməsində məhsul üzrə qiymət yazılır. Kassada həmin müştəri seçiləndə qiymət avtomatik tətbiq olunur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sınmış malı qalıqdan necə silmək olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Qalıq düzəlişi sənədində "silinmə / azaltma" seçilir, mal, miqdar və səbəb yazılır. İtkilər tarixçədə qalır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tikinti mağazası proqramı neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS üç planda təklif olunur: Basic 100 ₼/ay, Pro 150 ₼/ay və Enterprise 200 ₼/ay. Bütün planlarda limitsiz məhsul və 14 gün pulsuz sınaq var, kart məlumatı tələb olunmur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/topdan-satis-proqrami-2027">Topdan satış proqramı</a></li>
  <li><a href="/blog-details/market-ucun-kassa-proqrami-2027">Market üçün kassa proqramı</a></li>
  <li><a href="/blog-details/nisye-satis-borc-defteri-2026">Nisyə satış və borc dəftəri</a></li>
  <li><a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO maya dəyəri nədir?</a></li>
  <li><a href="/blog-details/tikinti-techizat-sirketi-ucun-sayt-2027">Tikinti və təchizat şirkəti üçün sayt</a></li>
</ul>

<h2>Nəticə</h2>
<p>Tikinti materialları mağazasında nizam düzgün vahiddən başlayır. Qalıq metr, kq, m² və ya kisə ilə düzgün aparılanda, rulon və qutu satışı eyni qalıqdan çıxılanda, usta qiyməti kassada avtomatik tətbiq olunanda və podratçı borcları borc dəftərində görünəndə mağaza "təxmini" işləməkdən qurtulur. Tədarükçü qaiməsi və qaytarması, sınmanın səbəbi ilə silinməsi və FIFO maya dəyəri isə real qazancı görməyə imkan verir.</p>
<p><strong>Tikinti mağazanızı bir sistemdən idarə etmək istəyirsiniz? <a href="/mehsullar/rspos">RS POS</a> ilə tanış olun</strong>: 14 gün pulsuz sınaq, kart tələb olunmur, <a href="https://rspos.az/tikinti-materiallari-proqrami" rel="noopener" target="_blank">rspos.az</a>. Şirkətiniz üçün sayt və ya fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır. RS POS imkanları və qiymətləri noyabr 2026 vəziyyətinə görə rspos.az əsasında təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>In a construction materials shop, the same product is sold in several ways. Cable goes both by the metre and by the whole roll. Tiles are calculated by the square metre, cement by the sack, nails by the kilogram, paint by the litre. Tradespeople come in every day and expect a special price, while a contractor takes goods on credit and says, "we'll settle up at the end of the month". If your software only knows "pieces", your stock levels will be wrong within a week: 12.5 metres of cable has been sold, but the system shows either 12 or 13.</p>
<p>This article is for business owners who run a construction materials, hardware or plumbing and electrical supplies shop in 2027. We go step by step through units of measure, fractional quantities, selling by the pack such as rolls and sacks, prices for tradespeople and contractors, credit sales, supplier invoices, and writing off breakage and losses. As an example, we use the features of <a href="/mehsullar/rspos">RS POS</a>, the cloud POS software developed by RS Code.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What makes construction materials shop software different?</td><td>Selling by the metre, kg, m², sack and roll, with fractional quantities</td></tr>
    <tr><td>Can cable be sold both by the metre and by the roll?</td><td>Yes, stock is kept in metres and the roll is added as a pack (e.g. 1 roll = 100 m)</td></tr>
    <tr><td>Can goods be sold by the square metre?</td><td>Yes, an m² unit is added and fractional quantities are supported</td></tr>
    <tr><td>How is a tradesperson given a special price?</td><td>A per-product price in the "Prices" section of the customer card, applied automatically at the till</td></tr>
    <tr><td>How are contractor debts tracked?</td><td>Debt book, part payments, instalment schedule and contract printing</td></tr>
    <tr><td>How can broken goods be written off?</td><td>With a write-off document, recording a reason for each item</td></tr>
  </tbody>
</table>

<h2>1. Why a Construction Materials Shop Needs a Different Approach</h2>
<p>In a grocery store, almost every product is sold by the piece or by weight. With construction materials, however, the same shelf can hold five different units of measure, some goods are sold by the pack and some loose, and a large share of customers are tradespeople and contractors, who usually buy at a special price and on credit. That is why construction materials shop software must answer these questions:</p>
<ul>
  <li><strong>Is stock kept in the right unit?</strong> If 12.5 metres of cable has been sold, exactly 12.5 metres must be deducted from stock.</li>
  <li><strong>How does stock change when rolls, sacks and boxes are sold?</strong> When one roll is sold, the metres in that roll must be deducted from stock.</li>
  <li><strong>Which tradesperson gets which price?</strong> This should not be left to the cashier's memory.</li>
  <li><strong>Who owes how much?</strong> Contractor debts are the biggest area of risk.</li>
  <li><strong>What has been broken or lost?</strong> If breakage and losses are not recorded separately, they show up as a "shortage" in the stock count.</li>
</ul>
<p>For a comparison of general shop software, see: <a href="/blog-details/store-software-warehouse-pos-azerbaijan-2026">guide to shop software, warehouse and POS</a>.</p>

<h2>2. Units of Measure and Fractional Quantities</h2>
<p>RS POS comes with ready-made units: piece, metre, kg, litre and box. On top of these, you can create your own units, for example m², sack or roll. Quantities are bought and sold to a precision of 0.001, so 12.5 metres of cable or 3.75 m² of tiles is deducted from stock exactly.</p>
<table>
  <thead>
    <tr><th>Product</th><th>Stock unit</th><th>Example sale</th></tr>
  </thead>
  <tbody>
    <tr><td>Electrical cable</td><td>metre</td><td>12.5 m</td></tr>
    <tr><td>Tiles</td><td>m²</td><td>18.4 m²</td></tr>
    <tr><td>Nails, fasteners</td><td>kg</td><td>2.3 kg</td></tr>
    <tr><td>Paint, primer</td><td>litre</td><td>2.5 l</td></tr>
    <tr><td>Cement, plaster</td><td>sack</td><td>10 sacks</td></tr>
    <tr><td>Taps, switches, bulbs</td><td>piece</td><td>3 pieces</td></tr>
  </tbody>
</table>
<p><strong>Practical rule:</strong> choose the stock unit for each product correctly once — in other words, use the unit you sell that product in most often. Keeping cable in metres and tiles in m² also makes reporting simpler later on. When receiving goods, convert the unit on the supplier's invoice into your own unit before entering it, for example tiles that arrive in boxes according to the m² in each box.</p>

<h2>3. Selling by the Pack: Rolls, Sacks, Boxes</h2>
<p>Many goods are sold both loose and by the pack: cable by the metre and by the roll, fasteners by the kg and by the box. In RS POS, a separate quantity and price are set for boxes, sacks and rolls. When a pack is sold, the quantity it contains is deducted from stock.</p>
<p><strong>Example:</strong> cable stock is kept in metres. "Roll" is added as a pack: 1 roll = 100 m. When a customer buys one roll, 100 metres is deducted from stock. When another customer buys 15 metres, 15 metres is deducted. This way, both loose and pack sales come out of the same stock.</p>
<ul>
  <li><strong>Set a separate pack price.</strong> A roll is often cheaper than the loose price of 100 metres. This encourages bulk buying.</li>
  <li><strong>Keep track of opened packs.</strong> When a roll is opened and starts being sold by the metre, stock stays correct in metres, so no separate transaction is needed.</li>
</ul>

<h2>4. Prices for Tradespeople and Contractors</h2>
<p>The loyal customers of a construction materials shop are tradespeople. They buy for themselves and also bring their clients to you, so they expect a special price. The problem lies in giving the discount by hand at the till: the cashier has to remember or ask every time, so discounts vary and control is lost.</p>
<p>In RS POS, a separate per-product price for each customer is set in the "Prices" section of the customer card. When that customer is selected at the till, their price is applied automatically.</p>
<p><strong>Practical rules:</strong></p>
<ul>
  <li>Give tradesperson prices not on all goods, but on the goods tradespeople buy most.</li>
  <li>Make sure the tradesperson's name and phone number on the customer card are accurate; that way, their debt and purchase history are linked to them as well.</li>
  <li>Update the price list regularly: when the purchase price goes up, the tradesperson price must be updated too, otherwise the margin can drop to zero.</li>
</ul>

<h2>5. Credit Sales, Instalment Schedules and Contractor Debts</h2>
<p>Contractors usually buy per project and pay once money comes in from their client. In RS POS, credit (nisyə) sales are recorded in the debt book, and part payments are visible. For larger amounts, you can also set up an instalment schedule and print a contract.</p>
<ul>
  <li><strong>Agree payment terms in writing with each contractor.</strong> Write a specific date instead of "end of the month".</li>
  <li><strong>Review the debt list weekly.</strong> Before supplying new goods to a customer whose debt is growing, ask for payment.</li>
  <li><strong>Print a contract for large debts.</strong> A schedule and a signature prevent disputes.</li>
</ul>
<p>Note: RS POS tracks debts and payments, but an automatic credit limit feature is not offered — you apply the limit rule yourself. More details: <a href="/blog-details/customer-debt-book-credit-sales-2026">credit sales and the debt book</a>.</p>

<h2>6. Suppliers: Invoices, Debts and Returns</h2>
<p>A construction materials shop works with dozens of suppliers: a cement plant, a tile importer, an electrical goods distributor. RS POS has purchase invoices, supplier debt tracking, supplier payments and a return-to-supplier document.</p>
<ul>
  <li><strong>The purchase invoice</strong> forms stock levels and cost. Check the unit and quantity carefully.</li>
  <li><strong>A return to supplier</strong> correctly deducts defective or wrongly delivered goods from stock and reduces the supplier debt.</li>
  <li><strong>The supplier debt</strong> is always visible: who needs to be paid how much.</li>
</ul>
<p>RS POS tracks cost using FIFO, meaning the batch bought first is treated as sold first. Because purchase prices for construction materials change often, this matters for seeing your profit correctly. More details: <a href="/blog-details/what-is-fifo-cost-method-2026">what is the FIFO cost method</a>.</p>

<h2>7. Breakage, Losses and Stock Counts</h2>
<p>Tiles break, sacks tear, paint tins get damaged. If these are not recorded, they show up as a "shortage" in the stock count and nobody knows why. In RS POS, a write-off document records a reason for each item, for example "broken" or "lost". Losses stay in the history.</p>
<ol>
  <li><strong>Write off breakage on the day it happens.</strong> Broken goods should not appear as "in stock".</li>
  <li><strong>Record the reason precisely.</strong> Notes such as "broken in transit" or "got wet in the warehouse" show later where the problem lies.</li>
  <li><strong>Review losses at the end of the month.</strong> Which goods have the most losses, and for what reason? Perhaps the storage or transport procedure needs to change.</li>
  <li><strong>Carry out regular stock counts.</strong> RS POS also offers a mobile app called "RSPOS Sayım".</li>
</ol>

<h2>8. Till, Staff and Security</h2>
<ul>
  <li><strong>Payment methods</strong>: cash, card, on credit (nisyə), instalments or mixed payment.</li>
  <li><strong>A separate account for each salesperson</strong>: admin and cashier roles, a permissions system.</li>
  <li><strong>Audit log</strong>: you can see who carried out operations such as discounts, returns and write-offs.</li>
  <li><strong>Two-factor authentication (2FA)</strong> and daily cloud backups.</li>
</ul>
<p>RS POS is a cloud system and requires an internet connection to work. If a construction company or supplier also needs a website, see: <a href="/blog-details/construction-supply-company-website-2027">website for a construction and supply company</a>.</p>

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
<h3>Check before choosing any construction materials shop software</h3>
<ul>
  <li>Are there units such as metre, kg, litre, m², sack and roll, and can you add your own unit?</li>
  <li>Are fractional quantities (for example, 12.5 m) supported?</li>
  <li>Does selling by the pack, such as rolls, sacks and boxes, reduce stock correctly?</li>
  <li>Are special per-product prices for tradespeople and contractors applied automatically?</li>
  <li>Is there a debt book, part payments and an instalment schedule?</li>
  <li>Are supplier invoices, debts and returns kept?</li>
  <li>Can breakage and losses be written off with a reason?</li>
  <li>Is there a free trial, and can you test it with your real goods?</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What kind of software does a construction materials shop need?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Software that works with units such as metre, kg, m², sack and roll and with fractional quantities, reduces stock correctly when selling by the pack, applies special prices for tradespeople and contractors automatically, and tracks debts, supplier invoices and breakage. RS POS combines these features in one cloud system.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can cable be sold both by the metre and by the roll?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Stock is kept in metres and the roll is added as a pack, for example 1 roll = 100 m. When a roll is sold, 100 metres is deducted from stock; with a loose sale, the number of metres sold is deducted.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can tiles be sold by the square metre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. m² is added to the list of units and the product is kept in that unit. The quantity can be fractional.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How is a special price set for a tradesperson?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A per-product price is entered in the "Prices" section of the customer card. When that customer is selected at the till, the price is applied automatically.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can broken goods be written off from stock?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In the stock adjustment document, select "write-off / decrease" and enter the item, quantity and reason. Losses stay in the history.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does construction materials shop software cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS is offered in three plans: Basic at 100 ₼/month, Pro at 150 ₼/month and Enterprise at 200 ₼/month. All plans include unlimited products and a 14-day free trial, and no card details are required.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/wholesale-pos-software-2027">Wholesale Software</a></li>
  <li><a href="/blog-details/grocery-store-pos-software-2027">POS Software for Grocery Stores</a></li>
  <li><a href="/blog-details/customer-debt-book-credit-sales-2026">Credit Sales and the Debt Book</a></li>
  <li><a href="/blog-details/what-is-fifo-cost-method-2026">What Is the FIFO Cost Method?</a></li>
  <li><a href="/blog-details/construction-supply-company-website-2027">Website for a Construction and Supply Company</a></li>
</ul>

<h2>Conclusion</h2>
<p>Order in a construction materials shop starts with the right unit. When stock is kept correctly in metres, kg, m² or sacks, when roll and box sales come out of the same stock, when the tradesperson price is applied automatically at the till and when contractor debts are visible in the debt book, the shop stops working on guesswork. Supplier invoices and returns, writing off breakage with a reason, and FIFO cost then let you see your real profit.</p>
<p><strong>Want to run your construction materials shop from one system? Take a look at <a href="/mehsullar/rspos">RS POS</a></strong> — 14-day free trial, no card required: <a href="https://rspos.az/tikinti-materiallari-proqrami" rel="noopener" target="_blank">rspos.az</a>. If you need a website or a custom system for your company, <a href="/contact">get in touch with us</a>.</p>
<p><small><em>This article is for general information purposes. RS POS features and prices are described based on rspos.az as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>В магазине стройматериалов один и тот же товар продаётся по-разному. Кабель уходит и на метры, и целой бухтой (рулоном). Плитка считается в квадратных метрах, цемент — мешками, гвозди — килограммами, краска — литрами. Мастер приходит каждый день и ждёт особую цену, подрядчик берёт товар в долг и говорит: «В конце месяца рассчитаемся». Если программа знает только «штуки», остатки сбиваются за неделю: продано 12,5 метра кабеля, а в системе записано то 12, то 13.</p>
<p>Эта статья — для предпринимателей, которые в 2027 году управляют магазином стройматериалов, хозяйственных товаров или сантехники и электротоваров. Пошагово разберём единицы измерения, дробное количество, продажу упаковками — бухтами и мешками, цены для мастеров и подрядчиков, продажи в долг, накладные поставщиков, списание боя и потерь. В качестве примера используем возможности облачной кассовой программы <a href="/mehsullar/rspos">RS POS</a>, разработанной RS Code.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Чем отличается программа для магазина стройматериалов?</td><td>Продажа в метрах, кг, м², мешках и бухтах, дробное количество</td></tr>
    <tr><td>Можно ли продавать кабель и на метры, и бухтами?</td><td>Да, остаток хранится в метрах, а бухта добавляется как упаковка (напр., 1 бухта = 100 м)</td></tr>
    <tr><td>Можно ли продавать в квадратных метрах?</td><td>Да, добавляется единица м², дробное количество поддерживается</td></tr>
    <tr><td>Как дать мастеру особую цену?</td><td>Цена по товару в разделе «Цены» карточки клиента, на кассе — автоматически</td></tr>
    <tr><td>Как отслеживаются долги подрядчиков?</td><td>Долговая книга, частичные платежи, график рассрочки и печать договора</td></tr>
    <tr><td>Как списать разбитый товар?</td><td>Документом списания, с указанием причины по каждому товару</td></tr>
  </tbody>
</table>

<h2>1. Почему магазину стройматериалов нужен особый подход</h2>
<p>В продуктовом магазине почти каждый товар продаётся поштучно или на вес. В стройматериалах же на одной полке может быть пять разных единиц измерения, часть товара продаётся упаковками, часть — вразвес или на отрез, а значительная часть покупателей — мастера и подрядчики, которые обычно покупают по особой цене и в долг. Поэтому программа для магазина стройматериалов должна отвечать на такие вопросы:</p>
<ul>
  <li><strong>Ведётся ли остаток в правильной единице?</strong> Если продано 12,5 метра кабеля, из остатка должно списаться ровно 12,5 метра.</li>
  <li><strong>Как меняется остаток при продаже бухт, мешков и коробок?</strong> При продаже одной бухты из остатка должны списаться метры, которые в ней содержатся.</li>
  <li><strong>Какому мастеру какая цена положена?</strong> Это не должно держаться в памяти кассира.</li>
  <li><strong>Кто сколько должен?</strong> Долги подрядчиков — самая рискованная зона.</li>
  <li><strong>Что разбилось, что пропало?</strong> Если бой и потери не фиксируются отдельно, при инвентаризации они выглядят как «недостача».</li>
</ul>
<p>Для сравнения универсальных программ для магазинов смотрите: <a href="/blog-details/programma-magazin-sklad-pos-azerbajdzan-2026">руководство по программам для магазина, склада и POS</a>.</p>

<h2>2. Единицы измерения и дробное количество</h2>
<p>В RS POS есть готовые единицы: штука, метр, кг, литр и коробка. Помимо них можно создавать свои единицы, например м², мешок, бухта. Количество закупается и продаётся с точностью до 0,001, то есть 12,5 метра кабеля или 3,75 м² плитки списываются из остатка точно.</p>
<table>
  <thead>
    <tr><th>Товар</th><th>Единица остатка</th><th>Пример продажи</th></tr>
  </thead>
  <tbody>
    <tr><td>Электрический кабель</td><td>метр</td><td>12,5 м</td></tr>
    <tr><td>Плитка</td><td>м²</td><td>18,4 м²</td></tr>
    <tr><td>Гвозди, крепёж</td><td>кг</td><td>2,3 кг</td></tr>
    <tr><td>Краска, грунтовка</td><td>литр</td><td>2,5 л</td></tr>
    <tr><td>Цемент, гипс</td><td>мешок</td><td>10 мешков</td></tr>
    <tr><td>Смесители, выключатели, лампы</td><td>штука</td><td>3 шт.</td></tr>
  </tbody>
</table>
<p><strong>Практическое правило:</strong> один раз правильно выберите единицу остатка для каждого товара — ту, в которой вы чаще всего его продаёте. Если вести кабель в метрах, а плитку в м², это упростит и отчёты. При приёмке товара переводите единицу из накладной поставщика в свою, например плитку, пришедшую коробками, — по количеству м² в коробке.</p>

<h2>3. Продажа упаковками: бухта, мешок, коробка</h2>
<p>Многие товары продаются и поштучно (вразвес), и упаковками: кабель — на метры и бухтами, крепёж — на килограммы и коробками. В RS POS для коробки, мешка и бухты задаются отдельные количество и цена. При продаже упаковки из остатка списывается содержащееся в ней количество.</p>
<p><strong>Пример:</strong> остаток кабеля ведётся в метрах. «Бухта» добавляется как упаковка: 1 бухта = 100 м. Когда покупатель берёт одну бухту, из остатка списывается 100 метров. Когда другой покупатель берёт 15 метров, из остатка списывается 15 метров. Так и продажа на отрез, и продажа упаковкой идут из одного остатка.</p>
<ul>
  <li><strong>Задайте цену упаковки отдельно.</strong> Бухта часто стоит дешевле, чем 100 метров на отрез. Это стимулирует оптовые покупки.</li>
  <li><strong>Следите за вскрытой упаковкой.</strong> Когда бухту вскрывают и начинают продавать на метры, остаток по-прежнему верно ведётся в метрах, то есть отдельная операция не нужна.</li>
</ul>

<h2>4. Цены для мастеров и подрядчиков</h2>
<p>Постоянные клиенты магазина стройматериалов — мастера. Они и сами покупают, и приводят к вам своих заказчиков, поэтому ждут особую цену. Проблема в том, что скидка делается на кассе вручную: кассиру приходится каждый раз помнить или спрашивать, в итоге скидки получаются разными и контроль теряется.</p>
<p>В RS POS для каждого клиента отдельная цена по товару задаётся в разделе «Цены» карточки клиента. Когда на кассе выбирают этого клиента, его цена применяется автоматически.</p>
<p><strong>Практические правила:</strong></p>
<ul>
  <li>Давайте цену для мастеров не на все товары, а на те, которые мастера покупают чаще всего.</li>
  <li>В карточке клиента должны быть точные имя и телефон мастера — тогда к нему привязываются и долги, и история покупок.</li>
  <li>Периодически обновляйте прайс-лист: когда растёт закупочная цена, нужно обновить и цену для мастеров, иначе маржа может упасть до нуля.</li>
</ul>

<h2>5. Продажи в долг, график рассрочки и долги подрядчиков</h2>
<p>Подрядчики обычно покупают под конкретный объект и платят после того, как получат деньги от заказчика. В RS POS продажи в долг записываются в долговую книгу, частичные платежи видны. Для более крупных сумм можно также составить график рассрочки и распечатать договор.</p>
<ul>
  <li><strong>Письменно согласуйте срок оплаты с каждым подрядчиком.</strong> Вместо «в конце месяца» указывайте конкретную дату.</li>
  <li><strong>Еженедельно просматривайте список долгов.</strong> Прежде чем отпустить новый товар клиенту, чей долг растёт, спросите об оплате.</li>
  <li><strong>Для крупных долгов печатайте договор.</strong> График и подпись предотвращают споры.</li>
</ul>
<p>Примечание: RS POS отслеживает долги и платежи, но функция автоматического кредитного лимита не предлагается — правило лимита вы применяете самостоятельно. Подробнее: <a href="/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026">продажа в долг и долговая книга</a>.</p>

<h2>6. Поставщики: накладные, долги и возвраты</h2>
<p>Магазин стройматериалов работает с десятками поставщиков: цементным заводом, импортёром плитки, дистрибьютором электротоваров. В RS POS есть приходные накладные, учёт долга перед поставщиком, платежи поставщикам и документ возврата поставщику.</p>
<ul>
  <li><strong>Приходная накладная</strong> формирует остаток и себестоимость. Внимательно проверяйте единицу и количество.</li>
  <li><strong>Возврат поставщику</strong> правильно списывает из остатка бракованный или ошибочно поставленный товар и уменьшает долг перед поставщиком.</li>
  <li><strong>Долг перед поставщиком</strong> виден всегда: кому и сколько нужно заплатить.</li>
</ul>
<p>RS POS ведёт себестоимость по FIFO, то есть партия, закупленная раньше, считается проданной первой. В стройматериалах закупочные цены часто меняются, поэтому это важно для правильного расчёта прибыли. Подробнее: <a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">что такое себестоимость по FIFO</a>.</p>

<h2>7. Бой, потери и инвентаризация</h2>
<p>Плитка бьётся, мешки рвутся, банки с краской повреждаются. Если это не фиксировать, при инвентаризации всё выглядит как «недостача», и никто не знает её причины. В RS POS документом списания по каждому товару указывается причина, например «разбито» или «утеряно». Потери сохраняются в истории.</p>
<ol>
  <li><strong>Списывайте в день, когда случился бой.</strong> Чтобы разбитый товар не числился в остатке как «в наличии».</li>
  <li><strong>Точно указывайте причину.</strong> Записи вроде «разбилось при перевозке» или «намокло на складе» потом покажут, где проблема.</li>
  <li><strong>В конце месяца просматривайте потери.</strong> По каким товарам и по какой причине потерь больше всего? Возможно, стоит изменить порядок хранения или перевозки.</li>
  <li><strong>Регулярно проводите инвентаризацию.</strong> Также предлагается мобильное приложение RS POS под названием «RSPOS Sayım».</li>
</ol>

<h2>8. Касса, сотрудники и безопасность</h2>
<ul>
  <li><strong>Способы оплаты</strong>: наличные, карта, в долг, в рассрочку или смешанная оплата.</li>
  <li><strong>Отдельная учётная запись для каждого продавца</strong>: роли администратора и кассира, система прав доступа.</li>
  <li><strong>Журнал аудита</strong>: видно, кто выполнял такие операции, как скидки, возвраты и списания.</li>
  <li><strong>Двухфакторная аутентификация (2FA)</strong> и ежедневное облачное резервное копирование.</li>
</ul>
<p>RS POS — облачная система, и для работы нужен интернет. Если строительной или снабженческой компании нужен ещё и сайт, смотрите: <a href="/blog-details/sajt-dlya-stroitelnoj-kompanii-2027">сайт для строительной и снабженческой компании</a>.</p>

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
<h3>Что проверить перед выбором любой программы для магазина стройматериалов</h3>
<ul>
  <li>Есть ли такие единицы, как метр, кг, литр, м², мешок, бухта, и можно ли добавить свою единицу?</li>
  <li>Поддерживается ли дробное количество (например, 12,5 м)?</li>
  <li>Правильно ли уменьшается остаток при продаже упаковками — бухтами, мешками, коробками?</li>
  <li>Применяется ли автоматически особая цена по товару для мастеров и подрядчиков?</li>
  <li>Есть ли долговая книга, частичные платежи и график рассрочки?</li>
  <li>Ведутся ли накладные поставщиков, долги перед ними и возвраты?</li>
  <li>Можно ли списывать бой и потери с указанием причины?</li>
  <li>Есть ли бесплатный пробный период и можно ли протестировать программу на ваших реальных товарах?</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какая программа нужна для магазина стройматериалов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Программа, которая работает с такими единицами, как метр, кг, м², мешок и бухта, и с дробным количеством, правильно уменьшает остаток при продаже упаковками, автоматически применяет особую цену для мастеров и подрядчиков, отслеживает долги, накладные поставщиков и бой. RS POS объединяет эти возможности в одной облачной системе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли продавать кабель и на метры, и бухтами?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Остаток хранится в метрах, а бухта добавляется как упаковка, например 1 бухта = 100 м. При продаже бухты из остатка списывается 100 метров, а при продаже на отрез — столько метров, сколько продано.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли продавать плитку в квадратных метрах?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. В список единиц добавляется м², и товар ведётся в этой единице. Количество может быть дробным.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как назначить мастеру особую цену?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В разделе «Цены» карточки клиента указывается цена по товару. Когда на кассе выбирают этого клиента, цена применяется автоматически.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как списать разбитый товар из остатка?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В документе корректировки остатков выбирается «списание / уменьшение», указываются товар, количество и причина. Потери сохраняются в истории.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит программа для магазина стройматериалов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS предлагается в трёх тарифах: Basic 100 ₼/мес., Pro 150 ₼/мес. и Enterprise 200 ₼/мес. Во всех тарифах неограниченное количество товаров и 14 дней бесплатного пробного периода, данные карты не требуются.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-optovoj-torgovli-2027">Программа для оптовой торговли</a></li>
  <li><a href="/blog-details/kassovaya-programma-dlya-produktovogo-magazina-2027">Кассовая программа для продуктового магазина</a></li>
  <li><a href="/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026">Продажа в долг и долговая книга</a></li>
  <li><a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">Что такое себестоимость по FIFO?</a></li>
  <li><a href="/blog-details/sajt-dlya-stroitelnoj-kompanii-2027">Сайт для строительной и снабженческой компании</a></li>
</ul>

<h2>Итог</h2>
<p>Порядок в магазине стройматериалов начинается с правильной единицы измерения. Когда остаток верно ведётся в метрах, кг, м² или мешках, продажи бухтами и коробками списываются из того же остатка, цена для мастеров автоматически применяется на кассе, а долги подрядчиков видны в долговой книге, магазин перестаёт работать «на глазок». А накладные и возвраты поставщикам, списание боя с указанием причины и себестоимость по FIFO позволяют видеть реальную прибыль.</p>
<p><strong>Хотите управлять магазином стройматериалов из одной системы? Познакомьтесь с <a href="/mehsullar/rspos">RS POS</a></strong> — 14 дней бесплатного пробного периода, карта не требуется: <a href="https://rspos.az/tikinti-materiallari-proqrami" rel="noopener" target="_blank">rspos.az</a>. Если вашей компании нужен сайт или индивидуальная система: <a href="/kontakty">свяжитесь с нами</a>.</p>
<p><small><em>Эта статья носит общий информационный характер. Возможности и цены RS POS описаны по данным rspos.az по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'tikinti-materiallari-magazasi-ucun-proqram-2027'],
            [
                'slug_en' => 'construction-materials-store-pos-software-2027',
                'slug_ru' => 'programma-dlya-magazina-strojmaterialov-2027',
                'title_az' => 'Tikinti Materialları Mağazası üçün Proqram: Metr, Kisə, Rulon, Usta Qiyməti, Podratçı Borcu və Sınma Uçotu (2027)',
                'title_en' => 'POS Software for a Construction Materials Store: Metres, Sacks, Rolls, Trade Prices, Contractor Debts and Breakage (2027)',
                'title_ru' => 'Программа для магазина стройматериалов: метры, мешки, бухты, цены для мастеров, долги подрядчиков и списание боя (2027)',
                'review_az' => 'Tikinti materialları və təsərrüfat malları mağazası üçün: ədəd, metr, kq, litr, m², kisə və rulon vahidləri, 0,001 dəqiqliklə kəsrli miqdar, rulon və kisə kimi qablaşdırma satışı, usta və podratçılara məhsul üzrə xüsusi qiymət, nisyə və kredit cədvəli, tədarükçü qaiməsi, borcu və qaytarması, sınma və itkinin səbəblə silinməsi, RS POS qiymətləri və seçim siyahısı.',
                'review_en' => 'For construction materials and hardware stores: piece, metre, kg, litre, m², sack and roll units, decimal quantities to 0.001, selling rolls and sacks as packs, product-specific prices for tradespeople and contractors, credit sales and instalment schedules, supplier invoices, debts and returns, writing off breakage and losses with a reason, RS POS pricing and a buying checklist.',
                'review_ru' => 'Для магазинов стройматериалов и хозтоваров: единицы штука, метр, кг, литр, м², мешок и бухта, дробные количества с точностью 0,001, продажа бухтами и мешками как упаковками, особые цены для мастеров и подрядчиков, продажи в долг и график рассрочки, приходные накладные, долги и возвраты поставщикам, списание боя и потерь с указанием причины, цены RS POS и чек-лист выбора.',
                'date_az' => '13 Noyabr 2026',
                'date_en' => 'November 13, 2026',
                'date_ru' => '13 Ноября 2026',
                'photo' => 'cover-construction-pos-az.png',
                'photo_en' => 'cover-construction-pos-en.png',
                'photo_ru' => 'cover-construction-pos-ru.png',
                'meta_title_az' => 'Tikinti Materialları Mağazası üçün Proqram 2027 | RS Code',
                'meta_title_en' => 'Construction Materials Store POS Software 2027 | RS Code',
                'meta_title_ru' => 'Программа для магазина стройматериалов 2027 | RS Code',
                'meta_description_az' => 'Tikinti mağazası proqramı necə seçilir: metr, kq, m², kisə və rulonla satış, kəsrli miqdar, usta qiyməti, podratçı borcu, tədarükçü qaiməsi və sınmanın silinməsi.',
                'meta_description_en' => 'How to choose construction store software: selling by metre, kg, m², sack and roll, decimal quantities, trade prices, contractor debts, supplier invoices and write-offs.',
                'meta_description_ru' => 'Как выбрать программу для стройматериалов: продажа метрами, кг, м², мешками и бухтами, дробные количества, цены мастерам, долги подрядчиков, списание боя.',
                'meta_keywords_az' => 'tikinti materialları mağazası proqramı, tikinti mağazası üçün kassa, təsərrüfat malları proqramı, metrlə satış, kisə və rulon, usta qiyməti, podratçı borcu, rs pos, 2027',
                'meta_keywords_en' => 'construction materials store pos, hardware store software, building supplies pos, sell by metre, sacks and rolls, contractor pricing, contractor debts, rs pos, 2027',
                'meta_keywords_ru' => 'программа для магазина стройматериалов, касса для строительного магазина, программа для хозтоваров, продажа метрами, мешки и бухты, цены для мастеров, долги подрядчиков, rs pos, 2027',
                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
