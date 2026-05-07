@extends('front.layouts.master')
@php
    $lang     = session('lang','az');
    $title    = $blog->{'title_'.$lang}  ?? $blog->title_az;
    $review   = $blog->{'review_'.$lang} ?? $blog->review_az ?? '';
    $body     = $blog->{'text_'.$lang}   ?? $blog->text_az;
    $date     = $blog->{'date_'.$lang}   ?? $blog->date_az;
    $photo    = ($lang !== 'az' && !empty($blog->{'photo_'.$lang})) ? $blog->{'photo_'.$lang} : $blog->photo;
    $imgSrc   = ($photo && !str_starts_with($photo,'http'))
                ? asset('images/blog/'.$photo)
                : ($photo ?: 'https://picsum.photos/seed/blog-'.$blog->id.'/1200/600');

    // Admin-dən daxil edilmiş meta sahələr, yoxdursa əsas məlumatdan fallback
    $metaTitle = !empty($blog->{'meta_title_'.$lang})
        ? $blog->{'meta_title_'.$lang}
        : ($title . ' | RS Code Blog');
    $metaDesc  = !empty($blog->{'meta_description_'.$lang})
        ? $blog->{'meta_description_'.$lang}
        : strip_tags(Str::limit($review, 160));
    $metaKw    = $blog->{'meta_keywords_'.$lang} ?? '';

    $slug      = $blog->{'slug_'.$lang} ?? $blog->slug_az ?? $blog->slug_en ?? $blog->id;
    $canonical = 'https://rs-code.az/blog-details/' . $slug;

    $publishedAt = \Carbon\Carbon::parse($blog->created_at)->toIso8601String();
    $modifiedAt  = \Carbon\Carbon::parse($blog->updated_at)->toIso8601String();

    $slugAz = $blog->slug_az ?? $blog->id;
    $slugEn = $blog->slug_en ?? $blog->id;
    $slugRu = $blog->slug_ru ?? $blog->id;
@endphp

@section('title',          $metaTitle)
@section('description',    $metaDesc)
@section('keywords',       $metaKw)
@section('author',         'RS Code')
@section('canonical',      $canonical)
@section('og_type',        'article')
@section('og_title',       strip_tags($metaTitle))
@section('og_desc',        strip_tags($metaDesc))
@section('og_image',       $imgSrc)
@section('og_published',   $publishedAt)
@section('og_modified',    $modifiedAt)
@section('article_author', 'RS Code')
@section('article_section','Blog')
@section('article_tag',    $metaKw)

@section('hreflang')
<link rel="alternate" hreflang="az"        href="https://rs-code.az/blog-details/{{ $slugAz }}">
<link rel="alternate" hreflang="en"        href="https://rs-code.az/blog-details/{{ $slugEn }}">
<link rel="alternate" hreflang="ru"        href="https://rs-code.az/blog-details/{{ $slugRu }}">
<link rel="alternate" hreflang="x-default" href="https://rs-code.az/blog-details/{{ $slugAz }}">
@endsection

@php
    $ldJson = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BlogPosting',
        'headline'        => strip_tags($title),
        'description'     => strip_tags($metaDesc),
        'image'           => $imgSrc,
        'url'             => $canonical,
        'datePublished'   => $publishedAt,
        'dateModified'    => $modifiedAt,
        'author'          => [
            '@type' => 'Organization',
            'name'  => 'RS Code',
            'url'   => 'https://rs-code.az',
            'logo'  => ['@type' => 'ImageObject', 'url' => 'https://rs-code.az/img/rs-code.png'],
        ],
        'publisher'       => [
            '@type' => 'Organization',
            'name'  => 'RS Code',
            'url'   => 'https://rs-code.az',
            'logo'  => ['@type' => 'ImageObject', 'url' => 'https://rs-code.az/img/rs-code.png'],
        ],
        'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $canonical],
    ];
    if ($metaKw) $ldJson['keywords'] = $metaKw;
@endphp

@push('head_extra')
<script type="application/ld+json">{!! json_encode($ldJson, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- Hero --}}
@php
    $blogListUrl   = ['az' => '/bloqlar', 'en' => '/blogs', 'ru' => '/blogi'][$lang] ?? '/bloqlar';
    $blogBackLabel = ['az' => 'Bloga qayıt', 'en' => 'Back to Blog', 'ru' => 'Назад к блогу'][$lang] ?? 'Bloga qayıt';
@endphp
<section class="pt-28 pb-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back + meta row --}}
        <div class="flex items-center justify-between mb-5">
            <a href="{{ $blogListUrl }}"
               class="inline-flex items-center gap-1.5 text-violet-400 hover:text-violet-300 text-xs font-medium transition-colors group">
                <svg class="w-3.5 h-3.5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                {{ $blogBackLabel }}
            </a>
            <div class="flex items-center gap-2 text-zinc-600 text-xs">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ $date }}</span>
                <span class="w-1 h-1 rounded-full bg-zinc-700"></span>
                <span>RS Code</span>
            </div>
        </div>

        {{-- Title --}}
        <h1 class="text-2xl sm:text-3xl lg:text-[2.2rem] font-bold leading-snug text-white mb-6"
            style="font-family:'Bricolage Grotesque',sans-serif">
            {{ $title }}
        </h1>

        {{-- Featured image --}}
        <img src="{{ $imgSrc }}" alt="{{ $title }}"
             class="w-full rounded-xl object-cover max-h-80 shadow-xl shadow-black/50">
    </div>
</section>

{{-- Content --}}
<section class="pt-8 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            {{-- Article body --}}
            <article class="lg:col-span-3">
                @if($review)
                <p class="text-zinc-300 text-lg leading-relaxed mb-8 border-l-2 border-violet-500 pl-5 italic">
                    {{ strip_tags($review) }}
                </p>
                @endif
                <div class="prose prose-invert prose-violet max-w-none blog-content
                            prose-headings:font-bold prose-headings:text-white
                            prose-p:text-zinc-400 prose-p:leading-relaxed
                            prose-a:text-violet-400 prose-a:no-underline hover:prose-a:text-violet-300
                            prose-strong:text-white
                            prose-li:text-zinc-400
                            prose-img:rounded-xl">
                    {!! $body !!}
                </div>
                <style>
                .blog-content table{width:100%;border-collapse:collapse;font-size:.875rem;min-width:480px}
                .blog-content thead th{background:#27272a;color:#fff;padding:.6rem .875rem;text-align:left;border:1px solid #3f3f46;font-weight:600;white-space:nowrap}
                .blog-content tbody td{padding:.6rem .875rem;border:1px solid #3f3f46;color:#a1a1aa;vertical-align:top}
                .blog-content tbody tr:nth-child(even) td{background:rgba(39,39,42,.4)}
                .blog-content .tbl-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch;margin:1.5rem 0;border-radius:.5rem;border:1px solid #3f3f46}
                .blog-content .tbl-wrap table{margin:0;border:none;min-width:0;width:100%}
                .blog-content .tbl-wrap th,.blog-content .tbl-wrap td{border-left:none;border-right:none}
                .blog-content .tbl-wrap thead tr:first-child th:first-child{border-radius:.5rem 0 0 0}
                .blog-content .tbl-wrap thead tr:first-child th:last-child{border-radius:0 .5rem 0 0}
                .blog-content .tbl-wrap tbody tr:last-child td{border-bottom:none}
                </style>
                <script>
                document.querySelectorAll('.blog-content table').forEach(function(t){
                    if(!t.closest('.tbl-wrap')){
                        var w=document.createElement('div');w.className='tbl-wrap';
                        t.parentNode.insertBefore(w,t);w.appendChild(t);
                    }
                });
                </script>
                {{-- Share --}}
                <div class="mt-10 pt-8 border-t border-zinc-800/50 flex items-center gap-4">
                    <span class="text-zinc-500 text-sm">{{ ['az'=>'Paylaş:','en'=>'Share:','ru'=>'Поделиться:'][$lang] ?? 'Paylaş:' }}</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                       target="_blank" class="w-9 h-9 bg-zinc-800 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-all">
                        <svg class="w-4 h-4 text-zinc-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                       target="_blank" class="w-9 h-9 bg-zinc-800 hover:bg-blue-700 rounded-lg flex items-center justify-center transition-all">
                        <svg class="w-4 h-4 text-zinc-400" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </article>

            {{-- Sidebar --}}
            @php
                $sidebarData = [
                    'az' => [
                        'cta_title'    => 'Layihəniz var?',
                        'cta_desc'     => 'Pulsuz konsultasiya üçün bizimlə əlaqə saxlayın.',
                        'cta_btn'      => 'Sifariş ver',
                        'services_lbl' => 'Xidmətlər',
                        'services'     => [
                            ['/veb-saytlarin-hazirlanmasi', 'Veb sayt hazırlanması'],
                            ['/seo-xidmeti',                'SEO xidməti'],
                            ['/smm-xidmeti',                'SMM xidməti'],
                            ['/loqo-hazirlanmasi',          'Loqo hazırlanması'],
                        ],
                    ],
                    'en' => [
                        'cta_title'    => 'Have a project?',
                        'cta_desc'     => 'Contact us for a free consultation.',
                        'cta_btn'      => 'Order Now',
                        'services_lbl' => 'Services',
                        'services'     => [
                            ['/website-development', 'Website Development'],
                            ['/seo-services',        'SEO Services'],
                            ['/smm-services',        'SMM Services'],
                            ['/logo-design',         'Logo Design'],
                        ],
                    ],
                    'ru' => [
                        'cta_title'    => 'Есть проект?',
                        'cta_desc'     => 'Свяжитесь с нами для бесплатной консультации.',
                        'cta_btn'      => 'Заказать',
                        'services_lbl' => 'Услуги',
                        'services'     => [
                            ['/razrabotka-sajtov',  'Разработка сайтов'],
                            ['/seo-uslugi',         'SEO услуги'],
                            ['/smm-uslugi',         'SMM услуги'],
                            ['/razrabotka-logo',    'Разработка логотипа'],
                        ],
                    ],
                ];
                $sb = $sidebarData[$lang] ?? $sidebarData['az'];
            @endphp
            <aside class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    {{-- CTA card --}}
                    <div class="bg-gradient-to-br from-violet-900/40 to-zinc-900/60 border border-violet-500/20 rounded-2xl p-6">
                        <h3 class="text-white font-bold mb-2 text-sm">{{ $sb['cta_title'] }}</h3>
                        <p class="text-zinc-500 text-xs mb-4 leading-relaxed">{{ $sb['cta_desc'] }}</p>
                        <button @click="orderModal = true" class="w-full bg-violet-700 hover:bg-violet-600 text-white text-xs font-semibold py-2.5 rounded-lg transition-all">
                            {{ $sb['cta_btn'] }}
                        </button>
                    </div>
                    {{-- Services links --}}
                    <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-5">
                        <h3 class="text-white font-semibold text-sm mb-3">{{ $sb['services_lbl'] }}</h3>
                        <ul class="space-y-2">
                            @foreach($sb['services'] as [$href, $label])
                            <li><a href="{{ $href }}" class="text-zinc-500 hover:text-violet-400 text-xs transition-colors">→ {{ $label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
