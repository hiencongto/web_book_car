@extends('layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .seat-column {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        .seat {
            width: 50px;
            height: 50px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 18px;
            border-radius: 5px;
        }

        .status {
            display: flex;
            align-items: start;
            flex-direction: column;
            margin-top: 10px;
            margin-left: 30px;
        }

        .status-seat {
            width: 30px;
            height: 20px;
            margin-right: 5px;
        }

        .available {
            background-color: lightblue;
        }

        .selected {
            background-color: pink;
        }

        .seat.sold {
            background-color: gray;
            cursor: not-allowed;
            opacity: 0.5;
        }

        .status-seat.other-selected {
            background-color: yellow;
            cursor: not-allowed;
            opacity: 0.5;
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
                <h3>Trip Detail</h3>
                <nav>
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb section end -->

<!-- Shop Section start -->
<section>
    <div class="container">
        <div class="row gx-4 gy-5">
            <div class="col-lg-12 col-12">
                <div class="details-items">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="ratio_portrait">
                                <div class="row g-sm-3 g-2 justify-content-center">
                                    <div class="container text-center">
                                        <div class="seat-column" id="column1">
                                            <div class="seat available" data-seat="1" >1</div>
                                            <div class="seat available" data-seat="2" >2</div>
                                            <div class="seat available" data-seat="3">3</div>
                                            <div class="seat available" data-seat="4">4</div>
                                            <div class="seat available" data-seat="5">5</div>
                                            <div class="seat available" data-seat="6">6</div>
                                        </div>
                                        <div class="seat-column" id="column2">
                                            <div class="seat " data-seat="" style="border: none"></div>
                                            <div class="seat available" data-seat="7">7</div>
                                            <div class="seat available" data-seat="8">8</div>
                                            <div class="seat available" data-seat="9">9</div>
                                            <div class="seat available" data-seat="10">10</div>
                                            <div class="seat available" data-seat="11">11</div>
                                        </div>
                                        <div class="seat-column" id="column3">
                                            <div class="seat available" data-seat="12">12</div>
                                            <div class="seat available" data-seat="13">13</div>
                                            <div class="seat available" data-seat="14">14</div>
                                            <div class="seat available" data-seat="15">15</div>
                                            <div class="seat available" data-seat="16">16</div>
                                            <div class="seat available" data-seat="17">17</div>
                                        </div>
                                        <div class="status">
                                            <div class="status-seat available"></div> Available
                                            <div class="status-seat selected"></div> Your Pick
                                            <div class="status-seat sold" style="background-color: gray;"></div> Sold
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="cloth-details-size">

                                <div class="details-image-concept">
                                    <h2>{{$trip->source->name}} - {{$trip->destination->name}}</h2>
                                </div>

                                <div class="label-section">
                                    <span class="badge badge-grey-color" style="font-size: 20px">{{$trip->fare}} VND/ Ticket</span>
                                </div>

                                <div class="time-container" style="display: flex; justify-content: space-between;">
                                    <h3 class="price-detail" style="font-size: 20px; color: green;">
                                        Time Start: {{ date('Y-m-d H:i', (int) $trip->time_start) }}
                                    </h3>
                                    <h3 class="price-detail" style="font-size: 20px; color: green;">
                                        Time End: {{ date('Y-m-d H:i', (int) $trip->time_end) }}
                                    </h3>
                                </div>

                                <div class="color-image">
                                    <div class="image-select">
                                        <h5>Cars :</h5>
                                        <ul class="image-section">
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <img src="{{asset('image/cars/'. $trip->car->image)}}"
                                                             class="img-fluid blur-up lazyload" alt="" style="height: 60px ; width: 60px">
                                                    </a>
                                                </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="color-image">
                                    <div class="image-select">
                                        <h5>Car plate : {{$trip->car->car_plate}}</h5>
                                    </div>
                                </div>

                                <div class="color-image">
                                    <div class="image-select">
                                        <h5>Driver : {{$trip->driver->name}}</h5>
                                    </div>
                                </div>

                                <div id="selectSize" class="addeffect-section product-description border-product">
                                    <div class="image-select">
                                        <h5>Service :</h5>
                                        <ul class="image-section">
                                            @foreach($trip->trip_services as $trip_service)
                                                <li>
{{--                                                    <a href="javascript:void(0)">--}}
                                                        <img src="{{asset('image/services/'. $trip_service->service->icon)}}"
                                                             class="img-fluid blur-up lazyload" alt="" style="height: 40px ; width: 40px"
                                                             @foreach(\App\Constants\CommonConstant::SERVICE_TITLE as $key => $value)
                                                                 @if($trip_service->service_id == $key)
                                                                     title="{{$value}}"
                                                                     @endif
                                                                 @endforeach
                                                        >
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="time-container" style="display: flex; justify-content: space-between; word-wrap: break-word">
                                    <h3>(*) Please be present at the pick-up point at least 30 minutes before departure time,
                                        bring the successful ticket payment notice containing the ticket code sent from the VOXO system.<br>

                                        If you want to cancel the trip, please contact the hotline 0964283688 for support</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="cloth-review">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#desc" type="button">More Infor</button>

{{--                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"--}}
{{--                                    data-bs-target="#review" type="button">Driver Review</button>--}}
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="desc">
                            <div class="row g-4">

                                <div class="col-lg-12">
                                    <div class="review-box">
                                        <form class="row g-4" method="POST" action="{{route('create_trip_detail', ['id' => $trip->id])}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12 col-md-6">
                                                <label class="mb-1" for="pick_up">Pick Up</label>
                                                <input type="text" class="form-control" id="pick_up" name="pick_up"
                                                       placeholder="Enter your pick up address" required>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="mb-1" for="drop_off">Drop Off</label>
                                                <input type="text" class="form-control" id="drop_off" name="drop_off"
                                                       placeholder="Enter your drop off address" required>
                                            </div>

                                            <div class="col-12">
                                                <label class="mb-1" for="comments">Note</label>
                                                <textarea class="form-control" placeholder="Leave a note here"
                                                      name="user_note"    id="comments" style="height: 100px" ></textarea>
                                            </div>
                                            @if(isset($user))
                                                @if($isUserInTrip)
                                                    <div class="col-12">
                                                        <button class="btn default-light-theme default-theme default-theme-2" style="cursor: not-allowed;" disabled>You have already joined this trip!</button>
                                                    </div>
                                                @else
                                                    <div class="col-12">
                                                        <button type="submit" name="redirect" id="submit-join-trip"class="btn default-light-theme default-theme default-theme-2">Submit</button>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="col-12">
                                                    <button type="button" class="btn default-light-theme default-theme default-theme-2">
                                                        <a href="{{ route('show_login') }}" style="color: white; text-decoration: none;">Login to book car</a>
                                                    </button>
                                                </div>
                                            @endif

                                            <input id="num_person" name="num_person" hidden>

                                            @if(isset($user))
                                            <input id="customer_id" name="customer_id" value="{{$user->id}}" hidden>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="speci">
                            <div class="pro mb-4">
                                <p class="font-light">The Model is wearing a white blouse from our stylist's
                                    collection, see the image for a mock-up of what the actual blouse would look
                                    like.it has text written on it in a black cursive language which looks great
                                    on a white color.</p>
                                <div class="table-responsive">
                                    <table class="table table-part">
                                        <tr>
                                            <th>Product Dimensions</th>
                                            <td>15 x 15 x 3 cm; 250 Grams</td>
                                        </tr>
                                        <tr>
                                            <th>Date First Available</th>
                                            <td>5 April 2021</td>
                                        </tr>
                                        <tr>
                                            <th>Manufacturer‏</th>
                                            <td>Aditya Birla Fashion and Retail Limited</td>
                                        </tr>
                                        <tr>
                                            <th>ASIN</th>
                                            <td>B06Y28LCDN</td>
                                        </tr>
                                        <tr>
                                            <th>Item model number</th>
                                            <td>AMKP317G04244</td>
                                        </tr>
                                        <tr>
                                            <th>Department</th>
                                            <td>Men</td>
                                        </tr>
                                        <tr>
                                            <th>Item Weight</th>
                                            <td>250 G</td>
                                        </tr>
                                        <tr>
                                            <th>Item Dimensions LxWxH</th>
                                            <td>15 x 15 x 3 Centimeters</td>
                                        </tr>
                                        <tr>
                                            <th>Net Quantity</th>
                                            <td>1 U</td>
                                        </tr>
                                        <tr>
                                            <th>Included Components‏</th>
                                            <td>1-T-shirt</td>
                                        </tr>
                                        <tr>
                                            <th>Generic Name</th>
                                            <td>T-shirt</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade overflow-auto" id="nav-guide">
                            <div class="table-responsive">
                                <table class="table table-pane mb-0">
                                    <tbody>
                                    <tr class="bg-color">
                                        <th class="my-2">US Sizes</th>
                                        <td>6</td>
                                        <td>6.5</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>8.5</td>
                                        <td>9</td>
                                        <td>9.5</td>
                                        <td>10</td>
                                        <td>10.5</td>
                                        <td>11</td>
                                    </tr>

                                    <tr>
                                        <th>Euro Sizes</th>
                                        <td>39</td>
                                        <td>39</td>
                                        <td>40</td>
                                        <td>40-41</td>
                                        <td>41</td>
                                        <td>41-42</td>
                                        <td>42</td>
                                        <td>42-43</td>
                                        <td>43</td>
                                        <td>43-44</td>
                                    </tr>

                                    <tr class="bg-color">
                                        <th>UK Sizes</th>
                                        <td>5.5</td>
                                        <td>6</td>
                                        <td>6.5</td>
                                        <td>7</td>
                                        <td>7.5</td>
                                        <td>8</td>
                                        <td>8.5</td>
                                        <td>9</td>
                                        <td>10.5</td>
                                        <td>11</td>
                                    </tr>

                                    <tr>
                                        <th>Inches</th>
                                        <td>9.25"</td>
                                        <td>9.5"</td>
                                        <td>9.625"</td>
                                        <td>9.75"</td>
                                        <td>9.9735"</td>
                                        <td>10.125"</td>
                                        <td>10.25"</td>
                                        <td>10.5"</td>
                                        <td>10.765"</td>
                                        <td>10.85</td>
                                    </tr>

                                    <tr class="bg-color">
                                        <th>CM</th>
                                        <td>23.5</td>
                                        <td>24.1</td>
                                        <td>24.4</td>
                                        <td>25.4</td>
                                        <td>25.7</td>
                                        <td>26</td>
                                        <td>26.7</td>
                                        <td>27</td>
                                        <td>27.3</td>
                                        <td>27.5</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="question">
                            <div class="question-answer">
                                <ul>
                                    <li>
                                        <div class="que">
                                            <i class="fas fa-question"></i>
                                            <div class="que-details">
                                                <h6>Is it compatible with all WordPress themes?</h6>
                                                <p class="font-light">If you want to see a demonstration version of
                                                    the premium plugin, you can see that in this page. If you want
                                                    to see a demonstration version of the premium plugin, you can
                                                    see that in this page. If you want to see a demonstration
                                                    version of the premium plugin, you can see that in this page.
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="que">
                                            <i class="fas fa-question"></i>
                                            <div class="que-details">
                                                <h6>How can I try the full-featured plugin? </h6>
                                                <p class="font-light">Compatibility with all themes is impossible,
                                                    because they are too many, but generally if themes are developed
                                                    according to WordPress and WooCommerce guidelines, YITH plugins
                                                    are compatible with them. Compatibility with all themes is
                                                    impossible, because they are too many, but generally if themes
                                                    are developed according to WordPress and WooCommerce guidelines,
                                                    YITH plugins are compatible with them.</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="que">
                                            <i class="fas fa-question"></i>
                                            <div class="que-details">
                                                <h6>Is it compatible with all WordPress themes?</h6>
                                                <p class="font-light">If you want to see a demonstration version of
                                                    the premium plugin, you can see that in this page. If you want
                                                    to see a demonstration version of the premium plugin, you can
                                                    see that in this page. If you want to see a demonstration
                                                    version of the premium plugin, you can see that in this page.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="review">
                            <div class="row g-4">
                                <div class="col-12 mt-4">
                                    <div class="customer-review-box">
                                        <h4>Customer Reviews</h4>

                                        <div class="customer-section">
                                            <div class="customer-profile">
                                                <img src="{{asset('front_web/assets/images/inner-page/review-image/1.jpg')}}"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </div>

                                            <div class="customer-details">
                                                <h5>Mike K</h5>
                                                <p class="font-light">I purchased my Tab S2 at Best Buy but I wanted
                                                    to
                                                    share my thoughts on Amazon. I'm not going to go over specs and
                                                    such
                                                    since you can read those in a hundred other places. Though I
                                                    will
                                                    say that the "new" version is preloaded with Marshmallow and now
                                                    uses a Qualcomm octacore processor in place of the Exynos that
                                                    shipped with the first gen.</p>

                                                <p class="date-custo font-light">- Sep 08, 2021 <span></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section end -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const seats = document.querySelectorAll(".seat");

            // Thêm sự kiện click cho từng ghế
            seats.forEach(seat => {
                seat.addEventListener("click", function () {
                    // Kiểm tra xem ghế đã bán hay không
                    if (this.classList.contains("sold")) {
                        alert("This seat is already sold."); // Thông báo nếu ghế đã bán
                        return; // Dừng lại nếu ghế đã bán
                    }

                    if (this.classList.contains("other-selected")) {
                        alert("This seat is being selected by another.");
                        return;;
                    }

                    // Nếu ghế đã được chọn
                    if (this.classList.contains("selected")) {
                        this.classList.remove("selected"); // Bỏ chọn
                    } else {
                        this.classList.add("selected"); // Chọn ghế
                    }

                    // Gọi hàm để lấy giá trị ghế đã chọn
                    getSelectedSeats();
                });
            });

            // Hàm để lấy ghế đã chọn
            function getSelectedSeats() {
                const selectedSeats = [];
                // Lặp qua tất cả các ghế để lấy ghế đã chọn
                seats.forEach(seat => {
                    if (seat.classList.contains("selected")) {
                        selectedSeats.push(seat.getAttribute("data-seat")); // Lấy giá trị ghế
                    }
                });
                // Hiển thị ghế đã chọn
                var check = document.getElementById('num_person').value = selectedSeats.join(',');
                console.log(check);
            }
        });

        function testButton()
        {
            alert('ahihi');
        }

    </script>

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
    <!-- Coockie Section End -->

    @if ($errors->any())
        <script>
            var allErrors = @json($errors->all());

            var errorMessage = allErrors.join('\n');

            // alert(errorMessage);
            if (errorMessage) {
                document.getElementById('error-message').innerText = errorMessage;
                document.getElementById('cookie-bar').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('cookie-bar').style.display = 'none';
                }, 5000);
            }
        </script>
    @endif
    <script>
        function closeCookie()
        {
            document.getElementById('cookie-bar').style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const soldSeats = @json($seats);

            soldSeats.forEach(seatNumber => {
                const seatElement = document.querySelector(`.seat[data-seat="${seatNumber}"]`);
                if (seatElement) {
                    seatElement.classList.add('sold');
                }
            });
        });
    </script>

@endsection
