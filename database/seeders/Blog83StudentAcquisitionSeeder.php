<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #83 — Kurs mərkəzinə tələbə cəlb etmək və saxlamaq (2027). Kursometr klasteri + SMM/Meta/Google Ads/sayt xidmətləri.
 * Nümunə rəqəmlər (300 ₼, 40 müraciət, 10 tələbə, 80 ₼, 6 ay) ŞƏRTİDİR — bazar statistikası iddia edilmir.
 * Google rəy müqabilində mükafatı qadağan edir (Google Maps istifadəçi kontenti qaydaları).
 * Kursometr CRM/müraciət/reklam aləti DEYİL — yalnız #75–#81 ilə eyni faktlar: qruplar, cədvəl, davamiyyət, vaxtlı sınaqlar,
 * PDF → sual bazası, ev tapşırığı, valideyn kabineti, ödəniş izləmə, dərs yazıları, mentor hesabı, telefon brauzeri, Google ilə giriş.
 */
class Blog83StudentAcquisitionSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Kurs mərkəzinin iki əsas problemi var və onlar çox vaxt eyni vaxtda yaşanır. Birincisi: yeni tələbə tapmaq. Instagram-da paylaşımlar edilir, bir neçə dəfə reklam verilir, amma müraciətlər azdır və gələnlərin çoxu "qiymət neçədir?" sualından sonra yoxa çıxır. İkincisi: mövcud tələbəni saxlamaq. Sentyabrda dolu olan qruplar dekabra qədər yarıya enir, valideyn "uşaq maraqlanmır" deyib ödənişi dayandırır və mərkəz hər ay boşalan yerləri yenidən reklamla doldurmalı olur. Nəticədə reklama xərclənən pulun böyük hissəsi sadəcə gedən tələbələrin yerini doldurmağa gedir.</p>
<p>Bu yazı 2027-ci ildə kurs mərkəzi, tədris mərkəzi, dil kursu, abituriyent hazırlığı mərkəzi və ya böyük repetitor qrupu idarə edən sahibkarlar və administratorlar üçündür. Tələbənin müraciətdən qeydiyyata qədər keçdiyi yolu, hansı kanalın nəyə yaradığını, müraciətə cavab və sınaq dərsi qaydalarını, tələbə başına reklam xərcinin necə hesablandığını, tələbələrin niyə getdiyini və onları necə saxlamağı addım-addım nəzərdən keçiririk. Sonda aylıq ölçmə cədvəli və 30 günlük plan var.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Tələbə ən çox haradan gəlir?</td><td>Tövsiyədən, Google axtarışından və xəritədən, Instagram-dan. Hər mərkəzdə nisbət fərqlidir — mənbəyi hər müraciətdə qeyd edin</td></tr>
    <tr><td>Ən ucuz kanal hansıdır?</td><td>Razı tələbə və valideynin tövsiyəsi. Onu yalnız yaxşı nəticə və nizamlı iş yaradır</td></tr>
    <tr><td>Reklam nə vaxt lazımdır?</td><td>Qəbul mövsümündə və yeni qrup açılanda — sayt, xəritə profili və müraciətə cavab qaydası hazır olandan sonra</td></tr>
    <tr><td>Müraciəti qeydiyyata necə çevirmək olar?</td><td>Tez cavab, aydın məlumat (proqram, cədvəl, qiymət) və pulsuz sınaq dərsi və ya səviyyə testi</td></tr>
    <tr><td>Tələbə niyə gedir?</td><td>Nəticəni görmür, dərsləri buraxmağa başlayır, valideyn məlumatsız qalır, cədvəl və ya ödəniş problemi yaranır</td></tr>
    <tr><td>Tələbəni necə saxlamaq olar?</td><td>Davamiyyəti izləyin, müntəzəm sınaq keçirin, nəticəni valideynə göstərin, ödənişi vaxtında izləyin — məsələn, <a href="/mehsullar/kursometr">Kursometr</a> ilə</td></tr>
  </tbody>
</table>

<h2>1. Tələbənin Yolu: Görməkdən Tövsiyə Etməyə</h2>
<p>Tələbə və ya valideyn kursu bir anda seçmir. O, bir neçə addımdan keçir və hər addımda itirilə bilər. Bu addımları ayrı-ayrı görmək hansı yerdə problem olduğunu tapmağa kömək edir:</p>
<table>
  <thead>
    <tr><th>Addım</th><th>Nə baş verir</th><th>Harada itirilir</th></tr>
  </thead>
  <tbody>
    <tr><td>1. Görmək</td><td>Tanışdan eşidir, Google-da axtarır, xəritədə və ya Instagram-da görür</td><td>Mərkəz axtarışda və xəritədə yoxdur, səhifə köhnədir</td></tr>
    <tr><td>2. Müraciət</td><td>Zəng edir, WhatsApp-a yazır, formanı doldurur</td><td>Cavab gecikir, telefon götürülmür, məlumat qarışıqdır</td></tr>
    <tr><td>3. Sınaq dərsi / səviyyə testi</td><td>Mərkəzi, müəllimi və qrupu öz gözü ilə görür</td><td>Sınaq dərsi təklif olunmur və ya təşkil olunmur</td></tr>
    <tr><td>4. Qeydiyyat</td><td>Qrupa yazılır, ilk ödənişi edir</td><td>Uyğun saat yoxdur, şərtlər aydın deyil</td></tr>
    <tr><td>5. Qalmaq</td><td>Aylarla dərsə gəlir, nəticə görür</td><td>Nəticə görünmür, davamiyyət düşür, valideyn məlumatsızdır</td></tr>
    <tr><td>6. Tövsiyə</td><td>Tanışlarına deyir, rəy yazır</td><td>Ondan heç kim rəy istəmir</td></tr>
  </tbody>
</table>
<p>Çox mərkəz yalnız birinci addıma — reklama — pul xərcləyir. Halbuki ikinci, üçüncü və beşinci addımlarda itirilən tələbələri qaytarmaq daha ucuzdur: bu, əlavə büdcə deyil, nizam tələb edir.</p>

<h2>2. Kanallar: Hansı Nəyə Yarayır</h2>
<p>Kanallar bir-birini əvəz etmir. Biri etibar yaradır, biri tez nəticə verir, biri uzunmüddətli işləyir. Aşağıdakı cədvəl ümumi müqayisədir:</p>
<table>
  <thead>
    <tr><th>Kanal</th><th>Xərc</th><th>Nəticə sürəti</th><th>Nəyə uyğundur</th></tr>
  </thead>
  <tbody>
    <tr><td>Tövsiyə (tələbə, valideyn, məzun)</td><td>Demək olar ki, pulsuz</td><td>Yavaş, amma sabit</td><td>Etibar; ən yüksək qeydiyyat ehtimalı</td></tr>
    <tr><td>Google axtarışı və sayt</td><td>Sayt və SEO işi</td><td>Bir neçə ay</td><td>"ingilis dili kursu Bakı", "abituriyent hazırlığı" kimi hazır axtarışlar</td></tr>
    <tr><td>Google xəritə (Business Profile)</td><td>Pulsuz</td><td>Bir neçə həftə</td><td>"yaxınlıqda kurs" axtarışları, ünvan, rəylər</td></tr>
    <tr><td>Instagram (orqanik)</td><td>Vaxt və ya SMM xidməti</td><td>Yavaş</td><td>Mərkəzin həyatını göstərmək, etibar</td></tr>
    <tr><td>Instagram/Facebook reklamı</td><td>Gündəlik büdcə</td><td>Tez (günlər)</td><td>Qəbul mövsümü, yeni qrup, açıq dərs elanı</td></tr>
    <tr><td>Google Ads</td><td>Klik başına ödəniş</td><td>Tez (günlər)</td><td>Kurs axtaran, qərar verməyə yaxın insanlar</td></tr>
    <tr><td>Məktəb, universitet, şirkət əməkdaşlığı</td><td>Vaxt, bəzən endirim</td><td>Orta</td><td>Qrup halında tələbə, korporativ dil kursu</td></tr>
    <tr><td>Açıq dərs, sınaq imtahanı, seminar</td><td>Müəllim vaxtı</td><td>Orta</td><td>Mərkəzi canlı göstərmək, müraciət toplamaq</td></tr>
  </tbody>
