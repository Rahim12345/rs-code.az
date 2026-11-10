<?php

return [
    'domenTitle' => 'Domen nədir? Sadə izah, nümunələr və düzgün domen seçimi',

    'x_short' => '<strong>Qısa cavab:</strong> domen saytın internetdəki ünvanıdır — məsələn, <strong>rs-code.az</strong>. Kompüterlər bir-birini rəqəmlərlə (IP ünvanı) tanıyır, domen isə bu rəqəmləri yadda qalan ada çevirir. Domen illik ödənişlə qeydiyyata alınır və sayt açmaq üçün ona əlavə olaraq <strong>hostinq</strong> lazımdır.',

    'domen1' => 'Domen nədir?',
    'domen2' => 'Domen (domain, bəzən "domeyn" də yazılır) veb saytın internetdəki adı və ünvanıdır. İstifadəçi brauzerə domeni yazır və sayt açılır. Domen olmadan saytı yalnız rəqəmlərdən ibarət IP ünvanı ilə açmaq olardı, bunu isə heç kim yadda saxlamır.',
    'domen3' => 'Domen şirkətin internetdəki vizit kartıdır: sayt ünvanında, korporativ e-poçtda (info@sirketiniz.az), reklamlarda və sosial şəbəkə profillərində eyni ad istifadə olunur. Ona görə domen seçimi brend qərarıdır, sadəcə texniki addım deyil.',
    'domen4' => 'Domen almaq onu birdəfəlik satın almaq demək deyil — domen 1 ildən 10 ilə qədər müddətə qeydiyyata alınır və vaxtında yenilənməlidir. Yenilənməyən domen bir müddət sonra boşalır və başqası onu ala bilər.',
    'domen5' => 'Domen adında hərf, rəqəm və tire (-) istifadə etmək olar. Hər hissə 63 simvola qədər ola bilər, amma praktikada qısa ad həmişə daha yaxşıdır.',

    'how_title' => 'Domen necə işləyir?',
    'how_steps' => [
        'İstifadəçi brauzerə <strong>sirketiniz.az</strong> yazır.',
        'Brauzer DNS sisteminə müraciət edir: "bu domen hansı IP ünvanındadır?"',
        'DNS domenin bağlandığı serverin (hostinqin) IP ünvanını qaytarır.',
        'Brauzer həmin serverə qoşulur və sayt açılır.',
    ],
    'how_note' => 'Bu proses saniyənin bir hissəsində baş verir. Domeni bir hostinqdən digərinə köçürəndə DNS qeydlərini dəyişirsiniz — domen adı isə eyni qalır.',

    'parts_title' => 'Domenin hissələri',
    'parts' => [
        ['<strong>www</strong>', 'Alt domen (subdomain). Məcburi deyil: rs-code.az və www.rs-code.az eyni sayta yönləndirilə bilər. Alt domen başqa məqsədlər üçün də yaradıla bilər, məsələn blog.sirketiniz.az.'],
        ['<strong>rs-code</strong>', 'Əsas ad — seçdiyiniz və qeydiyyata aldığınız hissə.'],
        ['<strong>.az</strong>', 'Uzantı (zona, TLD). Domenin növünü və ya ölkəsini göstərir.'],
    ],

    'domen6' => 'Domen, hostinq və sayt: fərq nədir?',
    'domen7' => 'Domen almaq sayt açmaq üçün kifayət deyil. Sadə müqayisə: domen — ünvandır, hostinq — saytın faylları saxlanılan "torpaq sahəsi"dir, sayt isə həmin sahədə tikilən "evdir". Üçü də lazımdır: domen istifadəçini hostinqə yönləndirir, hostinq saytı göstərir. Domen və hostinqi fərqli şirkətlərdən almaq da olar.',

    'domen8' => 'Domen uzantıları nə məna ifadə edir?',
    'domen9' => '.az — Azərbaycanın ölkə domeni.',
    'domen10' => '.com.az, .org.az, .net.az, .edu.az — .az zonasının ikinci səviyyəli domenləri.',
    'domen11' => '.com — ilkin olaraq kommersiya təşkilatları üçün, bu gün ən geniş yayılmış beynəlxalq uzantı.',
    'domen12' => '.org — ilkin olaraq qeyri-kommersiya təşkilatları üçün.',
    'domen13' => '.net — ilkin olaraq internet və şəbəkə layihələri üçün.',
    'domen14' => '.edu, .gov — təhsil və dövlət qurumları üçün məhdud zonalar.',
    'domen15' => '.info, .biz — məlumat saytları və biznes üçün ümumi uzantılar.',
    'domen16' => '.shop, .online, .store və s. — yeni ümumi uzantılar.',

    'domen17' => '.az, yoxsa .com?',
    'domen18' => 'Əsasən Azərbaycanda müştəriyə xidmət edirsinizsə, .az domeni yerli şirkət olduğunuzu göstərir və müştəri üçün tanışdır. Beynəlxalq bazara işləyirsinizsə, .com daha uyğundur. Bir çox şirkət hər ikisini alır: əsas sayt birində açılır, digəri ona yönləndirilir. Bu, həm də başqasının oxşar adla sayt açmasının qarşısını alır.',

    'choose_title' => 'Biznes üçün düzgün domen necə seçilir?',
    'choose' => [
        ['Qısa və yadda qalan olsun', 'Telefonla deyəndə hərf-hərf izah etmək lazım gəlməsin.'],
        ['Brendlə eyni olsun', 'Şirkət adı, Instagram profili və domen eyni olanda müştəri sizi asan tapır.'],
        ['Ə, Ş, Ç, Ö, Ü, Ğ, I hərflərindən qaçın', 'Latın hərfləri ilə yazın: məsələn, "çiçək" yox, "cicek". Belə ad hər klaviaturada eyni yazılır.'],
        ['Tire və rəqəmləri az işlədin', 'Lazım olsa bir tire normaldır, amma "sirket-2024-baku" kimi adlar yadda qalmır.'],
        ['Hüquqi riskləri yoxlayın', 'Başqa şirkətin tanınmış brendini və ya ticarət nişanını domen adında istifadə etməyin.'],
        ['Vaxtında yeniləyin', 'Avtomatik yeniləməni aktiv edin və yenilənmə xatırlatmalarının gəldiyi e-poçtu aktual saxlayın.'],
    ],

    'buy_title' => 'Domen necə alınır?',
    'buy_steps' => [
        'İstədiyiniz adın boş olub-olmadığını qeydiyyatçının saytında yoxlayın.',
        'Uzantını seçin (.az, .com və s.) və müddəti təyin edin (adətən 1 il).',
        'Sahibin məlumatlarını düzgün daxil edin — domen kimin adına qeydiyyata alınıbsa, ona o sahibdir.',
        'Ödənişi edin və domeni hostinqə bağlayın (DNS qeydləri).',
        'Korporativ e-poçt və SSL sertifikatını qurun.',
    ],
    'buy_note' => '.az domenləri akkreditə olunmuş qeydiyyatçılar vasitəsilə qeydiyyata alınır, .com və digər beynəlxalq uzantılar isə beynəlxalq qeydiyyatçılardan. Qiymət uzantıya və qeydiyyatçıya görə dəyişir. Vacib məsləhət: domeni şirkətin öz adına və öz hesabına qeydiyyata alın — sayt hazırlayan şəxsin adına yox.',

    'x_faq_title' => 'Tez-tez verilən suallar',
    'x_faq' => [
        ['Domen nədir?', 'Domen saytın internetdəki ünvanıdır, məsələn rs-code.az. O, serverin rəqəmlərdən ibarət IP ünvanını yadda qalan ada çevirir və istifadəçi brauzerə bu adı yazaraq sayta daxil olur.'],
        ['Domen ilə hostinq arasında fərq nədir?', 'Domen ünvandır, hostinq isə saytın fayllarının saxlandığı serverdir. Sayt açmaq üçün ikisi də lazımdır: domen istifadəçini hostinqə yönləndirir.'],
        ['Domen birdəfəlik alınır?', 'Xeyr. Domen 1 ildən 10 ilə qədər müddətə qeydiyyata alınır və vaxtında yenilənməlidir. Yenilənməyən domen boşalır və başqası tərəfindən alına bilər.'],
        ['.az domeni harada alınır?', '.az domenləri akkreditə olunmuş qeydiyyatçılar vasitəsilə qeydiyyata alınır. Domeni şirkətin öz adına və öz hesabına qeydiyyata almaq tövsiyə olunur.'],
        ['.az, yoxsa .com seçmək lazımdır?', 'Azərbaycan bazarı üçün .az, beynəlxalq bazar üçün .com daha uyğundur. Çox vaxt ikisini də alıb birini digərinə yönləndirmək ən etibarlı yoldur.'],
        ['Domenlə korporativ e-poçt açmaq olarmı?', 'Bəli. Domeniniz varsa, info@sirketiniz.az kimi korporativ e-poçt ünvanları yaratmaq olar. Bax: <a href="/korporativ-email" class="text-violet-300 underline">korporativ email qurulması</a>.'],
    ],
];
