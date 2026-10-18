<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog52UxAuditSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Sayt hazırdır, Instagram-dan və Google-dan ziyarətçi gəlir, amma zəng, WhatsApp mesajı və ya sifariş demək olar ki, yoxdur. Bu, Azərbaycanda biznes sahiblərinin ən çox verdiyi şikayətlərdən biridir. Çox vaxt problem "dizayn köhnədir" deyil — problem ziyarətçinin saytda <strong>nə edəcəyini başa düşməməsi</strong>, ona mane olan kiçik maneələr və etibar yaratmayan detallardır.</p>
<p>Bu yazıda saytınızın niyə müraciət gətirmədiyini özünüz yoxlaya biləcəyiniz <strong>15 bəndlik UX və konversiya auditini</strong> veririk. Dəbli dizayn trendləri yox — birbaşa satışa təsir edən məsələlər.</p>

<h2>Konversiya Nədir və Necə Ölçülür?</h2>
<p><strong>Konversiya</strong> — ziyarətçinin sizin üçün dəyərli bir hərəkət etməsidir: zəng etmək, WhatsApp-a yazmaq, formanı göndərmək, səbətə əlavə edib sifariş vermək. <strong>Konversiya dərəcəsi</strong> = hərəkət edənlərin sayı ÷ ziyarətçilərin sayı × 100%.</p>
<p>Məsələn, ayda 2.000 ziyarətçi və 20 müraciət varsa, konversiya 1%-dir. Konversiyanı 1%-dən 2%-ə qaldırmaq reklam büdcəsini artırmadan müraciətləri iki dəfə çoxaldır. Ona görə də çox vaxt yeni trafik almazdan əvvəl mövcud saytı düzəltmək daha sərfəlidir.</p>
<p>Ölçmək üçün minimum: <strong>Google Analytics 4</strong> (zəng, WhatsApp kliki və forma göndərmə hadisə kimi qeyd olunmalıdır) və <strong>Google Search Console</strong>. Əgər hazırda hansı səhifədən neçə müraciət gəldiyini bilmirsinizsə, auditin birinci addımı budur.</p>

<h2>Birinci 5 Saniyə: Ziyarətçi Nəyi Görür?</h2>
<h3>1. Nə etdiyiniz dərhal aydındırmı?</h3>
<p>Ana səhifənin yuxarı hissəsində "Gələcəyə birlikdə" kimi ümumi şüarlar deyil, konkret cümlə olmalıdır: <em>"Bakıda kafe və restoranlar üçün POS sistemi — quraşdırma 1 gündə"</em>. Ziyarətçi 5 saniyədə "bu mənə lazımdır, ya yox" qərarını verir.</p>
<h3>2. Əsas düymə (CTA) görünürmü?</h3>
<p>Ekranın yuxarısında bir aydın hərəkət olmalıdır: "WhatsApp-a yazın", "Qiymət soruşun", "Pulsuz konsultasiya". Bir ekranda 5 bərabər düymə varsa, ziyarətçi heç birini seçmir.</p>
<h3>3. Saytın sürəti</h3>
<p>Mobil internetdə 3–4 saniyədən gec açılan səhifəni ziyarətçilərin xeyli hissəsi bağlayır. Ağır şəkillər, slayderlər və lazımsız skriptlər əsas səbəbdir. Ətraflı: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">Saytın Sürəti və Core Web Vitals</a>.</p>

<h2>Mobil Təcrübə: Ziyarətçilərin Əksəriyyəti Burdadır</h2>
<h3>4. Telefonda yoxlayın — özünüz</h3>
<p>Saytınızı öz telefonunuzda açın və müştəri kimi bir sifariş verin və ya forma göndərin. Mətn kiçikdirmi? Düymələr barmaqla rahat basılırmı? Menyu açılırmı? Pop-up ekranı bağlayırmı?</p>
<h3>5. Bir toxunuşla əlaqə</h3>
<p>Telefon nömrəsi <code>tel:</code> linki olmalıdır, WhatsApp düyməsi isə birbaşa söhbət açmalıdır. Nömrəni əl ilə köçürmək məcburiyyəti müraciətlərin bir hissəsini itirir. Ətraflı: <a href="/blog-details/mobil-uygun-sayt-niye-vacibdir-2026">Mobil Uyğun Sayt Niyə Vacibdir</a>.</p>

