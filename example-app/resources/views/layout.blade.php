<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/voxo/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:25:48 GMT -->
<head>
    <link rel="manifest" href="manifest.json" />
    <link rel="icon" href="{{asset('front_web/assets/images/favicon/2.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('front_web/assets/images/favicon/2.png')}}" />
    <meta name="theme-color" content="#e22454" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Voxo" />
    <meta name="msapplication-TileImage" content="{{asset('front_web/assets/images/favicon/2.png')}}" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Voxo">
    <meta name="keywords" content="Voxo">
    <meta name="author" content="Voxo">
    <link rel="icon" href="{{asset('front_web/assets/images/favicon/2.png')}}" type="image/x-icon" />
    <title>Index</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('front_web/assets/css/vendors/bootstrap.css')}}">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/assets/css/vendors/font-awesome.css')}}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/assets/css/vendors/feather-icon.css')}}">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/assets/css/vendors/animate.css')}}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/assets/css/vendors/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/assets/css/vendors/slick/slick-theme.css')}}">

    <!-- Theme css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('front_web/assets/css/demo2.css')}}">

</head>

<body class="theme-color2 light ltr">
@php
    $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
@endphp
<!-- header start -->
<header class="header-style-2" id="home">
    <div class="main-header navbar-searchbar">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="{{route('guess_home')}}">
                                    <svg class="svg-icon">
                                        <use class="fill-color" xlink:href="{{asset('front_web/assets/svg/icons.svg#logo')}}"></use>
                                    </svg>
                                    <img src="{{asset('front_web/assets/images/logo.png')}}" class="img-fluid blur-up lazyload" alt="logo">
                                </a>
                            </div>

                        </div>
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <div class="toggle-nav">
                                        <i class="fa fa-bars sidebar-bar"></i>
                                    </div>
                                    <ul class="nav-menu">
                                        <li class="back-btn d-xl-none">
                                            <div class="close-btn">
                                                Menu
                                                <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                            </div>
                                        </li>
                                        <li class="mega-menu dropdown home-menu">
                                            <a href="{{route('guess_home')}}"  class="nav-link menu-title gradient-title">home</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{route('list_trip_guess')}}"  class="nav-link menu-title gradient-title">trip</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{route('list_blog_guesss')}}"  class="nav-link menu-title gradient-title">blog</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="menu-right" style="display: flex; justify-content: flex-start; text-align: left; padding-left: 5px">
                            <ul>
                                <li class="onhover-dropdown">
                                    <div class="cart-media" >
                                        <i data-feather="user"></i>
                                        @if(isset($user))
                                            {{$user->name}}
                                        @endif
                                    </div>
                                    @if(isset($user))
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{route('show_user_dashboard')}}" class="d-block">Profile</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('logout_user')}}" class="d-block">Log out</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{route('show_login')}}" class="d-block">Login</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('show_register')}}" class="d-block">Register</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif

                                </li>
                            </ul>
                        </div>
                        <div class="search-full">
                            <div class="input-group">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->


@yield('content')

<!-- footer start -->
<footer class="footer-sm-space">
    <div class="main-footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-contact">
                        <div class="brand-logo">
                            <a class="footer-logo">
                                <svg class="svg-icon">
                                    <use class="fill-color" xlink:href="{{asset('front_web/assets/svg/icons.svg#logo')}}"></use>
                                </svg>
                                <img src="{{asset('front_web/assets/images/logo.png')}}" class="img-fluid blur-up lazyload" alt="logo">
                            </a>
                        </div>
                        @if(isset($admin))
                            <ul class="contact-lists">
                                <li>
                                    <span>
                                        <b>phone:</b>
                                        <span class="font-light"> {{$admin->phone}}</span>
                                    </span>

                                </li>
                                <li>
                                    <span>
                                        <b>Email:</b>
                                        <span class="font-light"> {{$admin->email}}</span>
                                    </span>

                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!-- tap to top Section Start -->
<div class="tap-to-top">
    <a href="#home">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- tap to top Section End -->

<!-- latest jquery-->
<script src="{{asset('front_web/assets/js/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('front_web/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('front_web/assets/js/feather/feather.min.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('front_web/assets/js/lazysizes.min.js')}}"></script>

<!-- Slick js-->
<script src="{{asset('front_web/assets/js/slick/slick.js')}}"></script>
<script src="{{asset('front_web/assets/js/slick/slick-animation.min.js')}}"></script>
<script src="{{asset('front_web/assets/js/slick/custom_slick.js')}}"></script>

<!-- newsletter js -->
<script src="{{asset('front_web/assets/js/newsletter.js')}}"></script>

<!-- add to cart modal resize -->
<script src="{{asset('front_web/assets/js/cart_modal_resize.js')}}"></script>

<!-- Add To Home js -->
<script src="{{asset('front_web/assets/js/pwa.js')}}"></script>

<!-- add to cart modal resize -->
<script src="{{asset('front_web/assets/js/cart_modal_resize.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('front_web/assets/js/timer1.js')}}"></script>

<!-- notify js -->
<script src="{{asset('front_web/assets/js/bootstrap/bootstrap-notify.min.js')}}"></script>

<!-- script js -->
<script src="{{asset('front_web/assets/js/theme-setting.js')}}"></script>
<script src="{{asset('front_web/assets/js/script.js')}}"></script>

</body>


<!-- Mirrored from themes.pixelstrap.com/voxo/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:26:20 GMT -->
</html>
