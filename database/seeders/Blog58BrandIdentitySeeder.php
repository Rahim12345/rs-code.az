<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog58BrandIdentitySeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Loqo hazırdır, amma vizit kartda bir rəng, Instagram-da başqa rəng, mağazanın lövhəsində isə tamam fərqli şrift var. Müştəri bunu ad ilə izah edə bilməz, amma hiss edir: brend "dağınıq" görünür və etibar azalır. Bu problemi <strong>korporativ üslub</strong> və onu qaydaya salan <strong>brendbuk</strong> həll edir.</p>
<p>Bu yazıda 2027-ci il üçün korporativ üslubun nədən ibarət olduğunu, brendbuk ilə loqobukun fərqini, Azərbaycanda təxmini qiymətləri və sifariş verərkən hansı faylları tələb etməli olduğunuzu izah edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Paket</th><th>Nə daxildir</th><th>Təxmini qiymət (AZN)</th></tr>
  </thead>
  <tbody>
    <tr><td>Mini üslub</td><td>Loqo, rənglər, şriftlər, vizit kart, blank, sosial şəbəkə şablonları</td><td>500 – 1 500</td></tr>
    <tr><td>Loqobuk + əsas daşıyıcılar</td><td>Loqonun istifadə qaydaları, 10–20 daşıyıcı (bloknot, zərf, nişan, təqdimat şablonu)</td><td>1 500 – 4 000</td></tr>
    <tr><td>Tam brendbuk</td><td>Brend platforması, ünsiyyət tonu, foto üslubu, lövhə, interyer, forma, 40+ səhifə</td><td>4 000 – 15 000+</td></tr>
  </tbody>
</table>
<p>Loqonun öz qiyməti haqqında ayrıca yazımız var: <a href="/blog-details/loqo-dizayni-qiymeti-2026">Loqo dizaynı qiyməti Azərbaycanda</a>.</p>

<h2>Korporativ Üslub Nədir?</h2>
<p>Korporativ üslub (firma üslubu, vizual kimlik) brendin bütün daşıyıcılarda eyni cür tanınmasını təmin edən vizual elementlər sistemidir. Loqo onun yalnız bir hissəsidir. Əsas elementlər:</p>
<ul>
  <li><strong>Loqo və onun variantları:</strong> əsas, üfüqi, şaquli, yalnız işarə, ağ-qara və tərs (tünd fonda) versiyalar.</li>
  <li><strong>Rəng palitrası:</strong> əsas və köməkçi rənglər, hər biri üçün HEX/RGB (ekran), CMYK (çap) və lazım olduqda Pantone kodu.</li>
  <li><strong>Şriftlər:</strong> başlıq və mətn şriftləri, ölçü iyerarxiyası, Azərbaycan və rus hərflərinin (ə, ğ, ş, ı, ж, щ) dəstəklənməsi.</li>
  <li><strong>Qrafik elementlər:</strong> naxışlar, ikonlar, formalar, fotoşəkil və illüstrasiya üslubu.</li>
  <li><strong>Şablonlar:</strong> vizit kart, blank, e-poçt imzası, təqdimat, sosial şəbəkə postları.</li>
</ul>

<h2>Brendbuk, Loqobuk və Gaydlayn: Fərq Nədir?</h2>
<table>
  <thead>
    <tr><th>Sənəd</th><th>Nəyi əhatə edir</th><th>Kimə lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Loqobuk</td><td>Yalnız loqonun istifadəsi: ölçülər, boş sahə, minimum ölçü, qadağan olunan istifadələr</td><td>Yeni və kiçik biznes</td></tr>
    <tr><td>Gaydlayn (brand guidelines)</td><td>Loqobuk + rənglər, şriftlər, qrafik elementlər, daşıyıcılar</td><td>Bir neçə filialı və ya podratçısı olan biznes</td></tr>
    <tr><td>Brendbuk</td><td>Gaydlayn + brend strategiyası: missiya, dəyərlər, auditoriya, ünsiyyət tonu</td><td>Böyüyən şirkət, françayzinq, şəbəkə</td></tr>
  </tbody>
