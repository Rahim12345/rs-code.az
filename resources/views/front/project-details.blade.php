@extends('front.layouts.master')
@section('title', ($project->{'name_'.session('lang','az')} ?? $project->name) . ' | RS Code')
@section('description', $project->{'description_'.session('lang','az')} ?? $project->description_az ?? '')
@section('canonical', 'https://rs-code.az/project-details/' . ($project->slug_az ?? $project->slug))
@section('og_type', 'article')
@section('og_image', $project->photo1 ? 'https://rs-code.az/images/projects/' . $project->photo1 : 'https://rs-code.az/img/og-default.jpg')

@section('content')
@php
    $lang     = session('lang','az');
    $name     = $project->{'name_'.$lang}        ?? $project->name;
    $desc     = $project->{'description_'.$lang} ?? $project->description_az ?? '';
    $tarix    = $project->{'tarix_'.$lang}        ?? $project->tarix ?? '';
    $catLabels = [
        'veb'    => 'Veb Sayt',
        'logo'   => 'Logo Dizayn',
        'poster' => 'Poster / SMM',
        'seo'    => 'SEO',
        'smm'    => 'SMM',
        'websites'   => 'Veb Sayt',
        'e-commerce' => 'E-Ticarət',
        'blog'       => 'Bloq',
        'portfolio'  => 'Portfolio',
    ];
    $cat      = $project->kateqoriya ?? '';
    $catLabel = $catLabels[$cat] ?? ucfirst($cat);
    $images   = $project->images;
    $allImgs  = $images->pluck('photo')->filter()->values();
    if ($allImgs->isEmpty() && $project->photo1) {
        $allImgs = collect([$project->photo1]);
    }
@endphp

{{-- Hero breadcrumb --}}
<section class="relative pt-28 pb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-zinc-500 mb-6">
            <a href="/" class="hover:text-violet-400 transition-colors">Ana Səhifə</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('front.portfolio') }}" class="hover:text-violet-400 transition-colors">İşlər</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-zinc-300">{{ $name }}</span>
        </nav>
    </div>
</section>

