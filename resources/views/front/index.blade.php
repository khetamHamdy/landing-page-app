<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>Landing Page</title>
    <!-- Stylesheets -->
    <link href="{{asset('assets/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css') }}" rel="stylesheet"/>
    <link href="{{asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    @if($style == 1)

        <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet">

    @elseif($style == 2)

        <link href="{{asset('assets/css/style2.css')}}" rel="stylesheet">

    @elseif($style == 3)

        <link href="{{asset('assets/css/style3.rtl.css')}}" rel="stylesheet">

    @elseif($style == 4)

        <link href="{{asset('assets/css/style4.rtl.css')}}" rel="stylesheet">

    @endif

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
                <li class="active"><a class="page-scroll" href="#home">{{__('Home')}}</a></li>
                <li><a class="page-scroll" href="#about">{{__('About us')}}</a></li>
                <li><a class="page-scroll" href="#services">{{__('Services')}}</a></li>
                <li><a class="page-scroll" href="#features">{{__('Features')}}</a></li>
                <li><a class="page-scroll" href="#screensshoot">{{__('Screensshoot')}}</a></li>
                <li><a class="page-scroll" href="#customer">{{__('Customer opinions')}}</a></li>
                <li><a class="page-scroll" href="#contact">{{__('Contact')}}</a></li>
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
                <li class="active"><a class="page-scroll" href="#home">{{__('Home')}}</a></li>
                <li><a class="page-scroll" href="#about">{{__('About us')}} </a></li>
                <li><a class="page-scroll" href="#services">{{__('Services')}}</a></li>
                <li><a class="page-scroll" href="#features">{{__('Features')}}</a></li>
                <li><a class="page-scroll" href="#screenshoot">{{__('Screensshoot')}}</a></li>
                <li><a class="page-scroll" href="#customer">{{__('Customer opinions')}}</a></li>
                <li><a class="page-scroll" href="#contact">{{__('Contact')}}</a></li>
                @guest('admin')
                <li><a class="page-scroll" href="{{route('login')}}">Login</a></li>
                @endguest
{{--                @auth('admin')--}}
{{--                    <li><a class="page-scroll" href="{{route('adminName')}}">Dashborad</a></li>--}}
{{--                @endauth--}}

