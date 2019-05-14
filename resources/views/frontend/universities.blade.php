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
                            {{ $country->country_uz }}
                        @elseif(App::getLocale() == 'ru')
                            {{ $country->country_ru }}
                        @elseif(App::getLocale() == 'en')
                            {{ $country->country_en }}
                        @endif
                    </h1>
                    <p class="text-white link-nav">
                        <a href="{{ route('index') }}">Home </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="#">Universities</a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('universities.index', ['country' => $country]) }}">
                            @if(App::getLocale() == 'uz')
                                {{ $country->country_uz }}
                            @elseif(App::getLocale() == 'ru')
                                {{ $country->country_ru }}
                            @elseif(App::getLocale() == 'en')
                                {{ $country->country_en }}
                            @endif
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start events-list Area -->
    <section class="events-list-area section-gap event-page-lists">
        <div class="container">
            <div class="row align-items-center">
                @forelse($universities as $university)
                    <div class="col-lg-6 pb-30">
                        <div class="single-carusel row align-items-center">
                            <a href="{{ route('universities.show', [ 'university' => $university]) }}" class="col-12 col-md-6 thumb">
                                <img class="img-fluid" src="{{ asset('storage') .'/'. $university->university_image}}" alt="">
                            </a>
                            <div class="detials col-12 col-md-6">
                                <a href="{{ route('universities.show', [ 'university' => $university]) }}">
                                    <h4>
                                        @if(App::getLocale() == 'uz')
                                            {{ $university->country->country_uz }}
                                        @elseif(App::getLocale() == 'ru')
                                            {{ $university->country->country_ru }}
                                        @elseif(App::getLocale() == 'en')
                                            {{ $university->country->country_en }}
                                        @endif
                                    </h4>
                                </a>
                                <p>
                                    @if(App::getLocale() == 'uz')
                                        {{ $university->university_name_uz }}
                                    @elseif(App::getLocale() == 'ru')
                                        {{ $university->university_name_ru }}
                                    @elseif(App::getLocale() == 'en')
                                        {{ $university->university_name_en }}
                                    @endif
                                </p>
                                <a href="{{ route('universities.show', [ 'university' => $university]) }}" class="text-uppercase primary-btn mx-auto mt-40">Read more</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center">Nope university in here</h3>
                @endforelse
{{--
                <a href="#" class="text-uppercase primary-btn mx-auto mt-40">Load more courses</a>
--}}
            </div>
        </div>
    </section>
    <!-- End events-list Area -->


@endsection
