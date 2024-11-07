@extends('admin.layout_admin')
@section('content')
    <?php use App\Constants\CommonConstant ?>
    <<!-- Container-fluid starts-->
    <div class="page-body">
        <div class="title-header title-header-1">
            <h5>All Trips</h5>
            <form class="d-inline-flex">
                <a href="{{route('add_trip_admin')}}" class="align-items-center btn btn-theme">
                    <i data-feather="plus-square"></i>Add New Trip
                </a>
            </form>
        </div>
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <select class="form-select me-2" aria-label="Select option 1" name="role" id="from_filter">
                                    <option value="">From</option>
                                    @if(isset($cities))
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                                    @if(isset($from_id) && $from_id == $city->id) selected @endif>
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>

                                <select class="form-select me-2" aria-label="Select option 2" name="status" id="to_filter">
                                    <option value="">To</option>
                                    @if(isset($cities))
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                                    @if(isset($to_id) && $to_id == $city->id) selected @endif>
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>

                                <select class="form-select me-2" aria-label="Select option 2" name="status" id="status_filter">
                                    <option value="">Status</option>
                                    <option value="{{ CommonConstant::STATUS_ID['trip_finished'] }}"
                                            @if(isset($status) && $status == CommonConstant::STATUS_ID['trip_finished']) selected @endif>
                                        Finished
                                    </option>
                                    <option value="{{ CommonConstant::STATUS_ID['trip_waiting'] }}"
                                            @if(isset($status) && $status == CommonConstant::STATUS_ID['trip_waiting']) selected @endif>
                                        Waiting
                                    </option>
                                    <option value="{{ CommonConstant::STATUS_ID['trip_on_trip'] }}"
                                            @if(isset($status) && $status == CommonConstant::STATUS_ID['trip_on_trip']) selected @endif>
                                        On Trip
                                    </option>
                                    <option value="{{ CommonConstant::STATUS_ID['trip_cancel'] }}"
                                            @if(isset($status) && $status == CommonConstant::STATUS_ID['trip_cancel']) selected @endif>
                                        Cancel
                                    </option>
                                </select>

                                <button type="button" class="btn btn-primary" onclick="filter()">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
{{--                        @if($trips->isNotEmpty())--}}

                            <div class="card-body">
                                <div>
                                    <div class="table-responsive table-desi">
                                        <table class="user-table table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>From -> To</th>
                                                <th>Time Start</th>
                                                <th>Time End</th>
                                                <th>Customer</th>
                                                <th>Total Paid</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trips as $trip)
                                                <tr>
                                                    <td>
                                                        {{$trip->id}}
                                                    </td>
                                                    <td>
                                                        {{$trip->source->name}} -> {{$trip->destination->name}}
                                                    </td>
                                                    <td>{{ date('Y-m-d H:i', (int) $trip->time_start) }}</td>
                                                    <td>{{ date('Y-m-d H:i', (int) $trip->time_end) }}</td>
                                                    <td>{{$trip->trip_details
                                                        ->where('status_id', '!=', CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                        ->sum('num_person')}}/17</td>
                                                    <td>{{$trip->trip_details
                                                        ->where('status_id', '!=', CommonConstant::STATUS_ID['trip_detail_cancel'])
                                                        ->sum('num_person') * $trip->fare}} VND</td>

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

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{route('show_trip_detail_admin', ['id' => $trip->id])}}">
                                                                    <span class="lnr lnr-eye"></span>
                                                                </a>
                                                            </li>

                                                            @if($trip->status_id == CommonConstant::STATUS_ID['trip_waiting'])
                                                            <li>
                                                                <a href="{{route('edit_trip_admin', ['id' => $trip->id])}}">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{--                                        @endforeach--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="pagination-box">
                                <nav class="ms-auto me-auto" aria-label="...">
                                    <ul class="pagination pagination-primary">
                                        @if ($trips->onFirstPage())
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript:void(0)">Previous</a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $trips->previousPageUrl() }}">Previous</a>
                                            </li>
                                        @endif

                                        @foreach ($trips->links()->elements[0] as $page => $url)
                                            @if ($page == $trips->currentPage())
                                                <li class="page-item active">
                                                    <a class="page-link" href="javascript:void(0)">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        @if ($trips->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $trips->nextPageUrl() }}">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript:void(0)">Next</a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
{{--                        @endif--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- All User Table Ends-->

    </div>
    <!-- Container-fluid end -->

    <script>
        function filter() {
            var from_id = document.getElementById('from_filter').value;
            var to_id = document.getElementById('to_filter').value;
            var status = document.getElementById('status_filter').value;

            console.log(from_id + to_id +status);
            if(from_id || to_id || status){
                window.location = `{{route('filter_trip_admin')}}?from_id=${from_id}&to_id=${to_id}&status=${status}`
            }
            else window.location = '{{route('list_trip')}}'
        }
    </script>
@endsection
