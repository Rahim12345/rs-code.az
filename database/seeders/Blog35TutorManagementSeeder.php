<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog35TutorManagementSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Azərbaycanda minlərlə repetitor və kurs müəllimi hər gün eyni işi görür: WhatsApp qruplarında dərs saatını xatırladır, davamiyyəti dəftərə yazır, sınaq nəticələrini Excel-də hesablayır, kimin ödəniş etmədiyini yaddaşında saxlayır, valideynlərin "uşağım necə oxuyur?" sualına tək-tək cavab verir. Tələbə sayı 20-ni keçəndən sonra bu sistem çökməyə başlayır: mesajlar itir, ödənişlər unudulur, müəllim dərsdən çox inzibati işə vaxt sərf edir.</p>
<p>Bu yazıda WhatsApp və Excel ilə işləməyin real problemlərini, dərs idarəetmə platformasında nələrin olmalı olduğunu və keçidi necə etməyi izah edirik.</p>

<h2>WhatsApp və Excel ilə İşləməyin 6 Problemi</h2>
<ul>
  <li><strong>Məlumat dağınıqdır:</strong> Cədvəl bir qrupda, ev tapşırığı başqa çatda, nəticələr Excel-də, ödənişlər dəftərdə.</li>
  <li><strong>Davamiyyət qeydi çətindir:</strong> Hər dərsdə əl ilə yazmaq, ay sonunda saymaq vaxt aparır.</li>
  <li><strong>Sınaq nəticələri gecikir:</strong> Kağız testləri yoxlamaq, balları hesablamaq, reytinq çıxarmaq saatlarla vaxt alır.</li>
  <li><strong>Ödənişlər unudulur:</strong> Kimin hansı ay üçün ödədiyini izləmək çətinləşir, narahat edən "xatırlatma" söhbətləri yaranır.</li>
  <li><strong>Valideynlər məlumatsızdır:</strong> Hər valideynə ayrıca yazmaq mümkün deyil, nəticədə etibar azalır.</li>
  <li><strong>Peşəkar görünüş yoxdur:</strong> Yeni tələbə üçün müəllimin öz səhifəsi, kurs proqramı və nəticələri görünmür.</li>
</ul>

<h2>Dərs İdarəetmə Platformasında Nələr Olmalıdır?</h2>
<table>
  <thead>
    <tr><th>Funksiya</th><th>Nəyi həll edir</th></tr>
  </thead>
  <tbody>
    <tr><td>Qruplar və dərs cədvəli</td><td>Fənn, qrup və həftəlik cədvəl bir yerdə; tələbə dərs saatını özü görür</td></tr>
    <tr><td>Davamiyyət</td><td>Hər dərsdə bir kliklə qeyd, ay üzrə avtomatik statistika</td></tr>
    <tr><td>Vaxtlı sınaqlar</td><td>Onlayn test, avtomatik yoxlama, bal və reytinq</td></tr>
    <tr><td>Ev tapşırıqları</td><td>Tapşırığın verilməsi, təhvili və yoxlanması</td></tr>
    <tr><td>Ödəniş izləmə</td><td>Kim ödəyib, kim gecikir — bir baxışda</td></tr>
    <tr><td>Valideyn kabineti</td><td>Valideyn davamiyyət və nəticələri özü izləyir</td></tr>
    <tr><td>Müəllimin öz səhifəsi</td><td>Kurslar, qruplar və əlaqə — peşəkar vizit kart</td></tr>
  </tbody>
</table>

<h2>Kimlər Üçün Uyğundur?</h2>
<ul>
  <li><strong>Fərdi repetitorlar:</strong> Abituriyent, məktəbli və ya dil hazırlığı keçən müəllimlər.</li>
  <li><strong>Kiçik tədris mərkəzləri:</strong> 2–10 müəllim, bir neçə fənn və onlarla qrup.</li>
  <li><strong>Onlayn dərs keçən müəllimlər:</strong> Zoom/Meet dərslərini cədvəl və sınaqlarla birləşdirmək istəyənlər.</li>
  <li><strong>İmtahan hazırlığı:</strong> Mütəmadi sınaq keçirib tələbənin irəliləyişini ölçmək lazım olanlar.</li>
</ul>

