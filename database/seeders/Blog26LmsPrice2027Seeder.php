<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #26 "LMS sistemi qiyməti Azərbaycanda" — 2027 yenilənməsi (eyni DB sətri, yeni slug-lar, köhnələrdən 301 routes/web.php-də).
 * RS Code faktları YALNIZ resources/lang/{az,en,ru}/products.php (kursometr: müəllim qeydiyyatı pulsuz, funksiyalar) və
 * development.php x_prices ("Fərdi platforma 5 000+ AZN — CRM, POS, LMS"). Rəqib adları üzrə konkret qiymətlər çıxarıldı.
 * Moodle hostinq/quraşdırma/dəstək və ödəniş inteqrasiyası aralıqları köhnə #26-dan; sifarişlə LMS pillələri 5.000 ₼-dən başlayacaq şəkildə düzəldildi.
 * Bütün qalan aralıqlar "bazar təxmini" kimi verilir. Statistika iddia edilmir. GSC "lms" / "lms nədir" üçün qısa tərif + #87-yə keçid.
 * Backup: storage/app/blog26-pre2027-backup.json (ilk işləmədə).
 */
class Blog26LmsPrice2027Seeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Kurs mərkəzi, dil məktəbi, universitet və ya şirkətin təlim şöbəsi onlayn tədrisə keçmək istəyəndə ilk sual adətən belə olur: "LMS sistemi neçəyə başa gəlir?" Bir platforma aylıq abunə təklif edir, Moodle "pulsuzdur" deyilir, proqramçı isə sistemi sıfırdan yazmağı təklif edir. Hər təklif xərcin fərqli hissəsini göstərdiyi üçün onları müqayisə etmək çətindir: birində hostinq yoxdur, digərində video saxlama ayrıca ödənilir, üçüncüsündə dəstək qiymətə daxil deyil.</p>
<p>Bu bələdçidə 2027-ci il üçün Azərbaycanda LMS sistemi qiymətlərini üç modelə görə (hazır bulud platforması, öz serverinizdə Moodle və sifarişlə hazırlanan sistem) cədvəldə topladıq. Qiyməti dəyişən amilləri, illik və gizli xərcləri, üç real ssenari üzrə ümumi xərci və seçim siyahısını izah edirik. Məqsəd bir məhsulu tərifləmək yox, real rəqəmlərlə qərar verməyinizə kömək etməkdir.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Hazır bulud LMS aylıq neçəyədir?</td><td>Bazar təxmini: plan və istifadəçi sayına görə təxminən 60–800 ₼/ay. Müəllimlər üçün Kursometr-də qeydiyyat pulsuzdur</td></tr>
    <tr><td>Moodle pulsuzdurmu?</td><td>Proqram pulsuzdur, amma hostinq, quraşdırma və dəstəklə ildə təxminən 1.800–6.000 ₼ xərc yaranır</td></tr>
    <tr><td>Sifarişlə LMS neçəyədir?</td><td>Birdəfəlik 5.000 ₼-dən başlayır, geniş platforma 15.000–30.000 ₼ və daha çox, üstəgəl hostinq və dəstək</td></tr>
    <tr><td>Hansı sərfəlidir?</td><td>Müəllim və kiçik kurs üçün adətən hazır platforma. Xüsusi proses, inteqrasiya və çox istifadəçi olanda Moodle və ya sifarişlə sistemi hesablamağa dəyər</td></tr>
  </tbody>
</table>

<h2>LMS Nədir? Qısa Tərif</h2>
<p>LMS (Learning Management System) — tədrisin idarəetmə sistemidir: dərslər, materiallar, testlər, tapşırıqlar, davamiyyət və nəticələr bir platformada toplanır. Müəllim material yükləyir və test verir, tələbə öz qrupuna daxil olub dərsləri izləyir, rəhbər və ya valideyn isə nəticələri görür. Azərbaycan dilində çox vaxt "tədris idarəetmə sistemi" və ya "elektron tədris platforması" deyilir. Termini ilk dəfə eşidirsinizsə, əvvəlcə sadə izahı oxuyun: <a href="/blog-details/lms-nedir-2027">LMS nədir? Sadə izah</a>. Bu yazı isə qiymət tərəfinə fokuslanır.</p>

<h2>LMS Xərci Nədən İbarətdir</h2>
<p>"LMS qiyməti" deyəndə çoxları yalnız proqramın abunəsini və ya hazırlanma qiymətini nəzərdə tutur. Əslində ümumi xərc beş hissədən ibarətdir:</p>
<ul>
  <li><strong>Proqram:</strong> aylıq abunə, açıq mənbəli proqramın quraşdırılması və ya sifarişlə hazırlanma.</li>
  <li><strong>İnfrastruktur:</strong> server və ya hostinq, domen, SSL, yedəkləmə, video saxlama və yayım.</li>
  <li><strong>Başlanğıc işləri:</strong> quraşdırma, dizaynın brendə uyğunlaşdırılması, tələbə və qrupların daxil edilməsi, mövcud materialların köçürülməsi.</li>
  <li><strong>Məzmun:</strong> video dərslərin çəkilməsi, test bazasının hazırlanması. Bu xərc hər üç modeldə eynidir, amma çox vaxt büdcədə unudulur.</li>
  <li><strong>Davamlı xərclər:</strong> dəstək, yeniləmələr, təhlükəsizlik yamaqları, yeni funksiyalar və müəllimlərin öyrədilməsi.</li>
</ul>
<p>Təklifləri müqayisə edərkən bu beş hissəni ayrıca yazın. Yalnız aylıq abunəyə və ya yalnız hazırlanma qiymətinə baxmaq ən çox yayılmış səhvdir.</p>

<h2>2027 LMS Qiymətləri: Üç Model</h2>
<table>
  <thead>
    <tr><th>Model</th><th>Qiymət (₼)</th><th>Başlama müddəti</th><th>Kimə uyğundur</th></tr>
  </thead>
  <tbody>
    <tr><td>Hazır bulud platforması (SaaS)</td><td>Təxminən 60 – 800 / ay (bəzilərində pulsuz başlanğıc)</td><td>1 gün – 2 həftə</td><td>Müəllimlər, repetitorlar, kurs mərkəzləri, kiçik və orta şirkətlər</td></tr>
    <tr><td>Moodle (öz serverinizdə)</td><td>Quraşdırma 500 – 2.000 birdəfəlik, sonra təxminən 150 – 500 / ay</td><td>2–6 həftə</td><td>Universitetlər, böyük məktəblər, texniki komandası olan təşkilatlar</td></tr>
    <tr><td>Sifarişlə hazırlanan LMS</td><td>5.000-dən başlayır, geniş platforma 15.000 – 30.000+</td><td>6 həftə – 6 ay</td><td>Xüsusi iş prosesi, inteqrasiyalar, öz brendi ilə kurs biznesi</td></tr>
  </tbody>
</table>
<p>Rəqəmlər bazar təxminidir və funksiyalara, istifadəçi sayına, video həcminə və dəstək səviyyəsinə görə dəyişir. Beynəlxalq platformalar adətən qiyməti dollarla və istifadəçi sayına görə verir, ona görə manatla aylıq xərc məzənnə və plan dəyişdikcə dəyişə bilər. Aktual qiyməti hər zaman platformanın rəsmi saytında yoxlayın.</p>

<h3>Hazır bulud platforması</h3>
<p>Brauzerdə işləyir, server və quraşdırma tələb etmir. Yeniləmələr, yedəkləmə və təhlükəsizlik provayderin üzərindədir. Başlamaq ən sürətli yoldur: qeydiyyatdan keçirsiniz, qrup yaradırsınız və tələbələri dəvət edirsiniz. Mənfi tərəfləri: ödəniş hər ay davam edir, planın limitləri (aktiv istifadəçi, kurs, video həcmi) qiyməti müəyyən edir, funksiyalar isə platformanın təklif etdiyi ilə məhdudlaşır. Azərbaycan dilində interfeys və yerli bank kartı ilə ödəniş hər platformada olmur, bunu əvvəlcədən yoxlayın.</p>

<h3>Nümunə: Kursometr</h3>
<p>Müqayisə üçün RS Code-un hazırladığı <a href="/mehsullar/kursometr">Kursometr</a> platformasını göstəririk. Kursometr müəllim və repetitorların qruplarını, dərs cədvəlini, davamiyyəti, vaxtlı sınaqları, ev tapşırıqlarını, tələbə ödənişlərini və valideyn əlaqəsini bir yerdən idarə etməsi üçündür. Müəllim kimi qeydiyyat pulsuzdur: Google hesabı ilə daxil olub bir dəqiqəyə öz səhifənizi (adiniz.kursometr.com) açırsınız. Qapalı suallar avtomatik yoxlanır, valideyn kabinetində davamiyyət, qiymətlər və sınaq nəticələri görünür, köməkçi müəllimlər üçün mentor hesabı var. Müəllim, tələbə və valideyn bölmələri telefon brauzerində tam işləyir.</p>

