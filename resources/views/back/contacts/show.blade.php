@extends('back.layouts.master')
@section('title', 'Müraciət — ' . $contact->name)

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="/admin/contacts" class="flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Geri
    </a>
    <h1 class="text-xl font-bold text-gray-900">Müraciət Detalları</h1>
</div>

<div class="max-w-2xl">
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="p-6 space-y-5">

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Şirkət</p>
                    <p class="text-gray-900 font-semibold">{{ $contact->sirket }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Ad Soyad</p>
                    <p class="text-gray-900 font-semibold">{{ $contact->name }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Telefon</p>
                    <a href="tel:{{ $contact->elaqe_nomresi }}"
                       class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ $contact->elaqe_nomresi }}
                    </a>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Email</p>
                    <a href="mailto:{{ $contact->email }}"
                       class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ $contact->email }}
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-5">
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Mesaj</p>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</div>
            </div>

            <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                <div class="text-xs text-gray-400">
                    <span>IP: {{ $contact->ip }}</span>
                    <span class="mx-2">·</span>
                    <span>{{ \Carbon\Carbon::parse($contact->created_at)->format('d.m.Y H:i') }}</span>
                </div>
                <div class="flex gap-2">
                    <a href="mailto:{{ $contact->email }}"
                       class="btn-primary btn-sm">
                        <i class="fa fa-reply"></i>
                        Cavabla
                    </a>
                    <button onclick="deleteAndBack({{ $contact->id }})" class="btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                        Sil
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteAndBack(id) {
    if (!confirm('Silmək istədiyinizdən əminsiniz?')) return;
    $.ajax({
        url: '/admin/delete-contact',
        type: 'POST',
        data: { id: id, _token: $('meta[name="csrf-token"]').attr('content') },
        success: function(r) {
            if (r.status == 1) {
                toastr.success('Silindi');
                setTimeout(() => window.location.href = '/admin/contacts', 800);
            }
        },
        error: function() { toastr.error('Xəta baş verdi'); }
    });
}
</script>
@endpush