</table>
<p><strong>Google və sayt.</strong> Kurs axtaran adam "hansı kurs, harada, neçəyə, nə vaxt" suallarına cavab axtarır. Hər kurs üçün ayrıca səhifə, müəllim profilləri, ünvan, cədvəl və qısa qeydiyyat forması olan sayt bu sualları cavablandırır. Ətraflı: <a href="/blog-details/kurs-merkezi-ucun-sayt-ve-seo-2027">kurs mərkəzi üçün sayt və yerli SEO</a>.</p>
<p><strong>Xəritə.</strong> Google Business Profile pulsuzdur və valideynin "yaxınlıqda" axtarışında mərkəzi göstərir. Ad, ünvan, telefon, iş saatları və şəkillər dəqiq olmalıdır. Necə yaradılır: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile bələdçisi</a>.</p>
<p><strong>Instagram.</strong> Dərslərdən qısa görüntülər, müəllimlərin videoları, faydalı məsləhətlər, tələbə uğurları (yalnız razılıqla) mərkəzi canlı göstərir. Uşaqların şəkli və videosu yalnız valideynin icazəsi ilə paylaşılmalıdır. Peşəkar dəstək lazımdırsa: <a href="/blog-details/smm-xidmeti-qiymeti-2026">SMM xidməti nəyi əhatə edir</a>.</p>
<p><strong>Reklam.</strong> Instagram/Facebook reklamı yeni qrup və ya açıq dərs haqqında tez xəbər yaymağa, Google Ads isə artıq kurs axtaran insanı tutmağa yarayır. Hər ikisi büdcə tələb edir və pis hazırlanmış səhifəyə və ya cavabsız qalan müraciətlərə göndərilən reklam pulu boşa xərcləyir. Büdcə hesabı: <a href="/blog-details/instagram-facebook-reklami-qiymeti-2027">Instagram və Facebook reklamı qiyməti</a>, <a href="/blog-details/google-ads-azerbaycan-2027">Google Ads bələdçisi</a>.</p>

<h2>3. Müraciətə Cavab, Sınaq Dərsi və Qeydiyyat</h2>
<p>Valideyn adətən bir neçə kursa eyni vaxtda yazır. Birinci aydın cavab verən mərkəz çox vaxt üstünlük qazanır. Müraciəti qeydiyyata çevirmək üçün sadə qaydalar:</p>
<ul>
  <li><strong>Tez cavab verin.</strong> İş saatlarında müraciətə mümkün qədər tez cavab verin. Axşam gələn mesaja səhər ilk iş kimi cavab yazın. Bir nəfəri müraciətlərə məsul təyin edin.</li>
  <li><strong>Hazır cavab şablonu saxlayın.</strong> Hər kurs üçün qısa mətn: proqram, müddət, həftəlik cədvəl, qrupun ölçüsü, qiymət və ya qiymətin necə müəyyən olunduğu, ünvan. "Qiymət direktdə" cavabı çox insanı itirir.</li>
  <li><strong>Sınaq dərsi və ya səviyyə testi təklif edin.</strong> İnsan mərkəzi, müəllimi və qrupu görəndə qərar verməsi asanlaşır. Dil kursunda səviyyə testi, imtahan hazırlığında diaqnostik sınaq, uşaq mərkəzində açıq dərs yaxşı işləyir.</li>
  <li><strong>Mənbəni soruşun və yazın.</strong> "Bizi haradan eşitdiniz?" sualı. Bu olmadan hansı kanalın işlədiyini bilmək mümkün deyil.</li>
  <li><strong>Qeydiyyat olmayanları da qeyd edin.</strong> Sınaq dərsinə gəlib yazılmayanlara səbəbini soruşun: saat uyğun deyil, qiymət, uzaqlıq, başqa mərkəz. Bu, növbəti qərarlar üçün ən dəyərli məlumatdır.</li>
  <li><strong>Şərtləri yazılı verin.</strong> Ödəniş qaydası, buraxılan dərslərin necə hesablandığı, qrupun dəyişdirilməsi — qeydiyyatda yazılı razılaşdırılmalıdır.</li>
</ul>
<p>Müraciətlər üçün sadə cədvəl kifayətdir: tarix, ad, telefon, kurs, mənbə, sınaq dərsi tarixi, nəticə (yazıldı / yazılmadı və səbəbi). Əsas olan odur ki, heç bir müraciət unudulmasın.</p>

<h2>4. Tələbə Başına Xərc: Reklam Büdcəsini Necə Hesablamalı</h2>
<p>Reklamın işləyib-işləmədiyini "bəyənmə" və "baxış" sayı deyil, yeni tələbə sayı göstərir. Üç sadə hesab hər mərkəzə lazımdır:</p>
<table>
  <thead>
    <tr><th>Göstərici</th><th>Düstur</th><th>Nəyi göstərir</th></tr>
  </thead>
  <tbody>
    <tr><td>Müraciət başına xərc</td><td>Reklam xərci ÷ müraciət sayı</td><td>Reklamın nə qədər insanı yazmağa vadar etdiyini</td></tr>
    <tr><td>Tələbə başına xərc</td><td>Reklam xərci ÷ yeni tələbə sayı</td><td>Bir tələbənin mərkəzə neçəyə başa gəldiyini</td></tr>
    <tr><td>Tələbənin gətirdiyi gəlir</td><td>Aylıq haqq × orta qalma müddəti (ay)</td><td>Bir tələbəyə nə qədər xərcləmək məntiqli olduğunu</td></tr>
  </tbody>
</table>
<p><strong>Nümunə (şərti rəqəmlərlə):</strong> mərkəz bir ayda reklama 300 ₼ xərcləyib, 40 müraciət alıb, 25 nəfər sınaq dərsinə gəlib, 10 nəfər yazılıb. Müraciət başına xərc 7,5 ₼, tələbə başına xərc 30 ₼-dir. Aylıq haqq 80 ₼ və tələbə orta hesabla 6 ay qalırsa, bir tələbə 480 ₼ gəlir gətirir. Burada iki nəticə var:</p>
<ul>
  <li>40 müraciətdən yalnız 10 qeydiyyat varsa, problem çox vaxt reklamda deyil, cavab və sınaq dərsi mərhələsindədir.</li>
  <li>Tələbə 6 ay deyil, 3 ay qalırsa, onun gətirdiyi gəlir yarıya enir. Yəni tələbəni saxlamaq reklam büdcəsini artırmaqdan daha güclü təsir edir.</li>
</ul>
<p>Bu rəqəmlər yalnız hesablama nümunəsidir — hər mərkəz öz rəqəmlərini öz qeydlərindən çıxarmalıdır.</p>

<h2>5. Tələbələr Niyə Gedir</h2>
<p>Tələbə nadir hallarda bir gündə gedir. Adətən gedişdən əvvəl siqnallar olur və onları vaxtında görmək olar:</p>
<table>
  <thead>
    <tr><th>Səbəb</th><th>Erkən siqnal</th><th>Nə etmək olar</th></tr>
  </thead>
  <tbody>
    <tr><td>Nəticəni görmür</td><td>Sınaqlarda irəliləyiş yoxdur, "faydası yoxdur" deyir</td><td>Müntəzəm sınaq, nəticəni qrafik kimi göstərmək, zəif mövzular üzrə plan</td></tr>
    <tr><td>Dərsləri buraxır</td><td>Ardıcıl 2–3 buraxılmış dərs</td><td>Davamiyyəti hər dərsdə qeyd etmək, buraxanda dərhal əlaqə saxlamaq</td></tr>
    <tr><td>Valideyn məlumatsızdır</td><td>Valideyn yalnız ödəniş vaxtı mərkəzlə danışır</td><td>Valideynin davamiyyəti, qiymətləri və sınaq nəticələrini özü görməsi</td></tr>
    <tr><td>Tapşırıqlar itir</td><td>Ev tapşırığı edilmir, kimin nə etdiyi bilinmir</td><td>Tapşırıqları bir yerdə vermək və təhvil verilməsini izləmək</td></tr>
    <tr><td>Ödəniş gecikir</td><td>Bir neçə ay borc yığılır, sonra tələbə gəlmir</td><td>Ödənişləri vaxtında izləmək, borcu kiçik olanda danışmaq</td></tr>
    <tr><td>Cədvəl uyğun deyil</td><td>Məktəb və ya iş saatı dəyişib</td><td>Başqa qrupa keçid təklif etmək</td></tr>
    <tr><td>Müəllim dəyişir</td><td>Müəllim gedir, qrup dağılır</td><td>Materialları, nəticələri və qeydləri müəllimin telefonunda deyil, mərkəzin sistemində saxlamaq</td></tr>
  </tbody>
</table>
<p>Diqqət edin: bu səbəblərin demək olar ki, hamısı məlumatın səpələnməsi ilə bağlıdır. Davamiyyət dəftərdə, nəticələr müəllimin Excel faylında, tapşırıqlar WhatsApp qrupunda, ödənişlər administratorun qeydlərindədir — və heç kim bütün mənzərəni görmür.</p>

