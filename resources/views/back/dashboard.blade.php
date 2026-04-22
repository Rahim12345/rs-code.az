@extends('back.layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb', 'Ana səhifə / Dashboard')

@section('content')

{{-- Stats --}}
@php
$colors = [
    'indigo' => ['bg-indigo-50 hover:bg-indigo-100', 'bg-indigo-100', 'text-indigo-600'],
    'violet' => ['bg-violet-50 hover:bg-violet-100', 'bg-violet-100', 'text-violet-600'],
    'amber'  => ['bg-amber-50  hover:bg-amber-100',  'bg-amber-100',  'text-amber-600'],
    'green'  => ['bg-green-50  hover:bg-green-100',  'bg-green-100',  'text-green-600'],
    'cyan'   => ['bg-cyan-50   hover:bg-cyan-100',   'bg-cyan-100',   'text-cyan-600'],
];
$statCards = [
    ['Layihələr',     \App\Models\Project::count(),  'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'indigo', '/admin/projects'],
    ['Blog yazıları', \Illuminate\Support\Facades\DB::table('blogs')->count(), 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'violet', '/admin/blogs'],
    ['Müştəri rəyi',  \App\Models\Comment::count(),  'M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z', 'amber', '/admin/comments'],
    ['Müraciətlər',   \App\Models\Contact::count(),  'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'green', '/admin/contacts'],
    ['Bu gün ziyarət',\Illuminate\Support\Facades\DB::table('visitors')->where('date', now()->toDateString())->count(), 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'cyan', '/admin/visitors'],
    ['Xidmətlər',     \App\Models\Service::count(),  'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'indigo', '/admin/services'],
    ['Məhsullar',     \App\Models\Product::count(),  'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'violet', '/admin/product'],
    ['Tərəfdaş',      \App\Models\Partner::count(),  'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1', 'amber', '/admin/partners'],
    ['Komanda',       \App\Models\Team::count(),     'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'green', '/admin/team'],
];
@endphp

<div class="grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
    @foreach($statCards as [$label, $count, $icon, $color, $url])
    @php [$cardBg, $iconBg, $iconText] = $colors[$color]; @endphp
    <a href="{{ $url }}" class="admin-card p-4 {{ $cardBg }} transition-colors group block">
        <div class="flex items-center justify-between mb-3">
            <div class="w-9 h-9 {{ $iconBg }} rounded-lg flex items-center justify-center">
                <svg class="w-4.5 h-4.5 {{ $iconText }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                </svg>
            </div>
            <svg class="w-3.5 h-3.5 text-gray-300 group-hover:text-gray-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
        <div class="text-2xl font-bold text-gray-900 mb-0.5">{{ $count }}</div>
        <div class="text-gray-500 text-xs">{{ $label }}</div>
    </a>
    @endforeach
</div>

{{-- Quick links + Recent --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Quick actions --}}
    <div class="admin-card p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Sürətli keçidlər</h2>
        <div class="space-y-2">
            @foreach([
                ['/admin/add-blog',    'Yeni blog yazısı',   'bg-violet-100 text-violet-600'],
                ['/admin/projects',    'Layihə əlavə et',    'bg-indigo-100 text-indigo-600'],
                ['/admin/partners',    'Tərəfdaş əlavə et', 'bg-amber-100  text-amber-600'],
                ['/admin/about',       'Haqqımızda yenilə',  'bg-green-100  text-green-600'],
            ] as [$url, $label, $badgeCls])
            <a href="{{ $url }}"
               class="flex items-center justify-between px-4 py-2.5 rounded-lg hover:bg-gray-50 transition-colors group">
                <span class="text-sm text-gray-700 group-hover:text-indigo-600 transition-colors">{{ $label }}</span>
                <svg class="w-4 h-4 text-gray-400 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
            @endforeach
        </div>
    </div>

    {{-- Recent blogs --}}
    <div class="admin-card p-6 lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-semibold text-gray-900">Son blog yazıları</h2>
            <a href="/admin/blogs" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">Hamısı</a>
        </div>
        <div class="space-y-3">
            @foreach(\Illuminate\Support\Facades\DB::table('blogs')->orderByDesc('id')->limit(5)->get() as $blog)
            <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-8 h-8 bg-violet-100 rounded-lg shrink-0 overflow-hidden">
                        @if($blog->photo)
                        <img src="{{ asset('images/blog/'.$blog->photo) }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-violet-400 text-xs font-bold">B</div>
                        @endif
                    </div>
                    <span class="text-sm text-gray-700 truncate">{{ $blog->title_az }}</span>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</span>
                    <a href="/admin/edit-blog/{{ $blog->id }}" class="text-indigo-500 hover:text-indigo-700 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Recent contacts --}}
<div class="mt-6 admin-card p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-sm font-semibold text-gray-900">Son müraciətlər</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-xs text-gray-500 border-b border-gray-100">
                    <th class="text-left pb-3 font-medium">Ad</th>
                    <th class="text-left pb-3 font-medium">Şirkət</th>
                    <th class="text-left pb-3 font-medium hidden sm:table-cell">Email</th>
                    <th class="text-left pb-3 font-medium hidden md:table-cell">Nömrə</th>
                    <th class="text-left pb-3 font-medium hidden lg:table-cell">Tarix</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Contact::latest()->limit(8)->get() as $contact)
                <tr class="border-b border-gray-50 last:border-0 hover:bg-gray-50 transition-colors">
                    <td class="py-3 text-gray-900 font-medium">{{ $contact->name }}</td>
                    <td class="py-3 text-gray-600">{{ $contact->sirket }}</td>
                    <td class="py-3 text-gray-600 hidden sm:table-cell">{{ $contact->email }}</td>
                    <td class="py-3 text-gray-600 hidden md:table-cell">{{ $contact->elaqe_nomresi }}</td>
                    <td class="py-3 text-gray-400 text-xs hidden lg:table-cell">{{ \Carbon\Carbon::parse($contact->created_at)->format('d.m.Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
