@extends('back.layouts.master')
@section('title', 'Layihə Düzəliş')

@section('content')
<div x-data="{ lang: 'az' }">

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="/admin/projects" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Layihə Düzəliş</h1>
            <p class="text-xs text-gray-400 mt-0.5">{{ $project->name_az ?: $project->name }}</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <a href="/admin/projects" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
            Ləğv et
        </a>
        <button id="submitBtn" type="button" onclick="submitProject()" class="btn-primary shadow-lg shadow-indigo-100">
            <i class="fa fa-floppy-disk"></i> Yadda Saxla
        </button>
    </div>
</div>

<form id="projectForm" action="/admin/edit-project/{{ $project->id }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-5">

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
                    'az' => ['Ad','Slug','Açıqlama','Tarix', $project->name_az, $project->slug_az, $project->description_az, $project->tarix_az],
                    'en' => ['Name','Slug','Description','Date', $project->name_en, $project->slug_en, $project->description_en, $project->tarix_en],
                    'ru' => ['Название','Slug','Описание','Дата', $project->name_ru, $project->slug_ru, $project->description_ru, $project->tarix_ru],
                ] as $l => [$nLabel,$sLabel,$dLabel,$tLabel,$nVal,$sVal,$dVal,$tVal])
                <div x-show="lang==='{{ $l }}'" class="space-y-4">

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $nLabel }} *</label>
                        <input type="text" name="name_{{ $l }}" id="name_{{ $l }}"
                               value="{{ $nVal }}" class="admin-input"
                               oninput="syncSlug('{{ $l }}')">
                        <p id="err-name_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
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
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $dLabel }} *</label>
                        <textarea name="description_{{ $l }}" id="description_{{ $l }}" rows="8"
                                  class="admin-input resize-none">{{ $dVal }}</textarea>
                        <p id="err-description_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">{{ $tLabel }} *</label>
                        <input type="text" name="tarix_{{ $l }}" id="tarix_{{ $l }}"
                               value="{{ $tVal }}" class="admin-input">
                        <p id="err-tarix_{{ $l }}" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="space-y-5">

        {{-- Ümumi --}}
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-circle-info text-gray-300"></i> Ümumi məlumat</div>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Link *</label>
                    <input type="text" name="link" id="link" value="{{ $project->link }}" class="admin-input" placeholder="https://...">
                    <p id="err-link" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Kateqoriya *</label>
                    <select name="kateqoriya" id="kateqoriya" class="admin-input">
                        <option value="">Seçin...</option>
                        @foreach(['websites' => 'Web Saytlar','portfolio' => 'Portfolio','e-commerce' => 'E-Ticarət','blog' => 'Blog'] as $val => $label)
                        <option value="{{ $val }}" {{ $project->kateqoriya === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    <p id="err-kateqoriya" class="hidden mt-1 text-xs text-red-500 flex items-center gap-1"></p>
                </div>
                <div class="flex justify-between text-xs text-gray-500 pt-1">
                    <span>ID</span><span class="font-mono font-semibold text-gray-700">#{{ $project->id }}</span>
                </div>
                @if($project->created_at)
                <div class="flex justify-between text-xs text-gray-500">
                    <span>Yaradılıb</span><span class="text-gray-700">{{ \Carbon\Carbon::parse($project->created_at)->format('d.m.Y') }}</span>
                </div>
                @endif
            </div>
        </div>

        {{-- Mövcud şəkillər --}}
        @if($project->images->count())
        <div class="form-card form-card-body">
            <div class="flex items-center justify-between mb-3">
                <div class="form-section-title mb-0"><i class="fa fa-images text-gray-300"></i> Mövcud şəkillər</div>
                <span class="text-xs text-gray-400"><i class="fa fa-grip-vertical mr-1"></i>Sıralamaq üçün sürükleyin</span>
            </div>
            <div id="existingGrid" class="grid grid-cols-3 gap-2">
                @foreach($project->images as $img)
                <div style="position:relative;border-radius:8px;overflow:hidden;aspect-ratio:1;background:#f3f4f6;border:1px solid #e5e7eb;cursor:grab" id="imgWrap-{{ $img->id }}" data-img-id="{{ $img->id }}">
                    <img src="/images/projects/{{ $img->photo }}" style="width:100%;height:100%;object-fit:cover;display:block;pointer-events:none" alt="">
                    <button type="button" onclick="deleteImage({{ $img->id }}, this)"
                            style="position:absolute;top:4px;right:4px;width:20px;height:20px;background:#ef4444;color:#fff;border:none;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:10px;cursor:pointer;z-index:10;line-height:1">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Yeni şəkillər --}}
        <div class="form-card form-card-body">
            <div class="flex items-center justify-between mb-3">
                <div class="form-section-title mb-0"><i class="fa fa-cloud-arrow-up text-gray-300"></i> Yeni şəkil əlavə et</div>
                <label class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold text-indigo-600 border border-indigo-200 rounded-lg hover:bg-indigo-50 cursor-pointer transition-colors">
                    <i class="fa fa-plus"></i> Seç
                    <input type="file" id="galleryInput" accept="image/*" multiple class="hidden" onchange="addGalleryFiles(this.files)">
                </label>
            </div>
            <div id="galleryDropzone"
                 class="border-2 border-dashed border-gray-200 rounded-xl flex flex-col items-center justify-center gap-2 text-gray-400 py-6 cursor-pointer hover:border-indigo-300 hover:text-indigo-400 transition-colors"
                 onclick="document.getElementById('galleryInput').click()">
                <i class="fa fa-cloud-arrow-up text-2xl"></i>
                <span class="text-xs font-semibold">Şəkillər seç və ya bura sürükle</span>
            </div>
            <div id="galleryGrid" class="hidden grid grid-cols-3 gap-2 mt-2"></div>
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
const _editors = {};
const _langFields = {
    az: ['name_az','slug_az','description_az','tarix_az'],
    en: ['name_en','slug_en','description_en','tarix_en'],
    ru: ['name_ru','slug_ru','description_ru','tarix_ru'],
};
// Edit: slugs start locked to protect existing values
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
    document.getElementById('slug_' + lang).value = toSlug(document.getElementById('name_' + lang).value);
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

