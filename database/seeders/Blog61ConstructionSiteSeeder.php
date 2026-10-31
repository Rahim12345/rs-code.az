<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #61 — Tikinti və təchizat şirkəti üçün korporativ sayt 2027.
 * Nümunə: SO Supply (sosupply.az) — SosupplyProjectSeeder-də təsvir olunanlar.
 * Qiymət/müddət #17 (veb-sayt-qiymeti-azerbaycan-2026) ilə uyğundur: korporativ sayt 1 200–3 500 AZN, 2–4 həftə.
 */
class Blog61ConstructionSiteSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Tikinti, təchizat və ya metal konstruksiya şirkətinin müştərisi saytı Instagram kimi vərəqləmir. Onu tender komissiyasının üzvü, baş podratçının satınalma meneceri, xarici tərəfdaşın mühəndisi oxuyur və bir sual verir: <strong>"Bu şirkət bizim həcmdə işi görə bilərmi?"</strong> Sayt bu suala 2–3 dəqiqədə cavab vermirsə, şirkət qısa siyahıya düşmür, hətta işi yaxşı görsə belə.</p>
<p>Bu yazıda 2027-ci il üçün tikinti və təchizat şirkətinin korporativ saytında hansı bölmələrin olmalı olduğunu, layihə portfelinin necə qurulduğunu, niyə üç dilin vacib olduğunu və "xidmət + Bakı" axtarışlarında necə görünməyi izah edirik. Sonda öz layihəmizi — SO Supply saytını — nümunə kimi göstəririk.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Mütləq bölmələr</td><td>Layihə portfeli, hər istiqamət üçün ayrıca xidmət səhifəsi, sertifikat və lisenziyalar, müştəri loqoları, karyera, qiymət sorğusu forması, əlaqə</td></tr>
    <tr><td>Neçə dil?</td><td>Xarici tərəfdaşlarla işləyirsinizsə, üç dil: AZ / EN / RU. Hər əlavə dil saytın qiymətinə təxminən 15–25% əlavə edir</td></tr>
    <tr><td>Qiymət</td><td>Korporativ sayt təxminən 1 200 – 3 500 AZN (bazar təxmini; səhifə sayı, dil və funksiyalardan asılıdır)</td></tr>
    <tr><td>Müddət</td><td>Təxminən 2 – 4 həftə; mətn və layihə şəkilləri vaxtında hazır olarsa</td></tr>
    <tr><td>Google-da görünmək</td><td>Hər xidmət üçün ayrıca, "xidmət + Bakı" sorğusuna uyğun səhifə və doldurulmuş Google Business Profile</td></tr>
  </tbody>
</table>

<h2>Tikinti Şirkətinin Saytına Kim Baxır?</h2>
<p>Saytı planlamazdan əvvəl onu kimin oxuyacağını müəyyən edin. Tikinti və təchizat sahəsində adətən beş auditoriya olur:</p>
<ul>
  <li><strong>Tender komissiyası və satınalma şöbəsi</strong> — təcrübəni, oxşar layihələri, sertifikatları və şirkətin rəsmi məlumatlarını yoxlayır.</li>
  <li><strong>Baş podratçı və developer</strong> — subpodratçı və ya təchizatçı axtarır, hansı işləri, hansı həcmdə gördüyünüzə baxır.</li>
  <li><strong>Xarici tərəfdaş</strong> — saytı ingilis və ya rus dilində oxuyur. Azərbaycanca tək dilli sayt onun üçün "şirkətin saytı yoxdur" deməkdir.</li>
  <li><strong>İş axtaran mühəndis və usta</strong> — vakansiyaları və şirkətin nə ilə məşğul olduğunu öyrənmək istəyir.</li>
  <li><strong>Obyektdəki rəhbər</strong> — saytı telefondan, çox vaxt zəif mobil internetlə açır: əlaqə nömrəsi, ünvan, sertifikatın surəti lazımdır.</li>
</ul>
<p>Bu beş qrupun heç biri "Biz bazarın lideriyik" şüarına inanmır. Onları rəqəmlər, şəkillər və sənədlər inandırır.</p>

<h2>Tender və B2B Müştəri Üçün 8 Mütləq Bölmə</h2>
<table>
  <thead>
    <tr><th>Bölmə</th><th>Nə göstərir</th><th>Kimə lazımdır</th></tr>
  </thead>
  <tbody>
    <tr><td>Layihə portfeli</td><td>Hər layihə ayrıca səhifədə: şəkillər, yer, il, görülən iş, həcm</td><td>Tender komissiyası, developer</td></tr>
    <tr><td>Xidmət səhifələri</td><td>Hər fəaliyyət istiqaməti üçün ayrıca səhifə və müraciət forması</td><td>Satınalma, Google axtarışı</td></tr>
    <tr><td>Sertifikat və lisenziyalar</td><td>ISO, uyğunluq sertifikatları, lisenziya və icazələr (varsa) — şəkil və ya PDF</td><td>Tender komissiyası</td></tr>
    <tr><td>Müştəri və tərəfdaş loqoları</td><td>Kimlərlə işlədiyiniz (yalnız icazə verənlər)</td><td>Bütün B2B ziyarətçilər</td></tr>
    <tr><td>Haqqımızda</td><td>Fəaliyyət ili, komanda, texnika parkı, anbar və ya istehsal sahəsi</td><td>Xarici tərəfdaş</td></tr>
    <tr><td>Karyera</td><td>Açıq vakansiyalar və CV göndərmə yolu</td><td>Mühəndis, usta, operator</td></tr>
    <tr><td>Qiymət sorğusu forması</td><td>Qısa forma: ad, şirkət, xidmət, həcm, fayl əlavə etmə</td><td>Satınalma meneceri</td></tr>
    <tr><td>Əlaqə</td><td>Telefon, e-poçt, ofis ünvanı, xəritə, iş saatları</td><td>Hamı</td></tr>
  </tbody>
