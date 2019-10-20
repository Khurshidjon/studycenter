@extends('layouts.main')
@section('content')

@php
    $lang = App::getLocale();
@endphp

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home" @if($banner->universities_banner) style="background: url('{{ asset('storage') .'/'. $banner->universities_banner}}')" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{ $university->{'university_name_'.$lang} }}
                    </h1>
                    <p class="text-white link-nav">
                        <a href="{{ route('index') }}">Home </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="#">Universities</a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('universities.index', ['country' => $university->country]) }}">
                            {{ $university->country->{'country_'.$lang} }}
                        </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('universities.show', ['university' => $university]) }}">
                            {{ $university->{'university_name_'.$lang} }}
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
                                {{ $university->{'university_name_'.$lang} }}
                            </h4>
                        </a>
                        <p>
                            {!! $university->{'university_content_'.$lang} !!}
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End event-details Area -->

@endsection
