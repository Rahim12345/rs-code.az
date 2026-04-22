{{-- ═══════════════════════════════════════════════════════════
     BRIF / SİFARİŞ MODAL  — Alpine.js driven, no Bootstrap
     activeModal: '' | 'logo' | 'web' | 'adlandirma' | 'smm' | 'seo'
════════════════════════════════════════════════════════════ --}}

<div x-show="orderModal"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click.self="orderModal=false; activeModal=''"
     class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[9999] overflow-y-auto flex items-start justify-center p-4 py-10"
     style="display:none">

    <div x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         class="w-full max-w-2xl bg-zinc-900 border border-zinc-800 rounded-2xl shadow-2xl shadow-black/60 overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-800">
            <div class="flex items-center gap-3">
                <button x-show="activeModal"
                        @click="activeModal=''"
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-800 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <h2 class="text-white font-bold text-lg" style="font-family:'Bricolage Grotesque',sans-serif">
                    <span x-show="!activeModal">{{ __('static.brif') ?? 'Brif' }}</span>
                    <span x-show="activeModal === 'logo'">{{ __('static.brif_logo') ?? 'LOGO' }}</span>
                    <span x-show="activeModal === 'web'">{{ __('static.brif_vebsayt') ?? 'VEB SAYT' }}</span>
                    <span x-show="activeModal === 'adlandirma'">{{ __('static.brif_adlandirma') ?? 'ADLANDIRMA' }}</span>
                    <span x-show="activeModal === 'smm'">{{ __('static.brif_smm') ?? 'SMM' }}</span>
                    <span x-show="activeModal === 'seo'">{{ __('static.brif_seo') ?? 'SEO' }}</span>
                </h2>
            </div>
            <button @click="orderModal=false; activeModal=''"
                    class="modal-close w-8 h-8 flex items-center justify-center rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-800 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- STEP 1 — Category selection --}}
        <div x-show="!activeModal" class="p-6">
            <p class="text-zinc-500 text-sm text-center mb-6">Xidmət növünü seçin</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach([
                    ['logo',       __('static.brif_logo')       ?? 'LOQOTİP VƏ KORPORATİV ÜSLUB', 'M4 5a1 1 0 00-.867.5 1 1 0 110-1A1 1 0 014 5zm12 0a1 1 0 00-.867.5 1 1 0 110-1A1 1 0 0116 5zM4 19a1 1 0 100-2 1 1 0 000 2zm12 0a1 1 0 100-2 1 1 0 000 2zM6 12a6 6 0 1012 0A6 6 0 006 12z'],
                    ['web',        __('static.brif_vebsayt')    ?? 'VEB SAYT HAZIRLANMASI',         'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'],
                    ['adlandirma', __('static.brif_adlandirma') ?? 'ADLANDIRMA',                    'M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z'],
                    ['smm',        __('static.brif_smm')        ?? 'SMM',                           'M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z'],
                    ['seo',        __('static.brif_seo')        ?? 'SEO',                           'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                ] as [$key, $label, $icon])
                <button @click="activeModal='{{ $key }}'"
                        class="flex items-center gap-4 p-4 bg-zinc-800/50 hover:bg-violet-600/20 border border-zinc-700/50 hover:border-violet-500/50 rounded-xl transition-all group text-left">
                    <div class="w-10 h-10 bg-violet-600/10 group-hover:bg-violet-600/20 rounded-xl flex items-center justify-center shrink-0 transition-all">
                        <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <span class="text-zinc-300 group-hover:text-white text-sm font-medium transition-colors leading-tight">{{ $label }}</span>
                    <svg class="w-4 h-4 text-zinc-600 group-hover:text-violet-400 ml-auto shrink-0 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                @endforeach
            </div>
            <div class="mt-6 pt-5 border-t border-zinc-800 flex items-center justify-between">
                <p class="text-zinc-600 text-xs">Ətraflı məlumat üçün bizimlə əlaqə saxlayın</p>
                <a href="/contact" @click="orderModal=false" class="text-violet-400 hover:text-violet-300 text-xs font-medium transition-colors">{{ __('index.contact') }}</a>
            </div>
        </div>

        {{-- STEP 2 — Brif forms --}}
        @include('front.includes.brif-modal-one')
        @include('front.includes.brif-modal-two')
        @include('front.includes.brif-modal-three')
        @include('front.includes.brif-modal-four')
        @include('front.includes.brif-modal-five')
    </div>
</div>
