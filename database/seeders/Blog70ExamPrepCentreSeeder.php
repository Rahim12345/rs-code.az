<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * #70 — Abituriyent hazırlığı kurs mərkəzi necə idarə olunur: qruplar, sınaq imtahanları, nəticə analizi, valideyn hesabatı (2027).
 * Kursometr faktları yalnız resources/lang/az/products.php və kursometr.com-dandır: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət,
 * vaxtlı sınaqlar (ümumi və aralıq) müəllimin təyin etdiyi saatda açılıb-bağlanır, qapalı suallar avtomatik yoxlanır, PDF test toplusu sual bazasına,
 * ev tapşırıqları, ödəniş izləmə, valideyn kabineti (davamiyyət, qiymət, sınaq nəticəsi), mentor hesabı, qrupa görünən dərs yazıları/materiallar,
 * telefon brauzeri, Google ilə giriş, pulsuz qeydiyyat.
 * Çox filial, analitika paneli, SMS, onlayn ödəniş, qiymət və rəylər İDDİA EDİLMİR.
 * DİM: yalnız ümumi qeyd (ixtisas qrupları, qəbulun II mərhələsi, DİM-in öz sınaqları) — fənn siyahısı, tarix, bal rəqəmi verilmir; dim.gov.az-a istinad.
 * Fərdi sistem qiyməti "5 000 AZN-dən" — təxmini.
 * #45, #66, #67, #69 ilə təkrar etmir, link verir.
 */
class Blog70ExamPrepCentreSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Abituriyent hazırlığı kursu adi tədris mərkəzinə bənzəyir, amma işin ritmi tamam başqadır. Burada hər şey bir tarixə bağlıdır — imtahan gününə. Şagird və valideyn sizdən "dərs keçdik" yox, "bal artdı" cavabını gözləyir. Qrup düzgün yığılmayıbsa, sınaqlar nizamsız keçirilirsə və nəticələr təhlil olunmursa, mərkəz bunu ilin sonunda — artıq heç nəyi düzəltmək mümkün olmayanda görür.</p>
<p>Bu yazı qəbul və buraxılış imtahanlarına hazırlayan kurs mərkəzlərinin sahibləri və rəhbərləri üçündür: qruplar, illik dövr, sınaqlar və reytinq, nəticə analizi, valideyn, ödəniş, müəllim yükü və göstəricilər.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Qruplar necə bölünür?</td><td>Əvvəlcə ixtisas qrupu (və ya buraxılış sinfi), sonra giriş testinə görə səviyyə; qrup kiçik və eyni səviyyəli olmalıdır</td></tr>
    <tr><td>Sınaq nə qədər tez-tez keçirilir?</td><td>Mövzu üzrə qısa (aralıq) sınaqlar müntəzəm, real imtahana bənzər ümumi sınaq isə təxminən ayda bir dəfə; imtahana yaxın tezlik artırılır</td></tr>
    <tr><td>Reytinq necə ədalətli olur?</td><td>Eyni test, eyni vaxt, eyni şərait və əvvəlcədən elan olunmuş ballandırma; adla paylaşmaq üçün razılıq</td></tr>
    <tr><td>Nəticə ilə nə etməli?</td><td>Şagird və mövzu üzrə zəif yerləri tapmaq, dərs planını və ev tapşırığını buna görə dəyişmək</td></tr>
    <tr><td>Hansı göstəricilər izlənir?</td><td>Davamiyyət faizi, sınaq balının dinamikası, şagirdin qalma faizi, gecikən ödənişlər</td></tr>
    <tr><td>Nədə aparmaq rahatdır?</td><td>Qrup, cədvəl, sınaq, ödəniş və valideyn kabinetinin bir yerdə olduğu sistemdə — məsələn, <a href="/mehsullar/kursometr">Kursometr</a>; böyük şəbəkə üçün fərdi sistem</td></tr>
  </tbody>
</table>

<h2>Hazırlıq Kursu Adi Tədris Mərkəzindən Nə ilə Fərqlənir?</h2>
<p>Dil kursu və ya uşaq inkişaf mərkəzi il boyu eyni tempdə işləyə bilər. Hazırlıq kursunda isə üç fərq var:</p>
<ul>
  <li><strong>Son tarix sabitdir.</strong> İmtahan günü dəyişmir, ona görə proqram geriyə doğru planlaşdırılır: hansı mövzu nə vaxt bitməli, hansı ayda neçə sınaq olmalıdır.</li>
  <li><strong>Nəticə ölçülə biləndir.</strong> Hər sınaq bal verir və valideyn bu balı izləyir. Mərkəzin reputasiyası da elə bu rəqəmlərdən formalaşır.</li>
  <li><strong>Şagird fənn dəsti üzrə oxuyur.</strong> Bir neçə fənn, fərqli müəllimlər — cədvəl sıx və mürəkkəb olur.</li>
</ul>
<p>Tədris mərkəzinin ümumi idarəetməsi — qeydiyyat, modullar, hazır proqram və ya fərdi sistem seçimi — barədə ayrıca yazımız var: <a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">tədris mərkəzi üçün idarəetmə proqramı</a>. Burada isə yalnız imtahana hazırlığa xas məsələlərə baxırıq.</p>

<h2>Qrupları Necə Qurmalı: İxtisas Qrupu, Səviyyə və Cədvəl</h2>
<p>Azərbaycanda ali təhsil müəssisələrinə qəbul imtahanlarını Dövlət İmtahan Mərkəzi (DİM) <strong>ixtisas qrupları</strong> üzrə keçirir və hər qrupun öz fənn dəsti var. Buraxılış imtahanları da DİM tərəfindən təşkil olunur. Hansı ixtisas qrupuna hansı fənlərin daxil olduğu, imtahanın mərhələləri və ballandırma qaydası dəyişə bilər, ona görə hər tədris ilinin əvvəlində aktual məlumatı <strong>DİM-in rəsmi saytından (dim.gov.az)</strong> yoxlayın və proqramı ona uyğunlaşdırın.</p>
<p>Qrup yığarkən bu ardıcıllıq işləyir:</p>
<ol>
  <li><strong>İmtahan növü və ixtisas qrupu.</strong> Qəbula hazırlaşanları ixtisas qrupuna, buraxılışa hazırlaşanları sinfə görə ayırın. Ortaq fənlər üzrə müxtəlif ixtisas qruplarının şagirdləri bir qrupda ola bilər.</li>
  <li><strong>Səviyyə.</strong> Qeydiyyatda qısa giriş testi keçirin. Güclü şagirdi zəif qrupa salmaq hər ikisini itirmək deməkdir: biri darıxır, digəri geri qalır.</li>
  <li><strong>Qrup ölçüsü.</strong> Müəllimin hər şagirdin səhvini görə bildiyi qədər kiçik saxlayın. Qrup böyüdükcə fərdi analiz itir.</li>
  <li><strong>Cədvəl.</strong> Şagirdin məktəb saatlarını və digər fənləri nəzərə alın. Eyni şagirdin iki dərsi üst-üstə düşməməlidir.</li>
  <li><strong>Müəllim və otaq.</strong> Hər qrupa əsas müəllim, hər dərsə sabit otaq. Otaq cədvəli müəllim cədvəli ilə birlikdə qurulmalıdır, əks halda eyni saatda iki qrup bir otağa düşür.</li>
</ol>
<table>
  <thead>
    <tr><th>Qrup tipi</th><th>Kim üçün</th><th>Diqqət</th></tr>
  </thead>
  <tbody>
    <tr><td>Əsas (illik) qrup</td><td>Tədris ilinin əvvəlindən başlayan abituriyent və buraxılış sinfi şagirdləri</td><td>Proqram imtahan gününə qədər mövzu-mövzu planlanır</td></tr>
    <tr><td>Gücləndirmə qrupu</td><td>Sınaqda müəyyən mövzularda geri qalanlar</td><td>Qısa müddətli, konkret mövzular üzrə</td></tr>
    <tr><td>İntensiv qrup</td><td>İmtahandan əvvəlki son aylar</td><td>Əsasən sınaq və səhvlər üzərində iş</td></tr>
  </tbody>
</table>

<h2>Tədris İlinin Dövrü: Qeydiyyatdan İmtahana</h2>
<p>Hazırlıq kursunun ili təxminən dörd mərhələdən ibarətdir. Dəqiq imtahan tarixləri hər il DİM tərəfindən elan olunur, ona görə aşağıdakı cədvəl ümumi çərçivədir:</p>
<table>
  <thead>
    <tr><th>Mərhələ</th><th>Nə edilir</th><th>Rəhbər nəyə baxır</th></tr>
  </thead>
  <tbody>
    <tr><td>Qeydiyyat (yay sonu – payız əvvəli)</td><td>Giriş testi, qrupların yığılması, cədvəl, müqavilə və ödəniş şərtləri</td><td>Qrupların doluluğu, səviyyə bölgüsü</td></tr>
    <tr><td>Əsas tədris (payız – qış)</td><td>Mövzuların keçilməsi, aralıq sınaqlar, ev tapşırıqları</td><td>Davamiyyət, mövzu üzrə nəticələr</td></tr>
    <tr><td>Sınaq dövrü (qış – yaz)</td><td>Ümumi sınaqların sıxlaşması, gücləndirmə qrupları</td><td>Bal dinamikası, risk qrupundakı şagirdlər</td></tr>
    <tr><td>İntensiv dövr (imtahandan əvvəl)</td><td>Tam formatlı sınaqlar, səhvlər üzərində iş, vaxt idarəetməsi</td><td>Son sınaqların sabitliyi, şagirdlərin motivasiyası</td></tr>
  </tbody>
