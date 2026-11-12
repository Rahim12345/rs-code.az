<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * #88 — Topdan satış proqramı (2027). RS POS sahə silsiləsinin 4-cüsü; rspos.az/topdan-satis-proqrami.
 * Faktlar YALNIZ rspos.az (2026-11-12) + ümumi RS POS faktları: müştəri kartında xüsusi qiymət siyahısı avtomatik; agent Android tətbiqi (satış, borc yığımı,
 * gün sonu təhvil); giriş/çıxış qaimələri, tədarükçü ödənişləri/borc qalığı; müştəri və tədarükçü borcları, qismən ödəniş; çox anbar, transfer, FIFO;
 * müştəri/məhsul/agent üzrə hesabat; pərakəndə+topdan bir sistemdə; RSPOS Sayım/Alış tətbiqləri (təsvirsiz); 100/150/200 ₼, 14 gün sınaq.
 * Kredit limiti, çatdırılma, marşrut planlaşdırma, e-qaimə inteqrasiyası, müştəri qaytarması İDDİA EDİLMİR (kredit limiti olmadığı açıq deyilir).
 */
class Blog88WholesalePosSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Topdan satışda iş kassada yox, yolda və dəftərdə gedir. Eyni məhsulu bir mağazaya bir qiymətə, digərinə başqa qiymətə verirsiniz; agent səhər maşına mal yığır, axşam isə əlində qeydlərlə, nağd pul və borc siyahısı ilə qayıdır. Hansı mağaza nə qədər borcludur, tədarükçüyə nə qədər ödəniləcək, hansı agent nə satıb — bunu bilmək üçün hər axşam saatlarla hesablama aparılır və yenə də rəqəmlər üst-üstə düşmür.</p>
<p>Bu yazı 2027-ci ildə topdan satış, distribyusiya və ya topdan-pərakəndə ticarətlə məşğul olan sahibkarlar üçündür. Müştəriyə görə qiymət siyahısını, səyyar satış agentlərinin işini, mağaza borclarını, giriş və çıxış qaimələrini, tədarükçü borclarını, anbarı və hesabatları addım-addım nəzərdən keçiririk. Nümunə kimi RS Code-un hazırladığı <a href="/mehsullar/rspos">RS POS</a> bulud proqramının imkanlarından istifadə edirik.</p>

<h2>Qısa Cavab</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Cavab</th></tr>
  </thead>
  <tbody>
    <tr><td>Topdan satış proqramını nə fərqləndirir?</td><td>Müştəriyə görə qiymət, agent satışı və mağaza borclarının uçotu</td></tr>
    <tr><td>Hər müştəriyə ayrı qiymət olarmı?</td><td>Bəli, müştəri kartında xüsusi qiymət siyahısı təyin olunur və satışda avtomatik tətbiq edilir</td></tr>
    <tr><td>Agentlər yolda necə satır?</td><td>Android tətbiqində satışı, borc yığımını və gün sonu təhvili qeyd edirlər</td></tr>
    <tr><td>Mağaza borcları necə izlənir?</td><td>Hər müştərinin borcu, ödənişləri və tarixçəsi bir yerdə</td></tr>
    <tr><td>Tədarükçü borcu görünürmü?</td><td>Bəli, giriş qaimələri və ödənişlər üzrə qalıq həmişə görünür</td></tr>
    <tr><td>Pərakəndə və topdanı birlikdə aparmaq olarmı?</td><td>Bəli, eyni sistemdə</td></tr>
  </tbody>
</table>

<h2>1. Topdan Satış Niyə Ayrı Yanaşma Tələb Edir</h2>
<p>Pərakəndə mağazada müştəri gəlir, rəfdəki qiymətlə alır və nağd və ya kartla ödəyir. Topdan satışda isə demək olar ki, hər şey fərqlidir:</p>
<table>
  <thead>
    <tr><th></th><th>Pərakəndə</th><th>Topdan</th></tr>
  </thead>
  <tbody>
    <tr><td>Qiymət</td><td>Hamı üçün eyni</td><td>Müştəriyə, həcmə və razılaşmaya görə fərqli</td></tr>
    <tr><td>Ödəniş</td><td>Dərhal</td><td>Çox vaxt nisyə, hissə-hissə</td></tr>
    <tr><td>Satış yeri</td><td>Kassa</td><td>Anbar, ofis və yolda agent</td></tr>
    <tr><td>Sənəd</td><td>Çek</td><td>Qaimə</td></tr>
    <tr><td>Əsas risk</td><td>Kassa fərqi</td><td>Yığılmayan borc və səhv qiymət</td></tr>
  </tbody>
</table>
<p>Ona görə topdan satış proqramı bu suallara cavab verməlidir: hansı müştəriyə hansı qiymətlə satılıb, kim nə qədər borcludur, agent gün ərzində nə satıb və nə qədər pul yığıb, tədarükçüyə nə qədər borcumuz var və hansı mal, hansı müştəri və hansı agent qazanc gətirir.</p>

<h2>2. Müştəriyə Görə Qiymət Siyahısı</h2>
<p>Topdan satışda bir məhsulun bir neçə qiyməti olması normaldır: böyük şəbəkəyə bir qiymət, kiçik mağazaya başqa, daimi müştəriyə xüsusi endirim. Problem qiymətin kassirin və ya agentin yaddaşına qalanda yaranır — səhv qiymətlə satış həm itki, həm də müştəri ilə mübahisə deməkdir.</p>
<p>RS POS-da müştəri kartında xüsusi qiymət siyahısı təyin olunur. Həmin müştəriyə satış edəndə proqram onun qiymətini avtomatik tətbiq edir — kassir və ya agent qiyməti əllə dəyişmir.</p>
<p><strong>Praktik qayda:</strong> qiymət siyahılarını sadə saxlayın. Hər müştəri üçün ayrıca siyahı əvəzinə müştəriləri bir neçə qrupa bölün (məsələn, "şəbəkə", "böyük mağaza", "kiçik mağaza") və hər qrupa bir siyahı verin. Fərdi şərtləri yalnız həqiqətən böyük müştərilər üçün saxlayın. Qiymət dəyişəndə siyahını bir yerdə yeniləyirsiniz və bütün satışlar dərhal yeni qiymətlə gedir.</p>

<h2>3. Səyyar Satış Agentləri</h2>
<p>Distribyusiyada satışın böyük hissəsini agentlər edir: mağazaları gəzir, sifariş götürür, mal verir, köhnə borcu yığır. Kağız qeydlərlə işləyəndə axşam iki problem çıxır: agentin dəftərindəki rəqəm sistemdəki rəqəmlə uyğun gəlmir və mağazanın borcunun nə qədər olduğu yalnız ertəsi gün bəlli olur.</p>
<p>RS POS-da agentlər üçün Android tətbiqi var. Agent onunla:</p>
<ul>
  <li><strong>Mağazaya satışı qeyd edir</strong> — müştərinin qiymət siyahısı ilə.</li>
  <li><strong>Borc ödənişini qəbul edir</strong> — mağazanın borcu dərhal azalır.</li>
  <li><strong>Gün sonu nağd pulu təhvil verir</strong> — gün ərzində yığılan pul sistemdə görünür.</li>
</ul>
<p>Hər şey mərkəzi sistemdə görünür və hesabatlarda satışlar agent üzrə ayrılır. Beləliklə hansı agentin nə satdığını, nə qədər borc yığdığını və nə təhvil verdiyini görürsünüz.</p>
<p><strong>Gün sonu təhvil qaydası:</strong> hər axşam agentin sistemdəki nağd yığımı ilə təhvil verdiyi pul müqayisə olunmalıdır. Fərq varsa, həmin gün aydınlaşdırın — bir həftə sonra kimin nə vaxt nə aldığını xatırlamaq çox çətindir.</p>

<h2>4. Mağaza Borcları: Nisyə Satışa Nəzarət</h2>
<p>Topdan satışda nisyə qaçılmazdır: mağaza malı alır, satdıqca ödəyir. Amma nəzarətsiz nisyə dövriyyəni dondurur. RS POS-da hər müştərinin borcu, ödənişləri və tarixçəsi bir yerdədir, qismən ödənişlər qəbul olunur.</p>
<ul>
  <li><strong>Hər müştəriyə borc şərti müəyyən edin.</strong> Neçə günə ödəməlidir, maksimum nə qədər borc ola bilər — bu qaydaları yazılı razılaşdırın və agentlərə də bildirin.</li>
  <li><strong>Borc siyahısına həftəlik baxın.</strong> Kimin borcu artır, kim ödənişi gecikdirir — bunu vaxtında görmək yeni mal verməzdən əvvəl qərar verməyə imkan yaradır.</li>
  <li><strong>Üzləşmə aktı edin.</strong> Böyük müştərilərlə vaxtaşırı borc qalığını tutuşdurun ki, sonradan mübahisə yaranmasın.</li>
</ul>
<p>Qeyd: RS POS borcları və ödənişləri izləyir, amma avtomatik kredit limiti funksiyası təqdim olunmur — limit qaydasını şirkət daxilində özünüz tətbiq edirsiniz. Ətraflı: <a href="/blog-details/nisye-satis-borc-defteri-2026">nisyə satış və borc dəftəri</a>.</p>

<h2>5. Qaimələr və Tədarükçü Borcları</h2>
<p>Topdançı həm satıcı, həm də alıcıdır: istehsalçıdan və ya idxalçıdan mal alır, mağazalara satır. RS POS-da giriş və çıxış qaimələri aparılır, tədarükçü ödənişləri qeyd olunur. Giriş qaimələri və ödənişlər əsasında hər tədarükçüyə qalan borc həmişə görünür.</p>
<ul>
  <li><strong>Giriş qaiməsi</strong> — tədarükçüdən gələn mal, miqdar və alış qiyməti. Qalıq və maya dəyəri buradan formalaşır.</li>
  <li><strong>Çıxış qaiməsi</strong> — müştəriyə verilən mal. Müştərinin borcu və satış hesabatı buradan formalaşır.</li>
  <li><strong>Tədarükçü ödənişləri</strong> — hissə-hissə ödənişlər və qalan borc.</li>
</ul>
<p>Vergi baxımından topdan satışda elektron qaimə-faktura və ƏDV tələbləri vacibdir. Bu tələblərin sizin şirkətinizə necə tətbiq olunduğunu mühasibinizlə dəqiqləşdirin — RS POS-un daxili qaimələri vergi orqanına təqdim olunan elektron sənədləri əvəz etmir.</p>

<h2>6. Anbar, Transfer və FIFO Maya Dəyəri</h2>
<p>Topdançının adətən bir neçə anbarı olur: əsas anbar, filial və ya agentin maşını kimi aparılan ayrıca yer. RS POS bir neçə anbarı, anbarlar arası transferi və FIFO üzrə maya dəyərini dəstəkləyir.</p>
<ul>
  <li><strong>Transfer</strong> — mal bir anbardan digərinə köçəndə qalıq hər iki yerdə düzgün qalır.</li>
  <li><strong>Sayım</strong> — müntəzəm inventar yoxlaması fərqləri vaxtında üzə çıxarır. RS POS-un "RSPOS Sayım" adlı mobil tətbiqi də təqdim olunur.</li>
  <li><strong>FIFO</strong> — əvvəl alınan partiya əvvəl satılmış sayılır. Topdan satışda alış qiymətləri tez-tez dəyişdiyi üçün mənfəəti düzgün hesablamaq üçün bu vacibdir. Ətraflı: <a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO maya dəyəri nədir</a>.</li>
</ul>

<h2>7. Hesabatlar: Müştəri, Məhsul və Agent Üzrə</h2>
<p>Topdan satışda dövriyyə böyük, marja isə dar olur. Ona görə "nə qədər satdıq" kifayət deyil — "kimə, nəyi, kim vasitəsilə və nə qazancla" sualına cavab lazımdır. RS POS satış hesabatlarını müştəri, məhsul və satış agenti üzrə göstərir.</p>
<table>
  <thead>
    <tr><th>Hesabat</th><th>Hansı sualı cavablayır</th></tr>
  </thead>
  <tbody>
    <tr><td>Müştəri üzrə</td><td>Ən böyük müştərilər kimlərdir, kimin alışı azalır?</td></tr>
    <tr><td>Məhsul üzrə</td><td>Hansı mallar çox satılır, hansılar anbarda qalır?</td></tr>
    <tr><td>Agent üzrə</td><td>Hansı agent nə satıb, nə qədər borc yığıb?</td></tr>
    <tr><td>Borc qalığı</td><td>Müştərilər bizə, biz tədarükçülərə nə qədər borcluyuq?</td></tr>
  </tbody>
</table>

<h2>8. Topdan və Pərakəndə Bir Sistemdə</h2>
<p>Bir çox topdançının yanında pərakəndə mağazası da olur. RS POS-da pərakəndə satışı və müştəriyə görə qiymətlə topdan satışı eyni sistemdə aparmaq olar: qalıq, anbar və hesabatlar ortaqdır. Pərakəndə müştəri rəfdəki qiymətlə alır, topdan müştəri isə öz qiymət siyahısı ilə.</p>
<p>Dilerləriniz sifarişi özləri onlayn vermək istəyirlərsə, ayrıca B2B sifariş portalı lazım ola bilər: <a href="/blog-details/b2b-sifaris-portali-diler-distributor-2026">B2B sifariş portalı</a>. RS POS bulud sistemidir və işləmək üçün internet tələb edir.</p>

<h2>9. Qiymət və Proqram Seçərkən Soruşulmalı Suallar</h2>
<p>RS POS-un qiymətləri rspos.az-da açıq göstərilib (noyabr 2026):</p>
<table>
  <thead>
    <tr><th>Plan</th><th>Qiymət</th><th>Kassir</th><th>Kassa</th><th>Anbar</th></tr>
  </thead>
  <tbody>
    <tr><td>Basic</td><td>100 ₼/ay</td><td>2</td><td>1</td><td>1</td></tr>
    <tr><td>Pro</td><td>150 ₼/ay</td><td>10</td><td>3</td><td>3</td></tr>
    <tr><td>Enterprise</td><td>200 ₼/ay</td><td>Limitsiz</td><td>5</td><td>Limitsiz</td></tr>
  </tbody>
</table>
<p>Bütün planlarda limitsiz məhsul var. 14 gün pulsuz sınaq var, kart məlumatı tələb olunmur. Bir neçə anbarınız varsa, planı anbar sayına görə seçin. Qiymətlərin ümumi müqayisəsi: <a href="/blog-details/pos-sistemi-qiymeti-azerbaycanda-2026">POS sistemi qiyməti Azərbaycanda</a>.</p>
<h3>Hər hansı topdan satış proqramını seçməzdən əvvəl yoxlayın</h3>
<ul>
  <li>Müştəriyə görə qiymət siyahısı varmı və satışda avtomatik tətbiq olunurmu?</li>
  <li>Agentlər üçün mobil tətbiq varmı: satış, borc yığımı, gün sonu təhvil?</li>
  <li>Müştəri və tədarükçü borcları, qismən ödənişlər izlənirmi?</li>
  <li>Giriş və çıxış qaimələri aparılırmı?</li>
  <li>Bir neçə anbar, transfer və FIFO maya dəyəri varmı?</li>
  <li>Hesabatlar müştəri, məhsul və agent üzrə ayrılırmı?</li>
  <li>Pərakəndə və topdan satış eyni sistemdə işləyirmi?</li>
  <li>Pulsuz sınaq varmı və real müştəriləriniz və qiymətlərinizlə sınamaq olarmı?</li>
</ul>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Topdan satış üçün hansı proqram lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Müştəriyə görə qiymət siyahısını avtomatik tətbiq edən, agent satışlarını və borc yığımını qeyd edən, müştəri və tədarükçü borclarını izləyən, qaimələri, anbarı və hesabatları bir yerdə aparan proqram. RS POS bu imkanları bir bulud sistemində birləşdirir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Hər müştəriyə ayrı qiymət vermək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. RS POS-da müştəri kartında xüsusi qiymət siyahısı təyin olunur və həmin müştərinin satışlarında avtomatik tətbiq edilir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Satış agentləri yolda necə işləyir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Agentlər Android tətbiqində mağaza satışlarını və borc ödənişlərini qeyd edir, gün sonunda nağd pulu təhvil verir. Hamısı mərkəzi sistemdə görünür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tədarükçü borclarını izləmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Giriş qaimələri və ödənişlər əsasında hər tədarükçüyə qalan borc həmişə görünür, hissə-hissə ödənişlər qeyd olunur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Pərakəndə və topdan satışı birlikdə aparmaq olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. RS POS-da pərakəndə satış və müştəriyə görə qiymətlə topdan satış eyni sistemdə, ortaq qalıq və hesabatlarla aparılır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Topdan satış proqramı neçəyə başa gəlir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS üç planda təklif olunur: Basic 100 ₼/ay, Pro 150 ₼/ay və Enterprise 200 ₼/ay. Bütün planlarda limitsiz məhsul və 14 gün pulsuz sınaq var, kart məlumatı tələb olunmur.</p>
    </div>
  </div>
</div>

<h3>Bunları da oxuyun</h3>
<ul>
  <li><a href="/blog-details/telefon-magazasi-ucun-proqram-2027">Telefon mağazası üçün proqram</a></li>
  <li><a href="/blog-details/market-ucun-kassa-proqrami-2027">Market üçün kassa proqramı</a></li>
  <li><a href="/blog-details/nisye-satis-borc-defteri-2026">Nisyə satış və borc dəftəri</a></li>
  <li><a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO maya dəyəri nədir?</a></li>
  <li><a href="/blog-details/b2b-sifaris-portali-diler-distributor-2026">B2B sifariş portalı: dilerlər və distribyutorlar üçün</a></li>
</ul>

<h2>Nəticə</h2>
<p>Topdan satışda nizam qiymət və borcdan başlayır. Müştəriyə görə qiymət siyahısı səhv qiymətlə satışın qarşısını alır, agent tətbiqi yoldakı satışı və borc yığımını dərhal sistemə gətirir, borc və qaimə uçotu isə kimin kimə nə qədər borclu olduğunu həmişə aydın saxlayır. Bir neçə anbar, FIFO maya dəyəri və müştəri, məhsul və agent üzrə hesabatlar dar marjalı işdə qazancı görməyə imkan verir.</p>
<p><strong>Topdan satışınızı bir sistemdən idarə etmək istəyirsiniz? <a href="/mehsullar/rspos">RS POS</a> ilə tanış olun</strong> — 14 gün pulsuz sınaq, kart tələb olunmur: <a href="https://rspos.az/topdan-satis-proqrami" rel="noopener" target="_blank">rspos.az</a>. Dilerlər üçün sifariş portalı və ya fərdi sistem lazımdırsa: <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
<p><small><em>Bu yazı ümumi məlumat xarakteri daşıyır. Elektron qaimə-faktura, ƏDV və digər vergi tələbləri üçün mühasibə və ya vergi məsləhətçisinə müraciət edin. RS POS imkanları və qiymətləri noyabr 2026 vəziyyətinə görə rspos.az əsasında təsvir olunub.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>In wholesale, the work happens on the road and in the notebook, not at the till. You sell the same product to one shop at one price and to another at a different price; a sales agent loads the van in the morning and comes back in the evening with notes, cash and a list of debts. Which shop owes how much, how much is due to the supplier, what each sales agent has sold — working this out takes hours of calculations every evening, and the figures still do not add up.</p>
<p>This article is for business owners who run a wholesale, distribution or combined wholesale and retail business in 2027. We go step by step through customer-specific price lists, the work of field sales agents, shop debts, incoming and outgoing invoices, supplier debts, the warehouse and reports. As an example, we use the features of <a href="/mehsullar/rspos">RS POS</a>, the cloud software developed by RS Code.</p>

<h2>Quick Answer</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Answer</th></tr>
  </thead>
  <tbody>
    <tr><td>What makes wholesale software different?</td><td>Customer-specific pricing, sales agent sales and tracking of shop debts</td></tr>
    <tr><td>Can each customer have a separate price?</td><td>Yes, a special price list is assigned on the customer card and applied automatically at the sale</td></tr>
    <tr><td>How do sales agents sell on the road?</td><td>They record sales, debt collection and the end-of-day cash handover in an Android app</td></tr>
    <tr><td>How are shop debts tracked?</td><td>Each customer's debt, payments and history in one place</td></tr>
    <tr><td>Is the supplier debt visible?</td><td>Yes, the balance based on incoming invoices and payments is always visible</td></tr>
    <tr><td>Can retail and wholesale be run together?</td><td>Yes, in the same system</td></tr>
  </tbody>
</table>

<h2>1. Why Wholesale Needs a Different Approach</h2>
<p>In a retail shop, the customer comes in, buys at the shelf price and pays in cash or by card. In wholesale, almost everything is different:</p>
<table>
  <thead>
    <tr><th></th><th>Retail</th><th>Wholesale</th></tr>
  </thead>
  <tbody>
    <tr><td>Price</td><td>The same for everyone</td><td>Varies by customer, volume and agreement</td></tr>
    <tr><td>Payment</td><td>Immediate</td><td>Often on credit, in instalments</td></tr>
    <tr><td>Point of sale</td><td>The till</td><td>Warehouse, office and sales agent on the road</td></tr>
    <tr><td>Document</td><td>Receipt</td><td>Invoice</td></tr>
    <tr><td>Main risk</td><td>Cash discrepancy</td><td>Uncollected debt and wrong prices</td></tr>
  </tbody>
</table>
<p>That is why wholesale software must answer these questions: which customer was sold what at which price, who owes how much, what a sales agent sold during the day and how much money they collected, how much we owe the supplier, and which products, customers and sales agents bring in profit.</p>

<h2>2. Customer-Specific Price Lists</h2>
<p>In wholesale, it is normal for one product to have several prices: one price for a large chain, another for a small shop, a special discount for a regular customer. The problem arises when the price is left to the cashier's or sales agent's memory — selling at the wrong price means both a loss and a dispute with the customer.</p>
<p>In RS POS, a special price list is assigned on the customer card. When you sell to that customer, the software applies their price automatically — the cashier or sales agent does not change the price by hand.</p>
<p><strong>Practical rule:</strong> keep price lists simple. Instead of a separate list for every customer, divide customers into a few groups (for example, "chain", "large shop", "small shop") and give each group one list. Keep individual terms only for genuinely large customers. When prices change, you update the list in one place and all sales immediately go through at the new price.</p>

<h2>3. Field Sales Agents</h2>
<p>In distribution, sales agents make most of the sales: they visit shops, take orders, deliver goods and collect old debts. When working with paper notes, two problems come up in the evening: the figure in the sales agent's notebook does not match the figure in the system, and how much a shop owes only becomes clear the next day.</p>
<p>RS POS has an Android app for sales agents. With it, a sales agent:</p>
<ul>
  <li><strong>Records the sale to the shop</strong> — using the customer's price list.</li>
  <li><strong>Accepts debt payments</strong> — the shop's debt goes down immediately.</li>
  <li><strong>Hands over the cash at the end of the day</strong> — the money collected during the day is visible in the system.</li>
</ul>
<p>Everything is visible in the central system, and reports break sales down by sales agent. So you can see what each sales agent has sold, how much debt they have collected and what they have handed over.</p>
<p><strong>End-of-day handover rule:</strong> every evening, the sales agent's cash collections in the system should be compared with the money they hand over. If there is a difference, sort it out the same day — a week later it is very hard to remember who took what and when.</p>

<h2>4. Shop Debts: Controlling Credit Sales</h2>
<p>In wholesale, selling on credit (nisyə) is unavoidable: the shop takes the goods and pays as it sells them. But uncontrolled credit freezes cash flow. In RS POS, each customer's debt, payments and history are in one place, and part payments are accepted.</p>
<ul>
  <li><strong>Set debt terms for each customer.</strong> How many days they have to pay and the maximum debt allowed — agree these rules in writing and tell your sales agents too.</li>
  <li><strong>Review the debt list weekly.</strong> Whose debt is growing, who is paying late — seeing this in time lets you decide before supplying new goods.</li>
  <li><strong>Do reconciliation statements.</strong> Compare debt balances with large customers regularly so that disputes do not arise later.</li>
</ul>
<p>Note: RS POS tracks debts and payments, but an automatic credit limit feature is not offered — you apply the limit rule yourself within the company. More details: <a href="/blog-details/customer-debt-book-credit-sales-2026">credit sales and the debt book</a>.</p>

<h2>5. Invoices and Supplier Debts</h2>
<p>A wholesaler is both a seller and a buyer: they buy goods from a manufacturer or importer and sell them to shops. In RS POS, incoming and outgoing invoices are kept, and supplier payments are recorded. Based on incoming invoices and payments, the remaining debt to each supplier is always visible.</p>
<ul>
  <li><strong>Incoming (purchase) invoice</strong> — goods received from the supplier, quantity and purchase price. Stock levels and cost are formed from this.</li>
  <li><strong>Outgoing (sales) invoice</strong> — goods supplied to the customer. The customer's debt and the sales report are formed from this.</li>
  <li><strong>Supplier payments</strong> — part payments and the remaining debt.</li>
</ul>
<p>From a tax perspective, electronic invoice (e-qaimə) and VAT requirements are important in wholesale. Check with your accountant how these requirements apply to your company — RS POS's internal invoices do not replace the electronic documents submitted to the tax authority.</p>

<h2>6. Warehouse, Transfers and FIFO Cost</h2>
<p>A wholesaler usually has several warehouses: the main warehouse, a branch, or a separate location such as a sales agent's van. RS POS supports multiple warehouses, transfers between warehouses and FIFO cost.</p>
<ul>
  <li><strong>Transfers</strong> — when goods move from one warehouse to another, the stock levels stay correct in both places.</li>
  <li><strong>Stock counts</strong> — regular inventory checks bring discrepancies to light in time. RS POS also offers a mobile app called "RSPOS Sayım".</li>
  <li><strong>FIFO</strong> — the batch bought first is treated as sold first. Because purchase prices change often in wholesale, this matters for calculating profit correctly. More details: <a href="/blog-details/what-is-fifo-cost-method-2026">what is the FIFO cost method</a>.</li>
</ul>

<h2>7. Reports: By Customer, Product and Sales Agent</h2>
<p>In wholesale, turnover is large and margins are thin. That is why "how much did we sell" is not enough — you need to answer "to whom, what, through whom and at what profit". RS POS shows sales reports by customer, product and sales agent.</p>
<table>
  <thead>
    <tr><th>Report</th><th>Which question it answers</th></tr>
  </thead>
  <tbody>
    <tr><td>By customer</td><td>Who are the biggest customers, and whose purchases are falling?</td></tr>
    <tr><td>By product</td><td>Which goods sell well, and which stay in the warehouse?</td></tr>
    <tr><td>By sales agent</td><td>What has each sales agent sold, and how much debt have they collected?</td></tr>
    <tr><td>Debt balance</td><td>How much do customers owe us, and how much do we owe suppliers?</td></tr>
  </tbody>
</table>

<h2>8. Wholesale and Retail in One System</h2>
<p>Many wholesalers also have a retail shop. In RS POS, retail sales and wholesale sales with customer-specific pricing can be run in the same system: stock levels, the warehouse and reports are shared. A retail customer buys at the shelf price, while a wholesale customer buys at their own price list.</p>
<p>If your dealers want to place orders online themselves, you may need a separate B2B ordering portal: <a href="/blog-details/b2b-ordering-portal-dealers-distributors-2026">B2B ordering portal</a>. RS POS is a cloud system and requires an internet connection to work.</p>

<h2>9. Pricing and Questions to Ask When Choosing Software</h2>
<p>RS POS prices are published openly on rspos.az (November 2026):</p>
<table>
  <thead>
    <tr><th>Plan</th><th>Price</th><th>Cashiers</th><th>Registers</th><th>Warehouses</th></tr>
  </thead>
  <tbody>
    <tr><td>Basic</td><td>100 ₼/month</td><td>2</td><td>1</td><td>1</td></tr>
    <tr><td>Pro</td><td>150 ₼/month</td><td>10</td><td>3</td><td>3</td></tr>
    <tr><td>Enterprise</td><td>200 ₼/month</td><td>Unlimited</td><td>5</td><td>Unlimited</td></tr>
  </tbody>
</table>
<p>All plans include unlimited products. There is a 14-day free trial, and no card details are required. If you have several warehouses, choose your plan by the number of warehouses. For a general price comparison: <a href="/blog-details/pos-system-price-azerbaijan-2026">POS system prices in Azerbaijan</a>.</p>
<h3>Check before choosing any wholesale software</h3>
<ul>
  <li>Are there customer-specific price lists, and are they applied automatically at the sale?</li>
  <li>Is there a mobile app for sales agents: sales, debt collection, end-of-day handover?</li>
  <li>Are customer and supplier debts and part payments tracked?</li>
  <li>Are incoming and outgoing invoices kept?</li>
  <li>Are there multiple warehouses, transfers and FIFO cost?</li>
  <li>Are reports broken down by customer, product and sales agent?</li>
  <li>Do retail and wholesale sales work in the same system?</li>
  <li>Is there a free trial, and can you test it with your real customers and prices?</li>
</ul>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What kind of software does a wholesale business need?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Software that applies customer-specific price lists automatically, records sales agent sales and debt collection, tracks customer and supplier debts, and keeps invoices, the warehouse and reports in one place. RS POS combines these features in one cloud system.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can each customer be given a separate price?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. In RS POS, a special price list is assigned on the customer card and applied automatically to that customer's sales.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do sales agents work on the road?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sales agents record shop sales and debt payments in an Android app and hand over the cash at the end of the day. Everything is visible in the central system.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can supplier debts be tracked?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Based on incoming invoices and payments, the remaining debt to each supplier is always visible, and part payments are recorded.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can retail and wholesale sales be run together?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. In RS POS, retail sales and wholesale sales with customer-specific pricing are run in the same system, with shared stock levels and reports.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How much does wholesale software cost?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS is offered in three plans: Basic at 100 ₼/month, Pro at 150 ₼/month and Enterprise at 200 ₼/month. All plans include unlimited products and a 14-day free trial, and no card details are required.</p>
    </div>
  </div>
</div>

<h3>Read also</h3>
<ul>
  <li><a href="/blog-details/phone-store-pos-software-2027">Software for Phone Shops</a></li>
  <li><a href="/blog-details/grocery-store-pos-software-2027">POS Software for Grocery Stores</a></li>
  <li><a href="/blog-details/customer-debt-book-credit-sales-2026">Credit Sales and the Debt Book</a></li>
  <li><a href="/blog-details/what-is-fifo-cost-method-2026">What Is the FIFO Cost Method?</a></li>
  <li><a href="/blog-details/b2b-ordering-portal-dealers-distributors-2026">B2B Ordering Portal: For Dealers and Distributors</a></li>
</ul>

<h2>Conclusion</h2>
<p>Order in wholesale starts with prices and debts. Customer-specific price lists prevent sales at the wrong price, the sales agent app brings sales and debt collection on the road into the system straight away, and debt and invoice tracking always keeps it clear who owes whom how much. Multiple warehouses, FIFO cost and reports by customer, product and sales agent let you see your profit in a thin-margin business.</p>
<p><strong>Want to run your wholesale business from one system? Take a look at <a href="/mehsullar/rspos">RS POS</a></strong> — 14-day free trial, no card required: <a href="https://rspos.az/topdan-satis-proqrami" rel="noopener" target="_blank">rspos.az</a>. If you need an ordering portal for dealers or a custom system: <a href="/contact">get in touch with us</a>.</p>
<p><small><em>This article is for general information purposes. For electronic invoice (e-qaimə), VAT and other tax requirements, consult an accountant or tax adviser. RS POS features and prices are described based on rspos.az as of November 2026.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>В оптовой торговле работа идёт не за кассой, а в дороге и в тетради. Один и тот же товар вы отдаёте одному магазину по одной цене, другому — по другой; торговый агент утром загружает машину товаром, а вечером возвращается с записями, наличными и списком долгов. Какой магазин сколько должен, сколько нужно заплатить поставщику, что продал каждый агент — чтобы это узнать, каждый вечер часами идут подсчёты, и цифры всё равно не сходятся.</p>
<p>Эта статья — для предпринимателей, которые в 2027 году занимаются оптовой торговлей, дистрибуцией или оптово-розничной торговлей. Пошагово разберём прайс-лист по клиентам, работу выездных торговых агентов, долги магазинов, приходные и расходные накладные, долги перед поставщиками, склад и отчёты. В качестве примера используем возможности облачной программы <a href="/mehsullar/rspos">RS POS</a>, разработанной RS Code.</p>

<h2>Краткий ответ</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Ответ</th></tr>
  </thead>
  <tbody>
    <tr><td>Чем отличается программа для оптовой торговли?</td><td>Цены по клиентам, продажи через торговых агентов и учёт долгов магазинов</td></tr>
    <tr><td>Можно ли задать каждому клиенту свою цену?</td><td>Да, в карточке клиента назначается индивидуальный прайс-лист, который автоматически применяется при продаже</td></tr>
    <tr><td>Как агенты продают в дороге?</td><td>В Android-приложении они фиксируют продажи, сбор долгов и сдачу выручки в конце дня</td></tr>
    <tr><td>Как отслеживаются долги магазинов?</td><td>Долг, платежи и история каждого клиента — в одном месте</td></tr>
    <tr><td>Виден ли долг перед поставщиком?</td><td>Да, остаток по приходным накладным и платежам виден всегда</td></tr>
    <tr><td>Можно ли вести розницу и опт вместе?</td><td>Да, в одной системе</td></tr>
  </tbody>
</table>

<h2>1. Почему оптовой торговле нужен особый подход</h2>
<p>В розничном магазине покупатель приходит, покупает по цене на полке и платит наличными или картой. В оптовой торговле почти всё иначе:</p>
<table>
  <thead>
    <tr><th></th><th>Розница</th><th>Опт</th></tr>
  </thead>
  <tbody>
    <tr><td>Цена</td><td>Одинаковая для всех</td><td>Разная в зависимости от клиента, объёма и договорённости</td></tr>
    <tr><td>Оплата</td><td>Сразу</td><td>Часто в долг, по частям</td></tr>
    <tr><td>Место продажи</td><td>Касса</td><td>Склад, офис и агент в дороге</td></tr>
    <tr><td>Документ</td><td>Чек</td><td>Накладная</td></tr>
    <tr><td>Главный риск</td><td>Расхождение в кассе</td><td>Несобранные долги и неверная цена</td></tr>
  </tbody>
</table>
<p>Поэтому программа для оптовой торговли должна отвечать на такие вопросы: какому клиенту и по какой цене продано, кто сколько должен, что агент продал за день и сколько денег собрал, сколько мы должны поставщику и какой товар, какой клиент и какой агент приносят прибыль.</p>

<h2>2. Прайс-лист по клиентам</h2>
<p>В оптовой торговле у одного товара несколько цен — это нормально: одна цена для крупной сети, другая для небольшого магазина, особая скидка для постоянного клиента. Проблема возникает, когда цена держится в памяти кассира или агента: продажа по неверной цене — это и убыток, и спор с клиентом.</p>
<p>В RS POS в карточке клиента назначается индивидуальный прайс-лист. При продаже этому клиенту программа автоматически применяет его цену — кассир или агент не меняет цену вручную.</p>
<p><strong>Практическое правило:</strong> держите прайс-листы простыми. Вместо отдельного списка для каждого клиента разделите клиентов на несколько групп (например, «сеть», «крупный магазин», «небольшой магазин») и дайте каждой группе один список. Индивидуальные условия оставляйте только для действительно крупных клиентов. Когда цена меняется, вы обновляете список в одном месте, и все продажи сразу идут по новой цене.</p>

<h2>3. Выездные торговые агенты</h2>
<p>В дистрибуции большую часть продаж делают торговые агенты: объезжают магазины, принимают заказы, отгружают товар, собирают старые долги. При работе с бумажными записями вечером возникают две проблемы: цифра в тетради агента не совпадает с цифрой в системе, а размер долга магазина становится известен только на следующий день.</p>
<p>В RS POS есть Android-приложение для торговых агентов. С его помощью агент:</p>
<ul>
  <li><strong>Фиксирует продажу магазину</strong> — по прайс-листу клиента.</li>
  <li><strong>Принимает оплату долга</strong> — долг магазина сразу уменьшается.</li>
  <li><strong>Сдаёт наличные в конце дня</strong> — деньги, собранные за день, видны в системе.</li>
</ul>
<p>Всё видно в центральной системе, а в отчётах продажи разделяются по агентам. Так вы видите, что продал каждый агент, сколько долгов собрал и что сдал.</p>
<p><strong>Правило сдачи выручки в конце дня:</strong> каждый вечер нужно сверять наличные, собранные агентом по данным системы, с суммой, которую он сдал. Если есть расхождение, выясняйте его в тот же день — через неделю вспомнить, кто, когда и что получил, очень сложно.</p>

<h2>4. Долги магазинов: контроль продаж в долг</h2>
<p>В оптовой торговле продажи в долг неизбежны: магазин берёт товар и платит по мере продажи. Но бесконтрольная продажа в долг замораживает оборотные средства. В RS POS долг, платежи и история каждого клиента находятся в одном месте, принимаются частичные платежи.</p>
<ul>
  <li><strong>Определите условия долга для каждого клиента.</strong> За сколько дней он должен заплатить, какой может быть максимальный долг — согласуйте эти правила письменно и сообщите их агентам.</li>
  <li><strong>Еженедельно просматривайте список долгов.</strong> У кого долг растёт, кто задерживает оплату — если видеть это вовремя, можно принять решение до того, как отгрузить новый товар.</li>
  <li><strong>Составляйте акт сверки.</strong> С крупными клиентами периодически сверяйте остаток долга, чтобы потом не возникало споров.</li>