</table>
<p><strong>Qiymət sorğusu forması</strong> ayrıca diqqət istəyir. Satınalma meneceri adətən hazır spesifikasiya və ya smeta ilə gəlir, ona görə formada fayl əlavə etmək imkanı olmalıdır. 10 xanalı forma isə müraciəti azaldır: ad, şirkət, telefon, xidmət növü, qısa təsvir və fayl kifayətdir. Formanı yalnız "Əlaqə" səhifəsində yox, hər xidmət və layihə səhifəsinin sonunda yerləşdirin — ziyarətçi qərarı orada verir.</p>

<h2>Layihə Portfeli: Şəkil və Texniki Məlumat Birlikdə</h2>
<p>Tikinti şirkətinin ən güclü satış aləti portfeldir, amma çox saytda o, adı olmayan 30 şəkildən ibarət qalereyadır. Belə qalereya heç nəyi sübut etmir. Hər layihəni ayrıca səhifədə bu quruluşla verin:</p>
<ol>
  <li><strong>Layihənin adı, yeri və ili</strong> — "Yasamal, 2025" kimi qısa.</li>
  <li><strong>Sifarişçi</strong> (icazə varsa) və şirkətinizin rolu: baş podratçı, subpodratçı, təchizatçı.</li>
  <li><strong>Görülən iş və həcm</strong> — məsələn, metal konstruksiyanın tonnajı, sahənin kvadratmetri, təchiz olunan avadanlıq növləri.</li>
  <li><strong>Şəkillər</strong> — prosesdən və nəticədən; mümkünsə "əvvəl/sonra".</li>
  <li><strong>Əlaqəli xidmət səhifəsinə keçid</strong> və müraciət forması.</li>
</ol>
<p>Şəkilləri sayta yükləməzdən əvvəl sıxın (WebP formatı, eni 1600 piksel kifayətdir). Telefonla çəkilmiş 8 MB-lıq foto mobil internetdə səhifəni yarım dəqiqə yükləyir.</p>
<p>Ayrıca layihə səhifələrinin daha bir üstünlüyü var: hər səhifə Google-da ayrıca nəticə ola bilər. "Metal konstruksiya anbar Bakı" axtaran şəxs birbaşa oxşar layihənizə düşür.</p>

<h2>Üç Dil və Mobil Sürət</h2>
<p>Azərbaycanda tikinti və təchizat sahəsi xarici şirkətlərlə sıx bağlıdır: avadanlıq tədarükçüləri, beynəlxalq podratçılar, neft-qaz layihələri. Belə tərəfdaş saytı ingilis və ya rus dilində axtarır. Üç dilli saytda bunlara diqqət edin:</p>
<ul>
  <li><strong>Hər dil ayrıca URL-də</strong> olmalıdır ki, Google hər versiyanı ayrıca indeksləsin, hreflang teqləri düzgün qurulsun.</li>
  <li><strong>Tərcümə peşəkar olmalıdır.</strong> Maşın tərcüməsi ilə yazılmış texniki mətn xarici mühəndisə dərhal hiss olunur və etibarı azaldır.</li>
  <li><strong>Bütün bölmələr hər dildə olsun</strong> — yarımçıq ingiliscə versiya tək dilli saytdan pis təsir bağışlayır.</li>
</ul>
<p>Mobil sürət isə obyektdə işləyən insanlar üçün vacibdir. Sayt rəhbəri və ya təchizat meneceri saytı adətən telefondan açır. Səhifə 3 saniyədən gec açılırsa, o, sizə zəng etmək əvəzinə rəqibin nömrəsini tapır. Ətraflı: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">sayt sürəti və Core Web Vitals</a> və <a href="/blog-details/mobil-uygun-sayt-niye-vacibdir-2026">mobil uyğun sayt niyə vacibdir</a>.</p>

<h2>SEO: "Xidmət + Bakı" Sorğuları və Google Business Profile</h2>
<p>B2B müştəri də Google-dan başlayır: "metal konstruksiya Bakı", "tikinti materialları təchizatı", "elektrik avadanlığı təchizatı Bakı". Bütün xidmətləri bir "Xidmətlər" səhifəsində sadalayan sayt bu sorğuların heç birində yaxşı görünmür. Həll sadədir:</p>
<ul>
  <li><strong>Hər xidmətə ayrıca səhifə</strong> — öz başlığı (title), təsviri, nümunə layihələri və müraciət forması ilə.</li>
  <li><strong>Başlıqda xidmət və şəhər</strong> — məsələn, "Metal konstruksiyaların hazırlanması və quraşdırılması — Bakı".</li>
  <li><strong>Layihə səhifələrindən xidmət səhifələrinə daxili keçidlər</strong> — Google səhifələr arasındakı əlaqəni bu yolla anlayır.</li>
  <li><strong>Bloq</strong> — "anbar üçün metal konstruksiya necə seçilir" kimi praktik yazılar uzun sorğulardan trafik gətirir.</li>
</ul>
<p>Google Business Profile isə xəritədə və "yaxınlıqda" axtarışlarında görünmək üçündür. Ofis və ya anbar ünvanını, iş saatlarını, layihə şəkillərini əlavə edin və müştərilərdən rəy istəyin. Addım-addım təlimat: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır</a>. SEO-nun ümumi məntiqi barədə: <a href="/blog-details/seo-xidmeti-azerbaycan-2026">SEO xidməti nə üçün lazımdır</a>.</p>

