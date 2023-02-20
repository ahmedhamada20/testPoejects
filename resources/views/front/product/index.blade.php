@extends('front.layouts.master')
@section('title')
    المنتجات
@endsection

@section('css')

@endsection

@section('contact')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('front/images/background/2.jpg')}})">
        <div class="auto-container">
            <h1 style="font-family: 'Cairo', sans-serif;">{{$category->name}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('website')}}">الصفحه الرئسيه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Windows Section-->
    <section class="windows-page-section">
        <div class="auto-container">
            <!--Title Box-->
            <div class="title-box">
                <h2  style="font-family: 'Cairo', sans-serif;">{{$category->name}}</h2>
            </div>



            <div class="row clearfix">

                <!--Content Column-->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="blocks-outer">
                            <div class="row clearfix">

                                @foreach($data as $row)
                                <!--Window Block Two-->
                                <div class="window-block-two col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <img src="{{asset($row->image)}}" alt=""  />
                                        <div class="lower-content">
                                            <h3><a href="{{route('productsDetails',preg_replace('/\s+/', '-',  $row->name))}}"  style="font-family: 'Cairo', sans-serif;">{{$row->name}}</a></h3>
                                            <div class="text"> {!! Str::limit($row->notes, 50) !!}</div>
                                            <a class="explore" href="{{route('productsDetails',preg_replace('/\s+/', '-',  $row->name))}}"  style="font-family: 'Cairo', sans-serif;">قراءه التفاصيل <span class="arrow flaticon-right-arrow-4"></span></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                        <!--Windows Blocks-->


                    </div>
                </div>

                <!--Sidebar Column-->
                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <!--Consulting Widget-->
                        <div class="services-widget consulting-widget">
                            <div class="widget-content">

                                <h2  style="font-family: 'Cairo', sans-serif;">ارسال استفسار</h2>

                                <!--Consulting Form-->
                                <div class="consulting-form"  style="font-family: 'Cairo', sans-serif;">

                                    <form method="post" action="{{ route('sendContact') }}" autocomplete="off">
                                        @csrf

                                        <input type="hidden" name="type_contact" value="3">

                                        <div class="form-group">
                                            <input type="text" name="name" value="" placeholder="الاسم" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="" placeholder="البريد الالكتروني" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="" placeholder="رقم الهاتف" >
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select-box" name="subject">
                                                <option value="" disabled selected>اختر من القائمه</option>
                                                @foreach(CategoryHome() as $data)
                                                  <option value="{{ $data->name }}">{{ $data->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="notes" placeholder="ارسال استفسارك"></textarea>
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

{{--                        <!--Brands Widget-->--}}
{{--                        <div class="services-widget brands-widget">--}}
{{--                            <div class="widget-content">--}}
{{--                                <h2>Top Brands</h2>--}}
{{--                                <div class="single-item-carousel owl-carousel owl-theme">--}}

{{--                                    <div class="content">--}}
{{--                                        <div class="brand-image">--}}
{{--                                            <img src="{{asset('front/images/resource/brand.png')}}" alt="" />--}}
{{--                                        </div>--}}
{{--                                        <h3>Unilux</h3>--}}
{{--                                        <div class="text">Great explorer the truth master builder of human happiness.</div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content">--}}
{{--                                        <div class="brand-image">--}}
{{--                                            <img src="{{asset('front/images/resource/brand.png')}}" alt="" />--}}
{{--                                        </div>--}}
{{--                                        <h3>Unilux</h3>--}}
{{--                                        <div class="text">Great explorer the truth master builder of human happiness.</div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content">--}}
{{--                                        <div class="brand-image">--}}
{{--                                            <img src="{{asset('front/images/resource/brand.png')}}" alt="" />--}}
{{--                                        </div>--}}
{{--                                        <h3>Unilux</h3>--}}
{{--                                        <div class="text">Great explorer the truth master builder of human happiness.</div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!--Award Widget-->--}}
{{--                        <div class="services-widget award-widget">--}}
{{--                            <div class="widget-content">--}}
{{--                                <h2>Awards & Certificate</h2>--}}
{{--                                <div class="image">--}}
{{--                                    <img src="{{asset('front/images/resource/certificate.png')}}" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="text">Nor again is there anyone who loves or pursues or desires too.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!--Buttons Widget-->--}}
{{--                        <div class="services-widget buttons-widget">--}}
{{--                            <a class="theme-btn glass-btn" href="#"><span class="icon-box flaticon-layers-1"></span>Glass Options</a>--}}
{{--                            <a class="theme-btn color-btn" href="#"><span class="icon-box flaticon-paint"></span>Color Options</a>--}}
{{--                        </div>--}}

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--End Windows Section-->
@endsection


@section('js')

@endsection
