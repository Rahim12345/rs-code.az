<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog39DebtBookSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Məhəllə mağazasında, aptekdə, tikinti materialları satışında və ya topdan satışda "nisyə yaz, maaş gələndə verəcəm" cümləsi gündəlik reallıqdır. Nisyə satış müştərini saxlayır və satışı artırır, amma idarə olunmayanda biznesin ən böyük pul itkisinə çevrilir: dəftər itir, məbləğlər qarışır, borc aylarla uzanır, mağazanın isə təchizatçıya ödəməyə pulu qalmır.</p>
<p>Bu yazıda nisyə satışın risklərini, borcları idarə etməyin praktik qaydalarını və kağız dəftərdən rəqəmsal borc dəftərinə keçidi izah edirik.</p>

<h2>Nisyə Satışın Gizli Xərcləri</h2>
<ul>
  <li><strong>Dövriyyə vəsaiti donur:</strong> Satış var, amma pul kassada deyil — yeni mal almaq çətinləşir.</li>
  <li><strong>Unudulan borclar:</strong> Kağız dəftərdə qeyd itir, yanlış yazılır və ya oxunmur.</li>
  <li><strong>Mübahisələr:</strong> "Mən 50 manat vermişdim" — qeyd yoxdursa, sübut da yoxdur.</li>
  <li><strong>Mənfəətin təhrifi:</strong> Nisyə satış gəlir kimi görünür, amma pul gəlməyibsə, real mənzərə fərqlidir.</li>
  <li><strong>Müştəri itkisi:</strong> Borcu çoxalan müştəri tez-tez mağazaya gəlməyi dayandırır — həm borc, həm müştəri itir.</li>
</ul>

<h2>Borcları İdarə Etməyin 7 Qaydası</h2>
<ol>
  <li><strong>Hər müştəriyə limit qoyun:</strong> Məsələn, yeni müştəri üçün 50 AZN, etibarlı daimi müştəri üçün daha çox. Limit dolanda yeni nisyə yoxdur.</li>
  <li><strong>Hər satışı dərhal qeyd edin:</strong> Tarix, məbləğ, mallar — "sonra yazaram" ən çox itki yaradan vərdişdir.</li>
  <li><strong>Ödəniş tarixi təyin edin:</strong> "Maaş günü", "ayın 10-u" — konkret tarix olmadan borc uzanır.</li>
  <li><strong>Hissə-hissə ödənişləri ayrıca qeyd edin:</strong> Qalıq hər zaman aydın görünməlidir.</li>
  <li><strong>Mütəmadi xatırlatma göndərin:</strong> Nəzakətli SMS və ya WhatsApp mesajı əksər hallarda kifayətdir.</li>
  <li><strong>Borcların yaşını izləyin:</strong> 30 gündən çox gecikən borcları ayrıca nəzarətə götürün.</li>
  <li><strong>Böyük məbləğləri sənədləşdirin:</strong> Topdan və ya böyük nisyə satışlarda yazılı razılaşma və ya qaimə saxlayın.</li>
</ol>

<h2>Borcların Yaşa Görə Bölgüsü</h2>
<p>Borcların nə qədər müddətdir ödənmədiyini görmək hansı müştəri ilə necə danışmağı müəyyən edir. Nümunə:</p>
<table>
  <thead>
    <tr><th>Müddət</th><th>Müştəri sayı</th><th>Məbləğ</th><th>Tədbir</th></tr>
  </thead>
  <tbody>
    <tr><td>0–30 gün</td><td>24</td><td>860 AZN</td><td>Normal, ödəniş tarixini xatırlat</td></tr>
    <tr><td>31–60 gün</td><td>9</td><td>540 AZN</td><td>Şəxsi zəng, yeni nisyəni dayandır</td></tr>
    <tr><td>61–90 gün</td><td>4</td><td>310 AZN</td><td>Ödəniş planı razılaşdır</td></tr>
    <tr><td>90+ gün</td><td>2</td><td>180 AZN</td><td>Ciddi nəzarət, hüquqi məsləhət</td></tr>
  </tbody>
