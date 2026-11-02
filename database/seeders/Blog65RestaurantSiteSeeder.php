<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #65 — Restoran, kafe və şirniyyat evi (bakery) üçün sayt 2027.
 * Qiymət/müddət #17 (veb-sayt-qiymeti-azerbaycan-2026) ilə uyğundur: landing 300–700, vizit kartı 500–1 200,
 * korporativ 1 200–3 500, onlayn sifariş 2 000–6 000, fərdi sistem 5 000+ AZN (təxmini).
 * QR menyu ayrıca yazıdadır (#41 qr-menyu-kafe-restoran-2026) — burada yalnız link verilir.
 * Çatdırılma aqreqatorlarının adı və komissiya faizləri göstərilmir; qida biznesi lisenziyası və vergi
 * qaydaları barədə konkret iddia yoxdur — yalnız ümumi tövsiyə.
 */
class Blog65RestaurantSiteSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Axşam dostları ilə harada şam etmək barədə düşünən insan nə edir? Telefonu götürür və Google-a "restoran Bakı", "kafe Nizami küçəsi", "ad günü üçün restoran Yasamal" və ya "şadlıq sarayı Xətai" yazır. Xəritədə bir neçə məkan görür, fotolara baxır, menyunu və qiymətləri yoxlamaq istəyir, sonra ya zəng edir, ya da yazır. Bu qərarın böyük hissəsi restoranın saytında və Google kartında verilir.</p>
<p>Bu yazıda 2027-ci il üçün restoran, kafe və şirniyyat evi saytında nələrin olmalı olduğunu izah edirik: qiymətli HTML menyu, fotolar, masa rezervasiyası, öz saytınızdan onlayn sifariş və çatdırılma, WhatsApp sifarişi, Google Maps və Google Business Profile, tədbir və banket səhifəsi, AZ/EN/RU versiyalar, iş saatları, mobil sürət və yerli SEO. Restoranda masaüstü QR menyu barədə ayrıca yazımız var — burada onu təkrarlamırıq.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Hansı bölmələr lazımdır?</td><td>Ana səhifə, qiymətli HTML menyu, foto qalereya, masa rezervasiyası, tədbir və banket, onlayn sifariş/çatdırılma (lazım olarsa), əlaqə və xəritə, iş saatları, FAQ</td></tr>
    <tr><td>Qiymət</td><td>Menyu və rezervasiya forması olan sayt təxminən 500 – 3 500 AZN; öz onlayn sifariş sistemi ilə 2 000 – 6 000 AZN (bazar təxmini)</td></tr>
    <tr><td>Müddət</td><td>Menyu saytı adətən 2–4 həftə, onlayn sifarişli sayt 4–8 həftə; menyu, qiymətlər və fotoların hazır olması ən çox təsir edən amildir</td></tr>
    <tr><td>Dil</td><td>AZ əsas; RU yerli rusdilli qonaqlar üçün; EN turistlər və xarici qonaqlar üçün</td></tr>
    <tr><td>SEO üçün əsas</td><td>Google Business Profile, HTML menyu, rayon və tədbir səhifələri, Restaurant / Menu / FAQPage schema, sürətli mobil sayt</td></tr>
  </tbody>
</table>

<h2>Qonaq Restoranı Necə Seçir?</h2>
<p>Restoran axtarışları demək olar ki, həmişə <strong>yerli</strong> olur. İnsan "ən yaxşı restoran" yazsa belə, Google ona yaxınlıqdakı məkanları göstərir. Tipik sorğular bunlardır:</p>
<ul>
  <li><strong>Məkan + şəhər/rayon:</strong> "restoran Bakı", "kafe Nərimanov", "səhər yeməyi İçərişəhər", "tort sifarişi Yasamal";</li>
  <li><strong>Mətbəx və ya yemək:</strong> "Azərbaycan mətbəxi Bakı", "plov restoranı", "pizza çatdırılması 28 May";</li>
  <li><strong>Tədbir:</strong> "şadlıq sarayı", "ad günü üçün restoran", "korporativ banket zalı", "nişan üçün məkan";</li>
  <li><strong>"Yaxınlıqda" sorğuları:</strong> "kafe yaxınlıqda", "indi açıq restoran" — burada Google Maps və iş saatları həlledicidir.</li>
</ul>
<p>Qonaq bu sorğuların çoxunu telefondan, çox vaxt yolda edir. Ona görə restoran saytı ilk ekranda dörd şeyi göstərməlidir: <strong>nə təklif edirsiniz, harada yerləşirsiniz, indi açıqsınızmı və necə masa sifariş etmək və ya yemək sifariş vermək olar</strong>.</p>

<h2>Restoran Saytında Hansı Səhifələr Olmalıdır?</h2>
<table>
  <thead>
    <tr><th>Səhifə</th><th>Nə olmalıdır</th><th>Niyə vacibdir</th></tr>
  </thead>
  <tbody>
    <tr><td>Ana səhifə</td><td>Məkanın real fotosu, mətbəx növü, "Masa sifariş et" və "Menyu" düymələri, telefon/WhatsApp, ünvan, iş saatları</td><td>Qonaq bir neçə saniyədə qərar verir</td></tr>
    <tr><td>Menyu</td><td>Kateqoriyalar, yeməyin adı, qısa tərkibi, porsiya, qiymət, foto; PDF yox, HTML</td><td>Ən çox baxılan səhifə; Google menyunu oxuya bilməlidir</td></tr>
    <tr><td>Qalereya</td><td>Zal, terras, yeməklər, tədbirlər — real və keyfiyyətli fotolar</td><td>Atmosfer fotodan seçilir</td></tr>
    <tr><td>Masa rezervasiyası</td><td>Tarix, saat, nəfər sayı, ad, telefon, qeyd (ad günü, uşaq stulu və s.)</td><td>Gecə də müraciət qəbul olunur, telefon xətti yüklənmir</td></tr>
    <tr><td>Tədbir və banket</td><td>Zalların tutumu, foto, banket menyusu nümunəsi, təxmini qiymət aralığı, müraciət forması</td><td>Ən gəlirli sifarişlər çox vaxt buradan gəlir</td></tr>
    <tr><td>Onlayn sifariş</td><td>Səbət, çatdırılma zonası, minimum sifariş, ödəniş, təxmini çatdırılma vaxtı</td><td>Öz kanalınızdan sifariş və öz müştəri bazanız</td></tr>
    <tr><td>Əlaqə</td><td>Ünvan, Google Maps, parkinq, metro, telefon, WhatsApp, iş saatları</td><td>Qonaq məkanı asanlıqla tapmalıdır</td></tr>
  </tbody>
</table>

<h2>Menyu: PDF Yox, HTML</h2>
<p>Bir çox restoran saytında menyu PDF faylı və ya menyunun telefonla çəkilmiş şəkli kimi yerləşdirilir. Bu, həm qonaq, həm də Google üçün zəif həlldir:</p>
<ul>
  <li><strong>Mobil telefonda oxumaq çətindir</strong> — PDF yüklənir, böyütmək və sürüşdürmək lazım gəlir, mobil internetdə yavaş açılır;</li>
  <li><strong>Google menyunu yaxşı anlamır</strong> — şəkildəki mətn axtarışda praktiki olaraq görünmür, "plov Bakı" və ya "qutab qiyməti" kimi sorğularda tapılmaq çətinləşir;</li>
  <li><strong>Yeniləmək çətindir</strong> — hər qiymət dəyişikliyində dizayner yeni PDF hazırlamalıdır, köhnə qiymətlər isə uzun müddət saytda qalır.</li>
</ul>
<p>HTML menyuda hər yemək saytın mətnidir: kateqoriya, ad, qısa tərkib, porsiya (qram və ya ədəd), qiymət, istəyə görə foto və işarələr ("acılı", "vegetarian", "yeni"). Qiymətləri admin paneldən bir neçə dəqiqəyə dəyişmək olur. Allergen məlumatını (qoz-fındıq, süd, qlüten və s.) göstərmək qonaq üçün faydalıdır, amma yalnız mətbəx tərəfindən dəqiq təsdiqlənmiş məlumatı yazın.</p>
<p>Restoranın içində masadan skan olunan QR menyu isə başqa məsələdir — onun növləri və yerləşdirilməsi barədə: <a href="/blog-details/qr-menyu-kafe-restoran-2026">kafe və restoran üçün QR menyu</a>. Ən yaxşı halda saytdakı HTML menyu və masadakı QR menyu eyni məlumat bazasından işləyir: qiyməti bir yerdə dəyişirsiniz, hər yerdə yenilənir.</p>

<h2>Fotolar</h2>
<p>Restoran seçimi çox vaxt fotoya görə edilir. Stok şəkillər və ya internetdən götürülmüş yemək fotoları dərhal hiss olunur və etibarı azaldır. Yaxşı restoran saytında:</p>
<ul>
  <li>Zalın, terrasın və girişin real fotoları — gündüz və axşam;</li>
  <li>Əsas yeməklərin peşəkar fotoları — eyni işıq və fon üslubunda;</li>
  <li>Tədbir zalının qurulmuş halda fotoları (masalar, dekor, səhnə);</li>
  <li>Fotolar WebP/AVIF formatında və düzgün ölçüdə — əks halda sayt yavaşlayır.</li>
</ul>
<p>Bir dəfəlik peşəkar foto çəkilişi həm sayt, həm Google Business Profile, həm də Instagram üçün istifadə olunur.</p>

<h2>Masa Rezervasiyası</h2>
<p>Bir çox restoranda masa sifarişi yalnız telefonla qəbul olunur. Nəticədə axşam pik saatlarında xətt məşğul olur, gecə yazılan müraciətlər isə itir. Saytda üç kanal birlikdə işləməlidir:</p>
<ul>
  <li><strong>Zəng düyməsi</strong> — mobil versiyada bir toxunuşla;</li>
  <li><strong>WhatsApp düyməsi</strong> — hazır mesajla ("Salam, şənbə 19:00-a 4 nəfərlik masa istəyirəm");</li>
  <li><strong>Rezervasiya forması</strong> — tarix, saat, nəfər sayı, ad, telefon və qeyd.</li>
</ul>
<p>Kiçik kafe üçün administratora gedən sadə forma kifayətdir. Böyük restoranda isə masaların planı və boş saatlarla işləyən rezervasiya sistemi qurula bilər: qonaq yalnız mümkün vaxtları görür, təsdiq və xatırlatma SMS və ya WhatsApp ilə gedir. Rezervasiyanın "təsdiqləndi" sayılması üçün restoranın cavabı lazımdırsa, bunu formada açıq yazın. Belə sistemlərin necə qurulduğu barədə: <a href="/blog-details/onlayn-rezervasiya-novbe-sistemi-2026">onlayn rezervasiya və növbə sistemi</a>.</p>

<h2>Onlayn Sifariş və Çatdırılma: Öz Saytınız, yoxsa Yalnız Aqreqatorlar?</h2>
<p>Çatdırılma platformaları restorana sürətli başlanğıc və geniş auditoriya verir. Amma yalnız onlara bağlı qalmağın da riskləri var:</p>
<table>
  <thead>
    <tr><th>Meyar</th><th>Yalnız aqreqatorlar</th><th>Öz saytınızdan sifariş</th></tr>
  </thead>
  <tbody>
    <tr><td>Hər sifarişdən xərc</td><td>Platformanın komissiyası (müqavilədən asılıdır)</td><td>Komissiya yoxdur; ödəniş xidməti və çatdırılma xərci qalır</td></tr>
    <tr><td>Müştəri bazası</td><td>Müştəri platformanındır, əlaqə məlumatı çox vaxt sizdə qalmır</td><td>Müştəri sizindir: təkrar sifariş, bonus, xüsusi təklif</td></tr>
    <tr><td>Qiymət və menyu</td><td>Platformanın qaydaları və görünüş formatı</td><td>Öz qiymətiniz, öz kampaniyanız, öz dizaynınız</td></tr>
    <tr><td>Yeni müştəri cəlbi</td><td>Güclü — platformada çox istifadəçi var</td><td>Özünüz cəlb etməlisiniz: SEO, Google Maps, sosial şəbəkə</td></tr>
    <tr><td>Başlanğıc xərci</td><td>Aşağı</td><td>Sayt və sifariş sisteminin hazırlanması</td></tr>
  </tbody>
</table>
<p>Praktik yanaşma çox vaxt <strong>hər ikisidir</strong>: aqreqator yeni müştəri gətirir, öz sayt isə daimi müştərini saxlayır. Paketin içinə "növbəti sifarişi saytımızdan verin" kartı qoymaq, saytda bonus və ya pulsuz çatdırılma həddi təklif etmək müştərini tədricən öz kanalınıza gətirir.</p>
<p>Öz onlayn sifariş sistemində bunlar olmalıdır: menyudan səbətə əlavə, modifikatorlar (ölçü, sous, əlavələr), çatdırılma zonaları və qiymətləri, minimum sifariş məbləği, götürüb aparma (pickup) seçimi, kartla onlayn ödəniş və ya qapıda ödəniş, sifariş statusu barədə SMS və ya WhatsApp bildirişi. Texniki baxımdan bu, kiçik onlayn mağazadır — ödəniş və çatdırılma tərəfi barədə ətraflı: <a href="/blog-details/onlayn-magaza-nece-acilir-2026">onlayn mağaza necə açılır</a>.</p>

<h2>WhatsApp ilə Sifariş</h2>
<p>Azərbaycanda bir çox kafe, şirniyyat evi və tort ustası sifarişləri WhatsApp ilə qəbul edir. Bu, tam onlayn sifariş sistemi qurmadan başlamağın ən sadə yoludur. Saytda bunu daha rahat etmək olar:</p>
<ul>
  <li>Menyudan yemək seçib "WhatsApp ilə sifariş et" düyməsinə basanda hazır mesaj yaranır: yeməklər, say, ünvan;</li>
  <li>Tort və xüsusi sifarişlər üçün forma: tarix, çəki, dizayn, mətn, foto nümunəsi — sonra WhatsApp-a keçid;</li>
  <li>İş saatlarından kənar mesajlar üçün avtomatik cavab.</li>
</ul>
<p>Sifariş sayı artanda WhatsApp-dan öz onlayn sifariş sisteminə keçmək məntiqlidir: sifarişlər itmir, statistika yığılır, müştəri bazası formalaşır.</p>

<h2>Google Maps və Google Business Profile</h2>
<p>"Kafe yaxınlıqda" sorğusunda ilk görünən çox vaxt sayt deyil, xəritədəki məkan kartıdır. Restoran üçün vacib olanlar:</p>
<ul>
  <li>Düzgün əsas kateqoriya ("Restoran", "Kafe", "Şirniyyat evi", "Banket zalı") və əlavə kateqoriyalar;</li>
  <li>Saytla <strong>eyni</strong> ad, ünvan və telefon;</li>
  <li>Dəqiq iş saatları, bayram və Ramazan ayı üçün xüsusi saatlar;</li>
  <li>Menyu linki, rezervasiya və sifariş linki;</li>
  <li>Zalın, yeməklərin, girişin və parkinqin real fotoları;</li>
  <li>Rəylərə — həm müsbət, həm mənfi — vaxtında və nəzakətli cavab.</li>
</ul>
<p>Addım-addım təlimat: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır</a>.</p>

<h2>Tədbir və Banket Səhifəsi</h2>
<p>Ad günü, nişan, korporativ şam yeməyi, toy — bunlar restoranın ən böyük sifarişləridir və adətən əvvəlcədən planlaşdırılır. Belə qonaq saytda bunları axtarır:</p>
<ul>
  <li>Hər zalın tutumu (nəfər), fotoları və plan sxemi;</li>
  <li>Banket menyusu nümunələri və "nəfər başına ...-dan başlayan" təxmini qiymət;</li>
  <li>Nələr daxildir: dekor, səhnə, səs avadanlığı, parkinq, öz tortunu gətirmək mümkündürmü;</li>
  <li>Tarixi soruşmaq üçün forma və WhatsApp düyməsi.</li>
</ul>
<p>Şadlıq sarayı və ya banket zalı üçün bu səhifə ayrıca landing kimi də qurula bilər: "şadlıq sarayı Bakı", "banket zalı Xətai" kimi sorğular üçün ayrıca hədəflənmiş səhifə həm SEO-da, həm də reklamda daha yaxşı işləyir.</p>

<h2>AZ / EN / RU: Turistlər və Rusdilli Qonaqlar</h2>
<p>Bakıda və regionlarda turist axını olan yerlərdə — İçərişəhər, bulvar, Qəbələ, Şəki — restoran saytının ingilis versiyası xarici qonaq üçün həlledici ola bilər. Rus dili isə yerli qonaqların xeyli hissəsi üçün rahatdır. Çoxdilli restoran saytında:</p>
<ul>
  <li>Hər dil üçün ayrıca URL və <strong>hreflang</strong> bağlantıları;</li>
  <li>Menyunun peşəkar tərcüməsi — milli yeməklərin adını saxlayıb qısa izah vermək ("Dushbara — small dumplings in broth");</li>
  <li>Ödəniş üsulları (kart qəbul olunurmu), xidmət haqqı varsa — açıq qeyd;</li>
  <li>Xəritə linki və taksi üçün ünvanın yerli dildə yazılışı.</li>
</ul>
<p>Hər əlavə dil sayt qiymətinə təxminən 15–25% əlavə edir.</p>

<h2>İş Saatları və Mobil Sürət</h2>
<p>"İndi açıqdırmı?" sualı restoran saytında ən çox cavab axtarılan suallardan biridir. İş saatlarını həm ana səhifədə, həm əlaqə səhifəsində, həm də Google Business Profile-da eyni şəkildə göstərin; bayram günləri üçün ayrıca qeyd edin. Mətbəxin bağlanma saatı zalın bağlanma saatından fərqlidirsə, bunu da yazın.</p>
<p>Restoran saytına girişlərin böyük hissəsi mobil telefondan olur. Ağır slayderlər, avtomatik açılan video və optimallaşdırılmamış fotolar saytı yavaşladır. Menyu və rezervasiya düyməsi mobil ekranda həmişə görünən yerdə olmalı, Core Web Vitals göstəriciləri yaşıl zonada olmalıdır. Ətraflı: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">sayt sürəti və Core Web Vitals</a>.</p>

<h2>Yerli SEO: "Restoran Bakı" və Rayon Sorğuları</h2>
<ul>
  <li><strong>Başlıqlar</strong> — ana səhifə və əsas səhifələrin başlığında mətbəx növü və yer: "Azərbaycan mətbəxi restoranı — Bakı, Nəsimi";</li>
  <li><strong>Rayon və tədbir səhifələri</strong> — "ad günü üçün restoran Yasamal", "banket zalı Xətai" kimi real təklifiniz olan sorğular üçün ayrıca səhifələr; boş, təkrarlanan "SEO səhifələri" yox;</li>
  <li><strong>Schema işarələməsi</strong> — məkan üçün <strong>Restaurant</strong> (və ya <strong>CafeOrCoffeeShop</strong>, <strong>Bakery</strong>), menyu üçün <strong>Menu</strong>, FAQ bölmələri üçün <strong>FAQPage</strong>; ünvan, iş saatları, telefon, qiymət səviyyəsi və mətbəx növü (servesCuisine);</li>
  <li><strong>HTML menyu</strong> — yemək adları axtarışda görünən mətn olsun;</li>
  <li><strong>Google Business Profile</strong> və saytla eyni əlaqə məlumatları, rəylər və təzə fotolar.</li>
</ul>
<p>Qonaqlar getdikcə "Bakıda ailə ilə gedilə bilən restoran" kimi sualları ChatGPT, Gemini və Google AI cavablarına da verir. Aydın struktur, qısa cavab blokları və dəqiq faktlar burada da işləyir: <a href="/blog-details/chatgpt-gemini-google-ai-cavablarinda-gorunmek-2027">ChatGPT və Google AI cavablarında necə görünmək olar</a>. SEO dəstəyi lazımdırsa: <a href="/seo-xidmeti">SEO xidməti</a>.</p>

<h2>Instagram, yoxsa Öz Sayt?</h2>
<p>Bir çox kafe və şirniyyat evi üçün əsas vitrin Instagram-dır və bu normaldır: fotolar, hekayələr və reels yeni qonaq gətirir. Amma Instagram saytı əvəz etmir:</p>
<ul>
  <li>Instagram profili Google-da "restoran Nəsimi" kimi sorğularda nadir hallarda yüksək çıxır;</li>
  <li>Menyunu və qiymətləri postlar arasında axtarmaq çətindir;</li>
  <li>Rezervasiya və sifariş üçün strukturlaşdırılmış forma yoxdur — hər şey yazışmada itir;</li>
  <li>Hesab bağlanarsa və ya alqoritm dəyişərsə, auditoriyanı itirmək riski var.</li>
</ul>
<p>Ən yaxşı nəticə Instagram-ın trafik gətirdiyi, saytın isə menyu, rezervasiya və sifarişi qəbul etdiyi modeldə alınır. Ətraflı müqayisə: <a href="/blog-details/instagram-magaza-ve-sayt-2026">Instagram mağaza, yoxsa sayt</a>.</p>

<h2>POS və Mətbəx ilə İnteqrasiya</h2>
<p>Onlayn sifariş sayı artdıqca sifarişləri əl ilə kassaya yenidən daxil etmək həm vaxt aparır, həm də səhvə səbəb olur. Sayt POS sistemi ilə bağlananda sifariş birbaşa kassaya və mətbəx ekranına düşür, menyu və qiymətlər bir yerdən idarə olunur, bitmiş məhsul saytda avtomatik "yoxdur" kimi görünür. Bizim <a href="/mehsullar/rspos">RS POS</a> restoran və kafelər üçün bu cür işləyir. Kassa tərəfi barədə: <a href="/blog-details/e-kassa-pos-inteqrasiyasi-2026">e-kassa və POS inteqrasiyası</a>.</p>

<h2>Qiymət və Müddət</h2>
<table>
  <thead>
    <tr><th>Sayt növü</th><th>Kimə uyğundur</th><th>Təxmini qiymət</th></tr>
  </thead>
  <tbody>
    <tr><td>Landing səhifə</td><td>Yeni açılış, kampaniya, banket zalı təklifi</td><td>300 – 700 AZN</td></tr>
    <tr><td>Vizit kartı sayt</td><td>Kiçik kafe və ya şirniyyat evi: menyu, fotolar, əlaqə, WhatsApp</td><td>500 – 1 200 AZN</td></tr>
    <tr><td>Korporativ restoran saytı</td><td>HTML menyu, rezervasiya, tədbir səhifələri, 2–3 dil</td><td>1 200 – 3 500 AZN</td></tr>
    <tr><td>Onlayn sifarişli sayt</td><td>Səbət, çatdırılma zonaları, onlayn ödəniş, sifariş bildirişləri</td><td>2 000 – 6 000 AZN</td></tr>
    <tr><td>Fərdi sistem</td><td>Restoran şəbəkəsi, mobil tətbiq, bonus sistemi, POS və mətbəx inteqrasiyası</td><td>5 000+ AZN</td></tr>
  </tbody>
</table>
<p>Menyu və rezervasiya forması olan sayt adətən 2–4 həftəyə, onlayn sifarişli sayt isə 4–8 həftəyə hazırlanır. Domen, hostinq, SMS və ödəniş xidmətləri ayrıca xərcdir. Qiymətə nələrin təsir etdiyi barədə: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">veb sayt qiyməti Azərbaycanda</a>.</p>

<h2>Tez-tez Edilən Səhvlər</h2>
<ul>
  <li><strong>Menyu yalnız PDF və ya şəkil kimi</strong> — mobil telefonda oxunmur, Google-da görünmür;</li>
  <li><strong>Köhnə qiymətlər</strong> — qonaq saytdakı qiymətlə hesabdakı qiyməti müqayisə edir;</li>
  <li><strong>Stok fotolar</strong> — real məkanı və yeməkləri göstərməmək;</li>
  <li><strong>Saytda və Google Maps-də fərqli iş saatları və ya telefon</strong>;</li>
  <li><strong>Rezervasiya üçün yalnız telefon</strong> — gecə gələn müraciətlər itir;</li>
  <li><strong>Banket məlumatının olmaması</strong> — ən böyük sifarişlər rəqibə gedir;</li>
  <li><strong>Tam asılılıq yalnız aqreqatorlardan</strong> — öz müştəri bazası formalaşmır;</li>
  <li><strong>Ağır, yavaş açılan mobil versiya</strong> və maşın tərcüməsi ilə menyu.</li>
</ul>

<h2>Yoxlama Siyahısı</h2>
<ul>
  <li>☐ HTML menyu: kateqoriyalar, tərkib, porsiya, qiymət, foto</li>
  <li>☐ Menyu və qiymətlər admin paneldən asanlıqla yenilənir</li>
  <li>☐ Zalın və yeməklərin real, optimallaşdırılmış fotoları</li>
  <li>☐ Masa rezervasiyası, zəng və WhatsApp düymələri mobil ekranda görünür</li>
  <li>☐ Tədbir və banket səhifəsi: zal tutumu, foto, təxmini qiymət, forma</li>
  <li>☐ Onlayn sifariş və ya WhatsApp sifarişi (çatdırılma zonaları, minimum məbləğ)</li>
  <li>☐ Ünvan, Google Maps, iş saatları, parkinq/metro məlumatı</li>
  <li>☐ Google Business Profile saytla eyni ad/ünvan/telefon/iş saatları ilə</li>
  <li>☐ AZ/RU/EN versiyalar ayrıca URL-lərlə və hreflang ilə</li>
  <li>☐ Restaurant (və ya CafeOrCoffeeShop/Bakery), Menu, FAQPage schema</li>
  <li>☐ HTTPS, məxfilik siyasəti, formada yalnız lazımi məlumat</li>
  <li>☐ Mobil sürət: Core Web Vitals yaşıl zonada</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Restoran və ya kafe üçün sayt neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Azərbaycanda menyu, fotolar və əlaqəsi olan kiçik kafe saytı təxminən 500–1 200 AZN, HTML menyu, rezervasiya və tədbir səhifələri olan restoran saytı 1 200–3 500 AZN, öz onlayn sifariş sistemi olan sayt 2 000–6 000 AZN-dir (bazar təxmini). Hər əlavə dil təxminən 15–25% əlavə edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Restoran saytı nə qədər müddətə hazırlanır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Menyu və rezervasiya forması olan sayt adətən 2–4 həftəyə, onlayn sifariş və ödənişi olan sayt 4–8 həftəyə hazırlanır. Ən çox vaxt aparan hissə menyunun, qiymətlərin, tərcümələrin və fotoların hazırlanmasıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Menyunu PDF kimi yerləşdirmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Mümkündür, amma tövsiyə olunmur. PDF mobil telefonda çətin oxunur, yavaş açılır və Google onu HTML mətn qədər yaxşı anlamır. HTML menyu həm qonaq üçün rahatdır, həm axtarışda görünür, həm də qiymətləri admin paneldən tez yeniləməyə imkan verir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Çatdırılma platformaları varsa, öz onlayn sifariş saytı lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Çox vaxt hər ikisi faydalıdır. Platformalar yeni müştəri gətirir, amma hər sifarişdən komissiya tutulur və müştəri bazası sizdə qalmır. Öz saytınızdan gələn sifarişdə komissiya yoxdur, daimi müştərilərə bonus və xüsusi təklif vermək mümkündür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kafe üçün Instagram kifayət deyilmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram yeni qonaq cəlb etmək üçün yaxşıdır, amma Google-da "kafe Bakı" kimi sorğularda nadir hallarda yüksək çıxır, menyu və rezervasiya üçün strukturlaşdırılmış imkan vermir. Ən yaxşı nəticə Instagram-ın trafik gətirdiyi, saytın isə menyu, rezervasiya və sifarişi qəbul etdiyi modeldə alınır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Restoran saytına ingilis və rus dili lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Turist axını olan ərazilərdə EN versiya çox faydalıdır, RU versiya isə yerli rusdilli qonaqlar üçün rahatdır. Hər dil ayrıca URL, hreflang və menyunun peşəkar tərcüməsi ilə qurulmalıdır; milli yeməklərin adını saxlayıb qısa izah vermək yaxşı praktikadır.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/qr-menyu-kafe-restoran-2026">Kafe və restoran üçün QR menyu</a></li>
  <li><a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır?</a></li>
  <li><a href="/blog-details/instagram-magaza-ve-sayt-2026">Instagram mağaza, yoxsa sayt?</a></li>
  <li><a href="/blog-details/onlayn-magaza-nece-acilir-2026">Onlayn mağaza necə açılır?</a></li>
  <li><a href="/blog-details/sayt-sureti-core-web-vitals-2026">Sayt sürəti və Core Web Vitals</a></li>
  <li><a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb sayt qiyməti Azərbaycanda</a></li>
</ul>

<h2>Nəticə</h2>
<p>Restoran saytı qonaq üçün qapıdan əvvəlki ilk təəssüratdır. Menyunu qiymətlərlə HTML formatında verin, real fotolar göstərin, masa sifarişini və yemək sifarişini bir neçə toxunuşa endirin, banket qonaqlarını unutmayın, Google Business Profile-ı saytla uyğunlaşdırın və turistlər üçün ingilis versiyası hazırlayın. Aqreqatorlar yeni müştəri gətirə bilər, amma daimi müştəri bazası öz saytınızda formalaşır.</p>
<p><strong>Restoranınız və ya kafeniz üçün sayt hazırlayaq? <a href="/veb-saytlarin-hazirlanmasi">Veb saytların hazırlanması xidməti</a></strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Qiymət və müddət aralıqları Azərbaycan bazarı üzrə təxminidir (noyabr 2026) və layihənin həcmindən asılıdır. Çatdırılma platformalarının komissiya şərtləri müqavilədən asılıdır. İctimai iaşə fəaliyyəti, vergi və kassa qaydaları ilə bağlı konkret tələblər üçün aidiyyəti qurumların aktual məlumatına və ya mütəxəssisə müraciət edin.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>What does someone thinking about where to have dinner with friends tonight do? They pick up their phone and type "restaurant Baku", "cafe Nizami street", "birthday restaurant Yasamal" or "wedding hall Khatai" into Google. They see a few places on the map, look at the photos, want to check the menu and prices, and then either call or send a message. Most of that decision is made on the restaurant's website and its Google listing.</p>
<p>This article explains what a restaurant, cafe or bakery website needs in 2027: an HTML menu with prices, photos, table reservations, online ordering and delivery from your own site, WhatsApp ordering, Google Maps and Google Business Profile, an events and banquet page, AZ/EN/RU versions, opening hours, mobile speed and local SEO. We have a separate article about table-side QR menus inside the restaurant, so we do not repeat that here.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Which sections are needed?</td><td>Home, HTML menu with prices, photo gallery, table reservations, events and banquets, online ordering/delivery (if needed), contact and map, opening hours, FAQ</td></tr>
    <tr><td>Price</td><td>A site with a menu and reservation form costs about AZN 500 – 3,500; with your own online ordering system, AZN 2,000 – 6,000 (market estimate)</td></tr>
    <tr><td>Timeline</td><td>A menu site usually takes 2–4 weeks, a site with online ordering 4–8 weeks; having the menu, prices and photos ready is the biggest factor</td></tr>
    <tr><td>Languages</td><td>AZ as the main language; RU for local Russian-speaking guests; EN for tourists and foreign visitors</td></tr>
    <tr><td>SEO essentials</td><td>Google Business Profile, HTML menu, district and event pages, Restaurant / Menu / FAQPage schema, a fast mobile site</td></tr>
  </tbody>
</table>

<h2>How Do Guests Choose a Restaurant?</h2>
<p>Restaurant searches are almost always <strong>local</strong>. Even when someone types "best restaurant", Google shows them places nearby. Typical queries are:</p>
<ul>
  <li><strong>Venue + city/district:</strong> "restaurant Baku", "cafe Narimanov", "breakfast Old City", "cake order Yasamal";</li>
  <li><strong>Cuisine or dish:</strong> "Azerbaijani cuisine Baku", "plov restaurant", "pizza delivery 28 May";</li>
  <li><strong>Events:</strong> "wedding hall", "birthday restaurant", "corporate banquet hall", "engagement venue";</li>
  <li><strong>"Near me" queries:</strong> "cafe near me", "restaurant open now" — here Google Maps and opening hours decide everything.</li>
</ul>
<p>Guests make most of these searches on their phones, often on the move. So a restaurant site must show four things on the first screen: <strong>what you offer, where you are, whether you are open now, and how to book a table or place an order</strong>.</p>

<h2>Which Pages Should a Restaurant Website Have?</h2>
<table>
  <thead>
    <tr><th>Page</th><th>What it should contain</th><th>Why it matters</th></tr>
  </thead>
  <tbody>
    <tr><td>Home</td><td>A real photo of the venue, cuisine type, "Book a table" and "Menu" buttons, phone/WhatsApp, address, opening hours</td><td>Guests decide within seconds</td></tr>
    <tr><td>Menu</td><td>Categories, dish name, short description, portion, price, photo; HTML, not PDF</td><td>The most-viewed page; Google must be able to read the menu</td></tr>
    <tr><td>Gallery</td><td>Dining room, terrace, dishes, events — real, high-quality photos</td><td>Atmosphere is chosen from photos</td></tr>
    <tr><td>Table reservations</td><td>Date, time, number of guests, name, phone, note (birthday, high chair, etc.)</td><td>Requests come in at night too and the phone line is not overloaded</td></tr>
    <tr><td>Events and banquets</td><td>Hall capacity, photos, sample banquet menu, approximate price range, enquiry form</td><td>The most profitable orders often come from here</td></tr>
    <tr><td>Online ordering</td><td>Cart, delivery zone, minimum order, payment, estimated delivery time</td><td>Orders through your own channel and your own customer base</td></tr>
    <tr><td>Contact</td><td>Address, Google Maps, parking, metro, phone, WhatsApp, opening hours</td><td>Guests must find the venue easily</td></tr>
  </tbody>
</table>

<h2>Menu: HTML, Not PDF</h2>
<p>On many restaurant websites the menu is uploaded as a PDF file or a phone photo of the printed menu. That is a weak solution both for guests and for Google:</p>
<ul>
  <li><strong>Hard to read on a phone</strong> — the PDF has to download, guests must zoom and scroll, and it opens slowly on mobile internet;</li>
  <li><strong>Google does not understand it well</strong> — text inside an image is practically invisible to search, so you are harder to find for queries like "plov Baku" or "qutab price";</li>
  <li><strong>Hard to update</strong> — every price change needs a designer to make a new PDF, and old prices stay on the site for a long time.</li>
</ul>
<p>In an HTML menu every dish is part of the site's text: category, name, short description, portion (grams or pieces), price, optional photo and labels ("spicy", "vegetarian", "new"). Prices can be changed in the admin panel in a few minutes. Showing allergen information (nuts, dairy, gluten, etc.) is helpful for guests, but publish only what your kitchen has confirmed precisely.</p>
<p>A QR menu that guests scan at the table inside the restaurant is a different topic — its types and placement are covered here: <a href="/blog-details/qr-menu-for-cafe-restaurant-2026">QR menu for cafes and restaurants</a>. Ideally, the HTML menu on the site and the QR menu on the table run from the same database: you change a price in one place and it updates everywhere.</p>

<h2>Photos</h2>
<p>Restaurants are often chosen by their photos. Stock images or food photos taken from the internet are noticed immediately and reduce trust. A good restaurant website has:</p>
<ul>
  <li>Real photos of the dining room, terrace and entrance — by day and in the evening;</li>
  <li>Professional photos of the main dishes — in a consistent light and background style;</li>
  <li>Photos of the event hall set up for an event (tables, decor, stage);</li>
  <li>Photos in WebP/AVIF format and the right size — otherwise the site slows down.</li>
</ul>
<p>A single professional photo shoot can be used for the website, Google Business Profile and Instagram.</p>

<h2>Table Reservations</h2>
<p>Many restaurants take table bookings only by phone. As a result the line is busy at evening peak times and requests sent at night are lost. Three channels should work together on the site:</p>
<ul>
  <li><strong>Call button</strong> — one tap on mobile;</li>
  <li><strong>WhatsApp button</strong> — with a ready message ("Hello, I'd like a table for 4 on Saturday at 19:00");</li>
  <li><strong>Reservation form</strong> — date, time, number of guests, name, phone and a note.</li>
</ul>
<p>For a small cafe, a simple form that goes to the manager is enough. A large restaurant can have a reservation system that works with the table plan and available times: guests only see possible slots, and confirmations and reminders go out by SMS or WhatsApp. If a booking is only confirmed after the restaurant replies, say so clearly on the form. How such systems are built: <a href="/blog-details/online-booking-system-salon-clinic-2026">online booking and appointment system</a>.</p>

<h2>Online Ordering and Delivery: Your Own Site or Only Aggregators?</h2>
<p>Delivery platforms give a restaurant a fast start and a large audience. But depending on them alone carries risks too:</p>
<table>
  <thead>
    <tr><th>Criterion</th><th>Aggregators only</th><th>Orders from your own site</th></tr>
  </thead>
  <tbody>
    <tr><td>Cost per order</td><td>The platform's commission (depends on the contract)</td><td>No commission; payment processing and delivery costs remain</td></tr>
    <tr><td>Customer base</td><td>The customer belongs to the platform; contact details often stay with them</td><td>The customer is yours: repeat orders, loyalty bonuses, special offers</td></tr>
    <tr><td>Prices and menu</td><td>The platform's rules and display format</td><td>Your own prices, campaigns and design</td></tr>
    <tr><td>New customer acquisition</td><td>Strong — the platform has many users</td><td>You have to attract them yourself: SEO, Google Maps, social media</td></tr>
    <tr><td>Upfront cost</td><td>Low</td><td>Building the site and ordering system</td></tr>
  </tbody>
</table>
<p>The practical approach is often <strong>both</strong>: the aggregator brings new customers, your own site keeps regular ones. Putting a "place your next order on our website" card into the package and offering a bonus or a free-delivery threshold on the site gradually moves customers to your own channel.</p>
<p>Your own ordering system should have: adding dishes from the menu to the cart, modifiers (size, sauce, extras), delivery zones and fees, a minimum order amount, a pickup option, online card payment or payment on delivery, and SMS or WhatsApp notifications about the order status. Technically this is a small online store — more on payments and delivery: <a href="/blog-details/how-to-start-online-store-azerbaijan-2026">how to start an online store</a>.</p>

<h2>Ordering via WhatsApp</h2>
<p>In Azerbaijan many cafes, bakeries and cake makers take orders via WhatsApp. It is the simplest way to start without building a full online ordering system. The site can make it easier:</p>
<ul>
  <li>When a guest picks dishes from the menu and taps "Order via WhatsApp", a ready message is created: dishes, quantity, address;</li>
  <li>A form for cakes and custom orders: date, weight, design, inscription, sample photo — then a jump to WhatsApp;</li>
  <li>An automatic reply for messages outside opening hours.</li>
</ul>
<p>As order volume grows, moving from WhatsApp to your own online ordering system makes sense: orders are not lost, statistics are collected and a customer base is built.</p>

<h2>Google Maps and Google Business Profile</h2>
<p>For a "cafe near me" search, the first thing people see is often not a website but the venue card on the map. What matters for a restaurant:</p>
<ul>
  <li>The right primary category ("Restaurant", "Cafe", "Bakery", "Banquet hall") and additional categories;</li>
  <li>The <strong>same</strong> name, address and phone as on the site;</li>
  <li>Accurate opening hours, plus special hours for holidays and Ramadan;</li>
  <li>Menu link, reservation and ordering links;</li>
  <li>Real photos of the dining room, dishes, entrance and parking;</li>
  <li>Timely, polite replies to reviews — both positive and negative.</li>
</ul>
<p>Step-by-step guide: <a href="/blog-details/how-to-create-google-business-profile-2026">how to create a Google Business Profile</a>.</p>

<h2>Events and Banquet Page</h2>
<p>Birthdays, engagements, corporate dinners, weddings — these are a restaurant's largest orders, and they are usually planned in advance. Such guests look for this on the site:</p>
<ul>
  <li>The capacity of each hall (number of guests), photos and a floor plan;</li>
  <li>Sample banquet menus and an approximate "from ... per person" price;</li>
  <li>What is included: decor, stage, sound equipment, parking, whether guests may bring their own cake;</li>
  <li>An enquiry form for checking a date and a WhatsApp button.</li>
</ul>
<p>For a wedding or banquet hall this page can also be built as a separate landing page: a dedicated page targeting queries like "wedding hall Baku" or "banquet hall Khatai" works better both in SEO and in advertising.</p>

<h2>AZ / EN / RU: Tourists and Russian-Speaking Guests</h2>
<p>In Baku and in regions with tourist traffic — the Old City, the boulevard, Gabala, Sheki — an English version of the restaurant site can be decisive for foreign guests. Russian is convenient for a large share of local guests. A multilingual restaurant site needs:</p>
<ul>
  <li>A separate URL for each language and <strong>hreflang</strong> links;</li>
  <li>A professional translation of the menu — keep the names of national dishes and add a short explanation ("Dushbara — small dumplings in broth");</li>
  <li>Payment methods (are cards accepted) and a clear note if there is a service charge;</li>
  <li>A map link and the address written in the local language for taxi drivers.</li>
</ul>
<p>Each extra language adds roughly 15–25% to the cost of the site.</p>

<h2>Opening Hours and Mobile Speed</h2>
<p>"Are they open now?" is one of the questions people most often look for on a restaurant site. Show the opening hours the same way on the home page, the contact page and in Google Business Profile, and add a separate note for holidays. If the kitchen closes earlier than the dining room, say that too.</p>
<p>Most visits to restaurant sites come from mobile phones. Heavy sliders, autoplay video and unoptimised photos slow the site down. The menu and the reservation button must always be visible on the mobile screen, and Core Web Vitals should be in the green zone. More: <a href="/blog-details/website-speed-core-web-vitals-2026">website speed and Core Web Vitals</a>.</p>

<h2>Local SEO: "Restaurant Baku" and District Queries</h2>
<ul>
  <li><strong>Titles</strong> — include the cuisine type and location in the title of the home page and key pages: "Azerbaijani cuisine restaurant — Baku, Nasimi";</li>
  <li><strong>District and event pages</strong> — separate pages for queries where you have a real offer, such as "birthday restaurant Yasamal" or "banquet hall Khatai"; not empty, duplicated "SEO pages";</li>
  <li><strong>Schema markup</strong> — <strong>Restaurant</strong> (or <strong>CafeOrCoffeeShop</strong>, <strong>Bakery</strong>) for the venue, <strong>Menu</strong> for the menu, <strong>FAQPage</strong> for FAQ sections; address, opening hours, phone, price range and cuisine (servesCuisine);</li>
  <li><strong>HTML menu</strong> — dish names should be searchable text;</li>
  <li><strong>Google Business Profile</strong> with the same contact details as the site, reviews and fresh photos.</li>
</ul>
<p>Guests increasingly ask questions like "a family-friendly restaurant in Baku" in ChatGPT, Gemini and Google AI answers too. Clear structure, short answer blocks and accurate facts work there as well: <a href="/blog-details/how-to-appear-in-chatgpt-gemini-google-ai-answers-2027">how to appear in ChatGPT and Google AI answers</a>. If you need SEO support: <a href="/seo-services">SEO services</a>.</p>

<h2>Instagram or Your Own Website?</h2>
<p>For many cafes and bakeries Instagram is the main shop window, and that is fine: photos, stories and reels bring new guests. But Instagram does not replace a website:</p>
<ul>
  <li>An Instagram profile rarely ranks high in Google for queries like "restaurant Nasimi";</li>
  <li>The menu and prices are hard to find among posts;</li>
  <li>There is no structured form for reservations and orders — everything gets lost in chat;</li>
  <li>If the account is blocked or the algorithm changes, you risk losing your audience.</li>
</ul>
<p>The best results come from a model where Instagram brings traffic and the site handles the menu, reservations and orders. A detailed comparison: <a href="/blog-details/instagram-shop-vs-website-2026">Instagram shop vs website</a>.</p>

<h2>Integration with POS and the Kitchen</h2>
<p>As online orders grow, re-entering them into the till by hand takes time and causes mistakes. When the site is connected to a POS system, orders land directly in the till and on the kitchen screen, the menu and prices are managed in one place, and sold-out items automatically show as unavailable on the site. Our <a href="/mehsullar/rspos">RS POS</a> works this way for restaurants and cafes. On the till side: <a href="/blog-details/e-kassa-pos-integration-azerbaijan-2026">e-kassa and POS integration</a>.</p>

<h2>Price and Timeline</h2>
<table>
  <thead>
    <tr><th>Site type</th><th>Best for</th><th>Estimated price</th></tr>
  </thead>
  <tbody>
    <tr><td>Landing page</td><td>A new opening, a campaign, a banquet hall offer</td><td>AZN 300 – 700</td></tr>
    <tr><td>Business card site</td><td>A small cafe or bakery: menu, photos, contact, WhatsApp</td><td>AZN 500 – 1,200</td></tr>
    <tr><td>Corporate restaurant site</td><td>HTML menu, reservations, event pages, 2–3 languages</td><td>AZN 1,200 – 3,500</td></tr>
    <tr><td>Site with online ordering</td><td>Cart, delivery zones, online payment, order notifications</td><td>AZN 2,000 – 6,000</td></tr>
    <tr><td>Custom system</td><td>Restaurant chain, mobile app, loyalty system, POS and kitchen integration</td><td>AZN 5,000+</td></tr>
  </tbody>
</table>
<p>A site with a menu and reservation form usually takes 2–4 weeks, a site with online ordering 4–8 weeks. Domain, hosting, SMS and payment services are separate costs. What affects the price: <a href="/blog-details/website-cost-azerbaijan-2026">website cost in Azerbaijan</a>.</p>

<h2>Common Mistakes</h2>
<ul>
  <li><strong>The menu only as a PDF or image</strong> — unreadable on a phone and invisible in Google;</li>
  <li><strong>Outdated prices</strong> — guests compare the price on the site with the bill;</li>
  <li><strong>Stock photos</strong> — not showing the real venue and dishes;</li>
  <li><strong>Different opening hours or phone numbers on the site and on Google Maps</strong>;</li>
  <li><strong>Phone-only reservations</strong> — requests sent at night are lost;</li>
  <li><strong>No banquet information</strong> — the largest orders go to competitors;</li>
  <li><strong>Total dependence on aggregators</strong> — no customer base of your own;</li>
  <li><strong>A heavy, slow mobile version</strong> and a machine-translated menu.</li>
</ul>

<h2>Checklist</h2>
<ul>
  <li>☐ HTML menu: categories, description, portion, price, photo</li>
  <li>☐ Menu and prices are easy to update in the admin panel</li>
  <li>☐ Real, optimised photos of the venue and dishes</li>
  <li>☐ Reservation, call and WhatsApp buttons visible on the mobile screen</li>
  <li>☐ Events and banquet page: hall capacity, photos, approximate price, form</li>
  <li>☐ Online ordering or WhatsApp ordering (delivery zones, minimum amount)</li>
  <li>☐ Address, Google Maps, opening hours, parking/metro information</li>
  <li>☐ Google Business Profile with the same name/address/phone/hours as the site</li>
  <li>☐ AZ/RU/EN versions on separate URLs with hreflang</li>
  <li>☐ Restaurant (or CafeOrCoffeeShop/Bakery), Menu, FAQPage schema</li>
  <li>☐ HTTPS, privacy policy, only the necessary fields in forms</li>
  <li>☐ Mobile speed: Core Web Vitals in the green zone</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does a restaurant or cafe website cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In Azerbaijan, a small cafe site with a menu, photos and contact details costs about AZN 500–1,200, a restaurant site with an HTML menu, reservations and event pages AZN 1,200–3,500, and a site with your own online ordering system AZN 2,000–6,000 (market estimate). Each extra language adds roughly 15–25%.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to build a restaurant website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A site with a menu and reservation form usually takes 2–4 weeks; a site with online ordering and payment takes 4–8 weeks. Preparing the menu, prices, translations and photos is what takes the most time.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can I just upload the menu as a PDF?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">You can, but it is not recommended. A PDF is hard to read on a phone, opens slowly and Google does not understand it as well as HTML text. An HTML menu is convenient for guests, visible in search and lets you update prices quickly in the admin panel.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">If I am already on delivery platforms, do I need my own online ordering site?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Often both are useful. Platforms bring new customers, but they take a commission on every order and the customer base does not stay with you. Orders from your own site carry no commission, and you can offer bonuses and special deals to regular customers.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Isn't Instagram enough for a cafe?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram is good for attracting new guests, but it rarely ranks high in Google for queries like "cafe Baku" and offers no structured way to show a menu or take reservations. The best results come when Instagram brings traffic and the website handles the menu, reservations and orders.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does a restaurant website need English and Russian?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In areas with tourist traffic an EN version is very useful, and an RU version is convenient for local Russian-speaking guests. Each language should have its own URL, hreflang and a professional menu translation; keeping the names of national dishes with a short explanation is good practice.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/qr-menu-for-cafe-restaurant-2026">QR menu for cafes and restaurants</a></li>
  <li><a href="/blog-details/how-to-create-google-business-profile-2026">How to create a Google Business Profile</a></li>
  <li><a href="/blog-details/instagram-shop-vs-website-2026">Instagram shop vs website</a></li>
  <li><a href="/blog-details/how-to-start-online-store-azerbaijan-2026">How to start an online store</a></li>
  <li><a href="/blog-details/website-speed-core-web-vitals-2026">Website speed and Core Web Vitals</a></li>
  <li><a href="/blog-details/website-cost-azerbaijan-2026">Website cost in Azerbaijan</a></li>
</ul>

<h2>Conclusion</h2>
<p>A restaurant website is a guest's first impression before they reach the door. Publish the menu with prices in HTML, show real photos, reduce table booking and food ordering to a few taps, don't forget banquet guests, keep Google Business Profile in sync with the site and prepare an English version for tourists. Aggregators can bring new customers, but your regular customer base is built on your own site.</p>
<p><strong>Shall we build a website for your restaurant or cafe? <a href="/website-development">Website development service</a></strong> or <a href="/contact">contact us</a>.</p>
<p><small><em>Price and timeline ranges are estimates for the Azerbaijani market (November 2026) and depend on project scope. Delivery platform commission terms depend on the contract. For specific requirements on food service activity, tax and cash register rules, refer to current information from the relevant authorities or consult a specialist.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Что делает человек, который думает, где поужинать с друзьями сегодня вечером? Берёт телефон и пишет в Google «ресторан Баку», «кафе улица Низами», «ресторан на день рождения Ясамал» или «банкетный зал Хатаи». Видит на карте несколько заведений, смотрит фото, хочет проверить меню и цены, а потом звонит или пишет. Большая часть этого решения принимается на сайте ресторана и в его карточке Google.</p>
<p>В этой статье разбираем, что должно быть на сайте ресторана, кафе или кондитерской в 2027 году: HTML-меню с ценами, фото, бронирование столиков, онлайн-заказ и доставка со своего сайта, заказ через WhatsApp, Google Maps и Google Business Profile, страница мероприятий и банкетов, версии AZ/EN/RU, часы работы, мобильная скорость и локальное SEO. О QR-меню на столиках внутри ресторана у нас есть отдельная статья, здесь мы его не повторяем.</p>

<h2>Короткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Какие разделы нужны?</td><td>Главная, HTML-меню с ценами, фотогалерея, бронирование столиков, мероприятия и банкеты, онлайн-заказ/доставка (если нужно), контакты и карта, часы работы, FAQ</td></tr>
    <tr><td>Цена</td><td>Сайт с меню и формой бронирования — около 500 – 3 500 AZN; со своей системой онлайн-заказа — 2 000 – 6 000 AZN (рыночная оценка)</td></tr>
    <tr><td>Срок</td><td>Сайт с меню обычно 2–4 недели, сайт с онлайн-заказом 4–8 недель; больше всего влияет готовность меню, цен и фото</td></tr>
    <tr><td>Языки</td><td>AZ — основной; RU — для местных русскоязычных гостей; EN — для туристов и иностранных гостей</td></tr>
    <tr><td>Основа SEO</td><td>Google Business Profile, HTML-меню, страницы районов и мероприятий, schema Restaurant / Menu / FAQPage, быстрый мобильный сайт</td></tr>
  </tbody>
</table>

<h2>Как гость выбирает ресторан?</h2>
<p>Поиск ресторана почти всегда <strong>локальный</strong>. Даже если человек пишет «лучший ресторан», Google показывает ему заведения поблизости. Типичные запросы:</p>
<ul>
  <li><strong>Заведение + город/район:</strong> «ресторан Баку», «кафе Нариманов», «завтрак Ичеришехер», «заказ торта Ясамал»;</li>
  <li><strong>Кухня или блюдо:</strong> «азербайджанская кухня Баку», «ресторан плов», «доставка пиццы 28 Мая»;</li>
  <li><strong>Мероприятия:</strong> «банкетный зал», «ресторан на день рождения», «зал для корпоратива», «место для помолвки»;</li>
  <li><strong>Запросы «рядом»:</strong> «кафе рядом», «ресторан открыт сейчас» — здесь всё решают Google Maps и часы работы.</li>
</ul>
<p>Большинство таких запросов гости делают с телефона, часто на ходу. Поэтому сайт ресторана должен на первом экране показывать четыре вещи: <strong>что вы предлагаете, где находитесь, открыты ли сейчас и как забронировать столик или сделать заказ</strong>.</p>

<h2>Какие страницы нужны сайту ресторана?</h2>
<table>
  <thead>
    <tr><th>Страница</th><th>Что должно быть</th><th>Почему важно</th></tr>
  </thead>
  <tbody>
    <tr><td>Главная</td><td>Реальное фото заведения, тип кухни, кнопки «Забронировать столик» и «Меню», телефон/WhatsApp, адрес, часы работы</td><td>Гость принимает решение за несколько секунд</td></tr>
    <tr><td>Меню</td><td>Категории, название блюда, краткий состав, порция, цена, фото; HTML, а не PDF</td><td>Самая просматриваемая страница; Google должен читать меню</td></tr>
    <tr><td>Галерея</td><td>Зал, терраса, блюда, мероприятия — реальные качественные фото</td><td>Атмосферу выбирают по фото</td></tr>
    <tr><td>Бронирование столиков</td><td>Дата, время, количество гостей, имя, телефон, комментарий (день рождения, детский стул и т. д.)</td><td>Заявки принимаются и ночью, телефонная линия не перегружена</td></tr>
    <tr><td>Мероприятия и банкеты</td><td>Вместимость залов, фото, пример банкетного меню, ориентировочный диапазон цен, форма заявки</td><td>Самые выгодные заказы часто приходят отсюда</td></tr>
    <tr><td>Онлайн-заказ</td><td>Корзина, зона доставки, минимальный заказ, оплата, примерное время доставки</td><td>Заказы через свой канал и своя клиентская база</td></tr>
    <tr><td>Контакты</td><td>Адрес, Google Maps, парковка, метро, телефон, WhatsApp, часы работы</td><td>Гость должен легко найти заведение</td></tr>
  </tbody>
</table>

<h2>Меню: HTML, а не PDF</h2>
<p>На многих сайтах ресторанов меню выложено PDF-файлом или фотографией печатного меню, снятой на телефон. Это слабое решение и для гостя, и для Google:</p>
<ul>
  <li><strong>Неудобно читать на телефоне</strong> — PDF нужно скачать, увеличивать и прокручивать, на мобильном интернете он открывается медленно;</li>
  <li><strong>Google плохо его понимает</strong> — текст на картинке для поиска практически невидим, и по запросам вроде «плов Баку» или «цена кутабов» вас сложнее найти;</li>
  <li><strong>Сложно обновлять</strong> — при каждом изменении цены дизайнер готовит новый PDF, а старые цены долго остаются на сайте.</li>
</ul>
<p>В HTML-меню каждое блюдо — это текст сайта: категория, название, краткий состав, порция (граммы или штуки), цена, при желании фото и метки («острое», «вегетарианское», «новинка»). Цены меняются в админ-панели за несколько минут. Информация об аллергенах (орехи, молоко, глютен и т. д.) полезна гостям, но указывайте только то, что точно подтвердила кухня.</p>
<p>QR-меню, которое гость сканирует за столиком в ресторане, — отдельная тема; о его видах и размещении: <a href="/blog-details/qr-menyu-dlya-kafe-i-restorana-2026">QR-меню для кафе и ресторана</a>. В идеале HTML-меню на сайте и QR-меню на столе работают из одной базы: меняете цену в одном месте — она обновляется везде.</p>

<h2>Фотографии</h2>
<p>Ресторан часто выбирают по фото. Стоковые изображения или фото блюд из интернета сразу заметны и снижают доверие. На хорошем сайте ресторана:</p>
<ul>
  <li>Реальные фото зала, террасы и входа — днём и вечером;</li>
  <li>Профессиональные фото основных блюд — в едином стиле света и фона;</li>
  <li>Фото банкетного зала в сервированном виде (столы, декор, сцена);</li>
  <li>Фото в формате WebP/AVIF и правильного размера — иначе сайт тормозит.</li>
</ul>
<p>Одну профессиональную фотосессию можно использовать и для сайта, и для Google Business Profile, и для Instagram.</p>

<h2>Бронирование столиков</h2>
<p>Во многих ресторанах столик можно забронировать только по телефону. В результате в вечерний час пик линия занята, а заявки, отправленные ночью, теряются. На сайте должны работать три канала одновременно:</p>
<ul>
  <li><strong>Кнопка звонка</strong> — одно касание в мобильной версии;</li>
  <li><strong>Кнопка WhatsApp</strong> — с готовым текстом («Здравствуйте, хочу столик на 4 человек в субботу на 19:00»);</li>
  <li><strong>Форма бронирования</strong> — дата, время, количество гостей, имя, телефон и комментарий.</li>
</ul>
<p>Небольшому кафе достаточно простой формы, которая приходит администратору. В большом ресторане можно настроить систему бронирования, работающую с планом зала и свободным временем: гость видит только доступные слоты, подтверждение и напоминание приходят по SMS или WhatsApp. Если бронь считается подтверждённой только после ответа ресторана, прямо напишите это в форме. Как устроены такие системы: <a href="/blog-details/sistema-onlajn-zapisi-salon-klinika-2026">система онлайн-записи и бронирования</a>.</p>

<h2>Онлайн-заказ и доставка: свой сайт или только агрегаторы?</h2>
<p>Платформы доставки дают ресторану быстрый старт и большую аудиторию. Но полная зависимость только от них тоже несёт риски:</p>
<table>
  <thead>
    <tr><th>Критерий</th><th>Только агрегаторы</th><th>Заказы со своего сайта</th></tr>
  </thead>
  <tbody>
    <tr><td>Расход с каждого заказа</td><td>Комиссия платформы (зависит от договора)</td><td>Комиссии нет; остаются расходы на платёжный сервис и доставку</td></tr>
    <tr><td>Клиентская база</td><td>Клиент принадлежит платформе, его контакты часто остаются у неё</td><td>Клиент ваш: повторные заказы, бонусы, специальные предложения</td></tr>
    <tr><td>Цены и меню</td><td>Правила и формат отображения платформы</td><td>Свои цены, свои акции, свой дизайн</td></tr>
    <tr><td>Привлечение новых клиентов</td><td>Сильное — на платформе много пользователей</td><td>Привлекать нужно самим: SEO, Google Maps, соцсети</td></tr>
    <tr><td>Стартовые затраты</td><td>Низкие</td><td>Разработка сайта и системы заказов</td></tr>
  </tbody>
</table>
<p>Практичный подход часто — <strong>и то, и другое</strong>: агрегатор приводит новых клиентов, свой сайт удерживает постоянных. Карточка «следующий заказ — на нашем сайте» в пакете, бонус или порог бесплатной доставки на сайте постепенно переводят клиентов в ваш собственный канал.</p>
<p>В своей системе онлайн-заказа должны быть: добавление блюд из меню в корзину, модификаторы (размер, соус, добавки), зоны и стоимость доставки, минимальная сумма заказа, самовывоз, онлайн-оплата картой или оплата при получении, уведомления о статусе заказа по SMS или WhatsApp. Технически это небольшой интернет-магазин — подробнее об оплате и доставке: <a href="/blog-details/kak-otkryt-internet-magazin-v-azerbajdzhane-2026">как открыть интернет-магазин</a>.</p>

<h2>Заказ через WhatsApp</h2>
<p>В Азербайджане многие кафе, кондитерские и мастера тортов принимают заказы через WhatsApp. Это самый простой способ начать без полноценной системы онлайн-заказа. Сайт может сделать это удобнее:</p>
<ul>
  <li>Гость выбирает блюда в меню, нажимает «Заказать в WhatsApp» — и формируется готовое сообщение: блюда, количество, адрес;</li>
  <li>Форма для тортов и индивидуальных заказов: дата, вес, дизайн, надпись, фото-пример — затем переход в WhatsApp;</li>
  <li>Автоответ на сообщения вне рабочего времени.</li>
</ul>
<p>Когда заказов становится больше, логично перейти с WhatsApp на свою систему онлайн-заказа: заказы не теряются, собирается статистика, формируется клиентская база.</p>

<h2>Google Maps и Google Business Profile</h2>
<p>По запросу «кафе рядом» первым часто видят не сайт, а карточку заведения на карте. Что важно для ресторана:</p>
<ul>
  <li>Правильная основная категория («Ресторан», «Кафе», «Кондитерская», «Банкетный зал») и дополнительные категории;</li>
  <li><strong>Те же</strong> название, адрес и телефон, что и на сайте;</li>
  <li>Точные часы работы и особый график на праздники и Рамазан;</li>
  <li>Ссылка на меню, бронирование и заказ;</li>
  <li>Реальные фото зала, блюд, входа и парковки;</li>
  <li>Своевременные и вежливые ответы на отзывы — и положительные, и отрицательные.</li>
</ul>
<p>Пошаговая инструкция: <a href="/blog-details/kak-sozdat-google-business-profile-2026">как создать Google Business Profile</a>.</p>

<h2>Страница мероприятий и банкетов</h2>
<p>Дни рождения, помолвки, корпоративные ужины, свадьбы — это самые крупные заказы ресторана, и их обычно планируют заранее. Такие гости ищут на сайте:</p>
<ul>
  <li>Вместимость каждого зала (человек), фото и схему рассадки;</li>
  <li>Примеры банкетного меню и ориентировочную цену «от ... на человека»;</li>
  <li>Что входит: декор, сцена, звуковое оборудование, парковка, можно ли принести свой торт;</li>
  <li>Форму для уточнения даты и кнопку WhatsApp.</li>
</ul>
<p>Для свадебного или банкетного зала эту страницу можно сделать и отдельным лендингом: отдельная страница под запросы вроде «банкетный зал Баку» или «свадебный зал Хатаи» лучше работает и в SEO, и в рекламе.</p>

<h2>AZ / EN / RU: туристы и русскоязычные гости</h2>
<p>В Баку и в регионах с туристическим потоком — Ичеришехер, бульвар, Габала, Шеки — английская версия сайта ресторана может стать решающей для иностранного гостя. Русский язык удобен значительной части местных гостей. На многоязычном сайте ресторана нужны:</p>
<ul>
  <li>Отдельный URL для каждого языка и связи <strong>hreflang</strong>;</li>
  <li>Профессиональный перевод меню — сохраняйте названия национальных блюд и давайте короткое пояснение («Дюшбара — маленькие пельмени в бульоне»);</li>
  <li>Способы оплаты (принимаются ли карты) и чёткое указание, если есть плата за обслуживание;</li>
  <li>Ссылка на карту и адрес на местном языке для таксиста.</li>
</ul>
<p>Каждый дополнительный язык добавляет к стоимости сайта примерно 15–25%.</p>

<h2>Часы работы и мобильная скорость</h2>
<p>«Открыты ли они сейчас?» — один из вопросов, ответ на который чаще всего ищут на сайте ресторана. Указывайте часы работы одинаково на главной, на странице контактов и в Google Business Profile, отдельно отмечайте праздничные дни. Если кухня закрывается раньше зала, напишите и это.</p>
<p>Большая часть посещений сайтов ресторанов идёт с мобильных телефонов. Тяжёлые слайдеры, автоматически запускающееся видео и неоптимизированные фото замедляют сайт. Меню и кнопка бронирования должны всегда быть видны на мобильном экране, а показатели Core Web Vitals — в зелёной зоне. Подробнее: <a href="/blog-details/skorost-sajta-core-web-vitals-2026">скорость сайта и Core Web Vitals</a>.</p>

<h2>Локальное SEO: «ресторан Баку» и запросы по районам</h2>
<ul>
  <li><strong>Заголовки</strong> — в заголовке главной и ключевых страниц укажите тип кухни и место: «Ресторан азербайджанской кухни — Баку, Насими»;</li>
  <li><strong>Страницы районов и мероприятий</strong> — отдельные страницы под запросы, по которым у вас есть реальное предложение, например «ресторан на день рождения Ясамал» или «банкетный зал Хатаи»; не пустые дублирующиеся «SEO-страницы»;</li>
  <li><strong>Разметка schema</strong> — <strong>Restaurant</strong> (или <strong>CafeOrCoffeeShop</strong>, <strong>Bakery</strong>) для заведения, <strong>Menu</strong> для меню, <strong>FAQPage</strong> для блоков FAQ; адрес, часы работы, телефон, уровень цен и кухня (servesCuisine);</li>
  <li><strong>HTML-меню</strong> — названия блюд должны быть текстом, доступным для поиска;</li>
  <li><strong>Google Business Profile</strong> с теми же контактами, что и на сайте, отзывы и свежие фото.</li>
</ul>
<p>Гости всё чаще задают вопросы вроде «ресторан в Баку, куда можно пойти с семьёй» в ChatGPT, Gemini и ответах Google AI. Чёткая структура, короткие блоки ответов и точные факты работают и там: <a href="/blog-details/kak-popast-v-otvety-chatgpt-gemini-google-ai-2027">как попасть в ответы ChatGPT и Google AI</a>. Если нужна помощь с SEO: <a href="/seo-uslugi">SEO-услуги</a>.</p>

<h2>Instagram или свой сайт?</h2>
<p>Для многих кафе и кондитерских главная витрина — Instagram, и это нормально: фото, сторис и reels приводят новых гостей. Но Instagram не заменяет сайт:</p>
<ul>
  <li>Профиль Instagram редко поднимается высоко в Google по запросам вроде «ресторан Насими»;</li>
  <li>Меню и цены сложно найти среди постов;</li>
  <li>Нет структурированной формы для бронирования и заказа — всё теряется в переписке;</li>
  <li>При блокировке аккаунта или смене алгоритма есть риск потерять аудиторию.</li>
</ul>
<p>Лучший результат даёт модель, где Instagram приводит трафик, а сайт принимает меню, бронирования и заказы. Подробное сравнение: <a href="/blog-details/instagram-magazin-ili-sajt-2026">Instagram-магазин или сайт</a>.</p>

<h2>Интеграция с POS и кухней</h2>
<p>Когда онлайн-заказов становится больше, повторно вбивать их в кассу вручную долго и чревато ошибками. Если сайт связан с POS-системой, заказ сразу попадает в кассу и на кухонный экран, меню и цены управляются из одного места, а закончившиеся позиции автоматически показываются на сайте как недоступные. Наш <a href="/mehsullar/rspos">RS POS</a> работает так для ресторанов и кафе. О кассовой части: <a href="/blog-details/e-kassa-integraciya-s-pos-2026">интеграция e-kassa и POS</a>.</p>

<h2>Цена и сроки</h2>
<table>
  <thead>
    <tr><th>Тип сайта</th><th>Кому подходит</th><th>Ориентировочная цена</th></tr>
  </thead>
  <tbody>
    <tr><td>Лендинг</td><td>Новое открытие, акция, предложение банкетного зала</td><td>300 – 700 AZN</td></tr>
    <tr><td>Сайт-визитка</td><td>Небольшое кафе или кондитерская: меню, фото, контакты, WhatsApp</td><td>500 – 1 200 AZN</td></tr>
    <tr><td>Корпоративный сайт ресторана</td><td>HTML-меню, бронирование, страницы мероприятий, 2–3 языка</td><td>1 200 – 3 500 AZN</td></tr>
    <tr><td>Сайт с онлайн-заказом</td><td>Корзина, зоны доставки, онлайн-оплата, уведомления о заказе</td><td>2 000 – 6 000 AZN</td></tr>
    <tr><td>Индивидуальная система</td><td>Сеть ресторанов, мобильное приложение, бонусная система, интеграция с POS и кухней</td><td>5 000+ AZN</td></tr>
  </tbody>
</table>
<p>Сайт с меню и формой бронирования обычно делается за 2–4 недели, сайт с онлайн-заказом — за 4–8 недель. Домен, хостинг, SMS и платёжные сервисы — отдельные расходы. Что влияет на цену: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">стоимость сайта в Азербайджане</a>.</p>

<h2>Частые ошибки</h2>
<ul>
  <li><strong>Меню только в PDF или картинкой</strong> — не читается на телефоне и не видно в Google;</li>
  <li><strong>Устаревшие цены</strong> — гость сравнивает цену на сайте со счётом;</li>
  <li><strong>Стоковые фото</strong> — вместо реального зала и блюд;</li>
  <li><strong>Разные часы работы или телефон на сайте и в Google Maps</strong>;</li>
  <li><strong>Бронирование только по телефону</strong> — ночные заявки теряются;</li>
  <li><strong>Нет информации о банкетах</strong> — крупнейшие заказы уходят конкурентам;</li>
  <li><strong>Полная зависимость от агрегаторов</strong> — своя клиентская база не формируется;</li>
  <li><strong>Тяжёлая, медленная мобильная версия</strong> и машинный перевод меню.</li>
</ul>

<h2>Чек-лист</h2>
<ul>
  <li>☐ HTML-меню: категории, состав, порция, цена, фото</li>
  <li>☐ Меню и цены легко обновляются в админ-панели</li>
  <li>☐ Реальные оптимизированные фото зала и блюд</li>
  <li>☐ Кнопки бронирования, звонка и WhatsApp видны на мобильном экране</li>
  <li>☐ Страница мероприятий и банкетов: вместимость, фото, ориентировочная цена, форма</li>
  <li>☐ Онлайн-заказ или заказ через WhatsApp (зоны доставки, минимальная сумма)</li>
  <li>☐ Адрес, Google Maps, часы работы, парковка/метро</li>
  <li>☐ Google Business Profile с теми же названием/адресом/телефоном/часами, что и на сайте</li>
  <li>☐ Версии AZ/RU/EN на отдельных URL с hreflang</li>
  <li>☐ Schema Restaurant (или CafeOrCoffeeShop/Bakery), Menu, FAQPage</li>
  <li>☐ HTTPS, политика конфиденциальности, в формах только нужные поля</li>
  <li>☐ Мобильная скорость: Core Web Vitals в зелёной зоне</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит сайт для ресторана или кафе?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В Азербайджане сайт небольшого кафе с меню, фото и контактами стоит около 500–1 200 AZN, сайт ресторана с HTML-меню, бронированием и страницами мероприятий — 1 200–3 500 AZN, сайт со своей системой онлайн-заказа — 2 000–6 000 AZN (рыночная оценка). Каждый дополнительный язык добавляет примерно 15–25%.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает разработка сайта ресторана?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сайт с меню и формой бронирования обычно делается за 2–4 недели, сайт с онлайн-заказом и оплатой — за 4–8 недель. Больше всего времени уходит на подготовку меню, цен, переводов и фото.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли просто выложить меню в PDF?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Можно, но не рекомендуется. PDF неудобно читать на телефоне, он медленно открывается, и Google понимает его хуже, чем HTML-текст. HTML-меню удобно гостям, видно в поиске и позволяет быстро обновлять цены в админ-панели.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Если я уже работаю с платформами доставки, нужен ли свой сайт с онлайн-заказом?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Часто полезно и то, и другое. Платформы приводят новых клиентов, но берут комиссию с каждого заказа, а клиентская база у вас не остаётся. С заказов со своего сайта комиссии нет, и постоянным клиентам можно предлагать бонусы и специальные условия.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Разве кафе недостаточно Instagram?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Instagram хорош для привлечения новых гостей, но редко поднимается высоко в Google по запросам вроде «кафе Баку» и не даёт структурированного способа показать меню или принять бронь. Лучший результат — когда Instagram приводит трафик, а сайт принимает меню, бронирования и заказы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужны ли сайту ресторана английский и русский языки?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В районах с туристическим потоком версия EN очень полезна, а версия RU удобна местным русскоязычным гостям. Каждый язык нужно делать с отдельным URL, hreflang и профессиональным переводом меню; хорошая практика — сохранять названия национальных блюд с коротким пояснением.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/qr-menyu-dlya-kafe-i-restorana-2026">QR-меню для кафе и ресторана</a></li>
  <li><a href="/blog-details/kak-sozdat-google-business-profile-2026">Как создать Google Business Profile</a></li>
  <li><a href="/blog-details/instagram-magazin-ili-sajt-2026">Instagram-магазин или сайт?</a></li>
  <li><a href="/blog-details/kak-otkryt-internet-magazin-v-azerbajdzhane-2026">Как открыть интернет-магазин</a></li>
  <li><a href="/blog-details/skorost-sajta-core-web-vitals-2026">Скорость сайта и Core Web Vitals</a></li>
  <li><a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта в Азербайджане</a></li>
</ul>

<h2>Итог</h2>
<p>Сайт ресторана — первое впечатление гостя ещё до того, как он подошёл к двери. Публикуйте меню с ценами в HTML, показывайте реальные фото, сократите бронирование столика и заказ еды до нескольких касаний, не забывайте о банкетных гостях, синхронизируйте Google Business Profile с сайтом и подготовьте английскую версию для туристов. Агрегаторы могут приводить новых клиентов, но постоянная клиентская база формируется на вашем собственном сайте.</p>
<p><strong>Разработаем сайт для вашего ресторана или кафе? <a href="/razrabotka-sajtov">Услуга разработки сайтов</a></strong> или <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Диапазоны цен и сроков — ориентировочные для рынка Азербайджана (ноябрь 2026) и зависят от объёма проекта. Условия комиссии платформ доставки зависят от договора. Конкретные требования к деятельности общепита, налоговым и кассовым правилам уточняйте в актуальной информации профильных органов или у специалиста.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'restoran-kafe-ucun-sayt-2027'],
            [
                'slug_en' => 'restaurant-cafe-website-azerbaijan-2027',
                'slug_ru' => 'sajt-dlya-restorana-kafe-2027',

                'title_az' => 'Restoran və Kafe üçün Sayt 2027: Menyu, Rezervasiya, Onlayn Sifariş və Yerli SEO',
                'title_en' => 'Restaurant and Cafe Website in Azerbaijan 2027: Menu, Reservations, Online Ordering and Local SEO',
                'title_ru' => 'Сайт для ресторана и кафе 2027: меню, бронирование, онлайн-заказ и локальное SEO',

                'review_az' => 'Restoran, kafe və şirniyyat evi saytında nə olmalıdır? Qiymətli HTML menyu, fotolar, masa rezervasiyası, onlayn sifariş və aqreqatorlar, WhatsApp, Google Business Profile, banket səhifəsi, AZ/EN/RU, qiymət, səhvlər və yoxlama siyahısı.',
                'review_en' => 'What should a restaurant, cafe or bakery website include? An HTML menu with prices, photos, table reservations, online ordering vs aggregators, WhatsApp, Google Business Profile, a banquet page, AZ/EN/RU, price, common mistakes and a checklist.',
                'review_ru' => 'Что должно быть на сайте ресторана, кафе или кондитерской? HTML-меню с ценами, фото, бронирование столиков, онлайн-заказ и агрегаторы, WhatsApp, Google Business Profile, банкетная страница, AZ/EN/RU, цена, ошибки и чек-лист.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '3 Noyabr 2026',
                'date_en' => 'November 3, 2026',
                'date_ru' => '3 Ноября 2026',

                'photo'    => 'cover-restaurant-site-az.png',
                'photo_en' => 'cover-restaurant-site-en.png',
                'photo_ru' => 'cover-restaurant-site-ru.png',

                'meta_title_az' => 'Restoran və Kafe üçün Sayt 2027 | RS Code',
                'meta_title_en' => 'Restaurant Website Azerbaijan 2027 | RS Code',
                'meta_title_ru' => 'Сайт для ресторана и кафе 2027 | RS Code',

                'meta_description_az' => 'Restoran və kafe saytında nə olmalıdır: HTML menyu, rezervasiya, onlayn sifariş, WhatsApp, Google Maps, banket, AZ/EN/RU. Qiymət 500–6 000 AZN, yoxlama siyahısı.',
                'meta_description_en' => 'What a restaurant or cafe website needs: HTML menu, reservations, online ordering, WhatsApp, Google Maps, banquets, AZ/EN/RU. Price AZN 500–6,000 and a checklist.',
                'meta_description_ru' => 'Что нужно сайту ресторана и кафе: HTML-меню, бронирование, онлайн-заказ, WhatsApp, Google Maps, банкеты, AZ/EN/RU. Цена 500–6 000 AZN и чек-лист.',

                'meta_keywords_az' => 'restoran saytı, kafe saytı, restoran bakı, şadlıq sarayı, onlayn sifariş, masa rezervasiyası, restoran menyusu, sayt 2027',
                'meta_keywords_en' => 'restaurant website azerbaijan, cafe website baku, restaurant baku, online ordering restaurant, table reservation, banquet hall, 2027',
                'meta_keywords_ru' => 'сайт для ресторана, сайт для кафе, ресторан баку, банкетный зал, онлайн-заказ еды, бронирование столиков, 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
