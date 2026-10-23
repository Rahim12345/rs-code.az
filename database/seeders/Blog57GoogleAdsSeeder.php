<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog57GoogleAdsSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Müştəri "Bakıda kondisioner təmiri" yazır və Google-da ilk gördüyü nəticələr reklamdır. Google Ads-in gücü buradadır: reklam yalnız sizin xidmətinizi <strong>elə indi axtaran</strong> insana göstərilir. Amma düzgün qurulmasa, büdcə bir neçə gündə "kliklərə" xərclənir və bir dənə də zəng gəlmir.</p>
<p>Bu yazıda 2027-ci il üçün Google Ads-in necə işlədiyini, Azərbaycanda nə qədər büdcə lazım olduğunu, Google-un rəsmi büdcə qaydalarını və pulu boşa xərcləməmək üçün yoxlama siyahısını izah edirik.</p>

<h2>Google Ads Necə İşləyir?</h2>
<ul>
  <li><strong>Açar sözlər:</strong> siz reklamın hansı axtarışlarda görünəcəyini seçirsiniz (məs. "loqo sifarişi", "restoran proqramı").</li>
  <li><strong>Klikə görə ödəniş (CPC):</strong> axtarış reklamlarında adətən reklam göstəriləndə deyil, insan ona klikləyəndə ödəyirsiniz.</li>
  <li><strong>Hərrac:</strong> eyni açar söz üçün bir neçə reklamverən rəqabət aparır. Mövqe yalnız təklif olunan qiymətdən deyil, reklamın keyfiyyətindən də asılıdır.</li>
  <li><strong>Hədəfləmə:</strong> şəhər, rayon, gün və saat, cihaz, dil üzrə məhdudlaşdırmaq olar.</li>
</ul>

<h2>Kampaniya Növləri: Hansı Sizə Lazımdır?</h2>
<table>
  <thead>
    <tr><th>Növ</th><th>Harada görünür</th><th>Kim üçün uyğundur</th></tr>
  </thead>
  <tbody>
    <tr><td>Axtarış (Search)</td><td>Google axtarış nəticələrində</td><td>Xidmət və satış: ən yüksək niyyətli müştərilər</td></tr>
    <tr><td>Performance Max</td><td>Axtarış, YouTube, Gmail, xəritə, saytlar</td><td>Onlayn mağaza, çoxlu konversiya datası olan hesablar</td></tr>
    <tr><td>Display</td><td>Xəbər saytları və digər saytlarda banner</td><td>Brend tanınması, remarketinq</td></tr>
    <tr><td>Video (YouTube)</td><td>YouTube videolarından əvvəl və arasında</td><td>Tanınma, məhsul təqdimatı</td></tr>
  </tbody>
</table>
<p>Kiçik və orta xidmət biznesi üçün ən yaxşı başlanğıc adətən <strong>axtarış kampaniyasıdır</strong>: büdcə məhduddursa, pulu ancaq axtaran adama xərcləmək daha səmərəlidir.</p>

<h2>Google Ads Neçəyə Başa Gəlir?</h2>
<p>Burada iki ayrı xərc var. SMM-də olduğu kimi, bunları qarışdırmamaq vacibdir (bax: <a href="/blog-details/smm-xidmeti-qiymeti-2026">SMM xidməti qiyməti</a>):</p>
<table>
  <thead>
    <tr><th>Xərc</th><th>Təxmini (AZN)</th><th>Kimə ödənilir</th></tr>
  </thead>
  <tbody>
    <tr><td>Reklam büdcəsi (kiçik biznes)</td><td>ayda 300 – 1 500</td><td>Birbaşa Google-a</td></tr>
    <tr><td>Kampaniyanın qurulması</td><td>birdəfəlik 150 – 500</td><td>Mütəxəssis və ya agentliyə</td></tr>
    <tr><td>Aylıq idarəetmə</td><td>ayda 150 – 600 və ya büdcənin 10–20%-i</td><td>Mütəxəssis və ya agentliyə</td></tr>
  </tbody>
</table>
<p>Bir klikin qiyməti sahədən və rəqabətdən asılıdır: rəqibi az olan lokal xidmətlərdə ucuz, hüquq, tibb, daşınmaz əmlak kimi sahələrdə xeyli baha olur. Dəqiq rəqəmi Google Ads-in açar söz planlayıcısında (Keyword Planner) görmək olar. Yuxarıdakı rəqəmlər Azərbaycan bazarı üzrə təxminidir.</p>

<h2>Büdcə Qaydası: Google Bir Gündə Nə Qədər Xərcləyə Bilər?</h2>
<p>Bir çox reklamverəni təəccübləndirən məqam: gündəlik büdcəni 20 manat qoyursunuz, amma bəzi günlər daha çox xərclənir. Google-un rəsmi izahına görə:</p>
<ul>
  <li>trafikin dəyişkənliyindən istifadə etmək üçün kampaniya <strong>bir gündə orta gündəlik büdcənin 2 qatına qədər</strong> xərcləyə bilər;</li>
  <li>amma ay ərzində ümumi xərc <strong>orta gündəlik büdcənin 30,4 qatından</strong> çox olmur.</li>
</ul>
<p>Yəni gündəlik 20 AZN büdcə ilə ayda təxminən 608 AZN-dən (20 × 30,4) artıq ödəməyəcəksiniz. Büdcəni planlayanda gündəlik deyil, bu aylıq rəqəmlə hesablayın.</p>

<h2>Keyfiyyət Balı: Niyə Rəqib Daha Ucuz Ödəyir?</h2>
<p>Google hər açar söz üçün 1-dən 10-a qədər <strong>Keyfiyyət Balı</strong> (Quality Score) göstərir. Bu, reklamınızın keyfiyyətinin eyni axtarışda görünən digər reklamverənlərlə müqayisəsidir və üç komponentdən ibarətdir:</p>
<ol>
  <li><strong>Gözlənilən klik nisbəti (CTR):</strong> reklam göstəriləndə ona klikləmə ehtimalı.</li>
  <li><strong>Reklamın uyğunluğu:</strong> reklam mətninin axtaran adamın niyyətinə nə qədər uyğun olduğu.</li>
  <li><strong>Açılış səhifəsinin təcrübəsi:</strong> kliklədikdən sonra açılan səhifənin nə qədər uyğun və faydalı olduğu.</li>
</ol>
<p>Üçüncü bənd çox vaxt unudulur. Reklam ana səhifəyə yönləndirilirsə və orada axtarılan xidmət tapılmırsa, həm bal düşür, həm də müraciət gəlmir. Ən yaxşı nəticə hər xidmət üçün ayrıca <a href="/blog-details/landing-page-nedir-2026">landing page</a> ilə alınır. Saytın sürəti də vacibdir: bax <a href="/blog-details/sayt-sureti-core-web-vitals-2026">Core Web Vitals</a>.</p>

<h2>Pulu Boşa Xərcləməmək üçün 10 Bəndlik Yoxlama</h2>
<ol>
  <li><strong>Konversiya izləmə qurulub:</strong> zəng, WhatsApp kliki, forma göndərmə Google Ads-də ölçülür. Bunsuz hansı açar sözün işlədiyini bilmək mümkün deyil.</li>
  <li><strong>Mənfi açar sözlər əlavə olunub:</strong> "pulsuz", "vakansiya", "kurs", "yükle" kimi sizə müştəri gətirməyən axtarışlar istisna edilib.</li>
  <li><strong>Uyğunluq növləri düşünülüb:</strong> geniş uyğunluq (broad match) zəif hesabda büdcəni əlaqəsiz axtarışlara xərcləyə bilər; başlanğıcda ifadə və dəqiq uyğunluq daha nəzarətlidir.</li>
  <li><strong>Coğrafiya düzgündür:</strong> yalnız xidmət göstərdiyiniz şəhər və rayonlar seçilib.</li>
  <li><strong>Reklam cədvəli:</strong> zənglərə cavab verə bilmədiyiniz saatlarda reklam dayandırılıb və ya azaldılıb.</li>
  <li><strong>Dil və mətn:</strong> reklam Azərbaycan və rus dilində ayrıca qurulub, mətn axtarışa uyğundur.</li>
  <li><strong>Reklam əlavələri (assets):</strong> zəng düyməsi, ünvan, əlavə linklər, qısa üstünlüklər.</li>
  <li><strong>Açılış səhifəsi:</strong> reklamdakı təklif səhifədə dərhal görünür, telefonda rahat açılır və müraciət düyməsi var.</li>
  <li><strong>Axtarış sorğuları hesabatı:</strong> həftədə bir dəfə real axtarışlara baxılır və lazımsızları mənfi siyahıya əlavə olunur.</li>
  <li><strong>Hesab sizin adınızdadır:</strong> Google Ads hesabının sahibi biznesdir, agentliyə yalnız giriş verilir.</li>
</ol>

<h2>Google Ads, yoxsa SEO?</h2>
<table>
  <thead>
    <tr><th></th><th>Google Ads</th><th>SEO</th></tr>
  </thead>
  <tbody>
    <tr><td>Nəticə vaxtı</td><td>Kampaniya təsdiqlənən kimi</td><td>Adətən bir neçə ay</td></tr>
    <tr><td>Xərc modeli</td><td>Hər klik üçün ödəniş; büdcə bitəndə trafik dayanır</td><td>Məzmun və texniki işə investisiya; trafik davam edir</td></tr>
    <tr><td>Nəzarət</td><td>Açar söz, şəhər, saat dəqiq seçilir</td><td>Mövqe Google-un alqoritmindən asılıdır</td></tr>
    <tr><td>Ən uyğun</td><td>Yeni biznes, kampaniya, mövsümi təklif</td><td>Uzunmüddətli, sabit müraciət axını</td></tr>
  </tbody>
</table>
<p>Ən səmərəli yanaşma ikisini birlikdə istifadə etməkdir. Əvvəlcə Google Ads ilə hansı açar sözlərin müraciət gətirdiyini öyrənirsiniz, sonra həmin sözlər üçün SEO-ya investisiya edirsiniz. SEO haqqında ətraflı: <a href="/blog-details/seo-xidmeti-azerbaycan-2026">SEO xidməti Azərbaycanda</a>. Lokal biznesdirsə, pulsuz <a href="/blog-details/google-business-profile-nece-yaradilir-2026">Google Business Profile</a> da mütləqdir.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Azərbaycanda Google Ads üçün ayda nə qədər büdcə lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Kiçik biznes üçün təxminən ayda 300–1 500 AZN reklam büdcəsi ilə başlamaq olar. Dəqiq məbləğ sahədəki klik qiymətindən və rəqabətdən asılıdır. İdarəetmə xidməti ayrıca ödənilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google gündəlik büdcədən çox xərcləyə bilərmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli, bir gündə orta gündəlik büdcənin 2 qatına qədər. Amma Google-un qaydasına görə ay ərzində ümumi xərc orta gündəlik büdcənin 30,4 qatından çox olmur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Keyfiyyət Balı nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Google-un 1–10 şkalası ilə göstərdiyi diaqnostik göstəricidir. Gözlənilən klik nisbəti, reklamın uyğunluğu və açılış səhifəsinin təcrübəsi əsasında hesablanır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google Ads-in nəticəsi nə vaxt görünür?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Reklamlar təsdiqləndikdən sonra trafik dərhal başlaya bilər. Amma kampaniyanın optimallaşdırılması və bir müraciətin qiymətinin sabitləşməsi üçün adətən 2–4 həftə məlumat toplamaq lazımdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Saytsız Google Ads vermək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Zəng reklamları ilə qismən mümkündür, amma açılış səhifəsi olmadan Keyfiyyət Balı və nəticələr adətən zəif olur. Kiçik büdcə ilə belə, sadə landing page daha yaxşı nəticə verir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Google Ads müştərini axtardığı anda tapmağın ən sürətli yoludur, amma nəticə büdcədən çox qurulmadan asılıdır: konversiya izləmə, mənfi açar sözlər, düzgün coğrafiya və yaxşı açılış səhifəsi. Büdcəni aylıq (gündəlik × 30,4) hesablayın və nəticəni kliklə deyil, müraciətlə ölçün.</p>
<p><strong>Google reklamı ilə müraciət almaq istəyirsinizsə, <a href="/elaqe">bizə yazın</a></strong>. Mövcud kampaniyanızı yoxlayaq və ya sıfırdan quraq. Ətraflı: <a href="/google-reklamlari">Google reklamları</a>.</p>
<p><small><em>Qiymətlər Azərbaycan bazarı üzrə təxmini diapazonlardır (Oktyabr 2026). Büdcə qaydası və Keyfiyyət Balı haqqında məlumat Google Ads rəsmi yardım mərkəzinə (support.google.com/google-ads) əsaslanır. Reklam ödənişlərinin vergiyə cəlb olunmasını mühasibinizlə dəqiqləşdirin.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>A customer types "air conditioner repair Baku" and the first results they see on Google are ads. That is the power of Google Ads: your ad is shown only to someone searching for your service <strong>right now</strong>. But if it is set up badly, the budget is spent on "clicks" within days and not a single call comes in.</p>
<p>This article explains how Google Ads works in 2027, how much budget you need in Azerbaijan, Google's official budget rules and a checklist to avoid wasting money.</p>

