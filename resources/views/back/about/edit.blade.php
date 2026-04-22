@extends('back.layouts.master')
@section('title', 'Haqqımızda')

@section('content')
<div x-data="{ lang: 'az' }">

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="/admin/about" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Haqqımızda</h1>
            <p class="text-xs text-gray-400 mt-0.5">Şirkət haqqında mətnləri redaktə edin</p>
        </div>
    </div>
    <button id="submitBtn" type="button" onclick="submitAbout()" class="btn-primary shadow-lg shadow-indigo-100">
        <i class="fa fa-floppy-disk"></i> Yadda Saxla
    </button>
</div>

<div class="max-w-4xl">
    <div class="form-card">

        {{-- Dil tabları --}}
        <div class="flex border-b border-gray-100">
            @foreach([['az','AZ','indigo'],['en','EN','blue'],['ru','RU','rose']] as [$l,$lbl,$c])
            <button type="button" @click="lang='{{ $l }}'"
                :class="lang==='{{ $l }}' ? 'text-{{ $c }}-600 border-b-2 border-{{ $c }}-500 bg-{{ $c }}-50/40' : 'text-gray-400 hover:text-gray-600'"
                class="flex-1 py-3.5 text-sm font-semibold transition-all flex items-center justify-center gap-2 relative">
                <span class="w-5 h-5 rounded text-[10px] font-bold flex items-center justify-center"
                      :class="lang==='{{ $l }}' ? 'bg-{{ $c }}-100 text-{{ $c }}-700' : 'bg-gray-100 text-gray-500'">{{ $lbl }}</span>
                @if($l==='az') Azərbaycanca @elseif($l==='en') English @else Русский @endif
                <span id="badge-{{ $l }}" class="hidden absolute top-1.5 right-2 w-4 h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center"></span>
            </button>
            @endforeach
        </div>

        {{-- Məzmun --}}
        <div class="p-6">
            @foreach(['az' => ['Haqqımızda mətn', $about->about_az ?? ''],
                      'en' => ['About text', $about->about_en ?? ''],
                      'ru' => ['О нас текст', $about->about_ru ?? '']] as $l => [$label, $val])
            <div x-show="lang==='{{ $l }}'">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $label }} *</label>
                <textarea name="about_{{ $l }}" id="about_{{ $l }}" rows="16"
                          class="admin-input resize-none">{{ $val }}</textarea>
                <p id="err-about_{{ $l }}" class="hidden mt-2 text-xs text-red-500 flex items-center gap-1"></p>
            </div>
            @endforeach
        </div>

    </div>
</div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@38.1.0/build/ckeditor.js"></script>
<script>
const _editors = {};
const _langFields = {
    az: ['about_az'],
    en: ['about_en'],
    ru: ['about_ru'],
};

document.addEventListener('DOMContentLoaded', () => {
    ['about_az', 'about_en', 'about_ru'].forEach(id => {
        const el = document.getElementById(id);
        if (el) ClassicEditor.create(el).then(e => { _editors[id] = e; }).catch(console.error);
    });
});

function clearErrors() {
    document.querySelectorAll('[id^="err-"]').forEach(el => { el.classList.add('hidden'); el.innerHTML = ''; });
    Object.keys(_langFields).forEach(l => {
        const b = document.getElementById('badge-' + l);
        b.classList.add('hidden'); b.textContent = '';
    });
}

function showErrors(errors) {
    Object.entries(errors).forEach(([field, msgs]) => {
        const msg = Array.isArray(msgs) ? msgs[0] : msgs;
        const err = document.getElementById('err-' + field);
        if (err) { err.innerHTML = '<i class="fa fa-circle-exclamation mr-1"></i>' + msg; err.classList.remove('hidden'); }
    });
    let firstLang = null;
    Object.entries(_langFields).forEach(([l, fields]) => {
        const count = fields.filter(f => errors[f]).length;
        const b = document.getElementById('badge-' + l);
        if (count > 0) { b.textContent = count; b.classList.remove('hidden'); if (!firstLang) firstLang = l; }
    });
    if (firstLang) {
        const root = document.querySelector('[x-data]');
        if (root && root._x_dataStack) root._x_dataStack[0].lang = firstLang;
    }
}

function submitAbout() {
    Object.entries(_editors).forEach(([id, editor]) => {
        document.getElementById(id).value = editor.getData();
    });
    clearErrors();

    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saxlanır...';

    const fd = new FormData();
    fd.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    fd.append('about_az', document.getElementById('about_az').value);
    fd.append('about_en', document.getElementById('about_en').value);
    fd.append('about_ru', document.getElementById('about_ru').value);

    $.ajax({
        type: 'POST',
        url: '/admin/about/edit',
        data: fd,
        processData: false,
        contentType: false,
        success: function (r) {
            toastr.success(r.message);
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-floppy-disk"></i> Yadda Saxla';
        },
        error: function (xhr) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-floppy-disk"></i> Yadda Saxla';
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                showErrors(xhr.responseJSON.errors);
                toastr.error('Zəhmət olmasa xətaları düzəldin');
            } else {
                toastr.error('Xəta baş verdi');
            }
        }
    });
}
</script>
@endpush
