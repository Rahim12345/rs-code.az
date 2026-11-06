<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #81 — Sürücü kursu üçün idarəetmə proqramı (2027): avtomobil sürücülük kursu, sürücü hazırlığı mərkəzi.
 * Nəzəriyyə (yol hərəkəti qaydaları) qrupları və həftəlik cədvəl, təlimatçı üzrə təcrübi sürüş dərslərinin cədvəli (avtomobil/marşrut bronu
 * İDDİA EDİLMİR — yalnız "cədvəl"), nəzəriyyə dərslərində davamiyyət, vaxtlı nəzəriyyə sınaqları (qapalı suallar avtomatik), məktəbin ÖZ PDF
 * test toplusundan sual bazası (rəsmi dövlət imtahanı sualları daxil olduğu İDDİA EDİLMİR; istifadə hüququnu məktəb özü yoxlamalıdır),
 * imtahan dövlət qurumunda verilir (prosedur, rüsum, qaydalar təsvir EDİLMİR), təlimatçılar mentor hesabı kimi, kurs haqqının hissə-hissə ödənişinin
 * izlənməsi, yalnız qrupa görünən materiallar/dərs yazıları (qayda izahları, yol nişanları), telefon brauzerində test məşqi,
 * kağız jurnal + WhatsApp + Excel-dən keçid, müqayisə, daxili sınaq imtahanı ilə hazırlıq yoxlaması, zəif mövzuların izlənməsi, qurulum siyahısı.
 * Kursometr faktları yalnız #75–#80 ilə eynidir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət, vaxtlı sınaqlar (təyin olunan saatda
 * açılıb-bağlanır, qapalı suallar avtomatik), PDF test toplusu → sual bazası, ev tapşırığı (fayl ilə verilir, tələbə kabinetdən təhvil verir),
 * ödəniş izləmə, valideyn kabineti (davamiyyət, qiymətlər, sınaq nəticələri), mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar,
 * telefon brauzeri, Google ilə giriş, pulsuz müəllim qeydiyyatı.
 * Avtomobil/marşrut bronu, dövlət imtahan sistemləri ilə inteqrasiya, SMS/push, avtomatik xatırlatma, onlayn ödəniş, mobil tətbiq, sertifikat,
 * qiymət və bazar statistikası İDDİA EDİLMİR. Fərdi sistem → /elaqe.
 */
class Blog81DrivingSchoolSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Sürücü kursu iki fərqli dünyanı birləşdirir. Bir tərəfdə sinif otağı var: axşam saatlarında yol hərəkəti qaydaları üzrə nəzəriyyə qrupu toplaşır, müəllim yol nişanlarını, nişanlanma xətlərini və kəsişmələrdə hərəkət qaydasını izah edir. Digər tərəfdə avtomobil və təlimatçı var: hər tələbə ilə ayrıca, fərdi qaydada təcrübi sürüş dərsi keçirilir. Bir tələbə səhər işdən əvvəl sürmək istəyir, digəri yalnız şənbə günü vaxt tapır, üçüncüsü nəzəriyyəni bitirib, amma kurs haqqının ikinci hissəsini hələ ödəməyib. Bütün bunlar adətən kağız jurnalda, təlimatçının telefonundakı WhatsApp yazışmalarında və administratorun Excel cədvəlində aparılır — və "bu tələbə imtahana hazırdırmı?" sualına heç kim dəqiq cavab verə bilmir.</p>
<p>Bu yazı 2027-ci ildə sürücü kursu və ya sürücü hazırlığı mərkəzi idarə edən sahibkarlar, administratorlar, nəzəriyyə müəllimləri və təlimatçılar üçündür. Nəzəriyyə qruplarını və həftəlik cədvəli, təlimatçı üzrə sürüş dərslərinin cədvəlini, davamiyyəti, vaxtlı nəzəriyyə sınaqlarını və məktəbin öz test toplusundan qurulan sual bazasını, təlimatçı hesablarını, hissə-hissə ödənişlərin izlənməsini və yalnız qrupa görünən materialları addım-addım nəzərdən keçiririk. Sonda kağız jurnal + WhatsApp + Excel ilə <a href="/mehsullar/kursometr">Kursometr</a> müqayisəsi, imtahana hazırlıq üzrə praktik məsləhətlər və qurulum siyahısı var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Sürücü kursunu nə fərqləndirir?</td><td>Qrup halında nəzəriyyə dərsləri ilə yanaşı hər tələbə üçün təlimatçı ilə fərdi sürüş dərsləri</td></tr>
    <tr><td>Nəzəriyyə necə təşkil olunmalıdır?</td><td>Sabit həftəlik cədvəli olan qruplar və hər dərsdə qeyd olunan davamiyyət</td></tr>
    <tr><td>Sürüş dərsləri necə planlaşdırılmalıdır?</td><td>Hər təlimatçının öz həftəlik cədvəli ilə — kim, hansı gün, hansı saatda</td></tr>
    <tr><td>Test məşqi necə aparılmalıdır?</td><td>Vaxtlı sınaqlarla: qapalı suallar avtomatik yoxlanır, tələbə telefonda məşq edir</td></tr>
    <tr><td>Test sualları haradan gəlir?</td><td>Məktəbin öz PDF test toplusundan — istifadə hüququnu əvvəlcədən yoxlayın</td></tr>
    <tr><td>Kurs haqqı necə izlənməlidir?</td><td>Hər tələbənin hissə-hissə ödənişləri bir yerdə: kim ödəyib, kimin borcu qalıb</td></tr>
    <tr><td>Hansı sistem?</td><td>Qrup, cədvəl, davamiyyət, sınaq, material və ödəniş bir yerdə — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Sürücü Kursu Niyə Fərqli İdarə Olunur</h2>
<p>Adi kurs mərkəzində tələbə qrupa yazılır, həftədə bir neçə dəfə dərsə gəlir və proqramı qrupla birlikdə keçir. Sürücü kursunda isə hər tələbənin iki paralel yolu var. Nəzəriyyədə o, qrupun bir hissəsidir: hamı eyni mövzunu, eyni gündə keçir. Təcrübədə isə tamamilə fərdidir: təlimatçı ilə təkbətək dərs, tələbənin vaxtına və təlimatçının boş saatlarına uyğunlaşdırılmış cədvəl. Bu iki yol fərqli sürətlə irəliləyir — biri nəzəriyyəni tez mənimsəyir, amma sükan arxasında çətinlik çəkir, digəri əksinə.</p>
<p>Üstəlik, kursun sonunda tələbəni sürücülük vəsiqəsi üçün imtahan gözləyir və bu imtahan kursun özündə deyil, səlahiyyətli dövlət qurumunda verilir. Kursun vəzifəsi tələbəni həm nəzəriyyədən, həm də praktikadan buna hazırlamaqdır. İmtahanın rəsmi qaydaları, prosedurları və tələbləri barədə tələbələrə məlumatı yalnız səlahiyyətli qurumun rəsmi mənbələrinə əsaslanaraq verin — bu yazı həmin qaydaları təsvir etmir.</p>
<table>
  <thead>
    <tr><th>Komponent</th><th>Format</th><th>Əsas çətinlik</th><th>Sistemdə nə lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Nəzəriyyə (yol hərəkəti qaydaları)</td><td>Qrup dərsi, sinif otağında</td><td>Buraxılan mövzular, kimin hansı dərsdə olduğu</td><td>Qruplar, həftəlik cədvəl, davamiyyət</td></tr>
    <tr><td>Test məşqi</td><td>Fərdi, evdə və ya kursda</td><td>Kağız testlərin əl ilə yoxlanması</td><td>Vaxtlı sınaqlar, sual bazası, avtomatik yoxlama</td></tr>
    <tr><td>Təcrübi sürüş</td><td>Təlimatçı ilə fərdi dərs</td><td>Kim, hansı gün, hansı təlimatçı ilə</td><td>Təlimatçı üzrə həftəlik cədvəl</td></tr>
    <tr><td>Kurs haqqı</td><td>Çox vaxt hissə-hissə</td><td>Qalıq borcun unudulması</td><td>Ödəniş izləmə</td></tr>
  </tbody>
</table>

