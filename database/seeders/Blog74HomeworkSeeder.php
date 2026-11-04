<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * #74 — Ev tapşırığı sistemi: müəllim tapşırıqları necə verir, yoxlayır və izləyir — dəftər, WhatsApp, yoxsa platforma (2027).
 * Kursometr faktları yalnız resources/lang/az/products.php və kursometr.com-dandır: adiniz.kursometr.com, fənn/qrup/həftəlik cədvəl/davamiyyət,
 * vaxtlı sınaqlar (müəllimin saatında açılıb-bağlanır, qapalı suallar avtomatik, nəticə sınaq bitən kimi), PDF test toplusu → sual bazası,
 * ev tapşırığı: mövzuya izah, fayl və tapşırıq əlavə edilir, tələbə cavabını kabinetindən göndərir, müəllim orada yoxlayır;
 * ödəniş izləmə, valideyn kabineti (davamiyyət, qiymətlər, sınaq nəticələri), mentor hesabı (yalnız tapşırılan qrupları görür),
 * yalnız qrupa görünən dərs yazıları/materiallar, telefon brauzeri, Google ilə giriş, pulsuz qeydiyyat.
 * Ev tapşırığında son tarix (deadline), bal sistemi, plagiat yoxlaması, AI ilə yoxlama, bildiriş/SMS, qiymət və rəylər İDDİA EDİLMİR.
 * Mentorun tapşırıq yoxlaması iddia edilmir (sayt yalnız qrupları görməsini təsdiqləyir).
 * Aralıqlı təkrar və xatırlama təcrübəsi yalnız ümumi təsvirlə, rəqəmsiz. #72 və #73-ə link YOXDUR.
 */
class Blog74HomeworkSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Repetitor və ya kurs müəllimi üçün dərs saatı işin yalnız yarısıdır. Qalan yarısı dərsdən sonra başlayır: ev tapşırığını vermək, şagirdlərin hamısının onu gördüyünə əmin olmaq, gələn cavabları toplamaq, yoxlamaq, rəy yazmaq və kimin mütəmadi işlədiyini, kimin geri qaldığını izləmək. Çox müəllim bunu dəftər, WhatsApp qrupu və telefonun qalereyası arasında aparır — və şagird sayı artdıqca bu sistem çökməyə başlayır.</p>
<p>Bu yazıda ev tapşırığı sistemini addım-addım qururuq: tapşırığın niyə vacib olduğu, hansı növləri olduğu, nə qədər və nə vaxt vermək lazım olduğu, necə tez yoxlamaq, necə izləmək və valideynə necə çatdırmaq. Sonda dəftər, WhatsApp, Google Classroom və Kursometr-i ədalətli şəkildə müqayisə edir, Kursometr-də ev tapşırığını necə quracağınızı göstəririk.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Ev tapşırığı niyə vacibdir?</td><td>Dərsdə öyrənilən bilik təkrar və müstəqil xatırlama ilə möhkəmlənir; tapşırıq bunun əsas vasitəsidir</td></tr>
    <tr><td>Nə qədər vermək lazımdır?</td><td>Az, amma müntəzəm: hər dərsdən sonra şagirdin real olaraq bitirə biləcəyi həcmdə</td></tr>
    <tr><td>Necə tez yoxlamaq olar?</td><td>Qapalı sualları avtomatik yoxlanan testə çevirmək, açıq tapşırıqlara isə qısa rəy formulu ilə cavab vermək</td></tr>
    <tr><td>WhatsApp-da niyə problem yaranır?</td><td>Fotolar söhbətdə itir, tapşırıq mesajların arasında görünmür, kimin təhvil verdiyini saymaq çətinləşir</td></tr>
    <tr><td>Hansı alət uyğundur?</td><td>Tapşırıq, yoxlama, sınaq, davamiyyət, ödəniş və valideyn kabineti bir yerdə olan platforma — məsələn, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Ev Tapşırığı Niyə Vacibdir: Təkrar və Xatırlama</h2>
<p>Təhsil psixologiyasında çox araşdırılmış iki fikir var və hər ikisi ev tapşırığının mənasını yaxşı izah edir:</p>
<ul>
  <li><strong>Aralıqlı təkrar (spaced practice).</strong> Materialı bir dəfəyə uzun-uzun oxumaq əvəzinə, onu fasilələrlə — bir neçə gün, sonra bir həftə sonra — yenidən işləmək bilikləri daha davamlı edir. Ev tapşırığı bu fasilələri təbii şəkildə yaradır: şagird dərsdə öyrəndiyini bir-iki gün sonra evdə yenidən işləyir.</li>
  <li><strong>Xatırlama təcrübəsi (retrieval practice).</strong> Konspekti yenidən oxumaqdan fərqli olaraq, bilgini yaddaşdan "çıxarmaq" — məsələn, suala kitaba baxmadan cavab vermək — onu daha yaxşı yadda saxlamağa kömək edir. Qısa testlər və məsələ həlli məhz belə işləyir.</li>
</ul>
<p>Praktik nəticə sadədir: ev tapşırığı "cəza" və ya formallıq deyil, öyrənmənin bir hissəsidir. Amma o, yalnız şagird onu həqiqətən edəndə, müəllim yoxlayanda və şagird rəy alanda işləyir. Abituriyent və ya buraxılış imtahanına hazırlaşan şagird üçün bu xüsusilə vacibdir: imtahanda yaddaşdan çıxarmaq lazım olan bilik məhz təkrar-təkrar xatırlanaraq formalaşır.</p>

<h2>Ev Tapşırığının Növləri</h2>
<table>
  <thead>
    <tr><th>Növ</th><th>Nə üçündür</th><th>Necə yoxlanır</th></tr>
  </thead>
  <tbody>
    <tr><td>Məşq dəsti (məsələlər, çalışmalar)</td><td>Yeni mövzunu bərkitmək, bacarığı avtomatlaşdırmaq</td><td>Cavablar yoxlanır, səhvlər qısa izahla qaytarılır</td></tr>
    <tr><td>Test (qapalı suallar)</td><td>Xatırlama təcrübəsi, imtahan formatına alışmaq</td><td>Avtomatik — cavab açarı ilə</td></tr>
    <tr><td>Yazı (esse, inşa, açıq cavab)</td><td>Fikri ifadə etmək, arqument qurmaq, dil bacarığı</td><td>Əl ilə, meyarlar üzrə rəy</td></tr>
    <tr><td>Oxu</td><td>Mövzuya hazırlıq, lüğət və anlama</td><td>Növbəti dərsdə qısa sual və ya mini-test</td></tr>
    <tr><td>Videoya / dərs yazısına baxış</td><td>Buraxılmış dərsi bərpa etmək, mövzunu təkrarlamaq</td><td>Baxışdan sonra 3–5 sualdan ibarət qısa test</td></tr>
  </tbody>
</table>
<p>Yaxşı qarışıq adətən belədir: hər mövzuya bir məşq dəsti, həftədə bir qısa test, ayda bir-iki yazı işi. Video və oxu tapşırıqları ayrıca yox, testlə birlikdə verilir — əks halda onların edilib-edilmədiyini bilmək mümkün olmur.</p>

