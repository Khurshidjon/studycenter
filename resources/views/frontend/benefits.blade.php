@extends('layouts.main')
@section('content')
@php 
$lang = App::getLocale();
@endphp
<style>
    .wrapper{
        padding: 12em 2em;
    }
    .wrapper h3{
        padding: 12em 2em;
        text-align: center !important;
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
        /* border: 1px solid green; */
        font-family:serif;
        font-size: 30px;
        color: chocolate;
        text-transform: uppercase;
        padding: 10px;
        width: 12em;
        text-align: center;
        background-color: #fff;
        border-radius: 17px;
        margin-bottom: 25px;
    }

    .benefits-items {
        text-align: center;
        background-color: #fff;
        padding: 10px;
        text-transform: uppercase;
        font-family:'circe', "sans-serif" !important;
    }
</style>
<div class="">
    <div class="container wrapper">
        <div class="header-section">
            <h3>{{ $menu->{'menu_name_'.$lang} }}</h3>
        </div>
        <div class="row">
            @foreach ($benefits as $benefit)
                <div class="col-md-2 card">
                    <div class="benefits-items card-header">
                        <img src="{{ asset('storage') .'/'. $benefit->image }}" class="" style="margin: 1px; width: 100%; padding: 20px" alt="">
                    </div>
                    <div class="card-body">
                        <p>{{ $benefit->{'benefit_'.$lang} }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection