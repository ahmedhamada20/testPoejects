@extends('front.layouts.master')
@section('title')
   المقالات
@endsection

@section('css')

@endsection

@section('contact')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('front/images/background/2.jpg')}})">
        <div class="auto-container">
            <h1 style="font-family: 'Cairo', sans-serif;">المقالات</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('website')}}">الصفحه الرئسيه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Blog Page Section -->
    <section class="blog-page-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--News Block-->
                @foreach(blogActive() as $blog)
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('blogsDetails',preg_replace('/\s+/', '-',  $blog->name))}}"  style="font-family: 'Cairo', sans-serif;"><img src="{{asset($blog->image)}}" alt="" /></a>
                        </div>
                        <div class="lower-content">

                            <h3><a href="{{route('blogsDetails',preg_replace('/\s+/', '-',  $blog->name))}}"  style="font-family: 'Cairo', sans-serif;">{{$blog->name}}</a></h3>
                            <div class="text">
                                {!! Str::limit($blog->notes, 650) !!}
                            </div>
                            <ul class="post-date">
                                <li>{{date($blog->created_at->format('d'))}}  {{date($blog->created_at->format('m'))}}, {{date($blog->created_at->format('Y'))}}</li>

                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Blog Page Section -->

@endsection


@section('js')

@endsection
