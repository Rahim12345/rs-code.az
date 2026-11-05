<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * #71 — Dil kursu üçün idarəetmə proqramı: səviyyə testi, qruplar, davamiyyət, ev tapşırığı və ödənişlər (2027).
 * Kursometr faktları yalnız resources/lang/az/products.php və kursometr.com-dandır: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət,
 * vaxtlı sınaqlar (ümumi və aralıq, müəllimin saatında açılıb-bağlanır, qapalı suallar avtomatik), PDF test toplusu → sual bazası,
 * ev tapşırıqları, ödəniş izləmə, valideyn kabineti, mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar, telefon brauzeri,
 * Google ilə giriş, pulsuz qeydiyyat.
 * Səsli/danışıq testi, avtomatik səviyyə təyini, SMS, onlayn ödəniş, qiymət və rəylər İDDİA EDİLMİR.
 * CEFR — yalnız ümumi təsvir (Avropa Şurası, 6 səviyyə); IELTS/TOEFL bal cədvəli yoxdur.
 * #35, #45, #66–#69 ilə təkrar etmir, link verir. #70-ə link YOXDUR.
 */
class Blog71LanguageCourseSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Dil kursu adi repetitor dərsindən fərqli işləyir. Şagird gələndə əvvəlcə onun səviyyəsini müəyyən etmək, sonra uyğun qrupa yerləşdirmək, hər səviyyənin sonunda irəliləyişi yoxlamaq və növbəti səviyyəyə keçirmək lazımdır. Üstəlik danışıq praktikası, yazı və dinləmə tapşırıqları, onlayn dərslərin yazıları, uşaq şagirdlərin valideynləri və aylıq və ya paket ödənişlər var. İngilis, rus, alman və ya başqa dil tədris edən müəllim və kurs mərkəzləri bunların hamısını çox vaxt dəftər, WhatsApp və Excel arasında bölüşdürür.</p>
<p>Bu yazıda dil kursunun idarəetməsini addım-addım izah edirik: səviyyə testi və CEFR səviyyələri, qrupların qurulması, ev tapşırıqları, səviyyə sonu sınaqları, onlayn dərslər, IELTS/TOEFL hazırlığı, valideynlər və ödənişlər. Sonda bütün bunları bir platformada necə quracağınızı göstəririk.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Dil kursunda nəyi izləmək lazımdır?</td><td>Şagirdin səviyyəsi, qrupu, davamiyyəti, ev tapşırıqları, səviyyə sınaqlarının nəticələri və ödənişləri</td></tr>
    <tr><td>Səviyyə necə müəyyən edilir?</td><td>Qəbul zamanı səviyyə testi (yazılı hissə) və qısa şifahi müsahibə ilə; səviyyələr üçün ən geniş yayılmış çərçivə CEFR-dir (A1–C2)</td></tr>
    <tr><td>Qruplar necə qurulur?</td><td>Səviyyə və uyğun vaxt üzrə; danışıq praktikası üçün kiçik qruplar daha effektivdir</td></tr>
    <tr><td>Şagird növbəti səviyyəyə nə vaxt keçir?</td><td>Səviyyənin sonunda keçirilən sınaqdan, davamiyyət və tapşırıqlar nəzərə alınaraq</td></tr>
    <tr><td>Hamısını harada aparmaq rahatdır?</td><td>Qruplar, cədvəl, sınaqlar, tapşırıqlar, ödənişlər və valideyn kabineti bir yerdə olan platformada — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Dil Kursu Niyə Ayrıca Yanaşma Tələb Edir?</h2>
<p>Riyaziyyat və ya kimya repetitoru adətən məktəb proqramı və ya imtahan üzrə işləyir. Dil kursunda isə əsas vahid <strong>səviyyədir</strong>. Eyni yaşda iki şagird tamam fərqli səviyyədə ola bilər, eyni qrupda isə fərqli yaşda insanlar oxuya bilər. Ona görə dil kursunun idarəetməsi bir neçə xüsusi suala cavab verməlidir:</p>
<ul>
  <li>Yeni gələn şagird hansı səviyyədədir və hansı qrupa düşməlidir?</li>
  <li>Hansı qrup hansı səviyyədə və hansı mərhələdədir?</li>
  <li>Şagird dörd bacarıqda — oxu, yazı, dinləmə və danışıq — necə irəliləyir?</li>
  <li>Kim səviyyəni bitirməyə hazırdır, kim təkrar keçməlidir?</li>
  <li>Kimin ödənişi gecikir və hansı paket bitib?</li>
</ul>
<p>Bu suallara dəftərdən cavab tapmaq olar, amma şagird sayı 30–40-ı keçəndə bu iş müəllimin dərsdən sonrakı vaxtının böyük hissəsini aparır.</p>

<h2>Səviyyə Testi və CEFR Səviyyələri</h2>
<p>Dil kurslarının əksəriyyəti səviyyələri <strong>CEFR</strong> (Common European Framework of Reference for Languages — Dillər üzrə Ümumavropa İstinad Çərçivəsi) əsasında adlandırır. Bu çərçivəni Avropa Şurası hazırlayıb və o, dil bilgisini altı səviyyəyə bölür:</p>
<table>
  <thead>
    <tr><th>Səviyyə</th><th>Qrup</th><th>Qısa təsvir</th></tr>
  </thead>
  <tbody>
    <tr><td>A1</td><td rowspan="2">Başlanğıc istifadəçi</td><td>Gündəlik sadə ifadələri başa düşür, özünü təqdim edir, sadə suallar verir</td></tr>
    <tr><td>A2</td><td>Tanış mövzularda (ailə, alış-veriş, iş) qısa və sadə ünsiyyət qurur</td></tr>
    <tr><td>B1</td><td rowspan="2">Müstəqil istifadəçi</td><td>Tanış mövzularda əsas fikri anlayır, səyahətdə rastlaşdığı vəziyyətlərin öhdəsindən gəlir, sadə əlaqəli mətn yazır</td></tr>
    <tr><td>B2</td><td>Mürəkkəb mətnlərin əsas fikrini anlayır, daşıyıcı ilə kifayət qədər sərbəst danışır</td></tr>
    <tr><td>C1</td><td rowspan="2">Səriştəli istifadəçi</td><td>Uzun və çətin mətnləri anlayır, dili təhsil və işdə çevik istifadə edir</td></tr>
    <tr><td>C2</td><td>Eşitdiyi və oxuduğu demək olar hər şeyi asanlıqla anlayır, fikrini dəqiq və incə çalarlarla ifadə edir</td></tr>
  </tbody>
</table>
<p>Bir çox kurs bu səviyyələri daha kiçik mərhələlərə bölür (məsələn, A1.1 və A1.2) — bu, kursun öz qərarıdır. Vacib olan, səviyyə adlarının bütün qruplarda və müəllimlərdə eyni mənanı daşımasıdır.</p>
<p><strong>Səviyyə testi</strong> adətən iki hissədən ibarət olur: qrammatika, lüğət, oxu və dinləmə üzrə qapalı suallarla yazılı test və müəllimlə 5–10 dəqiqəlik qısa şifahi söhbət. Yazılı hissəni vaxtlı onlayn test kimi keçirmək olar: suallar avtomatik yoxlanır və müəllim nəticəni dərhal görür. Danışıq səviyyəsini isə müəllim özü qiymətləndirir — test balı və müsahibə birlikdə yekun səviyyəni göstərir. Onlayn test hazırlamaq barədə ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</p>

<h2>Qruplar: Səviyyə, Cədvəl və Ölçü</h2>
<p>Qrupu yalnız səviyyəyə görə deyil, vaxta görə də qurmaq lazımdır: məktəblilər dərsdən sonra, işləyənlər axşam və ya həftəsonu gəlir. Praktikada qrup adı bu iki məlumatı birləşdirir, məsələn, "B1 — B.e/Ç.a 19:00" və ya "A2 uşaqlar — Ş/B 11:00".</p>
<table>
  <thead>
    <tr><th>Format</th><th>Üstünlüyü</th><th>Diqqət</th></tr>
  </thead>
  <tbody>
    <tr><td>Kiçik qrup</td><td>Hər şagirdə danışmaq üçün vaxt qalır, qrup dinamikası motivasiya verir</td><td>Səviyyələr yaxın olmalıdır, əks halda zəif şagird geri qalır, güclü darıxır</td></tr>
    <tr><td>Böyük qrup</td><td>Daha çox şagird qəbul etmək mümkündür</td><td>Danışıq praktikası azalır, ev tapşırıqlarını yoxlamaq çətinləşir</td></tr>
    <tr><td>Fərdi dərs</td><td>Tam şagirdin ehtiyacına uyğun proqram, çevik vaxt</td><td>Bir şagird üçün ayrıca cədvəl, davamiyyət və ödəniş izləmək lazımdır</td></tr>
  </tbody>
</table>
<p>Fərdi dərsi sistemdə bir nəfərlik qrup kimi aparmaq rahatdır: cədvəl, davamiyyət, tapşırıqlar və ödəniş digər qruplarla eyni qaydada izlənir.</p>

<h2>Danışıq Praktikası və Ev Tapşırıqları</h2>
<p>Dil öyrənməyin böyük hissəsi dərsdən kənarda baş verir. Ev tapşırıqları dörd bacarığı balanslı inkişaf etdirməlidir:</p>
<ul>
  <li><strong>Yazı:</strong> esse, məktub, mövzu üzrə qısa mətn. Müəllim səhvləri qeyd edib geri qaytarır.</li>
  <li><strong>Dinləmə:</strong> audio və ya video material üzrə suallar. Materialı qrupun öz səhifəsində paylaşmaq onu WhatsApp-da itməkdən qoruyur.</li>
  <li><strong>Oxu və lüğət:</strong> mətn və söz testləri — bunlar qapalı suallarla avtomatik yoxlana bilər.</li>
  <li><strong>Danışıq:</strong> əsasən dərsdə — cüt və qrup işi, rollu oyunlar, mövzu üzrə müzakirə. Müəllim hər dərsdən sonra kimin az danışdığını qeyd edərsə, növbəti dərsdə ona daha çox söz verə bilər.</li>
</ul>
<p>Əsas problem tapşırığın verilməsi deyil, <strong>izlənməsidir</strong>: kim etdi, kim etmədi, kimə rəy yazılıb. Tapşırıqlar şagirdin kartında toplananda səviyyə sonunda qərar vermək də asanlaşır.</p>

<h2>Səviyyə Sonu Sınağı və Növbəti Səviyyəyə Keçid</h2>
<p>Hər səviyyənin (və ya mərhələnin) sonunda keçirilən sınaq şagirdin növbəti səviyyəyə hazır olub-olmadığını göstərir. Ədalətli qərar üçün sınağı əvvəlcədən planlaşdırın:</p>
<ol>
  <li>Səviyyə ərzində bir və ya iki <strong>aralıq sınaq</strong> keçirin — problem erkən görünsün.</li>
  <li>Səviyyənin sonunda <strong>ümumi sınaq</strong> keçirin: qrammatika, lüğət, oxu və dinləmə qapalı suallarla, yazı və danışıq müəllim tərəfindən qiymətləndirilir.</li>
  <li>Keçid meyarını əvvəlcədən elan edin, məsələn, minimum bal, davamiyyət və tapşırıqların icrası.</li>
  <li>Nəticəyə görə şagirdi növbəti səviyyənin qrupuna keçirin və ya təkrar kursu təklif edin.</li>
</ol>
<p>Sınaq vaxtlı olduqda bütün qrup eyni şəraitdə yazır, qapalı suallar avtomatik yoxlandıqda isə müəllim saatlarla kağız yoxlamır.</p>

<h2>Onlayn Dərslər və Dərs Yazıları</h2>
<p>Bir çox dil kursu qarışıq formatda işləyir: bəzi qruplar onlayn, bəziləri əyani. Onlayn dərsin yazısı dərsi buraxan şagird üçün və təkrar üçün faydalıdır. Amma yazılar və materiallar yalnız həmin qrupun şagirdlərinə görünməlidir — ümumi kanalda paylaşılan link həm məxfilik, həm də kursun məzmununun qorunması baxımından risklidir.</p>

<h2>IELTS və TOEFL Hazırlığı Qrupları</h2>
<p>Bir çox dil kursu xaricdə təhsil və ya iş üçün beynəlxalq imtahanlara hazırlıq qrupları açır. Bu qruplar adi səviyyə qruplarından fərqlənir: imtahanın formatına uyğun bölmələr üzrə işlənir, vaxt məhdudiyyətli sınaq imtahanları tez-tez keçirilir və hər şagirdin hədəf nəticəsi fərqli olur. İmtahan formatı, bal şkalası və tələblər barədə yalnız rəsmi mənbələrə — <a href="https://www.ielts.org/" rel="noopener" target="_blank">ielts.org</a> və <a href="https://www.ets.org/toefl.html" rel="noopener" target="_blank">ets.org</a> saytlarına — istinad edin, çünki formatlar vaxtaşırı yenilənir. Sistem baxımından burada vacib olan vaxtlı sınaq imtahanları və hər şagirdin nəticələrinin tarixçəsidir.</p>

<h2>Uşaq Şagirdlərin Valideynləri</h2>
<p>Uşaqlar üçün dil kurslarında ödənişi və qərarı valideyn verir. Valideyn uşağın dərsə gəlib-gəlmədiyini, tapşırıqları edib-etmədiyini və sınaq nəticələrini görmək istəyir. Bu məlumat hər dəfə müəllimdən soruşulanda həm müəllimin vaxtı gedir, həm də valideyn narazı qalır. Valideyn kabineti bu problemi həll edir. Valideynlərlə işləmək və aylıq hesabat şablonları barədə ayrıca yazımız var: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>Ödənişlər: Aylıq və ya Paket</h2>
<p>Dil kurslarında iki model geniş yayılıb: <strong>aylıq haqq</strong> (hər ay sabit məbləğ) və <strong>səviyyə və ya dərs paketi</strong> (məsələn, bütün səviyyə üçün və ya müəyyən sayda dərs üçün əvvəlcədən ödəniş). Hansı modeli seçsəniz də, ödəniş tarixi, buraxılan dərslərin qaydası və təkrar səviyyənin şərtləri əvvəlcədən yazılı razılaşdırılmalıdır. Ən vacibi isə hər şagirdin ödəniş vəziyyətinin bir yerdə görünməsidir.</p>

<h2>Dəftər, WhatsApp və Excel: Tipik Problemlər</h2>
<table>
  <thead>
    <tr><th>Problem</th><th>Necə yaranır</th><th>Nəticə</th></tr>
  </thead>
  <tbody>
    <tr><td>Səviyyə tarixçəsi yoxdur</td><td>Səviyyə testi kağızda qalır, keçid qərarı yadda saxlanır</td><td>Şagirdin hansı səviyyədən gəldiyini və necə irəlilədiyini sübut etmək olmur</td></tr>
    <tr><td>Materiallar itir</td><td>Audio, PDF və dərs yazıları WhatsApp qruplarında paylaşılır</td><td>Yeni şagird köhnə materialları tapmır, linklər kənara yayılır</td></tr>
    <tr><td>Tapşırıqlar izlənmir</td><td>Esselər foto kimi göndərilir, kimin etdiyi qeyd olunmur</td><td>Səviyyə sonunda obyektiv qərar vermək çətindir</td></tr>
    <tr><td>Qruplar arasında qarışıqlıq</td><td>Şagird qrupu dəyişəndə Excel-də köhnə qeyd qalır</td><td>Davamiyyət və ödəniş səhv qrupa yazılır</td></tr>
    <tr><td>Ödəniş mübahisələri</td><td>Paketin neçə dərsinin qaldığı dəqiq bilinmir</td><td>Valideynlə "bu ayı ödəmişdik" mübahisəsi</td></tr>
  </tbody>
</table>
<p>WhatsApp, Excel və Google Classroom-un ümumi müqayisəsini <a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr</a> yazısında ətraflı vermişik.</p>

