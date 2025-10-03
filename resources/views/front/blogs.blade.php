@extends('front.layouts.master')

@section('content')




    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize" >{{__('index.blog')}}</h1>
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


    <!-- ==================== End header ==================== -->

    <div class="main-content">
        <!-- ==================== Start works ==================== -->

        <section class="blog-pg blog-list section-padding pt-0 position-re">
            <div class="container">

                <div class="row justify-content-center  px-4">
                    <div class="col-lg-12">
                        <div class="posts mt-80">
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
                            <div class="item mb-80 port items fadeInUp wow" data-wow-delay=".3s">
                                <div class="row">
                                    <div class="col-lg-6 valign imgLoad">
                                        <div class="img md-mb50">
                                            <img class="lozad" data-src="/images/blog/{{$b->photo}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 valign">
                                        <div class="cont">
                                            <div>
                                                <div class="info">
                                                    <a class="date">
                                                        <span><i>{{ $tarix[0] }}</i> {{ $tarix[1] }}</span>
                                                    </a>
                                                </div>
                                                @if (app()->getLocale() == 'az')
                                                <h5>
                                                    <a>{!! \Illuminate\Support\Str::limit($b->title_az, 40, "...") !!}</a>
                                                </h5>
                                                <p class="mt-10">{!! \Illuminate\Support\Str::limit($b->text_az, 150, "...") !!}</p>
                                                @elseif (app()->getLocale() == 'en')
                                                <h5>
                                                    <a>{!! \Illuminate\Support\Str::limit($b->title_en, 40, "...") !!}</a>
                                                </h5>
                                                <p class="mt-10">{!! \Illuminate\Support\Str::limit($b->text_en, 150, "...") !!}</p>
                                                @elseif (app()->getLocale() == 'ru')
                                                <h5>
                                                    <a>{!! \Illuminate\Support\Str::limit($b->title_ru, 40, "...") !!}</a>
                                                </h5> 
                                                <p class="mt-10">{!! \Illuminate\Support\Str::limit($b->text_ru, 150, "...") !!}</p>         
                                                @endif
                                                
                                                <div class="btn-more mt-30">
                                                    <a href="/blog-details/{{$b->slug}}" class="simple-btn">{{__('index.more')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== End works ==================== -->
@endsection
