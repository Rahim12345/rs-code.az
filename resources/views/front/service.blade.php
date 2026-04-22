@extends('front.layouts.master')
@section('title', __('index.services') . ' | RS Code')
@section('description', 'RS Code xidmətləri — veb sayt, brendinq, SEO, SMM, loqo, korporativ email, texniki dəstək.')

@section('content')
@php
    $lang     = session('lang','az');
    $services = \App\Models\Service::orderBy('order_no')->get();
@endphp

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-96 h-96 bg-violet-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-family:'Bricolage Grotesque',sans-serif">
                Biznesiniz üçün <span class="gradient-text">kompleks həllər</span>
            </h1>
            <p class="text-zinc-400 text-lg">Dizayn, texnologiya və strategiyanı birləşdirərək brendinizi güclü edirik</p>
        </div>
    </div>
</section>

{{-- Services grid --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            @php
                $name = $service->{'name_'.$lang} ?? $service->name_az;
                $desc = $service->{'desc_'.$lang} ?? $service->desc_az;
            @endphp
            <div class="group bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-7 hover:border-violet-500/30 transition-all duration-300 hover:-translate-y-1">
                {{-- Icon --}}
                <div class="w-14 h-14 bg-violet-600/10 rounded-2xl flex items-center justify-center mb-5 group-hover:bg-violet-600/20 transition-all">
                    @if($service->icon)
                    <svg class="w-7 h-7 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service->icon }}"/>
                    </svg>
                    @else
                    <svg class="w-7 h-7 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    @endif
                </div>
                <h2 class="text-xl font-bold text-white mb-3 group-hover:text-violet-300 transition-colors">{{ $name }}</h2>
                <p class="text-zinc-500 text-sm leading-relaxed mb-5">{{ strip_tags($desc) }}</p>
                @if($service->slug)
                <a href="/{{ $service->slug }}"
                   class="inline-flex items-center gap-2 text-violet-400 hover:text-violet-300 text-sm font-medium transition-colors group/link">
                    Ətraflı oxu
                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Why us --}}
        <div class="mt-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold mb-3" style="font-family:'Bricolage Grotesque',sans-serif">
                    Nə üçün <span class="gradient-text">RS Code?</span>
                </h2>
                <p class="text-zinc-500">8 il ərzində 150+ müştəriyə xidmət göstərməyin verdiyi təcrübə</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    ['M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0', 'Keyfiyyət zəmanəti', 'Hər layihəni zəmanət müddəti ərzində dəstəkləyirik.'],
                    ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0', 'Vaxtında çatdırılma', 'Razılaşdırılmış müddətdə layihənizi teslim edirik.'],
                    ['M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'Peşəkar komanda', '15 nəfərlik ixtisaslaşmış komanda ilə işləyirik.'],
                    ['M13 10V3L4 14h7v7l9-11h-7z', 'Müasir texnologiyalar', 'Ən son texnologiya trendarını izləyərək işləyirik.'],
                    ['M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'Daimi əlaqə', '7/24 müştəri dəstəyi ilə sorularınıza cavab veririk.'],
                    ['M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', 'Şəffaf hesabat', 'Hər layihə üçün detallı hesabat və analitika.'],
                ] as [$icon,$title,$desc])
                <div class="bg-zinc-900/30 border border-zinc-800/30 rounded-xl p-5 flex gap-4">
                    <div class="w-10 h-10 bg-violet-600/10 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold text-sm mb-1">{{ $title }}</h3>
                        <p class="text-zinc-500 text-xs leading-relaxed">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-violet-900/40 via-purple-900/20 to-zinc-900/40 border border-violet-500/20 rounded-3xl p-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4" style="font-family:'Bricolage Grotesque',sans-serif">
                Hansı xidmətə ehtiyacınız var?
            </h2>
            <p class="text-zinc-400 mb-8">Pulsuz konsultasiya alın — layihənizə uyğun həll seçək</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="bg-violet-700 hover:bg-violet-600 text-white font-semibold px-8 py-3.5 rounded-xl transition-all hover:scale-105 hover:shadow-lg hover:shadow-violet-700/30">Əlaqə saxla</a>
                <button @click="orderModal = true" class="border border-zinc-700 hover:border-violet-500 text-zinc-300 hover:text-white font-semibold px-8 py-3.5 rounded-xl transition-all">Sifariş ver</button>
            </div>
        </div>
    </div>
</section>

@endsection
