@extends('back.layouts.master')
@section('title', 'Xidmət Düzəliş')

@section('content')
@php
$errAz = collect(['name_az'])->filter(fn($f)=>$errors->has($f))->count();
$errEn = collect(['name_en'])->filter(fn($f)=>$errors->has($f))->count();
$errRu = collect(['name_ru'])->filter(fn($f)=>$errors->has($f))->count();
$initLang = $errAz ? 'az' : ($errEn ? 'en' : ($errRu ? 'ru' : 'az'));
@endphp
<div x-data="{ lang: '{{ $initLang }}' }">

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="{{ route('services.index') }}" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Xidmət Düzəliş</h1>
            <p class="text-xs text-gray-400 mt-0.5">{{ $service->name_az }}</p>
        </div>
    </div>
    <button form="srvForm" type="submit" class="btn-primary shadow-lg shadow-indigo-100">
        <i class="fa fa-floppy-disk"></i> Yadda Saxla
    </button>
</div>

@if($errors->any())
<div class="mb-5 flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
    <i class="fa fa-circle-exclamation mt-0.5 shrink-0"></i>
    <ul class="list-disc list-inside space-y-0.5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif

<form id="srvForm" action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-5">
        <div class="form-card">
            <div class="flex border-b border-gray-100">
                @foreach([['az','AZ','indigo',$errAz],['en','EN','blue',$errEn],['ru','RU','rose',$errRu]] as [$l,$lbl,$c,$ec])
                <button type="button" @click="lang='{{ $l }}'"
                    :class="lang==='{{ $l }}' ? 'text-{{ $c }}-600 border-b-2 border-{{ $c }}-500 bg-{{ $c }}-50/40' : 'text-gray-400 hover:text-gray-600'"
                    class="flex-1 py-3.5 text-sm font-semibold transition-all flex items-center justify-center gap-2 relative">
                    <span class="w-5 h-5 rounded text-[10px] font-bold flex items-center justify-center"
                          :class="lang==='{{ $l }}' ? 'bg-{{ $c }}-100 text-{{ $c }}-700' : 'bg-gray-100 text-gray-500'">{{ $lbl }}</span>
                    @if($l==='az') Azərbaycanca @elseif($l==='en') English @else Русский @endif
                    @if($ec > 0)<span class="absolute top-1.5 right-2 w-4 h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center">{{ $ec }}</span>@endif
                </button>
                @endforeach
            </div>
            <div class="p-6">
                @foreach(['az'=>['Xidmətin adı','AZ',$service->name_az],'en'=>['Service name','EN',$service->name_en],'ru'=>['Название услуги','RU',$service->name_ru]] as $l=>[$ph,$lbl,$val])
                <div x-show="lang==='{{ $l }}'">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Ad *</label>
                    <input type="text" name="name_{{ $l }}" value="{{ old('name_'.$l, $val) }}"
                           class="admin-input text-base @error('name_'.$l) border-red-400 ring-2 ring-red-100 @enderror"
                           placeholder="{{ $ph }} ({{ $lbl }})">
                    @error('name_'.$l)<p class="mt-1.5 text-xs text-red-500 flex items-center gap-1"><i class="fa fa-circle-exclamation"></i>{{ $message }}</p>@enderror
                </div>
                @endforeach
            </div>
        </div>

        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-tag text-gray-300"></i> SEO</div>
            <label class="admin-label">ALT mətn</label>
            <input type="text" name="alt" value="{{ old('alt', $service->alt) }}" class="admin-input" placeholder="Şəkil üçün alt mətn">
        </div>
    </div>

    <div class="space-y-5">
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-image text-gray-300"></i> İkon / Şəkil</div>
            @if($service->src)
            <div class="mb-3 rounded-xl overflow-hidden bg-gray-50 border border-gray-100 p-3 flex items-center justify-center h-28">
                <img src="{{ asset('files/services/'.$service->src) }}" class="max-h-full w-auto object-contain" alt="">
            </div>
            @endif
            <label class="upload-zone h-32 group">
                <input type="file" name="src" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer"
                       onchange="previewImg(this,'covPrev','covPh')">
                <div id="covPh" class="flex flex-col items-center gap-2 text-gray-400 group-hover:text-indigo-500 transition-colors p-4">
                    <i class="fa fa-arrow-up-from-bracket text-2xl"></i>
                    <span class="text-xs font-semibold">{{ $service->src ? 'Yeni şəkil seç' : 'Şəkil seç' }}</span>
                </div>
                <img id="covPrev" src="#" class="hidden absolute inset-0 w-full h-full object-contain p-2">
            </label>
        </div>

        <div class="form-card form-card-body bg-gradient-to-br from-slate-50 to-gray-50">
            <div class="form-section-title"><i class="fa fa-clock text-gray-300"></i> Məlumat</div>
            <div class="space-y-2 text-xs text-gray-500">
                <div class="flex justify-between"><span>ID</span><span class="font-mono font-semibold text-gray-700">#{{ $service->id }}</span></div>
                <div class="flex justify-between"><span>Slug (AZ)</span><span class="font-mono text-gray-700 truncate ml-2">{{ $service->slug_az }}</span></div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
@endsection

@push('scripts')
<script>
function previewImg(input, prevId, phId) {
    if (!input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        const img = document.getElementById(prevId);
        img.src = e.target.result;
        img.classList.remove('hidden');
        document.getElementById(phId).classList.add('hidden');
    };
    reader.readAsDataURL(input.files[0]);
}
</script>
@endpush
