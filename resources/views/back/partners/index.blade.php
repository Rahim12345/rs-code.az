@extends('back.layouts.master')
@section('title', 'Tərəfdaşlar')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Tərəfdaşlar</h1>
        <p class="text-sm text-gray-500 mt-0.5">{{ $partners->count() }} tərəfdaş</p>
    </div>
    <button onclick="openAddModal()" class="btn-primary">
        <i class="fa fa-plus"></i> Yeni tərəfdaş
    </button>
</div>

@if(session('status'))
<div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">{{ session('status') }}</div>
@endif

{{-- Grid --}}
<div id="partnersGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-8">
    @forelse($partners as $partner)
    <div class="bg-white rounded-xl border border-gray-200 p-4 text-center group relative select-none"
         id="partner-{{ $partner->id }}" data-id="{{ $partner->id }}">
        {{-- Drag handle --}}
        <div class="absolute top-2 left-2 text-gray-300 group-hover:text-gray-400 cursor-grab transition-colors drag-handle">
            <i class="fa fa-grip-vertical text-xs"></i>
        </div>
        @if($partner->logo)
        <img src="{{ asset('images/partners/'.$partner->logo) }}" alt="{{ $partner->name }}"
             class="h-12 w-auto object-contain mx-auto mb-3 grayscale group-hover:grayscale-0 transition-all pointer-events-none">
        @else
        <div class="h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-3">
            <i class="fa fa-image text-gray-300"></i>
        </div>
        @endif
        <p class="text-gray-700 font-medium text-xs mb-3 truncate">{{ $partner->name }}</p>
        <div class="flex gap-1.5 justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <button onclick="openEditModal({{ $partner->id }})"
                    class="flex-1 py-1 text-xs text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors font-semibold">
                <i class="fa fa-pen"></i>
            </button>
            <button onclick="deletePartner({{ $partner->id }})"
                    class="flex-1 py-1 text-xs text-red-500 bg-red-50 hover:bg-red-100 rounded-lg transition-colors font-semibold">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
    @empty
    <div class="col-span-5 bg-white rounded-xl border border-gray-200 p-12 text-center text-gray-400">
        <i class="fa fa-handshake text-3xl mb-3 block text-gray-200"></i>
        Hələlik heç bir tərəfdaş yoxdur
    </div>
    @endforelse
</div>

{{-- Add modal --}}
<div id="add-modal" style="display:none" class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-900">Yeni tərəfdaş</h3>
            <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <form action="/admin/partners" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Şirkət adı *</label>
                <input type="text" name="name" class="admin-input" placeholder="SOCAR, Kapital Bank...">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Veb sayt *</label>
                <input type="url" name="link" class="admin-input" placeholder="https://example.com">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Loqo *</label>
                <div id="add-logo-zone" onclick="document.getElementById('add-logo-input').click()"
                     style="border:2px dashed #d1d5db;border-radius:12px;padding:20px;text-align:center;cursor:pointer;transition:border-color .2s;position:relative">
                    <div id="add-logo-placeholder">
                        <i class="fa fa-cloud-arrow-up text-2xl text-gray-300 mb-1 block"></i>
                        <p class="text-sm text-gray-400 font-semibold">Loqo seçin</p>
                        <p class="text-xs text-gray-300 mt-0.5">PNG, SVG, JPG</p>
                    </div>
                    <img id="add-logo-preview" alt="" style="display:none;max-height:60px;margin:0 auto;object-contain">
                    <input type="file" name="logo" id="add-logo-input" accept="image/*"
                           style="display:none" onchange="previewLogo(this,'add')">
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-primary flex-1">Əlavə et</button>
                <button type="button" onclick="closeAddModal()"
                        class="flex-1 px-4 py-2.5 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Ləğv et
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Edit modal --}}
<div id="edit-modal" style="display:none" class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-900">Tərəfdaşı düzəlt</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <form action="/admin/partners" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Şirkət adı *</label>
                <input type="text" name="name" id="edit-name" class="admin-input">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Veb sayt *</label>
                <input type="url" name="link" id="edit-link" class="admin-input">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Loqo (dəyişmək istəyirsinizsə)</label>
                <input type="hidden" name="logo_hidden" id="edit-logo-hidden">
                <div id="edit-logo-zone" onclick="document.getElementById('edit-logo-input').click()"
                     style="border:2px dashed #d1d5db;border-radius:12px;padding:16px;text-align:center;cursor:pointer;transition:border-color .2s;position:relative">
                    <img id="edit-logo-preview" alt="" style="max-height:60px;margin:0 auto;object-contain;display:block">
                    <p style="font-size:11px;color:#9ca3af;margin-top:8px">Dəyişmək üçün kliklə</p>
                    <input type="file" name="logo" id="edit-logo-input" accept="image/*"
                           style="display:none" onchange="previewLogo(this,'edit')">
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-primary flex-1">
                    <i class="fa fa-floppy-disk"></i> Yadda saxla
                </button>
                <button type="button" onclick="closeEditModal()"
                        class="flex-1 px-4 py-2.5 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Ləğv et
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var grid = document.getElementById('partnersGrid');
    if (!grid) return;
    Sortable.create(grid, {
        handle: '.drag-handle',
        animation: 200,
        ghostClass: 'opacity-40',
        onEnd: function () {
            var ids = Array.from(grid.querySelectorAll('[data-id]')).map(el => el.dataset.id);
            $.post('{{ route("partner.reorder") }}', {
                ids: ids,
                _token: $('meta[name="csrf-token"]').attr('content')
            }).done(function (r) { toastr.success(r.message); })
              .fail(function ()  { toastr.error('Xəta baş verdi'); });
        }
    });
});

function openAddModal()  { document.getElementById('add-modal').style.display = 'flex'; }
function closeAddModal() { document.getElementById('add-modal').style.display = 'none'; }
function closeEditModal(){ document.getElementById('edit-modal').style.display = 'none'; }

function previewLogo(input, prefix) {
    if (!input.files[0]) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        var preview = document.getElementById(prefix + '-logo-preview');
        preview.src = e.target.result;
        preview.style.display = 'block';
        var ph = document.getElementById(prefix + '-logo-placeholder');
        if (ph) ph.style.display = 'none';
    };
    reader.readAsDataURL(input.files[0]);
}

function openEditModal(id) {
    $.post('/admin/edit-partner', { id: id, _token: $('meta[name="csrf-token"]').attr('content') }, function(r) {
        var p = r.partner;
        document.getElementById('edit-id').value          = p.id;
        document.getElementById('edit-name').value        = p.name;
        document.getElementById('edit-link').value        = p.link;
        document.getElementById('edit-logo-hidden').value = p.logo;
        var preview = document.getElementById('edit-logo-preview');
        preview.src = p.logo ? '/images/partners/' + p.logo : '';
        preview.style.display = p.logo ? 'block' : 'none';
        document.getElementById('edit-modal').style.display = 'flex';
    }).fail(function() { toastr.error('Məlumat yüklənmədi'); });
}

function deletePartner(id) {
    if (!confirm('Bu tərəfdaşı silmək istədiyinizə əminsiniz?')) return;
    $.post('/admin/delete-partner', { id: id, _token: $('meta[name="csrf-token"]').attr('content') }, function(r) {
        if (r.status === 1) {
            $('#partner-' + id).fadeOut(300, function(){ $(this).remove(); });
            toastr.success(r.message);
        } else {
            toastr.error(r.message);
        }
    });
}
</script>
@endpush