{{-- Main content --}}
<section class="pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- LEFT: Gallery slider --}}
            <div class="lg:col-span-2"
                 x-data="{
                     cur: 0,
                     imgs: {{ json_encode($allImgs->map(fn($f) => asset('images/projects/'.$f))->values()->all()) }},
                     prev() { this.cur = (this.cur - 1 + this.imgs.length) % this.imgs.length },
                     next() { this.cur = (this.cur + 1) % this.imgs.length }
                 }">

                {{-- Main image --}}
                <div class="relative rounded-2xl overflow-hidden bg-zinc-900 border border-zinc-800/50 aspect-video mb-3">
                    <template x-for="(img, i) in imgs" :key="i">
                        <img :src="img" alt="{{ $name }}"
                             class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                             :class="cur === i ? 'opacity-100' : 'opacity-0'"
                             loading="lazy">
                    </template>

                    {{-- Nav arrows --}}
                    <template x-if="imgs.length > 1">
                        <div>
                            <button @click="prev()"
                                    class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/60 backdrop-blur-sm text-white flex items-center justify-center hover:bg-violet-600/80 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button @click="next()"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/60 backdrop-blur-sm text-white flex items-center justify-center hover:bg-violet-600/80 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                            <div class="absolute bottom-3 left-0 right-0 flex justify-center gap-1.5">
                                <template x-for="(img, i) in imgs" :key="i">
                                    <button @click="cur = i"
                                            class="rounded-full transition-all duration-300"
                                            :class="cur === i ? 'w-5 h-1.5 bg-violet-400' : 'w-1.5 h-1.5 bg-white/40 hover:bg-white/70'">
                                    </button>
                                </template>
                            </div>
                            <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm text-white text-xs px-2.5 py-1 rounded-full">
                                <span x-text="(cur + 1) + ' / ' + imgs.length"></span>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Thumbnail strip --}}
                @if($allImgs->count() > 1)
                <div class="flex gap-2 overflow-x-auto pb-1">
                    <template x-for="(img, i) in imgs" :key="i">
                        <button @click="cur = i"
                                class="shrink-0 w-20 h-14 rounded-lg overflow-hidden border-2 transition-all"
                                :class="cur === i ? 'border-violet-500' : 'border-zinc-800 hover:border-zinc-600'">
                            <img :src="img" class="w-full h-full object-cover" loading="lazy">
                        </button>
                    </template>
                </div>
                @endif
            </div>

            {{-- RIGHT: Project info --}}
            <div class="flex flex-col gap-6">
                <div>
                    @if($cat)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-violet-500/10 border border-violet-500/20 text-violet-400 mb-3">
                        {{ $catLabel }}
                    </span>
                    @endif
                    <h1 class="text-2xl sm:text-3xl font-bold text-white mb-3" style="font-family:'Bricolage Grotesque',sans-serif">
                        {{ $name }}
                    </h1>
                    @if($desc)
                    <p class="text-zinc-400 text-sm leading-relaxed">{{ strip_tags($desc) }}</p>
                    @endif
                </div>

                {{-- Meta info --}}
                <div class="bg-zinc-900/50 border border-zinc-800/50 rounded-2xl p-5 space-y-4">
                    @if($tarix)
                    <div class="flex items-center justify-between">
                        <span class="text-zinc-500 text-sm">Tarix</span>
                        <span class="text-zinc-200 text-sm font-medium">{{ $tarix }}</span>
                    </div>
                    @endif
                    @if($cat)
                    <div class="flex items-center justify-between">
                        <span class="text-zinc-500 text-sm">Kateqoriya</span>
                        <span class="text-zinc-200 text-sm font-medium">{{ $catLabel }}</span>
                    </div>
                    @endif
                    <div class="flex items-center justify-between">
                        <span class="text-zinc-500 text-sm">Şəkil sayı</span>
                        <span class="text-zinc-200 text-sm font-medium">{{ $allImgs->count() }}</span>
                    </div>
                    @if($project->link)
                    <div class="pt-2 border-t border-zinc-800/50">
                        <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer"
                           class="flex items-center justify-center gap-2 w-full bg-violet-700 hover:bg-violet-600 text-white font-semibold py-3 rounded-xl transition-all hover:scale-[1.02] hover:shadow-lg hover:shadow-violet-700/30 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Canlı sayta keç
                        </a>
                    </div>
                    @endif
                </div>

                {{-- CTA --}}
                <div class="bg-gradient-to-br from-violet-900/30 to-zinc-900/30 border border-violet-500/20 rounded-2xl p-5 text-center">
                    <p class="text-zinc-400 text-sm mb-4">Oxşar layihə üçün bizimlə əlaqə saxlayın</p>
                    <button @click="orderModal = true"
                            class="w-full border border-violet-500/40 hover:border-violet-500 hover:bg-violet-500/10 text-violet-400 hover:text-violet-300 font-semibold py-2.5 rounded-xl transition-all text-sm">
                        Sifariş ver
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Other projects --}}
@php
    $others = \App\Models\Project::with('images')
        ->where('id', '!=', $project->id)
        ->where('home', 1)
        ->orderBy('order_no')
        ->limit(3)
        ->get();
@endphp
@if($others->count() > 0)
<section class="py-16 border-t border-zinc-800/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold text-white mb-8">Digər Layihələr</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            @foreach($others as $other)
            @php
                $oName = $other->{'name_'.$lang} ?? $other->name;
                $oImg  = $other->images->first() ? $other->images->first()->photo : $other->photo1;
            @endphp
            <a href="/project-details/{{ $other->slug_az ?? $other->slug }}"
               class="group relative overflow-hidden rounded-2xl aspect-video block border border-zinc-800/50 hover:border-violet-500/30 transition-all">
                @if($oImg)
                <img src="{{ asset('images/projects/'.$oImg) }}" alt="{{ $oName }}"
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex items-end p-4">
                    <span class="text-white font-semibold text-sm">{{ $oName }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