<h2>2. Nəzəriyyə Qrupları və Həftəlik Cədvəl</h2>
<p>Nəzəriyyə dərsləri kursun "məktəb" hissəsidir. Qrupları başlama tarixinə və vaxtına görə qurun: "Nəzəriyyə — səhər qrupu", "Nəzəriyyə — axşam qrupu", "Nəzəriyyə — həftəsonu qrupu". İşləyən tələbələr üçün axşam və həftəsonu qrupları adətən daha çox tələb olunur, tələbələr və evdar qadınlar isə gündüz qruplarını seçir. Hər qrupun dərs günləri, saatı və müəllimi həftəlik cədvəldə sabit olsun.</p>
<p>Nəzəriyyə proqramını mövzulara bölün: yol nişanları, nişanlanma, svetoforlar və tənzimləyicinin işarələri, kəsişmələrdən keçmə, ötmə və manevr, dayanma və durma, xüsusi hallar, ilk tibbi yardım əsasları və s. — məktəbinizin proqramı nə tələb edirsə. Hər dərsin mövzusu bəlli olanda tələbə buraxdığı mövzunu dəqiq bilir və onu başqa qrupun dərsində və ya materiallardan təkrar edə bilir.</p>
<p><a href="/mehsullar/kursometr">Kursometr</a>-də fənlər və qruplar yaradılır, hər qrup üçün həftəlik cədvəl qurulur, davamiyyət də bu cədvələ əsasən aparılır. Hər məktəb öz səhifəsini (adiniz.kursometr.com) açır və tələbələr ora öz hesabları ilə, o cümlədən Google hesabı ilə daxil olur.</p>
<h3>Nəzəriyyə dərslərində davamiyyət</h3>
<p>Nəzəriyyədə buraxılan dərs sonradan imtahanda səhv cavab kimi qayıdır. Davamiyyəti hər dərsdə, dərsin özündə qeyd edin. Kursometr-də bunu telefon brauzerindən etmək olur — müəllim sinifdə kompüter axtarmır. Ay sonunda kimin hansı mövzunu buraxdığı bir baxışla görünür, ardıcıl bir neçə dərsə gəlməyən tələbə isə vaxtında diqqətə düşür və onunla əlaqə saxlamaq olur. Ətraflı: <a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">elektron davamiyyət uçotu</a>.</p>

<h2>3. Təlimatçı üzrə Sürüş Dərslərinin Cədvəli</h2>
<p>Təcrübi sürüş dərsləri kursun ən çox koordinasiya tələb edən hissəsidir. Təlimatçının günü dolu olur, tələbələr vaxt dəyişmək istəyir, bir dərs ləğv olunanda boş qalan saatı başqa tələbəyə vermək lazımdır. Əgər bütün bunlar yalnız təlimatçının telefonunda və yaddaşında qalırsa, administrator heç vaxt bütün mənzərəni görmür.</p>
<p>Praktik qayda: təcrübi sürüş dərslərini təlimatçı üzrə həftəlik cədvəl kimi aparın. Hər tələbəni sistemdə təlimatçısı ilə birlikdə ayrıca qrup kimi yaradın — məsələn, "Sürüş — təlimatçı Elçin — Aysel" — və onun dərs günləri ilə saatlarını həftəlik cədvələ yazın. Belə olanda hər təlimatçı öz həftəsini görür, administrator boş saatları tapır, tələbə isə öz sürüş vaxtını bilir. Avtomobillərin bölgüsünü və hansı ərazidə məşq ediləcəyini isə məktəbin daxili qaydası kimi, təlimatçılarla ayrıca razılaşdırın — bunu proqramdan gözləməyin.</p>
<h3>Təlimatçılar — mentor hesabları</h3>
<p>Ən çox rast gəlinən problem ortaq girişdir: təlimatçılar administratorun hesabından və ya ortaq paroldan istifadə edir, kim nəyi qeyd etdiyi bəlli olmur. Kursometr-də bunun üçün mentor (köməkçi müəllim) hesabları var: hər təlimatçı öz hesabı ilə daxil olur və öz qrupları ilə işləyir, rəhbərin parolunu bilməyə ehtiyac qalmır. Təlimatçı işdən ayrılanda hesabı bağlanır, tələbələrin məlumatı isə məktəbdə qalır.</p>
<h3>Buraxılan sürüş dərsi: proqram deyil, qayda</h3>
<p>Son anda ləğv edilən sürüş dərsi təlimatçının boş saatı deməkdir. Qaydanı əvvəlcədən yazılı müəyyən edin: dərs neçə saat əvvəl ləğv edilə bilər, son anda ləğv olunan dərs keçmiş sayılırmı, təlimatçı səbəbli ləğvdə dərs mütləq əvəzlənirmi. Qayda qeydiyyat zamanı tələbəyə verilsin — sonradan mübahisə yaranmasın.</p>

<h2>4. Vaxtlı Nəzəriyyə Sınaqları və Sual Bazası</h2>
<p>Nəzəriyyə imtahanına hazırlığın əsası test məşqidir. Tələbə nə qədər çox sual həll edirsə, bir o qədər inamlı olur. Kağız testlərin problemi məlumdur: müəllim hər vərəqi əl ilə yoxlayır, nəticələr bir yerdə toplanmır, tələbə evdə məşq edə bilmir.</p>
<p>Kursometr-də vaxtlı sınaqlar təyin etdiyiniz saatda açılır və bağlanır, qapalı suallar isə avtomatik yoxlanır. Bu, iki formatda işləyir: dərsdən sonra qısa mövzu sınağı (məsələn, yalnız yol nişanları) və kursun sonuna yaxın tam həcmli daxili sınaq imtahanı. Kursometr telefon brauzerində işlədiyi üçün tələbə sınağı öz telefonundan, mobil tətbiq yükləmədən həll edir — avtobusda, iş fasiləsində və ya evdə.</p>
<h3>Sual bazası: məktəbin öz test toplusu</h3>
<p>Əgər məktəbinizin hazır PDF test toplusu varsa, onu Kursometr-də sual bazasına əlavə edib sınaqları ondan qura bilərsiniz. Burada iki vacib məqam var. Birincisi, Kursometr-də rəsmi dövlət imtahanının sualları hazır şəkildə yoxdur — sual bazasını məktəb öz materialları ilə doldurur. İkincisi, yüklədiyiniz test toplusundan istifadə etmək hüququnuzun olduğunu əvvəlcədən yoxlayın: öz müəllimlərinizin hazırladığı suallar ən etibarlı variantdır, başqasının kitabını və ya toplusunu icazəsiz yükləmək isə müəllif hüququ ilə bağlı problem yarada bilər.</p>
<ul>
  <li><strong>Mövzu üzrə qruplaşdırın</strong> — yol nişanları, kəsişmələr, ötmə, dayanma və s. ayrıca sınaqlar.</li>
  <li><strong>Qapalı suallar</strong> — variant seçmək asandır, yoxlama avtomatik olur.</li>
  <li><strong>Vaxt məhdudiyyəti</strong> — tələbə sualları vaxt təzyiqi altında həll etməyə öyrəşir.</li>
  <li><strong>Şəkilli suallar</strong> — yol vəziyyətini göstərən sxemlər varsa, onları da toplunuza daxil edin.</li>
</ul>
<p>Onlayn test hazırlamaq barədə ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</p>

<h2>5. Materiallar və Dərs Yazıları Yalnız Qrupa</h2>
<p>Nəzəriyyə müəllimi tələbələrlə qayda izahlarını, yol nişanları üzrə dərsləri, kəsişmə sxemlərini və dərs yazılarını bölüşmək istəyir. WhatsApp qrupuna atılan fayl bir neçə gündən sonra yüzlərlə mesajın arasında itir, yeni qrupa gələn tələbə onu heç görmür, ödəniş etməyən insanlara ötürülməsi isə asandır.</p>
<p>Kursometr-də dərs yazıları və materiallar yalnız həmin qrupa görünür: qayda izahları, yol nişanları dərsləri və sxemlər qrupun səhifəsində qalır, başqa qrupların tələbələri və kənar şəxslər onlara baxa bilmir. Bu, yayılma riskini azaldır, amma tam aradan qaldırmır — materialların şəxsi istifadə üçün olduğunu qaydalarda yazın. Dərsi buraxan tələbə həmin mövzunu dərs yazısından təkrar edə bilir, bu da davamiyyətdəki boşluğu qismən doldurur.</p>
<p>Ev tapşırığı da faydalıdır: müəllim tapşırığı fayllarla verir (məsələn, yol nişanları cədvəli və ya kəsişmə sxemi üzrə suallar), tələbə isə cavabını öz kabinetindən fayl kimi təhvil verir.</p>

