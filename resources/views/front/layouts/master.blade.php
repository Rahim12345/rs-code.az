@php
    $logotips      = \App\Models\LogoTip::all();
    $vizit_karts   = \App\Models\VizitKart::all();
    $konverts      = \App\Models\Konvert::all();
    $styles        = \App\Models\FirmaStili::all();
    $veb_dasiyicis = \App\Models\VebDasiyici::with('numunes')->get();
    $veb_vesaits   = \App\Models\VebVesait::all();
    $lang          = session('lang', 'az');
@endphp
<!DOCTYPE html>
<html lang="{{ $lang }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="VUYowyHre6ewr9gpY1xcdfhkeZS4_JMKO52DzOTko1w">
    <meta name="robots" content="@yield('robots', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')">
    @php
        $siteBase  = 'https://rs-code.az';
        $curPath   = strtok(request()->getRequestUri(), '?');
        $ogLocale  = $lang === 'ru' ? 'ru_RU' : ($lang === 'en' ? 'en_US' : 'az_AZ');

        // Hreflang map — every AZ / EN / RU path triple
        $hreflangMap = [
            '/'                                 => ['az'=>'/',                                  'en'=>'/',                             'ru'=>'/'],
            '/haqqimizda'                       => ['az'=>'/haqqimizda',                       'en'=>'/about',                        'ru'=>'/o-nas'],
            '/about'                            => ['az'=>'/haqqimizda',                       'en'=>'/about',                        'ru'=>'/o-nas'],
            '/o-nas'                            => ['az'=>'/haqqimizda',                       'en'=>'/about',                        'ru'=>'/o-nas'],
            '/elaqe'                            => ['az'=>'/elaqe',                            'en'=>'/contact',                      'ru'=>'/kontakty'],
            '/contact'                          => ['az'=>'/elaqe',                            'en'=>'/contact',                      'ru'=>'/kontakty'],
            '/kontakty'                         => ['az'=>'/elaqe',                            'en'=>'/contact',                      'ru'=>'/kontakty'],
            '/xidmetler'                        => ['az'=>'/xidmetler',                        'en'=>'/services',                     'ru'=>'/uslugi'],
            '/services'                         => ['az'=>'/xidmetler',                        'en'=>'/services',                     'ru'=>'/uslugi'],
            '/uslugi'                           => ['az'=>'/xidmetler',                        'en'=>'/services',                     'ru'=>'/uslugi'],
            '/isler'                            => ['az'=>'/isler',                            'en'=>'/portfolio',                    'ru'=>'/portfolio-ru'],
            '/portfolio'                        => ['az'=>'/isler',                            'en'=>'/portfolio',                    'ru'=>'/portfolio-ru'],
            '/portfolio-ru'                     => ['az'=>'/isler',                            'en'=>'/portfolio',                    'ru'=>'/portfolio-ru'],
            '/bloqlar'                          => ['az'=>'/bloqlar',                          'en'=>'/blogs',                        'ru'=>'/blogi'],
            '/blogs'                            => ['az'=>'/bloqlar',                          'en'=>'/blogs',                        'ru'=>'/blogi'],
            '/blogi'                            => ['az'=>'/bloqlar',                          'en'=>'/blogs',                        'ru'=>'/blogi'],
            '/suallar'                          => ['az'=>'/suallar',                          'en'=>'/faq',                          'ru'=>'/chasto-zadavaemye-voprosy'],
            '/faq'                              => ['az'=>'/suallar',                          'en'=>'/faq',                          'ru'=>'/chasto-zadavaemye-voprosy'],
            '/chasto-zadavaemye-voprosy'        => ['az'=>'/suallar',                          'en'=>'/faq',                          'ru'=>'/chasto-zadavaemye-voprosy'],
            '/veb-saytlarin-hazirlanmasi'       => ['az'=>'/veb-saytlarin-hazirlanmasi',       'en'=>'/website-development',          'ru'=>'/razrabotka-sajtov'],
            '/website-development'              => ['az'=>'/veb-saytlarin-hazirlanmasi',       'en'=>'/website-development',          'ru'=>'/razrabotka-sajtov'],
            '/razrabotka-sajtov'                => ['az'=>'/veb-saytlarin-hazirlanmasi',       'en'=>'/website-development',          'ru'=>'/razrabotka-sajtov'],
            '/seo-xidmeti'                      => ['az'=>'/seo-xidmeti',                      'en'=>'/seo-services',                 'ru'=>'/seo-uslugi'],
            '/seo-services'                     => ['az'=>'/seo-xidmeti',                      'en'=>'/seo-services',                 'ru'=>'/seo-uslugi'],
            '/seo-uslugi'                       => ['az'=>'/seo-xidmeti',                      'en'=>'/seo-services',                 'ru'=>'/seo-uslugi'],
            '/domen-nedir'                      => ['az'=>'/domen-nedir',                      'en'=>'/what-is-domain',               'ru'=>'/chto-takoe-domen'],
            '/what-is-domain'                   => ['az'=>'/domen-nedir',                      'en'=>'/what-is-domain',               'ru'=>'/chto-takoe-domen'],
            '/chto-takoe-domen'                 => ['az'=>'/domen-nedir',                      'en'=>'/what-is-domain',               'ru'=>'/chto-takoe-domen'],
            '/ssl-sertifikati-nedir'            => ['az'=>'/ssl-sertifikati-nedir',            'en'=>'/what-is-ssl-certificate',      'ru'=>'/chto-takoe-ssl-sertifikat'],
            '/what-is-ssl-certificate'          => ['az'=>'/ssl-sertifikati-nedir',            'en'=>'/what-is-ssl-certificate',      'ru'=>'/chto-takoe-ssl-sertifikat'],
            '/chto-takoe-ssl-sertifikat'        => ['az'=>'/ssl-sertifikati-nedir',            'en'=>'/what-is-ssl-certificate',      'ru'=>'/chto-takoe-ssl-sertifikat'],
            '/smm-xidmeti'                      => ['az'=>'/smm-xidmeti',                      'en'=>'/smm-services',                 'ru'=>'/smm-uslugi'],
            '/smm-services'                     => ['az'=>'/smm-xidmeti',                      'en'=>'/smm-services',                 'ru'=>'/smm-uslugi'],
            '/smm-uslugi'                       => ['az'=>'/smm-xidmeti',                      'en'=>'/smm-services',                 'ru'=>'/smm-uslugi'],
            '/google-reklamlari'                => ['az'=>'/google-reklamlari',                'en'=>'/google-ads',                   'ru'=>'/reklama-google'],
            '/google-ads'                       => ['az'=>'/google-reklamlari',                'en'=>'/google-ads',                   'ru'=>'/reklama-google'],
            '/reklama-google'                   => ['az'=>'/google-reklamlari',                'en'=>'/google-ads',                   'ru'=>'/reklama-google'],
            '/loqo-hazirlanmasi'                => ['az'=>'/loqo-hazirlanmasi',                'en'=>'/logo-design',                  'ru'=>'/razrabotka-logo'],
            '/logo-design'                      => ['az'=>'/loqo-hazirlanmasi',                'en'=>'/logo-design',                  'ru'=>'/razrabotka-logo'],
            '/razrabotka-logo'                  => ['az'=>'/loqo-hazirlanmasi',                'en'=>'/logo-design',                  'ru'=>'/razrabotka-logo'],
            '/facebook-ve-instagram-reklamlari' => ['az'=>'/facebook-ve-instagram-reklamlari', 'en'=>'/facebook-instagram-ads',       'ru'=>'/reklama-facebook-instagram'],
            '/facebook-instagram-ads'           => ['az'=>'/facebook-ve-instagram-reklamlari', 'en'=>'/facebook-instagram-ads',       'ru'=>'/reklama-facebook-instagram'],
            '/reklama-facebook-instagram'       => ['az'=>'/facebook-ve-instagram-reklamlari', 'en'=>'/facebook-instagram-ads',       'ru'=>'/reklama-facebook-instagram'],
            '/backlink-nedir'                   => ['az'=>'/backlink-nedir',                   'en'=>'/what-is-backlink',             'ru'=>'/chto-takoe-backlink'],
            '/what-is-backlink'                 => ['az'=>'/backlink-nedir',                   'en'=>'/what-is-backlink',             'ru'=>'/chto-takoe-backlink'],
            '/chto-takoe-backlink'              => ['az'=>'/backlink-nedir',                   'en'=>'/what-is-backlink',             'ru'=>'/chto-takoe-backlink'],
            '/kontent-marketinq'                => ['az'=>'/kontent-marketinq',                'en'=>'/content-marketing',            'ru'=>'/kontent-marketing'],
            '/content-marketing'                => ['az'=>'/kontent-marketinq',                'en'=>'/content-marketing',            'ru'=>'/kontent-marketing'],
            '/kontent-marketing'                => ['az'=>'/kontent-marketinq',                'en'=>'/content-marketing',            'ru'=>'/kontent-marketing'],
            '/texniki-destek'                   => ['az'=>'/texniki-destek',                   'en'=>'/technical-support',            'ru'=>'/tekhnicheskaya-podderzhka'],
            '/technical-support'                => ['az'=>'/texniki-destek',                   'en'=>'/technical-support',            'ru'=>'/tekhnicheskaya-podderzhka'],
            '/tekhnicheskaya-podderzhka'        => ['az'=>'/texniki-destek',                   'en'=>'/technical-support',            'ru'=>'/tekhnicheskaya-podderzhka'],
            '/korporativ-email'                 => ['az'=>'/korporativ-email',                 'en'=>'/corporate-email',              'ru'=>'/korporativnaya-pochta'],
            '/corporate-email'                  => ['az'=>'/korporativ-email',                 'en'=>'/corporate-email',              'ru'=>'/korporativnaya-pochta'],
            '/korporativnaya-pochta'            => ['az'=>'/korporativ-email',                 'en'=>'/corporate-email',              'ru'=>'/korporativnaya-pochta'],
        ];
        $lookupPath   = rtrim($curPath, '/') ?: '/';
        $hreflangAlts = $hreflangMap[$lookupPath] ?? null;
    @endphp
    <title>@yield('title', 'RS Code') — Proqram Yazılması & Veb Sayt | Bakı</title>
    <meta name="description"         content="@yield('description', 'RS Code — Bakıda proqram yazılması, veb sayt, mobil tətbiq, CRM/ERP, loqo dizaynı, SMM və SEO xidmətləri. Biznesinizi rəqəmsal dünyaya daşıyırıq.')">
    <link rel="canonical"            href="@yield('canonical', $siteBase . $curPath)">
    @hasSection('hreflang')
        @yield('hreflang')
    @elseif($hreflangAlts)
    <link rel="alternate" hreflang="az"        href="{{ $siteBase . $hreflangAlts['az'] }}">
    <link rel="alternate" hreflang="en"        href="{{ $siteBase . $hreflangAlts['en'] }}">
    <link rel="alternate" hreflang="ru"        href="{{ $siteBase . $hreflangAlts['ru'] }}">
    <link rel="alternate" hreflang="x-default" href="{{ $siteBase . $hreflangAlts['az'] }}">
    @else
    <link rel="alternate" hreflang="az"        href="{{ $siteBase . $curPath }}">
    <link rel="alternate" hreflang="en"        href="{{ $siteBase . $curPath }}">
    <link rel="alternate" hreflang="ru"        href="{{ $siteBase . $curPath }}">
    <link rel="alternate" hreflang="x-default" href="{{ $siteBase . $curPath }}">
    @endif
    <meta property="og:type"         content="@yield('og_type', 'website')">
    <meta property="og:url"          content="@yield('canonical', $siteBase . $curPath)">
    <meta property="og:title"        content="@yield('og_title', 'RS Code — Proqram Yazılması & Veb Sayt | Bakı')">
    <meta property="og:description"  content="@yield('og_desc', 'RS Code — Bakıda proqram yazılması, veb sayt, mobil tətbiq, CRM/ERP, loqo dizaynı, SMM və SEO xidmətləri. Biznesinizi rəqəmsal dünyaya daşıyırıq.')">
    <meta property="og:image"        content="@yield('og_image', $siteBase . '/img/og-default.jpg')">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name"    content="RS Code">
    <meta property="og:locale"       content="{{ $ogLocale }}">
    @if($__env->yieldContent('og_published'))
    <meta property="article:published_time" content="{{ $__env->yieldContent('og_published') }}">
    <meta property="article:modified_time"  content="{{ $__env->yieldContent('og_modified') }}">
    @endif
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:site"        content="@rscodeaz">
    <meta name="twitter:title"       content="@yield('og_title', 'RS Code — Proqram Yazılması & Veb Sayt | Bakı')">
    <meta name="twitter:description" content="@yield('og_desc', 'RS Code — Bakıda proqram yazılması, veb sayt, mobil tətbiq, CRM/ERP, loqo dizaynı, SMM və SEO xidmətləri. Biznesinizi rəqəmsal dünyaya daşıyırıq.')">
    <meta name="twitter:image"       content="@yield('og_image', $siteBase . '/img/og-default.jpg')">

    {{-- PWA --}}
    <link rel="manifest"             href="/manifest.json">
    <meta name="theme-color"         content="#6d28d9">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="RS Code">
    <link rel="apple-touch-icon"     href="{{ asset('img/apple-touch-icon.png') }}">
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('img/132.png') }}">
    <script type="application/ld+json">
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "RS Code",
      "url": "https://rs-code.az",
      "logo": "https://rs-code.az/img/rs-code.png",
      "image": "https://rs-code.az/img/og-default.jpg",
      "description": "RS Code — Azərbaycanın aparıcı proqram, veb sayt, mobil tətbiq və brendinq agentliyi. Bakı.",
      "telephone": "+994775829989",
      "email": "info@rs-code.az",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Bakı",
        "addressCountry": "AZ"
      },
      "areaServed": "AZ",
      "priceRange": "$$",
      "sameAs": [
        "https://www.instagram.com/rscode.az",
        "https://www.linkedin.com/company/rscode"
      ],
      "serviceType": [
        "Proqram yazılması",
        "Veb sayt hazırlanması",
        "Mobil tətbiq hazırlanması",
        "CRM sistemi",
        "ERP sistemi",
        "Loqo dizaynı",
        "SMM xidməti"
      ]
    }
    @endverbatim
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-[#09090b] text-zinc-100 antialiased overflow-x-hidden" x-data="{ orderModal: false, activeModal: '' }">

    @include('front.layouts.header')

    <main>@yield('content')</main>

    @include('front.layouts.footer')

    {{-- Brif / Sifaris Modal --}}
    @include('front.includes.sifaris')

    {{-- jQuery (brif modals üçün) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script>
    $(function(){
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        function submitBrif(btnId, formId, route) {
            $(btnId).on('click', function(){
                var $form = $('#' + formId);

                // Əvvəlki xətaları təmizlə
                $form.find('.is-invalid').removeClass('is-invalid');
                $form.find('[class$="-error"]').html('');

                var data = new FormData(document.getElementById(formId));
                $.ajax({ type:'POST', url:route, data:data, cache:false, processData:false, contentType:false,
                    success: function(r){
                        $('.modal-close').trigger('click');
                        $form[0].reset();
                        toastr.success(r.message);
                    },
                    error: function(e){
                        if (!e.responseJSON || !e.responseJSON.errors) return;
                        var firstField = null;
                        $.each(e.responseJSON.errors, function(fieldName, messages){
                            var msg = Array.isArray(messages) ? messages[0] : messages;
                            // Error mesajını göstər
                            $form.find('.' + fieldName + '-error').html(msg);
                            // Sahəni is-invalid et
                            var $field = $form.find('[name="' + fieldName + '"]').first();
                            if (!$field.length) {
                                // array fields: name="fieldName[]"
                                $field = $form.find('[name="' + fieldName + '[]"]').first();
                            }
                            if ($field.length) {
                                $field.addClass('is-invalid');
                                if (!firstField) firstField = $field;
                            }
                        });
                        // İlk xətalı sahəyə fokuslan və scroll et
                        if (firstField) {
                            firstField[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                            setTimeout(function(){ firstField.focus(); }, 350);
                        }
                    }
                });
            });
        }
        submitBrif('#modalOneBtn',  'brifModalOne',  '{!! route('front.brif.modal.one')  !!}');
        submitBrif('#modalTwoBtn',  'brifModalTwo',  '{!! route('front.brif.modal.two')  !!}');
        submitBrif('#modalThreeBtn','brifModalThree','{!! route('front.brif.modal.three')!!}');
        submitBrif('#modalFourBtn', 'brifModalFour', '{!! route('front.brif.modal.four') !!}');
        submitBrif('#brifModalFivez','brifModalFive','{!! route('front.brif.modal.five') !!}');
    });
    </script>
    @stack('scripts')
    <script>
    (function(){
        var TRACK_URL = '{{ route("track.click") }}';
        var CSRF     = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var HOST     = window.location.hostname;

        document.addEventListener('click', function(e){
            var a = e.target.closest('a');
            if (!a) return;
            var href = a.getAttribute('href');
            if (!href || href === '#' || href.startsWith('javascript')) return;

            // Absolute href
            var abs = href;
            if (href.startsWith('/') || (!href.startsWith('http') && !href.startsWith('tel:') && !href.startsWith('mailto:'))) {
                abs = window.location.origin + (href.startsWith('/') ? href : '/' + href);
            }

            var text = (a.innerText || a.getAttribute('aria-label') || '').trim().slice(0, 200);

            // Fire-and-forget beacon
            if (navigator.sendBeacon) {
                var fd = new FormData();
                fd.append('href', abs);
                fd.append('page', window.location.href);
                fd.append('text', text);
                fd.append('_token', CSRF);
                navigator.sendBeacon(TRACK_URL, fd);
            } else {
                fetch(TRACK_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
                    body: JSON.stringify({ href: abs, page: window.location.href, text: text }),
                    keepalive: true
                }).catch(function(){});
            }
        }, true);
    })();
    </script>
    {{-- PWA Service Worker --}}
    <script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js', { scope: '/' })
                .catch(function(){});
        });
    }
    </script>
</body>
</html>
