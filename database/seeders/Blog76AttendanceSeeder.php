<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #76 — Elektron davamiyyət uçotu: kurs mərkəzi və repetitor üçün kağız jurnal, Excel/WhatsApp, yoxsa Kursometr (2027).
 * Kursometr faktları yalnız resources/lang/az/products.php və #70/#75 ilə eynidir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət qeydi,
 * vaxtlı sınaqlar (təyin olunan saatda açılıb-bağlanır, qapalı suallar avtomatik), PDF test toplusu → sual bazası, ev tapşırığı, ödəniş izləmə,
 * valideyn kabineti (davamiyyət, qiymətlər, sınaq nəticələri), mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar,
 * telefon brauzeri, Google ilə giriş, pulsuz müəllim qeydiyyatı.
 * Kursometr-də "gecikdi" statusu, avtomatik borc hesablanması, davamiyyət ↔ ödəniş avtomatik bağlantısı, SMS/bildiriş, onlayn ödəniş,
 * QR/biometrik giriş, son tarix İDDİA EDİLMİR. Gecikmə, kompensasiya dərsi və ödəniş qaydaları mərkəzin öz siyasəti kimi təqdim olunur.
 * Davamiyyətə dair hüquqi tələblər və bazar statistikası verilmir. Çox filiallı / fərdi sistem → /elaqe.
 */
class Blog76AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Ay sonudur. Valideyn zəng edir: "Bu ay niyə tam məbləğ? Uşaq iki dərsə gəlməyib." Müəllim dəftəri vərəqləyir, administrator Excel faylını açır, WhatsApp qrupunda köhnə mesajlar axtarılır — və məlum olur ki, bir dərs qeyd olunmayıb, digəri isə başqa qrupun səhifəsinə yazılıb. Söhbət gərginləşir, hər iki tərəf özünü haqlı sayır. Kurs mərkəzlərində və repetitorlarda mübahisələrin böyük hissəsi məhz buradan başlayır: davamiyyət var, amma etibarlı uçotu yoxdur.</p>
<p>Bu yazı kurs mərkəzi rəhbərləri, administratorlar, müəllimlər və repetitorlar üçündür. 2027-ci il üçün davamiyyət uçotunu necə qurmağı izah edirik: niyə vacibdir, kağız jurnal, Excel/WhatsApp və <a href="/mehsullar/kursometr">Kursometr</a> kimi platformanın fərqi, qrup və cədvəlin qurulması, hər dərsdə qeyd, valideynin nəyi görməsi, davamiyyətlə ödənişin əlaqəsi, gecikmə və kompensasiya dərsi qaydaları. Sonda yoxlama siyahısı var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Davamiyyət niyə vacibdir?</td><td>Buraxılan dərsləri vaxtında görmək, ödəniş mübahisələrinin qarşısını almaq, valideyn etibarını qorumaq və müəllimin vaxtına qənaət etmək üçün</td></tr>
    <tr><td>Ən sadə qayda nədir?</td><td>Davamiyyət hər dərsdə, dərsin özündə qeyd olunur — "sonra yazaram" yoxdur</td></tr>
    <tr><td>Kağız, Excel, yoxsa platforma?</td><td>Bir neçə şagirdə dəftər bəs edir; qrup və müəllim sayı artdıqca qeydlər bir sistemdə, cədvəl və ödənişlə yanaşı aparılmalıdır</td></tr>
    <tr><td>Valideyn nəyi görməlidir?</td><td>Uşağın hansı dərslərdə olub-olmadığını — soruşmadan, istədiyi vaxt</td></tr>
    <tr><td>Hansı alət uyğundur?</td><td>Qruplar, həftəlik cədvəl, davamiyyət, ödəniş izləmə və valideyn kabineti bir yerdə olan platforma — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Davamiyyət Niyə Bu Qədər Vacibdir?</h2>
<p>Davamiyyəti çox vaxt formal iş kimi görürlər: "kim gəldi, kim gəlmədi". Əslində o, kurs mərkəzinin dörd əsas probleminə birbaşa təsir edir.</p>
<h3>1. Buraxılan dərslər gec görünür</h3>
<p>Şagird bir dərsə gəlmir — normaldır. İki həftə ardıcıl gəlmir — bu artıq siqnaldır: ya marağı azalıb, ya mövzunu başa düşmür, ya da başqa kursa keçmək fikrindədir. Davamiyyət qeyd olunmursa və ya dəftərdə qalırsa, bunu ay sonunda, ödəniş vaxtı öyrənirsiniz — çox gec. Qeydlər bir yerdə olanda isə müəllim və ya administrator vaxtında zəng edib səbəbi soruşa bilir.</p>
<h3>2. Ödəniş mübahisələri</h3>
<p>"Uşaq gəlməyib, niyə ödəyək?", "Biz ödəmişdik", "Bu ay neçə dərs olub?" — bu suallara cavab yalnız etibarlı davamiyyət qeydi ilə verilə bilər. Ödəniş modeliniz dərsbaşıdırsa, davamiyyət birbaşa məbləğə təsir edir. Aylıqdırsa, buraxılan dərslərin necə hesablanacağı əvvəlcədən razılaşdırılmalıdır. Hər iki halda tarixi olan qeyd mübahisəni bir neçə dəqiqədə həll edir.</p>
<h3>3. Valideyn etibarı</h3>
<p>Valideyn uşağın dərsə getdiyini düşünür, amma uşaq dərsə gəlmir — bu, valideynin ən çox narahat olduğu vəziyyətdir. Davamiyyəti valideynin özünün görə bilməsi kurs mərkəzinə olan etibarı artırır: valideyn hər şeyin şəffaf olduğunu görür və suallarını telefonla soruşmağa ehtiyac qalmır.</p>
<h3>4. Müəllimin iş yükü</h3>
<p>Müəllim dəftərdə qeyd aparır, sonra administrator onu Excel-ə köçürür, ay sonunda kimsə hesablayır, valideyn soruşanda yenə axtarılır. Eyni məlumat üç-dörd dəfə əl ilə köçürülür və hər köçürmədə səhv ehtimalı yaranır. Qeyd bir dəfə, bir yerdə edilirsə, bu işin böyük hissəsi aradan qalxır.</p>

<h2>Kağız Jurnal, Excel/WhatsApp və Kursometr: Müqayisə</h2>
<p>Hər üç üsulun öz yeri var. Əsas sual budur: qeyd nə qədər etibarlıdır, kim onu görə bilir və ödənişlə necə əlaqələnir?</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>Kağız jurnal</th><th>Excel / WhatsApp</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Qeyd nə vaxt edilir</td><td>Dərsdə, müəllimin dəftərində</td><td>Çox vaxt dərsdən sonra, yaddaşdan</td><td>Dərsdə, telefon brauzerindən</td></tr>
    <tr><td>Cədvəllə əlaqə</td><td>Yoxdur, tarixlər əl ilə yazılır</td><td>Hər ay yeni vərəq və ya sütun</td><td>Qruplar və həftəlik cədvəl ilə bir yerdə</td></tr>
    <tr><td>Kim görür</td><td>Yalnız dəftəri olan müəllim</td><td>Faylı açan; valideynə ayrıca mesaj lazımdır</td><td>Müəllim; valideyn öz kabinetində</td></tr>
    <tr><td>Ödənişlə əlaqə</td><td>Ayrı dəftər və ya qəbz</td><td>Ayrı vərəq, əl ilə müqayisə</td><td>Ödəniş izləmə eyni platformada</td></tr>
    <tr><td>Bir neçə müəllim</td><td>Hər müəllimin öz dəftəri</td><td>Faylın versiyaları qarışır</td><td>Köməkçi müəllim üçün mentor hesabı</td></tr>
    <tr><td>Risk</td><td>İtir, yaş olur, köçürmə səhvi</td><td>Səhv sətir, köhnə versiya, mesaj itir</td><td>Qeydin vaxtında edilməsi müəllimdən asılıdır</td></tr>
    <tr><td>Kimə uyğundur</td><td>Bir neçə fərdi şagird</td><td>Kiçik qrup, bir müəllim</td><td>Bir neçə qrup, müəllim və valideyn hesabatı lazım olanda</td></tr>
  </tbody>
