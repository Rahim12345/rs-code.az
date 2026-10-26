<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog59PrintBannerSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Buklet mətbəədən gəlir: kənarlarda ağ zolaq var, loqo bulanıqdır, ekranda parlaq görünən göy rəng isə kağızda boz-tünd çıxıb. Pul həm dizayna, həm çapa xərclənib, nəticə isə yararsızdır. Çap dizaynında səhvlərin çoxu zövqdən yox, <strong>texniki hazırlıqdan</strong> qaynaqlanır.</p>
<p>Bu yazıda 2027-ci il üçün çap dizaynı və reklam banneri dizaynının Azərbaycanda təxmini qiymətlərini, mətbəəyə fayl göndərməzdən əvvəlki texniki yoxlamanı, küçə reklamı üçün icazə və dövlət rüsumu qaydasını izah edirik.</p>

<h2>Qısa Cavab: Dizayn Qiymətləri</h2>
<table>
  <thead>
    <tr><th>Məhsul</th><th>Dizayn qiyməti (AZN, təxmini)</th><th>Qeyd</th></tr>
  </thead>
  <tbody>
    <tr><td>Vizit kart</td><td>30 – 100</td><td>İki tərəfli, korporativ üslub varsa ucuz</td></tr>
    <tr><td>Flayer / vərəqə</td><td>50 – 150</td><td>A5, A4, bir və ya iki tərəf</td></tr>
    <tr><td>Buklet (2–3 qatlanan)</td><td>100 – 300</td><td>Mətn və şəkillər hazırdırsa</td></tr>
    <tr><td>Kataloq / broşür</td><td>səhifəsi 15 – 50</td><td>Səhifə sayından və şəkil emalından asılıdır</td></tr>
    <tr><td>Restoran menyusu</td><td>100 – 400</td><td>Çap və QR versiya birlikdə</td></tr>
    <tr><td>Küçə banneri, bilbord, roll-up</td><td>80 – 300</td><td>Bir ölçü; əlavə ölçülər ayrıca</td></tr>
    <tr><td>Rəqəmsal banner dəsti</td><td>50 – 250</td><td>Sayt, Google Display, sosial şəbəkə ölçüləri</td></tr>
  </tbody>
</table>
<p>Bunlar <strong>yalnız dizayn</strong> qiymətləridir. Çap xərci (kağız, tiraj, laminasiya, banner materialı, montaj) mətbəəyə ayrıca ödənilir. Loqo və korporativ üslub hələ yoxdursa, əvvəlcə onlardan başlamaq daha ucuz başa gəlir: bax <a href="/blog-details/korporativ-uslub-brendbuk-2027">korporativ üslub və brendbuk</a>.</p>

<h2>Qiymətə Nə Təsir Edir?</h2>
<ul>
  <li><strong>Məzmunun hazırlığı:</strong> mətn, qiymətlər və şəkillər sizdən hazır gəlirsə, iş sürətlənir. Mətni dizayner yazırsa, kopiraytinq ayrıca qiymətləndirilir.</li>
  <li><strong>Şəkillər:</strong> öz məhsul fotolarınız, lisenziyalı stok şəkil, yoxsa yeni foto çəkiliş.</li>
  <li><strong>Dillər:</strong> Azərbaycan, rus və ingilis versiyaları hər biri ayrıca maket deməkdir.</li>
  <li><strong>Ölçü adaptasiyası:</strong> bir banneri 5 fərqli ölçüyə uyğunlaşdırmaq yenidən dizayn tələb edir.</li>
  <li><strong>Düzəliş dövrləri:</strong> müqavilədə neçə düzəlişin daxil olduğunu yazın.</li>
</ul>

