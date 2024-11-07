x<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/voxo/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:39:21 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Voxo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Voxo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('back_web/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('back_web/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRIR30Hup5BuKnVUp8fq4lX0GkxZKO6t6KS4ct2z9" crossorigin="anonymous">
    <title>Voxo - Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{asset('back_web/assets/css/linearicon.css')}}">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/vendors/font-awesome.css')}}">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/vendors/themify.css')}}">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/ratio.css')}}">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/vendors/feather-icon.css')}}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/vendors/animate.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/vendors/bootstrap.css')}}">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/vector-map.css')}}">

    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/slick-theme.css')}}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/style.css')}}">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('back_web/assets/css/responsive.css')}}">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ppdVXh9fS2JuY7lfwW+h+uCE0+brkcbY36Rr5y+t1Ry0qen0AzEbi1n0DfHfPzcc" crossorigin="anonymous"></script>
<!-- tap on top start -->
<div class="tap-top">
    <span class="lnr lnr-chevron-up"></span>
</div>
<!-- tap on tap end -->

<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper">
                    <a href="index.html">
                        <img class="img-fluid main-logo" src="{{asset('back_web/assets/images/logo/logo.png')}}" alt="logo">
                        <img class="img-fluid white-logo" src="{{asset('back_web/assets/images/logo/logo-white.png')}}" alt="logo">
                    </a>
                </div>
                <div class="toggle-sidebar">
                    <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                </div>
            </div>

            <form class="form-inline search-full col" action="javascript:void(0)" method="get">
            </form>
            <div class="nav-right col-4 pull-right right-header p-0">
                <ul class="nav-menus">

                    <li class="maximize">
                    </li>
                    <li class="profile-nav onhover-dropdown pe-0 me-0">
                        <div class="media profile-media">

                            @php
                                $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
                            @endphp
                            <div class="user-name-hide media-body">
                                <span>{{$user->name}}</span>
                                <p class="mb-0 font-roboto">Driver</p>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Header Ends-->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
            <div>
                <div class="logo-wrapper logo-wrapper-center">
                    <a href="index.html" data-bs-original-title="" title="">
                        <img class="img-fluid for-dark" src="{{asset('back_web/assets/images/logo/logo-white.png')}}" alt="">
                    </a>
                    <div class="back-btn">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
                    </div>
                </div>
                <div class="logo-icon-wrapper">
                    <a href="index.html">
                        <img class="img-fluid main-logo" src="{{asset('back_web/assets/images/logo/logo.png')}}" alt="logo">
                    </a>
                </div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow">
                        <i data-feather="arrow-left"></i>
                    </div>

                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn"></li>
                            <li class="sidebar-main-title sidebar-main-title-3">
                                <div>
                                    <h6 class="lan-1">General</h6>
                                    <p class="lan-2">Dashboards</p>
                                </div>
                            </li>

                            <li class="sidebar-list">
                                <a class="sidebar-link" href="{{route('list_trip_driver')}}"
                                    style="{{ url()->current() === route('list_trip_driver')
                                           ? 'background-color: lightcoral; color: black;' : '' }}">
                                    <i data-feather="archive"></i>
                                    <span>Trip List</span>
                                </a>
                            </li>

                            <li class="sidebar-list">
                                <a class="linear-icon-link sidebar-link" href="{{route('profile_driver')}}">
                                    <i data-feather="settings"></i>
                                    <span>Profile</span>
                                </a>
                            </li>

                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{route('logout_user')}}">
                                    <i data-feather="log-in"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Page Sidebar Ends-->

        @yield('content')
    </div>
    <!-- Page Body End -->
</div>
<!-- page-wrapper End-->

<!-- Modal Start -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                <p>Are you sure you want to log out?</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="button-box">
                    <button type="button" class="btn btn--no " data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->

<!-- latest js -->
<script src="{{asset('back_web/assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap js -->
<script src="{{asset('back_web/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>

<!-- feather icon js -->
<script src="{{asset('back_web/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('back_web/assets/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- scrollbar simplebar js -->
<script src="{{asset('back_web/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('back_web/assets/js/scrollbar/custom.js')}}"></script>

<!-- Sidebar jquery -->
<script src="{{asset('back_web/assets/js/config.js')}}"></script>

<!-- tooltip init js -->
<script src="{{asset('back_web/assets/js/tooltip-init.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('back_web/assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('back_web/assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('back_web/assets/js/notify/index.js')}}"></script>

<!-- Apexchar js -->
<script src="{{asset('back_web/assets/js/chart/apex-chart/apex-chart1.js')}}"></script>
<script src="{{asset('back_web/assets/js/chart/apex-chart/moment.min.js')}}"></script>
<script src="{{asset('back_web/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('back_web/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('back_web/assets/js/chart/apex-chart/chart-custom1.js')}}"></script>

<!-- customizer js -->
<script src="{{asset('back_web/assets/js/customizer.js')}}"></script>

<!-- ratio js -->
<script src="{{asset('back_web/assets/js/ratio.js')}}"></script>

<!-- Theme js -->
<script src="{{asset('back_web/assets/js/script.js')}}"></script>

<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<!-- Thêm CSS cho Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Thêm jQuery và Bootstrap JS nếu chưa có -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Thêm JS cho Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>


<!-- Mirrored from themes.pixelstrap.com/voxo/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 10:39:37 GMT -->
</html>