<h2>How Does Google Ads Work?</h2>
<ul>
  <li><strong>Keywords:</strong> you choose which searches your ad appears for (e.g. "logo design order", "restaurant software").</li>
  <li><strong>Pay per click (CPC):</strong> with search ads you usually pay when someone clicks, not when the ad is shown.</li>
  <li><strong>Auction:</strong> several advertisers compete for the same keyword. Position depends not only on the bid but also on ad quality.</li>
  <li><strong>Targeting:</strong> you can limit by city, district, day and hour, device and language.</li>
</ul>

<h2>Campaign Types: Which One Do You Need?</h2>
<table>
  <thead>
    <tr><th>Type</th><th>Where it appears</th><th>Best for</th></tr>
  </thead>
  <tbody>
    <tr><td>Search</td><td>Google search results</td><td>Services and sales: highest-intent customers</td></tr>
    <tr><td>Performance Max</td><td>Search, YouTube, Gmail, Maps, websites</td><td>Online shops, accounts with plenty of conversion data</td></tr>
    <tr><td>Display</td><td>Banners on news and other sites</td><td>Brand awareness, remarketing</td></tr>
    <tr><td>Video (YouTube)</td><td>Before and during YouTube videos</td><td>Awareness, product launches</td></tr>
  </tbody>
</table>
<p>For small and medium service businesses, the best starting point is usually a <strong>search campaign</strong>: with a limited budget, spending only on people who are actively searching is more efficient.</p>

<h2>How Much Does Google Ads Cost?</h2>
<p>There are two separate costs here. As with SMM, it is important not to mix them up (see <a href="/blog-details/smm-services-cost-azerbaijan-2026">SMM services cost</a>):</p>
<table>
  <thead>
    <tr><th>Cost</th><th>Approximate (AZN)</th><th>Paid to</th></tr>
  </thead>
  <tbody>
    <tr><td>Ad budget (small business)</td><td>300 – 1,500 per month</td><td>Directly to Google</td></tr>
    <tr><td>Campaign setup</td><td>one-off 150 – 500</td><td>Specialist or agency</td></tr>
    <tr><td>Monthly management</td><td>150 – 600 per month or 10–20% of budget</td><td>Specialist or agency</td></tr>
  </tbody>
</table>
<p>Cost per click depends on the industry and competition: cheap for local services with few competitors, much higher in fields such as law, healthcare and real estate. You can see exact figures in Google Ads Keyword Planner. The figures above are approximate for the Azerbaijani market.</p>

<h2>Budget Rule: How Much Can Google Spend in a Day?</h2>
<p>Something that surprises many advertisers: you set a daily budget of 20 manat, but some days more is spent. According to Google's official help:</p>
<ul>
  <li>to take advantage of traffic fluctuations, a campaign <strong>may spend up to twice your average daily budget</strong> on a given day;</li>
  <li>but over the month you will spend <strong>no more than 30.4 times your average daily budget</strong>.</li>
</ul>
<p>So with a daily budget of AZN 20, you will not pay more than about AZN 608 a month (20 × 30.4). Plan your budget using this monthly figure, not the daily one.</p>

<h2>Quality Score: Why Does a Competitor Pay Less?</h2>
<p>Google shows a <strong>Quality Score</strong> from 1 to 10 for each keyword. It compares your ad quality with other advertisers appearing for the same search and is made up of three components:</p>
<ol>
  <li><strong>Expected clickthrough rate (CTR):</strong> the likelihood that your ad will be clicked when shown.</li>
  <li><strong>Ad relevance:</strong> how closely your ad matches the intent behind the search.</li>
  <li><strong>Landing page experience:</strong> how relevant and useful the page that opens after the click is.</li>
</ol>
<p>The third point is often forgotten. If an ad sends people to the home page and they cannot find the service they searched for, the score drops and no enquiries come in. The best results come from a dedicated <a href="/blog-details/what-is-a-landing-page-2026">landing page</a> for each service. Page speed matters too: see <a href="/blog-details/website-speed-core-web-vitals-2026">Core Web Vitals</a>.</p>

<h2>A 10-Point Checklist to Avoid Wasting Money</h2>
<ol>
  <li><strong>Conversion tracking is set up:</strong> calls, WhatsApp clicks and form submissions are measured in Google Ads. Without this you cannot tell which keywords work.</li>
  <li><strong>Negative keywords are added:</strong> searches that never bring customers, such as "free", "jobs", "course", "download", are excluded.</li>
  <li><strong>Match types are considered:</strong> broad match on a weak account can spend budget on unrelated searches; phrase and exact match give more control at the start.</li>
  <li><strong>Geography is correct:</strong> only the cities and districts you serve are selected.</li>
  <li><strong>Ad schedule:</strong> ads are paused or reduced at hours when you cannot answer calls.</li>
  <li><strong>Language and copy:</strong> Azerbaijani and Russian ads are set up separately, and the copy matches the search.</li>
  <li><strong>Ad assets:</strong> call button, address, sitelinks, short benefits.</li>
  <li><strong>Landing page:</strong> the offer in the ad is visible immediately, the page works well on mobile and has an enquiry button.</li>
  <li><strong>Search terms report:</strong> real searches are reviewed weekly and irrelevant ones added to the negative list.</li>
  <li><strong>The account is in your name:</strong> the business owns the Google Ads account; the agency only gets access.</li>
</ol>

<h2>Google Ads or SEO?</h2>
<table>
  <thead>
    <tr><th></th><th>Google Ads</th><th>SEO</th></tr>
  </thead>
  <tbody>
    <tr><td>Time to results</td><td>As soon as the campaign is approved</td><td>Usually several months</td></tr>
    <tr><td>Cost model</td><td>Pay per click; traffic stops when the budget ends</td><td>Investment in content and technical work; traffic continues</td></tr>
    <tr><td>Control</td><td>Keywords, city, hours chosen precisely</td><td>Position depends on Google's algorithm</td></tr>
    <tr><td>Best for</td><td>New businesses, campaigns, seasonal offers</td><td>Long-term, steady flow of enquiries</td></tr>
  </tbody>
</table>
<p>The most efficient approach is to use both. First, Google Ads shows which keywords bring enquiries; then you invest in SEO for those keywords. More on SEO: <a href="/blog-details/why-you-need-seo-services-2026">why you need SEO services</a>. For a local business, a free <a href="/blog-details/how-to-create-google-business-profile-2026">Google Business Profile</a> is a must too.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much budget do I need for Google Ads in Azerbaijan?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A small business can start with roughly AZN 300–1,500 per month in ad budget. The exact amount depends on cost per click and competition in your industry. Management is paid separately.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can Google spend more than my daily budget?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes, up to twice the average daily budget on a given day. But under Google's rules, monthly spend will not exceed 30.4 times the average daily budget.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is Quality Score?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A diagnostic metric Google shows on a 1–10 scale. It is based on expected clickthrough rate, ad relevance and landing page experience.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">When do Google Ads results show?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Traffic can start as soon as ads are approved. But optimising the campaign and stabilising cost per enquiry usually takes 2–4 weeks of data.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can I run Google Ads without a website?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Partly, with call ads, but without a landing page Quality Score and results are usually weak. Even on a small budget, a simple landing page performs better.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>Google Ads is the fastest way to reach customers at the moment they search, but results depend more on setup than on budget: conversion tracking, negative keywords, correct geography and a good landing page. Plan your budget monthly (daily × 30.4) and measure results in enquiries, not clicks.</p>
<p><strong>Want enquiries from Google ads? <a href="/contact">Write to us</a></strong> and we will audit your current campaign or build one from scratch. More: <a href="/google-ads">Google ads</a>.</p>
<p><small><em>Prices are approximate ranges for the Azerbaijani market (October 2026). Budget rules and Quality Score information are based on the official Google Ads Help Center (support.google.com/google-ads). Check the tax treatment of ad payments with your accountant.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Клиент пишет «ремонт кондиционеров Баку», и первые результаты в Google — реклама. В этом сила Google Ads: объявление показывается только тому, кто ищет вашу услугу <strong>прямо сейчас</strong>. Но при неправильной настройке бюджет за несколько дней уходит на «клики», а звонков нет.</p>
<p>В статье разбираем, как работает Google Ads в 2027 году, какой бюджет нужен в Азербайджане, официальные правила расходования бюджета Google и чек-лист, чтобы не тратить деньги впустую.</p>

