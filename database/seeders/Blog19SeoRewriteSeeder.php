<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Blog #19 yenidən yazılıb: köhnə mətn base64 şəkillər səbəbindən kəsilmişdi
 * (backup: serverdə storage/app/blog19-backup.json). Slug, tarix və cover dəyişmir.
 */
class Blog19SeoRewriteSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Telefonunuzu götürün və biznesinizlə bağlı bir açar sözü Google-da axtarın: "diş klinikası Bakı" və ya "veb sayt hazırlanması". İlk nəticələrdə saytınız varmı? Yoxdursa, həmin müştəri hər gün rəqibinizə gedir. SEO (axtarış sistemləri üçün optimallaşdırma) saytın bu axtarışlarda pulsuz, yəni reklamsız görünməsi üçün görülən işdir.</p>
<p>Bu yazıda SEO xidmətinin nədən ibarət olduğunu, Azərbaycanda təxmini qiymətləri, nəticənin nə vaxt gəldiyini və Google-un yeni <strong>AI Overviews və AI Mode</strong> cavablarında görünmək üçün nə etmək lazım olduğunu izah edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO nədir?</td><td>Saytın Google-da reklamsız, təbii nəticələrdə yuxarı çıxması üçün texniki, məzmun və lokal işlər</td></tr>
    <tr><td>Nə vaxt nəticə verir?</td><td>Adətən 3–6 ay; rəqabətli sahələrdə daha uzun</td></tr>
    <tr><td>Təxmini qiymət</td><td>Audit 150–500 AZN birdəfəlik; aylıq SEO 300–1 000 AZN, rəqabətli sahələrdə 1 000–3 000+ AZN</td></tr>
    <tr><td>Kimə lazımdır?</td><td>Müştərisi xidməti Google-da axtaran hər biznesə: klinika, təmir, təhsil, B2B, onlayn mağaza</td></tr>
  </tbody>
</table>

<h2>SEO Xidmətinə Nə Daxildir?</h2>
<h3>1. Texniki SEO</h3>
<ul>
  <li>Saytın Google tərəfindən taranması və indekslənməsi: <code>robots.txt</code>, sitemap, canonical, səhv səhifələr (404), yönləndirmələr (301).</li>
  <li>Sürət və mobil uyğunluq: Google-un Core Web Vitals göstəriciləri (bax: <a href="/blog-details/sayt-sureti-core-web-vitals-2026">sayt sürəti</a>).</li>
  <li>Çoxdilli saytlarda <code>hreflang</code>: Azərbaycan, rus və ingilis versiyalarının bir-birinə düzgün bağlanması.</li>
  <li>Structured data (schema.org): şirkət, məqalə, xidmət, sual-cavab məlumatlarının Google üçün işarələnməsi.</li>
</ul>
<h3>2. Açar söz və məzmun</h3>
<ul>
  <li>Müştərilərin real axtardığı sözlərin tapılması (Azərbaycan və rus dilində ayrıca).</li>
  <li>Hər xidmət üçün ayrıca, axtarışa uyğun səhifə. Ana səhifə bütün sözlərdə çıxa bilməz.</li>
  <li>Müştərinin suallarına cavab verən bloq yazıları: qiymət, müqayisə, "necə seçmək olar".</li>
</ul>
<h3>3. Lokal SEO</h3>
<ul>
  <li>Google Business Profile: xəritədə və "yaxınlıqda" axtarışlarda görünmək üçün ən vacib addım (bax: <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile necə yaradılır</a>).</li>
  <li>Ünvan, telefon və iş saatlarının saytda, profildə və kataloqlarda eyni olması.</li>
  <li>Müştəri rəyləri və onlara cavab.</li>
</ul>
<h3>4. Xarici siqnallar</h3>
<ul>
  <li>Etibarlı saytlardan keçidlər (backlink): tərəfdaşlar, xəbər saytları, sahə kataloqları.</li>
  <li>Spam və alınmış keçidlərdən uzaq durmaq. Bu cür keçidlər fayda əvəzinə zərər verə bilər.</li>
