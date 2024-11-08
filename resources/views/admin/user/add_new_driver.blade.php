@extends('admin.layout_admin')
@section('content')
    <!-- Page Sidebar Start -->
    <div class="page-body">
        <div class="title-header">
            <h5>Add New Driver</h5>
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
                                                    type="button">Account</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form" method="POST" enctype="multipart/form-data" id="addNewForm">
                                                @csrf
                                                <div class="card-header-1">
                                                    <h5>Driver Information</h5>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="form-label-title col-lg-2 col-md-3 mb-0">Username</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}" required>
                                                        </div>
                                                    </div>
                                                    @error('name')
                                                                        <div class="alert alert-danger form-control-sm"
                                                                             style="margin-top: -1.25rem">{{ $message }}</div>
                                                                        @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                            Address</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="email" name="email" value="{{old('email')}}" required>
                                                        </div>
                                                    </div>
                                                                        @error('email')
                                                                        <div class="alert alert-danger form-control-sm"
                                                                             style="margin-top: -1.25rem">{{ $message }}</div>
                                                                        @enderror


                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="phone" value="{{old('phone')}}" required>
                                                        </div>
                                                    </div>
                                                    @error('phone')
                                                    <div class="alert alert-danger form-control-sm"
                                                         style="margin-top: -1.25rem">{{ $message }}</div>
                                                    @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Password</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="password" name="password" required>
                                                        </div>
                                                    </div>
                                                                        @error('password')
                                                                        <div class="alert alert-danger form-control-sm"
                                                                             style="margin-top: -1.25rem">{{ $message }}</div>
                                                                        @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Confirm
                                                            Password</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="password" name="confirm_password" required>
                                                        </div>
                                                    </div>
                                                                        @error('confirm_password')
                                                                        <div class="alert alert-danger form-control-sm"
                                                                             style="margin-top: -1.25rem">{{ $message }}</div>
                                                                        @enderror

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">ID Number</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="ID_number" value="{{old('ID_number')}}" required>
                                                        </div>
                                                    </div>
                                                                        @error('ID_number')
                                                                        <div class="alert alert-danger form-control-sm"
                                                                             style="margin-top: -1.25rem">{{ $message }}</div>
                                                                        @enderror

                                                    <input type="text" value="{{ \App\Constants\CommonConstant::ROLE['driver'] }}" name="role" id="role" hidden>

                                                    <div class="row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                        </label>
                                                        <div>
                                                            <button class="align-items-center btn btn-theme" id="addNewButton">
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
    <!-- Page Sidebar End -->

    <script>
        document.getElementById('addNewButton').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default action if needed

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to add a new driver?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add new driver!',
                cancelButtonText: 'Cancel'

            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('addNewForm').submit(); // Submit the form if confirmed
                }
            });
        });
    </script>

@endsection
