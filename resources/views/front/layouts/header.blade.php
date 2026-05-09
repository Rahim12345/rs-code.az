<header
    x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 40"
    :class="open ? '' : (scrolled ? 'bg-[#09090b]/90 backdrop-blur-xl border-b border-zinc-800/60 shadow-xl shadow-black/20' : 'bg-transparent')"
    class="fixed top-0 inset-x-0 z-50 transition-all duration-500">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2 shrink-0">
                <img src="{{ asset('img/rs-code.png') }}" alt="RS Code" class="h-8 lg:h-9 w-auto" width="709" height="144">
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center gap-1">
                @php
                    $navUrls = [
                        'az' => ['about' => '/haqqimizda', 'portfolio' => '/isler',        'blogs' => '/bloqlar', 'faq' => '/suallar',                     'contact' => '/elaqe'],
                        'en' => ['about' => '/about',      'portfolio' => '/portfolio',     'blogs' => '/blogs',   'faq' => '/faq',                         'contact' => '/contact'],
                        'ru' => ['about' => '/o-nas',      'portfolio' => '/portfolio-ru',  'blogs' => '/blogi',   'faq' => '/chasto-zadavaemye-voprosy',    'contact' => '/kontakty'],
                    ];
                    $nu = $navUrls[$lang] ?? $navUrls['az'];
                    $navItems = [
                        ['url' => '/',             'label' => __('index.main'),     'seg' => ''],
                        // Xidmətlər dropdown comes here (rendered separately below)
                        ['url' => $nu['portfolio'],'label' => __('index.projects'), 'seg' => 'portfolio'],
                        ['url' => $nu['blogs'],    'label' => __('index.blog'),      'seg' => 'blogs'],
                        ['url' => $nu['about'],    'label' => __('index.about'),     'seg' => 'about'],
                        ['url' => $nu['contact'],  'label' => __('index.contact'),   'seg' => 'contact'],
                    ];
                @endphp

                @php $seg1 = Request::segment(1); @endphp

                {{-- Ana Səhifə --}}
                <a href="/"
                   class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ $seg1 === '' ? 'text-violet-400 bg-violet-500/10' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                    {{ __('index.main') }}
                </a>

                {{-- Xidmətlər dropdown — ikinci sırada --}}
                <div class="relative" x-data="{ open: false }" @mouseenter="open=true" @mouseleave="open=false">
                    <button class="px-4 py-2 text-sm font-medium text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60 rounded-lg transition-all flex items-center gap-1">
                        {{ __('index.services') }}
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         class="absolute top-full left-0 w-64 pt-2 z-50">
                        <div class="bg-zinc-900 border border-zinc-800 rounded-xl shadow-2xl shadow-black/50 p-2">
                        @php
                        $serviceSlugs = [
                            'az' => [
                                '/veb-saytlarin-hazirlanmasi',
                                '/loqo-hazirlanmasi',
                                '/korporativ-email',
                                '/seo-xidmeti',
                                '/google-reklamlari',
                                '/smm-xidmeti',
                                '/texniki-destek',
                            ],
                            'en' => [
                                '/website-development',
                                '/logo-design',
                                '/corporate-email',
                                '/seo-services',
                                '/google-ads',
                                '/smm-services',
                                '/technical-support',
                            ],
                            'ru' => [
                                '/razrabotka-sajtov',
                                '/razrabotka-logo',
                                '/korporativnaya-pochta',
                                '/seo-uslugi',
                                '/reklama-google',
                                '/smm-uslugi',
                                '/tekhnicheskaya-podderzhka',
                            ],
                        ];
                        $slugs = $serviceSlugs[$lang] ?? $serviceSlugs['az'];
                        $services = [
                            [$slugs[0], __('index.header1')],
                            [$slugs[1], __('index.header3')],
                            [$slugs[2], __('index.header4')],
                            [$slugs[3], __('index.header5')],
                            [$slugs[4], __('index.header6')],
                            [$slugs[5], __('index.header9')],
                            [$slugs[6], __('index.header7')],
                        ]; @endphp
                        @foreach($services as [$href, $label])
                        <a href="{{ $href }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-zinc-400 hover:text-violet-400 hover:bg-violet-500/10 rounded-lg transition-all">
                            <span class="w-1.5 h-1.5 rounded-full bg-violet-500 shrink-0"></span>
                            {{ $label }}
                        </a>
                        @endforeach
                        </div>
                    </div>
                </div>

                {{-- Portfolio, Blog, Haqqımızda, Əlaqə --}}
                @foreach($navItems as $item)
                    @if($item['seg'] !== '')
                        @php
                            $active = ($item['seg'] === 'about'     && in_array($seg1, ['about','haqqimizda','o-nas']))
                                   || ($item['seg'] === 'portfolio' && in_array($seg1, ['portfolio','isler','portfolio-ru']))
                                   || ($item['seg'] === 'blogs'     && in_array($seg1, ['blogs','bloqlar','blogi']))
                                   || ($item['seg'] === 'contact'   && in_array($seg1, ['contact','elaqe','kontakty']));
                        @endphp
                        <a href="{{ $item['url'] }}"
                           class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                  {{ $active ? 'text-violet-400 bg-violet-500/10' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>

            {{-- Right: Lang + CTA --}}
            <div class="hidden lg:flex items-center gap-4">
                {{-- Language --}}
                <div class="flex items-center gap-1 bg-zinc-800/40 rounded-lg p-1">
                    @foreach(['az','ru','en'] as $l)
                    <a href="{{ isset($blogLangLinks) ? $blogLangLinks[$l] : route('front.lang', ['lang' => $l, 'from' => request()->path()]) }}"
                       class="px-2.5 py-1 text-xs font-semibold rounded-md transition-all
                              {{ $lang === $l ? 'bg-violet-600 text-white' : 'text-zinc-500 hover:text-zinc-200' }}">
                        {{ strtoupper($l) }}
                    </a>
                    @endforeach
                </div>

                {{-- CTA --}}
                <button @click="orderModal = true"
                        class="bg-violet-700 hover:bg-violet-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all hover:scale-105 hover:shadow-lg hover:shadow-violet-700/30">
                    {{ __('index.order') }}
                </button>
            </div>

            {{-- Mobile burger --}}
            <button @click="open = !open" :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="Menyunu aç/bağla" class="lg:hidden text-zinc-400 hover:text-white p-2">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open"  class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu — full-screen overlay --}}
    <div id="mobile-menu" x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display:none"
         class="lg:hidden fixed inset-0 z-[60] bg-[#09090b] flex flex-col">

        {{-- Top bar --}}
        <div class="flex items-center justify-between h-16 px-4 border-b border-zinc-800/60 shrink-0">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('img/rs-code.png') }}" alt="RS Code" class="h-8 w-auto" width="709" height="144">
            </a>
            <button @click="open = false" class="text-zinc-400 hover:text-white p-2 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Nav links --}}
        <nav class="flex flex-col gap-0.5 px-3 py-4 flex-1 overflow-y-auto">
            <a href="/"                     @click="open=false" class="px-4 py-3.5 text-sm font-medium text-zinc-300 hover:text-violet-400 hover:bg-violet-500/10 rounded-xl transition-all">{{ __('index.main') }}</a>
            <a href="{{ $nu['about'] }}"    @click="open=false" class="px-4 py-3.5 text-sm font-medium text-zinc-300 hover:text-violet-400 hover:bg-violet-500/10 rounded-xl transition-all">{{ __('index.about') }}</a>
            <a href="{{ $nu['portfolio'] }}" @click="open=false" class="px-4 py-3.5 text-sm font-medium text-zinc-300 hover:text-violet-400 hover:bg-violet-500/10 rounded-xl transition-all">{{ __('index.projects') }}</a>
            <a href="{{ $nu['blogs'] }}"    @click="open=false" class="px-4 py-3.5 text-sm font-medium text-zinc-300 hover:text-violet-400 hover:bg-violet-500/10 rounded-xl transition-all">{{ __('index.blog') }}</a>
            <a href="{{ $nu['faq'] }}"      @click="open=false" class="px-4 py-3.5 text-sm font-medium text-zinc-300 hover:text-violet-400 hover:bg-violet-500/10 rounded-xl transition-all">{{ __('index.faq') }}</a>
            <a href="{{ $nu['contact'] }}"  @click="open=false" class="px-4 py-3.5 text-sm font-medium text-zinc-300 hover:text-violet-400 hover:bg-violet-500/10 rounded-xl transition-all">{{ __('index.contact') }}</a>
        </nav>

        {{-- Bottom: lang + CTA --}}
        <div class="flex items-center justify-between px-4 py-5 border-t border-zinc-800/60 shrink-0">
            <div class="flex items-center gap-1 bg-zinc-800/60 rounded-lg p-1">
                @foreach(['az','ru','en'] as $l)
                <a href="{{ isset($blogLangLinks) ? $blogLangLinks[$l] : route('front.lang', ['lang' => $l, 'from' => request()->path()]) }}"
                   class="px-2.5 py-1 text-xs font-semibold rounded-md transition-all
                          {{ $lang === $l ? 'bg-violet-600 text-white' : 'text-zinc-500 hover:text-zinc-200' }}">
                    {{ strtoupper($l) }}
                </a>
                @endforeach
            </div>
            <button @click="orderModal = true; open = false"
                    class="bg-violet-700 hover:bg-violet-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all">
                {{ __('index.order') }}
            </button>
        </div>
    </div>
</header>