<h2>Nəyi Harada İzləmək Lazımdır?</h2>
<table>
  <thead>
    <tr><th>Nə izlənir</th><th>Nə vaxt</th><th>Harada saxlanmalıdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Səviyyə testi nəticəsi</td><td>Qəbul zamanı</td><td>Şagird kartında, test nəticəsi kimi</td></tr>
    <tr><td>Qrup və cədvəl</td><td>Qəbul və səviyyə keçidində</td><td>Qrup siyahısı və həftəlik cədvəldə</td></tr>
    <tr><td>Davamiyyət</td><td>Hər dərs</td><td>Qrupun davamiyyət jurnalında</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Hər həftə</td><td>Qrupun tapşırıqlar bölməsində, yoxlama qeydi ilə</td></tr>
    <tr><td>Aralıq və səviyyə sonu sınaqları</td><td>Səviyyə ərzində və sonunda</td><td>Sınaq nəticələrində, tarixçə ilə</td></tr>
    <tr><td>Dərs yazıları və materiallar</td><td>Hər dərsdən sonra</td><td>Yalnız həmin qrupa açıq bölmədə</td></tr>
    <tr><td>Ödəniş</td><td>Ayda bir və ya paket başında</td><td>Şagirdin ödəniş qeydində</td></tr>
  </tbody>
</table>

<h2>Müqayisə: Excel/WhatsApp, Google Classroom və Kursometr</h2>
<table>
  <thead>
    <tr><th>İmkan</th><th>Excel + WhatsApp</th><th>Google Classroom</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Qruplar və həftəlik cədvəl</td><td>Əl ilə, ayrı fayllarda</td><td>Sinif (class) var; ayrıca kurs cədvəli və davamiyyət jurnalı yoxdur</td><td>Fənn, qrup, həftəlik cədvəl və davamiyyət</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Foto və mesajla</td><td>Güclü tərəfidir: tapşırıq vermə, təhvil və qiymətləndirmə</td><td>Tapşırıqların verilməsi və yoxlanması</td></tr>
    <tr><td>Vaxtlı sınaq</td><td>Yoxdur</td><td>Google Forms ilə test qurmaq olar</td><td>Müəllimin saatında açılıb-bağlanan sınaqlar, qapalı suallar avtomatik yoxlanır</td></tr>
    <tr><td>Ödəniş izləmə</td><td>Excel-də əl ilə</td><td>Yoxdur</td><td>Tələbə ödənişlərinin izlənməsi</td></tr>
    <tr><td>Valideyn</td><td>Ayrı yazışma</td><td>Qəyyumlar üçün e-poçt xülasəsi var (bəzi hesab növlərində)</td><td>Davamiyyət, qiymət və sınaq nəticələri ilə valideyn kabineti</td></tr>
    <tr><td>Öz səhifəniz</td><td>Yoxdur</td><td>Yoxdur</td><td><em>adiniz.kursometr.com</em></td></tr>
  </tbody>
</table>
<p>Ədalətli olmaq lazımdır: Google Classroom tapşırıq vermək üçün yaxşı və tanış alətdir. Amma dil kursunun biznes tərəfi — ödənişlər, kursun öz cədvəli, davamiyyət jurnalı — orada yoxdur. Kursometr isə dərs və idarəetməni bir yerdə toplayır.</p>

<h2>Kursometr-də Dil Kursunu Necə Qurmaq Olar: Addım-addım</h2>
<ol>
  <li><strong>Səhifənizi açın.</strong> <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>-da Google hesabı ilə daxil olun və bir dəqiqəyə öz ünvanınızı yaradın: <em>adiniz.kursometr.com</em>. Qeydiyyat pulsuzdur.</li>
  <li><strong>Fənləri yaradın.</strong> Məsələn, "İngilis dili", "Rus dili", "Alman dili" və ya "IELTS hazırlığı".</li>
  <li><strong>Səviyyə üzrə qruplar açın.</strong> Qrup adına səviyyəni və vaxtı yazın: "A2 — B.e/Ç.a 18:00". Fərdi dərs üçün bir nəfərlik qrup açın.</li>
  <li><strong>Həftəlik cədvəli qurun</strong> və şagirdləri dəvət linki ilə qruplara qoşun.</li>
  <li><strong>Səviyyə testini hazırlayın.</strong> Kursometr-də ayrıca "avtomatik səviyyə təyini" funksiyası yoxdur, amma səviyyə testini adi vaxtlı sınaq kimi keçirmək olar: qapalı suallar avtomatik yoxlanır, nəticə sınaq bitən kimi hazır olur. Hazır test toplusunu PDF kimi yükləyərək sualları sual bazasına əlavə edə bilərsiniz. Danışıq hissəsini müəllim özü qiymətləndirir və şagirdi müvafiq qrupa yerləşdirir.</li>
  <li><strong>Davamiyyəti hər dərsdə qeyd edin.</strong></li>
  <li><strong>Ev tapşırıqlarını verin və yoxlayın</strong> — yazı, dinləmə, oxu tapşırıqları.</li>
  <li><strong>Dərs yazılarını və materialları yükləyin</strong> — onlar yalnız həmin qrupun şagirdlərinə görünür.</li>
  <li><strong>Aralıq və səviyyə sonu sınaqlarını planlaşdırın</strong> — sınaq təyin etdiyiniz saatda açılır və bağlanır.</li>
  <li><strong>Ödənişləri qeyd edin</strong> — kimin ödədiyi bir yerdə görünür.</li>
  <li><strong>Valideynləri qoşun</strong> — valideyn kabinetində uşağın davamiyyəti, qiymətləri və sınaq nəticələri görünür.</li>
  <li><strong>Köməkçi müəllim əlavə edin</strong> — mentor hesabı ilə, məsələn, danışıq klubunu aparan müəllim üçün.</li>
</ol>
<p>Bütün bölmələr telefon brauzerində tam işləyir — müəllim davamiyyəti dərs zamanı telefondan qeyd edə bilər. Tədris mərkəzinin ümumi idarəetməsi barədə: <a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">tədris mərkəzi üçün idarəetmə proqramı</a>; fərdi işləyən müəllimlər üçün: <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">repetitorlar üçün dərs idarəetmə proqramı</a>.</p>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Səviyyə adları (CEFR və ya öz mərhələləriniz) bütün müəllimlər üçün eynidir</li>
  <li>☐ Səviyyə testinin yazılı hissəsi və müsahibə qaydası hazırdır</li>
  <li>☐ Qruplar səviyyə və vaxt üzrə adlandırılıb</li>
  <li>☐ Davamiyyət hər dərsdə qeyd olunur</li>
  <li>☐ Ev tapşırıqları dörd bacarığı əhatə edir və izlənir</li>
  <li>☐ Aralıq və səviyyə sonu sınaqlarının tarixi və keçid meyarı elan olunub</li>
  <li>☐ Dərs yazıları yalnız qrupun şagirdlərinə açıqdır</li>
  <li>☐ Ödəniş modeli (aylıq və ya paket) yazılı razılaşdırılıb</li>
  <li>☐ Uşaq şagirdlərin valideynləri nəticələri görə bilir</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Dil kursu üçün idarəetmə proqramı nə etməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Səviyyə üzrə qrupları və həftəlik cədvəli, davamiyyəti, ev tapşırıqlarını, səviyyə testi və səviyyə sonu sınaqlarının nəticələrini, dərs materiallarını və ödənişləri bir yerdə saxlamalı, uşaq şagirdlərin valideynlərinə isə nəticələri görmək imkanı verməlidir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">CEFR səviyyələri nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">CEFR Avropa Şurasının hazırladığı Dillər üzrə Ümumavropa İstinad Çərçivəsidir. O, dil bilgisini altı səviyyəyə bölür: A1 və A2 (başlanğıc istifadəçi), B1 və B2 (müstəqil istifadəçi), C1 və C2 (səriştəli istifadəçi). Dil kurslarının çoxu qruplarını bu səviyyələrə görə adlandırır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Səviyyə testini onlayn keçirmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli, yazılı hissəni — qrammatika, lüğət, oxu və dinləmə üzrə qapalı sualları — vaxtlı onlayn test kimi keçirmək olar. Kursometr-də bu adi vaxtlı sınaq kimi qurulur və nəticə avtomatik hesablanır. Danışıq bacarığını isə qısa müsahibə ilə müəllim özü qiymətləndirir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google Classroom dil kursu üçün kifayətdirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tapşırıq vermək və yoxlamaq üçün Google Classroom yaxşı alətdir. Amma orada ödəniş izləmə, kursun öz həftəlik cədvəli və davamiyyət jurnalı yoxdur. Dil kursunun həm tədris, həm də idarəetmə tərəfini bir yerdə aparmaq üçün Kursometr kimi platforma daha uyğundur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Onlayn dərslərin yazılarını şagirdlərlə necə paylaşmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yazıları ümumi kanalda yox, yalnız həmin qrupun şagirdlərinə açıq bölmədə paylaşmaq lazımdır. Kursometr-də dərs yazıları və materiallar yalnız həmin qrupun tələbələrinə görünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr dil müəllimi üçün pulludurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr, müəllim qeydiyyatı pulsuzdur. Google hesabı ilə daxil olub bir dəqiqəyə öz səhifənizi (adiniz.kursometr.com) açır, qruplarınızı və cədvəlinizi qura bilərsiniz.</p>
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
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">Abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a></li>
  <li><a href="/blog-details/usaq-inkisaf-merkezi-ucun-idareetme-proqrami-2027">Uşaq inkişaf mərkəzi üçün idarəetmə proqramı</a></li>