<h2>Real Nümunə: SO Supply (sosupply.az)</h2>
<p>SO Supply tikinti, təchizat və metal konstruksiya sahəsində fəaliyyət göstərən şirkətdir. Onun üçün üç dilli korporativ sayt hazırlamışıq. Saytda yuxarıda danışdığımız strukturun əsas hissələri var:</p>
<ul>
  <li><strong>Üç dil:</strong> AZ / EN / RU — xarici tərəfdaşlar üçün.</li>
  <li><strong>6 xidmət səhifəsi</strong> — hər fəaliyyət istiqaməti ayrıca: tikinti xidmətləri, təchizat xidmətləri, metal qurğular və avadanlıqlar, neft-qaz sənayesi üçün təchizat, elektrotexnika və elektrik avadanlıqlarının təchizatı, kənd təsərrüfatı və maliyyə sektoru üçün təchizat.</li>
  <li><strong>Layihələr bölməsi və hər layihə üçün ayrıca səhifə</strong> — layihələr qalereyası ilə.</li>
  <li><strong>Xidmət və layihə səhifələrində müraciət forması</strong> — ziyarətçi "Əlaqə" səhifəsini axtarmadan sorğu göndərir.</li>
  <li><strong>Bloq və karyera bölmələri</strong>, "Haqqımızda" və "Əlaqə" səhifələri.</li>
  <li><strong>UI/UX dizayn, proqramlaşdırma və mobil adaptasiya.</strong></li>
</ul>
<p>Layihənin təsviri və ekran görüntüləri portfelimizdədir: <a href="/project-details/sosupply">SO Supply layihəsi</a>.</p>

<h2>Saytı Sifariş Etməzdən Əvvəl Yoxlama Siyahısı</h2>
<ul>
  <li>☐ Hər fəaliyyət istiqaməti üçün ayrıca xidmət səhifəsi planlaşdırılıb.</li>
  <li>☐ Ən azı 5–10 layihə üçün şəkil, yer, il və görülən işin təsviri toplanıb.</li>
  <li>☐ Sertifikat, lisenziya və icazələrin skan surətləri hazırdır.</li>
  <li>☐ Loqosunu göstərmək üçün müştərilərdən icazə alınıb.</li>
  <li>☐ Dillər müəyyən edilib, tərcüməni kimin edəcəyi bəllidir.</li>
  <li>☐ Qiymət sorğusu formasının xanaları və müraciətin hara gələcəyi (e-poçt, WhatsApp, CRM) razılaşdırılıb.</li>
  <li>☐ Karyera bölməsini kim yeniləyəcək — məsul şəxs təyin olunub.</li>
  <li>☐ Domen, hostinq və korporativ e-poçt şirkətin adına qeydiyyatdadır.</li>
  <li>☐ Google Business Profile yaradılıb və ya yaradılması plandadır.</li>
  <li>☐ Mənbə kodu və idarə panelinə giriş sizə veriləcək — müqavilədə yazılıb.</li>
</ul>
<p>Sifarişdən əvvəl soruşulmalı digər suallar: <a href="/blog-details/veb-sayt-hazirlatmazdan-evvel-12-sual">veb sayt hazırlatmazdan əvvəl 12 sual</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tikinti şirkəti üçün korporativ sayt neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Azərbaycan bazarında korporativ sayt təxminən 1 200–3 500 AZN-dir. Qiymət səhifə sayından, dil sayından (hər əlavə dil təxminən 15–25%), layihə portfelinin həcmindən və əlavə funksiyalardan asılıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt neçə müddətə hazır olur?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Korporativ sayt adətən 2–4 həftəyə hazırlanır. Ən çox gecikmə mətnlərin, tərcümələrin və layihə şəkillərinin vaxtında hazır olmamasından yaranır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytın üç dildə olması vacibdirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yalnız yerli müştərilərlə işləyirsinizsə, bir dil kifayət edə bilər. Xarici podratçı, tədarükçü və ya tərəfdaşlarla işləyirsinizsə, ingilis və rus versiyaları şirkətinizin ciddi qəbul olunması üçün vacibdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Layihə portfelində nə göstərilməlidir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər layihə ayrıca səhifədə: ad, yer, il, şirkətin rolu, görülən iş və həcm, prosesdən və nəticədən şəkillər. Sifarişçinin adını yalnız onun icazəsi ilə göstərin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Bütün xidmətləri bir səhifədə yazmaq olmazmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Olar, amma Google-da hər xidmət üzrə ayrıca görünmək çətinləşir. Hər istiqamət üçün ayrıca səhifə "xidmət + Bakı" sorğularında görünmək və müraciət formasını yerində təqdim etmək üçün daha yaxşıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytı sonradan özümüz yeniləyə bilərikmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli, sayt idarə paneli ilə hazırlanırsa, yeni layihə, vakansiya və bloq yazısını proqramçı olmadan əlavə edə bilərsiniz. Bunu sifariş zamanı dəqiqləşdirin.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb sayt qiyməti Azərbaycanda</a></li>
  <li><a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır?</a></li>
  <li><a href="/blog-details/b2b-sifaris-portali-diler-distributor-2026">Diler və distribyutorlar üçün B2B sifariş portalı</a></li>
  <li><a href="/blog-details/sayt-niye-muraciet-getirmir-ux-audit-2026">Sayt niyə müraciət gətirmir?</a></li>
  <li><a href="/blog-details/korporativ-uslub-brendbuk-2027">Korporativ üslub və brendbuk 2027</a></li>
</ul>