<h2>Как работает Google Ads?</h2>
<ul>
  <li><strong>Ключевые слова:</strong> вы выбираете, по каким запросам показывать объявление (например, «заказать логотип», «программа для ресторана»).</li>
  <li><strong>Оплата за клик (CPC):</strong> в поисковой рекламе обычно платите не за показ, а за клик.</li>
  <li><strong>Аукцион:</strong> по одному ключевому слову соревнуются несколько рекламодателей. Позиция зависит не только от ставки, но и от качества объявления.</li>
  <li><strong>Таргетинг:</strong> можно ограничить по городу, району, дню и часу, устройству и языку.</li>
</ul>

<h2>Типы кампаний: какой нужен вам?</h2>
<table>
  <thead>
    <tr><th>Тип</th><th>Где показывается</th><th>Кому подходит</th></tr>
  </thead>
  <tbody>
    <tr><td>Поиск (Search)</td><td>В результатах поиска Google</td><td>Услуги и продажи: клиенты с самым высоким намерением</td></tr>
    <tr><td>Performance Max</td><td>Поиск, YouTube, Gmail, Карты, сайты</td><td>Интернет-магазины, аккаунты с большим объёмом данных о конверсиях</td></tr>
    <tr><td>Медийная (Display)</td><td>Баннеры на новостных и других сайтах</td><td>Узнаваемость, ремаркетинг</td></tr>
    <tr><td>Видео (YouTube)</td><td>До и во время роликов YouTube</td><td>Узнаваемость, запуск продукта</td></tr>
  </tbody>
</table>
<p>Малому и среднему бизнесу в сфере услуг лучше всего начинать с <strong>поисковой кампании</strong>: при ограниченном бюджете эффективнее тратить деньги только на тех, кто ищет.</p>

<h2>Сколько стоит Google Ads?</h2>
<p>Здесь две разные статьи расходов. Как и в SMM, их важно не путать (см. <a href="/blog-details/stoimost-smm-azerbaydzhan-2026">стоимость SMM</a>):</p>
<table>
  <thead>
    <tr><th>Расход</th><th>Ориентировочно (AZN)</th><th>Кому платится</th></tr>
  </thead>
  <tbody>
    <tr><td>Рекламный бюджет (малый бизнес)</td><td>300 – 1 500 в месяц</td><td>Напрямую Google</td></tr>
    <tr><td>Настройка кампании</td><td>единоразово 150 – 500</td><td>Специалисту или агентству</td></tr>
    <tr><td>Ежемесячное ведение</td><td>150 – 600 в месяц или 10–20% бюджета</td><td>Специалисту или агентству</td></tr>
  </tbody>
</table>
<p>Цена клика зависит от сферы и конкуренции: в локальных услугах с малым числом конкурентов дёшево, в юриспруденции, медицине, недвижимости — заметно дороже. Точные цифры можно посмотреть в Планировщике ключевых слов Google Ads. Приведённые цифры — ориентировочные для рынка Азербайджана.</p>

<h2>Правило бюджета: сколько Google может потратить за день?</h2>
<p>То, что удивляет многих рекламодателей: вы ставите дневной бюджет 20 манатов, а в некоторые дни тратится больше. Согласно официальной справке Google:</p>
<ul>
  <li>чтобы использовать колебания трафика, кампания <strong>в отдельный день может потратить до двух средних дневных бюджетов</strong>;</li>
  <li>но за месяц расход <strong>не превысит 30,4 средних дневных бюджета</strong>.</li>
</ul>
<p>То есть при дневном бюджете 20 AZN вы заплатите за месяц не больше примерно 608 AZN (20 × 30,4). Планируйте бюджет по этой месячной цифре, а не по дневной.</p>

<h2>Показатель качества: почему конкурент платит меньше?</h2>
<p>Google показывает для каждого ключевого слова <strong>Показатель качества</strong> (Quality Score) от 1 до 10. Он сравнивает качество вашего объявления с другими рекламодателями по тому же запросу и состоит из трёх компонентов:</p>
<ol>
  <li><strong>Ожидаемый CTR:</strong> вероятность клика по объявлению при показе.</li>
  <li><strong>Релевантность объявления:</strong> насколько текст соответствует намерению пользователя.</li>
  <li><strong>Качество целевой страницы:</strong> насколько полезна и релевантна страница, открывающаяся после клика.</li>
