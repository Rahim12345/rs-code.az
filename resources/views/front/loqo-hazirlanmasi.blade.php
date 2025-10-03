@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize" >{{__('logo.logoTitle')}}</h1>
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
                <p>{{__('logo.logo1')}}</p>
            </li>
            <li>
                <h3>{{__('logo.logo2')}}</h3>
            </li>
            <li>
                <p>{{__('logo.logo3')}}</p>
            </li>
            <li>
                <h3>
                    {{__('logo.logo4')}}
                </h3>
            </li>
            <li>
                <p>
                    {{__('logo.logo5')}}
                </p>
            </li>
            <li>
                <h3>
                    {{__('logo.logo6')}}
                </h3>
            </li>
            <li>
                <p>
                    {{__('logo.logo7')}}
                </p>
            </li>
            <li>
                <h3>
                    {{__('logo.logo8')}}
                </h3>
            </li>
            <li>
                <p>
                    {{__('logo.logo9')}}
                </p>
            </li>
            <li>
                <h3>
                    {{__('logo.logo10')}}
                </h3>
            </li>
            <li>
                <p>
                    {{__('logo.logo11')}}
                </p>
            </li>
        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