</ul>

<h2>SEO Neçəyə Başa Gəlir?</h2>
<table>
  <thead>
    <tr><th>Xidmət</th><th>Təxmini qiymət (AZN)</th><th>Nə alırsınız</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO audit</td><td>150 – 500 birdəfəlik</td><td>Texniki səhvlər, məzmun boşluqları, rəqib təhlili və prioritet siyahısı</td></tr>
    <tr><td>Aylıq SEO (kiçik biznes, lokal)</td><td>300 – 1 000</td><td>Texniki düzəlişlər, ayda bir neçə səhifə/yazı, Google Business Profile, hesabat</td></tr>
    <tr><td>Aylıq SEO (rəqabətli sahə, çoxdilli)</td><td>1 000 – 3 000+</td><td>Geniş məzmun planı, 2–3 dil, keçid işi, dərin analitika</td></tr>
  </tbody>
</table>
<p>Qiymət sahənin rəqabətindən, saytın texniki vəziyyətindən və dillərin sayından asılıdır. Sayt köhnə və ya yavaşdırsa, SEO-dan əvvəl saytı yeniləmək daha sərfəli ola bilər: bax <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">saytı yeniləmə vaxtının 7 əlaməti</a>.</p>

<h2>Google AI Overviews və AI Mode: SEO Necə Dəyişir?</h2>
<p>Google axtarışda artıq süni intellektlə hazırlanan cavablar göstərir: nəticələrin üstündə <strong>AI Overviews</strong> və ayrıca söhbət rejimi olan <strong>AI Mode</strong>. Bu cavablar mənbə kimi saytlara keçid verir. Bəs orada necə görünmək olar? Google-un rəsmi sənədinə görə:</p>
<ul>
  <li>AI Overviews və AI Mode-da görünmək üçün <strong>əlavə tələb və ya xüsusi optimallaşdırma yoxdur</strong>. Adi SEO qaydaları burada da keçərlidir.</li>
  <li>Səhifə Google-da <strong>indekslənmiş olmalı və axtarışda snippet (qısa təsvir) ilə göstərilməyə uyğun olmalıdır</strong>.</li>
  <li>Bunun üçün yeni maşın oxunaqlı fayl, "AI mətn faylı" və ya xüsusi markup yaratmaq lazım deyil.</li>
  <li>Structured data səhifədəki görünən mətnə uyğun olmalıdır.</li>
</ul>
<p>Praktikada AI cavablarında daha çox sitat gətirilən səhifələrin ortaq cəhətləri bunlardır:</p>
<ol>
  <li><strong>Suala birbaşa cavab:</strong> başlıqdan sonra 1–2 cümləlik aydın cavab, sonra təfərrüat.</li>
  <li><strong>Cədvəl və siyahılar:</strong> qiymət, müqayisə və addımlar strukturlu verilir.</li>
  <li><strong>Konkret faktlar və mənbələr:</strong> rəqəmlər rəsmi mənbələrə əsaslanır, tarix göstərilir.</li>
  <li><strong>Lokal kontekst:</strong> Azərbaycan qanunları, qiymətləri, şəhərləri. Qlobal məqalələrin verə bilmədiyi məlumat.</li>
  <li><strong>Şirkət haqqında aydın məlumat:</strong> kimin yazdığı, əlaqə, ünvan, sosial profillər.</li>
</ol>
<p>Bunu da bilmək faydalıdır: <code>Google-Extended</code> robots.txt nişanı Google-un Gemini kimi digər sistemlərdə məzmundan istifadəsini idarə edir, amma Google Axtarışa təsir etmir. Axtarışda görünmək Googlebot-un saytı tarama icazəsindən asılıdır.</p>

<h2>Nəticə Nə Vaxt Gəlir?</h2>
<table>
  <thead>
    <tr><th>Dövr</th><th>Nə baş verir</th></tr>
  </thead>
  <tbody>
    <tr><td>1-ci ay</td><td>Audit, texniki düzəlişlər, Search Console və analitika qurulur</td></tr>
    <tr><td>2–3-cü ay</td><td>Yeni və yenilənmiş səhifələr indekslənir, az rəqabətli sözlərdə ilk mövqelər görünür</td></tr>
    <tr><td>4–6-cı ay</td><td>Əsas açar sözlərdə hərəkət, müraciətlərin artması</td></tr>
    <tr><td>6+ ay</td><td>Sabit trafik; məzmun və keçid işi davam etdikcə mövqelər möhkəmlənir</td></tr>
  </tbody>
</table>
<p>Tez nəticə lazımdırsa, SEO ilə paralel Google reklamı işlətmək olar: bax <a href="/blog-details/google-ads-azerbaycan-2027">Google Ads Azərbaycanda 2027</a>.</p>

<h2>SEO Agentliyi Seçərkən 6 Sual</h2>
<ol>
  <li>Hansı konkret işlər görüləcək və aylıq hesabatda nə olacaq?</li>
  <li>Nəticə mövqe ilə yox, trafik və müraciətlə ölçülürmü?</li>
  <li>Search Console və Analytics hesabları sizin adınızadırmı?</li>
  <li>Keçidlər haradan və necə alınır? ("100 backlink 50 manata" təklifi təhlükəli siqnaldır.)</li>
  <li>Məzmunu kim yazır və Azərbaycan dilində keyfiyyət necə yoxlanır?</li>
  <li>"Google-da 1-ci yerə zəmanət" verilirmi? Heç kim belə zəmanət verə bilməz: sıralamanı Google müəyyən edir.</li>
</ol>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO xidməti Azərbaycanda neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Təxminən: SEO audit 150–500 AZN birdəfəlik, kiçik və lokal biznes üçün aylıq SEO 300–1 000 AZN, rəqabətli və çoxdilli layihələr üçün 1 000–3 000 AZN və daha çox.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO nəticəsi nə vaxt görünür?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Adətən 3–6 ay ərzində. İlk aylarda texniki düzəlişlər və indeksləmə, sonra az rəqabətli sözlərdə mövqelər, daha sonra əsas sözlərdə hərəkət görünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google AI Mode-da görünmək üçün xüsusi nə etmək lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google-a görə xüsusi tələb yoxdur: səhifə indekslənməli və axtarışda snippet ilə göstərilməyə uyğun olmalıdır. Adi SEO qaydaları, suala birbaşa cavab verən strukturlu məzmun və etibarlı məlumat AI cavablarında da işləyir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">llms.txt faylı lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google üçün yox. Google-un rəsmi sənədinə görə AI Overviews və AI Mode-da görünmək üçün yeni maşın oxunaqlı fayl və ya xüsusi "AI mətn faylı" yaratmaq lazım deyil.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO, yoxsa Google reklamı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Reklam dərhal trafik verir, amma büdcə bitəndə dayanır. SEO gec nəticə verir, amma trafik davam edir. Ən yaxşı yanaşma ikisini birlikdə işlətməkdir: reklamla hansı sözlərin müraciət gətirdiyini öyrənib, həmin sözlərə SEO ilə investisiya etmək.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>SEO bir dəfəlik iş deyil, saytın texniki sağlamlığı, müştərinin suallarına cavab verən məzmun və lokal etibarın davamlı qurulmasıdır. Google-un AI cavabları bu qaydaları dəyişmir, əksinə gücləndirir: aydın, strukturlu, faktlara əsaslanan və lokal məlumat verən saytlar həm adi nəticələrdə, həm də AI cavablarında daha çox görünür.</p>
<p><strong>Saytınızın SEO auditini etmək istəyirsinizsə, <a href="/elaqe">bizə yazın</a></strong>. Ətraflı: <a href="/seo-xidmeti">SEO xidməti</a>.</p>
<p><small><em>Qiymətlər Azərbaycan bazarı üzrə təxmini diapazonlardır (Oktyabr 2026). AI Overviews və AI Mode haqqında məlumat Google Search Central-ın rəsmi "AI features and your website" sənədinə (developers.google.com/search) əsaslanır.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>Pick up your phone and search Google for a keyword related to your business: "dental clinic Baku" or "website development". Is your site in the top results? If not, that customer goes to a competitor every day. SEO (search engine optimisation) is the work that makes your site appear in these searches for free, without ads.</p>
<p>This article explains what SEO services include, approximate prices in Azerbaijan, when results arrive, and what you need to do to appear in Google's new <strong>AI Overviews and AI Mode</strong> answers.</p>

