<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #82 — Korporativ təlim üçün platforma (2027): şirkətdaxili işçi təlimi, yeni işçinin adaptasiyası (onboarding), şirkət işçilərinə təlim satan tədris mərkəzləri.
 * Dürüst çərçivə: Kursometr təhsil (müəllim, repetitor, kurs mərkəzi) üçün qurulub, korporativ təlimdə bu şəkildə istifadə oluna bilər —
 * işçi = tələbə, daxili təlimçi/komanda rəhbəri = müəllim və ya mentor hesabı, şöbə/vəzifə = qrup.
 * Yalnız qrupa görünən onboarding materialları (siyasətlər, prosedurlar, yazılmış təlimatlar), şöbə/vəzifə üzrə qruplar və təlim cədvəli, canlı sessiyalarda
 * davamiyyət, vaxtlı bilik yoxlaması (qapalı suallar avtomatik), mövcud PDF test toplusundan sual bazası, tapşırıq — işçi kabinetdən fayl təhvil verir,
 * mentor hesabları, telefon brauzeri (sahə və növbəli işçilər), Google ilə giriş, müştəri şirkət üzrə qruplar + ödəniş izləmə,
 * e-poçt + ortaq qovluq + WhatsApp + Excel-dən keçid, müqayisə, məsləhətlər (qısa modul, hər moduldan sonra test, təkrar cədvəli, nəticəni test balı ilə ölçmək), qurulum siyahısı.
 * Kursometr faktları yalnız #75–#81 ilə eynidir: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət, vaxtlı sınaqlar (təyin olunan saatda
 * açılıb-bağlanır, qapalı suallar avtomatik), PDF test toplusu → sual bazası, ev tapşırığı (fayl ilə verilir, tələbə kabinetdən təhvil verir),
 * ödəniş izləmə, valideyn kabineti, mentor hesabı, yalnız qrupa görünən dərs yazıları/materiallar, telefon brauzeri, Google ilə giriş, pulsuz müəllim qeydiyyatı.
 * HR sistemi inteqrasiyası, Google-dan başqa SSO, SCORM, sertifikat, uyğunluq (compliance) hesabatı, API, SMS/push, avtomatik xatırlatma, onlayn ödəniş,
 * mobil tətbiq, qiymət və bazar statistikası İDDİA EDİLMİR. HR inteqrasiyası lazımdırsa → fərdi sistem, /elaqe.
 */
class Blog82CorporateTrainingSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Yeni işçi şirkətə gəlir və ilk həftəsi adətən eyni ssenari ilə keçir. İnsan resursları ona bir neçə PDF göndərir, rəhbər "ortaq qovluqda hər şey var" deyir, komanda rəhbəri WhatsApp-da təlimat videosunun linkini atır, növbəti həftə isə kimsə Excel cədvəlində "təlim keçib" xanasına işarə qoyur. Bir ay sonra məlum olur ki, işçi daxili qaydanın yarısını oxumayıb, prosedurun köhnə versiyasına baxıb, canlı təlim sessiyasına isə növbəsi düşdüyü üçün gələ bilməyib. Kimin nəyi bildiyini isə heç kim dəqiq demir.</p>
<p>Bu yazı 2027-ci ildə şirkətdaxili təlimi təşkil edən insan resursları mütəxəssisləri, təlim menecerləri, şöbə rəhbərləri və daxili təlimçilər üçündür. Eyni zamanda şirkət işçilərinə kurs satan tədris mərkəzlərinə də aiddir. Onboarding materiallarını, şöbə və vəzifə üzrə qrupları, təlim cədvəlini, canlı sessiyalarda davamiyyəti, vaxtlı bilik yoxlamalarını, mövcud PDF test toplusundan sual bazasını, tapşırıqları, daxili təlimçilər üçün mentor hesablarını və müştəri şirkət üzrə qrupları addım-addım nəzərdən keçiririk. Sonda e-poçt + ortaq qovluq + WhatsApp + Excel ilə <a href="/mehsullar/kursometr">Kursometr</a> müqayisəsi, praktik məsləhətlər və qurulum siyahısı var.</p>
<p>Əvvəlcədən dürüst qeyd: Kursometr təhsil üçün — müəllimlər, repetitorlar və kurs mərkəzləri üçün qurulub. Orada terminlər "müəllim", "tələbə" və "qrup"dur. Amma korporativ təlimin özəyi də eynidir: insanlar qruplara bölünür, material paylaşılır, sessiya keçirilir, bilik yoxlanılır. Ona görə də Kursometr-dən şirkət təlimi üçün bu şəkildə istifadə etmək olur: işçi tələbə hesabı ilə, daxili təlimçi isə müəllim və ya mentor hesabı ilə işləyir.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Korporativ təlim platformasında nə olmalıdır?</td><td>Qruplar, cədvəl, davamiyyət, materiallar, bilik yoxlaması və tapşırıqlar bir yerdə</td></tr>
    <tr><td>Yeni işçinin onboarding-i necə qurulmalıdır?</td><td>Ayrıca qrup, yalnız həmin qrupa görünən siyasət, prosedur və təlimat yazıları</td></tr>
    <tr><td>Qruplar necə bölünməlidir?</td><td>Şöbə və ya vəzifə üzrə, hər qrupun öz təlim cədvəli ilə</td></tr>
    <tr><td>Bilik necə yoxlanılmalıdır?</td><td>Vaxtlı testlərlə: qapalı suallar avtomatik yoxlanır, sualları mövcud PDF test toplusundan götürmək olar</td></tr>
    <tr><td>Sahə və növbəli işçilər necə qoşulur?</td><td>Telefon brauzerindən, mobil tətbiq yükləmədən, Google hesabı ilə də daxil olmaq olar</td></tr>
    <tr><td>Kursometr korporativ sistemdirmi?</td><td>Xeyr, təhsil üçün qurulub, amma şirkət təlimi üçün bu şəkildə istifadə oluna bilər</td></tr>
    <tr><td>HR sistemi ilə inteqrasiya lazımdırsa?</td><td>Fərdi sistem lazımdır — <a href="/elaqe">bizimlə əlaqə saxlayın</a></td></tr>
  </tbody>
</table>

<h2>1. Korporativ Təlimdə Əsas Problem: Material Var, Nizam Yoxdur</h2>
<p>Əksər şirkətlərdə təlim materialı çatışmır deyə problem yaranmır. Daxili qaydalar yazılıb, prosedurlar hazırdır, bəzən hətta təlimat videoları da çəkilib. Problem odur ki, bu materiallar bir neçə yerə səpələnib: bir hissəsi e-poçtda, bir hissəsi ortaq qovluqda, bir hissəsi isə hansısa rəhbərin telefonundadır. Yeni işçi hansı sənədin aktual olduğunu bilmir, təlimçi kimin materialı oxuduğunu görmür, rəhbər isə "komanda bu proseduru bilirmi?" sualına təxminlə cavab verir.</p>
<p>Yaxşı qurulmuş korporativ təlim dörd sadə suala cavab verməlidir: kim hansı qrupdadır, hansı materialı görməlidir, canlı sessiyalara gəlibmi və öyrəndiyini testdə göstərə bilibmi. Bu dörd sualın cavabı bir yerdə olanda təlim "göndərdik, yəqin oxuyub" mərhələsindən çıxır və ölçülə bilən prosesə çevrilir.</p>
<table>
  <thead>
    <tr><th>Təlim növü</th><th>Kimə</th><th>Əsas çətinlik</th><th>Platformada nə lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Onboarding</td><td>Yeni işçilər</td><td>Materiallar səpələnib, ilk həftə qarışıq keçir</td><td>Ayrıca qrup, yalnız qrupa görünən materiallar</td></tr>
    <tr><td>Vəzifə üzrə təlim</td><td>Şöbə və ya vəzifə qrupları</td><td>Hər kəsə eyni material göndərilir</td><td>Şöbə/vəzifə üzrə qruplar və cədvəl</td></tr>
    <tr><td>Canlı sessiyalar</td><td>Qrup</td><td>Kimin gəldiyi bilinmir</td><td>Davamiyyət qeydi</td></tr>
    <tr><td>Bilik yoxlaması</td><td>Bütün iştirakçılar</td><td>Kağız testlər, əl ilə yoxlama</td><td>Vaxtlı testlər, avtomatik yoxlama</td></tr>
    <tr><td>Təkrar təlim</td><td>Mövcud işçilər</td><td>Unudulur, planlaşdırılmır</td><td>Cədvəldə təkrar sessiyalar və testlər</td></tr>
  </tbody>
</table>