</ul>
<p>Примечание: RS POS отслеживает долги и платежи, но функция автоматического кредитного лимита не предлагается — правило лимита вы применяете внутри компании самостоятельно. Подробнее: <a href="/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026">продажа в долг и долговая книга</a>.</p>

<h2>5. Накладные и долги перед поставщиками</h2>
<p>Оптовик — одновременно и продавец, и покупатель: он закупает товар у производителя или импортёра и продаёт магазинам. В RS POS ведутся приходные и расходные накладные, фиксируются платежи поставщикам. На основе приходных накладных и платежей остаток долга перед каждым поставщиком виден всегда.</p>
<ul>
  <li><strong>Приходная накладная</strong> — товар от поставщика, количество и закупочная цена. Отсюда формируются остаток и себестоимость.</li>
  <li><strong>Расходная накладная</strong> — товар, отгруженный клиенту. Отсюда формируются долг клиента и отчёт о продажах.</li>
  <li><strong>Платежи поставщикам</strong> — оплата по частям и оставшийся долг.</li>
</ul>
<p>С налоговой точки зрения в оптовой торговле важны требования по электронной счёт-фактуре (e-qaimə) и НДС. Уточните у своего бухгалтера, как эти требования применяются к вашей компании, — внутренние накладные RS POS не заменяют электронные документы, представляемые в налоговые органы.</p>

<h2>6. Склад, перемещения и себестоимость по FIFO</h2>
<p>У оптовика обычно несколько складов: основной склад, филиал или отдельное место, которое ведётся как машина агента. RS POS поддерживает несколько складов, перемещения между складами и себестоимость по FIFO.</p>
<ul>
  <li><strong>Перемещение</strong> — когда товар переходит с одного склада на другой, остаток остаётся верным в обоих местах.</li>
  <li><strong>Инвентаризация</strong> — регулярная проверка остатков вовремя выявляет расхождения. Также предлагается мобильное приложение RS POS под названием «RSPOS Sayım».</li>
  <li><strong>FIFO</strong> — партия, закупленная раньше, считается проданной первой. В оптовой торговле закупочные цены часто меняются, поэтому это важно для правильного расчёта прибыли. Подробнее: <a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">что такое себестоимость по FIFO</a>.</li>
</ul>

<h2>7. Отчёты: по клиентам, товарам и агентам</h2>
<p>В оптовой торговле оборот большой, а маржа узкая. Поэтому вопроса «сколько мы продали» недостаточно — нужен ответ на вопрос «кому, что, через кого и с какой прибылью». RS POS показывает отчёты о продажах по клиентам, товарам и торговым агентам.</p>
<table>
  <thead>
    <tr><th>Отчёт</th><th>На какой вопрос отвечает</th></tr>
  </thead>
  <tbody>
    <tr><td>По клиентам</td><td>Кто самые крупные клиенты, у кого снижаются закупки?</td></tr>
    <tr><td>По товарам</td><td>Какие товары продаются больше всего, а какие залёживаются на складе?</td></tr>
    <tr><td>По агентам</td><td>Что продал каждый агент, сколько долгов собрал?</td></tr>
    <tr><td>Остаток долгов</td><td>Сколько клиенты должны нам, а мы — поставщикам?</td></tr>
  </tbody>
</table>

<h2>8. Опт и розница в одной системе</h2>
<p>У многих оптовиков есть и розничный магазин. В RS POS розничные продажи и оптовые продажи по ценам клиентов можно вести в одной системе: остатки, склад и отчёты общие. Розничный покупатель покупает по цене на полке, а оптовый клиент — по своему прайс-листу.</p>
<p>Если ваши дилеры хотят сами оформлять заказы онлайн, может понадобиться отдельный B2B-портал заказов: <a href="/blog-details/b2b-portal-zakazov-dlya-dilerov-2026">B2B-портал заказов</a>. RS POS — облачная система, и для работы нужен интернет.</p>

<h2>9. Цены и вопросы при выборе программы</h2>
<p>Цены RS POS открыто указаны на rspos.az (ноябрь 2026):</p>
<table>
  <thead>
    <tr><th>Тариф</th><th>Цена</th><th>Кассиры</th><th>Кассы</th><th>Склады</th></tr>
  </thead>
  <tbody>
    <tr><td>Basic</td><td>100 ₼/мес.</td><td>2</td><td>1</td><td>1</td></tr>
    <tr><td>Pro</td><td>150 ₼/мес.</td><td>10</td><td>3</td><td>3</td></tr>
    <tr><td>Enterprise</td><td>200 ₼/мес.</td><td>Без ограничений</td><td>5</td><td>Без ограничений</td></tr>
  </tbody>
</table>
<p>Во всех тарифах количество товаров не ограничено. Есть 14 дней бесплатного пробного периода, данные карты не требуются. Если у вас несколько складов, выбирайте тариф по количеству складов. Общее сравнение цен: <a href="/blog-details/stoimost-pos-sistemy-azerbaydzhan-2026">стоимость POS-системы в Азербайджане</a>.</p>
<h3>Что проверить перед выбором любой программы для оптовой торговли</h3>
<ul>
  <li>Есть ли прайс-листы по клиентам и применяются ли они автоматически при продаже?</li>
  <li>Есть ли мобильное приложение для агентов: продажа, сбор долгов, сдача выручки в конце дня?</li>
  <li>Отслеживаются ли долги клиентов и поставщиков, частичные платежи?</li>
  <li>Ведутся ли приходные и расходные накладные?</li>
  <li>Есть ли несколько складов, перемещения и себестоимость по FIFO?</li>
  <li>Разделяются ли отчёты по клиентам, товарам и агентам?</li>
  <li>Работают ли розничные и оптовые продажи в одной системе?</li>
  <li>Есть ли бесплатный пробный период и можно ли протестировать программу на ваших реальных клиентах и ценах?</li>
