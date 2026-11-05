<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * #72 — Onlayn dərs necə təşkil olunur: Zoom, Google Meet, dərs yazıları və materialların paylaşılması (2027).
 * Video alətlərinin pulsuz plan limitləri rəsmi səhifələrdən yoxlanıb (2026-11-04): zoom.us/pricing (Basic: 40 dəq, 100 iştirakçı),
 * workspace.google.com/products/meet (şəxsi hesab: 100 iştirakçı, görüş başına 60 dəq; 1:1 və mobil zənglərdə limit yoxdur),
 * microsoft.com/microsoft-teams/free (100 nəfərə qədər, 60 dəq). Mətndə "şərtlər dəyişə bilər, rəsmi saytda yoxlayın" xəbərdarlığı var.
 * Kursometr faktları yalnız resources/lang/az/products.php və kursometr.com-dandır; dərs yazıları kursometr.com-da "yükləyin" kimi təsvir olunur
 * və yalnız həmin qrupun tələbələrinə görünür. Daxili video zəng, Zoom/Meet inteqrasiyası, video həcm limiti, SMS, onlayn ödəniş,
 * qiymət və rəylər İDDİA EDİLMİR. Fərdi məlumatlar qanunu yalnız ümumi adla xatırlanır, maddə nömrəsi yoxdur.
 * #34, #35, #66, #67, #69, #71-ə link verir. #73/#74-ə link YOXDUR.
 */
class Blog72OnlineLessonSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Onlayn dərs artıq pandemiya dövrünün müvəqqəti həlli deyil, müəllim və repetitorların gündəlik iş formatıdır. Rayondakı şagird Bakıdakı müəllimdən dərs alır, xaricdə yaşayan ailələr uşaqlarına Azərbaycan dili və ya riyaziyyat üçün repetitor tapır, qış aylarında isə əyani qruplar tez-tez onlayna keçir. Amma "Zoom linkini WhatsApp-a atmaq" hələ onlayn dərsi təşkil etmək demək deyil. Səs pis gəlir, şagirdlər kameranı söndürür, dərs yazısı harasa itir, tapşırığı kimin etdiyi bilinmir, buraxılan dərsin pulu isə mübahisəyə çevrilir.</p>
<p>Bu yazıda onlayn dərsi əvvəldən axıra qədər necə quracağınızı izah edirik: video alətinin seçimi, minimum avadanlıq, dərsin strukturu, şagirdlərin aktivliyi, dərsin yazılması və razılıq, yazıların və materialların təhlükəsiz saxlanması, ev tapşırığı, davamiyyət və ödəniş. Sonda bütün bunları Kursometr-də necə bir yerə toplayacağınızı göstəririk.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Onlayn dərs üçün hansı proqram lazımdır?</td><td>Video zəng üçün Zoom, Google Meet və ya Microsoft Teams; qruplar, cədvəl, davamiyyət, materiallar və ödənişlər üçün isə ayrıca idarəetmə platforması</td></tr>
    <tr><td>Minimum avadanlıq nədir?</td><td>Qulaqlıq və ya ayrıca mikrofon, kamera, üzə düşən işıq, sabit internet; riyaziyyat üçün qrafik planşet çox kömək edir</td></tr>
    <tr><td>Dərsi yazmaq olarmı?</td><td>Olar, amma əvvəlcədən şagirdlərdən, azyaşlılar üçün isə valideynlərdən razılıq alın</td></tr>
    <tr><td>Dərs yazılarını harada saxlamaq lazımdır?</td><td>Açıq YouTube linkində və ya WhatsApp qrupunda yox, yalnız həmin qrupun şagirdlərinə görünən bölmədə</td></tr>
    <tr><td>Hamısını bir yerdə necə aparmaq olar?</td><td>Video zəng Zoom və ya Meet-də keçir; qruplar, cədvəl, davamiyyət, yazılar, testlər, tapşırıqlar və ödənişlər isə <a href="/mehsullar/kursometr">Kursometr</a>-də</td></tr>
  </tbody>
</table>

<h2>Video Alətinin Seçimi: Zoom, Google Meet və Microsoft Teams</h2>
<p>Üç məşhur alətin hamısı onlayn dərs üçün yararlıdır. Fərq əsasən pulsuz planın məhdudiyyətlərində, şagirdin necə qoşulmasında və müəllimin hansı ekosistemə öyrəşdiyindədir. Aşağıdakı limitlər həmin şirkətlərin rəsmi səhifələrindən götürülüb (noyabr 2026), amma bu şərtlər vaxtaşırı dəyişir — qərar verməzdən əvvəl <a href="https://zoom.us/pricing" rel="noopener" target="_blank">zoom.us</a>, <a href="https://workspace.google.com/products/meet/" rel="noopener" target="_blank">Google Meet</a> və <a href="https://www.microsoft.com/microsoft-teams/free" rel="noopener" target="_blank">Microsoft Teams</a> səhifələrində cari şərtləri yoxlayın.</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>Zoom</th><th>Google Meet</th><th>Microsoft Teams</th></tr>
  </thead>
  <tbody>
    <tr><td>Pulsuz plan</td><td>Basic: görüş başına 40 dəqiqə, 100 iştirakçıya qədər</td><td>Şəxsi Google hesabı: 100 iştirakçıya qədər, görüş başına 60 dəqiqə; təkbətək zənglərdə vaxt limiti yoxdur</td><td>100 nəfərə qədər, 60 dəqiqəyə qədər qrup görüşü</td></tr>
    <tr><td>Şagird necə qoşulur</td><td>Proqram və ya brauzer, link ilə</td><td>Brauzerdən, link ilə; Google hesabı olanlar üçün ən sadə yol</td><td>Proqram və ya brauzer, link ilə</td></tr>
    <tr><td>Dərs üçün güclü tərəfi</td><td>Kiçik otaqlar (breakout rooms), çevik ekran paylaşımı, ağ lövhə</td><td>Heç nə quraşdırmadan işləyir, Google Təqvim və Classroom ilə tanış mühit</td><td>Microsoft 365 istifadə edən məktəb və şirkətlərdə tanışdır</td></tr>
    <tr><td>Nəyə diqqət etməli</td><td>Pulsuz planda 40 dəqiqə tam dərs üçün azdır</td><td>Pulsuz planda qrup dərsi 60 dəqiqə ilə məhdudlaşır</td><td>Qrup görüşü pulsuz planda 60 dəqiqə ilə məhdudlaşır</td></tr>
  </tbody>
</table>
<p>Praktik məsləhət: fərdi dərs aparırsınızsa, Google Meet-in təkbətək zəngləri rahat seçimdir. 60–90 dəqiqəlik qrup dərsləri üçün isə pulsuz planlar adətən kifayət etmir — ya ödənişli plana keçin, ya da dərsi limitə uyğun bölün. Ən vacibi: bir alət seçin və bütün qruplarda onu istifadə edin. Hər dərsdə fərqli link və fərqli proqram şagirdləri çaşdırır.</p>

<h2>Avadanlıq: Minimum Dəst</h2>
<p>Onlayn dərsdə şagird sizi əsasən <strong>eşidir</strong>. Ona görə ilk investisiya kamera yox, səsdir.</p>
<ul>
  <li><strong>Mikrofon:</strong> noutbukun daxili mikrofonu otağın əks-sədasını da yazır. Mikrofonlu qulaqlıq və ya sadə USB mikrofon səsi xeyli təmizləyir və əks-sədanın qarşısını alır.</li>
  <li><strong>Kamera:</strong> noutbuk kamerası kifayətdir, amma onu göz səviyyəsinə qaldırın. Aşağıdan çəkilən görüntü yorucudur.</li>
  <li><strong>İşıq:</strong> pəncərə arxanızda yox, qarşınızda olmalıdır. Axşam dərsləri üçün masa lampası və ya kiçik halqa işıq üzünüzü aydın göstərir.</li>
  <li><strong>İnternet:</strong> mümkünsə kabel ilə qoşulun, Wi-Fi-da isə routerə yaxın oturun. Dərs zamanı evdə böyük faylların yüklənməsini dayandırın. Ehtiyat üçün telefonda mobil internet saxlayın.</li>
  <li><strong>İkinci ekran:</strong> bir ekranda şagirdləri, digərində dərs materialını görmək işi xeyli asanlaşdırır. İkinci monitor yoxdursa, planşet və ya ikinci noutbuk da olar.</li>
  <li><strong>Qrafik planşet:</strong> riyaziyyat, fizika və kimya müəllimləri üçün demək olar ki, vacibdir. Siçanla düstur yazmaq çətindir; ucuz qrafik planşet və ya stilusla işləyən planşet ağ lövhəni əvəz edir.</li>
</ul>

