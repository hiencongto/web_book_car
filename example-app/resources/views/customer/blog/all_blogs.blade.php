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
                <h3>Blog</h3>
                <nav>
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb section end -->

<!-- Blog Section Start -->
<section class="left-sidebar-section masonary-blog-section section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 ratio3_2">
                <div class="row g-4">
                    @if(isset($blogs))
                        @foreach($blogs as $blog)
                            <div class="col-lg-4 col-md-6">
                                <div class="card blog-categority">
                                    <a href="{{route('blog_detail_guess', ['id' => $blog->id])}}" class="blog-img">
                                        <img src="{{asset('image/blogs/'. $blog->image)}}" alt=""
                                             class="card-img-top blur-up lazyload bg-img">
                                    </a>
                                    <div class="card-body">
                                        <h5>News</h5>
                                        <a href="{{route('blog_detail_guess', ['id' => $blog->id])}}">
                                            <h2 class="card-title">{{$blog->title}}
                                            </h2>
                                        </a>
                                        <div class="blog-profile">
                                            <div class="image-name">
                                                <h3>Voxo</h3>
                                                <h6>{{ $blog->created_at->format('Y-m-d') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <nav class="page-section">
                    <ul class="pagination">
                        {{-- Previous page link --}}
                        <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $blogs->previousPageUrl() }}" aria-label="Previous" {{ $blogs->onFirstPage() ? 'tabindex="-1"' : '' }}>
                <span aria-hidden="true">
                    <i class="fas fa-chevron-left"></i>
                </span>
                            </a>
                        </li>

                        {{-- Display page numbers --}}
                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            <li class="page-item {{ ($blogs->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Next page link --}}
                        <li class="page-item {{ $blogs->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}" aria-label="Next" {{ $blogs->hasMorePages() ? '' : 'tabindex="-1"' }}>
                <span aria-hidden="true">
                    <i class="fas fa-chevron-right"></i>
                </span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