<h2>Nə Qədər və Nə Vaxt Vermək Lazımdır?</h2>
<p>Universal rəqəm yoxdur: həcm şagirdin yaşından, səviyyəsindən, məktəb yükündən və imtahana qalan vaxtdan asılıdır. Amma bir neçə qayda demək olar hər yerdə işləyir:</p>
<ul>
  <li><strong>Həcmi realist seçin.</strong> Şagirdin bitirə bilməyəcəyi böyük tapşırıq çox vaxt heç edilmir. Kiçik, amma hər dəfə edilən tapşırıq daha faydalıdır.</li>
  <li><strong>Müntəzəm verin.</strong> Hər dərsdən sonra eyni formatda tapşırıq şagirddə vərdiş yaradır — o, nə gözlədiyini bilir.</li>
  <li><strong>Köhnə mövzuları qatın.</strong> Aralıqlı təkrar üçün tapşırığa keçən həftələrin mövzularından da bir neçə sual əlavə edin.</li>
  <li><strong>Son tarixi aydın deyin.</strong> "Növbəti dərsə qədər" kifayət deyil — gün və saatı yazın. Məsələn: "Çərşənbə, saat 20:00-a qədər". Bu, yoxlamaq üçün sizə də vaxt saxlayır.</li>
  <li><strong>Gecikməyə qayda qoyun.</strong> Gecikən iş qəbul olunurmu, qiyməti azalırmı — bunu əvvəlcədən elan edin və hamıya eyni tətbiq edin.</li>
</ul>

<h2>Necə Tez Yoxlamaq Olar?</h2>
<p>Müəllimin ən çox vaxtını ev tapşırığının yoxlanması aparır. Bu vaxtı azaltmağın iki yolu var.</p>
<h3>1. Qapalı sualları avtomatlaşdırın</h3>
<p>Cavabı birmənalı olan hər şeyi — test suallarını, rəqəmli cavabları, uyğunlaşdırmanı — avtomatik yoxlanan testə çevirin. Bu zaman yoxlama üçün sizin vaxtınız sıfıra yaxınlaşır, şagird isə nəticəni dərhal görür. Vaxtınızı yalnız bal verməyə yox, nəticələrə baxıb hansı sualda sinfin çoxunun səhv etdiyini tapmağa sərf edirsiniz — bu, növbəti dərsin planıdır.</p>
<h3>2. Açıq tapşırıqlara qısa rəy formulu</h3>
<p>Yazı işlərini və həll yolunu tələb edən məsələləri əl ilə yoxlamaq lazımdır. Hər işə uzun şərh yazmaq əvəzinə sabit formuldan istifadə edin:</p>
<table>
  <thead>
    <tr><th>Formul</th><th>Nümunə</th></tr>
  </thead>
  <tbody>
    <tr><td><strong>+ / − / →</strong> (nə yaxşıdır, nə səhvdir, növbəti addım)</td><td>"+ Həll yolu düzgündür. − 3-cü addımda işarə səhvi. → Mötərizəni açarkən işarələri yoxla."</td></tr>
    <tr><td><strong>Bir əsas düzəliş</strong></td><td>"Bu işdə ən vacib məsələ: abzaslar arasında keçid yoxdur."</td></tr>
    <tr><td><strong>Hazır şərh bankı</strong></td><td>Tez-tez təkrarlanan səhvlər üçün 10–15 hazır cümlə saxlayın və kopyalayın</td></tr>
  </tbody>
</table>
<p>Şagirdə hər səhvi yox, ən vacib bir-iki məqamı göstərmək daha effektivdir — o, uzun siyahını oxumur, qısa və konkret rəyə isə əməl edir. Bir də: rəy nə qədər tez gəlsə, bir o qədər faydalıdır. Bir həftə sonra qaytarılan iş artıq şagirdin yadından çıxmış olur.</p>

<h2>İcranı İzləmək və Valideynə Çatdırmaq</h2>
<p>Tək bir tapşırığın qiyməti az şey deyir. Vacib olan zamanla mənzərədir: şagird tapşırıqların neçəsini təhvil verir, gecikirmi, nəticələri yaxşılaşırmı. Bunu izləmək üçün hər şagird üzrə sadə cədvəl kifayətdir: tarix, tapşırıq, təhvil verildi/verilmədi, nəticə.</p>
<p>Valideyn üçün isə əsas sual budur: "Övladım işləyirmi?" Valideynə hər tapşırıq barədə ayrıca yazmaq vaxt aparır və çox vaxt münaqişəyə çevrilir. Daha yaxşı yol — valideynin özünün baxa biləcəyi yer: davamiyyət, qiymətlər və sınaq nəticələri. Bu mövzunu ayrıca yazıda geniş izah etmişik: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>Tipik Problemlər və Həlli</h2>
<table>
  <thead>
    <tr><th>Problem</th><th>Səbəb</th><th>Həll</th></tr>
  </thead>
  <tbody>
    <tr><td>Ev tapşırığının fotoları WhatsApp-da itir</td><td>Hər şey bir söhbətdə qarışır, telefonun yaddaşı dolur, kimin nə göndərdiyini tapmaq çətindir</td><td>Cavablar hər tapşırığa bağlı ayrıca yerdə toplanmalıdır, söhbətdə yox</td></tr>
    <tr><td>"Tapşırığı görmədim"</td><td>Tapşırıq qrupdakı onlarla mesajın arasında itib</td><td>Tapşırıqlar şagirdin kabinetində daimi siyahıda dursun; şərtlər dərsdə də deyilsin</td></tr>
    <tr><td>Cavabların köçürülməsi</td><td>Hamıya eyni tapşırıq, cavablar qrupda paylaşılır</td><td>Hesabda fərqli rəqəmlər, açıq sualda "həll yolunu izah et", bəzi nəticələrin dərsdə şifahi yoxlanması; testlər müəyyən saatda açılıb-bağlansın</td></tr>
    <tr><td>Müəllim yoxlamadan yorulur</td><td>Bütün işlər əl ilə yoxlanır, hər işə uzun şərh yazılır</td><td>Qapalı suallar avtomatik, açıq işlərə qısa rəy formulu; tapşırıqları həftə ərzində bərabər paylayın</td></tr>
  </tbody>
</table>
<p>Köçürmə ilə bağlı bir qeyd: heç bir sistem onu tam aradan qaldırmır. Ən etibarlı üsul — tapşırığın nəticəsini dərsdə qısa şifahi sualla yoxlamaqdır. Şagird bilir ki, "necə həll etdin?" sualı gələcək, və köçürməyin mənası azalır.</p>

<h2>Müqayisə: Dəftər, WhatsApp, Google Classroom və Kursometr</h2>
<table>
  <thead>
    <tr><th>İmkan</th><th>Dəftər / kağız</th><th>WhatsApp</th><th>Google Classroom</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Tapşırıq vermək</td><td>Dərsdə şifahi və ya lövhədə</td><td>Qrupda mesaj</td><td>Güclü tərəfidir: tapşırıq, fayl, son tarix</td><td>Mövzuya izah, fayl və tapşırıq əlavə olunur</td></tr>
    <tr><td>Cavab toplamaq</td><td>Dəftər dərsə gətirilir</td><td>Foto və fayl söhbətdə</td><td>Şagird işi təhvil verir</td><td>Şagird cavabı öz kabinetindən göndərir</td></tr>
    <tr><td>Yoxlamaq</td><td>Əl ilə</td><td>Telefonda foto açaraq</td><td>Qiymətləndirmə və şərhlər</td><td>Müəllim cavabı kabinetdə yoxlayır</td></tr>
    <tr><td>Avtomatik test</td><td>Yoxdur</td><td>Yoxdur</td><td>Google Forms test rejimi ilə</td><td>Müəllimin saatında açılıb-bağlanan sınaqlar, qapalı suallar avtomatik</td></tr>
    <tr><td>Davamiyyət və ödəniş</td><td>Ayrı dəftər</td><td>Yoxdur</td><td>Yoxdur</td><td>Davamiyyət jurnalı və ödəniş izləmə</td></tr>
    <tr><td>Valideyn</td><td>Gündəlik və ya zəng</td><td>Ayrı yazışma</td><td>Qəyyumlar üçün e-poçt xülasəsi (bəzi hesab növlərində)</td><td>Davamiyyət, qiymət və sınaq nəticələri ilə valideyn kabineti</td></tr>
    <tr><td>Telefondan işləmək</td><td>—</td><td>Bəli</td><td>Bəli (tətbiq)</td><td>Telefon brauzerində tam işləyir</td></tr>
  </tbody>