</table>
<p>Bu cədvəl kağız dəftərdə hesablamaq üçün saatlar tələb edir, rəqəmsal borc dəftərində isə bir kliklə görünür.</p>

<h2>Kağız Dəftər vs Rəqəmsal Borc Dəftəri</h2>
<table>
  <thead>
    <tr><th>Meyar</th><th>Kağız dəftər</th><th>Rəqəmsal (POS ilə)</th></tr>
  </thead>
  <tbody>
    <tr><td>Qeyd</td><td>Əl ilə, sonradan</td><td>Satış anında avtomatik</td></tr>
    <tr><td>Qalıq</td><td>Hesablamaq lazımdır</td><td>Hər müştəri üzrə dərhal</td></tr>
    <tr><td>Limit nəzarəti</td><td>Yaddaşdan</td><td>Limit dolanda xəbərdarlıq</td></tr>
    <tr><td>Hissə-hissə ödəniş</td><td>Qarışıqlıq riski</td><td>Avtomatik çıxılır</td></tr>
    <tr><td>Hesabat</td><td>Yoxdur</td><td>Yaşa görə, müştəri üzrə</td></tr>
    <tr><td>İtki riski</td><td>Dəftər itə və ya cırıla bilər</td><td>Bulud ehtiyat nüsxəsi</td></tr>
  </tbody>
</table>

<h2>Nisyə Satış və Mənfəət</h2>
<p>Nisyə satışın mənfəəti yalnız pul gələndə realdır. Ona görə hesabatlarda satış gəliri ilə faktiki daxilolmanı ayrı görmək vacibdir. Mənfəətin düzgün hesablanması üçün maya dəyəri də düzgün olmalıdır — ətraflı: <a href="/blog-details/fifo-maya-deyeri-nedir-2026">FIFO Maya Dəyəri Nədir?</a></p>

<h2>RS POS-da Borc Dəftəri</h2>
<p>RS Code tərəfindən hazırlanmış <a href="/mehsullar/rspos">RS POS</a> bulud kassa sistemində borc dəftəri kassa ilə bir yerdədir: nisyə satış müştərinin hesabına avtomatik yazılır, ödənişlər qalıqdan çıxılır, hər müştərinin borcu və tarixçəsi dərhal görünür. Sistem anbar, FIFO maya dəyəri və hesabatlarla birlikdə işləyir; 14 gün pulsuz sınamaq olar. Mağaza üçün proqram seçimi haqqında: <a href="/blog-details/magaza-proqrami-anbar-pos-azerbaycanda-2026">Mağaza Proqramı, Anbar və POS</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Nisyə satışdan tamamilə imtina etmək lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Mütləq deyil. Nisyə satış daimi müştəriləri saxlayır. Əsas olan limit, ödəniş tarixi, dəqiq qeyd və mütəmadi nəzarətdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Müştəriyə borc limiti necə müəyyən edilir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yeni müştəri üçün kiçik limitlə başlayın, ödəniş intizamı yaxşı olduqca artırın. Limit müştərinin orta aylıq alışına və ödəniş tarixçəsinə əsaslanmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Borcu gecikən müştəriyə necə xatırlatmalı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Əvvəlcə nəzakətli SMS və ya WhatsApp mesajı, sonra şəxsi zəng. Uzun gecikmələrdə hissə-hissə ödəniş planı təklif etmək çox vaxt borcun qaytarılmasını sürətləndirir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kağız dəftəri rəqəmsala necə köçürmək olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Hər müştərinin cari qalığını açılış borcu kimi sistemə daxil edin, bundan sonrakı bütün nisyə satış və ödənişləri yalnız sistemdə qeyd edin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ödənilməyən böyük borc üçün nə etməli?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Sənədləşdirilmiş borclar üçün hüquqi yol mümkündür; konkret addımlar üçün hüquqşünasla məsləhətləşin. Ən yaxşı müdafiə isə böyük məbləğləri əvvəlcədən yazılı razılaşma və ya qaimə ilə rəsmiləşdirməkdir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Nisyə satış müştəri sədaqətinin aləti ola bilər, amma yalnız nəzarət altında. Limit, ödəniş tarixi, dəqiq qeyd və borcların yaşına görə izlənməsi itkiləri minimuma endirir. Rəqəmsal borc dəftəri bu işi kassanın içində avtomatik edir.</p>
<p><strong><a href="/mehsullar/rspos">RS POS haqqında ətraflı</a></strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>In neighbourhood shops, pharmacies, building-materials stores and wholesale, "put it on my tab, I'll pay when my salary comes" is everyday reality. Credit sales keep customers and lift revenue, but unmanaged they become a business's biggest cash leak: the notebook gets lost, amounts get mixed up, debts drag on for months, and the shop has no money left to pay suppliers.</p>
<p>This article covers the risks of credit sales, practical rules for managing customer debts and moving from a paper notebook to a digital debt book.</p>

<h2>The Hidden Costs of Credit Sales</h2>
<ul>
  <li><strong>Working capital gets frozen:</strong> Sales are made, but the cash isn't in the till — buying new stock gets harder.</li>
  <li><strong>Forgotten debts:</strong> Entries in a paper notebook get lost, written wrongly or become unreadable.</li>
  <li><strong>Disputes:</strong> "I already paid 50 manats" — without a record there's no proof.</li>
  <li><strong>Distorted profit:</strong> Credit sales look like revenue, but if the money hasn't arrived, the real picture is different.</li>
  <li><strong>Losing customers:</strong> Customers with growing debts often stop coming — you lose both the debt and the customer.</li>
</ul>

<h2>7 Rules for Managing Customer Debts</h2>
<ol>
  <li><strong>Set a limit per customer:</strong> For example, 50 AZN for a new customer, more for trusted regulars. When the limit is reached, no new credit.</li>
  <li><strong>Record every sale immediately:</strong> Date, amount, items — "I'll write it later" is the habit that loses the most money.</li>
  <li><strong>Set a payment date:</strong> "Payday", "the 10th of the month" — without a specific date, debts drag on.</li>
  <li><strong>Record partial payments separately:</strong> The remaining balance must always be clear.</li>
  <li><strong>Send regular reminders:</strong> A polite SMS or WhatsApp message is usually enough.</li>
  <li><strong>Track debt age:</strong> Put debts overdue by more than 30 days under separate control.</li>
  <li><strong>Document large amounts:</strong> For wholesale or large credit sales, keep a written agreement or invoice.</li>
</ol>

<h2>Debt Ageing</h2>
<p>Seeing how long debts have been unpaid tells you how to approach each customer. Example:</p>
<table>
  <thead>
    <tr><th>Age</th><th>Customers</th><th>Amount</th><th>Action</th></tr>
  </thead>
  <tbody>
    <tr><td>0–30 days</td><td>24</td><td>860 AZN</td><td>Normal — remind of the payment date</td></tr>
    <tr><td>31–60 days</td><td>9</td><td>540 AZN</td><td>Personal call, stop new credit</td></tr>
    <tr><td>61–90 days</td><td>4</td><td>310 AZN</td><td>Agree a payment plan</td></tr>
    <tr><td>90+ days</td><td>2</td><td>180 AZN</td><td>Close control, legal advice</td></tr>
  </tbody>
</table>
<p>Calculating this table from a paper notebook takes hours; in a digital debt book it's one click.</p>

<h2>Paper Notebook vs Digital Debt Book</h2>
<table>
  <thead>
    <tr><th>Criterion</th><th>Paper notebook</th><th>Digital (with POS)</th></tr>
  </thead>
  <tbody>
    <tr><td>Recording</td><td>Manual, after the fact</td><td>Automatic at the moment of sale</td></tr>
    <tr><td>Balance</td><td>Has to be calculated</td><td>Instantly per customer</td></tr>
    <tr><td>Limit control</td><td>From memory</td><td>Warning when the limit is reached</td></tr>
    <tr><td>Partial payments</td><td>Risk of confusion</td><td>Deducted automatically</td></tr>
    <tr><td>Reports</td><td>None</td><td>By age and by customer</td></tr>
    <tr><td>Risk of loss</td><td>Notebook can be lost or torn</td><td>Cloud backup</td></tr>
  </tbody>