<h2>Nəticə</h2>
<p>Tikinti və təchizat şirkətinin saytı reklam broşürü deyil, sübut toplusudur: layihələr şəkil və texniki məlumatla, xidmətlər ayrıca səhifələrdə, sertifikatlar görünən yerdə, sorğu forması hər səhifənin sonunda. Xarici tərəfdaşlar üçün üç dil, obyektdəki insanlar üçün sürətli mobil versiya və Google-da görünmək üçün düzgün struktur — tenderə və B2B müştəriyə aparan yol budur.</p>
<p><strong>Şirkətiniz üçün belə sayt quraq? <a href="/veb-saytlarin-hazirlanmasi">Veb saytların hazırlanması xidməti</a></strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>. Nümunəyə baxın: <a href="/project-details/sosupply">SO Supply layihəsi</a>.</p>
<p><small><em>Qiymət və müddət aralıqları Azərbaycan bazarı üzrə təxminidir (oktyabr 2026) və layihənin həcmindən asılı olaraq dəyişir. SO Supply nümunəsində yalnız hazırladığımız sayt təsvir olunur; şirkətin fəaliyyət göstəriciləri barədə məlumat verilmir.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>The clients of a construction, supply or metal structures company don't scroll a website like Instagram. It is read by a tender committee member, a general contractor's procurement manager or a foreign partner's engineer, and they ask one question: <strong>"Can this company handle a job of our size?"</strong> If the website doesn't answer that in 2–3 minutes, the company doesn't make the shortlist, even if it does good work.</p>
<p>This article explains which sections a construction and supply company website needs in 2027, how to build a project portfolio, why three languages matter and how to appear in "service + Baku" searches. At the end we show our own project, the SO Supply website, as an example.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Must-have sections</td><td>Project portfolio, a separate service page for each line of business, certificates and licences, client logos, careers, request-for-quote form, contact</td></tr>
    <tr><td>How many languages?</td><td>If you work with foreign partners, three: AZ / EN / RU. Each extra language adds roughly 15–25% to the price</td></tr>
    <tr><td>Price</td><td>A corporate website costs about AZN 1,200 – 3,500 (market estimate; depends on pages, languages and features)</td></tr>
    <tr><td>Timeline</td><td>About 2 – 4 weeks, provided texts and project photos are ready on time</td></tr>
    <tr><td>Showing up on Google</td><td>A separate page for each service targeting "service + Baku" queries, and a complete Google Business Profile</td></tr>
  </tbody>
</table>

<h2>Who Looks at a Construction Company's Website?</h2>
<p>Before planning the site, define who will read it. In construction and supply there are usually five audiences:</p>
<ul>
  <li><strong>Tender committees and procurement departments</strong> — check experience, similar projects, certificates and official company details.</li>
  <li><strong>General contractors and developers</strong> — look for subcontractors or suppliers and check what work you have done and at what scale.</li>
  <li><strong>Foreign partners</strong> — read the site in English or Russian. An Azerbaijani-only site means "this company has no website" to them.</li>
  <li><strong>Engineers and tradespeople looking for work</strong> — want to see vacancies and what the company does.</li>
  <li><strong>Site managers</strong> — open the site on a phone, often on weak mobile data: they need a phone number, an address, a copy of a certificate.</li>
</ul>
<p>None of these groups believes "We are the market leader". Numbers, photos and documents convince them.</p>

<h2>8 Must-Have Sections for Tenders and B2B Clients</h2>
<table>
  <thead>
    <tr><th>Section</th><th>What it shows</th><th>Who needs it</th></tr>
  </thead>
  <tbody>
    <tr><td>Project portfolio</td><td>Each project on its own page: photos, location, year, work done, scope</td><td>Tender committees, developers</td></tr>
    <tr><td>Service pages</td><td>A separate page and enquiry form for each line of business</td><td>Procurement, Google search</td></tr>
    <tr><td>Certificates and licences</td><td>ISO, conformity certificates, licences and permits (if any) — as images or PDF</td><td>Tender committees</td></tr>
    <tr><td>Client and partner logos</td><td>Who you have worked with (only those who agree)</td><td>All B2B visitors</td></tr>
    <tr><td>About</td><td>Years in business, team, equipment fleet, warehouse or production site</td><td>Foreign partners</td></tr>
    <tr><td>Careers</td><td>Open vacancies and how to send a CV</td><td>Engineers, tradespeople, operators</td></tr>
    <tr><td>Request-for-quote form</td><td>A short form: name, company, service, scope, file upload</td><td>Procurement managers</td></tr>
    <tr><td>Contact</td><td>Phone, email, office address, map, working hours</td><td>Everyone</td></tr>
  </tbody>
</table>
<p>The <strong>request-for-quote form</strong> deserves special attention. A procurement manager usually arrives with a ready specification or bill of quantities, so the form must allow file uploads. A 10-field form, on the other hand, reduces enquiries: name, company, phone, service type, short description and a file are enough. Place the form not only on the Contact page but at the end of every service and project page — that is where the visitor decides.</p>

<h2>Project Portfolio: Photos and Specs Together</h2>
<p>A construction company's strongest sales tool is its portfolio, but on many sites it is a gallery of 30 untitled photos. Such a gallery proves nothing. Give each project its own page with this structure:</p>
<ol>
  <li><strong>Project name, location and year</strong> — short, like "Yasamal, 2025".</li>
  <li><strong>Client</strong> (with permission) and your company's role: general contractor, subcontractor, supplier.</li>
  <li><strong>Work done and scope</strong> — for example, tonnage of steel structures, square metres, types of equipment supplied.</li>
  <li><strong>Photos</strong> — of the process and the result; "before/after" if possible.</li>
  <li><strong>A link to the related service page</strong> and an enquiry form.</li>
</ol>
<p>Compress photos before uploading (WebP, 1600 pixels wide is enough). An 8 MB phone photo can take half a minute to load on mobile data.</p>
<p>Separate project pages have another advantage: each can appear in Google as its own result. Someone searching "steel structure warehouse Baku" lands directly on your similar project.</p>

<h2>Three Languages and Mobile Speed</h2>
<p>Construction and supply in Azerbaijan are closely tied to foreign companies: equipment suppliers, international contractors, oil and gas projects. Such partners search in English or Russian. On a trilingual site, pay attention to:</p>
<ul>
  <li><strong>Each language on its own URL</strong>, so Google indexes every version separately and hreflang tags are set correctly.</li>
  <li><strong>Professional translation.</strong> Machine-translated technical copy is obvious to a foreign engineer and undermines trust.</li>
  <li><strong>All sections in every language</strong> — a half-finished English version makes a worse impression than a single-language site.</li>
