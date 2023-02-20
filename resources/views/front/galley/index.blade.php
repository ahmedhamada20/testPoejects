@extends('front.layouts.master')
@section('title')
    معرض الصور
@endsection

@section('css')

@endsection

@section('contact')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('front/images/background/2.jpg')}})">
        <div class="auto-container">
            <h1 style="font-family: 'Cairo', sans-serif;">معرض الصور</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('website')}}">الصفحه الرئسيه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
    <!--Gallery Section-->
    <section class="gallery-section-two mb-5">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <div class="title-inner">
                    <h2 style="font-family: 'Cairo', sans-serif;">معرض الصور</h2>
                </div>
            </div>
        </div>
        <div class="outer-container">
            <div class="gallery-carousel owl-carousel owl-theme">

                <!--Gallery Block-->

                @foreach(galleryActive()->photos as $row)

                    <div class="gallery-block">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{asset('admin/pictures/gallery/'.galleryActive()->id . '/' .  $row->Filename)}}" alt="" />
                                <div class="overlay-box">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
    <!--End Gallery Section-->

@endsection


@section('js')

@endsection
