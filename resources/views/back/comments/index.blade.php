@extends('back.layouts.master')

@section('title', 'Kommentlər')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Kommentlər</h1>
        <p class="text-sm text-gray-500 mt-0.5">Müştəri rəylərini idarə edin</p>
    </div>
</div>

@if(session('success'))
<div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="admin-table w-full">
        <thead>
            <tr>
                <th>Şəkil</th>
                <th>Ad</th>
                <th>Rəy (AZ)</th>
                <th class="text-right">Əməliyyat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($comments as $comment)
            <tr id="row-{{ $comment->id }}">
                <td>
                    @php
                        $src = $comment->photo && str_starts_with($comment->photo, 'http')
                            ? $comment->photo
                            : asset('images/comments/' . $comment->photo);
                    @endphp
                    @if($comment->photo)
                    <img src="{{ $src }}" class="w-12 h-12 object-cover rounded-full" alt="">
                    @else
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-300">
                        <i class="fa fa-user"></i>
                    </div>
                    @endif
                </td>
                <td class="font-medium text-gray-900">{{ $comment->name_az }}</td>
                <td class="text-gray-500 text-sm max-w-xs truncate">{{ Str::limit($comment->comment_az, 80) }}</td>
                <td class="text-right">
                    <div class="btn-group justify-end">
                        <a href="/admin/edit-comment/{{ $comment->id }}" class="btn-primary btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>
                        <button onclick="deleteComment({{ $comment->id }})" class="btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center text-gray-400 py-8">Komment tapılmadı</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
function deleteComment(id) {
    if (!confirm('Silmək istədiyinizdən əminsiniz?')) return;
    $.ajax({
        url: '/admin/delete-comment',
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
