@extends('front.layouts.master')
@section('title', __('smm.smmTitle') . ' | RS Code')
@section('content')

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight" style="font-family:'Bricolage Grotesque',sans-serif">
            {{ __('smm.smmTitle') }}
        </h1>
    </div>
</section>

{{-- Content --}}
<section class="py-12 pb-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        {{-- What is SMM --}}
        <div class="bg-zinc-900/50 border border-zinc-800/60 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-white mb-3" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('smm.smm1') }}</h2>
            <p class="text-zinc-400 leading-relaxed text-sm mb-3">{{ __('smm.smm2') }}</p>
            <p class="text-zinc-400 leading-relaxed text-sm">{{ __('smm.smm3') }}</p>
        </div>

        {{-- Platforms --}}
        <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('smm.smm4') }}</h2>
            <ul class="space-y-3">
                @foreach([__('smm.smm5'), __('smm.smm6'), __('smm.smm7'), __('smm.smm8')] as $item)
                <li class="flex items-start gap-3 text-zinc-300 text-sm leading-relaxed">
                    <span class="w-5 h-5 rounded-full bg-violet-600/20 flex items-center justify-center shrink-0 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-violet-400"></span>
                    </span>
                    {{ $item }}
                </li>
                @endforeach
            </ul>
        </div>

        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('smm.smm9') }}</p>
        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('smm.smm10') }}</p>

        {{-- Main instruments --}}
        <div class="bg-zinc-900/50 border border-zinc-800/60 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('smm.smm11') }}</h2>
            <ul class="space-y-3">
                @foreach([
                    __('smm.smm12'), __('smm.smm13'), __('smm.smm14'),
                    __('smm.smm15'), __('smm.smm16'), __('smm.smm17'), __('smm.smm18'),
                ] as $item)
                <li class="flex items-start gap-3 text-zinc-300 text-sm leading-relaxed">
                    <span class="w-5 h-5 rounded-full bg-violet-600/20 flex items-center justify-center shrink-0 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-violet-400"></span>
                    </span>
                    {{ $item }}
                </li>
                @endforeach
            </ul>
        </div>

        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('smm.smm19') }}</p>
        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('smm.smm20') }}</p>

        {{-- CTA --}}
        <div class="bg-gradient-to-br from-violet-900/30 to-violet-800/10 border border-violet-500/20 rounded-2xl p-8 text-center">
            <h3 class="text-xl font-bold text-white mb-3" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('index.cta_h1_line1') }}</h3>
            <p class="text-zinc-400 text-sm mb-6">{{ __('index.cta_text') }}</p>
            <a href="/contact" class="inline-flex items-center gap-2 bg-violet-700 hover:bg-violet-600 text-white font-semibold px-6 py-3 rounded-xl transition-all hover:shadow-lg hover:shadow-violet-700/30">
                {{ __('index.contact') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

    </div>
</section>

@endsection
