@php
    $logotips       = \App\Models\LogoTip::all();
    $vizit_karts    = \App\Models\VizitKart::all();
    $konverts       = \App\Models\Konvert::all();
    $styles         = \App\Models\FirmaStili::all();
    $veb_dasiyicis  = \App\Models\VebDasiyici::with('numunes')->get();
    $veb_vesaits    = \App\Models\VebVesait::all();
@endphp

<!DOCTYPE html>
<html lang="az" class="html">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="title" content="{{__('index.first')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="Veb Saytların Hazırlanması, websayt, sayt sifarişi, sayt yığılması" />
    <meta name="description" content="Veb Saytların Hazırlanması, istəyə uyğun sayt yığılması. Ətraflı məlumat üçün əlaqə saxlayın" />
    <meta name="author" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{__('index.first')}}</title>

    <link rel="icon" type="image/png" href="{{ asset('img/132.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/132.png') }}" />
    <meta property="og:image" content="{{ asset('img/132.png') }}">
    <meta property="twitter:image" content="{{ asset('img/132.png') }}">

    <meta property="og:url" content="{{ config('app.url') }}">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta http-equiv="Content-language" content="az_AZ">
    <meta name="keywords" content="saytlarin hazirlanmasi, sayt sifarisi, sayt acmaq, sayt yaratmaq, saytlarin yaradilmasi, saytlarin yigilmasi">
    <meta name="designer" content="Rahim Süleymanov">
    <meta name="coder" content="Rahim Süleymanov">
    <meta name="description" content="Veb saytların sürətli və peşəkar səviyyədə hazırlanması.saytların yığılması bir sifarişə baxır.">
    <meta property="twitter:title" content="{{__('index.first')}}">
    <meta property="twitter:description" content="Veb Saytların Hazırlanması, SEO Xidməti, SMM Xidməti, Hostinq xidmətləri, Google Reklamları, Facebook və İnstagram Reklamları, Loqo Hazırlanması, Qrafiki xidmətlər">
    <meta property="og:title" content="{{__('index.first')}}">
    <meta property="og:description" content="Veb Saytların Hazırlanması, SEO Xidməti, SMM Xidməti, Hostinq xidmətləri, Google Reklamları, Facebook və İnstagram Reklamları, Loqo Hazırlanması, Qrafiki xidmətlər">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <meta name="facebook-domain-verification" content="s59utpbwg5gn9yu7ln6cuyx5bbqm0f" />

    <link rel="canonical" href="{{ config('app.url') }}">
    <link rel="shortcut icon" href="{{ asset('img/132.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css?v='.time()) }}"/>

    <meta name="google-site-verification" content="ln3IrZzK8hjysaLc6dF9oIe0-A6JeErr5CF66jhUmwA" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('css/brif/brifs.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-lg change" >
    <div class="container-fluid">
        <a class="logo imgLoad" href="/">
            <img class="lozad" data-src="{{ asset('img/rs-code.png') }}" src="{{ asset('img/rs-code.png') }}" alt="{{ config('app.name') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item"><a class="nav-link @if(Request::segment(1) == 'about') active @endif" href="/about">{{__('index.about')}}</a></li>
                <li class="nav-item "><a class="nav-link @if(Request::segment(1) == 'portfolio') active @endif" href="{{ route('front.portfolio') }}" role="button" aria-haspopup="true" aria-expanded="false">{{__('index.projects')}}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @if(Request::segment(1) == 'services') active @endif" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('index.services')}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/veb-saytlarin-hazirlanmasi"><span class="menu-text">{{__('index.header1')}}</span></a></li>
                        <li><a class="dropdown-item" href="/loqo-hazirlanmasi"><span class="menu-text">{{__('index.header3')}}</span></a></li>
                        <li><a class="dropdown-item" href="/korporativ-email"><span class="menu-text">{{__('index.header4')}}</span></a></li>
                        <li><a class="dropdown-item" href="/seo-xidmeti"><span class="menu-text">{{__('index.header5')}}</span></a></li>
                        <li><a class="dropdown-item" href="/google-reklamlari"><span class="menu-text">{{__('index.header6')}}</span></a></li>
                        <li><a class="dropdown-item" href="/texniki-destek"><span class="menu-text">{{__('index.header7')}}</span></a></li>
                        <li><a class="dropdown-item" href="/smm-xidmeti"><span class="menu-text">{{__('index.header9')}}</span></a></li>
                    </ul>
                </li>

              {{--
                <li class="nav-item "><a class="nav-link @if(Request::segment(1) == 'blogs') active @endif" href="/blogs" role="button" aria-haspopup="true" aria-expanded="false">{{__('index.blog')}}</a></li>--}}
                <li class="nav-item "><a class="nav-link @if(Request::segment(1) == 'faq') active @endif" href="/faq" role="button" aria-haspopup="true" aria-expanded="false">{{__('index.faq')}}</a></li>
                <li class="nav-item"><a class="nav-link @if(Request::segment(1) == 'contact') active @endif" href="/contact">{{__('index.contact')}}</a></li>

            </ul>
            <a  onclick="openModal();" class="butn curve btnHidden" style="color: #fff" id="BtnM"
                data-wow-delay=".5s"><span >{{__('index.order')}}</span></a>
        </div>
        <div class="lang" style="flex-grow: 0" id="navbarSupportedContent">
                <div class="selected-lang">
                </div>
                <ul>
                    <li>
                        <a href="{{ route('front.lang',['lang'=>'az']) }}" class="az">Az</a>
                    </li>
                    <li>
                        <a href="{{ route('front.lang',['lang'=>'ru']) }}" class="ru">Ru</a>
                    </li>
                    <li>
                        <a href="{{ route('front.lang',['lang'=>'en']) }}" class="en">En</a>
                    </li>
                </ul>
        </div>

</div>
</nav>

<!-- Mobile Menu -->

<div class="vs-menu-wrapper position-re">
    <div class="vs-menu-area">
        <button class="vs-menu-toggle text-theme vs-active"><i class="fas fa-times-circle"></i></button>
        <div class="mobile-logo">
            <a class="logo imgLoad" href="/">
                <img class="lozad" data-src="{{ asset('img/rs-code.png') }}" src="{{ asset('img/rs-code.png') }}" alt="{{ config('app.name') }}" />
            </a>
        </div>

        <ul class="menu-items">
            <li class="nav-item"><a class="nav-link vs-mobile-menu @if(Request::segment(1) == '') active @endif" href="/">{{__('index.main')}}</a></li>
            <li class="nav-item"><a class="nav-link vs-mobile-menu @if(Request::segment(1) == 'about') active @endif" href="/about">{{__('index.about')}}</a></li>
            <li class="nav-item "><a class="nav-link vs-mobile-menu @if(Request::segment(1) == 'portfolio') active @endif" href="{{ route('front.portfolio') }}" role="button" aria-haspopup="true" aria-expanded="false">{{__('index.projects')}}</a></li>
            <li id="menu-item-1612" class="menu-item nav-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1612 dropdown"><a title="Xidmətlər" href="#" data-toggle="dropdown1" class="hvr-underline-from-left1 vs-mobile-menu" aria-expanded="false" data-scroll="" data-options="easing: easeOutQuart">{{__('index.services')}}</a>
                <ul role="menu" class="submenu" style="display: none;">
                    <li id="menu-item-1155" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1155"><a title="SEO Xidməti" href="/veb-saytlarin-hazirlanmasi/">{{__('index.header1')}}</a></li>
                    <li id="menu-item-1157" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1157"><a title="Saytların hazırlanması" href="https://www.webman.az/saytlarin-hazirlanmasi/">{{__('index.header2')}}</a></li>
                    <li id="menu-item-1156" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1156"><a title="Sosial media marketinq" href="/loqo-hazirlanmasi">{{__('index.header3')}}</a></li>
                    <li id="menu-item-1529" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1529"><a title="Google xəritədə ünvan" href="/korporativ-email">{{__('index.header4')}}</a></li>
                    <li id="menu-item-1529" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1529"><a title="Google xəritədə ünvan" href="/seo-xidmeti">{{__('index.header5')}}</a></li>
                    <li id="menu-item-1529" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1529"><a title="Google xəritədə ünvan" href="/google-reklamlari">{{__('index.header6')}}</a></li>
                    <li id="menu-item-1529" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1529"><a title="Google xəritədə ünvan" href="/texniki-destek">{{__('index.header7')}}</a></li>
                    <li id="menu-item-1529" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1529"><a title="Google xəritədə ünvan" href="#">{{__('index.header8')}}</a></li>
                    <li id="menu-item-1529" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1529"><a title="Google xəritədə ünvan" href="/smm-xidmeti">{{__('index.header9')}}</a></li>
                </ul>
                <div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>
            </li>
            <li class="nav-item "><a class="nav-link vs-mobile-menu @if(Request::segment(1) == 'faq') active @endif" href="/faq" role="button" aria-haspopup="true" aria-expanded="false">{{__('index.faq')}}</a></li>
            <li class="nav-item"><a class="nav-link vs-mobile-menu @if(Request::segment(1) == 'contact') active @endif" href="/contact">{{__('index.contact')}}</a></li>
        </ul>

        <ul class="menu-items languages" >
            <li class="nav-item"><a class="nav-link" href="{{ route('front.lang',['lang'=>'az']) }}"><span class="flag-icon flag-icon-az"></span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('front.lang',['lang'=>'ru']) }}"><span class="flag-icon flag-icon-ru"></span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('front.lang',['lang'=>'en']) }}"><span class="flag-icon flag-icon-gb"></span></a></li>
        </ul>


    </div>
</div>
@include('front.includes.sifaris')
<!-- ==================== End Navbar ==================== -->
