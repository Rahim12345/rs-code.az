@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize" >{{__('koperativ.title')}}</h1>
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
                <img class="image-fir diir" src="/img/email.png" alt="">
                <p>{{__('koperativ.kop1')}}</p>
            </li>

            <li>
                <p>{{__('koperativ.kop2')}}</p>
            </li>

            <li>
                <h3>
                    {{__('koperativ.kop3')}}
                </h3>
            </li>
            <div class="down-li">
                <ol>
                    <li>
                        <p>{{__('koperativ.kop4')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop5')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop6')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop7')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop8')}}</p>
                    </li>
                </ol>
            </div>
            <li>
                <p>
                    {{__('koperativ.kop9')}}
                </p>
            </li>
            <li>
                <h3>
                    {{__('koperativ.kop10')}}
                </h3>
            </li>
            <li>
                <h3>
                    {{__('koperativ.kop11')}}
                </h3>
            </li>
            <div class="down-li">
                <ol>
                    <li>
                        <p>{{__('koperativ.kop12')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop13')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop14')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop15')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop16')}}</p>
                    </li>
                    <li>
                        <p>{{__('koperativ.kop17')}}</p>
                    </li>
                </ol>
            </div>


        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
