<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #60 — Instagram və Facebook reklamı qiyməti 2027.
 * Mənbələr: Meta Business Help (minimum büdcə, öyrənmə mərhələsi, auksion),
 * Meta Advertising Standards (24 saat yoxlama), Trend.az 15.08.2026 (Meta ƏDV açıqlaması).
 */
class Blog60MetaAdsCostSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>"Instagram reklamına neçə pul qoyum?" sualına çox vaxt iki cür cavab verilir: "gündə 5 dollar kifayətdir" və ya "az pulla heç nə alınmaz". İkisi də yarımçıqdır. Reklamın qiyməti sabit tarif deyil: Meta hər göstərişi auksionla satır və eyni büdcə bir biznesə 40 müraciət, digərinə 4 müraciət gətirə bilər. Fərqi büdcənin ölçüsü yox, <strong>düzgün hesablanması və qurulması</strong> yaradır.</p>
<p>Bu yazıda 2027-ci il üçün Instagram və Facebook reklamının Azərbaycanda nədən ibarət olduğunu, büdcənin necə hesablandığını, 2026-cı ilin sentyabrından tətbiq olunan 18% ƏDV-ni və pulu boşa xərcləyən səhvləri izah edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Meta-nın minimum büdcəsi</td><td>Göstəriş üzrə ödənişdə adətən gündə 1 USD (reklam qrupu üzrə). Meta başlanğıc üçün gündə ən azı 5 USD və 6 gündən uzun müddət tövsiyə edir</td></tr>
    <tr><td>Kiçik biznes üçün real başlanğıc</td><td>Ayda təxminən 150 – 500 AZN reklam büdcəsi (bazar təxmini)</td></tr>
    <tr><td>ƏDV</td><td>2026-09-01-dən Azərbaycan ünvanlı reklamçılar üçün 18%. VÖEN göstərilərsə, Meta ƏDV-ni fakturaya əlavə etmir, ƏDV-ni reklamçı özü bəyan edir</td></tr>
    <tr><td>Mütəxəssis haqqı</td><td>Reklamın qurulması və idarəsi ayda təxminən 150 – 600 AZN, büdcədən ayrıca (bazar təxmini)</td></tr>
    <tr><td>Nəticə nə vaxt sabitləşir?</td><td>Meta-ya görə reklam qrupu 7 gündə təxminən 50 nəticə topladıqda "öyrənmə mərhələsi" bitir</td></tr>
  </tbody>
</table>

<h2>Reklamın Qiyməti Üç Hissədən İbarətdir</h2>
<ol>
  <li><strong>Reklam büdcəsi</strong> — birbaşa Meta-ya ödənilir (kartla və ya hesabı əvvəlcədən doldurmaqla). Bu, reklamın neçə nəfərə göstəriləcəyini müəyyən edir.</li>
  <li><strong>Kreativ</strong> — şəkil, video, mətn. Telefonla çəkilmiş sadə video çox vaxt bahalı dizayndan yaxşı işləyir, amma ilk 2–3 saniyədə diqqəti tutmalıdır.</li>
  <li><strong>Qurulum və idarəetmə</strong> — hədəfin seçilməsi, auditoriya, Pixel və ya Conversions API qoşulması, testlər, həftəlik təhlil. Bunu özünüz edə bilərsiniz, ya da mütəxəssisə ödəyirsiniz.</li>
</ol>
<p>Agentlik təklifini müqayisə edərkən ilk sual budur: <strong>"Reklam büdcəsi qiymətə daxildirmi?"</strong> "Ayda 300 AZN" deyilən paketdə bəzən büdcə də var, bəzən yalnız xidmət haqqı. SMM paketlərinin tərkibi barədə ətraflı: <a href="/blog-details/smm-xidmeti-qiymeti-2026">SMM xidməti qiyməti</a>.</p>

<h2>Meta Qiyməti Necə Müəyyən Edir?</h2>
<p>Reklam yerləri auksionla satılır. Meta-nın rəsmi izahına görə auksionda yalnız ən yüksək təklif qalib gəlmir: təklif (bid), istifadəçinin hədəf hərəkəti etmə ehtimalı və reklamın keyfiyyəti birlikdə qiymətləndirilir. Yəni insanlara maraqlı olan reklam eyni nəticəni <strong>daha ucuz</strong> alır.</p>
<p>Hesabatda bu göstəriciləri görəcəksiniz:</p>
<ul>
  <li><strong>CPM</strong> — 1000 göstərişin qiyməti. Auditoriyanın rəqabətindən və mövsümdən asılıdır (noyabr–dekabrda adətən bahalaşır).</li>
  <li><strong>CPC</strong> — bir klikin qiyməti.</li>
  <li><strong>Nəticə başına xərc</strong> — bir müraciətin, mesajın və ya satışın qiyməti. Biznes üçün əsas göstərici budur.</li>
</ul>

<h2>Büdcəni Necə Hesablamalı?</h2>
<p>Büdcəni "nə qədər pulum var" sualından yox, <strong>"ayda neçə müraciət lazımdır"</strong> sualından başlayın:</p>
<p><strong>Aylıq büdcə ≈ istədiyiniz müraciət sayı × bir müraciətin qiyməti</strong></p>
<p>Bir müraciətin qiymətini əvvəlcədən dəqiq bilmək olmur — onu 1–2 həftəlik test göstərir. Aşağıdakı cədvəl yalnız hesablama nümunəsidir, real rəqəmlər sahəyə, şəhərə və kreativə görə dəyişir:</p>
<table>
  <thead>
    <tr><th>Məqsəd</th><th>Bir müraciətin qiyməti (nümunə)</th><th>Aylıq büdcə</th></tr>
  </thead>
  <tbody>
    <tr><td>Ayda 30 WhatsApp mesajı</td><td>5 AZN</td><td>150 AZN</td></tr>
    <tr><td>Ayda 60 forma müraciəti</td><td>6 AZN</td><td>360 AZN</td></tr>
    <tr><td>Ayda 20 kurs qeydiyyatı</td><td>20 AZN</td><td>400 AZN</td></tr>
  </tbody>
</table>
<p>Bu rəqəmlərə 18% ƏDV əlavə olunur (VÖEN göstərilməyibsə). Məsələn, ayda 300 AZN büdcə faktiki olaraq 354 AZN deməkdir.</p>
<p><strong>Öyrənmə mərhələsini nəzərə alın.</strong> Meta-ya görə reklam qrupu son əhəmiyyətli dəyişiklikdən sonra 7 gündə təxminən 50 nəticə toplamırsa, "Learning limited" statusu alır və nəticələr qeyri-sabit olur. Kiçik büdcə ilə bunun həlli: reklam qruplarını azaltmaq (büdcəni 5 qrupa bölməmək) və daha tez-tez baş verən nəticə seçmək (məsələn, "satış" əvəzinə "mesaj").</p>

<h2>2026-cı İldən: Meta Reklamına 18% ƏDV</h2>
<p>Meta 2026-cı il 1 sentyabrdan ödəniş ünvanı ("Sold To") Azərbaycan olan reklamçılardan 18% ƏDV tutur (Trend.az, 15.08.2026, Meta-nın açıqlamasına istinadla):</p>
<ul>
  <li><strong>VÖEN göstərilməyibsə</strong> (fiziki şəxslər və VÖEN yazmayan bizneslər) — reklam xərcinin üzərinə 18% əlavə olunur.</li>
  <li><strong>Etibarlı VÖEN göstərilibsə</strong> — Meta ƏDV-ni fakturaya əlavə etmir, VÖEN fakturada görünür. Bu halda ƏDV-ni reklamçı özü hesablayıb Dövlət Vergi Xidmətinə bəyan edir və ödəyir.</li>
  <li>VÖEN yazmaq reklam vermək üçün məcburi deyil.</li>
</ul>
<p>Bu, büdcə planlamasında ən çox unudulan bənddir. Biznes hesabınızda hansı variantın sizə uyğun olduğunu mühasibinizlə dəqiqləşdirin.</p>

<h2>"Boost" Düyməsi, yoxsa Ads Manager?</h2>
<table>
  <thead>
    <tr><th></th><th>Postu gücləndir (Boost)</th><th>Ads Manager</th></tr>
  </thead>
  <tbody>
    <tr><td>Sürət</td><td>Bir neçə dəqiqə</td><td>Qurulum vaxt aparır</td></tr>
    <tr><td>Hədəf seçimi</td><td>Məhdud</td><td>Tam: müraciət, mesaj, satış, sayt trafiki</td></tr>
    <tr><td>A/B test</td><td>Yox</td><td>Var</td></tr>
    <tr><td>Kimə uyğundur</td><td>Tədbir elanı, tanınma</td><td>Müraciət və satış istəyən biznes</td></tr>
  </tbody>
</table>
<p>Müraciət lazımdırsa, Boost adətən bəyənmə və baxış toplayır, müştəri yox. Reklamı Ads Manager-də "Potensial müştərilər" və ya "Mesajlar" hədəfi ilə qurun.</p>

<h2>Reklam Pulunu Boşa Xərcləyən 7 Səhv</h2>
<ol>
  <li><strong>Yanlış hədəf:</strong> müraciət lazımdır, reklam isə "izləyici" və ya "əhatə" üçün qurulub.</li>
  <li><strong>Büdcəni çox hissəyə bölmək:</strong> 5 reklam qrupunun hər biri gündə 2 AZN alır və heç biri öyrənmə mərhələsindən çıxmır.</li>
  <li><strong>Hər gün dəyişiklik:</strong> auditoriyanı, kreativi və ya hədəfi dəyişmək öyrənməni yenidən başladır. Reklama ən azı bir həftə verin.</li>
  <li><strong>Mesajlara gec cavab:</strong> reklam WhatsApp-a mesaj gətirir, cavab isə 3 saat sonra yazılır. Bu müraciət artıq rəqibdədir.</li>
  <li><strong>Zəif enmə səhifəsi:</strong> reklam sayta yönəlir, sayt isə mobildə yavaş açılır və formada 10 xana var. Bax: <a href="/blog-details/sayt-niye-muraciet-getirmir-ux-audit-2026">sayt niyə müraciət gətirmir</a>.</li>
  <li><strong>Pixel və ya Conversions API yoxdur:</strong> Meta kimin müraciət etdiyini bilmir və alqoritm öyrənə bilmir.</li>
  <li><strong>Eyni kreativ aylarla:</strong> auditoriya yorulur, nəticə başına xərc artır. 2–4 həftədən bir yeni variant hazırlayın.</li>
</ol>

<h2>Nəticəni Necə Ölçməli?</h2>
<p>Bəyənmə və baxış sayı müştəri sayı deyil. Hər ay bu üç rəqəmə baxın:</p>
<ul>
  <li><strong>Bir müraciətin qiyməti</strong> = reklam xərci (ƏDV ilə) ÷ müraciət sayı;</li>
  <li><strong>Müraciətdən satışa keçid faizi</strong> — 20 müraciətdən neçəsi aldı;</li>
  <li><strong>Bir müştərinin qiyməti</strong> = reklam xərci ÷ satış sayı. Bu rəqəm bir müştəridən qazandığınız mənfəətdən az olmalıdır.</li>
</ul>
<p>Axtarışda xidmətinizi soruşan müştəriləri tutmaq üçün Meta reklamını Google reklamı ilə birləşdirmək olar: <a href="/blog-details/google-ads-azerbaycan-2027">Google Ads Azərbaycanda 2027</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Instagram reklamı üçün minimum nə qədər pul lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Meta-nın minimumu göstəriş üzrə ödənişdə adətən gündə 1 USD-dir. Amma Meta özü başlanğıc üçün gündə ən azı 5 USD və 6 gündən uzun müddət tövsiyə edir. Kiçik biznes üçün real başlanğıc ayda təxminən 150–500 AZN-dir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Meta reklamına ƏDV tutulurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. 2026-cı il 1 sentyabrdan ödəniş ünvanı Azərbaycan olan reklamçılardan 18% ƏDV tutulur. Etibarlı VÖEN göstərilərsə, Meta ƏDV-ni fakturaya əlavə etmir və reklamçı ƏDV-ni özü bəyan edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Reklam nə vaxt nəticə verməyə başlayır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Meta reklamı adətən 24 saat ərzində yoxlayır. İlk müraciətlər bir neçə gündə gələ bilər, amma nəticə reklam qrupu öyrənmə mərhələsini (7 gündə təxminən 50 nəticə) keçəndən sonra sabitləşir. Ona görə ilk 1–2 həftəni test dövrü sayın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Boost etmək, yoxsa Ads Manager-dən reklam vermək?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tanınma və tədbir elanı üçün Boost kifayət edir. Müraciət və satış lazımdırsa, Ads Manager-də "Potensial müştərilər" və ya "Mesajlar" hədəfi ilə qurulan reklam daha səmərəlidir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Reklamı özüm qurum, yoxsa mütəxəssisə verim?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Büdcə kiçikdirsə və vaxtınız varsa, özünüz başlaya bilərsiniz. Büdcə ayda bir neçə yüz manatdan çoxdursa, düzgün hədəf, Pixel qurulumu və həftəlik təhlil xidmət haqqını adətən qaytarır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Reklam büdcəsini kim ödəyir — mən, yoxsa agentlik?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Ən şəffaf variant: büdcəni öz kartınızla, öz reklam hesabınızdan ödəyirsiniz, agentlik yalnız xidmət haqqı alır. Belə olanda hesab, auditoriya və statistika sizdə qalır.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/smm-xidmeti-qiymeti-2026">SMM xidməti qiyməti: paketə nə daxildir?</a></li>
  <li><a href="/blog-details/google-ads-azerbaycan-2027">Google Ads Azərbaycanda 2027</a></li>
  <li><a href="/blog-details/instagram-magaza-ve-sayt-2026">Instagram mağazası varkən sayt lazımdırmı?</a></li>
  <li><a href="/blog-details/landing-page-nedir-2026">Landing page nədir?</a></li>
  <li><a href="/blog-details/biznes-ucun-ai-chatbot-2026">Mesajlara dərhal cavab: biznes üçün AI çatbot</a></li>
</ul>

