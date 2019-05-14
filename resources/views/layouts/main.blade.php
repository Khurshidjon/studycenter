<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/silkroad.png') }}">
    <!-- Author Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="og:author" content="Центр языковой подготовки">
    <!-- Meta Description -->
    <meta name="og:title" content="Центр языковой подготовки">
    <meta name="og:description" content="Центр языковой подготовки">
    <!-- Meta Keyword -->
    <meta name="og:keywords" content="Центр языковой подготовки">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Центр языковой подготовки</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link href="{{ asset('fonts/Circle-Regular.otf') }}">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        body{
            font-family: circe, "sans-serif" !important;
            font-size: 18px !important;
            background-color: #f9f9f9;
        }
        h1, h2, h3, h4, h5, h6, p, a{
            font-family: 'circe', "sans-serif" !important;
        }
        .banner-area .overlay-bg{
            background-color: rgba(4,9,30,0.5);
        }
        .banner-content .primary-btn{
            background-color: #95CA4B;
        }
        .single-feature:hover .title{
            background: rgba(89,227,216,0.9);
        }
        .banner-content {
            font-size: 10px !important;
        }
        .banner-content h1 span{
            color: #E1E150;
        }
        .banner-content h1{
            font-size: 43px;
        }
        * a:hover{
            color: #51bce6 !important;
        }
        @media (max-width: 991px){
            .single-feature .title {
                background: rgba(76, 182, 100, 0.8);
            }

        }
        #text-banner{
            top: 15em;
        }
        .single-blog .details-btn{
            width: 100px;
        }
        .single-blog .details-btn:hover{
            width: 200px;
        }
        .main-menu{
            background: rgba(0, 0, 0, 0.4);
        }
        .header-scrolled .main-menu{
            background: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<header id="header" id="home">
    <div class="header-top" id="app">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left no-padding">
                    <ul>
                        <li><a href="{{ $social->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $social->telegram }}"><i class="fa fa-telegram"></i></a></li>
                        <li><a href="{{ $social->instagram }}"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right no-padding">
                    <a href="tel:{{ $address->phone }}"><span class="lnr lnr-phone-handset"></span> <span class="text">{{ $address->phone }}</span></a>
                    <a href="mailto:{{ $address->email }}"><span class="lnr lnr-envelope"></span> <span class="text">{{ $address->email }}</span></a>
                    <a href="{{ route('locale', ['lang' => 'ru']) }}"><span class="">РУС</span></a>
                    <a href="{{ route('locale', ['lang' => 'uz']) }}"> <span class="">O'ZB</span></a>
                    <a href="{{ route('locale', ['lang' => 'en']) }}"><span class="">ENG</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main-menu">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo" >
                    <a href="{{ route('index') }}" class="text-uppercase">
                        <span style="color: white; font-family: circus, 'sans-serif'">Silk road</span>
                        <span style="color: white; font-family: circus, 'sans-serif'">global</span>
                    </a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        @foreach($menus as $menu)
                            @if($menu->sub_menu!=null)
                                <li class="menu-has-children">
                                    <a href="{{ $menu->site_url }}">
                                        @if(App::getLocale() == 'uz')
                                            {{ $menu->menu_name_uz }}
                                        @elseif(App::getLocale() == 'ru')
                                            {{ $menu->menu_name_ru }}
                                        @elseif(App::getLocale() == 'en')
                                            {{ $menu->menu_name_en }}
                                        @endif
                                    </a>
                                    <ul>
                                        @foreach($menu->submenu as $submenu)
                                            <li>
                                                <a href="{{ $submenu->site_url }}">
                                                    @if(App::getLocale() == 'uz')
                                                        {{ $submenu->menu_name_uz }}
                                                    @elseif(App::getLocale() == 'ru')
                                                        {{ $submenu->menu_name_ru }}
                                                    @elseif(App::getLocale() == 'en')
                                                        {{ $submenu->menu_name_en }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $menu->site_url }}">
                                        @if(App::getLocale() == 'uz')
                                            {{ $menu->menu_name_uz }}
                                        @elseif(App::getLocale() == 'ru')
                                            {{ $menu->menu_name_ru }}
                                        @elseif(App::getLocale() == 'en')
                                            {{ $menu->menu_name_en }}
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </div>
</header><!-- #header -->
@yield('content')
<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4>@lang('pages.contacts')</h4>
                    <ul>
                        <li>
                            @if(App::getLocale() == 'uz')
                                {{ $address->address_name_uz }}
                            @elseif(App::getLocale() == 'ru')
                                {{ $address->address_name_ru }}
                            @elseif(App::getLocale() == 'en')
                                {{ $address->address_name_en }}
                            @endif
                        </li>
                        <li>
                            {{ $address->phone }}
                        </li>
                        <li>
                            <a href="mailto:{{ $address->email }}">
                                {{ $address->email }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4>@lang('pages.links')</h4>
                    <ul>
                        @foreach($footer_menus as $menu)
                            <li>
                                <a href="{{ $menu->site_url }}">
                                    @if(App::getLocale() == 'uz')
                                        {{ $menu->menu_name_uz }}
                                    @elseif(App::getLocale() == 'ru')
                                        {{ $menu->menu_name_ru }}
                                    @elseif(App::getLocale() == 'en')
                                        {{ $menu->menu_name_en }}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4>@lang('pages.address')</h4>
                    <div style="max-height: 17em">
                        <iframe src="https://yandex.uz/map-widget/v1/-/CCbEJKO3"  style="width: 100%; height: 100%" frameborder="1" allowfullscreen="true"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom row align-items-center justify-content-between">
            <p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site created <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="http://nomad-techno.com" target="_blank">Nomad Techno</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-6 col-sm-12 footer-social">
                <a href="{{ $social->facebook }}"><i class="fa fa-facebook"></i></a>
                <a href="{{ $social->telegram }}"><i class="fa fa-telegram"></i></a>
                <a href="{{ $social->instagram }}"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->


<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/easing.min.js') }}"></script>
<script src="{{ asset('js/hoverIntent.js') }}"></script>
<script src="{{ asset('js/superfish.min.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.tabs.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
