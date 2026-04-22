@extends('back.layouts.master')
@section('title', 'Briflər')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Briflər / Sifarişlər</h1>
        <p class="text-sm text-gray-500 mt-0.5">Sifariş formaları vasitəsilə daxil olan müraciətlər</p>
    </div>
    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200">
        {{ $total }} müraciət
    </span>
</div>

@php
$typeColors = [
    'web'    => 'bg-blue-100 text-blue-700',
    'logo'   => 'bg-purple-100 text-purple-700',
    'naming' => 'bg-orange-100 text-orange-700',
    'smm'    => 'bg-pink-100 text-pink-700',
    'seo'    => 'bg-green-100 text-green-700',
];
@endphp

{{-- Tabs --}}
<div x-data="{ tab: '{{ array_key_first($brifs) }}' }">
    <div class="flex gap-1 mb-4 bg-gray-100 rounded-xl p-1 w-fit">
        @foreach($brifs as $key => $group)
        <button @click="tab='{{ $key }}'"
                :class="tab==='{{ $key }}' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
            {{ $group['label'] }}
            <span class="ml-1 text-xs {{ $typeColors[$key] ?? '' }} px-1.5 py-0.5 rounded-full">{{ count($group['rows']) }}</span>
        </button>
        @endforeach
    </div>

    @foreach($brifs as $key => $group)
    <div x-show="tab==='{{ $key }}'" x-transition>
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <table class="admin-table w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Şirkət</th>
                        <th>Ad Soyad</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Tarix</th>
                        <th class="text-right">Əməliyyat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($group['rows'] as $row)
                    <tr id="brif-row-{{ $key }}-{{ $row->id }}">
                        <td class="text-gray-400 text-xs">{{ $row->id }}</td>
                        <td class="font-medium text-gray-900">{{ $row->sirketadi }}</td>
                        <td class="text-gray-700">{{ $row->ad }}</td>
                        <td>
                            <a href="tel:{{ $row->telefon }}" class="text-indigo-600 hover:underline text-sm">{{ $row->telefon }}</a>
                        </td>
                        <td>
                            <a href="mailto:{{ $row->email }}" class="text-indigo-600 hover:underline text-sm">{{ $row->email }}</a>
                        </td>
                        <td class="text-gray-400 text-xs whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($row->created_at)->format('d.m.Y H:i') }}
                        </td>
                        <td class="text-right">
                            <div class="btn-group justify-end">
                                <a href="/admin/brifs/{{ $key }}/{{ $row->id }}" class="btn-primary btn-sm" title="Ətraflı">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button onclick="deleteBrif('{{ $key }}', {{ $row->id }})" class="btn-danger btn-sm" title="Sil">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-sm">Hələlik brif yoxdur</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('scripts')
<script>
function deleteBrif(type, id) {
    if (!confirm('Silmək istədiyinizdən əminsiniz?')) return;
    $.ajax({
        url: '/admin/delete-brif',
        type: 'POST',
        data: { type: type, id: id, _token: $('meta[name="csrf-token"]').attr('content') },
        success: function(r) {
            if (r.status == 1) {
                document.getElementById('brif-row-' + type + '-' + id).remove();
                toastr.success('Silindi');
            }
        },
        error: function() { toastr.error('Xəta baş verdi'); }
    });
}
</script>
@endpush
