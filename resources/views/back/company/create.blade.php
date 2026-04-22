@extends('back.layouts.master')
@section('title', 'Şirkət Əlavə Et')

@section('content')
@php
$errAz = collect(['about_az'])->filter(fn($f)=>$errors->has($f))->count();
$errEn = collect(['about_en'])->filter(fn($f)=>$errors->has($f))->count();
$errRu = collect(['about_ru'])->filter(fn($f)=>$errors->has($f))->count();
$initLang = $errAz ? 'az' : ($errEn ? 'en' : ($errRu ? 'ru' : 'az'));
@endphp
<div x-data="{ lang: '{{ $initLang }}' }">

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="{{ route('company.index') }}" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Yeni Şirkət</h1>
            <p class="text-xs text-gray-400 mt-0.5">Şirkət məlumatlarını daxil edin</p>
        </div>
    </div>
    <button form="cmpForm" type="submit" class="btn-primary shadow-lg shadow-indigo-100">
        <i class="fa fa-check"></i> Əlavə Et
    </button>
</div>

@if($errors->any())
<div class="mb-5 flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
    <i class="fa fa-circle-exclamation mt-0.5 shrink-0"></i>
    <ul class="list-disc list-inside space-y-0.5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif

<form id="cmpForm" action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-5">
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-building text-gray-300"></i> Əsas məlumat</div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="admin-label">Qrup *</label>
                    <select name="group_id" class="admin-select @error('group_id') border-red-400 @enderror">
                        <option value="">Qrup seçin</option>
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ old('group_id')==$group->id ? 'selected' : '' }}>{{ $group->name_az }}</option>
                        @endforeach
                    </select>
                    @error('group_id')<p class="mt-1 text-xs text-red-500"><i class="fa fa-circle-exclamation mr-1"></i>{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="admin-label">Şirkət adı *</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="admin-input @error('name') border-red-400 @enderror" placeholder="Şirkətin adı">
                    @error('name')<p class="mt-1 text-xs text-red-500"><i class="fa fa-circle-exclamation mr-1"></i>{{ $message }}</p>@enderror
                </div>
                <div class="col-span-2">
                    <label class="admin-label">ALT mətn</label>
                    <input type="text" name="alt" value="{{ old('alt') }}" class="admin-input" placeholder="Şəkil alt mətni">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="flex border-b border-gray-100">
                @foreach([['az','AZ','indigo',$errAz],['en','EN','blue',$errEn],['ru','RU','rose',$errRu]] as [$l,$lbl,$c,$ec])
                <button type="button" @click="lang='{{ $l }}'"
                    :class="lang==='{{ $l }}' ? 'text-{{ $c }}-600 border-b-2 border-{{ $c }}-500 bg-{{ $c }}-50/40' : 'text-gray-400 hover:text-gray-600'"
                    class="flex-1 py-3.5 text-sm font-semibold transition-all flex items-center justify-center gap-2 relative">
                    <span class="w-5 h-5 rounded text-[10px] font-bold flex items-center justify-center"
                          :class="lang==='{{ $l }}' ? 'bg-{{ $c }}-100 text-{{ $c }}-700' : 'bg-gray-100 text-gray-500'">{{ $lbl }}</span>
                    @if($l==='az') Haqqında (AZ) @elseif($l==='en') About (EN) @else О нас (RU) @endif
                    @if($ec > 0)<span class="absolute top-1.5 right-2 w-4 h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center">{{ $ec }}</span>@endif
                </button>
                @endforeach
            </div>
            <div class="p-6">
                @foreach(['az'=>'Şirkət haqqında (AZ)','en'=>'About company (EN)','ru'=>'О компании (RU)'] as $l=>$ph)
                <div x-show="lang==='{{ $l }}'">
                    <textarea name="about_{{ $l }}" id="about_{{ $l }}" rows="8"
                              class="admin-input resize-none @error('about_'.$l) border-red-400 @enderror"
                              placeholder="{{ $ph }}">{{ old('about_'.$l) }}</textarea>
                    @error('about_'.$l)<p class="mt-1 text-xs text-red-500"><i class="fa fa-circle-exclamation mr-1"></i>{{ $message }}</p>@enderror
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-image text-gray-300"></i> Loqo</div>
            <label class="upload-zone h-40 group">
                <input type="file" name="src" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer"
                       onchange="previewImg(this,'logoPrev','logoPh')">
                <div id="logoPh" class="flex flex-col items-center gap-2 text-gray-400 group-hover:text-indigo-500 transition-colors p-5">
                    <i class="fa fa-cloud-arrow-up text-3xl"></i>
                    <span class="text-sm font-semibold">Loqo yüklə</span>
                    <span class="text-xs text-gray-300">PNG, SVG, JPG</span>
                </div>
                <img id="logoPrev" src="#" class="hidden absolute inset-0 w-full h-full object-contain p-3">
            </label>
        </div>
    </div>
</div>
</form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@38.1.0/build/ckeditor.js"></script>
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
['about_az','about_en','about_ru'].forEach(id => {
    if (document.getElementById(id)) ClassicEditor.create(document.getElementById(id)).catch(console.error);
});
</script>
@endpush
