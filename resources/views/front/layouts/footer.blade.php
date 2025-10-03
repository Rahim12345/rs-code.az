<footer data-overlay-dark="0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-12 pt-20 footerOne">
                <div class="item">
                    <div class="title">
                        <h5>{{__('index.contact')}}</h5>
                    </div>
                    <ul>
                        <div class="logo">
                            <a href="/"><img style="width:250px;margin-left: -45px" class="lozad"
                                             data-src="{{ asset('img/rs-code.png') }}"
                                             alt="{{ config('app.name') }}"></a>
                        </div>
                        <li>
                            <span class="icon pe-7s-mail"></span>
                            <div class="cont">

                                <p><a href="mailto:info@rs-code.az">info@rs-code.az</a></p>
                            </div>
                        </li>
                        <li>
                            <span class="icon pe-7s-call"></span>
                            <div class="cont">
                                <p class="nump">+994(77) 582-99-89</p>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 pt-20 footerTwo">
                <div class="item">
                    <div class="title">
                        <h5>{{__('index.transitions')}}</h5>
                    </div>
                    <ul>
                        <li><a href="/veb-saytlarin-hazirlanmasi">{{__('footer.website')}}</a></li>
                        <li><a href="/seo-xidmeti">{{__('footer.seo')}}</a></li>
                        <li><a href="/smm-xidmeti">{{__('footer.smm')}}</a></li>
                        <li><a href="/google-reklamlari">{{__('footer.google')}}</a></li>
                        <li><a href="/loqo-hazirlanmasi">{{__('footer.logo')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 pt-20 footerThree">
                <div class="item">
                    <div class="title">
                        <h5>&nbsp;</h5>
                    </div>
                    <ul>
                        <li><a href="/backlink-nedir">{{__('footer.backlink')}}</a></li>
                        <li><a href="/domen-nedir">{{__('footer.domen')}}</a></li>
                        <li><a href="/facebook-ve-instagram-reklamlari">{{__('footer.facebook')}}</a></li>
                        <li><a href="/ssl-sertifikati-nedir">{{__('footer.ssl')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="col-md-12 down">
            <div class="footer_down">
                <h1><a href="{{ config('app.url') }}">{{ config('app.name') }} &copy; {{ date('Y') }} </a></h1>
            </div>
        </div>
    </div>
    <div class="circle-blur"></div>
    <div class="circle-blur two"></div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="{{ asset('js/plugins.js?v='.time()) }}"></script>
<script type="text/javascript">
    const observer = lozad();
    observer.observe();
    $('.carousel').carousel({
        interval: 1000
    });

    function recaptcha_callback() {
        $('.mesajrep').removeAttr('disabled');
        $('.mesajrep').addClass('opacity');
    };
</script>
<script type="text/javascript" src="{{ asset('js/scripts.js?v='.time()) }}"></script>

<script src="{{ asset('js/web-brief.js?v=1') }}"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#modalOneBtn').click(function () {
            $('#sirketadi-error').html('');
            $('#logotip-error').html('');
            $('#fealiyyetsahesi-error').html('');
            $('#prespektiv-error').html('');
            $('#reqibler-error').html('');
            $('#fealiyyetdairesi-error').html('');
            $('#movcudlogo-error').html('');
            $('#reng-error').html('');
            $('#logotipvacibliyi-error').html('');
            $('#logotipsecimi-error').html('');
            $('#karparativkart-error').html('');
            $('#konvert-error').html('');
            $('#diger-error').html('');
            $('#firma_stili-error').html('');
            $('#basqaarzu-error').html('');
            $('#ad-error').html('');
            $('#vezife-error').html('');
            $('#telefon-error').html('');
            $('#email-error').html('');
            $('#vaxt-error').html('');
            var form = document.getElementById('brifModalOne');
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '{!! route('front.brif.modal.one') !!}',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.close').click();
                    $('#brifModalOne').trigger("reset");
                    toastr.success(response.message);
                },
                error: function (myErrors) {
                    $.each(myErrors.responseJSON.errors, function (key, error) {

                        if (key.search('konvert') > -1) {
                            $('#konvert-error').html(error);
                        } else if (key.search('karparativkart') > -1) {
                            $('#karparativkart-error').html(error);
                        } else if (key.search('logotipsecimi') > -1) {
                            $('#logotipsecimi-error').html(error);
                        } else if (key.search('firma_stili') > -1) {
                            $('#firma_stili-error').html(error);
                        } else {
                            $('#' + key + '-error').html(error);
                        }
                    });
                }
            });
        });

        $('#modalTwoBtn').click(function () {
            $('.web_sirketadi-error').html('');
            $('.web_logotip-error').html('');
            $('.web_fealiyyetsahesi-error').html('');
            $('.web_prespektiv-error').html('');
            $('.web_reqibler-error').html('');
            $('.web_firmastili-error').html('');
            $('.web_firmastilidiger-error').html('');
            $('.web_gosteris-error').html('');
            $('.web_gosterisvesaitidiger-error').html('');
            $('.web_az-error').html('');
            $('.web_en-error').html('');
            $('.web_ru-error').html('');
            $('.web_qeydler-error').html('');
            $('.web_menu-error').html('');
            $('.web_imkanlar1-error').html('');
            $('.web_imkanlar2-error').html('');
            $('.web_imkanlar3-error').html('');
            $('.web_imkanlar4-error').html('');
            $('#web_imkanlar5-error').html('');
            $('.web_ad-error').html('');
            $('.web_vezife-error').html('');
            $('.web_telefon-error').html('');
            $('.web_email-error').html('');
            $('.web_vaxt-error').html('');
            var form = document.getElementById('brifModalTwo');
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '{!! route('front.brif.modal.two') !!}',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.close').click();
                    $('#brifModalTwo').trigger("reset");
                    toastr.success(response.message);
                },
                error: function (myErrors) {
                    if (typeof myErrors.responseJSON !== "undefined") {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            $('.' + key + '-error').html(error);
                        });
                    }
                }
            });
        });

        $('#modalThreeBtn').click(function () {
            $('.adlandirma_sirketadi-error').html('');
            $('.adlandirma_seqment-error').html('');
            $('.adlandirma_hedef-error').html('');
            $('.adlandirma_ugurluadlar-error').html('');
            $('.adlandirma_teessurat-error').html('');
            $('.adlandirma_xaricidil-error').html('');
            $('.adlandirma_sozlerinsayi-error').html('');
            $('.adlandirma_elaveistek-error').html('');
            $('.adlandirma_ad-error').html('');
            $('.adlandirma_vezife-error').html('');
            $('.adlandirma_telefon-error').html('');
            $('.adlandirma_email-error').html('');
            $('.adlandirma_vaxt-error').html('');

            var form = document.getElementById('brifModalThree');
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '{!! route('front.brif.modal.three') !!}',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.close').click();
                    $('#brifModalThree').trigger("reset");
                    toastr.success(response.message);
                },
                error: function (myErrors) {
                    if (typeof myErrors.responseJSON !== "undefined") {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            $('.' + key + '-error').html(error);
                        });
                    }
                }
            });
        });

        $('#modalFourBtn').click(function () {
            $('.smm_sirketadi-error').html('');
            $('.smm_sirketsahesi-error').html('');
            $('.smm_sirkethaqqinda-error').html('');
            $('.web_gosteris-error').html('');
            $('.smm_ayligpost-error').html('');
            $('.smm_gozlenti-error').html('');
            $('.smm_ayligbudce-error').html('');
            $('.smm_reqibler-error').html('');
            $('.smm_cavablandirma-error').html('');
            $('.smm_ad-error').html('');
            $('.smm_vezife-error').html('');
            $('.smm_telefon-error').html('');
            $('.smm_email-error').html('');
            $('.smm_vaxt-error').html('');

            var form = document.getElementById('brifModalFour');
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '{!! route('front.brif.modal.four') !!}',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.close').click();
                    $('#brifModalFour').trigger("reset");
                    toastr.success(response.message);
                },
                error: function (myErrors) {
                    if (typeof myErrors.responseJSON !== "undefined") {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            $('.' + key + '-error').html(error);
                        });
                    }
                }
            });
        });

        $('#brifModalFivez').click(function () {
            $('.seo_sirketadi-error').html('');
            $('.seo_sirketsahesi-error').html('');
            $('.seo_sirkethaqqinda-error').html('');
            $('.seo_vebsayt-error').html('');
            $('.seo_acarsozler-error').html('');
            $('.seo_budce-error').html('');
            $('.seo_ad-error').html('');
            $('.seo_vezife-error').html('');
            $('.seo_telefon-error').html('');
            $('.seo_email-error').html('');
            $('.seo_vaxt-error').html('');

            var form = document.getElementById('brifModalFive');
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '{!! route('front.brif.modal.five') !!}',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.close').click();
                    $('#brifModalFive').trigger("reset");
                    toastr.success(response.message);
                },
                error: function (myErrors) {
                    if (typeof myErrors.responseJSON !== "undefined") {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            $('.' + key + '-error').html(error);
                        });
                    }
                }
            });
        });
    });
</script>

@yield('js')

</body>
</html>
