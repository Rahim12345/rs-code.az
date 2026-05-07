@extends('back.layouts.master')
@section('title', 'Blog Düzəliş')

@section('content')
<div x-data="{ lang: 'az' }">

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="/admin/blogs" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Blog Düzəliş</h1>
            <p class="text-xs text-gray-400 mt-0.5">{{ $blog->title_az }}</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <a href="/admin/blogs" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
            Ləğv et
        </a>
        <button id="aiBlogBtn" type="button" onclick="generateWithAI()"
                class="btn-outline shadow-sm">
            <i class="fa fa-wand-magic-sparkles"></i> AI ilə yenilə
        </button>
        <button id="submitBtn" type="button" onclick="submitBlog()" class="btn-primary shadow-lg shadow-indigo-100">
            <i class="fa fa-floppy-disk"></i> Yadda Saxla
        </button>
    </div>
</div>

<form id="blogForm" action="/admin/edit-blog/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="ai_photo"    id="ai_photo_az">
<input type="hidden" name="ai_photo_en" id="ai_photo_en">
<input type="hidden" name="ai_photo_ru" id="ai_photo_ru">
<div class="grid grid-cols-1 gap-6">

    <div class="space-y-5">

        {{-- Dil tabları --}}
        <div class="form-card">
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

            <div class="p-6 space-y-4">
                @foreach([
                    'az' => ['Başlıq','Slug','Qısa xülasə','Mətn','Tarix','Meta Başlıq','Meta Açıqlama','Meta Açar Sözlər', $blog->title_az, $blog->slug_az, $blog->review_az, $blog->text_az, $blog->date_az, $blog->meta_title_az ?? '', $blog->meta_description_az ?? '', $blog->meta_keywords_az ?? ''],
                    'en' => ['Title','Slug','Short review','Content','Date','Meta Title','Meta Description','Meta Keywords', $blog->title_en, $blog->slug_en, $blog->review_en, $blog->text_en, $blog->date_en, $blog->meta_title_en ?? '', $blog->meta_description_en ?? '', $blog->meta_keywords_en ?? ''],
                    'ru' => ['Заголовок','Slug','Краткое описание','Содержание','Дата','Meta Заголовок','Meta Описание','Meta Ключевые слова', $blog->title_ru, $blog->slug_ru, $blog->review_ru, $blog->text_ru, $blog->date_ru, $blog->meta_title_ru ?? '', $blog->meta_description_ru ?? '', $blog->meta_keywords_ru ?? ''],
                ] as $l => [$tLabel,$sLabel,$rLabel,$txLabel,$dLabel,$mtLabel,$mdLabel,$mkLabel,$tVal,$sVal,$rVal,$txVal,$dVal,$mtVal,$mdVal,$mkVal])
                <div x-show="lang==='{{ $l }}'" class="space-y-4">

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $tLabel }} *</label>
                        <input type="text" name="title_{{ $l }}" id="title_{{ $l }}"
                               value="{{ $tVal }}" class="admin-input"
                               oninput="syncSlug('{{ $l }}')">
                        <p id="err-title_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center justify-between">
                            <span>{{ $sLabel }} *</span>
                            <button type="button" id="lock-btn-{{ $l }}" onclick="toggleLock('{{ $l }}')"
                                    class="flex items-center gap-1 text-[10px] font-semibold text-amber-500 hover:text-amber-700 transition-colors">
                                <i id="lock-icon-{{ $l }}" class="fa fa-lock"></i>
                                <span id="lock-txt-{{ $l }}">Əllə</span>
                            </button>
                        </label>
                        <input type="text" name="slug_{{ $l }}" id="slug_{{ $l }}"
                               value="{{ $sVal }}" class="admin-input font-mono">
                        <p id="err-slug_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $rLabel }} *</label>
                        <textarea name="review_{{ $l }}" id="review_{{ $l }}" rows="2"
                                  class="admin-input resize-none">{{ $rVal }}</textarea>
                        <p id="err-review_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $txLabel }} *</label>
                        <textarea name="text_{{ $l }}" id="text_{{ $l }}" rows="10"
                                  class="admin-input resize-none">{{ $txVal }}</textarea>
                        <p id="err-text_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $dLabel }} *</label>
                        <input type="text" name="date_{{ $l }}" id="date_{{ $l }}"
                               value="{{ $dVal }}" class="admin-input">
                        <p id="err-date_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    {{-- Cover --}}
                    @php
                        $photoField = $l === 'az' ? 'photo' : 'photo_'.$l;
                        $existingPhoto = $l === 'az' ? $blog->photo : ($blog->{'photo_'.$l} ?? null);
                        $existingPhotoSrc = $existingPhoto ? asset('images/blog/'.$existingPhoto) : null;
                    @endphp
                    <div class="border-t border-gray-100 pt-4">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                            <i class="fa fa-image mr-1 text-gray-300"></i> Kapak şəkli{{ $l === 'az' ? '' : '' }}
                        </label>
                        @if($existingPhotoSrc)
                        <div class="mb-3 bg-gray-50 border border-gray-100 rounded-xl overflow-hidden h-36 flex items-center justify-center" id="currentPhotoWrap_{{ $l }}">
                            <img id="currentPhoto_{{ $l }}" src="{{ $existingPhotoSrc }}" class="w-full h-full object-cover" alt="">
                        </div>
                        @endif
                        <label class="relative flex flex-col items-center justify-center h-28 rounded-xl border-2 border-dashed border-gray-200 hover:border-indigo-400 cursor-pointer overflow-hidden group transition-colors">
                            <input type="file" name="{{ $photoField }}" id="{{ $photoField }}" accept="image/*"
                                   class="absolute inset-0 opacity-0 cursor-pointer"
                                   onchange="previewImgLang(this,'covPrev_{{ $l }}','covPh_{{ $l }}','currentPhotoWrap_{{ $l }}'); clearAiPhoto('{{ $l }}')">
                            <div id="covPh_{{ $l }}" class="flex flex-col items-center gap-2 text-gray-400 group-hover:text-indigo-500 transition-colors p-4">
                                <i class="fa fa-arrow-up-from-bracket text-2xl"></i>
                                <span class="text-xs font-semibold">{{ $existingPhotoSrc ? 'Yenilə' : 'Şəkil seç' }}</span>
                            </div>
                            <img id="covPrev_{{ $l }}" src="#" class="hidden absolute inset-0 w-full h-full object-cover rounded-xl">
                        </label>
                        <p id="err-{{ $photoField }}" class="hidden mt-2 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    {{-- SEO Meta --}}
                    <div class="border-t border-gray-100 pt-4">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fa fa-magnifying-glass text-gray-300 text-xs"></i>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">SEO Meta</span>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $mtLabel }}</label>
                                <input type="text" name="meta_title_{{ $l }}" id="meta_title_{{ $l }}"
                                       value="{{ $mtVal }}" class="admin-input" placeholder="{{ $mtLabel }} ({{ strtoupper($l) }})">
                                <p id="err-meta_title_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $mdLabel }}</label>
                                <textarea name="meta_description_{{ $l }}" id="meta_description_{{ $l }}" rows="2"
                                          class="admin-input resize-none"
                                          placeholder="{{ $mdLabel }} ({{ strtoupper($l) }})">{{ $mdVal }}</textarea>
                                <p id="err-meta_description_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $mkLabel }}</label>
                                <input type="text" name="meta_keywords_{{ $l }}" id="meta_keywords_{{ $l }}"
                                       value="{{ $mkVal }}" class="admin-input" placeholder="{{ $mkLabel }} ({{ strtoupper($l) }})">
                                <p id="err-meta_keywords_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/super-build/ckeditor.js"></script>
<script>
const _editors = {};
const _langFields = {
    az: ['title_az','slug_az','review_az','text_az','date_az','photo','meta_title_az','meta_description_az','meta_keywords_az'],
    en: ['title_en','slug_en','review_en','text_en','date_en','photo_en','meta_title_en','meta_description_en','meta_keywords_en'],
    ru: ['title_ru','slug_ru','review_ru','text_ru','date_ru','photo_ru','meta_title_ru','meta_description_ru','meta_keywords_ru'],
};
// Edit: slugs start locked (manual) to protect existing values
const _slugLocked = { az: true, en: true, ru: true };

function toSlug(str) {
    const map = {
        'ə':'e','ü':'u','ö':'o','ğ':'g','ı':'i','ş':'s','ç':'c',
        'Ə':'e','Ü':'u','Ö':'o','Ğ':'g','İ':'i','Ş':'s','Ç':'c',
        'а':'a','б':'b','в':'v','г':'g','д':'d','е':'e','ё':'yo','ж':'zh',
        'з':'z','и':'i','й':'y','к':'k','л':'l','м':'m','н':'n','о':'o',
        'п':'p','р':'r','с':'s','т':'t','у':'u','ф':'f','х':'h','ц':'ts',
        'ч':'ch','ш':'sh','щ':'sch','ъ':'','ы':'y','ь':'','э':'e','ю':'yu','я':'ya',
    };
    return str.toLowerCase()
        .replace(/[а-яёəüöğışçА-ЯЁƏÜÖĞİŞÇ]/g, c => map[c] || c)
        .replace(/[^a-z0-9\s-]/g, '')
        .trim().replace(/\s+/g, '-').replace(/-+/g, '-');
}

function syncSlug(lang) {
    if (_slugLocked[lang]) return;
    document.getElementById('slug_' + lang).value = toSlug(document.getElementById('title_' + lang).value);
}

function toggleLock(lang) {
    _slugLocked[lang] = !_slugLocked[lang];
    const slugEl = document.getElementById('slug_' + lang);
    const icon   = document.getElementById('lock-icon-' + lang);
    const txt    = document.getElementById('lock-txt-' + lang);
    const btn    = document.getElementById('lock-btn-' + lang);
    if (_slugLocked[lang]) {
        icon.className = 'fa fa-lock';
        txt.textContent = 'Əllə';
        btn.className = 'flex items-center gap-1 text-[10px] font-semibold text-amber-500 hover:text-amber-700 transition-colors';
        slugEl.focus();
    } else {
        icon.className = 'fa fa-lock-open';
        txt.textContent = 'Avtomatik';
        btn.className = 'flex items-center gap-1 text-[10px] font-semibold text-indigo-500 hover:text-indigo-700 transition-colors';
        syncSlug(lang);
    }
}

function previewImg(input, prevId, phId) {
    if (!input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        const img = document.getElementById(prevId);
        img.src = e.target.result; img.classList.remove('hidden');
        if (phId) document.getElementById(phId).classList.add('hidden');
    };
    reader.readAsDataURL(input.files[0]);
}

function previewImgLang(input, prevId, phId, wrapId) {
    if (!input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        const img = document.getElementById(prevId);
        img.src = e.target.result; img.classList.remove('hidden');
        if (phId) document.getElementById(phId).classList.add('hidden');
        const wrap = document.getElementById(wrapId);
        if (wrap) wrap.classList.add('hidden');
    };
    reader.readAsDataURL(input.files[0]);
}

function clearErrors() {
    document.querySelectorAll('[id^="err-"]').forEach(el => { el.classList.add('hidden'); el.innerHTML = ''; });
    document.querySelectorAll('.admin-input').forEach(el => el.classList.remove('border-red-400'));
    Object.keys(_langFields).forEach(l => { const b = document.getElementById('badge-'+l); b.classList.add('hidden'); b.textContent = ''; });
}

function showErrors(errors) {
    Object.entries(errors).forEach(([field, msgs]) => {
        const msg = Array.isArray(msgs) ? msgs[0] : msgs;
        const err = document.getElementById('err-' + field);
        if (err) { err.innerHTML = '<i class="fa fa-circle-exclamation mr-1"></i>' + msg; err.classList.remove('hidden'); }
        const inp = document.querySelector('[name="' + field + '"]');
        if (inp) inp.classList.add('border-red-400');
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

async function generateWithAI() {
    const btn = document.getElementById('aiBlogBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> AI yazır...';

    try {
        const res = await fetch('/admin/blogs/ai-generate', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            },
        });
        const result = await res.json();

        if (!result.ok) {
            toastr.error(result.message);
            return;
        }

        const d = result.data;
        ['az','en','ru'].forEach(l => {
            const set = (id, val) => { const el = document.getElementById(id); if (el) el.value = val || ''; };
            set('title_'            + l, d['title_'            + l]);
            set('slug_'             + l, d['slug_'             + l]);
            set('review_'           + l, d['review_'           + l]);
            set('date_'             + l, d['date_'             + l]);
            set('meta_title_'       + l, d['meta_title_'       + l]);
            set('meta_description_' + l, d['meta_description_' + l]);
            set('meta_keywords_'    + l, d['meta_keywords_'    + l]);

            const key = 'text_' + l;
            if (_editors[key]) _editors[key].setData(d[key] || '');
            else set(key, d[key]);
        });

        if (result.image_preview && result.image_files) {
            const f = result.image_files;
            document.getElementById('ai_photo_az').value = f.az || '';
            document.getElementById('ai_photo_en').value = f.en || '';
            document.getElementById('ai_photo_ru').value = f.ru || '';

            ['az','en','ru'].forEach(l => {
                const prev = document.getElementById('covPrev_' + l);
                const ph   = document.getElementById('covPh_'   + l);
                if (prev) { prev.src = result.image_preview; prev.classList.remove('hidden'); }
                if (ph)   ph.classList.add('hidden');
            });
            toastr.success('Blog və şəkil AI tərəfindən yeniləndi!');
        } else {
            toastr.success('Blog AI tərəfindən yeniləndi!');
        }
    } catch (e) {
        toastr.error('Şəbəkə xətası baş verdi');
    } finally {
        btn.disabled = false;
        btn.innerHTML = '<i class="fa fa-wand-magic-sparkles"></i> AI ilə yenilə';
    }
}

function clearAiPhoto(lang) {
    const map = { az: 'ai_photo_az', en: 'ai_photo_en', ru: 'ai_photo_ru' };
    const el = document.getElementById(map[lang]);
    if (el) el.value = '';
}

function submitBlog() {
    Object.entries(_editors).forEach(([id, editor]) => { document.getElementById(id).value = editor.getData(); });
    clearErrors();
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saxlanır...';
    $.ajax({
        type: 'POST', url: document.getElementById('blogForm').action,
        data: new FormData(document.getElementById('blogForm')),
        processData: false, contentType: false,
        success: function(r) {
            toastr.success(r.message);
            setTimeout(() => window.location.href = '/admin/blogs', 1200);
        },
        error: function(xhr) {
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
<script>
const _editorConfig = {
    toolbar: {
        items: [
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', '|',
            'alignment:left', 'alignment:center', 'alignment:right', 'alignment:justify', '|',
            'bulletedList', 'numberedList', '|',
            'outdent', 'indent', '|',
            'link', 'blockQuote', 'insertTable', '|',
            'undo', 'redo'
        ]
    },
    removePlugins: [
        'RealTimeCollaborativeEditing', 'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges', 'RealTimeCollaborativeRevisionHistory',
        'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData',
        'RevisionHistory', 'Pagination', 'WProofreader', 'MathType',
        'DocumentOutline', 'TableOfContents', 'FormatPainter', 'CaseChange',
        'SlashCommand', 'Template', 'MultiLevelList'
    ]
};
['text_az','text_en','text_ru'].forEach(id => {
    const el = document.getElementById(id);
    if (el) CKEDITOR.ClassicEditor.create(el, _editorConfig).then(e => { _editors[id] = e; }).catch(console.error);
});
</script>
@endpush