<h2>6. Kurs Haqqı: Hissə-hissə Ödənişin İzlənməsi</h2>
<p>Sürücü kursunda kurs haqqı çox vaxt hissə-hissə ödənilir: qeydiyyatda bir hissə, nəzəriyyənin ortasında ikinci hissə, sürüş dərslərindən əvvəl qalan məbləğ. Bəzən əlavə sürüş dərsləri ayrıca ödənilir. Problem modeldə deyil, izləmədədir: Excel-də aparılan hesab onlarla tələbə və bir neçə təlimatçı olanda tez qarışır, kimin hansı hissəni ödədiyi dəqiq bilinmir, qalıq borc isə kursun sonunda xatırlanır.</p>
<p>Kursometr-də tələbə ödənişləri izlənir, beləliklə borcu qalanlar dəftər vərəqləmədən görünür. Xatırlatmanı isə özünüz, məktəbin adından və nəzakətlə edirsiniz — dəqiq rəqəmə əsaslanan xatırlatma mübahisə yaratmır. Ödəniş qaydalarını başlanğıcda yazılı razılaşdırın: hissələrin sayı və tarixləri, əlavə sürüş dərslərinin şərtləri, tələbə kursu yarımçıq tərk edəndə nə baş verir.</p>
<p>Gənc tələbələr üçün kurs haqqını çox vaxt valideyn ödəyir. Kursometr-in valideyn kabinetində davamiyyət, qiymətlər və sınaq nəticələri görünür — valideyn övladının nəzəriyyə dərslərinə gedib-getmədiyini və testlərdə necə nəticə göstərdiyini müəllimə zəng etmədən izləyə bilir. Ətraflı: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>7. Kağız Jurnal + WhatsApp + Excel, yoxsa Kursometr?</h2>
<p>Əksər sürücü kursları kağız jurnal, WhatsApp qrupları və Excel cədvəli ilə başlayır. Bir müəllim, bir-iki təlimatçı və az sayda tələbə olanda bu işləyir, amma qruplar və təlimatçılar çoxaldıqca fərq görünür:</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>Kağız jurnal + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Nəzəriyyə qrupları</td><td>Dəftərdə və ya Excel-də, əl ilə yenilənir</td><td>Fənlər, qruplar və həftəlik cədvəl</td></tr>
    <tr><td>Sürüş dərsləri</td><td>Təlimatçının telefonunda və yaddaşında</td><td>Təlimatçı üzrə həftəlik cədvəl</td></tr>
    <tr><td>Davamiyyət</td><td>Kağız jurnal, müəllimdə qalır</td><td>Hər dərsdə telefon brauzerindən qeyd</td></tr>
    <tr><td>Test məşqi</td><td>Kağız testlər, əl ilə yoxlama</td><td>Vaxtlı sınaqlar, qapalı suallar avtomatik yoxlanır</td></tr>
    <tr><td>Sual bazası</td><td>Çap olunmuş vərəqlər</td><td>Məktəbin PDF test toplusu sual bazasına əlavə olunur</td></tr>
    <tr><td>Materiallar</td><td>Çatda itir, ötürülə bilər</td><td>Yalnız həmin qrupa görünür</td></tr>
    <tr><td>Kurs haqqı</td><td>Excel, intizam tələb edir</td><td>Tələbə ödənişlərinin izlənməsi</td></tr>
    <tr><td>Təlimatçılar</td><td>Ortaq telefon və ya parol</td><td>Ayrıca mentor hesabları</td></tr>
  </tbody>
</table>
<p>WhatsApp-dan tam imtina etmək lazım deyil: təcili elan və ya dərs saatının dəyişməsi üçün rahatdır. Sadəcə davamiyyət, cədvəl, test nəticələri, materiallar və ödənişlər qorunan, nizamlı yerdə saxlanmalıdır.</p>
<h3>Keçidi necə etməli</h3>
<p>Bütün məktəbi bir gündə köçürmək çətindir. Ən rahat yol yeni başlayan nəzəriyyə qrupu ilə başlamaqdır: onun cədvəlini, davamiyyətini, sınaqlarını və ödənişlərini yeni sistemdə aparın, tələbələrə telefondan necə daxil olacaqlarını ilk dərsdə göstərin. Bir-iki həftədən sonra təlimatçıların sürüş cədvəllərini də köçürün. Köhnə jurnalı dərhal atmayın, ilk ay müqayisə üçün saxlayın.</p>

<h2>8. İmtahana Hazırlıq: Praktik Məsləhətlər və Qurulum Siyahısı</h2>
<h3>Daxili sınaq imtahanı ilə hazırlıq yoxlaması</h3>
<p>Tələbəni dövlət imtahanına göndərməzdən əvvəl kursun daxilində tam həcmli sınaq imtahanı keçirin. Onu imtahan şəraitinə yaxın qurun: vaxt məhdudiyyəti, qarışıq mövzular, əvvəlcədən görülməmiş suallar. Nəticə həm tələbəyə, həm də müəllimə real mənzərəni göstərir. Daxili hazırlıq meyarını məktəb özü müəyyən edir — məsələn, ardıcıl bir neçə sınaqda sabit yaxşı nəticə. Bu meyar rəsmi imtahan qaydası deyil, məktəbin daxili qaydasıdır və tələbəyə də belə izah olunmalıdır.</p>
<h3>Zəif mövzuların izlənməsi</h3>
<p>Sınaqları mövzu üzrə qurduqda nəticələr dəyərli məlumata çevrilir. Tələbə yol nişanları sınağında yaxşı nəticə göstərir, amma kəsişmə sınağında səhv edirsə, növbəti məşqi məhz bu mövzuya yönəldin. Qrup səviyyəsində də eyni məntiq işləyir: çox tələbənin səhv etdiyi sual növbəti nəzəriyyə dərsində təkrar olunacaq mövzunu göstərir. Nəticə analizi barədə ətraflı: <a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">abituriyent hazırlığı mərkəzinin idarə edilməsi</a>.</p>
<h3>Nəzəriyyə ilə praktikanı əlaqələndirin</h3>
<p>Təlimatçı sürüş zamanı tələbənin qaydanı bilmədiyini görürsə (məsələn, kəsişmədə üstünlük), bunu nəzəriyyə müəlliminə ötürsün. Əksinə, nəzəriyyə sınaqlarında zəif nəticə göstərən tələbəyə təlimatçı sürüş zamanı həmin vəziyyətləri xüsusi göstərə bilər. Hər iki tərəf eyni sistemdə işləyəndə bu əlaqə daha asan qurulur.</p>
<h3>Qurulum siyahısı</h3>
<ul>
  <li>☐ Fənlər yaradılıb: nəzəriyyə (yol hərəkəti qaydaları) və təcrübi sürüş</li>
  <li>☐ Nəzəriyyə qrupları vaxta görə qurulub, hər qrupun həftəlik cədvəli və müəllimi bəllidir</li>
  <li>☐ Hər təlimatçının sürüş dərsləri üçün həftəlik cədvəli qurulub</li>
  <li>☐ Təlimatçılar üçün ayrıca mentor hesabları açılıb</li>
  <li>☐ Məktəbin öz PDF test toplusu sual bazasına əlavə olunub, istifadə hüququ yoxlanılıb</li>
  <li>☐ Mövzu sınaqları və daxili tam sınaq imtahanı hazırlanıb</li>
  <li>☐ Ödəniş və buraxılan dərs qaydaları yazılıdır və tələbələrə verilib</li>
  <li>☐ Tələbələr qruplara əlavə olunub, telefondan necə daxil olacaqlarını bilir</li>
  <li>☐ Davamiyyət hər nəzəriyyə dərsində telefondan qeyd olunur</li>
  <li>☐ Qayda izahları və yol nişanları materialları qrupun səhifəsində paylaşılır, çatda yox</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sürücü kursu üçün idarəetmə proqramı nə üçün lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Nəzəriyyə qruplarını, təlimatçı üzrə sürüş cədvəlini, davamiyyəti, test məşqini, materialları və kurs haqqının ödənişlərini bir yerdə aparmaq üçün. Proqram olmadan bu məlumat kağız jurnal, WhatsApp yazışmaları və Excel arasında bölünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-də rəsmi imtahan sualları varmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Sual bazasını məktəb öz materialları ilə doldurur — məsələn, öz PDF test toplusunu əlavə edir. Yüklənən materiallardan istifadə hüququnu məktəb özü yoxlamalıdır. İmtahanın özü isə səlahiyyətli dövlət qurumunda verilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tələbələr testləri telefonda həll edə bilərmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Kursometr telefon brauzerində işləyir, mobil tətbiq yükləmək lazım deyil. Vaxtlı sınaqlar təyin olunan saatda açılıb bağlanır, qapalı suallar avtomatik yoxlanır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Təcrübi sürüş dərslərini necə planlaşdırmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər tələbəni təlimatçısı ilə birlikdə ayrıca qrup kimi yaradın və dərs günlərini həftəlik cədvələ yazın. Belə olanda hər təlimatçı öz həftəsini, administrator isə boş saatları görür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Təlimatçılar sistemə necə daxil olur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr-də təlimatçılar üçün mentor (köməkçi müəllim) hesabları açılır. Hər təlimatçı öz hesabı ilə daxil olur və öz qrupları ilə işləyir, ortaq parola ehtiyac qalmır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Hissə-hissə ödənilən kurs haqqını necə izləmək olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr-də hər tələbənin ödənişləri izlənir, borcu qalanlar bir baxışla görünür. Hissələrin sayı və tarixləri isə qeydiyyat zamanı yazılı razılaşdırılmalıdır.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">Onlayn test necə hazırlanır</a></li>
  <li><a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">Elektron davamiyyət uçotu</a></li>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/abituriyent-hazirligi-kurs-merkezi-idareetme-2027">Abituriyent hazırlığı kurs mərkəzi necə idarə olunur</a></li>
  <li><a href="/blog-details/musiqi-reqs-ve-resm-studiyasi-ucun-idareetme-proqrami-2027">Musiqi, rəqs və rəsm studiyası üçün idarəetmə proqramı</a></li>
