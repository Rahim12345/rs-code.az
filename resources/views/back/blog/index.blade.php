@extends('back.layouts.master')
@section('title', 'Blog yazıları')
@section('breadcrumb', 'Admin / Blog')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-lg font-semibold text-gray-900">Blog yazıları</h2>
        <p class="text-sm text-gray-500 mt-0.5">{{ $blogs->count() }} yazı</p>
    </div>
    <a href="/admin/add-blog" class="btn-primary inline-flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Yeni blog
    </a>
</div>

<div class="admin-card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-12">#</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Başlıq</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Xülasə</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Tarix</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Baxış</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-20">Foto</th>
                    <th class="px-4 py-3 w-28"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($blogs as $blog)
                <tr id="row-{{ $blog->id }}" class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 text-gray-400 text-xs">{{ $blog->id }}</td>
                    <td class="px-4 py-3">
                        <div class="font-medium text-gray-900 line-clamp-1">{{ $blog->title_az }}</div>
                    </td>
                    <td class="px-4 py-3 text-gray-500 hidden md:table-cell">
                        <div class="line-clamp-1 text-xs">{{ strip_tags(Str::limit($blog->review_az, 80)) }}</div>
                    </td>
                    <td class="px-4 py-3 text-gray-500 text-xs hidden lg:table-cell">{{ $blog->date_az }}</td>
                    <td class="px-4 py-3 hidden lg:table-cell">
                        <span class="inline-flex items-center gap-1 text-xs font-medium {{ ($blog->views ?? 0) > 0 ? 'text-indigo-600' : 'text-gray-400' }}">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            {{ number_format($blog->views ?? 0) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        @php
                            $photo = $blog->photo;
                            $src = ($photo && !str_starts_with($photo,'http')) ? asset('images/blog/'.$photo) : $photo;
                        @endphp
                        @if($src)
                        <img src="{{ $src }}" class="w-10 h-10 rounded-lg object-cover">
                        @else
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/></svg>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="btn-group justify-end">
                            <a href="/admin/edit-blog/{{ $blog->id }}" class="btn-primary btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>
                            <button onclick="deleteBlog({{ $blog->id }})" class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-12 text-center text-gray-400 text-sm">
                        Hələlik heç bir blog yazısı yoxdur
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
function deleteBlog(id) {
    if (!confirm('Bu blog yazısını silmək istədiyinizə əminsiniz?')) return;
    $.post('/admin/delete-blog', { id: id }, function(r) {
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