</table>

<h2>Credit Sales and Profit</h2>
<p>Profit on credit sales is only real once the money arrives. That's why reports should show sales revenue and actual cash received separately. Correct profit also requires correct cost of goods — more: <a href="/blog-details/what-is-fifo-cost-method-2026">What Is FIFO Costing?</a></p>

<h2>The Debt Book in RS POS</h2>
<p>In <a href="/mehsullar/rspos">RS POS</a>, the cloud cash register system built by RS Code, the debt book lives inside the till: a credit sale is posted to the customer's account automatically, payments are deducted from the balance, and every customer's debt and history is visible instantly. It works together with inventory, FIFO costing and reports, with a 14-day free trial. On choosing store software: <a href="/blog-details/store-software-warehouse-pos-azerbaijan-2026">Store Software, Warehouse and POS</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should I stop selling on credit altogether?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Not necessarily. Credit sales keep regular customers. What matters is a limit, a payment date, accurate records and regular control.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do I set a customer's credit limit?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Start new customers with a small limit and raise it as their payment discipline proves good. Base the limit on the customer's average monthly purchases and payment history.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How should I remind a customer about an overdue debt?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Start with a polite SMS or WhatsApp message, then a personal call. For long delays, offering an instalment plan often speeds up repayment.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How do I move a paper notebook into a digital system?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Enter each customer's current balance as an opening debt, then record all further credit sales and payments only in the system.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What should I do about a large unpaid debt?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Documented debts can be pursued legally; consult a lawyer for the specific steps. The best protection is to formalise large amounts in advance with a written agreement or invoice.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>Credit sales can build customer loyalty — but only under control. Limits, payment dates, accurate records and tracking debts by age keep losses to a minimum. A digital debt book does this automatically inside the till.</p>
<p><strong><a href="/mehsullar/rspos">Learn more about RS POS</a></strong> or <a href="/contact">contact us</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>В магазинах у дома, аптеках, магазинах стройматериалов и в оптовой торговле фраза «запиши в долг, отдам с зарплаты» — повседневность. Продажи в долг удерживают клиентов и увеличивают оборот, но без контроля становятся главной утечкой денег: тетрадь теряется, суммы путаются, долги тянутся месяцами, а магазину нечем платить поставщикам.</p>
<p>В статье — риски продаж в долг, практические правила управления долгами клиентов и переход от бумажной тетради к цифровой долговой книге.</p>

<h2>Скрытые издержки продаж в долг</h2>
<ul>
  <li><strong>Замораживаются оборотные средства:</strong> продажа есть, а денег в кассе нет — закупать новый товар сложнее.</li>
  <li><strong>Забытые долги:</strong> записи в тетради теряются, пишутся с ошибками или становятся нечитаемыми.</li>
  <li><strong>Споры:</strong> «Я же отдал 50 манат» — нет записи, нет и доказательства.</li>
  <li><strong>Искажённая прибыль:</strong> продажа в долг выглядит как выручка, но если денег нет, реальная картина другая.</li>
  <li><strong>Потеря клиентов:</strong> клиент с растущим долгом часто перестаёт приходить — теряется и долг, и клиент.</li>
</ul>