/* ── existing gallery sortable ─────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
    const existingGrid = document.getElementById('existingGrid');
    if (existingGrid) {
        Sortable.create(existingGrid, {
            animation: 150,
            ghostClass: 'opacity-40',
            onEnd: function() {
                const ids = Array.from(existingGrid.querySelectorAll('[data-img-id]')).map(el => el.dataset.imgId);
                $.post('/admin/project-image-reorder', {
                    ids: ids,
                    _token: $('meta[name="csrf-token"]').attr('content')
                }).done(() => toastr.success('Sıra yeniləndi'))
                  .fail(() => toastr.error('Xəta baş verdi'));
            }
        });
    }
    const zone = document.getElementById('galleryDropzone');
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('border-indigo-400','bg-indigo-50/30'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('border-indigo-400','bg-indigo-50/30'));
    zone.addEventListener('drop', e => {
        e.preventDefault(); zone.classList.remove('border-indigo-400','bg-indigo-50/30');
        addGalleryFiles(e.dataTransfer.files);
    });
});

function deleteImage(id, btn) {
    if (!confirm('Bu şəkli silmək istədiyinizdən əminsiniz?')) return;
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    $.ajax({
        url: '/admin/project-image-delete/' + id,
        type: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(r) {
            document.getElementById('imgWrap-' + id).remove();
            toastr.success(r.message);
        },
        error: function() {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-times"></i>';
            toastr.error('Xəta baş verdi');
        }
    });
}

/* ── new gallery ──────────────────────────────────────── */
let _newFiles = [];
let _sortable  = null;

function addGalleryFiles(fileList) {
    Array.from(fileList).forEach(f => _newFiles.push(f));
    renderGallery();
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
        zone.style.display = '';
        return;
    }
    grid.classList.remove('hidden');
    zone.style.display = 'none';

    _newFiles.forEach((file, idx) => {
        const reader = new FileReader();
        reader.onload = e => {
            const wrap = document.createElement('div');
            wrap.style.cssText = 'position:relative;border-radius:8px;overflow:hidden;aspect-ratio:1;background:#f3f4f6;border:1px dashed #e5e7eb;cursor:grab';
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
            wrap.appendChild(img); wrap.appendChild(btn); wrap.appendChild(grip);
            grid.appendChild(wrap);
        };
        reader.readAsDataURL(file);
    });

    if (_sortable) _sortable.destroy();
    _sortable = Sortable.create(grid, {
        animation: 150,
        ghostClass: 'opacity-40',
        onEnd: function() {
            const items = grid.querySelectorAll('[data-file-index]');
            _newFiles = Array.from(items).map(el => _newFiles[parseInt(el.dataset.fileIndex)]);
            renderGallery();
        }
    });
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

function submitProject() {
    Object.entries(_editors).forEach(([id, editor]) => { document.getElementById(id).value = editor.getData(); });
    clearErrors();
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saxlanır...';
    const fd = new FormData(document.getElementById('projectForm'));
    _newFiles.forEach(f => fd.append('photos[]', f));
    $.ajax({
        type: 'POST', url: document.getElementById('projectForm').action,
        data: fd, processData: false, contentType: false,
        success: function(r) {
            toastr.success(r.message);
            setTimeout(() => window.location.href = '/admin/projects', 1200);
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
['description_az','description_en','description_ru'].forEach(id => {
    const el = document.getElementById(id);
    if (el) ClassicEditor.create(el).then(e => { _editors[id] = e; }).catch(console.error);
});
</script>
@endpush
