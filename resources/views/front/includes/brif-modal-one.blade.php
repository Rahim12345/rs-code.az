<div class="modal fade " id="logo" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('static.modal_1_label_1') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form id="brifModalOne" class="sky-form" action="{{ route('front.brif.modal.one') }}" method="post" enctype="multipart/form-data" onsubmit="return false">

                    <fieldset>
                        <section>

                            <label class="label labels"></label>

                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-logobrief-sirketadi required">
                                    <label class="control-label" for="logobrief-sirketadi">{{ __('static.modal_1_label_2') }}</label>
                                    <textarea id="logobrief-sirketadi" class="form-control" name="sirketadi" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="sirketadi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label labels"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-logobrief-logotip required">
                                    <label class="control-label" for="logobrief-logotip">{{ __('static.modal_1_label_3') }}</label>
                                    <textarea id="logobrief-logotip" class="form-control" name="logotip" rows="3"
                                              aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="logotip-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label labels"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">

                                <div class="form-group field-logobrief-fealiyyetsahesi required">
                                    <label class="control-label" for="logobrief-fealiyyetsahesi">{{ __('static.modal_1_label_4') }}</label>
                                    <textarea id="logobrief-fealiyyetsahesi" class="form-control" name="fealiyyetsahesi"
                                              rows="3" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="fealiyyetsahesi-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label labels"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-logobrief-prespektiv">
                                    <label class="control-label" for="logobrief-prespektiv">{{ __('static.modal_1_label_5') }}</label>
                                    <textarea id="logobrief-prespektiv" class="form-control" name="prespektiv"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="prespektiv-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label labels"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-logobrief-reqibler">
                                    <label class="control-label" for="logobrief-reqibler">{{ __('static.modal_1_label_6') }}</label>
                                    <textarea id="logobrief-reqibler" class="form-control" name="reqibler"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="reqibler-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label labels"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-logobrief-fealiyyetdairesi">
                                    <label class="control-label" for="logobrief-fealiyyetdairesi">{{ __('static.modal_1_label_7') }}</label>
                                    <textarea id="logobrief-fealiyyetdairesi" class="form-control" name="fealiyyetdairesi"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="fealiyyetdairesi-error"></small>
                                </div>
                            </label>
                        </section>

                        <section>
                            <label class="label labels">{{ __('static.modal_1_label_8') }}</label>
                                    <img id="image-preview" src="" alt="Image Preview">
                            <label for="file" class="input input-file">
                                <div class="buttonBrowser butn ">
                                    <div class="form-group field-logobrief-movcudlogo">
                                        <label class="control-label" for="logobrief-movcudlogo"></label>
                                        <input type="file" id="logobrief-movcudlogo" name="movcudlogo" accept="image/*">
                                        {{ __('static.modal_1_label_9') }}
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <input type="text" readonly="">
                            </label>
                            <small class="text-danger" id="movcudlogo-error"></small>
                        </section>

                        <section>
                            <label class="label labels"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-logobrief-reng">
                                    <label class="control-label" for="logobrief-reng">{{ __('static.modal_1_label_10') }}</label>
                                    <textarea id="logobrief-reng" class="form-control" name="reng" rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="reng-error"></small>
                                </div>
                            </label>
                        </section>
                        <section>
                            <label class="label labels"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-logobrief-logotipvacibliyi">
                                    <label class="control-label" for="logobrief-logotipvacibliyi">{{ __('static.modal_1_label_11') }}</label>
                                    <textarea id="logobrief-logotipvacibliyi" class="form-control" name="logotipvacibliyi"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="logotipvacibliyi-error"></small>
                                </div>
                            </label>
                        </section>
                    </fieldset>
                    <fieldset>
                        <section style="margin-left: 12px">
                            <!-- LOGOLAR -->
                            <label class="label labels">{!! __('static.modal_1_label_12') !!}</label>
                            @foreach($logotips->chunk(4) as $chunk)
                                <div class="row">
                                    <ul class="d-flex flex-wrap justify-content-between w-100">
                                        @foreach($chunk as $item)
                                            <li class="myli">

                                                <input type="checkbox" id="myCheckbox{{ $item->id }}" class="checkbok logos husu"
                                                       name="logotipsecimi" value="{{ $item->id }}">

                                                <label for="myCheckbox{{ $item->id }}" class="logo-label">
                                                    <figure class="sign">
                                                        <p><img src="{{ asset('brif/logos/'.$item->src) }}" width="144.11" height="153.75"
                                                                alt="Скульптура"></p>
                                                        <figcaption style="width: 145px; height: 72px;">{{ $item->{'name_'.app()->getLocale()} }}
                                                        </figcaption>
                                                    </figure>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <br>
                                <br>
                            @endforeach
                            <small class="text-danger" id="logotipsecimi-error"></small>
                        </section>
                    </fieldset>

                    <fieldset>
                        <section>
                            <label class="label text-center mt-3"> {{ __('static.modal_1_label_13') }}</label>
                            <label class="label labels">{{ __('static.modal_1_label_14') }}</label>
                            <div class="row">
                                <div class="col col-12">
                                    @foreach($vizit_karts as $vizit_kartsvizit_kart)
                                        <label class="checkbox" for="logobrief-karparativkart_{{ $vizit_kartsvizit_kart->id }}"><input type="checkbox" id="logobrief-karparativkart_{{ $vizit_kartsvizit_kart->id }}" class="checkbok"
                                                                                                                                       name="karparativkart[]" value="{{ $vizit_kartsvizit_kart->id }}"><i></i>{{ $vizit_kartsvizit_kart->{'name_'.app()->getLocale()} }}</label>
                                    @endforeach
                                        <small class="text-danger" id="karparativkart-error"></small>
                                </div>
                            </div>
                        </section>
                        <section>
                            <label class="label labels">{{ __('static.modal_1_label_15') }}</label>
                            <div class="row">
                                <div class="col col-12">
                                    @foreach($konverts as $konvert)
                                        <label class="checkbox" for="logobrief-konvert_{{ $konvert->id }}"><input type="checkbox" id="logobrief-konvert_{{ $konvert->id }}" class="checkbok"
                                                                                                                  name="konvert[]" value="{{ $konvert->id }}"><i></i>{{ $konvert->{'name_'.app()->getLocale()} }}</label>
                                    @endforeach
                                        <small class="text-danger" id="konvert-error"></small>
                                </div>
                            </div>
                            <label class="label mt-3">{{ __('static.modal_1_label_16') }}</label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-logobrief-diger">
                                    <label class="control-label" for="logobrief-diger"></label>
                                    <textarea id="logobrief-diger" class="form-control" name="diger" rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="diger-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>
                    <fieldset>
                        <section>
                            <label class="label labels">{{ __('static.modal_1_label_17') }}</label>
                            <div class="row">
                                <div class="col col-12">
                                    @foreach($styles as $style)
                                        <label class="checkbox" for="logobrief-style_{{ $style->id }}"><input type="checkbox" id="logobrief-style_{{ $style->id }}" class="checkbok"
                                                                                                              name="firma_stili[]" value="{{ $style->id }}"><i></i>{{ $style->{'name_'.app()->getLocale()} }}</label>
                                    @endforeach
                                        <small class="text-danger" id="firma_stili-error"></small>
                                </div>
                            </div>
                        </section>
                    </fieldset>
                    <fieldset>
                        <section>
                            <label class="label labels mt-3"></label>
                            <label class="textarea textarea-expandable  textarea-resizable">
                                <div class="form-group field-logobrief-basqaarzu">
                                    <label class="control-label" for="logobrief-basqaarzu">{{ __('static.modal_1_label_18') }}</label>
                                    <textarea id="logobrief-basqaarzu" class="form-control" name="basqaarzu"
                                              rows="3"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="basqaarzu-error"></small>
                                </div>
                            </label>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label class="label labels mt-3">{{ __('static.modal_1_label_19') }}</label>

                        <label class="textarea mb-4">


                            <div class="form-group field-logobrief-ad required">
                                <label class="control-label" for="logobrief-ad"></label>
                                <textarea id="logobrief-ad" class="form-control" name="ad" rows="1"
                                          placeholder="{{ __('static.modal_1_label_20') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="text-danger" id="ad-error"></small>
                            </div>
                        </label>


                        <label class="textarea mb-4">


                            <div class="form-group field-logobrief-vezife required">
                                <label class="control-label" for="logobrief-vezife"></label>
                                <textarea id="logobrief-vezife" class="form-control" name="vezife" rows="1"
                                          placeholder="{{ __('static.modal_1_label_21') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="text-danger" id="vezife-error"></small>
                            </div>
                        </label>


                        <label class="textarea mb-4">


                            <div class="form-group field-logobrief-telefon required">
                                <label class="control-label" for="logobrief-telefon"></label>
                                <textarea id="logobrief-telefon" class="form-control" name="telefon" rows="1"
                                          placeholder="{{ __('static.modal_1_label_22') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="text-danger" id="telefon-error"></small>
                            </div>
                        </label>



                        <label class="textarea mb-4">


                            <div class="form-group field-logobrief-email required">
                                <label class="control-label" for="logobrief-email"></label>
                                <textarea id="logobrief-email" class="form-control" name="email" rows="1"
                                          placeholder="{{ __('static.modal_1_label_23') }}" aria-required="true"></textarea>

                                <div class="help-block"></div>
                                <small class="text-danger" id="email-error"></small>
                            </div>
                        </label>


                        <section>

                            <label class="textarea">


                                <div class="form-group field-logobrief-vaxt required">
                                    <label class="control-label" for="logobrief-vaxt"></label>
                                    <textarea id="logobrief-vaxt" class="form-control" name="vaxt" rows="1"
                                              placeholder="{{ __('static.modal_1_label_24') }}:" aria-required="true"></textarea>

                                    <div class="help-block"></div>
                                    <small class="text-danger" id="vaxt-error"></small>
                                </div>
                            </label>
                        </section>

                    </fieldset>


                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary butn" id="modalOneBtn">{{ __('static.modal_1_label_25') }}</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Get references to the input and image elements
    const imageInput = document.getElementById("logobrief-movcudlogo");
    const imagePreview = document.getElementById("image-preview");

    // Add an event listener to the input element to trigger the image preview
    imageInput.addEventListener("change", function() {
        const selectedImage = imageInput.files[0];

        if (selectedImage) {
            // Create a FileReader to read the selected image file
            const reader = new FileReader();

            reader.onload = function(e) {
                // Set the src attribute of the image element to display the preview
                imagePreview.src = e.target.result;
                imagePreview.style.display = "block"; // Display the image preview
            };

            // Read the selected image as a data URL
            reader.readAsDataURL(selectedImage);
        } else {
            // If no image is selected, hide the image preview
            imagePreview.style.display = "none";
        }
    });
</script>
