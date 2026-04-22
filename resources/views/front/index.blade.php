@extends('front.layouts.master')
@section('title', 'RS Code')
@section('content')
@php $lang = session('lang', 'az'); @endphp

{{-- ═══════════════════════ HERO ═══════════════════════ --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-violet-700/20 rounded-full blur-[130px]"></div>
        <div class="absolute -bottom-40 -left-40 w-[500px] h-[500px] bg-violet-900/15 rounded-full blur-[120px]"></div>
    </div>
    <div class="absolute inset-0 grid-overlay"></div>
    <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-20 text-center">
        <h1 class="font-display font-extrabold text-5xl sm:text-6xl md:text-7xl lg:text-8xl leading-[1.05] tracking-tight text-white mb-6">
            {{ __('index.hero_h1_line1') }}<br>
            <span class="gradient-text">{{ __('index.hero_h1_line2') }}</span><br>
            {{ __('index.hero_h1_line3') }}
        </h1>
        <p class="text-zinc-400 text-lg sm:text-xl max-w-2xl mx-auto mb-10">
            {{ __('index.hero_subtitle') }}
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 mb-20">
            <a href="{{ route('front.portfolio') }}" class="bg-violet-700 hover:bg-violet-600 text-white font-semibold px-7 py-3.5 rounded-xl transition-all hover:scale-105 hover:shadow-xl hover:shadow-violet-700/25">{{ __('index.hero_portfolio_btn') }}</a>
            <a href="/contact" class="border border-zinc-700 hover:border-violet-600/50 text-zinc-300 hover:text-white font-semibold px-7 py-3.5 rounded-xl transition-all hover:bg-zinc-800/50">{{ __('index.hero_contact_btn') }}</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-xl mx-auto">
            <div class="text-center"><div class="font-display font-black text-4xl text-white">150<span class="text-violet-400">+</span></div><div class="text-zinc-400 text-sm mt-1">{{ __('index.stat_clients') }}</div></div>
            <div class="text-center"><div class="font-display font-black text-4xl text-white">6<span class="text-violet-400">+</span></div><div class="text-zinc-400 text-sm mt-1">{{ __('index.stat_experience') }}</div></div>
            <div class="text-center"><div class="font-display font-black text-4xl text-white">500<span class="text-violet-400">+</span></div><div class="text-zinc-400 text-sm mt-1">{{ __('index.stat_projects') }}</div></div>
            <div class="text-center"><div class="font-display font-black text-4xl text-white">20<span class="text-violet-400">+</span></div><div class="text-zinc-400 text-sm mt-1">{{ __('index.stat_experts') }}</div></div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-zinc-600">
        <span class="text-[10px] uppercase tracking-[0.2em]">{{ __('index.scroll_text') }}</span>
        <div class="w-px h-10 bg-gradient-to-b from-zinc-600 to-transparent"></div>
    </div>
</section>

{{-- ═══════════════════════ XİDMƏTLƏR ═══════════════════════ --}}
<section class="py-24 bg-[#0a0a0d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-violet-400 text-xs font-semibold uppercase tracking-[0.2em] mb-3 block">{{ __('index.services_eyebrow') }}</span>
            <h2 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-white">{{ __('index.services_heading') }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($services->where('on_home',1)->sortBy('order_no') as $service)
            <a href="/services" class="group bg-zinc-900/60 border border-zinc-800/60 hover:border-violet-700/40 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 block">
                <div class="w-11 h-11 bg-violet-700/15 rounded-xl flex items-center justify-center mb-5 group-hover:bg-violet-700/25 transition-colors">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-semibold text-zinc-100 mb-2 text-sm">{{ $service->{'name_'.$lang} }}</h3>
                <div class="flex items-center gap-1 text-violet-400 text-xs font-medium mt-3 group-hover:gap-2 transition-all">
                    {{ __('index.services_more') }} <svg class="w-3 h-3 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="/services" class="inline-flex items-center gap-2 text-zinc-400 hover:text-violet-400 text-sm transition-colors">
                {{ __('index.services_all') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════ PORTFELİO ═══════════════════════ --}}
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-14 gap-4">
            <div>
                <span class="text-violet-400 text-xs font-semibold uppercase tracking-[0.2em] mb-3 block">{{ __('index.portfolio_eyebrow') }}</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-white">{{ __('index.portfolio_heading') }}</h2>
            </div>
            <a href="{{ route('front.portfolio') }}" class="shrink-0 flex items-center gap-2 text-violet-400 hover:text-violet-300 text-sm font-medium transition-colors">
                {{ __('index.portfolio_all') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($projects as $project)
            @php
                $pSlug = $project->slug_az ?? $project->slug ?? $project->id;
                $pImg  = $project->images->first()->photo ?? $project->photo1;
            @endphp
            <a href="/project-details/{{ $pSlug }}" class="group relative overflow-hidden rounded-2xl aspect-[4/3] block">
                @if($pImg)
                <img src="{{ asset('images/projects/'.$pImg) }}" alt="{{ $project->{'name_'.$lang} ?? $project->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                @else
                <div class="w-full h-full bg-zinc-800 flex items-center justify-center">
                    <svg class="w-12 h-12 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end translate-y-3 group-hover:translate-y-0 transition-transform duration-300">
                    <span class="text-violet-400 text-xs font-semibold uppercase tracking-wider mb-1">{{ $project->kateqoriya }}</span>
                    <h3 class="text-white font-semibold text-lg leading-snug">{{ $project->name }}</h3>
                    <span class="text-zinc-400 text-sm mt-1">{{ $project->tarix }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════ HAQQIMIZDA ═══════════════════════ --}}
<section class="py-24 bg-[#0a0a0d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-violet-400 text-xs font-semibold uppercase tracking-[0.2em] mb-4 block">{{ __('index.about_eyebrow') }}</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-white mb-6 leading-tight">{{ __('index.about_h1_line1') }}<br>{{ __('index.about_h1_line2') }}</h2>
                <p class="text-zinc-400 leading-relaxed mb-8">{{ $about ? strip_tags($about->{'about_'.$lang}) : '' }}</p>
                <a href="/about" class="inline-flex items-center gap-2 bg-violet-700 hover:bg-violet-600 text-white font-semibold px-6 py-3 rounded-xl transition-all hover:scale-105">
                    {{ __('index.about_btn') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div class="bg-zinc-900/60 border border-zinc-800/60 rounded-2xl p-6">
                    <div class="w-10 h-10 bg-violet-700/15 text-violet-400 rounded-xl flex items-center justify-center mb-4"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg></div>
                    <div class="font-display font-black text-3xl text-white mb-1">150+</div>
                    <div class="text-zinc-400 text-sm">{{ __('index.stat_success_clients') }}</div>
                </div>
                <div class="bg-zinc-900/60 border border-zinc-800/60 rounded-2xl p-6">
                    <div class="w-10 h-10 bg-amber-500/15 text-amber-400 rounded-xl flex items-center justify-center mb-4"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg></div>
                    <div class="font-display font-black text-3xl text-white mb-1">500+</div>
                    <div class="text-zinc-400 text-sm">{{ __('index.stat_completed') }}</div>
                </div>
                <div class="bg-zinc-900/60 border border-zinc-800/60 rounded-2xl p-6">
                    <div class="w-10 h-10 bg-emerald-500/15 text-emerald-400 rounded-xl flex items-center justify-center mb-4"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                    <div class="font-display font-black text-3xl text-white mb-1">6+</div>
                    <div class="text-zinc-400 text-sm">{{ __('index.stat_years') }}</div>
                </div>
                <div class="bg-zinc-900/60 border border-zinc-800/60 rounded-2xl p-6">
                    <div class="w-10 h-10 bg-sky-500/15 text-sky-400 rounded-xl flex items-center justify-center mb-4"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></div>
                    <div class="font-display font-black text-3xl text-white mb-1">20+</div>
                    <div class="text-zinc-400 text-sm">{{ __('index.stat_team') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════ TƏRƏFDAŞLAR ═══════════════════════ --}}
@if($partners->count() > 0)
<section class="py-16 border-y border-zinc-800/40">
    <div class="text-center mb-10">
        <span class="text-zinc-400 text-xs font-medium uppercase tracking-[0.2em]">{{ __('index.partners_eyebrow') }}</span>
    </div>
    <div class="overflow-hidden">
        <div class="flex animate-marquee gap-16 whitespace-nowrap">
            @foreach($partners as $partner)
            <div class="inline-flex items-center shrink-0 px-4">
                <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="h-8 w-auto opacity-40 hover:opacity-80 transition-opacity grayscale hover:grayscale-0" loading="lazy">
            </div>
            @endforeach
            @foreach($partners as $partner)
            <div class="inline-flex items-center shrink-0 px-4">
                <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="h-8 w-auto opacity-40 hover:opacity-80 transition-opacity grayscale hover:grayscale-0" loading="lazy">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════ RƏYLƏRİ ═══════════════════════ --}}
@if($comments->count() > 0)
<section class="py-24 bg-[#0a0a0d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-violet-400 text-xs font-semibold uppercase tracking-[0.2em] mb-3 block">{{ __('index.reviews_eyebrow') }}</span>
            <h2 class="font-display font-bold text-3xl sm:text-4xl text-white">{{ __('index.reviews_heading') }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($comments->take(6) as $comment)
            <div class="bg-zinc-900/60 border border-zinc-800/60 rounded-2xl p-6 flex flex-col gap-4">
                <div class="flex items-center gap-0.5 text-amber-400">
                    @for($s=0;$s<5;$s++)
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-zinc-400 text-sm leading-relaxed flex-1">"{{ $comment->{'comment_'.$lang} }}"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-zinc-800/50">
                    @php
                        $cName    = $comment->{'name_'.$lang} ?? '';
                        $words    = preg_split('/\s+/', trim($cName));
                        $initials = mb_strtoupper(
                            mb_substr($words[0] ?? '', 0, 1) .
                            mb_substr($words[1] ?? '', 0, 1)
                        );
                        $avatarColors = ['bg-violet-700','bg-indigo-700','bg-blue-700','bg-emerald-700','bg-amber-700','bg-rose-700'];
                        $avatarBg     = $avatarColors[crc32($cName) % count($avatarColors)];
                    @endphp
                    <div class="w-10 h-10 rounded-full {{ $avatarBg }} flex items-center justify-center shrink-0">
                        <span class="text-white text-sm font-bold leading-none">{{ $initials }}</span>
                    </div>
                    <div>
                        <div class="text-zinc-200 font-medium text-sm">{{ $cName }}</div>
                        <div class="text-zinc-400 text-xs">{{ __('index.reviews_role') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════ BLOG ═══════════════════════ --}}
@if($blogs->count() > 0)
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-14 gap-4">
            <div>
                <span class="text-violet-400 text-xs font-semibold uppercase tracking-[0.2em] mb-3 block">{{ __('index.blog_eyebrow') }}</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-white">{{ __('index.blog_heading') }}</h2>
            </div>
            <a href="/blogs" class="shrink-0 flex items-center gap-2 text-violet-400 hover:text-violet-300 text-sm font-medium">
                {{ __('index.blog_all') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs->take(3) as $blog)
            <a href="/blog-details/{{ $blog->{'slug_'.$lang} ?? $blog->slug_az ?? $blog->id }}" class="group bg-zinc-900/50 border border-zinc-800/60 rounded-2xl overflow-hidden hover:border-violet-700/30 transition-all hover:-translate-y-1 block">
                <div class="relative overflow-hidden h-48">
                    <img src="{{ str_starts_with($blog->photo, 'http') || str_starts_with($blog->photo, '/') ? $blog->photo : asset('images/blog/'.$blog->photo) }}" alt="{{ $blog->{'title_'.$lang} }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/80 to-transparent"></div>
                </div>
                <div class="p-5">
                    <span class="text-zinc-400 text-xs">{{ $blog->{'date_'.$lang} }}</span>
                    <h3 class="text-zinc-100 font-semibold text-base mt-2 mb-3 line-clamp-2 group-hover:text-violet-300 transition-colors">{{ $blog->{'title_'.$lang} }}</h3>
                    <p class="text-zinc-400 text-sm line-clamp-2">{{ $blog->{'review_'.$lang} }}</p>
                    <div class="flex items-center gap-1 text-violet-400 text-xs font-medium mt-4">
                        {{ __('index.blog_read') }} <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════ CTA ═══════════════════════ --}}
<section class="py-28 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-900/30 via-transparent to-violet-900/10"></div>
    <div class="absolute inset-0 grid-overlay"></div>
    <div class="absolute -top-20 left-1/2 -translate-x-1/2 w-[500px] h-[300px] bg-violet-600/15 rounded-full blur-[80px]"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-white mb-6">
            {{ __('index.cta_h1_line1') }}<br><span class="gradient-text">{{ __('index.cta_h1_line2') }}</span>
        </h2>
        <p class="text-zinc-400 text-lg mb-10 max-w-xl mx-auto">
            {{ __('index.cta_text') }}
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="/contact" class="bg-violet-700 hover:bg-violet-600 text-white font-semibold px-8 py-4 rounded-xl transition-all hover:scale-105 hover:shadow-xl hover:shadow-violet-700/30">
                {{ __('index.cta_contact') }}
            </a>
            <button @click="orderModal = true" class="border border-zinc-700 hover:border-violet-600/50 text-zinc-300 hover:text-white font-semibold px-8 py-4 rounded-xl transition-all hover:bg-zinc-800/50">
                {{ __('index.cta_order') }}
            </button>
        </div>
    </div>
</section>

@endsection
