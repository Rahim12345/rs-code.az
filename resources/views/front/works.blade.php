@extends('front.layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
<style>
    .row{
        margin: inherit !important;
    }
</style>
    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize" >{{__('projects.projects')}}</h1>
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

    <main class="service">




        <section class="article all_project home services">
            <header class="article__header">
                <div class="container-fluid _js_all_project">
                    <div class="header_article">
                        <h6 class="article__heading_span services1 ff4">{{ __('static.bizim_isler') }}</h6>
                        <h6 class="article__heading_span2 services2">{{ __('static.brendiniz_ve') }}</h6>
                    </div>

                    <!-- Filter projects  swiper-container swiper-wrapper -->
                    <div class="grid-button">
                        <button onclick="window.location.href='{!! route('front.portfolio') !!}'" type="button" class=" filter__item __js_filter-btn {{ request()->segment(2) ? '' : 'filter__item--active' }}" data-filter="*" data-id="0">{{ __('static.all') }}</button>
                        @foreach($my_services as $my_service)
                            <button data-slug="{{ $my_service->{'slug_'.app()->getLocale()} }}" onclick="window.location.href='{!! route('front.portfolio',['slug'=>$my_service->{'slug_'.app()->getLocale()}]) !!}'" type="button" class=" filter__item __js_filter-btn {{ request()->segment(2) == $my_service->{'slug_'.app()->getLocale()} ? 'filter__item--active' : '' }}"  data-filter=".__js_{{ $my_service->{'slug_'.app()->getLocale()} }}" data-id="{{ $my_service->id }}">{{ $my_service->{'name_'.app()->getLocale()} }}</button>
                        @endforeach
                    </div>
                </div>
            </header>

            <div class="article__main article__main--width-full container-fluid">
                <ul class="projects-masonry row " id="load_data">

                </ul>

                <div class="more-btn mt-3" >
                    <div id="load_data_message"></div>
                    <button id="showMore"  class="showMore-btn">{{ __('static.dahacox') }}</button>
                </div>
            </div>
        </section>
    </main>

    @section('js')

        <script>

            $('document').ready(function () {
                $('#service_activator').click();
            });

            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var servis_id   = '*';
                @if(request()->segment(2))
                    servis_id = $('.__js_filter-btn[data-slug="{!! request()->segment(2) !!}"]').attr('data-id');
                @endif
                var limit       = 12;
                var start       = 0;
                var action      = 'inactive';

                function load_data(limit, start,servis_id = 0)
                {
                    $('#load_data_message').html("<button type='button' class='showMore-btn btnLoad'> {{ __('static.yuklenir') }}</button>");
                    $.ajax({
                        url:"{!! route('front.servis.loader') !!}",
                        method:"POST",
                        data:{limit:limit, start:start, servis_id: servis_id},
                        cache:false,
                        success:function(data)
                        {
                            $('#load_data').append(data.output);
                            if(data.next === false)
                            {
                                $('#load_data_message').html("<button type='button' class='showMore-btn d-none'>Məlumat tapılmadı</button>");
                                $('#showMore').css('display','none');
                                action = 'active';
                            }
                            else
                            {
                                $('#load_data_message').css("display","none");
                                $('#showMore').css('display','block');
                                action = "inactive";
                            }
                        }
                    });
                }

                if(action == 'inactive')
                {
                    action = 'active';
                    load_data(limit, start, servis_id);
                }

                $('#showMore').click(function(){
                    $('#showMore').css('display','none');
                    $('#load_data_message').css("display","block");
                    action = 'active';
                    start = start + limit;
                    setTimeout(function(){
                        load_data(limit, start, servis_id);
                    }, 1000);
                });
            });
        </script>
    @endsection