</table>
<p>Ədalətli olmaq lazımdır: <strong>Google Classroom ev tapşırığı üçün yaxşı alətdir</strong> — tapşırıq vermək, son tarix qoymaq, təhvil almaq və qiymətləndirmək orada rahatdır və pulsuzdur. Əgər sizə yalnız tapşırıq lazımdırsa, Classroom kifayət edə bilər. Fərq repetitorun və kurs müəlliminin biznes tərəfindədir: kursun öz cədvəli, davamiyyət, ödənişlər, vaxtlı sınaqlar və valideyn kabineti Classroom-da yoxdur. Kursometr ev tapşırığını bunların hamısı ilə bir yerdə saxlayır. Ətraflı müqayisə: <a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr</a>.</p>

<h2>Kursometr-də Ev Tapşırığı: Addım-addım</h2>
<ol>
  <li><strong>Səhifənizi açın.</strong> <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>-da Google hesabı ilə daxil olun və bir dəqiqəyə öz ünvanınızı yaradın: <em>adiniz.kursometr.com</em>. Müəllim qeydiyyatı pulsuzdur.</li>
  <li><strong>Fənləri və qrupları yaradın</strong>, həftəlik cədvəli qurun və şagirdləri qruplara qoşun.</li>
  <li><strong>Mövzuya tapşırıq əlavə edin.</strong> Mövzunun izahını yazın, lazım olan faylı (iş vərəqi, şərt, nümunə) yükləyin və tapşırığı əlavə edin. Son tarixi tapşırığın mətnində aydın yazın.</li>
  <li><strong>Şagird cavabı öz kabinetindən göndərir.</strong> Tapşırıq onun kabinetində görünür — "görmədim" bəhanəsi azalır, foto söhbətdə itmir.</li>
  <li><strong>Cavabları kabinetdə yoxlayın</strong> və qısa rəy formulundan (+ / − / →) istifadə edin.</li>
  <li><strong>Qapalı sualları sınağa çevirin.</strong> Test hissəsini vaxtlı sınaq kimi qurun: sınaq təyin etdiyiniz saatda açılır və bağlanır, qapalı suallar avtomatik yoxlanır, nəticə sınaq bitən kimi hazırdır. Hazır test toplusunun PDF-ini yükləsəniz, suallar sual bazanıza düşür. Ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</li>
  <li><strong>Dərs yazılarını və materialları yükləyin</strong> — onlar yalnız həmin qrupun şagirdlərinə görünür. Video ilə təkrar tapşırığı vermək üçün rahatdır.</li>
  <li><strong>Davamiyyəti və ödənişləri qeyd edin</strong> — ev tapşırığı ilə eyni yerdə.</li>
  <li><strong>Valideynləri qoşun.</strong> Valideyn öz girişi ilə övladının davamiyyətini, qiymətlərini və sınaq nəticələrini izləyir.</li>
  <li><strong>Lazım olsa, köməkçi müəllim əlavə edin.</strong> Mentor hesabı ayrıca girişdir və köməkçi yalnız ona tapşırdığınız qrupları görür.</li>
</ol>
<p>Bütün bölmələr telefon brauzerində tam işləyir. Fərdi işləyən müəllim üçün ümumi sistem barədə: <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">repetitorlar üçün dərs idarəetmə proqramı</a>; dil kursları üçün: <a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">dil kursu üçün idarəetmə proqramı</a>.</p>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Hər dərsdən sonra realist həcmdə tapşırıq verilir</li>
  <li>☐ Tapşırığa keçmiş mövzulardan da suallar qatılır</li>
  <li>☐ Son tarix gün və saatla yazılır, gecikmə qaydası elan olunub</li>
  <li>☐ Qapalı suallar avtomatik yoxlanan testə çevrilib</li>
  <li>☐ Açıq işlərə qısa rəy formulu və hazır şərh bankı var</li>
  <li>☐ Cavablar WhatsApp söhbətində yox, hər tapşırığa bağlı yerdə toplanır</li>
  <li>☐ Köçürməyə qarşı nəticələr dərsdə şifahi yoxlanır</li>
  <li>☐ Hər şagird üzrə təhvil və nəticələr zamanla izlənir</li>
  <li>☐ Valideyn davamiyyəti, qiymətləri və sınaq nəticələrini özü görə bilir</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Repetitor ev tapşırığını nə qədər verməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Universal norma yoxdur — həcm şagirdin yaşından, səviyyəsindən və imtahana qalan vaxtdan asılıdır. Əsas qayda: şagirdin real olaraq bitirə biləcəyi həcmdə, amma hər dərsdən sonra müntəzəm verin və keçmiş mövzulardan da bir neçə sual qatın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ev tapşırıqlarını yoxlamağa sərf olunan vaxtı necə azaltmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Cavabı birmənalı olan sualları avtomatik yoxlanan testə çevirin, açıq tapşırıqlara isə qısa rəy formulu ilə cavab verin: nə yaxşıdır, nə səhvdir, növbəti addım nədir. Tez-tez təkrarlanan səhvlər üçün hazır şərhlər saxlamaq da vaxt qazandırır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ev tapşırığını WhatsApp ilə toplamaq niyə rahat deyil?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tapşırıq və cavablar söhbətdəki digər mesajların arasında itir, fotolar telefonun yaddaşını doldurur, kimin təhvil verib-vermədiyini saymaq çətinləşir və şagirdlər "tapşırığı görmədim" deyə bilir. Hər tapşırığa bağlı ayrıca yer bu problemləri aradan qaldırır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Şagirdlərin cavabları köçürməsinin qarşısını necə almaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tam qarşısını almaq mümkün deyil, amma azaltmaq olar: hesab məsələlərində fərqli rəqəmlər verin, açıq suallarda həll yolunu izah etməyi tələb edin, testləri müəyyən saatda açılıb-bağlanan sınaq kimi keçirin və tapşırığın nəticəsini dərsdə qısa şifahi sualla yoxlayın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google Classroom ev tapşırığı üçün kifayətdirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tapşırıq vermək, təhvil almaq və qiymətləndirmək üçün Google Classroom yaxşı və pulsuz alətdir. Amma orada kursun öz cədvəli, davamiyyət jurnalı, ödəniş izləmə və valideyn kabineti yoxdur. Bunların hamısını ev tapşırığı ilə bir yerdə aparmaq istəyən repetitor üçün Kursometr daha uyğundur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-də ev tapşırığı necə işləyir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Müəllim mövzuya izah, fayl və tapşırıq əlavə edir, şagird cavabını öz kabinetindən göndərir, müəllim isə onu orada yoxlayır. Qapalı suallar üçün vaxtlı sınaq qurmaq olar — onlar avtomatik yoxlanır. Müəllim qeydiyyatı pulsuzdur və Google hesabı ilə bir dəqiqəyə açılır.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">Onlayn test necə hazırlanır: vaxtlı sınaq və avtomatik nəticə</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr: müqayisə</a></li>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">Repetitorlar üçün dərs idarəetmə proqramı</a></li>
  <li><a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">Dil kursu üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/onlayn-ders-nece-teskil-olunur-2027">Onlayn dərs necə təşkil olunur</a></li>
  <li><a href="/blog-details/repetitor-ders-haqqi-nece-teyin-olunur-2027">Repetitor dərs haqqını necə müəyyənləşdirsin</a></li>
  <li><a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">Elektron davamiyyət uçotu: jurnal, Excel, yoxsa Kursometr</a></li>
