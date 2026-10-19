<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog54LogoCostSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>"Loqo neçəyə olar?" sualına Azərbaycanda 20 manatdan 3 000 manata qədər cavab almaq mümkündür. Fərq təkcə dizaynerin adında deyil: bir variantda sizə tək PNG şəkil verilir, digərində isə saytda, vizit kartında, vitrin lövhəsində və Instagram avatarında eyni dərəcədə yaxşı görünən, hüquqi cəhətdən sizə məxsus olan bir brend işarəsi.</p>
<p>Bu yazıda 2026-cı ildə loqo dizaynının bazar qiymətlərini, qiymətə nəyin təsir etdiyini, prosesin necə getdiyini, sonda hansı faylları almalı olduğunuzu və əmtəə nişanı qeydiyyatını izah edirik.</p>

<h2>Qısa Cavab: Loqo Dizaynı Qiymətləri 2026</h2>
<p>Aşağıdakı rəqəmlər Azərbaycan bazarında rast gəlinən <strong>təxmini</strong> diapazonlardır. Dəqiq qiymət brifdən, konsepsiya sayından və təhvil veriləcək materiallardan asılıdır.</p>
<table>
  <thead>
    <tr><th>Variant</th><th>Qiymət (AZN)</th><th>Müddət</th><th>Nə alırsınız</th></tr>
  </thead>
  <tbody>
    <tr><td>Hazır şablon / AI generator</td><td>0 – 50</td><td>Bir neçə dəqiqə</td><td>Unikal olmayan işarə, çox vaxt yalnız PNG</td></tr>
    <tr><td>Başlanğıc frilanser</td><td>50 – 200</td><td>2 – 5 gün</td><td>1–2 variant, məhdud düzəliş</td></tr>
    <tr><td>Təcrübəli dizayner / studiya</td><td>200 – 600</td><td>1 – 2 həftə</td><td>Brif, araşdırma, 2–3 konsepsiya, düzəlişlər, tam fayl paketi</td></tr>
    <tr><td>Loqo + korporativ üslub</td><td>600 – 2 000</td><td>2 – 4 həftə</td><td>Loqo, rəng və şrift sistemi, brendbuk, vizit kartı, blank</td></tr>
    <tr><td>Agentlik, tam rebrendinq</td><td>2 000+</td><td>1 – 3 ay</td><td>Bazar araşdırması, ad/şüar, bütün daşıyıcılar üçün sistem</td></tr>
  </tbody>
</table>
<p>Kiçik biznes üçün ən çox seçilən və qiymət/nəticə baxımından ən balanslı variant <strong>təcrübəli dizayner və ya studiya</strong> səviyyəsidir. Brend artıq böyüyübsə və çoxlu daşıyıcı (paket, geyim, filiallar) varsa, korporativ üslub da lazım olur.</p>

<h2>Loqo Qiymətinə Nə Təsir Edir?</h2>
<ul>
  <li><strong>Araşdırma:</strong> rəqiblərin və sahənin loqolarına baxılırmı, yoxsa dizayner birbaşa çəkməyə başlayır? Araşdırmasız loqo çox vaxt rəqibinkinə bənzəyir.</li>
  <li><strong>Konsepsiya sayı:</strong> 1 variant ilə 3 fərqli istiqamət arasında iş həcmi təxminən üç dəfə fərqlənir.</li>
  <li><strong>Düzəliş raundları:</strong> neçə dəfə dəyişiklik istəyə biləcəyinizi əvvəlcədən yazılı razılaşdırın.</li>
  <li><strong>Loqonun növü:</strong> sadə yazı (wordmark) adətən daha ucuz, xüsusi illüstrasiya və ya maskot daha bahalıdır.</li>
  <li><strong>Fayl paketi:</strong> vektor fayllar, tünd/açıq fon versiyaları, favicon və sosial şəbəkə ikonları ayrıca iş tələb edir.</li>
  <li><strong>Hüquqların ötürülməsi:</strong> müqavilədə loqonun bütün hüquqlarının sizə keçdiyi yazılmalıdır.</li>
  <li><strong>Təcili iş:</strong> 1–2 günə hazır loqo adətən ya daha bahalı, ya da daha zəif olur.</li>
</ul>

<h2>Loqo Dizaynı Prosesi Addım-Addım</h2>
<ol>
  <li><strong>Brif.</strong> Biznesin sahəsi, auditoriya, dəyərlər, bəyəndiyiniz və bəyənmədiyiniz nümunələr, loqonun harada istifadə olunacağı. Necə doldurulduğunu <a href="/blog-details/brif-nece-doldurulur-2026">brif bələdçimizdə</a> izah etmişik.</li>
  <li><strong>Araşdırma.</strong> Rəqiblərin loqoları, sahədə istifadə olunan rənglər və işarələr. Məqsəd fərqlənməkdir, təkrarlamaq yox.</li>
  <li><strong>Eskizlər.</strong> Kağızda və ya ekranda onlarla ideya; ən güclü 2–3-ü seçilir.</li>
  <li><strong>Konsepsiyaların təqdimatı.</strong> Hər variant real mühitdə göstərilir: vizit kartı, sayt başlığı, telefon ikonu, vitrin lövhəsi.</li>
  <li><strong>Düzəlişlər.</strong> Seçilmiş istiqamət üzərində rəng, şrift və proporsiya dəqiqləşdirilir.</li>
  <li><strong>Final və təhvil.</strong> Bütün formatlar, rəng kodları və qısa istifadə qaydası verilir.</li>
