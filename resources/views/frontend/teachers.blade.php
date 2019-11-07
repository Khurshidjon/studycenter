@extends('layouts.main')
@php
    $lang = App::getLocale();
@endphp
<style>


    .card{
        border-radius: 5px!important;
        font-family: sans-serif;
    }
    .languages .language-items ul li::before{
        content: "\f058"; /* FontAwesome Unicode */
        font-family: FontAwesome;
        display: inline-block;
        margin-left: -1.3em; /* same as padding-left set on li */
        width: 1.3em; /* same as padding-left set on li */
    }
    .wrapper{
        background-color:#dcdbdb47;
    }
    .courses-container{
        background: url("{{ asset('storage'.'/'.$back->teachers_image) }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        font-size: 12px;
    }
    .languages img{
        border-radius: 5px;
        width: 100%;
    }
    .card-header{
        height: 20em;
        overflow: hidden;
        text-align: center;
    }
    .card-header img{
        height: 100%;
    }
</style>
@section('content')
<div class="wrapper">
    <section class="event-details-area section-gap courses-container">
            <div class="container ">
                <div class="row">
                    @foreach ($teachers as $teacher)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <img src="{{ asset('storage') .'/'. $teacher->teacher_image }}" alt="">
                                </div>
                                <div class="card-body">
                                    <span>{{ $teacher->{'teacher_name_'.$lang} }}</span>
                                </div>
                                <div class="card-footer">
                                    {{  $teacher->{'teacher_description_'.$lang} }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
</div>
@endsection
