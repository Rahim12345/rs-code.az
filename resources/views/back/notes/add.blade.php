@extends('back.layouts.master')
@section('title', 'Yeni Qeyd')

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor/ckeditor.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism-tomorrow.min.css">
<style>
/* Override Prism inside CKEditor editable */
.ck-content pre[class*="language-"],
.ck-content pre {
    background: #1e1e2e !important;
    border: 1px solid #3f3f5a !important;
    border-radius: 8px !important;
    padding: 1rem 1.25rem !important;
    overflow-x: auto !important;
    margin: 0.75rem 0 !important;
}
.ck-content pre code[class*="language-"],
.ck-content pre code {
    background: none !important;
    font-family: 'Fira Code', 'Cascadia Code', 'JetBrains Mono', 'Consolas', monospace !important;
    font-size: 0.84em !important;
    line-height: 1.7 !important;
    white-space: pre !important;
    text-shadow: none !important;
}
/* Inline code */
.ck-content code:not(pre > code) {
    background: rgba(139,92,246,.15) !important;
    color: #c4b5fd !important;
    padding: 0.15em 0.4em !important;
    border-radius: 4px !important;
    font-family: 'Fira Code', 'Consolas', monospace !important;
    font-size: 0.85em !important;
}
/* Prism token colors inside editor */
.ck-content .token.comment,.ck-content .token.prolog,.ck-content .token.doctype,.ck-content .token.cdata { color: #6272a4; }
.ck-content .token.keyword { color: #ff79c6; }
.ck-content .token.string,.ck-content .token.attr-value { color: #f1fa8c; }
.ck-content .token.function { color: #50fa7b; }
.ck-content .token.number { color: #bd93f9; }
.ck-content .token.boolean,.ck-content .token.null { color: #bd93f9; }
.ck-content .token.operator { color: #ff79c6; }
.ck-content .token.class-name,.ck-content .token.tag { color: #8be9fd; }
.ck-content .token.attr-name { color: #50fa7b; }
.ck-content .token.variable { color: #f8f8f2; }
.ck-content .token.property { color: #66d9ef; }
.ck-content .token.punctuation { color: #f8f8f2; }
</style>
@endpush

@section('content')
<div x-data="{ lang: 'az' }">

<div class="flex items-center justify-between mb-7">
    <div class="flex items-center gap-3">
        <a href="/admin/notes" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-gray-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm text-gray-500">
            <i class="fa fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-900">Yeni Qeyd</h1>
            <p class="text-xs text-gray-400 mt-0.5">Kodlaşdırma qeydi əlavə edin</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <a href="/admin/notes" class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Ləğv et</a>
        <button id="submitBtn" type="button" onclick="submitNote()" class="btn-primary shadow-lg shadow-indigo-100">
            <i class="fa fa-check"></i> Yadda saxla
        </button>
    </div>
</div>

<form id="noteForm" action="/admin/notes" method="POST">
@csrf
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-5">

        {{-- Dil tabları --}}
        <div class="form-card">
            <div class="flex border-b border-gray-100">
                @foreach([['az','AZ','indigo'],['en','EN','blue']] as [$l,$lbl,$c])
                <button type="button" @click="lang='{{ $l }}'"
                    :class="lang==='{{ $l }}' ? 'text-{{ $c }}-600 border-b-2 border-{{ $c }}-500 bg-{{ $c }}-50/40' : 'text-gray-400 hover:text-gray-600'"
                    class="flex-1 py-3.5 text-sm font-semibold transition-all flex items-center justify-center gap-2">
                    <span class="w-5 h-5 rounded text-[10px] font-bold flex items-center justify-center"
                          :class="lang==='{{ $l }}' ? 'bg-{{ $c }}-100 text-{{ $c }}-700' : 'bg-gray-100 text-gray-500'">{{ $lbl }}</span>
                    @if($l==='az') Azərbaycanca @else English @endif
                </button>
                @endforeach
            </div>

            <div class="p-6 space-y-4">
                <div x-show="lang==='az'" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Başlıq *</label>
                        <input type="text" name="title_az" id="title_az" class="admin-input" placeholder="Qeydin başlığı (AZ)">
                        <p id="err-title_az" class="hidden mt-1 text-xs text-red-500"></p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Məzmun *</label>
                        <textarea name="body_az" id="body_az" rows="16" class="admin-input resize-none"></textarea>
                        <p id="err-body_az" class="hidden mt-1 text-xs text-red-500"></p>
                    </div>
                </div>

                <div x-show="lang==='en'" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="title_en" id="title_en" class="admin-input" placeholder="Note title (EN)">
                        <p id="err-title_en" class="hidden mt-1 text-xs text-red-500"></p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Content</label>
                        <textarea name="body_en" id="body_en" rows="16" class="admin-input resize-none"></textarea>
                        <p id="err-body_en" class="hidden mt-1 text-xs text-red-500"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="space-y-5">
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-tag text-gray-300"></i> Kateqoriya</div>
            <select name="note_category_id" class="admin-input">
                <option value="">— Kateqoriya seçin —</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name_az }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
</form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
Prism.plugins.autoloader.languages_path = 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/components/';

const _editors = {};
const _ckConfig = {
    toolbar: {
        items: [
            'heading', '|',
            'bold', 'italic', 'code', '|',
            'link', 'blockQuote', 'codeBlock', '|',
            'bulletedList', 'numberedList', '|',
            'insertTable', '|',
            'undo', 'redo'
        ]
    },
    codeBlock: {
        languages: [
            { language: 'plaintext',   label: 'Plain text',  class: '' },
            { language: 'php',         label: 'PHP' },
            { language: 'javascript',  label: 'JavaScript' },
            { language: 'html',        label: 'HTML' },
            { language: 'css',         label: 'CSS' },
            { language: 'sql',         label: 'SQL' },
            { language: 'bash',        label: 'Bash / Shell' },
            { language: 'python',      label: 'Python' },
            { language: 'json',        label: 'JSON' },
            { language: 'xml',         label: 'XML' },
            { language: 'typescript',  label: 'TypeScript' },
            { language: 'http',        label: 'HTTP (.htaccess)' },
        ]
    }
};

function applyPrism(editor) {
    const editable = editor.ui.view.editable.element;
    editable.querySelectorAll('pre code').forEach(block => {
        // Detect language from CKEditor's class
        const pre = block.parentElement;
        const lang = pre ? pre.dataset.language : null;
        if (lang && lang !== 'plaintext' && !block.classList.contains('language-' + lang)) {
            block.className = 'language-' + lang;
        }
        Prism.highlightElement(block);
    });
}

['body_az','body_en'].forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;
    ClassicEditor.create(el, _ckConfig).then(editor => {
        _editors[id] = editor;

        setTimeout(() => applyPrism(editor), 400);

        let _t;
        editor.model.document.on('change:data', () => {
            clearTimeout(_t);
            _t = setTimeout(() => applyPrism(editor), 400);
        });
    }).catch(console.error);
});

function submitNote() {
    Object.entries(_editors).forEach(([id, editor]) => {
        document.getElementById(id).value = editor.getData();
    });
    document.querySelectorAll('[id^="err-"]').forEach(el => { el.classList.add('hidden'); el.textContent = ''; });
    const btn = document.getElementById('submitBtn');
    btn.disabled = true; btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Göndərilir...';
    $.ajax({
        type: 'POST', url: '/admin/notes',
        data: new FormData(document.getElementById('noteForm')),
        processData: false, contentType: false,
        success: function(r) {
            toastr.success(r.message);
            setTimeout(() => window.location.href = '/admin/notes', 1000);
        },
        error: function(xhr) {
            btn.disabled = false; btn.innerHTML = '<i class="fa fa-check"></i> Yadda saxla';
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                Object.entries(xhr.responseJSON.errors).forEach(([f, msgs]) => {
                    const el = document.getElementById('err-' + f);
                    if (el) { el.textContent = msgs[0]; el.classList.remove('hidden'); }
                });
                toastr.error('Zəhmət olmasa xətaları düzəldin');
            } else { toastr.error('Xəta baş verdi'); }
        }
    });
}
</script>
@endpush

@endsection