</ol>

<h2>Sonda Hansı Faylları Almalısınız?</h2>
<p>Ən çox rast gəlinən problem: loqo "hazırdır", amma əlinizdə yalnız ağ fonlu bir JPG var. Çap evi vektor istəyir, sayt şəffaf fon istəyir, Instagram kvadrat ikon istəyir. Təhvil zamanı bu siyahını yoxlayın:</p>
<table>
  <thead>
    <tr><th>Fayl</th><th>Nə üçün lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>SVG</td><td>Sayt və tətbiq: istənilən ölçüdə kəskin, yüngül</td></tr>
    <tr><td>PDF / AI / EPS (vektor)</td><td>Çap evi, lövhə, paket, geyim üzərində çap</td></tr>
    <tr><td>PNG (şəffaf fon)</td><td>Prezentasiya, sənəd, sosial şəbəkə postları</td></tr>
    <tr><td>Tünd və açıq fon versiyası</td><td>Saytın tünd rejimi, qara və ağ fonlu materiallar</td></tr>
    <tr><td>Monoxrom versiya</td><td>Möhür, qravüra, bir rəngli çap, faks/qəbz</td></tr>
    <tr><td>İkon (işarə tək)</td><td>Favicon, tətbiq ikonu, Instagram/WhatsApp avatarı</td></tr>
    <tr><td>Rəng kodları</td><td>HEX/RGB (ekran) və CMYK/Pantone (çap)</td></tr>
    <tr><td>Şriftlərin adı və lisenziyası</td><td>Sayt, menyu və reklam materiallarında eyni şriftdən istifadə</td></tr>
  </tbody>
</table>

<h2>Bizim Təcrübə: RS Code-un Öz Rebrendinqi</h2>
<p>2026-cı ilin oktyabrında öz loqomuzu yenilədik ("Fikirdən məhsula"). Proses yuxarıdakı addımlarla getdi: əvvəlcə bir neçə konsepsiya hazırlandı, sonra seçilmiş variant (S xətti və iki düyün) bir mənbə fayldan aşağıdakılara çevrildi:</p>
<ul>
  <li>tünd və açıq rejim üçün iki ayrı yazılı loqo (wordmark);</li>
  <li>brauzer üçün favicon və iPhone üçün apple-touch ikonu;</li>
  <li>telefona quraşdırılan veb tətbiq (PWA) üçün 192 və 512 piksel ikonlar;</li>
  <li>sosial şəbəkələrdə link paylaşılanda görünən önizləmə şəkli (og-image).</li>
</ul>
<p>Bu nümunə göstərir ki, loqo tək bir şəkil deyil, onlarla yerdə istifadə olunan sistemdir. Dizayner bunları əvvəlcədən nəzərə almırsa, sonradan hər daşıyıcı üçün ayrıca pul və vaxt sərf olunur.</p>

<h2>Ucuz Loqonun Gizli Xərcləri</h2>
<ul>
  <li><strong>Şablon və ya stok işarə:</strong> eyni loqonu başqa şirkət də istifadə edə bilər. Bu həm brendi zəiflədir, həm də qeydiyyatda problem yarada bilər.</li>
  <li><strong>Yalnız rastr fayl:</strong> lövhə və ya banner üçün böyüdəndə piksellər görünür, loqonu yenidən çəkdirmək lazım gəlir.</li>
  <li><strong>Kiçik ölçüdə oxunmur:</strong> incə xətlər və uzun yazılar favicon və avatarda itir.</li>
  <li><strong>Hüquqi qeyri-müəyyənlik:</strong> müqavilə yoxdursa, loqonun hüquqları kimə məxsus olduğu sual altında qalır.</li>
  <li><strong>Tez köhnəlmə:</strong> trendə uyğun, amma mənasız loqo 1–2 ildən sonra yenidən dəyişdirilir və müştərilər brendi tanımaqda çətinlik çəkir. Saytın yenilənməsi kimi, loqonun yenilənməsi də tanınma riskidir; bax: <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">saytı yeniləmənin 7 əlaməti</a>.</li>
</ul>

<h2>AI ilə Loqo: Olarmı?</h2>
<p>AI generatorları ideya və istiqamət tapmaq üçün faydalıdır: bir neçə dəqiqəyə onlarla variant görmək olar. Amma son loqo kimi istifadə edərkən diqqətli olun:</p>
<ul>
  <li>nəticə çox vaxt rastr şəkildir və vektora çevrilməsi əlavə iş tələb edir;</li>
  <li>unikal olduğuna zəmanət yoxdur: oxşar işarə başqasında da ola bilər;</li>
  <li>yazılarda hərflər tez-tez təhrif olunur, xüsusən "ə", "ş", "ğ" kimi Azərbaycan hərflərində;</li>
  <li>kiçik ölçüdə və bir rəngdə necə görünəcəyi yoxlanılmır.</li>