<h2>7 правил управления долгами</h2>
<ol>
  <li><strong>Установите лимит каждому клиенту:</strong> например, 50 AZN для нового, больше — для надёжных постоянных. Лимит исчерпан — новых долгов нет.</li>
  <li><strong>Фиксируйте каждую продажу сразу:</strong> дата, сумма, товары — «запишу потом» приносит больше всего потерь.</li>
  <li><strong>Назначайте дату оплаты:</strong> «в день зарплаты», «10-го числа» — без конкретной даты долг затягивается.</li>
  <li><strong>Отдельно учитывайте частичные оплаты:</strong> остаток всегда должен быть понятен.</li>
  <li><strong>Регулярно напоминайте:</strong> вежливого SMS или сообщения в WhatsApp чаще всего достаточно.</li>
  <li><strong>Следите за возрастом долгов:</strong> долги с просрочкой более 30 дней — под отдельный контроль.</li>
  <li><strong>Оформляйте крупные суммы документально:</strong> для оптовых и крупных продаж в долг храните письменное соглашение или накладную.</li>
</ol>

<h2>Возрастная структура долгов</h2>
<p>Срок неоплаты подсказывает, как говорить с каждым клиентом. Пример:</p>
<table>
  <thead>
    <tr><th>Срок</th><th>Клиентов</th><th>Сумма</th><th>Действие</th></tr>
  </thead>
  <tbody>
    <tr><td>0–30 дней</td><td>24</td><td>860 AZN</td><td>Норма — напомнить о дате оплаты</td></tr>
    <tr><td>31–60 дней</td><td>9</td><td>540 AZN</td><td>Личный звонок, стоп новым долгам</td></tr>
    <tr><td>61–90 дней</td><td>4</td><td>310 AZN</td><td>Согласовать график оплаты</td></tr>
    <tr><td>90+ дней</td><td>2</td><td>180 AZN</td><td>Строгий контроль, юридическая консультация</td></tr>
  </tbody>
</table>
<p>По бумажной тетради такую таблицу считать часами, в цифровой долговой книге — один клик.</p>

<h2>Бумажная тетрадь или цифровая долговая книга</h2>
<table>
  <thead>
    <tr><th>Критерий</th><th>Тетрадь</th><th>Цифровая (с POS)</th></tr>
  </thead>
  <tbody>
    <tr><td>Запись</td><td>Вручную, позже</td><td>Автоматически в момент продажи</td></tr>
    <tr><td>Остаток</td><td>Нужно считать</td><td>Сразу по каждому клиенту</td></tr>
    <tr><td>Контроль лимита</td><td>По памяти</td><td>Предупреждение при достижении лимита</td></tr>
    <tr><td>Частичные оплаты</td><td>Риск путаницы</td><td>Вычитаются автоматически</td></tr>
    <tr><td>Отчёты</td><td>Нет</td><td>По возрасту и по клиентам</td></tr>
    <tr><td>Риск потери</td><td>Тетрадь можно потерять или порвать</td><td>Облачная резервная копия</td></tr>
  </tbody>
</table>

<h2>Продажи в долг и прибыль</h2>
<p>Прибыль с продажи в долг реальна только после поступления денег. Поэтому в отчётах важно отдельно видеть выручку и фактические поступления. Для правильной прибыли нужна и правильная себестоимость — подробнее: <a href="/blog-details/chto-takoe-fifo-sebestoimost-2026">Что такое себестоимость FIFO?</a></p>