</table>
<p>Sınaq təqvimini ilin əvvəlində tərtib edib şagird və valideynlərə göndərin — tarixləri bilən valideyn şagirdin sınağı buraxmamasına özü nəzarət edir. DİM-in özünün də sınaq imtahanları təşkil etdiyini nəzərə alın — tarixlərini rəsmi saytdan izləyib öz təqviminizlə toqquşdurmayın.</p>

<h2>Sınaq İmtahanları: Tezlik, Şərait və Ədalətli Reytinq</h2>
<p>Sınaq hazırlıq kursunun əsas məhsuludur. Onu iki növə bölmək rahatdır:</p>
<ul>
  <li><strong>Aralıq sınaq</strong> — bir və ya bir neçə mövzu üzrə qısa test. Mövzu bitdikdən sonra keçirilir və müəllimə kimin nəyi başa düşmədiyini göstərir.</li>
  <li><strong>Ümumi sınaq</strong> — real imtahana maksimum bənzər tam test. Əksər mərkəzlər onu təxminən ayda bir dəfə keçirir, imtahana yaxın isə daha tez-tez.</li>
</ul>
<p>Ümumi sınaq real imtahanı yalnız o zaman əks etdirir ki, şərait də ona bənzəsin: eyni sual formatı, eyni vaxt, telefonsuz və köməksiz iş, əvvəlcədən bilinən ballandırma qaydası. Formatı və vaxtı DİM-in həmin il üçün açıqladığı məlumata uyğunlaşdırın. Qaydanı dəqiq bilmirsinizsə, faiz göstəricisi ilə işləyin və bunu valideynə açıq deyin.</p>
<p><strong>Reytinqi ədalətli etmək üçün:</strong></p>
<ul>
  <li>Müqayisə olunan bütün şagirdlər eyni testi eyni zaman çərçivəsində yazmalıdır. Sınaq bir saatda açılıb bir saatda bağlananda "sonra yazaram" və sualların ötürülməsi azalır.</li>
  <li>Reytinqi ixtisas qrupu daxilində tutun — fərqli fənn dəstləri olan şagirdləri bir siyahıda müqayisə etmək düzgün deyil.</li>
  <li>Sınaqda iştirak etməyənləri "0 bal" kimi yox, ayrıca qeyd edin, əks halda orta göstərici təhrif olunur.</li>
  <li>Ballar bərabər olduqda hansı qaydanın tətbiq olunduğunu əvvəlcədən elan edin.</li>
</ul>
<p><strong>Adla paylaşmaq üçün razılıq vacibdir.</strong> Şagirdin adı və balı fərdi məlumatdır. Reytinqi lövhədən, sosial şəbəkədən və ya ümumi qrup çatından adla paylaşmaq istəyirsinizsə, əvvəlcə şagirdin və valideynin razılığını alın. Razılıq olmadıqda şagirdə yalnız öz yerini və qrupun ortalamasını göstərin. Uğurlu nəticələri reklamda istifadə etmək üçün də ayrıca razılıq alın.</p>
<p>Testlərin hazırlanması, sual formatları və vaxtın hesablanması barədə ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</p>

<h2>Nəticə Analizi: Şagird və Mövzu Üzrə</h2>
<p>Sınaq keçirib balı elan etmək işin yarısıdır. Əsl dəyər nəticənin təhlilindədir. Hər sınaqdan sonra iki sual verin: <em>hansı şagirdin vəziyyəti dəyişib</em> və <em>hansı mövzunu qrup ümumiyyətlə mənimsəməyib</em>.</p>
<table>
  <thead>
    <tr><th>Baxış</th><th>Nəyə baxılır</th><th>Nə edilir</th></tr>
  </thead>
  <tbody>
    <tr><td>Şagird üzrə</td><td>Son bir neçə sınağın balı — artır, sabitdir, yoxsa düşür?</td><td>Düşüş varsa — müəllim və valideynlə söhbət, gücləndirmə qrupu, əlavə tapşırıq</td></tr>
    <tr><td>Mövzu üzrə</td><td>Qrupun çoxunun səhv etdiyi suallar hansı mövzuya aiddir?</td><td>Mövzunu təkrar keçmək, növbəti aralıq sınağa əlavə etmək</td></tr>
    <tr><td>Müəllim üzrə</td><td>Eyni səviyyəli qruplarda nəticələr nə qədər fərqlidir?</td><td>Metodiki söhbət, təcrübə mübadiləsi — cəza yox</td></tr>
    <tr><td>Vaxt üzrə</td><td>Şagird testi vaxtında bitirə bilirmi, son suallar boş qalırmı?</td><td>Vaxt idarəetməsi üzrə məşq, tam formatlı sınaq</td></tr>
  </tbody>
</table>
<p>Bir sınağa görə qərar verməyin — ən azı iki-üç sınaq üzrə trendə baxın. Analiz mütləq hərəkətə çevrilməlidir: dərs planında dəyişiklik, ev tapşırığı və ya valideynlə görüş.</p>

<h2>Valideynlə Ünsiyyət və Hesabat</h2>
<p>Abituriyent valideyni adi valideyndən daha həssasdır: imtahanın nəticəsi uşağın gələcəyinə təsir edir və ödənilən məbləğ də az deyil. Ona görə ünsiyyət qaydası əvvəlcədən müəyyən olunmalıdır:</p>
<ul>
  <li><strong>Davamiyyət</strong> — buraxılan dərs barədə həmin gün;</li>
  <li><strong>Sınaq nəticəsi</strong> — hər ümumi sınaqdan sonra, əvvəlki nəticə ilə müqayisədə;</li>
  <li><strong>Aylıq qısa rəy</strong> — güclü tərəf, zəif mövzu, növbəti ayın məqsədi;</li>
  <li><strong>Valideyn görüşü</strong> — rübdə bir dəfə və intensiv dövrdən əvvəl.</li>
</ul>
<p>Nəticələri ümumi valideyn qrupunda paylaşmayın — hər valideyn yalnız öz uşağının məlumatını görməlidir. Valideynin davamiyyəti və sınaq nəticələrini özü izlədiyi kabinet bu işi xeyli asanlaşdırır. Hesabatın məzmunu, mesaj şablonları və ödəniş xatırlatması barədə ayrıca yazmışıq: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>Ödəniş: Aylıq, yoxsa Paket?</h2>
<table>
  <thead>
    <tr><th>Model</th><th>Necə işləyir</th><th>Üstünlüyü</th><th>Diqqət</th></tr>
  </thead>
  <tbody>
    <tr><td>Aylıq haqq</td><td>Hər ayın əvvəlində sabit məbləğ</td><td>Valideyn üçün aydın, mərkəz üçün sabit gəlir</td><td>Tətil və bayram aylarının qaydası əvvəlcədən yazılmalıdır</td></tr>
    <tr><td>Paket (dövr üzrə)</td><td>Məsələn, semestr və ya intensiv dövr üçün birdəfəlik və ya hissə-hissə ödəniş</td><td>Şagird dövrün sonuna qədər qalır, mərkəz planlaşdırır</td><td>Ayrılma halında geri qaytarma qaydası müqavilədə olmalıdır</td></tr>
    <tr><td>Fənn üzrə</td><td>Hər fənn ayrıca ödənilir</td><td>Şagird yalnız lazım olan fənni seçir</td><td>Hesablama mürəkkəbləşir — hər şagirdin borcunu ayrıca görmək lazımdır</td></tr>
  </tbody>
</table>
<p>Ödəniş tarixini, endirim şərtlərini və ayrılma halında nə baş verdiyini müqavilədə yazın. Ödənişi alınan kimi qeyd edin, gecikmələri həftəlik yoxlayın.</p>

<h2>Müəllim Yükü və Əvəzetmə</h2>
<p>Hazırlıq kursunda ən böyük risk aparıcı müəllimin ilin ortasında xəstələnməsi və ya getməsidir. Bunun üçün:</p>
<ul>
  <li>Hər müəllimin həftəlik saatını və qrup sayını görün — həddindən artıq yüklənmiş müəllim sınaqları yoxlamağa və şagirdlə fərdi işə vaxt tapmır.</li>
  <li>Hər fənn üzrə ən azı bir əvəzedici müəllim müəyyən edin və onu qrupla əvvəlcədən tanış edin.</li>
  <li>Dərs planı, keçilən mövzular, materiallar və sınaq nəticələri müəllimin telefonunda yox, ortaq sistemdə saxlanmalıdır. Onda əvəzedici müəllim qrupun harada qaldığını dərhal görür.</li>
</ul>

