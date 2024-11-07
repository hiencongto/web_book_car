<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/voxo/front-end/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:27:42 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Voxo">
    <meta name="keywords" content="Voxo">
    <meta name="author" content="Voxo">
    <link rel="icon" href="front_web/assets/images/favicon/2.png" type="image/x-icon" />
    <title>Sign Up</title>

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

<body class="signup-page theme-color2">

<!-- Sign Up Section Start -->
<div class="login-section">
    <div class="materialContainer">
        <div class="box">
            <div class="login-title">
                <h2>Register</h2>
            </div>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Username" required>
                    <span class="spin"> </span>
                </div>
                @error('name')
                <div style="text-decoration-color: red; margin-top: 10px">
                    <p style="color: red">{{ $message }}</p>
                </div>
                @enderror

                <div class="input">
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                    <span class="spin"> </span>
                </div>
                @error('phone')
                <div style="text-decoration-color: red; margin-top: 10px">
                    <p style="color: red">{{ $message }}</p>
                </div>
                @enderror

                <div class="input">
                    <input type="text" name="email" id="emailname" value="{{ old('email')}}" placeholder="Email" required>
                    <span class="spin"></span>
                </div>
                @error('email')
                <div style="text-decoration-color: red; margin-top: 10px">
                    <p style="color: red">{{ $message }}</p>
                </div>
                @enderror

                <div class="input">
                    <input type="password" name="password" id="pass" placeholder="Password" required>
                    <span class="spin"></span>
                </div>
                @error('password')
                <div style="text-decoration-color: red; margin-top: 10px">
                    <p style="color: red">{{ $message }}</p>
                </div>
                @enderror

                <div class="input">
                    <input type="password" name="confirm_password" id="compass" placeholder="Confirm password" required>
                    <span class="spin"></span>
                </div>
                @error('confirm_password')
                <div style="text-decoration-color: red; margin-top: 10px">
                    <p style="color: red">{{ $message }}</p>
                </div>
                @enderror

                <input type="text" value="{{ \App\Constants\CommonConstant::ROLE['customer'] }}" name="role" id="role" hidden>

                <div class="button login">
                    <button>
                        <span>Sign Up</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </form>

            <p class="sign-category">
                <span>Or sign up with <a href="{{route('show_driver_register')}}">Driver Account</a></span>
            </p>

            <div class="row gx-md-3 gy-3">
            </div>
            <p><a href="{{route('show_login')}}" class="theme-color">Already have an account?</a></p>
        </div>
    </div>
</div>
<!-- Sign Up Section End -->

<div class="bg-overlay"></div>

<!-- latest jquery-->
<script src="front_web/assets/js/jquery-3.5.1.min.js"></script>

<!-- Bootstrap js-->
<script src="front_web/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- lazyload js-->
<script src="front_web/assets/js/lazysizes.min.js"></script>

<!-- feather icon js-->
<script src="front_web/assets/js/feather/feather.min.js"></script>

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


<!-- Mirrored from themes.pixelstrap.com/voxo/front-end/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:27:42 GMT -->
</html>
