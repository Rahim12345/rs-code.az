@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize" >{{__('smm.smmTitle')}}</h1>
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
                <h3>{{__('smm.smm1')}}</h3>
            </li>
            <li>
                <p title={{__('smm.smm2')}}>{{__('smm.smm2')}}</p>
            </li>
            <li>
                <p>{{__('smm.smm3')}}</p>
            </li>
            <li>
                <h6>
                    {{__('smm.smm4')}}
                </h6>
            </li>
            <div class="down-li">
                <ol>
                    <li>
                        <p>{{__('smm.smm5')}}</p>
                    </li>
                    <li>
                        <p>{{__('smm.smm6')}}</p>
                    </li>
                    <li>
                        <p>{{__('smm.smm7')}}</p>
                    </li>
                    <li>
                        <p>{{__('smm.smm8')}}</p>
                    </li>
                </ol>

            </div>
            <li>
                <p>
                    {{__('smm.smm9')}}
                </p>
            </li>
            <li>
                <p>
                    {{__('smm.smm10')}}
                </p>
            </li>
            <li>
                <h6>
                    {{__('smm.smm11')}}
                </h6>
            </li>
            <div class="down-li">
                <ol>
                    <li>
                        <p> {{__('smm.smm12')}}</p>
                    </li>
                    <li>
                        <p> {{__('smm.smm13')}}</p>
                    </li>
                    <li>
                        <p> {{__('smm.smm14')}}</p>
                    </li>
                    <li>
                        <p>{{__('smm.smm15')}}</p>
                    </li>

                    <li>
                        <p>{{__('smm.smm16')}}</p>
                    </li>
                    <li>
                        <p> {{__('smm.smm17')}}</p>
                    </li>
                    <li>
                        <p> {{__('smm.smm18')}}</p>
                    </li>
                </ol>

            </div>
            <li>
                <p>
                    {{__('smm.smm19')}}
                </p>
            </li>
            <li>
                <p>
                    {{__('smm.smm20')}}
                </p>
            </li>
        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
