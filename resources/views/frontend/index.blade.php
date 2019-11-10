@extends('layouts.main')
@section('content')
@php
    $lang = App::getLocale();
@endphp
<style>

    .gallery-area .card-body{
        height: 14em;
        overflow: hidden;
        text-align: center;
        padding-bottom: 40px;
        color: #546bb1;
    }
    .gallery-area .card-body img{
        height: 100%;
    }
    .post-area .card-body{
        height: 18em;
        overflow: hidden;
        padding-bottom: 110px;
        padding-left: 1px;
        text-justify: auto;
        padding-right: 1px;
        color: #546bb1;
    }
    .post-area .card-body img{
        height: 100%;
    }
</style>
    <!-- start banner Area -->
    <section class="banner-area relative" id="home" @if($banner->home_banner) style="height: 25em; background: url('{{ asset('storage') .'/'. $banner->home_banner}}') no-repeat center; background-size: cover" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row  align-items-center justify-content-between">
                <div class="banner-content col-lg-9 col-md-12" id="text-banner">
                    <p class="pt-10 pb-10">
                    </p>
                    <a href="{{ route('about-us') }}"  style="position: relative; color: #546bb1 ; background: rgba(0,0,0,0.4); font-size: 2em; height: 2em; padding: 0 1.5em;" class="primary-btn text-uppercase">@lang('pages.home_banner_button')</a>
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
                                <a href="{{ route('languages') }}" style="color: #ffffff !important;">@lang('pages.home_banner_widget_one_title')</a>
                            </h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
{{--                                @lang('pages.home_banner_widget_one_text')--}}
                            </p>
                        <a class="btn" href="{{ route('courses') }}">@lang('pages.classes')</a>
                            <a class="btn" href="{{ route('teachers') }}">@lang('pages.teachers')</a>
                            <a class="btn" href="{{ route('schedules') }}">@lang('pages.schedules')</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-feature">
                        <div class="title">
                            <h4>
                                <a style="color: #ffffff !important;" href="{{ route('work-and-study') }}">@lang('pages.home_banner_widget_two_title')</a>
                            </h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
{{--                                @lang('pages.home_banner_widget_two_text')--}}
                            </p>
                            @foreach($universities as $university)
                                <a class="btn" href="{{ route('universities.index', [ 'country' => $university]) }}">
                                    {{ $university->{'country_'.$lang} }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->

    <!-- Start blog Area -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-20 mt-20 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10" style="text-transform: uppercase">@lang('pages.latest_posts')</h1>
                    </div>
                </div>
            </div>
            <div class="row post-area">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 card">
                        <div class="card-body">
                            <a href="{{ route('single-news', ['post' => $post]) }}">
                                <img class="card-img-top rounded" src="{{ asset('storage') .'/'. $post->image }}" alt="">
                            </a>
                            <div class="">
                                    <span class="float-right">
                                        <i class="fa fa-eye"></i>
                                        {{ $post->view_count }}
                                    </span>
                                    <span class="ml-auto">
                                        <i class="fa fa-calendar"></i>
                                        {{ $post->created_at->format("Y-d-m") }}
                                    </span>
                            </div>
                            <a href="" style="color: #546bb1;">
                                <p class="">{{ $post->{'title_'.$lang} }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End blog Area -->


    {{-- Start Album area --}}


    <section class="mb-5" style="margin-top: 2em">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-10 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10" style="text-transform: uppercase">@lang('pages.galleries')</h1>
                    </div>
                </div>
            </div>
            <div class="row gallery-area">
                @foreach($albums as $album)
                    <div class="col-lg-4 col-md-6 card">
                        <a href="{{ route('gallery.items', ['album' => $album]) }}" class="card-body">
                            <img class="card-img-top rounded" src="{{ asset('storage') .'/'. $album->filename }}" alt="">
                            <p class="mt-2">{{ $album->{'album_name_'.$lang} }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- End Album Area --}}
@endsection
