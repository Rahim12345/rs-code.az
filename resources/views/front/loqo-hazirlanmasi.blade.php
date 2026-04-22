@extends('front.layouts.master')
@section('title', __('logo.logoTitle') . ' | RS Code')
@section('content')

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight" style="font-family:'Bricolage Grotesque',sans-serif">
            {{ __('logo.logoTitle') }}
        </h1>
    </div>
</section>

{{-- Content --}}
<section class="py-12 pb-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('logo.logo1') }}</p>

        <div class="space-y-4">
            @foreach([
                [__('logo.logo2'), __('logo.logo3')],
                [__('logo.logo4'), __('logo.logo5')],
                [__('logo.logo6'), __('logo.logo7')],
                [__('logo.logo8'), __('logo.logo9')],
                [__('logo.logo10'), __('logo.logo11')],
            ] as [$title, $desc])
            <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-6 hover:border-violet-500/30 transition-all">
                <h2 class="font-semibold text-violet-300 mb-2 text-base">{{ $title }}</h2>
                <p class="text-zinc-400 text-sm leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>

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