</ul>
<p>Mobile speed matters for people on site. A site manager or supply manager usually opens the website on a phone. If a page takes longer than 3 seconds, they find a competitor's number instead of calling you. More: <a href="/blog-details/website-speed-core-web-vitals-2026">website speed and Core Web Vitals</a> and <a href="/blog-details/mobile-friendly-website-2026">why a mobile-friendly website matters</a>.</p>

<h2>SEO: "Service + Baku" Queries and Google Business Profile</h2>
<p>B2B clients start on Google too: "steel structures Baku", "construction materials supply", "electrical equipment supply Baku". A site listing all services on one "Services" page ranks well for none of these. The fix is simple:</p>
<ul>
  <li><strong>A separate page for each service</strong> — with its own title, description, sample projects and enquiry form.</li>
  <li><strong>Service and city in the title</strong> — for example, "Steel Structure Fabrication and Installation — Baku".</li>
  <li><strong>Internal links from project pages to service pages</strong> — this is how Google understands how pages relate.</li>
  <li><strong>A blog</strong> — practical posts like "how to choose a steel structure for a warehouse" bring traffic from long-tail queries.</li>
</ul>
<p>Google Business Profile is for showing up on the map and in "near me" searches. Add your office or warehouse address, working hours and project photos, and ask clients for reviews. Step-by-step guide: <a href="/blog-details/how-to-create-google-business-profile-2026">how to create a Google Business Profile</a>. On SEO in general: <a href="/blog-details/why-you-need-seo-services-2026">why you need SEO services</a>.</p>

<h2>Real Example: SO Supply (sosupply.az)</h2>
<p>SO Supply is a construction, supply and metal structures company. We built a trilingual corporate website for them. It has the core parts of the structure described above:</p>
<ul>
  <li><strong>Three languages:</strong> AZ / EN / RU — for foreign partners.</li>
  <li><strong>6 service pages</strong> — one for each line of business: construction services, supply services, metal structures and equipment, supply for the oil and gas industry, supply of electrical engineering and electrical equipment, supply for the agriculture and financial sectors.</li>
  <li><strong>A projects section with a separate page for each project</strong> — with a projects gallery.</li>
  <li><strong>Enquiry forms on service and project pages</strong> — visitors send a request without hunting for the Contact page.</li>
  <li><strong>Blog and careers sections</strong>, plus About and Contact pages.</li>
  <li><strong>UI/UX design, development and mobile adaptation.</strong></li>
</ul>
<p>The project description and screenshots are in our portfolio: <a href="/project-details/sosupply">SO Supply project</a>.</p>

<h2>Checklist Before You Order a Website</h2>
<ul>
  <li>☐ A separate service page is planned for each line of business.</li>
  <li>☐ Photos, location, year and a description of the work are collected for at least 5–10 projects.</li>
  <li>☐ Scans of certificates, licences and permits are ready.</li>
  <li>☐ Clients have agreed to have their logos shown.</li>
  <li>☐ Languages are decided and it's clear who will translate.</li>
  <li>☐ The quote form fields and where enquiries go (email, WhatsApp, CRM) are agreed.</li>
  <li>☐ Someone is responsible for updating the careers section.</li>
  <li>☐ Domain, hosting and corporate email are registered in the company's name.</li>
  <li>☐ A Google Business Profile exists or is planned.</li>
  <li>☐ Source code and admin panel access will be handed to you — it's in the contract.</li>
</ul>
<p>Other questions to ask before ordering: <a href="/blog-details/12-questions-before-building-website-2026">12 questions before building a website</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does a corporate website for a construction company cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In Azerbaijan a corporate website costs about AZN 1,200–3,500. The price depends on the number of pages, languages (each extra language adds roughly 15–25%), portfolio size and extra features.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to build?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A corporate website usually takes 2–4 weeks. Most delays come from texts, translations and project photos not being ready on time.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does the website need three languages?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">If you only work with local clients, one language may be enough. If you work with foreign contractors, suppliers or partners, English and Russian versions are important for your company to be taken seriously.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What should a project portfolio show?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Each project on its own page: name, location, year, your role, work done and scope, and photos of the process and result. Show the client's name only with their permission.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can't we list all services on one page?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">You can, but it makes it harder to rank on Google for each service. A separate page per line of business works better for "service + Baku" queries and lets you place the enquiry form right where it's needed.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can we update the website ourselves later?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes, if the site is built with an admin panel, you can add new projects, vacancies and blog posts without a developer. Confirm this when ordering.</p>
    </div>
  </div>
</div>

<h3>Read next</h3>
<ul>
  <li><a href="/blog-details/website-cost-azerbaijan-2026">Website cost in Azerbaijan</a></li>
  <li><a href="/blog-details/how-to-create-google-business-profile-2026">How to create a Google Business Profile</a></li>
  <li><a href="/blog-details/b2b-ordering-portal-dealers-distributors-2026">A B2B ordering portal for dealers and distributors</a></li>
  <li><a href="/blog-details/website-not-generating-leads-ux-audit-2026">Why a website doesn't generate leads</a></li>
  <li><a href="/blog-details/brand-identity-brand-book-cost-azerbaijan-2027">Brand identity and brand book 2027</a></li>
</ul>

