@extends('back.layouts.master')

@section('title', 'Komanda')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Komanda</h1>
        <p class="text-sm text-gray-500 mt-0.5">Sürükleyərək sıralayın</p>
    </div>
    <a href="{{ route('team.create') }}" class="btn-primary">
        <i class="fa fa-plus"></i>
        Üzv Əlavə Et
    </a>
</div>

@if(session('status'))
<div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">{{ session('status') }}</div>
@endif

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="admin-table w-full">
        <thead>
            <tr>
                <th class="w-10"></th>
                <th>Profil</th>
                <th>Ad Soyad</th>
                <th>Vəzifə</th>
                <th class="text-right">Əməliyyat</th>
            </tr>
        </thead>
        <tbody id="teamSortable">
            @forelse($works as $work)
            <tr id="team-{{ $work->id }}" class="cursor-grab active:cursor-grabbing">
                <td class="text-gray-300 text-center">
                    <i class="fa fa-grip-vertical"></i>
                </td>
                <td>
                    <img src="{{ asset($work->src) }}" class="w-12 h-12 object-cover rounded-full" alt="{{ $work->full_name }}">
                </td>
                <td class="font-medium text-gray-900">{{ $work->full_name }}</td>
                <td>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">{{ $work->professional }}</span>
                </td>
                <td class="text-right">
                    <div class="btn-group justify-end">
                        <a href="{{ route('team.edit', $work->id) }}" class="btn-primary btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{ route('team.destroy', $work->id) }}" method="POST" onsubmit="return confirm('Silmək istədiyinizdən əminsiniz?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center text-gray-400 py-8">Üzv tapılmadı</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
$(function () {
    $('#teamSortable').sortable({
        handle: 'td:first-child',
        placeholder: 'bg-indigo-50 opacity-60',
        axis: 'y',
        update: function () {
            var ids = [];
            $('#teamSortable tr').each(function () {
                var id = $(this).attr('id');
                if (id) ids.push(id.replace('team-', ''));
            });
            $.post('{{ route("team.reorder") }}', { ids: ids }, function () {
                toastr.success('Sıra yeniləndi');
            });
        }
    });
});
</script>
@endpush