</ol>
<p>О третьем пункте часто забывают. Если реклама ведёт на главную, где нужной услуги не найти, падает и показатель, и число заявок. Лучший результат — отдельный <a href="/blog-details/chto-takoe-lending-2026">лендинг</a> под каждую услугу. Важна и скорость сайта: см. <a href="/blog-details/skorost-sajta-core-web-vitals-2026">Core Web Vitals</a>.</p>

<h2>Чек-лист из 10 пунктов, чтобы не сливать бюджет</h2>
<ol>
  <li><strong>Настроено отслеживание конверсий:</strong> звонки, клики в WhatsApp и отправка форм измеряются в Google Ads. Без этого невозможно понять, какие ключевые слова работают.</li>
  <li><strong>Добавлены минус-слова:</strong> исключены запросы, которые не приносят клиентов: «бесплатно», «вакансия», «курсы», «скачать».</li>
  <li><strong>Продуманы типы соответствия:</strong> широкое соответствие на слабом аккаунте может тратить бюджет на нерелевантные запросы; на старте фразовое и точное соответствие дают больше контроля.</li>
  <li><strong>Правильная география:</strong> выбраны только города и районы, где вы работаете.</li>
  <li><strong>Расписание показов:</strong> в часы, когда вы не можете ответить на звонок, реклама остановлена или снижена.</li>
  <li><strong>Язык и текст:</strong> объявления на азербайджанском и русском настроены отдельно, текст соответствует запросу.</li>
  <li><strong>Ресурсы объявления:</strong> кнопка звонка, адрес, дополнительные ссылки, короткие преимущества.</li>
  <li><strong>Целевая страница:</strong> предложение из объявления видно сразу, страница удобна на телефоне и есть кнопка заявки.</li>
  <li><strong>Отчёт по поисковым запросам:</strong> раз в неделю просматриваются реальные запросы, лишние добавляются в минус-слова.</li>
  <li><strong>Аккаунт оформлен на вас:</strong> владелец аккаунта Google Ads — бизнес, агентству выдаётся только доступ.</li>
</ol>

<h2>Google Ads или SEO?</h2>
<table>
  <thead>
    <tr><th></th><th>Google Ads</th><th>SEO</th></tr>
  </thead>
  <tbody>
    <tr><td>Скорость результата</td><td>Сразу после одобрения кампании</td><td>Обычно несколько месяцев</td></tr>
    <tr><td>Модель затрат</td><td>Оплата за клик; бюджет закончился — трафик остановился</td><td>Инвестиции в контент и техническую работу; трафик продолжается</td></tr>
    <tr><td>Контроль</td><td>Точный выбор ключевых слов, города, часов</td><td>Позиция зависит от алгоритма Google</td></tr>
    <tr><td>Лучше всего для</td><td>Новый бизнес, акции, сезонные предложения</td><td>Долгосрочный стабильный поток заявок</td></tr>
  </tbody>