<h2>Conclusion</h2>
<p>A construction and supply company website is not a brochure but a body of evidence: projects with photos and specs, services on separate pages, certificates in plain sight and a quote form at the end of every page. Three languages for foreign partners, a fast mobile version for people on site and the right structure for Google — that is the path to tenders and B2B clients.</p>
<p><strong>Want a website like this for your company? See our <a href="/website-development">website development service</a></strong> or <a href="/contact">get in touch</a>. See an example: <a href="/project-details/sosupply">SO Supply project</a>.</p>
<p><small><em>Price and timeline ranges are estimates for the Azerbaijani market (October 2026) and vary with project scope. The SO Supply example describes only the website we built; no information on the company's business results is given.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Клиенты строительной компании, поставщика или производителя металлоконструкций не листают сайт как Instagram. Его читает член тендерной комиссии, менеджер по закупкам генподрядчика или инженер иностранного партнёра, и у него один вопрос: <strong>«Справится ли эта компания с работой нашего масштаба?»</strong> Если сайт не отвечает на него за 2–3 минуты, компания не попадает в шорт-лист, даже если работает хорошо.</p>
<p>В статье разбираем, какие разделы нужны сайту строительной и снабженческой компании в 2027 году, как построить портфолио проектов, почему важны три языка и как появляться в поиске по запросам «услуга + Баку». В конце показываем наш проект — сайт SO Supply.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Обязательные разделы</td><td>Портфолио проектов, отдельная страница для каждого направления, сертификаты и лицензии, логотипы клиентов, карьера, форма запроса цены, контакты</td></tr>
    <tr><td>Сколько языков?</td><td>Если работаете с иностранными партнёрами — три: AZ / EN / RU. Каждый дополнительный язык добавляет к цене примерно 15–25%</td></tr>
    <tr><td>Цена</td><td>Корпоративный сайт — примерно 1 200 – 3 500 AZN (оценка рынка; зависит от числа страниц, языков и функций)</td></tr>
    <tr><td>Срок</td><td>Примерно 2 – 4 недели, если тексты и фото проектов готовы вовремя</td></tr>
    <tr><td>Видимость в Google</td><td>Отдельная страница под запрос «услуга + Баку» для каждой услуги и заполненный Google Business Profile</td></tr>
  </tbody>
</table>

<h2>Кто смотрит сайт строительной компании?</h2>
<p>Прежде чем планировать сайт, определите, кто будет его читать. В строительстве и снабжении обычно пять аудиторий:</p>
<ul>
  <li><strong>Тендерные комиссии и отделы закупок</strong> — проверяют опыт, похожие проекты, сертификаты и официальные реквизиты.</li>
  <li><strong>Генподрядчики и девелоперы</strong> — ищут субподрядчика или поставщика и смотрят, какие работы и в каком объёме вы выполняли.</li>
  <li><strong>Иностранные партнёры</strong> — читают сайт на английском или русском. Сайт только на азербайджанском для них означает «у компании нет сайта».</li>
  <li><strong>Инженеры и мастера в поиске работы</strong> — хотят увидеть вакансии и понять, чем занимается компания.</li>
  <li><strong>Прорабы на объекте</strong> — открывают сайт с телефона, часто при слабом мобильном интернете: нужны телефон, адрес, копия сертификата.</li>
</ul>
<p>Ни одна из этих групп не верит лозунгу «Мы лидеры рынка». Их убеждают цифры, фотографии и документы.</p>

<h2>8 обязательных разделов для тендеров и B2B-клиентов</h2>
<table>
  <thead>
    <tr><th>Раздел</th><th>Что показывает</th><th>Кому нужен</th></tr>
  </thead>
  <tbody>
    <tr><td>Портфолио проектов</td><td>Каждый проект на отдельной странице: фото, место, год, выполненные работы, объём</td><td>Тендерные комиссии, девелоперы</td></tr>
    <tr><td>Страницы услуг</td><td>Отдельная страница и форма заявки для каждого направления</td><td>Закупки, поиск Google</td></tr>
    <tr><td>Сертификаты и лицензии</td><td>ISO, сертификаты соответствия, лицензии и разрешения (если есть) — изображением или PDF</td><td>Тендерные комиссии</td></tr>
    <tr><td>Логотипы клиентов и партнёров</td><td>С кем вы работали (только с их согласия)</td><td>Все B2B-посетители</td></tr>
    <tr><td>О компании</td><td>Годы работы, команда, парк техники, склад или производство</td><td>Иностранные партнёры</td></tr>
    <tr><td>Карьера</td><td>Открытые вакансии и способ отправить резюме</td><td>Инженеры, мастера, операторы</td></tr>
    <tr><td>Форма запроса цены</td><td>Короткая форма: имя, компания, услуга, объём, прикрепление файла</td><td>Менеджеры по закупкам</td></tr>
    <tr><td>Контакты</td><td>Телефон, e-mail, адрес офиса, карта, часы работы</td><td>Все</td></tr>
  </tbody>
</table>
<p>Отдельного внимания заслуживает <strong>форма запроса цены</strong>. Менеджер по закупкам обычно приходит с готовой спецификацией или сметой, поэтому в форме должна быть возможность прикрепить файл. А форма из 10 полей снижает число заявок: достаточно имени, компании, телефона, вида услуги, короткого описания и файла. Размещайте форму не только на странице «Контакты», но и в конце каждой страницы услуги и проекта — именно там посетитель принимает решение.</p>

<h2>Портфолио проектов: фото и технические данные вместе</h2>
<p>Самый сильный инструмент продаж строительной компании — портфолио, но на многих сайтах это галерея из 30 фотографий без подписей. Такая галерея ничего не доказывает. Дайте каждому проекту отдельную страницу с такой структурой:</p>
<ol>
  <li><strong>Название, место и год</strong> — коротко, например «Ясамал, 2025».</li>
  <li><strong>Заказчик</strong> (с разрешения) и роль вашей компании: генподрядчик, субподрядчик, поставщик.</li>
  <li><strong>Выполненные работы и объём</strong> — например, тоннаж металлоконструкций, площадь в квадратных метрах, виды поставленного оборудования.</li>
  <li><strong>Фотографии</strong> — процесса и результата; по возможности «до/после».</li>
  <li><strong>Ссылка на связанную страницу услуги</strong> и форма заявки.</li>