</ul>

<h2>Nəticə</h2>
<p>Ev tapşırığı yalnız verildikdə yox, görüldükdə, edildikdə, yoxlanıldıqda və izlənildikdə işləyir. Bunun üçün dörd şey lazımdır: realist və müntəzəm tapşırıq, aydın son tarix, sürətli yoxlama (avtomatik test + qısa rəy) və şagird ilə valideynin görə biləcəyi mənzərə. Bunları dəftər və WhatsApp arasında bölmək əvəzinə bir yerdə aparanda müəllimin vaxtı yoxlamaya yox, tədrisə qalır.</p>
<p><strong>Ev tapşırıqlarınızı bu gün bir yerə toplayın: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — müəllim qeydiyyatı pulsuzdur. Ətraflı: <a href="/mehsullar/kursometr">Kursometr haqqında</a>. Kurs mərkəziniz üçün fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>For a tutor or course teacher, lesson time is only half of the job. The other half starts after the lesson: setting homework, making sure every student has seen it, collecting answers, checking them, writing feedback and keeping track of who works regularly and who is falling behind. Many teachers run all this between a paper notebook, a WhatsApp group and their phone's photo gallery — and as the number of students grows, that system starts to break down.</p>
<p>In this article we build a homework system step by step: why homework matters, what types there are, how much to set and when, how to check it quickly, how to track it and how to report it to parents. At the end we compare a notebook, WhatsApp, Google Classroom and Kursometr fairly and show how to set up homework in Kursometr.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Why does homework matter?</td><td>Knowledge from the lesson is consolidated through repetition and independent recall; homework is the main tool for that</td></tr>
    <tr><td>How much should I set?</td><td>Little but regularly: after every lesson, an amount the student can realistically finish</td></tr>
    <tr><td>How can I check it quickly?</td><td>Turn closed questions into an auto-graded test and answer open tasks with a short feedback formula</td></tr>
    <tr><td>Why does WhatsApp cause problems?</td><td>Photos get lost in the chat, the task is buried among messages and counting who has submitted becomes hard</td></tr>
    <tr><td>Which tool fits?</td><td>A platform that keeps homework, checking, tests, attendance, payments and a parent portal in one place — for example, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Why Homework Matters: Spacing and Retrieval</h2>
<p>Two ideas that have been studied extensively in educational psychology explain the point of homework well:</p>
<ul>
  <li><strong>Spaced practice.</strong> Instead of studying material in one long session, revisiting it at intervals — a few days later, then a week later — makes knowledge more durable. Homework creates those intervals naturally: the student works again at home on what they learned in class a day or two earlier.</li>
  <li><strong>Retrieval practice.</strong> Unlike re-reading notes, "pulling" information out of memory — for example, answering a question without looking at the book — helps it stick better. Short tests and problem solving work exactly this way.</li>
</ul>
<p>The practical conclusion is simple: homework is not a punishment or a formality, it is part of learning. But it only works when the student actually does it, the teacher checks it and the student gets feedback. This matters especially for students preparing for university entrance or final exams: the knowledge they must retrieve in the exam is built by recalling it again and again.</p>

<h2>Types of Homework</h2>
<table>
  <thead>
    <tr><th>Type</th><th>Purpose</th><th>How it is checked</th></tr>
  </thead>
  <tbody>
    <tr><td>Practice set (problems, exercises)</td><td>Consolidate a new topic, make a skill automatic</td><td>Answers are checked, mistakes are returned with a short explanation</td></tr>
    <tr><td>Test (closed questions)</td><td>Retrieval practice, getting used to the exam format</td><td>Automatically — with an answer key</td></tr>
    <tr><td>Writing (essay, composition, open answer)</td><td>Expressing ideas, building arguments, language skills</td><td>Manually, with feedback against criteria</td></tr>
    <tr><td>Reading</td><td>Preparing for a topic, vocabulary and comprehension</td><td>A short question or mini-test in the next lesson</td></tr>
    <tr><td>Watching a video / lesson recording</td><td>Catching up on a missed lesson, revising a topic</td><td>A short 3–5 question test after watching</td></tr>
  </tbody>
</table>
<p>A good mix usually looks like this: one practice set per topic, one short test a week and one or two pieces of writing a month. Video and reading tasks are not set on their own but together with a test — otherwise there is no way to know whether they were done.</p>

<h2>How Much and How Often?</h2>
<p>There is no universal number: the amount depends on the student's age, level, school workload and the time left before the exam. But a few rules work almost everywhere:</p>
<ul>
  <li><strong>Keep the amount realistic.</strong> A large task the student cannot finish is often not done at all. A small task that gets done every time is more useful.</li>
  <li><strong>Set it regularly.</strong> Homework in the same format after every lesson builds a habit — the student knows what to expect.</li>
  <li><strong>Mix in older topics.</strong> For spaced practice, add a few questions from the topics of previous weeks.</li>
  <li><strong>State the deadline clearly.</strong> "By the next lesson" is not enough — write the day and time. For example: "Wednesday, by 8:00 pm". This also leaves you time to check.</li>
  <li><strong>Set a rule for late work.</strong> Is late work accepted, does the mark go down — announce it in advance and apply it equally to everyone.</li>
</ul>

<h2>How to Check Quickly</h2>
<p>Checking homework takes up most of a teacher's time. There are two ways to cut it down.</p>
<h3>1. Automate closed questions</h3>
<p>Turn everything with an unambiguous answer — test questions, numerical answers, matching — into an auto-graded test. Your checking time drops close to zero and the student sees the result immediately. Instead of marking, you spend your time looking at the results to find the question most of the group got wrong — that is your plan for the next lesson.</p>
<h3>2. A short feedback formula for open tasks</h3>
<p>Writing and problems that require a worked solution have to be checked by hand. Instead of writing a long comment on every piece of work, use a fixed formula:</p>
<table>
  <thead>
    <tr><th>Formula</th><th>Example</th></tr>
  </thead>
  <tbody>
    <tr><td><strong>+ / − / →</strong> (what is good, what is wrong, next step)</td><td>"+ The method is correct. − Sign error in step 3. → Check the signs when you open the brackets."</td></tr>
    <tr><td><strong>One main correction</strong></td><td>"The most important issue in this piece: there are no transitions between paragraphs."</td></tr>
    <tr><td><strong>A comment bank</strong></td><td>Keep 10–15 ready-made sentences for frequent mistakes and copy them</td></tr>
  </tbody>
</table>
<p>Showing the student the one or two most important points works better than listing every mistake — they will not read a long list, but they will act on short, specific feedback. And the sooner feedback arrives, the more useful it is. Work returned a week later has already slipped from the student's mind.</p>

