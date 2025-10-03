<!DOCTYPE html>
<html lang="az">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>{{ config('app.name') }} - @yield('title','Əsas Səhifə')</title>
    <meta name="keywords" content="{{ config('app.name') }}">
    <meta name="description" content="{{ config('app.name') }}">
    <meta itemprop="name" content="{{ config('app.name') }}">
    <meta itemprop="description" content="{{ config('app.name') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet"/>
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/black-dashboard.min3f71.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')
</head>

<body class="sidebar-mini ">
<input type="hidden" name="rootUrl" id="rootUrl" value="{{ config('app.url') }}">
<div class="wrapper">
    <div class="navbar-minimize-fixed">
        <button class="minimize-sidebar btn btn-link btn-just-icon">
            <i class="tim-icons icon-align-center visible-on-sidebar-regular text-muted"></i>
            <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini text-muted"></i>
        </button>
    </div>
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="javascript:void(0)" class="simple-text logo-mini">
                    RS
                </a>
                <a href="javascript:void(0)" class="simple-text logo-normal">
                    {{ config('app.name') }}
                </a>
            </div>
            <ul class="nav">
                <li @if(Request::segment(1) == '') class="active" @endif>
                    <a href="/admin/dashboard">
                        <i class="tim-icons icon-chart-pie-36"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li @if(Request::segment(1) == 'services') class="active" @endif>
                    <a href="{{ route('services.index') }}">
                        <i class="tim-icons icon-chart-pie-36"></i>
                        <p>Xidmətlər</p>
                    </a>
                </li>

                <li @if(Request::segment(1) == 'company') class="active" @endif>
                    <a href="{{ route('company.index') }}">
                        <i class="tim-icons icon-chart-pie-36"></i>
                        <p>Şirkətlər</p>
                    </a>
                </li>

                <li @if(Request::segment(1) == 'product') class="active" @endif>
                    <a href="{{ route('product.index') }}">
                        <i class="tim-icons icon-chart-pie-36"></i>
                        <p>Məhsullar</p>
                    </a>
                </li>

                <li @if(Request::segment(1) == 'team') class="active" @endif>
                    <a href="{{ route('team.index') }}">
                        <i class="tim-icons icon-chart-pie-36"></i>
                        <p>Komandamız</p>
                    </a>
                </li>

                <li @if(Request::segment(1) == 'about') class="active" @endif>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="tim-icons icon-image-02"></i>
                        <p>
                            Haqqımızda
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="/admin/about">
                                    <span class="sidebar-mini-icon">P</span>
                                    <span class="sidebar-normal"> Düzəliş </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="tim-icons icon-molecule-40"></i>
                        <p>
                            İşlərimiz
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="componentsExamples">
                        <ul class="nav">

                            <li>
                                <a href="/admin/projects">
                                    <span class="sidebar-mini-icon">B</span>
                                    <span class="sidebar-normal"> Düzəliş </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#formsExamples">
                        <i class="tim-icons icon-notes"></i>
                        <p>
                            Müştərilər
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="formsExamples">
                        <ul class="nav">
                            <li>
                                <a href="/admin/partners">
                                    <span class="sidebar-mini-icon">RF</span>
                                    <span class="sidebar-normal"> Düzəliş </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#tablesExamples">
                        <i class="tim-icons icon-puzzle-10"></i>
                        <p>
                            Bloq
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="tablesExamples">
                        <ul class="nav">
                            <li>
                                <a href="/admin/blogs">
                                    <span class="sidebar-mini-icon">RT</span>
                                    <span class="sidebar-normal"> Düzəliş </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#commentExamples">
                        <i class="tim-icons icon-pencil"></i>
                        <p>
                            Rəylər
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="commentExamples">
                        <ul class="nav">
                            <li>
                                <a href="/admin/comments">
                                    <span class="sidebar-mini-icon">RF</span>
                                    <span class="sidebar-normal"> Düzəliş </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize d-inline">
                        <button class="minimize-sidebar btn btn-link btn-just-icon" rel="tooltip"
                                data-original-title="Sidebar toggle" data-placement="right">
                            <i class="tim-icons icon-align-center visible-on-sidebar-regular"></i>
                            <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini"></i>
                        </button>
                    </div>
                    <div class="navbar-toggle d-inline">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:void(0)">@yield('title')</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto">
                        <li class="search-bar input-group">
                            <button class="btn btn-link" id="search-button" data-toggle="modal"
                                    data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                <span class="d-lg-none d-md-block">Axtar</span>
                            </button>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <div class="notification d-none d-lg-block d-xl-block"></div>
                                <i class="tim-icons icon-sound-wave"></i>
                                <p class="d-lg-none">
                                    Notifications
                                </p>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                                <li class="nav-link">
                                    <a href="#" class="nav-item dropdown-item">Mike John responded to your email</a>
                                </li>
                                <li class="nav-link">
                                    <a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more
                                        tasks</a>
                                </li>
                                <li class="nav-link">
                                    <a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is
                                        in town</a>
                                </li>
                                <li class="nav-link">
                                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a>
                                </li>
                                <li class="nav-link">
                                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <div class="photo">
                                    <img src="{{ asset('assets/img/mike.jpg') }}" alt="Profile Photo">
                                </div>
                                <b class="caret d-none d-lg-block d-xl-block"></b>
                                <p class="d-lg-none">
                                    Log out
                                </p>
                            </a>
                            <ul class="dropdown-menu dropdown-navbar">
                                <li class="nav-link">
                                    <a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a>
                                </li>
                                <li class="nav-link">
                                    <a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="nav-link">
                                    <a href="/admin/logout" class="nav-item dropdown-item">Log out</a>
                                </li>
                            </ul>
                        </li>
                        <li class="separator d-lg-none"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Axtar">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
