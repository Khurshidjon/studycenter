@extends('layouts.main')
<style>
    .container-img {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .container-img:hover .image {
        opacity: 0.5;
        background-color: black;
        transform: rotate(360deg);
    }

    .container-img:hover .middle {
        opacity: 1;
    }

    .text-university {
        background-color: #4CAF50 !important;
        color: white !important;
        font-size: 16px !important;
        padding: 16px 32px !important;
    }
</style>
@section('content')


    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home" @if($banner->consulting_banner) style="background: url('{{ asset('storage') .'/'. $banner->consulting_banner}}') no-repeat; background-size: cover" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @lang('pages.consulting')
                    </h1>
                    <p class="text-white link-nav">
                        <a href="{{ route('index') }}">@lang('pages.home') </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('consulting') }}">@lang('pages.consulting')</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start event-details Area -->
    <section class="event-details-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 event-details-left">
                    <div class="details-content">
                        <p>
                            @if($consulting)
                                @if(App::getLocale() == 'uz')
                                    {!! $consulting->consulting_uz !!}
                                @elseif(App::getLocale() == 'ru')
                                    {!! $consulting->consulting_ru !!}
                                @elseif(App::getLocale() == 'en')
                                    {!! $consulting->consulting_en !!}
                                @endif
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End event-details Area -->
    <section class="event-details-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($universities as $university)
                    <div class="col-lg-8 event-details-left">
                        <div class="card">
                            <a href="{{ route('universities.show', [ 'university' => $university]) }}" class="card-header container-img">
                                <img src="{{ asset('storage') .'/'. $university->university_image}}" alt=""  class="image" style="width: 100%">
                                <div class="middle">
                                    <div href="{{ route('universities.show', [ 'university' => $university]) }}" class="text-university">
                                        @lang('pages.read_more_button')
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        @if(App::getLocale() == 'uz')
                                            {{ $university->university_name_uz }}
                                        @elseif(App::getLocale() == 'ru')
                                            {{ $university->university_name_ru }}
                                        @elseif(App::getLocale() == 'en')
                                            {{ $university->university_name_en }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
            </div>
        </div>
    </section>
@endsection