</ul>

<h2>Nəticə</h2>
<p>Sürücü kursunun uğuru yalnız təcrübəli təlimatçılardan deyil, tələbənin gördüyü nizamdan da asılıdır. Sabit cədvəli olan nəzəriyyə qrupları, hər dərsdə qeyd olunan davamiyyət, təlimatçı üzrə aydın sürüş cədvəli, telefonda həll olunan vaxtlı sınaqlar, məktəbin öz test toplusundan qurulan sual bazası, yalnız qrupa görünən materiallar, bir yerdə izlənən ödənişlər və imtahandan əvvəl daxili sınaq tələbəni imtahana daha hazırlıqlı göndərməyə kömək edir.</p>
<p><strong>Sürücü kursunuzu kağız jurnal, WhatsApp və Excel-dən bir sistemə köçürmək istəyirsiniz? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong> — müəllim qeydiyyatı pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Məktəbinizin öz iş qaydalarına uyğun fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır. İmtahan qaydaları üçün səlahiyyətli dövlət qurumunun rəsmi mənbələrinə müraciət edin. Kursometr funksiyaları noyabr 2026 vəziyyətinə görə təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>A driving school brings two different worlds together. On one side there is the classroom: in the evening a traffic-rules theory group gathers, and the teacher explains road signs, road markings and how to drive through junctions. On the other side there is the car and the instructor: practical driving lessons take place with each student separately, one to one. One student wants to drive in the morning before work, another can only find time on Saturdays, and a third has finished theory but has not yet paid the second instalment of the course fee. All of this is usually kept in a paper register, WhatsApp chats on the instructor's phone and the administrator's Excel spreadsheet — and nobody can say for sure whether "this student is ready for the exam".</p>
<p>This article is for owners, administrators, theory teachers and instructors who run a driving school or driving course in 2027. We go step by step through theory groups and the weekly schedule, the driving lesson schedule per instructor, attendance, timed theory practice tests and a question bank built from the school's own test collection, instructor accounts, instalment payment tracking and materials visible only to the group. At the end there is a comparison of the paper register + WhatsApp + Excel setup with <a href="/mehsullar/kursometr">Kursometr</a>, practical tips on exam preparation and a setup checklist.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What makes a driving school different?</td><td>One-to-one driving lessons with an instructor for each student, alongside theory lessons in groups</td></tr>
    <tr><td>How should theory be organised?</td><td>Groups with a fixed weekly schedule and attendance marked at every lesson</td></tr>
    <tr><td>How should driving lessons be planned?</td><td>With each instructor's own weekly schedule — who, on which day, at what time</td></tr>
    <tr><td>How should test practice work?</td><td>With timed tests: closed questions are graded automatically, and students practise on the phone</td></tr>
    <tr><td>Where do the test questions come from?</td><td>From the school's own PDF test collection — check your right to use it in advance</td></tr>
    <tr><td>How should the course fee be tracked?</td><td>Every student's instalments in one place: who has paid and who still owes</td></tr>
    <tr><td>Which system?</td><td>Groups, schedule, attendance, tests, materials and payments in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Why a Driving School Is Managed Differently</h2>
<p>In an ordinary course centre, a student joins a group, comes to lessons a few times a week and goes through the programme together with the group. In a driving school, each student has two parallel tracks. In theory they are part of a group: everyone covers the same topic on the same day. In practice it is entirely individual: one-to-one lessons with an instructor, on a schedule fitted to the student's time and the instructor's free hours. The two tracks move at different speeds — one student picks up theory quickly but struggles behind the wheel, another is the opposite.</p>
<p>On top of that, at the end of the course the student faces the driving licence exam, and this exam is taken not at the school but at the competent state authority. The school's job is to prepare the student for it in both theory and practice. When telling students about the official exam rules, procedures and requirements, rely only on the competent authority's official sources — this article does not describe those rules.</p>
<table>
  <thead>
    <tr><th>Component</th><th>Format</th><th>Main challenge</th><th>What the system needs</th></tr>
  </thead>
  <tbody>
    <tr><td>Theory (traffic rules)</td><td>Group lesson in a classroom</td><td>Missed topics; who was at which lesson</td><td>Groups, weekly schedule, attendance</td></tr>
    <tr><td>Test practice</td><td>Individual, at home or at the school</td><td>Paper tests graded by hand</td><td>Timed tests, a question bank, automatic grading</td></tr>
    <tr><td>Practical driving</td><td>One-to-one lesson with an instructor</td><td>Who, on which day, with which instructor</td><td>A weekly schedule per instructor</td></tr>
    <tr><td>Course fee</td><td>Often in instalments</td><td>Remaining debt gets forgotten</td><td>Payment tracking</td></tr>
  </tbody>
</table>

<h2>2. Theory Groups and the Weekly Schedule</h2>
<p>Theory lessons are the "school" part of the course. Build groups by start date and time: "Theory — morning group", "Theory — evening group", "Theory — weekend group". Evening and weekend groups are usually in higher demand among working students, while university students and people at home often choose daytime groups. Each group's lesson days, time and teacher should be fixed in the weekly schedule.</p>
<p>Split the theory programme into topics: road signs, road markings, traffic lights and traffic controller signals, passing through junctions, overtaking and manoeuvring, stopping and parking, special situations, first aid basics and so on — whatever your school's programme requires. When the topic of each lesson is known, a student knows exactly which topic they missed and can catch up on it in another group's lesson or from the materials.</p>
<p>In <a href="/mehsullar/kursometr">Kursometr</a> you create subjects and groups, set up a weekly schedule for each group, and attendance is kept against that schedule. Each school opens its own page (yourname.kursometr.com), and students sign in there with their own accounts, including with a Google account.</p>
<h3>Attendance at theory lessons</h3>
<p>A missed theory lesson comes back later as a wrong answer in the exam. Mark attendance at every lesson, during the lesson itself. In Kursometr you can do this from a phone browser — the teacher does not have to look for a computer in the classroom. At the end of the month, who missed which topic is visible at a glance, and a student who has skipped several lessons in a row gets noticed in time so you can get in touch. More: <a href="/blog-details/attendance-tracking-for-course-centres-2027">electronic attendance tracking</a>.</p>