</ul>

<h2>Nəticə</h2>
<p>Dil kursunun uğuru yalnız yaxşı dərsdən deyil, sistemdən də asılıdır: düzgün səviyyə testi, səviyyə və vaxt üzrə qruplar, dörd bacarığı əhatə edən tapşırıqlar, planlı səviyyə sınaqları, qorunan dərs materialları, valideynlər üçün şəffaflıq və aydın ödəniş qaydası. Bunları dəftər, WhatsApp və Excel arasında bölmək əvəzinə bir yerdə aparanda müəllim vaxtını idarəetməyə yox, tədrisə sərf edir.</p>
<p><strong>Dil kursunuzu bu gün qurun: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — qeydiyyat pulsuzdur. Ətraflı: <a href="/mehsullar/kursometr">Kursometr haqqında</a>. Kurs mərkəziniz üçün fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>A language course works differently from ordinary tutoring. When a student arrives, you first need to determine their level, then place them in the right group, check progress at the end of each level and move them up. On top of that come speaking practice, writing and listening assignments, recordings of online lessons, the parents of child learners, and monthly or package fees. Teachers and course centres teaching English, Russian, German or other languages often split all of this between a notebook, WhatsApp and Excel.</p>
<p>This article explains how to run a language course step by step: placement tests and CEFR levels, building groups, homework, end-of-level tests, online lessons, IELTS/TOEFL preparation, parents and fees. At the end we show how to set all of this up on one platform.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What should a language course track?</td><td>Each student's level, group, attendance, homework, level test results and payments</td></tr>
    <tr><td>How is the level determined?</td><td>With a placement test (written part) and a short oral interview at enrolment; the most widely used framework for levels is CEFR (A1–C2)</td></tr>
    <tr><td>How are groups built?</td><td>By level and suitable time; small groups work better for speaking practice</td></tr>
    <tr><td>When does a student move up a level?</td><td>Based on the end-of-level test, taking attendance and homework into account</td></tr>
    <tr><td>Where is it easiest to keep all this?</td><td>On a platform with groups, schedule, tests, homework, payments and a parent portal in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Why Does a Language Course Need Its Own Approach?</h2>
<p>A maths or chemistry tutor usually works to the school curriculum or an exam. In a language course the main unit is the <strong>level</strong>. Two students of the same age can be at completely different levels, while people of different ages can study in the same group. So managing a language course has to answer a few specific questions:</p>
<ul>
  <li>What level is a new student at, and which group should they join?</li>
  <li>Which group is at which level, and at what stage?</li>
  <li>How is the student progressing in the four skills — reading, writing, listening and speaking?</li>
  <li>Who is ready to finish the level, and who needs to repeat it?</li>
  <li>Whose payment is late, and whose package has run out?</li>
</ul>
<p>You can find these answers in a notebook, but once you have more than 30–40 students the work takes up a large share of the teacher's time after lessons.</p>

<h2>Placement Tests and CEFR Levels</h2>
<p>Most language courses name their levels according to the <strong>CEFR</strong> (Common European Framework of Reference for Languages). The framework was developed by the Council of Europe and divides language ability into six levels:</p>
<table>
  <thead>
    <tr><th>Level</th><th>Band</th><th>Short description</th></tr>
  </thead>
  <tbody>
    <tr><td>A1</td><td rowspan="2">Basic user</td><td>Understands simple everyday expressions, can introduce themselves and ask simple questions</td></tr>
    <tr><td>A2</td><td>Can communicate briefly and simply on familiar topics (family, shopping, work)</td></tr>
    <tr><td>B1</td><td rowspan="2">Independent user</td><td>Understands the main points on familiar topics, can handle most travel situations and write simple connected text</td></tr>
    <tr><td>B2</td><td>Understands the main ideas of complex texts and can talk with native speakers with a fair degree of fluency</td></tr>
    <tr><td>C1</td><td rowspan="2">Proficient user</td><td>Understands long, demanding texts and uses the language flexibly for study and work</td></tr>
    <tr><td>C2</td><td>Understands with ease virtually everything heard or read and expresses themselves precisely, with fine shades of meaning</td></tr>
  </tbody>
</table>
<p>Many courses split these levels into smaller stages (for example, A1.1 and A1.2) — that is the course's own choice. What matters is that level names mean the same thing across all groups and teachers.</p>
<p>A <strong>placement test</strong> usually has two parts: a written test with closed questions on grammar, vocabulary, reading and listening, and a short 5–10 minute conversation with a teacher. The written part can be run as a timed online test: the questions are marked automatically and the teacher sees the result immediately. The speaking level is assessed by the teacher — the test score and the interview together give the final level. More on this: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</p>

<h2>Groups: Level, Schedule and Size</h2>
<p>Groups should be built not only by level but also by time: school students come after school, working adults in the evening or at weekends. In practice a group name combines both, for example "B1 — Mon/Wed 19:00" or "A2 kids — Sat/Sun 11:00".</p>
<table>
  <thead>
    <tr><th>Format</th><th>Advantage</th><th>Watch out for</th></tr>
  </thead>
  <tbody>
    <tr><td>Small group</td><td>Every student gets time to speak; group dynamics keep people motivated</td><td>Levels must be close, otherwise weaker students fall behind and stronger ones get bored</td></tr>
    <tr><td>Large group</td><td>More students can be enrolled</td><td>Less speaking practice, homework is harder to check</td></tr>
    <tr><td>Individual lessons</td><td>A programme fully tailored to the student, flexible times</td><td>A separate schedule, attendance and payment record for one student</td></tr>
  </tbody>
</table>
<p>It is convenient to keep individual lessons in the system as a one-person group: schedule, attendance, homework and payment are then tracked the same way as for other groups.</p>

<h2>Speaking Practice and Homework</h2>
<p>A large part of learning a language happens outside the classroom. Homework should develop the four skills in balance:</p>
<ul>
  <li><strong>Writing:</strong> essays, letters, short texts on a topic. The teacher marks the mistakes and returns the work.</li>
  <li><strong>Listening:</strong> questions on audio or video material. Sharing the material on the group's own page keeps it from getting lost in WhatsApp.</li>
  <li><strong>Reading and vocabulary:</strong> text and word tests — these can be marked automatically with closed questions.</li>
  <li><strong>Speaking:</strong> mostly in class — pair and group work, role plays, topic discussions. If the teacher notes after each lesson who spoke little, they can give that student more turns next time.</li>
</ul>
<p>The main problem is not setting homework but <strong>tracking it</strong>: who did it, who didn't, who has received feedback. When homework is collected on the student's record, deciding at the end of the level becomes easier too.</p>

<h2>End-of-Level Test and Moving Up</h2>
<p>A test at the end of each level (or stage) shows whether a student is ready for the next one. For a fair decision, plan the test in advance:</p>
<ol>
  <li>Run one or two <strong>interim tests</strong> during the level so problems show up early.</li>
  <li>At the end of the level, run a <strong>general test</strong>: grammar, vocabulary, reading and listening with closed questions; writing and speaking assessed by the teacher.</li>
  <li>Announce the pass criteria in advance, for example a minimum score, attendance and completed homework.</li>
  <li>Based on the result, move the student to a group at the next level or offer to repeat the course.</li>
</ol>
<p>When the test is timed, the whole group writes it under the same conditions; when closed questions are marked automatically, the teacher does not spend hours checking paper.</p>