<h2>6. Tələbəni Saxlamaq: Sistem Nə Verir</h2>
<p>Tələbəni saxlamaq üçün əsas iş müəllimin dərsidir. Amma dərsin nəticəsinin görünməsi, siqnalların vaxtında tutulması və valideynin məlumatlı qalması sistem tələb edir. Kurs mərkəzləri üçün hazırlanmış <a href="/mehsullar/kursometr">Kursometr</a> platformasında bunlar bir yerdədir:</p>
<ul>
  <li><strong>Qruplar, fənlər və həftəlik cədvəl</strong> — hər tələbə hansı qrupdadır, dərs nə vaxtdır, bir baxışla görünür.</li>
  <li><strong>Davamiyyət</strong> — hər dərsdə qeyd olunur, ardıcıl buraxanları görmək asanlaşır. Ətraflı: <a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">elektron davamiyyət uçotu</a>.</li>
  <li><strong>Vaxtlı sınaqlar</strong> — təyin olunan saatda açılıb bağlanır, qapalı suallar avtomatik yoxlanır; mərkəzin öz PDF test toplusundan sual bazası qurmaq olar. Ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</li>
  <li><strong>Ev tapşırığı</strong> — müəllim tapşırığı faylla verir, tələbə öz kabinetindən təhvil verir.</li>
  <li><strong>Valideyn kabineti</strong> — valideyn davamiyyəti, qiymətləri və sınaq nəticələrini özü görür. Ətraflı: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</li>
  <li><strong>Ödəniş izləmə</strong> — kimin ödədiyi, kimin borcu qaldığı görünür.</li>
  <li><strong>Dərs yazıları və materiallar</strong> — yalnız qrupa görünür; müəllim dəyişsə də, materiallar mərkəzdə qalır.</li>
  <li><strong>Mentor hesabları</strong> — köməkçi müəllimlər öz hesabları ilə işləyir.</li>
  <li><strong>Telefon brauzerində işləyir</strong> — tələbə və valideyn üçün mobil tətbiq yükləmək lazım deyil; Google ilə giriş var.</li>
</ul>
<p>Kursometr reklam və ya müraciət idarəetmə (CRM) aləti deyil — o, artıq yazılmış tələbəni saxlamağa və nəticəni göstərməyə kömək edir. Müraciətlər üçün yuxarıdakı sadə cədvəl və ya mərkəzin öz iş qaydasına uyğun <a href="/elaqe">fərdi sistem</a> istifadə oluna bilər.</p>

<h2>7. Tövsiyə və Rəylər: Ən Ucuz Kanalı Gücləndirmək</h2>
<p>Razı valideyn mərkəzin ən güclü reklamıdır, amma o, özü-özünə danışmır. Tövsiyəni sistemli etmək üçün:</p>
<ul>
  <li><strong>Doğru anda soruşun.</strong> Tələbə yaxşı sınaq nəticəsi göstərəndə, səviyyə keçəndə və ya imtahanı uğurla verəndə valideyndən tanışlarına tövsiyə etməsini xahiş edin.</li>
  <li><strong>"Dostunu gətir" təklifi.</strong> Yeni tələbə gətirənə və yeni tələbəyə kiçik endirim və ya pulsuz dərs — şərtləri aydın və yazılı olsun.</li>
  <li><strong>Google rəyi istəyin, amma qaydaya uyğun.</strong> Razı valideyn və tələbələrdən Google xəritədə rəy yazmağı xahiş edin və cavab verin. Google rəy müqabilində endirim, hədiyyə və ya başqa mükafat təklif etməyi qadağan edir — tövsiyə endirimini rəyə bağlamayın.</li>
  <li><strong>Məzunlarla əlaqə saxlayın.</strong> İmtahanı vermiş və ya kursu bitirmiş tələbələrin nəticələri (razılıqla) yeni tələbələr üçün ən inandırıcı sübutdur.</li>
  <li><strong>Mənbəni yazın.</strong> Tövsiyə ilə gələnləri ayrıca qeyd edin — kimin tövsiyə etdiyini bilmək təşəkkür etməyə də imkan verir.</li>
</ul>

<h2>8. Aylıq Ölçmə Cədvəli və 30 Günlük Plan</h2>
<p>Hər ayın sonunda aşağıdakı rəqəmlərə baxmaq kifayətdir. Bir neçə ay ərzində hansı kanalın işlədiyi və tələbələrin harada itdiyi aydın görünəcək:</p>
<table>
  <thead>
    <tr><th>Göstərici</th><th>Haradan götürülür</th></tr>
  </thead>
  <tbody>
    <tr><td>Müraciət sayı (mənbə üzrə)</td><td>Müraciət cədvəli</td></tr>
    <tr><td>Sınaq dərsinə gələnlər</td><td>Müraciət cədvəli</td></tr>
    <tr><td>Yeni tələbələr (mənbə üzrə)</td><td>Müraciət cədvəli, qeydiyyat</td></tr>
    <tr><td>Reklam xərci və tələbə başına xərc</td><td>Reklam kabineti + müraciət cədvəli</td></tr>
    <tr><td>Gedən tələbələr və səbəbi</td><td>Qrup siyahıları, valideynlə söhbət</td></tr>
    <tr><td>Davamiyyət faizi (qrup üzrə)</td><td>Davamiyyət qeydləri</td></tr>
    <tr><td>Borcu olan tələbələr</td><td>Ödəniş qeydləri</td></tr>
  </tbody>
</table>
<h3>30 günlük plan</h3>
<ul>
  <li><strong>1-ci həftə:</strong> müraciət cədvəli açın, mənbə sualını və hazır cavab şablonlarını tətbiq edin, müraciətlərə məsul şəxsi təyin edin.</li>
  <li><strong>2-ci həftə:</strong> Google Business Profile-ı yoxlayın (ad, ünvan, telefon, saatlar, şəkillər), saytda hər kurs üçün aydın səhifə və qeydiyyat forması olduğuna əmin olun.</li>
  <li><strong>3-cü həftə:</strong> qrupları, cədvəli, davamiyyəti və ödənişləri bir sistemə köçürün; valideynlərə kabinet açın; ilk diaqnostik sınağı keçirin.</li>
  <li><strong>4-cü həftə:</strong> sınaq dərsi və ya açıq dərs elan edin, lazım olsa kiçik büdcə ilə reklam verin, ayın sonunda ilk ölçmə cədvəlini doldurun.</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs mərkəzinə tələbə cəlb etməyin ən effektiv yolu hansıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tək bir yol yoxdur. Ən sabit nəticəni tövsiyə, Google axtarışı və xəritə verir, reklam isə qəbul mövsümündə və yeni qrup açılanda tez nəticə üçün istifadə olunur. Hansı kanalın sizdə işlədiyini bilmək üçün hər müraciətin mənbəyini qeyd edin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kurs mərkəzi reklama nə qədər pul xərcləməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Universal məbləğ yoxdur. Tələbə başına xərci (reklam xərci ÷ yeni tələbə) bir tələbənin gətirdiyi gəlirlə (aylıq haqq × orta qalma müddəti) müqayisə edin. Kiçik büdcə ilə başlayın, nəticəni ölçün və işləyən kanalı gücləndirin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Müraciətlər çoxdur, amma qeydiyyat azdır. Səbəb nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Çox vaxt problem cavab mərhələsindədir: gecikən cavab, qeyri-müəyyən qiymət, sınaq dərsinin təklif olunmaması və ya uyğun saatın olmaması. Sınaq dərsinə gəlib yazılmayanlardan səbəbini soruşun və qeyd edin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tələbələrin kursu yarımçıq tərk etməsini necə azaltmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Davamiyyəti hər dərsdə qeyd edin və ardıcıl buraxanlarla dərhal əlaqə saxlayın, müntəzəm sınaqla irəliləyişi göstərin, valideynə davamiyyəti və nəticələri görməyə imkan verin, ödənişləri vaxtında izləyin. Kursometr bu işləri bir yerdə aparmağa kömək edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google rəyi üçün endirim təklif etmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Google rəy müqabilində endirim, hədiyyə və ya başqa mükafat təklif etməyi qadağan edir. Razı valideyn və tələbələrdən sadəcə rəy yazmağı xahiş edin. "Dostunu gətir" endirimi isə rəydən asılı olmayan ayrıca təklif ola bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr müraciətləri və reklamı idarə edirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Kursometr qruplar, cədvəl, davamiyyət, sınaqlar, ev tapşırığı, ödəniş izləmə və valideyn kabineti üçündür — yəni yazılmış tələbəni saxlamağa kömək edir. Müraciətlər üçün sadə cədvəl və ya fərdi sistem istifadə oluna bilər.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/kurs-merkezi-nece-acilir-2027">Kurs mərkəzi necə açılır</a></li>
  <li><a href="/blog-details/kurs-merkezi-ucun-sayt-ve-seo-2027">Kurs mərkəzi üçün sayt və Google-da görünmək</a></li>
  <li><a href="/blog-details/elektron-davamiyyet-ucotu-kurs-merkezi-2027">Elektron davamiyyət uçotu</a></li>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/instagram-facebook-reklami-qiymeti-2027">Instagram və Facebook reklamı qiyməti</a></li>
</ul>