<h2>Etibar: Niyə Sizə İnanmalıyam?</h2>
<h3>6. Real şəkillər və real işlər</h3>
<p>Stok şəkillər (gülümsəyən ofis işçiləri) etibar yaratmır. Öz komandanız, ofisiniz, məhsulunuz, gördüyünüz işlərin nümunələri — portfolio və ya "əvvəl/sonra" — daha inandırıcıdır.</p>
<h3>7. Rəylər və müştərilər</h3>
<p>Google rəyləri, müştəri loqoları, qısa video rəylər. Ən yaxşısı — rəyin konkret nəticədən danışmasıdır: "Sifarişlər WhatsApp-dan sayta keçdi, səhvlər azaldı".</p>
<h3>8. Əlaqə məlumatları və ünvan</h3>
<p>Ünvan, xəritə, iş saatları, VÖEN və ya şirkət adı. Google Business Profile-ınız yoxdursa, bura da baxın: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile Necə Yaradılır</a>.</p>
<h3>9. Qiymət haqqında açıqlıq</h3>
<p>Dəqiq qiymət verə bilmirsinizsə belə, "₼500-dən başlayır" və ya "qiymət nədən asılıdır" bloku ziyarətçini saxlayır. Qiymət haqqında heç bir məlumat olmayanda insan çox vaxt rəqibin saytına keçir.</p>

<h2>Formalar və Sifariş Prosesi</h2>
<h3>10. Formanı qısaldın</h3>
<p>Hər əlavə sahə formanı göndərənlərin sayını azaldır. İlk müraciət üçün çox vaxt <strong>ad + telefon</strong> kifayətdir. Qalanını menecer zəngdə soruşa bilər.</p>
<h3>11. Forma işləyirmi?</h3>
<p>Səslənir qəribə, amma auditlərdə tez-tez rast gəlinir: forma göndərilir, amma məktub heç kimə çatmır (spam qovluğu, köhnə e-poçt, SMTP xətası). Ayda bir dəfə öz formanızı test edin.</p>
<h3>12. Göndərdikdən sonra nə olur?</h3>
<p>"Təşəkkürlər, 30 dəqiqə ərzində zəng edəcəyik" kimi aydın mesaj göstərin. Bu, həm müştərini sakitləşdirir, həm də Analytics-də konversiyanı ölçmək üçün ayrıca səhifə və ya hadisə yaradır.</p>
<h3>13. Səbət və ödəniş (onlayn mağaza üçün)</h3>
<p>Məcburi qeydiyyat, gizli çatdırılma haqqı və çox addımlı ödəniş — səbətin tərk edilməsinin əsas səbəbləridir. Qonaq kimi sifariş, çatdırılma qiymətinin əvvəlcədən göstərilməsi və yerli ödəniş üsulları vacibdir. Ətraflı: <a href="/blog-details/onlayn-magaza-nece-acilir-2026">Onlayn Mağaza Necə Açılır</a>.</p>

<h2>Məzmun və Struktur</h2>
<h3>14. Hər xidmətin öz səhifəsi</h3>
<p>Bütün xidmətlər bir səhifədə siyahı şəklindədirsə, Google da, ziyarətçi də nəyin nə olduğunu ayırmaqda çətinlik çəkir. Hər əsas xidmət üçün ayrıca səhifə: nə daxildir, kimin üçündür, nümunələr, qiymət aralığı, tez-tez verilən suallar və CTA. Reklam üçün isə xüsusi landing page daha yaxşı işləyir: <a href="/blog-details/landing-page-nedir-2026">Landing Page Nədir</a>.</p>
<h3>15. Ziyarətçinin sualına cavab verin, sizin haqqınızda yox</h3>
<p>"Biz 2015-ci ildən fəaliyyət göstəririk" mətni ilə başlamaq yerinə, müştərinin problemindən başlayın: "Sifarişləri Excel-də itirirsiniz?". Mətn qısa abzaslar, başlıqlar və siyahılarla oxunaqlı olmalıdır.</p>

