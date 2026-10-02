<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog38GoogleBusinessSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>"Yaxınlıqda kafe", "Bakıda stomatoloq", "Gəncədə avtoservis" — bu cür axtarışlarda Google nəticələrin ən yuxarısında xəritə və 3 biznes kartı göstərir. Bu kartlar saytdan deyil, <strong>Google Business Profile</strong>-dan (əvvəlki adı Google My Business) gəlir. Profiliniz yoxdursa və ya natamamdırsa, müştəri sizi xəritədə görmür və rəqibə zəng edir. Ən yaxşı tərəfi isə budur: profil pulsuzdur.</p>
<p>Bu bələdçidə profili sıfırdan yaratmağı, düzgün doldurmağı və xəritədə önə çıxmaq üçün nə etməli olduğunuzu addım-addım izah edirik.</p>

<h2>Google Business Profile Nə Verir?</h2>
<ul>
  <li><strong>Google Xəritələrdə görünmək:</strong> Ünvanınız, iş saatlarınız və marşrut düyməsi.</li>
  <li><strong>Axtarışda biznes kartı:</strong> Ad, reytinq, rəylər, fotolar, telefon və sayt linki bir yerdə.</li>
  <li><strong>Birbaşa zəng və marşrut:</strong> Müştəri saytınıza keçmədən zəng edə və ya yol tapa bilər.</li>
  <li><strong>Rəylər:</strong> Ulduzlu reytinq yeni müştəri üçün ən güclü etibar siqnalıdır.</li>
  <li><strong>Statistika:</strong> Neçə nəfərin profilinizə baxdığını, zəng etdiyini və marşrut istədiyini görürsünüz.</li>
</ul>

<h2>Profil Yaratmaq: 7 Addım</h2>
<ol>
  <li><strong>Google hesabı ilə daxil olun:</strong> Mümkünsə şirkətin ümumi e-poçtunu istifadə edin ki, işçi dəyişəndə profil itməsin.</li>
  <li><strong>Biznes adını yazın:</strong> Real, lövhədəki adla. Ada açar söz əlavə etmək ("RS Code — ən yaxşı sayt Bakı") Google qaydalarına ziddir və profilin bloklanmasına səbəb ola bilər.</li>
  <li><strong>Kateqoriya seçin:</strong> Əsas kateqoriya ən vacib sıralama faktorlarındandır. Ən dəqiq olanı seçin, əlavə kateqoriyaları sonra artırın.</li>
  <li><strong>Ünvan və ya xidmət ərazisi:</strong> Müştəri sizə gəlirsə — dəqiq ünvan; siz müştəriyə gedirsinizsə (usta, kuryer, səyyar xidmət) — ünvanı gizlədib xidmət göstərdiyiniz şəhər və rayonları seçin.</li>
  <li><strong>Telefon və sayt:</strong> Saytda göstərilən eyni nömrəni yazın.</li>
  <li><strong>Təsdiq (verifikasiya):</strong> Google biznesin real olduğunu yoxlayır. Təsdiq üsulu (video, telefon, e-poçt və s.) biznesə görə dəyişir — Google-un sizə təklif etdiyi üsulu izləyin.</li>
  <li><strong>Profili tam doldurun:</strong> İş saatları, təsvir, xidmətlər, fotolar — aşağıda ətraflı.</li>
</ol>

<h2>Profili Düzgün Doldurmaq</h2>
<table>
  <thead>
    <tr><th>Bölmə</th><th>Nə yazmalı</th></tr>
  </thead>
  <tbody>
    <tr><td>Təsvir</td><td>Nə edirsiniz, kimə xidmət edirsiniz, hansı şəhərdə — təbii dildə, açar söz yığını olmadan</td></tr>
    <tr><td>İş saatları</td><td>Bayram və xüsusi günlər daxil, həmişə aktual</td></tr>
    <tr><td>Xidmətlər / məhsullar</td><td>Hər xidmətin adı, qısa təsviri, mümkünsə qiyməti</td></tr>
    <tr><td>Fotolar</td><td>Fasad, interyer, komanda, məhsul və görülmüş işlər — real, keyfiyyətli şəkillər</td></tr>
    <tr><td>Atributlar</td><td>Onlayn ödəniş, əlil arabası girişi, Wi-Fi və s. — sizə aid olanlar</td></tr>
  </tbody>
