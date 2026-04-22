@extends('front.layouts.master')
@section('title', __('index.projects') . ' | RS Code')
@section('description', 'RS Code portfolio — veb sayt, brendinq, loqo, SEO layihələri. 150+ uğurlu iş.')

@section('content')
@php $lang = session('lang','az'); @endphp

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="absolute -top-10 right-0 w-72 h-72 bg-violet-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-family:'Bricolage Grotesque',sans-serif">
                {{ __('projects.hero_h1') }} <span class="gradient-text">{{ __('projects.hero_h1_span') }}</span>
            </h1>
            <p class="text-zinc-400 text-lg">{{ __('projects.hero_desc') }}</p>
        </div>
    </div>
</section>

{{-- Projects grid --}}
<section class="py-16" x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filter tabs --}}
        @if($categories->count() > 1)
        <div class="flex flex-wrap gap-2 mb-12 justify-center">
            <button @click="activeTab='all'"
                    :class="activeTab==='all' ? 'bg-violet-700 text-white' : 'bg-zinc-800/60 text-zinc-400 hover:text-white'"
                    class="px-5 py-2 rounded-xl text-sm font-semibold transition-all">
                {{ __('projects.filter_all') }}
            </button>
            @foreach($categories as $cat)
            <button @click="activeTab='{{ $cat }}'"
                    :class="activeTab==='{{ $cat }}' ? 'bg-violet-700 text-white' : 'bg-zinc-800/60 text-zinc-400 hover:text-white'"
                    class="px-5 py-2 rounded-xl text-sm font-semibold transition-all capitalize">
                {{ ucfirst($cat) }}
            </button>
            @endforeach
        </div>
        @endif

        @php
            $catLabels = [
                'veb'    => 'Veb Sayt',
                'logo'   => 'Logo Dizayn',
                'poster' => 'Poster / SMM',
                'seo'    => 'SEO',
                'smm'    => 'SMM',
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
            @php
                $name      = $project->{'name_'.$lang} ?? $project->name_az ?? $project->name;
                $desc      = $project->{'description_'.$lang} ?? $project->description_az ?? '';
                $cat       = $project->kateqoriya ?? '';
                $catLabel  = $catLabels[$cat] ?? ucfirst($cat);
                $slug      = $project->slug_az ?? $project->slug ?? '';

                // Build images array
                $imgFiles = $project->images->pluck('photo')->filter()->values();
                if ($imgFiles->isEmpty() && $project->photo1) {
                    $imgFiles = collect([$project->photo1]);
                }
                $imgsJson = json_encode(
                    $imgFiles->map(fn($f) => asset('images/projects/'.$f))->values()->all()
                );
            @endphp

            <div x-show="activeTab==='all' || activeTab==='{{ $cat }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-data="{
                     imgs: {{ $imgsJson }},
                     cur: 0,
                     timer: null,
                     start() {
                         if (this.imgs.length < 2) return;
                         this.timer = setInterval(() => { this.cur = (this.cur + 1) % this.imgs.length; }, 1600);
                     },
                     stop() {
                         clearInterval(this.timer);
                         this.timer = null;
                         this.cur   = 0;
                     },
                     prev() { this.cur = (this.cur - 1 + this.imgs.length) % this.imgs.length; },
                     next() { this.cur = (this.cur + 1) % this.imgs.length; }
                 }"
                 @mouseenter="start()" @mouseleave="stop()"
                 class="group bg-zinc-900/40 border border-zinc-800/50 rounded-2xl overflow-hidden hover:border-violet-500/30 transition-all duration-300 hover:-translate-y-1">

                {{-- Slide image area --}}
                <div class="aspect-video relative overflow-hidden">

                    {{-- Slides --}}
                    <template x-for="(img, i) in imgs" :key="i">
                        <img :src="img" alt="{{ $name }}"
                             class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700"
                             :class="cur === i ? 'opacity-100 scale-105' : 'opacity-0 scale-100'"
                             style="transition: opacity .7s ease, transform .7s ease"
                             loading="lazy">
                    </template>

                    {{-- Overlay gradient + category badge --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4 pointer-events-none">
                        @if($cat)
                        <div class="flex justify-end">
                            <span class="text-xs text-violet-300 bg-violet-700/80 px-2.5 py-1 rounded-full font-medium backdrop-blur-sm">
                                {{ $catLabel }}
                            </span>
                        </div>
                        @endif
                    </div>

                    {{-- Prev / Next arrows (only when multiple images) --}}
                    <template x-if="imgs.length > 1">
                        <div class="absolute inset-0 flex items-center justify-between px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button @click.stop="prev()"
                                    class="w-8 h-8 rounded-full bg-black/50 backdrop-blur-sm text-white flex items-center justify-center hover:bg-violet-600/80 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button @click.stop="next()"
                                    class="w-8 h-8 rounded-full bg-black/50 backdrop-blur-sm text-white flex items-center justify-center hover:bg-violet-600/80 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                    </template>

                    {{-- Dot indicators --}}
                    <template x-if="imgs.length > 1">
                        <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-1.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <template x-for="(img, i) in imgs" :key="i">
                                <button @click.stop="cur = i"
                                        class="rounded-full transition-all duration-300"
                                        :class="cur === i ? 'w-4 h-1.5 bg-violet-400' : 'w-1.5 h-1.5 bg-white/40 hover:bg-white/70'">
                                </button>
                            </template>
                        </div>
                    </template>

                    {{-- Image counter badge --}}
                    <template x-if="imgs.length > 1">
                        <div class="absolute top-2 left-2 bg-black/50 backdrop-blur-sm text-white text-xs px-2 py-0.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span x-text="(cur + 1) + ' / ' + imgs.length"></span>
                        </div>
                    </template>
                </div>

                {{-- Card body --}}
                <div class="p-5">
                    <h3 class="text-white font-bold mb-2 group-hover:text-violet-300 transition-colors">{{ $name }}</h3>
                    @if($desc)
                    <p class="text-zinc-500 text-sm leading-relaxed line-clamp-2">{{ strip_tags($desc) }}</p>
                    @endif
                    @if($project->link)
                    <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1.5 mt-3 text-xs text-violet-400 hover:text-violet-300 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Sayta keç
                    </a>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20">
                <div class="w-16 h-16 bg-zinc-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-zinc-500">{{ __('projects.empty') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-violet-900/40 via-purple-900/20 to-zinc-900/40 border border-violet-500/20 rounded-3xl p-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4" style="font-family:'Bricolage Grotesque',sans-serif">
                {{ __('projects.cta_heading') }}
            </h2>
            <p class="text-zinc-400 mb-8">{{ __('projects.cta_text') }}</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="bg-violet-700 hover:bg-violet-600 text-white font-semibold px-8 py-3.5 rounded-xl transition-all hover:scale-105 hover:shadow-lg hover:shadow-violet-700/30">{{ __('projects.cta_btn1') }}</a>
                <button @click="orderModal = true" class="border border-zinc-700 hover:border-violet-500 text-zinc-300 hover:text-white font-semibold px-8 py-3.5 rounded-xl transition-all">{{ __('projects.cta_btn2') }}</button>
            </div>
        </div>
    </div>
</section>

@endsection
