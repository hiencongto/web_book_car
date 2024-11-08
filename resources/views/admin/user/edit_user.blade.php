@extends('admin.layout_admin')
@section('content')
    <!-- Page Sidebar Start -->
    <div class="page-body">
        <div class="title-header">
            <h5>Edit User Information</h5>
            <?php use App\Constants\CommonConstant ?>
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
                                                    type="button">User</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form" method="POST" enctype="multipart/form-data" id="addNewForm">
                                                @csrf
                                                <div class="card-header-1">
                                                    <h5>User Information</h5>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="form-label-title col-lg-2 col-md-3 mb-0">Username</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            {{$user->name}}
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                            Address</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            {{$user->email}}
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            {{$user->phone}}
                                                        </div>
                                                    </div>

                                                    @if($user->trips->contains('status_id', CommonConstant::STATUS_ID['trip_on_trip']))
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Role</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                @switch($user->role)
                                                                    @case(CommonConstant::ROLE['driver'])
                                                                        Driver
                                                                        @break
                                                                    @case(CommonConstant::ROLE['customer'])
                                                                        Customer
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Role</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <select name="role" >
                                                                    <option value="{{CommonConstant::ROLE['customer']}}" {{$user->role == CommonConstant::ROLE['customer'] ? "selected" : ""}}>Customer</option>
                                                                    <option value="{{CommonConstant::ROLE['admin']}}" {{$user->role == CommonConstant::ROLE['admin'] ? "selected" : ""}}>Admin</option>
                                                                    <option value="{{CommonConstant::ROLE['driver']}}" {{$user->role == CommonConstant::ROLE['driver'] ? "selected" : ""}}>Driver</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if($user->trips->contains('status_id', CommonConstant::STATUS_ID['trip_on_trip']))
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Status</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                {{$user->status->value}}
                                                            </div>
                                                        </div>
                                                    @else
                                                        @if($user->status_id == CommonConstant::STATUS_ID['user_unverified'])
                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Status</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    {{$user->status->value}}
                                                                </div>
                                                            </div>

                                                        @else
                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Status</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    <select name="status_id" >
                                                                        <option value="{{CommonConstant::STATUS_ID['user_active']}}" {{$user->status_id == CommonConstant::STATUS_ID['user_active'] ? "selected" : ""}}>Actived</option>
                                                                        <option value="{{CommonConstant::STATUS_ID['user_locked']}}" {{$user->status_id == CommonConstant::STATUS_ID['user_locked'] ? "selected" : ""}}>Locked</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">ID number</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            {{$user->ID_number}}
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                        </label>
                                                        <div>
                                                            @if(!$user->trips->contains('status_id', CommonConstant::STATUS_ID['trip_on_trip']))
                                                                <button class="align-items-center btn btn-theme" id="addNewButton">
                                                                    <i data-feather="plus-square"></i>Edit
                                                                </button>
                                                            @endif
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
    <!-- Page Sidebar End -->
    <script>
        document.getElementById('addNewButton').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default action if needed

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to edit user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'Cancel'

            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('addNewForm').submit(); // Submit the form if confirmed
                }
            });
        });
    </script>



@endsection
