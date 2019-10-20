@extends('layouts.main')
@section('content')
@php
    $lang = App::getLocale();
@endphp
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
                        {{ $post->{'title_'.$lang} }}
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
                                <p class="date col-lg-12 col-md-12 col-3"><a href="#">{{ $post->created_at->format('d M, Y') }}</a> <span class="lnr lnr-calendar-full"></span></p>
                                <p class="view col-lg-12 col-md-12 col-3"><a href="#">{{ $post->view_count }} Views</a> <span class="lnr lnr-eye"></span></p>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h3 class="mt-20 mb-20">
                                {{ $post->{'title_'.$lang} }}
                            </h3>
                            <p class="excert">
                                {{ $post->{'description_'.$lang} }}
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="quotes">
                                {!! $post->{'body_'.$lang} !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="popular-title">Similar news</h4>
                            <div class="popular-post-list">
                                @foreach($similar_posts as $similar_post)
                                    <div class=" align-items-center">
                                        <div style="width: 100%">
                                            <img class="img-fluid" src="{{ asset('storage') .'/'. $similar_post->image}}" alt="">
                                        </div>
                                        <div class="details">
                                            <a href="{{ route('single-news', ['post' => $similar_post]) }}">
                                                <h6>
                                                    {{ str_limit($post->{'title_'.$lang}, 50) }}
                                                </h6></a>
                                                <h6 class="text-info float-right">{{ $similar_post->created_at->format('d M, Y') }}</h6>
                                                <hr>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection
