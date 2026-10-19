<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog53EkassaPosSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Kassir satışı əvvəlcə POS proqramına vurur, sonra eyni məbləği e-kassaya yenidən daxil edir. Növbənin sonunda proqramdakı satış ilə e-kassanın hesabatı üst-üstə düşmür, qaytarma çeki isə ümumiyyətlə unudulur. Bu, Azərbaycanda mağaza, kafe və restoranlarda ən çox rast gəlinən problemlərdən biridir və həm vaxt itkisi, həm də vergi riski yaradır.</p>
<p>Bu yazıda e-kassanın nə olduğunu, kimlər üçün məcburi olduğunu, POS proqramı ilə inteqrasiyanın necə işlədiyini və sistem seçərkən nələri yoxlamaq lazım olduğunu izah edirik.</p>

<h2>E-kassa Nədir?</h2>
<p>Dövlət Vergi Xidmətinin (DVX) izahına görə, e-kassa <strong>nəzarət mexanizmi qurğusu (NMQ) ilə təchiz edilmiş proqram-aparat kompleksidir</strong>. O, çek və əməliyyat məlumatlarını toplayır, saxlayır və <strong>real vaxtda</strong> DVX-nin informasiya sistemlərinə ötürür.</p>
<ul>
  <li><strong>Fiskal ID və QR kod:</strong> hər çekdə NMQ-nin yaratdığı 16 simvolluq fiskal identifikator və QR kod olur. Alıcı bunlarla çekin DVX bazasında olub-olmadığını yoxlaya bilir.</li>
  <li><strong>ƏDV-nin qaytarılması:</strong> QR kod və fiskal ID ödənilmiş ƏDV-nin bir hissəsinin alıcıya qaytarılması üçün də istifadə olunur.</li>
  <li><strong>NMQ sertifikatı:</strong> 3 il etibarlıdır, müddət bitdikdə və ya qurğu sıradan çıxdıqda dəyişdirilir.</li>
  <li><strong>Yalnız reyestrdəki modellər:</strong> yalnız dövlət reyestrinə daxil edilmiş e-kassa modellərindən istifadə etmək olar. Satış, quraşdırma və texniki xidmətlə DVX-də qeydiyyatdan keçmiş <strong>e-kassa operatorları</strong> məşğul olur.</li>
</ul>

<h2>E-kassa Kimlər üçün Məcburidir?</h2>
<p>Vergi Məcəlləsinin 16.1.8-ci maddəsinə əsasən, nağd pul hesablaşmaları e-kassa ilə aparılmalıdır. DVX-nin siyahısında aşağıdakı sahələr var:</p>
<ul>
  <li>pərakəndə ticarət (mağaza, market, aptek);</li>
  <li>ictimai iaşə (kafe, restoran, fast-food);</li>
  <li>mehmanxana və digər qonaqlama yerləri;</li>
  <li>tibb müəssisələri və xüsusi tibbi praktika;</li>
  <li>bərbərxanalar, gözəllik salonları və kosmetologiya mərkəzləri.</li>
</ul>
<p>Bəzi istisnalar var: məsələn, dövriyyəsinin 50%-dən çoxu qəzet və jurnal satışı olanlar, bazar və yarmarkalarda kənd təsərrüfatı məhsulu satışı. Öz fəaliyyətinizin istisnaya düşüb-düşmədiyini DVX-nin 195 nömrəli çağrı mərkəzindən dəqiqləşdirin.</p>

<h2>E-kassa, POS Terminal və POS Proqramı: Fərq Nədir?</h2>
<p>Bu üç anlayış tez-tez qarışdırılır, halbuki hər birinin funksiyası fərqlidir:</p>
<table>
  <thead>
    <tr><th>Nə</th><th>Nə edir</th><th>Məcburidirmi</th></tr>
  </thead>
  <tbody>
    <tr><td>E-kassa</td><td>Fiskal çek çap edir, məlumatı real vaxtda DVX-yə göndərir</td><td>Bəli, göstərilən sahələrdə nağd hesablaşma üçün</td></tr>
    <tr><td>POS terminal</td><td>Bank kartı ilə ödəniş qəbul edir</td><td>Qanunla tələb olunan obyektlərdə bəli</td></tr>
    <tr><td>POS proqramı</td><td>Satış, anbar, maya dəyəri, borc, hesabat, işçilər</td><td>Xeyr, amma biznesi idarə etmək üçün əsas alətdir</td></tr>
  </tbody>
</table>
<p>Yəni e-kassa vergi tələbini, POS proqramı isə biznesin idarə olunmasını həll edir. Problem bu ikisi <strong>ayrı-ayrı</strong> işləyəndə başlayır.</p>

<h2>İki Ayrı Sistemin Problemləri</h2>
<ul>
  <li><strong>İkiqat iş:</strong> hər satış iki dəfə daxil edilir, növbədə vaxt itir.</li>
  <li><strong>Səhvlər:</strong> məbləğ və ya ödəniş növü (nağd/kart) fərqli vurulur.</li>
  <li><strong>Uyğunsuz hesabatlar:</strong> günün sonunda POS proqramındakı satış ilə e-kassanın hesabatı fərqlənir.</li>
  <li><strong>Unudulan çeklər:</strong> tələsik vaxtda çek vurulmur. Bu, birbaşa cərimə riskidir (aşağıda).</li>
  <li><strong>Qaytarmalar:</strong> malı geri qaytarma POS-da qeyd olunur, amma e-kassada qaytarma çeki vurulmur.</li>
</ul>

<h2>İnteqrasiya Necə İşləyir?</h2>
<p>İnteqrasiyada kassir satışı <strong>yalnız bir dəfə</strong>, POS proqramında rəsmiləşdirir. Qalanını sistem özü edir:</p>
<ol>
  <li>Kassir səbəti bağlayır və ödəniş növünü seçir: nağd, kart və ya qarışıq.</li>
  <li>POS proqramı məhsulları, qiymətləri, ƏDV məlumatını və ödənişi e-kassaya göndərir. E-kassa adətən mağazanın daxili şəbəkəsində olur.</li>
  <li>E-kassa fiskal çeki çap edir və məlumatı DVX-yə ötürür.</li>
  <li>Fiskal ID və QR linki POS proqramına geri qayıdır və satışın yanında saxlanılır.</li>
  <li>Qaytarma zamanı proqram əsas çekə bağlı qaytarma çekini e-kassaya göndərir.</li>
</ol>
<p>Nəticədə kassir ikinci dəfə heç nə daxil etmir, hər satışın fiskal çeki olur və hesabatlar üst-üstə düşür. Bundan əlavə, növbənin açılıb-bağlanması və kassaya pul mədaxili/məxarici kimi əməliyyatlar da proqramdan idarə oluna bilər.</p>

<h2>Sistem Seçərkən Nələri Yoxlamalı?</h2>
<table>
  <thead>
    <tr><th>Sual</th><th>Niyə vacibdir</th></tr>
  </thead>
  <tbody>
    <tr><td>E-kassa modeli dövlət reyestrindədirmi?</td><td>Reyestrdə olmayan qurğudan istifadə etmək olmaz</td></tr>
    <tr><td>Operator inteqrasiya API-si verirmi?</td><td>API yoxdursa, proqram e-kassa ilə "danışa" bilməz</td></tr>
    <tr><td>POS proqramı həmin modeli dəstəkləyirmi?</td><td>Hər proqram hər e-kassa ilə işləmir</td></tr>
    <tr><td>Qaytarma çeki avtomatikdirmi?</td><td>Ən çox səhv qaytarmalarda olur</td></tr>
    <tr><td>Nağd + kart (qarışıq) ödəniş düzgün ötürülürmü?</td><td>Ödəniş növləri e-kassa hesabatında düzgün görünməlidir</td></tr>
    <tr><td>ƏDV-li və ƏDV-siz məhsullar ayrılırmı?</td><td>Çekdə ƏDV məlumatı düzgün olmalıdır</td></tr>
    <tr><td>Şəbəkə və ya cihaz problemi olanda nə olur?</td><td>Satışın itməməsi və çekin təkrar göndərilə bilməsi vacibdir</td></tr>
  </tbody>
</table>
<p>Restoranlar üçün əlavə meyarlar: <a href="/blog-details/restoran-ucun-pos-sistemi-nece-secilir-2026">Restoran üçün POS Sistemi Necə Seçilir</a>. Qiymət müqayisəsi: <a href="/blog-details/pos-sistemi-qiymeti-azerbaycanda-2026">POS Sistemi Qiyməti Azərbaycanda</a>.</p>

