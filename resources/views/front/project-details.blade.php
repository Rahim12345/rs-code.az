@extends('front.layouts.master')

@section('content')

<div class="wrapper">
    <!-- ==================== Start Header ==================== -->

    <section class="page-header  parallaxie valign sub-bg bg-img" data-background="/img/patrn.svg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cont">
                        <h2>{{__('projectd.project1')}}</h2>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ==================== Start Header ==================== -->

    <!-- ==================== Start projdtal ==================== -->
    <section class="work-carousel metro position-re pt-70">
        <div class="container">
            <div class="row pb-10 metroAbout">
                <div class="col-lg-4 col-sm-3">
                    <div class="item mt-30">
                        <h5>{{__('projectd.project2')}}</h5>
                        <p><a  href="{{$project->link}}" target="_blank">{{$project->name}}</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="item mt-30">
                        <h5>{{__('projectd.project3')}}</h5>
                        <p><a>{{$project->tarix}}</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3" >
                    <div class="item mt-30">
                        <h5>{{__('projectd.project4')}}</h5>
                        @if ($project->kateqoriya == 'e-commerce')
                        <p><a>{{__('projectd.project5')}}</a></p>
                        @elseif ($project->kateqoriya == 'blog')
                        <p><a>{{__('projectd.project6')}}</a></p>
                        @elseif ($project->kateqoriya == 'portfolio')
                        <p><a>{{__('projectd.project7')}}</a></p>
                        @elseif ($project->kateqoriya == 'websites')
                        <p><a>{{__('projectd.project8')}}</a></p>
                        @endif

                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 metroPic">
                    <div class="swiper-container ">
                        <div class="swiper-wrapper speed">
                            @foreach ($project->images as $i)
                            <div class="swiper-slide ">
                                <div class="content wow fadeInUp" data-wow-delay=".3s">
                                    <div class="item-img bg-img wow">
                                        <img src="/images/projects/{{$i->photo}}" alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- slider setting -->
                        <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer" style="background-color: #ccc; border-radius: 20px;">
                            <i class="ion-ios-arrow-right"></i>
                        </div>
                        <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer" style="background-color: #ccc; border-radius: 20px;">
                            <i class="ion-ios-arrow-left"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ==================== End projdtal ==================== -->

@endsection
