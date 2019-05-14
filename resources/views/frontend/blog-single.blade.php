@extends('layouts.main')
@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home" @if($post->image) style="max-height: 25em; background: url('{{ asset('storage') .'/'. $post->image}}') no-repeat center; background-size: cover" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                       @lang('pages.news')
                    </h1>
                    <p class="text-white link-nav"><a href="{{ route('index') }}">@lang('pages.home') </a>  <span class="lnr lnr-arrow-right"></span><a href="{{ route('news') }}">@lang('pages.news')</a> <span class="lnr lnr-arrow-right"></span> <a href="{{ route('single-news', ['post' => $post]) }}">
                            @if(App::getLocale() == 'uz')
                                {{ $post->title_uz }}
                            @elseif(App::getLocale() == 'ru')
                                {{ $post->title_ru }}
                            @elseif(App::getLocale() == 'en')
                                {{ $post->title_en }}
                            @endif
                        </a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- Start post-content Area -->
    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            {{--<div class="feature-img">
                                <img class="img-fluid" src="{{ asset('storage') .'/'. $post->image }}" alt="">
                            </div>--}}
                        </div>
                        <div class="col-lg-3  col-md-3 meta-details">
                            <div class="user-details row">
                                <p class="user-name col-lg-12 col-md-12 col-3"><a href="#">{{ $post->user->name }}</a> <span class="lnr lnr-user"></span></p>
                                <p class="date col-lg-12 col-md-12 col-3"><a href="#">{{ $post->created_at->format('d M, Y') }}</a> <span class="lnr lnr-calendar-full"></span></p>
                                <p class="view col-lg-12 col-md-12 col-3"><a href="#">{{ $post->view_count }} Views</a> <span class="lnr lnr-eye"></span></p>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h3 class="mt-20 mb-20">
                                @if(App::getLocale() == 'uz')
                                    {{ $post->title_uz }}
                                @elseif(App::getLocale() == 'ru')
                                    {{ $post->title_ru }}
                                @elseif(App::getLocale() == 'en')
                                    {{ $post->title_en }}
                                @endif
                            </h3>
                            <p class="excert">
                                @if(App::getLocale() == 'uz')
                                    {{ $post->description_uz }}
                                @elseif(App::getLocale() == 'ru')
                                    {{ $post->description_ru }}
                                @elseif(App::getLocale() == 'en')
                                    {{ $post->description_en }}
                                @endif
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="quotes">
                                @if(App::getLocale() == 'uz')
                                    {!! $post->body_uz !!}
                                @elseif(App::getLocale() == 'ru')
                                    {!! $post->body_ru !!}
                                @elseif(App::getLocale() == 'en')
                                    {!! $post->body_en !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        {{--<div class="single-sidebar-widget search-widget">
                            <form class="search-form" action="#">
                                <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>--}}
                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="popular-title">Similar news</h4>
                            <div class="popular-post-list">
                                @foreach($similar_posts as $similar_post)
                                    <div class="single-post-list d-flex flex-row align-items-center">
                                        <div class="thumb" style="width: 100%">
                                            <img class="img-fluid" src="{{ asset('storage') .'/'. $similar_post->image}}" alt="">
                                        </div>
                                        <div class="details">
                                            <a href="{{ route('single-news', ['post' => $similar_post]) }}"><h6>
                                                    @if(App::getLocale() == 'uz')
                                                        {{ str_limit($post->title_uz, 50) }}
                                                    @elseif(App::getLocale() == 'ru')
                                                        {{ str_limit($post->title_ru, 50) }}
                                                    @elseif(App::getLocale() == 'en')
                                                        {{ str_limit($post->title_en, 50) }}
                                                    @endif
                                                </h6></a>
                                            <p>{{ $similar_post->created_at->format('d M, Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-sidebar-widget ads-widget">
                            <a href="#"><img class="img-fluid" src="{{ asset('img/blog/ads-banner.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection
