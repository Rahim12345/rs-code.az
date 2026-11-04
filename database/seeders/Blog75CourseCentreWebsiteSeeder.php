<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #75 — Kurs mərkəzi üçün sayt və Google-da görünmək: kurs səhifələri, yerli SEO, qeydiyyat forması (2027).
 * Qiymət/müddət #17 və #64 ilə uyğundur: landing 300–700, vizit kartı 500–1 200, korporativ 1 200–3 500, fərdi 5 000+ AZN (təxmini).
 * Kurs səhifələri olan tipik kurs mərkəzi saytı korporativ aralığa düşür, 3–5 həftə.
 * Axtarış sorğuları yalnız nümunədir — həcm/rəqəm verilmir.
 * Kursometr faktları yalnız #70 ilə eynidir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət, vaxtlı sınaqlar,
 * qapalı suallar avtomatik yoxlanır, PDF test toplusu sual bazasına, ev tapşırığı, ödəniş izləmə, valideyn kabineti,
 * mentor hesabı, qrupa görünən dərs yazıları/materiallar, telefon brauzeri, Google ilə giriş, pulsuz qeydiyyat.
 * Kursometr-də açıq kurs kataloqu, sayt konstruktoru, SEO, onlayn ödəniş, SMS İDDİA EDİLMİR. Çox filiallı mərkəz üçün fərdi sistem → /elaqe.
 */
class Blog75CourseCentreWebsiteSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Valideyn övladı üçün ingilis dili kursu axtaranda və ya abituriyent hazırlıq mərkəzi seçəndə əvvəlcə dostlarından soruşur, sonra telefonu götürüb Google-a yazır. Axtarış nəticəsində və xəritədə gördüyü bir neçə kurs mərkəzinin saytına baxır, Instagram səhifəsini açır və ən aydın məlumat verənə yazır. Kursunuz yaxşı ola bilər, müəllimləriniz güclü ola bilər — amma Google-da görünmürsünüzsə və ya sayt "hansı kurs, neçəyə, harada, nə vaxt" suallarına cavab vermirsə, bu valideyn rəqibinizə gedir.</p>
<p>Bu yazı imtahana hazırlıq, xarici dil, IT kursları və uşaq inkişaf mərkəzlərinin sahibləri üçündür. 2027-ci il üçün kurs mərkəzi saytında hansı səhifələrin olmalı olduğunu, yerli SEO-nu, qeydiyyat formasından müraciətin izlənməsinə qədər prosesi, saytla <a href="/mehsullar/kursometr">Kursometr</a> kimi idarəetmə platformasının fərqini, qiymət və müddəti izah edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Hansı səhifələr lazımdır?</td><td>Hər kurs üçün ayrıca səhifə, müəllimlər, nəticələr, filiallar və xəritə, qeydiyyat / sınaq dərsi forması, WhatsApp, FAQ, bloq; lazım olduqda AZ/EN/RU</td></tr>
    <tr><td>Google-da necə görünmək olar?</td><td>Hər filial üçün Google Business Profile, saytda və xəritədə eyni ad/ünvan/telefon, rəylər, kurs + rayon üzrə səhifələr, EducationalOrganization, Course, FAQPage, BreadcrumbList schema</td></tr>
    <tr><td>Qiymət</td><td>Kurs səhifələri olan sayt adətən korporativ aralığa düşür: təxminən 1 200 – 3 500 AZN (bazar təxmini)</td></tr>
    <tr><td>Müddət</td><td>Adətən 3–5 həftə; kurs məlumatlarının, müəllim fotolarının və mətnlərin hazır olması ən çox təsir edən amildir</td></tr>
    <tr><td>Sayt və platforma</td><td>Sayt tələbə cəlb edir; qeydiyyatdan sonra qruplar, cədvəl, davamiyyət, sınaqlar, ödəniş və valideyn kabineti <a href="/mehsullar/kursometr">Kursometr</a> kimi platformada aparılır</td></tr>
  </tbody>
</table>

<h2>Valideyn və Tələbə Kursu Necə Axtarır?</h2>
<p>Kurs axtarışı demək olar ki, həmişə <strong>konkret</strong> və <strong>yerli</strong> olur. İnsan "yaxşı kurs" yox, öz ehtiyacını və yaxın yeri yazır. Nümunələr:</p>
<ul>
  <li><strong>Fənn + şəhər:</strong> "ingilis dili kursu Bakı", "IT kursları Bakı", "rus dili kursu böyüklər üçün";</li>
  <li><strong>Hazırlıq + rayon:</strong> "abituriyent hazırlığı Nərimanov", "buraxılış imtahanına hazırlıq Yasamal", "magistratura hazırlığı Xətai";</li>
  <li><strong>Yaş qrupu:</strong> "uşaqlar üçün riyaziyyat kursu", "məktəbəqədər hazırlıq", "uşaqlar üçün proqramlaşdırma";</li>
  <li><strong>"Yaxınlıqda" sorğuları:</strong> "ingilis dili kursu yaxınlıqda" — burada Google xəritəsi və Google Business Profile həlledicidir;</li>
  <li><strong>Sual formasında:</strong> "IELTS-ə neçə aya hazırlaşmaq olar", "uşaq neçə yaşından proqramlaşdırma öyrənə bilər" — bu sorğular bloq yazıları ilə tutulur.</li>
</ul>
<p>Bu sorğuların hər biri ayrı niyyətdir və bir ümumi "Kurslarımız" səhifəsi onların hamısına cavab verə bilmir. Ona görə kurs mərkəzi saytının strukturu axtarışa uyğun qurulmalıdır: hər kurs, hər yaş qrupu və hər filial üçün öz səhifəsi.</p>

<h2>Kurs Mərkəzi Saytında Hansı Səhifələr Olmalıdır?</h2>
<table>
  <thead>
    <tr><th>Səhifə</th><th>Nə olmalıdır</th><th>Niyə vacibdir</th></tr>
  </thead>
  <tbody>
    <tr><td>Ana səhifə</td><td>Əsas istiqamətlər, filiallar, "Sınaq dərsinə yazıl" düyməsi, telefon və WhatsApp</td><td>Valideyn bir neçə saniyədə qərar verir</td></tr>
    <tr><td>Kurs səhifələri</td><td>Hər kurs üçün ayrıca səhifə: proqram, müddət, cədvəl, qiymət və ya "qiymət üçün əlaqə saxlayın", səviyyə, müəllim</td><td>Google-da "ingilis dili kursu", "IT kursu" kimi sorğularla tapılmaq</td></tr>
    <tr><td>Müəllimlər</td><td>Foto, təhsil, təcrübə, hansı kursları keçir</td><td>Valideyn çox vaxt müəllimə görə seçir</td></tr>
    <tr><td>Nəticələr</td><td>Tələbə nəticələri, sertifikatlar, uğur hekayələri — yalnız icazə ilə</td><td>Etibar siqnalı</td></tr>
    <tr><td>Filiallar</td><td>Hər filial üçün ünvan, Google xəritəsi, metro/dayanacaq, iş saatları, telefon</td><td>"Yaxınlıqda" axtarışları və yerli SEO</td></tr>
    <tr><td>Qeydiyyat / sınaq dərsi</td><td>Qısa forma: ad, telefon, kurs, filial, uyğun vaxt</td><td>Saytın əsas məqsədi — müraciət</td></tr>
    <tr><td>WhatsApp</td><td>Hazır mesaj mətni ilə düymə</td><td>Bir çox valideyn zəng etməkdənsə yazmağı üstün tutur</td></tr>
    <tr><td>FAQ</td><td>Qiymət, ödəniş qaydası, qrup ölçüsü, buraxılmış dərs, sınaq dərsi</td><td>Telefonda təkrarlanan sualları azaldır, Google üçün faydalıdır</td></tr>
    <tr><td>Bloq</td><td>Valideyn və tələbə suallarına cavab verən yazılar</td><td>Sual formasında axtarışları tutmaq</td></tr>
  </tbody>
</table>

<h2>Kurs Səhifəsi: Saytın Ən Vacib Hissəsi</h2>
<p>Kurs mərkəzi saytında satan səhifə ana səhifə deyil, kurs səhifəsidir. Google "ingilis dili kursu Bakı" sorğusuna ən uyğun səhifəni göstərir — və bu, məhz həmin kursa həsr olunmuş səhifədir. Yaxşı kurs səhifəsində bunlar olur:</p>
<ol>
  <li><strong>Kimə uyğundur</strong> — yaş, səviyyə, məqsəd ("9–11-ci sinif şagirdləri", "A2 səviyyəsindən B1-ə", "sıfırdan başlayanlar");</li>
  <li><strong>Proqram</strong> — mövzular modul və ya ay üzrə, sonda nə bacaracaq;</li>
  <li><strong>Müddət və cədvəl</strong> — neçə ay, həftədə neçə dəfə, dərs neçə dəqiqə, səhər/axşam/həftəsonu qrupları;</li>
  <li><strong>Format</strong> — əyani, onlayn və ya qarışıq; qrupda neçə nəfər;</li>
  <li><strong>Qiymət</strong> — aylıq məbləğ, "...-dan başlayan" aralıq və ya "qiymət üçün əlaqə saxlayın". Qiymət göstərmək mümkündürsə, göstərin — valideynin ilk sualı demək olar ki, həmişə budur;</li>
  <li><strong>Müəllim</strong> — kursu keçən müəllimin qısa profili və foto;</li>
  <li><strong>Səviyyə testi və sınaq dərsi</strong> — necə yazılmaq olar;</li>
  <li><strong>FAQ</strong> — bu kursa aid 4–6 sual;</li>
  <li><strong>Qeydiyyat düyməsi</strong> — səhifənin yuxarısında və sonunda.</li>
