@extends('layout')
@section('content')


    <!-- Mirrored from themes.pixelstrap.com/voxo/front-end/log-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:27:41 GMT -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Voxo">
        <meta name="keywords" content="Voxo">
        <meta name="author" content="Voxo">
        <link rel="icon" href="front_web/assets/images/favicon/2.png" type="image/x-icon" />
        <title>Reset Password</title>

        <!--Google font-->
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

        <!-- bootstrap css -->
        <link id="rtl-link" rel="stylesheet" type="text/css" href="front_web/assets/css/vendors/bootstrap.css">

        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="front_web/assets/css/vendors/font-awesome.css">

        <!-- feather icon css -->
        <link rel="stylesheet" type="text/css" href="front_web/assets/css/vendors/feather-icon.css">

        <!-- animation css -->
        <link rel="stylesheet" type="text/css" href="front_web/assets/css/vendors/animate.css">

        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="front_web/assets/css/vendors/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="front_web/assets/css/vendors/slick/slick-theme.css">

        <!-- Theme css -->
        <link id="color-link" rel="stylesheet" type="text/css" href="front_web/assets/css/demo2.css">

    </head>

    <body class="theme-color2 light ltr">


    <!-- Log In Section Start -->
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
                <div class="login-title">
                    <h2>Enter your new password</h2>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input">
                        <input type="text" class="form-control" id="old_password" name="password" placeholder="Enter password">
                    </div>
                    @error('password')
                    <div style="text-decoration-color: red; margin-top: 10px">
                        <p style="color: red">{{ $message }}</p>
                    </div>
                    @enderror

                    <div class="input">
                        <input type="text" class="form-control" id="old_password" name="confirm_password" placeholder="Enter confirm password">
                    </div>
                    @error('confirm_password')
                    <div style="text-decoration-color: red; margin-top: 10px">
                        <p style="color: red">{{ $message }}</p>
                    </div>
                    @enderror
                    <input type="hidden" name="email" value="{{$email}}">

                    <div class="button login">
                        <button type="submit">
                            <span>Reset Password</span>
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Log In Section End -->

    <div class="bg-overlay"></div>

    <!-- latest jquery-->
    <script src="front_web/assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="front_web/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="front_web/assets/js/feather/feather.min.js"></script>

    <!-- lazyload js-->
    <script src="front_web/assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="front_web/assets/js/slick/slick.js"></script>
    <script src="front_web/assets/js/slick/slick-animation.min.js"></script>
    <script src="front_web/assets/js/slick/custom_slick.js"></script>

    <!-- Notify js-->
    <script src="front_web/assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="front_web/assets/js/theme-setting.js"></script>
    <script src="front_web/assets/js/script.js"></script>
    <script src="front_web/assets/js/home-script.js"></script>

    </body>
    <!-- Coockie Section Start -->
    <div class="cookie-bar-section" id="cookie-bar" style="display: none">
        <div class="content">
            <h3 style="color: red">Error</h3>
            <p class="font-light" id="error-message">Please fill in all fields</p>
            <div class="cookie-buttons">
                <button class="btn btn-solid-default" onclick="closeCookie()">I understand</button>
                {{--            <a href="javascript:void(0)" class="btn default-light1">Learn more</a>--}}
            </div>
        </div>
    </div>

    <!-- Mirrored from themes.pixelstrap.com/voxo/front-end/log-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:27:42 GMT -->

@endsection
