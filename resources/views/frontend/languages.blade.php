@extends('layouts.main')
@php
    $lang = App::getLocale();
@endphp
<style>    
    .languages  .language-items a{
        margin: 20px;
        /* padding: 10px 100px; */
        width: 10em;
        border-radius: 10px;
        border: .1em solid green;
        text-align: center;
        background-color: white;
        font-size: 30px;
        font-family: cursive !important;
        color: green !important;
     }
    .languages .language-title{
        border: .05em solid green;
        background-color: white;
        border-radius: 20px;
        width: 14em;
        font-size: 20px;
        padding: 15px;
        margin: 30px;
        text-align: center;
        font-family: cursive !important;
    }
    .wrapper{
        background-color: #dcdbdb47;
    }
    .courses-container{
        background: url("{{ asset('storage'.'/'.$back->trading_center_image) }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
    }
</style>
@section('content')
<div class="wrapper">
    <section class="event-details-area section-gap courses-container">
        <div class="container languages">
            <div class="language-title">
                {{ $menu->{'menu_name_'.$lang} }}
            </div>
            <div class="row">
                @foreach($menu->submenu as $item)
                    <div class="col-md-4">
                        <div class="language-items ">
                            <a href="{{ $item->site_url }}" class="btn">
                                {{ $item->{'menu_name_'.$lang} }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
