@extends('front.layouts.master')
@section('title', __('index.contact') . ' | RS Code')
@section('description', 'RS Code ilə əlaqə saxlayın. Pulsuz konsultasiya və sifariş üçün bizimlə əlaqə saxlaya bilərsiniz.')

@section('content')

{{-- Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-violet-950/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-family:'Bricolage Grotesque',sans-serif">
            <span class="gradient-text">{{ __('contact.hero_h1_span') }}</span> {{ __('contact.hero_h1') }}
        </h1>
        <p class="text-zinc-400 text-lg max-w-2xl mx-auto">
            {{ __('contact.hero_desc') }}
        </p>
    </div>
</section>

{{-- Contact Section --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

            {{-- Left: Info --}}
            <div class="lg:col-span-2 space-y-4">
                {{-- Contact cards --}}
                @foreach([
                    ['M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', __('contact.email'), 'info@rs-code.az','mailto:info@rs-code.az'],
                    ['M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', __('contact.phone_label'),'+994 (77) 582-99-89','tel:+994775829989'],
                    ['M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z', __('contact.address_label'), __('contact.address_value'),'#'],
                ] as [$icon,$label,$value,$href])
                <a href="{{ $href }}" class="flex items-center gap-4 bg-zinc-900/60 border border-zinc-800/50 rounded-2xl p-5 hover:border-violet-500/30 transition-all group">
                    <div class="w-12 h-12 bg-violet-600/10 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-violet-600/20 transition-all">
                        <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-zinc-500 text-xs mb-0.5">{{ $label }}</div>
                        <div class="text-white font-medium text-sm">{{ $value }}</div>
                    </div>
                </a>
                @endforeach

                {{-- Social --}}
                <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-6">
                    <h3 class="text-white font-semibold text-sm mb-4">{{ __('contact.social') }}</h3>
                    <div class="flex gap-3">
                        <a href="https://www.instagram.com/rs_code.az" target="_blank"
                           class="w-10 h-10 bg-zinc-800 hover:bg-violet-700 rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-4 h-4 text-zinc-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com" target="_blank"
                           class="w-10 h-10 bg-zinc-800 hover:bg-violet-700 rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-4 h-4 text-zinc-400" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#"
                           class="w-10 h-10 bg-zinc-800 hover:bg-violet-700 rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-4 h-4 text-zinc-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Working hours --}}
                <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-6">
                    <h3 class="text-white font-semibold text-sm mb-4">{{ __('contact.hours_heading') }}</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-zinc-500">{{ __('contact.hours_weekdays') }}</span>
                            <span class="text-zinc-300">09:00 — 18:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-zinc-500">{{ __('contact.hours_saturday') }}</span>
                            <span class="text-zinc-300">10:00 — 15:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-zinc-500">{{ __('contact.hours_sunday') }}</span>
                            <span class="text-red-400">{{ __('contact.hours_closed') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Form --}}
            <div class="lg:col-span-3">
                <div class="bg-zinc-900/40 border border-zinc-800/50 rounded-2xl p-8">
                    <h2 class="text-2xl font-bold mb-2" style="font-family:'Bricolage Grotesque',sans-serif">{{ __('contact.form_heading') }}</h2>
                    <p class="text-zinc-500 text-sm mb-8">{{ __('contact.form_subheading') }}</p>

                    <form id="contactForm" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-zinc-400 text-sm mb-1.5">{{ __('contact.name_label') }} <span class="text-violet-400">*</span></label>
                                <input type="text" name="name" placeholder="{{ __('contact.name_placeholder') }}"
                                       class="w-full bg-zinc-800/60 border border-zinc-700/50 focus:border-violet-500 rounded-xl px-4 py-3 text-white text-sm placeholder-zinc-600 outline-none transition-colors">
                                <span class="name-error text-red-400 text-xs mt-1 block"></span>
                            </div>
                            <div>
                                <label class="block text-zinc-400 text-sm mb-1.5">{{ __('contact.sirket') }} <span class="text-violet-400">*</span></label>
                                <input type="text" name="sirket" placeholder="{{ __('contact.company_placeholder') }}"
                                       class="w-full bg-zinc-800/60 border border-zinc-700/50 focus:border-violet-500 rounded-xl px-4 py-3 text-white text-sm placeholder-zinc-600 outline-none transition-colors">
                                <span class="sirket-error text-red-400 text-xs mt-1 block"></span>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-zinc-400 text-sm mb-1.5">{{ __('contact.email') }} <span class="text-violet-400">*</span></label>
                                <input type="email" name="email2" placeholder="email@example.com"
                                       class="w-full bg-zinc-800/60 border border-zinc-700/50 focus:border-violet-500 rounded-xl px-4 py-3 text-white text-sm placeholder-zinc-600 outline-none transition-colors">
                                <span class="email2-error text-red-400 text-xs mt-1 block"></span>
                            </div>
                            <div>
                                <label class="block text-zinc-400 text-sm mb-1.5">{{ __('contact.elaqe_nomresi') }} <span class="text-violet-400">*</span></label>
                                <input type="tel" name="elaqe_nomresi" placeholder="+994 XX XXX XX XX"
                                       class="w-full bg-zinc-800/60 border border-zinc-700/50 focus:border-violet-500 rounded-xl px-4 py-3 text-white text-sm placeholder-zinc-600 outline-none transition-colors">
                                <span class="elaqe_nomresi-error text-red-400 text-xs mt-1 block"></span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-zinc-400 text-sm mb-1.5">{{ __('contact.message_label') }} <span class="text-violet-400">*</span></label>
                            <textarea name="message" rows="5" placeholder="{{ __('contact.message_placeholder') }}"
                                      class="w-full bg-zinc-800/60 border border-zinc-700/50 focus:border-violet-500 rounded-xl px-4 py-3 text-white text-sm placeholder-zinc-600 outline-none transition-colors resize-none"></textarea>
                            <span class="message-error text-red-400 text-xs mt-1 block"></span>
                        </div>
                        <button type="button" id="contactBtn"
                                class="w-full bg-violet-700 hover:bg-violet-600 text-white font-semibold py-3.5 rounded-xl transition-all hover:shadow-lg hover:shadow-violet-700/30 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            {{ __('contact.send_btn') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function(){
    var CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function showToast(msg, type) {
        var t = document.createElement('div');
        t.className = 'rs-toast rs-' + (type || 'success');
        t.textContent = msg;
        document.body.appendChild(t);
        requestAnimationFrame(function(){ t.classList.add('rs-show'); });
        setTimeout(function(){
            t.classList.remove('rs-show');
            setTimeout(function(){ t.remove(); }, 350);
        }, 4000);
    }

    document.getElementById('contactBtn').addEventListener('click', function(){
        var form = document.getElementById('contactForm');
        form.querySelectorAll('[class$="-error"]').forEach(function(el){ el.innerHTML = ''; });

        fetch('{{ route("front.contact.mail") }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
            body: new FormData(form)
        })
        .then(function(res){
            return res.json().then(function(json){ return { ok: res.ok, json: json }; });
        })
        .then(function(r){
            if (r.ok) {
                form.reset();
                showToast(r.json.message, 'success');
            } else {
                var errors = r.json.errors || {};
                Object.keys(errors).forEach(function(k){
                    var errEl = form.querySelector('.' + k + '-error');
                    if (errEl) errEl.innerHTML = Array.isArray(errors[k]) ? errors[k][0] : errors[k];
                });
            }
        })
        .catch(function(){});
    });
})();
</script>
@endpush

@endsection
