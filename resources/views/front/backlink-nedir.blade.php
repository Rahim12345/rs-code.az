@extends('front.layouts.master')
@section('content')
    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize" >{{__('backlink.backlinkTitle')}}</h1>
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
                <h3>{{__('backlink.baclink1')}}</h3>
            </li>
            <li>
                <p>{{__('backlink.baclink2')}}</p>
            </li>
            <li>
                <p>{{__('backlink.baclink3')}}</p>
            </li>
            <li>
                <h3>
                    {{__('backlink.baclink4')}}
                </h3>
            </li>
            <li>
                <img class="image-fir diir" src="/img/slid/backlink21.png" alt="">
                <p>{{__('backlink.baclink5')}}</p>
            </li>
            <li>
                <p>{{__('backlink.baclink6')}}</p>
            </li>
            <div class="down-li">
                <ol>
                    <li>
                        <p>{{__('backlink.baclink7')}}</p>
                    </li>
                    <li>
                        <p>{{__('backlink.baclink8')}}</p>
                    </li>
                    <li>
                        <p>{{__('backlink.baclink9')}}</p>
                    </li>
                    <li>
                        <p>{{__('backlink.baclink10')}}</p>
                    </li>
                    <li>
                        <p>{{__('backlink.baclink11')}}</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