<h2>Çek Verilməməsinə Görə Cərimələr</h2>
<p>DVX-nin məlumatına görə, nağd satış e-kassa olmadan aparıldıqda, çek verilmədikdə və ya çek ödənilən məbləğdən az vurulduqda aşağıdakı maliyyə sanksiyaları tətbiq olunur:</p>
<table>
  <thead>
    <tr><th>Təqvim ili ərzində</th><th>Maliyyə sanksiyası</th></tr>
  </thead>
  <tbody>
    <tr><td>Birinci dəfə</td><td>1.000 ₼</td></tr>
    <tr><td>İkinci dəfə</td><td>3.000 ₼</td></tr>
    <tr><td>Üç və daha çox dəfə</td><td>6.000 ₼</td></tr>
  </tbody>
</table>
<p>POS terminal quraşdırılmalı olduğu halda quraşdırılmadıqda və ya quraşdırılmış obyektdə kartla ödənişdən imtina edildikdə də eyni məbləğlər tətbiq olunur. İnteqrasiya "çeki unutmaq" riskini praktik olaraq aradan qaldırır, çünki çek satışın özü ilə avtomatik vurulur.</p>

<h2>RS POS Nümunəsi</h2>
<p><a href="/mehsullar/rspos">RS POS</a> Caspos e-kassaları ilə inteqrasiya olunur (SUNMI və Z108 qurğuları). Satış və qaytarma çekləri proqramdan birbaşa e-kassaya göndərilir. Nağd, kart və qarışıq ödəniş, ƏDV məlumatı və növbə əməliyyatları ötürülür, fiskal ID və QR linki isə satışın yanında saxlanılır. Bununla yanaşı, RS POS anbar, <a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO maya dəyəri</a> və <a href="/blog-details/nisye-satis-borc-defteri-2026">nisyə satış</a> kimi gündəlik işləri də bir yerdə idarə edir.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">POS proqramı e-kassanı əvəz edirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Fiskal çeki yalnız dövlət reyestrində olan e-kassa çap edə və DVX-yə ötürə bilər. POS proqramı e-kassaya məlumat göndərir və biznesin qalan hissəsini idarə edir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Mövcud e-kassamı POS proqramına qoşa bilərəmmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bu, e-kassa modelinin və operatorun inteqrasiya imkanı verməsindən, POS proqramının da həmin modeli dəstəkləməsindən asılıdır. Seçimdən əvvəl hər iki tərəfdən bunu dəqiqləşdirin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Alıcı çekin həqiqi olduğunu necə yoxlayır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Çekdəki QR kodu skan edərək və ya 16 simvolluq fiskal ID ilə çekin DVX bazasında olub-olmadığını yoxlaya bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">E-kassa xarab olsa nə etməli?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Dərhal vergi orqanına və operatora məlumat verilməlidir. Operator qanunla müəyyən edilmiş müddətdə qurğunu təmir etməli, mümkün deyilsə müvəqqəti e-kassa ilə əvəz etməlidir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kartla ödənişdə də e-kassa çeki lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Çek ödəniş növündən asılı olmayaraq satış üçün vurulur. Çekdə ödənişin nağd, kart və ya qarışıq olduğu göstərilir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>E-kassa vergi tələbidir, POS proqramı isə biznesi idarə etmək üçün alətdir. Onlar ayrı işləyəndə ikiqat iş, səhv və cərimə riski yaranır. İnteqrasiya ilə kassir satışı bir dəfə vurur, fiskal çek avtomatik çıxır, hesabatlar üst-üstə düşür.</p>
<p><strong>E-kassanızı POS proqramı ilə birləşdirmək istəyirsinizsə, <a href="/elaqe">bizə yazın</a></strong>. Mövcud qurğunuzu yoxlayıb uyğun həll təklif edək. Ətraflı: <a href="/mehsullar/rspos">RS POS</a>, <a href="/blog-details/magaza-proqrami-anbar-pos-azerbaycanda-2026">Mağaza Proqramı, Anbar və POS</a>.</p>
<p><small><em>Məlumatlar e-kassa.gov.az və taxes.gov.az saytlarına əsaslanır (Oktyabr 2026). Qanunvericilik dəyişə bilər; konkret halınız üçün DVX-yə (195) və ya mühasibinizə müraciət edin.</em></small></p>
HTML;

        $textEn = <<<'HTML'
