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
    <title>@yield('title', 'RS Code') — Brendinq & Rəqəmsal Agentlik</title>
    <meta name="description" content="@yield('description', 'RS Code — Azərbaycanın aparıcı dizayn, veb sayt və brendinq agentliyi.')">
    <link rel="canonical" href="@yield('canonical', 'https://rs-code.az' . strtok(request()->getRequestUri(), '?'))">

    {{-- Open Graph --}}
    @php
        $ogUrl   = \Illuminate\Support\Str::of('https://rs-code.az' . strtok(request()->getRequestUri(), '?'))->__toString();
        $ogTitle = trim(strip_tags(View::yieldContent('title') ?: 'RS Code')) . ' — Brendinq & Rəqəmsal Agentlik';
        $ogDesc  = trim(strip_tags(View::yieldContent('description') ?: 'RS Code — Azərbaycanın aparıcı dizayn, veb sayt və brendinq agentliyi.'));
        $ogImg   = trim(View::yieldContent('og_image') ?: 'https://rs-code.az/img/og-default.jpg');
        $ogType  = trim(View::yieldContent('og_type') ?: 'website');
    @endphp
    <meta property="og:type"        content="{{ $ogType }}">
    <meta property="og:url"         content="{{ $ogUrl }}">
    <meta property="og:title"       content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDesc }}">
    <meta property="og:image"       content="{{ $ogImg }}">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name"   content="RS Code">
    <meta property="og:locale"      content="{{ session('lang','az') === 'ru' ? 'ru_RU' : (session('lang','az') === 'en' ? 'en_US' : 'az_AZ') }}">
    <meta name="twitter:card"       content="summary_large_image">
    <meta name="twitter:title"      content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDesc }}">
    <meta name="twitter:image"      content="{{ $ogImg }}">

    <link rel="icon" type="image/png" href="{{ asset('img/132.png') }}">
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
</body>
</html>
