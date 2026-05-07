@extends('back.layouts.master')
@section('title', 'Sistem Ayarları')
@section('breadcrumb', 'Sistem · Parametrlər')

@push('styles')
<style>[x-cloak]{display:none!important}</style>
@endpush

@section('content')

@php
    $knownModels = ['gpt-4o-mini','gpt-4o','gpt-4-turbo','gpt-3.5-turbo'];
    $isCustomModel = $settings['openai_is_custom_model'];
    $activeTab = request('tab', 'info');
@endphp

<div class="max-w-3xl"
     x-data="{
         tab: '{{ $activeTab }}',
         customModel: {{ $isCustomModel ? 'true' : 'false' }},
         showKey: false
     }">

    {{-- ── Tab navigation ─────────────────────────────────────────────────── --}}
    <div class="flex gap-1 bg-gray-100 rounded-xl p-1 mb-6">
        @foreach([
            ['info',        'fa-microchip',  'Sistem'],
            ['ai',          'fa-robot',      'AI & OpenAI'],
            ['institution', 'fa-building',   'Müəssisə'],
        ] as [$key, $icon, $label])
        <button @click="tab='{{ $key }}'"
                :class="tab==='{{ $key }}' ? 'bg-white shadow-sm text-gray-900 font-semibold' : 'text-gray-500 hover:text-gray-700'"
                class="flex-1 flex items-center justify-center gap-1.5 rounded-lg py-2.5 text-sm font-medium transition-all">
            <i class="fa {{ $icon }} text-xs opacity-80"></i>
            <span>{{ $label }}</span>
        </button>
        @endforeach
    </div>

    {{-- ══════════════════════════════════════════════════════════════════════
         TAB 1 — Sistem Məlumatları
         ══════════════════════════════════════════════════════════════════════ --}}
    <div x-show="tab==='info'" x-cloak class="space-y-6">

        {{-- System parameters --}}
        <div class="bg-white rounded-xl border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-sm font-semibold text-gray-900">Sistem Məlumatları</h2>
            </div>
            <dl class="divide-y divide-gray-100">

                <div class="flex items-center justify-between px-6 py-3.5 text-sm">
                    <dt class="text-gray-500 flex items-center gap-2.5">
                        <i class="fa fa-code w-4 text-center text-gray-300"></i>PHP
                    </dt>
                    <dd class="flex items-center gap-2">
                        <span class="font-mono font-semibold text-gray-800">{{ $phpVersion }}</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">Server tərəf</span>
                    </dd>
                </div>

                <div class="flex items-center justify-between px-6 py-3.5 text-sm">
                    <dt class="text-gray-500 flex items-center gap-2.5">
                        <i class="fa fa-layer-group w-4 text-center text-gray-300"></i>Laravel
                    </dt>
                    <dd class="flex items-center gap-2">
                        <span class="font-mono font-semibold text-gray-800">{{ $laravelVersion }}</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">Framework</span>
                    </dd>
                </div>

                <div class="flex items-center justify-between px-6 py-3.5 text-sm">
                    <dt class="text-gray-500 flex items-center gap-2.5">
                        <i class="fa fa-database w-4 text-center text-gray-300"></i>Verilənlər bazası
                    </dt>
                    <dd class="flex items-center gap-2">
                        @if($dbStatus)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Qoşulub</span>
                            <span class="font-mono text-gray-500 text-xs">{{ $dbDriver }} · {{ $dbName }}</span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-600">Xəta</span>
                        @endif
                    </dd>
                </div>

                <div class="flex items-center justify-between px-6 py-3.5 text-sm">
                    <dt class="text-gray-500 flex items-center gap-2.5">
                        <i class="fa fa-bolt w-4 text-center text-gray-300"></i>Keş
                    </dt>
                    <dd class="flex items-center gap-2">
                        <span class="font-mono font-semibold text-gray-800">{{ $cacheDriver }}</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">Cache driver</span>
                    </dd>
                </div>

                <div class="flex items-center justify-between px-6 py-3.5 text-sm">
                    <dt class="text-gray-500 flex items-center gap-2.5">
                        <i class="fa fa-tag w-4 text-center text-gray-300"></i>Mühit
                    </dt>
                    <dd class="flex items-center gap-2">
                        <span class="font-mono font-semibold {{ $appEnv === 'production' ? 'text-green-700' : 'text-amber-600' }}">{{ $appEnv }}</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">APP_ENV</span>
                    </dd>
                </div>

            </dl>
        </div>

        {{-- Maintenance mode --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6"
             x-data="{ down: {{ $isDown ? 'true' : 'false' }}, loading: false }">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-semibold text-gray-900">Texniki Xidmət Rejimi</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Sayt müvəqqəti olaraq texniki xidmətə keçirilir</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold transition-colors"
                          :class="down ? 'text-red-600' : 'text-green-600'"
                          x-text="down ? 'Rejim aktiv' : 'Normal'"></span>
                    <button @click.prevent="
                        if (!confirm(down ? 'Saytı bərpa etmək istəyirsiniz?' : 'Saytı texniki xidmət rejiminə keçirmək istəyirsiniz?')) return;
                        loading = true;
                        fetch('/admin/settings/maintenance', {
                            method: 'POST',
                            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Content-Type': 'application/json'}
                        }).then(r => r.json()).then(d => {
                            if (d.ok) { down = d.status === 'down'; toastr.success(d.message); }
                            else { toastr.error(d.message); }
                        }).catch(() => toastr.error('Şəbəkə xətası')).finally(() => loading = false)"
                        :disabled="loading"
                        :class="down ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700'"
                        class="px-4 py-2 rounded-lg text-white text-sm font-semibold transition-colors disabled:opacity-50 inline-flex items-center gap-2">
                        <i x-show="loading" class="fa fa-spinner fa-spin"></i>
                        <span x-text="down ? 'Bərpa et' : 'Rejimi aktivləşdir'"></span>
                    </button>
                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════════════════════════════
         TAB 2 — AI & OpenAI
         ══════════════════════════════════════════════════════════════════════ --}}
    <div x-show="tab==='ai'" x-cloak>
        <div class="bg-white rounded-xl border border-gray-200">

            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-semibold text-gray-900">AI & OpenAI</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Blog yazıları yazmaq üçün OpenAI inteqrasiyası</p>
                </div>
                @if($settings['openai_api_key'])
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>Aktiv
                </span>
                @else
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-400">
                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>Qeyri-aktiv
                </span>
                @endif
            </div>

            <form action="/admin/settings/ai" method="POST" class="p-6 space-y-6">
                @csrf

                {{-- API Key --}}
                <div>
                    <label class="admin-label">
                        API Açarı
                        <a href="https://platform.openai.com/api-keys" target="_blank"
                           class="text-indigo-500 hover:underline text-xs ml-1.5 font-normal">
                            platform.openai.com → API keys
                        </a>
                    </label>
                    <div class="relative">
                        <input :type="showKey ? 'text' : 'password'"
                               name="openai_api_key"
                               value="{{ $settings['openai_api_key'] ? str_repeat('•', 40) : '' }}"
                               placeholder="{{ $settings['openai_api_key'] ? '' : 'sk-proj-...' }}"
                               @focus="if ($el.value.startsWith('•')) $el.value = ''"
                               id="api-key-input"
                               class="admin-input pr-10 font-mono">
                        <button type="button" @click="showKey = !showKey"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                            <i :class="showKey ? 'fa-eye-slash' : 'fa-eye'" class="fa text-sm"></i>
                        </button>
                    </div>
                    <p class="text-xs text-gray-400 mt-1.5">Boş buraxsanız mövcud açar saxlanılır</p>
                </div>

                {{-- Account check --}}
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between gap-4 border border-gray-100">
                    <div>
                        <p class="text-sm font-semibold text-gray-700">OpenAI Hesabı</p>
                        <p class="text-xs text-gray-400 mt-0.5">Açarın aid olduğu hesab — balans üçün dashboard-a keçin</p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <a href="https://platform.openai.com/usage" target="_blank"
                           class="btn-outline btn-sm whitespace-nowrap">
                            Balans & İstifadə <i class="fa fa-external-link-alt text-xs ml-1"></i>
                        </a>
                        <button type="button" id="test-openai-btn"
                                onclick="testOpenaiKey()"
                                class="btn-primary btn-sm whitespace-nowrap">
                            Hesabı yoxla
                        </button>
                    </div>
                </div>

                {{-- Model selection --}}
                <div>
                    <label class="admin-label mb-3">Model <span class="text-gray-400 font-normal">— Hansı GPT modeli istifadə edilsin</span></label>

                    <div class="grid grid-cols-2 gap-3 mb-3">
                        @foreach([
                            ['gpt-4o-mini',  'gpt-4o-mini',  'Sürətli · Ekonomik',    'bg-green-50 border-green-200 text-green-700',   'Tövsiyə edilir'],
                            ['gpt-4o',       'gpt-4o',       'Ən yüksək keyfiyyət',    'bg-indigo-50 border-indigo-200 text-indigo-700', 'Güclü'],
                            ['gpt-4-turbo',  'gpt-4-turbo',  'Turbo · Böyük kontekst', 'bg-violet-50 border-violet-200 text-violet-700', 'Sürətli'],
                            ['gpt-3.5-turbo','gpt-3.5-turbo','Köhnə · Minimal xərc',  'bg-gray-50 border-gray-200 text-gray-500',      'Legacy'],
                        ] as [$val, $name, $desc, $badgeCls, $badge])
                        @php $checked = $settings['openai_model'] === $val && !$isCustomModel; @endphp
                        <label class="relative flex flex-col gap-1.5 border-2 rounded-xl p-4 cursor-pointer transition-all select-none
                            {{ $checked ? 'border-indigo-500 bg-indigo-50/30 shadow-sm' : 'border-gray-200 hover:border-gray-300' }}"
                            :class="customModel ? 'opacity-70' : ''">
                            <input type="radio" name="openai_model" value="{{ $val }}"
                                   {{ $checked ? 'checked' : '' }}
                                   @change="customModel = false"
                                   class="absolute top-3 right-3 accent-indigo-600 w-4 h-4">
                            <span class="font-mono font-bold text-sm text-gray-800 pr-5">{{ $name }}</span>
                            <span class="text-xs text-gray-500">{{ $desc }}</span>
                            <span class="mt-0.5 text-xs font-semibold px-2 py-0.5 rounded-full border {{ $badgeCls }} w-fit">{{ $badge }}</span>
                        </label>
                        @endforeach
                    </div>

                    {{-- Custom model --}}
                    @php $customChecked = $isCustomModel; @endphp
                    <label class="flex items-start gap-3 border-2 rounded-xl p-4 cursor-pointer transition-all select-none
                        {{ $customChecked ? 'border-indigo-500 bg-indigo-50/30 shadow-sm' : 'border-gray-200 hover:border-gray-300' }}">
                        <input type="radio" name="openai_model" value="_custom"
                               {{ $customChecked ? 'checked' : '' }}
                               @change="customModel = true"
                               class="mt-1 accent-indigo-600 w-4 h-4 shrink-0">
                        <div class="flex-1">
                            <p class="font-semibold text-sm text-gray-800">Xüsusi model</p>
                            <p class="text-xs text-gray-500 mb-2">Yuxarıdakı siyahıda olmayan model adını daxil edin</p>
                            <input type="text" name="openai_model_custom"
                                   :disabled="!customModel"
                                   value="{{ $isCustomModel ? $settings['openai_model'] : '' }}"
                                   placeholder="ft:gpt-4..."
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-indigo-400 disabled:bg-gray-100 disabled:text-gray-400 transition-colors">
                        </div>
                    </label>
                </div>

                {{-- Question language --}}
                <div>
                    <label class="admin-label">Sual dili</label>
                    <p class="text-xs text-gray-400 mb-2">GPT-yə göndərilən dil ipucu</p>
                    <select name="openai_question_language" class="admin-select w-auto min-w-48">
                        <option value="az" {{ $settings['openai_question_language'] === 'az' ? 'selected' : '' }}>🇦🇿 Azərbaycan dili (az)</option>
                        <option value="ru" {{ $settings['openai_question_language'] === 'ru' ? 'selected' : '' }}>🇷🇺 Rus dili (ru)</option>
                        <option value="en" {{ $settings['openai_question_language'] === 'en' ? 'selected' : '' }}>🇬🇧 İngilis dili (en)</option>
                    </select>
                </div>

                <div class="flex justify-end pt-2 border-t border-gray-100">
                    <button type="submit" class="btn-primary">
                        <i class="fa fa-save"></i>
                        Yadda saxla
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════════
         TAB 3 — Müəssisə
         ══════════════════════════════════════════════════════════════════════ --}}
    <div x-show="tab==='institution'" x-cloak>
        <div class="bg-white rounded-xl border border-gray-200">

            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-sm font-semibold text-gray-900">Müəssisə</h2>
                <p class="text-xs text-gray-400 mt-0.5">Rəsmi sənədlər və çap formalarında görünür</p>
            </div>

            <form action="/admin/settings/institution" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf

                {{-- Short name --}}
                <div>
                    <label class="admin-label">Sistem adı</label>
                    <p class="text-xs text-gray-400 mb-2">Nav bar-da və sənədlərdə görünən qısa ad (məs: IEMS, ADPU-IEMS)</p>
                    <input type="text" name="institution_short_name"
                           value="{{ old('institution_short_name', $settings['institution_short_name']) }}"
                           placeholder="ADPK"
                           class="admin-input font-mono font-semibold max-w-xs">
                    @error('institution_short_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Full name --}}
                <div>
                    <label class="admin-label">Müəssisənin adı</label>
                    <p class="text-xs text-gray-400 mb-2">Sənəd başlığında göstəriləcək tam ad</p>
                    <input type="text" name="institution_full_name"
                           value="{{ old('institution_full_name', $settings['institution_full_name']) }}"
                           placeholder="Azərbaycan Dövlət Pedaqoji Kolleci"
                           class="admin-input">
                    @error('institution_full_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Logo --}}
                <div>
                    <label class="admin-label">Logo</label>
                    <p class="text-xs text-gray-400 mb-3">PNG, JPG, SVG, WEBP — maks 2 MB</p>

                    <div class="flex items-start gap-5">
                        {{-- Current logo --}}
                        <div class="shrink-0">
                            @if($settings['institution_logo'])
                            <div class="w-24 h-24 rounded-xl border-2 border-gray-200 bg-white flex items-center justify-center overflow-hidden shadow-sm">
                                <img src="{{ asset('img/logos/' . $settings['institution_logo']) }}"
                                     alt="Logo"
                                     id="logo-current"
                                     class="max-w-full max-h-full object-contain p-2">
                            </div>
                            @else
                            <div class="w-24 h-24 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 flex items-center justify-center" id="logo-placeholder">
                                <i class="fa fa-image text-2xl text-gray-300"></i>
                            </div>
                            @endif
                            <img id="logo-preview" class="hidden w-24 h-24 rounded-xl border-2 border-indigo-300 object-contain bg-white p-2 shadow-sm mt-0">
                        </div>

                        <div>
                            <input type="file" name="logo" id="logo-input"
                                   accept=".png,.jpg,.jpeg,.svg,.webp"
                                   class="hidden"
                                   onchange="handleLogoChange(this)">
                            <label for="logo-input" class="btn-outline cursor-pointer">
                                <i class="fa fa-upload text-xs"></i>
                                Fayl seç
                            </label>
                            <p id="logo-filename" class="mt-2 text-xs text-gray-400">
                                {{ $settings['institution_logo'] ?? 'Fayl seçilməyib' }}
                            </p>
                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Preview card --}}
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Önizləmə</p>
                    <div class="flex items-center gap-4">
                        @if($settings['institution_logo'])
                        <img src="{{ asset('img/logos/' . $settings['institution_logo']) }}"
                             alt="Logo" class="h-12 w-auto max-w-16 object-contain"
                             onerror="this.style.display='none'">
                        @else
                        <div class="h-12 w-12 rounded-lg bg-indigo-100 flex items-center justify-center shrink-0">
                            <span class="text-indigo-600 font-bold text-sm">
                                {{ strtoupper(substr($settings['institution_short_name'], 0, 2)) }}
                            </span>
                        </div>
                        @endif
                        <div>
                            <p class="font-bold text-gray-900 text-sm">{{ $settings['institution_short_name'] }}</p>
                            <p class="text-xs text-gray-500">{{ $settings['institution_full_name'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-2 border-t border-gray-100">
                    <button type="submit" class="btn-primary">
                        <i class="fa fa-save"></i>
                        Yadda saxla
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@push('scripts')
<script>
function handleLogoChange(input) {
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];
    document.getElementById('logo-filename').textContent = file.name;

    const reader = new FileReader();
    reader.onload = e => {
        const preview = document.getElementById('logo-preview');
        const current = document.getElementById('logo-current');
        const placeholder = document.getElementById('logo-placeholder');

        preview.src = e.target.result;
        preview.classList.remove('hidden');
        if (current) current.classList.add('hidden');
        if (placeholder) placeholder.classList.add('hidden');
    };
    reader.readAsDataURL(file);
}

function testOpenaiKey() {
    const btn = document.getElementById('test-openai-btn');
    const keyInput = document.getElementById('api-key-input');
    const keyVal = keyInput ? keyInput.value : '';
    const isMasked = /^[•·]+$/.test(keyVal);

    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Yoxlanır...';

    fetch('/admin/settings/test-openai', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(isMasked || !keyVal ? {} : { api_key: keyVal })
    })
    .then(r => r.json())
    .then(d => {
        d.ok ? toastr.success(d.message) : toastr.error(d.message);
    })
    .catch(() => toastr.error('Şəbəkə xətası'))
    .finally(() => {
        btn.disabled = false;
        btn.innerHTML = 'Hesabı yoxla';
    });
}
</script>
@endpush

@endsection
