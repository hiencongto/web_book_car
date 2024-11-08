@extends('layout')
@section('content')
    <style>
        .green-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: #A3D977;
            border-radius: 50%;
            margin-left: 5px;
        }

        .brown-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: #8B4513;
            border-radius: 50%;
            margin-right: 5px;
        }

        .arrow-decor {
            font-weight: bold;
            color: #FFA500;
            padding: 0 5px;
        }

    </style>
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
                    <h3>Trip</h3>
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
                                        From
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <select class="form-select" name="source_id" id="source_id">
                                                            <option selected disabled value="">From</option>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}"
                                                                        @if(isset($source_id) && $source_id == $city->id) selected @endif>
                                                                    {{$city->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
                                        To
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <select class="form-select" name="source_id" id="destination_id">
                                                            <option selected disabled value="">To</option>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}"
                                                                        @if(isset($destination_id) && $destination_id == $city->id) selected @endif
                                                                >{{$city->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
                                        Time Start
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input type="date"
                                                           id="dateInput"
                                                           class="form-control"
                                                           placeholder="Enter"
                                                           name="date_start"
                                                           value="{{ isset($time_start) ? $time_start : old('date_start') }}">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="accordion-item category-rating" style="border: none">
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            <div class="form-check ps-0 custome-form-check">
                                                <button type="button" class="btn btn-solid-default" onclick="filter()">Filter</button>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slider section start -->
                            <!-- Slider Section End -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-12 ratio_30">
                    <div class="banner-deatils">
                        <div class="banner-image">
                            <img src="{{asset('front_web/assets/images/fashion/banner.jpg')}}" class="img-fluid bg-img blur-up lazyload"
                                 alt="">
                            <div class="banner-content">
                                <div>
                                    <h3>Trip Listing </h3>
                                    <p>The latest trip trends with our weekly edit of what's new in online at
                                        Voxo. </p>
                                </div>
                            </div>
                        </div>
                        <div class="banner-contain mt-3 mb-5">
                        </div>
                    </div>
                    <div class="row g-4">
                        <!-- filter button -->
                    </div>
                    <!-- label and featured section -->
                    <?php  use Carbon\Carbon;?>
                    <!-- Prodcut Setion -->
                    @if($trips)
                        <div
                            class="row g-sm-4 g-3 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section list-style">
                            <div>
                                @foreach($trips as $trip)
                                    <div class="product-box">
                                        <div class="product-details">
                                            <div class="rating-details">
                                                <span class="font-light grid-content"></span>
                                                <ul class="rating mt-0">
                                                </ul>
                                            </div>
                                            <div class="main-price">
                                                <a href="{{route('show_trip_detail', ['id' => $trip->id])}}" class="trip-info font-default">
                                                    <h5 class="ms-0">
                                                        {{$trip->source->name}}
                                                        <span class="green-dot"></span>
                                                        <span class="arrow-decor">---></span>
                                                        <span class="brown-dot"></span>
                                                        {{$trip->destination->name}}
                                                        <span style="float: right; margin-right: 10px;">{{17 - $trip->trip_details
                                                        ->where('status_id', '!=', \App\Constants\CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                        ->sum('num_person')}} seats available</span>
                                                    </h5>
                                                </a>

                                                <div class="listing-content">
                                                    <span class="font-light"><b>{{ date('Y-m-d H:i', (int) $trip->time_start) }} </b> --- <b>{{ date('Y-m-d H:i', (int) $trip->time_end) }}</b></span>
                                                    <p class="font-light" style="word-wrap: break-word">{{$trip->description}}</p>
                                                </div>
                                                <h3 class="theme-color">{{$trip->fare}} VND/ Ticket</h3>
                                                <button onclick="location.href = '{{route('show_trip_detail', ['id' => $trip->id])}}';" class="btn btn-solid-default">Join Trip</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <nav class="page-section">
                            <ul class="pagination">
                                {{-- Liên kết trang trước --}}
                                <li class="page-item {{ $trips->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $trips->previousPageUrl() }}" aria-label="Previous" {{ $trips->onFirstPage() ? 'tabindex="-1"' : '' }}>
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    </a>
                                </li>

                                {{-- Hiển thị các số trang --}}
                                @for ($i = 1; $i <= $trips->lastPage(); $i++)
                                    <li class="page-item {{ ($trips->currentPage() == $i) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $trips->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Liên kết trang sau --}}
                                <li class="page-item {{ $trips->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $trips->nextPageUrl() }}" aria-label="Next" {{ $trips->hasMorePages() ? '' : 'tabindex="-1"' }}>
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->
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

    function filter() {
        var source_id = document.getElementById('source_id').value;
        var destination_id = document.getElementById('destination_id').value;
        var time_start = document.getElementById('dateInput').value;

        var errorMessage = '';

        if (!source_id) {
            errorMessage += 'Departure is required. \n';
        }
        if (!destination_id) {
            errorMessage += 'Destination is required. ';
        }

        // Nếu có lỗi thì hiển thị div thông báo lỗi và ngăn form gửi đi
        if (errorMessage) {
            document.getElementById('error-message').innerText = errorMessage;
            document.getElementById('cookie-bar').style.display = 'block'; // Hiển thị div lỗi
            setTimeout(function () {
                document.getElementById('cookie-bar').style.display = 'none';
            }, 5000);
            event.preventDefault(); // Ngăn form gửi đi
        }
        else{
            window.location = `{{route('filter_trip_guess')}}?source_id=${source_id}
            &destination_id=${destination_id}
            &time_start=${time_start}`;
        }
    }

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