</table>
<p>Açıq deyək: heç bir sistem müəllimin əvəzinə davamiyyəti qeyd etmir. Platformanın üstünlüyü qeydin bir dəfə edilməsi, cədvəllə bağlı olması və valideynin də onu görməsidir. WhatsApp və Excel-dən keçid barədə ətraflı: <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">repetitorlar üçün dərs idarəetmə proqramı</a>.</p>

<h2>Davamiyyət Uçotunu Necə Qurmaq Olar: Qruplar, Cədvəl, Hər Dərsdə Qeyd</h2>
<p>Elektron davamiyyət uçotu "proqram yükləyib başlamaq"dan yox, strukturdan başlayır. Ardıcıllıq belədir:</p>
<ol>
  <li><strong>Fənləri və qrupları yaradın.</strong> Hər qrupun aydın adı olsun: fənn, səviyyə və vaxt — məsələn, "Riyaziyyat 11 — B. e./Ç. 18:00". Fərdi şagirdlər üçün də ayrıca qrup aça bilərsiniz; davamiyyət onda da eyni qayda ilə aparılır.</li>
  <li><strong>Şagirdləri qruplara əlavə edin.</strong> Bir şagird bir neçə qrupda ola bilər (məsələn, riyaziyyat və ingilis dili). Hər qrupun siyahısı dəqiq olmalıdır — davamiyyət məhz bu siyahı üzrə qeyd olunur.</li>
  <li><strong>Həftəlik cədvəli qurun.</strong> Hansı qrup həftənin hansı günü, saat neçədə dərs keçir. Cədvəl olanda hər dərsin tarixi məlum olur və "bu ay neçə dərs olub?" sualına cavab hazırdır.</li>
  <li><strong>Hər dərsdə davamiyyəti qeyd edin.</strong> Dərsin əvvəlində və ya ilk dəqiqələrində. Telefon brauzerindən bir dəqiqəlik işdir. Qayda sadədir: dərs bitməmiş qeyd olunmalıdır.</li>
  <li><strong>Həftədə bir dəfə yoxlayın.</strong> Kim ardıcıl iki dərs buraxıb? Kim tez-tez gecikir? Bu siyahı ilə zəng və ya mesaj planlayın.</li>
</ol>
<p><a href="/mehsullar/kursometr">Kursometr</a>-də bu ardıcıllıq platformanın özündədir: müəllim öz səhifəsini (<em>adiniz.kursometr.com</em>) açır, fənləri və qrupları yaradır, həftəlik cədvəli qurur və hər dərsdə davamiyyəti qeyd edir. Google hesabı ilə daxil olmaq mümkündür, müəllim qeydiyyatı pulsuzdur. Köməkçi müəllim varsa, ona mentor hesabı verilir.</p>

<h2>Valideyn Davamiyyəti Necə Görür?</h2>
<p>Davamiyyət uçotunun dəyəri valideyn onu görəndə ikiqat artır. Üç yanaşma var:</p>
<ul>
  <li><strong>Soruşanda cavab vermək</strong> — ən zəif variant. Valideyn yalnız problem olanda soruşur, siz isə həmin anda qeydləri axtarırsınız.</li>
  <li><strong>Aylıq hesabat göndərmək</strong> — daha yaxşıdır, amma müəllimdən hər ay ayrıca vaxt tələb edir. Necə qurulduğu barədə: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</li>
  <li><strong>Valideynin özünün görməsi</strong> — ən şəffaf variant. Valideyn istədiyi vaxt uşağın hansı dərslərdə olduğunu görür.</li>
</ul>
<p>Kursometr-də valideyn kabineti var: orada uşağın <strong>davamiyyəti, qiymətləri və sınaq nəticələri</strong> görünür. Yəni müəllim davamiyyəti qeyd edir — valideyn eyni məlumatı öz kabinetində görür, ayrıca mesaj yazmağa ehtiyac qalmır. Ev tapşırıqlarının izlənməsi barədə: <a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">ev tapşırığı sistemi</a>.</p>
<p>Bir məsləhət: valideyni kabinetə ilk dəfə qeydiyyat zamanı qoşun və harada nəyə baxmaq lazım olduğunu bir dəfə göstərin. Kabinetdən istifadə edən valideyn daha az zəng edir və mübahisə ehtimalı azalır.</p>

<h2>Davamiyyət və Ödəniş: Bir-biri ilə Necə Bağlıdır?</h2>
<p>Ödəniş mübahisələrinin çoxu əslində davamiyyət mübahisəsidir. Bağlantı ödəniş modelindən asılıdır:</p>
<table>
  <thead>
    <tr><th>Ödəniş modeli</th><th>Davamiyyətin rolu</th><th>Nəyi əvvəlcədən yazmaq lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Dərsbaşı</td><td>Hər iştirak olunan dərs ödənişə daxildir</td><td>Xəbərdarlıqsız buraxılan dərs ödənilirmi?</td></tr>
    <tr><td>Aylıq sabit məbləğ</td><td>Ödəniş dəyişmir, amma buraxılan dərslərin sayı görünür</td><td>Xəstəlik və ya səfərə görə buraxılan dərs kompensasiya olunurmu?</td></tr>
    <tr><td>Paket (məsələn, 8 və ya 12 dərs)</td><td>Hər dərs paketdən çıxılır, qalıq davamiyyətə görə hesablanır</td><td>Paketin istifadə müddəti və buraxılan dərsin taleyi</td></tr>
  </tbody>
</table>
<p>Hər modeldə qayda eynidir: <strong>davamiyyət və ödəniş eyni yerdə olmalıdır</strong>. Valideyn "bu ay niyə bu məbləğ?" soruşanda siz dərs tarixlərini və ödənişləri yan-yana göstərə bilməlisiniz. Kursometr-də davamiyyət qeydi və tələbə ödənişlərinin izlənməsi eyni platformadadır — müəllim kimin ödədiyini və hansı dərslərdə iştirak etdiyini bir yerdən görür. Ödəniş modelini necə seçmək barədə ətraflı: <a href="/blog-details/repetitor-ders-haqqi-nece-teyin-olunur-2027">repetitor dərs haqqını necə müəyyənləşdirsin</a>.</p>

