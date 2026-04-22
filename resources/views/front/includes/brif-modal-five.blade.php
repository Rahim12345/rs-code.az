{{-- SEO BRİF MODALI --}}
<div x-show="activeModal === 'seo'"
     x-transition:enter="transition ease-out duration-150"
     x-transition:enter-start="opacity-0 translate-x-2"
     x-transition:enter-end="opacity-100 translate-x-0"
     style="display:none">

    <div class="overflow-y-auto max-h-[70vh] px-6 py-5 space-y-4">
        <form id="brifModalFive" onsubmit="return false">

            <div class="brif-field">
                <label class="control-label" for="seobrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                <textarea id="seobrief-sirketadi" class="form-control" name="seo_sirketadi" rows="2"></textarea>
                <small class="seo_sirketadi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="seobrief-sirketsahesi">{{ __('static.modal_4_label_2') }}</label>
                <textarea id="seobrief-sirketsahesi" class="form-control" name="seo_sirketsahesi" rows="2"></textarea>
                <small class="seo_sirketsahesi-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="seo-sirkethaqqinda">{{ __('static.modal_4_label_3') }}</label>
                <textarea id="seo-sirkethaqqinda" class="form-control" name="seo_sirkethaqqinda" rows="2"></textarea>
                <small class="seo_sirkethaqqinda-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="seo-vebsayt">{{ __('static.modal_5_label_2') }}</label>
                <textarea id="seo-vebsayt" class="form-control" name="seo_vebsayt" rows="2"></textarea>
                <small class="seo_vebsayt-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="seo-acarsozler">{{ __('static.modal_5_label_3') }}</label>
                <textarea id="seo-acarsozler" class="form-control" name="seo_acarsozler" rows="2"></textarea>
                <small class="seo_acarsozler-error"></small>
            </div>

            <div class="brif-field">
                <label class="control-label" for="seo-budce">{{ __('static.modal_5_label_4') }}</label>
                <textarea id="seo-budce" class="form-control" name="seo_budce" rows="2"></textarea>
                <small class="seo_budce-error"></small>
            </div>

            <p class="brif-section-title">{{ __('static.modal_1_label_19') }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="brif-field">
                    <textarea class="form-control" name="seo_ad" rows="1" placeholder="{{ __('static.modal_1_label_20') }}"></textarea>
                    <small class="seo_ad-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="seo_vezife" rows="1" placeholder="{{ __('static.modal_1_label_21') }}"></textarea>
                    <small class="seo_vezife-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="seo_telefon" rows="1" placeholder="{{ __('static.modal_1_label_22') }}"></textarea>
                    <small class="seo_telefon-error"></small>
                </div>
                <div class="brif-field">
                    <textarea class="form-control" name="seo_email" rows="1" placeholder="{{ __('static.modal_1_label_23') }}"></textarea>
                    <small class="seo_email-error"></small>
                </div>
                <div class="brif-field sm:col-span-2">
                    <textarea class="form-control" name="seo_vaxt" rows="1" placeholder="{{ __('static.modal_1_label_24') }}"></textarea>
                    <small class="seo_vaxt-error"></small>
                </div>
            </div>
        </form>
    </div>

    <div class="brif-submit">
        <button type="button" id="brifModalFivez">{{ __('static.modal_1_label_25') }}</button>
    </div>
</div>