<h2>Excel vs Platforma: Real Müqayisə</h2>
<table>
  <thead>
    <tr><th>Tapşırıq</th><th>WhatsApp + Excel</th><th>Platforma</th></tr>
  </thead>
  <tbody>
    <tr><td>Davamiyyət</td><td>Əl ilə, ay sonu hesablama</td><td>Bir klik, avtomatik statistika</td></tr>
    <tr><td>25 suallıq sınaq</td><td>Kağız, əl ilə yoxlama</td><td>Onlayn, avtomatik bal</td></tr>
    <tr><td>Ödəniş nəzarəti</td><td>Dəftər və yaddaş</td><td>Hər tələbə üzrə status</td></tr>
    <tr><td>Valideynə hesabat</td><td>Hər birinə ayrıca mesaj</td><td>Valideyn kabinetdə özü baxır</td></tr>
    <tr><td>Yeni tələbə cəlbi</td><td>Tanışlıq və Instagram</td><td>Müəllimin öz səhifəsi + tövsiyə</td></tr>
  </tbody>
</table>

<h2>Platformaya Keçid: 5 Addım</h2>
<ol>
  <li><strong>Qeydiyyat və öz ünvanınız:</strong> Adınızla səhifə açın (məsələn, <em>adiniz.kursometr.com</em>).</li>
  <li><strong>Fənn və qrupları yaradın:</strong> Mövcud qruplarınızı və həftəlik cədvəli daxil edin.</li>
  <li><strong>Tələbələri dəvət edin:</strong> Linki WhatsApp qrupunda paylaşın — tələbələr sizin ünvanınızdan qoşulur.</li>
  <li><strong>İlk sınağı keçirin:</strong> Kiçik test ilə başlayın, tələbələr sistemi tez mənimsəyir.</li>
  <li><strong>Valideynləri qoşun:</strong> Valideyn kabineti ilə hesabat sualları azalır.</li>
</ol>
<p>İlk həftə WhatsApp qrupunu elan kanalı kimi saxlamaq olar, amma cədvəl, tapşırıq və nəticələri tamamilə platformaya köçürmək lazımdır — əks halda iki sistem paralel işləyir və qarışıqlıq qalır.</p>

<h2>Kursometr: Müəllimlər Üçün Hazır Həll</h2>
<p>RS Code olaraq bu problemləri həll etmək üçün <a href="/mehsullar/kursometr">Kursometr</a> platformasını hazırlamışıq. Müəllim bir dəqiqəyə öz ünvanını açır və qruplar, dərs cədvəli, vaxtlı sınaqlar, ev tapşırıqları, ödəniş izləmə və valideyn kabinetini özü qurur — admin gözləmək lazım deyil. Qeydiyyat pulsuzdur.</p>
<p>Videodərs satmaq və öz kurs platformasını qurmaq istəyirsinizsə, <a href="/blog-details/onlayn-kurs-nece-yaradilir-2026">Onlayn Kurs Necə Yaradılır</a> bələdçimizə, böyük tədris mərkəzləri üçün isə <a href="/blog-details/lms-sistemi-qiymeti-azerbaycanda-2026">LMS sistemi qiymətləri</a> yazımıza baxın.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Repetitor üçün dərs idarəetmə proqramı lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">5–10 tələbə ilə WhatsApp və dəftər kifayət edə bilər. Tələbə sayı 20-ni keçəndə, bir neçə qrup və mütəmadi sınaqlar olanda platforma vaxta qənaət edir və ödəniş, davamiyyət itkisinin qarşısını alır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tələbələr və valideynlər sistemi istifadə edə biləcəkmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Tələbələr müəllimin ünvanından qoşulur, dərs cədvəlini, tapşırıqları və sınaqları görür. Valideyn kabinetində davamiyyət və nəticələr izlənir, ayrıca proqram yükləmək lazım deyil.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Onlayn sınaqlar necə yoxlanılır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Vaxtlı sınaqlarda cavablar avtomatik yoxlanılır, bal hesablanır və qrup üzrə nəticələr dərhal görünür. Müəllim yalnız sualları hazırlayır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Kursometr-də qeydiyyat pulludurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Müəllim qeydiyyatı pulsuzdur. Ətraflı məlumat və aktual şərtlər üçün Kursometr səhifəsinə baxın.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Tədris mərkəzimiz üçün fərdi sistem hazırlaya bilərsinizmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Xüsusi tələblər (filiallar, maliyyə hesabatları, inteqrasiyalar) varsa, RS Code tədris mərkəzləri üçün sifarişlə LMS və idarəetmə sistemi hazırlayır.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>WhatsApp və Excel başlanğıc üçün işləyir, amma tələbə sayı artdıqca müəllimin vaxtını inzibati işlər yeyir. Qruplar, davamiyyət, sınaq, tapşırıq, ödəniş və valideyn əlaqəsini bir platformaya toplamaq həm vaxta qənaət edir, həm də tələbə və valideynlərin gözündə peşəkarlığınızı artırır.</p>
<p><strong><a href="/mehsullar/kursometr">Kursometr haqqında ətraflı</a></strong> və ya fərdi sistem üçün <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>Thousands of tutors and course teachers in Azerbaijan do the same things every day: remind students of class times in WhatsApp groups, record attendance in a notebook, calculate test results in Excel, keep track of who hasn't paid in their head, and answer every parent's "how is my child doing?" one by one. Once there are more than 20 students, this system starts to break: messages get lost, payments are forgotten, and the teacher spends more time on admin than on teaching.</p>
<p>This article covers the real problems of running classes with WhatsApp and Excel, what a class management platform should include, and how to make the switch.</p>

