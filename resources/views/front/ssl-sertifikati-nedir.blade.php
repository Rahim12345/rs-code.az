@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 domen circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize">{{__('ssl.veb')}}</h1>
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

<section class="data-section domen section-padding3 pp-svg">
    <div class="container-fluid">
        <div class="fr-view">
            <li>
                <h3>{{__('ssl.whyssl')}}</h3>
            </li>
            <li>
                <p>{{__('ssl.socket')}}</p>
            </li>
            <li>
                <p>{{__('ssl.certf')}}</p>
            </li>
            <div class="ssl">
                <ol>
                    <li>
                        <p>{{__('ssl.domen')}}</p>

                    </li>
                    <li><p>{{__('ssl.mekan')}}</p></li>
                </ol>
            </div>
            <li>
                <p>{{__('ssl.certflong')}}</p>
            </li>
            <li>
                <h3>
                    {{__('ssl.sslnece')}}
                </h3>
            </li>
            <li><p>{{__('ssl.sslkripto')}}</p></li>
            <li>
                <p>{{__('ssl.sslkriptop')}}</p>
            </li>
            <div class="down-li">
                    <h3>{{__('ssl.sslniye')}}</h3>
                <ol>
                    <li>
                        <p>{{__('ssl.sslkredit')}}</p>
                    </li>
                    <li>
                        <p>{{__('ssl.sslserver')}}</p>
                    </li>
                    <li>
                        <p>{{__('ssl.sslgoogle')}}</p>
                    </li>
                    <li>
                        <p>{{__('ssl.sslinam')}}</p>
                    </li>
                    <li>
                        <p>{{__('ssl.sslreates')}}</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