<h2>Mətbəəyə Göndərməzdən Əvvəl: Texniki Yoxlama</h2>
<ol>
  <li><strong>Rəng modeli CMYK:</strong> ekran RGB rəngləri ilə işləyir, çap isə CMYK ilə. Parlaq RGB rənglər çapda solğun çıxa bilər. Korporativ rənglər üçün brendbukdakı CMYK və ya Pantone kodundan istifadə edin.</li>
  <li><strong>Təsvir ölçüsü:</strong> yaxından baxılan məhsullar (vizit kart, buklet) üçün adətən 300 DPI. Uzaqdan baxılan böyük bannerlər üçün daha aşağı DPI kifayət edir; dəqiq tələbi mətbəədən soruşun.</li>
  <li><strong>Daşma sahəsi (bleed):</strong> fon kəsim xəttindən kənara, adətən 2–5 mm uzadılır. Yoxsa kəsimdən sonra kənarlarda ağ zolaq qalır.</li>
  <li><strong>Təhlükəsiz sahə:</strong> mətn və loqo kəsim xəttindən ən azı bir neçə millimetr içəridə olmalıdır.</li>
  <li><strong>Şriftlər:</strong> əyrilərə çevrilir və ya fayla daxil edilir. Azərbaycan hərfləri (ə, ğ, ş, ı) yoxlanır.</li>
  <li><strong>Qara rəng:</strong> kiçik mətn yalnız qara (K) ilə; böyük qara fonlar üçün mətbəənin tövsiyə etdiyi "zəngin qara" qarışığı.</li>
  <li><strong>Fayl formatı:</strong> adətən çap üçün PDF (mətbəənin istədiyi standartda), bannerlər üçün bəzən TIFF.</li>
  <li><strong>Sınaq çapı:</strong> böyük tirajdan əvvəl bir nümunə çap etdirib rəngi və mətni yoxlayın.</li>
</ol>
<p>Ən sadə qayda: işə başlamazdan əvvəl seçdiyiniz mətbəədən <strong>texniki tələblərini</strong> (ölçü, bleed, format, rəng profili) yazılı alın və dizaynerə verin.</p>

<h2>Küçə Reklamı: İcazə və Dövlət Rüsumu</h2>
<p>Bannerin dizaynı hazırdır, amma onu küçəyə asmaq üçün dizayn kifayət deyil. Azərbaycanda açıq məkanda reklam yerləşdirmək üçün <strong>icazə</strong> alınır və "Dövlət rüsumu haqqında" Qanunun 33-1-ci maddəsinə əsasən hər kvadratmetr üçün dövlət rüsumu ödənilir. Rüsumun məbləğləri 2017-ci il 19 dekabr tarixli Prezident fərmanı ilə təsdiq edilib. Fərmana görə bir illik icazə üçün bir m² üçün baza məbləğlər:</p>
<table>
  <thead>
    <tr><th>Reklam daşıyıcısı</th><th>1 m² üçün, 1 il (AZN)</th></tr>
  </thead>
  <tbody>
    <tr><td>Bilbord, meqabord</td><td>15</td></tr>
    <tr><td>Elektron daşıyıcılar (monitor, ekran, tablo)</td><td>50</td></tr>
    <tr><td>Rollerlər</td><td>40</td></tr>
    <tr><td>Kronşteyn panellər, divar panelləri, damüstü hərflər, fasad reklamları, markizalar, bayraqlar</td><td>10</td></tr>
  </tbody>
</table>
<p>Bu məbləğ ərazi əmsalına vurulur: Bakı 1; Gəncə, Sumqayıt və Xırdalan 0,8; Abşeron qəsəbələri, Mingəçevir, Şirvan, Lənkəran, Şəki, Qəbələ, Quba və bəzi digər şəhərlər 0,7; qalan ərazilər 0,5. Bir ildən az müddət üçün məbləğ 12-yə bölünüb ay sayına vurulur.</p>
<p><strong>Nümunə:</strong> Bakıda 3 m² fasad reklamı üçün bir illik rüsum: 3 × 10 × 1 = 30 AZN. Gəncədə eyni ölçülü bilbord üzü üçün: 3 × 15 × 0,8 = 36 AZN.</p>
<p>Bu rəqəmlər rəsmi fərmana əsaslanır, amma qaydalar dəyişə bilər. Reklam quraşdırmazdan əvvəl qüvvədə olan məbləği və icazə prosedurunu yerli icra hakimiyyətindən dəqiqləşdirin.</p>

