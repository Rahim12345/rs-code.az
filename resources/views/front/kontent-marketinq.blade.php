@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize">{{__('kontent.kontentTitle')}}</h1>
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
                <h3>{{__('kontent.kontent1')}}</h3>
            </li>
            <li>
                <p>{{__('kontent.kontent2')}} </p>
            </li>
            <li>
                <p>{{__('kontent.kontent3')}}</p>
            </li>
            <li>
                <p>{{__('kontent.kontent4')}}</p>
            </li>
            <li>
                <p>{{__('kontent.kontent5')}}</p>
            </li>
            <div class="down-li">
                <ol>
                    <li>
                        <p>{{__('kontent.kontent6')}}</p>
                    </li>
                    <li>
                        <p>{{__('kontent.kontent7')}}</p>
                    </li>
                    <li>
                        <p>{{__('kontent.kontent8')}}</p>
                    </li>
                    <li>
                        <p>{{__('kontent.kontent9')}}</p>
                    </li>
                    <li>
                        <p>{{__('kontent.kontent10')}}</p>
                    </li>
                </ol>
            </div>
            <li>
                <p>{{__('kontent.kontent11')}}</p>
            </li>
            <li>
                <h3>{{__('kontent.kontent12')}}</h3>
            </li>
            <li>
                <p>{{__('kontent.kontent13')}}</p>
            </li>
        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
