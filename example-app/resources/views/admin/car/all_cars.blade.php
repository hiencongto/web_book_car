@extends('admin.layout_admin')
@section('content')
        <!-- Container-fluid starts-->
        <?php use App\Constants\CommonConstant ?>
        <div class="page-body">
            <div class="title-header title-header-1">
                <h5>All Cars</h5>
                <form class="d-inline-flex">
                    <a href="{{route('add_car_admin')}}" class="align-items-center btn btn-theme">
                        <i data-feather="plus-square"></i>Add New Car
                    </a>
                </form>
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
                                                <th>Car</th>
                                                <th>License Number</th>
                                                <th>Car Plate</th>
                                                <th>Seat Number</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cars as $car)
                                                <tr>
                                                    <td>
                                                    <span>
                                                       <img src="{{asset('image/cars/' . $car->image) }}" alt="cars">
                                                    </span>
                                                        {{$car->type}}
                                                    </td>

                                                    <td>
                                                        {{$car->license}}
                                                    </td>

                                                    <td>{{$car->car_plate}}</td>

                                                    <td>{{$car->seat_num}}</td>

                                                     @switch($car->status_id)
                                                        @case(CommonConstant::STATUS_ID['car_active'])
                                                            <td><span class="badge bg-success"><i class="bx bxs-badge-check font-size-18"></i>Active</span></td>
                                                            @break
                                                        @case(CommonConstant::STATUS_ID['car_frozen'])
                                                            <td><span class="badge" style="background-color: rgb(153,201,250);"><i class="bx bxs-lock font-size-18"></i>Frozen</span></td>
                                                            @break
                                                        @case(CommonConstant::STATUS_ID['car_unverified'])
                                                            <td><span class="badge bg-danger"><i class="bx bxs-error font-size-18"></i>Unverified</span></td>
                                                            @break
                                                        @default
                                                            <td><span class="badge bg-warning"><i class="bx bxs-error font-size-18"></i>Unknown</span></td>
                                                            @endswitch

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{route('update_car_admin', ['id' => $car->id])}}">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-box">
                                <nav class="ms-auto me-auto" aria-label="...">
                                    <ul class="pagination pagination-primary">
                                        @if ($cars->onFirstPage())
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript:void(0)">Previous</a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $cars->previousPageUrl() }}">Previous</a>
                                            </li>
                                        @endif

                                        @foreach ($cars->links()->elements[0] as $page => $url)
                                            @if ($page == $cars->currentPage())
                                                <li class="page-item active">
                                                    <a class="page-link" href="javascript:void(0)">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        @if ($cars->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $cars->nextPageUrl() }}">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript:void(0)">Next</a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- All User Table Ends-->

            <div class="container-fluid">
            </div>
        </div>
        <!-- Container-fluid end -->

@endsection
