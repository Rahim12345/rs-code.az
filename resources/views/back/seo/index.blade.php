@extends('back.layouts.master')
@section('title', 'SEO Ayarları')

@section('content')

<div class="max-w-3xl space-y-8">

    {{-- Sitemap preview --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-base font-semibold text-gray-900">Sitemap.xml</h2>
                <p class="text-xs text-gray-400 mt-0.5">Dinamik — yeni blog/layihə əlavə olunanda avtomatik yenilənir</p>
            </div>
            <a href="/sitemap.xml" target="_blank"
               class="btn-primary btn-sm">
                <i class="fa fa-external-link-alt"></i>
                Bax
            </a>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 text-xs font-mono text-gray-500 space-y-1">
            @php
                $base = rtrim(config('app.url'), '/');
                $blogCount    = \Illuminate\Support\Facades\DB::table('blogs')->count();
                $projectCount = \Illuminate\Support\Facades\DB::table('projects')->count();
                $noteCount    = \Illuminate\Support\Facades\DB::table('notes')->count();
            @endphp
            <div class="flex justify-between"><span>Statik səhifələr</span><span class="text-indigo-600 font-semibold">46</span></div>
            <div class="flex justify-between"><span>Blog yazıları (AZ/EN/RU)</span><span class="text-indigo-600 font-semibold">{{ $blogCount * 3 }}</span></div>
            <div class="flex justify-between"><span>Layihələr</span><span class="text-indigo-600 font-semibold">{{ $projectCount }}</span></div>
            <div class="flex justify-between"><span>Dev Notlar</span><span class="text-indigo-600 font-semibold">{{ $noteCount }}</span></div>
            <div class="border-t border-gray-200 pt-1 flex justify-between font-bold text-gray-700">
                <span>Cəmi URL</span>
                <span class="text-indigo-700">{{ 46 + $blogCount * 3 + $projectCount + $noteCount }}</span>
            </div>
        </div>

        <div class="mt-3 flex items-center gap-2 text-xs text-gray-400">
            <i class="fa fa-info-circle"></i>
            Sitemap URL: <a href="{{ $base }}/sitemap.xml" target="_blank" class="text-indigo-500 hover:underline">{{ $base }}/sitemap.xml</a>
        </div>
    </div>

    {{-- robots.txt editor --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-base font-semibold text-gray-900">robots.txt</h2>
                <p class="text-xs text-gray-400 mt-0.5">Axtarış robotlarının davranışını idarə edin</p>
            </div>
            <a href="/robots.txt" target="_blank" class="btn-primary btn-sm">
                <i class="fa fa-external-link-alt"></i>
                Bax
            </a>
        </div>

        <form action="/admin/seo/robots" method="POST">
            @csrf
            <div class="mb-4">
                <textarea name="robots" rows="16"
                    class="w-full font-mono text-sm border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-gray-50 resize-y"
                >{{ old('robots', $robots) }}</textarea>
                @error('robots')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="text-xs text-gray-400 space-y-0.5">
                    <p><code class="bg-gray-100 px-1 rounded">User-agent: *</code> — bütün botlar</p>
                    <p><code class="bg-gray-100 px-1 rounded">Disallow: /admin/</code> — admin gizli saxlanır</p>
                    <p><code class="bg-gray-100 px-1 rounded">Sitemap:</code> — Google-a sitemap göstərilir</p>
                </div>
                <button type="submit" class="btn-primary">
                    <i class="fa fa-save"></i>
                    Yadda saxla
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
