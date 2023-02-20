<header class="main-header header-style-two" style="font-family: 'Cairo', sans-serif;">

    <!--Header Top-->
    <div class="header-top">
        <div class="auto-container">
            <div class="clearfix">
                <!--Top Left-->
                <div class="top-left">
                    <a class="text" href="{{route('website')}}">{{settingSite()->name}}</a>
                </div>
                <!--Top Right-->
                <div class="top-right">
                    <!--Social Box-->
                    <ul class="social-box">
                        <li><a href="{{settingSite()->facebook}}"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="{{settingSite()->twitter}}"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="{{settingSite()->instagram}}"><span class="fa fa-instagram"></span></a></li>
                        <li><a href="{{settingSite()->YouTube}}"><span class="fa fa-youtube-play"></span></a></li>
                    </ul>
                    <!--Language-->
{{--                    <div class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#"><span class="flag-icon"><img src="images/icons/flag-icon.jpg" alt=""/></span>En &nbsp;<span class="icon fa fa-angle-down"></span></a>--}}
{{--                        <ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu2">--}}
{{--                            <li><a href="#">English</a></li>--}}
{{--                            <li><a href="#">German</a></li>--}}
{{--                            <li><a href="#">Arabic</a></li>--}}
{{--                            <li><a href="#">Hindi</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="clearfix">
                <!--Contact Number-->
                <div class="contact-number">
                    <div class="number-inner">
                        <div class="icon-box"><span class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span>
                            <a href="tel:{{ settingSite()->phone }}">{{ settingSite()->phone }}</a>
                        </div>



                    </div>
                </div>



                <div class="pull-left upper-right clearfix">

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-pin"></span></div>
                        <ul>
                            <li><strong>العنوان</strong></li>
                            <li>{{settingSite()->address}}</li>
                        </ul>
                    </div>

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-email"></span></div>
                        <ul>
                            <li><strong>البريد الالكتروني</strong></li>
                            <a href="mailto: {{settingSite()->email}}">{{settingSite()->email}}</a>
                        </ul>
                    </div>

                </div>
                <div class="pull-right logo-box">
                    <div class=""><a href="{{route('website')}}"><img src="{{asset(settingSite()->image)}}" alt="" title=""></a></div>
                </div>



            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!--Header Lower-->
    <div class="header-lower">


        <div class="auto-container">
            <div class="nav-outer clearfix">
                <nav class="main-menu navbar-expand-md"  style="
    margin-right: 319px;">
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li><a href="{{route('contactus')}}" style="font-family: 'Cairo', sans-serif;">تواصل معانا</a></li>

                            <li class="{{getActiveRoutesHome('gallerys')}}"><a href="{{route('gallerys')}}" style="font-family: 'Cairo', sans-serif;">الصور</a>

                            </li>

                            <li class="dropdown"><a href="#" style="font-family: 'Cairo', sans-serif;">خدماتي</a>
                                <ul>
                                    @foreach(CategoryHome() as $data)
                                        <li class="p-tab-btn active-btn" data-tab="#p-tab-1{{$data->id}}"> </li>
                                        <li><a href="{{route('products',preg_replace('/\s+/', '-',  $data->name))}}">{{$data->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>


                            <li class="{{getActiveRoutesHome('blogs')}}"><a href="{{route('blogs')}}" style="font-family: 'Cairo', sans-serif;">المقالات</a></li>

                            <li class="{{getActiveRoutesHome('aboutWebsite')}}" ><a href="{{route('aboutWebsite')}}" style="font-family: 'Cairo', sans-serif;">من نحن</a></li>

                            <li class="{{getActiveRoutesHome('website')}}" ><a href="{{route('website')}}" style="font-family: 'Cairo', sans-serif;">الصفحه الرئيسية</a></li>

                        </ul>
                    </div>

                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </nav>
{{--                <!-- Main Menu End-->--}}
{{--                <div class="outer-box clearfix">--}}
{{--                    <!--Option Box-->--}}
{{--                    <ul class="option-box">--}}
{{--                        <li class="cart"><a href="shop-single.html"><span class="icon flaticon-shopping-cart-of-checkered-design"></span><span class="number">0</span></a></li>--}}
{{--                        <!--Search Box-->--}}
{{--                        <li class="search-box-outer">--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>--}}
{{--                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">--}}
{{--                                    <li class="panel-outer">--}}
{{--                                        <div class="form-container">--}}
{{--                                            <form method="post" action="http://st.ourhtmldemo.com/new/Accoya/blog.html">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="search" name="field-name" value="" placeholder="Search Here" required>--}}
{{--                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

{{--                    <!--Buttons Box-->--}}
{{--                    <div class="buttons-box">--}}
{{--                        <a class="theme-btn glass-btn" href="#"><span class="icon-box flaticon-layers-1"></span>Glass Options</a>--}}
{{--                        <a class="theme-btn color-btn" href="#"><span class="icon-box flaticon-paint"></span>Color Options</a>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <!-- Main Menu -->--}}

            </div>
        </div>
    </div>
    <!--End Header Lower-->

{{--    <!--Sticky Header-->--}}
{{--    <div class="sticky-header">--}}
{{--        <div class="auto-container clearfix">--}}
{{--            <!--Logo-->--}}
{{--            <div class="logo pull-left">--}}
{{--                <a href="index-2.html" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>--}}
{{--            </div>--}}

{{--            <!--Right Col-->--}}
{{--            <div class="right-col pull-right">--}}
{{--                <!-- Main Menu -->--}}
{{--                <nav class="main-menu navbar-expand-md">--}}
{{--                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                        <span class="icon-bar"></span>--}}
{{--                        <span class="icon-bar"></span>--}}
{{--                        <span class="icon-bar"></span>--}}
{{--                    </button>--}}

{{--                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">--}}
{{--                        <ul class="navigation clearfix">--}}
{{--                            <li class="current dropdown"><a href="#" style="font-family: 'Cairo', sans-serif;">الصفحه الرئيسية</a>--}}

{{--                            </li>--}}
{{--                            <li class="dropdown"><a href="#">Windows</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="windows-instalation.html">Installation</a></li>--}}
{{--                                    <li><a href="window-services.html">Service & Repair</a></li>--}}
{{--                                    <li><a href="window-replacement.html">Replacement</a></li>--}}
{{--                                    <li><a href="window-brands.html">Brands We Carry</a></li>--}}
{{--                                    <li><a href="window-types.html">Window Types</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown"><a href="#">Doors</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="doors-instalation.html">Installation</a></li>--}}
{{--                                    <li><a href="doors-repair.html">Service & Repair</a></li>--}}
{{--                                    <li><a href="doors-replacement.html">Replacement</a></li>--}}
{{--                                    <li><a href="doors-brands.html">Brands We Carry</a></li>--}}
{{--                                    <li><a href="doors-type.html">Doors Types</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown"><a href="#">Shop</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="shop.html">Our Products</a></li>--}}
{{--                                    <li><a href="shop-single.html">Product Single</a></li>--}}
{{--                                    <li><a href="shoping-cart.html">Shopping Cart</a></li>--}}
{{--                                    <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                    <li><a href="account.html">Account</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown"><a href="#">Gallery</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="gallery.html">Gallery Style 01</a></li>--}}
{{--                                    <li><a href="gallery-2.html">Gallery Style 02</a></li>--}}
{{--                                    <li><a href="gallery-3.html">Gallery Style 03</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown"><a href="#">Pages</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="about.html">About Company</a></li>--}}
{{--                                    <li><a href="appointment.html">Make an Appointment</a></li>--}}
{{--                                    <li><a href="pricing.html">Pricing Plan</a></li>--}}
{{--                                    <li><a href="faq.html">FAQ’s</a></li>--}}
{{--                                    <li><a href="testimonial.html">Testimonials</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown"><a href="#">Blog</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="blog.html">Our Blog</a></li>--}}
{{--                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>--}}
{{--                                    <li><a href="blog-single.html">Blog Single</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="contact.html">Contact us</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </nav><!-- Main Menu End-->--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    <!--End Sticky Header-->--}}
</header>
<!--End Main Header --