<h2>Praktik Qaydalar: Gecikmə, Kompensasiya Dərsi və Davamiyyət Siyasəti</h2>
<p>Davamiyyət uçotu yalnız qeyd deyil, həm də qaydalardır. Qaydalar yazılı olmayanda hər hal ayrıca mübahisəyə çevrilir. Əsas məsələlər:</p>
<h3>Gecikmələr</h3>
<p>Neçə dəqiqə gecikmə "gecikmə" sayılır və nə vaxtdan "dərsə gəlmədi" hesab olunur? Məsələn, mərkəz qərar verə bilər ki, 10 dəqiqəyə qədər gecikmə qeyd olunur, ondan çox gecikmə isə müəllimin qərarı ilə həll edilir. Rəqəmi siz müəyyən edirsiniz — əsas odur ki, hamı üçün eyni olsun və valideyn bunu əvvəlcədən bilsin. Tez-tez gecikən şagird barədə valideynlə ayrıca danışın.</p>
<h3>Kompensasiya dərsləri</h3>
<p>Buraxılan dərs əvəzinə şagirdə nə təklif olunur? Variantlar: başqa qrupda eyni mövzuya qatılmaq, dərs yazısı və materiallarla özü işləmək, ayrıca qısa görüş və ya kompensasiya yoxdur. Kursometr-də dərs yazıları və materiallar yalnız həmin qrupa görünür — buraxılan dərsin materialı qrupdakı şagird üçün əlçatan qalır, bu da kompensasiya problemini qismən həll edir.</p>
<h3>Müəllim tərəfindən ləğv edilən dərs</h3>
<p>Müəllim xəstələnəndə və ya bayram günü düşəndə dərs necə əvəz olunur? Bu da qaydada yazılmalıdır — valideyn yalnız şagirdin deyil, mərkəzin də öhdəliyini görmək istəyir.</p>
<h3>Davamiyyət siyasəti mətni</h3>
<p>Qaydaları bir səhifəlik sadə mətnə çevirin və qeydiyyat zamanı valideynə verin. Nümunə:</p>
<blockquote>
<p><em>"Davamiyyət hər dərsdə qeyd olunur və valideyn kabinetində görünür. 10 dəqiqədən çox gecikmə müəllimin qərarı ilə 'iştirak etmədi' kimi qeyd oluna bilər. Dərsi buraxmağı ən azı bir gün əvvəl bildirin. Xəbərdarlıqla buraxılan dərs üçün şagird qrupun dərs materiallarından istifadə edə və ya mümkün olduqda başqa qrupun eyni mövzulu dərsinə qatıla bilər. Xəbərdarlıqsız buraxılan dərs ödənişdən çıxılmır. Müəllim tərəfindən ləğv edilən dərs əlavə dərslə əvəz olunur."</em></p>
</blockquote>
<p>Bu yalnız nümunədir — rəqəmləri və şərtləri öz mərkəzinizə uyğunlaşdırın. Mətni saytınızın FAQ bölməsinə də əlavə edin: valideyn qeydiyyatdan əvvəl qaydaları görür.</p>

<h2>Kurs Mərkəzi üçün: Bir Neçə Müəllim, Bir Neçə Qrup</h2>
<p>Fərdi repetitor üçün davamiyyət sadə məsələdir. Kurs mərkəzində isə əlavə suallar yaranır:</p>
<ul>
  <li><strong>Kim qeyd edir?</strong> Dərsi keçən müəllim. Administrator qeydləri yoxlayır, amma onları müəllimin əvəzinə yazmır — əks halda yenə yaddaşdan yazılmış qeydlər alınır.</li>
  <li><strong>Köməkçi müəllim varsa?</strong> Kursometr-də onun üçün mentor hesabı açılır.</li>
  <li><strong>Hazırlıq qruplarında davamiyyət və nəticə</strong> birlikdə izlənməlidir: buraxılan dərslər çox vaxt sınaq nəticələrində görünür. Kursometr-də vaxtlı sınaqlar təyin olunan saatda açılıb-bağlanır, qapalı suallar avtomatik yoxlanır — davamiyyət və nəticəni bir yerdə görmək mümkündür. Ətraflı: <a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a>.</li>
  <li><strong>Bir neçə filial, mərkəzi hesabat və öz iş qaydaları</strong> varsa, hazır platforma kifayət etməyə bilər. Belə hallarda RS Code fərdi sistem hazırlayır: <a href="/elaqe">bizimlə əlaqə saxlayın</a>. Ümumi bələdçi: <a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">tədris mərkəzi üçün idarəetmə proqramı</a>.</li>
</ul>

<h2>Tez-tez Edilən Səhvlər</h2>
<ul>
  <li><strong>Davamiyyəti dərsdən sonra, yaddaşdan yazmaq</strong> — həftənin sonunda kimin gəldiyini dəqiq xatırlamaq mümkün deyil;</li>
  <li><strong>Eyni məlumatı bir neçə yerdə aparmaq</strong> — dəftər, Excel və WhatsApp bir-birinə uyğun gəlmir;</li>
  <li><strong>Yazılı qayda olmadan işləmək</strong> — gecikmə və buraxılan dərs hər dəfə yenidən müzakirə olunur;</li>
  <li><strong>Davamiyyəti ödənişdən ayrı saxlamaq</strong> — "bu ay niyə bu məbləğ?" sualına tez cavab verə bilmirsiniz;</li>
  <li><strong>Ardıcıl buraxılan dərslərə reaksiya verməmək</strong> — şagird səssizcə kursu tərk edir;</li>
  <li><strong>Valideyni yalnız problem olanda məlumatlandırmaq</strong> — etibar azalır.</li>
</ul>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Fənlər və qruplar aydın adlarla yaradılıb, hər qrupun şagird siyahısı dəqiqdir</li>
  <li>☐ Həftəlik cədvəl qurulub — hər dərsin tarixi məlumdur</li>
  <li>☐ Davamiyyət hər dərsdə, dərs bitməmiş qeyd olunur</li>
  <li>☐ Davamiyyət bir yerdə aparılır, dəftər + Excel + WhatsApp paralel deyil</li>
  <li>☐ Gecikmə, buraxılan dərs, kompensasiya və ləğv edilən dərs qaydaları yazılıdır</li>
  <li>☐ Qaydalar qeydiyyat zamanı valideynə verilir və saytın FAQ bölməsində var</li>
  <li>☐ Valideyn davamiyyəti öz kabinetində görür</li>
  <li>☐ Davamiyyət və ödəniş eyni yerdə, yan-yana görünür</li>
  <li>☐ Həftədə bir dəfə ardıcıl buraxılan dərslər yoxlanılır və valideynlə əlaqə saxlanılır</li>
  <li>☐ Köməkçi müəllimlər üçün ayrıca hesab (məsələn, Kursometr-də mentor hesabı)</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Elektron davamiyyət uçotu kağız jurnaldan nə ilə üstündür?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Elektron qeyd bir dəfə edilir, qruplar və həftəlik cədvəl ilə bağlı olur, itmir və başqa yerə köçürülməsi lazım gəlmir. Platformada valideyn də davamiyyəti öz kabinetində görə bilir, ödəniş izləmə isə eyni yerdə aparılır. Bir neçə fərdi şagird üçün kağız jurnal bəs edə bilər, amma qrup və müəllim sayı artdıqca elektron uçot daha etibarlıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Davamiyyəti nə vaxt qeyd etmək lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər dərsdə, dərsin əvvəlində və ya ilk dəqiqələrində. Dərsdən sonra, yaddaşdan yazılan qeydlər səhv olur və mübahisə yaradır. Telefon brauzerində işləyən platforma ilə bu, bir dəqiqəlik işdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Valideyn uşağın davamiyyətini necə görə bilər?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ən şəffaf yol valideynin özünün görməsidir. Kursometr-də valideyn kabineti var: orada uşağın davamiyyəti, qiymətləri və sınaq nəticələri görünür. Müəllim davamiyyəti qeyd edir, valideyn ayrıca mesaj gözləmədən eyni məlumatı görür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Buraxılan dərs ödənişdən çıxılmalıdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bu, ödəniş modelindən və mərkəzin qaydalarından asılıdır. Əsas odur ki, qayda əvvəlcədən yazılı razılaşdırılsın: xəbərdarlıqla və xəbərdarlıqsız buraxılan dərs, kompensasiya dərsi və müəllim tərəfindən ləğv edilən dərs necə hesablanır. Davamiyyət və ödəniş eyni yerdə olanda hər sual tarixlərlə cavablandırılır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Gecikmələrlə necə davranmaq lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Neçə dəqiqəlik gecikmənin qeyd olunacağını və nə vaxtdan dərsə gəlməmək sayılacağını müəyyənləşdirin, bunu davamiyyət siyasətinə yazın və valideynə qeydiyyat zamanı bildirin. Qayda hamı üçün eyni olmalıdır; tez-tez gecikən şagird barədə valideynlə ayrıca danışın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-də davamiyyət uçotu necə aparılır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Müəllim öz səhifəsini (adiniz.kursometr.com) açır, fənləri və qrupları yaradır, həftəlik cədvəli qurur və hər dərsdə davamiyyəti qeyd edir. Valideyn davamiyyəti valideyn kabinetində görür, tələbə ödənişləri isə eyni platformada izlənir. Platforma telefon brauzerində işləyir, Google ilə giriş var və müəllim qeydiyyatı pulsuzdur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">Ev tapşırığı sistemi: ver, yoxla, izlə</a></li>
  <li><a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">Repetitorlar üçün dərs idarəetmə proqramı</a></li>
  <li><a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">Tədris mərkəzi üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">Abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a></li>
