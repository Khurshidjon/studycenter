@extends('layouts.main')
@section('content')
@php
    $lang = App::getLocale();
@endphp
    <!-- start banner Area -->
    <section class="banner-area relative blog-home-banner" id="home" style="background: url('{{ asset('storage') .'/'. $posts->first()->image}}')">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content blog-header-content col-lg-12">
                    <h1 class="text-white" style="max-width: 100em !important;">
                        {{ $posts->first()->{'title_'.$lang} }}
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
    <section class="post-content-area" style="padding: 10px 10em">
        <div class="container-fluid">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-5">
                        <div class="single-post">
                            <div>
                                <a class="posts-title text-secondary" href="{{ route('single-news', ['post' => $post]) }}">
                                    <div class="feature-img" style="height: 15rem; overflow:hidden">
                                        <img class="img-fluid" src="{{ asset('storage') .'/'. $post->image }}" alt="" style="height: 100%;">
                                    </div>
                                    <b>{{ $post->{'title_'.$lang} }}</b>
                                </a>
                                <p class="excert">
                                    {{ str_limit($post->{'description_'.$lang}, 100) }}
                                </p>
                                <div class="container-fluid" style="position: absolute; bottom: 10%; top: 90%">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="date"><a href="#">{{ $post->created_at->format('d M, Y') }}</a> <span class="lnr lnr-calendar-full"></span></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="view"><a href="#">{{ $post->view_count }} Views</a> <span class="lnr lnr-eye"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{ $posts->links() }}
            </div>
        </div>
    </section>
    <!-- End post-content Area -->

@endsection
