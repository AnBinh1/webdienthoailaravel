@extends('layout')
@section('content')

<div class="col-sm-9">
    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>

        @foreach ($blogs as $blog)
        <div class="single-blog-post">
            <h3>{{ $blog->title }}</h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> {{ $blog->author ?? 'Admin' }}</li>
                    <li><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($blog->posted_at)->format('h:i a') }}</li>
                    <li><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($blog->posted_at)->format('M d, Y') }}</li>
                </ul>
                <span>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </span>
            </div>
            <a href="#">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
            </a>
            <p>{{ \Illuminate\Support\Str::limit($blog->content, 200) }}</p>
            <a class="btn btn-primary" href="#">Read More</a>
        </div>
        @endforeach

        <div class="pagination-area">
            <ul class="pagination">
                {{ $blogs->links() }} {{-- nếu dùng paginate trong controller --}}
            </ul>
        </div>
    </div>
</div>
