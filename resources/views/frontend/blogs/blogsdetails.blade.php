@extends('frontend.main')
@section('title', "$getblogdetails->blog_title ")
@section('meta_title', $getblogdetails->meta_title)
@section('meta_keywords', $getblogdetails->meta_keywords)
@section('meta_description', $getblogdetails->meta_description)
@section('og_title', $getblogdetails->blog_title)
@section('og_description', $getblogdetails->meta_description)
@section('og_image', $getblogdetails->blog_image)
@section('og_url', url()->current())
@section('twitter_title', $getblogdetails->blog_title)
@section('twitter_description', $getblogdetails->meta_description)
@section('twitter_image', $getblogdetails->blog_image)
@section('twitter_url', url()->current())
@section('content')


    <!-- Inner Section Start -->
    <section class="blogs-details-image">
        <img src="{{ $getblogdetails->blog_image }}" alt="{{ $getblogdetails->img_alt }}">
    </section>
    <!-- Inner Section End -->

    <!-- Blog Section Start -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="blog-details">
                        <h4 class="blog-title">{{ $getblogdetails->blog_title }}</h4>

                        <div class="details-content ">
                            <ul class="details-tag ">

                                <li><i class="fa-solid fa-newspaper"></i>{{ $getblogdetails->blog_type }}</li>
                                <li class="blog-item"><i
                                        class="fa-solid fa-calendar-days"></i></i>{{ $getblogdetails->created_at->format('M,d,Y') }}
                                </li>
                                <li class="blog-item"><i class="fa fa-user"></i>{{ $getblogdetails->author_name }}</li>
                                @php
                                    $getcomment = App\Models\Comment::where('blog_id', $getblogdetails->id)->count();
                                @endphp
                                <li class="blog-item">
                                    <i class="fa-solid fa-comment"></i> {{ $getcomment }}
                                </li>
                            </ul>
                            <p>{!! $getblogdetails->blog_description !!}</p>

                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class=" mt-5">
                            <p class="share-text">Share with others</p>
                            <div class="sharethis-inline-share-buttons"></div>

                        </div>

                        <!-- End Blog Post Author -->
                        <div class="mt-4">
                            <h4 class="comments">Comments</h4>
                        </div>
                        <!-- Blog Comments -->
                        @foreach ($getcomments as $getcomment)
                            <div class="row blog-comments">
                                <div class="col-sm-10">
                                    <i class="fa-solid fa-circle-user" style="font-size:18px;margin-right:5px"></i>

                                    <div class="comment">
                                        <h5 class="comment-user">
                                            {{ $getcomment->name }}
                                            <span>-{{ $getcomment->created_at->diffForHumans() }} / <a
                                                    data-bs-toggle="collapse" href="#collapseExample{{ $getcomment->id }}"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">Reply</a></span>
                                        </h5>
                                        <p class="comment-details">{{ $getcomment->comment }}</p>
                                    </div>
                                    <div class="collapse" id="collapseExample{{ $getcomment->id }}">
                                        <div class="card card-body blogs-form">
                                            <h4 class="leave-comment">Reply Comment</h4>
                                            <form method="post" action="{{ route('blog.comment') }}" class="comment-form">
                                                @csrf
                                                <input type="hidden" value="{{ $getblogdetails->id }}" name="blog_id">
                                                <input type="hidden" value="{{ $getcomment->id }}" name="parent_id">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" placeholder="Full Name" required="">
                                                        @error('name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" placeholder="Your Email" required="">
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
                                                            <button class="comment-button" type="submit"
                                                                value="Submit Form">Reply Comment</button>
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
                                <div class="row blog-comments blog-comments-reply ">
                                    <div class="col-sm-10 d-flex">
                                        <i class="fa fa-reply" style="font-size:18px;margin-right:5px"></i>

                                        <div class="comment">
                                            <h5 class="comment-user">
                                                {{ $getreply->name }}
                                                <span>{{ $getreply->created_at->diffForHumans() }}</span>
                                            </h5>
                                            <p class="comment-details">{{ $getreply->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Blog Comments -->
                        @endforeach
                        <!-- End Blog Comments -->
                    </div>

                    <div class="blogs-form">
                        <h4 class="leave-comment">Leave a Comment</h4>

                        <form method="post" action="{{ route('blog.comment') }}" class="comment-form">
                            @csrf
                            <input type="hidden" value="{{ $getblogdetails->id }}" name="blog_id">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    @if ((Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->first_name) ||
                                        (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->last_name))
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Full Name"
                                            value="{{ Auth()->guard('customer')->user()->first_name }} {{ Auth()->guard('customer')->user()->last_name }}"
                                            readonly>
                                    @else
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Full Name" required="">
                                    @endif
                                    @error('name')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    @if (Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->email)
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Your Email"
                                            value="{{ Auth()->guard('customer')->user()->email }}" readonly>
                                    @else
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Your Email" required="">
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
                                        <button class="comment-button" type="submit">Comment</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="blogsearch">
                        <form role="search" class="search-box " method="post" action="{{ route('blogsearch') }}">
                            @csrf
                            <input type="text" class="form-control" name="blog_search" placeholder="Blog Search...">
                            <button class="blogsearch-icon"> <i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="relatedblogs-post ml-2">
                        <h3 class="recent-post">Recent posts</h3>

                        @foreach ($getblogs as $getblog)
                            <h5 class="related-blog"><a
                                    href="{{ route('blogsdetails', $getblog->slug) }}">{{ $getblog->blog_title }}</a></h5>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    @include('frontend.common.tour')
@endsection