<h2>Hər Mərkəzin İzləməli Olduğu Göstəricilər</h2>
<p>Rəhbər bütün dərslərdə iştirak edə bilməz, amma bir neçə göstəricini həftəlik izləyərək problemi erkən görə bilər. Bunlar ümumi göstəricilərdir — "normal" həddi hər mərkəz öz keçmiş məlumatına görə müəyyən etməlidir:</p>
<table>
  <thead>
    <tr><th>Göstərici</th><th>Necə hesablanır</th><th>Nə xəbər verir</th></tr>
  </thead>
  <tbody>
    <tr><td>Davamiyyət faizi</td><td>İştirak edilən dərslər / planlanan dərslər — şagird və qrup üzrə</td><td>Düşüş adətən motivasiya itkisinin və ya ayrılmanın ilk siqnalıdır</td></tr>
    <tr><td>Sınaq balının dinamikası</td><td>Ardıcıl ümumi sınaqlarda balın dəyişməsi</td><td>Proqramın və müəllimin işinin real nəticəsi</td></tr>
    <tr><td>Şagirdin qalma faizi</td><td>Dövrün sonunda qalan şagirdlər / başlayan şagirdlər</td><td>Valideyn məmnunluğunun və gəlirin dolayı göstəricisi</td></tr>
    <tr><td>Gecikən ödənişlər</td><td>Vaxtında ödəməyən şagirdlərin sayı və məbləği</td><td>Maliyyə riski; bəzən narazılığın da əlaməti</td></tr>
    <tr><td>Sınaqda iştirak</td><td>Sınağa gələnlər / qrupdakı şagirdlər</td><td>Sınaqdan qaçan şagird adətən nəticəsindən narahatdır</td></tr>
  </tbody>
</table>
<p>Göstəricilər bağlıdır: davamiyyəti düşən şagirdin balı da düşür, sonra ödənişi gecikir və o, kursu tərk edir. Bu zənciri erkən görmək üçün məlumat bir yerdə olmalıdır.</p>

<h2>Excel + WhatsApp, Kursometr, yoxsa Fərdi Sistem?</h2>
<table>
  <thead>
    <tr><th>Meyar</th><th>Excel + WhatsApp</th><th>Kursometr kimi platforma</th><th>RS Code fərdi sistemi</th></tr>
  </thead>
  <tbody>
    <tr><td>Kim üçün</td><td>Bir-iki müəllim, az şagird</td><td>Müəllim, repetitor və kiçik-orta kurs</td><td>Böyük mərkəz və filiallı şəbəkə</td></tr>
    <tr><td>Qrup və cədvəl</td><td>Ayrı-ayrı fayllarda, əl ilə</td><td>Fənn, qrup, həftəlik cədvəl, davamiyyət</td><td>Mərkəzin öz qaydalarına görə qurulur</td></tr>
    <tr><td>Sınaqlar</td><td>Kağızda, əl ilə yoxlama</td><td>Vaxtlı ümumi və aralıq sınaqlar, qapalı suallar avtomatik yoxlanır</td><td>İstənilən format və hesabat</td></tr>
    <tr><td>Valideyn</td><td>Yazışma ilə, ümumi çatda risk</td><td>Valideyn kabineti: davamiyyət, qiymət, sınaq nəticəsi</td><td>Tələbə görə</td></tr>
    <tr><td>Ödəniş</td><td>Ayrı cədvəldə</td><td>Tələbə ödənişlərinin izlənməsi</td><td>Mühasibat və digər sistemlərlə inteqrasiya mümkündür</td></tr>
    <tr><td>Başlanğıc xərci</td><td>Pulsuz, amma vaxt aparır</td><td>Qeydiyyat pulsuzdur</td><td>Təxminən 5 000 AZN-dən (həcmdən asılı təxmini qiymət)</td></tr>
  </tbody>
</table>
<p>Excel, WhatsApp və Google Classroom ilə Kursometr-in ətraflı müqayisəsi: <a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr</a>.</p>

<h2>Kursometr Hazırlıq Kursunda Necə İşləyir?</h2>
<p><a href="/mehsullar/kursometr">Kursometr</a> RS Code-un hazırladığı dərs idarəetmə platformasıdır. Açıq deyək: o, <strong>müəllim ətrafında qurulub</strong>. Müəllim bir dəqiqəyə öz səhifəsini açır (<em>adiniz.kursometr.com</em>) və qruplarını özü idarə edir. Kiçik və orta hazırlıq kursunda hər müəllim öz səhifəsində işləyə bilər. Kursometr-in hazırlıq işinə uyğun imkanları:</p>
<table>
  <thead>
    <tr><th>Ehtiyac</th><th>Kursometr-də</th></tr>
  </thead>
  <tbody>
    <tr><td>Qruplar və cədvəl</td><td>Fənlər, qruplar, həftəlik dərs cədvəli və davamiyyət qeydi</td></tr>
    <tr><td>Sınaq imtahanları</td><td>Ümumi və aralıq vaxtlı sınaqlar müəllimin təyin etdiyi saatda açılır və bağlanır; qapalı suallar avtomatik yoxlanır, nəticə sınaq bitən kimi hazır olur</td></tr>
    <tr><td>Sual bazası</td><td>Test toplusunun PDF faylını yükləyərək sualları sual bazasına əlavə etmək</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Tapşırıqların verilməsi və izlənməsi</td></tr>
    <tr><td>Materiallar</td><td>Dərs yazıları və materiallar yalnız həmin qrupun şagirdlərinə görünür</td></tr>
    <tr><td>Köməkçi müəllim</td><td>Assistentlər üçün mentor hesabı</td></tr>
    <tr><td>Ödəniş</td><td>Tələbə ödənişlərinin izlənməsi</td></tr>
    <tr><td>Valideyn</td><td>Valideyn kabinetində davamiyyət, qiymətlər və sınaq nəticələri</td></tr>
    <tr><td>Giriş</td><td>Telefon brauzerində tam işləyir, Google hesabı ilə daxil olmaq olur</td></tr>
  </tbody>
</table>
<p>Çox filiallı, onlarla müəllimi və mərkəzləşdirilmiş idarəetmə tələbləri olan şəbəkə üçün hazır platforma kifayət etməyə bilər. Belə hallarda RS Code mərkəzin öz qaydalarına uyğun fərdi sistem hazırlayır — <a href="/elaqe">bizimlə əlaqə saxlayın</a>, ehtiyacınızı birlikdə qiymətləndirək.</p>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ İxtisas qrupları və imtahan formatı bu il üçün dim.gov.az-dan yoxlanılıb</li>
  <li>☐ Qeydiyyatda giriş testi keçirilir, qruplar səviyyəyə görə yığılır</li>
  <li>☐ Müəllim, otaq və şagird cədvəlində üst-üstə düşmə yoxdur</li>
  <li>☐ İllik sınaq təqvimi tərtib edilib və valideynlərə göndərilib</li>
  <li>☐ Ümumi sınaqlar eyni vaxtda, real imtahana bənzər şəraitdə keçirilir</li>
  <li>☐ Reytinqi adla paylaşmaq üçün yazılı razılıq alınıb</li>
  <li>☐ Hər sınaqdan sonra şagird və mövzu üzrə analiz edilir, plan dəyişir</li>
  <li>☐ Valideyn davamiyyəti və nəticələri öz kabinetindən görür</li>
  <li>☐ Ödəniş qaydası və geri qaytarma şərtləri müqavilədədir</li>
  <li>☐ Hər fənn üzrə əvəzedici müəllim var, materiallar ortaq sistemdədir</li>
  <li>☐ Davamiyyət, bal dinamikası, qalma faizi və gecikən ödənişlər həftəlik izlənir</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Hazırlıq kursunda qruplar necə bölünməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Əvvəlcə imtahan növünə və ixtisas qrupuna (buraxılış üçün sinfə), sonra giriş testinin nəticəsinə görə səviyyəyə bölün. Qrup müəllimin hər şagirdin səhvini görə biləcəyi qədər kiçik olmalı, cədvəl isə şagirdin məktəb saatları və digər fənləri ilə toqquşmamalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sınaq imtahanını nə qədər tez-tez keçirmək lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Mövzu üzrə qısa aralıq sınaqları hər mövzu bitəndə, real imtahana bənzər ümumi sınağı isə təxminən ayda bir dəfə keçirmək geniş yayılmış təcrübədir. İmtahana yaxın tezliyi artırmaq olar. Sınaq təqvimini ilin əvvəlində tərtib edib valideynlərə göndərin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sınaq nəticələrinə görə reytinqi adla paylaşmaq olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Şagirdin adı və balı fərdi məlumatdır, ona görə reytinqi adla paylaşmazdan əvvəl şagirdin və valideynin razılığını alın. Razılıq yoxdursa, şagirdə yalnız öz yerini və qrupun ortalamasını göstərin. Reytinqi ixtisas qrupu daxilində və eyni şəraitdə yazılmış test üzrə tutun.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">İxtisas qrupları və imtahan qaydaları barədə dəqiq məlumatı haradan almaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Qəbul və buraxılış imtahanlarını Dövlət İmtahan Mərkəzi keçirir. İxtisas qruplarının fənləri, imtahan tarixləri və ballandırma qaydası dəyişə bilər, ona görə hər tədris ilinin əvvəlində aktual məlumatı DİM-in rəsmi saytından (dim.gov.az) yoxlayın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs mərkəzi hansı göstəriciləri izləməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ən vacibləri davamiyyət faizi, ardıcıl sınaqlarda balın dinamikası, şagirdin qalma faizi, gecikən ödənişlər və sınaqda iştirakdır. Bu göstəricilər bir-biri ilə bağlıdır: davamiyyətin düşməsi çox vaxt balın düşməsindən və ayrılmadan əvvəl görünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr böyük hazırlıq mərkəzi üçün uyğundurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr müəllim ətrafında qurulub: qruplar, cədvəl, davamiyyət, vaxtlı sınaqlar, ödəniş izləmə, valideyn kabineti və köməkçi müəllim üçün mentor hesabı var, qeydiyyat pulsuzdur. Kiçik və orta kurs üçün uyğundur. Çox filiallı böyük şəbəkə üçün RS Code fərdi sistem hazırlaya bilər.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">Tədris mərkəzi üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">Onlayn test necə hazırlanır: vaxtlı sınaq və avtomatik nəticə</a></li>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı, davamiyyət və dərs haqqı izləmə</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr: müqayisə</a></li>
  <li><a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">Dil kursu üçün idarəetmə proqramı</a></li>