</ol>
<p>Uşaq inkişaf mərkəzləri üçün yaş qrupları üzrə səhifə, IT kursları üçün isə hər istiqamət (proqramlaşdırma, dizayn, data və s.) üzrə səhifə daha yaxşı işləyir. Dil kursları üçün səviyyələr və imtahan hazırlığı ayrıca səhifə ola bilər. Dil kursunun daxili idarəsi barədə: <a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">dil kursu üçün idarəetmə proqramı</a>.</p>

<h2>Müəllimlər və Nəticələr: Etibarın Əsası</h2>
<p>"Təcrübəli müəllim heyəti" ifadəsi heç nə demir. Valideyn konkret insanı görmək istəyir: real foto, təhsil, neçə ildir dərs deyir, hansı kursları aparır. Müəllim səhifəsi həm də müəllimi adı ilə axtaranları sayta gətirir.</p>
<p>Nəticələr bölməsi ikinci güclü etibar siqnalıdır: sertifikat alanlar, imtahan nəticələri, uğur hekayələri, valideyn rəyləri. Burada vacib qayda var: <strong>tələbənin adını, fotosunu və nəticəsini yalnız onun (azyaşlıdırsa, valideyninin) icazəsi ilə dərc edin</strong>. İcazə yoxdursa, ad əvəzinə baş hərflər və ya ümumiləşdirilmiş nəticə göstərin. Şişirdilmiş vədlərdən ("100% qəbul zəmanəti") çəkinin — yoxlanıla bilən faktlar daha inandırıcıdır.</p>

<h2>Filiallar, Google Business Profile və Yerli SEO</h2>
<p>"İngilis dili kursu yaxınlıqda" sorğusunda ilk görünən çox vaxt sayt deyil, Google xəritəsindəki kartdır. Bu kartı <strong>Google Business Profile</strong> idarə edir. Kurs mərkəzi üçün əsas qaydalar:</p>
<ul>
  <li><strong>Hər filial üçün ayrıca profil</strong> — öz ünvanı, telefonu, iş saatları və fotoları ilə;</li>
  <li><strong>Eyni ad, ünvan və telefon</strong> — saytda, Google-da, Instagram-da və kataloqlarda eyni yazılış. Fərqli variantlar Google-u çaşdırır;</li>
  <li><strong>Düzgün kateqoriya</strong> — "Dil kursu", "Təhsil mərkəzi", "Kompüter kursu" və s.;</li>
  <li><strong>Saytda hər filial üçün səhifə</strong> — xəritə, necə gəlmək olar, həmin filialda keçirilən kurslar;</li>
  <li><strong>Rəylər və real fotolar</strong> — kursu bitirən tələbə və valideyndən rəy istəyin, hər rəyə — mənfiyə də — nəzakətli cavab verin;</li>
</ul>
<p>Addım-addım təlimat: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır</a>.</p>
<p><strong>Schema işarələməsi</strong> Google-a saytın məzmununu izah edir. Kurs mərkəzi üçün əsasları:</p>
<table>
  <thead>
    <tr><th>Schema</th><th>Harada</th><th>Nə izah edir</th></tr>
  </thead>
  <tbody>
    <tr><td>EducationalOrganization</td><td>Ana səhifə, filial səhifələri</td><td>Təşkilatın adı, ünvanı, əlaqə məlumatı, loqosu</td></tr>
    <tr><td>Course</td><td>Hər kurs səhifəsi</td><td>Kursun adı, təsviri, təşkil edən mərkəz</td></tr>
    <tr><td>FAQPage</td><td>FAQ bölmələri</td><td>Sual-cavablar</td></tr>
    <tr><td>BreadcrumbList</td><td>Daxili səhifələr</td><td>Saytın strukturu (Ana səhifə › Kurslar › İngilis dili)</td></tr>
  </tbody>
</table>
<p>Schema nəticəni zəmanət etmir, amma Google-un və AI cavablarının səhifəni düzgün anlamasına kömək edir. Peşəkar dəstək lazımdırsa: <a href="/seo-xidmeti">SEO xidməti</a>.</p>

<h2>Qeydiyyat Formasından Tələbəyə: Müraciəti İtirməyin</h2>
<p>Sayt müraciət gətirir, amma müraciət hələ tələbə deyil. Kurs mərkəzləri müraciətlərin bir hissəsini saytda yox, ondan sonra itirir: forma e-poçta düşür, heç kim baxmır, valideyn iki gün sonra başqa kursa yazılır. Sadə proses:</p>
<ol>
  <li><strong>Qısa forma</strong> — ad, telefon, kurs, filial, uyğun vaxt. Hər əlavə xana müraciəti azaldır;</li>
  <li><strong>Sürətli cavab</strong> — iş saatlarında mümkün qədər tez zəng və ya WhatsApp mesajı. Valideyn adətən bir neçə kursa eyni anda yazır və ilk cavab verən üstünlük qazanır;</li>
  <li><strong>Mənbəni qeyd edin</strong> — müraciət Google axtarışından, xəritədən, Instagram-dan, yoxsa reklamdan gəlib? Formaya gizli UTM sahələri və ya "Bizi haradan tapdınız?" sualı əlavə edin;</li>
  <li><strong>Status</strong> — yeni, zəng edildi, sınaq dərsinə yazıldı, qeydiyyatdan keçdi, imtina etdi. Sadə cədvəl də kifayətdir, əsas odur ki, hər müraciətin statusu olsun;</li>
  <li><strong>Sınaq dərsi və ya səviyyə testi</strong> — sonra qrupa yerləşdirmə.</li>
</ol>
<p>Bir neçə ay sonra hansı kanalın real tələbə gətirdiyini görürsünüz və reklam büdcəsini ona görə bölürsünüz.</p>

<h2>Sayt, yoxsa Yalnız Instagram?</h2>
<p>Bir çox kurs mərkəzi yalnız Instagram ilə işləyir. Başlanğıc üçün bu kifayətdir, amma fərq böyükdür:</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>Yalnız Instagram</th><th>Sayt + Instagram</th></tr>
  </thead>
  <tbody>
    <tr><td>Google axtarışı</td><td>Kurs postları "ingilis dili kursu Bakı" sorğusunda demək olar ki, görünmür</td><td>Hər kurs və filial səhifəsi axtarışda görünə bilər</td></tr>
    <tr><td>Məlumatın tapılması</td><td>Qiymət və cədvəl postların arasında itir, "direct-ə yazın"</td><td>Hər kursun proqramı, cədvəli, qiyməti bir səhifədə</td></tr>
    <tr><td>Etibar</td><td>Yeni açılan səhifə ilə köklü mərkəzi ayırmaq çətindir</td><td>Müəllimlər, nəticələr, filiallar, rəylər bir yerdə</td></tr>
    <tr><td>Müraciətin izlənməsi</td><td>Direct mesajlar qarışır</td><td>Forma, mənbə, status</td></tr>
    <tr><td>Nəzarət</td><td>Hesab platformanın qaydalarından asılıdır</td><td>Domen və məzmun sizindir</td></tr>
  </tbody>
</table>
<p>Ən yaxşı nəticə ikisi birlikdə olanda alınır: Instagram mərkəzin həyatını göstərir, sayt isə axtarışdan gələni tələbəyə çevirir.</p>

<h2>Sayt və İdarəetmə Platforması: Hər Birinin Öz İşi Var</h2>
<p>Kurs mərkəzi sahibləri tez-tez soruşur: "Saytda tələbə kabineti, ödəniş, davamiyyət də olsun?" Bunlar iki fərqli işdir:</p>
<ul>
  <li><strong>Sayt</strong> — tələbə <strong>cəlb edir</strong>: Google-da görünür, kursları və müəllimləri göstərir, müraciət toplayır.</li>
  <li><strong>İdarəetmə platforması</strong> — tələbə qeydiyyatdan keçəndən sonra işi <strong>idarə edir</strong>: qruplar, cədvəl, davamiyyət, sınaqlar, ev tapşırıqları, ödənişlər, valideyn hesabatı.</li>
