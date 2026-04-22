@extends('back.layouts.master')
@section('title', 'Profil')

@section('content')
<div x-data="{ tab: localStorage.getItem('profile_tab') || 'profile' }"
     x-init="
         if (tab === 'twofa') load2faState();
         $watch('tab', val => {
             localStorage.setItem('profile_tab', val);
             if (val === 'twofa') load2faState();
         });
     "
     class="max-w-3xl">

    <div class="flex items-center gap-3 mb-7">
        <div class="w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-indigo-200">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
            <h1 class="text-xl font-bold text-gray-900">{{ $user->name }}</h1>
            <p class="text-xs text-gray-400 mt-0.5">{{ $user->email }}</p>
        </div>
    </div>

    {{-- Tab başlıqları --}}
    <div class="flex gap-1 bg-gray-100 p-1 rounded-xl mb-6">
        @foreach([['profile','fa-user','Profil'],['password','fa-lock','Şifrə'],['twofa','fa-shield-halved','2FA'],['backup','fa-database','DB Backup']] as [$t,$ic,$lbl])
        <button type="button" @click="tab='{{ $t }}'"
                :class="tab==='{{ $t }}' ? 'bg-white text-indigo-700 shadow-sm font-semibold' : 'text-gray-500 hover:text-gray-700'"
                class="flex-1 flex items-center justify-center gap-2 py-2.5 px-3 rounded-lg text-sm transition-all">
            <i class="fa {{ $ic }} text-xs"></i>
            <span class="hidden sm:inline">{{ $lbl }}</span>
        </button>
        @endforeach
    </div>

    {{-- TAB: Profil ────────────────────────────────────── --}}
    <div x-show="tab==='profile'">
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-user text-gray-300"></i> Profil məlumatları</div>
            <div class="space-y-4 mt-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Ad *</label>
                    <input type="text" id="p_name" value="{{ $user->name }}" class="admin-input">
                    <p id="err-name" class="hidden mt-1 text-xs text-red-500"></p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Email *</label>
                    <input type="email" id="p_email" value="{{ $user->email }}" class="admin-input">
                    <p id="err-email" class="hidden mt-1 text-xs text-red-500"></p>
                </div>
                <div class="flex justify-end pt-2 border-t border-gray-100">
                    <button onclick="saveProfile()" id="profileBtn" class="btn-primary">
                        <i class="fa fa-floppy-disk"></i> Yadda saxla
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- TAB: Şifrə ────────────────────────────────────── --}}
    <div x-show="tab==='password'">
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-lock text-gray-300"></i> Şifrə dəyiş</div>
            <div class="space-y-4 mt-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Mövcud şifrə *</label>
                    <input type="password" id="current_password" class="admin-input" placeholder="••••••••">
                    <p id="err-current_password" class="hidden mt-1 text-xs text-red-500"></p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Yeni şifrə *</label>
                    <input type="password" id="new_password" class="admin-input" placeholder="Min 6 simvol">
                    <p id="err-password" class="hidden mt-1 text-xs text-red-500"></p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Yeni şifrə (təkrar) *</label>
                    <input type="password" id="new_password_confirm" class="admin-input" placeholder="••••••••">
                    <p id="err-password_confirmation" class="hidden mt-1 text-xs text-red-500"></p>
                </div>
                <div class="flex justify-end pt-2 border-t border-gray-100">
                    <button onclick="savePassword()" id="passwordBtn" class="btn-primary">
                        <i class="fa fa-key"></i> Şifrəni dəyiş
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- TAB: 2FA ───────────────────────────────────────── --}}
    <div x-show="tab==='twofa'">
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-shield-halved text-gray-300"></i> İki addımlı doğrulama (2FA)</div>

            {{-- Status badge --}}
            <div id="twofa-status" class="mt-4 mb-5 flex items-center gap-2">
                <span id="twofa-badge" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-500">
                    <i class="fa fa-circle-notch fa-spin"></i> Yüklənir...
                </span>
            </div>

            {{-- Setup section (shown when not enabled) --}}
            <div id="twofa-setup" class="hidden space-y-5">
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 text-sm text-amber-800 flex gap-3">
                    <i class="fa fa-circle-info mt-0.5 shrink-0"></i>
                    <div>
                        <strong>Necə quraşdırılır:</strong><br>
                        1. Google Authenticator, Authy və ya oxşar tətbiq yükləyin<br>
                        2. Aşağıdakı QR kodu skan edin və ya açarı əl ilə daxil edin<br>
                        3. Tətbiqdəki 6 rəqəmli kodu aşağıda daxil edib aktivləşdirin
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <div class="shrink-0">
                        <div id="twofa-qr" class="w-40 h-40 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center">
                            <i class="fa fa-qrcode text-4xl text-gray-200"></i>
                        </div>
                    </div>
                    <div class="flex-1 space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Əl ilə daxil etmək üçün açar</label>
                            <code id="twofa-secret" class="block w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm font-mono text-gray-700 break-all select-all"></code>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Doğrulama kodu *</label>
                            <input type="text" id="twofa-code" maxlength="6" inputmode="numeric"
                                   class="admin-input font-mono tracking-widest text-center text-lg w-40" placeholder="000000">
                            <p id="err-code" class="hidden mt-1 text-xs text-red-500"></p>
                        </div>
                        <button onclick="enable2fa()" id="enableBtn" class="btn-primary">
                            <i class="fa fa-shield-halved"></i> 2FA-nı aktivləşdir
                        </button>
                    </div>
                </div>
            </div>

            {{-- Disable section (shown when enabled) --}}
            <div id="twofa-disable" class="hidden space-y-4">
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-sm text-green-800 flex gap-3">
                    <i class="fa fa-shield-halved mt-0.5 text-green-600"></i>
                    <div>2FA hesabınızda aktiv vəziyyətdədir. Deaktiv etmək üçün tətbiqinizdəki kodu daxil edin.</div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Doğrulama kodu *</label>
                    <input type="text" id="twofa-disable-code" maxlength="6" inputmode="numeric"
                           class="admin-input font-mono tracking-widest text-center text-lg w-40" placeholder="000000">
                    <p id="err-disable-code" class="hidden mt-1 text-xs text-red-500"></p>
                </div>
                <button onclick="disable2fa()" id="disableBtn"
                        class="px-4 py-2 text-sm text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition-colors font-semibold">
                    <i class="fa fa-shield-xmark"></i> 2FA-nı deaktiv et
                </button>
            </div>
        </div>
    </div>

    {{-- TAB: Backup ────────────────────────────────────── --}}
    <div x-show="tab==='backup'">
        <div class="form-card form-card-body">
            <div class="form-section-title"><i class="fa fa-database text-gray-300"></i> Verilənlər bazası yedəyi</div>
            <div class="mt-4 space-y-5">
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-sm text-blue-800 flex gap-3">
                    <i class="fa fa-circle-info mt-0.5 shrink-0 text-blue-500"></i>
                    <div>
                        Düyməyə basıldıqda <strong>{{ config('database.connections.'.config('database.default').'.database') }}</strong>
                        bazasının tam SQL yedəyi yaradılıb endiriləcək.<br>
                        <span class="text-blue-600 text-xs mt-1 block">mysqldump serverinizdə quraşdırılmış olmalıdır.</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.backup') }}" id="backupBtn"
                       class="btn-primary">
                        <i class="fa fa-download"></i> SQL Yedəyi Endir
                    </a>
                    <span class="text-xs text-gray-400">{{ config('database.connections.'.config('database.default').'.database') }}_{{ date('Y-m-d') }}.sql</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
