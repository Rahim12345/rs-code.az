<?php

return [
    'title' => 'Korporativ email (mail) qurulması: info@sirketiniz.az',
    'kop1' => 'İnternet məkanında korporativ kimliyinizin ən vacib faktorlarından biri şirkət domainində qurulmuş e-mail adresinizdir.',
    'kop2' => 'Xüsusən də, əgər yeni yaranmış şirkətsinizsə  rəqabətdə üstünlük əldə etməniz üçün öz şirkət imicinizi yüksək səviyyədə göstərməlisiniz. Şirkət emailindən istifadə həm də, sizin öz işinizə olan hörmətin, biznesinizə nə qədər ciddi yanaşmanızın göstəricisidir.',
    'kop3' => 'Korporativ mailin ən çox istifadə olunan formaları:',
    'kop4' => 'office@shirketiniz.az',
    'kop5' => 'info@shirketiniz.az',
    'kop6' => 'hr@shirketiniz.az',
    'kop7' => 'director@shirketiniz.az',
    'kop8' => 'adiniz.soyadiniz@shirketiniz.az',
    'kop9' => 'Əgər sizin üçün də şirkətinizin korporativ kimliyi və şirkət ciddiyyəti vacib amildirsə, mail.ru, gmail.com, hotmail.com, yahoo.com və s. əvəzinə, öz şirkətinizə məxsus e-mail hesablarını seçməlisiniz.',
    'kop10' => 'Xüsusən də yeni yaranmış şirkətlər üçün bu, çox mühüm məsələdir. Unutmayın ki, təkliflərinizi və yazışmalarınızı korporativ mail ilə etməniz şirkətinizə əlavə dəyər qazandırır.',
    'kop11' => 'Şirkət mailinin bilmədiyiniz 6 üstünlüyü:',
    'kop12' => 'Biznesinizin ciddiyyətini və professionallığını artırır',
    'kop13' => 'Müəssisənin bütün şöbələrinə gələn məktublara nəzarət sizdə olur',
    'kop14' => 'İşçi işdən çıxarsa ona məxsus korporativ emaili silmək, yönləndirmək və tam nəzarət etmək mümkündür',
    'kop15' => 'Avtomatik backup sistemi sayəsində maillərinizin ehtiyat nüsxəsi saxlanılır',
    'kop16' => 'Səhvən və ya kiberhücum zamanı mail silinərsə geri qaytarmaq mümkündür',
    'kop17' => 'Çox cüzi məbləğə başa gəlir',
    'x_short' => '<strong>Qısa cavab:</strong> korporativ email şirkətin öz domeni ilə açılan poçt ünvanıdır — məsələn, <strong>info@sirketiniz.az</strong>. Bunun üçün domen və poçt xidməti (hostinq poçtu, Google Workspace və ya Microsoft 365) lazımdır. Quraşdırma domenin DNS qeydlərinin (MX, SPF, DKIM, DMARC) düzgün qurulmasından ibarətdir. RS Code-da sayt hazırlatdıqda domenə bağlı korporativ email-in qurulması xidmətə daxildir.',

    'opt_title' => 'Korporativ email üçün 3 əsas variant',
    'opt_head' => ['Variant', 'Kimə uyğundur', 'Üstünlüyü', 'Nəzərə alın'],
    'opt_rows' => [
        ['Hostinq poçtu', 'Kiçik şirkətlər, bir neçə ünvan', 'Çox vaxt hostinq paketinə daxildir, əlavə abunə tələb etmir', 'Qutu həcmi və spam filtri hostinqdən asılıdır'],
        ['Google Workspace', 'Gmail interfeysinə öyrəşmiş komandalar', 'Tanış Gmail, Drive, Meet və güclü spam qorunması', 'Hər istifadəçi üçün aylıq abunə haqqı'],
        ['Microsoft 365', 'Outlook, Word və Excel ilə işləyən şirkətlər', 'Outlook, Teams və Office proqramları ilə tam inteqrasiya', 'Hər istifadəçi üçün aylıq abunə haqqı'],
    ],
    'opt_note' => 'Üçüncü tərəf xidmətlərinin (Google, Microsoft) planları və qiymətləri dəyişə bilər — aktual şərtləri onların rəsmi saytlarından yoxlayın.',

    'dns_title' => 'Məktublarınız spama düşməsin: DNS qeydləri',
    'dns_intro' => 'Korporativ email-in ən çox rast gəlinən problemi göndərilən məktubların alıcıda spam qovluğuna düşməsidir. Səbəb adətən domenin DNS qeydlərinin yarımçıq qurulmasıdır:',
    'dns_rows' => [
        ['MX', 'Domenə gələn məktubların hansı poçt serverinə çatdırılacağını göstərir. MX səhvdirsə, məktublar ümumiyyətlə gəlmir.'],
        ['SPF', 'Domeniniz adından hansı serverlərin məktub göndərə biləcəyini bildirir.'],
        ['DKIM', 'Məktuba rəqəmsal imza əlavə edir: alıcı məktubun yolda dəyişdirilmədiyini yoxlayır.'],
        ['DMARC', 'SPF və DKIM yoxlamasından keçməyən məktublarla nə edilməli olduğunu (qəbul, spam, rədd) müəyyən edir və sizə hesabat göndərir.'],
    ],
    'dns_note' => 'Gmail və Yahoo kimi böyük poçt xidmətləri çox məktub göndərənlərdən SPF, DKIM və DMARC tələb edir. Kiçik şirkət üçün də bu qeydlər məktubların çatdırılmasını əhəmiyyətli dərəcədə yaxşılaşdırır.',

    'steps_title' => 'Korporativ email necə qurulur?',
    'steps' => [
        'Domen seçilir və qeydiyyata alınır (artıq domeniniz varsa, ondan istifadə olunur).',
        'Poçt xidməti seçilir: hostinq poçtu, Google Workspace və ya Microsoft 365.',
        'Domenin DNS-ində MX, SPF, DKIM və DMARC qeydləri qurulur.',
        'Lazımi ünvanlar yaradılır: info@, sales@, işçilərin şəxsi ünvanları, yönləndirmələr.',
        'Poçt telefonda və kompüterdə (Gmail, Outlook, Apple Mail) qoşulur.',
        'Test məktubları göndərilir və spam yoxlaması aparılır.',
    ],
    'steps_note' => 'Köhnə poçtdan (məsələn, Gmail və ya mail.ru) korporativ ünvana keçəndə əvvəlki məktubları köçürmək və köhnə ünvandan yönləndirmə qurmaq mümkündür.',

    'x_faq_title' => 'Tez-tez verilən suallar',
    'x_faq' => [
        ['Korporativ email nədir?', 'Şirkətin öz domeni ilə açılan poçt ünvanıdır, məsələn info@sirketiniz.az. O, gmail.com və ya mail.ru ünvanlarından fərqli olaraq şirkətə məxsusdur və müştəridə daha çox etibar yaradır.'],
        ['Korporativ email üçün nə lazımdır?', 'Şirkətin domeni və poçt xidməti: hostinq poçtu, Google Workspace və ya Microsoft 365. Sonra domenin DNS-ində MX, SPF, DKIM və DMARC qeydləri qurulur.'],
        ['Korporativ emaildən Gmail tətbiqində istifadə etmək olarmı?', 'Bəli. Google Workspace seçsəniz, ünvan birbaşa Gmail-də işləyir. Hostinq poçtunu da Gmail, Outlook və ya telefonun poçt tətbiqinə qoşmaq olar.'],
        ['Məktublarım niyə spama düşür?', 'Ən çox səbəb SPF, DKIM və DMARC qeydlərinin olmaması və ya səhv qurulmasıdır. Bu qeydlər düzgün qurulanda məktubların çatdırılması xeyli yaxşılaşır.'],
        ['İşçi işdən çıxanda onun poçtu ilə nə etmək olar?', 'Korporativ poçt şirkətə məxsusdur: işçinin hesabını bağlamaq, şifrəsini dəyişmək və ya gələn məktubları başqa işçiyə yönləndirmək olar. Yazışmalar şirkətdə qalır.'],
        ['Sayt hazırlatdıqda korporativ email daxildirmi?', 'Bəli. RS Code-da <a href="/veb-saytlarin-hazirlanmasi" class="text-violet-300 underline">veb sayt hazırlanması</a> xidmətinə domenə bağlı korporativ email-in qurulması daxildir. Domen haqqında: <a href="/domen-nedir" class="text-violet-300 underline">domen nədir</a>.'],
    ],
];
