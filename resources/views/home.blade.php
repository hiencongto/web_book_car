@extends('layout')
@section('content')
    <style>
        /* Chấm tròn xanh lá cây nhạt sau destination */
        .green-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: #A3D977; /* Màu xanh lá cây nhạt */
            border-radius: 50%;
            margin-left: 5px; /* Khoảng cách với chữ */
        }

        /* Chấm tròn nâu trước source */
        .brown-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: #8B4513; /* Màu nâu */
            border-radius: 50%;
            margin-right: 5px; /* Khoảng cách với chữ */
        }

        /* Trang trí mũi tên ---> */
        .arrow-decor {
            font-weight: bold; /* Tăng độ đậm */
            color: #FFA500; /* Màu cam để nổi bật */
            padding: 0 5px; /* Khoảng cách trước và sau mũi tên */
        }

    </style>
<!-- home slider start -->
<section class="home-section home-style-2 pt-0">
    <div class="container-fluid p-0">
        <div class="slick-2 dot-dark">
            <div>
                <div class="home-slider">
                    <div class="home-wrap row m-0">
                        <div class="col-xxl-4 col-lg-4 p-0 d-lg-block d-none">
                            <div class="home-left-wrapper">
                                <div>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
                                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                    <h2>BOOK CAR</h2>

                                    <p>The international hoodies with excellent durable fabric, not to heavy but
                                        simply PERFECT for Indian summer.</p>
                                    <form method="POST" enctype="multipart/form-data" id="form_search_guess_home" action="{{route('search_guess_home')}}">
                                        @csrf
                                        <ul class="selection-wrap">
                                            <li>
                                                <label style="padding-bottom: 4px;"></label>
                                                <div class="dark-select">
                                                    <div>
                                                        <select class="form-select" name="source_id" id="source_id">
                                                            <option selected disabled value="">From</option>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fas fa-chevron-down" style=""></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <label style="padding-bottom: 4px;"></label>
                                                <div class="dark-select">
                                                    <select class="form-select" name="destination_id" id="destination_id">
                                                        <option selected disabled value="">To</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="selection-wrap">
                                            <li>
                                                <div class="dark-select">
                                                    <input type="date" id="dateInput" class="form-select" placeholder="Enter" name="date_start">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dark-select">
                                                    <button class="btn btn-white" type="submit">Search</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-lg-8 p-0 left-content">
                            <img src="{{asset('front_web/assets/images/travel111.png')}}" class="bg-img blur-up lazyload" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- home slider end -->

<section class="ratio_asos">
    <div class="container">
        <div class="row m-0">
            <div class="col-sm-12 p-0">
                <div class="title title-2 text-center">
                    <h2>New Blog</h2>
                </div>
                <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">
                    @if(isset($blogs))
                        @foreach($blogs as $blog)
                            <div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="{{route('blog_detail_guess', ['id' => $blog->id])}}">
                                                <img src="{{asset('image/blogs/' . $blog->image)}}"
                                                     class="bg-img blur-up lazyload" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="main-price">
                                            <a href="{{route('blog_detail_guess', ['id' => $blog->id])}}" class="font-default">
                                                <h5>{{$blog->title}}</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- service section start -->
<section class="service-section service-style-2 section-b-space">
    <div class="container">
        <div class="row g-4 g-sm-3">
            <div class="col-xl-3 col-sm-6">
                <div class="service-wrap">
                    <div class="service-icon">
                        <svg>
                            <use xlink:href="front_web/assets/svg/icons.svg#customer"></use>
                        </svg>
                    </div>
                    <div class="service-content">
                        <h3 class="mb-2">Customer Servcies</h3>
                        <span class="font-light">Top notch customer service.</span>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="service-wrap">
                    <div class="service-icon">
                        <svg>
                            <use xlink:href="front_web/assets/svg/icons.svg#shop"></use>
                        </svg>
                    </div>
                    <div class="service-content">
                        <h3 class="mb-2">Pickup At Any Store</h3>
                        <span class="font-light">Free shipping on orders over $65.</span>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="service-wrap">
                    <div class="service-icon">
                        <svg>
                            <use xlink:href="front_web/assets/svg/icons.svg#secure-payment"></use>
                        </svg>
                    </div>
                    <div class="service-content">
                        <h3 class="mb-2">Secured Payment</h3>
                        <span class="font-light">We accept all major credit cards.</span>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="service-wrap">
                    <div class="service-icon">
                        <svg>
                            <use xlink:href="front_web/assets/svg/icons.svg#return"></use>
                        </svg>
                    </div>
                    <div class="service-content">
                        <h3 class="mb-2">Free Returns</h3>
                        <span class="font-light">30-days free return policy.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section end -->
<!-- Coockie Section Start -->
<div class="cookie-bar-section" id="cookie-bar" style="display: none">
    <div class="content">
        <h3>Error:</h3>
        <p class="font-light" id="error-message">Please fill in all fields</p>
        <div class="cookie-buttons">
            <button class="btn btn-solid-default" onclick="closeCookie()">I understand</button>
{{--            <a href="javascript:void(0)" class="btn default-light1">Learn more</a>--}}
        </div>
    </div>
</div>
<!-- Coockie Section End -->
<script>
    function setCurrentDate()
    {
        var today = new Date();
        var day = String(today.getDate()).padStart(2, '0');
        var month = String(today.getMonth() + 1).padStart(2, '0');
        var year = today.getFullYear();

        var formattedDate = year + '-' + month + '-' + day;
        var dateInput = document.getElementById('dateInput');
        dateInput.value = formattedDate;
        dateInput.setAttribute('min', formattedDate);
    }

    window.onload = setCurrentDate;

    document.getElementById('form_search_guess_home').addEventListener('submit', function (event){
        var source = document.getElementById('source_id').value;
        var destination = document.getElementById('destination_id').value;

        var errorMessage = '';

        if (!source) {
            errorMessage += 'Departure is required. \n';
        }
        if (!destination) {
            errorMessage += 'Destination is required. ';
        }

        // Nếu có lỗi thì hiển thị div thông báo lỗi và ngăn form gửi đi
        if (errorMessage) {
            document.getElementById('error-message').innerText = errorMessage;
            document.getElementById('cookie-bar').style.display = 'block'; // Hiển thị div lỗi
            setTimeout(function() {
                document.getElementById('cookie-bar').style.display = 'none';
            }, 5000);
            event.preventDefault(); // Ngăn form gửi đi
        }
    });

    function closeCookie()
    {
        document.getElementById('cookie-bar').style.display = 'none';
    }
</script>
@if(session('error'))
    <script>
        // Chuyển đổi thông báo thành chuỗi JavaScript
        const errorMessage = @json(session('error'));
        document.getElementById('error-message').innerText = errorMessage;
        document.getElementById('cookie-bar').style.display = 'block'; // Hiển thị div lỗi
        setTimeout(function() {
            document.getElementById('cookie-bar').style.display = 'none'; // Ẩn div sau 5 giây
        }, 5000);
    </script>
@endif




@endsection
