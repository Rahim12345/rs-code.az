<div class="modal fade " id="adlandirma" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('static.modal_3_label_1') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form id="brifModalThree" class="sky-form" action="{{ route('front.brif.modal.three') }}" method="post" enctype="multipart/form-data" onsubmit="return false">
                    <fieldset>
                        <section>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-adlandirmabrief-sirketadi required">
                                    <label class="control-label" for="adlandirmabrief-sirketadi">{{ __('static.modal_3_label_2') }}</label>
                                    <textarea id="adlandirmabrief-sirketadi" class="form-control" name="adlandirma_sirketadi" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_sirketadi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-adlandirmabrief-seqment required">
                                    <label class="control-label" for="adlandirmabrief-seqment">{{ __('static.modal_3_label_3') }}</label>
                                    <textarea id="adlandirma-seqment" class="form-control" name="adlandirma_seqment"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_seqment-error"></small>
                                </div>
                            </label>
                        </section>


                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-adlandirmabrief-prespektiv">
                                    <label class="control-label" for="adlandirmabrief-hedef">{{ __('static.modal_3_label_4') }}</label>
                                    <textarea id="adlandirmabrief-hedef" class="form-control" name="adlandirma_hedef"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_hedef-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-adlandirmabrief-ugurluadlar">
                                    <label class="control-label" for="adlandirmabrief-reqibler">{{ __('static.modal_3_label_5') }}</label>
                                    <textarea id="adlandirmabrief-ugurluadlar" class="form-control" name="adlandirma_ugurluadlar"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_ugurluadlar-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-adlandirmabrief-teessurat">
                                    <label class="control-label" for="adlandirmabrief-teessurat">{{ __('static.modal_3_label_6') }}</label>
                                    <textarea id="adlandirmabrief-teessurat" class="form-control" name="adlandirma_teessurat"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_teessurat-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-adlandirmabrief-xaricidil">
                                    <label class="control-label" for="adlandirmabrief-xaricidil">{{ __('static.modal_3_label_7') }}</label>
                                    <textarea id="adlandirmabrief-xaricidil" class="form-control" name="adlandirma_xaricidil"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_xaricidil-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-adlandirmabrief-sozlerinsayi">
                                    <label class="control-label" for="adlandirmabrief-sozlerinsayi">{{ __('static.modal_3_label_8') }}</label>
                                    <textarea id="adlandirmabrief-sozlerinsayi" class="form-control" name="adlandirma_sozlerinsayi"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_sozlerinsayi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-adlandirmabrief-elaveistek">
                                    <label class="control-label" for="adlandirmabrief-elaveistek">{{ __('static.modal_3_label_9') }}</label>
                                    <textarea id="adlandirmabrief-elaveistek" class="form-control" name="adlandirma_elaveistek"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_elaveistek-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>




                    <fieldset>
                        <label class="label labels mt-4">{{ __('static.modal_1_label_19') }}</label>

                        <label class="textarea mt-4">

                            <div class="form-group field-adlandirmabrief-ad required">
                                <label class="control-label" for="adlandirmabrief-ad"></label>
                                <textarea type="text" id="adlandirmabrief-ad" class="form-control" name="adlandirma_ad" rows="1"
                                          placeholder="{{ __('static.modal_1_label_20') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="adlandirma_ad-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-adlandirmabrief-vezife required">
                                <label class="control-label" for="adlandirmabrief-vezife"></label>
                                <textarea type="text" id="adlandirmabrief-vezife" class="form-control" name="adlandirma_vezife" rows="1"
                                          placeholder="{{ __('static.modal_1_label_21') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="adlandirma_vezife-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-adlandirmabrief-telefon required">
                                <label class="control-label" for="adlandirmabrief-telefon"></label>
                                <textarea type="text" id="adlandirmabrief-telefon" class="form-control" name="adlandirma_telefon" rows="1"
                                          placeholder="{{ __('static.modal_1_label_22') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="adlandirma_telefon-error"></small>
                            </div>
                        </label>



                        <label class="textarea mt-4">

                            <div class="form-group field-adlandirmabrief-email required">
                                <label class="control-label" for="adlandirmabrief-email"></label>
                                <textarea type="email" id="adlandirmabrief-email" class="form-control" name="adlandirma_email" rows="1"
                                          placeholder="{{ __('static.modal_1_label_23') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="adlandirma_email-error"></small>
                            </div>
                        </label>


                        <section>

                            <label class="textarea mt-4">

                                <div class="form-group field-adlandirmabrief-vaxt required">
                                    <label class="control-label" for="adlandirmabrief-vaxt"></label>
                                    <textarea type="text" id="adlandirmabrief-vaxt" class="form-control" name="adlandirma_vaxt" rows="1"
                                              placeholder="{{ __('static.modal_1_label_24') }}" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="adlandirma_vaxt-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary butn" id="modalThreeBtn">{{ __('static.modal_1_label_25') }}</button>
            </div>
        </div>
    </div>
</div>