<h2>15 Bəndlik Yoxlama Cədvəli</h2>
<table>
  <thead>
    <tr><th>#</th><th>Yoxlama</th><th>Necə yoxlamalı</th></tr>
  </thead>
  <tbody>
    <tr><td>1</td><td>Nə etdiyiniz 5 saniyədə aydındır</td><td>Tanımayan birinə göstərib soruşun</td></tr>
    <tr><td>2</td><td>Bir əsas CTA ekranın yuxarısındadır</td><td>Telefonda sürüşdürmədən baxın</td></tr>
    <tr><td>3</td><td>Mobil sürət qənaətbəxşdir</td><td>PageSpeed Insights</td></tr>
    <tr><td>4</td><td>Telefonda rahat istifadə olunur</td><td>Özünüz sifariş verin</td></tr>
    <tr><td>5</td><td>Zəng/WhatsApp bir toxunuşla</td><td>tel: və wa.me linkləri</td></tr>
    <tr><td>6</td><td>Real şəkillər, portfolio</td><td>Stok şəkilləri sayın</td></tr>
    <tr><td>7</td><td>Rəylər görünür</td><td>Ana və xidmət səhifələri</td></tr>
    <tr><td>8</td><td>Ünvan, xəritə, iş saatları</td><td>Footer və əlaqə səhifəsi</td></tr>
    <tr><td>9</td><td>Qiymət haqqında məlumat var</td><td>"Qiymət" sözünü axtarın</td></tr>
    <tr><td>10</td><td>Forma 2–4 sahədir</td><td>Sahələri sayın</td></tr>
    <tr><td>11</td><td>Forma məktubu çatır</td><td>Test müraciəti göndərin</td></tr>
    <tr><td>12</td><td>Təşəkkür mesajı/səhifəsi var</td><td>Formanı göndərin</td></tr>
    <tr><td>13</td><td>Səbət sadədir (mağaza)</td><td>Qonaq kimi sifariş</td></tr>
    <tr><td>14</td><td>Hər xidmətin səhifəsi var</td><td>Menyu strukturu</td></tr>
    <tr><td>15</td><td>Mətn müştərinin problemindən başlayır</td><td>İlk abzası oxuyun</td></tr>
  </tbody>
</table>

<h2>Audit Necə Aparılır: Praktik Addımlar</h2>
<ol>
  <li><strong>Ölçün:</strong> GA4-də zəng, WhatsApp və forma hadisələrini qurun; 2–4 həftə məlumat toplayın.</li>
  <li><strong>Baxın:</strong> Microsoft Clarity kimi pulsuz alətlə ziyarətçilərin klik xəritəsinə və sessiya yazılarına baxın — insanlar harada ilişir?</li>
  <li><strong>Siyahı tutun:</strong> Yuxarıdakı 15 bəndi keçib problemləri təsirinə görə sıralayın.</li>
  <li><strong>Kiçik dəyişikliklərlə başlayın:</strong> CTA, forma, WhatsApp düyməsi, sürət — bunlar tez edilir və tez nəticə verir.</li>
  <li><strong>Yenidən ölçün:</strong> Dəyişiklikdən sonra eyni dövrü müqayisə edin.</li>
</ol>
<p>Problemlər çox və dərindirsə (köhnə texnologiya, mobil uyğunsuzluq, idarə olunmayan admin panel), saytı tam yeniləmək daha sərfəli ola bilər: <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">Saytınızı Yeniləmə Vaxtıdır: 7 Əlamət</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Sayt üçün normal konversiya dərəcəsi nə qədərdir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sahəyə, trafikin mənbəyinə və məqsədə görə çox dəyişir; xidmət saytlarında müraciət üçün təxminən 1–5% tez-tez rast gəlinən aralıqdır. Ən doğrusu öz göstəricinizi ölçüb onu addım-addım yaxşılaşdırmaqdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">UX auditi üçün saytı yenidən hazırlamaq lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Çox vaxt yox. CTA, forma, mobil düymələr, sürət və etibar elementləri kimi düzəlişlər mövcud saytda edilir. Tam yeniləmə yalnız texnologiya köhnədirsə və ya struktur kökündən səhvdirsə lazımdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Nəticə nə qədər vaxta görünür?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Forma, düymə və sürət kimi dəyişikliklərin təsiri trafik kifayət qədərdirsə, adətən 2–4 həftə ərzində ölçülə bilir. Az trafikli saytlarda daha uzun müşahidə lazımdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Konversiyanın artması Google mövqelərinə təsir edirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Birbaşa yox, amma sürətli, mobil uyğun və ziyarətçinin sualına aydın cavab verən səhifələr Google-un keyfiyyət tövsiyələrinə də uyğundur. Yəni yaxşı UX həm müraciətə, həm də SEO-ya xidmət edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Auditi özüm edə bilərəmmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli, bu yazıdakı 15 bəndlik siyahı ilə əsas problemləri özünüz tapa bilərsiniz. Analitikanın qurulması, sürət optimallaşdırması və texniki düzəlişlər üçün isə mütəxəssis köməyi vaxta qənaət edir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Müraciət gətirməyən sayt çox vaxt "pis sayt" deyil — sadəcə ziyarətçinin yolunda kiçik maneələr var. Aydın təklif, bir əsas düymə, sürətli mobil versiya, etibar elementləri və qısa forma — bu beş şey əksər hallarda nəticəni hiss ediləcək dərəcədə dəyişir.</p>
<p><strong>Saytınızın pulsuz qısa auditini istəyirsinizsə, <a href="/elaqe">bizə yazın</a></strong> — ən çox müraciət itirdiyiniz 3–5 nöqtəni göstərib həll yollarını təklif edək. Ətraflı: <a href="/xidmetler">xidmətlərimiz</a>, <a href="/blog-details/seo-xidmeti-azerbaycan-2026">SEO Xidməti Azərbaycanda</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>The website is live, visitors arrive from Instagram and Google, yet there are almost no calls, WhatsApp messages or orders. This is one of the most common complaints we hear from business owners in Azerbaijan. Usually the problem is not that "the design is old" — it is that visitors <strong>don't understand what to do</strong>, small obstacles get in their way, and the page doesn't build trust.</p>
<p>Below is a <strong>15-point UX and conversion audit</strong> you can run yourself to find out why your website isn't generating leads. No design trends — only things that directly affect sales.</p>