</ul>
<p>RS Code-un <a href="/mehsullar/kursometr">Kursometr</a> platforması ikinci hissə üçündür. Açıq deyək: Kursometr <strong>müəllim ətrafında qurulub</strong> — o, sayt konstruktoru və ya SEO aləti deyil. Kursometr-də nə var:</p>
<table>
  <thead>
    <tr><th>Ehtiyac</th><th>Kursometr-də</th></tr>
  </thead>
  <tbody>
    <tr><td>Müəllim səhifəsi</td><td>Müəllim bir dəqiqəyə öz səhifəsini açır: <em>adiniz.kursometr.com</em></td></tr>
    <tr><td>Qruplar və cədvəl</td><td>Fənlər, qruplar, həftəlik cədvəl, davamiyyət</td></tr>
    <tr><td>Sınaqlar</td><td>Təyin olunan saatda açılıb-bağlanan vaxtlı sınaqlar; qapalı suallar avtomatik yoxlanır</td></tr>
    <tr><td>Sual bazası</td><td>PDF test toplusu yükləndikdə suallar sual bazasına əlavə olunur</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Tapşırıq vermək və izləmək</td></tr>
    <tr><td>Ödənişlər</td><td>Tələbə ödənişlərinin izlənməsi</td></tr>
    <tr><td>Valideyn</td><td>Valideyn kabineti: davamiyyət, qiymətlər, sınaq nəticələri</td></tr>
    <tr><td>Köməkçi müəllim</td><td>Mentor hesabları</td></tr>
    <tr><td>Materiallar</td><td>Dərs yazıları və materiallar yalnız həmin qrupa görünür</td></tr>
    <tr><td>Giriş</td><td>Telefon brauzerində işləyir, Google ilə giriş; müəllim qeydiyyatı pulsuzdur</td></tr>
  </tbody>
</table>
<p><strong>Birlikdə necə işləyir:</strong> valideyn Google-da "abituriyent hazırlığı Nərimanov" yazır → kurs səhifənizi tapır → sınaq dərsi formasını doldurur → administrator zəng edir və tələbəni qrupa yazır → müəllim tələbəni Kursometr-də qrupa əlavə edir → valideyn kabinetdə davamiyyəti, qiymətləri və sınaq nəticələrini görür. Saytdakı "Valideyn kabineti" linki birbaşa müəllimin Kursometr səhifəsinə apara bilər. Hazırlıq kursunda bu prosesin ətraflı izahı: <a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a>.</p>
<p>Bir neçə filialı, mərkəzi hesabatı və öz iş qaydaları olan böyük mərkəz üçün hazır platforma kifayət etməyə bilər — belə hallarda RS Code fərdi sistem hazırlayır: <a href="/elaqe">bizimlə əlaqə saxlayın</a>. Tədris mərkəzinin idarəsi barədə ümumi bələdçi: <a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">tədris mərkəzi üçün idarəetmə proqramı</a>.</p>

<h2>Qiymət və Müddət</h2>
<table>
  <thead>
    <tr><th>Sayt növü</th><th>Kimə uyğundur</th><th>Təxmini qiymət</th></tr>
  </thead>
  <tbody>
    <tr><td>Landing səhifə</td><td>Bir kurs və ya qəbul kampaniyası (məsələn, yay intensivi)</td><td>300 – 700 AZN</td></tr>
    <tr><td>Vizit kartı sayt</td><td>Bir filial, bir neçə kurs, müraciət forması</td><td>500 – 1 200 AZN</td></tr>
    <tr><td>Korporativ kurs mərkəzi saytı</td><td>Kurs, müəllim və filial səhifələri, qeydiyyat forması, bloq, 2–3 dil</td><td>1 200 – 3 500 AZN</td></tr>
    <tr><td>Fərdi sistem</td><td>Çox filiallı şəbəkə, tələbə kabineti, daxili inteqrasiyalar</td><td>5 000+ AZN</td></tr>
  </tbody>
</table>
<p>Kurs səhifələri olan tipik kurs mərkəzi saytı korporativ aralığa düşür və adətən <strong>3–5 həftəyə</strong> hazırlanır: struktur və dizayn, səhifələrin hazırlanması, məzmunun yerləşdirilməsi, schema və Google Business Profile ilə uyğunlaşdırma, test. Ən çox vaxt kurs proqramlarının, müəllim fotolarının və mətnlərin toplanmasına gedir. Hər əlavə dil qiymətə təxminən 15–25% əlavə edir; domen və hostinq ayrıca xərcdir. Qiymətə nələrin təsir etdiyi barədə: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">veb sayt qiyməti Azərbaycanda</a>. Fərdi müəllim üçün daha sadə variant: <a href="/blog-details/muellim-repetitor-ucun-sexsi-sayt-2027">müəllim və repetitor üçün şəxsi sayt</a>.</p>

<h2>Tez-tez Edilən Səhvlər</h2>
<ul>
  <li><strong>Bütün kurslar bir səhifədə</strong> — Google hansı səhifəni hansı sorğuya göstərəcəyini bilmir;</li>
  <li><strong>Qiymət, cədvəl və müddət yoxdur</strong> — valideyn "direct-ə yazın" əvəzinə rəqibin saytına keçir;</li>
  <li><strong>Filiallar saytda yoxdur</strong> və ya Google-da ünvan/telefon saytdakından fərqlidir;</li>
  <li><strong>Müraciətə gec cavab</strong> — forma e-poçtda qalır, valideyn başqa kursa yazılır;</li>
  <li><strong>Müraciətin mənbəyi izlənmir</strong> — hansı kanalın tələbə gətirdiyi bilinmir;</li>
  <li><strong>İcazəsiz dərc olunan tələbə adları və fotoları</strong>, şişirdilmiş "zəmanət" vədləri;</li>
  <li><strong>Yavaş mobil versiya</strong> — valideyn saytı telefondan açır.</li>
</ul>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Hər kurs üçün ayrıca səhifə: proqram, müddət, cədvəl, qiymət və ya "əlaqə saxlayın", səviyyə, müəllim</li>
  <li>☐ Müəllim profilləri real foto və təcrübə ilə</li>
  <li>☐ Nəticələr yalnız tələbə/valideyn icazəsi ilə</li>
  <li>☐ Hər filial üçün səhifə və xəritə</li>
  <li>☐ Hər filial üçün Google Business Profile, hər yerdə eyni ad/ünvan/telefon</li>
  <li>☐ Qısa qeydiyyat / sınaq dərsi forması və WhatsApp düyməsi mobil ekranda görünür</li>
  <li>☐ Müraciətə sürətli cavab qaydası, mənbə və status izlənir</li>
  <li>☐ EducationalOrganization, Course, FAQPage, BreadcrumbList schema</li>
  <li>☐ FAQ və bloq — valideyn suallarına cavab</li>
  <li>☐ Lazım olduqda AZ/EN/RU, ayrıca URL və hreflang ilə</li>
  <li>☐ Qeydiyyatdan sonra qruplar, davamiyyət, ödəniş və valideyn hesabatı üçün platforma (məsələn, Kursometr)</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs mərkəzi üçün sayt neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kurs, müəllim və filial səhifələri, qeydiyyat forması və bloqu olan kurs mərkəzi saytı Azərbaycanda təxminən 1 200–3 500 AZN-dir (bazar təxmini). Bir kurs üçün landing səhifə 300–700 AZN, kiçik mərkəz üçün vizit kartı sayt 500–1 200 AZN, çox filiallı fərdi sistem isə 5 000 AZN-dən başlayır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt nə qədər müddətə hazırlanır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kurs səhifələri olan tipik kurs mərkəzi saytı adətən 3–5 həftəyə hazırlanır. Ən çox vaxt kurs proqramlarının, müəllim məlumatlarının, fotoların və mətnlərin toplanmasına gedir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Instagram səhifəsi varsa, sayt lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram mərkəzin gündəlik həyatını göstərmək üçün yaxşıdır, amma "ingilis dili kursu Bakı" kimi Google axtarışlarında demək olar ki, görünmür. Sayt hər kursu, filialı və müəllimi ayrıca səhifədə göstərir, axtarışdan müraciət gətirir və müraciətin mənbəyini izləməyə imkan verir. Ən yaxşısı ikisini birlikdə istifadə etməkdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Bir neçə filial üçün nə etmək lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər filial üçün saytda ayrıca səhifə (ünvan, xəritə, kurslar, telefon) və ayrıca Google Business Profile yaradın. Ad, ünvan və telefon saytda, Google-da və sosial şəbəkələrdə eyni yazılmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytla Kursometr arasında fərq nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sayt tələbə cəlb edir: Google-da görünür, kursları göstərir və müraciət toplayır. Kursometr isə qeydiyyatdan sonrakı işi idarə edir: fənlər, qruplar, həftəlik cədvəl, davamiyyət, vaxtlı sınaqlar, ev tapşırıqları, ödəniş izləmə və valideyn kabineti. Kursometr müəllim ətrafında qurulub, müəllim qeydiyyatı pulsuzdur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytda tələbə nəticələrini dərc etmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Olar, amma yalnız tələbənin, azyaşlıdırsa valideyninin icazəsi ilə. İcazə yoxdursa, ad əvəzinə baş hərflərdən və ya ümumiləşdirilmiş nəticələrdən istifadə edin və yoxlanıla bilməyən "zəmanət" vədləri verməyin.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">Abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a></li>
  <li><a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">Dil kursu üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">Tədris mərkəzi üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/muellim-repetitor-ucun-sexsi-sayt-2027">Müəllim və repetitor üçün şəxsi sayt</a></li>
  <li><a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır?</a></li>
  <li><a href="/blog-details/klinika-tibb-merkezi-ucun-sayt-2027">Klinika və tibb mərkəzi üçün sayt</a> — başqa sahədə eyni yanaşma</li>
  <li><a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb sayt qiyməti Azərbaycanda</a></li>
