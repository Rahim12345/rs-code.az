<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blog40BriefSeeder extends Seeder
{
    public function run(): void
    {
        $textAz = <<<'HTML'
<p>"Bizə gözəl bir sayt lazımdır" — layihələrin çoxu bu cümlə ilə başlayır və elə buna görə də uzanır, bahalaşır, nəticə gözləntiyə uyğun gəlmir. Səbəb sadədir: podratçı sizin biznesinizi, məqsədinizi və zövqünüzü bilmir. <strong>Brif</strong> bu boşluğu dolduran qısa sənəddir: layihə haqqında əsas məlumatları bir yerə toplayır ki, dizayner və proqramçı ilk gündən düzgün istiqamətdə işləsin.</p>
<p>Bu yazıda brifin nə olduğunu, hansı bölmələrdən ibarət olduğunu, sayt, loqo və SMM üçün nələrə diqqət etmək lazım olduğunu və ən çox edilən səhvləri izah edirik.</p>

<h2>Brif Nə Verir?</h2>
<ul>
  <li><strong>Dəqiq qiymət və müddət:</strong> Podratçı nəyi hazırlayacağını bildikdə təxmin deyil, konkret təklif verir.</li>
  <li><strong>Az düzəliş:</strong> Gözləntilər əvvəlcədən yazılı olanda "bu, istədiyim deyil" mərhələsi qısalır.</li>
  <li><strong>Vaxt qənaəti:</strong> Saatlarla yazışma əvəzinə bir sənəd.</li>
  <li><strong>Mübahisələrin qarşısı:</strong> Razılaşdırılmış brif layihənin yazılı əsasıdır.</li>
</ul>

<h2>Hər Brifdə Olmalı 8 Bölmə</h2>
<ol>
  <li><strong>Şirkət haqqında:</strong> Nə ilə məşğulsunuz, nə vaxtdan, hansı şəhərdə, əsas məhsul və ya xidmətləriniz.</li>
  <li><strong>Layihənin məqsədi:</strong> Satış artırmaq, müraciət toplamaq, brendi yeniləmək, yeni bazara çıxmaq — ölçülə bilən məqsəd ən yaxşısıdır.</li>
  <li><strong>Hədəf auditoriya:</strong> Müştəriləriniz kimdir — yaş, şəhər, gəlir, peşə, hansı problemi həll etmək istəyirlər.</li>
  <li><strong>Rəqiblər:</strong> 3–5 rəqibin adı və saytı; onlarda nəyi bəyənir, nəyi bəyənmirsiniz.</li>
  <li><strong>Nümunələr (referanslar):</strong> Bəyəndiyiniz 2–3 sayt, loqo və ya səhifə — "bu rəng", "bu sadəlik" kimi qısa izahla.</li>
  <li><strong>Hazır materiallar:</strong> Loqo, brendbuk, mətnlər, fotolar, məhsul siyahısı — nə hazırdır, nəyi podratçı hazırlamalıdır.</li>
  <li><strong>Büdcə və müddət:</strong> Təxmini büdcə aralığı və son tarix. Büdcəni gizlətmək yox, açıq demək ən uyğun həlli tapmağa kömək edir.</li>
  <li><strong>Qərar verən şəxs:</strong> Layihəni kim təsdiqləyir — çox vaxt gecikmələr "rəhbər hələ baxmayıb" səbəbindən olur.</li>
</ol>

<h2>Növə Görə Brif: Nələrə Diqqət Etməli</h2>
<table>
  <thead>
    <tr><th>Layihə</th><th>Brifdə xüsusi olaraq yazın</th></tr>
  </thead>
  <tbody>
    <tr><td>Veb sayt</td><td>Səhifələrin siyahısı, dillər (AZ/EN/RU), lazımi funksiyalar (forma, onlayn ödəniş, kataloq, bron), domen və hostinq, idarə paneli tələbi</td></tr>
    <tr><td>Loqo</td><td>Brend adı və mənası, logonun istifadə yerləri (lövhə, qablaşdırma, sosial şəbəkə), istəmədiyiniz rəng və simvollar, mövcud loqo yenilənirsə nə saxlanmalıdır</td></tr>
    <tr><td>SMM</td><td>Hansı platformalar, ayda neçə post/reels, ton (rəsmi, səmimi, yumorlu), reklam büdcəsi, kontent çəkilişi kimdə olacaq</td></tr>
  </tbody>
</table>

<h2>Ən Çox Edilən 6 Səhv</h2>
<ol>
  <li><strong>"Müasir və gözəl olsun":</strong> Hər kəs üçün fərqli məna daşıyır — nümunə göstərin.</li>
  <li><strong>Məqsədin olmaması:</strong> "Sayt lazımdır" məqsəd deyil; "ayda 50 müraciət" məqsəddir.</li>
  <li><strong>Bütün auditoriya:</strong> "Hamı bizim müştərimizdir" — dizaynı və mətni zəiflədir.</li>
  <li><strong>Materialları sona saxlamaq:</strong> Mətn və foto gecikəndə bütün layihə gecikir.</li>
  <li><strong>Büdcəni gizlətmək:</strong> Podratçı ya çox bahalı, ya da çox sadə həll təklif edir.</li>
  <li><strong>Çox adamın rəyi:</strong> Hər mərhələdə yeni şəxs fikir bildirəndə layihə dövrə vurur — bir qərar verən təyin edin.</li>
</ol>

<h2>Brifi Doldurmaq Üçün Qısa Yoxlama Siyahısı</h2>
<ul>
  <li>Biznesimi 2–3 cümlə ilə izah edə bilirəmmi?</li>
  <li>Layihədən konkret nə gözləyirəm və necə ölçəcəyəm?</li>
  <li>Bəyəndiyim və bəyənmədiyim nümunələr hazırdırmı?</li>
  <li>Mətn, foto və loqo kimdə hazırlanacaq?</li>
  <li>Büdcə aralığım və son tarixim nədir?</li>
  <li>Son təsdiqi kim verəcək?</li>
</ul>
<p>Podratçı seçərkən ona veriləcək suallar üçün: <a href="/blog-details/veb-sayt-hazirlatmazdan-evvel-12-sual">Veb Sayt Hazırlatmazdan Əvvəl 12 Sual</a>. Qiymət aralıqları üçün: <a href="/blog-details/veb-sayt-qiymeti-azerbaycan-2026">Veb Sayt Qiyməti 2026</a>.</p>

<h2>RS Code-da Brif Necə Doldurulur?</h2>
<p>Saytımızda yuxarıdakı <strong>"Sifariş et"</strong> düyməsini basın və xidmət növünü seçin: loqo, sayt, SMM və digər xidmətlər üçün hazır brif formaları var. Suallar bu yazıdakı bölmələrə əsaslanır; doldurmaq 10–15 dəqiqə çəkir. Brifi aldıqdan sonra sizinlə əlaqə saxlayıb dəqiq qiymət və iş planı təqdim edirik. Ətraflı: <a href="/veb-saytlarin-hazirlanmasi">veb sayt hazırlanması</a>, <a href="/loqo-hazirlanmasi">loqo hazırlanması</a>, <a href="/smm-xidmeti">SMM xidməti</a>.</p>

<h2>Tez-tez Verilən Suallar</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Brif nədir?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Brif layihə haqqında əsas məlumatları — şirkət, məqsəd, auditoriya, rəqiblər, nümunələr, büdcə və müddət — toplayan qısa sənəddir. Podratçı onun əsasında qiymət və iş planı hazırlayır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Brifi doldurmaq nə qədər vaxt aparır?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Adətən 10–30 dəqiqə. Nümunələri və hazır materialları əvvəlcədən toplasanız, daha tez olur.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Bütün suallara cavab bilmirəmsə nə etməli?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Bildiklərinizi yazın, qalanını boş saxlayın. Podratçı konsultasiya zamanı əlavə suallarla boşluqları doldurmağa kömək edəcək.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Büdcəni brifdə yazmaq lazımdırmı?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Tövsiyə olunur. Təxmini büdcə aralığı podratçıya imkanlarınıza uyğun həll təklif etməyə kömək edir və vaxt itkisinin qarşısını alır.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Brif doldurmaq məni sifarişə məcbur edirmi?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Xeyr. Brif qiymət və iş planı almaq üçündür; təklifi gördükdən sonra qərarı siz verirsiniz.</p>
    </div>
  </div>
</div>

<h2>Nəticə</h2>
<p>Yaxşı brif yaxşı layihənin yarısıdır: dəqiq qiymət, az düzəliş, vaxtında nəticə. Şirkət, məqsəd, auditoriya, rəqiblər, nümunələr, materiallar, büdcə və qərar verən şəxs — bu 8 bölməni doldurmaq podratçı ilə ilk gündən eyni dildə danışmağa imkan verir.</p>
<p><strong>Saytın yuxarısındakı "Sifariş et" düyməsi ilə brifi doldurun</strong> və ya <a href="/elaqe">bizimlə əlaqə saxlayın</a>.</p>
HTML;

        $textEn = <<<'HTML'
<p>"We need a beautiful website" — that's how many projects start, and exactly why they drag on, cost more and miss expectations. The reason is simple: the contractor doesn't know your business, goals or taste. A <strong>brief</strong> is a short document that fills this gap: it gathers the key project information in one place so the designer and developer head in the right direction from day one.</p>
<p>This article explains what a brief is, which sections it should include, what to focus on for websites, logos and SMM, and the most common mistakes.</p>

<h2>What Does a Brief Give You?</h2>
<ul>
  <li><strong>An accurate price and timeline:</strong> When the contractor knows what to build, you get a concrete quote rather than a guess.</li>
  <li><strong>Fewer revisions:</strong> With expectations written down up front, the "this isn't what I wanted" stage gets shorter.</li>
  <li><strong>Time saved:</strong> One document instead of hours of messaging.</li>
  <li><strong>Fewer disputes:</strong> An agreed brief is the written basis of the project.</li>
</ul>

<h2>8 Sections Every Brief Needs</h2>
<ol>
  <li><strong>About the company:</strong> What you do, since when, in which city, your main products or services.</li>
  <li><strong>Project goal:</strong> Increase sales, collect leads, refresh the brand, enter a new market — a measurable goal is best.</li>
  <li><strong>Target audience:</strong> Who your customers are — age, city, income, profession, what problem they want solved.</li>
  <li><strong>Competitors:</strong> 3–5 competitor names and websites; what you like and dislike about them.</li>
  <li><strong>References:</strong> 2–3 websites, logos or pages you like — with a short note such as "this colour" or "this simplicity".</li>
  <li><strong>Ready materials:</strong> Logo, brand book, texts, photos, product list — what's ready and what the contractor must create.</li>
  <li><strong>Budget and timeline:</strong> An approximate budget range and deadline. Being open about the budget helps find the right solution.</li>
  <li><strong>Decision maker:</strong> Who approves the project — delays often happen because "the boss hasn't looked yet".</li>
</ol>

<h2>Brief by Project Type: What to Focus On</h2>
<table>
  <thead>
    <tr><th>Project</th><th>Specifically include</th></tr>
  </thead>
  <tbody>
    <tr><td>Website</td><td>List of pages, languages (AZ/EN/RU), required features (forms, online payment, catalogue, booking), domain and hosting, admin panel requirements</td></tr>
    <tr><td>Logo</td><td>Brand name and its meaning, where the logo will be used (signage, packaging, social media), colours and symbols to avoid, what to keep if an existing logo is being updated</td></tr>
    <tr><td>SMM</td><td>Which platforms, how many posts/reels per month, tone (formal, friendly, humorous), ad budget, who will shoot the content</td></tr>
  </tbody>
</table>

<h2>6 Most Common Mistakes</h2>
<ol>
  <li><strong>"Make it modern and beautiful":</strong> It means something different to everyone — show examples.</li>
  <li><strong>No goal:</strong> "We need a website" isn't a goal; "50 enquiries a month" is.</li>
  <li><strong>Everyone as the audience:</strong> "Everyone is our customer" weakens both design and copy.</li>
  <li><strong>Leaving materials until last:</strong> When texts and photos are late, the whole project is late.</li>
  <li><strong>Hiding the budget:</strong> The contractor proposes something either too expensive or too basic.</li>
  <li><strong>Too many opinions:</strong> When a new person comments at every stage, the project goes in circles — appoint one decision maker.</li>
</ol>

<h2>A Quick Checklist Before Filling In the Brief</h2>
<ul>
  <li>Can I explain my business in 2–3 sentences?</li>
  <li>What exactly do I expect from the project, and how will I measure it?</li>
  <li>Are examples I like and dislike ready?</li>
  <li>Who will prepare the text, photos and logo?</li>
  <li>What is my budget range and deadline?</li>
  <li>Who gives final approval?</li>
</ul>
<p>Questions to ask a contractor: <a href="/blog-details/12-questions-before-building-website-2026">12 Questions Before Building a Website</a>. Price ranges: <a href="/blog-details/website-cost-azerbaijan-2026">Website Cost 2026</a>.</p>

<h2>How to Fill In a Brief at RS Code</h2>
<p>Click the <strong>"Order Now"</strong> button at the top of our site and choose the service: there are ready brief forms for logo, website, SMM and other services. The questions follow the sections in this article and take 10–15 minutes. Once we receive your brief, we contact you with an exact quote and project plan. More: <a href="/website-development">website development</a>, <a href="/logo-design">logo design</a>, <a href="/smm-services">SMM services</a>.</p>

<h2>Frequently Asked Questions</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is a brief?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">A brief is a short document collecting the key project information — company, goal, audience, competitors, references, budget and timeline. The contractor uses it to prepare a quote and work plan.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">How long does it take to fill in a brief?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Usually 10–30 minutes. It's faster if you gather references and ready materials in advance.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What if I can't answer every question?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Write what you know and leave the rest blank. The contractor will help fill the gaps with follow-up questions during the consultation.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Should I include the budget in the brief?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">It's recommended. An approximate budget range helps the contractor propose a solution that fits your means and avoids wasted time.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does filling in a brief commit me to an order?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">No. The brief is for getting a quote and work plan; you decide after seeing the proposal.</p>
    </div>
  </div>
</div>

<h2>Conclusion</h2>
<p>A good brief is half of a good project: an accurate price, fewer revisions and on-time results. Company, goal, audience, competitors, references, materials, budget and decision maker — filling in these 8 sections lets you and the contractor speak the same language from day one.</p>
<p><strong>Fill in the brief using the "Order Now" button at the top of the site</strong> or <a href="/contact">contact us</a>.</p>
HTML;

        $textRu = <<<'HTML'
<p>«Нам нужен красивый сайт» — так начинаются многие проекты, и именно поэтому они затягиваются, дорожают и не оправдывают ожиданий. Причина проста: подрядчик не знает ваш бизнес, цели и вкус. <strong>Бриф</strong> — короткий документ, который закрывает этот пробел: собирает ключевую информацию о проекте в одном месте, чтобы дизайнер и программист с первого дня двигались в правильном направлении.</p>
<p>В статье объясняем, что такое бриф, из каких разделов он состоит, на что обратить внимание для сайта, логотипа и SMM, и какие ошибки встречаются чаще всего.</p>

<h2>Что даёт бриф?</h2>
<ul>
  <li><strong>Точная цена и сроки:</strong> когда подрядчик знает, что делать, вы получаете конкретное предложение, а не оценку «на глаз».</li>
  <li><strong>Меньше правок:</strong> когда ожидания записаны заранее, этап «это не то, что я хотел» короче.</li>
  <li><strong>Экономия времени:</strong> один документ вместо часов переписки.</li>
  <li><strong>Меньше споров:</strong> согласованный бриф — письменная основа проекта.</li>
</ul>

<h2>8 разделов, которые нужны каждому брифу</h2>
<ol>
  <li><strong>О компании:</strong> чем занимаетесь, с какого года, в каком городе, основные товары или услуги.</li>
  <li><strong>Цель проекта:</strong> рост продаж, сбор заявок, обновление бренда, выход на новый рынок — лучше всего измеримая цель.</li>
  <li><strong>Целевая аудитория:</strong> кто ваши клиенты — возраст, город, доход, профессия, какую проблему хотят решить.</li>
  <li><strong>Конкуренты:</strong> названия и сайты 3–5 конкурентов; что в них нравится и что нет.</li>
  <li><strong>Референсы:</strong> 2–3 сайта, логотипа или страницы, которые нравятся, — с коротким пояснением: «этот цвет», «эта простота».</li>
  <li><strong>Готовые материалы:</strong> логотип, брендбук, тексты, фото, список товаров — что готово, а что должен сделать подрядчик.</li>
  <li><strong>Бюджет и сроки:</strong> примерный диапазон бюджета и дедлайн. Открытость по бюджету помогает найти подходящее решение.</li>
  <li><strong>Кто принимает решение:</strong> кто утверждает проект — задержки часто случаются, потому что «руководитель ещё не посмотрел».</li>
</ol>

<h2>Бриф по типу проекта: на что обратить внимание</h2>
<table>
  <thead>
    <tr><th>Проект</th><th>Обязательно укажите</th></tr>
  </thead>
  <tbody>
    <tr><td>Сайт</td><td>Список страниц, языки (AZ/EN/RU), нужные функции (формы, онлайн-оплата, каталог, бронирование), домен и хостинг, требования к админ-панели</td></tr>
    <tr><td>Логотип</td><td>Название бренда и его смысл, где будет использоваться логотип (вывеска, упаковка, соцсети), нежелательные цвета и символы, что сохранить при обновлении текущего логотипа</td></tr>
    <tr><td>SMM</td><td>Какие платформы, сколько постов/reels в месяц, тон (официальный, дружеский, с юмором), рекламный бюджет, кто будет снимать контент</td></tr>
  </tbody>
</table>

<h2>6 самых частых ошибок</h2>
<ol>
  <li><strong>«Сделайте современно и красиво»:</strong> каждый понимает это по-своему — покажите примеры.</li>
  <li><strong>Нет цели:</strong> «нужен сайт» — не цель; «50 заявок в месяц» — цель.</li>
  <li><strong>Аудитория — все:</strong> «наши клиенты — все» ослабляет и дизайн, и тексты.</li>
  <li><strong>Материалы на потом:</strong> опаздывают тексты и фото — опаздывает весь проект.</li>
  <li><strong>Скрывать бюджет:</strong> подрядчик предложит либо слишком дорогое, либо слишком простое решение.</li>
  <li><strong>Слишком много мнений:</strong> когда на каждом этапе высказывается новый человек, проект ходит по кругу — назначьте одного ответственного.</li>
</ol>

<h2>Короткий чек-лист перед заполнением брифа</h2>
<ul>
  <li>Могу ли я описать свой бизнес в 2–3 предложениях?</li>
  <li>Чего конкретно я жду от проекта и как буду это измерять?</li>
  <li>Готовы ли примеры, которые нравятся и не нравятся?</li>
  <li>Кто подготовит тексты, фото и логотип?</li>
  <li>Какой у меня диапазон бюджета и дедлайн?</li>
  <li>Кто даёт финальное одобрение?</li>
</ul>
<p>Вопросы, которые стоит задать подрядчику: <a href="/blog-details/12-voprosov-pered-sozdaniem-sajta-2026">12 вопросов перед созданием сайта</a>. Диапазоны цен: <a href="/blog-details/stoimost-veb-sayta-azerbaydzhan-2026">Стоимость сайта 2026</a>.</p>

<h2>Как заполнить бриф в RS Code?</h2>
<p>Нажмите кнопку <strong>«Заказать»</strong> вверху сайта и выберите услугу: для логотипа, сайта, SMM и других услуг есть готовые формы брифа. Вопросы основаны на разделах этой статьи, заполнение занимает 10–15 минут. Получив бриф, мы свяжемся с вами и предложим точную цену и план работ. Подробнее: <a href="/razrabotka-sajtov">разработка сайтов</a>, <a href="/razrabotka-logo">разработка логотипа</a>, <a href="/smm-uslugi">SMM-продвижение</a>.</p>

<h2>Часто задаваемые вопросы</h2>
<div itemscope itemtype="https://schema.org/FAQPage">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что такое бриф?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Бриф — короткий документ с ключевой информацией о проекте: компания, цель, аудитория, конкуренты, референсы, бюджет и сроки. На его основе подрядчик готовит цену и план работ.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Сколько времени занимает заполнение брифа?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Обычно 10–30 минут. Быстрее, если заранее собрать референсы и готовые материалы.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Что делать, если я не знаю ответов на все вопросы?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Напишите то, что знаете, остальное оставьте пустым. Подрядчик поможет заполнить пробелы уточняющими вопросами на консультации.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Нужно ли указывать бюджет в брифе?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Рекомендуется. Примерный диапазон бюджета помогает подрядчику предложить решение по вашим возможностям и экономит время.</p>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Обязывает ли заполнение брифа к заказу?</h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">Нет. Бриф нужен, чтобы получить цену и план работ; решение вы принимаете после просмотра предложения.</p>
    </div>
  </div>
</div>

<h2>Итог</h2>
<p>Хороший бриф — половина хорошего проекта: точная цена, меньше правок и результат в срок. Компания, цель, аудитория, конкуренты, референсы, материалы, бюджет и ответственный за решение — заполнив эти 8 разделов, вы с подрядчиком с первого дня говорите на одном языке.</p>
<p><strong>Заполните бриф через кнопку «Заказать» вверху сайта</strong> или <a href="/kontakty">свяжитесь с нами</a>.</p>
HTML;

        DB::table('blogs')->updateOrInsert(
            ['slug_az' => 'brif-nece-doldurulur-2026'],
            [
                'slug_en' => 'how-to-write-project-brief-2026',
                'slug_ru' => 'kak-zapolnit-brif-2026',

                'title_az' => 'Sayt, Loqo və SMM Sifarişindən Əvvəl Brif Necə Doldurulur? 2026 Bələdçisi',
                'title_en' => 'How to Write a Brief Before Ordering a Website, Logo or SMM: 2026 Guide',
                'title_ru' => 'Как заполнить бриф перед заказом сайта, логотипа или SMM: гид 2026',

                'review_az' => 'Brif nədir və niyə layihənin yarısıdır? Hər brifdə olmalı 8 bölmə, sayt, loqo və SMM üçün xüsusi suallar, ən çox edilən 6 səhv və qısa yoxlama siyahısı.',
                'review_en' => 'What a brief is and why it\'s half the project. 8 sections every brief needs, specific questions for websites, logos and SMM, the 6 most common mistakes and a quick checklist.',
                'review_ru' => 'Что такое бриф и почему это половина проекта. 8 обязательных разделов, вопросы для сайта, логотипа и SMM, 6 частых ошибок и короткий чек-лист.',

                'text_az' => $textAz,
                'text_en' => $textEn,
                'text_ru' => $textRu,

                'date_az' => '5 Oktyabr 2026',
                'date_en' => 'October 5, 2026',
                'date_ru' => '5 Октября 2026',

                'photo'    => 'cover-brif-az.png',
                'photo_en' => 'cover-brif-en.png',
                'photo_ru' => 'cover-brif-ru.png',

                'meta_title_az' => 'Brif Necə Doldurulur? Sayt, Loqo, SMM 2026 | RS Code',
                'meta_title_en' => 'How to Write a Project Brief: Website, Logo, SMM | RS Code',
                'meta_title_ru' => 'Как заполнить бриф: сайт, логотип, SMM 2026 | RS Code',

                'meta_description_az' => 'Sayt, loqo və ya SMM sifarişindən əvvəl brif necə doldurulur? 8 əsas bölmə, layihə növünə görə suallar, tipik səhvlər və yoxlama siyahısı. Pulsuz bələdçi.',
                'meta_description_en' => 'How to write a brief before ordering a website, logo or SMM: 8 key sections, questions by project type, common mistakes and a checklist. A free guide.',
                'meta_description_ru' => 'Как заполнить бриф перед заказом сайта, логотипа или SMM: 8 основных разделов, вопросы по типу проекта, частые ошибки и чек-лист. Бесплатный гид.',

                'meta_keywords_az' => 'brif nədir, brif necə doldurulur, sayt brifi, loqo brifi, SMM brifi, texniki tapşırıq, sayt sifarişi 2026',
                'meta_keywords_en' => 'what is a brief, how to write a brief, website brief, logo brief, SMM brief, project brief template 2026',
                'meta_keywords_ru' => 'что такое бриф, как заполнить бриф, бриф на сайт, бриф на логотип, бриф SMM, техническое задание 2026',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