<h2>Tracking Completion and Reporting to Parents</h2>
<p>The mark for a single task says little. What matters is the picture over time: how many tasks the student hands in, whether they are late, whether results are improving. A simple table per student is enough to track this: date, task, submitted/not submitted, result.</p>
<p>For parents the key question is: "Is my child working?" Writing to parents about every task takes time and often turns into conflict. A better way is a place where parents can look for themselves: attendance, grades and test results. We cover this in detail in a separate article: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>Common Problems and Fixes</h2>
<table>
  <thead>
    <tr><th>Problem</th><th>Cause</th><th>Fix</th></tr>
  </thead>
  <tbody>
    <tr><td>Homework photos get lost in WhatsApp</td><td>Everything is mixed in one chat, phone storage fills up, it is hard to find who sent what</td><td>Answers should be collected in a separate place tied to each task, not in a chat</td></tr>
    <tr><td>"I didn't see the task"</td><td>The task is buried among dozens of messages in the group</td><td>Tasks should stay in a permanent list in the student's account; also state them in class</td></tr>
    <tr><td>Copying answers</td><td>Everyone gets the same task, answers are shared in the group</td><td>Different numbers in calculations, "explain your solution" in open questions, oral checks of some results in class; tests that open and close at a set time</td></tr>
    <tr><td>The teacher is overloaded with checking</td><td>Everything is checked by hand, every piece gets a long comment</td><td>Closed questions auto-graded, a short feedback formula for open work; spread tasks evenly through the week</td></tr>
  </tbody>
</table>
<p>A note on copying: no system eliminates it completely. The most reliable method is to check the result of the task with a short oral question in class. When students know the question "how did you solve it?" is coming, copying makes less sense.</p>

<h2>Comparison: Notebook, WhatsApp, Google Classroom and Kursometr</h2>
<table>
  <thead>
    <tr><th>Feature</th><th>Notebook / paper</th><th>WhatsApp</th><th>Google Classroom</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Setting tasks</td><td>Orally or on the board in class</td><td>A message in the group</td><td>A strength: assignment, files, due date</td><td>An explanation, files and a task are added to a topic</td></tr>
    <tr><td>Collecting answers</td><td>The notebook is brought to class</td><td>Photos and files in the chat</td><td>The student turns in the work</td><td>The student submits the answer from their own account</td></tr>
    <tr><td>Checking</td><td>By hand</td><td>Opening photos on a phone</td><td>Grading and comments</td><td>The teacher checks the answer in the account</td></tr>
    <tr><td>Auto-graded test</td><td>None</td><td>None</td><td>Via Google Forms quiz mode</td><td>Tests that open and close at the teacher's set time, closed questions graded automatically</td></tr>
    <tr><td>Attendance and payments</td><td>A separate notebook</td><td>None</td><td>None</td><td>Attendance register and payment tracking</td></tr>
    <tr><td>Parents</td><td>Diary or phone call</td><td>Separate chats</td><td>Email summaries for guardians (on some account types)</td><td>A parent portal with attendance, grades and test results</td></tr>
    <tr><td>Working from a phone</td><td>—</td><td>Yes</td><td>Yes (app)</td><td>Works fully in a phone browser</td></tr>
  </tbody>
</table>
<p>To be fair: <strong>Google Classroom is a good tool for homework</strong> — setting assignments, adding due dates, collecting and grading work are convenient there, and it is free. If all you need is assignments, Classroom may be enough. The difference lies in the business side of tutoring and courses: your own course schedule, attendance, payments, timed tests and a parent portal are not in Classroom. Kursometr keeps homework together with all of these. A detailed comparison: <a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr</a>.</p>

<h2>Homework in Kursometr: Step by Step</h2>
<ol>
  <li><strong>Open your page.</strong> Sign in at <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> with your Google account and create your own address in a minute: <em>yourname.kursometr.com</em>. Teacher sign-up is free.</li>
  <li><strong>Create subjects and groups</strong>, set up the weekly schedule and add students to the groups.</li>
  <li><strong>Add a task to a topic.</strong> Write the explanation for the topic, upload the file you need (worksheet, problem set, example) and add the task. Write the deadline clearly in the task text.</li>
  <li><strong>The student submits the answer from their own account.</strong> The task is visible in their account — fewer "I didn't see it" excuses, and photos do not get lost in a chat.</li>
  <li><strong>Check the answers in your account</strong> and use the short feedback formula (+ / − / →).</li>
  <li><strong>Turn closed questions into a test.</strong> Set up the test part as a timed test: it opens and closes at the time you set, closed questions are graded automatically and the results are ready as soon as the test ends. If you upload the PDF of a test collection, the questions go into your question bank. More: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</li>
  <li><strong>Upload lesson recordings and materials</strong> — they are visible only to the students of that group. Handy for setting a video review task.</li>
  <li><strong>Record attendance and payments</strong> — in the same place as homework.</li>
  <li><strong>Connect parents.</strong> Parents use their own login to follow their child's attendance, grades and test results.</li>
  <li><strong>Add an assistant teacher if needed.</strong> A mentor account is a separate login, and the assistant sees only the groups you assign to them.</li>
</ol>
<p>Every section works fully in a phone browser. For the overall system of a teacher working independently: <a href="/blog-details/tutor-class-management-software-2026">class management software for tutors</a>; for language courses: <a href="/blog-details/language-course-management-software-2027">language course management software</a>.</p>

<h2>Checklist</h2>
<ul>
  <li>☐ A realistic amount of homework is set after every lesson</li>
  <li>☐ Questions from previous topics are mixed in</li>
  <li>☐ The deadline is written with day and time, and the late-work rule is announced</li>
  <li>☐ Closed questions are turned into an auto-graded test</li>
  <li>☐ There is a short feedback formula and a comment bank for open work</li>
  <li>☐ Answers are collected in a place tied to each task, not in a WhatsApp chat</li>
  <li>☐ Results are checked orally in class to discourage copying</li>
  <li>☐ Submissions and results are tracked over time for each student</li>
  <li>☐ Parents can see attendance, grades and test results themselves</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much homework should a tutor set?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">There is no universal norm — the amount depends on the student's age, level and the time left before the exam. The main rule: set an amount the student can realistically finish, but do it regularly after every lesson and mix in a few questions from previous topics.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can I spend less time checking homework?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Turn questions with unambiguous answers into an auto-graded test, and answer open tasks with a short feedback formula: what is good, what is wrong, what the next step is. Keeping ready-made comments for frequent mistakes also saves time.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Why is collecting homework through WhatsApp inconvenient?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tasks and answers get lost among other messages in the chat, photos fill up phone storage, counting who has submitted becomes hard and students can say "I didn't see the task". A separate place tied to each task removes these problems.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can I stop students from copying answers?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">You cannot stop it completely, but you can reduce it: use different numbers in calculation problems, ask students to explain their solution in open questions, run tests that open and close at a set time and check the result of the task with a short oral question in class.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Google Classroom enough for homework?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google Classroom is a good, free tool for setting, collecting and grading assignments. But it has no course schedule of your own, no attendance register, no payment tracking and no parent portal. For a tutor who wants to run all of this together with homework, Kursometr is a better fit.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How does homework work in Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The teacher adds an explanation, files and a task to a topic, the student submits the answer from their own account, and the teacher checks it there. For closed questions you can set up a timed test that is graded automatically. Teacher sign-up is free and takes a minute with a Google account.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/how-to-create-online-tests-for-teachers-2027">How to create online tests: timed mock exams and automatic results</a></li>
  <li><a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr: comparison</a></li>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/tutor-class-management-software-2026">Class management software for tutors</a></li>
  <li><a href="/blog-details/language-course-management-software-2027">Language course management software</a></li>
  <li><a href="/blog-details/how-to-run-online-lessons-2027">How to run online lessons</a></li>
  <li><a href="/blog-details/how-tutors-should-set-lesson-prices-2027">How tutors should set lesson prices</a></li>
  <li><a href="/blog-details/attendance-tracking-for-course-centres-2027">Electronic attendance tracking: paper register, Excel or Kursometr</a></li>
