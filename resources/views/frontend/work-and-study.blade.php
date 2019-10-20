@extends('layouts.main')
@section('content')
<style>
    .btn:focus, .btn:active, button:focus, button:active {
        outline: none !important;
        box-shadow: none !important;
    }
    .thumbnail-image {
        height: 13em;
        overflow: auto;
    }
    .thumbnail-image p{
        font-family: cursive !important;
        font-size: 25px;
        color: white;
    }
    .thumbnail img{
        border: 5px double white;
        border-radius: 10px;
        width: 100%;
        height: 70%;
    }
    .feature-area{
        background: url('img/new/country3.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
    }
    .feature-area::before{
        content: '';
        height: 100%;
        width: 100%;
        position: absolute;
        background-color: rgba(0, 0, 0, 0.4)
    }
</style>
@php
    $lang = App::getLocale();
@endphp
<section class="feature-area">
    <div class="container" style="padding: 15em 1em;">
        <h3 class="p-3 text-secondary"></h3>
        <div class="row">
            @foreach ($countries as $key => $country)
                <div class="col-lg-3 col-10 col-md-3 col-xs-4 thumbnail-image">
                    <a class="thumbnail" href="{{ route('universities.index', ['country' => $country]) }}">
                        <img class="" src="{{ asset('storage') .'/'. $country->image }}" alt="{{ $country->{'country_'.$lang} }}">
                    </a>
                    <p>{{  $country->{'country_'.$lang}  }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
