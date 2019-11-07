@extends('layouts.main')
@section('content')
@php
    $lang = App::getLocale();
@endphp
<style>
    .about-banner{
        background-size: cover !important;
    }
    .events-list-area{
        margin-top: -83px;
    }
    .card-header{
        height: 10em;
        overflow: hidden;
    }
</style>
<section class="banner-area relative about-banner" id="home" @if($country->image != null) style="background: url('{{ asset('storage') .'/'. $country->image}}') center no-repeat" @endif>
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    {{ $country->{'country_'.$lang} }}
                </h1>
            </div>
        </div>
    </div>
</section>

    <!-- Start events-list Area -->
<section class="events-list-area section-gap">
    <div class="container-fluid">
        <div class="row align-items-center">
            @forelse($universities as $university)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img class="img-fluid" src="{{ asset('storage') .'/'. $university->university_image}}" alt="">
                        </div>
                        <div class="card-body">
                            <p>{{ $university->{'university_name_'.$lang} }}</p>
                            <a href="{{ route('universities.show', [ 'university' => $university]) }}" class="text-uppercase btn btn-secondary mx-auto mt-10" style="font-size: 13px">@lang('pages.read_more_button')</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Nope university in here</h3>
            @endforelse
        </div>
    </div>
</section>
    <!-- End events-list Area -->


@endsection
