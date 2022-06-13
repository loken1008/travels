@extends('frontend.main')
@section('title', 'All Blogs')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4> All Blog</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Blog Section Start -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                @foreach ($getblogs as $getblog)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post">
                            <div class="thumb">
                                <img alt="" src="{{ $getblog->blog_image }}" style="width:348px;height:442px">
                                <div class="content">
                                    <h3>{{ $getblog->blog_title }}</h3>
                                    <div class="meta-box">
                                        <div class="admin-post"> {{ $getblog->author_name }} </div>
                                        <div class="inner">
                                            <div class="date">
                                                <i class="fa fa-calendar-plus-o"></i>
                                                {{ $getblog->created_at->format('Y d') }}
                                            </div>
                                            @php
                                                $getcomment = App\Models\Comment::where('blog_id', $getblog->id)->count();
                                            @endphp
                                            <div class="comment">
                                                <i class="fa fa-commenting-o"></i> {{ $getcomment }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('blogsdetails', Str::slug($getblog->blog_title)) }}"
                                class="read-btn">Continue Reading
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <section class="text-center pt-0 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $getblogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.common.tour')
@endsection