<h2>Onlayn Dərsin Strukturu</h2>
<p>Onlayn dərsdə diqqət əyani dərsə nisbətən daha tez dağılır. Ona görə dərsi qısa, aydın hissələrə bölün:</p>
<table>
  <thead>
    <tr><th>Mərhələ</th><th>Təxmini vaxt (60 dəq dərsdə)</th><th>Nə edilir</th></tr>
  </thead>
  <tbody>
    <tr><td>Isınma</td><td>5 dəqiqə</td><td>Salamlaşma, səs və görüntünün yoxlanması, keçən dərsə dair 1–2 sürətli sual</td></tr>
    <tr><td>İzah</td><td>15–20 dəqiqə</td><td>Yeni mövzu ekran paylaşımı və ya qrafik planşetlə; hər 5–7 dəqiqədən bir şagirdlərə sual</td></tr>
    <tr><td>Praktika</td><td>20–25 dəqiqə</td><td>Şagirdlər məsələ həll edir, kiçik otaqlarda cüt işləyir və ya lövhəyə "çıxır"</td></tr>
    <tr><td>Yoxlama</td><td>10 dəqiqə</td><td>Qısa test və ya şifahi sorğu, ev tapşırığının izahı, növbəti dərsin vaxtı</td></tr>
  </tbody>
</table>
<p>Dərsdən əvvəl materialı (slaydları, PDF-i, məsələ siyahısını) qrupla paylaşın ki, şagird ekranı yaxşı görməsə belə, öz cihazında açıb izləyə bilsin.</p>

<h2>Aktivlik və Kamera Məsələsi</h2>
<p>Kameraların sönük olması onlayn dərsin ən çox şikayət edilən problemidir. Amma məcburiyyət çox vaxt əks nəticə verir. Şagirdin evində kiçik qardaşı, səs-küy, utancaqlıq və ya zəif internet ola bilər. Ona görə qaydanı əvvəlcədən və hörmətlə qoyun:</p>
<ul>
  <li><strong>Qaydanı ilk dərsdə izah edin:</strong> "İzah və praktika zamanı kamera açıq olsun; problem varsa, mənə ayrıca yazın."</li>
  <li><strong>Kameraya alternativ verin:</strong> internet zəifdirsə, şagird mikrofonla və ya çatda aktiv iştirak etsin.</li>
  <li><strong>Adla müraciət edin:</strong> "Kim cavab verər?" əvəzinə "Leyla, sən necə düşünürsən?" — bu, hər kəsi diqqətli saxlayır.</li>
  <li><strong>Tez-tez qısa tapşırıq verin:</strong> çatda cavab yazmaq, sorğuda səs vermək, əl qaldırmaq funksiyası.</li>
  <li><strong>Məxfiliyə hörmət edin:</strong> şagirdin otağını, ailə üzvlərini şərh etməyin; virtual fon istifadəsinə icazə verin; ekran görüntüsü çəkməyin və başqalarına göstərməyin.</li>
</ul>

<h2>Dərsin Yazılması və Razılıq</h2>
<p>Dərs yazısı buraxan şagird və təkrar üçün çox faydalıdır. Amma video yazı şagirdin üzünü, səsini, adını və bəzən evini göstərir — bu, fərdi məlumatdır. Yaxşı təcrübə belədir:</p>
<ol>
  <li><strong>Əvvəlcədən razılıq alın.</strong> Kursa yazılanda şagirdə (azyaşlılar üçün valideynə) dərslərin yazıldığını, yazının nə üçün istifadə olunduğunu, kimin görəcəyini və nə qədər saxlanacağını yazılı bildirin və razılığını alın.</li>
  <li><strong>Hər dəfə xəbərdar edin.</strong> Yazını başlatmazdan əvvəl "dərsi yazıram" deyin. Zoom, Meet və Teams-də yazı başlayanda iştirakçılar adətən bildiriş görür.</li>
  <li><strong>İmtina imkanı verin.</strong> Kamerada görünmək istəməyən şagird kameranı söndürə və ya yazı zamanı yalnız çatda iştirak edə bilər.</li>
  <li><strong>Məqsəddən kənar istifadə etməyin.</strong> Şagird görünən dərs yazısını onun (və ya valideyninin) ayrıca razılığı olmadan reklam üçün sosial şəbəkədə paylaşmayın.</li>
</ol>
<p>Azərbaycanda fərdi məlumatların toplanması və istifadəsi "Fərdi məlumatlar haqqında" Qanunla tənzimlənir. Ümumi prinsip sadədir: məlumatı razılıqla, aydın məqsəd üçün toplayın və onu yalnız lazım olan insanlara göstərin. Konkret hüquqi sual yaranarsa, hüquqşünasla məsləhətləşin.</p>

<h2>Yazılar və Materiallar Harada Saxlanmalıdır?</h2>
<p>Ən geniş yayılmış iki həll — WhatsApp qrupu və açıq YouTube linki — həm rahat görünür, həm də ən çox problem yaradır.</p>
<table>
  <thead>
    <tr><th>Üsul</th><th>Problem</th></tr>
  </thead>
  <tbody>
    <tr><td>WhatsApp qrupu</td><td>Fayllar mesajların arasında itir, yeni şagird köhnə materialları görmür, telefonun yaddaşı dolur; qrupdan çıxan şagird artıq yüklədiyi faylları saxlayır</td></tr>
    <tr><td>Açıq və ya "siyahıda olmayan" YouTube linki</td><td>Linki olan hər kəs videonu açır; link asanlıqla başqa qruplara, hətta kursda oxumayanlara ötürülür</td></tr>
    <tr><td>Google Drive qovluğu</td><td>Daha yaxşıdır, amma hər qrupa ayrıca giriş vermək, çıxan şagirdi silmək əl ilə görülür və tez-tez unudulur</td></tr>
    <tr><td>Qrupa bağlı bölmə</td><td>Material yalnız həmin qrupun şagirdlərinə görünür; şagird qrupdan çıxanda girişi də bağlanır</td></tr>
  </tbody>
</table>
<p>Qayda belədir: hər qrupun öz bölməsi olsun, yazılar və materiallar dərsin tarixi ilə adlandırılsın ("12.11 — Kvadrat tənliklər"), giriş isə yalnız həmin qrupun şagirdlərinə açıq olsun. Bu, həm şagirdlərin məxfiliyini, həm də sizin əməyinizi qoruyur.</p>

<h2>Onlayn Dərsdən Sonra: Ev Tapşırığı</h2>
<p>Onlayn dərsdən sonra tapşırığı çatda yazmaq ən pis variantdır: mesaj aşağı sürüşür və "görmədim" bəhanəsi yaranır. Tapşırığı qrupun öz bölməsində, son tarixlə verin. Şagird cavabını orada təhvil versin, siz də yoxlayıb qeyd edin. Qapalı suallardan ibarət yoxlamaları vaxtlı onlayn test kimi vermək daha rahatdır — nəticə avtomatik hesablanır. Bu barədə ətraflı: <a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">onlayn test necə hazırlanır</a>.</p>

<h2>Onlayn Dərsdə Davamiyyət</h2>
<p>Onlayn dərsdə "gəldi" anlayışı daha qeyri-müəyyəndir: şagird qoşulub, amma kamerası sönük və cavab vermir; ya da 20 dəqiqə gecikib. Əvvəlcədən qərar verin:</p>
<ul>
  <li>Davamiyyəti dərsin əvvəlində yox, ilk 10 dəqiqədən sonra qeyd edin.</li>
  <li>"Gecikdi" və "iştirak etdi, amma passiv idi" kimi halları qeyddə ayrıca göstərin.</li>
  <li>Texniki problem (işıq və internet kəsilməsi) hallarını ayrıca qeyd edin — bu, ödəniş mübahisəsində lazım olacaq.</li>
</ul>
<p>Davamiyyəti dərs bitən kimi qeyd edin, sonraya saxlamayın. Valideyn uşağın onlayn dərsə qoşulub-qoşulmadığını öz kabinetində görə bilirsə, sual da azalır. Valideynlərlə iş barədə: <a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">valideyn hesabatı və ödəniş izləmə</a>.</p>

<h2>Buraxılan Onlayn Dərslərin Ödənişi</h2>
<p>Onlayn formatda dərs buraxmaq daha asandır, ona görə qayda əvvəlcədən yazılı olmalıdır. Tez-tez istifadə olunan variantlar:</p>
<table>
  <thead>
    <tr><th>Hal</th><th>Mümkün qayda</th></tr>
  </thead>
  <tbody>
    <tr><td>Şagird xəbərdarlıqsız qoşulmadı</td><td>Dərs keçmiş sayılır; şagird dərsin yazısına və materiallarına baxır</td></tr>
    <tr><td>Şagird əvvəlcədən xəbər verdi</td><td>Fərdi dərsdə başqa vaxta keçirilir; qrup dərsində yazıya baxır</td></tr>
    <tr><td>Müəllim tərəfdən texniki problem</td><td>Dərs əvəzlənir və ya ödənişdən çıxılır</td></tr>
    <tr><td>Şagird tərəfdən texniki problem</td><td>Yazı və materiallar verilir, dərs keçmiş sayılır</td></tr>
  </tbody>
