@extends('back.layouts.master')
@section('title', 'Ziyarətçilər')

@section('content')

{{-- Stat cards --}}
<div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
    @foreach([
        ['Bu gün',     $todayCount,     'bg-indigo-50', 'text-indigo-600', 'bg-indigo-100'],
        ['Dünən',      $yesterdayCount, 'bg-violet-50', 'text-violet-600', 'bg-violet-100'],
        ['Son 7 gün',  $weekCount,      'bg-blue-50',   'text-blue-600',   'bg-blue-100'],
        ['Son 30 gün', $monthCount,     'bg-cyan-50',   'text-cyan-600',   'bg-cyan-100'],
        ['Cəmi',       $totalCount,     'bg-green-50',  'text-green-600',  'bg-green-100'],
    ] as [$label, $count, $cardBg, $textColor, $iconBg])
    <div class="rounded-xl border border-gray-200 p-5 {{ $cardBg }}">
        <div class="text-3xl font-bold text-gray-900 mb-1">{{ number_format($count) }}</div>
        <div class="text-sm {{ $textColor }} font-medium">{{ $label }}</div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

    {{-- 30-day chart --}}
    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Son 30 Gün — Unikal Ziyarətçi</h2>
        <canvas id="visitorChart" height="100"></canvas>
    </div>

    {{-- Device breakdown --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Cihaz növü (ümumi)</h2>
        <canvas id="deviceChart" height="200"></canvas>
        <div class="mt-4 space-y-2">
            @php
                $deviceLabels = ['desktop'=>'Kompüter','mobile'=>'Mobil','tablet'=>'Tablet'];
                $deviceColors = ['desktop'=>'bg-indigo-400','mobile'=>'bg-violet-400','tablet'=>'bg-cyan-400'];
            @endphp
            @foreach($devices as $key => $d)
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full {{ $deviceColors[$key] ?? 'bg-gray-300' }}"></span>
                    <span class="text-gray-600">{{ $deviceLabels[$key] ?? $key }}</span>
                </div>
                <span class="font-semibold text-gray-900">{{ $d->total }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

    {{-- Top pages --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Ən çox baxılan səhifələr (son 30 gün)</h2>
        <div class="space-y-2">
            @forelse($topPages as $page)
            <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50 last:border-0">
                <span class="text-gray-600 truncate max-w-xs" title="{{ $page->url }}">
                    {{ parse_url($page->url, PHP_URL_PATH) ?: '/' }}
                </span>
                <span class="font-semibold text-indigo-600 shrink-0 ml-2">{{ $page->hits }}</span>
            </div>
            @empty
            <p class="text-gray-400 text-sm">Hələlik məlumat yoxdur</p>
            @endforelse
        </div>
    </div>

    {{-- Recent visitors --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-semibold text-gray-900 mb-4">Son ziyarətçilər</h2>
        <div class="overflow-y-auto max-h-80">
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-100">
                        <th class="text-left pb-2 font-medium">IP</th>
                        <th class="text-left pb-2 font-medium">Cihaz</th>
                        <th class="text-left pb-2 font-medium">Tarix</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recent as $v)
                    <tr class="border-b border-gray-50 last:border-0">
                        <td class="py-1.5 text-gray-700 font-mono">{{ $v->ip }}</td>
                        <td class="py-1.5">
                            @if($v->device === 'mobile')
                            <span class="text-violet-500"><i class="fa fa-mobile-alt"></i> Mobil</span>
                            @elseif($v->device === 'tablet')
                            <span class="text-cyan-500"><i class="fa fa-tablet-alt"></i> Tablet</span>
                            @else
                            <span class="text-indigo-500"><i class="fa fa-desktop"></i> Kompüter</span>
                            @endif
                        </td>
                        <td class="py-1.5 text-gray-400">{{ \Carbon\Carbon::parse($v->created_at)->format('d.m H:i') }}</td>
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
const chartLabels = @json(array_column($chartData, 'date'));
const chartCounts = @json(array_column($chartData, 'count'));

// Line chart
new Chart(document.getElementById('visitorChart'), {
    type: 'line',
    data: {
        labels: chartLabels,
        datasets: [{
            label: 'Ziyarətçi',
            data: chartCounts,
            borderColor: '#6366f1',
            backgroundColor: 'rgba(99,102,241,0.08)',
            fill: true,
            tension: 0.4,
            pointRadius: 3,
            pointBackgroundColor: '#6366f1',
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

// Doughnut chart
const deviceData = @json($devices->values()->pluck('total'));
const deviceKeys  = @json($devices->keys());
const deviceNameMap = { desktop: 'Kompüter', mobile: 'Mobil', tablet: 'Tablet' };
new Chart(document.getElementById('deviceChart'), {
    type: 'doughnut',
    data: {
        labels: deviceKeys.map(k => deviceNameMap[k] || k),
        datasets: [{
            data: deviceData,
            backgroundColor: ['#818cf8', '#a78bfa', '#67e8f9'],
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
