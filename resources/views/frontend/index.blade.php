@extends('layouts.main')
@section('content')
@php 
    $lang = App::getLocale();
@endphp

    <!-- start banner Area -->
    <section class="banner-area relative" id="home" @if($banner->home_banner) style="height: 25em; background: url('{{ asset('storage') .'/'. $banner->home_banner}}') no-repeat center; background-size: cover" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row  align-items-center justify-content-between">
                <div class="banner-content col-lg-9 col-md-12" id="text-banner">
                    <h1 class="text-uppercase" style="font-size: 35px; font-family: circe, 'sans-serif'">
                        @lang('pages.banner_title')
                    </h1>
                    <p class="pt-10 pb-10">
                    </p>
                    <a href="{{ route('about-us') }}"  style="position: relative; color: greenyellow; background: rgba(0,0,0,0.4); font-size: 2em; height: 2em; padding: 0 1.5em" class="primary-btn text-uppercase">@lang('pages.home_banner_button')</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start feature Area -->
    <section class="feature-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-feature">
                        <div class="title">
                            <h4>
                                <a href="{{ route('courses') }}" style="color: #ffffff !important;">@lang('pages.home_banner_widget_one_title')</a></h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                @lang('pages.home_banner_widget_one_text')
                            </p>
                            @foreach($courses as $course)
                                <a href="{{ route('course.show', ['course' => $course]) }}">
                                    {{ $course->{'course_name_'.$lang} }}
                                </a>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-feature">
                        <div class="title">
                            <h4>
                                <a style="color: #ffffff !important;" href="{{ route('consulting') }}">@lang('pages.home_banner_widget_two_title')</a>
                            </h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                @lang('pages.home_banner_widget_two_text')
                            </p>
                            @foreach($universities as $university)
                                <a href="{{ route('universities.show', [ 'university' => $university]) }}">
                                    {{ $university->{'university_name_'.$lang} }}
                                </a>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->

    <!-- Start blog Area -->
    <section class="blog-area section-gap" id="blog">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10" style="text-transform: uppercase">@lang('pages.latest_posts')</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-3 col-md-6 single-blog">
                        <a href="{{ route('single-news', ['post' => $post]) }}" class="thumb">
                            <img class="img-fluid" src="{{ asset('storage') .'/'. $post->image }}" alt="">
                        </a>
                        <p class="meta">{{ $post->created_at->format("d F, Y") }} | <i class="fa fa-user-circle"></i> <a href="#">
                                {{ $post->user->name }}
                            </a>
                        </p>
                        <a href="{{ route('single-news', ['post' => $post]) }}">
                            <h5>
                                {{ str_limit($post->{'title_'.$lang}, 85) }}
                            </h5>
                        </a>
                        <p>
                            {{ $post->meta_description }}
                        </p>
                        <a href="{{ route('single-news', ['post' => $post]) }}" class="details-btn d-flex justify-content-center align-items-center"><span class="details">@lang('pages.read_more_button')</span><span class="lnr lnr-arrow-right"></span></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End blog Area -->
@endsection
