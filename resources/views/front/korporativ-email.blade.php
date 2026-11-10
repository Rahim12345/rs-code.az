@extends('front.layouts.master')
@section('title', __('meta.email.title'))
@section('description', __('meta.email.desc'))
@include('front.partials.page-schema', ['key' => 'email', 'service' => true, 'faq' => 'koperativ.x_faq'])
@section('content')

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <div class="inline-flex items-center gap-2 bg-violet-500/10 border border-violet-500/20 text-violet-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-violet-400 animate-pulse"></span>
            {{ __('index.services') }}
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight" style="font-family:'Bricolage Grotesque',sans-serif">
            {{ __('koperativ.title') }}
        </h1>
    </div>
</section>

{{-- Content --}}
<section class="py-12 pb-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        @include('front.partials.service-extras', ['key' => 'koperativ', 'only' => 'short'])

        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('koperativ.kop1') }}</p>
        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('koperativ.kop2') }}</p>

        {{-- Common formats --}}
        <div class="bg-zinc-900/50 border border-zinc-800/60 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('koperativ.kop3') }}</h2>
            <ul class="space-y-2">
                @foreach([
                    __('koperativ.kop4'), __('koperativ.kop5'), __('koperativ.kop6'),
                    __('koperativ.kop7'), __('koperativ.kop8'),
                ] as $item)
                <li class="flex items-center gap-3 text-zinc-300 text-sm font-mono">
                    <span class="w-5 h-5 rounded-full bg-violet-600/20 flex items-center justify-center shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-violet-400"></span>
                    </span>
                    {{ $item }}
                </li>
                @endforeach
            </ul>
        </div>

        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('koperativ.kop9') }}</p>
        <p class="text-zinc-400 leading-relaxed text-sm">{{ __('koperativ.kop10') }}</p>

        {{-- Benefits --}}
        <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('koperativ.kop11') }}</h2>
            <ul class="space-y-3">
                @foreach([
                    __('koperativ.kop12'), __('koperativ.kop13'), __('koperativ.kop14'),
                    __('koperativ.kop15'), __('koperativ.kop16'), __('koperativ.kop17'),
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

        {{-- Options --}}
        <div>
            <h2 class="text-2xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('koperativ.opt_title') }}</h2>
            <div class="overflow-x-auto rounded-2xl border border-zinc-800/60">
                <table class="w-full text-sm">
                    <thead class="bg-zinc-900/80 text-zinc-300">
                        <tr>@foreach(__('koperativ.opt_head') as $h)<th class="text-left font-semibold px-4 py-3">{{ $h }}</th>@endforeach</tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/60">
                        @foreach(__('koperativ.opt_rows') as $row)
                        <tr class="text-zinc-400">
                            @foreach($row as $i => $cell)<td class="px-4 py-3 {{ $i === 0 ? 'text-zinc-200 font-medium whitespace-nowrap' : '' }}">{{ $cell }}</td>@endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-zinc-500 text-xs mt-3 leading-relaxed">{{ __('koperativ.opt_note') }}</p>
        </div>

        {{-- DNS --}}
        <div class="bg-zinc-900/50 border border-zinc-800/60 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-white mb-3" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('koperativ.dns_title') }}</h2>
            <p class="text-zinc-400 text-sm leading-relaxed mb-5">{{ __('koperativ.dns_intro') }}</p>
            <ul class="space-y-3">
                @foreach(__('koperativ.dns_rows') as [$k, $d])
                <li class="text-zinc-400 text-sm leading-relaxed"><span class="font-mono font-semibold text-violet-300">{{ $k }}</span> — {{ $d }}</li>
                @endforeach
            </ul>
            <p class="text-zinc-400 text-sm leading-relaxed mt-4">{{ __('koperativ.dns_note') }}</p>
        </div>

        {{-- Setup steps --}}
        <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-white mb-4" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('koperativ.steps_title') }}</h2>
            <ol class="space-y-3 list-decimal list-inside text-zinc-300 text-sm leading-relaxed">
                @foreach(__('koperativ.steps') as $step)<li>{{ $step }}</li>@endforeach
            </ol>
            <p class="text-zinc-400 text-sm leading-relaxed mt-4">{{ __('koperativ.steps_note') }}</p>
        </div>

        @include('front.partials.service-extras', ['key' => 'koperativ', 'only' => 'rest'])

        {{-- CTA --}}
        <div class="bg-gradient-to-br from-violet-900/30 to-violet-800/10 border border-violet-500/20 rounded-2xl p-8 text-center">
            <h3 class="text-xl font-bold text-white mb-3" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('index.cta_h1_line1') }}</h3>
            <p class="text-zinc-400 text-sm mb-6">{{ __('index.cta_text') }}</p>
            <a href="{{ lurl('contact') }}" class="inline-flex items-center gap-2 bg-violet-700 hover:bg-violet-600 text-white font-semibold px-6 py-3 rounded-xl transition-all hover:shadow-lg hover:shadow-violet-700/30">
                {{ __('index.contact') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

    </div>
</section>

@include('front.partials.related-posts', ['slugs' => ['veb-sayt-hazirlatmazdan-evvel-12-sual', 'veb-sayt-qiymeti-azerbaycan-2026', 'seo-xidmeti-azerbaycan-2026']])

@endsection