</ul>
<p>Praktik yol: AI ilə istiqaməti tapın, son işarəni isə dizaynerə vektor şəklində, bütün versiyaları ilə hazırlatdırın.</p>

<h2>Əmtəə Nişanı Qeydiyyatı: Loqonuzu Qoruyun</h2>
<p>Loqo hazır olandan sonra onu əmtəə nişanı kimi qeydiyyata almaq brendi hüquqi cəhətdən qoruyur. Azərbaycanda bu, "Əmtəə nişanları və coğrafi göstəricilər haqqında" Qanunla tənzimlənir, qeydiyyatla <strong>Əqli Mülkiyyət Agentliyi</strong> məşğul olur.</p>
<ul>
  <li>Qanunun 21-ci maddəsinə görə qeydiyyat iddia sənədinin verildiyi tarixdən <strong>10 il</strong> qüvvədə olur.</li>
  <li>Bu müddət sahibin ərizəsi ilə, rüsum ödənilməklə, <strong>məhdudiyyətsiz olaraq hər dəfə 10 il</strong> uzadıla bilər.</li>
  <li>Qeydiyyat konkret mal və xidmət sinifləri üzrə aparılır. Ona görə də müraciətdən əvvəl oxşar nişanların olub-olmadığını yoxlatmaq məqsədəuyğundur.</li>
</ul>
<p>Rüsumlar və prosedur dəyişə bilər. Ərizədən əvvəl Agentliyin rəsmi saytından və ya patent vəkilindən dəqiq məlumat alın.</p>

<h2>Sifarişdən Əvvəl Dizaynerə Verin 8 Sual</h2>
<ol>
  <li>Neçə konsepsiya təqdim olunacaq?</li>
  <li>Neçə raund düzəliş qiymətə daxildir?</li>
  <li>Hansı fayl formatları təhvil veriləcək (SVG, PDF, PNG, monoxrom, ikon)?</li>
  <li>Loqonun bütün hüquqları müqavilə ilə mənə keçəcəkmi?</li>
  <li>İstifadə olunan şrift kommersiya məqsədi üçün lisenziyalıdırmı?</li>
  <li>Loqo real mühitdə (sayt, vizit kartı, lövhə) göstəriləcəkmi?</li>
  <li>Portfeldə mənim sahəmə yaxın işlər varmı?</li>
  <li>Ödəniş mərhələlərlə aparılırmı və iş nə vaxt təhvil veriləcək?</li>
</ol>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Azərbaycanda loqo dizaynı neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bazar üzrə təxminən: başlanğıc frilanser 50–200 AZN, təcrübəli dizayner və ya studiya 200–600 AZN, loqo ilə korporativ üslub 600–2 000 AZN. Dəqiq qiymət brifdən və təhvil veriləcək materiallardan asılıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Loqo hazırlanması nə qədər vaxt aparır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Brif, araşdırma, konsepsiyalar və düzəlişlərlə adətən 1–2 həftə. Korporativ üslub ilə birlikdə 2–4 həftə çəkir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Loqo ilə korporativ üslubun fərqi nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Loqo brendin işarəsidir. Korporativ üslub isə loqodan başqa rənglər, şriftlər, qrafik elementlər və onların vizit kartı, blank, sayt və sosial şəbəkələrdə necə istifadə olunacağı qaydalarıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Loqonun hansı faylları mütləq olmalıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ən azı SVG və PDF (vektor), şəffaf fonlu PNG, tünd və açıq fon versiyaları, monoxrom versiya, ayrıca ikon və rəng kodları (HEX, RGB, CMYK).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Əmtəə nişanı qeydiyyatı neçə il qüvvədə olur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">"Əmtəə nişanları və coğrafi göstəricilər haqqında" Qanuna görə iddia sənədinin verildiyi tarixdən 10 il. Müddət sahibin ərizəsi ilə, rüsum ödənilməklə, hər dəfə 10 il uzadıla bilər.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Loqonun qiyməti dizaynerin adından çox nə aldığınızdan asılıdır: araşdırma, bir neçə konsepsiya, düzəlişlər, tam fayl paketi və hüquqların sizə keçməsi. Ucuz variant çox vaxt sonradan yenidən çəkdirmə xərci gətirir.</p>
<p><strong>Biznesiniz üçün loqo və ya korporativ üslub lazımdırsa, <a href="/elaqe">bizə yazın</a></strong>. Brifə əsasən qiymət və müddəti dəqiqləşdirək. Ətraflı: <a href="/loqo-hazirlanmasi">loqo hazırlanması</a>, <a href="/isler">portfolio</a>, <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">veb sayt qiyməti 2026</a>.</p>
<p><small><em>Qiymətlər Azərbaycan bazarı üzrə təxmini diapazonlardır (Oktyabr 2026). Əmtəə nişanı ilə bağlı məlumat "Əmtəə nişanları və coğrafi göstəricilər haqqında" Qanunun 21-ci maddəsinə əsaslanır; hüquqi məsləhət deyil.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>Ask "how much does a logo cost?" in Azerbaijan and you can get answers from 20 to 3,000 manat. The gap is not just about the designer's name: one option gets you a single PNG, the other a brand mark that looks equally good on your website, business card, shop sign and Instagram avatar, and that legally belongs to you.</p>
<p>This article covers 2026 market prices for logo design in Azerbaijan, what drives the price, how the process works, which files you should receive and how trademark registration works.</p>

