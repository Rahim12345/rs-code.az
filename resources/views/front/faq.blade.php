@extends('front.layouts.master')
@section('title', __('index.faq') . ' | RS Code')

@section('content')

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="absolute -top-10 right-0 w-72 h-72 bg-violet-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-family:'Bricolage Grotesque',sans-serif">
                {{ __('faq.questions') }}
            </h1>
            <p class="text-zinc-400 text-lg">{{ __('faq.subtitle') }}</p>
        </div>
    </div>
</section>

{{-- Accordion --}}
<section class="py-16 pb-28">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-3"
             x-data="{ open: 0 }">

            @php
            $faqs = [
                [1, __('faq.howmuch'),     __('faq.howmuchd')],
                [2, __('faq.afterdevelop'),__('faq.afterdevelopd')],
                [3, __('faq.sitecontent'), __('faq.sitecontentd')],
                [4, __('faq.promote'),     __('faq.promoted')],
                [5, __('faq.difference'),  __('faq.differenced')],
                [6, __('faq.visitor'),     __('faq.visitord')],
            ];
            @endphp

            @foreach($faqs as [$i, $q, $a])
            <div class="bg-zinc-900/50 border border-zinc-800/60 rounded-2xl overflow-hidden transition-all duration-200"
                 :class="open === {{ $i }} ? 'border-violet-500/40' : 'hover:border-zinc-700'">

                <button class="w-full flex items-center justify-between gap-4 px-6 py-5 text-left"
                        @click="open = open === {{ $i }} ? 0 : {{ $i }}">
                    <span class="font-semibold text-base"
                          :class="open === {{ $i }} ? 'text-violet-300' : 'text-zinc-100'">
                        {{ $q }}
                    </span>
                    <span class="shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-colors duration-200"
                          :class="open === {{ $i }} ? 'bg-violet-600 text-white' : 'bg-zinc-800 text-zinc-400'">
                        <svg class="w-3.5 h-3.5 transition-transform duration-300"
                             :class="open === {{ $i }} ? 'rotate-45' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                    </span>
                </button>

                <div x-show="open === {{ $i }}"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     class="px-6 pb-6">
                    <div class="border-t border-zinc-800/60 pt-4">
                        <p class="text-zinc-400 text-sm leading-relaxed">{{ $a }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
