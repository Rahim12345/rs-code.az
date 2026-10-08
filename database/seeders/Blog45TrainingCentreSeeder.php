<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog45TrainingCentreSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Tədris mərkəzi böyüdükcə idarəetmə çətinləşir: zəng edən valideynlərin qeydi itir, eyni otağa iki qrup yazılır, kimin ödəniş etmədiyi ay sonunda bilinir, müəllim əməkhaqqı Excel-də saatlarla hesablanır, filiallardan hesabat isə WhatsApp-da gəlir. 5–10 müəllim, onlarla qrup və yüzlərlə tələbə olanda bu iş artıq cədvəllərlə idarə olunmur.</p>
<p>Bu yazıda tədris mərkəzinin əsas idarəetmə problemlərini, proqramda olmalı modulları, hazır və fərdi sistem seçimini və keçidin necə edilməsini izah edirik.</p>

<h2>Tədris Mərkəzlərinin 6 Tipik Problemi</h2>
<ul>
  <li><strong>İtən müraciətlər:</strong> Instagram, zəng və WhatsApp-dan gələn maraqlananlar qeyd olunmur, geri zəng unudulur.</li>
  <li><strong>Cədvəl toqquşmaları:</strong> Eyni otaq və ya eyni müəllim eyni saata iki qrupa yazılır.</li>
  <li><strong>Ödəniş və borclar:</strong> Aylıq ödənişlər, endirimlər, hissə-hissə ödəniş — kim nə qədər borcludur, aydın deyil.</li>
  <li><strong>Müəllim əməkhaqqı:</strong> Saatla, faizlə və ya sabit — hər ay əl ilə hesablamaq səhvə yol açır.</li>
  <li><strong>Filiallar arasında görünməzlik:</strong> Rəhbər hansı filialın nə qədər qazandığını real vaxtda görmür.</li>
  <li><strong>Valideyn ünsiyyəti:</strong> Davamiyyət, nəticələr və ödəniş xatırlatmaları əl ilə göndərilir.</li>
</ul>

<h2>İdarəetmə Proqramında Olmalı Modullar</h2>
<table>
  <thead>
    <tr><th>Modul</th><th>Nə edir</th></tr>
  </thead>
  <tbody>
    <tr><td>CRM / müraciətlər</td><td>Maraqlananları mənbə ilə qeyd edir, sınaq dərsinə yazılış, geri zəng xatırlatması</td></tr>
    <tr><td>Qəbul və qruplar</td><td>Tələbəni qrupa yazmaq, səviyyə, fənn, qrup doluluğu</td></tr>
    <tr><td>Cədvəl və otaqlar</td><td>Müəllim və otaq toqquşmalarını avtomatik yoxlayan həftəlik cədvəl</td></tr>
    <tr><td>Davamiyyət</td><td>Dərsdə bir kliklə qeyd, buraxılan dərslərin statistikası</td></tr>
    <tr><td>Ödənişlər və borclar</td><td>Aylıq haqqlar, endirimlər, qəbzlər, gecikən ödənişlər siyahısı</td></tr>
    <tr><td>Müəllim əməkhaqqı</td><td>Keçirilən dərslərə əsasən saat, faiz və ya sabit hesablanma</td></tr>
    <tr><td>Filiallar</td><td>Hər filial üzrə ayrıca qruplar, kassa və hesabat, mərkəzi nəzarət</td></tr>
    <tr><td>Hesabatlar</td><td>Gəlir, xərc, yeni tələbələr, tələbə itkisi, müəllim yükü</td></tr>
    <tr><td>Kabinetlər və bildirişlər</td><td>Tələbə/valideyn kabineti, SMS və ya WhatsApp xatırlatmaları</td></tr>
  </tbody>
</table>

<h2>Rəhbər Üçün Ən Vacib 6 Göstərici</h2>
<ol>
  <li><strong>Aylıq gəlir və toplanmayan ödənişlər</strong> — real pul axını.</li>
  <li><strong>Müraciətdən qeydiyyata çevrilmə faizi</strong> — reklam və satışın effektivliyi.</li>
  <li><strong>Tələbə itkisi (churn)</strong> — neçə tələbə kursu yarımçıq tərk edir.</li>
  <li><strong>Qrup doluluğu</strong> — boş yerlər itirilmiş gəlirdir.</li>
  <li><strong>Müəllim yükü və maaş fondu</strong> — gəlirlə müqayisədə.</li>
  <li><strong>Filiallar üzrə müqayisə</strong> — hansı filial daha gəlirlidir.</li>