</table>
<p>Самый эффективный подход — использовать оба канала. Сначала Google Ads показывает, какие ключевые слова приносят заявки, затем вы вкладываетесь в SEO по этим словам. Подробнее о SEO: <a href="/blog-details/zachem-nuzhny-seo-uslugi-2026">зачем нужны SEO-услуги</a>. Для локального бизнеса обязателен и бесплатный <a href="/blog-details/kak-sozdat-google-business-profile-2026">Google Business Profile</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какой бюджет нужен для Google Ads в Азербайджане?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Малому бизнесу можно начать примерно с 300–1 500 AZN рекламного бюджета в месяц. Точная сумма зависит от цены клика и конкуренции в сфере. Ведение оплачивается отдельно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Может ли Google потратить больше дневного бюджета?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да, в отдельный день — до двух средних дневных бюджетов. Но по правилам Google расход за месяц не превысит 30,4 средних дневных бюджета.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое Показатель качества?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Диагностический показатель Google по шкале 1–10. Рассчитывается на основе ожидаемого CTR, релевантности объявления и качества целевой страницы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда виден результат Google Ads?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Трафик может начаться сразу после одобрения объявлений. Но для оптимизации кампании и стабилизации стоимости заявки обычно нужно 2–4 недели данных.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли запускать Google Ads без сайта?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Частично — через объявления со звонком, но без целевой страницы показатель качества и результаты обычно слабые. Даже при небольшом бюджете простой лендинг работает лучше.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Google Ads — самый быстрый способ найти клиента в момент поиска, но результат зависит больше от настройки, чем от бюджета: отслеживание конверсий, минус-слова, правильная география и хорошая целевая страница. Считайте бюджет помесячно (дневной × 30,4) и измеряйте результат заявками, а не кликами.</p>
<p><strong>Хотите получать заявки из рекламы Google? <a href="/kontakty">Напишите нам</a></strong> — проверим текущую кампанию или настроим с нуля. Подробнее: <a href="/reklama-google">реклама в Google</a>.</p>
<p><small><em>Цены — ориентировочные диапазоны рынка Азербайджана (октябрь 2026). Правила бюджета и информация о Показателе качества основаны на официальной справке Google Ads (support.google.com/google-ads). Налогообложение рекламных платежей уточните у бухгалтера.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'google-ads-azerbaycan-2027'],
            [
                'slug_en' => 'google-ads-azerbaijan-cost-guide-2027',
                'slug_ru' => 'google-ads-azerbaydzhan-2027',

                'title_az' => 'Google Ads Azərbaycanda 2027: Qiymət, Büdcə və Reklamı Boşa Xərcləməmək üçün Bələdçi',
                'title_en' => 'Google Ads in Azerbaijan 2027: Cost, Budget and How Not to Waste Your Ad Spend',
                'title_ru' => 'Google Ads в Азербайджане 2027: стоимость, бюджет и как не слить рекламу',

                'review_az' => 'Google Ads necə işləyir və ayda nə qədər büdcə lazımdır? Kampaniya növləri, xidmət haqqı ilə reklam büdcəsi, Google-un 2× gündəlik / 30,4× aylıq büdcə qaydası, Keyfiyyət Balı və 10 bəndlik yoxlama.',
                'review_en' => 'How Google Ads works and what budget you need: campaign types, management fee vs ad budget, Google\'s 2× daily / 30.4× monthly budget rule, Quality Score and a 10-point checklist.',
                'review_ru' => 'Как работает Google Ads и какой нужен бюджет: типы кампаний, ведение и рекламный бюджет, правило Google 2× в день / 30,4× в месяц, Показатель качества и чек-лист из 10 пунктов.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '23 Oktyabr 2026',
                'date_en' => 'October 23, 2026',
                'date_ru' => '23 Октября 2026',

                'photo'    => 'cover-google-ads-az.png',
                'photo_en' => 'cover-google-ads-en.png',
                'photo_ru' => 'cover-google-ads-ru.png',

                'meta_title_az' => 'Google Ads Azərbaycanda 2027: Qiymət və Büdcə | RS Code',
                'meta_title_en' => 'Google Ads in Azerbaijan 2027: Cost & Budget | RS Code',
                'meta_title_ru' => 'Google Ads в Азербайджане 2027: цена и бюджет | RS Code',

                'meta_description_az' => 'Google reklamı neçəyə başa gəlir? 2027 büdcə və idarəetmə qiymətləri, kampaniya növləri, Google-un büdcə qaydası, Keyfiyyət Balı və pulu boşa xərcləməmək üçün 10 bənd.',
                'meta_description_en' => 'How much does Google Ads cost in Azerbaijan? 2027 budget and management prices, campaign types, Google\'s budget rule, Quality Score and a 10-point checklist.',
                'meta_description_ru' => 'Сколько стоит реклама в Google в Азербайджане? Бюджет и ведение 2027, типы кампаний, правило бюджета Google, Показатель качества и чек-лист из 10 пунктов.',

                'meta_keywords_az' => 'google ads azərbaycan, google reklamı qiyməti, google reklam vermək, kontekst reklam, google ads büdcə, google ads 2027',
                'meta_keywords_en' => 'google ads azerbaijan, google ads cost baku, ppc azerbaijan, google ads budget, quality score, google ads 2027',
                'meta_keywords_ru' => 'google ads азербайджан, реклама в google цена, контекстная реклама баку, бюджет google ads, показатель качества, google ads 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
