@extends('layouts.main')
@section('content')


    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home" @if($banner->universities_banner) style="background: url('{{ asset('storage') .'/'. $banner->universities_banner}}')" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @if(App::getLocale() == 'uz')
                            {{ $university->university_name_uz }}
                        @elseif(App::getLocale() == 'ru')
                            {{ $university->university_name_ru }}
                        @elseif(App::getLocale() == 'en')
                            {{ $university->university_name_en }}
                        @endif
                    </h1>
                    <p class="text-white link-nav">
                        <a href="{{ route('index') }}">Home </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="#">Universities</a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('universities.index', ['country' => $university->country]) }}">
                            @if(App::getLocale() == 'uz')
                                {{ $university->country->country_uz }}
                            @elseif(App::getLocale() == 'ru')
                                {{ $university->country->country_ru }}
                            @elseif(App::getLocale() == 'en')
                                {{ $university->country->country_en }}
                            @endif
                        </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('universities.show', ['university' => $university]) }}">
                            @if(App::getLocale() == 'uz')
                                {{ $university->university_name_uz }}
                            @elseif(App::getLocale() == 'ru')
                                {{ $university->university_name_ru }}
                            @elseif(App::getLocale() == 'en')
                                {{ $university->university_name_en }}
                            @endif
                        </a>
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
                    <div class="main-img">
                        <img class="img-fluid" src="{{ asset('storage') .'/'. $university->university_image}}" alt="">
                    </div>
                    <div class="details-content">
                        <a href="#">
                            <h4>
                                {{--@if(App::getLocale() == 'uz')
                                    {{ $university->university_name_uz }}
                                @elseif(App::getLocale() == 'ru')
                                    {{ $university->university_name_ru }}
                                @elseif(App::getLocale() == 'en')
                                    {{ $university->university_name_en }}
                                @endif--}}
                            </h4>
                        </a>
                        <p>
                            @if(App::getLocale() == 'uz')
                                {!! $university->university_content_uz !!}
                            @elseif(App::getLocale() == 'ru')
                                {!! $university->university_content_ru !!}
                            @elseif(App::getLocale() == 'en')
                                {!! $university->university_content_en !!}
                            @endif
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End event-details Area -->

@endsection