<h2>Rəqəmsal Bannerlər: Çapdan Fərqi</h2>
<ul>
  <li><strong>Rəng:</strong> RGB, çünki ekranda göstərilir.</li>
  <li><strong>Ölçülər:</strong> sayt və reklam şəbəkələri üçün geniş yayılmış ölçülər 300×250, 728×90, 300×600, 320×100 pikseldir. Sosial şəbəkələr üçün platformanın cari tövsiyələrini yoxlayın.</li>
  <li><strong>Fayl həcmi:</strong> yüngül olmalıdır, ağır banner saytı yavaşladır (bax: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">sayt sürəti</a>).</li>
  <li><strong>Mesaj:</strong> 1–2 saniyədə oxunmalıdır: bir təklif, bir düymə.</li>
</ul>
<p>Google Display reklamı üçün banner hazırlayırsınızsa, büdcə və kampaniya qaydaları haqqında: <a href="/blog-details/google-ads-azerbaycan-2027">Google Ads Azərbaycanda 2027</a>.</p>

<h2>Yaxşı Reklam Bannerinin 5 Qaydası</h2>
<ol>
  <li><strong>Bir əsas mesaj:</strong> sürücü bilborda 2–3 saniyə baxır. Uzun siyahı oxunmur.</li>
  <li><strong>Böyük və kontrastlı mətn:</strong> açıq fonda tünd, tünd fonda açıq yazı.</li>
  <li><strong>Aydın əlaqə:</strong> qısa telefon nömrəsi, sayt və ya QR kod (QR kod yaxından baxılan daşıyıcılarda işləyir).</li>
  <li><strong>Brend tanınması:</strong> loqo və korporativ rənglər bütün daşıyıcılarda eynidir.</li>
  <li><strong>Ölçülə bilən nəticə:</strong> hər kampaniya üçün ayrıca promo kod və ya QR link istifadə edin ki, hansı reklamın müştəri gətirdiyini biləsiniz.</li>
</ol>
<p>Restoran və kafelər üçün çap menyusunu QR menyu ilə birlikdə düşünmək faydalıdır: <a href="/blog-details/qr-menyu-kafe-restoran-2026">QR menyu kafe və restoran üçün</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Vizit kart dizaynı neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Azərbaycan bazarında təxminən 30–100 AZN. Korporativ üslub artıq varsa, qiymət aşağı olur. Çap xərci mətbəəyə ayrıca ödənilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Çap üçün fayl hansı formatda olmalıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Adətən CMYK rəng modelində, daşma sahəsi (bleed) olan, şriftləri əyrilərə çevrilmiş PDF. Yaxından baxılan məhsullar üçün 300 DPI. Dəqiq tələbləri mətbəədən yazılı alın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Küçə banneri üçün icazə lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Açıq məkanda reklam yerləşdirmək üçün icazə alınır və hər m² üçün dövlət rüsumu ödənilir. Məbləğ daşıyıcının növündən, müddətdən və ərazi əmsalından asılıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Bilbord üçün dövlət rüsumu nə qədərdir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">2017-ci il fərmanına görə bilbord və meqabord üçün baza məbləğ bir il üçün 1 m²-ə 15 AZN-dir. Bu məbləğ ərazi əmsalına vurulur: Bakıda 1, Gəncə, Sumqayıt və Xırdalanda 0,8. Qüvvədə olan məbləği yerli icra hakimiyyətindən dəqiqləşdirin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ekranda gördüyüm rəng çapda niyə fərqli çıxır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ekran RGB, çap isə CMYK rəng modeli ilə işləyir və bəzi parlaq RGB rənglər CMYK-da alınmır. Rənglər CMYK və ya Pantone kodu ilə verilməli, böyük tirajdan əvvəl sınaq çapı edilməlidir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Çap və banner dizaynında qiymət qədər vacib olan texniki hazırlıqdır: CMYK, düzgün təsvir ölçüsü, daşma sahəsi və mətbəənin tələbləri. Küçə reklamı üçün isə dizayndan əlavə icazə və dövlət rüsumunu da büdcəyə daxil edin. Bütün materiallarda eyni korporativ üslub brendin tanınmasını sürətləndirir.</p>
<p><strong>Buklet, menyu, banner və ya digər çap materialı hazırlatmaq istəyirsinizsə, <a href="/elaqe">bizə yazın</a></strong>. Loqonuz hələ yoxdursa: <a href="/loqo-hazirlanmasi">loqo hazırlanması</a>. Bütün xidmətlər: <a href="/xidmetler">xidmətlər</a>.</p>
<p><small><em>Dizayn qiymətləri Azərbaycan bazarı üzrə təxmini diapazonlardır (Oktyabr 2026). Dövlət rüsumu məlumatı Azərbaycan Respublikası Prezidentinin 19 dekabr 2017-ci il tarixli fərmanına (president.az) əsaslanır. Qüvvədə olan məbləği və icazə qaydasını rəsmi orqanlardan dəqiqləşdirin.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>The booklets arrive from the printer: there is a white strip along the edges, the logo is blurry, and the blue that looked bright on screen came out greyish on paper. Money was spent on both design and printing, yet the result is unusable. Most mistakes in print design come not from taste but from <strong>technical preparation</strong>.</p>
<p>This article covers approximate 2027 prices for print and advertising banner design in Azerbaijan, a technical checklist before sending files to the printer, and the permit and state fee rules for outdoor advertising.</p>

<h2>Short Answer: Design Prices</h2>
<table>
  <thead>
    <tr><th>Item</th><th>Design price (AZN, approx.)</th><th>Note</th></tr>
  </thead>
  <tbody>
    <tr><td>Business card</td><td>30 – 100</td><td>Two-sided; cheaper if a corporate identity exists</td></tr>
    <tr><td>Flyer / leaflet</td><td>50 – 150</td><td>A5, A4, one or two sides</td></tr>
    <tr><td>Booklet (bi-fold / tri-fold)</td><td>100 – 300</td><td>If text and images are ready</td></tr>
    <tr><td>Catalogue / brochure</td><td>15 – 50 per page</td><td>Depends on page count and image editing</td></tr>
    <tr><td>Restaurant menu</td><td>100 – 400</td><td>Print and QR version together</td></tr>
    <tr><td>Street banner, billboard, roll-up</td><td>80 – 300</td><td>One size; extra sizes charged separately</td></tr>
    <tr><td>Digital banner set</td><td>50 – 250</td><td>Website, Google Display, social media sizes</td></tr>
  </tbody>
</table>
<p>These are <strong>design-only</strong> prices. Printing costs (paper, run size, lamination, banner material, installation) are paid to the printer separately. If you do not yet have a logo and corporate identity, starting there is cheaper in the long run: see <a href="/blog-details/brand-identity-brand-book-cost-azerbaijan-2027">corporate identity and brand book</a>.</p>

<h2>What Affects the Price?</h2>
<ul>
  <li><strong>Content readiness:</strong> if text, prices and images come ready from you, work is faster. If the designer writes the copy, copywriting is priced separately.</li>
  <li><strong>Images:</strong> your own product photos, licensed stock images or a new photo shoot.</li>
  <li><strong>Languages:</strong> Azerbaijani, Russian and English versions each mean a separate layout.</li>
  <li><strong>Size adaptation:</strong> adapting one banner to 5 different sizes requires redesign.</li>
  <li><strong>Revision rounds:</strong> write the number of included revisions into the contract.</li>
</ul>

<h2>Before Sending to the Printer: Technical Checklist</h2>
<ol>
  <li><strong>CMYK colour model:</strong> screens use RGB, print uses CMYK. Bright RGB colours can look dull in print. For brand colours, use the CMYK or Pantone code from the brand book.</li>
  <li><strong>Image resolution:</strong> usually 300 DPI for items viewed up close (business cards, booklets). Large banners viewed from a distance need lower DPI; ask your printer for the exact requirement.</li>
  <li><strong>Bleed:</strong> the background extends beyond the trim line, usually by 2–5 mm. Otherwise white strips remain after cutting.</li>
  <li><strong>Safe zone:</strong> text and logo sit at least a few millimetres inside the trim line.</li>
  <li><strong>Fonts:</strong> converted to outlines or embedded. Azerbaijani letters (ə, ğ, ş, ı) are checked.</li>
  <li><strong>Black:</strong> small text in pure black (K) only; for large black areas, the "rich black" mix your printer recommends.</li>
  <li><strong>File format:</strong> usually PDF for print (to the printer's standard), sometimes TIFF for banners.</li>
  <li><strong>Proof print:</strong> before a large run, print one sample to check colour and text.</li>
</ol>
<p>The simplest rule: before work begins, get the chosen printer's <strong>technical requirements</strong> (size, bleed, format, colour profile) in writing and give them to the designer.</p>

<h2>Outdoor Advertising: Permit and State Fee</h2>
<p>The banner design is ready, but design alone is not enough to hang it on the street. In Azerbaijan, placing outdoor advertising requires a <strong>permit</strong>, and under Article 33-1 of the Law "On State Duty" a state fee is paid per square metre. The fee amounts were approved by a Presidential decree of 19 December 2017. Under the decree, base amounts per m² for a one-year permit are:</p>
<table>
  <thead>
    <tr><th>Advertising carrier</th><th>Per m², 1 year (AZN)</th></tr>
  </thead>
  <tbody>
    <tr><td>Billboard, megaboard</td><td>15</td></tr>
    <tr><td>Electronic carriers (monitor, screen, display board)</td><td>50</td></tr>
    <tr><td>Rollers</td><td>40</td></tr>
    <tr><td>Bracket panels, wall panels, rooftop letters, facade ads, awnings, flags</td><td>10</td></tr>
  </tbody>
</table>
<p>The amount is multiplied by a zone coefficient: Baku 1; Ganja, Sumgait and Khirdalan 0.8; Absheron settlements, Mingachevir, Shirvan, Lankaran, Shaki, Gabala, Guba and some other cities 0.7; all other areas 0.5. For less than a year, the amount is divided by 12 and multiplied by the number of months.</p>
<p><strong>Example:</strong> a one-year fee for a 3 m² facade ad in Baku: 3 × 10 × 1 = AZN 30. For a billboard face of the same size in Ganja: 3 × 15 × 0.8 = AZN 36.</p>
<p>These figures are based on the official decree, but rules can change. Before installing an ad, confirm the current amount and permit procedure with the local executive authority.</p>

<h2>Digital Banners: How They Differ from Print</h2>
<ul>
  <li><strong>Colour:</strong> RGB, because they are shown on screens.</li>
  <li><strong>Sizes:</strong> widely used sizes for websites and ad networks are 300×250, 728×90, 300×600 and 320×100 pixels. For social media, check the platform's current recommendations.</li>
  <li><strong>File size:</strong> keep it light; heavy banners slow the site down (see <a href="/blog-details/website-speed-core-web-vitals-2026">website speed</a>).</li>
  <li><strong>Message:</strong> readable in 1–2 seconds: one offer, one button.</li>
</ul>
<p>If you are preparing banners for Google Display, see budget and campaign rules in <a href="/blog-details/google-ads-azerbaijan-cost-guide-2027">Google Ads in Azerbaijan 2027</a>.</p>

<h2>5 Rules of a Good Advertising Banner</h2>
<ol>
  <li><strong>One main message:</strong> a driver looks at a billboard for 2–3 seconds. A long list will not be read.</li>
  <li><strong>Large, high-contrast text:</strong> dark on light, light on dark.</li>
  <li><strong>Clear contact:</strong> a short phone number, website or QR code (QR works on carriers viewed up close).</li>
  <li><strong>Brand recognition:</strong> logo and brand colours are the same on every carrier.</li>
  <li><strong>Measurable results:</strong> use a separate promo code or QR link per campaign so you know which ad brought customers.</li>
</ol>
<p>For restaurants and cafés, it helps to plan the printed menu together with a QR menu: <a href="/blog-details/qr-menu-for-cafe-restaurant-2026">QR menu for cafés and restaurants</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does business card design cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Roughly AZN 30–100 in the Azerbaijani market. It is cheaper if a corporate identity already exists. Printing is paid to the printer separately.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What format should a print file be?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Usually a PDF in CMYK with bleed and fonts converted to outlines; 300 DPI for items viewed up close. Get the exact requirements from your printer in writing.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do I need a permit for a street banner?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Outdoor advertising requires a permit and a state fee per square metre. The amount depends on the carrier type, duration and zone coefficient.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the state fee for a billboard?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Under the 2017 decree, the base amount for billboards and megaboards is AZN 15 per m² per year, multiplied by a zone coefficient: 1 in Baku, 0.8 in Ganja, Sumgait and Khirdalan. Confirm the current amount with the local executive authority.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Why does the colour look different in print than on screen?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Screens use the RGB colour model and print uses CMYK, and some bright RGB colours cannot be reproduced in CMYK. Specify colours with CMYK or Pantone codes and make a proof print before a large run.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>In print and banner design, technical preparation matters as much as price: CMYK, correct resolution, bleed and the printer's requirements. For outdoor advertising, also budget for the permit and state fee on top of design. Using the same corporate identity across all materials speeds up brand recognition.</p>
<p><strong>Need a booklet, menu, banner or other print material? <a href="/contact">Write to us</a></strong>. No logo yet? See <a href="/logo-design">logo design</a>. All services: <a href="/services">services</a>.</p>
<p><small><em>Design prices are approximate ranges for the Azerbaijani market (October 2026). State fee information is based on the Presidential decree of 19 December 2017 (president.az). Confirm current amounts and permit rules with the official authorities.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Буклеты приходят из типографии: по краям белая полоса, логотип размыт, а синий, который на экране выглядел ярким, на бумаге вышел серым. Деньги потрачены и на дизайн, и на печать, а результат не годится. Большинство ошибок в дизайне полиграфии связано не со вкусом, а с <strong>технической подготовкой</strong>.</p>
<p>В статье — ориентировочные цены 2027 года на дизайн полиграфии и рекламных баннеров в Азербайджане, технический чек-лист перед отправкой файлов в типографию и правила разрешения и госпошлины для наружной рекламы.</p>

<h2>Коротко: цены на дизайн</h2>
<table>
  <thead>
    <tr><th>Продукт</th><th>Цена дизайна (AZN, ориент.)</th><th>Примечание</th></tr>
  </thead>
  <tbody>
    <tr><td>Визитка</td><td>30 – 100</td><td>Двусторонняя; дешевле, если есть фирменный стиль</td></tr>
    <tr><td>Флаер / листовка</td><td>50 – 150</td><td>A5, A4, одна или две стороны</td></tr>
    <tr><td>Буклет (2–3 сгиба)</td><td>100 – 300</td><td>Если тексты и фото готовы</td></tr>
    <tr><td>Каталог / брошюра</td><td>15 – 50 за страницу</td><td>Зависит от объёма и обработки фото</td></tr>
    <tr><td>Меню ресторана</td><td>100 – 400</td><td>Печатная и QR-версия вместе</td></tr>
    <tr><td>Уличный баннер, билборд, ролл-ап</td><td>80 – 300</td><td>Один размер; дополнительные — отдельно</td></tr>
    <tr><td>Набор цифровых баннеров</td><td>50 – 250</td><td>Сайт, Google Display, соцсети</td></tr>
  </tbody>
</table>
<p>Это цены <strong>только за дизайн</strong>. Печать (бумага, тираж, ламинация, материал баннера, монтаж) оплачивается типографии отдельно. Если логотипа и фирменного стиля ещё нет, выгоднее начать с них: см. <a href="/blog-details/firmennyj-stil-brendbuk-azerbaydzhan-2027">фирменный стиль и брендбук</a>.</p>

<h2>Что влияет на цену?</h2>
<ul>
  <li><strong>Готовность контента:</strong> если тексты, цены и фото приходят от вас готовыми, работа идёт быстрее. Если тексты пишет дизайнер, копирайтинг оценивается отдельно.</li>
  <li><strong>Изображения:</strong> ваши фото продукции, лицензионные стоковые фото или новая съёмка.</li>
  <li><strong>Языки:</strong> азербайджанская, русская и английская версии — каждая отдельный макет.</li>
  <li><strong>Адаптация размеров:</strong> адаптация одного баннера под 5 размеров требует переработки.</li>
  <li><strong>Круги правок:</strong> укажите в договоре, сколько правок входит в цену.</li>
</ul>

<h2>Перед отправкой в типографию: технический чек-лист</h2>
<ol>
  <li><strong>Цветовая модель CMYK:</strong> экран работает в RGB, печать — в CMYK. Яркие RGB-цвета в печати могут выйти тусклыми. Для фирменных цветов используйте CMYK или Pantone из брендбука.</li>
  <li><strong>Разрешение:</strong> обычно 300 DPI для продукции, которую рассматривают вблизи (визитки, буклеты). Для крупных баннеров, видимых издалека, достаточно меньшего DPI; точное требование уточните у типографии.</li>
  <li><strong>Вылеты (bleed):</strong> фон выходит за линию реза, обычно на 2–5 мм. Иначе после резки по краям остаются белые полосы.</li>
  <li><strong>Безопасная зона:</strong> текст и логотип — минимум на несколько миллиметров внутрь от линии реза.</li>
  <li><strong>Шрифты:</strong> переведены в кривые или встроены. Проверены азербайджанские буквы (ə, ğ, ş, ı).</li>
  <li><strong>Чёрный цвет:</strong> мелкий текст — только чистым чёрным (K); для больших чёрных плашек — «глубокий чёрный» по рекомендации типографии.</li>
  <li><strong>Формат файла:</strong> обычно PDF по стандарту типографии, для баннеров иногда TIFF.</li>
  <li><strong>Пробная печать:</strong> перед большим тиражом напечатайте образец и проверьте цвет и текст.</li>
</ol>
<p>Самое простое правило: до начала работы получите от выбранной типографии <strong>технические требования</strong> (размер, вылеты, формат, цветовой профиль) письменно и передайте их дизайнеру.</p>

<h2>Наружная реклама: разрешение и госпошлина</h2>
<p>Дизайн баннера готов, но чтобы повесить его на улице, одного дизайна мало. В Азербайджане для размещения наружной рекламы нужно <strong>разрешение</strong>, а согласно статье 33-1 Закона «О государственной пошлине» за каждый квадратный метр уплачивается госпошлина. Размеры пошлины утверждены Указом Президента от 19 декабря 2017 года. По указу базовые суммы за 1 м² при разрешении на год:</p>
<table>
  <thead>
    <tr><th>Рекламоноситель</th><th>За 1 м², 1 год (AZN)</th></tr>
  </thead>
  <tbody>
    <tr><td>Билборд, мегаборд</td><td>15</td></tr>
    <tr><td>Электронные носители (мониторы, экраны, табло)</td><td>50</td></tr>
    <tr><td>Роллеры</td><td>40</td></tr>
    <tr><td>Кронштейн-панели, настенные панели, крышные буквы, фасадная реклама, маркизы, флаги</td><td>10</td></tr>
  </tbody>
</table>
<p>Сумма умножается на территориальный коэффициент: Баку 1; Гянджа, Сумгайыт и Хырдалан 0,8; посёлки Абшерона, Мингячевир, Ширван, Ленкорань, Шеки, Габала, Губа и некоторые другие города 0,7; остальные территории 0,5. При сроке меньше года сумма делится на 12 и умножается на число месяцев.</p>
<p><strong>Пример:</strong> годовая пошлина за фасадную рекламу 3 м² в Баку: 3 × 10 × 1 = 30 AZN. За сторону билборда того же размера в Гяндже: 3 × 15 × 0,8 = 36 AZN.</p>
<p>Цифры основаны на официальном указе, но правила могут меняться. Перед установкой рекламы уточните действующую сумму и порядок получения разрешения в местном органе исполнительной власти.</p>

<h2>Цифровые баннеры: отличие от печати</h2>
<ul>
  <li><strong>Цвет:</strong> RGB, так как показ на экране.</li>
  <li><strong>Размеры:</strong> распространённые размеры для сайтов и рекламных сетей — 300×250, 728×90, 300×600 и 320×100 пикселей. Для соцсетей проверяйте актуальные рекомендации платформы.</li>
  <li><strong>Вес файла:</strong> должен быть небольшим, тяжёлый баннер замедляет сайт (см. <a href="/blog-details/skorost-sajta-core-web-vitals-2026">скорость сайта</a>).</li>
  <li><strong>Сообщение:</strong> читается за 1–2 секунды: одно предложение, одна кнопка.</li>
</ul>
<p>Если готовите баннеры для медийной рекламы Google, о бюджете и правилах кампаний: <a href="/blog-details/google-ads-azerbaydzhan-2027">Google Ads в Азербайджане 2027</a>.</p>

<h2>5 правил хорошего рекламного баннера</h2>
<ol>
  <li><strong>Одно главное сообщение:</strong> водитель смотрит на билборд 2–3 секунды. Длинный список не прочитают.</li>
  <li><strong>Крупный контрастный текст:</strong> тёмный на светлом, светлый на тёмном.</li>
  <li><strong>Понятный контакт:</strong> короткий номер, сайт или QR-код (QR работает на носителях, которые рассматривают вблизи).</li>
  <li><strong>Узнаваемость бренда:</strong> логотип и фирменные цвета одинаковы на всех носителях.</li>
  <li><strong>Измеримый результат:</strong> отдельный промокод или QR-ссылка для каждой кампании, чтобы понимать, какая реклама привела клиентов.</li>
</ol>
<p>Ресторанам и кафе полезно продумывать печатное меню вместе с QR-меню: <a href="/blog-details/qr-menyu-dlya-kafe-i-restorana-2026">QR-меню для кафе и ресторана</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит дизайн визитки?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">На рынке Азербайджана ориентировочно 30–100 AZN. Дешевле, если уже есть фирменный стиль. Печать оплачивается типографии отдельно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">В каком формате нужен файл для печати?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Обычно PDF в CMYK, с вылетами и шрифтами в кривых; 300 DPI для продукции, которую рассматривают вблизи. Точные требования получите от типографии письменно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли разрешение на уличный баннер?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Для наружной рекламы нужно разрешение и уплата госпошлины за каждый квадратный метр. Сумма зависит от типа носителя, срока и территориального коэффициента.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какая госпошлина за билборд?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">По указу 2017 года базовая сумма для билбордов и мегабордов — 15 AZN за 1 м² в год, умноженная на коэффициент: 1 в Баку, 0,8 в Гяндже, Сумгайыте и Хырдалане. Действующую сумму уточните в местном органе исполнительной власти.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Почему цвет в печати отличается от экрана?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Экран работает в цветовой модели RGB, печать — в CMYK, и некоторые яркие RGB-цвета в CMYK не воспроизводятся. Задавайте цвета кодами CMYK или Pantone и делайте пробную печать перед большим тиражом.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>В дизайне полиграфии и баннеров техническая подготовка важна не меньше цены: CMYK, правильное разрешение, вылеты и требования типографии. Для наружной рекламы заложите в бюджет, помимо дизайна, разрешение и госпошлину. Единый фирменный стиль на всех материалах ускоряет узнаваемость бренда.</p>
<p><strong>Нужен буклет, меню, баннер или другая полиграфия? <a href="/kontakty">Напишите нам</a></strong>. Логотипа ещё нет? См. <a href="/razrabotka-logo">разработка логотипа</a>. Все услуги: <a href="/uslugi">услуги</a>.</p>
<p><small><em>Цены на дизайн — ориентировочные диапазоны рынка Азербайджана (октябрь 2026). Информация о госпошлине основана на Указе Президента Азербайджанской Республики от 19 декабря 2017 года (president.az). Действующие суммы и порядок выдачи разрешений уточняйте в официальных органах.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'cap-dizayni-reklam-banneri-qiymeti-2027'],
            [
                'slug_en' => 'print-design-banner-cost-azerbaijan-2027',
                'slug_ru' => 'stoimost-dizajna-poligrafii-bannera-2027',

                'title_az' => 'Çap Dizaynı və Reklam Banneri Qiyməti Azərbaycanda 2027: Vizit Kartdan Bilborda',
                'title_en' => 'Print Design and Advertising Banner Cost in Azerbaijan 2027: From Business Cards to Billboards',
                'title_ru' => 'Стоимость дизайна полиграфии и рекламных баннеров в Азербайджане 2027: от визитки до билборда',

                'review_az' => 'Vizit kart, buklet, menyu, banner və bilbord dizaynı neçəyə başa gəlir? Təxmini qiymətlər, mətbəə üçün texniki yoxlama (CMYK, 300 DPI, bleed), küçə reklamı üçün icazə və hər m² üçün dövlət rüsumu.',
                'review_en' => 'What business card, booklet, menu, banner and billboard design costs: approximate prices, a technical checklist for the printer (CMYK, 300 DPI, bleed), and outdoor advertising permits and the per-m² state fee.',
                'review_ru' => 'Сколько стоит дизайн визитки, буклета, меню, баннера и билборда: ориентировочные цены, технический чек-лист для типографии (CMYK, 300 DPI, вылеты), разрешение на наружную рекламу и госпошлина за м².',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '26 Oktyabr 2026',
                'date_en' => 'October 26, 2026',
                'date_ru' => '26 Октября 2026',

                'photo'    => 'cover-print-banner-az.png',
                'photo_en' => 'cover-print-banner-en.png',
                'photo_ru' => 'cover-print-banner-ru.png',

                'meta_title_az' => 'Çap Dizaynı və Banner Qiyməti 2027 | RS Code',
                'meta_title_en' => 'Print Design & Banner Cost Azerbaijan 2027 | RS Code',
                'meta_title_ru' => 'Дизайн полиграфии и баннеров: цены 2027 | RS Code',

                'meta_description_az' => 'Vizit kart, buklet, menyu və banner dizaynı neçəyədir? 2027 qiymətləri, mətbəə üçün texniki yoxlama, küçə reklamına icazə və dövlət rüsumu (bilbord 15 ₼/m²).',
                'meta_description_en' => 'How much does business card, booklet, menu and banner design cost in Azerbaijan? 2027 prices, printer checklist, outdoor ad permits and state fee.',
                'meta_description_ru' => 'Сколько стоит дизайн визитки, буклета, меню и баннера в Азербайджане? Цены 2027, чек-лист для типографии, разрешение и госпошлина на наружную рекламу.',

                'meta_keywords_az' => 'çap dizaynı qiyməti, banner dizaynı, vizit kart dizaynı, buklet dizaynı, bilbord reklam, açıq məkanda reklam icazəsi, çap dizaynı 2027',
                'meta_keywords_en' => 'print design cost azerbaijan, banner design baku, business card design, billboard advertising azerbaijan, outdoor advertising permit, print design 2027',
                'meta_keywords_ru' => 'дизайн полиграфии цена, дизайн баннера баку, дизайн визитки, билборд азербайджан, разрешение наружная реклама, полиграфия 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