</table>

<h2>Xəritədə Önə Çıxmaq: Nələr Təsir Edir?</h2>
<p>Google lokal nəticələri əsasən üç amilə görə sıralayır: <strong>uyğunluq</strong> (profil axtarışa nə qədər uyğundur), <strong>məsafə</strong> (axtaran şəxsə nə qədər yaxınsınız) və <strong>tanınma</strong> (rəylər, linklər, ümumi onlayn nüfuz). Məsafəni dəyişə bilməzsiniz, amma digər ikisi tamamilə sizin əlinizdədir:</p>
<ul>
  <li><strong>Rəy toplayın:</strong> Hər razı müştəridən rəy istəyin — çek, WhatsApp mesajı və ya QR kodla link verin.</li>
  <li><strong>Hər rəyə cavab verin:</strong> Mənfi rəyə də nəzakətlə və həll yönümlü cavab verin; bu, gələcək müştərilər üçün görünür.</li>
  <li><strong>Mütəmadi foto və yeniləmə:</strong> Aktiv profil passiv profildən daha etibarlı görünür.</li>
  <li><strong>Eyni məlumat hər yerdə (NAP):</strong> Ad, ünvan və telefon sayt, sosial şəbəkə və kataloqlarda eyni olmalıdır.</li>
  <li><strong>Saytla əlaqələndirin:</strong> Saytda ünvan, xəritə və şəhər adı olan xidmət səhifələri profili gücləndirir. Lokal SEO nümunəsi: <a href="/blog-details/gencede-veb-sayt-hazirlanmasi-2026">Gəncədə Veb Sayt Hazırlanması</a>.</li>
</ul>

<h2>Edilməməli Olanlar</h2>
<ol>
  <li><strong>Saxta və ya alınmış rəylər</strong> — Google onları silir, profil məhdudlaşdırıla bilər.</li>
  <li><strong>Adı açar sözlə doldurmaq</strong> — qaydalara ziddir.</li>
  <li><strong>Virtual ofis və ya mövcud olmayan ünvan</strong> — təsdiq problemi və bloklanma riski.</li>
  <li><strong>Eyni biznes üçün bir neçə profil</strong> — filial deyilsə, dublikat profillər problem yaradır.</li>
  <li><strong>Profili açıb unutmaq</strong> — köhnə iş saatları və cavabsız rəylər müştəri itirir.</li>
</ol>

<h2>Profil və Sayt Birlikdə</h2>
<p>Google Business Profile müştərini sizə yönəldir, amma qərarı çox vaxt saytda verir: xidmətlər, qiymətlər, portfolio və əlaqə forması. Güclü profil + sürətli, mobil uyğun sayt + lokal SEO — bölgədə önə çıxmağın ən effektiv birləşməsidir. Ətraflı: <a href="/blog-details/seo-xidmeti-azerbaycan-2026">SEO Xidməti Azərbaycanda 2026</a>. Saytınız köhnəlibsə: <a href="/blog-details/sayti-yenileme-vaxti-7-elamet-2026">Saytı Yeniləmə Vaxtıdır: 7 Əlamət</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google Business Profile pulludurmu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr, profil yaratmaq və idarə etmək pulsuzdur. Xəritədə reklam (Google Ads) ayrıca və isteğe bağlı xidmətdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Ofisim yoxdursa, profil aça bilərəmmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. Müştərilərə öz ünvanlarında xidmət göstərirsinizsə, ünvanı gizlədib xidmət ərazisi (şəhər, rayon) göstərə bilərsiniz. Virtual və ya mövcud olmayan ünvan istifadə etməyin.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Profil neçə müddətə xəritədə görünür?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Təsdiqdən sonra profil adətən qısa müddətdə görünməyə başlayır, amma yuxarı sıralara çıxmaq rəylər, tam məlumat və aktivlikdən asılı olaraq həftələr, bəzən aylar çəkir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Mənfi rəyi silmək olarmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Biznes sahibi rəyi özü silə bilmir. Rəy Google qaydalarını pozursa (spam, təhqir, saxta), onu bildirə bilərsiniz. Digər hallarda ən yaxşı yol nəzakətli və həll yönümlü cavab verməkdir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Profilin qurulmasında kömək edirsinizmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli. RS Code profilin yaradılması və optimallaşdırılmasını, saytla əlaqələndirilməsini və lokal SEO işlərini SEO xidməti çərçivəsində həyata keçirir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Google Business Profile lokal müştəri üçün ən qısa yoldur: pulsuzdur, tez qurulur və düzgün idarə olunanda hər gün zəng və ziyarət gətirir. Real məlumat, mütəmadi rəy və aktivlik, eyni NAP məlumatı və güclü saytla birlikdə biznesiniz xəritədə rəqiblərdən önə çıxa bilər.</p>
<p><strong><a href="/seo-xidmeti">SEO xidmətimiz haqqında ətraflı</a></strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>"Café near me", "dentist in Baku", "car service in Ganja" — for searches like these Google shows a map and three business cards at the very top. Those cards don't come from websites but from <strong>Google Business Profile</strong> (formerly Google My Business). Without a complete profile, customers don't see you on the map and call a competitor instead. The best part: the profile is free.</p>
<p>This guide explains step by step how to create a profile from scratch, fill it in properly and what to do to rank higher on the map.</p>