<h3>Moodle: "pulsuz" proqramın real xərci</h3>
<p>Moodle açıq mənbəlidir, proqram lisenziyası ödənilmir və imkanları çox genişdir. Amma onu işlətmək üçün aşağıdakı xərclər yaranır (bazar təxmini):</p>
<ul>
  <li><strong>Hostinq və ya server:</strong> istifadəçi sayına görə təxminən 50–200 ₼/ay.</li>
  <li><strong>Quraşdırma və konfiqurasiya:</strong> təxminən 500–2.000 ₼ birdəfəlik.</li>
  <li><strong>Dəstək, yeniləmə və yedəkləmə:</strong> təxminən 100–300 ₼/ay.</li>
  <li><strong>Azərbaycan dili:</strong> tərcümə paketi qismən mövcuddur, tam və səliqəli interfeys əlavə iş tələb edir.</li>
  <li><strong>Yerli ödəniş inteqrasiyası:</strong> kurs satırsınızsa, təxminən 800–2.000 ₼ əlavə.</li>
</ul>
<p>Nəticədə Moodle-ın yalnız işlək saxlanması ildə təxminən 1.800–6.000 ₼ tutur, birinci il isə quraşdırma ilə birlikdə təxminən 2.300–8.000 ₼. Daxildə texniki işçisi olan universitet üçün bu məntiqlidir, kiçik kurs mərkəzi üçün isə çox vaxt ağırdır.</p>

<h3>Sifarişlə hazırlanan LMS</h3>
<p>Sistem sizin tədris prosesinizə uyğun yazılır: öz dizaynınız, Azərbaycan dilində tam interfeys, yerli ödəniş, daxili sistemlərlə inteqrasiya. RS Code-un <a href="/veb-saytlarin-hazirlanmasi">veb hazırlama səhifəsində</a> fərdi platformalar (CRM, POS, LMS, portal) üçün başlanğıc qiymət 5.000 AZN-dən göstərilir. Funksiyalara görə təxmini pillələr:</p>
<table>
  <thead>
    <tr><th>Paket</th><th>Qiymət (₼)</th><th>Müddət</th><th>Adətən daxildir</th></tr>
  </thead>
  <tbody>
    <tr><td>Başlanğıc LMS</td><td>5.000 – 8.000</td><td>6–10 həftə</td><td>Kurslar, qruplar, tələbə kabineti, testlər, tapşırıqlar, admin panel</td></tr>
    <tr><td>Orta LMS</td><td>8.000 – 15.000</td><td>3–4 ay</td><td>Üstəgəl onlayn ödəniş, sertifikat, canlı dərs inteqrasiyası, hesabatlar, bildirişlər</td></tr>
    <tr><td>Geniş platforma</td><td>15.000 – 30.000+</td><td>4–6 ay</td><td>Üstəgəl mobil tətbiq, çox filial və ya çox müəllif, API, korporativ sistemlərlə inteqrasiya</td></tr>
  </tbody>
</table>
<p>Kod sizə məxsus ola bilər və aylıq lisenziya ödənişi olmur, amma server, dəstək və yeni funksiyalar üçün davamlı büdcə lazımdır. "Sifarişlə sistem birdəfəlik ödənişdir" fikri yanlışdır.</p>

<h2>LMS Qiymətini Dəyişən 7 Amil</h2>
<h3>1. İstifadəçi sayı</h3>
<p>Hazır platformaların əksəriyyəti qiyməti aktiv istifadəçi və ya tələbə sayına bağlayır. 50 tələbədən 500 tələbəyə keçəndə abunə bir neçə dəfə arta bilər. Moodle və sifarişlə sistemdə isə istifadəçi sayı server gücünü və hostinq xərcini artırır.</p>
<h3>2. Video həcmi</h3>
<p>Video dərslər ən çox yer tutan və ən çox trafik yaradan məzmundur. Bir neçə saatlıq video ilə yüzlərlə saatlıq video arxivi arasında saxlama və yayım xərci çox fərqlidir. Videoların icazəsiz yüklənməsinə qarşı qoruma da əlavə xərc ola bilər.</p>
<h3>3. Testlər və qiymətləndirmə</h3>
<p>Sadə test əksər sistemlərdə var. Vaxtlı sınaqlar, sual bazası, təsadüfi sual seçimi, açıq sualların yoxlanması və ətraflı nəticə hesabatı funksiyanı və qiyməti artırır. Ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</p>
<h3>4. Ödəniş və kurs satışı</h3>
<p>Kursları onlayn satırsınızsa, yerli bank kartı ilə ödəniş, endirim kodları və avtomatik giriş açılması lazımdır. Hazır platformalarda bu bəzən yalnız baha planlarda olur, sifarişlə sistemdə isə ayrıca inteqrasiya işidir. Bax: <a href="/blog-details/onlayn-kurs-nece-yaradilir-2026">onlayn kurs necə yaradılır və satılır</a>.</p>
<h3>5. İnteqrasiyalar</h3>
<p>Canlı dərs xidməti, HR sistemi, CRM, mühasibat və ya tək giriş (SSO) ilə əlaqə qiyməti artırır. Hazır sistemdə inteqrasiya ya var, ya yoxdur; sifarişlə sistemdə hər inteqrasiya ayrıca işdir.</p>
<h3>6. Dizayn və dil</h3>
<p>Öz brendinizlə dizayn, üç dildə interfeys, sertifikatların öz şablonunuzla çapı əlavə iş tələb edir. Azərbaycan dilinin tam dəstəyi hər hazır platformada yoxdur.</p>
<h3>7. Dəstək səviyyəsi</h3>
<p>Sınaq günü sistem dayananda yüzlərlə tələbə gözləyir. İş saatından sonra dəstək, cavab müddətinə zəmanət və yerli dildə kömək fərqli qiymətlənir, ona görə dəstəyin sürəti qiymət qədər vacibdir.</p>

<h2>Gizli və İllik Xərclər: Təklifdə Nə Yazılmır</h2>
<ul>
  <li><strong>Hostinq və server:</strong> Moodle və sifarişlə sistemdə illik xərcdir və istifadəçi artdıqca böyüyür. Sifarişlə LMS üçün təxminən 300–1.500 ₼/il.</li>
  <li><strong>Video saxlama və yayım:</strong> videoları adi hostinqdə saxlamaq sistemi yavaşladır. Ayrıca video xidməti adətən həcm və baxış sayına görə aylıq ödəniş tələb edir.</li>
  <li><strong>Dəstək və yeniləmələr:</strong> Moodle-da versiya yeniləmələri və plaginlərin uyğunluğu, sifarişlə sistemdə proqramçı vaxtı. Təxminən 100–400 ₼/ay.</li>
  <li><strong>Plan limitləri:</strong> tələbə sayı artanda daha baha plana keçmək lazım ola bilər. Abunəni bu günkü yox, bir il sonrakı tələbə sayı ilə hesablayın.</li>
  <li><strong>Məlumatların köçürülməsi:</strong> tələbə siyahıları, qiymətlər və materialları Excel-dən və ya köhnə sistemdən daxil etmək vaxt aparır.</li>
  <li><strong>Müəllimlərin öyrədilməsi:</strong> mürəkkəb interfeys hər yeni müəllimlə yenidən öyrətmə xərci yaradır.</li>
  <li><strong>Çıxış xərci:</strong> platformanı dəyişəndə tələbə məlumatlarını və nəticələri ixrac edə bilməsəniz, hər şeyi yenidən daxil etməli olacaqsınız.</li>
  <li><strong>Mobil tətbiq:</strong> ayrıca mobil tətbiq ayrıca büdcədir. Çox vaxt telefon brauzerində yaxşı işləyən sistem kifayət edir. Bax: <a href="/blog-details/mobil-tetbiq-qiymeti-2027">mobil tətbiq qiyməti 2027</a>.</li>
</ul>

<h2>Real Xərc Hesabı: 3 Ssenari</h2>
<p>Aşağıdakı hesablamalar yuxarıdakı təxmini aralıqlara əsaslanan nümunələrdir. Video çəkilişi və məzmun hazırlığı daxil edilməyib, çünki bu xərc hər üç modeldə eynidir.</p>

<h3>Ssenari 1: Müəllim və ya repetitor (1–2 müəllim, 30–80 tələbə)</h3>
<ul>
  <li>Platforma: hazır sistem. Kursometr-də müəllim qeydiyyatı pulsuzdur; ödənişli hazır platformada kiçik plan təxminən 60–150 ₼/ay (ildə 720–1.800 ₼)</li>
  <li>Başlanğıc: qrupları və tələbələri özünüz əlavə edirsiniz — 0 ₼</li>
  <li>Avadanlıq: mövcud kompüter və telefon kifayətdir</li>