</ol>

<h2>Hazır Proqram, yoxsa Fərdi Sistem?</h2>
<table>
  <thead>
    <tr><th>Meyar</th><th>Hazır platforma</th><th>Fərdi (sifarişlə) sistem</th></tr>
  </thead>
  <tbody>
    <tr><td>Başlanğıc</td><td>Tez, abunə ilə</td><td>Hazırlanma vaxtı tələb edir</td></tr>
    <tr><td>Uyğunlaşma</td><td>Platformanın imkanları ilə məhdud</td><td>Mərkəzin prosesinə tam uyğun</td></tr>
    <tr><td>Əməkhaqqı qaydaları</td><td>Standart variantlar</td><td>İstənilən mürəkkəb qayda</td></tr>
    <tr><td>Filial və inteqrasiya</td><td>Tarifdən asılı</td><td>Bank, SMS, sayt, 1C — istənilən</td></tr>
    <tr><td>Məlumatların sahibi</td><td>Platforma</td><td>Siz</td></tr>
  </tbody>
</table>
<p>Fərdi müəllimlər və kiçik qruplar üçün hazır həll kifayətdir — məsələn, müəllimin öz səhifəsi, qruplar, sınaqlar və ödəniş izləməsi olan <a href="/mehsullar/kursometr">Kursometr</a>. Çox filiallı, özünəməxsus maliyyə və əməkhaqqı qaydaları olan mərkəz üçün isə fərdi sistem uzunmüddətli daha sərfəlidir. Fərdi müəllimlər üçün ayrıca bələdçi: <a href="/blog-details/repetitor-ders-idareetme-proqrami-2026">Repetitorlar üçün Dərs İdarəetməsi</a>. Onlayn tədris platformalarının qiymətləri: <a href="/blog-details/lms-sistemi-qiymeti-azerbaycanda-2026">LMS Sistemi Qiyməti 2026</a>.</p>

<h2>Proqrama Keçid: 5 Addım</h2>
<ol>
  <li><strong>Prosesləri yazın:</strong> Qəbul, ödəniş, endirim və əməkhaqqı qaydalarınızı kağıza köçürün — proqram onlara uyğun qurulmalıdır.</li>
  <li><strong>Məlumatları hazırlayın:</strong> Tələbə, qrup, müəllim siyahıları və cari borclar — Excel-dən idxal olunur.</li>
  <li><strong>Bir filialla başlayın:</strong> Pilot mərhələ səhvləri tez tapmağa kömək edir.</li>
  <li><strong>İşçiləri öyrədin:</strong> Administrator və müəllimlər üçün qısa təlim.</li>
  <li><strong>Köhnə üsuldan tam imtina edin:</strong> Paralel Excel saxlamaq qarışıqlığı uzadır.</li>
</ol>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tədris mərkəzi üçün proqram nə vaxt lazımdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bir neçə müəllim, onlarla qrup və yüzə yaxın tələbə olduqda, ödəniş və cədvəl Excel-də idarə olunmaz hala gəlir. Filial açmaq planı varsa, proqram əvvəlcədən qurulmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Proqram müəllim əməkhaqqını hesablaya bilərmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Keçirilən dərslər əsasında saatlıq, faizlə və ya sabit əməkhaqqı avtomatik hesablanır; fərdi sistemdə mərkəzin özünəməxsus qaydaları da qurula bilər.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Bir neçə filialı bir sistemdən idarə etmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Hər filialın öz qrupları, kassası və hesabatı olur, rəhbər isə bütün filialları bir paneldə müqayisəli görür.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Mövcud Excel məlumatlarını köçürmək mümkündürmü?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Tələbə, qrup, müəllim siyahıları və cari borclar Excel-dən idxal olunur ki, iş sıfırdan başlamasın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tədris mərkəzimiz üçün fərdi sistem hazırlaya bilərsinizmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. RS Code tədris mərkəzləri üçün CRM, cədvəl, ödəniş, əməkhaqqı, filial və kabinet modullarını əhatə edən fərdi idarəetmə sistemləri hazırlayır.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Tədris mərkəzinin böyüməsi yaxşı dərsdən çox, yaxşı idarəetmədən asılıdır: itməyən müraciətlər, toqquşmayan cədvəl, vaxtında toplanan ödənişlər, düzgün hesablanan əməkhaqqı və şəffaf filial hesabatları. Bunları bir sistemə toplamaq rəhbərin vaxtını strategiyaya azad edir.</p>
<p><strong>Tədris mərkəziniz üçün sistem haqqında <a href="/elaqe">bizə yazın</a></strong>. CRM-in ümumi rolu üçün: <a href="/blog-details/crm-erp-sistemleri-azerbaycanda-2026">CRM və ERP Sistemləri</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>As a training centre grows, management gets harder: calls from parents go unrecorded, two groups are booked into the same room, unpaid fees only surface at month end, teacher pay takes hours in Excel, and branch reports arrive via WhatsApp. With 5–10 teachers, dozens of groups and hundreds of students, spreadsheets no longer cope.</p>
<p>This article covers the main management problems of training centres, the modules management software should include, choosing between ready-made and custom systems, and how to make the switch.</p>

<h2>6 Typical Problems of Training Centres</h2>
<ul>
  <li><strong>Lost enquiries:</strong> Leads from Instagram, calls and WhatsApp aren't recorded and call-backs are forgotten.</li>
  <li><strong>Schedule clashes:</strong> The same room or teacher is booked for two groups at once.</li>
  <li><strong>Payments and debts:</strong> Monthly fees, discounts, instalments — who owes what is unclear.</li>
  <li><strong>Teacher pay:</strong> Hourly, percentage or fixed — calculating it by hand every month invites errors.</li>
  <li><strong>No visibility across branches:</strong> Management can't see each branch's earnings in real time.</li>
  <li><strong>Parent communication:</strong> Attendance, results and payment reminders are sent manually.</li>
</ul>

<h2>Modules Management Software Should Include</h2>
<table>
  <thead>
    <tr><th>Module</th><th>What it does</th></tr>
  </thead>
  <tbody>
    <tr><td>CRM / enquiries</td><td>Records leads with their source, books trial lessons, reminds about call-backs</td></tr>
    <tr><td>Admissions and groups</td><td>Enrols students into groups by level and subject, tracks group capacity</td></tr>
    <tr><td>Schedule and rooms</td><td>A weekly timetable that automatically checks teacher and room clashes</td></tr>
    <tr><td>Attendance</td><td>One-click marking in class, statistics on missed lessons</td></tr>
    <tr><td>Payments and debts</td><td>Monthly fees, discounts, receipts, list of overdue payments</td></tr>
    <tr><td>Teacher pay</td><td>Hourly, percentage or fixed pay calculated from lessons delivered</td></tr>
    <tr><td>Branches</td><td>Separate groups, till and reports per branch, with central control</td></tr>
    <tr><td>Reports</td><td>Revenue, expenses, new students, student churn, teacher workload</td></tr>
    <tr><td>Portals and notifications</td><td>Student/parent portal, SMS or WhatsApp reminders</td></tr>
  </tbody>
</table>

<h2>The 6 Most Important Metrics for Management</h2>
<ol>
  <li><strong>Monthly revenue and uncollected fees</strong> — the real cash flow.</li>
  <li><strong>Enquiry-to-enrolment conversion</strong> — how effective ads and sales are.</li>
  <li><strong>Student churn</strong> — how many students drop out mid-course.</li>
  <li><strong>Group occupancy</strong> — empty seats are lost revenue.</li>
  <li><strong>Teacher workload and payroll</strong> — compared with revenue.</li>
  <li><strong>Branch comparison</strong> — which branch is most profitable.</li>
</ol>

<h2>Ready-Made Software or a Custom System?</h2>
<table>
  <thead>
    <tr><th>Criterion</th><th>Ready-made platform</th><th>Custom system</th></tr>
  </thead>
  <tbody>
    <tr><td>Getting started</td><td>Fast, by subscription</td><td>Requires development time</td></tr>
    <tr><td>Fit</td><td>Limited to the platform's features</td><td>Fully matched to the centre's processes</td></tr>
    <tr><td>Pay rules</td><td>Standard options</td><td>Any complex rule</td></tr>
    <tr><td>Branches and integrations</td><td>Depends on the plan</td><td>Bank, SMS, website, 1C — anything</td></tr>
    <tr><td>Data ownership</td><td>The platform</td><td>You</td></tr>
  </tbody>