</ul>

<h2>Nəticə</h2>
<p>Davamiyyət uçotu kiçik iş kimi görünür, amma kurs mərkəzində etibarın, ödənişin və şagirdi saxlamağın əsasıdır. Qrupları və həftəlik cədvəli qurun, davamiyyəti hər dərsdə bir yerdə qeyd edin, gecikmə və kompensasiya qaydalarını yazılı razılaşdırın, valideynin davamiyyəti özünün görməsini təmin edin və ödənişi davamiyyətlə yan-yana saxlayın. Bunu dəftər və yazışma əvəzinə bir platformada aparanda həm müəllimin vaxtına qənaət olunur, həm də "uşaq o gün gəlmişdi" mübahisələri azalır.</p>
<p><strong>Davamiyyəti, qrupları və ödənişləri bir yerdən idarə etmək istəyirsiniz? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong> — müəllim qeydiyyatı pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Bir neçə filialı olan mərkəz üçün fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Davamiyyət siyasəti mətni nümunədir; rəqəmləri və şərtləri öz mərkəzinizin qaydalarına uyğunlaşdırın. Kursometr funksiyaları noyabr 2026 vəziyyətinə görə təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>It is the end of the month. A parent calls: "Why the full amount this month? My child missed two lessons." The teacher flips through a notebook, the administrator opens an Excel file, old messages are searched in the WhatsApp group — and it turns out one lesson was never recorded and another was written on a different group's page. The conversation gets tense and both sides think they are right. A large share of disputes at course centres and with tutors starts exactly here: attendance happens, but nobody has a reliable record of it.</p>
<p>This article is for course centre managers, administrators, teachers and tutors. We explain how to set up attendance tracking in 2027: why it matters, the difference between a paper register, Excel/WhatsApp and a platform such as <a href="/mehsullar/kursometr">Kursometr</a>, setting up groups and the timetable, marking every lesson, what parents see, the link between attendance and payments, and rules for late arrivals and make-up lessons. A checklist is at the end.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Why does attendance matter?</td><td>To spot missed lessons in time, prevent payment disputes, protect parents' trust and save teachers' time</td></tr>
    <tr><td>What is the simplest rule?</td><td>Attendance is marked at every lesson, during the lesson — no "I'll write it down later"</td></tr>
    <tr><td>Paper, Excel or a platform?</td><td>A notebook is enough for a few students; as groups and teachers grow, records should live in one system, next to the timetable and payments</td></tr>
    <tr><td>What should parents see?</td><td>Which lessons their child attended — without asking, whenever they want</td></tr>
    <tr><td>Which tool fits?</td><td>A platform with groups, a weekly timetable, attendance, payment tracking and a parent portal in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Why Does Attendance Matter So Much?</h2>
<p>Attendance is often seen as a formality: "who came, who didn't". In fact it directly affects four core problems of a course centre.</p>
<h3>1. Missed lessons are noticed too late</h3>
<p>A student misses one lesson — that is normal. They miss two weeks in a row — that is a signal: they have lost interest, do not understand the topic or are thinking of moving to another course. If attendance is not recorded or stays in a notebook, you find out at the end of the month, at payment time — far too late. When records are in one place, the teacher or administrator can call in time and ask why.</p>
<h3>2. Payment disputes</h3>
<p>"My child didn't come, why should we pay?", "We already paid", "How many lessons were there this month?" — these questions can only be answered with a reliable attendance record. If you charge per lesson, attendance directly affects the amount. If you charge monthly, how missed lessons are handled must be agreed in advance. Either way, a dated record settles the dispute in a few minutes.</p>
<h3>3. Parents' trust</h3>
<p>A parent thinks their child is at the lesson, but the child is not there — this is what parents worry about most. When parents can see attendance themselves, trust in the course centre grows: they see that everything is transparent and no longer need to phone with questions.</p>
<h3>4. Teacher workload</h3>
<p>The teacher writes in a notebook, the administrator copies it into Excel, someone does the maths at the end of the month, and when a parent asks, it is searched for again. The same information is copied by hand three or four times, and every copy is a chance for error. When it is recorded once, in one place, most of this work disappears.</p>

<h2>Paper Register, Excel/WhatsApp and Kursometr: a Comparison</h2>
<p>Each method has its place. The key question is: how reliable is the record, who can see it, and how does it connect to payments?</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>Paper register</th><th>Excel / WhatsApp</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>When it is recorded</td><td>During the lesson, in the teacher's notebook</td><td>Often after the lesson, from memory</td><td>During the lesson, from a phone browser</td></tr>
    <tr><td>Link to the timetable</td><td>None, dates are written by hand</td><td>A new sheet or column every month</td><td>Together with groups and the weekly timetable</td></tr>
    <tr><td>Who sees it</td><td>Only the teacher who has the notebook</td><td>Whoever opens the file; parents need a separate message</td><td>The teacher; parents in their own portal</td></tr>
    <tr><td>Link to payments</td><td>A separate notebook or receipts</td><td>A separate sheet, compared by hand</td><td>Payment tracking on the same platform</td></tr>
    <tr><td>Several teachers</td><td>Each teacher has their own notebook</td><td>File versions get mixed up</td><td>Mentor accounts for assistant teachers</td></tr>
    <tr><td>Risk</td><td>Gets lost or damaged, copying errors</td><td>Wrong row, old version, lost messages</td><td>Timely marking still depends on the teacher</td></tr>
    <tr><td>Who it suits</td><td>A few individual students</td><td>A small group, one teacher</td><td>Several groups and teachers, when parent reports are needed</td></tr>
  </tbody>
</table>
<p>To be clear: no system marks attendance instead of the teacher. A platform's advantage is that the record is made once, tied to the timetable, and parents can see it too. More on moving away from WhatsApp and Excel: <a href="/blog-details/tutor-class-management-software-2026">class management software for tutors</a>.</p>

<h2>How to Set Up Attendance Tracking: Groups, Timetable, Marking Every Lesson</h2>
<p>Electronic attendance tracking does not start with "install an app and go", but with structure. The order is:</p>
<ol>
  <li><strong>Create subjects and groups.</strong> Give each group a clear name: subject, level and time — for example, "Maths Grade 11 — Mon/Wed 18:00". You can also create a separate group for individual students; attendance works the same way there.</li>
  <li><strong>Add students to groups.</strong> One student can be in several groups (for example, maths and English). Each group's list must be accurate — attendance is marked against exactly this list.</li>
  <li><strong>Set up the weekly timetable.</strong> Which group has lessons on which day and at what time. With a timetable, the date of every lesson is known and the answer to "how many lessons were there this month?" is ready.</li>
  <li><strong>Mark attendance at every lesson.</strong> At the start of the lesson or in the first few minutes. From a phone browser it takes a minute. The rule is simple: it must be recorded before the lesson ends.</li>
  <li><strong>Review once a week.</strong> Who has missed two lessons in a row? Who is often late? Plan calls or messages from this list.</li>
</ol>
<p>In <a href="/mehsullar/kursometr">Kursometr</a> this order is built into the platform: the teacher opens their own page (<em>yourname.kursometr.com</em>), creates subjects and groups, sets up the weekly timetable and marks attendance at every lesson. Sign-in with a Google account is available, and teacher registration is free. If there is an assistant teacher, they get a mentor account.</p>

<h2>How Do Parents See Attendance?</h2>
<p>Attendance tracking doubles in value when parents can see it. There are three approaches:</p>
<ul>
  <li><strong>Answering when asked</strong> — the weakest option. Parents only ask when there is a problem, and you search through records on the spot.</li>
  <li><strong>Sending a monthly report</strong> — better, but it takes the teacher separate time every month. How to set it up: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</li>
  <li><strong>Parents see it themselves</strong> — the most transparent option. Parents can check which lessons their child attended whenever they want.</li>
</ul>
<p>Kursometr has a parent portal that shows the child's <strong>attendance, grades and test results</strong>. So the teacher marks attendance, and the parent sees the same information in their own portal — no separate message needed. On tracking homework: <a href="/blog-details/homework-system-for-teachers-2027">homework system for teachers</a>.</p>
<p>One tip: connect parents to the portal at enrolment and show them once where to look. Parents who use the portal call less often, and disputes become less likely.</p>

<h2>Attendance and Payments: How Are They Linked?</h2>
<p>Most payment disputes are really attendance disputes. The link depends on the payment model:</p>
<table>
  <thead>
    <tr><th>Payment model</th><th>Role of attendance</th><th>What to agree in writing</th></tr>
  </thead>
  <tbody>
    <tr><td>Per lesson</td><td>Every attended lesson is included in the payment</td><td>Is a lesson missed without notice charged?</td></tr>
    <tr><td>Fixed monthly fee</td><td>The fee does not change, but the number of missed lessons is visible</td><td>Are lessons missed due to illness or travel made up?</td></tr>
    <tr><td>Package (e.g. 8 or 12 lessons)</td><td>Each lesson is deducted from the package; the balance follows attendance</td><td>How long the package is valid and what happens to missed lessons</td></tr>
  </tbody>
</table>
<p>The rule is the same for every model: <strong>attendance and payments should be in the same place</strong>. When a parent asks "why this amount this month?", you should be able to show lesson dates and payments side by side. In Kursometr, attendance records and student payment tracking are on the same platform — the teacher sees who has paid and which lessons they attended in one place. More on choosing a payment model: <a href="/blog-details/how-tutors-should-set-lesson-prices-2027">how tutors should set lesson prices</a>.</p>

<h2>Practical Rules: Late Arrivals, Make-up Lessons and an Attendance Policy</h2>
<p>Attendance tracking is not only records — it is also rules. When rules are not written down, every case becomes a separate argument. The main issues:</p>
<h3>Late arrivals</h3>
<p>How many minutes count as "late", and from when is it "did not attend"? For example, a centre may decide that lateness of up to 10 minutes is noted, while anything longer is left to the teacher's judgement. You choose the number — what matters is that it is the same for everyone and parents know it in advance. Talk separately with the parents of a student who is often late.</p>
<h3>Make-up lessons</h3>
<p>What is offered to a student instead of a missed lesson? Options: joining another group on the same topic, working through the lesson recording and materials on their own, a separate short session, or no make-up at all. In Kursometr, lesson recordings and materials are visible only to that group — so the material from a missed lesson stays available to the student in the group, which partly solves the make-up problem.</p>
<h3>Lessons cancelled by the teacher</h3>
<p>How is a lesson replaced when the teacher is ill or it falls on a public holiday? This should also be in the rules — parents want to see the centre's obligations, not just the student's.</p>
<h3>Attendance policy text</h3>
<p>Turn the rules into a simple one-page text and give it to parents at enrolment. Example:</p>
<blockquote>
<p><em>"Attendance is marked at every lesson and is visible in the parent portal. Lateness of more than 10 minutes may be recorded as 'did not attend' at the teacher's discretion. Please let us know at least one day in advance if your child will miss a lesson. For a lesson missed with notice, the student can use the group's lesson materials or, where possible, join another group's lesson on the same topic. Lessons missed without notice are not deducted from the fee. A lesson cancelled by the teacher is replaced with an extra lesson."</em></p>
</blockquote>
<p>This is only an example — adapt the numbers and terms to your centre. Add the text to your website's FAQ as well, so parents see the rules before they enrol.</p>

<h2>For Course Centres: Several Teachers, Several Groups</h2>
<p>For an individual tutor, attendance is simple. At a course centre, extra questions arise:</p>
<ul>
  <li><strong>Who marks it?</strong> The teacher who runs the lesson. The administrator checks the records but does not write them on the teacher's behalf — otherwise you are back to records written from memory.</li>
  <li><strong>What if there is an assistant teacher?</strong> In Kursometr they get a mentor account.</li>
  <li><strong>In exam prep groups, attendance and results</strong> should be tracked together: missed lessons often show up in test results. In Kursometr, timed tests open and close at the set time and closed questions are graded automatically — so attendance and results can be seen in one place. More: <a href="/blog-details/exam-prep-course-centre-management-2027">how to run an exam prep course centre</a>.</li>
  <li><strong>Several branches, central reporting and your own workflows</strong> may need more than an off-the-shelf platform. In that case RS Code builds a custom system: <a href="/contact">get in touch</a>. A general guide: <a href="/blog-details/training-centre-management-software-2026">training centre management software</a>.</li>
</ul>

<h2>Common Mistakes</h2>
<ul>
  <li><strong>Recording attendance after the lesson, from memory</strong> — by the end of the week nobody remembers exactly who came;</li>
  <li><strong>Keeping the same information in several places</strong> — the notebook, Excel and WhatsApp do not match;</li>
  <li><strong>Working without written rules</strong> — lateness and missed lessons are argued over every time;</li>
  <li><strong>Keeping attendance separate from payments</strong> — you cannot quickly answer "why this amount this month?";</li>
  <li><strong>Not reacting to repeated absences</strong> — the student quietly drops out;</li>
  <li><strong>Informing parents only when there is a problem</strong> — trust declines.</li>
</ul>

<h2>Checklist</h2>
<ul>
  <li>☐ Subjects and groups have clear names, and each group's student list is accurate</li>
  <li>☐ A weekly timetable is set up — the date of every lesson is known</li>
  <li>☐ Attendance is marked at every lesson, before it ends</li>
  <li>☐ Attendance is kept in one place, not notebook + Excel + WhatsApp in parallel</li>
  <li>☐ Rules for lateness, missed lessons, make-ups and cancelled lessons are written down</li>
  <li>☐ The rules are given to parents at enrolment and are in the website FAQ</li>
  <li>☐ Parents see attendance in their own portal</li>
  <li>☐ Attendance and payments are visible side by side in one place</li>
  <li>☐ Repeated absences are reviewed weekly and parents are contacted</li>
  <li>☐ Separate accounts for assistant teachers (for example, a mentor account in Kursometr)</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What makes electronic attendance tracking better than a paper register?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">An electronic record is made once, is tied to groups and the weekly timetable, does not get lost and does not need to be copied elsewhere. On a platform, parents can also see attendance in their own portal, and payment tracking is kept in the same place. A paper register may be enough for a few individual students, but as groups and teachers grow, electronic tracking is more reliable.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">When should attendance be marked?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">At every lesson, at the start or in the first few minutes. Records written after the lesson from memory are often wrong and lead to disputes. With a platform that works in a phone browser, it takes a minute.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can parents see their child's attendance?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The most transparent way is for parents to see it themselves. Kursometr has a parent portal that shows the child's attendance, grades and test results. The teacher marks attendance, and the parent sees the same information without waiting for a separate message.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should a missed lesson be deducted from the fee?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">That depends on the payment model and the centre's rules. What matters is that the rule is agreed in writing in advance: how lessons missed with and without notice, make-up lessons and lessons cancelled by the teacher are counted. When attendance and payments are in the same place, every question can be answered with dates.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How should late arrivals be handled?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Decide how many minutes of lateness are noted and from when it counts as not attending, write this into your attendance policy and tell parents at enrolment. The rule should be the same for everyone; talk separately with the parents of a student who is often late.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How is attendance tracked in Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The teacher opens their own page (yourname.kursometr.com), creates subjects and groups, sets up the weekly timetable and marks attendance at every lesson. Parents see attendance in the parent portal, and student payments are tracked on the same platform. It works in a phone browser, supports sign-in with Google, and teacher registration is free.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/homework-system-for-teachers-2027">Homework system: set, check, track</a></li>
  <li><a href="/blog-details/tutor-class-management-software-2026">Class management software for tutors</a></li>
  <li><a href="/blog-details/training-centre-management-software-2026">Training centre management software</a></li>
  <li><a href="/blog-details/exam-prep-course-centre-management-2027">How to run an exam prep course centre</a></li>
