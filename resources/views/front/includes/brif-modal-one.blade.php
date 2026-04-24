{{-- LOGO BRİF MODALI --}}
<div x-show="activeModal === 'logo'"
     x-transition:enter="transition ease-out duration-150"
     x-transition:enter-start="opacity-0 translate-x-2"
     x-transition:enter-end="opacity-100 translate-x-0"
     style="display:none">

    <div class="overflow-y-auto max-h-[70vh] px-6 py-5 space-y-4">
        <form id="brifModalOne" onsubmit="return false">

            {{-- Şirkət adı --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                <textarea id="logobrief-sirketadi" class="form-control" name="sirketadi" rows="2"></textarea>
                <small class="sirketadi-error"></small>
            </div>

            {{-- Logotip mətn --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-logotip">{{ __('static.modal_1_label_3') }}</label>
                <textarea id="logobrief-logotip" class="form-control" name="logotip" rows="2"></textarea>
                <small class="logotip-error"></small>
            </div>

            {{-- Fəaliyyət sahəsi --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-fealiyyetsahesi">{{ __('static.modal_1_label_4') }}</label>
                <textarea id="logobrief-fealiyyetsahesi" class="form-control" name="fealiyyetsahesi" rows="2"></textarea>
                <small class="fealiyyetsahesi-error"></small>
            </div>

            {{-- Perspektiv --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-prespektiv">{{ __('static.modal_1_label_5') }}</label>
                <textarea id="logobrief-prespektiv" class="form-control" name="prespektiv" rows="2"></textarea>
                <small class="prespektiv-error"></small>
            </div>

            {{-- Rəqiblər --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-reqibler">{{ __('static.modal_1_label_6') }}</label>
                <textarea id="logobrief-reqibler" class="form-control" name="reqibler" rows="2"></textarea>
                <small class="reqibler-error"></small>
            </div>

            {{-- Fəaliyyət dairəsi --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-fealiyyetdairesi">{{ __('static.modal_1_label_7') }}</label>
                <textarea id="logobrief-fealiyyetdairesi" class="form-control" name="fealiyyetdairesi" rows="2"></textarea>
                <small class="fealiyyetdairesi-error"></small>
            </div>

            {{-- Mövcud loqo şəkli --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_1_label_8') }}</p>
                <div class="flex items-center gap-3">
                    <label class="flex items-center gap-2 px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-lg cursor-pointer hover:border-violet-500 transition-colors text-sm text-zinc-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/></svg>
                        {{ __('static.modal_1_label_9') }}
                        <input type="file" id="logobrief-movcudlogo" name="movcudlogo" accept="image/*" class="hidden"
                               onchange="document.getElementById('image-preview').src=URL.createObjectURL(this.files[0]); document.getElementById('image-preview').style.display='block'">
                    </label>
                </div>
                <img id="image-preview" src="" alt="Image Preview" style="display:none; max-height:100px; margin-top:0.5rem; border-radius:0.5rem;">
                <small class="movcudlogo-error"></small>
            </div>

            {{-- Rəng --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-reng">{{ __('static.modal_1_label_10') }}</label>
                <textarea id="logobrief-reng" class="form-control" name="reng" rows="2"></textarea>
                <small class="reng-error"></small>
            </div>

            {{-- Logotip vacibliyi --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-logotipvacibliyi">{{ __('static.modal_1_label_11') }}</label>
                <textarea id="logobrief-logotipvacibliyi" class="form-control" name="logotipvacibliyi" rows="2"></textarea>
                <small class="logotipvacibliyi-error"></small>
            </div>

            {{-- Logotip seçimi --}}
            <div class="brif-field">
                <p class="brif-section-title">{!! __('static.modal_1_label_12') !!}</p>
                <div class="brif-logo-grid">
                    @foreach($logotips as $item)
                    <div class="brif-logo-item">
                        <input type="checkbox" id="myCheckbox{{ $item->id }}" name="logotipsecimi" value="{{ $item->id }}">
                        <label for="myCheckbox{{ $item->id }}">
                            <img src="{{ asset('brif/logos/'.$item->src) }}" alt="{{ $item->{'name_'.app()->getLocale()} }}">
                            <figcaption>{{ $item->{'name_'.app()->getLocale()} }}</figcaption>
                        </label>
                    </div>
                    @endforeach
                </div>
                <small class="logotipsecimi-error"></small>
            </div>

            {{-- Vizit kart --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_1_label_14') }}</p>
                <div class="brif-check-group">
                    @foreach($vizit_karts as $vk)
                    <label>
                        <input type="checkbox" name="karparativkart[]" value="{{ $vk->id }}">
                        {{ $vk->{'name_'.app()->getLocale()} }}
                    </label>
                    @endforeach
                </div>
                <small class="karparativkart-error"></small>
            </div>

            {{-- Konvert --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_1_label_15') }}</p>
                <div class="brif-check-group">
                    @foreach($konverts as $k)
                    <label>
                        <input type="checkbox" name="konvert[]" value="{{ $k->id }}">
                        {{ $k->{'name_'.app()->getLocale()} }}
                    </label>
                    @endforeach
                </div>
                <small class="konvert-error"></small>
                <div class="brif-field" style="margin-top:0.5rem">
                    <label class="control-label">{{ __('static.modal_1_label_16') }}</label>
                    <textarea id="logobrief-diger" class="form-control" name="diger" rows="2"></textarea>
                    <small class="diger-error"></small>
                </div>
            </div>

            {{-- Firma stili --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_1_label_17') }}</p>
                <div class="brif-check-group">
                    @foreach($styles as $style)
                    <label>
                        <input type="checkbox" name="firma_stili[]" value="{{ $style->id }}">
                        {{ $style->{'name_'.app()->getLocale()} }}
                    </label>
                    @endforeach
                </div>
                <small class="firma_stili-error"></small>
            </div>

            {{-- Başqa arzu --}}
            <div class="brif-field">
                <label class="control-label" for="logobrief-basqaarzu">{{ __('static.modal_1_label_18') }}</label>
                <textarea id="logobrief-basqaarzu" class="form-control" name="basqaarzu" rows="2"></textarea>
                <small class="basqaarzu-error"></small>
            </div>

            {{-- Əlaqə məlumatları --}}
            <p class="brif-section-title">{{ __('static.modal_1_label_19') }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="brif-field">
                    <textarea id="logobrief-ad" class="form-control" name="ad" rows="1" placeholder="{{ __('static.modal_1_label_20') }}"></textarea>
                    <small class="ad-error"></small>
                </div>
                <div class="brif-field">
                    <textarea id="logobrief-vezife" class="form-control" name="vezife" rows="1" placeholder="{{ __('static.modal_1_label_21') }}"></textarea>
                    <small class="vezife-error"></small>
                </div>
                <div class="brif-field">
                    <textarea id="logobrief-telefon" class="form-control" name="telefon" rows="1" placeholder="{{ __('static.modal_1_label_22') }}"></textarea>
                    <small class="telefon-error"></small>
                </div>
                <div class="brif-field">
                    <textarea id="logobrief-email" class="form-control" name="email" rows="1" placeholder="{{ __('static.modal_1_label_23') }}"></textarea>
                    <small class="email-error"></small>
                </div>
                <div class="brif-field sm:col-span-2">
                    <textarea id="logobrief-vaxt" class="form-control" name="vaxt" rows="1" placeholder="{{ __('static.modal_1_label_24') }}"></textarea>
                    <small class="vaxt-error"></small>
                </div>
            </div>
        </form>
    </div>

    <div class="brif-submit">
        <button type="button" id="modalOneBtn">{{ __('static.modal_1_label_25') }}</button>
    </div>
</div>