<h2>Nəticə</h2>
<p>Instagram və Facebook reklamının qiyməti büdcə, kreativ və idarəetmədən ibarətdir, 2026-cı ildən isə buna 18% ƏDV də əlavə olunub. Büdcəni lazım olan müraciət sayından hesablayın, ilk 1–2 həftəni test kimi qəbul edin və nəticəni bəyənmə ilə yox, bir müştərinin qiyməti ilə ölçün.</p>
<p><strong>Reklamınızı müraciət gətirən formada quraq? <a href="/facebook-ve-instagram-reklamlari">Facebook və Instagram reklamı xidməti</a></strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Minimum büdcə, öyrənmə mərhələsi və yoxlama müddəti Meta-nın rəsmi yardım səhifələrinə, ƏDV məlumatı Meta-nın açıqlamasına (Trend.az, 15.08.2026) əsaslanır. Xidmət haqqı və büdcə aralıqları Azərbaycan bazarı üzrə təxminidir (oktyabr 2026). Bu yazı vergi məsləhəti deyil.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>"How much should I spend on Instagram ads?" usually gets one of two answers: "5 dollars a day is enough" or "you can't do anything with a small budget". Both are incomplete. Ad prices are not a fixed rate: Meta sells every impression through an auction, and the same budget can bring 40 leads to one business and 4 to another. The difference comes not from the size of the budget but from <strong>how it is calculated and set up</strong>.</p>
<p>This article explains what Instagram and Facebook ads cost in Azerbaijan in 2027, how to calculate a budget, the 18% VAT applied since September 2026, and the mistakes that waste ad money.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>Meta's minimum budget</td><td>Usually USD 1 per day per ad set when charged per impression. Meta recommends starting with at least USD 5 per day for longer than 6 days</td></tr>
    <tr><td>Realistic start for a small business</td><td>About AZN 150 – 500 a month in ad spend (market estimate)</td></tr>
    <tr><td>VAT</td><td>18% for advertisers billed to Azerbaijan since 1 September 2026. With a valid TIN, Meta does not add VAT to the invoice and the advertiser self-assesses it</td></tr>
    <tr><td>Specialist fee</td><td>Setup and management about AZN 150 – 600 a month, separate from ad spend (market estimate)</td></tr>
    <tr><td>When do results stabilise?</td><td>According to Meta, an ad set exits the learning phase after roughly 50 results within 7 days</td></tr>
  </tbody>
</table>

<h2>Ad Cost Has Three Parts</h2>
<ol>
  <li><strong>Ad spend</strong> — paid directly to Meta (by card or prepaid balance). It determines how many people see the ad.</li>
  <li><strong>Creative</strong> — images, video, copy. A simple phone video often outperforms expensive design, as long as it grabs attention in the first 2–3 seconds.</li>
  <li><strong>Setup and management</strong> — choosing the objective and audience, connecting the Pixel or Conversions API, testing and weekly analysis. You can do it yourself or pay a specialist.</li>
</ol>
<p>When comparing agency offers, ask first: <strong>"Is the ad spend included?"</strong> An "AZN 300 a month" package sometimes includes the budget and sometimes only the fee. More on SMM packages: <a href="/blog-details/smm-services-cost-azerbaijan-2026">SMM services cost</a>.</p>

<h2>How Does Meta Set the Price?</h2>
<p>Ad placements are sold in an auction. According to Meta, the highest bid does not simply win: the bid, the estimated likelihood that a person takes the desired action and ad quality are assessed together. Ads people find relevant get the same result <strong>for less</strong>.</p>
<p>Your reports will show:</p>
<ul>
  <li><strong>CPM</strong> — cost per 1,000 impressions. Depends on audience competition and season (usually higher in November–December).</li>
  <li><strong>CPC</strong> — cost per click.</li>
  <li><strong>Cost per result</strong> — the cost of one lead, message or sale. This is the number that matters for a business.</li>
</ul>

<h2>How to Calculate Your Budget</h2>
<p>Start not from "how much money do I have" but from <strong>"how many leads do I need a month"</strong>:</p>
<p><strong>Monthly budget ≈ leads needed × cost per lead</strong></p>
<p>You can't know the cost per lead in advance — a 1–2 week test shows it. The table below is only a calculation example; real numbers vary by industry, city and creative:</p>
<table>
  <thead>
    <tr><th>Goal</th><th>Cost per lead (example)</th><th>Monthly budget</th></tr>
  </thead>
  <tbody>
    <tr><td>30 WhatsApp messages a month</td><td>AZN 5</td><td>AZN 150</td></tr>
    <tr><td>60 form leads a month</td><td>AZN 6</td><td>AZN 360</td></tr>
    <tr><td>20 course sign-ups a month</td><td>AZN 20</td><td>AZN 400</td></tr>
  </tbody>