<p>The cashier rings up a sale in the POS software, then types the same amount into the e-kassa (fiscal cash register) again. At the end of the shift the software and the e-kassa report don't match, and refund receipts are forgotten altogether. This is one of the most common problems in shops, cafés and restaurants in Azerbaijan. It wastes time and creates tax risk.</p>
<p>This article explains what an e-kassa is, who must use it, how integration with POS software works and what to check when choosing a system.</p>

<h2>What Is an E-kassa?</h2>
<p>According to the State Tax Service (STS), an e-kassa is <strong>a hardware-software complex fitted with a control mechanism device (NMQ)</strong>. It collects, stores and transmits receipt and transaction data to the STS information systems <strong>in real time</strong>.</p>
<ul>
  <li><strong>Fiscal ID and QR code:</strong> every receipt carries a 16-character fiscal identifier generated by the NMQ and a QR code. Customers can use them to check that the receipt exists in the STS database.</li>
  <li><strong>VAT refund:</strong> the QR code and fiscal ID are also used to refund part of the VAT paid to the customer.</li>
  <li><strong>NMQ certificate:</strong> valid for 3 years. It is replaced when it expires or the device fails.</li>
  <li><strong>Registered models only:</strong> only e-kassa models in the state register may be used. Sales, installation and servicing are handled by <strong>e-kassa operators</strong> registered with the STS.</li>
</ul>

<h2>Who Must Use an E-kassa?</h2>
<p>Under Article 16.1.8 of the Tax Code, cash settlements must go through an e-kassa. The STS list includes:</p>
<ul>
  <li>retail (shops, supermarkets, pharmacies);</li>
  <li>catering (cafés, restaurants, fast food);</li>
  <li>hotels and other accommodation;</li>
  <li>medical institutions and private medical practice;</li>
  <li>barbershops, beauty salons and cosmetology centres.</li>
</ul>
<p>There are exceptions. Examples are newspaper and magazine sales making up more than 50% of turnover, and sales of farm produce at markets and fairs. Check whether your activity is exempt with the STS call centre on 195.</p>

<h2>E-kassa, POS Terminal and POS Software: What's the Difference?</h2>
<table>
  <thead>
    <tr><th>What</th><th>What it does</th><th>Mandatory?</th></tr>
  </thead>
  <tbody>
    <tr><td>E-kassa</td><td>Prints the fiscal receipt and sends data to the STS in real time</td><td>Yes, for cash settlements in the listed sectors</td></tr>
    <tr><td>POS terminal</td><td>Accepts bank card payments</td><td>Yes, where required by law</td></tr>
    <tr><td>POS software</td><td>Sales, stock, cost of goods, customer debts, reports, staff</td><td>No, but it is the core tool for running the business</td></tr>
  </tbody>
</table>
<p>The e-kassa meets the tax requirement and the POS software runs the business. Problems start when the two work <strong>separately</strong>.</p>

<h2>The Problems with Two Separate Systems</h2>
<ul>
  <li><strong>Double entry:</strong> every sale is entered twice, slowing the shift.</li>
  <li><strong>Errors:</strong> the amount or payment type (cash/card) is entered differently.</li>
  <li><strong>Mismatched reports:</strong> software sales and the e-kassa report differ at the end of the day.</li>
  <li><strong>Missed receipts:</strong> at busy times receipts aren't issued. This is a direct penalty risk (see below).</li>
  <li><strong>Refunds:</strong> a return is recorded in the POS but no refund receipt is issued on the e-kassa.</li>
</ul>

<h2>How Integration Works</h2>
<p>With integration, the cashier completes the sale <strong>once</strong>, in the POS software. The system does the rest:</p>
<ol>
  <li>The cashier closes the basket and chooses the payment type: cash, card or mixed.</li>
  <li>The POS software sends items, prices, VAT data and payment details to the e-kassa. The e-kassa usually sits on the shop's local network.</li>
  <li>The e-kassa prints the fiscal receipt and transmits the data to the STS.</li>
  <li>The fiscal ID and QR link come back to the POS software and are stored with the sale.</li>
  <li>For a return, the software sends a refund receipt linked to the original sale.</li>
</ol>
<p>The cashier never re-enters anything, every sale has a fiscal receipt and the reports match. Shift opening and closing and cash in/out operations can also be managed from the software.</p>

