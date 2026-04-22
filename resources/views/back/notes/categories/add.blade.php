@extends('back.layouts.master')
@section('title', 'Yeni Kateqoriya')

@section('content')

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="/admin/note-categories" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Yeni Kateqoriya</h1>
            <p class="text-xs text-gray-400 mt-0.5">Qeyd kateqoriyası əlavə edin</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <a href="/admin/note-categories" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Ləğv et</a>
        <button id="submitBtn" type="button" onclick="submitForm()" class="btn-primary shadow-lg shadow-indigo-100">
            <i class="fa fa-check"></i> Yadda saxla
        </button>
    </div>
</div>

<div class="max-w-xl">
    <form id="catForm" action="/admin/note-categories" method="POST">
        @csrf
        <div class="form-card form-card-body space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Ad (AZ) *</label>
                <input type="text" name="name_az" id="name_az" class="admin-input" placeholder="Kateqoriya adı (AZ)">
                <p id="err-name_az" class="hidden mt-1 text-xs text-red-500"></p>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Ad (EN) *</label>
                <input type="text" name="name_en" id="name_en" class="admin-input" placeholder="Category name (EN)">
                <p id="err-name_en" class="hidden mt-1 text-xs text-red-500"></p>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
function submitForm() {
    document.querySelectorAll('[id^="err-"]').forEach(el => { el.classList.add('hidden'); el.textContent = ''; });
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Göndərilir...';
    $.ajax({
        type: 'POST', url: '/admin/note-categories',
        data: new FormData(document.getElementById('catForm')),
        processData: false, contentType: false,
        success: function(r) {
            toastr.success(r.message);
            setTimeout(() => window.location.href = '/admin/note-categories', 1000);
        },
        error: function(xhr) {
            btn.disabled = false; btn.innerHTML = '<i class="fa fa-check"></i> Yadda saxla';
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                Object.entries(xhr.responseJSON.errors).forEach(([f, msgs]) => {
                    const el = document.getElementById('err-' + f);
                    if (el) { el.textContent = msgs[0]; el.classList.remove('hidden'); }
                });
            } else { toastr.error('Xəta baş verdi'); }
        }
    });
}
</script>
@endpush

@endsection
