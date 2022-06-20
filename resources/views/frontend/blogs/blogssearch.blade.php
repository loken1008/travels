@extends('frontend.main')
@section('title', 'Search Blogs')
@section('content')


            <!-- Inner Section Start -->
            <section class="inner-area parallax-bg" @if(!empty($blogbanner->page_banner))data-background="{{asset($blogbanner->page_banner)}}" @endif data-type="parallax"
                data-speed="3">
                <div class="container">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-12">
                                <h4> Search Blog</h4>
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
                       @forelse($searchblog as $getblog)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-post">
                                <div class="thumb">
                                    <img alt="{{$getblog->img_alt}}" src="{{$getblog->blog_image}}" style="height:442px">
                                    <div class="content">
                                        <h3>{{$getblog->blog_title}}</h3>
                                        <div class="meta-box">
                                            <div class="admin-post"> {{$getblog->author_name}} </div>
                                            <div class="inner">
                                                <div class="date">
                                                    <i class="fa fa-calendar-plus-o"></i> {{$getblog->created_at->format('Y d')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('blogsdetails',$getblog->slug)}}" class="read-btn">Continue Reading
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        @empty 
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <strong>Sorry!</strong> No Blog Found.
                            </div>
                       @endforelse
                    </div>
                </div>
            </section>
            <!-- Blog Section End -->

            <section class="text-center pt-0 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                {{$searchblog->links()}}
                       </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