<h2>What to Check When Choosing a System</h2>
<table>
  <thead>
    <tr><th>Question</th><th>Why it matters</th></tr>
  </thead>
  <tbody>
    <tr><td>Is the e-kassa model in the state register?</td><td>Unregistered devices may not be used</td></tr>
    <tr><td>Does the operator provide an integration API?</td><td>Without an API, the software can't talk to the e-kassa</td></tr>
    <tr><td>Does the POS software support that model?</td><td>Not every program works with every e-kassa</td></tr>
    <tr><td>Are refund receipts automatic?</td><td>Most errors happen on returns</td></tr>
    <tr><td>Are mixed cash + card payments sent correctly?</td><td>Payment types must appear correctly in e-kassa reports</td></tr>
    <tr><td>Are VAT and non-VAT items separated?</td><td>VAT data on the receipt must be correct</td></tr>
    <tr><td>What happens if the network or device fails?</td><td>Sales must not be lost and receipts must be re-sendable</td></tr>
  </tbody>
</table>
<p>Extra criteria for restaurants: <a href="/blog-details/how-to-choose-pos-system-for-restaurant-2026">How to Choose a POS System for a Restaurant</a>. Price comparison: <a href="/blog-details/pos-system-price-azerbaijan-2026">POS System Price in Azerbaijan</a>.</p>

<h2>Penalties for Not Issuing Receipts</h2>
<p>According to the STS, the following financial sanctions apply when cash sales are made without an e-kassa, no receipt is issued, or the receipt is for less than the amount paid:</p>
<table>
  <thead>
    <tr><th>Within a calendar year</th><th>Financial sanction</th></tr>
  </thead>
  <tbody>
    <tr><td>First time</td><td>AZN 1,000</td></tr>
    <tr><td>Second time</td><td>AZN 3,000</td></tr>
    <tr><td>Three or more times</td><td>AZN 6,000</td></tr>
  </tbody>
</table>
<p>The same amounts apply for not installing a required POS terminal or refusing card payments where one is installed. Integration practically eliminates the risk of a "forgotten receipt", because the receipt is issued automatically with the sale.</p>

<h2>Example: RS POS</h2>
<p><a href="/mehsullar/rspos">RS POS</a> integrates with Caspos e-kassas (SUNMI and Z108 devices). Sales and refund receipts are sent straight from the software to the e-kassa. Cash, card and mixed payments, VAT data and shift operations are passed through, and the fiscal ID and QR link are stored with each sale. RS POS also handles stock, <a href="/blog-details/what-is-fifo-cost-method-2026">FIFO cost of goods</a> and <a href="/blog-details/customer-debt-book-credit-sales-2026">credit sales</a> in one place.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does POS software replace the e-kassa?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. Only a registered e-kassa can print a fiscal receipt and transmit it to the STS. The POS software sends data to the e-kassa and runs the rest of the business.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can I connect my existing e-kassa to POS software?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">It depends on whether the e-kassa model and operator offer integration and whether the POS software supports that model. Confirm both before choosing.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How can a customer check that a receipt is genuine?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">By scanning the QR code or using the 16-character fiscal ID to check that the receipt exists in the STS database.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What if the e-kassa breaks down?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Notify the tax authority and the operator immediately. The operator must repair the device within the legal deadline or replace it with a temporary e-kassa.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is an e-kassa receipt needed for card payments too?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. A receipt is issued for the sale whatever the payment method, and it shows whether payment was cash, card or mixed.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>The e-kassa is a tax requirement and POS software is a management tool. When they work separately, you get double entry, errors and penalty risk. With integration the cashier enters each sale once, the fiscal receipt is issued automatically and the reports match.</p>
<p><strong>Want to connect your e-kassa to POS software? <a href="/contact">Contact us</a></strong>. We'll check your current device and suggest a fitting solution. More: <a href="/mehsullar/rspos">RS POS</a>, <a href="/blog-details/store-software-warehouse-pos-azerbaijan-2026">Store Software, Warehouse and POS</a>.</p>
<p><small><em>Based on e-kassa.gov.az and taxes.gov.az (October 2026). Legislation may change; for your specific case, contact the STS (195) or your accountant.</em></small></p>
HTML;

        $textRu = <<<'HTML'