</table>
<p>For individual teachers and small groups a ready-made solution is enough — for example <a href="/mehsullar/kursometr">Kursometr</a>, with a teacher's own page, groups, tests and payment tracking. For a multi-branch centre with its own finance and pay rules, a custom system is more cost-effective in the long run. A separate guide for individual teachers: <a href="/blog-details/tutor-class-management-software-2026">Class Management for Tutors</a>. Online learning platform prices: <a href="/blog-details/lms-system-cost-azerbaijan-2026">LMS System Cost 2026</a>.</p>

<h2>Switching to Software: 5 Steps</h2>
<ol>
  <li><strong>Write down your processes:</strong> Admissions, payment, discount and pay rules — the software must be set up around them.</li>
  <li><strong>Prepare your data:</strong> Student, group and teacher lists plus current debts — imported from Excel.</li>
  <li><strong>Start with one branch:</strong> A pilot phase helps find problems quickly.</li>
  <li><strong>Train your staff:</strong> A short training for administrators and teachers.</li>
  <li><strong>Drop the old method completely:</strong> Keeping a parallel Excel prolongs the confusion.</li>
</ol>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">When does a training centre need management software?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">With several teachers, dozens of groups and around a hundred students, payments and schedules become unmanageable in Excel. If you plan to open a branch, set up software beforehand.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can the software calculate teacher pay?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Hourly, percentage or fixed pay is calculated automatically from the lessons delivered; a custom system can also handle a centre's specific rules.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can several branches be managed from one system?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Each branch has its own groups, till and reports, while management sees all branches side by side in one dashboard.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can existing Excel data be migrated?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Student, group and teacher lists and current debts are imported from Excel so you don't start from scratch.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can you build a custom system for our training centre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. RS Code builds custom management systems for training centres covering CRM, scheduling, payments, teacher pay, branches and portals.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>A training centre's growth depends on good management as much as good teaching: no lost enquiries, no schedule clashes, fees collected on time, pay calculated correctly and transparent branch reports. Bringing all of this into one system frees management to focus on strategy.</p>
<p><strong><a href="/contact">Contact us</a> about a system for your training centre</strong>. On the general role of CRM: <a href="/blog-details/crm-erp-systems-azerbaijan-2026">CRM and ERP Systems</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>По мере роста учебного центра управлять им всё сложнее: звонки родителей не фиксируются, в один кабинет записывают две группы, кто не заплатил, выясняется в конце месяца, зарплата преподавателей часами считается в Excel, а отчёты филиалов приходят в WhatsApp. При 5–10 преподавателях, десятках групп и сотнях учеников таблицы уже не справляются.</p>
<p>В статье — основные управленческие проблемы учебных центров, модули, которые должны быть в программе, выбор между готовым и индивидуальным решением и порядок перехода.</p>

<h2>6 типичных проблем учебных центров</h2>
<ul>
  <li><strong>Потерянные обращения:</strong> заявки из Instagram, звонков и WhatsApp не фиксируются, перезвонить забывают.</li>
  <li><strong>Накладки в расписании:</strong> один кабинет или преподаватель записан на две группы одновременно.</li>
  <li><strong>Оплаты и долги:</strong> ежемесячные платежи, скидки, оплата частями — непонятно, кто сколько должен.</li>
  <li><strong>Зарплата преподавателей:</strong> почасовая, процентная или фиксированная — ручной расчёт каждый месяц ведёт к ошибкам.</li>
  <li><strong>Нет прозрачности по филиалам:</strong> руководитель не видит в реальном времени, сколько зарабатывает каждый филиал.</li>
  <li><strong>Общение с родителями:</strong> посещаемость, результаты и напоминания об оплате отправляются вручную.</li>
</ul>

