@extends('back.layouts.master')
@section('title', 'Qeydlər')
@section('breadcrumb', 'Admin / Qeydlər')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-lg font-semibold text-gray-900">Qeydlər</h2>
        <p class="text-sm text-gray-500 mt-0.5">{{ $notes->total() }} qeyd</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="/admin/note-categories" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            Kateqoriyalar
        </a>
        <a href="/admin/notes/create" class="btn-primary inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Yeni qeyd
        </a>
    </div>
</div>

{{-- Filters --}}
<form method="GET" action="/admin/notes" class="flex flex-wrap gap-3 mb-5">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Axtarış..." class="admin-input w-56 py-2 text-sm">
    <select name="category" class="admin-input w-48 py-2 text-sm">
        <option value="">Bütün kateqoriyalar</option>
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name_az }}</option>
        @endforeach
    </select>
    <button type="submit" class="px-4 py-2 text-sm font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">Axtar</button>
    @if(request('search') || request('category'))
    <a href="/admin/notes" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Sıfırla</a>
    @endif
</form>

<div class="admin-card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-12">#</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Başlıq</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Kateqoriya</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Tarix</th>
                    <th class="px-4 py-3 w-28"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($notes as $note)
                <tr id="row-{{ $note->id }}" class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 text-gray-400 text-xs">{{ $note->id }}</td>
                    <td class="px-4 py-3">
                        <div class="font-medium text-gray-900 line-clamp-1">{{ $note->title_az ?: $note->title_en }}</div>
                        @if($note->title_az && $note->title_en)
                        <div class="text-xs text-gray-400 line-clamp-1 mt-0.5">{{ $note->title_en }}</div>
                        @endif
                    </td>
                    <td class="px-4 py-3 hidden md:table-cell">
                        @if($note->category)
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                            {{ $note->category->name_az }}
                        </span>
                        @else
                        <span class="text-gray-300 text-xs">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-500 text-xs hidden lg:table-cell">{{ $note->created_at?->format('d.m.Y') }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="btn-group justify-end">
                            <a href="/admin/notes/{{ $note->id }}/edit" class="btn-primary btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>
                            <button onclick="deleteNote({{ $note->id }})" class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-12 text-center text-gray-400 text-sm">
                        Hələlik heç bir qeyd yoxdur
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($notes->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">
        {{ $notes->links() }}
    </div>
    @endif
</div>

@push('scripts')
<script>
function deleteNote(id) {
    if (!confirm('Bu qeydi silmək istədiyinizə əminsiniz?')) return;
    $.post('/admin/notes/delete', { id: id, _token: $('meta[name="csrf-token"]').attr('content') }, function(r) {
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
