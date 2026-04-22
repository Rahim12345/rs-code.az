@extends('back.layouts.master')
@section('title', 'Haqqımızda')
@section('breadcrumb', 'Admin / Haqqımızda')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-gray-900">Haqqımızda</h2>
    <a href="/admin/about/edit" class="btn-primary inline-flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
        Redaktə et
    </a>
</div>

@if($about)
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    @foreach(['az'=>['Azərbaycanca','indigo'],'en'=>['English','blue'],'ru'=>['Русский','red']] as $lang=>[$label,$color])
    <div class="admin-card p-6">
        <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
            <span class="w-6 h-6 bg-{{ $color }}-100 text-{{ $color }}-700 rounded text-xs font-bold flex items-center justify-center">{{ strtoupper($lang) }}</span>
            {{ $label }}
        </h3>
        <div class="text-sm text-gray-600 leading-relaxed line-clamp-6">
            {!! $about->{'about_'.$lang} ?? '<span class="text-gray-400 italic">Məlumat yoxdur</span>' !!}
        </div>
    </div>
    @endforeach
</div>
@else
<div class="admin-card p-12 text-center">
    <p class="text-gray-500 mb-4">Haqqımızda məlumat tapılmadı</p>
    <a href="/admin/about/edit" class="btn-primary">Əlavə et</a>
</div>
@endif

@endsection
