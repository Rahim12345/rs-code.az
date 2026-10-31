{{-- Xidmət səhifəsi üçün: qısa cavab, qiymət cədvəli, real layihələr, FAQ.
     Parametr: $key — tərcümə faylının adı (məs. 'development', 'seo'). Açarlar: x_short, x_prices_*, x_faq*, x_cases.
     FAQPage schema page-schema partial-ında ['faq' => $key.'.x_faq'] ilə yaradılır. --}}
@php
    $prices = __($key . '.x_prices');
    $faq    = __($key . '.x_faq');
    $cases  = (array) __($key . '.x_cases');
    $caseTx = __('cases');
    $only   = $only ?? null;               // 'short' — yalnız qısa cavab, 'rest' — qalanları
    $showShort = $only !== 'rest';
    $showRest  = $only !== 'short';
@endphp

@if($showShort && is_string(__($key . '.x_short')) && __($key . '.x_short') !== $key . '.x_short')
<div class="bg-violet-950/30 border border-violet-500/25 rounded-2xl p-6">
    <p class="text-zinc-200 leading-relaxed text-base">{!! __($key . '.x_short') !!}</p>
</div>
@endif

@if($showRest && is_array($prices))
<div>
    <h2 class="text-2xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ __($key . '.x_prices_title') }}</h2>
    <div class="overflow-x-auto rounded-2xl border border-zinc-800/60">
        <table class="w-full text-sm">
            <thead class="bg-zinc-900/80 text-zinc-300">
                <tr>
                    @foreach(__($key . '.x_prices_head') as $h)
                        <th class="text-left font-semibold px-4 py-3">{{ $h }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-800/60">
                @foreach($prices as $row)
                <tr class="text-zinc-400">
                    @foreach($row as $i => $cell)
                        <td class="px-4 py-3 {{ $i === 0 ? 'text-zinc-200 font-medium' : '' }} {{ $i === 1 ? 'text-violet-300 whitespace-nowrap' : '' }}">{{ $cell }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p class="text-zinc-500 text-xs mt-3 leading-relaxed">{!! __($key . '.x_prices_note') !!}</p>
</div>
@endif

@if($showRest && $cases && is_array($caseTx))
<div>
    <h2 class="text-2xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ $caseTx['title'] }}</h2>
    <div class="grid sm:grid-cols-3 gap-4">
        @foreach($cases as $slug)
            @continue(!isset($caseTx['items'][$slug]))
            <a href="/project-details/{{ $slug }}" class="group bg-zinc-900/40 border border-zinc-800/50 rounded-2xl overflow-hidden hover:border-violet-500/40 transition-all">
                <img src="{{ pimg($slug . '-cover.jpg') }}" alt="{{ $caseTx['items'][$slug][0] }}" class="w-full aspect-video object-cover" loading="lazy" width="640" height="360">
                <div class="p-4">
                    <h3 class="font-semibold text-white text-sm group-hover:text-violet-300 transition-colors">{{ $caseTx['items'][$slug][0] }}</h3>
                    <p class="text-zinc-400 text-xs mt-1 leading-relaxed">{{ $caseTx['items'][$slug][1] }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif

@if($showRest && is_array($faq))
<div>
    <h2 class="text-2xl font-bold text-white mb-5" style="font-family:'Bricolage Grotesque',sans-serif">{{ __($key . '.x_faq_title') }}</h2>
    <div class="space-y-3">
        @foreach($faq as [$q, $a])
        <details class="group bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-5 open:border-violet-500/30">
            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 font-semibold text-zinc-200 text-sm">
                {{ $q }}
                <span class="text-violet-400 transition-transform group-open:rotate-45 text-lg leading-none">+</span>
            </summary>
            <p class="text-zinc-400 text-sm leading-relaxed mt-3">{!! $a !!}</p>
        </details>
        @endforeach
    </div>
</div>
@endif