</ul>

<h2>Nəticə</h2>
<p>Kurs mərkəzi üçün yaxşı sayt valideynin üç sualına dərhal cavab verir: hansı kurs uşağıma uyğundur, harada və nə vaxt keçirilir, necə yazılım. Hər kursa ayrıca səhifə verin, müəllimləri və nəticələri icazə ilə göstərin, hər filialı Google-da düzgün qeyd edin, müraciətlərə tez cavab verin və mənbəyini izləyin. Tələbə qeydiyyatdan keçəndən sonra isə qruplar, sınaqlar, ödənişlər və valideyn hesabatı üçün <a href="/mehsullar/kursometr">Kursometr</a> kimi platformadan istifadə edin.</p>
<p><strong>Kurs mərkəziniz üçün sayt hazırlayaq? <a href="/veb-saytlarin-hazirlanmasi">Veb saytların hazırlanması xidməti</a></strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>. Müəllimləriniz üçün səhifə açmaq istəyirsinizsə: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> — qeydiyyat pulsuzdur.</p>
<p><small><em>Qiymət və müddət aralıqları Azərbaycan bazarı üzrə təxminidir (noyabr 2026) və layihənin həcmindən asılıdır. Axtarış sorğuları nümunə kimi verilib. Schema işarələməsi Google-da xüsusi görünüşə zəmanət vermir.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>When parents look for an English course for their child, or choose an exam prep centre, they first ask friends — and then pick up their phone and type into Google. They look at the websites of a few course centres they see in the results and on the map, open their Instagram pages and message the one that gives the clearest information. Your courses may be good and your teachers strong, but if you do not show up on Google, or your website does not answer "which course, how much, where, when", that parent goes to a competitor.</p>
<p>This article is for owners of exam prep, language, IT and children's development centres. We explain which pages a course centre website needs in 2027, local SEO, the process from the registration form to following up a lead, the difference between a website and a management platform such as <a href="/mehsullar/kursometr">Kursometr</a>, and the price and timeline.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Which pages are needed?</td><td>A separate page for each course, teachers, results, branches with a map, a registration / trial lesson form, WhatsApp, FAQ, blog; AZ/EN/RU where relevant</td></tr>
    <tr><td>How do you show up on Google?</td><td>A Google Business Profile for each branch, the same name/address/phone on the site and the map, reviews, pages by course and district, EducationalOrganization, Course, FAQPage, BreadcrumbList schema</td></tr>
    <tr><td>Price</td><td>A site with course pages usually falls in the corporate range: roughly AZN 1,200 – 3,500 (market estimate)</td></tr>
    <tr><td>Timeline</td><td>Usually 3–5 weeks; how ready the course details, teacher photos and texts are matters most</td></tr>
    <tr><td>Website and platform</td><td>The website attracts students; after enrolment, groups, timetable, attendance, tests, payments and the parent portal run in a platform such as <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>How Do Parents and Students Search for a Course?</h2>
<p>A course search is almost always <strong>specific</strong> and <strong>local</strong>. People do not type "good course"; they type their need and a nearby place. Examples:</p>
<ul>
  <li><strong>Subject + city:</strong> "ingilis dili kursu Bakı" (English course Baku), "IT kursları Bakı" (IT courses Baku), "Russian course for adults";</li>
  <li><strong>Exam prep + district:</strong> "abituriyent hazırlığı Nərimanov" (university entrance prep, Narimanov), "school-leaving exam prep Yasamal", "master's entrance prep Khatai";</li>
  <li><strong>Age group:</strong> "uşaqlar üçün riyaziyyat kursu" (maths course for children), "pre-school preparation", "coding for kids";</li>
  <li><strong>"Near me" searches:</strong> "English course near me" — here the Google map and Google Business Profile decide;</li>
  <li><strong>Questions:</strong> "how many months to prepare for IELTS", "at what age can a child learn programming" — these are captured by blog posts.</li>
</ul>
<p>Each of these searches has a different intent, and one general "Our courses" page cannot answer them all. So a course centre website should be structured around search: its own page for each course, each age group and each branch.</p>

<h2>Which Pages Should a Course Centre Website Have?</h2>
<table>
  <thead>
    <tr><th>Page</th><th>What it should contain</th><th>Why it matters</th></tr>
  </thead>
  <tbody>
    <tr><td>Home</td><td>Main areas, branches, a "Book a trial lesson" button, phone and WhatsApp</td><td>Parents decide in a few seconds</td></tr>
    <tr><td>Course pages</td><td>A separate page per course: programme, duration, schedule, price or "contact us for the price", level, teacher</td><td>Being found for searches like "English course" or "IT course"</td></tr>
    <tr><td>Teachers</td><td>Photo, education, experience, which courses they teach</td><td>Parents often choose by teacher</td></tr>
    <tr><td>Results</td><td>Student results, certificates, success stories — only with permission</td><td>A trust signal</td></tr>
    <tr><td>Branches</td><td>For each branch: address, Google map, metro/parking, opening hours, phone</td><td>"Near me" searches and local SEO</td></tr>
    <tr><td>Registration / trial lesson</td><td>A short form: name, phone, course, branch, preferred time</td><td>The site's main goal — enquiries</td></tr>
    <tr><td>WhatsApp</td><td>A button with a pre-filled message</td><td>Many parents prefer writing to calling</td></tr>
    <tr><td>FAQ</td><td>Price, payment terms, group size, missed lessons, trial lesson</td><td>Fewer repeated phone questions, useful for Google</td></tr>
    <tr><td>Blog</td><td>Posts that answer parents' and students' questions</td><td>Capturing question-style searches</td></tr>
  </tbody>
</table>

<h2>The Course Page: the Most Important Part of the Site</h2>
<p>On a course centre website, the page that sells is not the home page but the course page. For "English course Baku", Google shows the most relevant page — and that is the page dedicated to that course. A good course page includes:</p>
<ol>
  <li><strong>Who it is for</strong> — age, level, goal ("grades 9–11", "from A2 to B1", "complete beginners");</li>
  <li><strong>Programme</strong> — topics by module or month, and what the student will be able to do at the end;</li>
  <li><strong>Duration and schedule</strong> — how many months, how many times a week, lesson length, morning/evening/weekend groups;</li>
  <li><strong>Format</strong> — in person, online or blended; how many students per group;</li>
  <li><strong>Price</strong> — the monthly fee, a "from…" range or "contact us for the price". If you can show the price, do — it is almost always the parent's first question;</li>
  <li><strong>Teacher</strong> — a short profile and photo of the teacher who runs the course;</li>
  <li><strong>Placement test and trial lesson</strong> — how to sign up;</li>
  <li><strong>FAQ</strong> — 4–6 questions about this course;</li>
  <li><strong>Registration button</strong> — at the top and at the end of the page.</li>
</ol>
<p>For children's development centres, pages by age group work better; for IT courses, a page per track (programming, design, data and so on). Language schools can give levels and exam preparation separate pages. On running a language school internally: <a href="/blog-details/language-course-management-software-2027">language course management software</a>.</p>

<h2>Teachers and Results: the Basis of Trust</h2>
<p>"An experienced teaching team" says nothing. Parents want to see a specific person: a real photo, education, how many years they have taught, which courses they run. A teacher page also brings in people who search for that teacher by name.</p>
<p>The results section is the second strong trust signal: certificates, exam results, success stories, parent reviews. One important rule applies: <strong>publish a student's name, photo and result only with their permission (or a parent's, if they are a minor)</strong>. Without permission, show initials or aggregated results instead. Avoid exaggerated promises ("100% admission guaranteed") — verifiable facts are more convincing.</p>

<h2>Branches, Google Business Profile and Local SEO</h2>
<p>For "English course near me", the first thing people see is often not a website but a card on the Google map. That card is managed through <strong>Google Business Profile</strong>. Key rules for a course centre:</p>
<ul>
  <li><strong>A separate profile for each branch</strong> — with its own address, phone, opening hours and photos;</li>
  <li><strong>The same name, address and phone</strong> — written identically on the site, on Google, on Instagram and in directories. Different variants confuse Google;</li>
  <li><strong>The right category</strong> — "Language school", "Educational institution", "Computer training school" and so on;</li>
  <li><strong>A page on the site for each branch</strong> — map, directions, the courses held at that branch;</li>
  <li><strong>Reviews and real photos</strong> — ask students and parents who finished a course for a review, and reply politely to every review, including negative ones.</li>
</ul>
<p>Step-by-step guide: <a href="/blog-details/how-to-create-google-business-profile-2026">how to create a Google Business Profile</a>.</p>
<p><strong>Schema markup</strong> explains the site's content to Google. The basics for a course centre:</p>
<table>
  <thead>
    <tr><th>Schema</th><th>Where</th><th>What it describes</th></tr>
  </thead>
  <tbody>
    <tr><td>EducationalOrganization</td><td>Home page, branch pages</td><td>The organisation's name, address, contact details, logo</td></tr>
    <tr><td>Course</td><td>Each course page</td><td>Course name, description, the centre that provides it</td></tr>
    <tr><td>FAQPage</td><td>FAQ sections</td><td>Questions and answers</td></tr>
    <tr><td>BreadcrumbList</td><td>Inner pages</td><td>Site structure (Home › Courses › English)</td></tr>
  </tbody>
