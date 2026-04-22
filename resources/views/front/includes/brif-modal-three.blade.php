{{-- ADLANDIRMA BRİF MODALI --}}
<div x-show="activeModal === 'adlandirma'"
     x-transition:enter="transition ease-out duration-150"
     x-transition:enter-start="opacity-0 translate-x-2"
     x-transition:enter-end="opacity-100 translate-x-0"
     style="display:none">

    <div class="overflow-y-auto max-h-[70vh] px-6 py-5 space-y-4">
        <form id="brifModalThree" onsubmit="return false">

            <div class="brif-field">
                <label class="control-label" for="adlandirmabrief-sirketadi">{{ __('static.modal_3_label_2') }}</label>
                <textarea id="adlandirmabrief-sirketadi" class="form-control" name="adlandirma_sirketadi" rows="2"></textarea>
                <small class="adlandirma_sirketadi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="adlandirma-seqment">{{ __('static.modal_3_label_3') }}</label>
                <textarea id="adlandirma-seqment" class="form-control" name="adlandirma_seqment" rows="2"></textarea>
                <small class="adlandirma_seqment-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="adlandirmabrief-hedef">{{ __('static.modal_3_label_4') }}</label>
                <textarea id="adlandirmabrief-hedef" class="form-control" name="adlandirma_hedef" rows="2"></textarea>
                <small class="adlandirma_hedef-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="adlandirmabrief-ugurluadlar">{{ __('static.modal_3_label_5') }}</label>
                <textarea id="adlandirmabrief-ugurluadlar" class="form-control" name="adlandirma_ugurluadlar" rows="2"></textarea>
                <small class="adlandirma_ugurluadlar-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="adlandirmabrief-teessurat">{{ __('static.modal_3_label_6') }}</label>
                <textarea id="adlandirmabrief-teessurat" class="form-control" name="adlandirma_teessurat" rows="2"></textarea>
                <small class="adlandirma_teessurat-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="adlandirmabrief-xaricidil">{{ __('static.modal_3_label_7') }}</label>
                <textarea id="adlandirmabrief-xaricidil" class="form-control" name="adlandirma_xaricidil" rows="2"></textarea>
                <small class="adlandirma_xaricidil-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="adlandirmabrief-sozlerinsayi">{{ __('static.modal_3_label_8') }}</label>
                <textarea id="adlandirmabrief-sozlerinsayi" class="form-control" name="adlandirma_sozlerinsayi" rows="2"></textarea>
                <small class="adlandirma_sozlerinsayi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="adlandirmabrief-elaveistek">{{ __('static.modal_3_label_9') }}</label>
                <textarea id="adlandirmabrief-elaveistek" class="form-control" name="adlandirma_elaveistek" rows="2"></textarea>
                <small class="adlandirma_elaveistek-error"></small>
            </div>

            <p class="brif-section-title">{{ __('static.modal_1_label_19') }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="brif-field">
                    <textarea class="form-control" name="adlandirma_ad" rows="1" placeholder="{{ __('static.modal_1_label_20') }}"></textarea>
                    <small class="adlandirma_ad-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="adlandirma_vezife" rows="1" placeholder="{{ __('static.modal_1_label_21') }}"></textarea>
                    <small class="adlandirma_vezife-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="adlandirma_telefon" rows="1" placeholder="{{ __('static.modal_1_label_22') }}"></textarea>
                    <small class="adlandirma_telefon-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="adlandirma_email" rows="1" placeholder="{{ __('static.modal_1_label_23') }}"></textarea>
                    <small class="adlandirma_email-error"></small>
                </div>
                <div class="brif-field sm:col-span-2">
                    <textarea class="form-control" name="adlandirma_vaxt" rows="1" placeholder="{{ __('static.modal_1_label_24') }}"></textarea>
                    <small class="adlandirma_vaxt-error"></small>
                </div>
            </div>
        </form>
    </div>

    <div class="brif-submit">
        <button type="button" id="modalThreeBtn">{{ __('static.modal_1_label_25') }}</button>
    </div>
</div>
