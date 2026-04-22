@extends('front.layouts.master')
@section('title', __('index.about') . ' | RS Code')
@section('description', 'RS Code haqqında — komandamız, missiyamız, dəyərlərimiz.')

@section('content')
@php $lang = session('lang','az'); @endphp

{{-- Hero --}}
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/30 via-transparent to-transparent pointer-events-none"></div>
    <div class="absolute top-20 right-0 w-96 h-96 bg-violet-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-3xl">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-family:'Bricolage Grotesque',sans-serif">
                {{ __('about.hero_h1') }} <br><span class="gradient-text">{{ __('about.hero_h1_span') }}</span>
            </h1>
            <p class="text-zinc-400 text-lg leading-relaxed max-w-2xl">
                {{ __('about.hero_desc') }}
            </p>
        </div>
    </div>
</section>

{{-- Story & Stats --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-24">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold mb-6" style="font-family:'Bricolage Grotesque',sans-serif">
                    {{ __('about.mission_h2') }} <span class="gradient-text">{{ __('about.mission_h2_span') }}</span>
                </h2>
                <div class="text-zinc-400 leading-relaxed space-y-4 text-base">
                    <p>{{ __('about.mission_p1') }}</p>
                    <p>{{ __('about.mission_p2') }}</p>
                    <p>{{ __('about.mission_p3') }}</p>
                </div>
                <div class="grid grid-cols-2 gap-5 mt-10">
                    @foreach([
                        ['150+', __('about.stat1_label')],
                        ['8+',   __('about.stat2_label')],
                        ['50+',  __('about.stat3_label')],
                        ['100%', __('about.stat4_label')],
                    ] as [$num,$label])
                    <div class="bg-zinc-900/60 border border-zinc-800/50 rounded-xl p-5">
                        <div class="text-2xl font-bold gradient-text mb-1">{{ $num }}</div>
                        <div class="text-zinc-500 text-sm">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-violet-600/5 rounded-3xl blur-xl"></div>
                <img src="{{ asset('images/about/agency-office.jpg') }}" alt="RS Code ofis"
                     class="relative rounded-2xl w-full object-cover shadow-2xl shadow-black/50">
                <div class="absolute -bottom-6 -left-6 bg-zinc-900 border border-zinc-800 rounded-2xl p-5 shadow-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-violet-600/20 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-white font-semibold text-sm">{{ __('about.certified') }}</div>
                            <div class="text-zinc-500 text-xs">Google & Meta Partner</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Values --}}
        <div class="mb-24">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold mb-3" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('about.values_heading') }}</h2>
                <p class="text-zinc-500">{{ __('about.values_subtitle') }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['M13 10V3L4 14h7v7l9-11h-7z',     __('about.val1_title'), __('about.val1_desc')],
                    ['M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0', __('about.val2_title'), __('about.val2_desc')],
                    ['M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0',  __('about.val3_title'), __('about.val3_desc')],
                    ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0',    __('about.val4_title'), __('about.val4_desc')],
                ] as [$icon,$title,$desc])
                <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-6 hover:border-violet-500/30 transition-all group">
                    <div class="w-12 h-12 bg-violet-600/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-violet-600/20 transition-all">
                        <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold mb-2">{{ $title }}</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Team --}}
@if(isset($works) && $works->count() > 0)
<section class="py-20 bg-zinc-950/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 bg-violet-500/10 border border-violet-500/20 text-violet-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-4">{{ __('about.team_badge') }}</div>
            <h2 class="text-3xl lg:text-4xl font-bold" style="font-family:'Bricolage Grotesque',sans-serif">
                {{ __('about.team_heading') }} <span class="gradient-text">{{ __('about.team_heading_span') }}</span>
            </h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($works as $member)
            <div class="group text-center">
                <div class="relative mb-4 mx-auto w-36 h-36 sm:w-44 sm:h-44">
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-600/20 to-transparent rounded-2xl group-hover:from-violet-600/40 transition-all duration-300"></div>
                    <img src="{{ $member->src ? asset($member->src) : 'https://picsum.photos/seed/member-'.$member->id.'/200/200' }}"
                         alt="{{ $member->full_name }}"
                         class="w-full h-full object-cover rounded-2xl">
                </div>
                <h3 class="text-white font-semibold text-sm">{{ $member->full_name }}</h3>
                <p class="text-violet-400 text-xs mt-1">{{ $member->professional }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Partners marquee --}}
@if(isset($partners) && $partners->count() > 0)
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-zinc-300 mb-2">{{ __('about.partners_heading') }}</h2>
            <p class="text-zinc-600 text-sm">{{ __('about.partners_subtitle') }}</p>
        </div>
        <div class="overflow-hidden relative">
            <div class="flex gap-8 animate-marquee">
                @foreach($partners->concat($partners) as $partner)
                <div class="shrink-0 flex items-center justify-center w-36 h-16 bg-zinc-900/60 border border-zinc-800/50 rounded-xl px-4 hover:border-violet-500/30 transition-all">
                    @if($partner->logo)
                        <img src="{{ asset('images/partners/'.$partner->logo) }}" alt="{{ $partner->name }}"
                             class="max-h-8 w-auto object-contain filter grayscale hover:grayscale-0 transition-all opacity-60 hover:opacity-100">
                    @else
                        <span class="text-zinc-500 text-xs font-semibold truncate">{{ $partner->name }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-violet-900/40 via-purple-900/20 to-zinc-900/40 border border-violet-500/20 rounded-3xl p-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('about.cta_heading') }}</h2>
            <p class="text-zinc-400 mb-8">{{ __('about.cta_text') }}</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="bg-violet-700 hover:bg-violet-600 text-white font-semibold px-8 py-3.5 rounded-xl transition-all hover:scale-105 hover:shadow-lg hover:shadow-violet-700/30">{{ __('about.cta_btn1') }}</a>
                <button @click="orderModal = true" class="border border-zinc-700 hover:border-violet-500 text-zinc-300 hover:text-white font-semibold px-8 py-3.5 rounded-xl transition-all">{{ __('about.cta_btn2') }}</button>
            </div>
        </div>
    </div>
</section>

@endsection