<h2>Short Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What is SEO?</td><td>Technical, content and local work that moves a site up in Google's organic, ad-free results</td></tr>
    <tr><td>When does it work?</td><td>Usually 3–6 months; longer in competitive fields</td></tr>
    <tr><td>Approximate price</td><td>Audit AZN 150–500 one-off; monthly SEO AZN 300–1,000, AZN 1,000–3,000+ in competitive fields</td></tr>
    <tr><td>Who needs it?</td><td>Any business whose customers search Google: clinics, repairs, education, B2B, online shops</td></tr>
  </tbody>
</table>

<h2>What Do SEO Services Include?</h2>
<h3>1. Technical SEO</h3>
<ul>
  <li>Crawling and indexing by Google: <code>robots.txt</code>, sitemap, canonical tags, broken pages (404), redirects (301).</li>
  <li>Speed and mobile friendliness: Google's Core Web Vitals (see <a href="/blog-details/website-speed-core-web-vitals-2026">website speed</a>).</li>
  <li><code>hreflang</code> on multilingual sites: correctly linking Azerbaijani, Russian and English versions.</li>
  <li>Structured data (schema.org): marking up company, article, service and Q&amp;A information for Google.</li>
</ul>
<h3>2. Keywords and content</h3>
<ul>
  <li>Finding the words customers actually search (separately in Azerbaijani and Russian).</li>
  <li>A separate, search-focused page for each service. The home page cannot rank for every keyword.</li>
  <li>Blog posts that answer customer questions: prices, comparisons, "how to choose".</li>
</ul>
<h3>3. Local SEO</h3>
<ul>
  <li>Google Business Profile: the most important step for appearing on Maps and in "near me" searches (see <a href="/blog-details/how-to-create-google-business-profile-2026">how to create a Google Business Profile</a>).</li>
  <li>Consistent address, phone and opening hours across the site, profile and directories.</li>
  <li>Customer reviews and replies to them.</li>
</ul>
<h3>4. Off-site signals</h3>
<ul>
  <li>Links from trustworthy sites (backlinks): partners, news sites, industry directories.</li>
  <li>Staying away from spam and bought links, which can do more harm than good.</li>
</ul>

<h2>How Much Does SEO Cost?</h2>
<table>
  <thead>
    <tr><th>Service</th><th>Approximate price (AZN)</th><th>What you get</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO audit</td><td>150 – 500 one-off</td><td>Technical errors, content gaps, competitor analysis and a priority list</td></tr>
    <tr><td>Monthly SEO (small, local business)</td><td>300 – 1,000</td><td>Technical fixes, a few pages/posts a month, Google Business Profile, reporting</td></tr>
    <tr><td>Monthly SEO (competitive, multilingual)</td><td>1,000 – 3,000+</td><td>Broad content plan, 2–3 languages, link building, in-depth analytics</td></tr>
  </tbody>
</table>
<p>The price depends on competition, the technical state of the site and the number of languages. If the site is old or slow, rebuilding it before SEO may be more cost-effective: see <a href="/blog-details/signs-you-need-website-redesign-2026">7 signs you need a website redesign</a>.</p>

<h2>Google AI Overviews and AI Mode: How Is SEO Changing?</h2>
<p>Google search now shows AI-generated answers: <strong>AI Overviews</strong> above the results and <strong>AI Mode</strong>, a separate conversational mode. These answers link to websites as sources. How do you appear there? According to Google's official documentation:</p>
<ul>
  <li>There are <strong>no additional requirements or special optimisations</strong> needed to appear in AI Overviews or AI Mode. Standard SEO practices still apply.</li>
  <li>A page must be <strong>indexed and eligible to be shown in Search with a snippet</strong>.</li>
  <li>You do not need to create new machine-readable files, "AI text files" or special markup.</li>
  <li>Structured data should match the visible text on the page.</li>
</ul>
<p>In practice, pages cited more often in AI answers tend to share these traits:</p>
<ol>
  <li><strong>A direct answer to the question:</strong> a clear 1–2 sentence answer after the heading, then the detail.</li>
  <li><strong>Tables and lists:</strong> prices, comparisons and steps are structured.</li>
  <li><strong>Specific facts and sources:</strong> figures based on official sources, with dates.</li>
  <li><strong>Local context:</strong> Azerbaijani laws, prices and cities. Information global articles cannot provide.</li>
  <li><strong>Clear company information:</strong> who wrote it, contact details, address, social profiles.</li>
</ol>
<p>Also useful to know: the <code>Google-Extended</code> robots.txt token controls how Google uses content in other systems such as Gemini, but it does not affect Google Search. Appearing in Search depends on Googlebot being allowed to crawl your site.</p>

<h2>When Do Results Arrive?</h2>
<table>
  <thead>
    <tr><th>Period</th><th>What happens</th></tr>
  </thead>
  <tbody>
    <tr><td>Month 1</td><td>Audit, technical fixes, Search Console and analytics set up</td></tr>
    <tr><td>Months 2–3</td><td>New and updated pages are indexed; first positions for low-competition keywords</td></tr>
    <tr><td>Months 4–6</td><td>Movement on main keywords, more enquiries</td></tr>
    <tr><td>6+ months</td><td>Steady traffic; positions strengthen as content and link work continue</td></tr>
  </tbody>
</table>
<p>If you need results quickly, you can run Google ads alongside SEO: see <a href="/blog-details/google-ads-azerbaijan-cost-guide-2027">Google Ads in Azerbaijan 2027</a>.</p>

<h2>6 Questions When Choosing an SEO Agency</h2>
<ol>
  <li>What specific work will be done, and what will the monthly report contain?</li>
  <li>Are results measured by traffic and enquiries, not just rankings?</li>
  <li>Are the Search Console and Analytics accounts in your name?</li>
  <li>Where and how are links obtained? ("100 backlinks for 50 manat" is a red flag.)</li>
  <li>Who writes the content, and how is Azerbaijani-language quality checked?</li>
  <li>Do they "guarantee #1 on Google"? Nobody can guarantee that: Google decides rankings.</li>
</ol>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much do SEO services cost in Azerbaijan?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Roughly: an SEO audit costs AZN 150–500 one-off, monthly SEO for a small local business AZN 300–1,000, and competitive or multilingual projects AZN 1,000–3,000 or more.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">When do SEO results show?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Usually within 3–6 months. First come technical fixes and indexing, then rankings for low-competition keywords, and later movement on the main keywords.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What do I need to do to appear in Google AI Mode?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">According to Google there are no special requirements: the page must be indexed and eligible to be shown with a snippet. Standard SEO, structured content that answers the question directly, and reliable information also work in AI answers.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do I need an llms.txt file?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Not for Google. Google's official documentation says you do not need to create new machine-readable files or special "AI text files" to appear in AI Overviews and AI Mode.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO or Google Ads?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ads bring traffic immediately but stop when the budget runs out. SEO takes longer but traffic continues. The best approach is to use both: learn from ads which keywords bring enquiries, then invest in SEO for those keywords.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>SEO is not a one-off task but the ongoing work of keeping a site technically healthy, publishing content that answers customer questions and building local trust. Google's AI answers do not change these rules; they reinforce them. Clear, structured, fact-based sites with local information appear more often both in regular results and in AI answers.</p>
<p><strong>Want an SEO audit of your website? <a href="/contact">Write to us</a></strong>. More: <a href="/seo-services">SEO services</a>.</p>
<p><small><em>Prices are approximate ranges for the Azerbaijani market (October 2026). Information on AI Overviews and AI Mode is based on Google Search Central's official "AI features and your website" documentation (developers.google.com/search).</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Возьмите телефон и поищите в Google запрос, связанный с вашим бизнесом: «стоматология Баку» или «разработка сайтов». Есть ли ваш сайт в первых результатах? Если нет, этот клиент каждый день уходит к конкуренту. SEO (поисковая оптимизация) — это работа, благодаря которой сайт появляется в таких запросах бесплатно, без рекламы.</p>
<p>В статье разбираем, что входит в SEO-услуги, ориентировочные цены в Азербайджане, когда появляется результат и что нужно сделать, чтобы попасть в новые ответы Google — <strong>AI Overviews и AI Mode</strong>.</p>

