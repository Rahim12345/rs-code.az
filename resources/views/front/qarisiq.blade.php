{{--
<header class="slider slider-prlx fixed-slider text-center">
    <div class="swiper-container parallax-slider imgLoad">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="bg-img valign lozad" data-background="/img/slid/01.jpg" data-overlay-dark="6"
                    data-bs-interval="6000">
                    <div class="container">
                        <div class="row justify-content-start text-right">
                            <div class="col-lg-8 col-md-10">
                                <div class="caption center mt-30">
                                    <h1>
                                        {{__('index.digital1')}} <span>{{__('index.digital2')}} </span> <br />
                                        <span class="color-font"> {{__('index.digital3')}} </span>
                                        <span></span>
                                    </h1>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-img valign lozad" data-background="/img/slid/02.jpg" data-overlay-dark="6">
                    <div class="container">
                        <div class="row justify-content-start text-right">
                            <div class="col-lg-7 col-md-9">
                                <div class="caption center mt-30">
                                    <h1 class="color-font">{{__('index.develop1')}} </h1>
                                    <h1><span> {{__('index.develop2')}}</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-img valign lozad" data-background="/img/slid/03.jpg" data-overlay-dark="6">
                    <div class="container">
                        <div class="row justify-content-start text-right">
                            <div class="col-lg-7 col-md-9">
                                <div class="caption center mt-30">
                                        <h1 class="color-font">{{__('index.seo1')}} </h1>
                                        <h1><span>{{__('index.seo2')}}</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="setone setwo">
            <div class="
                        swiper-button-next swiper-nav-ctrl
                        next-ctrl
                        cursor-pointer
                    ">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                <i class="fas fa-chevron-left"></i>
            </div>
        </div>
        <div class="swiper-pagination top botm"></div>
    </div>
</header>



 <div class="intro-text wow fadeInLeft" data-wow-delay="1.1s">
            <h2> {{__('index.one')}}<br>
                <span id="dinamicWords"> {{__('index.thr')}}</span>
                <br>
                {{__('index.two')}}
            </h2>
            <div>
                <a href="/works" class="animated shake slower btn-get-started scrollto">{{__('index.layihe')}}</a>
                <a href="/services" class="animated shake slower btn-services scrollto">{{__('index.xidm')}}</a>
            </div>
        </div>
background: url(../img/main_bg.webp) center bottom no-repeat;
 <a class="get-callout action-button fontbold" title={{__('index.intro7')}} onclick="openModal();" id="BtnM3" data-action="order"> {{__('index.intro7')}}</a>
--}}

{{--
<section class="services2 bords section-padding2 pt-0 position-re">
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 pb-50">
            <div class="sec-head text-center">
                <h6 class="wow fadeIn" data-wow-delay=".5s"></h6>
                <h3 class="wow color-font fontsize wow fadeIn" data-wow-delay=".5s">{{__('index.services')}}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 wow fadeInLeft" data-wow-delay=".4s">
            <div class="item-box md-mb50">
                <span class="icon pe-7s-server"></span>
                <h6>{{__('index.service1')}}</h6>
                <p class="p-1">{{__('index.service1d')}}</p>
            </div>
        </div>
        <div class="col-lg-4 wow fadeInLeft  " data-wow-delay=".2s">
            <div class="item-box md-mb50 active">
                <span class="icon pe-7s-browser"></span>
                <h6>{{__('index.service2')}}</h6>
                <p class="p-1">
                    {{__('index.service2d')}}
                </p>
            </div>
        </div>
        <div class="col-lg-4 wow fadeInLeft " data-wow-delay=".6s">
            <div class="item-box">
                <span class="icon pe-7s-graph1"></span>
                <h6>{{__('index.service3')}}</h6>
                <p class="p-1">
                    {{__('index.service3d')}}
                </p>
            </div>
        </div>
    </div>
       <div class="btna mb-30">
        <a href="/services" class="butn dark curve mt-30">
            <span>{{__('index.allservices')}}</span>
        </a>
    </div>
    {{__('index.order')}}


</div>

</section>
--}}

{{-- <section class="clients section-padding position-re">

    <div class="container px-5">
        <div class="row">
            <div class="col-lg-4 valign md-mb50">
                <div class="sec-head mb-0">
                    <h6 class="wow fadeIn" data-wow-delay=".5s" style="font-size: 2rem;">
                        {{__('index.choose1')}}
                    </h6>
                    <h3 class="wow mb-20 color-font fontsize">{{__('index.choose2')}}</h3>
                </div>
            </div>
            <div class="col-lg-8">
                <div>
                    <div class="row bord">
                        @foreach ($partners as $p)
                        <div class="col-md-3 col-6 brands">
                            <div class="item wow fadeIn" data-wow-delay=".3s">
                                <div class="img imgLoad">
                                    <img class="lozad" data-src="images/partners/{{$p->logo}}" alt="{{$p->name}}" />
                                    <a href="{{$p->link}}" target="_blank" class="link" data-splitting>{{$p->name}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line top left"></div>

</section> --}}

{{--
<section class="blog-grid section-padding position-re">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="sec-head text-center">
                <h6 class="wow color-font fadeIn fontsize" data-wow-delay=".5s">{{__('index.blog')}}</h6>
                <h3 class="wow  pb-20">{{__('index.articles')}}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="swiper-container">
            <div class="swiper-wrapper speed">
                @foreach ($blogs as $b)


                    @if (app()->getLocale() == 'az')
                        @php
                        $tarix = explode(" ", $b->date_az);
                        @endphp
                    @elseif (app()->getLocale() == 'ru')
                        @php
                            $tarix = explode(" ", $b->date_ru);
                        @endphp
                    @elseif (app()->getLocale() == 'en')
                        @php
                            $tarix = explode(" ", $b->date_en);
                        @endphp
                    @endif


                <div class="col-lg-4 wow fadeInUp swiper-slide" data-wow-delay=".3s">
                    <div class="item bg-img" data-background="/images/blog/{{$b->photo}}">
                        <div class="cont ">
                            <a class="date">
                              <span class="colorblack"><i>{{ $tarix[0] }}</i> {{ $tarix[1] }} </span>


</a>
<div class="info">
    <a class="author">
        <span class="colorblack">{{__('index.byinfo')}}</span>
    </a>
</div>
<h6>
    @if (app()->getLocale() == 'az')
        <a class="colorblack">{{$b->title_az}}</a>
    @elseif (app()->getLocale() == 'ru')
        <a class="colorblack">{{$b->title_ru}}</a>
    @elseif (app()->getLocale() == 'en')
        <a class="colorblack">{{$b->title_en}}</a>
    @endif
</h6>
<div class="btn-more ">
    <a href="/blog-details/{{$b->slug}}" class="simple-btn blogBtn">{{__('index.more')}}</a>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>

</div>

</div>
<div class="btna mb-10">
<a href="/blogs" class="butn curve mt-30">
    <span>{{__('index.allblogs')}}</span>
</a>
</div>
<div class="line top right"></div>
<div class="line bottom left"></div>
</section>
--}}

{{--
<section class="testimonial">
    <div class="container position-re">
        <div class="row wow fadeInUp" data-wow-delay=".5s">
            <div class="col-lg-6 d-none d-lg-block">
                <ol class="carousel-indicators tabs imgLoad" >
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($comments as $c)

                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="testimonialImg" data-interval="2000">
                        <figure >
                            <img class="lozad" data-src="/images/comments/{{$c->photo}}" class="img-fluid" alt="">
                        </figure>
                    </li>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </ol>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center position-re">
                <div id="carouselExampleIndicators" data-interval="false" class="carousel slide" data-ride="carousel">
                    <h1 class="wow color-font fadeIn">{{__('index.feedbacks')}}</h1>
                    <h3 class="wow">{{__('index.customersay')}}</h3>
                    <div class="lineb"></div>
                    <div class="carousel-inner">
                        @foreach ($comments as $c)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="quote-wrapper">

                                <p style="font-style: italic;">
                                    @if (app()->getLocale() == 'az')
                                        {{$c->comment_az}}
                                    @elseif (app()->getLocale() == 'ru')
                                        {{$c->comment_ru}}
                                    @elseif (app()->getLocale() == 'en')
                                        {{$c->comment_en}}
                                    @endif

                                    </p>
                                <h3 class="color-font">
                                    @if (app()->getLocale() == 'az')
                                        {{$c->name_az}}
                                    @elseif (app()->getLocale() == 'ru')
                                        {{$c->name_ru}}
                                    @elseif (app()->getLocale() == 'en')
                                        {{$c->name_en}}
                                    @endif</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="lineb"></div>
                    <ol class="carousel-indicators indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
--}}

{{--
intro css


.intro{
  padding:90px 0;
  margin-bottom: 2rem;
  z-index: 3;
  min-height: 95vh;
  background: url(https://hellloexpert.com/tf/html/oule-live/assets/images/slider/hero-shape-1.png) center center/cover no-repeat local;
}

.intro.full-width {
  width: 100vw;
  margin-left: -50vw;
  margin-right: -50vw;
  left: 50%;
  right: 50%;
  position: relative;
}
.intro .container{
  width: 1300px;
  margin: 0 auto;
  max-width: 90%;
  position: relative;
  z-index: 7;
}
.intro .container .slides-content{
  display: flex;
}
.intro .container .slides-blocks {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  position: relative;
  width: 85%;
  margin-bottom: 45px;
}
.intro .container .slide-subheading{
  background: #0f5356;
  color: white;
  display: table;
  padding: 3px 15px;
  font-size: 25px;
  line-height: 70px;
  width: max-content;
  margin-right: 50px;
}
.intro .container .slides-content h1 {
  font-size: 48px;
  line-height: 1.1;
  margin-top: 15px;

  color: #444;
}


.intro .container .features-blocks{
  display: flex;
  flex-wrap: wrap;
  margin-bottom: -120px;
  position: relative;
  z-index: 1;
}
.intro .container .feature-block-first{
  width: 400px;
  z-index: 1;
}
.intro .container .features-blocks .our-features{
  background: white;
  padding: 25px 45px;
  line-height: 1.4;
  box-shadow: 0 0 25px rgb(0 0 0 / 13%);
  border: 2px solid rgba(155,89,182,.5);
}
.intro .container .features-blocks .our-features h2{
  color: #26246d;
  text-align: center;
  font-size: 30px;
  margin-bottom: 25px;
}
.intro .container .features-blocks .our-features .features{
  margin: 40px 0;
}
.intro .container .features-blocks .our-features .features .feature{
  position: relative;
  padding-left: 55px;
  width: 250px;
  margin-bottom: 20px;
  color: #666;
}
.intro .container .features-blocks .our-features .features .feature:before{
  content: '';
  background-image: url(/img/tickwhite.svg);
  background-position: center;
  background-size: 15px;
  background-repeat: no-repeat;
  width: 40px;
  height: 40px;
  background-color: #9B59B6;
  border-radius: 50%;
  display: block;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
}
.intro .container .features-blocks .our-features .feature-button {
  display: flex;
  justify-content: center;
}
.intro .container .features-blocks .feature-block-second{
  width: calc(100% - 400px);
}
.intro .container .features-blocks .feature-block-second .features-bg{
  background-image: url(https://www.merchantmaverick.com/wp-content/uploads/2016/05/small-business-website-design.jpg);
  width: calc(100% + 80px);
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-color: #0f5356;
  margin: -40px 0 0 0px;
  border-radius: 20px;
}

@media screen and (max-width: 991px){
  .intro .container .features-blocks .feature-block-second .features-bg{
    display: none;
  }
  .intro .container .feature-block-first{
    width: 100%;
    z-index: 1;
    margin: 54px;
  }
}

@media screen and (max-width: 640px){

  .intro .container .feature-block-first{
    width: 100%;
  }
}

.intro.clearfix:after{
    display: block;
    clear: both;
    content: "";
  }
  .intro .intro-img{
    width: 50%;
    float: right;
  }
  .intro .intro-text{
    width: 50%;
    float: left;
  }
  .intro .intro-text h2{
    color: #fff;
    margin-bottom: 40px;
    font-size: 48px;
    font-weight: 700;
    margin-top: 4rem;
  }
  .intro .intro-text h2 span{
    color: #d7abee;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: #000;
  }
  .intro .intro-text .btn-get-started,
  .intro .intro-text .btn-services{
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px 32px;
    border-radius: 50px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    margin: 0 20px 20px 0;
  }
  .intro .intro-text .btn-get-started:hover{
    background: #6e3cc2;
    color: #fff;
  }
  .intro .intro-text .btn-services:hover{
    background: #6e3cc2;
  }
  .intro .intro-text  a{
    text-decoration: none;
  }
  .intro .intro-text .btn-get-started{
    background: #fff;
    color: #8652DF;
  }
  .intro .intro-text .btn-services{
    border: 2px solid #fff;
  }

--}}

{{--
<section class="intro clearfix full-width">
    <div class="container">
        <div class="slides-blocks">
            <div class="slides-block slide-first wow fadeIn" data-wow-delay=".5s">
                <div class="slides-content">
                    <div class="slide-subheading">
                        {{__('index.intro')}}

                    </div>
                    <h1><span class="font"> {{__('index.intro2')}}</span></h1>
                </div>
            </div>
        </div>
        <div class="features-blocks">
            <div class="features-block feature-block-second">
                <div class="features-bg tilt"></div>
            </div>
            <div class="features-block feature-block-first">
                <div class="our-features tilt wow fadeIn" data-wow-delay=".5s">
                    <h2> {{__('index.intro3')}}</h2>
                    <div class="features">
                        <div class="feature">
                            {{__('index.intro4')}}
                        </div>
                        <div class="feature">
                            {{__('index.intro5')}}
                        </div>
                        <div class="feature">
                            {{__('index.intro6')}}
                        </div>
                    </div>
                    <div class="feature-button">
                        <button type="submit"  name="submit_audit_form" onclick="openModal();" data-action="order" id="BtnM3" class="octf-btn octf-btn-icon octf-btn-primary"><span>{{__('index.seoadiut6')}}</span><i class="fas fa-arrow-right"></i></button>

                    </div>
                </div>
            </div>

        </div>


    </div>
</section>
--}}



{{--
<section class="steps-section sub-bg bg-img lozad" data-background="img/patrn.svg">
    <div class="auto-container">
        <div class="sec-title centered wow fadeInUp" data-wow-delay=".3s">
            <div class="title">{{__('index.step')}}</div>
            <h2>{{__('index.step1')}} <br> {{__('index.step2')}}</h2>
        </div>
        <div class="row clearfix">
            <!-- Step Block -->
            <div class="step-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                <div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    <div class="icon-box">
                        <div class="number">01</div>
                    </div>
                    <h6>{{__('index.step3')}}<br>{{__('index.step4')}}</h6>
                </div>
            </div>
            <!-- Step Block -->
            <div class="step-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
                <div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    <div class="icon-box">
                        <div class="number">02</div>
                    </div>
                    <h6>{{__('index.step5')}} <br>{{__('index.step6')}}</h6>
                </div>
            </div>
            <!-- Step Block -->
            <div class="step-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".7s">
                <div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duation="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    <div class="icon-box">
                        <div class="number">03</div>
                    </div>
                    <h6>{{__('index.step7')}} <br> {{__('index.step8')}}</h6>
                </div>
            </div>
            <!-- Step Block -->
            <div class="step-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".9s">
                <div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    <div class="icon-box">
                        <div class="number">04</div>
                    </div>
                    <h6>{{__('index.step9')}}<br> {{__('index.step10')}}</h6>
                </div>
            </div>
        </div>
    </div>
</section>



css=====================
.steps-section{
  position: relative;
  padding: 100px 0px 80px;
  background-position: center top;
  background-repeat: repeat-x;
}
@-webkit-keyframes rotatemetwo {
  0% {
    -webkit-transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    -webkit-transform: rotate(180deg);
    opacity: 0.7;
  }
  100% {
    -webkit-transform: rotate(360deg);
    opacity: 1;
  }
}
@-moz-keyframes rotatemetwo {
  0% {
    -moz-transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    -moz-transform: rotate(-180deg);
    opacity: 0.7;
  }
  100% {
    -moz-transform: rotate(-360deg);
    opacity: 1;
  }
}
@-o-keyframes rotatemetwo {
  0% {
    -o-transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    -o-transform: rotate(-180deg);
    opacity: 0.7;
  }
  100% {
    -o-transform: rotate(-360deg);
    opacity: 1;
  }
}

@keyframes rotatemetwo {

  0% {
    transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    transform: rotate(-180deg);
  }
  100% {
    transform: rotate(-360deg);
    opacity: 1;
  }
}

.step-block:nth-child(2) .inner-box .icon-box:before,
.step-block:nth-child(4) .inner-box .icon-box:before,
.service-block-five .inner-box .icon-box .dott-layer{
  animation-name: rotatemetwo;
  animation-duration: 15s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
  -webkit-animation-name: rotatemetwo;
  -webkit-animation-duration: 15s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  -moz-animation-name: rotatemetwo;
  -moz-animation-duration: 15s;
  -moz-animation-iteration-count: infinite;
  -moz-animation-timing-function: linear;
  -ms-animation-name: rotatemetwo;
  -ms-animation-duration: 15s;
  -ms-animation-iteration-count: infinite;
  -ms-animation-timing-function: linear;
  -o-animation-name: rotatemetwo;
  -o-animation-duration: 15s;
  -o-animation-iteration-count: infinite;
  -o-animation-timing-function: linear;
}
@-webkit-keyframes rotateme {
  0% {
    -webkit-transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    -webkit-transform: rotate(180deg);
    opacity: 0.7;
  }
  100% {
    -webkit-transform: rotate(360deg);
    opacity: 1;
  }
}
@-moz-keyframes rotateme {
  0% {
    -moz-transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    -moz-transform: rotate(180deg);
    opacity: 0.7;
  }
  100% {
    -moz-transform: rotate(360deg);
    opacity: 1;
  }
}
@-o-keyframes rotateme {
  0% {
    -o-transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    -o-transform: rotate(180deg);
    opacity: 0.7;
  }
  100% {
    -o-transform: rotate(360deg);
    opacity: 1;
  }
}

@keyframes rotateme {

  0% {
    transform: rotate(0deg);
    opacity: 1;
  }

  50% {
    transform: rotate(180deg);
  }
  100% {
    transform: rotate(360deg);
    opacity: 1;
  }
}


.steps-section .auto-container{
  position: static;
  max-width: 1200px;
  padding: 0px 15px;
  margin: 0 auto;
}
.steps-section .auto-container .sec-title{
  position: relative;
  margin-bottom: 55px;
}
.steps-section .auto-container .sec-title.centered{
  text-align: center !important;
}
.steps-section .auto-container .sec-title.centered .title {
  padding-left: 60px;
}
.steps-section .auto-container .sec-title .title{
  position: relative;
  color: #555555;
  font-size: 18px;
  font-weight: 600;
  padding-right: 60px;
  display: inline-block;
  text-transform: uppercase;
}
.steps-section .auto-container .sec-title h2{
  position: relative;
  color: #222222;
  font-weight: 600;
  line-height: 1.3em;
  margin-top: 10px;
}
.steps-section .auto-container .step-block {
  position: relative;
  margin-bottom: 40px;
}
.steps-section .auto-container .step-block .inner-box {
  position: relative;
  text-align: center;
}

.steps-section .auto-container .step-block .inner-box .icon-box {
  position: relative;
  width: 200px;
  height: 205px;
  text-align: center;
  line-height: 205px;
  margin: 0 auto;
}
.steps-section .step-block .inner-box .icon-box:before {
  position: absolute;
  content: '';
  left: 0px;
  top: 0px;
  right: 0px;
  bottom: 0px;
  background: url(/img/step-1.png) no-repeat;
}
.steps-section .step-block .inner-box .icon-box .number {
  position: relative;
  color: #ffffff;
  font-weight: 600;
  font-size: 36px;
}
.steps-section .inner-box h6 {
  position: relative;
  color: #222222;
  font-size: 18px;
  font-weight: 600;
  margin-top: 35px;
  text-transform: uppercase;
}
.steps-section .step-block:nth-child(1) .inner-box:before {
  position: absolute;
  content: '';
  right: -10%;
  top: 95px;
  width: 30px;
  height: 30px;
  background: url(/img/step-arrow-one.png) no-repeat;
}
.steps-section .step-block:nth-child(2) .inner-box:before {
  position: absolute;
  content: '';
  right: -10%;
  top: 95px;
  width: 30px;
  height: 30px;
  background: url(/img/step-arrow-two.png) no-repeat;
}
.steps-section .step-block:nth-child(3) .inner-box:before {
  position: absolute;
  content: '';
  right: -10%;
  top: 95px;
  width: 30px;
  height: 30px;
  background: url(/img/step-arrow-three.png) no-repeat;
}
.step-block:nth-child(2) .inner-box .icon-box:before {
  background: url(/img/step-2.png) no-repeat;
}
.step-block:nth-child(3) .inner-box .icon-box:before {
  background: url(/img/step-3.png) no-repeat;
}
.step-block:nth-child(4) .inner-box .icon-box:before {
  background: url(/img/step-4.png) no-repeat;
}
--}}

{{--
<section class="seo-area">
    <div class="container">
        <div class="seo-blocks">
            <div class="seo-block seo-first wow fadeInLeft" data-wow-delay=".3s">
                <div class="seo-image">
                    <img src="/img/seoblank.jpg" alt="seo blank" width="625" height="417" alt="">
                </div>
                <div class="seo-board fontbold">
                    <span class="font">{{__('index.seo')}} </span><span class="new-line"><br></span> {{__('index.seo3')}}</div>
            </div>
            <div class="seo-block seo-second wow fadeInRight" data-wow-delay=".5s">
                <div class="seo-heading">
                    <div class="master-sub-heading">
                        {{__('index.seo4')}}
                    </div>
                    <h2 class="master-heading fontbold"><span class="font">{{__('index.seo5')}}</span> <br>{{__('index.seo6')}}</h2>
                </div>
                <div class="seo-description">{{__('index.seo7')}}
                </div>
                <div class="seo-features">
                    <div class="seo-feature">
                        <div class="seo-icon-box">
                            <div class="seo-icon">
                                <img src="img/tick-blue.svg" width="18" height="18" alt="Web sehifelerin hazirlanmasi">
                            </div>
                            <div class="seo-icon-details">
                                <div class="seo-icon-detail fontbold">
                                    {{__('index.seo8')}}
                                </div>
                                <div class="seo-icon-description">
                                    {{__('index.seo9')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seo-feature">
                        <div class="seo-icon-box">
                            <div class="seo-icon">
                                <img src="img/tick-blue.svg" width="18" height="18" alt="Web sehifelerin hazirlanmasi">
                            </div>
                            <div class="seo-icon-details">
                                <div class="seo-icon-detail fontbold">
                                    {{__('index.seo10')}}
                                </div>
                                <div class="seo-icon-description">
                                    {{__('index.seo11')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seo-feature">
                        <div class="seo-icon-box">
                            <div class="seo-icon">
                                <img src="img/tick-blue.svg" width="18" height="18" alt="Web sehifelerin hazirlanmasi">
                            </div>
                            <div class="seo-icon-details">
                                <div class="seo-icon-detail fontbold">
                                    {{__('index.seo12')}}
                                </div>
                                <div class="seo-icon-description">
                                    {{__('index.seo13')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seo-feature">
                        <div class="seo-icon-box">
                            <div class="seo-icon">
                                <img src="img/tick-blue.svg" width="18" height="18" alt="Web sehifelerin hazirlanmasi">
                            </div>
                            <div class="seo-icon-details">
                                <div class="seo-icon-detail fontbold">
                                    {{__('index.seo14')}}
                                </div>
                                <div class="seo-icon-description">
                                    {{__('index.seo15')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
.seo-area .container{
  width: 1300px;
  margin: 0 auto;
  max-width: 90%;
  position: relative;
  z-index: 1;
}
.seo-area .seo-blocks{
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  margin: 0 -25px;
  padding: 80px 0 40px
}
.seo-area .fontbold{
  font-family: 'DM Sans', sans-serif;
  font-weight: 500!important;
}
.seo-area .seo-blocks .seo-block{
  width: 50%;
  padding: 0 25px 40px;
}
.seo-area img{
  max-width: 100%;
  border-radius: 10px;
  height: auto;
  -ms-flex-negative: 0;
  flex-shrink: 0;
  display: block;
  width: 100%;
  image-rendering: -webkit-optimize-contrast;
}
.seo-area .seo-blocks .seo-block .seo-board{
  width: 85%;
  margin: 0 auto;
  background: #0f5356;
  color: white;
  font-size: 20px;
  line-height: 1.3;
  padding: 15px 20px;
  text-align: center;
  border: 3px solid white;
  margin-top: -50px;
  z-index: 1;
  position: relative;
  box-shadow: 0 0 15px rgb(0 0 0 / 21%);
}
.seo-area .seo-blocks .seo-block .master-heading{
  font-size: 32px;
  line-height: 1.2;
  color: #000;
  margin: 0;
}
.seo-area .seo-blocks .seo-description{
  color: #666;
  margin: 30px 0;
}
.seo-area .seo-blocks .seo-block .seo-features{
  display: flex;
  flex-wrap: wrap;
  margin: 0 -15px;
}
.seo-area .seo-blocks .seo-block .seo-features .seo-feature{
  width: 50%;
  padding: 0 15px 30px;
}
.seo-area .seo-blocks .seo-block .seo-features .seo-feature .seo-icon-box{
  display: flex;
  flex-wrap: wrap;
}
.seo-area .seo-blocks .seo-block .seo-features .seo-feature .seo-icon-box .seo-icon{
  width: 40px;
  height: 40px;
  border: 1px solid #9B59B6;
  border-radius: 50%;
  padding: 10px;
}
.seo-area .seo-blocks .seo-block .seo-features .seo-feature .seo-icon-box .seo-icon-details{
  padding-left: 15px;
  width: calc(100% - 40px);
}
.seo-area .seo-blocks .seo-block .seo-features .seo-feature .seo-icon-box .seo-icon-details .seo-icon-detail{
  color: #26246d;
  font-size: 20px;
  line-height: 1.25;
}


@media screen and (max-width: 991px){
  .seo-area .seo-blocks .seo-block.seo-first {
    width: 500px;
  }
  .seo-area .seo-blocks{
    justify-content: center;
  }
  .seo-area .seo-blocks .seo-block .seo-board{
    font-size: 18px;
  }
  .seo-area .seo-blocks .seo-block.seo-second {
    width: 100%;
  }
  .seo-area .seo-blocks .seo-heading,
  .seo-area .seo-blocks .seo-description{
    text-align: center;
  }

  .seo-area .seo-blocks .seo-block .master-heading {
    font-size: 24px;
    padding-top: 5px;
  }
  .seo-icon-description {
    font-size: 15px;
  }
}

@media screen and (max-width: 640px){
  .seo-area .seo-blocks .seo-block .seo-features .seo-feature{
    width: 100%;
  }
  .seo-area .seo-blocks .seo-block{
    padding: 0 10px 40px;
  }
  .seo-area .seo-blocks .seo-block .master-heading{
    font-size: 20px;
  }
  .seo-area .seo-blocks .seo-block .seo-board{
    padding: 7px 5px;
    font-size: 13px;
  }
  .seo-area .seo-blocks .seo-block .seo-features .seo-feature .seo-icon-box .seo-icon-details .seo-icon-detail{
    font-size: 17px;
  }
  .seo-icon-description {
    font-size: 14px;
  }

}

@media screen and (max-width: 1200px)
{
  .new-line {
    display: none;
  }
  .seo-features {
    margin: 0 -10px;
  }
  .seo-feature {
    padding: 0 10px 30px;
  }
  .seo-icon-details {
    padding-left: 0;
    width: 100%;
    padding-top: 5px;
  }
}

--}}

{{--
<section class="others fullwidth">
    <div class="container-fluid others-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper" >
                <div class="swiper-slide color-first color-slide wow fadeInDown" role="group" aria-label="1 / 4" data-wow-delay=".3s">
                    <div class="color-big-heading">{{__('index.others')}}</div>
                    <div class="color-description">
                        {{__('index.others2')}}
                    </div>
                </div>
                <div class="swiper-slide color-second color-slide wow fadeInDown" role="group" aria-label="2 / 4"  data-wow-delay=".5s">
                    <div class="color-big-heading">{{__('index.others3')}}</div>
                    <div class="color-description">
                        {{__('index.others4')}}
                    </div>
                </div>
                <div class="swiper-slide color-thrid color-slide wow fadeInDown" role="group" aria-label="3 / 4"  data-wow-delay=".7s">
                    <div class="color-big-heading">{{__('index.others5')}}</div>
                    <div class="color-description">
                        {{__('index.others6')}}
                    </div>
                </div>
                <div class="swiper-slide color-fourth color-slide wow fadeInDown" role="group" aria-label="4 / 4"  data-wow-delay=".9s">
                    <div class="color-big-heading">{{__('index.others7')}}</div>
                    <div class="color-description">
                        {{__('index.others8')}}
                    </div>
                </div>
            </div>
            <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer" >
            </div>
            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer" >
            </div>
        </div>
    </div>
</section>

  /* ====================== [ OTHERS AREA START ] ====================== */

.others{
  margin-top: 6rem;
}

.others .others-slider{
  height: auto;
}
.others  .container-fluid{
  width: 100%;
  margin: 0 auto;
  max-width: 100%;
  position: relative;
  z-index: 1;
  padding: 0;
}
.others .container-fluid .swiper-wrapper{
  position: relative;
  width: 100%;
  height: 100%;
  z-index: 1;
  display: flex;
  transition-property: transform;
  box-sizing: content-box;
}
.others .container-fluid .swiper-slide{
  flex-shrink: 0;
  width: 100%;
  height: 240px;
  position: relative;
  transition-property: transform;
}
.others  .container-fluid .color-first{
  background: #f6f6f6;
}
.others .container-fluid .color-second{
  background: #f6f6f6;
}
.others .container-fluid .color-thrid{
  background: #f6f6f6;
}
.others .container-fluid .color-fourth {
  background: #f6f6f6;
}
.others .container-fluid .color-slide{
  color: white;
  padding: 25px 30px;
  border: 1px solid #ccc;
}
.others .container-fluid .color-description{
  font-size: 14px;
  color: #444;
}
.others .container-fluid .color-big-heading{
  font-size: 36px;
  line-height: 1;
  margin-bottom: 5px;
  font-weight: 600;
  color: #444;
}
.others  .container-fluid .swiper-button-next{
  right: -30px;
  left: auto;
  display: none;
}
.others  .container-fluid .swiper-button-prev{
  left: -30px;
  right: auto;
  display: none;
}

@media screen and (max-width: 1200px){
 .others  .container-fluid .swiper-button-next{
      right: 10px;
      left: auto;
      color: #fff;
      display: inherit !important;
      opacity: .7;
    }
    .others  .container-fluid .swiper-button-prev{
      left: 10px;
      right: auto;
      color: #fff;
      display: inherit !important;
      opacity: .7;
    }
}
/* ====================== [ OTHERS AREA END ] ====================== */


--}}