<h2>6 Problems with WhatsApp and Excel</h2>
<ul>
  <li><strong>Scattered information:</strong> Schedule in one group, homework in another chat, results in Excel, payments in a notebook.</li>
  <li><strong>Hard attendance tracking:</strong> Writing it down every class and counting at month end takes time.</li>
  <li><strong>Slow test results:</strong> Checking paper tests, adding up scores and ranking takes hours.</li>
  <li><strong>Forgotten payments:</strong> It's hard to track who paid for which month, leading to awkward reminders.</li>
  <li><strong>Uninformed parents:</strong> Writing to every parent individually isn't possible, so trust suffers.</li>
  <li><strong>No professional presence:</strong> New students can't see the teacher's own page, programme or results.</li>
</ul>

<h2>What Should a Class Management Platform Include?</h2>
<table>
  <thead>
    <tr><th>Feature</th><th>What it solves</th></tr>
  </thead>
  <tbody>
    <tr><td>Groups and schedule</td><td>Subjects, groups and weekly schedule in one place; students see class times themselves</td></tr>
    <tr><td>Attendance</td><td>One-click marking per class, automatic monthly statistics</td></tr>
    <tr><td>Timed tests</td><td>Online tests, automatic grading, scores and rankings</td></tr>
    <tr><td>Homework</td><td>Assigning, submitting and reviewing homework</td></tr>
    <tr><td>Payment tracking</td><td>Who paid and who is late — at a glance</td></tr>
    <tr><td>Parent dashboard</td><td>Parents follow attendance and results themselves</td></tr>
    <tr><td>Teacher's own page</td><td>Courses, groups and contact — a professional business card</td></tr>
  </tbody>
</table>

<h2>Who Is It For?</h2>
<ul>
  <li><strong>Private tutors:</strong> Teachers preparing school leavers, pupils or language learners.</li>
  <li><strong>Small training centres:</strong> 2–10 teachers, several subjects and dozens of groups.</li>
  <li><strong>Online teachers:</strong> Those who want to combine Zoom/Meet classes with schedules and tests.</li>
  <li><strong>Exam preparation:</strong> Anyone who runs regular mock tests to measure progress.</li>
</ul>

<h2>Excel vs Platform: A Real Comparison</h2>
<table>
  <thead>
    <tr><th>Task</th><th>WhatsApp + Excel</th><th>Platform</th></tr>
  </thead>
  <tbody>
    <tr><td>Attendance</td><td>Manual, month-end counting</td><td>One click, automatic stats</td></tr>
    <tr><td>25-question test</td><td>Paper, manual checking</td><td>Online, automatic scoring</td></tr>
    <tr><td>Payment control</td><td>Notebook and memory</td><td>Status per student</td></tr>
    <tr><td>Reports to parents</td><td>A separate message to each</td><td>Parents check the dashboard</td></tr>
    <tr><td>Attracting new students</td><td>Word of mouth and Instagram</td><td>Teacher's own page + referrals</td></tr>
  </tbody>