<h2>Nəticə</h2>
<p>Kurs mərkəzinin böyüməsi iki tərəfdən qurulur: yeni tələbə gətirmək və gələni saxlamaq. Mənbəyi qeyd olunan müraciətlər, tez və aydın cavab, sınaq dərsi, ölçülən reklam büdcəsi bir tərəfdir. Hər dərsdə qeyd olunan davamiyyət, müntəzəm sınaqlar, valideynin gördüyü nəticələr, vaxtında izlənən ödənişlər və sistemli tövsiyə isə digər tərəfdir. İkinci tərəf işləməyəndə birinciyə xərclənən pulun böyük hissəsi itir.</p>
<p><strong>Tələbələrinizi saxlamaq və nəticəni valideynə göstərmək istəyirsiniz? <a href="/mehsullar/kursometr">Kursometr</a> ilə tanış olun</strong> — müəllim qeydiyyatı pulsuzdur: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Kurs mərkəziniz üçün sayt, Google-da görünmək və ya reklam lazımdırsa: <a href="/veb-saytlarin-hazirlanmasi">veb sayt</a>, <a href="/seo-xidmeti">SEO</a>, <a href="/facebook-ve-instagram-reklamlari">Instagram və Facebook reklamı</a> — və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır. Nümunədəki rəqəmlər şərtidir. Google qaydaları üçün Google-un rəsmi səhifələrinə baxın. Kursometr funksiyaları noyabr 2026 vəziyyətinə görə təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>A course centre has two main problems, and they often happen at the same time. The first is finding new students. You post on Instagram and run a few ads, but enquiries are few, and many of the people who do get in touch disappear after asking "how much is it?". The second is keeping the students you already have. Groups that are full in September are half empty by December, a parent says "my child has lost interest" and stops paying, and every month the centre has to refill the empty places with more advertising. As a result, much of the money spent on ads simply goes on replacing the students who leave.</p>
<p>This article is for owners and administrators who run a course centre, training centre, language school, university entrance prep centre or a large tutoring group in 2027. We go step by step through the path a student takes from enquiry to enrolment, what each channel is good for, rules for answering enquiries and running trial lessons, how to calculate advertising cost per student, why students leave and how to keep them. At the end there is a monthly tracking table and a 30-day plan.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Where do most students come from?</td><td>Recommendations, Google search and maps, and Instagram. The mix differs from centre to centre — record the source of every enquiry</td></tr>
    <tr><td>Which channel is the cheapest?</td><td>Recommendations from satisfied students and parents. Only good results and well-organised work create them</td></tr>
    <tr><td>When do you need advertising?</td><td>During the enrolment season and when a new group opens — once your website, map profile and enquiry response routine are ready</td></tr>
    <tr><td>How do you turn an enquiry into an enrolment?</td><td>A quick reply, clear information (programme, schedule, price) and a free trial lesson or placement test</td></tr>
    <tr><td>Why do students leave?</td><td>They do not see results, they start missing lessons, parents are kept in the dark, or problems with the schedule or payments arise</td></tr>
    <tr><td>How do you keep students?</td><td>Track attendance, run regular tests, show results to parents and keep track of payments on time — for example, with <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. The Student Journey: From Noticing to Recommending</h2>
<p>A student or parent does not choose a course in one go. They go through several steps and can be lost at each one. Looking at the steps separately helps you find where the problem is:</p>
<table>
  <thead>
    <tr><th>Step</th><th>What happens</th><th>Where they are lost</th></tr>
  </thead>
  <tbody>
    <tr><td>1. Noticing</td><td>Hears about it from someone they know, searches on Google, sees it on a map or Instagram</td><td>The centre is not in search results or on the map, the page is out of date</td></tr>
    <tr><td>2. Enquiry</td><td>Calls, writes on WhatsApp, fills in the form</td><td>The reply is late, nobody picks up the phone, the information is confusing</td></tr>
    <tr><td>3. Trial lesson / placement test</td><td>Sees the centre, the teacher and the group with their own eyes</td><td>No trial lesson is offered or it is not organised</td></tr>
    <tr><td>4. Enrolment</td><td>Joins a group, makes the first payment</td><td>No suitable time slot, the terms are unclear</td></tr>
    <tr><td>5. Staying</td><td>Attends lessons for months, sees results</td><td>Results are not visible, attendance drops, parents are kept in the dark</td></tr>
    <tr><td>6. Recommending</td><td>Tells people they know, writes a review</td><td>Nobody asks them for a review</td></tr>
  </tbody>
</table>
<p>Many centres spend money only on the first step — advertising. Yet winning back the students lost at the second, third and fifth steps is cheaper: it takes order, not extra budget.</p>

<h2>2. Channels: What Each One Is Good For</h2>
<p>Channels do not replace one another. One builds trust, one brings quick results, one works over the long term. The table below is a general comparison:</p>
<table>
  <thead>
    <tr><th>Channel</th><th>Cost</th><th>Speed of results</th><th>Best for</th></tr>
  </thead>
  <tbody>
    <tr><td>Recommendations (students, parents, graduates)</td><td>Almost free</td><td>Slow but steady</td><td>Trust; the highest chance of enrolment</td></tr>
    <tr><td>Google search and website</td><td>Website and SEO work</td><td>Several months</td><td>Ready-to-act searches such as "English course Baku" or "university entrance prep"</td></tr>
    <tr><td>Google Maps (Business Profile)</td><td>Free</td><td>Several weeks</td><td>"Courses near me" searches, address, reviews</td></tr>
    <tr><td>Instagram (organic)</td><td>Time or an SMM service</td><td>Slow</td><td>Showing life at the centre, trust</td></tr>
    <tr><td>Instagram/Facebook ads</td><td>Daily budget</td><td>Fast (days)</td><td>Enrolment season, a new group, an open lesson announcement</td></tr>
    <tr><td>Google Ads</td><td>Pay per click</td><td>Fast (days)</td><td>People searching for a course and close to a decision</td></tr>
    <tr><td>Partnerships with schools, universities, companies</td><td>Time, sometimes a discount</td><td>Medium</td><td>Students in groups, corporate language courses</td></tr>
    <tr><td>Open lessons, mock exams, seminars</td><td>Teacher time</td><td>Medium</td><td>Showing the centre live, collecting enquiries</td></tr>
  </tbody>
</table>
<p><strong>Google and the website.</strong> Someone looking for a course wants answers to "which course, where, how much, when". A website with a separate page for each course, teacher profiles, address, schedule and a short enrolment form answers these questions. More: <a href="/blog-details/course-centre-website-and-seo-2027">a website and local SEO for a course centre</a>.</p>
<p><strong>Maps.</strong> Google Business Profile is free and shows the centre when a parent searches "near me". The name, address, phone, opening hours and photos must be accurate. How to set it up: <a href="/blog-details/how-to-create-google-business-profile-2026">Google Business Profile guide</a>.</p>
<p><strong>Instagram.</strong> Short clips from lessons, teacher videos, useful tips and student successes (only with consent) show the centre as a lively place. Photos and videos of children should only be shared with a parent's permission. If you need professional support: <a href="/blog-details/smm-services-cost-azerbaijan-2026">what an SMM service covers</a>.</p>
<p><strong>Advertising.</strong> Instagram/Facebook ads are good for quickly spreading the word about a new group or an open lesson, while Google Ads catches people who are already searching for a course. Both need a budget, and ads that send people to a poorly prepared page or to enquiries that go unanswered waste money. Budget calculations: <a href="/blog-details/instagram-facebook-ads-cost-azerbaijan-2027">Instagram and Facebook ads cost</a>, <a href="/blog-details/google-ads-azerbaijan-cost-guide-2027">Google Ads guide</a>.</p>

<h2>3. Answering Enquiries, Trial Lessons and Enrolment</h2>
<p>Parents usually contact several course providers at once. The centre that gives the first clear answer often gains the upper hand. Simple rules for turning an enquiry into an enrolment:</p>
<ul>
  <li><strong>Reply quickly.</strong> During working hours, reply to enquiries as quickly as possible. Answer messages that arrive in the evening first thing in the morning. Put one person in charge of enquiries.</li>
  <li><strong>Keep a ready-made reply template.</strong> A short text for each course: programme, duration, weekly schedule, group size, price or how the price is set, address. Replying "price in DM" loses a lot of people.</li>
  <li><strong>Offer a trial lesson or placement test.</strong> Once people see the centre, the teacher and the group, it is easier for them to decide. A placement test at a language school, a diagnostic mock test for exam prep and an open lesson at a children's centre all work well.</li>
  <li><strong>Ask for the source and record it.</strong> Ask "How did you hear about us?". Without this, you cannot know which channel is working.</li>
  <li><strong>Record those who do not enrol too.</strong> Ask people who came to a trial lesson but did not sign up why: the time does not suit, the price, the distance, another centre. This is the most valuable information for your next decisions.</li>
  <li><strong>Give the terms in writing.</strong> The payment rules, how missed lessons are counted, changing groups — these should be agreed in writing at enrolment.</li>
</ul>
<p>A simple spreadsheet is enough for enquiries: date, name, phone, course, source, trial lesson date, outcome (enrolled / did not enrol and why). What matters is that no enquiry is forgotten.</p>