</table>
<p>Hansı qaydanı seçsəniz də, onu kursa yazılarkən elan edin və hər şagirdin ödəniş vəziyyətini bir yerdə izləyin.</p>

<h2>Kursometr Onlayn Dərsdə Harada Dayanır?</h2>
<p>Bunu aydın deyək: <strong>Kursometr video zəng proqramı deyil.</strong> Dərsin özü Zoom, Google Meet və ya Teams-də keçir. Kursometr isə dərsin ətrafındakı bütün təşkilatı bir yerə toplayır — WhatsApp, Excel və dəftər arasında bölünmüş işi:</p>
<table>
  <thead>
    <tr><th>Vəzifə</th><th>Harada</th></tr>
  </thead>
  <tbody>
    <tr><td>Video zəng, ekran paylaşımı, dərsin yazılması</td><td>Zoom, Google Meet və ya Teams</td></tr>
    <tr><td>Fənlər, qruplar, həftəlik cədvəl</td><td>Kursometr</td></tr>
    <tr><td>Davamiyyət</td><td>Kursometr</td></tr>
    <tr><td>Dərs yazıları və materiallar</td><td>Kursometr — yalnız həmin qrupun şagirdlərinə görünür</td></tr>
    <tr><td>Vaxtlı sınaqlar (ümumi və aralıq)</td><td>Kursometr — müəllimin təyin etdiyi saatda açılır və bağlanır, qapalı suallar avtomatik yoxlanır</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Kursometr — verilir və yoxlanır</td></tr>
    <tr><td>Ödənişlər</td><td>Kursometr — tələbə ödənişlərinin izlənməsi</td></tr>
    <tr><td>Valideyn</td><td>Kursometr — davamiyyət, qiymət və sınaq nəticələri ilə valideyn kabineti</td></tr>
  </tbody>
</table>
<p>Kursometr-i Google Classroom və WhatsApp ilə ətraflı müqayisə etmişik: <a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr</a>.</p>

<h2>Kursometr-də Onlayn Dərsləri Necə Qurmaq Olar: Addım-addım</h2>
<ol>
  <li><strong>Səhifənizi açın.</strong> <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a>-da Google hesabı ilə daxil olun və bir dəqiqəyə öz ünvanınızı yaradın: <em>adiniz.kursometr.com</em>. Müəllim qeydiyyatı pulsuzdur.</li>
  <li><strong>Fənləri və qrupları yaradın.</strong> Qrup adına formatı yazın: "Riyaziyyat 9 — onlayn, B.e/Ç.a 19:00".</li>
  <li><strong>Həftəlik cədvəli qurun</strong> və şagirdləri dəvət linki ilə qrupa qoşun.</li>
  <li><strong>Dərsi Zoom və ya Meet-də keçin</strong>, davamiyyəti isə Kursometr-də qeyd edin — telefon brauzerindən də olar.</li>
  <li><strong>Dərsdən sonra yazını və materialları yükləyin.</strong> Onları yalnız həmin qrupun şagirdləri görür.</li>
  <li><strong>Ev tapşırığını verin və yoxlayın.</strong></li>
  <li><strong>Yoxlamanı vaxtlı test kimi keçirin.</strong> Hazır test toplusunu PDF kimi yükləyərək sualları sual bazasına əlavə edə bilərsiniz; nəticə sınaq bitən kimi hazır olur.</li>
  <li><strong>Ödənişləri qeyd edin</strong> — kimin ödədiyi bir yerdə görünür.</li>
  <li><strong>Valideynləri qoşun</strong> — onlar uşağın davamiyyətini, qiymətlərini və sınaq nəticələrini öz kabinetində görür.</li>
  <li><strong>Köməkçi müəllim əlavə edin</strong> — mentor hesabı ilə, məsələn, tapşırıqları yoxlayan assistent üçün.</li>
</ol>
<p>Fərdi işləyən müəllimlər üçün ümumi bələdçi: <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">repetitorlar üçün dərs idarəetmə proqramı</a>. Dil kursları üçün: <a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">dil kursu üçün idarəetmə proqramı</a>. Əgər canlı dərslər deyil, əvvəlcədən çəkilmiş video kurs satmaq istəyirsinizsə: <a href="/blog-details/onlayn-kurs-nece-yaradilir-2026">onlayn kurs necə yaradılır</a>.</p>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Bütün qruplar üçün bir video aləti seçilib və pulsuz planın limiti yoxlanıb</li>
  <li>☐ Mikrofonlu qulaqlıq, göz səviyyəsində kamera və qarşıdan işıq hazırdır</li>
  <li>☐ İnternet üçün ehtiyat variant (mobil internet) var</li>
  <li>☐ Dərs ısınma, izah, praktika və yoxlama hissələrinə bölünüb</li>
  <li>☐ Kamera qaydası ilk dərsdə izah olunub, alternativ verilib</li>
  <li>☐ Dərsin yazılmasına şagirdlərdən və ya valideynlərdən yazılı razılıq alınıb</li>
  <li>☐ Yazılar və materiallar yalnız qrupa açıq bölmədə saxlanır</li>
  <li>☐ Ev tapşırığı son tarixlə, qrupun bölməsində verilir</li>
  <li>☐ Davamiyyət hər dərsdən sonra qeyd olunur</li>
  <li>☐ Buraxılan onlayn dərslərin ödəniş qaydası yazılı elan olunub</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Onlayn dərs üçün Zoom yoxsa Google Meet daha yaxşıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər ikisi yararlıdır. Google Meet brauzerdən heç nə quraşdırmadan işləyir və pulsuz planda təkbətək zənglərdə vaxt limiti yoxdur. Zoom-da kiçik otaqlar və ekran paylaşımı daha çevikdir. Hər iki xidmətin pulsuz planında qrup görüşlərinin vaxt limiti var, ona görə cari şərtləri rəsmi saytlarda yoxlayın və bütün qruplarda bir aləti istifadə edin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Onlayn dərsi yazmaq üçün icazə lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Video yazı şagirdin üzünü və səsini göstərdiyi üçün fərdi məlumat sayılır. Yaxşı təcrübə odur ki, şagirddən, azyaşlılar üçün isə valideyndən əvvəlcədən yazılı razılıq alasınız, yazının məqsədini və kimin görəcəyini bildirəsiniz. Azərbaycanda bu sahə "Fərdi məlumatlar haqqında" Qanunla tənzimlənir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Dərs yazılarını şagirdlərlə necə paylaşmaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Açıq YouTube linki və ya WhatsApp qrupu əvəzinə yalnız həmin qrupun şagirdlərinə açıq bölmədən istifadə edin. Kursometr-də dərs yazıları və materiallar yüklənir və yalnız həmin qrupun tələbələrinə görünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Şagirdləri kameranı açmağa necə həvəsləndirmək olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Qaydanı ilk dərsdə izah edin, şagirdlərə adla müraciət edin, tez-tez qısa tapşırıq verin. İnterneti zəif olan və ya evində şərait olmayan şagirdə mikrofon və ya çatla iştirak etməyə icazə verin, virtual fona icazə verin və onun otağını şərh etməyin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Buraxılan onlayn dərsin pulu necə hesablanır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bunu müəllim özü müəyyən edir, amma qayda əvvəlcədən yazılı olmalıdır. Çox vaxt xəbərdarlıqsız buraxılan dərs keçmiş sayılır və şagird yazıya baxır, müəllim tərəfdən olan texniki problemdə isə dərs əvəzlənir. Davamiyyət və ödənişlərin bir yerdə qeyd olunması mübahisələrin qarşısını alır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-də video zəng varmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr, Kursometr video zəng proqramı deyil — dərs Zoom, Google Meet və ya Teams-də keçir. Kursometr qrupları, cədvəli, davamiyyəti, dərs yazılarını və materialları, vaxtlı testləri, ev tapşırıqlarını, ödənişləri və valideyn kabinetini bir yerdə saxlayır. Müəllim qeydiyyatı pulsuzdur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">Repetitorlar üçün dərs idarəetmə proqramı</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-yoxsa-kursometr-2027">Google Classroom, WhatsApp, Excel, yoxsa Kursometr: müqayisə</a></li>
  <li><a href="/blog-details/onlayn-test-nece-hazirlanir-muellim-ucun-2027">Onlayn test necə hazırlanır: vaxtlı sınaq və avtomatik nəticə</a></li>
  <li><a href="/blog-details/repetitor-valideyn-hesabati-ve-odenis-izleme-2027">Valideyn hesabatı və ödəniş izləmə</a></li>
  <li><a href="/blog-details/dil-kursu-ucun-idareetme-proqrami-2027">Dil kursu üçün idarəetmə proqramı</a></li>
  <li><a href="/blog-details/onlayn-kurs-nece-yaradilir-2026">Onlayn kurs necə yaradılır və satılır</a></li>
  <li><a href="/blog-details/repetitor-ders-haqqi-nece-teyin-olunur-2027">Repetitor dərs haqqını necə müəyyənləşdirsin</a></li>
  <li><a href="/blog-details/ev-tapsirigi-sistemi-muellim-ucun-2027">Ev tapşırığı sistemi: ver, yoxla, izlə</a></li>
  <li><a href="/blog-details/it-ve-proqramlasdirma-kursu-ucun-idareetme-proqrami-2027">İT və proqramlaşdırma kursu üçün idarəetmə proqramı</a></li>
