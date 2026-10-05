<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog41QrMenuSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>Qiymət dəyişdi — menyunu yenidən çap et. Yeni yemək əlavə olundu — yenə çap. Turist gəldi — rus və ya ingilis dilində menyu yoxdur. Kafe və restoranlarda kağız menyu həm xərc, həm də baş ağrısıdır. <strong>QR menyu</strong> bu problemləri həll edir: qonaq masadakı QR kodu telefonla oxudur və menyu bir neçə saniyəyə ekranda açılır.</p>
<p>Bu yazıda QR menyunun növlərini, nə verdiyini, düzgün hazırlanması üçün nələrə diqqət etməli olduğunuzu və POS sistemi ilə inteqrasiyanı izah edirik.</p>

<h2>QR Menyu Nə Verir?</h2>
<ul>
  <li><strong>Qiymətlər dərhal yenilənir:</strong> İdarə panelindən dəyişiklik edirsiniz, bütün masalarda menyu dərhal yenilənir — çap xərci yoxdur.</li>
  <li><strong>Foto ilə satış:</strong> Yeməyin şəkli olan menyuda qonaq daha tez və çox vaxt daha çox sifariş edir.</li>
  <li><strong>Çoxdilli menyu:</strong> AZ, RU, EN — turist və əcnəbi qonaqlar üçün bir düymə ilə.</li>
  <li><strong>"Bitib" işarəsi:</strong> Qalmayan yeməyi bir kliklə gizlədirsiniz, ofisiantın "o yoxdur" söhbəti azalır.</li>
  <li><strong>Gigiyena və rahatlıq:</strong> Əldən-ələ keçən kağız menyu yoxdur.</li>
</ul>

<h2>QR Menyunun 3 Növü</h2>
<table>
  <thead>
    <tr><th>Növ</th><th>Necə işləyir</th><th>Üstünlük</th><th>Çatışmazlıq</th></tr>
  </thead>
  <tbody>
    <tr><td>PDF menyu</td><td>QR kod PDF fayla aparır</td><td>Ən sadə və ucuz</td><td>Telefonda oxumaq çətindir, yeniləmək üçün faylı dəyişmək lazımdır</td></tr>
    <tr><td>Veb menyu</td><td>Mobil uyğun menyu səhifəsi</td><td>Sürətli, foto, kateqoriya, çoxdilli, asan yeniləmə</td><td>İlkin hazırlanma tələb edir</td></tr>
    <tr><td>Masadan sifariş</td><td>Qonaq menyudan sifarişi özü göndərir</td><td>Ofisiant yükü azalır, sifariş mətbəxə birbaşa gedir</td><td>POS inteqrasiyası və proses qurulması lazımdır</td></tr>
  </tbody>
</table>
<p>Əksər kafe üçün optimal başlanğıc <strong>veb menyudur</strong>; ofisiant çatışmazlığı və ya yüksək sıxlıq varsa, masadan sifarişə keçmək olar.</p>

<h2>Yaxşı QR Menyuda Olmalı Olanlar</h2>
<ul>
  <li><strong>Kateqoriyalar:</strong> Səhər yeməyi, əsas yeməklər, içkilər — yuxarıda sabit naviqasiya ilə.</li>
  <li><strong>Keyfiyyətli fotolar:</strong> Real yeməklərin şəkilləri, eyni üslubda.</li>
  <li><strong>Qısa təsvir və tərkib:</strong> Allergenlər, acılıq, vegetarian işarəsi.</li>
  <li><strong>Qiymət və porsiya:</strong> Aydın və aktual.</li>
  <li><strong>Dil seçimi:</strong> AZ/RU/EN, menyunun yuxarısında.</li>
  <li><strong>Sürət:</strong> Mobil internetdə 2–3 saniyəyə açılmalıdır — ağır şəkillər sıxılmalıdır.</li>
  <li><strong>Əlaqə və sosial şəbəkələr:</strong> Instagram, Wolt/Bolt Food linkləri, ünvan.</li>