<h2>4. Cost per Student: How to Calculate Your Advertising Budget</h2>
<p>Whether advertising works is shown by the number of new students, not by likes and views. Every centre needs three simple calculations:</p>
<table>
  <thead>
    <tr><th>Metric</th><th>Formula</th><th>What it shows</th></tr>
  </thead>
  <tbody>
    <tr><td>Cost per enquiry</td><td>Ad spend ÷ number of enquiries</td><td>How many people the ads prompted to get in touch</td></tr>
    <tr><td>Cost per student</td><td>Ad spend ÷ number of new students</td><td>How much one student costs the centre</td></tr>
    <tr><td>Revenue per student</td><td>Monthly fee × average length of stay (months)</td><td>How much it makes sense to spend on one student</td></tr>
  </tbody>
</table>
<p><strong>Example (with conditional numbers):</strong> in one month a centre spent 300 ₼ on ads, received 40 enquiries, 25 people came to a trial lesson and 10 enrolled. The cost per enquiry is 7.5 ₼ and the cost per student is 30 ₼. If the monthly fee is 80 ₼ and a student stays for 6 months on average, one student brings in 480 ₼ of revenue. There are two takeaways here:</p>
<ul>
  <li>If 40 enquiries lead to only 10 enrolments, the problem is often not the ads but the reply and trial lesson stage.</li>
  <li>If a student stays for 3 months instead of 6, the revenue they bring in is halved. In other words, keeping students has a stronger effect than increasing the advertising budget.</li>
</ul>
<p>These numbers are only a calculation example — every centre should take its own numbers from its own records.</p>

<h2>5. Why Students Leave</h2>
<p>A student rarely leaves overnight. There are usually signals before they go, and you can spot them in time:</p>
<table>
  <thead>
    <tr><th>Reason</th><th>Early signal</th><th>What you can do</th></tr>
  </thead>
  <tbody>
    <tr><td>They do not see results</td><td>No progress in tests, they say "it is not helping"</td><td>Regular tests, showing results as a chart, a plan for weak topics</td></tr>
    <tr><td>They miss lessons</td><td>2–3 lessons missed in a row</td><td>Record attendance at every lesson, get in touch straight away when someone misses</td></tr>
    <tr><td>Parents are kept in the dark</td><td>The parent talks to the centre only when payment is due</td><td>Let parents see attendance, grades and test results for themselves</td></tr>
    <tr><td>Assignments get lost</td><td>Homework is not done, nobody knows who did what</td><td>Set assignments in one place and track submissions</td></tr>
    <tr><td>Payments are late</td><td>Debt builds up over several months, then the student stops coming</td><td>Track payments on time, talk about the debt while it is still small</td></tr>
    <tr><td>The schedule does not suit</td><td>School or working hours have changed</td><td>Offer a move to another group</td></tr>
    <tr><td>The teacher changes</td><td>The teacher leaves, the group falls apart</td><td>Keep materials, results and notes in the centre's system, not on the teacher's phone</td></tr>
  </tbody>
</table>
<p>Note that almost all of these reasons come down to scattered information. Attendance is in a notebook, results are in the teacher's Excel file, assignments are in a WhatsApp group, payments are in the administrator's notes — and nobody sees the full picture.</p>

<h2>6. Keeping Students: What a System Gives You</h2>
<p>The main thing that keeps students is the teacher's lessons. But making lesson results visible, catching signals in time and keeping parents informed takes a system. In <a href="/mehsullar/kursometr">Kursometr</a>, a platform built for course centres, all of this is in one place:</p>
<ul>
  <li><strong>Groups, subjects and the weekly schedule</strong> — which group each student is in and when the lesson is can be seen at a glance.</li>
  <li><strong>Attendance</strong> — recorded at every lesson, so it is easier to spot students who keep missing. More: <a href="/blog-details/attendance-tracking-for-course-centres-2027">electronic attendance tracking</a>.</li>
  <li><strong>Timed tests</strong> — open and close at the set time, closed questions are checked automatically; you can build a question bank from the centre's own PDF test collection. More: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</li>
  <li><strong>Homework</strong> — the teacher sets an assignment with a file, the student submits it from their own account.</li>
  <li><strong>Parent portal</strong> — parents see attendance, grades and test results for themselves. More: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</li>
  <li><strong>Payment tracking</strong> — you can see who has paid and who still owes.</li>
  <li><strong>Lesson recordings and materials</strong> — visible only to the group; even if the teacher changes, the materials stay with the centre.</li>
  <li><strong>Mentor accounts</strong> — assistant teachers work with their own accounts.</li>
  <li><strong>Works in a phone browser</strong> — students and parents do not need to download a mobile app; Google sign-in is available.</li>
</ul>
<p>Kursometr is not an advertising or enquiry management (CRM) tool — it helps you keep students who have already enrolled and show their results. For enquiries, you can use the simple spreadsheet above or a <a href="/contact">custom system</a> built around the centre's own workflows.</p>

<h2>7. Recommendations and Reviews: Strengthening the Cheapest Channel</h2>
<p>A satisfied parent is a centre's strongest advertising, but they will not talk about you on their own. To make recommendations systematic:</p>
<ul>
  <li><strong>Ask at the right moment.</strong> When a student shows a good test result, moves up a level or passes an exam, ask the parent to recommend you to people they know.</li>
  <li><strong>A "bring a friend" offer.</strong> A small discount or a free lesson for the person who brings a new student and for the new student — with clear terms in writing.</li>
  <li><strong>Ask for Google reviews, but within the rules.</strong> Ask satisfied parents and students to write a review on Google Maps, and reply to them. Google prohibits offering discounts, gifts or other rewards in exchange for reviews — do not tie the referral discount to a review.</li>
  <li><strong>Stay in touch with graduates.</strong> The results of students who have passed their exam or finished the course (with consent) are the most convincing proof for new students.</li>
  <li><strong>Record the source.</strong> Mark those who came through a recommendation separately — knowing who recommended you also lets you thank them.</li>
</ul>

<h2>8. Monthly Tracking Table and a 30-Day Plan</h2>
<p>It is enough to look at the figures below at the end of each month. Within a few months it will be clear which channel works and where students are lost:</p>
<table>
  <thead>
    <tr><th>Metric</th><th>Where it comes from</th></tr>
  </thead>
  <tbody>
    <tr><td>Number of enquiries (by source)</td><td>Enquiry spreadsheet</td></tr>
    <tr><td>People who came to a trial lesson</td><td>Enquiry spreadsheet</td></tr>
    <tr><td>New students (by source)</td><td>Enquiry spreadsheet, enrolment</td></tr>
    <tr><td>Ad spend and cost per student</td><td>Ads account + enquiry spreadsheet</td></tr>
    <tr><td>Students who left and why</td><td>Group lists, conversations with parents</td></tr>
    <tr><td>Attendance rate (by group)</td><td>Attendance records</td></tr>
    <tr><td>Students with outstanding payments</td><td>Payment records</td></tr>
  </tbody>
</table>
<h3>30-day plan</h3>
<ul>
  <li><strong>Week 1:</strong> start an enquiry spreadsheet, introduce the source question and ready-made reply templates, put someone in charge of enquiries.</li>
  <li><strong>Week 2:</strong> check your Google Business Profile (name, address, phone, hours, photos) and make sure the website has a clear page and enrolment form for each course.</li>
  <li><strong>Week 3:</strong> move groups, the schedule, attendance and payments into one system; open parent accounts; run the first diagnostic test.</li>
  <li><strong>Week 4:</strong> announce a trial lesson or open lesson, run ads on a small budget if needed, and fill in the first tracking table at the end of the month.</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the most effective way to attract students to a course centre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">There is no single way. Recommendations, Google search and maps give the most stable results, while advertising is used for quick results during the enrolment season and when a new group opens. Record the source of every enquiry to know which channel works for you.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much should a course centre spend on advertising?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">There is no universal amount. Compare the cost per student (ad spend ÷ new students) with the revenue one student brings in (monthly fee × average length of stay). Start with a small budget, measure the results and scale up the channel that works.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">There are plenty of enquiries but few enrolments. Why?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The problem is often at the reply stage: a late reply, an unclear price, no trial lesson on offer or no suitable time slot. Ask people who came to a trial lesson but did not enrol why, and record the answer.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can you reduce the number of students who drop out of a course?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Record attendance at every lesson and get in touch straight away with students who miss several in a row, show progress through regular tests, let parents see attendance and results, and keep track of payments on time. Kursometr helps you do all of this in one place.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can you offer a discount for a Google review?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. Google prohibits offering discounts, gifts or other rewards in exchange for reviews. Simply ask satisfied parents and students to write a review. A "bring a friend" discount, however, can be a separate offer that does not depend on a review.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does Kursometr manage enquiries and advertising?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. Kursometr is for groups, the schedule, attendance, tests, homework, payment tracking and the parent portal — in other words, it helps you keep students who have enrolled. For enquiries, you can use a simple spreadsheet or a custom system.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/how-to-open-a-course-centre-2027">How to open a course centre</a></li>
  <li><a href="/blog-details/course-centre-website-and-seo-2027">A website for a course centre and getting found on Google</a></li>
  <li><a href="/blog-details/attendance-tracking-for-course-centres-2027">Electronic attendance tracking</a></li>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/instagram-facebook-ads-cost-azerbaijan-2027">Instagram and Facebook ads cost</a></li>
