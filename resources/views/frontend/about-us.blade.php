@extends('layouts.main')
@section('content')
@php 
    $lang = App::getLocale();
@endphp
<style>
    .container-fluid img{
        float: left !important;
        margin-right: 10em;
    }
    .benefits-items {
        text-align: center;
        background-color: #fff;
        padding: 10px;
        text-transform: uppercase;
        border: none;
        font-family:'circe', "sans-serif" !important;
    }
    .header-section h3{
        /* border: 1px solid green; */
        font-family:serif;
        font-size: 30px;
        color: chocolate;
        text-transform: uppercase;
        padding: 10px;
        /* width: 12em; */
        text-align: center;
        background-color: #fff;
        border-radius: 17px;
        margin-bottom: 25px;
    }
    body{
        background-color: white; 
    }
    .card-body{
         position: absolute;
         top: 10em;
         bottom: 0 !important;
    }
    .card{
        height: 20em;;
    }
</style>
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home" @if($banner->about_us_banner) style="background: url('{{ asset('storage') .'/'. $banner->about_us_banner}}')" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @lang('pages.about_us')
                    </h1>
                    <p class="text-white link-nav"><a href="{{ route('index') }}">@lang('pages.home') </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('about-us') }}"> @lang('pages.about_us')</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <div class="container-fluid" style="padding: 5em 10em;">
        {!! $abouts->{'about_us_'.$lang} !!}
    </div>
    <div class="container">
        <div class="header-section">
            <h3 class="mr-auto">@lang('pages.benefits')</h3>
        </div>
        <div class="row justify-content-center" style="margin-bottom: 50px">
            @foreach ($benefits as $benefit)
            <div class="col-md-3">
                <div class="row">
                    <div class="col-6">
                        <div class="benefits-items">
                            <img src="{{ asset('storage') .'/'. $benefit->image }}" class="" style="margin: 1px; width: 100%;" alt="">
                        </div>
                    </div>
                    <div class="col-6" style="padding-top: 15px;">
                        <p>{!! $benefit->{'benefit_'.$lang} !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
