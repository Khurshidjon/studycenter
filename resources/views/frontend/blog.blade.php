@extends('layouts.main')
@section('content')

    <!-- start banner Area -->
    <section class="banner-area relative blog-home-banner" id="home" style="background: url('{{ asset('storage') .'/'. $posts->first()->image}}')">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content blog-header-content col-lg-12">
                    <h1 class="text-white" style="max-width: 100em !important;">
                        @if(App::getLocale() == 'uz')
                            {{ $posts->first()->title_uz }}
                        @elseif(App::getLocale() == 'ru')
                            {{ $posts->first()->title_ru }}
                        @elseif(App::getLocale() == 'en')
                            {{ $posts->first()->title_en }}
                        @endif
                    </h1>
                    <p class="text-white">

                    </p>
                    <a href="{{ route('single-news', ['post' => $posts->first()]) }}" class="primary-btn">@lang('pages.read_more_button')</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start top-category-widget Area -->
    <section class="top-category-widget-area pt-20 pb-90 ">
    </section>
    <!-- End top-category-widget Area -->

    <!-- Start post-content Area -->
    <section class="post-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 posts-list">
                    @foreach($posts as $post)
                        <div class="single-post row">
                            <div class="col-lg-3  col-md-3 meta-details">
                                <ul class="tags">
                                    <li><a href="#">{{ $post->category->name }}</a></li>

                                </ul>
                                <div class="user-details row">
                                    <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{ $post->user->name }}</a> <span class="lnr lnr-user"></span></p>
                                    <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $post->created_at->format('d M, Y') }}</a> <span class="lnr lnr-calendar-full"></span></p>
                                    <p class="view col-lg-12 col-md-12 col-6"><a href="#">{{ $post->view_count }} Views</a> <span class="lnr lnr-eye"></span></p>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 ">
                                <div class="feature-img">
                                    <img class="img-fluid" src="{{ asset('storage') .'/'. $post->image }}" alt="">
                                </div>
                                <a class="posts-title" href="blog-single.html"><h3>
                                        @if(App::getLocale() == 'uz')
                                            {{ $post->title_uz }}
                                        @elseif(App::getLocale() == 'ru')
                                            {{ $post->title_ru }}
                                        @elseif(App::getLocale() == 'en')
                                            {{ $post->title_en }}
                                        @endif
                                    </h3></a>
                                <p class="excert">
                                    @if(App::getLocale() == 'uz')
                                        {{ $post->description_uz }}
                                    @elseif(App::getLocale() == 'ru')
                                        {{ $post->description_ru }}
                                    @elseif(App::getLocale() == 'en')
                                        {{ $post->description_en }}
                                    @endif
                                </p>
                                <a href="{{ route('single-news', ['post' => $post]) }}" class="primary-btn">@lang('pages.read_more_button')</a>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links('') }}
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->

@endsection
