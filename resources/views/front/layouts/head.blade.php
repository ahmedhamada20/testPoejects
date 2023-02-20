<title>@yield('title')</title>
<!-- Stylesheets -->
<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('front/css/style.css')}}" rel="stylesheet">
<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
<!-- Responsive -->

<link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('front/js/respond.js')}}"></script><![endif]-->

@yield('css')