<h2>Short Answer: Logo Design Prices 2026</h2>
<p>The figures below are <strong>approximate</strong> ranges seen on the Azerbaijani market. The exact price depends on the brief, the number of concepts and the deliverables.</p>
<table>
  <thead>
    <tr><th>Option</th><th>Price (AZN)</th><th>Timeline</th><th>What you get</th></tr>
  </thead>
  <tbody>
    <tr><td>Template / AI generator</td><td>0 – 50</td><td>Minutes</td><td>Non-unique mark, often PNG only</td></tr>
    <tr><td>Entry-level freelancer</td><td>50 – 200</td><td>2 – 5 days</td><td>1–2 options, limited revisions</td></tr>
    <tr><td>Experienced designer / studio</td><td>200 – 600</td><td>1 – 2 weeks</td><td>Brief, research, 2–3 concepts, revisions, full file pack</td></tr>
    <tr><td>Logo + corporate identity</td><td>600 – 2,000</td><td>2 – 4 weeks</td><td>Logo, colour and type system, brand book, business card, letterhead</td></tr>
    <tr><td>Agency, full rebrand</td><td>2,000+</td><td>1 – 3 months</td><td>Market research, name/tagline, system for all touchpoints</td></tr>
  </tbody>
</table>
<p>For a small business, the most popular and best-balanced option is an <strong>experienced designer or studio</strong>. Once a brand has grown and uses many touchpoints (packaging, uniforms, branches), a corporate identity becomes necessary too.</p>

<h2>What Drives the Price of a Logo?</h2>
<ul>
  <li><strong>Research:</strong> does the designer study competitors and the industry, or start drawing straight away? Logos made without research often resemble a competitor's.</li>
  <li><strong>Number of concepts:</strong> one option versus three distinct directions is roughly three times the work.</li>
  <li><strong>Revision rounds:</strong> agree in writing in advance how many changes you can request.</li>
  <li><strong>Logo type:</strong> a simple wordmark is usually cheaper; a custom illustration or mascot costs more.</li>
  <li><strong>File pack:</strong> vector files, dark/light versions, favicon and social icons take extra work.</li>
  <li><strong>Transfer of rights:</strong> the contract should state that all rights to the logo pass to you.</li>
  <li><strong>Rush jobs:</strong> a logo in 1–2 days is usually either more expensive or weaker.</li>
</ul>

<h2>The Logo Design Process Step by Step</h2>
<ol>
  <li><strong>Brief.</strong> Industry, audience, values, examples you like and dislike, where the logo will be used. See our <a href="/blog-details/how-to-write-project-brief-2026">brief guide</a>.</li>
  <li><strong>Research.</strong> Competitor logos, colours and symbols common in the industry. The goal is to stand out, not to copy.</li>
  <li><strong>Sketches.</strong> Dozens of ideas on paper or screen; the strongest 2–3 are selected.</li>
  <li><strong>Concept presentation.</strong> Each option is shown in context: business card, website header, phone icon, shop sign.</li>
  <li><strong>Revisions.</strong> Colour, typeface and proportions are refined on the chosen direction.</li>
  <li><strong>Final delivery.</strong> All formats, colour codes and short usage rules are handed over.</li>
</ol>

<h2>Which Files Should You Receive?</h2>
<p>The most common problem: the logo is "done", but all you have is one JPG on a white background. The print shop wants vector, the website needs a transparent background, Instagram needs a square icon. Check this list at delivery:</p>
<table>
  <thead>
    <tr><th>File</th><th>What it is for</th></tr>
  </thead>
  <tbody>
    <tr><td>SVG</td><td>Website and apps: sharp at any size, lightweight</td></tr>
    <tr><td>PDF / AI / EPS (vector)</td><td>Print shop, signage, packaging, apparel</td></tr>
    <tr><td>PNG (transparent)</td><td>Presentations, documents, social posts</td></tr>
    <tr><td>Dark and light versions</td><td>Website dark mode, black and white backgrounds</td></tr>
    <tr><td>Monochrome version</td><td>Stamps, engraving, one-colour print, receipts</td></tr>
    <tr><td>Icon (symbol only)</td><td>Favicon, app icon, Instagram/WhatsApp avatar</td></tr>
    <tr><td>Colour codes</td><td>HEX/RGB (screen) and CMYK/Pantone (print)</td></tr>
    <tr><td>Font names and licences</td><td>Using the same fonts on the website, menus and ads</td></tr>
  </tbody>
</table>

<h2>Our Experience: RS Code's Own Rebrand</h2>
<p>In October 2026 we updated our own logo ("From idea to product"). The process followed the steps above: first several concepts, then the chosen one (an S line with two nodes) was built from a single source file into:</p>
<ul>
  <li>two separate wordmarks for dark and light mode;</li>
  <li>a favicon for browsers and an apple-touch icon for iPhone;</li>
  <li>192 and 512 px icons for the installable web app (PWA);</li>
  <li>the preview image shown when a link is shared on social media (og-image).</li>
</ul>
<p>This shows that a logo is not a single picture but a system used in dozens of places. If the designer does not plan for this, every new touchpoint costs extra time and money later.</p>

<h2>The Hidden Costs of a Cheap Logo</h2>
<ul>
  <li><strong>Template or stock mark:</strong> another company may use the same logo. That weakens the brand and can cause problems at registration.</li>
  <li><strong>Raster file only:</strong> pixels show when scaled up for a sign or banner, so the logo has to be redrawn.</li>
  <li><strong>Unreadable at small sizes:</strong> thin lines and long text disappear in a favicon or avatar.</li>
  <li><strong>Legal uncertainty:</strong> without a contract, it is unclear who owns the rights.</li>
  <li><strong>Dates quickly:</strong> a trendy but meaningless logo gets replaced in 1–2 years, and customers struggle to recognise the brand. Like a website redesign, a logo change is a recognition risk; see <a href="/blog-details/signs-you-need-website-redesign-2026">7 signs you need a redesign</a>.</li>
</ul>

<h2>Can You Use AI for a Logo?</h2>
<p>AI generators are useful for finding ideas and direction: you can see dozens of options in minutes. Be careful about using the result as your final logo:</p>
<ul>
  <li>the output is usually a raster image and needs extra work to vectorise;</li>
  <li>there is no guarantee of uniqueness: someone else may have a similar mark;</li>
  <li>lettering is often distorted, especially Azerbaijani letters such as "ə", "ş", "ğ";</li>
  <li>nobody checks how it looks small or in one colour.</li>
</ul>
<p>A practical approach: use AI to find the direction, then have a designer produce the final mark in vector with all versions.</p>

<h2>Trademark Registration: Protect Your Logo</h2>
<p>Once the logo is ready, registering it as a trademark protects the brand legally. In Azerbaijan this is governed by the Law "On Trademarks and Geographical Indications", and registration is handled by the <strong>Intellectual Property Agency</strong>.</p>
<ul>
  <li>Under Article 21 of the Law, a registration is valid for <strong>10 years</strong> from the filing date.</li>
  <li>On the owner's application and payment of a fee, it can be renewed <strong>for further 10-year periods without limit</strong>.</li>
  <li>Registration covers specific classes of goods and services, so it is worth running a search for similar marks before filing.</li>
</ul>
<p>Fees and procedures may change. Before applying, check the Agency's official website or consult a patent attorney.</p>

<h2>8 Questions to Ask a Designer Before Ordering</h2>
<ol>
  <li>How many concepts will be presented?</li>
  <li>How many revision rounds are included?</li>
  <li>Which file formats will be delivered (SVG, PDF, PNG, monochrome, icon)?</li>
  <li>Will all rights to the logo pass to me under a contract?</li>
  <li>Is the font licensed for commercial use?</li>
  <li>Will the logo be shown in context (website, business card, signage)?</li>
  <li>Does the portfolio include work in my industry?</li>
  <li>Is payment staged, and when will the work be delivered?</li>
</ol>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does logo design cost in Azerbaijan?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Approximate market ranges: entry-level freelancer AZN 50–200, experienced designer or studio AZN 200–600, logo with corporate identity AZN 600–2,000. The exact price depends on the brief and deliverables.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to design a logo?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">With a brief, research, concepts and revisions, usually 1–2 weeks. With a corporate identity, 2–4 weeks.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the difference between a logo and a corporate identity?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The logo is the brand's mark. A corporate identity adds colours, fonts, graphic elements and rules for using them on business cards, letterheads, the website and social media.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Which logo files must I have?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">At minimum: SVG and PDF (vector), transparent PNG, dark and light versions, a monochrome version, a standalone icon and colour codes (HEX, RGB, CMYK).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long is a trademark registration valid in Azerbaijan?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Under the Law "On Trademarks and Geographical Indications", 10 years from the filing date. It can be renewed for further 10-year periods on the owner's application and payment of a fee.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>The price of a logo depends less on the designer's name than on what you actually get: research, several concepts, revisions, a full file pack and transfer of rights. A cheap option often leads to paying for a redraw later.</p>
<p><strong>Need a logo or corporate identity for your business? <a href="/contact">Write to us</a></strong> and we will confirm price and timeline based on your brief. More: <a href="/logo-design">logo design</a>, <a href="/portfolio">portfolio</a>, <a href="/blog-details/website-cost-azerbaijan-2026">website cost 2026</a>.</p>
<p><small><em>Prices are approximate ranges for the Azerbaijani market (October 2026). Trademark information is based on Article 21 of the Law "On Trademarks and Geographical Indications"; this is not legal advice.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>На вопрос «сколько стоит логотип?» в Азербайджане можно услышать ответы от 20 до 3 000 манатов. Разница не только в имени дизайнера: в одном случае вы получаете один PNG-файл, в другом — знак бренда, который одинаково хорошо выглядит на сайте, визитке, вывеске и аватаре в Instagram и юридически принадлежит вам.</p>
<p>В статье разбираем рыночные цены на разработку логотипа в 2026 году, от чего зависит стоимость, как идёт процесс, какие файлы вы должны получить и как зарегистрировать товарный знак.</p>

