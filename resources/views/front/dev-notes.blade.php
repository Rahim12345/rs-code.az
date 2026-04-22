@extends('front.layouts.master')
@php
    $lang       = session('lang','az');
    $totalNotes = $categories->sum('notes_count');
    $allNotes   = $notes->flatten();
@endphp
@section('title', 'Dev Notes | RS Code')
@section('description', 'Kodlaşdırma qeydləri — PHP, Laravel, JavaScript, SQL, Git və digər texniki mövzular.')

@push('styles')
<style>
/* ── Grid bg pattern ── */
.dn-grid-bg {
    background-image:
        linear-gradient(rgba(139,92,246,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(139,92,246,.04) 1px, transparent 1px);
    background-size: 40px 40px;
}
/* ── Terminal blink ── */
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }
.cursor-blink { animation: blink 1.1s step-end infinite; }

/* ── Scrollbar hide ── */
.scrollbar-hide::-webkit-scrollbar { display:none; }
.scrollbar-hide { -ms-overflow-style:none; scrollbar-width:none; }

/* ── Category accent colors ── */
.cat-accent-0  { --accent: #a78bfa; }
.cat-accent-1  { --accent: #34d399; }
.cat-accent-2  { --accent: #60a5fa; }
.cat-accent-3  { --accent: #f472b6; }
.cat-accent-4  { --accent: #fb923c; }
.cat-accent-5  { --accent: #facc15; }
.cat-accent-6  { --accent: #2dd4bf; }
.cat-accent-7  { --accent: #e879f9; }
.cat-accent-8  { --accent: #94a3b8; }
.cat-accent-9  { --accent: #f87171; }
.cat-accent-10 { --accent: #a3e635; }
.cat-accent-11 { --accent: #38bdf8; }
.cat-accent-12 { --accent: #c084fc; }
.cat-accent-13 { --accent: #4ade80; }
.cat-accent-14 { --accent: #fb7185; }
.cat-accent-15 { --accent: #fbbf24; }
.cat-accent-16 { --accent: #67e8f9; }
.cat-accent-17 { --accent: #d946ef; }
.cat-accent-18 { --accent: #a78bfa; }

.note-card-inner {
    border-top: 2px solid var(--accent, #a78bfa);
    transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}
.note-card-wrap:hover .note-card-inner {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px -8px rgba(0,0,0,.45);
}
.cat-sidebar-btn.active {
    background: rgba(139,92,246,.12);
    color: #c4b5fd;
    border-color: rgba(139,92,246,.35);
}

</style>
@endpush

@section('content')

{{-- ══ HERO ══ --}}
<section class="relative pt-28 pb-14 dn-grid-bg">

    {{-- glow orbs — clipped in their own container so the section has no overflow restriction --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-violet-600/10 rounded-full blur-3xl"></div>
        <div class="absolute top-10 right-0 w-72 h-72 bg-indigo-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex flex-col lg:flex-row items-start gap-10 lg:gap-16">

            {{-- ── SOL: badge + mətn ── --}}
            <div class="flex-1 min-w-0">

                {{-- badge --}}
                <div class="inline-flex items-center gap-2 bg-violet-500/10 border border-violet-500/20 text-violet-300 text-[11px] font-semibold px-3.5 py-1 rounded-full mb-5 tracking-widest uppercase">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                    Dev Notes
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold leading-tight mb-4" style="font-family:'Bricolage Grotesque',sans-serif">
                    Kodlaşdırma <span class="gradient-text">Qeydləri</span>
                </h1>

                <p class="text-zinc-400 text-sm leading-relaxed mb-8 max-w-md">
                    PHP, Laravel, JavaScript, SQL, Git və digər texniki mövzularda şəxsi həll yolları.
                </p>

                {{-- stats --}}
                <div class="flex items-center gap-5 flex-wrap">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-violet-500/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-white font-bold text-sm leading-none">{{ $totalNotes }}</div>
                            <div class="text-zinc-500 text-[11px] mt-0.5">Qeyd</div>
                        </div>
                    </div>
                    <div class="w-px h-7 bg-zinc-800"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5l4.707 4.707a1 1 0 01.293.707V17a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-white font-bold text-sm leading-none">{{ $categories->where('notes_count','>',0)->count() }}</div>
                            <div class="text-zinc-500 text-[11px] mt-0.5">Kateqoriya</div>
                        </div>
                    </div>
                    <div class="w-px h-7 bg-zinc-800"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-white font-bold text-sm leading-none">{{ $allNotes->first()?->created_at?->format('Y') ?? '—' }}</div>
                            <div class="text-zinc-500 text-[11px] mt-0.5">İlk qeyddən</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── SAĞ: terminal (interactive filter) ── --}}
            <div class="w-full lg:w-auto lg:shrink-0 lg:self-center"
                 x-data="{
                     open: false,
                     activeCat: 'all',
                     activeLabel: 'Hamısı',
                     select(id, label) { this.activeCat = id; this.activeLabel = label; this.open = false; filterNotes(id); }
                 }">
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-visible w-full lg:w-[440px]">
                    {{-- titlebar --}}
                    <div class="flex items-center gap-1.5 px-4 py-2.5 border-b border-zinc-800/60 bg-zinc-900/60 rounded-t-xl">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500/60"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/60"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500/60"></span>
                        <span class="ml-2 text-zinc-500 text-[11px]">notes.php</span>
                    </div>
                    {{-- code body --}}
                    <div class="px-5 py-5 font-mono text-sm" style="line-height:2.1">
                        {{-- comment --}}
                        <div>
                            <span class="text-zinc-500">// </span>
                            <span class="text-zinc-400">Şəxsi kodlaşdırma qeydləri</span>
                        </div>
                        {{-- $notes = Note --}}
                        <div>
                            <span class="text-violet-400">$notes</span>
                            <span class="text-zinc-400"> = </span>
                            <span class="text-emerald-400">Note</span>
                        </div>
                        {{-- ::where('*', '<input>') --}}
                        <div class="pl-5 flex items-baseline">
                            <span class="text-zinc-300">::</span>
                            <span class="text-sky-400">where</span>
                            <span class="text-zinc-300">(</span>
                            <span class="text-amber-300 shrink-0">'*',&nbsp;'</span>
                            <input id="noteSearch" type="text" placeholder="axtar..."
                                   autocomplete="off" spellcheck="false"
                                   class="bg-transparent text-amber-300 placeholder-zinc-600 outline-none border-b border-zinc-700/60 focus:border-violet-500 w-28 transition-colors"
                                   style="font-size:inherit;font-family:inherit;line-height:1">
                            <span class="text-amber-300 shrink-0">'</span>
                            <span class="text-zinc-300">)</span>
                        </div>
                        {{-- ->whereCategory('<dropdown>') --}}
                        <div class="pl-5 flex items-baseline">
                            <span class="text-zinc-300">-></span>
                            <span class="text-sky-400">whereCategory</span>
                            <span class="text-zinc-300">(</span>
                            <span class="relative inline-flex items-baseline" @click.outside="open=false">
                                <button @click="open=!open"
                                        class="text-amber-300 hover:text-amber-200 border-b border-zinc-700/60 hover:border-violet-500 outline-none transition-colors leading-none"
                                        style="font-size:inherit;font-family:inherit">
                                    '<span x-text="activeLabel"></span>'
                                </button>
                                {{-- dropdown panel --}}
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 -translate-y-1"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 -translate-y-1"
                                     style="display:none"
                                     class="absolute left-0 top-full mt-1.5 w-60 border border-zinc-800 rounded-xl shadow-2xl shadow-black/70 z-[200] overflow-hidden" style="background:#0f0f13">
                                    <div class="overflow-y-auto p-1.5 space-y-0.5 scrollbar-hide" style="font-family:inherit;height:400px">
                                        <button @click="select('all','Hamısı')"
                                                class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs hover:bg-zinc-800 transition-colors cursor-pointer"
                                                :class="activeCat==='all' ? 'text-violet-400 bg-zinc-800/80' : 'text-zinc-300'">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-violet-500 shrink-0"></span>
                                                Hamısı
                                            </span>
                                            <span class="text-zinc-500 tabular-nums">{{ $totalNotes }}</span>
                                        </button>
                                        <div class="h-px bg-zinc-800/60 mx-1 my-1"></div>
                                        @foreach($categories as $ci => $cat)
                                        @if($cat->notes_count > 0)
                                        @php $ca = ['#a78bfa','#34d399','#60a5fa','#f472b6','#fb923c','#facc15','#2dd4bf','#e879f9','#94a3b8','#f87171','#a3e635','#38bdf8','#c084fc','#4ade80','#fb7185','#fbbf24','#67e8f9','#d946ef'][$ci % 18]; @endphp
                                        <button @click="select('{{ $cat->id }}','{{ addslashes($cat->{'name_'.$lang}) }}')"
                                                class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs hover:bg-zinc-800 transition-colors cursor-pointer"
                                                :class="activeCat==='{{ $cat->id }}' ? 'bg-zinc-800/80' : 'text-zinc-400'">
                                            <span class="flex items-center gap-2 truncate pr-2">
                                                <span class="w-1.5 h-1.5 rounded-full shrink-0" style="background:{{ $ca }}"></span>
                                                <span class="truncate">{{ $cat->{'name_'.$lang} }}</span>
                                            </span>
                                            <span class="text-zinc-600 tabular-nums shrink-0">{{ $cat->notes_count }}</span>
                                        </button>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </span>
                            <span class="text-zinc-300">)</span>
                        </div>
                        {{-- ->get(); ▋ --}}
                        <div class="pl-5">
                            <span class="text-zinc-300">-></span>
                            <span class="text-sky-400">get</span>
                            <span class="text-zinc-300">();</span>
                            <span class="cursor-blink text-violet-400 ml-1">▋</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ══ NOTES GRID ══ --}}
<section class="py-10 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div id="notesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($allNotes as $ni => $note)
            @php
                $title   = ($lang === 'en' && $note->title_en) ? $note->title_en : $note->title_az;
                $title   = $title ?: $note->title_en ?: 'Başlıqsız';
                $body    = ($lang === 'en' && $note->body_en) ? $note->body_en : $note->body_az;
                $preview = Str::limit(strip_tags(html_entity_decode($body ?? '')), 80);
                $catName = $note->category ? $note->category->{'name_'.$lang} : null;
                $catIdx  = $categories->search(fn($c) => $c->id === $note->note_category_id);
                $catIdx  = $catIdx !== false ? $catIdx : 0;
                $accents = ['#a78bfa','#34d399','#60a5fa','#f472b6','#fb923c','#facc15','#2dd4bf','#e879f9','#94a3b8','#f87171','#a3e635','#38bdf8','#c084fc','#4ade80','#fb7185','#fbbf24','#67e8f9','#d946ef'];
                $accent  = $accents[$catIdx % count($accents)];
            @endphp
            <div class="note-card-wrap" data-cat="{{ $note->note_category_id }}" data-title="{{ strtolower($title) }}">
                <a href="/dev-notes/{{ $note->id }}"
                   class="note-card-inner flex flex-col bg-zinc-900/50 border border-zinc-800/60 rounded-xl p-4 h-full"
                   style="--accent: {{ $accent }}">

                    {{-- Category badge + date --}}
                    <div class="flex items-center justify-between gap-2 mb-2.5">
                        @if($catName)
                        <span class="text-[10px] font-bold uppercase tracking-widest px-1.5 py-0.5 rounded"
                              style="background:color-mix(in srgb,{{ $accent }} 13%,transparent);color:{{ $accent }}">
                            {{ $catName }}
                        </span>
                        @endif
                        <span class="text-zinc-600 text-[10px] shrink-0 ml-auto">{{ $note->created_at?->format('d.m.Y') }}</span>
                    </div>

                    {{-- Title --}}
                    <h2 class="text-zinc-100 text-sm font-semibold leading-snug line-clamp-2 mb-2">{{ $title }}</h2>

                    {{-- Preview --}}
                    @if($preview)
                    <p class="text-zinc-500 text-xs leading-relaxed line-clamp-2 mb-3 flex-1">{{ $preview }}</p>
                    @else
                    <div class="flex-1"></div>
                    @endif

                    {{-- Read link --}}
                    <div class="flex items-center gap-1 text-[11px] font-medium mt-auto pt-2 border-t border-zinc-800/50"
                         style="color:{{ $accent }};opacity:.75">
                        Oxu
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- Empty state --}}
        <div id="noResults" class="hidden text-center py-24">
            <div class="w-14 h-14 bg-zinc-900 border border-zinc-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                </svg>
            </div>
            <p class="text-zinc-400 font-medium text-sm mb-1">Nəticə tapılmadı</p>
            <p class="text-zinc-600 text-xs">Fərqli açar söz və ya kateqoriya seçin</p>
        </div>

    </div>
</section>

@push('scripts')
<script>
const cards    = document.querySelectorAll('.note-card-wrap');
const noRes    = document.getElementById('noResults');
const searchEl = document.getElementById('noteSearch');

let _cat  = 'all';
let _term = '';

function filterNotes(catId) {
    _cat = catId ?? _cat;
    let n = 0;
    cards.forEach(c => {
        const show = (_cat === 'all' || c.dataset.cat === _cat)
                  && (!_term || c.dataset.title.includes(_term));
        c.style.display = show ? '' : 'none';
        if (show) n++;
    });
    noRes.classList.toggle('hidden', n > 0);
}

searchEl.addEventListener('input', () => {
    _term = searchEl.value.toLowerCase().trim();
    filterNotes();
});
</script>
@endpush

@endsection