</ul>
<p><strong>Birinci il:</strong> pulsuz platformada 0 ₼, ödənişli platformada təxminən 720–1.800 ₼. Bu ölçüdə Moodle və ya sifarişlə sistem iqtisadi baxımdan mənasızdır. Ətraflı: <a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr?</a></p>

<h3>Ssenari 2: Kurs mərkəzi (5–10 müəllim, 200–400 tələbə)</h3>
<ul>
  <li><strong>Hazır platforma:</strong> təxminən 150–400 ₼/ay (ildə 1.800–4.800 ₼), başlanğıc 0–500 ₼. Birinci il 1.800–5.300 ₼, üç il 5.400–14.900 ₼.</li>
  <li><strong>Moodle:</strong> quraşdırma 500–2.000 ₼, hostinq və dəstək ildə 1.800–6.000 ₼. Birinci il 2.300–8.000 ₼, üç il 5.900–20.000 ₼.</li>
  <li><strong>Sifarişlə başlanğıc LMS:</strong> hazırlanma 5.000–8.000 ₼, hostinq və dəstək ildə 1.500–4.800 ₼. Birinci il 6.500–12.800 ₼, üç il 9.500–22.400 ₼.</li>
</ul>
<p>Kurs mərkəzi üçün adətən hazır platforma ən az risklidir. Sifarişlə sistem yalnız hazır həllər prosesinizi (məsələn, filiallar, öz ödəniş qaydalarınız, xüsusi hesabatlar) heç cür örtmədikdə məntiqlidir. Bax: <a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">tədris mərkəzi idarəetmə proqramı</a>.</p>

<h3>Ssenari 3: Şirkətin korporativ təlimi (300+ işçi, HR inteqrasiyası)</h3>
<ul>
  <li><strong>Sifarişlə geniş platforma:</strong> hazırlanma 15.000–30.000 ₼, server ildə 600–1.500 ₼, dəstək ayda 200–400 ₼ (ildə 2.400–4.800 ₼). Birinci il təxminən 18.000–36.300 ₼, üç il 24.000–48.900 ₼.</li>
  <li><strong>Hazır korporativ platforma:</strong> qiymət adətən aktiv istifadəçi sayına görə verilir — bir neçə provayderdən yazılı təklif alıb üç illik məbləği müqayisə edin.</li>
</ul>
<p>Şirkətlərdə əsas sual qiymətdən çox məlumatın harada saxlanması, tək giriş (SSO), HR sistemi ilə əlaqə və hesabatlardır. Ətraflı: <a href="/blog-details/korporativ-telim-ucun-platforma-2027">korporativ təlim üçün platforma</a>.</p>

<h2>Hansını Seçməli</h2>
<ul>
  <li><strong>Hazır platforma seçin</strong>, əgər tez başlamaq istəyirsinizsə, texniki işçiniz yoxdursa və standart funksiyalar (qruplar, testlər, tapşırıqlar, nəticələr) kifayət edirsə.</li>
  <li><strong>Moodle seçin</strong>, əgər daxildə texniki komandanız varsa, çoxlu istifadəçi və kurs var və geniş plagin ekosisteminə ehtiyacınız var.</li>
  <li><strong>Sifarişlə LMS seçin</strong>, əgər iş prosesiniz standart deyil, dərin inteqrasiya lazımdır, kursları öz brendinizlə satırsınız və davamlı inkişaf üçün büdcəniz var.</li>
</ul>
<p>Əmin deyilsinizsə, hazır platformadan başlayın: tələblərinizi real istifadədə görəcəksiniz və sonra sifarişlə sistem lazım olsa, texniki tapşırıq daha dəqiq olacaq.</p>

<h2>LMS Seçərkən Yoxlama Siyahısı</h2>
<ol>
  <li>Proqram, infrastruktur, başlanğıc, məzmun və dəstək xərclərini ayrıca yazdınızmı?</li>
  <li>Abunəni və ya illik xərci 36 ay üçün hesabladınızmı?</li>
  <li>Plan limitləri bir il sonrakı tələbə sayınıza çatırmı?</li>
  <li>İnterfeys Azərbaycan dilindədirmi və tələbələr telefondan rahat işləyə bilirmi?</li>
  <li>Testlər avtomatik yoxlanırmı, vaxtlı sınaq keçirmək olurmu?</li>
  <li>Videolar harada saxlanacaq və bunun aylıq xərci nə qədərdir?</li>
  <li>Yerli bank kartı ilə ödəniş lazımdırsa, mövcuddurmu?</li>
  <li>Tələbə məlumatlarını və nəticələri Excel-ə ixrac etmək olurmu?</li>
  <li>Rollar (admin, müəllim, tələbə, valideyn) və yedəkləmə varmı?</li>
  <li>Dəstək hansı dildə və hansı saatlarda işləyir?</li>
</ol>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">2027-ci ildə Azərbaycanda LMS sistemi neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hazır bulud platforması bazarda plan və istifadəçi sayına görə təxminən 60–800 ₼/ay, Moodle quraşdırma ilə birinci il təxminən 2.300–8.000 ₼, sifarişlə LMS isə birdəfəlik 5.000 ₼-dən başlayır, geniş platforma 15.000–30.000 ₼ və daha çox. Bəzi platformalarda, məsələn Kursometr-də, müəllim qeydiyyatı pulsuzdur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">LMS nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">LMS (Learning Management System) tədrisin idarəetmə sistemidir: dərslər, materiallar, testlər, tapşırıqlar, davamiyyət və nəticələr bir platformada idarə olunur. Məktəblər, universitetlər, kurs mərkəzləri, repetitorlar və şirkətlər istifadə edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Moodle pulsuzdurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Moodle proqramı açıq mənbəli və pulsuzdur, amma hostinq, quraşdırma, yeniləmə və dəstək xərc tələb edir. Bazar təxmininə görə işlək saxlanması ildə təxminən 1.800–6.000 ₼ tutur, quraşdırma isə 500–2.000 ₼.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Hazır LMS, yoxsa sifarişlə LMS sərfəlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Müəllim, repetitor və əksər kurs mərkəzləri üçün adətən hazır platforma sərfəlidir. Sifarişlə LMS iş prosesiniz standart olmayanda, dərin inteqrasiya lazım olanda və ya kursları öz brendinizlə satanda məntiqlidir. Sifarişlə sistemin hostinq və dəstək xərcini də hesablayın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sifarişlə LMS hazırlamaq nə qədər vaxt aparır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Başlanğıc LMS təxminən 6–10 həftə, ödəniş, sertifikat və hesabatları olan orta sistem 3–4 ay, mobil tətbiq və inteqrasiyaları olan geniş platforma 4–6 ay çəkir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">LMS-in gizli xərcləri hansılardır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hostinq və server, video saxlama və yayım, dəstək və yeniləmələr, tələbə sayı artanda baha plana keçid, məlumatların köçürülməsi, müəllimlərin öyrədilməsi və platformanı dəyişəndə məlumatların ixracı.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/lms-nedir-2027">LMS nədir? Sadə izah</a></li>
  <li><a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">Tədris mərkəzi idarəetmə proqramı</a></li>
  <li><a href="/blog-details/onlayn-kurs-nece-yaradilir-2026">Onlayn kurs necə yaradılır və satılır?</a></li>
  <li><a href="/blog-details/korporativ-telim-ucun-platforma-2027">Korporativ təlim üçün platforma</a></li>
  <li><a href="/mehsullar/kursometr">Kursometr — müəllimlər üçün dərs idarəetmə platforması</a></li>
</ul>

