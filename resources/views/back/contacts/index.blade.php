@extends('back.layouts.master')
@section('title', 'Müraciətlər')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Müraciətlər</h1>
        <p class="text-sm text-gray-500 mt-0.5">Əlaqə formu vasitəsilə daxil olan müraciətlər</p>
    </div>
    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200">
        {{ $contacts->count() }} müraciət
    </span>
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="admin-table w-full">
        <thead>
            <tr>
                <th>Şirkət</th>
                <th>Ad Soyad</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Mesaj</th>
                <th>Tarix</th>
                <th class="text-right">Əməliyyat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $c)
            <tr id="row-{{ $c->id }}">
                <td class="font-medium text-gray-900">{{ $c->sirket }}</td>
                <td class="text-gray-700">{{ $c->name }}</td>
                <td>
                    <a href="tel:{{ $c->elaqe_nomresi }}" class="text-indigo-600 hover:underline text-sm">
                        {{ $c->elaqe_nomresi }}
                    </a>
                </td>
                <td>
                    <a href="mailto:{{ $c->email }}" class="text-indigo-600 hover:underline text-sm">
                        {{ $c->email }}
                    </a>
                </td>
                <td class="text-gray-500 text-sm max-w-xs">
                    <span class="line-clamp-2">{{ Str::limit($c->message, 60) }}</span>
                </td>
                <td class="text-gray-400 text-xs whitespace-nowrap">
                    {{ \Carbon\Carbon::parse($c->created_at)->format('d.m.Y H:i') }}
                </td>
                <td class="text-right">
                    <div class="btn-group justify-end">
                        <a href="/admin/contacts/{{ $c->id }}" class="btn-primary btn-sm" title="Ətraflı bax">
                            <i class="fa fa-eye"></i>
                        </a>
                        <button onclick="deleteContact({{ $c->id }})" class="btn-danger btn-sm" title="Sil">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-gray-400 py-12">
                    <div class="flex flex-col items-center gap-2">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <span class="text-sm">Hələlik müraciət yoxdur</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
function deleteContact(id) {
    if (!confirm('Silmək istədiyinizdən əminsiniz?')) return;
    $.ajax({
        url: '/admin/delete-contact',
        type: 'POST',
        data: { id: id, _token: $('meta[name="csrf-token"]').attr('content') },
        success: function(r) {
            if (r.status == 1) {
                document.getElementById('row-' + id).remove();
                toastr.success('Silindi');
            }
        },
        error: function() { toastr.error('Xəta baş verdi'); }
    });
}
</script>
@endpush
