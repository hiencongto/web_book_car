@extends('admin.layout_admin')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php use App\Constants\CommonConstant ?>
    <<!-- Container-fluid starts-->
    <div class="page-body">
        <div class="title-header title-header-1">
            <h5>All Users</h5>
            <form class="d-inline-flex">
                <a href="{{route('add_driver_admin')}}" class="align-items-center btn btn-theme">
                    <i data-feather="plus-square"></i>Add New Driver
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
                                <select class="form-select me-2" aria-label="Select option 1" name="role" id="role_filter">
                                    <option value="">Role</option>
                                    <option value="{{ CommonConstant::ROLE['customer'] }}"
                                            @if(isset($role) && $role == CommonConstant::ROLE['customer']) selected @endif>
                                        Customer
                                    </option>
                                    <option value="{{ CommonConstant::ROLE['driver'] }}"
                                            @if(isset($role) && $role == CommonConstant::ROLE['driver']) selected @endif>
                                        Driver
                                    </option>
                                </select>

                                <select class="form-select me-2" aria-label="Select option 2" name="status" id="status_filter">
                                    <option value="">Status</option>
                                    <option value="{{ CommonConstant::STATUS_ID['user_unverified'] }}"
                                            @if(isset($status) && $status == CommonConstant::STATUS_ID['user_unverified']) selected @endif>
                                        Unverified
                                    </option>
                                    <option value="{{ CommonConstant::STATUS_ID['user_active'] }}"
                                            @if(isset($status) && $status == CommonConstant::STATUS_ID['user_active']) selected @endif>
                                        Active
                                    </option>
                                    <option value="{{ CommonConstant::STATUS_ID['user_locked'] }}"
                                            @if(isset($status) && $status == CommonConstant::STATUS_ID['user_locked']) selected @endif>
                                        Locked
                                    </option>
                                </select>


                                <input type="text" class="form-control me-2" placeholder="Email user" name="email" id="email_filter"
                                    @if(isset($email))
                                        value="{{$email}}"
                                        @endif
                                >

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
                    <div class="card" id="user_table_container">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi">
                                    <table class="user-table table table-striped" id="all_users1">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="all_users">
                                        @foreach($users as $user)
{{--                                            @dd($users)--}}
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)">
                                                        <span class="d-block ">{{$user->name}}</span>
                                                        <span>{{$user->name}}</span>
                                                    </a>
                                                </td>
                                                @switch($user->role)
                                                    @case(CommonConstant::ROLE['admin'])
                                                        <td><span class="badge bg-danger mb-0 font-size-12">Admin</span></td>
                                                        @break
                                                    @case(CommonConstant::ROLE['driver'])
                                                        <td><span class="badge bg-success mb-0 font-size-12">Driver</span></td>
                                                        @break
                                                    @default
                                                        <td><span class="badge bg-primary mb-0 font-size-12">Customer</span></td>
                                                @endswitch

                                                <td>{{$user->phone}}</td>

                                                <td>{{$user->email}}</td>

                                                @switch($user->status_id)
                                                    @case(CommonConstant::STATUS_ID['user_active'])
                                                        <td><span class="badge bg-success"><i class="bx bxs-badge-check font-size-18"></i>Active</span></td>
                                                        @break
                                                    @case(CommonConstant::STATUS_ID['user_locked'])
                                                        <td><span class="badge bg-dark"><i class="bx bxs-lock font-size-18"></i>Locked</span></td>
                                                        @break
                                                    @case(CommonConstant::STATUS_ID['user_unverified'])
                                                        <td><span class="badge bg-danger"><i class="bx bxs-error font-size-18"></i>Unverified</span></td>
                                                        @break
                                                    @default
                                                        <td><span class="badge bg-warning"><i class="bx bxs-error font-size-18"></i>Unknown</span></td>
                                                @endswitch

                                                <td>
                                                    <ul>

                                                        <li>
                                                            <a href="{{route('update_user_admin', ['id' => $user->id])}}">
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
                                    @if ($users->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0)">Previous</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a>
                                        </li>
                                    @endif

                                    @foreach ($users->links()->elements[0] as $page => $url)
                                        @if ($page == $users->currentPage())
                                            <li class="page-item active">
                                                <a class="page-link" href="javascript:void(0)">{{ $page }}</a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    @if ($users->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
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

    </div>
    <!-- Container-fluid end -->
    <script>
        function filter() {
            var role = document.getElementById('role_filter').value;
            var status = document.getElementById('status_filter').value;
            var email = document.getElementById('email_filter').value;
            {{--console.log(`{{route('filter_user_admin')}}?role=${role}&status=${status}&email=${email}`)--}}

            if(role || status || email){
                window.location = `{{route('filter_user_admin')}}?role=${role}&status=${status}&email=${email}`
            }
            else window.location = '{{route('list_user')}}'
        }
    </script>
@endsection