<h2>Nəticə</h2>
<p>2027-ci ildə LMS sisteminin real qiyməti yalnız abunə və ya hazırlanma qiymətindən ibarət deyil. Müəllim üçün xərc sıfırdan bir neçə yüz manata qədər, kurs mərkəzi üçün üç illik ümumi xərc modeldən asılı olaraq təxminən 5.400–22.400 ₼, korporativ sifarişlə platforma üçün isə 24.000 ₼-dən yuxarı olur. Qərar verməzdən əvvəl bütün xərcləri bir cədvəldə yazın, onları 36 ay üçün hesablayın və sistemi real tələbələrlə sınayın.</p>
<p><strong>Hazır həll axtarırsınız? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong>: müəllim qeydiyyatı pulsuzdur. Tədris prosesiniz üçün fərdi LMS lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>, tələblərinizə görə yazılı təklif hazırlayaq.</p>
<p><small><em>Qiymətlər noyabr 2026 vəziyyətinə görə təxmini bazar aralıqlarıdır. Üçüncü tərəf platformalarının qiymətləri və imkanları dəyişə bilər — rəsmi saytlarından yoxlayın. Kursometr məlumatları kursometr.com əsasında verilib.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>When a course centre, language school, university or a company's training team wants to move teaching online, the first question is usually the same: "How much does an LMS cost?" One platform offers a monthly subscription, people say Moodle is "free", and a developer offers to build the system from scratch. Each quote shows a different part of the cost, which makes them hard to compare: one leaves out hosting, another charges separately for video storage, and a third does not include support.</p>
<p>In this guide we have gathered LMS prices in Azerbaijan for 2027 into a table by three models: a ready-made cloud platform, Moodle on your own server and a custom-built system. We explain the factors that change the price, the yearly and hidden costs, the total cost for three real scenarios and a checklist for choosing. The goal is not to praise one product but to help you decide with real numbers.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>How much is a ready-made cloud LMS per month?</td><td>Market estimate: about 60–800 ₼/month depending on the plan and number of users. Teacher sign-up on Kursometr is free</td></tr>
    <tr><td>Is Moodle free?</td><td>The software is free, but hosting, setup and support cost about 1,800–6,000 ₼ a year</td></tr>
    <tr><td>How much is a custom LMS?</td><td>From 5,000 ₼ one-off; a full platform costs 15,000–30,000 ₼ or more, plus hosting and support</td></tr>
    <tr><td>Which is better value?</td><td>For teachers and small courses, usually a ready-made platform. With special workflows, integrations and many users, Moodle or a custom system is worth calculating</td></tr>
  </tbody>
</table>

<h2>What Is an LMS? A Short Definition</h2>
<p>An LMS (Learning Management System) is software for managing teaching: lessons, materials, tests, assignments, attendance and results are kept in one platform. The teacher uploads materials and sets tests, students join their group and follow the lessons, and managers or parents see the results. It is also called an e-learning platform or a learning platform. If the term is new to you, start with the simple explanation: <a href="/blog-details/what-is-an-lms-2027">What is an LMS? A simple guide</a>. This article focuses on the price side.</p>

<h2>What the Cost of an LMS Is Made Of</h2>
<p>When people say "LMS price", many mean only the software subscription or the development fee. In fact the total cost has five parts:</p>
<ul>
  <li><strong>Software:</strong> a monthly subscription, installing open-source software, or custom development.</li>
  <li><strong>Infrastructure:</strong> server or hosting, domain, SSL, backups, video storage and streaming.</li>
  <li><strong>Start-up work:</strong> installation, adapting the design to your brand, adding students and groups, moving existing materials.</li>
  <li><strong>Content:</strong> recording video lessons and building the question bank. This cost is the same in all three models, but it is often forgotten in the budget.</li>
  <li><strong>Ongoing costs:</strong> support, updates, security patches, new features and training teachers.</li>
</ul>
<p>When comparing quotes, write these five parts down separately. Looking only at the monthly subscription or only at the development fee is the most common mistake.</p>

<h2>LMS Prices in 2027: Three Models</h2>
<table>
  <thead>
    <tr><th>Model</th><th>Price (₼)</th><th>Time to start</th><th>Best for</th></tr>
  </thead>
  <tbody>
    <tr><td>Ready-made cloud platform (SaaS)</td><td>About 60 – 800 / month (some have a free start)</td><td>1 day – 2 weeks</td><td>Teachers, tutors, course centres, small and medium companies</td></tr>
    <tr><td>Moodle (on your own server)</td><td>Setup 500 – 2,000 one-off, then about 150 – 500 / month</td><td>2–6 weeks</td><td>Universities, large schools, organisations with a technical team</td></tr>
    <tr><td>Custom-built LMS</td><td>From 5,000; a full platform 15,000 – 30,000+</td><td>6 weeks – 6 months</td><td>Special workflows, integrations, a course business under its own brand</td></tr>
  </tbody>
</table>
<p>The figures are market estimates and vary with features, the number of users, video volume and the level of support. International platforms usually price in US dollars and per user, so the monthly cost in manats can change with the exchange rate and the plan. Always check the current price on the platform's official website.</p>

<h3>Ready-made cloud platform</h3>
<p>It runs in a browser and needs no server or installation. Updates, backups and security are handled by the provider. It is the fastest way to start: you sign up, create a group and invite students. The downsides: you keep paying every month, the plan limits (active users, courses, video storage) set the price, and the features are limited to what the platform offers. An interface in Azerbaijani and payments with local bank cards are not available on every platform, so check this in advance.</p>

<h3>Example: Kursometr</h3>
<p>For comparison, here is <a href="/mehsullar/kursometr">Kursometr</a>, a platform developed by RS Code. Kursometr lets teachers and tutors manage their groups, lesson schedule, attendance, timed tests, homework, student payments and contact with parents in one place. Signing up as a teacher is free: you sign in with your Google account and open your own page (yourname.kursometr.com) in a minute. Closed questions are graded automatically, parents see attendance, grades and test results in their own account, and there is a mentor account for assistant teachers. The teacher, student and parent sections work fully in a phone browser.</p>

<h3>Moodle: the real cost of "free" software</h3>
<p>Moodle is open source, there is no licence fee and its capabilities are very wide. But running it brings the following costs (market estimates):</p>
<ul>
  <li><strong>Hosting or server:</strong> about 50–200 ₼/month depending on the number of users.</li>
  <li><strong>Installation and configuration:</strong> about 500–2,000 ₼ one-off.</li>
  <li><strong>Support, updates and backups:</strong> about 100–300 ₼/month.</li>
  <li><strong>Azerbaijani language:</strong> a translation pack exists in part, but a complete and tidy interface takes extra work.</li>
  <li><strong>Local payment integration:</strong> if you sell courses, about 800–2,000 ₼ extra.</li>
</ul>
<p>As a result, just keeping Moodle running costs about 1,800–6,000 ₼ a year, and the first year with installation costs about 2,300–8,000 ₼. That makes sense for a university with its own technical staff, but it is often too heavy for a small course centre.</p>

<h3>Custom-built LMS</h3>
<p>The system is written around your teaching process: your own design, a full interface in Azerbaijani, local payments and integration with your internal systems. RS Code's <a href="/website-development">website development page</a> lists a starting price of 5,000 AZN for custom platforms (CRM, POS, LMS, portals). Approximate tiers by features:</p>
<table>
  <thead>
    <tr><th>Package</th><th>Price (₼)</th><th>Timeline</th><th>Usually includes</th></tr>
  </thead>
  <tbody>
    <tr><td>Starter LMS</td><td>5,000 – 8,000</td><td>6–10 weeks</td><td>Courses, groups, student accounts, tests, assignments, admin panel</td></tr>
    <tr><td>Mid-range LMS</td><td>8,000 – 15,000</td><td>3–4 months</td><td>Plus online payments, certificates, live lesson integration, reports, notifications</td></tr>
    <tr><td>Full platform</td><td>15,000 – 30,000+</td><td>4–6 months</td><td>Plus a mobile app, multiple branches or authors, an API, integration with corporate systems</td></tr>
  </tbody>
</table>
<p>The code can belong to you and there is no monthly licence fee, but you need an ongoing budget for the server, support and new features. The idea that "a custom system is a one-off payment" is wrong.</p>

<h2>7 Factors That Change the Price of an LMS</h2>
<h3>1. Number of users</h3>
<p>Most ready-made platforms tie the price to the number of active users or students. Moving from 50 to 500 students can multiply the subscription several times. With Moodle and a custom system, the number of users raises the server capacity and the hosting cost.</p>
<h3>2. Video volume</h3>
<p>Video lessons take up the most space and create the most traffic. The cost of storing and streaming a few hours of video is very different from an archive of hundreds of hours. Protection against unauthorised downloads can also be an extra cost.</p>
<h3>3. Tests and assessment</h3>
<p>Simple tests exist in most systems. Timed exams, a question bank, random question selection, marking open questions and detailed result reports add features and raise the price. More details: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</p>
<h3>4. Payments and course sales</h3>
<p>If you sell courses online, you need payments with local bank cards, discount codes and automatic access. On ready-made platforms this is sometimes only available on expensive plans; in a custom system it is a separate integration job. See: <a href="/blog-details/how-to-create-and-sell-online-course-2026">how to create and sell an online course</a>.</p>
<h3>5. Integrations</h3>
<p>Connecting to a live lesson service, an HR system, a CRM, accounting software or single sign-on (SSO) raises the price. In a ready-made system an integration either exists or it does not; in a custom system every integration is a separate job.</p>
<h3>6. Design and language</h3>
<p>A design in your own brand, an interface in three languages and certificates printed with your own template all take extra work. Full support for Azerbaijani is not available on every ready-made platform.</p>
<h3>7. Level of support</h3>
<p>When the system goes down on exam day, hundreds of students are left waiting. Support outside working hours, a guaranteed response time and help in the local language are priced differently, so the speed of support matters as much as the price.</p>

