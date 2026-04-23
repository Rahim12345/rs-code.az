@extends('front.layouts.master')
@section('title', __('index.blog') . ' | RS Code')
@section('description', 'RS Code bloqu — dizayn, SEO, veb sayt, brendinq mövzularında faydalı məqalələr.')

@section('content')
@php $lang = session('lang','az'); @endphp

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-family:'Bricolage Grotesque',sans-serif">
                <span class="gradient-text">{{ __('index.blog_hero_h1_span') }}</span> <br>{{ __('index.blog_hero_h1') }}
            </h1>
            <p class="text-zinc-400 text-lg">{{ __('index.blog_hero_desc') }}</p>
        </div>
    </div>
</section>

{{-- Blog Grid --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($blogs->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
            @php
                $title  = $blog->{'title_'.$lang} ?? $blog->title_az;
                $review = $blog->{'review_'.$lang} ?? $blog->review_az ?? '';
                $photo  = ($lang !== 'az' && !empty($blog->{'photo_'.$lang})) ? $blog->{'photo_'.$lang} : $blog->photo;
                $imgSrc = ($photo && !str_starts_with($photo,'http'))
                          ? asset('images/blog/'.$photo)
                          : ($photo ?: 'https://picsum.photos/seed/blog-'.$blog->id.'/600/400');
            @endphp
            <article class="group bg-zinc-900/40 border border-zinc-800/50 rounded-2xl overflow-hidden hover:border-violet-500/30 transition-all duration-300 hover:-translate-y-1">
                <a href="/blog-details/{{ $blog->id }}" class="block overflow-hidden aspect-video">
                    <img src="{{ $imgSrc }}" alt="{{ $title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs text-violet-400 bg-violet-500/10 px-2.5 py-1 rounded-full font-medium">{{ __('index.blog_eyebrow') }}</span>
                        <span class="text-xs text-zinc-600">{{ $blog->{'date_'.$lang} ?? $blog->date_az }}</span>
                    </div>
                    <h2 class="text-white font-bold text-lg mb-3 group-hover:text-violet-300 transition-colors line-clamp-2">
                        <a href="/blog-details/{{ $blog->id }}">{{ $title }}</a>
                    </h2>
                    @if($review)
                    <p class="text-zinc-500 text-sm leading-relaxed line-clamp-3 mb-5">
                        {{ strip_tags(Str::limit($review, 160)) }}
                    </p>
                    @endif
                    <a href="/blog-details/{{ $blog->id }}"
                       class="inline-flex items-center gap-2 text-violet-400 hover:text-violet-300 text-sm font-medium transition-colors group/link">
                        {{ __('index.blog_read_more') }}
                        <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="text-center py-20">
            <div class="w-16 h-16 bg-zinc-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <p class="text-zinc-500">{{ __('index.blog_empty') }}</p>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-violet-900/30 to-zinc-900/30 border border-violet-500/20 rounded-3xl p-10">
            <h2 class="text-2xl font-bold mb-3" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('index.blog_cta_heading') }}</h2>
            <p class="text-zinc-500 text-sm mb-6">{{ __('index.blog_cta_text') }}</p>
            <a href="/contact" class="bg-violet-700 hover:bg-violet-600 text-white font-semibold px-8 py-3 rounded-xl transition-all hover:scale-105 inline-block">
                {{ __('index.blog_cta_btn') }}
            </a>
        </div>
    </div>
</section>

@endsection