<h2>2. Onboarding: Yeni İşçi üçün Yalnız Ona Görünən Materiallar</h2>
<p>Onboarding-i ayrıca qrup kimi qurun — məsələn, "Yeni işçilər — noyabr axını" və ya "Satış şöbəsi — yeni əməkdaşlar". Bu qrupa daxili qaydaları, iş prosedurlarını, təhlükəsizlik təlimatlarını və yazılmış təlimat dərslərini yerləşdirin. <a href="/mehsullar/kursometr">Kursometr</a>-də dərs yazıları və materiallar yalnız həmin qrupa görünür: başqa qrupların iştirakçıları və kənar şəxslər onlara baxa bilmir. Bu, daxili sənədlərin lazım olmayan insanlara çatması riskini azaldır, amma tam aradan qaldırmır — materialların yalnız iş üçün olduğunu daxili qaydada ayrıca yazın.</p>
<p>Materialları ardıcıllıqla düzün. İlk gün üçün şirkət haqqında ümumi məlumat və əsas qaydalar, ilk həftə üçün vəzifəyə aid prosedurlar, sonrakı həftələr üçün isə daha dərin mövzular. Yeni işçi nəyi hansı ardıcıllıqla öyrənəcəyini görəndə ilk günlərin gərginliyi azalır, onu müşayiət edən komanda rəhbəri də eyni sualları dəfələrlə cavablandırmaq məcburiyyətində qalmır.</p>
<p>Təlimat videosu və ya canlı sessiyanın yazısı varsa, onu da qrupun materiallarına əlavə edin. Növbəsi düşdüyü üçün sessiyaya gələ bilməyən işçi mövzunu sonradan yazıdan keçə bilir. Onlayn sessiyaların təşkili barədə ətraflı: <a href="/blog-details/onlayn-ders-nece-teskil-olunur-2027">onlayn dərs necə təşkil olunur</a>.</p>
<h3>Hər şirkətin öz səhifəsi</h3>
<p>Kursometr-də hər müəllim və ya mərkəz öz səhifəsini açır (adiniz.kursometr.com). Şirkət üçün bu, təlim portalının ünvanı rolunu oynayır: işçilər ora öz hesabları ilə, o cümlədən Google hesabı ilə daxil olur. Google ilə giriş işçinin ayrıca parol yadda saxlamaq ehtiyacını azaldır. Qeyd edək ki, Kursometr-də Google-dan başqa korporativ giriş üsulları (məsələn, şirkətin daxili istifadəçi kataloqu ilə giriş) yoxdur.</p>

<h2>3. Şöbə və Vəzifə üzrə Qruplar, Təlim Cədvəli və Davamiyyət</h2>
<p>Bütün işçilərə eyni materialı göndərmək ən çox rast gəlinən səhvdir. Mühasibin satış skriptinə, anbar işçisinin isə ofis proqramlarının detallarına ehtiyacı yoxdur. Qrupları şöbə və ya vəzifə üzrə qurun: "Satış", "Müştəri xidməti", "Anbar — növbə A", "Filial rəhbərləri". Ümumi mövzular (məsələn, korporativ qaydalar) üçün isə bütün şirkəti əhatə edən ayrıca qrup yarada bilərsiniz.</p>
<p>Kursometr-də fənlər və qruplar yaradılır, hər qrup üçün həftəlik cədvəl qurulur. Korporativ təlimdə fənn təlim istiqaməti, qrup isə şöbə və ya axın deməkdir. Cədvəldə canlı sessiyaların günü və saatı sabit olanda işçi və onun rəhbəri bu vaxtı əvvəlcədən planlaşdırır, təlim isə iş qrafiki ilə toqquşmur.</p>
<h3>Canlı sessiyalarda davamiyyət</h3>
<p>Canlı təlim sessiyasında kimin iştirak etdiyini qeyd edin — istər ofisdəki otaqda, istərsə onlayn görüşdə. Kursometr-də davamiyyət cədvələ əsasən aparılır və telefon brauzerindən qeyd etmək olur, təlimçinin kompüter axtarmasına ehtiyac qalmır. Ay sonunda kimin hansı sessiyanı buraxdığı bir baxışla görünür, ardıcıl sessiyaları buraxan işçi isə vaxtında diqqətə düşür və onun rəhbəri ilə danışmaq olur.</p>

<h2>4. Bilik Yoxlaması: Vaxtlı Testlər və PDF Test Toplusundan Sual Bazası</h2>
<p>Təlimin nəticəsi "materialı göndərdik" deyil, "işçi öyrəndiyini göstərdi" olmalıdır. Bunun ən sadə yolu qısa bilik yoxlamasıdır. Kursometr-də vaxtlı testlər təyin etdiyiniz saatda açılır və bağlanır, qapalı suallar isə avtomatik yoxlanır. Təlimçi onlarla vərəqi əl ilə yoxlamır, nəticələr isə bir yerdə toplanır.</p>
<p>Çox şirkətdə artıq hazır test toplusu olur: təhlükəsizlik qaydaları üzrə suallar, məhsul bilgisi testi, müştəri xidməti standartları. Əgər bu toplu PDF formatındadırsa, onu Kursometr-də sual bazasına əlavə edib testləri ondan qura bilərsiniz. Yüklədiyiniz materialdan istifadə hüququnuzun olduğunu yoxlayın: şirkətin öz təlimçilərinin hazırladığı suallar ən etibarlı variantdır.</p>
<ul>
  <li><strong>Mövzu üzrə qısa testlər</strong> — hər moduldan sonra bir neçə sual, uzun imtahan yox.</li>
  <li><strong>Qapalı suallar</strong> — variant seçmək asandır, yoxlama avtomatik olur.</li>
  <li><strong>Vaxt məhdudiyyəti</strong> — işçi materiala baxmadan cavab verməyə öyrəşir.</li>
  <li><strong>Praktik vəziyyətlər</strong> — "müştəri belə dedi, nə edərsiniz?" tipli suallar qaydanın əzbərlənməsindən daha çox şey göstərir.</li>
</ul>
<p>Test nəticələri təlimin ən dəqiq ölçüsüdür: hansı işçinin hansı mövzuda zəif olduğunu, hansı sualda qrupun çoxunun səhv etdiyini göstərir. Sual hazırlamaq barədə ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</p>
<p>Bir məqamı ayrıca qeyd edək: Kursometr sertifikat vermir və tənzimləyici orqanlar üçün uyğunluq (compliance) hesabatı hazırlamır. Əgər sizin sahədə məcburi təlimlərin rəsmi sənədləşdirilməsi tələb olunursa, bunu mövcud qaydalarınıza uyğun ayrıca aparın.</p>

<h2>5. Tapşırıqlar və Mentorlar: Təlimi İş Prosesinə Bağlamaq</h2>
<p>Testlər bilik yoxlayır, tapşırıqlar isə bacarıq. Satış menecerindən təqdimat planı, anbar işçisindən doldurulmuş yoxlama siyahısı, müştəri xidməti əməkdaşından cavab nümunəsi istəmək olar. Kursometr-də təlimçi tapşırığı fayllarla verir (məsələn, şablon və ya nümunə sənəd), işçi isə cavabını öz kabinetindən fayl kimi təhvil verir. Kimin təhvil verdiyi bir siyahıda görünür, fayllar e-poçt qutularında itmir. Tapşırıq sistemi barədə ətraflı: <a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">tapşırıq sistemi</a>.</p>
<h3>Daxili təlimçilər və komanda rəhbərləri — mentor hesabları</h3>
<p>Korporativ təlimi bir nəfər aparmır. Satış təlimini satış rəhbəri, texniki təlimi isə təcrübəli mütəxəssis keçir. Kursometr-də bunun üçün mentor (köməkçi müəllim) hesabları var: hər daxili təlimçi və ya komanda rəhbəri öz hesabı ilə daxil olur və öz qrupları ilə işləyir, ortaq parola ehtiyac qalmır. Mentor işdən ayrılanda hesabı bağlanır, qrupların məlumatı isə şirkətdə qalır.</p>
<h3>Sahə və növbəli işçilər</h3>
<p>Hər işçinin masası və kompüteri olmur. Anbar, logistika, pərakəndə satış, servis və istehsalat işçiləri çox vaxt yalnız telefonla işləyir. Kursometr telefon brauzerində işləyir, mobil tətbiq yükləmək lazım deyil: işçi materialı növbə fasiləsində oxuyur, testi isə telefonundan həll edir. Növbəli işçilər üçün testin açıq qaldığı vaxtı elə seçin ki, bütün növbələr ona çata bilsin.</p>