<h2>Hidden and Yearly Costs: What the Quote Does Not Say</h2>
<ul>
  <li><strong>Hosting and server:</strong> a yearly cost for Moodle and custom systems that grows with the number of users. About 300–1,500 ₼ a year for a custom LMS.</li>
  <li><strong>Video storage and streaming:</strong> keeping videos on ordinary hosting slows the system down. A separate video service usually charges monthly by storage and number of views.</li>
  <li><strong>Support and updates:</strong> version upgrades and plugin compatibility for Moodle, programmer time for a custom system. About 100–400 ₼ a month.</li>
  <li><strong>Plan limits:</strong> as student numbers grow, you may have to move to a more expensive plan. Calculate the subscription with next year's student numbers, not today's.</li>
  <li><strong>Data migration:</strong> entering student lists, grades and materials from Excel or an old system takes time.</li>
  <li><strong>Training teachers:</strong> a complicated interface means paying for training again with every new teacher.</li>
  <li><strong>Exit cost:</strong> if you cannot export student data and results when you switch platforms, you will have to enter everything again.</li>
  <li><strong>Mobile app:</strong> a separate mobile app is a separate budget. Often a system that works well in a phone browser is enough. See: <a href="/blog-details/mobile-app-development-cost-azerbaijan-2027">mobile app development cost 2027</a>.</li>
</ul>

<h2>The Real Cost: 3 Scenarios</h2>
<p>The calculations below are examples based on the estimated ranges above. Video recording and content preparation are not included, because they cost the same in all three models.</p>

<h3>Scenario 1: A teacher or tutor (1–2 teachers, 30–80 students)</h3>
<ul>
  <li>Platform: a ready-made system. Teacher sign-up on Kursometr is free; on a paid ready-made platform a small plan costs about 60–150 ₼/month (720–1,800 ₼ a year)</li>
  <li>Start-up: you add groups and students yourself — 0 ₼</li>
  <li>Hardware: your existing computer and phone are enough</li>
</ul>
<p><strong>First year:</strong> 0 ₼ on a free platform, about 720–1,800 ₼ on a paid one. At this size, Moodle or a custom system makes no economic sense. More details: <a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom, WhatsApp, Excel or Kursometr?</a></p>

<h3>Scenario 2: A course centre (5–10 teachers, 200–400 students)</h3>
<ul>
  <li><strong>Ready-made platform:</strong> about 150–400 ₼/month (1,800–4,800 ₼ a year), start-up 0–500 ₼. First year 1,800–5,300 ₼, three years 5,400–14,900 ₼.</li>
  <li><strong>Moodle:</strong> installation 500–2,000 ₼, hosting and support 1,800–6,000 ₼ a year. First year 2,300–8,000 ₼, three years 5,900–20,000 ₼.</li>
  <li><strong>Custom starter LMS:</strong> development 5,000–8,000 ₼, hosting and support 1,500–4,800 ₼ a year. First year 6,500–12,800 ₼, three years 9,500–22,400 ₼.</li>
</ul>
<p>For a course centre, a ready-made platform is usually the least risky option. A custom system only makes sense when ready-made solutions cannot cover your process at all (for example, branches, your own payment rules or special reports). See: <a href="/blog-details/training-centre-management-software-2026">training centre management software</a>.</p>

<h3>Scenario 3: Corporate training at a company (300+ employees, HR integration)</h3>
<ul>
  <li><strong>Custom full platform:</strong> development 15,000–30,000 ₼, server 600–1,500 ₼ a year, support 200–400 ₼ a month (2,400–4,800 ₼ a year). First year about 18,000–36,300 ₼, three years 24,000–48,900 ₼.</li>
  <li><strong>Ready-made corporate platform:</strong> the price is usually set per active user — get written quotes from several providers and compare the three-year totals.</li>
</ul>
<p>For companies, the main questions are less about price and more about where the data is stored, single sign-on (SSO), the link to the HR system and reporting. More details: <a href="/blog-details/corporate-training-platform-for-companies-2027">corporate training platform</a>.</p>

<h2>Which One to Choose</h2>
<ul>
  <li><strong>Choose a ready-made platform</strong> if you want to start quickly, you have no technical staff and standard features (groups, tests, assignments, results) are enough.</li>
  <li><strong>Choose Moodle</strong> if you have an in-house technical team, many users and courses, and you need its wide plugin ecosystem.</li>
  <li><strong>Choose a custom LMS</strong> if your workflow is not standard, you need deep integration, you sell courses under your own brand and you have a budget for ongoing development.</li>
</ul>
<p>If you are not sure, start with a ready-made platform: you will see your real requirements in daily use, and if you later need a custom system, the specification will be much more precise.</p>

<h2>Checklist for Choosing an LMS</h2>
<ol>
  <li>Have you written down software, infrastructure, start-up, content and support costs separately?</li>
  <li>Have you calculated the subscription or yearly cost over 36 months?</li>
  <li>Do the plan limits cover your student numbers a year from now?</li>
  <li>Is the interface available in Azerbaijani, and can students work comfortably from a phone?</li>
  <li>Are tests graded automatically, and can you run timed exams?</li>
  <li>Where will videos be stored, and what does that cost per month?</li>
  <li>If you need payments with local bank cards, are they available?</li>
  <li>Can you export student data and results to Excel?</li>
  <li>Are there roles (admin, teacher, student, parent) and backups?</li>
  <li>In which language and at what hours does support work?</li>
</ol>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does an LMS cost in Azerbaijan in 2027?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A ready-made cloud platform costs about 60–800 ₼/month on the market depending on the plan and number of users, Moodle costs about 2,300–8,000 ₼ in the first year including installation, and a custom LMS starts at 5,000 ₼ one-off, with a full platform at 15,000–30,000 ₼ or more. On some platforms, such as Kursometr, teacher sign-up is free.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is an LMS?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">An LMS (Learning Management System) is software for managing teaching: lessons, materials, tests, assignments, attendance and results are managed in one platform. Schools, universities, course centres, tutors and companies use it.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Moodle free?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Moodle's software is open source and free, but hosting, installation, updates and support cost money. By market estimates, keeping it running costs about 1,800–6,000 ₼ a year, and installation costs 500–2,000 ₼.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is a ready-made or a custom LMS better value?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">For teachers, tutors and most course centres, a ready-made platform is usually better value. A custom LMS makes sense when your workflow is not standard, when you need deep integration or when you sell courses under your own brand. Remember to include hosting and support for a custom system.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to build a custom LMS?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A starter LMS takes about 6–10 weeks, a mid-range system with payments, certificates and reports takes 3–4 months, and a full platform with a mobile app and integrations takes 4–6 months.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What are the hidden costs of an LMS?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hosting and server, video storage and streaming, support and updates, moving to a more expensive plan as student numbers grow, data migration, training teachers and exporting your data when you switch platforms.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/what-is-an-lms-2027">What is an LMS? A simple guide</a></li>
  <li><a href="/blog-details/training-centre-management-software-2026">Training centre management software</a></li>
  <li><a href="/blog-details/how-to-create-and-sell-online-course-2026">How to create and sell an online course</a></li>
  <li><a href="/blog-details/corporate-training-platform-for-companies-2027">Corporate training platform</a></li>
  <li><a href="/mehsullar/kursometr">Kursometr — class management platform for teachers</a></li>
</ul>

<h2>Conclusion</h2>
<p>In 2027, the real price of an LMS is not just the subscription or the development fee. For a teacher the cost ranges from zero to a few hundred manats, for a course centre the total three-year cost is about 5,400–22,400 ₼ depending on the model, and for a custom corporate platform it starts above 24,000 ₼. Before deciding, put all the costs in one table, calculate them over 36 months and test the system with real students.</p>
<p><strong>Looking for a ready-made solution? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher sign-up is free. If your teaching process needs a custom LMS, <a href="/contact">get in touch with us</a> and we will prepare a written quote based on your requirements.</p>
<p><small><em>Prices are approximate market ranges as of November 2026. Third-party platform prices and features may change — check their official websites. Kursometr information is based on kursometr.com.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Когда учебный центр, языковая школа, университет или отдел обучения компании хочет перейти на онлайн-обучение, первый вопрос обычно один и тот же: «Сколько стоит LMS?» Одна платформа предлагает ежемесячную подписку, про Moodle говорят, что он «бесплатный», а разработчик предлагает написать систему с нуля. Каждое предложение показывает свою часть расходов, поэтому сравнивать их трудно: в одном нет хостинга, в другом хранение видео оплачивается отдельно, в третьем не включена поддержка.</p>
<p>В этом руководстве мы собрали цены на LMS в Азербайджане на 2027 год в таблицу по трём моделям: готовая облачная платформа, Moodle на собственном сервере и система, разработанная на заказ. Мы объясняем факторы, которые меняют цену, ежегодные и скрытые расходы, совокупные расходы для трёх реальных сценариев и чек-лист выбора. Цель — не расхвалить один продукт, а помочь принять решение на основе реальных цифр.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Сколько стоит готовая облачная LMS в месяц?</td><td>Рыночная оценка: примерно 60–800 ₼/мес в зависимости от тарифа и числа пользователей. Регистрация учителя в Kursometr бесплатна</td></tr>
    <tr><td>Moodle бесплатный?</td><td>Программа бесплатна, но хостинг, установка и поддержка обходятся примерно в 1 800–6 000 ₼ в год</td></tr>
    <tr><td>Сколько стоит LMS на заказ?</td><td>От 5 000 ₼ единоразово, полноценная платформа — 15 000–30 000 ₼ и больше, плюс хостинг и поддержка</td></tr>
    <tr><td>Что выгоднее?</td><td>Для учителя и небольших курсов обычно готовая платформа. При особых процессах, интеграциях и большом числе пользователей стоит посчитать Moodle или систему на заказ</td></tr>
  </tbody>
