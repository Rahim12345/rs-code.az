
@extends('front.layouts.master')

@section('content')


    <!-- ==================== Start Slider ==================== -->

    <header class="pages-header2 aboutUs circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="cont">
                        <h1 class="color-font fw-700 fontsize" >{{__('index.about')}}</h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="half sub-bg">
            <div class="circle-color">
                <div class="gradient-circle"></div>
                <div class="gradient-circle two"></div>
            </div>
        </div>
    </header>

    <!-- ==================== End Slider ==================== -->


    <div class="main-content">
        <!-- ==================== Start Intro ==================== -->

        <section class="intro-section fullwidth sec3 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="htit sm-mb30">
                            <h4>{{__('about.whowe')}}</h4>
                        </div>
                    </div>
                    <div class="col-lg-8  offset-lg-1 col-md-8">
                        <div class="text">
                            <p class="color-font fw-700 text-center wow fadeInLeft" data-splitting data-wow-delay=".2s">{{__('about.about1')}}</p>
                            <p class="wow txt mb-10 font fadeInLeft" data-splitting data-wow-delay=".2s">{{__('about.about2')}}
                            </p>
                            <p class="wow txt font fontc wow fadeInLeft" data-splitting data-wow-delay=".2s">{{__('about.about3')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ==================== End Team ==================== -->
        <section class="min-area fullwidth">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img">
                            <img class="thumparallax-down" src="images/about/bg.png" alt="about">
                        </div>
                    </div>
                    <div class="col-lg-6 valign">
                        <div class="content pt-0">
                            <h4 class="wow color-font text-center" alt="invite">{{__('about.invite')}}</h4>
                            <p class="wow txt" data-splitting>{{__('about.invite2')}}
                            </p>
                            <ul class="feat">
                                <li class="wow fadeInUp" data-wow-delay=".2s">
                                    <h6><span>1</span> {{__('about.ourmission')}}</h6>
                                    <p>{{__('about.ourmissiond')}}</p>
                                </li>
                                <li class="wow fadeInUp" data-wow-delay=".4s">
                                    <h6><span>2</span> {{__('about.ourvision')}}</h6>
                                    <p>{{__('about.ourvisiond')}}</p>
                                </li>
                                <li class="wow fadeInUp" data-wow-delay=".6s">
                                    <h6><span>3</span>{{__('about.whatservices')}}</h6>
                                    <p>{{__('about.whatservicesd')}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- ==================== Start clients Brands ==================== -->

        <section class="team teamSecond fullwidth ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-10">
                        <div class="sec-head text-center">
                            <!-- <h6 class="wow fadeIn" data-wow-delay=".5s"></h6> -->
                            <h3 class="wow color-font wow fadeIn" data-wow-delay=".5s">{{__('about.proteam')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper speed">

                                @foreach($works as $work)
                                    <div class="col-lg-3 col-md-6 swiper-slide">
                                        <div class="item cir md-mb50">
                                            <div class="img">
                                                <img src="{{ asset('files/teams/'.$work->src) }}" alt="">
                                                <div class="info">
                                                    <h6>{{ $work->full_name }}</h6>
                                                    <p>{{ $work->professional }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="team teamFirst section-padding2 position-re work-carousel caroul">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="sec-head text-center">
                            <!-- <h6 class="wow fadeIn" data-wow-delay=".5s"></h6> -->
                            <h3 class="wow color-font wow fadeIn" data-wow-delay=".5s">{{__('about.proteam')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper speed">

                                @foreach($works as $work)
                                    <div class="col-lg-3 col-md-6 swiper-slide">
                                        <div class="item cir md-mb50">
                                            <div class="img">
                                                <img src="{{ asset('files/teams/'.$work->src) }}" alt="">
                                                <div class="info">
                                                    <h6>{{ $work->full_name }}</h6>
                                                    <p>{{ $work->professional }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer d-none" style="background-color: #ccc; border-radius: 20px;">
                                <i class="ion-ios-arrow-right"></i>
                            </div>
                            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer d-none" style="background-color: #ccc; border-radius: 20px;">
                                <i class="ion-ios-arrow-left"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

@endsection