</ul>

<h2>Conclusion</h2>
<p>A course centre grows from two sides: bringing in new students and keeping the ones who come. Enquiries with a recorded source, quick and clear replies, trial lessons and a measured advertising budget are one side. Attendance recorded at every lesson, regular tests, results that parents can see, payments tracked on time and systematic recommendations are the other. When the second side does not work, much of the money spent on the first is lost.</p>
<p><strong>Want to keep your students and show their results to parents? Take a look at <a href="/mehsullar/kursometr">Kursometr</a></strong> — teacher registration is free: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. If your course centre needs a website, visibility on Google or advertising: <a href="/website-development">website</a>, <a href="/seo-services">SEO</a>, <a href="/facebook-instagram-ads">Instagram and Facebook ads</a> — or <a href="/contact">get in touch</a>.</p>
<p><small><em>This article is for general information only. The figures in the example are conditional. For Google's rules, see Google's official pages. Kursometr features are described as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>У учебного центра две главные проблемы, и они часто возникают одновременно. Первая — найти новых учеников. В Instagram выходят публикации, несколько раз запускается реклама, но заявок мало, а многие из обратившихся исчезают после вопроса «сколько стоит?». Вторая — удержать текущих учеников. Группы, заполненные в сентябре, к декабру сокращаются вдвое, родитель говорит «ребёнку неинтересно» и перестаёт платить, а центру каждый месяц приходится заново заполнять освободившиеся места с помощью рекламы. В итоге большая часть денег, потраченных на рекламу, уходит просто на то, чтобы заменить ушедших учеников.</p>
<p>Эта статья для владельцев и администраторов, которые в 2027 году руководят учебным центром, образовательным центром, языковыми курсами, центром подготовки абитуриентов или крупной группой репетиторов. Шаг за шагом разбираем путь ученика от заявки до записи, для чего подходит каждый канал, правила ответа на заявки и пробного урока, как считать рекламные расходы на одного ученика, почему ученики уходят и как их удержать. В конце — ежемесячная таблица показателей и план на 30 дней.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Откуда чаще всего приходят ученики?</td><td>По рекомендациям, из поиска Google и карт, из Instagram. В каждом центре соотношение своё — отмечайте источник в каждой заявке</td></tr>
    <tr><td>Какой канал самый дешёвый?</td><td>Рекомендация довольного ученика и родителя. Её создают только хорошие результаты и упорядоченная работа</td></tr>
    <tr><td>Когда нужна реклама?</td><td>В сезон набора и при открытии новой группы — после того как готовы сайт, профиль на картах и правила ответа на заявки</td></tr>
    <tr><td>Как превратить заявку в запись?</td><td>Быстрый ответ, понятная информация (программа, расписание, цена) и бесплатный пробный урок или тест на уровень</td></tr>
    <tr><td>Почему ученик уходит?</td><td>Не видит результата, начинает пропускать занятия, родитель остаётся без информации, возникают проблемы с расписанием или оплатой</td></tr>
    <tr><td>Как удержать ученика?</td><td>Следите за посещаемостью, регулярно проводите тесты, показывайте результаты родителю, вовремя отслеживайте оплату — например, с помощью <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>1. Путь ученика: от первого знакомства до рекомендации</h2>
<p>Ученик или родитель не выбирает курс в один момент. Он проходит несколько шагов и может быть потерян на каждом из них. Если рассматривать эти шаги по отдельности, проще найти, где именно проблема:</p>
<table>
  <thead>
    <tr><th>Шаг</th><th>Что происходит</th><th>Где теряется</th></tr>
  </thead>
  <tbody>
    <tr><td>1. Знакомство</td><td>Слышит от знакомых, ищет в Google, видит на картах или в Instagram</td><td>Центра нет в поиске и на картах, страница устарела</td></tr>
    <tr><td>2. Заявка</td><td>Звонит, пишет в WhatsApp, заполняет форму</td><td>Ответ задерживается, трубку не берут, информация путаная</td></tr>
    <tr><td>3. Пробный урок / тест на уровень</td><td>Своими глазами видит центр, преподавателя и группу</td><td>Пробный урок не предлагают или не организуют</td></tr>
    <tr><td>4. Запись</td><td>Записывается в группу, вносит первую оплату</td><td>Нет подходящего времени, условия непонятны</td></tr>
    <tr><td>5. Удержание</td><td>Месяцами ходит на занятия, видит результат</td><td>Результата не видно, посещаемость падает, родитель не в курсе</td></tr>
    <tr><td>6. Рекомендация</td><td>Рассказывает знакомым, пишет отзыв</td><td>Никто не просит его об отзыве</td></tr>
  </tbody>
</table>
<p>Многие центры тратят деньги только на первый шаг — на рекламу. Между тем вернуть учеников, потерянных на втором, третьем и пятом шагах, дешевле: для этого нужен не дополнительный бюджет, а порядок.</p>

<h2>2. Каналы: для чего подходит каждый</h2>
<p>Каналы не заменяют друг друга. Один создаёт доверие, другой даёт быстрый результат, третий работает в долгую. Ниже — общее сравнение:</p>
<table>
  <thead>
    <tr><th>Канал</th><th>Расходы</th><th>Скорость результата</th><th>Для чего подходит</th></tr>
  </thead>
  <tbody>
    <tr><td>Рекомендации (ученики, родители, выпускники)</td><td>Почти бесплатно</td><td>Медленно, но стабильно</td><td>Доверие; самая высокая вероятность записи</td></tr>
    <tr><td>Поиск Google и сайт</td><td>Работа над сайтом и SEO</td><td>Несколько месяцев</td><td>Готовые запросы вроде «курсы английского Баку», «подготовка абитуриентов»</td></tr>
    <tr><td>Google Карты (Business Profile)</td><td>Бесплатно</td><td>Несколько недель</td><td>Запросы «курсы рядом», адрес, отзывы</td></tr>
    <tr><td>Instagram (органика)</td><td>Время или услуга SMM</td><td>Медленно</td><td>Показать жизнь центра, доверие</td></tr>
    <tr><td>Реклама в Instagram/Facebook</td><td>Дневной бюджет</td><td>Быстро (дни)</td><td>Сезон набора, новая группа, анонс открытого урока</td></tr>
    <tr><td>Google Ads</td><td>Оплата за клик</td><td>Быстро (дни)</td><td>Люди, которые ищут курс и близки к решению</td></tr>
    <tr><td>Сотрудничество со школами, вузами, компаниями</td><td>Время, иногда скидка</td><td>Средне</td><td>Ученики группами, корпоративные языковые курсы</td></tr>
    <tr><td>Открытый урок, пробный экзамен, семинар</td><td>Время преподавателя</td><td>Средне</td><td>Показать центр вживую, собрать заявки</td></tr>
  </tbody>
</table>
<p><strong>Google и сайт.</strong> Человек, который ищет курс, хочет получить ответы на вопросы «какой курс, где, сколько стоит, когда». На эти вопросы отвечает сайт, где у каждого курса своя страница, есть профили преподавателей, адрес, расписание и короткая форма записи. Подробнее: <a href="/blog-details/sajt-i-seo-dlya-uchebnogo-centra-2027">сайт и локальное SEO для учебного центра</a>.</p>
<p><strong>Карты.</strong> Google Business Profile бесплатен и показывает центр, когда родитель ищет «рядом». Название, адрес, телефон, часы работы и фотографии должны быть точными. Как создать: <a href="/blog-details/kak-sozdat-google-business-profile-2026">руководство по Google Business Profile</a>.</p>
<p><strong>Instagram.</strong> Короткие видео с занятий, ролики преподавателей, полезные советы, успехи учеников (только с согласия) показывают центр живым. Фото и видео детей можно публиковать только с разрешения родителей. Если нужна профессиональная поддержка: <a href="/blog-details/stoimost-smm-azerbaydzhan-2026">что входит в услугу SMM</a>.</p>
<p><strong>Реклама.</strong> Реклама в Instagram/Facebook помогает быстро рассказать о новой группе или открытом уроке, а Google Ads — поймать человека, который уже ищет курс. И то и другое требует бюджета, и реклама, ведущая на плохо подготовленную страницу или к заявкам без ответа, тратит деньги впустую. Расчёт бюджета: <a href="/blog-details/stoimost-reklamy-instagram-facebook-azerbaydzhan-2027">стоимость рекламы в Instagram и Facebook</a>, <a href="/blog-details/google-ads-azerbaydzhan-2027">руководство по Google Ads</a>.</p>