<h2>3. The Driving Lesson Schedule per Instructor</h2>
<p>Practical driving lessons are the part of the course that needs the most coordination. An instructor's day is full, students want to change times, and when a lesson is cancelled the free slot needs to go to another student. If all of this lives only on the instructor's phone and in their memory, the administrator never sees the whole picture.</p>
<p>A practical rule: run practical driving lessons as a weekly schedule per instructor. Create each student in the system as a separate group together with their instructor — for example, "Driving — instructor Elchin — Aysel" — and put their lesson days and times into the weekly schedule. That way each instructor sees their own week, the administrator finds free slots, and the student knows their driving time. Agree how cars are shared and where practice takes place separately with instructors, as an internal school rule — do not expect the software to handle this.</p>
<h3>Instructors as mentor accounts</h3>
<p>The most common problem is shared access: instructors use the administrator's account or a shared password, and it is unclear who recorded what. Kursometr has mentor (assistant teacher) accounts for this: each instructor signs in with their own account and works with their own groups, with no need to know the owner's password. When an instructor leaves, their account is closed and the students' data stays with the school.</p>
<h3>A missed driving lesson: a policy, not a feature</h3>
<p>A driving lesson cancelled at the last minute means an empty slot for the instructor. Set the policy in writing in advance: how many hours ahead a lesson can be cancelled, whether a last-minute cancellation counts as a lesson taken, and whether a lesson cancelled by the instructor is always made up. Give the policy to the student at enrolment — so there are no arguments later.</p>

<h2>4. Timed Theory Tests and the Question Bank</h2>
<p>Test practice is the core of preparing for the theory exam. The more questions a student works through, the more confident they become. The problem with paper tests is well known: the teacher grades every sheet by hand, results are not collected in one place, and students cannot practise at home.</p>
<p>In Kursometr, timed tests open and close at the time you set, and closed questions are graded automatically. This works in two formats: a short topic test after a lesson (for example, road signs only) and a full-length internal mock exam towards the end of the course. Because Kursometr works in a phone browser, students take tests on their own phone without installing a mobile app — on the bus, during a work break or at home.</p>
<h3>The question bank: the school's own test collection</h3>
<p>If your school has a ready-made PDF test collection, you can import it into the question bank in Kursometr and build tests from it. Two points matter here. First, Kursometr does not come with the official state exam questions — the school fills the question bank with its own materials. Second, check in advance that you have the right to use the test collection you upload: questions written by your own teachers are the safest option, while uploading someone else's book or collection without permission can cause copyright problems.</p>
<ul>
  <li><strong>Group by topic</strong> — separate tests for road signs, junctions, overtaking, stopping and so on.</li>
  <li><strong>Closed questions</strong> — choosing an option is easy, and grading is automatic.</li>
  <li><strong>A time limit</strong> — students get used to answering under time pressure.</li>
  <li><strong>Questions with pictures</strong> — if you have diagrams of road situations, include them in your collection too.</li>
</ul>
<p>More on creating online tests: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</p>

<h2>5. Materials and Lesson Recordings for the Group Only</h2>
<p>A theory teacher wants to share rule explanations, road-sign lessons, junction diagrams and lesson recordings with students. A file posted in a WhatsApp group gets lost among hundreds of messages within a few days, a student who joins a new group never sees it, and it is easy to pass on to people who have not paid.</p>
<p>In Kursometr, lesson recordings and materials are visible only to that group: rule explanations, road-sign lessons and diagrams stay on the group's page, and students from other groups and outsiders cannot see them. This reduces the risk of materials spreading but does not eliminate it — state in your rules that materials are for personal use. A student who missed a lesson can go over that topic from the lesson recording, which partly fills the gap in attendance.</p>
<p>Homework helps too: the teacher sets the assignment with files (for example, questions on a road-sign table or a junction diagram), and the student submits their answer as a file from their own cabinet.</p>

<h2>6. The Course Fee: Tracking Instalments</h2>
<p>In a driving school the course fee is often paid in instalments: one part at enrolment, a second part midway through theory, and the rest before the driving lessons. Sometimes extra driving lessons are paid separately. The problem is not the model but the tracking: accounts kept in Excel quickly get mixed up with dozens of students and several instructors, it is unclear who has paid which instalment, and the remaining debt is remembered only at the end of the course.</p>
<p>Kursometr tracks student payments, so those who still owe are visible without leafing through a notebook. You send the reminder yourself, politely and in the school's name — a reminder based on exact figures does not cause arguments. Agree the payment rules in writing at the start: the number and dates of instalments, the terms for extra driving lessons, and what happens if a student leaves the course partway through.</p>
<p>For younger students, the course fee is often paid by a parent. The Kursometr parent portal shows attendance, grades and test results — a parent can follow whether their child attends theory lessons and how they do in tests without calling the teacher. More: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>7. Paper Register + WhatsApp + Excel, or Kursometr?</h2>
<p>Most driving schools start with a paper register, WhatsApp groups and an Excel spreadsheet. With one teacher, one or two instructors and a few students this works, but as groups and instructors multiply, the difference shows:</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>Paper register + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Theory groups</td><td>In a notebook or Excel, updated by hand</td><td>Subjects, groups and a weekly schedule</td></tr>
    <tr><td>Driving lessons</td><td>On the instructor's phone and in their memory</td><td>A weekly schedule per instructor</td></tr>
    <tr><td>Attendance</td><td>A paper register that stays with the teacher</td><td>Marked at every lesson from a phone browser</td></tr>
    <tr><td>Test practice</td><td>Paper tests, graded by hand</td><td>Timed tests, closed questions graded automatically</td></tr>
    <tr><td>Question bank</td><td>Printed sheets</td><td>The school's PDF test collection imported into the question bank</td></tr>
    <tr><td>Materials</td><td>Lost in the chat, can be passed on</td><td>Visible only to that group</td></tr>
    <tr><td>Course fee</td><td>Excel, takes discipline</td><td>Student payment tracking</td></tr>
    <tr><td>Instructors</td><td>A shared phone or password</td><td>Separate mentor accounts</td></tr>
  </tbody>
</table>
<p>There is no need to drop WhatsApp completely: it is handy for urgent announcements or a change of lesson time. Attendance, the schedule, test results, materials and payments simply need to be kept in a protected, orderly place.</p>
<h3>How to make the switch</h3>
<p>Moving the whole school in one day is hard. The easiest way is to start with a newly starting theory group: run its schedule, attendance, tests and payments in the new system, and show students how to sign in from their phone at the first lesson. After a week or two, move the instructors' driving schedules as well. Do not throw away the old register straight away; keep it for comparison during the first month.</p>

<h2>8. Exam Preparation: Practical Tips and a Setup Checklist</h2>
<h3>A readiness check with an internal mock exam</h3>
<p>Before sending a student to the state exam, hold a full-length mock exam inside the school. Set it up close to exam conditions: a time limit, mixed topics and questions the student has not seen before. The result shows the real picture to both the student and the teacher. The school sets its own internal readiness criterion — for example, consistently good results across several mock tests in a row. This criterion is not an official exam rule but the school's internal policy, and it should be explained to students that way.</p>
<h3>Tracking weak topics</h3>
<p>When tests are built by topic, the results become valuable information. If a student does well on the road-signs test but makes mistakes on the junctions test, aim the next practice session at exactly that topic. The same logic works at group level: a question many students got wrong shows the topic to repeat in the next theory lesson. More on results analysis: <a href="/blog-details/exam-prep-course-centre-management-2027">how to run an exam prep course centre</a>.</p>
<h3>Link theory and practice</h3>
<p>If an instructor sees during a drive that a student does not know a rule (for example, priority at a junction), they should pass this on to the theory teacher. Conversely, for a student with weak theory test results, the instructor can point out those situations during driving. When both sides work in the same system, this link is easier to build.</p>
<h3>Setup checklist</h3>
<ul>
  <li>☐ Subjects are created: theory (traffic rules) and practical driving</li>
  <li>☐ Theory groups are built by time, and each group's weekly schedule and teacher are clear</li>
  <li>☐ A weekly driving lesson schedule is set up for each instructor</li>
  <li>☐ Separate mentor accounts are opened for instructors</li>
  <li>☐ The school's own PDF test collection is imported into the question bank, and the right to use it has been checked</li>
  <li>☐ Topic tests and a full internal mock exam are prepared</li>
  <li>☐ Payment and missed-lesson rules are in writing and have been given to students</li>
  <li>☐ Students are added to groups and know how to sign in from their phone</li>
  <li>☐ Attendance is marked at every theory lesson from a phone</li>
  <li>☐ Rule explanations and road-sign materials are shared on the group page, not in a chat</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Why does a driving school need management software?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">To keep theory groups, the driving schedule per instructor, attendance, test practice, materials and course fee payments in one place. Without software this information is split between a paper register, WhatsApp chats and Excel.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does Kursometr include the official exam questions?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. The school fills the question bank with its own materials — for example, by importing its own PDF test collection. The school itself should check that it has the right to use the materials it uploads. The exam itself is taken at the competent state authority.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can students take tests on their phone?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Kursometr works in a phone browser, so there is no need to install a mobile app. Timed tests open and close at the set time, and closed questions are graded automatically.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do you plan practical driving lessons?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Create each student as a separate group together with their instructor and put their lesson days into the weekly schedule. That way each instructor sees their own week, and the administrator sees the free slots.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do instructors sign in to the system?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In Kursometr, instructors get mentor (assistant teacher) accounts. Each instructor signs in with their own account and works with their own groups, with no need for a shared password.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do you track a course fee paid in instalments?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr tracks each student's payments, so those who still owe are visible at a glance. The number and dates of instalments should be agreed in writing at enrolment.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/how-to-create-online-tests-for-teachers-2027">How to create online tests</a></li>
  <li><a href="/blog-details/attendance-tracking-for-course-centres-2027">Electronic attendance tracking</a></li>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/exam-prep-course-centre-management-2027">How to run an exam prep course centre</a></li>
  <li><a href="/blog-details/management-software-for-music-dance-and-art-studios-2027">Management software for music, dance and art studios</a></li>
