<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Landing Page</title>
    <!-- Stylesheets -->
    <link href="{{asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css') }}" rel="stylesheet"/>
    <link href="{{asset('assets/css/style1.css') }}" rel="stylesheet">
{{--    @if(Request::route()->getName() == 'index3.html' )--}}
{{--        <link href="{{asset('assets/css/style3.css') }}" rel="stylesheet">--}}
{{--    @endif--}}
{{--    @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'index1')--}}
{{--        <link href="{{asset('assets/css/style4.css') }}" rel="stylesheet">--}}
{{--    @endif--}}

{{--    @if(\Illuminate\Support\Facades\Route::has('/index2.html') )--}}
{{--        <link href="{{asset('assets/css/style2.css') }}" rel="stylesheet">--}}
{{--    @endif--}}
{{--    @if(\Illuminate\Support\Facades\Route::has('index1.html') )--}}
{{--        <link href="{{asset('assets/css/style1.css') }}" rel="stylesheet">--}}
{{--    @endif--}}
    <!-- Responsive -->

    <link href="{{asset('assets/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js') }}"></script><![endif]-->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/respond.js') }}"></script><![endif]-->
    <script src="{{asset('assets/js/jquery-3.2.1.min.js') }}"></script>

    <style>
        :root {
            --main-color: #00ca9d;
            --sec-padding: 80px 0;
        }
    </style>

</head>
<body>

<div class="mobile-menu">
    <div class="menu-mobile">
        <div class="brand-area">
            <a href="#">
                <img src="{{asset('assets/images/logo.svg')}}">
            </a>
        </div>
        <div class="mmenu">
            <ul>
                <li class="active"><a class="page-scroll" href="#home">Home</a></li>
                <li><a class="page-scroll" href="#about">About</a></li>
                <li><a class="page-scroll" href="#services">Services</a></li>
                <li><a class="page-scroll" href="#features">Features</a></li>
                <li><a class="page-scroll" href="#screensshoot">Screensshoot</a></li>
                <li><a class="page-scroll" href="#customer">Customer opinions</a></li>
                <li><a class="page-scroll" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="m-overlay"></div>
</div>
<!--mobile-menu-->

<div class="main-wrapper">

    <header id="header">
        <div class="container">
            <div class="logo-site">
                <a href="index.html">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Logo"/>
                </a>
            </div>
            <ul class="main_menu clearfix">
                <li class="active"><a class="page-scroll" href="#home">Home</a></li>
                <li><a class="page-scroll" href="#about">About</a></li>
                <li><a class="page-scroll" href="#services">Services</a></li>
                <li><a class="page-scroll" href="#features">Features</a></li>
                <li><a class="page-scroll" href="#screenshoot">Screenshoot</a></li>
                <li><a class="page-scroll" href="#customer">Customer opinions</a></li>
                <li><a class="page-scroll" href="#contact">Contact</a></li>
                <li><a href="">EN</a></li>
            </ul>
            <button type="button" class="hamburger is-closed">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
        </div>
    </header>
    <!--header-->
    {{ $slot }}

    <footer id="footer">
        <div class="container">
            <ul class="mmenu">
                <li><a href="">Terms & Condition</a></li>
                <li><a href="">Privacy Policy</a></li>
            </ul>
            <p class="ext-center copyRight">All Rights Reserved 2021 <a href="www.hexacit.com">HexaCIT</a></p>
            <ul class="social-media">
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
            </ul>
        </div>
    </footer>


</div>
<!--main-wrapper-->

<script src="{{asset('assets/js/popper.min.js') }}"></script>
<script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{asset('assets/js/wow.js') }}"></script>
<script src="{{asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
<script>
    new WOW().init();
</script>


</body>
</html>
