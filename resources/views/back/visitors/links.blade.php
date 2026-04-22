@extends('back.layouts.master')
@section('title', 'Link Klikləri')

@section('content')

{{-- Stat cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([
        ['Bu gün',     $todayCount, 'bg-indigo-50', 'text-indigo-600'],
        ['Son 7 gün',  $weekCount,  'bg-violet-50', 'text-violet-600'],
        ['Son 30 gün', $monthCount, 'bg-blue-50',   'text-blue-600'],
        ['Cəmi',       $totalCount, 'bg-green-50',  'text-green-600'],
    ] as [$label, $count, $cardBg, $textColor])
    <div class="rounded-xl border border-gray-200 p-5 {{ $cardBg }}">
        <div class="text-3xl font-bold text-gray-900 mb-1">{{ number_format($count) }}</div>
        <div class="text-sm {{ $textColor }} font-medium">{{ $label }}</div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

    {{-- 30-day chart --}}
    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Son 30 Gün — Klik sayı</h2>
        <canvas id="clickChart" height="100"></canvas>
    </div>

    {{-- Type breakdown --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Link növü (son 30 gün)</h2>
        <canvas id="typeChart" height="180"></canvas>
        @php
            $typeLabels  = ['internal'=>'Daxili','external'=>'Xarici','phone'=>'Telefon','email'=>'Email'];
            $typeColors  = ['internal'=>'bg-indigo-400','external'=>'bg-violet-400','phone'=>'bg-green-400','email'=>'bg-amber-400'];
        @endphp
        <div class="mt-4 space-y-2">
            @foreach($byType as $key => $row)
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full {{ $typeColors[$key] ?? 'bg-gray-300' }}"></span>
                    <span class="text-gray-600">{{ $typeLabels[$key] ?? $key }}</span>
                </div>
                <span class="font-semibold text-gray-900">{{ $row->total }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

    {{-- Top clicked links --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Ən çox kliklənan linklər (son 30 gün)</h2>
        @php
            $typeIconColors = [
                'internal' => ['fa-link', 'text-indigo-500'],
                'external' => ['fa-external-link-alt', 'text-violet-500'],
                'phone'    => ['fa-phone', 'text-green-500'],
                'email'    => ['fa-envelope', 'text-amber-500'],
            ];
        @endphp
        <div class="space-y-2 max-h-96 overflow-y-auto">
            @forelse($topLinks as $link)
            @php [$ico, $col] = $typeIconColors[$link->type] ?? ['fa-link','text-gray-400']; @endphp
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0 gap-3">
                <div class="flex items-center gap-2 min-w-0">
                    <i class="fa {{ $ico }} {{ $col }} text-xs shrink-0 w-4 text-center"></i>
                    <div class="min-w-0">
                        <div class="text-xs text-gray-700 font-medium truncate max-w-xs" title="{{ $link->href }}">
                            {{ $link->href }}
                        </div>
                        @if($link->text)
                        <div class="text-xs text-gray-400 truncate max-w-xs">{{ $link->text }}</div>
                        @endif
                    </div>
                </div>
                <span class="shrink-0 bg-indigo-50 text-indigo-700 text-xs font-bold px-2 py-0.5 rounded-full">{{ $link->clicks }}</span>
            </div>
            @empty
            <p class="text-gray-400 text-sm">Hələlik məlumat yoxdur</p>
            @endforelse
        </div>
    </div>

    {{-- Top source pages --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Ən aktiv səhifələr (son 30 gün)</h2>
        <div class="space-y-2">
            @forelse($topPages as $pg)
            @php $path = parse_url($pg->page, PHP_URL_PATH) ?: '/'; @endphp
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                <span class="text-sm text-gray-600 truncate max-w-xs" title="{{ $pg->page }}">{{ $path }}</span>
                <span class="shrink-0 bg-violet-50 text-violet-700 text-xs font-bold px-2 py-0.5 rounded-full ml-2">{{ $pg->clicks }}</span>
            </div>
            @empty
            <p class="text-gray-400 text-sm">Hələlik məlumat yoxdur</p>
            @endforelse
        </div>

        {{-- Recent feed --}}
        <h2 class="text-sm font-semibold text-gray-900 mt-6 mb-3">Son kliklar</h2>
        <div class="overflow-y-auto max-h-56">
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-100">
                        <th class="text-left pb-2 font-medium">Link</th>
                        <th class="text-left pb-2 font-medium">Növ</th>
                        <th class="text-left pb-2 font-medium">Vaxt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recent as $r)
                    @php [$ico2, $col2] = $typeIconColors[$r->type] ?? ['fa-link','text-gray-400']; @endphp
                    <tr class="border-b border-gray-50 last:border-0">
                        <td class="py-1.5 text-gray-700 truncate max-w-[160px]" title="{{ $r->href }}">
                            {{ Str::limit($r->href, 35) }}
                        </td>
                        <td class="py-1.5"><i class="fa {{ $ico2 }} {{ $col2 }}"></i></td>
                        <td class="py-1.5 text-gray-400 whitespace-nowrap">{{ \Carbon\Carbon::parse($r->created_at)->format('d.m H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
@endpush

@push('scripts')
<script>
const clickLabels = @json(array_column($chartData, 'date'));
const clickCounts = @json(array_column($chartData, 'count'));

new Chart(document.getElementById('clickChart'), {
    type: 'bar',
    data: {
        labels: clickLabels,
        datasets: [{
            label: 'Klik',
            data: clickCounts,
            backgroundColor: 'rgba(99,102,241,0.7)',
            borderRadius: 4,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 } },
            x: { grid: { display: false } }
        }
    }
});

@php
    $typeNameMap = ['internal'=>'Daxili','external'=>'Xarici','phone'=>'Telefon','email'=>'Email'];
    $typeLabelsMapped = $byType->keys()->map(fn($k) => $typeNameMap[$k] ?? $k)->values();
    $typeDataMapped   = $byType->values()->pluck('total')->values();
@endphp
const typeLabels = @json($typeLabelsMapped);
const typeData   = @json($typeDataMapped);
new Chart(document.getElementById('typeChart'), {
    type: 'doughnut',
    data: {
        labels: typeLabels,
        datasets: [{
            data: typeData,
            backgroundColor: ['#818cf8','#a78bfa','#4ade80','#fbbf24'],
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        cutout: '65%',
    }
});
</script>
@endpush