<p>Кассир пробивает продажу в POS-программе, а затем вводит ту же сумму в e-kassa (онлайн-кассу) ещё раз. В конце смены продажи в программе и отчёт e-kassa не совпадают, а чеки возврата вообще забывают. Это одна из самых частых проблем магазинов, кафе и ресторанов в Азербайджане. Она отнимает время и создаёт налоговый риск.</p>
<p>В этой статье разберём, что такое e-kassa, кто обязан её использовать, как работает интеграция с POS-программой и что проверить при выборе системы.</p>

<h2>Что такое e-kassa?</h2>
<p>По разъяснению Государственной налоговой службы (ГНС), e-kassa — это <strong>программно-аппаратный комплекс с устройством контрольного механизма (NMQ)</strong>. Он собирает, хранит и <strong>в реальном времени</strong> передаёт данные чеков и операций в информационные системы ГНС.</p>
<ul>
  <li><strong>Фискальный ID и QR-код:</strong> на каждом чеке есть 16-значный фискальный идентификатор, сформированный NMQ, и QR-код. По ним покупатель может проверить, есть ли чек в базе ГНС.</li>
  <li><strong>Возврат НДС:</strong> QR-код и фискальный ID также используются для возврата покупателю части уплаченного НДС.</li>
  <li><strong>Сертификат NMQ:</strong> действует 3 года. Его заменяют по истечении срока или при выходе устройства из строя.</li>
  <li><strong>Только модели из реестра:</strong> разрешены только модели e-kassa, внесённые в государственный реестр. Продажей, установкой и обслуживанием занимаются зарегистрированные в ГНС <strong>операторы e-kassa</strong>.</li>
</ul>

<h2>Кто обязан использовать e-kassa?</h2>
<p>Согласно статье 16.1.8 Налогового кодекса, наличные расчёты должны проводиться через e-kassa. В перечне ГНС указаны:</p>
<ul>
  <li>розничная торговля (магазины, маркеты, аптеки);</li>
  <li>общепит (кафе, рестораны, фастфуд);</li>
  <li>гостиницы и другие места размещения;</li>
  <li>медицинские учреждения и частная медицинская практика;</li>
  <li>парикмахерские, салоны красоты и косметологические центры.</li>
</ul>
<p>Есть исключения. Например, продажа газет и журналов, если она составляет более 50% оборота, и продажа сельхозпродукции на рынках и ярмарках. Уточните, подпадает ли ваша деятельность под исключение, в колл-центре ГНС 195.</p>

<h2>E-kassa, POS-терминал и POS-программа: в чём разница?</h2>
<table>
  <thead>
    <tr><th>Что</th><th>Что делает</th><th>Обязательно?</th></tr>
  </thead>
  <tbody>
    <tr><td>E-kassa</td><td>Печатает фискальный чек и передаёт данные в ГНС в реальном времени</td><td>Да, для наличных расчётов в указанных сферах</td></tr>
    <tr><td>POS-терминал</td><td>Принимает оплату банковской картой</td><td>Да, где этого требует закон</td></tr>
    <tr><td>POS-программа</td><td>Продажи, склад, себестоимость, долги клиентов, отчёты, сотрудники</td><td>Нет, но это основной инструмент управления бизнесом</td></tr>
  </tbody>
</table>
<p>E-kassa решает налоговое требование, а POS-программа — управление бизнесом. Проблемы начинаются, когда они работают <strong>раздельно</strong>.</p>

<h2>Проблемы двух отдельных систем</h2>
<ul>
  <li><strong>Двойной ввод:</strong> каждая продажа вводится дважды, смена замедляется.</li>
  <li><strong>Ошибки:</strong> сумма или вид оплаты (наличные/карта) вводятся по-разному.</li>
  <li><strong>Несовпадение отчётов:</strong> в конце дня продажи в программе и отчёт e-kassa расходятся.</li>
  <li><strong>Пропущенные чеки:</strong> в час пик чек не пробивают. Это прямой риск штрафа (см. ниже).</li>
  <li><strong>Возвраты:</strong> возврат отмечен в POS, но чек возврата на e-kassa не пробит.</li>
</ul>