</table>

<h2>Что такое LMS? Краткое определение</h2>
<p>LMS (Learning Management System) — система управления обучением: уроки, материалы, тесты, задания, посещаемость и результаты собраны на одной платформе. Учитель загружает материалы и даёт тесты, ученик входит в свою группу и следит за уроками, а руководитель или родитель видит результаты. По-русски её также называют СДО — системой дистанционного обучения, или платформой электронного обучения. Если термин для вас новый, начните с простого объяснения: <a href="/blog-details/chto-takoe-lms-2027">Что такое LMS? Простое объяснение</a>. Эта статья посвящена именно цене.</p>

<h2>Из чего складывается стоимость LMS</h2>
<p>Говоря «цена LMS», многие имеют в виду только подписку на программу или стоимость разработки. На деле общие расходы состоят из пяти частей:</p>
<ul>
  <li><strong>Программа:</strong> ежемесячная подписка, установка программы с открытым кодом или разработка на заказ.</li>
  <li><strong>Инфраструктура:</strong> сервер или хостинг, домен, SSL, резервные копии, хранение и трансляция видео.</li>
  <li><strong>Запуск:</strong> установка, адаптация дизайна под бренд, добавление учеников и групп, перенос существующих материалов.</li>
  <li><strong>Контент:</strong> запись видеоуроков и подготовка базы вопросов. Эти расходы одинаковы во всех трёх моделях, но о них часто забывают при планировании бюджета.</li>
  <li><strong>Постоянные расходы:</strong> поддержка, обновления, исправления безопасности, новые функции и обучение преподавателей.</li>
</ul>
<p>Сравнивая предложения, выпишите эти пять частей отдельно. Смотреть только на ежемесячную подписку или только на стоимость разработки — самая распространённая ошибка.</p>

<h2>Цены на LMS в 2027 году: три модели</h2>
<table>
  <thead>
    <tr><th>Модель</th><th>Цена (₼)</th><th>Срок запуска</th><th>Для кого</th></tr>
  </thead>
  <tbody>
    <tr><td>Готовая облачная платформа (SaaS)</td><td>Примерно 60 – 800 / мес (у некоторых есть бесплатный старт)</td><td>1 день – 2 недели</td><td>Учителя, репетиторы, учебные центры, малые и средние компании</td></tr>
    <tr><td>Moodle (на своём сервере)</td><td>Установка 500 – 2 000 единоразово, затем примерно 150 – 500 / мес</td><td>2–6 недель</td><td>Университеты, крупные школы, организации со своей технической командой</td></tr>
    <tr><td>LMS на заказ</td><td>От 5 000, полноценная платформа 15 000 – 30 000+</td><td>6 недель – 6 месяцев</td><td>Особые процессы, интеграции, курсовой бизнес под собственным брендом</td></tr>
  </tbody>
</table>
<p>Цифры — рыночные оценки, они зависят от функций, числа пользователей, объёма видео и уровня поддержки. Международные платформы обычно указывают цены в долларах и за пользователя, поэтому расходы в манатах могут меняться вместе с курсом и тарифом. Актуальную цену всегда проверяйте на официальном сайте платформы.</p>

<h3>Готовая облачная платформа</h3>
<p>Работает в браузере, не требует сервера и установки. Обновления, резервное копирование и безопасность — на стороне провайдера. Это самый быстрый способ начать: регистрируетесь, создаёте группу и приглашаете учеников. Минусы: платить приходится каждый месяц, цену определяют лимиты тарифа (активные пользователи, курсы, объём видео), а функции ограничены тем, что предлагает платформа. Интерфейс на азербайджанском языке и оплата местными банковскими картами есть не на каждой платформе — проверьте это заранее.</p>

<h3>Пример: Kursometr</h3>
<p>Для сравнения приведём <a href="/mehsullar/kursometr">Kursometr</a> — платформу, разработанную RS Code. Kursometr позволяет учителям и репетиторам управлять группами, расписанием уроков, посещаемостью, тестами по времени, домашними заданиями, оплатами учеников и связью с родителями из одного места. Регистрация учителя бесплатна: входите через Google-аккаунт и за минуту открываете свою страницу (vashe-imya.kursometr.com). Закрытые вопросы проверяются автоматически, в кабинете родителя видны посещаемость, оценки и результаты тестов, для помощников есть аккаунт ментора. Разделы учителя, ученика и родителя полностью работают в браузере телефона.</p>

<h3>Moodle: реальная стоимость «бесплатной» программы</h3>
<p>Moodle — программа с открытым кодом, лицензию оплачивать не нужно, а возможности очень широкие. Но для её работы возникают такие расходы (рыночная оценка):</p>
<ul>
  <li><strong>Хостинг или сервер:</strong> примерно 50–200 ₼/мес в зависимости от числа пользователей.</li>
  <li><strong>Установка и настройка:</strong> примерно 500–2 000 ₼ единоразово.</li>
  <li><strong>Поддержка, обновления и резервное копирование:</strong> примерно 100–300 ₼/мес.</li>
  <li><strong>Азербайджанский язык:</strong> языковой пакет существует частично, полный и аккуратный интерфейс требует дополнительной работы.</li>
  <li><strong>Интеграция местных платежей:</strong> если вы продаёте курсы, примерно 800–2 000 ₼ дополнительно.</li>
</ul>
<p>В итоге только поддержание Moodle в рабочем состоянии стоит примерно 1 800–6 000 ₼ в год, а первый год вместе с установкой — примерно 2 300–8 000 ₼. Для университета со своими техническими специалистами это оправдано, а для небольшого учебного центра часто слишком тяжело.</p>

<h3>LMS на заказ</h3>
<p>Система пишется под ваш учебный процесс: собственный дизайн, полный интерфейс на азербайджанском, местные платежи, интеграция с внутренними системами. На <a href="/razrabotka-sajtov">странице разработки сайтов</a> RS Code для индивидуальных платформ (CRM, POS, LMS, порталы) указана стартовая цена от 5 000 AZN. Ориентировочные уровни по функциям:</p>
<table>
  <thead>
    <tr><th>Пакет</th><th>Цена (₼)</th><th>Срок</th><th>Обычно включает</th></tr>
  </thead>
  <tbody>
    <tr><td>Базовая LMS</td><td>5 000 – 8 000</td><td>6–10 недель</td><td>Курсы, группы, кабинет ученика, тесты, задания, админ-панель</td></tr>
    <tr><td>Средняя LMS</td><td>8 000 – 15 000</td><td>3–4 месяца</td><td>Плюс онлайн-оплата, сертификаты, интеграция живых уроков, отчёты, уведомления</td></tr>
    <tr><td>Полноценная платформа</td><td>15 000 – 30 000+</td><td>4–6 месяцев</td><td>Плюс мобильное приложение, несколько филиалов или авторов, API, интеграция с корпоративными системами</td></tr>
  </tbody>
</table>
<p>Код может принадлежать вам, ежемесячной платы за лицензию нет, но нужен постоянный бюджет на сервер, поддержку и новые функции. Мнение, что «система на заказ — это разовый платёж», ошибочно.</p>

