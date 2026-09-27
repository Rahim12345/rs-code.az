{{-- Xidmət səhifəsindən əlaqəli bloqlara daxili linklər. Parametr: $slugs (slug_az siyahısı) --}}
@php
    $rpLang  = app()->getLocale();
    $rpPosts = DB::table('blogs')
        ->whereIn('slug_az', $slugs)
        ->where('noindex', false)
        ->get()
        ->sortBy(fn ($b) => array_search($b->slug_az, $slugs));
    $rpHeading = ['az' => 'Əlaqəli məqalələr', 'en' => 'Related articles', 'ru' => 'Полезные статьи'][$rpLang] ?? 'Əlaqəli məqalələr';
@endphp
@if($rpPosts->isNotEmpty())
<section class="pb-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white mb-6" style="font-family:'Bricolage Grotesque',sans-serif">{{ $rpHeading }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($rpPosts as $post)
            @php
                $pSlug  = $post->{'slug_' . $rpLang} ?: $post->slug_az;
                $pTitle = $post->{'title_' . $rpLang} ?: $post->title_az;
                $pPhoto = ($rpLang !== 'az' && !empty($post->{'photo_' . $rpLang})) ? $post->{'photo_' . $rpLang} : $post->photo;
                $pImg   = ($pPhoto && !str_starts_with($pPhoto, 'http')) ? asset('images/blog/' . $pPhoto) : $pPhoto;
            @endphp
            <a href="/blog-details/{{ $pSlug }}" class="group block bg-zinc-900/40 border border-zinc-800/50 rounded-2xl overflow-hidden hover:border-violet-500/30 transition-all duration-300 hover:-translate-y-1">
                @if($pImg)
                <img src="{{ $pImg }}" alt="{{ $pTitle }}" loading="lazy" width="600" height="315" class="w-full aspect-[1200/630] object-cover">
                @endif
                <span class="block p-5 text-white font-semibold leading-snug group-hover:text-violet-400 transition-colors">{{ $pTitle }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
