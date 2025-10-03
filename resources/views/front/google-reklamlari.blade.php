@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize">{{__('google.googleTitle')}}</h1>
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
            <li><p>{{__('google.google1')}}</p></li>
            <li><h3>{{__('google.google2')}}</h3></li>
            <li><p>{{__('google.google3')}}</p></li>
            <li><h3>{{__('google.google4')}}</h3></li>
            <li><p>{{__('google.google5')}}</p></li>
            <div class="down-li">
                <ol>
                    <li><p>{{__('google.google6')}}</p></li>
                    <li><p>{{__('google.google7')}}</p></li>
                    <li><p>{{__('google.google8')}} </p></li>
                </ol>
            </div>
            <li><h3>{{__('google.google9')}}</h3></li>
            <li><h5>{{__('google.google10')}}</h5></li>
            <li><h6>{{__('google.google11')}}</h6></li>
            <li><p>{{__('google.google12')}}</p></li>
            <li><h3>{{__('google.google13')}}</h3></li>
            <li><p><img class="image-fir diir" src="/img/slid/google_reklamlari3.png" alt="">{{__('google.google14')}}</p></li>
            <div class="down-li">
                <ol>
                    <li><p>{{__('google.google15')}}</p></li>
                    <li><p>{{__('google.google6')}}</p></li>
                    <li><p>{{__('google.google17')}}</p></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ==================== DATA SECTION END ==================== -->
@endsection
