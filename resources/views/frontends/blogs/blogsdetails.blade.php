@extends('frontend.main')
@section('title', "$getblogdetails->blog_title ")
@section('meta_title', $getblogdetails->meta_title)
@section('meta_keywords', $getblogdetails->meta_keywords)
@section('meta_description', $getblogdetails->meta_description)
@section('og_title',$getblogdetails->blog_title)
@section('og_description', $getblogdetails->meta_description)
@section('og_image', $getblogdetails->blog_image)
@section('og_url', url()->current())
@section('twitter_title', $getblogdetails->blog_title)
@section('twitter_description', $getblogdetails->meta_description)
@section('twitter_image', $getblogdetails->blog_image)
@section('twitter_url', url()->current())
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($blogbanner->page_banner))data-background="{{asset($blogbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>{{$getblogdetails->blog_title}}</h4>
                        <h5 class="text-white"><a href="{{url('/')}}" class="text-primary">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $getblogdetails->blog_title }}
                           </h5>
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
                <div class="col-md-8 col-lg-9">
                    <div class="blog-details">
                        <div class="details-thumb">
                            <img src="{{ $getblogdetails->blog_image }}" alt="{{$getblogdetails->img_alt}}" style="height:390px">
                        </div>
                        <div class="details-content mb-40">
                            <ul class="details-tag mb-40">

                                <li><i class="fa fa-pencil mr-1"></i>{{ $getblogdetails->blog_type }}</li>
                                <li class="ml-2"><i class="fa fa-calendar mr-1"></i>{{ $getblogdetails->created_at->format('M,d,Y') }}
                                </li>
                                <li class="ml-2"><i class="fa fa-user mr-1"></i>{{ $getblogdetails->author_name }}</li>
                                @php
                                $getcomment = App\Models\Comment::where('blog_id', $getblogdetails->id)->count();
                            @endphp
                            <li class="ml-2">
                                <i class="fa fa-commenting-o"></i> {{ $getcomment }}
                            </li>
                            </ul>
                            <h4>{{ $getblogdetails->blog_title }}</h4>
                            <p class="mb-20" style="text-align:justify!important">{!! $getblogdetails->blog_description !!}</p>

                        </div>



                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="d-flex mt-5">
                            <div class="sharethis-inline-share-buttons"></div>

                        </div>

                        <!-- End Blog Post Author -->
                        <div class="mb-5">
                            <h4>Comments</h4>
                            <div class="border-style-2"></div>
                        </div>
                        <!-- Blog Comments -->
                        @foreach ($getcomments as $getcomment)
                            <div class="row blog-comments mb-4">
                                <div class="col-sm-2">
                                    {{-- <img src="fa fa-user" alt="{{$tour->img_alt}}"> --}}
                                    <i class="fa fa-user-circle-o" style="font-size:32px"></i>
                                </div>
                                <div class="col-sm-10">
                                    <div class="comment">
                                        <h5>
                                            {{ $getcomment->name }}
                                            <span>{{ $getcomment->created_at->diffForHumans() }} / <a
                                                    data-toggle="collapse" href="#collapseExample{{ $getcomment->id }}"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">Reply</a></span>
                                        </h5>
                                        <p>{{ $getcomment->comment }}</p>
                                    </div>
                                    <div class="collapse" id="collapseExample{{ $getcomment->id }}">
                                        <div class="card card-body">
                                            <div class="mb-5 mt-5">
                                                <h4>Reply Comment</h4>
                                                <div class="border-style-2"></div>
                                            </div>
                                            <form method="post" action="{{ route('blog.comment') }}">
                                                @csrf
                                                <input type="hidden" value="{{ $getblogdetails->id }}" name="blog_id">
                                                <input type="hidden" value="{{ $getcomment->id }}" name="parent_id">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            placeholder="Full Name" required="">
                                                            @error('name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            placeholder="Your Email" required="">
                                                            @error('email')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <div class="contact-textarea">
                                                            <textarea class="form-control" rows="6" placeholder="Write Your Comment" id="message" name="comment"
                                                                required=""></textarea>
                                                                @error('comment')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            <button class="btn btn-theme mt-4" type="submit"
                                                                value="Submit Form">Comment</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Blog Comments -->
                            @foreach ($getcomment->replies as $getreply)
                                <div class="row blog-comments blog-comments-reply mb-4">
                                    <div class="col-sm-2">
                                        {{-- <img src="images/blog/a1.jpg" alt="{{$tour->img_alt}}"> --}}
                                        <i class="fa fa-reply" style="font-size:32px"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="comment">
                                            <h5>
                                                {{ $getreply->name }}
                                                <span>{{ $getreply->created_at->diffForHumans() }} /</span>
                                            </h5>
                                            <p>{{ $getreply->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Blog Comments -->
                        @endforeach
                        <!-- End Blog Comments -->
                    </div>

                    <div class="mb-5 mt-5">
                        <h4>Leave a Comment</h4>
                        <div class="border-style-2"></div>
                    </div>
                    <form method="post" action="{{ route('blog.comment') }}">
                        @csrf
                        <input type="hidden" value="{{ $getblogdetails->id }}" name="blog_id">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                @if( Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->first_name || Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->last_name)
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Full Name" value="{{Auth()->guard('customer')->user()->first_name}} {{Auth()->guard('customer')->user()->last_name}}" readonly>
                                @else
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name"
                                    required="">
                                @endif
                                    @error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-group col-md-12">
                                @if( Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->email)
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Your Email" value="{{ Auth()->guard('customer')->user()->email }}" readonly>
                                @else
                                <input type="email" name="email" id="email" class="form-control" placeholder="Your Email"
                                    required="">
                                @endif
                                    @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <div class="contact-textarea">
                                    <textarea class="form-control" rows="6" placeholder="Write Your Comment" id="message" name="comment"
                                        required=""></textarea>
                                        @error('comment')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <button class="btn btn-theme mt-4" type="submit" value="Submit Form">Comment</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>  
            <div class="col-md-4 col-lg-3">
                <div class="theme-sidebar">

                    <div class="widget search-sidebar" >
                        <div class="title-box">
                            <h3>Search <span>Here</span></h3>
                        </div>
                        <form class="search-box" method="get" action="{{ route('blogsearch') }}">
                            <div class="form-group d-flex">
                                <input type="text" name="blog_search" placeholder="Search" class="form-control">
                                <button class="btn btn-info">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="widget d-flex" style="flex-direction:column">
                        <div class="title-box">
                            <h3>Recent <span>posts</span></h3>
                        </div>

                        @foreach ($getblogs as $getblog)
                            <div class="blog-small-item">
                                <img src="{{ $getblog->blog_image }}" style="height:68px" alt="{{$getblog->img_alt}}">
                                <div class="tex">
                                    <h5><a
                                            href="{{ route('blogsdetails',$getblog->slug) }}">{{ $getblog->blog_title }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Blog Section End -->
    @include('frontend.common.tour')
@endsection