</ul>
<p>Mobil uyğunluğun niyə vacib olduğunu ətraflı burada izah etmişik: <a href="/blog-details/mobil-uygun-sayt-niye-vacibdir-2026">Mobil Uyğun Sayt Niyə Vacibdir</a>.</p>

<h2>QR Kodun Yerləşdirilməsi</h2>
<ol>
  <li><strong>Hər masada:</strong> Stol üstü stend və ya stiker — oturan kimi görünməlidir.</li>
  <li><strong>Ölçü:</strong> Ən azı 3×3 sm; çox kiçik kodu kameralar çətin oxuyur.</li>
  <li><strong>Qısa yazı:</strong> "Menyu üçün skan edin" — bəzən Wi-Fi şifrəsi ilə birlikdə.</li>
  <li><strong>Davamlı material:</strong> Laminasiya və ya akril — yağ və su ilə tez xarab olmasın.</li>
  <li><strong>Yoxlama:</strong> Müxtəlif telefonlarla və zəif işıqda test edin.</li>
</ol>

<h2>Ən Çox Edilən 5 Səhv</h2>
<ol>
  <li><strong>Kağız menyunun skan edilmiş PDF-i:</strong> Telefonda yaxınlaşdırıb-uzaqlaşdırmaq qonağı yorur.</li>
  <li><strong>Yenilənməyən qiymətlər:</strong> QR menyunun əsas üstünlüyü itir, qonaq narazı qalır.</li>
  <li><strong>Ağır şəkillər:</strong> Menyu yavaş açılır, qonaq ofisiantı çağırır.</li>
  <li><strong>Wi-Fi olmadan:</strong> Mobil internet zəif olan məkanda qonaq üçün açıq Wi-Fi lazımdır.</li>
  <li><strong>Kağız menyunu tamamilə ləğv etmək:</strong> Telefonu olmayan və ya istəməyən qonaq üçün bir-iki kağız menyu saxlayın.</li>
</ol>

<h2>QR Menyu və POS Sistemi</h2>
<p>QR menyunun ən güclü forması POS ilə birlikdə işləyəndir: məhsul və qiymətlər bir yerdən idarə olunur, qalmayan məhsul menyuda avtomatik "bitib" olur, masadan gələn sifariş isə birbaşa kassaya və mətbəx ekranına düşür. Restoran üçün POS seçimi haqqında: <a href="/blog-details/restoran-ucun-pos-sistemi-nece-secilir-2026">Restoran Üçün POS Sistemi Necə Seçilir</a>. RS Code-un bulud kassa sistemi: <a href="/mehsullar/rspos">RS POS</a>.</p>
<p>Qiymət baxımından sadə veb menyu kiçik landing səhifəsinə yaxındır; masadan sifariş və POS inteqrasiyası isə funksionallığa görə dəyişir. Aralıqlar üçün: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb Sayt Qiyməti 2026</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">QR menyu üçün tətbiq yükləmək lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Müasir telefonların kamerası QR kodu birbaşa oxuyur və menyu brauzerdə açılır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">PDF menyu, yoxsa veb menyu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">PDF ən sadə həlldir, amma telefonda oxumaq və yeniləmək çətindir. Veb menyu daha sürətli, foto və çoxdilli dəstəklidir və qiymətlər bir kliklə yenilənir.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">QR menyu neçə dildə olmalıdır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Azərbaycan üçün ən azı AZ və RU, turist axını olan məkanlar üçün EN də tövsiyə olunur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Qonaq QR menyudan özü sifariş verə bilərmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bəli, masadan sifariş funksiyası olan sistemlərdə. Bunun üçün menyu POS və mətbəx ekranı ilə inteqrasiya olunmalı, ödəniş və təsdiq prosesi qurulmalıdır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">QR menyunu necə tez hazırlamaq olar?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Menyunun mətni, qiymətlər və fotolar hazırdırsa, sadə veb menyu qısa müddətə qurulur. Ən çox vaxt aparan iş adətən foto çəkilişi və tərcümələrdir.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>QR menyu kafe və restoran üçün kiçik investisiya ilə böyük rahatlıqdır: qiymətlər anında yenilənir, foto və çoxdilli menyu satışı artırır, çap xərci aradan qalxır. Ən yaxşı nəticə üçün sürətli veb menyu seçin, kodu düzgün yerləşdirin və mümkünsə POS ilə birləşdirin.</p>
<p><strong>QR menyu və ya restoran sistemi üçün <a href="/elaqe">bizimlə əlaqə saxlayın</a></strong>. Ətraflı: <a href="/veb-saytlarin-hazirlanmasi">veb sayt hazırlanması</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>Prices change — reprint the menu. A new dish is added — reprint again. Tourists arrive — there's no menu in Russian or English. For cafés and restaurants, paper menus are both a cost and a headache. A <strong>QR menu</strong> solves this: guests scan the code on the table and the menu opens on their phone in seconds.</p>
<p>This article covers the types of QR menus, what they offer, what to get right when building one and how they integrate with a POS system.</p>