<h2>7 факторов, которые меняют цену LMS</h2>
<h3>1. Число пользователей</h3>
<p>Большинство готовых платформ привязывают цену к числу активных пользователей или учеников. Переход с 50 на 500 учеников может увеличить подписку в несколько раз. В Moodle и системе на заказ число пользователей повышает требования к серверу и стоимость хостинга.</p>
<h3>2. Объём видео</h3>
<p>Видеоуроки занимают больше всего места и создают больше всего трафика. Хранение и трансляция нескольких часов видео и архива в сотни часов стоят совсем по-разному. Защита от несанкционированного скачивания тоже может быть отдельной статьёй расходов.</p>
<h3>3. Тесты и оценивание</h3>
<p>Простые тесты есть в большинстве систем. Экзамены по времени, база вопросов, случайный выбор вопросов, проверка открытых ответов и подробные отчёты о результатах добавляют функции и повышают цену. Подробнее: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</p>
<h3>4. Оплата и продажа курсов</h3>
<p>Если вы продаёте курсы онлайн, нужны оплата местными банковскими картами, промокоды и автоматическое открытие доступа. На готовых платформах это иногда есть только в дорогих тарифах, в системе на заказ — это отдельная работа по интеграции. См.: <a href="/blog-details/kak-sozdat-i-prodavat-onlajn-kurs-2026">как создать и продавать онлайн-курс</a>.</p>
<h3>5. Интеграции</h3>
<p>Связь с сервисом живых уроков, HR-системой, CRM, бухгалтерией или единым входом (SSO) повышает цену. В готовой системе интеграция либо есть, либо её нет; в системе на заказ каждая интеграция — отдельная работа.</p>
<h3>6. Дизайн и язык</h3>
<p>Дизайн в вашем бренде, интерфейс на трёх языках, печать сертификатов по собственному шаблону требуют дополнительной работы. Полной поддержки азербайджанского языка нет на многих готовых платформах.</p>
<h3>7. Уровень поддержки</h3>
<p>Когда система падает в день экзамена, ждут сотни учеников. Поддержка вне рабочих часов, гарантированное время ответа и помощь на местном языке стоят по-разному, поэтому скорость поддержки важна не меньше цены.</p>

<h2>Скрытые и ежегодные расходы: о чём не пишут в предложении</h2>
<ul>
  <li><strong>Хостинг и сервер:</strong> ежегодный расход для Moodle и системы на заказ, который растёт вместе с числом пользователей. Для LMS на заказ — примерно 300–1 500 ₼ в год.</li>
  <li><strong>Хранение и трансляция видео:</strong> видео на обычном хостинге замедляет систему. Отдельный видеосервис обычно берёт ежемесячную плату за объём и число просмотров.</li>
  <li><strong>Поддержка и обновления:</strong> обновление версий и совместимость плагинов в Moodle, время программиста в системе на заказ. Примерно 100–400 ₼ в месяц.</li>
  <li><strong>Лимиты тарифа:</strong> с ростом числа учеников может понадобиться более дорогой тариф. Считайте подписку по числу учеников через год, а не на сегодня.</li>
  <li><strong>Перенос данных:</strong> ввод списков учеников, оценок и материалов из Excel или старой системы требует времени.</li>
  <li><strong>Обучение преподавателей:</strong> сложный интерфейс означает повторное обучение с каждым новым учителем.</li>
  <li><strong>Стоимость ухода:</strong> если при смене платформы нельзя выгрузить данные учеников и результаты, всё придётся вводить заново.</li>
  <li><strong>Мобильное приложение:</strong> отдельное приложение — отдельный бюджет. Часто достаточно системы, которая хорошо работает в браузере телефона. См.: <a href="/blog-details/stoimost-mobilnogo-prilozheniya-azerbaydzhan-2027">стоимость мобильного приложения 2027</a>.</li>
</ul>

<h2>Реальный расчёт расходов: 3 сценария</h2>
<p>Расчёты ниже — примеры на основе приведённых выше ориентировочных диапазонов. Съёмка видео и подготовка контента не включены, потому что эти расходы одинаковы во всех трёх моделях.</p>

<h3>Сценарий 1: учитель или репетитор (1–2 учителя, 30–80 учеников)</h3>
<ul>
  <li>Платформа: готовая система. Регистрация учителя в Kursometr бесплатна; на платной готовой платформе небольшой тариф стоит примерно 60–150 ₼/мес (720–1 800 ₼ в год)</li>
  <li>Запуск: группы и учеников вы добавляете сами — 0 ₼</li>
  <li>Оборудование: достаточно имеющегося компьютера и телефона</li>
</ul>
<p><strong>Первый год:</strong> 0 ₼ на бесплатной платформе, примерно 720–1 800 ₼ на платной. При таком масштабе Moodle или система на заказ экономически бессмысленны. Подробнее: <a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr?</a></p>

<h3>Сценарий 2: учебный центр (5–10 учителей, 200–400 учеников)</h3>
<ul>
  <li><strong>Готовая платформа:</strong> примерно 150–400 ₼/мес (1 800–4 800 ₼ в год), запуск 0–500 ₼. Первый год 1 800–5 300 ₼, три года 5 400–14 900 ₼.</li>
  <li><strong>Moodle:</strong> установка 500–2 000 ₼, хостинг и поддержка 1 800–6 000 ₼ в год. Первый год 2 300–8 000 ₼, три года 5 900–20 000 ₼.</li>
  <li><strong>Базовая LMS на заказ:</strong> разработка 5 000–8 000 ₼, хостинг и поддержка 1 500–4 800 ₼ в год. Первый год 6 500–12 800 ₼, три года 9 500–22 400 ₼.</li>
</ul>
<p>Для учебного центра готовая платформа обычно наименее рискованна. Система на заказ имеет смысл, только если готовые решения никак не покрывают ваш процесс (например, филиалы, собственные правила оплаты, особые отчёты). См.: <a href="/blog-details/programma-dlya-uchebnogo-centra-2026">программа для управления учебным центром</a>.</p>

<h3>Сценарий 3: корпоративное обучение в компании (300+ сотрудников, интеграция с HR)</h3>
<ul>
  <li><strong>Полноценная платформа на заказ:</strong> разработка 15 000–30 000 ₼, сервер 600–1 500 ₼ в год, поддержка 200–400 ₼ в месяц (2 400–4 800 ₼ в год). Первый год примерно 18 000–36 300 ₼, три года 24 000–48 900 ₼.</li>
  <li><strong>Готовая корпоративная платформа:</strong> цена обычно рассчитывается за активного пользователя — запросите письменные предложения у нескольких провайдеров и сравните суммы за три года.</li>
</ul>
<p>Для компаний главный вопрос — не столько цена, сколько место хранения данных, единый вход (SSO), связь с HR-системой и отчётность. Подробнее: <a href="/blog-details/platforma-dlya-korporativnogo-obucheniya-2027">платформа для корпоративного обучения</a>.</p>

<h2>Что выбрать</h2>
<ul>
  <li><strong>Выбирайте готовую платформу</strong>, если хотите начать быстро, у вас нет технических специалистов и стандартных функций (группы, тесты, задания, результаты) достаточно.</li>
  <li><strong>Выбирайте Moodle</strong>, если у вас есть своя техническая команда, много пользователей и курсов и нужна широкая экосистема плагинов.</li>
  <li><strong>Выбирайте LMS на заказ</strong>, если ваш процесс нестандартный, нужна глубокая интеграция, вы продаёте курсы под собственным брендом и есть бюджет на постоянное развитие.</li>
</ul>
<p>Если не уверены, начните с готовой платформы: вы увидите свои реальные требования в работе, и если позже понадобится система на заказ, техническое задание будет гораздо точнее.</p>

<h2>Чек-лист выбора LMS</h2>
<ol>
  <li>Выписали ли вы отдельно расходы на программу, инфраструктуру, запуск, контент и поддержку?</li>
  <li>Посчитали ли вы подписку или годовые расходы на 36 месяцев?</li>
  <li>Хватит ли лимитов тарифа на число учеников через год?</li>
  <li>Есть ли интерфейс на азербайджанском языке и удобно ли ученикам работать с телефона?</li>
  <li>Проверяются ли тесты автоматически, можно ли проводить экзамены по времени?</li>
  <li>Где будут храниться видео и сколько это стоит в месяц?</li>
  <li>Если нужна оплата местными банковскими картами, есть ли она?</li>
  <li>Можно ли выгрузить данные учеников и результаты в Excel?</li>
  <li>Есть ли роли (администратор, учитель, ученик, родитель) и резервное копирование?</li>
  <li>На каком языке и в какие часы работает поддержка?</li>
