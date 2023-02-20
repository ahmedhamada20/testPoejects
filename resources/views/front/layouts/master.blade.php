<!doctype html>
<html dir="rtl">
<head>
    <meta charset="utf-8">

    @include('front.layouts.head')

</head>
<body style="font-family: 'Cairo', sans-serif;">

<div class="page-wrapper">
    <div class="preloader"></div>
    @include('front.layouts.header')
    @yield('contact')

    @include('front.layouts.footer')
</div>
@include('front.layouts.footerjs')
</body>
</html>
