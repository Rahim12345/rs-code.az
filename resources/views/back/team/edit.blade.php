@extends('back.layouts.master')
@section('title', 'Komanda - Düzəliş')

@section('content')
<div class="max-w-2xl">

    <div class="flex items-center gap-3 mb-7">
        <a href="{{ route('team.index') }}" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Üzv Düzəliş</h1>
            <p class="text-xs text-gray-400 mt-0.5">{{ $team->full_name }}</p>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-5 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm flex gap-3">
        <i class="fa fa-circle-exclamation mt-0.5 shrink-0"></i>
        <ul class="space-y-0.5">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

            {{-- Avatar upload zone --}}
            <div style="background:linear-gradient(135deg,#eef2ff 0%,#fff 50%,#f5f3ff 100%)" class="px-8 py-10 flex flex-col items-center border-b border-gray-100">

                <div id="avatarZone" onclick="document.getElementById('avatarInput').click()"
                     style="width:128px;height:128px;position:relative;cursor:pointer;margin-bottom:12px">

                    {{-- Placeholder (shown only if no image) --}}
                    <div id="avatarPlaceholder"
                         style="position:absolute;inset:0;border-radius:50%;background:#f9fafb;border:2px dashed #d1d5db;display:{{ $team->src ? 'none' : 'flex' }};flex-direction:column;align-items:center;justify-content:center;gap:6px;color:#9ca3af;transition:border-color .2s,color .2s">
                        <i class="fa fa-user" style="font-size:40px"></i>
                        <span style="font-size:11px;font-weight:600">Şəkil seç</span>
                    </div>

                    {{-- Preview image --}}
                    <img id="avatarPreview"
                         src="{{ $team->src ? asset($team->src) : '' }}"
                         alt="{{ $team->full_name }}"
                         style="position:absolute;inset:0;width:100%;height:100%;border-radius:50%;object-fit:cover;border:4px solid white;box-shadow:0 8px 24px rgba(0,0,0,0.12);display:{{ $team->src ? 'block' : 'none' }}">

                    {{-- Hover overlay --}}
                    <div id="avatarOverlay"
                         style="position:absolute;inset:0;border-radius:50%;background:rgba(0,0,0,0);display:{{ $team->src ? 'flex' : 'none' }};align-items:center;justify-content:center;transition:background .2s">
                        <div style="display:flex;flex-direction:column;align-items:center;gap:4px;color:white;opacity:0;transition:opacity .2s" id="avatarOverlayContent">
                            <i class="fa fa-camera" style="font-size:18px;filter:drop-shadow(0 1px 2px rgba(0,0,0,.5))"></i>
                            <span style="font-size:10px;font-weight:600;filter:drop-shadow(0 1px 2px rgba(0,0,0,.5))">Dəyiş</span>
                        </div>
                    </div>

                    <input type="file" name="src" id="avatarInput" accept="image/*"
                           style="display:none" onchange="previewAvatar(this)">
                </div>

                <p id="avatarLabel" style="font-size:13px;font-weight:600;color:#6b7280;margin-bottom:2px">
                    {{ $team->src ? 'Şəkili dəyiş' : 'Şəkil seç' }}
                </p>
                <p style="font-size:11px;color:#d1d5db">JPG, PNG, WEBP · Tövsiyə: 400×400</p>
            </div>

            {{-- Fields --}}
            <div class="px-8 py-7 space-y-5">
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Ad Soyad *</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $team->full_name) }}"
                               class="admin-input">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Vəzifə *</label>
                        <input type="text" name="professional" value="{{ old('professional', $team->professional) }}"
                               class="admin-input">
                    </div>
                </div>
                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                    <a href="{{ route('team.index') }}" class="text-sm text-gray-400 hover:text-gray-600 transition-colors">Ləğv et</a>
                    <button type="submit" class="btn-primary">
                        <i class="fa fa-floppy-disk"></i> Yadda Saxla
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
(function () {
    var zone = document.getElementById('avatarZone');
    var overlay = document.getElementById('avatarOverlay');
    var overlayContent = document.getElementById('avatarOverlayContent');
    var placeholder = document.getElementById('avatarPlaceholder');

    zone.addEventListener('mouseenter', function () {
        if (overlay.style.display !== 'none') {
            overlay.style.background = 'rgba(0,0,0,0.35)';
            overlayContent.style.opacity = '1';
        } else {
            placeholder.style.borderColor = '#818cf8';
            placeholder.style.color = '#6366f1';
        }
    });
    zone.addEventListener('mouseleave', function () {
        if (overlay.style.display !== 'none') {
            overlay.style.background = 'rgba(0,0,0,0)';
            overlayContent.style.opacity = '0';
        } else {
            placeholder.style.borderColor = '#d1d5db';
            placeholder.style.color = '#9ca3af';
        }
    });
})();

function previewAvatar(input) {
    if (!input.files || !input.files[0]) return;
    var reader = new FileReader();
    reader.onload = function (e) {
        var preview = document.getElementById('avatarPreview');
        preview.src = e.target.result;
        preview.style.display = 'block';
        document.getElementById('avatarPlaceholder').style.display = 'none';
        document.getElementById('avatarOverlay').style.display = 'flex';
        document.getElementById('avatarLabel').textContent = 'Şəkili dəyiş';
    };
    reader.readAsDataURL(input.files[0]);
}
</script>
@endpush