<h2>Online Lessons and Recordings</h2>
<p>Many language courses work in a mixed format: some groups online, some in person. A recording of an online lesson is useful for a student who missed it and for revision. But recordings and materials should be visible only to that group's students — a link shared in a public channel is risky both for privacy and for protecting the course's content.</p>

<h2>IELTS and TOEFL Preparation Groups</h2>
<p>Many language courses open preparation groups for international exams needed for study or work abroad. These differ from regular level groups: work follows the sections of the exam format, timed mock exams are held often, and each student has a different target result. For the exam format, scoring scale and requirements, refer only to the official sources — <a href="https://www.ielts.org/" rel="noopener" target="_blank">ielts.org</a> and <a href="https://www.ets.org/toefl.html" rel="noopener" target="_blank">ets.org</a> — because formats are updated from time to time. From a systems point of view, what matters here is timed mock exams and a history of each student's results.</p>

<h2>Parents of Child Learners</h2>
<p>In language courses for children, the parent pays and decides. Parents want to see whether their child attended, did the homework and how they did in tests. When they have to ask the teacher every time, the teacher loses time and the parent is left unsatisfied. A parent portal solves this. We have a separate article on working with parents and monthly report templates: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>Fees: Monthly or Package</h2>
<p>Two models are common in language courses: a <strong>monthly fee</strong> (a fixed amount each month) and a <strong>level or lesson package</strong> (for example, paying in advance for a whole level or a set number of lessons). Whichever you choose, the payment date, the rule for missed lessons and the terms for repeating a level should be agreed in writing in advance. Most importantly, each student's payment status should be visible in one place.</p>

<h2>Notebook, WhatsApp and Excel: Typical Problems</h2>
<table>
  <thead>
    <tr><th>Problem</th><th>How it arises</th><th>Result</th></tr>
  </thead>
  <tbody>
    <tr><td>No level history</td><td>The placement test stays on paper, the decision to move up is kept in memory</td><td>You cannot show which level a student started from and how they progressed</td></tr>
    <tr><td>Lost materials</td><td>Audio, PDFs and lesson recordings are shared in WhatsApp groups</td><td>New students cannot find older materials, links spread outside the group</td></tr>
    <tr><td>Homework not tracked</td><td>Essays are sent as photos, nobody records who did them</td><td>An objective decision at the end of the level is hard</td></tr>
    <tr><td>Confusion between groups</td><td>When a student changes group, the old entry stays in Excel</td><td>Attendance and payments are recorded under the wrong group</td></tr>
    <tr><td>Payment disputes</td><td>Nobody knows exactly how many lessons are left in a package</td><td>"We already paid this month" disputes with parents</td></tr>
  </tbody>
</table>
<p>We gave a detailed general comparison of WhatsApp, Excel and Google Classroom in <a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr</a>.</p>

<h2>What to Track and Where</h2>
<table>
  <thead>
    <tr><th>What</th><th>When</th><th>Where it should be kept</th></tr>
  </thead>
  <tbody>
    <tr><td>Placement test result</td><td>At enrolment</td><td>On the student's record, as a test result</td></tr>
    <tr><td>Group and schedule</td><td>At enrolment and when moving up a level</td><td>In the group list and the weekly schedule</td></tr>
    <tr><td>Attendance</td><td>Every lesson</td><td>In the group's attendance register</td></tr>
    <tr><td>Homework</td><td>Every week</td><td>In the group's homework section, with a checked mark</td></tr>
    <tr><td>Interim and end-of-level tests</td><td>During and at the end of the level</td><td>In test results, with history</td></tr>
    <tr><td>Lesson recordings and materials</td><td>After each lesson</td><td>In a section open only to that group</td></tr>
    <tr><td>Payment</td><td>Monthly or at the start of a package</td><td>In the student's payment record</td></tr>
  </tbody>
</table>

<h2>Comparison: Excel/WhatsApp, Google Classroom and Kursometr</h2>
<table>
  <thead>
    <tr><th>Feature</th><th>Excel + WhatsApp</th><th>Google Classroom</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Groups and weekly schedule</td><td>Manual, in separate files</td><td>Has classes; no separate course timetable or attendance register</td><td>Subjects, groups, weekly schedule and attendance</td></tr>
    <tr><td>Homework</td><td>Via photos and messages</td><td>Its strength: assigning, handing in and grading</td><td>Assigning and checking homework</td></tr>
    <tr><td>Timed tests</td><td>None</td><td>Quizzes can be built with Google Forms</td><td>Tests that open and close at the teacher's set time, closed questions marked automatically</td></tr>
    <tr><td>Payment tracking</td><td>Manually in Excel</td><td>None</td><td>Student payment tracking</td></tr>
    <tr><td>Parents</td><td>Separate chats</td><td>Email summaries for guardians (on some account types)</td><td>Parent portal with attendance, grades and test results</td></tr>
    <tr><td>Your own page</td><td>None</td><td>None</td><td><em>yourname.kursometr.com</em></td></tr>
  </tbody>
</table>
<p>To be fair: Google Classroom is a good and familiar tool for assignments. But the business side of a language course — payments, the course's own timetable, an attendance register — is not there. Kursometr brings teaching and management together in one place.</p>

<h2>How to Set Up a Language Course in Kursometr: Step by Step</h2>
<ol>
  <li><strong>Open your page.</strong> Sign in at <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> with your Google account and create your own address in a minute: <em>yourname.kursometr.com</em>. Sign-up is free.</li>
  <li><strong>Create subjects.</strong> For example, "English", "Russian", "German" or "IELTS preparation".</li>
  <li><strong>Open groups by level.</strong> Put the level and time in the group name: "A2 — Mon/Wed 18:00". For individual lessons, open a one-person group.</li>
  <li><strong>Set up the weekly schedule</strong> and add students to groups via an invitation link.</li>
  <li><strong>Prepare the placement test.</strong> Kursometr has no separate "automatic level placement" feature, but a placement test can be run as a regular timed test: closed questions are marked automatically and the result is ready as soon as the test ends. You can upload a ready test collection as a PDF to add its questions to the question bank. The teacher assesses the speaking part and places the student in the right group.</li>
  <li><strong>Record attendance at every lesson.</strong></li>
  <li><strong>Assign and check homework</strong> — writing, listening and reading tasks.</li>
  <li><strong>Upload lesson recordings and materials</strong> — they are visible only to that group's students.</li>
  <li><strong>Schedule interim and end-of-level tests</strong> — each test opens and closes at the time you set.</li>
  <li><strong>Record payments</strong> — who has paid is visible in one place.</li>
  <li><strong>Connect parents</strong> — the parent portal shows the child's attendance, grades and test results.</li>
  <li><strong>Add an assistant teacher</strong> — with a mentor account, for example for the teacher running a speaking club.</li>
</ol>
<p>All sections work fully in a phone browser — a teacher can record attendance from their phone during the lesson. On overall management of a training centre: <a href="/blog-details/training-centre-management-software-2026">training centre management software</a>; for teachers working on their own: <a href="/blog-details/tutor-class-management-software-2026">class management software for tutors</a>.</p>

<h2>Checklist</h2>
<ul>
  <li>☐ Level names (CEFR or your own stages) are the same for all teachers</li>
  <li>☐ The written part of the placement test and the interview procedure are ready</li>
  <li>☐ Groups are named by level and time</li>
  <li>☐ Attendance is recorded at every lesson</li>
  <li>☐ Homework covers all four skills and is tracked</li>
  <li>☐ Dates of interim and end-of-level tests and pass criteria are announced</li>
  <li>☐ Lesson recordings are open only to the group's students</li>
  <li>☐ The fee model (monthly or package) is agreed in writing</li>
  <li>☐ Parents of child learners can see results</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What should language course management software do?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">It should keep groups by level and the weekly schedule, attendance, homework, placement and end-of-level test results, lesson materials and payments in one place, and let the parents of child learners see results.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What are CEFR levels?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">CEFR is the Common European Framework of Reference for Languages, developed by the Council of Europe. It divides language ability into six levels: A1 and A2 (basic user), B1 and B2 (independent user), C1 and C2 (proficient user). Most language courses name their groups by these levels.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can a placement test be run online?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes, the written part — closed questions on grammar, vocabulary, reading and listening — can be run as a timed online test. In Kursometr it is set up as a regular timed test and the result is calculated automatically. Speaking is assessed by the teacher in a short interview.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Google Classroom enough for a language course?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google Classroom is a good tool for setting and checking assignments. But it has no payment tracking, no course timetable of its own and no attendance register. To run both the teaching and the management side of a language course in one place, a platform like Kursometr is a better fit.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can online lesson recordings be shared with students?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Recordings should be shared not in a public channel but in a section open only to that group's students. In Kursometr, lesson recordings and materials are visible only to the students of that group.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Kursometr paid for language teachers?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No, teacher sign-up is free. You sign in with a Google account, open your own page (yourname.kursometr.com) in a minute and set up your groups and schedule.</p>
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
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/exam-prep-course-centre-management-2027">How to run an exam-prep course centre</a></li>
  <li><a href="/blog-details/management-software-for-kids-development-centres-2027">Management software for kids' development centres</a></li>