<h2>What Is Conversion and How Do You Measure It?</h2>
<p><strong>A conversion</strong> is a valuable action a visitor takes: calling, messaging on WhatsApp, submitting a form, placing an order. <strong>Conversion rate</strong> = actions ÷ visitors × 100%.</p>
<p>With 2,000 visitors and 20 enquiries a month, your conversion rate is 1%. Raising it to 2% doubles enquiries without spending more on ads — which is why fixing the existing site often pays off before buying more traffic.</p>
<p>The minimum toolkit: <strong>Google Analytics 4</strong> (with calls, WhatsApp clicks and form submissions tracked as events) and <strong>Google Search Console</strong>. If you don't know which page brings how many enquiries, that is step one.</p>

<h2>The First 5 Seconds: What Does the Visitor See?</h2>
<h3>1. Is it instantly clear what you do?</h3>
<p>The top of the homepage needs a concrete sentence, not a vague slogan: <em>"POS system for cafés and restaurants in Baku — installed in one day"</em>. Visitors decide in about five seconds whether you are relevant.</p>
<h3>2. Is the main call to action visible?</h3>
<p>There should be one clear action above the fold: "Message us on WhatsApp", "Get a quote", "Free consultation". Five equal buttons on one screen means none gets clicked.</p>
<h3>3. Page speed</h3>
<p>Many visitors leave pages that take more than 3–4 seconds to load on mobile data. Heavy images, sliders and unnecessary scripts are the usual culprits. More: <a href="/blog-details/website-speed-core-web-vitals-2026">Website Speed and Core Web Vitals</a>.</p>

<h2>Mobile Experience: Where Most Visitors Are</h2>
<h3>4. Test it yourself on a phone</h3>
<p>Open your site on your own phone and place an order or send a form as a customer would. Is the text too small? Are buttons easy to tap? Does the menu work? Does a pop-up block the screen?</p>
<h3>5. One-tap contact</h3>
<p>The phone number must be a <code>tel:</code> link and the WhatsApp button must open a chat directly. Forcing people to copy a number loses enquiries. More: <a href="/blog-details/mobile-friendly-website-2026">Why a Mobile-Friendly Website Matters</a>.</p>

<h2>Trust: Why Should I Believe You?</h2>
<h3>6. Real photos and real work</h3>
<p>Stock photos don't build trust. Your team, office, products and examples of completed work — a portfolio or before/after — are far more convincing.</p>
<h3>7. Reviews and clients</h3>
<p>Google reviews, client logos, short video testimonials. The best reviews describe a concrete result.</p>
<h3>8. Contact details and address</h3>
<p>Address, map, opening hours, company name. No Google Business Profile yet? See <a href="/blog-details/how-to-create-google-business-profile-2026">How to Create a Google Business Profile</a>.</p>
<h3>9. Transparency about price</h3>
<p>Even if you can't give an exact price, "from ₼500" or a "what affects the price" section keeps visitors on the page. With no price information at all, people often go to a competitor.</p>

<h2>Forms and the Ordering Process</h2>
<h3>10. Shorten the form</h3>
<p>Every extra field reduces submissions. For a first enquiry, <strong>name + phone</strong> is often enough; the manager can ask the rest on the call.</p>
<h3>11. Does the form actually work?</h3>
<p>It sounds odd, but audits often find forms that submit while the email never arrives (spam folder, outdated address, SMTP error). Test your own form monthly.</p>
<h3>12. What happens after submitting?</h3>
<p>Show a clear message such as "Thank you, we'll call you within 30 minutes". It reassures the customer and gives you a page or event to measure conversions in Analytics.</p>
<h3>13. Cart and checkout (online stores)</h3>
<p>Forced registration, hidden delivery fees and long checkouts are the main reasons carts are abandoned. Offer guest checkout, show delivery costs upfront and support local payment methods. More: <a href="/blog-details/how-to-start-online-store-azerbaijan-2026">How to Start an Online Store</a>.</p>