<h2>Коротко: цены на логотип 2026</h2>
<p>Ниже — <strong>ориентировочные</strong> диапазоны на рынке Азербайджана. Точная цена зависит от брифа, количества концепций и состава передаваемых материалов.</p>
<table>
  <thead>
    <tr><th>Вариант</th><th>Цена (AZN)</th><th>Срок</th><th>Что вы получаете</th></tr>
  </thead>
  <tbody>
    <tr><td>Шаблон / AI-генератор</td><td>0 – 50</td><td>Несколько минут</td><td>Неуникальный знак, часто только PNG</td></tr>
    <tr><td>Начинающий фрилансер</td><td>50 – 200</td><td>2 – 5 дней</td><td>1–2 варианта, ограниченные правки</td></tr>
    <tr><td>Опытный дизайнер / студия</td><td>200 – 600</td><td>1 – 2 недели</td><td>Бриф, исследование, 2–3 концепции, правки, полный пакет файлов</td></tr>
    <tr><td>Логотип + фирменный стиль</td><td>600 – 2 000</td><td>2 – 4 недели</td><td>Логотип, система цветов и шрифтов, брендбук, визитка, бланк</td></tr>
    <tr><td>Агентство, полный ребрендинг</td><td>2 000+</td><td>1 – 3 месяца</td><td>Исследование рынка, название/слоган, система для всех носителей</td></tr>
  </tbody>
</table>
<p>Для малого бизнеса самый популярный и сбалансированный вариант — <strong>опытный дизайнер или студия</strong>. Когда бренд вырос и носителей много (упаковка, униформа, филиалы), нужен и фирменный стиль.</p>

<h2>От чего зависит цена логотипа?</h2>
<ul>
  <li><strong>Исследование:</strong> изучает ли дизайнер конкурентов и отрасль или сразу начинает рисовать? Логотип без исследования часто похож на логотип конкурента.</li>
  <li><strong>Количество концепций:</strong> один вариант и три разных направления отличаются по объёму работы примерно втрое.</li>
  <li><strong>Раунды правок:</strong> заранее письменно согласуйте, сколько раз можно вносить изменения.</li>
  <li><strong>Тип логотипа:</strong> простой шрифтовой знак обычно дешевле, иллюстрация или маскот — дороже.</li>
  <li><strong>Пакет файлов:</strong> векторные файлы, версии для тёмного и светлого фона, favicon и иконки для соцсетей требуют отдельной работы.</li>
  <li><strong>Передача прав:</strong> в договоре должно быть указано, что все права на логотип переходят к вам.</li>
  <li><strong>Срочность:</strong> логотип за 1–2 дня обычно либо дороже, либо слабее.</li>
</ul>

<h2>Процесс разработки логотипа по шагам</h2>
<ol>
  <li><strong>Бриф.</strong> Сфера бизнеса, аудитория, ценности, примеры, которые нравятся и не нравятся, где будет использоваться логотип. Подробно — в нашем <a href="/blog-details/kak-zapolnit-brif-2026">руководстве по брифу</a>.</li>
  <li><strong>Исследование.</strong> Логотипы конкурентов, цвета и символы, принятые в отрасли. Цель — выделиться, а не повторить.</li>
  <li><strong>Эскизы.</strong> Десятки идей на бумаге или экране; выбираются 2–3 самые сильные.</li>
  <li><strong>Презентация концепций.</strong> Каждый вариант показывается в реальной среде: визитка, шапка сайта, иконка на телефоне, вывеска.</li>
  <li><strong>Правки.</strong> На выбранном направлении уточняются цвет, шрифт и пропорции.</li>
  <li><strong>Финал и передача.</strong> Передаются все форматы, коды цветов и краткие правила использования.</li>
</ol>