</ul>

<h2>Conclusion</h2>
<p>Attendance tracking looks like a small task, but at a course centre it underpins trust, payments and student retention. Set up groups and a weekly timetable, mark attendance at every lesson in one place, agree rules for lateness and make-up lessons in writing, let parents see attendance themselves, and keep payments next to attendance. When you do this on one platform instead of in notebooks and chats, teachers save time and "but my child was there that day" disputes become rare.</p>
<p><strong>Want to manage attendance, groups and payments in one place? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher registration is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. If a multi-branch centre needs a custom system: <a href="/contact">get in touch</a>.</p>
<p><small><em>The attendance policy text is an example; adapt the numbers and terms to your centre's rules. Kursometr features are described as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Конец месяца. Звонит родитель: «Почему полная сумма за этот месяц? Ребёнок пропустил два занятия». Преподаватель листает тетрадь, администратор открывает Excel, в группе WhatsApp ищут старые сообщения — и выясняется, что одно занятие вообще не отмечено, а другое записано на странице другой группы. Разговор накаляется, и каждая сторона считает себя правой. Значительная часть споров в учебных центрах и у репетиторов начинается именно здесь: посещаемость есть, а надёжного учёта нет.</p>
<p>Эта статья для руководителей учебных центров, администраторов, преподавателей и репетиторов. Разбираем, как наладить учёт посещаемости в 2027 году: почему это важно, чем отличаются бумажный журнал, Excel/WhatsApp и платформа вроде <a href="/mehsullar/kursometr">Kursometr</a>, как настроить группы и расписание, отмечать каждое занятие, что видит родитель, как посещаемость связана с оплатой и какие нужны правила для опозданий и отработок. В конце — чек-лист.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Почему посещаемость важна?</td><td>Чтобы вовремя замечать пропуски, предотвращать споры об оплате, сохранять доверие родителей и экономить время преподавателя</td></tr>
    <tr><td>Какое самое простое правило?</td><td>Посещаемость отмечается на каждом занятии, прямо во время него — никаких «запишу потом»</td></tr>
    <tr><td>Бумага, Excel или платформа?</td><td>Для нескольких учеников хватит тетради; когда растёт число групп и преподавателей, записи должны вестись в одной системе — рядом с расписанием и оплатами</td></tr>
    <tr><td>Что должен видеть родитель?</td><td>На каких занятиях был ребёнок — без вопросов, в любое время</td></tr>
    <tr><td>Какой инструмент подойдёт?</td><td>Платформа, где группы, недельное расписание, посещаемость, учёт оплат и кабинет родителя собраны в одном месте, — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Почему посещаемость так важна?</h2>
<p>Посещаемость часто воспринимают как формальность: «кто пришёл, кто нет». На деле она напрямую влияет на четыре ключевые проблемы учебного центра.</p>
<h3>1. Пропуски замечают слишком поздно</h3>
<p>Ученик пропустил одно занятие — это нормально. Не приходит две недели подряд — это уже сигнал: пропал интерес, не понимает тему или собирается перейти на другие курсы. Если посещаемость не отмечается или остаётся в тетради, вы узнаёте об этом в конце месяца, при оплате, — слишком поздно. Когда записи в одном месте, преподаватель или администратор может вовремя позвонить и узнать причину.</p>
<h3>2. Споры об оплате</h3>
<p>«Ребёнок не приходил, за что платить?», «Мы же платили», «Сколько занятий было в этом месяце?» — на эти вопросы можно ответить только по надёжному учёту посещаемости. При оплате за занятие посещаемость прямо влияет на сумму. При помесячной оплате нужно заранее договориться, как учитываются пропуски. В обоих случаях запись с датой решает спор за несколько минут.</p>
<h3>3. Доверие родителей</h3>
<p>Родитель думает, что ребёнок на занятии, а его там нет, — именно это беспокоит родителей больше всего. Когда родитель сам видит посещаемость, доверие к учебному центру растёт: он видит, что всё прозрачно, и ему не нужно звонить с вопросами.</p>
<h3>4. Нагрузка на преподавателя</h3>
<p>Преподаватель пишет в тетрадь, администратор переносит в Excel, в конце месяца кто-то считает, а когда спрашивает родитель — снова ищут. Одна и та же информация переписывается вручную три-четыре раза, и каждый раз возможна ошибка. Если запись делается один раз и в одном месте, большая часть этой работы исчезает.</p>

<h2>Бумажный журнал, Excel/WhatsApp и Kursometr: сравнение</h2>
<p>У каждого способа своё место. Главный вопрос: насколько надёжна запись, кто её видит и как она связана с оплатой?</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>Бумажный журнал</th><th>Excel / WhatsApp</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Когда отмечается</td><td>На занятии, в тетради преподавателя</td><td>Часто после занятия, по памяти</td><td>На занятии, из браузера телефона</td></tr>
    <tr><td>Связь с расписанием</td><td>Нет, даты пишутся вручную</td><td>Каждый месяц новый лист или столбец</td><td>Вместе с группами и недельным расписанием</td></tr>
    <tr><td>Кто видит</td><td>Только преподаватель с тетрадью</td><td>Тот, кто открыл файл; родителю нужно отдельное сообщение</td><td>Преподаватель; родитель — в своём кабинете</td></tr>
    <tr><td>Связь с оплатой</td><td>Отдельная тетрадь или квитанции</td><td>Отдельный лист, сверка вручную</td><td>Учёт оплат на той же платформе</td></tr>
    <tr><td>Несколько преподавателей</td><td>У каждого своя тетрадь</td><td>Версии файла путаются</td><td>Аккаунт ментора для помощника преподавателя</td></tr>
    <tr><td>Риск</td><td>Теряется, портится, ошибки при переписывании</td><td>Не та строка, старая версия, потерянные сообщения</td><td>Своевременная отметка всё равно зависит от преподавателя</td></tr>
    <tr><td>Кому подходит</td><td>Несколько индивидуальных учеников</td><td>Небольшая группа, один преподаватель</td><td>Несколько групп и преподавателей, когда нужны отчёты родителям</td></tr>
  </tbody>
</table>
<p>Скажем прямо: ни одна система не отмечает посещаемость вместо преподавателя. Преимущество платформы в том, что запись делается один раз, привязана к расписанию и её видит родитель. Подробнее о переходе с WhatsApp и Excel: <a href="/blog-details/programma-dlya-repetitorov-2026">программа для репетиторов</a>.</p>

