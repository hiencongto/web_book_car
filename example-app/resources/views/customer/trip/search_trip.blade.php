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
                    <h3>Search Listing</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Shop Section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="category-option">
                        <div class="button-close mb-3">
                            <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                        </div>
                        <div class="accordion category-name" id="accordionExample">

                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo">
                                        Brand
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault1">
                                                    <label class="form-check-label" for="flexCheckDefault1">Zara</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault2">
                                                    <label class="form-check-label" for="flexCheckDefault2">Allen
                                                        Solly</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault3">
                                                    <label class="form-check-label" for="flexCheckDefault3">Louis
                                                        Philippe</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault4">
                                                    <label class="form-check-label" for="flexCheckDefault4">Louis
                                                        Philippe Sport</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault5">
                                                    <label class="form-check-label" for="flexCheckDefault5">H&M</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault6">
                                                    <label class="form-check-label" for="flexCheckDefault6">Fila</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault7">
                                                    <label class="form-check-label" for="flexCheckDefault7">Puma</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault8">
                                                    <label class="form-check-label" for="flexCheckDefault8">Nike</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault9">
                                                    <label class="form-check-label" for="flexCheckDefault9">HRX</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne">
                                        Category
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault10">
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault10">Shirts</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault11">
                                                    <label class="form-check-label" for="flexCheckDefault11">T-shirts
                                                        Solly</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault12">
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault12">Kurtas</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault13">
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault13">Sweatshirts</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault14">
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault14">Jackets</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault15">
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault15">Blazers</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault16">
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault16">Puma</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault17">
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault17">Nike</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                           id="flexCheckDefault18">
                                                    <label class="form-check-label" for="flexCheckDefault18">HRX</label>
                                                    <p class="font-light">(25)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slider section start -->
                            <div class="most-popular">
                                <div class="title title-2 text-lg-start">
                                    <h3>Most Popular</h3>
                                </div>

                                <div class="product-slider border-top round-arrow1">
                                    <div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="product-image">
                                                    <a href="javascript:void(0)">
                                                        <img src="front_web/assets/images/fashion/product/front/1.jpg"
                                                             class="blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-details">
                                                        <h6 class="font-light">Regular Fit</h6>
                                                        <a href="javascript:void(0)" class="">
                                                            <h3>Slim Fit Plastic Coat</h3>
                                                        </a>
                                                        <h4 class="font-light mt-1"><del>$49.00</del> <span
                                                                class="theme-color">$35.50</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="product-image">
                                                    <a href="javascript:void(0)">
                                                        <img src="front_web/assets/images/fashion/product/front/2.jpg"
                                                             class="blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-details">
                                                        <h6 class="font-light">Regular Fit</h6>
                                                        <a href="javascript:void(0)" class="">
                                                            <h3>Slim Fit Plastic Coat</h3>
                                                        </a>
                                                        <h4 class="font-light mt-1"><del>$49.00</del> <span
                                                                class="theme-color">$35.50</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="product-image">
                                                    <a href="javascript:void(0)">
                                                        <img src="front_web/assets/images/fashion/product/front/3.jpg"
                                                             class="blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-details">
                                                        <h6 class="font-light">Regular Fit</h6>
                                                        <a href="javascript:void(0)" class="">
                                                            <h3>Slim Fit Plastic Coat</h3>
                                                        </a>
                                                        <h4 class="font-light mt-1"><del>$49.00</del> <span
                                                                class="theme-color">$35.50</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="product-image">
                                                    <a href="javascript:void(0)">
                                                        <img src="front_web/assets/images/fashion/product/front/6.jpg"
                                                             class="blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-details">
                                                        <h6 class="font-light">Regular Fit</h6>
                                                        <a href="javascript:void(0)" class="">
                                                            <h3>Slim Fit Plastic Coat</h3>
                                                        </a>
                                                        <h4 class="font-light mt-1"><del>$49.00</del> <span
                                                                class="theme-color">$35.50</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="product-image">
                                                    <a href="javascript:void(0)">
                                                        <img src="front_web/assets/images/fashion/product/front/7.jpg"
                                                             class="blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-details">
                                                        <h6 class="font-light">Regular Fit</h6>
                                                        <a href="javascript:void(0)" class="">
                                                            <h3>Slim Fit Plastic Coat</h3>
                                                        </a>
                                                        <h4 class="font-light mt-1"><del>$49.00</del> <span
                                                                class="theme-color">$35.50</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="product-image">
                                                    <a href="javascript:void(0)">
                                                        <img src="front_web/assets/images/fashion/product/front/8.jpg"
                                                             class="blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-details">
                                                        <h6 class="font-light">Regular Fit</h6>
                                                        <a href="javascript:void(0)" class="">
                                                            <h3>Slim Fit Plastic Coat</h3>
                                                        </a>
                                                        <h4 class="font-light mt-1"><del>$49.00</del> <span
                                                                class="theme-color">$35.50</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider Section End -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-12 ratio_30">
                    <div class="banner-deatils">
                        <div class="banner-image">
                            <img src="front_web/assets/images/fashion/banner.jpg" class="img-fluid bg-img blur-up lazyload"
                                 alt="">
                            <div class="banner-content">
                                <div>
                                    <h3>Trip Listing </h3>
                                    <p>Shop the latest clothing trends with our weekly edit of what's new in online at
                                        Voxo. From out latest woman collection.</p>
                                </div>
                            </div>
                        </div>
                        <div class="banner-contain mt-3 mb-5">
                            <p class="font-light">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged.</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <!-- filter button -->
                        <div class="filter-button">
                            <button class="danger-button danger-center btn btn-sm filter-btn"><i
                                    data-feather="align-left"></i> Filter</button>
                        </div>
                        <!-- filter button -->


                        <!-- label and featured section -->
                        <div class="col-md-12">
                            <ul class="short-name">
                                <li>
                                    <div class="label-tag">
                                        <span>Shirts</span>
                                        <button type="button" class="btn-close" aria-label="Close"></button>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-tag">
                                        <span>Kurtas</span>
                                        <button type="button" class="btn-close" aria-label="Close"></button>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-12">
                            <div class="filter-options">
                                <div class="select-options">
                                    <div class="page-view-filter">
                                    </div>
                                    <div class="dropdown select-featured">
                                    </div>
                                </div>
                                <div class="grid-options d-sm-inline-block d-none">
                                    <ul class="d-flex">
                                        <li class="two-grid">
                                            <a href="javascript:void(0)">
                                                <img src="front_web/assets/svg/grid-2.svg" class="img-fluid blur-up lazyload"
                                                     alt="">
                                            </a>
                                        </li>

                                        <li class="list-btn active">
                                            <a href="javascript:void(0)">
                                                <img src="front_web/assets/svg/list.svg" class="img-fluid blur-up lazyload"
                                                     alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- label and featured section -->

                    <!-- Prodcut Setion -->
                    <div
                        class="row g-sm-4 g-3 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section list-style">
                        <div>
                            <div class="product-box">
{{--                                <div class="img-wrapper">--}}
{{--                                    <div class="front">--}}
{{--                                        <a href="product-left-sidebar.html">--}}
{{--                                            <img src="front_web/assets/images/fashion/product/front/1.jpg"--}}
{{--                                                 class="bg-img blur-up lazyload" alt="">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="back">--}}
{{--                                        <a href="product-left-sidebar.html">--}}
{{--                                            <img src="front_web/assets/images/fashion/product/back/1.jpg"--}}
{{--                                                 class="bg-img blur-up lazyload" alt="">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="cart-wrap">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                                   data-bs-target="#quick-view">--}}
{{--                                                    <i data-feather="eye"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content"></span>
                                        <ul class="rating mt-0">
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="product-left-sidebar.html" class="font-default">
                                            <h5 class="ms-0">Slim Fit Plastic Coat</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Sit, deserunt? Asperiores aliquam voluptatum culpa aliquid ab
                                                ducimus eaque illum, quibusdam reiciendis id ad consectetur quis, animi
                                                qui, minus quidem eveniet! Dolorum magnam numquam, asperiores
                                                accusantium architecto placeat quam officia, tempore repellendus.</p>
                                        </div>
                                        <h3 class="theme-color">$78.00</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav class="page-section">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Product Section -->
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->

    <!-- Subscribe Section Start -->
    <section class="subscribe-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="subscribe-details">
                        <h2 class="mb-3">Subscribe Our News</h2>
                        <h6 class="font-light">Subscribe and receive our newsletters to follow the news about our fresh
                            and fantastic Products.</h6>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                    <div class="subsribe-input">
                        <div class="input-group">
                            <input type="text" class="form-control subscribe-input" placeholder="Your Email Address">
                            <button class="btn btn-solid-default" type="button">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->

    <!-- Quick view modal start -->
    <div class="modal fade quick-view-modal" id="quick-view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="quick-view-image">
                                <div class="quick-view-slider">
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/4.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/5.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/6.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/7.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                </div>
                                <div class="quick-nav">
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/4.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/5.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/6.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="front_web/assets/images/fashion/product/front/7.jpg"
                                             class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-right">
                                <h2 class="mb-2">Men's Hoodie t-shirt</h2>
                                <ul class="rating mt-1">
                                    <li>
                                        <i class="fas fa-star theme-color"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star theme-color"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star theme-color"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li class="font-light">(In stock)</li>
                                </ul>
                                <div class="price mt-3">
                                    <h3>$20.00</h3>
                                </div>
                                <div class="color-types">
                                    <h4>colors</h4>
                                    <ul class="color-variant mb-0">
                                        <li class="bg-half-light selected"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-blue1"></li>
                                        <li class="bg-black1"></li>
                                    </ul>
                                </div>
                                <div class="size-detail">
                                    <h4>size</h4>
                                    <ul class="">
                                        <li class="selected">S</li>
                                        <li>M</li>
                                        <li>L</li>
                                        <li>XL</li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <h4>product details</h4>
                                    <ul>
                                        <li>
                                            <span class="font-light">Style :</span> Hoodie
                                        </li>
                                        <li>
                                            <span class="font-light">Catgory :</span> T-shirt
                                        </li>
                                        <li>
                                            <span class="font-light">Tags:</span> summer, organic
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-btns">
                                    <button onclick="location.href = 'cart.html';" type="button"
                                            class="btn btn-solid-default btn-sm" data-bs-dismiss="modal">Add to
                                        cart</button>
                                    <button type="button" class="btn btn-solid-default btn-sm"
                                            data-bs-dismiss="modal">View details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

@endsection
