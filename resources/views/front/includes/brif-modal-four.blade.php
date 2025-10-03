<div class="modal fade " id="smm" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('static.modal_4_label_1') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form id="brifModalFour" class="sky-form" action="{{ route('front.brif.modal.four') }}" method="post" enctype="multipart/form-data" onsubmit="return false">
                    <fieldset>
                        <section>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-smmbrief-sirketadi required">
                                    <label class="control-label" for="smmbrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                                    <textarea id="smmbrief-sirketadi" class="form-control" name="smm_sirketadi" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_sirketadi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-smmbrief-sirketsahesi required">
                                    <label class="control-label" for="smmbrief-sirketsahesi">{{ __('static.modal_4_label_2') }}</label>
                                    <textarea id="smmbrief-sirketsahesi" class="form-control" name="smm_sirketsahesi" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_sirketsahesi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-smmbrief-sirkethaqqinda required">
                                    <label class="control-label" for="smmbrief-sirkethaqqinda">{{ __('static.modal_4_label_3') }}</label>
                                    <textarea id="smm-sirkethaqqinda" class="form-control" name="smm_sirkethaqqinda"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_sirkethaqqinda-error"></small>
                                </div>
                            </label>
                        </section>
                    </fieldset>

                    <fieldset>
                        <section>
                            <label class="label">{{ __('static.modal_4_label_4') }}</label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div>
                                    <div>
                                        <label class="checkbox checkbok-dil"><input type="checkbox" id="smmbrief-facebook"
                                                                                    name="web_gosteris[]" value="facebook"><i></i>{{ __('static.modal_4_label_5') }}</label>
                                        <label class="checkbox checkbok-dil"><input type="checkbox" id="smmbrief-instagram"
                                                                                    name="web_gosteris[]" value="instagram"><i></i>{{ __('static.modal_4_label_6') }}</label>
                                        <label class="checkbox checkbok-dil"><input type="checkbox" id="smmbrief-linkedin"
                                                                                    name="web_gosteris[]" value="linkedin"><i></i>{{ __('static.modal_4_label_7') }}</label>
                                        <label class="checkbox checkbok-dil"><input type="checkbox" id="smmbrief-youtube"
                                                                                    name="web_gosteris[]" value="youtube"><i></i>{{ __('static.modal_4_label_8') }}</label>
                                        <label class="checkbox checkbok-dil"><input type="checkbox" id="smmbrief-tiktok"
                                                                                    name="web_gosteris[]" value="tiktok"><i></i>{{ __('static.modal_4_label_9') }}</label>
                                    </div>
                                    <small class="web_gosteris-error"></small>
                                </div>
                            </label>
                        </section>
                        </fieldset>

                    <fieldset>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-smmbrief-ayligpost">
                                    <label class="control-label" for="smmbrief-ayligpost">{{ __('static.modal_4_label_10') }}</label>
                                    <textarea id="smmbrief-ayligpost" class="form-control" name="smm_ayligpost"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_ayligpost-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-smmbrief-gozlenti">
                                    <label class="control-label" for="smmbrief-gozlenti">{{ __('static.modal_4_label_11') }}</label>
                                    <textarea id="smmbrief-gozlenti" class="form-control" name="smm_gozlenti"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_gozlenti-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-smmbrief-ayligbudce">
                                    <label class="control-label" for="smmbrief-ayligbudce">{{ __('static.modal_4_label_12') }}</label>
                                    <textarea id="smmbrief-ayligbudce" class="form-control" name="smm_ayligbudce"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_ayligbudce-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-smmbrief-reqibler">
                                    <label class="control-label" for="smmbrief-reqibler">{{ __('static.modal_4_label_13') }}</label>
                                    <textarea id="smmbrief-reqibler" class="form-control" name="smm_reqibler"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_reqibler-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-smmbrief-cavablandirma">
                                    <label class="control-label" for="smmbrief-cavablandirma">{{ __('static.modal_4_label_14') }}</label>
                                    <textarea id="smmbrief-cavablandirma" class="form-control" name="smm_cavablandirma"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_cavablandirma-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>

                    <fieldset>
                        <label class="label labels mt-4">{{ __('static.modal_1_label_19') }}</label>

                        <label class="textarea mt-4">

                            <div class="form-group field-smmbrief-ad required">
                                <label class="control-label" for="smmbrief-ad"></label>
                                <textarea type="text" id="smmbrief-ad" class="form-control" name="smm_ad" rows="1"
                                          placeholder="{{ __('static.modal_1_label_20') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="smm_ad-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-smmbrief-vezife required">
                                <label class="control-label" for="smmbrief-vezife"></label>
                                <textarea type="text" id="smmbrief-vezife" class="form-control" name="smm_vezife" rows="1"
                                          placeholder="{{ __('static.modal_1_label_21') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="smm_vezife-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-smmbrief-telefon required">
                                <label class="control-label" for="smmbrief-telefon"></label>
                                <textarea type="text" id="smmbrief-telefon" class="form-control" name="smm_telefon" rows="1"
                                          placeholder="{{ __('static.modal_1_label_22') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="smm_telefon-error"></small>
                            </div>
                        </label>



                        <label class="textarea mt-4">

                            <div class="form-group field-smmbrief-email required">
                                <label class="control-label" for="smmbrief-email"></label>
                                <textarea type="email" id="smmbrief-email" class="form-control" name="smm_email" rows="1"
                                          placeholder="{{ __('static.modal_1_label_23') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="smm_email-error"></small>
                            </div>
                        </label>


                        <section>

                            <label class="textarea mt-4">

                                <div class="form-group field-smmbrief-vaxt required">
                                    <label class="control-label" for="smmbrief-vaxt"></label>
                                    <textarea type="text" id="smmbrief-vaxt" class="form-control" name="smm_vaxt" rows="1"
                                              placeholder="{{ __('static.modal_1_label_24') }}" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="smm_vaxt-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary butn" id="modalFourBtn">{{ __('static.modal_1_label_25') }}</button>
            </div>
        </div>
    </div>
</div>
