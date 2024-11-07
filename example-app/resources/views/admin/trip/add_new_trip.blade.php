@extends('admin.layout_admin')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <div class="page-body">
        <div class="title-header">
            <h5>Add New Trip</h5>
        </div>
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-home"
                                                    type="button">Previous
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab"
                                                    data-bs-toggle="pill" onclick="checkValid(event)">Next
                                            </button>
                                        </li>
                                    </ul>

                                    <form method="POST" enctype="multipart/form-data" id="addNewForm">
                                        @csrf
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                                <div class="card-header-1">
                                                    <h5>Time Setting</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="form-label-title col-lg-2 col-md-3 mb-0">From</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            {{--                                                            <input class="form-control" name="from" id="from" type="text">--}}
                                                            <select class="form-select" name="source_id" id="source_id">
{{--                                                                @if(old('source_id') !== null)--}}
{{--                                                                @endif--}}
                                                                <option selected disabled value="">From</option>
                                                                @foreach($cities as $city)
                                                                        <option
                                                                            value="{{$city->id}}" {{$city->id == old('source_id') ? 'selected': ''}}>{{$city->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('source_id')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">To</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <select class="form-select" name="destination_id"
                                                                    id="destination_id">
                                                                <option selected disabled value="">To</option>
                                                                @foreach($cities as $city)
                                                                    <option
                                                                        value="{{$city->id}}" {{$city->id == old('destination_id') ? 'selected': ''}}>{{$city->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('destination_id')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Time
                                                            Start</label>
                                                        <div class="col-md-9 col-lg-10 d-flex align-items-center">
                                                            <input type="date" id="date_start" class="form-control me-2"
                                                                   name="date_start" min="" onfocus="this.showPicker()" value="{{old('date_start')}}">
                                                            <div class="form-floating-icon">
                                                                <i data-eva="calendar-outline"></i>
                                                            </div>
                                                            <input type="text" class="form-control" id="time_start"
                                                                   name="time_start" style="background-color: white" value="{{old('time_start')}}"
                                                                   required>
                                                            <div class="form-floating-icon">
                                                                <i data-eva="clock-outline"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('date_start')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                    @error('time_start')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Time
                                                            End</label>
                                                        <div class="col-md-9 col-lg-10 d-flex align-items-center">
                                                            <input type="date" id="date_end" class="form-control me-2"
                                                                   name="date_end" min="" onfocus="this.showPicker()" value="{{old('date_end')}}">
                                                            <div class="form-floating-icon">
                                                                <i data-eva="calendar-outline"></i>
                                                            </div>
                                                            <input type="text" class="form-control" id="time_end"
                                                                   name="time_end" style="background-color: white" value="{{old('time_end')}}"
                                                                   required>
                                                            <div class="form-floating-icon">
                                                                <i data-eva="clock-outline"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('date_end')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                    @error('time_end')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                                <div class="card-header-1">
                                                    <h5>Trip Detail</h5>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Driver</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <select name="driver_id" class="form-select"
                                                                    id="driver-form">

                                                            </select>
                                                        </div>
                                                        @error('driver_id')
                                                        <div style="text-decoration-color: red; margin-top: 10px">
                                                            <p style="color: red">{{ $message }}</p>
                                                        </div>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Car</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <select name="car_id" class="form-select" id="car-form">

                                                            </select>
                                                        </div>
                                                        @error('car_id')
                                                        <div style="text-decoration-color: red; margin-top: 10px">
                                                            <p style="color: red">{{ $message }}</p>
                                                        </div>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Description</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" id="description" value="{{old('description')}}"
                                                                   name="description">
                                                        </div>
                                                    </div>
                                                    @error('description')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Ticket
                                                            Price</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="number" id="fare" value="{{old('fare')}}"
                                                                   name="fare">
                                                        </div>
                                                        @error('fare')
                                                        <div style="text-decoration-color: red; margin-top: 10px">
                                                            <p style="color: red">{{ $message }}</p>
                                                        </div>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Service</label>
                                                        <div class="col-md-9 col-lg-10" style="display: flex;
            flex-wrap: wrap;">
                                                            @foreach(\App\Constants\CommonConstant::SERVICE_ID as $service_name => $service_id)
                                                                <div class="form-check" style="margin-right: 15px;">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           id="{{$service_name}}"
                                                                           name="{{$service_name}}"
                                                                           value="{{$service_id}}">
                                                                    <label class="form-check-label"
                                                                           for="{{$service_name}}"
                                                                           style="text-transform: capitalize;">
                                                                        {{$service_name}}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                        </label>
                                                        <div>
                                                            <button class="align-items-center btn btn-theme" id="addNewButton">
                                                                <i data-feather="plus-square"></i>Add
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User End -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var homeTabButton = document.getElementById('pills-home-tab');
        var profileTabButton = document.getElementById('pills-profile-tab');
        var homeTabPane = document.getElementById('pills-home');
        var profileTabPane = document.getElementById('pills-profile');

        function setCurrentDate() {
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var year = today.getFullYear();

            var formattedDate = year + '-' + month + '-' + day;
            var dateStart = document.getElementById('date_start');
            var dateEnd = document.getElementById('date_end');
            dateStart.setAttribute('min', formattedDate);
            dateEnd.setAttribute('min', formattedDate);
        }

        window.onload = setCurrentDate;

        flatpickr("#time_start, #time_end", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i", // Định dạng 24 giờ
            time_24hr: true, // Chỉ hiển thị giờ 24h
        });

        function preventCallTabTripDetailMissingField() {
            event.preventDefault();

            // Kích hoạt tab Home và vô hiệu tab Profile
            homeTabButton.classList.add('active');
            profileTabButton.classList.remove('active');

            // Hiển thị nội dung tab Home và ẩn nội dung tab Profile
            homeTabPane.classList.add('active', 'show');
            profileTabPane.classList.remove('active', 'show');
        }

        function callTabTripDetail() {
            // Hiển thị nội dung tab Profile và ẩn nội dung tab Home
            profileTabPane.classList.add('active', 'show');
            homeTabPane.classList.remove('active', 'show');

            // Kích hoạt tab Profile và vô hiệu tab Home
            homeTabButton.classList.remove('active');
            profileTabButton.classList.add('active');
        }

        function checkValid(event) {
            var requiredFields = ['source_id', 'destination_id', 'date_start', 'time_start', 'date_end', 'time_end'];

            var missingField = requiredFields.some(function (id) {
                return !document.getElementById(id).value;
            });

            if (missingField) {
                swal({
                    title: 'Error!',
                    text: 'You must fill out all required fields!',
                    icon: 'error'
                });
                preventCallTabTripDetailMissingField();
                return;
            } else {
                let promise = new Promise(function (resolve) {
                    let time_start = $('#date_start').val() + " " + $('#time_start').val();
                    let time_end = $('#date_end').val() + " " + $('#time_end').val();
                    $.get("{{route('check_schedule_admin')}}", {
                        "time_start": time_start,
                        "time_end": time_end
                    }, function (data) {
                        resolve(data)
                    });
                });

                promise.then(function (data) {
                    if (data.hasOwnProperty('err')) {
                        swal({
                            title: 'Error!',
                            text: data.err,
                            icon: 'error'
                        });
                        console.log('xong ham xu ly data');
                        preventCallTabTripDetailMissingField();
                    } else {
                        console.log(data.driversNotBusy);
                        console.log(data.carsNotBusy);

                        createOptionForDriver(data.driversNotBusy);
                        createOptionForCar(data.carsNotBusy);

                        callTabTripDetail();
                    }
                });

            }
        }

        function createOptionForDriver(drivers) {
            const selectDriver = $('#driver-form');

            selectDriver.empty();
            // selectDriver.style.display = 'block';
            selectDriver.append('<option value="">Select Driver</option>')

            for (let driver of drivers) {
                selectDriver.append(`<option value="${driver.id}" >${driver.name}</option>`)
            }
        }

        function createOptionForCar(cars) {
            const selectCar = $('#car-form');

            selectCar.empty();
            // selectCar.style.display = 'block';
            selectCar.append('<option value="">Select Car</option>')

            for (let car of cars) {
                selectCar.append(`<option value="${car.id}" >${car.type}</option>`)
            }
        }

    </script>

    <script>
        document.getElementById('addNewButton').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default action if needed

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to add a new trip?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add new trip!',
                cancelButtonText: 'Cancel'

            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('addNewForm').submit(); // Submit the form if confirmed
                }
            });
        });
    </script>
@endsection