<h2>6. Şirkətlərə Təlim Satan Tədris Mərkəzləri üçün</h2>
<p>Bəzi tədris mərkəzləri fərdi tələbələrlə yanaşı şirkətlərə də kurs satır: kollektiv üçün dil kursu, satış təlimi, ofis proqramları, mühasibat əsasları. Bu halda ən rahat struktur hər müştəri şirkət üçün ayrıca qrupdur — məsələn, "İngilis dili — A şirkəti" və "İngilis dili — B şirkəti". Hər qrupun öz cədvəli, öz materialları və öz testləri olur, bir şirkətin işçiləri digər şirkətin qrupunu görmür.</p>
<p>Kursometr-də ödənişlər izlənir, beləliklə hansı iştirakçılar üzrə ödənişin daxil olduğu və kimin borcu qaldığı dəftər vərəqləmədən görünür. Müqavilə, hesab-faktura və mühasibat sənədləri isə mühasibat sisteminizdə qalır. Müştəri şirkətə hesabat lazımdırsa, davamiyyət və test nəticələri əsasında onu özünüz hazırlaya bilərsiniz. Tədris mərkəzinin idarə edilməsi barədə ətraflı: <a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">tədris mərkəzi idarəetmə proqramı</a>.</p>

<h2>7. E-poçt + Ortaq Qovluq + WhatsApp + Excel, yoxsa Kursometr?</h2>
<p>Əksər şirkətlər daxili təlimə e-poçt, ortaq qovluq, WhatsApp qrupları və Excel cədvəli ilə başlayır. Bir şöbə və az sayda işçi olanda bu işləyir, amma qruplar və təlimçilər çoxaldıqca fərq görünür:</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>E-poçt + ortaq qovluq + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Onboarding materialları</td><td>Səpələnib, aktual versiya bilinmir</td><td>Yalnız həmin qrupa görünən materiallar və dərs yazıları</td></tr>
    <tr><td>Qruplar</td><td>E-poçt siyahıları və çat qrupları</td><td>Şöbə və ya vəzifə üzrə qruplar</td></tr>
    <tr><td>Təlim cədvəli</td><td>Təqvim dəvətləri və mesajlar</td><td>Hər qrup üçün həftəlik cədvəl</td></tr>
    <tr><td>Davamiyyət</td><td>Excel-də əl ilə</td><td>Telefon brauzerindən qeyd</td></tr>
    <tr><td>Bilik yoxlaması</td><td>Kağız və ya ayrı-ayrı formalar, nəticə toplanmır</td><td>Vaxtlı testlər, qapalı suallar avtomatik yoxlanır</td></tr>
    <tr><td>Mövcud testlər</td><td>PDF faylları qovluqda</td><td>PDF test toplusu sual bazasına əlavə olunur</td></tr>
    <tr><td>Tapşırıqlar</td><td>E-poçt qoşmaları</td><td>İşçi kabinetdən fayl təhvil verir</td></tr>
    <tr><td>Daxili təlimçilər</td><td>Ortaq hesab və ya parol</td><td>Ayrıca mentor hesabları</td></tr>
  </tbody>
</table>
<p>WhatsApp-dan və e-poçtdan tam imtina etmək lazım deyil: təcili elan və ya sessiya saatının dəyişməsi üçün rahatdır. Sadəcə materiallar, davamiyyət, test nəticələri və tapşırıqlar nizamlı, qorunan yerdə saxlanmalıdır.</p>
<h3>Kursometr nə etmir</h3>
<p>Seçim etməzdən əvvəl sərhədləri bilmək vacibdir. Kursometr HR sistemi deyil — o, müəllimlər və kurs mərkəzləri üçün qurulub. HR və ya əmək haqqı sistemləri ilə inteqrasiya, SCORM, sertifikat və ya uyğunluq hesabatı kimi korporativ LMS funksiyaları sizin üçün vacibdirsə, bunu seçimdən əvvəl ayrıca dəqiqləşdirin və bu imkanlara əsaslanan plan qurmayın. Əgər şirkətinizə HR sistemi ilə inteqrasiya olunmuş təlim həlli lazımdırsa, RS Code fərdi proqram təminatı da hazırlayır — <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>

<h2>8. Praktik Məsləhətlər və Qurulum Siyahısı</h2>
<h3>Modulları qısa saxlayın</h3>
<p>Uzun, bir saatlıq mühazirə əvəzinə təlimi qısa modullara bölün: bir modul — bir mövzu. İşçi qısa modulu növbə fasiləsində və ya iş günündəki boşluqda keçə bilir, təlimçi isə hansı mövzunun mənimsənilmədiyini daha dəqiq görür.</p>
<h3>Hər moduldan sonra test</h3>
<p>Hər modulun sonunda bir neçə sualdan ibarət qısa test qoyun. Bu, işçini materialı diqqətlə oxumağa həvəsləndirir, təlimçiyə isə hansı modulun yenidən izah edilməli olduğunu göstərir.</p>
<h3>Təkrar cədvəli</h3>
<p>Bir dəfə keçilən təlim zamanla unudulur. Vacib mövzular (təhlükəsizlik, əsas prosedurlar, məhsul bilgisi) üçün təkrar sessiyaları və təkrar testləri əvvəlcədən cədvələ yazın — məsələn, rübdə bir dəfə. Kursometr avtomatik xatırlatma göndərmir, ona görə də təkrar tarixlərini cədvəldə özünüz planlaşdırın və işçilərə öz kanallarınızla xəbər verin.</p>
<h3>Nəticəni test balı ilə ölçün</h3>
<p>Təlimin effektivliyini "neçə nəfər materialı aldı" ilə deyil, test nəticələri ilə ölçün. Modul əvvəli və sonrası testləri müqayisə edin, qrup üzrə zəif sualları izləyin, təkrar testdə balı düşən mövzuları növbəti sessiyaya daxil edin. Bu, rəhbərliyə təlimin real nəticəsini göstərməyin ən sadə yoludur.</p>
<h3>Keçidi necə etməli</h3>
<p>Bütün şirkəti bir gündə köçürməyin. Növbəti yeni işçi axını və ya bir şöbə ilə başlayın: onun materiallarını, cədvəlini, davamiyyətini və testlərini yeni sistemdə aparın, ilk sessiyada işçilərə telefondan necə daxil olacaqlarını göstərin. Bir-iki həftədən sonra digər şöbələri əlavə edin. Bir məktəbin oxşar keçidi necə etdiyini <a href="/blog-details/surucu-kursu-ucun-idareetme-proqrami-2027">sürücü kursu nümunəsində</a> görə bilərsiniz.</p>
<h3>Qurulum siyahısı</h3>
<ul>
  <li>☐ Şirkətin təlim səhifəsi açılıb (adiniz.kursometr.com)</li>
  <li>☐ Təlim istiqamətləri fənn kimi yaradılıb</li>
  <li>☐ Qruplar şöbə, vəzifə və ya yeni işçi axını üzrə qurulub</li>
  <li>☐ Hər qrupun canlı sessiyaları üçün həftəlik cədvəl qurulub</li>
  <li>☐ Onboarding materialları (qaydalar, prosedurlar, təlimat yazıları) qrupun səhifəsinə yüklənib</li>
  <li>☐ Mövcud PDF test toplusu sual bazasına əlavə olunub, istifadə hüququ yoxlanılıb</li>
  <li>☐ Hər modul üçün qısa test hazırlanıb</li>
  <li>☐ Daxili təlimçilər və komanda rəhbərləri üçün mentor hesabları açılıb</li>
  <li>☐ İşçilər qruplara əlavə olunub, telefondan və Google hesabı ilə necə daxil olacaqlarını bilir</li>
  <li>☐ Təkrar sessiyaları və təkrar testləri cədvələ yazılıb</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-dən korporativ təlim üçün istifadə etmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Kursometr təhsil — müəllimlər və kurs mərkəzləri üçün qurulub, amma şirkət təlimində bu şəkildə istifadə oluna bilər: işçilər qruplara bölünür, materiallar yalnız qrupa görünür, canlı sessiyalarda davamiyyət qeyd olunur, bilik vaxtlı testlərlə yoxlanılır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Yeni işçinin onboarding-ini necə qurmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yeni işçilər üçün ayrıca qrup yaradın və daxili qaydaları, prosedurları və təlimat yazılarını ora yerləşdirin. Bu materiallar yalnız həmin qrupa görünür. Hər moduldan sonra qısa test qoyun.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Mövcud PDF testlərimizi istifadə edə bilərikmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. PDF test toplusunu Kursometr-də sual bazasına əlavə edib testləri ondan qurmaq olar. Vaxtlı testlər təyin olunan saatda açılıb bağlanır, qapalı suallar avtomatik yoxlanır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kompüteri olmayan sahə işçiləri necə qoşulur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr telefon brauzerində işləyir, mobil tətbiq yükləmək lazım deyil. İşçi materialları oxuyur və testləri telefonundan həll edir, Google hesabı ilə də daxil ola bilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr HR sistemimizlə inteqrasiya olunurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr təhsil platformasıdır və HR sistemi kimi təqdim olunmur; HR inteqrasiyası, API, SCORM və ya sertifikat kimi funksiyalar lazımdırsa, bunu əvvəlcədən dəqiqləşdirin. İnteqrasiya lazımdırsa, RS Code fərdi proqram təminatı hazırlayır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Şirkətlərə təlim satan tədris mərkəzi Kursometr-i necə istifadə edə bilər?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər müştəri şirkət üçün ayrıca qrup yaradın: öz cədvəli, materialları və testləri ilə. Ödənişlər izlənir, borcu qalanlar bir baxışla görünür. Müqavilə və hesab-fakturalar isə mühasibat sisteminizdə qalır.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">Onlayn test necə hazırlanır</a></li>
  <li><a href="/blog-details/tedris-merkezi-idareetme-proqrami-2026">Tədris mərkəzi idarəetmə proqramı</a></li>
  <li><a href="/blog-details/onlayn-ders-nece-teskil-olunur-2027">Onlayn dərs necə təşkil olunur</a></li>
  <li><a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">Ev tapşırığı sistemi</a></li>
  <li><a href="/blog-details/surucu-kursu-ucun-idareetme-proqrami-2027">Sürücü kursu üçün idarəetmə proqramı</a></li>