</table>
<p>Add 18% VAT on top (if no TIN is provided). For example, an AZN 300 budget actually costs AZN 354.</p>
<p><strong>Account for the learning phase.</strong> According to Meta, if an ad set does not get about 50 results in the 7 days after its last significant edit, it becomes "Learning limited" and results are unstable. With a small budget the fix is fewer ad sets (don't split the budget across five) and a more frequent result (for example, "messages" instead of "purchases").</p>

<h2>Since 2026: 18% VAT on Meta Ads</h2>
<p>From 1 September 2026, Meta charges 18% VAT to advertisers whose "Sold To" address is in Azerbaijan (Trend.az, 15 August 2026, citing Meta):</p>
<ul>
  <li><strong>No TIN provided</strong> (individuals and businesses without a TIN on file) — 18% is added on top of ad spend.</li>
  <li><strong>Valid TIN provided</strong> — Meta does not add VAT to the invoice and the TIN appears on it. The advertiser calculates, declares and pays the VAT to the State Tax Service.</li>
  <li>Providing a TIN is not required to run ads.</li>
</ul>
<p>This is the item most often forgotten in budget planning. Check with your accountant which option suits your business account.</p>

<h2>Boost Button or Ads Manager?</h2>
<table>
  <thead>
    <tr><th></th><th>Boost post</th><th>Ads Manager</th></tr>
  </thead>
  <tbody>
    <tr><td>Speed</td><td>A few minutes</td><td>Setup takes time</td></tr>
    <tr><td>Objectives</td><td>Limited</td><td>Full: leads, messages, sales, website traffic</td></tr>
    <tr><td>A/B testing</td><td>No</td><td>Yes</td></tr>
    <tr><td>Best for</td><td>Event announcements, awareness</td><td>Businesses that need leads and sales</td></tr>
  </tbody>
</table>
<p>If you need leads, Boost usually collects likes and views, not customers. Set the campaign up in Ads Manager with the "Leads" or "Messages" objective.</p>

<h2>7 Mistakes That Waste Ad Money</h2>
<ol>
  <li><strong>Wrong objective:</strong> you need leads, but the ad is optimised for followers or reach.</li>
  <li><strong>Splitting the budget too thin:</strong> five ad sets at AZN 2 a day each, none of which leaves the learning phase.</li>
  <li><strong>Daily changes:</strong> changing the audience, creative or objective restarts learning. Give an ad at least a week.</li>
  <li><strong>Slow replies:</strong> the ad brings WhatsApp messages but the reply comes three hours later. That lead is already with a competitor.</li>
  <li><strong>Weak landing page:</strong> the ad points to a site that loads slowly on mobile with a 10-field form. See: <a href="/blog-details/website-not-generating-leads-ux-audit-2026">why a website doesn't generate leads</a>.</li>
  <li><strong>No Pixel or Conversions API:</strong> Meta doesn't know who converted, so the algorithm can't learn.</li>
  <li><strong>The same creative for months:</strong> the audience gets tired and cost per result rises. Prepare a new variant every 2–4 weeks.</li>
</ol>

<h2>How to Measure Results</h2>
<p>Likes and views are not customers. Check three numbers every month:</p>
<ul>
  <li><strong>Cost per lead</strong> = ad spend (incl. VAT) ÷ number of leads;</li>
  <li><strong>Lead-to-sale rate</strong> — how many of 20 leads bought;</li>
  <li><strong>Cost per customer</strong> = ad spend ÷ number of sales. It must be lower than the profit you make from one customer.</li>
</ul>
<p>To also reach people searching for your service, combine Meta ads with Google Ads: <a href="/blog-details/google-ads-azerbaijan-cost-guide-2027">Google Ads in Azerbaijan 2027</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the minimum budget for Instagram ads?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Meta's minimum is usually USD 1 per day when charged per impression. Meta itself recommends starting with at least USD 5 per day for more than 6 days. A realistic start for a small business is about AZN 150–500 a month.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is VAT charged on Meta ads in Azerbaijan?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Since 1 September 2026, Meta charges 18% VAT to advertisers billed to Azerbaijan. With a valid TIN, Meta does not add VAT to the invoice and the advertiser self-assesses the VAT.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">When do ads start working?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Meta typically reviews ads within 24 hours. The first leads can arrive within days, but results stabilise once the ad set exits the learning phase (about 50 results in 7 days). Treat the first 1–2 weeks as a test.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should I boost a post or use Ads Manager?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Boost is fine for awareness and event announcements. If you need leads and sales, a campaign built in Ads Manager with the "Leads" or "Messages" objective is more effective.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should I run ads myself or hire a specialist?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">With a small budget and some time, you can start yourself. Once spend exceeds a few hundred manats a month, the right objective, Pixel setup and weekly analysis usually pay back the fee.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Who pays the ad budget — me or the agency?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">The most transparent option: you pay ad spend with your own card from your own ad account, and the agency only charges a fee. The account, audiences and data then stay with you.</p>
    </div>
  </div>
</div>

<h3>Read next</h3>
<ul>
  <li><a href="/blog-details/smm-services-cost-azerbaijan-2026">SMM services cost: what's included?</a></li>
  <li><a href="/blog-details/google-ads-azerbaijan-cost-guide-2027">Google Ads in Azerbaijan 2027</a></li>
  <li><a href="/blog-details/instagram-shop-vs-website-2026">Do you need a website if you have an Instagram shop?</a></li>
  <li><a href="/blog-details/what-is-a-landing-page-2026">What is a landing page?</a></li>
  <li><a href="/blog-details/ai-chatbot-for-business-2026">Instant replies: an AI chatbot for business</a></li>
</ul>

<h2>Conclusion</h2>
<p>The cost of Instagram and Facebook ads is made up of ad spend, creative and management, and since 2026 an 18% VAT on top. Calculate the budget from the number of leads you need, treat the first 1–2 weeks as a test, and measure results by cost per customer, not likes.</p>
<p><strong>Want ads set up to bring leads? See our <a href="/facebook-instagram-ads">Facebook and Instagram ads service</a></strong> or <a href="/contact">get in touch</a>.</p>
<p><small><em>The minimum budget, learning phase and review time are based on Meta's official help pages; VAT information is based on Meta's announcement (Trend.az, 15 August 2026). Fee and budget ranges are estimates for the Azerbaijani market (October 2026). This article is not tax advice.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>На вопрос «сколько вкладывать в рекламу в Instagram?» обычно отвечают двумя способами: «5 долларов в день хватит» или «с маленьким бюджетом ничего не получится». Оба ответа неполные. Цена рекламы — не фиксированный тариф: Meta продаёт каждый показ через аукцион, и один и тот же бюджет приносит одному бизнесу 40 заявок, а другому 4. Разницу создаёт не размер бюджета, а <strong>правильный расчёт и настройка</strong>.</p>
<p>В статье разбираем, из чего складывается стоимость рекламы в Instagram и Facebook в Азербайджане в 2027 году, как рассчитать бюджет, что изменил НДС 18% с сентября 2026 года и какие ошибки сливают рекламный бюджет.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Минимальный бюджет Meta</td><td>Обычно 1 USD в день на группу объявлений при оплате за показы. Meta рекомендует начинать минимум с 5 USD в день и дольше 6 дней</td></tr>
    <tr><td>Реальный старт для малого бизнеса</td><td>Примерно 150 – 500 AZN в месяц рекламного бюджета (оценка рынка)</td></tr>
    <tr><td>НДС</td><td>18% для рекламодателей с адресом в Азербайджане с 1 сентября 2026 года. При указании действующего ИНН (VÖEN) Meta не добавляет НДС в счёт, рекламодатель декларирует его сам</td></tr>
    <tr><td>Оплата специалиста</td><td>Настройка и ведение примерно 150 – 600 AZN в месяц, отдельно от бюджета (оценка рынка)</td></tr>
    <tr><td>Когда результаты стабилизируются?</td><td>По данным Meta, группа объявлений выходит из этапа обучения, набрав около 50 результатов за 7 дней</td></tr>
  </tbody>
</table>

<h2>Стоимость рекламы состоит из трёх частей</h2>
<ol>
  <li><strong>Рекламный бюджет</strong> — оплачивается напрямую Meta (картой или пополнением счёта). Определяет, сколько людей увидят рекламу.</li>
  <li><strong>Креатив</strong> — фото, видео, текст. Простое видео, снятое на телефон, часто работает лучше дорогого дизайна, если цепляет внимание в первые 2–3 секунды.</li>
  <li><strong>Настройка и ведение</strong> — выбор цели и аудитории, подключение Pixel или Conversions API, тесты, еженедельный анализ. Можно делать самому или платить специалисту.</li>
</ol>
<p>Сравнивая предложения агентств, первым делом спросите: <strong>«Входит ли рекламный бюджет в цену?»</strong> В пакете «300 AZN в месяц» иногда есть бюджет, а иногда только оплата услуг. Подробнее о пакетах SMM: <a href="/blog-details/stoimost-smm-azerbaydzhan-2026">стоимость SMM</a>.</p>

<h2>Как Meta определяет цену?</h2>
<p>Места для рекламы продаются на аукционе. По объяснению Meta, побеждает не просто самая высокая ставка: вместе оцениваются ставка, вероятность целевого действия пользователя и качество объявления. Реклама, интересная людям, получает тот же результат <strong>дешевле</strong>.</p>
<p>В отчётах вы увидите:</p>
<ul>
  <li><strong>CPM</strong> — цена 1000 показов. Зависит от конкуренции за аудиторию и сезона (обычно дороже в ноябре–декабре).</li>
  <li><strong>CPC</strong> — цена клика.</li>
  <li><strong>Цена за результат</strong> — стоимость одной заявки, сообщения или продажи. Главный показатель для бизнеса.</li>
</ul>

<h2>Как рассчитать бюджет?</h2>
<p>Начинайте не с вопроса «сколько у меня денег», а с вопроса <strong>«сколько заявок нужно в месяц»</strong>:</p>
<p><strong>Месячный бюджет ≈ нужное число заявок × цена одной заявки</strong></p>
<p>Цену заявки заранее точно не знает никто — её показывает тест на 1–2 недели. Таблица ниже — лишь пример расчёта, реальные цифры зависят от ниши, города и креатива:</p>
<table>
  <thead>
    <tr><th>Цель</th><th>Цена заявки (пример)</th><th>Бюджет в месяц</th></tr>
  </thead>
  <tbody>
    <tr><td>30 сообщений в WhatsApp в месяц</td><td>5 AZN</td><td>150 AZN</td></tr>
    <tr><td>60 заявок через форму</td><td>6 AZN</td><td>360 AZN</td></tr>
    <tr><td>20 записей на курс</td><td>20 AZN</td><td>400 AZN</td></tr>
  </tbody>
</table>
<p>К этим суммам добавляется НДС 18% (если ИНН не указан). Например, бюджет 300 AZN фактически стоит 354 AZN.</p>
<p><strong>Учитывайте этап обучения.</strong> По данным Meta, если группа объявлений за 7 дней после последнего существенного изменения не набирает около 50 результатов, она получает статус «Обучение ограничено», и результаты нестабильны. При небольшом бюджете решение — меньше групп объявлений (не делить бюджет на пять) и более частый результат (например, «сообщения» вместо «покупок»).</p>

<h2>С 2026 года: НДС 18% на рекламу Meta</h2>
<p>С 1 сентября 2026 года Meta взимает НДС 18% с рекламодателей, у которых в платёжном адресе («Sold To») указан Азербайджан (Trend.az, 15.08.2026, со ссылкой на заявление Meta):</p>
<ul>
  <li><strong>ИНН не указан</strong> (физлица и компании без ИНН в аккаунте) — 18% добавляется к сумме рекламы.</li>
  <li><strong>Указан действующий ИНН</strong> — Meta не добавляет НДС в счёт, ИНН отображается в счёте. Рекламодатель сам рассчитывает, декларирует и уплачивает НДС в Государственную налоговую службу.</li>
  <li>Указывать ИНН для запуска рекламы не обязательно.</li>
</ul>
<p>Это пункт, о котором чаще всего забывают при планировании бюджета. Уточните у бухгалтера, какой вариант подходит вашему бизнес-аккаунту.</p>

<h2>Кнопка «Продвигать» или Ads Manager?</h2>
<table>
  <thead>
    <tr><th></th><th>Продвижение публикации</th><th>Ads Manager</th></tr>
  </thead>
  <tbody>
    <tr><td>Скорость</td><td>Несколько минут</td><td>Настройка занимает время</td></tr>
    <tr><td>Цели</td><td>Ограничены</td><td>Полный выбор: заявки, сообщения, продажи, трафик</td></tr>
    <tr><td>A/B-тесты</td><td>Нет</td><td>Есть</td></tr>
    <tr><td>Для чего</td><td>Анонсы, узнаваемость</td><td>Бизнесу, которому нужны заявки и продажи</td></tr>
  </tbody>
</table>
<p>Если нужны заявки, продвижение публикации обычно собирает лайки и просмотры, а не клиентов. Настраивайте кампанию в Ads Manager с целью «Лиды» или «Сообщения».</p>

<h2>7 ошибок, которые сливают бюджет</h2>
<ol>
  <li><strong>Неверная цель:</strong> нужны заявки, а реклама настроена на подписчиков или охват.</li>
  <li><strong>Дробление бюджета:</strong> пять групп объявлений по 2 AZN в день, и ни одна не выходит из обучения.</li>
  <li><strong>Ежедневные изменения:</strong> смена аудитории, креатива или цели перезапускает обучение. Дайте рекламе хотя бы неделю.</li>
  <li><strong>Медленные ответы:</strong> реклама приводит сообщения в WhatsApp, а ответ приходит через 3 часа. Этот клиент уже у конкурента.</li>
  <li><strong>Слабая посадочная страница:</strong> реклама ведёт на сайт, который медленно открывается на телефоне и предлагает форму из 10 полей. См.: <a href="/blog-details/pochemu-sajt-ne-prinosit-zayavki-ux-audit-2026">почему сайт не приносит заявки</a>.</li>
  <li><strong>Нет Pixel или Conversions API:</strong> Meta не знает, кто оставил заявку, и алгоритм не может обучаться.</li>
  <li><strong>Один креатив месяцами:</strong> аудитория устаёт, цена за результат растёт. Готовьте новый вариант раз в 2–4 недели.</li>
</ol>

<h2>Как измерять результат?</h2>
<p>Лайки и просмотры — это не клиенты. Каждый месяц смотрите на три цифры:</p>
<ul>
  <li><strong>Цена заявки</strong> = расходы на рекламу (с НДС) ÷ число заявок;</li>
  <li><strong>Конверсия заявки в продажу</strong> — сколько из 20 заявок купили;</li>
  <li><strong>Цена клиента</strong> = расходы на рекламу ÷ число продаж. Она должна быть меньше прибыли с одного клиента.</li>
</ul>
<p>Чтобы охватить и тех, кто ищет вашу услугу в поиске, сочетайте рекламу Meta с Google: <a href="/blog-details/google-ads-azerbaydzhan-2027">Google Ads в Азербайджане 2027</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какой минимальный бюджет нужен для рекламы в Instagram?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Минимум Meta при оплате за показы обычно 1 USD в день. Сама Meta рекомендует начинать минимум с 5 USD в день и дольше 6 дней. Реальный старт для малого бизнеса — примерно 150–500 AZN в месяц.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Облагается ли реклама Meta НДС в Азербайджане?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. С 1 сентября 2026 года Meta взимает НДС 18% с рекламодателей с адресом в Азербайджане. При указании действующего ИНН Meta не добавляет НДС в счёт, и рекламодатель декларирует его сам.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда реклама начинает работать?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Meta обычно проверяет объявления в течение 24 часов. Первые заявки могут прийти за несколько дней, но результаты стабилизируются после выхода из этапа обучения (около 50 результатов за 7 дней). Первые 1–2 недели считайте тестом.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Продвигать публикацию или запускать рекламу в Ads Manager?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Для узнаваемости и анонсов достаточно продвижения публикации. Если нужны заявки и продажи, эффективнее кампания в Ads Manager с целью «Лиды» или «Сообщения».</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Настраивать рекламу самому или нанять специалиста?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">При небольшом бюджете и наличии времени можно начать самому. Когда бюджет превышает несколько сотен манатов в месяц, правильная цель, настройка Pixel и еженедельный анализ обычно окупают оплату специалиста.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Кто оплачивает рекламный бюджет — я или агентство?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Самый прозрачный вариант: вы оплачиваете бюджет своей картой из своего рекламного аккаунта, а агентство берёт только оплату за услуги. Тогда аккаунт, аудитории и статистика остаются у вас.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/stoimost-smm-azerbaydzhan-2026">Стоимость SMM: что входит в пакет?</a></li>
  <li><a href="/blog-details/google-ads-azerbaydzhan-2027">Google Ads в Азербайджане 2027</a></li>
  <li><a href="/blog-details/instagram-magazin-ili-sajt-2026">Нужен ли сайт, если есть магазин в Instagram?</a></li>
  <li><a href="/blog-details/chto-takoe-lending-2026">Что такое лендинг?</a></li>
  <li><a href="/blog-details/ii-chat-bot-dlya-biznesa-2026">Мгновенные ответы: ИИ чат-бот для бизнеса</a></li>
</ul>

<h2>Итог</h2>
<p>Стоимость рекламы в Instagram и Facebook складывается из бюджета, креатива и ведения, а с 2026 года к ней добавился НДС 18%. Рассчитывайте бюджет от нужного числа заявок, считайте первые 1–2 недели тестом и оценивайте результат по цене клиента, а не по лайкам.</p>
<p><strong>Настроим рекламу так, чтобы она приносила заявки? <a href="/reklama-facebook-instagram">Услуга рекламы в Facebook и Instagram</a></strong> или <a href="/kontakty">напишите нам</a>.</p>
<p><small><em>Минимальный бюджет, этап обучения и срок проверки основаны на официальных справочных страницах Meta; информация о НДС — на заявлении Meta (Trend.az, 15.08.2026). Диапазоны оплаты услуг и бюджета — ориентировочные для рынка Азербайджана (октябрь 2026). Статья не является налоговой консультацией.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'instagram-facebook-reklami-qiymeti-2027'],
            [
                'slug_en' => 'instagram-facebook-ads-cost-azerbaijan-2027',
                'slug_ru' => 'stoimost-reklamy-instagram-facebook-azerbaydzhan-2027',

                'title_az' => 'Instagram və Facebook Reklamı Qiyməti 2027: Büdcə Necə Hesablanır və 18% ƏDV',
                'title_en' => 'Instagram and Facebook Ads Cost in Azerbaijan 2027: How to Calculate Your Budget, Plus 18% VAT',
                'title_ru' => 'Стоимость рекламы в Instagram и Facebook в Азербайджане 2027: расчёт бюджета и НДС 18%',

                'review_az' => 'Instagram reklamına ayda nə qədər pul lazımdır? Meta-nın minimum büdcəsi, büdcə hesablama düsturu, 2026-dan tətbiq olunan 18% ƏDV, Boost vs Ads Manager və pulu boşa xərcləyən 7 səhv.',
                'review_en' => 'How much do Instagram ads cost per month? Meta\'s minimum budget, a budget formula, the 18% VAT applied since 2026, Boost vs Ads Manager and 7 mistakes that waste ad money.',
                'review_ru' => 'Сколько стоит реклама в Instagram в месяц? Минимальный бюджет Meta, формула расчёта, НДС 18% с 2026 года, продвижение vs Ads Manager и 7 ошибок, которые сливают бюджет.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '30 Oktyabr 2026',
                'date_en' => 'October 30, 2026',
                'date_ru' => '30 Октября 2026',

                'photo'    => 'cover-meta-ads-az.png',
                'photo_en' => 'cover-meta-ads-en.png',
                'photo_ru' => 'cover-meta-ads-ru.png',

                'meta_title_az' => 'Instagram Reklamı Qiyməti 2027: Büdcə və ƏDV | RS Code',
                'meta_title_en' => 'Instagram & Facebook Ads Cost Azerbaijan 2027 | RS Code',
                'meta_title_ru' => 'Реклама в Instagram: цена 2027, бюджет и НДС | RS Code',

                'meta_description_az' => 'Instagram və Facebook reklamına ayda nə qədər lazımdır? Minimum büdcə, hesablama düsturu, 18% ƏDV və VÖEN, pulu boşa xərcləyən 7 səhv.',
                'meta_description_en' => 'How much do Instagram and Facebook ads cost in Azerbaijan? Minimum budget, budget formula, 18% VAT and TIN rules, and 7 mistakes that waste money.',
                'meta_description_ru' => 'Сколько стоит реклама в Instagram и Facebook в Азербайджане? Минимальный бюджет, формула расчёта, НДС 18% и ИНН, 7 ошибок, сливающих бюджет.',

                'meta_keywords_az' => 'instagram reklamı qiyməti, facebook reklamı qiyməti, target reklam, meta reklam ədv, instagram reklam büdcəsi, reklam 2027',
                'meta_keywords_en' => 'instagram ads cost azerbaijan, facebook ads cost, meta ads vat azerbaijan, instagram ad budget, targeted ads baku, ads 2027',
                'meta_keywords_ru' => 'реклама в instagram цена, таргетированная реклама баку, реклама facebook стоимость, ндс meta азербайджан, бюджет рекламы 2027',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