<h2>3. Ответ на заявку, пробный урок и запись</h2>
<p>Родитель обычно пишет сразу в несколько учебных центров. Преимущество часто получает тот, кто первым дал понятный ответ. Простые правила, чтобы превратить заявку в запись:</p>
<ul>
  <li><strong>Отвечайте быстро.</strong> В рабочее время отвечайте на заявку как можно скорее. На сообщение, пришедшее вечером, ответьте утром первым делом. Назначьте одного человека ответственным за заявки.</li>
  <li><strong>Держите готовый шаблон ответа.</strong> Для каждого курса — короткий текст: программа, длительность, недельное расписание, размер группы, цена или то, как она определяется, адрес. Ответ «цена в директ» отталкивает многих.</li>
  <li><strong>Предлагайте пробный урок или тест на уровень.</strong> Когда человек видит центр, преподавателя и группу, ему проще принять решение. На языковых курсах хорошо работает тест на уровень, в подготовке к экзаменам — диагностический тест, в детском центре — открытый урок.</li>
  <li><strong>Спрашивайте и записывайте источник.</strong> Вопрос «Откуда вы о нас узнали?». Без него невозможно понять, какой канал работает.</li>
  <li><strong>Фиксируйте и тех, кто не записался.</strong> Спросите у тех, кто пришёл на пробный урок, но не записался, о причине: неудобное время, цена, далеко, другой центр. Это самая ценная информация для следующих решений.</li>
  <li><strong>Давайте условия в письменном виде.</strong> Порядок оплаты, как учитываются пропущенные занятия, перевод в другую группу — всё это нужно письменно согласовать при записи.</li>
</ul>
<p>Для заявок достаточно простой таблицы: дата, имя, телефон, курс, источник, дата пробного урока, результат (записался / не записался и причина). Главное — чтобы ни одна заявка не была забыта.</p>

<h2>4. Стоимость одного ученика: как считать рекламный бюджет</h2>
<p>Работает ли реклама, показывает не число «лайков» и «просмотров», а число новых учеников. Каждому центру нужны три простых расчёта:</p>
<table>
  <thead>
    <tr><th>Показатель</th><th>Формула</th><th>Что показывает</th></tr>
  </thead>
  <tbody>
    <tr><td>Стоимость заявки</td><td>Расходы на рекламу ÷ число заявок</td><td>Сколько людей реклама побудила написать</td></tr>
    <tr><td>Стоимость ученика</td><td>Расходы на рекламу ÷ число новых учеников</td><td>Во сколько центру обходится один ученик</td></tr>
    <tr><td>Доход от ученика</td><td>Ежемесячная плата × средний срок обучения (мес.)</td><td>Сколько разумно тратить на одного ученика</td></tr>
  </tbody>
</table>
<p><strong>Пример (с условными цифрами):</strong> центр за месяц потратил на рекламу 300 ₼, получил 40 заявок, 25 человек пришли на пробный урок, 10 записались. Стоимость заявки — 7,5 ₼, стоимость ученика — 30 ₼. Если ежемесячная плата 80 ₼ и ученик в среднем остаётся 6 месяцев, один ученик приносит 480 ₼ дохода. Отсюда два вывода:</p>
<ul>
  <li>Если из 40 заявок записались только 10, проблема чаще всего не в рекламе, а на этапе ответа и пробного урока.</li>
  <li>Если ученик остаётся не 6, а 3 месяца, приносимый им доход уменьшается вдвое. То есть удержание учеников влияет сильнее, чем увеличение рекламного бюджета.</li>
</ul>
<p>Эти цифры — лишь пример расчёта: каждый центр должен брать свои цифры из собственных записей.</p>

<h2>5. Почему ученики уходят</h2>
<p>Ученик редко уходит в один день. Обычно уходу предшествуют сигналы, и их можно заметить вовремя:</p>
<table>
  <thead>
    <tr><th>Причина</th><th>Ранний сигнал</th><th>Что можно сделать</th></tr>
  </thead>
  <tbody>
    <tr><td>Не видит результата</td><td>В тестах нет прогресса, говорит «пользы нет»</td><td>Регулярные тесты, показ результатов в виде графика, план по слабым темам</td></tr>
    <tr><td>Пропускает занятия</td><td>2–3 пропуска подряд</td><td>Отмечать посещаемость на каждом занятии, сразу связываться при пропуске</td></tr>
    <tr><td>Родитель не в курсе</td><td>Родитель общается с центром только во время оплаты</td><td>Родитель сам видит посещаемость, оценки и результаты тестов</td></tr>
    <tr><td>Задания теряются</td><td>Домашнее задание не выполняется, неясно, кто что сделал</td><td>Выдавать задания в одном месте и отслеживать их сдачу</td></tr>
    <tr><td>Оплата задерживается</td><td>Долг копится несколько месяцев, потом ученик перестаёт ходить</td><td>Вовремя отслеживать оплаты, говорить о долге, пока он небольшой</td></tr>
    <tr><td>Расписание не подходит</td><td>Изменилось время в школе или на работе</td><td>Предложить перейти в другую группу</td></tr>
    <tr><td>Меняется преподаватель</td><td>Преподаватель уходит, группа распадается</td><td>Хранить материалы, результаты и записи не в телефоне преподавателя, а в системе центра</td></tr>
  </tbody>
</table>
<p>Обратите внимание: почти все эти причины связаны с разрозненностью информации. Посещаемость — в тетради, результаты — в Excel-файле преподавателя, задания — в группе WhatsApp, оплаты — в записях администратора, и никто не видит полной картины.</p>

<h2>6. Удержание учеников: что даёт система</h2>
<p>Главное в удержании ученика — урок преподавателя. Но чтобы результат урока был виден, сигналы замечались вовремя, а родитель оставался в курсе, нужна система. На платформе <a href="/mehsullar/kursometr">Kursometr</a>, созданной для учебных центров, всё это собрано в одном месте:</p>
<ul>
  <li><strong>Группы, предметы и недельное расписание</strong> — в какой группе каждый ученик и когда занятие, видно с одного взгляда.</li>
  <li><strong>Посещаемость</strong> — отмечается на каждом занятии, проще увидеть тех, кто пропускает подряд. Подробнее: <a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">электронный учёт посещаемости</a>.</li>
  <li><strong>Тесты по времени</strong> — открываются и закрываются в назначенное время, закрытые вопросы проверяются автоматически; банк вопросов можно собрать из собственного PDF-сборника тестов центра. Подробнее: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</li>
  <li><strong>Домашние задания</strong> — преподаватель выдаёт задание с файлом, ученик сдаёт его из своего кабинета.</li>
  <li><strong>Кабинет родителя</strong> — родитель сам видит посещаемость, оценки и результаты тестов. Подробнее: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</li>
  <li><strong>Учёт оплат</strong> — видно, кто оплатил, а у кого остался долг.</li>
  <li><strong>Записи занятий и материалы</strong> — видны только группе; даже если преподаватель сменится, материалы остаются в центре.</li>
  <li><strong>Аккаунты менторов</strong> — помощники преподавателей работают под своими аккаунтами.</li>
  <li><strong>Работает в браузере телефона</strong> — ученику и родителю не нужно устанавливать мобильное приложение; есть вход через Google.</li>
</ul>
<p>Kursometr — не инструмент для рекламы или управления заявками (CRM): он помогает удержать уже записавшегося ученика и показать результат. Для заявок можно использовать простую таблицу, описанную выше, или <a href="/kontakty">индивидуальную систему</a>, построенную под правила работы центра.</p>

<h2>7. Рекомендации и отзывы: усиливаем самый дешёвый канал</h2>
<p>Довольный родитель — самая сильная реклама центра, но сам по себе он о нём не расскажет. Чтобы рекомендации стали системными:</p>
<ul>
  <li><strong>Спрашивайте в правильный момент.</strong> Когда ученик показывает хороший результат теста, переходит на следующий уровень или успешно сдаёт экзамен, попросите родителя порекомендовать центр знакомым.</li>
  <li><strong>Предложение «Приведи друга».</strong> Небольшая скидка или бесплатное занятие тому, кто привёл нового ученика, и самому новому ученику — с понятными и письменными условиями.</li>
  <li><strong>Просите отзывы в Google, но по правилам.</strong> Попросите довольных родителей и учеников оставить отзыв на Google Картах и отвечайте на отзывы. Google запрещает предлагать скидку, подарок или иное вознаграждение в обмен на отзыв — не привязывайте скидку за рекомендацию к отзыву.</li>
  <li><strong>Поддерживайте связь с выпускниками.</strong> Результаты учеников, сдавших экзамен или окончивших курс (с их согласия), — самое убедительное доказательство для новых учеников.</li>
  <li><strong>Записывайте источник.</strong> Отмечайте отдельно тех, кто пришёл по рекомендации: зная, кто порекомендовал, можно и поблагодарить этого человека.</li>
</ul>

