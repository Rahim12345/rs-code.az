@extends('front.layouts.master')

@section('content')
    <header class="slider-st  position-re">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 fgfd valign">
                    <div class="cont md-mb50">
                        <div class="sub-title mb-5">
                            <h6> {{__('index.intro')}}</h6>
                        </div>
                        <h1 class="mb-10 fw-600">{{__('index.intro2')}}</h1>

                        <a onclick="openModal();" data-action="order" id="BtnM3"
                           class="newbtn mt-30"><span>{{__('index.order')}}</span>
                            <span>
      <svg width="36px" height="36px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg"
           xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <path class="one"
                d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                fill="#FFFFFF"></path>
          <path class="two"
                d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                fill="#FFFFFF"></path>
          <path class="three"
                d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                fill="#FFFFFF"></path>
        </g>
      </svg>
    </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6  order-by">
                    <div class="img">
                        <img src="{{ asset('img/slid/homebg.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- ==================== Start Services ==================== -->
    <section class="app-services  bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="item mb-30">
                        <div class="item-tit mb-15">
                            <div class="icon">
                                <span class="pe-7s-vector"></span>
                            </div>
                            <div class="text-tit">
                                <h5>{{__('index.step3')}}<br>{{__('index.step4')}}</h5>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="item mb-30">
                        <div class="item-tit mb-15">
                            <div class="icon">
                                <span class="pe-7s-rocket"></span>
                            </div>
                            <div class="text-tit">
                                <h5>{{__('index.step5')}} <br>{{__('index.step6')}}</h5>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="item mb-30">
                        <div class="item-tit mb-15">
                            <div class="icon">
                                <span class="pe-7s-graph3"></span>
                            </div>
                            <div class="text-tit">
                                <h5>{{__('index.step7')}} <br> {{__('index.step8')}}</h5>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".9s">
                    <div class="item sm-mb50">
                        <div class="item-tit mb-15">
                            <div class="icon">
                                <span class="pe-7s-map-marker"></span>
                            </div>
                            <div class="text-tit">
                                <h5>{{__('index.step9')}}<br> {{__('index.step10')}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-us fullwidth">
        <div class="container-fluid">
            <div class="bg-color"></div>
        </div>
        <div class="container">
            <div class="header wow fadeInDown" data-wow-delay=".3s">
                <h3>{{__('index.whyus')}}</h3>
                <p>{{__('index.whyus2')}}</p>
            </div>
            <div class="row imgLoad">

                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">

                    <div class="card wow fadeInUp" data-wow-delay=".3s">
                        <div class="imag">
                            <img class="lozad" data-src="/img/new/rocket.png" width="80" height="80" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{__('index.whyus3')}}</h5>
                            <p class="card-text">{{__('index.whyus4')}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <div class="card wow fadeInUp second" data-wow-delay=".5s">
                        <div class="imag">
                            <img class="lozad" data-src="/img/new/quality.png" width="80" height="80" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{__('index.whyus5')}}</h5>
                            <p class="card-text">{{__('index.whyus6')}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <div class="card wow fadeInUp thrid" data-wow-delay=".7s">
                        <div class="imag">
                            <img class="lozad" data-src="/img/new/help.png" width="80" height="80" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{__('index.whyus7')}}</h5>
                            <p class="card-text">{{__('index.whyus8')}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== End Services ==================== -->
    <!-- ==================== SEO AREA ==================== -->
    <section class="serv-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 valign">
                    <div class="content md-mb50">
                        <h6 class="stit mb-30 wow fadeInUp" data-wow-delay=".3s"><span
                                class="left"></span> {{__('index.seo4')}}</h6>
                        <h2 class="mb-30 wow fadeInUp" data-wow-delay=".5s">{{__('index.seo5')}}</h2>
                        <div class="app-sta">
                            <div class="row">
                                <div class="col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                                    <div class="item mb-30">
                                        <span class="icon pe-7s-display1"></span>
                                        <h3>{{__('index.seo8')}}</h3>
                                        <p>{{__('index.seo9')}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 wow fadeInUp" data-wow-delay=".8s">
                                    <div class="item mb-30">
                                        <span class="icon pe-7s-graph3"></span>
                                        <h3>{{__('index.seo10')}}</h3>
                                        <p>{{__('index.seo11')}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 wow fadeInUp" data-wow-delay=".10s">
                                    <div class="item">
                                        <span class="icon pe-7s-key"></span>
                                        <h3>{{__('index.seo12')}}</h3>
                                        <p>{{__('index.seo13')}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 wow fadeInUp" data-wow-delay=".12s">
                                    <div class="item">
                                        <span class="icon pe-7s-photo"></span>
                                        <h3>{{__('index.seo14')}}</h3>
                                        <p>{{__('index.seo15')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ==================== SEO AREA ==================== -->
    <!-- ==================== EMENTOR SECTION ==================== -->
    <section class="section-seo section-seoadiut bg-white">
        <div class="section-wrapper section-padding padding-top-zero">
            <div class="mobile-margin-bottom0 sr-zoomin-td1 wow fadeInUp" data-wow-delay=".3s" id="seoadiut-con">
                <div class="row">
                    <div class="col-md-12 seoadiut-heading">
                        <h4>{{__('index.seoadiut')}}</h4>
                        <p>{{__('index.seoadiut2')}}
                        </p>
                    </div>
                    <div class="col-md-12 seoadiut-body">
                        <form action="{{ route('free-seo-audit.store') }}" method="POST" id="contact__form_seo"
                              onsubmit="return false">
                            @csrf
                            <div class="seo-score one-line-form">
                            <span class="your-url">
                                <input type="text" name="url" size="40" class="seoadiut-validates-as-url seoadiut-input"
                                       id="sayt_seoadiut" placeholder={{__('index.seoadiut3')}}>
                                <small class="text-danger" id="url-error"></small>
                            </span>
                                <span class="your-email">
                                <input type="email" name="email3" size="40"
                                       class="seoadiut-validates-as-email seoadiut-input" id="email_seoadiut"
                                       placeholder={{__('index.seoadiut4')}}>
                                <small class="text-danger" id="email3-error"></small>
                            </span>
                                <span class="your-tel">
                                <input type="text" name="tel" size="40" class="seoadiut-validates-as-tel seoadiut-input"
                                       id="nomre_seoadiut" placeholder={{__('index.seoadiut5')}}>
                                <small class="text-danger" id="tel-error"></small>
                            </span>
                                <button type="button" name="submit_audit_form"
                                        class="octf-btn octf-btn-icon octf-btn-primary auditBtn">
                                    <span>{{__('index.seoadiut6')}}</span><i class="fas fa-arrow-right"></i></button>
                            </div>
{{--                            <div class="col-12 seo_title_back">--}}
{{--                                <div class="contact__msg_seo wpcf7-response-output">--}}
{{--                                    <span class="wpcf7-spinner"></span>--}}
{{--                                    <h4 id="msg">{{__('index.seoadiut7')}}</h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ==================== ELEMENTOR SECTION ==================== -->




    <!-- ==================== Start call-to-action ==================== -->
    <section class="call-action section-padding2 sub-bg bg-img lozad" data-background="img/patrn.svg">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="content sm-mb30">
                        <h6 class="wow fadeInUp" data-splitting></h6>
                        <h2 class="wow fadeInUp" data-splitting>
                            {{__('index.business1')}} <br/>
                            <b class="back-color">{{__('index.business2')}}</b>.
                        </h2>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 valign">
                    <a onclick="openModal();" class="butn curve wow fadeInUp" id="BtnM2"
                       data-wow-delay=".5s"><span>{{__('index.order')}}</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== End call-to-action ==================== -->

    <!-- ==================== Start Blog ==================== -->
    <section class="s-pt-100 s-pt-lg-130 ds process-part skew_right s-parallax top_white_line_big overflow-visible"
             id="steps" style="background-position: 50% -16px;">
        <div class="container imgLoad">
            <div class="row align-items-center c-mb-20 c-mb-lg-60 wow fadeInUp " data-wow-delay=".3s">
                <div class="col-12 col-lg-4 col-md-12 ">
                    <div class="step-left-part text-right">
                        <h2 class="step-title">
                            <span class="color-main2">01</span>{{__('index.procces')}}</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                    <div class="step-center-part text-center ">
                        <img class="lozad" data-src="/img/processpart/meeting.webp" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-4 ">
                    <div class="step-right-part">
                        <div class="step-text"> {{__('index.procces2')}}</div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center right c-mb-20 c-mb-lg-60 wow fadeInUp" data-wow-delay=".5s">
                <div class="col-12 col-lg-4 col-md-12  order-lg-3 ">
                    <div class="step-left-part">
                        <h2 class="step-title color1">
                            <span class="color-main2">02</span>{{__('index.procces3')}}</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-4 order-lg-2 ">
                    <div class="step-center-part text-center">
                        <img class="lozad" data-src="/img/processpart/demoweb.webp" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-4 order-lg-1 text-right ">
                    <div class="step-right-part ">
                        <div class="step-text">{{__('index.procces4')}}</div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center c-mb-20 c-mb-lg-60 wow fadeInUp" data-wow-delay=".7s">
                <div class="col-12 col-lg-4 col-md-12 ">
                    <div class="step-left-part text-right part3">
                        <h2 class="step-title">
                            <span class="color-main2">03</span>{{__('index.procces5')}}</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-4 ">
                    <div class="step-center-part text-center">
                        <img class="lozad" data-src="/img/processpart/import.webp" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-4  ">
                    <div class="step-right-part">
                        <div class="step-text">{{__('index.procces6')}}</div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center right c-mb-20 c-mb-lg-60 wow fadeInUp" data-wow-delay=".9s">
                <div class="col-12 col-lg-4  col-md-12 order-lg-3 ">
                    <div class="step-left-part part4">
                        <h2 class="step-title color1">
                            <span class="color-main2">04</span>{{__('index.procces7')}}</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-4 order-lg-2 ">
                    <div class="step-center-part text-center last finish">
                        <img class="finish lozad" data-src="/img/processpart/opensite.webp" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-4 order-lg-1 text-right ">
                    <div class="step-right-part ">
                        <div class="step-text">{{__('index.procces8')}}</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ==================== End testimonials ==================== -->




    <section class="procces fullwidth">
        <div class="container">
            <div class="process-blocks imgLoad">
                <div class="process-block wow fadeInUp" data-wow-delay=".3s">
                    <div class="process-number-block">
                        <img class="lozad opacity" data-src="/img/ssl/HTTPS.webp" width="140" height="140" alt="">
                        <h4>{{__('index.others')}}</h4>
                    </div>
                    <div class="process-description">
                        {{__('index.others2')}}
                    </div>
                </div>
                <div class="process-block wow fadeInUp" data-wow-delay=".5s">
                    <div class="process-number-block">
                        <img class="lozad opacity" data-src="/img/ssl/speedg.webp" width="140" height="140" alt="">
                        <h4>{{__('index.others3')}}</h4>
                    </div>
                    <div class="process-description">
                        {{__('index.others4')}}
                    </div>
                </div>
                <div class="process-block wow fadeInUp" data-wow-delay=".7s">
                    <div class="process-number-block">
                        <img class="lozad opacity" data-src="/img/ssl/HOSTING.webp" s width="140" height="140" alt="">
                        <h4>{{__('index.others5')}}</h4>
                    </div>
                    <div class="process-description">
                        {{__('index.others6')}}
                    </div>
                </div>
                <div class="process-block wow fadeInUp" data-wow-delay=".9s">
                    <div class="process-number-block">
                        <img class="lozad opacity" data-src="/img/ssl/web.webp" width="140" height="140" alt="">
                        <h4>{{__('index.others7')}}</h4>
                    </div>
                    <div class="process-description">
                        {{__('index.others8')}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section
        class="best-area fullwidth best-slider master-slider swiper-container-initialized swiper-container-horizontal">
        <div class="container">
            <div class="swiper-container wond-wlsider imgLoad">
                <div class="swiper-wrapper">
                    <div class="swiper-slide wow fadeInUp" data-wow-delay=".3s">
                        <div class="best-thumbnail">
                            <img class="lozad" data-src="/img/new/a1.jpg" width="244" height="244" alt="">
                        </div>
                        <h3>{{__('index.mywork6')}} </h3>

                        <div class="best-description">
                            {{__('index.mywork7')}}
                        </div>
                    </div>
                    <div class="swiper-slide  wow fadeInUp" data-wow-delay=".5s">
                        <div class="best-thumbnail">
                            <img class="lozad" data-src="/img/new/a2.jpg" width="244" height="244" alt="">
                        </div>
                        <h3> {{__('index.mywork8')}}</h3>

                        <div class="best-description">
                            {{__('index.mywork9')}}
                        </div>
                    </div>
                    <div class="swiper-slide  wow fadeInUp" data-wow-delay=".7s">
                        <div class="best-thumbnail">
                            <img class="lozad" data-src="/img/new/a3.jpg" width="244" height="244" alt="">
                        </div>
                        <h3> {{__('index.mywork10')}}</h3>

                        <div class="best-description">
                            {{__('index.mywork11')}}
                        </div>
                    </div>
                    <div class="swiper-slide  wow fadeInUp" data-wow-delay=".9s">
                        <div class="best-thumbnail">
                            <img class="lozad" data-src="/img/new/a4.jpg" width="244" height="244" alt="">
                        </div>
                        <h3>{{__('index.mywork12')}}</h3>

                        <div class="best-description">
                            {{__('index.mywork13')}}
                        </div>
                    </div>
                    <div class="swiper-slide  wow fadeInUp" data-wow-delay="1.1s">
                        <div class="best-thumbnail">
                            <img class="lozad" data-src="/img/new/a5.jpg" width="244" height="244" alt="">
                        </div>
                        <h3>{{__('index.mywork14')}} </h3>

                        <div class="best-description">
                            {{__('index.mywork15')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
            </div>
            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.auditBtn').click(function () {
                $('.auditBtn').prop('disabled', true);
                $('#url-error, #email3-error, #tel-error').html('');
                var form = document.getElementById("contact__form_seo");
                var data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    url: '{!! route('free-seo-audit.store') !!}',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#contact__form_seo').trigger("reset");
                        toastr.success(response.message);
                        $('.auditBtn').prop('disabled', false);
                    },
                    error: function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, value) {
                            $('#' + key + '-error').html(value);
                        });
                        $('.auditBtn').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
