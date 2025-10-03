@extends('front.layouts.master')

@section('content')
    <main style="margin-top: 115px">

        <section class="project-details-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 left offset-md-2">
                        <div class="content">
                            <div class="group-menu">

                                <a href="{{ route('front.portfolio') }}">{{ __('index.projects') }}</a> <i class="fas fa-chevron-right"></i>
                                <a href="{{ route('front.portfolio',['slug'=>$product->service->{'slug_'.app()->getLocale()}]) }}">{{ $product->service->{'name_'.app()->getLocale()} }}</a>
{{--                                <a href="#0" class="active">{{ $product->company->name }}</a>--}}
                            </div>

                            <h2>{{ $product->{'title_'.app()->getLocale()} }}</h2>
                            <p>{!! $product->{'text_'.app()->getLocale()} !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="project_detail_one col-lg-8 col-md-8 offset-md-2">
            <div class="container">
                <div class="row">
                    <div class="iframeContainer mb-3">
                        @foreach($product->images as $image)
                            <img class="lozad img-fluid"  data-src="{{ asset('files/products/images/'.$image->src) }}" alt="{{ $product->alt }}">
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
