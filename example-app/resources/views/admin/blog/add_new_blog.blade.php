@extends('admin.layout_admin')
@section('content')
    <!-- Page Sidebar Start -->
    <div class="page-body">
        <div class="title-header">
            <h5>Add New Blog</h5>
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
                                                    type="button">Blog</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header-1">
                                                    <h5>Blog Information</h5>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="form-label-title col-lg-2 col-md-3 mb-0">Title</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="title" id="title" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Content</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <textarea class="form-control" name="content_blog" id="content"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Image</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="file" name="image">
                                                        </div>
                                                    </div>

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
    <!-- Page Sidebar End -->
@endsection
