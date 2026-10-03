@extends('front.layouts.master')
@section('title', $product['title'])
@section('description', $product['desc'])
@section('canonical', 'https://rs-code.az/mehsullar/' . $slug)
@php
    $productSchema = json_encode([
        '@context'            => 'https://schema.org',
        '@type'               => 'SoftwareApplication',
        'name'                => $product['name'],
        'description'         => $product['desc'],
        'url'                 => $product['url'],
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem'     => 'Web',
        'publisher'           => ['@type' => 'Organization', 'name' => 'RS Code', 'url' => 'https://rs-code.az'],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $crumbSchema = json_encode([
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'RS Code', 'item' => 'https://rs-code.az/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => __('products.label'), 'item' => 'https://rs-code.az/mehsullar'],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $product['name'], 'item' => 'https://rs-code.az/mehsullar/' . $slug],
        ],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp
@push('head_extra')
<script type="application/ld+json">{!! $productSchema !!}</script>
<script type="application/ld+json">{!! $crumbSchema !!}</script>
@endpush
@section('content')

<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-violet-700/20 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex items-center gap-2 text-xs text-zinc-500 mb-8">
            <a href="/" class="hover:text-violet-400 transition-colors">RS Code</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="/mehsullar" class="hover:text-violet-400 transition-colors">{{ __('products.label') }}</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-zinc-300">{{ $product['name'] }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-violet-500/10 border border-violet-500/20 text-violet-400 mb-4">{{ $product['badge'] }}</span>
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4" style="font-family:'Bricolage Grotesque',sans-serif">{{ $product['name'] }}</h1>
                <p class="text-xl text-violet-300 mb-5">{{ $product['tagline'] }}</p>
                <p class="text-zinc-400 leading-relaxed mb-8">{{ $product['intro'] }}</p>
                <a href="{{ $product['url'] }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 bg-violet-700 hover:bg-violet-600 text-white font-semibold px-7 py-3.5 rounded-xl transition-all hover:scale-105 hover:shadow-lg hover:shadow-violet-700/30">
                    {{ __('products.visit') }}: {{ parse_url($product['url'], PHP_URL_HOST) }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

            <div class="rounded-2xl overflow-hidden border border-zinc-800 shadow-2xl shadow-black/60 bg-zinc-900">
                <div class="flex items-center gap-2 px-4 h-9 bg-zinc-800/80">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span><span class="w-3 h-3 rounded-full bg-yellow-400"></span><span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-zinc-400 font-mono">{{ parse_url($product['url'], PHP_URL_HOST) }}</span>
                </div>
                <img src="{{ asset('images/products/' . $slug . '.jpg') }}" alt="{{ $product['name'] }} — {{ $product['tagline'] }}" width="1440" height="900" class="w-full h-auto block">
            </div>
        </div>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white mb-8" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('products.features') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($product['features'] as [$ft, $fd])
            <div class="bg-zinc-900/50 border border-zinc-800/50 rounded-2xl p-6 hover:border-violet-500/30 transition-colors">
                <div class="w-9 h-9 rounded-lg bg-violet-500/15 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="text-white font-semibold mb-2">{{ $ft }}</h3>
                <p class="text-zinc-400 text-sm leading-relaxed">{{ $fd }}</p>
            </div>
            @endforeach
        </div>

        <div class="mt-12 bg-gradient-to-br from-violet-900/30 to-zinc-900/30 border border-violet-500/20 rounded-2xl p-8 text-center">
            <p class="text-zinc-300 mb-5">{{ $product['badge'] }} — {{ $product['tagline'] }}</p>
            <a href="{{ $product['url'] }}" target="_blank" rel="noopener"
               class="inline-flex items-center gap-2 bg-violet-700 hover:bg-violet-600 text-white font-semibold px-7 py-3.5 rounded-xl transition-all">
                {{ __('products.visit') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