</ul>

<h2>Conclusion</h2>
<p>The success of a driving school depends not only on experienced instructors but also on the order that students can see. Theory groups with a fixed schedule, attendance marked at every lesson, a clear driving schedule per instructor, timed tests taken on the phone, a question bank built from the school's own test collection, materials visible only to the group, payments tracked in one place and an internal mock exam before the real one help send students to the exam better prepared.</p>
<p><strong>Want to move your driving school from a paper register, WhatsApp and Excel into one system? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher registration is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. If your school needs a custom system built around its own workflows: <a href="/contact">get in touch</a>.</p>
<p><small><em>This article is general information. For exam rules, refer to the official sources of the competent state authority. Kursometr features are described as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Автошкола объединяет два разных мира. С одной стороны — учебный класс: вечером собирается группа теории по правилам дорожного движения, и преподаватель объясняет дорожные знаки, разметку и порядок проезда перекрёстков. С другой стороны — автомобиль и инструктор: практические занятия по вождению проходят с каждым учеником отдельно, один на один. Один ученик хочет ездить утром перед работой, другой находит время только по субботам, третий закончил теорию, но ещё не оплатил вторую часть стоимости курса. Обычно всё это ведётся в бумажном журнале, в переписке WhatsApp на телефоне инструктора и в таблице Excel у администратора — и на вопрос «готов ли этот ученик к экзамену?» никто не может ответить точно.</p>
<p>Эта статья — для владельцев, администраторов, преподавателей теории и инструкторов, которые в 2027 году управляют автошколой или курсами вождения. Пошагово разбираем группы теории и недельное расписание, расписание занятий по вождению для каждого инструктора, посещаемость, тренировочные тесты по теории с таймером и банк вопросов из собственного сборника школы, аккаунты инструкторов, учёт оплаты частями и материалы, видимые только группе. В конце — сравнение связки бумажный журнал + WhatsApp + Excel с <a href="/mehsullar/kursometr">Kursometr</a>, практические советы по подготовке к экзамену и чек-лист настройки.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Чем отличается автошкола?</td><td>Наряду с групповыми занятиями по теории у каждого ученика есть индивидуальные занятия по вождению с инструктором</td></tr>
    <tr><td>Как организовать теорию?</td><td>Группы с постоянным недельным расписанием и отметкой посещаемости на каждом занятии</td></tr>
    <tr><td>Как планировать вождение?</td><td>По собственному недельному расписанию каждого инструктора — кто, в какой день, во сколько</td></tr>
    <tr><td>Как тренироваться в тестах?</td><td>С помощью тестов с таймером: закрытые вопросы проверяются автоматически, ученик тренируется на телефоне</td></tr>
    <tr><td>Откуда берутся вопросы?</td><td>Из собственного PDF-сборника тестов школы — заранее проверьте право на его использование</td></tr>
    <tr><td>Как учитывать оплату курса?</td><td>Платежи частями каждого ученика в одном месте: кто оплатил, у кого остался долг</td></tr>
    <tr><td>Какая система?</td><td>Группы, расписание, посещаемость, тесты, материалы и оплата в одном месте — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Почему автошколой управляют иначе</h2>
<p>В обычном учебном центре ученик записывается в группу, несколько раз в неделю приходит на занятия и проходит программу вместе с группой. В автошколе у каждого ученика два параллельных пути. В теории он часть группы: все проходят одну тему в один день. На практике всё полностью индивидуально: занятия один на один с инструктором по расписанию, подстроенному под время ученика и свободные часы инструктора. Эти два пути движутся с разной скоростью — один быстро осваивает теорию, но с трудом справляется за рулём, у другого наоборот.</p>
<p>Кроме того, в конце курса ученика ждёт экзамен на водительское удостоверение, и сдаётся он не в самой автошколе, а в уполномоченном государственном органе. Задача школы — подготовить ученика к нему и по теории, и по практике. Сообщая ученикам об официальных правилах, процедурах и требованиях экзамена, опирайтесь только на официальные источники уполномоченного органа — эта статья эти правила не описывает.</p>
<table>
  <thead>
    <tr><th>Компонент</th><th>Формат</th><th>Главная сложность</th><th>Что нужно в системе</th></tr>
  </thead>
  <tbody>
    <tr><td>Теория (ПДД)</td><td>Групповое занятие в классе</td><td>Пропущенные темы; кто был на каком занятии</td><td>Группы, недельное расписание, посещаемость</td></tr>
    <tr><td>Тренировка в тестах</td><td>Индивидуально, дома или в школе</td><td>Ручная проверка бумажных тестов</td><td>Тесты с таймером, банк вопросов, автопроверка</td></tr>
    <tr><td>Практическое вождение</td><td>Индивидуальное занятие с инструктором</td><td>Кто, в какой день, с каким инструктором</td><td>Недельное расписание по инструкторам</td></tr>
    <tr><td>Оплата курса</td><td>Часто частями</td><td>Остаток долга забывается</td><td>Учёт оплат</td></tr>
  </tbody>
</table>

<h2>2. Группы теории и недельное расписание</h2>
<p>Занятия по теории — это «школьная» часть курса. Формируйте группы по дате старта и времени: «Теория — утренняя группа», «Теория — вечерняя группа», «Теория — группа выходного дня». Работающие ученики обычно чаще выбирают вечерние группы и группы выходного дня, а студенты и те, кто дома, — дневные. Дни, время занятий и преподаватель каждой группы должны быть закреплены в недельном расписании.</p>
<p>Разбейте программу теории на темы: дорожные знаки, разметка, светофоры и сигналы регулировщика, проезд перекрёстков, обгон и маневрирование, остановка и стоянка, особые ситуации, основы первой помощи и так далее — всё, что требует программа вашей школы. Когда тема каждого занятия известна, ученик точно знает, какую тему пропустил, и может наверстать её на занятии другой группы или по материалам.</p>
<p>В <a href="/mehsullar/kursometr">Kursometr</a> создаются предметы и группы, для каждой группы настраивается недельное расписание, а посещаемость ведётся по этому расписанию. Каждая школа открывает свою страницу (vashe-imya.kursometr.com), и ученики входят туда под своими аккаунтами, в том числе через аккаунт Google.</p>
<h3>Посещаемость занятий по теории</h3>
<p>Пропущенное занятие по теории потом возвращается неправильным ответом на экзамене. Отмечайте посещаемость на каждом занятии, прямо во время него. В Kursometr это можно делать из браузера телефона — преподавателю не нужно искать компьютер в классе. В конце месяца сразу видно, кто какую тему пропустил, а ученик, пропустивший несколько занятий подряд, вовремя попадает в поле зрения, и с ним можно связаться. Подробнее: <a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">электронный учёт посещаемости</a>.</p>

