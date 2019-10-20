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
        background-size: 55%;
        background-position: right;
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
        border: 1px solid green;
        border-radius: 20px;
        background-color: #fff;
        padding: 20px;
        text-transform: uppercase;
        font-family:cursive;
        margin: 28px;
    }
</style>
<div class="content">
    <div class="container wrapper">
        <div class="header-section mb-4">
            <h3>{{ $menu->{'menu_name_'.$lang} }}</h3>
        </div>
        <div class="card">
            <div class="card-header">
                {{ $complexTests->{'description_'.$lang} }}
            </div>
            <div class="card-body">
                <img class="w-100" src="{{ asset('storage') .'/'. $complexTests->filname }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection