@extends('back.layouts.master')
@section('title', 'Yeni Məhsul')

@section('content')
<div x-data="{ lang: 'az' }">

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="{{ route('product.index') }}" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Yeni Məhsul</h1>
            <p class="text-xs text-gray-400 mt-0.5">Məhsul əlavə edin</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('product.index') }}" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
            Ləğv et
        </a>
        <button id="submitBtn" type="button" onclick="submitProduct()" class="btn-primary shadow-lg shadow-indigo-100">
            <i class="fa fa-check"></i> Əlavə Et
        </button>
    </div>
</div>

<form id="prdForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Sol: dil tabları --}}
    <div class="lg:col-span-2 space-y-5">

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
                    'az' => ['Ad','Slug','Haqqında','mehsul-adi'],
                    'en' => ['Name','Slug','About','product-name'],
                    'ru' => ['Название','Slug','О системе','nazvaniye'],
                ] as $l => [$nLabel,$sLabel,$tLabel,$sPh])
                <div x-show="lang==='{{ $l }}'" class="space-y-4">

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $nLabel }} *</label>
                        <input type="text" name="title_{{ $l }}" id="title_{{ $l }}"
                               class="admin-input" placeholder="{{ $nLabel }} ({{ strtoupper($l) }})"
                               oninput="syncSlug('{{ $l }}')">
                        <p id="err-title_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center justify-between">
                            <span>{{ $sLabel }} *</span>
                            <button type="button" id="lock-btn-{{ $l }}" onclick="toggleLock('{{ $l }}')"
                                    class="flex items-center gap-1 text-[10px] font-semibold text-indigo-500 hover:text-indigo-700 transition-colors">
                                <i id="lock-icon-{{ $l }}" class="fa fa-lock-open"></i>
                                <span id="lock-txt-{{ $l }}">Avtomatik</span>
                            </button>
                        </label>
                        <input type="text" name="slug_{{ $l }}" id="slug_{{ $l }}"
                               class="admin-input font-mono bg-gray-50 text-gray-500" placeholder="{{ $sPh }}" readonly>
                        <p id="err-slug_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $tLabel }} *</label>
                        <textarea name="text_{{ $l }}" id="text_{{ $l }}" rows="10"
                                  class="admin-input resize-none"></textarea>
                        <p id="err-text_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

        {{-- Qalereya --}}
        <div class="form-card form-card-body">
            <div class="flex items-center justify-between mb-3">
                <div class="form-section-title mb-0"><i class="fa fa-images text-gray-300"></i> Şəkillər (qalereya)</div>
                <label class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold text-indigo-600 border border-indigo-200 rounded-lg hover:bg-indigo-50 cursor-pointer transition-colors">
                    <i class="fa fa-plus"></i> Şəkil əlavə et
                    <input type="file" id="galleryInput" accept="image/*" multiple class="hidden" onchange="addGalleryFiles(this.files)">
                </label>
            </div>
            {{-- Drop zone (shown when empty) --}}
            <div id="galleryDropzone"
                 class="border-2 border-dashed border-gray-200 rounded-xl flex flex-col items-center justify-center gap-2 text-gray-400 py-8 cursor-pointer hover:border-indigo-300 hover:text-indigo-400 transition-colors"
                 onclick="document.getElementById('galleryInput').click()">
                <i class="fa fa-layer-group text-3xl"></i>
                <span class="text-sm font-semibold">Şəkillər seç və ya bura sürükle</span>
                <span class="text-xs text-gray-300">Sıranı sonradan dəyişə bilərsiniz</span>
            </div>
            {{-- Preview grid (sortable) --}}
            <div id="galleryGrid" class="hidden grid grid-cols-3 sm:grid-cols-5 gap-2"></div>
            <p id="err-images" class="hidden mt-2 text-xs text-red-500 flex items-center gap-1"></p>
        </div>

    </div>

    {{-- Sağ: sidebar --}}
    <div class="space-y-5">

        {{-- Cover --}}
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-image text-gray-300"></i> Kapak şəkli *</div>
            <label class="upload-zone h-44 group cursor-pointer">
                <input type="file" name="src" id="coverInput" accept="image/*"
                       class="absolute inset-0 opacity-0 cursor-pointer"
                       onchange="previewCover(this)">
                <div id="covPh" class="flex flex-col items-center gap-2 text-gray-400 group-hover:text-indigo-500 transition-colors p-5">
                    <i class="fa fa-cloud-arrow-up text-3xl"></i>
                    <span class="text-sm font-semibold">Kapak seç</span>
                    <span class="text-xs text-gray-300">PNG, JPG, WEBP</span>
                </div>
                <img id="covPrev" src="#" class="hidden absolute inset-0 w-full h-full object-cover rounded-xl">
                <button type="button" id="covRemove"
                        class="hidden absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 z-10"
                        onclick="removeCover(event)">
                    <i class="fa fa-times"></i>
                </button>
            </label>
            <p id="err-src" class="hidden mt-2 text-xs text-red-500 flex items-center gap-1"></p>
        </div>

        {{-- Link + Kateqoriya --}}
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-circle-info text-gray-300"></i> Ümumi</div>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Sayt linki</label>
                    <div class="relative">
                        <i class="fa fa-link absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" name="link" class="admin-input pl-9" placeholder="https://...">
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Məhsulun vizitka / demo saytı</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Kateqoriya *</label>
                    <select name="service_id" class="admin-input">
                        <option value="">Seçin...</option>
                        @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name_az }}</option>
                        @endforeach
                    </select>
                    <p id="err-service_id" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                </div>
            </div>
        </div>

    </div>
</div>
</form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@38.1.0/build/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
const _editors  = {};
const _langFields = {
    az: ['title_az','slug_az','text_az'],
    en: ['title_en','slug_en','text_en'],
    ru: ['title_ru','slug_ru','text_ru'],
};
const _slugLocked = { az: false, en: false, ru: false };

/* ── slug ─────────────────────────────────────────────── */
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
    if (_slugLocked[lang]) {
        slugEl.readOnly = false; slugEl.classList.remove('bg-gray-50','text-gray-500'); slugEl.classList.add('bg-white','text-gray-900');
        icon.className = 'fa fa-lock'; txt.textContent = 'Əllə'; slugEl.focus();
    } else {
        slugEl.readOnly = true; slugEl.classList.add('bg-gray-50','text-gray-500'); slugEl.classList.remove('bg-white','text-gray-900');
        icon.className = 'fa fa-lock-open'; txt.textContent = 'Avtomatik'; syncSlug(lang);
    }
}

/* ── cover ────────────────────────────────────────────── */
function previewCover(input) {
    if (!input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        const img = document.getElementById('covPrev');
        img.src = e.target.result; img.classList.remove('hidden');
        document.getElementById('covPh').classList.add('hidden');
        document.getElementById('covRemove').classList.remove('hidden');
        document.getElementById('covRemove').classList.add('flex');
    };
    reader.readAsDataURL(input.files[0]);
}
function removeCover(e) {
    e.preventDefault(); e.stopPropagation();
    document.getElementById('coverInput').value = '';
    document.getElementById('covPrev').classList.add('hidden');
    document.getElementById('covPh').classList.remove('hidden');
    document.getElementById('covRemove').classList.add('hidden');
    document.getElementById('covRemove').classList.remove('flex');
}

/* ── gallery ──────────────────────────────────────────── */
let _newFiles = [];   // File objects in display order
let _sortable = null;

function addGalleryFiles(fileList) {
    Array.from(fileList).forEach(f => _newFiles.push(f));
    renderGallery();
    // reset input so same file can be re-added if needed
    document.getElementById('galleryInput').value = '';
}

function removeNewFile(idx) {
    _newFiles.splice(idx, 1);
    renderGallery();
}

function renderGallery() {
    const grid = document.getElementById('galleryGrid');
    const zone = document.getElementById('galleryDropzone');
    grid.innerHTML = '';
    if (_newFiles.length === 0) {
        grid.classList.add('hidden');
        zone.classList.remove('hidden');
        return;
    }
    zone.classList.add('hidden');
    grid.classList.remove('hidden');

    _newFiles.forEach((file, idx) => {
        const reader = new FileReader();
        reader.onload = e => {
            const wrap = document.createElement('div');
            wrap.style.cssText = 'position:relative;border-radius:8px;overflow:hidden;aspect-ratio:1;background:#f3f4f6;border:1px solid #e5e7eb;cursor:grab';
            wrap.dataset.fileIndex = idx;
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.cssText = 'width:100%;height:100%;object-fit:cover;pointer-events:none;display:block';
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.innerHTML = '<i class="fa fa-times"></i>';
            btn.style.cssText = 'position:absolute;top:4px;right:4px;width:20px;height:20px;background:#ef4444;color:#fff;border:none;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:10px;cursor:pointer;z-index:10;line-height:1';
            btn.onclick = () => removeNewFile(parseInt(wrap.dataset.fileIndex));
            const grip = document.createElement('div');
            grip.innerHTML = '<i class="fa fa-grip-vertical"></i>';
            grip.style.cssText = 'position:absolute;bottom:4px;left:4px;width:20px;height:20px;background:rgba(0,0,0,0.4);color:#fff;border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:10px;pointer-events:none';
            wrap.appendChild(img);
            wrap.appendChild(btn);
            wrap.appendChild(grip);
            grid.appendChild(wrap);
        };
        reader.readAsDataURL(file);
    });

    // init or refresh sortable
    if (_sortable) { _sortable.destroy(); }
    _sortable = Sortable.create(grid, {
        animation: 150,
        ghostClass: 'opacity-40',
        onEnd: function() {
            // rebuild _newFiles order from DOM
            const items = grid.querySelectorAll('[data-file-index]');
            _newFiles = Array.from(items).map(el => _newFiles[parseInt(el.dataset.fileIndex)]);
            // re-render to reset indices
            renderGallery();
        }
    });
}

// drag-over highlight
document.addEventListener('DOMContentLoaded', () => {
    const zone = document.getElementById('galleryDropzone');
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('border-indigo-400','bg-indigo-50/30'); });
    zone.addEventListener('dragleave', () => { zone.classList.remove('border-indigo-400','bg-indigo-50/30'); });
    zone.addEventListener('drop', e => {
        e.preventDefault();
        zone.classList.remove('border-indigo-400','bg-indigo-50/30');
        addGalleryFiles(e.dataTransfer.files);
    });
});

/* ── errors ───────────────────────────────────────────── */
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

/* ── submit ───────────────────────────────────────────── */
function submitProduct() {
    Object.entries(_editors).forEach(([id, editor]) => { document.getElementById(id).value = editor.getData(); });
    clearErrors();
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Göndərilir...';

    const fd = new FormData(document.getElementById('prdForm'));
    // append gallery files in current display order
    _newFiles.forEach(f => fd.append('images[]', f));

    $.ajax({
        type: 'POST', url: document.getElementById('prdForm').action,
        data: fd, processData: false, contentType: false,
        success: function(r) {
            toastr.success(r.message);
            setTimeout(() => window.location.href = '{{ route("product.index") }}', 1200);
        },
        error: function(xhr) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-check"></i> Əlavə Et';
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
['text_az','text_en','text_ru'].forEach(id => {
    const el = document.getElementById(id);
    if (el) ClassicEditor.create(el).then(e => { _editors[id] = e; }).catch(console.error);
});
</script>
@endpush
