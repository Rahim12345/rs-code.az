@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize" >{{__('development.veb')}}</h1>
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
        <!-- ==================== DATA SECTION START ==================== -->

<section class="data-section section-padding3 pp-svg">
    <div class="container-fluid">
        <div class="fr-view">
            <li>
                <p> {{__('development.muasir')}}</p>
            </li>
            <li>
                <p>{{__('development.teskilat')}}</p>
            </li>
            <li>
                <h6>
                    {{__('development.xidmet')}}
                </h6>
            </li>
            <div class="down-li">
                <ol>
                    <li>
                        <p>{{__('development.modern')}}</p>
                    </li>
                    <li>
                        <p>{{__('development.responsive')}};</p>
                    </li>
                    <li>
                        <p>{{__('development.domen')}}</p>
                    </li>
                    <li>
                        <p>{{__('development.performans')}}</p>
                    </li>
                    <li>
                        <p>{{__('development.ssl')}} </p>
                    </li>
                    <li>
                        <p>{{__('development.email')}}</p>
                    </li>
                    <li>
                        <p>{{__('development.google')}}</p>
                    </li>
                    <li>
                        <p>{{__('development.daxil')}}</p>
                    </li>
                    <li>
                        <p>{{__('development.dizayn')}}</p>
                    </li>
                </ol>

            </div>
            <div class="bigger-text">
                <li>
                    <h3>{{__('development.merhele')}}</h3>
                </li>
                <li>
                    <h4>{{__('development.first')}}</h4>
                    <p>{{__('development.firstp')}}</p>
                </li>
                <li>
                    <h4>{{__('development.second')}}.</h4>
                    <p>{{__('development.secondp')}}</p>
                </li>
                <li>
                    <h4>{{__('development.thrid')}}</h4>
                    <p>{{__('development.thridp')}}</p>
                </li>
                <li>
                    <h4>{{__('development.four')}}</h4>
                    <p>{{__('development.fourp')}}</p>
                </li>
                <li>
                    <h4>{{__('development.five')}}</h4>
                    <p>{{__('development.fivep')}}</p>
                </li>
            </div>

        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
