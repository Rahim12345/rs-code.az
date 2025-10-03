@extends('front.layouts.master')

@section('content')
    <!-- ==================== Start header ==================== -->

    <header class="pages-header2  circle-bg valign position-re sub-bg bg-img" data-background="img/patrn.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-11">
                    <div class="capt">
                        <div class="text-center">
                            <h1 class="color-font mb-10 fw-700 fontsize">{{__('index.faq')}}</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="circle-color">
            <div class="gradient-circle"></div>
            <div class="gradient-circle two"></div>
        </div>
    </header>

    <!-- ==================== End header ==================== -->


    <!-- ==================== Start main-content ==================== -->

    <div class="main-content">

        <!-- ==================== Start Contact ==================== -->

        <section class="faq fullwidth" id="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="sec-head text-center">

                            <h6 class="wow fadeIn pb-20 fontsize2"  data-wow-delay=".5s" >{{__('faq.questions')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-lg-10">
                    <div id="accordion">
                      <div class="accordion-item">
                        <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-01">
                          <h3>{{__('faq.howmuch')}}</h3>
                        </div>
                        <div class="collapse" id="collapse-01" data-parent="#accordion">
                          <div class="accordion-body">
                            <p>{{__('faq.howmuchd')}}</p>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-02">
                          <h3>{{__('faq.afterdevelop')}}</h3>
                        </div>
                        <div class="collapse" id="collapse-02" data-parent="#accordion">
                          <div class="accordion-body">
                            <p>{{__('faq.afterdevelopd')}}</p>
                          </div>
                        </div>
                      </div>
                    <div class="accordion-item">
                      <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-03">
                        <h3>{{__('faq.sitecontent')}}</h3>
                      </div>
                      <div class="collapse" id="collapse-03" data-parent="#accordion">
                        <div class="accordion-body">
                          <p>{{__('faq.sitecontentd')}}</p>
                        </div>
                      </div>
                    </div>
                  <div class="accordion-item">
                    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-04">
                      <h3>{{__('faq.promote')}}</h3>
                    </div>
                    <div class="collapse" id="collapse-04" data-parent="#accordion">
                      <div class="accordion-body">
                        <p>{{__('faq.promoted')}}</p>
                    </div>
                        </div>
                       </div>
                <div class="accordion-item">
                    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-06">
                        <h3>{{__('faq.difference')}}</h3>
                    </div>
                    <div class="collapse" id="collapse-06" data-parent="#accordion">
                        <div class="accordion-body">
                        <p>{{__('faq.differenced')}}</p>
                    </div>
                        </div>
                        </div>

                <div class="accordion-item">
                    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-07">
                        <h3>{{__('faq.visitor')}}</h3>
                    </div>
                    <div class="collapse" id="collapse-07" data-parent="#accordion">
                        <div class="accordion-body">
                        <p>{{__('faq.visitord')}}</p>
                    </div>
                        </div>
                        </div>
                     </div>
                    </div>
                   </div>
              </div>
          </section>

        <!-- ==================== End Contact ==================== -->
@endsection