</table>

<h2>Switching to a Platform: 5 Steps</h2>
<ol>
  <li><strong>Sign up and claim your address:</strong> Open a page in your name (e.g. <em>yourname.kursometr.com</em>).</li>
  <li><strong>Create subjects and groups:</strong> Enter your existing groups and weekly schedule.</li>
  <li><strong>Invite students:</strong> Share the link in your WhatsApp group — students join from your address.</li>
  <li><strong>Run the first test:</strong> Start with a short quiz; students pick up the system quickly.</li>
  <li><strong>Connect parents:</strong> The parent dashboard cuts down on report requests.</li>
</ol>
<p>You can keep the WhatsApp group as an announcement channel for the first week, but move schedules, homework and results fully to the platform — otherwise two systems run in parallel and the confusion stays.</p>

<h2>Kursometr: A Ready Solution for Teachers</h2>
<p>At RS Code we built <a href="/mehsullar/kursometr">Kursometr</a> to solve exactly these problems. A teacher opens their own address in a minute and sets up groups, schedules, timed tests, homework, payment tracking and a parent dashboard themselves — no waiting for an admin. Sign-up is free.</p>
<p>If you want to sell video lessons and build your own course platform, see our <a href="/blog-details/how-to-create-and-sell-online-course-2026">How to Create an Online Course</a> guide; for larger training centres, see <a href="/blog-details/lms-system-cost-azerbaijan-2026">LMS system costs</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does a tutor need class management software?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">With 5–10 students, WhatsApp and a notebook may be enough. Once you pass 20 students, several groups and regular tests, a platform saves time and prevents lost payments and attendance records.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can students and parents use the system?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. Students join from the teacher's address and see the schedule, homework and tests. Parents follow attendance and results in the parent dashboard, with no separate app to install.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How are online tests graded?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In timed tests, answers are checked automatically, scores are calculated and group results appear instantly. The teacher only prepares the questions.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Kursometr sign-up paid?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Teacher sign-up is free. See the Kursometr page for details and current terms.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can you build a custom system for our training centre?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. If you have special requirements (branches, financial reports, integrations), RS Code builds custom LMS and management systems for training centres.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>WhatsApp and Excel work at the start, but as the number of students grows, admin eats into a teacher's time. Bringing groups, attendance, tests, homework, payments and parent communication onto one platform saves time and makes you look more professional to students and parents.</p>
<p><strong><a href="/mehsullar/kursometr">Learn more about Kursometr</a></strong> or <a href="/contact">contact us</a> for a custom system.</p>
HTML;

        $textRu = <<<'HTML'
<p>Тысячи репетиторов и преподавателей курсов в Азербайджане каждый день делают одно и то же: напоминают о времени занятий в группах WhatsApp, записывают посещаемость в тетрадь, считают результаты тестов в Excel, держат в голове, кто не оплатил, и по одному отвечают родителям на вопрос «как учится мой ребёнок?». Когда учеников становится больше 20, система начинает ломаться: сообщения теряются, оплаты забываются, а на администрирование уходит больше времени, чем на уроки.</p>
<p>В статье — реальные проблемы работы через WhatsApp и Excel, что должно быть в платформе для управления занятиями и как перейти на неё.</p>

<h2>6 проблем WhatsApp и Excel</h2>
<ul>
  <li><strong>Разрозненная информация:</strong> расписание в одной группе, домашка в другом чате, результаты в Excel, оплаты в тетради.</li>
  <li><strong>Сложный учёт посещаемости:</strong> записывать каждый урок и считать в конце месяца долго.</li>
  <li><strong>Результаты тестов с задержкой:</strong> проверка бумажных тестов, подсчёт баллов и рейтинг отнимают часы.</li>
  <li><strong>Забытые оплаты:</strong> трудно отследить, кто за какой месяц заплатил, — отсюда неловкие напоминания.</li>
  <li><strong>Родители не в курсе:</strong> писать каждому по отдельности невозможно, и доверие падает.</li>
  <li><strong>Нет профессионального образа:</strong> новый ученик не видит личной страницы, программы и результатов преподавателя.</li>
</ul>

