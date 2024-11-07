@extends('layout')
@section('content')
<!-- Breadcrumb section start -->
<section class="breadcrumb-section section-b-space">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>404</h3>
                <nav>
                    <ol class="breadcrumb">
{{--                        <li class="breadcrumb-item">--}}
{{--                            <a href="index.html">--}}
{{--                                <i class="fas fa-home"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="breadcrumb-item active" aria-current="page">404</li>--}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb section end -->

<!-- 404 Section Start -->
<section class="page-not-found section-b-space">
    <div class="container">
        <div class="row gx-md-2 gx-0 gy-md-0 gy-3">
            <div class="col-md-8 m-auto">
                <div class="page-image">
                    <img src="{{asset('front_web/assets/images/inner-page/404.png')}}" class="img-fluid blur-up lazyload" alt="">
                </div>
            </div>

{{--            <div class="col-md-8 mx-auto mt-md-5 mt-3">--}}
{{--                <div class="page-container pass-forgot">--}}
{{--                    <div>--}}
{{--                        <h2>page not found</h2>--}}
{{--                        <p>The page you are looking for doesn't exist or an other error occurred. Go back, or head--}}
{{--                            over to choose a new direction.</p>--}}
{{--                        <a href="index.html" class="btn btn-solid-default">Back Home Page</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
<!-- 404 Section End -->
@endsection
