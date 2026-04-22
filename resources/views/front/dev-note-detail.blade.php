@extends('front.layouts.master')
@php
    $lang    = session('lang','az');
    $title   = ($lang === 'en' && $note->title_en) ? $note->title_en : $note->title_az;
    $title   = $title ?: $note->title_en ?: 'Başlıqsız';
    $body    = ($lang === 'en' && $note->body_en) ? $note->body_en : $note->body_az;
    $body    = $body ?: $note->body_en;
    $catName = $note->category ? $note->category->{'name_'.$lang} : null;
    $accents = ['#a78bfa','#34d399','#60a5fa','#f472b6','#fb923c','#facc15','#2dd4bf','#e879f9','#94a3b8','#f87171','#a3e635','#38bdf8','#c084fc','#4ade80','#fb7185','#fbbf24','#67e8f9','#d946ef'];
    $accent  = $accents[($note->note_category_id ?? 0) % count($accents)];
    $readMin = max(1, (int) ceil(str_word_count(strip_tags($body ?? '')) / 200));
@endphp
@section('title', $title . ' | Dev Notes')
@section('description', strip_tags(Str::limit($body ?? '', 160)))

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism-tomorrow.min.css">
<style>
/* ── Reading progress ── */
#read-progress {
    position: fixed; top: 0; left: 0;
    height: 2px; width: 0%;
    background: linear-gradient(90deg, #7c3aed, #6366f1, #38bdf8);
    z-index: 9999;
    transition: width .08s linear;
}

/* ── Grid bg ── */
.dn-grid-bg {
    background-image:
        linear-gradient(rgba(139,92,246,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(139,92,246,.04) 1px, transparent 1px);
    background-size: 40px 40px;
}

/* ── Code blocks ── */
.note-body pre {
    position: relative !important;
    background: #0d0d12 !important;
    border: 1px solid rgba(63,63,70,.7) !important;
    border-radius: 12px !important;
    padding: 2.6rem 1.5rem 1.25rem !important;
    margin: 1.5rem 0 !important;
    overflow-x: auto !important;
}
.note-body pre code {
    font-family: 'Fira Code','Cascadia Code','JetBrains Mono','Consolas',monospace !important;
    font-size: 0.82rem !important;
    background: none !important;
    line-height: 1.75 !important;
}
/* top bar line inside code block */
.note-body pre::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2rem;
    background: rgba(255,255,255,.025);
    border-bottom: 1px solid rgba(63,63,70,.5);
    border-radius: 12px 12px 0 0;
    pointer-events: none;
}
/* traffic lights */
.note-body pre::after {
    content: '';
    position: absolute;
    top: .55rem; left: .9rem;
    width: 38px; height: 9px;
    pointer-events: none;
    background:
        radial-gradient(circle at 4px 4px, #ff5f56 4px, transparent 4px),
        radial-gradient(circle at 17px 4px, #ffbd2e 4px, transparent 4px),
        radial-gradient(circle at 30px 4px, #27c93f 4px, transparent 4px);
}

/* ── Inline code ── */
.note-body :not(pre) > code {
    background: rgba(139,92,246,.13);
    color: #c4b5fd;
    padding: .15em .4em;
    border-radius: 4px;
    font-family: 'Fira Code','Consolas',monospace;
    font-size: .85em;
}

/* ── Copy button ── */
.copy-btn {
    position: absolute;
    top: .35rem; right: .6rem;
    display: inline-flex; align-items: center; gap: 4px;
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 6px;
    color: #71717a;
    font-size: 10px;
    padding: 3px 8px;
    cursor: pointer;
    transition: background .15s, color .15s, border-color .15s;
    font-family: ui-sans-serif,system-ui,sans-serif;
    letter-spacing: .03em;
    z-index: 10;
    line-height: 1.4;
}
.copy-btn:hover {
    background: rgba(139,92,246,.15);
    color: #c4b5fd;
    border-color: rgba(139,92,246,.35);
}
.copy-btn.copied {
    background: rgba(52,211,153,.08);
    color: #34d399;
    border-color: rgba(52,211,153,.3);
}

/* ── Lang badge ── */
.lang-badge {
    position: absolute;
    top: .4rem; left: 3.2rem;
    font-size: 9px;
    font-family: ui-sans-serif,system-ui,sans-serif;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: #3f3f46;
    z-index: 2;
    line-height: 1.6;
}

/* ── Prose ── */
.note-body h2 {
    font-size: 1.2rem; font-weight: 700; color: #fff;
    margin: 2rem 0 .75rem;
    padding-left: .85rem;
    border-left: 3px solid v-accent;
}
.note-body h3 { font-size: 1.05rem; font-weight: 700; color: #e4e4e7; margin: 1.5rem 0 .5rem; }
.note-body h4 { font-size: .95rem; font-weight: 600; color: #d4d4d8; margin: 1.2rem 0 .4rem; }
.note-body p  { color: #a1a1aa; line-height: 1.85; margin: .75rem 0; }
.note-body ul,.note-body ol { color: #a1a1aa; padding-left: 1.5rem; line-height: 1.8; margin: .75rem 0; }
.note-body li { margin: .3rem 0; }
.note-body a  { color: #a78bfa; text-decoration: none; }
.note-body a:hover { color: #c4b5fd; text-decoration: underline; }
.note-body strong { color: #e4e4e7; font-weight: 600; }
.note-body blockquote {
    border-left: 3px solid #7c3aed;
    padding: .85rem 1.25rem;
    background: rgba(124,58,237,.06);
    border-radius: 0 8px 8px 0;
    color: #a1a1aa; margin: 1.5rem 0;
}
.note-body table { width: 100%; border-collapse: collapse; font-size: .85rem; margin: 1.25rem 0; }
.note-body th { background: rgba(139,92,246,.1); color: #c4b5fd; text-align: left; padding: .6rem 1rem; border-bottom: 1px solid rgba(139,92,246,.2); font-size: .75rem; text-transform: uppercase; letter-spacing: .05em; }
.note-body td { padding: .55rem 1rem; border-bottom: 1px solid rgba(63,63,70,.5); color: #a1a1aa; }
.note-body tr:hover td { background: rgba(255,255,255,.02); }

/* ── Sidebar related link ── */
.rel-link { transition: background .15s, color .15s; }
.rel-link:hover { background: rgba(255,255,255,.03); color: #e4e4e7; }
</style>
@endpush

@section('content')

<div id="read-progress"></div>

{{-- ══ HERO ══ --}}
<section class="relative pt-28 pb-10 dn-grid-bg">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[700px] h-[280px] rounded-full blur-3xl opacity-[.18]"
             style="background: radial-gradient(ellipse, {{ $accent }}, transparent 70%)"></div>
    </div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-1.5 text-[11px] text-zinc-600 mb-6 flex-wrap">
            <a href="/" class="hover:text-zinc-400 transition-colors">RS Code</a>
            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="/dev-notes" class="hover:text-zinc-400 transition-colors">Dev Notes</a>
            @if($catName)
            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span style="color:{{ $accent }}">{{ $catName }}</span>
            @endif
        </nav>

        {{-- Category badge --}}
        @if($catName)
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-widest mb-5"
             style="background:color-mix(in srgb,{{ $accent }} 12%,transparent);color:{{ $accent }};border:1px solid color-mix(in srgb,{{ $accent }} 22%,transparent)">
            <span class="w-1.5 h-1.5 rounded-full shrink-0" style="background:{{ $accent }}"></span>
            {{ $catName }}
        </div>
        @endif

        {{-- Title --}}
        <h1 class="text-2xl sm:text-3xl lg:text-[2.1rem] font-bold leading-snug text-white mb-6 max-w-3xl"
            style="font-family:'Bricolage Grotesque',sans-serif">
            {{ $title }}
        </h1>

        {{-- Meta --}}
        <div class="flex items-center flex-wrap gap-5 text-xs text-zinc-600">
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $note->created_at?->format('d.m.Y') }}
            </span>
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $readMin }} dəq oxuma
            </span>
            @if($note->updated_at && $note->updated_at->ne($note->created_at))
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Yeniləndi: {{ $note->updated_at->format('d.m.Y') }}
            </span>
            @endif
        </div>
    </div>
</section>

{{-- ══ CONTENT ══ --}}
<section class="pb-24 pt-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex gap-12 items-start">

            {{-- ── Article ── --}}
            <article class="flex-1 min-w-0">
                <div class="note-body">
                    {!! $body !!}
                </div>

                {{-- Language toggle --}}
                @if($note->body_en && $note->body_az)
                <div class="mt-10 pt-6 border-t border-zinc-800/50 flex items-center gap-3">
                    <span class="text-zinc-600 text-xs">Digər dildə:</span>
                    @if($lang !== 'az')
                    <a href="{{ route('front.lang', 'az') }}" class="px-3 py-1.5 text-xs font-semibold rounded-lg bg-zinc-800 hover:bg-zinc-700 text-zinc-300 transition-colors">AZ</a>
                    @endif
                    @if($lang !== 'en')
                    <a href="{{ route('front.lang', 'en') }}" class="px-3 py-1.5 text-xs font-semibold rounded-lg bg-zinc-800 hover:bg-zinc-700 text-zinc-300 transition-colors">EN</a>
                    @endif
                </div>
                @endif

                {{-- Back --}}
                <div class="mt-10 pt-6 border-t border-zinc-800/50">
                    <a href="/dev-notes"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-zinc-800 text-zinc-400 text-sm hover:border-violet-500/40 hover:text-violet-300 transition-all group">
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                        </svg>
                        Dev Notes-a qayıt
                    </a>
                </div>
            </article>

            {{-- ── Sidebar ── --}}
            <aside class="hidden lg:block w-60 shrink-0">
                <div class="sticky top-24 space-y-3">

                    @if($note->category)
                    @php
                        $related = \App\Models\Note::where('note_category_id', $note->note_category_id)
                                      ->where('id', '!=', $note->id)
                                      ->orderByDesc('id')
                                      ->limit(12)
                                      ->get();
                    @endphp
                    @if($related->count() > 0)
                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl overflow-hidden">
                        <div class="px-4 py-3 border-b border-zinc-800 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full shrink-0" style="background:{{ $accent }}"></span>
                            <span class="text-[11px] font-bold uppercase tracking-widest" style="color:{{ $accent }}">{{ $catName }}</span>
                        </div>
                        <ul class="px-3 py-2">
                            @foreach($related as $rel)
                            @php $relTitle = ($lang==='en' && $rel->title_en) ? $rel->title_en : $rel->title_az; @endphp
                            <li>
                                <a href="/dev-notes/{{ $rel->id }}"
                                   class="rel-link flex items-start gap-2 px-2 py-2 rounded-lg text-zinc-500 text-xs leading-snug group">
                                    <span class="mt-1.5 w-1 h-1 rounded-full shrink-0" style="background:{{ $accent }};opacity:.45"></span>
                                    <span class="line-clamp-2 group-hover:text-zinc-200 transition-colors">{{ $relTitle ?: $rel->title_en }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @endif

                    {{-- All notes --}}
                    <a href="/dev-notes"
                       class="flex items-center gap-2.5 px-4 py-3 rounded-xl border border-zinc-800 text-zinc-500 text-xs font-semibold hover:border-zinc-700 hover:text-zinc-300 transition-all group">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                        Bütün qeydlər
                        <svg class="w-3 h-3 ml-auto opacity-0 group-hover:opacity-100 -translate-x-1 group-hover:translate-x-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                </div>
            </aside>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
<script>
Prism.plugins.autoloader.languages_path = 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/components/';

document.addEventListener('DOMContentLoaded', () => {
    Prism.highlightAll();

    // Copy button + lang badge
    document.querySelectorAll('.note-body pre').forEach(pre => {
        const code = pre.querySelector('code');

        // Language badge
        const langMatch = (code?.className || '').match(/language-(\w+)/);
        const lang = langMatch ? langMatch[1] : null;
        if (lang && lang !== 'plaintext') {
            const badge = document.createElement('span');
            badge.className = 'lang-badge';
            badge.textContent = lang;
            pre.appendChild(badge);
        }

        // Copy button
        const btn = document.createElement('button');
        btn.className = 'copy-btn';
        btn.title = 'Kopyala';
        btn.innerHTML = `<svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg> kopyala`;
        btn.addEventListener('click', () => {
            navigator.clipboard.writeText(code?.innerText ?? '').then(() => {
                btn.innerHTML = `<svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> kopyalandı`;
                btn.classList.add('copied');
                setTimeout(() => {
                    btn.innerHTML = `<svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg> kopyala`;
                    btn.classList.remove('copied');
                }, 2000);
            });
        });
        pre.appendChild(btn);
    });

    // Reading progress bar
    const bar     = document.getElementById('read-progress');
    const article = document.querySelector('.note-body');
    if (bar && article) {
        const onScroll = () => {
            const top   = article.getBoundingClientRect().top + window.scrollY;
            const total = article.offsetHeight - window.innerHeight;
            const pct   = Math.min(100, Math.max(0, ((window.scrollY - top) / total) * 100));
            bar.style.width = pct + '%';
        };
        window.addEventListener('scroll', onScroll, { passive: true });
    }
});
</script>
@endpush

@endsection
