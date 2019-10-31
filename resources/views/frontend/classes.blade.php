@extends('layouts.main')
@php
    $lang = App::getLocale();
@endphp
<style>
    .container-img {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .container-img:hover .image {
        opacity: 0.5;
        background-color: black;
        transform: rotate(360deg);
    }

    .container-img:hover .middle {
        opacity: 1;
    }

    .text-university {
        background-color: rgba(0, 0, 0, 0.5) !important;
        color: white !important;
        font-size: 16px !important;
        padding: 16px 32px !important;
    }
    .languages .language-items{
        /* border: .1em solid grey; */
        /* border-radius: 50px; */
        min-height: 19em;
        font-size: 20px;
        padding: 55px;
        margin: auto 20px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: white;
    }
    .languages .language-items:hover{
        cursor: pointer;
        /* -webkit-box-shadow: -1px 28px 13px -5px rgba(163,212,180,0.7);
        -moz-box-shadow: -1px 28px 13px -5px rgba(163,212,180,0.7);
        box-shadow: -1px 28px 13px -5px rgba(163,212,180,0.7); */
    }
    .languages .language-title{
        /* border: .05em solid green; */
        background-color: white;
        border-radius: 20px;
        width: 20em;
        font-size: 20px;
        padding: 15px;
        margin: 10px ;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }
    .languages .language-items li{
        color: grey;
        font-size: 17px;
        /* padding-left: 50px; */
    }
    .languages .language-items ul li::before{
        content: "\f00c"; /* FontAwesome Unicode */
        font-family: FontAwesome;
        display: inline-block;
        margin-left: -1.3em; /* same as padding-left set on li */
        width: 1.3em; /* same as padding-left set on li */
    }
    .languages .language-items img{
        width: 100%;
        /* height: 100%; */
    }
    .wrapper{
        background-color:#ffffff;
        margin-top: -80px; 
    }
    .courses-container{
        background:url("{{ asset('storage'.'/'.$back->language_courses_image) }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        /* height: 90%; */
        width: 100%; 
    }
</style>
@section('content')
<div class="wrapper">
    <section class="event-details-area section-gap courses-container">
            <div class="container languages">
                <div class="row justify-content-center">
                    @foreach ($courses as $course)
                    <div class="col-md-6 card">
                        <div class="card-body">
                            <div class="language-items" >
                                    <span style="font-size: 25px; font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">{{ $course->{'course_name_'.$lang} }}</span>
                                    <br>
                                    <br>
                                        {!! $course->{'course_content_'.$lang} !!}
                                    <br>
                                    <span style="font-size: 20px; font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">@lang('pages.price'): {{ $course->course_price }}/@lang('pages.price_month')</span>                            
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
</div>
@endsection