</table>
<p>Schema does not guarantee a result, but it helps Google and AI answers understand the page correctly. If you need professional help: <a href="/seo-services">SEO services</a>.</p>

<h2>From Registration Form to Student: Don't Lose the Lead</h2>
<p>A website brings enquiries, but an enquiry is not yet a student. Course centres lose some enquiries not on the site but after it: the form lands in an inbox, nobody looks, and two days later the parent signs up elsewhere. A simple process:</p>
<ol>
  <li><strong>A short form</strong> — name, phone, course, branch, preferred time. Every extra field reduces enquiries;</li>
  <li><strong>A fast response</strong> — a call or WhatsApp message as soon as possible during working hours. Parents usually contact several centres at once, and the first to reply has the edge;</li>
  <li><strong>Record the source</strong> — did the enquiry come from Google search, the map, Instagram or an ad? Add hidden UTM fields or a "How did you find us?" question to the form;</li>
  <li><strong>Status</strong> — new, called, booked a trial lesson, enrolled, declined. A simple spreadsheet is enough; what matters is that every enquiry has a status;</li>
  <li><strong>Trial lesson or placement test</strong> — then placement in a group.</li>
</ol>
<p>After a few months you can see which channel brings real students and split your ad budget accordingly.</p>

<h2>A Website or Instagram Only?</h2>
<p>Many course centres work only through Instagram. That is enough to start with, but the difference is large:</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>Instagram only</th><th>Website + Instagram</th></tr>
  </thead>
  <tbody>
    <tr><td>Google search</td><td>Course posts barely appear for "English course Baku"</td><td>Each course and branch page can appear in search</td></tr>
    <tr><td>Finding information</td><td>Price and schedule get lost among posts, "DM us"</td><td>Each course's programme, schedule and price on one page</td></tr>
    <tr><td>Trust</td><td>Hard to tell a newly opened page from an established centre</td><td>Teachers, results, branches and reviews in one place</td></tr>
    <tr><td>Lead tracking</td><td>Direct messages get mixed up</td><td>Form, source, status</td></tr>
    <tr><td>Control</td><td>The account depends on the platform's rules</td><td>The domain and content are yours</td></tr>
  </tbody>
</table>
<p>The best results come from using both: Instagram shows the life of the centre, and the website turns people arriving from search into students.</p>

<h2>Website and Management Platform: Each Has Its Own Job</h2>
<p>Course centre owners often ask: "Can the website also have a student portal, payments and attendance?" These are two different jobs:</p>
<ul>
  <li><strong>The website</strong> <strong>attracts</strong> students: it shows up on Google, presents courses and teachers, and collects enquiries.</li>
  <li><strong>The management platform</strong> <strong>runs</strong> the work after a student enrols: groups, timetable, attendance, tests, homework, payments, parent reports.</li>
</ul>
<p>RS Code's <a href="/mehsullar/kursometr">Kursometr</a> platform is for the second part. To be clear: Kursometr is <strong>built around the teacher</strong> — it is not a website builder or an SEO tool. What Kursometr has:</p>
<table>
  <thead>
    <tr><th>Need</th><th>In Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Teacher page</td><td>A teacher opens their own page in a minute: <em>yourname.kursometr.com</em></td></tr>
    <tr><td>Groups and timetable</td><td>Subjects, groups, a weekly timetable, attendance</td></tr>
    <tr><td>Tests</td><td>Timed tests that open and close at the set time; closed questions are graded automatically</td></tr>
    <tr><td>Question bank</td><td>Uploading a PDF test collection adds its questions to the question bank</td></tr>
    <tr><td>Homework</td><td>Setting and tracking homework</td></tr>
    <tr><td>Payments</td><td>Tracking student payments</td></tr>
    <tr><td>Parents</td><td>A parent portal: attendance, grades, test results</td></tr>
    <tr><td>Assistant teacher</td><td>Mentor accounts</td></tr>
    <tr><td>Materials</td><td>Lesson recordings and materials visible only to that group</td></tr>
    <tr><td>Access</td><td>Works in a phone browser, sign-in with Google; teacher registration is free</td></tr>
  </tbody>
</table>
<p><strong>How they work together:</strong> a parent searches "abituriyent hazırlığı Nərimanov" on Google → finds your course page → fills in the trial lesson form → an administrator calls and enrols the student → the teacher adds the student to a group in Kursometr → the parent sees attendance, grades and test results in the parent portal. A "Parent portal" link on the website can lead straight to the teacher's Kursometr page. A detailed walk-through for exam prep centres: <a href="/blog-details/exam-prep-course-centre-management-2027">how to run an exam prep course centre</a>.</p>
<p>A large centre with several branches, central reporting and its own workflows may need more than an off-the-shelf platform — in that case RS Code builds a custom system: <a href="/contact">get in touch</a>. A general guide to running a training centre: <a href="/blog-details/training-centre-management-software-2026">training centre management software</a>.</p>

<h2>Price and Timeline</h2>
<table>
  <thead>
    <tr><th>Website type</th><th>Who it suits</th><th>Estimated price</th></tr>
  </thead>
  <tbody>
    <tr><td>Landing page</td><td>One course or an enrolment campaign (e.g. a summer intensive)</td><td>AZN 300 – 700</td></tr>
    <tr><td>Business card site</td><td>One branch, a few courses, an enquiry form</td><td>AZN 500 – 1,200</td></tr>
    <tr><td>Corporate course centre site</td><td>Course, teacher and branch pages, registration form, blog, 2–3 languages</td><td>AZN 1,200 – 3,500</td></tr>
    <tr><td>Custom system</td><td>Multi-branch network, student portal, internal integrations</td><td>AZN 5,000+</td></tr>
  </tbody>
</table>
<p>A typical course centre site with course pages falls in the corporate range and usually takes <strong>3–5 weeks</strong>: structure and design, building the pages, adding content, schema and alignment with Google Business Profile, testing. Most of the time goes into collecting course programmes, teacher photos and texts. Each extra language adds roughly 15–25% to the price; domain and hosting are separate costs. What drives the price: <a href="/blog-details/website-cost-azerbaijan-2026">website cost in Azerbaijan</a>. A simpler option for an individual teacher: <a href="/blog-details/personal-website-for-teachers-tutors-2027">a personal website for teachers and tutors</a>.</p>

<h2>Common Mistakes</h2>
<ul>
  <li><strong>All courses on one page</strong> — Google does not know which page to show for which search;</li>
  <li><strong>No price, schedule or duration</strong> — instead of "DM us", the parent goes to a competitor's site;</li>
  <li><strong>Branches missing from the site</strong>, or the address/phone on Google differs from the site;</li>
  <li><strong>Slow replies to enquiries</strong> — the form sits in an inbox and the parent enrols elsewhere;</li>
  <li><strong>Lead sources not tracked</strong> — nobody knows which channel brings students;</li>
  <li><strong>Student names and photos published without permission</strong>, exaggerated "guarantee" promises;</li>
  <li><strong>A slow mobile version</strong> — parents open the site on their phones.</li>
</ul>

<h2>Checklist</h2>
<ul>
  <li>☐ A separate page per course: programme, duration, schedule, price or "contact us", level, teacher</li>
  <li>☐ Teacher profiles with real photos and experience</li>
  <li>☐ Results only with student/parent permission</li>
  <li>☐ A page and map for each branch</li>
  <li>☐ A Google Business Profile for each branch, the same name/address/phone everywhere</li>
  <li>☐ A short registration / trial lesson form and a WhatsApp button visible on mobile</li>
  <li>☐ A fast-response rule for enquiries; source and status are tracked</li>
  <li>☐ EducationalOrganization, Course, FAQPage, BreadcrumbList schema</li>
  <li>☐ FAQ and blog answering parents' questions</li>
  <li>☐ AZ/EN/RU where relevant, with separate URLs and hreflang</li>
  <li>☐ A platform for groups, attendance, payments and parent reports after enrolment (for example, Kursometr)</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does a course centre website cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A course centre site with course, teacher and branch pages, a registration form and a blog costs roughly AZN 1,200–3,500 in Azerbaijan (market estimate). A landing page for one course is AZN 300–700, a business card site for a small centre AZN 500–1,200, and a custom multi-branch system starts from AZN 5,000.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to build the site?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A typical course centre site with course pages usually takes 3–5 weeks. Most of the time goes into collecting course programmes, teacher details, photos and texts.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do we need a website if we have an Instagram page?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram is good for showing the centre's day-to-day life, but it barely appears in Google searches such as "English course Baku". A website shows each course, branch and teacher on its own page, brings enquiries from search and lets you track where they come from. The best approach is to use both.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What should we do if we have several branches?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Create a separate page on the site for each branch (address, map, courses, phone) and a separate Google Business Profile. The name, address and phone should be written the same way on the site, on Google and on social media.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the difference between a website and Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The website attracts students: it shows up on Google, presents courses and collects enquiries. Kursometr runs the work after enrolment: subjects, groups, a weekly timetable, attendance, timed tests, homework, payment tracking and a parent portal. Kursometr is built around the teacher, and teacher registration is free.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can we publish student results on the site?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes, but only with the permission of the student, or of a parent if the student is a minor. Without permission, use initials or aggregated results, and do not make unverifiable "guarantee" promises.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/exam-prep-course-centre-management-2027">How to run an exam prep course centre</a></li>
  <li><a href="/blog-details/language-course-management-software-2027">Language course management software</a></li>
  <li><a href="/blog-details/training-centre-management-software-2026">Training centre management software</a></li>
  <li><a href="/blog-details/personal-website-for-teachers-tutors-2027">A personal website for teachers and tutors</a></li>
  <li><a href="/blog-details/how-to-create-google-business-profile-2026">How to create a Google Business Profile</a></li>
  <li><a href="/blog-details/clinic-medical-centre-website-azerbaijan-2027">Clinic and medical centre website</a> — the same approach in another sector</li>
  <li><a href="/blog-details/website-cost-azerbaijan-2026">Website cost in Azerbaijan</a></li>