<h2>What Does a QR Menu Give You?</h2>
<ul>
  <li><strong>Instant price updates:</strong> Change it in the admin panel and every table's menu updates immediately — no printing costs.</li>
  <li><strong>Selling with photos:</strong> With dish photos, guests decide faster and often order more.</li>
  <li><strong>Multilingual menu:</strong> AZ, RU, EN — one tap for tourists and foreign guests.</li>
  <li><strong>"Sold out" flag:</strong> Hide unavailable dishes in one click and cut down on "we don't have that" conversations.</li>
  <li><strong>Hygiene and convenience:</strong> No paper menus passed from hand to hand.</li>
</ul>

<h2>3 Types of QR Menu</h2>
<table>
  <thead>
    <tr><th>Type</th><th>How it works</th><th>Pros</th><th>Cons</th></tr>
  </thead>
  <tbody>
    <tr><td>PDF menu</td><td>QR code opens a PDF file</td><td>Simplest and cheapest</td><td>Hard to read on a phone; updating means replacing the file</td></tr>
    <tr><td>Web menu</td><td>A mobile-friendly menu page</td><td>Fast, photos, categories, multilingual, easy updates</td><td>Requires initial setup</td></tr>
    <tr><td>Order from the table</td><td>Guests send their order from the menu</td><td>Less waiter workload, orders go straight to the kitchen</td><td>Needs POS integration and process setup</td></tr>
  </tbody>
</table>
<p>For most cafés the best starting point is a <strong>web menu</strong>; with staff shortages or high traffic you can move to table ordering.</p>

<h2>What a Good QR Menu Should Include</h2>
<ul>
  <li><strong>Categories:</strong> Breakfast, mains, drinks — with sticky navigation at the top.</li>
  <li><strong>Quality photos:</strong> Real dishes, in a consistent style.</li>
  <li><strong>Short description and ingredients:</strong> Allergens, spiciness, vegetarian markers.</li>
  <li><strong>Price and portion:</strong> Clear and up to date.</li>
  <li><strong>Language switcher:</strong> AZ/RU/EN at the top of the menu.</li>
  <li><strong>Speed:</strong> It should open in 2–3 seconds on mobile data — compress heavy images.</li>
  <li><strong>Contacts and social links:</strong> Instagram, Wolt/Bolt Food links, address.</li>
</ul>
<p>Why mobile-friendliness matters: <a href="/blog-details/mobile-friendly-website-2026">Why a Mobile-Friendly Website Matters</a>.</p>

<h2>Placing the QR Code</h2>
<ol>
  <li><strong>On every table:</strong> A table stand or sticker — visible as soon as guests sit down.</li>
  <li><strong>Size:</strong> At least 3×3 cm; cameras struggle with codes that are too small.</li>
  <li><strong>Short label:</strong> "Scan for the menu" — sometimes together with the Wi-Fi password.</li>
  <li><strong>Durable material:</strong> Laminated or acrylic, so grease and water don't ruin it.</li>
  <li><strong>Testing:</strong> Try it with different phones and in low light.</li>