</ul>

<h2>Nəticə</h2>
<p>Korporativ təlimin uğuru materialın çoxluğundan deyil, nizamdan asılıdır. Yeni işçi üçün ayrıca qrup və yalnız ona görünən materiallar, şöbə və vəzifə üzrə qruplar, sabit təlim cədvəli, canlı sessiyalarda davamiyyət, hər moduldan sonra qısa test, mövcud test toplusundan qurulan sual bazası, kabinetdən təhvil verilən tapşırıqlar, daxili təlimçilər üçün ayrıca hesablar və planlı təkrar təlim işçinin nəyi bildiyini təxminlə deyil, test nəticəsi ilə göstərir.</p>
<p><strong>Şirkətdaxili təlimi e-poçt, ortaq qovluq, WhatsApp və Excel-dən bir sistemə köçürmək istəyirsiniz? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong> — müəllim qeydiyyatı pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. HR sistemi ilə inteqrasiya və ya şirkətinizin öz iş qaydalarına uyğun fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır. Kursometr təhsil üçün qurulmuş platformadır, funksiyaları noyabr 2026 vəziyyətinə görə təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>A new hire joins the company, and their first week usually follows the same script. HR sends them a few PDFs, the manager says "everything is in the shared folder", the team lead drops a link to an instruction video in WhatsApp, and the following week someone ticks a "training done" box in an Excel spreadsheet. A month later it turns out the employee has not read half of the internal policy, looked at an old version of a procedure, and missed the live training session because it clashed with their shift. And nobody can say for sure who knows what.</p>
<p>This article is for HR specialists, training managers, department heads and internal trainers who organise in-company training in 2027. It also applies to training centres that sell courses to companies. We go step by step through onboarding materials, groups by department and role, the training schedule, attendance at live sessions, timed knowledge checks, a question bank built from an existing PDF test collection, assignments, mentor accounts for internal trainers and groups per client company. At the end there is a comparison of email + shared folders + WhatsApp + Excel with <a href="/mehsullar/kursometr">Kursometr</a>, practical tips and a setup checklist.</p>
<p>An honest note up front: Kursometr is built for education — for teachers, tutors and course centres. Its terms are "teacher", "student" and "group". But the core of corporate training is the same: people are split into groups, materials are shared, sessions are held and knowledge is checked. That is why Kursometr can be used for company training this way: employees work with student accounts, and internal trainers with teacher or mentor accounts.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What should a corporate training platform include?</td><td>Groups, a schedule, attendance, materials, knowledge checks and assignments in one place</td></tr>
    <tr><td>How should new hire onboarding be set up?</td><td>A separate group, with policies, procedures and recorded instructions visible only to that group</td></tr>
    <tr><td>How should groups be split?</td><td>By department or role, each group with its own training schedule</td></tr>
    <tr><td>How should knowledge be checked?</td><td>With timed tests: closed questions are graded automatically, and questions can come from an existing PDF test collection</td></tr>
    <tr><td>How do field and shift staff take part?</td><td>From a phone browser, without installing a mobile app; they can also sign in with a Google account</td></tr>
    <tr><td>Is Kursometr a corporate system?</td><td>No, it is built for education, but it can be used for company training this way</td></tr>
    <tr><td>What if you need HR system integration?</td><td>You need a custom system — <a href="/contact">get in touch</a></td></tr>
  </tbody>
</table>

<h2>1. The Main Problem in Corporate Training: Materials Exist, Order Does Not</h2>
<p>In most companies the problem is not a lack of training materials. Internal policies are written, procedures are ready, and sometimes instruction videos have even been recorded. The problem is that these materials are scattered: some in email, some in a shared folder, some on a manager's phone. A new hire does not know which document is current, the trainer cannot see who has read the material, and the manager answers "does the team know this procedure?" with a guess.</p>
<p>Well-organised corporate training should answer four simple questions: who is in which group, which materials they should see, whether they attended the live sessions, and whether they could show what they learned in a test. When the answers to these four questions are in one place, training moves past the "we sent it, they probably read it" stage and becomes a measurable process.</p>
<table>
  <thead>
    <tr><th>Type of training</th><th>For whom</th><th>Main challenge</th><th>What the platform needs</th></tr>
  </thead>
  <tbody>
    <tr><td>Onboarding</td><td>New hires</td><td>Materials are scattered, the first week is chaotic</td><td>A separate group, materials visible only to that group</td></tr>
    <tr><td>Role-based training</td><td>Department or role groups</td><td>Everyone gets the same material</td><td>Groups and a schedule by department/role</td></tr>
    <tr><td>Live sessions</td><td>A group</td><td>Nobody knows who attended</td><td>Attendance records</td></tr>
    <tr><td>Knowledge checks</td><td>All participants</td><td>Paper tests graded by hand</td><td>Timed tests, automatic grading</td></tr>
    <tr><td>Refresher training</td><td>Existing staff</td><td>Forgotten, not planned</td><td>Refresher sessions and tests on the schedule</td></tr>
  </tbody>
</table>