<h2>What Does Google Business Profile Give You?</h2>
<ul>
  <li><strong>Visibility on Google Maps:</strong> Your address, opening hours and a directions button.</li>
  <li><strong>A business card in search:</strong> Name, rating, reviews, photos, phone and website link in one place.</li>
  <li><strong>Direct calls and directions:</strong> Customers can call or find you without visiting your site.</li>
  <li><strong>Reviews:</strong> A star rating is the strongest trust signal for new customers.</li>
  <li><strong>Insights:</strong> See how many people viewed your profile, called you or requested directions.</li>
</ul>

<h2>Creating a Profile: 7 Steps</h2>
<ol>
  <li><strong>Sign in with a Google account:</strong> Use a shared company email if possible, so the profile isn't lost when staff change.</li>
  <li><strong>Enter your business name:</strong> The real name on your signage. Adding keywords ("RS Code — best website Baku") breaks Google's guidelines and can get the profile suspended.</li>
  <li><strong>Choose a category:</strong> The primary category is one of the most important ranking factors. Pick the most precise one and add secondary categories later.</li>
  <li><strong>Address or service area:</strong> If customers come to you — your exact address; if you go to them (tradespeople, couriers, mobile services) — hide the address and select the cities and districts you serve.</li>
  <li><strong>Phone and website:</strong> Use the same number shown on your website.</li>
  <li><strong>Verification:</strong> Google checks that the business is real. The method (video, phone, email, etc.) varies by business — follow the option Google offers you.</li>
  <li><strong>Complete the profile:</strong> Hours, description, services, photos — details below.</li>
</ol>

<h2>Filling In the Profile Properly</h2>
<table>
  <thead>
    <tr><th>Section</th><th>What to include</th></tr>
  </thead>
  <tbody>
    <tr><td>Description</td><td>What you do, whom you serve and where — in natural language, not a keyword list</td></tr>
    <tr><td>Opening hours</td><td>Including holidays and special days, always up to date</td></tr>
    <tr><td>Services / products</td><td>Name, short description and, if possible, price of each service</td></tr>
    <tr><td>Photos</td><td>Exterior, interior, team, products and completed work — real, quality images</td></tr>
    <tr><td>Attributes</td><td>Online payments, wheelchair access, Wi-Fi, etc. — whatever applies</td></tr>
  </tbody>
</table>

<h2>Ranking Higher on the Map: What Matters?</h2>
<p>Google ranks local results mainly on three factors: <strong>relevance</strong> (how well the profile matches the search), <strong>distance</strong> (how close you are to the searcher) and <strong>prominence</strong> (reviews, links and overall online reputation). You can't change distance, but the other two are entirely in your hands:</p>
<ul>
  <li><strong>Collect reviews:</strong> Ask every satisfied customer — share a link via receipt, WhatsApp or QR code.</li>
  <li><strong>Reply to every review:</strong> Respond politely and constructively to negative ones too; future customers see it.</li>
  <li><strong>Regular photos and updates:</strong> An active profile looks more trustworthy than a dormant one.</li>
  <li><strong>Consistent NAP everywhere:</strong> Name, address and phone must match on your site, social media and directories.</li>
  <li><strong>Connect it to your website:</strong> Service pages with your address, map and city name strengthen the profile. A local SEO example: <a href="/blog-details/website-development-in-ganja-2026">Website Development in Ganja</a>.</li>