</ul>

<h2>Conclusion</h2>
<p>Homework works not when it is set, but when it is seen, done, checked and tracked. That takes four things: realistic, regular tasks; a clear deadline; fast checking (auto-graded tests plus short feedback); and a picture that students and parents can see. When you run all this in one place instead of splitting it between a notebook and WhatsApp, your time goes into teaching rather than checking.</p>
<p><strong>Bring your homework together in one place today: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — teacher sign-up is free. More details: <a href="/mehsullar/kursometr">about Kursometr</a>. If your course centre needs a custom system, <a href="/contact">contact us</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Для репетитора или преподавателя курсов урок — это только половина работы. Вторая половина начинается после урока: задать домашнее задание, убедиться, что его увидели все ученики, собрать ответы, проверить их, написать обратную связь и следить, кто занимается регулярно, а кто отстаёт. Многие учителя ведут всё это между тетрадью, группой в WhatsApp и галереей телефона — и с ростом числа учеников такая система начинает разваливаться.</p>
<p>В этой статье мы шаг за шагом выстраиваем систему домашних заданий: зачем они нужны, какими бывают, сколько и когда задавать, как быстро проверять, как отслеживать и как сообщать родителям. В конце честно сравниваем тетрадь, WhatsApp, Google Classroom и Kursometr и показываем, как настроить домашние задания в Kursometr.</p>

<h2>Короткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Зачем нужны домашние задания?</td><td>Знания с урока закрепляются через повторение и самостоятельное припоминание; домашнее задание — главный инструмент для этого</td></tr>
    <tr><td>Сколько задавать?</td><td>Немного, но регулярно: после каждого урока — объём, который ученик реально может выполнить</td></tr>
    <tr><td>Как быстро проверять?</td><td>Закрытые вопросы превратить в тест с автопроверкой, на открытые задания отвечать по короткой формуле обратной связи</td></tr>
    <tr><td>Почему с WhatsApp возникают проблемы?</td><td>Фото теряются в чате, задание тонет среди сообщений, подсчитать, кто сдал, становится трудно</td></tr>
    <tr><td>Какой инструмент подходит?</td><td>Платформа, где задания, проверка, тесты, посещаемость, оплаты и кабинет родителя собраны в одном месте — например, <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Зачем нужны домашние задания: повторение и припоминание</h2>
<p>Две хорошо изученные в педагогической психологии идеи отлично объясняют смысл домашних заданий:</p>
<ul>
  <li><strong>Интервальное повторение (spaced practice).</strong> Вместо того чтобы долго учить материал за один раз, к нему полезно возвращаться с перерывами — через несколько дней, затем через неделю. Так знания становятся прочнее. Домашнее задание создаёт такие перерывы естественным образом: ученик через день-два снова прорабатывает дома то, что изучил на уроке.</li>
  <li><strong>Практика припоминания (retrieval practice).</strong> В отличие от перечитывания конспекта, «извлечение» знаний из памяти — например, ответ на вопрос без подглядывания в книгу — помогает лучше их запомнить. Именно так работают короткие тесты и решение задач.</li>
</ul>
<p>Практический вывод прост: домашнее задание — не наказание и не формальность, а часть обучения. Но работает оно только тогда, когда ученик его действительно выполняет, учитель проверяет, а ученик получает обратную связь. Особенно это важно для тех, кто готовится к вступительным или выпускным экзаменам: знания, которые нужно будет извлечь на экзамене, формируются именно многократным припоминанием.</p>

<h2>Виды домашних заданий</h2>
<table>
  <thead>
    <tr><th>Вид</th><th>Для чего</th><th>Как проверяется</th></tr>
  </thead>
  <tbody>
    <tr><td>Набор упражнений (задачи, упражнения)</td><td>Закрепить новую тему, довести навык до автоматизма</td><td>Ответы проверяются, ошибки возвращаются с коротким пояснением</td></tr>
    <tr><td>Тест (закрытые вопросы)</td><td>Практика припоминания, привыкание к формату экзамена</td><td>Автоматически — по ключу ответов</td></tr>
    <tr><td>Письменная работа (эссе, сочинение, развёрнутый ответ)</td><td>Выражать мысли, строить аргументацию, языковые навыки</td><td>Вручную, с обратной связью по критериям</td></tr>
    <tr><td>Чтение</td><td>Подготовка к теме, словарный запас и понимание</td><td>Короткий вопрос или мини-тест на следующем уроке</td></tr>
    <tr><td>Просмотр видео / записи урока</td><td>Восполнить пропущенный урок, повторить тему</td><td>Короткий тест из 3–5 вопросов после просмотра</td></tr>
  </tbody>
</table>
<p>Хорошее сочетание обычно такое: один набор упражнений на тему, один короткий тест в неделю и одна-две письменные работы в месяц. Видео и чтение задаются не отдельно, а вместе с тестом — иначе невозможно понять, были ли они выполнены.</p>

<h2>Сколько и как часто задавать?</h2>
<p>Универсальной цифры нет: объём зависит от возраста ученика, его уровня, школьной нагрузки и времени до экзамена. Но несколько правил работают почти везде:</p>
<ul>
  <li><strong>Выбирайте реалистичный объём.</strong> Большое задание, которое ученик не успеет сделать, часто не делается вовсе. Небольшое, но выполняемое каждый раз задание полезнее.</li>
  <li><strong>Задавайте регулярно.</strong> Задание в одном и том же формате после каждого урока вырабатывает привычку — ученик знает, чего ожидать.</li>
  <li><strong>Добавляйте старые темы.</strong> Для интервального повторения включайте в задание несколько вопросов по темам прошлых недель.</li>
  <li><strong>Чётко называйте срок.</strong> «К следующему уроку» недостаточно — пишите день и время. Например: «Среда, до 20:00». Это оставляет время на проверку и вам.</li>
  <li><strong>Установите правило для опозданий.</strong> Принимается ли работа после срока, снижается ли оценка — объявите заранее и применяйте одинаково ко всем.</li>
</ul>

<h2>Как проверять быстро?</h2>
<p>Больше всего времени у учителя уходит на проверку домашних заданий. Сократить его можно двумя способами.</p>
<h3>1. Автоматизируйте закрытые вопросы</h3>
<p>Всё, у чего однозначный ответ, — тестовые вопросы, числовые ответы, задания на соответствие — превратите в тест с автопроверкой. Тогда ваше время на проверку близко к нулю, а ученик сразу видит результат. Вы тратите время не на выставление баллов, а на анализ результатов: в каком вопросе ошиблось большинство группы — это и есть план следующего урока.</p>
<h3>2. Короткая формула обратной связи для открытых заданий</h3>
<p>Письменные работы и задачи, где нужно решение, проверяются вручную. Вместо длинного комментария к каждой работе используйте постоянную формулу:</p>
<table>
  <thead>
    <tr><th>Формула</th><th>Пример</th></tr>
  </thead>
  <tbody>
    <tr><td><strong>+ / − / →</strong> (что хорошо, что неверно, следующий шаг)</td><td>«+ Метод решения верный. − В 3-м шаге ошибка в знаке. → Проверяй знаки при раскрытии скобок.»</td></tr>
    <tr><td><strong>Одно главное исправление</strong></td><td>«Главная проблема этой работы: нет переходов между абзацами.»</td></tr>
    <tr><td><strong>Банк готовых комментариев</strong></td><td>Держите 10–15 готовых фраз для частых ошибок и копируйте их</td></tr>
  </tbody>