</ul>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Какая программа нужна для оптовой торговли?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Программа, которая автоматически применяет прайс-лист по клиентам, фиксирует продажи агентов и сбор долгов, отслеживает долги клиентов и поставщиков, ведёт накладные, склад и отчёты в одном месте. RS POS объединяет эти возможности в одной облачной системе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли давать каждому клиенту свою цену?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. В RS POS в карточке клиента назначается индивидуальный прайс-лист, который автоматически применяется в продажах этому клиенту.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как торговые агенты работают в дороге?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Агенты фиксируют продажи магазинам и оплату долгов в Android-приложении, а в конце дня сдают наличные. Всё это видно в центральной системе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли отслеживать долги перед поставщиками?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. На основе приходных накладных и платежей остаток долга перед каждым поставщиком виден всегда, оплата по частям фиксируется.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли вести розничные и оптовые продажи вместе?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. В RS POS розничные продажи и оптовые продажи по ценам клиентов ведутся в одной системе, с общими остатками и отчётами.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько стоит программа для оптовой торговли?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">RS POS предлагается в трёх тарифах: Basic 100 ₼/мес., Pro 150 ₼/мес. и Enterprise 200 ₼/мес. Во всех тарифах неограниченное количество товаров и 14 дней бесплатного пробного периода, данные карты не требуются.</p>
    </div>
  </div>
</div>

<h3>Читайте также</h3>
<ul>
  <li><a href="/blog-details/programma-dlya-magazina-telefonov-2027">Программа для магазина телефонов</a></li>
  <li><a href="/blog-details/kassovaya-programma-dlya-produktovogo-magazina-2027">Кассовая программа для продуктового магазина</a></li>
  <li><a href="/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026">Продажа в долг и долговая книга</a></li>
  <li><a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">Что такое себестоимость по FIFO?</a></li>
  <li><a href="/blog-details/b2b-portal-zakazov-dlya-dilerov-2026">B2B-портал заказов: для дилеров и дистрибьюторов</a></li>
</ul>

<h2>Итог</h2>
<p>Порядок в оптовой торговле начинается с цен и долгов. Прайс-лист по клиентам предотвращает продажи по неверной цене, приложение для агентов сразу переносит продажи в дороге и сбор долгов в систему, а учёт долгов и накладных всегда держит ясным, кто кому и сколько должен. Несколько складов, себестоимость по FIFO и отчёты по клиентам, товарам и агентам позволяют видеть прибыль в бизнесе с узкой маржой.</p>
<p><strong>Хотите управлять оптовыми продажами из одной системы? Познакомьтесь с <a href="/mehsullar/rspos">RS POS</a></strong> — 14 дней бесплатного пробного периода, карта не требуется: <a href="https://rspos.az/topdan-satis-proqrami" rel="noopener" target="_blank">rspos.az</a>. Если нужен портал заказов для дилеров или индивидуальная система: <a href="/kontakty">свяжитесь с нами</a>.</p>
<p><small><em>Эта статья носит общий информационный характер. По электронной счёт-фактуре (e-qaimə), НДС и другим налоговым требованиям обращайтесь к бухгалтеру или налоговому консультанту. Возможности и цены RS POS описаны по данным rspos.az по состоянию на ноябрь 2026 года.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'topdan-satis-proqrami-2027'],
            [
                'slug_en' => 'wholesale-pos-software-2027',
                'slug_ru' => 'programma-dlya-optovoj-torgovli-2027',
                'title_az' => 'Topdan Satış Proqramı: Müştəriyə Görə Qiymət, Satış Agentləri, Mağaza Borcları, Qaimələr və Anbar (2027)',
                'title_en' => 'Wholesale POS Software: Customer Price Lists, Sales Agents, Store Debts, Invoices and Warehouses (2027)',
                'title_ru' => 'Программа для оптовой торговли: цены по клиентам, торговые агенты, долги магазинов, накладные и склад (2027)',
                'review_az' => 'Topdan satış və distribyusiya üçün: pərakəndədən fərqlər, müştəriyə görə qiymət siyahısı, səyyar satış agentləri üçün Android tətbiqi və gün sonu təhvil, mağaza borclarına nəzarət, giriş və çıxış qaimələri, tədarükçü borcları, bir neçə anbar və FIFO, müştəri, məhsul və agent üzrə hesabatlar, topdan və pərakəndə bir sistemdə, RS POS qiymətləri və seçim siyahısı.',
                'review_en' => 'For wholesale and distribution: how it differs from retail, customer-specific price lists, an Android app for sales agents and end-of-day cash handover, control of store debts, incoming and outgoing invoices, supplier debts, multiple warehouses and FIFO, reports by customer, product and agent, wholesale and retail in one system, RS POS pricing and a buying checklist.',
                'review_ru' => 'Для оптовой торговли и дистрибуции: отличия от розницы, прайс-листы по клиентам, Android-приложение для торговых агентов и сдача кассы в конце дня, контроль долгов магазинов, приходные и расходные накладные, долги поставщикам, несколько складов и FIFO, отчёты по клиентам, товарам и агентам, опт и розница в одной системе, цены RS POS и чек-лист выбора.',
                'date_az' => '12 Noyabr 2026',
                'date_en' => 'November 12, 2026',
                'date_ru' => '12 Ноября 2026',
                'photo' => 'cover-wholesale-pos-az.png',
                'photo_en' => 'cover-wholesale-pos-en.png',
                'photo_ru' => 'cover-wholesale-pos-ru.png',
                'meta_title_az' => 'Topdan Satış Proqramı 2027: Qiymət, Agent, Borc | RS Code',
                'meta_title_en' => 'Wholesale POS Software 2027: Prices, Agents, Debts | RS Code',
                'meta_title_ru' => 'Программа для оптовой торговли 2027: цены, агенты | RS Code',
                'meta_description_az' => 'Topdan satış proqramı necə seçilir: müştəriyə görə qiymət siyahısı, agent tətbiqi və borc yığımı, mağaza və tədarükçü borcları, qaimələr, anbar və hesabatlar.',
                'meta_description_en' => 'How to choose wholesale software: customer price lists, a sales agent app and debt collection, store and supplier debts, invoices, warehouses and reports.',
                'meta_description_ru' => 'Как выбрать программу для опта: прайс-листы по клиентам, приложение агента и сбор долгов, долги магазинов и поставщиков, накладные, склад и отчёты.',
                'meta_keywords_az' => 'topdan satış proqramı, topdan satış üçün proqram, distribyusiya proqramı, satış agenti proqramı, mağaza borcları, qaimə, tədarükçü borcu, anbar proqramı, rs pos, 2027',
                'meta_keywords_en' => 'wholesale pos, wholesale software, distribution software, sales agent app, customer price list, store debts, invoices, supplier debts, rs pos, 2027',
                'meta_keywords_ru' => 'программа для оптовой торговли, программа для опта, программа для дистрибуции, приложение торгового агента, долги магазинов, накладные, долги поставщикам, rs pos, 2027',
                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