</ul>

<h2>Conclusion</h2>
<p>A language course succeeds not only through good lessons but through a system: a proper placement test, groups by level and time, homework covering all four skills, planned level tests, protected lesson materials, transparency for parents and clear payment rules. When you keep all this in one place instead of splitting it between a notebook, WhatsApp and Excel, the teacher spends time on teaching rather than administration.</p>
<p><strong>Set up your language course today: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — sign-up is free. More details: <a href="/mehsullar/kursometr">about Kursometr</a>. If your course centre needs a custom system, <a href="/contact">contact us</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Языковые курсы устроены иначе, чем обычное репетиторство. Когда приходит ученик, сначала нужно определить его уровень, затем распределить в подходящую группу, в конце каждого уровня проверить прогресс и перевести на следующий. К этому добавляются разговорная практика, письменные задания и аудирование, записи онлайн-уроков, родители учеников-детей и ежемесячная или пакетная оплата. Преподаватели и учебные центры, которые учат английскому, русскому, немецкому или другим языкам, часто разносят всё это между тетрадью, WhatsApp и Excel.</p>
<p>В этой статье пошагово разбираем управление языковыми курсами: тест уровня и уровни CEFR, формирование групп, домашние задания, тесты в конце уровня, онлайн-уроки, подготовку к IELTS/TOEFL, работу с родителями и оплату. В конце показываем, как собрать всё это на одной платформе.</p>

<h2>Короткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Что нужно отслеживать на языковых курсах?</td><td>Уровень ученика, группу, посещаемость, домашние задания, результаты тестов уровня и оплату</td></tr>
    <tr><td>Как определяется уровень?</td><td>Тестом уровня (письменная часть) и коротким устным собеседованием при записи; самая распространённая система уровней — CEFR (A1–C2)</td></tr>
    <tr><td>Как формировать группы?</td><td>По уровню и удобному времени; для разговорной практики эффективнее небольшие группы</td></tr>
    <tr><td>Когда ученик переходит на следующий уровень?</td><td>По итогам теста в конце уровня, с учётом посещаемости и домашних заданий</td></tr>
    <tr><td>Где удобнее всё это вести?</td><td>На платформе, где группы, расписание, тесты, задания, оплата и кабинет родителя собраны в одном месте — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Почему языковым курсам нужен отдельный подход?</h2>
<p>Репетитор по математике или химии обычно работает по школьной программе или под экзамен. На языковых курсах главная единица — <strong>уровень</strong>. Два ученика одного возраста могут быть на совершенно разных уровнях, а в одной группе могут заниматься люди разного возраста. Поэтому управление языковыми курсами должно отвечать на несколько особых вопросов:</p>
<ul>
  <li>Какой уровень у нового ученика и в какую группу его записать?</li>
  <li>Какая группа на каком уровне и на каком этапе?</li>
  <li>Как ученик продвигается в четырёх навыках — чтении, письме, аудировании и говорении?</li>
  <li>Кто готов завершить уровень, а кому нужно его повторить?</li>
  <li>У кого просрочена оплата и у кого закончился пакет?</li>
</ul>
<p>Ответы можно найти и в тетради, но когда учеников больше 30–40, эта работа отнимает у преподавателя значительную часть времени после уроков.</p>

<h2>Тест уровня и уровни CEFR</h2>
<p>Большинство языковых курсов называют уровни по <strong>CEFR</strong> (Common European Framework of Reference for Languages — Общеевропейские компетенции владения иностранным языком). Эту систему разработал Совет Европы, и она делит владение языком на шесть уровней:</p>
<table>
  <thead>
    <tr><th>Уровень</th><th>Группа</th><th>Краткое описание</th></tr>
  </thead>
  <tbody>
    <tr><td>A1</td><td rowspan="2">Элементарное владение</td><td>Понимает простые бытовые выражения, может представиться и задать простые вопросы</td></tr>
    <tr><td>A2</td><td>Кратко и просто общается на знакомые темы (семья, покупки, работа)</td></tr>
    <tr><td>B1</td><td rowspan="2">Самостоятельное владение</td><td>Понимает основное на знакомые темы, справляется с большинством ситуаций в поездке, пишет простой связный текст</td></tr>
    <tr><td>B2</td><td>Понимает основные идеи сложных текстов, довольно свободно говорит с носителями языка</td></tr>
    <tr><td>C1</td><td rowspan="2">Свободное владение</td><td>Понимает длинные сложные тексты, гибко использует язык в учёбе и работе</td></tr>
    <tr><td>C2</td><td>Легко понимает практически всё услышанное и прочитанное, выражает мысли точно, с тонкими оттенками смысла</td></tr>
  </tbody>
</table>
<p>Многие курсы делят эти уровни на более мелкие этапы (например, A1.1 и A1.2) — это решение самого курса. Важно, чтобы названия уровней значили одно и то же во всех группах и у всех преподавателей.</p>
<p><strong>Тест уровня</strong> обычно состоит из двух частей: письменного теста с закрытыми вопросами по грамматике, лексике, чтению и аудированию и короткой беседы с преподавателем на 5–10 минут. Письменную часть можно провести как онлайн-тест на время: вопросы проверяются автоматически, и преподаватель сразу видит результат. Разговорный уровень оценивает сам преподаватель — балл теста и собеседование вместе дают итоговый уровень. Подробнее: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</p>

<h2>Группы: уровень, расписание и размер</h2>
<p>Группы нужно формировать не только по уровню, но и по времени: школьники приходят после уроков, работающие — вечером или в выходные. На практике название группы объединяет обе вещи, например «B1 — Пн/Ср 19:00» или «A2 дети — Сб/Вс 11:00».</p>
<table>
  <thead>
    <tr><th>Формат</th><th>Плюс</th><th>На что обратить внимание</th></tr>
  </thead>
  <tbody>
    <tr><td>Небольшая группа</td><td>Каждому ученику хватает времени говорить, групповая динамика мотивирует</td><td>Уровни должны быть близкими, иначе слабый отстаёт, а сильному скучно</td></tr>
    <tr><td>Большая группа</td><td>Можно принять больше учеников</td><td>Меньше разговорной практики, сложнее проверять домашние задания</td></tr>
    <tr><td>Индивидуальные занятия</td><td>Программа полностью под ученика, гибкое время</td><td>Отдельное расписание, посещаемость и учёт оплаты для одного ученика</td></tr>
  </tbody>
</table>
<p>Индивидуальные занятия удобно вести в системе как группу из одного человека: расписание, посещаемость, задания и оплата учитываются так же, как в остальных группах.</p>

<h2>Разговорная практика и домашние задания</h2>
<p>Большая часть изучения языка происходит вне класса. Домашние задания должны сбалансированно развивать четыре навыка:</p>
<ul>
  <li><strong>Письмо:</strong> эссе, письма, короткие тексты на тему. Преподаватель отмечает ошибки и возвращает работу.</li>
  <li><strong>Аудирование:</strong> вопросы по аудио- или видеоматериалу. Если выкладывать материал на странице группы, он не потеряется в WhatsApp.</li>
  <li><strong>Чтение и лексика:</strong> тесты по тексту и словам — их можно проверять автоматически с закрытыми вопросами.</li>
  <li><strong>Говорение:</strong> в основном на уроке — работа в парах и группах, ролевые игры, обсуждения. Если после каждого урока отмечать, кто говорил мало, на следующем занятии ему можно дать больше слова.</li>
