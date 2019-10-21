@extends('layouts.main')
@section('content')
@php 
$lang = App::getLocale();
@endphp
<style>
    .wrapper{
        padding: 12em 2em;
    }
    body{
        background-color: white;
    }
    .content{
        background: url("img/new/hand1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: right;
    }
    .content::before{
        content: '';
        position: absolute;
        height: 100%;
        width: 100%;
        /* background-color: rgba(0, 0, 0, 0.3); */
    }
    .header-section h3{
        border: 1px solid green;
        font-family:cursive;
        padding: 10px;
        width: 12em;
        text-align: center;
        background-color: #fff;
        border-radius: 17px;
    }
    .benefits-items {
        /* border: 1px solid green; */
        text-align: center;
        border-radius: 20px;
        background-color: #fff;
        padding: 25px;
        text-transform: uppercase;
        font-family:cursive;
        margin: 25px;
    }
</style>
<div class="content">
    <div class="container-fluid wrapper">
        <div class="header-section">
            <h3>{{ $menu->{'menu_name_'.$lang} }}</h3>
        </div>
        <div class="row">
            <div class="col-md-7 px-5">
                <div class="row">
                    @foreach ($benefits as $benefit)
                        <div class="col-md-4">
                            <div class="benefits-items">
                                <img src="{{ asset('storage') .'/'. $benefit->image }}" style="width: 100%" alt="">
                                {{ $benefit->{'benefit_'.$lang} }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection