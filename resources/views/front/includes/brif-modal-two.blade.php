<div class="modal fade " id="web" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('static.modal_2_label_25') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form id="brifModalTwo" class="sky-form" action="{{ route('front.brif.modal.two') }}" method="post" enctype="multipart/form-data" onsubmit="return false">
                    <fieldset>
                        <section>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-webbrief-sirketadi required">
                                    <label class="control-label" for="webbrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                                    <textarea id="webbrief-sirketadi" class="form-control" name="web_sirketadi" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_sirketadi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-webbrief-logotip required">
                                    <label class="control-label" for="webbrief-logotip">{{ __('static.modal_1_label_3') }}</label>
                                    <textarea id="webbrief-logotip" class="form-control" name="web_logotip" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_logotip-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-webbrief-fealiyyetsahesi required">
                                    <label class="control-label" for="webbrief-fealiyyetsahesi">{{ __('static.modal_1_label_4') }}</label>
                                    <textarea id="webbrief-fealiyyetsahesi" class="form-control" name="web_fealiyyetsahesi"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_fealiyyetsahesi-error"></small>
                                </div>
                            </label>
                        </section>

                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-webbrief-prespektiv">
                                    <label class="control-label" for="webbrief-prespektiv">{{ __('static.modal_1_label_5') }}</label>
                                    <textarea id="webbrief-prespektiv" class="form-control" name="web_prespektiv"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_prespektiv-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-webbrief-reqibler">
                                    <label class="control-label" for="webbrief-reqibler">{{ __('static.modal_1_label_6') }}</label>
                                    <textarea id="webbrief-reqibler" class="form-control" name="web_reqibler"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_reqibler-error"></small>
                                </div>
                            </label>
                        </section>
                    </fieldset>

                    <fieldset>
                        <section>
                            <label class="label "> {{ __('static.modal_1_label_13') }}</label>
                        </section>
                        <section>
                            <div class="row">
                                <div class="col col-12">
                                    @foreach($veb_dasiyicis as $veb_dasiyici)
                                    <label class="checkbox ">
                                        <input type="checkbox" name="web_firmastili[]" value="{{ $veb_dasiyici->id }}"
                                               id="webbrief-firmastili1"><i></i>{{ $veb_dasiyici->{'name_'.app()->getLocale()} }}
                                    </label>
                                        @foreach($veb_dasiyici->numunes as $numune)
                                        <a class="mya" href="{!! $numune->link !!}" target="_blank">{{ __('static.modal_2_label_24') }}</a>
                                        <br>
                                        @endforeach
                                    @endforeach
                                </div>
                                <small class="web_firmastili-error"></small>
                            </div>
                            <br>
                            <br>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-webbrief-firmastilidiger">
                                    <label class="control-label" for="webbrief-firmastilidiger">{{ __('static.modal_2_label_7') }}</label>
                                    <textarea id="webbrief-firmastilidiger" class="form-control" name="web_firmastilidiger"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_firmastilidiger-error"></small>
                                </div>
                            </label>
                        </section>
                    </fieldset>

                    <fieldset>
                        <section>
                            <label class="label">{{ __('static.modal_1_label_17') }}</label>
                            <div class="row">
                                <div class="col col-12">
                                    @foreach($veb_vesaits as $veb_vesait)
                                    <label class="checkbox"><input type="checkbox" id="webbrief-gosteris1" class="checkbok"
                                                                   name="web_gosteris[]" value="{{ $veb_vesait->id }}"><i></i>{{ $veb_vesait->{'name_'.app()->getLocale()} }}</label>
                                    @endforeach

                                </div>
                                <small class="web_gosteris-error"></small>
                            </div>
                            <br>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-webbrief-gosterisvesaitidiger">
                                    <label class="control-label" for="webbrief-gosterisvesaitidiger">{{ __('static.modal_2_label_14') }}</label>
                                    <textarea id="webbrief-gosterisvesaitidiger" class="form-control"
                                              name="web_gosterisvesaitidiger" rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_gosterisvesaitidiger-error"></small>
                                </div>
                            </label>

                        </section>
                    </fieldset>

                    <fieldset>
                        <section>
                            <label class="label">{{ __('static.modal_2_label_15') }}</label>
                            <div class="col col-12">
                                <div class="inline-group">
                                    <div style="margin-top: 1.7em" class="col col-5">
                                        <div style="margin-top: 20px">
                                            <label class="checkbox checkbok-dil"><input type="checkbox" id="webbrief-az"
                                                                                        name="web_az" value="1"><i></i>Az</label>

                                            <label class="checkbox checkbok-dil"><input type="checkbox" id="webbrief-en"
                                                                                        name="web_en" value="2"><i></i>En</label>

                                            <label class="checkbox checkbok-dil"><input type="checkbox" id="webbrief-ru"
                                                                                        name="web_ru" value="3"><i></i>Ru</label>
                                        </div>
                                        <div class="row">
                                            <small class="web_az-error"></small>
                                            <small class="web_en-error"></small>
                                            <small class="web_ru-error"></small>
                                        </div>
                                    </div>
                                    <div class="col col-7">
                                        <label></label>
                                        <label class="textarea ">
                                            <div class="form-group field-webbrief-qeydler">
                                                <label class="control-label" for="webbrief-qeydler">{{ __('static.modal_2_label_16') }}</label>
                                                <textarea id="webbrief-qeydler" class="form-control" name="web_qeydler"
                                                          rows="1"></textarea>

                                                <div class="help-block"></div>
                                                <small class="web_qeydler-error"></small>
                                            </div> <br>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </fieldset>

                    <fieldset>
                        <section>
                            <label class="label"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-webbrief-menu">
                                    <label class="control-label" for="webbrief-menu">{{ __('static.modal_2_label_17') }}</label>
                                    <textarea id="webbrief-menu" class="form-control" name="web_menu" rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_menu-error"></small>
                                </div>
                            </label>
                        </section>
                    </fieldset>

                    <fieldset>
                        <div class="row">
                            <section class="col col-12">
                                <label class="label" style="padding-bottom: 15px">{{ __('static.modal_2_label_18') }}</label>
                                <label class="toggle"><input type="checkbox" id="webbrief-imkanlar1" class="checkbok"
                                                             name="web_imkanlar1" value="1"><i></i>{{ __('static.modal_2_label_19') }}</label>
                                <small class="web_imkanlar1-error"></small>
                                <label class="toggle"><input type="checkbox" id="webbrief-imkanlar2" class="checkbok"
                                                             name="web_imkanlar2" value="1"><i></i>{{ __('static.modal_2_label_20') }}</label>
                                <small class="web_imkanlar2-error"></small>
                                <label class="toggle"><input type="checkbox" id="webbrief-imkanlar3" class="checkbok"
                                                             name="web_imkanlar3" value="1"><i></i>{{ __('static.modal_2_label_21') }}</label>
                                <small class="web_imkanlar3-error"></small>
                                <label class="toggle"><input type="checkbox" id="webbrief-imkanlar4" class="checkbok"
                                                             name="web_imkanlar4" value="1"><i></i>{{ __('static.modal_2_label_22') }}</label>
                                <small class="web_imkanlar4-error"></small>
                                <label class="toggle"><input type="checkbox" id="webbrief-imkanlar5" class="checkbok"
                                                             name="web_imkanlar5" value="1"><i></i>{{ __('static.modal_2_label_23') }}</label>
                                <small class="web_imkanlar5-error"></small>
                            </section>
                        </div>
                    </fieldset>

                    <fieldset>
                        <label class="label labels mt-4">{{ __('static.modal_1_label_19') }}</label>

                        <label class="textarea mt-4">

                            <div class="form-group field-webbrief-ad required">
                                <label class="control-label" for="webbrief-ad"></label>
                                <textarea type="text" id="webbrief-ad" class="form-control" name="web_ad" rows="1"
                                          placeholder="{{ __('static.modal_1_label_20') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="web_ad-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-webbrief-vezife required">
                                <label class="control-label" for="webbrief-vezife"></label>
                                <textarea type="text" id="webbrief-vezife" class="form-control" name="web_vezife" rows="1"
                                          placeholder="{{ __('static.modal_1_label_21') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="web_vezife-error"></small>
                            </div>
                        </label>


                        <label class="textarea mt-4">

                            <div class="form-group field-webbrief-telefon required">
                                <label class="control-label" for="webbrief-telefon"></label>
                                <textarea type="text" id="webbrief-telefon" class="form-control" name="web_telefon" rows="1"
                                          placeholder="{{ __('static.modal_1_label_22') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="web_telefon-error"></small>
                            </div>
                        </label>



                        <label class="textarea mt-4">

                            <div class="form-group field-webbrief-email required">
                                <label class="control-label" for="webbrief-email"></label>
                                <textarea type="email" id="webbrief-email" class="form-control" name="web_email" rows="1"
                                          placeholder="{{ __('static.modal_1_label_23') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="web_email-error"></small>
                            </div>
                        </label>


                        <section>

                            <label class="textarea mt-4">

                                <div class="form-group field-webbrief-vaxt required">
                                    <label class="control-label" for="webbrief-vaxt"></label>
                                    <textarea type="text" id="webbrief-vaxt" class="form-control" name="web_vaxt" rows="1"
                                              placeholder="{{ __('static.modal_1_label_24') }}" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="web_vaxt-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary butn" id="modalTwoBtn">{{ __('static.modal_1_label_25') }}</button>
            </div>
        </div>
    </div>
</div>