/* ── Profile ────────────────────────────────────────── */
function saveProfile() {
    clearErr(['name','email']);
    const btn = setLoading('profileBtn', 'Saxlanır...');
    $.post('{{ route("admin.profile.update") }}', {
        name:  document.getElementById('p_name').value,
        email: document.getElementById('p_email').value,
        _token: $('meta[name="csrf-token"]').attr('content')
    }).done(r => { toastr.success(r.message); resetBtn('profileBtn', '<i class="fa fa-floppy-disk"></i> Yadda saxla'); })
      .fail(xhr => { handleErrors(xhr, ['name','email']); resetBtn('profileBtn', '<i class="fa fa-floppy-disk"></i> Yadda saxla'); });
}

/* ── Password ───────────────────────────────────────── */
function savePassword() {
    clearErr(['current_password','password','password_confirmation']);
    const btn = setLoading('passwordBtn', 'Dəyişdirilir...');
    $.post('{{ route("admin.profile.password") }}', {
        current_password:      document.getElementById('current_password').value,
        password:              document.getElementById('new_password').value,
        password_confirmation: document.getElementById('new_password_confirm').value,
        _token: $('meta[name="csrf-token"]').attr('content')
    }).done(r => {
        toastr.success(r.message);
        document.getElementById('current_password').value = '';
        document.getElementById('new_password').value = '';
        document.getElementById('new_password_confirm').value = '';
        resetBtn('passwordBtn', '<i class="fa fa-key"></i> Şifrəni dəyiş');
    }).fail(xhr => {
        handleErrors(xhr, ['current_password','password','password_confirmation']);
        resetBtn('passwordBtn', '<i class="fa fa-key"></i> Şifrəni dəyiş');
    });
}

