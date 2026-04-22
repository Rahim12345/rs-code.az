{{-- VEB SAYT BRİF MODALI --}}
<div x-show="activeModal === 'web'"
     x-transition:enter="transition ease-out duration-150"
     x-transition:enter-start="opacity-0 translate-x-2"
     x-transition:enter-end="opacity-100 translate-x-0"
     style="display:none">

    <div class="overflow-y-auto max-h-[70vh] px-6 py-5 space-y-4">
        <form id="brifModalTwo" onsubmit="return false">

            <div class="brif-field">
                <label class="control-label" for="webbrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                <textarea id="webbrief-sirketadi" class="form-control" name="web_sirketadi" rows="2"></textarea>
                <small class="web_sirketadi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="webbrief-logotip">{{ __('static.modal_1_label_3') }}</label>
                <textarea id="webbrief-logotip" class="form-control" name="web_logotip" rows="2"></textarea>
                <small class="web_logotip-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="webbrief-fealiyyetsahesi">{{ __('static.modal_1_label_4') }}</label>
                <textarea id="webbrief-fealiyyetsahesi" class="form-control" name="web_fealiyyetsahesi" rows="2"></textarea>
                <small class="web_fealiyyetsahesi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="webbrief-prespektiv">{{ __('static.modal_1_label_5') }}</label>
                <textarea id="webbrief-prespektiv" class="form-control" name="web_prespektiv" rows="2"></textarea>
                <small class="web_prespektiv-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="webbrief-reqibler">{{ __('static.modal_1_label_6') }}</label>
                <textarea id="webbrief-reqibler" class="form-control" name="web_reqibler" rows="2"></textarea>
                <small class="web_reqibler-error"></small>
            </div>

            {{-- Sayt tipi --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_1_label_13') }}</p>
                <div class="space-y-3">
                    @foreach($veb_dasiyicis as $vd)
                    <div>
                        <label class="flex items-center gap-2 text-sm text-zinc-400 cursor-pointer">
                            <input type="checkbox" name="web_firmastili[]" value="{{ $vd->id }}" class="accent-violet-500">
                            {{ $vd->{'name_'.app()->getLocale()} }}
                        </label>
                        @foreach($vd->numunes as $numune)
                        <a href="{{ $numune->link }}" target="_blank" class="text-violet-400 text-xs ml-5 hover:underline">
                            {{ __('static.modal_2_label_24') }}
                        </a>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                <small class="web_firmastili-error"></small>

                <div class="brif-field" style="margin-top:0.75rem">
                    <label class="control-label">{{ __('static.modal_2_label_7') }}</label>
                    <textarea id="webbrief-firmastilidiger" class="form-control" name="web_firmastilidiger" rows="2"></textarea>
                    <small class="web_firmastilidiger-error"></small>
                </div>
            </div>

            {{-- Veb sayt göstərişlər --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_1_label_17') }}</p>
                <div class="brif-check-group">
                    @foreach($veb_vesaits as $vv)
                    <label>
                        <input type="checkbox" name="web_gosteris[]" value="{{ $vv->id }}" class="accent-violet-500">
                        {{ $vv->{'name_'.app()->getLocale()} }}
                    </label>
                    @endforeach
                </div>
                <small class="web_gosteris-error"></small>
                <div class="brif-field" style="margin-top:0.5rem">
                    <label class="control-label">{{ __('static.modal_2_label_14') }}</label>
                    <textarea id="webbrief-gosterisvesaitidiger" class="form-control" name="web_gosterisvesaitidiger" rows="2"></textarea>
                    <small class="web_gosterisvesaitidiger-error"></small>
                </div>
            </div>

            {{-- Dillər --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_2_label_15') }}</p>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2 text-sm text-zinc-400 cursor-pointer">
                        <input type="checkbox" name="web_az" value="1" class="accent-violet-500"> AZ
                    </label>
                    <label class="flex items-center gap-2 text-sm text-zinc-400 cursor-pointer">
                        <input type="checkbox" name="web_en" value="2" class="accent-violet-500"> EN
                    </label>
                    <label class="flex items-center gap-2 text-sm text-zinc-400 cursor-pointer">
                        <input type="checkbox" name="web_ru" value="3" class="accent-violet-500"> RU
                    </label>
                </div>
                <div class="brif-field" style="margin-top:0.5rem">
                    <label class="control-label">{{ __('static.modal_2_label_16') }}</label>
                    <textarea id="webbrief-qeydler" class="form-control" name="web_qeydler" rows="2"></textarea>
                    <small class="web_qeydler-error"></small>
                </div>
            </div>

            {{-- Menyu --}}
            <div class="brif-field">
                <label class="control-label" for="webbrief-menu">{{ __('static.modal_2_label_17') }}</label>
                <textarea id="webbrief-menu" class="form-control" name="web_menu" rows="3"></textarea>
                <small class="web_menu-error"></small>
            </div>

            {{-- İmkanlar --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_2_label_18') }}</p>
                <div class="brif-check-group flex-col gap-2">
                    @foreach([
                        ['web_imkanlar1','modal_2_label_19'],
                        ['web_imkanlar2','modal_2_label_20'],
                        ['web_imkanlar3','modal_2_label_21'],
                        ['web_imkanlar4','modal_2_label_22'],
                        ['web_imkanlar5','modal_2_label_23'],
                    ] as [$name,$key])
                    <label class="flex items-center gap-2 text-sm text-zinc-400 cursor-pointer">
                        <input type="checkbox" name="{{ $name }}" value="1" class="accent-violet-500">
                        {{ __('static.'.$key) }}
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Əlaqə --}}
            <p class="brif-section-title">{{ __('static.modal_1_label_19') }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="brif-field">
                    <textarea class="form-control" name="web_ad" rows="1" placeholder="{{ __('static.modal_1_label_20') }}"></textarea>
                    <small class="web_ad-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="web_vezife" rows="1" placeholder="{{ __('static.modal_1_label_21') }}"></textarea>
                    <small class="web_vezife-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="web_telefon" rows="1" placeholder="{{ __('static.modal_1_label_22') }}"></textarea>
                    <small class="web_telefon-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="web_email" rows="1" placeholder="{{ __('static.modal_1_label_23') }}"></textarea>
                    <small class="web_email-error"></small>
                </div>
                <div class="brif-field sm:col-span-2">
                    <textarea class="form-control" name="web_vaxt" rows="1" placeholder="{{ __('static.modal_1_label_24') }}"></textarea>
                    <small class="web_vaxt-error"></small>
                </div>
            </div>
        </form>
    </div>

    <div class="brif-submit">
        <button type="button" id="modalTwoBtn">{{ __('static.modal_1_label_25') }}</button>
    </div>
</div>
