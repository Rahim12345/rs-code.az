@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 domen circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize">{{__('domen.domenTitle')}}</h1>
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
                <h3>{{__('domen.domen1')}}</h3>
            </li>
            <li>
                <p>{{__('domen.domen2')}}</p>
            </li>
            <li>
                <p>{{__('domen.domen3')}}</p>
            </li>
            <li>
                <p>{{__('domen.domen4')}}</p>
            </li>
            <li>
                <p>{{__('domen.domen5')}}</p>
            </li>
            <li>
                <h3>
                    {{__('domen.domen6')}}
                </h3>
            </li>
            <li><p>{{__('domen.domen7')}}</p></li>
            <div class="down-li">
                    <h3>{{__('domen.domen8')}}</h3>
                <ol>
                    <li>
                        <p>{{__('domen.domen9')}}</p>
                    </li>
                    <li>
                        <p>{{__('domen.domen10')}}</p>
                    </li>
                    <li>
                        <p>{{__('domen.domen11')}}</p>
                    </li>
                    <li>
                        <p>{{__('domen.domen12')}}</p>
                    </li>
                    <li>
                        <p>{{__('domen.domen13')}}</p>
                    </li>
                    <li>
                        <p>{{__('domen.domen14')}}</p>
                    </li>
                    <li>
                        <p>{{__('domen.domen15')}}</p>
                    </li>
                    <li>
                        <p>{{__('domen.domen16')}}</p>
                    </li>


                </ol>
            </div>
            <div class="down-li-two">
                <li>
                    <h3>{{__('domen.domen17')}}</h3>
                </li>
                <li><p>{{__('domen.domen18')}}</p></li>
            </div>
        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