</ul>

<h2>Nəticə</h2>
<p>Yaxşı onlayn dərs üç şeyə dayanır: aydın səs və görüntü, düşünülmüş dərs strukturu və dərsdən sonrakı təşkilat. Video zəng üçün Zoom və ya Meet kifayətdir. Amma yazılar, materiallar, tapşırıqlar, davamiyyət və ödənişlər WhatsApp və Excel arasında səpələnəndə müəllimin vaxtı dərsə yox, axtarışa gedir. Bunları bir yerdə aparanda həm şagirdin məxfiliyi qorunur, həm də valideyn hər şeyi şəffaf görür.</p>
<p><strong>Onlayn dərslərinizi bu gün təşkil edin: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — müəllim qeydiyyatı pulsuzdur. Ətraflı: <a href="/mehsullar/kursometr">Kursometr haqqında</a>. Kurs mərkəziniz üçün fərdi sistem lazımdırsa, <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>Online lessons are no longer a temporary pandemic fix — they are an everyday working format for teachers and tutors. A student in the regions takes lessons from a teacher in Baku, families living abroad find tutors for Azerbaijani or maths, and in winter in-person groups often move online. But "dropping a Zoom link into WhatsApp" is not the same as organising an online lesson. The sound is poor, students switch their cameras off, the recording gets lost somewhere, nobody knows who did the homework, and payment for a missed lesson turns into an argument.</p>
<p>This article explains how to set up an online lesson from start to finish: choosing a video tool, minimum equipment, lesson structure, student engagement, recording and consent, storing recordings and materials safely, homework, attendance and payment. At the end we show how to bring all of this together in Kursometr.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What software do online lessons need?</td><td>Zoom, Google Meet or Microsoft Teams for the video call, plus a separate management platform for groups, schedule, attendance, materials and payments</td></tr>
    <tr><td>What is the minimum equipment?</td><td>A headset or separate microphone, a camera, light on your face and a stable connection; a graphics tablet helps a lot for maths</td></tr>
    <tr><td>Can lessons be recorded?</td><td>Yes, but get consent in advance from students, and from parents for minors</td></tr>
    <tr><td>Where should recordings be kept?</td><td>Not on a public YouTube link or in a WhatsApp group, but in a section visible only to that group's students</td></tr>
    <tr><td>How can it all be kept in one place?</td><td>The video call happens in Zoom or Meet; groups, schedule, attendance, recordings, tests, homework and payments live in <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Choosing a Video Tool: Zoom, Google Meet and Microsoft Teams</h2>
<p>All three popular tools work for online lessons. The differences are mainly in the free plan's limits, how students join and which ecosystem the teacher is used to. The limits below are taken from the companies' official pages (November 2026), but these terms change from time to time — before deciding, check the current terms on <a href="https://zoom.us/pricing" rel="noopener" target="_blank">zoom.us</a>, <a href="https://workspace.google.com/products/meet/" rel="noopener" target="_blank">Google Meet</a> and <a href="https://www.microsoft.com/microsoft-teams/free" rel="noopener" target="_blank">Microsoft Teams</a>.</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>Zoom</th><th>Google Meet</th><th>Microsoft Teams</th></tr>
  </thead>
  <tbody>
    <tr><td>Free plan</td><td>Basic: 40 minutes per meeting, up to 100 participants</td><td>Personal Google account: up to 100 participants, 60 minutes per meeting; no time limit on one-to-one calls</td><td>Group meetings of up to 100 people for up to 60 minutes</td></tr>
    <tr><td>How students join</td><td>App or browser, via a link</td><td>From the browser, via a link; the simplest option for people with a Google account</td><td>App or browser, via a link</td></tr>
    <tr><td>Strength for teaching</td><td>Breakout rooms, flexible screen sharing, whiteboard</td><td>Works without installing anything, familiar alongside Google Calendar and Classroom</td><td>Familiar in schools and companies that use Microsoft 365</td></tr>
    <tr><td>Watch out for</td><td>40 minutes on the free plan is too short for a full lesson</td><td>Group lessons are limited to 60 minutes on the free plan</td><td>Group meetings are limited to 60 minutes on the free plan</td></tr>
  </tbody>
</table>
<p>Practical advice: for one-to-one lessons, Google Meet's one-to-one calls are a convenient choice. For 60–90 minute group lessons, free plans are usually not enough — either move to a paid plan or split the lesson to fit the limit. Most importantly, pick one tool and use it with every group. A different link and a different app every lesson confuses students.</p>

<h2>Equipment: The Minimum Kit</h2>
<p>In an online lesson students mostly <strong>hear</strong> you. So your first investment should be sound, not the camera.</p>
<ul>
  <li><strong>Microphone:</strong> a laptop's built-in microphone also picks up the room's echo. A headset with a microphone or a simple USB microphone makes the sound much cleaner and prevents echo.</li>
  <li><strong>Camera:</strong> a laptop camera is enough, but raise it to eye level. A shot from below is tiring to watch.</li>
  <li><strong>Light:</strong> the window should be in front of you, not behind you. For evening lessons a desk lamp or a small ring light shows your face clearly.</li>
  <li><strong>Internet:</strong> use a cable if you can; on Wi-Fi, sit close to the router. Pause large downloads at home during the lesson. Keep mobile data on your phone as a backup.</li>
  <li><strong>Second screen:</strong> seeing students on one screen and lesson material on another makes the job much easier. If you have no second monitor, a tablet or a second laptop will do.</li>
  <li><strong>Graphics tablet:</strong> almost essential for maths, physics and chemistry teachers. Writing formulas with a mouse is hard; an inexpensive graphics tablet or a tablet with a stylus replaces the whiteboard.</li>
</ul>

<h2>Structure of an Online Lesson</h2>
<p>Attention drifts faster online than in a classroom. So split the lesson into short, clear parts:</p>
<table>
  <thead>
    <tr><th>Stage</th><th>Approximate time (in a 60-minute lesson)</th><th>What happens</th></tr>
  </thead>
  <tbody>
    <tr><td>Warm-up</td><td>5 minutes</td><td>Greeting, checking sound and video, 1–2 quick questions on the last lesson</td></tr>
    <tr><td>Explanation</td><td>15–20 minutes</td><td>New topic via screen sharing or a graphics tablet; a question to students every 5–7 minutes</td></tr>
    <tr><td>Practice</td><td>20–25 minutes</td><td>Students solve problems, work in pairs in breakout rooms or "come to the board"</td></tr>
    <tr><td>Check</td><td>10 minutes</td><td>A short quiz or oral questions, explaining the homework, the time of the next lesson</td></tr>
  </tbody>
</table>
<p>Share the material (slides, PDF, problem list) with the group before the lesson, so that even if a student cannot see the screen well, they can open it on their own device and follow along.</p>

<h2>Engagement and the Camera Question</h2>
<p>Cameras being switched off is the most common complaint about online lessons. But forcing it often backfires. A student may have a younger sibling at home, noise, shyness or a weak connection. So set the rule in advance and respectfully:</p>
<ul>
  <li><strong>Explain the rule in the first lesson:</strong> "Cameras on during explanation and practice; if there's a problem, message me privately."</li>
  <li><strong>Offer an alternative to the camera:</strong> if the connection is weak, the student can take part actively by microphone or in the chat.</li>
  <li><strong>Address students by name:</strong> instead of "Who wants to answer?", ask "Leyla, what do you think?" — it keeps everyone alert.</li>
  <li><strong>Give short tasks often:</strong> typing an answer in the chat, voting in a poll, the raise-hand feature.</li>
  <li><strong>Respect privacy:</strong> do not comment on a student's room or family members; allow virtual backgrounds; do not take screenshots or show them to others.</li>
</ul>