<h2>8. Ежемесячная таблица показателей и план на 30 дней</h2>
<p>В конце каждого месяца достаточно посмотреть на приведённые ниже цифры. Через несколько месяцев станет ясно, какой канал работает и где теряются ученики:</p>
<table>
  <thead>
    <tr><th>Показатель</th><th>Откуда брать</th></tr>
  </thead>
  <tbody>
    <tr><td>Число заявок (по источникам)</td><td>Таблица заявок</td></tr>
    <tr><td>Пришедшие на пробный урок</td><td>Таблица заявок</td></tr>
    <tr><td>Новые ученики (по источникам)</td><td>Таблица заявок, запись</td></tr>
    <tr><td>Расходы на рекламу и стоимость ученика</td><td>Рекламный кабинет + таблица заявок</td></tr>
    <tr><td>Ушедшие ученики и причина</td><td>Списки групп, разговор с родителями</td></tr>
    <tr><td>Процент посещаемости (по группам)</td><td>Записи посещаемости</td></tr>
    <tr><td>Ученики с долгом</td><td>Записи оплат</td></tr>
  </tbody>
</table>
<h3>План на 30 дней</h3>
<ul>
  <li><strong>1-я неделя:</strong> заведите таблицу заявок, внедрите вопрос об источнике и готовые шаблоны ответов, назначьте ответственного за заявки.</li>
  <li><strong>2-я неделя:</strong> проверьте Google Business Profile (название, адрес, телефон, часы работы, фотографии), убедитесь, что на сайте у каждого курса есть понятная страница и форма записи.</li>
  <li><strong>3-я неделя:</strong> перенесите группы, расписание, посещаемость и оплаты в одну систему; откройте родителям кабинеты; проведите первый диагностический тест.</li>
  <li><strong>4-я неделя:</strong> объявите пробный или открытый урок, при необходимости запустите рекламу с небольшим бюджетом, в конце месяца заполните первую таблицу показателей.</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какой способ привлечения учеников в учебный центр самый эффективный?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Единого способа нет. Самый стабильный результат дают рекомендации, поиск Google и карты, а реклама используется для быстрого результата в сезон набора и при открытии новой группы. Чтобы понять, какой канал работает именно у вас, отмечайте источник каждой заявки.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько учебному центру тратить на рекламу?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Универсальной суммы нет. Сравните стоимость ученика (расходы на рекламу ÷ новые ученики) с доходом, который приносит один ученик (ежемесячная плата × средний срок обучения). Начните с небольшого бюджета, измерьте результат и усиливайте работающий канал.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Заявок много, а записей мало. В чём причина?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Чаще всего проблема на этапе ответа: запоздалый ответ, неясная цена, отсутствие предложения пробного урока или подходящего времени. Спросите у тех, кто пришёл на пробный урок, но не записался, о причине и зафиксируйте её.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как снизить число учеников, бросающих курс на полпути?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Отмечайте посещаемость на каждом занятии и сразу связывайтесь с теми, кто пропускает подряд, показывайте прогресс с помощью регулярных тестов, дайте родителю возможность видеть посещаемость и результаты, вовремя отслеживайте оплаты. Kursometr помогает вести всю эту работу в одном месте.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли предлагать скидку за отзыв в Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Google запрещает предлагать скидку, подарок или иное вознаграждение в обмен на отзыв. Просто попросите довольных родителей и учеников оставить отзыв. А скидка «Приведи друга» может быть отдельным предложением, не зависящим от отзыва.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Управляет ли Kursometr заявками и рекламой?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Kursometr предназначен для групп, расписания, посещаемости, тестов, домашних заданий, учёта оплат и кабинета родителя — то есть помогает удержать записавшегося ученика. Для заявок можно использовать простую таблицу или индивидуальную систему.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/kak-otkryt-uchebnyj-centr-2027">Как открыть учебный центр</a></li>
  <li><a href="/blog-details/sajt-i-seo-dlya-uchebnogo-centra-2027">Сайт для учебного центра и видимость в Google</a></li>
  <li><a href="/blog-details/uchet-poseshchaemosti-uchebnyj-centr-2027">Электронный учёт посещаемости</a></li>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/stoimost-reklamy-instagram-facebook-azerbaydzhan-2027">Стоимость рекламы в Instagram и Facebook</a></li>
</ul>

<h2>Итог</h2>
<p>Рост учебного центра строится с двух сторон: привлечь новых учеников и удержать пришедших. Заявки с отмеченным источником, быстрый и понятный ответ, пробный урок, измеряемый рекламный бюджет — это одна сторона. Посещаемость, отмечаемая на каждом занятии, регулярные тесты, результаты, которые видит родитель, вовремя отслеживаемые оплаты и системные рекомендации — другая. Если вторая сторона не работает, большая часть денег, потраченных на первую, теряется.</p>
<p><strong>Хотите удерживать учеников и показывать результаты родителям? Познакомьтесь с <a href="/mehsullar/kursometr">Kursometr</a></strong> — регистрация педагога бесплатна: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>. Если вашему учебному центру нужен сайт, видимость в Google или реклама: <a href="/razrabotka-sajtov">веб-сайт</a>, <a href="/seo-uslugi">SEO</a>, <a href="/reklama-facebook-instagram">реклама в Instagram и Facebook</a> — или <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Эта статья носит общий информационный характер. Цифры в примере условные. Правила Google смотрите на официальных страницах Google. Функции Kursometr описаны по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'kurs-merkezine-telebe-celb-etmek-ve-saxlamaq-2027'],
            [
                'slug_en' => 'how-to-attract-and-retain-students-course-centre-2027',
                'slug_ru' => 'kak-privlech-i-uderzhat-uchenikov-uchebnyj-centr-2027',
                'title_az' => 'Kurs Mərkəzinə Tələbə Necə Cəlb Olunur və Saxlanılır: Kanallar, Sınaq Dərsi, Tələbə Başına Xərc və Tələbə İtkisi (2027)',
                'title_en' => 'How a Course Centre Attracts and Retains Students: Channels, Trial Lessons, Cost per Student and Drop-outs (2027)',
                'title_ru' => 'Как учебному центру привлечь и удержать учеников: каналы, пробный урок, стоимость ученика и отток (2027)',
                'review_az' => 'Kurs mərkəzi, dil kursu və abituriyent hazırlığı mərkəzi üçün: tələbənin müraciətdən tövsiyəyə qədər yolu, Google, xəritə, Instagram, reklam və tövsiyə kanallarının müqayisəsi, müraciətə cavab və sınaq dərsi qaydaları, tələbə başına xərcin hesablanması, tələbələrin niyə getdiyi və Kursometr ilə necə saxlanıldığı, Google rəy qaydası, aylıq ölçmə cədvəli və 30 günlük plan.',
                'review_en' => 'For course centres, language schools and exam-prep centres: the student journey from enquiry to referral, comparing Google, Maps, Instagram, ads and referrals, rules for replying to enquiries and running trial lessons, how to calculate cost per student, why students drop out and how to retain them with Kursometr, Google review rules, a monthly metrics table and a 30-day plan.',
                'review_ru' => 'Для учебных центров, языковых курсов и центров подготовки к экзаменам: путь ученика от заявки до рекомендации, сравнение Google, карт, Instagram, рекламы и рекомендаций, правила ответа на заявки и пробного урока, расчёт стоимости ученика, почему ученики уходят и как удержать их с Kursometr, правила отзывов Google, ежемесячная таблица показателей и план на 30 дней.',
                'date_az' => '7 Noyabr 2026',
                'date_en' => 'November 7, 2026',
                'date_ru' => '7 Ноября 2026',
                'photo' => 'cover-student-acquisition-az.png',
                'photo_en' => 'cover-student-acquisition-en.png',
                'photo_ru' => 'cover-student-acquisition-ru.png',
                'meta_title_az' => 'Kurs Mərkəzinə Tələbə Cəlb Etmək və Saxlamaq 2027 | RS Code',
                'meta_title_en' => 'How to Attract and Retain Students for a Course Centre 2027 | RS Code',
                'meta_title_ru' => 'Как привлечь и удержать учеников учебного центра 2027 | RS Code',
                'meta_description_az' => 'Kurs mərkəzinə tələbə necə cəlb olunur: kanallar, müraciətə cavab, sınaq dərsi, tələbə başına xərc, tələbə itkisinin səbəbləri və tələbəni saxlamaq üçün sistem.',
                'meta_description_en' => 'How a course centre attracts students: channels, replying to enquiries, trial lessons, cost per student, why students drop out and a system to retain them.',
                'meta_description_ru' => 'Как учебному центру привлечь учеников: каналы, ответ на заявки, пробный урок, стоимость ученика, причины оттока и система для удержания учеников.',
                'meta_keywords_az' => 'kurs mərkəzinə tələbə cəlb etmək, tələbə necə tapılır, kurs mərkəzi reklamı, kurs mərkəzi marketinqi, sınaq dərsi, tələbə itkisi, tələbəni saxlamaq, kursometr, 2027',
                'meta_keywords_en' => 'attract students course centre, how to get students, course centre advertising, course centre marketing, trial lesson, student drop-out, student retention, kursometr, 2027',
                'meta_keywords_ru' => 'как привлечь учеников в учебный центр, реклама учебного центра, маркетинг учебного центра, пробный урок, отток учеников, удержание учеников, kursometr, 2027',
                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