</table>
<p>Praktikada bu adlar tez-tez qarışdırılır. Sifariş verərkən adın deyil, <strong>daxil olan bölmələrin siyahısının</strong> müqavilədə yazılmasını tələb edin.</p>

<h2>Qiymətə Nə Təsir Edir?</h2>
<ol>
  <li><strong>Loqonun vəziyyəti:</strong> loqo hazırdırsa və yaxşıdırsa, iş azalır. Loqo zəifdirsə, əvvəlcə onu yeniləmək lazımdır.</li>
  <li><strong>Daşıyıcıların sayı:</strong> 5 daşıyıcı ilə 40 daşıyıcı arasında fərq həftələrlə işdir.</li>
  <li><strong>Strategiya hissəsi:</strong> auditoriya araşdırması, rəqib təhlili, brend platforması ayrıca vaxt tələb edir.</li>
  <li><strong>Dillər:</strong> şriftin və şablonların Azərbaycan, rus və ingilis dilində yoxlanması.</li>
  <li><strong>Çap və istehsal:</strong> lövhə, forma, avtomobil brendinqi üçün texniki maketlər.</li>
  <li><strong>Şrift lisenziyası:</strong> pullu şriftlərin kommersiya lisenziyası ayrıca ödənilə bilər.</li>
</ol>

<h2>Şrift Lisenziyası: Çox Unudulan Məsələ</h2>
<p>Dizaynerin kompüterində işləyən şrift sizin saytda və ya reklamda istifadə üçün avtomatik icazəli deyil. Bəzi şriftlər yalnız şəxsi istifadə üçün pulsuzdur. Həll yolları:</p>
<ul>
  <li><strong>Açıq lisenziyalı şriftlər:</strong> Google Fonts kolleksiyasındakı şriftlərin çoxu SIL Open Font License 1.1, bəziləri Apache 2.0 lisenziyası ilə yayılır. Yenə də hər şriftin lisenziya faylını yoxlayın.</li>
  <li><strong>Pullu şrift:</strong> lisenziya biznesin adına alınır, sənədi sizdə qalır. Veb, masaüstü və tətbiq üçün lisenziyalar fərqli ola bilər.</li>
</ul>
<p>Brendbukda istifadə olunan hər şriftin adı, mənbəyi və lisenziya növü yazılmalıdır.</p>

<h2>İş Prosesi: Mərhələlər</h2>
<ol>
  <li><strong>Brif:</strong> biznes, auditoriya, rəqiblər, bəyəndiyiniz və bəyənmədiyiniz nümunələr. Necə doldurulduğunu bax: <a href="/blog-details/brif-nece-doldurulur-2026">brif necə doldurulur</a>.</li>
  <li><strong>Konsepsiya:</strong> 2–3 vizual istiqamət (mood board, rəng və şrift variantları).</li>
  <li><strong>Seçilmiş istiqamətin işlənməsi:</strong> loqo sistemi, palitra, tipoqrafiya, qrafik elementlər.</li>
  <li><strong>Daşıyıcılar:</strong> vizit kartdan lövhəyə qədər razılaşdırılmış siyahı.</li>
  <li><strong>Brendbukun tərtibi:</strong> PDF sənəd və qaydalar.</li>
  <li><strong>Faylların təhvili:</strong> mənbə faylları və ixrac olunmuş versiyalar.</li>
</ol>
<p>Təxmini müddət: mini üslub 1–3 həftə, tam brendbuk 1–3 ay.</p>

<h2>Təhvil Zamanı Tələb Etməli Olduğunuz Fayllar</h2>
<ul>
  <li>Loqonun vektor faylları: <strong>AI, EPS, SVG, PDF</strong>.</li>
  <li>Ekran üçün <strong>PNG</strong> (şəffaf fon) və favicon.</li>
  <li>Rəng kodları: HEX, RGB, CMYK, Pantone.</li>
  <li>Şrift faylları və ya lisenziya sənədləri.</li>
  <li>Bütün şablonların redaktə olunan mənbələri (Figma, Illustrator, InDesign və ya Canva).</li>
  <li>Brendbuk PDF.</li>
  <li>Müqavilədə <strong>əmlak hüquqlarının</strong> sizə keçməsi barədə bənd.</li>