<h2>Content and Structure</h2>
<h3>14. A page for every service</h3>
<p>When all services are listed on one page, neither Google nor visitors can tell them apart. Give each key service its own page: what's included, who it's for, examples, price range, FAQ and a CTA. For ads, a dedicated landing page works best: <a href="/blog-details/what-is-a-landing-page-2026">What Is a Landing Page</a>.</p>
<h3>15. Answer the visitor's question, not "about us"</h3>
<p>Instead of opening with "We have been operating since 2015", start with the customer's problem: "Losing orders in Excel?" Keep text scannable with short paragraphs, headings and lists.</p>

<h2>15-Point Checklist</h2>
<table>
  <thead>
    <tr><th>#</th><th>Check</th><th>How to verify</th></tr>
  </thead>
  <tbody>
    <tr><td>1</td><td>What you do is clear in 5 seconds</td><td>Show it to a stranger and ask</td></tr>
    <tr><td>2</td><td>One main CTA above the fold</td><td>Check on a phone without scrolling</td></tr>
    <tr><td>3</td><td>Mobile speed is acceptable</td><td>PageSpeed Insights</td></tr>
    <tr><td>4</td><td>Easy to use on a phone</td><td>Place a test order yourself</td></tr>
    <tr><td>5</td><td>Call/WhatsApp in one tap</td><td>tel: and wa.me links</td></tr>
    <tr><td>6</td><td>Real photos, portfolio</td><td>Count the stock photos</td></tr>
    <tr><td>7</td><td>Reviews are visible</td><td>Home and service pages</td></tr>
    <tr><td>8</td><td>Address, map, opening hours</td><td>Footer and contact page</td></tr>
    <tr><td>9</td><td>Price information exists</td><td>Search the site for "price"</td></tr>
    <tr><td>10</td><td>Form has 2–4 fields</td><td>Count the fields</td></tr>
    <tr><td>11</td><td>Form emails arrive</td><td>Send a test enquiry</td></tr>
    <tr><td>12</td><td>Thank-you message/page</td><td>Submit the form</td></tr>
    <tr><td>13</td><td>Simple checkout (stores)</td><td>Order as a guest</td></tr>
    <tr><td>14</td><td>Each service has a page</td><td>Menu structure</td></tr>
    <tr><td>15</td><td>Copy starts with the customer's problem</td><td>Read the first paragraph</td></tr>
  </tbody>
</table>

<h2>How to Run the Audit: Practical Steps</h2>
<ol>
  <li><strong>Measure:</strong> Set up call, WhatsApp and form events in GA4; collect 2–4 weeks of data.</li>
  <li><strong>Observe:</strong> Use a free tool such as Microsoft Clarity to view heatmaps and session recordings — where do people get stuck?</li>
  <li><strong>List:</strong> Go through the 15 points and rank issues by impact.</li>
  <li><strong>Start small:</strong> CTA, form, WhatsApp button, speed — quick to fix, quick to show results.</li>
  <li><strong>Measure again:</strong> Compare the same period before and after.</li>
</ol>
<p>If the issues run deep (outdated technology, no mobile version, an unmanageable admin panel), a full rebuild may be more cost-effective: <a href="/blog-details/signs-you-need-website-redesign-2026">7 Signs Your Website Needs a Redesign</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is a normal website conversion rate?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">It varies widely by industry, traffic source and goal; for enquiries on service websites, roughly 1–5% is a commonly seen range. The best benchmark is your own figure, improved step by step.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do I need to rebuild my website after a UX audit?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Usually not. Fixes to CTAs, forms, mobile buttons, speed and trust elements are made on the existing site. A full rebuild is only needed when the technology is outdated or the structure is fundamentally wrong.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How soon will I see results?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">With enough traffic, the effect of changes to forms, buttons and speed can usually be measured within 2–4 weeks. Low-traffic sites need longer observation.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does better conversion affect Google rankings?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Not directly, but fast, mobile-friendly pages that clearly answer the visitor's question also align with Google's quality guidelines. Good UX supports both enquiries and SEO.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can I run the audit myself?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes — the 15-point checklist in this article will reveal the main issues. For analytics setup, speed optimisation and technical fixes, a specialist saves time.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>A website that doesn't generate leads is rarely a "bad website" — there are simply small obstacles on the visitor's path. A clear offer, one main button, a fast mobile version, trust signals and a short form change the results noticeably in most cases.</p>
<p><strong>Want a free quick audit of your website? <a href="/contact">Contact us</a></strong> — we'll point out the 3–5 places where you lose the most enquiries and suggest fixes. More: <a href="/services">our services</a>, <a href="/blog-details/why-you-need-seo-services-2026">SEO Services in Azerbaijan</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Сайт работает, посетители приходят из Instagram и Google, но звонков, сообщений в WhatsApp и заказов почти нет. Это одна из самых частых жалоб владельцев бизнеса в Азербайджане. Обычно дело не в «устаревшем дизайне», а в том, что посетитель <strong>не понимает, что делать</strong>, ему мешают мелкие препятствия, а страница не вызывает доверия.</p>
<p>Ниже — <strong>UX- и конверсионный аудит из 15 пунктов</strong>, который вы можете провести сами, чтобы понять, почему сайт не приносит заявки. Без модных трендов — только то, что напрямую влияет на продажи.</p>

