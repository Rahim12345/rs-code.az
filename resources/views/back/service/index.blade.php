@extends('back.layouts.master')

@section('title', 'Xidmətlər')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Xidmətlər</h1>
        <p class="text-sm text-gray-500 mt-0.5">Xidmətləri sürükleyərək sıralayın</p>
    </div>
    <a href="{{ route('services.create') }}" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Xidmət Əlavə Et
    </a>
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="admin-table w-full">
        <thead>
            <tr>
                <th class="w-10"></th>
                <th>Ad (AZ)</th>
                <th>Ad (EN)</th>
                <th>Ad (RU)</th>
                <th>Əsas Səhifə</th>
                <th class="text-right">Əməliyyat</th>
            </tr>
        </thead>
        <tbody id="services" class="cursor-grab"></tbody>
    </table>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        brendLoader();

        function brendLoader() {
            $('#services').html('');
            $.ajax({
                url: '/admin/service-loader',
                type: 'POST',
                data: { action: 'fetch_data' },
                success: function (response) {
                    $('#services').html(response);
                }
            });
        }

        $('tbody').sortable({
            placeholder: 'ui-state-highlight',
            update: function (event, ui) {
                let page_id_array = [];
                $('tbody tr').each(function () {
                    page_id_array.push($(this).attr('id'));
                });
                $.ajax({
                    url: '/admin/service-loader',
                    method: 'POST',
                    data: { page_id_array: page_id_array, action: 'update' },
                    success: function () {
                        toastr.success('Tablo yenidən sıralandı');
                        brendLoader();
                    }
                });
            }
        });
    });
</script>
@endpush