</ol>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит LMS в Азербайджане в 2027 году?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Готовая облачная платформа на рынке стоит примерно 60–800 ₼/мес в зависимости от тарифа и числа пользователей, Moodle в первый год с установкой — примерно 2 300–8 000 ₼, LMS на заказ — от 5 000 ₼ единоразово, полноценная платформа — 15 000–30 000 ₼ и больше. На некоторых платформах, например в Kursometr, регистрация учителя бесплатна.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое LMS?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">LMS (Learning Management System) — система управления обучением: уроки, материалы, тесты, задания, посещаемость и результаты управляются на одной платформе. Её используют школы, университеты, учебные центры, репетиторы и компании.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Moodle бесплатный?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Программа Moodle с открытым кодом и бесплатна, но хостинг, установка, обновления и поддержка стоят денег. По рыночной оценке поддержание её работы обходится примерно в 1 800–6 000 ₼ в год, а установка — в 500–2 000 ₼.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что выгоднее: готовая LMS или LMS на заказ?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Для учителей, репетиторов и большинства учебных центров обычно выгоднее готовая платформа. LMS на заказ имеет смысл, когда процесс нестандартный, нужна глубокая интеграция или вы продаёте курсы под собственным брендом. Не забудьте учесть хостинг и поддержку системы на заказ.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает разработка LMS на заказ?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Базовая LMS — примерно 6–10 недель, средняя система с оплатой, сертификатами и отчётами — 3–4 месяца, полноценная платформа с мобильным приложением и интеграциями — 4–6 месяцев.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какие скрытые расходы есть у LMS?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Хостинг и сервер, хранение и трансляция видео, поддержка и обновления, переход на более дорогой тариф с ростом числа учеников, перенос данных, обучение преподавателей и выгрузка данных при смене платформы.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/chto-takoe-lms-2027">Что такое LMS? Простое объяснение</a></li>
  <li><a href="/blog-details/programma-dlya-uchebnogo-centra-2026">Программа для управления учебным центром</a></li>
  <li><a href="/blog-details/kak-sozdat-i-prodavat-onlajn-kurs-2026">Как создать и продавать онлайн-курс</a></li>
  <li><a href="/blog-details/platforma-dlya-korporativnogo-obucheniya-2027">Платформа для корпоративного обучения</a></li>
  <li><a href="/mehsullar/kursometr">Kursometr — платформа управления уроками для учителей</a></li>
</ul>

<h2>Итог</h2>
<p>В 2027 году реальная цена LMS — это не только подписка или стоимость разработки. Для учителя расходы составляют от нуля до нескольких сотен манатов, для учебного центра совокупные расходы за три года — примерно 5 400–22 400 ₼ в зависимости от модели, а для корпоративной платформы на заказ — от 24 000 ₼. Перед решением сведите все расходы в одну таблицу, посчитайте их на 36 месяцев и проверьте систему на реальных учениках.</p>
<p><strong>Ищете готовое решение? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация учителя бесплатна. Если вашему учебному процессу нужна индивидуальная LMS, <a href="/kontakty">свяжитесь с нами</a>, и мы подготовим письменное предложение под ваши требования.</p>
<p><small><em>Цены — ориентировочные рыночные диапазоны по состоянию на ноябрь 2026 года. Цены и возможности сторонних платформ могут меняться — проверяйте их на официальных сайтах. Информация о Kursometr указана по данным kursometr.com.</em></small></p>
HTML;

        $old = [
            'az' => 'lms-sistemi-qiymeti-azerbaycanda-2026',
            'en' => 'lms-system-cost-azerbaijan-2026',
            'ru' => 'stoimost-lms-sistemy-azerbajdzan-2026',
        ];
        $new = [
            'az' => 'lms-sistemi-qiymeti-azerbaycan-2027',
            'en' => 'lms-price-azerbaijan-2027',
            'ru' => 'stoimost-lms-sistemy-azerbaydzhan-2027',
        ];

        $row = DB::table('blogs')->whereIn('slug_az', [$old['az'], $new['az']])->orderBy('id')->first();
        $backup = storage_path('app/blog26-pre2027-backup.json');
        if ($row && $row->slug_az === $old['az'] && ! file_exists($backup)) {
            file_put_contents($backup, json_encode($row, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }

        $data = [
            'slug_az' => $new['az'],
            'slug_en' => $new['en'],
            'slug_ru' => $new['ru'],
            'title_az' => 'LMS Sistemi Qiyməti Azərbaycanda 2027: Hazır Platforma, Moodle, yoxsa Sifarişlə — Real Xərc Hesabı',
            'title_en' => 'LMS Price in Azerbaijan 2027: Ready-Made Platform, Moodle or Custom — The Real Cost Breakdown',
            'title_ru' => 'Стоимость LMS-системы в Азербайджане 2027: готовая платформа, Moodle или на заказ — реальный расчёт',
            'review_az' => '2027-ci ildə Azərbaycanda LMS sistemi neçəyə başa gəlir: hazır bulud platforması təxminən 60–800 ₼/ay, Moodle-ın real illik xərci, sifarişlə LMS 5.000 ₼-dən. Qiyməti dəyişən 7 amil, hostinq və video kimi gizli xərclər, 3 ssenari üzrə ümumi xərc, seçim siyahısı və LMS-in qısa tərifi.',
            'review_en' => 'How much an LMS costs in Azerbaijan in 2027: a ready-made cloud platform at about 60–800 ₼/month, the real yearly cost of Moodle, and a custom LMS from 5,000 ₼. 7 factors that change the price, hidden costs such as hosting and video, total cost for 3 scenarios, a checklist and a short definition of an LMS.',
            'review_ru' => 'Сколько стоит LMS в Азербайджане в 2027 году: готовая облачная платформа примерно 60–800 ₼/мес, реальные годовые расходы на Moodle, LMS на заказ от 5 000 ₼. 7 факторов цены, скрытые расходы на хостинг и видео, совокупные расходы для 3 сценариев, чек-лист и краткое определение LMS.',
            'date_az' => '24 Noyabr 2026',
            'date_en' => 'November 24, 2026',
            'date_ru' => '24 Ноября 2026',
            'photo' => 'cover-lms-price-2027-az.png',
            'photo_en' => 'cover-lms-price-2027-en.png',
            'photo_ru' => 'cover-lms-price-2027-ru.png',
            'meta_title_az' => 'LMS Sistemi Qiyməti 2027: Hazır, Moodle, Sifarişlə | RS Code',
            'meta_title_en' => 'LMS Price in Azerbaijan 2027: Ready, Moodle, Custom | RS Code',
            'meta_title_ru' => 'Стоимость LMS 2027: готовая, Moodle, на заказ | RS Code',
            'meta_description_az' => 'LMS sistemi neçəyə başa gəlir? Hazır platforma 60–800 ₼/ay, Moodle ildə 1.800–6.000 ₼, sifarişlə LMS 5.000 ₼-dən. Gizli xərclər, 3 ssenari və seçim siyahısı.',
            'meta_description_en' => 'How much does an LMS cost? Ready-made platform 60–800 ₼/month, Moodle 1,800–6,000 ₼ a year, custom LMS from 5,000 ₼. Hidden costs, 3 scenarios and a checklist.',
            'meta_description_ru' => 'Сколько стоит LMS? Готовая платформа 60–800 ₼/мес, Moodle 1 800–6 000 ₼ в год, LMS на заказ от 5 000 ₼. Скрытые расходы, 3 сценария и чек-лист.',
            'meta_keywords_az' => 'lms sistemi qiyməti, lms qiyməti 2027, lms, lms nədir, moodle qiyməti, sifarişlə lms, onlayn kurs platforması, tədris platforması, azərbaycan',
            'meta_keywords_en' => 'lms price azerbaijan, lms cost 2027, lms, moodle cost, custom lms development cost, online course platform price, e-learning platform baku',
            'meta_keywords_ru' => 'стоимость lms, цена lms системы 2027, lms, сдо, moodle стоимость, lms на заказ, платформа онлайн-курсов цена, азербайджан',
            'text_az' => $textAz,
            'text_en' => $textEn,
            'text_ru' => $textRu,
            'updated_at' => now(),
        ];

        if ($row) {
            DB::table('blogs')->where('id', $row->id)->update($data);
        } else {
            DB::table('blogs')->insert($data + ['created_at' => now()]);
        }

        // Digər bloqlardakı köhnə linkləri yeni slug-a çevir (301 hop-u olmasın).
        foreach (DB::table('blogs')->get(['id', 'text_az', 'text_en', 'text_ru']) as $b) {
            $upd = [];
            foreach (['az', 'en', 'ru'] as $l) {
                $t = (string) $b->{"text_$l"};
                $n = str_replace('/blog-details/'.$old[$l].'"', '/blog-details/'.$new[$l].'"', $t);
                // Yeni #26 slug-una gedən linklərin anker mətnindəki sondakı "2026" → "2027".
                $n = preg_replace_callback(
                    '~(<a href="/blog-details/'.preg_quote($new[$l], '~').'"[^>]*>[^<]*?)2026(</a>)~u',
                    fn ($m) => $m[1].'2027'.$m[2],
                    $n
                );
                if ($n !== $t) {
                    $upd["text_$l"] = $n;
                }
            }
            if ($upd) {
                DB::table('blogs')->where('id', $b->id)->update($upd);
            }
        }
    }
}