</ul>

<h2>Korporativ Üslub Saytda və Sosial Şəbəkələrdə</h2>
<p>Bu gün müştəri brendlə ilk dəfə çox vaxt telefonda tanış olur: Google nəticəsində, Instagram-da, saytda. Ona görə brendbukda rəqəmsal bölmə vacibdir: sayt rəngləri və düymələr, ikonlar, sosial şəbəkə şablonları, Google Business Profile şəkilləri. Rənglərin ekranda kontrastı da yoxlanmalıdır ki, mətn oxunaqlı olsun.</p>
<p>Köhnə saytınız yeni üsluba uyğun deyilsə, bu, <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">saytı yeniləmə vaxtının əlamətlərindən</a> biridir. Sosial şəbəkədə üslubun ardıcıllığı haqqında: <a href="/blog-details/smm-xidmeti-qiymeti-2026">SMM xidməti qiyməti</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Korporativ üslub neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Azərbaycan bazarında təxminən: mini üslub 500–1 500 AZN, loqobuk və əsas daşıyıcılar 1 500–4 000 AZN, tam brendbuk 4 000–15 000 AZN və daha çox. Qiymət daşıyıcıların sayından və strategiya hissəsindən asılıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Brendbuk ilə loqobukun fərqi nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Loqobuk yalnız loqonun istifadə qaydalarını təsvir edir. Brendbuk isə rənglər, şriftlər, daşıyıcılar və brend strategiyası (dəyərlər, ünsiyyət tonu) daxil olmaqla bütün sistemi əhatə edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kiçik biznesə brendbuk lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Adətən tam brendbuk lazım deyil. Loqo, rəng palitrası, şriftlər və əsas şablonlardan ibarət mini üslub kifayətdir. Filial, françayzinq və ya çoxlu podratçı yarandıqda tam brendbuka keçmək olar.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Korporativ üslub hazırlamaq nə qədər vaxt aparır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Mini üslub adətən 1–3 həftə, tam brendbuk isə strategiya və daşıyıcıların sayından asılı olaraq 1–3 ay çəkir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Hansı faylları mütləq almalıyam?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Loqonun vektor faylları (AI, EPS, SVG, PDF), şəffaf PNG, rəng kodları, şrift lisenziyaları, şablonların redaktə olunan mənbələri və brendbuk PDF. Müqavilədə hüquqların sizə keçməsi də yazılmalıdır.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Korporativ üslub "gözəl dizayn" deyil, brendin hər yerdə eyni tanınmasını təmin edən qaydalar sistemidir. Kiçik biznes mini üslubla başlaya bilər, böyüdükcə onu brendbuka çevirə bilər. Əsas odur ki, bütün fayllar, şrift lisenziyaları və hüquqlar sizdə qalsın.</p>
<p><strong>Brendiniz üçün korporativ üslub və ya brendbuk hazırlatmaq istəyirsinizsə, <a href="/elaqe">bizə yazın</a></strong>. Loqodan başlamaq lazımdırsa: <a href="/loqo-hazirlanmasi">loqo hazırlanması</a>. Bütün xidmətlər: <a href="/xidmetler">xidmətlər</a>.</p>
<p><small><em>Qiymətlər Azərbaycan bazarı üzrə təxmini diapazonlardır (Oktyabr 2026). Şrift lisenziyaları haqqında məlumat Google Fonts rəsmi repozitoriyasına (github.com/google/fonts) əsaslanır; hər şriftin lisenziya şərtlərini ayrıca yoxlayın.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>The logo is ready, but the business card uses one colour, Instagram another, and the shop sign a completely different font. Customers cannot put it into words, but they feel it: the brand looks "scattered" and trust drops. This is what a <strong>corporate identity</strong> and the <strong>brand book</strong> that governs it solve.</p>
<p>This article explains what a corporate identity includes in 2027, the difference between a brand book and a logo book, approximate prices in Azerbaijan and which files you should demand at handover.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Package</th><th>What is included</th><th>Approximate price (AZN)</th></tr>
  </thead>
  <tbody>
    <tr><td>Mini identity</td><td>Logo, colours, fonts, business card, letterhead, social media templates</td><td>500 – 1,500</td></tr>
    <tr><td>Logo book + core items</td><td>Logo usage rules, 10–20 brand items (notepad, envelope, badge, presentation template)</td><td>1,500 – 4,000</td></tr>
    <tr><td>Full brand book</td><td>Brand platform, tone of voice, photo style, signage, interior, uniforms, 40+ pages</td><td>4,000 – 15,000+</td></tr>
  </tbody>