<h2>Что такое конверсия и как её измерять?</h2>
<p><strong>Конверсия</strong> — ценное для вас действие посетителя: звонок, сообщение в WhatsApp, отправка формы, заказ. <strong>Коэффициент конверсии</strong> = число действий ÷ число посетителей × 100%.</p>
<p>При 2000 посетителей и 20 заявках в месяц конверсия — 1%. Подняв её до 2%, вы удвоите заявки без увеличения рекламного бюджета. Поэтому доработать существующий сайт часто выгоднее, чем покупать больше трафика.</p>
<p>Минимальный набор: <strong>Google Analytics 4</strong> (звонки, клики на WhatsApp и отправки форм — как события) и <strong>Google Search Console</strong>. Если вы не знаете, сколько заявок приносит каждая страница, начните с этого.</p>

<h2>Первые 5 секунд: что видит посетитель?</h2>
<h3>1. Сразу ли понятно, чем вы занимаетесь?</h3>
<p>Вверху главной нужна конкретная фраза, а не общий лозунг: <em>«POS-система для кафе и ресторанов в Баку — установка за 1 день»</em>. Посетитель решает примерно за 5 секунд, нужно ли ему это.</p>
<h3>2. Видна ли главная кнопка (CTA)?</h3>
<p>На первом экране должно быть одно понятное действие: «Написать в WhatsApp», «Узнать цену», «Бесплатная консультация». Пять равнозначных кнопок — значит, не нажмут ни одну.</p>
<h3>3. Скорость сайта</h3>
<p>Многие посетители закрывают страницу, если она грузится через мобильный интернет дольше 3–4 секунд. Главные причины — тяжёлые изображения, слайдеры и лишние скрипты. Подробнее: <a href="/blog-details/skorost-sajta-core-web-vitals-2026">Скорость сайта и Core Web Vitals</a>.</p>

<h2>Мобильная версия: здесь большинство посетителей</h2>
<h3>4. Проверьте сами на телефоне</h3>
<p>Откройте сайт на своём телефоне и оформите заказ или отправьте форму как клиент. Мелкий текст? Неудобные кнопки? Не работает меню? Всплывающее окно закрывает экран?</p>
<h3>5. Связь в одно касание</h3>
<p>Номер телефона должен быть ссылкой <code>tel:</code>, а кнопка WhatsApp — сразу открывать чат. Если номер нужно копировать вручную, часть заявок теряется. Подробнее: <a href="/blog-details/mobilnaya-versiya-sayta-2026">Почему важна мобильная версия сайта</a>.</p>

<h2>Доверие: почему я должен вам верить?</h2>
<h3>6. Настоящие фото и реальные работы</h3>
<p>Стоковые фото не вызывают доверия. Ваша команда, офис, продукт, примеры выполненных работ — портфолио или «до/после» — убеждают гораздо сильнее.</p>
<h3>7. Отзывы и клиенты</h3>
<p>Отзывы в Google, логотипы клиентов, короткие видеоотзывы. Лучше всего работают отзывы с конкретным результатом.</p>
<h3>8. Контакты и адрес</h3>
<p>Адрес, карта, часы работы, название компании. Нет профиля в Google? Смотрите: <a href="/blog-details/kak-sozdat-google-business-profile-2026">Как создать Google Business Profile</a>.</p>
<h3>9. Открытость в вопросе цены</h3>
<p>Даже если точную цену назвать нельзя, «от ₼500» или блок «от чего зависит цена» удерживают посетителя. Без информации о цене люди часто уходят к конкуренту.</p>

<h2>Формы и оформление заказа</h2>
<h3>10. Сократите форму</h3>
<p>Каждое лишнее поле снижает число заявок. Для первого обращения часто достаточно <strong>имени и телефона</strong> — остальное менеджер уточнит по звонку.</p>
<h3>11. Работает ли форма?</h3>
<p>Звучит странно, но при аудитах часто выясняется: форма отправляется, а письмо никуда не приходит (спам, старый адрес, ошибка SMTP). Проверяйте свою форму раз в месяц.</p>
<h3>12. Что происходит после отправки?</h3>
<p>Покажите понятное сообщение: «Спасибо, перезвоним в течение 30 минут». Это успокаивает клиента и даёт отдельную страницу или событие для учёта конверсий в Analytics.</p>
<h3>13. Корзина и оплата (для интернет-магазинов)</h3>
<p>Обязательная регистрация, скрытая стоимость доставки и длинное оформление — главные причины брошенных корзин. Нужны заказ без регистрации, заранее указанная доставка и местные способы оплаты. Подробнее: <a href="/blog-details/kak-otkryt-internet-magazin-v-azerbajdzhane-2026">Как открыть интернет-магазин</a>.</p>

<h2>Контент и структура</h2>
<h3>14. Отдельная страница для каждой услуги</h3>
<p>Если все услуги перечислены на одной странице, ни Google, ни посетитель не могут в них разобраться. Для каждой ключевой услуги — своя страница: что входит, для кого, примеры, диапазон цен, FAQ и CTA. Для рекламы лучше работает отдельный лендинг: <a href="/blog-details/chto-takoe-lending-2026">Что такое лендинг</a>.</p>
<h3>15. Отвечайте на вопрос посетителя, а не рассказывайте «о нас»</h3>
<p>Вместо «Мы работаем с 2015 года» начните с проблемы клиента: «Теряете заказы в Excel?». Текст должен легко сканироваться: короткие абзацы, заголовки, списки.</p>

<h2>Чек-лист из 15 пунктов</h2>
<table>
  <thead>
    <tr><th>#</th><th>Проверка</th><th>Как проверить</th></tr>
  </thead>
  <tbody>
    <tr><td>1</td><td>За 5 секунд понятно, чем вы занимаетесь</td><td>Покажите незнакомому человеку</td></tr>
    <tr><td>2</td><td>Одна главная CTA на первом экране</td><td>Смотрите с телефона без прокрутки</td></tr>
    <tr><td>3</td><td>Приемлемая мобильная скорость</td><td>PageSpeed Insights</td></tr>
    <tr><td>4</td><td>Удобно пользоваться с телефона</td><td>Оформите тестовый заказ</td></tr>
    <tr><td>5</td><td>Звонок/WhatsApp в одно касание</td><td>Ссылки tel: и wa.me</td></tr>
    <tr><td>6</td><td>Настоящие фото, портфолио</td><td>Посчитайте стоковые фото</td></tr>
    <tr><td>7</td><td>Отзывы на виду</td><td>Главная и страницы услуг</td></tr>
    <tr><td>8</td><td>Адрес, карта, часы работы</td><td>Футер и страница контактов</td></tr>
    <tr><td>9</td><td>Есть информация о цене</td><td>Найдите слово «цена»</td></tr>
    <tr><td>10</td><td>В форме 2–4 поля</td><td>Посчитайте поля</td></tr>
    <tr><td>11</td><td>Письма с формы доходят</td><td>Отправьте тестовую заявку</td></tr>
    <tr><td>12</td><td>Есть сообщение/страница «Спасибо»</td><td>Отправьте форму</td></tr>
    <tr><td>13</td><td>Простое оформление (магазин)</td><td>Закажите без регистрации</td></tr>
    <tr><td>14</td><td>У каждой услуги своя страница</td><td>Структура меню</td></tr>
    <tr><td>15</td><td>Текст начинается с проблемы клиента</td><td>Прочитайте первый абзац</td></tr>
  </tbody>
</table>

<h2>Как провести аудит: практические шаги</h2>
<ol>
  <li><strong>Измерьте:</strong> настройте в GA4 события звонков, WhatsApp и форм; соберите данные за 2–4 недели.</li>
  <li><strong>Понаблюдайте:</strong> бесплатный инструмент вроде Microsoft Clarity покажет тепловые карты и записи сессий — где люди застревают?</li>
  <li><strong>Составьте список:</strong> пройдите 15 пунктов и отсортируйте проблемы по влиянию.</li>
  <li><strong>Начните с малого:</strong> CTA, форма, кнопка WhatsApp, скорость — быстро исправить, быстро увидеть эффект.</li>
  <li><strong>Измерьте снова:</strong> сравните одинаковые периоды до и после.</li>
</ol>
<p>Если проблемы глубокие (устаревшая технология, нет мобильной версии, неудобная админ-панель), полная переделка может оказаться выгоднее: <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">7 признаков, что сайту нужен редизайн</a>.</p>

<h2>Частые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какая конверсия сайта считается нормальной?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Она сильно зависит от ниши, источника трафика и цели; для заявок на сайтах услуг часто встречается диапазон примерно 1–5%. Лучший ориентир — ваш собственный показатель, который вы улучшаете шаг за шагом.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли переделывать сайт после UX-аудита?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Чаще всего нет. Правки CTA, форм, мобильных кнопок, скорости и элементов доверия делаются на текущем сайте. Полная переделка нужна, только если технология устарела или структура в корне неверна.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда будет виден результат?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">При достаточном трафике эффект от изменений форм, кнопок и скорости обычно можно измерить за 2–4 недели. Сайтам с малым трафиком нужно больше времени.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Влияет ли рост конверсии на позиции в Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Напрямую нет, но быстрые, адаптивные страницы, чётко отвечающие на вопрос посетителя, соответствуют и рекомендациям Google по качеству. Хороший UX работает и на заявки, и на SEO.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли провести аудит самостоятельно?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да, чек-лист из 15 пунктов в этой статье поможет найти основные проблемы. Для настройки аналитики, ускорения сайта и технических правок помощь специалиста сэкономит время.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Сайт, который не приносит заявки, редко бывает «плохим» — просто на пути посетителя есть мелкие препятствия. Понятное предложение, одна главная кнопка, быстрая мобильная версия, элементы доверия и короткая форма в большинстве случаев заметно меняют результат.</p>
<p><strong>Хотите бесплатный экспресс-аудит сайта? <a href="/kontakty">Напишите нам</a></strong> — покажем 3–5 мест, где вы теряете больше всего заявок, и предложим решения. Подробнее: <a href="/uslugi">наши услуги</a>, <a href="/blog-details/zachem-nuzhny-seo-uslugi-2026">SEO-услуги в Азербайджане</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'sayt-niye-muraciet-getirmir-ux-audit-2026'],
            [
                'slug_en' => 'website-not-generating-leads-ux-audit-2026',
                'slug_ru' => 'pochemu-sajt-ne-prinosit-zayavki-ux-audit-2026',

                'title_az' => 'Sayt Niyə Müraciət Gətirmir? 15 Bəndlik UX və Konversiya Auditi 2026',
                'title_en' => 'Why Your Website Isn\'t Generating Leads: A 15-Point UX & Conversion Audit 2026',
                'title_ru' => 'Почему сайт не приносит заявки? UX- и конверсионный аудит из 15 пунктов 2026',

                'review_az' => 'Ziyarətçi var, zəng yoxdur? Saytın müraciət gətirməməsinin səbəbləri: ilk 5 saniyə, mobil təcrübə, etibar, formalar, struktur. 15 bəndlik yoxlama cədvəli və audit addımları.',
                'review_en' => 'Visitors but no calls? Why websites fail to generate leads: the first 5 seconds, mobile experience, trust, forms and structure. A 15-point checklist and audit steps.',
                'review_ru' => 'Посетители есть, а звонков нет? Почему сайт не приносит заявки: первые 5 секунд, мобильная версия, доверие, формы, структура. Чек-лист из 15 пунктов и шаги аудита.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '18 Oktyabr 2026',
                'date_en' => 'October 18, 2026',
                'date_ru' => '18 Октября 2026',

                'photo'    => 'cover-ux-audit-az.png',
                'photo_en' => 'cover-ux-audit-en.png',
                'photo_ru' => 'cover-ux-audit-ru.png',

                'meta_title_az' => 'Sayt Niyə Müraciət Gətirmir? UX Audit 2026 | RS Code',
                'meta_title_en' => 'Website Not Generating Leads? UX Audit 2026 | RS Code',
                'meta_title_ru' => 'Сайт не приносит заявки? UX-аудит 2026 | RS Code',

                'meta_description_az' => 'Saytınıza ziyarətçi gəlir, amma zəng və sifariş yoxdur? 15 bəndlik UX və konversiya auditi: CTA, mobil təcrübə, sürət, etibar, formalar. Özünüz yoxlayın.',
                'meta_description_en' => 'Getting visitors but no calls or orders? A 15-point UX and conversion audit: CTA, mobile experience, speed, trust and forms. Check your site yourself.',
                'meta_description_ru' => 'Посетители есть, а звонков и заказов нет? UX- и конверсионный аудит из 15 пунктов: CTA, мобильная версия, скорость, доверие, формы. Проверьте сами.',

                'meta_keywords_az' => 'ux audit, sayt auditi, konversiya, sayt müraciət gətirmir, saytın konversiyasını artırmaq, ux dizayn 2026',
                'meta_keywords_en' => 'ux audit, website audit, conversion rate optimisation, website not generating leads, increase website conversions, ux design 2026',
                'meta_keywords_ru' => 'ux аудит, аудит сайта, конверсия сайта, сайт не приносит заявки, повысить конверсию сайта, ux дизайн 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