<h2>Модули, которые должны быть в программе</h2>
<table>
  <thead>
    <tr><th>Модуль</th><th>Что делает</th></tr>
  </thead>
  <tbody>
    <tr><td>CRM / обращения</td><td>Фиксирует заявки с источником, запись на пробный урок, напоминание перезвонить</td></tr>
    <tr><td>Набор и группы</td><td>Зачисление в группу по уровню и предмету, заполненность групп</td></tr>
    <tr><td>Расписание и кабинеты</td><td>Недельное расписание с автоматической проверкой накладок преподавателей и кабинетов</td></tr>
    <tr><td>Посещаемость</td><td>Отметка на уроке в один клик, статистика пропусков</td></tr>
    <tr><td>Оплаты и долги</td><td>Ежемесячные платежи, скидки, квитанции, список просрочек</td></tr>
    <tr><td>Зарплата преподавателей</td><td>Почасовой, процентный или фиксированный расчёт по проведённым урокам</td></tr>
    <tr><td>Филиалы</td><td>Свои группы, касса и отчёты у каждого филиала, центральный контроль</td></tr>
    <tr><td>Отчёты</td><td>Доходы, расходы, новые ученики, отток, нагрузка преподавателей</td></tr>
    <tr><td>Кабинеты и уведомления</td><td>Кабинет ученика/родителя, напоминания по SMS или WhatsApp</td></tr>
  </tbody>
</table>

<h2>6 ключевых показателей для руководителя</h2>
<ol>
  <li><strong>Месячная выручка и несобранные платежи</strong> — реальный денежный поток.</li>
  <li><strong>Конверсия из обращения в запись</strong> — эффективность рекламы и продаж.</li>
  <li><strong>Отток учеников</strong> — сколько бросают курс на полпути.</li>
  <li><strong>Заполненность групп</strong> — пустые места — потерянный доход.</li>
  <li><strong>Нагрузка и фонд оплаты преподавателей</strong> — в сравнении с выручкой.</li>
  <li><strong>Сравнение филиалов</strong> — какой филиал прибыльнее.</li>
</ol>

<h2>Готовая программа или индивидуальная система?</h2>
<table>
  <thead>
    <tr><th>Критерий</th><th>Готовая платформа</th><th>Индивидуальная система</th></tr>
  </thead>
  <tbody>
    <tr><td>Старт</td><td>Быстро, по подписке</td><td>Нужно время на разработку</td></tr>
    <tr><td>Соответствие процессам</td><td>Ограничено возможностями платформы</td><td>Полностью под процессы центра</td></tr>
    <tr><td>Правила зарплаты</td><td>Стандартные варианты</td><td>Любые сложные правила</td></tr>
    <tr><td>Филиалы и интеграции</td><td>Зависит от тарифа</td><td>Банк, SMS, сайт, 1С — любые</td></tr>
    <tr><td>Владелец данных</td><td>Платформа</td><td>Вы</td></tr>
  </tbody>
</table>
<p>Для частных преподавателей и небольших групп достаточно готового решения — например, <a href="/mehsullar/kursometr">Kursometr</a> с личной страницей преподавателя, группами, тестами и учётом оплат. Для центра с несколькими филиалами и собственными правилами финансов и зарплат в долгосрочной перспективе выгоднее индивидуальная система. Отдельный гид для частных преподавателей: <a href="/blog-details/programma-dlya-repetitorov-2026">Управление занятиями для репетиторов</a>. Цены на платформы онлайн-обучения: <a href="/blog-details/stoimost-lms-sistemy-azerbajdzan-2026">Стоимость LMS-системы 2026</a>.</p>

<h2>Переход на программу: 5 шагов</h2>
<ol>
  <li><strong>Опишите процессы:</strong> правила набора, оплат, скидок и зарплат — программа настраивается под них.</li>
  <li><strong>Подготовьте данные:</strong> списки учеников, групп, преподавателей и текущие долги — импортируются из Excel.</li>
  <li><strong>Начните с одного филиала:</strong> пилотный этап помогает быстро найти ошибки.</li>
  <li><strong>Обучите сотрудников:</strong> короткое обучение для администраторов и преподавателей.</li>
  <li><strong>Полностью откажитесь от старого способа:</strong> параллельный Excel затягивает путаницу.</li>
