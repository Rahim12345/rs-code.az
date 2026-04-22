@extends('back.layouts.master')
@section('title', 'Məhsullar')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Məhsullar</h1>
        <p class="text-sm text-gray-500 mt-0.5">{{ $products->total() }} məhsul tapıldı</p>
    </div>
    <a href="{{ route('product.create') }}" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Məhsul Əlavə Et
    </a>
</div>

{{-- Filter bar --}}
<form method="GET" action="{{ route('product.index') }}" class="mb-5">
    <div class="bg-white rounded-xl border border-gray-200 p-4 flex flex-wrap items-end gap-3">
        <div class="flex-1 min-w-48">
            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Axtarış</label>
            <div class="relative">
                <i class="fa fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" name="q" value="{{ request('q') }}"
                       class="admin-input pl-9" placeholder="Başlıq, SKU...">
            </div>
        </div>
        <div class="w-48">
            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Xidmət</label>
            <select name="service_id" class="admin-input">
                <option value="">Hamısı</option>
                @foreach($services as $s)
                <option value="{{ $s->id }}" {{ request('service_id') == $s->id ? 'selected' : '' }}>{{ $s->name_az }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-36">
            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Status</label>
            <select name="status" class="admin-input">
                <option value="">Hamısı</option>
                <option value="1" {{ request('status')==='1' ? 'selected' : '' }}>Aktiv</option>
                <option value="0" {{ request('status')==='0' ? 'selected' : '' }}>Deaktiv</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn-primary">
                <i class="fa fa-filter"></i> Filtrə et
            </button>
            @if(request()->hasAny(['q','service_id','status']))
            <a href="{{ route('product.index') }}" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fa fa-times"></i> Sıfırla
            </a>
            @endif
        </div>
    </div>
</form>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="admin-table w-full">
        <thead>
            <tr>
                <th class="w-8"></th>
                <th class="w-12">Şəkil</th>
                <th>Məhsul</th>
                <th class="hidden md:table-cell">Kateqoriya</th>
                <th class="hidden lg:table-cell">Qiymət / Stok</th>
                <th class="w-16 text-center">Status</th>
                <th class="w-20 text-right"></th>
            </tr>
        </thead>
        <tbody id="productsList">
            @forelse($products as $product)
            <tr id="row-{{ $product->id }}" data-id="{{ $product->id }}">
                <td class="cursor-grab text-gray-300 hover:text-gray-500 text-center drag-handle">
                    <i class="fa fa-grip-vertical"></i>
                </td>
                <td>
                    @if($product->src)
                    <img src="{{ asset('files/products/covers/'.$product->src) }}"
                         class="w-10 h-9 object-cover rounded-lg" alt="">
                    @else
                    <div class="w-10 h-9 rounded-lg bg-gray-100 flex items-center justify-center text-gray-300">
                        <i class="fa fa-image"></i>
                    </div>
                    @endif
                </td>
                <td>
                    <div class="font-medium text-gray-900 text-sm leading-tight">{{ Str::limit($product->title_az, 40) }}</div>
                    @if($product->sku)
                    <div class="text-xs text-gray-400 font-mono mt-0.5">{{ $product->sku }}</div>
                    @endif
                </td>
                <td class="hidden md:table-cell">
                    @if($product->service)
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 whitespace-nowrap">
                        {{ Str::limit($product->service->name_az, 20) }}
                    </span>
                    @else<span class="text-gray-400">—</span>@endif
                </td>
                <td class="hidden lg:table-cell">
                    @if($product->price)
                    <div class="text-sm font-semibold text-gray-900 whitespace-nowrap">{{ number_format($product->price, 2) }} ₼</div>
                    @if($product->price_old)<div class="text-xs text-gray-400 line-through">{{ number_format($product->price_old, 2) }} ₼</div>@endif
                    @else<span class="text-gray-400 text-xs">—</span>@endif
                    @if($product->stock !== null)
                    <div class="text-xs {{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }} mt-0.5">
                        {{ $product->stock > 0 ? $product->stock.' '.($product->unit ?: 'əd') : 'Stokda yox' }}
                    </div>
                    @endif
                </td>
                <td class="text-center">
                    <span class="inline-flex w-2 h-2 rounded-full {{ $product->status ? 'bg-green-500' : 'bg-red-400' }}" title="{{ $product->status ? 'Aktiv' : 'Deaktiv' }}"></span>
                    @if($product->featured)
                    <i class="fa fa-star text-amber-400 text-xs ml-1" title="Öne çıxan"></i>
                    @endif
                </td>
                <td class="text-right">
                    <div class="btn-group justify-end">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn-primary btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>
                        <button onclick="deleteProduct({{ $product->id }})" class="btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-gray-400 py-12">
                    <i class="fa fa-box-open text-3xl mb-3 block text-gray-200"></i>
                    Məhsul tapılmadı
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($products->hasPages())
<div class="mt-5">
    {{ $products->links() }}
</div>
@endif

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const list = document.getElementById('productsList');
    if (!list) return;
    Sortable.create(list, {
        handle: '.drag-handle',
        animation: 150,
        ghostClass: 'bg-indigo-50',
        onEnd: function () {
            const ids = Array.from(list.querySelectorAll('tr[data-id]')).map(r => r.dataset.id);
            $.post('{{ route("product.reorder") }}', {
                ids: ids,
                _token: $('meta[name="csrf-token"]').attr('content')
            }).done(r => toastr.success(r.message))
              .fail(() => toastr.error('Xəta baş verdi'));
        }
    });
});

function deleteProduct(id) {
    if (!confirm('Silinsin?')) return;
    $.ajax({
        url: '/admin/product/' + id,
        type: 'DELETE',
        data: { _token: $('meta[name="csrf-token"]').attr('content') },
        success: function (r) {
            document.getElementById('row-' + id).remove();
            toastr.success(r.message);
        },
        error: function () { toastr.error('Xəta baş verdi'); }
    });
}
</script>
@endpush