</ul>

<h2>Nəticə</h2>
<p>Abituriyent hazırlığı kursunu güclü edən təkcə yaxşı müəllimlər deyil, həm də sistemdir: səviyyəyə görə yığılmış qruplar, ilin əvvəlində elan olunmuş sınaq təqvimi, real imtahana bənzər şəraitdə keçirilən sınaqlar, hər sınaqdan sonra hərəkətə çevrilən analiz, şəffaf valideyn hesabatı və aydın ödəniş qaydası. Bu məlumatı bir yerdə toplayanda problemi imtahandan sonra yox, vaxtında görürsünüz.</p>
<p><strong>Müəllimləriniz üçün səhifə açın və ilk sınağı keçirin: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — qeydiyyat pulsuzdur. Ətraflı: <a href="/mehsullar/kursometr">Kursometr haqqında</a>. Filiallı mərkəziniz üçün fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>İmtahanların strukturu, ixtisas qrupları, tarixlər və ballandırma qaydası barədə yalnız Dövlət İmtahan Mərkəzinin (dim.gov.az) aktual məlumatına əsaslanın. Fərdi sistemin qiyməti təxminidir və layihənin həcmindən asılıdır.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>An exam prep course centre looks like an ordinary training centre, but the rhythm of the work is completely different. Everything is tied to one date: exam day. Students and parents don't expect you to say "we covered the lesson". They expect "the score went up". If groups are poorly formed, mock exams are irregular and results are not analysed, the centre only notices at the end of the year, when nothing can be fixed any more.</p>
<p>This article is for owners and managers of course centres that prepare students for university entrance and school-leaving exams. We cover splitting groups by subject group and level, the yearly cycle, organising mock exams and fair rankings, results analysis, parent reports, fee models, teacher workload, the metrics to track, and which tool makes all this easier to run.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>How are groups split?</td><td>First by subject group (or school-leaving grade), then by level from an entry test; groups should be small and of similar level</td></tr>
    <tr><td>How often are mock exams held?</td><td>Short topic (interim) tests regularly, and a full mock close to the real exam roughly once a month, more often as the exam approaches</td></tr>
    <tr><td>How is a ranking made fair?</td><td>Same test, same time, same conditions and scoring rules announced in advance; consent before publishing names</td></tr>
    <tr><td>What to do with results?</td><td>Find weak points by student and by topic, and change the lesson plan and homework accordingly</td></tr>
    <tr><td>Which metrics to track?</td><td>Attendance %, mock score trend, student retention, late payments</td></tr>
    <tr><td>Where is it easiest to run?</td><td>In a system where groups, timetable, tests, payments and a parent portal are in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a>; a custom system for a large network</td></tr>
  </tbody>
</table>

<h2>How Is an Exam Prep Centre Different from an Ordinary Training Centre?</h2>
<p>A language school or a children's development centre can work at the same pace all year. An exam prep centre has three differences:</p>
<ul>
  <li><strong>The deadline is fixed.</strong> Exam day does not move, so the programme is planned backwards: which topic must be finished when, and how many mock exams each month needs.</li>
  <li><strong>The result is measurable.</strong> Every mock exam produces a score, and parents follow it. The centre's reputation is built on these numbers.</li>
  <li><strong>Students study a set of subjects.</strong> One student takes several subjects with different teachers at the same time, so the timetable, rooms and teacher allocation get dense and complex.</li>
</ul>
<p>We have a separate article on general training centre management — enrolment, modules, choosing ready-made software or a custom system: <a href="/blog-details/training-centre-management-software-2026">training centre management software</a>. Here we look only at issues specific to exam preparation.</p>

<h2>How to Build Groups: Subject Group, Level and Timetable</h2>
<p>In Azerbaijan, university entrance exams are run by the State Examination Center (DİM) by <strong>subject groups</strong> (ixtisas qrupları), and each group has its own set of subjects. School-leaving exams are also organised by DİM. Which subjects belong to which group, the exam stages and the scoring rules can change, so at the start of every academic year check the current information on <strong>DİM's official website (dim.gov.az)</strong> and adapt your programme.</p>
<p>When forming groups, this order works:</p>
<ol>
  <li><strong>Exam type and subject group.</strong> Split entrance-exam students by subject group and school-leaving students by grade. Students from different subject groups can share a group for common subjects.</li>
  <li><strong>Level.</strong> Run a short entry test at enrolment. Putting a strong student in a weak group means losing both: one gets bored, the other falls behind.</li>
  <li><strong>Group size.</strong> Keep it small enough for the teacher to see every student's mistakes. As a group grows, individual analysis is lost.</li>
  <li><strong>Timetable.</strong> Take school hours and other subjects into account. One student's two lessons must not overlap.</li>
  <li><strong>Teacher and room.</strong> A main teacher for each group and a fixed room for each lesson. The room schedule must be built together with the teacher schedule, otherwise two groups end up in one room at the same time.</li>
</ol>
<table>
  <thead>
    <tr><th>Group type</th><th>Who it is for</th><th>Note</th></tr>
  </thead>
  <tbody>
    <tr><td>Main (year-long) group</td><td>Entrance-exam and final-year students starting at the beginning of the academic year</td><td>The programme is planned topic by topic up to exam day</td></tr>
    <tr><td>Booster group</td><td>Students falling behind on certain topics in mock exams</td><td>Short-term, focused on specific topics</td></tr>
    <tr><td>Intensive group</td><td>The final months before the exam</td><td>Mostly mock exams and working on mistakes</td></tr>
  </tbody>
</table>

<h2>The Academic Year: From Enrolment to the Exam</h2>
<p>An exam prep centre's year has roughly four stages. Exact exam dates are announced by DİM every year, so the table below is a general framework:</p>
<table>
  <thead>
    <tr><th>Stage</th><th>What happens</th><th>What the manager watches</th></tr>
  </thead>
  <tbody>
    <tr><td>Enrolment (late summer – early autumn)</td><td>Entry test, forming groups, timetable, contract and payment terms</td><td>Group fill rate, level distribution</td></tr>
    <tr><td>Main teaching (autumn – winter)</td><td>Covering topics, interim tests, homework</td><td>Attendance, results by topic</td></tr>
    <tr><td>Mock exam period (winter – spring)</td><td>More frequent full mock exams, booster groups</td><td>Score trend, at-risk students</td></tr>
    <tr><td>Intensive period (before the exam)</td><td>Full-format mock exams, working on mistakes, time management</td><td>Stability of recent scores, student motivation</td></tr>
  </tbody>
</table>
<p>Draw up the mock exam calendar at the start of the year and send it to students and parents. When parents know the dates of full mock exams, they make sure the student doesn't miss them and they look out for the result. Keep in mind that DİM also organises its own mock exams — follow their dates on the official website so they don't clash with your calendar.</p>

<h2>Mock Exams: Frequency, Conditions and Fair Rankings</h2>
<p>The mock exam is the core product of an exam prep centre. It helps to split it into two types:</p>
<ul>
  <li><strong>Interim test</strong>: a short test on one or several topics. It is held after a topic is finished and shows the teacher who hasn't understood what.</li>
  <li><strong>Full mock exam</strong>: a complete test as close as possible to the real exam. Most centres hold one roughly once a month, and more often closer to the exam.</li>
</ul>
<p>A full mock reflects the real exam only if the conditions do too: the same question format, the same time, no phones or help, and scoring rules known in advance. Align the format and time with what DİM has announced for that year. If you don't know the rules exactly, work with percentages and tell parents so openly.</p>
<p><strong>To make the ranking fair:</strong></p>
<ul>
  <li>All students being compared should take the same test within the same time window. When a test opens and closes at a set time, "I'll do it later" and question sharing drop.</li>
  <li>Rank within a subject group. Comparing students with different subject sets in one list is not fair.</li>
  <li>Mark students who missed the test separately rather than as "0 points", otherwise the average is distorted.</li>
  <li>Announce in advance which rule applies when scores are tied.</li>
</ul>
<p><strong>Consent is needed to publish names.</strong> A student's name and score are personal data. If you want to publish a ranking with names on a board, on social media or in a group chat, first get consent from the student and the parent. Without consent, show each student only their own position and the group average. Get separate consent to use strong results in advertising, too.</p>
<p>More on preparing tests, question formats and calculating time: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</p>

