{{-- SMM BRİF MODALI --}}
<div x-show="activeModal === 'smm'"
     x-transition:enter="transition ease-out duration-150"
     x-transition:enter-start="opacity-0 translate-x-2"
     x-transition:enter-end="opacity-100 translate-x-0"
     style="display:none">

    <div class="overflow-y-auto max-h-[70vh] px-6 py-5 space-y-4">
        <form id="brifModalFour" onsubmit="return false">

            <div class="brif-field">
                <label class="control-label" for="smmbrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                <textarea id="smmbrief-sirketadi" class="form-control" name="smm_sirketadi" rows="2"></textarea>
                <small class="smm_sirketadi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="smmbrief-sirketsahesi">{{ __('static.modal_4_label_2') }}</label>
                <textarea id="smmbrief-sirketsahesi" class="form-control" name="smm_sirketsahesi" rows="2"></textarea>
                <small class="smm_sirketsahesi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="smm-sirkethaqqinda">{{ __('static.modal_4_label_3') }}</label>
                <textarea id="smm-sirkethaqqinda" class="form-control" name="smm_sirkethaqqinda" rows="2"></textarea>
                <small class="smm_sirkethaqqinda-error"></small>
            </div>

            {{-- Sosial şəbəkələr --}}
            <div class="brif-field">
                <p class="brif-section-title">{{ __('static.modal_4_label_4') }}</p>
                <div class="brif-check-group">
                    @foreach([
                        ['facebook',  'modal_4_label_5'],
                        ['instagram', 'modal_4_label_6'],
                        ['linkedin',  'modal_4_label_7'],
                        ['youtube',   'modal_4_label_8'],
                        ['tiktok',    'modal_4_label_9'],
                    ] as [$val, $key])
                    <label>
                        <input type="checkbox" name="web_gosteris[]" value="{{ $val }}" class="accent-violet-500">
                        {{ __('static.'.$key) }}
                    </label>
                    @endforeach
                </div>
                <small class="web_gosteris-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="smmbrief-ayligpost">{{ __('static.modal_4_label_10') }}</label>
                <textarea id="smmbrief-ayligpost" class="form-control" name="smm_ayligpost" rows="2"></textarea>
                <small class="smm_ayligpost-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="smmbrief-gozlenti">{{ __('static.modal_4_label_11') }}</label>
                <textarea id="smmbrief-gozlenti" class="form-control" name="smm_gozlenti" rows="2"></textarea>
                <small class="smm_gozlenti-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="smmbrief-ayligbudce">{{ __('static.modal_4_label_12') }}</label>
                <textarea id="smmbrief-ayligbudce" class="form-control" name="smm_ayligbudce" rows="2"></textarea>
                <small class="smm_ayligbudce-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="smmbrief-reqibler">{{ __('static.modal_4_label_13') }}</label>
                <textarea id="smmbrief-reqibler" class="form-control" name="smm_reqibler" rows="2"></textarea>
                <small class="smm_reqibler-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="smmbrief-cavablandirma">{{ __('static.modal_4_label_14') }}</label>
                <textarea id="smmbrief-cavablandirma" class="form-control" name="smm_cavablandirma" rows="2"></textarea>
                <small class="smm_cavablandirma-error"></small>
            </div>

            <p class="brif-section-title">{{ __('static.modal_1_label_19') }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="brif-field">
                    <textarea class="form-control" name="smm_ad" rows="1" placeholder="{{ __('static.modal_1_label_20') }}"></textarea>
                    <small class="smm_ad-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="smm_vezife" rows="1" placeholder="{{ __('static.modal_1_label_21') }}"></textarea>
                    <small class="smm_vezife-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="smm_telefon" rows="1" placeholder="{{ __('static.modal_1_label_22') }}"></textarea>
                    <small class="smm_telefon-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="smm_email" rows="1" placeholder="{{ __('static.modal_1_label_23') }}"></textarea>
                    <small class="smm_email-error"></small>
                </div>
                <div class="brif-field sm:col-span-2">
                    <textarea class="form-control" name="smm_vaxt" rows="1" placeholder="{{ __('static.modal_1_label_24') }}"></textarea>
                    <small class="smm_vaxt-error"></small>
                </div>
            </div>
        </form>
    </div>

    <div class="brif-submit">
        <button type="button" id="modalFourBtn">{{ __('static.modal_1_label_25') }}</button>
    </div>
</div>