</ol>

<h2>5 Most Common Mistakes</h2>
<ol>
  <li><strong>A scanned PDF of the paper menu:</strong> Pinching and zooming tires guests.</li>
  <li><strong>Outdated prices:</strong> The main advantage of a QR menu is lost and guests are unhappy.</li>
  <li><strong>Heavy images:</strong> The menu loads slowly and guests call the waiter.</li>
  <li><strong>No Wi-Fi:</strong> Where mobile signal is weak, guests need open Wi-Fi.</li>
  <li><strong>Dropping paper menus completely:</strong> Keep a couple for guests without a phone or who prefer paper.</li>
</ol>

<h2>QR Menu and POS</h2>
<p>A QR menu is strongest when it works with your POS: products and prices are managed in one place, out-of-stock items become "sold out" automatically, and table orders land directly in the till and on the kitchen screen. On choosing a restaurant POS: <a href="/blog-details/how-to-choose-pos-system-for-restaurant-2026">How to Choose a Restaurant POS System</a>. RS Code's cloud cash register: <a href="/mehsullar/rspos">RS POS</a>.</p>
<p>Price-wise, a simple web menu is close to a small landing page; table ordering and POS integration vary with functionality. For ranges: <a href="/blog-details/website-cost-azerbaijan-2026">Website Cost 2026</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do guests need to install an app for a QR menu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. Modern phone cameras read QR codes directly and the menu opens in the browser.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">PDF menu or web menu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">PDF is the simplest option, but hard to read and update on a phone. A web menu is faster, supports photos and multiple languages, and prices update in one click.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How many languages should a QR menu have?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">In Azerbaijan at least AZ and RU are recommended, plus EN for venues with tourist traffic.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Can guests order directly from the QR menu?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Yes, with systems that support table ordering. The menu must be integrated with the POS and kitchen screen, and payment and confirmation processes set up.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How quickly can a QR menu be set up?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">If the menu text, prices and photos are ready, a simple web menu is set up quickly. Photography and translations usually take the most time.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>A QR menu is a small investment with a big payoff for cafés and restaurants: prices update instantly, photos and multiple languages lift sales, and printing costs disappear. For the best results choose a fast web menu, place the code properly and, where possible, connect it to your POS.</p>
<p><strong><a href="/contact">Contact us</a> for a QR menu or restaurant system</strong>. More: <a href="/website-development">website development</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>Изменились цены — перепечатать меню. Добавилось новое блюдо — снова печать. Пришли туристы — меню на русском или английском нет. Для кафе и ресторанов бумажное меню — и расходы, и головная боль. <strong>QR-меню</strong> решает эти проблемы: гость сканирует код на столе, и меню за секунды открывается на телефоне.</p>
<p>В статье — виды QR-меню, что оно даёт, на что обратить внимание при создании и как его связать с POS-системой.</p>

<h2>Что даёт QR-меню?</h2>
<ul>
  <li><strong>Мгновенное обновление цен:</strong> меняете в админ-панели — меню на всех столах обновляется сразу, без затрат на печать.</li>
  <li><strong>Продажи с фото:</strong> с фотографиями блюд гости решают быстрее и часто заказывают больше.</li>
  <li><strong>Мультиязычность:</strong> AZ, RU, EN — одним нажатием для туристов и иностранных гостей.</li>
  <li><strong>Отметка «закончилось»:</strong> скрываете недоступное блюдо в один клик — меньше разговоров «этого нет».</li>
  <li><strong>Гигиена и удобство:</strong> никакого бумажного меню из рук в руки.</li>
</ul>

<h2>3 вида QR-меню</h2>
<table>
  <thead>
    <tr><th>Вид</th><th>Как работает</th><th>Плюсы</th><th>Минусы</th></tr>
  </thead>
  <tbody>
    <tr><td>PDF-меню</td><td>QR-код открывает PDF-файл</td><td>Самое простое и дешёвое</td><td>Неудобно читать с телефона, для обновления нужно менять файл</td></tr>
    <tr><td>Веб-меню</td><td>Адаптивная страница меню</td><td>Быстро, фото, категории, языки, простое обновление</td><td>Нужна первоначальная настройка</td></tr>
    <tr><td>Заказ со стола</td><td>Гость сам отправляет заказ из меню</td><td>Меньше нагрузка на официантов, заказ сразу на кухню</td><td>Нужна интеграция с POS и настройка процесса</td></tr>
  </tbody>
</table>
<p>Для большинства кафе оптимальный старт — <strong>веб-меню</strong>; при нехватке официантов или высокой загрузке можно перейти к заказу со стола.</p>

<h2>Что должно быть в хорошем QR-меню</h2>
<ul>
  <li><strong>Категории:</strong> завтраки, основные блюда, напитки — с закреплённой навигацией сверху.</li>
  <li><strong>Качественные фото:</strong> реальные блюда в едином стиле.</li>
  <li><strong>Краткое описание и состав:</strong> аллергены, острота, вегетарианская отметка.</li>
  <li><strong>Цена и порция:</strong> понятно и актуально.</li>
  <li><strong>Выбор языка:</strong> AZ/RU/EN вверху меню.</li>
  <li><strong>Скорость:</strong> через мобильный интернет меню должно открываться за 2–3 секунды — тяжёлые фото нужно сжимать.</li>
  <li><strong>Контакты и соцсети:</strong> Instagram, ссылки на Wolt/Bolt Food, адрес.</li>
</ul>
<p>Почему важна мобильная версия: <a href="/blog-details/mobilnaya-versiya-sayta-2026">Почему важна мобильная версия сайта</a>.</p>

<h2>Размещение QR-кода</h2>
<ol>
  <li><strong>На каждом столе:</strong> настольная подставка или наклейка — видна сразу, как гость садится.</li>
  <li><strong>Размер:</strong> не меньше 3×3 см; слишком маленький код камеры читают плохо.</li>
  <li><strong>Короткая подпись:</strong> «Отсканируйте, чтобы открыть меню» — иногда вместе с паролем Wi-Fi.</li>
  <li><strong>Прочный материал:</strong> ламинация или акрил, чтобы жир и вода не испортили код.</li>
  <li><strong>Проверка:</strong> протестируйте на разных телефонах и при слабом освещении.</li>
</ol>

<h2>5 самых частых ошибок</h2>
<ol>
  <li><strong>Скан бумажного меню в PDF:</strong> приближать и отдалять на телефоне утомительно.</li>
  <li><strong>Неактуальные цены:</strong> главное преимущество QR-меню теряется, гость недоволен.</li>
  <li><strong>Тяжёлые фото:</strong> меню грузится медленно, гость зовёт официанта.</li>
  <li><strong>Нет Wi-Fi:</strong> там, где слабая мобильная связь, гостям нужен открытый Wi-Fi.</li>
  <li><strong>Полный отказ от бумажного меню:</strong> оставьте пару экземпляров для гостей без телефона или тех, кто предпочитает бумагу.</li>
</ol>

<h2>QR-меню и POS-система</h2>
<p>Сильнее всего QR-меню работает вместе с POS: товары и цены управляются из одного места, закончившиеся позиции автоматически помечаются «закончилось», а заказы со стола сразу попадают в кассу и на кухонный экран. О выборе POS для ресторана: <a href="/blog-details/kak-vybrat-pos-sistemu-dlya-restorana-2026">Как выбрать POS-систему для ресторана</a>. Облачная касса RS Code: <a href="/mehsullar/rspos">RS POS</a>.</p>
<p>По цене простое веб-меню близко к небольшому лендингу; заказ со стола и интеграция с POS зависят от функционала. Диапазоны цен: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта 2026</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли гостю устанавливать приложение для QR-меню?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Камеры современных телефонов читают QR-код напрямую, и меню открывается в браузере.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">PDF-меню или веб-меню?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">PDF — самый простой вариант, но его неудобно читать и обновлять. Веб-меню быстрее, поддерживает фото и языки, а цены обновляются в один клик.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">На скольких языках должно быть QR-меню?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Для Азербайджана рекомендуется минимум AZ и RU, а для заведений с туристическим потоком — ещё и EN.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Может ли гость сам заказать через QR-меню?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Да, в системах с функцией заказа со стола. Для этого меню интегрируется с POS и кухонным экраном, настраиваются оплата и подтверждение.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Как быстро можно сделать QR-меню?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Если тексты, цены и фото готовы, простое веб-меню настраивается быстро. Больше всего времени обычно занимают фотосъёмка и переводы.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>QR-меню — небольшая инвестиция с большой отдачей для кафе и ресторанов: цены обновляются мгновенно, фото и языки увеличивают продажи, расходы на печать исчезают. Для лучшего результата выбирайте быстрое веб-меню, правильно размещайте код и по возможности связывайте его с POS.</p>
<p><strong><a href="/kontakty">Свяжитесь с нами</a> для QR-меню или ресторанной системы</strong>. Подробнее: <a href="/razrabotka-sajtov">разработка сайтов</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'qr-menyu-kafe-restoran-2026'],
            [
                'slug_en' => 'qr-menu-for-cafe-restaurant-2026',
                'slug_ru' => 'qr-menyu-dlya-kafe-i-restorana-2026',

                'title_az' => 'Kafe və Restoran üçün QR Menyu: Necə Hazırlanır və Nə Verir? 2026',
                'title_en' => 'QR Menu for Cafés and Restaurants: How to Build One and Why 2026',
                'title_ru' => 'QR-меню для кафе и ресторана: как сделать и что оно даёт 2026',

                'review_az' => 'Qiymətlər anında yenilənir, foto və çoxdilli menyu satışı artırır, çap xərci aradan qalxır. QR menyunun 3 növü, yaxşı menyuda olmalı olanlar, QR kodun yerləşdirilməsi və POS inteqrasiyası.',
                'review_en' => 'Prices update instantly, photos and multiple languages lift sales, printing costs disappear. The 3 types of QR menu, what a good one includes, placing the code and POS integration.',
                'review_ru' => 'Цены обновляются мгновенно, фото и языки увеличивают продажи, расходы на печать исчезают. 3 вида QR-меню, что должно быть в хорошем меню, размещение кода и интеграция с POS.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '6 Oktyabr 2026',
                'date_en' => 'October 6, 2026',
                'date_ru' => '6 Октября 2026',

                'photo'    => 'cover-qr-menyu-az.png',
                'photo_en' => 'cover-qr-menyu-en.png',
                'photo_ru' => 'cover-qr-menyu-ru.png',

                'meta_title_az' => 'QR Menyu Kafe və Restoran üçün 2026 | RS Code',
                'meta_title_en' => 'QR Menu for Cafés and Restaurants 2026 | RS Code',
                'meta_title_ru' => 'QR-меню для кафе и ресторана 2026 | RS Code',

                'meta_description_az' => 'Kafe və restoran üçün QR menyu: PDF, veb menyu və masadan sifariş müqayisəsi, yaxşı menyuda olmalı olanlar, QR kodun yerləşdirilməsi və POS ilə inteqrasiya.',
                'meta_description_en' => 'QR menu for cafés and restaurants: PDF vs web menu vs table ordering, what a good menu includes, placing the QR code and POS integration.',
                'meta_description_ru' => 'QR-меню для кафе и ресторана: PDF, веб-меню и заказ со стола, что должно быть в хорошем меню, размещение QR-кода и интеграция с POS.',

                'meta_keywords_az' => 'QR menyu, elektron menyu, kafe üçün QR menyu, restoran menyusu, masadan sifariş, restoran POS 2026',
                'meta_keywords_en' => 'QR menu, digital menu, QR menu for cafe, restaurant menu, table ordering, restaurant POS 2026',
                'meta_keywords_ru' => 'QR-меню, электронное меню, QR-меню для кафе, меню ресторана, заказ со стола, POS для ресторана 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