</ul>

<h2>Conclusion</h2>
<p>A good course centre website answers a parent's three questions straight away: which course suits my child, where and when it runs, and how to sign up. Give each course its own page, show teachers and results with permission, list each branch correctly on Google, reply to enquiries quickly and track where they come from. After a student enrols, use a platform such as <a href="/mehsullar/kursometr">Kursometr</a> for groups, tests, payments and parent reports.</p>
<p><strong>Shall we build a website for your course centre? <a href="/website-development">Website development service</a></strong> or <a href="/contact">get in touch</a>. If you want to open pages for your teachers: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> — registration is free.</p>
<p><small><em>Price and timeline ranges are estimates for the Azerbaijani market (November 2026) and depend on the scope of the project. Search queries are given as examples. Schema markup does not guarantee a special appearance on Google.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Когда родители ищут курсы английского для ребёнка или выбирают центр подготовки абитуриентов, сначала они спрашивают знакомых, а потом берут телефон и пишут запрос в Google. Они открывают сайты нескольких учебных центров из выдачи и с карты, заходят в их Instagram и пишут тому, кто даёт самую понятную информацию. Ваши курсы могут быть хорошими, а преподаватели сильными, но если вас нет в Google или сайт не отвечает на вопросы «какой курс, сколько стоит, где, когда», этот родитель уходит к конкуренту.</p>
<p>Эта статья для владельцев центров подготовки к экзаменам, языковых школ, IT-курсов и центров развития детей. Разбираем, какие страницы нужны сайту учебного центра в 2027 году, локальное SEO, путь от формы записи до обработки заявки, разницу между сайтом и платформой управления вроде <a href="/mehsullar/kursometr">Kursometr</a>, а также цену и сроки.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Какие страницы нужны?</td><td>Отдельная страница для каждого курса, преподаватели, результаты, филиалы с картой, форма записи / пробного урока, WhatsApp, FAQ, блог; при необходимости AZ/EN/RU</td></tr>
    <tr><td>Как появиться в Google?</td><td>Google Business Profile для каждого филиала, одинаковые название/адрес/телефон на сайте и на карте, отзывы, страницы по курсам и районам, schema EducationalOrganization, Course, FAQPage, BreadcrumbList</td></tr>
    <tr><td>Цена</td><td>Сайт со страницами курсов обычно попадает в корпоративный диапазон: примерно 1 200 – 3 500 AZN (рыночная оценка)</td></tr>
    <tr><td>Срок</td><td>Обычно 3–5 недель; больше всего влияет готовность описаний курсов, фото преподавателей и текстов</td></tr>
    <tr><td>Сайт и платформа</td><td>Сайт привлекает учеников; после записи группы, расписание, посещаемость, тесты, оплаты и кабинет родителя ведутся в платформе вроде <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Как родители и ученики ищут курсы?</h2>
<p>Поиск курсов почти всегда <strong>конкретный</strong> и <strong>локальный</strong>. Люди пишут не «хорошие курсы», а свою задачу и район рядом. Примеры:</p>
<ul>
  <li><strong>Предмет + город:</strong> «ingilis dili kursu Bakı» (курсы английского Баку), «IT kursları Bakı» (IT-курсы Баку), «курсы русского языка для взрослых»;</li>
  <li><strong>Подготовка + район:</strong> «abituriyent hazırlığı Nərimanov» (подготовка абитуриентов, Нариманов), «подготовка к выпускному экзамену Ясамал», «подготовка в магистратуру Хатаи»;</li>
  <li><strong>Возраст:</strong> «uşaqlar üçün riyaziyyat kursu» (курсы математики для детей), «подготовка к школе», «программирование для детей»;</li>
  <li><strong>Запросы «рядом»:</strong> «курсы английского рядом» — здесь решают Google Карты и Google Business Profile;</li>
  <li><strong>Вопросы:</strong> «сколько месяцев готовиться к IELTS», «с какого возраста ребёнок может учить программирование» — такие запросы закрывают статьи в блоге.</li>
</ul>
<p>У каждого из этих запросов своё намерение, и одна общая страница «Наши курсы» не ответит на все. Поэтому структуру сайта учебного центра нужно строить под поиск: своя страница для каждого курса, каждой возрастной группы и каждого филиала.</p>

<h2>Какие страницы нужны сайту учебного центра?</h2>
<table>
  <thead>
    <tr><th>Страница</th><th>Что на ней должно быть</th><th>Почему это важно</th></tr>
  </thead>
  <tbody>
    <tr><td>Главная</td><td>Основные направления, филиалы, кнопка «Записаться на пробный урок», телефон и WhatsApp</td><td>Родитель принимает решение за несколько секунд</td></tr>
    <tr><td>Страницы курсов</td><td>Отдельная страница для каждого курса: программа, длительность, расписание, цена или «узнайте цену», уровень, преподаватель</td><td>Находиться в Google по запросам вроде «курсы английского», «IT-курсы»</td></tr>
    <tr><td>Преподаватели</td><td>Фото, образование, опыт, какие курсы ведёт</td><td>Родители часто выбирают по преподавателю</td></tr>
    <tr><td>Результаты</td><td>Результаты учеников, сертификаты, истории успеха — только с разрешения</td><td>Сигнал доверия</td></tr>
    <tr><td>Филиалы</td><td>Для каждого филиала: адрес, Google Карта, метро/парковка, часы работы, телефон</td><td>Запросы «рядом» и локальное SEO</td></tr>
    <tr><td>Запись / пробный урок</td><td>Короткая форма: имя, телефон, курс, филиал, удобное время</td><td>Главная цель сайта — заявка</td></tr>
    <tr><td>WhatsApp</td><td>Кнопка с готовым текстом сообщения</td><td>Многие родители предпочитают писать, а не звонить</td></tr>
    <tr><td>FAQ</td><td>Цена, порядок оплаты, размер группы, пропущенные занятия, пробный урок</td><td>Меньше повторяющихся вопросов по телефону, польза для Google</td></tr>
    <tr><td>Блог</td><td>Статьи, отвечающие на вопросы родителей и учеников</td><td>Охват запросов в форме вопроса</td></tr>
  </tbody>
</table>

<h2>Страница курса — главная часть сайта</h2>
<p>На сайте учебного центра продаёт не главная страница, а страница курса. По запросу «курсы английского Баку» Google показывает самую релевантную страницу — и это страница, посвящённая именно этому курсу. На хорошей странице курса есть:</p>
<ol>
  <li><strong>Для кого курс</strong> — возраст, уровень, цель («ученики 9–11 классов», «с A2 до B1», «с нуля»);</li>
  <li><strong>Программа</strong> — темы по модулям или месяцам и что ученик будет уметь в конце;</li>
  <li><strong>Длительность и расписание</strong> — сколько месяцев, сколько раз в неделю, длительность урока, утренние/вечерние группы и группы выходного дня;</li>
  <li><strong>Формат</strong> — очно, онлайн или смешанно; сколько человек в группе;</li>
  <li><strong>Цена</strong> — ежемесячная оплата, диапазон «от…» или «узнайте цену». Если цену можно показать — покажите: почти всегда это первый вопрос родителя;</li>
  <li><strong>Преподаватель</strong> — короткий профиль и фото преподавателя курса;</li>
  <li><strong>Тест уровня и пробный урок</strong> — как записаться;</li>
  <li><strong>FAQ</strong> — 4–6 вопросов по этому курсу;</li>
  <li><strong>Кнопка записи</strong> — вверху и в конце страницы.</li>
</ol>
<p>Центрам развития детей лучше подходят страницы по возрастным группам, IT-курсам — страница для каждого направления (программирование, дизайн, данные и т. д.). У языковых школ уровни и подготовка к экзаменам могут быть отдельными страницами. О внутреннем управлении языковой школой: <a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">программа для языковых курсов</a>.</p>

<h2>Преподаватели и результаты — основа доверия</h2>
<p>Фраза «опытный преподавательский состав» ничего не говорит. Родитель хочет видеть конкретного человека: реальное фото, образование, сколько лет преподаёт, какие курсы ведёт. Страница преподавателя к тому же приводит тех, кто ищет его по имени.</p>
<p>Раздел результатов — второй сильный сигнал доверия: сертификаты, результаты экзаменов, истории успеха, отзывы родителей. Здесь есть важное правило: <strong>публикуйте имя, фото и результат ученика только с его разрешения (а если он несовершеннолетний — с разрешения родителя)</strong>. Если разрешения нет, показывайте инициалы или обобщённые результаты. Избегайте преувеличенных обещаний («100% гарантия поступления») — проверяемые факты убеждают сильнее.</p>

<h2>Филиалы, Google Business Profile и локальное SEO</h2>
<p>По запросу «курсы английского рядом» первым люди часто видят не сайт, а карточку на Google Картах. Этой карточкой управляют через <strong>Google Business Profile</strong>. Основные правила для учебного центра:</p>
<ul>
  <li><strong>Отдельный профиль для каждого филиала</strong> — со своим адресом, телефоном, часами работы и фотографиями;</li>
  <li><strong>Одинаковые название, адрес и телефон</strong> — одинаковое написание на сайте, в Google, в Instagram и в каталогах. Разные варианты сбивают Google с толку;</li>
  <li><strong>Правильная категория</strong> — «Языковая школа», «Учебный центр», «Компьютерные курсы» и т. п.;</li>
  <li><strong>Страница на сайте для каждого филиала</strong> — карта, как добраться, курсы в этом филиале;</li>
  <li><strong>Отзывы и реальные фото</strong> — просите отзыв у учеников и родителей, окончивших курс, и вежливо отвечайте на каждый отзыв, включая негативные.</li>
</ul>
<p>Пошаговая инструкция: <a href="/blog-details/kak-sozdat-google-business-profile-2026">как создать Google Business Profile</a>.</p>
<p><strong>Разметка schema</strong> объясняет Google содержание сайта. Основное для учебного центра:</p>
<table>
  <thead>
    <tr><th>Schema</th><th>Где</th><th>Что описывает</th></tr>
  </thead>
  <tbody>
    <tr><td>EducationalOrganization</td><td>Главная, страницы филиалов</td><td>Название организации, адрес, контакты, логотип</td></tr>
    <tr><td>Course</td><td>Каждая страница курса</td><td>Название курса, описание, центр, который его проводит</td></tr>
    <tr><td>FAQPage</td><td>Разделы FAQ</td><td>Вопросы и ответы</td></tr>
    <tr><td>BreadcrumbList</td><td>Внутренние страницы</td><td>Структура сайта (Главная › Курсы › Английский)</td></tr>
  </tbody>
</table>
<p>Schema не гарантирует результат, но помогает Google и AI-ответам правильно понять страницу. Если нужна профессиональная помощь: <a href="/seo-uslugi">SEO-услуги</a>.</p>

<h2>От формы записи до ученика: не теряйте заявки</h2>
<p>Сайт приносит заявки, но заявка — ещё не ученик. Учебные центры теряют часть заявок не на сайте, а после него: форма падает на почту, её никто не смотрит, и через два дня родитель записывается в другое место. Простой процесс:</p>
<ol>
  <li><strong>Короткая форма</strong> — имя, телефон, курс, филиал, удобное время. Каждое лишнее поле уменьшает число заявок;</li>
  <li><strong>Быстрый ответ</strong> — звонок или сообщение в WhatsApp как можно скорее в рабочее время. Родители обычно пишут сразу в несколько центров, и преимущество у того, кто ответит первым;</li>
  <li><strong>Фиксируйте источник</strong> — откуда пришла заявка: из поиска Google, с карты, из Instagram или из рекламы? Добавьте в форму скрытые UTM-поля или вопрос «Как вы о нас узнали?»;</li>
  <li><strong>Статус</strong> — новая, позвонили, записан на пробный урок, зачислен, отказался. Достаточно и простой таблицы — главное, чтобы у каждой заявки был статус;</li>
  <li><strong>Пробный урок или тест уровня</strong> — затем распределение в группу.</li>
</ol>
<p>Через несколько месяцев вы видите, какой канал приводит реальных учеников, и распределяете рекламный бюджет с учётом этого.</p>

<h2>Сайт или только Instagram?</h2>
<p>Многие учебные центры работают только через Instagram. Для старта этого достаточно, но разница большая:</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>Только Instagram</th><th>Сайт + Instagram</th></tr>
  </thead>
  <tbody>
    <tr><td>Поиск Google</td><td>Посты о курсах почти не видны по запросу «курсы английского Баку»</td><td>Каждая страница курса и филиала может появиться в поиске</td></tr>
    <tr><td>Поиск информации</td><td>Цена и расписание теряются среди постов, «пишите в директ»</td><td>Программа, расписание и цена каждого курса на одной странице</td></tr>
    <tr><td>Доверие</td><td>Сложно отличить новую страницу от давно работающего центра</td><td>Преподаватели, результаты, филиалы и отзывы в одном месте</td></tr>
    <tr><td>Учёт заявок</td><td>Сообщения в директе путаются</td><td>Форма, источник, статус</td></tr>
    <tr><td>Контроль</td><td>Аккаунт зависит от правил платформы</td><td>Домен и контент принадлежат вам</td></tr>
  </tbody>
</table>
<p>Лучший результат даёт сочетание: Instagram показывает жизнь центра, а сайт превращает пришедших из поиска в учеников.</p>

<h2>Сайт и платформа управления: у каждого своя задача</h2>
<p>Владельцы учебных центров часто спрашивают: «А можно, чтобы на сайте был ещё кабинет ученика, оплаты и посещаемость?» Это две разные задачи:</p>
<ul>
  <li><strong>Сайт</strong> <strong>привлекает</strong> учеников: находится в Google, показывает курсы и преподавателей, собирает заявки.</li>
  <li><strong>Платформа управления</strong> <strong>ведёт</strong> работу после записи ученика: группы, расписание, посещаемость, тесты, домашние задания, оплаты, отчёты родителям.</li>
</ul>
<p>Платформа <a href="/mehsullar/kursometr">Kursometr</a> от RS Code — для второй части. Скажем прямо: Kursometr <strong>построен вокруг преподавателя</strong> — это не конструктор сайтов и не SEO-инструмент. Что есть в Kursometr:</p>
<table>
  <thead>
    <tr><th>Задача</th><th>В Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Страница преподавателя</td><td>Преподаватель за минуту открывает свою страницу: <em>vashe-imya.kursometr.com</em></td></tr>
    <tr><td>Группы и расписание</td><td>Предметы, группы, недельное расписание, посещаемость</td></tr>
    <tr><td>Тесты</td><td>Тесты с таймером, которые открываются и закрываются в заданное время; закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Банк вопросов</td><td>При загрузке PDF-сборника тестов вопросы добавляются в банк вопросов</td></tr>
    <tr><td>Домашние задания</td><td>Выдача и отслеживание заданий</td></tr>
    <tr><td>Оплаты</td><td>Учёт оплат учеников</td></tr>
    <tr><td>Родители</td><td>Кабинет родителя: посещаемость, оценки, результаты тестов</td></tr>
    <tr><td>Ассистент</td><td>Аккаунты наставника</td></tr>
    <tr><td>Материалы</td><td>Записи уроков и материалы видны только этой группе</td></tr>
    <tr><td>Доступ</td><td>Работает в браузере телефона, вход через Google; регистрация преподавателя бесплатна</td></tr>
  </tbody>
</table>
<p><strong>Как они работают вместе:</strong> родитель пишет в Google «abituriyent hazırlığı Nərimanov» → находит страницу вашего курса → заполняет форму пробного урока → администратор звонит и записывает ученика → преподаватель добавляет ученика в группу в Kursometr → родитель видит посещаемость, оценки и результаты тестов в кабинете. Ссылка «Кабинет родителя» на сайте может вести прямо на страницу преподавателя в Kursometr. Подробный разбор для курсов подготовки: <a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">как управлять курсами подготовки к экзаменам</a>.</p>
<p>Крупному центру с несколькими филиалами, централизованной отчётностью и своими процессами готовой платформы может не хватить — в таком случае RS Code разрабатывает индивидуальную систему: <a href="/kontakty">свяжитесь с нами</a>. Общее руководство по управлению учебным центром: <a href="/blog-details/programma-dlya-uchebnogo-centra-2026">программа для учебного центра</a>.</p>

<h2>Цена и сроки</h2>
<table>
  <thead>
    <tr><th>Тип сайта</th><th>Кому подходит</th><th>Ориентировочная цена</th></tr>
  </thead>
  <tbody>
    <tr><td>Лендинг</td><td>Один курс или кампания набора (например, летний интенсив)</td><td>300 – 700 AZN</td></tr>
    <tr><td>Сайт-визитка</td><td>Один филиал, несколько курсов, форма заявки</td><td>500 – 1 200 AZN</td></tr>
    <tr><td>Корпоративный сайт учебного центра</td><td>Страницы курсов, преподавателей и филиалов, форма записи, блог, 2–3 языка</td><td>1 200 – 3 500 AZN</td></tr>
    <tr><td>Индивидуальная система</td><td>Сеть с филиалами, кабинет ученика, внутренние интеграции</td><td>5 000+ AZN</td></tr>
  </tbody>
