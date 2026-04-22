<!DOCTYPE html>
<html lang="az" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — RS Code Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('img/132.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @stack('styles')
</head>
<body class="h-full bg-gray-50 font-sans antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-full">

        {{-- Sidebar --}}
        <aside class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 bg-indigo-950 z-40">
            {{-- Logo --}}
            <div class="flex items-center gap-3 px-6 py-5 border-b border-indigo-900/60">
                <img src="{{ asset('img/rs-code.png') }}" alt="RS Code" class="h-7 w-auto brightness-200">
            </div>

            {{-- Nav --}}
            <nav class="flex-1 px-3 py-4 overflow-y-auto">
                @php
                    $seg1 = Request::segment(2) ?? '';
                    $groups = [
                        '' => [
                            ['M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6','Dashboard','dashboard'],
                        ],
                        'Məzmun' => [
                            ['M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z','Blog','blogs'],
                            ['M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z','Qeydlər','notes'],
                            ['M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z','Layihələr','projects'],
                            ['M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4','Məhsullar','product'],
                            ['M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z','Xidmətlər','services'],
                        ],
                        'Şirkət' => [
                            ['M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0','Haqqımızda','about'],
                            ['M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z','Komanda','team'],
                            ['M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','Şirkətlər','company'],
                            ['M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1','Tərəfdaşlar','partners'],
                            ['M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z','Rəylər','comments'],
                        ],
                        'Müraciətlər' => [
                            ['M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4','Əlaqə formu','contacts'],
                            ['M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4','Briflər','brifs'],
                        ],
                        'Analitika' => [
                            ['M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z','Ziyarətçilər','visitors'],
                            ['M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1','Link Klikləri','visitors/links'],
                        ],
                        'Sistem' => [
                            ['M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z','SEO Ayarları','seo'],
                        ],
                    ];
                @endphp

                @foreach($groups as $groupLabel => $items)
                    @if($groupLabel !== '')
                    <p class="nav-group-label">{{ $groupLabel }}</p>
                    @endif
                    @foreach($items as $item)
                    @php
                        $active = Request::is('admin/'.$item[2])
                            || ($item[2] === 'dashboard' && Request::is('admin') && !$seg1)
                            || ($item[2] === 'notes' && $seg1 === 'note-categories');
                    @endphp
                    <a href="/admin/{{ $item[2] }}"
                       class="nav-link {{ $active ? 'active' : '' }}">
                        <svg class="w-4 h-4 shrink-0 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[0] }}"/>
                        </svg>
                        <span>{{ $item[1] }}</span>
                    </a>
                    @endforeach
                @endforeach
            </nav>

            {{-- Footer --}}
            <div class="px-3 py-4 border-t border-indigo-900/60">
                <a href="{{ route('admin.profile') }}" class="nav-link {{ $seg1 === 'profile' ? 'active' : '' }} mb-1">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="text-sm font-medium">Profil</span>
                </a>
                <a href="/admin/logout" class="nav-link text-red-400 hover:text-red-300 hover:bg-red-900/20">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="text-sm font-medium">Çıxış</span>
                </a>
            </div>
        </aside>

        {{-- Mobile sidebar overlay --}}
        <div x-show="sidebarOpen" @click="sidebarOpen=false"
             class="fixed inset-0 bg-black/60 z-30 lg:hidden" x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"></div>

        {{-- Mobile sidebar --}}
        <aside x-show="sidebarOpen" x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
               class="fixed inset-y-0 left-0 w-64 bg-indigo-950 z-40 flex flex-col lg:hidden">
            <div class="flex items-center justify-between px-6 py-5 border-b border-indigo-900/60">
                <img src="{{ asset('img/rs-code.png') }}" alt="RS Code" class="h-7 w-auto brightness-200">
                <button @click="sidebarOpen=false" class="text-indigo-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <nav class="flex-1 px-3 py-4 overflow-y-auto">
                @foreach($groups as $groupLabel => $items)
                    @if($groupLabel !== '')
                    <p class="nav-group-label">{{ $groupLabel }}</p>
                    @endif
                    @foreach($items as $item)
                    @php
                        $active = Request::is('admin/'.$item[2])
                            || ($item[2] === 'dashboard' && Request::is('admin') && !$seg1)
                            || ($item[2] === 'notes' && $seg1 === 'note-categories');
                    @endphp
                    <a href="/admin/{{ $item[2] }}" @click="sidebarOpen=false"
                       class="nav-link {{ $active ? 'active' : '' }}">
                        <svg class="w-4 h-4 shrink-0 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[0] }}"/>
                        </svg>
                        <span>{{ $item[1] }}</span>
                    </a>
                    @endforeach
                @endforeach
            </nav>
        </aside>

        {{-- Main content --}}
        <div class="flex-1 flex flex-col min-h-screen lg:pl-64">

            {{-- Top bar --}}
            <header class="sticky top-0 z-20 bg-white border-b border-gray-200 shadow-sm">
                <div class="flex items-center justify-between px-4 sm:px-6 h-16">
                    <div class="flex items-center gap-4">
                        <button @click="sidebarOpen=true" class="lg:hidden text-gray-500 hover:text-gray-700 p-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-base font-semibold text-gray-900">@yield('title', 'Dashboard')</h1>
                            <p class="text-xs text-gray-500 hidden sm:block">@yield('breadcrumb', 'RS Code Admin Panel')</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/" target="_blank"
                           class="hidden sm:flex items-center gap-1.5 text-xs text-indigo-600 hover:text-indigo-800 font-medium transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Saytı gör
                        </a>
                        <a href="{{ route('admin.profile') }}" title="Profil"
                           class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white text-xs font-bold hover:bg-indigo-700 transition-colors">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
                        </a>
                    </div>
                </div>
            </header>

            {{-- Page content --}}
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                @if(session('success'))
                <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    {{ session('error') }}
                </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    </script>
    @stack('scripts')
</body>
</html>