</ol>
<p>Сжимайте фото перед загрузкой (WebP, ширины 1600 пикселей достаточно). Снимок с телефона весом 8 МБ может грузиться через мобильный интернет полминуты.</p>
<p>У отдельных страниц проектов есть ещё одно преимущество: каждая может быть отдельным результатом в Google. Человек, который ищет «металлоконструкции склад Баку», попадает прямо на ваш похожий проект.</p>

<h2>Три языка и скорость на мобильных</h2>
<p>Строительство и снабжение в Азербайджане тесно связаны с иностранными компаниями: поставщиками оборудования, международными подрядчиками, нефтегазовыми проектами. Такие партнёры ищут на английском или русском. На трёхъязычном сайте важно:</p>
<ul>
  <li><strong>Каждый язык — на отдельном URL</strong>, чтобы Google индексировал каждую версию отдельно и теги hreflang были настроены правильно.</li>
  <li><strong>Профессиональный перевод.</strong> Машинный перевод технического текста иностранный инженер замечает сразу, и доверие падает.</li>
  <li><strong>Все разделы на каждом языке</strong> — недоделанная английская версия производит худшее впечатление, чем одноязычный сайт.</li>
</ul>
<p>Скорость на мобильных важна для тех, кто на объекте. Прораб или снабженец обычно открывает сайт с телефона. Если страница грузится дольше 3 секунд, он найдёт номер конкурента вместо того, чтобы позвонить вам. Подробнее: <a href="/blog-details/skorost-sajta-core-web-vitals-2026">скорость сайта и Core Web Vitals</a> и <a href="/blog-details/mobilnaya-versiya-sayta-2026">почему важна мобильная версия сайта</a>.</p>

<h2>SEO: запросы «услуга + Баку» и Google Business Profile</h2>
<p>B2B-клиент тоже начинает с Google: «металлоконструкции Баку», «поставка строительных материалов», «поставка электрооборудования Баку». Сайт, где все услуги перечислены на одной странице «Услуги», плохо виден по каждому из этих запросов. Решение простое:</p>
<ul>
  <li><strong>Отдельная страница для каждой услуги</strong> — со своим заголовком (title), описанием, примерами проектов и формой заявки.</li>
  <li><strong>Услуга и город в заголовке</strong> — например, «Изготовление и монтаж металлоконструкций — Баку».</li>
  <li><strong>Внутренние ссылки со страниц проектов на страницы услуг</strong> — так Google понимает связь между страницами.</li>
  <li><strong>Блог</strong> — практические статьи вроде «как выбрать металлоконструкцию для склада» приводят трафик по длинным запросам.</li>
</ul>
<p>Google Business Profile нужен, чтобы появляться на карте и в поиске «рядом». Добавьте адрес офиса или склада, часы работы и фото проектов, просите клиентов оставлять отзывы. Пошаговая инструкция: <a href="/blog-details/kak-sozdat-google-business-profile-2026">как создать Google Business Profile</a>. Об SEO в целом: <a href="/blog-details/zachem-nuzhny-seo-uslugi-2026">зачем нужны SEO-услуги</a>.</p>

<h2>Реальный пример: SO Supply (sosupply.az)</h2>
<p>SO Supply — компания, работающая в сфере строительства, поставок и металлоконструкций. Мы сделали для неё трёхъязычный корпоративный сайт. В нём есть основные элементы структуры, описанной выше:</p>
<ul>
  <li><strong>Три языка:</strong> AZ / EN / RU — для иностранных партнёров.</li>
  <li><strong>6 страниц услуг</strong> — отдельная для каждого направления: строительные услуги, услуги снабжения, металлоконструкции и оборудование, поставки для нефтегазовой отрасли, поставка электротехники и электрооборудования, поставки для сельского хозяйства и финансового сектора.</li>
  <li><strong>Раздел проектов и отдельная страница для каждого проекта</strong> — с галереей проектов.</li>
  <li><strong>Форма заявки на страницах услуг и проектов</strong> — посетитель отправляет запрос, не разыскивая страницу «Контакты».</li>
  <li><strong>Разделы «Блог» и «Карьера»</strong>, а также страницы «О компании» и «Контакты».</li>
  <li><strong>UI/UX дизайн, разработка и мобильная адаптация.</strong></li>
</ul>
<p>Описание проекта и скриншоты — в нашем портфолио: <a href="/project-details/sosupply">проект SO Supply</a>.</p>

<h2>Чек-лист перед заказом сайта</h2>
<ul>
  <li>☐ Для каждого направления запланирована отдельная страница услуги.</li>
  <li>☐ Минимум для 5–10 проектов собраны фото, место, год и описание работ.</li>
  <li>☐ Готовы сканы сертификатов, лицензий и разрешений.</li>
  <li>☐ Получено согласие клиентов на показ их логотипов.</li>
  <li>☐ Определены языки и понятно, кто будет переводить.</li>
  <li>☐ Согласованы поля формы запроса цены и куда приходят заявки (e-mail, WhatsApp, CRM).</li>
  <li>☐ Назначен ответственный за обновление раздела «Карьера».</li>
  <li>☐ Домен, хостинг и корпоративная почта зарегистрированы на компанию.</li>
  <li>☐ Google Business Profile создан или запланирован.</li>
  <li>☐ Передача исходного кода и доступа к админ-панели прописана в договоре.</li>
