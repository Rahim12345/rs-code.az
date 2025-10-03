@extends('front.layouts.master')

@section('content')


    <!-- ==================== Start header ==================== -->

    <header class="pages-header2  circle-bg valign position-re sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-11">
                    <div class="capt">
                        <div class="text-center">
                            <h1 class="color-font mb-10 fw-700">{{__('contact.contactus')}}</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="circle-color">
            <div class="gradient-circle"></div>
            <div class="gradient-circle two"></div>
        </div>
    </header>

    <!-- ==================== End header ==================== -->


    <!-- ==================== Start main-content ==================== -->

    <div class="main-content">

        <!-- ==================== Start Contact ==================== -->

        <section class="contact fullwidth section-pad">
            <div class="container px-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form md-mb50">

                            <h4 class="fw-700 color-font mb-50">{{__('contact.writemessage')}}</h4>

                            <form id="contact-form" method="post" action="{{ route('contact.post') }}" onsubmit="return false">
                                @csrf
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <input id="form_sirket" class="input" type="text" name="sirket" placeholder="{{__('contact.sirket')}}"
                                               required="required">
                                        <small class="text-danger" id="sirket-error"></small>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input id="form_name" class="input" type="text" name="name" placeholder="{{__('contact.yourname')}}"
                                            required="required">
                                        <small class="text-danger" id="name-error"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input id="form_elaqe_nomresi" class="input" type="text" name="elaqe_nomresi" placeholder="{{__('contact.elaqe_nomresi')}}"
                                            required="required">
                                        <small class="text-danger" id="elaqe_nomresi-error"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input id="form_email" class="input" type="email" name="email2" placeholder="{{__('contact.email')}}"
                                               required="required">
                                        <small class="text-danger" id="email2-error"></small>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <textarea id="form_message" name="message" placeholder="{{__('contact.yourmessage')}}" rows="4"
                                            required="required"></textarea>
                                        <small class="text-danger" id="message-error"></small>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input style="opacity: 1;margin-left: 0px;" id="contactBtn" onmouseover="$(this).css('cursor','pointer')" type="button" class="butn mesajrep btn float-right" value="{{__('contact.send')}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="cont-info">
                            <h4 class="fw-700 color-font mb-50">{{__('index.contact')}}</h4>
                            <h3 class="wow" data-splitting>{{__('contact.email')}}

                            </h3>
                            <div class="item mb-40">
                                <h5><a href="mailto:info@rs-code.az">info@rs-code.az</a></h5>
                                <h3 class="wow" data-splitting>{{__('contact.phone')}}
                                <h5><a href="tel:+994775829989">+994(77) 582-99-89</a></h5>

                            </div>
                            <h3 class="wow" data-splitting>{{__('index.address')}}
                            </h3>
                            <div class="item">
                                <h6>{{__('contact.baku1')}}
                                    <br>{{__('contact.baku2')}}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== End Contact ==================== -->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#contactBtn').click(function () {
                $(this).prop('disabled',true);

                $('#sirket-error, #name-error, #elaqe_nomresi-error, #email2-error, #email2-error, #message-error').html('');

                let contactForm = document.getElementById("contact-form");
                let data = new FormData(contactForm);
                $.ajax({
                    url: '{!! route('contact.post') !!}',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (response) {
                        toastr.success(response.message);
                        document.getElementById("contact-form").reset();
                        $('#contactBtn').prop('disabled',false);
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, value) {
                            $('#' +key+ '-error').html('').html(value);
                        });
                        $('#contactBtn').prop('disabled',false);
                    }
                });
            });
        });
    </script>
@endsection
