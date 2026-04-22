@extends('back.layouts.master')
@section('title', 'Qeyd Kateqoriyaları')
@section('breadcrumb', 'Admin / Qeydlər / Kateqoriyalar')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-lg font-semibold text-gray-900">Qeyd Kateqoriyaları</h2>
        <p class="text-sm text-gray-500 mt-0.5">{{ $categories->count() }} kateqoriya</p>
    </div>
    <a href="/admin/note-categories/create" class="btn-primary inline-flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Yeni kateqoriya
    </a>
</div>

<div class="admin-card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-12">#</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Ad (AZ)</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Ad (EN)</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-24">Qeydlər</th>
                    <th class="px-4 py-3 w-28"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($categories as $cat)
                <tr id="row-{{ $cat->id }}" class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 text-gray-400 text-xs">{{ $cat->id }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $cat->name_az }}</td>
                    <td class="px-4 py-3 text-gray-500 hidden md:table-cell">{{ $cat->name_en }}</td>
                    <td class="px-4 py-3">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                            {{ $cat->notes_count }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="btn-group justify-end">
                            <a href="/admin/note-categories/{{ $cat->id }}/edit" class="btn-primary btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>
                            <button onclick="deleteCategory({{ $cat->id }})" class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-12 text-center text-gray-400 text-sm">
                        Hələlik kateqoriya yoxdur
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
function deleteCategory(id) {
    if (!confirm('Bu kateqoriyanı silmək istədiyinizə əminsiniz?')) return;
    $.post('/admin/note-categories/delete', { id: id, _token: $('meta[name="csrf-token"]').attr('content') }, function(r) {
        if (r.status === 1) {
            $('#row-'+id).fadeOut(300, function(){ $(this).remove(); });
            toastr.success(r.message);
        } else {
            toastr.error(r.message);
        }
    });
}
</script>
@endpush

@endsection
