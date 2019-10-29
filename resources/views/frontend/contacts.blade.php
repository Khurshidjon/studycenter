@extends('layouts.main')
@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home" @if($banner->contacts_banner) style="background: url('{{ asset('storage') .'/'. $banner->contacts_banner}}') no-repeat; background-position: 100% 90%; background-size: cover;" @endif>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @lang('pages.contacts')
                    </h1>
                    {{-- <p class="text-white link-nav"><a href="{{ route('index') }}">@lang('pages.home') </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('contact-us') }}"> @lang('pages.contacts')</a></p> --}}
                </div>
            </div>
        </div>
    </section>
    @php 
        $lang = App::getLocale();
    @endphp
    <!-- End banner Area -->
    @if ($message = \Session::get('alert'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div>
                <p>
                        {!! $contacts->{'text_'.$lang} !!}
                </p>
            </div>
            <br>
            <hr>
            <div class="row">
                <div class="map-wrap" style="width:100%; height: 445px;">
                    <iframe src="https://yandex.uz/map-widget/v1/-/CGDvjY7Y"  style="width: 100%; height: 100%" frameborder="1" allowfullscreen="true"></iframe>
                </div>
                <div class="col-lg-4 d-flex flex-column address-wrap">
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-home"></span>
                        </div>
                        <div class="contact-details">
                            <p>
                                {{ $contacts->{'address_name_'.$lang} }}
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <div class="contact-details">
                            <p> {{ $contacts->phone }}</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <p> {{ $contacts->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form class="form-area contact-form text-right" action="{{ route('subject') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control { $errors->has('name') ? 'is-invalid' : '' }}" required="" type="text">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control { $errors->has('email') ? 'is-invalid' : '' }}" required="" type="email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control { $errors->has('subject') ? 'is-invalid' : '' }}" required="" type="text">
                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                                <input id="captcha" type="text" class="form-control {{ $errors->has('captcha') ? 'is-invalid' : '' }}" placeholder="Enter Captcha" name="captcha">
                                @if ($errors->has('captcha'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 form-group">
                                <textarea class="common-textarea form-control { $errors->has('message') ? 'is-invalid' : '' }}" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                                <div class="captcha mt-25 float-left">
                                    <span>{!! captcha_img('flat') !!}</span>
                                    <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="alert-msg" style="text-align: left;"></div>
                                <button type="submit" class="genric-btn primary" style="float: right;">@lang('pages.send_message')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact-page Area -->
    <script>
        $(function () {
            $(".btn-refresh").on('click', function(){
                $.ajax({
                    type:'GET',
                    url:'{{ route('refresh_captcha') }}',
                    success:function(data){
                        $(".captcha span").html(data);
                    }
                });
            });
        });
    </script>
@endsection
