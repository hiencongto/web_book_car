@extends('driver.layout')
@section('content')
    <?php use App\Constants\CommonConstant ?>
    <<!-- Container-fluid starts-->
    <div class="page-body">
        <div class="title-header title-header-1">
            <h5>Trip Detail</h5>
        </div>
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi">
                                    <table class="user-table table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Car</th>
                                            <th>Driver</th>
                                            <th>Customer</th>
                                            <th>Price/Ticket</th>
                                            <th>Total</th>
                                            {{--                                            <th>Description</th>--}}
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$trip->id}}</td>
                                            <td>{{$trip->car->type}}</td>
                                            <td>{{$trip->driver->name}}</td>
                                            <td>{{$trip->trip_details
                                                        ->where('status_id', '!=', CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                        ->sum('num_person')}}/17</td>
                                            <td>{{$trip->fare}} VND</td>
                                            <td>{{$trip->fare * $trip->trip_details
                                                        ->where('status_id', '!=', CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                        ->sum('num_person')}} VND</td>
                                            {{--                                                <td>{{$trip->description}}</td>--}}
                                            @switch($trip->status_id)
                                                @case(CommonConstant::STATUS_ID['trip_finished'])
                                                    <td><span class="badge bg-success"><i class="bx bxs-badge-check font-size-18"></i>Finished</span></td>
                                                    @break
                                                @case(CommonConstant::STATUS_ID['trip_on_trip'])
                                                    <td><span class="badge bg-dark"><i class="bx bxs-lock font-size-18"></i>On Trip</span></td>
                                                    @break
                                                @case(CommonConstant::STATUS_ID['trip_cancel'])
                                                    <td><span class="badge bg-danger"><i class="bx bxs-error font-size-18"></i>Cancel</span></td>
                                                    @break
                                                @default
                                                    <td><span class="badge bg-warning"><i class="bx bxs-error font-size-18"></i>Waiting</span></td>
                                            @endswitch
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($trip_details)
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="table-responsive table-desi">
                                        <table class="user-table table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Pick up</th>
                                                <th>Drop off</th>
                                                <th>People</th>
                                                <th>Seat</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trip_details as $trip_detail)
                                                @if($trip_detail->status_id == CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                    @continue
                                                @endif
                                                <tr>
                                                    <td>
                                                        {{$trip_detail->customer_id}}
                                                    </td>
                                                    <td>
                                                        {{$trip_detail->customer->name}}
                                                    </td>
                                                    <td>{{$trip_detail->customer->phone }}</td>
                                                    <td>{{$trip_detail->pick_up}}</td>
                                                    <td>{{$trip_detail->drop_off}}</td>
                                                    <td>{{$trip_detail->num_person}}</td>
                                                    <td>{{$trip_detail->seats->pluck('seat_number')->implode(',')}}</td>
                                                    @switch($trip_detail->status_id)
                                                        @case(CommonConstant::STATUS_ID['trip_detail_dropped_off'])
                                                            <td><span class="badge bg-success"><i class="bx bxs-badge-check font-size-18"></i>Finished</span></td>
                                                            @break
                                                        @case(CommonConstant::STATUS_ID['trip_detail_pending'])
                                                            <td><span class="badge bg-dark"><i class="bx bxs-lock font-size-18"></i>Pending</span></td>
                                                            @break
                                                        @case(CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                            <td><span class="badge bg-danger"><i class="bx bxs-error font-size-18"></i>Cancel</span></td>
                                                            @break
                                                                                                                @default
                                                                                                                    <td><span class="badge bg-warning"><i class="bx bxs-error font-size-18"></i>Waiting</span></td>
                                                    @endswitch

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- All User Table Ends-->
    </div>
    <!-- Container-fluid end -->

@endsection