</ol>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда учебному центру нужна программа управления?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Когда есть несколько преподавателей, десятки групп и около сотни учеников, оплаты и расписание в Excel становятся неуправляемыми. Если планируете открыть филиал, программу стоит внедрить заранее.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Может ли программа считать зарплату преподавателей?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Почасовая, процентная или фиксированная зарплата рассчитывается автоматически по проведённым урокам; в индивидуальной системе можно настроить и особые правила центра.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли управлять несколькими филиалами из одной системы?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. У каждого филиала свои группы, касса и отчёты, а руководитель видит все филиалы в сравнении на одной панели.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли перенести данные из Excel?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Списки учеников, групп, преподавателей и текущие долги импортируются из Excel, чтобы не начинать с нуля.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можете ли вы сделать индивидуальную систему для нашего центра?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. RS Code разрабатывает индивидуальные системы управления для учебных центров: CRM, расписание, оплаты, зарплаты, филиалы и личные кабинеты.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Рост учебного центра зависит не только от хороших уроков, но и от хорошего управления: ни одной потерянной заявки, расписание без накладок, оплаты вовремя, правильно рассчитанные зарплаты и прозрачные отчёты филиалов. Собрав всё это в одной системе, руководитель освобождает время для стратегии.</p>
<p><strong><a href="/kontakty">Напишите нам</a> о системе для вашего учебного центра</strong>. Об общей роли CRM: <a href="/blog-details/crm-erp-sistemy-azerbajdzan-2026">CRM и ERP системы</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'tedris-merkezi-idareetme-proqrami-2026'],
            [
                'slug_en' => 'training-centre-management-software-2026',
                'slug_ru' => 'programma-dlya-uchebnogo-centra-2026',

                'title_az' => 'Tədris Mərkəzi üçün İdarəetmə Proqramı: Qeydiyyatdan Maliyyəyə 2026',
                'title_en' => 'Training Centre Management Software: From Admissions to Finance 2026',
                'title_ru' => 'Программа для учебного центра: от набора до финансов 2026',

                'review_az' => 'Tədris mərkəzlərinin 6 tipik problemi, proqramda olmalı 9 modul (CRM, cədvəl, ödəniş, müəllim əməkhaqqı, filiallar), rəhbər üçün 6 göstərici və hazır vs fərdi sistem seçimi.',
                'review_en' => '6 typical problems of training centres, 9 modules software should include (CRM, scheduling, payments, teacher pay, branches), 6 metrics for management and ready-made vs custom systems.',
                'review_ru' => '6 типичных проблем учебных центров, 9 модулей программы (CRM, расписание, оплаты, зарплата преподавателей, филиалы), 6 показателей для руководителя и выбор готового или индивидуального решения.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '8 Oktyabr 2026',
                'date_en' => 'October 8, 2026',
                'date_ru' => '8 Октября 2026',

                'photo'    => 'cover-tedris-merkezi-az.png',
                'photo_en' => 'cover-tedris-merkezi-en.png',
                'photo_ru' => 'cover-tedris-merkezi-ru.png',

                'meta_title_az' => 'Tədris Mərkəzi üçün İdarəetmə Proqramı 2026 | RS Code',
                'meta_title_en' => 'Training Centre Management Software 2026 | RS Code',
                'meta_title_ru' => 'Программа для учебного центра 2026 | RS Code',

                'meta_description_az' => 'Tədris mərkəzi üçün proqram: müraciətlər (CRM), qruplar, cədvəl və otaqlar, ödəniş və borclar, müəllim əməkhaqqı, filiallar və hesabatlar. Hazır və fərdi sistem müqayisəsi.',
                'meta_description_en' => 'Training centre software: enquiries (CRM), groups, schedule and rooms, payments and debts, teacher pay, branches and reports. Ready-made vs custom systems compared.',
                'meta_description_ru' => 'Программа для учебного центра: заявки (CRM), группы, расписание и кабинеты, оплаты и долги, зарплата преподавателей, филиалы и отчёты. Готовое или индивидуальное решение.',

                'meta_keywords_az' => 'tədris mərkəzi proqramı, kurs idarəetmə sistemi, tədris mərkəzi CRM, müəllim əməkhaqqı hesablanması, kurs cədvəli proqramı 2026',
                'meta_keywords_en' => 'training centre software, course management system, training centre CRM, teacher payroll, class scheduling software 2026',
                'meta_keywords_ru' => 'программа для учебного центра, CRM для учебного центра, система управления курсами, зарплата преподавателей, расписание занятий 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
