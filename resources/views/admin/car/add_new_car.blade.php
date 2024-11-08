@extends('admin.layout_admin')
@section('content')
    <!-- Page Sidebar Start -->
    <div class="page-body">
        <div class="title-header">
            <h5>Add New Car</h5>
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
                                                        type="button">Car</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header-1">
                                                    <h5>Car Information</h5>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="form-label-title col-lg-2 col-md-3 mb-0">Car Brand</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="type" id="type" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">License Number</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="license" required>
                                                        </div>
                                                    </div>
                                                    @error('license')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror


                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Car Plate</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="car_plate" required>
                                                        </div>
                                                    </div>
                                                    @error('car_plate')
                                                    <div style="text-decoration-color: red; margin-top: 10px">
                                                        <p style="color: red">{{ $message }}</p>
                                                    </div>
                                                    @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Seat Number</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <select class="form-select" name="seat_num" >
                                                                <option value=17>17</option>
{{--                                                                <option value=34>34</option>--}}
{{--                                                                <option value="{{CommonConstant::ROLE['driver']}}" {{$user->role == CommonConstant::ROLE['driver'] ? "selected" : ""}}>Driver</option>--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Image</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="file" name="image_car">
                                                        </div>
                                                    </div>
                                                    <input type="text" value="{{ \App\Constants\CommonConstant::STATUS_ID['car_active'] }}" name="status_id" id="status_id" hidden>

                                                    <div class="row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                        </label>
                                                        <div>
                                                            <button class="align-items-center btn btn-theme" >
                                                                <i data-feather="plus-square"></i>Add new
                                                            </button>
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
            </div>
        </div>
        <!-- New User End -->

    </div>

@endsection
