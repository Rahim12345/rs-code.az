@extends('back.layouts.master')

@section('title', 'Layihələr')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Layihələr</h1>
        <p class="text-sm text-gray-500 mt-0.5">Portfolio proyektlərini idarə edin</p>
    </div>
    <a href="/admin/add-project" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Layihə Əlavə Et
    </a>
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="admin-table w-full">
        <thead>
            <tr>
                <th>Ad (AZ)</th>
                <th>Link</th>
                <th>Kateqoriya</th>
                <th>Şəkil</th>
                <th class="text-center">Ana Səhifə</th>
                <th class="text-right">Əməliyyat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr id="row-{{ $project->id }}">
                <td class="font-medium text-gray-900">{{ $project->name_az ?: $project->name }}</td>
                <td class="text-blue-600 hover:underline">
                    <a href="{{ $project->link }}" target="_blank">{{ Str::limit($project->link, 35) }}</a>
                </td>
                <td>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">{{ $project->kateqoriya }}</span>
                </td>
                <td>
                    @foreach($project->images as $img)
                        @if($loop->first)
                        <img src="/images/projects/{{ $img->photo }}" class="w-16 h-12 object-cover rounded-lg" alt="">
                        @endif
                    @endforeach
                </td>
                <td class="text-center">
                    {{-- Toggle checkbox --}}
                    <button onclick="toggleHome({{ $project->id }}, this)"
                            data-home="{{ $project->home }}"
                            title="{{ $project->home ? 'Ana səhifədə görünür — klik ilə gizlət' : 'Ana səhifədə görünmür — klik ilə göstər' }}"
                            class="relative inline-flex items-center justify-center w-11 h-6 rounded-full transition-colors duration-200 focus:outline-none
                                   {{ $project->home ? 'bg-violet-600' : 'bg-gray-200' }}">
                        <span class="inline-block w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-200
                                     {{ $project->home ? 'translate-x-2.5' : '-translate-x-2.5' }}"></span>
                    </button>
                </td>
                <td class="text-right">
                    <div class="btn-group justify-end">
                        <a href="/admin/edit-project/{{ $project->id }}" class="btn-primary btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>
                        <button onclick="deleteProject({{ $project->id }})" class="btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center text-gray-400 py-8">Layihə tapılmadı</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
function toggleHome(id, btn) {
    $.ajax({
        url: '/admin/toggle-project-home/' + id,
        type: 'POST',
        data: { _token: $('meta[name="csrf-token"]').attr('content') },
        success: function(r) {
            const isHome = r.home == 1;
            // Update toggle colour
            $(btn).toggleClass('bg-violet-600', isHome).toggleClass('bg-gray-200', !isHome);
            // Move knob
            $(btn).find('span').toggleClass('translate-x-2.5', isHome).toggleClass('-translate-x-2.5', !isHome);
            // Update tooltip
            btn.title = isHome
                ? 'Ana səhifədə görünür — klik ilə gizlət'
                : 'Ana səhifədə görünmür — klik ilə göstər';
            toastr.success(isHome ? 'Ana səhifəyə əlavə edildi' : 'Ana səhifədən çıxarıldı');
        },
        error: function() { toastr.error('Xəta baş verdi'); }
    });
}

function deleteProject(id) {
    if (!confirm('Silmək istədiyinizdən əminsiniz?')) return;
    $.ajax({
        url: '/admin/delete-project',
        type: 'POST',
        data: { id: id, _token: $('meta[name="csrf-token"]').attr('content') },
        success: function(r) {
            if (r.status == 1) {
                document.getElementById('row-' + id).remove();
                toastr.success(r.message);
            } else {
                toastr.error(r.message);
            }
        },
        error: function() { toastr.error('Xəta baş verdi'); }
    });
}
</script>
@endpush