<h2>Что должно быть в платформе управления занятиями?</h2>
<table>
  <thead>
    <tr><th>Функция</th><th>Что решает</th></tr>
  </thead>
  <tbody>
    <tr><td>Группы и расписание</td><td>Предметы, группы и недельное расписание в одном месте; ученик сам видит время урока</td></tr>
    <tr><td>Посещаемость</td><td>Отметка в один клик, автоматическая статистика за месяц</td></tr>
    <tr><td>Тесты на время</td><td>Онлайн-тесты, автоматическая проверка, баллы и рейтинг</td></tr>
    <tr><td>Домашние задания</td><td>Выдача, сдача и проверка заданий</td></tr>
    <tr><td>Учёт оплат</td><td>Кто оплатил, кто задерживает — с первого взгляда</td></tr>
    <tr><td>Кабинет родителя</td><td>Родитель сам следит за посещаемостью и результатами</td></tr>
    <tr><td>Своя страница преподавателя</td><td>Курсы, группы и контакты — профессиональная визитка</td></tr>
  </tbody>
</table>

<h2>Кому подходит?</h2>
<ul>
  <li><strong>Частным репетиторам:</strong> подготовка абитуриентов, школьников, изучение языков.</li>
  <li><strong>Небольшим учебным центрам:</strong> 2–10 преподавателей, несколько предметов и десятки групп.</li>
  <li><strong>Онлайн-преподавателям:</strong> тем, кто хочет объединить уроки в Zoom/Meet с расписанием и тестами.</li>
  <li><strong>Подготовке к экзаменам:</strong> тем, кто регулярно проводит пробные тесты и измеряет прогресс.</li>
</ul>

<h2>Excel или платформа: реальное сравнение</h2>
<table>
  <thead>
    <tr><th>Задача</th><th>WhatsApp + Excel</th><th>Платформа</th></tr>
  </thead>
  <tbody>
    <tr><td>Посещаемость</td><td>Вручную, подсчёт в конце месяца</td><td>Один клик, автостатистика</td></tr>
    <tr><td>Тест на 25 вопросов</td><td>Бумага, ручная проверка</td><td>Онлайн, автоматические баллы</td></tr>
    <tr><td>Контроль оплат</td><td>Тетрадь и память</td><td>Статус по каждому ученику</td></tr>
    <tr><td>Отчёт родителям</td><td>Отдельное сообщение каждому</td><td>Родитель смотрит в кабинете</td></tr>
    <tr><td>Новые ученики</td><td>Знакомые и Instagram</td><td>Своя страница + рекомендации</td></tr>
  </tbody>
</table>

<h2>Переход на платформу: 5 шагов</h2>
<ol>
  <li><strong>Регистрация и свой адрес:</strong> откройте страницу со своим именем (например, <em>vashe-imya.kursometr.com</em>).</li>
  <li><strong>Создайте предметы и группы:</strong> внесите текущие группы и недельное расписание.</li>
  <li><strong>Пригласите учеников:</strong> поделитесь ссылкой в группе WhatsApp — ученики подключаются по вашему адресу.</li>
  <li><strong>Проведите первый тест:</strong> начните с короткого теста — ученики быстро осваивают систему.</li>
  <li><strong>Подключите родителей:</strong> кабинет родителя сокращает вопросы об успеваемости.</li>
</ol>
<p>Первую неделю группу WhatsApp можно оставить как канал объявлений, но расписание, задания и результаты нужно полностью перенести на платформу — иначе две системы работают параллельно и путаница остаётся.</p>