</ul>

<h2>What Not to Do</h2>
<ol>
  <li><strong>Fake or bought reviews</strong> — Google removes them and may restrict the profile.</li>
  <li><strong>Stuffing the name with keywords</strong> — against the guidelines.</li>
  <li><strong>A virtual office or non-existent address</strong> — verification problems and suspension risk.</li>
  <li><strong>Several profiles for one business</strong> — unless they're real branches, duplicates cause problems.</li>
  <li><strong>Creating it and forgetting it</strong> — outdated hours and unanswered reviews lose customers.</li>
</ol>

<h2>Profile and Website Together</h2>
<p>Google Business Profile sends customers your way, but they often decide on your website: services, prices, portfolio and contact form. A strong profile + a fast, mobile-friendly site + local SEO is the most effective combination for standing out locally. More: <a href="/blog-details/why-you-need-seo-services-2026">Why You Need SEO Services in 2026</a>. If your site is outdated: <a href="/blog-details/signs-you-need-website-redesign-2026">7 Signs You Need a Redesign</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Is Google Business Profile paid?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No, creating and managing a profile is free. Map advertising (Google Ads) is a separate, optional service.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can I create a profile without an office?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. If you serve customers at their location, you can hide your address and show a service area (city, district). Don't use a virtual or non-existent address.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long until the profile appears on the map?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">After verification the profile usually starts appearing fairly quickly, but reaching the top positions takes weeks or sometimes months depending on reviews, completeness and activity.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can I delete a negative review?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Business owners can't delete reviews themselves. If a review breaks Google's policies (spam, abuse, fake), you can report it. Otherwise the best approach is a polite, solution-focused reply.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do you help set up the profile?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes. RS Code creates and optimizes profiles, connects them to your website and handles local SEO as part of our SEO service.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>Google Business Profile is the shortest path to local customers: it's free, quick to set up and, when managed properly, brings calls and visits every day. With accurate information, regular reviews and activity, consistent NAP data and a strong website, your business can outrank competitors on the map.</p>
<p><strong><a href="/seo-services">Learn more about our SEO services</a></strong> or <a href="/contact">contact us</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>«Кафе рядом», «стоматолог в Баку», «автосервис в Гяндже» — по таким запросам Google показывает в самом верху карту и три карточки компаний. Эти карточки берутся не с сайтов, а из <strong>Google Business Profile</strong> (ранее Google My Business). Если профиля нет или он заполнен не полностью, клиент не видит вас на карте и звонит конкуренту. А главное — профиль бесплатный.</p>
<p>В этом гиде пошагово объясняем, как создать профиль с нуля, правильно его заполнить и что делать, чтобы подняться выше на карте.</p>

<h2>Что даёт Google Business Profile?</h2>
<ul>
  <li><strong>Видимость на Google Картах:</strong> адрес, часы работы и кнопка маршрута.</li>
  <li><strong>Карточка в поиске:</strong> название, рейтинг, отзывы, фото, телефон и ссылка на сайт в одном месте.</li>
  <li><strong>Звонок и маршрут в один клик:</strong> клиент может позвонить или найти вас, не заходя на сайт.</li>
  <li><strong>Отзывы:</strong> звёздный рейтинг — самый сильный сигнал доверия для новых клиентов.</li>
  <li><strong>Статистика:</strong> сколько людей посмотрели профиль, позвонили или проложили маршрут.</li>
</ul>

