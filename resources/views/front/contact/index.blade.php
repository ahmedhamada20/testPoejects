@extends('front.layouts.master')
@section('title')
    تواصل معنا
@endsection

@section('css')

@endsection

@section('contact')


    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('front/images/background/2.jpg')}})">
        <div class="auto-container">
            <h1 style="font-family: 'Cairo', sans-serif;"> تواصل معنا</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('website')}}">الصفحه الرئسيه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Office Section-->
    <section class="office-section">
        <div class="auto-container">
            <div class="inner-container">
                <!--Title Box-->
                <div class="title-box">
                    <h2 style="font-family: 'Cairo', sans-serif;"> تواصل معنا</h2>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="row clearfix">

                    <!--Office Block-->
                    <div class="office-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-place"></span>
                            </div>
                            <h3 style="font-family: 'Cairo', sans-serif;">العنوان</h3>
                            <div class="text">{{settingSite()->address}}</div>

                        </div>
                    </div>

                    <!--Office Block-->
                    <div class="office-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span>
                            </div>
                            <h3 style="font-family: 'Cairo', sans-serif;"> رقم الهاتف</h3>
                            <a href="tel:{{ settingSite()->phone }}">{{ settingSite()->phone }}</a>
                        </div>
                    </div>

                    <!--Office Block-->
                    <div class="office-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-question"></span>
                            </div>
                            <h3 style="font-family: 'Cairo', sans-serif;">البريد الالكتروني</h3>
                            <a href="mailto: {{settingSite()->email}}">{{settingSite()->email}}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Office Section-->
 <div class="row">
     <div class="col-lg-7 col-sm-8">
         <h1  style="font-family: 'Cairo', sans-serif;">تواصل معانا</h1>
     </div>
 </div>
    <!--Contact Form Section-->
    <section class="contact-form-section" style="background-image: url({{asset('front/images/background/3.png')}})">

        <div class="auto-container">
            <div class="row clearfix">


                <!--Form Column-->
                <div class="form-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--Contact Form-->
                        <div class="contact-form">

                            <form method="post" action="{{ route('sendContact') }}" autocomplete="off" id="">
                                @csrf

                                <input type="hidden" name="type_contact" value="5">

                                <div class="row clearfix">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" name="name" value="" placeholder="الاسم" >
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="email" name="email" value="" placeholder="البريد الالكتروني" >
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" name="address" value="" placeholder="العنوان" >
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" name="phone" value="" placeholder="رقم الهاتف" >
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="notes" placeholder="رسالتك..."></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            {!! NoCaptcha::renderJs() !!}
                                            <div class="col-md-6">
                                                {!! app('captcha')->display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" style="font-family: 'Cairo', sans-serif;" class="theme-btn btn-style-four"><span class="arrow flaticon-right-arrow-4"></span>ارسال بياناتك</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Form Section-->



@endsection


@section('js')
    <!--Google Map APi Key-->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
    <script src="{{asset('front/js/map-script-2.js')}}"></script>
    <script src="{{asset('front/js/validate.js')}}"></script>
@endsection