</table>
<p>Типичный сайт учебного центра со страницами курсов попадает в корпоративный диапазон и обычно делается за <strong>3–5 недель</strong>: структура и дизайн, вёрстка страниц, наполнение, schema и согласование с Google Business Profile, тестирование. Больше всего времени уходит на сбор программ курсов, фото преподавателей и текстов. Каждый дополнительный язык добавляет к цене примерно 15–25%; домен и хостинг оплачиваются отдельно. Что влияет на цену: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">стоимость сайта в Азербайджане</a>. Более простой вариант для отдельного преподавателя: <a href="/blog-details/lichnyj-sajt-dlya-uchitelya-repetitora-2027">личный сайт для учителя и репетитора</a>.</p>

<h2>Частые ошибки</h2>
<ul>
  <li><strong>Все курсы на одной странице</strong> — Google не понимает, какую страницу показывать по какому запросу;</li>
  <li><strong>Нет цены, расписания и длительности</strong> — вместо «пишите в директ» родитель уходит на сайт конкурента;</li>
  <li><strong>Филиалов нет на сайте</strong> или адрес/телефон в Google отличаются от сайта;</li>
  <li><strong>Медленный ответ на заявки</strong> — форма лежит на почте, родитель записывается в другой центр;</li>
  <li><strong>Источник заявок не отслеживается</strong> — непонятно, какой канал приводит учеников;</li>
  <li><strong>Имена и фото учеников без разрешения</strong>, преувеличенные «гарантии»;</li>
  <li><strong>Медленная мобильная версия</strong> — родители открывают сайт с телефона.</li>
</ul>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Отдельная страница для каждого курса: программа, длительность, расписание, цена или «узнайте цену», уровень, преподаватель</li>
  <li>☐ Профили преподавателей с реальными фото и опытом</li>
  <li>☐ Результаты только с разрешения ученика/родителя</li>
  <li>☐ Страница и карта для каждого филиала</li>
  <li>☐ Google Business Profile для каждого филиала, везде одинаковые название/адрес/телефон</li>
  <li>☐ Короткая форма записи / пробного урока и кнопка WhatsApp видны на мобильном</li>
  <li>☐ Правило быстрого ответа на заявки; источник и статус отслеживаются</li>
  <li>☐ Schema EducationalOrganization, Course, FAQPage, BreadcrumbList</li>
  <li>☐ FAQ и блог с ответами на вопросы родителей</li>
  <li>☐ При необходимости AZ/EN/RU с отдельными URL и hreflang</li>
  <li>☐ Платформа для групп, посещаемости, оплат и отчётов родителям после записи (например, Kursometr)</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит сайт для учебного центра?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сайт учебного центра со страницами курсов, преподавателей и филиалов, формой записи и блогом стоит в Азербайджане примерно 1 200–3 500 AZN (рыночная оценка). Лендинг для одного курса — 300–700 AZN, сайт-визитка для небольшого центра — 500–1 200 AZN, индивидуальная система для сети с филиалами — от 5 000 AZN.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает разработка сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Типичный сайт учебного центра со страницами курсов обычно делается за 3–5 недель. Больше всего времени уходит на сбор программ курсов, данных о преподавателях, фото и текстов.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужен ли сайт, если есть страница в Instagram?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram хорош, чтобы показывать повседневную жизнь центра, но в поиске Google по запросам вроде «курсы английского Баку» он почти не виден. Сайт показывает каждый курс, филиал и преподавателя на отдельной странице, приводит заявки из поиска и позволяет отслеживать их источник. Лучше всего использовать оба канала.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что делать, если у нас несколько филиалов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Создайте на сайте отдельную страницу для каждого филиала (адрес, карта, курсы, телефон) и отдельный Google Business Profile. Название, адрес и телефон должны быть написаны одинаково на сайте, в Google и в соцсетях.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Чем сайт отличается от Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сайт привлекает учеников: находится в Google, показывает курсы и собирает заявки. Kursometr ведёт работу после записи: предметы, группы, недельное расписание, посещаемость, тесты с таймером, домашние задания, учёт оплат и кабинет родителя. Kursometr построен вокруг преподавателя, регистрация преподавателя бесплатна.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли публиковать результаты учеников на сайте?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Можно, но только с разрешения ученика, а если он несовершеннолетний — родителя. Без разрешения используйте инициалы или обобщённые результаты и не давайте непроверяемых «гарантий».</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">Как управлять курсами подготовки к экзаменам</a></li>
  <li><a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">Программа для языковых курсов</a></li>
  <li><a href="/blog-details/programma-dlya-uchebnogo-centra-2026">Программа для учебного центра</a></li>
  <li><a href="/blog-details/lichnyj-sajt-dlya-uchitelya-repetitora-2027">Личный сайт для учителя и репетитора</a></li>
  <li><a href="/blog-details/kak-sozdat-google-business-profile-2026">Как создать Google Business Profile?</a></li>
  <li><a href="/blog-details/sajt-dlya-kliniki-medicinskogo-centra-2027">Сайт для клиники и медицинского центра</a> — тот же подход в другой сфере</li>
  <li><a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта в Азербайджане</a></li>
</ul>

<h2>Итог</h2>
<p>Хороший сайт учебного центра сразу отвечает на три вопроса родителя: какой курс подойдёт моему ребёнку, где и когда проходят занятия, как записаться. Дайте каждому курсу отдельную страницу, показывайте преподавателей и результаты с разрешения, правильно оформите каждый филиал в Google, быстро отвечайте на заявки и отслеживайте их источник. А после записи ученика используйте для групп, тестов, оплат и отчётов родителям платформу вроде <a href="/mehsullar/kursometr">Kursometr</a>.</p>
<p><strong>Разработаем сайт для вашего учебного центра? <a href="/razrabotka-sajtov">Услуга разработки сайтов</a></strong> или <a href="/kontakty">напишите нам</a>. Если хотите открыть страницы для своих преподавателей: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> — регистрация бесплатна.</p>
<p><small><em>Диапазоны цен и сроков — ориентировочные для рынка Азербайджана (ноябрь 2026) и зависят от объёма проекта. Поисковые запросы приведены как примеры. Разметка schema не гарантирует особого отображения в Google.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'kurs-merkezi-ucun-sayt-ve-seo-2027'],
            [
                'slug_en' => 'course-centre-website-and-seo-2027',
                'slug_ru' => 'sajt-i-seo-dlya-uchebnogo-centra-2027',

                'title_az' => 'Kurs Mərkəzi üçün Sayt və Google-da Görünmək: Kurs Səhifələri, Yerli SEO və Qeydiyyat Forması (2027)',
                'title_en' => 'Course Centre Website and Google Visibility: Course Pages, Local SEO and a Registration Form (2027)',
                'title_ru' => 'Сайт для учебного центра и видимость в Google: страницы курсов, локальное SEO и форма записи (2027)',

                'review_az' => 'Kurs mərkəzi saytında nə olmalıdır? Valideynlər kursu necə axtarır, kurs, müəllim və filial səhifələri, Google Business Profile, schema, qeydiyyat forması və müraciətin izlənməsi, Instagram və sayt, sayt və Kursometr, qiymət, səhvlər və yoxlama siyahısı.',
                'review_en' => 'What should a course centre website include? How parents search for courses, course, teacher and branch pages, Google Business Profile, schema, the registration form and lead follow-up, Instagram vs a website, website vs Kursometr, price, mistakes and a checklist.',
                'review_ru' => 'Что должно быть на сайте учебного центра? Как родители ищут курсы, страницы курсов, преподавателей и филиалов, Google Business Profile, schema, форма записи и обработка заявок, Instagram или сайт, сайт и Kursometr, цена, ошибки и чек-лист.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '4 Noyabr 2026',
                'date_en' => 'November 4, 2026',
                'date_ru' => '4 Ноября 2026',

                'photo'    => 'cover-course-centre-website-az.png',
                'photo_en' => 'cover-course-centre-website-en.png',
                'photo_ru' => 'cover-course-centre-website-ru.png',

                'meta_title_az' => 'Kurs Mərkəzi üçün Sayt və SEO 2027 | RS Code',
                'meta_title_en' => 'Course Centre Website and SEO 2027 | RS Code',
                'meta_title_ru' => 'Сайт и SEO для учебного центра 2027 | RS Code',

                'meta_description_az' => 'Kurs mərkəzi saytı: kurs, müəllim və filial səhifələri, Google Business Profile, schema, qeydiyyat forması, Kursometr ilə əlaqə. Qiymət 1 200–3 500 AZN.',
                'meta_description_en' => 'Course centre website: course, teacher and branch pages, Google Business Profile, schema, a registration form and Kursometr. Price AZN 1,200–3,500, checklist.',
                'meta_description_ru' => 'Сайт учебного центра: страницы курсов, преподавателей и филиалов, Google Business Profile, schema, форма записи и Kursometr. Цена 1 200–3 500 AZN.',

                'meta_keywords_az' => 'kurs mərkəzi saytı, tədris mərkəzi saytı, kurs saytı hazırlanması, ingilis dili kursu bakı, abituriyent hazırlığı, yerli seo, kursometr, 2027',
                'meta_keywords_en' => 'course centre website, training centre website, tutoring centre website baku, local seo for schools, course page, kursometr, 2027',
                'meta_keywords_ru' => 'сайт для учебного центра, сайт для курсов, сайт языковой школы баку, локальное seo, страница курса, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