<h2>Results Analysis: By Student and by Topic</h2>
<p>Holding a mock exam and announcing the score is only half the job. The real value is in analysing the result. After every mock exam, ask two questions: <em>whose situation has changed</em> and <em>which topic has the group as a whole not mastered</em>.</p>
<table>
  <thead>
    <tr><th>View</th><th>What to look at</th><th>What to do</th></tr>
  </thead>
  <tbody>
    <tr><td>By student</td><td>Scores of the last few mock exams: rising, stable or falling?</td><td>If falling, talk to the teacher and parent, add a booster group or extra homework</td></tr>
    <tr><td>By topic</td><td>Which topic do the questions most of the group got wrong belong to?</td><td>Re-teach the topic, include it in the next interim test</td></tr>
    <tr><td>By teacher</td><td>How much do results differ between groups of the same level?</td><td>A methodology conversation and sharing experience, not punishment</td></tr>
    <tr><td>By time</td><td>Can the student finish on time, or are the last questions left blank?</td><td>Time-management practice, full-format mock exams</td></tr>
  </tbody>
</table>
<p>Don't decide based on a single test: the student may have been ill or the test may have been hard. Look at the trend over at least two or three mock exams. The analysis must turn into an action: a change in the lesson plan, homework or a meeting with the parent. Analysis that doesn't lead to action is just a report.</p>

<h2>Parent Communication and Reports</h2>
<p>Parents of exam candidates are more sensitive than most: the exam result affects the child's future, and the fee is not small either. So agree the communication rules in advance:</p>
<ul>
  <li><strong>Attendance</strong>: a missed lesson on the same day;</li>
  <li><strong>Mock exam result</strong>: after every full mock exam, compared with the previous result;</li>
  <li><strong>Short monthly comment</strong>: a strength, a weak topic, next month's goal;</li>
  <li><strong>Parent meeting</strong>: once a term and before the intensive period.</li>
</ul>
<p>Don't share results in a general parents' group — each parent should see only their own child's data. A portal where parents follow attendance and test results themselves makes this much easier. We have written separately about report content, message templates and payment reminders: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>Fees: Monthly or by Package?</h2>
<table>
  <thead>
    <tr><th>Model</th><th>How it works</th><th>Advantage</th><th>Watch out for</th></tr>
  </thead>
  <tbody>
    <tr><td>Monthly fee</td><td>A fixed amount at the start of each month</td><td>Clear for parents, steady income for the centre</td><td>The rule for holiday months must be written in advance</td></tr>
    <tr><td>Package (per period)</td><td>For example, a one-off or instalment payment for a semester or the intensive period</td><td>The student stays to the end of the period, the centre can plan</td><td>The contract must state the refund rule if the student leaves</td></tr>
    <tr><td>Per subject</td><td>Each subject is paid separately</td><td>The student chooses only the subjects they need</td><td>Calculations get complicated: you need to see each student's balance separately</td></tr>
  </tbody>
</table>
<p>Whatever model you choose, put the payment date, discount terms (siblings, several subjects) and what happens if a student leaves into the contract. Record each payment as soon as it is received and check late payments weekly — the more debt builds up, the harder it is to collect.</p>

<h2>Teacher Workload and Substitutes</h2>
<p>The biggest risk in an exam prep centre is a lead teacher falling ill or leaving mid-year. To prepare for it:</p>
<ul>
  <li>See each teacher's weekly hours and number of groups. An overloaded teacher has no time to mark mock exams or work individually with students.</li>
  <li>Assign at least one substitute teacher for each subject and introduce them to the group in advance.</li>
  <li>Lesson plans, topics covered, materials and mock exam results should be kept in a shared system, not on the teacher's phone. Then a substitute sees immediately where the group is.</li>
</ul>

<h2>The Metrics Every Centre Should Track</h2>
<p>A manager can't sit in on every lesson, but by tracking a few metrics weekly they can spot problems early. These are generic metrics — each centre should set its own "normal" range from its past data:</p>
<table>
  <thead>
    <tr><th>Metric</th><th>How it is calculated</th><th>What it tells you</th></tr>
  </thead>
  <tbody>
    <tr><td>Attendance %</td><td>Lessons attended / lessons planned, by student and by group</td><td>A drop is usually the first sign of lost motivation or of a student about to leave</td></tr>
    <tr><td>Mock score trend</td><td>Change in score across consecutive full mock exams</td><td>The real outcome of the programme and the teacher's work</td></tr>
    <tr><td>Student retention</td><td>Students remaining at the end of the period / students who started</td><td>An indirect indicator of parent satisfaction and revenue</td></tr>
    <tr><td>Late payments</td><td>Number of students and amount not paid on time</td><td>Financial risk; sometimes also a sign of dissatisfaction</td></tr>
    <tr><td>Mock exam participation</td><td>Students who sat the test / students in the group</td><td>A student who avoids mock exams is usually worried about their results</td></tr>
  </tbody>
</table>
<p>The metrics are linked: a student whose attendance drops also sees their score fall, then pays late and eventually leaves. To see this chain early, the data has to be in one place.</p>

<h2>Excel + WhatsApp, Kursometr or a Custom System?</h2>
<table>
  <thead>
    <tr><th>Criterion</th><th>Excel + WhatsApp</th><th>A platform like Kursometr</th><th>A custom system by RS Code</th></tr>
  </thead>
  <tbody>
    <tr><td>Who it is for</td><td>One or two teachers, few students</td><td>Teachers, tutors and small-to-medium centres</td><td>Large centres and multi-branch networks</td></tr>
    <tr><td>Groups and timetable</td><td>In separate files, by hand</td><td>Subjects, groups, weekly timetable, attendance</td><td>Built around the centre's own rules</td></tr>
    <tr><td>Mock exams</td><td>On paper, marked by hand</td><td>Timed general and interim tests, closed questions marked automatically</td><td>Any format and reporting</td></tr>
    <tr><td>Parents</td><td>By messages, with group-chat risk</td><td>Parent portal: attendance, grades, test results</td><td>As required</td></tr>
    <tr><td>Payments</td><td>In a separate spreadsheet</td><td>Student payment tracking</td><td>Integration with accounting and other systems possible</td></tr>
    <tr><td>Starting cost</td><td>Free, but time-consuming</td><td>Registration is free</td><td>From about 5,000 AZN (an estimate depending on scope)</td></tr>
  </tbody>
</table>
<p>A detailed comparison of Excel, WhatsApp and Google Classroom with Kursometr: <a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr</a>.</p>

<h2>How Does Kursometr Work in an Exam Prep Centre?</h2>
<p><a href="/mehsullar/kursometr">Kursometr</a> is a class management platform built by RS Code. To be clear: it is <strong>built around the teacher</strong>. A teacher opens their own page in a minute (<em>yourname.kursometr.com</em>) and manages their groups themselves. In a small or medium prep centre, each teacher can work on their own page. Kursometr features that fit exam preparation:</p>
<table>
  <thead>
    <tr><th>Need</th><th>In Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Groups and timetable</td><td>Subjects, groups, a weekly timetable and attendance records</td></tr>
    <tr><td>Mock exams</td><td>Timed general and interim tests open and close at the time the teacher sets; closed questions are marked automatically and results are ready as soon as the test ends</td></tr>
    <tr><td>Question bank</td><td>Upload a PDF test collection to add its questions to the question bank</td></tr>
    <tr><td>Homework</td><td>Assigning and tracking homework</td></tr>
    <tr><td>Materials</td><td>Lesson recordings and materials are visible only to that group's students</td></tr>
    <tr><td>Assistant teacher</td><td>Mentor accounts for assistants</td></tr>
    <tr><td>Payments</td><td>Student payment tracking</td></tr>
    <tr><td>Parents</td><td>A parent portal showing attendance, grades and test results</td></tr>
    <tr><td>Access</td><td>Works fully in a phone browser; sign in with Google</td></tr>
  </tbody>
</table>
<p>For a multi-branch network with dozens of teachers and centralised management requirements, a ready-made platform may not be enough. In such cases RS Code builds a custom system around the centre's own rules — <a href="/contact">contact us</a> and let's assess your needs together.</p>

<h2>Checklist</h2>
<ul>
  <li>☐ Subject groups and exam format for this year checked on dim.gov.az</li>
  <li>☐ An entry test is held at enrolment and groups are formed by level</li>
  <li>☐ No overlaps in teacher, room and student timetables</li>
  <li>☐ A yearly mock exam calendar is drawn up and sent to parents</li>
  <li>☐ Full mock exams are held at the same time, in conditions close to the real exam</li>
  <li>☐ Written consent obtained before publishing rankings with names</li>
  <li>☐ After every mock exam, results are analysed by student and topic, and the plan changes</li>
  <li>☐ Parents see attendance and results in their own portal</li>
  <li>☐ Payment rules and refund terms are in the contract</li>
  <li>☐ There is a substitute teacher for every subject, and materials are in a shared system</li>
  <li>☐ Attendance, score trend, retention and late payments are tracked weekly</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How should groups be split in an exam prep centre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">First by exam type and subject group (by grade for school-leaving exams), then by level based on an entry test. A group should be small enough for the teacher to see every student's mistakes, and the timetable must not clash with school hours or other subjects.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How often should mock exams be held?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A common practice is a short interim test whenever a topic is finished and a full mock exam close to the real one roughly once a month, more often as the exam approaches. Draw up the mock exam calendar at the start of the year and send it to parents.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can a mock exam ranking be published with names?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A student's name and score are personal data, so get consent from the student and the parent before publishing a ranking with names. Without consent, show each student only their own position and the group average. Rank within a subject group and only on tests taken under the same conditions.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Where can I find accurate information on subject groups and exam rules?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">University entrance and school-leaving exams are run by the State Examination Center (DİM). The subjects in each group, exam dates and scoring rules can change, so check the current information on DİM's official website (dim.gov.az) at the start of every academic year.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Which metrics should a course centre track?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The most important are attendance %, the score trend across consecutive mock exams, student retention, late payments and mock exam participation. They are linked: a drop in attendance often appears before a drop in scores and before a student leaves.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Kursometr suitable for a large exam prep centre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr is built around the teacher: it has groups, a timetable, attendance, timed tests, payment tracking, a parent portal and mentor accounts for assistant teachers, and registration is free. It suits small and medium centres. For a large multi-branch network, RS Code can build a custom system.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/training-centre-management-software-2026">Training centre management software</a></li>
  <li><a href="/blog-details/how-to-create-online-tests-for-teachers-2027">How to create online tests: timed mock exams and automatic results</a></li>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports, attendance and fee tracking</a></li>
  <li><a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr: comparison</a></li>
  <li><a href="/blog-details/language-course-management-software-2027">Language course management software</a></li>
</ul>

<h2>Conclusion</h2>
<p>What makes an exam prep centre strong is not only good teachers but a system: groups formed by level, a mock exam calendar announced at the start of the year, mock exams held in conditions close to the real exam, analysis that turns into action after every test, transparent parent reports and clear payment rules. When this data is kept in one place, you see problems in time rather than after the exam.</p>
<p><strong>Open pages for your teachers and run your first mock exam: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — registration is free. Learn more: <a href="/mehsullar/kursometr">about Kursometr</a>. If your multi-branch centre needs a custom system, <a href="/contact">get in touch</a>.</p>
<p><small><em>For exam structure, subject groups, dates and scoring rules, rely only on the current information from the State Examination Center (dim.gov.az). The price of a custom system is an estimate and depends on the scope of the project.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Курсы подготовки абитуриентов похожи на обычный учебный центр, но ритм работы совсем другой. Всё привязано к одной дате — дню экзамена. Ученик и родители ждут от вас не «урок прошли», а «балл вырос». Если группы собраны неправильно, пробные экзамены проводятся нерегулярно, а результаты не анализируются, центр замечает это в конце года, когда исправить уже ничего нельзя.</p>
<p>Эта статья — для владельцев и руководителей курсов, которые готовят к вступительным и выпускным экзаменам. Разбираем деление групп по группам специальностей и уровню, годовой цикл, организацию пробных экзаменов и честный рейтинг, анализ результатов, отчёты родителям, модели оплаты, нагрузку преподавателей, ключевые показатели и то, в каком инструменте всё это удобнее вести.</p>

<h2>Короткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Как делить группы?</td><td>Сначала по группе специальностей (или классу для выпускного экзамена), затем по уровню по входному тесту; группы должны быть небольшими и однородными</td></tr>
    <tr><td>Как часто проводить пробные экзамены?</td><td>Короткие тематические (промежуточные) тесты — регулярно, полный пробник, похожий на настоящий экзамен, — примерно раз в месяц, ближе к экзамену чаще</td></tr>
    <tr><td>Как сделать рейтинг честным?</td><td>Один тест, одно время, одинаковые условия и заранее объявленные правила подсчёта; для публикации имён — согласие</td></tr>
    <tr><td>Что делать с результатами?</td><td>Находить слабые места по ученикам и темам и менять под них план уроков и домашние задания</td></tr>
    <tr><td>Какие показатели отслеживать?</td><td>Процент посещаемости, динамику баллов на пробниках, удержание учеников, просрочки оплаты</td></tr>
    <tr><td>В чём удобнее вести?</td><td>В системе, где группы, расписание, тесты, оплата и кабинет родителя собраны в одном месте, — например, <a href="/mehsullar/kursometr">Kursometr</a>; для крупной сети — индивидуальная система</td></tr>
  </tbody>
</table>

<h2>Чем курсы подготовки отличаются от обычного учебного центра?</h2>
<p>Языковая школа или детский развивающий центр могут работать в одном темпе весь год. У курсов подготовки три отличия:</p>
<ul>
  <li><strong>Срок фиксирован.</strong> День экзамена не переносится, поэтому программа планируется от конца к началу: какая тема когда должна быть пройдена и сколько пробников нужно в каждом месяце.</li>
  <li><strong>Результат измерим.</strong> Каждый пробный экзамен даёт балл, и родители за ним следят. Репутация центра складывается именно из этих цифр.</li>
  <li><strong>Ученик занимается набором предметов.</strong> Один ученик одновременно ходит на несколько предметов к разным преподавателям, поэтому расписание, распределение кабинетов и преподавателей становятся плотными и сложными.</li>
</ul>
<p>Об общем управлении учебным центром — набор, модули, выбор готовой программы или индивидуальной системы — у нас есть отдельная статья: <a href="/blog-details/programma-dlya-uchebnogo-centra-2026">программа для учебного центра</a>. Здесь рассматриваем только то, что характерно для подготовки к экзаменам.</p>

<h2>Как формировать группы: группа специальностей, уровень и расписание</h2>
<p>В Азербайджане вступительные экзамены в вузы проводит Государственный экзаменационный центр (DİM) по <strong>группам специальностей</strong> (ixtisas qrupları), и у каждой группы свой набор предметов. Выпускные экзамены также организует DİM. Состав предметов в группах, этапы экзамена и правила подсчёта баллов могут меняться, поэтому в начале каждого учебного года проверяйте актуальную информацию на <strong>официальном сайте DİM (dim.gov.az)</strong> и адаптируйте программу.</p>
<p>При наборе групп работает такой порядок:</p>
<ol>
  <li><strong>Тип экзамена и группа специальностей.</strong> Абитуриентов делите по группам специальностей, выпускников — по классам. По общим предметам ученики разных групп специальностей могут заниматься вместе.</li>
  <li><strong>Уровень.</strong> При записи проводите короткий входной тест. Сильный ученик в слабой группе — это потеря обоих: один скучает, другой отстаёт.</li>
  <li><strong>Размер группы.</strong> Держите её достаточно маленькой, чтобы преподаватель видел ошибки каждого. Чем больше группа, тем меньше индивидуального анализа.</li>
  <li><strong>Расписание.</strong> Учитывайте школьные часы и другие предметы. Два занятия одного ученика не должны пересекаться.</li>
  <li><strong>Преподаватель и кабинет.</strong> У каждой группы — основной преподаватель, у каждого занятия — постоянный кабинет. Расписание кабинетов строится вместе с расписанием преподавателей, иначе две группы окажутся в одном кабинете в одно время.</li>
</ol>
<table>
  <thead>
    <tr><th>Тип группы</th><th>Для кого</th><th>На что обратить внимание</th></tr>
  </thead>
  <tbody>
    <tr><td>Основная (годовая) группа</td><td>Абитуриенты и выпускники, начинающие с начала учебного года</td><td>Программа расписана по темам до дня экзамена</td></tr>
    <tr><td>Группа усиления</td><td>Те, кто отстаёт по отдельным темам на пробниках</td><td>Краткосрочно, по конкретным темам</td></tr>
    <tr><td>Интенсив</td><td>Последние месяцы перед экзаменом</td><td>В основном пробники и работа над ошибками</td></tr>
  </tbody>
</table>

<h2>Учебный год: от набора до экзамена</h2>
<p>Год курсов подготовки состоит примерно из четырёх этапов. Точные даты экзаменов DİM объявляет каждый год, поэтому таблица ниже — общая схема:</p>
<table>
  <thead>
    <tr><th>Этап</th><th>Что происходит</th><th>На что смотрит руководитель</th></tr>
  </thead>
  <tbody>
    <tr><td>Набор (конец лета — начало осени)</td><td>Входной тест, формирование групп, расписание, договор и условия оплаты</td><td>Наполняемость групп, распределение по уровням</td></tr>
    <tr><td>Основное обучение (осень — зима)</td><td>Прохождение тем, промежуточные тесты, домашние задания</td><td>Посещаемость, результаты по темам</td></tr>
    <tr><td>Период пробников (зима — весна)</td><td>Полные пробные экзамены чаще, группы усиления</td><td>Динамика баллов, ученики в зоне риска</td></tr>
    <tr><td>Интенсив (перед экзаменом)</td><td>Пробники в полном формате, работа над ошибками, управление временем</td><td>Стабильность последних результатов, мотивация учеников</td></tr>
  </tbody>
</table>
<p>Составьте календарь пробных экзаменов в начале года и разошлите его ученикам и родителям. Когда родители знают даты полных пробников, они следят, чтобы ребёнок их не пропускал, и ждут результата. Учтите, что DİM проводит и собственные пробные экзамены — следите за их датами на официальном сайте, чтобы они не совпадали с вашим календарём.</p>

<h2>Пробные экзамены: частота, условия и честный рейтинг</h2>
<p>Пробный экзамен — главный продукт курсов подготовки. Его удобно делить на два вида:</p>
<ul>
  <li><strong>Промежуточный тест</strong> — короткий тест по одной или нескольким темам. Проводится после завершения темы и показывает преподавателю, кто что не понял.</li>
  <li><strong>Полный пробник</strong> — полный тест, максимально похожий на настоящий экзамен. Большинство центров проводят его примерно раз в месяц, а ближе к экзамену — чаще.</li>
</ul>
<p>Полный пробник отражает настоящий экзамен только тогда, когда похожи и условия: тот же формат вопросов, то же время, без телефонов и подсказок, заранее известные правила подсчёта. Подстраивайте формат и время под то, что DİM объявил на этот год. Если точных правил вы не знаете, работайте с процентами и открыто говорите об этом родителям.</p>
<p><strong>Чтобы рейтинг был честным:</strong></p>
<ul>
  <li>Все сравниваемые ученики должны писать один и тот же тест в одном временном окне. Когда тест открывается и закрывается в заданное время, «напишу потом» и пересылка вопросов случаются реже.</li>
  <li>Составляйте рейтинг внутри группы специальностей — сравнивать в одном списке учеников с разными наборами предметов некорректно.</li>
  <li>Отмечайте не пришедших на тест отдельно, а не как «0 баллов», иначе средний показатель искажается.</li>
  <li>Заранее объявите, какое правило действует при равенстве баллов.</li>
</ul>
<p><strong>Для публикации имён нужно согласие.</strong> Имя ученика и его балл — персональные данные. Если хотите публиковать рейтинг с именами на стенде, в соцсетях или в общем чате, сначала получите согласие ученика и родителя. Без согласия показывайте ученику только его место и средний балл группы. Для использования высоких результатов в рекламе тоже нужно отдельное согласие.</p>
<p>Подробнее о составлении тестов, форматах вопросов и расчёте времени: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</p>

<h2>Анализ результатов: по ученикам и по темам</h2>
<p>Провести пробник и объявить балл — только половина работы. Настоящая ценность — в анализе результата. После каждого пробника задавайте два вопроса: <em>у кого изменилась ситуация</em> и <em>какую тему группа в целом не усвоила</em>.</p>
<table>
  <thead>
    <tr><th>Срез</th><th>На что смотреть</th><th>Что делать</th></tr>
  </thead>
  <tbody>
    <tr><td>По ученику</td><td>Баллы последних нескольких пробников: растут, стоят или падают?</td><td>При падении — разговор с преподавателем и родителем, группа усиления, дополнительные задания</td></tr>
    <tr><td>По теме</td><td>К какой теме относятся вопросы, в которых ошиблась большая часть группы?</td><td>Повторить тему, включить её в следующий промежуточный тест</td></tr>
    <tr><td>По преподавателю</td><td>Насколько различаются результаты групп одного уровня?</td><td>Методический разговор, обмен опытом — не наказание</td></tr>
    <tr><td>По времени</td><td>Успевает ли ученик закончить тест, не остаются ли последние вопросы пустыми?</td><td>Тренировка управления временем, пробники в полном формате</td></tr>
  </tbody>
</table>
<p>Не принимайте решений по одному тесту: ученик мог болеть, тест мог оказаться сложным. Смотрите на тренд минимум по двум-трём пробникам. Анализ обязательно должен превращаться в действие — изменение плана уроков, домашнее задание или встречу с родителем. Анализ без действия — просто отчёт.</p>

<h2>Общение с родителями и отчёты</h2>
<p>Родители абитуриентов особенно чувствительны: результат экзамена влияет на будущее ребёнка, да и сумма оплаты немаленькая. Поэтому правила общения стоит согласовать заранее:</p>
<ul>
  <li><strong>Посещаемость</strong> — о пропуске в тот же день;</li>
  <li><strong>Результат пробника</strong> — после каждого полного пробника, в сравнении с предыдущим;</li>
  <li><strong>Короткий ежемесячный отзыв</strong> — сильная сторона, слабая тема, цель на следующий месяц;</li>
  <li><strong>Родительская встреча</strong> — раз в четверть и перед интенсивом.</li>
</ul>
<p>Не публикуйте результаты в общем родительском чате — каждый родитель должен видеть только данные своего ребёнка. Кабинет, в котором родитель сам следит за посещаемостью и результатами тестов, сильно упрощает эту работу. О содержании отчёта, шаблонах сообщений и напоминаниях об оплате мы писали отдельно: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>Оплата: помесячно или пакетом?</h2>
<table>
  <thead>
    <tr><th>Модель</th><th>Как работает</th><th>Преимущество</th><th>На что обратить внимание</th></tr>
  </thead>
  <tbody>
    <tr><td>Ежемесячная оплата</td><td>Фиксированная сумма в начале каждого месяца</td><td>Понятно родителям, стабильный доход центру</td><td>Правило для месяцев с каникулами нужно прописать заранее</td></tr>
    <tr><td>Пакет (за период)</td><td>Например, разовая оплата или оплата частями за семестр или интенсив</td><td>Ученик остаётся до конца периода, центр может планировать</td><td>В договоре должно быть правило возврата при уходе ученика</td></tr>
    <tr><td>По предметам</td><td>Каждый предмет оплачивается отдельно</td><td>Ученик выбирает только нужные предметы</td><td>Расчёты усложняются — нужно видеть баланс каждого ученика отдельно</td></tr>
  </tbody>
</table>
<p>Какую бы модель вы ни выбрали, пропишите в договоре дату оплаты, условия скидок (братья и сёстры, несколько предметов) и что происходит при уходе ученика. Отмечайте оплату сразу после получения и проверяйте просрочки еженедельно — чем больше накапливается долг, тем труднее его собрать.</p>

<h2>Нагрузка преподавателей и замены</h2>
<p>Главный риск для курсов подготовки — болезнь или уход ведущего преподавателя в середине года. Чтобы к этому подготовиться:</p>
<ul>
  <li>Видьте недельные часы и количество групп каждого преподавателя — перегруженному преподавателю некогда проверять пробники и работать с учениками индивидуально.</li>
  <li>По каждому предмету назначьте хотя бы одного преподавателя на замену и заранее познакомьте его с группой.</li>
  <li>План уроков, пройденные темы, материалы и результаты пробников должны храниться в общей системе, а не в телефоне преподавателя. Тогда заменяющий сразу видит, где остановилась группа.</li>
</ul>

<h2>Показатели, которые должен отслеживать каждый центр</h2>
<p>Руководитель не может присутствовать на каждом уроке, но, отслеживая несколько показателей еженедельно, замечает проблемы рано. Это общие показатели — «нормальный» уровень каждый центр определяет по своим прошлым данным:</p>
<table>
  <thead>
    <tr><th>Показатель</th><th>Как считается</th><th>О чём говорит</th></tr>
  </thead>
  <tbody>
    <tr><td>Процент посещаемости</td><td>Посещённые занятия / запланированные — по ученику и по группе</td><td>Снижение — обычно первый сигнал потери мотивации или ухода</td></tr>
    <tr><td>Динамика баллов на пробниках</td><td>Изменение балла на последовательных полных пробниках</td><td>Реальный результат программы и работы преподавателя</td></tr>
    <tr><td>Удержание учеников</td><td>Ученики в конце периода / ученики в начале</td><td>Косвенный показатель удовлетворённости родителей и выручки</td></tr>
    <tr><td>Просрочки оплаты</td><td>Число учеников и сумма, не оплаченная вовремя</td><td>Финансовый риск; иногда и признак недовольства</td></tr>
    <tr><td>Участие в пробниках</td><td>Пришедшие на тест / ученики в группе</td><td>Ученик, избегающий пробников, обычно переживает за результат</td></tr>
  </tbody>
</table>
<p>Показатели связаны между собой: у ученика с падающей посещаемостью падает и балл, затем он задерживает оплату и уходит с курсов. Чтобы увидеть эту цепочку вовремя, данные должны быть в одном месте.</p>

<h2>Excel + WhatsApp, Kursometr или индивидуальная система?</h2>
<table>
  <thead>
    <tr><th>Критерий</th><th>Excel + WhatsApp</th><th>Платформа вроде Kursometr</th><th>Индивидуальная система от RS Code</th></tr>
  </thead>
  <tbody>
    <tr><td>Для кого</td><td>Один-два преподавателя, мало учеников</td><td>Преподаватели, репетиторы, небольшие и средние курсы</td><td>Крупные центры и сети с филиалами</td></tr>
    <tr><td>Группы и расписание</td><td>В разных файлах, вручную</td><td>Предметы, группы, недельное расписание, посещаемость</td><td>Строится под правила центра</td></tr>
    <tr><td>Пробные экзамены</td><td>На бумаге, ручная проверка</td><td>Тесты с таймером (общие и промежуточные), закрытые вопросы проверяются автоматически</td><td>Любой формат и отчётность</td></tr>
    <tr><td>Родители</td><td>Через переписку, риск общего чата</td><td>Кабинет родителя: посещаемость, оценки, результаты тестов</td><td>По требованиям</td></tr>
    <tr><td>Оплата</td><td>В отдельной таблице</td><td>Учёт оплат учеников</td><td>Возможна интеграция с бухгалтерией и другими системами</td></tr>
    <tr><td>Стартовые затраты</td><td>Бесплатно, но отнимает время</td><td>Регистрация бесплатна</td><td>Примерно от 5 000 AZN (ориентировочная оценка, зависит от объёма)</td></tr>
  </tbody>
</table>
<p>Подробное сравнение Excel, WhatsApp и Google Classroom с Kursometr: <a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr</a>.</p>

<h2>Как Kursometr работает на курсах подготовки?</h2>
<p><a href="/mehsullar/kursometr">Kursometr</a> — платформа для управления занятиями, созданная RS Code. Скажем прямо: она <strong>построена вокруг преподавателя</strong>. Преподаватель за минуту открывает свою страницу (<em>vashe-imya.kursometr.com</em>) и сам управляет своими группами. На небольших и средних курсах каждый преподаватель может работать на своей странице. Возможности Kursometr, подходящие для подготовки к экзаменам:</p>
<table>
  <thead>
    <tr><th>Задача</th><th>В Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Группы и расписание</td><td>Предметы, группы, недельное расписание занятий и учёт посещаемости</td></tr>
    <tr><td>Пробные экзамены</td><td>Общие и промежуточные тесты с таймером открываются и закрываются в заданное преподавателем время; закрытые вопросы проверяются автоматически, результат готов сразу после окончания теста</td></tr>
    <tr><td>База вопросов</td><td>Загрузка PDF-сборника тестов добавляет его вопросы в базу вопросов</td></tr>
    <tr><td>Домашние задания</td><td>Выдача и отслеживание заданий</td></tr>
    <tr><td>Материалы</td><td>Записи уроков и материалы видны только ученикам этой группы</td></tr>
    <tr><td>Ассистент</td><td>Аккаунты наставника (mentor) для ассистентов</td></tr>
    <tr><td>Оплата</td><td>Учёт оплат учеников</td></tr>
    <tr><td>Родители</td><td>Кабинет родителя с посещаемостью, оценками и результатами тестов</td></tr>
    <tr><td>Доступ</td><td>Полностью работает в браузере телефона, вход через Google</td></tr>
  </tbody>
</table>
<p>Для сети с несколькими филиалами, десятками преподавателей и требованиями централизованного управления готовой платформы может не хватить. В таких случаях RS Code разрабатывает индивидуальную систему под правила центра — <a href="/kontakty">свяжитесь с нами</a>, и мы вместе оценим ваши задачи.</p>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Группы специальностей и формат экзамена на этот год проверены на dim.gov.az</li>
  <li>☐ При записи проводится входной тест, группы формируются по уровню</li>
  <li>☐ Нет пересечений в расписании преподавателей, кабинетов и учеников</li>
  <li>☐ Годовой календарь пробников составлен и разослан родителям</li>
  <li>☐ Полные пробники проводятся в одно время, в условиях, близких к настоящему экзамену</li>
  <li>☐ Для публикации рейтинга с именами получено письменное согласие</li>
  <li>☐ После каждого пробника проводится анализ по ученикам и темам, план меняется</li>
  <li>☐ Родители видят посещаемость и результаты в своём кабинете</li>
  <li>☐ Правила оплаты и условия возврата прописаны в договоре</li>
  <li>☐ По каждому предмету есть преподаватель на замену, материалы — в общей системе</li>
  <li>☐ Посещаемость, динамика баллов, удержание и просрочки отслеживаются еженедельно</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как делить группы на курсах подготовки?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сначала по типу экзамена и группе специальностей (для выпускного экзамена — по классу), затем по уровню по результатам входного теста. Группа должна быть достаточно маленькой, чтобы преподаватель видел ошибки каждого, а расписание не должно пересекаться со школьными часами и другими предметами.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как часто нужно проводить пробные экзамены?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Распространённая практика — короткий промежуточный тест после каждой темы и полный пробник, похожий на настоящий экзамен, примерно раз в месяц, ближе к экзамену чаще. Составьте календарь пробников в начале года и разошлите его родителям.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли публиковать рейтинг по пробникам с именами?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Имя ученика и его балл — персональные данные, поэтому перед публикацией рейтинга с именами получите согласие ученика и родителя. Без согласия показывайте ученику только его место и средний балл группы. Составляйте рейтинг внутри группы специальностей и только по тестам, написанным в одинаковых условиях.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Где найти точную информацию о группах специальностей и правилах экзамена?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Вступительные и выпускные экзамены проводит Государственный экзаменационный центр (DİM). Предметы групп, даты экзаменов и правила подсчёта баллов могут меняться, поэтому в начале каждого учебного года проверяйте актуальную информацию на официальном сайте DİM (dim.gov.az).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какие показатели должен отслеживать учебный центр?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Важнейшие — процент посещаемости, динамика баллов на последовательных пробниках, удержание учеников, просрочки оплаты и участие в пробниках. Они связаны: падение посещаемости часто заметно раньше, чем падение баллов и уход ученика.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Подходит ли Kursometr для крупного центра подготовки?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr построен вокруг преподавателя: в нём есть группы, расписание, посещаемость, тесты с таймером, учёт оплат, кабинет родителя и аккаунты наставника для ассистентов, регистрация бесплатна. Он подходит небольшим и средним курсам. Для крупной сети с филиалами RS Code может разработать индивидуальную систему.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-uchebnogo-centra-2026">Программа для учебного центра</a></li>
  <li><a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">Как создать онлайн-тест: пробный экзамен с таймером и автопроверкой</a></li>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям, посещаемость и учёт оплат</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr: сравнение</a></li>
  <li><a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">Программа для языковых курсов</a></li>
</ul>

<h2>Итог</h2>
<p>Сильными курсы подготовки делают не только хорошие преподаватели, но и система: группы, собранные по уровню, календарь пробников, объявленный в начале года, пробные экзамены в условиях, близких к настоящим, анализ, который после каждого теста превращается в действие, прозрачные отчёты родителям и понятные правила оплаты. Когда эти данные собраны в одном месте, вы видите проблемы вовремя, а не после экзамена.</p>
<p><strong>Откройте страницы для своих преподавателей и проведите первый пробник: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — регистрация бесплатна. Подробнее: <a href="/mehsullar/kursometr">о Kursometr</a>. Если вашему центру с филиалами нужна индивидуальная система, <a href="/kontakty">свяжитесь с нами</a>.</p>
<p><small><em>По структуре экзаменов, группам специальностей, датам и правилам подсчёта баллов опирайтесь только на актуальную информацию Государственного экзаменационного центра (dim.gov.az). Стоимость индивидуальной системы ориентировочная и зависит от объёма проекта.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'abituriyent-hazirligi-kurs-merkezi-idareetme-2027'],
            [
                'slug_en' => 'exam-prep-course-centre-management-2027',
                'slug_ru' => 'upravlenie-kursami-podgotovki-k-ekzamenam-2027',

                'title_az' => 'Abituriyent Hazırlığı Kurs Mərkəzi Necə İdarə Olunur: Qruplar, Sınaq İmtahanları, Nəticə Analizi və Valideyn Hesabatı (2027)',
                'title_en' => 'How to Run an Exam Prep Course Centre: Groups, Mock Exams, Results Analysis and Parent Reports (2027)',
                'title_ru' => 'Как управлять курсами подготовки к экзаменам: группы, пробные экзамены, анализ результатов и отчёты родителям (2027)',

                'review_az' => 'Qəbul və buraxılışa hazırlayan kurs mərkəzi üçün: qrupların ixtisas qrupu və səviyyəyə görə bölünməsi, illik dövr, sınaq təqvimi, ədalətli reytinq, mövzu üzrə nəticə analizi, valideyn hesabatı, ödəniş modeli, müəllim yükü və izlənməli göstəricilər.',
                'review_en' => 'For centres preparing students for university entrance and school-leaving exams: grouping by subject group and level, the yearly cycle, a mock exam calendar, fair rankings, topic-level results analysis, parent reports, fee models, teacher workload and the metrics to track.',
                'review_ru' => 'Для курсов подготовки к вступительным и выпускным экзаменам: деление групп по группам специальностей и уровню, годовой цикл, календарь пробных экзаменов, честный рейтинг, анализ результатов по темам, отчёты родителям, модели оплаты, нагрузка преподавателей и ключевые показатели.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '3 Noyabr 2026',
                'date_en' => 'November 3, 2026',
                'date_ru' => '3 Ноября 2026',

                'photo'    => 'cover-exam-prep-centre-az.png',
                'photo_en' => 'cover-exam-prep-centre-en.png',
                'photo_ru' => 'cover-exam-prep-centre-ru.png',

                'meta_title_az' => 'Abituriyent Hazırlığı Kurs Mərkəzi İdarəetmə 2027 | RS Code',
                'meta_title_en' => 'Exam Prep Course Centre Management 2027 | RS Code',
                'meta_title_ru' => 'Управление курсами подготовки к экзаменам 2027 | RS Code',

                'meta_description_az' => 'Hazırlıq kursu necə idarə olunur: ixtisas qrupu üzrə qruplar, sınaq imtahanları, ədalətli reytinq, nəticə analizi, valideyn hesabatı, ödəniş və göstəricilər.',
                'meta_description_en' => 'How to run an exam prep centre: groups by subject group, mock exams, fair rankings, results analysis, parent reports, fee collection and key metrics.',
                'meta_description_ru' => 'Как управлять курсами подготовки: группы по специальностям, пробные экзамены, честный рейтинг, анализ результатов, отчёты родителям, оплата и показатели.',

                'meta_keywords_az' => 'abituriyent hazırlığı, hazırlıq kursu, kurs mərkəzi idarəetmə, sınaq imtahanı, qəbul imtahanına hazırlıq, buraxılış imtahanı, valideyn kabineti, kursometr, 2027',
                'meta_keywords_en' => 'exam prep centre, university entrance exam preparation, course centre management, mock exams, school-leaving exam, parent portal, kursometr, 2027',
                'meta_keywords_ru' => 'подготовка абитуриентов, курсы подготовки к экзаменам, управление учебным центром, пробный экзамен, вступительные экзамены, кабинет родителя, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