<h2>Создание профиля: 7 шагов</h2>
<ol>
  <li><strong>Войдите в аккаунт Google:</strong> по возможности используйте общий корпоративный e-mail, чтобы профиль не потерялся при смене сотрудников.</li>
  <li><strong>Укажите название:</strong> реальное, как на вывеске. Добавление ключевых слов («RS Code — лучший сайт Баку») нарушает правила Google и может привести к блокировке.</li>
  <li><strong>Выберите категорию:</strong> основная категория — один из важнейших факторов ранжирования. Выберите самую точную, дополнительные добавьте позже.</li>
  <li><strong>Адрес или зона обслуживания:</strong> если клиенты приходят к вам — точный адрес; если вы выезжаете к клиентам (мастера, курьеры, выездные услуги) — скройте адрес и укажите города и районы обслуживания.</li>
  <li><strong>Телефон и сайт:</strong> тот же номер, что указан на сайте.</li>
  <li><strong>Подтверждение:</strong> Google проверяет, что бизнес реален. Способ (видео, телефон, e-mail и др.) зависит от бизнеса — следуйте варианту, который предлагает Google.</li>
  <li><strong>Заполните профиль полностью:</strong> часы работы, описание, услуги, фото — подробнее ниже.</li>
</ol>

<h2>Как правильно заполнить профиль</h2>
<table>
  <thead>
    <tr><th>Раздел</th><th>Что указать</th></tr>
  </thead>
  <tbody>
    <tr><td>Описание</td><td>Чем занимаетесь, для кого и в каком городе — естественным языком, без набора ключевых слов</td></tr>
    <tr><td>Часы работы</td><td>Включая праздники и особые дни, всегда актуальные</td></tr>
    <tr><td>Услуги / товары</td><td>Название, краткое описание и по возможности цена каждой услуги</td></tr>
    <tr><td>Фото</td><td>Фасад, интерьер, команда, продукция и выполненные работы — реальные, качественные снимки</td></tr>
    <tr><td>Атрибуты</td><td>Онлайн-оплата, доступ для колясок, Wi-Fi и т. д. — то, что относится к вам</td></tr>
  </tbody>
</table>

<h2>Как подняться выше на карте?</h2>
<p>Google ранжирует локальные результаты в основном по трём факторам: <strong>релевантность</strong> (насколько профиль соответствует запросу), <strong>расстояние</strong> (насколько вы близко к пользователю) и <strong>известность</strong> (отзывы, ссылки, общая онлайн-репутация). Расстояние изменить нельзя, а два других фактора полностью в ваших руках:</p>
<ul>
  <li><strong>Собирайте отзывы:</strong> просите каждого довольного клиента — дайте ссылку через чек, WhatsApp или QR-код.</li>
  <li><strong>Отвечайте на каждый отзыв:</strong> на негативные тоже — вежливо и по существу; это видят будущие клиенты.</li>
  <li><strong>Регулярные фото и обновления:</strong> активный профиль выглядит надёжнее заброшенного.</li>
  <li><strong>Одинаковые NAP-данные везде:</strong> название, адрес и телефон должны совпадать на сайте, в соцсетях и каталогах.</li>
  <li><strong>Свяжите с сайтом:</strong> страницы услуг с адресом, картой и названием города усиливают профиль. Пример локального SEO: <a href="/blog-details/razrabotka-sajtov-v-gyandzhe-2026">Разработка сайтов в Гяндже</a>.</li>
</ul>

<h2>Чего делать нельзя</h2>
<ol>
  <li><strong>Фейковые или купленные отзывы</strong> — Google их удаляет и может ограничить профиль.</li>
  <li><strong>Ключевые слова в названии</strong> — нарушение правил.</li>
  <li><strong>Виртуальный офис или несуществующий адрес</strong> — проблемы с подтверждением и риск блокировки.</li>
  <li><strong>Несколько профилей одного бизнеса</strong> — если это не реальные филиалы, дубли создают проблемы.</li>
  <li><strong>Создать и забыть</strong> — устаревшие часы работы и неотвеченные отзывы теряют клиентов.</li>
</ol>