/* ── 2FA ────────────────────────────────────────────── */

function load2faState() {
    $.get('{{ route("admin.2fa.setup") }}', function(r) {
        const badge  = document.getElementById('twofa-badge');
        const setup  = document.getElementById('twofa-setup');
        const disable = document.getElementById('twofa-disable');

        if (r.enabled) {
            badge.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700';
            badge.innerHTML = '<i class="fa fa-circle-check"></i> Aktiv';
            setup.classList.add('hidden');
            disable.classList.remove('hidden');
        } else {
            badge.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-500';
            badge.innerHTML = '<i class="fa fa-circle-xmark"></i> Deaktiv';
            disable.classList.add('hidden');
            setup.classList.remove('hidden');

            document.getElementById('twofa-qr').innerHTML =
                '<img src="' + r.qr_image + '" style="width:160px;height:160px;border-radius:8px" alt="QR">';
            document.getElementById('twofa-secret').textContent = r.secret;
        }
    });
}

function enable2fa() {
    const code = document.getElementById('twofa-code').value;
    clearErr(['code']);
    const btn = document.getElementById('enableBtn');
    btn.disabled = true; btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Yoxlanır...';
    $.post('{{ route("admin.2fa.enable") }}', { code: code, _token: $('meta[name="csrf-token"]').attr('content') })
     .done(r => {
         toastr.success(r.message);
         document.getElementById('twofa-code').value = '';
         load2faState();
         btn.disabled = false; btn.innerHTML = '<i class="fa fa-shield-halved"></i> 2FA-nı aktivləşdir';
     })
     .fail(xhr => {
         handleErrors(xhr, ['code']);
         btn.disabled = false; btn.innerHTML = '<i class="fa fa-shield-halved"></i> 2FA-nı aktivləşdir';
     });
}

function disable2fa() {
    const code = document.getElementById('twofa-disable-code').value;
    document.getElementById('err-disable-code').classList.add('hidden');
    const btn = document.getElementById('disableBtn');
    btn.disabled = true; btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Yoxlanır...';
    $.post('{{ route("admin.2fa.disable") }}', { code: code, _token: $('meta[name="csrf-token"]').attr('content') })
     .done(r => {
         toastr.success(r.message);
         document.getElementById('twofa-disable-code').value = '';
         load2faState();
         btn.disabled = false; btn.innerHTML = '<i class="fa fa-shield-xmark"></i> 2FA-nı deaktiv et';
     })
     .fail(xhr => {
         if (xhr.responseJSON?.errors?.code) {
             const el = document.getElementById('err-disable-code');
             el.textContent = xhr.responseJSON.errors.code[0]; el.classList.remove('hidden');
         }
         btn.disabled = false; btn.innerHTML = '<i class="fa fa-shield-xmark"></i> 2FA-nı deaktiv et';
     });
}

/* ── Helpers ────────────────────────────────────────── */
function clearErr(fields) {
    fields.forEach(f => { const el = document.getElementById('err-' + f); if (el) { el.textContent = ''; el.classList.add('hidden'); }});
}
function handleErrors(xhr, fields) {
    if (xhr.status === 422 && xhr.responseJSON?.errors) {
        const errs = xhr.responseJSON.errors;
        Object.entries(errs).forEach(([f, msgs]) => {
            const el = document.getElementById('err-' + f);
            if (el) { el.textContent = Array.isArray(msgs) ? msgs[0] : msgs; el.classList.remove('hidden'); }
        });
        toastr.error('Xətaları düzəldin');
    } else { toastr.error('Xəta baş verdi'); }
}
function setLoading(id, txt) {
    const btn = document.getElementById(id);
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> ' + txt;
    return btn;
}
function resetBtn(id, html) {
    const btn = document.getElementById(id);
    btn.disabled = false; btn.innerHTML = html;
}
</script>
@endpush