</ul>
<p>Главная проблема не в том, чтобы задать задание, а в том, чтобы его <strong>отслеживать</strong>: кто сделал, кто нет, кому написан отзыв. Когда задания собраны в карточке ученика, проще принять решение и в конце уровня.</p>

<h2>Тест в конце уровня и переход на следующий</h2>
<p>Тест в конце каждого уровня (или этапа) показывает, готов ли ученик к следующему. Для справедливого решения спланируйте тест заранее:</p>
<ol>
  <li>Проведите один-два <strong>промежуточных теста</strong> в течение уровня, чтобы проблемы были видны рано.</li>
  <li>В конце уровня проведите <strong>общий тест</strong>: грамматика, лексика, чтение и аудирование — закрытыми вопросами, письмо и говорение оценивает преподаватель.</li>
  <li>Заранее объявите критерии перехода, например минимальный балл, посещаемость и выполнение заданий.</li>
  <li>По результату переведите ученика в группу следующего уровня или предложите повторить курс.</li>
</ol>
<p>Когда тест на время, вся группа пишет его в одинаковых условиях, а когда закрытые вопросы проверяются автоматически, преподаватель не тратит часы на проверку бумаги.</p>

<h2>Онлайн-уроки и записи</h2>
<p>Многие языковые курсы работают в смешанном формате: одни группы онлайн, другие очно. Запись онлайн-урока полезна тому, кто его пропустил, и для повторения. Но записи и материалы должны быть видны только ученикам этой группы — ссылка в общем канале рискованна и с точки зрения конфиденциальности, и для защиты содержания курса.</p>

<h2>Группы подготовки к IELTS и TOEFL</h2>
<p>Многие языковые курсы открывают группы подготовки к международным экзаменам, нужным для учёбы или работы за рубежом. Они отличаются от обычных групп по уровням: работа идёт по разделам формата экзамена, часто проводятся пробные экзамены на время, а целевой результат у каждого ученика свой. О формате экзамена, шкале баллов и требованиях ориентируйтесь только на официальные источники — <a href="https://www.ielts.org/" rel="noopener" target="_blank">ielts.org</a> и <a href="https://www.ets.org/toefl.html" rel="noopener" target="_blank">ets.org</a>, — поскольку форматы периодически обновляются. С точки зрения системы здесь важны пробные экзамены на время и история результатов каждого ученика.</p>

<h2>Родители учеников-детей</h2>
<p>На языковых курсах для детей платит и принимает решения родитель. Родитель хочет видеть, пришёл ли ребёнок на урок, сделал ли задания и как написал тесты. Когда каждый раз приходится спрашивать преподавателя, преподаватель теряет время, а родитель остаётся недоволен. Эту проблему решает кабинет родителя. О работе с родителями и шаблонах ежемесячных отчётов у нас есть отдельная статья: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>Оплата: ежемесячно или пакетом</h2>
<p>На языковых курсах распространены две модели: <strong>ежемесячная плата</strong> (фиксированная сумма каждый месяц) и <strong>пакет за уровень или занятия</strong> (например, предоплата за весь уровень или за определённое число занятий). Какую бы модель вы ни выбрали, дату оплаты, правило для пропущенных занятий и условия повторного прохождения уровня нужно заранее согласовать письменно. И главное — статус оплаты каждого ученика должен быть виден в одном месте.</p>

<h2>Тетрадь, WhatsApp и Excel: типичные проблемы</h2>
<table>
  <thead>
    <tr><th>Проблема</th><th>Как возникает</th><th>Результат</th></tr>
  </thead>
  <tbody>
    <tr><td>Нет истории уровней</td><td>Тест уровня остаётся на бумаге, решение о переходе — в памяти</td><td>Невозможно показать, с какого уровня ученик начал и как продвигался</td></tr>
    <tr><td>Материалы теряются</td><td>Аудио, PDF и записи уроков выкладываются в группы WhatsApp</td><td>Новый ученик не находит старые материалы, ссылки расходятся за пределы группы</td></tr>
    <tr><td>Задания не отслеживаются</td><td>Эссе присылают фотографией, кто сделал — не отмечается</td><td>В конце уровня трудно принять объективное решение</td></tr>
    <tr><td>Путаница между группами</td><td>Ученик сменил группу, а в Excel осталась старая запись</td><td>Посещаемость и оплата записываются не в ту группу</td></tr>
    <tr><td>Споры об оплате</td><td>Точно неизвестно, сколько занятий осталось в пакете</td><td>Споры с родителями «мы же оплатили этот месяц»</td></tr>
  </tbody>
</table>
<p>Подробное общее сравнение WhatsApp, Excel и Google Classroom мы привели в статье <a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr</a>.</p>

<h2>Что и где отслеживать</h2>
<table>
  <thead>
    <tr><th>Что</th><th>Когда</th><th>Где хранить</th></tr>
  </thead>
  <tbody>
    <tr><td>Результат теста уровня</td><td>При записи</td><td>В карточке ученика, как результат теста</td></tr>
    <tr><td>Группа и расписание</td><td>При записи и при переходе на новый уровень</td><td>В списке группы и недельном расписании</td></tr>
    <tr><td>Посещаемость</td><td>Каждое занятие</td><td>В журнале посещаемости группы</td></tr>
    <tr><td>Домашние задания</td><td>Каждую неделю</td><td>В разделе заданий группы, с отметкой о проверке</td></tr>
    <tr><td>Промежуточные тесты и тест в конце уровня</td><td>В течение и в конце уровня</td><td>В результатах тестов, с историей</td></tr>
    <tr><td>Записи уроков и материалы</td><td>После каждого урока</td><td>В разделе, открытом только для этой группы</td></tr>
    <tr><td>Оплата</td><td>Раз в месяц или в начале пакета</td><td>В учёте оплат ученика</td></tr>
  </tbody>
</table>

<h2>Сравнение: Excel/WhatsApp, Google Classroom и Kursometr</h2>
<table>
  <thead>
    <tr><th>Возможность</th><th>Excel + WhatsApp</th><th>Google Classroom</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Группы и недельное расписание</td><td>Вручную, в разных файлах</td><td>Есть курсы (классы); нет отдельного расписания курсов и журнала посещаемости</td><td>Предметы, группы, недельное расписание и посещаемость</td></tr>
    <tr><td>Домашние задания</td><td>Фото и сообщения</td><td>Сильная сторона: выдача, сдача и оценивание заданий</td><td>Выдача и проверка заданий</td></tr>
    <tr><td>Тесты на время</td><td>Нет</td><td>Тесты можно собрать в Google Forms</td><td>Тесты открываются и закрываются в заданное преподавателем время, закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Учёт оплат</td><td>Вручную в Excel</td><td>Нет</td><td>Учёт оплат учеников</td></tr>
    <tr><td>Родители</td><td>Отдельная переписка</td><td>Сводки по email для опекунов (в некоторых типах аккаунтов)</td><td>Кабинет родителя с посещаемостью, оценками и результатами тестов</td></tr>
    <tr><td>Своя страница</td><td>Нет</td><td>Нет</td><td><em>vashe-imya.kursometr.com</em></td></tr>
  </tbody>
</table>
<p>Будем честны: Google Classroom — хороший и привычный инструмент для заданий. Но деловой стороны языковых курсов — оплаты, собственного расписания, журнала посещаемости — в нём нет. Kursometr объединяет обучение и управление в одном месте.</p>

