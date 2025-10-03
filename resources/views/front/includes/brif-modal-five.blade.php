<div class="modal fade " id="seo" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('static.modal_5_label_1') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form id="brifModalFive" class="sky-form" action="{{ route('front.brif.modal.five') }}" method="post" enctype="multipart/form-data" onsubmit="return false">
                    <fieldset>
                        <section>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-seobrief-sirketadi required">
                                    <label class="control-label" for="seobrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                                    <textarea id="seobrief-sirketadi" class="form-control" name="seo_sirketadi" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="seo_sirketadi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-seobrief-sirketsahesi required">
                                    <label class="control-label" for="seobrief-sirketsahesi">{{ __('static.modal_4_label_2') }}</label>
                                    <textarea id="seobrief-sirketsahesi" class="form-control" name="seo_sirketsahesi" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="seo_sirketsahesi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-seobrief-sirkethaqqinda required">
                                    <label class="control-label" for="seobrief-sirkethaqqinda">{{ __('static.modal_4_label_3') }}</label>
                                    <textarea id="seo-sirkethaqqinda" class="form-control" name="seo_sirkethaqqinda"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="seo_sirkethaqqinda-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-seobrief-vebsayt required">
                                    <label class="control-label" for="seobrief-vebsayt">{{ __('static.modal_5_label_2') }}</label>
                                    <textarea id="seo-vebsayt" class="form-control" name="seo_vebsayt"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="seo_vebsayt-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-seobrief-acarsozler required">
                                    <label class="control-label" for="seobrief-acarsozler">{{ __('static.modal_5_label_3') }}</label>
                                    <textarea id="seo-acarsozler" class="form-control" name="seo_acarsozler"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="seo_acarsozler-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-seobrief-budce required">
                                    <label class="control-label" for="seobrief-budce">{{ __('static.modal_5_label_4') }}</label>
                                    <textarea id="seo-budce" class="form-control" name="seo_budce"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="seo_budce-error"></small>
                                </div>
                            </label>
                        </section>
                    </fieldset>


                    <fieldset>
                        <label class="label labels mt-4">{{ __('static.modal_1_label_19') }}</label>

                        <label class="textarea mt-4">

                            <div class="form-group field-seobrief-ad required">
                                <label class="control-label" for="seobrief-ad"></label>
                                <textarea type="text" id="seobrief-ad" class="form-control" name="seo_ad" rows="1"
                                          placeholder="{{ __('static.modal_1_label_20') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="seo_ad-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-seobrief-vezife required">
                                <label class="control-label" for="seobrief-vezife"></label>
                                <textarea type="text" id="seobrief-vezife" class="form-control" name="seo_vezife" rows="1"
                                          placeholder="{{ __('static.modal_1_label_21') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="seo_vezife-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-seobrief-telefon required">
                                <label class="control-label" for="seobrief-telefon"></label>
                                <textarea type="text" id="seobrief-telefon" class="form-control" name="seo_telefon" rows="1"
                                          placeholder="{{ __('static.modal_1_label_22') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="seo_telefon-error"></small>
                            </div>
                        </label>



                        <label class="textarea mt-4">

                            <div class="form-group field-seobrief-email required">
                                <label class="control-label" for="seobrief-email"></label>
                                <textarea type="email" id="seobrief-email" class="form-control" name="seo_email" rows="1"
                                          placeholder="{{ __('static.modal_1_label_23') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="seo_email-error"></small>
                            </div>
                        </label>


                        <section>

                            <label class="textarea mt-4">

                                <div class="form-group field-seobrief-vaxt required">
                                    <label class="control-label" for="seobrief-vaxt"></label>
                                    <textarea type="text" id="seobrief-vaxt" class="form-control" name="seo_vaxt" rows="1"
                                              placeholder="{{ __('static.modal_1_label_24') }}" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="seo_vaxt-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary butn" id="brifModalFivez">{{ __('static.modal_1_label_25') }}</button>
            </div>
        </div>
    </div>
</div>