<h2>Какие файлы вы должны получить?</h2>
<p>Самая частая проблема: логотип «готов», но у вас только один JPG на белом фоне. Типографии нужен вектор, сайту — прозрачный фон, Instagram — квадратная иконка. Проверьте этот список при сдаче работы:</p>
<table>
  <thead>
    <tr><th>Файл</th><th>Для чего нужен</th></tr>
  </thead>
  <tbody>
    <tr><td>SVG</td><td>Сайт и приложения: чёткий в любом размере, лёгкий</td></tr>
    <tr><td>PDF / AI / EPS (вектор)</td><td>Типография, вывески, упаковка, печать на одежде</td></tr>
    <tr><td>PNG (прозрачный фон)</td><td>Презентации, документы, посты в соцсетях</td></tr>
    <tr><td>Версии для тёмного и светлого фона</td><td>Тёмная тема сайта, материалы на чёрном и белом фоне</td></tr>
    <tr><td>Монохромная версия</td><td>Печать, гравировка, одноцветная печать, чеки</td></tr>
    <tr><td>Иконка (только знак)</td><td>Favicon, иконка приложения, аватар Instagram/WhatsApp</td></tr>
    <tr><td>Коды цветов</td><td>HEX/RGB (экран) и CMYK/Pantone (печать)</td></tr>
    <tr><td>Названия шрифтов и лицензии</td><td>Одни и те же шрифты на сайте, в меню и рекламе</td></tr>
  </tbody>
</table>

<h2>Наш опыт: ребрендинг RS Code</h2>
<p>В октябре 2026 года мы обновили собственный логотип («От идеи к продукту»). Процесс шёл по шагам выше: сначала несколько концепций, затем выбранный вариант (линия S и два узла) из одного исходного файла превратился в:</p>
<ul>
  <li>два отдельных шрифтовых логотипа для тёмной и светлой темы;</li>
  <li>favicon для браузера и apple-touch иконку для iPhone;</li>
  <li>иконки 192 и 512 px для устанавливаемого веб-приложения (PWA);</li>
  <li>картинку превью, которая видна при публикации ссылки в соцсетях (og-image).</li>
</ul>
<p>Этот пример показывает, что логотип — не одна картинка, а система, которая используется в десятках мест. Если дизайнер не учитывает это заранее, каждый новый носитель потом требует отдельных денег и времени.</p>

<h2>Скрытые расходы дешёвого логотипа</h2>
<ul>
  <li><strong>Шаблон или стоковый знак:</strong> такой же логотип может использовать другая компания. Это ослабляет бренд и может помешать регистрации.</li>
  <li><strong>Только растровый файл:</strong> при увеличении для вывески или баннера видны пиксели, логотип приходится перерисовывать.</li>
  <li><strong>Не читается в малом размере:</strong> тонкие линии и длинный текст теряются в favicon и аватаре.</li>
  <li><strong>Юридическая неопределённость:</strong> без договора непонятно, кому принадлежат права.</li>
  <li><strong>Быстро устаревает:</strong> модный, но бессмысленный логотип меняют через 1–2 года, и клиенты перестают узнавать бренд. Как и редизайн сайта, смена логотипа — риск для узнаваемости; см. <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">7 признаков, что сайту нужен редизайн</a>.</li>
</ul>

<h2>Можно ли сделать логотип с помощью AI?</h2>
<p>AI-генераторы полезны для поиска идей и направления: за несколько минут можно увидеть десятки вариантов. Но использовать результат как финальный логотип стоит осторожно:</p>
<ul>
  <li>результат обычно растровый, и его перевод в вектор требует дополнительной работы;</li>
  <li>уникальность не гарантирована: похожий знак может быть у кого-то ещё;</li>
  <li>буквы часто искажаются, особенно азербайджанские «ə», «ş», «ğ»;</li>
  <li>никто не проверяет, как знак выглядит в малом размере и в одном цвете.</li>
</ul>
<p>Практичный путь: найдите направление с помощью AI, а финальный знак закажите дизайнеру в векторе и со всеми версиями.</p>

<h2>Регистрация товарного знака: защитите логотип</h2>
<p>Когда логотип готов, его регистрация как товарного знака юридически защищает бренд. В Азербайджане это регулируется Законом «О товарных знаках и географических указаниях», регистрацией занимается <strong>Агентство интеллектуальной собственности</strong>.</p>
<ul>
  <li>Согласно статье 21 Закона, регистрация действует <strong>10 лет</strong> с даты подачи заявки.</li>
  <li>По заявлению владельца и при оплате пошлины срок продлевается <strong>каждый раз на 10 лет без ограничения</strong>.</li>
  <li>Регистрация проводится по конкретным классам товаров и услуг, поэтому до подачи заявки разумно проверить наличие похожих знаков.</li>
</ul>
<p>Пошлины и процедура могут меняться. Перед подачей уточните информацию на официальном сайте Агентства или у патентного поверенного.</p>

<h2>8 вопросов дизайнеру перед заказом</h2>
<ol>
  <li>Сколько концепций будет представлено?</li>
  <li>Сколько раундов правок входит в цену?</li>
  <li>Какие форматы файлов будут переданы (SVG, PDF, PNG, монохром, иконка)?</li>
  <li>Перейдут ли ко мне все права на логотип по договору?</li>
  <li>Лицензирован ли шрифт для коммерческого использования?</li>
  <li>Покажете ли логотип в реальной среде (сайт, визитка, вывеска)?</li>
  <li>Есть ли в портфолио работы в моей сфере?</li>
  <li>Оплата поэтапная, и когда будет сдана работа?</li>