</table>
<p>We have a separate article on the logo itself: <a href="/blog-details/logo-design-cost-azerbaijan-2026">Logo design cost in Azerbaijan</a>.</p>

<h2>What Is a Corporate Identity?</h2>
<p>A corporate identity (visual identity) is a system of visual elements that makes a brand recognisable in the same way everywhere. The logo is only one part of it. Core elements:</p>
<ul>
  <li><strong>Logo and its versions:</strong> primary, horizontal, vertical, symbol only, black-and-white and reversed (for dark backgrounds).</li>
  <li><strong>Colour palette:</strong> primary and secondary colours, each with HEX/RGB (screen), CMYK (print) and, where needed, Pantone codes.</li>
  <li><strong>Fonts:</strong> heading and body fonts, size hierarchy, support for Azerbaijani and Russian letters (ə, ğ, ş, ı, ж, щ).</li>
  <li><strong>Graphic elements:</strong> patterns, icons, shapes, photo and illustration style.</li>
  <li><strong>Templates:</strong> business card, letterhead, email signature, presentation, social media posts.</li>
</ul>

<h2>Brand Book, Logo Book and Guidelines: What Is the Difference?</h2>
<table>
  <thead>
    <tr><th>Document</th><th>What it covers</th><th>Who needs it</th></tr>
  </thead>
  <tbody>
    <tr><td>Logo book</td><td>Logo usage only: proportions, clear space, minimum size, forbidden uses</td><td>New and small businesses</td></tr>
    <tr><td>Brand guidelines</td><td>Logo book + colours, fonts, graphic elements, brand items</td><td>Businesses with several branches or contractors</td></tr>
    <tr><td>Brand book</td><td>Guidelines + brand strategy: mission, values, audience, tone of voice</td><td>Growing companies, franchises, chains</td></tr>
  </tbody>
</table>
<p>In practice these names are often mixed up. When ordering, ask for the <strong>list of included sections</strong> to be written into the contract, not just the name.</p>

<h2>What Affects the Price?</h2>
<ol>
  <li><strong>State of the logo:</strong> if a good logo already exists, there is less work. If it is weak, it needs updating first.</li>
  <li><strong>Number of brand items:</strong> the difference between 5 and 40 items is weeks of work.</li>
  <li><strong>Strategy:</strong> audience research, competitor analysis and a brand platform take extra time.</li>
  <li><strong>Languages:</strong> checking fonts and templates in Azerbaijani, Russian and English.</li>
  <li><strong>Print and production:</strong> technical layouts for signage, uniforms and vehicle branding.</li>
  <li><strong>Font licensing:</strong> commercial licences for paid fonts may be charged separately.</li>
</ol>

<h2>Font Licensing: An Often Forgotten Issue</h2>
<p>A font that works on the designer's computer is not automatically licensed for your website or ads. Some fonts are free for personal use only. Options:</p>
<ul>
  <li><strong>Open-licence fonts:</strong> most fonts in the Google Fonts collection are released under the SIL Open Font License 1.1, some under Apache 2.0. Still, check the licence file of each font.</li>
  <li><strong>Paid font:</strong> the licence is bought in the business's name and the document stays with you. Web, desktop and app licences may differ.</li>
</ul>
<p>The brand book should list the name, source and licence type of every font it uses.</p>

