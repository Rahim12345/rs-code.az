@extends('back.layouts.master')
@section('title', $type_label . ' Brifi — ' . ($record->{$prefix.'sirketadi'} ?? ($record->sirketadi ?? '')))

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="/admin/brifs" class="flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Geri
    </a>
    <h1 class="text-xl font-bold text-gray-900">{{ $type_label }} Brifi — Detallar</h1>
</div>

<div class="max-w-3xl">
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <span class="text-sm font-semibold text-gray-700">Brif #{{ $record->id }}</span>
            <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($record->created_at)->format('d.m.Y H:i') }}</span>
        </div>

        <div class="p-6 space-y-5">

            {{-- Common contact fields --}}
            @php
                $p = $prefix;
                $sirket  = $record->{$p.'sirketadi'} ?? ($record->sirketadi ?? null);
                $ad      = $record->{$p.'ad'}        ?? ($record->ad        ?? null);
                $vezife  = $record->{$p.'vezife'}    ?? ($record->vezife    ?? null);
                $telefon = $record->{$p.'telefon'}   ?? ($record->telefon   ?? null);
                $email   = $record->{$p.'email'}     ?? ($record->email     ?? null);
                $vaxt    = $record->{$p.'vaxt'}      ?? ($record->vaxt      ?? null);
            @endphp

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Şirkət Adı</p>
                    <p class="text-gray-900 font-semibold">{{ $sirket ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Ad Soyad</p>
                    <p class="text-gray-900 font-semibold">{{ $ad ?? '—' }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Vəzifə</p>
                    <p class="text-gray-700">{{ $vezife ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Vaxt (nə vaxt lazımdır)</p>
                    <p class="text-gray-700">{{ $vaxt ?? '—' }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Telefon</p>
                    <a href="tel:{{ $telefon }}" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ $telefon ?? '—' }}
                    </a>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Email</p>
                    <a href="mailto:{{ $email }}" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ $email ?? '—' }}
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-5">

                {{-- Web brif specific --}}
                @if($type === 'web')
                @php $p = 'web_'; @endphp
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Fəaliyyət Sahəsi</p>
                        <p class="text-gray-700">{{ $record->{$p.'fealiyyetsahesi'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Perspektiv</p>
                        <p class="text-gray-700">{{ $record->{$p.'prespektiv'} ?? '—' }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Menyu</p>
                        <p class="text-gray-700">{{ $record->{$p.'menu'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Logotip</p>
                        <p class="text-gray-700">{{ $record->{$p.'logotip'} ?? '—' }}</p>
                    </div>
                </div>
                @foreach(['imkanlar1','imkanlar2','imkanlar3','imkanlar4','imkanlar5'] as $i => $col)
                    @if($record->{$p.$col})
                    <div class="mb-3">
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">İmkanlar {{ $i+1 }}</p>
                        <p class="text-gray-700 bg-gray-50 rounded-lg px-4 py-2 text-sm">{{ $record->{$p.$col} }}</p>
                    </div>
                    @endif
                @endforeach
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">AZ dil</p>
                        <p class="text-gray-700">{{ $record->{$p.'az'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">EN dil</p>
                        <p class="text-gray-700">{{ $record->{$p.'en'} ?? '—' }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">RU dil</p>
                    <p class="text-gray-700">{{ $record->{$p.'ru'} ?? '—' }}</p>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Rəqiblər</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'reqibler'} ?? '—' }}</div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Firma Stili (digər)</p>
                    <p class="text-gray-700">{{ $record->{$p.'firmastilidiger'} ?? '—' }}</p>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Göstəriş Saiti (digər)</p>
                    <p class="text-gray-700">{{ $record->{$p.'gosterisvesaitidiger'} ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Qeydlər</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'qeydler'} ?? '—' }}</div>
                </div>

                {{-- Logo brif specific --}}
                @elseif($type === 'logo')
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Mövcud Loqotip</p>
                        <p class="text-gray-700">{{ $record->movcudlogo ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Loqotip Növü</p>
                        <p class="text-gray-700">{{ $record->logotip ?? '—' }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Fəaliyyət Sahəsi</p>
                        <p class="text-gray-700">{{ $record->fealiyyetsahesi ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Fəaliyyət Dairəsi</p>
                        <p class="text-gray-700">{{ $record->fealiyyetdairesi ?? '—' }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Perspektiv</p>
                        <p class="text-gray-700">{{ $record->prespektiv ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Rəng</p>
                        <p class="text-gray-700">{{ $record->reng ?? '—' }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Loqotip Vacibliyi</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->logotipvacibliyi ?? '—' }}</div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Loqotip Seçimi (sayı)</p>
                    <p class="text-gray-700">{{ $record->logotipsecimi ?? '—' }}</p>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Rəqiblər</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->reqibler ?? '—' }}</div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Digər</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->diger ?? '—' }}</div>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Başqa Arzu</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->basqaarzu ?? '—' }}</div>
                </div>

                {{-- Naming brif specific --}}
                @elseif($type === 'naming')
                @php $p = 'adlandirma_'; @endphp
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Seqment</p>
                        <p class="text-gray-700">{{ $record->{$p.'seqment'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Hədəf</p>
                        <p class="text-gray-700">{{ $record->{$p.'hedef'} ?? '—' }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Xarici Dil</p>
                        <p class="text-gray-700">{{ $record->{$p.'xaricidil'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Sözlərin Sayı</p>
                        <p class="text-gray-700">{{ $record->{$p.'sozlerinsayi'} ?? '—' }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Uğurlu Adlar (nümunə)</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'ugurluadlar'} ?? '—' }}</div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Təəssürat</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'teessurat'} ?? '—' }}</div>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Əlavə İstək</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'elaveistek'} ?? '—' }}</div>
                </div>

                {{-- SMM brif specific --}}
                @elseif($type === 'smm')
                @php $p = 'smm_'; @endphp
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Sirkət Sahəsi</p>
                        <p class="text-gray-700">{{ $record->{$p.'sirketsahesi'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Aylıq Post</p>
                        <p class="text-gray-700">{{ $record->{$p.'ayligpost'} ?? '—' }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Şirkət Haqqında</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'sirkethaqqinda'} ?? '—' }}</div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Göstəriş (web)</p>
                    <p class="text-gray-700">{{ $record->web_gosteris ?? '—' }}</p>
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Gözlənti</p>
                        <p class="text-gray-700">{{ $record->{$p.'gozlenti'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Aylıq Büdcə</p>
                        <p class="text-gray-700">{{ $record->{$p.'ayligbudce'} ?? '—' }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Rəqiblər</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'reqibler'} ?? '—' }}</div>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Cavablandırma</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'cavablandirma'} ?? '—' }}</div>
                </div>

                {{-- SEO brif specific --}}
                @elseif($type === 'seo')
                @php $p = 'seo_'; @endphp
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Şirkət Sahəsi</p>
                        <p class="text-gray-700">{{ $record->{$p.'sirketsahesi'} ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Veb Sayt</p>
                        @if($record->{$p.'vebsayt'})
                        <a href="{{ $record->{$p.'vebsayt'} }}" target="_blank" class="text-indigo-600 hover:underline text-sm">{{ $record->{$p.'vebsayt'} }}</a>
                        @else
                        <p class="text-gray-700">—</p>
                        @endif
                    </div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Şirkət Haqqında</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'sirkethaqqinda'} ?? '—' }}</div>
                </div>
                <div class="mb-5">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Açar Sözlər</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm whitespace-pre-wrap">{{ $record->{$p.'acarsozler'} ?? '—' }}</div>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Büdcə</p>
                    <p class="text-gray-700">{{ $record->{$p.'budce'} ?? '—' }}</p>
                </div>
                @endif

            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-100">
                <a href="mailto:{{ $email }}" class="btn-primary btn-sm">
                    <i class="fa fa-reply"></i>
                    Cavabla
                </a>
                <button onclick="deleteBrifAndBack('{{ $type }}', {{ $record->id }})" class="btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                    Sil
                </button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteBrifAndBack(type, id) {
    if (!confirm('Silmək istədiyinizdən əminsiniz?')) return;
    $.ajax({
        url: '/admin/delete-brif',
        type: 'POST',
        data: { type: type, id: id, _token: $('meta[name="csrf-token"]').attr('content') },
        success: function(r) {
            if (r.status == 1) {
                toastr.success('Silindi');
                setTimeout(() => window.location.href = '/admin/brifs', 800);
            }
        },
        error: function() { toastr.error('Xəta baş verdi'); }
    });
}
</script>
@endpush
