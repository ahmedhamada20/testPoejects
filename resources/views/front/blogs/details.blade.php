@extends('front.layouts.master')
@section('title')
    تفاصيل المقاله
@endsection

@section('css')

@endsection

@section('contact')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('front/images/background/2.jpg')}})">
        <div class="auto-container">
            <h1 style="font-family: 'Cairo', sans-serif;">تفاصيل المقاله</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('website')}}">الصفحه الرئسيه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container" style="direction: ltr !important;">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-single">
                        <div class="inner-box">
                            <div class="upper-box">
                                <!--Author-->

                                <h2  style="font-family: 'Cairo', sans-serif;">{{$data->name}}</h2>
                                <ul class="post-date">
                                    <li>{{ $data->created_at->diffForHumans(['parts'=>3,'join'=>', '])}}</li>

                                </ul>
                            </div>
                            <div class="text">
                                <p  style="font-family: 'Cairo', sans-serif;">
                                    {{$data->notes}}
                                </p>
                                <div class="image">
                                    <img src="{{asset($data->image)}}" alt="" />
                                </div>


                            </div>

                        </div>
                    </div>



                    <!-- Comment Form -->
                    <div class="comment-form">
                        <div class="group-title">
                            <h2  style="font-family: 'Cairo', sans-serif;">استفسارك</h2>
                        </div>
                        <form method="post" action="{{ route('sendContact') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="type_contact" value="1">
                            <div class="row clearfix"  style="font-family: 'Cairo', sans-serif;">
                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="الاسم" @if(auth()->user()) value="{{auth()->user()->name}}" readonly @else required  @endif>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="البريد الالكتروني"  @if(auth()->user()) value="{{auth()->user()->email}}" readonly @else required  @endif>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="المقاله" readonly value="{{$data->name}}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="notes"  style="font-family: 'Cairo', sans-serif;" placeholder="كتابه الاستفسار"></textarea>
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
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-four" type="submit" name="submit-form"  style="font-family: 'Cairo', sans-serif;"><span class="arrow flaticon-right-arrow-4"></span>ارسال</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar">




                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title"><h3  style="font-family: 'Cairo', sans-serif;" >مقالات اخري</h3></div>

                            @foreach(blogActive() as $blog)
                            <article class="post">
                                <figure class="post-thumb"><a href="{{route('blogsDetails',preg_replace('/\s+/', '-',  $blog->name))}}"  style="font-family: 'Cairo', sans-serif;"><img src="{{asset($blog->image)}}" alt=""></a></figure>
                                <div class="text"><a href="{{route('blogsDetails',preg_replace('/\s+/', '-',  $blog->name))}}"  style="font-family: 'Cairo', sans-serif;">{{$blog->name}}</a></div>
                                <div class=""><span>{{ $blog->created_at->diffForHumans(['parts'=>3,'join'=>', '])}}</span></div>
                            </article>
                            @endforeach


                        </div>


                    </aside>
                </div>

            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->

@endsection


@section('js')

@endsection