<h2>The Process: Stages</h2>
<ol>
  <li><strong>Brief:</strong> business, audience, competitors, examples you like and dislike. See <a href="/blog-details/how-to-write-project-brief-2026">how to write a project brief</a>.</li>
  <li><strong>Concept:</strong> 2–3 visual directions (mood board, colour and font options).</li>
  <li><strong>Developing the chosen direction:</strong> logo system, palette, typography, graphic elements.</li>
  <li><strong>Brand items:</strong> an agreed list from business card to signage.</li>
  <li><strong>Brand book:</strong> PDF document and rules.</li>
  <li><strong>File handover:</strong> source files and exported versions.</li>
</ol>
<p>Approximate timeline: mini identity 1–3 weeks, full brand book 1–3 months.</p>

<h2>Files You Should Demand at Handover</h2>
<ul>
  <li>Logo vector files: <strong>AI, EPS, SVG, PDF</strong>.</li>
  <li><strong>PNG</strong> for screens (transparent background) and favicon.</li>
  <li>Colour codes: HEX, RGB, CMYK, Pantone.</li>
  <li>Font files or licence documents.</li>
  <li>Editable sources for all templates (Figma, Illustrator, InDesign or Canva).</li>
  <li>Brand book PDF.</li>
  <li>A contract clause transferring the <strong>property rights</strong> to you.</li>
</ul>

<h2>Corporate Identity on Your Website and Social Media</h2>
<p>Today customers often meet a brand for the first time on their phone: in Google results, on Instagram, on the website. That is why a digital section in the brand book matters: website colours and buttons, icons, social media templates, Google Business Profile images. Colour contrast on screen should also be checked so text stays readable.</p>
<p>If your old website does not match the new identity, that is one of the <a href="/blog-details/signs-you-need-website-redesign-2026">signs you need a website redesign</a>. On keeping a consistent style on social media: <a href="/blog-details/smm-services-cost-azerbaijan-2026">SMM services cost</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does a corporate identity cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In the Azerbaijani market, roughly: mini identity AZN 500–1,500, logo book and core items AZN 1,500–4,000, full brand book AZN 4,000–15,000 and more. The price depends on the number of brand items and the strategy work.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the difference between a brand book and a logo book?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A logo book describes only how to use the logo. A brand book covers the whole system, including colours, fonts, brand items and brand strategy (values, tone of voice).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does a small business need a brand book?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Usually not a full one. A mini identity with a logo, colour palette, fonts and core templates is enough. You can move to a full brand book when branches, franchising or many contractors appear.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to create a corporate identity?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A mini identity usually takes 1–3 weeks; a full brand book takes 1–3 months depending on the strategy and number of brand items.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Which files must I receive?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Logo vector files (AI, EPS, SVG, PDF), transparent PNG, colour codes, font licences, editable template sources and the brand book PDF. The contract should also state that the rights transfer to you.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>A corporate identity is not "nice design" but a system of rules that makes a brand recognisable the same way everywhere. A small business can start with a mini identity and grow it into a brand book over time. What matters most is that all files, font licences and rights stay with you.</p>
<p><strong>Want a corporate identity or brand book for your brand? <a href="/contact">Write to us</a></strong>. If you need to start with the logo: <a href="/logo-design">logo design</a>. All services: <a href="/services">services</a>.</p>
<p><small><em>Prices are approximate ranges for the Azerbaijani market (October 2026). Font licensing information is based on the official Google Fonts repository (github.com/google/fonts); check the licence terms of each font separately.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Логотип готов, но на визитке один цвет, в Instagram другой, а на вывеске магазина совсем другой шрифт. Клиент не сформулирует это словами, но почувствует: бренд выглядит «разрозненно», и доверие падает. Эту проблему решают <strong>фирменный стиль</strong> и <strong>брендбук</strong>, который его регламентирует.</p>
<p>В статье разбираем, из чего состоит фирменный стиль в 2027 году, чем брендбук отличается от логобука, ориентировочные цены в Азербайджане и какие файлы требовать при сдаче работы.</p>

<h2>Коротко</h2>
<table>
  <thead>
    <tr><th>Пакет</th><th>Что входит</th><th>Ориентировочная цена (AZN)</th></tr>
  </thead>
  <tbody>
    <tr><td>Мини-стиль</td><td>Логотип, цвета, шрифты, визитка, бланк, шаблоны для соцсетей</td><td>500 – 1 500</td></tr>
    <tr><td>Логобук + основные носители</td><td>Правила использования логотипа, 10–20 носителей (блокнот, конверт, бейдж, шаблон презентации)</td><td>1 500 – 4 000</td></tr>
    <tr><td>Полный брендбук</td><td>Платформа бренда, тон коммуникации, фотостиль, вывески, интерьер, униформа, 40+ страниц</td><td>4 000 – 15 000+</td></tr>
  </tbody>
</table>
<p>О стоимости самого логотипа у нас есть отдельная статья: <a href="/blog-details/stoimost-logotipa-azerbaydzhan-2026">стоимость логотипа в Азербайджане</a>.</p>

<h2>Что такое фирменный стиль?</h2>
<p>Фирменный стиль (визуальная идентичность) — система визуальных элементов, благодаря которой бренд одинаково узнаётся на всех носителях. Логотип — лишь его часть. Основные элементы:</p>
<ul>
  <li><strong>Логотип и его версии:</strong> основная, горизонтальная, вертикальная, только знак, чёрно-белая и инверсная (для тёмного фона).</li>
  <li><strong>Цветовая палитра:</strong> основные и дополнительные цвета с кодами HEX/RGB (экран), CMYK (печать) и при необходимости Pantone.</li>
  <li><strong>Шрифты:</strong> для заголовков и текста, иерархия размеров, поддержка азербайджанских и русских букв (ə, ğ, ş, ı, ж, щ).</li>
  <li><strong>Графические элементы:</strong> паттерны, иконки, формы, стиль фото и иллюстраций.</li>
  <li><strong>Шаблоны:</strong> визитка, бланк, подпись e-mail, презентация, посты для соцсетей.</li>
</ul>

<h2>Брендбук, логобук и гайдлайн: в чём разница?</h2>
<table>
  <thead>
    <tr><th>Документ</th><th>Что описывает</th><th>Кому нужен</th></tr>
  </thead>
  <tbody>
    <tr><td>Логобук</td><td>Только использование логотипа: пропорции, охранное поле, минимальный размер, запрещённые варианты</td><td>Новому и малому бизнесу</td></tr>
    <tr><td>Гайдлайн</td><td>Логобук + цвета, шрифты, графические элементы, носители</td><td>Бизнесу с несколькими филиалами или подрядчиками</td></tr>
    <tr><td>Брендбук</td><td>Гайдлайн + стратегия бренда: миссия, ценности, аудитория, тон коммуникации</td><td>Растущим компаниям, франшизам, сетям</td></tr>
  </tbody>
</table>
<p>На практике эти названия часто путают. При заказе требуйте, чтобы в договоре был <strong>список входящих разделов</strong>, а не только название.</p>

<h2>Что влияет на цену?</h2>
<ol>
  <li><strong>Состояние логотипа:</strong> если хороший логотип уже есть, работы меньше. Если слабый — сначала его нужно обновить.</li>
  <li><strong>Количество носителей:</strong> разница между 5 и 40 носителями — недели работы.</li>
  <li><strong>Стратегия:</strong> исследование аудитории, анализ конкурентов и платформа бренда требуют отдельного времени.</li>
  <li><strong>Языки:</strong> проверка шрифтов и шаблонов на азербайджанском, русском и английском.</li>
  <li><strong>Печать и производство:</strong> технические макеты вывесок, униформы, брендирования авто.</li>
  <li><strong>Лицензии на шрифты:</strong> коммерческая лицензия платных шрифтов может оплачиваться отдельно.</li>
</ol>