{{--                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                    <li>--}}
{{--                        <a rel="alternate" hreflang="{{ $localeCode }}"--}}
{{--                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                            {{  $properties['native'] }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
                @if(\Illuminate\Support\Facades\App::getLocale() =='en')
                <li>
                <a rel="alternate" hreflang="ar"
                   href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                    {{ 'Ar' }}
                </a></li>
                @endif

                @if(\Illuminate\Support\Facades\App::getLocale() =='ar')
                <li>
                <a rel="alternate" hreflang="en"
                   href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    {{ 'En' }}
                </a></li>
                @endif

            </ul>
            <button type="button" class="hamburger is-closed">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
        </div>
    </header>
    <!--header-->
    <section class="section_home" id="home">
        <div class="container">
            <div class="row">
                @if($dataHome)
                    <div class="col-md-7">
                        <div class="home_txt">
                            <h1 class="wow fadeInUp">{!! $dataHome->title !!}</h1>
                            <p class="wow fadeInUp">{!! $dataHome->description !!}</p>
                        </div>
                        <ul class="option-site wow fadeInUp">
                            <li class="btn-site">
                                <a href="{{$dataHome->linkGoogle}}">
                                    <figure><i class="fab fa-google-play"></i></figure>
                                    <div class="txt-down">
                                        <span>GIT IT ON</span>
                                        <p>Google Play</p>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-site">
                                <a href="{{$dataHome->linkAppStore}}">
                                    <figure><i class="fab fa-apple"></i></figure>
                                    <div class="txt-down">
                                        <span>Download on the</span>
                                        <p>App Store</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="home_thumb" data-aos="fade-left" data-aos-offset="500"
                             data-aos-easing="ease-in-sine">
                            <img src="{{asset('/storage/'.$dataHome->image) }}" alt="" class="img-responsive">

                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="shape-home">
            <img src="{{asset('assets/images/shape.svg') }}" alt="Shape" class="img-fluid"/>
        </div>
    </section>
    <!--section_home-->
    <section class="section_about" id="about">
        <div class="container">
            <div class="row">
                @if($dataAbout)

                    <div class="col-md-7">
                        <div class="txt-about wow fadeInUp">

                            <h4>{!! $dataAbout->title !!}</h4>
                            <p>{!! $dataAbout->description !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="about_thumb wow fadeInUp">
                            <img src="{{asset('storage/'.$dataAbout->image) }}" alt="Images About"/>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </section>
    <!--section_about-->

    <section class="section_services" id="services">
        <div class="container">
            <div class="sec_head wow fadeInUp">
                <h2>{{__('Our services')}}</h2>
                <p>{{__('services des')}}</p>
            </div>
            <div class="row">
                @if($dataServices)
                    @foreach($dataServices as $dataService)

                        <div class="col-md-4">
                            <div class="item-serv wow fadeInUp">
                                <figure><img src="{{asset('storage/'.$dataService->image) }}"
                                             alt="Web design and development"/></figure>
                                <div class="txt-serv">
                                    <h4>{!! $dataService->title !!}</h4>
                                    <p>{!! $dataService->description !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--section_services-->
    <section class="section_features" id="features">
        <div class="container">
            <div class="sec_head wow fadeInUp">
                <h2>{{__('We are distinguished with')}}</h2>
                <p>{{__('Certificates that we are proud of and proud of Thank you for your precious trust and you are the partners of success')}}</p>
            </div>
            @if($dataFeatures)
                <div class="row">
                    <div class="col-md-4">

                        @foreach($dataFeatures as $dataFeature)
                            @if($loop->odd)
                                <div class="item-feat wow fadeInUp">
                                    <figure><img src="{{asset('storage/'.$dataFeature->image) }}" alt="Icon Team"/>
                                    </figure>
                                    <div class="txt-feat">
                                        <p>{!! $dataFeature->title !!}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <div class="col-md-4">
                        <div class="img-features">
                            <img src="{{asset('assets/images/mocup.png ') }}" alt="Images Features"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        @foreach($dataFeatures as $dataFeature)
                            @if($loop->even)
                                <div class="item-feat wow fadeInUp">
                                    <figure><img src="{{asset('storage/'.$dataFeature->image) }}"
                                                 alt="Innovative designs"/>
                                    </figure>
                                    <div class="txt-feat">
                                        <p>{!! $dataFeature->title !!}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--section_features-->

    <section class="section_screenshoot" id="screenshoot">
        <div class="container-fluid">
            <div class="sec_head wow fadeInUp">
                <h2>{{__('Screensshoot')}}</h2>
                <p>{{__('services des')}}</p>
            </div>
            <div class="owl-carousel screenshoot-slider">
                @if($dataScreenshoot)
                    @foreach($dataScreenshoot as $dataScreenshoot)
                        <div class="item">
                            <div class="item-secreen wow fadeInUp">
                                <figure>
                                    <img src="{{asset('storage/'.$dataScreenshoot->images) }}" alt=""/>
                                </figure>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--section_screenshoot-->

    <section class="section_customer" id="customer">
        <div class="content-testi">
            <div class="sec_head wow fadeInUp">
                <h2>{{__('Certificates we cherish.')}}</h2>
                <p>{{__('Certificates that we are proud of and proud of Thank you for your precious trust and you are the partners of success')}}</p>
            </div>
            <div class="owl-carousel" id="testi-slider">
                @if($dataCertificates)
                    @foreach($dataCertificates as $dataCertificate)
                        <div class="item">
                            <div class="item-testi">
                                <p>{!! $dataCertificate->description !!}</p>
                                <div class="data-testi">
                                    <figure><img src="{{asset('storage/'.$dataCertificate->image) }}"
                                                 alt="images testimonials"/>
                                    </figure>
                                    <div class="txt-test">
                                        <h5>{!! $dataCertificate->title !!}</h5>
                                        <p>{{$dataCertificate->title_job}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--section_customer-->

    <section class="section_contact" id="contact">
        <div class="container">
            <div class="sec_head wow fadeInUp">
                <h2>{{__('Contact us')}}</h2>
                <p>{{__('Certificates that we are proud of and proud of Thank you for your precious trust and you are the partners of success')}}</p>
            </div>
            <div class="sec-contact">
                <div class="se-cr">
                    <p>It's very easy to get in touch with us. Just use the contact form or pay us a visit for a coffee
                        at the office. Dynamically innovate competitive technology after an expanded array of
                        leadership.</p>
                    @if($dataSettings)
                        <ul class="list-contact">
                            <li>
                                <i class="fa fa-map-pin"></i>
                                <p>{{$dataSettings->location}}</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <p>{{$dataSettings->email}}</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>{{$dataSettings->phone}}</p>
                            </li>
                        </ul>
                    @endif
                </div>
                <form class="form-contact" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{__('Name')}}"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="{{__('Phone')}}"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="{{__('Email')}}"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="message" placeholder="{{__('Message')}}"/>
                        <!-- <textarea class="form-control" name="message" placeholder="Message"></textarea>-->
                    </div>
                    <div class="form-group">
                        <button class="btn-site btn-submit"><span>{{__('Send')}}</span></button>
                    </div>
                </form>
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
            </div>
        </div>
    </section>
    <!--section_customer-->


    <footer id="footer">
        <div class="container">
            <ul class="mmenu">
                <li><a href="">{{__('Terms & Condition ')}}</a></li>
                <li><a href="">{{__('Privacy Polic')}}</a></li>
            </ul>
            <p class="ext-center copyRight">{{__('All Rights Reserved 2021')}}<a href="www.hexacit.com">HexaCIT</a></p>
            <ul class="social-media">
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
            </ul>
        </div>
    </footer>


</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function (e) {

        e.preventDefault();
        var name = $("input[name=name]").val();
        var phone = $("input[name=phone]").val();
        var email = $("input[name=email]").val();
        var messages = $("input[name=message]").val();
        var url = '{{ url('ajaxRequest') }}';

        if (name == '' && phone == '' && email == '' && messages == '') {
            swal("Warning!", "Please Input To Date field", "info");
        }
        ;
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                name_ajax: name,
                phone_ajax: phone,
                email_ajax: email,
                message_ajax: messages,

            },
            success: function (response) {
                $('form').trigger("reset");
                if (response.success) {
                    //Sweet('success', response)
                    swal("Success !", "Data Added successfully", "success");
                    //alert(response.message)
                } else {
                    swal("Error!", "Not Data Added successfully");
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

</script>
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