<h2>3. Расписание вождения по инструкторам</h2>
<p>Практические занятия по вождению — часть курса, которая требует больше всего координации. День инструктора расписан, ученики хотят перенести время, а когда занятие отменяется, освободившийся час нужно отдать другому ученику. Если всё это хранится только в телефоне и в памяти инструктора, администратор никогда не видит полной картины.</p>
<p>Практическое правило: ведите занятия по вождению как недельное расписание по каждому инструктору. Создайте каждого ученика в системе отдельной группой вместе с его инструктором — например, «Вождение — инструктор Эльчин — Айсель» — и внесите дни и время его занятий в недельное расписание. Тогда каждый инструктор видит свою неделю, администратор находит свободные окна, а ученик знает время своего вождения. Распределение автомобилей и место тренировок согласуйте с инструкторами отдельно, как внутреннее правило школы, — не ждите этого от программы.</p>
<h3>Инструкторы — аккаунты наставников</h3>
<p>Самая частая проблема — общий доступ: инструкторы пользуются аккаунтом администратора или общим паролем, и непонятно, кто что отметил. Для этого в Kursometr есть аккаунты наставников (помощников преподавателя): каждый инструктор входит под своим аккаунтом и работает со своими группами, знать пароль руководителя не нужно. Когда инструктор уходит, его аккаунт закрывается, а данные учеников остаются в школе.</p>
<h3>Пропущенное вождение: правило, а не функция</h3>
<p>Занятие по вождению, отменённое в последний момент, — это пустой час инструктора. Заранее письменно установите правило: за сколько часов можно отменить занятие, считается ли отмена в последний момент проведённым занятием, всегда ли отрабатывается занятие, отменённое по вине инструктора. Выдайте правило ученику при записи — чтобы потом не было споров.</p>

<h2>4. Тесты по теории с таймером и банк вопросов</h2>
<p>Основа подготовки к теоретическому экзамену — тренировка в тестах. Чем больше вопросов решает ученик, тем увереннее он себя чувствует. Проблема бумажных тестов известна: преподаватель проверяет каждый лист вручную, результаты не собираются в одном месте, а ученик не может тренироваться дома.</p>
<p>В Kursometr тесты с таймером открываются и закрываются в назначенное вами время, а закрытые вопросы проверяются автоматически. Это работает в двух форматах: короткий тест по теме после занятия (например, только дорожные знаки) и полноценный внутренний пробный экзамен ближе к концу курса. Поскольку Kursometr работает в браузере телефона, ученик проходит тест на своём телефоне, не устанавливая мобильное приложение, — в автобусе, в перерыве на работе или дома.</p>
<h3>Банк вопросов: собственный сборник тестов школы</h3>
<p>Если у вашей школы есть готовый PDF-сборник тестов, его можно добавить в банк вопросов Kursometr и составлять тесты из него. Здесь важны два момента. Во-первых, официальных вопросов государственного экзамена в Kursometr нет — банк вопросов школа наполняет своими материалами. Во-вторых, заранее убедитесь, что у вас есть право использовать загружаемый сборник: вопросы, составленные вашими преподавателями, — самый надёжный вариант, а загрузка чужой книги или сборника без разрешения может создать проблемы с авторским правом.</p>
<ul>
  <li><strong>Группируйте по темам</strong> — отдельные тесты по знакам, перекрёсткам, обгону, остановке и так далее.</li>
  <li><strong>Закрытые вопросы</strong> — выбрать вариант легко, проверка автоматическая.</li>
  <li><strong>Ограничение по времени</strong> — ученик привыкает отвечать в условиях нехватки времени.</li>
  <li><strong>Вопросы с картинками</strong> — если у вас есть схемы дорожных ситуаций, включите их в сборник.</li>
</ul>
<p>Подробнее о создании онлайн-тестов: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</p>

<h2>5. Материалы и записи уроков только для группы</h2>
<p>Преподаватель теории хочет делиться с учениками разъяснениями правил, уроками по дорожным знакам, схемами перекрёстков и записями занятий. Файл, отправленный в группу WhatsApp, через несколько дней теряется среди сотен сообщений, ученик новой группы его вообще не видит, а переслать его тем, кто не платил, очень легко.</p>
<p>В Kursometr записи уроков и материалы видны только этой группе: разъяснения правил, уроки по знакам и схемы остаются на странице группы, а ученики других групп и посторонние их не видят. Это снижает риск распространения, но не исключает его полностью — пропишите в правилах, что материалы предназначены для личного использования. Ученик, пропустивший занятие, может повторить тему по записи урока, и это частично закрывает пробел в посещаемости.</p>
<p>Полезны и домашние задания: преподаватель выдаёт задание с файлами (например, вопросы по таблице знаков или схеме перекрёстка), а ученик сдаёт ответ файлом из своего кабинета.</p>

<h2>6. Оплата курса: учёт платежей частями</h2>
<p>В автошколе стоимость курса часто оплачивается частями: одна часть при записи, вторая в середине теории, остаток — перед занятиями по вождению. Иногда дополнительные занятия по вождению оплачиваются отдельно. Проблема не в модели, а в учёте: расчёты в Excel быстро путаются при десятках учеников и нескольких инструкторах, неясно, кто какую часть оплатил, а об остатке долга вспоминают только в конце курса.</p>
<p>В Kursometr ведётся учёт оплат учеников, поэтому должники видны без листания тетради. Напоминание вы отправляете сами, вежливо и от имени школы, — напоминание с точными цифрами не вызывает споров. Письменно согласуйте правила оплаты в самом начале: количество и даты платежей, условия дополнительных занятий по вождению и что происходит, если ученик бросает курс на полпути.</p>
<p>За молодых учеников курс часто оплачивают родители. В кабинете родителя Kursometr видны посещаемость, оценки и результаты тестов — родитель может следить, ходит ли его ребёнок на занятия по теории и как он справляется с тестами, не звоня преподавателю. Подробнее: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>7. Бумажный журнал + WhatsApp + Excel или Kursometr?</h2>
<p>Большинство автошкол начинает с бумажного журнала, групп WhatsApp и таблицы Excel. При одном преподавателе, одном-двух инструкторах и небольшом числе учеников это работает, но по мере роста числа групп и инструкторов разница становится заметной:</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>Бумажный журнал + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Группы теории</td><td>В тетради или Excel, обновляются вручную</td><td>Предметы, группы и недельное расписание</td></tr>
    <tr><td>Занятия по вождению</td><td>В телефоне и в памяти инструктора</td><td>Недельное расписание по инструкторам</td></tr>
    <tr><td>Посещаемость</td><td>Бумажный журнал, остаётся у преподавателя</td><td>Отметка на каждом занятии из браузера телефона</td></tr>
    <tr><td>Тренировка в тестах</td><td>Бумажные тесты, ручная проверка</td><td>Тесты с таймером, закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Банк вопросов</td><td>Распечатанные листы</td><td>PDF-сборник тестов школы добавляется в банк вопросов</td></tr>
    <tr><td>Материалы</td><td>Теряются в чате, их можно переслать</td><td>Видны только этой группе</td></tr>
    <tr><td>Оплата курса</td><td>Excel, требует дисциплины</td><td>Учёт оплат учеников</td></tr>
    <tr><td>Инструкторы</td><td>Общий телефон или пароль</td><td>Отдельные аккаунты наставников</td></tr>
  </tbody>
</table>
<p>Полностью отказываться от WhatsApp не нужно: он удобен для срочных объявлений или переноса времени занятия. Просто посещаемость, расписание, результаты тестов, материалы и оплаты должны храниться в защищённом и упорядоченном месте.</p>
<h3>Как перейти</h3>
<p>Перевести всю школу за один день сложно. Проще всего начать с новой стартующей группы теории: ведите её расписание, посещаемость, тесты и оплаты в новой системе, а на первом занятии покажите ученикам, как входить с телефона. Через одну-две недели перенесите и расписания вождения инструкторов. Старый журнал сразу не выбрасывайте — сохраните его для сравнения на первый месяц.</p>