<h2>Профиль и сайт вместе</h2>
<p>Google Business Profile приводит клиента, но решение он часто принимает на сайте: услуги, цены, портфолио и форма связи. Сильный профиль + быстрый адаптивный сайт + локальное SEO — самая эффективная комбинация, чтобы выделиться в регионе. Подробнее: <a href="/blog-details/zachem-nuzhny-seo-uslugi-2026">Зачем нужны SEO-услуги в 2026</a>. Если сайт устарел: <a href="/blog-details/priznaki-chto-sajtu-nuzhen-redizajn-2026">7 признаков, что сайту нужен редизайн</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Google Business Profile платный?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет, создание и ведение профиля бесплатны. Реклама на карте (Google Ads) — отдельная и необязательная услуга.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли создать профиль без офиса?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. Если вы обслуживаете клиентов на их территории, можно скрыть адрес и указать зону обслуживания (город, район). Не используйте виртуальный или несуществующий адрес.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Когда профиль появится на карте?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">После подтверждения профиль обычно начинает показываться довольно быстро, но выход на верхние позиции занимает недели, а иногда месяцы — в зависимости от отзывов, полноты и активности.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Можно ли удалить негативный отзыв?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Владелец бизнеса не может удалить отзыв сам. Если отзыв нарушает правила Google (спам, оскорбления, фейк), на него можно пожаловаться. В остальных случаях лучше всего — вежливый ответ по существу.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Помогаете ли вы с настройкой профиля?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да. RS Code создаёт и оптимизирует профили, связывает их с сайтом и выполняет локальное SEO в рамках SEO-услуг.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Google Business Profile — самый короткий путь к местным клиентам: бесплатно, быстро настраивается и при правильном ведении каждый день приносит звонки и визиты. С точной информацией, регулярными отзывами и активностью, одинаковыми NAP-данными и сильным сайтом ваш бизнес может обойти конкурентов на карте.</p>
<p><strong><a href="/seo-uslugi">Подробнее о наших SEO-услугах</a></strong> или <a href="/kontakty">свяжитесь с нами</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'google-business-profile-nece-yaradilir-2026'],
            [
                'slug_en' => 'how-to-create-google-business-profile-2026',
                'slug_ru' => 'kak-sozdat-google-business-profile-2026',

                'title_az' => 'Google Business Profile Necə Yaradılır? Xəritədə Görünmək üçün 2026 Bələdçisi',
                'title_en' => 'How to Create a Google Business Profile: 2026 Guide to Showing Up on Maps',
                'title_ru' => 'Как создать Google Business Profile: гид 2026, чтобы появиться на картах',

                'review_az' => 'Google Xəritələrdə və axtarışda biznes kartı ilə görünmək: profili 7 addımda yaratmaq, düzgün doldurmaq, rəy toplamaq və xəritədə önə çıxmaq. Pulsuz, lokal müştəri üçün ən qısa yol.',
                'review_en' => 'Show up on Google Maps and search with a business card: create a profile in 7 steps, fill it in properly, collect reviews and rank higher on the map. Free and the shortest path to local customers.',
                'review_ru' => 'Как появиться на Google Картах и в поиске с карточкой компании: создать профиль за 7 шагов, правильно заполнить, собрать отзывы и подняться выше на карте. Бесплатно.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '2 Oktyabr 2026',
                'date_en' => 'October 2, 2026',
                'date_ru' => '2 Октября 2026',

                'photo'    => 'cover-google-business-az.png',
                'photo_en' => 'cover-google-business-en.png',
                'photo_ru' => 'cover-google-business-ru.png',

                'meta_title_az' => 'Google Business Profile Necə Yaradılır? 2026 | RS Code',
                'meta_title_en' => 'How to Create a Google Business Profile 2026 | RS Code',
                'meta_title_ru' => 'Как создать Google Business Profile 2026 | RS Code',

                'meta_description_az' => 'Google Xəritələrdə görünmək üçün Google Business Profile: 7 addımda yaratmaq, təsdiq, düzgün doldurmaq, rəylər və xəritədə önə çıxmaq. Pulsuz lokal SEO bələdçisi.',
                'meta_description_en' => 'Google Business Profile for showing up on Google Maps: create it in 7 steps, verification, filling it in, reviews and ranking higher. A free local SEO guide.',
                'meta_description_ru' => 'Google Business Profile, чтобы появиться на Google Картах: создание за 7 шагов, подтверждение, заполнение, отзывы и рост позиций. Бесплатный гид по локальному SEO.',

                'meta_keywords_az' => 'Google Business Profile, Google My Business, Google xəritədə görünmək, Google Maps biznes qeydiyyatı, lokal SEO, Google rəylər 2026',
                'meta_keywords_en' => 'Google Business Profile, Google My Business, show up on Google Maps, Google Maps business listing, local SEO, Google reviews 2026',
                'meta_keywords_ru' => 'Google Business Profile, Google Мой бизнес, как попасть на Google Карты, карточка компании Google, локальное SEO, отзывы Google 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