<h2>Kursometr: готовое решение для преподавателей</h2>
<p>В RS Code мы создали <a href="/mehsullar/kursometr">Kursometr</a> именно для решения этих задач. Преподаватель за минуту открывает свой адрес и сам настраивает группы, расписание, тесты на время, домашние задания, учёт оплат и кабинет родителя — без ожидания администратора. Регистрация бесплатна.</p>
<p>Если вы хотите продавать видеоуроки и создать свою платформу курсов, читайте гид <a href="/blog-details/kak-sozdat-i-prodavat-onlajn-kurs-2026">Как создать онлайн-курс</a>; для крупных учебных центров — статью о <a href="/blog-details/stoimost-lms-sistemy-azerbajdzan-2026">стоимости LMS-систем</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужна ли репетитору программа для управления занятиями?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">При 5–10 учениках может хватить WhatsApp и тетради. Когда учеников больше 20, есть несколько групп и регулярные тесты, платформа экономит время и предотвращает потерю оплат и данных о посещаемости.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Смогут ли ученики и родители пользоваться системой?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Ученики подключаются по адресу преподавателя и видят расписание, задания и тесты. Родители следят за посещаемостью и результатами в кабинете родителя, отдельное приложение не нужно.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как проверяются онлайн-тесты?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">В тестах на время ответы проверяются автоматически, баллы считаются, а результаты группы появляются сразу. Преподаватель только готовит вопросы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Регистрация в Kursometr платная?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Регистрация преподавателя бесплатна. Подробности и актуальные условия — на странице Kursometr.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можете сделать индивидуальную систему для нашего учебного центра?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. При особых требованиях (филиалы, финансовые отчёты, интеграции) RS Code разрабатывает LMS и системы управления для учебных центров на заказ.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>WhatsApp и Excel подходят для старта, но с ростом числа учеников администрирование съедает время преподавателя. Группы, посещаемость, тесты, задания, оплаты и связь с родителями на одной платформе экономят время и делают вас профессиональнее в глазах учеников и родителей.</p>
<p><strong><a href="/mehsullar/kursometr">Подробнее о Kursometr</a></strong> или <a href="/kontakty">свяжитесь с нами</a> для индивидуальной системы.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'repetitor-ders-idareetme-proqrami-2026'],
            [
                'slug_en' => 'tutor-class-management-software-2026',
                'slug_ru' => 'programma-dlya-repetitorov-2026',

                'title_az' => 'Repetitorlar üçün Dərs İdarəetməsi: WhatsApp və Excel-dən Platformaya Keçid 2026',
                'title_en' => 'Class Management for Tutors: Moving from WhatsApp and Excel to a Platform 2026',
                'title_ru' => 'Управление занятиями для репетиторов: от WhatsApp и Excel к платформе 2026',

                'review_az' => 'Qruplar, davamiyyət, sınaqlar, ev tapşırıqları, ödənişlər və valideynlər — WhatsApp və Excel-in 6 problemi, platformada olmalı funksiyalar və 5 addımda keçid.',
                'review_en' => 'Groups, attendance, tests, homework, payments and parents — 6 problems with WhatsApp and Excel, must-have platform features and a 5-step switch.',
                'review_ru' => 'Группы, посещаемость, тесты, домашние задания, оплаты и родители — 6 проблем WhatsApp и Excel, нужные функции платформы и переход в 5 шагов.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '29 Sentyabr 2026',
                'date_en' => 'September 29, 2026',
                'date_ru' => '29 Сентября 2026',

                'photo'    => 'cover-repetitor-az.png',
                'photo_en' => 'cover-repetitor-en.png',
                'photo_ru' => 'cover-repetitor-ru.png',

                'meta_title_az' => 'Repetitor üçün Dərs İdarəetmə Proqramı 2026 | RS Code',
                'meta_title_en' => 'Class Management Software for Tutors 2026 | RS Code',
                'meta_title_ru' => 'Программа для репетиторов и курсов 2026 | RS Code',

                'meta_description_az' => 'Repetitor və kurs müəllimləri üçün: qruplar, davamiyyət, vaxtlı sınaqlar, ev tapşırığı, ödəniş izləmə və valideyn kabineti. WhatsApp və Excel-dən keçid bələdçisi.',
                'meta_description_en' => 'For tutors and course teachers: groups, attendance, timed tests, homework, payment tracking and a parent dashboard. A guide to moving off WhatsApp and Excel.',
                'meta_description_ru' => 'Для репетиторов и преподавателей: группы, посещаемость, тесты на время, домашние задания, учёт оплат и кабинет родителя. Как уйти от WhatsApp и Excel.',

                'meta_keywords_az' => 'repetitor proqramı, dərs idarəetmə proqramı, kurs idarəetmə sistemi, tədris mərkəzi proqramı, onlayn sınaq, davamiyyət proqramı 2026',
                'meta_keywords_en' => 'tutor software, class management software, training centre software, online tests, attendance tracking, teacher platform 2026',
                'meta_keywords_ru' => 'программа для репетиторов, управление занятиями, программа для учебного центра, онлайн-тесты, учёт посещаемости 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
