@extends('layouts.main')
@php
    $lang = App::getLocale();
@endphp
<style>    
    .languages  .language-items a{
        margin: 20px;
        width: 10em;
        text-align: center;
        background-color: white;
        font-size: 30px;
        font-family: "Times New Roman" serif !important;
        color: green !important;
     }
    .languages .language-title{
        background-color: white;
        border-radius: 20px;
        font-size: 25px;
        font-weight: bold;
        margin: 30px;
        text-align: center;
        font-family: "Times New Roman" serif !important;
    }
    body{
        background-color: white !important;
    }
    .event-details-area{
        margin-top: -3em;
    }
    .items img {
        height: 70px;
    }
    .item-container .item-content{
        border: 1px solid grey;
        border-radius: 5px;
        padding-top: 10px;
        box-shadow: 0 0 7px 1px grey;
    }
</style>
@section('content')
<div class="wrapper">
    <section class="event-details-area section-gap courses-container">
        <div class="container languages">
            <div class="language-title text-uppercase">
                {{ $menu->{'menu_name_'.$lang} }}
            </div>
            <div class="row justify-content-center">
                    {{-- style="margin-top: -20px; padding-left: 70px" --}}
                <div class="col-md-12 text-center" >
                    <div class="row">
                    {{-- <ul class="list-group"> --}}
                        @foreach($menus as $item)
                            <div class="col-md-4 item-container">
                                <div class="item-content">
                                    <a href="{{ $item->url }}" class="text-secondary items" style="font-size: 17px;">
                                        <img src="{{ asset('storage') .'/'. $item->image}}" class="" style="width: 70px;" alt="">
                                        <p class="pt-3"> {{ $item->{'name_'.$lang} }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    {{-- </ul> --}}
                    </div>
                </div>
                <div class="col-md-8">
                    {{-- <img src="{{ asset('storage'.'/'.$back->trading_center_image) }}" style="width: 100%" alt=""> --}}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