</table>
<p>Показать ученику один-два самых важных момента эффективнее, чем перечислить все ошибки: длинный список он не прочитает, а короткому и конкретному комментарию последует. И ещё: чем быстрее приходит обратная связь, тем она полезнее. Работа, возвращённая через неделю, уже вылетела у ученика из головы.</p>

<h2>Отслеживание выполнения и информирование родителей</h2>
<p>Оценка за одно задание говорит немного. Важна картина во времени: сколько заданий ученик сдаёт, опаздывает ли, улучшаются ли результаты. Для этого достаточно простой таблицы по каждому ученику: дата, задание, сдано/не сдано, результат.</p>
<p>Для родителя главный вопрос: «Занимается ли мой ребёнок?» Писать родителям о каждом задании отдельно долго и часто приводит к конфликтам. Лучше дать родителю место, где он сам может посмотреть посещаемость, оценки и результаты тестов. Подробно об этом — в отдельной статье: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>Типичные проблемы и решения</h2>
<table>
  <thead>
    <tr><th>Проблема</th><th>Причина</th><th>Решение</th></tr>
  </thead>
  <tbody>
    <tr><td>Фото домашних заданий теряются в WhatsApp</td><td>Всё смешано в одном чате, память телефона заполняется, трудно найти, кто что прислал</td><td>Ответы нужно собирать в отдельном месте, привязанном к каждому заданию, а не в чате</td></tr>
    <tr><td>«Я не видел задание»</td><td>Задание затерялось среди десятков сообщений в группе</td><td>Задания должны оставаться в постоянном списке в кабинете ученика; озвучивайте их и на уроке</td></tr>
    <tr><td>Списывание ответов</td><td>У всех одно и то же задание, ответы пересылаются в группе</td><td>Разные числа в расчётных задачах, «объясни решение» в открытых вопросах, устная проверка части результатов на уроке; тесты, которые открываются и закрываются в заданное время</td></tr>
    <tr><td>Учитель перегружен проверкой</td><td>Всё проверяется вручную, к каждой работе пишется длинный комментарий</td><td>Закрытые вопросы — автопроверка, открытые работы — короткая формула обратной связи; распределяйте задания равномерно по неделе</td></tr>
  </tbody>
</table>
<p>Замечание о списывании: ни одна система не устраняет его полностью. Самый надёжный способ — проверить результат задания коротким устным вопросом на уроке. Когда ученик знает, что прозвучит вопрос «как ты это решил?», списывать становится бессмысленно.</p>

<h2>Сравнение: тетрадь, WhatsApp, Google Classroom и Kursometr</h2>
<table>
  <thead>
    <tr><th>Возможность</th><th>Тетрадь / бумага</th><th>WhatsApp</th><th>Google Classroom</th><th>Kursometr</th></tr>
  </thead>
  <tbody>
    <tr><td>Выдача заданий</td><td>Устно или на доске на уроке</td><td>Сообщение в группе</td><td>Сильная сторона: задание, файлы, срок сдачи</td><td>К теме добавляются пояснение, файлы и задание</td></tr>
    <tr><td>Сбор ответов</td><td>Тетрадь приносят на урок</td><td>Фото и файлы в чате</td><td>Ученик сдаёт работу</td><td>Ученик отправляет ответ из своего кабинета</td></tr>
    <tr><td>Проверка</td><td>Вручную</td><td>Открывая фото на телефоне</td><td>Оценивание и комментарии</td><td>Учитель проверяет ответ в кабинете</td></tr>
    <tr><td>Тест с автопроверкой</td><td>Нет</td><td>Нет</td><td>Через режим теста в Google Forms</td><td>Тесты, которые открываются и закрываются в заданное учителем время, закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Посещаемость и оплата</td><td>Отдельная тетрадь</td><td>Нет</td><td>Нет</td><td>Журнал посещаемости и учёт оплат</td></tr>
    <tr><td>Родители</td><td>Дневник или звонок</td><td>Отдельная переписка</td><td>Сводки по e-mail для опекунов (в некоторых типах аккаунтов)</td><td>Кабинет родителя с посещаемостью, оценками и результатами тестов</td></tr>
    <tr><td>Работа с телефона</td><td>—</td><td>Да</td><td>Да (приложение)</td><td>Полностью работает в браузере телефона</td></tr>
  </tbody>
</table>
<p>Будем честны: <strong>Google Classroom — хороший инструмент для домашних заданий</strong>. Выдавать задания, ставить сроки, собирать и оценивать работы там удобно, и это бесплатно. Если вам нужны только задания, Classroom может быть достаточно. Разница — в деловой стороне работы репетитора и курсов: собственного расписания курса, посещаемости, оплат, тестов по времени и кабинета родителя в Classroom нет. Kursometr хранит домашние задания вместе со всем этим. Подробное сравнение: <a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr</a>.</p>

<h2>Домашние задания в Kursometr: пошагово</h2>
<ol>
  <li><strong>Откройте свою страницу.</strong> Войдите на <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> через аккаунт Google и за минуту создайте свой адрес: <em>vashe-imya.kursometr.com</em>. Регистрация преподавателя бесплатна.</li>
  <li><strong>Создайте предметы и группы</strong>, настройте недельное расписание и добавьте учеников в группы.</li>
  <li><strong>Добавьте задание к теме.</strong> Напишите пояснение к теме, загрузите нужный файл (рабочий лист, условие, образец) и добавьте задание. Срок сдачи чётко укажите в тексте задания.</li>
  <li><strong>Ученик отправляет ответ из своего кабинета.</strong> Задание видно в его кабинете — оправданий «не видел» становится меньше, а фото не теряются в чате.</li>
  <li><strong>Проверяйте ответы в кабинете</strong> и пользуйтесь короткой формулой обратной связи (+ / − / →).</li>
  <li><strong>Превратите закрытые вопросы в тест.</strong> Тестовую часть оформите как тест по времени: он открывается и закрывается в заданное вами время, закрытые вопросы проверяются автоматически, а результат готов сразу после окончания теста. Если загрузить PDF сборника тестов, вопросы попадут в вашу базу вопросов. Подробнее: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</li>
  <li><strong>Загружайте записи уроков и материалы</strong> — они видны только ученикам этой группы. Удобно для заданий с просмотром видео.</li>
  <li><strong>Отмечайте посещаемость и оплаты</strong> — там же, где и домашние задания.</li>
  <li><strong>Подключите родителей.</strong> Родитель со своим входом следит за посещаемостью, оценками и результатами тестов ребёнка.</li>
  <li><strong>При необходимости добавьте помощника.</strong> Аккаунт ментора — это отдельный вход, и помощник видит только те группы, которые вы ему поручили.</li>
</ol>
<p>Все разделы полностью работают в браузере телефона. Об общей системе для преподавателя, работающего самостоятельно: <a href="/blog-details/programma-dlya-repetitorov-2026">программа для репетиторов</a>; для языковых курсов: <a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">программа для языковых курсов</a>.</p>

<h2>Чек-лист</h2>
<ul>
  <li>☐ После каждого урока задаётся реалистичный объём</li>
  <li>☐ В задание добавляются вопросы по прошлым темам</li>
  <li>☐ Срок указан с днём и временем, правило для опозданий объявлено</li>
  <li>☐ Закрытые вопросы превращены в тест с автопроверкой</li>
  <li>☐ Для открытых работ есть короткая формула обратной связи и банк комментариев</li>
  <li>☐ Ответы собираются в месте, привязанном к заданию, а не в чате WhatsApp</li>
  <li>☐ Против списывания результаты проверяются устно на уроке</li>
  <li>☐ Сдача и результаты каждого ученика отслеживаются во времени</li>
  <li>☐ Родитель сам видит посещаемость, оценки и результаты тестов</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько домашних заданий должен задавать репетитор?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Универсальной нормы нет — объём зависит от возраста ученика, его уровня и времени до экзамена. Главное правило: задавайте столько, сколько ученик реально может выполнить, но регулярно после каждого урока, и добавляйте несколько вопросов по прошлым темам.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как тратить меньше времени на проверку домашних заданий?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Вопросы с однозначным ответом превратите в тест с автопроверкой, а на открытые задания отвечайте по короткой формуле: что хорошо, что неверно, какой следующий шаг. Банк готовых комментариев для частых ошибок тоже экономит время.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Почему собирать домашние задания через WhatsApp неудобно?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Задания и ответы теряются среди других сообщений в чате, фото заполняют память телефона, подсчитать, кто сдал, становится трудно, а ученики могут сказать «я не видел задание». Отдельное место, привязанное к каждому заданию, снимает эти проблемы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как не дать ученикам списывать ответы?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Полностью исключить списывание нельзя, но можно его уменьшить: давайте разные числа в расчётных задачах, просите объяснить решение в открытых вопросах, проводите тесты, которые открываются и закрываются в заданное время, и проверяйте результат задания коротким устным вопросом на уроке.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Достаточно ли Google Classroom для домашних заданий?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google Classroom — хороший бесплатный инструмент, чтобы выдавать, собирать и оценивать задания. Но в нём нет собственного расписания курса, журнала посещаемости, учёта оплат и кабинета родителя. Репетитору, который хочет вести всё это вместе с домашними заданиями, больше подойдёт Kursometr.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как работают домашние задания в Kursometr?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Учитель добавляет к теме пояснение, файлы и задание, ученик отправляет ответ из своего кабинета, а учитель проверяет его там же. Для закрытых вопросов можно настроить тест по времени с автоматической проверкой. Регистрация преподавателя бесплатна и занимает минуту через аккаунт Google.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">Как создать онлайн-тест: пробный экзамен с таймером и автопроверкой</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr: сравнение</a></li>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/programma-dlya-repetitorov-2026">Программа для репетиторов</a></li>
  <li><a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">Программа для языковых курсов</a></li>
  <li><a href="/blog-details/kak-provodit-onlajn-uroki-2027">Как проводить онлайн-уроки</a></li>
  <li><a href="/blog-details/kak-repetitoru-ustanovit-cenu-za-urok-2027">Как репетитору установить цену за урок</a></li>
  <li><a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">Электронный учёт посещаемости: журнал, Excel или Kursometr</a></li>
</ul>

<h2>Итог</h2>
<p>Домашнее задание работает не тогда, когда его задали, а когда его увидели, выполнили, проверили и отследили. Для этого нужны четыре вещи: реалистичные и регулярные задания, чёткий срок, быстрая проверка (автотест плюс короткая обратная связь) и картина, которую видят ученик и родитель. Когда всё это ведётся в одном месте, а не делится между тетрадью и WhatsApp, время учителя уходит на преподавание, а не на проверку.</p>
<p><strong>Соберите домашние задания в одном месте уже сегодня: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — регистрация преподавателя бесплатна. Подробнее: <a href="/mehsullar/kursometr">о Kursometr</a>. Если вашему учебному центру нужна индивидуальная система, <a href="/kontakty">свяжитесь с нами</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'ev-tapsirigi-sistemi-muellim-ucun-2027'],
            [
                'slug_en' => 'homework-system-for-teachers-2027',
                'slug_ru' => 'sistema-domashnih-zadanij-dlya-uchitelya-2027',

                'title_az' => 'Ev Tapşırığı Sistemi: Müəllim Tapşırıqları Necə Verir, Yoxlayır və İzləyir — Dəftər, WhatsApp, yoxsa Platforma (2027)',
                'title_en' => 'Homework System for Teachers: How to Set, Check and Track Assignments — Notebook, WhatsApp or a Platform (2027)',
                'title_ru' => 'Система домашних заданий: как учителю задавать, проверять и отслеживать задания — тетрадь, WhatsApp или платформа (2027)',

                'review_az' => 'Repetitor və kurs müəllimi üçün ev tapşırığı sistemi: aralıqlı təkrar və xatırlama, tapşırıq növləri, həcm və son tarix, avtomatik test və qısa rəy formulları, icranın izlənməsi, valideyn, WhatsApp problemləri, dəftər/WhatsApp/Google Classroom/Kursometr müqayisəsi və Kursometr-də addım-addım qurulum.',
                'review_en' => 'A homework system for tutors and course teachers: spaced and retrieval practice, types of homework, volume and deadlines, auto-graded tests and short feedback formulas, tracking completion, parents, WhatsApp problems, a notebook/WhatsApp/Google Classroom/Kursometr comparison and a step-by-step setup in Kursometr.',
                'review_ru' => 'Система домашних заданий для репетитора и преподавателя курсов: интервальное повторение и практика припоминания, виды заданий, объём и сроки, автопроверка тестов и короткие формулы обратной связи, отслеживание выполнения, родители, проблемы WhatsApp, сравнение тетради, WhatsApp, Google Classroom и Kursometr и пошаговая настройка в Kursometr.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '4 Noyabr 2026',
                'date_en' => 'November 4, 2026',
                'date_ru' => '4 Ноября 2026',

                'photo'    => 'cover-homework-system-az.png',
                'photo_en' => 'cover-homework-system-en.png',
                'photo_ru' => 'cover-homework-system-ru.png',

                'meta_title_az' => 'Ev Tapşırığı Sistemi Müəllim üçün 2027 | RS Code',
                'meta_title_en' => 'Homework System for Teachers 2027 | RS Code',
                'meta_title_ru' => 'Система домашних заданий для учителя 2027 | RS Code',

                'meta_description_az' => 'Ev tapşırığını necə vermək, tez yoxlamaq və izləmək: tapşırıq növləri, son tarix, avtomatik test, rəy formulları, valideyn, WhatsApp vs Google Classroom vs Kursometr.',
                'meta_description_en' => 'How to set, check and track homework: types of tasks, deadlines, auto-graded tests, feedback formulas, parents, and WhatsApp vs Google Classroom vs Kursometr.',
                'meta_description_ru' => 'Как задавать, быстро проверять и отслеживать домашние задания: виды заданий, сроки, автопроверка тестов, обратная связь, родители, WhatsApp, Google Classroom и Kursometr.',

                'meta_keywords_az' => 'ev tapşırığı, ev tapşırığı sistemi, repetitor, müəllim, tapşırıq yoxlama, onlayn test, google classroom, kursometr, 2027',
                'meta_keywords_en' => 'homework system, homework for tutors, teacher, checking assignments, online test, google classroom, kursometr, 2027',
                'meta_keywords_ru' => 'домашние задания, система домашних заданий, репетитор, учитель, проверка заданий, онлайн-тест, google classroom, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