<h2>Коротко</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Что такое SEO?</td><td>Технические, контентные и локальные работы, чтобы сайт поднимался в органической выдаче Google без рекламы</td></tr>
    <tr><td>Когда будет результат?</td><td>Обычно 3–6 месяцев; в конкурентных нишах дольше</td></tr>
    <tr><td>Ориентировочная цена</td><td>Аудит 150–500 AZN разово; ежемесячное SEO 300–1 000 AZN, в конкурентных нишах 1 000–3 000+ AZN</td></tr>
    <tr><td>Кому нужно?</td><td>Любому бизнесу, чьи клиенты ищут в Google: клиники, ремонт, обучение, B2B, интернет-магазины</td></tr>
  </tbody>
</table>

<h2>Что входит в SEO-услуги?</h2>
<h3>1. Техническое SEO</h3>
<ul>
  <li>Сканирование и индексация Google: <code>robots.txt</code>, sitemap, canonical, битые страницы (404), редиректы (301).</li>
  <li>Скорость и мобильная адаптация: показатели Core Web Vitals (см. <a href="/blog-details/skorost-sajta-core-web-vitals-2026">скорость сайта</a>).</li>
  <li><code>hreflang</code> на многоязычных сайтах: правильная связка азербайджанской, русской и английской версий.</li>
  <li>Структурированные данные (schema.org): разметка информации о компании, статьях, услугах и FAQ для Google.</li>
</ul>
<h3>2. Ключевые слова и контент</h3>
<ul>
  <li>Поиск слов, которые реально ищут клиенты (отдельно на азербайджанском и русском).</li>
  <li>Отдельная страница под каждую услугу. Главная не может ранжироваться по всем запросам.</li>
  <li>Статьи в блоге, отвечающие на вопросы клиентов: цены, сравнения, «как выбрать».</li>
</ul>
<h3>3. Локальное SEO</h3>
<ul>
  <li>Google Business Profile — самый важный шаг для показа на Картах и в запросах «рядом» (см. <a href="/blog-details/kak-sozdat-google-business-profile-2026">как создать Google Business Profile</a>).</li>
  <li>Одинаковые адрес, телефон и часы работы на сайте, в профиле и каталогах.</li>
  <li>Отзывы клиентов и ответы на них.</li>
</ul>
<h3>4. Внешние сигналы</h3>
<ul>
  <li>Ссылки с надёжных сайтов (бэклинки): партнёры, новостные сайты, отраслевые каталоги.</li>
  <li>Никакого спама и купленных ссылок — они могут навредить больше, чем помочь.</li>
</ul>