<h2>2. Onboarding: Materials Visible Only to the New Hire's Group</h2>
<p>Set up onboarding as a separate group — for example, "New hires — November intake" or "Sales department — new staff". Put internal policies, work procedures, safety instructions and recorded instruction lessons into this group. In <a href="/mehsullar/kursometr">Kursometr</a>, lesson recordings and materials are visible only to that group: participants from other groups and outsiders cannot see them. This reduces the risk of internal documents reaching people who do not need them, but does not eliminate it — state separately in your internal rules that materials are for work use only.</p>
<p>Arrange materials in order. For the first day, general information about the company and the key rules; for the first week, procedures specific to the role; for the following weeks, deeper topics. When a new hire can see what they will learn and in what order, the stress of the first days goes down, and the team lead who supports them no longer has to answer the same questions again and again.</p>
<p>If you have an instruction video or a recording of a live session, add it to the group's materials too. An employee who could not attend the session because of their shift can go through the topic later from the recording. More on running online sessions: <a href="/blog-details/how-to-run-online-lessons-2027">how to run online lessons</a>.</p>
<h3>Each company gets its own page</h3>
<p>In Kursometr, each teacher or centre opens their own page (yourname.kursometr.com). For a company, this serves as the address of its training portal: employees sign in there with their own accounts, including with a Google account. Google sign-in means employees do not have to remember a separate password. Note that Kursometr has no corporate sign-in methods other than Google (for example, signing in through the company's internal user directory).</p>

<h2>3. Groups by Department and Role, a Training Schedule and Attendance</h2>
<p>Sending the same material to every employee is the most common mistake. An accountant does not need the sales script, and a warehouse worker does not need the fine details of office software. Build groups by department or role: "Sales", "Customer service", "Warehouse — shift A", "Branch managers". For general topics (for example, company policies) you can create a separate group covering the whole company.</p>
<p>In Kursometr you create subjects and groups and set up a weekly schedule for each group. In corporate training, a subject means a training track and a group means a department or intake. When the day and time of live sessions are fixed in the schedule, employees and their managers can plan for them in advance, and training does not clash with work rotas.</p>
<h3>Attendance at live sessions</h3>
<p>Record who attended each live training session — whether in an office meeting room or in an online meeting. In Kursometr, attendance is kept against the schedule and can be marked from a phone browser, so the trainer does not have to look for a computer. At the end of the month, who missed which session is visible at a glance, and an employee who has missed several sessions in a row gets noticed in time so you can talk to their manager.</p>

<h2>4. Knowledge Checks: Timed Tests and a Question Bank from a PDF Test Collection</h2>
<p>The outcome of training should not be "we sent the material" but "the employee showed what they learned". The simplest way to get there is a short knowledge check. In Kursometr, timed tests open and close at the time you set, and closed questions are graded automatically. The trainer does not grade dozens of sheets by hand, and the results are collected in one place.</p>
<p>Many companies already have a ready-made test collection: questions on safety rules, a product knowledge test, customer service standards. If this collection is in PDF format, you can import it into the question bank in Kursometr and build tests from it. Check that you have the right to use the material you upload: questions written by the company's own trainers are the safest option.</p>
<ul>
  <li><strong>Short tests by topic</strong> — a few questions after each module, not one long exam.</li>
  <li><strong>Closed questions</strong> — choosing an option is easy, and grading is automatic.</li>
  <li><strong>A time limit</strong> — employees get used to answering without looking at the material.</li>
  <li><strong>Practical situations</strong> — "the customer said this, what would you do?" questions show more than memorising a rule.</li>
</ul>
<p>Test results are the most precise measure of training: they show which employee is weak on which topic, and which question most of the group got wrong. More on writing questions: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</p>
<p>One point deserves a separate mention: Kursometr does not issue certificates and does not produce compliance reports for regulators. If your sector requires formal documentation of mandatory training, keep it separately according to your existing procedures.</p>

<h2>5. Assignments and Mentors: Linking Training to Real Work</h2>
<p>Tests check knowledge; assignments check skills. You can ask a sales manager for a presentation plan, a warehouse worker for a completed checklist, or a customer service agent for a sample reply. In Kursometr, the trainer sets the assignment with files (for example, a template or a sample document), and the employee submits their answer as a file from their own cabinet. Who has submitted is visible in one list, and files do not get lost in email inboxes. More on the assignment system: <a href="/blog-details/homework-system-for-teachers-2027">homework system</a>.</p>
<h3>Internal trainers and team leads as mentor accounts</h3>
<p>Corporate training is not run by one person. Sales training is led by the head of sales, technical training by an experienced specialist. Kursometr has mentor (assistant teacher) accounts for this: each internal trainer or team lead signs in with their own account and works with their own groups, with no need for a shared password. When a mentor leaves the company, their account is closed and the groups' data stays with the company.</p>
<h3>Field and shift staff</h3>
<p>Not every employee has a desk and a computer. Warehouse, logistics, retail, service and production staff often work with only a phone. Kursometr works in a phone browser, so there is no need to install a mobile app: an employee reads the material during a shift break and takes the test on their phone. For shift workers, choose a test window long enough for every shift to reach it.</p>

<h2>6. For Training Centres That Sell Courses to Companies</h2>
<p>Some training centres sell courses to companies as well as to individual students: a language course for a team, sales training, office software, accounting basics. In this case the most convenient structure is a separate group for each client company — for example, "English — Company A" and "English — Company B". Each group has its own schedule, materials and tests, and one company's employees cannot see another company's group.</p>
<p>Kursometr tracks payments, so you can see which participants have been paid for and who still owes without leafing through a notebook. Contracts, invoices and accounting documents stay in your accounting system. If a client company needs a report, you can prepare it yourself based on attendance and test results. More on running a training centre: <a href="/blog-details/training-centre-management-software-2026">training centre management software</a>.</p>

<h2>7. Email + Shared Folders + WhatsApp + Excel, or Kursometr?</h2>
<p>Most companies start in-company training with email, shared folders, WhatsApp groups and an Excel spreadsheet. With one department and a few employees this works, but as groups and trainers multiply, the difference shows:</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>Email + shared folders + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Onboarding materials</td><td>Scattered, the current version is unclear</td><td>Materials and lesson recordings visible only to that group</td></tr>
    <tr><td>Groups</td><td>Mailing lists and chat groups</td><td>Groups by department or role</td></tr>
    <tr><td>Training schedule</td><td>Calendar invites and messages</td><td>A weekly schedule for each group</td></tr>
    <tr><td>Attendance</td><td>Kept by hand in Excel</td><td>Marked from a phone browser</td></tr>
    <tr><td>Knowledge checks</td><td>Paper or separate forms, results not collected</td><td>Timed tests, closed questions graded automatically</td></tr>
    <tr><td>Existing tests</td><td>PDF files in a folder</td><td>The PDF test collection imported into the question bank</td></tr>
    <tr><td>Assignments</td><td>Email attachments</td><td>Employees submit files from their cabinet</td></tr>
    <tr><td>Internal trainers</td><td>A shared account or password</td><td>Separate mentor accounts</td></tr>
  </tbody>
</table>
<p>There is no need to drop WhatsApp and email completely: they are handy for urgent announcements or a change of session time. Materials, attendance, test results and assignments simply need to be kept in an orderly, protected place.</p>
<h3>What Kursometr does not do</h3>
<p>Before choosing, it is important to know the limits. Kursometr is not an HR system — it is built for teachers and course centres. If corporate LMS features such as HR or payroll integration, SCORM, certificates or compliance reports matter to you, confirm them separately before choosing and do not build your plan around them. If your company needs a training solution integrated with an HR system, RS Code also builds custom software — <a href="/contact">get in touch</a>.</p>

<h2>8. Practical Tips and a Setup Checklist</h2>
<h3>Keep modules short</h3>
<p>Instead of a long, hour-long lecture, split training into short modules: one module, one topic. An employee can get through a short module during a shift break or a gap in the working day, and the trainer can see more precisely which topic has not sunk in.</p>
<h3>A test after each module</h3>
<p>Put a short test of a few questions at the end of each module. This encourages employees to read the material carefully and shows the trainer which module needs explaining again.</p>
<h3>A refresher schedule</h3>
<p>Training done once fades over time. For important topics (safety, key procedures, product knowledge), put refresher sessions and refresher tests on the schedule in advance — for example, once a quarter. Kursometr does not send automatic reminders, so plan the refresher dates in the schedule yourself and let employees know through your own channels.</p>
<h3>Measure results by test scores</h3>
<p>Measure training effectiveness not by "how many people received the material" but by test results. Compare tests before and after a module, track weak questions by group, and add topics where scores drop in a refresher test to the next session. This is the simplest way to show management the real outcome of training.</p>
<h3>How to make the switch</h3>
<p>Do not move the whole company in one day. Start with the next intake of new hires or with one department: run its materials, schedule, attendance and tests in the new system, and show employees how to sign in from their phone at the first session. After a week or two, add other departments. You can see how a school made a similar switch in the <a href="/blog-details/management-software-for-driving-schools-2027">driving school example</a>.</p>
<h3>Setup checklist</h3>
<ul>
  <li>☐ The company's training page is open (yourname.kursometr.com)</li>
  <li>☐ Training tracks are created as subjects</li>
  <li>☐ Groups are built by department, role or new hire intake</li>
  <li>☐ A weekly schedule is set up for each group's live sessions</li>
  <li>☐ Onboarding materials (policies, procedures, recorded instructions) are uploaded to the group page</li>
  <li>☐ The existing PDF test collection is imported into the question bank, and the right to use it has been checked</li>
  <li>☐ A short test is prepared for each module</li>
  <li>☐ Mentor accounts are opened for internal trainers and team leads</li>
  <li>☐ Employees are added to groups and know how to sign in from their phone and with a Google account</li>
  <li>☐ Refresher sessions and refresher tests are on the schedule</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can Kursometr be used for corporate training?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Kursometr is built for education — for teachers and course centres — but it can be used for company training this way: employees are split into groups, materials are visible only to the group, attendance at live sessions is recorded and knowledge is checked with timed tests.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do you set up onboarding for new hires?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Create a separate group for new hires and put internal policies, procedures and recorded instructions there. These materials are visible only to that group. Add a short test after each module.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can we use our existing PDF tests?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. You can import a PDF test collection into the question bank in Kursometr and build tests from it. Timed tests open and close at the set time, and closed questions are graded automatically.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do field staff without a computer take part?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr works in a phone browser, so there is no need to install a mobile app. Employees read materials and take tests on their phone, and they can also sign in with a Google account.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does Kursometr integrate with our HR system?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr is an education platform and is not presented as an HR system; if you need HR integration, an API, SCORM or certificates, confirm this in advance. If you need an integration, RS Code builds custom software.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can a training centre that sells courses to companies use Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Create a separate group for each client company, with its own schedule, materials and tests. Payments are tracked, so those who still owe are visible at a glance. Contracts and invoices stay in your accounting system.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/how-to-create-online-tests-for-teachers-2027">How to create online tests</a></li>
  <li><a href="/blog-details/training-centre-management-software-2026">Training centre management software</a></li>
  <li><a href="/blog-details/how-to-run-online-lessons-2027">How to run online lessons</a></li>
  <li><a href="/blog-details/homework-system-for-teachers-2027">Homework system for teachers</a></li>
  <li><a href="/blog-details/management-software-for-driving-schools-2027">Management software for driving schools</a></li>
</ul>

<h2>Conclusion</h2>
<p>The success of corporate training depends not on the amount of material but on order. A separate group for new hires with materials only they can see, groups by department and role, a fixed training schedule, attendance at live sessions, a short test after each module, a question bank built from an existing test collection, assignments submitted from the cabinet, separate accounts for internal trainers and planned refresher training show what an employee knows through test results rather than guesswork.</p>
<p><strong>Want to move in-company training from email, shared folders, WhatsApp and Excel into one system? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher registration is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. If you need HR system integration or a custom system built around your company's own workflows: <a href="/contact">get in touch</a>.</p>
<p><small><em>This article is general information. Kursometr is a platform built for education; its features are described as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Новый сотрудник приходит в компанию, и его первая неделя обычно проходит по одному сценарию. Отдел кадров присылает несколько PDF-файлов, руководитель говорит «всё лежит в общей папке», тимлид кидает в WhatsApp ссылку на обучающее видео, а через неделю кто-то ставит отметку «обучение пройдено» в таблице Excel. Через месяц выясняется, что сотрудник не прочитал половину внутреннего регламента, смотрел старую версию процедуры, а на живую обучающую сессию не попал, потому что она совпала с его сменой. И точно сказать, кто что знает, не может никто.</p>
<p>Эта статья — для HR-специалистов, менеджеров по обучению, руководителей отделов и внутренних тренеров, которые в 2027 году организуют обучение сотрудников внутри компании. Она подойдёт и учебным центрам, которые продают курсы компаниям. Пошагово разбираем материалы онбординга, группы по отделам и должностям, расписание обучения, посещаемость живых сессий, проверку знаний тестами с таймером, банк вопросов из уже имеющегося PDF-сборника тестов, задания, аккаунты наставников для внутренних тренеров и группы по компаниям-клиентам. В конце — сравнение связки почта + общие папки + WhatsApp + Excel с <a href="/mehsullar/kursometr">Kursometr</a>, практические советы и чек-лист настройки.</p>
<p>Честно скажем сразу: Kursometr создан для образования — для учителей, репетиторов и учебных центров. В нём используются понятия «преподаватель», «ученик» и «группа». Но суть корпоративного обучения та же: люди делятся на группы, материалы раздаются, проводятся сессии, проверяются знания. Поэтому Kursometr можно использовать для обучения сотрудников именно так: сотрудник работает с аккаунтом ученика, а внутренний тренер — с аккаунтом преподавателя или наставника.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Что должно быть в платформе корпоративного обучения?</td><td>Группы, расписание, посещаемость, материалы, проверка знаний и задания в одном месте</td></tr>
    <tr><td>Как выстроить онбординг нового сотрудника?</td><td>Отдельная группа, регламенты, процедуры и записи инструкций видны только этой группе</td></tr>
    <tr><td>Как делить группы?</td><td>По отделам или должностям, у каждой группы своё расписание обучения</td></tr>
    <tr><td>Как проверять знания?</td><td>Тестами с таймером: закрытые вопросы проверяются автоматически, вопросы можно взять из имеющегося PDF-сборника</td></tr>
    <tr><td>Как подключить полевых и сменных сотрудников?</td><td>Через браузер телефона, без установки мобильного приложения; войти можно и через Google-аккаунт</td></tr>
    <tr><td>Kursometr — корпоративная система?</td><td>Нет, он создан для образования, но для обучения сотрудников его можно использовать таким образом</td></tr>
    <tr><td>А если нужна интеграция с HR-системой?</td><td>Нужна индивидуальная система — <a href="/kontakty">напишите нам</a></td></tr>
  </tbody>
</table>

<h2>1. Главная проблема корпоративного обучения: материалы есть, порядка нет</h2>
<p>В большинстве компаний проблема не в нехватке учебных материалов. Внутренние регламенты написаны, процедуры готовы, иногда даже записаны обучающие видео. Проблема в том, что всё это разбросано: часть в почте, часть в общей папке, часть в телефоне у какого-нибудь руководителя. Новый сотрудник не знает, какой документ актуален, тренер не видит, кто прочитал материал, а руководитель отвечает на вопрос «знает ли команда эту процедуру?» наугад.</p>
<p>Хорошо организованное корпоративное обучение должно отвечать на четыре простых вопроса: кто в какой группе, какие материалы он должен видеть, был ли он на живых сессиях и смог ли показать в тесте, чему научился. Когда ответы на эти вопросы собраны в одном месте, обучение выходит из стадии «отправили, наверное, прочитал» и становится измеримым процессом.</p>
<table>
  <thead>
    <tr><th>Вид обучения</th><th>Для кого</th><th>Главная сложность</th><th>Что нужно в платформе</th></tr>
  </thead>
  <tbody>
    <tr><td>Онбординг</td><td>Новые сотрудники</td><td>Материалы разбросаны, первая неделя проходит сумбурно</td><td>Отдельная группа, материалы только для неё</td></tr>
    <tr><td>Обучение по должности</td><td>Группы отделов или должностей</td><td>Всем рассылают одно и то же</td><td>Группы и расписание по отделам/должностям</td></tr>
    <tr><td>Живые сессии</td><td>Группа</td><td>Неизвестно, кто присутствовал</td><td>Отметка посещаемости</td></tr>
    <tr><td>Проверка знаний</td><td>Все участники</td><td>Бумажные тесты, ручная проверка</td><td>Тесты с таймером, автоматическая проверка</td></tr>
    <tr><td>Повторное обучение</td><td>Действующие сотрудники</td><td>Забывается, не планируется</td><td>Повторные сессии и тесты в расписании</td></tr>
  </tbody>
</table>

<h2>2. Онбординг: материалы, видимые только группе новичков</h2>
<p>Оформите онбординг как отдельную группу — например, «Новые сотрудники — ноябрьский поток» или «Отдел продаж — новички». Разместите в ней внутренние регламенты, рабочие процедуры, инструкции по технике безопасности и записанные обучающие уроки. В <a href="/mehsullar/kursometr">Kursometr</a> записи уроков и материалы видны только этой группе: участники других групп и посторонние их не видят. Это снижает риск того, что внутренние документы попадут к тем, кому они не нужны, но не устраняет его полностью — отдельно пропишите во внутренних правилах, что материалы предназначены только для работы.</p>
<p>Выстройте материалы по порядку. На первый день — общая информация о компании и основные правила, на первую неделю — процедуры, относящиеся к должности, на следующие недели — более глубокие темы. Когда новичок видит, что и в какой последовательности он будет изучать, напряжение первых дней снижается, а тимлиду, который его сопровождает, не приходится раз за разом отвечать на одни и те же вопросы.</p>
<p>Если есть обучающее видео или запись живой сессии, добавьте и их в материалы группы. Сотрудник, который не смог прийти на сессию из-за смены, пройдёт тему позже по записи. Подробнее об организации онлайн-сессий: <a href="/blog-details/kak-provodit-onlajn-uroki-2027">как проводить онлайн-уроки</a>.</p>
<h3>У каждой компании своя страница</h3>
<p>В Kursometr каждый преподаватель или центр открывает свою страницу (imya.kursometr.com). Для компании это адрес её учебного портала: сотрудники входят туда со своими аккаунтами, в том числе через Google-аккаунт. Вход через Google избавляет сотрудника от необходимости помнить отдельный пароль. Отметим, что других способов корпоративного входа, кроме Google (например, через внутренний каталог пользователей компании), в Kursometr нет.</p>

<h2>3. Группы по отделам и должностям, расписание обучения и посещаемость</h2>
<p>Рассылать всем сотрудникам один и тот же материал — самая частая ошибка. Бухгалтеру не нужен скрипт продаж, а сотруднику склада — тонкости офисных программ. Стройте группы по отделам или должностям: «Продажи», «Клиентский сервис», «Склад — смена А», «Руководители филиалов». Для общих тем (например, корпоративных правил) можно создать отдельную группу на всю компанию.</p>
<p>В Kursometr создаются предметы и группы, для каждой группы настраивается недельное расписание. В корпоративном обучении предмет — это направление обучения, а группа — отдел или поток. Когда день и время живых сессий зафиксированы в расписании, сотрудник и его руководитель планируют это время заранее, и обучение не конфликтует с рабочим графиком.</p>
<h3>Посещаемость живых сессий</h3>
<p>Отмечайте, кто участвовал в живой обучающей сессии — будь то переговорная в офисе или онлайн-встреча. В Kursometr посещаемость ведётся по расписанию, и отметить её можно из браузера телефона, тренеру не нужно искать компьютер. В конце месяца сразу видно, кто какую сессию пропустил, а сотрудник, пропустивший несколько сессий подряд, вовремя попадает в поле зрения, и можно поговорить с его руководителем.</p>

<h2>4. Проверка знаний: тесты с таймером и банк вопросов из PDF-сборника</h2>
<p>Результат обучения — не «мы отправили материал», а «сотрудник показал, чему научился». Самый простой путь к этому — короткая проверка знаний. В Kursometr тесты с таймером открываются и закрываются в заданное вами время, а закрытые вопросы проверяются автоматически. Тренер не проверяет десятки листов вручную, а результаты собираются в одном месте.</p>
<p>Во многих компаниях уже есть готовый сборник тестов: вопросы по технике безопасности, тест на знание продукта, стандарты клиентского сервиса. Если этот сборник в формате PDF, его можно добавить в банк вопросов Kursometr и собирать тесты из него. Убедитесь, что у вас есть право использовать загружаемый материал: вопросы, составленные собственными тренерами компании, — самый надёжный вариант.</p>
<ul>
  <li><strong>Короткие тесты по темам</strong> — несколько вопросов после каждого модуля, а не один длинный экзамен.</li>
  <li><strong>Закрытые вопросы</strong> — выбрать вариант легко, проверка автоматическая.</li>
  <li><strong>Ограничение по времени</strong> — сотрудник привыкает отвечать, не подглядывая в материал.</li>
  <li><strong>Практические ситуации</strong> — вопросы вида «клиент сказал вот это, что вы сделаете?» показывают больше, чем заучивание правила.</li>
</ul>
<p>Результаты тестов — самая точная мера обучения: они показывают, какой сотрудник слаб в какой теме и на каком вопросе ошиблась большая часть группы. Подробнее о составлении вопросов: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</p>
<p>Отдельно отметим: Kursometr не выдаёт сертификаты и не формирует отчёты о соответствии (compliance) для регуляторов. Если в вашей отрасли требуется официальное документирование обязательного обучения, ведите его отдельно по вашим действующим правилам.</p>

<h2>5. Задания и наставники: как связать обучение с работой</h2>
<p>Тесты проверяют знания, задания — навыки. Можно попросить менеджера по продажам прислать план презентации, сотрудника склада — заполненный чек-лист, сотрудника клиентского сервиса — пример ответа. В Kursometr тренер выдаёт задание с файлами (например, шаблоном или образцом документа), а сотрудник сдаёт ответ файлом из своего кабинета. Кто сдал, видно в одном списке, и файлы не теряются в почтовых ящиках. Подробнее о системе заданий: <a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">система заданий</a>.</p>
<h3>Внутренние тренеры и тимлиды — аккаунты наставников</h3>
<p>Корпоративное обучение не ведёт один человек. Тренинг по продажам проводит руководитель отдела продаж, техническое обучение — опытный специалист. Для этого в Kursometr есть аккаунты наставников (ассистентов преподавателя): каждый внутренний тренер или тимлид входит под своим аккаунтом и работает со своими группами, общий пароль не нужен. Когда наставник уходит из компании, его аккаунт закрывается, а данные групп остаются в компании.</p>
<h3>Полевые и сменные сотрудники</h3>
<p>Не у каждого сотрудника есть рабочее место с компьютером. Сотрудники склада, логистики, розницы, сервиса и производства часто работают только с телефоном. Kursometr работает в браузере телефона, мобильное приложение устанавливать не нужно: сотрудник читает материал в перерыве между сменами и проходит тест на своём телефоне. Для сменных сотрудников выбирайте такое окно открытия теста, чтобы в него попали все смены.</p>

<h2>6. Для учебных центров, которые продают обучение компаниям</h2>
<p>Некоторые учебные центры, помимо частных учеников, продают курсы компаниям: языковой курс для коллектива, тренинг по продажам, офисные программы, основы бухгалтерии. В этом случае удобнее всего отдельная группа для каждой компании-клиента — например, «Английский — компания А» и «Английский — компания Б». У каждой группы своё расписание, свои материалы и тесты, и сотрудники одной компании не видят группу другой.</p>
<p>В Kursometr ведётся учёт оплат, поэтому без листания тетрадей видно, по каким участникам оплата поступила и за кем остался долг. Договоры, счета и бухгалтерские документы остаются в вашей учётной системе. Если компании-клиенту нужен отчёт, его можно подготовить самостоятельно на основе посещаемости и результатов тестов. Подробнее об управлении учебным центром: <a href="/blog-details/programma-dlya-uchebnogo-centra-2026">программа для учебного центра</a>.</p>

<h2>7. Почта + общие папки + WhatsApp + Excel или Kursometr?</h2>
<p>Большинство компаний начинают внутреннее обучение с почты, общих папок, групп в WhatsApp и таблицы Excel. Пока отдел один и сотрудников немного, это работает, но с ростом числа групп и тренеров разница становится заметной:</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>Почта + общие папки + WhatsApp + Excel</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Материалы онбординга</td><td>Разбросаны, актуальная версия неясна</td><td>Материалы и записи уроков видны только этой группе</td></tr>
    <tr><td>Группы</td><td>Почтовые рассылки и чаты</td><td>Группы по отделам или должностям</td></tr>
    <tr><td>Расписание обучения</td><td>Приглашения в календаре и сообщения</td><td>Недельное расписание для каждой группы</td></tr>
    <tr><td>Посещаемость</td><td>Вручную в Excel</td><td>Отметка из браузера телефона</td></tr>
    <tr><td>Проверка знаний</td><td>Бумага или разрозненные формы, результаты не собираются</td><td>Тесты с таймером, закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Имеющиеся тесты</td><td>PDF-файлы в папке</td><td>PDF-сборник тестов добавляется в банк вопросов</td></tr>
    <tr><td>Задания</td><td>Вложения в письмах</td><td>Сотрудник сдаёт файл из своего кабинета</td></tr>
    <tr><td>Внутренние тренеры</td><td>Общий аккаунт или пароль</td><td>Отдельные аккаунты наставников</td></tr>
  </tbody>
</table>
<p>Полностью отказываться от WhatsApp и почты не нужно: они удобны для срочных объявлений или переноса сессии. Просто материалы, посещаемость, результаты тестов и задания должны храниться в упорядоченном, защищённом месте.</p>
<h3>Чего Kursometr не делает</h3>
<p>Перед выбором важно знать ограничения. Kursometr — не HR-система: он создан для учителей и учебных центров. Если для вас важны функции корпоративной LMS — интеграция с HR- или зарплатными системами, SCORM, сертификаты или отчёты о соответствии, — уточните их отдельно до выбора и не стройте план в расчёте на них. Если вашей компании нужно решение для обучения, интегрированное с HR-системой, RS Code также разрабатывает индивидуальное программное обеспечение — <a href="/kontakty">напишите нам</a>.</p>

<h2>8. Практические советы и чек-лист настройки</h2>
<h3>Делайте модули короткими</h3>
<p>Вместо длинной часовой лекции разбейте обучение на короткие модули: один модуль — одна тема. Короткий модуль сотрудник может пройти в перерыве между сменами или в паузе рабочего дня, а тренер точнее видит, какая тема не усвоена.</p>
<h3>Тест после каждого модуля</h3>
<p>В конце каждого модуля ставьте короткий тест из нескольких вопросов. Это побуждает сотрудника внимательно читать материал и показывает тренеру, какой модуль нужно объяснить заново.</p>
<h3>График повторения</h3>
<p>Однажды пройденное обучение со временем забывается. Для важных тем (техника безопасности, ключевые процедуры, знание продукта) заранее внесите в расписание повторные сессии и повторные тесты — например, раз в квартал. Kursometr не отправляет автоматические напоминания, поэтому планируйте даты повторения в расписании сами и сообщайте сотрудникам по своим каналам.</p>
<h3>Измеряйте результат баллами тестов</h3>
<p>Оценивайте эффективность обучения не по тому, «сколько человек получили материал», а по результатам тестов. Сравнивайте тесты до и после модуля, отслеживайте слабые вопросы по группе, а темы, по которым баллы в повторном тесте снизились, включайте в следующую сессию. Это самый простой способ показать руководству реальный результат обучения.</p>
<h3>Как перейти</h3>
<p>Не переводите всю компанию за один день. Начните со следующего потока новых сотрудников или с одного отдела: ведите его материалы, расписание, посещаемость и тесты в новой системе, а на первой сессии покажите сотрудникам, как входить с телефона. Через неделю-две добавьте остальные отделы. Как похожий переход делает школа, можно посмотреть на <a href="/blog-details/programma-dlya-avtoshkoly-2027">примере автошколы</a>.</p>
<h3>Чек-лист настройки</h3>
<ul>
  <li>☐ Открыта учебная страница компании (imya.kursometr.com)</li>
  <li>☐ Направления обучения созданы как предметы</li>
  <li>☐ Группы построены по отделам, должностям или потокам новых сотрудников</li>
  <li>☐ Для живых сессий каждой группы настроено недельное расписание</li>
  <li>☐ Материалы онбординга (регламенты, процедуры, записи инструкций) загружены на страницу группы</li>
  <li>☐ Имеющийся PDF-сборник тестов добавлен в банк вопросов, право на его использование проверено</li>
  <li>☐ Для каждого модуля подготовлен короткий тест</li>
  <li>☐ Для внутренних тренеров и тимлидов открыты аккаунты наставников</li>
  <li>☐ Сотрудники добавлены в группы и знают, как войти с телефона и через Google-аккаунт</li>
  <li>☐ Повторные сессии и повторные тесты внесены в расписание</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли использовать Kursometr для корпоративного обучения?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Kursometr создан для образования — для учителей и учебных центров, но для обучения сотрудников его можно использовать таким образом: сотрудники делятся на группы, материалы видны только группе, посещаемость живых сессий отмечается, а знания проверяются тестами с таймером.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как выстроить онбординг новых сотрудников?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Создайте отдельную группу для новых сотрудников и разместите в ней внутренние регламенты, процедуры и записи инструкций. Эти материалы видны только этой группе. После каждого модуля добавьте короткий тест.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли использовать наши имеющиеся PDF-тесты?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. PDF-сборник тестов можно добавить в банк вопросов Kursometr и собирать тесты из него. Тесты с таймером открываются и закрываются в заданное время, закрытые вопросы проверяются автоматически.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как подключить полевых сотрудников без компьютера?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr работает в браузере телефона, устанавливать мобильное приложение не нужно. Сотрудник читает материалы и проходит тесты на своём телефоне, войти можно и через Google-аккаунт.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Интегрируется ли Kursometr с нашей HR-системой?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kursometr — образовательная платформа и не позиционируется как HR-система; если нужны интеграция с HR, API, SCORM или сертификаты, уточните это заранее. Если нужна интеграция, RS Code разрабатывает индивидуальное программное обеспечение.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как учебному центру, продающему обучение компаниям, использовать Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Создайте отдельную группу для каждой компании-клиента — со своим расписанием, материалами и тестами. Оплаты учитываются, и должники видны сразу. Договоры и счета остаются в вашей учётной системе.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">Как создать онлайн-тест</a></li>
  <li><a href="/blog-details/programma-dlya-uchebnogo-centra-2026">Программа для учебного центра</a></li>
  <li><a href="/blog-details/kak-provodit-onlajn-uroki-2027">Как проводить онлайн-уроки</a></li>
  <li><a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">Система домашних заданий для учителя</a></li>
  <li><a href="/blog-details/programma-dlya-avtoshkoly-2027">Программа для автошколы</a></li>
</ul>

<h2>Итог</h2>
<p>Успех корпоративного обучения зависит не от количества материалов, а от порядка. Отдельная группа для новичков и материалы, видимые только им, группы по отделам и должностям, постоянное расписание обучения, посещаемость живых сессий, короткий тест после каждого модуля, банк вопросов из имеющегося сборника тестов, задания из кабинета, отдельные аккаунты для внутренних тренеров и плановое повторение показывают, что знает сотрудник, — по результатам тестов, а не наугад.</p>
<p><strong>Хотите перевести обучение сотрудников из почты, общих папок, WhatsApp и Excel в одну систему? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация педагога бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Если нужна интеграция с HR-системой или индивидуальная система под собственные правила работы компании: <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Статья носит общий информационный характер. Kursometr — платформа, созданная для образования; её функции описаны по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'korporativ-telim-ucun-platforma-2027'],
            [
                'slug_en' => 'corporate-training-platform-for-companies-2027',
                'slug_ru' => 'platforma-dlya-korporativnogo-obucheniya-2027',

                'title_az' => 'Korporativ Təlim üçün Platforma: Onboarding, Şöbə Qrupları, Testlər və Tapşırıqlar (2027)',
                'title_en' => 'Corporate Training Platform for Companies: Onboarding, Department Groups, Tests and Assignments (2027)',
                'title_ru' => 'Платформа для корпоративного обучения: онбординг, группы по отделам, тесты и задания (2027)',

                'review_az' => 'Şirkətdaxili təlim və şirkətlərə kurs satan tədris mərkəzləri üçün: yeni işçinin onboarding-i və yalnız qrupa görünən materiallar, şöbə və vəzifə üzrə qruplar, təlim cədvəli, canlı sessiyalarda davamiyyət, vaxtlı bilik yoxlaması və PDF test toplusundan sual bazası, kabinetdən təhvil verilən tapşırıqlar, mentor hesabları, telefon brauzeri, e-poçt + WhatsApp + Excel ilə Kursometr müqayisəsi və qurulum siyahısı.',
                'review_en' => 'For in-company training and training centres that teach company staff: onboarding with group-only materials, groups by department and role, a training schedule, attendance at live sessions, timed knowledge checks and a question bank from a PDF test collection, assignments submitted from the cabinet, mentor accounts, a phone browser, email + WhatsApp + Excel vs Kursometr and a setup checklist.',
                'review_ru' => 'Для обучения сотрудников внутри компании и учебных центров, которые обучают персонал компаний: онбординг и материалы только для группы, группы по отделам и должностям, расписание обучения, посещаемость живых сессий, проверка знаний тестами с таймером и банк вопросов из PDF-сборника, задания из кабинета, аккаунты наставников, браузер телефона, сравнение почта + WhatsApp + Excel и Kursometr и чек-лист настройки.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '7 Noyabr 2026',
                'date_en' => 'November 7, 2026',
                'date_ru' => '7 Ноября 2026',

                'photo'    => 'cover-corporate-training-az.png',
                'photo_en' => 'cover-corporate-training-en.png',
                'photo_ru' => 'cover-corporate-training-ru.png',

                'meta_title_az' => 'Korporativ Təlim üçün Platforma 2027 | RS Code',
                'meta_title_en' => 'Corporate Training Platform for Companies 2027 | RS Code',
                'meta_title_ru' => 'Платформа для корпоративного обучения 2027 | RS Code',

                'meta_description_az' => 'Şirkətdaxili təlim üçün platforma: onboarding materialları, şöbə qrupları, təlim cədvəli, davamiyyət, vaxtlı testlər, PDF-dən sual bazası və tapşırıqlar.',
                'meta_description_en' => 'A platform for in-company training: onboarding materials, department groups, a training schedule, attendance, timed tests, a question bank from PDF and assignments.',
                'meta_description_ru' => 'Платформа для обучения сотрудников: материалы онбординга, группы по отделам, расписание, посещаемость, тесты с таймером, банк вопросов из PDF и задания.',

                'meta_keywords_az' => 'korporativ təlim platforması, işçi təlimi, onboarding, yeni işçinin adaptasiyası, şirkətdaxili təlim, bilik yoxlaması, təlim testi, kursometr, 2027',
                'meta_keywords_en' => 'corporate training platform, employee training, onboarding, new hire training, in-company training, knowledge check, training test, kursometr, 2027',
                'meta_keywords_ru' => 'платформа корпоративного обучения, обучение сотрудников, онбординг, адаптация новых сотрудников, внутреннее обучение, проверка знаний, тесты для сотрудников, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
