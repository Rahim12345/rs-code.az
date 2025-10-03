@extends('front.layouts.master')

@section('content')
    <!-- ==================== Start header ==================== -->
    <header class="pages-header4 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize">
                            @if (app()->getLocale() == 'az')
                                {{$blog->title_az}}
                            @elseif (app()->getLocale() == 'ru')
                                {{$blog->title_ru}}
                            @elseif (app()->getLocale() == 'en')
                                {{$blog->title_en}}
                            @endif

                            </h1>
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


        <section class="blog-pg single section-padding pt-0">
            <div class="container">
                <div class="row  justify-content-center">
                    <div class="col-lg-12">
                        <div class="post">
                            <div class="img" >
                                <img class="rounded" src="/images/blog/{{$blog->photo}}" alt="">
                            </div>
                            <div class="content">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="cont px-4">
                                            @if (app()->getLocale() == 'az')
                                                {!!$blog->text_az!!}
                                            @elseif (app()->getLocale() == 'ru')
                                                {!!$blog->text_ru!!}
                                            @elseif (app()->getLocale() == 'en')
                                                {!!$blog->text_en!!}
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== End works ==================== -->
@endsection
