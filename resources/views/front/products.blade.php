@extends('front.layouts.master')
@section('title', __('products.index_title'))
@section('description', __('products.index_desc'))
@section('canonical', 'https://rs-code.az/mehsullar')
@php
    $listSchema = json_encode([
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'           => 'ItemList',
                'name'            => __('products.label') . ' — RS Code',
                'itemListElement' => collect($products)->values()->map(fn ($p, $i) => [
                    '@type'    => 'ListItem',
                    'position' => $i + 1,
                    'url'      => 'https://rs-code.az/mehsullar/' . array_keys($products)[$i],
                    'name'     => $p['name'],
                ])->all(),
            ],
            [
                '@type'           => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'RS Code', 'item' => 'https://rs-code.az/'],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => __('products.label'), 'item' => 'https://rs-code.az/mehsullar'],
                ],
            ],
        ],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp
@push('head_extra')
<script type="application/ld+json">{!! $listSchema !!}</script>
@endpush
@section('content')

<section class="relative pt-32 pb-12 overflow-hidden">
    <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-violet-700/20 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <nav class="flex items-center justify-center gap-2 text-xs text-zinc-500 mb-6">
            <a href="/" class="hover:text-violet-400 transition-colors">RS Code</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-zinc-300">{{ __('products.label') }}</span>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('products.index_h1') }}</h1>
        <p class="text-zinc-400 text-lg max-w-2xl mx-auto">{{ __('products.index_sub') }}</p>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($products as $pSlug => $p)
        <a href="/mehsullar/{{ $pSlug }}" class="group block bg-zinc-900/50 border border-zinc-800/50 rounded-2xl overflow-hidden hover:border-violet-500/30 transition-all duration-300 hover:-translate-y-1">
            <div class="aspect-[1440/900] overflow-hidden border-b border-zinc-800/50">
                <img src="{{ asset('images/products/' . $pSlug . '.jpg') }}" alt="{{ $p['name'] }} — {{ $p['tagline'] }}" width="1440" height="900" loading="lazy" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
            </div>
            <div class="p-6">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-violet-500/10 border border-violet-500/20 text-violet-400 mb-3">{{ $p['badge'] }}</span>
                <h2 class="text-2xl font-bold text-white mb-1" style="font-family:'Bricolage Grotesque',sans-serif">{{ $p['name'] }}</h2>
                <p class="text-violet-300 mb-3">{{ $p['tagline'] }}</p>
                <p class="text-zinc-400 text-sm leading-relaxed mb-4">{{ $p['intro'] }}</p>
                <ul class="grid grid-cols-2 gap-x-4 gap-y-1.5 mb-5">
                    @foreach(array_slice($p['features'], 0, 4) as [$ft])
                    <li class="flex items-center gap-2 text-sm text-zinc-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>{{ $ft }}
                    </li>
                    @endforeach
                </ul>
                <span class="inline-flex items-center gap-1.5 text-sm font-semibold text-violet-400 group-hover:text-violet-300">
                    {{ __('products.more') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </div>
        </a>
        @endforeach
    </div>
</section>

@endsection