<h2>Как работает интеграция</h2>
<p>При интеграции кассир оформляет продажу <strong>один раз</strong> — в POS-программе. Остальное система делает сама:</p>
<ol>
  <li>Кассир закрывает корзину и выбирает вид оплаты: наличные, карта или смешанная.</li>
  <li>POS-программа передаёт в e-kassa товары, цены, данные НДС и оплату. Обычно e-kassa находится во внутренней сети магазина.</li>
  <li>E-kassa печатает фискальный чек и передаёт данные в ГНС.</li>
  <li>Фискальный ID и QR-ссылка возвращаются в POS-программу и сохраняются вместе с продажей.</li>
  <li>При возврате программа отправляет чек возврата, привязанный к исходной продаже.</li>
</ol>
<p>Кассиру не нужно ничего вводить повторно, у каждой продажи есть фискальный чек, а отчёты совпадают. Открытием и закрытием смены, а также внесением и изъятием денег из кассы тоже можно управлять из программы.</p>

<h2>Что проверить при выборе системы</h2>
<table>
  <thead>
    <tr><th>Вопрос</th><th>Почему это важно</th></tr>
  </thead>
  <tbody>
    <tr><td>Есть ли модель e-kassa в госреестре?</td><td>Устройства вне реестра использовать нельзя</td></tr>
    <tr><td>Предоставляет ли оператор API для интеграции?</td><td>Без API программа не сможет «общаться» с e-kassa</td></tr>
    <tr><td>Поддерживает ли POS-программа эту модель?</td><td>Не каждая программа работает с любой e-kassa</td></tr>
    <tr><td>Автоматический ли чек возврата?</td><td>Больше всего ошибок происходит при возвратах</td></tr>
    <tr><td>Правильно ли передаётся смешанная оплата (наличные + карта)?</td><td>Виды оплаты должны корректно отражаться в отчёте e-kassa</td></tr>
    <tr><td>Разделяются ли товары с НДС и без НДС?</td><td>Данные НДС в чеке должны быть верными</td></tr>
    <tr><td>Что будет при сбое сети или устройства?</td><td>Продажи не должны теряться, а чек — отправляться повторно</td></tr>
  </tbody>
</table>
<p>Дополнительные критерии для ресторанов: <a href="/blog-details/kak-vybrat-pos-sistemu-dlya-restorana-2026">Как выбрать POS-систему для ресторана</a>. Сравнение цен: <a href="/blog-details/stoimost-pos-sistemy-azerbaydzhan-2026">Цена POS-системы в Азербайджане</a>.</p>

<h2>Штрафы за невыдачу чека</h2>
<p>По данным ГНС, если наличные продажи ведутся без e-kassa, чек не выдаётся или пробивается на сумму меньше оплаченной, применяются следующие финансовые санкции:</p>
<table>
  <thead>
    <tr><th>В течение календарного года</th><th>Финансовая санкция</th></tr>
  </thead>
  <tbody>
    <tr><td>Первый раз</td><td>1 000 ₼</td></tr>
    <tr><td>Второй раз</td><td>3 000 ₼</td></tr>
    <tr><td>Три и более раз</td><td>6 000 ₼</td></tr>
  </tbody>
</table>
<p>Те же суммы применяются, если обязательный POS-терминал не установлен или на объекте с терминалом отказывают в оплате картой. Интеграция практически исключает риск «забытого чека», потому что чек пробивается автоматически вместе с продажей.</p>

<h2>Пример: RS POS</h2>
<p><a href="/mehsullar/rspos">RS POS</a> интегрируется с e-kassa Caspos (устройства SUNMI и Z108). Чеки продажи и возврата отправляются из программы прямо на e-kassa. Передаются наличная, карточная и смешанная оплата, данные НДС и операции смены, а фискальный ID и QR-ссылка сохраняются с каждой продажей. Кроме того, RS POS в одном месте ведёт склад, <a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">себестоимость по FIFO</a> и <a href="/blog-details/prodazhi-v-dolg-dolgovaya-kniga-2026">продажи в долг</a>.</p>

