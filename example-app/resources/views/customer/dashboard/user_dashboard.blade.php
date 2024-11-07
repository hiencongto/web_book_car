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
                <h3>User Dashboard</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb section end -->

<!-- user dashboard section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                    <li class="nav-item mb-2">
                        <button class="nav-link font-light active" id="tab" data-bs-toggle="tab"
                                data-bs-target="#dash" type="button"><i
                                class="fas fa-angle-right"></i>Dashboard</button>
                    </li>

                    <li class="nav-item mb-2">
                        <button class="nav-link font-light border-0" type="button">
                            <a class="" type="button" data-bs-toggle="collapse" data-bs-target="#navbartrip"
                               aria-controls="navbartrip" aria-expanded="false" aria-label="Toggle navigation"
                               style="color:black">
                                <i class="fas fa-angle-right"></i>Trips
                            </a>
                        </button>
                    </li>

                    <li class=" nav-item mb-2" id="navbartrip">
                        <button class="nav-link font-light border-0 px-4" data-bs-toggle="tab" data-bs-target="#history"
                                type="button">Finished</button>
                        <button class="nav-link font-light border-0 px-4" data-bs-toggle="tab" data-bs-target="#pending"
                                type="button">On Pending</button>
                        <button class="nav-link font-light border-0 px-4" data-bs-toggle="tab" data-bs-target="#cancel"
                                type="button">Canceled</button>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="filter-button dash-filter dashboard">
                    <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dash">
                        <div class="dashboard-right">
                            <div class="dashboard">
                                <div class="page-title title title1 title-effect">
                                    <h2>My Dashboard</h2>
                                </div>
                                <div class="welcome-msg">
                                    <h6 class="font-light">Hello, <span>{{strtoupper($user->name)}} !</span></h6>
                                    <p class="font-light">From your My Account Dashboard you have the ability to
                                        view a snapshot of your recent account activity and update your account
                                        information. Select a link below to view or edit information.</p>
                                </div>

                                <div class="order-box-contain my-4">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="order-box">
                                                <div class="order-box-image">
                                                    <img src="{{asset('front_web/assets/images/svg/box.png')}}"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div class="order-box-contain">
                                                    <img src="{{asset('front_web/assets/images/svg/box1.png')}}"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                    <div>
                                                        <h5 class="font-light">total order</h5>
                                                        <h3>{{$trip_details->count()}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $pending_trips = 0;
                                        @endphp

                                        @foreach($trip_details as $trip_detail)
                                            @if ($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_pending'])
                                                @php
                                                    $pending_trips++;
                                                @endphp
                                            @endif
                                        @endforeach

                                        <div class="col-lg-4 col-sm-6">
                                            <div class="order-box">
                                                <div class="order-box-image">
                                                    <img src="{{asset('front_web/assets/images/svg/sent.png')}}"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div class="order-box-contain">
                                                    <img src="{{asset('front_web/assets/images/svg/sent1.png')}}"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                    <div>
                                                        <h5 class="font-light">pending trips</h5>
                                                        <h3>{{$pending_trips}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $finish_trips = 0;
                                        @endphp

                                        @foreach($trip_details as $trip_detail)
                                            @if ($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_dropped_off'])
                                                @php
                                                    $finish_trips++;
                                                @endphp
                                            @endif
                                        @endforeach

                                        <div class="col-lg-4 col-sm-6">
                                            <div class="order-box">
                                                <div class="order-box-image">
                                                    <img src="{{asset('front_web/assets/images/svg/wishlist.png')}}"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div class="order-box-contain">
                                                    <img src="{{asset('front_web/assets/images/svg/wishlist1.png')}}"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                    <div>
                                                        <h5 class="font-light">finished trips</h5>
                                                        <h3>{{$finish_trips}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h3>Account Information</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h4>Contact Information</h4>
{{--                                                    <a href="javascript:void(0)">Edit</a>--}}
                                                </div>
                                                <div class="box-content">
                                                    <h6 class="font-light">{{strtoupper($user->name)}}</h6>
                                                    <h6 class="font-light">{{$user->email}}</h6>
{{--                                                    <a href="javascript:void(0)">Change Password</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h4>Phone</h4>
{{--                                                    <a href="javascript:void(0)">Edit</a>--}}
                                                </div>
                                                <div class="box-content">
                                                    <h6 class="font-light">{{$user->phone}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="pending">
                        <div class="box-head mb-3">
                            <h3>My Trip</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                <tr class="table-head">
                                    <th scope="col">Trip Id</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Time start</th>
                                    <th scope="col">Time end</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trip_details as $trip_detail)
                                    @if($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_pending'])
                                        <tr>
                                            <td>
                                                <p class="mt-0">{{$trip_detail->id}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$trip_detail->trip->source->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$trip_detail->trip->destination->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{date('Y-m-d H:i', (int) $trip_detail->trip->time_start)}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{date('Y-m-d H:i', (int) $trip_detail->trip->time_end)}}</p>
                                            </td>

                                            @if($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                <td>
                                                    <p class="danger-button btn btn-sm">Cancel</p>
                                                </td>
                                            @elseif($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_pending'])
                                                <td>
                                                    <p class="success-button btn btn-sm" style="background-color: grey">Pending</p>
                                                </td>
                                            @elseif($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_dropped_off'])
                                                <td>
                                                    <p class="success-button btn btn-sm">Success</p>
                                                </td>
                                            @endif
                                            <td>
                                                <a class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal"
                                                   data-bs-target="#tripDetails{{$trip_detail->id}}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="history">
                        <div class="box-head mb-3">
                            <h3>My Trip</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                <tr class="table-head">
                                    <th scope="col">Trip Id</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Time start</th>
                                    <th scope="col">Time end</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trip_details as $trip_detail)
                                    @if($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_dropped_off'])
                                        <tr>
                                            <td>
                                                <p class="mt-0">{{$trip_detail->id}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$trip_detail->trip->source->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$trip_detail->trip->destination->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{date('Y-m-d H:i', (int) $trip_detail->trip->time_start)}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{date('Y-m-d H:i', (int) $trip_detail->trip->time_end)}}</p>
                                            </td>

                                            @if($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                <td>
                                                    <p class="danger-button btn btn-sm">Cancel</p>
                                                </td>
                                            @elseif($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_pending'])
                                                <td>
                                                    <p class="success-button btn btn-sm" style="background-color: grey">Pending</p>
                                                </td>
                                            @elseif($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_dropped_off'])
                                                <td>
                                                    <p class="success-button btn btn-sm">Success</p>
                                                </td>
                                            @endif
                                            <td>
                                                <a class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal"
                                                   data-bs-target="#tripDetails{{$trip_detail->id}}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="cancel">
                        <div class="box-head mb-3">
                            <h3>My Trip</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                <tr class="table-head">
                                    <th scope="col">Trip Id</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Time start</th>
                                    <th scope="col">Time end</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trip_details as $trip_detail)
                                    @if($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_cancel'])
                                        <tr>
                                            <td>
                                                <p class="mt-0">{{$trip_detail->id}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$trip_detail->trip->source->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$trip_detail->trip->destination->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{date('Y-m-d H:i', (int) $trip_detail->trip->time_start)}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{date('Y-m-d H:i', (int) $trip_detail->trip->time_end)}}</p>
                                            </td>

                                            @if($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                <td>
                                                    <p class="danger-button btn btn-sm">Cancel</p>
                                                </td>
                                            @elseif($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_pending'])
                                                <td>
                                                    <p class="success-button btn btn-sm" style="background-color: grey">Pending</p>
                                                </td>
                                            @elseif($trip_detail->status_id == \App\Constants\CommonConstant::STATUS_ID['trip_detail_dropped_off'])
                                                <td>
                                                    <p class="success-button btn btn-sm">Success</p>
                                                </td>
                                            @endif
                                            <td>
                                                <a class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal"
                                                   data-bs-target="#tripDetails{{$trip_detail->id}}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- user dashboard section end -->

    <!-- Trip Detail -->
@foreach($trip_details as $trip_detail)
    <div class="modal fade add-address-modal" id="tripDetails{{$trip_detail->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table cart-table">
                            <thead>
                            <tr class="table-head">
                                <th scope="col">Pick up</th>
                                <th scope="col">Drop off</th>
                                <th scope="col">Fare/ Ticket</th>
                                <th scope="col">Seat</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <td>
                                <p class="fs-6 m-0">{{$trip_detail->pick_up}}</p>
                            </td>
                            <td>
                                <p class="fs-6 m-0">{{$trip_detail->drop_off}}</p>
                            </td>
                            <td>
                                <p class="fs-6 m-0">{{$trip_detail->trip->fare}}$</p>
                            </td>
                            <td>
                                <p class="fs-6 m-0">{{$trip_detail->seats->pluck('seat_number')->implode(',')}}</p>
                            </td>
                            <td>
                                <p class="fs-6 m-0">{{(int)$trip_detail->num_person * (int)$trip_detail->trip->fare}}$</p>
                            </td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer pt-0 text-end d-block">
                    <button type="button" class="btn bg-secondary text-white rounded-1 modal-close-button"
                            data-bs-dismiss="modal">Close</button>
{{--                    <button class="btn btn-solid-default rounded-1" data-bs-dismiss="modal">Save Address</button>--}}
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