<h2>Как настроить языковые курсы в Kursometr: пошагово</h2>
<ol>
  <li><strong>Откройте свою страницу.</strong> Войдите на <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> через аккаунт Google и за минуту создайте свой адрес: <em>vashe-imya.kursometr.com</em>. Регистрация бесплатна.</li>
  <li><strong>Создайте предметы.</strong> Например, «Английский язык», «Русский язык», «Немецкий язык» или «Подготовка к IELTS».</li>
  <li><strong>Откройте группы по уровням.</strong> Укажите в названии группы уровень и время: «A2 — Пн/Ср 18:00». Для индивидуальных занятий откройте группу из одного человека.</li>
  <li><strong>Настройте недельное расписание</strong> и добавьте учеников в группы по ссылке-приглашению.</li>
  <li><strong>Подготовьте тест уровня.</strong> Отдельной функции «автоматического определения уровня» в Kursometr нет, но тест уровня можно провести как обычный тест на время: закрытые вопросы проверяются автоматически, результат готов сразу после окончания теста. Готовый сборник тестов можно загрузить в PDF, и его вопросы добавятся в банк вопросов. Разговорную часть оценивает преподаватель и распределяет ученика в нужную группу.</li>
  <li><strong>Отмечайте посещаемость на каждом занятии.</strong></li>
  <li><strong>Выдавайте и проверяйте домашние задания</strong> — письмо, аудирование, чтение.</li>
  <li><strong>Загружайте записи уроков и материалы</strong> — их видят только ученики этой группы.</li>
  <li><strong>Планируйте промежуточные тесты и тесты в конце уровня</strong> — тест открывается и закрывается в заданное вами время.</li>
  <li><strong>Отмечайте оплаты</strong> — кто оплатил, видно в одном месте.</li>
  <li><strong>Подключите родителей</strong> — в кабинете родителя видны посещаемость, оценки и результаты тестов ребёнка.</li>
  <li><strong>Добавьте помощника</strong> — через аккаунт ментора, например для преподавателя, который ведёт разговорный клуб.</li>
</ol>
<p>Все разделы полностью работают в браузере телефона — преподаватель может отмечать посещаемость с телефона прямо на уроке. Об общем управлении учебным центром: <a href="/blog-details/programma-dlya-uchebnogo-centra-2026">программа для учебного центра</a>; для преподавателей, работающих самостоятельно: <a href="/blog-details/programma-dlya-repetitorov-2026">программа для репетиторов</a>.</p>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Названия уровней (CEFR или ваши этапы) одинаковы для всех преподавателей</li>
  <li>☐ Письменная часть теста уровня и порядок собеседования готовы</li>
  <li>☐ Группы названы по уровню и времени</li>
  <li>☐ Посещаемость отмечается на каждом занятии</li>
  <li>☐ Домашние задания охватывают четыре навыка и отслеживаются</li>
  <li>☐ Даты промежуточных и итоговых тестов уровня и критерии перехода объявлены</li>
  <li>☐ Записи уроков открыты только ученикам группы</li>
  <li>☐ Модель оплаты (ежемесячно или пакетом) согласована письменно</li>
  <li>☐ Родители учеников-детей видят результаты</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что должна уметь программа для языковых курсов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Хранить в одном месте группы по уровням и недельное расписание, посещаемость, домашние задания, результаты теста уровня и тестов в конце уровня, учебные материалы и оплату, а также давать родителям учеников-детей возможность видеть результаты.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое уровни CEFR?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">CEFR — Общеевропейские компетенции владения иностранным языком, система, разработанная Советом Европы. Она делит владение языком на шесть уровней: A1 и A2 (элементарное владение), B1 и B2 (самостоятельное владение), C1 и C2 (свободное владение). Большинство языковых курсов называют группы по этим уровням.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли провести тест уровня онлайн?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да, письменную часть — закрытые вопросы по грамматике, лексике, чтению и аудированию — можно провести как онлайн-тест на время. В Kursometr он настраивается как обычный тест на время, а результат считается автоматически. Говорение преподаватель оценивает сам на коротком собеседовании.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Достаточно ли Google Classroom для языковых курсов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google Classroom — хороший инструмент для выдачи и проверки заданий. Но в нём нет учёта оплат, собственного расписания курсов и журнала посещаемости. Чтобы вести и учебную, и управленческую часть языковых курсов в одном месте, лучше подходит платформа вроде Kursometr.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как делиться записями онлайн-уроков с учениками?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Записи стоит выкладывать не в общем канале, а в разделе, открытом только ученикам этой группы. В Kursometr записи уроков и материалы видны только ученикам соответствующей группы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Платный ли Kursometr для преподавателя языка?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет, регистрация преподавателя бесплатна. Вы входите через аккаунт Google, за минуту открываете свою страницу (vashe-imya.kursometr.com) и настраиваете группы и расписание.</p>
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
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">Как управлять курсами подготовки к экзаменам</a></li>
  <li><a href="/blog-details/programma-dlya-detskogo-razvivayushchego-centra-2027">Программа для детского развивающего центра</a></li>
</ul>

<h2>Итог</h2>
<p>Успех языковых курсов зависит не только от хороших уроков, но и от системы: правильный тест уровня, группы по уровню и времени, задания на все четыре навыка, плановые тесты уровня, защищённые учебные материалы, прозрачность для родителей и понятные правила оплаты. Когда всё это ведётся в одном месте, а не разносится между тетрадью, WhatsApp и Excel, преподаватель тратит время на обучение, а не на администрирование.</p>
<p><strong>Настройте свои языковые курсы уже сегодня: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — регистрация бесплатна. Подробнее: <a href="/mehsullar/kursometr">о Kursometr</a>. Если вашему учебному центру нужна индивидуальная система, <a href="/kontakty">свяжитесь с нами</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'dil-kursu-ucun-idareetme-proqrami-2027'],
            [
                'slug_en' => 'language-course-management-software-2027',
                'slug_ru' => 'programma-dlya-yazykovyh-kursov-2027',

                'title_az' => 'Dil Kursu üçün İdarəetmə Proqramı: Səviyyə Testi, Qruplar, Davamiyyət, Ev Tapşırığı və Ödənişlər (2027)',
                'title_en' => 'Language Course Management Software: Placement Tests, Groups, Attendance, Homework and Fees (2027)',
                'title_ru' => 'Программа для языковых курсов: тест уровня, группы, посещаемость, домашние задания и оплата (2027)',

                'review_az' => 'İngilis, rus, alman və digər dil kursları üçün: CEFR səviyyələri və səviyyə testi, səviyyə və vaxt üzrə qruplar, danışıq və ev tapşırıqları, səviyyə sonu sınağı, onlayn dərs yazıları, IELTS/TOEFL qrupları, valideynlər, ödənişlər və Kursometr-də addım-addım qurulum.',
                'review_en' => 'For English, Russian, German and other language courses: CEFR levels and placement tests, groups by level and schedule, speaking and homework, end-of-level tests, online lesson recordings, IELTS/TOEFL groups, parents, fees and a step-by-step setup in Kursometr.',
                'review_ru' => 'Для курсов английского, русского, немецкого и других языков: уровни CEFR и тест уровня, группы по уровню и расписанию, разговорная практика и домашние задания, тест в конце уровня, записи онлайн-уроков, группы IELTS/TOEFL, родители, оплата и пошаговая настройка в Kursometr.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '3 Noyabr 2026',
                'date_en' => 'November 3, 2026',
                'date_ru' => '3 Ноября 2026',

                'photo'    => 'cover-language-course-az.png',
                'photo_en' => 'cover-language-course-en.png',
                'photo_ru' => 'cover-language-course-ru.png',

                'meta_title_az' => 'Dil Kursu üçün İdarəetmə Proqramı 2027 | RS Code',
                'meta_title_en' => 'Language Course Management Software 2027 | RS Code',
                'meta_title_ru' => 'Программа для языковых курсов 2027 | RS Code',

                'meta_description_az' => 'Dil kursu üçün proqram: CEFR səviyyə testi, səviyyə üzrə qruplar, davamiyyət, ev tapşırığı, səviyyə sınaqları, valideyn kabineti və ödəniş izləmə. Kursometr-də pulsuz qurun.',
                'meta_description_en' => 'Language course software: CEFR placement tests, groups by level, attendance, homework, level tests, a parent portal and fee tracking. Set it up free in Kursometr.',
                'meta_description_ru' => 'Программа для языковых курсов: тест уровня по CEFR, группы по уровням, посещаемость, домашние задания, тесты уровня, кабинет родителя и учёт оплат. Бесплатно в Kursometr.',

                'meta_keywords_az' => 'dil kursu proqramı, dil kursu idarəetmə, ingilis dili kursu, səviyyə testi, CEFR, dil müəllimi, IELTS hazırlığı, kursometr, 2027',
                'meta_keywords_en' => 'language course software, language school management, English course, placement test, CEFR, language teacher, IELTS preparation, kursometr, 2027',
                'meta_keywords_ru' => 'программа для языковых курсов, управление языковой школой, курсы английского, тест уровня, CEFR, преподаватель языка, подготовка к IELTS, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
