@extends('layouts.main')
@section('content')

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home" @if($banner->courses_banner) style="background: url('{{ asset('storage') .'/'. $banner->courses_banner}}') no-repeat; background-size: cover;" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @if(App::getLocale() == 'uz')
                            {{ $course->course_name_uz }}
                        @elseif(App::getLocale() == 'ru')
                            {{ $course->course_name_ru }}
                        @elseif(App::getLocale() == 'en')
                            {{ $course->course_name_en }}
                        @endif
                    </h1>
                    <p class="text-white link-nav"><a href="{{ route('index') }}">@lang('pages.home') </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('courses') }}">@lang('pages.languages')</a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('course.show', ['course' => $course]) }}">
                            @if(App::getLocale() == 'uz')
                                {{ $course->course_name_uz }}
                            @elseif(App::getLocale() == 'ru')
                                {{ $course->course_name_ru }}
                            @elseif(App::getLocale() == 'en')
                                {{ $course->course_name_en }}
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
                        <img class="img-fluid" src="{{ asset('storage') .'/'. $course->course_image}}" alt="">
                    </div>
                    <div class="details-content">
                        <h4>@lang('pages.price'): {{ $course->course_price }} UZS / @lang('pages.price_month')</h4>
                       <p>
                           @if(App::getLocale() == 'uz')
                               {!! $course->course_content_uz !!}
                           @elseif(App::getLocale() == 'ru')
                               {!! $course->course_content_ru !!}
                           @elseif(App::getLocale() == 'en')
                               {!! $course->course_content_en !!}
                           @endif
                       </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End event-details Area -->



@endsection
