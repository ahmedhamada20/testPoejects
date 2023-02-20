@extends('front.layouts.master')
@section('title')
    تفاصيل المنتج
@endsection

@section('css')

@endsection

@section('contact')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('front/images/background/2.jpg')}})">
        <div class="auto-container">
            <h1 style="font-family: 'Cairo', sans-serif;">تفاصيل المنتج</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('website')}}">الصفحه الرئسيه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Windows Section-->
    <section class="windows-page-section" dir="ltr">
        <div class="auto-container">
            <!--Title Box-->
            <div class="title-box">
                <h2  style="font-family: 'Cairo', sans-serif;">{{$data->name}}</h2>
            </div>



            <div class="row clearfix">

                <!--Content Column-->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <div class="text">
                            <div class="image-gallery">
                                <div class="clearfix">
                                    <div class="image-column col-lg-12 col-md-6 col-sm-12">

                                        <img src="{{asset($data->image)}}" alt="" />
                                    </div>

                                </div>
                            </div>
                            <h3  style="font-family: 'Cairo', sans-serif;">{{$data->name}}</h3>
                            <p>

                                {!! Str::limit($data->notes, 6000) !!}
                            </p>
                        </div>



                    </div>
                </div>

                <!--Sidebar Column-->
                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <!--Consulting Widget-->
                        <div class="services-widget consulting-widget">
                            <div class="widget-content">

                                <h2  style="font-family: 'Cairo', sans-serif;">ارسال طلب للخدمه</h2>

                                <!--Consulting Form-->
                                <div class="consulting-form"  style="font-family: 'Cairo', sans-serif;">

                                    <form method="post" action="{{ route('sendContact') }}" autocomplete="off">
                                        @csrf

                                        <input type="hidden" name="type_contact" value="4">

                                        <div class="form-group">
                                            <input type="text" name="name" value="" placeholder="الاسم">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="" placeholder="البريد الالكتروني">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="" placeholder="رقم الهاتف">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" value="{{$data->name}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="notes" placeholder="اكتب استفسارك"></textarea>
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

                                        <div class="form-group">
                                            <button type="submit" class="theme-btn submit-btn">ارسال</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>



                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--End Windows Section-->
@endsection


@section('js')

@endsection