<h2>Как настроить учёт посещаемости: группы, расписание, отметка на каждом занятии</h2>
<p>Электронный учёт посещаемости начинается не с «установить программу и начать», а со структуры. Порядок такой:</p>
<ol>
  <li><strong>Создайте предметы и группы.</strong> У каждой группы должно быть понятное название: предмет, уровень и время — например, «Математика 11 — Пн/Ср 18:00». Для индивидуальных учеников тоже можно создать отдельную группу; посещаемость ведётся так же.</li>
  <li><strong>Добавьте учеников в группы.</strong> Один ученик может быть в нескольких группах (например, математика и английский). Список каждой группы должен быть точным — посещаемость отмечается именно по нему.</li>
  <li><strong>Настройте недельное расписание.</strong> Какая группа занимается в какой день и в какое время. Когда есть расписание, дата каждого занятия известна и ответ на вопрос «сколько было занятий в этом месяце?» готов.</li>
  <li><strong>Отмечайте посещаемость на каждом занятии.</strong> В начале урока или в первые минуты. Из браузера телефона это занимает минуту. Правило простое: отметка делается до конца занятия.</li>
  <li><strong>Раз в неделю проверяйте.</strong> Кто пропустил два занятия подряд? Кто часто опаздывает? По этому списку планируйте звонки или сообщения.</li>
</ol>
<p>В <a href="/mehsullar/kursometr">Kursometr</a> этот порядок заложен в саму платформу: преподаватель открывает свою страницу (<em>vashe-imya.kursometr.com</em>), создаёт предметы и группы, настраивает недельное расписание и отмечает посещаемость на каждом занятии. Можно войти через аккаунт Google, регистрация преподавателя бесплатна. Если есть помощник, ему выдаётся аккаунт ментора.</p>

<h2>Как родитель видит посещаемость?</h2>
<p>Ценность учёта посещаемости удваивается, когда его видит родитель. Есть три подхода:</p>
<ul>
  <li><strong>Отвечать, когда спросят</strong> — самый слабый вариант. Родитель спрашивает только при проблеме, а вы в этот момент ищете записи.</li>
  <li><strong>Отправлять ежемесячный отчёт</strong> — лучше, но каждый месяц требует от преподавателя отдельного времени. Как это наладить: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</li>
  <li><strong>Родитель видит сам</strong> — самый прозрачный вариант. Родитель в любое время видит, на каких занятиях был ребёнок.</li>
</ul>
<p>В Kursometr есть кабинет родителя: там видны <strong>посещаемость, оценки и результаты тестов</strong> ребёнка. То есть преподаватель отмечает посещаемость — родитель видит те же данные в своём кабинете, без отдельных сообщений. Об отслеживании домашних заданий: <a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">система домашних заданий</a>.</p>
<p>Совет: подключите родителя к кабинету при записи и один раз покажите, где что смотреть. Родители, которые пользуются кабинетом, звонят реже, и споров становится меньше.</p>

<h2>Посещаемость и оплата: как они связаны?</h2>
<p>Большинство споров об оплате на самом деле — споры о посещаемости. Связь зависит от модели оплаты:</p>
<table>
  <thead>
    <tr><th>Модель оплаты</th><th>Роль посещаемости</th><th>Что нужно прописать заранее</th></tr>
  </thead>
  <tbody>
    <tr><td>За занятие</td><td>Каждое посещённое занятие входит в оплату</td><td>Оплачивается ли пропуск без предупреждения?</td></tr>
    <tr><td>Фиксированная помесячная сумма</td><td>Сумма не меняется, но число пропусков видно</td><td>Отрабатываются ли пропуски по болезни или из-за поездки?</td></tr>
    <tr><td>Пакет (например, 8 или 12 занятий)</td><td>Каждое занятие списывается с пакета, остаток считается по посещаемости</td><td>Срок действия пакета и что происходит с пропусками</td></tr>
  </tbody>
</table>
<p>Правило одно для всех моделей: <strong>посещаемость и оплата должны быть в одном месте</strong>. Когда родитель спрашивает «почему такая сумма в этом месяце?», вы должны показать даты занятий и платежи рядом. В Kursometr отметки посещаемости и учёт оплат учеников находятся на одной платформе — преподаватель видит в одном месте, кто оплатил и на каких занятиях был. Подробнее о выборе модели оплаты: <a href="/blog-details/kak-repetitoru-ustanovit-cenu-za-urok-2027">как репетитору установить цену за урок</a>.</p>

<h2>Практические правила: опоздания, отработки и положение о посещаемости</h2>
<p>Учёт посещаемости — это не только отметки, но и правила. Когда правила не записаны, каждый случай превращается в отдельный спор. Основные вопросы:</p>
<h3>Опоздания</h3>
<p>Сколько минут считается «опозданием» и с какого момента это уже «не пришёл»? Например, центр может решить, что опоздание до 10 минут фиксируется, а более долгое решается на усмотрение преподавателя. Цифру выбираете вы — главное, чтобы она была одинаковой для всех и родитель знал её заранее. С родителями ученика, который часто опаздывает, поговорите отдельно.</p>
<h3>Отработки</h3>
<p>Что предлагается ученику вместо пропущенного занятия? Варианты: прийти в другую группу на ту же тему, самостоятельно разобрать запись урока и материалы, отдельная короткая встреча или отработки нет. В Kursometr записи уроков и материалы видны только своей группе — материал пропущенного занятия остаётся доступным ученику этой группы, и это частично решает вопрос отработок.</p>
<h3>Занятие, отменённое преподавателем</h3>
<p>Как возмещается занятие, если преподаватель заболел или выпал праздничный день? Это тоже нужно прописать — родитель хочет видеть обязательства не только ученика, но и центра.</p>
<h3>Текст положения о посещаемости</h3>
<p>Сведите правила в простой текст на одну страницу и выдавайте его родителю при записи. Пример:</p>
<blockquote>
<p><em>«Посещаемость отмечается на каждом занятии и видна в кабинете родителя. Опоздание более чем на 10 минут на усмотрение преподавателя может быть отмечено как "не присутствовал". Пожалуйста, предупреждайте о пропуске минимум за день. При пропуске с предупреждением ученик может воспользоваться материалами урока группы или, если возможно, посетить занятие другой группы по той же теме. Пропуски без предупреждения из оплаты не вычитаются. Занятие, отменённое преподавателем, возмещается дополнительным занятием».</em></p>
</blockquote>
<p>Это лишь пример — адаптируйте цифры и условия под свой центр. Добавьте этот текст и в раздел FAQ на сайте, чтобы родитель видел правила ещё до записи.</p>

<h2>Для учебного центра: несколько преподавателей, несколько групп</h2>
<p>Для индивидуального репетитора посещаемость — простая задача. В учебном центре возникают дополнительные вопросы:</p>
<ul>
  <li><strong>Кто отмечает?</strong> Преподаватель, который ведёт занятие. Администратор проверяет записи, но не вносит их вместо преподавателя — иначе снова получатся записи по памяти.</li>
  <li><strong>А если есть помощник преподавателя?</strong> В Kursometr для него создаётся аккаунт ментора.</li>
  <li><strong>В группах подготовки к экзаменам посещаемость и результаты</strong> нужно отслеживать вместе: пропуски часто видны в результатах тестов. В Kursometr тесты с таймером открываются и закрываются в назначенное время, закрытые вопросы проверяются автоматически — посещаемость и результаты можно видеть в одном месте. Подробнее: <a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">как управлять курсами подготовки к экзаменам</a>.</li>
  <li><strong>Несколько филиалов, централизованная отчётность и собственные процессы</strong> — здесь готовой платформы может не хватить. В таких случаях RS Code разрабатывает индивидуальную систему: <a href="/kontakty">напишите нам</a>. Общее руководство: <a href="/blog-details/programma-dlya-uchebnogo-centra-2026">программа для учебного центра</a>.</li>
</ul>

<h2>Частые ошибки</h2>
<ul>
  <li><strong>Отмечать посещаемость после занятия, по памяти</strong> — к концу недели никто точно не помнит, кто был;</li>
  <li><strong>Вести одни и те же данные в нескольких местах</strong> — тетрадь, Excel и WhatsApp не совпадают;</li>
  <li><strong>Работать без письменных правил</strong> — опоздания и пропуски каждый раз обсуждаются заново;</li>
  <li><strong>Держать посещаемость отдельно от оплаты</strong> — на вопрос «почему такая сумма?» быстро не ответить;</li>
  <li><strong>Не реагировать на повторные пропуски</strong> — ученик молча уходит;</li>
  <li><strong>Сообщать родителям только о проблемах</strong> — доверие падает.</li>
</ul>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Предметы и группы созданы с понятными названиями, список каждой группы точен</li>
  <li>☐ Настроено недельное расписание — дата каждого занятия известна</li>
  <li>☐ Посещаемость отмечается на каждом занятии, до его окончания</li>
  <li>☐ Посещаемость ведётся в одном месте, а не параллельно в тетради, Excel и WhatsApp</li>
  <li>☐ Правила опозданий, пропусков, отработок и отменённых занятий записаны</li>
  <li>☐ Правила выдаются родителю при записи и есть в FAQ на сайте</li>
  <li>☐ Родитель видит посещаемость в своём кабинете</li>
  <li>☐ Посещаемость и оплата видны рядом, в одном месте</li>
  <li>☐ Раз в неделю проверяются повторные пропуски и идёт связь с родителями</li>
  <li>☐ Отдельные аккаунты для помощников преподавателя (например, аккаунт ментора в Kursometr)</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Чем электронный учёт посещаемости лучше бумажного журнала?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Электронная запись делается один раз, привязана к группам и недельному расписанию, не теряется и не требует переписывания. На платформе родитель тоже видит посещаемость в своём кабинете, а учёт оплат ведётся там же. Для нескольких индивидуальных учеников может хватить бумажного журнала, но с ростом числа групп и преподавателей электронный учёт надёжнее.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда нужно отмечать посещаемость?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">На каждом занятии, в начале или в первые минуты. Записи, сделанные после занятия по памяти, часто ошибочны и приводят к спорам. С платформой, которая работает в браузере телефона, это занимает минуту.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как родитель может видеть посещаемость ребёнка?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Самый прозрачный способ — чтобы родитель видел её сам. В Kursometr есть кабинет родителя, где видны посещаемость, оценки и результаты тестов ребёнка. Преподаватель отмечает посещаемость, а родитель видит те же данные, не дожидаясь отдельного сообщения.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли вычитать пропущенное занятие из оплаты?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Это зависит от модели оплаты и правил центра. Главное — заранее письменно договориться, как учитываются пропуски с предупреждением и без, отработки и занятия, отменённые преподавателем. Когда посещаемость и оплата в одном месте, на любой вопрос можно ответить с датами.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как поступать с опозданиями?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Определите, сколько минут опоздания фиксируется и с какого момента это считается неявкой, запишите это в положение о посещаемости и сообщите родителю при записи. Правило должно быть одинаковым для всех; с родителями ученика, который часто опаздывает, поговорите отдельно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как ведётся учёт посещаемости в Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Преподаватель открывает свою страницу (vashe-imya.kursometr.com), создаёт предметы и группы, настраивает недельное расписание и отмечает посещаемость на каждом занятии. Родитель видит посещаемость в кабинете родителя, а оплаты учеников учитываются на той же платформе. Платформа работает в браузере телефона, есть вход через Google, регистрация преподавателя бесплатна.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">Система домашних заданий: задать, проверить, отследить</a></li>
  <li><a href="/blog-details/programma-dlya-repetitorov-2026">Программа для репетиторов</a></li>
  <li><a href="/blog-details/programma-dlya-uchebnogo-centra-2026">Программа для учебного центра</a></li>
  <li><a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">Как управлять курсами подготовки к экзаменам</a></li>
</ul>

<h2>Итог</h2>
<p>Учёт посещаемости кажется мелочью, но в учебном центре на нём держатся доверие, оплата и удержание учеников. Настройте группы и недельное расписание, отмечайте посещаемость на каждом занятии в одном месте, письменно согласуйте правила опозданий и отработок, дайте родителю возможность видеть посещаемость самому и держите оплату рядом с посещаемостью. Когда всё это ведётся на одной платформе, а не в тетрадях и переписке, преподаватель экономит время, а споры «он же был в тот день» становятся редкостью.</p>
<p><strong>Хотите управлять посещаемостью, группами и оплатами в одном месте? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация преподавателя бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Если центру с несколькими филиалами нужна индивидуальная система: <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Текст положения о посещаемости — пример; адаптируйте цифры и условия под правила своего центра. Функции Kursometr описаны по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'elektron-davamiyyet-ucotu-kurs-merkezi-2027'],
            [
                'slug_en' => 'attendance-tracking-for-course-centres-2027',
                'slug_ru' => 'uchet-poseshchaemosti-uchebnyj-centr-2027',

                'title_az' => 'Elektron Davamiyyət Uçotu: Kurs Mərkəzi və Repetitor üçün Jurnal, Excel, yoxsa Kursometr (2027)',
                'title_en' => 'Electronic Attendance Tracking for Course Centres and Tutors: Paper Register, Excel or Kursometr (2027)',
                'title_ru' => 'Электронный учёт посещаемости для учебного центра и репетитора: журнал, Excel или Kursometr (2027)',

                'review_az' => 'Kurs mərkəzində və repetitorda davamiyyət necə aparılmalıdır? Niyə vacibdir, kağız jurnal, Excel/WhatsApp və Kursometr müqayisəsi, qruplar və cədvəl, valideyn kabineti, davamiyyət və ödəniş, gecikmə və kompensasiya dərsi qaydaları, yoxlama siyahısı.',
                'review_en' => 'How should a course centre or tutor track attendance? Why it matters, paper register vs Excel/WhatsApp vs Kursometr, groups and timetable, the parent portal, attendance and payments, late arrival and make-up lesson rules, and a checklist.',
                'review_ru' => 'Как вести посещаемость в учебном центре и у репетитора? Почему это важно, бумажный журнал, Excel/WhatsApp и Kursometr, группы и расписание, кабинет родителя, посещаемость и оплата, правила опозданий и отработок, чек-лист.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '4 Noyabr 2026',
                'date_en' => 'November 4, 2026',
                'date_ru' => '4 Ноября 2026',

                'photo'    => 'cover-attendance-az.png',
                'photo_en' => 'cover-attendance-en.png',
                'photo_ru' => 'cover-attendance-ru.png',

                'meta_title_az' => 'Elektron Davamiyyət Uçotu Kurs Mərkəzi 2027 | RS Code',
                'meta_title_en' => 'Attendance Tracking for Course Centres 2027 | RS Code',
                'meta_title_ru' => 'Учёт посещаемости в учебном центре 2027 | RS Code',

                'meta_description_az' => 'Kurs mərkəzi və repetitor üçün elektron davamiyyət: jurnal, Excel və Kursometr müqayisəsi, valideyn kabineti, ödənişlə əlaqə, gecikmə qaydaları, yoxlama siyahısı.',
                'meta_description_en' => 'Attendance tracking for course centres and tutors: paper vs Excel vs Kursometr, parent portal, the link to payments, late and make-up lesson rules, checklist.',
                'meta_description_ru' => 'Учёт посещаемости для учебного центра и репетитора: журнал, Excel или Kursometr, кабинет родителя, связь с оплатой, опоздания и отработки, чек-лист.',

                'meta_keywords_az' => 'davamiyyət uçotu, elektron davamiyyət, elektron jurnal, kurs mərkəzi davamiyyət, repetitor davamiyyət, valideyn kabineti, kursometr, 2027',
                'meta_keywords_en' => 'attendance tracking, course centre attendance, tutor attendance register, electronic register, parent portal, make-up lessons, kursometr, 2027',
                'meta_keywords_ru' => 'учёт посещаемости, электронный журнал посещаемости, посещаемость учебный центр, репетитор посещаемость, кабинет родителя, отработка занятий, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