<h2>Recording Lessons and Consent</h2>
<p>A lesson recording is very useful for a student who missed the lesson and for revision. But a video recording shows the student's face, voice, name and sometimes their home — this is personal data. Good practice looks like this:</p>
<ol>
  <li><strong>Get consent in advance.</strong> When a student enrols, tell them (for minors, their parent) in writing that lessons are recorded, what the recording is used for, who will see it and how long it is kept, and get their consent.</li>
  <li><strong>Announce it every time.</strong> Before starting the recording, say "I'm recording the lesson". In Zoom, Meet and Teams participants usually see a notification when recording starts.</li>
  <li><strong>Allow opting out.</strong> A student who does not want to appear on camera can turn it off or take part only through the chat while recording.</li>
  <li><strong>Do not use it for other purposes.</strong> Do not post a recording in which students appear on social media for promotion without their (or their parent's) separate consent.</li>
</ol>
<p>In Azerbaijan, the collection and use of personal data is regulated by the Law "On Personal Data". The general principle is simple: collect data with consent, for a clear purpose, and show it only to the people who need it. If a specific legal question arises, consult a lawyer.</p>

<h2>Where Should Recordings and Materials Be Kept?</h2>
<p>The two most common solutions — a WhatsApp group and a public YouTube link — look convenient but cause the most problems.</p>
<table>
  <thead>
    <tr><th>Method</th><th>Problem</th></tr>
  </thead>
  <tbody>
    <tr><td>WhatsApp group</td><td>Files get lost among messages, new students cannot see older materials, phone storage fills up; a student who leaves the group keeps the files they downloaded</td></tr>
    <tr><td>Public or "unlisted" YouTube link</td><td>Anyone with the link can open the video; the link is easily forwarded to other groups, even to people not on the course</td></tr>
    <tr><td>Google Drive folder</td><td>Better, but giving each group separate access and removing students who leave is done by hand and is often forgotten</td></tr>
    <tr><td>Section tied to the group</td><td>Material is visible only to that group's students; when a student leaves the group, their access closes too</td></tr>
  </tbody>
</table>
<p>The rule: each group has its own section, recordings and materials are named with the lesson date ("12.11 — Quadratic equations"), and access is open only to that group's students. This protects both students' privacy and your work.</p>

<h2>After an Online Lesson: Homework</h2>
<p>Typing the homework into the chat after an online lesson is the worst option: the message scrolls away and "I didn't see it" becomes an excuse. Set homework in the group's own section with a deadline. The student hands in their answer there, and you check it and mark it. Checks made up of closed questions are easier to give as a timed online test — the result is calculated automatically. More on this: <a href="/blog-details/how-to-create-online-tests-for-teachers-2027">how to create online tests</a>.</p>

<h2>Attendance in Online Lessons</h2>
<p>"Was present" is vaguer online: a student has joined but their camera is off and they don't answer; or they joined 20 minutes late. Decide in advance:</p>
<ul>
  <li>Record attendance not at the very start but after the first 10 minutes.</li>
  <li>Mark cases such as "late" and "present but passive" separately.</li>
  <li>Record technical problems (power or internet cuts) separately — you will need this in a payment dispute.</li>
</ul>
<p>Record attendance as soon as the lesson ends; do not leave it for later. If a parent can see in their own portal whether their child joined the online lesson, there are fewer questions too. On working with parents: <a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">parent reports and payment tracking</a>.</p>

<h2>Payment for Missed Online Lessons</h2>
<p>Missing a lesson is easier online, so the rule should be written down in advance. Commonly used options:</p>
<table>
  <thead>
    <tr><th>Case</th><th>Possible rule</th></tr>
  </thead>
  <tbody>
    <tr><td>The student did not join without notice</td><td>The lesson counts as held; the student watches the recording and materials</td></tr>
    <tr><td>The student gave notice in advance</td><td>For one-to-one lessons it is rescheduled; in a group lesson the student watches the recording</td></tr>
    <tr><td>A technical problem on the teacher's side</td><td>The lesson is made up or deducted from the fee</td></tr>
    <tr><td>A technical problem on the student's side</td><td>The recording and materials are provided, the lesson counts as held</td></tr>
  </tbody>
</table>
<p>Whichever rule you choose, announce it at enrolment and track each student's payment status in one place.</p>

<h2>Where Does Kursometr Fit in Online Teaching?</h2>
<p>Let's be clear: <strong>Kursometr is not a video call tool.</strong> The lesson itself takes place in Zoom, Google Meet or Teams. Kursometr brings together all the organisation around the lesson — work that is otherwise split between WhatsApp, Excel and a notebook:</p>
<table>
  <thead>
    <tr><th>Task</th><th>Where</th></tr>
  </thead>
  <tbody>
    <tr><td>Video call, screen sharing, recording the lesson</td><td>Zoom, Google Meet or Teams</td></tr>
    <tr><td>Subjects, groups, weekly schedule</td><td>Kursometr</td></tr>
    <tr><td>Attendance</td><td>Kursometr</td></tr>
    <tr><td>Lesson recordings and materials</td><td>Kursometr — visible only to that group's students</td></tr>
    <tr><td>Timed tests (general and interim)</td><td>Kursometr — open and close at the time the teacher sets, closed questions marked automatically</td></tr>
    <tr><td>Homework</td><td>Kursometr — assigned and checked</td></tr>
    <tr><td>Payments</td><td>Kursometr — student payment tracking</td></tr>
    <tr><td>Parents</td><td>Kursometr — parent portal with attendance, grades and test results</td></tr>
  </tbody>
</table>
<p>We have compared Kursometr with Google Classroom and WhatsApp in detail: <a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr</a>.</p>

<h2>How to Set Up Online Lessons in Kursometr: Step by Step</h2>
<ol>
  <li><strong>Open your page.</strong> Sign in at <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> with your Google account and create your own address in a minute: <em>yourname.kursometr.com</em>. Teacher sign-up is free.</li>
  <li><strong>Create subjects and groups.</strong> Put the format in the group name: "Maths 9 — online, Mon/Wed 19:00".</li>
  <li><strong>Set up the weekly schedule</strong> and add students to the group via an invitation link.</li>
  <li><strong>Teach the lesson in Zoom or Meet</strong> and record attendance in Kursometr — from a phone browser too.</li>
  <li><strong>After the lesson, upload the recording and materials.</strong> Only that group's students see them.</li>
  <li><strong>Assign and check homework.</strong></li>
  <li><strong>Run checks as timed tests.</strong> You can upload a ready test collection as a PDF to add its questions to the question bank; the result is ready as soon as the test ends.</li>
  <li><strong>Record payments</strong> — who has paid is visible in one place.</li>
  <li><strong>Connect parents</strong> — they see the child's attendance, grades and test results in their own portal.</li>
  <li><strong>Add an assistant teacher</strong> — with a mentor account, for example for an assistant who checks homework.</li>
</ol>
<p>A general guide for teachers working on their own: <a href="/blog-details/tutor-class-management-software-2026">class management software for tutors</a>. For language courses: <a href="/blog-details/language-course-management-software-2027">language course management software</a>. If you want to sell a pre-recorded video course rather than teach live: <a href="/blog-details/how-to-create-and-sell-online-course-2026">how to create and sell an online course</a>.</p>

<h2>Checklist</h2>
<ul>
  <li>☐ One video tool is chosen for all groups and its free plan limit is checked</li>
  <li>☐ A headset with a microphone, a camera at eye level and light from the front are ready</li>
  <li>☐ There is a backup internet option (mobile data)</li>
  <li>☐ The lesson is split into warm-up, explanation, practice and check</li>
  <li>☐ The camera rule is explained in the first lesson and an alternative is offered</li>
  <li>☐ Written consent to recording has been obtained from students or parents</li>
  <li>☐ Recordings and materials are kept in a section open only to the group</li>
  <li>☐ Homework is set in the group's section with a deadline</li>
  <li>☐ Attendance is recorded after every lesson</li>
  <li>☐ The payment rule for missed online lessons is announced in writing</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Zoom or Google Meet better for online lessons?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Both work. Google Meet runs in the browser without installing anything, and on the free plan one-to-one calls have no time limit. Zoom's breakout rooms and screen sharing are more flexible. Both free plans limit the length of group meetings, so check the current terms on the official sites and use one tool for all your groups.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do I need permission to record an online lesson?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A video recording shows the student's face and voice, so it counts as personal data. Good practice is to get written consent in advance from the student, and from the parent for minors, and to explain the purpose of the recording and who will see it. In Azerbaijan this area is regulated by the Law "On Personal Data".</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can lesson recordings be shared with students?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instead of a public YouTube link or a WhatsApp group, use a section open only to that group's students. In Kursometr, lesson recordings and materials are uploaded and are visible only to the students of that group.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can I encourage students to turn their cameras on?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Explain the rule in the first lesson, address students by name and give short tasks often. Let a student with a weak connection or difficult conditions at home take part by microphone or chat, allow virtual backgrounds and do not comment on their room.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How should missed online lessons be paid for?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The teacher decides, but the rule should be written down in advance. Often a lesson missed without notice counts as held and the student watches the recording, while a technical problem on the teacher's side means the lesson is made up. Recording attendance and payments in one place prevents disputes.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does Kursometr have video calls?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No, Kursometr is not a video call tool — the lesson takes place in Zoom, Google Meet or Teams. Kursometr keeps groups, the schedule, attendance, lesson recordings and materials, timed tests, homework, payments and the parent portal in one place. Teacher sign-up is free.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/tutor-class-management-software-2026">Class management software for tutors</a></li>
  <li><a href="/blog-details/google-classroom-vs-whatsapp-vs-excel-vs-kursometr-2027">Google Classroom vs WhatsApp vs Excel vs Kursometr: comparison</a></li>
  <li><a href="/blog-details/how-to-create-online-tests-for-teachers-2027">How to create online tests: timed mock exams and automatic results</a></li>
  <li><a href="/blog-details/tutor-parent-reports-and-payment-tracking-2027">Parent reports and payment tracking</a></li>
  <li><a href="/blog-details/language-course-management-software-2027">Language course management software</a></li>
  <li><a href="/blog-details/how-to-create-and-sell-online-course-2026">How to create and sell an online course</a></li>
  <li><a href="/blog-details/how-tutors-should-set-lesson-prices-2027">How tutors should set lesson prices</a></li>
  <li><a href="/blog-details/homework-system-for-teachers-2027">Homework system for teachers</a></li>
  <li><a href="/blog-details/management-software-for-it-and-coding-courses-2027">Management software for IT and coding courses</a></li>
</ul>

<h2>Conclusion</h2>
<p>A good online lesson rests on three things: clear sound and video, a well-thought-out lesson structure and the organisation after the lesson. Zoom or Meet is enough for the video call. But when recordings, materials, homework, attendance and payments are scattered between WhatsApp and Excel, the teacher's time goes on searching rather than teaching. Keeping them in one place protects students' privacy and lets parents see everything clearly.</p>
<p><strong>Organise your online lessons today: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — teacher sign-up is free. More details: <a href="/mehsullar/kursometr">about Kursometr</a>. If your course centre needs a custom system, <a href="/contact">contact us</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Онлайн-уроки давно перестали быть временным решением времён пандемии — это повседневный формат работы учителей и репетиторов. Ученик из региона занимается с преподавателем из Баку, семьи за границей находят репетиторов по азербайджанскому языку или математике, а зимой очные группы часто переходят в онлайн. Но «скинуть ссылку на Zoom в WhatsApp» — ещё не значит организовать онлайн-урок. Звук плохой, ученики выключают камеры, запись урока где-то теряется, непонятно, кто сделал домашнее задание, а оплата за пропущенный урок превращается в спор.</p>
<p>В этой статье разбираем, как выстроить онлайн-урок от начала до конца: выбор видеосервиса, минимальное оборудование, структура урока, вовлечённость учеников, запись урока и согласие, безопасное хранение записей и материалов, домашние задания, посещаемость и оплата. В конце показываем, как собрать всё это в Kursometr.</p>

<h2>Короткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Какая программа нужна для онлайн-уроков?</td><td>Для видеозвонка — Zoom, Google Meet или Microsoft Teams; для групп, расписания, посещаемости, материалов и оплаты — отдельная платформа управления</td></tr>
    <tr><td>Какое оборудование нужно как минимум?</td><td>Гарнитура или отдельный микрофон, камера, свет на лицо, стабильный интернет; для математики очень помогает графический планшет</td></tr>
    <tr><td>Можно ли записывать урок?</td><td>Можно, но заранее получите согласие учеников, а для несовершеннолетних — родителей</td></tr>
    <tr><td>Где хранить записи уроков?</td><td>Не по открытой ссылке на YouTube и не в группе WhatsApp, а в разделе, который видят только ученики этой группы</td></tr>
    <tr><td>Как вести всё в одном месте?</td><td>Видеозвонок проходит в Zoom или Meet; группы, расписание, посещаемость, записи, тесты, задания и оплата — в <a href="/mehsullar/kursometr">Kursometr</a></td></tr>
  </tbody>
</table>

<h2>Выбор видеосервиса: Zoom, Google Meet и Microsoft Teams</h2>
<p>Все три популярных сервиса подходят для онлайн-уроков. Разница в основном в ограничениях бесплатного тарифа, в том, как подключается ученик, и в том, к какой экосистеме привык преподаватель. Ограничения ниже взяты с официальных страниц компаний (ноябрь 2026), но условия время от времени меняются — перед выбором проверьте актуальные условия на <a href="https://zoom.us/pricing" rel="noopener" target="_blank">zoom.us</a>, <a href="https://workspace.google.com/products/meet/" rel="noopener" target="_blank">Google Meet</a> и <a href="https://www.microsoft.com/microsoft-teams/free" rel="noopener" target="_blank">Microsoft Teams</a>.</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>Zoom</th><th>Google Meet</th><th>Microsoft Teams</th></tr>
  </thead>
  <tbody>
    <tr><td>Бесплатный тариф</td><td>Basic: 40 минут на встречу, до 100 участников</td><td>Личный аккаунт Google: до 100 участников, 60 минут на встречу; для звонков один на один ограничения по времени нет</td><td>Групповые встречи до 100 человек и до 60 минут</td></tr>
    <tr><td>Как подключается ученик</td><td>Приложение или браузер, по ссылке</td><td>Из браузера, по ссылке; самый простой вариант для тех, у кого есть аккаунт Google</td><td>Приложение или браузер, по ссылке</td></tr>
    <tr><td>Сильная сторона для урока</td><td>Сессионные залы (breakout rooms), гибкая демонстрация экрана, доска</td><td>Работает без установки, привычная среда вместе с Google Календарём и Classroom</td><td>Знаком школам и компаниям, которые используют Microsoft 365</td></tr>
    <tr><td>На что обратить внимание</td><td>40 минут на бесплатном тарифе мало для полного урока</td><td>Групповой урок на бесплатном тарифе ограничен 60 минутами</td><td>Групповая встреча на бесплатном тарифе ограничена 60 минутами</td></tr>
  </tbody>
</table>
<p>Практический совет: для индивидуальных уроков удобны звонки один на один в Google Meet. Для групповых уроков по 60–90 минут бесплатных тарифов обычно не хватает — либо переходите на платный тариф, либо делите урок под ограничение. Главное — выберите один сервис и используйте его во всех группах. Разные ссылки и разные программы на каждом уроке путают учеников.</p>

<h2>Оборудование: минимальный набор</h2>
<p>На онлайн-уроке ученик в основном вас <strong>слышит</strong>. Поэтому первая инвестиция — не камера, а звук.</p>
<ul>
  <li><strong>Микрофон:</strong> встроенный микрофон ноутбука записывает и эхо комнаты. Гарнитура с микрофоном или простой USB-микрофон делают звук заметно чище и убирают эхо.</li>
  <li><strong>Камера:</strong> камеры ноутбука достаточно, но поднимите её на уровень глаз. Съёмка снизу утомляет.</li>
  <li><strong>Свет:</strong> окно должно быть перед вами, а не за спиной. Для вечерних уроков настольная лампа или небольшая кольцевая лампа хорошо освещают лицо.</li>
  <li><strong>Интернет:</strong> по возможности подключайтесь по кабелю, по Wi-Fi — садитесь ближе к роутеру. Во время урока остановите дома загрузку больших файлов. Держите мобильный интернет на телефоне как запасной вариант.</li>
  <li><strong>Второй экран:</strong> видеть учеников на одном экране, а материал урока на другом — заметно удобнее. Если второго монитора нет, подойдёт планшет или второй ноутбук.</li>
  <li><strong>Графический планшет:</strong> для учителей математики, физики и химии почти обязателен. Писать формулы мышкой трудно; недорогой графический планшет или планшет со стилусом заменяет доску.</li>
</ul>

<h2>Структура онлайн-урока</h2>
<p>На онлайн-уроке внимание рассеивается быстрее, чем в классе. Поэтому делите урок на короткие и понятные части:</p>
<table>
  <thead>
    <tr><th>Этап</th><th>Примерное время (на уроке 60 минут)</th><th>Что делаем</th></tr>
  </thead>
  <tbody>
    <tr><td>Разминка</td><td>5 минут</td><td>Приветствие, проверка звука и изображения, 1–2 быстрых вопроса по прошлому уроку</td></tr>
    <tr><td>Объяснение</td><td>15–20 минут</td><td>Новая тема через демонстрацию экрана или графический планшет; вопрос ученикам каждые 5–7 минут</td></tr>
    <tr><td>Практика</td><td>20–25 минут</td><td>Ученики решают задачи, работают в парах в сессионных залах или «выходят к доске»</td></tr>
    <tr><td>Проверка</td><td>10 минут</td><td>Короткий тест или устный опрос, объяснение домашнего задания, время следующего урока</td></tr>
  </tbody>
</table>
<p>Отправьте материал (слайды, PDF, список задач) группе до урока, чтобы ученик, даже если плохо видит экран, мог открыть его на своём устройстве и следить.</p>

<h2>Вовлечённость и вопрос камер</h2>
<p>Выключенные камеры — самая частая жалоба на онлайн-уроках. Но принуждение часто даёт обратный эффект. У ученика дома может быть младший брат, шум, стеснительность или слабый интернет. Поэтому установите правило заранее и уважительно:</p>
<ul>
  <li><strong>Объясните правило на первом уроке:</strong> «Во время объяснения и практики камера включена; если есть проблема, напишите мне отдельно».</li>
  <li><strong>Дайте альтернативу камере:</strong> если интернет слабый, ученик может активно участвовать через микрофон или чат.</li>
  <li><strong>Обращайтесь по имени:</strong> вместо «Кто ответит?» — «Лейла, как ты думаешь?». Это держит всех в тонусе.</li>
  <li><strong>Чаще давайте короткие задания:</strong> ответ в чате, голосование в опросе, функция «поднять руку».</li>
  <li><strong>Уважайте приватность:</strong> не комментируйте комнату ученика и членов семьи; разрешайте виртуальный фон; не делайте скриншоты и не показывайте их другим.</li>
</ul>

<h2>Запись урока и согласие</h2>
<p>Запись урока очень полезна для пропустившего ученика и для повторения. Но видеозапись показывает лицо, голос, имя ученика, а иногда и его дом — это персональные данные. Хорошая практика выглядит так:</p>
<ol>
  <li><strong>Заранее получите согласие.</strong> При записи на курс письменно сообщите ученику (для несовершеннолетних — родителю), что уроки записываются, для чего используется запись, кто её увидит и сколько она хранится, и получите согласие.</li>
  <li><strong>Предупреждайте каждый раз.</strong> Перед началом записи скажите: «Я записываю урок». В Zoom, Meet и Teams участники обычно видят уведомление о начале записи.</li>
  <li><strong>Дайте возможность отказаться.</strong> Ученик, который не хочет быть в кадре, может выключить камеру или участвовать во время записи только через чат.</li>
  <li><strong>Не используйте не по назначению.</strong> Не публикуйте запись, где видны ученики, в соцсетях для рекламы без их (или родителей) отдельного согласия.</li>
</ol>
<p>В Азербайджане сбор и использование персональных данных регулируются Законом «О персональных данных». Общий принцип прост: собирайте данные с согласия, для понятной цели и показывайте их только тем, кому они нужны. Если возникает конкретный юридический вопрос, проконсультируйтесь с юристом.</p>

<h2>Где хранить записи и материалы?</h2>
<p>Два самых распространённых решения — группа в WhatsApp и открытая ссылка на YouTube — выглядят удобными, но создают больше всего проблем.</p>
<table>
  <thead>
    <tr><th>Способ</th><th>Проблема</th></tr>
  </thead>
  <tbody>
    <tr><td>Группа в WhatsApp</td><td>Файлы теряются среди сообщений, новый ученик не видит старых материалов, память телефона заполняется; ученик, вышедший из группы, сохраняет скачанные файлы</td></tr>
    <tr><td>Открытая или «доступ по ссылке» на YouTube</td><td>Видео открывает любой, у кого есть ссылка; ссылку легко переслать в другие группы и даже тем, кто не учится на курсе</td></tr>
    <tr><td>Папка Google Drive</td><td>Лучше, но выдавать доступ каждой группе и удалять ушедших учеников приходится вручную, и об этом часто забывают</td></tr>
    <tr><td>Раздел, привязанный к группе</td><td>Материал видят только ученики этой группы; когда ученик выходит из группы, доступ тоже закрывается</td></tr>
  </tbody>
</table>
<p>Правило такое: у каждой группы свой раздел, записи и материалы называются по дате урока («12.11 — Квадратные уравнения»), а доступ открыт только ученикам этой группы. Так защищены и приватность учеников, и ваш труд.</p>

<h2>После онлайн-урока: домашнее задание</h2>
<p>Писать задание в чат после онлайн-урока — худший вариант: сообщение уходит вверх, и появляется отговорка «я не видел». Давайте задание в разделе группы со сроком сдачи. Ученик сдаёт ответ там же, а вы проверяете и отмечаете. Проверки из закрытых вопросов удобнее давать в виде онлайн-теста с таймером — результат считается автоматически. Подробнее: <a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">как создать онлайн-тест</a>.</p>

<h2>Посещаемость онлайн-уроков</h2>
<p>Понятие «был на уроке» онлайн размыто: ученик подключился, но камера выключена и он не отвечает; или опоздал на 20 минут. Решите заранее:</p>
<ul>
  <li>Отмечайте посещаемость не в самом начале, а после первых 10 минут.</li>
  <li>Отдельно отмечайте случаи «опоздал» и «присутствовал, но пассивно».</li>
  <li>Отдельно фиксируйте технические проблемы (отключение света или интернета) — это понадобится при споре об оплате.</li>
</ul>
<p>Отмечайте посещаемость сразу после урока, не откладывайте. Если родитель видит в своём кабинете, подключался ли ребёнок к онлайн-уроку, вопросов становится меньше. О работе с родителями: <a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">отчёты родителям и учёт оплат</a>.</p>

<h2>Оплата пропущенных онлайн-уроков</h2>
<p>Пропустить онлайн-урок проще, поэтому правило должно быть заранее записано. Часто используемые варианты:</p>
<table>
  <thead>
    <tr><th>Ситуация</th><th>Возможное правило</th></tr>
  </thead>
  <tbody>
    <tr><td>Ученик не подключился без предупреждения</td><td>Урок считается проведённым; ученик смотрит запись и материалы</td></tr>
    <tr><td>Ученик предупредил заранее</td><td>Индивидуальный урок переносится; в группе ученик смотрит запись</td></tr>
    <tr><td>Техническая проблема у преподавателя</td><td>Урок отрабатывается или вычитается из оплаты</td></tr>
    <tr><td>Техническая проблема у ученика</td><td>Даются запись и материалы, урок считается проведённым</td></tr>
  </tbody>
</table>
<p>Какое бы правило вы ни выбрали, объявите его при записи на курс и отслеживайте оплату каждого ученика в одном месте.</p>

<h2>Где место Kursometr в онлайн-обучении?</h2>
<p>Скажем прямо: <strong>Kursometr — не сервис видеозвонков.</strong> Сам урок проходит в Zoom, Google Meet или Teams. А Kursometr собирает в одном месте всю организацию вокруг урока — работу, которая иначе разбросана между WhatsApp, Excel и тетрадью:</p>
<table>
  <thead>
    <tr><th>Задача</th><th>Где</th></tr>
  </thead>
  <tbody>
    <tr><td>Видеозвонок, демонстрация экрана, запись урока</td><td>Zoom, Google Meet или Teams</td></tr>
    <tr><td>Предметы, группы, недельное расписание</td><td>Kursometr</td></tr>
    <tr><td>Посещаемость</td><td>Kursometr</td></tr>
    <tr><td>Записи уроков и материалы</td><td>Kursometr — видны только ученикам этой группы</td></tr>
    <tr><td>Тесты с таймером (общие и промежуточные)</td><td>Kursometr — открываются и закрываются в заданное учителем время, закрытые вопросы проверяются автоматически</td></tr>
    <tr><td>Домашние задания</td><td>Kursometr — выдаются и проверяются</td></tr>
    <tr><td>Оплата</td><td>Kursometr — учёт оплат учеников</td></tr>
    <tr><td>Родители</td><td>Kursometr — кабинет родителя с посещаемостью, оценками и результатами тестов</td></tr>
  </tbody>
</table>
<p>Подробное сравнение Kursometr с Google Classroom и WhatsApp: <a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr</a>.</p>

<h2>Как настроить онлайн-уроки в Kursometr: пошагово</h2>
<ol>
  <li><strong>Откройте свою страницу.</strong> Войдите на <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a> через аккаунт Google и за минуту создайте свой адрес: <em>vashe-imya.kursometr.com</em>. Регистрация учителя бесплатна.</li>
  <li><strong>Создайте предметы и группы.</strong> Укажите формат в названии группы: «Математика 9 — онлайн, Пн/Ср 19:00».</li>
  <li><strong>Настройте недельное расписание</strong> и добавьте учеников в группу по ссылке-приглашению.</li>
  <li><strong>Проведите урок в Zoom или Meet</strong>, а посещаемость отметьте в Kursometr — можно и из браузера телефона.</li>
  <li><strong>После урока загрузите запись и материалы.</strong> Их видят только ученики этой группы.</li>
  <li><strong>Выдайте и проверьте домашнее задание.</strong></li>
  <li><strong>Проводите проверку в виде теста с таймером.</strong> Можно загрузить готовый сборник тестов в PDF, чтобы добавить вопросы в банк вопросов; результат готов сразу после окончания теста.</li>
  <li><strong>Отмечайте оплату</strong> — кто заплатил, видно в одном месте.</li>
  <li><strong>Подключите родителей</strong> — в своём кабинете они видят посещаемость, оценки и результаты тестов ребёнка.</li>
  <li><strong>Добавьте помощника</strong> — через аккаунт ментора, например для ассистента, который проверяет задания.</li>
</ol>
<p>Общее руководство для преподавателей, работающих самостоятельно: <a href="/blog-details/programma-dlya-repetitorov-2026">программа для репетиторов</a>. Для языковых курсов: <a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">программа для языковых курсов</a>. Если вы хотите продавать заранее записанный видеокурс, а не вести живые уроки: <a href="/blog-details/kak-sozdat-i-prodavat-onlajn-kurs-2026">как создать и продавать онлайн-курс</a>.</p>

<h2>Чек-лист</h2>
<ul>
  <li>☐ Для всех групп выбран один видеосервис, ограничения бесплатного тарифа проверены</li>
  <li>☐ Готовы гарнитура с микрофоном, камера на уровне глаз и свет спереди</li>
  <li>☐ Есть запасной интернет (мобильный)</li>
  <li>☐ Урок разделён на разминку, объяснение, практику и проверку</li>
  <li>☐ Правило о камерах объяснено на первом уроке, предложена альтернатива</li>
  <li>☐ Получено письменное согласие учеников или родителей на запись</li>
  <li>☐ Записи и материалы хранятся в разделе, открытом только группе</li>
  <li>☐ Домашнее задание выдаётся в разделе группы со сроком сдачи</li>
  <li>☐ Посещаемость отмечается после каждого урока</li>
  <li>☐ Правило оплаты пропущенных онлайн-уроков объявлено письменно</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что лучше для онлайн-уроков: Zoom или Google Meet?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Подходят оба. Google Meet работает в браузере без установки, а на бесплатном тарифе у звонков один на один нет ограничения по времени. В Zoom гибче сессионные залы и демонстрация экрана. На бесплатных тарифах обоих сервисов длительность групповых встреч ограничена, поэтому проверяйте актуальные условия на официальных сайтах и используйте один сервис во всех группах.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли разрешение, чтобы записывать онлайн-урок?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Видеозапись показывает лицо и голос ученика, поэтому считается персональными данными. Хорошая практика — заранее получить письменное согласие ученика, а для несовершеннолетних — родителя, и объяснить цель записи и кто её увидит. В Азербайджане эта сфера регулируется Законом «О персональных данных».</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как делиться записями уроков с учениками?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Вместо открытой ссылки на YouTube или группы в WhatsApp используйте раздел, доступный только ученикам этой группы. В Kursometr записи уроков и материалы загружаются и видны только ученикам этой группы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как мотивировать учеников включать камеру?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Объясните правило на первом уроке, обращайтесь к ученикам по имени и чаще давайте короткие задания. Ученику со слабым интернетом или неудобными условиями дома разрешите участвовать через микрофон или чат, разрешите виртуальный фон и не комментируйте его комнату.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как оплачивать пропущенные онлайн-уроки?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Это решает преподаватель, но правило должно быть заранее записано. Часто урок, пропущенный без предупреждения, считается проведённым и ученик смотрит запись, а при технической проблеме у преподавателя урок отрабатывается. Учёт посещаемости и оплаты в одном месте предотвращает споры.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Есть ли в Kursometr видеозвонки?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет, Kursometr — не сервис видеозвонков: урок проходит в Zoom, Google Meet или Teams. Kursometr хранит в одном месте группы, расписание, посещаемость, записи уроков и материалы, тесты с таймером, домашние задания, оплату и кабинет родителя. Регистрация учителя бесплатна.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-repetitorov-2026">Программа для репетиторов</a></li>
  <li><a href="/blog-details/google-classroom-whatsapp-excel-ili-kursometr-2027">Google Classroom, WhatsApp, Excel или Kursometr: сравнение</a></li>
  <li><a href="/blog-details/kak-sozdat-onlajn-test-dlya-uchitelya-2027">Как создать онлайн-тест: пробный экзамен с таймером и автопроверкой</a></li>
  <li><a href="/blog-details/repetitor-otchety-roditelyam-i-uchet-oplat-2027">Отчёты родителям и учёт оплат</a></li>
  <li><a href="/blog-details/programma-dlya-yazykovyh-kursov-2027">Программа для языковых курсов</a></li>
  <li><a href="/blog-details/kak-sozdat-i-prodavat-onlajn-kurs-2026">Как создать и продавать онлайн-курс</a></li>
  <li><a href="/blog-details/kak-repetitoru-ustanovit-cenu-za-urok-2027">Как репетитору установить цену за урок</a></li>
  <li><a href="/blog-details/sistema-domashnih-zadanij-dlya-uchitelya-2027">Система домашних заданий для учителя</a></li>
  <li><a href="/blog-details/programma-dlya-it-kursov-i-kursov-programmirovaniya-2027">Программа для IT-курсов и курсов программирования</a></li>
</ul>

<h2>Итог</h2>
<p>Хороший онлайн-урок держится на трёх вещах: чистый звук и изображение, продуманная структура урока и организация после урока. Для видеозвонка достаточно Zoom или Meet. Но когда записи, материалы, задания, посещаемость и оплата разбросаны между WhatsApp и Excel, время преподавателя уходит на поиски, а не на обучение. Если вести всё в одном месте, защищена приватность учеников, а родители видят всё прозрачно.</p>
<p><strong>Организуйте свои онлайн-уроки уже сегодня: <a href="https://kursometr.com/" rel="noopener" target="_blank">kursometr.com</a></strong> — регистрация учителя бесплатна. Подробнее: <a href="/mehsullar/kursometr">о Kursometr</a>. Если вашему учебному центру нужна индивидуальная система, <a href="/kontakty">свяжитесь с нами</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'onlayn-ders-nece-teskil-olunur-2027'],
            [
                'slug_en' => 'how-to-run-online-lessons-2027',
                'slug_ru' => 'kak-provodit-onlajn-uroki-2027',

                'title_az' => 'Onlayn Dərs Necə Təşkil Olunur: Zoom, Google Meet, Dərs Yazıları və Materialların Paylaşılması (2027)',
                'title_en' => 'How to Run Online Lessons: Zoom, Google Meet, Lesson Recordings and Sharing Materials (2027)',
                'title_ru' => 'Как проводить онлайн-уроки: Zoom, Google Meet, записи уроков и обмен материалами (2027)',

                'review_az' => 'Müəllim və repetitorlar üçün onlayn dərs bələdçisi: Zoom, Google Meet və Teams müqayisəsi, avadanlıq, dərsin strukturu, kamera və aktivlik, dərsin yazılması və razılıq, yazıların yalnız qrupa açıq saxlanması, ev tapşırığı, davamiyyət, buraxılan dərslərin ödənişi və Kursometr-də qurulum.',
                'review_en' => 'An online lesson guide for teachers and tutors: Zoom vs Google Meet vs Teams, equipment, lesson structure, cameras and engagement, recording and consent, keeping recordings visible only to the group, homework, attendance, payment for missed lessons and setup in Kursometr.',
                'review_ru' => 'Руководство по онлайн-урокам для учителей и репетиторов: сравнение Zoom, Google Meet и Teams, оборудование, структура урока, камеры и вовлечённость, запись и согласие, хранение записей только для группы, домашние задания, посещаемость, оплата пропущенных уроков и настройка в Kursometr.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '4 Noyabr 2026',
                'date_en' => 'November 4, 2026',
                'date_ru' => '4 Ноября 2026',

                'photo'    => 'cover-online-lesson-az.png',
                'photo_en' => 'cover-online-lesson-en.png',
                'photo_ru' => 'cover-online-lesson-ru.png',

                'meta_title_az' => 'Onlayn Dərs Necə Təşkil Olunur 2027 | RS Code',
                'meta_title_en' => 'How to Run Online Lessons 2027 | RS Code',
                'meta_title_ru' => 'Как проводить онлайн-уроки 2027 | RS Code',

                'meta_description_az' => 'Onlayn dərs bələdçisi: Zoom, Google Meet və Teams müqayisəsi, avadanlıq, dərs strukturu, dərsin yazılması və razılıq, yazıların yalnız qrupa açıq saxlanması, davamiyyət və ödəniş.',
                'meta_description_en' => 'Online lesson guide: Zoom vs Google Meet vs Teams, equipment, lesson structure, recording and consent, keeping recordings private to the group, attendance and payments.',
                'meta_description_ru' => 'Как проводить онлайн-уроки: Zoom, Google Meet и Teams, оборудование, структура урока, запись и согласие, записи только для группы, посещаемость и оплата.',

                'meta_keywords_az' => 'onlayn dərs, onlayn dərs necə keçirilir, zoom dərs, google meet dərs, dərs yazısı, onlayn repetitor, müəllim, kursometr, 2027',
                'meta_keywords_en' => 'online lessons, how to teach online, zoom lessons, google meet lessons, lesson recordings, online tutor, teacher, kursometr, 2027',
                'meta_keywords_ru' => 'онлайн-уроки, как проводить онлайн-урок, уроки в zoom, google meet для уроков, запись урока, онлайн-репетитор, учитель, kursometr, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
