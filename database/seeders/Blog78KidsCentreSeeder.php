<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #78 — Uşaq inkişaf mərkəzi üçün idarəetmə proqramı (2027): erkən inkişaf, məktəbə hazırlıq, şahmat, robototexnika, rəsm, uşaqlar üçün ingilis dili.
 * Valideyn əsl müştəridir; yaş üzrə kiçik qruplar, həftəlik cədvəl, müəllim + köməkçi müəllim (mentor), aylıq ödəniş və borclar, böyük uşaqlar
 * üçün sadə sınaqlar, yalnız qrupa görünən materiallar, WhatsApp/dəftərdən keçid, müqayisə cədvəli, ilk ay yoxlama siyahısı, məxfilik.
 * Məxfilik hissəsi ümumi və praktikdir — konkret qanun maddəsinə istinad YOXDUR.
 * Kursometr faktları yalnız #75–#77 ilə eynidir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət, vaxtlı sınaqlar (təyin olunan saatda
 * açılıb-bağlanır, qapalı suallar avtomatik), PDF test toplusu → sual bazası, ev tapşırığı, ödəniş izləmə, valideyn kabineti (davamiyyət, qiymətlər,
 * sınaq nəticələri — ödəniş və materiallar valideyn kabinetində İDDİA EDİLMİR), mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar,
 * telefon brauzeri, Google ilə giriş, pulsuz müəllim qeydiyyatı.
 * SMS/push bildiriş, onlayn ödəniş, foto qalereya, uşağı götürmə/check-in, mobil tətbiq, qiymət və bazar statistikası İDDİA EDİLMİR. Çox filiallı / fərdi sistem → /elaqe.
 */
class Blog78KidsCentreSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Uşaq inkişaf mərkəzində dərsə uşaq gəlir, amma qərarı valideyn verir. Mərkəzi valideyn seçir, ödənişi valideyn edir, uşaq bir neçə dərs buraxanda narahat olan da, "bu ay nə öyrəndi?" deyə soruşan da valideyndir. Erkən inkişaf, məktəbə hazırlıq, şahmat, robototexnika, rəsm və ya uşaqlar üçün ingilis dili — istiqamət hansı olursa olsun, eyni mənzərə təkrarlanır: onlarla kiçik qrup, bir neçə müəllim və köməkçi, hər gün WhatsApp-da gələn suallar, dəftərdə qeyd olunan ödənişlər və ay sonunda "kimin borcu var?" axtarışı.</p>
<p>Bu yazı 2027-ci ildə uşaq inkişaf mərkəzini və ya uşaq kurslarını idarə edən sahibkarlar, metodistlər və müəllimlər üçündür. Valideynlə şəffaf işləmək, yaş qruplarını və həftəlik cədvəli qurmaq, müəllim və köməkçilərin işini bölmək, aylıq ödənişləri və borcları izləmək, böyük uşaqlar üçün sadə sınaqlar keçirmək, materialları yalnız qrupla bölüşmək və uşaqların məlumatlarını qorumaq barədə danışırıq. Sonda WhatsApp + dəftər, Excel və <a href="/mehsullar/kursometr">Kursometr</a> müqayisəsi və ilk ay üçün qurulum siyahısı var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Uşaq mərkəzinin əsas müştərisi kimdir?</td><td>Valideyn: o, davamiyyəti, irəliləyişi və tapşırıqları zəng etmədən görmək istəyir</td></tr>
    <tr><td>Qruplar necə qurulmalıdır?</td><td>Yaşa və istiqamətə görə kiçik qruplar, hər qrup üçün sabit həftəlik cədvəl</td></tr>
    <tr><td>Köməkçi müəllimlər necə işləməlidir?</td><td>Hər biri öz qrupları ilə, ayrıca hesabla — ümumi parol yox</td></tr>
    <tr><td>Ödənişlər necə izlənməlidir?</td><td>Bir yerdə: kim bu ay ödəyib, kimin borcu qalıb — dəftər və yaddaş əvəzinə</td></tr>
    <tr><td>Sınaq lazımdırmı?</td><td>Kiçik yaşda yox, amma məktəbə hazırlıq qruplarında qısa, sadə sınaqlar valideynə irəliləyişi göstərir</td></tr>
    <tr><td>WhatsApp qrupu kifayət deyilmi?</td><td>Elan üçün bəli, uşağın məlumatı, nəticəsi və materiallar üçün yox — hər şey qarışır və hamıya görünür</td></tr>
    <tr><td>Hansı sistem?</td><td>Qrup, cədvəl, davamiyyət, sınaq, ödəniş və valideyn kabineti bir yerdə — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Əsl Müştəri Valideyndir</h2>
<p>Böyüklər üçün kursda tələbə özü gəlir, özü ödəyir və öz irəliləyişini özü hiss edir. Uşaq mərkəzində isə üç tərəf var: uşaq, müəllim və valideyn. Uşaq dərsdən razı qalmalıdır, amma mərkəzdə qalıb-qalmamağına valideyn qərar verir. Valideyn isə dərsdə oturmur — mərkəz haqqında fikri onun gördüyü məlumatdan formalaşır.</p>
<p>Valideynlərin ən çox verdiyi suallar demək olar ki, hər mərkəzdə eynidir:</p>
<ul>
  <li>Uşağım bu həftə hansı dərslərdə olub, hansını buraxıb?</li>
  <li>Bu ay nə öyrəniblər, uşağım nə dərəcədə mənimsəyir?</li>
  <li>Evdə nə ilə məşğul olmalıyıq, tapşırıq varmı?</li>
  <li>Dərsdə keçilən material haradadır, xəstə olduğu gün nə buraxdı?</li>
  <li>Bu ayın ödənişi edilib, yoxsa borcumuz var?</li>
</ul>
<p>Bu sualların hər biri ayrıca zəng və ya mesaj deməkdir. Otuz-qırx ailəsi olan mərkəzdə bu, administratorun və müəllimlərin gününün böyük hissəsini aparır. Üstəlik cavab hər dəfə yaddaşdan və ya dəftərdən verilir, səhv olanda isə mübahisə yaranır. Həll yolu valideynə məlumatı soruşmadan görə biləcəyi bir yer verməkdir: davamiyyət, qiymətlər və sınaq nəticələri valideyn kabinetində olanda zənglərin çoxu öz-özünə azalır, valideynin etibarı isə artır. Valideynlə iş barədə ətraflı: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>2. Yaş Qrupları və Həftəlik Cədvəl</h2>
<p>Uşaq mərkəzinin cədvəli böyüklər kursundan daha mürəkkəbdir. Qruplar kiçikdir, yaş fərqi bir-iki il olanda belə uşaqların imkanları çox fərqlənir, dərslər isə məktəb saatlarına, uşaq bağçasına və valideynlərin iş qrafikinə uyğunlaşdırılmalıdır. Nəticədə bir istiqamət üzrə bir neçə paralel qrup yaranır və hər birinin öz günləri, saatı və müəllimi olur.</p>
<table>
  <thead>
    <tr><th>İstiqamət</th><th>Qrupların xüsusiyyəti</th><th>Valideyn nəyi görmək istəyir</th><th>Sistemdə nə lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Erkən inkişaf</td><td>Ən kiçik yaş, qısa dərslər, çox vaxt köməkçi müəllimlə</td><td>Uşağın dərsdə olması, müəllimin qısa qeydi</td><td>Davamiyyət, yaş üzrə qruplar</td></tr>
    <tr><td>Məktəbə hazırlıq</td><td>Hərf, rəqəm, oxu və məntiq; məktəbə qədər planlı proqram</td><td>Real irəliləyiş, hazırlıq səviyyəsi</td><td>Ev tapşırığı, sadə sınaqlar, nəticələr</td></tr>
    <tr><td>Şahmat</td><td>Səviyyəyə görə qruplar, praktika və tapşırıqlar</td><td>Səviyyə artımı, tapşırıqların icrası</td><td>Ev tapşırığı, sınaqlar, materiallar</td></tr>
    <tr><td>Robototexnika</td><td>Avadanlıq məhdud olduğu üçün kiçik qruplar, layihələr</td><td>Uşağın nə qurduğu, hansı mövzuları keçdiyi</td><td>Cədvəl, yalnız qrupa görünən materiallar</td></tr>
    <tr><td>Rəsm və yaradıcılıq</td><td>Müxtəlif yaşlar, sərbəst format</td><td>Davamiyyət, mövzular</td><td>Davamiyyət, ödəniş izləmə</td></tr>
    <tr><td>Uşaqlar üçün ingilis dili</td><td>Yaş və səviyyə üzrə qruplar, söz və danışıq</td><td>Yeni sözlər, tapşırıqlar, irəliləyiş</td><td>Ev tapşırığı, materiallar, sınaqlar</td></tr>
  </tbody>
</table>
<p>Praktik qayda: hər qrupun adı yaş, istiqamət və vaxtı göstərsin (məsələn, "Məktəbə hazırlıq — 5–6 yaş — B.e./Çər. 17:00"). Belə ad həm müəllimə, həm administratora, həm də valideynə dərhal aydın olur. Cədvəli bir dəfə həftəlik qurun ki, hər dərsin tarixi əvvəlcədən bəlli olsun — davamiyyət də, buraxılan dərsin əvəzi də buna əsaslanır. Bir uşaq iki-üç istiqamətə gedirsə (məsələn, şahmat və ingilis dili), onu hər qrupa ayrıca əlavə edin ki, hər müəllim yalnız öz dərsinin məlumatını görsün.</p>

<h2>3. Müəllimlər və Köməkçi Müəllimlər</h2>
<p>Uşaq mərkəzində bir qrupla çox vaxt iki nəfər işləyir: əsas müəllim və köməkçi (assistent). Kiçik yaşlarda köməkçi uşaqları yerləşdirir, materialları paylayır, diqqəti dağılan uşaqla məşğul olur. Bundan əlavə, bir müəllim həftə ərzində bir neçə qrupa dərs deyir, bəzi müəllimlər yarımştat və ya yalnız həftəsonu işləyir.</p>
<p>Bu vəziyyətdə ən çox rast gəlinən problemlər bunlardır: davamiyyəti kimin qeyd etdiyi bəlli olmur, köməkçi əsas müəllimin telefonundan və ya ümumi paroldan istifadə edir, müəllim dəyişəndə qrupun tarixçəsi itir. Düzgün yanaşma hər işçiyə ayrıca hesab verməkdir. <a href="/mehsullar/kursometr">Kursometr</a>-də bunun üçün mentor (köməkçi müəllim) hesabları var: köməkçi öz hesabı ilə daxil olur və qrupla işləyir, əsas müəllimin parolunu bilməyə ehtiyac qalmır.</p>
<p>Müəllim komandası üçün bir neçə qayda yazılı olsun: davamiyyət dərsin özündə qeyd olunur (ay sonunda yox), uşaq haqqında qeydlər neytral və qısa yazılır, valideynlə ünsiyyət mərkəzin rəsmi kanalı ilə aparılır, şəxsi telefonla uşaqların şəkli çəkilib paylaşılmır. Müəllim işdən ayrılanda isə hesabı bağlanır, qrupun bütün məlumatı mərkəzdə qalır.</p>

<h2>4. Aylıq Ödənişlər və Borclar</h2>
<p>Uşaq mərkəzlərinin çoxu aylıq ödənişlə işləyir, bəziləri isə dərs paketi və ya bir neçə istiqamət üçün ümumi məbləğ tətbiq edir. Problem ödəniş modelində deyil, onun izlənməsindədir. Dəftərdə, telefonun qeydlərində və administratorun yaddaşında aparılan ödənişlər ay sonunda bir neçə tipik çətinlik yaradır: kimin ödədiyi dəqiq bilinmir, iki uşağı olan ailənin ödənişi qarışır, bir ay buraxılmış borc növbəti aya keçib unudulur, valideynə xatırlatma etmək isə xoşagəlməz söhbətə çevrilir.</p>
<p>Sadə qayda budur: hər uşağın ödənişi bir yerdə qeyd olunsun və istənilən an "bu ay kim ödəyib, kim ödəməyib" sualına bir baxışla cavab vermək mümkün olsun. Kursometr-də tələbə ödənişləri izlənir, beləliklə borcu olanlar dəftər vərəqləmədən görünür. Valideynə xatırlatmanı isə özünüz, mərkəzin adından və nəzakətlə edirsiniz — dəqiq rəqəmə əsaslanan xatırlatma mübahisə yaratmır.</p>
<p>Ödəniş qaydalarını valideynlə əvvəlcədən yazılı razılaşdırın: ödəniş tarixi, uşaq xəstə olanda buraxılan dərslər necə hesablanır, bayram və tətil ayları, qardaş-bacı endirimi, mərkəzdən çıxanda nə baş verir. Qaydalar aydın olanda borc söhbəti də qısa olur. Qiymət və endirim modelləri barədə ətraflı: <a href="/blog-details/repetitor-ders-haqqi-nece-teyin-olunur-2027">repetitor dərs haqqını necə müəyyənləşdirsin</a>.</p>

<h2>5. Böyük Uşaqlar üçün Sadə Sınaqlar</h2>
<p>Üç-dörd yaşlı uşaqdan test tələb etmək mənasızdır — orada irəliləyişi müəllimin müşahidəsi göstərir. Amma məktəbə hazırlıq, ibtidai sinif uşaqları üçün ingilis dili və ya şahmat qruplarında qısa sınaqlar faydalıdır: uşaq yarışma kimi qəbul edir, müəllim kimin geridə qaldığını görür, valideyn isə "uşağım nə öyrəndi?" sualına rəqəmlə cavab alır.</p>
<p>Uşaq sınağı böyüklər testindən fərqli qurulmalıdır:</p>
<ul>
  <li><strong>Qısa olsun</strong> — bir neçə sual, bir mövzu üzrə.</li>
  <li><strong>Qapalı suallar</strong> — variant seçmək uşaq üçün asandır, yoxlama isə avtomatik olur.</li>
  <li><strong>Dərs vaxtında</strong> — müəllimin və ya köməkçinin yanında, ev təzyiqi olmadan.</li>
  <li><strong>Nəticə cəza üçün yox</strong> — hansı mövzunu təkrar etmək lazım olduğunu göstərmək üçündür.</li>
</ul>
<p>Kursometr-də vaxtlı sınaqlar təyin etdiyiniz saatda açılır və bağlanır, qapalı suallar avtomatik yoxlanır, nəticə isə valideyn kabinetində görünür. Hazır PDF test toplusu varsa, onu sual bazasına əlavə edib sınaqları ondan qurmaq olar. Sınaq necə hazırlanır: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>. Dərslər arasında isə ev tapşırığı verə və icrasını izləyə bilərsiniz — məktəbə hazırlıq qruplarında bu, valideynin evdə uşaqla nə ilə məşğul olacağını bilməsinə kömək edir.</p>

<h2>6. Materiallar, Dərs Yazıları və Uşaqların Məxfiliyi</h2>
<p>Uşaq xəstələnir, ailə səfərə gedir, dərs buraxılır. Valideyn "nə keçdiniz, evdə təkrar edək" deyə soruşur. Material WhatsApp qrupuna atılanda bir neçə gündən sonra yüzlərlə mesajın arasında itir, yeni gələn valideyn isə köhnə materialı heç görmür. Kursometr-də dərs yazıları və materiallar yalnız həmin qrupa görünür: başqa qrupun uşaqları və kənar şəxslər onlara baxa bilmir, material isə qrupun səhifəsində qalır.</p>
<h3>Uşaqların foto və məlumatları: praktik qaydalar</h3>
<p>Uşaq mərkəzlərində ən çox edilən səhv uşaqların şəkillərini, adlarını, qiymətlərini və hətta valideyn nömrələrini onlarla ailənin olduğu böyük çat qruplarına göndərməkdir. Belə qrupda hər kəs bir-birinin uşağının şəklini və nəticəsini görür, mesajlar ekran görüntüsü ilə istənilən yerə gedə bilər, qrupdan çıxan ailə isə köhnə məlumatı telefonunda saxlayır. Bu yazı hüquqi məsləhət deyil, amma bir neçə sadə qayda riski xeyli azaldır:</p>
<ul>
  <li>Uşaqların şəkil və videolarını böyük çat qruplarına göndərməyin; sosial şəbəkədə paylaşmaq üçün valideynin yazılı razılığını alın.</li>
  <li>Bir uşağın qiyməti, sınaq nəticəsi və ya davranışı barədə yalnız onun valideyni ilə danışın — ümumi qrupda yox.</li>
  <li>Valideynlərin telefon nömrələrini hamıya açıq qrupda toplamayın; elan üçün yalnız mərkəzin yaza bildiyi kanal daha təhlükəsizdir.</li>
  <li>Uşağın sağlamlıq, allergiya və ailə vəziyyəti kimi həssas məlumatlarını yalnız ehtiyacı olan işçi bilsin.</li>
  <li>Müəllim işdən ayrılanda onun girişi bağlansın; materiallar və qeydlər şəxsi telefonlarda deyil, mərkəzin sistemində qalsın.</li>
  <li>Valideynlə müqavilədə şəxsi məlumatların necə istifadə olunduğunu və şəkil çəkilməsinə razılığı ayrıca qeyd edin; tələbləri hüquqşünasla dəqiqləşdirin.</li>
</ul>

<h2>7. WhatsApp + Dəftər, Excel, yoxsa Kursometr?</h2>
<p>Əksər uşaq mərkəzləri WhatsApp qrupları və dəftərlə başlayır, böyüdükcə Excel cədvəlinə keçir. Hər üsulun öz yeri var, amma qruplar və ailələr çoxaldıqca fərq aydın görünür:</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>WhatsApp + dəftər</th><th>Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Qruplar və həftəlik cədvəl</td><td>Dəftərdə və ya yaddaşda</td><td>Cədvəldə, əl ilə yenilənir</td><td>Fənlər, qruplar və həftəlik cədvəl</td></tr>
    <tr><td>Davamiyyət</td><td>Kağız jurnal, itə bilər</td><td>Əl ilə doldurulur, çox vaxt gecikir</td><td>Hər dərsdə telefon brauzerindən qeyd</td></tr>
    <tr><td>Valideyn nəyi görür</td><td>Yalnız qrupa yazılanı</td><td>Heç nə, faylı göndərməsəniz</td><td>Valideyn kabinetində davamiyyət, qiymətlər və sınaq nəticələri</td></tr>
    <tr><td>Ödənişlər və borclar</td><td>Dəftərdə, qarışıq</td><td>Mümkündür, amma intizam tələb edir</td><td>Tələbə ödənişlərinin izlənməsi</td></tr>
    <tr><td>Sınaqlar</td><td>Kağız üzərində, əl ilə yoxlama</td><td>Nəticələr əl ilə yazılır</td><td>Vaxtlı sınaqlar, qapalı suallar avtomatik yoxlanır</td></tr>
    <tr><td>Materiallar</td><td>Çatda itir, hamıya görünür</td><td>Uyğun deyil</td><td>Yalnız həmin qrupa görünür</td></tr>
    <tr><td>Köməkçi müəllimlər</td><td>Şəxsi telefonlar</td><td>Ortaq fayl, kim nəyi dəyişdi bəlli deyil</td><td>Ayrıca mentor hesabları</td></tr>
    <tr><td>Məxfilik</td><td>Zəif: hər şey böyük qrupda</td><td>Fayl kopyalanıb göndərilə bilər</td><td>Hər kəs yalnız özünə aid olanı görür</td></tr>
  </tbody>
</table>
<p>WhatsApp-dan tam imtina etmək lazım deyil: təcili elan, dərsin ləğvi və ya bayram təbriki üçün rahatdır. Sadəcə uşağın məlumatı, nəticəsi, materialları və ödənişləri ayrıca, qorunan yerdə saxlanmalıdır. Daha geniş müqayisə: <a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr</a>.</p>
<h3>Keçidi necə etməli</h3>
<p>Keçidi tədris ilinin ortasında hamı üçün birdən etmək çətindir. Daha rahat yol bir-iki qrupla başlamaqdır: bu qrupların cədvəlini, davamiyyətini və ödənişlərini yeni sistemdə aparın, valideynlərə kabinetə necə baxacaqlarını göstərin, bir-iki həftədən sonra qalan qrupları da köçürün. Köhnə dəftəri dərhal atmayın — ilk ay ərzində müqayisə üçün saxlayın. Valideynlərə isə qısa mesajla izah edin ki, davamiyyət və nəticələri artıq zəng etmədən görə biləcəklər.</p>

<h2>8. İlk Ay üçün Qurulum Siyahısı</h2>
<h3>1-ci həftə: struktur</h3>
<ul>
  <li>☐ Bütün istiqamətlər (fənlər) və yaş qrupları siyahıya alınıb, qrup adları yaş + istiqamət + vaxt formatındadır</li>
  <li>☐ Hər qrupun həftəlik cədvəli qurulub</li>
  <li>☐ Müəllimlər və köməkçilər üçün ayrıca hesablar açılıb, kim hansı qrupa baxır bəllidir</li>
  <li>☐ Ödəniş qaydaları (tarix, buraxılan dərs, endirim, tətil ayları) yazılı formadadır</li>
</ul>
<h3>2-ci həftə: uşaqlar və valideynlər</h3>
<ul>
  <li>☐ Uşaqlar qruplara əlavə olunub, bir neçə istiqamətə gedənlər hər qrupdadır</li>
  <li>☐ Valideynlər kabinetə qoşulub, ona telefondan necə baxacaqları göstərilib</li>
  <li>☐ Şəkil çəkilməsi və şəxsi məlumatlarla bağlı valideyn razılığı alınıb</li>
  <li>☐ Mövcud ödənişlər və borclar sistemə köçürülüb</li>
</ul>
<h3>3-cü həftə: gündəlik nizam</h3>
<ul>
  <li>☐ Davamiyyət hər dərsdə, dərsin özündə qeyd olunur</li>
  <li>☐ Dərs materialları və yazılar qrupların səhifəsinə yüklənir, çata yox</li>
  <li>☐ Məktəbə hazırlıq və böyük yaş qruplarında ev tapşırığı verilməyə başlanıb</li>
</ul>
<h3>4-cü həftə: nəticə və təhlil</h3>
<ul>
  <li>☐ Böyük uşaqlar üçün ilk qısa sınaq keçirilib, nəticələr valideyn kabinetində görünür</li>
  <li>☐ Ay sonu ödənişləri yoxlanılıb, borcu olan ailələrə nəzakətlə xatırladılıb</li>
  <li>☐ Müəllim və valideynlərdən rəy alınıb, WhatsApp qrupu yalnız elanlar üçün saxlanılıb</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Uşaq inkişaf mərkəzi üçün idarəetmə proqramı nə üçün lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Çox sayda kiçik qrupu, həftəlik cədvəli, davamiyyəti, aylıq ödənişləri və valideynlərlə ünsiyyəti bir yerdə aparmaq üçün. Proqram olmadan bu məlumat dəftər, Excel və WhatsApp qrupları arasında bölünür, valideyn isə hər sual üçün zəng etməli olur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Valideyn Kursometr-də nəyi görə bilir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Valideyn kabinetində uşağın davamiyyəti, qiymətləri və sınaq nəticələri görünür. Beləliklə valideyn uşağın dərsdə olub-olmadığını və irəliləyişini müəllimə zəng etmədən izləyə bilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Köməkçi müəllimlər üçün ayrıca hesab açmaq olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Kursometr-də mentor (köməkçi müəllim) hesabları var: köməkçi öz hesabı ilə daxil olub qrupla işləyir, əsas müəllimin parolundan istifadə etməyə ehtiyac qalmır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kiçik uşaqlar üçün test keçirmək lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ən kiçik yaşlarda irəliləyişi müəllimin müşahidəsi göstərir. Məktəbə hazırlıq, şahmat və ya uşaqlar üçün ingilis dili qruplarında isə qısa, qapalı suallı sınaqlar faydalıdır: müəllim kimin geridə qaldığını görür, valideyn isə nəticəni kabinetdə izləyir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Uşaqların şəkillərini WhatsApp qrupunda paylaşmaq düzgündürmü?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Böyük çat qruplarında uşaqların şəkillərini, qiymətlərini və şəxsi məlumatlarını paylaşmaq tövsiyə olunmur: onları hamı görür və istənilən yerə ötürülə bilər. Şəkil üçün valideynin razılığını alın, uşağın nəticəsini isə yalnız onun valideyni ilə bölüşün. Hüquqi tələbləri hüquqşünasla dəqiqləşdirin.</p>
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
  <li><a href="/blog-details/kurs-merkezi-nece-acilir-2027">Kurs mərkəzi necə açılır: addım-addım bələdçi</a></li>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">Elektron davamiyyət uçotu</a></li>
  <li><a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">Dil kursu üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr: müqayisə</a></li>
</ul>

<h2>Nəticə</h2>
<p>Uşaq inkişaf mərkəzinin uğuru yalnız maraqlı dərslərdən deyil, valideynin gördüyü nizamdan da asılıdır. Yaş və istiqamət üzrə kiçik qruplar, sabit həftəlik cədvəl, hər dərsdə qeyd olunan davamiyyət, ayrıca hesabı olan köməkçilər, bir yerdə izlənən ödənişlər, böyük uşaqlar üçün qısa sınaqlar və yalnız qrupa görünən materiallar valideynə "uşağım burada yaxşı əllərdədir" hissini verir. Uşaqların şəkil və məlumatlarını böyük çat qruplarından uzaq tutmaq isə bu etibarın ayrılmaz hissəsidir.</p>
<p><strong>Uşaq mərkəzinizi WhatsApp və dəftərdən bir sistemə köçürmək istəyirsiniz? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong> — müəllim qeydiyyatı pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Bir neçə filial və ya mərkəzinizin öz iş qaydalarına uyğun fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır və hüquqi məsləhət deyil. Uşaqların şəxsi məlumatları və şəkilləri ilə bağlı tələbləri hüquqşünasla dəqiqləşdirin. Kursometr funksiyaları noyabr 2026 vəziyyətinə görə təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>At a children's development centre, the child comes to the lesson, but the parent makes the decision. Parents choose the centre, parents pay, and parents are the ones who worry when the child misses a few lessons and ask "what did they learn this month?". Early development, school preparation, chess, robotics, art or English for kids — whatever the direction, the picture is the same: dozens of small groups, several teachers and assistants, questions arriving on WhatsApp every day, payments written in a notebook and an end-of-month hunt for "who still owes?".</p>
<p>This article is for owners, methodologists and teachers who run a children's development centre or kids' courses in 2027. We cover working transparently with parents, setting up age groups and a weekly timetable, dividing work between teachers and assistants, tracking monthly payments and debts, running simple quizzes for older children, sharing materials only with the group and protecting children's data. At the end there is a comparison of WhatsApp + notebook, Excel and <a href="/mehsullar/kursometr">Kursometr</a>, and a setup checklist for the first month.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Who is the main customer of a kids' centre?</td><td>The parent: they want to see attendance, progress and assignments without calling</td></tr>
    <tr><td>How should groups be set up?</td><td>Small groups by age and direction, with a fixed weekly timetable for each group</td></tr>
    <tr><td>How should assistant teachers work?</td><td>Each with their own groups and their own account — no shared password</td></tr>
    <tr><td>How should payments be tracked?</td><td>In one place: who has paid this month and who still owes — instead of a notebook and memory</td></tr>
    <tr><td>Are quizzes needed?</td><td>Not for the youngest, but in school-prep groups short, simple quizzes show parents real progress</td></tr>
    <tr><td>Isn't a WhatsApp group enough?</td><td>For announcements, yes; for a child's data, results and materials, no — everything gets mixed up and is visible to everyone</td></tr>
    <tr><td>Which system?</td><td>Groups, timetable, attendance, quizzes, payments and a parent portal in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. The Real Customer Is the Parent</h2>
<p>In an adult course, the student comes on their own, pays on their own and feels their own progress. A kids' centre has three parties: the child, the teacher and the parent. The child has to enjoy the lesson, but the parent decides whether the child stays. And the parent does not sit in the lesson — their opinion of the centre is shaped by the information they see.</p>
<p>The questions parents ask most often are almost the same in every centre:</p>
<ul>
  <li>Which lessons did my child attend this week, and which were missed?</li>
  <li>What have they learned this month, and how well is my child keeping up?</li>
  <li>What should we work on at home — is there an assignment?</li>
  <li>Where is the lesson material, and what was missed on the day my child was ill?</li>
  <li>Has this month's payment been made, or do we owe something?</li>
</ul>
<p>Each of these questions means a separate call or message. In a centre with thirty or forty families, this takes up a large part of the administrator's and teachers' day. On top of that, every answer comes from memory or a notebook, and when it is wrong, a dispute follows. The solution is to give parents a place where they can see the information without asking: when attendance, grades and test results are in a parent portal, most calls disappear on their own and parents' trust grows. More on working with parents: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>2. Age Groups and the Weekly Timetable</h2>
<p>A kids' centre's timetable is more complex than an adult course's. Groups are small, children's abilities differ a lot even with an age gap of one or two years, and lessons have to fit around school hours, kindergarten and parents' working hours. As a result, one direction ends up with several parallel groups, each with its own days, time and teacher.</p>
<table>
  <thead>
    <tr><th>Direction</th><th>What the groups are like</th><th>What parents want to see</th><th>What the system needs</th></tr>
  </thead>
  <tbody>
    <tr><td>Early development</td><td>The youngest ages, short lessons, often with an assistant teacher</td><td>That the child was at the lesson, a short note from the teacher</td><td>Attendance, groups by age</td></tr>
    <tr><td>School preparation</td><td>Letters, numbers, reading and logic; a planned programme up to school</td><td>Real progress, readiness level</td><td>Homework, simple quizzes, results</td></tr>
    <tr><td>Chess</td><td>Groups by level, practice and puzzles</td><td>Level growth, puzzles completed</td><td>Homework, quizzes, materials</td></tr>
    <tr><td>Robotics</td><td>Small groups because equipment is limited, projects</td><td>What the child built, which topics were covered</td><td>Timetable, group-only materials</td></tr>
    <tr><td>Art and creativity</td><td>Mixed ages, a free format</td><td>Attendance, topics</td><td>Attendance, payment tracking</td></tr>
    <tr><td>English for kids</td><td>Groups by age and level, vocabulary and speaking</td><td>New words, assignments, progress</td><td>Homework, materials, quizzes</td></tr>
  </tbody>
</table>
<p>A practical rule: let each group's name show the age, direction and time (for example, "School prep — ages 5–6 — Mon/Wed 17:00"). A name like this is instantly clear to the teacher, the administrator and the parent. Set up the timetable once, weekly, so that the date of every lesson is known in advance — attendance and make-up lessons both depend on it. If a child attends two or three directions (say, chess and English), add them to each group separately so that each teacher sees only the data for their own lessons.</p>

<h2>3. Teachers and Assistant Teachers</h2>
<p>In a kids' centre, two people often work with one group: the lead teacher and an assistant. With younger children, the assistant seats the children, hands out materials and looks after the child whose attention wanders. On top of that, one teacher may teach several groups during the week, and some teachers work part-time or only at weekends.</p>
<p>The most common problems in this situation are: it is unclear who marked attendance, the assistant uses the lead teacher's phone or a shared password, and when a teacher changes, the group's history is lost. The right approach is to give every staff member their own account. <a href="/mehsullar/kursometr">Kursometr</a> has mentor (assistant teacher) accounts for this: the assistant signs in with their own account and works with the group, with no need to know the lead teacher's password.</p>
<p>Put a few rules for the teaching team in writing: attendance is marked during the lesson itself (not at the end of the month), notes about a child are short and neutral, communication with parents goes through the centre's official channel, and children are not photographed and shared from personal phones. When a teacher leaves, their account is closed and all of the group's data stays with the centre.</p>

<h2>4. Monthly Payments and Debts</h2>
<p>Most kids' centres work with monthly payments; some use lesson packages or a combined amount for several directions. The problem is not the payment model but how it is tracked. Payments kept in a notebook, in phone notes and in the administrator's memory create a few typical difficulties at the end of the month: it is not clear exactly who has paid, payments for a family with two children get mixed up, a missed month's debt rolls over and is forgotten, and reminding a parent turns into an awkward conversation.</p>
<p>The simple rule: record every child's payment in one place, so that at any moment you can answer "who has paid this month and who hasn't" at a glance. Kursometr tracks student payments, so those with outstanding debts are visible without leafing through a notebook. You send the reminder to the parent yourself, politely and in the centre's name — a reminder based on an exact figure does not lead to an argument.</p>
<p>Agree payment rules with parents in writing in advance: the payment date, how lessons missed through illness are counted, holiday months, sibling discounts and what happens when a child leaves. When the rules are clear, conversations about debts are short. More on pricing and discount models: <a href="/blog-details/how-tutors-should-set-lesson-prices-2027">how tutors should set lesson prices</a>.</p>

<h2>5. Simple Quizzes for Older Children</h2>
<p>Asking a three- or four-year-old to take a test makes no sense — at that age, progress is shown by the teacher's observation. But in school preparation, English for primary-school children or chess groups, short quizzes are useful: children treat them like a game, the teacher sees who is falling behind, and parents get a number in answer to "what has my child learned?".</p>
<p>A quiz for children should be built differently from an adult test:</p>
<ul>
  <li><strong>Keep it short</strong> — a few questions on one topic.</li>
  <li><strong>Closed questions</strong> — choosing an option is easy for a child, and grading is automatic.</li>
  <li><strong>During the lesson</strong> — with the teacher or assistant present, without pressure at home.</li>
  <li><strong>Results are not a punishment</strong> — they show which topic needs repeating.</li>
</ul>
<p>In Kursometr, timed tests open and close at the time you set, closed questions are graded automatically, and the result appears in the parent portal. If you have a ready-made PDF test collection, you can import it into the question bank and build quizzes from it. How to prepare a test: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>. Between lessons you can set homework and track whether it is done — in school-prep groups this helps parents know what to work on with their child at home.</p>

<h2>6. Materials, Lesson Recordings and Children's Privacy</h2>
<p>A child gets ill, the family goes away, a lesson is missed. The parent asks, "what did you cover, so we can go over it at home?". When material is posted to a WhatsApp group, a few days later it is lost among hundreds of messages, and a newly joined parent never sees older material at all. In Kursometr, lesson recordings and materials are visible only to that group: children from other groups and outsiders cannot see them, and the material stays on the group's page.</p>
<h3>Children's photos and data: practical rules</h3>
<p>The most common mistake in kids' centres is sending children's photos, names, grades and even parents' phone numbers into large chat groups with dozens of families. In such a group everyone sees everyone else's child's photo and results, messages can travel anywhere as screenshots, and a family that leaves the group keeps the old information on their phone. This article is not legal advice, but a few simple rules reduce the risk considerably:</p>
<ul>
  <li>Do not send children's photos and videos to large chat groups; get the parent's written consent before sharing on social media.</li>
  <li>Discuss a child's grades, quiz results or behaviour only with that child's parents — not in the shared group.</li>
  <li>Do not collect parents' phone numbers in a group open to everyone; for announcements, a channel where only the centre can post is safer.</li>
  <li>Sensitive information such as a child's health, allergies and family situation should be known only to the staff who need it.</li>
  <li>When a teacher leaves, close their access; materials and notes should stay in the centre's system, not on personal phones.</li>
  <li>In the contract with parents, state separately how personal data is used and whether they consent to photos; confirm the requirements with a lawyer.</li>
</ul>

<h2>7. WhatsApp + Notebook, Excel or Kursometr?</h2>
<p>Most kids' centres start with WhatsApp groups and a notebook and move to an Excel spreadsheet as they grow. Each approach has its place, but as groups and families multiply, the difference becomes clear:</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>WhatsApp + notebook</th><th>Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Groups and weekly timetable</td><td>In a notebook or in memory</td><td>In a spreadsheet, updated by hand</td><td>Subjects, groups and a weekly timetable</td></tr>
    <tr><td>Attendance</td><td>Paper register, can get lost</td><td>Filled in by hand, often late</td><td>Marked at every lesson from a phone browser</td></tr>
    <tr><td>What parents see</td><td>Only what is posted to the group</td><td>Nothing, unless you send the file</td><td>Attendance, grades and test results in the parent portal</td></tr>
    <tr><td>Payments and debts</td><td>In a notebook, mixed up</td><td>Possible, but takes discipline</td><td>Student payment tracking</td></tr>
    <tr><td>Quizzes</td><td>On paper, graded by hand</td><td>Results typed in by hand</td><td>Timed tests, closed questions graded automatically</td></tr>
    <tr><td>Materials</td><td>Lost in the chat, visible to everyone</td><td>Not suitable</td><td>Visible only to that group</td></tr>
    <tr><td>Assistant teachers</td><td>Personal phones</td><td>A shared file; unclear who changed what</td><td>Separate mentor accounts</td></tr>
    <tr><td>Privacy</td><td>Weak: everything is in a big group</td><td>The file can be copied and forwarded</td><td>Everyone sees only what concerns them</td></tr>
  </tbody>
</table>
<p>There is no need to drop WhatsApp completely: it is handy for urgent announcements, cancelled lessons or holiday greetings. A child's data, results, materials and payments simply need to be kept separately, in a protected place. A wider comparison: <a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr</a>.</p>
<h3>How to make the switch</h3>
<p>Switching everyone at once in the middle of the school year is hard. An easier way is to start with one or two groups: run their timetable, attendance and payments in the new system, show the parents how to use the portal, and after a week or two move the remaining groups. Do not throw away the old notebook straight away — keep it for comparison during the first month. And explain to parents in a short message that they can now see attendance and results without calling.</p>

<h2>8. A Setup Checklist for the First Month</h2>
<h3>Week 1: structure</h3>
<ul>
  <li>☐ All directions (subjects) and age groups are listed, and group names follow the age + direction + time format</li>
  <li>☐ Each group's weekly timetable is set up</li>
  <li>☐ Separate accounts are opened for teachers and assistants, and it is clear who looks after which group</li>
  <li>☐ Payment rules (date, missed lessons, discounts, holiday months) are in writing</li>
</ul>
<h3>Week 2: children and parents</h3>
<ul>
  <li>☐ Children are added to groups; those attending several directions are in each group</li>
  <li>☐ Parents are connected to the portal and shown how to check it from their phone</li>
  <li>☐ Parental consent for photos and personal data has been obtained</li>
  <li>☐ Existing payments and debts have been moved into the system</li>
</ul>
<h3>Week 3: daily routine</h3>
<ul>
  <li>☐ Attendance is marked at every lesson, during the lesson itself</li>
  <li>☐ Lesson materials and recordings are uploaded to the group pages, not to the chat</li>
  <li>☐ Homework has started in school-prep and older age groups</li>
</ul>
<h3>Week 4: results and review</h3>
<ul>
  <li>☐ The first short quiz for older children is held, and results are visible in the parent portal</li>
  <li>☐ End-of-month payments are checked, and families with debts get a polite reminder</li>
  <li>☐ Feedback is collected from teachers and parents, and the WhatsApp group is kept for announcements only</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Why does a children's development centre need management software?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">To keep many small groups, the weekly timetable, attendance, monthly payments and communication with parents in one place. Without software this information is split between a notebook, Excel and WhatsApp groups, and parents have to call with every question.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What can parents see in Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The parent portal shows the child's attendance, grades and test results. This way parents can follow whether the child was at the lesson and how they are progressing without calling the teacher.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can assistant teachers have their own accounts?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Kursometr has mentor (assistant teacher) accounts: the assistant signs in with their own account and works with the group, with no need to use the lead teacher's password.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do young children need tests?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">At the youngest ages, progress is shown by the teacher's observation. In school preparation, chess or English-for-kids groups, short quizzes with closed questions are useful: the teacher sees who is falling behind, and parents follow the results in the portal.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is it OK to share children's photos in a WhatsApp group?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sharing children's photos, grades and personal data in large chat groups is not recommended: everyone can see them and they can be forwarded anywhere. Get parental consent for photos and share a child's results only with that child's parents. Confirm the legal requirements with a lawyer.</p>
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
  <li><a href="/blog-details/how-to-open-a-course-centre-2027">How to open a course centre: a step-by-step guide</a></li>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/attendance-tracking-for-course-centres-2027">Electronic attendance tracking</a></li>
  <li><a href="/blog-details/language-course-management-software-2027">Language course management software</a></li>
  <li><a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr: comparison</a></li>
</ul>

<h2>Conclusion</h2>
<p>A children's development centre succeeds not only through engaging lessons but also through the order parents can see. Small groups by age and direction, a fixed weekly timetable, attendance marked at every lesson, assistants with their own accounts, payments tracked in one place, short quizzes for older children and materials visible only to the group give parents the feeling that "my child is in good hands here". Keeping children's photos and data out of large chat groups is an essential part of that trust.</p>
<p><strong>Want to move your kids' centre from WhatsApp and a notebook into one system? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher registration is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. If you need a custom system for several branches or for your centre's own workflows: <a href="/contact">get in touch</a>.</p>
<p><small><em>This article is general information and not legal advice. Confirm the requirements for children's personal data and photos with a lawyer. Kursometr features are described as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>В детский развивающий центр на занятия приходит ребёнок, но решение принимает родитель. Центр выбирает родитель, платит родитель, и именно родитель волнуется, когда ребёнок пропускает несколько занятий, и спрашивает: «Что он выучил в этом месяце?» Раннее развитие, подготовка к школе, шахматы, робототехника, рисование или английский для детей — какое бы ни было направление, картина повторяется: десятки маленьких групп, несколько педагогов и помощников, ежедневные вопросы в WhatsApp, оплаты, записанные в тетради, и поиск в конце месяца: «А кто ещё не заплатил?»</p>
<p>Эта статья — для владельцев, методистов и педагогов, которые в 2027 году управляют детским развивающим центром или детскими курсами. Разбираем, как прозрачно работать с родителями, выстроить возрастные группы и недельное расписание, распределить работу между педагогами и помощниками, вести учёт ежемесячных оплат и долгов, проводить простые тесты для старших детей, делиться материалами только с группой и защищать данные детей. В конце — сравнение WhatsApp + тетрадь, Excel и <a href="/mehsullar/kursometr">Kursometr</a> и чек-лист настройки на первый месяц.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Кто главный клиент детского центра?</td><td>Родитель: он хочет видеть посещаемость, прогресс и задания без звонков</td></tr>
    <tr><td>Как формировать группы?</td><td>Маленькие группы по возрасту и направлению, у каждой — постоянное недельное расписание</td></tr>
    <tr><td>Как должны работать помощники педагога?</td><td>Каждый со своими группами и в своём аккаунте — без общего пароля</td></tr>
    <tr><td>Как учитывать оплаты?</td><td>В одном месте: кто оплатил в этом месяце, у кого остался долг — вместо тетради и памяти</td></tr>
    <tr><td>Нужны ли тесты?</td><td>Малышам — нет, но в группах подготовки к школе короткие простые тесты показывают родителям реальный прогресс</td></tr>
    <tr><td>Разве группы в WhatsApp недостаточно?</td><td>Для объявлений — да, для данных ребёнка, результатов и материалов — нет: всё смешивается и видно всем</td></tr>
    <tr><td>Какая система?</td><td>Группы, расписание, посещаемость, тесты, оплаты и кабинет родителя в одном месте — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Настоящий клиент — родитель</h2>
<p>На взрослых курсах ученик приходит сам, сам платит и сам ощущает свой прогресс. В детском центре сторон три: ребёнок, педагог и родитель. Ребёнку должно нравиться на занятиях, но останется ли он в центре, решает родитель. А родитель на занятии не сидит — его мнение о центре складывается из той информации, которую он видит.</p>
<p>Вопросы, которые родители задают чаще всего, почти одинаковы во всех центрах:</p>
<ul>
  <li>На каких занятиях мой ребёнок был на этой неделе, а какие пропустил?</li>
  <li>Что прошли в этом месяце и насколько хорошо ребёнок усваивает?</li>
  <li>Чем заниматься дома, есть ли задание?</li>
  <li>Где материал занятия, что ребёнок пропустил, когда болел?</li>
  <li>Оплата за этот месяц внесена или у нас долг?</li>
</ul>
<p>Каждый такой вопрос — это отдельный звонок или сообщение. В центре, где тридцать-сорок семей, на это уходит большая часть дня администратора и педагогов. К тому же каждый раз ответ даётся по памяти или по тетради, а если он неверный — возникает спор. Решение — дать родителю место, где он видит информацию, не спрашивая: когда посещаемость, оценки и результаты тестов есть в кабинете родителя, большинство звонков исчезает само собой, а доверие родителя растёт. Подробнее о работе с родителями: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>2. Возрастные группы и недельное расписание</h2>
<p>Расписание детского центра сложнее, чем у взрослых курсов. Группы маленькие, возможности детей сильно различаются даже при разнице в год-два, а занятия нужно подстраивать под школьные часы, детский сад и рабочий график родителей. В итоге по одному направлению появляется несколько параллельных групп, и у каждой свои дни, время и педагог.</p>
<table>
  <thead>
    <tr><th>Направление</th><th>Особенности групп</th><th>Что хочет видеть родитель</th><th>Что нужно в системе</th></tr>
  </thead>
  <tbody>
    <tr><td>Раннее развитие</td><td>Самый младший возраст, короткие занятия, часто с помощником педагога</td><td>Был ли ребёнок на занятии, короткая заметка педагога</td><td>Посещаемость, группы по возрасту</td></tr>
    <tr><td>Подготовка к школе</td><td>Буквы, цифры, чтение и логика; плановая программа до школы</td><td>Реальный прогресс, уровень готовности</td><td>Домашние задания, простые тесты, результаты</td></tr>
    <tr><td>Шахматы</td><td>Группы по уровню, практика и задачи</td><td>Рост уровня, выполнение задач</td><td>Домашние задания, тесты, материалы</td></tr>
    <tr><td>Робототехника</td><td>Маленькие группы из-за ограниченного оборудования, проекты</td><td>Что ребёнок собрал, какие темы прошли</td><td>Расписание, материалы только для группы</td></tr>
    <tr><td>Рисование и творчество</td><td>Разный возраст, свободный формат</td><td>Посещаемость, темы</td><td>Посещаемость, учёт оплат</td></tr>
    <tr><td>Английский для детей</td><td>Группы по возрасту и уровню, слова и разговор</td><td>Новые слова, задания, прогресс</td><td>Домашние задания, материалы, тесты</td></tr>
  </tbody>
</table>
<p>Практическое правило: пусть название каждой группы показывает возраст, направление и время (например, «Подготовка к школе — 5–6 лет — Пн/Ср 17:00»). Такое название сразу понятно и педагогу, и администратору, и родителю. Настройте расписание один раз, понедельно, чтобы дата каждого занятия была известна заранее, — на этом строятся и посещаемость, и отработка пропущенных занятий. Если ребёнок ходит на два-три направления (например, шахматы и английский), добавьте его в каждую группу отдельно, чтобы каждый педагог видел данные только своих занятий.</p>

<h2>3. Педагоги и помощники педагога</h2>
<p>В детском центре с одной группой часто работают двое: ведущий педагог и помощник (ассистент). С малышами помощник рассаживает детей, раздаёт материалы, занимается ребёнком, у которого рассеивается внимание. Кроме того, один педагог за неделю ведёт несколько групп, а некоторые работают неполный день или только по выходным.</p>
<p>Самые частые проблемы в такой ситуации: непонятно, кто отметил посещаемость, помощник пользуется телефоном ведущего педагога или общим паролем, а при смене педагога история группы теряется. Правильный подход — у каждого сотрудника свой аккаунт. В <a href="/mehsullar/kursometr">Kursometr</a> для этого есть аккаунты ментора (помощника педагога): помощник входит под своим аккаунтом и работает с группой, знать пароль ведущего педагога не нужно.</p>
<p>Запишите для команды педагогов несколько правил: посещаемость отмечается прямо на занятии (а не в конце месяца), заметки о ребёнке пишутся коротко и нейтрально, общение с родителями идёт через официальный канал центра, детей не фотографируют и не рассылают снимки с личных телефонов. Когда педагог уходит, его аккаунт закрывается, а все данные группы остаются в центре.</p>

<h2>4. Ежемесячная оплата и долги</h2>
<p>Большинство детских центров работают с ежемесячной оплатой, некоторые — с пакетами занятий или общей суммой за несколько направлений. Проблема не в модели оплаты, а в её учёте. Оплаты, которые ведутся в тетради, в заметках телефона и в памяти администратора, в конце месяца создают типичные трудности: неясно, кто точно оплатил, оплаты семьи с двумя детьми путаются, долг за пропущенный месяц переходит на следующий и забывается, а напоминание родителю превращается в неприятный разговор.</p>
<p>Простое правило: оплата каждого ребёнка фиксируется в одном месте, чтобы в любой момент одним взглядом ответить на вопрос «кто в этом месяце оплатил, а кто нет». В Kursometr ведётся учёт оплат учеников, поэтому должники видны без листания тетради. Напоминание родителю вы отправляете сами, вежливо и от имени центра, — напоминание с точной цифрой не вызывает спора.</p>
<p>Заранее письменно согласуйте с родителями правила оплаты: дата платежа, как учитываются занятия, пропущенные по болезни, праздничные и каникулярные месяцы, скидка для братьев и сестёр, что происходит при уходе из центра. Когда правила понятны, разговор о долге получается коротким. Подробнее о моделях цен и скидок: <a href="/blog-details/kak-repetitoru-ustanovit-cenu-za-urok-2027">как репетитору установить цену за урок</a>.</p>

<h2>5. Простые тесты для старших детей</h2>
<p>Требовать тест от трёх-четырёхлетнего ребёнка бессмысленно — в этом возрасте прогресс показывает наблюдение педагога. Но в группах подготовки к школе, английского для младших школьников или шахмат короткие тесты полезны: ребёнок воспринимает их как соревнование, педагог видит, кто отстаёт, а родитель получает ответ в цифрах на вопрос «что мой ребёнок выучил?».</p>
<p>Детский тест нужно строить иначе, чем взрослый:</p>
<ul>
  <li><strong>Коротко</strong> — несколько вопросов по одной теме.</li>
  <li><strong>Закрытые вопросы</strong> — выбрать вариант ребёнку легко, а проверка проходит автоматически.</li>
  <li><strong>Во время занятия</strong> — рядом с педагогом или помощником, без домашнего давления.</li>
  <li><strong>Результат — не наказание</strong> — он показывает, какую тему нужно повторить.</li>
</ul>
<p>В Kursometr тесты с таймером открываются и закрываются в заданное вами время, закрытые вопросы проверяются автоматически, а результат виден в кабинете родителя. Если у вас есть готовый сборник тестов в PDF, его можно добавить в банк вопросов и собирать тесты из него. Как подготовить тест: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>. Между занятиями можно задавать домашние задания и отслеживать их выполнение — в группах подготовки к школе это помогает родителю понимать, чем заниматься с ребёнком дома.</p>

<h2>6. Материалы, записи занятий и конфиденциальность детей</h2>
<p>Ребёнок заболел, семья уехала, занятие пропущено. Родитель спрашивает: «Что прошли? Повторим дома». Материал, отправленный в группу WhatsApp, через несколько дней теряется среди сотен сообщений, а новый родитель старых материалов вообще не видит. В Kursometr записи занятий и материалы видны только этой группе: дети из других групп и посторонние их не видят, а материал остаётся на странице группы.</p>
<h3>Фото и данные детей: практические правила</h3>
<p>Самая частая ошибка детских центров — отправлять фотографии детей, имена, оценки и даже телефоны родителей в большие чаты, где состоят десятки семей. В таком чате каждый видит фото и результаты чужого ребёнка, сообщения в виде скриншотов могут уйти куда угодно, а семья, покинувшая чат, сохраняет старую информацию в телефоне. Эта статья не является юридической консультацией, но несколько простых правил заметно снижают риск:</p>
<ul>
  <li>Не отправляйте фото и видео детей в большие чаты; для публикации в соцсетях получите письменное согласие родителя.</li>
  <li>Оценки, результаты тестов и поведение ребёнка обсуждайте только с его родителями — не в общем чате.</li>
  <li>Не собирайте телефоны родителей в открытой для всех группе; для объявлений безопаснее канал, куда пишет только центр.</li>
  <li>Чувствительные сведения — здоровье, аллергии, семейная ситуация ребёнка — должны знать только те сотрудники, которым это нужно.</li>
  <li>Когда педагог уходит, закрывайте его доступ; материалы и заметки должны оставаться в системе центра, а не в личных телефонах.</li>
  <li>В договоре с родителями отдельно укажите, как используются персональные данные и согласны ли они на фотосъёмку; требования уточните у юриста.</li>
</ul>

<h2>7. WhatsApp + тетрадь, Excel или Kursometr?</h2>
<p>Большинство детских центров начинают с групп в WhatsApp и тетради, а по мере роста переходят на таблицу Excel. У каждого способа своё место, но когда групп и семей становится больше, разница очевидна:</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>WhatsApp + тетрадь</th><th>Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Группы и недельное расписание</td><td>В тетради или в памяти</td><td>В таблице, обновляется вручную</td><td>Предметы, группы и недельное расписание</td></tr>
    <tr><td>Посещаемость</td><td>Бумажный журнал, может потеряться</td><td>Заполняется вручную, часто с опозданием</td><td>Отметка на каждом занятии из браузера телефона</td></tr>
    <tr><td>Что видит родитель</td><td>Только то, что написали в группу</td><td>Ничего, если не отправить файл</td><td>Посещаемость, оценки и результаты тестов в кабинете родителя</td></tr>
    <tr><td>Оплаты и долги</td><td>В тетради, вперемешку</td><td>Возможно, но требует дисциплины</td><td>Учёт оплат учеников</td></tr>
    <tr><td>Тесты</td><td>На бумаге, проверка вручную</td><td>Результаты вносятся вручную</td><td>Тесты с таймером, закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Материалы</td><td>Теряются в чате, видны всем</td><td>Не подходит</td><td>Видны только этой группе</td></tr>
    <tr><td>Помощники педагога</td><td>Личные телефоны</td><td>Общий файл, непонятно, кто что изменил</td><td>Отдельные аккаунты ментора</td></tr>
    <tr><td>Конфиденциальность</td><td>Слабая: всё в большом чате</td><td>Файл можно скопировать и переслать</td><td>Каждый видит только то, что касается его</td></tr>
  </tbody>
</table>
<p>Полностью отказываться от WhatsApp не нужно: он удобен для срочных объявлений, отмены занятия или поздравлений с праздником. Просто данные ребёнка, результаты, материалы и оплаты должны храниться отдельно, в защищённом месте. Более широкое сравнение: <a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr</a>.</p>
<h3>Как перейти</h3>
<p>Перевести всех сразу посреди учебного года сложно. Проще начать с одной-двух групп: ведите их расписание, посещаемость и оплаты в новой системе, покажите родителям, как пользоваться кабинетом, а через неделю-две переведите остальные группы. Старую тетрадь сразу не выбрасывайте — сохраните её для сверки на первый месяц. А родителям коротким сообщением объясните, что теперь посещаемость и результаты можно видеть без звонков.</p>

<h2>8. Чек-лист настройки на первый месяц</h2>
<h3>1-я неделя: структура</h3>
<ul>
  <li>☐ Все направления (предметы) и возрастные группы составлены списком, названия групп — в формате возраст + направление + время</li>
  <li>☐ Недельное расписание каждой группы настроено</li>
  <li>☐ Для педагогов и помощников открыты отдельные аккаунты, понятно, кто за какую группу отвечает</li>
  <li>☐ Правила оплаты (дата, пропуски, скидки, каникулярные месяцы) оформлены письменно</li>
</ul>
<h3>2-я неделя: дети и родители</h3>
<ul>
  <li>☐ Дети добавлены в группы, те, кто ходит на несколько направлений, — в каждую группу</li>
  <li>☐ Родители подключены к кабинету, им показано, как смотреть его с телефона</li>
  <li>☐ Получено согласие родителей на фотосъёмку и обработку персональных данных</li>
  <li>☐ Текущие оплаты и долги перенесены в систему</li>
</ul>
<h3>3-я неделя: ежедневный порядок</h3>
<ul>
  <li>☐ Посещаемость отмечается на каждом занятии, прямо во время занятия</li>
  <li>☐ Материалы и записи занятий загружаются на страницы групп, а не в чат</li>
  <li>☐ В группах подготовки к школе и старшего возраста начаты домашние задания</li>
</ul>
<h3>4-я неделя: итоги и анализ</h3>
<ul>
  <li>☐ Проведён первый короткий тест для старших детей, результаты видны в кабинете родителя</li>
  <li>☐ Оплаты за месяц проверены, семьям с долгом вежливо напомнили</li>
  <li>☐ Собраны отзывы педагогов и родителей, группа WhatsApp оставлена только для объявлений</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Зачем детскому развивающему центру программа управления?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Чтобы вести множество маленьких групп, недельное расписание, посещаемость, ежемесячные оплаты и общение с родителями в одном месте. Без программы эта информация разбросана между тетрадью, Excel и группами в WhatsApp, а родителю приходится звонить по каждому вопросу.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что родитель видит в Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В кабинете родителя видны посещаемость ребёнка, его оценки и результаты тестов. Так родитель может следить, был ли ребёнок на занятии и как он продвигается, не звоня педагогу.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли открыть отдельные аккаунты для помощников педагога?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. В Kursometr есть аккаунты ментора (помощника педагога): помощник входит под своим аккаунтом и работает с группой, пользоваться паролем ведущего педагога не нужно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужны ли тесты маленьким детям?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В самом младшем возрасте прогресс показывает наблюдение педагога. А в группах подготовки к школе, шахмат или английского для детей полезны короткие тесты с закрытыми вопросами: педагог видит, кто отстаёт, а родитель следит за результатами в кабинете.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли выкладывать фото детей в группу WhatsApp?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Выкладывать фото, оценки и персональные данные детей в большие чаты не рекомендуется: их видят все, и их можно переслать куда угодно. На фото получайте согласие родителя, а результаты ребёнка обсуждайте только с его родителями. Юридические требования уточните у юриста.</p>
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
  <li><a href="/blog-details/kak-otkryt-uchebnyj-centr-2027">Как открыть учебный центр: пошаговое руководство</a></li>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">Электронный учёт посещаемости</a></li>
  <li><a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">Программа для языковых курсов</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr: сравнение</a></li>
</ul>

<h2>Итог</h2>
<p>Успех детского развивающего центра зависит не только от интересных занятий, но и от порядка, который видит родитель. Маленькие группы по возрасту и направлению, постоянное недельное расписание, посещаемость на каждом занятии, помощники со своими аккаунтами, оплаты в одном месте, короткие тесты для старших детей и материалы, видимые только группе, дают родителю ощущение: «мой ребёнок здесь в надёжных руках». А держать фото и данные детей подальше от больших чатов — неотъемлемая часть этого доверия.</p>
<p><strong>Хотите перевести детский центр из WhatsApp и тетради в одну систему? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация педагога бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Если нужна индивидуальная система для нескольких филиалов или под собственные правила работы центра: <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Статья носит общий информационный характер и не является юридической консультацией. Требования к персональным данным и фотографиям детей уточняйте у юриста. Функции Kursometr описаны по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'usaq-inkisaf-merkezi-ucun-idareetme-proqrami-2027'],
            [
                'slug_en' => 'management-software-for-kids-development-centres-2027',
                'slug_ru' => 'programma-dlya-detskogo-razvivayushchego-centra-2027',

                'title_az' => 'Uşaq İnkişaf Mərkəzi üçün İdarəetmə Proqramı: Valideyn Kabineti, Yaş Qrupları, Ödənişlər və Məxfilik (2027)',
                'title_en' => 'Management Software for Kids\' Development Centres: Parent Portal, Age Groups, Payments and Privacy (2027)',
                'title_ru' => 'Программа для детского развивающего центра: кабинет родителя, возрастные группы, оплаты и конфиденциальность (2027)',

                'review_az' => 'Erkən inkişaf, məktəbə hazırlıq, şahmat, robototexnika, rəsm və uşaqlar üçün ingilis dili mərkəzləri üçün: valideynin davamiyyəti və nəticələri zəng etmədən görməsi, yaş qrupları və həftəlik cədvəl, köməkçi müəllim hesabları, aylıq ödəniş və borclar, sadə sınaqlar, yalnız qrupa görünən materiallar, uşaqların məxfiliyi, WhatsApp + dəftər, Excel və Kursometr müqayisəsi və ilk ay siyahısı.',
                'review_en' => 'For early development, school prep, chess, robotics, art and English-for-kids centres: parents seeing attendance and results without calling, age groups and a weekly timetable, assistant teacher accounts, monthly payments and debts, simple quizzes, group-only materials, children\'s privacy, WhatsApp + notebook vs Excel vs Kursometr and a first-month checklist.',
                'review_ru' => 'Для центров раннего развития, подготовки к школе, шахмат, робототехники, рисования и английского для детей: родители видят посещаемость и результаты без звонков, возрастные группы и недельное расписание, аккаунты помощников, ежемесячная оплата и долги, простые тесты, материалы только для группы, конфиденциальность детей, сравнение WhatsApp + тетрадь, Excel и Kursometr и чек-лист на первый месяц.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '5 Noyabr 2026',
                'date_en' => 'November 5, 2026',
                'date_ru' => '5 Ноября 2026',

                'photo'    => 'cover-kids-centre-az.png',
                'photo_en' => 'cover-kids-centre-en.png',
                'photo_ru' => 'cover-kids-centre-ru.png',

                'meta_title_az' => 'Uşaq İnkişaf Mərkəzi üçün İdarəetmə Proqramı 2027 | RS Code',
                'meta_title_en' => 'Kids\' Development Centre Management Software 2027 | RS Code',
                'meta_title_ru' => 'Программа для детского развивающего центра 2027 | RS Code',

                'meta_description_az' => 'Uşaq inkişaf mərkəzi üçün proqram: valideyn kabineti, yaş qrupları və cədvəl, köməkçi müəllimlər, aylıq ödəniş və borclar, sınaqlar, materiallar və məxfilik.',
                'meta_description_en' => 'Software for kids\' development centres: a parent portal, age groups and timetable, assistant teachers, monthly payments and debts, quizzes, materials and privacy.',
                'meta_description_ru' => 'Программа для детского центра: кабинет родителя, возрастные группы и расписание, помощники педагога, ежемесячная оплата и долги, тесты, материалы и приватность.',

                'meta_keywords_az' => 'uşaq inkişaf mərkəzi proqramı, uşaq mərkəzi idarəetmə, erkən inkişaf mərkəzi, məktəbə hazırlıq, uşaq kursları, valideyn kabineti, uşaq şahmat, robototexnika kursu, kursometr, 2027',
                'meta_keywords_en' => 'kids development centre software, children\'s centre management, early development centre, school readiness, kids courses, parent portal, chess for kids, robotics classes, kursometr, 2027',
                'meta_keywords_ru' => 'программа для детского центра, управление детским развивающим центром, центр раннего развития, подготовка к школе, детские курсы, кабинет родителя, шахматы для детей, робототехника, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
