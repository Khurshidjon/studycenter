@extends('layouts.main')
@section('content')
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
    <div class="">
        @if(App::getLocale() == 'uz')
            {!! $abouts->about_us_uz !!}
         @elseif(App::getLocale() == 'ru')
            {!! $abouts->about_us_ru !!}
        @elseif(App::getLocale() == 'en')
            {!! $abouts->about_us_en !!}
        @endif
    </div>
@endsection