<h2>8. Подготовка к экзамену: практические советы и чек-лист настройки</h2>
<h3>Проверка готовности с помощью внутреннего пробного экзамена</h3>
<p>Прежде чем отправлять ученика на государственный экзамен, проведите полноценный пробный экзамен внутри школы. Приблизьте его к условиям экзамена: ограничение по времени, смешанные темы, вопросы, которые ученик раньше не видел. Результат показывает реальную картину и ученику, и преподавателю. Внутренний критерий готовности школа устанавливает сама — например, стабильно хорошие результаты в нескольких пробных тестах подряд. Этот критерий — не официальное правило экзамена, а внутреннее правило школы, и ученику его нужно объяснять именно так.</p>
<h3>Отслеживание слабых тем</h3>
<p>Когда тесты составлены по темам, их результаты становятся ценной информацией. Если ученик хорошо справляется с тестом по знакам, но ошибается в тесте по перекрёсткам, направьте следующую тренировку именно на эту тему. На уровне группы работает та же логика: вопрос, в котором ошиблись многие, показывает тему для повторения на следующем занятии по теории. Подробнее об анализе результатов: <a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">как управлять курсами подготовки к экзаменам</a>.</p>
<h3>Свяжите теорию и практику</h3>
<p>Если инструктор во время вождения видит, что ученик не знает правила (например, приоритета на перекрёстке), пусть передаст это преподавателю теории. И наоборот: ученику со слабыми результатами тестов инструктор может специально показать такие ситуации во время вождения. Когда обе стороны работают в одной системе, эту связь выстроить проще.</p>
<h3>Чек-лист настройки</h3>
<ul>
  <li>☐ Созданы предметы: теория (ПДД) и практическое вождение</li>
  <li>☐ Группы теории сформированы по времени, у каждой понятны недельное расписание и преподаватель</li>
  <li>☐ Для каждого инструктора настроено недельное расписание занятий по вождению</li>
  <li>☐ Для инструкторов открыты отдельные аккаунты наставников</li>
  <li>☐ Собственный PDF-сборник тестов школы добавлен в банк вопросов, право на его использование проверено</li>
  <li>☐ Подготовлены тесты по темам и полный внутренний пробный экзамен</li>
  <li>☐ Правила оплаты и пропусков записаны и выданы ученикам</li>
  <li>☐ Ученики добавлены в группы и знают, как входить с телефона</li>
  <li>☐ Посещаемость отмечается с телефона на каждом занятии по теории</li>
  <li>☐ Разъяснения правил и материалы по знакам публикуются на странице группы, а не в чате</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Зачем автошколе программа управления?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Чтобы вести группы теории, расписание вождения по инструкторам, посещаемость, тренировку в тестах, материалы и оплату курса в одном месте. Без программы эта информация разбросана между бумажным журналом, перепиской в WhatsApp и Excel.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Есть ли в Kursometr официальные экзаменационные вопросы?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Банк вопросов школа наполняет своими материалами — например, добавляет собственный PDF-сборник тестов. Право на использование загружаемых материалов школа должна проверить сама. Сам экзамен сдаётся в уполномоченном государственном органе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Могут ли ученики проходить тесты на телефоне?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Kursometr работает в браузере телефона, устанавливать мобильное приложение не нужно. Тесты с таймером открываются и закрываются в назначенное время, закрытые вопросы проверяются автоматически.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как планировать практические занятия по вождению?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Создайте каждого ученика отдельной группой вместе с его инструктором и внесите дни занятий в недельное расписание. Тогда каждый инструктор видит свою неделю, а администратор — свободные окна.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как инструкторы входят в систему?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В Kursometr для инструкторов открываются аккаунты наставников (помощников преподавателя). Каждый инструктор входит под своим аккаунтом и работает со своими группами, общий пароль не нужен.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как учитывать оплату курса частями?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В Kursometr ведётся учёт оплат каждого ученика, поэтому должники видны сразу. Количество и даты платежей нужно письменно согласовать при записи.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">Как создать онлайн-тест</a></li>
  <li><a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">Электронный учёт посещаемости</a></li>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/upravlenie-kursami-podgotovki-k-ekzamenam-2027">Как управлять курсами подготовки к экзаменам</a></li>
  <li><a href="/blog-details/programma-dlya-muzykalnoj-tanczevalnoj-i-hudozhestvennoj-studii-2027">Программа для музыкальной, танцевальной и художественной студии</a></li>
</ul>

<h2>Итог</h2>
<p>Успех автошколы зависит не только от опытных инструкторов, но и от порядка, который видят ученики. Группы теории с постоянным расписанием, посещаемость на каждом занятии, понятное расписание вождения по инструкторам, тесты с таймером на телефоне, банк вопросов из собственного сборника школы, материалы, видимые только группе, оплата в одном месте и внутренний пробный экзамен перед настоящим помогают отправлять учеников на экзамен лучше подготовленными.</p>
<p><strong>Хотите перевести автошколу из бумажного журнала, WhatsApp и Excel в одну систему? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация педагога бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Если вашей школе нужна индивидуальная система под собственные правила работы: <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Статья носит общий информационный характер. Правила экзамена уточняйте в официальных источниках уполномоченного государственного органа. Функции Kursometr описаны по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'surucu-kursu-ucun-idareetme-proqrami-2027'],
            [
                'slug_en' => 'management-software-for-driving-schools-2027',
                'slug_ru' => 'programma-dlya-avtoshkoly-2027',

                'title_az' => 'Sürücü Kursu üçün İdarəetmə Proqramı: Nəzəriyyə Qrupları, Sürüş Cədvəli, Testlər və Ödənişlər (2027)',
                'title_en' => 'Management Software for Driving Schools: Theory Groups, Driving Schedule, Tests and Payments (2027)',
                'title_ru' => 'Программа для автошколы: группы теории, расписание вождения, тесты и оплата (2027)',

                'review_az' => 'Sürücü kursu və sürücü hazırlığı mərkəzi üçün: yol hərəkəti qaydaları üzrə nəzəriyyə qrupları və həftəlik cədvəl, təlimatçı üzrə sürüş dərslərinin cədvəli, davamiyyət, vaxtlı nəzəriyyə sınaqları və məktəbin öz PDF test toplusundan sual bazası, təlimatçılar üçün mentor hesabları, hissə-hissə ödənişlər, yalnız qrupa görünən materiallar, kağız jurnal + WhatsApp + Excel ilə Kursometr müqayisəsi və qurulum siyahısı.',
                'review_en' => 'For driving schools and driving courses: traffic-rules theory groups and a weekly schedule, a driving lesson schedule per instructor, attendance, timed theory practice tests and a question bank from the school\'s own PDF test collection, mentor accounts for instructors, instalment payments, group-only materials, paper register + WhatsApp + Excel vs Kursometr and a setup checklist.',
                'review_ru' => 'Для автошкол и курсов вождения: группы теории ПДД и недельное расписание, расписание практического вождения по инструкторам, посещаемость, тренировочные тесты с таймером и банк вопросов из собственного PDF-сборника школы, аккаунты наставников для инструкторов, оплата частями, материалы только для группы, сравнение журнал + WhatsApp + Excel и Kursometr и чек-лист настройки.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '6 Noyabr 2026',
                'date_en' => 'November 6, 2026',
                'date_ru' => '6 Ноября 2026',

                'photo'    => 'cover-driving-school-az.png',
                'photo_en' => 'cover-driving-school-en.png',
                'photo_ru' => 'cover-driving-school-ru.png',

                'meta_title_az' => 'Sürücü Kursu üçün İdarəetmə Proqramı 2027 | RS Code',
                'meta_title_en' => 'Driving School Management Software 2027 | RS Code',
                'meta_title_ru' => 'Программа для автошколы 2027 | RS Code',

                'meta_description_az' => 'Sürücü kursu üçün proqram: nəzəriyyə qrupları, təlimatçı üzrə sürüş cədvəli, davamiyyət, telefonda vaxtlı test məşqi, sual bazası və hissə-hissə ödənişlər.',
                'meta_description_en' => 'Software for driving schools: theory groups, a driving schedule per instructor, attendance, timed practice tests on the phone, a question bank and instalment payments.',
                'meta_description_ru' => 'Программа для автошколы: группы теории, расписание вождения по инструкторам, посещаемость, тесты с таймером на телефоне, банк вопросов и оплата частями.',

                'meta_keywords_az' => 'sürücü kursu proqramı, sürücülük kursu idarəetmə, avtoməktəb, yol hərəkəti qaydaları testi, nəzəriyyə imtahanına hazırlıq, təlimatçı cədvəli, sürüş dərsi, kursometr, 2027',
                'meta_keywords_en' => 'driving school software, driving school management, driving course, traffic rules test, theory test practice, instructor schedule, driving lessons, kursometr, 2027',
                'meta_keywords_ru' => 'программа для автошколы, управление автошколой, курсы вождения, тесты пдд, подготовка к теоретическому экзамену, расписание инструктора, уроки вождения, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