<h2>Сколько стоит SEO?</h2>
<table>
  <thead>
    <tr><th>Услуга</th><th>Ориентировочно (AZN)</th><th>Что вы получаете</th></tr>
  </thead>
  <tbody>
    <tr><td>SEO-аудит</td><td>150 – 500 разово</td><td>Технические ошибки, пробелы в контенте, анализ конкурентов и список приоритетов</td></tr>
    <tr><td>Ежемесячное SEO (малый локальный бизнес)</td><td>300 – 1 000</td><td>Технические правки, несколько страниц/статей в месяц, Google Business Profile, отчёт</td></tr>
    <tr><td>Ежемесячное SEO (конкурентная ниша, несколько языков)</td><td>1 000 – 3 000+</td><td>Широкий контент-план, 2–3 языка, работа со ссылками, глубокая аналитика</td></tr>
  </tbody>
</table>
<p>Цена зависит от конкуренции, технического состояния сайта и числа языков. Если сайт старый или медленный, выгоднее сначала обновить его: см. <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">7 признаков, что сайту нужен редизайн</a>.</p>

<h2>Google AI Overviews и AI Mode: как меняется SEO?</h2>
<p>Google уже показывает в поиске ответы, сгенерированные ИИ: <strong>AI Overviews</strong> над результатами и отдельный диалоговый режим <strong>AI Mode</strong>. Эти ответы ссылаются на сайты как на источники. Как туда попасть? Согласно официальной документации Google:</p>
<ul>
  <li>Для показа в AI Overviews и AI Mode <strong>нет дополнительных требований или специальной оптимизации</strong>. Действуют обычные правила SEO.</li>
  <li>Страница должна быть <strong>проиндексирована и подходить для показа в поиске со сниппетом</strong>.</li>
  <li>Создавать новые машиночитаемые файлы, «ИИ-текстовые файлы» или специальную разметку не нужно.</li>
  <li>Структурированные данные должны соответствовать видимому тексту страницы.</li>
</ul>
<p>На практике страницы, которые чаще цитируются в ИИ-ответах, объединяет следующее:</p>
<ol>
  <li><strong>Прямой ответ на вопрос:</strong> чёткий ответ в 1–2 предложения после заголовка, затем подробности.</li>
  <li><strong>Таблицы и списки:</strong> цены, сравнения и шаги даны структурно.</li>
  <li><strong>Конкретные факты и источники:</strong> цифры из официальных источников, с датой.</li>
  <li><strong>Локальный контекст:</strong> законы, цены, города Азербайджана. То, чего нет в глобальных статьях.</li>
  <li><strong>Понятная информация о компании:</strong> кто автор, контакты, адрес, профили в соцсетях.</li>
</ol>
<p>Полезно знать: токен <code>Google-Extended</code> в robots.txt управляет использованием контента в других системах Google, например Gemini, но не влияет на Google Поиск. Показ в поиске зависит от того, разрешено ли Googlebot сканировать сайт.</p>

<h2>Когда появляется результат?</h2>
<table>
  <thead>
    <tr><th>Период</th><th>Что происходит</th></tr>
  </thead>
  <tbody>
    <tr><td>1-й месяц</td><td>Аудит, технические правки, настройка Search Console и аналитики</td></tr>
    <tr><td>2–3-й месяц</td><td>Новые и обновлённые страницы индексируются, первые позиции по низкоконкурентным запросам</td></tr>
    <tr><td>4–6-й месяц</td><td>Движение по основным запросам, рост заявок</td></tr>
    <tr><td>6+ месяцев</td><td>Стабильный трафик; позиции укрепляются по мере работы с контентом и ссылками</td></tr>
  </tbody>
</table>
<p>Если результат нужен быстро, параллельно с SEO можно запустить рекламу в Google: см. <a href="/blog-details/google-ads-azerbaydzhan-2027">Google Ads в Азербайджане 2027</a>.</p>

<h2>6 вопросов при выборе SEO-агентства</h2>
<ol>
  <li>Какие конкретно работы будут выполняться и что будет в ежемесячном отчёте?</li>
  <li>Измеряется ли результат трафиком и заявками, а не только позициями?</li>
  <li>Оформлены ли аккаунты Search Console и Analytics на вас?</li>
  <li>Откуда и как берутся ссылки? («100 бэклинков за 50 манатов» — тревожный сигнал.)</li>
  <li>Кто пишет контент и как проверяется качество текстов на азербайджанском?</li>
  <li>Обещают ли «гарантию 1-го места в Google»? Такую гарантию не может дать никто: ранжирование определяет Google.</li>
</ol>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит SEO в Азербайджане?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ориентировочно: SEO-аудит 150–500 AZN разово, ежемесячное SEO для малого локального бизнеса 300–1 000 AZN, для конкурентных и многоязычных проектов 1 000–3 000 AZN и выше.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда виден результат SEO?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Обычно в течение 3–6 месяцев. Сначала технические правки и индексация, затем позиции по низкоконкурентным запросам, позже — движение по основным.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что нужно сделать, чтобы появиться в Google AI Mode?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">По данным Google, специальных требований нет: страница должна быть проиндексирована и подходить для показа со сниппетом. Обычное SEO, структурированный контент с прямыми ответами и достоверная информация работают и в ИИ-ответах.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужен ли файл llms.txt?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Для Google — нет. В официальной документации Google сказано, что для показа в AI Overviews и AI Mode не нужно создавать новые машиночитаемые файлы или специальные «ИИ-текстовые файлы».</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">SEO или реклама в Google?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Реклама даёт трафик сразу, но останавливается, когда кончается бюджет. SEO даёт результат позже, но трафик продолжается. Лучше использовать оба канала: по рекламе узнать, какие запросы приносят заявки, и вложиться в SEO по ним.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>SEO — не разовая задача, а постоянная работа: техническое здоровье сайта, контент, отвечающий на вопросы клиентов, и локальное доверие. ИИ-ответы Google не меняют эти правила, а усиливают их: понятные, структурированные, основанные на фактах сайты с локальной информацией чаще появляются и в обычной выдаче, и в ИИ-ответах.</p>
<p><strong>Хотите SEO-аудит сайта? <a href="/kontakty">Напишите нам</a></strong>. Подробнее: <a href="/seo-uslugi">SEO-услуги</a>.</p>
<p><small><em>Цены — ориентировочные диапазоны рынка Азербайджана (октябрь 2026). Информация об AI Overviews и AI Mode основана на официальной документации Google Search Central «AI features and your website» (developers.google.com/search).</em></small></p>
HTML;

        DB::table('blogs')->where('slug_az', 'seo-xidmeti-azerbaycan-2026')->update([
            'text_az' => $textAz,
            'text_en' => $textEn,
            'text_ru' => $textRu,

            'review_az' => 'SEO xidmətinə nə daxildir, Azərbaycanda neçəyə başa gəlir və nəticə nə vaxt gəlir? Texniki, məzmun və lokal SEO, təxmini qiymətlər, Google AI Overviews və AI Mode-da görünmək üçün rəsmi qaydalar.',
            'review_en' => 'What SEO services include, what they cost in Azerbaijan and when results arrive: technical, content and local SEO, approximate prices, and Google\'s official guidance on appearing in AI Overviews and AI Mode.',
            'review_ru' => 'Что входит в SEO, сколько стоит в Азербайджане и когда будет результат: техническое, контентное и локальное SEO, ориентировочные цены и официальные правила Google для показа в AI Overviews и AI Mode.',

            'meta_description_az' => 'SEO xidməti Azərbaycanda: nə daxildir, neçəyə başa gəlir (audit 150–500 ₼, aylıq 300+ ₼), nəticə nə vaxt gəlir və Google AI Mode-da necə görünmək olar.',
            'meta_description_en' => 'SEO services in Azerbaijan: what is included, cost (audit AZN 150–500, monthly from AZN 300), when results arrive and how to appear in Google AI Mode.',
            'meta_description_ru' => 'SEO в Азербайджане: что входит, сколько стоит (аудит 150–500 AZN, от 300 AZN в месяц), когда результат и как попасть в Google AI Mode.',

            'updated_at' => now(),
        ]);
    }
}