<h2>Долговая книга в RS POS</h2>
<p>В облачной кассовой системе <a href="/mehsullar/rspos">RS POS</a> от RS Code долговая книга встроена в кассу: продажа в долг автоматически записывается на счёт клиента, оплаты вычитаются из остатка, долг и история каждого клиента видны сразу. Система работает вместе со складом, себестоимостью FIFO и отчётами; 14 дней бесплатно. О выборе программы для магазина: <a href="/blog-details/programma-magazin-sklad-pos-azerbajdzan-2026">Программа для магазина, склад и POS</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли полностью отказаться от продаж в долг?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Не обязательно. Продажи в долг удерживают постоянных клиентов. Главное — лимит, дата оплаты, точный учёт и регулярный контроль.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как определить кредитный лимит клиента?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Начните с небольшого лимита для нового клиента и увеличивайте его по мере хорошей платёжной дисциплины. Лимит должен опираться на средние покупки клиента в месяц и историю оплат.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как напомнить клиенту о просроченном долге?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Сначала вежливое SMS или сообщение в WhatsApp, затем личный звонок. При долгой просрочке предложение графика оплаты частями часто ускоряет возврат долга.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как перенести бумажную тетрадь в цифровую систему?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Внесите текущий остаток каждого клиента как начальный долг, а все последующие продажи в долг и оплаты фиксируйте только в системе.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что делать с крупным неоплаченным долгом?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Документально оформленные долги можно взыскивать в правовом порядке; за конкретными шагами обратитесь к юристу. Лучшая защита — заранее оформлять крупные суммы письменным соглашением или накладной.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Продажи в долг могут укреплять лояльность клиентов — но только под контролем. Лимиты, даты оплаты, точный учёт и контроль долгов по возрасту сводят потери к минимуму. Цифровая долговая книга делает это автоматически прямо в кассе.</p>
<p><strong><a href="/mehsullar/rspos">Подробнее о RS POS</a></strong> или <a href="/kontakty">свяжитесь с нами</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'nisye-satis-borc-defteri-2026'],
            [
                'slug_en' => 'customer-debt-book-credit-sales-2026',
                'slug_ru' => 'prodazhi-v-dolg-dolgovaya-kniga-2026',

                'title_az' => 'Nisyə Satış və Borc Dəftəri: Müştəri Borclarını Necə İdarə Etməli? 2026',
                'title_en' => 'Credit Sales and the Debt Book: How to Manage Customer Debts 2026',
                'title_ru' => 'Продажи в долг и долговая книга: как управлять долгами клиентов 2026',

                'review_az' => 'Nisyə satış müştərini saxlayır, amma nəzarətsiz qalanda pul itkisinə çevrilir. Borcları idarə etməyin 7 qaydası, borcların yaşa görə bölgüsü və kağız dəftərdən rəqəmsal borc dəftərinə keçid.',
                'review_en' => 'Credit sales keep customers, but unmanaged they become a cash leak. 7 rules for managing customer debts, debt ageing, and moving from a paper notebook to a digital debt book.',
                'review_ru' => 'Продажи в долг удерживают клиентов, но без контроля превращаются в потерю денег. 7 правил управления долгами, возрастная структура долгов и переход от тетради к цифровой долговой книге.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '3 Oktyabr 2026',
                'date_en' => 'October 3, 2026',
                'date_ru' => '3 Октября 2026',

                'photo'    => 'cover-borc-defteri-az.png',
                'photo_en' => 'cover-borc-defteri-en.png',
                'photo_ru' => 'cover-borc-defteri-ru.png',

                'meta_title_az' => 'Nisyə Satış və Borc Dəftəri: Borcları İdarə Etmək | RS Code',
                'meta_title_en' => 'Credit Sales & Debt Book: Manage Customer Debts | RS Code',
                'meta_title_ru' => 'Продажи в долг и долговая книга магазина | RS Code',

                'meta_description_az' => 'Mağazada nisyə satış və müştəri borclarını necə idarə etməli? Limit, ödəniş tarixi, borcların yaşa görə izlənməsi və rəqəmsal borc dəftəri. Praktik 2026 bələdçisi.',
                'meta_description_en' => 'How to manage credit sales and customer debts in a shop: limits, payment dates, debt ageing and a digital debt book. A practical 2026 guide.',
                'meta_description_ru' => 'Как управлять продажами в долг и долгами клиентов в магазине: лимиты, даты оплаты, возраст долгов и цифровая долговая книга. Практический гид 2026.',

                'meta_keywords_az' => 'nisyə satış, borc dəftəri, müştəri borcları, borc dəftəri proqramı, mağaza borc uçotu, POS borc dəftəri 2026',
                'meta_keywords_en' => 'credit sales, debt book, customer debts, debt book app, shop debt tracking, POS debt book 2026',
                'meta_keywords_ru' => 'продажи в долг, долговая книга, долги клиентов, программа учёта долгов, учёт долгов магазина, POS 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