</ul>
<p>Другие вопросы, которые стоит задать до заказа: <a href="/blog-details/12-voprosov-pered-sozdaniem-sajta-2026">12 вопросов перед созданием сайта</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит корпоративный сайт для строительной компании?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">На рынке Азербайджана корпоративный сайт стоит примерно 1 200–3 500 AZN. Цена зависит от числа страниц, языков (каждый дополнительный — примерно +15–25%), объёма портфолио и дополнительных функций.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">За какой срок делается сайт?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Корпоративный сайт обычно делается за 2–4 недели. Чаще всего сроки срываются из-за того, что тексты, переводы и фото проектов не готовы вовремя.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Обязательно ли делать сайт на трёх языках?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Если вы работаете только с местными клиентами, может хватить одного языка. Если работаете с иностранными подрядчиками, поставщиками или партнёрами, английская и русская версии важны, чтобы компанию воспринимали всерьёз.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что показывать в портфолио проектов?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Каждый проект на отдельной странице: название, место, год, роль компании, выполненные работы и объём, фото процесса и результата. Имя заказчика указывайте только с его разрешения.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли описать все услуги на одной странице?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Можно, но тогда сложнее появляться в Google по каждой услуге. Отдельная страница для каждого направления лучше работает по запросам «услуга + Баку» и позволяет разместить форму заявки там, где она нужна.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сможем ли мы потом сами обновлять сайт?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да, если сайт сделан с админ-панелью, новые проекты, вакансии и статьи блога можно добавлять без программиста. Уточните это при заказе.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта в Азербайджане</a></li>
  <li><a href="/blog-details/kak-sozdat-google-business-profile-2026">Как создать Google Business Profile</a></li>
  <li><a href="/blog-details/b2b-portal-zakazov-dlya-dilerov-2026">B2B-портал заказов для дилеров и дистрибьюторов</a></li>
  <li><a href="/blog-details/pochemu-sajt-ne-prinosit-zayavki-ux-audit-2026">Почему сайт не приносит заявки</a></li>
  <li><a href="/blog-details/firmennyj-stil-brendbuk-azerbaydzhan-2027">Фирменный стиль и брендбук 2027</a></li>
</ul>

<h2>Итог</h2>
<p>Сайт строительной и снабженческой компании — не рекламный буклет, а набор доказательств: проекты с фото и техническими данными, услуги на отдельных страницах, сертификаты на виду и форма запроса в конце каждой страницы. Три языка для иностранных партнёров, быстрая мобильная версия для тех, кто на объекте, и правильная структура для Google — вот путь к тендерам и B2B-клиентам.</p>
<p><strong>Сделаем такой сайт для вашей компании? <a href="/razrabotka-sajtov">Услуга разработки сайтов</a></strong> или <a href="/kontakty">напишите нам</a>. Посмотрите пример: <a href="/project-details/sosupply">проект SO Supply</a>.</p>
<p><small><em>Диапазоны цен и сроков — ориентировочные для рынка Азербайджана (октябрь 2026) и зависят от объёма проекта. В примере SO Supply описан только сделанный нами сайт; сведения о результатах деятельности компании не приводятся.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'tikinti-techizat-sirketi-ucun-sayt-2027'],
            [
                'slug_en' => 'construction-supply-company-website-2027',
                'slug_ru' => 'sajt-dlya-stroitelnoj-kompanii-2027',

                'title_az' => 'Tikinti və Təchizat Şirkəti Üçün Korporativ Sayt 2027: Tender və B2B Müştəri Qazandıran 8 Bölmə',
                'title_en' => 'Corporate Website for a Construction and Supply Company 2027: 8 Sections That Win Tenders and B2B Clients',
                'title_ru' => 'Корпоративный сайт для строительной и снабженческой компании 2027: 8 разделов для тендеров и B2B-клиентов',

                'review_az' => 'Tikinti, təchizat və metal konstruksiya şirkətinin saytında nə olmalıdır? Layihə portfeli, xidmət səhifələri, sertifikatlar, qiymət sorğusu forması, üç dil, "xidmət + Bakı" SEO, yoxlama siyahısı və SO Supply nümunəsi.',
                'review_en' => 'What should a construction, supply or metal structures company website include? Project portfolio, service pages, certificates, a quote form, three languages, "service + Baku" SEO, a checklist and the SO Supply example.',
                'review_ru' => 'Что должно быть на сайте строительной компании, поставщика или производителя металлоконструкций? Портфолио, страницы услуг, сертификаты, форма запроса цены, три языка, SEO «услуга + Баку», чек-лист и пример SO Supply.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '31 Oktyabr 2026',
                'date_en' => 'October 31, 2026',
                'date_ru' => '31 Октября 2026',

                'photo'    => 'cover-construction-site-az.png',
                'photo_en' => 'cover-construction-site-en.png',
                'photo_ru' => 'cover-construction-site-ru.png',

                'meta_title_az' => 'Tikinti Şirkəti Üçün Sayt 2027: Tender və B2B | RS Code',
                'meta_title_en' => 'Construction Company Website 2027: Tenders & B2B | RS Code',
                'meta_title_ru' => 'Сайт для строительной компании 2027 | RS Code',

                'meta_description_az' => 'Tikinti və təchizat şirkətinin saytında nə olmalıdır: layihə portfeli, xidmət səhifələri, sertifikatlar, sorğu forması, 3 dil, SEO. Qiymət və yoxlama siyahısı.',
                'meta_description_en' => 'What a construction and supply company website needs: project portfolio, service pages, certificates, quote form, 3 languages, SEO. Price and checklist.',
                'meta_description_ru' => 'Что нужно сайту строительной и снабженческой компании: портфолио, страницы услуг, сертификаты, форма запроса, 3 языка, SEO. Цена и чек-лист.',

                'meta_keywords_az' => 'tikinti şirkəti üçün sayt, korporativ sayt, təchizat şirkəti saytı, metal konstruksiya sayt, tikinti saytı hazırlanması, sayt 2027',
                'meta_keywords_en' => 'construction company website, corporate website azerbaijan, supply company website, steel structures website baku, website 2027',
                'meta_keywords_ru' => 'сайт для строительной компании, корпоративный сайт баку, сайт снабженческой компании, сайт металлоконструкции, сайт 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
