@extends('admin.layout_admin')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Container-fluid starts-->
    <?php use App\Constants\CommonConstant ?>
    <div class="page-body">
        <div class="title-header title-header-1">
            <h5>All Blogs</h5>
            <form class="d-inline-flex">
                <a href="{{route('add_blog_admin')}}" class="align-items-center btn btn-theme">
                    <i data-feather="plus-square"></i>Add New Blog
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
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Content</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($blogs as $blog)
                                            <tr>
                                                <td>
                                                    {{$blog->title}}
                                                </td>

                                                <td>
                                                    <span>
                                                       <img src="{{asset('image/blogs/' . $blog->image) }}" alt="cars">
                                                    </span>
                                                </td>

                                                @php
                                                    $content = strip_tags($blog->content); // loại bỏ thẻ HTML
                                                    $words = explode(' ', $content); // tách thành mảng từ
                                                    $firstTwoLines = implode(' ', array_slice($words, 0, 20)); // Lấy khoảng 20 từ đầu tiên
                                                @endphp

                                                <td>{{ $firstTwoLines }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('edit_blog_admin', ['id' => $blog->id])}}">
                                                                <span class="lnr lnr-pencil"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="confirmDelete({{ $blog->id }})">
                                                                <span class="lnr lnr-trash"></span>
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
                                    @if ($blogs->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0)">Previous</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->previousPageUrl() }}">Previous</a>
                                        </li>
                                    @endif

                                    @foreach ($blogs->links()->elements[0] as $page => $url)
                                        @if ($page == $blogs->currentPage())
                                            <li class="page-item active">
                                                <a class="page-link" href="javascript:void(0)">{{ $page }}</a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    @if ($blogs->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a>
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
        function confirmDelete(blogId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('delete_blog_admin', ['id' => '__id__']) }}".replace('__id__', blogId);
                }
            });
        }
    </script>


@endsection