<h2>Частые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Заменяет ли POS-программа e-kassa?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Печатать фискальный чек и передавать его в ГНС может только e-kassa из реестра. POS-программа передаёт данные в e-kassa и управляет остальной частью бизнеса.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли подключить мою текущую e-kassa к POS-программе?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Это зависит от того, даёт ли модель e-kassa и оператор возможность интеграции и поддерживает ли POS-программа эту модель. Уточните это у обеих сторон до выбора.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как покупатель может проверить подлинность чека?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Отсканировав QR-код или по 16-значному фискальному ID проверить, есть ли чек в базе ГНС.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что делать, если e-kassa сломалась?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сразу сообщить в налоговый орган и оператору. Оператор обязан отремонтировать устройство в установленный законом срок, а если это невозможно — заменить его временной e-kassa.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужен ли чек e-kassa при оплате картой?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Чек пробивается на продажу независимо от способа оплаты, и в нём указано, была ли оплата наличными, картой или смешанной.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>E-kassa — налоговое требование, POS-программа — инструмент управления. Когда они работают раздельно, возникают двойной ввод, ошибки и риск штрафов. При интеграции кассир вводит продажу один раз, фискальный чек пробивается автоматически, а отчёты совпадают.</p>
<p><strong>Хотите подключить e-kassa к POS-программе? <a href="/kontakty">Напишите нам</a></strong>. Проверим ваше текущее устройство и предложим подходящее решение. Подробнее: <a href="/mehsullar/rspos">RS POS</a>, <a href="/blog-details/programma-magazin-sklad-pos-azerbajdzan-2026">Программа для магазина, склад и POS</a>.</p>
<p><small><em>По данным e-kassa.gov.az и taxes.gov.az (октябрь 2026). Законодательство может меняться; по вашему случаю обратитесь в ГНС (195) или к бухгалтеру.</em></small></p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'e-kassa-pos-inteqrasiyasi-2026'],
            [
                'slug_en' => 'e-kassa-pos-integration-azerbaijan-2026',
                'slug_ru' => 'e-kassa-integraciya-s-pos-2026',

                'title_az' => 'E-kassa və POS Proqramı: İnteqrasiya Necə İşləyir? Mağaza və Restoran üçün 2026',
                'title_en' => 'E-kassa and POS Software: How Integration Works for Shops and Restaurants 2026',
                'title_ru' => 'E-kassa и POS-программа: как работает интеграция для магазинов и ресторанов 2026',

                'review_az' => 'Satışı iki dəfə vurmayın: e-kassa nədir, kimlər üçün məcburidir, POS proqramı ilə inteqrasiya necə işləyir, seçim meyarları və çek verilməməsinə görə 1.000–6.000 ₼ cərimələr.',
                'review_en' => 'Stop entering sales twice: what an e-kassa is, who must use it, how POS integration works, selection criteria and AZN 1,000–6,000 penalties for missed receipts.',
                'review_ru' => 'Не пробивайте продажу дважды: что такое e-kassa, кто обязан её использовать, как работает интеграция с POS, критерии выбора и штрафы 1 000–6 000 ₼ за невыдачу чека.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '19 Oktyabr 2026',
                'date_en' => 'October 19, 2026',
                'date_ru' => '19 Октября 2026',

                'photo'    => 'cover-ekassa-pos-az.png',
                'photo_en' => 'cover-ekassa-pos-en.png',
                'photo_ru' => 'cover-ekassa-pos-ru.png',

                'meta_title_az' => 'E-kassa və POS İnteqrasiyası 2026: Necə İşləyir | RS Code',
                'meta_title_en' => 'E-kassa & POS Integration in Azerbaijan 2026 | RS Code',
                'meta_title_ru' => 'Интеграция e-kassa с POS в Азербайджане 2026 | RS Code',

                'meta_description_az' => 'E-kassa nədir, kimlər üçün məcburidir və POS proqramı ilə necə birləşdirilir? Fiskal çek, QR, qaytarma, seçim meyarları və 1.000–6.000 ₼ cərimələr.',
                'meta_description_en' => 'What an e-kassa is, who must use it and how to connect it to POS software: fiscal receipts, QR codes, refunds, selection criteria and AZN 1,000–6,000 penalties.',
                'meta_description_ru' => 'Что такое e-kassa, кто обязан её использовать и как подключить к POS-программе: фискальный чек, QR, возвраты, критерии выбора и штрафы 1 000–6 000 ₼.',

                'meta_keywords_az' => 'e-kassa, nka, kassa aparatı, e-kassa pos inteqrasiyası, fiskal çek, onlayn kassa, pos proqramı 2026',
                'meta_keywords_en' => 'e-kassa, azerbaijan cash register, fiscal receipt, e-kassa pos integration, online cash register, pos software 2026',
                'meta_keywords_ru' => 'e-kassa, онлайн касса азербайджан, фискальный чек, интеграция e-kassa с pos, кассовый аппарат, pos программа 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
