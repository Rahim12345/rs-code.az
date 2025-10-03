@extends('front.layouts.master')

@section('content')

    <!-- ==================== Start header ==================== -->
    <header class="pages-header2 domen circle-bg valign sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cont mt-20 mb-20 text-center">
                        <h1 class="color-font fw-700 fontsize">{{__('texniki.title')}}</h1>
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

<section class="data-section texniki section-padding3 pp-svg">
    <div class="container-fluid">
        <div class="fr-view">
            <div class="image">
                    <img src="/img/tech.png" alt="">
            </div>
            <li>
                <p>{{__('texniki.tex1')}}</p>
            </li>

        <div class="down-li">
            <ul>
                <li>
                    <p>{{__('texniki.tex2')}}</p>
                </li>
                <li>
                    <p>{{__('texniki.tex3')}}</p>
                </li>
                <li>
                    <p>{{__('texniki.tex4')}}</p>
                </li>
                <li>
                    <p>{{__('texniki.tex5')}}</p>
                </li>
                <li>
                    <p>{{__('texniki.tex6')}}</p>
                </li>
            </ul>
        </div>
            <li>
                <h3>{{__('texniki.tex7')}}</h3>
            </li>
            <div class="down-li">
                <ul>
                    <li>
                        <p>{{__('texniki.tex8')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex9')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex10')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex11')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex12')}}</p>
                    </li>
                    <li>
                        <p title={{__('texniki.tex13')}}>{{__('texniki.tex13')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex14')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex15')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex16')}}</p>
                    </li>
                    <li>
                        <p>{{__('texniki.tex17')}}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>




        <!-- ==================== DATA SECTION END ==================== -->

@endsection
