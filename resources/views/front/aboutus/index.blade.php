@extends('front.layouts.master')
@section('title')
    من نحن
@endsection

@section('css')

@endsection

@section('contact')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('front/images/background/1.jpg')}})">
        <div class="auto-container">
            <h1 style="font-family: 'Cairo', sans-serif;">من نحن</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('website')}}">الصفحه الرئسيه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Company Section-->
    <!--About Section-->
    <section class="about-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image">
                            <img src="{{asset(aboutsActive()->image)}}" alt="" />
                        </div>
                    </div>
                </div>

                <!--Content Column-->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--Sec Title-->
                        <div class="sec-title alternate">
                            <h2  style="font-family: 'Cairo', sans-serif;">{{aboutsActive()->name}}</h2>
                        </div>
                        <div class="text"  style="font-family: 'Cairo', sans-serif;">
                            {!! aboutsActive()->notes !!}

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End About Section-->
    <!--End Company Section-->



    <!--Team Section-->
    <section class="team-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title">
                <h2  style="font-family: 'Cairo', sans-serif;">  شركاء النجاح</h2>
            </div>
            <div class="row clearfix">

               @foreach(ProfessorActive() as $row)
                <div class="team-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{asset($row->image)}}" alt="" />
                        </div>
                        <div class="lower-content">
                            <h3><a style="font-family: 'Cairo', sans-serif;">{{$row->name}}</a></h3>
                            <div class="text"  style="font-family: 'Cairo', sans-serif;">{!! Str::limit($row->notes, 150) !!}</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>




    <!--Certificate Section-->
    <section class="certificate-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title alternate centered">
                <div class="title-inner">
                    <h2 style="font-family: 'Cairo', sans-serif;">الاعلانات</h2>
                </div>
            </div>
            <div class="row clearfix">

                @foreach(AdsActive() as $ads)
                    <!--Certificate Block-->
                    <div class="certificate-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <img src="{{asset($ads->image)}}" alt="" />
                            </div>
                            <div class="text" style="font-family: 'Cairo', sans-serif;">{{$ads->name}}</div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>

@endsection


@section('js')

@endsection
