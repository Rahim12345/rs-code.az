<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #80 — Musiqi, rəqs və rəsm studiyası üçün idarəetmə proqramı (2027): musiqi məktəbi, rəqs studiyası, rəsm/incəsənət studiyası, şahmat və teatr dərnəyi.
 * Səviyyə və yaş üzrə qruplar + fərdi (1:1) dərslər (fortepiano, vokal), bir neçə müəllim üzrə həftəlik cədvəl (otaq bronu İDDİA EDİLMİR), davamiyyət,
 * əvəzedici dərs — proqram funksiyası deyil, studiya qaydası kimi; aylıq və hissə-hissə ödəniş, borclar; valideyn kabineti (yalnız davamiyyət, qiymətlər,
 * sınaq nəticələri); yalnız qrupa görünən materiallar və dərs yazıları (notlar, xoreoqrafiya, texnika); ev tapşırığı — tələbə kabinetdən FAYL təhvil verir
 * (rəsmin fotosu, məşq yazısı faylı; video hostinq VƏD EDİLMİR); nəzəriyyə sınaqları (musiqi nəzəriyyəsi, incəsənət tarixi), mentor hesabları;
 * kağız jurnal + WhatsApp + Excel-dən keçid, müqayisə, studiya qaydaları (sınaq dərsi, buraxılan dərs, konsert/sərgi), qurulum siyahısı.
 * Kursometr faktları yalnız #75–#79 ilə eynidir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət, vaxtlı sınaqlar (təyin olunan saatda
 * açılıb-bağlanır, qapalı suallar avtomatik), PDF test toplusu → sual bazası, ev tapşırığı (fayl ilə verilir, tələbə kabinetdən təhvil verir),
 * ödəniş izləmə, valideyn kabineti (davamiyyət, qiymətlər, sınaq nəticələri), mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar,
 * telefon brauzeri, Google ilə giriş, pulsuz müəllim qeydiyyatı.
 * Otaq bronu, SMS/push, avtomatik xatırlatma, onlayn ödəniş, video hostinq, mobil tətbiq, sertifikat, qiymət və bazar statistikası İDDİA EDİLMİR. Fərdi sistem → /elaqe.
 */
class Blog80ArtStudioSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Musiqi məktəbi, rəqs studiyası və ya rəsm emalatxanası adi kurs mərkəzinə oxşamır. Bir otaqda fortepiano üzrə fərdi dərs gedir, yanındakı zalda uşaqların rəqs qrupu məşq edir, axşam isə böyüklər üçün akvarel qrupu toplaşır. Bir şagird həftədə bir dəfə vokala, iki dəfə xora gəlir, digəri yalnız şənbə günü rəsm dərsinə. Müəllimlərin bir qismi tam ştatda, bir qismi yalnız müəyyən günlərdə işləyir. Bütün bunlar adətən kağız jurnalda, WhatsApp qruplarında və administratorun Excel cədvəlində aparılır — və ay sonunda "kim neçə dərsə gəlib, kim ödəyib?" sualı saatlar aparır.</p>
<p>Bu yazı 2027-ci ildə musiqi məktəbi, rəqs studiyası, rəsm və incəsənət studiyası, həmçinin şahmat və ya teatr dərnəyi idarə edən sahibkarlar, müəllimlər və administratorlar üçündür. Səviyyə və yaş üzrə qrupları, fərdi dərsləri, bir neçə müəllim üzrə həftəlik cədvəli, davamiyyəti, aylıq ödənişləri və borcları, valideyn kabinetini, notları və xoreoqrafiya materiallarını, ev tapşırığını və sadə nəzəriyyə sınaqlarını addım-addım nəzərdən keçiririk. Sonda kağız jurnal + WhatsApp + Excel ilə <a href="/mehsullar/kursometr">Kursometr</a> müqayisəsi, studiya qaydaları üzrə məsləhətlər və qurulum siyahısı var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Studiyanı nə fərqləndirir?</td><td>Səviyyə və yaş üzrə qruplarla yanaşı fərdi (1:1) dərslər — məsələn, fortepiano və ya vokal</td></tr>
    <tr><td>Cədvəl necə qurulmalıdır?</td><td>Hər qrup və hər fərdi şagird üçün sabit həftəlik cədvəl, müəllimlər üzrə aydın bölgü ilə</td></tr>
    <tr><td>Buraxılan dərslər nə olsun?</td><td>Əvəzedici dərs qaydasını əvvəlcədən yazılı müəyyən edin və davamiyyəti hər dərsdə qeyd edin</td></tr>
    <tr><td>Ödəniş necə izlənməlidir?</td><td>Hər şagirdin aylıq və ya hissə-hissə ödənişi bir yerdə: kim ödəyib, kimin borcu var</td></tr>
    <tr><td>Notlar və videolar harada saxlanmalıdır?</td><td>Yalnız həmin qrupa görünən yerdə — böyük çat qrupunda yox</td></tr>
    <tr><td>Ev tapşırığı necə qəbul olunmalıdır?</td><td>Şagird işini fayl kimi kabinetindən təhvil verir — məsələn, rəsmin fotosu</td></tr>
    <tr><td>Hansı sistem?</td><td>Qrup, cədvəl, davamiyyət, materiallar, tapşırıq, sınaq və ödəniş bir yerdə — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Yaradıcı Studiya Niyə Fərqli İdarə Olunur</h2>
<p>Riyaziyyat kursunda qrup adətən bir səviyyədə olur və eyni proqramı keçir. Yaradıcı studiyada isə mənzərə daha qarışıqdır. Musiqidə şagirdin hansı alətdə çaldığı, neçə ildir oxuduğu və məqsədi (hobbi, konservatoriyaya hazırlıq, müsabiqə) dərsin formatını müəyyən edir. Rəqsdə yaş və fiziki hazırlıq əsasdır: beş yaşlı uşaqla yeniyetməni bir qrupa qoymaq olmaz. Rəsmdə eyni qrupda müxtəlif səviyyəli şagirdlər otura bilər, amma tapşırıqlar fərqlənir. Şahmat dərnəyində qruplar reytinqə və səviyyəyə, teatr dərnəyində isə yaşa və tamaşaya görə qurulur.</p>
<p>Ona görə studiyada adətən üç format eyni vaxtda yaşayır:</p>
<table>
  <thead>
    <tr><th>Format</th><th>Nümunə</th><th>Əsas çətinlik</th><th>Sistemdə nə lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Səviyyə üzrə qrup</td><td>Başlanğıc gitara, orta səviyyə şahmat, akademik rəsm</td><td>Şagird irəlilədikcə qrupdan-qrupa keçir</td><td>Qruplar, davamiyyət, sınaqlar</td></tr>
    <tr><td>Yaş üzrə qrup</td><td>Uşaq xoreoqrafiyası, uşaq teatr studiyası, kiçiklər üçün rəsm</td><td>Valideyn hər şeyi bilmək istəyir</td><td>Qruplar, valideyn kabineti</td></tr>
    <tr><td>Fərdi (1:1) dərs</td><td>Fortepiano, vokal, skripka, fərdi rəqs məşqi</td><td>Hər şagirdin öz vaxtı, öz ödənişi</td><td>Ayrıca qrup kimi cədvəl, ödəniş izləmə</td></tr>
    <tr><td>Ansambl və ya tamaşa qrupu</td><td>Xor, rəqs ansamblı, teatr tamaşası</td><td>Bir neçə qrupdan şagird toplanır</td><td>Ayrıca qrup, ümumi materiallar</td></tr>
  </tbody>
</table>
<p>Praktik qayda: fərdi şagirdi də sistemdə ayrıca "qrup" kimi aparın — məsələn, "Fortepiano — fərdi — Aysel". Belə olanda onun cədvəli, davamiyyəti, materialları və ödənişi digər şagirdlərlə qarışmır. Qrupların adında isə istiqamət, səviyyə və ya yaş olsun: "Müasir rəqs — 7–9 yaş", "Gitara — başlanğıc", "Akademik rəsm — yeniyetmələr". <a href="/mehsullar/kursometr">Kursometr</a>-də fənlər (istiqamətlər) və qruplar yaradılır, hər qrup üçün həftəlik cədvəl qurulur, davamiyyət də bu cədvələ əsasən aparılır.</p>

<h2>2. Həftəlik Cədvəl və Müəllimlər</h2>
<p>Studiyanın cədvəli tez-tez dəyişən canlı orqanizm kimidir: fərdi dərslər məktəb saatlarına uyğunlaşdırılır, qrup dərsləri axşam və həftəsonuna yığılır, konsert və ya sərgi yaxınlaşanda əlavə məşqlər çıxır. Bir neçə müəllim işləyəndə isə "bu gün saat beşdə kim kiminlə məşğul olur?" sualına cavab vermək üçün administrator hər dəfə dəftəri vərəqləyir.</p>
<p>Cədvəli bir dəfə düzgün qurun: hər qrupun və hər fərdi şagirdin dərs günləri və saatı, müəllimi həftəlik cədvəldə yazılsın. Bu, həm müəllimə öz gününü görməyə, həm administratora boşluqları tapmağa, həm də davamiyyəti dərs tarixinə bağlamağa imkan verir. Otaqların bölgüsünü isə ayrıca, sadə qayda ilə həll edin: hansı zal rəqs üçün, hansı otaq fortepiano üçündür — bunu müəllimlərlə əvvəlcədən razılaşdırın ki, cədvəl qurularkən toqquşma olmasın.</p>
<h3>Assistent müəllimlər</h3>
<p>Rəqs qrupunda çox vaxt əsas xoreoqrafla yanaşı assistent işləyir, uşaq rəsm qrupunda köməkçi materialları paylayır, musiqi məktəbində isə yuxarı kurs tələbəsi kiçiklərə nəzəriyyədən kömək edir. Ən çox rast gəlinən problem ortaq girişdir: köməkçi əsas müəllimin telefonundan və ya ortaq paroldan istifadə edir, kim nəyi qeyd etdiyi bəlli olmur. Kursometr-də bunun üçün mentor (köməkçi müəllim) hesabları var: assistent öz hesabı ilə daxil olur və qrupla işləyir, əsas müəllimin parolunu bilməyə ehtiyac qalmır. Müəllim və ya assistent işdən ayrılanda hesabı bağlanır, qrupun məlumatı isə studiyada qalır.</p>

<h2>3. Davamiyyət və Buraxılan Dərslər</h2>
<p>Yaradıcı studiyada davamiyyət yalnız intizam məsələsi deyil, birbaşa pul məsələsidir. Fərdi dərs buraxılanda müəllimin vaxtı boş qalır, aylıq ödəniş edən valideyn isə "bu ay iki dərs buraxdıq, nə olacaq?" deyə soruşur. Kağız jurnalda bu sualın cavabını tapmaq çətindir, xüsusən jurnal müəllimin çantasında evə gedibsə.</p>
<p>Davamiyyəti hər dərsdə, dərsin özündə qeyd edin. Kursometr-də bunu telefon brauzerindən etmək olur — rəqs zalında və ya fortepiano arxasında kompüter axtarmağa ehtiyac yoxdur. Beləliklə ay sonunda kimin neçə dərsə gəldiyi bir baxışla görünür, ardıcıl bir neçə dərs buraxan şagird isə vaxtında diqqətə düşür. Ətraflı: <a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">elektron davamiyyət uçotu</a>.</p>
<h3>Əvəzedici dərs: proqram deyil, qayda</h3>
<p>Əvəzedici dərs proqramın işi deyil, studiyanın qaydasıdır. Qaydanı əvvəlcədən yazılı müəyyən edin və valideynlə razılaşdırın. Bir neçə praktik variant:</p>
<ul>
  <li><strong>Vaxtında xəbərdarlıq.</strong> Şagird fərdi dərsi müəyyən müddət əvvəl ləğv edibsə, dərs başqa günə keçirilir; son anda ləğv edilibsə, dərs keçmiş sayılır.</li>
  <li><strong>Qrup dərsində əvəzləmə.</strong> Buraxılan qrup dərsi eyni səviyyəli başqa qrupun dərsində əvəzlənə bilər — əgər yer varsa.</li>
  <li><strong>Müəllim səbəbli ləğv.</strong> Dərsi müəllim ləğv edibsə, mütləq əvəzlənir.</li>
  <li><strong>Limit.</strong> Ay ərzində əvəzlənə biləcək dərslərin sayına məhdudiyyət qoyun ki, cədvəl dağılmasın.</li>
</ul>
<p>Qayda nə olursa olsun, onu davamiyyət qeydlərinə əsaslandırın: "gəlmədi", "xəbər verdi", "əvəzləndi" kimi fərqi müəllim qeyd edəndə mübahisə yaranmır.</p>

<h2>4. Aylıq Ödəniş, Hissə-hissə Ödəniş və Valideyn Kabineti</h2>
<h3>Ödənişlər və borclar</h3>
<p>Studiyalarda ödəniş modelləri müxtəlifdir: qrup dərsləri üçün aylıq haqq, fərdi dərslər üçün dərs paketi, illik proqram üçün hissə-hissə ödəniş, bəzən də bir ailədən iki uşaq və ya iki istiqamət. Problem modeldə deyil, izləmədədir. Dəftərdə və ya Excel-də aparılan hesab bir neçə müəllim və onlarla şagird olanda tez qarışır: kimin bu ayı ödədiyi dəqiq bilinmir, keçən aydan qalan borc unudulur, valideynə xatırlatma isə yöndəmsiz söhbətə çevrilir.</p>
<p>Kursometr-də şagird ödənişləri izlənir, beləliklə borcu olanlar dəftər vərəqləmədən görünür. Xatırlatmanı isə özünüz, studiyanın adından və nəzakətlə edirsiniz — dəqiq rəqəmə əsaslanan xatırlatma mübahisə yaratmır. Ödəniş qaydalarını başlanğıcda yazılı razılaşdırın: ödəniş tarixi, buraxılan dərslərin necə hesablandığı, tətil ayları, qardaş-bacı endirimi, studiyadan çıxanda nə baş verir.</p>
<h3>Valideyn kabineti</h3>
<p>Uşaq rəqs, musiqi və ya rəsm dərsinə gedəndə ödənişi valideyn edir və o, uşağın dərsə gedib-getmədiyini, necə irəlilədiyini bilmək istəyir. Kursometr-in valideyn kabinetində davamiyyət, qiymətlər və sınaq nəticələri görünür. Beləliklə valideyn hər həftə müəllimə zəng etmədən uşağın vəziyyətini izləyir, studiya isə valideynin etibarını qazanır. Valideynlə iş barədə ətraflı: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>5. Notlar, Xoreoqrafiya Materialları və Ev Tapşırığı</h2>
<h3>Materiallar yalnız qrupa</h3>
<p>Musiqi müəllimi notları, rəqs müəllimi xoreoqrafiya yazılarını, rəsm müəllimi texnika dərslərini və nümunə işləri şagirdlərlə bölüşmək istəyir. WhatsApp qrupuna atılan material bir neçə gündən sonra yüzlərlə mesajın arasında itir, yeni gələn şagird onu heç görmür, ödəniş etməyən insanlara ötürülməsi isə asandır. Kursometr-də dərs yazıları və materiallar yalnız həmin qrupa görünür: notlar, xoreoqrafiya yazıları və texnika dərsləri qrupun səhifəsində qalır, başqa qrupların şagirdləri və kənar şəxslər onlara baxa bilmir. Bu, yayılma riskini azaldır, amma tam aradan qaldırmır — materialların şəxsi istifadə üçün olduğunu qaydalarda yazın.</p>
<h3>Ev tapşırığı: fayl ilə təhvil</h3>
<p>Yaradıcı dərsdə ev işi əsasdır: pyesi öyrənmək, hərəkət ardıcıllığını təkrarlamaq, eskiz çəkmək, şahmat tapşırığını həll etmək. Müəllim tapşırığı fayllarla birlikdə verir (məsələn, not və ya nümunə şəkil), şagird isə işini öz kabinetindən fayl kimi təhvil verir — məsələn, çəkdiyi rəsmin fotosu və ya məşq yazısının faylı. Beləliklə hər tapşırıq üzrə kimin təhvil verdiyi bir siyahıda görünür.</p>
<p>Bir məsləhət: sistemi video platforma kimi düşünməyin. Şagirddən uzun video yox, qısa məşq yazısı və ya fotoşəkil istəyin — müəllimin yoxlaması da asan olur. Tapşırıq sistemi barədə ətraflı: <a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">ev tapşırığı sistemi: ver, yoxla, izlə</a>.</p>

<h2>6. Nəzəriyyə Sınaqları</h2>
<p>Yaradıcılığı test ölçmür — pyesin ifasını, rəqsin texnikasını və rəsmin kompozisiyasını müəllim qiymətləndirir. Amma nəzəri biliyi yoxlamaq üçün qısa sınaq çox faydalıdır: musiqi nəzəriyyəsi (notların adları, intervallar, ölçü), solfecio əsasları, incəsənət tarixi (üslublar, rəssamlar, əsərlər), rəqs terminləri və ya şahmat açılışları. Kursometr-də vaxtlı sınaqlar təyin etdiyiniz saatda açılır və bağlanır, qapalı suallar isə avtomatik yoxlanır, nəticə də valideyn kabinetində görünür. Hazır PDF test toplusu varsa, onu sual bazasına əlavə edib sınaqları ondan qura bilərsiniz.</p>
<ul>
  <li><strong>Qısa saxlayın</strong> — bir mövzu, bir neçə sual.</li>
  <li><strong>Qapalı suallar</strong> — variant seçmək asandır, yoxlama avtomatik olur.</li>
  <li><strong>Mərhələ sonunda</strong> — rüb və ya semestr sonunda, imtahan və ya konsertdən əvvəl.</li>
  <li><strong>Nəticəni təhlil edin</strong> — çox səhv olan sual növbəti dərsdə təkrar olunacaq mövzunu göstərir.</li>
</ul>

<h2>7. Kağız Jurnal + WhatsApp + Excel, yoxsa Kursometr?</h2>
<p>Əksər studiyalar kağız jurnal, WhatsApp qrupları və Excel cədvəli ilə başlayır. Bir müəllim və bir neçə qrup olanda bu işləyir, amma müəllimlər, fərdi şagirdlər və valideynlər çoxaldıqca fərq görünür:</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>Kağız jurnal + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Qruplar və fərdi dərslər</td><td>Dəftərdə və ya Excel-də, əl ilə yenilənir</td><td>Fənlər, qruplar və həftəlik cədvəl</td></tr>
    <tr><td>Davamiyyət</td><td>Kağız jurnal, müəllimdə qalır</td><td>Hər dərsdə telefon brauzerindən qeyd</td></tr>
    <tr><td>Ödənişlər və borclar</td><td>Excel, intizam tələb edir</td><td>Şagird ödənişlərinin izlənməsi</td></tr>
    <tr><td>Notlar və materiallar</td><td>Çatda itir, ötürülə bilər</td><td>Yalnız həmin qrupa görünür</td></tr>
    <tr><td>Ev tapşırığı</td><td>Çatda şəkillər, kim göndərdiyi qarışır</td><td>Faylla verilir, şagird kabinetdən təhvil verir</td></tr>
    <tr><td>Nəzəriyyə sınaqları</td><td>Kağız üzərində, əl ilə yoxlama</td><td>Vaxtlı sınaqlar, qapalı suallar avtomatik yoxlanır</td></tr>
    <tr><td>Assistentlər</td><td>Ortaq telefon və ya parol</td><td>Ayrıca mentor hesabları</td></tr>
    <tr><td>Valideyn</td><td>Zənglər və ayrıca mesajlar</td><td>Valideyn kabinetində davamiyyət, qiymətlər və sınaq nəticələri</td></tr>
  </tbody>
</table>
<p>WhatsApp-dan tam imtina etmək lazım deyil: təcili elan, dərsin ləğvi və ya konsert xəbəri üçün rahatdır. Sadəcə davamiyyət, ödənişlər, materiallar və nəticələr qorunan, nizamlı yerdə saxlanmalıdır.</p>
<h3>Keçidi necə etməli</h3>
<p>Bütün studiyanı bir gündə köçürmək çətindir. Ən rahat yol bir istiqamətlə başlamaqdır — məsələn, fərdi fortepiano dərsləri və ya uşaq rəqs qrupları. Onların cədvəlini, davamiyyətini və ödənişlərini yeni sistemdə aparın, valideynlərə kabinetə necə baxacaqlarını göstərin, bir-iki həftədən sonra qalan qrupları da köçürün. Köhnə jurnalı dərhal atmayın, ilk ay müqayisə üçün saxlayın.</p>

<h2>8. Studiya Qaydaları və Qurulum Siyahısı</h2>
<h3>Sınaq dərsi</h3>
<p>Yaradıcı studiyaya gələn ailələrin çoxu əvvəlcə sınaq dərsi istəyir. Onu təsadüfi etməyin: sınaq dərsi üçün ayrıca vaxt ayırın, müəllim şagirdin səviyyəsini və maraqlarını qeyd etsin, dərsdən sonra isə hansı qrupa və ya fərdi formata uyğun olduğunu valideynə izah edin. Şagird qeydiyyatdan keçəndə dərhal uyğun qrupa əlavə olunsun ki, ilk gündən davamiyyəti və ödənişi izlənsin.</p>
<h3>Buraxılan dərs qaydaları</h3>
<p>Yuxarıda qeyd etdiyimiz kimi, əvəzedici dərs, ləğvetmə müddəti və ay ərzində əvəzləmə limiti yazılı olsun və qeydiyyat zamanı valideynə verilsin. Qayda hamı üçün eyni olanda müəllim də, administrator da fərdi danışıqlara vaxt itirmir.</p>
<h3>Konsert, sərgi və ya tamaşa</h3>
<p>Mövsümün sonunda hesabat konserti, rəsm sərgisi, rəqs çıxışı, şahmat turniri və ya tamaşa şagird üçün ən güclü motivasiyadır, valideyn üçün isə irəliləyişin əyani sübutudur. Tarixi əvvəlcədən elan edin, repertuar və ya sərgi işləri üzrə materialları qrupla bölüşün, məşqləri cədvələ əlavə edin. Çıxış edən uşaqların foto və videolarını sosial şəbəkədə paylaşmaq üçün valideynin razılığını alın.</p>
<h3>Qurulum siyahısı</h3>
<ul>
  <li>☐ İstiqamətlər (fənlər) yaradılıb: musiqi alətləri, vokal, rəqs, rəsm, şahmat, teatr</li>
  <li>☐ Qruplar səviyyə və ya yaş üzrə qurulub, fərdi şagirdlər ayrıca qrup kimi əlavə olunub</li>
  <li>☐ Hər qrupun və fərdi şagirdin həftəlik cədvəli, müəllimi bəllidir</li>
  <li>☐ Müəllim və assistentlər üçün ayrıca hesablar açılıb</li>
  <li>☐ Ödəniş və buraxılan dərs qaydaları yazılıdır və valideynlərə verilib</li>
  <li>☐ Şagirdlər qruplara əlavə olunub, valideynlər kabinetə qoşulub</li>
  <li>☐ Davamiyyət hər dərsdə telefondan qeyd olunur</li>
  <li>☐ Notlar və materiallar qrupun səhifəsində paylaşılır, çatda yox</li>
  <li>☐ İlk ev tapşırığı verilib, şagirdlər faylı kabinetdən necə təhvil verəcəklərini bilir</li>
  <li>☐ Mövsüm sonu konserti və ya sərgisinin tarixi elan olunub</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Musiqi, rəqs və rəsm studiyası üçün idarəetmə proqramı nə üçün lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Qrupları, fərdi dərsləri, bir neçə müəllim üzrə həftəlik cədvəli, davamiyyəti, ödənişləri, materialları və ev tapşırıqlarını bir yerdə aparmaq üçün. Proqram olmadan bu məlumat kağız jurnal, WhatsApp qrupları və Excel arasında bölünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Fərdi (1:1) dərsləri, məsələn fortepiano və ya vokalı necə aparmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Fərdi şagirdi ayrıca qrup kimi yaradın və ona həftəlik cədvəl qurun. Belə olanda onun davamiyyəti, materialları, tapşırıqları və ödənişi digər şagirdlərlə qarışmır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Buraxılan dərslər necə əvəzlənməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bu, studiyanın qaydasıdır: ləğvetmə müddətini, əvəzləmə şərtlərini və ay ərzində limiti əvvəlcədən yazılı müəyyən edin. Davamiyyəti hər dərsdə qeyd etmək isə qaydanı mübahisəsiz tətbiq etməyə kömək edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Şagird ev tapşırığını necə təhvil verir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr-də müəllim tapşırığı fayllarla verir, şagird isə işini öz kabinetindən fayl kimi təhvil verir — məsələn, rəsmin fotosu və ya qısa məşq yazısı. Kimin təhvil verdiyi bir siyahıda görünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Valideynlər nəyi görə bilir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Valideyn kabinetində uşağın davamiyyəti, qiymətləri və sınaq nəticələri görünür. Valideyn uşağın dərsə gedib-getmədiyini müəllimə zəng etmədən izləyə bilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-dən istifadə üçün mobil tətbiq yükləmək lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Kursometr telefon brauzerində işləyir, Google hesabı ilə daxil olmaq mümkündür. Müəllim öz səhifəsini (adiniz.kursometr.com) açır və qeydiyyat pulsuzdur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/usaq-inkisaf-merkezi-ucun-idareetme-proqrami-2027">Uşaq inkişaf mərkəzi üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">Elektron davamiyyət uçotu</a></li>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">Ev tapşırığı sistemi: ver, yoxla, izlə</a></li>
  <li><a href="/blog-details/it-ve-proqramlasdirma-kursu-ucun-idareetme-proqrami-2027">İT və proqramlaşdırma kursu üçün idarəetmə proqramı</a></li>
</ul>

<h2>Nəticə</h2>
<p>Musiqi, rəqs və rəsm studiyasının uğuru yalnız istedadlı müəllimlərdən deyil, şagirdin və valideynin gördüyü nizamdan da asılıdır. Səviyyə və yaş üzrə qruplar, ayrıca aparılan fərdi dərslər, aydın həftəlik cədvəl, hər dərsdə qeyd olunan davamiyyət, yazılı əvəzedici dərs qaydası, bir yerdə izlənən ödənişlər, yalnız qrupa görünən notlar və materiallar, kabinetdən təhvil verilən tapşırıqlar və mövsüm sonunda konsert və ya sərgi şagirdi uzun müddət studiyada saxlayır.</p>
<p><strong>Studiyanızı kağız jurnal, WhatsApp və Excel-dən bir sistemə köçürmək istəyirsiniz? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong> — müəllim qeydiyyatı pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Studiyanızın öz iş qaydalarına uyğun fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır. Kursometr funksiyaları noyabr 2026 vəziyyətinə görə təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>A music school, dance studio or art workshop is not like an ordinary course centre. In one room there is a one-to-one piano lesson, in the hall next door a children's dance group is rehearsing, and in the evening an adult watercolour group gathers. One student comes to vocals once a week and to choir twice, another only to the Saturday drawing class. Some teachers are full-time, others work only on certain days. All of this is usually kept in a paper register, WhatsApp groups and the administrator's Excel spreadsheet — and at the end of the month, "who came to how many lessons, and who has paid?" takes hours to answer.</p>
<p>This article is for owners, teachers and administrators who run a music school, dance studio, art studio, or a chess or theatre club in 2027. We go step by step through groups by level and age, one-to-one lessons, a weekly schedule across several teachers, attendance, monthly fees and debts, the parent portal, sheet music and choreography materials, homework and simple theory quizzes. At the end there is a comparison of the paper register + WhatsApp + Excel setup with <a href="/mehsullar/kursometr">Kursometr</a>, tips on studio policies and a setup checklist.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What makes a studio different?</td><td>One-to-one lessons — for example, piano or vocals — alongside groups by level and age</td></tr>
    <tr><td>How should the schedule be set up?</td><td>A fixed weekly schedule for each group and each one-to-one student, with a clear split between teachers</td></tr>
    <tr><td>What about missed lessons?</td><td>Set a written make-up lesson policy in advance and mark attendance at every lesson</td></tr>
    <tr><td>How should payments be tracked?</td><td>Every student's monthly fee or instalments in one place: who has paid and who owes</td></tr>
    <tr><td>Where should sheet music and videos be kept?</td><td>Somewhere visible only to that group — not in a big chat group</td></tr>
    <tr><td>How should homework be collected?</td><td>The student submits their work as a file from their cabinet — for example, a photo of a drawing</td></tr>
    <tr><td>Which system?</td><td>Groups, schedule, attendance, materials, homework, quizzes and payments in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Why a Creative Studio Is Managed Differently</h2>
<p>In a maths course, a group is usually at one level and follows the same programme. In a creative studio the picture is more mixed. In music, the instrument a student plays, how many years they have studied and their goal (a hobby, conservatoire preparation, a competition) shape the lesson format. In dance, age and physical readiness are key: you cannot put a five-year-old and a teenager in the same group. In art, students of different levels can sit in the same group but get different assignments. A chess club builds groups by rating and level, and a theatre club by age and production.</p>
<p>That is why a studio usually runs three formats at the same time:</p>
<table>
  <thead>
    <tr><th>Format</th><th>Example</th><th>Main challenge</th><th>What the system needs</th></tr>
  </thead>
  <tbody>
    <tr><td>Group by level</td><td>Beginner guitar, intermediate chess, academic drawing</td><td>Students move between groups as they progress</td><td>Groups, attendance, quizzes</td></tr>
    <tr><td>Group by age</td><td>Kids' choreography, a children's theatre studio, drawing for little ones</td><td>Parents want to know everything</td><td>Groups, parent portal</td></tr>
    <tr><td>One-to-one (1:1) lesson</td><td>Piano, vocals, violin, individual dance coaching</td><td>Each student has their own time and their own payment</td><td>A schedule as a separate group, payment tracking</td></tr>
    <tr><td>Ensemble or production group</td><td>Choir, dance ensemble, a theatre production</td><td>Students are gathered from several groups</td><td>A separate group, shared materials</td></tr>
  </tbody>
</table>
<p>A practical rule: keep a one-to-one student in the system as a separate "group" too — for example, "Piano — one-to-one — Aysel". That way their schedule, attendance, materials and payments do not get mixed up with other students'. Group names should include the direction and the level or age: "Contemporary dance — ages 7–9", "Guitar — beginners", "Academic drawing — teens". In <a href="/mehsullar/kursometr">Kursometr</a> you create subjects (directions) and groups, set up a weekly schedule for each group, and attendance is kept against that schedule.</p>

<h2>2. The Weekly Schedule and Teachers</h2>
<p>A studio's schedule is a living thing that changes often: one-to-one lessons are fitted around school hours, group lessons are packed into evenings and weekends, and extra rehearsals appear as a concert or exhibition approaches. When several teachers work, the administrator leafs through the notebook every time to answer "who is with whom at five o'clock today?".</p>
<p>Set the schedule up correctly once: the lesson days and time and the teacher of each group and each one-to-one student should be in the weekly schedule. This lets teachers see their own day, lets the administrator find gaps, and ties attendance to the lesson date. Handle the use of rooms separately with a simple rule: which hall is for dance and which room is for piano — agree this with teachers in advance so there are no clashes when the schedule is built.</p>
<h3>Assistant teachers</h3>
<p>In a dance group an assistant often works alongside the lead choreographer, in a kids' art group a helper hands out materials, and in a music school a senior student helps younger ones with theory. The most common problem is shared access: the helper uses the lead teacher's phone or a shared password, and it is unclear who recorded what. Kursometr has mentor (assistant teacher) accounts for this: the assistant signs in with their own account and works with the group, with no need to know the lead teacher's password. When a teacher or assistant leaves, their account is closed and the group's data stays with the studio.</p>

<h2>3. Attendance and Missed Lessons</h2>
<p>In a creative studio, attendance is not just a matter of discipline but directly a matter of money. When a one-to-one lesson is missed, the teacher's time goes unused, and a parent who pays monthly asks, "we missed two lessons this month — what happens now?". Finding the answer in a paper register is hard, especially if the register has gone home in the teacher's bag.</p>
<p>Mark attendance at every lesson, during the lesson itself. In Kursometr you can do this from a phone browser — no need to look for a computer in the dance hall or at the piano. This way, at the end of the month, who came to how many lessons is visible at a glance, and a student who has missed several lessons in a row gets noticed in time. More: <a href="/blog-details/attendance-tracking-for-course-centres-2027">electronic attendance tracking</a>.</p>
<h3>Make-up lessons: a policy, not a feature</h3>
<p>Make-up lessons are not the software's job but the studio's policy. Set the policy in writing in advance and agree it with parents. A few practical options:</p>
<ul>
  <li><strong>Notice in time.</strong> If a student cancels a one-to-one lesson a set time in advance, the lesson moves to another day; if it is cancelled at the last minute, the lesson counts as taken.</li>
  <li><strong>Make-up in a group.</strong> A missed group lesson can be made up in another group's lesson at the same level — if there is space.</li>
  <li><strong>Cancelled by the teacher.</strong> If the teacher cancels the lesson, it is always made up.</li>
  <li><strong>A limit.</strong> Cap the number of lessons that can be made up in a month so the schedule does not fall apart.</li>
</ul>
<p>Whatever the policy, base it on attendance records: when the teacher records the difference between "did not come", "gave notice" and "made up", there are no arguments.</p>

<h2>4. Monthly Fees, Instalments and the Parent Portal</h2>
<h3>Payments and debts</h3>
<p>Studios use different payment models: a monthly fee for group lessons, a lesson package for one-to-one lessons, instalments for a year-long programme, and sometimes two children from one family or two directions. The problem is not the model but the tracking. Accounts kept in a notebook or in Excel quickly get mixed up with several teachers and dozens of students: it is unclear who has paid this month, a debt left over from last month is forgotten, and reminding a parent turns into an awkward conversation.</p>
<p>Kursometr tracks student payments, so those who owe are visible without leafing through a notebook. You send the reminder yourself, politely and in the studio's name — a reminder based on exact figures does not cause arguments. Agree the payment rules in writing at the start: the payment date, how missed lessons are counted, holiday months, sibling discounts and what happens when a student leaves the studio.</p>
<h3>The parent portal</h3>
<p>When a child goes to dance, music or art lessons, the parent pays and wants to know whether the child attends and how they are progressing. The Kursometr parent portal shows attendance, grades and test results. This way the parent follows the child's progress without calling the teacher every week, and the studio earns the parent's trust. More on working with parents: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>5. Sheet Music, Choreography Materials and Homework</h2>
<h3>Materials for the group only</h3>
<p>A music teacher wants to share sheet music, a dance teacher choreography recordings, and an art teacher technique lessons and sample works with students. Material posted in a WhatsApp group gets lost among hundreds of messages within a few days, a new student never sees it, and it is easy to pass on to people who have not paid. In Kursometr, lesson recordings and materials are visible only to that group: sheet music, choreography recordings and technique lessons stay on the group's page, and students from other groups and outsiders cannot see them. This reduces the risk of materials spreading but does not eliminate it — state in your rules that materials are for personal use.</p>
<h3>Homework: submitted as a file</h3>
<p>Practice at home is essential in creative lessons: learning a piece, repeating a sequence of moves, drawing a sketch, solving a chess puzzle. The teacher sets the assignment together with files (for example, sheet music or a sample image), and the student submits their work as a file from their own cabinet — for example, a photo of their drawing or a file with a practice recording. This way, who has submitted each assignment is visible in one list.</p>
<p>One tip: do not think of the system as a video platform. Ask students for a short practice recording or a photo rather than a long video — it is easier for the teacher to review too. More on the homework system: <a href="/blog-details/homework-system-for-teachers-2027">homework system for teachers</a>.</p>

<h2>6. Theory Quizzes</h2>
<p>A test does not measure creativity — the teacher assesses the performance of a piece, the technique of a dance and the composition of a drawing. But a short quiz is very useful for checking theory: music theory (note names, intervals, time signatures), the basics of solfège, art history (styles, artists, works), dance terminology or chess openings. In Kursometr, timed tests open and close at the time you set, closed questions are graded automatically, and the result appears in the parent portal. If you have a ready-made PDF test collection, you can import it into the question bank and build quizzes from it.</p>
<ul>
  <li><strong>Keep it short</strong> — one topic, a few questions.</li>
  <li><strong>Closed questions</strong> — choosing an option is easy, and grading is automatic.</li>
  <li><strong>At the end of a stage</strong> — at the end of a term or semester, before an exam or concert.</li>
  <li><strong>Analyse the results</strong> — a question many students got wrong shows the topic to repeat in the next lesson.</li>
</ul>

<h2>7. Paper Register + WhatsApp + Excel, or Kursometr?</h2>
<p>Most studios start with a paper register, WhatsApp groups and an Excel spreadsheet. With one teacher and a few groups this works, but as teachers, one-to-one students and parents multiply, the difference shows:</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>Paper register + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Groups and one-to-one lessons</td><td>In a notebook or Excel, updated by hand</td><td>Subjects, groups and a weekly schedule</td></tr>
    <tr><td>Attendance</td><td>A paper register that stays with the teacher</td><td>Marked at every lesson from a phone browser</td></tr>
    <tr><td>Payments and debts</td><td>Excel, takes discipline</td><td>Student payment tracking</td></tr>
    <tr><td>Sheet music and materials</td><td>Lost in the chat, can be passed on</td><td>Visible only to that group</td></tr>
    <tr><td>Homework</td><td>Photos in the chat; who sent what gets mixed up</td><td>Set with files; students submit from their cabinet</td></tr>
    <tr><td>Theory quizzes</td><td>On paper, graded by hand</td><td>Timed tests, closed questions graded automatically</td></tr>
    <tr><td>Assistants</td><td>A shared phone or password</td><td>Separate mentor accounts</td></tr>
    <tr><td>Parents</td><td>Calls and separate messages</td><td>Attendance, grades and test results in the parent portal</td></tr>
  </tbody>
</table>
<p>There is no need to drop WhatsApp completely: it is handy for urgent announcements, a cancelled lesson or concert news. Attendance, payments, materials and results simply need to be kept in a protected, orderly place.</p>
<h3>How to make the switch</h3>
<p>Moving the whole studio in one day is hard. The easiest way is to start with one direction — for example, one-to-one piano lessons or the children's dance groups. Run their schedule, attendance and payments in the new system, show parents how to view the portal, and move the remaining groups after a week or two. Do not throw away the old register straight away; keep it for comparison during the first month.</p>

<h2>8. Studio Policies and a Setup Checklist</h2>
<h3>Trial lesson</h3>
<p>Many families who come to a creative studio first ask for a trial lesson. Do not leave it to chance: set aside a separate time for trial lessons, have the teacher note the student's level and interests, and after the lesson explain to the parent which group or one-to-one format suits the child. When the student enrols, add them to the right group straight away so their attendance and payments are tracked from day one.</p>
<h3>Missed-lesson rules</h3>
<p>As mentioned above, the make-up lesson policy, the cancellation notice period and the monthly make-up limit should be in writing and given to parents at enrolment. When the rule is the same for everyone, neither the teacher nor the administrator wastes time on one-off negotiations.</p>
<h3>Concert, exhibition or performance</h3>
<p>An end-of-season recital, art exhibition, dance performance, chess tournament or play is the strongest motivation for students and visible proof of progress for parents. Announce the date in advance, share repertoire or exhibition materials with the group, and add rehearsals to the schedule. Get parents' consent before sharing photos and videos of performing children on social media.</p>
<h3>Setup checklist</h3>
<ul>
  <li>☐ Directions (subjects) are created: instruments, vocals, dance, art, chess, theatre</li>
  <li>☐ Groups are built by level or age, and one-to-one students are added as separate groups</li>
  <li>☐ Each group's and each one-to-one student's weekly schedule and teacher are clear</li>
  <li>☐ Separate accounts are opened for teachers and assistants</li>
  <li>☐ Payment and missed-lesson rules are in writing and have been given to parents</li>
  <li>☐ Students are added to groups, and parents are connected to the portal</li>
  <li>☐ Attendance is marked at every lesson from a phone</li>
  <li>☐ Sheet music and materials are shared on the group page, not in a chat</li>
  <li>☐ The first homework is set, and students know how to submit a file from their cabinet</li>
  <li>☐ The date of the end-of-season concert or exhibition has been announced</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Why does a music, dance or art studio need management software?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">To keep groups, one-to-one lessons, the weekly schedule across several teachers, attendance, payments, materials and homework in one place. Without software this information is split between a paper register, WhatsApp groups and Excel.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do you manage one-to-one lessons, such as piano or vocals?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Create the one-to-one student as a separate group and set up a weekly schedule for them. That way their attendance, materials, homework and payments do not get mixed up with other students'.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How should missed lessons be made up?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">This is the studio's policy: set the cancellation notice period, the make-up conditions and a monthly limit in writing in advance. Marking attendance at every lesson helps apply the policy without arguments.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How does a student submit homework?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In Kursometr, the teacher sets the assignment with files, and the student submits their work as a file from their own cabinet — for example, a photo of a drawing or a short practice recording. Who has submitted is visible in one list.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What can parents see?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The parent portal shows the child's attendance, grades and test results. Parents can follow whether the child goes to lessons without calling the teacher.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do you need to install a mobile app to use Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. Kursometr works in a phone browser, and you can sign in with a Google account. The teacher opens their own page (yourname.kursometr.com), and registration is free.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/management-software-for-kids-development-centres-2027">Management software for kids' development centres</a></li>
  <li><a href="/blog-details/attendance-tracking-for-course-centres-2027">Electronic attendance tracking</a></li>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/homework-system-for-teachers-2027">Homework system for teachers</a></li>
  <li><a href="/blog-details/management-software-for-it-and-coding-courses-2027">Management software for IT and coding courses</a></li>
</ul>

<h2>Conclusion</h2>
<p>The success of a music, dance or art studio depends not only on talented teachers but also on the order that students and parents can see. Groups by level and age, one-to-one lessons kept separately, a clear weekly schedule, attendance marked at every lesson, a written make-up lesson policy, payments tracked in one place, sheet music and materials visible only to the group, homework submitted from the cabinet and a concert or exhibition at the end of the season keep students at the studio for the long term.</p>
<p><strong>Want to move your studio from a paper register, WhatsApp and Excel into one system? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher registration is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. If your studio needs a custom system built around its own workflows: <a href="/contact">get in touch</a>.</p>
<p><small><em>This article is general information. Kursometr features are described as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Музыкальная школа, танцевальная студия или художественная мастерская не похожи на обычный учебный центр. В одном кабинете идёт индивидуальный урок фортепиано, в соседнем зале репетирует детская танцевальная группа, а вечером собирается взрослая группа акварели. Один ученик ходит на вокал раз в неделю и на хор дважды, другой — только на субботнее рисование. Часть педагогов работает полный день, часть — только в определённые дни. Обычно всё это ведётся в бумажном журнале, группах WhatsApp и таблице Excel у администратора — и в конце месяца вопрос «кто сколько занятий посетил и кто оплатил?» отнимает часы.</p>
<p>Эта статья — для владельцев, педагогов и администраторов, которые в 2027 году управляют музыкальной школой, танцевальной или художественной студией, шахматным или театральным кружком. Пошагово разбираем группы по уровню и возрасту, индивидуальные занятия, недельное расписание нескольких педагогов, посещаемость, ежемесячную оплату и долги, кабинет родителя, ноты и хореографические материалы, домашние задания и простые тесты по теории. В конце — сравнение связки бумажный журнал + WhatsApp + Excel с <a href="/mehsullar/kursometr">Kursometr</a>, советы по правилам студии и чек-лист настройки.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Чем отличается студия?</td><td>Наряду с группами по уровню и возрасту есть индивидуальные (1:1) занятия — например, фортепиано или вокал</td></tr>
    <tr><td>Как строить расписание?</td><td>Постоянное недельное расписание для каждой группы и каждого индивидуального ученика с понятным распределением по педагогам</td></tr>
    <tr><td>Что делать с пропусками?</td><td>Заранее письменно установить правила отработки и отмечать посещаемость на каждом занятии</td></tr>
    <tr><td>Как учитывать оплату?</td><td>Ежемесячная оплата или платежи частями каждого ученика в одном месте: кто оплатил, у кого долг</td></tr>
    <tr><td>Где хранить ноты и видео?</td><td>Там, где их видит только эта группа, — не в большом чате</td></tr>
    <tr><td>Как принимать домашние задания?</td><td>Ученик сдаёт работу файлом из своего кабинета — например, фото рисунка</td></tr>
    <tr><td>Какая система?</td><td>Группы, расписание, посещаемость, материалы, задания, тесты и оплата в одном месте — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Почему творческой студией управляют иначе</h2>
<p>На курсах математики группа обычно одного уровня и идёт по одной программе. В творческой студии картина пестрее. В музыке формат занятия определяют инструмент, стаж ученика и его цель (хобби, подготовка в консерваторию, конкурс). В танцах главное — возраст и физическая подготовка: пятилетнего ребёнка и подростка в одну группу не поставишь. В рисовании в одной группе могут заниматься ученики разного уровня, но задания у них разные. Шахматный кружок формирует группы по рейтингу и уровню, театральный — по возрасту и спектаклю.</p>
<p>Поэтому в студии обычно одновременно живут три формата:</p>
<table>
  <thead>
    <tr><th>Формат</th><th>Пример</th><th>Главная сложность</th><th>Что нужно в системе</th></tr>
  </thead>
  <tbody>
    <tr><td>Группа по уровню</td><td>Гитара для начинающих, шахматы среднего уровня, академический рисунок</td><td>По мере роста ученик переходит из группы в группу</td><td>Группы, посещаемость, тесты</td></tr>
    <tr><td>Группа по возрасту</td><td>Детская хореография, детская театральная студия, рисование для малышей</td><td>Родитель хочет знать всё</td><td>Группы, кабинет родителя</td></tr>
    <tr><td>Индивидуальное (1:1) занятие</td><td>Фортепиано, вокал, скрипка, индивидуальная постановка танца</td><td>У каждого ученика своё время и своя оплата</td><td>Расписание как отдельной группы, учёт оплат</td></tr>
    <tr><td>Ансамбль или постановочная группа</td><td>Хор, танцевальный ансамбль, театральный спектакль</td><td>Ученики собираются из нескольких групп</td><td>Отдельная группа, общие материалы</td></tr>
  </tbody>
</table>
<p>Практическое правило: индивидуального ученика тоже ведите в системе как отдельную «группу» — например, «Фортепиано — индивидуально — Айсель». Тогда его расписание, посещаемость, материалы и оплата не смешиваются с данными других учеников. В названии групп указывайте направление и уровень или возраст: «Современный танец — 7–9 лет», «Гитара — начинающие», «Академический рисунок — подростки». В <a href="/mehsullar/kursometr">Kursometr</a> создаются предметы (направления) и группы, для каждой группы настраивается недельное расписание, а посещаемость ведётся по этому расписанию.</p>

<h2>2. Недельное расписание и педагоги</h2>
<p>Расписание студии — живой организм, который часто меняется: индивидуальные занятия подстраиваются под школьные часы, групповые собираются на вечер и выходные, а перед концертом или выставкой появляются дополнительные репетиции. Когда работают несколько педагогов, администратор каждый раз листает тетрадь, чтобы ответить на вопрос «кто с кем занимается сегодня в пять?».</p>
<p>Один раз правильно настройте расписание: дни и время занятий и педагог каждой группы и каждого индивидуального ученика должны быть в недельном расписании. Так педагог видит свой день, администратор находит свободные окна, а посещаемость привязывается к дате занятия. Распределение кабинетов решите отдельно простым правилом: какой зал для танцев, какой кабинет для фортепиано — договоритесь с педагогами заранее, чтобы при составлении расписания не было накладок.</p>
<h3>Помощники педагога</h3>
<p>В танцевальной группе рядом с хореографом часто работает ассистент, в детской группе рисования помощник раздаёт материалы, а в музыкальной школе старшекурсник помогает младшим с теорией. Самая частая проблема — общий доступ: помощник пользуется телефоном основного педагога или общим паролем, и непонятно, кто что отметил. Для этого в Kursometr есть аккаунты ментора (помощника преподавателя): помощник входит под своим аккаунтом и работает с группой, знать пароль основного педагога не нужно. Когда педагог или ассистент уходит, его аккаунт закрывается, а данные группы остаются в студии.</p>

<h2>3. Посещаемость и пропущенные занятия</h2>
<p>В творческой студии посещаемость — вопрос не только дисциплины, но и напрямую денег. Когда пропущено индивидуальное занятие, время педагога простаивает, а родитель, который платит помесячно, спрашивает: «В этом месяце мы пропустили два занятия — что теперь?». Найти ответ в бумажном журнале трудно, особенно если журнал уехал домой в сумке педагога.</p>
<p>Отмечайте посещаемость на каждом занятии, прямо во время урока. В Kursometr это можно делать из браузера телефона — не нужно искать компьютер в танцевальном зале или у фортепиано. Тогда в конце месяца с одного взгляда видно, кто сколько занятий посетил, а ученик, пропустивший несколько занятий подряд, вовремя попадает в поле зрения. Подробнее: <a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">электронный учёт посещаемости</a>.</p>
<h3>Отработка: правило, а не функция</h3>
<p>Отработка пропущенных занятий — задача не программы, а правил студии. Установите правило заранее письменно и согласуйте его с родителями. Несколько практических вариантов:</p>
<ul>
  <li><strong>Своевременное предупреждение.</strong> Если ученик отменил индивидуальное занятие за установленное время, урок переносится на другой день; если отмена в последний момент — занятие считается проведённым.</li>
  <li><strong>Отработка в группе.</strong> Пропущенное групповое занятие можно отработать на уроке другой группы того же уровня — если есть место.</li>
  <li><strong>Отмена по вине педагога.</strong> Если занятие отменил педагог, оно обязательно отрабатывается.</li>
  <li><strong>Лимит.</strong> Ограничьте число занятий, которые можно отработать за месяц, чтобы расписание не развалилось.</li>
</ul>
<p>Каким бы ни было правило, опирайтесь на записи посещаемости: когда педагог отмечает разницу между «не пришёл», «предупредил» и «отработал», споров не возникает.</p>

<h2>4. Ежемесячная оплата, платежи частями и кабинет родителя</h2>
<h3>Оплаты и долги</h3>
<p>Модели оплаты в студиях разные: абонемент на месяц за групповые занятия, пакет уроков за индивидуальные, оплата частями за годовую программу, а иногда двое детей из одной семьи или два направления. Проблема не в модели, а в учёте. Расчёты в тетради или Excel быстро путаются, когда педагогов несколько, а учеников десятки: неясно, кто оплатил этот месяц, долг с прошлого месяца забывается, а напоминание родителю превращается в неловкий разговор.</p>
<p>В Kursometr ведётся учёт оплат учеников, поэтому должники видны без листания тетради. Напоминание вы отправляете сами, от имени студии и вежливо, — напоминание с точными цифрами не вызывает споров. Правила оплаты согласуйте письменно с самого начала: дата оплаты, как учитываются пропущенные занятия, месяцы каникул, скидка для братьев и сестёр, что происходит при уходе из студии.</p>
<h3>Кабинет родителя</h3>
<p>Когда ребёнок ходит на танцы, музыку или рисование, платит родитель — и он хочет знать, ходит ли ребёнок на занятия и как продвигается. В кабинете родителя Kursometr видны посещаемость, оценки и результаты тестов. Так родитель следит за успехами ребёнка, не звоня педагогу каждую неделю, а студия зарабатывает его доверие. Подробнее о работе с родителями: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>5. Ноты, хореографические материалы и домашние задания</h2>
<h3>Материалы только для группы</h3>
<p>Педагог музыки хочет делиться с учениками нотами, педагог танцев — записями хореографии, педагог рисования — уроками техники и образцами работ. Материал, отправленный в группу WhatsApp, через несколько дней теряется среди сотен сообщений, новый ученик его вообще не видит, а переслать его тем, кто не платил, легко. В Kursometr записи уроков и материалы видны только этой группе: ноты, записи хореографии и уроки техники остаются на странице группы, а ученики других групп и посторонние их не видят. Это снижает риск распространения, но не исключает его полностью — пропишите в правилах, что материалы предназначены для личного использования.</p>
<h3>Домашнее задание: сдача файлом</h3>
<p>В творческих занятиях домашняя практика — основа: выучить пьесу, повторить связку движений, нарисовать эскиз, решить шахматную задачу. Педагог выдаёт задание вместе с файлами (например, ноты или образец изображения), а ученик сдаёт работу файлом из своего кабинета — например, фото своего рисунка или файл с записью репетиции. Так по каждому заданию в одном списке видно, кто его сдал.</p>
<p>Совет: не воспринимайте систему как видеоплатформу. Просите у учеников короткую запись репетиции или фотографию, а не длинное видео — педагогу так и проверять проще. Подробнее о системе заданий: <a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">система домашних заданий для учителя</a>.</p>

<h2>6. Тесты по теории</h2>
<p>Творчество тестом не измерить — исполнение пьесы, технику танца и композицию рисунка оценивает педагог. Но для проверки теории короткий тест очень полезен: теория музыки (названия нот, интервалы, размер), основы сольфеджио, история искусства (стили, художники, произведения), танцевальная терминология или шахматные дебюты. В Kursometr тесты с таймером открываются и закрываются в заданное вами время, закрытые вопросы проверяются автоматически, а результат виден в кабинете родителя. Если у вас есть готовый сборник тестов в PDF, его можно добавить в банк вопросов и собирать тесты из него.</p>
<ul>
  <li><strong>Коротко</strong> — одна тема, несколько вопросов.</li>
  <li><strong>Закрытые вопросы</strong> — выбрать вариант легко, проверка автоматическая.</li>
  <li><strong>В конце этапа</strong> — в конце четверти или семестра, перед экзаменом или концертом.</li>
  <li><strong>Анализируйте результаты</strong> — вопрос, в котором ошиблись многие, показывает тему для повторения на следующем занятии.</li>
</ul>

<h2>7. Бумажный журнал + WhatsApp + Excel или Kursometr?</h2>
<p>Большинство студий начинают с бумажного журнала, групп в WhatsApp и таблицы Excel. Пока педагог один и групп немного, это работает, но с ростом числа педагогов, индивидуальных учеников и родителей разница становится заметной:</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>Бумажный журнал + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Группы и индивидуальные занятия</td><td>В тетради или Excel, обновляется вручную</td><td>Предметы, группы и недельное расписание</td></tr>
    <tr><td>Посещаемость</td><td>Бумажный журнал, который остаётся у педагога</td><td>Отметка на каждом занятии из браузера телефона</td></tr>
    <tr><td>Оплаты и долги</td><td>Excel, требует дисциплины</td><td>Учёт оплат учеников</td></tr>
    <tr><td>Ноты и материалы</td><td>Теряются в чате, их можно переслать</td><td>Видны только этой группе</td></tr>
    <tr><td>Домашние задания</td><td>Фото в чате, путаница, кто что прислал</td><td>Выдаются с файлами, ученик сдаёт из кабинета</td></tr>
    <tr><td>Тесты по теории</td><td>На бумаге, проверка вручную</td><td>Тесты с таймером, закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Помощники</td><td>Общий телефон или пароль</td><td>Отдельные аккаунты менторов</td></tr>
    <tr><td>Родители</td><td>Звонки и отдельные сообщения</td><td>Посещаемость, оценки и результаты тестов в кабинете родителя</td></tr>
  </tbody>
</table>
<p>Полностью отказываться от WhatsApp не нужно: он удобен для срочных объявлений, отмены занятия или новостей о концерте. Просто посещаемость, оплаты, материалы и результаты должны храниться в защищённом и упорядоченном месте.</p>
<h3>Как перейти</h3>
<p>Перевести всю студию за один день сложно. Проще всего начать с одного направления — например, с индивидуальных уроков фортепиано или детских танцевальных групп. Ведите их расписание, посещаемость и оплаты в новой системе, покажите родителям, как смотреть кабинет, а через неделю-две переведите остальные группы. Старый журнал сразу не выбрасывайте — сохраните его для сверки на первый месяц.</p>

<h2>8. Правила студии и чек-лист настройки</h2>
<h3>Пробное занятие</h3>
<p>Многие семьи, приходя в творческую студию, сначала просят пробное занятие. Не пускайте его на самотёк: выделите для пробных уроков отдельное время, пусть педагог отметит уровень и интересы ученика, а после урока объясните родителю, какая группа или индивидуальный формат подходит ребёнку. Когда ученик записывается, сразу добавьте его в нужную группу, чтобы посещаемость и оплата учитывались с первого дня.</p>
<h3>Правила пропусков</h3>
<p>Как говорилось выше, правила отработки, срок предупреждения об отмене и лимит отработок в месяц должны быть письменными и выдаваться родителям при записи. Когда правило одинаково для всех, ни педагог, ни администратор не тратят время на индивидуальные переговоры.</p>
<h3>Концерт, выставка или спектакль</h3>
<p>Отчётный концерт, выставка рисунков, танцевальное выступление, шахматный турнир или спектакль в конце сезона — самая сильная мотивация для учеников и наглядное доказательство прогресса для родителей. Объявите дату заранее, поделитесь с группой материалами по репертуару или работам для выставки, добавьте репетиции в расписание. Прежде чем публиковать фото и видео выступающих детей в соцсетях, получите согласие родителей.</p>
<h3>Чек-лист настройки</h3>
<ul>
  <li>☐ Созданы направления (предметы): инструменты, вокал, танцы, рисование, шахматы, театр</li>
  <li>☐ Группы сформированы по уровню или возрасту, индивидуальные ученики добавлены как отдельные группы</li>
  <li>☐ У каждой группы и каждого индивидуального ученика понятны недельное расписание и педагог</li>
  <li>☐ Для педагогов и помощников открыты отдельные аккаунты</li>
  <li>☐ Правила оплаты и пропусков записаны и выданы родителям</li>
  <li>☐ Ученики добавлены в группы, родители подключены к кабинету</li>
  <li>☐ Посещаемость отмечается на каждом занятии с телефона</li>
  <li>☐ Ноты и материалы публикуются на странице группы, а не в чате</li>
  <li>☐ Выдано первое домашнее задание, ученики знают, как сдать файл из кабинета</li>
  <li>☐ Объявлена дата концерта или выставки в конце сезона</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Зачем музыкальной, танцевальной или художественной студии программа для управления?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Чтобы вести группы, индивидуальные занятия, недельное расписание нескольких педагогов, посещаемость, оплату, материалы и домашние задания в одном месте. Без программы эта информация разбросана между бумажным журналом, группами WhatsApp и Excel.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как вести индивидуальные занятия, например фортепиано или вокал?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Создайте индивидуального ученика как отдельную группу и настройте для него недельное расписание. Тогда его посещаемость, материалы, задания и оплата не смешиваются с данными других учеников.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как отрабатывать пропущенные занятия?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Это правило студии: заранее письменно установите срок предупреждения об отмене, условия отработки и лимит на месяц. Отметка посещаемости на каждом занятии помогает применять правило без споров.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как ученик сдаёт домашнее задание?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В Kursometr педагог выдаёт задание с файлами, а ученик сдаёт работу файлом из своего кабинета — например, фото рисунка или короткую запись репетиции. Кто сдал, видно в одном списке.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что видят родители?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В кабинете родителя видны посещаемость, оценки и результаты тестов ребёнка. Родитель может следить, ходит ли ребёнок на занятия, не звоня педагогу.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли устанавливать мобильное приложение для работы с Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Kursometr работает в браузере телефона, войти можно через аккаунт Google. Педагог открывает свою страницу (vashe-imya.kursometr.com), регистрация бесплатна.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-detskogo-razvivayushchego-centra-2027">Программа для детского развивающего центра</a></li>
  <li><a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">Электронный учёт посещаемости</a></li>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">Система домашних заданий для учителя</a></li>
  <li><a href="/blog-details/programma-dlya-it-kursov-i-kursov-programmirovaniya-2027">Программа для IT-курсов и курсов программирования</a></li>
</ul>

<h2>Итог</h2>
<p>Успех музыкальной, танцевальной или художественной студии зависит не только от талантливых педагогов, но и от порядка, который видят ученики и родители. Группы по уровню и возрасту, отдельно учитываемые индивидуальные занятия, понятное недельное расписание, посещаемость на каждом занятии, письменные правила отработки, оплата в одном месте, ноты и материалы, видимые только группе, задания, которые сдаются из кабинета, и концерт или выставка в конце сезона надолго удерживают ученика в студии.</p>
<p><strong>Хотите перевести студию из бумажного журнала, WhatsApp и Excel в одну систему? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация педагога бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Если вашей студии нужна индивидуальная система под собственные правила работы: <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Статья носит общий информационный характер. Функции Kursometr описаны по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'musiqi-reqs-ve-resm-studiyasi-ucun-idareetme-proqrami-2027'],
            [
                'slug_en' => 'management-software-for-music-dance-and-art-studios-2027',
                'slug_ru' => 'programma-dlya-muzykalnoj-tanczevalnoj-i-hudozhestvennoj-studii-2027',

                'title_az' => 'Musiqi, Rəqs və Rəsm Studiyası üçün İdarəetmə Proqramı: Qruplar, Fərdi Dərslər, Davamiyyət və Ödənişlər (2027)',
                'title_en' => 'Management Software for Music, Dance and Art Studios: Groups, One-to-One Lessons, Attendance and Payments (2027)',
                'title_ru' => 'Программа для музыкальной, танцевальной и художественной студии: группы, индивидуальные занятия, посещаемость и оплата (2027)',

                'review_az' => 'Musiqi məktəbi, rəqs studiyası, rəsm studiyası, şahmat və teatr dərnəyi üçün: səviyyə və yaş üzrə qruplar, fərdi dərslər, bir neçə müəllim üzrə həftəlik cədvəl, davamiyyət və əvəzedici dərs qaydası, aylıq ödəniş və borclar, valideyn kabineti, yalnız qrupa görünən notlar və materiallar, ev tapşırığı, nəzəriyyə sınaqları, kağız jurnal + WhatsApp + Excel ilə Kursometr müqayisəsi və qurulum siyahısı.',
                'review_en' => 'For music schools, dance studios, art studios, chess and theatre clubs: groups by level and age, one-to-one lessons, a weekly schedule across several teachers, attendance and a make-up lesson policy, monthly fees and debts, a parent portal, group-only sheet music and materials, homework, theory quizzes, paper register + WhatsApp + Excel vs Kursometr and a setup checklist.',
                'review_ru' => 'Для музыкальных школ, танцевальных и художественных студий, шахматных и театральных кружков: группы по уровню и возрасту, индивидуальные занятия, недельное расписание нескольких педагогов, посещаемость и правила отработки, ежемесячная оплата и долги, кабинет родителя, ноты и материалы только для группы, домашние задания, тесты по теории, сравнение журнал + WhatsApp + Excel и Kursometr и чек-лист настройки.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '5 Noyabr 2026',
                'date_en' => 'November 5, 2026',
                'date_ru' => '5 Ноября 2026',

                'photo'    => 'cover-art-studio-az.png',
                'photo_en' => 'cover-art-studio-en.png',
                'photo_ru' => 'cover-art-studio-ru.png',

                'meta_title_az' => 'Musiqi, Rəqs və Rəsm Studiyası üçün Proqram 2027 | RS Code',
                'meta_title_en' => 'Music, Dance and Art Studio Management Software 2027 | RS Code',
                'meta_title_ru' => 'Программа для музыкальной и художественной студии 2027 | RS Code',

                'meta_description_az' => 'Musiqi, rəqs və rəsm studiyası üçün proqram: qruplar və fərdi dərslər, həftəlik cədvəl, davamiyyət, aylıq ödəniş və borclar, valideyn kabineti, notlar və tapşırıqlar.',
                'meta_description_en' => 'Software for music, dance and art studios: groups and one-to-one lessons, weekly schedule, attendance, monthly fees and debts, a parent portal, sheet music and homework.',
                'meta_description_ru' => 'Программа для музыкальной, танцевальной и художественной студии: группы и индивидуальные занятия, расписание, посещаемость, оплата и долги, кабинет родителя, ноты.',

                'meta_keywords_az' => 'musiqi məktəbi proqramı, rəqs studiyası idarəetmə, rəsm studiyası, incəsənət studiyası, fortepiano dərsi, vokal dərsi, şahmat dərnəyi, teatr studiyası, kursometr, 2027',
                'meta_keywords_en' => 'music school software, dance studio management, art studio software, piano lessons, vocal lessons, chess club, theatre club, studio scheduling, kursometr, 2027',
                'meta_keywords_ru' => 'программа для музыкальной школы, управление танцевальной студией, художественная студия, уроки фортепиано, вокал, шахматный кружок, театральная студия, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