</ol>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит разработка логотипа в Азербайджане?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ориентировочно по рынку: начинающий фрилансер 50–200 AZN, опытный дизайнер или студия 200–600 AZN, логотип с фирменным стилем 600–2 000 AZN. Точная цена зависит от брифа и состава работ.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает создание логотипа?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">С брифом, исследованием, концепциями и правками — обычно 1–2 недели. Вместе с фирменным стилем — 2–4 недели.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Чем логотип отличается от фирменного стиля?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Логотип — это знак бренда. Фирменный стиль добавляет цвета, шрифты, графические элементы и правила их использования на визитках, бланках, сайте и в соцсетях.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какие файлы логотипа обязательно нужны?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Минимум: SVG и PDF (вектор), PNG с прозрачным фоном, версии для тёмного и светлого фона, монохромная версия, отдельная иконка и коды цветов (HEX, RGB, CMYK).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько действует регистрация товарного знака в Азербайджане?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">По Закону «О товарных знаках и географических указаниях» — 10 лет с даты подачи заявки. Срок можно продлевать каждый раз на 10 лет по заявлению владельца и при оплате пошлины.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Цена логотипа зависит не столько от имени дизайнера, сколько от того, что вы получаете: исследование, несколько концепций, правки, полный пакет файлов и передачу прав. Дешёвый вариант часто оборачивается расходами на перерисовку.</p>
<p><strong>Нужен логотип или фирменный стиль для бизнеса? <a href="/kontakty">Напишите нам</a></strong> — уточним цену и сроки по брифу. Подробнее: <a href="/razrabotka-logo">разработка логотипа</a>, <a href="/portfolio-ru">портфолио</a>, <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">стоимость сайта 2026</a>.</p>
<p><small><em>Цены — ориентировочные диапазоны рынка Азербайджана (октябрь 2026). Информация о товарных знаках основана на статье 21 Закона «О товарных знаках и географических указаниях»; это не юридическая консультация.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'loqo-dizayni-qiymeti-2026'],
            [
                'slug_en' => 'logo-design-cost-azerbaijan-2026',
                'slug_ru' => 'stoimost-logotipa-azerbaydzhan-2026',

                'title_az' => 'Loqo Dizaynı Qiyməti Azərbaycanda 2026: Necə Hazırlanır və Hansı Faylları Almalısınız?',
                'title_en' => 'Logo Design Cost in Azerbaijan 2026: The Process and Which Files You Should Get',
                'title_ru' => 'Стоимость логотипа в Азербайджане 2026: как создаётся и какие файлы вы должны получить',

                'review_az' => 'Loqo neçəyə olar? 2026 bazar qiymətləri (50–2 000+ AZN), qiymətə təsir edən amillər, dizayn prosesi, təhvil fayllarının siyahısı, AI loqonun riskləri və əmtəə nişanı qeydiyyatı.',
                'review_en' => 'How much does a logo cost? 2026 market prices (AZN 50–2,000+), what drives the price, the design process, a delivery file checklist, AI logo risks and trademark registration.',
                'review_ru' => 'Сколько стоит логотип? Цены рынка 2026 (50–2 000+ AZN), от чего зависит стоимость, процесс разработки, список файлов при сдаче, риски AI-логотипа и регистрация товарного знака.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '19 Oktyabr 2026',
                'date_en' => 'October 19, 2026',
                'date_ru' => '19 Октября 2026',

                'photo'    => 'cover-logo-cost-az.png',
                'photo_en' => 'cover-logo-cost-en.png',
                'photo_ru' => 'cover-logo-cost-ru.png',

                'meta_title_az' => 'Loqo Dizaynı Qiyməti Azərbaycanda 2026 | RS Code',
                'meta_title_en' => 'Logo Design Cost in Azerbaijan 2026 | RS Code',
                'meta_title_ru' => 'Стоимость логотипа в Азербайджане 2026 | RS Code',

                'meta_description_az' => 'Loqo neçəyə hazırlanır? 2026 qiymətləri 50–2 000+ AZN, dizayn prosesi, almalı olduğunuz fayllar (SVG, PDF, ikon), AI loqo riskləri və əmtəə nişanı qeydiyyatı.',
                'meta_description_en' => 'How much does a logo cost in Azerbaijan? 2026 prices AZN 50–2,000+, the design process, files you need (SVG, PDF, icon), AI logo risks and trademark registration.',
                'meta_description_ru' => 'Сколько стоит логотип в Азербайджане? Цены 2026: 50–2 000+ AZN, процесс разработки, нужные файлы (SVG, PDF, иконка), риски AI-логотипа и регистрация товарного знака.',

                'meta_keywords_az' => 'loqo dizaynı qiyməti, loqo hazırlanması, loqo sifarişi, korporativ üslub, brendbuk, əmtəə nişanı qeydiyyatı, loqo 2026',
                'meta_keywords_en' => 'logo design cost azerbaijan, logo design baku, corporate identity, brand book, trademark registration azerbaijan, logo 2026',
                'meta_keywords_ru' => 'стоимость логотипа, разработка логотипа баку, фирменный стиль, брендбук, регистрация товарного знака азербайджан, логотип 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