<h2>Лицензия на шрифт: о чём часто забывают</h2>
<p>Шрифт, который работает на компьютере дизайнера, не обязательно разрешён для вашего сайта или рекламы. Некоторые шрифты бесплатны только для личного использования. Варианты:</p>
<ul>
  <li><strong>Шрифты с открытой лицензией:</strong> большинство шрифтов коллекции Google Fonts распространяется по SIL Open Font License 1.1, некоторые — по Apache 2.0. И всё же проверяйте файл лицензии каждого шрифта.</li>
  <li><strong>Платный шрифт:</strong> лицензия покупается на имя бизнеса, документ остаётся у вас. Лицензии для веба, десктопа и приложений могут отличаться.</li>
</ul>
<p>В брендбуке должны быть указаны название, источник и тип лицензии каждого шрифта.</p>

<h2>Процесс работы: этапы</h2>
<ol>
  <li><strong>Бриф:</strong> бизнес, аудитория, конкуренты, примеры, которые нравятся и не нравятся. См. <a href="/blog-details/kak-zapolnit-brif-2026">как заполнить бриф</a>.</li>
  <li><strong>Концепция:</strong> 2–3 визуальных направления (мудборд, варианты цветов и шрифтов).</li>
  <li><strong>Проработка выбранного направления:</strong> система логотипа, палитра, типографика, графика.</li>
  <li><strong>Носители:</strong> согласованный список от визитки до вывески.</li>
  <li><strong>Сборка брендбука:</strong> PDF-документ и правила.</li>
  <li><strong>Передача файлов:</strong> исходники и экспортированные версии.</li>
</ol>
<p>Ориентировочные сроки: мини-стиль 1–3 недели, полный брендбук 1–3 месяца.</p>

<h2>Какие файлы требовать при сдаче</h2>
<ul>
  <li>Векторные файлы логотипа: <strong>AI, EPS, SVG, PDF</strong>.</li>
  <li><strong>PNG</strong> для экрана (прозрачный фон) и favicon.</li>
  <li>Коды цветов: HEX, RGB, CMYK, Pantone.</li>
  <li>Файлы шрифтов или документы о лицензии.</li>
  <li>Редактируемые исходники всех шаблонов (Figma, Illustrator, InDesign или Canva).</li>
  <li>PDF брендбука.</li>
  <li>Пункт договора о передаче вам <strong>имущественных прав</strong>.</li>
</ul>

<h2>Фирменный стиль на сайте и в соцсетях</h2>
<p>Сегодня клиент чаще всего впервые знакомится с брендом в телефоне: в выдаче Google, в Instagram, на сайте. Поэтому в брендбуке важен цифровой раздел: цвета и кнопки сайта, иконки, шаблоны для соцсетей, изображения для Google Business Profile. Нужно проверить и контраст цветов на экране, чтобы текст оставался читаемым.</p>
<p>Если старый сайт не соответствует новому стилю, это один из <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">признаков, что сайту нужен редизайн</a>. О единстве стиля в соцсетях: <a href="/blog-details/stoimost-smm-azerbaydzhan-2026">стоимость SMM</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит фирменный стиль?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">На рынке Азербайджана ориентировочно: мини-стиль 500–1 500 AZN, логобук и основные носители 1 500–4 000 AZN, полный брендбук 4 000–15 000 AZN и выше. Цена зависит от количества носителей и стратегической части.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Чем брендбук отличается от логобука?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Логобук описывает только правила использования логотипа. Брендбук охватывает всю систему: цвета, шрифты, носители и стратегию бренда (ценности, тон коммуникации).</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужен ли малому бизнесу брендбук?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Обычно полный — нет. Достаточно мини-стиля: логотип, палитра, шрифты и основные шаблоны. К полному брендбуку можно перейти, когда появятся филиалы, франшиза или много подрядчиков.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает разработка фирменного стиля?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Мини-стиль обычно 1–3 недели, полный брендбук — 1–3 месяца в зависимости от стратегии и количества носителей.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какие файлы обязательно получить?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Векторные файлы логотипа (AI, EPS, SVG, PDF), прозрачный PNG, коды цветов, лицензии на шрифты, редактируемые исходники шаблонов и PDF брендбука. В договоре также должна быть передача прав вам.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Фирменный стиль — это не «красивый дизайн», а система правил, благодаря которой бренд везде узнаётся одинаково. Малый бизнес может начать с мини-стиля и со временем развить его до брендбука. Главное — чтобы все файлы, лицензии на шрифты и права остались у вас.</p>
<p><strong>Хотите фирменный стиль или брендбук для своего бренда? <a href="/kontakty">Напишите нам</a></strong>. Если нужно начать с логотипа: <a href="/razrabotka-logo">разработка логотипа</a>. Все услуги: <a href="/uslugi">услуги</a>.</p>
<p><small><em>Цены — ориентировочные диапазоны рынка Азербайджана (октябрь 2026). Информация о лицензиях на шрифты основана на официальном репозитории Google Fonts (github.com/google/fonts); условия лицензии каждого шрифта проверяйте отдельно.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'korporativ-uslub-brendbuk-2027'],
            [
                'slug_en' => 'brand-identity-brand-book-cost-azerbaijan-2027',
                'slug_ru' => 'firmennyj-stil-brendbuk-azerbaydzhan-2027',

                'title_az' => 'Korporativ Üslub və Brendbuk Azərbaycanda 2027: Nə Daxildir və Neçəyə Başa Gəlir',
                'title_en' => 'Corporate Identity and Brand Book in Azerbaijan 2027: What It Includes and What It Costs',
                'title_ru' => 'Фирменный стиль и брендбук в Азербайджане 2027: что входит и сколько стоит',

                'review_az' => 'Korporativ üslub nədir, brendbuk loqobukdan nə ilə fərqlənir və Azərbaycanda neçəyə başa gəlir? Paketlər və qiymətlər, şrift lisenziyası, iş mərhələləri və təhvil zamanı tələb etməli olduğunuz fayllar.',
                'review_en' => 'What a corporate identity is, how a brand book differs from a logo book and what it costs in Azerbaijan: packages and prices, font licensing, stages and the files you should demand at handover.',
                'review_ru' => 'Что такое фирменный стиль, чем брендбук отличается от логобука и сколько он стоит в Азербайджане: пакеты и цены, лицензии на шрифты, этапы и файлы, которые нужно получить.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '26 Oktyabr 2026',
                'date_en' => 'October 26, 2026',
                'date_ru' => '26 Октября 2026',

                'photo'    => 'cover-brand-identity-az.png',
                'photo_en' => 'cover-brand-identity-en.png',
                'photo_ru' => 'cover-brand-identity-ru.png',

                'meta_title_az' => 'Korporativ Üslub və Brendbuk 2027: Qiymət | RS Code',
                'meta_title_en' => 'Corporate Identity & Brand Book 2027: Cost | RS Code',
                'meta_title_ru' => 'Фирменный стиль и брендбук 2027: цена | RS Code',

                'meta_description_az' => 'Korporativ üslub və brendbuk neçəyə başa gəlir? 2027 paketləri və qiymətləri, brendbuk vs loqobuk, şrift lisenziyası, iş mərhələləri və mütləq almalı olduğunuz fayllar.',
                'meta_description_en' => 'How much does a corporate identity and brand book cost in Azerbaijan? 2027 packages and prices, brand book vs logo book, font licensing, stages and must-have files.',
                'meta_description_ru' => 'Сколько стоит фирменный стиль и брендбук в Азербайджане? Пакеты и цены 2027, брендбук и логобук, лицензии на шрифты, этапы и обязательные файлы.',

                'meta_keywords_az' => 'korporativ üslub, brendbuk, korporativ üslub qiyməti, brendbuk hazırlanması, loqobuk, firma üslubu, brendinq 2027',
                'meta_keywords_en' => 'corporate identity azerbaijan, brand book cost, brand guidelines baku, logo book, branding azerbaijan 2027',
                'meta_keywords_ru' => 'фирменный стиль баку, брендбук цена, разработка брендбука, логобук, фирменный стиль азербайджан 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
